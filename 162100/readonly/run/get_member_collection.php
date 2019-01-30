<?php
require ('authentication_member.php');
?>
<?php
if (POWER > 0) :

  if (POWER > 0.5) {

?>

<script type="text/javascript">
<!--
//添加链接
function addLink(){
  var noC=$('noCo');
  if(noC!=null){
    noC.parentNode.removeChild(noC);
  }
  num=(new Date()).valueOf();
  var par=$('area_http_url');
  var newDiv=document.createElement('DIV');
  //newDiv.id='link[]';
  //newDiv.title=num;
  newDiv.style.marginBottom='5px';
  newDiv.innerHTML='<input type="hidden" name="link[]" id="link_'+num+'" title="'+num+'" /> \
<input type="text" id="linkname['+num+']" name="linkname['+num+']" style="width:125px;" /> \
<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['+num+']\');"> \
<input id="color['+num+']" name="color['+num+']" type="hidden" /><img src="readonly/images/linkname_color.gif" /> \
</span> \
<input type="text" name="linkhttp['+num+']" style="width:300px;" value="http://" /> \
<button type="button" onclick="delLink(this)" title="删除">╳</button> \
<button type="button" title="插入" onclick="insertLink(this)" />↖</button> \
<button type="button" title="上移" onclick="upLink(this)">↑</button> \
<button type="button" title="上移" onclick="downLink(this)">↓</button>';

  par.insertBefore(newDiv,null);
  num=num+1;
  //location.href='#link_'+num+'';
  par.scrollTop = par.scrollHeight;
}


//插入
function insertLink(obj){
  var tar=obj.parentNode;
  var par=$('area_http_url');
  var newDiv=document.createElement('DIV');
  num=(new Date()).valueOf();
  newDiv.id='link[]';
  newDiv.title=num;
  newDiv.style.marginBottom='5px';
  newDiv.innerHTML='<input type="hidden" name="link[]" id="link_'+num+'" title="'+num+'" /> \
<input type="text" id="linkname['+num+']" name="linkname['+num+']" style="width:125px;" /> \
<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['+num+']\');"> \
<input id="color['+num+']" name="color['+num+']" type="hidden" /><img src="readonly/images/linkname_color.gif" /> \
</span> \
<input type="text" name="linkhttp['+num+']" style="width:300px;" value="http://" /> \
<button type="button" onclick="delLink(this)" title="删除">╳</button> \
<button type="button" title="插入" onclick="insertLink(this)" />↖</button> \
<button type="button" title="上移" onclick="upLink(this)">↑</button> \
<button type="button" title="上移" onclick="downLink(this)">↓</button>';
  par.insertBefore(newDiv,tar);
}


//排序：链接 向上
function upLink(obj){
  var par=$('area_http_url');
  var tar=obj.parentNode;
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
  var par=$('area_http_url');
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

//删除链接
function delLink(obj){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  //if(confirm('确定删除此链接吗？！')){
    try{
      par.removeChild(tar);
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


-->
</script>
<div class="note">提示：保存设置后，下列网址将显示在主页“收藏”中。</div>
<style type="text/css">
<!--
.httpo { width:310px; display:inline-block !important; display:inline; zoom:1; vertical-align:middle; overflow:hidden; }
.n_nav td { background-color:#D8D8D8; font-size:12px; }
.n_img { width:60px; display:inline-block !important; display:inline; zoom:1; vertical-align:middle; overflow:hidden; cursor:pointer; }
-->
</style>
<style type="text/css">
.file_o { width:24px; height:16px; position:absolute; z-index:4; overflow:hidden; background-color:#FFFFFF; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0); -moz-opacity:0; -khtml-opacity:0; opacity:0; cursor:pointer; }
.file_b { }
</style>
<style>
.color_bar { font-size:12px; position:absolute; z-index:60; left:0; top:-12px; width:80px; background:#EEEEEE; border:#CCCCCC 1px solid; padding:4px; overflow:hidden; }
.color_button { border:none; width:12px; height:12px; font-size:10px; color:#FFFFFF; float:left; padding:0; margin:2px; cursor:pointer; overflow:hidden; }
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="0" class="n_nav">
  <tr>
    <td width="105" align="center">链接名</td>
    <td width="60" align="center">套色</td>
    <td width="305" align="center">网址</td>
    <td align="center">操作</td>
  </tr>
</table>
    <?php

  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT collection FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;
    if (!(is_array($row) && count($row) > 0)) {
      $err = '<div class="output">查不到用户档案！原因：1、无此用户；2、程序出错。</div>';
    } else {
      preg_match_all('/<a [^>]*href="([^">]*)"( class="([^">]*)")?>(.*)<\/a>/isU', $row['collection'], $matches);

      unset($row);
      if ($matches[1]) {
        foreach ($matches[1] as $k => $v) {
          $text .= get_links($v, $matches[4][$k], $matches[3][$k], $k);
        }
      } else {
        $text .= '<div class="output" id="noCo">暂无自定义网址记录</div>';
      }
    }

  } else {
    $err .= $sql['db_err'];
  }

  db_close($db);

  echo empty($err) ? '
<form id="mainform" action="member.php?post=collection" method="post" id="selfform" target="_self" onsubmit="if($(\'noCo\')!=null){alert(\'请添加网址！\');return false;}">
  <div id="area_http_url">'.$text.'</div>
  <div style="width:220px; clear:both;">
  <button type="button" onclick="addLink();" class="send1" style="border:none;">添加网址</button>
  <button type="submit" class="send2" style="border:none;">提交</button>
  </div>

</form>' : $err;

?>
<?php


  } else {

    @ require ('login_key/'.$session[4].'/info.php');

  }

else :
?>

<div class="output">
您上次的登陆已失效！请重新<a href="login<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo urlencode(basename($_SERVER['REQUEST_URI'])); ?>" target="_self">登陆</a>获取数据<br /><span class="grayword">没有帐号？<a href="reg<?php echo strstr(basename($_SERVER['PHP_SELF']), '_current') ? '_current' : ''; ?>.php?location=<?php echo basename($_SERVER['REQUEST_URI']); ?>" target="_self">注册一个</a>，非常简单</span>
</div>

<?php
endif;
?>




<?php

function get_links($url, $website, $style, $k) {
  return '
<div style="margin-bottom:5px">
<input type="hidden" name="link[]" id="link_'.$k.'" title="'.$k.'" />
<input type="text" id="linkname['.$k.']" name="linkname['.$k.']" class="'.$style.'" value="'.$website.'" style="width:125px;" />

<span class="httpo" style="width:25px;overflow:visible;" onmouseover="addClass(this, \'['.$k.']\');">
<input id="color['.$k.']" name="color['.$k.']" type="hidden" value="'.$style.'" /><img src="readonly/images/linkname_color.gif" />
</span>

<input type="text" name="linkhttp['.$k.']" value="'.$url.'" style="width:300px;" />
<button type="button" onclick="delLink(this)" title="删除">╳</button>
<button type="button" title="插入" onclick="insertLink(this)" />↖</button>
<button type="button" title="上移" onclick="upLink(this)">↑</button>
<button type="button" title="上移" onclick="downLink(this)">↓</button>
</div>';
}


?>

