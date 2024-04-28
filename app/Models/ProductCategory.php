<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
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

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();

        // Return the attribute name dynamically based on the current language
        return "slug->{$locale}";
    }

    public static function getByTranslatedSlug($slug)
{
    $locale = App::getLocale();
    return self::where("slug->{$locale}", $slug);
}
}
