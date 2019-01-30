<?php
require ('authentication_manager.php');
?>
<?php

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
    @ require ('readonly/function/write_file.php');

$_POST['referrer_top'] = (string)$_POST['referrer_top'];
if ($_POST['referrer_top'] == "1") {
  $o = '开启';
  if (!copy('readonly/js/referrer_top.js', 'writable/js/referrer_top.js')) {
    err('开启来路链接失败！原因：writable/js/目录无写权限');
  }
} elseif ($_POST['referrer_top'] == "2") {
  $o = '清空';
  if ($text = file_get_contents('writable/js/referrer_top.js')) {
    $text = preg_replace('/(var[\s\r\n]+referrerTop[\s\r\n]*=[\s\r\n]*\{)(.*)(\})/isU', 'var referrerTop={
}', $text);
    write_file('writable/js/referrer_top.js', $text);
  }

} else {
  $o = '关闭';
  @ unlink('writable/js/referrer_top.js');
}

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');

alert('来路链接'.$o.'成功！', '?get=welcome');

?>