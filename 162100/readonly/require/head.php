<?php

//为了升级（8.9.6 起），规避有的浏览器拦截由于ad两个字母而认为是广告
if (!file_exists('writable/chuchuang')) {
  if (file_exists('writable/ad')) {
    @rename('writable/ad', 'writable/chuchuang');
  }
}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="new_top">
  <tr>
    <td>&nbsp;</td>

<?php

$web['calendar'] = 'http://www.162100.com/WanNianLi';

$self = isset($self) ? $self : basename($_SERVER['PHP_SELF']);
$text_i2 = '';

$mode_arr = array(
'index_complete.php' => '怀旧版',
'index_new.php' => '爽洁版',
'index_new2.php' => '爽洁版Ⅱ',
'index_menhu.php' => '门户版360',
'index_hiddenmenu.php' => '快捷版',
'index_search.php' => '简易版',
);

if (strpos($self, 'index') === 0) {
  $AD_TOP = 'writable/chuchuang/ad_top_index.txt';
  $AD_BANNER = 'writable/chuchuang/ad_banner_index.txt';
  $home_yes = '<a href="sethomepage.php" onclick="try{this.style.behavior=\'url(#default#homepage)\';this.setHomePage(\''.trim($web['sitehttp'], '/').$_SERVER['REQUEST_URI'].'\');return(false);}catch(e){}" title="设为首页">设为首页</a>';

  $mode_arr_ = @glob('index_*.php');
  if (count($mode_arr_) > 0) {
    $text_temp = '';
    $step_temp = 0;
    foreach ($mode_arr_ as $k => $v) {
      if ($self == $v) continue;
      if (isset($mode_arr[$v])) {
        $step_temp ++;
        $text_temp .= '<div onclick="location.href=\''.(filesize($v) == filesize('index.php') ? 'index.php' : $v).'\';">'.$mode_arr[$v].'</div>';
      }
    }
  }
  $text_i_ = '';
  if ($step_temp > 0) {
    if ($self == 'index_new2.php') {
      $home_yes .= '<span style="padding-right:15px; border-right:1px #D8D8D8 dotted;"></span>';
      $text_i2 = '
    <td class="mode" style="border-right:none; text-align:right;"><a href="javascript:void(0);" onclick="return false;" style="background:none!important;" class="blueword" title="切换到其它模式">'.$mode_arr[$self].'<div class="mode_other">'.$text_temp.'</div></a></td>';
      $text_i_ .= '<td style="width:62px;">&nbsp;</td>';
      
    } else {
      $text_i_ .= '
    <td class="mode mode_is"><a onmouseover="this.innerHTML=\''.(isset($mode_arr[$self])?$mode_arr[$self]:'√').'\';" onmouseout="this.innerHTML=\'&nbsp;\';" title="当前模式">&nbsp;</a></td>
    <td class="mode"><a href="javascript:void(0);" onclick="return false;" title="切换到其它模式"><div class="mode_other">'.$text_temp.'</div></a></td>';
    }
  } else {
    $text_i_ .= '<td style="width:60px;">&nbsp;</td>
    <td style="width:60px;">&nbsp;</td>';
  }
  unset($text_temp, $step_temp);


  $text_i = '
<td class="new_top_1" id="new_top_1">
<style>
<!--
.slider_warn_map{ margin:0; padding:0; height:12px; width:19px; display:inline-block; *display:inline; *zoom:1; overflow:hidden; }
.slider_warn_map_i{ float:left; margin-top:6px; width:3px; height:4px; font-size: 0; line-height: 0; overflow:hidden; transition: opacity 0.3s ease; }
.slider_warn_map_i:hover{ opacity: 0.7; alpha(opacity=70);}
.slider_warn_map_i0{ background-color: #AACF8A;}
.slider_warn_map_i1{ background-color: #FFE683;}
.slider_warn_map_i2{ background-color: #DEBC86;}
.slider_warn_map_i3{ background-color: #F0A066;}
.slider_warn_map_i4{ background-color: #F06666;}
.slider_warn_map_i5{ background-color: #AD90C8;}
.slider_warn_map_i_on{ width:4px; height:10px; margin-top:0px; }
-->
</style>
<script>
<!--
function showWD(o,src,w,h){$("new_top_1").style.position="relative";$("new_top_1").style.zIndex="78";var img=$("imgfr");var iFr=$("wdFr");var s=iFr.src.toString().replace(/[^\/]*[\/]+/g,"")+"abc";var xh=parseInt($("new_top_1").offsetHeight);xh=xh-1<=34?34:xh-1;iFr.style.width=w;iFr.style.height=h=="auto"?iFr.name:h;iFr.style.top=xh+"px";iFr.style.display="block";img.style.top=(xh-11)+"px";img.style.left=(parseInt(o.offsetLeft)+parseInt(o.offsetWidth)/2)+"px";img.style.display="block";if(s!=src.toString().replace(/[^\/]*[\/]+/g,"")+"abc"){iFr.src=src}iFr.style.filter="alpha(opacity=100)";iFr.style.opacity=100/100;iFr.onmouseout=function(){iFr.style.filter="alpha(opacity=100)";iFr.style.opacity=100/100;img.style.display="none";var val=100;(function(){var imgChange=setTimeout(arguments.callee,20);iFr.style.filter="alpha(opacity="+val+")";iFr.style.opacity=val/100;if(val<=20){iFr.style.display="none";$("new_top_1").style.position="";$("new_top_1").style.zIndex="auto";clearTimeout(imgChange)}val-=10})();if(ct!=null){window.clearInterval(ct)}}}
-->
</script>
<img id="imgfr" src="readonly/images/ifr.gif" />
<iframe id="wdFr" name="auto" frameborder="0" style="padding:10px;" scrolling="no"></iframe>

<table id="weather_datetime" border="0" cellspacing="0" cellpadding="0"><tr><td id="weather">
    <span class="weather">
  <span id="city_where" onmouseover="ct=window.setInterval(function(){showWD($(\'city_where\'), \'weather.php?area=china\', \'660px\', \'auto\');}, 100);" onmouseout="window.clearInterval(ct);">
    <a href="weather.php?area=china" id="weather_where" title="切换城市"><img src="readonly/images/po.png" /></a>
    <a href="weather.php?type=2&city=%B1%B1%BE%A9" id="weather_city">北京</a>
  </span>
  <a href="weather.php?type=2&city=%B1%B1%BE%A9" id="weather_show">
 <span id="w_kq">空气<b class="w_kq_you">优</b></span><span id="w_today" title="白天"><span class="w_img"><img src="readonly/weather/qing_0.png" /></span><span class="w_qingkuang">晴</span><span class="w_wendu w_wendu_ls">8℃</span></span> ～<span id="w_moday" title="夜间"><span class="w_img"><img src="readonly/weather/yin_1.png" /></span><span class="w_qingkuang">阴</span><span class="w_wendu w_wendu_lx">-4℃</span></span><!--span class="w_xiangqing" title="未来详情">︾</span--></a>
</span>
    </td><td><span class="w_dt_line"></span></td><td id="date_time" onmouseover="ctt2=window.setInterval(function(){showWD($(\'date_time\'), \''.$web['calendar'].'\', \'540px\', \'452px\');}, 1000);" onmouseout="window.clearInterval(ctt2);"><a href="wannianli.html">日历载入中…</a></td></tr></table>
</td>'.$text_i_;
  unset($text_i_);

} elseif (($self == 'class.php' || /*$self == 'class_current.php' || $self == 'detail_current.php' ||*/ $self == 'detail.php') && isset($_GET['column_id'])) {
  $AD_TOP = 'writable/chuchuang/ad_top.txt';
  $AD_BANNER = 'writable/chuchuang/ad_banner.txt';
  $home_yes = '<a href="#" onclick="addFavor();return false;" title="收藏本页">收藏本页</a>';
  $text_i = '<td class="new_top_class">';
  foreach ($web['area'][$_GET['column_id']] as $class_id => $class) {
    if ($class_id == 'name') continue;
    $text_i .= '<a href="'.get_class_html($_GET['column_id'], $class_id).'">'.$class[0].'</a> · ';
  }
  $text_i = preg_replace('/\s*·\s*$/', '', $text_i);
  //$text_i .= '<a href="column.php?column_id='.$_GET['column_id'].'" title="本频道更多栏目">…</a>';
  $text_i .= '</td>';
} elseif ($self == 'column.php' && isset($_GET['column_id'])) {
  $AD_TOP = 'writable/chuchuang/ad_top.txt';
  $AD_BANNER = 'writable/chuchuang/ad_banner.txt';
  $home_yes = '<a href="#" onclick="addFavor();return false;" title="收藏本页">收藏本页</a>';
  $text_i = '<td class="new_top_class">';
  foreach ($web['area'] as $column_id => $column) {
    $text_i .= '<a href="'.get_column_html($column_id).'">'.$column['name'][0].'</a> · ';
  }
  $text_i = preg_replace('/\s*·\s*$/', '', $text_i);
  //$text_i .= '<a href="column.php" title="更多频道">…</a>';
  $text_i .= '</td>';
} else {
  $home_yes = '<a href="#" onclick="addFavor();return false;" title="收藏本页">收藏本页</a>';
  $text_i = '<td class="new_top_class">&nbsp;</td>';

}
echo $text_i;
unset($text_i, $column_id, $column, $class_id, $class, $k, $v);
?>
    <td class="new_top_4"><span id="mylog"><?php
$lv0 = $lv1 = '';
if (is_array($web['login_key']) && count($web['login_key']) > 0) {
  $lv1 .= '&&(';
  foreach ($web['login_key'] as $lv => $lk) {
    if ($lk == 1)
      $lv0 .= '<a href="javascript:void(0);" onclick="toQzoneLogin(\\\''.$lv.'\\\');return false;" title="用'.@file_get_contents('login_key/'.$lv.'/title.txt').'帐号登录"><img src="readonly/images/'.$lv.'.png" width="16" height="16" /></a> ';
    $lv1 .= 'us[4]==\''.$lv.'\'||';
    unset($lv, $lk);
  }
  $lv1 = rtrim($lv1, '|').')';
}
?><script>
  us = getCookie('usercookie').toString().split('|');
  if (us && us.length >= 5) {
    if (us.length >=  7) {
      us[4] = '162100';
    }
  	document.write('' + ((us[4] != 'undefined' && us[4] <?php echo $lv1; ?> ) ? '<a href="member_current.php" onclick="addSubmitSafe(1);" target="addCFrame"><b><img src="readonly/images/' + us[4] + '.png" width="16" height="16" /> ' + us[0] + '</b> 控制台</a>' : '<a href="member_current.php" onclick="addSubmitSafe(1);" target="addCFrame" title="进入用户中心\n进行个性化管理"><b>' + us[0] + '</b> 控制台</a> · <a href="member_current.php?get=style&style=default" onclick="addSubmitSafe(1);" target="addCFrame">换肤</a> · <a href="member_current.php?get=memory_website" onclick="addSubmitSafe(1);" target="addCFrame">已浏览</a>') + ' · <a href="member.php?post=login&act=logout" onclick="addSubmitSafe();$(\'addCFrame\').style.display=\'block\';" target="addCFrame">退出</a>');
    var myCollection = '<ul id="collection"><li class="class_name"><a>收藏</a></li><li style="color:#DDDDDD">我的收藏载入中…</li></ul>';
  } else {
  	document.write('<b><?php echo $lv0; ?><a href="login_current.php?location='+location.href+'" onclick="addSubmitSafe(1);" target="addCFrame" title="进入用户控制台\n进行个性化管理">登陆</a></b> · <a href="member_current.php?get=style&style=default" onclick="addSubmitSafe(1);" target="addCFrame">换肤</a>');
    var myCollection = '';
  }
</script></span><span id="new_sc"><?php echo $home_yes; ?></span>
<?php
unset($lv0, $lv1);
?>
    </td>
<?php echo $text_i2; ?>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
if (isset($AD_TOP)) {
  if (file_exists($AD_TOP)) {
    include ($AD_TOP);
  }
}
?>

<div id="head_out">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="head">
    <tr>
    <td id="logo"><a href="./"><img src="writable/images/logo.png" alt="<?php echo $web['sitename2']; ?> - 欢迎您" /></a></td>
    <td id="search_">
    <script> var defaultBayId = '<?php echo $web['search_bar']; ?>'; </script>
    <script type="text/javascript" language="javaScript" src="writable/js/search_h.js?<?php echo filemtime('writable/js/search_h.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="writable/js/search.js?<?php echo filemtime('writable/js/search.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="readonly/js/search.js?<?php echo filemtime('readonly/js/search.js'); ?>"></script>
    <script> addsearchBar(search_default_type, search_default_id); </script>
    </td>
    </tr>
  </table>
</div>

<?php
if (isset($AD_BANNER)) {
  if (file_exists($AD_BANNER)) {
    include ($AD_BANNER);
  }
}
?>
