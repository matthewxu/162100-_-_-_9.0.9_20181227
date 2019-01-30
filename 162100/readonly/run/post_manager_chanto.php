<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置


function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  //$text = str_replace('/', '&#47;', $text);
  return $text;
}
if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}
@ require ('writable/set/set_area.php');
//if (!(isset($_GET['column_id']) && array_key_exists($_GET['column_id'], $web['area']))) {
if (!(isset($_GET['column_id']) && isset($web['area'][$_GET['column_id']]))) {
  err('<script> alert("始发频道参数缺失或错误"); </script>');
}
//if (!(isset($_GET['class_id']) && array_key_exists($_GET['class_id'], $web['area'][$_GET['column_id']]))) {
if (!(isset($_GET['class_id']) && isset($web['area'][$_GET['column_id']][$_GET['class_id']]))) {
  err('<script> alert("始发栏目参数缺失或错误"); </script>');
}
$_GET['class_title'] = filter(htmlspecialchars($_GET['class_title']));
if(empty($_GET['class_title'])){
  err('<script> alert("始发分类名不能空！"); </script>');
}
$_GET['detail_title'] = filter(htmlspecialchars($_GET['detail_title']));
if(empty($_GET['detail_title'])){
  err('<script> alert("始发专题名不能空！"); </script>');
}

list($column_id,$class_id)=@explode('_',$_POST['siteclass']);
//if(@!array_key_exists($column_id,$web['area']))
if(!isset($web['area'][$column_id]))
  err('<script> alert("频道参数出错！"); </script>');
//if(@!array_key_exists($class_id,$web['area'][$column_id]))
if(!isset($web['area'][$column_id][$class_id]))
  err('<script> alert("栏目参数出错！"); </script>');

list($class_title,$class_title_mark)=@explode('_',$_POST['sitetitle']);
$class_title=filter(htmlspecialchars(urldecode($class_title)));
if(empty($class_title)){
  err('<script> alert("分类不能空！"); </script>');
}


if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

$result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND (class_title="'.$class_title.'" AND http_name_style="") AND detail_title LIKE "'.$_GET['detail_title'].'|%"');
$row = db_fetch($db, $result);
if (abs($row['total']) > 0) {
  err('<script> alert("彼岸同名专题已存在！"); </script>');
}
$result = NULL;
unset($row);

$n1 = db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET column_id="'.$column_id.'",class_id="'.$class_id.'",class_title='.db_escape_string($db, $class_title).' WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.$_GET['class_title'].'" AND (http_name_style="" AND class_priority<>"") AND detail_title LIKE "'.$_GET['detail_title'].'|%"'); //更新专题引导

$n2 = db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET column_id="'.$column_id.'",class_id="'.$class_id.'" WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title LIKE "'.$_GET['detail_title'].'|%"'); //更新专题附属


//if ($n1 > 0 && $n2 > 0) {
  $result = db_query($db, 'SELECT detail_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title="'.$class_title.'" AND (http_name_style="" AND class_priority<>"") AND detail_title LIKE "'.$_GET['detail_title'].'|%" LIMIT 1');
  $row = db_fetch($db, $result);
  list($detail_title, $dpy, $dside) = @explode('|', $row['detail_title']);
  unset($row);
  $result = NULL;

  if ($dpy) {
    $url = $dpy.'.html';
    $result = db_query($db, 'SELECT id,http_name_style FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title LIKE "'.$_GET['class_title'].'|%" AND detail_title="" LIMIT 1'); //从原来的栏目列表中去除专题
    if ($row = db_fetch($db, $result)) {
      $row['http_name_style'] = preg_replace('/.*'.preg_quote($url, '/').'\|[^\r\n]+[\r\n]+/', '', $row['http_name_style']);
      db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET http_name_style='.db_escape_string($db, $row['http_name_style']).' WHERE id="'.$row['id'].'"');
      unset($row);
    }
    $result = NULL;

    $result = db_query($db, 'SELECT id,http_name_style FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.$class_title.'|%" AND detail_title="" LIMIT 1'); //将专题加入新的栏目列表中
    if ($row = db_fetch($db, $result)) {
      $row['http_name_style'] = preg_replace('/.*'.preg_quote($url, '/').'\|[^\r\n]+[\r\n]+/', '', $row['http_name_style']);
      $row['http_name_style'] = $row["http_name_style"]."".$url."|".$_GET['detail_title']."||\n";
      db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET http_name_style='.db_escape_string($db, $row['http_name_style']).' WHERE id="'.$row['id'].'"');
      unset($row);
    }
    $result = NULL;
  }

//}

db_close($db);
$column_id_old = $_GET['column_id'];
$class_id_old = $_GET['class_id'];
$detail_title = $_GET['detail_title'];

@ require ('readonly/function/write_file.php');
$_GET['column_id'] = $column_id_old;
$_GET['class_id'] = $class_id_old;
reset_indexhtml('class.php', $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');
$_GET['column_id'] = $column_id;
$_GET['class_id'] = $class_id;
reset_indexhtml('class.php', $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');
$_GET['column_id'] = $column_id;
$_GET['class_id'] = $class_id;
$_GET['detail_title'] = $detail_title;
reset_indexhtml('detail.php', $dpy.'.html');

reset_indexhtml('index.php', 'index.html');

err('<script> alert("转移完毕");
try { var pC = parent.$("'.$column_id_old.'_'.$class_id_old.'_'.urlencode($_GET['class_title']).'_'.urlencode($detail_title).'"); pC.parentNode.removeChild(pC); } catch (e) {}
try { parent.$("chanto").style.display="none"; } catch (e) {} </script>');
















?>