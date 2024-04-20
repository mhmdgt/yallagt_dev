<?php

namespace App\Http\Requests\GtManager\StockCar;

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
            'car_brand_model_id' => 'required|exists:car_brand_models,id',
            'year' => 'required|integer|digits:4',
            'brochure' => 'file|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'car_brand_model_id.required' => 'The car brand model ID is required.',
            'car_brand_model_id.exists' => 'The selected car brand model is invalid.',
            'year.required' => 'The year is required.',
            'year.integer' => 'The year must be selected.',
            'year.digits' => 'The year must be exactly :digits digits.',
            'brochure.file' => 'The brochure must be a file.',
            'brochure.mimes' => 'The brochure must be a file of type: pdf.',
        ];
    }
}
