<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description'];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'blog_category_id',
    ];
}
