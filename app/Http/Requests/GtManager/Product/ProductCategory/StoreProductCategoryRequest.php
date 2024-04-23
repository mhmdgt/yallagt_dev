<?php

namespace App\Http\Requests\GtManager\Product\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductCategoryRequest extends FormRequest
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
            'name_ar' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->ar')],
            'name_en' => ['required', 'string', 'max:200', Rule::unique('product_categories', 'name->en')],
            'logo' => 'nullable|image|mimes:png',
        ];
    }
}
