<?php
require ('authentication_manager.php');
?>
<?php

  /*上传图片*/
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


$_POST['imgname'] = preg_replace('/(\.[^\.]+)$/', '', $_POST['imgname']);
if ($_POST['imgname'] == '') {
  err('图片名称不能空！');
}

if (!preg_match('/^[\w\-]+$/', $_POST['imgname'])) {
  err('图片名称只允许输入字母、数字、下划线、中划线');
}

if ($_POST['imgdir'] != '') {
  $_POST['imgdir'] = rtrim($_POST['imgdir'], '/');
  if(!preg_match('/^[\w\-\/]+$/', $_POST['imgdir'])) {
    err('上传目录只允许输入字母、数字、_ - / ，否则留空为根目录');
  }
  if (!file_exists($_POST['imgdir'])) {
    @ require ('readonly/function/createdir.php');
    createdir($_POST['imgdir']);
  }
  $_POST['imgdir'] = $_POST['imgdir'].'/';
}

if (!empty($_POST['imgw']) && is_numeric($_POST['imgw']) && $_POST['imgw'] > 0 && !empty($_POST['imgh']) && is_numeric($_POST['imgh']) && $_POST['imgh'] > 0) {
  $xywh = $_POST['imgc'] == 1 ? 1 : false;
}

/*
$inis = ini_get_all();
$uploadmax = $inis['upload_max_filesize'];
[global_value] => 2M
[local_value] => 2M
[access] => 6
*/

if (!is_array($_FILES['uploadfile']) || !$_FILES['uploadfile']['size']) {
  err('提示：上传logo出现空值！请选择有效图片');
}

$max_size = 1024*1024;
if ($_FILES['uploadfile']['size'] > $max_size) {
  err('提示：上传的文件请小于'.($max_size/1024/1024).'MB。');
}
if (!preg_match('/\.(gif|jpg|png)$/i', $_FILES['uploadfile']['name'], $im)) {
  err('提示：上传请选择一个有效的文件：允许的格式有（gif|jpg|png）。');
}

$upload_filename = $_POST['imgname'].'.'.strtolower($im[1]);

if ($fp = @fopen($_FILES['uploadfile']['tmp_name'], 'rb')) {
  $img_contents = @fread($fp, $_FILES['uploadfile']['size']);
  @fclose($fp);
} else {
  $img_contents = @file_get_contents($_FILES['uploadfile']['tmp_name']);
}
if (preg_match('/<\?php|eval|POST|base64_decode|base64_encode/i', $img_contents, $m_err)) {
  err('提示！禁止提交。该文件含有禁止的代码'.str_replace('?', '\?', $m_err[0]).'。');
}

if (@move_uploaded_file($_FILES['uploadfile']['tmp_name'], $_POST['imgdir'].$upload_filename)) {

  if (isset($xywh)) {
    @ require ('readonly/function/img.php');
    run_img_resize($_POST['imgdir'].$upload_filename, $_POST['imgdir'].$upload_filename, 0, 0, $_POST['imgw'], $_POST['imgh'], 0, 0, 80, $xywh);
  }

if($_POST['imgdir'].$upload_filename=='writable/images/logo.png'){
  @ require ('readonly/function/write_file.php');
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');
}
  err('图片上传成功！<br /><br />
<a href="'.$_POST['imgdir'].$upload_filename.'" target="_blank"><img src="'.$_POST['imgdir'].$upload_filename.'" /></a><br />
图片路径为：<a href="'.$_POST['imgdir'].$upload_filename.'" target="_blank">'.$_POST['imgdir'].$upload_filename.'</a><br />
（注：如未显示新上传的图片，请刷新一下。若仍不显示，请清除浏览器缓存）
<br />
', 'ok');
} else {
  err('提示：上传出现错误！请暂时停止上传。');
}




?>