<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    public function index(){
        return view('gt-manager.pages.product_assets.manufacturers.index');
    }
}
