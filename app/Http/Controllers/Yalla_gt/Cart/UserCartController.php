<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Models\UserCart;
use App\Models\ProductSku;
use App\Models\UserCartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCartController extends Controller
{


    function store($product_sku)
    {

        dd($product_sku);
        $sku = ProductSku::WhereSku($product_sku)->first();

        $userCart = UserCart::whereUserId(auth()->id())->first();
        if ($userCart) {
            $userCart->update([
                "total_qty" => $userCart->total_qty + 1,
                "total_price" => $userCart->total_price + $sku->main_price
            ]);

            $userCartItem = UserCartItem::where('product_sku_id', $$sku->id)->first();
            if ($userCartItem) {
                $userCartItem->update([
                    "quantity" => $userCartItem->quantity + 1,
                    "total_price" => $userCartItem->total_price + $sku->main_price
                ]);
            } else {
                $userCart->cartItems()->create([
                    'product_sku_id' => $sku->id,
                    'total_price' => $sku->main_price
                ]);
            }
        } else {
            $userCart = UserCart::create([
                "user_id" => auth()->id(),
                "total_qty" => 1,
                "total_price" => $sku->main_price
            ]);
            $userCart->cartItems()->create([
                'product_sku_id' => $sku->id,
                'total_price' => $sku->main_price
            ]);
        }
    }
}
