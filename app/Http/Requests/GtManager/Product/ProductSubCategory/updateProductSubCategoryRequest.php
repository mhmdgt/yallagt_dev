<?php

namespace App\Http\Requests\GtManager\Product\ProductSubCategory;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateProductSubCategoryRequest extends FormRequest
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
            Rule::unique('product_sub_categories', 'name->ar')->ignore($this->productSubCategory->id)],
            'name_en' => ['required','string','max:200',
            Rule::unique('product_sub_categories', 'name->en')->ignore($this->productSubCategory->id)],
            'logo' => 'nullable|image|mimes:png', // Adjust allowed extensions
        ];
    }
}