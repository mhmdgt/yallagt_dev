<?php

namespace App\Http\Requests\GtManager\Blog;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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

        $rules = [
            'name_ar' => [
                'required', 'string', 'max:200',
                Rule::unique('blog_categories', 'name->ar')
            ],
            'name_en' => [
                'required', 'string', 'max:200',
                Rule::unique('blog_categories', 'name->en')
            ],
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ];
        if ($this->method() == 'PUT') {
            // dd($this->id);
             $rules['name_ar'] = ['required', 'string', 'max:200', Rule::unique('blog_categories', 'name->ar')->ignore($this->id)];
             $rules['name_en'] = ['required', 'string', 'max:200', Rule::unique('blog_categories', 'name->en')->ignore($this->id)];
        }
        return $rules;
    }
}
