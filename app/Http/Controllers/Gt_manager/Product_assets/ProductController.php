<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Models\Product;
use App\Models\CarBrand;
use App\Models\FuelType;
use App\Traits\SlugTrait;
use App\Models\ProductSku;
use App\Models\Manufacturer;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\ProductCategory;
use App\Models\EngineAspiration;
use App\Models\TransmissionType;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;

class ProductController extends Controller
{
    use SlugTrait;

    // -------------------- Method -------------------- //
    public function index()
    {
        $products = Product::with('manufacturer', 'skus')->latest()->get();
        $manufacturers = Manufacturer::latest()->get();

        return view('gt-manager.pages.product_assets.products.index', compact('products', 'manufacturers'));
    }
    // -------------------- Method -------------------- //
    public function create()
    {
        $brands = CarBrand::latest()->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $transmissionTypes = TransmissionType::all();
        $EngineAspirations = EngineAspiration::all();
        $FuelTypes = FuelType::all();
        $manufacturers = Manufacturer::latest()->get();
        $categories = ProductCategory::latest()->get();
        $subcategories = ProductSubCategory::latest()->get();
        return view('gt-manager.pages.product_assets.products.create',

            compact('brands', 'models', 'transmissionTypes', 'EngineAspirations', 'FuelTypes', 'manufacturers', 'categories', 'subcategories'));
    }
    // -------------------- Method -------------------- //
    public function tmpFilepondUpload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->image;

            // Convert to Jpeg
            $manager = new ImageManager(new Driver());
            $imageMngr = $manager->read($image);
            $encoded = $imageMngr->toJpeg(80); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = 'PROD-' . bin2hex(random_bytes(16)) . '.jpg';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/product_imgs/' . $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName,
            ]);

            return $fileName;
        } else {
            return response()->json(['error' => 'saving failed'], 400);
        }

    }
    // -------------------- Method -------------------- //
    public function tmpFilepondDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/product_images/' . $temporaryImages->name);
            $temporaryImages->delete();
            return 'Done!';
        } else {
            return response()->json(['error' => 'deleting file failed'], 400);
        }
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'category_id' => 'required|exists:product_categories,id',
            'subcategory_id' => 'required|exists:product_sub_categories,id',
            'name_en' => 'required|max:250',
            'name_ar' => 'required|max:250',
            'description_en' => 'required',
            'description_ar' => 'required',
            'sku' => 'required',
            'part_number' => 'required',
            'main_price' => 'required',
            'image' => 'required',
        ]);
        // Properties
        $temporaryImages = TemporaryFile::all();
        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $category = ProductCategory::find($request->category_id);
        $subcategory = ProductSubCategory::find($request->subcategory_id);
        $firstImage = 1;
        // Check the Validation
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/product_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Create the product
        $product = Product::create([
            'manufacturer_id' => $manufacturer->id,
            'product_category_id' => $category->id,
            'product_sub_category_id' => $subcategory->id,
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'description' => ['en' => $request->description_en, 'ar' => $request->description_ar],
        ]);
        // Create the SKU
        $sku = ProductSku::create([
            'product_id' => $product->id,
            'sku' => $request->sku, // Assuming 'suk' is the key for SKU in your request data
            'part_number' => $request->part_number,
            'main_price' => $request->main_price,
        ]);
        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/product_imgs/' . $temporaryImage->name,
                'media/product_imgs/' . $temporaryImage->name);

            ProductImage::create([
                'product_id' => $product->id,
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/product_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        // Handle file upload
        if ($request->hasFile('brochure')) {
            $brochure = $product->slug . '_brochure.' . $request->file('brochure')->extension();
            $request->file('brochure')->storeAs('media/product_brochures', $brochure);
            // You might want to store the file path in the database if needed
            $product->brochure = $brochure;
            $product->save();
        }
        // Redirect or return a response
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('products.index');
    }
    // -------------------- Method -------------------- //
    public function edit($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        $manufacturers = Manufacturer::latest()->get();
        $manufacturer = $product->manufacturer;
        $categories = ProductCategory::latest()->get();
        $category = $product->category;
        $subCategories = ProductSubCategory::latest()->get();
        $subCategory = $product->subCategory;

        $images = $product->images;


        // dd($product);

        return view('gt-manager.pages.product_assets.products.edit',
            compact('manufacturers', 'manufacturer', 'categories', 'category', 'subCategories', 'subCategory', 'product' , 'images' ) );
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $slug)
    {
        // Find the product by slug
        $product = Product::getByTranslatedSlug($slug)->first();

        if (!$product) {
            // Handle case where product is not found
            return redirect()->back()->withErrors(['Product not found.']);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'manufacturer_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $category = ProductCategory::find($request->category_id);
        $subcategory = ProductSubCategory::find($request->subcategory_id);

        // Update the product
        $product->update([
            'manufacturer_id' => $manufacturer->id,
            'product_category_id' => $category->id,
            'product_sub_category_id' => $subcategory->id,
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'description' => ['en' => $request->description_en, 'ar' => $request->description_ar],
            'status' => $request->status,
        ]);

        // Handle file upload (if needed)
        if ($request->hasFile('brochure')) {
            $brochure = $product->slug . '_brochure.' . $request->file('brochure')->extension();
            $request->file('brochure')->storeAs('media/product_brochures', $brochure);
            // You might want to store the file path in the database if needed
            $product->brochure = $brochure;
            $product->save();
        }

        // Redirect or return a response
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('manufacturers.show', ['slug' => $manufacturer->slug]);
    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        $manufacturer = $product->manufacturer;
        $product->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('manufacturers.show', ['slug' => $manufacturer->slug]);
    }
}
