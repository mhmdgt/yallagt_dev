<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UserStampWithTypeTrait
{
    public static function bootUserStampWithTypeTrait()
    {
        self::creating(function ($model) {
            $type = null;
            $id = null;

            if (method_exists($model, 'getUserType')) {
                $type = $model->getUserType();
                $id = $model->getUserId();
            } elseif (Auth::guard('admin')->check()) {
                $type = 'admin';
                $id = Auth::guard('admin')->id();
            } elseif (Auth::check()) {
                $type = 'user';
                $id = Auth::id();
            }

            $model->created_user_type = $type;
            $model->created_by = $id;
        });

        self::updating(function ($model) {
            $type = null;
            $id = null;

            if (method_exists($model, 'getUserType')) {
                $type = $model->getUserType();
                $id = $model->getUserId();
            } elseif (Auth::guard('admin')->check()) {
                $type = 'admin';
                $id = Auth::guard('admin')->id();
            } elseif (Auth::check()) {
                $type = 'user';
                $id = Auth::id();
            }

            $model->updated_user_type = $type;
            $model->updated_by = $id;
        });
    }
}
