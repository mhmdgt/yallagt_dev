<?php

namespace App\Models;

use App\Models\CarBrandModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class CarBrand extends Model
{
    use HasFactory  ,HasTranslations;
    protected $fillable = ['name', 'slug' , 'logo'];
    public $translatable = ['name'];


    public function models()
    {
        return $this->hasMany(CarBrandModel::class);
    }
    // function stockCars(){
    //     return $this->hasManyThrough();
    // }

} // END CLASS
