<?php
require ('authentication_manager.php');
?>
<?php

/* 在线修改文件 */
/* 162100源码 - 162100.com */

$title = '<a class="list_title_in">在线修改文件</a>';

if (file_exists('....charset')) {
  @unlink('....charset');
}
if ($f_chinese = glob('*.charset')) {
  $f_chinese = $f_chinese[0];
}
if (function_exists('mb_detect_encoding')) {
  $cha=mb_detect_encoding($f_chinese, array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
}
define('CHARSET', strtoupper($cha));
unset($f_chinese, $cha);

function get_filename($file) {
  if (preg_match('/^[\x00-\x7f]+$/', $file)) {
    return $file;
  }
  if (CHARSET) {
    if(CHARSET!='UTF-8'){
      $file=iconv(CHARSET,'UTF-8',$file);
    }
  }
  return $file;
}

//遍历
function dirtree($the_path) {
  global $thefile;
  $text_d = $text_f = array();
  $text = '';
  if ($fp = @opendir($the_path)) {
    while (false !== ($file = @readdir($fp))) {
      $cf = '';
      if ($file == '.' || $file == '..') continue;
      if (is_dir($the_path.'/'.$file)) {
/*
        if ($file == 'css')             $cf = '<span class="grayword">（风格文件库）</span>';
		elseif ($file == 'data')        $cf = '<span class="grayword">（数据文件库）</span>';
        elseif ($file == 'run')         $cf = '<span class="grayword">（执行文件库，关键）</span>';
        elseif ($file == 'inc')         $cf = '<span class="grayword">（引用文件库）</span>';
        elseif ($file == 'images' || $file == 'img')      $cf = '<span class="grayword">（图片目录）</span>';
		elseif ($file == 'function')    $cf = '<span class="grayword">（函数文件库，关键）</span>';
        elseif ($file == 'ad')          $cf = '<span class="grayword">（广告文件库）</span>';
        elseif ($file == 'set')         $cf = '<span class="grayword">（配置文件库，关键）</span>';
        elseif ($file == 'writable/__temp__')    $cf = '<span class="grayword">（临时目录，转移空间时可放弃其中数据）</span>';
        elseif ($file == 'writable/__web__')     $cf = '<span class="grayword">（后天生成的文件，如专题的素材存放目录）</span>';
*/
        $filename = get_filename($file);
        $pathfile = get_en_url(ltrim($the_path.'/'.$file, './'));
        $id = urldecode($pathfile);
        $mode = substr(sprintf('%o', fileperms($the_path.'/'.$file)), -4);
        $text_d[$file] = '
<div id="'.$id.'" class="dir_files"><b class="dir_file_1"><span class="filetype"></span> <a href="?get=modify&otherfile='.$pathfile.'" class="greenword" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b><b class="dir_file_m" style="width:60px;">'.formatSize(filesize($the_path.'/'.$file)).'</b><b class="dir_file_m" style="width:80px;"><span id="'.$id.'_3">'.$mode.'</span><span id="'.$id.'_4"></span>/'.(is_writable($the_path.'/'.$file)?'是':'否').'</b><b class="dir_file_m" style="width:150px;"><a href="?get=modify&otherfile='.$pathfile.'">进入</a>
    <a href="?post=modify&act=del&m=1&otherfile='.$pathfile.'" target="lastFrame" onclick="if(!confirm(\'您您您确定删除么！？\')){return false;}">删除</a> 
    <a href="javascript:void(0)" onclick="reName(\''.$id.'\',\''.$filename.'\');return false;">重命名</a> <a href="javascript:void(0)" onclick="reMode(\''.$id.'\');return false;">改权限</a></b>
<div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div></div>';
      }
      if (is_file($the_path.'/'.$file)) {
/*
        if ($file == 'set.php')         $cf = '<span class="grayword">（系统参数文件）</span>';
        elseif ($file == 'set_sql.php') $cf = '<span class="grayword">（数据库参数文件）</span>';
        elseif ($file == 'index.html')   $cf = '<span class="grayword">（静态首页）</span>';
        elseif ($file == 'index.php')   $cf = '<span class="grayword">（动态首页）</span>';
        elseif ($file == 'login.php' || $file == 'login_current.php')   $cf = '<span class="grayword">（登陆页）</span>';
        elseif ($file == 'reg.php' || $file == 'reg_current.php')   $cf = '<span class="grayword">（注册页）</span>';
        elseif ($file == 'member.php' || $file == 'member_current.php')   $cf = '<span class="grayword">（用户控制台首页）</span>';
        elseif ($file == 'webmaster_central.php')   $cf = '<span class="grayword">（管理员控制台首页）</span>';
*/
        $text_f[$file] = ''.get_filetype($the_path, $file, $cf).'';
      }
    }
    @closedir($fp);
  }

  if (is_array($text_d) && count($text_d) > 0) {
    //@ksort($text_d);
    $text .= @implode('', $text_d);
  }
  if (is_array($text_f) && count($text_f) > 0) {
    //@ksort($text_f);
    $text .= @implode('', $text_f);
  }
  
  return '
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th style="text-align:left">
<a class="filetype" href="javascript:void(0)" onclick="addNew(3);return false;" style=" background-position:-112px 0; float:right; margin-left:10px;" title="上传图片"></a>
<a class="filetype" href="javascript:void(0)" onclick="addNew(2);return false;" style=" background-position:-96px 0; float:right; margin-left:10px;" title="新建文件"></a>
<a class="filetype" href="javascript:void(0)" onclick="addNew(1);return false;" style=" background-position:-80px 0; float:right; margin-left:10px;" title="新建目录"></a>
当前目录：'.get_filename($thefile).'<div id="newadd_obj"></div></th>
    <th width="60">大小</th>
    <th width="80">权限/可写</th>
    <th width="150" align="center">操作</th>
  </tr>
</table>
'.($text != '' ? $text : '<div id="'.$id.'" class="dir_files"><b class="dir_file_1">该目录为空</b><div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div></div>').'

';
}
function formatSize($size) { 
    $sizes = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB"); 
    if ($size == 0) {  
        return('n/a');  
    } else { 
      return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);  
    } 
}

