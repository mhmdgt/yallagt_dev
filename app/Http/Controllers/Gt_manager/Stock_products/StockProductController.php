<?php

namespace App\Http\Controllers\Gt_manager\Stock_products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockProductController extends Controller
{
    public function index()
    {
        // $categories=BlogCategory::latest()->get();
        return view('gt-manager.pages.stock_products.index');
    }
}
