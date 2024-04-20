<?php

namespace App\Http\Requests\GtManager\CarBrand;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarBrandRequest extends FormRequest
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
            'name_ar' => ['required','string','max:200',
            Rule::unique('car_brands', 'name->ar')->ignore($this->carBrand->id)],
            'name_en' => ['required','string','max:200',
            Rule::unique('car_brands', 'name->en')->ignore($this->carBrand->id)],
            'logo' => 'nullable|image|mimes:png', // Adjust allowed extensions
        ];
    }
}
