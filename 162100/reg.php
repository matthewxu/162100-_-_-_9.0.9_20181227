<?php
@ require('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script language="JavaScript" type="text/javascript">
<!--
//提交检测
function postChk(){
  var un=$('username');
  if(!un.value.replace(/[\u4e00-\u9fa5]/g,'abc').match(/^.{3,45}$/)){
    $('username_err').innerHTML=showErr('用户名长度为3-45字符。注：中文占3个字符，其它等占1个。即：纯中文可输入15字，英文或数字或英语符号可输入45字');
	//un.focus();
    return false;
  } else {
    $('username_err').innerHTML='√';
  }
  if($('email').value=='' || !$('email').value.match(/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/)){
    $('email_err').innerHTML=showErr('email必填！填：xxx@xxx.xxx(.xx) 格式');
	//$('email').focus();
    return false;
  } else {
    $('email_err').innerHTML='√';
  }
  var pn=$('password');
  if(pn.value.length>30 || pn.value.length<3){
    $('password_err').innerHTML=showErr('密码长度是3-30字符！');
	//pn.focus();
    return false;
  } else {
    $('password_err').innerHTML='√';
  }
  if(pn.value!=$('password_again').value){
    $('password_again_err').innerHTML=showErr('密码重输要一致！');
	//$('password_again').focus();
    return false;
  } else {
    $('password_again_err').innerHTML='√';
  }
  if($('imcode').value!=getCookie('regimcode')){
    $('imcode_err').innerHTML=showErr('请准确填写验证码！');
	//$('imcode').focus();
    return false;
  } else {
    $('imcode_err').innerHTML='√';
  }
  if($('reg_statement')!=null){
    if($('reg_statement').checked==false){
      alert('请阅读及点选《注册声明》');
      return false;
    }
  }
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

</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./">首页</a><a id="top_title_is">注册</a></div>

<div class="body" style="overflow:visible">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><p>欢迎注册！</p>
          <p>注册后您可以尽享多姿多彩的各项服务。</p>
          <p>&nbsp;</p>
          <p>已有帐号？</p>
          <p><button name="submit" type="submit" class="send1" style="border:none;" onclick="location.href='login.php';">立即登陆</button></p></td>
      <td class="menu_right"><form action="member.php?post=login" method="post" onsubmit="return postChk()">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
          <tr>
            <td width="200" align="right" class="grayword">当前设置：</td>
            <td align="left"><?php
$disabled = '';
if ($web['stop_reg'] == 1) {
  $disabled = ' disabled';
  echo '<span class="redword"><b>×</b> 关闭新用户注册</span>';
} elseif ($web['stop_reg'] == 2) {
  echo '<img src="readonly/images/i.gif" /> 注册需审核</span>';
} else {
  echo '<span class="greenword"><b>√</b> 开放注册</span>';
}
?></td>
          </tr>
          <tr>
            <td width="200" align="right">用户名：</td>
            <td align="left"><input name="username" id="username" type="text" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" style="width:181px" maxlength="64"<?php echo $disabled; ?> />
                  <span class="redword_err" id="username_err"></span></td>
          </tr>
          <tr>
            <td width="200" align="right">邮箱：</td>
            <td align="left"><input name="email" id="email" type="text" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" style="width:181px" maxlength="200"<?php echo $disabled; ?> />
                  <span class="redword_err" id="email_err"></span></td>
          </tr>
          <tr>
            <td width="200" align="right">密码：</td>
            <td align="left"><input name="password" id="password" type="password" onpropertychange="chkWord(this);" oninput="chkWord(this);" onblur="postChk()" style="width:181px" maxlength="40"<?php echo $disabled; ?> />
                  <span class="redword_err" id="password_err"></span></td>
          </tr>
          <tr>
            <td width="200" align="right">重输密码：</td>
            <td align="left"><input name="password_again" id="password_again" type="password" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" style="width:181px" maxlength="40"<?php echo $disabled; ?> />
                  <span class="redword_err" id="password_again_err"></span></td>
          </tr>
          <tr>
            <td width="200" align="right">验证码：</td>
            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:110px"><input name="imcode" id="imcode" type="text" onblur="postChk()" style="width:90px" maxlength="6"<?php echo $disabled; ?> /></td>
    <td><iframe src="readonly/js/imcode.html" id="imFrame" name="imFrame" width="95" height="18" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true"></iframe> <span class="redword_err" id="imcode_err"></span></td>
  </tr>
</table></td>
          </tr>


<?php
if (file_exists('writable/require/statement.txt')) {
?>
          <tr>
            <td width="200" align="right">&nbsp;</td>
            <td align="left"><input type="checkbox" class="checkbox" name="reg_statement" id="reg_statement" value="1" /> 阅读并接受<a href="about.php?statement=1" target="_blank">《注册声明》</a></td>
          </tr>
<?php
}
?>



          <tr>
            <td width="200" align="right">&nbsp;</td>
            <td align="left"><button name="submit" type="submit" class="send2" style="border:none;"<?php echo $disabled; ?>>注册</button></td>
          </tr>
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left"><?php
if (is_array($web['login_key']) && count($web['login_key']) > 0) {
  foreach (array_keys($web['login_key']) as $lv) {
    echo '<a href="javascript:void(0);" onclick="toQzoneLogin(\''.$lv.'\');return false;" title="用'.@file_get_contents('login_key/'.$lv.'/title.txt').'帐号登录"><img src="readonly/images/login_'.$lv.'.png" /></a> ';
    unset($lv);
  }
}
?></td>
        </tr>
        </table>
        <input type="hidden" name="act" value="reg" />
        <input name="location" id="location" type="hidden" value="<?php echo !empty($_REQUEST['location']) ? htmlspecialchars($_REQUEST['location']) : htmlspecialchars($_SERVER['HTTP_REFERER']); ?>" />
      </form></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

</body>
</html>
