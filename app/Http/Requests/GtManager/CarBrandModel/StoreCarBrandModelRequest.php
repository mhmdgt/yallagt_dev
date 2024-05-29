<?php

namespace App\Http\Requests\GtManager\CarBrandModel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreCarBrandModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_ar' => ['required','string','max:200',
            Rule::unique('car_brand_models', 'name->ar')],
            'name_en' => ['required','string','max:200',
            Rule::unique('car_brand_models', 'name->en')]

        ];
    }
}
