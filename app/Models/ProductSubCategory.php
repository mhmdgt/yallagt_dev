<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSubCategory extends Model
{
    use HasFactory, HasTranslations ;

    protected $fillable = ['name', 'logo', 'slug', 'product_category_id'];
    public $translatable = ['name', 'slug'];
    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->en", $slug)->orWhere("slug->ar", $slug);
    }
    // -------------------- Method -------------------- //
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    // -------------------- Method -------------------- //
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