function get_filetype($the_path, $file, $cf) {
  $filename = get_filename($file);
  $pathfile = get_en_url(ltrim($the_path.'/'.$file, './'));
  $id = urldecode($pathfile);
  $format = strtolower(strrchr($file, '.'));
  $text = '
<div id="'.$id.'" class="dir_files"><b class="dir_file_1">';
  switch ($format) {
    case '.jpg' :
    case '.gif' :
    case '.png' :
    $text .= '<span class="filetype imgtype"></span> <a href="'.$the_path.'/'.$file.'" onmouseover="showMenu(this);" target="_blank" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2">  </span></b>';
    $cz = '<a href="'.$the_path.'/'.$file.'" target="_blank">查看</a> ';
    break;

    case '.wav' :
    case '.wma' :
    case '.wmv' :
    case '.mid' :
    case '.midi' :
    case '.avi' :
    case '.mp3' :
    case '.mpg' :
    case '.mpeg' :
    case '.asf' :
    case '.asx' :
    case '.mov' :
    case '.rm' :
    case '.rmvb' :
    case '.ram' :
    case '.ra' :
    $text .= '<span class="filetype vtype"></span> <a href="'.$the_path.'/'.$file.'" target="_blank" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b>';
    $cz = '<a href="'.$the_path.'/'.$file.'" target="_blank">查看</a> ';
    break;

    case '.rar' :
    case '.zip' :
    case '.gz' :
    $text .= '<span class="filetype ztype"></span> <a href="?get=modify&otherfile='.$pathfile.'" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b>';
    $cz = '<a href="'.$the_path.'/'.$file.'" target="_blank">下载</a> ';
    break;

    default :
    $text .= '<span class="filetype ftype"></span> <a href="?get=modify&otherfile='.$pathfile.'" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b>';
    $cz = '<a href="?get=modify&otherfile='.$pathfile.'">编辑</a> ';
    break;
  }
  $mode = substr(sprintf('%o', fileperms($the_path.'/'.$file)), -4);
  return $text.'<b class="dir_file_m" style="width:60px;">'.formatSize(filesize($the_path.'/'.$file)).'</b><b class="dir_file_m" style="width:80px;"><span id="'.$id.'_3">'.$mode.'</span><span id="'.$id.'_4"></span>/'.(is_writable($the_path.'/'.$file)?'是':'否').'</b><b class="dir_file_m" style="width:150px;">'.$cz.'<a href="?post=modify&act=del&m=1&otherfile='.$pathfile.'" target="lastFrame" onclick="if(!confirm(\'您您您确定删除么！？\')){return false;}">删除</a> <a href="javascript:void(0)" onclick="reName(\''.$id.'\',\''.$filename.'\');return false;">重命名</a> <a href="javascript:void(0)" onclick="reMode(\''.$id.'\');return false;">改权限</a></b>
<div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div></div>';
}




