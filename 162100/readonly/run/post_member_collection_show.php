<?php
//栏目分类设置
//获取我的收藏

if (file_exists('writable/set/set.php')) {
  $GLOBALS['WEATHER_DATA'] = '';
} else {
  $GLOBALS['WEATHER_DATA'] = '../../';
}
if (!isset($web)) {
  require ($GLOBALS['WEATHER_DATA'].'writable/set/set.php');
}
if (!isset($sql)) {
  @ require ($GLOBALS['WEATHER_DATA'].'writable/set/set_sql.php');
}
if (!function_exists('confirm_power')) {
  @ require ($GLOBALS['WEATHER_DATA'].'readonly/function/confirm_power.php');
  define('POWER', confirm_power($GLOBALS['WEATHER_DATA']));
}
$_GET = array_map('htmlspecialchars', preg_replace('/[\r\n]+/i', '', $_GET));

//if (isset($_GET['username']) && !empty($_GET['username'])) {
//  $user = str_replace('.', '&#46;', $_GET['username']);
//} else {
  if (POWER > 0) {
    $user = $session[0];
  }
//}
if (isset($user)) {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT collection FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$user.'" LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;
    if (is_array($row) && count($row) > 0) {
      //$row['collection'] = preg_replace('/<\/?(li|span)>/i', '', $row['collection']);
      $row['collection'] = preg_replace('/<(\/?)span>/i', '<$1li>', $row['collection']);
      $row['collection'] = trim($row['collection']);
      $text = !empty($row['collection']) ? $row['collection'] : '';
    }
  }
  db_close($db);
echo '<li class="class_name"><a>收藏</a></li>';
echo isset($text) && $text != '' ? $text : '<li style="color:#999999">暂无收藏的网站</li>';
echo '<li><a href="member_current.php?get=collection" onclick="addSubmitSafe();" target="addCFrame"><b class="orangeword">+</b></a></li>';
//echo isset($text) && $text != '' ? $text : '暂无收藏 <style> #collection { display:none; } </style>';

} else {
  echo '登录用户才能查询结果！';
}






















?>