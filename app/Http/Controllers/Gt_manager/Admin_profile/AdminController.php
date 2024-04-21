<?php

namespace App\Http\Controllers\Gt_manager\Admin_profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // -------------------- New Method -------------------- //
    public function index()
    {
        return view('gt-manager.pages.app.index');
    }
    public function LoginPage()
    {
        return view('gt-manager.pages.auth.login');
    } // End Method
    // -------------------- New Method -------------------- //
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
    }
    // -------------------- New Method -------------------- //
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

} // End Class
