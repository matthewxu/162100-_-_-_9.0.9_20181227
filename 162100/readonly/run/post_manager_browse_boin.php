<?php
require ('authentication_manager.php');
?>
<?php
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

/*
if (function_exists('apache_get_version')) {
  if (!stristr(@apache_get_version(), 'Apache')) {
    err('您的服务器不是Apache！不支持此功能');
  }
}
*/

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  if (@file_exists('readonly/data/web.config') && ($fch = @file_get_contents('readonly/data/web.config')) && (strstr($fch, '<urlCompression') && strstr($fch, '<clientCache'))) {
    $a_show = '你的程序已安装该模块功能';
  } else {
    $a_show = '本版本未安装。请联系作者定制';
  }
} else {
  if (@file_exists('readonly/data/.htaccess') && ($fch = @file_get_contents('readonly/data/.htaccess')) && (strstr($fch, '<IfModule mod_deflate.c>') && strstr($fch, '<IfModule mod_expires.c>'))) {
    $a_show = '你的程序已安装该模块功能';
  } else {
    $a_show = '本版本未安装。请联系作者定制';
  }
}


err('提示：<br />

<p align="left"><b>以下功能：</b></p>
<p>&nbsp;</p>
<p align="left"><b>1、网页缓存加速</b></p>
<p align="left">将网页缓存在客户端，即使脱机（断网）仍可正常浏览你的首页；同时网页素件缓存于客户端，使网页载入速度大大加速。</p>
<p align="left"><b>2、网页压缩加速</b></p>
<p align="left">开启Gzip网页压缩技术，将较大的网页尺寸合理压缩，使网页载入速度大大加速。</p>
<p>&nbsp;</p>
<p align="left">'.$a_show.'。</p>
');


?>