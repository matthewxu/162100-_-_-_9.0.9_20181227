<?php
require_once('login_key/baidu/baiduapi.inc.php');

if ($user) {
	$apiClient = $baidu->getBaiduApiClientService();
	$profile = $apiClient->api('/rest/2.0/passport/users/getInfo', array('fields' => 'userid,username,sex,birthday'));
	if ($profile === false) {
		//get user profile failed
		var_dump(var_export(array('errcode' => $baidu->errcode(), 'errmsg' => $baidu->errmsg()), true));
		$user = NULL;
	}

    @ require ('readonly/function/filter.php');

    $key1 = '';
    $key2 = $user['uid'];
    $bar = 'baidu';
    $bar_name = filter1($user['uname'], true);
    $bar_face = '';


} else {
    $err = '出错了！请稍后再试。';
}




if (empty($err)) {

    @ require ('login_key/tie.php');

} else {
  echo '<div class="output">'.$err.'</div>';
}
?>