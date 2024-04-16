<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CarBrandModel extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        "car_brand_id",
        'name',
        "slug",
    ];

    public $translatable = ['name'];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }

    public function StockCars()
    {
        return $this->hasMany(StockCar::class, 'car_brand_model_id');
    }
}
