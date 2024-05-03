<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'description',
        'blog_category_id',
        'car_brand_model_id',
        'transmission_type_id',
        'fuel_type_id',
        'engine_aspiration_id',
        'image',
        'year',
        'status'

    ];
}
