<?php

namespace App\Http\Controllers\Gt_manager\Car_assets;

use App\Models\CarBrand;
use App\Traits\SlugTrait;
use Illuminate\Support\Str;
use App\Models\CarBrandModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\CarBrandModel\StoreCarBrandModelRequest;
use App\Http\Requests\GtManager\CarBrandModel\UpdateCarBrandModelRequest;

class CarBrandModelController extends Controller
{
    use SlugTrait;

    public function getModelsByBrand($brandId)
    {
        $brand = CarBrand::findOrFail($brandId);
        $models = $brand->models()->select('id', 'name')->get();
        return response()->json($models);
    }
    // -------------------- Store Brand Models Method -------------------- //
    public function store(StoreCarBrandModelRequest $request)
    {
        // Validate the request and get the validated data
        $validatedData = $request->validated();

        // Create a new CarBrandModel instance with the validated data
        $carBrandModel = CarBrandModel::create([
            'name' => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            "car_brand_id" => $request->car_brand_id,
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
        ]);

        // Flash success message and redirect back
        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }
    // -------------------- Update Brand Models Method -------------------- //
    public function update(UpdateCarBrandModelRequest $request, $slug)
    {
        $carBrandModel = CarBrandModel::getByTranslatedSlug($slug)->first();

        // Validate the request and get the validated data
        $validatedData = $request->validated();

        // Update the CarBrandModel instance with the validated data
        $carBrandModel->update([
            'name' => [
                'en' => $validatedData['name_en'],
                'ar' => $validatedData['name_ar'],
            ],
            "slug" => Str::slug($validatedData['name_en']),
        ]);

        // Flash success message and redirect back
        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }
    // -------------------- Delete Brand Models Method -------------------- //
    public function destroy($slug)
    {
        $carBrandModel = CarBrandModel::getByTranslatedSlug($slug)->first();
        $carBrandModel->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->back();
    }
} // End Class
