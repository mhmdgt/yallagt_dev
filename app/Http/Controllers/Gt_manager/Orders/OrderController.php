<?php

namespace App\Http\Controllers\Gt_manager\Orders;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\Order;

class OrderController extends Controller
{
    public function pending()
    {
        $orders = Order::where('status', 'pending')->latest()->get();
        $governorates = Governorate::whereIn('id', $orders->pluck('governorate_id'))->pluck('name', 'id');
        return view('gt-manager.pages.orders.pending', compact('orders', 'governorates'));

    }
    public function edit($tracking_num)
    {
        $order = Order::where('tracking_num', $tracking_num)->with('OrderItems.productSku', 'OrderItems.productListing.seller')->get()->first();
        $governorates = Governorate::whereIn('id', $order->pluck('governorate_id'))->pluck('name', 'id');

        return view('gt-manager.pages.orders.pending_edit', compact('order', 'governorates'));

    }
    // -------------------- Method -------------------- //
    public function approve($tracking_num)
    {
        $order = Order::Where('tracking_num' , $tracking_num)->first();
        $order->update(['status' => 'approved']);
        return redirect()->route('orders.pending')->with('success', 'Approved successfully.');;
    }

}
