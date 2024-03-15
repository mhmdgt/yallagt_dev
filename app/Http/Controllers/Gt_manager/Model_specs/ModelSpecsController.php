<?php

namespace App\Http\Controllers\Gt_manager\Model_specs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelSpecsController extends Controller
{
    // -------------------- All Specs Tables -------------------- //
    public function index()
    {
        return view('gt-manager.cars_assets.model_specs');

    }

    // -------------------- Show Spec Details -------------------- //
    public function show()
    {
        return view('gt-manager.cars_assets.spec_ctrl');

    }



}
