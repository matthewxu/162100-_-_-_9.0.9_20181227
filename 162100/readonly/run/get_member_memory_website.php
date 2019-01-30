<?php
require ('authentication_member.php');
?>
<?php
if (POWER > 0) :

  if (POWER > 0.5) {

?>
<style type="text/css">
<!--
#mingz_ { padding:0; }
#mingz_ span, #mingz_ li { width:auto; padding-left:10px; padding-right:10px; display:inline-block; *display:inline; *zoom:1; text-align:center; vertical-align:middle; }
#mingz_ a { text-decoration:none; }
-->
</style>

    <?php
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT memory_website,check_reg,session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
    if ($row = db_fetch($db, $result)) {
      /*
      if ($row['check_reg'] == '1') {
        $err = '帐号注册审核中！';
      } elseif ($row['check_reg'] == '2') {
        $err = '帐号已被移除至黑名单！';
      } elseif ($session[1].'|'.$session[2] != $row['session_key']) {
        $err = '经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！';
      }
      */
    } else {
      $err = '帐号不存在！';
    }
    $result = NULL;

  } else {
    $err .= $sql['db_err'];
  }
  db_close($db);

  echo empty($err) ? (empty($row['memory_website']) ? '<div class="output">暂无浏览记录！</div>' : '<div id="mingz_">'.preg_replace('/(<\/?)li>/i', '$1span>', $row['memory_website']).'</div>
<iframe id="clearFr" name="clearFr" style="display:none;"></iframe>
<script>
var mwP = $("bar-memory_website").parentNode;
mwP.innerHTML += "<a href=\"member.php?post=memory_website&act=clear\" style=\"width:32px;height:16px;line-height:16px;position:absolute;background-color:#FFFFFF;padding:0;border:1px #D4D4D4 solid;top:6px;left:120px;z-index:11px;text-align:center;font-size:12px;color:gray;overflow:hidden;\" title=\"一键清除浏览记录\" target=\"clearFr\">清空</a>";
</script>
') : '<div class="output">'.$err.'</div>';

  unset($row);
?>

<?php


  } else {

    @ require ('login_key/'.$session[4].'/info.php');

  }

else :
?>

<div class="output">
您上次的登陆已失效！请重新<a href="login<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo urlencode(basename($_SERVER['REQUEST_URI'])); ?>" target="_self">登陆</a>获取数据<br /><span class="grayword">没有帐号？<a href="reg<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo basename($_SERVER['REQUEST_URI']); ?>" target="_self">注册一个</a>，非常简单</span>
</div>

<?php
endif;
?>
