<?php

//$key1 = $_SESSION['token']['access_token'];
$key1 = '';
$key2 = $_SESSION['token']['uid'];
//if (strlen($key1.$key2) == 10) {

include_once( 'login_key/weibo/config.php' );
include_once( 'login_key/weibo/saetv2.ex.class.php' );

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$ms  = $c->home_timeline(); // done
//$uid_get = $c->get_uid();
//$uid = $uid_get['uid'];

$user_message = $c->show_user_by_id( $key2);//根据ID获取用户等基本信息

  if (!(is_array($user_message) && count($user_message) > 0)) {
    $err = '出错了！请稍后再试。';

  } else {


    $bar = 'weibo';
    @ require ('readonly/function/filter.php');
    $bar_name = filter1($user_message["name"], true);
    $bar_face = $user_message['profile_image_url'];

  }
//} else {
//  $err = '出错了！请稍后再试。';
//}

if (empty($err)) {
  @ require ('login_key/tie.php');
  echo '
  <h5 class="list_title"><a class="list_title_in">来自<img src="readonly/images/'.$bar.'.png" />的信息</a></h5>
  <div class="column_title"><a href="http://www.weibo.com/u/'.$user_message['id'].'"   class="send" style="float:right;"  target="_blank">进入我的新浪微博</a>发布微博</div>
  <ul class="class" id="newinfo">
	<form action="login_key/weibo/weibolist.php" >
<textarea name="text" rows="20" cols="30"></textarea><br />
		<button type="submit" class="send2" style="border:none;">发送</button>
	</form></ul>
';

} else {
  echo '<div class="output">'.$err.'</div>';
}

?>