<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarBrandModel extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [ "car_brand_id", "name", "slug" ];
    public $translatable = ['name' , "slug"];
    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }
    // -------------------- Method -------------------- //
    public function stockCars()
    {
        return $this->hasMany(StockCar::class);
    }

}
