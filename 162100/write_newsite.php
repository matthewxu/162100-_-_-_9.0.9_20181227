<?php
@ require ('writable/set/set.php');
@ require ('writable/set/set_area.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站收录<?php echo $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script language="javascript" type="text/javascript">
<!--
function postChk(theForm){
  var wu=theForm.siteurl.value.replace(/[\s\r\n]+/,'');
  if(wu==''){
	theForm.siteurl.focus();
    alert('网址不能空！');
    return false;
  }
  if(!wu.match(/^http(s)?\:\/\//i)){
	theForm.siteurl.focus();
    alert('网址格式不对！请以http://或https://开头');
    return false;
  }
  if(wu.length>200 || wu.length<13){
    alert('网址长度是13-200字符！');
	theForm.siteurl.focus();
    return false;
  }

  var un=theForm.sitename.value.replace(/^[\s\r\n]+|[\s\r\n]+$/,'').replace(/[\s\r\n]+/,' ');
  if(un==''){
	theForm.sitename.focus();
    alert('站名不能空！');
    return false;
  }
  if(un.length>30 || un.length<3){
    alert('站名长度是3-30字符（汉字为3字符），请尽量用汉字、数字、英文及下划线组成！');
	theForm.sitename.focus();
    return false;
  }

  var em=theForm.email.value.replace(/[\s\r\n]+/,'');
  if(em==''){
    alert('email不能留空！');
	theForm.email.focus();
    return false;
  }
  if(!em.match(/^[\w\.\-]+@[\w\.\-]+$/)){
    alert('email填：xxx@xxx.xxx(.xx) 格式');
	theForm.email.focus();
    return false;
  }
  
  var im=theForm.imcode.value.replace(/[\s\r\n]+/,'')
  if(im==''){
    alert('验证码不能留空！');
	theForm.imcode.focus();
    return false;
  }
  if(im!=getCookie('regimcode')){
    alert('验证码不符！');
	theForm.imcode.focus();
    return false;
  }
  addSubmitSafe();
  return true;
}

-->
</script>
</head>

<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./">首页</a><a id="top_title_is">网站申录</a></div>

<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><p><b>提示：</b></p>
          <ol>
            <li>一个网站只需提交一次。 </li>
            <li>您只需要提交网站的首页地址，无需提交详细的内容页面</li>
            <li>符合相关标准的网站，会在您提交的一周内被处理 </li>
            <li>本站不保证一定能收录您提交的网站</li>
          </ol></td>
      <td class="menu_right"><table width="100%" border="0" cellpadding="10" cellspacing="0">
        <form id="eform" name="eform" action="member.php?post=write_newsite" method="post" onsubmit="return postChk(this)">
          <tr>
            <td width="100" align="right">* 网　址：</td>
            <td width="280" align="left"><input size="40" type="text" value="http://" name="siteurl" />            </td>
            <td align="left">请输入完整的网址。例如：<?php echo $web['sitehttp']; ?> </td>
          </tr>
          <tr>
            <td width="100" align="right">* 站　名：</td>
            <td width="280" align="left"><input size="40" type="text" name="sitename" /></td>
            <td align="left">注：站名必须能在你的网页&lt;title&gt;&lt;/title&gt;标签文字中找到</td>
          </tr>
          <tr>
            <td width="100" align="right">* 分　类：</td>
            <td width="280" align="left">

              <select id="sitecolumn" name="sitecolumn" onchange="showClass(this.options[this.selectedIndex].value)">
                    <option value="no">选择频道</option>
                </select>
                  <select id="siteclass" name="siteclass" onchange="showTitle(this.options[this.selectedIndex].value)">
                    <option>选择栏目</option>
                </select>
                  <select id="sitetitle" name="sitetitle">
                    <option>选择分类</option>
                </select></td>
            <td align="left"><a href="column.php" target="_blank">网站地图</a></td>
          </tr>
          <tr>
            <td width="100" align="right">* 邮　箱：</td>
            <td width="280" align="left"><input size="40" type="text" name="email" /></td>
            <td align="left">方便我们联系您 </td>
          </tr>
          <tr>
            <td width="100" align="right">* 验证码：</td>
            <td width="280" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:110px"><input name="imcode" id="imcode" type="text" onblur="postChk()" style="width:90px" maxlength="6" /></td>
    <td><iframe src="readonly/js/imcode.html" id="imFrame" name="imFrame" width="95" height="18" frameborder="0" marginwidth="0" marginheight="0" scrolling="No" allowtransparency="true"></iframe> <span class="redword" id="imcode_err"></span></td>
  </tr>
</table></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" align="right">&nbsp;</td>
            <td width="280" align="left"><button name="submit" type="submit" class="send2" style="border:none;">提交</button></td>
            <td align="left">&nbsp;</td>
          </tr>
        </form>
      </table>
          <p><b>特别提示：</b></p>
          <ul>
            <li>申请收录的网站，如果在其首页设置<?php echo $web['sitehttp']; ?>网址导航的友情链接，我们将会优先考虑收录</li>
          </ul>
          <!--ol>
            <li class="redword">PR值大于等于4，或Alexa排名20W以内，及Baidu、Google有收录的网站系统会自动优先收录</li>
            <li>申请收录的网站，如果在其首页设置<?php echo $web['sitehttp']; ?>网址导航的友情链接，我们将会优先考虑收录</li>
          </ol--><br />
          <p><b>条款：</b></p>
        <ol>
          <li>不收录不良内容或提供不良内容链接的网站，以及网站名称或内容违反国家有关政策法规的网站</li>
          <li>不收录含有病毒、木马，弹出插件或恶意更改他人电脑设置的网站、及有多个弹窗广告的网站</li>
          <li>不收录网站名称和实际内容不符的网站，如贵站正在建设中，或尚未明确主题的网站</li>
          <li>不收录以同类型网站通用名称文字作为申请的名称，例如“在线音乐”，请以适当的网站名做为申请名称</li>
          <li>不收入非顶级域名、挂靠其他站点、无实际内容，只提供域名指向的网站或仅有单页内容的网站</li>
          <li>不收录在正常情况下无法访问的网站</li>
          <li>不收录信息产业部ICP/IP无备案的网站</li>
          <li>公益性网站，或内容确实有独特之处的网站将优先收录</li>
        </ol></td>
    </tr>
  </table></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>
<script language="JavaScript" type="text/javascript">
<!--

var cities=new Array();
<?php
unset($web['area']['homepage'], $web['area']['mingz']);

$text_column = $text_class = '';
if (count($web['area']) > 0) {
  foreach ((array)$web['area'] as $column_id => $column) {
    $column = (array)$column;
    $text_class .= '
cities["'.$column_id.'"]=new Array();';
    foreach ($column as $class_id => $class) {
      $text_class .= '
cities["'.$column_id.'"]["'.$class_id.'"]="'.$class[0].'";';
    }
  }
}
echo $text_class;
?>


function isArray(o) {   return Object.prototype.toString.call(o) === '[object Array]';  }

function showColumn(){
  var sitecolumnObj=$("sitecolumn");
  if(sitecolumnObj!=null && isArray(cities)){
    for(i in cities){
      var objOption=document.createElement("OPTION");
      objOption.value=i;
      objOption.text=cities[""+i+""]["name"];
	  sitecolumnObj.options[sitecolumnObj.length]=objOption;
    }
  }
}

function showClass(id){
  id=parseFloat(id).toString();
  var classObj=$('siteclass');
  if(classObj!=null && isArray(cities[""+id+""])){
    classObj.options.length=0;
    //for(var i=1; i<cities[id].length; i++){
    for(i in cities[id]){
      if(i=='name') continue;
      var objOption=document.createElement("OPTION");
      objOption.value=id+'_'+i; //
      objOption.text=cities[id][i];
	  classObj.options[classObj.length]=objOption;
    }
  }
  showTitle(classObj.options[0].value+'');
}

function showTitle(id){
  if($('sitecolumn').value!='no'){
    $('addCFrame').src='member.php?post=write_newsite&act='+id+'';
  }else{
    var classObj=$('siteclass');
    classObj.options.length=0;
    var objOption=document.createElement("OPTION");
    objOption.value='';
    objOption.text='选择栏目';
    classObj.options[classObj.length]=objOption;
    var titleObj=$('sitetitle');
    titleObj.options.length=0;
    var objOption=document.createElement("OPTION");
    objOption.value='';
    objOption.text='选择分类';
    titleObj.options[titleObj.length]=objOption;
  }
}

showColumn();
-->
</script>


</body>
</html>
