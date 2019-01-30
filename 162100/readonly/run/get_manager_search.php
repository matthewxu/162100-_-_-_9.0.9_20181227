<?php
require ('authentication_manager.php');
?>


<h5 class="list_title"><a class="list_title_in" id="po1" name="po1">集成搜索引擎基本设置</a></h5>


<form action="?post=search" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">默认搜索引擎样式：</td>
      <td>
<div class="note">
<?php
/*
$sbar = @glob('readonly/js/search_bar_*.js');
if (is_array($sbar) && count($sbar) > 0) {
  foreach ($sbar as $s) {
    $bar_n = basename($s);
    $bar_n = substr($bar_n, 11, 1);
    echo '<input type="radio" class="radio" name="search_bar" id="search_bar_1" value="'.$bar_n.'"'.($web['search_bar'] == $bar_n ? ' checked' : '').' />
        <label for="search_bar_1">样式'.$bar_n.'</label> [<a href="search_bar.php?type='.$bar_n.'" target="_blank">预览</a>] ';
    unset($bar_n);
  }
} else {
  echo '没有发现搜索引擎样式模板！';
}
*/

  foreach (array(1,2,3) as $s) {
    echo '<input type="radio" class="radio" name="search_bar" id="search_bar_1" value="'.$s.'"'.($web['search_bar'] == $s ? ' checked' : '').' />
        <label for="search_bar_1">样式'.$s.'</label> [<a href="search_bar.php?type='.$s.'" target="_blank">预览</a>] ';
  }


?>
</div></td>
    </tr>
    <tr>
      <td width="200" align="right">默认搜索引擎类型：</td>
      <td><div class="note">
<script>

if(isArray(searchSelect)){
  for(type in searchSelect){
    document.write('<div>');
    document.write('<b>'+searchSelect[type][0]+'：</b>');
    if(isArray(searchSelect[type])){
      for(n in searchSelect[type]){
        if(n==0) continue;
        document.write('<input type="radio" class="radio" name="search_type_id" value="'+type+'-'+n+'"'+(search_default_type+'-'+search_default_id == type+'-'+n ? ' checked' : '')+' />'+searchSelect[type][n][1]+' ');
      }
    }
    document.write('</div>');
  }
}
</script></div></td>
    </tr>
<?php
$opensugV_default = '';
if (file_exists('writable/js/opensug.js')) {
  $opensugV_default .= '1';
  $opensugF = 'writable/js/opensug.js';
} else {
  $opensugV_default .= '0';
  $opensugF = 'readonly/js/opensug.js';
}
if (preg_match('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', file_get_contents($opensugF), $m)) {
  $opensugV_default2 = $m[1];
} else {
  $opensugV_default2 = 1;
}
$opensugV_default .= $opensugV_default2;
$zn1 = substr($opensugV_default, 0, 1);
$zn2 = substr($opensugV_default, 1, 1);

?>
    <tr>
      <td width="200" align="right">首页搜索输入联想：</td>
      <td><div class="note"><label for="zn_0"><input type="radio" class="radio" name="zn" id="zn_1" value="1" onclick="$('zn2').disabled=false;"<?php echo (isset($zn1) && $zn1 == 1) ? '  checked="checked"' : ''; ?> /> 开启</label>（<input type="checkbox" class="checkbox" id="zn2" name="zn2" value="1" onclick="$('zn_1').checked=true;"<?php echo (isset($zn2) && $zn2 == 1) ? '  checked="checked"' : ''; ?><?php echo (isset($zn1) && $zn1 == 0) ? ' disabled="disabled"' : ''; ?> />点选关键词自动搜索） <label for="zn_1"><input type="radio" class="radio" name="zn" id="zn_2" value="0" onclick="$('zn2').disabled='disabled';"<?php echo (isset($zn1) && $zn1 == 0) ? '  checked="checked"' : ''; ?> /> 关闭</label></div></td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="base" />

</form>
<p>&nbsp;</p>

<h5 class="list_title"><a class="list_title_in" id="po2" name="po2">集成搜索引擎深入设置</a></h5>

