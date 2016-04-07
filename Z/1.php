<?php


session_start();

function yz($count=4,$type=4)
{


$_SESSION['yz']=null;
$arr=array(1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','h','j','k','m','n','p','r');

shuffle($arr);

$type=$type;
$str=array_rand($arr,$type);

$width=$count*20+20;

header("content-type:image/png");
$img=imagecreatetruecolor($width,50);


$bgcolor=imagecolorallocate($img,100,0,255);


imagefill($img,0,0,$bgcolor);

for($i=0;$i<150;$i++){
	$pxcolor=imagecolorallocate($img,rand(20,200),rand(20,200),rand(20,200));
	imagesetpixel($img,rand(0,$width),rand(0,50),$pxcolor);

}
for($i=0;$i<15;$i++){
	$linecolor=imagecolorallocate($img,rand(20,200),rand(20,200),rand(20,200));
	imageline($img,rand(0,$width),rand(0,$width),rand(0,50),rand(0,50),$linecolor);

}

for($i=0;$i<$type;$i++){

$fontcolor=imagecolorallocate($img,rand(150,200),rand(150,200),rand(20,200));
imagettftext($img,20,rand(-20,30),10+$i*20,30,$fontcolor,"simhei.ttf",$arr[$str[$i]]);
$_SESSION['yz'].=$arr[$str[$i]];

}



imagepng($img);

imagedestroy($img);

}

yz(4,4);