<?php

namespace App\Models;

use App\Models\CarBrandModel;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarBrand extends Model
{
    use HasFactory  ,HasTranslations;
    protected $fillable = ['name', 'slug' , 'logo'];
    public $translatable = ['name' , 'slug'];


    public function models()
    {
        return $this->hasMany(CarBrandModel::class);
    }


    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }

} // END CLASS
