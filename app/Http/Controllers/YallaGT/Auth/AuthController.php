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
        return response()->json([
            'success' => true,
            'message' => 'Registration successful! You can now login.',
            'redirect' => route('about_us'),
        ]);
      

    }

    public function Login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        if (
            Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
            Auth::attempt(['phone' => $credentials['username'], 'password' => $credentials['password']])
        ) {
            // Authentication passed
            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect' => '/', // Redirect URL upon successful login
            ]);
        } else {
            // Authentication failed
            return response()->json([
                'success' => false,
                'message' => 'Wrong credentials',
            ], 422); // Use appropriate HTTP status code for unprocessable entity
        }
    }
    // -------------------- New Method -------------------- //
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin-login');
    }
}
