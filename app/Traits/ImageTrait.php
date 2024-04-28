<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{


    private function uploadImage($image,$folder,$slug, $oldImage = null)
    {
        if ($oldImage) {
            $this->deleteImage($oldImage);
        }
        $name = Str::slug($slug).'_' . bin2hex(random_bytes(16)) . '.' . $image->getClientOriginalExtension();
        return  $image->storeAs($folder, $name, 'public');
    }

    private function deleteImage($imagePath)
    {
        // Check if $imagePath is null or empty
        if ($imagePath === null || $imagePath === '') {
            return; // Return early if $imagePath is not valid
        }
    
        // Check if the image exists in the 'public' disk
        if (Storage::disk('public')->exists($imagePath)) {
            // Delete the image from the 'public' disk
            Storage::disk('public')->delete($imagePath);
        }
}

}