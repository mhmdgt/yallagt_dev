<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;
    protected $guarded = [];
    // -------------------- Method -------------------- //
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
