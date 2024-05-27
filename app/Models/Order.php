<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // -------------------- Method -------------------- //
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
