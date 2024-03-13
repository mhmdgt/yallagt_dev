<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarCategoriesController extends Controller
{
        // -------------------- create -------------------- //
        public function create()
        {
            return view('gt-manager.stock_cars.create_category');
        }}
