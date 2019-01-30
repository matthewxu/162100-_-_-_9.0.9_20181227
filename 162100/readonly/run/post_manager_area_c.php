<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类转移
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('writable/set/set_area.php');
@ require ('readonly/function/filter.php');

$_POST['class_name_fr'] = filter1($_POST['class_name_fr']);
$_POST['class_name_to'] = filter1($_POST['class_name_to']);
if (empty($_POST['class_name_fr'])) {
  err('起始小类不能空！');
}
if (empty($_POST['class_name_to'])) {
  err('目标小类不能空！');
}
if ($_POST['class_name_fr'] == $_POST['class_name_to']) {
  err('不能重名！');
}
//print_r($_POST);die;
$k_fr = explode('_', $_POST['class_name_fr']);
$k_to = explode('_', $_POST['class_name_to']);
//if (!(array_key_exists($k_fr[0], $web['area']) && array_key_exists($k_fr[1], $web['area'][$k_fr[0]]))) {
if (!(isset($web['area'][$k_fr[0]]) && isset($web['area'][$k_fr[0]][$k_fr[1]]))) {
  err('起始小类不存在！');
}
//if (!(array_key_exists($k_to[0], $web['area']) && array_key_exists($k_to[1], $web['area'][$k_to[0]]))) {
if (!(isset($web['area'][$k_to[0]]) && isset($web['area'][$k_to[0]][$k_to[1]]))) {
  err('目标小类不存在！');
}

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}
if ($_POST['type'] == '1') {
  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' SET column_id="'.$k_to[0].'_reset",class_id="'.$k_to[1].'_reset" WHERE column_id="'.$k_fr[0].'" AND class_id="'.$k_fr[1].'"');
  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' SET column_id="'.$k_fr[0].'",class_id="'.$k_fr[1].'" WHERE column_id="'.$k_to[0].'" AND class_id="'.$k_to[1].'"');
  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' SET column_id="'.$k_to[0].'",class_id="'.$k_to[1].'" WHERE column_id="'.$k_to[0].'_reset" AND class_id="'.$k_to[1].'_reset"');

} else {
  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' SET column_id="'.$k_to[0].'",class_id="'.$k_to[1].'" WHERE column_id="'.$k_fr[0].'" AND class_id="'.$k_fr[1].'"');
}


db_close($db);

@ require ('readonly/function/write_file.php');
reset_indexhtml('index.php', 'index.html');
$_GET['column_id'] = $k_fr[0];
$_GET['class_id'] = $k_fr[1];
reset_indexhtml('class.php', $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');
$_GET['column_id'] = $k_to[0];
$_GET['class_id'] = $k_to[1];
reset_indexhtml('class.php', $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');

alert('栏目分类转移成功！', 'webmaster_central.php?get=area');






?>