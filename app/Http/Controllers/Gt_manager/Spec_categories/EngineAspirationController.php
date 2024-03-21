<?php

namespace App\Http\Controllers\Gt_manager\Spec_categories;

use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\EngineAspiration;
use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\ModeSpecs\EngineAspirationRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EngineAspirationController extends Controller
{ use ImageTrait;


    public function store(EngineAspirationRequest $request)
    {
            EngineAspiration::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'logo' => $request->hasFile('logo')?$this->uploadImage($request->logo, 'body_shapes_logo'):null
            ]);

        Alert::success('Success Message', 'body shape stored successfully!');
        return redirect()->back();
    }

    public function update(EngineAspirationRequest $request, EngineAspiration $engineAspiration)
    {

        $hexName = $request->hasFile('logo') ? $this->uploadImage($request->logo, 'body_shapes_logo', $engineAspiration->logo) : $engineAspiration->logo;
        $engineAspiration->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ],
            'logo' => $hexName,
        ]);
        Alert::success('success', 'Your body shape has been Updated');
        return redirect()->back();
    }

    public function destroy(EngineAspiration $engineAspiration)
    {
        $logo=$engineAspiration->logo;
       if( $engineAspiration->delete()){
        $this->deleteImage($logo,'body_shapes_logo');
       }
        Alert::success('Successfully', 'Your brand has been deleted');
        return redirect()->back();
    }
}

