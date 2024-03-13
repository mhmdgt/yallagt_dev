<?php

namespace App\Http\Requests\GtManager\CarBrandMode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateCarBrandModelRequest extends FormRequest
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
            Rule::unique('car_brand_models', 'name->ar')->ignore($this->carBrandModel->id)],
            'name_en' => ['required','string','max:200',
            Rule::unique('car_brand_models', 'name->en')->ignore($this->carBrandModel->id)],
           
        ];
    }
}
