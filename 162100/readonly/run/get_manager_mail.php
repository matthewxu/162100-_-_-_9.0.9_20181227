<?php
require ('authentication_manager.php');
?>
<?php

/* 始发邮箱 */
/* 162100源码 - 162100.com */
@ require ('writable/set/set_mail.php');


?>
<!--h5 class="list_title"><a class="list_title_in">始发邮箱</a></h5-->
<div class="note"> 注：
  <ol>
      <li>请确定您的邮箱支持smtp。</li>
    <li>设定此邮箱一般会在用户注册、更改档案、及邮件群发中使用。</li>
    <li>发送邮件项可在“系统参数”中开启或关闭。</li>
    <li>以下各项都要填。</li>
  </ol>
</div>
<script>
function chkMT(t) {
  if (t == 'm_strong') {
    $('smtpsecure').disabled = "";
    $('for_smtpsecure').style.textDecoration = "none";
  } else {
    $('smtpsecure').disabled = "disabled";
    $('for_smtpsecure').style.textDecoration = "line-through";
  }
}
</script>
  <form action="?post=mail" id="regform" method="post">
  <table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
      <tr>
        <th style="width:180px">参数</th>
        <th style="width:250px">值</th>
        <th>说明</th>
      </tr>

    <tr>
      <td style="width:200px;text-align:left">选择驱动</td>
      <td style="width:250px;text-align:left">
<?php

$web['mailer'] = !isset($web['mailer']) ? 0 : abs($web['mailer']);

  if (!file_exists('./PHPMailer-master')) {
    $mm3 = ' disabled="disabled"';
    $mm4 = ' <span class="grayword">[尚未安装<a href="?post=mail&mailer_upload=1">点击下载安装</a>]</span>';
  }
  if ($web['mailer'] == 1) {
    $mm1 = ' checked="checked"';
    //$mm2 = ' <b class="greenword">√</b>';
    if (!file_exists('./PHPMailer-master')) {
      $web['mailer'] = 0;
      $mm1 = '';
    }
  }else{
    $mmm1 = ' disabled="disabled"';
    $mmm2 = 'text-decoration:line-through;';
  }

  echo '<label for="m_light" style=" background-color:#EFEFEF; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;display:inline-block; *display:inline; *zoom:1; margin:3px 0; padding:5px 10px; cursor:pointer;"><input onclick="chkMT(\'m_light\');" name="mailer" id="m_light" type="radio" class="radio" value="0"'.($web['mailer'] == 0 ? ' checked="checked"' : '').' />轻量级</label> ';
  echo '<br /><label for="m_strong" style=" background-color:#EFEFEF; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;display:inline-block; *display:inline; *zoom:1; margin:3px 0; padding:5px 10px; cursor:pointer;"><input onclick="chkMT(\'m_strong\');" name="mailer" id="m_strong" type="radio" class="radio" value="1"'.$mm1.$mm3.' />PHPMailer-master'.$mm2.$mm4.'</label>';

?>
      </td>
      <td style="text-align:left">点击可切换发送插件</td>
    </tr>

<?php

$web['smtpsecure'] = !isset($web['smtpsecure']) ? '' : ($web['smtpsecure']=='ssl'?'ssl':'');




?>

        <tr>
          <td style="width:200px;text-align:left;">smtp服务器的端口</td>
          <td style="width:250px;text-align:left;"><label id="for_smtpsecure" for="smtpsecure" style=" background-color:#EFEFEF; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;display:inline-block; *display:inline; *zoom:1; margin:3px 0; padding:5px 10px; cursor:pointer;<?php echo $mmm2; ?>"><input type="checkbox" class="checkbox" name="smtpsecure" id="smtpsecure" value="ssl"<?php echo $web['smtpsecure']=='ssl'?' checked="checked"':''; ?><?php echo $mmm1; ?> />启用SSL</label><br />
