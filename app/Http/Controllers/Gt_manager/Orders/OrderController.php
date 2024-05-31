<?php

namespace App\Http\Controllers\Gt_manager\Orders;

use App\Models\Order;
use App\Models\Governorate;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function pending()
    {
        $orders = Order::where('status', 'pending')->latest()->get();
        $governorates = Governorate::whereIn('id', $orders->pluck('governorate_id'))->pluck('name', 'id');

        // dd($governorates);
        return view('gt-manager.pages.orders.pending', compact('orders' , 'governorates'));

    }
}
