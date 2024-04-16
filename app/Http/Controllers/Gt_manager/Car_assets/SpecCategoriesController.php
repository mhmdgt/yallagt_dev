<?php

namespace App\Http\Controllers\Gt_manager\Car_assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecCategoriesController extends Controller
{
    // -------------------- All Spec Categories -------------------- //
    public function index()
    {
        return view('gt-manager.pages.car_assets.spec_categories.all_specs');
    }

    // -------------------- Body Shape -------------------- //
    public function BodyShape()
    {
        return view('gt-manager.pages.car_assets.spec_categories.body_shapes');
    }
    // -------------------- Fule Type -------------------- //
    public function FuelType()
    {
        return view('gt-manager.pages.car_assets.spec_categories.fuel_type');
    }
    // -------------------- Fule Type -------------------- //
    public function TransmassionType()
    {
        return view('gt-manager.pages.car_assets.spec_categories.transmassion_type');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineAspiration()
    {
        return view('gt-manager.pages.car_assets.spec_categories.engine_aspiration');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineCapacity()
    {
        return view('gt-manager.pages.car_assets.spec_categories.engine_capacity');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineKilometer()
    {
        return view('gt-manager.pages.car_assets.spec_categories.engine_kilometer');
    }
    // -------------------- Colors -------------------- //
    public function Colors()
    {
        return view('gt-manager.pages.car_assets.spec_categories.colors');
    }



}
