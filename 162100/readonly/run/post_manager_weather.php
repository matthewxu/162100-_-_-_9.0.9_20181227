<?php
require ('authentication_manager.php');
?>
<?php


if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

if ($_POST['act'] == 'del') {
  if (is_array($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
      list($wfr, $txt) = @explode('/', $id);
      if (file_exists('writable/__temp__/weather/'.$wfr.'/'.$txt.'.txt')) @unlink('writable/__temp__/weather/'.$wfr.'/'.$txt.'.txt');
      if (file_exists('writable/__temp__/weather/'.$wfr.'/'.$txt.'2.txt')) @unlink('writable/__temp__/weather/'.$wfr.'/'.$txt.'2.txt');
    }
  } else {
    err('没有选中项！');
  }
  alert('删除成功！', 'readonly/run/get_manager_access.php?weather_fr='.$wfr.'');

} elseif ($_POST['act'] == 'set') {
  if (empty($_POST['weather_fr']) || !is_dir('readonly/weather/'.$_POST['weather_fr'].'')) {
    err('天气采集源参数错！');
  }
  $to = '';
  @ require ('readonly/weather/getweather_step.php');
  $web['weather_from'] = (!empty($_COOKIE['weatherfrom']) && is_dir('readonly/weather/'.$_COOKIE['weatherfrom'])) ? $_COOKIE['weatherfrom'] : $web['weather_from'];
  $_COOKIE['weatherfrom'] = '';
  @ setcookie('weatherfrom', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  echo '<script> setCookie(\'weatherfrom\',\'\',-366); </script>';
  $_COOKIE['weathercity2'] = '';
  @ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
  echo '<script> setCookie(\'weathercity2\',\'\',-366); </script>';
  if ($_POST['weather_fr'] != $web['weather_from']) {
    $_COOKIE['weatherfrom'] = $_POST['weather_fr'];
    @ setcookie('weatherfrom', $_POST['weather_fr'], time() + 365 * 24 * 60 * 60, '/'); //+8*3600
    echo '<script> setCookie(\'weatherfrom\',\''.$_POST['weather_fr'].'\',365); </script>';
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
            echo '<script> setCookie(\'weathercity\',\''.$_COOKIE['weathercity'].'\',365); </script>';
            unset($m);
          } else {
            $_COOKIE['weathercity'] = '';
            @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
            echo '<script> setCookie(\'weathercity\',\'\',-366); </script>';
          }
        } else {
          $_COOKIE['weathercity'] = '';
          @ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
          echo '<script> setCookie(\'weathercity\',\'\',-366); </script>';
        }
      }
    }
  }
  $to = '
<iframe id="reloadcity" src="PseudoXMLHTTP.php?xml_id=weather&xml_file='.get_en_url('readonly/weather/getweather.php').'&char=utf-8" style="display:none;"></iframe>
<script type="text/javascript" language="javaScript">
function relaodCity() {
  document.getElementById("reloadcity").contentWindow.location.reload(true);
}
if (document.all) {
	window.attachEvent("onload", relaodCity);
} else {
	window.addEventListener("load", relaodCity, false);
}
</script>';

  $text = '<?php
$web[\'weather_step\'] = \''.((isset($_POST['weather_step'])&&is_numeric($_POST['weather_step'])&&$_POST['weather_step']>0)?$_POST['weather_step']:2).'\';
$web[\'weather_from\'] = \''.$_POST['weather_fr'].'\';
?>';
  require ('readonly/function/write_file.php');
  write_file('readonly/weather/getweather_step.php', $text);
  alert('设置成功！'.$to.'', '?get=weather');
} else {
  err('命令错误');
}



?>