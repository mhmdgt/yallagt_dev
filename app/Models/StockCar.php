<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StockCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_brand_model_id',
        'year',
        'brochure',
        'status',
    ];

    public $translatable = ['name'];


    function images(){
        return $this->hasMany(StockCarImage::class);
    }
    function stockCarCategories(){
        return $this->hasMany(StockCarCategory::class);
    }

}
