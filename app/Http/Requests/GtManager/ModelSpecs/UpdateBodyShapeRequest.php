<?php

namespace App\Http\Requests\GtManager\ModelSpecs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateBodyShapeRequest extends FormRequest
{
  

    public function __construct( protected $bodyShapeId,protected $table )
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
                Rule::unique($this->table, 'name->ar')->ignore($this->bodyShapeId),
            ],
            'name_en' => [
                'required',
                'string',
                'max:200',
                Rule::unique($this->table, 'name->en')->ignore($this->bodyShapeId),
            ],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
