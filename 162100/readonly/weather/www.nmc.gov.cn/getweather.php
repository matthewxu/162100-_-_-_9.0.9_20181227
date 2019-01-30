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
  $img_ = basename(dirname($img)).'_'.basename($img);
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
  $city_ = @explode('|', $city2);
  $weatherurl = 'http://www.nmc.gov.cn/publish/forecast/'.$city_[1].'/'.$city_[0].'.html';
  if ($W_FR = read_file($weatherurl)) {
    preg_match('/(<div class="btitle">[\s\n\r]*七天天气预报.+\<\!\-\- 逐3小时天气 \-\-\>[\s\n\r]*<\/div>)[\s\n\r]*<ul class="tabchar" id="tabchar">/isU', $W_FR, $matches);
    unset($W_FR);
    if (!empty($matches[1])) {
	  $weather = $matches[1];
    }
    unset($matches);
  }
  if (!empty($weather)) {
    $weather = '<div id="city162100"><b>'.$city.'</b></div>'.$weather;
    $GLOBALS['WEATHER_BORN'] = 1;
    write_file($tmp, $weather);
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
  $city_ = @explode('|', $city2);
  $weatherurl = 'http://www.nmc.gov.cn/publish/forecast/'.$city_[1].'/'.$city_[0].'.html';
  $weather = '';
  if ($W_FR = read_file($weatherurl)) {
    $weather .= '
<span class="weather">
  <span id="city_where" onmouseover="ct=window.setInterval(function(){showWD($(\'city_where\'), \'weather.php?area=china\', \'660px\', \'auto\');}, 100);" onmouseout="window.clearInterval(ct);">
    <!--a href="weather.php?area=china" id="weather_where"><img src="readonly/images/po.png" /></a-->
    <a href="weather.php" id="weather_city" title="切换城市">'.$city.'</a>
  </span>
  <a href="weather.php" id="weather_show">
';

    if (preg_match('/<div\s+class="today"\s+style="display:block;">(.+)<\/div>/isU', $W_FR, $matches_kq)) {
      preg_match_all('/<td[^>]*><img [^>]*src="(.+)"[^>]*><\/td>/isU', $matches_kq[1], $matches1);
      preg_match_all('/<td[^>]* class="wdesc">(.+)<\/td>/isU', $matches_kq[1], $matches2);
      preg_match_all('/<td[^>]* class="temp">(.+)<\/td>/isU', $matches_kq[1], $matches3);
      if (count($matches1[1]) == 2) {
	    $weather .= $today = '<span id="w_today" title="白天" onmouseover="sSD(this,event);"><span class="w_img"><img src="'.get_w_img($matches1[1][0]).'" style="width:34px !important; height:27px !important;" /></span><span class="w_qingkuang">'.$matches2[1][0].'</span><span class="w_wendu'.(floatval($matches3[1][0])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches3[1][0].'</span>';
        $weather .= '</span>';
        $weather .= ' ～ ';
	    $weather .= $night = '<span id="w_moday" title="夜间" onmouseover="sSD(this,event);"><span class="w_img"><img src="'.get_w_img($matches1[1][1]).'" style="width:34px !important; height:27px !important;" /></span><span class="w_qingkuang">'.$matches2[1][1].'</span><span class="w_wendu'.(floatval($matches3[1][1])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches3[1][1].'</span>';
        $weather .= '</span>';
        $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
        $weather .= '</a>
</span>';
	    $GLOBALS['WEATHER_BORN'] = 1;
        write_file($tmp, $weather);

      } elseif (count($matches1[1]) == 1) {
	    $weather .= $night = '<span id="w_today" title="夜间" onmouseover="sSD(this,event);"><span class="w_img"><img src="'.get_w_img($matches1[1][0]).'" style="width:34px !important; height:27px !important;" /></span>夜晚:<span class="w_qingkuang">'.$matches2[1][0].'</span><span class="w_wendu'.(floatval($matches3[1][0])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches3[1][0].'</span>';
        $weather .= '</span>';
        if (preg_match('/<div class="day">[\s\n\r]*<div class="date">[\s\n\r]*[\s\n\r]*明\s*天[\s\n\r]*<\/div>[\s\n\r]*<div class="week">.*<\/div>[\s\n\r]*<div class="wicon">[\s\n\r]*<img [^>]*src="(.+)"[^>]*>[\s\n\r]*<\/div>[\s\n\r]*<div class="wdesc">(.+)<\/div>[\s\n\r]*<div class="temp">(.+)<\/div>/isU', $W_FR, $matches_kq2)) {
          $weather .= ' &nbsp; ';
	      $weather .= $moday = '<span id="w_moday" title="明天" onmouseover="sSD(this,event);"><span class="w_img"><img src="'.get_w_img($matches_kq2[1]).'" style="width:34px !important; height:27px !important;" /></span>明天:<span class="w_qingkuang">'.$matches_kq2[2].'</span><span class="w_wendu'.(floatval($matches_kq2[3])>0 ? ' w_wendu_ls':' w_wendu_lx').'">'.$matches_kq2[3].'</span>';
          $weather .= '</span>';
        }
        $weather .= '<!--span class="w_xiangqing" title="未来详情">︾</span-->';
        $weather .= '</a>
</span>';
	    $GLOBALS['WEATHER_BORN'] = 1;
        write_file($tmp, $weather);


      } else {
  	    $GLOBALS['WEATHER_BORN'] = 0;
        @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
        @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
        @unlink($tmp);
        $weather .= '天气预报获取失败！</a>[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]</span>';
      }
      unset($matches1, $matches2, $matches3, $matches_kq);
    } else {
  	  $GLOBALS['WEATHER_BORN'] = 0;
      @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
      @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
      @unlink($tmp);
      $weather .= '天气预报获取失败！</a>[<a href="weather.php?err='.urlencode($weatherurl).'" target="_blank" style="color:blue;">去解决</a>]</span>';
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
    //镇
    $str = preg_replace('/^.*(固|清|景德|北|丰|天)镇.*$/', '$1镇', $str);
    //区
    $str = preg_replace('/^.*(滨海新|黄山风景|黄山)区.*$/', '$1区', $str);
    //县
    $str = preg_replace('/^(.*市)?(.+)县.*$/', '$2', $str);
    $str = preg_replace('/^(蓟|开|忠|和|歙|黟|寿|萧|泗|芜湖|泾|沙|环|宁|漳|岷|成|徽|康|礼|文|梅|藤|容|横|遵义|盘|赵|唐|雄|易|蠡|青|献|磁|邱|涉|魏|景|滦|任|威|蔚|承德|中牟|滑|内黄|汤阴|浚|淇|博爱|温|武陟|修武|杞|洛宁|孟津|汝阳|新安|伊川|宜阳|嵩|栾川|叶|郏|睢|长垣|封丘|获嘉|延津|原阳|息|新|郸城|扶沟|淮阳|鹿邑|商水|沈丘|太康|西华|泌阳|平舆|确山|汝南|上蔡|遂平|西平|新蔡|正阳|临颍|舞阳|濮阳|范|南乐|清丰|台前|宾|房|郧|澧|南|道|攸|衡阳|邵阳|通化|丰|沛|上饶|义|本溪|辽阳|陵|曹|单|冠|莘|费|莒|沁|古|吉|蒲|隰|临|兴|岚|应|代|盂|夏|绛|大同|祁|户|凤|陇|眉|勉|洋|华|彬|乾|富|佳|郫|理|茂|渠|安|高|珙|荣|泸|宜宾|索|河口|云)$/', '$1县', $str);
    //盟
    $str = preg_replace('/^(.*市)?(.+)盟.*$/', '$2', $str);
    $str = preg_replace('/^(阿拉善|兴安|锡林郭勒|西)$/', '$1盟', $str);
    //旗
    $str = preg_replace('/^(.*市)?(.+)旗.*$/', '$2旗', $str);
    //市
    $str = preg_replace('/^(.*市)?(.+)市.*$/', '$2', $str);
    $str = preg_replace('/^(黄山|登封|巩义|新密|新郑|荥阳|安阳|林州|焦作|孟州|沁阳|开封|洛阳|偃师|南阳|新乡|辉县|卫辉|信阳|项城|驻马店|漯河|衡阳|邵阳)$/', '$1市', $str);

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
    if (preg_match('/\''.preg_quote($city, '/').'\|([\w\-]+\|[A-Z]+)\'/', $city_arr_file, $m)) {
      @ setcookie('weathercity2', $m[1], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
      return $m[1];
    }
  }
  return '';
}



if ($_GET['city']) {
  if ($city_arr_file = file_get_contents($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather_seek.php')) {
    if (preg_match('/\''.preg_quote($_GET['city'], '/').'\|([\w\-]+\|[A-Z]+)\'/', $city_arr_file, $m)) {
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
      if (preg_match('/\''.preg_quote($city_tmp, '/').'\|([\w\-]+\|[A-Z]+)\'/', $city_arr_file, $m)) {
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
  $city2 = 'bei-jing|ABJ';
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
  $weather = getWEATHER($city, $city2);
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

echo $weather;





















?>