<?php
require ('authentication_manager.php');
?>
<?php

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
  if ($_POST['foot_searchbox'] == 1) {
    if (!copy('readonly/require/foot_searchbox.php', 'writable/require/foot_searchbox.php')) {
      err('开启失败！原因：writable/require/目录无写权限');
    }
  } else {
    @ unlink('writable/require/foot_searchbox.php');
  }
  @ require ('writable/set/set_html.php');
  @ require ('readonly/function/write_file.php');

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
  alert('设置成功！', '?get=foot_searchbox');

?>