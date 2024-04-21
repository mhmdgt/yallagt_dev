<?php

namespace App\Http\Requests\GtManager\CarSpecCategory;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public $newLogo;

    public function __construct( protected $id , protected $table )
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
                'nullable',
                'string',
                'max:200',
                Rule::unique('manufacturers', 'name->ar')->ignore($this->id),
            ],
            'name_en' => [
                'nullable',
                'string',
                'max:200',
                Rule::unique('manufacturers', 'name->en')->ignore($this->id),
            ],
            'logo' => $this->newLogo ? 'nullable|mimetypes:image/png' : 'nullable',
        ];
    }
}
