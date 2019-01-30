<?php

//@ require ('readonly/function/filter.php');
//$_GET = array_map('filter1', $_GET);

$kw = preg_replace('/javascript\:|[\"\'\<\>\s\r\n]+/i', '', $_GET['kw']);
$is = preg_replace('/javascript\:|[\"\'\<\>\s\r\n]+/i', '', $_GET['is']);
$go = preg_replace('/javascript\:|[\"\'\<\>\s\r\n]+/i', '', $_GET['go']);
$go = preg_replace('/^(?!https?\:\/\/).*$/i', 'http://www.baidu.com/s?ie=utf-8&wd=', $go);
//@ $_GET = array_map('htmlspecialchars', $_GET);


@ require ('writable/set/set.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>集成搜索 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
</head>
<script language="javascript">
<!--
if(navigator.userAgent.indexOf("MSIE")>0){
  var location='';
}
//-->
</script>


<frameset name="bodyFrame" id="bodyFrame" cols="110,*" rows="*" frameborder="yes" border="6" bordercolor="#6699FF" framespacing="3">
  <frame name="leftFrame" id="leftFrame" src="search_left.php?is=<?php echo $is; ?>&kw=<?php echo urlencode($kw); ?>#<?php echo $is; ?>" scrolling="auto" />
  <frame name="resultFrame" id="resultFrame" src="<?php echo $go; ?><?php echo urlencode($kw); ?>" scrolling="auto" />
</frameset>
<noframes>
  <body>这个页面使用了框架，你需要 IE 3.0 或更高版本才能浏览框架！以下是链接入口<br />
    <a href=".">网址导航</a><br />
    <a href="bbs">论坛登入</a><br />
  </body>
</noframes>

</html>
