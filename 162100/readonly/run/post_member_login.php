<?php
require ('authentication_member.php');
?>
<?php

/* 登陆处理 */
/* 162100.com源码 */


@ require ('writable/set/set_userface.php');
@ require ('readonly/function/img.php');
@ require ('readonly/function/cutstr.php');
@ require ('readonly/function/filter.php');
@ require ('readonly/function/write_file.php');
if (!function_exists('read_file')) {
  @ require ('readonly/function/read_file.php');
}
//@ require ('readonly/function/get_root_domain.php');

$key = $_POST['key'];
$bar_face = $_POST['bar_face'];


/*
$no_ad = '';
$f = @file_get_contents('v.txt');
$v = '7.9';
if ($f && preg_match('/\$v\s*\=\s*\'(.*)\';/iU', $f, $matches)) {
  $v = base64_decode($matches[1]);
}
$v_162100 = '9.0.1';
  $v_162100_ = abs(preg_replace('/[^\d]+/', '', $v_162100));
  $v_        = abs(preg_replace('/[^\d]+/', '', $v));
  $len = strlen($v_162100_) >= strlen($v_) ? strlen($v_162100_) : strlen($v_);
  $v_162100_ = str_pad($v_162100_, $len, 0);
  $v_        = str_pad($v_, $len, 0);
  if ($v_ >= $v_162100_) {
$_POST_password = $_POST['password'];
$_POST_password_again = $_POST['password_again'];
$_POST_password_new = $_POST['password_new'];


  } else {
*/
$_POST_password = strtolower($_POST['password']);
$_POST_password_again = strtolower($_POST['password_again']);
$_POST_password_new = strtolower($_POST['password_new']);
/*
  }
*/


$_POST = array_map('tirm_all', $_POST);

//print_r($_POST);die;








$loc = !empty($_REQUEST['location']) ? $_REQUEST['location'] : (!empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './');
$date = gmdate("Y-m-d H:i:s", time() + (floatval($web["time_pos"]) * 3600));



