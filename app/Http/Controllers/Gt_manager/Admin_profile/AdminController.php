<?php

namespace App\Http\Controllers\Gt_manager\Admin_profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');

    } // End Method

    public function RegisterPage()
    {
        return view('gt-manager.admin_register');
    } // End Method

    public function LoginPage()
    {
        return view('gt-manager.admin_login');
    } // End Method

    public function IndexPage()
    {

        return view('gt-manager.master-app');
    } // End Method

    public function ManagerHome()
    {

        return view('gt-manager.app_index.home');
    } // End Method


} // End Class
