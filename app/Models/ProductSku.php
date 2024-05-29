<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSku extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    public $translatable = ['sku_name'];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    // -------------------- Method -------------------- //
    public function images()
    {
        return $this->hasMany(ProductSkuImage::class, 'sku_id');
    }
    // -------------------- Method -------------------- //
    public function listings()
    {
        return $this->hasMany(ProductListing::class, 'sku', 'sku');
    }
}
