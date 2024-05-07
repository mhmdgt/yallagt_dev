<?php

namespace App\Models;


use App\Traits\UserStampTrait;
use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory,HasTranslations,SoftDeletes,UserStampWithTypeTrait;

    protected $fillable = ['name', 'image', 'slug','deleted_by','created_by','updated_by','deleted_type','created_type','updated_type'];
  
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
