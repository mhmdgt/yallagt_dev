<?php

namespace App\Http\Controllers\YallaGT\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\YallaGT\Auth\LoginRequest;
use App\Http\Requests\YallaGT\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(RegisterRequest $request){

        $validatedData = $request->validated();
        $validatedData['password'] =Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        dd('done');
        return redirect('/')->with('success', 'Registration successful! You can now login.');
      

    }

    public function Login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        // Attempt to authenticate with email or phone
        if (
            Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
            // Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']]) ||
            Auth::attempt(['phone' => $credentials['username'], 'password' => $credentials['password']])
        ) {
            // Authentication passed
            dd('done');
        }
        session()->flash('error', 'Wrong credentials');
        return back();
    }
    // -------------------- New Method -------------------- //
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin-login');
    }
}
