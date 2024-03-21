<?php

namespace App\Http\Requests\GtManager\CarSpecCategory;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function __construct( protected $id , protected $table )
    {

    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                Rule::unique($this->table, 'name->ar')->ignore($this->id),
            ],
            'name_en' => [
                'required',
                'string',
                'max:200',
                Rule::unique($this->table, 'name->en')->ignore($this->id),
            ],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
