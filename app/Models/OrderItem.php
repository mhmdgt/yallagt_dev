<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function order()
    {
        return $this->belongsTo(Order::class);
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
