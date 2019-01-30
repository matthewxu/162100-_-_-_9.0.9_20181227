<?php
require ('authentication_manager.php');
?>
<style>
.note { background-color:#FFFFCC; }
</style>
<script>
function openBlock(o, id) {
  var obj = $(id);
  if (obj != null) {
    if (getStyle(obj, 'display') == 'block') {
      obj.style.display = 'none';
      o.innerHTML = o.innerHTML.replace(/︽/g, '︾');
    } else {
      obj.style.display = 'block';
      o.innerHTML = o.innerHTML.replace(/︾/g, '︽');
    }
  }
}
</script>
<h5 class="list_title"><a href="javascript:void(0)" id="new2" name="new2" onclick="openBlock(this, 'new2_');return false" class="list_title_in">爽洁版模式下的新闻号外管理 ︾</a><a href="index_new.php" target="_blank">预览</a></h5>
<code id="new2_" style="display:none">
<?php
@ require ('writable/extra/inc/set/img.php');
?>
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">边栏 <?php echo $extra['name']; ?><a href="writable/extra/s_news_img.php" target="_blank" style="font-size:12px">预览</a> 采集设置：<br />
<input type="radio" class="radio" name="extra_open" value="1"<?php echo $extra['open']==1?' checked="checked"':''; ?> >开启<br />
<input type="radio" class="radio" name="extra_open" value="0"<?php echo $extra['open']!=1?' checked="checked"':''; ?> >关闭</td>
      <td><div id="extra_img" class="note" style="height:120px; overflow:hidden;">
<?php
$text = '';
  $text .= '<b>采集源URL：</b><br />
$extra[\'url\']=<input type="text" name="extra_url" value="'.$extra['url'].'" size="40" /><br />';

  if ((string)$extra['time_step'] == '' || !is_numeric($extra['time_step'])) {
      $p_time = ' checked="checked"';
  } else {
      if ($extra['time_step'] > 0) {
        $p_time1 = ' checked="checked"';
        $p_time_val = abs($extra['time_step']);
        $p_time_key = '';
      } else {
        $p_time0 = ' checked="checked"';
        $p_time_val = '';
        $p_time_key = abs($extra['time_step']);
      }
  }
  $text .= '<b>采集刷新时效：</b><br />
$extra[\'time_step\']=<input type="radio" class="radio" name="p_time" id="p_time_img" value="" onclick="$(\'p_time_key_img\').value=$(\'p_time_val_img\').value=\'\';"'.$p_time.'>采集完后永不刷新<input type="radio" class="radio" name="p_time" id="p_time_img0" value="0" onclick="$(\'p_time_val_img\').value=\'\';"'.$p_time0.'>以每天<input type="text" name="p_time_key" id="p_time_key_img" size="1" value="'.$p_time_key.'" onclick="$(\'p_time_img\').checked=$(\'p_time_img1\').checked=false;$(\'p_time_img0\').checked=true;" onblur="isDigit(this,\''.$p_time_key.'\',1);">时

<input type="radio" class="radio" name="p_time" id="p_time_img1" value="1" onclick="$(\'p_time_key_img\').value=\'\';"'.$p_time1.'>以<input type="text" name="p_time_val" id="p_time_val_img" size="1" value="'.$p_time_val.'" onclick="$(\'p_time_img\').checked=$(\'p_time_img0\').checked=false;$(\'p_time_img1\').checked=true;" onblur="isDigit(this,\''.$p_time_val.'\',0);">分钟间隔

<br />';
  unset($p_time, $p_time1, $p_time_val, $p_time_key, $p_time0);
  $text .= '<b>采集图片生成宽度：</b><br />
$extra[\'w\']=<input type="text" name="extra_w" value="'.$extra['w'].'" onblur="isDigit(this,\''.$extra['w'].'\',0);" size="5" /><br />';
  $text .= '<b>采集图片储存目录：</b><br />
$extra[\'img_d\']=writable/extra/inc/'.$extra['img_d'].'<br />';
  $extra['code_php'] = file_get_contents('writable/extra/inc/code/img.php');
  $extra['code_php'] = str_replace('&', '&amp;', $extra['code_php']);
  $extra['code_php'] = str_replace('<', '&lt;', $extra['code_php']);
  $extra['code_php'] = str_replace('>', '&gt;', $extra['code_php']);
  $text .= '<b>采集运行PHP源码（必须本地测试好，否则会造成该模块崩溃）：</b><br /><div class="greenword">
变量 $news_txt 为抓取的整个网页内容，所有操作以其为基础<br />
变量 $text 为加工后，我们需要的内容，即图片列表组<br />
其中自定义函数 write_file （参见readonly/function/write_file.php）为写入文件<br />
其中自定义函数 run_img_resize （参见readonly/function/run_img_resize.php）为转变图片大小</div>
<textarea name="extra_code_php" rows="5" style="width:99%;">'.$extra['code_php'].'</textarea>';

  $extra['code_css'] = file_get_contents('writable/extra/inc/code/img.css');
  $extra['code_css'] = str_replace('&', '&amp;', $extra['code_css']);
  $extra['code_css'] = str_replace('<', '&lt;', $extra['code_css']);
  $extra['code_css'] = str_replace('>', '&gt;', $extra['code_css']);
  $text .= '<b>相关CSS代码：</b><br />
<textarea name="extra_code_css" rows="5" style="width:99%;">'.$extra['code_css'].'</textarea>';

  $extra['code_js'] = file_get_contents('writable/extra/inc/code/img.js');
  $extra['code_js'] = str_replace('&', '&amp;', $extra['code_js']);
  $extra['code_js'] = str_replace('<', '&lt;', $extra['code_js']);
  $extra['code_js'] = str_replace('>', '&gt;', $extra['code_js']);
  $text .= '<b>相关JS代码：</b><br />
<textarea name="extra_code_js" rows="5" style="width:99%;">'.$extra['code_js'].'</textarea>';


echo $text;
unset($extra);
$text = '';
?>  
  <input type="hidden" name="act" value="img" /></div>
<div id="extra_img_sub" style="display:none;"><button type="submit" class="send2" style="border:none;">提交</button></div>
<div class="note" style=" margin-top:-11px; clear:both;"><a href="javascript:void(0)" onclick="$('extra_img').style.height='auto';$('extra_img_sub').style.display='block';this.parentNode.style.display='none';return false;">展开︾</a></div>

</td>
    </tr>
  </table>
</form>
<?php
@ require ('writable/extra/inc/set/li.php');
?>
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">边栏 <?php echo $extra['name']; ?><a href="writable/extra/s_news_li.php" target="_blank" style="font-size:12px">预览</a> 采集设置：<br />
<input type="radio" class="radio" name="extra_open" value="1"<?php echo $extra['open']==1?' checked="checked"':''; ?> >开启<br />
<input type="radio" class="radio" name="extra_open" value="0"<?php echo $extra['open']!=1?' checked="checked"':''; ?> >关闭</td>
      <td><div id="extra_li" class="note" style="height:120px; overflow:hidden;">
<?php
$text = '';
  $text .= '<b>采集源URL：</b><br />
$extra[\'url\']=<input type="text" name="extra_url" value="'.$extra['url'].'" size="40" /><br />';
  if ((string)$extra['time_step'] == '' || !is_numeric($extra['time_step'])) {
      $p_time = ' checked="checked"';
  } else {
      if ($extra['time_step'] > 0) {
        $p_time1 = ' checked="checked"';
        $p_time_val = abs($extra['time_step']);
        $p_time_key = '';
      } else {
        $p_time0 = ' checked="checked"';
        $p_time_val = '';
        $p_time_key = abs($extra['time_step']);
      }
  }
  $text .= '<b>采集刷新时效：</b><br />
$extra[\'time_step\']=<input type="radio" name="p_time" id="p_time_li" value="" onclick="$(\'p_time_key_li\').value=$(\'p_time_val_li\').value=\'\';"'.$p_time.'>采集完后永不刷新<input type="radio" class="radio" name="p_time" id="p_time_li0" value="0" onclick="$(\'p_time_val_li\').value=\'\';"'.$p_time0.'>以每天<input type="text" name="p_time_key" id="p_time_key_li" size="1" value="'.$p_time_key.'" onclick="$(\'p_time_li\').checked=$(\'p_time_li1\').checked=false;$(\'p_time_li0\').checked=true;" onblur="isDigit(this,\''.$p_time_key.'\',1);">时

<input type="radio" class="radio" name="p_time" id="p_time_li1" value="1" onclick="$(\'p_time_key_li\').value=\'\';"'.$p_time1.'>以<input type="text" name="p_time_val" id="p_time_val_li" size="1" value="'.$p_time_val.'" onclick="$(\'p_time_li\').checked=$(\'p_time_li0\').checked=false;$(\'p_time_li1\').checked=true;" onblur="isDigit(this,\''.$p_time_val.'\',0);">分钟间隔

<br />';
  unset($p_time, $p_time1, $p_time_val, $p_time_key, $p_time0);
  $text .= '<b>预显示内容ID：</b><br />
$extra[\'hot\']=<input type="text" name="extra_hot" value="'.$extra['hot'].'" size="5" /> 抓取的内容中，最前面的希望显示的内容设置一个标签（示例即 id="'.$extra['hot'].'"），预显示该内容，其它内容随鼠标浮到时显示出来；极其建议设置此项，否则内容多时前台加载时可能被撑破<br />';
  $text .= '<b>采集图片储存目录：</b><br />
$extra[\'img_d\']='.$extra['img_d'].'<br />';
  $extra['code_php'] = file_get_contents('writable/extra/inc/code/li.php');
  $extra['code_php'] = str_replace('&', '&amp;', $extra['code_php']);
  $extra['code_php'] = str_replace('<', '&lt;', $extra['code_php']);
  $extra['code_php'] = str_replace('>', '&gt;', $extra['code_php']);

  $text .= '<b>采集运行PHP源码（必须本地测试好，否则会造成该模块崩溃）：</b><br />
<textarea name="extra_code_php" rows="5" style="width:99%;">'.$extra['code_php'].'</textarea>';

  $extra['code_css'] = file_get_contents('writable/extra/inc/code/li.css');
  $extra['code_css'] = str_replace('&', '&amp;', $extra['code_css']);
  $extra['code_css'] = str_replace('<', '&lt;', $extra['code_css']);
  $extra['code_css'] = str_replace('>', '&gt;', $extra['code_css']);
  $text .= '<b>相关CSS代码：</b><br />
<textarea name="extra_code_css" rows="5" style="width:99%;">'.$extra['code_css'].'</textarea>';

  $extra['code_js'] = file_get_contents('writable/extra/inc/code/li.js');
  $extra['code_js'] = str_replace('&', '&amp;', $extra['code_js']);
  $extra['code_js'] = str_replace('<', '&lt;', $extra['code_js']);
  $extra['code_js'] = str_replace('>', '&gt;', $extra['code_js']);
  $text .= '<b>相关JS代码：</b><br />
<textarea name="extra_code_js" rows="5" style="width:99%;">'.$extra['code_js'].'</textarea>';

echo $text;
unset($extra);
unset($text);
?>
  <input type="hidden" name="act" value="li" /></div>
<div id="extra_li_sub" style="display:none;"><button type="submit" class="send2" style="border:none;">提交</button></div>
<div class="note" style=" margin-top:-11px; clear:both;"><a href="javascript:void(0)" onclick="$('extra_li').style.height='auto';$('extra_li_sub').style.display='block';this.parentNode.style.display='none';return false;">展开︾</a></div>

</td>
    </tr>
  </table>
</form>
</code>

<p>&nbsp;</p>
<script type="text/javascript" language="javascript">
<!--
function get_extra360box() {
  var allCheckBox = $('extra_360').getElementsByTagName('span');
  if (allCheckBox != null && allCheckBox.length > 0) {
    for (var i = 0; i < allCheckBox.length; i++) {
      if (i<=5) {
        allCheckBox[i].style.color='red';
      } else {
        allCheckBox[i].style.color='';
      }
    }
  }
}

//排序：链接 向上
function upClass(obj){
  var tar=obj.parentNode;
  var par=$('extra_360');
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
  get_extra360box();
}

//排序：链接 向下
function downClass(obj){
  var tar=obj.parentNode;
  var par=$('extra_360');
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
  get_extra360box();
}


-->
</script>
<h5 class="list_title"><a href="javascript:void(0)" id="menhu" name="menhu" onclick="openBlock(this, 'menhu_');return false" class="list_title_in">360风格模式下的新闻号外管理 ︾</a><a href="index_menhu.php" target="_blank">预览</a></h5>
<code id="menhu_" style="display:none">
<div class="note" style="display:block;">以下内容为采集，可能会随调用的目标网站的改版而失效，如有此情况，请及时到162100.com官方查看，或联系源码作者索要更新。</div>

<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">边栏 猜你爱看：</td>
      <td>

<style type="text/css">
<!--
a.caozuo { text-decoration:none; }
.extra_360_block { width:80px; text-align:center; display:inline-block; *display:inline; *zoom:1; }
-->
</style>
<?php
  //video,yule,sports,money,novel,caipiao,oksina,tour,car,mall,game,ent,tech,flashgame,mobileapp,mili,woman,edu
  $extra_360_arr = array(
    'video' => '视频',
    'yule' => '娱乐',
    'sports' => '体育',
    'money' => '财经',
    'novel' => '小说',
    'caipiao' => '彩票',
    'oksina' => '快言',
    'tour' => '旅游',
    'car' => '汽车',
    'mall' => '购物',
    'game' => '游戏',
    'ent' => '影视',
    'tech' => '科技',
    'flashgame' => '小游戏',
    'mobileapp' => '智能',
    'mili' => '军事',
    'woman' => '女性',
    'edu' => '教育',
  );
  $extra360_side_open = file_exists('writable/extra/inc/code/360side.html') ? 1 : 0;
  $text = '
<div class="note note2">
<input type="radio" class="radio" name="extra360_side_open" value="1"'.($extra360_side_open==1?' checked="checked"':'').'>开启 
<input type="radio" class="radio" name="extra360_side_open" value="0"'.($extra360_side_open==0?' checked="checked"':'').'>关闭
';
if ($extra360_side_open==1) {
  $step = 1;
  $text .= '<br /><b>版块排序（默认初始显示前6条）</b><br /><span class="extra_360_block" style="color:orange;">头条</span><span id="extra_360">';
  if ($extra_360_str = file_get_contents('writable/extra/inc/code/360side.html')) {
    if (preg_match('/data-defaultOrder="([\w\,]+)"/i', $extra_360_str, $m)) {
      $extra_360_arr_ = @explode(',', $m[1]);
      foreach ($extra_360_arr_ as $ch) {
        $ch = trim($ch);
        $text .= '<span class="extra_360_block"'.($step<=6?' style="color:red;"':'').'><a class="caozuo" href="javascript:void(0);" title="前移" onclick="upClass(this);return false;">↖</a><input type="hidden" name="extra_360_ch[]" value="'.$ch.'" /> '.$extra_360_arr[$ch].'<a class="caozuo" href="javascript:void(0);" title="后移" onclick="downClass(this);return false;">↘</a></span>';
        $step++;
      }
    }
  }
  $text .= '</span>';
}
  unset($extra360_side_open);
  $text .= '</div>';
  echo $text;
  unset($text, $step, $extra_360_arr, $extra_360_arr_, $ch, $m);

?>


<div><button type="submit" class="send2" style="border:none;">提交</button></div>

</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="360side" />
</form>
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">中部 快资讯：</td>
      <td>
<?php
  $extra360_middle_open = file_exists('writable/extra/inc/code/360middle.html') ? 1 : 0;
  $text = '
<div class="note note2">
<input type="radio" class="radio" name="extra360_middle_open" value="1"'.($extra360_middle_open==1?' checked="checked"':'').'>开启 
<input type="radio" class="radio" name="extra360_middle_open" value="0"'.($extra360_middle_open==0?' checked="checked"':'').'>关闭
</div>';
  echo $text;
  unset($text, $extra360_middle_open);

?>
<div><button type="submit" class="send2" style="border:none;">提交</button></div>
</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="360middle" />
</form>
<script type="text/javascript" language="javascript">
<!--
function checkBottomBlock(){
  var step = 0;
  var allCheckBox = document.getElementsByName('extra360_bottom[]');
  if (allCheckBox != null && allCheckBox.length > 0) {
    for (var i = 0; i < allCheckBox.length; i++) {
      if (allCheckBox[i].checked == false) {
        step++;
      }
    }
  }
  if (step == 8) {
    if (confirm('你的选择是全部关闭，是么')) {
      return true;
    } else {
      return false;
    }
  }
  return true;
}


-->
</script>
<form action="?post=extra" method="post" target="_blank" onsubmit="return checkBottomBlock();">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">底部 娱乐头条、看视频等：</td>
      <td>
<?php
$float_arr = array(
'service-relax'=>'娱乐',
'service-video'=>'视频',
'service-gouwu'=>'购物',
'service-youxi'=>'游戏',
'service-live'=>'直播',
'localcity'=>'生活',
'service-licai'=>'理财',
'info-flow'=>'信息流',
);

$text = '<div class="note note2">';
foreach ($float_arr as $key => $block) {
  $text .= '<input type="checkbox" class="checkbox" name="extra360_bottom[]" value="'.$key.'"'.(file_exists('writable/extra/inc/code/360bottom_block_'.$key.'')?' checked="checked"':'').'>'.$block.' ';
}
$text .= '</div>';
echo $text;
unset($text, $float_arr, $key, $block);

?>
<div><button type="submit" class="send2" style="border:none;">提交</button></div>
</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="360bottom" />
</form>
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">左边缝 活动条：</td>
      <td>
<?php
$extra360_left_open = file_exists('writable/extra/inc/code/360left.html') ? 1 : 0;
$text = '<div class="note note2">';
$text .= '<input type="radio" class="radio" name="extra360_left_open" value="1"'.($extra360_left_open==1?' checked="checked"':'').'>开启 
<input type="radio" class="radio" name="extra360_left_open" value="0"'.($extra360_left_open==0?' checked="checked"':'').'>关闭';
$text .= '</div>';
echo $text;
unset($text, $float_arr, $key, $block);

?>
<div><button type="submit" class="send2" style="border:none;">提交</button></div>
</td>
    </tr>
  </table>
  <input type="hidden" name="act" value="360left" />
</form>
</code>
<p>&nbsp;</p>

<h5 class="list_title"><a href="javascript:void(0)" id="shouji" name="shouji" onclick="openBlock(this, 'shouji_');return false" class="list_title_in">边栏手机充值 ︾</a></h5>
<code id="shouji_" style="display:none">
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">手机充值：</td>
      <td><div class="note note2">
<?php
if (file_exists('writable/require/chongzhi.txt')) {
  echo '<input type="radio" class="radio" name="chongzhi_open" value="1" checked="checked" />已安装（注：淘宝联盟的可能要在联盟注册的域名中才能正常显示 <a href="?get=modify&otherfile='.get_en_url('writable/require/chongzhi.txt').'">编辑手机充值代码</a>）<br />
<input type="radio" class="radio" name="chongzhi_open" value="0" />卸载';
} else {
  echo '<input type="radio" class="radio" name="chongzhi_open" value="0" checked="checked" />未安装<br />
<input type="radio" class="radio" name="chongzhi_open" value="1" />安装（注：淘宝联盟的可能要在联盟注册的域名中才能正常显示 <a href="?get=modify&otherfile='.get_en_url('readonly/require/chongzhi.txt').'">编辑手机充值代码</a>）';
}
?></div>
<div><button type="submit" class="send2" style="border:none;">提交</button></div></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="chongzhi" />
</form>
</code>
<p>&nbsp;</p>

<h5 class="list_title"><a href="javascript:void(0)" id="newsite" name="newsite" onclick="openBlock(this, 'newsite_');return false" class="list_title_in">边栏新录网站开关 ︾</a></h5>
<code id="newsite_" style="display:none">
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">边栏新录网站开关：</td>
      <td><?php
echo file_exists('readonly/require/newsite.php') ? '<div class="note note2">'.(file_exists('writable/require/newsite.php') ? '<input type="radio" class="radio" name="newsite" value="1" checked="checked" />已安装<br /><input type="radio" class="radio" name="newsite" value="0" />卸载' : '<input type="radio" class="radio" name="newsite" value="0" checked="checked" />未安装<br />
<input type="radio" class="radio" name="newsite" value="1" />安装').'</div>' : '<span class="redword">该版本未安装</span>[欲安装请联系作者定制]'; ?>
<div><button type="submit" class="send2" style="border:none;">提交</button></div></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="newsite" />
</form>
</code>
<p>&nbsp;</p>

<h5 class="list_title"><a href="javascript:void(0)" id="newinfo" name="newinfo" onclick="openBlock(this, 'newinfo_');return false" class="list_title_in">边栏信息窗开关 ︾</a></h5>
<code id="newinfo_" style="display:none">
<form action="?post=extra" method="post" target="_blank">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="200" align="center">边栏信息窗开关：</td>
      <td><?php
echo file_exists('readonly/require/newinfo.php') ? '<div class="note note2">'.(file_exists('writable/require/newinfo.php') ? '<input type="radio" class="radio" name="newinfo" value="1" checked="checked" />已安装：<br />
　　信息窗列表调用文件的URL：<input type="text" name="newinfo_url[0]" value="'.$web['newinfo_url'][0].'" size="50" maxlength="" /><br />
　　信息窗“我要发布”的URL：<input type="text" name="newinfo_url[1]" value="'.$web['newinfo_url'][1].'" size="50" maxlength="" /><br />

<input type="radio" class="radio" name="newinfo" value="0" />卸载' : '<input type="radio" class="radio" name="newinfo" value="0" checked="checked" />未安装<br />
<input type="radio" class="radio" name="newinfo" value="1" />安装：<br />
信息窗列表调用文件的URL：<input type="text" name="newinfo_url[0]" value="'.$web['newinfo_url'][0].'" size="50" maxlength="" /><br />
信息窗“我要发布”的URL：<input type="text" name="newinfo_url[1]" value="'.$web['newinfo_url'][1].'" size="50" maxlength="" />
').'<br />还没有自己的信息发布系统？点击<a href="http://www.162100.com/down/#162100FIA" target="_blank">下载162100论坛/信息/文章三合一系统</a><div  class="redword" style="font-size:12px; line-height:normal;">注意：<br />
添加信息窗地址最好填写绝对网址，如“http://info.162100.com/接口文件”。前提是此路径下安装了“162100论坛/信息/文章三合一系统”或者“别的程序系统”，否则系统出错。默认调用官方的。</div></div>' : '<span class="redword">该版本未安装</span>[欲安装请联系作者定制]'; ?>
<div><button type="submit" class="send2" style="border:none;">提交</button></div></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="newinfo" />
</form>
</code>


<script>
if (from = location.href.toString().match(/\#(\w+)/)) {
  if ($(from[1])!=null){
    location.href='#'+from[1];
    openBlock($(from[1]), from[1]+'_');
  }
}
</script>


