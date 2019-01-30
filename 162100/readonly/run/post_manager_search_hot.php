<?php
require ('authentication_manager.php');
?>
<?php
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('readonly/function/write_file.php');
@ require ('readonly/function/filter.php');


if ($_POST['act'] == 'all') {
  if ($text = @file_get_contents('writable/js/search.js')) {
    $val = $_POST['all'];

    if ($_POST['filter'] == 'yes') {
      $val = filter2($val);
    } else {
      $val = trim($val);
      $val = preg_replace("/[\r\n\s]+/", " ", $val);
    }

    //$val = preg_replace("/<\/a>\s*<a/i", "</a> <a", $val);
    $val = str_replace("'", "\'", $val);
    if ($val != '') {
      if (!get_magic_quotes_gpc()) {
        $val = addslashes($val);
      }
      $val = stripslashes($val);
    }
    $text = preg_replace('/\/\* search_under_ad \*\/[\r\n\s]*var\s+search_under_ad\s*=\s*\'(.*)\'\s*;[\r\n\s]*\/\* \/search_under_ad \*\//isU', "/* search_under_ad */
var search_under_ad = '".$val."';
/* /search_under_ad */", $text);
    write_file('writable/js/search.js', $text);
  } else {
    err('writable/js/search.js内容没获取到！');
  }
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');

  err('搜索热点关键字编辑完成！', 'ok');

}

$_POST['mod'] = (array)$_POST['mod'];
if (count($_POST['mod']) < 1) {
  err('参数出错！<br />问题分析：<br />1、数据为空');
}

$text = '
var stratSearchHot=new Array();';
foreach ($_POST['mod'] as $key => $val) {

    if ($_POST['filter'] == 'yes') {
      $val = filter2($val);
    } else {
      $val = trim($val);
      $val = preg_replace("/[\r\n\s]+/", " ", $val);
    }

  $val = str_replace("'", "\'", $val);
  //$val = preg_replace("/<\/a>\s*<a/", "</a> <a", $val);
  if ($val != '') {
    if (!get_magic_quotes_gpc()) {
      $val = addslashes($val);
    }
    $text .= '
stratSearchHot[\''.$key.'\']=\''.stripslashes($val).'\';';

  }
}

if (!file_exists('writable/js/search_h.js')) {
  err('待修改的文件不存在或参数传递出错！');
}

write_file('writable/js/search_h.js', $text);
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');

err('搜索热点关键字编辑完成！', 'ok');



?>