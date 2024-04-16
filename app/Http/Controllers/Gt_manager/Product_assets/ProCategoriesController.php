<?php

namespace App\Http\Controllers\Gt_manager\Product_assets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProCategoriesController extends Controller
{
    public function index(){
        return view('gt-manager.pages.product_assets.categories.index');
    }

    public function show(){
        return view('gt-manager.pages.product_assets.categories.show');
    }


}
