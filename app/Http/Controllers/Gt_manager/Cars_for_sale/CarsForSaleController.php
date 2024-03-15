<?php

namespace App\Http\Controllers\Gt_manager\Cars_for_sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarsForSaleController extends Controller
{
    // -------------------- Create car for sale -------------------- //
    public function create()
    {
        return view('gt-manager.cars_for_sale.create');

    }
}
