<?php
require ('authentication_member.php');
?>
<?php

/* 在线充值 */  
/* 162100源码 - 162100.com */
if (POWER == 0) {
  err('请<a href="./login.php">登陆</a>。');
}
  
if (empty($_POST['total_fee']) || !(is_numeric($_POST['total_fee']) && $_POST['total_fee'] > 0)) {
  err('金额必须是大于0的数字！');
}
$web['cash'] = abs($web['cash']);
if ($_POST['total_fee'] < $web['cash']) {
  err('金额必须达到'.$web['cash'].'。');
}



if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

$result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
$row = db_fetch($db, $result);
$result = NULL;

if ($row) {
  if ($row['check_reg'] == '1') {
	err('帐号注册审核中！');
  } elseif ($row['check_reg'] == '2') {
    err('帐号已被移除至黑名单！');
  //操作前再深层判断一下权限，v3.3加
  } elseif ($session[1].'|'.$session[2] != $row['session_key']) {
    err('经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！');
  } else {
    unset($row);
    //累计收入
    $result = db_query($db, 'SELECT SUM(money) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'"');
    $row = db_fetch($db, $result);
    $total_now = $row['total'] ? $row['total'] : 0;
    $result = NULL;
    unset($row);
    if ($total_now < $web['cash']) {
      err('余额['.$total_now.']不足['.$web['cash'].']！');
    } elseif ($total_now < $_POST['total_fee']) {
      err('余额['.$total_now.']不足['.$_POST['total_fee'].']！');
    } else {
      $date = gmdate("Y-m-d H:i:s", time() + (floatval($web["time_pos"]) * 3600));
      if (db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`description`,`date`,`money`,`other`) values ("'.$session[0].'","0","'.$date.'","-'.$_POST['total_fee'].'","尚未支付")')) {
        alert('提现指令已提交，请等待支付。', !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'member.php?get=funds');
      } else {
        err('提交指令失败！请稍候再试。');
      }
    }
  }
  unset($row);
} else {
  err('帐号不存在！');
}


db_close($db);




?>

