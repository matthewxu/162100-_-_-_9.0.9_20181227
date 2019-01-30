<?php
@ require ('writable/set/set.php');
$sbar_n = 3;
@ $_GET['type'] = abs($_GET['type']);
if (!($_GET['type'] && is_int($_GET['type']) && $_GET['type'] >=1 && $_GET['type'] <= $sbar_n)) {
  $_GET['type'] = '1';
}
$text = '';
if ($sbar_n > 0) {
  for($i=1; $i<=$sbar_n; $i++) {
    $text .= '<a href="?type='.$i.'"'.($i==$_GET['type']?' style="font-weight:bold;"':'').'>样式'.$i.'</a> &nbsp; ';
  }
} else {
  die('&#x6CA1;&#x6709;&#x53D1;&#x73B0;&#x641C;&#x7D22;&#x5F15;&#x64CE;&#x6837;&#x5F0F;&#x6A21;&#x677F;&#xFF01;');
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索引擎样式<?php echo $_GET['type']; ?></title>
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
html {margin:0; padding:0; }
body {border:none; margin:0; padding:0; background-color:#FFF; }
#head { width:900px; }
#search { width:760px; float:none; width:auto; position:static; text-align:center; margin:auto; }
#search_body { float:none; margin:auto; }
.forQQ1 { margin-bottom: auto; }
.forQQ_1 { height: auto; width: auto; position: static; }
.forQQ2 { margin-bottom: auto; }
.forQQ_2 { height: auto; width: auto; position: static; }
.forQQ3 { }

-->
</style></head>

<body>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <script>

if(passK=getCookie('searchBarBody')){
  setCookie('searchBarBody','',-365);

}


    </script>

<div id="head_out">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="head">
    <tr>
    <td id="search_">
    <script> var defaultBayId = '<?php echo $_GET['type']; ?>'; </script>
    <script type="text/javascript" language="javaScript" src="writable/js/search_h.js?<?php echo filemtime('writable/js/search_h.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="writable/js/search.js?<?php echo filemtime('writable/js/search.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="readonly/js/search.js?<?php echo filemtime('readonly/js/search.js'); ?>"></script>
    <script> addsearchBar(search_default_type, search_default_id); </script>
    </td>
    </tr>
  </table>
</div>
    <script>

setCookie('searchBarBody',passK,365);

    </script>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
<div style="clear:both"><?php echo $text; ?></div>
</body>
</html>
