<?php

namespace App\Http\Requests\GtManager\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function __construct( protected $table )
    {

    }
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
        return  [
            'name_ar' => [
                'required',
                'string',
                'max:200',
                Rule::unique($this->table, 'name->ar'),
            ],
            'name_en' => [
                'required',
                'string',
                'max:200',
                Rule::unique($this->table, 'name->en'),
            ],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
