<?php

namespace App\Http\Controllers\Yalla_gt\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\YallaGT\Auth\LoginRequest;
use App\Http\Requests\YallaGT\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // -------------------- New Method -------------------- //
    public function register(RegisterRequest $request)
    {
        $randomNumbers = uniqueRandEight();
        $username = implode('_', [$request->name, $randomNumbers]);
        $username = strtolower($username);
        $username = str_replace(' ', '_', $username);

        $user = User::create([
            "name" => $request->name,
            "username" => $username,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        Auth::loginUsingId($user->id);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json(['success' => true, 'redirect' => url('/')]);
        }

        // return redirect('/')->with('success', 'Registration successful! You can now login.');
    }
    // -------------------- New Method -------------------- //
    public function Login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        // Check if username (email or phone) exists
        $user = User::where('email', $credentials['username'])
            ->orWhere('phone', $credentials['username'])
            ->orWhere('username', $credentials['username'])
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'username_error' => 'Username not found',
            ], 422);
        }

        // Check if the password is correct
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'success' => false,

                'password_error' => 'Incorrect password', // Pass password error message
            ], 422);
        }

        // Authentication passed
        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'redirect' => route('yalla-index'),
        ]);
    }
    // -------------------- New Method -------------------- //
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('yalla-index');
    }
}
