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


        $carts=UserCart::with('UserCartItems')->whereUserId(auth()->id())->first();
        return view('Yalla_gt.pages.cart.index',compact('carts'));
    }


    public function store($ProductSku)
    {

        $sku = ProductSku::where('sku', $ProductSku)->first();
        $listing = ProductListing::where('sku', $sku->sku)->first();
        $userCart = UserCart::whereUserId(auth()->id())->first();
        if ($userCart) {
            $userCart->update([
                "total_qty" => $userCart->total_qty + 1,
                "total_price" => $userCart->total_price + $listing->selling_price
            ]);

            $userCartItem = UserCartItem::where('product_sku_id', $sku->id)->first();
            if ($userCartItem) {
                $userCartItem->update([
                    "qty" => $userCartItem->qty + 1,
                    // "total_price" => $userCartItem->total_price + $listing->selling_price
                ]);
            } else {
                $userCart->UserCartItems()->create([
                    'product_sku_id' => $sku->id,
                    'sku' => $ProductSku
                ]);
            }
        } else {
            $userCart = UserCart::create([
                "user_id" => auth()->id(),
                "total_price" => $listing->selling_price
            ]);
            $userCart->UserCartItems()->create([
                'product_sku_id' => $sku->id,
                'sku' => $ProductSku
            ]);
        }
    }


    public function increment($userCartItemId,$qty)
    {

        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->increment('qty',  $userCartItem->qty + $qty);
        $productPrice=ProductListing::where('sku', $userCartItem->sku)->first();

        $userCartItem->userCart()->update([
            "total_price" => $userCartItem->userCart->total_price +  $productPrice->selling_price,
            "total_qty" => $userCartItem->userCart->total_qty + $qty
        ]);
    }
    function decrement($userCartItemId,$qty)
    {
        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->decrement('qty',  $userCartItem->qty - $qty);
        $productPrice=ProductListing::where('sku', $userCartItem->sku)->first();
        $userCartItem->userCart()->update([
            "total_price" => $userCartItem->userCart->total_price -  $productPrice->selling_price,
            "total_qty" => $userCartItem->userCart->total_qty - $qty
        ]);
    }





    

}
