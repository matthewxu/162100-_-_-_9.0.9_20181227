<?php
require ('authentication_member.php');
?>
<?php
if (POWER == 0) {
  err('<script> alert("请登陆或注册帐号！先"); </script>');
}
@ require ('readonly/function/filter.php');
$_REQUEST['linkhttp'] = preg_replace('/^(https?:\/\/[^\/]+)\/?$/', '$1/', filter1($_REQUEST['linkhttp']));

$_REQUEST['linkname'] = preg_replace('/<div.+\/div>/isU', '', $_REQUEST['linkname']);


$_REQUEST['linkname'] = filter1(strip_tags($_REQUEST['linkname']));


if (!empty($_REQUEST['linkhttp']) && !empty($_REQUEST['linkname'])) {
  $text = '<span><a onclick="addM(this)" href="'.$_REQUEST['linkhttp'].'">'.$_REQUEST['linkname'].'</a></span>';

  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }

  $result = db_query($db, 'SELECT *,LENGTH(collection)+0 AS l FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
  $row = db_fetch($db, $result);
  $result = NULL;

  if ($row['l'] + strlen($text) > 40000) {
    err('<script> alert("自定义收藏数据量过大（大于40000字节）！请减小数据库的数据量"); </script>');
  }


  //操作前再深层判断一下权限，v3.3加
  if ($session[1].'|'.$session[2] != $row['session_key']) {
    err('<script> alert("经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！"); </script>');
  }

  if (db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET collection=CONCAT(collection,"'.addslashes($text).'") WHERE username="'.$session[0].'" AND collection NOT REGEXP "<a [^>]*=\"'.preg_quote($_REQUEST['linkhttp'], '/').'\"[^>]*>"')) {
    err('
<script>
alert("OK！已加入首页“收藏”中");
if (top.$("collection")!=null){
  try{ top.$("addPFrame").src = "PseudoXMLHTTP.php?xml_id=collection&xml_file='.get_en_url('readonly/run/post_member_collection_show.php').'"; } catch(err) {}
}
</script>');
  } else {
    err('<script> alert("添加不成功！数据库中已存在该记录"); </script>');
  }

  db_close($db);

} else {

  err('<script> alert("参数传递出错！"); </script>');

}


?>