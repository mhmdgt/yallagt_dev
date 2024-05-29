<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSkuImage extends Model
{
    use HasFactory;
    protected $fillable = [ 'sku_id', 'name', 'main_img' ];

}
