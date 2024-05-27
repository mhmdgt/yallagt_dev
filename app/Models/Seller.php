<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function storehouses()
    {
        return $this->hasMany(Storehouse::class);
    }

}
