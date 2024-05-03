<?php

namespace App\Traits;


trait SlugTrait
{
    function slug(array $nameArray)
    {
        $slugArray = [];
        foreach ($nameArray as $key => $value) {
            $slugArray[$key] = str_replace(' ', '-', strtolower($value)); // Replace spaces with underscores and convert to lowercase
        }
        return $slugArray;
    }
}
