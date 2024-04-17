<?php

namespace App\Http\Controllers\Gt_manager\Spec_categories;

use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\ModeSpecs\TransmissionTypeRequest;

class TransmissionTypeController extends Controller
{
     use ImageTrait;
     public function store(TransmissionTypeRequest $request)
     {
             TransmissionType::create([
                 'name' => [
                     'en' => $request->name_en,
                     'ar' => $request->name_ar
                 ],
                 'logo' => $request->hasFile('logo')?$this->uploadImage($request->logo, 'body_shapes_logo'):null
             ]);

         Alert::success('Success Message', 'body shape stored successfully!');
         return redirect()->back();
     }

     public function update(TransmissionTypeRequest $request, TransmissionType $transmissionType)
     {

         $hexName = $request->hasFile('logo') ? $this->uploadImage($request->logo, 'body_shapes_logo', $transmissionType->logo) : $transmissionType->logo;
         $transmissionType->update([
             'name' => [
                 'en' => $request->name_en,
                 'ar' => $request->name_ar
             ],
             'logo' => $hexName,
         ]);
         Alert::success('success', 'Your body shape has been Updated');
         return redirect()->back();
     }

     public function destroy(TransmissionType $transmissionType)
     {
         $logo=$transmissionType->logo;
        if( $transmissionType->delete()){
         $this->deleteImage($logo,'body_shapes_logo');
        }
         Alert::success('Successfully', 'Your brand has been deleted');
         return redirect()->back();
     }
 }
