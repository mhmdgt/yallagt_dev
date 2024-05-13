<?php

namespace App\Http\Controllers\Yalla_gt\Product;

use App\Models\Product;
use App\Traits\SlugTrait;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use App\Http\Controllers\Controller;

class ShowProductController extends Controller
{
    use SlugTrait;

    public function item($slug , $sku)
    {
        $skuData = ProductSku::where('sku', '=', $sku)->get()->first();

        $product = Product::getByTranslatedSlug($slug)->first();

        return view('yalla-gt.pages.products.item');

    }
}
