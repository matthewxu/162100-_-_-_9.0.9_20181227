<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置
if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}

@ require ('readonly/function/img.php');
@ini_set('max_file_uploads', '100');


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

//print_r($_POST);
if ($_POST['act'] == 'up') {
  if (empty($_POST['up'])) {
    err('<script> alert("参数缺失！[01]"); </script>');
  }
  list($type, $n) = @explode('_', $_POST['up']);

  if ($n == 'home') {
    $up_dir = 'readonly/images';
  } else {
    $up_dir = 'writable/images/menu';
  }

  print_r($_FILES['uploadfile_'.$_POST['up']]);
  if (is_array($_FILES['uploadfile_'.$_POST['up']]) && $_FILES['uploadfile_'.$_POST['up']]['size']) {
    $w = 16;
    $h = 16;
    $img_info = getimagesize($_FILES['uploadfile_'.$_POST['up']]['tmp_name']);
    if ($img_info[0] != $w || $img_info[1] != $h) {
      $bian = 1;
      if (extension_loaded('gd')) {
        if (!function_exists('gd_info')) {
          err('<script> alert("重要提示：你的gd版本很低，图片处理功能可能受到约束"); </script>');
        }
      } else {
        err('<script> alert("重要提示：你尚未加载gd库，图片处理功能可能受到约束"); </script>');
      }
    }

    if (!file_exists($up_dir) && !@mkdir($up_dir)) {
      err('<script> alert("图片无法上传，上传目录'.$up_dir.'不存在"); </script>');
    }
    //@chmod('writable/images/searchmark', 0777);
    eval('@chmod(\''.$up_dir.'\', 0'.$web['chmod'].');');
    $inis = ini_get_all();
    $uploadmax = $inis['upload_max_filesize'];
    if ($_FILES['uploadfile_'.$_POST['up']]['size'] > 30 * 1024) {
      err('<script> alert("图片上传不成功！上传的文件请小于30KB"); </script>');
    }
    if (!preg_match('/\.(jpg|gif|png)$/i', strtolower($_FILES['uploadfile_'.$_POST['up']]['name']), $matches)) {
      err('<script> alert("图片上传不成功！请选择一个有效的文件：允许的格式有（jpg|gif|png）"); </script>');
    }
    if ($fp = @fopen($_FILES['uploadfile_'.$_POST['up']]['tmp_name'], 'rb')) {
      $img_contents = @fread($fp, $_FILES['uploadfile_'.$_POST['up']]['size']);
      @fclose($fp);
    } else {
      $img_contents = @file_get_contents($_FILES['uploadfile_'.$_POST['up']]['tmp_name']);
    }
    if (preg_match('/<\?php|eval|POST|base64_decode|base64_encode/i', $img_contents, $m_err)) {
      err('<script> alert("提示！禁止提交。该文件含有禁止的代码'.str_replace('?', '\?', $m_err[0]).'"); </script>');
    }

    $im = ''.$up_dir.'/'.$type.'_'.$n.'.'.$matches[1];

    if (@move_uploaded_file($_FILES['uploadfile_'.$_POST['up']]['tmp_name'], $im)) {

      if (isset($bian)) {
        if (!run_img_resize($im, $im, 0, 0, $w, $h, false, false, $web['pic_quality'])) {
          err('<script> alert("截图失败！"); </script>');
        }
      }
      $im = typeto($im, 'gif');

      err('<script>
try{
  parent.$("menu_img_'.$_POST['up'].'").value="'.$im.'";
  parent.$("img_'.$_POST['up'].'").src="'.$im.'?'.time().'";
}catch(e){}

alert("图片上传成功！（如图片没变化，请清除浏览器缓存观察）");

</script>');


    } else {
      err('<script> alert("图片上传不成功！[03]"); </script>');
    }
  } else {
    err('<script> alert("图片不存在！路径不正确；或系统出错，请稍候再试"); </script>');
  }

}


//print_r($_POST);die;

$_POST['menu'] = array_values((array)$_POST['menu']);

$text = '';
$new_array = $s_img = array();

$cnum1 = count($_POST['menu']);
/*
if ($cnum1 < 2) {
  err('必须包含“顶部”“底部”两个部位！');
}
*/
if ($cnum1 < 1) {
  err('必须有一个组成！');
}

foreach ($_POST['menu'] as $p => $p_name) {
  $new_array[$p]['open'] = (isset($_POST['menu_open'][$p]) && (abs($_POST['menu_open'][$p]) == 1/* || abs($_POST['menu_open'][$p]) == 2*/)) ? abs($_POST['menu_open'][$p]) : 0;
  foreach ($_POST['menu_name'][$p] as $n => $m_name) {
    $m_name = filter1($m_name);
    if ($m_name == '') {
      err('名称不能有空值！请返回检查');
    }
    $m_url = filter1($_POST['menu_url'][$p][$n]);
    if ($m_url == '') {
      err('调用URL不能有空值！请返回检查');
    }
    $m_scroll = !isset($_POST['menu_scroll'][$p][$n]) ? 1 : abs($_POST['menu_scroll'][$p][$n]);

    if ($_POST['menu_w'][$p][$n] == '100%') {
      $m_w = '100%';
      if ($p == 1) {
        $m_scroll = 1;
      }
    } else {
      $m_w = abs($_POST['menu_w'][$p][$n]);
      if ($m_w == 0) {
        err('宽度必须大于0！请返回检查');
      }
    }
    
/*
    if ($p == 1) {

      if ($m_w > 750) {
        err('底部功能菜单的栏目宽度不能大于750！（发现一个宽度为'.$m_w.'）');
      }
    } else {
      if ($m_w > 1170) {
        err('顶部功能菜单的栏目宽度不能大于1170！（发现一个宽度为'.$m_w.'）');
      }
    }
*/
    $m_h = abs($_POST['menu_h'][$p][$n]);
    if ($m_h == 0) {
      err('高度必须大于0！');
    }

    $new_array[$p][$n] = array(
$m_name,
$m_url,
$m_w,
$m_h,
$m_scroll,
);
    unset(
$m_name,
$m_url,
$m_w,
$m_h,
$m_scroll
);

    if ($b_m_url = filter1($_POST['b_menu_url'][$p][$n])) {
      $b_m_scroll = !isset($_POST['b_menu_scroll'][$p][$n]) ? 1 : abs($_POST['b_menu_scroll'][$p][$n]);
      if ($_POST['b_menu_w'][$p][$n] == '100%') {
        $b_m_w = '100%';
        if ($p == 1) {
          $b_m_scroll = 1;
        }
      } else {
        $b_m_w = abs($_POST['b_menu_w'][$p][$n]);
        if ($b_m_w == 0) {
          err('若添加了宽屏备选调用URL，则宽度必须大于0！请返回检查');
        }
      }
      $b_m_h = abs($_POST['b_menu_h'][$p][$n]);
      if ($b_m_h == 0) {
        err('若添加了宽屏备选调用URL，则高度必须大于0！');
      }
      array_push($new_array[$p][$n], $b_m_url, $b_m_w, $b_m_h, $b_m_scroll);
    }

    $s_img[$p.'_'.$n.'.gif'] = 1;

    unset($b_m_url, $b_m_w, $b_m_h, $b_m_scroll);
  }
}

//删除无用的图标
if ($imgs = @glob('writable/images/menu/*')) {
  foreach ($imgs as $im) {
    //if (!array_key_exists(basename($im), $s_img)) {
    if (!isset($s_img[basename($im)])) {
      @unlink($im);
    }
  }
}
$text = '<?php
$web[\'menu\'] = '.var_export($new_array, true).';
?>';

@ require ('readonly/function/write_file.php');
write_file('writable/set/set_menu.php', $text);
//unset($area_new, $web);
$web['menu'] = $new_array;
unset($text);

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');

alert('编辑功能菜单成功！', 'webmaster_central.php?get=menu');












?>