<?php

namespace App\Traits;


trait SlugTrait
{
    function slug(array $nameArray)
    {
        $slugArray = [];
        foreach ($nameArray as $key => $value) {
            // Convert to lowercase
            $value = strtolower($value);
            // Remove special characters
            $value = preg_replace('/[,.=\-_\+\'"\\\}\{\:\?\/\!@#\$%\^&\*\(\)\<\>]/', '', $value);
            // Replace spaces with hyphens
            $value = str_replace(' ', '-', $value);
            // Assign the modified value to the array
            $slugArray[$key] = $value;
        }
        return $slugArray;
    }
}

