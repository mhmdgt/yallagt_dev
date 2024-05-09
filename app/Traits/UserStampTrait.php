<?php
namespace App\Traits;
trait UserStampTrait{


    
    public static function bootUserStampTrait(){
        self::creating(function($model){
            $model->created_by = auth()->guard('admin')->user()->id;

        });
        self::updating(function($model){
            $model->updated_by = auth()->guard('admin')->user()->id;
        });

        self::deleting(function($model){
            $model->deleted_by = auth()->guard('admin')->user()->id;
            // $model->saveQuietly();
        });





    }
}
