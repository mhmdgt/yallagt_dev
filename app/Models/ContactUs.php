<?php

namespace App\Models;

use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactUs extends Model
{
    use HasFactory, HasTranslations ;

    protected $guarded = [];

    public $translatable = ['site_name', 'headqurter_address'];

}
