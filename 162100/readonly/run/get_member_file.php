<?php
require ('authentication_member.php');
?>
<?php
if (POWER > 0) :

  if (POWER > 0.5) {
?>
<script language="javascript" type="text/javascript">
<!--
//提交检测
function postChk(){
  if($('email').value=='' || !$('email').value.match(/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/)){
    $('email_err').innerHTML=showErr('email必填！填：xxx@xxx.xxx(.xx) 格式');
	//$('email').focus();
    return false;
  } else {
    $('email_err').innerHTML='√';
  }
  var po=$('password');
  var pn=$('password_new');
  if(po.value!='' || pn.value!=''){
    if(po.value.length>30 || po.value.length<3){
      $('password_err').innerHTML=showErr('原密码长度是3-30字符！');
	  //$('password').focus();
      return false;
    } else {
      $('password_err').innerHTML='√';
    }
    if(pn.value.length>30 || pn.value.length<3){
      $('password_new_err').innerHTML=showErr('新密码长度是3-30字符！');
	  //$('password_new').focus();
      return false;
    } else {
      $('password_new_err').innerHTML='√';
    }
    if(pn.value!=$('password_again').value){
      $('password_again_err').innerHTML=showErr('两次密码输得不一样！');
	  //$('password_again').focus();
      return false;
    } else {
      $('password_again_err').innerHTML='√';
    }
  }

  var realname=$('realname');
  if(realname.value!='' && !realname.value.replace(/[^\x00-\x7f]/g, 'AAA').match(/^[a-zA-Z]{3,45}$/)){
    alert('真实姓名请用汉字、英文组成！长度范围为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文可输入45字');
	realname.focus();
    return false;
  }
  var bank=$('bank');
  if(bank.value!='' && !bank.value.match(/^([^\x00-\x7f]|[a-zA-Z0-9]){14,255}$/)){
    alert('请检查！开户银行（用中文或英文）+帐户（数字）');
	$('bank').focus();
    return false;
  }
  var alipay=$('alipay');
  if(alipay.value!='' && !alipay.value.match(/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/)){
    alert('支付宝填：xxx@xxx.xxx(.xx) 格式');
	$('alipay').focus();
    return false;
  }

/*
  if($('imcode').value!=getCookie('regimcode')){
    $('imcode_err').innerHTML='请准确填写验证码！';
	//$('imcode').focus();
    return false;
  } else {
    $('imcode_err').innerHTML='√';
  }
*/
  //addSubmitSafe();
  return true;
}

//过滤禁止字符
function chkWord(obj){
  return false;
/*
  if(obj.value.match(/[\s\"\'\\]+/)){
    alert('所填内容不能含 空格 及 \' " \\ ');
    obj.value=obj.value.replace(/[\s\"\'\\]+/g,'');
    obj.focus();
  }
*/
}

function openWB(){
  $('realname_').style.display=
  $('bank_').style.display=
  $('wangwanw').style.display=
  $('wb_').style.display='';
  $('wb__').style.display='none';
  par=parent.document.getElementById('addCFrame');
  if (par!=null) {
    openMy();
  }
}
function closeWB(){
  $('realname_').style.display=
  $('bank_').style.display=
  $('wangwanw').style.display=
  $('wb_').style.display='none';
  $('wb__').style.display='';
  par=parent.document.getElementById('addCFrame');
  if (par!=null) {
    openMy();
  }
}

function showErr(text){
  return '\
<img src="readonly/images/show_err.gif" name="show_err" width="7" height="13" id="show_err" />\
<div id="form_err">\
  <div class="g1"></div>\
  <div class="g2"></div>\
  <div class="g3"></div>\
  <div class="g4">'+text+'</div>\
  <div class="g3"></div>\
  <div class="g2"></div>\
  <div class="g1"></div>\
</div>';
}

-->
</script>
<?php
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
    if ($row = db_fetch($db, $result)) {
      if ($row['check_reg'] == '1') {
        $err = '帐号注册审核中！';
      } elseif ($row['check_reg'] == '2') {
        $err = '帐号已被移除至黑名单！';
      } elseif ($session[1].'|'.$session[2] != $row['session_key']) {
        $err = '经系统检验权限，你的身份密钥不符，关键操作！请重登陆修正！';
      }
    } else {
      $err = '帐号不存在！';
    }
    $result = NULL;

  } else {
    $err .= $sql['db_err'];
  }
  db_close($db);

  if (empty($err)) {
      echo '<div class="note">该帐号：';
    if (is_array($web['login_key']) && count($web['login_key']) > 0) {
      foreach (array_keys($web['login_key']) as $lv) {
        echo '<img src="readonly/images/'.$lv.'.png" title="'.$lv.'" />登录 '.(!empty($row['login_key_'.$lv.'']) ? '已绑定 <a href="member.php?post=login&act=del_tie&bar='.$lv.'" target="_self">解除绑定</a>' : '未绑定').' | ';
        unset($lv);
      }
    }
    echo '<img src="readonly/images/162100.png" title="论坛/信息站" />登录 '.(!empty($row['login_key_162100']) ? '已绑定 <a href="member.php?post=login&act=del_tie&bar=162100" target="_self">解除绑定</a>' : '未绑定').'';
      echo '</div>';
    echo '
    <form action="member.php?post=login" method="post" target="_self" onsubmit="return postChk()">
      <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr>
          <td width="200" align="right">用户名：</td>
          <td align="left">'.$session[0].'</td>
        </tr>
        <tr>
          <td width="200" align="right">邮箱：</td>
          <td align="left"><input name="email" id="email" type="text" style="width:181px" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" maxlength="200" value="'.$row['email'].'" /> <span class="redword_err" id="email_err">*</span></td>
        </tr>
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left" style="font-size:12px" class="grayword">可修改您的邮箱</td>
        </tr>
        <tr>
          <td width="200" align="right">原密码：</td>
          <td align="left"><input name="password" id="password" type="password" onpropertychange="chkWord(this);" oninput="chkWord(this);" onblur="postChk()" style="width:181px" maxlength="40" /> <span class="redword_err" id="password_err"></span></td>
        </tr>
        <tr>
          <td width="200" align="right">新密码：</td>
          <td align="left"><input name="password_new" id="password_new" type="password" onpropertychange="chkWord(this);" oninput="chkWord(this);" onblur="postChk()" style="width:181px" maxlength="40" /> <span class="redword_err" id="password_new_err"></span></td>
        </tr>
        <tr>
          <td width="200" align="right">重输新密码：</td>
          <td align="left"><input name="password_again" id="password_again" type="password" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" style="width:181px" maxlength="40" /> <span class="redword_err" id="password_again_err"></span></td>
        </tr>
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left" style="font-size:12px" class="grayword">注：不填则默认原密码</td>
        </tr>
        <tr style="display:none;background-color:#EEEEEE;" id="realname_">
          <td width="200" align="right">我的真实姓名：</td>
          <td align="left"><a href="javascript:void(0)" style="font-size:20px; float:right;" title="关闭" onclick="closeWB();return false;" target="_self"><img src="readonly/images/x.gif" class="close" /></a><input name="realname"  id="realname" type="text" onpropertychange="chkWord(this)" style="width:181px" maxlength="40" value="'.$row['realname'].'" /></td>
        </tr>
        <tr style="display:none;background-color:#EEEEEE;" id="bank_">
          <td width="200" align="right">开户银行帐户名及帐号：</td>
          <td align="left"><input name="bank" id="bank" type="text" onpropertychange="chkWord(this)" style="width:181px" maxlength="40" value="'.$row['bank'].'" /></td>
        </tr>
        <tr style="display:none;background-color:#EEEEEE;" id="wangwanw">
          <td width="200" align="right">支付宝帐号：</td>
          <td align="left"><input name="alipay" id="alipay" type="text" onpropertychange="chkWord(this)" style="width:181px" maxlength="40" value="'.$row['alipay'].'" /></td>
        </tr>
        <tr style="display:none;background-color:#EEEEEE;" id="wb_">
          <td width="200" align="right">&nbsp;</td>
          <td align="left" style="font-size:12px" class="grayword">注：若想获得收入付款，帐户及姓名必填，收款帐户至少填一项</td>
        </tr>
        <tr id="wb__">
          <td width="200" align="right">收款帐户：</td>
          <td align="left"><a href="javascript:void(0)" onclick="openWB();return false;" target="_self"><u>完善我的银行帐户'.($_GET['form'] == 'yes' ? '，以便获得收入' : '').'</u></a></td>
        </tr>
        <!--tr>
          <td width="200" align="right">验证码：</td>
          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:110px"><input name="imcode" id="imcode" type="text" onblur="postChk()" style="width:90px" maxlength="6"<?php echo $disabled; ?> /></td>
    <td><iframe src="readonly/js/imcode.html" id="imFrame" name="imFrame" width="95" height="18" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true"></iframe> <span class="redword_err" id="imcode_err"></span></td>
  </tr>
</table></td>
        </tr-->
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left"><button name="submit" type="submit" class="send2" style="border:none;">提交修改</button></td>
        </tr>
      </table>
      <input name="location" id="location" type="hidden" value="'.basename($_SERVER['REQUEST_URI']).'" />
      <input type="hidden" name="act" value="regfilemodify" />
    </form>
';
    unset($row);
  } else {
    echo '<div class="output">'.$err.'</div>';
  }


  } else {

    @ require ('login_key/'.$session[4].'/info.php');

  }
?>

<?php
else :
?>

<div class="output">
您上次的登陆已失效！请重新<a href="login<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo urlencode(basename($_SERVER['REQUEST_URI'])); ?>" target="_self">登陆</a>获取数据<br /><span class="grayword">没有帐号？<a href="reg<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo basename($_SERVER['REQUEST_URI']); ?>" target="_self">注册一个</a>，非常简单</span>
</div>

<?php
endif;
?>

