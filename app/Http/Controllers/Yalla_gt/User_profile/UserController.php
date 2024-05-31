<?php

namespace App\Http\Controllers\Yalla_gt\User_profile;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\EngineKm;
use App\Models\Governorate;
use App\Models\SaleCar;
use App\Models\SaleCondition;
use App\Models\TransmissionType;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {
        return view('yalla-gt.pages.profile.index');
    }
    // -------------------- Method -------------------- //
    public function editProfile($username)
    {
        $userData = User::where('username', '=', $username)->get()->first();
        return view('yalla-gt.pages.profile.edit', compact('userData'));
    }
    // -------------------- Method -------------------- //
    public function updateProfile(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $userData = User::find($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => [
                'required',
                'string',
                'regex:/^[a-z0-9_]+$/u', // Regex pattern for username
                'unique:users,username,' . $id,
            ],
            'phone' => 'required|numeric|unique:users,phone,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        // Check the Validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $userData->name = $request->name;
        $userData->username = $request->username;
        $userData->phone = $request->phone;
        $userData->email = $request->email;

        $userData->save();

        return redirect()->route('user.edit-profile', $request->username)->with('success', 'Updated Successfully');

    }
    // -------------------- Method -------------------- //
    public function changePassword($username)
    {
        $userData = User::where('username', $username)->get()->first();
        return view('yalla-gt.pages.profile.security.change-password', compact('userData'));

    }
    // -------------------- Method -------------------- //
    public function ads()
    {
        // Retrieve the authenticated user's ID
        // $userId = Auth::guard('web')->user()->id;
        $userId = Auth::id();

        // Retrieve the sale car ads related to the authenticated user
        $cars = SaleCar::where('created_by', $userId)
            ->where('created_user_type', 'user')
            ->latest()
            ->get();

        // Fetch the names corresponding to the IDs
        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');
        $conditions = SaleCondition::whereIn('id', $cars->pluck('condition'))->pluck('name', 'id');

        // dd($cars); // Uncomment for debugging
        return view('yalla-gt.pages.profile.ads',
            compact('conditions', 'cars', 'brands', 'models', 'transmissions', 'kms', 'governorates'));

    }
    // -------------------- Method -------------------- //
    public function addressesIndex()
    {

        $governorates = Governorate::orderBy('name')->get();
        $addresses = UserAddress::where('user_id', Auth::id())->get();

        // dd($addresses);

        return view('yalla-gt.pages.profile.addresses.index', compact('governorates', 'addresses'));

    }
    // -------------------- Method -------------------- //
    public function addressCreate()
    {
        $governorates = Governorate::orderBy('name')->get();
        return view('yalla-gt.pages.profile.addresses.create', compact('governorates'));
    }
    // -------------------- Method -------------------- //
    public function addressStore(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
            'area' => 'required|string|max:255',
            'building_number' => 'required',
            'street' => 'required|string|max:255',
            'full_address' => 'required|string|max:255',
            'gps_link' => 'nullable|url', // Ensure GPS link is a valid URL
            'type' => 'required|in:home,work',
        ]);

        // dd($validatedData);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = auth()->id();

        // Save the validated data to the database
        UserAddress::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('user.addressesIndex')->with('success', 'Address saved successfully.');
    }
    // -------------------- Method -------------------- //
    public function addressEdit($id)
    {
        $user_address = UserAddress::Where('id', $id)->get()->first();
        $governorates = Governorate::get();

        return view('yalla-gt.pages.profile.addresses.edit', compact('user_address', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function addressUpdate(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'governorate_id' => 'required|exists:governorates,id',
            'area' => 'required|string|max:255',
            'building_number' => 'required',
            'street' => 'required|string|max:255',
            'full_address' => 'required|string|max:255',
            'gps_link' => 'nullable|url', // Ensure GPS link is a valid URL
            'type' => 'required|in:home,work',
        ]);

        // Find the existing address by ID
        $user_address = UserAddress::findOrFail($id);

        // Update the address with the validated data
        $user_address->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('user.addressesIndex')->with('success', 'Address updated successfully.');
    }
}
