<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置
if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}

@ require ('readonly/function/img.php');
@ require ('readonly/function/pinyin.php');
  @ require ('readonly/function/write_file.php');
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

if ($_POST['act'] == 'base') {
  if (!$text = @file_get_contents('writable/set/set.php')) {
    err('无法读取设置文件！稍候再试！');
  }
  $text = preg_replace('/\$web\[(\'|\")search_bar(\'|\")\][^\;]+/', '$web[\'search_bar\'] = '.(abs($_POST['search_bar']) > 3 ? 1 : abs($_POST['search_bar'])).'', $text);
  write_file('writable/set/set.php', $text);

  if (!empty($_POST['search_type_id'])) {
    list($search_type, $search_id) = @explode('-', $_POST['search_type_id']);
    //if (preg_match('/^(shangpin|wangye|tupian|yinyue|shipin|xinwen|youxi|ditu)$/i', $search_type)) {
    if ($search_type && $search_id) {
      if ($text_s = @file_get_contents('writable/js/search.js')) {
        $text_s = preg_replace('/\/\* search_default_bar \*\/.+\/\* \/search_default_bar \*\//isU', '/* search_default_bar */
var search_default_type = \''.$search_type.'\';
var search_default_id = \''.$search_id.'\';
/* /search_default_bar */', $text_s);
        write_file('writable/js/search.js', $text_s);
      }
      unset($text_s);
    }
  }

  $_POST['zn'] = abs($_POST['zn']) == 1 ? 1 : 0;
  $_POST['zn2'] = is_numeric($_POST['zn2']) && $_POST['zn2'] == 1 ? 1 : 0;
  if ($_POST['zn'] == 0) {
    @unlink('writable/js/opensug.js');
  } else {
    if (file_exists('writable/js/opensug.js')) {
      $zn_file = @file_get_contents('writable/js/opensug.js');
      preg_match('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', $zn_file, $m);
      if ($_POST['zn2'].'_' != $m[1].'_') {
        $zn_file = preg_replace('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', 'var sugSubmitV = '.$_POST['zn2'].';', $zn_file);
        write_file('writable/js/opensug.js', $zn_file);
      }
    } else {
      $zn_file = @file_get_contents('readonly/js/opensug.js');
      preg_match('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', $zn_file, $m);
      if ($_POST['zn2'].'_' != $m[1].'_') {
        $zn_file = preg_replace('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', 'var sugSubmitV = '.$_POST['zn2'].';', $zn_file);
        write_file('writable/js/opensug.js', $zn_file);
      } else {
        copy('readonly/js/opensug.js', 'writable/js/opensug.js');
      }
    }
  }

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');
  alert('集成搜索引擎基本设置 设置完毕！', 'webmaster_central.php?get=search#po1');

} elseif ($_POST['act'] == 'up') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); parent.$("mainform").act.value=""; parent.delSubmitSafe(); </script>');
}





$_POST['type_name'] = (array)$_POST['type_name'];

//print_r($_POST);die;


$text = '';
$arr_py_type = $arr_py_n = $s_img = array();

$cnum1 = count($_POST['type_name']);

if ($cnum1 == 0) {
  err('搜索类别数目不能空！');
}
if ($cnum1 > count(array_unique($_POST['type_name']))) {
  err('搜索类别发现有重名！');
}
if ($cnum1 > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['type_name'])))) {
  err('搜索类别发现有空值！');
}

$text .= '
searchSelect = {';

$step1 = $step2 = 0;
foreach ($_POST['type_name'] as $type => $tname) {

  $step1++;

  $tname = filter1($tname);
  $type_py = pinyin($tname);

  $text .= '
  \''.$type_py.'\': {
    0 : \'搜'.$tname.'\',';

  if (isset($arr_py_type[$type_py])) {
    err('搜索类别不能有同音：“'.$arr_py_type[$type_py].'”“'.$tname.'”，请修改');
  } else {
    $arr_py_type[$type_py] = $tname;
  }

  $cnum2 = count($_POST['bar_name'][$type]);
  if ($cnum2 == 0) {
    err('搜索类别“'.$tname.'”中：引擎名数目不能空！');
  }

  foreach ($_POST['bar_name'][$type] as $n => $sname) {

    $step2++;

    $sname = filter1($sname);
    $s_py = pinyin($sname);
    $surl = filter1($_POST['bar_url'][$type][$n]);
    $surl_ = filter1($_POST['bar_url_'][$type][$n]);
    if (!empty($surl_)) {
      $surl .= ' '.$surl_;
    }
    if (isset($arr_py_n[$type_py][$s_py])) {
      err('搜索类别“'.$tname.'”中：引擎名不能有同音：“'.$arr_py_n[$type_py][$s_py].'”“'.$sname.'”，请修改');
    } else {
      $arr_py_n[$type_py][$s_py] = $sname;
    }

    if ($sname == '') {
      err('搜索类别“'.$tname.'”中：发现引擎名有空值！');
    }
    if ($surl == '') {
      err('搜索类别“'.$tname.'”、引擎名为“'.$sname.'”中：发现引擎URL有空值！');
    }

    if ($type != $type_py || $n != $s_py) {
      if (!file_exists('writable/images/searchmark/1_'.$type.'_'.$n.'.gif') && !file_exists('writable/images/searchmark/1_'.$type_py.'_'.$s_py.'.gif')) {
        err('搜索类别“'.$tname.'”、引擎名为“'.$sname.'”中：发现引擎样式1图标未上传！');
      } else {
        if (file_exists('writable/images/searchmark/1_'.$type.'_'.$n.'.gif')) {
          @rename('writable/images/searchmark/1_'.$type.'_'.$n.'.gif', 'writable/images/searchmark/1_'.$type_py.'_'.$s_py.'.gif');
        }
      }
      if (!file_exists('writable/images/searchmark/2_'.$type.'_'.$n.'.gif') && !file_exists('writable/images/searchmark/2_'.$type_py.'_'.$s_py.'.gif')) {
        err('搜索类别“'.$tname.'”、引擎名为“'.$sname.'”中：发现引擎样式2图标未上传！');
      } else {
        if (file_exists('writable/images/searchmark/2_'.$type.'_'.$n.'.gif')) {
          @rename('writable/images/searchmark/2_'.$type.'_'.$n.'.gif', 'writable/images/searchmark/2_'.$type_py.'_'.$s_py.'.gif');
        }
      }
    }
    $s_img['1_'.$type_py.'_'.$s_py.'.gif'] = 1;
    $s_img['2_'.$type_py.'_'.$s_py.'.gif'] = 1;

    $text .= '
    \''.$s_py.'\': [\''.$surl.'\', \''.$sname.'\']'.($step2 < $cnum2 ? ',' : '').'';

  }
  $step2 = 0;
  unset($cnum2);

  $text .= '
  }'.($step1 < $cnum1 ? ',' : '').'';
}

$text .= '
};
';


if ($imgs = @glob('writable/images/searchmark/*')) {
  foreach ($imgs as $im) {
    //if (!array_key_exists(basename($im), $s_img)) {
    if (!isset($s_img[basename($im)])) {
      @unlink($im);
    }
  }
}


if ($text_s = @file_get_contents('writable/js/search.js')) {
  $text_s = preg_replace('/\/\* search_bar \*\/.+\/\* \/search_bar \*\//isU', '/* search_bar */'.$text.'/* /search_bar */', $text_s);
  write_file('writable/js/search.js', $text_s);
} else {
  err('读取模板文件writable/js/search.js失败！');
}
unset($text, $text_s);

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');

alert('编辑搜索引擎成功！', 'webmaster_central.php?get=search#po2');












?>