//注销
if ($_REQUEST['act'] == 'logout') {
  @ setcookie('usercookie', '', time() - 366 * 60 * 60, '/', '.'.$web['root']);
  @ setcookie('usercookie', '', time() - 366 * 60 * 60, '/');

  $err = '
  <script language="javascript" type="text/javascript">
  <!--
  if(parent){
    if(parent.document.getElementById(\'addCFrame\')!=null){
      var oUrl="href=\"login_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
    } else {
      var oUrl="href=\"login.php\" target=\"_self\"";
    }
    try{parent.$(\'mylog\').innerHTML=\'';
if (is_array($web['login_key']) && count($web['login_key']) > 0) {
  foreach (array_keys($web['login_key']) as $lv) {
    //$err .= '<a href="javascript:void(0);" onclick="toQzoneLogin(\\\''.$lv.'\\\');return false;" title="用'.@file_get_contents('login_key/'.$lv.'/title.txt').'帐号登录"><img src="readonly/images/'.$lv.'.png" width="16" height="16" /></a> ';
    unset($lv);
  }
}

$err .= '<a \'+oUrl+\' title="进入用户控制台\n进行个性化管理">登陆</a>\';}catch(err){}
    try{ parent.document.getElementById("addCFrame").style.display="none"; parent.delSubmitSafe(); }catch(err){}
    

  }
  -->
  </script>';
  $loc = strstr($loc, 'login.php') ? './' : $loc;
  alert($err.'注销成功，欢迎再来', $loc);


//登陆
} elseif ($_POST['act'] == 'login') {

/*
  if ($_POST['logintype'] == 'email') {
    if (empty($_POST['username']) || !preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['username'])) {
      err('提交被拒绝！若用邮箱登陆帐户，用户名请填：xxx@xxx.xxx(.xx) 格式！');
    }
    $e__ = '$result = db_query($db, \'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE email="'.$_POST['username'].'"\');';
  } else {
    if (empty($_POST['username']) || !preg_match('/^([^\x00-\x7f]|\w|\.){3,45}$/', $_POST['username'])) {
      err('提交被拒绝！若用用户名登陆帐户，用户名请用汉字、数字、英文及字符 _ 或 . 组成！长度范围为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文或数字或英语符号可输入45字。');
    }
    $_POST['username'] = str_replace('.', '&#46;', $_POST['username']);
    $e__ = '$result = db_query($db, \'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$_POST['username'].'" LIMIT 1\');';
  }
*/


  if (empty($_POST['username'])) {
    err('提交被拒绝！用户名不能空！');
  }
  /*
  if (empty($_POST_password) || !preg_match('/^[^\s\\\]{3,30}$/', $_POST_password)) {
    err('提交被拒绝！密码——长度请控制在3-30个字符之内。不能有空格和 \ 。');
  }
  */
  if (empty($_POST_password) || !preg_match('/^.{3,30}$/', $_POST_password)) {
    err('提交被拒绝！密码——长度请控制在3-30个字符之内。');
  }
  if (isset($_COOKIE['usercookie'])) {
    /*
    $session = @explode('|', $_COOKIE['usercookie']);
    err('您已经以 用户名：'.$session[0].' 登陆过了！<br />要想更换用户名登陆，请先<a href="member.php?post=login&act=logout&location=login.php">退出</a>。');
    */

    if (empty($_POST['imcode']) || !is_numeric($_POST['imcode']))
      err('必须准确填写数字验证码！<span class="gray">（如看不到验证码，请返回刷新页面）</span>');
    if ($_POST['imcode'] != $_COOKIE['regimcode'])
      err('验证码不符！<span class="gray">（如看不到验证码，请返回刷新页面）</span>');
  }

  $err = '';
  if ($_POST['save_cookie'] && ($_POST['save_cookie'] != 31536000 && $_POST['save_cookie'] != 1209600 && $_POST['save_cookie'] != 2592000)) {
    $_POST['save_cookie'] = -1;
  }
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.str_replace('.', '&#46;', $_POST['username']).'" OR email="'.$_POST['username'].'" LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;

    if (is_array($row) && count($row) > 0) {
      if (/*$web['stop_reg'] == 2 && */$row['check_reg'] == '1') {
        err('您的注册尚未通过审批！无法登陆。');
      }
      if ($row['check_reg'] == '2') {
        err('您的帐户已被管理员移除至黑名单。');
      }
      if ($row['check_reg'] == '3') {
        $stop_err = '<b style="color:#FF6600">您的帐户已被冻结，创收暂时关停。请等待审核认定无异常后开启。</b>';
        //err('您的帐户已被异常关停，请等待审核后开启。');
      } elseif ($row['check_reg'] == '4') {
        $stop_err = '<b style="color:#FF6600">您的帐户已被置入系统观察队列！</b>';
        //err('您的帐户已被置入系统观察队列！');
      }

      if (is_numeric($web['stop_login']) && $web['stop_login'] > 0 && $row['username'] != $web['manager']) {
        $stop_num = abs($row['stop_login']);
        if (is_numeric($stop_num) && $stop_num >= $web['stop_login'] && substr($row['thisdate'], 0, 10) == substr($date, 0, 10)) {
          err('您登录密码已输错'.$stop_num.'次！今天无法再登录。');
        }
      }

	  if ($row['password'] == md162100($_POST_password)){
	    $you = array(
          'name'  => $row['username'],
	      'key'   => $date.'|'.s_rand(16),
        );
        if ($you['name'] == $web['manager']) {
          if (!file_exists('writable/__temp__')) {
	        if (!@mkdir('writable/__temp__')) {
              err('上载目录writable/__temp__不存在或创建失败！请稍候重新登陆再试。');
            }
          }
          write_file('writable/__temp__/'.urlencode($you['name']).'.php', '<?php die(); ?>'.$you['key'].''); //登陆密钥记录
        }

        setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web['time_pos']) * 3600 + $_POST['save_cookie'], '/', '.'.$web['root']);
        setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web['time_pos']) * 3600 + $_POST['save_cookie'], '/');

        $err = '
        <script language="javascript" type="text/javascript">
        <!--
        if(parent){
          if(parent.document.getElementById(\'addCFrame\')!=null){
            var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
            var bUrl=" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
          } else {
            var oUrl="href=\"member.php\" target=\"_self\"";
            var bUrl=" target=\"_self\"";
          }
          try{parent.$(\'mylog\').innerHTML=\'<a \'+oUrl+\' title="进入用户中心\n进行个性化管理">'.$you['name'].'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';}catch(err){}
        }
        -->
        </script>';

        //判断列session_key是否存在，不存在创建
        //$result_session = db_query($db, 'SELECT session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$web['manager'].'" LIMIT 1');
        //$row_session = db_fetch($db, $result_session);
        //if (!isset($row_session['session_key'])) {
          db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `session_key` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ""');
          //4.1 to 4.2 增加一列
          db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` ADD COLUMN `fettle` int(2) NOT NULL DEFAULT "0"');
        //}alter table user modify column name varchar(50) ;
        //$result_session = NULL;
        //db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `stop_login` int(2) NOT NULL DEFAULT "0"');

        db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET thisdate="'.$date.'",session_key="'.$you['key'].'",stop_login="0" WHERE username="'.$row['username'].'" LIMIT 1'); //更新最后访问时间和密钥

        //假如用户创收模式被开启（不计管理员）
        if ($web['addfunds'] == 1 && $row['username'] != $web['manager'] && ($row['check_reg'] == '0' || $row['check_reg'] == '4')) {

          $ip = user_ip();
          //给自己加分
          if (is_numeric($web['loginadd']) && $web['loginadd'] > 0) {
            $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
            $row_f = db_fetch($db, $result);
            $n_f = abs($row_f['total']);
            $result = NULL;
            unset($row_f);
            if ($n_f == 0) {
              db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`) VALUES ("'.$row['username'].'","'.$ip.'","2","'.$web['loginadd'].'","'.$date.'")');

              setcookie('yourpcaddfunds', '1', time() + (86400 - gmdate('G', time() + floatval($web["time_pos"]) * 3600) * 3600 - gmdate('i', time() + floatval($web["time_pos"]) * 3600) * 60 - gmdate('s', time() + floatval($web["time_pos"]) * 3600) + floatval($web["time_pos"]) * 3600), '/');
              //'.get_root_domain($web['sitehttp'], '; domain=.').'

              $err_addfunds .= '（您已获得'.$web['loginadd'].'货币值 <span id="get_coin">&nbsp;</span>）';

            } else {
              $err_addfunds .= '（<span class="redword">提示：您的IP今日已有用户登陆过，不再赠送货币值。</span>）';
            }
          }
          //给上线加分
          if (substr($row['thisdate'], 0, 10) != substr($date, 0, 10) && (is_numeric($web['loginadd2']) && $web['loginadd2'] > 0)) {
            if (!empty($row['recommendedby'])) {
              if (!isset($n_f)) {
                $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
                $row_f = db_fetch($db, $result);
                $n_f = abs($row_f['total']);
                $result = NULL;
                unset($row_f);
              }
              if ($n_f == 0) {
                $result = db_query($db, 'SELECT username FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$row['recommendedby'].'" AND (check_reg="0" OR check_reg="4") LIMIT 1');
                $row_f = db_fetch($db, $result);
                $username_f = $row_f['username'] ;
                $result = NULL;
                unset($row_f);
                if (!empty($username_f)) {
                  db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$username_f.'","'.$ip.'","5","'.$web['loginadd2'].'","'.$date.'","下线['.$you['name'].']登陆")');
                }
              }
            }
          }
        }

        $yougourl = '<table width="100%" border="0" cellspacing="10" cellpadding="0" class="wherego"><tr>';
        $yougourl .= '<td class="whereyou">您可以选择去向：</td><td align="left"><ul><li><a href="./" target="_parent">首页</a></li>'.($you['name'] == $web['manager'] ? '<li><a href="webmaster_central.php" target="_parent">管理员中心</a></li>' : '').'<li><a href="member.php" target="_parent">用户中心</a></li>'.($loc!='./'?'<li><a href="'.$loc.'"'.(preg_match('/mingz|current/i', $loc) ? '' : ' target="_parent"').'>先前页面：'.$loc.'</a></li>':'<script>
function parClose(){
  par=parent.document.getElementById("addCFrame");
  if (par!=null){
    par.style.display="none";
    parent.delSubmitSafe();
  }
}

setTimeout("parClose();",5000);

</script>').'</ul></td>';
        $yougourl .= '</tr>
</table>';
        
        alert('<span style="line-height:16px">登陆成功！欢迎您 '.$you['name'].''.$err_addfunds.''. $yougourl.''.$err.''.$stop_err.'</span>', substr($loc, 0, 9) == 'member.php' ? './' : $loc);
	  } else {

        if (is_numeric($web['stop_login']) && $web['stop_login'] > 0 && $row['username'] != $web['manager']) {
          if (substr($row['thisdate'], 0, 10) == substr($date, 0, 10)) { //当天
            $stop_add = abs($row['stop_login'])+1;
          } else {
            $stop_add = 1;
          }
          db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `stop_login` int(2) NOT NULL DEFAULT "0"');
          //err($sql['db_err']);
          db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET thisdate="'.$date.'",stop_login="'.$stop_add.'" WHERE username="'.$row['username'].'" LIMIT 1');
          $s_l_s = '<br />您已经'.$stop_add.'次输错密码。今天还剩'.($web['stop_login'] - $stop_add).'次登录机会';
        }
        if ($_POST['username'] != $web['manager']) {
          err('密码不符！'.$s_l_s);
        } else {
          base_manager_login();
        }

	  }

    } else {
      if ($_POST['username'] != $web['manager']) {
        err('登陆失败！原因：1、用户尚未注册；2、表连接不成功或尚未建立！');
      } else {
        base_manager_login(1);
      }
	}
  } else {
    base_manager_login();
  }
  db_close($db);


} elseif ($_POST['act'] == 'reg') {

  if ($web['stop_reg'] == 1) {
    err('当前系统设置为：禁止新用户注册。');
  } elseif ($web['stop_reg'] == 2) {
    $check1 = ',`check_reg`';
    $check2 = ',"1"';
    $check3 = '（此次注册需要审批，请耐心等待）。';
  } else {
    $check3 = '';
  }

  if (!empty($session[0])) {
    err('您已经以 用户名：'.$session[0].' 登陆过了！要想更换用户名注册，请先<a href="member.php?post=login&act=logout&location='.urlencode($loc).'">退出</a>。');
  }
  /*
  if (empty($_POST['username']) || !preg_match('/^([^\x00-\x7f]|\w|\.){3,45}$/', $_POST['username'])) {
    err('提交被拒绝！用户名请用汉字、数字、英文及字符 _ 或 . 组成！长度范围为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文或数字或英语符号可输入45字。');
  }
  */
  if (empty($_POST['username'])) {
    err('提交被拒绝！用户名不能空！');
  }
  if (strlen($_POST['username']) < 3 || strlen($_POST['username']) > 45) {
    err('提交被拒绝！用户名长度范围为3-45字符！');
  }
  if (preg_match('/admin|manager|管理员|版主|斑竹|访客|系统欢迎信|162100|furuijinzhao|操|temp|info|mess|mail|请输入用户名/i', $_POST['username'], $matches)) {
    err('提交被拒绝！用户名中含'.$matches[0].'，未获通过。');
  }

  $_POST['username'] = str_replace('.', '&#46;', $_POST['username']);

  if (empty($_POST_password) || !preg_match('/^[^\s\\\]{3,30}$/', $_POST_password)) {
    err('提交被拒绝！密码——长度请控制在3-30个字符之内。不能有空格和 \ 。');
  }
  if ($_POST_password_again == '') {
    err('密码重输不能留空！');
  }
  if ($_POST_password != $_POST_password_again) {
    err('两次密码输得不一样！');
  }
  fil();
  if (file_exists('writable/require/statement.txt')) {
    if (!(isset($_POST['reg_statement']) && $_POST['reg_statement'] == 1)) {
      err('请阅读及点选《注册声明》');
    }
  }
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }
  
  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$_POST['username'].'" OR email="'.$_POST['username'].'"');
  $row = db_fetch($db, $result);
  if (abs($row['total']) > 0) {
    err('此用户名已被注册！');
  }
  $result = NULL;
  unset($row);
  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$_POST['email'].'" OR email="'.$_POST['email'].'"');
  $row = db_fetch($db, $result);
  if (abs($row['total']) > 0) {
    err('此邮箱已有人使用！');
  }
  $result = NULL;
  unset($row);

  $check4 = '';
  //$messline = "".preg_replace("/[^\d]+/", "", $date)."|".$web['manager']."|欢迎加入".$web["sitename"]."！|欢迎加入！请保持持续热情支持".$web["sitename"]."，并欢迎积极发表、反馈问题。||| \n";
  if (!empty($_COOKIE['alliancekey']) && is_numeric($_COOKIE['alliancekey'])) {
    $result = db_query($db, 'SELECT username FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE id="'.$_COOKIE['alliancekey'].'" AND (check_reg="0" OR check_reg="4") LIMIT 1');
    $row_f = db_fetch($db, $result);
    $username_f = $row_f['username'] ;
    $result = NULL;
    unset($row_f);
    if ($_POST['username'] != $username_f) {
      $check4 = ''.$username_f.'';
      $check5 = $username_f;
    }
  }
  $session_key = $date.'|'.s_rand(16);

  //判断列session_key是否存在，不存在创建
  //$result_session = db_query($db, 'SELECT session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$web['manager'].'"');
  //$row_session = db_fetch($db, $result_session);
  //if (!isset($row_session['session_key'])) {
    db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `session_key` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ""');
  //}
  //$result_session = NULL;
  if (db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` (`username`,`password`,`email`,`regdate`,`thisdate`,`collection`,`notepad`,`face`,`memory_website`'.$check1.',`recommendedby`,`session_key`) values ("'.$_POST['username'].'","'.md162100($_POST_password).'","'.$_POST['email'].'","'.$date.'","'.$date.'","","","",""'.$check2.',"'.$check4.'","'.$session_key.'")')) {
    $secces = 1;
  }
  if ($secces == 1) {
    if ($web['stop_reg'] != 2) {
      $you = array(
        'name'  => $_POST['username'],
        'key'   => $session_key,
      );
      //用js设置cookie，因为前面已有输出
      setcookie('usercookie', ''.@implode('|',$you).'|'.$check5.'||'.$web['path'], time() + floatval($web['time_pos']) * 3600, '/', '.'.$web['root']);
      setcookie('usercookie', ''.@implode('|',$you).'|'.$check5.'||'.$web['path'], time() + floatval($web['time_pos']) * 3600, '/');

      $err = '
      <script language="javascript" type="text/javascript">
      <!--
      if(parent){
        if(parent.document.getElementById(\'addCFrame\')!=null){
          var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
          var bUrl=" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
        } else {
          var oUrl="href=\"member.php\" target=\"_self\"";
          var bUrl=" target=\"_self\"";
        }
        try{parent.$(\'mylog\').innerHTML=\'<a \'+oUrl+\' title="进入用户中心\n进行个性化管理">'.$you['name'].'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';}catch(err){}
      }
      -->
      </script>';
    }

    //假如用户创收模式被开启
    if ($web['addfunds'] == 1) {
      @ require ('readonly/function/reg_add_funds.php');

      $ip = user_ip();
      if (is_numeric($web['loginadd']) && $web['loginadd'] > 0) {
        //给自己加分
        $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
        $row_f = db_fetch($db, $result);
        $n_f = abs($row_f['total']);
        $result = NULL;
        unset($row_f);
        if ($n_f < abs($web['loginadd_limit_ip'])) {
          db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$_POST['username'].'","'.$ip.'","1","'.add_funds_from_reg().'","'.$date.'","")');

          setcookie('yourpcaddfunds', '1', time() + (86400 - gmdate('G', time() + floatval($web["time_pos"]) * 3600) * 3600 - gmdate('i', time() + floatval($web["time_pos"]) * 3600) * 60 - gmdate('s', time() + floatval($web["time_pos"]) * 3600) + floatval($web["time_pos"]) * 3600), '/');

          $err_addfunds .= '（您已获得'.add_funds_from_reg().'货币值 <span id="get_coin">&nbsp;</span>）';
        } else {
          $err_addfunds .= '（<span class="redword">提示：您的客户端IP今日已有'.$n_f.'人次注册或登陆过，超过了每IP每日限定'.abs($web['loginadd_limit_ip']).'次计赠货币值，故无法再为您赠送货币值。</span>)';
        }
      }
      if (is_numeric($web['loginadd2']) && $web['loginadd2'] > 0) {
        //给上线加分
        if ($check4 != '') {
          if (!isset($n_f)) {
            $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
            $row_f = db_fetch($db, $result);
            $n_f = abs($row_f['total']);
            $result = NULL;
            unset($row_f);
          }
          if ($n_f < abs($web['loginadd_limit_ip'])) {
            db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$username_f.'","'.$ip.'","4","'.add_funds_from_reg_subordinate().'","'.$date.'","来自推广URL['.$web['sitehttp'].'?'.$_COOKIE['alliancekey'].']['.$_POST['username'].']注册")');
          }
        }
      }
    }

    db_close($db);


    $yougourl = '<table width="100%" border="0" cellspacing="10" cellpadding="0" class="wherego"><tr>';
    $yougourl .= '<td class="whereyou">您可以选择去向：</td><td align="left"><ul><li><a href="./" target="_parent">首页</a></li><li><a href="member.php" target="_parent">用户中心</a></li><li><a href="'.$loc.'"'.(preg_match('/mingz|current/i', $loc) ? '' : ' target="_parent"').'>先前页面：'.$loc.'</a></li></ul></td>';
    $yougourl .= '</tr>
</table>';


  /*
  发送邮件-------------------
  */
    if ($web['mail_send'] == 1) {
      @ require ('writable/set/set_mail.php');
      $web['mailer'] = !isset($web['mailer']) ? 0 : abs($web['mailer']);
      $web['smtpsecure'] = !isset($web['smtpsecure']) ? '' : ($web['smtpsecure']=='ssl'?'ssl':'');
      $mailerboty = array(0=>'readonly/function/mail_class.php', 1=>'PHPMailer-master/index.php');

      if (@file_exists($mailerboty[$web['mailer']])) {

        $web['mailto_subject_reg'] = !empty($web['mailto_subject_reg']) ? $web['mailto_subject_reg'] : '欢迎注册[<{sitename2}>]';
        $web['mailto_content_reg'] = !empty($web['mailto_content_reg']) ? $web['mailto_content_reg'] : '　　欢迎加入[<{sitename2}>]！<br />　　请保持持续热情支持[<{sitename}>]，并欢迎积极发表、反馈问题。<br />　　我们的站址为：<a href="<{webpath}>" target="_blank"><{webpath}></a>，欢迎光临。<br /><br /><br /><br /><font color=#999999>如果不是您本人使用此邮箱进行的注册，您可至<a href="<{webpath}>" target="_blank"><{webpath}></a>与管理员取得联系，我们将对冒用您邮箱的用户进行删除。</font>';

        $mailarr['subject'] = ''.filter_mail($web['mailto_subject_reg']).''.$check3.'';
        $mailarr['content'] = ''.filter_mail($web['mailto_content_reg']).'';


        if ($web['mailer'] == 0) {
          $mailarr['subject'] = "=?UTF-8?B?".base64_encode($mailarr['subject'])."?="; //此行解决utf-8编码邮件标题乱码
        }
        @ require ($mailerboty[$web['mailer']]);

        $to = $_POST['email']; //收件人 
        if (!mailer_send($to)) { 
          echo '<br />系统尝试连接您的邮箱['.$to.']并发送失败！原因：可能是您所填写的邮箱无效。请仔细填写并检查，或返回重试。';
        }
      } else {
        echo '<br />邮件发送插件未安装！';
      }
    }

    alert('<span style="line-height:16px">注册成功！欢迎您 '.$you['name'].''.$err_addfunds.''.$check3.$yougourl.$err.'</span>', $loc);

  } else {
    err('注册不成功！['.$sql['db_err'].']');
  }





//找回密码
} elseif ($_POST['act'] == 'foundpassword') {
  /*
  if (empty($_REQUEST['username']) || !preg_match('/^([^\x00-\x7f]|\w|\.){3,45}$/', $_REQUEST['username'])) {
    err('提交被拒绝！用户名请用汉字、数字、英文及字符 _ 或 . 组成！长度范围为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文或数字或英语符号可输入45字。');
  }
  */

  if (empty($_POST['username'])) {
    err('提交被拒绝！用户名或邮箱不能空！');
  }
  /*
  if (strlen($_REQUEST['username']) < 3 || strlen($_REQUEST['username']) > 45) {
    err('提交被拒绝！用户名长度范围为3-45字符！');
  }
  */
  if ($session[0] == $web['manager'] || $_POST['username'] == $web['manager']) {
    err('禁止以管理员名义进行此项！管理员修改密码请到后台“基本参数管理”');
  }
  //$new_password=strtolower(s_rand(8));
  $new_password=s_rand(8);
  $new_password_encode=md162100($new_password);
  
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }

  $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.str_replace('.', '&#46;', $_POST['username']).'" OR email="'.$_POST['username'].'" LIMIT 1');
  $row = db_fetch($db, $result);
  $result = NULL;
  if (is_array($row) && count($row) > 0) {
    if ($row['username'] == $web['manager']) {
      err('禁止以管理员名义进行此项！管理员修改密码请到后台“基本参数管理”');
    }
    if ($row['check_reg'] == 1) {
      err('注册审核中！');
    } elseif ($row['check_reg'] == 2) {
      err('你已被置入黑名单！');
    } else {
      if (is_numeric($web['stop_login']) && $web['stop_login'] > 0) {
        $stop_num = abs($row['stop_login']);
        if (is_numeric($stop_num) && $stop_num >= $web['stop_login'] && substr($row['thisdate'], 0, 10) == substr($date, 0, 10)) {
          err('找回密码系统只允许执行'.$stop_num.'次！你今天找回密码（含登录时密码输错）已超过此限，无法再执行。');
        }
      }
      if (is_numeric($web['stop_login']) && $web['stop_login'] > 0) {
        if (substr($row['thisdate'], 0, 10) == substr($date, 0, 10)) { //当天
          $stop_add = abs($row['stop_login'])+1;
        } else {
          $stop_add = 1;
        }
        $evfor=',thisdate="'.$date.'",stop_login="'.$stop_add.'"';
        $s_l_s = '<br />您已经'.$stop_add.'次找回密码。今天还剩'.($web['stop_login'] - $stop_add).'次找回（含登录）机会';
      }

      @ require ('writable/set/set_mail.php');
      $web['mailer'] = !isset($web['mailer']) ? 0 : abs($web['mailer']);
      $web['smtpsecure'] = !isset($web['smtpsecure']) ? '' : ($web['smtpsecure']=='ssl'?'ssl':'');
      $mailerboty = array(0=>'readonly/function/mail_class.php', 1=>'PHPMailer-master/index.php');

      if (@file_exists($mailerboty[$web['mailer']])) {
        $web['mailto_subject_forpsw'] = !empty($web['mailto_subject_forpsw']) ? $web['mailto_subject_forpsw'] : '找回密码[<{sitename2}>]';
        $web['mailto_content_forpsw'] = !empty($web['mailto_content_forpsw']) ? $web['mailto_content_forpsw'] : '你好！<br />　　你在[<{sitename2}>]进行找回密码，新的密码为：<{newpassword}><br />请点此链接<a href="<{webpath}>login.php" target="_blank"><{webpath}>login.php</a>登录。';

        $web['newpassword'] = $new_password;
        $mailarr['subject'] = filter_mail($web['mailto_subject_forpsw']);
        $mailarr['content'] = filter_mail($web['mailto_content_forpsw']);

        if ($web['mailer'] == 0) {
          $mailarr['subject'] = "=?UTF-8?B?".base64_encode($mailarr['subject'])."?="; //此行解决utf-8编码邮件标题乱码
        }
        @ require ($mailerboty[$web['mailer']]);

        $to = $row['email']; //收件人 
        if (!mailer_send($to)) {
          err('系统尝试连接您的邮箱['.$to.']并发送失败！原因：可能是您所填写的邮箱无效。请仔细填写并检查，或返回重试。如有疑问可<a href="list.php?area_id=96" target="_blank">站内留言</a>'.$s_l_s.'。');
        }
      } else {
        err('邮件发送插件未安装！');
      }
      db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET password="'.$new_password_encode.'"'.$evfor.' WHERE id="'.$row['id'].'"');
      err('密码已发往你的邮箱。请前往你的邮箱查看。', 'ok');
    }
  } else {
    err('出错！数据库查无此帐号！请稍候再试');
  }
  db_close($db);




//修改注册信息
} elseif ($_POST['act'] == 'regfilemodify') {

  //身份验证
  define('POWER', confirm_power());

  if (POWER == 0) {
    err('系统检测你未登陆，没有权限。');
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

  if (empty($_POST['email']) || !preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['email']) || strlen($_POST['email']) > 255) {
    err('email必填！格式：xxx@xxx.xxx(.xx) 。');
  }

  if ($_POST_password_new != '') {

    if (POWER == 5) {
      err('禁止管理员在此进行密码修改！修改密码请到管理员后台“系统参数”中进行。');
    }

    $result = db_query($db, 'SELECT id,password FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$session[0].'" LIMIT 1');
	if ($row = db_fetch($db, $result)) {
      if (!empty($row['password'])) {
        if ($_POST_password == '') {
          err('请输入原密码！');
	    }
        if (md162100($_POST_password) != $row['password']) {
          err('原密码输入错误！与档案不符。');
	    }
      } else {
      }
      unset($row);
	} else {
	  $err .= '<br />密码修改失败（数据库读取失败）。';
	}
	$result = NULL;
    if (!preg_match('/^[^\s\\\]{3,30}$/', $_POST_password_new)) {
      err('提交被拒绝！密码——长度请控制在3-30个字符之内。不能有空格和 \ 。');
    }
    if ($_POST_password_again != $_POST_password_new) {
      err('提交被拒绝！确认密码，请确保两次密码都输入且一样。');
	}
    $pppp = 'password="'.md162100($_POST_password_new).'",';
  }
  //fil();

  if (!empty($_POST['realname']) && !preg_match('/^([^\x00-\x7f]|[a-zA-Z]){3,45}$/', $_POST['realname'])) {
    err('真实姓名请用汉字、英文组成！长度范围为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文可输入45字');
  }
  if (!empty($_POST['alipay']) && (!preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['alipay']) || strlen($_POST['alipay']) > 255)) {
    err('支付宝填：xxx@xxx.xxx(.xx) 格式');
  }
  if (!empty($_POST['bank']) && !preg_match('/^([^\x00-\x7f]|[a-zA-Z0-9]){14,255}$/', $_POST['bank'])) {
    err('请检查！开户银行（用中文或英文）+帐户（数字）');
  }

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE email="'.$_POST['email'].'" AND username<>"'.$session[0].'"');
  $row = db_fetch($db, $result);
  if (abs($row['total']) > 0) {
    err('此邮箱已有人使用！');
  }
  unset($row);
  $result = NULL;

  if (db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` SET '.$pppp.'
  email="'.$_POST['email'].'",
  realname="'.$_POST['realname'].'",
  alipay="'.$_POST['alipay'].'",
  bank="'.$_POST['bank'].'"
  WHERE username="'.$session[0].'"')) {

    $secces = 1;
  }
  db_close($db);

  if ($secces == 1) {


    if ($web['mail_send'] == 1) {

      @ require ('writable/set/set_mail.php');
      $web['mailer'] = !isset($web['mailer']) ? 0 : abs($web['mailer']);
      $web['smtpsecure'] = !isset($web['smtpsecure']) ? '' : ($web['smtpsecure']=='ssl'?'ssl':'');
      $mailerboty = array(0=>'readonly/function/mail_class.php', 1=>'PHPMailer-master/index.php');

      if (@file_exists($mailerboty[$web['mailer']])) {
        $web['mailto_subject_file'] = !empty($web['mailto_subject_file']) ? $web['mailto_subject_file'] : '个人信息修改成功[<{sitename2}>]';
        $web['mailto_content_file'] = !empty($web['mailto_content_file']) ? $web['mailto_content_file'] : '　　您已成功修改了个人信息[<{sitename2}>]！<br />　　请保持持续热情支持[<{sitename}>]，并欢迎积极发表、反馈问题。<br />　　我们的站址为：<a href="<{webpath}>" target="_blank"><{webpath}></a>，欢迎光临。<br /><br /><br /><br /><font color=#999999>如果不是您本人使用此邮箱进行的注册，您可至<a href="<{webpath}>" target="_blank"><{webpath}></a>与管理员取得联系，我们将对冒用您邮箱的用户进行删除。</font>';

        $mailarr['subject'] = filter_mail($web['mailto_subject_file']);
        $mailarr['content'] = filter_mail($web['mailto_content_file']);


        if ($web['mailer'] == 0) {
          $mailarr['subject'] = "=?UTF-8?B?".base64_encode($mailarr['subject'])."?="; //此行解决utf-8编码邮件标题乱码
        }

        @ require ($mailerboty[$web['mailer']]);
        $to = $_POST['email']; //收件人
        mailer_send($to);
        //if (!mailer_send($to)) {
        //  echo '系统尝试连接您的邮箱['.$to.']并发送失败！原因：可能是您所填写的邮箱无效。请仔细填写并检查，或返回重试。';
        //}
      } else {
        //echo '<br />邮件发送插件未安装！';
      }
    }

    alert('修改成功！'.$err.'', $loc);
  } else {
    //echo $sql['db_err'];
    err('修改不成功！可能你未做改动。'.$err.'');
  }


