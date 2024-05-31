<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCompany extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function ShippingService()
    {
        return $this->hasMany(ShippingService::class);
    }
}
