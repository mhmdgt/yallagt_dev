<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'manufacturer_id',
        'product_category_id',
        'product_sub_category_id',
        'name',
        'slug',
        'description',
        'brochure',
        'status',
    ];
    public $translatable = ['name', 'slug', 'description'];

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
    function images(){
        return $this->hasMany(ProductImage::class);
    }
    // -------------------- Method -------------------- //
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    // -------------------- Method -------------------- //
    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }
    // -------------------- Method -------------------- //
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
    // -------------------- Method -------------------- //
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