//绑定
} elseif ($_POST['act'] == 'tie') {

  if ($_POST['bar'] == 'qq') {
    if (!$key || strlen($key) != 64) {
      err('参数key缺失或错误！');
    }
  } elseif ($_POST['bar'] == 'weibo') {
    if (!$key || strlen($key) != 10) {
      err('参数key缺失或错误！');
    }
  } elseif ($_POST['bar'] == 'baidu') {
    if (!$key) {
      err('参数key缺失或错误！');
    }
 //
  } elseif ($_POST['bar'] == '162100') {
    if (!$key) {
      err('参数key缺失或错误！');
    }
 //
  } else {
    err('参数bar缺失或错误！');
  }


  if (empty($_POST['username'])) {
    err('提交被拒绝！用户名不能空！');
  }
  if (empty($_POST_password) || !preg_match('/^.{3,30}$/', $_POST_password)) {
    err('提交被拒绝！密码长度3-30个字符之内。');
  }

  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }

  $result = db_query($db, 'SELECT COUNT(id) AS n FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE login_key_'.$_POST['bar'].'="'.$key.'"');
  $row = db_fetch($db, $result);
  $result = NULL;
  if ($row['n'] > 0) {
    err('已经绑定过了！请先解除已存在的['.$_POST['bar'].']绑定。');
  }
  unset($row);

  $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.str_replace('.', '&#46;', $_POST['username']).'" OR email="'.$_POST['username'].'"');
  $row = db_fetch($db, $result);
  $result = NULL;

  if (is_array($row) && count($row) > 0) {
    if (/*$web['stop_reg'] == 2 && */$row['check_reg'] == '1') {
      err('用户 '.$_POST['username'].' 的注册尚未通过审批！无法绑定。');
    }
    if ($row['check_reg'] == '2') {
      err('用户 '.$_POST['username'].' 已被移除至黑名单。');
    }

    if($row['password'] == md162100($_POST_password)){
      $you = array(
        'name'  => $row['username'],
	    'key'   => $date.'|'.s_rand(16),
      );
      if ($you['name'] == $web['manager']) {
        if (!file_exists('writable/__temp__')) {
	      if (!@mkdir('writable/__temp__')) {
            err('上载目录writable/__temp__不存在或创建失败！请稍候重新登陆再试。');
          }
        }
        write_file('writable/__temp__/'.urlencode($you['name']).'.php', '<?php err(); ?>'.$you['key'].''); //登陆密钥记录
      }

      setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web["time_pos"]) * 3600 + 31536000, '/', '.'.$web['root']);
      setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web["time_pos"]) * 3600 + 31536000, '/');

      $err = '
        <script language="javascript" type="text/javascript">
        <!--
      if(parent){
        if(parent.document.getElementById(\'addCFrame\')!=null){
          var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
          var bUrl=" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
        } else {
          var oUrl="href=\"member.php\" target=\"_self\"";
          var bUrl=" target=\"_self\"";
        }
        try{parent.$(\'mylog\').innerHTML=\'<a \'+oUrl+\' title="进入用户中心\n进行个性化管理">'.$you['name'].'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';}catch(err){}
      }

        -->
        </script>';

      db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `login_key_'.$_POST['bar'].'` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ""');
      db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET thisdate="'.$date.'",session_key="'.$you['key'].'",login_key_'.$_POST['bar'].'="'.$key.'" WHERE username="'.$row['username'].'" LIMIT 1');//

      //假如用户创收模式被开启（不计管理员）
      if ($web['addfunds'] == 1 && $row['username'] != $web['manager'] && ($row['check_reg'] == '0' || $row['check_reg'] == '4')) {

        $ip = user_ip();
        //给自己加分
        if (is_numeric($web['loginadd']) && $web['loginadd'] > 0) {
          $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
          $row_f = db_fetch($db, $result);
          $n_f = abs($row_f['total']);
          $result = NULL;
          unset($row_f);
          if ($n_f == 0) {
            db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`) VALUES ("'.$row['username'].'","'.$ip.'","2","'.$web['loginadd'].'","'.$date.'")');

            setcookie('yourpcaddfunds', '1', time() + (86400 - gmdate('G', time() + floatval($web["time_pos"]) * 3600) * 3600 - gmdate('i', time() + floatval($web["time_pos"]) * 3600) * 60 - gmdate('s', time() + floatval($web["time_pos"]) * 3600) + floatval($web["time_pos"]) * 3600), '/');

            $err_addfunds .= '（您已获得'.$web['loginadd'].'货币值 <span id="get_coin">&nbsp;</span>）';

          } else {
            $err_addfunds .= '（<span class="redword">提示：您的IP今日已有用户登陆过，不再赠送货币值。</span>）';
          }
        }
        //给上线加分
        if (substr($row['thisdate'], 0, 10) != substr($date, 0, 10) && (is_numeric($web['loginadd2']) && $web['loginadd2'] > 0)) {
          if (!empty($row['recommendedby'])) {
            if (!isset($n_f)) {
              $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
              $row_f = db_fetch($db, $result);
              $n_f = abs($row_f['total']);
              $result = NULL;
              unset($row_f);
            }
            if ($n_f == 0) {
              $result = db_query($db, 'SELECT username FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$row['recommendedby'].'" AND (check_reg="0" OR check_reg="4") LIMIT 1');
              $row_f = db_fetch($db, $result);
              $username_f = $row_f['username'] ;
              $result = NULL;
              unset($row_f);
              if (!empty($username_f)) {
                db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$username_f.'","'.$ip.'","5","'.$web['loginadd2'].'","'.$date.'","下线['.$you['name'].']登陆")');
              }
            }
          }
        }
      }

        $yougourl = '<table width="100%" border="0" cellspacing="10" cellpadding="0" class="wherego"><tr>';
        $yougourl .= '<td class="whereyou">您可以选择去向：</td><td align="left"><ul><li><a href="./" target="_parent">首页</a></li>'.($you['name'] == $web['manager'] ? '<li><a href="webmaster_central.php" target="_parent">管理员中心</a></li>' : '').'<li><a href="member.php" target="_parent">用户中心</a></li>'.($loc!='./'?'<li><a href="'.$loc.'"'.(preg_match('/mingz|current/i', $loc) ? '' : ' target="_parent"').'>先前页面：'.$loc.'</a></li>':'<script>
function parClose(){
  par=parent.document.getElementById("addCFrame");
  if (par!=null){
    par.style.display="none";
    parent.delSubmitSafe();
  }
}

setTimeout("parClose();",1000);

</script>').'</ul></td>';
        $yougourl .= '</tr>
</table>';


      alert('<span style="line-height:16px">绑定成功！欢迎您 '.$you['name'].''.$err.$err_addfunds.''. $yougourl.''.$err.'</span>', substr($loc, 0, 9) == 'member.php' ? './' : $loc);



    } else {
      err('密码不符！');
    }
  } else {
    err('查无帐号！');
  }
  db_close($db);






//新建
} elseif ($_POST['act'] == 'new') {


  if ($_POST['bar'] == 'qq') {
    if (!$key || strlen($key) != 64) {
      err('参数key缺失或错误！');
    }
  } elseif ($_POST['bar'] == 'weibo') {
    if (!$key || strlen($key) != 10) {
      err('参数key缺失或错误！');
    }
  } elseif ($_POST['bar'] == 'baidu') {
    if (!$key) {
      err('参数key缺失或错误！');
    }
 //
  } elseif ($_POST['bar'] == '162100') {
    if (!$key) {
      err('参数key缺失或错误！');
    }
 //
  } else {
    err('参数bar缺失或错误！');
  }

  if ($web['stop_reg'] == 1) {
    err('当前系统设置为：禁止新用户注册。');
  } elseif ($web['stop_reg'] == 2) {
    $check1 = ',`check_reg`';
    $check2 = ',"1"';
    $check3 = '（此次注册需要审批，请耐心等待）。';
  } else {
    //$check3 = '请保持持续热情支持['.$web['sitename'].']，并欢迎积极发表、反馈问题。';
  }
/*
  if (!empty($session[0])) {
    err('您已经以 用户名 '.$session[0].' 登陆过了！要想更换用户名注册，请先注销登录。');
  }
*/
  if (empty($_POST['username'])) {
    err('提交被拒绝！用户名不能空！');
  }
  if (strlen($_POST['username']) < 3 || strlen($_POST['username']) > 45) {
    err('提交被拒绝！用户名长度范围为3-45字符！');
  }
  if (preg_match('/admin|manager|管理员|版主|斑竹|访客|系统欢迎信|162100|furuijinzhao|操|temp|info|mess|mail|请输入用户名/i', $_POST['username'], $matches)) {
    err('提交被拒绝！用户名中含'.$matches[0].'，未获通过。');
  }

  $_POST['username'] = str_replace('.', '&#46;', $_POST['username']);

  $bar_face_contents = '';
  if ($bar_face != '') {
    if ($bar_face_contents = read_file($bar_face)) {
	  
      //if (!$format = @strtolower(ltrim(strrchr($bar_face, '.'), '.'))) {
	    $img_info = @getimagesize($bar_face);
		$format = @strtolower(ltrim(strrchr($img_info['mime'], '/'), '/'));
		$format = $format == 'jpeg' ? 'jpg' : $format;
	  //}

	  if ($format != $web['img_up_format']) {
	    $temp_img = 'writable/__temp__/'.urlencode($_POST['username']).'.'.$format;
	    write_file($temp_img, $bar_face_contents);
	    $temp_img = typeto($temp_img, $web['img_up_format']);
        $bar_face_contents = read_file($temp_img);
		@unlink($temp_img);
	  }
	}
	//$img_info = getimagesize($bar_face);
  }

  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }
  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$_POST['username'].'" OR email="'.$_POST['username'].'" OR username="'.$_POST['email'].'" OR email="'.$_POST['email'].'"');
  $row = db_fetch($db, $result);
  if (abs($row['total']) > 0) {
    err('此用户名或邮箱已被注册！');
  }
  $result = NULL;
  unset($row);

  $check4 = '';

  if (!empty($_COOKIE['alliancekey']) && is_numeric($_COOKIE['alliancekey'])) {
    $result = db_query($db, 'SELECT username FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE id="'.$_COOKIE['alliancekey'].'" AND (check_reg="0" OR check_reg="4") LIMIT 1');
    $row_f = db_fetch($db, $result);
    $username_f = $row_f['username'];
    $result = NULL;
    unset($row_f);
    if ($_POST['username'] != $username_f) {
      $check4 = ''.$username_f.'';
      $check5 = $username_f;
    }
  }
  $session_key = $date.'|'.s_rand(16);

  db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `session_key` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ""');
  db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` ADD COLUMN `login_key_'.$_POST['bar'].'` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ""');

  if (db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` (`username`,`password`,`email`,`regdate`,`thisdate`,`collection`,`notepad`,`face`,`memory_website`'.$check1.',`recommendedby`,`session_key`,`login_key_'.$_POST['bar'].'`) values ("'.$_POST['username'].'","","'.$_POST['email'].'","'.$date.'","'.$date.'","","","'.addslashes($bar_face_contents).'",""'.$check2.',"'.$check4.'","'.$session_key.'","'.$key.'")')) {
    $secces = 1;
  }
  if ($secces > 0) {
    if ($web['stop_reg'] != 2) {
      $you = array(
        'name'  => $_POST['username'],
        'key'   => $session_key,
      );

      setcookie('usercookie', ''.@implode('|',$you).'|'.$check5.'||'.$web['path'], time() + floatval($web['time_pos']) * 3600, '/', '.'.$web['root']);
      setcookie('usercookie', ''.@implode('|',$you).'|'.$check5.'||'.$web['path'], time() + floatval($web['time_pos']) * 3600, '/');

      $err = '
      <script language="javascript" type="text/javascript">
      <!--
      if(parent){
        if(parent.document.getElementById(\'addCFrame\')!=null){
          var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
          var bUrl=" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
        } else {
          var oUrl="href=\"member.php\" target=\"_self\"";
          var bUrl=" target=\"_self\"";
        }
        try{parent.$(\'mylog\').innerHTML=\'<a \'+oUrl+\' title="进入用户中心\n进行个性化管理">'.$you['name'].'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';}catch(err){}
      }

      -->
      </script>';
    }

    //假如用户创收模式被开启
    if ($web['addfunds'] == 1) {
      @ require ('readonly/function/reg_add_funds.php');

      $ip = user_ip();
      if (is_numeric($web['loginadd']) && $web['loginadd'] > 0) {
        //给自己加分
        $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
        $row_f = db_fetch($db, $result);
        $n_f = abs($row_f['total']);
        $result = NULL;
        unset($row_f);
        if ($n_f < abs($web['loginadd_limit_ip'])) {
          db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$_POST['username'].'","'.$ip.'","1","'.add_funds_from_reg().'","'.$date.'","")');

          setcookie('yourpcaddfunds', '1', time() + (86400 - gmdate('G', time() + floatval($web["time_pos"]) * 3600) * 3600 - gmdate('i', time() + floatval($web["time_pos"]) * 3600) * 60 - gmdate('s', time() + floatval($web["time_pos"]) * 3600) + floatval($web["time_pos"]) * 3600), '/');

          $err_addfunds .= '（您已获得'.add_funds_from_reg().'货币值 <span id="get_coin">&nbsp;</span>）';
        } else {
          $err_addfunds .= '（<span class="redword">提示：您的客户端IP今日已有'.$n_f.'人次注册或登陆过，超过了每IP每日限定'.abs($web['loginadd_limit_ip']).'次计赠货币值，故无法再为您赠送货币值。</span>)';
        }
      }
      if (is_numeric($web['loginadd2']) && $web['loginadd2'] > 0) {
        //给上线加分
        if ($check4 != '') {
          if (!isset($n_f)) {
            $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE date LIKE "'.substr($date, 0, 10).'%" AND userip="'.$ip.'"');
            $row_f = db_fetch($db, $result);
            $n_f = abs($row_f['total']);
            $result = NULL;
            unset($row_f);
          }
          if ($n_f < abs($web['loginadd_limit_ip'])) {
            db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载财务数据的表名'].'` (`username`,`userip`,`description`,`money`,`date`,`other`) VALUES ("'.$username_f.'","'.$ip.'","4","'.add_funds_from_reg_subordinate().'","'.$date.'","来自推广URL['.$web['sitehttp'].'?'.$_COOKIE['alliancekey'].']['.$_POST['username'].']注册")');
          }
        }
      }
    }

    db_close($db);

    $yougourl = '<table width="100%" border="0" cellspacing="10" cellpadding="0" class="wherego"><tr>';
    $yougourl .= '<td class="whereyou">您可以选择去向：</td><td align="left"><ul><li><a href="./" target="_parent">首页</a></li><li><a href="member.php" target="_parent">用户中心</a></li><li><a href="'.$loc.'"'.(preg_match('/mingz|current/i', $loc) ? '' : ' target="_parent"').'>先前页面：'.$loc.'</a></li></ul></td>';
    $yougourl .= '</tr>
</table>';

    alert('<span style="line-height:16px">注册成功！欢迎您 '.$you['name'].''.$err.$err_addfunds.''.$check3.$yougourl.$err.'</span>', $loc);

  } else {
    err('注册不成功！['.$sql['db_err'].']');
  }

//解除绑定
} elseif ($_GET['act'] == 'del_tie') {

  //身份验证
  define('POWER', confirm_power());

  if (POWER == 0) {
    err('系统检测你未登陆，没有权限。');
  }

  //操作前再深层判断一下权限，v3.3加
  if ($session[1].'|'.$session[2] != get_session_key()) {
    err('经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！');
  }

  if ($_GET['bar'] != 'qq' && $_GET['bar'] != 'weibo' && $_GET['bar'] != 'baidu' && $_GET['bar'] != '162100') {
    err('参数不对！');
  }

  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }

  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET login_key_'.$_GET['bar'].'="" WHERE username="'.$session[0].'" LIMIT 1');

  db_close($db);

  alert('已解除<img src="readonly/images/'.$_GET['bar'].'.png" width="16" height="16" />绑定！', $loc);


} else {
  err('参数出错！');
}


