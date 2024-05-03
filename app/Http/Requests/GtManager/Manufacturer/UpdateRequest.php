<?php

namespace App\Http\Requests\GtManager\Manufacturer;

use Illuminate\Validation\Rule;
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
            'name_ar' => ['required','string','max:200', Rule::unique('manufacturers', 'name->ar')->ignore($this->manufacturer->id)],
            'name_en' => ['required','string','max:200', Rule::unique('manufacturers', 'name->en')->ignore($this->manufacturer->id)],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
