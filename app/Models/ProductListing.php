<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductListing extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $fillable = [
        'seller_id',
        'storehouse_id',
        'manufacturer_id',
        'product_id',
        'product_sku_id',
        'sku',
        'qty',
        'selling_price',
        'status',
    ];
    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //
    public function skus()
    {
        return $this->hasMany(ProductSku::class, 'sku', 'sku');
    }
    // -------------------- Method -------------------- //
    public function storehouse()
    {
        return $this->belongsTo(Storehouse::class);
    }

}
