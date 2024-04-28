<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Exception;
trait DomTrait{
  
private function uploadContentFiles($content)
{
    if (!$content) {
        return null;
    }
    // Create a DOMDocument object
    $dom = new \DOMDocument();

    // Suppressing errors for malformed HTML during loading
    libxml_use_internal_errors(true);
    // Load HTML content encoded with htmlspecialchars
    $dom->loadHTML('<?xml encoding="UTF-8">' . htmlspecialchars_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    // Get all elements with inline styles
    $elements = $dom->getElementsByTagName('*');

    foreach ($elements as $element) {
        // Remove color attributes
        $element->removeAttribute('color');

        // Get the style attribute value
        $style = $element->getAttribute('style');

        // Check if style attribute is present
        if (!empty($style)) {
            // Check if text-align: center is present
            if (strpos($style, 'text-align: center') !== false) {
                // Preserve text-align: center and remove other styles
                $element->setAttribute('style', 'text-align: center;');
            } else {
                // Remove all other inline styles
                $element->removeAttribute('style');
            }
        }
    }

    // Get all file elements
    $files = $dom->getElementsByTagName('file');

    foreach ($files as $file) {
        // Get the source attribute value
        $src = $file->getAttribute('src');

        // Validate if the source attribute is present
        if (!empty($src)) {
            // Assuming the file is base64 encoded
            $data = explode(',', $src);
            if (count($data) === 2) {
                $data = base64_decode($data[1]);

                // Generate a unique filename with an image extension
                $file_extension = 'png'; // Change this to the desired image extension
                $file_name = "/upload/" . time() . '_' . rand(100, 999) . '.' . $file_extension;

                $path = public_path() . $file_name;

                // Check if the directory exists, if not, create it
                $directory = pathinfo($path, PATHINFO_DIRNAME);
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Write the file content to the path
                if (file_put_contents($path, $data) !== false) {
                    // Update the src attribute with the new file path
                    $file->setAttribute('src', $file_name);
                } else {
                    // Handle error if unable to write file
                    throw new Exception("Failed to write file to path: $path");
                }
            } else {
                // Handle error if the src attribute doesn't have valid base64 format
                throw new Exception("Invalid base64 format for src attribute: $src");
            }
        } else {
            // Handle error if src attribute is empty or missing
            throw new Exception("src attribute is empty or missing for file element");
        }

        // Remove the src attribute to prevent re-processing
        $file->removeAttribute('src');
    }

    // Save and return the modified HTML content
    return $dom->saveHTML();
}

}