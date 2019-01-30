<?php
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
.username { background:#FFFFFF url(readonly/images/login_bj.gif) 5px 50% no-repeat; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script language="JavaScript" type="text/javascript">
<!--
function forPassword(){
  var un=$('username');
  if(!un.value.replace(/[\u4e00-\u9fa5]/g,'abc').match(/^.{3,45}$/)){
    alert('请填写您的用户名或邮箱！');
	un.focus();
    return false;
  }
  if(confirm('确定提交么？密码将发往你的注册邮箱')) {
    $('act').value='foundpassword';
    $('submitRun').type='button';
	$('loginform').submit();
    //location.href='member.php?post=login&act=foundpassword&username='+encodeURIComponent(un.value)+'';
  }
}

function postChk(){
  var un=$('username');
  if(!un.value.replace(/[\u4e00-\u9fa5]/g,'abc').match(/^.{3,45}$/)){
    $('username_err').innerHTML=showErr('请正确填写帐号！可填用户名（3-45字符）或注册邮箱');
    //un.focus();
    return false;
  }else{
    $('username_err').innerHTML='√';
  }
  var pn=$('password');
  if(pn.value.length>30 || pn.value.length<3){
    $('password_err').innerHTML=showErr('密码长度是3-30字符！');
	//pn.focus();
    return false;
  } else {
    $('password_err').innerHTML='√';
  }
  if($('imcode')!=null){
    if($('imcode').value!=getCookie('regimcode')){
      $('imcode_err').innerHTML=showErr('请准确填写验证码！');
	  //$('imcode').focus();
      return false;
    } else {
      $('imcode_err').innerHTML='√';
    }
  }
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

function showErr(text){
  delSubmitSafe();
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
<div id="top_title"><a href="./">首页</a><a id="top_title_is">登陆</a></div>



<div class="body" style="overflow:visible">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><p>欢迎登陆！</p>
          <p>登陆后您可以尽享多姿多彩的各项服务。</p>
          <p>&nbsp;</p>
          <p>没有帐号？</p>
          <p><button name="submit" type="submit" class="send1" onclick="location.href='reg.php';">立即注册</button></p></td>
      <td class="menu_right"><form action="member.php?post=login" method="post" onsubmit="return postChk();" id="loginform" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td width="200" align="right">帐号：</td>
          <td align="left"><input name="username" id="username" type="text" onpropertychange="chkWord(this)" oninput="chkWord(this);" onblur="postChk();if(this.value.replace(/^\s+|\s+$/g,'')==''){this.className='username';}" onfocus="this.className='';" style="width:181px;" class="username" maxlength="255" />
              <span class="redword_err" id="username_err"></span></td>
        </tr>
        <tr>
          <td width="200" align="right">密码：</td>
          <td align="left"><input name="password" id="password" type="password" onpropertychange="chkWord(this)" oninput="chkWord(this)" onblur="postChk()" style="width:181px" maxlength="30" />
              <span class="redword_err" id="password_err"></span></td>
        </tr>
        <?php if (!empty($_COOKIE['usercookie'])) : ?>
        <tr>
          <td width="200" align="right">验证码：</td>
          <td align="left" id="ifnoiframe"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:110px"><input name="imcode" id="imcode" type="text" onblur="postChk()" style="width:90px" maxlength="6" /></td>
    <td><iframe src="readonly/js/imcode.html" id="imFrame" name="imFrame" width="95" height="18" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true">
<script>$('ifnoiframe').innerHTML='';</script></iframe> <span class="redword_err" id="imcode_err"></span></td>
  </tr>
</table></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left"><div style="position:relative; font-size:12px;">
            <div style="cursor:pointer"><span id="optionName" onclick="$('optionMenu').style.display='';">一直保持登陆</span><span class="mainmore" onmouseover="$('optionMenu').style.display='';"> ︾</span> <a href="#" onclick="forPassword();return false;" style="font-size:12px;">忘记密码</a></div>
            <ul id="optionMenu" onmouseover="this.style.display='';" onmouseout="this.style.display='none';" style="position:absolute; top:20px; left:0; z-index:99; padding:5px 10px; background-color:#FFFFFF; border:1px #D8D8D8 solid; display:none;">
              <li><a href="#" onclick="$('optionName').innerHTML=this.innerHTML;$('save_cookie').value='31536000';$('optionMenu').style.display='none';return false;">一直保持登陆</a></li>
              <li><a href="#" onclick="$('optionName').innerHTML=this.innerHTML;$('save_cookie').value='1209600';$('optionMenu').style.display='none';return false;">两周不用登陆</a></li>
              <li><a href="#" onclick="$('optionName').innerHTML=this.innerHTML;$('save_cookie').value='2592000';$('optionMenu').style.display='none';return false;">一月不用登陆</a></li>
              <li><a href="#" onclick="$('optionName').innerHTML=this.innerHTML;$('save_cookie').value='';$('optionMenu').style.display='none';return false;">随即过期</a> </li>
            </ul>
          </div></td>
        </tr>
        <tr>
          <td width="200" align="right">&nbsp;</td>
          <td align="left">      <input name="act" id="act" type="hidden" value="login" />
<!--button type="button" class="send2" onclick="this.type='submit';$('act').value='login'">登陆</button-->
<button type="submit" class="send2" onclick="$('act').value='login'" id="submitRun">登陆</button>
            </td>
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
      <input name="save_cookie" id="save_cookie" type="hidden" value="31536000" />
      <input name="location" id="location" type="hidden" value="<?php
$log = !empty($_REQUEST['location']) ? htmlspecialchars($_REQUEST['location']) : (!empty($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : './');
$log = strstr($log, 'act=logout') ? './' : $log;
echo !preg_match('/login_current\.php/i', $log) ? $log : './';
?>" />
    </form></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

</body>
</html>
