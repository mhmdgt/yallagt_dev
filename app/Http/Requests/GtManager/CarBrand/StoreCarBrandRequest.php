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
            'name_ar' => ['required','string','max:200',
            Rule::unique('car_brands', 'name->ar')],
            'name_en' => ['required','string','max:200',
            Rule::unique('car_brands', 'name->en')],
            'logo' => 'required|image|mimes:png', // Adjust allowed extensions
        ];
    }
}
