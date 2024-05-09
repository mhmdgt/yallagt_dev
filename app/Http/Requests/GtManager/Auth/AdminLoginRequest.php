<?php

namespace App\Http\Requests\GtManager\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'login_credentials' => ['required', 'string'],
            'password' => ['required', 'string'],

        ];
    }
}
