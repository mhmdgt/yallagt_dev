<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EngineAspiration extends Model
{
    use HasFactory  ,HasTranslations;
    protected $fillable = ["logo", 'name'];
    public $translatable = ['name'];
}
