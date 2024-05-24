<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StockCar extends Model
{
    use HasFactory, HasTranslations, UserStampWithTypeTrait;

    protected $fillable = ['slug', 'brand', 'car_brand_model_id', 'year', 'brochure', 'status'];

    public $translatable = ['slug'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    function images(){
        return $this->hasMany(StockCarImage::class);
    }
    // -------------------- Method -------------------- //
    function stockCarCategories(){
        return $this->hasMany(StockCarCategory::class);
    }
    // -------------------- Method -------------------- //


}
