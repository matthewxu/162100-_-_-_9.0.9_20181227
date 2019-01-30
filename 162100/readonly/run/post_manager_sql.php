<?php
require ('authentication_manager.php');
?>
<?php
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

function filter($text) {
  if (!empty($text) && preg_match('/[\=\s\`\r\n\"\'\\\\(\)]+/', $text)) {
    err('所填内容不能含空格及 = \' " \ ` ( )。');
  }
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
  return $text;
}
$_POST = @array_map('filter', $_POST);

if ($_POST['dbconn'] == '') {
  err('驱动类型不能留空！难道没有被支持的驱动类型？呵呵');
}

if (!(extension_loaded($_POST['dbconn']) && file_exists('readonly/function/php_'.$_POST['dbconn'].'.php'))) {
  err('连接模式：'.$_POST['dbconn'].'不被支持！请切换');
}
if ($_POST['dbtype'] == '') {
  err('服务器类型不能留空！');
}
if ($_POST['dbhost'] == '') {
  err('服务器地址不能留空！');
}
if ($_POST['dbport'] == '') {
  $_POST['dbport'] = 3306;
}
if ($_POST['dbname'] == '') {
  err('数据库名不能留空！');
}
/*
if (preg_match('/^\d+/', $_POST['dbname'])) {
  err('数据库名必须字母开头！因为MySQL有些版本不允许');
}
*/
if ($_POST['dbuser'] == '') {
  err('数据库用户名不能留空！');
}
if ($_POST['dbpswd'] == '') {
  if (empty($_POST['cnp'])) {
    err('数据库密码不能留空！');
  }
}
if (preg_match('/^\d+/', $_POST['dbpref'])) {
  err('数据库表名前缀必须字母开头！因为MySQL有些版本不允许');
}
if (!preg_match('/\_$/', $_POST['dbpref'])) {
  err('数据库表名前缀后面必须加下划线！');
}


if (!$db = db_conn_temp($_POST['dbhost'], $_POST['dbport'], $_POST['dbuser'], "".$_POST['dbpswd']."", $_POST['dbchar'])) {
  err('数据库服务器['.$_POST['dbhost'].':'.$_POST['dbport'].']['.$sql['db_err'].']连接不成功！请检查所填参数正确无误。请返回仔细阅读提示');
}
db_exec($db, 'CREATE DATABASE IF NOT EXISTS '.$_POST['dbname'].' DEFAULT CHARSET '.$_POST['dbchar'].' COLLATE '.$_POST['dbchar'].'_general_ci'); //如果数据库不存在则创建
db_close($db);

$sql['conn'] = $_POST['dbconn'];
$sql['type'] = $_POST['dbtype'];
$sql['host'] = $_POST['dbhost'];
$sql['port'] = $_POST['dbport'];
$sql['user'] = $_POST['dbuser'];
$sql['pass'] = $_POST['dbpswd'];
$sql['name'] = $_POST['dbname'];
//$sql['pref'] = $_POST['dbpref'];
$sql['char'] = $_POST['dbchar'];

$db = db_conn();

if ($db == false) {
  err('数据库['.$_POST['dbname'].']连接不成功！请检查所填的各项参数，确保正确无误');
}
db_exec($db, 'SET NAMES '.$sql['char'].'');

@ require('readonly/function/write_file.php');

write_file('writable/set/set_sql.php','<?php
//数据库配置文件
$sql[\'conn\'] = \''.$_POST['dbconn'].'\'; //数据库连接模式
$sql[\'type\'] = \''.$_POST['dbtype'].'\'; //服务器类型
$sql[\'host\'] = \''.$_POST['dbhost'].'\'; //服务器地址
$sql[\'port\'] = \''.$_POST['dbport'].'\'; //服务器端口
$sql[\'user\'] = \''.$_POST['dbuser'].'\'; //数据库用户名
$sql[\'pass\'] = \''.$_POST['dbpswd'].'\'; //数据库密码
$sql[\'name\'] = \''.$_POST['dbname'].'\'; //数据库名
$sql[\'pref\'] = \''.$_POST['dbpref'].'\'; //表名前缀
$sql[\'char\'] = \''.$_POST['dbchar'].'\'; //数据表编码
$sql[\'data\'] = array(
\'承载网址数据的表名\' => \'162100\',
\'承载成员档案的表名\' => \'member\',
\'承载财务数据的表名\' => \'myaccount\',
);

$arr_conn = array(\'pdo_mysql\'=>1, \'mysqli\'=>1, \'mysql\'=>1);
if (/*$sql[\'conn\'] && isset($arr_conn[$sql[\'conn\']]) && */extension_loaded($sql[\'conn\']) && file_exists($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/php_\'.$sql[\'conn\'].\'.php\')) {
  require ($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/php_\'.$sql[\'conn\'].\'.php\');
} else {
  unset($arr_conn[$sql[\'conn\']]);
  $sql[\'conn\'] = NULL;
  foreach (array_keys($arr_conn) as $k) {
    if (extension_loaded($k) && file_exists($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/php_\'.$k.\'.php\')) {
      $sql[\'conn\'] = $k;
      break;
    }
  }
  if ($sql[\'conn\'] != NULL) {
    require ($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/php_\'.$sql[\'conn\'].\'.php\');
  } else {
    die(\'&#x60A8;&#x7684;php&#x73AF;&#x5883;&#x6CA1;&#x6709;&#x88C5;&#x8F7D;mysql&#xFF0C;&#x65E0;&#x6CD5;&#x8FD0;&#x884C;&#xFF01;\');
  }
}
unset($arr_conn);

?>');


if ($sql['pref'] != $_POST['dbpref']) {
  foreach ($sql['data'] as $t) {
    db_exec($db, 'ALTER TABLE `'.$sql['pref'].$t.'` RENAME `'.$_POST['dbpref'].$t.'`');
  }
  //echo $sql['db_err'];
  echo '<p><img src="readonly/images/ok.gif" /> 数据表更名成功！</p>';
  @ob_flush();
@flush();
  $sql['pref'] = $_POST['dbpref'];
}


if (isset($_COOKIE['myStyle']) && $web['cssfile'] != $_COOKIE['myStyle']) {
  echo '<script> document.cookie=\'myStyle=; path=/;\'; </script>';
}



if ($_POST['tableset'] == 1) {
  if (!$_POST['beifen'] || count((array)$_POST['beifen']) == 0) {
    err('你没有选择数据表备份源，无法导入数据！但数据库参数配置好了，<a href="?get=sql#mysql_tables">还需要返回另行建表</a>');
  }
  echo '<p>正在处理数据表…如长时间无反应，手动点击<a href="?get=sql#mysql_tables" >建立数据库表</a></p>';
  @ob_flush();
@flush();

  @ require ('readonly/run/post_manager_sql_table_set.php');
}

alert('数据库配置成功！', '?get=sql');
@ob_flush();
@flush();

db_close($db);

?>