<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
      $token = $o->getAccessToken('code', $keys);
	} catch (OAuthException $e) {
	}
}

if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$ms  = $c->home_timeline(); // done
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息

  //$key1 = $_SESSION['token']['access_token'];
  @ require ('../../readonly/function/filter.php');
  $key1 = '';
  $key2 = $uid;

  $bar = 'weibo';
  $bar_name = filter1($user_message['name'], true);
  $bar_face = $user_message['profile_image_url'];

  @ require ('../run_login.php');

/*
*/



//echo '授权完成,<a href="weibolist.php">进入你的微博列表页面</a><br />';

?>
<?php
} else {
?>
授权失败。
<?php
}
?>
