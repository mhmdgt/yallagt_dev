<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use SlugTrait;

    public function create()
    {
        $manufacturers = Manufacturer::latest()->get();
        return view('gt-manager.pages.product_assets.products.create_product', compact('manufacturers'));
    }
    public function store(Request $request)
    {
        $manufacturer = Manufacturer::find($request->manufacturer_id);

        // Create the product
        $product = Product::create([
            'manufacturer_id' => $manufacturer->id,
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'description' => ['en' => $request->description_en, 'ar' => $request->description_ar],
        ]);

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
        return redirect()->route('manufacturers.show', ['slug' => $manufacturer->slug]);
    }
    public function edit($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        $manufacturers = Manufacturer::latest()->get();
        $manufacturer = $product->manufacturer;
        return view('gt-manager.pages.product_assets.products.edit', compact('manufacturers' , 'manufacturer' , 'product'));
    }

    public function destroy($slug)
    {
        $product = Product::getByTranslatedSlug($slug)->first();
        $manufacturer = $product->manufacturer;
        $product->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('manufacturers.show', ['slug' => $manufacturer->slug]);
    }

}
