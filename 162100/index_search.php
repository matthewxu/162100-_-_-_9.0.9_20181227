<?php

$self = 'index_search.php';

if (!function_exists('get_en_url')) {
  function get_en_url($d) {
    return urlencode(base64_encode($d));
  }
}

/* 简洁版首页 */
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>集成搜索 - <?php echo $web['sitename2']; ?></title>
<meta name="keywords" content="<?php echo $web['keywords']; ?>">
<meta name="description" content="<?php echo $web['description']; ?>">
<base target="_blank" />
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<style type="text/css">
<!--
.right { float:none; }
#head { width: auto; }
#logo { display:none; }
#head_out { border-bottom:none; }
-->
</style>
  </head>

<body>
<?php @ include ('readonly/require/head.php'); ?>
<script type="text/javascript" language="JavaScript">
<!--
$('kw').focus();
function addFocus() {
  $('kw').focus();
};
if (document.all) {
  window.attachEvent('onload', addFocus);
} else {
  window.addEventListener('load', addFocus, false);
};
-->
</script>
<script type="text/javascript" language="JavaScript">
<!--
if(document.getElementById('date_time')!=null){document.getElementById('date_time').innerHTML='<a href="detail.php?column_id=1&class_id=15&detail_title=%E4%B8%87%E5%B9%B4%E5%8E%86" title="农历 '+solarDay2()+'" onmouseover="sSD(this,event);">'+YYMMDD()+' '+weekday()+' '+dateBox+'</a>'}
-->
</script>
<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe>
<script type="text/javascript" language="JavaScript">
<!--
(function(){
  var newDiv=document.createElement('DIV');
  newDiv.id='logo_simple';
  newDiv.style.textAlign='center';
  newDiv.style.margin='60px auto 30px auto';
  newDiv.innerHTML='<a href="./"><img src="writable/images/logo.png" alt="<?php echo $web['sitename2']; ?> - 欢迎您" /></a>';
  document.body.insertBefore(newDiv, $('head_out'));
})();
/*
if (document.all) {
  window.attachEvent('onload', addLogo);
} else {
  window.addEventListener('load', addLogo, false);
};
*/
-->
</script>


<div class="right">
    <script> document.write(myCollection); </script>
</div>
<br />
<br />
<br />
<?php
if (file_exists('writable/chuchuang/ad_bottom_index.txt')) {
  @ include ('writable/chuchuang/ad_bottom_index.txt');
}
?>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>
</body>
<iframe src="PseudoXMLHTTP.php?xml_id=weather&xml_file=<?php echo get_en_url('readonly/weather/getweather.php'); ?>&char=utf-8" style="display:none;" id="sendWeather"></iframe>
<iframe src="PseudoXMLHTTP.php?xml_id=collection&xml_file=<?php echo get_en_url('readonly/run/post_member_collection_show.php'); ?>" style="display:none;"></iframe>

<script type="text/javascript" language="javascript">
var opensugV = getCookie("opensug");
<?php echo file_exists('writable/js/opensug.js') ? '
var opensug = 1;
if (opensugV) {
  if (parseInt(opensugV.substr(0,1)) == 0) {
    opensug = 0;
  }
}
var opensugUrl = \'writable/js/opensug.js?'.filemtime('writable/js/opensug.js').'\';
' : '
var opensug = 0;
if (opensugV) {
  if (parseInt(opensugV.substr(0,1))==1) {
    opensug = 1;
  }
}
var opensugUrl = \'readonly/js/opensug.js\';
'; ?>
if (opensug == 1) {
  document.write('<scr'+'i'+'pt type="text/javascript" language="javascript" src="'+opensugUrl+'"></scr'+'i'+'pt>');
}
</script>
<?php
if ($web['link_type_i'] == 0) {
  @ include ('writable/chuchuang/ad_juejinlian.txt');
}
?>
</html>
