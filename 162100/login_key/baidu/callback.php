<?php
// When user finish authorization, request will redirect to this page,
// then all we need to do is to get access token by authorization code,
// and then notify its parent page

require_once('baiduapi.inc.php');

if ($user) {
	$apiClient = $baidu->getBaiduApiClientService();
	$profile = $apiClient->api('/rest/2.0/passport/users/getInfo', array('fields' => 'userid,username,sex,birthday'));
	if ($profile === false) {
		//get user profile failed
		var_dump(var_export(array('errcode' => $baidu->errcode(), 'errmsg' => $baidu->errmsg()), true));
		$user = NULL;
	}
/*
print_r($user);
echo '<br>';
print_r($apiClient);
echo '<br>';
print_r($profile);
输出以下：
Array
(
    [uid] => 486771605
    [uname] => yzsou
)
<br>BaiduApiClient Object
(
    [clientId:protected] => lQgS7hYDn4VTFj8mSH6XWqFG
    [accessToken:protected] => 3.28325cd799f1ecb9efee1502d136d6d0.2592000.1376293558.486771605-1081962
    [finalEncode:protected] => UTF-8
    [batchMode:protected] => 
    [batchQueue:protected] => 
)
<br>Array
(
    [userid] => 486771605
    [username] => yzsou
    [sex] => 1
    [birthday] => 0000-00-00
)
*/

  $key1 = '';
  $key2 = $user['uid'];
  @ require ('../../readonly/function/filter.php');

  $bar = 'baidu';
  $bar_name = filter1($user['uname'], true);
  $bar_face = '';

  @ require ('../run_login.php');















} else {
  die('授权失败。');
}
?>