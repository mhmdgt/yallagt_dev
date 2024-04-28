<?php

namespace App\Http\Controllers\Gt_manager\Product;

use App\Traits\SlugTrait;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\Product\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\GtManager\Product\ProductCategory\updateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    use SlugTrait, ImageTrait;
    function index()
    {
        $categories = ProductCategory::latest()->paginate(10, ['id', 'name', 'slug', 'logo']);
        return view('gt-manager.pages.product_assets.categories.index', compact('categories'));
    }



    function store(StoreProductCategoryRequest $request)
    {

        ProductCategory::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'product_categories', $request->name_en) :  null,
        ]);
        return back()->with('success', 'Product Category Created Successfully');
    }



    function show($slug)
    {
        
        $productCategory = ProductCategory::getByTranslatedSlug($slug)->with('productSubCategories')->first();
        // dd($productCategory);
        return view('gt-manager.pages.product_assets.categories.show', compact('productCategory'));
    }


    function update(updateProductCategoryRequest $request, $slug)
    {
        
        
        $productCategory = ProductCategory::getByTranslatedSlug($slug)->first();

        $productCategory->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'product_categories', $request->name_en, $productCategory->logo) : $productCategory->logo,
        ]);
        return back()->with('success', 'Product Category Updated Successfully');
    }

    function destroy($slug)
    {
        
        $productCategory = ProductCategory::wgetByTranslatedSlug($slug)->first();
        $this->deleteImage($productCategory->logo);
        $productCategory->delete();
        return redirect()->route('product-categories.index');
    }
}
