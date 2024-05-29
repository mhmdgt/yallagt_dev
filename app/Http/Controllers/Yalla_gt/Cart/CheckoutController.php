<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Models\Order;
use App\Models\UserCart;
use App\Models\OrderItem;
use App\Models\Governorate;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\PaymentMethods;
use App\Models\ShippingService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->back()->with('fail', 'User not authenticated.');
        }

        $address = UserAddress::where('user_id', $userId)->latest()->first();
        $governorates = Governorate::orderBy('name')->get();
        $paymentMethods = PaymentMethods::whereIn('id', [2])->first();
        $shippingServices = ShippingService::get();

        $cart = UserCart::with(['UserCartItems.productSku.images' => function ($query) {
            // Limit images to only main images
            $query->where('main_img', true);
        }, 'UserCartItems.productSku', 'UserCartItems.productListing'])->whereUserId(auth()->id())->first();

        // dd($cart);

        return view('yalla-gt.pages.cart.checkout',
            compact('address', 'governorates', 'paymentMethods', 'shippingServices', 'cart'
            ));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
{
    // Check if the user has an address
    $user = auth()->user()->id;
    $cart = UserCart::with(['UserCartItems.productSku.images' => function ($query) {
        // Limit images to only main images
        $query->where('main_img', true);
    }, 'UserCartItems.productSku', 'UserCartItems.productListing'])->whereUserId(auth()->id())->first();
    $address = UserAddress::Where('user_id', $user)->latest()->first();

    // Validate the Address Request if not added
    if (!$address) {
        // Validate the request data for the new address
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
            'area' => 'required|string|max:255',
            'building_number' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'full_address' => 'required|string|max:255',
            'gps_link' => 'nullable|url',
            'type' => 'required|in:home,work',
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = $user;

        // Save the validated data to the database and get the new address
        $address = UserAddress::create($validatedData);
    }

    // Generate The VARS
    $trackingNum = uniqueRandEight();
    $shipping_fee = $request->shippingService;
    $total_price = $cart->sub_total + $shipping_fee;

    // Create the order using the address data
    $order = Order::create([
        'user_id' => $user,
        'user_address_id' => $address->id,
        'tracking_num' => $trackingNum,
        'name' => $address->name,
        'phone' => $address->phone,
        'governorate_id' => $address->governorate_id,
        'area' => $address->area,
        'building_number' => $address->building_number,
        'street' => $address->street,
        'full_address' => $address->full_address,
        'gps_link' => $address->gps_link,
        'type' => $address->type,
        'total_qty' => $cart->total_qty,
        'sub_total' => $cart->sub_total,
        'shipping_service_id' => $request->shippingServiceId,
        'shipping_service_fee' => $shipping_fee,
        'payment_method_id' => $request->payment_method_id,
        'payment_method_name' => $request->paymentMethod,
        'total_price' => $total_price,
        'status' => 'pending', // Default status
    ]);

    // Transfer cart items to order items
    foreach ($cart->UserCartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'seller_id' => $cartItem->seller_id,
            'user_id' => $cartItem->user_id,
            'product_listing_id' => $cartItem->product_listing_id,
            'product_sku_id' => $cartItem->product_sku_id,
            'sku' => $cartItem->sku,
            'qty' => $cartItem->qty,
            'total_price_per_item' => $cartItem->total_price_per_item,
        ]);
    }

    // Clear the user's cart after creating the order
    $cart->UserCartItems()->delete();
    $cart->delete();

    return redirect()->route('yalla-index')->with('success', 'Order placed successfully');
}


}
