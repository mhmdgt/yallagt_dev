<?php


use App\Models\TransmissionType;

// -------------------- Display images -------------------- //
function display_img($image)
{
    return $image ? asset('storage/' . $image) : asset('gt_manager/media/no_image.jpg');
}
// -------------------- Get Years -------------------- //
function getYearsRange($startYear = null, $endYear = null)
{
    $startYear = $startYear ?? date('Y');
    $endYear = $endYear ?? $startYear - 65;

    return range($startYear, $endYear);
}
// -------------------- Get Trans types -------------------- //

