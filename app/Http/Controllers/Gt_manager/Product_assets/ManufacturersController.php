<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Models\Manufacturer;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\GtManager\Manufacturer\StoreRequest;
use App\Http\Requests\GtManager\Manufacturer\UpdateRequest;

class ManufacturersController extends Controller
{
    // -------------------- Method -------------------- //
    public function index()
    {
        $manufacturers = Manufacturer::latest()->get();
        return view('gt-manager.pages.product_assets.manufacturers.index', compact('manufacturers'));
    }
    // -------------------- Method -------------------- //
    public function show(Manufacturer $manufacturer)
    {
        // dd($manufacturer);

        return view('gt-manager.pages.product_assets.manufacturers.show', compact('manufacturer'));
    }
    // -------------------- Method -------------------- //
    public function store(StoreRequest $request)
    {
        if ($request->hasFile('logo')) {
            $randomString = Str::random(16);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = Str::slug($request->name_en) . '-' . $randomString . '.' . $extension;
            $path = $request->file('logo')->storeAs('media/manufacturer_logos', $imageName);
        } else {
            $path = null;
        }
        Manufacturer::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'slug' => Str::slug($request->name_en),
            'logo' => $path,
        ]);

        Session::flash('success', 'Stored Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function update(UpdateRequest $request, Manufacturer $manufacturer)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Update logo if a new one is provided
        if ($request->hasFile('logo')) {
            $randomString = Str::random(16);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = Str::slug($request->name_en) . '-' . $randomString . '.' . $extension;
            $path = $request->file('logo')->storeAs('media/manufacturer_logos', $imageName);
            $manufacturer->update(['logo' => $path]);
        }

        // Update other fields
        $manufacturer->update([
            'name' => [
                'en' => $validatedData['name_en'],
                'ar' => $validatedData['name_ar'],
            ],
            'slug' => Str::slug($validatedData['name_en']),
        ]);

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();

    }
    // -------------------- Method -------------------- //
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('manufacturers.index');
    }
}
