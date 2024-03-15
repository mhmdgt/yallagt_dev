<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait GetModelTrait{
    function getModel(  $model, array $columns){
        return $model::get($columns);
    }
}