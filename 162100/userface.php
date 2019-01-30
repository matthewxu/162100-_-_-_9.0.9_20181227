<?php

/* PHP输出图片 */


@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
$face_text = '';

if (!empty($_GET['u'])) {
  @ require ('readonly/function/filter.php');
  $username = filter1(strtolower($_GET['u']));
} else {
  @ require ('readonly/function/confirm_power.php');
  define('POWER', confirm_power());
  if (POWER > 0) {
    $username = $session[0];
  }
}
if ($username) {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT face FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$username.'" LIMIT 1');
	if ($row = db_fetch($db, $result)) {
      $face_text = $row['face'];
      unset($row);
    }
    $result = NULL;
  }
  db_close($db);
}

if ($face_text != '') {
  @ require ('writable/set/set_userface.php');
  $web['img_up_format'] == strtolower($web['img_up_format']);
  if ($web['img_up_format'] != 'jpg' && $web['img_up_format'] != 'gif' && $web['img_up_format'] != 'png') {
    $web['img_up_format'] = 'gif';
  }
  //header("Cache-Control: max-age=31536000");
  header('Content-type: image/'.($web['img_up_format'] == 'jpg' ? 'jpeg' : $web['img_up_format']).'');
  echo $face_text;
} else {
  header('Location: readonly/images/userface_default.gif');
}

?>