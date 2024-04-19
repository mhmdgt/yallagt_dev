<?php
namespace App\Traits;

use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
trait ImageTrait
{

    private function uploadImage($image, $path, $oldImage = null)
    {
        // Validate $image
        if (!($image instanceof UploadedFile) || !$image->isValid()) {
            // Handle invalid or null image
            return null; // or throw an exception, log an error, etc.
        }

        if ($oldImage) {
            $this->deleteImage($oldImage, $path);
        }

        $webp = Webp::make($image->getRealPath());

        // Generate a unique name for the image
        $hexName = $this->generateHexName($image);

        // Check if the directory exists, if not, create it
        $directory = public_path("gt_manager/media/$path");
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Save the image
        $webp->save("$directory/$hexName");

        return $hexName;
    }

    private function generateHexName($image)
    {
        return request()->input('name_en') . md5(time()) . '.' . $image->getClientOriginalExtension();
    }
    private function deleteImage($imageName, $path)
    {
        $imagePath = public_path("gt_manager/media/$path/" . $imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
