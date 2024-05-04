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
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'status' => 'nullable|in:active,hidden',
            'tags'=>"required",

        ];
    }
}
