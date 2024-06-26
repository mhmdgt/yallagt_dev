<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory  ,HasTranslations;

    protected $fillable = ['name' ];
    public $translatable = ['name'];

    // -------------------- Method -------------------- //
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

}
