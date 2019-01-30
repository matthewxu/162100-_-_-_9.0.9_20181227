<?php
require ('authentication_manager.php');
?>
<?php

@ require ('readonly/weather/getweather_step.php');
?>
<form action="?post=weather" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">天气采集源：</td>
      <td><div class="note">
<?php
if ($w_f = @glob('readonly/weather/*', GLOB_ONLYDIR)) {
  foreach($w_f as $w_type) {
    $w_type = basename($w_type);
    $wfr_title = @file_get_contents('readonly/weather/'.$w_type.'/title.txt');
    $wfr_title = $wfr_title ? $wfr_title : $w_type;
$n = 0;
if($arr=@glob('writable/__temp__/weather/'.$w_type.'/*.txt')){
    $d_ = gmdate('Ymd', time() + floatval($web['time_pos']) * 3600);
    $arrw =array();
    foreach($arr as $v){
      if(gmdate('Ymd',filemtime($v) + floatval($web['time_pos']) * 3600)==$d_){
	    $a = preg_replace('/(%\w{2})2?$/iU', '$1', basename($v,'.txt'));
	    //$arrw[$a] = urldecode($a).' - '.gmdate('Y/m/d H:i:s',filemtime($v) + floatval($web['time_pos']) * 3600);
	    $arrw[$a] = 1;
	    unset($a);
	  } else {
	    @unlink($v);
	  }
    }
$n = count($arrw);
}
    echo '
<p style="clear:both;">
<span style="float:right;">[<a href="readonly/weather/'.$w_type.'/city_err_journal.txt" target="_blank" class="grayword">该模式错误城市日志</a>]</span>
<span style="float:right; margin-right:15px;">[<a href="readonly/run/get_manager_access.php?weather_fr='.$w_type.'" target="_blank" class="grayword">该模式今天被访问城市（'.$n.'）</a>]</span>
<input type="radio" class="radio" name="weather_fr" value="'.$w_type.'"'.($web['weather_from']==$w_type?' checked="checked"':'').' /> <a href="http://'.$w_type.'" target="_blank"><b style="font-size:16px;">'.$wfr_title.'</b></a> </p>
';
    unset($n);
  }
}
unset($w_f, $w_type);
?></div>
</td>
    </tr>
    <tr>
      <td width="200" align="right">天气更新频率：</td>
      <td><input type="text" name="weather_step" value="<?php echo $web['weather_step']; ?>" size="4" maxlength="" onblur="isDigit(this,'<?php echo $web['weather_step']; ?>',1,'.');" /> 小时</td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" class="send2" style="border:none;">提交</button></td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="200">天气定位的城市不准怎么办？</td>
      <td><b>原因及说明</b><br />
我们使用的是纯真IP库，其官方每5天即更新发布1次，对IP做出及时的校正、更新。<br />
而本程序可能不能及时更新，故有些城市IP已经发生了变化，显示不准<br />
<b>如何更新城市IP数据库</b><br />
到网上搜索、或到各大下载站下载最新版的纯真IP库，解压后，取出其中的QQWry.Dat，重命名为ip.dat，放到readonly/weather目录下即可。<br />
<b>注：</b><br />
观察需清除浏览器cookie，然后重启浏览器。<br />
本机测试程序城市无法定位，初始显示为北京，请上传到服务器使用。</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="set" />
</form>
