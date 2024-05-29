<?php

namespace App\Http\Controllers\Gt_manager\Shipping;

use App\Http\Controllers\Controller;
use App\Models\ShippingService;
use Illuminate\Http\Request;

class ShippingServiceController extends Controller
{
    public function index()
    {
        $services = ShippingService::latest()->get();
        return view('gt-manager.pages.shipping.services.index', compact('services'));
    }
    // -------------------- index -------------------- //
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name_en' => 'required|string|max:255|unique:shipping_services,name->en',
            'name_ar' => 'required|string|max:255|unique:shipping_services,name->ar',
            'fee' => 'required|numeric|min:0',
        ]);

        // Create the ShippingService record
        ShippingService::create([
            'name' => ['en' => $validated['name_en'], 'ar' => $validated['name_ar']],
            'fee' => $validated['fee'],
        ]);

        return redirect()->back()->with('success', 'Stored Successfully');
    }
    // -------------------- index -------------------- //
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name_en' => 'required|string|max:255|unique:shipping_services,name->en,' . $id,
            'name_ar' => 'required|string|max:255|unique:shipping_services,name->ar,' . $id,
            'fee' => 'required|numeric|min:0',
        ]);

        // Retrieve the specific ShippingService record
        $serviceData = ShippingService::findOrFail($id);

        // Update the ShippingService record
        $serviceData->update([
            'name' => ['en' => $validated['name_en'], 'ar' => $validated['name_ar']],
            'fee' => $validated['fee'],
        ]);

        return redirect()->back()->with('success', 'Updated Successfully');
    }

}