?>
<script language="javascript" type="text/javascript">
<!--
//过滤禁止字符
function chkWord(id){
  var obj=$(id);
  if(obj.value==''/* || !obj.value.match(/[^0-9a-zA-Z\_\-\.]/)*/){
    alert("所填内容不能为空！");
    return false;
  }
  if(!/^[0-9a-zA-Z\_\-\.]+$/.test(obj.value)){
    if (!confirm('所填内容建议输入字母 数字 _ - . ，不建议含中文，以避免产生错误。确定一定如此么？')) {
      obj.value=obj.value.replace(/[^0-9a-zA-Z\_\-\.]+/g,'');
      return false;
    }
  }
  return true;
}
function chkWord2(id){
  var obj=$('remode_'+id);
  if(obj.value==''){
    alert("所填内容不能为空！");
    return false;
  }
  if(obj.value.toString()==$(id+'_3').innerHTML.toString()){
    alert("没有变化！");
    return false;
  }
  if(!/^0[0-7]{3}$/.test(obj.value)){
    alert("所填内容只能是4位数字！如0644、0755、0777");
    return false;
  }
  return true;
}
function newCha(o){
  if(!o.value.match(/\.(png|gif|jpe?g)$/i)){
    alert('本地图片只能选png gif jpg jpeg格式！');
    o.value='';
    return false;
  }
  if($('imgname').value==''){
    $('imgname').value=o.value.replace(/.*(\/|\\)/,'');
  }
}
//-->
</script>
<script language="javascript" type="text/javascript">
<!--
function reName(id, f){
  var o1=$(id+'_1');
  var o2=$(id+'_2');
  if(o1!=null){
  if(o2!=null&&o2.innerHTML.replace(/[\s\n\r]+/g,'')==''){
    var w=parseInt(o1.offsetWidth)+5;
    o1.style.display='none';
    o2.innerHTML='<form action="?post=modify" method="post" style="display:inline" target="lastFrame" onsubmit="return chkWord(\'rename_'+id+'\')">\
<input type="hidden" name="act" value="rename" />\
<input type="hidden" name="dir" value="'+id+'" />\
<input type="hidden" name="m" value="1" />\
<input name="newadd_file" id="rename_'+id+'" type="text" style="width:180px;" value="'+f+'" />\
    <button type="submit">保存</button> <a href="javascript:void(0)" onclick="$(\''+o2.id+'\').innerHTML=\'\';$(\''+o1.id+'\').style.display=\'\';return false;" class="new_esc" title="取消">×</a>\
</form>';
  }
  }
}
function reMode(id){
  var o3=$(id+'_3');
  var o4=$(id+'_4');
  if(o3!=null){
  if(o4!=null&&o4.innerHTML.replace(/[\s\n\r]+/g,'')==''){
    var mode=o3.innerHTML.toString();
    var w=parseInt(o3.offsetWidth)+5;
    o3.style.display='none';
    o4.innerHTML='<form action="?post=modify" method="post" style="display:inline" target="lastFrame" onsubmit="return chkWord2(\''+id+'\')">\
<input type="hidden" name="act" value="remode" />\
<input type="hidden" name="dir" value="'+id+'" />\
<input type="hidden" name="m" value="1" />\
<input name="newadd_file" id="remode_'+id+'" type="text" style="width:30px;" value="'+mode+'" />\
    <button type="submit">改</button><a href="javascript:void(0)" onclick="$(\''+o4.id+'\').innerHTML=\'\';$(\''+o3.id+'\').style.display=\'\';return false;" class="new_esc" title="取消">×</a>\
</form>';
  }
  }
}

