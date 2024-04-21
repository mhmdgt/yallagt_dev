<?php

namespace App\Http\Requests\GtManager\Product\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class updateProductCategoryRequest extends FormRequest
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
            Rule::unique('product_categories', 'name->ar')->ignore($this->productCategory->id)],
            'name_en' => ['required','string','max:200',
            Rule::unique('product_categories', 'name->en')->ignore($this->productCategory->id)],
            'logo' => 'nullable|image|mimes:png', // Adjust allowed extensions
        ];
    }
}
