<?php

namespace App\Http\Controllers\Gt_manager\Sellers;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\Seller;
use App\Models\Storehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StorehousesController extends Controller
{
    // -------------------- Method -------------------- //
    public function index($seller)
    {
        $sellerData = Seller::Where('username' , $seller)->with('storehouses')->first();
        $storehouses = $sellerData->storehouses;
        $governorates = Governorate::whereIn('id', $storehouses->pluck('governorate_id'))->pluck('name', 'id');

        return view('gt-manager.pages.storehouses.index',
            compact('storehouses', 'governorates', 'sellerData'));
    }
    // -------------------- Method -------------------- //
    public function create($seller)
    {
        $sellerData = Seller::Where('username' , $seller)->with('storehouses')->first();
        $governorates = Governorate::orderBy('name')->get();

        return view('gt-manager.pages.storehouses.create',
            compact('governorates', 'sellerData'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:storehouses',
            'manager_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'landline' => 'nullable|numeric',
            'email' => 'nullable|email|max:255',
            'governorate' => 'required|exists:governorates,id',
            'area' => 'required|string|max:255',
            'building_number' => 'required|numeric',
            'street' => 'required|string|max:255',
            'full_address' => 'required|string|max:255',
            'gps_link' => 'nullable|string|max:255',
        ]);

        $sellerData = Seller::Where('id' , $request->seller_id)->with('storehouses')->first();

        // Create a new Storehouse instance with the validated data
        $storehouse = Storehouse::create([
            'seller_id' => $request->seller_id,
            'name' => $validatedData['name'],
            'manager_name' => $validatedData['manager_name'],
            'phone' => $validatedData['phone'],
            'landline' => $validatedData['landline'],
            'email' => $validatedData['email'],
            'governorate_id' => $validatedData['governorate'],
            'area' => $validatedData['area'],
            'building_number' => $validatedData['building_number'],
            'street' => $validatedData['street'],
            'full_address' => $validatedData['full_address'],
            'gps_link' => $validatedData['gps_link'],
        ]);

        Session::flash('success', 'Stored Successfully');
        return redirect()->route('storehouses.index', $sellerData->username );

    }
    // -------------------- Method -------------------- //
    public function edit($storehouse)
    {
        $storehouseData = Storehouse::Where('id', $storehouse)->get()->first();
        $seller = Seller::Where('id', $storehouseData->seller_id)->get()->first();
        $governorates = Governorate::latest()->get();

        return view('gt-manager.pages.storehouses.edit',
            compact('storehouseData', 'seller', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $storehouse)
    {
        $data = Storehouse::findOrFail($storehouse);

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
            'full_address' => 'nullable|string|max:255',
            'gps_link' => 'nullable|string|max:255',
        ]);

        $sellerData = Seller::Where('id' , $request->seller_id)->with('storehouses')->first();

        // Update the storehouse with validated data
        $data->update($validatedData);

        Session::flash('success', 'Updated Successfully');
        return redirect()->route('storehouses.index', $sellerData->username );


    }
}