<input type="text" name="port" style="width:220px;" value="<?php echo $web['port']; ?>" size="255" /></td>
          <td style="text-align:left">一般是25。开启SSL端口后，如465/994/587</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">smtp服务器的地址</td>
          <td style="width:250px;text-align:left;"><input type="text" name="smtpserver" style="width:220px;" value="<?php echo $web['smtpserver']; ?>" size="255" /></td>
          <td style="text-align:left">如smtp.163.com（<strong>请确保你的始发邮箱支持smtp</strong>）</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">您登陆smtp服务器的用户名</td>
          <td style="width:250px;text-align:left;"><input type="text" name="smtpuser" style="width:220px;" value="<?php echo $web['smtpuser']; ?>" size="255" /></td>
          <td style="text-align:left">如xxx@xxx.com</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">您登陆smtp服务器的密码或授权码</td>
          <td style="width:250px;text-align:left;"><input type="password" name="smtppwd" style="width:220px;" value="<?php echo $web['smtppwd']; ?>" size="255" /></td>
          <td style="text-align:left">如果你开启了第三方邮件客户端登录并设置了授权码，请填授权码，比如网易</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">邮件的类型</td>
          <td style="width:250px;text-align:left;"><input type="text" name="mailtype" style="width:220px;" value="<?php echo $web['mailtype']; ?>" size="255" /></td>
          <td style="text-align:left">可选值是TXT或HTML，TXT表示是纯文本的邮件，HTML表示是html格式的邮件</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">发件人</td>
          <td style="width:250px;text-align:left;"><input type="text" name="sender" style="width:220px;" value="<?php echo $web['sender']; ?>" size="255" /></td>
          <td style="text-align:left">发件人，一般要与您登陆smtp服务器的用户名相同，否则可能会因为smtp服务器的设置导致发送失败</td>
        </tr>
        <tr>
          <td style="width:200px;text-align:left;">设置邮件发送内容</td>
          <td style="width:250px;text-align:left;">
<a id="ad_table_" href="javascript:void(0)" onclick="this.style.display='none';$('ad_table__').style.display='';$('ad_table_1').style.display='';$('ad_table_2').style.display='';$('ad_table_3').style.display='';$('ad_table_4').style.display='';return false;">展开︾</a>

<a id="ad_table__" href="javascript:void(0)" onclick="this.style.display='none';$('ad_table_').style.display='';$('ad_table_1').style.display='none';$('ad_table_2').style.display='none';$('ad_table_3').style.display='none';$('ad_table_4').style.display='none';return false;" style="display:none">收缩︽</a></td>
          <td style="text-align:left">可填写代码。请保留&lt;{内的内容}&gt;<br />请务必确保所填代码正确无误！系统将不进行安全过滤，否则执行页面将出错或瘫痪，切记切记</td>
        </tr>
<?php
$web['mailto_subject_reg'] = !empty($web['mailto_subject_reg']) ? $web['mailto_subject_reg'] : '欢迎注册[<{sitename2}>]';
$web['mailto_content_reg'] = !empty($web['mailto_content_reg']) ? $web['mailto_content_reg'] : '　　欢迎加入[<{sitename2}>]！<br />　　请保持持续热情支持[<{sitename}>]，并欢迎积极发表、反馈问题。<br />　　我们的站址为：<a href="<{webpath}>" target="_blank"><{webpath}></a>，欢迎光临。<br /><br /><br /><br /><font color=#999999>如果不是您本人使用此邮箱进行的注册，您可至<a href="<{webpath}>" target="_blank"><{webpath}></a>与管理员取得联系，我们将对冒用您邮箱的用户进行删除。</font>';

$web['mailto_subject_file'] = !empty($web['mailto_subject_file']) ? $web['mailto_subject_file'] : '个人信息修改成功[<{sitename2}>]';
$web['mailto_content_file'] = !empty($web['mailto_content_file']) ? $web['mailto_content_file'] : '　　您已成功修改了个人信息[<{sitename2}>]！<br />　　请保持持续热情支持[<{sitename}>]，并欢迎积极发表、反馈问题。<br />　　我们的站址为：<a href="<{webpath}>" target="_blank"><{webpath}></a>，欢迎光临。<br /><br /><br /><br /><font color=#999999>如果不是您本人使用此邮箱进行的注册，您可至<a href="<{webpath}>" target="_blank"><{webpath}></a>与管理员取得联系，我们将对冒用您邮箱的用户进行删除。</font>';

