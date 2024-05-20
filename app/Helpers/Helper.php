<?php

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;

// -------------------- getYearsRange -------------------- //
function getYearsRange($startYear = null, $endYear = null)
{
    // Get the current year
    $currentYear = date('Y');

    // Calculate the start year 65 years back
    $startYear = $startYear ?? $currentYear - 65;

    // Calculate the next year
    $nextYear = $currentYear + 1;

    // Generate the range from the start year to the next year
    $yearsRange = range($startYear, $nextYear);

    // Reverse the array to make the next year first and the last 65 years last
    $yearsRange = array_reverse($yearsRange);

    return $yearsRange;
}
// -------------------- generateUniqueId -------------------- //
function generateUniqueId()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $id = '';

    // Generate a 10-character random ID
    for ($i = 0; $i < 10; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $character = strtoupper($characters[$randomIndex]); // Convert character to uppercase
        $id .= $character;
    }

    return $id;
}
// -------------------- uniqueRandEight -------------------- //
function uniqueRandEight()
{
    $randomNumbers = '';
    for ($i = 0; $i < 8; $i++) {
        $randomNumbers .= random_int(0, 9); // Random number between 0 and 9
    }
    return $randomNumbers;
}
// -------------------- callButton -------------------- //
if (!function_exists('callButton')) {
    function callButton($phoneNumber)
    {
        return <<<HTML
        <div class="col-9">
            <button type="button" class="btn btn-success btn-block call-btn" data-phone="$phoneNumber">
                <i class="mr-2 bi bi-telephone"></i>
                <span class="call-text">Call</span>
            </button>
        </div>
        HTML;
    }
}
// -------------------- getFirstName -------------------- //
if (!function_exists('getFirstName')) {
    function getFirstName($fullName)
    {
        // Split the full name at the first space character
        $parts = explode(' ', $fullName, 2);

        // Return the first part (first name)
        return $parts[0];
    }
}
// -------------------- display_img -------------------- //
function display_img($image)
{
    return $image ? asset('storage/' . $image) : asset('gt_manager/media/no_image.jpg');
}
// -------------------- user_data -------------------- //
if (!function_exists('user_data')) {
    function user_data()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the user data
        return $user;
    }
}
// -------------------- get_contact_us -------------------- //
function get_contact_us()
{
    return ContactUs::first();
}
// -------------------- Sorting By price -------------------- //
if (!function_exists('sortStockCarCategoriesByPrice')) {
    function sortStockCarCategoriesByPrice($categories)
    {
        return $categories->sortBy(function ($category) {
            return (float) preg_replace('/[^0-9.]/', '', $category->price);
        });
    }
}
// -------------------- getCurrentLocale -------------------- //
if (!function_exists('getCurrentLocale')) {
    /**
     * Get the current application locale.
     *
     * @return string
     */
    function getCurrentLocale()
    {
        return app()->getLocale();
    }
}
// -------------------- generate_slug -------------------- //
if (!function_exists('generate_slug')) {
    /**
     * Generate a URL-friendly slug from a given string.
     *
     * @param string $value
     * @return string
     */
    function generate_slug($value)
    {
        // Convert to lowercase
        $value = strtolower($value);
        // Remove special characters
        $value = preg_replace('/[,.=\-_\+\'"\\\}\{\:\?\/\!@#\$%\^&\*\(\)\<\>]/', '', $value);
        // Replace spaces with hyphens
        $value = str_replace(' ', '-', $value);

        return $value;
    }
}

















