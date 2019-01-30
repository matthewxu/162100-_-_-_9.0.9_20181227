<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; margin-bottom:10px; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
#ad_table td { background-color:#FFFFFF; text-align:center; font-size:14px; }
.s_noset_bg { background:#CCC; }
-->
</style>

<?php

//删除旧版被淘汰的风格
if (file_exists('readonly/css/qq')) {
  require ('readonly/function/deldir.php');
  deldir('readonly/css/qq');
}

$text = $text_ = '';

if (!(isset($web['cssfile']) && !empty($web['cssfile']) && file_exists('readonly/css/'.$web['cssfile']))) {
  $web['cssfile'] = 'default/0';
}
list($cssdir, ) = @explode('/', $web['cssfile']);

if (isset($_COOKIE['myStyle']) && !empty($_COOKIE['myStyle']) && file_exists('readonly/css/'.$_COOKIE['myStyle'])) {
  $myStyle = $_COOKIE['myStyle'];
  list($cssdir_, ) = @explode('/', $_COOKIE['myStyle']);
  $now_style = ' name="'.$_COOKIE['myStyle'].'"><span class="styleIs"><img src="readonly/css/'.$_COOKIE['myStyle'].'/thumb.jpg" /><br />
<div class="styleTile">'.@file_get_contents('readonly/css/'.$cssdir_.'/title.txt').'风格/'.@file_get_contents('readonly/css/'.$_COOKIE['myStyle'].'/title.txt').'</div></span>';
  $back_style = ' href="javascript:void(0)" onclick="try{if($(\'styleIs\')!=null){$(\'styleIs\').id=\'\';}this.id=\'styleIs\';$(\'cssfile\').value=\''.$web['cssfile'].'\';tryStyle(\''.$web['cssfile'].'\');return false;}catch(e){}" title="点击恢复默认风格"';
} else {
  $myStyle = $web['cssfile'];
  $now_style = ' style="background-image:none"><span class="grayword">还未设置呢</span>';
  $back_style = '';
}


if (isset($_GET['style']) && !empty($_GET['style']) && file_exists('readonly/css/'.$_GET['style'])) {
  $style_files = @glob('readonly/css/'.$_GET['style'].'/*', GLOB_ONLYDIR);
  $style_n = count($style_files);
  if ($style_n > 0) {
    foreach ($style_files as $style) {
      if (!file_exists($style.'/style.css')) {
        $style_n--;
        continue;
      }
      $style = basename($style);
      if ('css'.$myStyle == 'css'.$_GET['style'].'/'.$style) {
        $v2 = ' id="styleIs"';
      } else {
        $v2 = '';
      }
      $text_ .= '
<a'.$v2.' class="styleIs" href="javascript:void(0)" onclick="try{if($(\'styleIs\')!=null){$(\'styleIs\').id=\'\';}this.id=\'styleIs\';$(\'cssfile\').value=\''.$_GET['style'].'/'.$style.'\';tryStyle(\''.$_GET['style'].'/'.$style.'\');return false;}catch(e){}"><img src="readonly/css/'.$_GET['style'].'/'.$style.'/thumb.jpg" /><div id="styleTile_'.$_GET['style'].'/'.$style.'" class="styleTile">'.@file_get_contents('readonly/css/'.$_GET['style'].'/'.$style.'/title.txt').'</div></a>
'; // onmouseover="$(\'styleTile_'.$style.'\').style.display=\'block\';" onmouseout="$(\'styleTile_'.$style.'\').style.display=\'none\';"
    }
    $text_ .= '<center style="clear:both; margin-top:10px;"><a href="?get=style" target="_self" style="font-size:12px; color:#666666;">展开全部风格 ︾</a></center>';
  
  } else {
    $text_ .= '该风格系列下没有样式';
  }

  $list_title = '';
  $cssfiles = @glob('readonly/css/*', GLOB_ONLYDIR);
  $css_n = count($cssfiles);
  if ($css_n > 0) {
    $list_title .= '<div class="li_style_title"><h5 class="list_title" style=" margin-bottom:0; border-bottom:none;">';
    foreach ($cssfiles as $css) {
      $css = basename($css);

      if ($css == 'jieri') continue; //8.9.9开始 更新公历农历节日原因

      if ($css == $_GET['style']) {
        $list_title .= '<a class="list_title_in">'.@file_get_contents('readonly/css/'.$css.'/title.txt').'风格系列（'.$style_n.'）</a>';
      } else {
        $list_title .= '<a href="?get=style&style='.$css.'" target="_self">'.@file_get_contents('readonly/css/'.$css.'/title.txt').'风格系列（'.count(@glob('readonly/css/'.$css.'/*', GLOB_ONLYDIR)).'）</a>';
      }
    }
    $list_title .= '</h5></div><div style=" background-color:#FFFFFF; margin-top:-2px; margin-bottom:10px;position:relative; z-index:0; height:1px; overflow:hidden; border-bottom:1px #D8D8D8 solid;"></div>';
  }
} else {
  $total_style = 0;
  $style_files = array();
  $cssfiles = @glob('readonly/css/*', GLOB_ONLYDIR);
  $css_n = count($cssfiles);

  if ($css_n > 0) {
    $text_ .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
    foreach ($cssfiles as $css) {
      $css = basename($css);

      if ($css == 'jieri') continue; //8.9.9开始 更新公历农历节日原因

      $style_files[$css] = @glob('readonly/css/'.$css.'/*', GLOB_ONLYDIR);
      $style_n = count($style_files[$css]);
	  $total_style += $style_n;
      $text_ .= '
 <tr><td width="123" valign="top"><a class="cssIs" href="?get=style&style='.$css.'" target="_self">'.@file_get_contents('readonly/css/'.$css.'/title.txt').'
';
      // onmouseover="$(\'styleTile_'.$style.'\').style.display=\'block\';" onmouseout="$(\'styleTile_'.$style.'\').style.display=\'none\';"

      if ($style_n > 0) {
        $text__ = '';
        foreach ($style_files[$css] as $style) {
          if (!file_exists($style.'/style.css')) {
            $style_n--;
            $total_style--;
            continue;
          }
          $style = basename($style);
          if ('css'.$myStyle == 'css'.$css.'/'.$style) {
            $v2 = ' id="styleIs"';
          } else {
            $v2 = '';
          }

          $text__ .= '
<a'.$v2.' class="styleIs" href="javascript:void(0)" onclick="try{if($(\'styleIs\')!=null){$(\'styleIs\').id=\'\';}this.id=\'styleIs\';$(\'cssfile\').value=\''.$css.'/'.$style.'\';tryStyle(\''.$css.'/'.$style.'\');return false;}catch(e){}"><img src="readonly/css/'.$css.'/'.$style.'/thumb.jpg" /><div id="styleTile_'.$css.'/'.$style.'" class="styleTile">'.@file_get_contents('readonly/css/'.$css.'/'.$style.'/title.txt').'</div></a>
'; // onmouseover="$(\'styleTile_'.$style.'\').style.display=\'block\';" onmouseout="$(\'styleTile_'.$style.'\').style.display=\'none\';"
        }
  
        $text_ .= '（'.$style_n.'）</a></td><td>';

        $text_ .= $text__;
        unset($text__);

      } else {
        $text_ .= '<td>该风格系列下没有样式</td>';
      }


      unset($style_files, $style, $style_n, $v2);
      $text_ .= '
</tr>
';


    }
    $text_ .= '
</table>
';

    unset($cssfiles, $css);
  } else {
    $text_ .= '没有风格系列';
  }
  $list_title = '<div class="note">总计'.$css_n.'种风格系列、'.$total_style.'款样式</div>';
}



$text = '
<table border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th>系统默认风格</th>
    <th>当前所选样式</th>
  </tr>
<tr>
    <td width="50%"><a class="styleIs"'.$back_style.'><img src="readonly/css/'.$web['cssfile'].'/thumb.jpg" /><br />
<div class="styleTile">'.@file_get_contents('readonly/css/'.$cssdir.'/title.txt').'风格/'.@file_get_contents('readonly/css/'.$web['cssfile'].'/title.txt').'</div></a></td>
    <td width="50%" id="nowStyleThumb"'.$now_style.'</td>
</tr>
</table>
    '.$list_title.'
';
?>
<style type="text/css">
<!--
#nowStyleThumb { background-color:#FFF; background-image:url(readonly/images/loading2.gif); background-position:50% 50%; background-repeat:no-repeat; }
a.cssIs { display:inline-block !important; display:inline; zoom:1; text-align:center; color:#333333; text-align:center; text-decoration:none; font-size:12px; border:1px #D8D8D8 solid; background-color:#F4F9FF; border-radius:6px; -moz-border-radius:6px; -webkit-border-radius:6px; padding:0 5px; }
a.cssIs:hover { border:1px #B9D7FC solid; background-color:#F4F9FF; }
.styleIs { width:120px; height:81px; font-size:12px; padding:1px; border:3px #EFEFEF solid; display:inline-block !important; display:inline; zoom:1; position:relative; }
.styleIs:hover { border-color:#FFFF99; }
#styleIs { border:3px #FF9933 solid; }
.styleTile { width:120px; height:16px; line-height: normal; overflow:hidden; /*display:none;*/ position:absolute; top:65px; left:1px; text-align:center; background-color:#000000; color:#FFFFFF; font-size:12px;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity:0.5; opacity:0.5; }
-->
</style>
<div style="display:none"><img src="readonly/images/loading2.gif" /></div>
<script>
function tryStyle(t){
  if(t==$('nowStyleThumb').name){
    alert('当前已是此风格！')
    return;
  }
  if(t=='<?php echo $web['cssfile']; ?>'){
    alert('已恢复系统默认风格')
    setCookie('myStyle', '', -366);
    $('nowStyleThumb').name='<?php echo $web['cssfile']; ?>';
    $('nowStyleThumb').style.backgroundImage='none';
    $('nowStyleThumb').innerHTML='<span class="grayword">还未设置呢</span>';
  } else {
    setCookie('myStyle', t, 365);
    $('nowStyleThumb').name=t;
    $('nowStyleThumb').style.backgroundImage='url(readonly/images/loading2.gif)';
    $('nowStyleThumb').innerHTML='<span class="styleIs"><img src="readonly/css/'+t+'/thumb.jpg" /><br /><div class="styleTile">'+$('styleTile_'+t+'').innerHTML+'</div></span>';
  }
  cssLatestDate = nowVersion && !isNaN(nowVersion) ? '?'+nowVersion+'' : '';
  var parentRightWidth;
  if(parent){
    if(parent!=self){
      if (typeof parent.getBodyW == 'function') {
        parentRightWidth = parent.getBodyW();
        setTimeout(function(){
          if (parentRightWidth != parent.getBodyW()) {
            alert('所选风格宽度与之前有了改变，需要重新载入实现');
            parent.location.reload(true);
          }
        }, 1000);
      }
      if(parent.document.getElementById('my_style')!=null){
        parent.document.getElementById('my_style').href='readonly/css/'+t+'/style.css'+cssLatestDate+'';
      }
    }
    var wide360 = parent.document.getElementById('style360_wide');
    if (wide360 != null) {
      if (wide360.href) {
        wide360.href = '';
      } else {
        wide360.href = 'writable/extra/inc/code/360_wide.css';
      }
    }
  }
  if(document.getElementById('my_style')!=null){
    document.getElementById('my_style').href='readonly/css/'+t+'/style.css'+cssLatestDate+'';
  }
  delete cssLatestDate;

}

</script>
<?php
echo '
<form action="member.php?post=style" method="post" target="_self">
'.$text.$text_.'
<input type="hidden" name="cssfile" id="cssfile" value="'.$myStyle.'" />
<!--center style="clear:both;"><button name="submit" type="submit">保存</button></center-->
</form>';


?>









