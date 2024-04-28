<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Traits\SlugTrait;
use App\Traits\ImageTrait;

use App\Models\Manufacturer;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\GtManager\Manufacturer\StoreRequest;
use App\Http\Requests\GtManager\Manufacturer\UpdateRequest;

class ManufacturersController extends Controller
{
    use SlugTrait, ImageTrait;

    // -------------------- Method -------------------- //
    public function index()
    {
        $manufacturers = Manufacturer::latest()->get();
        return view('gt-manager.pages.product_assets.manufacturers.index', compact('manufacturers'));
    }
    // -------------------- Method -------------------- //
    public function show($slug)
    {
        $manufacturer = Manufacturer::getByTranslatedSlug($slug)->first();
        return view('gt-manager.pages.product_assets.manufacturers.show', compact('manufacturer'));
    }
    // -------------------- Method -------------------- //
    public function store(StoreRequest $request)
    {
        Manufacturer::create([
            'name' => [ 'en' => $request->name_en, 'ar' => $request->name_ar ],
            'slug' => Str::slug($request->name_en),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/manufacturer_logos' ,$request->name_en):  null,
        ]);
        Session::flash('success', 'Stored Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function update(UpdateRequest $request, $slug)
    {
        $manufacturer = Manufacturer::getByTranslatedSlug($slug)->first();
        // Validate the request
        $validatedData = $request->validated();
        // Update other fields
        $manufacturer->update([
            'name' => [ 'en' => $request->name_en, 'ar' => $request->name_ar ],
            'slug' => Str::slug($validatedData['name_en']),
            'logo' => $request->hasFile('logo') ? $this->uploadImage($request->logo, 'media/manufacturer_logos' ,$request->name_en):  null,
        ]);

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();

    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $manufacturer = Manufacturer::getByTranslatedSlug($slug)->first();
        $manufacturer->delete();
        $this->deleteImage($manufacturer->logo);
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('manufacturers.index');
    }
}
