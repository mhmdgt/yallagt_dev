<?php

namespace App\Http\Controllers\Gt_manager\Car_assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\CarBrandModel\StoreCarBrandModelRequest;
use App\Http\Requests\GtManager\CarBrandModel\UpdateCarBrandModelRequest;
use App\Models\CarBrandModel;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CarBrandModelController extends Controller
{
    // -------------------- Store Brand Models Method -------------------- //
    public function store(StoreCarBrandModelRequest $request)
    {
        CarBrandModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,

            ],
            "car_brand_id" => $request->car_brand_id,
            "slug" => Str::slug($request->name_en),

        ]);

        Alert::success('Success Message', 'Data processed successfully!');
        return response()->json(['success', 'success']);
    }

    // -------------------- Update Brand Models Method -------------------- //
    public function update(UpdateCarBrandModelRequest $request, CarBrandModel $carBrandModel)
    {

        $carBrandModel->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            "slug" => Str::slug($request->name_en),
        ]);
        Alert::success('success', 'Your brand model has been Updated');
        return response()->json(['success' => "success"]);
    }

    // -------------------- Delete Brand Models Method -------------------- //
    public function destroy(CarBrandModel $carBrandModel)
    {
        $carBrandModel->delete();
        Alert::success('Successfully', 'Your brand model has been deleted');
        return redirect()->back();
    }

} // End Class
