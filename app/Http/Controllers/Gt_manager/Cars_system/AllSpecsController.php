<?php

namespace App\Http\Controllers\Gt_manager\Cars_system;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllSpecsController extends Controller
{
    // -------------------- All Spec Categories -------------------- //
    public function index()
    {
        return view('gt-manager.cars_assets.spec_categories.all_specs');
    }

    // -------------------- Body Shape -------------------- //
    public function BodyShape()
    {
        return view('gt-manager.cars_assets.spec_categories.body_shapes');
    }
    // -------------------- Fule Type -------------------- //
    public function FuleType()
    {
        return view('gt-manager.cars_assets.spec_categories.fule_type');
    }
    // -------------------- Fule Type -------------------- //
    public function TransmassionType()
    {
        return view('gt-manager.cars_assets.spec_categories.transmassion_type');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineAspiration()
    {
        return view('gt-manager.cars_assets.spec_categories.engine_aspiration');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineCC()
    {
        return view('gt-manager.cars_assets.spec_categories.engine_cc');
    }
    // -------------------- Fule Type -------------------- //
    public function EngineKM()
    {
        return view('gt-manager.cars_assets.spec_categories.engine_km');
    }



}
