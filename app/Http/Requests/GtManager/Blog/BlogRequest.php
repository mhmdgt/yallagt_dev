<?php

namespace App\Http\Requests\GtManager\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'slug' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'car_brand_model_id' => 'required|exists:car_brand_models,id',
            'transmission_type_id' => 'nullable|exists:transmission_types,id',
            'fuel_type_id' => 'nullable|exists:fuel_types,id',
            'engine_aspiration_id' => 'nullable|exists:engine_aspirations,id',
            'image' => 'nullable|image',
            'year' => 'nullable|date_format:Y',
            'status' => 'required|in:active,hidden',

        ];
    }
}
