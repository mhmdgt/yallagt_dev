<?php

namespace App\Models;

use App\Models\ProductListing;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Storehouse extends Model
{
    use HasFactory  , UserStampWithTypeTrait;

    protected $fillable = [
        'seller_id',
        'name',
        'manager_name',
        'phone',
        'landline',
        'email',
        'governorate_id',
        'area',
        'building_number',
        'street',
        'full_address',
        'gps_link',
    ];
    // -------------------- Method -------------------- //
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    // -------------------- Method -------------------- //
    public function productListings()
    {
        return $this->hasMany(ProductListing::class);
    }
}
