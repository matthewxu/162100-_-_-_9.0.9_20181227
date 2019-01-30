<?php
@ ini_set('display_errors', false);

@ header("content-type: text/html; charset=gb2312");

function city_err_journal($city) {
  global $web;
  $city_err_file = $GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/city_err_journal.txt';
  if ($f = file_get_contents($city_err_file)) {
    if (preg_match("/".preg_quote($city, "/")."[\n\r]+/", $f)) {
      return false;
    }
  }
  if ($fp = @fopen($city_err_file, 'ab')) {
    @fwrite($fp, "".$city."\n");
    @fclose($fp);
  }
}

function get_w_img($img) {
  global $web;
  $img = preg_replace('/\?.*$/', '', $img);
  $img_ = basename($img);
  $img_file = 'readonly/weather/'.$web['weather_from'].'/img/'.$img_.'';
  if (file_exists($GLOBALS['WEATHER_DATA'].$img_file)) {
    return $img_file;
  } else {
    if ($img_file_ = read_file($img)) {
      write_file($GLOBALS['WEATHER_DATA'].$img_file, $img_file_);
    } else {
      return $img;
    }
  }
  return $img_file;
}


if (isset($_GET['type']) && $_GET['type'] == 2) :

$t = '2';
//得到天气 完善的
function getWEATHER($city) {
  global $tmp;
  $weatherurl = 'http://php.weather.sina.com.cn/search.php?c=1&city='.$city.'&dpc=1';
  if ($W_FR = read_file($weatherurl)) {
    preg_match('/<\!--\s*右侧主内容\s*begin\s*-->(.*)<\!--\s*右侧主内容\s*end\s*-->/isU', $W_FR, $matches);
    unset($W_FR);
    if (!empty($matches[1])) {
      $matches[1] = preg_replace('/<ul\s+class="list_01">.*<\/script>/isU', '</div></div>', $matches[1]);
	  $weather = $matches[1];
    }
    unset($matches);
  }
  if (!empty($weather)) {
    $GLOBALS['WEATHER_BORN'] = 1;
    write_file($tmp, $weather);
  } else {
    @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @unlink($tmp);
	$GLOBALS['WEATHER_BORN'] = 0;
    $weather .= '<span style="background-color:#FFFFFF;">天气预报获取失败！请稍候再试。<br />
可能采集源：新浪天气出错[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]</span>';
  }
  return $weather;
}

else :

