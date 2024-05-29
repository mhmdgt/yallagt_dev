<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Traits\SlugTrait;
use App\Traits\ImageTrait;

use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\Product\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\GtManager\Product\ProductCategory\updateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    use SlugTrait, ImageTrait;

    // -------------------- Method -------------------- //
    function index()
    {
        $categories = ProductCategory::latest()->paginate(10, ['id', 'name', 'slug', 'logo']);
        return view('gt-manager.pages.product_assets.categories.index', compact('categories'));
    }
    // -------------------- Method -------------------- //
    function store(StoreProductCategoryRequest $request)
    {
        ProductCategory::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/product_categories' ,$request->name_en):  null,
        ]);
        return back()->with('success', 'Created Successfully');
    }
    // -------------------- Method -------------------- //
    function show($slug)
    {
        $productCategory = ProductCategory::getByTranslatedSlug($slug)->with('productSubCategories')->first();
        return view('gt-manager.pages.product_assets.categories.show', compact('productCategory'));
    }
    // -------------------- Method -------------------- //
    function update(updateProductCategoryRequest $request, $slug)
    {
        $productCategory = ProductCategory::getByTranslatedSlug($slug)->first();
        $productCategory->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/product_categories' ,$request->name_en, $productCategory->logo) : $productCategory->logo,
        ]);

        Session::flash('success', 'Updated Successfully');
        return redirect()->route('product-categories.show' , $productCategory->slug);
    }
    // -------------------- Method -------------------- //
    function destroy($slug)
    {
        $productCategory = ProductCategory::getByTranslatedSlug($slug)->first();
        $this->deleteImage($productCategory->logo);
        $productCategory->delete();
        return redirect()->route('product-categories.index')->with('success', 'Deleted Successfully');;
    }
}