<iframe id="lastFrame" name="lastFrame" style="display:none;"></iframe>
<style type="text/css">
<!--
.newcolumn { width:100%; float:left; clear:both; margin-left:0; }
.newclass { display:inline-block !important; display:inline; zoom:1; }
-->
</style>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; font-family:"宋体"; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table td { background-color:#F8F8F8; text-align:center; }
#ad_table th, #ad_table td { padding:5px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
.sli { border-bottom:1px #D8D8D8 solid; text-align:left; padding-bottom:5px; margin-bottom:5px; }
.sli .sliin { display:inline-block !important; display:inline; zoom:1; text-align:center; padding-right:5px; }
.s_ { background-color:#EEEEEE; margin-bottom:10px; }
-->
</style>
<script type="text/javascript">
<!--

//删除
function removeOption(obj){
  if(obj.innerHTML=='╳'){
    var v='引擎';
  }else{
    var v='搜索分类';
  }
  var tar=obj.parentNode;
  var par=tar.parentNode;
  //if(confirm('确定删除此'+v+'吗？！')){
    try{
      tar.style.position='relative';
      tar.innerHTML+='<div style="padding:0 5px; position:absolute; top:100%; left:0; background-color:#FF6600; color:#FFFFFF;">已删除此'+v+'</div>';
      setTimeout(function(){par.removeChild(tar);},500);
    }catch(err){
    }
  //}
}

//添加链接
function addLink(type){
  var par=$('base_'+type+'');
  var newDiv=document.createElement('DIV');
  n=(new Date()).valueOf();
  newDiv.id='s_'+type+'_'+n+'';
  newDiv.className='sli';
  newDiv.innerHTML='\
<span class="sliin" style="width:65px;"><input type="text" id="bar_name_'+type+'_'+n+'" name="bar_name['+type+']['+n+']" size="4" /></span><span class="sliin" style="width:280px;"><input type="text" id="bar_url_'+type+'_'+n+'" name="bar_url['+type+']['+n+']" style="width:98%;" /></span>关键字<span class="sliin" style="width:30px;"><input type="text" id="bar_url_'+type+'_'+n+'_" name="bar_url_['+type+']['+n+']" style="width:98%;"<?php echo !file_exists('addfunds.php') ? ' onfocus="alert(\\\'这里商业版才能让填噢\\\');this.blur();"' : ''; ?> /></span> | <span class="sliin" style="width:95px;"><input type="hidden" id="bar_img_1_'+type+'_'+n+'" name="bar_img_1['+type+']['+n+']" /><img id="img_1_'+type+'_'+n+'" width="68" height="28" title="1_'+type+'_'+n+'.gif" /><a class=file_b onmouseover="addFile(this,1,\''+type+'\',\''+n+'\');">上传</a></span><span class="sliin" style="width:85px;"><input type="hidden" id="bar_img_2_'+type+'_'+n+'" name="bar_img_2['+type+']['+n+']" /><img id="img_2_'+type+'_'+n+'" width="16" height="16" title="2_'+type+'_'+n+'.gif" /><a class=file_b onmouseover="addFile(this,2,\''+type+'\',\''+n+'\');">上传</a></span>\
<a title="删除" href="javascript:void(0)" onclick="removeOption(this);return false;">╳</a> \
<a title="插入" href="javascript:void(0)" onclick="insertLink(this,\''+type+'\');return false;">↖</a> \
<a title="上移" href="javascript:void(0)" onclick="upLink(this);return false;">↑</a> \
<a title="上移" href="javascript:void(0)" onclick="downLink(this);return false;">↓</a>';
  par.insertBefore(newDiv,null);
  $('bar_name_'+type+'_'+n+'').focus();
}

//排序：链接 向上
function upLink(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  var prevObj=tar.previousSibling;
  while(prevObj!=null && prevObj.nodeType!=1){
    prevObj=prevObj.previousSibling;
  }
  if(prevObj==null){
    alert('已是最上级！');
    return;
  }else{
    try{par.insertBefore(tar,prevObj);}catch(err){alert('向上移动失败！请稍候再试');return;}
    //par.removeChild(tar);
  }
}

//排序：链接 向下
function downLink(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  var nextObj=tar.nextSibling;
  while(nextObj!=null && nextObj.nodeType!=1){
    nextObj=nextObj.nextSibling;
  }
  if(nextObj==null){
    alert('已是最下级！');
    return;
  }
  var endObj;
  if(nextObj!=null){
    var nextnextObj=nextObj.nextSibling;
    while(nextnextObj!=null && nextnextObj.nodeType!=1){
      nextnextObj=nextnextObj.nextSibling;
    }
    var endObj=nextnextObj!=null?nextnextObj:null;
  }else{
    endObj=null;
  }
  try{par.insertBefore(tar,endObj);}catch(err){alert('向下移动失败！请稍候再试');return;}
  //par.removeChild(tar);
}

//插入
function insertLink(obj,type){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  var newDiv=document.createElement('DIV');
  n=(new Date()).valueOf();
  newDiv.id='s_'+type+'_'+n+'';
  newDiv.className='sli';
  newDiv.innerHTML='\
<span class="sliin" style="width:65px;"><input type="text" id="bar_name_'+type+'_'+n+'" name="bar_name['+type+']['+n+']" size="4" /></span><span class="sliin" style="width:280px;"><input type="text" id="bar_url_'+type+'_'+n+'" name="bar_url['+type+']['+n+']" style="width:98%;" /></span>关键字<span class="sliin" style="width:30px;"><input type="text" id="bar_url_'+type+'_'+n+'_" name="bar_url_['+type+']['+n+']" style="width:98%;"<?php echo !file_exists('addfunds.php') ? ' onfocus="alert(\\\'这里商业版才能让填噢\\\');this.blur();"' : ''; ?> /></span> | <span class="sliin" style="width:95px;"><input type="hidden" id="bar_img_1_'+type+'_'+n+'" name="bar_img_1['+type+']['+n+']" /><img id="img_1_'+type+'_'+n+'" width="68" height="28" title="1_'+type+'_'+n+'.gif" /><a class=file_b onmouseover="addFile(this,1,\''+type+'\',\''+n+'\');">上传</a></span><span class="sliin" style="width:85px;"><input type="hidden" id="bar_img_2_'+type+'_'+n+'" name="bar_img_2['+type+']['+n+']" /><img id="img_2_'+type+'_'+n+'" width="16" height="16" title="2_'+type+'_'+n+'.gif" /><a class=file_b onmouseover="addFile(this,2,\''+type+'\',\''+n+'\');">上传</a></span>\
<a title="删除" href="javascript:void(0)" onclick="removeOption(this);return false;">╳</a> \
<a title="插入" href="javascript:void(0)" onclick="insertLink(this,\''+type+'\');return false;">↖</a> \
<a title="上移" href="javascript:void(0)" onclick="upLink(this);return false;">↑</a> \
<a title="上移" href="javascript:void(0)" onclick="downLink(this);return false;">↓</a>';
  par.insertBefore(newDiv,tar);
  $('bar_name_'+type+'_'+n+'').focus();
}


//插入
function insertColumn(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  var newDiv=document.createElement('DIV');
  type=(new Date()).valueOf();
  newDiv.id='s_'+type+'';
  newDiv.className='s_';
  newDiv.innerHTML='\
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table"><tr><td width="50"><input type="text" id="type_name_'+type+'" name="type_name['+type+']" size="2" /></td><td id="base_'+type+'">  </td></tr></table><button type="button" onClick="addLink(\''+type+'\');">新增引擎</button> | <button type="button" onclick="removeOption(this);">删除搜索类别</button><button type="button" onclick="insertColumn(this);">↖插入搜索类别</button><button type="button" onclick="upLink(this);">↑上移搜索类别</button><button type="button" onclick="downLink(this);">↓下移搜索类别</button></div>';
  par.insertBefore(newDiv,tar);
  $('type_name_'+type+'').focus();
}

//添加
function addColumn(){
  var par=$('area');
  var newDiv=document.createElement('DIV');
  type=(new Date()).valueOf();
  newDiv.id='s_'+type+'';
  newDiv.className='s_';
  newDiv.innerHTML='\
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table"><tr><td width="50"><input type="text" id="type_name_'+type+'" name="type_name['+type+']" size="2" /></td><td id="base_'+type+'">  </td></tr></table><button type="button" onClick="addLink(\''+type+'\');">新增引擎</button> | <button type="button" onclick="removeOption(this);">删除搜索类别</button><button type="button" onclick="insertColumn(this);">↖插入搜索类别</button><button type="button" onclick="upLink(this);">↑上移搜索类别</button><button type="button" onclick="downLink(this);">↓下移搜索类别</button></div>';
  par.insertBefore(newDiv,null);
  $('type_name_'+type+'').focus();
}

-->
</script>
<div class="note">提示：
  <ol>
    <li>必须保证填写正确！</li>
    <li>以下信息必须认真填写，尽量不要用特殊符号，如 \ : ; * ? ' &lt; &gt; | ，必免导致错误。</li>
    <li><span class="redword">申明：</span>本程式未对多音字进行校正，比如“音乐”可能会译成“yinle”，因为不影响运行，故未深入处理。</li>
  </ol>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table" style="margin-bottom:10px;">
  <tr>
    <th width="50">搜索<br />类别</th>
    <th width="65">引擎名</th>
    <th>引擎URL</th>
    <th width="95">引擎样式1图标<br />68px×28px</th>
    <th width="85">引擎样式2图标<br />16px×16px</th>
    <th width="70">操作</th>
  </tr>
</table>

<style type="text/css">
.file_o { width:24px; height:16px; position:absolute; z-index:4; overflow:hidden; background-color:#FFF; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0); -moz-opacity:0; -khtml-opacity:0; opacity:0; cursor:pointer; }
.file_b { }
</style>
<form id="mainform" action="?post=search" method="post" enctype="multipart/form-data" onsubmit="if($('subt').checked==true){this.target='_blank';}else{this.target='_self';}">
<input name="act" type="hidden" />
<input name="up" type="hidden" />
<input id="uploadimg" type="file" class="file_o" />
<div id="area">
<script type="text/javascript">
<!--

function chkSN(type,n){
  var st=$('type_name_'+type+'');
  if(st!=null && st.value.replace(/^\s+|\s+$/g,'')!=''){
  }else{
    alert('前面的搜索类别名不能空！因为上传图标将基于它命名');
    $('type_name_'+type+'').focus();
    return false;
  }
  var so=$('bar_name_'+type+'_'+n+'');
  if(so!=null && so.value.replace(/^\s+|\s+$/g,'')!=''){
  }else{
    alert('前面的引擎名不能空！因为上传图标将基于它命名');
    $('bar_name_'+type+'_'+n+'').focus();
    return false;
  }
  return true;
}

function chkUpPic(m,type,n){
  $('mainform').target='lastFrame';
  $('mainform').act.value='up';
  $('mainform').up.value=m+'_'+type+'_'+n;
  $('mainform').submit();
}

function addFile(obj,m,type,n){
  fileInput=document.getElementById("uploadimg");
  if(fileInput!=null){
    var w,h,l,t;
    l=obj.offsetLeft;
    t=obj.offsetTop;
    while(obj=obj.offsetParent){
      t+=obj.offsetTop;
      /*if(obj==document.body)break;*/
      l+=obj.offsetLeft;
    }
    fileInput.style.display="inline";
    fileInput.style.left=(l-3)+"px";
    fileInput.style.top=(t-3)+"px";
    fileInput.style.zIndex=99;
    fileInput.name='uploadfile_'+m+'_'+type+'_'+n+'';
    fileInput.onclick=function(){return chkSN(type,n);}
    fileInput.onchange=function(){chkUpPic(m,type,n);}
  }

}




if(isArray(searchSelect)){
  for(type in searchSelect){
    document.write('<div id="s_'+type+'" class="s_"><table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table"><tr><td width="50"><input type="text" id="type_name_'+type+'" name="type_name['+type+']" value="'+searchSelect[type][0].toString().replace(/搜/g,'')+'" size="2" title="关系到后面图标命名，如更改请重新上传图标" onmouseover="sSD(this,event);" /></td><td id="base_'+type+'">');
    if(isArray(searchSelect[type])){
      for(n in searchSelect[type]){
        if(n==0) continue;
        var keyUrl = searchSelect[type][n][0];
        var keyUrl_ = '';
        if (searchSelect[type][n][0].indexOf(' ') > 0) {
          keyUrlArr = searchSelect[type][n][0].split(' ');
          keyUrl = keyUrlArr[0];
          keyUrl_ = keyUrlArr[1];
        }
        document.write('<div id="s_'+type+'_'+n+'" class="sli"><span class="sliin" style="width:65px;"><input type="text" id="bar_name_'+type+'_'+n+'" name="bar_name['+type+']['+n+']" value="'+searchSelect[type][n][1]+'" size="4" title="关系到后面图标命名，如更改请重新上传图标" onmouseover="sSD(this,event);" /></span><span class="sliin" style="width:280px;"><input type="text" id="bar_url_'+type+'_'+n+'" name="bar_url['+type+']['+n+']" style="width:98%;" value="'+keyUrl+'" /></span>关键字<span class="sliin" style="width:30px;"><input type="text" id="bar_url_'+type+'_'+n+'_" name="bar_url_['+type+']['+n+']" style="width:98%;" value="'+keyUrl_+'"<?php echo !file_exists('addfunds.php') ? ' onfocus="alert(\\\'这里商业版才能让填噢\\\');this.blur();"' : ''; ?> /></span> | <span class="sliin" style="width:95px;"><input type="hidden" id="bar_img_1_'+type+'_'+n+'" name="bar_img_1['+type+']['+n+']" value="readonly/images/searchmark/1_'+type+'_'+n+'.gif" /><img id="img_1_'+type+'_'+n+'" src="writable/images/searchmark/1_'+type+'_'+n+'.gif" width="68" height="28" title="1_'+type+'_'+n+'.gif" /><a class="file_b" onmouseover="addFile(this,1,\''+type+'\',\''+n+'\');">更改</a></span><span class="sliin" style="width:85px;"><input type="hidden" id="bar_img_2_'+type+'_'+n+'" name="bar_img_2['+type+']['+n+']" value="readonly/images/searchmark/2_'+type+'_'+n+'.gif" /><img id="img_2_'+type+'_'+n+'" src="writable/images/searchmark/2_'+type+'_'+n+'.gif" width="16" height="16" title="2_'+type+'_'+n+'.gif" /><a class="file_b" onmouseover="addFile(this,2,\''+type+'\',\''+n+'\');">更改</a></span>\
<a title="删除" href="javascript:void(0)" onclick="removeOption(this);return false;">╳</a> \
<a title="插入" href="javascript:void(0)" onclick="insertLink(this,\''+type+'\');return false;">↖</a> \
<a title="上移" href="javascript:void(0)" onclick="upLink(this);return false;">↑</a> \
<a title="上移" href="javascript:void(0)" onclick="downLink(this);return false;">↓</a></div>');

      }
    }
    document.write('</td></tr></table><button type="button" onClick="addLink(\''+type+'\');">新增引擎</button> | <button type="button" onclick="removeOption(this);">删除搜索类别</button><button type="button" onclick="insertColumn(this);">↖插入搜索类别</button><button type="button" onclick="upLink(this);">↑上移搜索类别</button><button type="button" onclick="downLink(this);">↓下移搜索类别</button></div>');
  }
}





-->
</script>
</div>
<button type="button" onclick="addColumn();">添加搜索类别</button> <br />
<div class="red_err">特别提示：提交前请确定writable/js目录具备写权限，因为要将配置结果写入writable/js/search.js文件</div>
      <button type="submit" onclick="$('mainform').act.value='';" class="send2" style="border:none;">提交设置</button> <input type="checkbox" class="checkbox" id="subt" checked="checked" />在弹出的新页面提交，避免检查出填写错误而导致数据丧失，白写了</br />如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察
    </form>
