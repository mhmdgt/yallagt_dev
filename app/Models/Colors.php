<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = ['logo', 'name'];
    public $translatable = ['name'];
}
