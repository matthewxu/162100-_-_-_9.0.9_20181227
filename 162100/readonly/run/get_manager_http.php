<?php
require ('authentication_manager.php');
?>
<style type="text/css">
<!--
#area { font-size:12px; }
.area_ { margin-bottom:10px; padding:5px; border:1px #CCCCCC solid; }
#ad_table  .class_td td { padding:0; }
.httpo { width:200px; /*height:30px;*/ display:inline-block !important; display:inline; zoom:1; vertical-align:middle; overflow:hidden; z-index:80; }

#pldr, #toulan, #add_iframe { width:100%; display:none;
 position:fixed !important; position:absolute; top:0; left:0; z-index:999; text-align:center; overflow:hidden;
}
#pldr_in, #toulan_in, #add_iframe_in { width:880px; background-color:#EFEFEF; padding:10px; text-align:left; }
.n_nav td { line-height:normal; background-color:#D8D8D8; font-size:12px; }
.n_img { width:60px; display:inline-block !important; display:inline; zoom:1; vertical-align:middle; overflow:hidden; cursor:pointer; }
a.caozuo { text-decoration:none; overflow:hidden; }
.zhua {padding:0; margin:0; width:16px; background-color:#4B981D; }
.tributary_code { width:23px; height:23px; display:inline-block !important; display:inline; zoom:1; vertical-align:middle; overflow:hidden; background-color:#FF6633; color:#FFFFFF; border:1px #009900 solid; text-align:center; }
-->
</style>
<style type="text/css">
.file_o { width:24px; height:16px; position:absolute; z-index:4; overflow:hidden; background-color:#FFFFFF; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0); -moz-opacity:0; -khtml-opacity:0; opacity:0; cursor:pointer; display:none; }
.file_b { }
</style>

<style>
.color_bar { font-size:12px; position:absolute; z-index:60; left:0; top:-12px; width:80px; background:#EEEEEE; border:#CCCCCC 1px solid; padding:4px; overflow:hidden; }
.color_button { border:none; width:12px; height:12px; font-size:10px; color:#FFFFFF; float:left; padding:0; margin:2px; cursor:pointer; overflow:hidden; }
</style>

<script language="javascript" type="text/javascript">
<!--
//添加链接
var addstep = 0;
function addLink(class_title,linkname,linkhttp){
  //var tar=document.getElementsByName('link['+class_title+']');
  var par=$('links_'+class_title+'');
  var newDiv=document.createElement('DIV');
  num=(new Date()).valueOf();
  if (linkname!='' && linkhttp!='') {
    num+=addstep;
    addstep++;
  }
  newDiv.id='link['+class_title+']';
  newDiv.title=num;
  newDiv.style.marginBottom='5px';
  newDiv.innerHTML='\
<input type="hidden" name="link['+class_title+']" title="'+num+'" />\
<span class="n_img"><span id="n_img['+class_title+']['+num+']"></span><a href="javascript:void(0)" onclick="inNimg(\'['+class_title+']['+num+']\')" title="插入链接形式图片">链</a> <a href="javascript:void(0)" class="file_b" onmouseover="addFile(this,\''+class_title+'\',\''+num+'\');">上传</a></span> \
<input type="hidden" name="linkimg['+class_title+']" id="linkimg['+class_title+']['+num+']" /> \
<input type="hidden" name="linkimgold['+class_title+']" id="linkimgold['+class_title+']['+num+']" /> \
<input type="text" id="linkname['+class_title+']['+num+']" name="linkname['+class_title+']" style="width:75px;" value="'+linkname+'" title="'+num+'" /> \
<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['+class_title+']['+num+']\');"> \
<input id="color['+class_title+']['+num+']" name="color['+class_title+']" type="hidden" /><img src="readonly/images/linkname_color.gif" /> \
</span> \
<span class="httpo" style="width:190px;"><input type="text" name="linkhttp['+class_title+']" id="linkhttp['+class_title+']['+num+']" size="25" value="'+linkhttp+'" onFocus="checkLength(this);" /></span> \
<span name="linktype['+class_title+']"><input name="linktype['+class_title+']" id="linktype_'+class_title+'_'+num+'" type="checkbox" class="checkbox" value="js" /></span><span class="httpo" style="width:26px;line-height:normal;"><?php echo $web['link_type'] != 1 ? '中转' : '直接'; ?><br />链接</span> \
<span class="httpo" style="width:160px;"><textarea rows="2" style="width:128px;" name="linkdescription['+class_title+']" id="linkdescription['+class_title+']['+num+']" onmouseover="showEH(this,event);"></textarea> <button class="zhua" id="zhua['+class_title+']['+num+']" title="尝试抓取该站点的简介（Meta Description）" onclick="checkHttp(this, \'['+class_title+']['+num+']\');">抓</button></span> <span class="httpo" style="width:100px;"><textarea rows="2" style="width:90px;" name="linktributary['+class_title+']" id="linktributary['+class_title+']['+num+']" onmouseover="showEH(this,event);"></textarea></span> \
<a class="caozuo" href="javascript:void(0);" title="删除" onclick="removeOption(this);return false;">╳</a> \
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="insertLink(this,\''+class_title+'\');return false;">↖</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upLink(this,\''+class_title+'\');return false;">↑</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downLink(this,\''+class_title+'\');return false;">↓</a>';
  par.insertBefore(newDiv,null);
}

//插入
function insertLink(obj,class_title){
  var tar=obj.parentNode;
  var par=$('links_'+class_title+'');
  var newDiv=document.createElement('DIV');
  num=(new Date()).valueOf();
  newDiv.id='link['+class_title+']';
  newDiv.title=num;
  newDiv.style.marginBottom='5px';
  newDiv.innerHTML='\
<input type="hidden" name="link['+class_title+']" title="'+num+'" />\
<span class="n_img"><span id="n_img['+class_title+']['+num+']"></span><a href="javascript:void(0)" onclick="inNimg(\'['+class_title+']['+num+']\')" title="插入链接形式图片">链</a> <a href="javascript:void(0)" class="file_b" onmouseover="addFile(this,\''+class_title+'\',\''+num+'\');">上传</a></span> \
<input type="hidden" name="linkimg['+class_title+']" id="linkimg['+class_title+']['+num+']" /> \
<input type="hidden" name="linkimgold['+class_title+']" id="linkimgold['+class_title+']['+num+']" /> \
<input type="text" id="linkname['+class_title+']['+num+']" name="linkname['+class_title+']" style="width:75px;" title="'+num+'" /> \
<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['+class_title+']['+num+']\');"> \
<input id="color['+class_title+']['+num+']" name="color['+class_title+']" type="hidden" /><img src="readonly/images/linkname_color.gif" /> \
</span> \
<span class="httpo" style="width:190px;"><input type="text" name="linkhttp['+class_title+']" id="linkhttp['+class_title+']['+num+']" size="25" onFocus="checkLength(this);" /></span> \
<span name="linktype['+class_title+']"><input name="linktype['+class_title+']" id="linktype_'+class_title+'_'+num+'" type="checkbox" class="checkbox" value="js" /></span><span class="httpo" style="width:26px;line-height:normal;"><?php echo $web['link_type'] != 1 ? '中转' : '直接'; ?><br />链接</span> \
<span class="httpo" style="width:160px;"><textarea rows="2" style="width:128px;" name="linkdescription['+class_title+']" id="linkdescription['+class_title+']['+num+']" onmouseover="showEH(this,event);"></textarea> <button class="zhua" id="zhua['+class_title+']['+num+']" title="尝试抓取该站点的简介（Meta Description）" onclick="checkHttp(this, \'['+class_title+']['+num+']\');">抓</button></span> <span class="httpo" style="width:100px;"><textarea rows="2" style="width:90px;" name="linktributary['+class_title+']" id="linktributary['+class_title+']['+num+']" onmouseover="showEH(this,event);"></textarea></span> \
<a class="caozuo" href="javascript:void(0);" title="删除" onclick="removeOption(this);return false;">╳</a> \
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="insertLink(this,\''+class_title+'\');return false;">↖</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upLink(this,\''+class_title+'\');return false;">↑</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downLink(this,\''+class_title+'\');return false;">↓</a>';
  par.insertBefore(newDiv,tar);
}

//排序：链接 向上
function upLink(obj,class_title){
  var tar=obj.parentNode;
  var par=$('links_'+class_title+'');
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
function downLink(obj,class_title){
  var tar=obj.parentNode;
  var par=$('links_'+class_title+'');
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


//添加栏目分类
function addColumn(){
  //var tar=document.getElementsByName('class[]');
  var par=$('area');
  var newDiv=document.createElement('DIV');
  //num=(new Date()).valueOf();
  var date=new Date();
  var num=date.getFullYear()+''+(date.getMonth()+1).toString().replace(/^(\d{1})$/,'0$1')+''+date.getDate().toString().replace(/^(\d{1})$/,'0$1')+''+date.getHours().toString().replace(/^(\d{1})$/,'0$1')+''+date.getMinutes().toString().replace(/^(\d{1})$/,'0$1')+'';
  num+=date.getSeconds().toString().replace(/^(\d{1})$/,'0$1');
  num+=date.getMilliseconds();

  newDiv.id='class[]';
  newDiv.title=num;
  newDiv.className='area_';
  newDiv.innerHTML='<input type="hidden" name="class[]" title="'+num+'" /> \
	<div style="margin-bottom:5px;"><b>栏目分类</b><input type="text" name="class_title['+num+']" id="class_title['+num+']" value="" size="8" /><input type="hidden" name="class_title_sub[]" value="'+num+'" /></div> \
    <?php echo empty($_GET['detail_title']) ? ' <div class="area_" align="right" style="background-color:#FFFFCC;" id="zt_obj">此栏目分类下的站内专题在该分类生成后起效</div><div style="margin-bottom:5px;margin-left:20px;">分类头栏(代码)<textarea id="class_priority[\'+num+\']" name="class_priority[\'+num+\']" rows="4" cols="60"></textarea> [<a href="javascript:void(0)" onclick="prevFLTL(\\\'class_priority[\'+num+\']\\\');return false;">预览</a>][<a href="javascript:void(0)" onclick="addIframe();return false;"><b>来一个iframe</b></a>]</div> 添加的网址以<input type="text" name="class_n[\'+num+\']" id="class_n[\'+num+\']" value="4" size="1" onblur="if(isNaN(this.value)||this.value<2||this.value>8){alert(\\\'请填2-8的整数，默认是4\\\');this.value=\\\'4\\\';}" title="填2-8的整数" />列显示链接，<b>分页控制</b><input type="text" name="class_more[\'+num+\']" id="class_more[\'+num+\']" value="" size="1" />条，以该数量分页显示；留空则显示全部 ' : ''; ?> <table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">\
  <tr>\
    <td width="175" align="center" colspan="3">链接名</td>\
    <td width="190" align="center" rowspan="2">网址</td>\
    <td width="45" align="center" rowspan="2">-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',1,1);return false;">全选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',1,0);return false;">反选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',0,0);return false;">不选</a></td>\
    <td width="160" align="center" rowspan="2">网站简介</td>\
<td width="100" align="center" rowspan="2" title="平行链接（如：百度 · 帖吧）或促销图片等" onmouseover="sSD(this,event);">子链接或代码</td>\
    <td align="center" rowspan="2">操作</td>\
  </tr>\
  <tr>\
    <td width="50" align="center">图片</td>\
    <td width="95" align="center">名称-纯图片可空</td>\
    <td width="30" align="center">套色</td>\
  </tr>\
</table><div id="links_'+num+'"></div> \
<button type="button" onClick="addLink(\''+num+'\',\'\',\'\');return false;">添加网址</button>\
<button type="button" onClick="addBatchLink(\''+num+'\');return false;">批量导入网址</button>\
<button type="button" onclick="removeOption(this);">删除此栏目分类</button>\
<button type="button" onclick="insertColumn(this);">↖插入栏目分类</button>\
<button type="button" onclick="upColumn(this);">↑上移栏目分类</button>\
<button type="button" onclick="downColumn(this);">↓下移栏目分类</button>\
<button class="zhua" style="width:auto;" id="zhua['+num+']" title="尝试抓取该分类站点的简介（Meta Description）" onclick="checkHttpAll(\''+num+'\');">批量抓简介</button>';
  par.insertBefore(newDiv,null);

  //num=num+1;
}

//插入栏目分类
function insertColumn(obj){
  var tar=obj.parentNode;
  var par=$('area');
  //var par=tar.parentNode;
  //num=(new Date()).valueOf();
  var date=new Date();
  var num=date.getFullYear()+''+(date.getMonth()+1).toString().replace(/^(\d{1})$/,'0$1')+''+date.getDate().toString().replace(/^(\d{1})$/,'0$1')+''+date.getHours().toString().replace(/^(\d{1})$/,'0$1')+''+date.getMinutes().toString().replace(/^(\d{1})$/,'0$1')+'';
  num+=date.getSeconds().toString().replace(/^(\d{1})$/,'0$1');
  num+=date.getMilliseconds();

  var newDiv=document.createElement('DIV');
  newDiv.id='class[]';
  newDiv.title=num;
  newDiv.className='area_';
  newDiv.innerHTML='<input type="hidden" name="class[]" title="'+num+'" /> \
	<div style="margin-bottom:5px;"><b>栏目分类</b><input type="text" name="class_title['+num+']" id="class_title['+num+']" value="" size="8" /><input type="hidden" name="class_title_sub[]" value="'+num+'" /></div> \
    <?php echo empty($_GET['detail_title']) ? ' <div class="area_" align="right" style="background-color:#FFFFCC;" id="zt_obj">此栏目分类下的站内专题在该分类生成后起效</div><div style="margin-bottom:5px;margin-left:20px;">分类头栏(代码)<textarea id="class_priority[\'+num+\']" name="class_priority[\'+num+\']" rows="4" cols="60"></textarea> [<a href="javascript:void(0)" onclick="prevFLTL(\\\'class_priority[\'+num+\']\\\');return false;">预览</a>][<a href="javascript:void(0)" onclick="addIframe();return false;"><b>来一个iframe</b></a>]</div> 添加的网址以<input type="text" name="class_n[\'+num+\']" id="class_n[\'+num+\']" value="4" size="1" onblur="if(isNaN(this.value)||this.value<2||this.value>8){alert(\\\'请填2-8的整数，默认是4\\\');this.value=\\\'4\\\';}" title="填2-8的整数" />列显示链接，<b>分页控制</b><input type="text" name="class_more[\'+num+\']" id="class_more[\'+num+\']" value="" size="1" />条，以该数量分页显示；留空则显示全部 ' : ''; ?> <table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">\
  <tr>\
    <td width="175" align="center" colspan="3">链接名</td>\
    <td width="190" align="center" rowspan="2">网址</td>\
    <td width="45" align="center" rowspan="2">-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',1,1);return false;">全选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',1,0);return false;">反选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['+num+']\',0,0);return false;">不选</a></td>\
    <td width="160" align="center" rowspan="2">网站简介</td>\
<td width="100" align="center" rowspan="2" title="平行链接（如：百度 · 帖吧）或促销图片等" onmouseover="sSD(this,event);">子链接或代码</td>\
    <td align="center" rowspan="2">操作</td>\
  </tr>\
  <tr>\
    <td width="50" align="center">图片</td>\
    <td width="95" align="center">名称-纯图片可空</td>\
    <td width="30" align="center">套色</td>\
  </tr>\
</table><div id="links_'+num+'"></div> \
<button type="button" onClick="addLink(\''+num+'\',\'\',\'\');return false;">添加网址</button>\
<button type="button" onClick="addBatchLink(\''+num+'\');return false;">批量导入网址</button>\
<button type="button" onclick="removeOption(this);">删除此栏目分类</button>\
<button type="button" onclick="insertColumn(this);">↖插入栏目分类</button>\
<button type="button" onclick="upColumn(this);">↑上移栏目分类</button>\
<button type="button" onclick="downColumn(this);">↓下移栏目分类</button>\
<button class="zhua" style="width:auto;" id="zhua['+num+']" title="尝试抓取该分类站点的简介（Meta Description）" onclick="checkHttpAll(\''+num+'\');">批量抓简介</button>';
  par.insertBefore(newDiv,tar);
}

//排序：栏目分类 向上
function upColumn(obj){
  var par=$('area');
  var tar=obj.parentNode;
  var prevObj=tar.previousSibling;
  while(prevObj!=null && prevObj.nodeType!=1){
    prevObj=prevObj.previousSibling;
  }
  if(prevObj==null || prevObj.id=='zt_obj' || prevObj.id=='tl_obj'){
    alert('已是最上级！');
    return;
  }else{
    try{par.insertBefore(tar,prevObj);}catch(err){alert('向上移动失败！请稍候再试');return;}
    //par.removeChild(tar);
  }
}

//排序：栏目分类 向下
function downColumn(obj){
  var par=$('area');
  var tar=obj.parentNode;
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

//删除
function removeOption(obj){
  if(obj.innerHTML=='╳'){
    var v='链接';
  }else{
    var v='栏目分类';
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

function addClass2(typeO,objID){
  var reg=new RegExp(typeO.title, 'ig');
  var lname=$('linkname'+objID);
  var cname=$('color'+objID);
  if(lname.value.replace(/^\s+|\s+$/ig,'')==''){
    alert('这是空的！不必加样式');
    if(typeO.title=='bold' || typeO.title=='underline'){
      typeO.checked=false;
    }
    return false;
  }
  if(lname==null || cname==null){
    alert('参数缺失！请刷新页面重试');
  }
  cname.value=cname.value.replace(reg,'');
  if(typeO.title=='恢复默认'){
    cname.value='';
  }else{
    if(typeO.title=='bold' || typeO.title=='underline'){
      if(typeO.checked==true){
        cname.value+=' '+typeO.title+'';
      }
    }else{
      var colorBarArr = {"redword": "红色", "orangeword": "桔色", "greenword": "绿色", "blueword": "蓝色", "grayword": "灰色"};
      for (var i in colorBarArr) {
        if($(i+'_'+objID)!=null){
          var reg2=new RegExp(i, 'ig');
          cname.value=cname.value.replace(reg2,'');
          $(i+'_'+objID).innerHTML='';
        }
      }
      typeO.innerHTML='√';
      cname.value+=' '+typeO.title+'';
    }
  }
  cname.value=cname.value.replace(/\s+/ig,' ').replace(/^\s+|\s+$/ig,'');
  lname.className=cname.value;
}

function addClass(o,objID){
  var obj=$('color'+objID);
  o.style.position='relative';
  if($('color_bar_'+objID+'')){
    $('color_bar_'+objID+'').style.display="block"
  }else{
    o.innerHTML+= '<div id="color_bar_'+objID+'" class="color_bar">\
<div style="border-bottom:1px #999999 dotted; overflow:hidden; clear:both;">\
<button id="redword_'+objID+'" title="redword" style="background:#CC3333;" class="color_button" onclick="addClass2(this,\''+objID+'\');" type="button">'+(obj.value.indexOf('redword')>=0 ? '√' : '')+'</button>\
<button id="orangeword_'+objID+'" title="orangeword" style="background:#FF9900;" class="color_button" onclick="addClass2(this,\''+objID+'\');" type="button">'+(obj.value.indexOf('orangeword')>=0 ? '√' : '')+'</button>\
<button id="greenword_'+objID+'" title="greenword" style="background:#60A041;" class="color_button" onclick="addClass2(this,\''+objID+'\');" type="button">'+(obj.value.indexOf('greenword')>=0 ? '√' : '')+'</button>\
<button id="blueword_'+objID+'" title="blueword" style="background:#83B8DB;" class="color_button" onclick="addClass2(this,\''+objID+'\');" type="button">'+(obj.value.indexOf('blueword')>=0 ? '√' : '')+'</button>\
<button id="grayword_'+objID+'" title="grayword" style="background:#999999;" class="color_button" onclick="addClass2(this,\''+objID+'\');" type="button">'+(obj.value.indexOf('grayword')>=0 ? '√' : '')+'</button>\
</div>\
<B title="字加粗"><input id="bold_'+objID+'" title="bold" type="checkbox" class="checkbox" onclick="addClass2(this,\''+objID+'\');"'+(obj.value.indexOf('bold')>=0 ? ' checked="checked"' : '')+' />B</B>\
<U title="字加下划线"><input id="underline_'+objID+'" title="underline" type="checkbox" class="checkbox" onclick="addClass2(this,\''+objID+'\');"'+(obj.value.indexOf('underline')>=0 ? ' checked="checked"' : '')+' />U</U>\
 | <a id="default_'+objID+'" title="恢复默认" href="javascript:void(0)" onclick="addClass2(this,\''+objID+'\');return false;">还原</a>\
</div>\
';
  }
  $('color_bar_'+objID+'').onmouseover=function(){
    addClass(o,objID);
  }
  $('color_bar_'+objID+'').onmouseout=function(){
    o.style.position='';
    $('color_bar_'+objID+'').style.display="none"
  }
}

function addBatchLink(class_title){
  addSubmitSafe();

  $('pldr_v').style.display='none';

  par=$('pldr');
  par.style.display='block';

  var parShowH=document.documentElement.clientHeight; //屏幕高
  var thisH=par.offsetHeight;
  thisH=thisH>parShowH?parShowH:thisH;

  var ie6=!-[1,]&&!window.XMLHttpRequest;

  if(ie6){
    var t=(Math.max(document.body.scrollTop,document.documentElement.scrollTop)+(parShowH-thisH)/2);
  }else{
    var t=(parShowH-thisH)/2;
  }
  par.style.marginTop=t+'px';
 
  $('pldr_title').innerHTML=decodeURIComponent(class_title);


  $('pldr_2').disabled=false;
  $('pldr_2').innerHTML='开始导入';
}




function chkPldr(theForm){
  var pv=theForm.pldr_url.value.replace(/^[\s\r\n]+|[\s\r\n]+$/,'');
  if(pv=='' || pv=='http://'){
    alert('URL不能空！');
    return false;
  }
  return true;
}

function shaixuan(){
  var pc=$('pldr_code');
  var m=pc.value.match(/<a .+?<\/a>/ig);
  var tt='';
  if(m && m.length>0){
    for(var i=0; i<m.length; i++){
      tt+=m[i].replace(/<a [^>]*href=[\"\']?([^\"\'\>\s]+)[\"\']?[^>]*>(.+?)<\/a>/ig,"<a href=\"$1\">$2</a>")+"\n";
    }
  }else{
    alert('没有链接被筛选！');
    return;
  }
  pc.value=tt;
}

function guolv(){
  $('pldr_guolv').innerHTML='过滤中…';
  $('pldr_guolv').disabled=true;
  var pc=$('pldr_code');
  var m=pc.value.match(/<a .+?<\/a>/ig);
  if(m && m.length>0){
    var g = document.getElementsByName('p_pldr_fr[]');
    var t = document.getElementsByName('p_pldr_to[]');
    if (g != null && g.length > 0) {
      for (var i = 0; i < g.length; i++){
        if (g[i] != null && g[i] != undefined && g[i].value != '') {
          g[i].value = g[i].value.replace(/^\s+|\s+$/g, '');
          g[i].value = g[i].value.replace(/^\/+/, '/').replace(/\/+([a-zA-Z]*)$/, '/$1');
          var r = g[i].value.match(/^\/(.+)\/([a-zA-Z]*)$/);
          if (!r) {
            alert('过滤正则[第'+(i+1)+'个]有误！');
            continue;
          }
          var reg = new RegExp(r[1], r[2]);
          try { pc.value = pc.value.replace(reg, t[i].value); } catch (err) {alert(err.message);}
        }

      }
    }
  } else {
    alert('没有链接！');
  }
  $('pldr_guolv').innerHTML='过滤链接';
  $('pldr_guolv').disabled=false;
}

function jiema(){
  $('pldr_jiema').innerHTML='解码中…';
  $('pldr_jiema').disabled=true;
  var text='';
  var pc=$('pldr_code');
  var m=pc.value.match(/<a .+?<\/a>/ig);
  if(m && m.length>0){
    for(var i=0; i<m.length; i++){
      text+=decodeURIComponent(m[i])+"\n";
    }
    pc.value=text;
  } else {
    alert('没有链接！');
  }
  $('pldr_jiema').innerHTML='解码链接';
  $('pldr_jiema').disabled=false;
}

function daoru(){
  $('pldr_2').innerHTML='导入中…';
  $('pldr_2').disabled=true;

  var pc=$('pldr_code');
  var m=pc.value.match(/<a .+?<\/a>/ig);
  if(m && m.length>0){
    var class_title=encodeURIComponent($('pldr_title').innerHTML);
    var tar=document.getElementsByName('link['+class_title+']');
    var end=tar.length;
    num=(end>0) ? parseInt(tar[end-1].title) : 0;
    location.href='#linkname['+class_title+']['+num+']';

    for(var i=0; i<m.length; i++){
      var l=null;
      if(l=m[i].match(/<a [^>]*href=[\"\']?([^\"\'\>\s]+)[\"\']?[^>]*>(.+?)<\/a>/i)){
        l[1]=l[1].replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\"/g,"&quot;").replace(/\'/g,"&#039;");
        l[2]=l[2].replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\"/g,"&quot;").replace(/\'/g,"&#039;");
        addLink(class_title,l[2],l[1]);
      }
    }
    $('pldr_v').style.display='inline';

    //escPldr();
    setTimeout("escPldr();",2000);

  }else{
    alert('没有链接被导入！');
  }
  $('pldr_2').disabled=false;
  $('pldr_2').innerHTML='开始导入';


}

function escPldr(){
  $('pldr').style.display='none';
  $('pldr_v').style.display='none';
  delSubmitSafe();
}

function allChoose2(o, v1, v2) {
  var a = document.getElementsByName(o);
    for (var i = 0; i < a.length; i++){
      if (a[i].checked == false) a[i].checked = v1;
      else a[i].checked = v2;
  }
}

function getFirstChild(obj) { 
var result = obj.firstChild; 
while (!result.tagName) { 
result = result.nextSibling; 
} 
return result; 
} 

function prevFLTL(obj){
  addSubmitSafe();
  if($(obj)==null){
    alert('参数出错！');
    escFLTL();
    return false;
  }
  if($(obj).value.replace(/^[\s\r\n]+|[\s\r\n]+$/,'')==''){
    alert('没有内容！');
    escFLTL();
    return false;
  }

  var w = $('toulan_code').contentWindow;
  w.document.open();
  w.document.writeln('<ht'+''+'ml><he'+''+'ad></he'+''+'ad><bo'+''+'dy style="background-color:#FFFFFF">');
  w.document.writeln($(obj).value);
  w.document.writeln('</bo'+''+'dy></ht'+''+'ml>');
  w.document.close();

  par=$('toulan');
  par.style.display='block';

  var parShowH=document.documentElement.clientHeight; //屏幕高
  var thisH=par.offsetHeight;
  var t=0;
  if(thisH>parShowH){
    $('toulan_in').style.height=parShowH+'px';
    $('toulan_in').style.overflow='auto';
  }else{
    var ie6=!-[1,]&&!window.XMLHttpRequest;
    if(ie6){
      var t=(Math.max(document.body.scrollTop,document.documentElement.scrollTop)+(parShowH-thisH)/2);
    }else{
      var t=(parShowH-thisH)/2;
    }
    par.style.marginTop=t+'px';
  }


}

function escFLTL(){
  par=$('toulan');
  par.style.display='none';
  par.style.marginTop='auto';
  $('toulan_in').style.height='auto';
  $('toulan_in').style.overflow='auto';
  $('toulan_code').contentWindow.document.body.innerHTML='';
  delSubmitSafe();
}
function addPChange(o){
  var par=$(o);
  var newDiv=document.createElement('DIV');
  newDiv.innerHTML='<input type="text" name="'+o+'_fr[]" size="40" /> To <input type="text" name="'+o+'_to[]" size="40" />';
  par.insertBefore(newDiv,null);

}

function addIframe(){

  addSubmitSafe();

  par=$('add_iframe');
  par.style.display='block';

  var parShowH=document.documentElement.clientHeight; //屏幕高
  var thisH=par.offsetHeight;
  thisH=thisH>parShowH?parShowH:thisH;

  var ie6=!-[1,]&&!window.XMLHttpRequest;

  if(ie6){
    var t=(Math.max(document.body.scrollTop,document.documentElement.scrollTop)+(parShowH-thisH)/2);
  }else{
    var t=(parShowH-thisH)/2;
  }
  par.style.marginTop=t+'px';

}

function getIframeCode(){
  var text='';
  var iUrl=$('add_iframe_url').value;
  if(iUrl==''){
    alert('src地址不能空！');
    return;
  }
  var iH=$('add_iframe_height').value;
  if(iH=='' || isNaN(iH)){
    alert('高度请填大于0的整数！');
    return;
  }
  var iO='o'+new Date().getTime();
  var sw=$('add_iframe_b').value;
  sw=Number(sw);


  text+='&lt;iframe id="'+iO+'" name="'+iO+'" frameborder="0" marginwidth="0" marginheight="0" width="100%" height="'+(iH-sw)+'" scrolling="'+($('add_iframe_scroll').checked==true?'yes':'no')+'" src="'+iUrl+'" style="margin-top:'+$('add_iframe_t').value+'px; margin-left:'+$('add_iframe_l').value+'px;"&gt;&lt;/iframe&gt;';
/*
  if($('zsy').checked==true){
    text+='&lt;iframe src="ih.php?iframe_id='+encodeURIComponent(iO)+'&url='+encodeURIComponent(iUrl)+'&sw='+sw+'" style="display:none;"&gt;&lt;/iframe&gt;';
  }
*/
  $('add_iframe_code').innerHTML=text;
  $('add_iframe_code').style.display='';

}

function allHttps(){
  addSubmitSafe();
  form = $('all_links');
  form.innerHTML='';
  if ($('priority')!=null) {
    bornInput(form, 'priority', $('priority').value, 'textarea'); //栏目头栏
  }
  var a = document.getElementsByName('class_title_sub[]');
  for (var i = 0; i < a.length; i++) {
    var class_title = a[i].value;
    if ($('class_title['+class_title+']')!=null) {
      bornInput(form, 'class_title['+class_title+']', $('class_title['+class_title+']').value, 'input'); //分类名称
    }
    if ($('class_priority['+class_title+']')!=null) {
      bornInput(form, 'class_priority['+class_title+']', $('class_priority['+class_title+']').value, 'textarea'); //分类头栏
    }
    if ($('class_n['+class_title+']')!=null) {
      bornInput(form, 'class_n['+class_title+']', $('class_n['+class_title+']').value, 'input');
    }
    if ($('class_more['+class_title+']')!=null) {
      bornInput(form, 'class_more['+class_title+']', $('class_more['+class_title+']').value, 'input');
    }
    var httpV = '';
    var b = document.getElementsByName('linkname['+class_title+']');
	
    for (var j = 0; j < b.length; j++){
	  var t = b[j].title;
	  if ($('linkimg['+class_title+']['+t+']') != null) {
        var v = trim($('linkimg['+class_title+']['+t+']').value+' '+filterInput(b[j].value));
//$('try').innerHTML+=j+'|'+t+'|'+$("linkhttp["+class_title+"]["+t+"]").value+'|'+b[j].value+'<br>';
        if (v != '') {
          httpV += ""+filterInput($("linkhttp["+class_title+"]["+t+"]").value).replace(/^(https?:\/\/[^\/]+)\/?$/, '$1/')+"|"+v+"|"+getColor(class_title, t)+"|"+getJs(class_title, t)+"|"+filterInput3($("linkdescription["+class_title+"]["+t+"]").value)+"|"+filterInput3($("linktributary["+class_title+"]["+t+"]").value)+"\n";
        }
	  }
    }
    bornInput(form, 'http_name_style['+class_title+']', httpV, 'textarea');
  }
  //$('try').innerHTML=form.innerHTML.replace(/</g, '&lt;').replace(/>/g, '&gt;');
  if($('subt').checked==true){$('mainform').target='_blank';}else{$('mainform').target='_self';} 
  $('mainform').submit();
  delSubmitSafe();
}

function getColor(class_title, num){
  var o = $('color['+class_title+']['+num+']');
  if (o!=null) {
    return o.value;
  }
  return '';
}

function getJs(class_title, num){
  var o=$('linktype_'+class_title+'_'+num+'');
  if (o!=null) {
    if(o.checked==true){
      return o.value;
    }
  }
  return '';
}


function trim(text){
  return text.replace(/^\s+|\s+$/g, '');
}

function bornInput(form, inputName, inputValue, inputType){
  var newInput=document.createElement(''+inputType+'');
  newInput.name=inputName;
  newInput.value=inputValue;
  newInput.style.display='none';
  form.insertBefore(newInput, null);
}

function filterInput(text){
  text = trim(text).replace(/<br[^>]*>/ig, '[br]');
  text = text.replace(/[\r\n\'\"\<\>\\]/g, '').replace(/\|/g, '&#124;');
  return text.replace(/\[br\]/ig, '<br>');
}
function filterInput2(text){
  text = trim(text);
  if (text != '') {
	text = text.replace(/\|/g, '&#124;');
	text = text.replace(/\"/g, '&quot;');
	text = text.replace(/\'/g, '&#039;');
	text = text.replace(/\</g, '&lt;');
	text = text.replace(/\>/g, '&gt;');
  }
  return text;
  //return trim(text).replace(/[\'\"\<\>\\]/g, '').replace(/[\n\r]/g, '<br />').replace(/\|/g, '&#124;');
}
function filterInput3(text){
  return text.replace(/[\n\r]/g, '').replace(/\|/g, '&#124;');
}


function checkHttp(o, id){
  o.innerHTML='<img src=readonly/images/loading3.gif />';
  if(!$('linkhttp'+id).value.match(/^https?:\/\/.+/i)){
    alert('请填写准确的网址先！');
    o.innerHTML='抓';
    return false;
  }else{
    window.open('?post=http&act=zhua&http='+encodeURIComponent($('linkhttp'+id).value)+'&id='+encodeURIComponent(id)+'', 'lastFrame');
    return true;
  }
}
function checkHttpAll(id){
  addSubmitSafe();
  var text = '';
  var a = document.getElementsByName('linkhttp['+id+']');
  for (var i = 0; i < a.length; i++){
    if (a[i].value != '') {
      text += '<input type="text" name="_linkhttp[]" value="'+(a[i].id.replace(/^.+(\[\d+\])$/,'$1'))+'|'+a[i].value+'" />';
    }
  }
  if (text != '') {
    if ($('form_temp') == null) {
      var f=document.createElement("form");
      f.action="?post=http";
      f.method="post";
      f.style.display='none';
      f.innerHTML=text;
      f.innerHTML+='<input type="hidden" name="id" value="'+id+'" />';
      f.innerHTML+='<input type="hidden" name="act" value="zhua_all" />';
      f.innerHTML+='<input type="submit" />';
      document.body.appendChild(f);
      f.target="lastFrame";
      f.submit();
    }
  } else {
    alert('没有有效的网址！');
    delSubmitSafe();
    return false;
  }
}
function showEH(o, e){
  o.title = '此项以代码填写，比如插入图片（或其它HTML标签），必须填写准确，系统将不进行安全过滤。';
  sSD(o, e);
}
-->
</script>

<div id="add_iframe">
  <div id="add_iframe_in"><div align="center"><b>来一个iframe</b><a href="javascript:void(0)" onclick="$('add_iframe').style.display='none';delSubmitSafe();" style="float:right">关闭</a></div>
src地址：<input type="text" size="80" name="add_iframe_url" id="add_iframe_url" /><br />
高度：<input type="text" size="3" name="add_iframe_height" id="add_iframe_height" onblur="isDigit(this,'100',0);" />px <!--a href="javascript:void(0)" onclick="var iUrl=$('add_iframe_url').value;if(iUrl==''){alert('src地址不能空！');return false;}$('lastFrame').src='ih.php?act=yuce&url='+encodeURIComponent(iUrl)+'&iframe_id=1'; $('add_iframe_code').innerHTML='高度检测中...请等候'; $('add_iframe_code').style.display='';">预测一下高度</a> <input type="checkbox" class="checkbox" name="zsy" id="zsy" />以后高度自适应<br /--> 
上边距：<input type="text" size="3" name="add_iframe_t" id="add_iframe_t" onblur="if(isNaN(this.value)){alert('请填数字！');this.value=0;}" />px （负数为藏头）
左边距：<input type="text" size="3" name="add_iframe_l" id="add_iframe_l" onblur="if(isNaN(this.value)){alert('请填数字！');this.value=0;}" />px （负数为藏左） | 
缩尾：<input type="text" size="3" name="add_iframe_b" id="add_iframe_b" onblur="isDigit(this,'0',1);" />px <input type="checkbox" name="add_iframe_scroll" id="add_iframe_scroll" value="1" />含滚动条
<div id="add_iframe_code" style="background-color:#FFFFFF; padding:5px; margin:5px; border:1px #EEE solid; display:none;"></div>
<center><button type="button" onclick="getIframeCode();">填完了，获取iframe代码</button></center>
  </div>
</div>






<div id="pldr">
<?php
if (!@file_exists('readonly/run/post_manager_pldr.php')) {
  $no_pldr1 = ' disabled="disabled"';
  $no_pldr2 = '<b class="redword">（此版本未开放此功能，请<a href="for_s.php" onclick="addSubmitSafe();$(\'addCFrame\').style.display=\'block\';" target="addCFrame" class="a_block b_block">联系官方</a>购买）</b>';
}
?>
  <div id="pldr_in"><p><a style="float:right;" href="javascript:void(0);" onClick="escPldr();">关闭</a><center><b>批量导入[<span id="pldr_title"></span>]网址</b></center></p>
    <form action="?post=pldr" method="post" target="lastFrame" onSubmit="return chkPldr(this);">
      <p><b>第1步：直接输入URL，抓取网页代码/采集链接</b>（提示：如果你已手动获取了网页代码，可直接进行第2步）——<br>
          <input type="text" name="pldr_url" id="pldr_url" size="60" value="http://"<?php echo $no_pldr1; ?> />
          <button type="submit" id="pldr_1"<?php echo $no_pldr1; ?>>抓取代码</button><?php echo $no_pldr2; ?>
      </p>
    </form>
    <p><b>第2步：抓取或手动粘贴代码于下框中</b>（提示：代码中含&lt;a href=XXX&gt;XXX&lt;/a&gt;才有用）——<br>
        <label>
        <textarea name="pldr_code" id="pldr_code" style="width:99%; height:180px;"></textarea>
        </label>
    </p>
    <p>
      <button type="button" onClick="shaixuan();">筛选链接</button> | <button type="button" onClick="$('pldr_code').value='';$('pldr_v').style.display='none';">清空</button>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="p_pldr_tb">
  <tr>
    <td>过滤链接：<a href="javascript:void(0)" onclick="addPChange('p_pldr');return false;">添加规则</a></td>
    <td id="p_pldr">例1：<span class="greenword">/&lt;a[\s\r\n]+href=&quot;\/j\.php\?url=(.+)&amp;.+&quot;/ig</span> To <span class="greenword">&lt;a href="$1"</span><br>
例2：<span class="greenword">/^.*(123)\.php\?a=([^&amp;]+).*$/ig</span> To <span class="greenword">$1/$2</span><div><input type="text" name="p_pldr_fr[]" size="40" /> To <input type="text" name="p_pldr_to[]" size="40" /></div><div><input type="text" name="p_pldr_fr[]" size="40" /> To <input type="text" name="p_pldr_to[]" size="40" /></div></td>
    <td><button type="button" id="pldr_guolv" onClick="guolv();">过滤链接</button><br />
<button type="button" id="pldr_jiema" onClick="jiema();">解码链接</button></td>
  </tr>
</table>
     <button type="button" id="pldr_2" class="send2" onClick="daoru();">开始导入</button>
       <b id="pldr_v" class="redword">导入成功！</b>
    </p>
  </div>
</div>
<div id="toulan"><div id="toulan_in"><a style="float:right;" href="javascript:void(0);" onClick="escFLTL();">关闭</a><center><b>预览</b></center><br><iframe id="toulan_code" name="toulan_code" allowtransparency="true" width="100%" height="480" frameborder="0" marginwidth="0" marginheight="0"></iframe></div></div>

<?php

@ require ('writable/set/set_area.php');

$title = '<a href="?get=http" class="list_title_in">管理网址</a>';
$__text = $_text = $text_ = $text = $chan_obj = '';
$text_p = $row_ = array();





function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  return $text;
}

function get_m($id, $class_title = '', $http_name_style = '', $class_priority = '', $class_n = 4, $class_more = '', $step = 0) {
  global $web, $dis, $dis2, $ngai, $text_p;
  $text = '';
  $tp = urlencode($class_title);

  $end = 0;

  $more_obj = '，<b>分页控制</b><input type="text" name="class_more['.$tp.']" id="class_more['.$tp.']" value="'.((!empty($class_more) && is_numeric($class_more)) ? $class_more : '').'" size="1" />条，以该数量分页显示；留空则显示全部';

  $class_n = !empty($class_n) && is_numeric($class_n) && $class_n >= 2 && $class_n <= 8 ? $class_n : 4;

  $text = '
<div id="class[]" class="area_" title="'.$step.'"><input type="hidden" name="class[]" title="'.$step.'" />
  <div style="margin-bottom:5px"><b>栏目分类</b><input type="text" name="class_title['.$tp.']" id="class_title['.$tp.']" value="'.htmlspecialchars($class_title).'" size="8" />

<input type="hidden" name="class_title_sub[]" value="'.$tp.'" />

'.$ngai.'</div>
  '.(empty($_GET['detail_title']) ? '<div class="area_" align="right" style="background-color:#FFFFCC;" id="zt_obj">此栏目分类下的站内专题应用管理：'.((is_array($text_p[$tp]) && count($text_p[$tp]) > 0) ? @implode('', $text_p[$tp]) : '无').' | 创建一个新专题应用：<input type="text" size="5" id="new_p_'.$step.'" /><button type="button" onclick="location.href=\'?get=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.$tp.'&detail_title=\'+encodeURIComponent($(\'new_p_'.$step.'\').value.replace(/\//g,\'-\'))+\'\';">提交</button></div><div style="margin-bottom:5px;margin-left:20px;">分类头栏(代码)<textarea name="class_priority['.$tp.']" id="class_priority['.$tp.']" rows="4" cols="60">'.htmlspecialchars($class_priority).'</textarea> [<a href="javascript:void(0)" onclick="prevFLTL(\'class_priority['.$tp.']\');return false;">预览</a>][<a href="javascript:void(0)" onclick="addIframe();return false;"><b>来一个iframe</b></a>]</div>添加的网址以<input type="text" name="class_n['.$tp.']" id="class_n['.$tp.']" value="'.$class_n.'" size="1" onblur="if(isNaN(this.value)||this.value<2||this.value>8){alert(\'请填2-8的整数，默认是4\');this.value=\'4\';}" title="填2-8的整数" />列显示链接'.$more_obj.'' : '').'
  ';
  //if ($http_name_style = trim($http_name_style)) {
    $http_name_style = trim($http_name_style);
    $http_name_style = preg_replace("/[\r\n]+/", "\n", $http_name_style);
    $text .= '<table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">
  <tr>
    <td width="175" align="center" colspan="3">链接名</td>
    <td width="190" align="center" rowspan="2">网址</td>
    <td width="45" align="center" rowspan="2">-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['.$tp.']\',1,1);return false;">全选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['.$tp.']\',1,0);return false;">反选</a><br />-<a href="javascript:void(0)" onclick="allChoose2(\'linktype['.$tp.']\',0,0);return false;">不选</a></td>
    <td width="160" align="center" rowspan="2">网站简介</td>
<td width="100" align="center" rowspan="2" title="平行链接（如：百度 · 帖吧）或促销图片等" onmouseover="sSD(this,event);">子链接或代码</td>
    <td align="center" rowspan="2">操作</td>
  </tr>
  <tr>
    <td width="50" align="center">图片</td>
    <td width="95" align="center">名称-纯图片可空</td>
    <td width="30" align="center">套色</td>
  </tr>
</table>
';
    $text .= '<div id="links_'.$tp.'">';
	$alllinkarr = explode("\n", $http_name_style);
	$alllinkarr = array_filter($alllinkarr);
    $alllinkarr_n = count($alllinkarr);
	$end = $alllinkarr_n > $end ? $alllinkarr_n : $end;
    for ($key = 0; $key < $end; $key++) {
      $h = explode("|", trim($alllinkarr[$key]));
      if (preg_match('/<img [^>]*src\s*=\s*[\"\']?([^\"\'\s\<\>]+)[\"\']?[^>]*>/i', $h[1], $m_img)) {
        $n_img = $m_img[0];
        $h[1] = preg_replace('/<img [^>]+>/i', '', $h[1]);
      }
      $h[1] = preg_replace('/<br[^>]*>/i', '[br]', $h[1]);
      $h[1] = htmlspecialchars($h[1]);
      $h[1] = preg_replace('/\[br\]/i', '<br>', $h[1]);

	  $text .= '
<div id="link['.$tp.']" style="margin-bottom:5px;color:#969696;" title="'.$key.'">
<input type="hidden" name="link['.$tp.']" title="'.$key.'" />

<span class="n_img"><span id="n_img['.$tp.']['.$key.']">'.(!empty($n_img)?preg_replace('/\/?\>/', 'onmouseover="showBig(this);" />', $n_img).'<br /><a href="javascript:void(0)" onclick="delFile(\'['.$tp.']['.$key.']\');" title="删除图片">×</a>':'').'</span>
<a href="javascript:void(0)" onclick="inNimg(\'['.$tp.']['.$key.']\')" title="插入链接形式图片">链</a>
<a href="javascript:void(0)" class="file_b" onmouseover="addFile(this,\''.$tp.'\',\''.$key.'\');">上传</a>
</span>
<input type="hidden" name="linkimg['.$tp.']" id="linkimg['.$tp.']['.$key.']" value="'.htmlspecialchars($n_img).'" />
<input type="hidden" name="linkimgold['.$tp.']" id="linkimgold['.$tp.']['.$key.']" value="'.$m_img[1].'" />

<input type="text" id="linkname['.$tp.']['.$key.']" name="linkname['.$tp.']" class="'.$h[2].'" style="width:75px;" value="'.$h[1].'" title="'.$key.'" />


<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['.$tp.']['.$key.']\');">
<input id="color['.$tp.']['.$key.']" name="color['.$tp.']" type="hidden" value="'.$h[2].'" /><img src="readonly/images/linkname_color.gif" />
</span>

<span class="httpo" style="width:190px;"><input type="text" name="linkhttp['.$tp.']" id="linkhttp['.$tp.']['.$key.']" style="width:180px;" onFocus="checkLength(this);}, 100);" value="'.($h[0]).'" /></span>

<span name="linktype['.$tp.']"><input name="linktype['.$tp.']" id="linktype_'.$tp.'_'.$key.'" type="checkbox" class="checkbox" value="js"'.($h[3]=='js'?' checked="checked"':'').' /></span><span class="httpo" style="width:26px;line-height:normal;">'.($web['link_type'] != 1 ? '中转' : '直接').'<br />链接</span>
<span class="httpo" style="width:160px;"><textarea rows="2" style="width:128px;" name="linkdescription['.$tp.']" id="linkdescription['.$tp.']['.$key.']" onmouseover="showEH(this,event);">'.($h[4]).'</textarea>
<button class="zhua" id="zhua['.$tp.']['.$key.']" title="尝试抓取该站点的简介（Meta Description）" onclick="checkHttp(this, \'['.$tp.']['.$key.']\');">抓</button></span>
<span class="httpo" style="width:100px;"><textarea rows="2" style="width:90px;" name="linktributary['.$tp.']" id="linktributary['.$tp.']['.$key.']" onmouseover="showEH(this,event);">'.htmlspecialchars($h[5]).'</textarea></span>



<a class="caozuo" href="javascript:void(0);" title="删除" onclick="'.$dis.'removeOption(this);return false;">╳</a>
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="'.$dis.'insertLink(this,\''.$tp.'\');return false;">↖</a>
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upLink(this,\''.$tp.'\');return false;">↑</a>
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downLink(this,\''.$tp.'\');return false;">↓</a>
<a class="caozuo" href="site.php?site_id='.$id.'_'.($key+1).'" title="预览该站点简介" target="_blank">&raquo;</a>

</div>';
      //$text .= ($key + 1) % $class_n == 0 ? '<hr />' : '';
      unset($m_img, $n_img, $n_name);
    }
    $text .= '</div>';
    $text .= '<button type="button" onClick="'.$dis.'addLink(\''.$tp.'\',\'\',\'\');return false;">添加网址</button>';
    $text .= '<button type="button" onClick="'.$dis.'addBatchLink(\''.$tp.'\');return false;">批量导入网址</button>';
    $text .= '<button type="button" onclick="'.$dis2.'removeOption(this);">删除此栏目分类</button> <button type="button" onclick="'.$dis2.'insertColumn(this);">↖插入栏目分类</button>';
    $text .= '<button type="button" onclick="upColumn(this);">↑上移栏目分类</button><button type="button" onclick="downColumn(this);">↓下移栏目分类</button>';
    $text .= '<button class="zhua" style="width:auto;" id="zhua['.$tp.']" title="尝试抓取该分类站点的简介（Meta Description）" onclick="checkHttpAll(\''.$tp.'\');">批量抓简介</button>';
    $text .= '</div>';
  //}
  return $text;
}


function get_caiji($str) {
  $text = $p_time_ = $p_time0 = $p_time1 = '';
  $cj_style = $str ? '' : ' display:none;';
  //if ($str) {
    //$str = preg_replace("/[\r\n]+/", "\n", $str);
    list($p_time_stamp, $p_time, $p_url, $p_b, $p_e, $p_b_is, $p_e_is, $p_change_rule, $priority_pos_key, $urlencode) = @explode("\n", $str);
    if ($p_time == '' || !is_numeric($p_time)) {
      $p_time_ = ' checked="checked"';
    } else {
      if ($p_time > 0) {
        $p_time1 = ' checked="checked"';
        $p_time_val = abs($p_time);
        $p_time_key = '';
      } else {
        $p_time0 = ' checked="checked"';
        $p_time_val = '';
        $p_time_key = abs($p_time);
      }
    }
  //}
  $text .= '
<div class="area_" style="background-color:#FFFFCC;margin-top:-11px;'.$cj_style.'" id="caiji_area">
<b>'.($str ? '<span class="redword">当前</span><button type="button" onclick="$(\'priority\').value=$(\'p_url\').value=\'\';$(\'caiji_area\').style.display=\'none\';">取消当前采集</button>' : '').'以采集方式操纵栏目头栏：</b>注：本程序为智能采集，即用户端浏览过程中自动按时效采集、更新、保存最新数据<br>
<b class="redword">重要提示！此处各项要么不填，要么必须仔细填好！否则影响程序运行。</b><br>

系统记录的用户端触发采集时间点：'.((isset($p_time_stamp) && is_numeric($p_time_stamp)) ? gmdate('Y/m/d H:i:s', $p_time_stamp).' <a href="class.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'" target="_blank">刷新数据（时效戳）</a>' : '无').'<br>
采集刷新时效：<input type="radio" name="p_time" id="p_time_" value="" onclick="$(\'p_time_key\').value=$(\'p_time_val\').value=\'\';"'.$p_time_.'>采集完成后，永不必刷新

<input type="radio" name="p_time" id="p_time0" value="0" onclick="$(\'p_time_val\').value=\'\';"'.$p_time0.'>以天，每天<input type="text" name="p_time_key" id="p_time_key" size="5" value="'.$p_time_key.'" onclick="$(\'p_time_\').checked=$(\'p_time1\').checked=false;$(\'p_time0\').checked=true;" onblur="isDigit(this,\''.$p_time_key.'\',1);">时

<input type="radio" name="p_time" id="p_time1" value="1" onclick="$(\'p_time_key\').value=\'\';"'.$p_time1.'>以<input type="text" name="p_time_val" id="p_time_val" size="5" value="'.$p_time_val.'" onclick="$(\'p_time_\').checked=$(\'p_time0\').checked=false;$(\'p_time1\').checked=true;" onblur="isDigit(this,\''.$p_time_val.'\',0);">分钟间隔<br>


采集源URL：<input type="text" name="p_url" id="p_url" size="60" value="'.htmlspecialchars($p_url).'"> <span class="redword">*</span><br>
采集前唯一标记：<textarea name="p_b" rows="2" cols="40">'.htmlspecialchars($p_b).'</textarea> 输出时（<input type="checkbox" name="p_b_is" value="1"'.($p_b_is==1?' checked="checked"':'').' />不）含此标记代码<br>
采集后唯一标记：<textarea name="p_e" rows="2" cols="40">'.htmlspecialchars($p_e).'</textarea> 输出时（<input type="checkbox" name="p_e_is" value="1"'.($p_e_is==1?' checked="checked"':'').' />不）含此标记代码<br>
对采集到的数据的替换、过滤规则（一定要注意过滤的顺序，对结果是有关系的）： <button type="button" onclick="addPChange(\'p_change\')">增加</button><br>
  <div id="p_change">';

    if ($p_change_rule = trim($p_change_rule)) {
      $p_change_arr = @explode("{162100~mark2}", $p_change_rule);
      $p_change_arr = array_unique(array_filter($p_change_arr));
      if (is_array($p_change_arr) && count($p_change_arr) > 0) {
        foreach ($p_change_arr as $p_c_val) {
          list($p_fr, $p_to) = @explode("{162100~mark1}", $p_c_val);
          if ($p_fr = trim($p_fr)) {
            $text .= '
    <div><input type="text" name="p_change_fr[]" size="60" value="'.htmlspecialchars($p_fr).'" /> To <input type="text" name="p_change_to[]" size="40" value="'.htmlspecialchars($p_to).'" /></div>';
          }
        }
      }
      $d_rl = '';
    } else {
      $d_rl = '<div><input type="text" name="p_change_fr[]" size="60" value="/&lt;\/?(\!DOCTYPE|head|title|meta|body|html)[^&gt;]*&gt;/isU" /> To <input type="text" name="p_change_to[]" size="40" value="" /></div>';
    }

  $text .= '
    '.$d_rl.'
    <div><input type="text" name="p_change_fr[]" size="60" /> To <input type="text" name="p_change_to[]" size="40" /></div>
  </div>
注1：请书写标准的PHP正则！否则程序将自动跳出、放弃执行。<br>
注2：<input type="checkbox" class="checkbox" name="URLdecode" value="1"'.(isset($urlencode) && $urlencode==1?' checked="checked"':'').' />过滤时自动对链接URLdecode解码。<br>
例1：<span class="greenword">/&lt;a[\s\r\n]+href=&quot;\/j\.php\?url=(.+)&amp;.+&quot;/isU</span> To <span class="greenword">&lt;a href="\1"</span><br>
例2：<span class="greenword">/^.*(123)\.php\?a=([^&amp;]+).*$/i</span> To <span class="greenword">$1/$2</span>
<br />
<input type="checkbox" name="priority_pos" value="1"'.(!empty($priority_pos_key) ? ' checked="checked"' : '').' />采集内容置于网页下部
</div>

';
  return $text;
}











if ($_GET['column_id'] == 'homepage' || $_GET['column_id'] == 'mingz') {
  //$dis2 = 'if($(\'class[]\')!=null){alert(\'该栏目可能特殊，数量被限定！\');return false;}';
  //$ngai = '隶属首页版面，名称尽量别改！避免出错。';
}
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {

  //if (array_key_exists($_GET['column_id'], $web['area']) && array_key_exists($_GET['class_id'], $web['area'][$_GET['column_id']])) {
  if (isset($web['area'][$_GET['column_id']]) && isset($web['area'][$_GET['column_id']][$_GET['class_id']])) {

    if (!empty($_GET['detail_title'])) {
      $title .= ' &gt; <a href="?get=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'">'.$web['area'][$_GET['column_id']][$_GET['class_id']][0].'</a> &gt; 专题应用：'.(str_replace('/', '-', filter(htmlspecialchars($_GET['detail_title']))));
      $e1 = ' AND detail_title LIKE "'.$_GET['detail_title'].'|%"';
      $d_side = '"<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#FF6600\"><tr><td bgcolor=\"#FFFFCC\"><input type=\"radio\" name=\"dside_\" value=\"l\"".($dside_ == "l" ? " checked=\"checked\"" : "")." />左侧<br /><input type=\"radio\" name=\"dside_\" value=\"r\"".($dside_ == "r" ? " checked=\"checked\"" : "")." />右侧</td><td bgcolor=\"#FFFFCC\"><input id=\"dside_1\" type=\"radio\" name=\"dside\" value=\"1\"".($dside == 1 ? " checked=\"checked\"" : "")." onclick=\"$(\'dside___\').disabled=false;\" />设侧边栏，一级显示（同级栏目所属专题应用列表）<br /><input type=\"radio\" name=\"dside\" value=\"2\"".($dside == 2 ? " checked=\"checked\"" : "")." onclick=\"$(\'dside__\').checked=false;$(\'dside___\').disabled=false;\" />设侧边栏，二级显示（上级全部栏目列表）<br /><input id=\"dside_2\" type=\"radio\" name=\"dside\" value=\"3\"".($dside == 3 ? " checked=\"checked\"" : "")." onclick=\"$(\'dside___\').disabled=false;\" />设侧边栏，三级显示（上级全部栏目列表及所属专题应用列表）<br /><input type=\"radio\" name=\"dside\" value=\"\"".(!(is_numeric($dside) && $dside >=1 && $dside <= 3) ? " checked=\"checked\"" : "")." onclick=\"$(\'dside__\').checked=false;$(\'dside___\').disabled=\'disabled\';\" />不设侧边栏</td><td bgcolor=\"#FFFFCC\"><input type=\"checkbox\" id=\"dside__\" name=\"dside__\" value=\"1\" onclick=\"if($(\'dside_1\').checked!=true && $(\'dside_2\').checked!=true){alert(\'前面选择的模式不支持此项！\');return false;}\"".(abs($dside__) >= 1 ? " checked=\"checked\"" : "")." /> 图片类型列表<br />
<input id=\"dside__n\" name=\"dside__n\" type=\"text\" value=\"".(abs($dside__) >= 1 ? abs($dside__) : 2)."\" onblur=\"if(this.value!=\'\'&&!isNaN(this.value)){if(Math.abs(this.value)<1){this.value=1;}else if(Math.abs(this.value)>4){this.value=4;}}else{alert(\'请填1~4的整数值！\');this.value=2;}\" size=\"1\" />列显示图片</td><td bgcolor=\"#FFFFCC\">侧栏宽<input id=\"dside___\" name=\"dside___\" type=\"text\" value=\"".(abs($dside___) < 120 ? 120 : (abs($dside___) > 380 ? 380 : abs($dside___)))."\" onblur=\"if(this.value!=\'\'&&!isNaN(this.value)){if(Math.abs(this.value)<120){this.value=120;}else if(Math.abs(this.value)>380){this.value=380;}}else{alert(\'请填120px~380px的整数值！\');this.value=\'\';}\" size=\"2\" />px<br />120px~380px</td></tr></table>"';
      $chan_obj = '<input type="checkbox" name="detail_list" value="1" checked="checked" onclick="if(this.checked!=true){$(\'detail_logo_\').style.display=\'none\';}else{$(\'detail_logo_\').style.display=\'inline\';}" /><span id="detail_logo_">如专题应用需要上传图标，可点此上传图片，图片名将自动命名为该专题应用的拼音，路径将自动命名为上级频道和栏目ID：<input name="uploadfile" type="file" class="file"> <input type="checkbox" name="detail_logo" value="1" checked="checked" />回车显示 <input type="checkbox" name="detail_logo_old" value="1" checked="checked" />如果未选择新图标的情况下，上级列表中老图标若存在，则直接用老图标</span><br /><span id="'.$_GET['column_id'].'_'.$_GET['class_id'].'_'.urlencode($_GET['class_title']).'_'.urlencode($_GET['detail_title']).'"><a href="javascript:void(0);" onclick="chanto(this,\'column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($_GET['class_title']).'&detail_title='.urlencode($_GET['detail_title']).'\');return false;">转移此专题应用︾</a></span> | 创建一个新专题应用：<input type="text" size="5" id="new_p" /><button type="button" onclick="location.href=\'?get=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($_GET['class_title']).'&detail_title=\'+encodeURIComponent($(\'new_p\').value.replace(/\//g,\'-\'))+\'\';">提交</button>';

    } else {
      $title .= ' &gt; '.$web['area'][$_GET['column_id']][$_GET['class_id']][0].'';
      $e1 = '';
      $d_side = '';
      $chan_obj = '调整栏目分类名称的过程中，可能会造成有些专题应用失去母分类，如果有，勾选此选项<input type="checkbox" name="detail_keep" value="1" onclick="if(this.checked==true){$(\'im_obj\').style.display=\'inline\';}else{$(\'im_obj\').style.display=\'none\';}" checked="checked" />予以保留，否则删除它们';
    }


    $text .= '<div id="area">';
    $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'"'.$e1.' ORDER BY id');
    //if ($result != false) {
      $step = 0;
      while ($row = db_fetch($db, $result)) {
        //if (is_array($row) && count($row) > 0) {
          $class_title_ = $row['class_title'];
          list($row['class_title'], $row['class_n'], $row['class_more']) = @explode("|", $class_title_);
          $tp = urlencode($row['class_title']);
          if ($row['detail_title'] != '') {
            if ($row['http_name_style'] == '' && $row['class_priority'] <> '') {
              list($row['detail_title'], $row['dpy'], $ds) = @explode('|', $row["detail_title"]);
              list($dside, $dside_, $dside__, $dside___) = @explode('-', $ds);
            } else {
              list($row['detail_title'], , ) = @explode('|', $row["detail_title"]);
            }
	        $text_p[$tp][urlencode($row['detail_title'])] = '<span id="'.$_GET['column_id'].'_'.$_GET['class_id'].'_'.urlencode($row['class_title']).'_'.urlencode($row['detail_title']).'"><a href="webmaster_central.php?get=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($row['class_title']).'&detail_title='.urlencode($row['detail_title']).'">'.$row['detail_title'].'</a> <a href="javascript:void(0);" onclick="chanto(this,\'column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($row['class_title']).'&detail_title='.urlencode($row['detail_title']).'\');return false;" title="转移此专题应用">︾</a></span> ';
            if (empty($_GET['detail_title'])) {
              continue;
            }
          }
          if (!empty($_GET['detail_title'])) {
            $priority_link = '<div class="note" style="background-color:#FFFF00;">链接到此专题应用的网址：<br />动态（<a href="detail.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($_GET['detail_title']).'" target="_blank">detail.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($_GET['detail_title']).'</a>）<br />静态（<a href="'.$row['dpy'].'.html" target="_blank">'.$row['dpy'].'.html</a> 前提是一键生成了全静态）</div>';

          } else {
            $priority_link = '<div class="note" style="background-color:#FFFF00;">对此栏目进行预览：<br />动态（<a href="class.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'" target="_blank">class.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'）</a>）<br />静态（<a href="'.$web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html" target="_blank">'.$web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html</a> 前提是一键生成了全静态）</div>';
          }

          $__text_caiji = $row['class_grab'];
          if (!strstr($class_title_, '|') && $row['http_name_style'] == '') { // && trim($row['class_priority']) != ''这是头栏
          //if (strstr($class_title_, '栏目头栏') && $row['http_name_style'] == '') { // && trim($row['class_priority']) != ''这是头栏
            $__text = $row['class_priority'];
            continue;
          } else {
            $row_[$tp] = $row;
            if ($row['class_title'] == '栏目置顶') {
	          $_text .= get_m($row['id'], $row_[$tp]["class_title"], $row_[$tp]["http_name_style"], $row_[$tp]["class_priority"], $row_[$tp]["class_n"], $row_[$tp]["class_more"]);
              continue;
            } else {
	          $step++;
	          $text_ .= get_m($row['id'], $row_[$tp]["class_title"], $row_[$tp]["http_name_style"], $row_[$tp]["class_priority"], $row_[$tp]["class_n"], $row_[$tp]["class_more"], $step);
            }
          }
        //}
        unset($row, $tp);
      }

      unset($row_);

      $text .= '<form id="mainform" action="?post=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($_GET['class_title']).'&detail_title='.urlencode($_GET['detail_title']).'" method="post" enctype="multipart/form-data">
<div class="area_" id="zt_obj" style="background-color:#FFFFCC;">';


      if (!empty($_GET['detail_title'])) {
        $text .= '<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#FF6600"><tr><td bgcolor="#FFFFCC"><input type="radio" name="dside_" value="l"'.($dside_ == 'l' ? ' checked="checked"' : '').' />左侧<br /><input type="radio" name="dside_" value="r"'.($dside_ == 'r' ? ' checked="checked"' : '').' />右侧</td><td bgcolor="#FFFFCC"><input id="dside_1" type="radio" name="dside" value="1"'.($dside == 1 ? ' checked="checked"' : '').' onclick="$(\'dside___\').disabled=false;" />设侧边栏，一级显示（同级栏目所属专题应用列表）<br /><input type="radio" name="dside" value="2"'.($dside == 2 ? ' checked="checked"' : '').' onclick="$(\'dside__\').checked=false;$(\'dside___\').disabled=false;" />设侧边栏，二级显示（上级全部栏目列表）<br /><input id="dside_2" type="radio" name="dside" value="3"'.($dside == 3 ? ' checked="checked"' : '').' onclick="$(\'dside___\').disabled=false;" />设侧边栏，三级显示（上级全部栏目列表及所属专题应用列表）<br /><input type="radio" name="dside" value=""'.(!(is_numeric($dside) && $dside >=1 && $dside <= 3) ? ' checked="checked"' : '').' onclick="$(\'dside__\').checked=false;$(\'dside___\').disabled=\'disabled\';" />不设侧边栏</td><td bgcolor="#FFFFCC"><input type="checkbox" id="dside__" name="dside__" value="1" onclick="if($(\'dside_1\').checked!=true && $(\'dside_2\').checked!=true){alert(\'前面选择的模式不支持此项！\');return false;}"'.(abs($dside__) >= 1 ? ' checked="checked"' : '').' /> 图片类型列表<br />
<input id="dside__n" name="dside__n" type="text" value="'.(abs($dside__) >= 1 ? abs($dside__) : 2).'" onblur="if(this.value!=\'\'&&!isNaN(this.value)){if(Math.abs(this.value)<1){this.value=1;}else if(Math.abs(this.value)>4){this.value=4;}}else{alert(\'请填1~4的整数值！\');this.value=2;}" size="1" />列显示图片</td><td bgcolor="#FFFFCC">侧栏宽<input id="dside___" name="dside___" type="text" value="'.(abs($dside___) < 120 ? 120 : (abs($dside___) > 380 ? 380 : abs($dside___))).'" onblur="if(this.value!=\'\'&&!isNaN(this.value)){if(Math.abs(this.value)<120){this.value=120;}else if(Math.abs(this.value)>380){this.value=380;}}else{alert(\'请填120px~380px的整数值！\');this.value=\'\';}" size="2" />px<br />120px~380px</td></tr></table>';

      }


      $text .= $chan_obj.'<span id="im_obj"><br />对于调整栏目分类时产生的无用的图片，勾选此选项<input type="checkbox" name="img_keep" value="1" checked="checked" />予以保留，否则删除它们</span></div>

<div class="area_" style="background-color:#FFFFCC;" id="caijilock">注：下面栏目头栏可直接填写代码或采集代码[<a href="javascript:void(0)" onclick="if(this.innerHTML==\'关闭采集\'){$(\'caiji_area\').style.display=\'none\';this.innerHTML=\'启用采集\';}else{$(\'caiji_area\').style.display=\'block\';this.innerHTML=\'关闭采集\';location=\'#caijilock\';}">使用采集</a>]</div>
<input id="uploadimg" type="file" class="file_o" />
<input name="act" type="hidden" />
<input name="up" type="hidden" />
'.get_caiji($__text_caiji).'
<div id="all_links" style="display:none"></div>
</form>';


      $text .= '<div class="area_" id="tl_obj"><b>栏目头栏</b>(代码)<textarea name="priority" id="priority" rows="4" cols="60">'.htmlspecialchars($__text).'</textarea> [<a href="javascript:void(0)" onclick="prevFLTL(\'priority\');return false;">预览</a>][<a href="javascript:void(0)" onclick="$(\'priority\').value=$(\'priority\').innerHTML=\'\';return false;">清空</a>][<a href="javascript:void(0)" onclick="addIframe();return false;"><b>来一个iframe</b></a>]
</div>';



      $text .= $_text.$text_;

      unset($__text_caiji, $__text, $_text, $text_, $text_p);
    //}
    $result = NULL;
//************************************
    $text .= '</div>';
    $text .= '<button type="button" onClick="'.$dis2.'addColumn();" class="send1" style="border:none;">添加栏目分类</button>';

  } else {
    $title .= ' &gt; 所有分类';
    $detail = array();
    $text .= '
    <table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
    <th width="20%">频道</th>
    <th width="80%"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th width="100">栏目</th><th>专题应用</th></tr></table></th>
    </tr>
';

    foreach ((array)$web['area'] as $column_id => $column) {
      $column = (array)$column;
      $class_w = (string)$column_id === 'homepage' || (string)(string)$column_id === 'mingz' ? ' class="redword"' : '';

      $text .= '
      <tr valign="top">
      <td width="20%"'.$class_w.'>'.$column['name'][0].'</td>
      <td width="80%">';
      unset($column['name']);
      $text .= '';
      foreach ($column as $class_id => $class) {
        $text .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="class_td"><tr valign="top"><td width="100"><a href="?get=http&column_id='.$column_id.'&class_id='.$class_id.'">'.$column[$class_id][0].'</a></td><td>';
        $result = db_query($db, 'SELECT class_title,detail_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND detail_title<>"" AND http_name_style="" GROUP BY detail_title'); // AND class_priority<>""
        if ($result != false) {
          while ($row = db_fetch($db, $result)) {
            list($class_title, , ) = @explode('|', $row['class_title']);
            $ct = urlencode($class_title);
            $row['detail_title'] = preg_replace('/([^\|]+)\|.*$/', '$1', $row['detail_title']);
            $detail[$ct] .= '<a href="?get=http&column_id='.$column_id.'&class_id='.$class_id.'&class_title='.urlencode($class_title).'&detail_title='.urlencode($row['detail_title']).'">'.$row['detail_title'].'</a> ';
            unset($row, $class_title, $ct);
          }
//print_r($detail);
          foreach ((array)$detail as $dk => $dv) {
            $text .= '<b class="grayword">'.urldecode($dk).'：</b>'.$dv.'<br />';
          }
          unset($detail, $dk, $dv);
        } else {
          $text .= '<span class="grayword">此栏目未增专题应用</span>';
        }
        $text .= '</td></tr></table>';
        $result = NULL;
        unset($class_id, $class);
      }
      unset($column_id, $column);
      $text .= '</td>
      </tr>';
    }
    $text .= '
      </table>';
  }


} else {
  $err .= $sql['db_err'];
}

db_close($db);

?>
<h5 class="list_title"><?php echo $title; ?></h5><?php echo $priority_link; ?>
<div class="note">提示：
  <ol>
    <li>链接请以代码书写，必须注意书写规范，否则系统将自动过滤掉。</li>
    <li>修改分类或栏目名请到“栏目分类管理”。</li>
    <li>当前系统设置：<span class="redword"><?php echo $web['link_type'] != 1 ? '直接' : '中转'; ?>链接</span>。</li>
    <li><b>栏目头栏</b>？就是在栏目页面上部额外显示的内容（代码）。不加就留空。</li>
    <li><b>分类头栏</b>？就是在栏目分类上部额外显示的内容（代码）。不加就留空。</li>
    <li>链接名可以直接加入图片代码（图片代码，如&lt;img src=&quot;...&quot; /&gt; ），或手动链接或上传。</li>
    <li><b>若上传图片后，务必进行提交入库，以免产生垃圾（图片）文件。</b></li>
    <li>专题应用名不要含特殊符号。</li>
    <li>关于删除<?php echo !empty($_GET['detail_title']) ? '专题' : '栏目'; ?>数据——清空所有数据后提交即可达到删除。</li>
  </ol>
</div>

<iframe id="lastFrame" name="lastFrame" style="display:none;"></iframe>

  <?php echo $text, $err; ?>
<div id="try"></div>
<button type="button" onclick="if(document.getElementsByName('class[]').length==0 && $('priority').value==''){if(confirm('您已清空的栏目分类，此举将执行删除动作，点确定继续，否则点取消')){allHttps();}}else{allHttps();}" class="send2" style="border:none;">提交</button> <input type="checkbox" class="checkbox" id="subt" checked="checked" />在弹出的新页面提交，避免检查出填写错误而导致数据丧失，白写了</br />如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察
<form id="chanto" style="background-color:#FFFFCC;border:1px #FF6600 solid;padding:2px;display:none;" method="post" target="lastFrame"><select id="sitecolumn" name="sitecolumn" onchange="showClass(this.options[this.selectedIndex].value)">
                    <option value="no">选择频道</option>
                  </select>
                  <select id="siteclass" name="siteclass" onchange="showTitle(this.options[this.selectedIndex].value)">
                    <option>选择栏目</option>
                </select>
                  <select id="sitetitle" name="sitetitle">
                    <option>选择分类</option>
                </select> <button type="submit">提交</button> <a href="javascript:void(0);" onclick="$('chanto').style.display='none';return false;">取消</a> </form>

<script language="javascript" type="text/javascript">
<!--

function inNimg(obj){
  if(ml=prompt('请输入图片路径：','')){
    ml=ml.replace(/\"\'\<\>\s\\/,'');
    if(!ml.match(/^http(s)?\:\/\//i)){
      alert('网址格式不对！请以http://或https://开头');
      return false;
    }
    $('n_img'+obj).innerHTML='<img src="'+ml+'" onmouseover="showBig(this);" /><br /><a href="javascript:void(0)" onclick="delFile(\''+obj+'\');">×</a>';
    $('linkimg'+obj).value='<img src="'+ml+'" />';
    //delFile(obj);
  }
}

function addFile(obj,type,n){
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
    fileInput.name='uploadfile_'+type+'_'+n+'';
    fileInput.onclick=function(){return true;}
    fileInput.onchange=function(){
      addSubmitSafe();
      $('mainform').target='lastFrame';
      $('mainform').act.value='up';
      $('mainform').up.value=type+'_'+n;
      $('mainform').submit();
    }
  }
}

function delFile(obj){
  $('lastFrame').src='?post=http&act=del&id='+encodeURIComponent(obj)+'&imgurl='+encodeURIComponent($('linkimgold'+obj+'').value)+'';
  //$('n_img'+obj).innerHTML='';
  //$('linkimg'+obj).value='';
}


function showBig(obj){
  var w=obj.offsetWidth;
  if(w>60){
    obj.parentNode.style.overflow='visible';
    obj.parentNode.parentNode.style.overflow='visible';
    obj.onmouseout=function(){
      this.parentNode.style.overflow='hidden';
      this.parentNode.parentNode.style.overflow='hidden';
    }
  }
}

function checkLength(obj){
  var iCount=obj.value.replace(/[^\u0000-\u00ff]/g,"aa").length;
  var oldSize=obj.size;
  var newObj=obj;
  if(iCount>oldSize){
    newObj.parentNode.style.overflow='visible';
    newObj.parentNode.style.position='relative';
    newObj.parentNode.style.height='30px';
    while(obj=obj.offsetParent){
      obj.parentNode.style.overflow='visible';
    }
    newObj.size=iCount;
    newObj.style.position='absolute';
    newObj.style.left=0;
    newObj.style.top=0;
    newObj.style.zTndex=81;
    newObj.onblur=function(){
      this.parentNode.style.overflow='hidden';
      this.size=oldSize;
    }
  }
}
-->
</script>

<script language="javascript" type="text/javascript">
<!--

var cities=new Array();
<?php
unset($web['area']['homepage']);
$text_c = '';
if (count($web['area']) > 0) {
  foreach ((array)$web['area'] as $column_id => $column) {
    $column = (array)$column;
    $text_c .= '
cities["'.$column_id.'"]=new Array();
';
    foreach ($column as $class_id => $class) {
    $text_c .= '
cities["'.$column_id.'"]["'.$class_id.'"]="'.$class[0].'";';
    }
  }
}
echo $text_c; unset($text_c);
?>

if (typeof isArray != 'function') {
  var isArray = function(o) {   return Object.prototype.toString.call(o) === '[object Array]';  }
}

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
  id=parseFloat(id);
  var classObj=$('siteclass');
  if(classObj!=null && isArray(cities[id])){
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
  showTitle(id+'_0');
}

function showTitle(id){
  if($('sitecolumn').value!='no'){
    $('lastFrame').src='member.php?post=write_newsite&act='+id+'';
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

function chanto(obj,fr){
  starImg=$("chanto");
  if(starImg!=null){
    var l,t;
    l=obj.offsetLeft;
    t=obj.offsetTop;
    while(obj=obj.offsetParent){
      t+=obj.offsetTop;
      /*if(obj==document.body)break;*/
      l+=obj.offsetLeft;
    }
    starImg.style.display="inline";
    starImg.style.position="absolute";
    starImg.style.left=(l)+"px";
    starImg.style.top=(t-7)+"px";
    starImg.style.zIndex=99;
    starImg.style.cursor="pointer";

    starImg.action='?post=chanto&'+fr+'';
    //starImg.onmouseout=function(){this.style.display="none";}
  }
}


-->
</script>
















