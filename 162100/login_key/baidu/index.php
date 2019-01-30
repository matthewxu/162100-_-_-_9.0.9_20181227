<?php

require_once('baiduapi.inc.php');

if ($user) {
	$apiClient = $baidu->getBaiduApiClientService();
	$profile = $apiClient->api('/rest/2.0/passport/users/getInfo', 
								array('fields' => 'userid,username,sex,birthday'));
	if ($profile === false) {
		//get user profile failed
		var_dump(var_export(array('errcode' => $baidu->errcode(), 'errmsg' => $baidu->errmsg()), true));
		$user = null;
		exit();
	}
}

// Login or logout url will be needed depending on current user state.
/*
if ($user) {
  header("content-type: text/html; charset=utf-8");
  echo '已登录';
  $logoutUrl = $baidu->getLogoutUrl('logout_callback.php?u=' . 
                                    urlencode(BaiduUtils::getCurrentUrl()));
} else {
  $loginUrl = $baidu->getLoginUrl('', 'popup');
}
*/
  $loginUrl = $baidu->getLoginUrl('', 'popup');
  header('Location: '.$loginUrl.'');


?>