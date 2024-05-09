<?php

namespace App\Http\Controllers\Gt_manager\Sale_cars;

use App\Http\Controllers\Controller;
use App\Models\BodyShape;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\Color;
use App\Models\EngineAspiration;
use App\Models\EngineCc;
use App\Models\EngineKm;
use App\Models\Feature;
use App\Models\FuelType;
use App\Models\Governorate;
use App\Models\SaleCar;
use App\Models\TransmissionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SaleCarsController extends Controller
{
    public function getModelsByBrand($brandId)
    {
        $brand = CarBrand::findOrFail($brandId);
        $models = $brand->models()->select('id', 'name')->get();

        // Return the models data as JSON
        return response()->json($models);
    }
    // -------------------- Method -------------------- //
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
            compact('brands', 'models', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function create()
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

        return view('gt-manager.pages.sale_cars.create',
            compact('brands', 'models', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'governorates'));

    }
    // -------------------- Method -------------------- //
    public function gtEdit($slug)
    {
        $car = SaleCar::where('slug', $slug)->firstOrFail();
        // dd($car->description);
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

        return view('yalla-gt.pages.sale_cars.edit',
        compact('car', 'brands', 'models', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function edit($slug)
    {
        $car = SaleCar::where('slug', $slug)->firstOrFail();
        // dd($car->description);
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

        return view('gt-manager.pages.sale_cars.edit',
        compact('car', 'brands', 'models', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        // dd($request);
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
            'features' => 'required',
            'aspiration' => 'required',
            'km' => 'required',
            'governorate' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // Get the names corresponding to the IDs
        $brand = CarBrand::findOrFail($request->input('brand'))->name;
        $model = CarBrandModel::findOrFail($request->input('model'))->name;
        $trans = TransmissionType::findOrFail($request->input('transmission'))->name;
        $condition = $request->input('condition');
        $year = $request->input('year');
        $uniqueId = generateUniqueId();
        $slug = implode('-', [$condition, $brand, $model, $trans, $year, $uniqueId]);
        $slug = str_replace(' ', '-', $slug);
        $selectedFeatures = $request->input('features', []);
        $featuresJson = json_encode($selectedFeatures);

        // Create a new SaleCar instance and populate its properties
        $saleCar = new SaleCar();
        $saleCar->slug = $slug;
        $saleCar->brand = $request->input('brand');
        $saleCar->model = $request->input('model');
        $saleCar->year = $request->input('year');
        $saleCar->color = $request->input('color');
        $saleCar->condition = $request->input('condition');
        $saleCar->payment = $request->input('payment');
        $saleCar->price = $request->input('price');
        $saleCar->description = $request->input('description');
        $saleCar->bodyShape = $request->input('bodyShape');
        $saleCar->transmission = $request->input('transmission');
        $saleCar->fuelType = $request->input('fuelType');
        $saleCar->cc = $request->input('cc');
        $saleCar->features = $featuresJson;
        $saleCar->aspiration = $request->input('aspiration');
        $saleCar->km = $request->input('km');
        $saleCar->governorate = $request->input('governorate');
        $saleCar->user_name = $request->input('user_name');
        $saleCar->phone = $request->input('phone');
        $saleCar->phone = $request->input('phone');

        // Save the SaleCar instance to the database
        $saleCar->save();

        // dd($saleCar->user_name);

        Session::flash('success', 'Stored Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function live()
    {
        $cars = SaleCar::where('status', 'approved')->get();

        // Fetch the names corresponding to the IDs
        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');

        // Pass the data to the view
        return view('gt-manager.pages.sale_cars.live',
            compact('cars', 'brands', 'models', 'transmissions', 'kms', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function pending()
    {
        $cars = SaleCar::where('status', 'pending')->get(); // Fetch pending cars from the database

        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');

        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');

        return view('gt-manager.pages.sale_cars.pending',
            compact('cars', 'brands', 'models', 'transmissions', 'kms', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function approve($slug)
    {
        $car = SaleCar::where('slug', $slug)->firstOrFail();
        $car->update(['status' => 'approved']);
        Session::flash('success', 'Approved Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function decline($slug)
    {
        $car = SaleCar::where('slug', $slug)->firstOrFail();
        $car->update(['status' => 'declined']);
        Session::flash('success', 'Declined Successfully');
        return redirect()->back();
    }

}
