<?php

namespace App\Http\Controllers\Gt_manager\Customer_theme;

use App\Models\TermOfUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Support\Facades\Session;

class WebSettingsController extends Controller
{
    // -------------------- Method -------------------- //
    // -------------------- Method -------------------- //
    // -------------------- Method -------------------- //
    public function termsIndex()
    {
        $terms = TermOfUse::first();
        return view('gt-manager/pages/customer_theme/web_settings/terms_of_use' , compact('terms'));
    }
    // -------------------- Method -------------------- //
    public function termsUpdate(Request $request)
    {
        try {
            // Retrieve the ContactUs record
            $terms = TermOfUse::first();

            // Update the fields
            $terms->update([
                'content' => [
                    'en' => $request->content_en,
                    'ar' => $request->content_ar,
                ],
            ]);

            Session::flash('success', 'Data Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('fail', 'Failed to update data');
        }

        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function privacyIndex()
    {
        $privacy = PrivacyPolicy::first();
        return view('gt-manager/pages/customer_theme/web_settings/privacy_policy', compact('privacy'));
    }
    // -------------------- Method -------------------- //
    public function privacyUpdate(Request $request)
    {
        try {
            // Retrieve the ContactUs record
            $privacy = PrivacyPolicy::first();

            // Update the fields
            $privacy->update([
                'content' => [
                    'en' => $request->content_en,
                    'ar' => $request->content_ar,
                ],
            ]);

            Session::flash('success', 'Data Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('fail', 'Failed to update data');
        }

        return redirect()->back();
    }
}
