<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类设置
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('writable/set/set_area.php');
@ require ('readonly/function/filter.php');
@ require ('readonly/function/pinyin.php');
@ require ('writable/set/set_html.php');
?>
<script language="javascript" type="text/javascript">
<!--
// 只允字母数字
function isAlnum(obj, starVal, t) { //t：允许数字
  if (typeof(t) != 'undefined' && t == true) {
    var t = '!/^[a-zA-Z0-9]+$/.test(obj.value)';
    var b = '纯字母+数字';
  } else {
    var t = '!/^[a-zA-Z]+$/.test(obj.value)';
    var b = '纯字母';
  }
  if (eval(t)) {
    alert('你输入不对，只允许输入'+b+'！');
    obj.value = starVal;
    obj.focus();
  }
}
-->
</script>
<?php
$_POST['column_name'] = (array)$_POST['column_name'];


$text_correct = $text_chongfu = '';
//print_r($_POST['column_name']);die;
$area_new = $arr_chongfu_f = $arr_chongfu_c = $arr_py_column = $arr_py_class = array();
if (count($_POST['column_name']) > 0) {
  if (count($_POST['column_name']) > count(array_unique($_POST['column_name']))) {
    err('新频道名称不能有重名！');
  }
  if (count($_POST['column_name']) > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['column_name'])))) {
    err('新频道名称不能有空值！');
  }
  foreach ($_POST['column_name'] as $fid => $f) {
    $f = filter1($f);
    $column_py = pinyin($f, true); //频道取拼音第一个字母
    $old_py_column = ctype_alnum($web['area'][$fid]['name'][1]) ? $web['area'][$fid]['name'][1] : $column_py;

    if (isset($arr_py_column[$column_py])) {
      //list($fid_, $f_) = @explode('>', $arr_py_column[$column_py]);
      $arr_chongfu_f[$column_py] = 1;
    }
    $arr_py_column[$column_py][] = '
<div style="text-align:left; margin-left:20px; color:blue;">频道：<input type="text" size="10" name="column_correct['.$fid.']" value="'.$old_py_column.'" onblur="isAlnum(this,\''.$old_py_column.'\',1);" /> '.$f.'</div>';

    $area_new[$fid]['name'] = array($f, $old_py_column); //新分类名称
    $area_new[$fid]['name'][2] = abs($_POST['column_show'][$fid]) >= 1 ? abs($_POST['column_show'][$fid]) : '';
    $area_new[$fid]['name'][3] = isset($_POST['column_atside'][$fid]) && abs($_POST['column_atside'][$fid])==1 ? 1 : 0;
    $area_new[$fid]['name'][4] = isset($_POST['column_atside_type'][$fid]) && abs($_POST['column_atside_type'][$fid])==1 ? 1 : 0;

    if (isset($duoyin_mark[$f])) {
      $text_correct .= '
<div style="text-align:left; margin-left:20px;">频道：<input type="text" size="10" name="column_correct['.$fid.']" value="'.$old_py_column.'" onblur="isAlnum(this,\''.$old_py_column.'\',0);" /> '.$f.'（首字母：'.$duoyin_mark[$f].'）</div>';
    }

	$_POST['class_name'][$fid] = (array)$_POST['class_name'][$fid];
    if (count($_POST['class_name'][$fid]) > 0) {
      if (count($_POST['class_name'][$fid]) > count(array_unique($_POST['class_name'][$fid]))) {
        err('新栏目['.$f.']的分类不能有重名！');
      }
      if (count($_POST['class_name'][$fid]) > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['class_name'][$fid])))) {
        err('新栏目['.$f.']的分类不能有空值！');
      }

      foreach ($_POST['class_name'][$fid] as $cid => $c) {
        $c = filter1($c);
        $class_py = pinyin($c);
//echo ctype_alnum($web['area'][$fid][$cid][1]) ? $web['area'][$fid][$cid][1].'<br>' : '';

        $old_py_class = ctype_alnum($web['area'][$fid][$cid][1]) ? $web['area'][$fid][$cid][1] : $class_py;

        if (isset($arr_py_class[$class_py])) {
          //list($fid_, $cid_, $c_) = @explode('>', $arr_py_class[$class_py]);
          $arr_chongfu_c[$class_py] = 1;
        }
        $arr_py_class[$class_py][] = '
<div style="text-align:left; margin-left:60px; color:blue;">栏目：<input type="text" size="10" name="class_correct['.$fid.']['.$cid.']" value="'.$old_py_class.'" onblur="isAlnum(this,\''.$old_py_class.'\',1);" /> '.$c.'</div>';
        $area_new[$fid][$cid] = array($c, $old_py_class, 0, 0);
        if (isset($_POST['class_bj'][$fid][$cid]) && $_POST['class_bj'][$fid][$cid] == 1) {
          $area_new[$fid][$cid][2] = 1;
        }
        if (isset($_POST['class_http_type'][$fid][$cid]) && ($_POST['class_http_type'][$fid][$cid] == 1 || $_POST['class_http_type'][$fid][$cid] == 2)) {
          $area_new[$fid][$cid][3] = $_POST['class_http_type'][$fid][$cid];
        }
        if (isset($duoyin_mark[$c])) {
          $text_correct .= '
<div style="text-align:left; margin-left:60px;">栏目：<input type="text" size="10" name="class_correct['.$fid.']['.$cid.']" value="'.$old_py_class.'" onblur="isAlnum(this,\''.$old_py_class.'\',0);" /> '.$c.'（'.$duoyin_mark[$c].'）</div>';
        }
        unset($old_py_class);
      }
      unset($old_py_column);
    } else {
      err('新栏目['.$f.']的版区不能没有分类！');
	}
  }
}

