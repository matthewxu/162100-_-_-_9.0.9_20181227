<?php
require ('authentication_manager.php');
?>
<style type="text/css">
<!--
#add_iframe { width:100%; display:none;
 position:fixed !important; position:absolute; top:0; left:0; z-index:999; text-align:center; overflow:hidden;
}
#add_iframe_in { width:880px; background-color:#EFEFEF; padding:10px; text-align:left; }
a.t1{ background-color:#6699FF; font-size:12px; border:1px #666666 solid; color:#FFFFFF; text-decoration:none; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; vertical-align:middle; height:18px; line-height:18px; padding:0 3px; }
button.t2{ background-color:#6699FF; font-weight:normal; letter-spacing:0;  height:24px; line-height:22px; padding:0 3px; }

-->
</style>
<h5 class="list_title"><a class="list_title_in" id="po1" name="po1">首页模式、网站通用风格设置</a></h5>
<iframe id="lastFrame" name="lastFrame" style="display:none;"></iframe>
<form action="?post=style" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">首页模式：</td>
      <td><div class="note">
<?php
$mod_size_arr = array();

if (!(isset($mode_arr) && is_array($mode_arr))) {
  $mode_arr = @glob('index_*.php');
}
if (count($mode_arr) > 0) {
  foreach ($mode_arr as $k => $v) {
    if (file_exists($k)) {
      $mod_size_arr[] = filesize($k);
      echo '<input type="radio" class="radio" id="index_mod_'.$k.'" name="index_mod" value="'.$k.'"'.(filesize('index.php') == filesize($k) ? ' checked' : '').' />
        '.$v.' <span id="index_mod_'.$k.'_1">[<a href="'.$k.'" target="_blank">预览</a> - <a href="http://www.162100.com/'.$k.'" target="_blank">官方预览</a>]</span> [<span id="index_mod_'.$k.'_2"><a href="?post=style&act=indexmode_disabled&id='.urlencode($k).'" target="lastFrame" onclick="this.innerHTML=\'稍候…\';">弃用</a></span>]<br />';
    } else {
      $mod_size_arr[] = filesize('writable/require/'.$k);
      echo '<input type="radio" class="radio" id="index_mod_'.$k.'" name="index_mod" value="'.$k.'"'.(filesize('index.php') == filesize('writable/require/'.$k) ? ' checked' : '').' disabled="disabled" />
        '.$v.' <span id="index_mod_'.$k.'_1"></span> [<span id="index_mod_'.$k.'_2">没启用 <a href="?post=style&act=indexmode_enabled&id='.urlencode($k).'" target="lastFrame" onclick="this.innerHTML=\'稍候…\';">激活</a></span>]<br />';
    }
  }
}
echo !in_array(filesize('index.php'), $mod_size_arr) ? '<b class="redword">模板文件已弃用或破坏！请点选一个模式重新提交修复</b>' : '';

unset($mode_arr, $k, $v, $mod_size_arr);

?>


<span class="grayword">当你希望首页简洁点，不再显示模式切换时，弃用所有模式即可。</span>
        </div></td>
    </tr>
    <tr>
      <td width="200" align="right">左右栏看齐：</td>
      <td><input type="checkbox" class="checkbox" name="parallel" value="1"<?php echo file_exists('writable/js/parallel.js') ? ' checked' : ''; ?> /> 开启（首页左右栏不等高时自动看齐）</td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="indexmode" />
</form>
<p>&nbsp;</p>
<script language="javascript" type="text/javascript">
<!--
function cssAdd() {
  var str_n=prompt('风格名称（如风景、明星…）：','');
  if(str_n){
    if(!/^(\w|-|[\u4E00-\u9FA5])+$/.test(str_n)){
      alert('风格名称请输入汉字、字母、数字、下划线、中划线，尽量别用特殊符号哈');
      return false;
    }
    location.href='webmaster_central.php?post=style&act=css_add&css_title='+encodeURIComponent(str_n)+'';
  }
}
//-->
</script>


<script language="javascript" type="text/javascript">
<!--
function addIframe(css){
  addSubmitSafe();

  par=$('add_iframe');
  par.style.display='block';
  par.innerHTML = document.getElementById('add_iframe_').innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g, '');
  par.innerHTML += '<input type="hidden" name="css_dir" value="'+css+'" />';

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

function styleAdd(form) {
  if(!/^(\w|-|[\u4E00-\u9FA5])+$/.test(form.style_title.value)){
    alert('样式名称请输入汉字、字母、数字、下划线、中划线，尽量别用特殊符号哈');
    form.style_title.value = '';
    return false;
  }
  if(form.uploadfile.value && !form.uploadfile.value.match(/\.(png|gif|jpe?g)$/i)){
    alert('若想上传背景图，只能选png gif jpg jpeg格式！');
    form.uploadfile.value = '';
    return false;
  }
  if(!form.style_base.value){
    alert('蓝本不能空！');
    return false;
  }
  return true;
}

function newCha(o){
  if(o.value && !o.value.match(/\.(png|gif|jpe?g)$/i)){
    alert('若想上传图片，本地图片只能选png gif jpg jpeg格式！');
    o.value='';
    return false;
  }
}

//过滤禁止字符
function chkColor(obj){
  if (obj.value!='' && /^\s*\#[a-zA-Z0-9]{3,6}\s*$/.test(obj.value)){
    $('style_bgcolor-confirm').checked = false;
  } else {
    $('style_bgcolor-confirm').checked = true;
  }
}

//-->
</script>






<form action="?post=style" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">站点默认风格：</td>
      <td><div class="note" id="po3" name="po3"><?php

  $total_style = 0;
  $style_files = array();

  $cssfiles = @glob('readonly/css/*', GLOB_ONLYDIR);
  $css_n = count($cssfiles);

  $css_style_li = '';

  if ($css_n > 0) {
    foreach ($cssfiles as $css) {
      $css = basename($css);
      if ($css == 'jieri') continue; //8.9.9开始 更新公历农历节日原因
      if ($css == 'festival') $festival_set = '[<a href="?get=calendar" class="grayword">节日设置</a>]';
      $css_title = @file_get_contents('readonly/css/'.$css.'/title.txt');
      echo '<div id="css_'.$css.'">
  <b style="color:#9E163F;">'.$css_title.'风格</b><a href="?get=modify&otherfile='.get_en_url('readonly/css/'.$css.'/title.txt').'" title="点击修改风格名称" onmouseover="sSD(this,event);" style="text-decoration:none;"><i>⊥</i></a>'.$festival_set.'：<br />';
      $css_style_li .= '<optgroup label="'.$css_title.'">';
      unset($css_title, $festival_set);
      $style_files[$css] = @glob('readonly/css/'.$css.'/*', GLOB_ONLYDIR);
      $style_n = count($style_files[$css]);
	  if ($style_n > 0) {
	    $total_style += $style_n;
		foreach ($style_files[$css] as $style) {
          $style = basename($style);
          if (file_exists('readonly/css/'.$css.'/'.$style.'/style.css')) {
            $sy1 = '';
            $sy2 = '';
            $sy3 = '';
          } else {
            $sy1 = ' disabled="disabled"';
            $sy2 = '<del class="grayword">';
            $sy3 = '（限商业版）</del>';
          }
          $style_title = @file_get_contents('readonly/css/'.$css.'/'.$style.'/title.txt');
		  echo '<span id="style_'.$css.'/'.$style.'"><input type="radio" class="radio" name="cssfile" value="'.$css.'/'.$style.'"'.('abc'.$web['cssfile'].'abc.' == 'abc'.$css.'/'.$style.'abc.' ? ' checked' : '').''.$sy1.' /> '.$sy2.''.$style_title.''.$sy3.' <a href="?get=modify&otherfile='.get_en_url('readonly/css/'.$css.'/'.$style.'/title.txt').'" title="点击修改样式名称" onmouseover="sSD(this,event);" style="text-decoration:none;"><i>⊥</i></a> <a href="?post=style&act=style_del&id='.urlencode($css.'/'.$style).'&m=1" onclick="if(confirm(\'确定删除此样式么！\')){addSubmitSafe();}else{return false;}" target="lastFrame" title="删除此样式" onmouseover="sSD(this,event);" style="text-decoration:none;">×</a> <a href="?get=modify&otherfile='.get_en_url('readonly/css/'.$css.'/'.$style.'').'" title="编辑管理此样式下的所有文件" onmouseover="sSD(this,event);" style="text-decoration:none;">&raquo;</a></span> ';
          $css_style_li .= '<option value="'.$css.'/'.$style.'">'.$style_title.'</option>';
          unset($style, $sy1, $sy2, $sy3, $style_title);
		}
	  } else {
        echo '该风格系列下没有样式';
	  }
      echo '
  <div style="border-bottom:1px #CECECE dotted;"><a href="javascript:void(0)" onclick="addSubmitSafe();addIframe(\''.$css.'\');return false;" class="t1">此风格下增加样式</a> | <a href="?post=style&act=css_del&id='.urlencode($css).'&m=1" onclick="if(confirm(\'确定删除此样式么！\')){addSubmitSafe();}else{return false;}" class="t1" target="lastFrame">删除此风格系列</a></div>
</div>';
      $css_style_li .= '</optgroup>';
    }
  } else {
    echo '<b>没有风格系列</b>';
  }
  echo '
  <div style="margin-top:10px; margin-bottom:7px;"><button type="button" class="t2" onclick="cssAdd();">增加风格系列</button></div>';

	?>      </div>

</td>
    </tr>
<?php
$cssfiles_jieri = @glob('readonly/css/festival/*', GLOB_ONLYDIR);
if (count($cssfiles_jieri) > 0) {
  if ($f_js = @file_get_contents('writable/js/main.js')) {
    if (preg_match('/\/\* +jieri_style +\*\/(.+)\/\* +\/jieri_style +\*\//isU', $f_js, $m_f_js)) {
      if (preg_match('/if *\(styleDate *\!\= *\'\'\) *\{/', $m_f_js[1])) {
        $s_j_set = 1;
      }
    }
    unset($f_js, $m_f_js);
  }
  echo '
    <tr>
      <td width="200" align="right"><b class="redword">节日壁纸：</b></td>
      <td><input type="checkbox" class="checkbox" name="cssfile_jieri_auto" value="1"'.(isset($s_j_set) && $s_j_set == 1 ? ' checked' : '').' />节日当天自动使用<span class="grayword">（重启浏览器生效）</span></td>
    </tr>
    ';
}
unset($cssfiles_jieri, $s_j_set);
?>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button> 如果发现没有被改动，那十有八九是缓存在作怪，请刷新页面或清除浏览器缓存再观察</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="style" />
</form>


<code id="add_iframe_" style="display:none;">
<!--
  <div id="add_iframe_in"><div align="center"><b>创建样式</b><a href="javascript:void(0)" onclick="$('add_iframe').style.display='none';$('add_iframe').css_dir.value='';delSubmitSafe();" style="float:right">关闭</a></div>
样式名称：<input type="text" size="30" name="style_title" maxlength="45" />（如长城、冬雪…）<br />
以样式：<select name="style_base"><?php echo $css_style_li; unset($css_style_li); ?></select>为蓝本<br />
上传缩略图：<input name="uploadfile2" id="uploadfile2" type="file" class="file" onchange="newCha(this)">（这个应该是必选项）<br />
<input name="imgw" type="hidden" value="120" /><input name="imgh" type="hidden" value="81" /><input name="imgc" type="hidden" value="1" />
上传背景图：<input name="uploadfile" id="uploadfile" type="file" class="file" onchange="newCha(this)">（若无背景图片，可以留空）<br />
背景颜色：<input type="text" size="10" name="style_bgcolor" onpropertychange="chkColor(this)" oninput="chkColor(this)" maxlength="7" />（！要填必须填#ABC012格式）
<input type="checkbox" class="checkbox" name="style_bgcolor-confirm" id="style_bgcolor-confirm" value="1" checked="checked" />随蓝本不动作<br />

字体：<select name="style_font-cn" id="style_font-cn" onchange="if(this.value=='' && $('style_font-en').value==''){$('style_font-confirm').checked=true;}else{$('style_font-confirm').checked=false;}">
<option value="">请选择</option>
<option value="SimSun">宋体</option>
<option value="Microsoft YaHei">微软雅黑</option>
<option value="MingLiU">明柳体</option>
<option value="SimHei">黑体</option>
<option value="Microsoft JhengHei">微软正黑体</option>
<option value="NSimSun">新细柳体</option>
<option value="DFKai-SB">标楷体</option>
<option value="FangSong">仿宋</option>
<option value="KaiTi">楷体</option>
</select><select name="style_font-en" id="style_font-en" onchange="if(this.value=='' && $('style_font-cn').value==''){$('style_font-confirm').checked=true;}else{$('style_font-confirm').checked=false;}">
<option value="">请选择</option>
<option value="tahoma">tahoma</option>
<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
<option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
<option value="Courier New, Courier, monospace">Courier New, Courier, monospace</option>
<option value=" Georgia, Times New Roman, Times, serif"> Georgia, Times New Roman, Times, serif</option>
<option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>
<option value="Geneva, Arial, Helvetica, sans-serif">Geneva, Arial, Helvetica, sans-serif</option>
</select> 
<input type="checkbox" class="checkbox" name="style_font-confirm" id="style_font-confirm" value="1" checked="checked" />随蓝本不动作
<br />
其它详细style，请生成样式后，进入该样式的详细管理编辑区（点击样式后面的“&raquo;”链接），进行代码编辑。
<br />
<center><button type="submit">确定 提交</button></center>
  </div>
    <input type="hidden" name="act" value="style_add" />
-->
</code>
<form action="?post=style" enctype="multipart/form-data" method="post" onsubmit="return styleAdd(this);" id="add_iframe">
</form>



<p>&nbsp;</p>
<h5 class="list_title"><a class="list_title_in" id="po2" name="po2">其它模式设置</a></h5>
<form action="?post=style" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="right">网址链接模式：</td>
      <td>
<div class="note"><b>分类页：</b><br /><input type="radio" class="radio" name="link_type" value="0"<?php echo $web['link_type'] != 1 ? ' checked' : ''; ?> /> 直接链接（即直接外链，示例：<a href="http://www.baidu.com" target="_blank">百度</a>）<br />
<input type="radio" class="radio" name="link_type" value="1"<?php echo $web['link_type'] == 1 ? ' checked' : ''; ?> /> 中转链接（通过export.php?url=链接，即把外链变成内链，有利于增大传出的PR值，示例：<a href="export.php?url=http%3A%2F%2Fwww.baidu.com%2F" target="_blank">百度</a>）<br />
<b>首页：</b><br /><input type="radio" class="radio" name="link_type_i" value="0"<?php echo $web['link_type_i'] != 1 ? ' checked' : ''; ?> /> 直接链接<br />
<input type="radio" class="radio" name="link_type_i" value="1"<?php echo $web['link_type_i'] == 1 ? ' checked' : ''; ?> /> 中转链接</div>
</td>
    </tr>
    <tr>
      <td width="200" align="right">栏目页面网址排列模式：</td>
      <td><a id="httpType" name="httpType"></a><div class="note">0 站名排列（即按网站名称依次排列，<a href="class.php?column_id=homepage&class_id=0&http_type=0" target="_blank">示例</a>）<br />
1 弹窗简介（鼠标经过网址时弹出该站点简介，<a href="class.php?column_id=homepage&class_id=0&http_type=1" target="_blank">示例</a>）<br />
2 详细显示（以流布局详细显示该站点名称、网址、简介，<a href="class.php?column_id=homepage&class_id=0&http_type=2" target="_blank">示例</a>）<br />
<a href="webmaster_central.php?get=area" target="_blank">具体详细请进入各频道、栏目分别设置</a></div></td>
    </tr>
    <tr>
      <td width="200" align="right">关于首页网址弹出简介？</td>
      <td><div class="note"><input type="radio" class="radio" name="d_type" value="0"<?php echo $web['d_type'] != 1 ? ' checked' : ''; ?> /> 弹出相应网址的简介<br />
<input type="radio" class="radio" name="d_type" value="1"<?php echo $web['d_type'] == 1 ? ' checked' : ''; ?> /> 关闭简介<br />
关于栏目页面的网址是否弹出简介，可在上一条[栏目页面网址排列模式]中控制</div></td>
    </tr>
    <tr>
      <td width="200">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" onclick="if(confirm('确定提交吗？！')){addSubmitSafe();return true;}else{return false;}" class="send2" style="border:none;">提交</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="other" />
</form>
