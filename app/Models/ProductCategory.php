<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = ['name', 'logo', 'slug' ];
// protected $table="product_categories";
    public $translatable = ['name','slug'];
    function productSubCategories(){
        return $this->hasMany(ProductSubCategory::class);
    }

    // function getRouteKeyName(){
    //     return 'id';
    // }
     public function getRouteKeyName()
     {
         return 'slug'; 
     }
      // Accessor to retrieve translated slug for current locale
    public function getTranslatedSlugAttribute()
    {
        return $this->getTranslation('slug', app()->getLocale());
    }
}
