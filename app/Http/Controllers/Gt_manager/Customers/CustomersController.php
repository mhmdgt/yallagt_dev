<?php

namespace App\Http\Controllers\Gt_manager\Customers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('gt-manager.pages.customers.index', compact('users'));
    }
}
