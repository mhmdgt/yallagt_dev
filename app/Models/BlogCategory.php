<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;
class BlogCategory extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = ['name', 'image', 'slug'];
  
    public $translatable = ['name', 'slug'];
    function blogs()
    {
        return $this->hasMany(Blog::class);
    }

   
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
}
