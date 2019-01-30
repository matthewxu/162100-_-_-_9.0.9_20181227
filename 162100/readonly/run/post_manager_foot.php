<?php
require ('authentication_manager.php');
?>
<?php
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

if (!get_magic_quotes_gpc()) {
  $_POST['content'] = addslashes($_POST['content']);
} else {
  $_POST['content'] = $_POST['content'];
}

if ($_POST['act'] == 'foot') {
  @ require ('writable/set/set_html.php');
  if ($web['html'] == true) {
    $style_set_unset = '<div style="background-color:#FF6600; color:#FFF;">你对页脚进行了更改，因为你开启了全静态，为刷新所有静态文件链接模式，请进行<a href="?post=html">一键生成全静态</a>
</div>';
  }
  $_POST['content'] = '
<!--公用页脚-->
<div id="foot"><!--foot-->'.$_POST['content'].'<!--/foot-->
<div id="foot_v"><?php @ include(\'v.txt\'); ?>  &nbsp;&nbsp;Copyright <span class="copy">&copy;</span> <?php echo $web[\'root\']; ?> ,&nbsp;&nbsp;<a href="./" target="_self">返回首页</a> <a href="#" onclick="window.close();return false" target="_self">关闭页面</a>
</div></div>';

} elseif ($_POST['act'] == 'foot_index') {
  $_POST['content'] = '
<!--页脚-->
<div id="foot"> <?php //echo $indexmod==1?\'<a href="index.php">动态首页</a> - \':\'<a href="index.html">静态首页</a> - \'; ?><!--foot-->'.$_POST['content'].'<!--/foot-->
<div id="foot_v"><?php @ include(\'v.txt\'); ?> &nbsp;&nbsp;Copyright <span class="copy">&copy;</span> <?php echo $web[\'root\']; ?> ,&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/"><?php @ include(\'writable/require/icp.txt\'); ?></a> </div></div>';

} else {
  err('传递的文件参数出错！');
}

if (!file_exists('writable/require/'.$_POST['act'].'.php')) {
  err('待修改的文件不存在或参数传递出错！');
}



@ require ('readonly/function/write_file.php');
write_file('writable/require/'.$_POST['act'].'.php', stripslashes($_POST['content']));


if (isset($style_set_unset)) {
  $SET_RELOAD = 1;
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';

} else {
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
}


err('页脚编辑完成！', 'ok');















?>