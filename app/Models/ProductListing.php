<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ProductListing extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $fillable = [
        'seller_id',
        'manufacturer_id',
        'product_id',
        'product_sku_id',
        'sku',
        'selling_price',
        'status',
    ];
    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->en", $slug)->orWhere("slug->ar", $slug);
    }
    // -------------------- Method -------------------- //
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_sku_id');
    }
    // -------------------- Method -------------------- //
    public function skus()
    {
        return $this->hasMany(ProductSku::class, 'sku', 'sku');
    }
    // -------------------- Method -------------------- //
    public function skuData()
    {
        return $this->belongsTo(ProductSku::class, 'product_sku_id');
    }
    // -------------------- Method -------------------- //
    public function seller()
    {
        return $this->belongsTo(seller::class);
    }
    // -------------------- Method -------------------- //
    public function storehouse()
    {
        return $this->belongsTo(Storehouse::class);
    }
    // -------------------- Method -------------------- //

}
