<?php

namespace App\Http\Controllers\Gt_manager\Web_settings;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\WebSettings\ContactUs\UpdateRequest;



class ContactUsController extends Controller
{
    public function update(UpdateRequest $request)
    {
        try {
            // Retrieve the ContactUs record
            $contactUs = ContactUs::first();

            // Update the fields
            $contactUs->update([
                'site_name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar,
                ],
                'support_email' => $request->input('support_email'),
                'headqurter_address' => [
                    'en' => $request->headqurter_address_en,
                    'ar' => $request->headqurter_address_ar,
                ],
                'hotline' => $request->input('hotline'),
                'phone' => $request->input('phone'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                'twitter' => $request->input('twitter'),
                'tiktok' => $request->input('tiktok'),
                'linkedin' => $request->input('linkedin'),
                'whatsapp' => $request->input('whatsapp'),
                'google_maps' => $request->input('google_maps'),
            ]);

            Session::flash('success', 'Data Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('fail', 'Failed to update data');
        }

        return redirect()->back();
    }

}
