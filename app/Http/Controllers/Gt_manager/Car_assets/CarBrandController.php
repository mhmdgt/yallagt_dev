<?php

namespace App\Http\Controllers\Gt_manager\Car_assets;

use App\Models\CarBrand;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\GtManager\CarBrand\StoreCarBrandRequest;
use App\Http\Requests\GtManager\CarBrand\UpdateCarBrandRequest;

class CarBrandController extends Controller
{
    use ImageTrait;

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
        if ($request->hasFile('logo')) {
            $randomString = Str::random(16);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = Str::slug($request->name_en) . '-' . $randomString . '.' . $extension;
            $path = $request->file('logo')->storeAs('media/brand_logos', $imageName);
        } else {
            $path = null;
        }
        CarBrand::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'slug' => Str::slug($request->name_en),
            'logo' => $path,
        ]);

        Session::flash('success', 'Stored Successfully');
        return redirect()->route('car-brand.index');
    }
    // -------------------- update -------------------- //
    public function update(UpdateCarBrandRequest $request, CarBrand $carBrand)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Update logo if a new one is provided
        if ($request->hasFile('logo')) {
            $randomString = Str::random(16);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = Str::slug($request->name_en) . '-' . $randomString . '.' . $extension;
            $path = $request->file('logo')->storeAs('media/brand_logos', $imageName);
            $carBrand->update(['logo' => $path]);
        }

        // Update other fields
        $carBrand->update([
            'name' => [
                'en' => $validatedData['name_en'],
                'ar' => $validatedData['name_ar'],
            ],
            'slug' => Str::slug($validatedData['name_en']),
        ]);

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }
    // -------------------- destroy -------------------- //
    public function destroy(CarBrand $carBrand)
    {
        $carBrand->delete();
        
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('car-brand.index');
    }
}
