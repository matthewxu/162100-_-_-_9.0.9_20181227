<?php
require ('authentication_manager.php');
?>
<?php
require ('authentication_manager.php');
?>
<script language="javascript" type="text/javascript">
<!--
function why_this(obj) {
  var str_n=prompt('填写原因：','');
  if(str_n){
    obj.href=obj.href.replace(/&remark=[^=&]+/,'')+'&remark='+encodeURIComponent(str_n)+'';
  }
  return true;
}

function CO(id) {
  var article = 0;
  var allCheckBox = document.getElementsByName(id);
  if (allCheckBox != null && allCheckBox.length > 0) {
    article=1;
  }
  return article;
}

//-->
</script>
<?php

/* 管理货币值 */
/* 162100源码 - 162100.com */


if ($_GET['username']) {
  $_GET['username'] = strtolower(trim($_GET['username']));
  if (preg_match('/^([^\x00-\x7f]|\w|\.){3,45}$/', $_GET['username'])) {
    $_GET['username'] = str_replace('.', '&#46;', $_GET['username']);
    $eval = ' WHERE username="'.$_GET['username'].'"';
    $search_r = ' - 搜索结果';
  } else {
    $eval = '';
    $search_r = ' <span class=\"redword\">用户名不合法！</span>';
  }
} else {
  $eval = '';
}

$bar_ = $eval0 = $eval1 = '';
$n1 = 'COUNT(id) AS total,SUM(money) AS total_m';
$n2 = '*';
//$conti = '"".(abs($row["fettle"]) == 0 ? "有效<a href=\"webmaster_central.php?post=member_funds&limit=fettle_no&id[]=".$row["id"]."&ctype=a\" target=\"run_cash\" title=\"设为无效\">×</a>" : "<span style=\"color:#FFCCCC\" title=\"原因：".$zuobi[abs($row["fettle"])]."\">无效</span><a href=\"webmaster_central.php?post=member_funds&limit=fettle_yes&id[]=".$row["id"]."&ctype=a\" target=\"run_cash\" title=\"转为有效\">×</a>").""';
$ck = '';


if ($_GET['act'] == 'add') {
  $eval0 = ($eval != '' ? ''.$eval.' AND' : ' WHERE').' money>0 AND (fettle="0" OR fettle="")';
  $eval1 = $eval0.' ORDER BY id DESC';
  $list_title1 = '<a href="?get=member_funds">有效记录</a> <a href="?get=member_funds&act=add" class="list_title_in">增值记录（';
  $list_title3 = '）</a>'.$search_r.' <a href="?get=member_funds&act=cash">提现记录</a> <a href="?get=member_funds&act=fettle_no">无效记录</a>';
  $bar_ = '<button type="button" name="act2" onclick="chk(this.form,this,\'fettle_no\');">设为无效</button>';

} elseif ($_GET['act'] == 'cash') {
  $eval0 = ($eval != '' ? ''.$eval.' AND' : ' WHERE').' money<0 AND (fettle="0" OR fettle="")';
  $eval1 = $eval0.' ORDER BY id DESC';
  $list_title1 = '<a href="?get=member_funds">有效记录</a> <a href="?get=member_funds&act=add">增值记录</a> <a href="?get=member_funds&act=cash" class="list_title_in">提现记录（';
  $list_title3 = '）</a>'.$search_r.' <a href="?get=member_funds&act=fettle_no">无效记录</a>';
  $bar_ = '<button type="button" name="act2" onclick="chk(this.form,this,\'fettle_no\');">设为无效</button> <input name="fettle_bar" type="radio" class="radio" value="1" checked="checked" />原因1… <button type="button" name="act2" onclick="if(CO(\'casho[]\')==0){alert(\'没发现尚未支付的状态！\');}else{chk(this.form,this,\'cash_o\');}">由尚未支付转为已经支付</button> 备注：<input name="remark" id="remark" type="text" size="20" />';

} elseif ($_GET['act'] == 'fettle_no') {
  $eval0 = ($eval != '' ? ''.$eval.' AND' : ' WHERE').' (fettle<>"0" AND fettle<>"")';
  $eval1 = $eval0.' ORDER BY id DESC';
  $list_title1 = '<a href="?get=member_funds">有效记录</a> <a href="?get=member_funds&act=add">增值记录</a> <a href="?get=member_funds&act=cash">提现记录</a> <a href="?get=member_funds&act=fettle_no" class=list_title_in">无效记录（';
  $list_title3 = '）</a>'.$search_r.'';
  $bar_ = '<button type="button" name="act2" onclick="chk(this.form,this,\'fettle_yes\');">转为有效</button>';

} else {
  if ($_GET['order'] == 'money') {
    $n1 = 'COUNT(DISTINCT username) AS total';
    $n2 = 'id,username,SUM(money) AS money';
    $eval0 = ' WHERE money>0 AND (fettle="0" OR fettle="")';
    $eval1 = $eval0.' GROUP BY username ORDER BY money DESC';
    $conti = '';
    $ck = ' disabled="disabled"';
  } elseif ($_GET['order'] == 'balance') {
    $n1 = 'COUNT(DISTINCT username) AS total';
    $n2 = 'id,username,SUM(money) AS money';
    $eval0 = ' WHERE (fettle="0" OR fettle="")';
    $eval1 = $eval0.' GROUP BY username ORDER BY money DESC';
    $conti = '';
    $ck = ' disabled="disabled"';
  } else {
    $eval0 = ($eval != '' ? ''.$eval.' AND' : ' WHERE').' (fettle="0" OR fettle="")';
    $eval1 = $eval0.' ORDER BY id DESC';
  }
  $list_title1 = '<a href="?get=member_funds" class="list_title_in">有效记录（';
  $list_title3 = '）</a>';
  $list_title4 = 1;
  $_GET['act'] = '';
  $bar_ = '<button type="button" name="act2" onclick="chk(this.form,this,\'fettle_no\');">设为无效</button>';
}


