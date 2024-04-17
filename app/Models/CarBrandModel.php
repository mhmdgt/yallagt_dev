<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarBrandModel extends Model
{
    use HasFactory  ,HasTranslations;
    protected $fillable = [ 'name',"slug","car_brand_id"];
    public $translatable = ['name'];

    function brand(){
        return $this->belongsTo(CarBrand::class);
    }
}
