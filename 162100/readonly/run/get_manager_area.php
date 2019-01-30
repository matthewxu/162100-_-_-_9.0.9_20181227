<?php
require ('authentication_manager.php');
?>
<style type="text/css">
<!--
.newcolumn { width:100%; /*float:left;*/ margin-left:0; clear:both; }
.newclass { margin:0; padding:0; clear:both; overflow:hidden; }
.block_span { font-size:12px; vertical-align:top; display:inline-block !important; display:inline; zoom:1; text-align:center; }
.n_nav td { line-height:normal; background-color:#D8D8D8; font-size:12px; }
a.caozuo { text-decoration:none; }

-->
</style>
<script type="text/javascript">
<!--
//添加链接
function addClass(class_title){
  //class_title=parseInt(class_title);
  //var tar=obj.parentNode;
  var par=$('class_'+class_title+'');
  var num=(new Date()).valueOf();
  var newDiv=document.createElement('DIV');
  newDiv.id='class_'+class_title+'_'+num+'';
  newDiv.className='newclass';
  newDiv.title=num;
  newDiv.innerHTML=' <input type="hidden" name="class['+class_title+']" title="'+num+'" />\
  <span class="block_span" style="width:88px;"><input type="text" name="class_name['+class_title+']['+num+']" style="width:55px;" /></span> <span class="block_span" style="width:60px;"><input type="checkbox" class="checkbox" name="class_bj['+class_title+']['+num+']" value="1" />加背景</span> <span class="block_span" style="width:280px;"><input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="0" checked="checked" />站名排列 <input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="1" />弹窗简介 <input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="2" />流布局详细显示\
</span> \
<a class="caozuo" href="javascript:void(0)" onclick="removeOption(this);return false;" title="删除">╳</a> \
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="insertClass(this,\''+class_title+'\');return false;">↖</a>\
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upClass(this,\''+class_title+'\');return false;">↑</a>\
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downClass(this,\''+class_title+'\');return false;">↓</a>\
';
  par.insertBefore(newDiv, null);
  num=num+1;
}

//插入
function insertClass(obj,class_title){
  var tar=obj.parentNode;
  var par=$('class_'+class_title+'');
  var num=(new Date()).valueOf();
  var newDiv=document.createElement('DIV');
  newDiv.id='class_'+class_title+'_'+num+'';
  newDiv.className='newclass';
  newDiv.title=num;
  newDiv.innerHTML=' <input type="hidden" name="class['+class_title+']" title="'+num+'" />\
  <span class="block_span" style="width:88px;"><input type="text" name="class_name['+class_title+']['+num+']" style="width:55px;" /></span> <span class="block_span" style="width:60px;"><input type="checkbox" class="checkbox" name="class_bj['+class_title+']['+num+']" value="1" />加背景</span> <span class="block_span" style="width:280px;"><input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="0" checked="checked" />站名排列 <input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="1" />弹窗简介 <input type="radio" class="radio" name="class_http_type['+class_title+']['+num+']" value="2" />流布局详细显示\
</span> \
<a class="caozuo" href="javascript:void(0)" onclick="removeOption(this);return false;" title="删除">╳</a> \
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="insertClass(this,\''+class_title+'\');return false;">↖</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upClass(this,\''+class_title+'\');return false;">↑</a> \
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downClass(this,\''+class_title+'\');return false;">↓</a> \
';
  par.insertBefore(newDiv,tar);
}

//排序：链接 向上
function upClass(obj,class_title){
  var tar=obj.parentNode;
  var par=$('class_'+class_title+'');
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
function downClass(obj,class_title){
  var tar=obj.parentNode;
  var par=$('class_'+class_title+'');
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















//添加频道
function addColumn(cid){
  var par=$('area'+cid);


  var date=new Date();
  var num1=date.getFullYear()+''+(date.getMonth()+1).toString().replace(/^(\d{1})$/,'0$1')+''+date.getDate().toString().replace(/^(\d{1})$/,'0$1')+''+date.getHours().toString().replace(/^(\d{1})$/,'0$1')+''+date.getMinutes().toString().replace(/^(\d{1})$/,'0$1')+'';
  var num2=date.getSeconds().toString().replace(/^(\d{1})$/,'0$1');
  if($('class_'+num1+num2+'')==null){
    num=num1+num2;
  }else{
    num=num1+((parseInt(num2)+1).toString().replace(/^(\d{1})$/,'0$1'));
  }
  
  if (cid != '') {
    num = cid;
  }
/*
  var tar=document.getElementsByName("column[]");
  var end=tar.length;
  num=(end>0) ? parseInt(tar[end-3].title)+1 : 0;
*/


  var newDiv=document.createElement('DIV');
  newDiv.id='column_'+num+'';
  newDiv.style.marginBottom='7px';
  newDiv.title=num;
  newDiv.innerHTML='<input type="hidden" name="column[]" title="'+num+'" />\
  频道 <input type="text" name="column_name['+num+']" style="width:80px;" /> <input type="checkbox" class="checkbox" name="column_atside['+num+']" value="1" onclick="setAtside(this, \''+num+'\', 4);" /><span id="side_status_'+num+'" style="font-size:12px;"><del>位于边栏</del> | 主体展示，详/限展<input type="text" name="column_show['+num+']" style="width:20px;" value="4" />个栏目</span><br />\
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">\
  <tr>\
    <td width="90" align="center">该频道下栏目</td>\
    <td width="60" align="center">强调</td>\
    <td width="280" align="center">栏目页面网址排列模式 <a href="?get=style#httpType" target="_blank">说明</a></td>\
    <td align="center">操作</td>\
  </tr>\
</table>\
  <div id="class_'+num+'" class="newcolumn"></div><div style="height:0px; overflow:hidden;clear:both;"></div>\
  <button type="button" onclick="javascript:addClass(\''+num+'\');">为此频道添加栏目</button> '+((cid!='homepage') ? '<button type="button" onclick="javascript:removeOption(this);">删除此频道</button>' : '')+' '+((cid=='')?'<button type="button" onclick="javascript:upColumn(this);" title="上移">↑</button> <button type="button" onclick="javascript:downColumn(this);" title="下移">↓</button>' : '')+'';
  par.insertBefore(newDiv, null);
  //num=num+1;
}

//排序：栏目分类 向上
function upColumn(obj){
  var par=$('area');
  var tar=obj.parentNode;
  var prevObj=tar.previousSibling;
  while(prevObj!=null && prevObj.nodeType!=1){
    prevObj=prevObj.previousSibling;
  }
  if(prevObj==null){
    alert('已是最上级！');
    return;
  }
/*
  var O_id=tar.title;
  var A_id=prevObj.title;

  tar.id='column_'+A_id+'';
  tar.title=''+A_id+'';

  tar.innerHTML=tar.innerHTML.replace(new RegExp('name="column_name\\\['+O_id+'\\\]','g'),'name="column_name['+A_id+']');
  tar.innerHTML=tar.innerHTML.replace(new RegExp('name="class\\\['+O_id+'\\\]','g'),'name="class['+A_id+']');
  tar.innerHTML=tar.innerHTML.replace(new RegExp('name="class_name\\\['+O_id+'\\\]','g'),'name="class_name['+A_id+']');
  tar.innerHTML=tar.innerHTML.replace(new RegExp('id="class_'+O_id+'','g'),'id="class_'+A_id+'');
  tar.innerHTML=tar.innerHTML.replace(new RegExp('javascript:addClass\\\(\\\''+O_id+'\\\'\\\)','g'),'javascript:addClass(\''+A_id+'\')');

  prevObj.id='column_'+O_id+'';
  prevObj.title=''+O_id+'';
  prevObj.innerHTML=prevObj.innerHTML.replace(new RegExp('name="column_name\\\['+A_id+'\\\]','g'),'name="column_name['+O_id+']');
  prevObj.innerHTML=prevObj.innerHTML.replace(new RegExp('name="class\\\['+A_id+'\\\]','g'),'name="class['+O_id+']');
  prevObj.innerHTML=prevObj.innerHTML.replace(new RegExp('name="class_name\\\['+A_id+'\\\]','g'),'name="class_name['+O_id+']');
  prevObj.innerHTML=prevObj.innerHTML.replace(new RegExp('id="class_'+A_id+'','g'),'id="class_'+O_id+'');
  prevObj.innerHTML=prevObj.innerHTML.replace(new RegExp('javascript:addClass\\\(\\\''+A_id+'\\\'\\\)','g'),'javascript:addClass(\''+O_id+'\')');
*/
  try{par.insertBefore(tar,prevObj);}catch(err){alert('向上移动失败！请稍候再试');return;}
  //par.removeChild(tar);

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

//删除栏目
function removeOption(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  //if(confirm('确定删除此频道吗？！')){
    try{
      par.removeChild(tar);
    }catch(err){
    }
  //}
}

function frTo(fid){
  if($('class_name_fr')==null || $('class_name_to')==null){
    alert('出错！暂停此项');
    return false;
  }
  var fr=$('class_name_fr').value;
  var to=$('class_name_to').value;
  if(fr==''){
    alert('请选择起始小类！');
    return false;
  }
  if(to==''){
    alert('请选择目标小类！');
    return false;
  }
  if(fr==to){
    alert('不能重名！');
    return false;
  }
  if($('class_'+fr+'')==null){
    alert('起始小类不存在！');
    return false;
  }
  if($('class_'+to+'')==null){
    alert('目标小类不存在！');
    return false;
  }
  return true;
}

function setAtside(o, fid, n) {
  if (o.checked == true) {
    $('side_status_'+fid+'').innerHTML = '位于边栏 （浏览方式：<input type="radio"  class="radio" name="column_atside_type['+fid+']" value="0" checked="checked" />快捷弹出窗口[<a href="login_current.php" onclick="addSubmitSafe(1);$(\'addCFrame\').style.display=\'block\';" target="addCFrame" title="注意：别在意进入什么页面，这只是示例" onmouseover="sSD(this,event);">示例</a>] <input type="radio"  class="radio" name="column_atside_type['+fid+']" value="1" />进入新页面[<a href="login.php" target="_blank" title="注意：别在意进入什么页面，这只是示例" onmouseover="sSD(this,event);">示例</a>]）';
  } else {
    $('side_status_'+fid+'').innerHTML = '<del>位于边栏</del> | 主体展示，详/限展<input type="text" name="column_show['+fid+']" style="width:20px;" value="'+n+'" />个栏目';
  }
}

-->
</script>
<div class="note">提示：
  <ol>
      <li>网址分类数量及名称默认程序都已设置好，建议不要更改；如需更改，只更改名称即可。</li>
    <li>以下信息必须认真填写，尽量不要用特殊符号，如 \ : ; * ? ' &lt; &gt; | ，必免导致错误。</li>
  </ol>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td width="550" align="left"><form id="mainform" action="?post=area" method="post" onsubmit="if($('subt').checked==true){this.target='_blank';}else{this.target='_self';}">
        <?php
@ require('writable/set/set_area.php');
//unset($web['area']['mingz']);
//unset($web['area']['homepage']);

//@ksort($web['area']);

$text = array();
foreach ((array)$web['area'] as $fid => $f) {
  $text[$fid] .= '
  <div id="column_'.$fid.'" style="margin-bottom:7px" title="'.$fid.'">
    <input type="hidden" name="column[]" title="'.$fid.'" value="'.$f['name'][0].'" />
    频道 <input type="text" name="column_name['.$fid.']" value="'.$f['name'][0].'" style="width:80px;" /> ';
  if ($fid !== 'homepage') {
    $text[$fid] .= '<input type="checkbox"  class="checkbox" name="column_atside['.$fid.']" value="1"'.(isset($f['name'][3]) && abs($f['name'][3]) == 1 ? ' checked="checked"' : '').' onclick="setAtside(this, \''.$fid.'\', '.(abs($f['name'][2]) >= 1 ? abs($f['name'][2]) : 4).');" /><span id="side_status_'.$fid.'" style="font-size:12px;">';
    if (isset($f['name'][3]) && abs($f['name'][3]) == 1) {
      $text[$fid] .= '位于边栏 （浏览方式：<input type="radio"  class="radio" name="column_atside_type['.$fid.']" value="0"'.(abs($f['name'][4]) == 0 ? ' checked="checked"':'').' />快捷弹出窗口[<a href="login_current.php" onclick="addSubmitSafe(1);$(\'addCFrame\').style.display=\'block\';" target="addCFrame" title="注意：别在意进入什么页面，这只是示例" onmouseover="sSD(this,event);">示例</a>] <input type="radio"  class="radio" name="column_atside_type['.$fid.']" value="1"'.(abs($f['name'][4]) == 1 ? ' checked="checked"':'').' />进入新页面[<a href="login.php" target="_blank" title="注意：别在意进入什么页面，这只是示例" onmouseover="sSD(this,event);">示例</a>]）';
    } else {
      $text[$fid] .= '<del>位于边栏</del> | 主体展示，详/限展<input type="text" name="column_show['.$fid.']" style="width:20px;" value="'.(abs($f['name'][2]) >= 1 ? abs($f['name'][2]) : 4).'" />个栏目';
    }
    $text[$fid] .= '</span>';
  } else {
    $text[$fid] .= '<span style="font-size:12px;">详/限展<input type="text" name="column_show['.$fid.']" style="width:20px;" value="'.(abs($f['name'][2]) >= 1 ? abs($f['name'][2]) : 4).'" />个栏目</span>';  
  }
  $text[$fid] .= '
<br />
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">
  <tr>
    <td width="90" align="center">该频道下栏目</td>
    <td width="60" align="center">强调</td>
    <td width="280" align="center">栏目页面网址排列模式 <a href="?get=style#httpType" target="_blank">说明</a></td>
    <td align="center">操作</td>
  </tr>
</table>

    <div id="class_'.$fid.'" class="newcolumn">';
  $opti .= '<optgroup label="'.$f['name'][0].'">';
    
  unset($web['area'][$fid]['name']);
  foreach ((array)$web['area'][$fid] as $cid => $c) {
    $text[$fid] .= '<div id="class_'.$fid.'_'.$cid.'" class="newclass" title="'.$cid.'">
	  <input type="hidden" name="class['.$fid.']" title="'.$cid.'" />
<span class="block_span" style="width:88px;"><input type="text" name="class_name['.$fid.']['.$cid.']" value="'.$c[0].'" style="width:55px;" /></span>
<span class="block_span" style="width:60px;"><input type="checkbox" class="checkbox" name="class_bj['.$fid.']['.$cid.']" value="1"'.((isset($c[2]) && $c[2] == 1) ? ' checked="checked"' : '').' />加背景</span>
<span class="block_span" style="width:280px;">
<input type="radio" class="radio" name="class_http_type['.$fid.']['.$cid.']" value="0"'.(($web['area'][$fid][$cid][3]!=1&&$web['area'][$fid][$cid][3]!=2)?' checked="checked"':'').' />站名排列
<input type="radio" class="radio" name="class_http_type['.$fid.']['.$cid.']" value="1"'.(($web['area'][$fid][$cid][3]==1)?' checked="checked"':'').' />弹窗简介
<input type="radio" class="radio" name="class_http_type['.$fid.']['.$cid.']" value="2"'.(($web['area'][$fid][$cid][3]==2)?' checked="checked"':'').' />流布局详细显示
</span>
<a class="caozuo" href="javascript:void(0)" onclick="removeOption(this);return false;" title="删除">╳</a>
<a class="caozuo" href="javascript:void(0);" title="插入" onclick="insertClass(this,\''.$fid.'\');return false;">↖</a>
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="upClass(this,\''.$fid.'\');return false;">↑</a>
<a class="caozuo" href="javascript:void(0);" title="上移" onclick="downClass(this,\''.$fid.'\');return false;">↓</a>

<a class="caozuo" href="webmaster_central.php?get=http&column_id='.$fid.'&class_id='.$cid.'" title="管理此频道下的网址">&gt;</a>
         </div>';
    $opti .= '<option value="'.$fid.'_'.$cid.'">'.$c[0].'</option>';
  }
  $text[$fid] .= '
    </div>
    <div style="height:0px; overflow:hidden;clear:both;"></div>
    <button type="button" onclick="javascript:addClass(\''.$fid.'\');" style="clear:right">为此频道添加栏目</button>
    '.(/*is_numeric($fid)*/$fid !== 'homepage' ? '
    <button type="button" onclick="javascript:removeOption(this);">删除此频道</button>
    <button type="button" onclick="javascript:upColumn(this);" title="上移">↑</button>
    <button type="button" onclick="javascript:downColumn(this);" title="下移">↓</button>' : '').'
  </div>
';
  $opti .= '</optgroup>';
}

?>
<style>
.lik { border:1px green solid; width:344px; padding:1px; text-align:left; line-height:normal; }
.lis { display:inline-block !important; display:inline; zoom:1; text-align:left; margin:0 1px; letter-spacing:-2px; font-size:10px; border:1px blue solid; }
</style>
<div style="padding:10px; border:1px #99FF33 solid; margin-bottom:10px;">
  <div class="qiangdiao"><b>首页版面（名站）对齐（注：所有选择加背景定宽居中将失效）：</b>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200"><input type="radio" class="radio" name="mingz_align" value="NULL, NULL" <?php echo empty($web['mingz_align'][0]) ? ' checked="checked"' : ''; ?> />向左自然排列</td>
    <td><div class="lik">名站：<span class="lis">1</span><span class="lis">12</span><span class="lis">123</span><span class="lis">1234</span><span class="lis">12345</span><span class="lis">123456</span><span class="lis">1</span><span class="lis">12</span><span class="lis">123</span></div></td>
  </tr>
  <tr>
    <td width="200"><input type="radio" class="radio" name="mingz_align" value="6, 'LEFT'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 6 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽6列，字靠左</td>
    <td><div class="lik" style="text-align:center;"><span class="lis" style="width:51px;">1</span><span class="lis" style="width:51px;">12</span><span class="lis" style="width:51px;">123</span><span class="lis" style="width:51px;">1234</span><span class="lis" style="width:51px;">12345</span><span class="lis" style="width:51px;">123456</span></div></td>
  </tr>
  <tr>
    <td width="200"><input type="radio" class="radio" name="mingz_align" value="6, 'CENTER'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 6 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽6列，字居中</td>
    <td><div class="lik" style="text-align:center;"><span class="lis" style="width:51px; text-align:center;">1</span><span class="lis" style="width:51px; text-align:center;">12</span><span class="lis" style="width:51px; text-align:center;">123</span><span class="lis" style="width:51px; text-align:center;">1234</span><span class="lis" style="width:51px; text-align:center;">12345</span><span class="lis" style="width:51px; text-align:center;">123456</span></div></td>
  </tr>
</table>
<input type="radio" class="radio" name="mingz_align" value="5, 'LEFT'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 5 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽5列，字靠左（图例略） <input type="radio" class="radio" name="mingz_align" value="5, 'CENTER'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 5 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽5列，字居中<br />
<input type="radio" class="radio" name="mingz_align" value="7, 'LEFT'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 7 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽7列，字靠左（图例略） <input type="radio" class="radio" name="mingz_align" value="7, 'CENTER'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 7 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽7列，字居中<br />
<input type="radio" class="radio" name="mingz_align" value="8, 'LEFT'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 8 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽8列，字靠左（图例略） <input type="radio" class="radio" name="mingz_align" value="8, 'CENTER'" <?php echo (!empty($web['mingz_align'][0]) && $web['mingz_align'][0] == 8 && !empty($web['mingz_align'][1]) && $web['mingz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽8列，字居中

</div>
<div id="areahomepage">
<?php echo $text['homepage'] ? $text['homepage'] : '<button type="button" onclick="addColumn(\'homepage\');this.style.display=\'none\';"  class="send2" style="border:none;background-color:#00CC66;"><b>添加频道[首页功能]</b></button>'; ?>
</div>

</div>


<div style="padding:10px; border:1px #99FF33 solid; margin-bottom:10px;">
<div class="qiangdiao"><b>分类区域（酷站）对齐：</b>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr title="自然排列不限类别数量，每行排满为止，如想多显示分类，请将分类名缩短" onmouseover="sSD(this,event);">
    <td width="200"><input type="radio" class="radio" name="kuz_align" value="NULL, NULL" <?php echo empty($web['kuz_align'][0]) && empty($web['kuz_align'][1]) ? ' checked="checked"' : ''; ?> />向左自然排列</td>
    <td><div class="lik"><span class="lis" style="width:36px; border:none; margin:0; float:left;">音乐</span><span class="lis" style="width:36px; border:none; float:right; margin:0;">更多》</span>
<span class="lis">1</span><span class="lis">12</span><span class="lis">123</span><span class="lis">1234</span><span class="lis">12345</span><span class="lis">123456</span><span class="lis">1</span><span class="lis">12</span><span class="lis">123</span>
        </div></td>
  </tr>
  <tr title="自然排列不限类别数量，每行排满为止，如想多显示分类，请将分类名缩短" onmouseover="sSD(this,event);">
    <td width="200"><input type="radio" class="radio" name="kuz_align" value="NULL, 'CENTER'" <?php echo empty($web['kuz_align'][0]) && !empty($web['kuz_align'][1]) ? ' checked="checked"' : ''; ?> />居中自然排列</td>
    <td><div class="lik" style="text-align:center;"><span class="lis" style="width:36px; border:none; margin:0; float:left;">音乐</span><span class="lis" style="width:36px; border:none; float:right; margin:0;">更多》</span>
<span class="lis">1</span><span class="lis">12</span><span class="lis">123</span><span class="lis">1234</span><span class="lis">12345</span><span class="lis">123456</span><span class="lis">1</span><span class="lis">12</span><span class="lis">123</span>
        </div></td>
  </tr>
  <tr>
    <td width="200"><input type="radio" class="radio" name="kuz_align" value="6, 'LEFT'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 6 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽6列，字靠左</td>
    <td><div class="lik"><span class="lis" style="width:36px; border:none; margin:0; float:left;">音乐</span><span class="lis" style="width:36px; border:none; float:right; margin:0;">更多》</span>
<span class="lis" style="width:37px;">1</span><span class="lis" style="width:37px;">12</span><span class="lis" style="width:37px;">123</span><span class="lis" style="width:37px;">1234</span><span class="lis" style="width:37px;">12345</span><span class="lis" style="width:37px;">123456</span>
        </div></td>
  </tr>
  <tr>
    <td width="200"><input type="radio" class="radio" name="kuz_align" value="6, 'CENTER'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 6 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽6列，字居中</td>
    <td><div class="lik"><span class="lis" style="width:36px; border:none; margin:0;">音乐</span><span class="lis" style="width:36px; border:none; float:right; margin:0;">更多》</span>
<span class="lis" style="width:37px; text-align:center;">1</span><span class="lis" style="width:37px; text-align:center;">12</span><span class="lis" style="width:37px; text-align:center;">123</span><span class="lis" style="width:37px; text-align:center;">1234</span><span class="lis" style="width:37px; text-align:center;">12345</span><span class="lis" style="width:37px; text-align:center;">123456</span>
        </div></td>
  </tr>
</table>
<input type="radio" class="radio" name="kuz_align" value="4, 'LEFT'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 4 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽4列，字靠左（图例略） <input type="radio" class="radio" name="kuz_align" value="4, 'CENTER'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 4 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?>  />定宽4列，字居中（图例略）<br />
<input type="radio" class="radio" name="kuz_align" value="5, 'LEFT'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 5 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽5列，字靠左（图例略） <input type="radio" class="radio" name="kuz_align" value="5, 'CENTER'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 5 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽5列，字居中（图例略）<br />
<input type="radio" class="radio" name="kuz_align" value="7, 'LEFT'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 7 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] != 'CENTER') ? ' checked="checked"' : ''; ?> />定宽7列，字靠左（图例略） <input type="radio" class="radio" name="kuz_align" value="7, 'CENTER'" <?php echo (!empty($web['kuz_align'][0]) && $web['kuz_align'][0] == 7 && !empty($web['kuz_align'][1]) && $web['kuz_align'][1] == 'CENTER') ? ' checked="checked"' : ''; ?> />定宽7列，字居中（图例略）

</div>      
<div id="area">
<?php
unset($text['homepage']);
echo count($text) > 0 ? @implode('', $text) : '<div style="color:#FF6600">您还未设置频道！请先添加频道</div>';
unset($web, $text);
?>
      </div>
      <br />
      <button type="button" onclick="addColumn('');"  class="send2" style="border:none;background-color:#00CC66;">添加频道</button> <a href="webmaster_central.php?get=http">管理频道、栏目及分类下的网址请点此&gt;&gt;</a>
      <br />
      <br />
      <br />
	  </div>
  <div class="red_err">特别提示：提交前请确定set目录具备写权限，因为要将配置结果写入writable/set/set_area.php文件，否则虽提示成功，但实际仍配置失败。</div>
      <button type="submit" onclick="javascript:return confirm('确定提交吗？！');" class="send2" style="border:none;">提交设置</button> <input type="checkbox" class="checkbox" id="subt" checked="checked" />在弹出的新页面提交，避免检查出填写错误而导致数据丧失，白写了</br />如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察
    </form></td>
    <td style="padding-left:10px;"><form id="mainform2" action="?post=area_c" method="post" onsubmit="return frTo()">
      批量转移分类网址：<br />
      <select name="class_name_fr" id="class_name_fr" style="width:100px">
        <option value="">请选择</option>
        <?php echo $opti; ?>
      </select>
      &harr;
      <select name="class_name_to" id="class_name_to" style="width:100px">
        <option value="">请选择</option>
        <?php echo $opti; ?>
      </select>
      <input type="checkbox" class="checkbox" name="type" value="1" checked="checked" />
      互换转移<br />

      <button type="submit" class="send2" style="border:none;" onclick="addSubmitSafe();">提交</button>
      <br /><br />
<br />
<br />
注：此功能只是整体转换各频道栏目分类下属网址，对应频道名调整请在左侧进行。
    </form></td>
  </tr>
</table>
