<?php

namespace App\Http\Controllers\Yalla_gt\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\YallaGT\Auth\LoginRequest;
use App\Http\Requests\YallaGT\Auth\RegisterRequest;

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
                'username_error' => 'Data not found',
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
    // -------------------- New Method -------------------- //
    public function userPasswordUpdate(Request $request)
    {
        // Validation rules
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ];

        // Custom error messages
        $messages = [
            'old_password.required' => 'The old password field is required.',
            'new_password.required' => 'The new password field is required.',
            'new_password.confirmed' => 'Password does not match.',
            'new_password.min' => 'Password must be at least 8 characters.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // Fetch the authenticated user's current password
        $old_password = auth()->user()->password;
        $id = auth()->user()->id;
        $userData = User::find($id);

        // Check if the old password matches
        if (!Hash::check($request->old_password, $old_password)) {
            return back()->with('fail', 'Old Password does not match!');
        }

        // Update the user's password and check if update was successful
        $updateSuccess = $userData->update([
            'password' => Hash::make($request->new_password),
        ]);

        if (!$updateSuccess) {
            return back()->with('fail', 'Password did not update.');
        }

        return back()->with('success', 'Password updated successfully.');
    }


}
