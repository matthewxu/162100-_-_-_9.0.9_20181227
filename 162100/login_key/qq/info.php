<?php
/*
session值：
Array
(
    [QC_userData] => Array
        (
            [state] => ac89a774a69be522b0013e575b79c2a9
            [access_token] => ABCA7BEAE4511660E823AF32B170F972
            [openid] => BC5A8E23FA71A6462E0A041482C3CD52
        )

)
*/
$key1 = $_SESSION['access_token'];
$key2 = $_SESSION['openid'];
//if (strlen($key1.$key2) == 64) {

  require_once("login_key/qq/API/qqConnectAPI.php");
  $qc = new QC($key1, $key2);
  $arr = $qc->get_user_info();

  if (!(is_array($arr) && count($arr) > 0)) {
    $err = '出错了！请稍后再试。';

  } else {


    $bar = 'qq';
    @ require ('readonly/function/filter.php');

    $bar_name = filter1($arr["nickname"], true);
    $bar_face = $arr['figureurl_1'];

  }
//} else {
//  $err = '出错了！请稍后再试。';
//}

if (empty($err)) {
    @ require ('login_key/tie.php');

  echo '
  <h5 class="list_title"><a class="list_title_in">来自<img src="readonly/images/'.$bar.'.png" />的应用</a></h5>
        <a href="login_key/qq/e/user/get_user_info.php"    target="_blank">获取用户信息</a>		<br>
        <a href="login_key/qq/e/share/add_share.html"      target="_blank">添加分享</a>		<br>
        <a href="login_key/qq/e/photo/list_album.php"      target="_blank">获取相册列表</a>		<br>
        <a href="login_key/qq/e/photo/add_album.html"      target="_blank">创建相册</a>		<br>
        <a href="login_key/qq/e/photo/upload_pic.php"     target="_blank">上传相片</a>		<br>
        <a href="login_key/qq/e/blog/add_blog.html"     target="_blank">发表日志</a>		<br>
        <a href="login_key/qq/e/topic/add_topic.html"     target="_blank">发表说说</a>		<br>
        <a href="login_key/qq/e/weibo/add_weibo.html"     target="_blank">发表微博</a>		<br>
        <a href="login_key/qq/e/check_fan/check_page_fans.php"     target="_blank">检查是否是认证空间的粉丝</a>		<br>
        <a href="login_key/qq/e/add_pic_t/add_pic_t.php"     target="_blank">发图片消息到微博</a>		<br>
        <a href="login_key/qq/e/get_info/get_info.php"     target="_blank">获取微博用户信息</a>		<br>
        <a href="login_key/qq/e/get_fanslist/get_fanslist.php"     target="_blank">获取用户的听众列表</a>		<br>
        <a href="login_key/qq/e/get_idollist/get_idollist.php"     target="_blank">获取用户的收听列表</a>		<br>
        <a href="login_key/qq/e/add_idol/add_idol.php"     target="_blank">收听腾讯微博上的用户</a>		<br>
        <a href="login_key/qq/e/get_tenpay_addr/get_tenpay_addr.php"     target="_blank">获取财付通用户的收货地址</a>
';

} else {
  echo '<div class="output">'.$err.'</div>';
}
?>