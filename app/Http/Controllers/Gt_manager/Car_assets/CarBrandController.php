<?php

namespace App\Http\Controllers\Gt_manager\Car_assets;

use App\Models\CarBrand;
use App\Traits\SlugTrait;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\CarBrand\StoreCarBrandRequest;
use App\Http\Requests\GtManager\CarBrand\UpdateCarBrandRequest;

class CarBrandController extends Controller
{
    use SlugTrait , ImageTrait;

    // -------------------- index -------------------- //
    public function index()
    {
        $brands = CarBrand::latest()->get();
        return view('gt-manager.pages.car_assets.brands', compact('brands'));
    }
    // -------------------- show -------------------- //
    public function show(CarBrand $carBrand)
    {
        $carBrand->with('models');
        return view('gt-manager.pages.car_assets.models', compact('carBrand'));

    }
    // -------------------- Store -------------------- //
    public function store(StoreCarBrandRequest $request)
    {
        CarBrand::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => Str::slug($request->name_en),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/brand_logos' ,$request->name_en) : null,
        ]);

        Session::flash('success', 'Stored Successfully');
        return redirect()->route('car-brand.index');
    }
    // -------------------- update -------------------- //
    public function update(UpdateCarBrandRequest $request, CarBrand $carBrand)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Update other fields
        $carBrand->update([
            'name' => [ 'en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar'], ],
            'slug' => Str::slug($validatedData['name_en']),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/brand_logos' ,$request->name_en, $carBrand->logo) : $carBrand->logo,
        ]);

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }
    // -------------------- destroy -------------------- //
    public function destroy(CarBrand $carBrand)
    {
        $this->deleteImage($carBrand->logo);
        $carBrand->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('car-brand.index');
    }
}
