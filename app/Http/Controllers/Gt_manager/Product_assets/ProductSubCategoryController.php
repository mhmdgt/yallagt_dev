<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\Product\ProductSubCategory\StoreProductSubCategoryRequest;
use App\Http\Requests\GtManager\Product\ProductSubCategory\updateProductSubCategoryRequest;
use App\Models\ProductSubCategory;
use App\Traits\ImageTrait;
use App\Traits\SlugTrait;

class ProductSubCategoryController extends Controller
{
    use SlugTrait, ImageTrait;

    // -------------------- Method -------------------- //
    public function store(StoreProductSubCategoryRequest $request)
    {
        dd($request->hasFile('logo'));

        ProductSubCategory::create([
            'product_category_id' => $request->product_category_id,
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/product_subcategories', $request->name_en) : null,
        ]);

        return back()->with('success', 'Created Successfully');
    }
    // -------------------- Method -------------------- //
    public function update(updateProductSubCategoryRequest $request, $slug)
    {
        $productSubCategory = ProductSubCategory::getByTranslatedSlug($slug)->first();
        $productSubCategory->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/product_subcategories', $request->name_en, $productSubCategory->logo) : $productSubCategory->logo,

        ]);

        return back()->with('success', 'Updated Successfully');
    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $productSubCategory = ProductSubCategory::getByTranslatedSlug($slug)->first();
        $this->deleteImage($productSubCategory->logo);
        $productSubCategory->delete();
        return redirect()->back();
    }
}
