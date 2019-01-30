<?php
header("content-type: text/html; charset=utf-8");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天气</title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
html { text-align:left; }
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
<body class="bg_06_01" >
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
    $wfr_title = @file_get_contents('readonly/weather/'.$w_type.'/title.txt');
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
    <style>
        html, body, ul, li, ol, dl, dd, dt, p, h1, h2, h3, h4, h5, h6, form, fieldset, legend, img { margin:0; padding:0; }
        fieldset, img { border:none; }
        address, caption, cite, code, dfn, th, var { font-style:normal; font-weight:normal; }
        ul, ol { list-style:none; }
        input { padding-top:0; padding-bottom:0; }
        select, input { vertical-align:middle; }
        select, input, textarea { font-size:12px; margin:0; }
        table { border-collapse:collapse; }
        body { background:#fff; color:#000; font:14px/20px "Arial", "Microsoft YaHei", "微软雅黑", "SimSun", "宋体"; -webkit-text-size-adjust:none;}
        iframe { border:none;}
        .clearfix:after { content:"."; display:block; height:0; visibility:hidden; clear:both; }
        .clearfix { zoom:1; }
        .clearit { clear:both; height:0; font-size:0; overflow:hidden; }
        a { color:#000; text-decoration:none; }
        a:visited { color:#800080; }
        a:hover{ color: #068793;}
        a:hover, a:active, a:focus { text-decoration:none; }
    </style>
    <style>
        /* new add by 2015年1月12日 */
        .ml0{ margin-left: 0px!important;}
        .ml10{ margin-left: 10px!important;}

        /*快捷查询*/
        .n_blk1{ float: right; display: inline; width: 530px; height: 225px; background-color: rgba(0,0,0,0.75); filter: progid:DXImageTransform.Microsoft.gradient(GradientType = 0,startColorstr = \'#aa000000\', endColorstr = \'#aa000000\' )\9;}
        .n_blk1 .wt_tt0_w{ height: 45px; line-height: 45px;}
        .n_blk1 .wt_tt0{ height: 45px;}
        .n_blk1 .wt_tt0_r{ padding-right: 10px; padding-top: 15px;}

        .wt_switch2{ display: block;}
        .wt_switch2_0{ background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.gif); background-position: 12px 3px; background-repeat: no-repeat;}
        .wt_switch2_1{ background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.gif); background-position: -60px 3px; background-repeat: no-repeat;}
        .wt_switch2_2{ background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/wt_switch2.gif); background-position: -133px 3px; background-repeat: no-repeat;}
        .wt_switch2_0.wt_switch_on{ background-position: 12px 3px;}
        .wt_switch2_1.wt_switch_on{ background-position: -60px 3px;}
        .wt_switch2_2.wt_switch_on{ background-position: -133px 3px;}

        /*快捷查询*/
        #n_blk1_c0,#n_blk1_c1,#n_blk1_c2{ position: relative; height: 180px;}

        /*国内*/
        .wnbc_province{ height: 167px; padding: 13px 0 0; width: 530px; overflow: hidden; zoom: 1;}
        .wnbc_pItems{ float: left; height: 167px; overflow: hidden; display: inline; zoom: 1; overflow: hidden;}
        .wnbc_pItem{ position: relative;}
        .wnbc_piH{ position: absolute; left: 0px; top: 0px; width: 25px; text-align: right;  overflow: hidden; color: #ccc; font-size: 13px; font-weight: normal; display: inline;}
        .wnbc_piC{ padding-left: 35px;overflow: hidden;}
        .wnbc_piC a,.wnbc_piC a:visited{ display: inline-block; padding: 0 3px;  *padding: 0 3px; font-size: 13px; color: #ccc;}
        .wnbc_piC a:hover{ color: #fff;}


        .h40{ height: 40px!important; overflow: hidden;}
        #wnbc_pItems1{ width: 74px; padding-top: 2px;}
        #wnbc_pItems1 .wnbc_pItem{ line-height: 20px;}
        #wnbc_pItems2{ width: 162px; padding-top: 1px;}
        #wnbc_pItems2 .wnbc_pItem{ line-height: 24px;}
        #wnbc_pItems3{ width: 152px;}
        #wnbc_pItems3 .wnbc_pItem{ line-height: 28px;}
        #wnbc_pItems4{ width: 140px;}
        #wnbc_pItems4 .wnbc_pItem{ line-height: 28px;}
        #wnbc_pItems4 .wnbc_piH{ width: 50px;}
        #wnbc_pItems4 .wnbc_piC{ padding-left: 56px;}
        /*热门城市*/
        #query_hot{ height: 165px; padding:15px 0 0 40px; width: 490px; overflow: hidden; zoom: 1;}
        #query_hot a,#query_hot a:visited{ float: left; width: 66px; height: 24px; line-height: 24px; color: #ccc; padding-left: 0px; display: inline; font-size: 13px;}
        #query_hot a:hover{ color: #fff;}
        /*国际城市*/
        #query_international{ height: 165px; padding:15px 0 0 40px; width: 490px; overflow: hidden; zoom: 1;}
        #query_international a,#query_international a:visited{ float: left; width: 65px; height: 24px; line-height: 24px; color: #ccc; padding-left: 0px; display: inline; font-size: 13px;}
        #query_international a:hover{ color: #fff;}
        /*云图大全*/
        #cloudChart{ display: block; width: 225px; height: 180px; overflow: hidden; position: relative;}
        #cloudChart img{ margin-top: -20px; height: 245px;}

        /*白板*/
        .bg_white .n_blk1{background-color: #fff; filter: none\9;}

        .bg_white .wnbc_piH{ color: #666;}
        .bg_white .wnbc_piC a,.bg_white .wnbc_piC a:visited{ color: #666;}
        .bg_white .wnbc_piC a:hover{ color: #000;}
        .bg_white #query_hot a,.bg_white #query_hot a:visited{ color: #666;}
        .bg_white #query_hot a:hover{ color: #000;}
        .bg_white #query_international a,.bg_white #query_international a:visited{ color: #666;}
        .bg_white #query_international a:hover{ color: #000;}

        /*default code*/
        .slider_ct_header{height: 40px; position: relative;}
        .slider_ct_name{ display: inline-block; *display: inline; padding-right: 12px;}
        #slider_dc_container{ position: absolute; top: 0px; height: 40px; width: 22px;}
        #slider_dc{ position: absolute; top: 8px; left: 0px; overflow: hidden; width: 100px; height: 26px; background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.gif); background-repeat: no-repeat; background-position: 0px 0px;}
        #slider_dc:hover{ background-position: 0px -42px;}
        #slider_dc.hasSet{ width: 22px; background-position: -116px 0px;}
        #slider_dc.hasSet:hover{ background-position: -116px -42px;}
        
        #slider_dc_box{ height: 64px; overflow: hidden; position: absolute; top: 40px; left: -22px; display: none; padding: 0 15px 0 14px;}
        #dcbarrow{ background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.gif); background-repeat: no-repeat; background-position: -181px 0px;  height: 7px; width: 15px; position: absolute; left: 27px; top: 0px;}
        #dcbl{position: absolute; left: 0px; top: 0px; background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.gif); background-repeat: no-repeat; background-position: -154px 0px; width: 14px; height: 64px; overflow: hidden;}
        #dcbc{ background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_bg_png24.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_bg_png24.gif); background-repeat: repeat-x; background-position: 0px 0px; height: 64px; overflow: hidden; padding-right: 86px; position: relative;}
        #dcbr{position: absolute; right: 0px; top: 0px;  background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.png); _background-image: url(http://www.sinaimg.cn/dy/weather/main/w2015/dc_png24.gif); background-repeat: no-repeat; background-position: -350px 0px; width: 15px; height: 64px; overflow: hidden;}
        .show{ display: block!important;}
        #slider_dc_box a,#slider_dc_box a:visited{ color: #068894; cursor: pointer;}
        #slider_dc_box a:hover{ color: #046b74;}
        #sdcb_name{ padding: 16px 0 0 0; display: block; height: 30px; line-height: 30px; font-size: 18px;}
        #sdcb_del{position: absolute; right: 45px; top: 16px; height: 30px; line-height: 30px; font-size: 13px;}
        #sdcb_change{position: absolute; right: 3px; top: 16px; height: 30px; line-height: 30px; font-size: 13px;}
        #sdcb_span{position: absolute; right: 36px; top: 15px; height: 30px; line-height: 30px; font-size: 13px; color: #999;}

        /*天气要闻*/
        #wt_newsT,#wt_newsT:visited{ color: #068894;}
        #wt_newsT:hover{ color: #08bfd0;}
        #wt_newsLink,#wt_newsLink:visited{ color: #068894; float: right; margin-right: 12px; line-height: 45px;}
        #wt_newsLink:hover{ color: #08bfd0;}
    </style>    
    <script src="http://news.sina.com.cn/js/weather/1010/raphael-min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="http://news.sina.com.cn/css/weather/home/1010/index.css">

<link rel="stylesheet" href="http://news.sina.com.cn/css/weather/1010/animate.min.css">
<script src="http://news.sina.com.cn/js/weather/1010/jquery-1.11.1.min.js"></script>
<script src="http://news.sina.com.cn/js/weather/home/1010/utils.js"></script>
    <!--[if lt IE 7]>
    <script type="text/javascript" src="http://i2.sinaimg.cn/IT/iframe/100315/bdigi/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>
        DD_belatedPNG.fix(\'.png24\');
    </script>
    <![endif]-->

<!--z20160303-->
<style type=text/css>
.hd_nav_list li{margin-left:10px;}
</style>
';
  echo  '
<script type="text/javascript" language="javaScript">
if (par != null) {
  document.write(\'<style> body { width:540px!important; height:392px!important; overflow:hidden!important; margin:0!important; }#slider_w { display:none; }</style>\');
}
</script>
';
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
  $rel1 = '
      var wText = document.getElementById("wrap_w0");
      if (wText) {
        wText.innerHTML = wText.innerHTML.replace(/未来10天/, \'<a href="weather.php" target="_blank" style="font-size:14px; color:#068894;"><u>未来10天&raquo;</u></a>\');
      }
';


} else {

    require ('readonly/weather/'.$web['weather_from'].'/getweather_seek.php');
    $text .= '<div id="search_weather">国内城市</div>';
    if (empty($_GET['province']) || !isset($seek['china'][$_GET['province']])) {
      $text_capital = $text_province = '';
      foreach ($seek['china'] as $k => $v) {
        $temp_capital = array_keys($v);
        list($temp_capital_, $py_capital, $pys_capital) = explode('|', $temp_capital[0]);
        $text_capital .= '<li><a href="?city='.urlencode($temp_capital_).'">'.$temp_capital_.'</a></li>';
        unset($temp_capital);
        $text_province .= '<li><a href="?area=china&province='.urlencode($k).'">'.$k.'</a></li>';
      }
      $text .= '<div class="column"><div class="column_title">省会城市</div><div class="class"><ul>'.$text_capital.'</ul></div></div><div class="column" style="margin-top:-1px;"><div class="column_title">各省查找</div><div class="class"><ul>'.$text_province.'</ul></div></div>';
    } else {
      if (empty($_GET['metropolis']) || !isset($seek['china'][$_GET['province']][$_GET['metropolis']])) {
        $text_metropolis = '';
        foreach ($seek['china'][$_GET['province']] as $k => $v) {
          list($temp_metropolis_, $py_metropolis, $pys_metropolis) = explode('|', $k);
          $text_metropolis .= '<ul><li><a href="?city='.urlencode($temp_metropolis_).'">'.$temp_metropolis_.'</a></li>';
          foreach ($v as $city) {
            list($temp_city_, $py_city, $pys_city) = explode('|', $city);
            $text_metropolis .= '<li><a href="?city='.urlencode($temp_city_).'" class="grayword">'.$temp_city_.'</a></li>';
          }
          $text_metropolis .= '</ul>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=china">国内</a> &gt; '.$_GET['province'].'</div><div class="class">'.$text_metropolis.'</div></div>';

      } else {
        $text_city = '<li><a href="?city='.urlencode($_GET['metropolis']).'">'.$_GET['metropolis'].'</a></li>';
        foreach ($seek['china'][$_GET['province']][$_GET['metropolis']] as $k => $v) {
          list($temp_city_, $py_city, $pys_city) = explode('|', $v);
          $text_city .= '<li><a href="?city='.urlencode($temp_city_).'">'.$temp_city_.'</a></li>';
        }
        $text .= '<div class="column"><div class="column_title"><a href="?area=china">国内</a> &gt; <a href="?area=china&province='.urlencode($_GET['province']).'">'.$_GET['province'].'</a> &gt; '.$_GET['metropolis'].'</div><div class="class"><ul>'.$text_city.'</ul></div></div>';
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
      par.style.width=\'540px\';
      '.$rel1.'
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