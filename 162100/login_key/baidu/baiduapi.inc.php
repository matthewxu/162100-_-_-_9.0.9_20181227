<?php



/***************************************************************************

 *

 * Copyright (c) 2012 Baidu.com, Inc. All Rights Reserved

 *

 **************************************************************************/



require_once('Baidu.php');



/* 配置下面这三行 */

$clientId = '';
$clientSecret = '';
$domain = '';




/* 例子
$clientId = 'lQgS7hYDn4VTF123SH123qFG';
$clientSecret = 'pSaymABFC123kn8Cls4ot1231DcOEBZQ';
$domain = '162100.com';
*/














if (!isset($web['path'])) {
  $GLOBALS['WEATHER_DATA'] = '../../';
  require_once('../../writable/set/set.php');

}

$redirectUri = $web['path'].''.(strstr($web['path'], 'login_key/baidu/') ? 'callback.php' : 'login_key/baidu/callback.php');

$baidu = new Baidu($clientId, $clientSecret, $redirectUri, new BaiduCookieStore($clientId));

$user = $baidu->getLoggedInUser();

?>