<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Models\UserCart;
use App\Models\ProductSku;
use App\Models\UserCartItem;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {



     
        // Eager load the related ProductSku data along with images
        $cart = UserCart::with(['UserCartItems.productSku.images' => function ($query) {
            // Limit images to only main images
            $query->where('main_img', true);
        }])->whereUserId(auth()->id())->first();

        // Get the UserCartItems collection
        $cartItems = $cart->UserCartItems;

        // Retrieve the listing data for each SKU
        $listings = [];
        foreach ($cartItems as $cartItem) {
            $listing = ProductListing::where('sku', $cartItem->sku)->first();
            $listings[$cartItem->sku] = $listing;
        }

        $listing = $listings[$cartItem->sku];

        // For debugging, use dd to inspect the data structure
        // dd( $listing);

        // Pass the cart items and listings to the view
        return view('yalla-gt.pages.cart.index', compact('cart', 'cartItems', 'listing'));

    }

    // -------------------- Method -------------------- //
    public function store($ProductSku)
    {

        $sku = ProductSku::where('sku', $ProductSku)->first();
        $listing = ProductListing::where('sku', $sku->sku)->first();
        $userCart = UserCart::whereUserId(auth()->id())->first();
        if ($userCart) {
            $userCart->update([
                "total_qty" => $userCart->total_qty + 1,
                "sub_total" => $userCart->sub_total + $listing->selling_price
            ]);

            $userCartItem = UserCartItem::where('product_sku_id', $sku->id)->first();
            if ($userCartItem) {
                $userCartItem->update([
                    "qty" => $userCartItem->qty + 1,

                    // "total_price" => $userCartItem->total_price + $listing->selling_price

                    // "sub_total" => $userCartItem->sub_total + $listing->selling_price

                ]);
            } else {
                $userCart->UserCartItems()->create([
                    'user_id' => auth()->id(),
                    'product_sku_id' => $sku->id,
                    'sku' => $ProductSku
                ]);
            }
        } else {
            $userCart = UserCart::create([
                "user_id" => auth()->id(),

                "total_price" => $listing->selling_price,

                "sub_total" => $listing->selling_price

            ]);
            $userCart->UserCartItems()->create([
                'user_id' => auth()->id(),
                'product_sku_id' => $sku->id,
                'sku' => $ProductSku
            ]);
        }

        return redirect()->back()->with('success', 'Add To Cart successfully.');
    }

    // -------------------- Method -------------------- //

    public function increment($userCartItemId,$qty)
    {

        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->increment('qty',  $userCartItem->qty + $qty);
        $productPrice=ProductListing::where('sku', $userCartItem->sku)->first();

        $userCartItem->userCart()->update([
           "total_price" => $userCartItem->userCart->total_price +  $productPrice->selling_price,
            "total_qty" => $userCartItem->userCart->total_qty + $qty,
     
    

            "sub_total" => $userCartItem->userCart->sub_total +  $productPrice->selling_price,
            "total_qty" => $userCartItem->userCart->total_qty + $qty
        ]);
    }
    // -------------------- Method -------------------- //

    function decrement($userCartItemId,$qty)
    {
        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->decrement('qty',  $userCartItem->qty - $qty);
        $productPrice=ProductListing::where('sku', $userCartItem->sku)->first();
        $userCartItem->userCart()->update([

            "total_price" => $userCartItem->userCart->total_price -  $productPrice->selling_price,

            "sub_total" => $userCartItem->userCart->sub_total -  $productPrice->selling_price,

            "total_qty" => $userCartItem->userCart->total_qty - $qty
        ]);
    }





}
