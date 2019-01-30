<?php
require ('authentication_manager.php');
?>
<div class="note">注：该功能显示在首页底部。</div>
<form action="?post=foot_searchbox" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">首页底部搜索框开关：</td>
      <td><?php echo file_exists('readonly/require/foot_searchbox.php') ? '<div class="note note2">'.(file_exists('writable/require/foot_searchbox.php') ? '<input type="radio" class="radio" name="foot_searchbox" value="1" checked="checked" />已安装<br /><input type="radio" class="radio" name="foot_searchbox" value="0" />卸载' : '<input type="radio" class="radio" name="foot_searchbox" value="0" checked="checked" />未安装<br />
<input type="radio" class="radio" name="foot_searchbox" value="1" />安装').'</div>' : '<span class="redword">该版本未安装</span>[欲安装请联系作者定制]'; ?>
</td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>
</form>
