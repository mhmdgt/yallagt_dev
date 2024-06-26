<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
    use HasFactory, HasTranslations ;

    protected $fillable = ['name', 'logo', 'slug'];
    public $translatable = ['name', 'slug'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // -------------------- Method -------------------- //
    public function getAllProducts()
    {
        return $this->products()->get();
    }
    // -------------------- Method -------------------- //

}
