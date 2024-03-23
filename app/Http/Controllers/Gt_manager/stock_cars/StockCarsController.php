<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StockCarsController extends Controller
{
        // -------------------- Show Brand Models Method -------------------- //
        public function index()
        {
            $brands = CarBrand::latest()->get();
            return view('gt-manager.stock_cars.index', compact('brands'));
        }
        // -------------------- Show Brand Models Method -------------------- //
        public function ModelsIndex()
        {
            return view('gt-manager.stock_cars.all_stock_models');
        }
        // -------------------- Create Stock Model -------------------- //
        public function create()
        {
            return view('gt-manager.stock_cars.add_stock_models');
        }














    }  // End Class
