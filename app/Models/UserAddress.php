<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'governorate_id',
        'area',
        'building_number',
        'street',
        'full_address',
        'gps_link',
        'type',
    ];
    // -------------------- Method -------------------- //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // -------------------- Method -------------------- //

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}
