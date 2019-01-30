<?php
require ('authentication_manager.php');
?>
<script language="javascript" type="text/javascript">
<!--
// 只允许输入数字
function chkT(){
  if($('uploadfile').value==''){
    alert("选择图片不能空！");
    return false;
  }
  if($('imgname').value==''){
    alert("图片名称不能空！");
    return false;
  }
  if(!/^[0-9a-zA-Z\_\-]+$/.test($('imgname').value.replace(/\.[a-zA-Z]+$/,''))){
    alert("图片名称只允许输入字母、数字、下划线、中划线！");
    return false;
  }
  if($('imgdir').value!='' && !/^[0-9a-zA-Z\_\-\/]+$/.test($('imgdir').value)){
    alert("上传目录只允许输入字母、数字、_ - / ，否则留空为根目录");
    return false;
  }
  addSubmitSafe();
  return true;
}
-->
</script>


<!--h5 class="list_title"><a class="list_title_in">上载图片（Logo）</a></h5-->
<div class="note">提示：<br />
<ol>
  <li>此功能可在线更改各类图片（不只限logo），如你添加的广告代码中需要引用图片，可用该功能灵活、方便的调用。</li>
  <li>请选jpg、gif、png格式，尺寸小于2M。当然，您也可以手动制作好图片，存到你希望的目录中。</li>
  <li>系统自用图片保存于目录：readonly/images，后天增加的图片建议上传目录：writable/__web__/images。也可新建目录。</li>
  <li><b class="redword">注:logo在writable/images目录，为png格式，即logo.png</b>。</li>
</ol>
</div>
<form action="?post=logo" enctype="multipart/form-data" method="post" onsubmit="return chkT(this)">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr valign="top">
      <td width="200" align="right">图片位置：</td>
      <td width="300"><input name="uploadfile" id="uploadfile" type="file" class="file" size="5"></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">图片名称：</td>
      <td width="300"><input name="imgname" id="imgname" type="text" size="20" value="logo.png" /></td>
      <td class="grayword">填字母数字、_ -</td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">图片尺寸：</td>
      <td width="300"><a id="imgwho" href="javascript:void(0)" onclick="$('imgwh').style.display='block';this.style.display='none';return false;">设置</a><div id="imgwh" style="display:none;">宽<input name="imgw" id="imgw" type="text" size="2" value="0" onblur="isDigit(this,'',0);" />px 高<input name="imgh" id="imgh" type="text" size="2" value="0" onblur="isDigit(this,'',0);" />px
<label for="imgc" title="就是保持图片上图形不变形，但是可能会对图片进行截取；否则压缩到目标尺寸后，会形成图像收缩和拉伸" onmouseover="sSD(this,event);"><input name="imgc" id="imgc" type="checkbox" class="checkbox" value="1" checked="checked" />保持比例</label> <a href="javascript:void(0)" onclick="$('imgwho').style.display='inline';$('imgwh').style.display='none';return false;" title="关闭" onmouseover="sSD(this,event);">×</a></div>
</td>
      <td class="grayword">不做改变则留0不填，要填就填好，否则不处理</td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">上传目录：</td>
      <td width="300"><input name="imgdir" id="imgdir" type="text" size="20" value="writable/images" /></td>
      <td class="grayword">填字母数字、_ - / ，留空为根目录</td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">&nbsp;</td>
      <td width="300" style="padding-top:5px;"><button type="submit">上传</button></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>