$t = '';
//得到天气 简单的
function getWEATHER($city) {
  global $tmp;
  $weatherurl = 'http://php.weather.sina.com.cn/search.php?c=1&city='.$city.'&dpc=1';
  $weather = '';
  if ($W_FR = read_file($weatherurl)) {
    $weather .= '
<span class="weather">
  <span id="city_where" onmouseover="ct=window.setInterval(function(){showWD($(\'city_where\'), \'weather.php?area=china\', \'720px\', \'auto\');}, 100);" onmouseout="window.clearInterval(ct);">
    <a href="weather.php?area=china" id="weather_where" title="切换城市"><img src="readonly/images/po.png" /></a>
    <a href="weather.php" id="weather_city">'.$city.'</a>
  </span>
  <a href="weather.php" id="weather_show">
';

    if (preg_match('/<\/span>实时空气质量<\/h4>[\s\n\r]*<table class="tb_air">.+<p>([^<>]*)<\/p>/isU', $W_FR, $matches_kq)) {
      if ($matches_kq[1]) {
        switch ($matches_kq[1]) {
          case '严重污染':
          $w_kq = 'w_kq_yzwr';
          break;
          case '重度污染':
          $w_kq = 'w_kq_yzwr';
          break;
          case '中度污染':
          $w_kq = 'w_kq_zdwr';
          break;
          case (strstr($matches_kq[1], '污染') == true):
          $w_kq = 'w_kq_qdwr';
          break;
          case '优':
          $w_kq = 'w_kq_you';
          break;
          case '良':
          $w_kq = 'w_kq_liang';
          break;
          default :
          $w_kq = 'w_kq';
          break;
        }
        $weather .= ' <span id="w_kq">'.(strstr($matches_kq[1], '污染') ? '' : '空气').'<b class="'.$w_kq.'">'.$matches_kq[1].'</b></span>';
      }
    }
    if (preg_match('/<h5>今天白天<\/h5>[\s\r\n]*<div title=\'([^\'\"\>]+)\' [^\>]+url\(([^\)]*)\).*<span class="fs_30 tpte">([\-\d]+℃)<\/span>.*<h5>今天夜间<\/h5>[\s\r\n]*<div title=\'([^\'\"\>]+)\' [^\>]+url\(([^\)]*)\).*<span class="fs_30 tpte">([\-\d]+℃)<\/span>/isU', $W_FR, $matches)) {
      $weather .= '';
	  $weather .= $today = '<span id="w_today" title="白天"><span class="w_img"><img src="'.get_w_img($matches[2]).'" style="width:34px;height:34px;" /></span><span class="w_qingkuang">'.$matches[1].'</span><span class="w_wendu'.(floatval($matches[3])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches[3].'</span>';
      $weather .= '</span>';

      $weather .= ' ～';
	  $weather .= $night = '<span id="w_moday" title="夜间"><span class="w_img"><img src="'.get_w_img($matches[5]).'" style="width:34px;height:34px;" /></span><span class="w_qingkuang">'.$matches[4].'</span><span class="w_wendu'.(floatval($matches[6])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches[6].'</span>';
      $weather .= '</span>';
      $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
      $weather .= '</a>
</span>';
      unset($matches, $matches_kq);
	  $GLOBALS['WEATHER_BORN'] = 1;
      write_file($tmp, $weather);
	} else {
      if (preg_match('/<h5>今天白天<\/h5>(.*)<h5>今天夜间<\/h5>(.*<\/ul>)/isU', $W_FR, $matches)) {
        $weather .= '<span id="w_today">'.trim(strip_tags($matches[1])).' ';
	    $weather .= '夜间 '.trim(strip_tags($matches[2])).'</span>';
        $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
        $weather .= '</a>
</span>';
        unset($matches);
	    $GLOBALS['WEATHER_BORN'] = 1;
        write_file($tmp, $weather);
      } else {
        @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
        @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
        @unlink($tmp);
  	    $GLOBALS['WEATHER_BORN'] = 0;
        $weather .= '天气预报获取失败！</a>[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]</span>';
      }
	}
    unset($W_FR);
  }
  return $weather;
}

endif;


//得到城市
function getCITY($str) {
  if (!empty($str)) {
    $str = preg_replace('/^.*(新疆|广西|内蒙古|宁夏|西藏)(.*自治区)?/', '', $str);
    $str = preg_replace('/^.*(台湾|广东|江苏|浙江|山东|福建|辽宁|黑龙江|河北|湖北|湖南|安徽|吉林|海南|四川|陕西|山西|河南|云南|甘肃|江西|青海|贵州)(省)?/', '', $str);
    //县
    $str = preg_replace('/^(.*市)?(.+)县.*$/', '$2', $str);
    $str = preg_replace('/^(蓟|开|忠|黟|歙|芜湖|萧|泗|和|泾|寿|沙|宁|环|漳|岷|文|康|成|徽|礼|梅|横|容|藤|盘|赵|承德|唐|易|蠡|雄|滦|涉|魏|磁|邱|任|威|蔚|青|献|景|嵩|杞|郏|叶|温|淇|浚|辉|滑|范|息|新|睢|宾|房|郧|南|攸|衡阳|邵阳|澧|道|通化|丰|沛|上饶|义|本溪|辽阳|莒|陵|费|冠|莘|曹|单|大同|盂|沁|应|祁|代|吉|蒲|古|隰|临|岚|兴|绛|夏|户|富|陇|眉|凤|勉|洋|华|佳|彬|乾|郫|安|荣|珙|高|宜宾|渠|理|茂|泸|索|伊宁|云)$/', '$1县', $str);
    //镇
    $str = preg_replace('/^.*(固|清|景德|北|丰|天)镇.*$/', '$1镇', $str);
    //盟
    $str = preg_replace('/^(.*市)?(.+)盟.*$/', '$2', $str);
    $str = preg_replace('/^(阿拉善|兴安|锡林郭勒|西)$/', '$1盟', $str);
    //旗
    $str = preg_replace('/^(.*市)?(.+)旗.*$/', '$2旗', $str);
    //市
    $str = preg_replace('/^(.*市)?(.+)市.*$/', '$2', $str);
    $str = preg_replace('/^(伊宁)$/', '$1市', $str);

  }
  $city = (!empty($str) && !strstr($str,'本机地址') && !strstr($str,'局域网') && !strstr($str,'IANA保留地址')) ? $str : '北京';
  //@ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  //@ setcookie('weathercity', $city, time() + 365 * 24 * 60 * 60, '/'); //+8*3600
  //unset($str);
  return $city;
}


if ($_GET['city']) {
  if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
    if (preg_match('/\''.preg_quote($_GET['city'], '/').'\'/', $city_arr_file, $m)) {
      @ setcookie('weathercity', $_GET['city'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
      $city = $_GET['city'];
      unset($m);
    }
  }
}
if (empty($city)) {
  if ($_COOKIE['weathercity']) {
    $city = $_COOKIE['weathercity'];
  } else {
    require($GLOBALS['WEATHER_DATA'].'readonly/weather/getip.php');
    $myobj = new ipLocation();
    $ip = $myobj->getIP();
    $address = $myobj->getaddress($ip);
    $myobj = NULL;
    $city_tmp = getCITY($address["area1"]);
    if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
      if (preg_match('/\''.preg_quote($city_tmp, '/').'\'/', $city_arr_file, $m)) {
        @ setcookie('weathercity', $city_tmp, time() + 365 * 24 * 60 * 60, '/'); //+8*3600
        $city = $city_tmp;
        unset($m);
      } else {
        city_err_journal($city_tmp);
      }
    }
  }
}
if (empty($city)) {
  $city = '北京';
}



$weather = '';
$tmp = $GLOBALS['WEATHER_DATA'].'writable/__temp__/weather/'.$web['weather_from'].'/'.urlencode($city).''.$t.'.txt';
$time = time();
$filemtime = @file_exists($tmp) ? @filemtime($tmp) : 0;
/*
$time = time();
$pass = date('G') * 3600 + date('i') * 60 + date('s');
$time_0000 = $time - $pass;
$step_1710 = 17 * 3600 + 30 * 60;
$step_0810 = 8 * 3600 + 20 * 60;

if ($pass >= $step_1710) {
  if ($filemtime != 0 && $filemtime >= $time_0000 + $step_1710) {
    $weather = @file_get_contents($tmp);
  }
  //缓存到第二天08:10
  $diff_s = $step_0810 - $pass + 86400;
} else {
  if ($pass >= $step_0810) {
    if ($filemtime != 0 && $filemtime >= $time_0000 + $step_0810) {
      $weather = @file_get_contents($tmp);
    }
    //缓存到17:10 新浪17:00更新一次
    $diff_s = $step_1710 - $pass;
  } else {
    if ($filemtime != 0 && $filemtime >= $time_0000 + $step_1710 - 86400) {
      $weather = @file_get_contents($tmp);
    }
    //缓存到08:10 新浪8:00更新一次
    $diff_s = $step_0810 - $pass;
  }
}
*/

$step = (isset($web['weather_step']) && is_numeric($web['weather_step']) && $web['weather_step'] > 0) ? $web['weather_step'] * 3600 : 7200; //缓存2小时

//有效期截止时刻
$ekey = $filemtime - (gmdate('i', $filemtime + floatval($web['time_pos']) * 3600) * 60 + gmdate('s', $filemtime + floatval($web['time_pos']) * 3600)) + $step;
//下一个有效期截止时刻
$next = $time - (gmdate('i', $time + floatval($web['time_pos']) * 3600) * 60 + gmdate('s', $time + floatval($web['time_pos']) * 3600)) + $step;


if ($time >= $ekey) {
  $weather = getWEATHER($city);
  if ($GLOBALS['WEATHER_BORN'] == 1) {
    header("Cache-Control: max-age = ".($next - $time)."");
    $expires = gmdate("D, d M Y H:i:s", $next + floatval($web['time_pos']) * 3600).' GMT';
    header('Expires: '.$expires.'');
  }
} else {
  header("Cache-Control: max-age = ".($ekey - $time)."");
  $expires = gmdate("D, d M Y H:i:s", $ekey + floatval($web['time_pos']) * 3600).' GMT';
  header('Expires: '.$expires.'');
  //include($tmp);
  $weather = @file_get_contents($tmp);
}

//ob_end_flush();

/*
  echo $weather;
*/
if (isset($_GET['char']) && $_GET['char'] == 'utf-8') {
  if (function_exists('iconv')) {
    @ header("content-type: text/html; charset=utf-8");
    echo iconv("gbk", "utf-8", $weather);
  } else {
    echo $weather;
  }
} else {
  echo $weather;
}
//echo eval('return '.$w.';');




















?>