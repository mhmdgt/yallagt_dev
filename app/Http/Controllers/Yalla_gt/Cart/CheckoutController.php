<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\UserAddress;
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

        // dd($address);

        return view('yalla-gt.pages.cart.checkout',
            compact('address', 'governorates'
            ));
    }
}
