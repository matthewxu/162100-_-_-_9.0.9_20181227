<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
.iface_s img { /*display:inline-block !important; display:inline; zoom:1;*/ padding:2px; border:5px #D8D8D8 solid; }
#upFaceFr { /*position:absolute; top:0; left:0; z-index:50;*/ width:100%; overflow:hidden; clear:both; }
#faceTable { position:relative; }
.closeFaceFr { display:inline-block !important; display:inline; zoom:1; width:20px; text-align:center; border:1px #D4D4D4 solid; margin-left:10px; }
.c_funds { /*display:inline-block !important; display:inline; zoom:1;*/ margin:auto; margin-left:0; padding:0px 5px; border:1px #D4D4D4 solid; }
-->
</style>
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
function user_class($power, $point) {
  global $web, $session;
  $text = '';
  if ($power == 5 || $session[0] == $web['manager']) {
    $text .= '管理员 <img src="readonly/images/manager.gif"> <a href="webmaster_central.php">进入管理员控制台</a>';
  } else{
    if ($point <= abs($web['class_iron'])) {
      $www = $point < 0 ? 0 : ceil($point / (abs($web['class_iron']) / 10) * 3);
      $text .= '铁级用户 <img src="readonly/images/iron.gif" width="'.($www + 3).'" height="16" />';
    } elseif ($point > abs($web['class_iron']) && $point <= abs($web['class_silver'])) {
      $text .= '银级用户 <img src="readonly/images/silver.gif" width="'.(ceil($point / (abs($web['class_silver']) / 10) * 3) + 3).'" height="16" />';
    } elseif ($point > abs($web['class_slive']) && $point <= abs($web['class_gold'])) {
      $text .= '金级用户 <img src="readonly/images/gold.gif" width="'.(ceil($point / (abs($web['class_gold']) / 10) * 3) + 3).'" height="16" />';
    } else {
      $n = ceil($point / abs($web['class_gold'])) - 1;
      $text .= ''.$n.'钻用户 ';
      for ($i = 0; $i < $n; $i++) {
        $text .= '<img src="readonly/images/diamond.gif" />';
      }
    }
  }
  return $text;
}

function show_funds($total_all) {
  global $web, $session, $total_funds;

  if (!($web['addfunds'] == 1 && file_exists('addfunds.php'))) {
    return '网站创收当前未开启';
  }
  $description = array(0 => '提现', 1 => '用户注册', 2 => '成员登陆', 3 => '推广URL来访', 4 => '下线注册分成', 5 => '下线登陆分成', 6 => '管理员加赠', 7 => '管理员减扣');
  $total_all = array_filter((array)$total_all);
  $text = '<table class="c_funds" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><b class="redword">'.$total_funds.'</b>'.(($power == 5 || $session[0] == $web['manager']) ? ' <span class="no_f grayword">管理员被忽略</span>' : '').'<br />';
  for ($i = 1; $i <= 7; $i++) {
    $text .= ''.$description[$i].'：'.abs($total_all[$i]).'<br />';
  }
  $text .= '</td>
  </tr>
</table>';
  return $text;
}

$total_all = array();
$total_funds = 0;


if (POWER != 0.5) :


if (POWER > 0.5) {
  @ require ('writable/set/set_userface.php');
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT check_reg,face FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
    if ($row = db_fetch($db, $result)) {
      if ((string)$row['check_reg'] == '1') {
        $err = '帐号注册审核中！';
      } elseif ((string)$row['check_reg'] == '2') {
        $err = '帐号已被移除至黑名单！';
      }
      unset($row);
    } else {
      $err = '帐号不存在！';
    }
    $result = NULL;
    if (empty($err)) {
      //累计收入
      $result = db_query($db, 'SELECT description,SUM(money) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'" AND money>0 AND ABS(fettle)=0 GROUP BY description');
      while ($row = db_fetch($db, $result)) {
        $total_all[$row['description']] = $row['total'] ? $row['total'] : 0;
        unset($row);
      }
      $result = NULL;
    }
  } else {
    $err .= $sql['db_err'];
  }
  db_close($db);

  $total_funds = @array_sum($total_all);
  $f_ce = '<img src="userface.php" />';
  $f_k1 = user_class(POWER, $total_funds);
  $f_k2 = show_funds($total_all);

} else {

  $f_ce = '<img src="readonly/images/userface_default.gif" width="96" height="96" />';
  $f_k1 = '你目前为过客，请<a href="login'.(strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : '').'.php?location='.(urlencode(basename($_SERVER['REQUEST_URI']))).'" target="_self">登陆</a>进入用户中心';
  $f_k2 = show_funds($total_all);
}


if (empty($err)) {
  echo '
  <table cellspacing="0" border="0" cellpadding="0" width="100%">
    <tr valign="top">
      <td width="200" align="center"><div id="screenshotsShow" class="iface_s">'.$f_ce.'</div><br />
        <a href="javascript:void(0);" onclick="$(\'upFaceFr\').style.display=\'block\';par=parent.document.getElementById(\'addCFrame\');if(par!=null){openMy();}return false;">修改头像</a></td>
      <td align="left" id="faceTable"><div id="upFaceFr" style="display:none;"><iframe style="float:left;" src="readonly/require/z_other_face_start.html" width="322" height="277" frameborder="0" scrolling="No"></iframe><a class="closeFaceFr" href="javascript:void(0);" onclick="$(\'upFaceFr\').style.display=\'none\';par=parent.document.getElementById(\'addCFrame\');if(par!=null){openMy();}return false;" title="关闭头像修改">×</a></div>欢迎！'.$session[0].'<br />身份：'.$f_k1.'<br /><span style="float:left;">财富：</span>'.$f_k2.'</td>
    </tr>
  </table>';
} else {
  echo '<div class="output">'.$err.'</div>';
}




else :

  @ require ('login_key/'.$session[4].'/info.php');

endif;






?>