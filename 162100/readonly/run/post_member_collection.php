<?php
require ('authentication_member.php');
?>
<?php
//栏目分类设置

if (POWER == 0) {
  err('请登陆或注册帐号！先');
}

$_POST['linkhttp'] = array_unique(array_filter((array)$_POST['linkhttp']));
$text = '';

//if (count($_POST['linkhttp']) == 0) {
//  err('数据为空！<br />问题分析：<br />1、您可能未填写<br />2、参数传递出错。');
//} else {

@ require ('readonly/function/filter.php');
  foreach ((array)$_POST['linkhttp'] as $k => $v) {
    $_POST['color'][$k] = (preg_match('/^[\s\w\-]+$/', $_POST['color'][$k])) ? ' class="'.$_POST['color'][$k].'"' : '';
    $v = preg_replace('/^(https?:\/\/[^\/]+)\/?$/', '$1/', filter1($v));
    $_POST['linkname'][$k] = filter1(strip_tags($_POST['linkname'][$k]));
    if (!empty($v) && !empty($_POST['linkname'][$k])) {
      $text .= '<span><a onclick="addM(this)" href="'.$v.'"'.$_POST['color'][$k].'>'.$_POST['linkname'][$k].'</a></span>';
    }
  }
//}

if (strlen($text) > 40000) {
  err('自定义收藏数据量过大（大于40000字节）！请减小数据库的数据量');
}

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

//操作前再深层判断一下权限，v3.3加

if ($session[1].'|'.$session[2] != get_session_key()) {
  err('经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！');
}

db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET collection="'.addslashes(trim($text)).'" WHERE username="'.$session[0].'" LIMIT 1');

db_close($db);


alert('设置完毕！请浏览首页“收藏”
<script>
if (top.$("collection")!=null){
  try{ top.$("addPFrame").src = "PseudoXMLHTTP.php?xml_id=collection&xml_file='.get_en_url('readonly/run/post_member_collection_show.php').'"; } catch(err) {}
}
</script>', !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'member.php?get=collection');




?>