<?php

header('Content-Type: text/html; charset=UTF-8');







/* 配置下面二行 */

define( "WB_AKEY" , '' );

define( "WB_SKEY" , '' );















/*
if (!isset($web['path'])) {
  $GLOBALS['WEATHER_DATA'] = '../../';
  require_once('../../writable/set/set.php');

}
*/
//$callbackfilename = $web['path'].''.(strstr($web['path'], 'login_key/weibo/') ? 'callback.php' : 'login_key/weibo/callback.php');
$callbackfilename = 'http://www.162100.com/login_key/weibo/callback.php';

define( "WB_CALLBACK_URL" , $callbackfilename);

?>