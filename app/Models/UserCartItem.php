<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCartItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function userCart()
    {
        return $this->belongsTo(UserCart::class);
    }
    // -------------------- Method -------------------- //
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class, 'product_sku_id');
    }

    // -------------------- Method -------------------- //
    public function productListing()
    {
        return $this->belongsTo(ProductListing::class, 'product_sku_id', 'product_sku_id');
    }


}
