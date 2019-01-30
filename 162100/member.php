<?php

/* 用户后台 */
/* 162100源码 - 162100.com */


@ require('writable/set/set.php');
@ require('writable/set/set_sql.php');
@ require ('readonly/function/confirm_power.php');
define('POWER', confirm_power());


function get_en_url($d) {
  //$arr = @explode('/', $d);
  //$arr = array_map('urlencode', $arr);
  //return @implode('%2F', $arr);
  return urlencode(base64_encode($d));
}

$post = !empty($_POST['post']) ? $_POST['post'] : (!empty($_GET['post']) ? $_GET['post'] : false);
$post = preg_replace('/[^0-9a-zA-Z_]+/i', '', $post);
if (!empty($post)) {
  @ require ('readonly/function/reset_indexhtml.php');
  //一次性输出信息
  function alert($text = '', $href) {
    global $web;
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>程序执行</title>
<link href="readonly/css/style.css" rel="stylesheet" type="text/css">
<link href="readonly/css/'.$web['cssfile'].'/style.css" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
html { width:100%; height:100%; text-align:center; background:none; border:none;  padding:0; }
body { width:720px; height:100%; margin:0 auto; padding:0; border-top:none; margin-top:0; background:url(readonly/images/loading.gif) 50% 50% no-repeat; border:none; }
#transition { text-align:center; margin:auto; }
.wherego { margin:10px auto; background-color:#FFFFFF; }
.wherego td { width:50%; font-size:12px; word-wrap:break-word; word-break:break-all; }
.wherego td.whereyou { text-align:right; }
-->
</style>
<script type="text/javascript" language="javascript" src="writable/js/main.js?'.filemtime('writable/js/main.js').'"></script>
</head>
<body>
<table id="transition" width="720" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="output"><p><img src="readonly/images/ok.gif" /> '.$text.'</p>
        <p>或点击以下链接进入...<a href="'.$href.'"'.(!strstr($href, '_current') ? ' onclick="if(parent && parent.document.getElementById(\'addCFrame\')!=null){this.target=\'_parent\';}else{this.parent=\'_self\';}"' : '').'>'.$href.'</a></p></div>
    </td>
  </tr>
</table>
<style type="text/css">
<!--
/*#transition { background:#FFFFFF; }*/
-->
</style>
<script language="javascript" type="text/javascript">
<!--
function displayBg(){
  document.body.style.background="none";
}
  if (document.all) {
    window.attachEvent("onload", displayBg);
  } else {
    window.addEventListener("load", displayBg, false);
  }

-->
</script>
<script language="javascript" type="text/javascript">
<!--
'.(!strstr($href, '_current') ? '
var ltp=(parent && parent.document.getElementById(\'addCFrame\')!=null) ? "parent." : "";
setTimeout(""+ltp+"location.href=\''.$href.'\';", 5000);
' : '
setTimeout("location.href=\''.$href.'\';", 5000);
').'
-->
</script>
</body>
</html>';
    die;
  }

  //一次性输出错误
  function err($text = '', $src = 'i') {
    global $web;
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>程序执行</title>
<link href="readonly/css/style.css" rel="stylesheet" type="text/css">
<link href="readonly/css/'.$web['cssfile'].'/style.css" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
html { width:100%; height:100%; text-align:center; background:none; border:none;  padding:0; }
body { width:720px; height:100%; margin:0 auto; padding:0; border-top:none; margin-top:0; background:url(readonly/images/loading.gif) 50% 50% no-repeat; border:none; }
#transition { text-align:center; margin:auto; }
.wherego { margin:10px auto; background-color:#FFFFFF; }
.wherego td { width:50%; font-size:12px; word-wrap:break-word; word-break:break-all; }
.wherego td.whereyou { text-align:right; }
-->
</style>
<script type="text/javascript" language="javascript" src="writable/js/main.js?'.filemtime('writable/js/main.js').'"></script>
</head>
<body>
<table id="transition" width="720" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="output"><p><img src="readonly/images/'.$src.'.gif" /> '.$text.'</p>
        <p>点此可<a href="javascript:window.history.back();">返回</a></p></div>
    </td>
  </tr>
</table>
<style type="text/css">
<!--
/*#transition { background:#FFFFFF; }*/
-->
</style>
<script language="javascript" type="text/javascript">
<!--
function displayBg(){
  document.body.style.background="none";
}
  if (document.all) {
    window.attachEvent("onload", displayBg);
  } else {
    window.addEventListener("load", displayBg, false);
  }

-->
</script>
</body>
</html>';
    die;
  }
/*
  if ($_SERVER['HTTP_REFERER'] && strpos($_SERVER['HTTP_REFERER'], $web['sitehttp']) !== 0) {
    err('跨域操作越权！');
  }
*/
  //echo str_repeat(' ', 4096);
  //@ob_flush();
  //@flush();

  if ($post != false && file_exists('readonly/run/post_member_'.$post.'.php')) {
    @ require ('readonly/run/post_member_'.$post.'.php');
  } else {
    err('命令错误或功能尚未开通！');
  }
  die;
}


















if (POWER == 0.5) {
  session_start();
}

$power_url = array(
  'file'            => '我的帐户',
  'funds'           => '我的收入', //取决于$web['addfunds'] == 1
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

if (!empty($_GET['get'])) {
  if ($_GET['get'] == 'search_site') {
    $power_url['search_site'] = '站内搜索';
  }
  //if (array_key_exists($_GET['get'], $power_url)) {
  if (isset($power_url[$_GET['get']])) {
    echo ' - '.strip_tags($power_url[$_GET['get']]);
    $nav = '<a href="member.php">用户控制台</a><a id="top_title_is">'.$power_url[$_GET['get']].'</a>';
  } else {
    $_GET['get'] = 'door';
    $nav = '<a id="top_title_is">用户控制台</a>';
  }
} else {
  $_GET['get'] = 'door';
  $nav = '<a id="top_title_is">用户控制台</a>';
}

echo ' - '.$web['sitename2'], $web['code_author'];
?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
h5.list_title { margin:0; margin-bottom:10px; height:28px; line-height:28px; border-bottom:1px #D8D8D8 solid; clear:both; }
h5.list_title a { height:26px; font-weight:normal; display:inline-block !important; display:inline; zoom:1; padding:0 15px; text-align:center; text-decoration:none; background-color:#FFFFFF; }
h5.list_title a.list_title_in { font-weight:bold; height:28px; border:1px #D8D8D8 solid; border-bottom:none; color:#333333; }
.note { margin-bottom:10px; padding:5px 10px; border:1px #EEEEEE solid; font-size:12px; overflow:hidden; clear:both; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./">首页</a><?php echo $nav; ?></div>

<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe>
<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left">
<?php
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
      <td class="menu_right">
<?php
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
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

</body>
</html>
