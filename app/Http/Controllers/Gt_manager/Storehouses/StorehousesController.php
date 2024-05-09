<?php

namespace App\Http\Controllers\Gt_manager\Storehouses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorehousesController extends Controller
{
    public function index()
    {
        // $categories=BlogCategory::latest()->get();
        return view('gt-manager.pages.storehouses.index');
    }
}
