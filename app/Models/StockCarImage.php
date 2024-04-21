<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCarImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_car_id',
        'name',
        'main_img'
    ];

    // public function getImageAttribute()
    // {
    //     return asset( path:'storage/media/stock_cars_imgs/ . $this>path . $this->name') ;
    // }
}
