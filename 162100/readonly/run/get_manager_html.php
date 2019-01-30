<?php
require ('authentication_manager.php');
?>
<?php

if (!isset($web['html'])) {
  @ require ('writable/set/set_html.php');
}


?>
<div class="note">提示：<br />
<ol>
  <li>静态文件默认生成在根目录，便于统一使用数据、调用素件路径等。</li>
</ol>
</div>

<form action="?post=html" method="post">
  <input type="hidden" name="act" value="close" />
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">当前状态：</td>
      <td><?php echo $web['html'] == true ? '<span class="redword">已生成</span> <button type="submit" style=" letter-spacing:0; background:none; color:#667788;">关闭全静态</button>' : '未开启静态化'; ?></td>
    </tr>
  </table>
</form>
<form action="?post=html" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right" height="100">静态页面生成目录：</td>
      <td>根目录 <a href="javascript:void(0);" onclick="$('html_dir').style.display='inline';">生成在其它目录</a><input type="text" id="html_dir" name="html_dir" value="<?php echo rtrim($web['html_dir'], '/'); ?>" size="8" readonly="readonly" title="本版本不支持创建或更改静态目录，请联系作者索取支持生成在子目录的版本" onmouseover="sSD(this,event);" style="display:none;" /></td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td><button type="submit" class="send2" style="border:none; width:auto;" onclick="return confirm('确定提交一键全静态吗？');"><?php echo $web['html'] == true ? '重新' : ''; ?>一键全静态</button></td>
    </tr>
  </table>
</form>
