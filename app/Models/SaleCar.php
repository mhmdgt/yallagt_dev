<?php

namespace App\Models;

use App\Traits\UserStampTrait;
use Illuminate\Support\Facades\App;
use App\Traits\UserStampWithTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleCar extends Model
{
    use HasFactory, UserStampWithTypeTrait;

    protected $guarded = [];

    // -------------------- Method -------------------- //
    public static function getByTranslatedSlug($slug)
    {
        $locale = App::getLocale();
        return self::where("slug->{$locale}", $slug);
    }
    // -------------------- Method -------------------- //

}
