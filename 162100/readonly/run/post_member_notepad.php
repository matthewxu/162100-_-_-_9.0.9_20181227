<?php
require ('authentication_member.php');
?>
<?php
//过滤主题
function filter1($text) {
  //$text = trim($text);
  //$text = stripslashes($text);
  $text = htmlspecialchars($text);
  $text = preg_replace("/\r\n/", "\n", $text);
  $text = preg_replace("/\r/", "", $text);
  $text = str_replace('\"', '&quot;', $text);
  $text = str_replace('\'', '&#039;', $text);
  $text = str_replace('\\', '&#92;', $text);
  return $text;
}
$GLOBALS['WEATHER_DATA'] = '../../';
@ require ('../../writable/set/set_sql.php');
@ require ('../../readonly/function/confirm_power.php');
define('POWER', confirm_power('../../'));


$_POST['content'] = get_magic_quotes_gpc() ? stripslashes($_POST['content']) : $_POST['content'];

$content = substr(filter1($_POST['content']), 0, 50000);

if (POWER > 0) {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    //操作前再深层判断一下权限，v3.3加
    if ($session[1].'|'.$session[2] == get_session_key()) {
      db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` SET notepad="'.addslashes(trim($content)).'" WHERE username="'.$session[0].'" LIMIT 1');
    }
  }
  db_close($db);
}
?>