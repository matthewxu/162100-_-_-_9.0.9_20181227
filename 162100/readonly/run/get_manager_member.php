<?php
require ('authentication_manager.php');
?>
<?php

/* 管理成员 */
/* 162100源码 - 162100.com */

$text_hidden = '';
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
  if ($_GET['username'] != $web['manager']) {
    $text_hidden = '<script> if($(\'is_admin\')!=null){$(\'is_admin\').style.display=\'none\';}</script>';
  } else {
    $text_hidden = '<script> if($(\'no_member\')!=null){$(\'no_member\').style.display=\'none\';}</script>';
  }
}

?>
<?php
//铁级用户等级分标准
if (!(isset($web['class_iron']) && abs($web['class_iron']) > 0)) {
  $web['class_iron'] = 100;
}
//银级用户等级分标准
if (!(isset($web['class_silver']) && abs($web['class_silver']) > 0)) {
  $web['class_silver'] = 500;
}
//金级用户等级分标准，大于此数量的为钻级用户
if (!(isset($web['class_gold']) && abs($web['class_gold']) > 0)) {
  $web['class_gold'] = 1000;
}

//身份图像
function user_class($point) {
  global $web;
  $point = round((float)$point, 2);
  $text = '';
    if ($point <= abs($web['class_iron'])) {
      $www = $point < 0 ? 0 : ceil($point / (abs($web['class_iron']) / 10) * 3);
      $text .= ' <img src="readonly/images/iron.gif" width="'.($www + 3).'" height="16" title="铁级用户（总计收入¥'.$point.'）" onmouseover="sSD(this,event);" />';
    } elseif ($point > abs($web['class_iron']) && $point <= abs($web['class_silver'])) {
      $text .= ' <img src="readonly/images/silver.gif" width="'.(ceil($point / (abs($web['class_silver']) / 10) * 3) + 3).'" height="16" title="银级用户（总计收入¥'.$point.'）" onmouseover="sSD(this,event);" />';
    } elseif ($point > abs($web['class_slive']) && $point <= abs($web['class_gold'])) {
      $text .= ' <img src="readonly/images/gold.gif" width="'.(ceil($point / (abs($web['class_gold']) / 10) * 3) + 3).'" height="16" title="金级用户（总计收入¥'.$point.'）" onmouseover="sSD(this,event);" />';
    } else {
      $n = ceil($point / abs($web['class_gold'])) - 1;
      $text .= '<span title="'.$n.'钻用户（总计收入¥'.$point.'）" onmouseover="sSD(this,event);">';
      for ($i = 0; $i < $n; $i++) {
        $text .= '<img src="readonly/images/diamond.gif" />';
      }
      $text .= '</span>';
    }
  return $text;
}

$text = $text2 = '';
$n = 0;
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  $text .= '
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="12">&nbsp;</th>
      <th>用户名<select name="order" id="order" onchange="location.href=\'webmaster_central.php?p='.$p.'&get=member&username='.urlencode($_GET['username']).'&pn='.$_GET['pn'].'&order=\'+this.value+\'\';">
    <option value="regdate">按注册时间查看</option>
    <option value="username"'.($_GET['order'] == 'username' ? ' selected="selected"' : '').'>按帐户名查看</option>
  </select></th>
      <th colspan="2">详细</th>
    </tr>
