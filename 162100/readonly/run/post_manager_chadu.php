<?php
require ('authentication_manager.php');
?>
<style type="text/css">
<!--
.du_list {text-align:left; color:#333333; padding-left:10px; padding-right:10px; }
.du_list a { color: #0066CC; text-decoration:underline; }
.du_text {text-align:left;background-color:#FFFFFF; font-size:12px; color:#999999; padding-left:48px; padding-right:48px; }
-->
</style>

<?php

$cnum1 = count($_POST['du']);

if ($cnum1 == 0) {
  err('关键词输入不能空！');
}
if ($cnum1 > count(array_unique($_POST['du']))) {
  err('关键词发现有重复！');
}
if ($cnum1 > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['du'])))) {
  err('不能有空的输入！');
}

$reg = array();
foreach ($_POST['du'] as $v) {
  $v = trim($v);
  $v = preg_quote($v, '/');
  $v = preg_replace('/\s+/', '\s*', $v);
  $reg[] = $v;
}
$reg_str = implode('|', $reg);
//echo $reg_str;die;
require ('readonly/function/cutstr.php');


//删除目录
function read_dir($dir) {
  global $reg_str;
  $s = '';
  if (!file_exists($dir)) die('no dir');
  if ($fp = @opendir($dir)) {
    while (false !== ($file = @readdir($fp))) {
      if ($file != '.' && $file != '..') {
        if (is_dir($dir.'/'.$file)) {
          $s .= read_dir($dir.'/'.$file);
        } else {
/*
          if ($dir.'/'.$file == './readonly/run/post_manager_chadu.php' || $dir.'/'.$file == './readonly/run/post_manager_set.php' || $dir.'/'.$file == './writable/set/set.php') {
            continue;
          }
*/
          if ($f = file_get_contents($dir.'/'.$file)) {
            if (preg_match('/(.*)('.$reg_str.')(.*)/i', $f, $m)) {
              $pathfile = ltrim($dir.'/'.$file, './');
              $s .= '
<div class="du_list">在文件 <a href="?get=modify&otherfile='.get_en_url($pathfile).'">'.$pathfile.'</a> 中：</div>
<div class="du_text">'.cutstr(htmlspecialchars($m[1]), 200).'<span class="redword">'.htmlspecialchars($m[2]).'</span>'.cutstr(htmlspecialchars($m[3]), 200).'</div>';
            }
          }
        }
      }
    }
    if (readdir($fp) == false) {
      @closedir($fp);
    }
  }
  return $s;
}


$dir = '.';
$s = read_dir($dir);

if ($s != '') {
  err('有如下发现：<br />'.$s);
} else {
  err('没有发现', 'ok');
}



?>