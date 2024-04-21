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

        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}
