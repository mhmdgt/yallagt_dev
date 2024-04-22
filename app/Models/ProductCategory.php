<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = ['name', 'logo', 'slug' ];
    public $translatable = ['name','slug'];

    function productSubCategories(){
        return $this->hasMany(ProductSubCategory::class);
    }

    public function getRouteKeyName()
     {
         return 'slug';
     }

      public function getTranslatedSlugAttribute()
    {
        return $this->getTranslation('slug', app()->getLocale());
    }
}
