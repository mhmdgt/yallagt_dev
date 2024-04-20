<?php

namespace App\Http\Requests\GtManager\CarBrand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarBrandRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_ar' => ['required', 'string', 'max:200',
                Rule::unique('car_brands', 'name->ar')],
            'name_en' => ['required', 'string', 'max:200',
                Rule::unique('car_brands', 'name->en')],
            'logo' => 'nullable|image|mimes:png',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'The Arabic name is required.',
            'name_ar.string' => 'The Arabic name must be a string.',
            'name_ar.max' => 'The Arabic name may not be greater than :max characters.',
            'name_ar.unique' => 'The Arabic name has already been taken.',

            'name_en.required' => 'The English name is required.',
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than :max characters.',
            'name_en.unique' => 'The English name has already been taken.',

            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a PNG image.',
        ];
    }
}
