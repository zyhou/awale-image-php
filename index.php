<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(array('driver' => 'gd'));
$img = Image::canvas(400, 370, '#0BAC9F');

$img->rectangle(10, 100, 390, 270, function ($draw) {
    $draw->background('#f39c12');
});

$arr = array(0, 10, 5, 4, 4, 14, 4, 4, 4, 4, 4, 4);
$arrtop = array_reverse(array_slice($arr, 6, 11));
foreach($arrtop as $key=>$row){

    $width = $key * 60;
    $img->circle(50, 50 + $width, 150, function ($draw) {
        $draw->background('#d35400');
    });

    $img->text(str_pad($row, 2, ' ', STR_PAD_LEFT), 35 + $width, 160, function($font) {
        $font->size(30);
        $font->file('arial.ttf');
        $font->color('#f1c40f');
    });
}

$arrbottom = array_slice($arr, 0, 6);
foreach($arrbottom as $key=>$row){

    $width = $key * 60;
    $img->circle(50, 50 + $width, 220, function ($draw) {
        $draw->background('#d35400');
    });

    $img->text(str_pad($row, 2, ' ', STR_PAD_LEFT), 35 + $width, 230, function($font) {
        $font->size(30);
        $font->file('arial.ttf');
        $font->color('#f1c40f');
    });
}

$img->encode("png");
$img->save('public/bar.png');

