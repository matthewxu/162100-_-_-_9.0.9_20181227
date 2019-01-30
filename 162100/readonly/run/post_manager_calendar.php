<?php
require ('authentication_manager.php');
?>
<?php


if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

  @ require ('writable/set/set_html.php');
  @ require ('readonly/function/write_file.php');

if ($_POST['act'] == 'calendar_source') {
  if ($fd = file_get_contents('readonly/require/head.php')) {
    if (preg_match('/\$web\[\'calendar\'\][\s\n\r]*\=[\s\n\r]*\'(.+)\'\;/U', $fd, $md)) {
      $url = $md[1];
    }
  }
  if (!isset($url)) {
    err('未取到变量：$web[\'calendar\']！不能继续执行');
  }
  $_POST['calendar_source'] = htmlspecialchars($_POST['calendar_source'], ENT_QUOTES);
  if ($url == $_POST['calendar_source']) {
    err('没有变化！');
  }
  $fd = preg_replace('/\$web\[\'calendar\'\][\s\n\r]*\=[\s\n\r]*\'(.+)\'\;/U', '$web[\'calendar\'] = \''.$_POST['calendar_source'].'\';', $fd); 

  $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
  write_file('readonly/require/head.php', $fd);
  reset_indexhtml('index.php', 'index.html');
  alert('保存成功！', 'webmaster_central.php?get=calendar#calendar_source');

} elseif ($_POST['act'] == 'calendar_festival') {
  if ($_POST['type']!='s' && $_POST['type']!='l') {
    err('参数type出错！');
  }
  $t = $_POST['type']=='s'?'公':'农';

  $text = '';
  //农历
  $cnum1 = count($_POST['calendar_festival_'.$_POST['type'].'l_date']);
  $cnum11 = count($_POST['calendar_festival_'.$_POST['type'].'l_name']);
  $rearr1 = array_unique($_POST['calendar_festival_'.$_POST['type'].'l_date']);
  if ($cnum1 > 0) {
    if ($cnum1 > count($rearr1)) {
      $rs = '';
      if (function_exists('array_diff_key')) {
        $result = array_diff_key($_POST['calendar_festival_'.$_POST['type'].'l_date'], $rearr1);
        $rs = '['.implode(' ', $result).']';
      }
      err(''.$t.'历节日日期有重复'.$rs.'！请仔细检查');
    }
    if ($cnum1 > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['calendar_festival_'.$_POST['type'].'l_date'])))) {
      err(''.$t.'历节日日期不能有空的输入！');
    }
    if ($cnum11 > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['calendar_festival_'.$_POST['type'].'l_name'])))) {
      err(''.$t.'历节日名称不能有空的输入！');
    }
    foreach ($_POST['calendar_festival_'.$_POST['type'].'l_date'] as $k => $v) {
      if (!preg_match('/^[0-9]{4}$/', $v)) {
        err(''.$t.'历节日日期['.$v.']中请输入日期类型的数字！');
      }
      if (preg_match('/[\"\'\:\;\,\}]/', $_POST['calendar_festival_'.$_POST['type'].'l_name'][$k])) {
        err(''.$t.'历节日名称['.$v.'] &raquo; ['.$_POST['calendar_festival_'.$_POST['type'].'l_name'][$k].']中不能含 " \' : ; , } 最好别整特殊符号');
      }
      $text .= '"'.$v.'":"'.htmlspecialchars($_POST['calendar_festival_'.$_POST['type'].'l_name'][$k], ENT_QUOTES).''.(($_POST['css'][$k]=='*' || file_exists('readonly/css/festival/'.$_POST['type'].''.$v.''))?'*':'').'",';
      unset($k, $v);
    }
    $text = rtrim($text, ',');

  }

  if ($fd = file_get_contents('writable/js/main.js')) {
    $fd = preg_replace('/'.$_POST['type'].'Ftv[\s\n\r]*\=[\s\n\r]*\{.*\}/isU', ''.$_POST['type'].'Ftv={'.$text.'}', $fd); 
    write_file('writable/js/main.js', $fd);
    $id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
    reset_indexhtml('index.php', 'index.html');

    if (!empty($_POST['delcss'])) {
      $css_f = explode('|', trim($_POST['delcss'], '|'));
      @ require ('readonly/function/deldir.php');
      foreach ($css_f as $k => $v) {
        //if (preg_match('/^(s|l)?[0-9]{4}$/', $v) && file_exists('readonly/css/festival/'.$v.'')) {
        if (preg_match('/[0-9]{4}$/', $v) && file_exists('readonly/css/festival/'.$v.'')) {
          deldir('readonly/css/festival/'.$v.'');
        }
      }
    }
    alert('保存成功！', 'webmaster_central.php?get=calendar#calendar_festival_'.$_POST['type'].'l');
  } else {
    err('执行不成功！writable/js/main.js未取到源数据');
  }




} else {
  err('参数错误！');
}





?>