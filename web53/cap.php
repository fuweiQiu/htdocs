<?php
session_start();
$capstr = '';
$str = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM';
for($i = 0; $i < 4; $i++){
    $capstr = $capstr . $str[rand(0, 61)];
}
$_SESSION['captcha'] = $capstr;
header('Content-type: image/PNG');
$width = 80;
$height = 20;
$image = imagecreate($width, $height);
$bgColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
$textColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
$fontFamily = 'Arial.ttf';
$fontSize = 14;
imagefill($image, 0, 0, $bgColor);
imagettftext($image, $fontSize, 0, 20, 17, $textColor, $fontFamily, $_SESSION['captcha']);
for($j = 0; $j < 100; $j++){
    imagesetpixel($image, rand() % $width, rand() % $height, $textColor);
}
imagepng($image);
imagedestroy($image);

?>