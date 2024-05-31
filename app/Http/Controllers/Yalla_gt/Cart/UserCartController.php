<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Http\Controllers\Controller;
use App\Models\ProductListing;
use App\Models\ProductSku;
use App\Models\Seller;
use App\Models\UserCart;
use App\Models\UserCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {
        // Fetch the cart with related items, product SKUs, images, and listings
        $cart = UserCart::with(['UserCartItems.productSku.images' => function ($query) {
            $query->where('main_img', true);
        }, 'UserCartItems.productSku', 'UserCartItems.productListing.seller'])
            ->whereUserId(auth()->id())
            ->first();

        // Initialize the subtotal and total quantity
        $subtotal = 0;
        $totalQty = 0;

        // Calculate the subtotal and total quantity
        if ($cart && $cart->UserCartItems) {
            foreach ($cart->UserCartItems as $item) {
                $subtotal += $item->productListing->selling_price * $item->qty;
                $totalQty += $item->qty;
            }
        }

        // Pass the cart, subtotal, and total quantity to the view
        return view('yalla-gt.pages.cart.index', compact('cart', 'subtotal', 'totalQty'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request, $ProductListing)
    {

        // Ensure the user is authenticated
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->back()->with('fail', 'User not authenticated.');
        }

        // Retrieve the product SKU and listing
        $listing = ProductListing::findOrFail($ProductListing);
        $sku = ProductSku::where('sku', $listing->sku)->firstOrFail();

        // dd($listing);

        // Retrieve or create the user's cart
        $userCart = UserCart::firstOrCreate(
            ['user_id' => $userId]
        );

        // Get the quantity from the request
        $quantity = $request->input('quantity', 1);

        // Check if the cart item already exists
        $userCartItem = UserCartItem::where(['user_cart_id' => $userCart->id, 'product_listing_id' => $listing->id])
            ->where('product_sku_id', $sku->id)
            ->first();

        // Determine the current quantity in the cart and allowable quantity to add
        $currentQty = $userCartItem ? $userCartItem->qty : 0;
        $maxQty = 5;
        $allowableQty = $maxQty - $currentQty;

        if ($allowableQty <= 0) {
            return redirect()->back()->with('fail', 'You cannot add more than 5 of this item to your cart.');
        }

        if ($quantity > $allowableQty) {
            return redirect()->back()->with('fail', "You can only add $allowableQty more of this item to your cart.");
        }

        if ($userCartItem) {
            // Update the existing cart item
            // $listing = ProductListing::findOrFail($ProductListing);

            $newQty = $userCartItem->qty + $quantity;
            $userCartItem->update([
                'qty' => $newQty,
                'total_price_per_item' => $listing->selling_price * $newQty,
            ]);
        } else {
            // Create a new cart item
            $userCart->UserCartItems()->create([
                'user_id' => $userId,
                'seller_id' => $listing->seller_id,
                'product_listing_id' => $listing->id,
                'product_sku_id' => $sku->id,
                'sku' => $sku->sku,
                'qty' => $quantity,
                'total_price_per_item' => $listing->selling_price * $quantity,
            ]);
        }

        return redirect()->route('user-carts.index')->with('success', 'Added to Cart successfully.');
    }
    // -------------------- Method -------------------- //
    public function increment($userCartItemId, $qty)
    {

        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->increment('qty', $userCartItem->qty + $qty);
        $productPrice = ProductListing::where('sku', $userCartItem->sku)->first();

        $userCartItem->userCart()->update([]);
    }
    // -------------------- Method -------------------- //
    public function decrement($userCartItemId, $qty)
    {
        $userCartItem = UserCartItem::findOrFail($userCartItemId);
        $userCartItem->decrement('qty', $userCartItem->qty - $qty);
        $productPrice = ProductListing::where('sku', $userCartItem->sku)->first();
        $userCartItem->userCart()->update([
            "sub_total" => $userCartItem->userCart->sub_total - $productPrice->selling_price,
            "total_qty" => $userCartItem->userCart->total_qty - $qty,
        ]);
    }
    // -------------------- Method -------------------- //
    public function updateQuantity(Request $request, $id)
    {
        $userCartItem = UserCartItem::findOrFail($id);
        $newQty = $request->input('quantity');

        if ($newQty < 1 || $newQty > 5) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity.']);
        }

        $userCartItem->update([
            'qty' => $newQty,
            'total_price_per_item' => $userCartItem->productListing->selling_price * $newQty,
        ]);

        // $userCart = $userCartItem->userCart;
        // $userCart->update([
        //     'total_qty' => $userCart->UserCartItems->sum('qty'),
        //     'sub_total' => $userCart->UserCartItems->sum('total_price_per_item'),
        // ]);
        // Fetch the cart with related items, product SKUs, images, and listings
        $cart = UserCart::with(['UserCartItems.productSku.images' => function ($query) {
            $query->where('main_img', true);
        }, 'UserCartItems.productSku', 'UserCartItems.productListing.seller'])
            ->whereUserId(auth()->id())
            ->first();

        // Initialize the subtotal and total quantity
        $subtotal = 0;
        $totalQty = 0;

        // Calculate the subtotal and total quantity
        if ($cart && $cart->UserCartItems) {
            foreach ($cart->UserCartItems as $item) {
                $subtotal += $item->productListing->selling_price * $item->qty;
                $totalQty += $item->qty;
            }
        }

        return view('yalla-gt.pages.cart.update', compact('cart', 'subtotal', 'totalQty'));
        // return response()->json([
        //     'success' => true,
        //     'total_qty' => $userCart->total_qty,
        //     'sub_total' => $userCart->sub_total,
        //     'redirect' => route('user-carts.index'),
        // ]);
    }
    // -------------------- Method -------------------- //
    public function remove($itemID)
    {
        // Retrieve the UserCartItem by its ID, along with the related UserCart
        $item = UserCartItem::where('id', $itemID)->with('userCart')->first();

        if ($item) {
            // Update the total_qty and sub_total in UserCart
            $userCart = $item->userCart;
            if ($userCart) {
                // Decrement the total_qty by the quantity of the item being removed
                $userCart->total_qty -= $item->qty;

                // Decrement the sub_total by the total_price_per_item of the item being removed
                $userCart->sub_total -= $item->total_price_per_item;

                // Save the changes to the UserCart
                $userCart->save();
            }

            // Remove the item from the cart
            $item->delete();
        }

        // Optionally, you can return a response or redirect
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
