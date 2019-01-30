<?php
//源图命名（应用于论坛等程序时可以用会员名编码命名）
$GLOBALS['WEATHER_DATA'] = '../../';
@ require ('../../writable/set/set.php');
@ require ('../../writable/set/set_sql.php');
@ require ('../../writable/set/set_userface.php');
@ require ('../function/confirm_power.php');
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传图片 - 162100（头像）截图程序 - Power by 162100.com</title>
<link href="userface.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="allBox">
  <div id="picBox">
    <div id="picViewOuter" style="height:255px">
<?php
define('POWER', confirm_power('../../'));
if (POWER == 0) {
  err('您尚未登陆！');
}
/*
if (strpos($_SERVER['HTTP_REFERER'], $web['sitehttp']) !== 0) {
  err('禁止本站外提交！');
}
*/
$web['img_up_dir'] = '../../writable/__temp__';
$web['img_name_b'] = 'face-'.urlencode($session[0]);
//gmdate("YmdHis", time() + (floatval($web["time_pos"]) * 3600));


//本机上传
if ($_POST['ptype'] == 1) {
  if ($web['max_file_size'][15] == 0) {
    err('系统设定为禁止上传。');
  }
  if (is_array($_FILES['purl1']) && $_FILES['purl1']['size']) {
    //@chmod('../../data', 0777);
    eval('@chmod(\'../../data\', 0'.$web['chmod'].');');
    if (!file_exists($web['img_up_dir']) && !@mkdir($web['img_up_dir'])) {
      err('图片无法上传，上传目录不存在。');
    }
    $inis = ini_get_all();
    $uploadmax = $inis['upload_max_filesize'];
    if ($_FILES['purl1']['size'] > $web['max_file_size'][15] * 1024) {
      err('图片上传不成功！上传的文件请小于'.$web['max_file_size'][15].'KB。');
    }
    if (!preg_match('/\.(jpg|gif|png)$/i', strtolower($_FILES['purl1']['name']), $matches)) {
      err('图片上传不成功！请选择一个有效的文件：允许的格式有（jpg|gif|png）。');
    }
    if ($fp = @fopen($_FILES['purl1']['tmp_name'], 'rb')) {
      $img_contents = @fread($fp, $_FILES['purl1']['size']);
      @fclose($fp);
    } else {
      $img_contents = @file_get_contents($_FILES['purl1']['tmp_name']);
    }
    if (preg_match('/<\?php|eval|POST|base64_decode|base64_encode/i', $img_contents, $m_err)) {
      err('提示！禁止提交。该文件含有禁止的代码'.str_replace('?', '\?', $m_err[0]).'。');
    }
    //@chmod($web['img_up_dir'], 0777);
    eval('@chmod(\''.$web['img_up_dir'].'\', 0'.$web['chmod'].');');
    if (@move_uploaded_file($_FILES['purl1']['tmp_name'], $web['img_up_dir'].'/'.$web['img_name_b'].'.'.$matches[1])) {
      fsetcookie($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$matches[1]);
      alert('图片上传成功！','z_other_face_main.html');
    } else {
      err('图片上传不成功！');
    }
  } else {
    err('图片不存在！路径不正确；或系统出错，请稍候再试。');
  }


//网络图片
} elseif ($_POST['ptype'] == 2) {
  $filename = $_POST['purl2'];
  if ($filename == '' || !preg_match('/^https?:\/\/.+\.(jpg|gif|png)$/i', $filename, $matches)) {
    err('图片URL输入不合法！网址以http://开头！图片格式限(jpg|gif|png)。');
  }
  @ require ('../function/read_file.php');

  if (!$im = read_file($filename)) {
    err('无法获取此图片！请确定图片URL正确。');
  }
  if (strlen($im) > 2 * 1024 * 1024) {
    err('图片上传不成功！链接的文件请小于2MB。');
  }
  $t = strtolower($matches[1]);
@ require ('../function/write_file.php');
  write_file($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$t, $im);
  fsetcookie($web['img_up_dir'].'/'.$web['img_name_b'].'.'.$t);
  alert('头像上传成功！','z_other_face_main.html');


//截图
} elseif ($_POST['ptype'] == 4) {
  if (extension_loaded('gd')) {
    if (!function_exists('gd_info')) {
      err('重要提示：你的gd版本很低，图片处理功能可能受到约束。');
    }
  } else {
    err('重要提示：你尚未加载gd库，图片处理功能可能受到约束。');
  }
  $cimg_o = $_COOKIE['162100screenshotsImg'];
  $img_info = getimagesize($cimg_o);
  $_POST['imgw'] = $_POST['imgw'] == $img_info[0] ? $_POST['imgw'] : $img_info[0];
  $_POST['imgh'] = $_POST['imgh'] == $img_info[1] ? $_POST['imgh'] : $img_info[1];
  //如果图片尺寸符合标准而直接提交的话
  if ($_POST['imgto'] == 1) {
    if ($_POST['imgw'] > $web['img_w_b'] || $_POST['imgh'] > $web['img_h_b']) {
      err('图片尺寸不符标准！');
    }
  } else {
    $cut_x = $_POST['imgw'] / $_POST['noww'] * $_POST['px'];
    $cut_y = $_POST['imgh'] / $_POST['nowh'] * $_POST['py'];
    $cut_w = $_POST['imgw'] / $_POST['noww'] * $_POST['pw'];
    $cut_h = $_POST['imgh'] / $_POST['nowh'] * $_POST['ph'];
    if ($_POST['pw'] / $_POST['ph'] > $web['img_w_b'] / $web['img_h_b']) {
      $ow1 = $web['img_w_b'];
      $oh1 = ceil($ow1 * $_POST['ph'] / $_POST['pw']);
    } else {
      $oh1 = $web['img_h_b'];
      $ow1 = ceil($oh1 * $_POST['pw'] / $_POST['ph']);
    }
    /*
    if ($_POST['pw'] / $_POST['ph'] > $web['img_w_s'] / $web['img_h_s']) {
      $ow1 = $web['img_w_s'];
      $oh1 = ceil($ow1 * $_POST['ph'] / $_POST['pw']);
    } else {
      $oh1 = $web['img_h_s'];
      $ow1 = ceil($oh1 * $_POST['pw'] / $_POST['ph']);
    }
    */
    if (run_img_resize($cimg_o, $cimg_o, $cut_x, $cut_y, $cut_w, $cut_h, $cut_w, $cut_h, $web['pic_quality']) && run_img_resize($cimg_o, $cimg_o, 0, 0, $ow1, $oh1, false, false, $web['pic_quality'])) {
      $ow = $_POST['pw'];
      $oh = $_POST['ph'];
      if ($ow1 / $oh1 >= 240 / 180) {
        if ($ow1 > 240) {
          $ow1 = 240;
          $oh1 = ceil(240 * $_POST['ph'] / $_POST['pw']);
        }
      } else {
        if ($oh1 > 180) {
          $oh1 = 180;
          $ow1 = ceil(180 * $_POST['pw'] / $_POST['ph']);
        }
      }
    } else {
      err('截图失败！');
    }
  }
  $cimg_o = typeto($cimg_o, $web['img_up_format']);
  $o = 0;
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    //操作前再深层判断一下权限，v3.3加
    if ($session[1].'|'.$session[2] != get_session_key()) {
      err('经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！');
    }
    if (db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` SET `face`='.db_escape_string($db, @file_get_contents($cimg_o)).' WHERE username="'.$session[0].'" LIMIT 1')) {
      $o = 1;
	}
  } else {
    err($sql['db_err']);
  }
  db_close($db);
  @unlink($cimg_o);

  err('<iframe id="imgifr" src="../../userface.php" style="display:none"></iframe>
截图成功！'.($o == 1 ? '成功储存到数据库。' : '但储存到数据库失败！').'<div class="sword">（可点右键另存为）</div><script>
document.getElementById(\'imgifr\').contentWindow.location.reload(true);
if(parent!=self){if(parent.document.getElementById(\'screenshotsShow\')!=null) {parent.document.getElementById(\'screenshotsShow\').innerHTML=\'<img src="userface.php" />\';}}
</script><center><a href="../../userface.php" target="_blank"><img class="i_face_small" src="../../userface.php" /></a></center>');
  exit;

}
/*
function get_en_url($d) {
  $arr = @explode('/', $d);
  $arr = array_map('urlencode', $arr);
  return @implode('/', $arr);
}
*/
function err($text, $bj = 'err') {
  die('<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table style="margin:auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<span class="'.$bj.'"></span>'.$text.'</td>
  </tr>
</table><p><a href="z_other_face_start.html">重载图片</a></p></td>
  </tr>
</table></div></div></div></body></html>');
}

function alert($text, $url = 'z_other_face_up.php') {
  die('<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table style="margin:auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="alert"></span>'.$text.'</td>
  </tr>
</table>
<script>location.href=\''.$url.'\';</script></td>
  </tr>
</table></div></div></div></body></html>');
}

//转换格式
function typeto($im, $format) {
  $fr = strtolower(ltrim(strrchr($im, '.'), '.'));
  if ($format == 'jpg') $f = 'jpeg';
  elseif ($format == 'png') $f = 'png';
  else $f = 'gif';
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
    @unlink($im);
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
function run_img_resize($img, $resize_img_name, $dx, $dy, $resize_width, $resize_height, $w, $h, $quality) {
  $img_info = @getimagesize($img);
  $width = $img_info[0];
  $height = $img_info[1];
  $w = $w == false ? $width : $w;
  $h = $h == false ? $height : $h;
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
    @imagecopyresampled($resize_img, $img, 0, 0, $dx, $dy, $resize_width, $resize_height, $w, $h);
  } else {
    $resize_img = @imagecreate($resize_width, $resize_height);
    $white = @imagecolorallocate($resize_img, 255, 255, 255);
    @imagefilledrectangle($resize_img, 0, 0, $resize_width, $resize_height, $white);// 填充背景色
    @imagecopyresized($resize_img, $img, 0, 0, $dx, $dy, $resize_width, $resize_height, $w, $h);
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
  return true;
}

//记忆文件名
function fsetcookie($img) {
  echo '<script>document.cookie="162100screenshotsImg="+encodeURIComponent(\''.$img.'\')+"; path=/;";</script>';
}

?>
    </div>
  </div>
</div>
</body>
</html>