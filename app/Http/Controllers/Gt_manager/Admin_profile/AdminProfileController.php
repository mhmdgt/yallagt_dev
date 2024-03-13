<?php

namespace App\Http\Controllers\Gt_manager\Admin_profile;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    // -------------------- New Method -------------------- //
    public function AdminProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);

        return view('gt-manager.admin_profile.admin_profile', compact('adminData'));
    }

    // -------------------- New Method -------------------- //
    public function AdminUpdateData(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);

        $adminData->name = $request->name;
        $adminData->username = $request->username;
        $adminData->phone = $request->phone;
        $adminData->email = $request->email;
        $adminData->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('Y-m-d-h-i') . $file->getClientOriginalName();
            $file->move(public_path('media/'), $filename);
            $adminData['photo'] = $filename;
        }

        $adminData->save();

        return redirect()->back();
    }

    // -------------------- New Method -------------------- //
    public function AdminChangePassword()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);

        return view('gt-manager.admin_profile.admin_change_password', compact('adminData'));
    }

    // -------------------- New Method -------------------- //
    public function AdminPasswordUpdate(Request $request)
    {

        $old_password = Auth::guard('admin')->user()->password;
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);

        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        
        //Match password
        if ( !Hash::check($request->old_password, $old_password)) {
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }

        //Update password
        $adminData
            ->update([
                'password' => Hash::make($request->new_password),
            ]);

        $notification = array(
            'message' => 'Password Updated successfully!',
            'alert-type' => 'success',
        );
        return back()->with($notification);

    }





} // End CLASS
