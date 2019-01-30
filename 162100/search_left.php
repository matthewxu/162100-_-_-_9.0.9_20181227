<?php
@ require('writable/set/set.php');

$_GET['kw'] = preg_replace('/[\"\'\<\>\s\r\n]+/', '', $_GET['kw']);
$_GET['is'] = preg_replace('/[\"\'\<\>\s\r\n]+/', '', $_GET['is']);
@ $_GET = array_map('htmlspecialchars', $_GET);
//@ require ('readonly/function/filter.php');
//$_GET = array_map('filter1', $_GET);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索引擎切换菜单 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<base target="resultFrame" />
<style type="text/css">
<!--
html{}
body{ margin:10px 0px 10px 10px; font-family: Verdana, Arial; white-space:nowrap; font-size:14px; text-align:left; }
form{ margin:0; padding:0; }
img{ border:none; }
ul{ margin:0; padding:0; list-style-position:inside; display:none; line-height:180%; font-size:14px; }
.nav0{ color:#0000CC; line-height:180%; font-weight:bold; text-decoration:underline; cursor:hand; cursor:pointer;}
.nav1{ color:#000000; line-height:180%; font-weight:bold; }
a { color:#7800FF; }
a:hover { color:#FF6600; }
-->
</style>
</head>
<body>
<div><a href="./index_search.php" target="_blank"><img src="readonly/images/logo_search.gif" align="absmiddle" /></a></div><br />
<div style="display:none;">
    <script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
    <script>var defaultBayId='<?php echo $web['search_bar']; ?>';</script>
    <script type="text/javascript" language="javaScript" src="readonly/js/search_h.js?<?php echo filemtime('writable/js/search_h.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="writable/js/search.js?<?php echo filemtime('writable/js/search.js'); ?>"></script>
    <script type="text/javascript" language="javaScript" src="readonly/js/search.js?<?php echo filemtime('readonly/js/search.js'); ?>"></script>
    <script>addsearchBar(search_default_type,search_default_id);</script>
    </div>

<script language="javascript" type="text/javascript">
<!--
var nowModeId='';
var kw='<?php echo $_GET['kw']; ?>';
var is='<?php echo $_GET['is']; ?>';


function ch(objId){
  if(nowModeId==objId) return;
  try{if(nowModeId!=''){$('nav_'+nowModeId+'').style.display='none';
  $(nowModeId).className='nav0';}}catch(err){}
  try{$('nav_'+objId+'').style.display='block';
  $(objId).className='nav1';}catch(err){}
  nowModeId=objId;
}

function fl(par,hrefobj,lastU){
  var linkhref=hrefobj.href;
  if(kw!='' && par==is){
    //if(document.all){
      if(confirm("还要继续搜索初始关键字\n\n"+kw+"\n\n吗？")){
        hrefobj.href=linkhref+encodeURIComponent(kw)+lastU+'';
      }else{
        //hrefobj.href=location.hostname;
        kw='';
      }
	//}else{
      //hrefobj.href=hrefobj.href.replace(/[^=]*$/,'')+kw+lastU+'';
	//}
  }
  return true;
}

if(isArray(searchSelect)){
  for(type in searchSelect){
    document.write('<div id="'+type+'" class="nav0" onclick="ch(this.id)">'+searchSelect[type][0]+'</div>');
    if(isArray(searchSelect[type])){
      document.write('<ul id="nav_'+type+'">');
      for(n in searchSelect[type]){
        if(n==0) continue;
        document.write('  <li><a href="'+searchSelect[type][n][0]+'" onclick="return fl(\''+type+'\',this,\'\')">'+searchSelect[type][n][1]+'</a></li>');
      }
      document.write('</ul>');
    }
  }
}

function getCh(){
  ch(is);
}

if(document.all){
  window.attachEvent('onload',getCh);//对于IE
}else{
  window.addEventListener('load',getCh,false);//对于FireFox
} 

//-->
</script>

</body>
</html>
