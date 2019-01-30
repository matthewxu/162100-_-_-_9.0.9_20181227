<?php
//数据库配置文件
$sql['conn'] = 'pdo_mysql'; //数据库连接模式
$sql['type'] = 'mysql'; //服务器类型
$sql['host'] = 'localhost'; //服务器地址
$sql['port'] = '3306'; //服务器端口
$sql['user'] = ''; //数据库用户名
$sql['pass'] = ''; //数据库密码
$sql['name'] = ''; //数据库名
$sql['pref'] = 'daohang_'; //表名前缀
$sql['char'] = 'utf8'; //数据表编码
$sql['data'] = array(
'承载网址数据的表名' => '162100',
'承载成员档案的表名' => 'member',
'承载财务数据的表名' => 'myaccount',
);

$arr_conn = array('pdo_mysql'=>1, 'mysqli'=>1, 'mysql'=>1);
if (/*$sql['conn'] && isset($arr_conn[$sql['conn']]) && */extension_loaded($sql['conn']) && file_exists($GLOBALS['WEATHER_DATA'].'readonly/function/php_'.$sql['conn'].'.php')) {
  require ($GLOBALS['WEATHER_DATA'].'readonly/function/php_'.$sql['conn'].'.php');
} else {
  unset($arr_conn[$sql['conn']]);
  $sql['conn'] = NULL;
  foreach (array_keys($arr_conn) as $k) {
    if (extension_loaded($k) && file_exists($GLOBALS['WEATHER_DATA'].'readonly/function/php_'.$k.'.php')) {
      $sql['conn'] = $k;
      break;
    }
  }
  if ($sql['conn'] != NULL) {
    require ($GLOBALS['WEATHER_DATA'].'readonly/function/php_'.$sql['conn'].'.php');
  } else {
    die('&#x60A8;&#x7684;php&#x73AF;&#x5883;&#x6CA1;&#x6709;&#x88C5;&#x8F7D;mysql&#xFF0C;&#x65E0;&#x6CD5;&#x8FD0;&#x884C;&#xFF01;');
  }
}
unset($arr_conn);

?>