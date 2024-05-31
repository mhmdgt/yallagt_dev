<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCompany extends Model
{
    use HasFactory, HasTranslations, UserStampWithTypeTrait;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function ShippingService()
    {
        return $this->hasMany(ShippingService::class);
    }
}
