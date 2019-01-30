<?php

@ header('content-type: text/html; charset=utf-8');

function copy_pic($matches) {
  global $extra;
  static $step = 1;
  $url = $matches[2];
  $pic_dir = $extra['img_d'];
  $pic_name = basename($url);
  $save_name = $step.'_'.base64_encode($pic_name);
  if (preg_match('/\.(jpe?g|gif|png)/i', $url, $m_pic)) {
    $im_type = preg_replace('/jpeg/i', 'jpg', $m_pic[1]);
  } else {
    if ($hds = get_headers($url,1) && isset($hds['Content-Type'])) {
      $im_type = preg_replace('/image\//i', '', $hds['Content-Type']);
    } else {
      $im_type = 'jpg';
    }
  }
  if (file_exists($pic_dir.'/'.$save_name.'.'.$im_type)) {
    $url = 'inc/'.$pic_dir.'/'.$save_name.'.'.$im_type;
    $step++;
  } else {
    if ($im = read_file($url)) {
      foreach (@glob($pic_dir.'/'.$step.'_*') as $v) {
        @unlink($v);
      }
      write_file($pic_dir.'/'.$save_name.'.'.$im_type, $im);
      $url = 'inc/'.$pic_dir.'/'.$save_name.'.'.$im_type;
      $step++;
    }
  }
  return $matches[1].'src="'.$url;
}

function get_type_text($text) {
  global $extra, $new_stamp;
  switch($_GET['type']) {
    case 'img':
    return '
<script type="text/javascript">
var updateStamp=\''.$new_stamp[0].'\';
</script>
'.$text.'
';
    break;
    case 'li':
    return '
<script type="text/javascript">
var updateStamp=\''.$new_stamp[0].'\';
var newsHotTagName=\''.$extra['hot'].'\';
</script>
'.$text.'
';
    break;
    case 'more':
    return '
<script type="text/javascript">
var updateStamp=\''.$new_stamp[0].'\';
</script>
'.($extra['pic_copy'] == 1 ? preg_replace_callback('/(<img [^>]*)src="([^\"]+)/i', 'copy_pic', $text) : $text).'
';
    break;
    default :
    return '没有采集到新闻信息内容！';
  }
}







//新的时间戳
function print_stamp() {
  global $time, $extra;
  if (!isset($extra['time_step']) || !is_numeric($extra['time_step']) || (string)$extra['time_step'] == '') {
    $time_stamp = gmdate("YmdHis", $time['now'] + 366 * 24 * 60 * 60);
    $time_expires = gmdate("D, d M Y H:i:s", $time['now'] + 366 * 24 * 60 * 60).' GMT';
    //$time_max_age = 366 * 24 * 60 * 60;
    $time_max_age_to = $time['now'] + 366 * 24 * 60 * 60;
  } else {
    $s = floatval($extra['time_step']);
    if ($s > 0) {
      $time_0 = $time['now'] - (gmdate('i', $time['now']) * 60 + gmdate('s', $time['now'])) + $s * 60;
    } else {
      $time_0 = $time['now'] - (gmdate('H', $time['now']) * 3600 + gmdate('i', $time['now']) * 60 + gmdate('s', $time['now'])) + 24 * 3600 + $s * 3600;
    }
    $time_stamp = gmdate("YmdHis", $time_0);
    $time_expires = gmdate("D, d M Y H:i:s", $time_0).' GMT';
    //$time_max_age = $time_0 - $time['now'];
    $time_max_age_to = $time_0;
  }
  //return array($time_stamp, $time_expires, $time_max_age);
  return array($time_stamp, $time_expires, $time_max_age_to);
}

//旧的时间戳
function get_stamp($f) {
  global $time;
  $html_f = read_file($f);
  if (preg_match('/var\s+updateStamp\s*=\s*[\'\"](\d+)[\'\"];/is', $html_f, $m)) {
    return $m[1];
  }
  return $time['date'];
}

function to_utf8(){
    global $news_txt;
    if (function_exists('mb_detect_encoding')) {
      $cha=mb_detect_encoding($news_txt, array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
    }
    if (!$cha) {
      if(preg_match('/<meta [^>]+charset=([\w\-]+)[^\>]*>/i',$f,$m)){
        $cha=$m[1];
      }  
    }
    if ($cha) {
        if(strtolower($cha)!='utf-8'){
          $news_txt=iconv($cha,'utf-8',$news_txt);
        }
    }
    return $news_txt;

}

if (!function_exists('err')) {
  function err($text) {
    echo($text);
  }
}


$GLOBALS['WEATHER_DATA'] = '../../../';
require ($GLOBALS['WEATHER_DATA'].'writable/set/set.php');

if ($_GET['type']!='img' && $_GET['type']!='li' && $_GET['type']!='more') {
  die();
}
require ($GLOBALS['WEATHER_DATA'].'readonly/function/read_file.php');

$time['now'] = time() + floatval($web['time_pos']) * 3600;
$time['date'] = gmdate("YmdHis", $time['now']);
$time['stamp'] = get_stamp('../s_news_'.$_GET['type'].'.html');
if ($time['date'] < $time['stamp']) {
  die();
}

require ('set/'.$_GET['type'].'.php');
if (!isset($extra) || !is_array($extra)) {
  die();
}


require ($GLOBALS['WEATHER_DATA'].'readonly/function/write_file.php');
require ($GLOBALS['WEATHER_DATA'].'readonly/function/img.php');
//error_reporting(E_ALL);

$news_txt = read_file($extra['url']);
$news_txt = to_utf8();
$new_stamp = print_stamp();

$html_text = '';
//if ($news_txt) {
  @require ('code/'.$_GET['type'].'.php');
  if ($text_err == 1) {
    die();
  }
  //if ($text!=''){
    $html_text .= '<?php
$GLOBALS[\'WEATHER_DATA\'] = \'../../\';
require ($GLOBALS[\'WEATHER_DATA\'].\'writable/set/set.php\');

$time[\'now\'] = time() + floatval($web[\'time_pos\']) * 3600;
header(\'Cache-Control: max-age = \'.('.$new_stamp[2].'-$time[\'now\']).\'\');
header(\'Expires: '.$new_stamp[1].'\');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$extra['name'].'</title>';
    $html_text .= '
<base target="_blank" />';
    $html_text .= '
<link href="inc/code/'.$_GET['type'].'.css?'.filemtime('code/'.$_GET['type'].'.css').'" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="inc/code/'.$_GET['type'].'.js?'.filemtime('code/'.$_GET['type'].'.js').'"></script>
</head>
<body>
';
    $html_text .= get_type_text($text);
    $html_text .= '
<script type="text/javascript" language="javascript" src="inc/js_update.php?type='.$_GET['type'].'"></script>';
    $html_text .= '
</body>
</html>';

    write_file('../s_news_'.$_GET['type'].'.php', $html_text);
    echo '<script type="text/javascript">
    if (parent && parent != self) {
      parent.location.reload();
    }
</script>';
    echo 'ok!';
  //}
//}





?>
