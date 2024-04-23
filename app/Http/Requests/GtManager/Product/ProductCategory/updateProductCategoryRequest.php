<?php

namespace App\Http\Requests\GtManager\Product\ProductCategory;

use App\Models\ProductCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
        $name_en = ProductCategory::where('slug->en', $this->slug)->value('name->en');

        return [
            // 'name_ar' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->ar')->ignore($this->slug)],
            'name_ar' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->ar')->ignore($name_en)],

            // 'name_en' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->en')->ignore($this->slug)],
            'name_en' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->en')->ignore($name_en)],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
