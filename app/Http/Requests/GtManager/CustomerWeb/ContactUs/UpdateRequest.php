<?php

namespace App\Http\Requests\GtManager\CustomerWeb\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name' => 'nullable|string',
            'support_email' => 'nullable|email',
            'headqurter_address' => 'nullable|string',
            'hotline' => 'nullable|string',
            'phone' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'google_maps' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'site_name.string' => 'The site name must be a string.',
            'support_email.email' => 'The support email must be a valid email address.',
            'headqurter_address.string' => 'The headquarter address must be a string.',
            'hotline.string' => 'The hotline must be a string.',
            'phone.string' => 'The phone must be a string.',
            'facebook.url' => 'The Facebook URL format is invalid.',
            'instagram.url' => 'The Instagram URL format is invalid.',
            'youtube.url' => 'The YouTube URL format is invalid.',
            'twitter.url' => 'The Twitter URL format is invalid.',
            'tiktok.url' => 'The TikTok URL format is invalid.',
            'linkedin.url' => 'The LinkedIn URL format is invalid.',
            'whatsapp.url' => 'The LinkedIn URL format is invalid.',
            'google_maps.url' => 'The LinkedIn URL format is invalid.',
        ];
    }
}
