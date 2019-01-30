<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类设置
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
//过滤主题
function filter1($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = str_replace('"', '&quot;', $text);
  $text = str_replace('\'', '&#039;', $text);
  $text = str_replace('<', '&lt;', $text);
  $text = str_replace('>', '&gt;', $text);
  $text = preg_replace('/[\s\r\n]+|&nbsp;|　/i', '', $text);
  return $text;
}

function get360bottom($arr) {

$float_arr = array(
'service-relax'=>'<li> <a href="#service-relax" target="_self" class="PageNavigator" data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p0.ssl.qhimg.com/t01139d8882536ccc88.png" /></ins> <span>娱乐</span> </a> </li>',
'service-video'=>'<li> <a href="#service-video"  target="_self" class="PageNavigator"  data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p1.ssl.qhimg.com/t01a472755aac62783f.png" /></ins> <span>视频</span> </a> </li>',
'service-gouwu'=>'<li> <a href="#service-gouwu" target="_self" class="PageNavigator " data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p1.ssl.qhimg.com/t010c65bb8f97c3ea7c.png" /></ins> <span>购物</span> </a> </li>',
'service-youxi'=>'<li> <a href="#service-youxi" target="_self" class="PageNavigator " data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p1.ssl.qhimg.com/t0114a1d8633a68e695.png" /></ins> <span>游戏</span> </a> </li>',
'service-live'=>'<li> <a href="#service-live"  target="_self" class="PageNavigator"  data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p1.ssl.qhimg.com/t01a472755aac62783f.png" /></ins> <span>直播</span> </a> </li>',
'localcity'=>'<li> <a href="#localcity" target="_self" class="PageNavigator" data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p1.ssl.qhimg.com/t01d2222813b8c56211.png" /></ins> <span>生活</span> </a> </li>',
'service-licai'=>'<li> <a href="#service-licai" target="_self" class="PageNavigator" data-activetab="1" data-jss="threshold:0"> <ins><img src="https://p0.ssl.qhimg.com/t01b0e4edcd8abf2ffe.png" /></ins> <span>理财</span> </a> </li>',
'info-flow'=>'<li> <a href="#info-flow" target="_self" class="PageNavigator" data-activetab="1" data-jss="threshold:0"> 信息流 </a> </li>',
);

if (count($arr) == 0) {
  $text = '
<div id="doc-main" class="container" style="display:none;">
<div id="service-relax" class="service-panel gmodule g-box" data-cate="yuletoutiao">
</div>
<div id="service-video" class="service-panel gmodule g-box" data-cate="video">
</div>
<div id="service-gouwu" class="service-panel gmodule g-box" data-cate="gouwu">
</div>
<div id="service-youxi" class="service-panel gmodule g-box" data-cate="youxi">
</div>
<div id="service-live" class="service-panel gmodule g-box" data-cate="live">
</div>
<div id="localcity" class="gmodule g-box" data-cate="localcity"> 
</div>
<div id="service-licai" class="service-panel gmodule g-box" data-cate="licai">
</div>       
<div class="gmodule g-box" id="info-flow" data-cate="info-flow">
</div>
            <div class="front-view" id="doc-main-front"></div>
</div>
';
  if (count($float_arr) > 0) {
    foreach (array_keys($float_arr) as $key) {
      if (file_exists('writable/extra/inc/code/360bottom_block_'.$key.'')) {
        rename('writable/extra/inc/code/360bottom_block_'.$key.'', 'writable/extra/inc/code/360bottom_block_'.$key.'.mode');
      }
    }
  }

} else {

  $float_txt = '';
  $text = '<div id="doc-main" class="container">';
  foreach ($arr as $key) {
    $float_txt .= $float_arr[$key];
    if (file_exists('writable/extra/inc/code/360bottom_block_'.$key.'')) {
      $text .= file_get_contents('writable/extra/inc/code/360bottom_block_'.$key.'');
    } else {
      if (file_exists('writable/extra/inc/code/360bottom_block_'.$key.'.mode')) {
        $text .= file_get_contents('writable/extra/inc/code/360bottom_block_'.$key.'.mode');
        rename('writable/extra/inc/code/360bottom_block_'.$key.'.mode', 'writable/extra/inc/code/360bottom_block_'.$key.'');
      }
    }
    unset($float_arr[$key]);
    unset($key);
  }
  if (count($float_arr) > 0) {
    foreach (array_keys($float_arr) as $key) {
      $text .= '<div id="'.$key.'" class="service-panel gmodule g-box" data-cate="'.$key.'" style="display:none;"></div>';
      if (file_exists('writable/extra/inc/code/360bottom_block_'.$key.'')) {
        rename('writable/extra/inc/code/360bottom_block_'.$key.'', 'writable/extra/inc/code/360bottom_block_'.$key.'.mode');
      }
    }
  }
  $text .= '<div class="front-view" id="doc-main-front"></div><div style="height:10px; overflow:hidden; clear:both"></div></div>';
  $text .= '
        <div class="front-view" id="doc-view-front">
<div id="plane" botoffset="100px">
  <ul class="plane-bd">
    '.$float_txt.'
  </ul>
  <div class="plane-ft"> <a href="#" class="PageNavigator" target="_self" id="goTop" title="回顶部" style="display:none">回顶部</a> </div>
</div>
        </div>
';
}




return $text;

}
  @ require ('readonly/function/write_file.php');


