<?php
ini_set('display_errors', false);

require_once("./API/qqConnectAPI.php");
$qc = new QC();
$key1 = $qc->qq_callback(); //access_token
$key2 = $qc->get_openid(); //openid
$qc = new QC($key1, $key2);
$arr = $qc->get_user_info();
/*
$key1 = 'ABCA7BEAE4511660E823AF32B170F972';
$key2 = 'BC5A8E23FA71A6462E0A041482C3CD52';
$arr = array('nickname' => '162100', 'figureurl_1' => 'sfdgsdfgsdfgsdfg');
*/
//header("content-type: text/html; charset=utf-8");
//echo "NickName:".$arr["nickname"];
//echo "<img src=\"".$arr['figureurl_1']."\">";
/*
*/
//if ((strlen($key1) == 32 && strlen($key2) == 32) && (is_array($arr) && count($arr) > 0)) {
if ($key1 && $key2 && (is_array($arr) && count($arr) > 0)) {

  $_SESSION['access_token']=$key1;
  $_SESSION['openid']=$key2;
  @ require ('../../readonly/function/filter.php');

  $bar = 'qq';
  $bar_name = filter1($arr["nickname"], true);
  $bar_face = $arr['figureurl_1'];

  @ require ('../run_login.php');


} else {
  die('出错了！请稍后再试。');
}





























?>