<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSubCategory extends Model
{
   
    use HasFactory , HasTranslations;

    protected $fillable = ['name', 'logo', 'slug','product_category_id' ];

    public $translatable = ['name','slug'];

    function productCategory(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function getRouteKeyName()
    {
        $locale = app()->getLocale();

        // Return the attribute name dynamically based on the current language
        return "slug->{$locale}";
    }

}
