<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Models\Order;
use App\Models\UserCart;
use App\Models\Governorate;
use App\Models\UserAddress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethods;
use App\Models\ShippingService;
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
        $shippingServices = ShippingService::latest()->get();


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

        if (!$address) {
            // Validate the request data for the new address
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'phone' => 'string|max:255',
                'governorate_id' => 'exists:governorates,id',
                'area' => 'string|max:255',
                'building_number' => 'string|max:255',
                'street' => 'string|max:255',
                'full_address' => 'string|max:255',
                'gps_link' => 'nullable|url', // Ensure GPS link is a valid URL
            ]);


            // Add the authenticated user's ID to the validated data
            $validatedData['user_id'] = $user;

            // Save the validated data to the database and get the new address
            $address = UserAddress::create($validatedData);
        }

        // Generate a unique tracking number
        $trackingNum = uniqueRandEight();

        dd($request->input('payment_method_id'));
        dd($request->input('shippingService'));


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
            'shipping_service_id' => $request->shippingService,
            'payment_method_id' => $request->input('payment_method_id'),
            'total_price' => $request->input('total_price'),
            'status' => 'pending', // Default status
        ]);

        dd($order);


        return redirect()->back()->with('success', 'Order placed successfully');
    }

}
