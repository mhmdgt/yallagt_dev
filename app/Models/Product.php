<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [ 'manufacturer_id', 'name' , 'slug' , 'description' , 'brochure'];
    public $translatable = ['name' , 'slug' , 'description'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    // -------------------- Method -------------------- //
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
