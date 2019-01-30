<?php
require ('authentication_member.php');
?>
<?php
//栏目分类设置

if (POWER == 0) {
  err('请登陆或注册帐号！先');
}


  if (empty($_POST['weather_fr']) || !is_dir('readonly/weather/'.$_POST['weather_fr'].'')) {
    err('天气采集源参数错！');
  }
  $to = '';
  @ require ('readonly/weather/getweather_step.php');
  $web['weather_from'] = (!empty($_COOKIE['weatherfrom']) && is_dir('readonly/weather/'.$_COOKIE['weatherfrom'])) ? $_COOKIE['weatherfrom'] : $web['weather_from'];
  $_COOKIE['weatherfrom'] = '';
  @ setcookie('weatherfrom', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  $_COOKIE['weathercity2'] = '';
  @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  if ($_POST['weather_fr'] != $web['weather_from']) {
    $_COOKIE['weatherfrom'] = $_POST['weather_fr'];
    @ setcookie('weatherfrom', $_POST['weather_fr'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
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
  }
  $to = '
<script type="text/javascript" language="javaScript">
  if (parent.document.getElementById("sendWeather") != null) {
    var reloadIfr = \'parent.document.getElementById("sendWeather")\';
  } else {
    document.write(\'<iframe id="reloadcity" src="PseudoXMLHTTP.php?xml_id=weather&xml_file='.get_en_url('readonly/weather/getweather.php').'&char=utf-8" style="display:none;"></iframe>\');
    var reloadIfr = \'document.getElementById("reloadcity")\';
  }
  function relaodCity(o, wfr_v) {
    var rIfr = eval(reloadIfr);
    if (rIfr != null) {
      rIfr.contentWindow.location.reload(true);
    }
  }
  if (document.all) {
    window.attachEvent("onload", relaodCity);
  } else {
    window.addEventListener("load", relaodCity, false);
  }
</script>
';

  alert('设置成功！'.$to.'', !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'member.php?get=weather');



?>