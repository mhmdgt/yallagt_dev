<?php

function display_img($image){
return  $image?asset('storage/'.$image):asset( 'gt_manager/media/no_image.jpg');
}



