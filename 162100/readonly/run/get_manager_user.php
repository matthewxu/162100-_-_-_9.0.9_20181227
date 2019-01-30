<?php
require ('authentication_manager.php');
?>
<!--h5 class="list_title"><a class="list_title_in">基本参数管理</a></h5-->
<div class="note">提示：以下信息必须认真填写，尽量不要用特殊符号，如 \ : ; * ? ' &lt; &gt; | ，必免导致错误。</div>
<form action="?post=user" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>用户注册</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">用户注册及发送邮件：</td>
      <td><div class="note"><input type="radio" class="radio" name="stop_reg" value="0"<?php echo $web['stop_reg'] != 1 && $web['stop_reg'] != 2 ? ' checked' : ''; ?> />
        开启注册
        <input type="radio" class="radio" name="stop_reg" value="1"<?php echo $web['stop_reg'] == 1 ? ' checked' : ''; ?> />
        禁止注册
        <input type="radio" class="radio" name="stop_reg" value="2"<?php echo $web['stop_reg'] == 2 ? ' checked' : ''; ?> />
        注册审核
<br><input type="checkbox" class="checkbox" name="reg_statement" value="1"<?php
  echo file_exists('writable/require/statement.txt') ? ' checked="checked"' : '';
?> /> 开启《注册声明（用户协议）》[<a href="?get=modify&otherfile=<?php
$reg_f = file_exists('writable/require/statement.txt') ? 'statement' : 'statement_block';
echo get_en_url('writable/require/'.$reg_f.'.txt');
unset($reg_f);
?>" title="点击修改注册声明" onmouseover="sSD(this,event);" target="_blank">编辑</a>]
<br><input type="checkbox" class="checkbox" name="mail_send" value="1"<?php
@require ('writable/set/set_mail.php');
if (
$web['smtpserver'] != '' &&
$web['port']       != '' &&
$web['smtpuser']   != '' &&
$web['smtppwd']    != '' &&
$web['mailtype']   != '' &&
$web['sender']     != '') {
  echo $web['mail_send'] == 1 ?' checked':'';
} else {
  echo ' onclick="alert(\'尚未配置始发邮箱参数！\');return false;"';
}


?> /> 注册及修改档案向用户发送邮件[<a href="webmaster_central.php?get=mail" target="_blank">修改邮件发送函数（参数）</a>]

</div></td>
    </tr>



    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>用户登录</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">用户登录密码输错限制：</td>
      <td>每日最多限输错<input type="text" name="stop_login" value="<?php echo abs($web['stop_login']); ?>" size="5" onblur="isDigit(this,'<?php echo $web['stop_login']; ?>',1);" />次登录（含找回密码）（填0不限定）</td>
    </tr>


    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><b>用户等级</b></p></td>
    </tr>
    <tr>
      <td width="200" align="right">用户等级分标准：</td>
<?php
$web['class_iron'] = abs($web['class_iron']) > 0 ? abs($web['class_iron']) : 100;
$web['class_silver'] = abs($web['class_silver']) > $web['class_iron'] ? abs($web['class_silver']) : 500;
$web['class_gold'] = abs($web['class_gold']) > $web['class_silver'] ? abs($web['class_gold']) : 1000;
?>
      <td>¥0.00～铁级¥<input type="text" name="class_iron" value="<?php echo $web['class_iron']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['class_iron']; ?>',0);" />～银级¥<input type="text" name="class_silver" value="<?php echo $web['class_silver']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['class_silver']; ?>',0);" />～金级¥<input type="text" name="class_gold" value="<?php echo $web['class_gold']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['class_gold']; ?>',0);" />（大于此收入额为钻级）</td>
    </tr>




    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p><div style="position:relative;" id="chuangshou"><b>用户创收<?php if (!file_exists('addfunds.php')) { $addfund = 'disabled'; echo '<div style="position:absolute; width:120px; line-height:normal; height:130px; top:50px; left:50px; z-index:90; font-size:100px; color:#FF6600;">╳</div><span class="redword">（本版该功能模块未安装，请<a href="for_s.php" onclick="addSubmitSafe();$(\'addCFrame\').style.display=\'block\';" target="addCFrame" class="a_block b_block">联系官方</a>购买）</span>'; } ?></b></div></p></td>
    </tr>
    <tr>
      <td width="200" align="right">用户收入：</td>
      <td><div class="note"><input type="checkbox" class="checkbox" name="addfunds" value="1"<?php echo ($web['addfunds'] == 1 && file_exists('addfunds.php')) ? ' checked' : ''; echo $addfund; ?> />
        <span style="border-bottom:1px #000000 dashed; cursor:default;" title="关闭此项，用户中心不再显示“我的收入”，即用户访问不再产生收入" onmouseover="sSD(this,event);">开启用户创收模式</span><br />
        用户登陆、推广URL来访本站赠送货币值 
        <input type="text" name="loginadd" value="<?php echo $web['loginadd']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['loginadd']; ?>',0,'.');" /> 元/IP/日<br />
        基于上式：用户直接注册赠送货币值 <a href="webmaster_central.php?get=modify&otherfile=<?php echo get_en_url('readonly/function/reg_add_funds.php'); ?>" target="_blank">编辑函式</a><br />
        用户从上线分成
          <input type="text" name="loginadd2" value="<?php echo $web['loginadd2']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['loginadd2']; ?>',0,'.');" />
元/IP/日（推广URL引来的注册用户以后的登陆）<br />
基于上式：<span style="border-bottom:1px #000000 dashed; cursor:default;" title="即下线注册" onmouseover="sSD(this,event);">从推广URL引来的注册</span>赠送货币值 <a href="webmaster_central.php?get=modify&otherfile=<?php echo get_en_url('readonly/function/reg_add_funds.php'); ?>" target="_blank">编辑函式</a><br />
每IP每日限
<input type="text" name="loginadd_limit_ip" value="<?php echo $web['loginadd_limit_ip']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['loginadd_limit_ip']; ?>',0);" />
次注册（含登录）计赠货币值</div></td>
    </tr>
    <tr>
      <td width="200" align="right">用户提现：</td>
      <td>货币值达到 <input type="text" name="cash" value="<?php echo $web['cash']; ?>" size="5" onblur="isDigit(this,'<?php echo $web['cash']; ?>',0,'.');" /> 元时可以提现</td>
    </tr>
    <tr>
      <td width="200" align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  </table>
  <!--div class="red_err">特别提示：提交前请确定set目录具备写权限，因为要将配置结果写入writable/set/set.php文件</div-->
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>

</form>