$description = array(0 => '提现', 1 => '用户注册', 2 => '成员登陆', 3 => '推广URL来访', 4 => '下线注册分成', 5 => '下线登陆分成', 6 => '管理员加赠', 7 => '管理员减扣');








$n = $total_m = 0;

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {

  //4.1 to 4.2 增加一列
  //db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` ADD COLUMN `fettle` int(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT "0"');

  $result = db_query($db, 'SELECT '.$n1.' FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' '.$eval0.'');
  $row = db_fetch($db, $result);
  $n = $row['total'] > 0 ? $row['total'] : 0;
  $total_m = !empty($row['total_m']) && is_numeric($row['total_m']) ? $row['total_m'] : '';
  $result = NULL;
  unset($row);
  @ require ('readonly/function/get_page.php');

  if ($n > 0) :
    @ require_once('readonly/weather/getip.php');
    $p = get_page($n); //页数
    $seek = $web['pagesize'] * ($p-1);
    $result = db_query($db, 'SELECT '.$n2.' FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].''.$eval1.' LIMIT '.$seek.','.$web['pagesize'].'');
    $text .= '
  <table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="12">&nbsp;</th>
      <th width="100">姓名</th>
      <th width="75">明细</th>
      <th width="75">金额<br />总计'.$total_m.'</th>
      <th width="75">日期</th>
      <th>备注</th>
      <th width="25">状态</th>
    </tr>';
    while ($row = db_fetch($db, $result)) {
      $row['money'] = $row['money'] > 0 ? '+'.$row['money'] : $row['money'];
      $text .= '
    <tr id="funds_'.$row['id'].'">
      <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$row['id'].'"'.$ck.' /></td>
      <td width="100">'.$row['username'].' <a href="?get=member_funds&username='.urlencode($row['username']).'&act='.$_GET['act'].'" title="单独查看">&raquo;</a></td>
      <td width="75">'.$description[$row['description']].'</td>
      <td width="75">'.$row['money'].'</td>
      <td width="75" title="'.$row['date'].'">'.$row['date'].'</td>
      <td>';
      if (!empty($row['userip'])) {
        $text .= '入口IP：'.$row['userip'].' ';
        $myobj = new ipLocation();
        $address = $myobj -> getaddress($row['userip']);
        $myobj = NULL;
        $text .= iconv('gbk', 'utf-8', $address['area1'].' '.$address['area2']).'<br />';
      }
//作弊原因，待开发
$zuobi = array(
1 => '',
2 => '',
);

$row['fettle'] = abs($row['fettle']);

      $text .= '
'.$row['other'].''.(($row['description'] == 0 && $row['other'] == '尚未支付') ? '<span id="other_'.$row['id'].'" name="casho[]"><a href="webmaster_central.php?post=member_funds&limit=cash_o&id[]='.$row['id'].'&ctype=a" target="run_cash" onclick="return why_this(this)" title="在弹出的对话框中填写备注（IE8可能会屏蔽弹窗，请注意）">转为已经支付状态</a></span>' : '').'</td>
      <td width="25">'.(!isset($conti) ? (abs($row['fettle']) == 0 ? '有效<a href="webmaster_central.php?post=member_funds&limit=fettle_no&id[]='.$row['id'].'&ctype=a" target="run_cash" title="设为无效">×</a>' : '<span style="color:#FFCCCC" title="原因：'.$zuobi[abs($row['fettle'])].'">无效</span><a href="webmaster_central.php?post=member_funds&limit=fettle_yes&id[]='.$row['id'].'&ctype=a" target="run_cash" title="转为有效">×</a>') : '').'</td>
    </tr>
';
      unset($row, $address);
    }
    $text .= '
    </table>';
    $result = NULL;

    $text .= get_page_foot($n, $web['pagesize'], $p, '?get=member_funds&act='.$_GET['act'].'&username='.$_GET['username'].'&order='.$_GET['order'].'&p=');

  else :
    $err .= '没有记录！';
  endif;

} else {
  $err .= '数据库'.$sql['name'].'连接不成功！';
}

db_close($db);

?>
<iframe id="run_cash" name="run_cash" style="display:none"></iframe>
<h5 class="list_title"><?php echo $list_title1.$n.$list_title3.(isset($list_title4)?'<a href="webmaster_central.php?p='.$p.'&get=member_funds&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order="'.($_GET['order'] != 'money' && $_GET['order'] != 'balance' ? ' style="color:gray"' : '').' class="greenword">&#8249; 按时间查看</a> <a href="webmaster_central.php?p='.$p.'&get=member_funds&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order=money"'.($_GET['order'] == 'money' ? ' style="color:gray"' : '').' class="greenword">&#8249; 按金额排序</a> <a href="webmaster_central.php?p='.$p.'&get=member_funds&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order=balance"'.($_GET['order'] == 'balance' ? ' style="color:gray"' : '').' class="greenword">&#8249; 按余额排序</a> | '.$search_r.' <a href="?get=member_funds&act=add">增值记录</a> <a href="?get=member_funds&act=cash">提现记录</a> <a href="?get=member_funds&act=fettle_no">无效记录</a>':''); ?></h5>
<div class="note"><b>提示：</b>删除操作要极其谨慎！删除正值相当于扣钱，删除负值相当于给用户进款。</div>
<form method="post" id="manageform" action="?post=member_funds">
<div class="note">按用户名
    <input name="username" id="username" value="<?php echo $_GET['username']; ?>" type="text" size="20" />
      <button name="button" type="button" onClick="location.href='?get=member_funds&username='+encodeURIComponent($('username').value)+'&act=<?php echo $_GET['act']; ?>'">搜索</button><br />
<a href="javascript:void(0)" onClick="allChoose('id[]',1,1);return false;">全选</a> - <a href="javascript:void(0)" onClick="allChoose('id[]',1,0);return false;">反选</a> - <a href="javascript:void(0)" onClick="allChoose('id[]',0,0);return false;">不选</a> &nbsp;&nbsp;
      <button type="button" name="act2" onClick="chk(this.form,this,'del')">删除</button> <?php echo $bar_; ?></div>
<?php
if (!file_exists('addfunds.php')) {
  echo '<div class="red_err">本版该功能模块未安装，请<a href="for_s.php" onclick="addSubmitSafe();$(\'addCFrame\').style.display=\'block\';" target="addCFrame" class="a_block b_block">联系官方</a>定制</div>';
} else {
  if ($web['addfunds'] == 0) {
    echo '<div class="red_err">用户创收尚未开启，请到<a href="?get=user#chuangshou">用户控制设置</a>中开启</div>';
  }
}
?>
  <?php echo $text, $err; ?>
  <input type="hidden" name="limit" />
</form>
