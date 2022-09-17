<?php

use Illuminate\Support\Facades\Storage;

function base64ToImage($base64String)
{
    $image = explode('base64,',$base64String);
    $image = end($image);
    $image = str_replace(' ', '+', $image);
    $file = "images/" . uniqid() . '.png';

    Storage::disk('public')->put($file,base64_decode($image));

    return $file;
}

function imageToBase64Conversion(){
    $imagePath = public_path("images/632582146161d.png");
    $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));
    return $image;
}
