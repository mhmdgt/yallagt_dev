<?php

namespace App\Http\Controllers\Yalla_gt\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('yalla-gt.pages.cart.checkout');
    }
}
