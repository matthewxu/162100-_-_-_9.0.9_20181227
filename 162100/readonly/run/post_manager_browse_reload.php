<?php
require ('authentication_manager.php');
?>
<?php
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


@ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
echo '<script> setCookie(\'weathercity\',\'\',-366); </script>';
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
@ require ('readonly/function/write_file.php');
write_file('writable/require/browse_reload.txt', $id);

reset_indexhtml('index.php', 'index.html');
err('清除缓存命令已发出！', 'ok');



?>