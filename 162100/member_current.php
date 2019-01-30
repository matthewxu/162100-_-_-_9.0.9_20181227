<?php

/* 用户后台 */
/* 162100源码 - 162100.com */


@ require('writable/set/set.php');
@ require('writable/set/set_sql.php');
@ require ('readonly/function/confirm_power.php');
define('POWER', confirm_power());

if (POWER == 0.5) {
  session_start();
}

$power_url = array(
  'file'            => '我的帐户',
  'funds'           => '我的收入',
  //'mess'            => '我的信件',
  'style'           => '我的风格',
  'collection'      => '自定义网址',
  'memory_website'  => '我的浏览记录',
  'memory_search'   => '我的搜索记录',
  'mingz'           => '我的引擎设置',
  'notepad'         => '记事本',
  'search_site'     => '站内搜索',
  'weather'         => '我的天气',
);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心<?php

//if (!empty($_GET['get']) && array_key_exists($_GET['get'], $power_url)) {
if (!empty($_GET['get']) && isset($power_url[$_GET['get']])) {
  echo ' - '.strip_tags($power_url[$_GET['get']]);
  $nav = '<a href="member_current.php" target="_self">用户控制台</a> / '.$power_url[$_GET['get']];

} else {
  $_GET['get'] = 'door';
  $nav = '用户控制台';
}

echo ' - '.$web['sitename2'], $web['code_author'];

?></title>
<base target="_blank" />
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
h5.list_title { margin:0; margin-bottom:10px; height:28px; line-height:28px; border-bottom:1px #D8D8D8 solid; clear:both; }
h5.list_title a { height:26px; font-weight:normal; display:inline-block !important; display:inline; zoom:1; padding:0 15px; text-align:center; text-decoration:none; background-color:#FFFFFF; }
h5.list_title a.list_title_in { font-weight:bold; height:28px; border:1px #D8D8D8 solid; border-bottom:none; }
.note { margin-bottom:10px; padding:5px 10px; border:1px #EEEEEE solid; font-size:12px; overflow:hidden; clear:both; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script type="text/javascript" language="javaScript" src="readonly/js/current.js?<?php echo filemtime('readonly/js/current.js'); ?>"></script>
<script type="text/javascript" language="javaScript">
<!--
if(par==null || parent==self){
  location.href='member.php';
}
-->
</script>
</head>
<body style="background-color:transparent; background-image:none;">

<div class="i1">&nbsp;</div>
<div class="i2">&nbsp;</div>
<div class="i3">&nbsp;</div>
<div id="nav">
  <div id="nav_mingz"><?php echo $nav; ?></div>
  <div id="nav_session">
    <?php
if (POWER > 0) {
  echo '欢迎您：'.(@ $session[4] && ($session[4]=='qq' || $session[4]=='baidu' || $session[4]=='weibo') ? '<img src="readonly/images/'.$session[4].'.png" width="16" height="16" />' : '').' <b>'.$session[0].'</b>'.($session[0] == $web['manager'] && POWER==5 ? ' <a href="webmaster_central.php" title="管理员，点击进入管理后台"><img id="manager" src="readonly/images/manager.gif" alt="管理员，点击进入管理后台"></a>' : '').''.(@ $GLOBALS['session_err']).' | <a href="member.php?post=login&act=logout" target="_self">退出</a> | 上次登陆'.$session[1].'';

} else {
  echo '欢迎您！<b>访客</b>。您可以 <a href="login_current.php" class="redword" target="_self">登陆帐号</a> | <a href="reg_current.php" class="redword" target="_self">注册</a>';
}

?>
    | <a href="member.php?get=<?php echo $_GET['get']; ?>" title="展开" target="_parent"><img src="readonly/images/y.gif" class="close" /></a> <a href="about:blank" title="关闭" onclick="parClose()" target="_self"><img src="readonly/images/x.gif" class="close" /></a> </div>
</div>
<div id="body"><div id="body_p">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><?php
$text_menu = '';
foreach ($power_url as $k => $v) {
  if ($k == 'funds') {
    if ($web['addfunds'] != 1) {
      continue;
    }
  }
  $text_menu .= '<li><a id="bar-'.$k.'" href="?get='.$k.'" target="_self">'.$v.'</a></li>';
}

echo '<ul>'.$text_menu.'</ul>';
?>
      </td>
      <td class="menu_right"><?php
if (file_exists('readonly/run/get_member_'.$_GET['get'].'.php')) {
@ require ('readonly/run/get_member_'.$_GET['get'].'.php');
  if ($_GET['get'] != 'door') {
    echo '<script> try { if ($("bar_id_") != null) { $("bar_id_").id = ""; } $("bar-'.$_GET['get'].'").parentNode.id = "bar_id_"; } catch (err) {} </script>';
  }
} else {
  echo '<div class="output"> 命令错误！请<a href="javascript:window.history.back();">返回</a></div>';
}
  ?>
      </td>
    </tr>
  </table>
</div></div>
<div class="i3">&nbsp;</div>
<div class="i2">&nbsp;</div>
<div class="i1">&nbsp;</div>
</body>
</html>
