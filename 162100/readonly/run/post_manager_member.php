<?php
require ('authentication_manager.php');
?>
<?php

/* 管理员管理执行 */
/* 162100源码 - 162100.com */
if (POWER != 5) {
  err('该命令必须以管理员身份！');
}

function filter($text) {
  return (!preg_match('/[\s\"\']|^$/', $text) && $text != '');
}

$_POST['id'] = array_unique((array)$_POST['id']);
$_POST['id'] = array_filter($_POST['id'], 'filter');

//$_POST['id'] = array_filter($_POST['id']);
//$_POST['id'] = preg_grep('/^\d+$/', $_POST['id']);

if (count($_POST['id']) == 0) {
  err('参数出错！<br />问题分析：<br />1、您可能未点选<br />2、参数传递出错。');
}

$n1 = 0;

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

$_POST['id'] = str_replace('.', '&#46;', $_POST['id']);
$_POST['id'] = str_replace($web['manager'], '', $_POST['id']);
$_POST['id'] = array_filter($_POST['id']);
if (count($_POST['id']) == 0) {
  err('没有选中项！（不含管理员）');
}

$id_key = '(username="'.implode('" OR username="', $_POST['id']).'")';

@ require ('readonly/function/filter.php');
if (is_numeric($_POST['addfunds']) && $_POST['addfunds'] > 0) {
  foreach ($_POST['id'] as $i) {
    $n1 += db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`description`,`money`,`other`,`date`) VALUES ("'.$i.'","6","'.$_POST['addfunds'].'","'.filter1($_POST['beizhu'], 1).'",DATE_ADD(UTC_TIMESTAMP(), INTERVAL '.floatval($web['time_pos']).' HOUR))');
  }
} elseif (is_numeric($_POST['delfunds']) && $_POST['delfunds'] > 0) {
  foreach ($_POST['id'] as $i) {
    $n1 += db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`description`,`money`,`other`,`date`) VALUES ("'.$i.'","7","-'.$_POST['delfunds'].'","'.filter1($_POST['beizhu'], 1).'",DATE_ADD(UTC_TIMESTAMP(), INTERVAL '.floatval($web['time_pos']).' HOUR))');
  }
} elseif ($_POST['limit'] == 'punished') {
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET check_reg="2" WHERE '.$id_key.'');
  $n1 += db_exec($db, 'DELETE FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE '.$id_key.'');
} elseif ($_POST['limit'] == 'abnormal') {
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET check_reg="3" WHERE '.$id_key.'');
} elseif ($_POST['limit'] == 'warn') {
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET check_reg="4" WHERE '.$id_key.'');
} elseif ($_POST['limit'] == 'del') {
  $n1 += db_exec($db, 'DELETE FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE '.$id_key.'');
  $n1 += db_exec($db, 'DELETE FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE '.$id_key.'');

} else {
  err('命令错误！');
}

db_close($db);

if ($n1 == 0) {
  $out .= '<span class="gray">（程序执行不完全或不成功！['.$sql['db_err'].']）</span>';
}

alert('执行完毕。'.$out, $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : 'webmaster_central.php?get=member');




?>