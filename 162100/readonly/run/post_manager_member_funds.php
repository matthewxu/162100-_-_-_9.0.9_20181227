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

$_POST['id'] = array_unique((array)$_REQUEST['id']);
$_POST['id'] = array_filter($_POST['id'], 'filter');
$_POST['id'] = preg_grep('/^\d+$/', $_POST['id']);

//$_POST['id'] = array_filter($_POST['id']);

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


$id_key = '(id="'.implode('" OR id="', $_POST['id']).'")';

if ($_POST['limit'] == 'del') {
  $n1 += db_exec($db, 'DELETE FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE '.$id_key.'');

} elseif ($_REQUEST['limit'] == 'cash_o') {
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' SET other="已经支付'.htmlspecialchars($_REQUEST['remark']).'" WHERE '.$id_key.' AND description="0" AND other LIKE "%尚未支付%" AND fettle="0"');
  if ($_REQUEST['ctype'] == 'a') {
    echo '<script> document.getElementById("transition").style.display="none"; <'.'/'.'script>';
    echo '<script> try{ parent.$(\'other_'.$_POST['id'][0].'\').innerHTML="已经支付'.htmlspecialchars($_REQUEST['remark']).'"; }catch(err){} </script>';
    echo '</div></body></html>';
    exit;
  }

} elseif ($_REQUEST['limit'] == 'fettle_no') {
  $_POST['fettle_bar'] = abs($_POST['fettle_bar']) == 0 ? 1 : abs($_POST['fettle_bar']);
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' SET fettle="'.$_POST['fettle_bar'].'" WHERE '.$id_key.' AND fettle="0"');
  if ($_REQUEST['ctype'] == 'a') {
    echo '<script> document.getElementById("transition").style.display="none"; <'.'/'.'script>';
    echo '<script> var obj=parent.$(\'funds_'.$_REQUEST['id'][0].'\'); var par=obj.parentNode; par.removeChild(obj); </script>';
    echo '<div style="text-align:left">载入中…</div></div></body></html>';
    exit;
  }

} elseif ($_REQUEST['limit'] == 'fettle_yes') {
  $n1 += db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' SET fettle="0" WHERE '.$id_key.' AND fettle<>"0"');
  if ($_REQUEST['ctype'] == 'a') {
    echo '<script> document.getElementById("transition").style.display="none"; <'.'/'.'script>';
    echo '<script> var obj=parent.$(\'funds_'.$_REQUEST['id'][0].'\'); var par=obj.parentNode; par.removeChild(obj); </script>';
    echo '<div style="text-align:left">载入中…</div></div></body></html>';
    exit;
  }

} else {
  err('命令错误！');
}

db_close($db);

if ($n1 == 0) {
  $out .= '<span class="gray">（程序执行不完全或不成功！['.$sql['db_err'].']）</span>';
}

alert('执行完毕。'.$out, $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : 'webmaster_central.php?get=member_funds');




?>