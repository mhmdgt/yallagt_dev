<?php

namespace App\Models;

use App\Models\CarBrandModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class CarBrand extends Model
{
    use HasFactory  ,HasTranslations;
    protected $fillable = ["logo", 'name',"slug"];
    public $translatable = ['name'];

    
    public function models()
    {
        return $this->hasMany(CarBrandModel::class);
    }

} // END CLASS