//$area_new['mingz'] = $web['area']['mingz'];
//$area_new['homepage'] = $web['area']['homepage'];

if (count($arr_chongfu_f) > 0) {
  foreach (array_keys($arr_chongfu_f) as $f_py) {
    $arr_py_column[$f_py] = array_filter(array_unique($arr_py_column[$f_py]));
    if (count($arr_py_column[$f_py]) > 1) {
      $text_chongfu .= @implode('', $arr_py_column[$f_py]);
    }
  }
}
if (count($arr_chongfu_c) > 0) {
  foreach (array_keys($arr_chongfu_c) as $c_py) {
    $arr_py_class[$c_py] = array_filter(array_unique($arr_py_class[$c_py]));
    if (count($arr_py_class[$c_py]) > 1) {
      $text_chongfu .= @implode('', $arr_py_class[$c_py]);
    }
  }
}



if ($text_correct != '' || $text_chongfu != '') {
  $text_correct = '<form action="?post=area_p" method="post" style="border:1px #FF6600 solid; padding:5px; color:#FF6600;">'.($text_correct != '' ? '<p><b>重要！发现频道名或栏目名有多音字，请进行校正，再提交</b></p><p style="text-align:left;">'.$text_correct.'</p>' : '').($text_chongfu != '' ? '<p><b style="color:blue;">重要！发现频道名或栏目名有拼音重名，请进行校正（添加数字区分开），再提交</b></p><p style="text-align:left !important;">'.$text_chongfu.'</p>' : '').'<button type="submit">提交</button> <button type="button" onclick="location.href=window.history.back();">放弃</button> </form>';
} else {
  if ($web['area'] == $area_new) {
    err("您对版区设置未做任何更改！");
  } else {
    $SET_RELOAD = 1;
  }
}

if (!$area_new) {
  $errr = '<br /><span class="redword">注：你的设置已造成全部频道、栏目被清空</span>';
}

$_POST['mingz_align'] = stripslashes_($_POST['mingz_align']);
$_POST['kuz_align'] = stripslashes_($_POST['kuz_align']);


//print_r($area_new);die;
$text = '<?php
$web[\'area\'] = '.var_export($area_new, true).';

'.($_POST['mingz_align'] && preg_match('/^\s*(NULL|[4-8]+),\s*(NULL|(\'left\'|\'center\'))\s*$/i', $_POST['mingz_align']) ? '
$web[\'mingz_align\'] = array('.strtoupper($_POST['mingz_align']).');
' : '').'

'.($_POST['kuz_align'] && preg_match('/^\s*(NULL|[4-8]+),\s*(NULL|(\'left\'|\'center\'))\s*$/i', $_POST['kuz_align']) ? '
$web[\'kuz_align\'] = array('.strtoupper($_POST['kuz_align']).');
' : '').'

if (!function_exists(\'get_column_html\')) {
  function get_column_html($column_id) {
    global $web;
    return $web[\'html\'] == true ? \'\'.$web[\'area\'][$column_id][\'name\'][1].\'.html\' : \'column.php?column_id=\'.$column_id.\'\';
  }
}
if (!function_exists(\'get_class_html\')) {
  function get_class_html($column_id, $class_id) {
    global $web;
    return $web[\'html\'] == true ? \'\'.$web[\'area\'][$column_id][\'name\'][1].\'_\'.$web[\'area\'][$column_id][$class_id][1].\'.html\' : \'class.php?column_id=\'.$column_id.\'&class_id=\'.$class_id.\'\';
  }
}

?>';

//print_r($area_new);die;
@ require ('readonly/function/write_file.php');
write_file('writable/set/set_area.php', $text);
unset($text);
//unset($area_new, $web);
$web['area'] = $area_new;

//reset_indexhtml('index.php', 'index.html');

if (isset($SET_RELOAD)) {

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
  if ($web['html'] == true) {
    //$SET_RELOAD = 1;
    //$style_set_unset .= '<div style="background-color:#FF6600; color:#FFF;">你对系统设置进行了更改，因为你开启了全静态，建议重新<a href="?post=html">一键生成全静态</a></div>';
    echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
    @ require ('readonly/run/post_manager_html.php');
    echo '</div>';
}



}

err('频道、栏目设置成功！'.$errr.$text_correct.'', 'ok');


?>