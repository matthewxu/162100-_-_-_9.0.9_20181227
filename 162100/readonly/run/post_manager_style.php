<?php
require ('authentication_manager.php');
?>
<?php

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
function copyDir($dirSrc,$dirTo)
{
    if(is_file($dirTo))
    {
        //echo $dirTo . '这不是一个目录';
        return;
    }
    if(!file_exists($dirTo))
    {
        mkdir($dirTo);
    }

    if($handle=opendir($dirSrc))
    {
        while($filename=readdir($handle))
        {
            if($filename!='.' && $filename!='..')
            {
                $subsrcfile=$dirSrc . '/' . $filename;
                $subtofile=$dirTo . '/' . $filename;
                if(is_dir($subsrcfile))
                {
                    copyDir($subsrcfile,$subtofile);//再次递归调用copydir
                }
                if(is_file($subsrcfile))
                {
                    copy($subsrcfile,$subtofile);
                }
            }
        }
        closedir($handle);
    }

}
  @ require ('writable/set/set_html.php');
  @ require ('readonly/function/write_file.php');

if ($_POST['act'] == 'indexmode') {
  if (empty($_POST['index_mod'])) {
    err('模板参数缺失！');
  }
  if (!file_exists($_POST['index_mod'])) {
    err('参数传递的模板不存在！');
  }
  if (!copy($_POST['index_mod'], 'index.php')) {
    err('首页模板设置失败！原因：根目录（index.php文件）无写权限');
  }

  if ($_POST['parallel'] == 1) {
    //if (file_exists('addfunds.php')) {
      copy('readonly/js/parallel.js', 'writable/js/parallel.js');
    //} else {
      //err('此功能对商业用户开放！');
    //}
  } else {
    @unlink('writable/js/parallel.js');
  }

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  reset_indexhtml('index.php', 'index.html');
  alert('首页模式设置成功！', 'webmaster_central.php?get=style#po1');

} elseif ($_POST['act'] == 'style') {
  if (empty($_POST['cssfile'])) {
    $_POST['cssfile'] = 'default/1';
  }
  $style_cookie_unset = '';
  if (isset($_COOKIE['myStyle']) && $_POST['cssfile'] != $_COOKIE['myStyle']) {
    $style_cookie_unset = '<script> document.cookie=\'myStyle=; path=/;\'; </script>';
  }
  if ($_POST['cssfile'] != $web['cssfile']) {
    if ($web['html'] == true) {
      $style_set_unset = '<div style="background-color:#FF6600; color:#FFF;">你对系统风格进行了更改，因为你开启了全静态，为刷新所有静态文件风格样式，请进行<a href="?post=html">一键生成全静态</a>
</div>';
    }
  }
  if (!$text = @file_get_contents('writable/set/set.php')) {
    err('无法读取设置文件！稍候再试！');
  }
  $text = preg_replace('/\$web\[(\'|\")cssfile(\'|\")\][^\;]+/', '$web[\'cssfile\'] = \''.$_POST['cssfile'].'\'', $text);

  write_file('writable/set/set.php', $text);

  $s_j_set = 0;
  if ($f_js = @file_get_contents('writable/js/main.js')) {
    if (preg_match('/\/\* +jieri_style +\*\/(.+)\/\* +\/jieri_style +\*\//isU', $f_js, $m_f_js)) {
      if (preg_match('/if *\(styleDate *\!\= *\'\'\) *\{/', $m_f_js[1])) {
        $s_j_set = 1;
      }
    }
    unset($m_f_js);
    if (abs($_POST['cssfile_jieri_auto']) != $s_j_set) {
      $tmp = array();
      $tmp[0] = '
  if((nowStyle=getCookie(\'myStyle\')) && (/^(default|festival|other)\/\w+$/.test(nowStyle))){
    $(\'my_style\').href=\'readonly/css/\'+nowStyle+\'/style.css\'+cssLatestDate+\'\';
  } else {
    setCookie(\'myStyle\', \'\', -366);
  }
';
      $tmp[1] = '
if (styleDate != \'\') {
  $(\'my_style\').href=\'readonly/css/festival/\'+styleDate+\'/style.css\'+cssLatestDate+\'\';
} else {
'.$tmp[0].'
}
';
      $f_js = preg_replace('/\/\* +jieri_style +\*\/(.+)\/\* +\/jieri_style +\*\//isU', '/* jieri_style */'.$tmp[abs($_POST['cssfile_jieri_auto'])].'/* /jieri_style */', $f_js);
      write_file('writable/js/main.js', $f_js);
      $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
      write_file('writable/require/browse_reload.txt', $id);
      reset_indexhtml('index.php', 'index.html');
    }
  }
  unset($f_js);

  //reset_indexhtml('index.php', 'index.html');

  if (isset($style_set_unset)) {
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
    $SET_RELOAD = 1;
    echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
    @ require ('readonly/run/post_manager_html.php');
    echo '</div>';
  }

  alert('网站风格设置成功！'.$style_cookie_unset, 'webmaster_central.php?get=style#po3');


} elseif ($_POST['act'] == 'other') {
  if ($_POST['link_type'] != $web['link_type']) {
    if ($web['html'] == true) {
      $style_set_unset = '<div style="background-color:#FF6600; color:#FFF;">你对链接模式进行了更改，因为你开启了全静态，为刷新所有静态文件链接模式，请进行<a href="?post=html">一键生成全静态</a>
</div>';
    }
  }
  if (!$text = @file_get_contents('writable/set/set.php')) {
    err('无法读取设置文件！稍候再试！');
  }
  $text = preg_replace('/\$web\[(\'|\")link_type(\'|\")\].+\$web\[(\'|\")d_type(\'|\")\][^\;]+;/sU', '$web[\'link_type\'] = '.($_POST['link_type'] != 1 ? 0 : 1).';
$web[\'link_type_i\'] = '.($_POST['link_type_i'] != 1 ? 0 : 1).';
$web[\'d_type\'] = '.($_POST['d_type'] != 1 ? 0 : 1).';', $text);

  write_file('writable/set/set.php', $text);
  //reset_indexhtml('index.php', 'index.html');
  if (isset($style_set_unset)) {
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  $SET_RELOAD = 1;
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';
  }

  alert('设置成功！', 'webmaster_central.php?get=style#po2');


} elseif ($_POST['act'] == 'style_add') {
  @ require ('readonly/function/createdir.php');
  @ require ('readonly/function/pinyin.php');
  if (empty($_POST['style_title']) || !preg_match('/^([^\x00-\x7f]|\w|\-){1,45}$/', $_POST['style_title'])) {
      err('样式名称请用汉字、字母、数字、下划线、中划线组成！长度范围为1-45字符。注：中文占3个字符，其它等占1个。');
  }
  if (empty($_POST['css_dir']) || !file_exists('readonly/css/'.$_POST['css_dir'])) {
      err('风格目录不存在！请增加风格系列，先');
  }
  $style_base_ = $_POST['style_base'];
  if (empty($_POST['style_base']) || !file_exists('readonly/css/'.$_POST['style_base'].'/style.css')) {
      if (!file_exists('readonly/default/1/style.css')) {
        err('没有选定或没有合适的样式蓝本！');
      }
      $style_base_ = 'default/1';
  }
  $style_dir = pinyin($_POST['style_title']);
  if (file_exists('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'')) {
      err('该风格已存在！');
  }
  if (!(is_array($_FILES['uploadfile2']) && $_FILES['uploadfile2']['size'])) {
      err('必须上传样式缩略图！');
  }

  //最大上传尺寸
  $max_size = 1024*1024;

  if ($_FILES['uploadfile2']['size'] > $max_size) {
    err('提示：上传的缩略图请小于'.($max_size/1024/1024).'MB。');
  }
  if (!preg_match('/\.(gif|jpg|png)$/i', $_FILES['uploadfile2']['name'], $im)) {
    err('提示：上传缩略图请选择一个有效的文件：允许的格式有（gif|jpg|png）。');
  }


  //if (createdir('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'')) {
      copyDir('readonly/css/'.$style_base_, 'readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'');
      write_file('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/title.txt', $_POST['style_title']);

  @ require ('readonly/function/img.php');

  $upload_filename = 'thumb.jpg';
  if (strtolower($im[1]) != 'jpg') {
    $upload_filename = typeto('thumb.'.strtolower($im[1]).'', 'jpg');
  }
  if (@move_uploaded_file($_FILES['uploadfile2']['tmp_name'], 'readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/'.$upload_filename)) {
    run_img_resize('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/'.$upload_filename, 'readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/'.$upload_filename, 0, 0, $_POST['imgw'], $_POST['imgh'], 0, 0, 80, $_POST['imgc']);
  } else {
    $err .= '（提示：上传缩略图出现错误！请稍候再试）';
  }
  unset($im, $upload_filename);


$upload_bg = '';

if (is_array($_FILES['uploadfile']) && $_FILES['uploadfile']['size']) {

  if ($_FILES['uploadfile']['size'] > $max_size) {
    err('提示：上传的背景图请小于'.($max_size/1024/1024).'MB。');
  }
  if (!preg_match('/\.(gif|jpg|png)$/i', $_FILES['uploadfile']['name'], $im)) {
    err('提示：上传背景图请选择一个有效的文件：允许的格式有（gif|jpg|png）。');
  }
  $upload_filename = 'body.jpg';
  if (strtolower($im[1]) != 'jpg') {
    $upload_filename = typeto('body.'.strtolower($im[1]).'', 'jpg');
  }
  if (@move_uploaded_file($_FILES['uploadfile']['tmp_name'], 'readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/'.$upload_filename)) {
    $upload_bg = ' url(body.jpg) 50% 0 no-repeat';
  } else {
    $err .= '（提示：上传背景图出现错误！请稍候再试）';
  }
}

  $ouno = false;
  $style_t = @file_get_contents('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/style.css');
  if (!empty($_POST['style_bgcolor']) && preg_match('/^\s*\#[a-zA-Z0-9]{3,6}\s*$/', $_POST['style_bgcolor']) && $_POST['style_bgcolor-confirm'] != 1 ) {
    $style_t = preg_replace('/html\s*\{\s*background[^\}]*\}/isU', '', $style_t);
    $style_t .= 'html { background:'.$_POST['style_bgcolor'].''.$upload_bg.' !important; }';
    $ouno = true;
  }
  if ((!empty($_POST['style_font-cn']) || !empty($_POST['style_font-en'])) && $_POST['style_font-confirm'] != 1 ) {
    $style_t = preg_replace('/body\s*\{\s*font-family\s*\:.*\}/isU', '', $style_t);
    $style_t .= 'body { font-family:'.trim($_POST['style_font-cn'].','.$_POST['style_font-en'], ' ,').' !important; }';
    $ouno = true;
  }
  if ($ouno == true) {
      write_file('readonly/css/'.$_POST['css_dir'].'/'.$style_dir.'/style.css', $style_t);
      unset($style_t);
  }




    //} else {
    //  err('创建不成功！请稍后再试');
    //}
    alert('执行完毕！'.$err.'', 'webmaster_central.php?get=style#po3');





} else {
  @ require ('readonly/function/deldir.php');
  @ require ('readonly/function/createdir.php');
  @ require ('readonly/function/pinyin.php');
  //$id = preg_replace('/\/+|eval|base64_/i', '', $_GET['id']);
  $id = preg_replace('/eval|base64_/i', '', $_GET['id']);

  if ($_GET['act'] == 'indexmode_disabled') {
    if (file_exists($id) && rename($id, 'writable/require/'.$id)) {
      err('
<script>
try { parent.$("index_mod_'.$id.'").disabled="disabled"; } catch(e){}
try { parent.$("index_mod_'.$id.'_1").innerHTML=""; } catch(e){}
try { parent.$("index_mod_'.$id.'_2").innerHTML="没启用 <a href=\"?post=style&act=indexmode_enabled&id='.$id.'\" target=\"lastFrame\" onclick=\"this.innerHTML=\\\'稍候…\\\';\">激活</a>"; } catch(e){}
</script>');

    } else {
      err('<script> alert("执行失败了！请稍后再试"); </script>');
    }
  } elseif ($_GET['act'] == 'indexmode_enabled') {
    if (file_exists('writable/require/'.$id) && rename('writable/require/'.$id, $id)) {
      err('
<script>
try { parent.$("index_mod_'.$id.'").disabled=""; } catch(e){}
try { parent.$("index_mod_'.$id.'_1").innerHTML="[<a href=\"'.$id.'\" target=\"_blank\">预览</a> - <a href=\"http://www.162100.com/'.$id.'\" target=\"_blank\">官方预览</a>]"; } catch(e){}
try { parent.$("index_mod_'.$id.'_2").innerHTML="<a href=\"?post=style&act=indexmode_disabled&id='.$id.'\" target=\"lastFrame\" onclick=\"this.innerHTML=\\\'稍候…\\\';\">弃用</a>"; } catch(e){}
</script>');

    } else {
      err('<script> alert("执行失败了！请稍后再试"); </script>');
    }
  } elseif ($_GET['act'] == 'css_del') {
    if (file_exists('readonly/css/'.$id)) {
      if (deldir('readonly/css/'.$id)) {
        if ($_GET['m'] == 1) {
          err('
<script>
try { parent.$("css_'.$id.'").style.display="none"; } catch(e){}
try { parent.$("css_'.$id.'").innerHTML=""; } catch(e){}
try { parent.delSubmitSafe(); } catch(e){}
</script>');
        }
      } else {
        err('<script> alert("删除不成功！请稍后再试吧"); </script>');
      }
    }
    alert('执行完毕！', 'webmaster_central.php?get=style#po3');

  } elseif ($_GET['act'] == 'style_del') {
    if (file_exists('readonly/css/'.$id)) {
      if (deldir('readonly/css/'.$id)) {
        if ($_GET['m'] == 1) {
          err('
<script>
try { parent.$("style_'.$id.'").style.display="none"; } catch(e){}
try { parent.$("style_'.$id.'").innerHTML=""; } catch(e){}
try { parent.delSubmitSafe(); } catch(e){}
</script>');
        }
      } else {
        err('<script> alert("删除不成功！请稍后再试吧"); </script>');
      }
    }
    alert('执行完毕！', 'webmaster_central.php?get=style#po3');
  } elseif ($_GET['act'] == 'css_add') {
    if (empty($_GET['css_title']) || !preg_match('/^([^\x00-\x7f]|\w|\-){1,45}$/', $_GET['css_title'])) {
      err('风格名称请用汉字、字母、数字、下划线、中划线组成！长度范围为1-45字符。注：中文占3个字符，其它等占1个。');
    }
    $css_dir = pinyin($_GET['css_title']);
    if (file_exists('readonly/css/'.$css_dir.'')) {
      err('该风格已存在！');
    }
    //if (createdir('readonly/css/'.$css_dir.'')) {
      write_file('readonly/css/'.$css_dir.'/title.txt', $_GET['css_title']);
    //} else {
    //  err('创建不成功！请稍后再试');
    //}
    alert('执行完毕！', 'webmaster_central.php?get=style#po3');

  } else {
    err('参数错误！');
  }
}





?>