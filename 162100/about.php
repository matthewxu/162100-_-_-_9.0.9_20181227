<?php
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于本站 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./">首页</a><a id="top_title_is"><?php echo isset($_GET['newcode']) && $_GET['newcode'] == 1?'关于本站程序':'关于我们'; ?></a></div>



<style>

pre {
white-space: pre-wrap;
word-wrap: break-word;
}

</style>
<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr>
      <td><?php
if (isset($_GET['newcode']) && $_GET['newcode'] == 1) {
  echo '<pre>'.file_get_contents('read.txt').'</pre>';
} elseif (isset($_GET['statement']) && $_GET['statement'] == 1) {
  echo '<pre>'.file_get_contents('writable/require/statement.txt').'</pre>';
} else {
  @ include ('writable/require/about.txt');
}
?></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

</body>
</html>