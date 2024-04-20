<?php

namespace App\Http\Controllers\Gt_manager\Sale_cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleCarsController extends Controller
{
    // -------------------- Create car for sale -------------------- //
    public function live()
    {
        return view('gt-manager.cars_for_sale.live');

    }
    // -------------------- Create car for sale -------------------- //
    public function create()
    {
        return view('gt-manager.pages.sale_cars.create');

    }
}