function fil() {
  if (empty($_POST['email']) || !preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['email']) || strlen($_POST['email']) > 255) {
    err('email必填！格式：xxx@xxx.xxx(.xx) 。');
  }
  if (empty($_COOKIE['regimcode'])) {
    err('不能没有验证码！请检测你的浏览器，确保cookie未禁用。');
  }
  if (empty($_POST['imcode']) || !is_numeric($_POST['imcode']))
    err('验证码非数字！');
  if ($_POST['imcode'] != $_COOKIE['regimcode'])
    err('验证码不符！');
}

function s_rand($l) {
  $rand = '';
  $c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ-abcdefghijklmnopqrstuvwxyz_0123456789';
  $n = strlen($c) - 1;
  for ($i = 0; $i < $l; $i++) {
    $rand .= $c[mt_rand(0, $n)];
  }
  return strtolower($rand);
}

function tirm_all($str) {
  return filter1(strtolower($str));
}

function md162100($str) {
  return substr(sha1(md5($str)), 4, 32);
}

//基础管理员任何故障下登陆
function base_manager_login($boin = 0) {
  global $web, $sql, $date, $loc, $db, $_POST_password;
  $_POST['username'] = str_replace('.', '&#46;', $_POST['username']);
  if ($_POST['username'] == $web['manager']){
    if (md162100($_POST_password) != $web['password']) {
      err('登陆失败！原因分析：管理员密码不符');
    }
    $you = array(
      'name'  => $_POST['username'],
      'key'   => $date.'|'.s_rand(16),
    );
    if (!file_exists('writable/__temp__')) {
	  if (!@mkdir('writable/__temp__')) {
        err('上载目录不存在！又无创建权限！登陆被禁止。请手动建立writable/__temp__目录再重登陆。');
      }
    }
    write_file('writable/__temp__/'.urlencode($you['name']).'.php', '<?php die(); ?>'.$you['key'].''); //登陆密钥记录

    setcookie('usercookie', ''.@implode('|',$you).'|||'.$web['path'], time() + floatval($web['time_pos']) * 3600 + $_POST['save_cookie'], '/', '.'.$web['root']);
    setcookie('usercookie', ''.@implode('|',$you).'|||'.$web['path'], time() + floatval($web['time_pos']) * 3600 + $_POST['save_cookie'], '/');

    if ($boin == 1) {
      @ require ('writable/set/set_mail.php');
      db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` (`username`,`password`,`email`,`thisdate`,`regdate`,`collection`,`notepad`,`memory_website`,`face`,`session_key`) values ("'.$web['manager'].'","'.$web['password'].'","'.($web['sender']?$web['sender']:'管理员邮箱未填写').'","'.$date.'","'.$date.'","","","","","'.$you['key'].'")');
    }

    alert('<script language="javascript" type="text/javascript">
    <!--
        if(parent){
 
        if(parent.document.getElementById(\'addCFrame\')!=null){
          var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
          var bUrl=" onclick=\"addSubmitSafe();\" target=\"addCFrame\"";
        } else {
          var oUrl="href=\"member.php\" target=\"_self\"";
          var bUrl=" target=\"_self\"";
        }
        try{parent.$(\'mylog\').innerHTML=\'<a \'+oUrl+\' title="进入用户中心\n进行个性化管理">'.$you['name'].'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';}catch(err){}

        }
    -->
    </script>以基础管理员身份登陆成功！欢迎您 '.$you['name'].'', $loc);
  } else {
    err('登陆失败！原因分析：管理员名称不符');
  }
}

function filter_mail($text) {
  global $web;
  return
preg_replace(
  array(
'/\<\{sitename2\}\>/i',
'/\<\{sitename\}\>/i',
'/\<\{webpath\}\>/i',
'/\<\{newpassword\}\>/i'
),
  array(
$web['sitename2'],
$web['sitename'],
$web['path'],
$web['newpassword']
),
  $text
);
}

?>