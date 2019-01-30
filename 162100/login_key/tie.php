<style type="text/css">
<!--
.username { background:#FFFFFF url(readonly/images/login_bj.gif) 5px 50% no-repeat; }
-->
</style>
<script language="JavaScript" type="text/javascript">
<!--
function postChk(form){
  var un=form.username;
  if(!un.value.replace(/[\u4e00-\u9fa5]/g,'abc').match(/^.{3,45}$/)){
    $('username_err').innerHTML=showErr('请正确填写帐号！可填用户名（3-45字符）或注册邮箱');
    //un.focus();
    return false;
  }else{
    $('username_err').innerHTML='√';
  }
  var pn=form.password;
  if(pn.value.length>30 || pn.value.length<3){
    $('password_err').innerHTML=showErr('密码长度是3-30字符！');
	//pn.focus();
    return false;
  } else {
    $('password_err').innerHTML='√';
  }
  //addSubmitSafe();
  return true;
}

function postChk2(form){
  var un=form.username;
  if(un.value=='' || !un.value.replace(/[\u4e00-\u9fa5]/g,'abc').match(/^.{3,45}$/)){
    $('username_err2').innerHTML=showErr('请正确填写用户名（3-45个字）');
    //un.focus();
    return false;
  }else{
    $('username_err2').innerHTML='√';
  }
  var ml=form.email;
  if(ml.value=='' || !ml.value.match(/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/)){
    $('email_err2').innerHTML=showErr('email必填！填：xxx@xxx.xxx(.xx) 格式');
	//$('email').focus();
    return false;
  } else {
    $('email_err2').innerHTML='√';
  }
  return true;
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

function showL(v1, v2){
  try{
    $('list_title_'+v1).className='list_title_in';
    $('list_title_'+v2).className='';
  }catch(e){}
  try{
    $('loginform_'+v1).style.display='block';
    $('loginform_'+v2).style.display='none';
  }catch(e){}
}

-->
</script>
<div class="note"><img src="<?php echo $bar_face; ?>" /> <?php echo $bar_name; ?>，欢迎来自 <img src="readonly/images/<?php echo $session[4]; ?>.png" /><?php echo (string)$session[4]=='162100'?$session[5]:''; ?> 的登录。您需要进行以下操作：</div>
<h5 class="list_title"><a class="list_title_in" id="list_title_tie" href="javascript:void(0);" onClick="showL('tie', 'new');return false;">绑定已有帐号</a> <a id="list_title_new" href="javascript:void(0);" onClick="showL('new', 'tie');return false;">新建一个帐号</a></h5>
<form action="member.php?post=login" method="post" onsubmit="return postChk(this);" id="loginform_tie" target="_self">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">帐号：</td>
      <td style="text-align:left;"><input name="username" type="text" onblur="postChk(this.form);if(this.value.replace(/^\s+|\s+$/g,'')==''){this.className='username';}" onfocus="this.className='';" style="width:181px;" class="username" maxlength="255" />
          <span class="redword_err" id="username_err"></span></td>
    </tr>
    <tr>
      <td width="200" align="right">密码：</td>
      <td style="text-align:left;"><input name="password" id="password" type="password" onblur="postChk(this.form);" style="width:181px" maxlength="30" />
          <span class="redword_err" id="password_err"></span></td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td style="text-align:left;"><button name="submit" type="submit" class="send2" style="border:none;">绑定</button></td>
    </tr>
  </table>
  <input name="act" type="hidden" value="tie" />
  <input name="location" id="location" type="hidden" value="<?php

$log = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './';
echo !preg_match('/login_current\.php/i', $log) ? $log : './';
?>" />
  <input name="bar" type="hidden" value="<?php echo $bar; ?>" />
  <input name="key" type="hidden" value="<?php echo $key1.$key2; ?>" />
</form>
<form action="member.php?post=login" method="post" onsubmit="return postChk2(this);" id="loginform_new" style="display:none;" target="_self">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">用户名：</td>
      <td style="text-align:left;"><input name="username" type="text" onblur="postChk2(this.form);" style="width:181px;" maxlength="255" value="<?php echo $bar_name; ?>" />
          <span class="redword_err" id="username_err2"></span></td>
    </tr>
    <tr>
      <td width="200" align="right">邮箱：</td>
      <td style="text-align:left;"><input name="email" type="text" onblur="postChk2(this.form);" style="width:181px" maxlength="200" />
          <span class="redword_err" id="email_err2"></span></td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td style="text-align:left;"><button name="submit" type="submit" class="send2" style="border:none;">创建新用户</button></td>
    </tr>
  </table>
  <input name="act" type="hidden" value="new" />
  <input name="location" id="location" type="hidden" value="<?php

$log = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './';
echo !preg_match('/login_current\.php/i', $log) ? $log : './';
?>" />
  <input name="bar" type="hidden" value="<?php echo $bar; ?>" />
  <input name="key" type="hidden" value="<?php echo $key1.$key2; ?>" />
  <input name="bar_name" type="hidden" value="<?php echo $bar_name; ?>" />
  <input name="bar_face" type="hidden" value="<?php echo $bar_face; ?>" />
</form>
