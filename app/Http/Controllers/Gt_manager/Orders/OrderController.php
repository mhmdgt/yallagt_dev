<?php

namespace App\Http\Controllers\Gt_manager\Orders;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\ShippingCompany;

class OrderController extends Controller
{
    public function allPending()
    {
        $orders = Order::where('status', 'pending')->latest()->get();
        $governorates = Governorate::whereIn('id', $orders->pluck('governorate_id'))->pluck('name', 'id');
        return view('gt-manager.pages.orders.pending', compact('orders', 'governorates'));

    }
    // -------------------- Method -------------------- //
    public function pendingEdit($tracking_num)
    {
        $order = Order::where('tracking_num', $tracking_num)->with('OrderItems.productSku', 'OrderItems.productListing.seller')->get()->first();
        $governorates = Governorate::whereIn('id', $order->pluck('governorate_id'))->pluck('name', 'id');
        return view('gt-manager.pages.orders.pending_edit', compact('order', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function approveAction($tracking_num)
    {
        $order = Order::Where('tracking_num', $tracking_num)->first();
        $order->update(['status' => 'approved']);
        return redirect()->route('orders.all-pending')->with('success', 'Approved successfully.');
    }
    // -------------------- Method -------------------- //
    public function allApproved()
    {
        $orders = Order::where('status', 'approved')->latest()->get();
        $governorates = Governorate::whereIn('id', $orders->pluck('governorate_id'))->pluck('name', 'id');
        return view('gt-manager.pages.orders.approved', compact('orders', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function approvedEdit($tracking_num)
    {
        $order = Order::where('tracking_num', $tracking_num)->with('OrderItems.productSku', 'OrderItems.productListing.seller')->get()->first();
        $governorates = Governorate::whereIn('id', $order->pluck('governorate_id'))->pluck('name', 'id');
        $shippingCompanies = ShippingCompany::get();
        return view('gt-manager.pages.orders.approved_edit', compact('order', 'governorates', 'shippingCompanies'));
    }
    // -------------------- Method -------------------- //
    public function processingAction($tracking_num)
    {
        $order = Order::Where('tracking_num', $tracking_num)->first();
        $order->update(['status' => 'processing']);
        return redirect()->route('orders.all-approved')->with('success', 'Approved successfully.');
    }
    // -------------------- Method -------------------- //
    public function allProcessing()
    {
        $orders = Order::where('status', 'processing')->latest()->get();
        $governorates = Governorate::whereIn('id', $orders->pluck('governorate_id'))->pluck('name', 'id');
        return view('gt-manager.pages.orders.processing', compact('orders', 'governorates'));
    }

}
