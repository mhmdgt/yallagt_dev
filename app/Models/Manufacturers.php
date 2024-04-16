<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturers extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = ['name', 'logo', 'slug_ar' , 'slug_en'];

    public $translatable = ['name'];

    
}
