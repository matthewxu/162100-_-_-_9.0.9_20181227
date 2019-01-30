<?php
@ini_set('default_charset', 'utf-8');
@ini_set('display_errors', false);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$_GET = preg_replace('/[\r\n\'\"\>\<\&]+/i', '', $_GET);


if (!function_exists('decode162100')) {
  function decode162100($text){
    return trim(base64_decode($text), '|');
  }
}

/* ----------【网站设置】能不用尽量不要用特殊符号，如 \ / : ; * ? ' < > | ，必免导致错误--------- */

if (!isset($GLOBALS['WEATHER_DATA'])) {
  if (file_exists('writable/set/set.php')) {
    $GLOBALS['WEATHER_DATA'] = '';
  } else {
    $GLOBALS['WEATHER_DATA'] = '../../';
  }
}

//基本设置：

$web['manager'] = 'admin';  //基础管理员名称
$web['password'] = 'aa7e25f80cf4f64e990b78a9fc5ebd6c';  //基础管理员密码，注：系统出现一切故障时以基础管理员名称和密码为准

$web['sitehttp'] = 'http://'.(!empty($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']).'/';  //站点网址
$web['root'] = '';
if (!function_exists('get_root_domain')) {
  if (file_exists($GLOBALS['WEATHER_DATA'].'readonly/function/get_root_domain.php')) {
    @ require ($GLOBALS['WEATHER_DATA'].'readonly/function/get_root_domain.php');
  }
}
if (function_exists('get_root_domain')) {
  $web['root'] = get_root_domain($web['sitehttp']);
}

eval(decode162100('fGlmIChmaWxlX2V4aXN0cygkR0xPQkFMU1snV0VBVEhFUl9EQVRBJ10uJ3dyaXRhYmxlL3NldC9zZXRfaWRlLnBocCcpKSB7DQogIGV2YWwoZGVjb2RlMTYyMTAwKGZpbGVfZ2V0X2NvbnRlbnRzKCRHTE9CQUxTWydXRUFUSEVSX0RBVEEnXS4nd3JpdGFibGUvc2V0L3NldF9pZGUucGhwJykpKTsNCn0gZWxzZSB7DQogIGRpZSgnJiN4NjcyQTsmI3g1M0QxOyYjeDczQjA7JiN4NjM4ODsmI3g2NzQzOyYjeDY1ODc7JiN4NEVGNjsmI3hGRjAxOyYjeDg4NEM7JiN4NTdERjsmI3g1NDBEOzxhIGhyZWY9ImZvcl9zLnBocCI+PHU+JiN4NjM4ODsmI3g2NzQzOyYjeDYyMTY7JiN4N0VEMTsmI3g1QjlBOzwvdT48L2E+JiN4NjRDRDsmI3g0RjVDOycpOw0KfXw='));

$web['path'] = dirname(trim($web['sitehttp'], '/').$_SERVER['REQUEST_URI'].'.abc').'/';  //路径

$web['sitename'] = '我的网址导航';  //站点名称
$web['sitename2'] = '我的网址导航';  //站点简称
$web['description'] = '网址导航，首选162100网址导航www.162100.com';  //站点描述
$web['keywords'] = '主页导航,上网导航,网址导航,绿色网址,网址之家,网址大全,网上黄页,集成搜索,一站式搜索';  //关键字
$web['slogan'] = '';  //口号
$web['link_type'] = 0;  //通过export.php?url=链接路径 中转链接
$web['d_type'] = 0;  //关于首页网址弹出简介？0弹出1不弹
$web['login_key'] = array (
  'baidu' => '0',
  'qq' => '1',
  'weibo' => '0',
);

$web['chmod'] = '755';  //权限
if (empty($web['chmod']) || $web['chmod'] < 755) {
  $web['chmod'] = 755;
}
$web['time_pos'] = '8北京，重庆，香港特别行政区，乌鲁木齐，台北';  //服务器时区调整
$web['cssfile'] = 'default/1';  //站点默认风格
$web['search_bar'] = 1;  //默认搜索引擎样式

$web['stop_reg'] = 0;  //用户注册 1禁止 0不禁止 2注册需审核
$web['mail_send'] = 0;  //1发送邮件 0不发送
$web['stop_login'] = 5;  //用户登录密码错误限数 0不限

$web['addfunds'] = 1;  //1开启用户创收模式
$web['loginadd'] = 0.15;  //用户登陆（含注册）、推广URL来访本站赠送货币值
$web['loginadd2'] = 0.1;  //从上线分成
$web['loginadd_limit_ip'] = 1;  //每IP每日限注册次数计赠货币值
$web['cash'] = 10;  //用户提现需达到

$web['newinfo_url'] = array("http://info.162100.com/get_newinfo_for162100.php","http://info.162100.com/write.php"); //信息窗调用地址

?>