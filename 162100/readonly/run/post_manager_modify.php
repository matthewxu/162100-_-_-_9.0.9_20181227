<?php
require ('authentication_manager.php');
?>
<?php

/* 在线修改文件 */
/* 162100源码 - 162100.com */
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

function formatSize($size) { 
    $sizes = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB"); 
    if ($size == 0) {  
        return('n/a');  
    } else { 
      return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);  
    } 
}
function get_filelink($the_path, $file, $filename) {
  $pathfile = get_en_url(ltrim($the_path.'/'.$file, './'));
  $id = urldecode($pathfile);
  $mode = substr(sprintf('%o', fileperms($the_path.'/'.$file)), -4);
  if (is_dir($the_path.'/'.$file)) {
    return '<b class="dir_file_1"><span class="filetype"></span> <a href="?get=modify&otherfile='.$pathfile.'" class="greenword" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b><b class="dir_file_m" style="width:48px;">'.formatSize(filesize($the_path.'/'.$file)).'</b><b class="dir_file_m" style="width:80px;"><span id="'.$id.'_3">'.$mode.'</span><span id="'.$id.'_4"></span>/'.(is_writable($the_path.'/'.$file)?'是':'否').'</b><b class="dir_file_m" style="width:150px;"><a href="?get=modify&otherfile='.$pathfile.'">进入</a>
<a href="?post=modify&act=del&m=1&otherfile='.$pathfile.'" target="lastFrame" onclick="if(!confirm(\'您您您确定删除么！？\')){return false;}">删除</a> 
<a href="javascript:void(0)" onclick="reName(\''.$id.'\',\''.$filename.'\');return false;">重命名</a> <a href="javascript:void(0)" onclick="reMode(\''.$id.'\');return false;">改权限</a></b>';
  }
  $format = strtolower(strrchr($file, '.'));
  $text = '<b class="dir_file_1">';
  switch ($format) {
    case '.jpg' :
    case '.gif' :
    case '.png' :
    $text .= '<span class="filetype imgtype"></span> <a href="'.$the_path.'/'.$file.'" onmouseover="showMenu(this);" target="_blank" id="'.$id.'_1">'.$filename.''.$cf.'</a><span id="'.$id.'_2"></span></b>';
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
  return $text.'<b class="dir_file_m" style="width:48px;">'.formatSize(filesize($the_path.'/'.$file)).'</b><b class="dir_file_m" style="width:80px;"><span id="'.$id.'_3">'.$mode.'</span><span id="'.$id.'_4"></span>/'.(is_writable($the_path.'/'.$file)?'是':'否').'</b><b class="dir_file_m" style="width:150px;">'.$cz.'<a href="?post=modify&act=del&m=1&otherfile='.$pathfile.'" target="lastFrame" onclick="if(!confirm(\'您您您确定删除么！？\')){return false;}">删除</a> <a href="javascript:void(0)" onclick="reName(\''.$id.'\',\''.$filename.'\');return false;">重命名</a> <a href="javascript:void(0)" onclick="reMode(\''.$id.'\');return false;">改权限</a></b><div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div>';
}


if (!empty($_POST['act'])) {
  if ($_POST['act'] != 'newadd_1' && $_POST['act'] != 'newadd_2' && $_POST['act'] != 'rename' && $_POST['act'] != 'remode') {
    err('<script>alert("参数post:act出错！"); setTimeout("location=\"about:blank\";", 1000);</script>参数post:act出错！');
  }
  $dir_ = base64_decode($_POST['dir']);
  if (!empty($dir_) && !file_exists($dir_)) {
    err('<script>alert("参数post:dir出错！"); setTimeout("location=\"about:blank\";", 1000);</script>参数post:dir出错！');
  }
  if (empty($_POST['newadd_file'])) {
    err('<script>alert("所填内容不能为空！"); setTimeout("location=\"about:blank\";", 1000);</script>所填内容不能为空！');
  }
  if ($_POST['act'] == 'remode') {
    $_POST['newadd_file'] = (string)$_POST['newadd_file'];
    if (!preg_match('/^0[0-7]{3}$/', $_POST['newadd_file'])) {
      err('<script>alert("所填内容只能是4位数字！如0644、0755、0777"); setTimeout("location=\"about:blank\";", 1000);</script>所填内容只能是4位数字！如0644、0755、0777');
    }
  } else {
    /*
    if (!preg_match('/^[0-9a-zA-Z\_\-\.]+$/', $_POST['newadd_file'])) {
      err('<script>alert("所填内容只允许输入字母 数字 _ - . "); setTimeout("location=\"about:blank\";", 1000);</script>所填内容只允许输入字母 数字 _ - . ');
    }
    */
  }

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

    $new_filename = $_POST['newadd_file'];
    if (!preg_match('/^[\x00-\x7f]+$/', $new_filename)) {
      if (CHARSET) {
        if(CHARSET!='UTF-8'){
          $new_filename = iconv('UTF-8',CHARSET,$new_filename);
        }
      }
    }

  if ($_POST['act'] == 'newadd_1') {
    if (file_exists($dir_.'/'.$new_filename)) {
      err($_POST['newadd_file'].'已存在！');
    }
    if (!mkdir($dir_.'/'.$new_filename)) {
      err('新建目录失败！');
    }
    //err('新建目录成功！', 'ok');
    alert('新建目录成功！', ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '?get=modify&otherfile='.urlencode($_POST['dir']).''));
  } elseif ($_POST['act'] == 'newadd_2') {
    if (file_exists($dir_.'/'.$new_filename)) {
      err($_POST['newadd_file'].'已存在！');
    }
    if (!touch($dir_.'/'.$new_filename)) {
      err('新建文件失败！');
    }
    //err('新建文件成功！', 'ok');
    alert('新建文件成功！', ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '?get=modify&otherfile='.urlencode($_POST['dir']).''));
  } elseif ($_POST['act'] == 'rename') {
    if (!file_exists($dir_)) {
      err('<script>alert("待更名的目录或文件不存在！无法更名"); setTimeout("location=\"about:blank\";", 1000);</script>待更名的目录或文件不存在！无法更名');
    }


    if (file_exists(dirname($dir_).'/'.$new_filename)) {
      err('<script>alert("'.$_POST['newadd_file'].'已存在！没有变化"); setTimeout("location=\"about:blank\";", 1000);</script>'.$_POST['newadd_file'].'已存在！没有变化');
    }
    if (!rename($dir_, dirname($dir_).'/'.$new_filename)) {
      err('<script>alert("重命名失败！"); setTimeout("location=\"about:blank\";", 1000);</script>重命名失败！');
    }
    if ($_POST['m'] == 1) {
      err('<code id="newadd_4">
<!--'.get_filelink(dirname($dir_), $new_filename, $_POST['newadd_file']).'-->
</code>

  <script>
function loadAlert(){
  var theFile=parent.$("'.$_POST['dir'].'");
  if (theFile!=null) {
    var newDiv=document.createElement("DIV");
    newDiv.id="'.base64_encode(dirname($dir_).'/'.$new_filename).'";
    newDiv.className="dir_files";
    newDiv.innerHTML=$("newadd_4").innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g,"");
    theFile.parentNode.insertBefore(newDiv,theFile);
    theFile.style.display="none";
    setTimeout("location=\"about:blank\";", 1000);
  }
}
if (document.all) {
  window.attachEvent("onload", loadAlert);
} else {
  window.addEventListener("load", loadAlert, false);
};


alert("重命名成功！");
  </script>重命名成功！', 'ok');
    } else {
      alert('重命名成功！', ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '?get=modify&otherfile='.urlencode(base64_encode(dirname($dir_))).''));
    }
  } elseif ($_POST['act'] == 'remode') {
    if (!file_exists($dir_)) {
      err('<script>alert("源目录或文件不存在！"); setTimeout("location=\"about:blank\";", 1000);</script>源目录或文件不存在！');
    }
    $mode = substr(sprintf('%o', fileperms($_POST['dir'])), -4);
    clearstatcache();
    if ($_POST['newadd_file'] == $mode) {
      err('<script>alert("和原权限相同，没有变化！"); setTimeout("location=\"about:blank\";", 1000);</script>和原权限相同，没有变化！');
    }
    unset($mode);
    eval('chmod("'.$dir_.'", '.$_POST['newadd_file'].');');
    $mode = substr(sprintf('%o', fileperms($dir_)), -4);
    if ($mode != $_POST['newadd_file']) {
      err('<script>alert("修改权限失败！"); setTimeout("location=\"about:blank\";", 1000);</script>修改权限失败！');
    }
    if ($_POST['m'] == 1) {
      err('
  <script>
  var theFile_3=parent.$("'.$_POST['dir'].'_3");
  var theFile_4=parent.$("'.$_POST['dir'].'_4");
  if (theFile_3!=null) {
    theFile_3.style.display="";
    theFile_3.innerHTML="'.$_POST['newadd_file'].'";
  }
  if (theFile_4!=null) {
    theFile_4.innerHTML="";
  }
  alert("修改权限成功！");
    setTimeout("location=\"about:blank\";", 1000);
  </script>修改权限成功！', 'ok');
    } else {
      alert('修改权限成功！', ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '?get=modify&otherfile='.urlencode(base64_encode(dirname($dir_))).''));
    }
  }
  die;
}

