<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
#ad_table td { background-color:#FFFFFF; text-align:left; font-size:14px; }
.s_noset_bg { background:#CCC; }
-->
</style>
<form action="member.php?post=weather" method="post" target="_self">
<input id="weather_fr" name="weather_fr" type="hidden" />
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
  <th width="320" style="text-align:center; font-size:12px;">天气样式</th>
  <th width="160" style="text-align:center; font-size:12px;">数据来源</th>
  <th>&nbsp;</th>
  </tr>
  
<?php
@ require ('readonly/weather/getweather_step.php');
$system_weather_from = $web['weather_from'];
$web['weather_from'] = (!empty($_COOKIE['weatherfrom']) && is_dir('readonly/weather/'.$_COOKIE['weatherfrom'])) ? $_COOKIE['weatherfrom'] : $web['weather_from'];

if ($w_f = @glob('readonly/weather/*', GLOB_ONLYDIR)) {
  foreach($w_f as $w_type) {
    $w_type = basename($w_type);
    $w_set = $system_weather_from==$w_type ? '<span class="grayword">（系统默认）</span>':'';

    $wfr_title = @file_get_contents('readonly/weather/'.$w_type.'/title.txt');
    $wfr_title = $wfr_title ? $wfr_title : $w_type;
    echo '
  <tr>
  <td width="320"><img src="readonly/weather/'.$w_type.'/thumb.jpg" /></td>
  <td width="160">'.$wfr_title.''.$w_set.'</td>
';
    if ($web['weather_from'] == $w_type) {
      echo '
  <td><button type="button" onclick="alert(\'已选择该模式了\'); return false">√已选择该样式</button></td>
';
    } else {
      echo '
  <td><button type="submit" onclick="$(\'weather_fr\').value=\''.$w_type.'\'" class="s_noset_bg">选择该样式</button></td>
';
    }
    echo '
  </tr>';
  }
}
unset($w_f, $w_type);

?>
</table>
</form>




