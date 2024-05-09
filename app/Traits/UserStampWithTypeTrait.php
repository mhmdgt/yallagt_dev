<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

trait UserStampWithTypeTrait
{

    // public static function bootUserStampWithTypeTrait()
    // {

    //     $user = Auth::user();
    //     if ($user instanceof User) {

    //         $type = 'user';
    //     } elseif ($user instanceof Admin) {

    //         $type = 'admin';
    //     }

    //     self::creating(function ($model) {
    //         $model->created_by = auth()->guard('admin')->user()->id;
    //         $model->created_type = $type;
    //     });
    //     self::updating(function ($model) {
    //         $model->updated_by = auth()->guard('admin')->user()->id;
    //         $model->updated_type = $type;
    //     });

    //     self::deleting(function ($model) {
    //         $model->deleted_by = auth()->guard('admin')->user()->id;
    //         $model->deleted_type = $type;
    //         // $model->saveQuietly();
    //     });
    // }




    public static function bootUserStampWithTypeTrait()
    {
        $user = Auth::user();
        if ($user instanceof User) {
            $type = 'user';
            $id = auth()->user()->id;
        } else {
            $type = 'admin';
            $id = auth()->guard('admin')->user()->id;
        }

        self::creating(function ($model) use ($id, $type) {
            $model->created_by = $id;
            $model->created_type = $type;
        });

        self::updating(function ($model) use ($id, $type) {
            $model->updated_by = $id;
            $model->updated_type = $type;
        });

        self::deleting(function ($model) use ($id, $type) {
            $model->deleted_by = $id;
            $model->deleted_type = $type;
            // $model->saveQuietly();
        });
    }
}
