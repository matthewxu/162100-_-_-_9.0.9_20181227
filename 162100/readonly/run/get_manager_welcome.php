<?php
require ('authentication_manager.php');
?>
<div class="note">注：该功能显示在首页底部为“最新点入”。</div>
<form action="?post=welcome" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">首页来路流量贡献显示：</td>
      <td><?php echo file_exists('readonly/js/referrer_top.js') ? (file_exists('writable/js/referrer_top.js') ? '<div class="note"><input type="radio" class="radio" name="referrer_top" value="1" checked="checked" />已安装<br />
<input type="radio" class="radio" name="referrer_top" value="0" />卸载<br />
<input type="radio" class="radio" name="referrer_top" value="2" />清空</div>

' : '<div class="note"><input type="radio" class="radio" name="referrer_top" value="0" checked="checked" />未安装<br />
<input type="radio" class="radio" name="referrer_top" value="1" />安装</div>') : '<span class="redword">该版本未安装</span>[欲安装请联系作者定制]'; ?>
</td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>
</form>
