<?php
@ ini_set('display_errors', false);

@ header("content-type: text/html; charset=utf-8");


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
function getWEATHER($city, $city2) {
  global $tmp;
  $weatherurl = 'http://weather.sina.com.cn/'.$city2.'';
  $body_bj = '';
  if ($W_FR = read_file($weatherurl)) {
    if (preg_match('/<body [^>]*class\s*=\s*"(\w+)"/i', $W_FR, $matches)) {
      $body_bj = '<script> document.body.className="'.$matches[1].'"; </script>';
      unset($matches);
    }
    preg_match('/(<div class="wrap">.+)<script type="text\/javascript" src="http\:\/\/www\.sinaimg\.cn\/unipro\/pub\/suda_m_v629\.js"><\/script>/isU', $W_FR, $matches);
    unset($W_FR);
    if (!empty($matches[1])) {
      $matches[1] = preg_replace('/<span class="slider_add" id="slider_add" style="display\: none;">\+<\/span>/isU', '', $matches[1]);
      $matches[1] = preg_replace('/<div id="slider_dc_container">.+<span id="dcbr"><\/span>[\n\r\s]*<\/div>[\n\r\s]*<\/div>/isU', '', $matches[1]);
      $matches[1] = preg_replace('/<\!-- footer -->.+<\!-- end footer -->/isU', '</div>', $matches[1]);
      $matches[1] = preg_replace('/\/\/[\n\r\s]*设定默认城市.+<\/script>/isU', '</script>', $matches[1]);
      $weather = preg_replace('/<\!\-\-.+\-\->/isU', '', $matches[1]);
    }
    unset($matches);
  }

  if (!empty($weather)) {
    $GLOBALS['WEATHER_BORN'] = 1;
    write_file($tmp, $body_bj.$weather);
  } else {
    @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @unlink($tmp);
	$GLOBALS['WEATHER_BORN'] = 0;
    $weather .= '<span style="background-color:#FFFFFF;">天气预报获取失败！请稍候再试。<br />
可能采集源：中央气象台出错[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]</span>';
  }
  return $weather;
}

else :

