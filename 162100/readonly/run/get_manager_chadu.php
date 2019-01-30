<?php
require ('authentication_manager.php');
?>
<script language="javascript" type="text/javascript">
<!--
// 只允许输入数字
function chkT(){
  var n = 0;
  var allI = document.getElementsByName('du[]');
  if (allI != null && allI.length > 0) {
    for (var i = 0; i < allI.length; i++) {
      if (allI[i].value.replace(/^\s+|\s+$/g, '') == '') {
        alert('不能有空的输入！');
        return false;
      }
      n++;
      //break;
    }
  } else {
    alert('关键词输入不能空！');
    return false;
  }
  addSubmitSafe();
  return true;
}
-->
</script>
<script type="text/javascript">
<!--
//添加链接
function addKw(){
  var par=document.getElementById('add_keyword');
  var newDiv=document.createElement('DIV');
  newDiv.innerHTML=' <input name="du[]" type="text" size="30" />  <a href="javascript:void(0)" onclick="removeKw(this);return false;" title="删除">╳</a>';
  newDiv.style.paddingBottom = '10px';
  par.insertBefore(newDiv, null);
}
//删除栏目
function removeKw(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  //if(confirm('确定删除此频道吗？！')){
    par.removeChild(tar);
  //}
}
-->
</script>

<!--h5 class="list_title"><a class="list_title_in">上载图片（Logo）</a></h5-->
<div class="note">提示：<br />
<ol>
  <li>此功能如扫描出含有关键词的文件，请进一步检查甄别，是否是系统本身有用的文件。</li>
  <li>如果确认是被黑客嵌入恶意代码，找到相应文件，删除恶意代码。</li>
  <li>请加强主机安全。</li>
</ol>
</div>
<form action="?post=chadu" method="post" onsubmit="return chkT(this)">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr valign="top">
      <td width="200" align="right">恶意代码关键词：</td>
      <td><input name="du[]" type="text" size="30" value="<?php echo 'eval'.'('.'base64_'; ?>" /></td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">&nbsp;</td>
      <td style="padding-top:5px;"><span id="add_keyword"></span><button type="button" onclick="addKw();">增加关键词</button></td>
    </tr>
    <tr valign="top">
      <td width="200" align="right">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" class="send2" style="border:none;">扫描</button></td>
    </tr>
  </table>
</form>