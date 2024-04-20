<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCarCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'price',
        'status',
        'rims_size',
        'number_of_seat',
        'trunk_size',
        'fuel_tank_capacity',
        'engine_capacity',
        'cylinder',
        'acceleration',
        'maximum_speed',
        'newton_meter',
        'horsepower',
        'transmission_speed',
        'fuel_consumption',
        'body_shape_id',
        'fuel_type_id',
        'transmission_type_id',
        'engine_aspiration_id',
        'engine_km_id',
        'engine_cc_id',
        'stock_car_id'];

}
