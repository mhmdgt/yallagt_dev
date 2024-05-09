<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\EngineAspiration;
use App\Models\FuelType;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSku;
use App\Models\ProductSubCategory;
use App\Models\TemporaryFile;
use App\Models\TransmissionType;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

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
    public function tmpFilepondDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/product_imgs/' . $temporaryImages->name);
            $temporaryImages->delete();
            return 'Done!';
        } else {
            return response()->json(['error' => 'deleting file failed'], 400);
        }
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        // Properties
        $temporaryImages = TemporaryFile::all();
        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $category = ProductCategory::find($request->category_id);
        $subcategory = ProductSubCategory::find($request->subcategory_id);
        $firstImage = 1;
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
        $skus = $product->skus;

        return view('gt-manager.pages.product_assets.products.edit',
            compact('manufacturers', 'manufacturer', 'categories', 'category', 'subCategories', 'subCategory', 'product', 'images', 'skus'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $slug)
    {
        // Properties
        $temporaryImages = TemporaryFile::all();
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
            'sku' => 'required',
            'part_number' => 'required',
            'main_price' => 'required',
            'main_img' => 'required', // Ensure main_img is present
        ]);
        // Check the Validation
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/product_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
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
        // Handle file upload (if needed)
        if ($request->hasFile('brochure')) {
            $brochure = $product->slug . '_brochure.' . $request->file('brochure')->extension();
            $request->file('brochure')->storeAs('media/product_brochures', $brochure);
            // You might want to store the file path in the database if needed
            $product->brochure = $brochure;
            $product->save();
        }
        $sku = ProductSku::where('product_id', $product->id)->update([
            'product_id' => $product->id,
            'sku' => $request->sku, // Assuming 'suk' is the key for SKU in your request data
            'part_number' => $request->part_number,
            'main_price' => $request->main_price,
        ]);
        // Deleted removed images and leave only stayed images into the update request
        if ($request->has('images')) {
            // Get the list of image names from the request
            $requestedImageNames = collect($request->images)->pluck('name')->toArray();

            // Find the existing images associated with the stock car
            $existingImages = $product->images;

            // Store the main image ID before removal
            $mainImageId = null;
            foreach ($existingImages as $image) {
                if ($image->main_img === '1') {
                    $mainImageId = $image->id;
                    break;
                }
            }

            // Determine which images should be removed
            $imagesToRemove = [];
            foreach ($existingImages as $image) {
                if (!in_array($image->name, $requestedImageNames)) {
                    $imagesToRemove[] = $image->id;
                }
            }

            // Remove the images that are not included in the request
            $product->images()->whereIn('id', $imagesToRemove)->delete();

            // Update the names of the existing images
            foreach ($request->images as $imageData) {
                $imageName = $imageData['name'];
                $product->images()->where('name', $imageName)->update(['name' => $imageName]);
            }

            // If no new main image is selected, retain the existing main image
            if ($mainImageId) {
                $product->images()->where('id', $mainImageId)->update(['main_img' => '1']);
            }

            // Update the main_img value
            if (!$request->has('main_img')) {
                // Check if there are images in the request
                if (!empty($request->images)) {
                    // Get the ID of the first image in the request
                    $newMainImageId = key($request->images);
                } else {
                    // No images in the request, set main_img to null
                    $newMainImageId = null;
                }
            } else {
                $newMainImageId = $request->main_img;
            }

            // If main_img is null, set it to the ID of the first image in the request
            if ($newMainImageId === null && isset($request->images[0])) {
                $newMainImageId = $request->images[0]['id'];
            }

            // Reset main_img to 0 for all images except the new main image
            $product->images()->where('id', '!=', $newMainImageId)->update(['main_img' => '0']);

            // Set the new main_img value to 1 for the image with the new main image ID
            $product->images()->where('id', $newMainImageId)->update(['main_img' => '1']);

        }
        // Store new images
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/product_imgs/' . $temporaryImage->name,
                'media/product_imgs/' . $temporaryImage->name);

            // Skip setting the main_img value if it's explicitly provided in the request
            if (!$request->has('main_img')) {
                $mainImageId = $temporaryImage->id; // Assuming $temporaryImage->id is the ID of the newly added image
            }

            ProductImage::create([
                'product_id' => $product->id,
                'name' => $temporaryImage->name,
                'main_img' => "0",
            ]);

            Storage::delete('filepond-tmp/product_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
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
