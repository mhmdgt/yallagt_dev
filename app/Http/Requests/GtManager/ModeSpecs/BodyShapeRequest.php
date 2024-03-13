<?php

namespace App\Http\Requests\GtManager\ModeSpecs;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BodyShapeRequest extends FormRequest
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
        $rule=[
            'name_ar' => ['required','string','max:200',
            Rule::unique('body_shapes', 'name->ar')],
            'name_en' => ['required','string','max:200',
            Rule::unique('body_shapes', 'name->en')],
            'logo' => 'sometimes|image|mimes:png',
        ];
        if($this->method()=="PUT"){
            $rule['name_ar']=['required','string','max:200',Rule::unique('body_shapes', 'name->ar')->ignore($this->bodyShape->id)];
            $rule['name_en']=['required','string','max:200',Rule::unique('body_shapes', 'name->en')->ignore($this->bodyShape->id)];
        }
        return $rule;
    }
}
