<?php

namespace App\Http\Controllers\Gt_manager\Sellers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with('storehouses')->latest()->get();

        return view('gt-manager.pages.sellers.index', compact('sellers'));
    }
}
