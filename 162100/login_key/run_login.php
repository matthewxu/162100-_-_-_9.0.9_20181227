<?php


$GLOBALS['WEATHER_DATA'] = '../../';
  @ require ('../../writable/set/set.php');
  @ require ('../../writable/set/set_sql.php');


//输出错误
function err($text = '', $src = 'i') {
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="../../readonly/css/'.$web['cssfile'].'/style.css" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
.wherego { margin:10px auto; border:1px #DDDDDD solid; background-color:#EFEFEF; }
.wherego td { width:50%; word-wrap:break-word; word-break:break-all; }
.wherego td.whereyou { text-align:right; }
-->
</style>
<script type="text/javascript" language="javaScript" src="../../writable/js/main.js?'.filemtime('writable/js/main.js').'"></script>
</head>
<body>
  <div class="output">
    <img src="../../readonly/images/'.$src.'.gif" /> '.$text.'
    
  </div>
<script>

    setTimeout("try{window.close();}catch(e){}try{TencentLogin.close();}catch(e){}",3000);

</script>
</body>
</html>';
  die;
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

function show_login($username, $bar) {
  return '<script language="javascript" type="text/javascript">
<!--

function parClose(){
  //var par=opener.top.document.getElementById("addCFrame");
  var par=opener.parent.document.getElementById("addCFrame");
  if (par!=null){
    par.style.display="none";
    opener.parent.delSubmitSafe();
  }
  
}

if(opener.parent && opener.parent!=opener){
  try{opener.parent.document.getElementById(\'mylog\').innerHTML=\'<img src="readonly/images/'.$bar.'.png" width="16" height="16" /> <a href="member_current.php" onclick="addSubmitSafe(1);$(\\\'addCFrame\\\').style.display=\\\'block\\\';" target="addCFrame" title="进入用户中心\\n进行个性化管理">'.$username.'</a> <a href="member.php?post=login&act=logout" onclick="addSubmitSafe(1);$(\\\'addCFrame\\\').style.display=\\\'block\\\';" target="addCFrame">退出</a>\';}catch(err){}
}

if(opener){
  if(opener.document.getElementById(\'mylog\')!=null){
    if(opener.document.getElementById(\'addCFrame\')!=null){
      var oUrl="href=\"member_current.php\" onclick=\"addSubmitSafe(1);\" target=\"addCFrame\"";
      var bUrl=" onclick=\"addSubmitSafe(1);\" target=\"addCFrame\"";
    } else {
      var oUrl="href=\"member.php\" target=\"_self\"";
      var bUrl=" target=\"_self\"";
    }
    opener.document.getElementById(\'mylog\').innerHTML=\'<img src="readonly/images/'.$bar.'.png" width="16" height="16" /> <a \'+oUrl+\' title="进入用户中心\\n进行个性化管理">'.$username.'</a> <a href="member.php?post=login&act=logout"\'+bUrl+\'>退出</a>\';
  }else{

    var pl=opener.document.getElementById("location");

    if(pl!=null){
      var goUrl=pl.value.replace(/^http\:\/\/.+\//i, \'\');
      if(goUrl!="" && goUrl!="./" && !goUrl.match(/(login|reg)(_current)?\.php/i)){
        opener.parent.location.reload();
        opener.location.href=opener.location.href.replace(/[^\/]+$/,"")+goUrl;
      }else{
        if(opener.location.href.match(/(login|reg)(_current)?\.php/i)){
          if(opener.parent!=opener)
            parClose();
          else
            opener.location.href=opener.location.href.replace(/[^\/]+$/,"");
        }else{
          opener.location.href=opener.location.href.replace(/[^\/]+$/,"");
        }
      }
    }else{
      opener.location.href=opener.location.href.replace(/[^\/]+$/,"");
    }
  }
}else{
  opener.top.location.href=opener.location.href.replace(/[^\/]+$/,"");
}

      setTimeout("try{window.close();}catch(e){}try{TencentLogin.close();}catch(e){}",3000);

-->
</script>';
}

?>
<?php

$date = gmdate("Y-m-d H:i:s", time() + (floatval($web["time_pos"]) * 3600));
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

$result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE login_key_'.$bar.'="'.$key1.$key2.'" LIMIT 1');
$row = db_fetch($db, $result);
$result = NULL;
if (is_array($row) && count($row) > 0) {
  if ($row['check_reg'] == '1') {
    err('您的注册尚未通过审批！无法登陆。');
  }
  if ($row['check_reg'] == '2') {
    err('您的帐户已被管理员移除至黑名单。');
  }
  if ($row['check_reg'] == '3') {
    $stop_err = '<b style="color:#FF6600">您的帐户已被冻结，创收暂时关停。请等待审核认定无异常后开启。</b>';
  } elseif ($row['check_reg'] == '4') {
    $stop_err = '<b style="color:#FF6600">您的帐户已被置入系统观察队列！</b>';
  }
  $you = array(
    'name'  => $row['username'],
	'key'   => $date.'|'.s_rand(16),
  );
  /*
  echo '
    <script language="javascript" type="text/javascript">
    <!--
    var expiration=new Date(new Date().getTime()+'.(31536000 + floatval($web["time_pos"]) * 3600).'*1000);
    try{
	//document.cookie="usercookie="+encodeURIComponent("'.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'].'")+"; expires="+expiration.toGMTString()+"; path=/; domain=.'.$web['root'].';";
	document.cookie="usercookie='.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'].'; expires="+expiration.toGMTString()+"; path=/; domain=.'.$web['root'].';";
	}catch (e) {
	}
	//document.cookie="usercookie="+encodeURIComponent("'.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'].'")+"; expires="+expiration.toGMTString()+"; path=/;";
	document.cookie="usercookie='.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'].'; expires="+expiration.toGMTString()+"; path=/;";
    -->
    </script>';
*/
  setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web["time_pos"]) * 3600 + 31536000, '/', '.'.$web['root']);
  setcookie('usercookie', ''.@implode('|',$you).'|'.$row['recommendedby'].'||'.$web['path'], time() + floatval($web["time_pos"]) * 3600 + 31536000, '/');

  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET thisdate="'.$date.'",session_key="'.$you['key'].'" WHERE username="'.$row['username'].'" LIMIT 1'); //更新最后访问时间和密钥

  if ($you['name'] == $web['manager']) {
    @ require ('../../readonly/function/write_file.php');
    if (!file_exists('../../writable/__temp__')) {
	    if (!@mkdir('../../writable/__temp__')) {
        err('上载目录../../writable/__temp__不存在或创建失败！请稍候重新登陆再试。');
      }
    }
    write_file('../../writable/__temp__/'.urlencode($you['name']).'.php', '<?php die(); ?>'.$you['key'].''); //登陆密钥记录
  }
  //假如用户创收模式被开启（不计管理员）
  if ($web['addfunds'] == 1 && $row['username'] != $web['manager'] && ($row['check_reg'] == '0' || $row['check_reg'] == '4')) {

    @ require ('../../readonly/function/confirm_power.php');
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
		/*
        echo '
            <script language="javascript" type="text/javascript">
            <!--
            var expiration=new Date(new Date().getTime()+'.(86400 - date('G') * 3600 - date('i') * 60 - date('s') + floatval($web["time_pos"]) * 3600).'*1000);
            document.cookie="yourpcaddfunds=1; expires="+expiration.toGMTString()+"; path=/;";
            -->
            </script>';
        */
        setcookie('yourpcaddfunds', 1, time() + (86400 - gmdate('G', time() + floatval($web["time_pos"]) * 3600) * 3600 - gmdate('i', time() + floatval($web["time_pos"]) * 3600) * 60 - gmdate('s', time() + floatval($web["time_pos"]) * 3600) + floatval($web["time_pos"]) * 3600), '/');

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
  $yougourl .= '<td class="whereyou">您可以选择去向：</td><td align="left"><ul><li><a href="javascript:void(0);" onclick="window.open(\'../../\');window.close();">首页</a></li>'.($you['name'] == $web['manager'] ? '<li><a href="javascript:void(0);" onclick="window.open(\'../../webmaster_central.php\');window.close();">管理员中心</a></li>' : '').'<li><a href="javascript:void(0);" onclick="window.open(\'../../member.php\');window.close();">用户中心</a></li></ul></td>';
  $yougourl .= '</tr>
</table>';
      
  err('登陆成功！欢迎您 '.$you['name'].''.$err_addfunds.''. $yougourl.''.$stop_err.'<br />
<span style="color:#CCC">正在关闭此窗口</span>'.show_login($you['name'], '162100'), 'ok');





} else {
  setcookie('usercookie', ''.$bar_name.'||||'.$bar.'|'.$web['path'], time() + floatval($web["time_pos"]) * 3600, '/', '.'.$web['root']);
  setcookie('usercookie', ''.$bar_name.'||||'.$bar.'|'.$web['path'], time() + floatval($web["time_pos"]) * 3600, '/');

  err('用<img src="../../readonly/images/'.$bar.'.png" width="16" height="16" title="'.$bar.'" />帐号登陆成功！欢迎您：<br /><center><img src="'.$bar_face.'" /> '.$bar_name.'</center><br />
<span style="color:#CCC">正在关闭此窗口</span>'.show_login($bar_name, $bar), 'ok');
}
db_close($db);

?>
