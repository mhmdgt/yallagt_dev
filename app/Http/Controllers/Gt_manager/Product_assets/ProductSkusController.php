<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\ProductSkuImage;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductSkusController extends Controller
{
    // -------------------- Method -------------------- //
    public function index($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->with('manufacturer', 'skus', 'skus.images')->first();
        return view('gt-manager.pages.product_assets.product_skus.index', compact('product'));
    }
    // -------------------- Method -------------------- //
    public function create($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        return view('gt-manager.pages.product_assets.product_skus.create', compact('product'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request, $slug)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
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
        $product = Product::getByTranslatedSlug($slug)->with('manufacturer', 'skus', 'skus.images')->first();
        $sku = generateUniqueId();
        $firstImage = 1;

        // dd($validator);

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
                'name' => 'media/product_sku_imgs/' . $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/product_sku_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('product-skus.index', $product->slug);
    }
    // -------------------- Method -------------------- //
    public function edit($sku)
    {
        $skuData = ProductSku::where('sku', '=', $sku)->get()->first();
        $productID = $skuData->product_id;
        $product = Product::where('id', '=', $productID)->get()->first();
        return view('gt-manager.pages.product_assets.product_skus.edit', compact('product', 'skuData'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $sku)
    {
        // Properties
        $skuData = ProductSku::with('images')->where('sku', $sku)->first();
        $productID = $skuData->product_id;
        $product = Product::where('id', '=', $productID)->get()->first();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'sku_name_en' => 'required|max:250',
            'sku_name_ar' => 'required|max:250',
            'part_number' => 'required',
            'main_price' => 'required',
            'main_img' => 'required',
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

        // Update the SKU
        $skuData->update([
            'sku_name' => ['en' => $request->sku_name_en, 'ar' => $request->sku_name_ar],
            'part_number' => $request->part_number,
            'main_price' => $request->main_price,
            'status' => $request->status,
        ]);

        // Deleted removed images and leave only stayed images into the update request
        if ($request->has('images')) {
            // Get the list of image names from the request
            $requestedImageNames = collect($request->images)->pluck('name')->toArray();

            // Find the existing images associated with the stock car
            $existingImages = $skuData->images;

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
            $skuData->images()->whereIn('id', $imagesToRemove)->delete();

            // Update the names of the existing images
            foreach ($request->images as $imageData) {
                $imageName = $imageData['name'];
                $skuData->images()->where('name', $imageName)->update(['name' => $imageName]);
            }

            // If no new main image is selected, retain the existing main image
            if ($mainImageId) {
                $skuData->images()->where('id', $mainImageId)->update(['main_img' => '1']);
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
            $skuData->images()->where('id', '!=', $newMainImageId)->update(['main_img' => '0']);

            // Set the new main_img value to 1 for the image with the new main image ID
            $skuData->images()->where('id', $newMainImageId)->update(['main_img' => '1']);

        }

        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/product_sku_imgs/' . $temporaryImage->name,
                'media/product_sku_imgs/' . $temporaryImage->name);

            ProductSkuImage::create([
                'sku_id' => $skuData->id,
                'name' => $temporaryImage->name,
                'main_img' => "0",
            ]);

            Storage::delete('filepond-tmp/product_sku_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        // Redirect or return a response
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('product-skus.index', $product->slug);
    }
    // -------------------- Method -------------------- //
    public function destroy($sku)
    {
        $skuData = ProductSku::where('sku', '=', $sku)->get()->first();
        $skuData->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('products.index');
    }
}