if (!empty($_GET['act'])) {
  if ($_GET['act'] != 'del') {
    err('<script>alert("参数get:act出错！"); setTimeout("location=\"about:blank\";", 1000);</script>参数get:act出错！');
  }
  if (empty($_GET['otherfile'])) {
    err('<script>alert("文件参数出错！"); setTimeout("location=\"about:blank\";", 1000);</script>文件参数出错！');
  }
  $thefile = base64_decode($_GET['otherfile']);
  if (empty($thefile) || !file_exists($thefile)) {
    err('<script>alert("文件参数出错！可能不存在或已删除"); setTimeout("location=\"about:blank\";", 1000);</script>文件参数出错！可能不存在或已删除');
  }
  @ require ('readonly/function/deldir.php');
  if (deldir($thefile)) {
    if ($_GET['m'] == 1) {
      err('<script>
  var theFile=parent.$("'.$_GET['otherfile'].'");
  if (theFile!=null) {
    theFile.style.display="none";
    theFile.parentNode.removeChild(theFile);
  }
    setTimeout("location=\"about:blank\";", 1000);
  </script>删除成功！', 'ok');
    } else {
      alert('删除成功！', ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '?get=modify&otherfile='.urlencode(base64_encode(dirname($thefile))).''));
    }
  } else {
    err('删除文件失败！');
  }
  die;
}



