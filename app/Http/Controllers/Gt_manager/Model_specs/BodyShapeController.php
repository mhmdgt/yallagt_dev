<?php

namespace App\Http\Controllers\Gt_manager\Model_specs;

use App\Models\BodyShape;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\ModeSpecs\BodyShapeRequest;

class BodyShapeController extends Controller
{
    use ImageTrait;

    public function index()
    { 
         confirmDelete('Delete body shape!', 'Are you sure you want to delete?');
        $bodyShapes=BodyShape::get();
        
        return view('gt-manager.cars_assets.model_specs', compact('bodyShapes'));

    }
    public function store(BodyShapeRequest $request)
    {
            BodyShape::create([
                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'logo' => $request->hasFile('logo')?$this->uploadImage($request->logo, 'body_shapes_logo'):null
            ]);
        
        Alert::success('Success Message', 'body shape stored successfully!');
        return redirect()->back();
    }

    public function update(BodyShapeRequest $request, BodyShape $bodyShape)
    {
        
        $hexName = $request->hasFile('logo') ? $this->uploadImage($request->logo, 'body_shapes_logo', $bodyShape->logo) : $bodyShape->logo;
        $bodyShape->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ],
            'logo' => $hexName,
        ]);
        Alert::success('success', 'Your body shape has been Updated');
        return redirect()->back();
    }

    public function destroy(BodyShape $bodyShape)
    {
        $logo=$bodyShape->logo;
       if( $bodyShape->delete()){
        $this->deleteImage($logo,'body_shapes_logo');
       }
        Alert::success('Successfully', 'Your brand has been deleted');
        return redirect()->back();
    }
}