function addNew(i){
  switch(i){
    case 1:
    case 2:
    case 3:
    if(newaddObj=$('newadd_obj')){
      newaddObj.style.display='block';
      newaddObj.innerHTML=$('newadd_'+i+'').innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g, '');
    }else{
      alert('#ID：newadd_obj找不到了！');
    }
    break;
    default:
    alert('命令错！');
    break;
  }
}
function newEsc(id){
    if(newaddObj=$(id)){
      newaddObj.style.display='none';
      newaddObj.innerHTML='';
    }
}
//-->
</script>
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
  if(!/^[0-9a-zA-Z\_\-\.]+$/.test($('imgname').value)){
    alert("图片名称填 字母 数字 _ - . ");
    return false;
  }
/*
  if($('imgdir').value!='' && !/^[0-9a-zA-Z\_\-\/]+$/.test($('imgdir').value)){
    alert("上传目录只允许输入字母、数字、_ - / ，否则留空为根目录");
    return false;
  }
*/
  addSubmitSafe();
  return true;
}
-->
</script>

<script language="javascript" type="text/javascript">
<!--
//调出用户信息弹窗
function showMenu(obj, pic){
  var obj2=obj;
  var win=$("lastDiv");
  if(win!=null){
    //var h=obj.offsetHeight;
    var t=obj2.offsetTop;
    var l=obj2.offsetLeft;
    while(obj2=obj2.offsetParent){
	  //if(obj==document.body) break;
      t+=obj2.offsetTop;
      l+=obj2.offsetLeft;
    }
    win.style.display="block";
    win.style.position="absolute";
    win.style.left=(l+parseInt(obj.offsetWidth))+"px";
    win.style.top=(t+14)+"px";
    win.style.zIndex="10";
    win.innerHTML='<img src="'+obj.href+'" />';
    obj.onmouseout=win.onmouseout=function(){
      win.style.display="none";
      win.innerHTML='正在载入图片预览…';
    }
  }
}
//-->
</script>

