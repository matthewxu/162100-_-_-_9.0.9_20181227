<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类设置——拼音纠错
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('writable/set/set_area.php');
@ require ('readonly/function/filter.php');
@ require ('readonly/function/pinyin.php');
@ require ('writable/set/set_html.php');

$area_new = '';

foreach ($web['area'] as $fid => $f) {
  if (isset($_POST['column_correct'][$fid])) {
    $fpy = empty($_POST['column_correct'][$fid]) ? pinyin($f['name'][0], true) : $_POST['column_correct'][$fid];
  } else {
    $fpy = $web['area'][$fid]['name'][1];
  }
  $area_new .= '
$web[\'area\'][\''.$fid.'\'][\'name\'] = array(\''.$f['name'][0].'\', \''.$fpy.'\', '.(abs($f['name'][2]) >= 1 ? abs($f['name'][2]) : '4').', '.(isset($f['name'][3]) && abs($f['name'][3]) == 1 ? 1 : 0).', '.(isset($f['name'][4]) && abs($f['name'][4]) == 1 ? 1 : 0).');';

  unset($web['area'][$fid]['name']);
  foreach ($web['area'][$fid] as $cid => $c) {
    if (isset($_POST['class_correct'][$fid][$cid])) {
      $cpy = empty($_POST['class_correct'][$fid][$cid]) ? pinyin($c[0]) : $_POST['class_correct'][$fid][$cid];
    } else {
      $cpy = $web['area'][$fid][$cid][1];
    }
    $area_new .= '
$web[\'area\'][\''.$fid.'\'][\''.$cid.'\'] = array(\''.$c[0].'\', \''.$cpy.'\', '.(isset($c[2]) && $c[2] == 1 ? 1 : 0).', '.(isset($c[3]) && ($c[3] == 1 || $c[3] == 2) ? $c[3] : 0).');';
  }
}

//$area_new['sybm'] = $web['area']['sybm'];

$text = '<?php

'.$area_new.'

$web[\'mingz_align\'] = '.var_export($web['mingz_align'], true).';
$web[\'kuz_align\'] = '.var_export($web['kuz_align'], true).';

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

@ require ('readonly/function/write_file.php');
write_file('writable/set/set_area.php', $text);

unset($area_new);
$web['area']=NULL;
//reset_indexhtml('index.php', 'index.html');

$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
if ($web['html'] == true) {
  $SET_RELOAD = 1;
  //$style_set_unset .= '<div style="background-color:#FF6600; color:#FFF;">你对系统设置进行了更改，因为你开启了全静态，建议重新<a href="?post=html">一键生成全静态</a></div>';
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';

} else {
  //reset_indexhtml('index.php', 'index.html');
}


alert('多音字校正完毕！频道、栏目已设置好。', 'webmaster_central.php?get=area');






?>