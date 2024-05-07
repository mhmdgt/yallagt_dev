<?php


use App\Models\User;
use App\Models\TransmissionType;
use Illuminate\Support\Facades\Auth;


// -------------------- Fetch Years -------------------- //
function getYearsRange($startYear = null, $endYear = null)
{
    $startYear = $startYear ?? date('Y');
    $endYear = $endYear ?? $startYear - 65;

    return range($startYear, $endYear);
}

// -------------------- Display images -------------------- //
if (!function_exists('getFirstName')) {
    function getFirstName($fullName)
    {
        // Split the full name at the first space character
        $parts = explode(' ', $fullName, 2);

        // Return the first part (first name)
        return $parts[0];
    }
}
// -------------------- Get User Data -------------------- //
function display_img($image)
{
    return $image ? asset('storage/' . $image) : asset('gt_manager/media/no_image.jpg');
}
// -------------------- Get User Data -------------------- //
if (!function_exists('user_data')) {
    function user_data()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the user data
        return $user;
    }
}
