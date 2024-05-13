<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Models\Product;
use App\Models\CarBrand;
use App\Models\FuelType;
use App\Traits\SlugTrait;
use App\Models\ProductSku;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\ProductCategory;
use App\Models\ProductSkuImage;
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
        $products = Product::with('manufacturer')->latest()->get();
        return view('gt-manager.pages.product_assets.products.index', compact('products'));
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
            $encoded = $imageMngr->toPng(); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = 'SKU-IMG-' . bin2hex(random_bytes(16)) . '.png';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/product_sku_imgs/' . $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName,
            ]);

            return $fileName;
        } else {
            return response()->json(['error' => 'saving failed'], 400);
        }

    }
    public function tmpFilepondDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/product_sku_imgs/' . $temporaryImages->name);
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
            'sku_name_en' => 'required|max:250',
            'sku_name_ar' => 'required|max:250',
            'part_number' => 'required',
            'main_price' => 'required',
            'image' => 'required',
        ]);
        // Check the Validation
        $temporaryImages = TemporaryFile::all();
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/product_sku_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Properties
        $category = ProductCategory::find($request->category_id);
        $subcategory = ProductSubCategory::find($request->subcategory_id);
        $firstImage = 1;
        // Creating the slug
        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $manufacturer_en = $manufacturer->name;
        $manufacturer_ar = $manufacturer->getTranslation('name', 'ar');
        $name_en = $request->name_en;
        $name_ar = $request->name_ar;
        $sku = generateUniqueId();
        // Replacing spaces with dashes
        $slug_en = implode('-', [$manufacturer_en, $name_en]);
        $slug_en = str_replace(' ', '-', $slug_en);
        $slug_ar = implode('-', [$manufacturer_ar, $name_ar]);
        $slug_ar = str_replace(' ', '-', $slug_ar);
        $slug = ["en" => $slug_en, "ar" => $slug_ar];

        // Create the product
        $product = Product::create([
            'manufacturer_id' => $manufacturer->id,
            'product_category_id' => $category->id,
            'product_sub_category_id' => $subcategory->id,
            'name' => ['en' => $name_en, 'ar' => $name_ar],
            'description' => ['en' => $request->description_en, 'ar' => $request->description_ar],
            'slug' => $slug,
        ]);
        // Create the SKU
        $sku = ProductSku::create([
            'product_id' => $product->id,
            'sku' => $sku,
            'sku_name' => ['en' => $request->sku_name_en, 'ar' => $request->sku_name_ar],
            'part_number' => $request->part_number,
            'main_price' => $request->main_price,
        ]);
        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/product_sku_imgs/' . $temporaryImage->name,
                'media/product_sku_imgs/' . $temporaryImage->name);

            ProductSkuImage::create([
                'sku_id' => $sku->id,
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/product_sku_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        // Handle file upload
        if ($request->hasFile('brochure')) {
            $brochure = $product->slug . '-brochure.' . $request->file('brochure')->extension();
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
        $skus = $product->skus;

        return view('gt-manager.pages.product_assets.products.edit',
            compact('manufacturers', 'manufacturer', 'categories', 'category', 'subCategories', 'subCategory', 'product', 'images', 'skus'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $slug)
    {
        // Properties
        $product = Product::getByTranslatedSlug($slug)->first();
        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $category = ProductCategory::find($request->category_id);
        $subcategory = ProductSubCategory::find($request->subcategory_id);
        // Handle case where product is not found
        if (!$product) {
            return redirect()->back()->withErrors(['Product not found.']);
        }
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'category_id' => 'required|exists:product_categories,id',
            'subcategory_id' => 'required|exists:product_sub_categories,id',
            'name_en' => 'required|max:250',
            'name_ar' => 'required|max:250',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);
        // Check the Validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
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
        // Handle file upload (if needed) [brochure]
        if ($request->hasFile('brochure')) {
            $brochure = $product->slug . '_brochure.' . $request->file('brochure')->extension();
            $request->file('brochure')->storeAs('media/product_brochures', $brochure);
            // You might want to store the file path in the database if needed
            $product->brochure = $brochure;
            $product->save();
        }

        // Redirect or return a response
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('products.index');
    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        $product->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('products.index');
    }
}
