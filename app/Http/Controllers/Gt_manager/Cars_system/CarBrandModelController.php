<?php

namespace App\Http\Controllers\Gt_manager\Cars_system;

use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CarBrandModel;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\CarBrandMode\StoreCarBrandModelRequest;
use App\Http\Requests\GtManager\CarBrandMode\UpdateCarBrandModelRequest;

class CarBrandModelController extends Controller
{
        // -------------------- Show Brand Models Method -------------------- //
        public function AllBrandModels ($id)
        {
            confirmDelete('Delete Brand!', 'Are you sure you want to delete?');

            $car_brand = CarBrand::with('models')->find($id);
            return view('gt-manager.cars_assets.brand_models', compact('car_brand'));
        }

        // -------------------- Store Brand Models Method -------------------- //
        public function store(StoreCarBrandModelRequest $request)
        {
                CarBrandModel::create([
                    'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar,

                    ],
                    "car_brand_id"=>$request->car_brand_id,
                    "slug"=>Str::slug($request->name_en)

                ]);

            Alert::success('Success Message', 'Data processed successfully!');
            return  response()->json(['success', 'success']);
        }

        // -------------------- Update Brand Models Method -------------------- //
        public function update(UpdateCarBrandModelRequest $request, CarBrandModel $carBrandModel)
        {

            $carBrandModel->update([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                "slug"=>Str::slug($request->name_en)
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


