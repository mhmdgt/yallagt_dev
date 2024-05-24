<?php

namespace App\Http\Requests\GtManager\Manufacturer;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'name_ar' => ['required', 'string' , 'max:200', Rule::unique('manufacturers', 'name->ar')->ignore($this->id)],
            'name_en' => ['required', 'string' , 'max:200', Rule::unique('manufacturers', 'name->en')->ignore($this->id)],
            'logo' => 'nullable|image|mimes:png',
        ];
    }



}
