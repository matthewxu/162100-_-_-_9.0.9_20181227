<?php
require ('authentication_manager.php');
?>
<?php

/* 注册审核 */
/* 162100源码 - 162100.com */

function getPower($v) {
  global $web;
  if ($v == $web['manager']) {
    return '<span class="redword">管理员</span>';
  } else {
    return '';
  }
}

$search_r = '';
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
    $search_r = ' <span class=\"redword\">您的输入词不合法！</span>';
  }
}

if ($_GET['act'] == 'punished') {
  $where_eval = '2';
  $list_title1 = '<a href="webmaster_central.php?get=member_check_reg">待审批注册用户列表</a> <a class="list_title_in">黑名单（';
  $list_title3 = '）</a>'.$search_r.' <a href="webmaster_central.php?get=member_check_reg&act=abnormal">冻结</a> <a href="webmaster_central.php?get=member_check_reg&act=warn">观察</a>';
  $choose = '<button name="act" type="button" onclick="chk(this.form,this,\'out_punished\')">解除</button>';
} elseif ($_GET['act'] == 'abnormal') {
  $where_eval = '3';
  $list_title1 = '<a href="webmaster_central.php?get=member_check_reg">待审批注册用户列表</a> <a href="webmaster_central.php?get=member_check_reg&act=punished">黑名单</a> <a class="list_title_in">冻结（';
  $list_title3 = '）</a>'.$search_r.' <a href="webmaster_central.php?get=member_check_reg&act=warn">观察</a>';
  $choose = '<button name="act" type="button" onclick="chk(this.form,this,\'out_punished\')">解除</button>';
} elseif ($_GET['act'] == 'warn') {
  $where_eval = '4';
  $list_title1 = '<a href="webmaster_central.php?get=member_check_reg">待审批注册用户列表</a> <a href="webmaster_central.php?get=member_check_reg&act=punished">黑名单</a> <a href="webmaster_central.php?get=member_check_reg&act=abnormal">冻结</a> <a class="list_title_in">观察（';
  $list_title3 = '）</a>'.$search_r.'';
  $choose = '<button name="act" type="button" onclick="chk(this.form,this,\'out_punished\')">解除</button>';
} else {
  $where_eval = '1';
  $list_title1 = '<a class="list_title_in">待审批注册用户列表（';
  $list_title3 = '）</a>'.$search_r.' <a href="webmaster_central.php?get=member_check_reg&act=punished">黑名单</a> <a href="webmaster_central.php?get=member_check_reg&act=abnormal">冻结</a> <a href="webmaster_central.php?get=member_check_reg&act=warn">观察</a>';
  $choose = '<button name="act" type="button" onclick="chk(this.form,this,\'check_reg\')">审批通过</button>';
}

$n = 0;

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE'.$eval.' check_reg="'.$where_eval.'"');
  $row = db_fetch($db, $result);
  $n = abs($row['total']);
  $result = NULL;
  unset($row);
  @ require ('readonly/function/get_page.php');
  if ($n > 0) :
    $p = get_page($n); //页数
    $text .= '
  <table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="12">&nbsp;</th>
      <th>用户名<select name="order" id="order" onchange="location.href=\'webmaster_central.php?p='.$p.'&get=member_check_reg&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order=\'+this.value+\'\';">
    <option value="regdate">按注册时间查看</option>
    <option value="username"'.($_GET['order'] == 'username' ? ' selected="selected"' : '').'>按帐户名查看</option>
  </select></th>
      <th colspan="2">详细</th>
    </tr>
';
    $seek = $web['pagesize'] * ($p-1);
    $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE'.$eval.' check_reg="'.$where_eval.'" ORDER BY id DESC LIMIT '.$seek.','.$web['pagesize'].'');

    while ($row = db_fetch($db, $result)) {
      $text .= '
    <tr valign="top">
    <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$row['username'].'" /></td>
    <td>'.$row['username'].''.getPower($row['username']).'<br /><br />（推广）ID：<b>'.$row['id'].'</b>，上线：'.($row['recommendedby'] != '' ? $row['recommendedby'].' <a href="?get=member&username='.urlencode($row['recommendedby']).'&pn='.$_GET['pn'].'&order='.$_GET['order'].'">&raquo;</a>' : '无').'</td>
    <td width="200">邮箱：'.$row['email'].'<br />
    注册日期：'.$row['regdate'].'<br />
    最后访问：'.$row['thisdate'].'
    </td>
    <td width="200">
    真实姓名：'.$row['realname'].'<br />
    银行帐号：'.$row['bank'].'<br />
    支付宝帐号：'.$row['alipay'].'
    </td>
    </tr>
    ';
      unset($row);
    }
    $text .= '
    </table>';
    $result = NULL;

    $text .= get_page_foot($n, $web['pagesize'], $p, '?get=member_check_reg&username='.urlencode($_GET['username']).'&act='.$_GET['act'].'&order='.$_GET['order'].'&p=');

  else :
    $err .= '没有记录！';
  endif;

} else {
  $err .= $sql['db_err'];
}

db_close($db);

?>
<h5 class="list_title"><?php echo $list_title1.$n.$list_title3; ?></h5>
<form method="post" id="manageform" action="?post=member_check_reg">
  <div class="note"><input name="username" id="usernamebox" type="text" value="<?php echo $_GET['username']; ?>" size="20" />
    <button type="button" onclick="location.href='?get=member_check_reg&act=<?php echo $_GET['act']; ?>&username='+encodeURIComponent($('usernamebox').value)+''">搜索会员|邮箱</button><br />
<a href="javascript:void(0)" onclick="allChoose('id[]',1,1);return false;">全选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',1,0);return false;">反选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',0,0);return false;">不选</a> &nbsp;&nbsp;
    <?php echo $choose; ?>
    <button name="act" type="button" onclick="chk(this.form,this,'del')">删除</button>
  </div>
  <?php
echo $text, $err;
?>
  <input type="hidden" name="limit" />
</form>
