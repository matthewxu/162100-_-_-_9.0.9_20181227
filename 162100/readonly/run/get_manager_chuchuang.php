<?php
require ('authentication_manager.php');
?>
<?php

/* 管理广告图片 */
/* 162100源码 - 162100.com */

$title = '<a class="list_title_in">管理广告图片</a>';

//遍历
function dirtree($the_path) {
  $text_d = $text_f = array();
  $text = '';
  if ($fp = @opendir($the_path)) {
    while (false !== ($file = @readdir($fp))) {
      $cf = '';
      if ($file == '.' || $file == '..' || $file == 'images' || $file == 'cert') continue;
      if (is_dir($the_path.'/'.$file)) {
        if ($file == 'css')             $cf = '<span class="grayword">（风格文件库）</span>';
		elseif ($file == 'data')        $cf = '<span class="grayword">（数据文件库）</span>';
        elseif ($file == 'run')         $cf = '<span class="grayword">（执行文件库，关键）</span>';
        elseif ($file == 'inc')         $cf = '<span class="grayword">（引用文件库）</span>';
        elseif ($file == 'images')      $cf = '<span class="grayword">（图片目录，不能编辑）</span>';
		elseif ($file == 'function')    $cf = '<span class="grayword">（函数文件库，关键）</span>';
        elseif ($file == 'ad')          $cf = '<span class="grayword">（广告文件库）</span>';
        elseif ($file == 'set')         $cf = '<span class="grayword">（配置文件库，关键）</span>';
        elseif ($file == 'writable/__temp__')    $cf = '<span class="grayword">（临时目录，转移空间时可放弃其中数据）</span>';
        elseif ($file == 'writable/__web__')     $cf = '<span class="grayword">（后天生成的文件，如专题的素材存放目录）</span>';

        $text_d[] = '<a href="?get=modify&otherfile='.get_en_url(ltrim($the_path.'/'.$file, './')).'" class="greenword">目录：'.ltrim($the_path.'/'.$file, './').''.$cf.'</a><br />';
      }
      if (is_file($the_path.'/'.$file)) {
        if ($file == 'set.php')         $cf = '<span class="grayword">（系统参数文件）</span>';
		elseif ($file == 'set_sql.php') $cf = '<span class="grayword">（数据库参数文件）</span>';
        elseif ($file == 'index.html')   $cf = '<span class="grayword">（静态首页）</span>';
        elseif ($file == 'index.php')   $cf = '<span class="grayword">（动态首页）</span>';
        elseif ($file == 'login.php' || $file == 'login_current.php')   $cf = '<span class="grayword">（登陆页）</span>';
        elseif ($file == 'reg.php' || $file == 'reg_current.php')   $cf = '<span class="grayword">（注册页）</span>';
        elseif ($file == 'member.php' || $file == 'member_current.php')   $cf = '<span class="grayword">（用户控制台首页）</span>';
        elseif ($file == 'webmaster_central.php')   $cf = '<span class="grayword">（管理员控制台首页）</span>';
        $text_f[] = '<a href="?get=modify&otherfile='.get_en_url(ltrim($the_path.'/'.$file, './')).'">文件：'.ltrim($the_path.'/'.$file, './').''.$cf.'</a><br />';
      }
    }
    @closedir($fp);
  }

  if (is_array($text_d) && count($text_d) > 0) {
    @natcasesort($text_d);
    $text .= @implode('', $text_d);
  }
  if (is_array($text_f) && count($text_f) > 0) {
    @natcasesort($text_f);
    $text .= @implode('', $text_f);
  }
  
  return $text != '' ? $text : '该目录为空';
}
?>
<?php
$text = '';
$thefile = base64_decode($_GET['otherfile']);
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
    $title .= ' &gt; '.$thefile.'';
}
?>

<h5 class="list_title"><?php echo $title; ?></h5>

<?php
if (!empty($thefile) && file_exists($thefile)) :
  if (is_file($thefile)) {
    $file = @file_get_contents($thefile);
	if (function_exists('mb_detect_encoding')) {
	  $cha = mb_detect_encoding($file, array("UTF-8","GB2312","GBK","BIG-5","ASCII","EUC-CN","CP936"));
	}
    if (!$cha) {
      if(preg_match("/charset[\s\r\n]*=[\s\r\n\'\"]*([\w\-]+)[^\>]*>/i", $file, $m_cha)){
	    $cha = $m_cha[1];
      }
	}
    if (isset($cha) && $cha != "") {
      if(strtolower($cha) != "utf-8"){
        $file = @iconv($cha, "utf-8", $file);
      }
    }

    $file = str_replace('&', '&amp;', $file);
    $file = str_replace('<', '&lt;', $file);
    $file = str_replace('>', '&gt;', $file);
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
  &lt;<a href="?get=modify&otherfile=<?php echo get_en_url(dirname($thefile)); ?>">上级目录</a>&gt;<br />
  <span class="redword">请用代码书写</span> <?php echo $thefile; ?><?php echo $pac; ?>
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
		<td><div style="width:710px; display:inline-block !important; display:inline; zoom:1;"><textarea name="content" id="content" rows="40" wrap="off" onkeyup="keyUp();"><?php echo $file; ?></textarea></div><br />
<button type="button" style="width:150px;" onclick="toL();" title="延长">↓</button>
<button type="button" style="width:150px;" onclick="toW();" title="加宽" id="toWO">→</button>


</td>
	</tr>
  </table>
  <br />
  程序检测该文件编码为：<input type="text" size="10" name="charset" value="<?php echo $cha; ?>" />
  <input type="hidden" name="thefile" value="<?php echo $thefile; ?>" />
  <div class="red_err">特别提示：提交前请确定<?php echo dirname($thefile); ?>目录具备写权限，因为重写此文件</div>
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
    echo ($thefile != '.') ? '&lt;<a href="?get=modify&otherfile='.get_en_url(dirname($thefile)).'">上级目录</a>&gt;<br />' : '';
    echo dirtree($thefile ? $thefile : '.');
  }
else:
  echo ''.$thefile.'不存在！';

endif;

?>