if ($_POST['act'] == 'img') {
  require ('writable/extra/inc/set/img.php');
  $extra['name'] = '新闻图片';
  $url = filter1($_POST['extra_url']);
  if ($url == '') {
    err('采集源url不能空！');
  } else {
    $extra['url'] = $url;
  }
  if (!$_POST['extra_w'] || !is_numeric($_POST['extra_w']) || $_POST['extra_w'] <= 0) {
    err('采集图片生成宽度必须大于0！');
  } else {
    $extra['w'] = $_POST['extra_w'];
  }
  if (!isset($_POST['p_time']) || !is_numeric($_POST['p_time']) || (string)$_POST['p_time'] == '') {
    $extra['time_step'] = '';
  } else {
    if ($_POST['p_time'] == 1) {
      if (!abs($_POST['p_time_val']) > 0) {
        err('采集时效若以分钟为间隔必须大于0啊！');
      } else {
        $extra['time_step'] = abs($_POST['p_time_val']);
      }
    } else {
      $_POST['p_time_key'] = abs($_POST['p_time_key']);
      $extra['time_step'] = $_POST['p_time_key'] > 0 ? '-'.$_POST['p_time_key'] : 0;
    }
  }
  $extra['img_d'] = 'img/img';
  $extra['open'] = abs($_POST['extra_open'])==1?1:0;
  $text = '<?php
$extra = '.var_export($extra, true).';
?>';

  write_file('writable/extra/inc/code/img.php', $_POST['extra_code_php']);
  write_file('writable/extra/inc/code/img.css', $_POST['extra_code_css']);
  write_file('writable/extra/inc/code/img.js', $_POST['extra_code_js']);
  write_file('writable/extra/inc/set/img.php', $text);

  if (preg_match('/\$self\s*\=\s*\'(index\_new2?\.php)\'\;/i', @file_get_contents('index.php'))) {
    $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
    write_file('writable/require/browse_reload.txt', $id);
    reset_indexhtml('index.php', 'index.html');
  }
  alert('设置成功！', '?get=extra#new2');


} elseif ($_POST['act'] == 'li') {
  require ('writable/extra/inc/set/li.php');
  $extra['name'] = '新闻摘要';
  $url = filter1($_POST['extra_url']);
  if ($url == '') {
    err('采集源url不能空！');
  } else {
    $extra['url'] = $url;
  }
  if (!empty($_POST['extra_hot']) && !preg_match('/^[\-\w]+$/', $_POST['extra_hot'])) {
    err('预显示标签 只能为字母、数字、中划线和下划线');
  } else {
    $extra['hot'] = $_POST['extra_hot'];
  }
  if (!isset($_POST['p_time']) || !is_numeric($_POST['p_time']) || (string)$_POST['p_time'] == '') {
    $extra['time_step'] = '';
  } else {
    if ($_POST['p_time'] == 1) {
      if (!abs($_POST['p_time_val']) > 0) {
        err('采集时效若以分钟为间隔必须大于0啊！');
      } else {
        $extra['time_step'] = abs($_POST['p_time_val']);
      }
    } else {
      $_POST['p_time_key'] = abs($_POST['p_time_key']);
      $extra['time_step'] = $_POST['p_time_key'] > 0 ? '-'.$_POST['p_time_key'] : 0;
    }
  }
  $extra['img_d'] = 'img/li';
  $extra['open'] = abs($_POST['extra_open'])==1?1:0;
  $text = '<?php
$extra = '.var_export($extra, true).';
?>';

  write_file('writable/extra/inc/code/li.php', $_POST['extra_code_php']);
  write_file('writable/extra/inc/code/li.css', $_POST['extra_code_css']);
  write_file('writable/extra/inc/code/li.js', $_POST['extra_code_js']);
  write_file('writable/extra/inc/set/li.php', $text);

  if (preg_match('/\$self\s*\=\s*\'(index\_new2?\.php)\'\;/i', @file_get_contents('index.php'))) {
    $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
    write_file('writable/require/browse_reload.txt', $id);
    reset_indexhtml('index.php', 'index.html');
  }
  alert('设置成功！', '?get=extra#new2');


} elseif ($_POST['act'] == 'more') {
  require ('writable/extra/inc/set/more.php');
  $extra['name'] = '新闻集锦';
  $url = filter1($_POST['extra_url']);
  if ($url == '') {
    err('采集源url不能空！');
  } else {
    $extra['url'] = $url;
  }
  if (!isset($_POST['p_time']) || !is_numeric($_POST['p_time']) || (string)$_POST['p_time'] == '') {
    $extra['time_step'] = '';
  } else {
    if ($_POST['p_time'] == 1) {
      if (!abs($_POST['p_time_val']) > 0) {
        err('采集时效若以分钟为间隔必须大于0啊！');
      } else {
        $extra['time_step'] = abs($_POST['p_time_val']);
      }
    } else {
      $_POST['p_time_key'] = abs($_POST['p_time_key']);
      $extra['time_step'] = $_POST['p_time_key'] > 0 ? '-'.$_POST['p_time_key'] : 0;
    }
  }
  $extra['pic_copy'] = $_POST['pic_copy'] == 1 ? 1 : 0;
  $extra['img_d'] = $extra['img_d']; //img/more
  $extra['open'] = abs($_POST['extra_open'])==1?1:0;
  $text = '<?php
$extra = '.var_export($extra, true).';
?>';

  write_file('writable/extra/inc/code/more.php', $_POST['extra_code_php']);
  write_file('writable/extra/inc/code/more.css', $_POST['extra_code_css']);
  write_file('writable/extra/inc/code/more.js', $_POST['extra_code_js']);
  write_file('writable/extra/inc/set/more.php', $text);

  if (preg_match('/\$self\s*\=\s*\'(index\_new2?\.php)\'\;/i', @file_get_contents('index.php'))) {
    $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
    write_file('writable/require/browse_reload.txt', $id);
    reset_indexhtml('index.php', 'index.html');
  }
  alert('设置成功！', '?get=extra#new2');


} elseif ($_POST['act'] == '360side') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); </script>');


} elseif ($_POST['act'] == '360middle') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); </script>');


} elseif ($_POST['act'] == '360bottom') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); </script>');

} elseif ($_POST['act'] == '360left') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); </script>');

} elseif ($_POST['act'] == 'chongzhi') {
  $_POST['chongzhi_open'] = isset($_POST['chongzhi_open']) && $_POST['chongzhi_open']==1?1:0;
  if ($_POST['chongzhi_open'] == 1) {
    if (file_exists('writable/require/chongzhi.txt')) {
      err('当前已是安装状态！');
    }
    rename('readonly/require/chongzhi.txt', 'writable/require/chongzhi.txt');
  } else {
    if (!file_exists('writable/require/chongzhi.txt')) {
      err('当前已是未安装状态！');
    }
    unlink('writable/require/chongzhi.txt');
  }

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
  alert('设置成功！', '?get=extra#shouji');

} elseif ($_POST['act'] == 'newsite') {
  if ($_POST['newsite'] == 1) {
    if (!copy('readonly/require/newsite.php', 'writable/require/newsite.php')) {
      err('开启新录网站失败！原因：writable/require/目录无写权限');
    }
  } else {
    @ unlink('writable/require/newsite.php');
  }
  @ require ('writable/set/set_html.php');

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
  alert('设置成功！', '?get=extra#newsite');

} elseif ($_POST['act'] == 'newinfo') {
  if ($_POST['newinfo'] == 1) {
    if (!copy('readonly/require/newinfo.php', 'writable/require/newinfo.php')) {
      err('开启信息窗失败！原因：writable/require/目录无写权限');
    }
  } else {
    @ unlink('writable/require/newinfo.php');
  }
  if (!$text = @file_get_contents('writable/set/set.php')) {
    err('无法读取设置文件！稍候再试！');
  }
  $text = preg_replace('/\$web\[(\'|\")newinfo_url(\'|\")\][^\;]+/', '$web[\'newinfo_url\'] = '.(empty($_POST['newinfo_url'][0]) || empty($_POST['newinfo_url'][1])?'array("http://info.162100.com/get_newinfo_for162100.php", "http://info.162100.com/write.php")':'array("'.filter1(preg_replace('/\/+$/', '', $_POST['newinfo_url'][0])).'","'.filter1(preg_replace('/\/+$/', '', $_POST['newinfo_url'][1])).'")').'', $text);
  write_file('writable/set/set.php', $text);
  @ require ('writable/set/set_html.php');

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
  alert('设置成功！', '?get=extra#newinfo');

} else {
  err('参数错误！');
}


?>