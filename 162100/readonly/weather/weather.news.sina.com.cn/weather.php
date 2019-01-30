<?php
header("content-type: text/html; charset=gb2312");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>天气</title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--

html { min-width:720px; padding-top:0; background-color:#FFFFFF; background:none; /*min-height:654px;*/ }
body { min-width:672px; max-width:1000px!important; background:#FFFFFF; border-top:none; margin-top:0; padding:0; }
.body { width:auto!important; }
#tq { margin-bottom:10px; background-color:#EEEEEE; color:#999999; height:30px; line-height:30px; clear:both; padding:0 10px; text-align:left; font-weight:bold; }
#tq a {color:#336699; text-decoration:underline; font-size:12px; }
#search_weather { text-align:center; color:#999999; clear:both; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script type="text/javascript" language="javaScript">
var par = parent.document.getElementById("wdFr");
</script>
</head>
<body>
<div id="tq"><table width="100%" align="left" cellspacing="0" cellpadding="0" border="0"><tr><td width="180">天气预报  [ <a href="?area=china" style="font-size:16px;">更换城市&raquo;</a> ]</td><td>
<form id="wform" action="weather.php" method="post" target="_self">
<input id="weather_fr" name="weather_fr" type="hidden">

<div style="position:relative; font-size:12px;">
            <div style="cursor:pointer"> [ <a href="javascript:void(0)" id="optionName" onclick="document.getElementById('optionMenu').style.display=''; return false;">切换天气频道</a><span class="mainmore" onmouseover="document.getElementById('optionMenu').style.display='';">&raquo;</span> ]</div>
            <ul id="optionMenu" onmouseover="this.style.display='';" onmouseout="this.style.display='none';" style="position:absolute; top:20px; left:0; z-index:99; padding:5px 10px; background-color:#FFFFFF; border:1px #D8D8D8 solid; display:none;">
<?php
if ($w_f = @glob('readonly/weather/*', GLOB_ONLYDIR)) {
  foreach($w_f as $w_type) {
    $w_type = basename($w_type);
    $w_set = $system_weather_from==$w_type ? '（系统默认）':'';
    $wfr_title = @iconv('utf-8', 'gb2312', @file_get_contents('readonly/weather/'.$w_type.'/title.txt'));
    $wfr_title = $wfr_title ? $wfr_title : $w_type;
    if ($web['weather_from'] == $w_type) {
      echo '
<li><span>当前天气源：'.$wfr_title.''.$w_set.'</span></li>';
    } else {
      echo '
<li><a href="javascript:void(0)" onclick="document.getElementById(\'weather_fr\').value=\''.$w_type.'\'; document.getElementById(\'wform\').submit(); return false;">切换到：'.$wfr_title.''.$w_set.'</a></li>';
    }
    unset($w_type, $wfr_title);
  }
}
unset($w_f, $w_type);
?>
            </ul>
          </div>
</form>
</td>
</tr>
</table>
</div>

<?php


$text = '';
if (empty($_GET['area'])) {
  $_GET['type'] = 2;
  echo '<div class="body" id="body">
<style type="text/css">
<!--
.tab_ctn li{ margin:0; padding:0; list-style:none; }

h1,h2,h3,h4,h5,h6,p {margin:0;padding:0;}

.tab_ctn { width:672px; overflow:hidden; }
.tab_ctn h3{ margin:0 12px; font:24px/30px \'Microsoft YaHei\',"宋体",sans-serif; color:#094c9f; }
.tab_ctn h3 span { font:14px/30px \'宋体\'; color:#333; }

.tab_hd .temp_opt { display:inline; float:right; margin:-25px 10px 0; }
.clearfix:after { content:\'\20\'; display:block; height:0; clear:both; }
.clearfix { zoom:1; }


.tab_hd .temp_opt{ display:inline; float:right; margin:-25px 10px 0; }
.temp_opt span{ cursor:pointer; text-decoration:underline; }
.temp_opt .temp_on { cursor:default; text-decoration:none; }

.mod_today{ height:278px; background-color:#C4E5EA;          margin-bottom: 10px;overflow: hidden; clear:both;}
.mod_today .m_left{ float:left; width:496px; height:268px; overflow:hidden; padding:5px;
background: url(http://php.weather.sina.com.cn/images/weather_yc_01.jpg) 0 0 no-repeat;color: #fff;font:14px/28px \'Microsoft YaHei\';}/*2012/9/1*/
.mod_today h5{margin: 10px 10px 0;font-size: 20px;font-family:\'Microsoft YaHei\', "宋体", sans-serif; }/*2012/9/1*/

.mod_today .detail{position: relative; margin-top: -55px;font-size: 18px;text-align: center;}/*2012/9/9*/
.mod_today .detail .fs_30{margin-right: 10px;}
.icon_weather{width: 180px;height: 180px;margin: auto;text-align: center;}

.mod_today .day,.mod_today .night{float: left;width: 248px;}

.fs_30{font-size: 30px;}
.fs_24{font-size: 24px;}
.fs_14{font-size: 14px;}


.mod_today .m_right{float: right;width: 166px; height:278px; overflow:auto; font-size:12px; line-height:150%;}
.mod_today .m_right td {font-size:12px; line-height:150%; padding:0;}
.mod_today .m_right h4{ font-size:12px; text-align:center; border:1px outset; margin:4px; color: #094c9f}
.mod_today .m_right .tb_sun { font-size:12px; }

.mod_today .m_right p{ }
.mod_today h4 span{}

.weather_list{}
.mod_02{float: left;width: 158px;height: 243px;padding: 5px;margin-top: 3px;background: url(http://php.weather.sina.com.cn/images/weather_yc_01.jpg) -510px 0 no-repeat;color: #fff;}
.mod_02 .mod_03{float: left;width: 78px;text-align: center;font-family: \'Microsoft YaHei\';}/*2012/9/1*/
.icon_mid_weather{width: 78px;height: 78px;margin: auto;}
.mod_03 h5{margin-bottom: 5px;font-size: 14px;}
.mod_03 ul{margin-top: -20px;}
.mod_03 ul{margin-top: -20px;}
.mod_02 h4{margin: 20px 0 15px;font:16px \'Microsoft YaHei\', "宋体", sans-serif;text-align: center;}

-->
</style>';
  @ require ('readonly/weather/getweather.php');
  echo  '</div>';

  if ($city != $NOWCITY || $NOWCITY_ == 1) {
    echo '
<script type="text/javascript" language="javaScript">

  if (parent.document.getElementById("sendWeather") != null) {
    var reloadIfr = \'parent.document.getElementById("sendWeather")\';
  } else {
    document.write(\'<iframe id="reloadcity" src="PseudoXMLHTTP.php?xml_id=weather&xml_file=readonly%2Fweather%2Fgetweather.php&char=utf-8" style="display:none;"></iframe>\');
    var reloadIfr = \'document.getElementById("reloadcity")\';
  }
  function relaodCity() {
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
  }




} else {

  @ require ('readonly/weather/'.$web['weather_from'].'/getweather_seek.php');
  if (empty($_GET['area']) || $_GET['area'] != 'international') {
    $text .= '<div id="search_weather">国内城市 | <a href="?area=international">国外城市</a></div>';
    if (empty($_GET['province']) || !isset($seek['china'][$_GET['province']])) {
      $text_capital = $text_province = '';
      foreach ($seek['china'] as $k => $v) {
        $temp_capital = array_keys($v);
        $text_capital .= '<li><a href="?city='.urlencode($temp_capital[0]).'">'.$temp_capital[0].'</a></li>';
        unset($temp_capital);
        $text_province .= '<li><a href="?area=china&province='.urlencode($k).'">'.$k.'</a></li>';
      }
      $text .= '<div class="column"><div class="column_title">省会城市</div><div class="class"><ul>'.$text_capital.'</ul></div></div><div class="column" style="margin-top:-1px;"><div class="column_title">各省查找</div><div class="class"><ul>'.$text_province.'</ul></div></div>';
    } else {
      if (empty($_GET['metropolis']) || !isset($seek['china'][$_GET['province']][$_GET['metropolis']])) {
        $text_metropolis = '';
        foreach ($seek['china'][$_GET['province']] as $k => $v) {
          $text_metropolis .= '<ul><li><a href="?city='.urlencode($k).'">'.$k.'</a></li>';
          foreach ($v as $city) {
            $text_metropolis .= '<li><a href="?city='.urlencode($city).'" class="grayword">'.$city.'</a></li>';
          }
          $text_metropolis .= '</ul>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=china">国内</a> &gt; '.$_GET['province'].'</div><div class="class">'.$text_metropolis.'</div></div>';

      } else {
        $text_city = '<li><a href="?city='.urlencode($_GET['metropolis']).'">'.$_GET['metropolis'].'</a></li>';
        foreach ($seek['china'][$_GET['province']][$_GET['metropolis']] as $k => $v) {
          $text_city .= '<li><a href="?city='.urlencode($v).'">'.$v.'</a></li>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=china">国内</a> &gt; <a href="?area=china&province='.urlencode($_GET['province']).'">'.$_GET['province'].'</a> &gt; '.$_GET['metropolis'].'</div><div class="class"><ul>'.$text_city.'</ul></div></div>';
      }
    }
  } else {
    $text .= '<div id="search_weather"><a href="?area=china">国内城市</a> | 国外城市</div>';
    if (empty($_GET['continent']) || !isset($seek['international'][$_GET['continent']])) {
      $text_continent = '';
      foreach ($seek['international'] as $k => $v) {
        $text_continent .= '<li><a href="?area=international&continent='.urlencode($k).'">'.$k.'</a></li>';
      }
      $text .= '<div class="column"><div class="column_title">洲际</div><div class="class"><ul>'.$text_continent.'</ul></div></div>';
    } else {
      if (empty($_GET['country']) || !isset($seek['international'][$_GET['continent']][$_GET['country']])) {
        $text_country = '';
        foreach ($seek['international'][$_GET['continent']] as $k => $v) {
          $text_country .= '<li><a href="?area=international&continent='.urlencode($_GET['continent']).'&country='.urlencode($k).'">'.$k.'</a></li>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=international">洲际</a> &gt; '.$_GET['continent'].'国家</div><div class="class"><ul>'.$text_country.'</ul></div></div>';

      } else {

        $text_city = '';
        foreach ($seek['international'][$_GET['continent']][$_GET['country']] as $k => $v) {
          $text_city .= '<li><a href="?city='.urlencode($v).'">'.$v.'</a></li>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=international">洲际</a> &gt; <a href="?area=international&continent='.urlencode($_GET['continent']).'">'.$_GET['continent'].'国家</a> &gt; '.$_GET['country'].'</div><div class="class"><ul>'.$text_city.'</ul></div></div>';

      }
    }

  }
  echo $text;
}

echo '
<script type="text/javascript" language="javaScript">
  function relaodparentH() {
    if (par != null) {
      var minH = parseInt(document.body.offsetHeight);
      par.style.height = par.name = (minH)+"px";
      par.style.width=\'720px\';
    }
  }
  if (document.all) {
    window.attachEvent("onload", relaodparentH);
  } else {
    window.addEventListener("load", relaodparentH, false);
  }
</script>
';


?>
</body>
</html>