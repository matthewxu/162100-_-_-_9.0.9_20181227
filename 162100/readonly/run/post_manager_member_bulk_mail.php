<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置
if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}

err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); </script>');



?>