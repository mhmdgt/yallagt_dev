<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Models\UserCart;
use App\Models\ProductSku;
use App\Models\UserCartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductListing;

class UserCartController extends Controller
{
    public function index()
    {
        dd('hi');
    }


    public function store($ProductSku)
    {

        $sku = ProductSku::where('sku', $ProductSku)->first();
        $listing = ProductListing::where('sku', $sku->sku)->first();

        // dd($listing->selling_price);

        $userCart = UserCart::whereUserId(auth()->id())->first();
        if ($userCart) {
            $userCart->update([
                "total_qty" => $userCart->total_qty + 1,
                "total_price" => $userCart->total_price + $listing->selling_price
            ]);

            $userCartItem = UserCartItem::where('product_sku_id', $sku->id)->first();
            if ($userCartItem) {
                $userCartItem->update([
                    "quantity" => $userCartItem->quantity + 1,
                    "total_price" => $userCartItem->total_price + $listing->selling_price
                ]);
            } else {
                $userCart->UserCartItems()->create([
                    'product_sku_id' => $sku->id,
                    'total_price' => $listing->selling_price
                ]);
            }
        } else {
            $userCart = UserCart::create([
                "user_id" => auth()->id(),
                "total_qty" => 1,
                "total_price" => $listing->selling_price
            ]);
            $userCart->UserCartItems()->create([
                'product_sku_id' => $sku->id,
                'total_price' => $listing->selling_price
            ]);
        }
    }
}
