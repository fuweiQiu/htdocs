<?php
//路徑和檔名
$origianl_photo = './image/pretty.jpeg';
$result_image = './image/reslut.jpeg';

//載入原始圖片
$source = imagecreatefromjpeg($origianl_photo);

//增加噪點
for($i = 0; $i < imagesx($source);$i++){
    for($j = 0; $j < imagesy($source);$i++){
        $color = imagecolorat($source, $i, $j);
        $r = ($color >> 16) & 0xFF;
        $g = ($color >> 8) & 0xFF;
        $b = $color & 0xFF;
        $rand = rand(-50, 50);
        $r += $rand;
        $g += $rand;
        $b += $rand;
        $r = min(max($r, 0), 255);
        $g = min(max($g, 0), 255);
        $b = min(max($b, 0), 255);
        $color = imagecolorallocate($source, $r, $g, $b);
        imagesetpixel($source, $i, $j, $color);
    }
}
//加入浮水印
$watermarkText = 'SAMPLE';
$fontSize = 20;
$fontFile = 'Arial.ttf';
$opacity = 50; //浮水印透明度

$sourceWidth = imagesx($source);
$sourceHeight = imagesy($source);
$textWidth = imagettfbbox($fontSize, 0, $fontFile, $watermarkText)[2] - imagettfbbox($fontSize,0, $fontFile, $watermarkText)[0];
$textHeight = imagettfbbox($fontSize, 0, $fontFile, $watermarkText)[1] - imagettfbbox($fontSize, 0, $fontFile, $watermarkText)[7];

//計算浮水印的座標範圍
$startX = 0;
$startY = 0;
$endX = $sourceWidth - $textWidth;
$endY = $sourceHeight - $textHeight;

//讚圖片各個區域隨機繪製水印
for($i = 0; $i < 10; $i++){
    $posX = mt_rand($startX, $endX);
    $posY = mt_rand($startY, $endY);

    $color = imagecolorallocatealpha($source, 0, 0, 0, $opacity);
    imagettftext($source, $fontSize, 0, $posX, $posY, $color, $fontFile, $watermarkText);

}
imagejpeg($source, $result_image);
imagedestroy($source);

echo '圖片處理完成'

?>