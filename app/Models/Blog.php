<?php

namespace App\Models;

use App\Traits\UserStampTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, HasTranslations , UserStampTrait;

    protected $fillable = ['title', 'slug', 'content', 'blog_category_id' , 'status'];
    public $translatable = ['title', 'slug' , 'content'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    // -------------------- Method -------------------- //
    function images(){
        return $this->hasMany(BlogImage::class);
    }
}
