<?php

namespace App\Http\Controllers\Gt_manager\Storehouses;

use App\Models\Storehouse;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StorehousesController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {
        $storehouses = Storehouse::latest()->get();
        $governorates = Governorate::whereIn('id', $storehouses->pluck('governorate_id'))->pluck('name', 'id');

        return view('gt-manager.pages.storehouses.index',
            compact('storehouses' , 'governorates') );
    }
    // -------------------- Method -------------------- //
    public function create()
    {
        $governorates = Governorate::orderBy('name')->get();
        return view('gt-manager.pages.storehouses.create',
        compact('governorates'));
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

         // Create a new Storehouse instance with the validated data
         $storehouse = Storehouse::create([
            'seller_id' => 1,
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
        return redirect()->route('storehouses.index');

    }


}
