<?php


@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
@ require ('writable/set/set_area.php');
@ require ('readonly/function/get_page.php');

@ $_GET = array_map('htmlspecialchars', $_GET);
if (!function_exists('get_en_url')) {
  function get_en_url($d) {
    return urlencode(base64_encode($d));
  }
}

@ $_GET['column_id'] = preg_replace('/[^\w]/', '', $_GET['column_id']);
@ $_GET['class_id'] = preg_replace('/[^\w]/', '', $_GET['class_id']);

//if (!(isset($_GET['column_id']) && array_key_exists($_GET['column_id'], $web['area']))) {
if (!(isset($_GET['column_id']) && isset($web['area'][$_GET['column_id']]))) {
  die('&#39057;&#36947;&#73;&#68;'.$_GET['column_id'].'&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;&#39318;&#39029;&#37325;&#26032;&#24320;&#22987;');
}
//if (!(isset($_GET['class_id']) && array_key_exists($_GET['class_id'], $web['area'][$_GET['column_id']]))) {
if (!(isset($_GET['class_id']) && isset($web['area'][$_GET['column_id']][$_GET['class_id']]))) {
  die('&#26639;&#30446;&#73;&#68;'.$_GET['class_id'].'&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
}
@ $_GET['class_title'] = filter(htmlspecialchars($_GET['class_title']));
if (empty($_GET['class_title'])) {
  die('&#20998;&#31867;&#21442;&#25968;&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
}


if (!empty($_GET['detail_title'])) {
  $_GET['detail_title'] = filter(htmlspecialchars($_GET['detail_title']));
  $e1 = ' AND detail_title LIKE "'.$_GET['detail_title'].'|%"';
} else {
  $e1 = ' AND detail_title=""';
}

function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  //$text = str_replace('/', '&#47;', $text);
  return $text;
}

if (!function_exists('html_back')) {
  function html_back($str){
    //$str = preg_replace_callback('/<[^>]+>/', function($matches){return htmlspecialchars($matches[0]);}, $str);
    $str = preg_replace_callback('/<[^>]+>/', 'run_filter', $str);
    return $str;
  }
  function run_filter($matches) {
    return htmlspecialchars($matches[0]);
  }
}

$ssd = abs($web['area'][$_GET['column_id']][$_GET['class_id']][3]);

if (!function_exists('get_list_mode_0')) {
function get_list_mode_0($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.''.$_GET['current'].'"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_1')) {
function get_list_mode_1($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.''.$_GET['current'].'"'.($h[4] != '' ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_2')) {
function get_list_mode_2($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.''.$_GET['current'].'"><div class="class_wrap"><h4 class="site_title"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</h4>
<div class="class_http"><a onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[0].'</a></div>
'.($h[4] != '' ? '<div class="class_line"></div><div class="class_description">'.$h[4].'</div>' : '').'</div></span>';
}
}
$GLOBALS['function_list_mode'] = 'get_list_mode_'.$ssd.'';







$text = $err = '';

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title LIKE "'.$_GET['class_title'].'|%"'.$e1.' LIMIT 1');

  if ($row = db_fetch($db, $result)) {

    list($class_title, $class_n, $class_more) = @explode("|", $row['class_title']);
        $class_n = $class_n ? $class_n : 4;

    if (empty($class_more) || !is_numeric($class_more) || $class_more <= 0) {
      die('&#x67E5;&#x65E0;&#x5206;&#x9875;&#x8BBE;&#x7F6E;&#xFF01;');
    }




    $total_arr = @explode("\n", trim($row['http_name_style']));
    $n = count($total_arr);

    if ($n > 0) {
      $p = get_page($n, $class_more); //页数
      $seek = $class_more * ($p-1);
      $total_arr = array_slice($total_arr, $seek, $class_more);

      foreach ($total_arr as $xh => $each) {
        $h = @explode("|", trim($each));

        if ($web['link_type'] == 1) {
          $link = $h[3] == "js" ? $h[0] : "export.php?url=".urlencode($h[0]);
        } else {
          $link = $h[3] == "js" ? "export.php?url=".urlencode($h[0]) : $h[0];
        }

        $text .= $GLOBALS['function_list_mode']($class_n, $link, $h, $row['id'].'_'.(abs($xh)+1));
        unset($link);
      }

      $text .= get_page_foot2($n, $class_more, $p, 'PseudoXMLHTTP.php?xml_id=class_'.$_GET['id'].'&xml_a=1&xml_file='.get_en_url('class_page.php').'&id='.$_GET['id'].'&current='.$_GET['current'].'&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($class_title).'&p=', 'addPFrame" onclick="addG(\''.$_GET['id'].'\', this);', $class_n.$_GET['current']);


    } else {
      $text .= '没有数据！';
    }

    unset($row);
  } else {
    $err = '&#x6570;&#x636E;&#x4E3A;&#x7A7A;&#x6216;&#x8BFB;&#x53D6;&#x5931;&#x8D25;&#xFF01;';
  }

  $result = NULL;

} else {
  $err = ''.$sql['db_err'].'';
}

db_close($db);

echo $text, $err;

?>