<?php
require ('authentication_manager.php');
?>
<?php

/* 群发电邮 */
/* 162100源码 - 162100.com */

function getPower($v) {
  global $web;
  if ($v == $web['manager']) {
    return '<span class="redword">管理员</span>';
  } else {
    return '';
  }
}

if ($_GET['order'] != 'username' && $_GET['order'] != 'regdate') {
  $_GET['order'] = 'id';
}
if ($_GET['username']) {
  $_GET['username'] = strtolower(trim($_GET['username']));
  if (preg_match('/^([^\x00-\x7f]|\w|\.){3,45}$/', $_GET['username'])) {
    $_GET['username'] = str_replace('.', '&#46;', $_GET['username']);
    $eval = ' (username LIKE "%'.$_GET['username'].'%") AND'; //走索引的话 (username LIKE "'.$_GET['username'].'%") AND
    $search_r = ' - 搜索结果';
  } elseif (preg_match('/^[\w\.\-]+@[\w\.\-]+\.[\w\.]+$/', $_GET['username'])) {
    $eval = ' (email LIKE "%'.$_GET['username'].'%") AND'; //走索引的话 (email LIKE "'.$_GET['username'].'%") AND
    $search_r = ' - 搜索结果';
  } else {
    $search_r = ' <span class="redword">您的输入词不合法！</span>';
  }
}

$n = 0;
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE'.$eval.' (check_reg="0" OR check_reg="4")');
  $row = db_fetch($db, $result);
  $n = $row['total'];
  $result = NULL;
  unset($row);
  @ require ('readonly/function/get_page.php');
  if ($n > 0) :
    $p = get_page($n); //页数
    $text .= '
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="12">&nbsp;</th>
      <th>用户名<select name="order" id="order" style="height:auto;" onchange="location.href=\'webmaster_central.php?p='.$p.'&get=member_bulk_mail&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order=\'+this.value+\'\';">
    <option value="regdate">按注册时间查看</option>
    <option value="username"'.($_GET['order'] == 'username' ? ' selected="selected"' : '').'>按帐户名查看</option>
  </select></th>
      <th colspan="2">详细</th>
    </tr>
';
    $seek = $web['pagesize'] * ($p-1);
    $result = db_query($db, 'SELECT username,email,regdate,realname,recommendedby FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE'.$eval.' (check_reg="0" OR check_reg="4") ORDER BY '.$_GET['order'].' DESC LIMIT '.$seek.','.$web['pagesize'].'');

    while ($row = db_fetch($db, $result)) {
      $text .= '
    <tr valign="top">
    <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$row['email'].'" /></td>
    <td>'.$row['username'].''.getPower($row['username']).'</td>
    <td width="200">邮箱：'.$row['email'].'<br />
    注册日期：'.$row['regdate'].'
    </td>
    <td width="200">
    真实姓名：'.$row['realname'].'<br />
    上线：'.($row['recommendedby'] != '' ? $row['recommendedby'].' <a href="?get=member_bulk_mail&username='.urlencode($row['recommendedby']).'&pn='.$_GET['pn'].'&order='.$_GET['order'].'">&raquo;</a>' : '无').'
    </td>
    </tr>
    ';
      unset($row);
    }
    $text .= '
    </table>';
    $result = NULL;

    $text .= get_page_foot($n, $web['pagesize'], $p, '?get=member_bulk_mail&username='.urlencode($_GET['username']).'&order='.$_GET['order'].'&p=');

  else :
    $err .= '没有记录！';
  endif;

} else {
  $err .= $sql['db_err'];
}

db_close($db);

?>
  <!--h5 class="list_title"><a href="?get=member_bulk_mail" class="list_title_in">群发邮件（<?php echo $n; ?>）</a><?php echo $search_r; ?></h5-->
  <form method="post" id="manageform" action="?post=member_bulk_mail">
  <div class="note">
    <input name="username" id="usernamebox" type="text" value="<?php echo $_GET['username']; ?>" size="20" />
    <button type="button" onclick="location.href='?get=member_bulk_mail&amp;username='+encodeURIComponent($('usernamebox').value)+''">搜索会员|邮箱</button>
<br />
      <a href="javascript:void(0)" onclick="allChoose('id[]',1,1);return false;">全选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',1,0);return false;">反选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',0,0);return false;">不选</a>
    </div>
    <?php echo $text, $err; ?>
    <br />
    <b id="a_subject"><span class="redword">*</span> 标题：</b><br />
    <input name="subject" id="subject" type="text" value="" size="50" maxlength="180" />
    <br />
    <b id="a_content"><span class="redword">*</span> 内容（帖入代码）：</b><br />
    <textarea name="content" rows="5" cols="60"></textarea><br />
    <button name="submit" type="submit" class="send2" style="border:none;">提交</button>
    <input type="hidden" name="limit" value="bulk_mail" />
  </form>
  