<?php

//转换格式
function typeto($im, $format) {
  $fr = strtolower(ltrim(strrchr($im, '.'), '.'));
  if ($fr != $format) {
    switch ($fr) {
      case 'gif':
      $img = imagecreatefromgif($im);
      break;
      case 'png':
      $img = imagecreatefrompng($im);
      break;
      case 'jpg':
      $img = imagecreatefromjpeg($im);
      break;
    }
    if ($format == 'jpg') $f = 'jpeg';
    elseif ($format == 'png') $f = 'png';
    else $f = 'gif';
    $im = preg_replace("/\.".preg_quote($fr)."$/", "", $im).".".$format;
    eval('
    if(image'.$f.'($img, $im)) {
      imagedestroy($img);
    }
    ');
  }
  return $im;
}

//处理缩略图
function run_img_resize($img, $resize_img_name, $sx, $sy, $resize_width, $resize_height, $w, $h, $quality, $xywh = false) {
  if (empty($img) || empty($resize_img_name)) return false;
  $img_type = array(1=>'gif', 2=>'jpg', 3=>'png');
  $img_info = @getimagesize($img);
  $width = $img_info[0];
  $height = $img_info[1];
  $w = $w == false ? $width : $w;
  $h = $h == false ? $height : $h;
  $resize_width = (int)$resize_width;
  $resize_height = (int)$resize_height;
  $w = (int)$w;
  $h = (int)$h;
  if ($resize_width<=0 || $resize_height<=0 || $w<=0 || $h<=0) return false;
  if ($sx == 0 && $sy == 0) {
    if ($width == $resize_width && $height == $resize_height) {
      if ($img != $resize_img_name) {
        $resize_img_type = strtolower(ltrim(strrchr($resize_img_name, '.'), '.'));
        if ($img_type[$img_info[2]] != $resize_img_type) {
          $img = typeto($img, $resize_img_type);
        } 
        @copy($img, $resize_img_name);
      }
      return $resize_img_name;
    }
  }
  if ($xywh != false) {
    if ($width / $height > $resize_width / $resize_height) {
      $wh = $width;
      $w = ceil($height * $resize_width / $resize_height);
      $sx = ceil(($wh - $w) / 2);
    } else {
      $wh = $height;
      $h = ceil($width * $resize_height / $resize_width);
      $sy = ceil(($wh - $h) / 2);
    }
    unset($wh);
  }

  switch ($img_info[2]) {
    case 1 :
    $img = @imagecreatefromgif($img);
    break;
    case 2 :
    $img = @imagecreatefromjpeg($img);
    break;
    case 3 :
    $img = @imagecreatefrompng($img);
    break;
  }
  if (!$img) return false;

  if (function_exists('imagecopyresampled')) {
    $resize_img = @imagecreatetruecolor($resize_width, $resize_height);
    $white = @imagecolorallocate($resize_img, 255, 255, 255);
    @imagefilledrectangle($resize_img, 0, 0, $resize_width, $resize_height, $white);// 填充背景色
    @imagecopyresampled($resize_img, $img, 0, 0, $sx, $sy, $resize_width, $resize_height, $w, $h);
  } else {
    $resize_img = @imagecreate($resize_width, $resize_height);
    $white = @imagecolorallocate($resize_img, 255, 255, 255);
    @imagefilledrectangle($resize_img, 0, 0, $resize_width, $resize_height, $white);// 填充背景色
    @imagecopyresized($resize_img, $img, 0, 0, $sx, $sy, $resize_width, $resize_height, $w, $h);
  }
  //if(file_exists($resize_img_name)) unlink($resize_img_name);
  switch ($img_info[2]) {
    case 1 :
    @imagegif($resize_img, $resize_img_name);
    break;
    case 2 :
    @imagejpeg($resize_img, $resize_img_name, $quality); //100质量最好，默认75
    break;
    case 3 :
    @imagepng($resize_img, $resize_img_name);
    break;
  }
  @imagedestroy($resize_img);
  return $resize_img_name;
}


/*
$img = 'img2.jpg';
$resize_img_name = 'img2.jpg';
run_img_resize($img, $resize_img_name, 0, 0, 54, 108, 0, 0, 100, 1);
*/




?>