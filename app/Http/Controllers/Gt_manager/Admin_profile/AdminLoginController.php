<?php

namespace App\Http\Controllers\Gt_manager\Admin_profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\AdminLoginRequest;


class AdminLoginController extends Controller
{
    public function Login(AdminLoginRequest $request)
    {
        $credentials = $request->only('login_credentials', 'password');

        // Attempt to authenticate with email or phone
        if (Auth::guard('admin')->attempt(['email' => $credentials['login_credentials'], 'password' => $credentials['password']]) ||
            Auth::guard('admin')->attempt(['username' => $credentials['login_credentials'], 'password' => $credentials['password']]) ||
            Auth::guard('admin')->attempt(['phone' => $credentials['login_credentials'], 'password' => $credentials['password']])) {
            // Authentication passed
            return redirect()->intended('manager');
        }

        Alert::toast('Wrong credentials', 'error');
        
        return back();

    } // End Method
}