$web['mailto_subject_forpsw'] = !empty($web['mailto_subject_forpsw']) ? $web['mailto_subject_forpsw'] : '找回密码[<{sitename2}>]';
$web['mailto_content_forpsw'] = !empty($web['mailto_content_forpsw']) ? $web['mailto_content_forpsw'] : '你好！<br />　　你在[<{sitename2}>]进行找回密码，新的密码为：<{newpassword}><br />请点此链接<a href="<{webpath}>login.php" target="_blank"><{webpath}>login.php</a>登录。';

$web['mailto_subject_newsite'] = !empty($web['mailto_subject_newsite']) ? $web['mailto_subject_newsite'] : '恭喜：您网站的收录请求已经通过';
$web['mailto_content_newsite'] = !empty($web['mailto_content_newsite']) ? $web['mailto_content_newsite'] : '　　您于<{addsitedate}>向<a href="<{webpath}>" target="_blank"><{sitename2}></a>提交的网站[<{addsitename}>]已通过审核，成功被收录。<br />　　收录页面为：<{addsitetext}><br />　　在此也欢迎光临<a href="<{webpath}>" target="_blank"><{sitename}></a>';



?>
        <tr id="ad_table_1" style="display:none">
          <td style="width:200px;text-align:left; background-color:#EEEEEE;">用户注册时向用户发送邮件内容</td>
          <td colspan="2" style="text-align:left; background-color:#EEEEEE;"><input type="text" name="mailto_subject_reg" style="width:535px;" value="<?php echo $web['mailto_subject_reg']; ?>" size="255" /><br /><textarea name="mailto_content_reg" style="width:535px;" rows="5"><?php echo $web['mailto_content_reg']; ?></textarea></td>
        </tr>
        <tr id="ad_table_2" style="display:none">
          <td style="width:200px;text-align:left; background-color:#EEEEEE;">用户修改档案时向用户发送邮件内容</td>
          <td colspan="2" style="text-align:left; background-color:#EEEEEE;"><input type="text" name="mailto_subject_file" style="width:535px;" value="<?php echo $web['mailto_subject_file']; ?>" size="255" /><br /><textarea name="mailto_content_file" style="width:535px;" rows="5"><?php echo $web['mailto_content_file']; ?></textarea></td>
        </tr>
        <tr id="ad_table_3" style="display:none">
          <td style="width:200px;text-align:left; background-color:#EEEEEE;">用户找回密码时向用户发送邮件内容</td>
          <td colspan="2" style="text-align:left; background-color:#EEEEEE;"><input type="text" name="mailto_subject_forpsw" style="width:535px;" value="<?php echo $web['mailto_subject_forpsw']; ?>" size="255" /><br /><textarea name="mailto_content_forpsw" style="width:535px;" rows="5"><?php echo $web['mailto_content_forpsw']; ?></textarea></td>
        </tr>
        <tr id="ad_table_4" style="display:none">
          <td style="width:200px;text-align:left; background-color:#EEEEEE;">管理员审核用户提交的网站时向用户发送邮件内容</td>
          <td colspan="2" style="text-align:left; background-color:#EEEEEE;"><input type="text" name="mailto_subject_newsite" style="width:535px;" value="<?php echo $web['mailto_subject_newsite']; ?>" size="255" /><br /><textarea name="mailto_content_newsite" style="width:535px;" rows="5"><?php echo $web['mailto_content_newsite']; ?></textarea></td>
        </tr>
      <!--/table>
  <div class="red_err">特别提示：提交前请确定set目录具备写权限，因为要将配置结果写入writable/set/set_mail.php文件，否则虽提示成功，但实际仍配置失败。</div>
  <table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table"-->
        <tr>
          <td style="width:200px;text-align:left;">&nbsp;</td>
          <td style="width:250px;text-align:left;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
          <td style="text-align:left">&nbsp;</td>
        </tr>
    </table>
  </form>
