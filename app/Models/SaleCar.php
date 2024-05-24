<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class SaleCar extends Model
{
    use HasFactory, HasTranslations, UserStampWithTypeTrait;

    protected $guarded = [];
    public $translatable = ['slug'];

    // protected $fillable = [
    //     'slug',
    //     'brand',
    //     'model',
    //     'year',
    //     'color',
    //     'condition',
    //     'payment',
    //     'price',
    //     'description',
    //     'bodyShape',
    //     'transmission',
    //     'fuelType',
    //     'cc',
    //     'features',
    //     'aspiration',
    //     'km',
    //     'governorate',
    //     'user_name',
    //     'phone',
    // ];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->en", $slug)->orWhere("slug->ar", $slug);
    }
    // -------------------- Method -------------------- //
    function images(){
        return $this->hasMany(SaleCarImages::class, 'car_id', 'id');
    }

}
