<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingService extends Model
{
    use HasFactory, HasTranslations, UserStampWithTypeTrait;

    protected $fillable = ['name', 'fee'];

    public $translatable = ['name'];

    // -------------------- Method -------------------- //
    public function ShippingCompany()
    {
        return $this->belongsTo(ShippingCompany::class);
    }
}
