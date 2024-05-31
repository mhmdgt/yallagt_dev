<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // -------------------- Method -------------------- //
    public function UserCartItems()
    {
        return $this->hasMany(UserCartItem::class);
    }
    // -------------------- Method -------------------- //
    public function productListing()
    {
        return $this->belongsTo(ProductListing::class);
    }




}
