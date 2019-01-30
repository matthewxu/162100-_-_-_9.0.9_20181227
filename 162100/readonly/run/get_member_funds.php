<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table td { background-color:#FFFFFF; text-align:left; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
.red_err {background-color:yellow;font-size:12px; line-height:normal; }
-->
</style>
<?php


/* 取：我的货币值 */
/* 162100源码 - 162100.com */



$shf = $_GET['show_h_f'] == 1 ? '&show_h_f=1' : '';

if ($_GET['act'] == 'cash') {
  $where_eval = ' AND money<0';
  $list_title1 = '<a href="?get=funds'.$shf.'" target="_self">收入总览</a> <a href="?get=funds&act=alliance'.$shf.'" target="_self">推广收入</a> <a class="list_title_in redword">提现记录（';
  $list_title3 = '）</a>';
  //作弊原因，待开发
  $zuobi = array(
0 => '有效',
1 => '无效或待估',
2 => '', //待编
);
} else {
  if ($_GET['act'] == 'alliance') {
    $where_eval = ' AND description>2';
    $list_title1 = '<a href="?get=funds'.$shf.'" target="_self">收入总览</a> <a class="list_title_in">推广收入（';
  $list_title3 = '）</a> <a href="?get=funds&act=cash'.$shf.'" target="_self" class="redword">提现记录</a>';
  } else {
    $where_eval = ' AND money>0';
    $list_title1 = '<a class="list_title_in">收入总览（';
    $list_title3 = '）</a> <a href="?get=funds&act=alliance'.$shf.'" target="_self">推广收入</a> <a href="?get=funds&act=cash'.$shf.'" target="_self" class="redword">提现记录</a>';
  }
  //作弊原因，待开发
  $zuobi = array(
0 => '固定地（IP域）的
常态的
有来路的访问',
1 => '不固定地（IP域）的
非常态的
集中密集的
无来路的访问',
2 => '', //待编
);
}

$total_all = $total_cash = $n = 0;
$text = $onclick = '';
$cr = 0;


if (POWER == 5 ) :
  $text .= '
  <table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
      <tr>
        <th width="150">明细</th>
        <th width="75">金额</th>
        <th width="75">日期</td>
        <th>备注</td>
      </tr>
      <tr>
        <td colspan="4">您是管理员，不计创收。</td>
      </tr>
    </table>';



elseif (POWER > 0.5) :

  $description = array(0 => '提现', 1 => '用户注册', 2 => '成员登陆', 3 => '推广URL来访', 4 => '下线注册分成', 5 => '下线登陆分成', 6 => '管理员加赠', 7 => '管理员减扣');



  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    //求ID
    $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1'); //id,check_reg,session_key
    if ($row = db_fetch($db, $result)) {
      if ($row['check_reg'] == '1') {
        $err = '帐号注册审核中！';
      } elseif ($row['check_reg'] == '2') {
        $err = '帐号已被移除至黑名单！';
      } elseif ($row['check_reg'] == '3') {
        $cr = 1;
        $err = '警告！您的帐户已被冻结，创收暂时关停。请等待审核认定无异常后开启。'.($_GET['show_h_f'] == 1 ? '' : '<br /><a href="?get=funds&show_h_f=1" target="_self" style="font-size:12px;color:#CCCCCC;">查看历史创收记录</a>').'';
      } elseif ($row['check_reg'] == '4') {
        $cr = 1;
        $_GET['show_h_f'] = 1;
        $err = '<div style="color:#660033;font-size:12px;text-align:left; line-height:normal;"><p style="margin-bottom:10px;"><b>　　您的帐户暂被列入阶段观察队列，可能被系统发现判断为非正常的创收访问。请保护好自己的推广代码，并通过正规的途径进行推广传播，以引来有效的下线用户访问，给自己带来创收收益。</b></p>
<p style="margin-bottom:10px;"><b>　　目前你的创收帐户仍可正常使用，但须特别关注，避免被冻结的风险，进而造成不必要的收益损失。</b></p>
<p><b>　　如有异议，请<a href="http://info.162100.com/member.php?get=mess&username=admin" target="_blank">联系管理员</a>进行交流。</b></p></div>'.($_GET['show_h_f'] == 1 ? '' : '<br /><a href="?get=funds&show_h_f=1" target="_self" style="font-size:12px;color:#CCCCCC;">查看创收记录</a>').'';
      } elseif ($session[1].'|'.$session[2] != $row['session_key']) {
        $err = '经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！';
      }
      $userid = $row['id'] ? $row['id'] : 0;
      unset($row);
    } else {
      $err = '帐号不存在！';
    }
    $result = NULL;

    if (empty($err) || (!empty($err) && $cr == 1 && $_GET['show_h_f'] == 1)) {
      //累计收入
      $result = db_query($db, 'SELECT SUM(money) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'" AND money>0 AND fettle="0"');
      $row = db_fetch($db, $result);
      $total_all = $row['total'] ? $row['total'] : 0;
      unset($row);
      $result = NULL;

      //累计提现
      $result = db_query($db, 'SELECT SUM(money) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'" AND money<0 AND fettle="0"');
      $row = db_fetch($db, $result);
      $total_cash = $row['total'] && $row['total'] < 0 ? -$row['total'] : 0;
      unset($row);
      $result = NULL;
    
      $result = db_query($db, 'SELECT COUNT(id) AS total FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'"'.$where_eval.'');
      $row = db_fetch($db, $result);
      $n = abs($row['total']);
      unset($row);
      $result = NULL;
@ require ('readonly/function/get_page.php');
      if ($n > 0) {
@ require_once('readonly/weather/getip.php');
        $text .= '
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="120">明细</th>
      <th width="40">金额</th>
      <th width="80">日期</th>
      <th>备注</td>
      <th width="40">状态<b style="color:#009900;" title="指：
'.$zuobi[0].'">√</b>|<b style="color:#CC00FF;" title="指：
'.$zuobi[1].'">？</b></th>
    </tr>
';
    
        $p = get_page($n); //页数
        $seek = $web['pagesize'] * ($p-1);
        $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载财务数据的表名'].' WHERE username="'.$session[0].'"'.$where_eval.' ORDER BY id DESC LIMIT '.$seek.','.$web['pagesize'].'');

        while ($row = db_fetch($db, $result)) {
          $row['money'] = $row['money'] > 0 ? '+'.$row['money'] : $row['money'];
          $text .= '
    <tr>
      <td width="120">'.$description[$row['description']].'</td>
      <td width="40">'.$row['money'].'</td>
      <td width="80" title="'.$row['date'].'">'.substr($row['date'], 0, 10).'</td>
      <td>';
          if (!empty($row['userip'])) {
            $text .= '入口IP：'.$row['userip'].' ';
            $myobj = new ipLocation();
            $address = $myobj -> getaddress($row['userip']);
            $myobj = NULL;
            $text .= iconv('gbk', 'utf-8', $address['area1'].' '.$address['area2']).'<br />';
          }




$row['fettle'] = abs($row['fettle']);
          $text .= $row['other'].'</td>
      <td width="40" style="text-align:center">'.($row['fettle'] == 0 ? '<b style="color:#009900;" title="'.$zuobi[$row['fettle']].'">√</b>' : '<b style="color:#CC00FF;" title="'.$zuobi[$row['fettle']].'">？</b>').'</td>
    </tr>
';
          unset($row);

        }
        $text .= '
</table>';
        $result = NULL;

        $text .= get_page_foot($n, $web['pagesize'], $p, '?get=funds&act='.$_GET['act'].'&show_h_f='.$_GET['show_h_f'].'&p=');
      } else {
        $text .= '暂无相应记录';
      }
    }
  } else {
    $err .= $sql['db_err'];
  }
  db_close($db);

  $tui_url = '<input name="text" type="text" id="myurlcode" style="width:180px;" value="'.$web['sitehttp'].'?'.$userid.'" />';



else :
  if (POWER == 0.5) {
    ob_start();
    @ include ('login_key/'.$session[4].'/info.php');
    $text = ob_get_contents();
    ob_end_clean();

  } else {
    $text .= '暂无相应记录！请<a href="login'.(strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : '').'.php?location='.(urlencode(basename($_SERVER['REQUEST_URI']))).'" target="_self">登陆</a>获取<script>
addrule();
</script>';
    $tui_url = ' 无。请<a href="login'.(strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : '').'.php?location='.(urlencode(basename($_SERVER['REQUEST_URI']))).'" target="_self">登陆</a>获取';
    $onclick = ' onclick="alert(\\\'请登陆获取数据！\\\');return false;"';
  }
endif;


if (empty($err) || (!empty($err) && $cr == 1 && $_GET['show_h_f'] == 1)) {
  $total_now = $total_all - $total_cash;
  echo !empty($err) ? '<div class="output">'.$err.'</div>' : '';

?>
<div class="note"> <b>当前收入：</b><b class="redword" style="font-size:20px; vertical-align:middle;"><?php echo $total_now; ?></b> <b>累计收入：</b><b class="greenword" style="font-size:20px; vertical-align:middle;"><?php echo $total_all; ?></b> <b>累计提现：</b><b class="greenword" style="font-size:20px; vertical-align:middle;"><?php echo $total_cash; ?></b><br />
<?php
$web['cash'] = abs($web['cash']);
if ($total_now >= $web['cash']) {
  $dis = '';
  $out = ' onfocus="this.value=\'\';this.style.color=\'#999999\';" onblur="if(this.value==\'\'){this.value=\''.$total_now.'\';this.style.color=\'#999999\';}else{this.style.color=\'#000000\';}"';
  $oer = ' <b class="redword">金额达标，可以提现！</b>';
} else {
  $dis = ' disabled="disabled"';
  $out = '';
  $oer = ' <span class="redword">金额不足'.$web['cash'].'元，尚不能提现！</span>';

}

?>
    <form action="member.php?post=funds_cash" method="post" target="_self" onsubmit="return chkSend(this);" title="收入达到<?php echo $web['cash']; ?>元可以提现">
      <b>我要提现：</b>提现
      <input name="total_fee" id="total_fee" type="text" value="<?php echo $total_now; ?>" style="color:#999999;" size="4" maxlength="8"<?php echo $out, $dis; ?> />
      元
      <button name="submit" type="submit"<?php echo $dis; ?>>提交</button>
      <?php echo $oer; ?>
    </form>
  <b>我要创收：</b>我的专属推广链接<?php echo $tui_url; ?>
  
    <!--<button id="copyurlcode" type="button">点击复制</button>--> 让更多人使用此链接，你会不断增加收入。[<a href="javascript:void(0);" onclick="addrule();return false;" target="_self"><b>创收秘笈</b></a>]</div>
<h5 class="list_title" id="list_title"><?php echo $list_title1.$n.$list_title3; ?></h5>
<?php
if (!file_exists('addfunds.php')) {
  echo '<div class="red_err">用户创收尚未安装或已关闭</div>';
} else {
  if ($web['addfunds'] == 0) {
    echo '<div class="red_err">系统设置为：用户创收未开启</div>';
  }
}
?>


<script type="text/javascript">
<!--
function chkSend(form) {
  form.total_fee.value=form.total_fee.value.replace(/(\.\d{2})\d*$/, '$1');
  if (isNaN(form.total_fee.value) || form.total_fee.value < <?php echo $web['cash']; ?>) {
    alert("你输入的值不对，要为数字并大于等于<?php echo $web['cash']; ?>元！");
    form.total_fee.value="";
    return false;
  }
  if (form.total_fee.value > <?php echo $total_now; ?>) {
    alert("你只有<?php echo $total_now; ?>元！");
    form.total_fee.value="";
    return false;
  }
  return true;
}

function addrule() {
  try {
    $('list_title').innerHTML = '<a href="?get=funds" target="_self"<?php echo $onclick; ?>>收入总览</a> <a href="?get=funds&act=alliance" target="_self"<?php echo $onclick; ?>>推广收入</a> <a href="?get=funds&act=cash" target="_self" class="redword"<?php echo $onclick; ?>>提现记录</a> <a class="list_title_in">创收秘笈</a>';
    $('area_http_url').innerHTML = '<div class="note"><p><b>请记住：让更多人使用你的专属创收链接，你会不断增加收入——</b></p>\
<ol>\
  <li>注册，系统会为你增加收入</li>\
  <li>你每一天的登陆，系统会为你增加收入</li>\
  <li>使用你推广链接的访客，每一天来访，系统会为你增加收入</li>\
  <li>使用你推广链接的访客，若注册，系统会为你增加收入</li>\
  <li>使用你推广链接的访客注册后，以后的每一天的登陆，系统都会为你增加收入……</li>\
</ol>\
<p><b>创收的途径：</b></p>\
<ol>\
  <li>将你的专属推广链接设置成他人电脑浏览器的主页，用户每天的访问，系统会为你增加收入 </li>\
  <li>邀请同学、朋友将你的专属推广链接设置主页，每天的访问，系统会为你增加收入</li>\
  <li>装机、维修、网管、电脑售后人员将你的专属推广链接设置成主页，收入更将源源不断</li>\
  <li>将你的专属推广链接发布到论坛、博客中，等待点击来访，系统会为你增加收入</li>\
</ol>\
<p><b>对应名词：</b></p>\
<ol>\
  <li>用户注册</li>\
  <li>成员登陆</li>\
  <li>推广URL来访</li>\
  <li>下线注册分成</li>\
  <li>下线登陆分成</li>\
  <li>管理员加赠</li>\
  <li>管理员减扣</li>\
</ol>\
<p><b>注：</b></p>\
<ol>\
  <li>创收前提基于——每天有效的用户访问数（IP）</li>\
  <li>每IP最多限<?php echo abs($web['loginadd_limit_ip']); ?>次登陆计赠货币值</li>\
  <li>严禁恶意作弊行为，否则全部收入会被清零，并被置入黑名单</li>\
</ol></div>';
  } catch(err) {
  }
  par=parent.document.getElementById('addCFrame');
  if (par!=null) {
    openMy();
  }
}
-->
</script>
<div id="area_http_url"> <?php echo $text; ?> </div>
<?php



} else {
  echo '<div class="output">'.$err.'</div>';
}

?>
