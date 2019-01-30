<?php
header("content-type: text/html; charset=gb2312");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>访问记录</title>
<script>
function allChoose(o, v1, v2) {
  var a = document.getElementsByName(o);
    for (var i = 0; i < a.length; i++){
      if (a[i].checked == false) a[i].checked = v1;
      else a[i].checked = v2;
  }
}
</script>
</head>

<body>
<h3>访问记录</h3>
<?php
@ini_set('display_errors', false);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$GLOBALS['WEATHER_DATA'] = '../../';
require (''.$GLOBALS['WEATHER_DATA'].'writable/set/set.php');
require (''.$GLOBALS['WEATHER_DATA'].'writable/set/set_sql.php');
require (''.$GLOBALS['WEATHER_DATA'].'readonly/function/confirm_power.php');

define('POWER', confirm_power($GLOBALS['WEATHER_DATA']));
$wfr = preg_replace('/[^\w\.]+/i', '', $_GET['weather_fr']);

$button_1 = '';
$button_2 = '';
if (POWER == 5) {
  $button_1 = '<div style="background-color:#EEEEEE; font-size:12px;"><a href="javascript:void(0)" onclick="allChoose(\'id[]\',1,1);return false;">全选</a> - <a href="javascript:void(0)" onclick="allChoose(\'id[]\',1,0);return false;">反选</a> - <a href="javascript:void(0)" onclick="allChoose(\'id[]\',0,0);return false;">不选</a>
    <button type="submit">删除记录</button></div>';

}
if(!file_exists(''.$GLOBALS['WEATHER_DATA'].'readonly/weather/ip.dat')){
  die('城市IP数据库文件ip.dat不存在！请联系官方升级安装。</body>
</html>');
}

if(empty($_GET['weather_fr'])){
  die('天气源站参数缺失！</body>
</html>');
}
if(!file_exists(''.$GLOBALS['WEATHER_DATA'].'readonly/weather/'.$wfr.'')){
  die('天气源站参数错误！</body>
</html>');
}

function decode($str) {
    global $wfr;
    preg_match('/header\(.+charset\=([\w\-]+)/i', @file_get_contents(''.$GLOBALS['WEATHER_DATA'].'readonly/weather/'.$wfr.'/weather.php'), $m);
    if ($m[1]) {
      $cha = $m[1];
    } else {
      if (function_exists('mb_detect_encoding')) {
        $cha = @mb_detect_encoding(@file_get_contents(''.$GLOBALS['WEATHER_DATA'].'readonly/weather/'.$wfr.'/weather.php'), array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
      }
    }
    unset($m);
    if (strtolower($cha) == 'utf-8') {
        if (function_exists('iconv')) {
          $str = @iconv($cha, 'gb2312', $str);
        }
    }
  return $str;
}


$d_ = gmdate('Ymd', time() + floatval($web['time_pos']) * 3600);
$arrw = $arrw_city = array();
$text = '';
if($arr=@glob(''.$GLOBALS['WEATHER_DATA'].'writable/__temp__/weather/'.$wfr.'/*.txt')){
    foreach($arr as $v){
      if(gmdate('Ymd',filemtime($v) + floatval($web['time_pos']) * 3600)==$d_){
        $f_n = basename($v, '.txt');
	    $f_n = preg_replace('/(%\w{2})2?$/iU', '$1', $f_n);

        if (isset($arrw_city[$f_n])) {
          continue;
        } else {
          $arrw_city[$f_n] = 1;
          $f_d = filemtime($v);
	      $arrw[$f_d.$f_n] = '
  '.(POWER == 5 ? '<input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$wfr.'/'.$f_n.'" /> ' : '').''.decode(urldecode($f_n)).' - '.gmdate('Y/m/d H:i:s', $f_d + floatval($web['time_pos']) * 3600);
        }

	    unset($f_d, $f_n);
	  } else {
	    @unlink($v);
	  }
    }
}
$n = count($arrw);
krsort($arrw);
?>
<form method="post" id="manageform" action="<?php echo $GLOBALS['WEATHER_DATA']; ?>webmaster_central.php?post=weather">

<?php
if($n>0){
  echo '总计'.$n.'条记录<br /><br />';
  echo $button_1;
  echo @implode('<br />', $arrw);
} else {
  echo '没有天气城市记录！';
}
?>
  <input type="hidden" name="act" value="del" />
</form>
</body>
</html>
