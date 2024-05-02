<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'logo', 'slug'];
    public $translatable = ['name', 'slug'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function productSubCategories()
    {
        return $this->hasMany(ProductSubCategory::class);
    }
    // -------------------- Method -------------------- //
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // -------------------- Method -------------------- //
    public function getAllSubCategories()
    {
        return $this->productSubCategories()->get();
    }
}
