<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = ['name', 'logo', 'slug'];

    public $translatable = ['name','slug'];

    
}
