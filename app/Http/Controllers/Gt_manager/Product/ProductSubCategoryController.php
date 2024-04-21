<?php

namespace App\Http\Controllers\Gt_manager\Product;

use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\Product\ProductSubCategory\StoreProductSubCategoryRequest;
use App\Http\Requests\GtManager\Product\ProductSubCategory\updateProductSubCategoryRequest;
use App\Traits\ImageTrait;

class ProductSubCategoryController extends Controller
{
    use SlugTrait,ImageTrait;
    function store(StoreProductSubCategoryRequest $request)
    {

        ProductSubCategory::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'product_subcategories',$request->name_en) : null,
            'product_category_id' => $request->product_category_id
        ]);
        return back()->with('success', 'Product subcategory Created Successfully');
    }




    function update(updateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        $productSubCategory->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'product_categories',$request->name_en, $productSubCategory->logo) : $productSubCategory->logo,
        ]);
        return back()->with('success', 'Product Category Updated Successfully');
    }

    function destroy(ProductSubCategory $productSubCategory)
    {
        $this->deleteImage($productSubCategory->logo);
        $productSubCategory->delete();
        return redirect()->back();
    }
}
