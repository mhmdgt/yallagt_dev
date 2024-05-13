<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Storehouse extends Model
{
    use HasFactory  , UserStampWithTypeTrait;

    protected $fillable = [
        'merchant',
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

}