if (!$_POST['dir']) {
  err('文件参数缺失！');
}
$_POST['dir'] = base64_decode($_POST['dir']);
if (!file_exists($_POST['dir'])) {
  err('文件参数出错！');
}

if ($_POST['dir'] == 'writable/chuchuang/ad_juejinlian.txt') {
  if (!file_exists('addfunds.php')) {
    err('商业版才能修改此项！');
  }
}

if (!get_magic_quotes_gpc()) {
  $_POST['content'] = addslashes($_POST['content']);
}

if (strstr($_POST['dir'], 'writable/require/statistics.txt') || preg_match('/writable\/chuchuang\/ad\_\w+\.txt/i', $_POST['dir'])) {
  @ require ('writable/set/set_html.php');
  if ($web['html'] == true) {
    $style_set_unset = '<div style="background-color:#FF6600; color:#FFF;">因为你开启了全静态，此次更改需要重新全静态，请进行<a href="?post=html">一键生成全静态</a>
</div>';
  }
}

if (!empty($_POST['charset'])) {
  if (strtolower($_POST['charset']) != 'utf-8') {
    if (!function_exists('iconv')) {
      err('你的PHP版本不支持编码转换函数（iconv），无法转换成'.$_POST['charset'].'，请选择手动修改文件吧。');
    } else {
      $_POST['content'] = iconv('utf-8', $_POST['charset'], $_POST['content']);
    }
  }
}

@ require ('readonly/function/write_file.php');
write_file($_POST['dir'], stripslashes($_POST['content']));

/*
  if ($web['html'] == true) {
    $style_set_unset = '<div style="background-color:#FF6600; color:#FFF;">发现系统开启了全静态，如果此次修改的文件被首页调用，请进行<a href="?post=html">一键生成全静态</a>，以便刷新首页
</div>';
  }
*/
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
if (isset($style_set_unset)) {
  $SET_RELOAD = 1;
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';

} else {
  reset_indexhtml('index.php', 'index.html');
}

err('在线修改文件完成！', 'ok');


?>