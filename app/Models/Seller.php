<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory  , UserStampWithTypeTrait;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    function storehouses(){
        return $this->hasMany(Storehouse::class);
    }
    
}