$t = '';
//得到天气 简单的
function getWEATHER($city, $city2) {
  global $tmp;
  $weatherurl = 'http://weather.sina.com.cn/'.$city2.'';
  $weather = '';
  if ($W_FR = read_file($weatherurl)) {
    $weather .= '
<style>
#w_today, #w_moday { vertical-align: middle; display:inline-block; *display:inline; *zoom:1; }
</style>
<span class="weather">
  <span id="city_where" onmouseover="ct=window.setInterval(function(){showWD($(\'city_where\'), \'weather.php?area=china\', \'540px\', \'auto\');}, 100);" onmouseout="window.clearInterval(ct);">
    <a href="weather.php?area=china" id="weather_where" title="切换城市"><img src="readonly/images/po.png" /></a>
    <a href="weather.php" id="weather_city">'.$city.'</a>
  </span>
  <a href="weather.php" id="weather_show">
';

    //if (preg_match('/<p class="slider_whicon_w"><img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)"[^\>]*><\/p>[\s\n\r]*<div class="slider_degree">([\-\d]+(&#8451;|℃)).+<div class="slider_warn">(.*)id="slider_arr_l"/isU', $W_FR, $matches_kq)) {
    if (preg_match('/<p class="slider_whicon_w"><img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)"[^\>]*><\/p>[\s\n\r]*<div class="slider_degree">([^\<]*)<\/div>.+<div class="slider_warn">(.*)id="slider_arr_l"/isU', $W_FR, $matches_kq)) {
	  $weather .= '<span id="w_today" title="当前"><span class="w_img"><img src="'.get_w_img(preg_replace('/icons_\d+_wt/i', 'icons_42_yl', $matches_kq[1])).'" style="width:34px;height:34px;" /></span></span><span id="w_today" title="当前"><span class="w_qingkuang">'.$matches_kq[2].'</span><br /><span class="w_wendu'.(floatval($matches_kq[3])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches_kq[3].'</span></span>';
      $matches_kq[4] = preg_replace('/污染指数\d*/', '', preg_replace('/[\n\r\s]+/', '', strip_tags($matches_kq[4])));
      if ($matches_kq[4]) {
        switch ($matches_kq[4]) {
          case '严重污染':
          $w_kq = '<b class="w_kq_yzwr">严重<br />污染</b>';
          break;
          case '重度污染':
          $w_kq = '<b class="w_kq_yzwr">重度<br />污染</b>';
          break;
          case '中度污染':
          $w_kq = '<b class="w_kq_zdwr">中度<br />污染</b>';
          break;
          case (strstr($matches_kq[4], '污染') == true):
          $w_kq = '<b class="w_kq_qdwr">轻度<br />污染</b>';
          break;
          case '优':
          $w_kq = '空气<br /><b class="w_kq_you">优</b>';
          break;
          case '良':
          $w_kq = '空气<br /><b class="w_kq_liang">良</b>';
          break;
          default :
          $w_kq = '<b class="w_kq">'.$matches_kq[4].'</b>';
          break;
        }
        $weather .= ' <span id="w_kq">'.$w_kq.'</span>';
      }
      unset($matches_kq);
      $weather .= ' | ';
    }
    $runget = false;
    if (preg_match('/<p class="wt_fc_c0_i_day wt_fc_c0_i_today">(.+)<\/div>/isU', $W_FR, $matches_kq)) {
      if (preg_match('/<img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)".+<img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)".+<p class="wt_fc_c0_i_temp">([^\<\>]+)\/([^\<\>]+)<\/p>/isU', $matches_kq[1], $matches)) {
	    $weather .= '<span id="w_today" title="白天">白天<span class="w_img2"><img src="'.get_w_img($matches[1]).'" style="width:16px;height:16px;" /></span><span class="w_qingkuang">'.$matches[2].'</span><br /><span class="w_wendu'.(floatval($matches[5])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches[5].'</span>';
        $weather .= '</span>';
        $weather .= ' ～ ';
        $weather .= '<span id="w_moday" title="夜间">夜间<span class="w_img2"><img src="'.get_w_img($matches[3]).'" style="width:16px;height:16px;" /></span><span class="w_qingkuang">'.$matches[4].'</span><br /><span class="w_wendu'.(floatval($matches[6])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches[6].'</span>';
        $weather .= '</span>';
        $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
        $weather .= '</a>
</span>';
        $runget = true;
        unset($matches);
      }
    }
    if ($runget == false) {
      preg_match('/<img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)".+<p class="wt_fc_c0_i_temp">([^\/\<\>]+)<\/p>/isU', $matches_kq[1], $matches);
      preg_match('/<p class="wt_fc_c0_i_day wt_fc_c0_i_today">.+<img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)".+<img[^\>]*src="([^\"\>]+)"[^\>]*alt="([^\"\>]+)".+<p class="wt_fc_c0_i_temp">([^\<\>]+)\/([^\<\>]+)<\/p>/isU', $W_FR, $matches2);
      if (is_array($matches) && is_array($matches2)) {
	    $weather .= '<span id="w_moday" title="夜间">夜间<span class="w_img2"><img src="'.get_w_img($matches[1]).'" style="width:16px;height:16px;" /></span><span class="w_qingkuang">'.$matches[2].'</span><br /><span class="w_wendu'.(floatval($matches[3])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches[3].'</span>';
        $weather .= '</span>';
        $weather .= ' ～ ';
        $weather .= '<span id="w_today" title="明天">明天<span class="w_img2"><img src="'.get_w_img($matches2[1]).'" style="width:16px;height:16px;" /></span><span class="w_qingkuang">'.$matches2[2].'</span><br /><span class="w_wendu'.(floatval($matches2[5])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches2[5].'</span>';
        $weather .= '</span>';
        $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
        $weather .= '</a>
</span>';
        unset($matches, $matches2);
      }
    }
    unset($matches_kq);
    unset($W_FR);
  }
  if (!empty($weather)) {
	$GLOBALS['WEATHER_BORN'] = 1;
    write_file($tmp, $weather);
  } else {
  	$GLOBALS['WEATHER_BORN'] = 0;
    @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
    @unlink($tmp);
    $weather .= '天气预报获取失败！请稍候再试</a>。<br />
可能采集源：中央气象台出错[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]
</span>';
  }
  return $weather;
}

endif;


//得到城市
function getCITY($str) {
  if (!empty($str)) {

    $str = preg_replace('/^.*(新疆|广西|内蒙古|宁夏|西藏)(.*自治区)?/', '', $str);
    $str = preg_replace('/^.*(台湾|广东|江苏|浙江|山东|福建|辽宁|黑龙江|河北|湖北|湖南|安徽|吉林|海南|四川|陕西|山西|河南|云南|甘肃|江西|青海|贵州)(省)?/', '', $str);
    //镇
    $str = preg_replace('/^.*(固|清|景德|北|丰|天)镇.*$/', '$1镇', $str);
    //区
    $str = preg_replace('/^.*(黄山|黄山风景|赫山|淮阴|淮安|呼市郊|尖草坪|小店)区.*$/', '$1区', $str);
    //县
    $str = preg_replace('/^(.*市)?(.+)县.*$/', '$2', $str);
    $str = preg_replace('/^(蓟|忠|开|芜湖|和|泗|萧|寿|沙|漳|岷|环|宁|成|文|康|徽|横|藤|遵义|盘|赵|唐|蠡|雄|蔚|承德|滦|青|献|沧|景|威|任|涉|磁|邱|叶|新|嵩|睢|浚|范|宾|郧|房|攸|衡阳|南|邵阳|道|通化|沛|南昌|上饶|吉安|赣|本溪|义|辽阳|建平|托|陵|费|曹|单|莒|冠|莘|大同|祁|沁|隰|蒲|古|绛|夏|应|五台|代|临|兴|岚|户|乾|富|佳|华|勉|洋|眉|陇|耀|郫|荣|安|渠|达|泸|宜宾|高|珙|茂|朗|索|伊宁)$/', '$1县', $str);
    //盟
    $str = preg_replace('/^(.*市)?(.+)盟.*$/', '$2', $str);
    $str = preg_replace('/^(兴安|阿拉善|西)$/', '$1盟', $str);
    //旗
    $str = preg_replace('/^(.*市)?(.+)旗.*$/', '$2旗', $str);
    //市
    $str = preg_replace('/^(.*市)?(.+)市.*$/', '$2', $str);
    $str = preg_replace('/^(沙|津|呼)$/', '$1市', $str);

  }
  $city = (!empty($str) && !strstr($str,'本机地址') && !strstr($str,'局域网') && !strstr($str,'IANA保留地址')) ? $str : '北京';
  //@ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  //@ setcookie('weathercity', $city, time() + 365 * 24 * 60 * 60, '/'); //+8*3600
  //unset($str);
  return $city;
}

function getCITY2($city) {
  global $web;
  @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
    if (preg_match('/\''.preg_quote($city, '/').'\|([\w\-]+)\'/', $city_arr_file, $m)) {
      @ setcookie('weathercity2', $m[1], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
      return $m[1];
    }
  }
  return '';
}


if ($_GET['city']) {
  if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
    if (preg_match('/\''.preg_quote($_GET['city'], '/').'\|([\w\-]+)\'/', $city_arr_file, $m)) {
      @ setcookie('weathercity', $_GET['city'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
      @ setcookie('weathercity2', $m[1], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
      $city = $_GET['city'];
      $city2 = $m[1];
      unset($m);
    }
  }
}
if (empty($city)) {
  if ($_COOKIE['weathercity']) {
    $city = $_COOKIE['weathercity'];
    if (!$city2 = $_COOKIE['weathercity2']) {
      $city2 = getCITY2($city);
    }
  } else {
    require($GLOBALS['WEATHER_DATA'].'readonly/weather/getip.php');
    $myobj = new ipLocation();
    $ip = $myobj->getIP();
    $address = $myobj->getaddress($ip);
    $myobj = NULL;
    $city_tmp = getCITY(iconv("gbk", "utf-8", $address["area1"]));
    //$city_tmp = getCITY($address["area1"]);
    if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
      if (preg_match('/\''.preg_quote($city_tmp, '/').'\|([\w\-]+)\'/', $city_arr_file, $m)) {
        @ setcookie('weathercity', $city_tmp, time() + 365 * 24 * 60 * 60, '/'); //+8*3600
        @ setcookie('weathercity2', $m[1], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
        $city = $city_tmp;
        $city2 = $m[1];
        unset($m);
      } else {
        city_err_journal($city_tmp);
      }
    }
  }
}
if (empty($city)) {
  $city = '北京';
  $city2 = 'beijing';
}


$weather = '';
$tmp = $GLOBALS['WEATHER_DATA'].'writable/__temp__/weather/'.$web['weather_from'].'/'.urlencode($city).''.$t.'.txt';
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
$time = time();

//有效期截止时刻
$ekey = $filemtime - (gmdate('i', $filemtime + floatval($web['time_pos']) * 3600) * 60 + gmdate('s', $filemtime + floatval($web['time_pos']) * 3600)) + $step;
//下一个有效期截止时刻
$next = $time - (gmdate('i', $time + floatval($web['time_pos']) * 3600) * 60 + gmdate('s', $time + floatval($web['time_pos']) * 3600)) + $step;


if ($time >= $ekey) {
  $weather = getWEATHER($city, $city2);
  if ($GLOBALS['WEATHER_BORN'] == 1) {
    //header("Cache-Control: max-age = ".($next - $time)."");
    $expires = gmdate("D, d M Y H:i:s", $next + floatval($web['time_pos']) * 3600).' GMT';
    header('Expires: '.$expires.'');
  }
} else {
  //header("Cache-Control: max-age = ".($ekey - $time)."");
  $expires = gmdate("D, d M Y H:i:s", $ekey + floatval($web['time_pos']) * 3600).' GMT';
  header('Expires: '.$expires.'');
  //include($tmp);
  $weather = @file_get_contents($tmp);
}

//ob_end_flush();



echo $weather;





















?>