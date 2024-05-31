<?php

namespace App\Http\Controllers\Gt_manager\Shipping;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\ShippingCompany;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ShippingCompanyController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {
        $companies = ShippingCompany::latest()->get();
        return view('gt-manager.pages.shipping.companies.index', compact('companies'));
    }
    // -------------------- Method -------------------- //
    public function create()
    {
        $governorates = Governorate::orderBy('name')->get();

        return view('gt-manager.pages.shipping.companies.create',
            compact('governorates'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:shipping_companies',
            'manager_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'landline' => 'nullable|numeric',
            'email' => 'nullable|email|max:255',
            'governorate' => 'required|exists:governorates,id',
            'area' => 'required|string|max:255',
            'building_number' => 'required|numeric',
            'street' => 'required|string|max:255',
            'headquarter_address' => 'required|string|max:255',
            'gps_link' => 'nullable|string|max:255',
        ]);

        // Create a new Storehouse instance with the validated data
        $company = ShippingCompany::create([
            'name' => $validatedData['name'],
            'manager_name' => $validatedData['manager_name'],
            'phone' => $validatedData['phone'],
            'landline' => $validatedData['landline'],
            'email' => $validatedData['email'],
            'governorate_id' => $validatedData['governorate'],
            'area' => $validatedData['area'],
            'building_number' => $validatedData['building_number'],
            'street' => $validatedData['street'],
            'headquarter_address' => $validatedData['headquarter_address'],
            'gps_link' => $validatedData['gps_link'],
        ]);

        return redirect()->route('shipping-company.index')->with('success', 'Stored Successfully');

    }
    // -------------------- Method -------------------- //
    public function edit($id)
    {
        $company = ShippingCompany::findOrFail($id);
        $governorates = Governorate::latest()->get();

        return view('gt-manager.pages.shipping.companies.edit',
            compact('company', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $id)
    {
        $data = ShippingCompany::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'landline' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'governorate_id' => 'required|integer|exists:governorates,id',
            'area' => 'nullable|string|max:255',
            'building_number' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'headquarter_address' => 'nullable|string|max:255',
            'gps_link' => 'nullable|string|max:255',
        ]);


        // Update the storehouse with validated data
        $data->update($validatedData);

        // Session::flash('success', 'Updated Successfully');
        return redirect()->route('shipping-company.index')->with('success', 'Updated Successfully');
    }
}

