<?php
require ('authentication_manager.php');
?>
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
.s_ { margin-bottom:10px; }
-->
</style>
<script type="text/javascript">
<!--

//删除
function delOption(obj){
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
function addN(type){
  var par=$('base_'+type+'');
  var lim = type==1 ? 7 : 8;
  var divs = par.getElementsByTagName('DIV');
  if (divs.length >= lim) {
    alert('最多限'+lim+'个！否则挤不下');
    return false;
  }
  var newDiv=document.createElement('DIV');
  n=(new Date()).valueOf();
  newDiv.id='s_'+type+'_'+n+'';
  newDiv.className='sli';
  newDiv.innerHTML='<span class="sliin" style="width:70px;"><input type="text" id="menu_name_'+type+'_'+n+'" name="menu_name['+type+']['+n+']" style="width:98%;" /></span> <span class="sliin" style="width:70px;"><input type="hidden" id="menu_img_'+type+'_'+n+'" name="menu_img['+type+']['+n+']" /><img id="img_'+type+'_'+n+'" width="16" height="16" title="'+type+'_'+n+'.gif" /><a class="file_b" onmouseover="addFile(this,\''+type+'\',\''+n+'\');">上传</a></span> <span class="sliin" style="width:285px;"><input type="text" id="menu_url_'+type+'_'+n+'" name="menu_url['+type+']['+n+']" style="width:98%;" /></span> <span class="sliin" style="width:35px;"><input type="text" id="menu_w_'+type+'_'+n+'" name="menu_w['+type+']['+n+']" style="width:98%;" onblur="isDigit(this,\'\',0);" /></span> <span class="sliin" style="width:35px;"><input type="text" id="menu_h_'+type+'_'+n+'" name="menu_h['+type+']['+n+']" style="width:98%;" onblur="isDigit(this,\'\',0);" /></span> <span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="menu_scroll_'+type+'_'+n+'" name="menu_scroll['+type+']['+n+']" value="0" checked="checked"'+(type == 0?' onclick="if($(\'menu_w_'+type+'_'+n+'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'')+' />浮现</span> <a title="删除" href="javascript:void(0)" onclick="delOption(this);return false;">╳</a> <a title="插入" href="javascript:void(0)" onclick="insertN(this,\''+type+'\');return false;">↖</a> <a title="上移" href="javascript:void(0)" onclick="upN(this);return false;">↑</a> <a title="下移" href="javascript:void(0)" onclick="downN(this);return false;">↓</a> \
<span class="sliin" style="width:40px;">&nbsp;</span> \
<span class="sliin grayword" style="width:100px;">宽屏时备选URL：</span> \
<span class="sliin" style="width:285px;"><input type="text" id="b_menu_url_'+type+'_'+n+'" name="b_menu_url['+type+']['+n+']" style="width:98%;"<?php echo !file_exists('addfunds.php') ? ' onfocus="alert(\\\'这里商业版才能让填噢\\\');this.blur();"' : ''; ?> /></span> \
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_w_'+type+'_'+n+'" name="b_menu_w['+type+']['+n+']" style="width:98%;" onblur="'+(type == 0?' if(this.value==\'100%\'){$(\'b_menu_scroll_'+type+'_'+n+'\').checked=false;}':'')+'if($(\'b_menu_url_'+type+'_'+n+'\').value!=\'\'){isDigit(this,\'\',0);}" /></span> \
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_h_'+type+'_'+n+'" name="b_menu_h['+type+']['+n+']" style="width:98%;" onblur="if($(\'b_menu_url_'+type+'_'+n+'\').value!=\'\'){isDigit(this,\'\',0);}" /></span> \
<span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="b_menu_scroll_'+type+'_'+n+'" name="b_menu_scroll['+type+']['+n+']" value="0" checked="checked"'+(type == 0?' onclick="if($(\'b_menu_w_'+type+'_'+n+'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'')+' />浮现</span> \
';
  par.insertBefore(newDiv,null);
  $('menu_name_'+type+'_'+n+'').focus();
}

//排序：链接 向上
function upN(obj){
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
function downN(obj){
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
function insertN(obj,type){
  var tar=obj.parentNode;
  var par=tar.parentNode;
  var lim = type==1 ? 7 : 8;
  var divs = par.getElementsByTagName('DIV');
  if (divs.length >= lim) {
    alert('最多限'+lim+'个');
    return false;
  }
  var newDiv=document.createElement('DIV');
  n=(new Date()).valueOf();
  newDiv.id='s_'+type+'_'+n+'';
  newDiv.className='sli';
  newDiv.innerHTML='<span class="sliin" style="width:70px;"><input type="text" id="menu_name_'+type+'_'+n+'" name="menu_name['+type+']['+n+']" style="width:98%;" /></span> <span class="sliin" style="width:70px;"><input type="hidden" id="menu_img_'+type+'_'+n+'" name="menu_img['+type+']['+n+']" /><img id="img_'+type+'_'+n+'" width="16" height="16" title="'+type+'_'+n+'.gif" /><a class="file_b" onmouseover="addFile(this,\''+type+'\',\''+n+'\');">上传</a></span> <span class="sliin" style="width:285px;"><input type="text" id="menu_url_'+type+'_'+n+'" name="menu_url['+type+']['+n+']" style="width:98%;" /></span> <span class="sliin" style="width:35px;"><input type="text" id="menu_w_'+type+'_'+n+'" name="menu_w['+type+']['+n+']" style="width:98%;" onblur="isDigit(this,\'\',0);" /></span> <span class="sliin" style="width:35px;"><input type="text" id="menu_h_'+type+'_'+n+'" name="menu_h['+type+']['+n+']" style="width:98%;" onblur="isDigit(this,\'\',0);" /></span> <span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="menu_scroll_'+type+'_'+n+'" name="menu_scroll['+type+']['+n+']" value="0" checked="checked"'+(type == 0?' onclick="if($(\'menu_w_'+type+'_'+n+'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'')+' />浮现</span> <a title="删除" href="javascript:void(0)" onclick="delOption(this);return false;">╳</a> <a title="插入" href="javascript:void(0)" onclick="insertN(this,\''+type+'\');return false;">↖</a> <a title="上移" href="javascript:void(0)" onclick="upN(this);return false;">↑</a> <a title="下移" href="javascript:void(0)" onclick="downN(this);return false;">↓</a> \
<span class="sliin" style="width:40px;">&nbsp;</span> \
<span class="sliin grayword" style="width:100px;">宽屏时备选URL：</span> \
<span class="sliin" style="width:285px;"><input type="text" id="b_menu_url_'+type+'_'+n+'" name="b_menu_url['+type+']['+n+']" style="width:98%;"<?php echo !file_exists('addfunds.php') ? ' onfocus="alert(\\\'这里商业版才能让填噢\\\');this.blur();"' : ''; ?> /></span> \
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_w_'+type+'_'+n+'" name="b_menu_w['+type+']['+n+']" style="width:98%;" onblur="'+(type == 0?' if(this.value==\'100%\'){$(\'b_menu_scroll_'+type+'_'+n+'\').checked=false;}':'')+'if($(\'b_menu_url_'+type+'_'+n+'\').value!=\'\'){isDigit(this,\'\',0);}" /></span> \
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_h_'+type+'_'+n+'" name="b_menu_h['+type+']['+n+']" style="width:98%;" onblur="if($(\'b_menu_url_'+type+'_'+n+'\').value!=\'\'){isDigit(this,\'\',0);}" /></span> \
<span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="b_menu_scroll_'+type+'_'+n+'" name="b_menu_scroll['+type+']['+n+']" value="0" checked="checked"'+(type == 0?' onclick="if($(\'b_menu_w_'+type+'_'+n+'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'')+' />浮现</span> \
';
  par.insertBefore(newDiv,tar);
  $('menu_name_'+type+'_'+n+'').focus();
}


-->
</script>
<div class="note">提示：
  <ol>
    <li><span class="redword">申明：</span>功能菜单栏并不在所有首页模式下显示。</li>
    <li>以下信息必须认真填写，尽量不要用特殊符号，如 \ : ; * ? ' &lt; &gt; | ，必免导致错误。</li>
    <li>若想单独删除图标，方法为：先删除整栏，然后再新增一栏，再填入内容，不上传图标即可。</li>
    <li>若想调用本站分类或专题页面，请在URL后面添加&amp;for_self_menu=1（或?for_self_menu=1），可避免页头页脚重复显示，如：<br />
一个分类页面[名站<span class="grayword">这只是例子</span>]：<br />
动态的 <a href="class.php?column_id=homepage&amp;class_id=0&amp;for_self_menu=1" target="_blank">class.php?column_id=homepage&class_id=0<span class="redword">&for_self_menu=1</span></a> <br />
静态的 <a href="sybm_mingzhan.html?for_self_menu=1" target="_blank">sybm_mingzhan.html<span class="redword">?for_self_menu=1</span></a> <span class="grayword">如果你开启了一键全静态</span><br />
一个专题页面[快递查询<span class="grayword">这只是例子</span>]：<br />
动态的 <a href="detail.php?column_id=1&amp;class_id=15&amp;detail_title=%E5%BF%AB%E9%80%92%E6%9F%A5%E8%AF%A2&amp;for_self_menu=1" target="_blank">detail.php?column_id=1&amp;class_id=15&amp;detail_title=%E5%BF%AB%E9%80%92%E6%9F%A5%E8%AF%A2<span class="redword">&for_self_menu=1</span></a> <br />
静态的 <a href="kuaidichaxun.html?for_self_menu=1" target="_blank">kuaidichaxun.html<span class="redword">?for_self_menu=1</span></a> <span class="grayword">如果你开启了一键全静态</span><br />
并且滚动条不必点浮现，页面会自动调整高度。</li>
  </ol>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table" style="margin-bottom:10px;">
  <tr>
    <th width="15" rowspan="2">位置</th>
    <th width="50" rowspan="2">状态</th>
    <th width="70" rowspan="2">名称</th>
    <th width="70" rowspan="2">图标<br />16px×16px</th>
    <th width="285" rowspan="2">调用URL</th>
    <th width="35" rowspan="2">宽度<br />px<br />
可填<br />
100%</th>
    <th width="35">高度<br />px<br />
可填<br />
100%</th>
    <th width="50">浮现滚动条</th>
    <th rowspan="2">操作</th>
  </tr>
  <tr>
    <th colspan="2">高度最好比实际网页高度小一点，否则无法显现滚动条 </th>
  </tr>
</table>

<style type="text/css">
.file_o { width:24px; height:16px; position:absolute; z-index:4; overflow:hidden; background-color:#FFF; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0); -moz-opacity:0; -khtml-opacity:0; opacity:0; cursor:pointer; }
.file_b { }
</style>
<form id="mainform" action="?post=menu" method="post" enctype="multipart/form-data" onsubmit="if($('subt').checked==true){this.target='_blank';}else{this.target='_self';}">
<input name="act" type="hidden" />
<input name="up" type="hidden" />
<input id="uploadimg" type="file" class="file_o" />
<div id="area">
<script type="text/javascript">
<!--

function chkSN(type,n){
  var st=$('menu_name_'+type+'_'+n+'');
  if(st!=null && st.value.replace(/^\s+|\s+$/g,'')!=''){
  }else{
    alert('前面的名称不能空！');
    $('menu_name_'+type+'_'+n+'').focus();
    return false;
  }
  return true;
}

function chkUpPic(type,n){
  $('mainform').target='lastFrame';
  $('mainform').act.value='up';
  $('mainform').up.value=type+'_'+n;
  $('mainform').submit();
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
    fileInput.onclick=function(){return chkSN(type,n);}
    fileInput.onchange=function(){chkUpPic(type,n);}
  }

}

-->
</script>

<?php

require ('writable/set/set_menu.php');

$m_name = array('顶部', '底部');

$text_menu = '';
if (!(isset($web['menu']) && is_array($web['menu']))) {
  $web['menu'] = array(
    0 => array(
      'open' => 1,
      0 => array('', '', NULL, '', 0),
    ),
/*
    1 => array(
      'open' => 1,
      0 => array('', '', '', '', 0),
    ),
*/
  );
}

foreach ($web['menu'] as $p => $c) {
  $text_menu .= '<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table" class="s_"><tr><td width="15" rowspan="3"><input type="hidden" id="menu_'.$p.'" name="menu['.$p.']" value="'.$p.'" />'.$m_name[$p].'</td>';

  $text_menu .= '<td width="50" rowspan="3">';
  if ($web['menu'][$p]['open'] == 1) {
    $menu_open = ' checked="checked"';
    $menu_close = '';
    $menu_hidden = '';
  } elseif ($web['menu'][$p]['open'] == 2) {
    $menu_open = '';
    $menu_close = '';
    $menu_hidden = ' checked="checked"';
  } else {
    $menu_open = '';
    $menu_close = ' checked="checked"';
    $menu_hidden = '';
  }
  $text_menu .= '<input type="radio" class="radio" name="menu_open['.$p.']" value="1"'.$menu_open.' />显示<br /><br /><input type="radio" class="radio" name="menu_open['.$p.']" value="0"'.$menu_close.' />关闭';
  //if ($p == 0) {
  //  $text_menu .= '<br /><br /><span title="鼠标经过显示" onmouseover="sSD(this,event);"><input type="radio" class="radio" name="menu_open['.$p.']" value="2"'.$menu_hidden.' />隐藏</span>';
  //}
  $text_menu .= '</td>';
  unset($menu_open, $menu_close, $menu_hidden);
  unset($web['menu'][$p]['open']);
  $text_menu .= '<td><div class="sli">
<span class="sliin" style="width:70px;"><input type="text" id="menu_name_0_home" name="menu_name[0][home]" style="width:98%;" value="网址导航" readonly="readonly" disabled="disabled" /></span>
<span class="sliin" style="width:70px;"><input type="hidden" id="menu_img_0_home" name="menu_img[0][home]" value="readonly/images/0_home.gif" /><img id="img_0_home" src="readonly/images/0_home.gif" width="16" height="16" title="0_home.gif" /><a class="file_b" onmouseover="addFile(this,\'0\',\'home\');">更改</a></span>
</div></td>';

  $text_menu .= '</tr><tr><td id="base_'.$p.'">';

  foreach ((array)$web['menu'][$p] as $k => $v) {
    if (file_exists('writable/images/menu/'.$p.'_'.$k.'.gif')) {
      $s_img = '<input type="hidden" id="menu_img_'.$p.'_'.$k.'" name="menu_img['.$p.']['.$k.']" value="writable/images/menu/'.$p.'_'.$k.'.gif" /><img id="img_'.$p.'_'.$k.'" src="writable/images/menu/'.$p.'_'.$k.'.gif" width="16" height="16" title="'.$p.'_'.$k.'.gif" /><a class="file_b" onmouseover="addFile(this,\''.$p.'\',\''.$k.'\');">更改</a>';
    } else {
      $s_img = '<input type="hidden" id="menu_img_'.$p.'_'.$k.'" name="menu_img['.$p.']['.$k.']" /><img id="img_'.$p.'_'.$k.'" width="16" height="16" title="'.$p.'_'.$k.'.gif" /><a class="file_b" onmouseover="addFile(this,\''.$p.'\',\''.$k.'\');">上传</a>';
    }
    $text_menu .= '<div id="s_'.$p.'_'.$k.'" class="sli">
<span class="sliin" style="width:70px;"><input type="text" id="menu_name_'.$p.'_'.$k.'" name="menu_name['.$p.']['.$k.']" style="width:98%;" value="'.$v[0].'" /></span>
<span class="sliin" style="width:70px;">'.$s_img.'</span>
<span class="sliin" style="width:285px;"><input type="text" id="menu_url_'.$p.'_'.$k.'" name="menu_url['.$p.']['.$k.']" style="width:98%;" value="'.$v[1].'" /></span>
<span class="sliin" style="width:35px;"><input type="text" id="menu_w_'.$p.'_'.$k.'" name="menu_w['.$p.']['.$k.']" style="width:98%;" value="'.$v[2].'" onblur="'.($p == 0?' if(this.value==\'100%\'){$(\'menu_scroll_'.$p.'_'.$k.'\').checked=false;}':'').'isDigit(this,\''.$v[2].'\',0);" /></span>
<span class="sliin" style="width:35px;"><input type="text" id="menu_h_'.$p.'_'.$k.'" name="menu_h['.$p.']['.$k.']" style="width:98%;" value="'.$v[3].'" onblur="isDigit(this,\''.$v[3].'\',0);" /></span>';
    $v[4] = !isset($v[4])?1:abs($v[4]);
    $text_menu .= '<span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="menu_scroll_'.$p.'_'.$k.'" name="menu_scroll['.$p.']['.$k.']" value="0"'.($v[4]==1?'':' checked="checked"').''.($p == 0?' onclick="if($(\'menu_w_'.$p.'_'.$k.'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'').' />浮现</span>
<a title="删除" href="javascript:void(0)" onclick="delOption(this);return false;">╳</a>
<a title="插入" href="javascript:void(0)" onclick="insertN(this,\''.$p.'\');return false;">↖</a>
<a title="上移" href="javascript:void(0)" onclick="upN(this)";return false;>↑</a>
<a title="下移" href="javascript:void(0)" onclick="downN(this);return false;">↓</a><br />

<span class="sliin" style="width:40px;">&nbsp;</span>
<span class="sliin grayword" style="width:100px;">宽屏时备选URL：</span>
<span class="sliin" style="width:285px;"><input type="text" id="b_menu_url_'.$p.'_'.$k.'" name="b_menu_url['.$p.']['.$k.']" style="width:98%;" value="'.$v[5].'"'.(!file_exists('addfunds.php') ? ' onfocus="alert(\'这里商业版才能让填噢\');this.blur();"' : '').' /></span>
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_w_'.$p.'_'.$k.'" name="b_menu_w['.$p.']['.$k.']" style="width:98%;" value="'.$v[6].'" onblur="'.($p == 0?' if(this.value==\'100%\'){$(\'b_menu_scroll_'.$p.'_'.$k.'\').checked=false;}':'').'if($(\'b_menu_url_'.$p.'_'.$k.'\').value!=\'\'){isDigit(this,\''.$v[6].'\',0);}" /></span>
<span class="sliin" style="width:35px;"><input type="text" id="b_menu_h_'.$p.'_'.$k.'" name="b_menu_h['.$p.']['.$k.']" style="width:98%;" value="'.$v[7].'" onblur="if($(\'b_menu_url_'.$p.'_'.$k.'\').value!=\'\'){isDigit(this,\''.$v[7].'\',0);}" /></span>';
    $v[8] = !isset($v[8])?1:abs($v[8]);
    $text_menu .= '<span class="sliin" style="width:45px;"><input type="checkbox" class="checkbox" id="b_menu_scroll_'.$p.'_'.$k.'" name="b_menu_scroll['.$p.']['.$k.']" value="0"'.($v[8]==1?'':' checked="checked"').''.($p == 0?' onclick="if($(\'b_menu_w_'.$p.'_'.$k.'\').value==\'100%\'){alert(\'宽度100%时不应再显示滚动条！隐藏为好\');this.checked=false;}"':'').' />浮现</span>


</div>';
    unset($k, $v, $s_img);
  }
  $text_menu .= '</td></tr><tr><td style="text-align:left"><button type="button" onClick="addN(\''.$p.'\');return false;">新增一栏</button></td></tr></table>';

  unset($p, $c);
}
echo $text_menu;
unset($text_menu);

?>









</div>
<div class="red_err">特别提示：提交前请确定writable/set目录具备写权限，因为要将配置结果写入writable/set/set_menu.php文件</div>
      <button type="submit" onclick="$('mainform').act.value='';" class="send2" style="border:none;">提交设置</button> <input type="checkbox" class="checkbox" id="subt" checked="checked" />在弹出的新页面提交，避免检查出填写错误而导致数据丧失，白写了</br />如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察
</form>
