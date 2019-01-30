<?php
@ ob_start();
@ require ('writable/set/set.php');
@ require ('readonly/weather/getweather_step.php');

header('Cache-Control:no-cache,must-revalidate');  
header('Pragma:no-cache');

$system_weather_from = $web['weather_from'];
$web['weather_from'] = (!empty($_COOKIE['weatherfrom']) && is_dir('readonly/weather/'.$_COOKIE['weatherfrom'])) ? $_COOKIE['weatherfrom'] : $web['weather_from'];

if (!empty($_GET['err'])) {
  header("content-type: text/html; charset=gb2312");
  echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>解决天气预报错误</title>
<style>
body { text-align:center; }
form { margin:0; }
#err { background-color:#FFFFFF; width:600px; margin:auto; text-align:left; }
</style>
<script>
function setCookie(name,value,time){
  var timePos = 8;
  var cookieEnabled=(typeof navigator.cookieEnabled!="undefined" && navigator.cookieEnabled)?true:false;
  if(cookieEnabled == false){
    alert("您的浏览器未开通cookie，程序无法正常使用！");
    return false;
  }
  if(!time||isNaN(time))time=365; //此 cookie 将被保存 365 天
  var cookieStr=encodeURIComponent(value);
  var expireStr=" expires="+(new Date(new Date().getTime()+(time*24*60*60+timePos*3600)*1000).toGMTString())+";";
  document.cookie=name+"="+cookieStr+";"+expireStr+" path=/;";
}
</script>
</head>
<body>
<p>天气预报出错啦！</p>
<iframe id="reloadcity" src="PseudoXMLHTTP.php?xml_id=weather&xml_file='.get_en_url('readonly/weather/getweather.php').'&char=utf-8" style="display:none;"></iframe>
<ul id="err">
  <li>去源天气站看一下是不是出问题了哟：<a href="'.$_GET['err'].'" target="_blank" style="color:blue;">去检测</a></li>
  <li>';
?>
<form id="wform" action="weather.php" method="post" target="_self">
<input id="weather_fr" name="weather_fr" type="hidden">

<div style="position:relative;">
            <div style="cursor:pointer"> [ <a href="javascript:void(0)" id="optionName" onclick="document.getElementById('optionMenu').style.display=''; return false;">切换天气频道</a><span class="mainmore" onmouseover="document.getElementById('optionMenu').style.display='';">&raquo;</span> ] （应该可以解决）</div>
            <ul id="optionMenu" onmouseover="this.style.display='';" onmouseout="this.style.display='none';" style="position:absolute; top:20px; left:0; z-index:99; padding:5px 10px; background-color:#FFFFFF; border:1px #D8D8D8 solid; display:none;">
<?php
if ($w_f = @glob('readonly/weather/*', GLOB_ONLYDIR)) {
  foreach($w_f as $w_type) {
    $w_type = basename($w_type);
    $w_set = $system_weather_from==$w_type ? '（系统默认）':'';
    if ($web['weather_from'] == $w_type) {
      echo '
<li><span>当前天气源：'.$w_type.''.$w_set.'</span></li>';
    } else {
      echo '
<li><a href="javascript:void(0)" onclick="document.getElementById(\'weather_fr\').value=\''.$w_type.'\'; document.getElementById(\'wform\').submit(); return false;">切换到：'.$w_type.''.$w_set.'</a></li>';
    }
    unset($w_type, $wfr_title);
  }
}
unset($w_f, $w_type);
?>
            </ul>
          </div>
</form>


<?php
  echo '</li>
  <li><a href="javascript:void(0)" onclick="setCookie(\'weathercity\',\'\',-366);setCookie(\'weathercity2\',\'\',-366);setCookie(\'weatherfrom\',\'\',-366);document.getElementById(\'reloadcity\').contentWindow.location.reload(true);alert(\'清除成功。请重启浏览器并刷新首页观察\');return false;" style="color:blue;">清除Cookie</a></li>
</ul>
</body>
</html>
';
  die;
}

$NOWCITY = $_COOKIE['weathercity'];

if (!empty($_POST['weather_fr']) && is_dir('readonly/weather/'.$_POST['weather_fr'])) {
  $_COOKIE['weatherfrom'] = '';
  @ setcookie('weatherfrom', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  $_COOKIE['weathercity2'] = '';
  @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  if ($_POST['weather_fr'] != $web['weather_from']) {
    $_COOKIE['weatherfrom'] = $_POST['weather_fr'];
    @ setcookie('weatherfrom', $_COOKIE['weatherfrom'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
    if (isset($_COOKIE['weathercity']) && !empty($_COOKIE['weathercity'])) {
      preg_match('/header\(.+charset\=([\w\-]+)/i', @file_get_contents('readonly/weather/'.$_COOKIE['weatherfrom'].'/weather.php'), $m);
      $cha_to = !empty($m[1]) ? $m[1] : '';
      unset($m);
      if (function_exists('mb_detect_encoding')) {
        $cha = @mb_detect_encoding($_COOKIE['weathercity'], array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
      } else {
        preg_match('/header\(.+charset\=([\w\-]+)/i', @file_get_contents('readonly/weather/'.$web['weather_from'].'/weather.php'), $m);
        $cha = !empty($m[1]) ? $m[1] : '';
        unset($m);
      }
      if ($cha != $cha_to) {
        if (function_exists('iconv')) {
          $_COOKIE['weathercity'] = @iconv($cha, $cha_to, $_COOKIE['weathercity']);
          if (preg_match('/\''.preg_quote($_COOKIE['weathercity'], '/').'(\||\')/', @file_get_contents('readonly/weather/'.$_COOKIE['weatherfrom'].'/getweather_seek.php'), $m)) {
            @ setcookie('weathercity', $_COOKIE['weathercity'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
            unset($m);
          } else {
            $_COOKIE['weathercity'] = '';
            @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
          }
        } else {
          $_COOKIE['weathercity'] = '';
          @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
        }
      }
    }
    $web['weather_from'] = $_POST['weather_fr'];
    $NOWCITY_ = 1;
  }
  //header('Location: weather.php');
  //die;
}

require ('readonly/weather/'.$web['weather_from'].'/weather.php');

@ ob_end_flush();
?>