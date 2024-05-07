<?php

namespace App\Http\Controllers\Gt_manager\Sale_cars;

use App\Models\Color;
use App\Models\CarBrand;
use App\Models\EngineCc;
use App\Models\EngineKm;
use App\Models\FuelType;
use App\Models\BodyShape;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\EngineAspiration;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;

class SaleCarsController extends Controller
{
    // -------------------- Yallagt Index -------------------- //
    public function gtCreate()
    {
        $brands = CarBrand::orderBy('name')->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $shapes = BodyShape::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $trans_types = TransmissionType::orderBy('name')->get();
        $FuelTypes = FuelType::orderBy('name')->get();
        $EngineAspirations = EngineAspiration::orderBy('name')->get();
        $EngineKMS = EngineKm::orderBy('name')->get();
        $engineCCS = EngineCc::orderBy('name')->get();
        $governorates = Governorate::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();

        // dd($governorates);

        return view('yalla-gt.pages.sale_cars.create',
        compact('brands','models','trans_types','shapes','EngineAspirations','FuelTypes','colors','engineCCS','EngineKMS','features','governorates'));

    }
    public function gtStore(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'condition' => 'required',
            'payment' => 'required',
            'price' => 'required',
            'description' => 'required',
            'bodyShape' => 'required',
            'transmission' => 'required',
            'fuelType' => 'required',
            'cc' => 'required',
            'aspiration' => 'required',
            'km' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
            'governorate' => 'required',
            'area' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors());
        }

    //    dd($validator);

    }
    // -------------------- Create car for sale -------------------- //
    public function live()
    {
        return view('gt-manager.pages.sale_cars.live');

    }
    // -------------------- Create car for sale -------------------- //
    public function create()
    {
        return view('gt-manager.pages.sale_cars.create');

    }
}
