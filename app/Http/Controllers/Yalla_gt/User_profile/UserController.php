<?php

namespace App\Http\Controllers\Yalla_gt\User_profile;

use App\Models\SaleCar;
use App\Models\CarBrand;
use App\Models\EngineKm;
use App\Models\Governorate;
use App\Models\CarBrandModel;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('yalla-gt.pages.profile.index');
    }
    // -------------------- Method -------------------- //
    public function ads()
    {
        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the sale car ads related to the authenticated user
        $cars = SaleCar::where('created_by', $userId)
            ->where('created_type', 'user')
            ->latest()
            ->get();

        // Fetch the names corresponding to the IDs
        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');

        // dd($cars); // Uncomment for debugging

        return view('yalla-gt.pages.profile.ads',
        compact('cars', 'brands', 'models', 'transmissions', 'kms', 'governorates'));

    }

}
