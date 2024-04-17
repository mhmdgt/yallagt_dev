<?php

namespace App\Http\Controllers\Gt_manager\Spec_categories;

use App\Models\FuelType;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\ModeSpecs\FuelTypeRequest;

class FuelTypeController extends Controller
{
    //
    use ImageTrait;


    public function store(FuelTypeRequest $request)
    {
            FuelType::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'logo' => $request->hasFile('logo')?$this->uploadImage($request->logo, 'body_shapes_logo'):null
            ]);

        Alert::success('Success Message', 'body shape stored successfully!');
        return redirect()->back();
    }

    public function update(FuelTypeRequest $request, FuelType $fuelType)
    {

        $hexName = $request->hasFile('logo') ? $this->uploadImage($request->logo, 'body_shapes_logo', $fuelType->logo) : $fuelType->logo;
        $fuelType->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ],
            'logo' => $hexName,
        ]);
        Alert::success('success', 'Your body shape has been Updated');
        return redirect()->back();
    }

    public function destroy(FuelType $fuelType)
    {
        $logo=$fuelType->logo;
       if( $fuelType->delete()){
        $this->deleteImage($logo,'body_shapes_logo');
       }
        Alert::success('Successfully', 'Your brand has been deleted');
        return redirect()->back();
    }
}