<iframe id="lastFrame" name="lastFrame" frameborder="0" style=" display:none;"></iframe>
<div id="lastDiv" style="display:none; background-color:#FFFFFF; border:5px #CCCCCC solid; padding:5px;">正在载入图片预览…</div>
<style type="text/css">
<!--
.dir_files { clear:both; padding-top:2px; padding-bottom:2px; border:1px #D8D8D8 solid; border-top:none; text-align:right; }
.dir_files b { font-weight:normal; }
.dir_files b.dir_file_1 { padding-left:10px; padding-right:10px; float:left; text-align:left; }
.dir_files b.dir_file_1 a { text-decoration:none !important; }
.dir_files b.dir_file_m { font-size:12px; text-align:center; padding-left:10px; padding-right:10px; display:inline-block; *display:inline; *zoom:1; }

.filetype { line-height:normal; display:inline-block; *display:inline; *zoom:1; vertical-align:middle; width:16px; height:16px; overflow:hidden;
background-image:url(readonly/images/filetype.gif); background-repeat:no-repeat; }
.ftype { background-position:-16px 0; }
.imgtype { background-position:-32px 0; }
.vtype { background-position:-48px 0; }
.ztype { background-position:-64px 0; }
#newadd_obj { position:relative; display:none; font-size:12px; margin-top:5px; border-top:1px #D8D8D8 solid; padding-top:5px; text-align:center; font-weight:normal; color:#999999; }
#newadd_obj .new_esc { position:absolute; top:0; right:0 !important; font-size:14px; text-decoration:none; width:16px; height:16px; line-height:16px; border:1px #D8D8D8 solid; text-align:center; }
-->
</style>
<?php
$text = '';
$thefile = base64_decode($_GET['otherfile']);
$thefilename = get_filename($thefile);
switch ($thefile) {
  case 'writable/chuchuang/ad_top_index.txt' :
    $title .= ' &gt; 首页头部广告位';
    break;
  case 'writable/chuchuang/ad_banner_index.txt' :
    $title .= ' &gt; 首页颈部广告位';
    break;
  case 'writable/chuchuang/ad_central.txt' :
    $title .= ' &gt; 首页腰部广告位';
    break;
  case 'writable/chuchuang/ad_side.txt' :
    $title .= ' &gt; 首页边部广告位';
    break;
  case 'writable/chuchuang/ad_bottom_index.txt' :
    $title .= ' &gt; 首页底部广告位';
    break;
  case 'writable/chuchuang/ad_top.txt' :
    $title .= ' &gt; 分类页面头部广告位';
    break;
  case 'writable/chuchuang/ad_banner.txt' :
    $title .= ' &gt; 分类页面颈部广告位';
    break;
  case 'writable/chuchuang/ad_bottom.txt' :
    $title .= ' &gt; 分类页面底部广告位';
    break;
  case NULL :
    $title .= '';
    break;
  default :
    $title .= ' &gt; '.$thefilename.'';
}
?>


<code id="newadd_1">
<!--<form action="?post=modify" method="post" onsubmit="return chkWord('newadd_1_file')">
<input type="hidden" name="act" value="newadd_1" />
<input type="hidden" name="dir" value="<?php echo $_GET['otherfile']; ?>" />
新建目录名：<input name="newadd_file" id="newadd_1_file" type="text" size="20" />
    <button type="submit">创建</button> <a href="javascript:void(0)" onclick="newEsc('newadd_obj');return false;" class="new_esc" title="取消">×</a>
</form>-->
</code>
<code id="newadd_2">
<!--<form action="?post=modify" method="post" onsubmit="return chkWord('newadd_2_file')">
<input type="hidden" name="act" value="newadd_2" />
<input type="hidden" name="dir" value="<?php echo $_GET['otherfile']; ?>" />
新建文件名：<input name="newadd_file" id="newadd_2_file" type="text" size="20" />
    <button type="submit">创建</button> <a href="javascript:void(0)" onclick="newEsc('newadd_obj');return false;" class="new_esc" title="取消">×</a>
</form>-->
</code>
<code id="newadd_3">
<!--<form action="?post=logo" enctype="multipart/form-data" method="post" onsubmit="return chkT(this)" style="text-align:left;">
图片位置：<input name="uploadfile" id="uploadfile" type="file" class="file" onchange="newCha(this)"><br />
图片名称：<input name="imgname" id="imgname" type="text" size="20" /> 填 字母 数字 _ - . <br />
<input name="imgdir" id="imgdir" type="hidden" value="<?php echo $thefile; ?>" />
<button type="submit">上传</button> <a href="javascript:void(0)" onclick="newEsc('newadd_obj');return false;" class="new_esc" title="取消">×</a>
</form>-->
</code>
<h5 class="list_title"><?php echo $title; ?></h5>

<?php
if (!empty($thefile) && file_exists($thefile)) :
  if (is_file($thefile)) {
    $file_contents = @file_get_contents($thefile);
	if (function_exists('mb_detect_encoding')) {
	  $cha = mb_detect_encoding($file_contents, array("UTF-8","GB2312","GBK","BIG-5","ASCII","EUC-CN","CP936"));
	}
    if (!$cha) {
      if(preg_match("/charset[\s\r\n]*=[\s\r\n\'\"]*([\w\-]+)[^\>]*>/i", $file_contents, $m_cha)){
	    $cha = $m_cha[1];
      }
	}
    if (isset($cha) && $cha != "") {
      if(strtolower($cha) != "utf-8"){
        $file_contents = @iconv($cha, "utf-8", $file_contents);
      }
    }

    $file_contents = str_replace('&', '&amp;', $file_contents);
    $file_contents = str_replace('<', '&lt;', $file_contents);
    $file_contents = str_replace('>', '&gt;', $file_contents);
?>

<?php
if (preg_match('/writable\/chuchuang\/ad_/isU', $thefile)) {
  $pac = ' <div class="red_err">广告代码中的图片地址和链接地址尽量不要含ad、ads、adview、gg、pic、cpc、cpm、cpa、guanggao、数字×数字，有的浏览器特别是手机浏览器，会拦截广告，导致显示一片空白（不绝对哈，随你自便）<button type="button" style="background-color:black;" onclick="prevFLTL(\'content\');" title="预览">预览广告</button></div>';
/*
  $pac .= ' <button type="button" style="width:150px;" onclick="$(\'ad_help\').style.display=\'block\';">广告写法示例</button>
<div id="ad_help" style="display:none;font:12px 宋体;line-height:normal;">比如你取来搜狗联盟的代码为：
<blockquote>
  <p>&lt;script type=&quot;text/javascript&quot;&gt; <br />
    var sogou_ad_id=123456; <br />
    var sogou_ad_height=60; <br />
    var sogou_ad_width=960;<br />
  &lt;/script&gt; <br />
  &lt;script language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://images.sohu.com/cs/jsfile/js/c.js&quot;&gt;&lt;/script&gt;</p>
</blockquote>
<p>&nbsp;</p>
<p>因为此广告是.js文件，所以可以直接写成：</p>
<blockquote>
  <p>var sogou_ad_id=123456;<br />
    var sogou_ad_height=60;<br />
    var sogou_ad_width=960;<br />
    document.writeln(\'&lt;sc&#039;+&#039;ri&#039;+&#039;pt language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://images.sohu.com/cs/jsfile/js/c.js&quot;&gt;&lt;/sc&#039;+&#039;ri&#039;+&#039;pt&gt;\');</p>
</blockquote>
<p>或者写成如下，也可以正常显示：</p>
<blockquote>
  <p>document.writeln(\'&lt;sc&#039;+&#039;ri&#039;+&#039;pt type=&quot;text/javascript&quot;&gt;\'); <br />
    document.writeln(\'var sogou_ad_id=123456;\'); <br />
    document.writeln(\'var sogou_ad_height=60;\'); <br />
    document.writeln(\'var sogou_ad_width=960;\');<br />
    document.writeln(\'&lt;/sc&#039;+&#039;ri&#039;+&#039;pt&gt;\'); <br />
    document.writeln(\'&lt;sc&#039;+&#039;ri&#039;+&#039;pt language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://images.sohu.com/cs/jsfile/js/c.js&quot;&gt;&lt;/sc&#039;+&#039;ri&#039;+&#039;pt&gt;\');</p>
</blockquote>
<p>千万注意单、双引号的使用！照猫画虎也不应该弄错吧！否则就是错代码，无法显示广告！</p></div>';
*/
?>



<style type="text/css">
<!--

#toulan { width:100%; display:none;
 position:fixed !important; position:absolute; top:0; left:0; z-index:998; text-align:center; overflow:hidden;
}
#toulan_in { width:880px; background-color:#EFEFEF; padding:10px; text-align:left; }
-->
</style>
<script language="javascript" type="text/javascript">
<!--

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
  w.document.writeln('<html><head></head><body style="background-color:#FFFFFF">');
  w.document.writeln($(obj).value);
  w.document.writeln('</body></html>');
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

-->
</script>

<div id="toulan"><div id="toulan_in"><a style="float:right;" href="javascript:void(0);" onClick="escFLTL();return false;">关闭</a><center><b>预览</b></center><br /><iframe id="toulan_code" name="toulan_code" allowtransparency="true" width="100%" height="480" frameborder="0" marginwidth="0" marginheight="0"></iframe></div></div>


<?php
}
?>
<div class="note">提示：
  <ol>
      <li><b>这实际上是自由代码区，可以实现你想要的任何样式效果。比如添加浮动效果或其它，只要你会CSS+Javascript</b>。</li>
      <li>在此在线修改文件请务必谨慎，这将关系到网站能否正常运行；或本地手动修改该文件，然后上传。</li>
    <li>请准确输入文件路径！！！或点击下面列表依次进行。</li>
  </ol>
</div>

<style type="text/css">
#hanghao { width:42px; background-color:#6699CC; color:#FFFFFF; overflow:hidden; text-align:right; resize:none; }
#content { width:98%; overflow:auto; resize:none; }
</style>
<form action="?post=modify" method="post" id="Zmodifyform" onsubmit="addSubmitSafe()">
  <?php
    if ($thefile != '.') {
      echo (substr_count($thefile,'/')>0) ? '&lt;<a href="?get=modify&otherfile='.get_en_url('.').'">根目录</a>&gt; ' : '';
	  echo '&lt;<a href="?get=modify&otherfile='.get_en_url(dirname($thefile)).'">上级目录</a>&gt;<br />';
    }
  ?>
  <span class="redword">请用代码书写</span> <?php echo $thefilename; ?><?php echo $pac; ?>
<?php
if (preg_match('/\.js$/i', $thefile)) {
  $re_js = '如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察';
  echo '<div class="red_err">此文件为JS文件，请用javascript语言编写，你不会写那就没办法了</div>';
}
?>


<?php echo preg_match('/statistics\.txt/i', $thefile) ? '<div class="red_err">如果后台开启了一键全静态，修改此文件后要重新一键全静态，以便激活所有文件对统计代码的引用）</div>' : ''; ?> <b>代码：</b><br />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ccode">
	<tr>
		<td width="42" valign="top"><textarea id="hanghao" rows="40" disabled></textarea></td>
		<td><div style="width:710px; display:inline-block !important; display:inline; zoom:1;"><textarea name="content" id="content" rows="40" wrap="off" onkeyup="keyUp();"><?php echo $file_contents; ?></textarea></div><br />
<button type="button" style="width:150px;" onclick="toL();" title="延长">↓</button>
<button type="button" style="width:150px;" onclick="toW();" title="加宽" id="toWO">→</button>


</td>
	</tr>
  </table>
  <br />
  程序检测该文件编码为：<input type="text" size="10" name="charset" value="<?php echo $cha; ?>" />
  <input type="hidden" name="dir" value="<?php echo $_GET['otherfile']; ?>" />
  <div class="red_err">特别提示：提交前请确定<?php echo dirname($thefilename); ?>目录具备写权限，因为重写此文件</div>
  <button type="submit" onclick="return confirm('提交吗？请确定无误后再执行');" class="send2" style="border:none;">修改完，提交</button>
<?php
echo $re_js;
?>

</form>
<script language="javascript">

function keyUp(){
	var obj=$("content");
	var str=obj.value;	
	str=str.replace(/\r/gi,"");
	str=str.split("\n");
	n=str.length;
	line(n);
}
function line(n){
    var num="";
	var lineobj=$("hanghao");
	for(var i=1;i<=n;i++){
		num+=i+"\n";
	}
	lineobj.value=num;
	num="";
}
function autoScroll(){
	$("hanghao").scrollTop=$("content").scrollTop;
	setTimeout("autoScroll()",20);
}

if(document.all){
  window.attachEvent('onload',keyUp);
  window.attachEvent('onload',autoScroll);
}else{
  window.addEventListener("load",keyUp,false);
  window.addEventListener("load",autoScroll,false);
}

function toL(){ 
  $('content').rows += 20;
  $('hanghao').rows += 20;
}

function toW(){
  var obj=$('content');
  var oldW=obj.offsetWidth;
  var nowW=obj.scrollWidth;

  newObj=obj;
  if(nowW>oldW){
    obj.parentNode.style.overflow='visible';
    obj.style.width=nowW+'px';
    while(newObj=newObj.offsetParent){
      newObj.parentNode.style.overflow='visible';
    }

    var cc=$('ccode');
    var l=cc.offsetLeft;
    var t=cc.offsetTop;
    while(cc=cc.offsetParent){
      t+=cc.offsetTop;
      l+=cc.offsetLeft;
    }
    document.body.scrollLeft=l;
    window.scrollTo(l,t);

    $('toWO').onclick=function(){toO();};
    $('toWO').title='恢复原宽';
    $('toWO').innerHTML='←';
    
    obj.onblur=function(){
      toO();
    }
  }
}
function toO(){
  var obj=$('content');
  obj.parentNode.style.overflow='hidden';
  obj.style.width='98%';
  $('toWO').onclick=function(){toW();};
  $('toWO').title='加宽';
  $('toWO').innerHTML='→';
}

</script>


<?php
  } else {
    if ($thefile != '.') {
      echo (substr_count($thefile,'/')>0) ? '&lt;<a href="?get=modify&otherfile='.get_en_url('.').'">根目录</a>&gt; ' : '';
	  echo '&lt;<a href="?get=modify&otherfile='.get_en_url(dirname($thefile)).'">上级目录</a>&gt;<br />';
    }
    echo dirtree($thefile ? $thefile : '.');
  }
else:
  echo ''.$thefilename.'不存在！<span class="grayword">如需要，请<a href="?get=modify&otherfile='.get_en_url(dirname($thefile)).'">返回上级目录</a>创建</span>';

endif;

?>