';
  $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$web['manager'].'" LIMIT 1');
  if ($row = db_fetch($db, $result)) {
    $text .= '
    <tr valign="top" id="is_admin" title="管理员" onmouseover="sSD(this,event);">
    <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$row['username'].'" disabled="disabled" /></td>
    <td>'.(!empty($row['face']) ? '<img src="userface.php?u='.urlencode($row['username']).'" align="left" />' : '').''.$row['username'].' <img src="readonly/images/manager.gif"><br /><br />ID：<b>'.$row['id'].'</b></td>
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
  }
  $result = NULL;
  unset($row);

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username<>"'.$web['manager'].'" AND '.$eval.' check_reg="0"');
  $row = db_fetch($db, $result);
  $n = abs($row['total']);
  $result = NULL;
  unset($row);
  @ require ('readonly/function/get_page.php');
  if ($n > 0) :
    $p = get_page($n); //页数
    $seek = $web['pagesize'] * ($p-1);
    $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username<>"'.$web['manager'].'" AND '.$eval.' check_reg="0" ORDER BY '.$_GET['order'].' DESC LIMIT '.$seek.','.$web['pagesize'].'');

    while ($row = db_fetch($db, $result)) {
      //累计收入
      $result_class = db_query($db, 'SELECT SUM(money) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$row['username'].'" AND money>0 AND ABS(fettle)=0');
      $row_class = db_fetch($db, $result_class);
      $total_all = $row_class['total'] ? $row_class['total'] : 0;
      unset($row_class);
      $result_class = NULL;

      $text .= '
    <tr valign="top">
    <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$row['username'].'" /></td>
    <td>'.(!empty($row['face']) ? '<img src="userface.php?u='.urlencode($row['username']).'" align="left" />' : '').''.$row['username'].' '.user_class($total_all).'<br /><br />（推广）ID：<b>'.$row['id'].'</b>，上线：'.($row['recommendedby'] != '' ? $row['recommendedby'].' <a href="?get=member&username='.urlencode($row['recommendedby']).'&pn='.$_GET['pn'].'&order='.$_GET['order'].'">&raquo;</a>' : '无').'</td>
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
      unset($total_all);
    }

    $result = NULL;
    $text2 .= get_page_foot($n, $web['pagesize'], $p, '?get=member&username='.urlencode($_GET['username']).'&order='.$_GET['order'].'&p=');


  else :
    $err .= '<span id="no_member">没有记录！或已被删除。</span>';
  endif;
  $text .= '
  </table>';

} else {
  $err .= $sql['db_err'];
}

db_close($db);

?>
<style>
#is_admin td {background-color:#FFFFDC;}
</style>
<!--h5 class="list_title"><a href="?get=member" class="list_title_in">注册成员（<?php echo $n; ?>）</a><?php echo $search_r; ?></h5-->
<form method="post" id="manageform" action="?post=member">
  <div class="note">
    <input name="username" id="usernamebox" type="text" value="<?php echo $_GET['username']; ?>" size="20" />
    <button type="button" onclick="location.href='?get=member&username='+encodeURIComponent($('usernamebox').value)+''">搜索会员|邮箱</button>
    <br />
    <a href="javascript:void(0)" onclick="allChoose('id[]',1,1);return false;">全选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',1,0);return false;">反选</a> - <a href="javascript:void(0)" onclick="allChoose('id[]',0,0);return false;">不选</a>
    <button name="act" type="button" onclick="chk(this.form,this,'del')">删除</button>
    <button name="act" type="button" onclick="chk(this.form,this,'punished')">置入黑名单</button>
    <button name="act" type="button" onclick="chk(this.form,this,'abnormal')">冻结</button>
    <button name="act" type="button" onclick="chk(this.form,this,'warn')">警告</button>
    | 
    货币值
    <button name="act" type="button" onclick="chk(this.form,this,'addfunds')">加赠</button>
    <input name="addfunds" onkeyup="isDigit(this,'',0,'.')" onfocus="this.form.delfunds.value=''" type="text" size="4" />
    <button name="act" type="button" onclick="chk(this.form,this,'delfunds')">减扣</button>
    <input name="delfunds" onkeyup="isDigit(this,'',0,'.')" onfocus="this.form.addfunds.value=''" type="text" size="4" />
    备注
    <input name="beizhu" type="text" size="6" />
  </div>
  <?php echo $text, $text2, $err, $text_hidden; ?>
  <input type="hidden" name="limit" />
</form>
