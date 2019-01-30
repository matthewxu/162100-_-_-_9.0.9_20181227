<?php

/* 快捷版首页 */

/*
* 程序名称：162100网址导航3号
* 作者：162100.com
* 邮箱：162100.com@163.com
* 网址：http://www.162100.com
* ＱＱ：184830962
* 声明：禁止侵犯版权或程序转发的行为，否则我方将追究法律责任
*/

$self = 'index_hiddenmenu.php';


function get_i($http, $column_id, $class_id, $class_name = '', $class_more) {
  global $web;
  $text = '';
  $text_class_more = '';
  if ($http = trim($http)) {
    $text .= '<li class="class_name"><a href="'.get_class_html($column_id, $class_id).'">'.$class_name.'</a></li>';
    $http_arr = @explode("\n", $http);
    $n = count($http_arr);
    if ($n > 0) {
      if (!empty($class_more) && is_numeric($class_more) && $class_more < $n) {
        $http_arr = array_slice($http_arr, 0, $class_more);
        $text_class_more .= ' <li><a href="'.get_class_html($column_id, $class_id).'">更多»</a></li>';
      }
      foreach ($http_arr as $e) {
        $h = @explode("|", trim($e));
        $text .= '<li><a onclick="addM(this)" href="'.($web['link_type_i'] == 1 ? ($h[3] == 'js' ? $h[0] : 'export.php?url='.urlencode($h[0])) : ($h[3] == 'js' ? 'export.php?url='.urlencode($h[0]) : $h[0])).'"'.($h[2] != '' ? ' class="'.$h[2].'"' : '').''.($h[4] != '' && $web['d_type'] != 1 ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'>'.$h[1].'</a>'.(!empty($h[5]) ? $h[5] : '').'</li>';
      }
      $text .= $text_class_more;
    }
  }
  return $text;
}

function get_j_0($http, $column_id, $class_id, $class_name = '', $tcolor_key) {
  global $web;
  $text = $text_ = '';
  //$sitenm = 12 + strlenth($class_name) + 12 + 12 + strlenth('&#8230;') + 12;
  $sitenm = (int)strlenth($class_name.'更多»') + 48;
  if ($http = trim($http)) {
    $text_ .= '<li class="class_title" style="float:left;"><a class="'.$tcolor_key.'" href="'.get_class_html($column_id, $class_id).'">'.$class_name.'</a></li>';
    $http_arr = @explode("\n", $http);
    $step = 0;
    foreach ($http_arr as $k => $e) {
      $h = @explode("|", trim($e));
      $sitenm += 12 + strlenth($h[1].$h[5]) + 12;
      if ($sitenm > 760 - 22 - 25) { //22余负.class li.class_title { margin-right:25px; }
        break;
      } else {
        $step ++;
        $text .= '<li><a onclick="addM(this)" href="'.($web['link_type_i'] == 1 ? ($h[3] == 'js' ? $h[0] : 'export.php?url='.urlencode($h[0])) : ($h[3] == 'js' ? 'export.php?url='.urlencode($h[0]) : $h[0])).'"'.($h[2] != '' ? ' class="'.$h[2].'"' : '').''.($h[4] != '' && $web['d_type'] != 1 ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'>'.$h[1].'</a>'.(!empty($h[5]) ? $h[5] : '').'</li>';
      }
    }
    $GLOBALS['kz_margin'][] = $step;
    if (count($http_arr) > $k) {
      $text_ .= '<li class="class_more"><a href="'.get_class_html($column_id, $class_id).'">更多&raquo;</a></li>';
    }
  }
  return $text_.$text;
}

function get_j_1($http, $column_id, $class_id, $class_name = '', $tcolor_key) {
  global $web;
  $text = $text_ = '';
  //$sitenm = 12 + strlenth($class_name) + 12 + 12 + strlenth('&#8230;') + 12;
  $sitenm = (int)strlenth($class_name.'更多»') + 48;
  $e_w = floor((760-22-(25-12)-(25-12)-$sitenm) / $web['kuz_align'][0]);
  $text .= '
<style>
li.li_width_'.$column_id.'_'.$class_id.' { width:'.$e_w.'px !important;margin:0 !important; }
</style>
<script type="text/javascript">
  document.write(\'<style>\
li.li_w_'.$column_id.'_'.$class_id.' { width:\'+parseInt((rightWidth-22-(25-12)-(25-12)-'.$sitenm.') / '.$web['kuz_align'][0].')+\'px !important;margin:0 !important;}\
</style>\');
</script>
';
  
  if ($http = trim($http)) {
    $text_ .= '<li class="class_title" style="float:left;"><a class="'.$tcolor_key.'" href="'.get_class_html($column_id, $class_id).'">'.$class_name.'</a></li>';
    $http_arr = @explode("\n", $http);
    $cut = count($http_arr);
    $cut = $cut > $web['kuz_align'][0] ? $web['kuz_align'][0] : $cut;

    for ($k=0; $k<$cut; $k++) {
      $h = @explode("|", trim($http_arr[$k]));
      $text .= '<li class="li_w_'.$column_id.'_'.$class_id.'"><a onclick="addM(this)" href="'.($web['link_type_i'] == 1 ? ($h[3] == 'js' ? $h[0] : 'export.php?url='.urlencode($h[0])) : ($h[3] == 'js' ? 'export.php?url='.urlencode($h[0]) : $h[0])).'"'.($h[2] != '' ? ' class="'.$h[2].'"' : '').''.($h[4] != '' && $web['d_type'] != 1 ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'>'.$h[1].'</a>'.(!empty($h[5]) ? $h[5] : '').'</li>';
    }
    $text_ .= '<li class="class_more"><a href="'.get_class_html($column_id, $class_id).'">更多&raquo;</a></li>';
  }
  return $text_.$text;
}

function strlenth($str) {
  if ($str == '') {
    return 0;
  }
  $len = $w = 0;
  preg_match_all('/<img ([^>]+)>/i', $str, $m);
  if (is_array($m[1]) && count($m[1]) > 0) {
    foreach ($m[1] as $im) {
      if (preg_match('/width[^\d]+(\d+)/i', $im, $mm)) {
        $w += $mm[1];
      } else {
        if(preg_match('/src\s*=\s*[\"\']?([^\"\'\s\<\>]+)/i', $im, $mm)) {
          if (file_exists($mm[1]) && $img_info = getimagesize($mm[1])) {
            $w += $img_info[0];
          }
        }
      }
      unset($mm, $img_info);
    }
    unset($m);
  }
  $str = preg_replace('#<script[^>]*?>.*?</script>#si', '', $str);
  $str = preg_replace('#<style[^>]*?>.*?</style>#si', '', $str);
  $str = strip_tags($str);
  $str = preg_replace('#\s+#', ' ', $str);

  for ($i = 0; $i < strlen($str); $i++) {
    $len += ord(substr($str, $i, 1)) > 127 ? 4.667 : 8; //14/3=5.333
  }
  //return ceil($len + $w);
//echo $str.'<br />'.($len + $w).'';
  return $len + $w;
}

if (!function_exists('get_en_url')) {
  function get_en_url($d) {
    return urlencode(base64_encode($d));
  }
}



























require ('writable/set/set.php');
if (!isset($web['area'])) {
  require ('writable/set/set_area.php');
}
if (!isset($sql)) {
  require ('writable/set/set_sql.php');
}
if (!isset($web['html'])) {
  require ('writable/set/set_html.php');
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

$text = $text_ = '';
$column_show = 0;


if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  //名站对齐
  if (empty($web['mingz_align'][0])) {
      $text .= '
<script type="text/javascript">
if (rightWidth == 900) {
  document.write(\'<style>\
.mingz li, #collection li, .qiangdiao li, .class_name { margin:0 20px !important; }\
</style>\');
}
</script>
';
  } else {
    $mingz_align = ' mingz_align';
    $text .= '
<style>
.mingz_align li { width:'.(floor((760-22) / abs($web['mingz_align'][0]))).'px; }
</style>
<script type="text/javascript">
if (rightWidth == 900) {
  document.write(\'<style>\
.mingz_align li { width:\'+parseInt((900-22) / '.abs($web['mingz_align'][0]).')+\'px; }\
</style>\');
}
</script>
';
    if (!empty($web['mingz_align'][1]) && $web['mingz_align'][1] == 'LEFT') {
      $text .= '
<style>
.mingz_align li { text-align:left; margin-left:12px !important; margin-right:-12px !important; }
</style>
';
    }
  }

  //酷站对齐
  if (empty($web['kuz_align'][0])) {
	$f_key = 'get_j_0';
    $GLOBALS['kz_margin'] = array();
    if ($web['kuz_align'][1] != 'CENTER') {
      $text .= '
<style>
.right .class { text-align:left; }
.right .class li.class_title { margin-right:25px !important; }
</style>
';
    }
  } else {
    if ($web['kuz_align'][0] === 4 || $web['kuz_align'][0] === 5 || $web['kuz_align'][0] === 6 || $web['kuz_align'][0] === 7) {
	  $f_key = 'get_j_1';
	  if ($web['kuz_align'][1] != 'CENTER') {
        $text .= '<style>
.right .class { text-align:left; }
.right .class li { text-align:left; height:32px; overflow:hidden; }
.right .class li.class_title { width:auto; margin-right:35px !important; }
.right .class li.class_more { width:auto; margin-left:15px !important; }
</style>'; 
	  } else {
        $text .= '<style>
.right .class li { text-align:center; height:32px; overflow:hidden; }
.right .class li.class_title { width:auto; margin-right:25px !important; }
.right .class li.class_more { width:auto; margin-left:25px !important; }
</style>'; 
	  }
    }
  }



  $text .= '<div id="mingz">';
  //获取首页版面频道
  if (!empty($web['area']['homepage'])) {
    $web['area']['homepage']['name'][2] = (is_numeric($web['area']['homepage']['name'][2]) && $web['area']['homepage']['name'][2] > 0) ? $web['area']['homepage']['name'][2] : 1000000;
    foreach ($web['area']['homepage'] as $class_id => $class) {
      if ($class_id === 'name') continue;
      $column_show ++;
      $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="homepage" AND class_id="'.$class_id.'" AND class_title NOT LIKE "栏目头栏%" AND detail_title="" AND http_name_style<>"" ORDER BY id LIMIT 1'); // AND class_title NOT LIKE "栏目置顶%"
      if ($row = db_fetch($db, $result)) {
        list($class_title, $class_n, $class_more) = @explode("|", $row['class_title']);
        $text .= '<ul class="'.(isset($class[2]) && $class[2] == 1 ? 'qiangdiao' : 'mingz'.$mingz_align.'').'">'.(!empty($row['class_priority']) ? '<div class="priority">'.$row['class_priority'].'</div>' : '').get_i($row['http_name_style'], 'homepage', $class_id, $class[0], $class_more).'</ul>';
      }/* else {
        $text .= '['.$web['area']['homepage'][$class_id][0].']数据导入失败！<br>';
      }*/
      $result = NULL;
      unset($row);
      unset($class_id, $class);
      if ($column_show >= $web['area']['homepage']['name'][2]) break; //显几层？
    }
  }
  //unset($web['area']['homepage']);
  $column_show = $tcolor = 0;

  $text .= '<script> document.write(myCollection); </script>';
  $text .= '</div>';

  //获取其它频道栏目
  $array_color = array('red', 'orange', 'green', 'blue');
  foreach ((array)$web['area'] as $column_id => $column) {
    if ($column_id === 'homepage') { continue; }
    if (isset($column['name'][3]) && $column['name'][3] == 1) {
      $arr_column_side[$column_id] = $column;
      continue;
    }
    $column['name'][2] = (is_numeric($column['name'][2]) && $column['name'][2] > 0) ? $column['name'][2] : 1000000;
    $tcolor_key = $array_color[($tcolor + 4) % 4].'word';
    $tcolor ++;
    $c_title = $column['name'][0];
    $left_column .= '<div class="column_title"><a onmouseover="showLeftMenu(this, \''.$column_id.'\')" href="'.get_column_html($column_id).'" class="tcolor '.$tcolor_key.'">'.$column['name'][0].' &#8230;</a></div><div id="left_menu_'.$column_id.'" class="left_menu">'; //////////////////////////////////////////////////////////////////////
    $text_ .= '
  <div class="column"'.($tcolor==1?' style="margin-top:0;"':'').'>';
    $text_ .= '<div class="column_title">';
    foreach ((array)$column as $class_id => $class) {
      if ($class_id === 'name') continue;
      $column_show ++;
      $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title NOT LIKE "栏目头栏%" AND detail_title="" AND http_name_style<>"" ORDER BY id LIMIT 1'); // AND class_title NOT LIKE "栏目置顶%"
      if ($row = db_fetch($db, $result)) {
        $text_temp_ .= '<ul class="class'.(isset($class[2]) && $class[2] == 1 ? ' qiangdiao' : ' kuz_align').'" id="'.$web['area'][$column_id]['name'][1].'_'.$web['area'][$column_id][$class_id][1].'">';
        $text_temp_ .= $f_key($row['http_name_style'], $column_id, $class_id, $class[0], $tcolor_key);
        $text_temp_ .= '</ul>';
      }/* else {
        $text_temp_ .= '['.$web['area'][$column_id][$class_id][0].']数据导入失败！<br>';
      }*/
      //$left_column .= '<a href="'.get_class_html($column_id, $class_id).'" class="'.$tcolor_key.'">'.$class[0].'</a>'; //////////////////////////////////////////////////////////////////////
      $result = NULL;
      unset($row);
      unset($column[$class_id]);
      unset($class_id, $class);
      if ($column_show >= $column['name'][2]) break; //显几层？
    }
    unset($column['name']);
    $_sy = count($column);
    if ($_sy > 0) {
      $sss = 0;
      $text_ .= '
      <div class="class_title_other">';
      foreach ($column as $class_id => $class) {
        $sss++;
        $text_ .= '<a href="'.get_class_html($column_id, $class_id).'">'.$class[0].'</a>'.($sss == $_sy ? '' : ' | ').'';
        unset($class_id, $class);
      }
      $text_ .= '</div>';
    }
    $text_ .= '<a href="'.get_column_html($column_id).'" class="tcolor '.$tcolor_key.'">'.$c_title.'</a><div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div></div>';
    $text_ .= $text_temp_;
    $text_ .= '</div>';
    unset($column_id, $column, $text_temp_, $c_title);
    $left_column .= '</div>'; //////////////////////////////////////////////////////////////////////
    $column_show = 0;
  }
} else {
  die($sql['db_err']);
}

db_close($db);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $web['sitename'], $web['code_author']; ?></title>
<meta name="description" content="<?php echo $web['description']; ?>">
<meta name="keywords" content="<?php echo $web['keywords']; ?>">
<base target="_blank" />
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
.left { overflow:visible; }
.left_in { overflow:hidden; }
.left_menu { display:none; overflow:auto; font-weight:normal; text-align:left; position:absolute; top:-10px; left:209px; padding:10px; z-index:90;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90); -moz-opacity:0.9; -khtml-opacity:0.9; opacity:0.9; background:#F3FDC3 url(readonly/images/loading2.gif) 50% 50% no-repeat;}
.left_menu a { }
#left_menu_obj { position:relative; margin-left:0; margin-right:0; padding-left:0; padding-right:0;}
.left .column { }
.left #left_menu_obj .column_title { margin:0; padding:0; letter-spacing:10px; }
.left #left_menu_obj .column_title:hover {}
.left #left_menu_obj .column_title a  { margin:0; width:229px; display:block; text-align:center; padding-left:0; padding-right:0; border-top:none; border-bottom:none; }
.left #left_menu_obj .column_title a:hover  { background-color: #F3FDC3;  }
.left #left_menu_obj .column_title .tcolor { border-top:none; max-width:none; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<?php
if (file_exists('writable/js/goiphone.js')) {
  echo '<script type="text/javascript" language="javascript" src="writable/js/goiphone.js"></script>';
}
?>
  </head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<script type="text/javascript" language="JavaScript">
<!--
$('kw').focus();
function addFocus() {
  $('kw').focus();
};
if (document.all) {
  window.attachEvent('onload', addFocus);
} else {
  window.addEventListener('load', addFocus, false);
};
-->
</script>
<script type="text/javascript" language="JavaScript">
<!--
if(document.getElementById('date_time')!=null){document.getElementById('date_time').innerHTML='<a href="detail.php?column_id=1&class_id=15&detail_title=%E4%B8%87%E5%B9%B4%E5%8E%86" title="农历 '+solarDay2()+'" onmouseover="sSD(this,event);">'+YYMMDD()+' '+weekday()+' '+dateBox+'</a>'}
-->
</script>
<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe><div id="site_d"></div>
<div id="top_title_index">
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./" id="top_title_is">首页</a></div>
</div>
<script type="text/javascript" language="javascript">
<!--
function getBodyW() {
  return parseInt(document.getElementById('head').offsetWidth)>=1170?900:760;
}
var rightWidth=getBodyW();
-->
</script>
<?php
if (is_array($GLOBALS['kz_margin']) && count($GLOBALS['kz_margin']) > 0) {
  $li_max = max($GLOBALS['kz_margin']);
  if (is_numeric($li_max) && $li_max > 0) {
    echo '
<script>
if (rightWidth == 900) {
 document.write(\'<style> .right .class li { margin:0 \'+(12+parseInt((900-760)/'.$li_max.'/2))+\'px !important; } </style>\');
}
</script>';
  }
}
?>

<div class="body">
  <div class="right" id="right">
    <?php echo $text; ?>
    <?php
if (file_exists('writable/chuchuang/ad_central.txt')) {
  @ include ('writable/chuchuang/ad_central.txt');
}
?>
    <?php echo $text_; ?>
  </div>
  <div class="left" id="left"><div id="left_top">分类目录</div>
    <div class="column" id="left_menu_obj"><?php echo $left_column; ?></div>

    <?php
unset($text);
$text = '';
if (count($arr_column_side) > 0) :
  foreach ($arr_column_side as $column_id => $column) {
    $widow = isset($column['name'][4]) && abs($column['name'][4])==1 ? 1 : 0;
    $text .= '
    <div id="column_'.$column['name'][1].'" class="column"><div class="column_title"><a href="'.get_column_html($column_id).'">'.$web['area'][$column_id]['name'][0].'</a></div>
      <ul class="class">';
    foreach ((array)$column as $class_id => $class) {
      if ((string)$class_id !== 'name') {
        $text .= '<li><a'.($widow!=1 ? ' href="class_current.php?column_id='.$column_id.'&class_id='.$class_id.'" onclick="addSubmitSafe(1);$(\'addCFrame\').style.display=\'block\';" target="addCFrame"' : ' href="'.get_class_html($column_id, $class_id).'"').'>'.$class[0].'</a></li>';
      }
      unset($class_id, $class);
    }
    $text .= '
      </ul>
    </div>
';

    unset($widow, $column_id, $column);
  }

endif;

unset($arr_column_side);
echo $text;
unset($text);

?>
    <div class="left_in">
<?php
if (@file_exists('writable/require/chongzhi.txt')) {
?>
    <div id="column_chongzhi" class="column column_side"><div class="column_title">手机充值</div>
      <div class="class" style="text-align:center;">
      <?php
@ include ('writable/require/chongzhi.txt');

?>
      </div>
    </div>

<?php
}
?>

    <?php @ include ('writable/require/newsite.php'); ?>
    <?php @ include ('writable/require/newinfo.php'); ?>
    <?php
if (file_exists('writable/chuchuang/ad_side.txt')) {
  @ include ('writable/chuchuang/ad_side.txt');
}
?>
    </div>
  </div>
  <div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div>
</div>
<?php
if (file_exists('writable/js/parallel.js')) {
  echo '<script type="text/javascript" language="javascript" src="writable/js/parallel.js"></script>';
}
?>

<?php
if (file_exists('writable/js/referrer_top.js') || file_exists('writable/require/foot_searchbox.php')) {
?>
<div class="body" id="search_bottom">
  <div class="bottom" style="clear:both;">
    <?php echo file_exists('writable/js/referrer_top.js') ? '<div class="bottom_in"'.(file_exists('writable/require/foot_searchbox.php')?' style="border-bottom:1px #CECECE dotted; margin-bottom:5px;"':'').'><span class="bottom_title">最新点入</span><script> document.write(\'<\'+\'sc\'+\'ript language="javascript" src="writable/js/referrer_top.js?\'+new Date().getTime()+\'" type="text/javascript"></\'+\'sc\'+\'ript>\'); </script></div>' : ''; ?>
    <?php
if (file_exists('writable/require/foot_searchbox.php')) {
  @ include ('writable/require/foot_searchbox.php');
}
    ?>
  </div>
</div>
<?php
}
?>
<?php
if (file_exists('writable/chuchuang/ad_bottom_index.txt')) {
  @ include ('writable/chuchuang/ad_bottom_index.txt');
}
?>
<?php @ include ('writable/require/foot_index.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

<!--bottom-->
<?php
//加载天气
//$_GET['from'] = 'index.php';
//include ('readonly/weather/getweather.php');
?>
<script type="text/javascript" language="javascript">
<!--

var cssSet = nowStyle ? nowStyle.toString() : '<?php echo $web['cssfile']; ?>';
var cssCookie = getCookie('myStyle').toString();

var rl = false;

if(getStyle(document.getElementById('left'),'minWidth')=='200px'||getStyle(document.getElementById('left'),'float')=='right'){rl=true}function showLeftMenu(o,id){
var leftMenuObj=$('left_menu_'+id);var lW=760;if(rl==true){var lk=-1;var oldL=lW*-1+20-21;var oldL2=lW*-1-21;o.style.marginLeft='-1px'}else{var lk=1;var oldL=209;var oldL2=229}leftMenuObj.style.left=''+(oldL)+'px';
if(leftMenuObj!=null){leftMenuObj.style.display='block';leftMenuObj.style.width=lW+'px';leftMenuObj.style.minHeight=($('left_menu_obj').offsetHeight)+'px';nTimes=0;JSCTimeOutID=setInterval(function(){nTimes++;leftMenuObj.style.left=''+(oldL+nTimes*lk)+'px';if(nTimes>=20){window.clearInterval(JSCTimeOutID)}},10);$('addPFrame').src='PseudoXMLHTTP.php?xml_id=left_menu_'+id+'&xml_file=<?php echo get_en_url('more.php'); ?>&show_o=index&column_id='+id+''}leftMenuObj.onmouseover=function(){this.style.display='block';this.style.left=''+oldL2+'px';window.clearInterval(JSCTimeOutID)};o.onmouseout=leftMenuObj.onmouseout=function(){leftMenuObj.style.display='none';leftMenuObj.style.left=''+oldL+'px';window.clearInterval(JSCTimeOutID)};}

function blinkOn(){leftMenuObj.style.left=(nTimes)+'px';nTimes++;if(nTimes>=209){window.clearTimeout(JSCTimeOutID)}}
-->
</script>

</body>
<iframe src="PseudoXMLHTTP.php?xml_id=weather&xml_file=<?php echo get_en_url('readonly/weather/getweather.php'); ?>&char=utf-8" style="display:none;" id="sendWeather"></iframe>
<iframe src="PseudoXMLHTTP.php?xml_id=collection&xml_file=<?php echo get_en_url('readonly/run/post_member_collection_show.php'); ?>" style="display:none;"></iframe>

<script type="text/javascript" language="javascript">
var opensugV = getCookie("opensug");
<?php echo file_exists('writable/js/opensug.js') ? '
var opensug = 1;
if (opensugV) {
  if (parseInt(opensugV.substr(0,1)) == 0) {
    opensug = 0;
  }
}
var opensugUrl = \'writable/js/opensug.js?'.filemtime('writable/js/opensug.js').'\';
' : '
var opensug = 0;
if (opensugV) {
  if (parseInt(opensugV.substr(0,1))==1) {
    opensug = 1;
  }
}
var opensugUrl = \'readonly/js/opensug.js\';
'; ?>
if (opensug == 1) {
  document.write('<scr'+'i'+'pt type="text/javascript" language="javascript" src="'+opensugUrl+'"></scr'+'i'+'pt>');
}
</script>
<script type="text/javascript" language="javascript" src="readonly/js/expires.php"></script>
<?php
if ($web['link_type_i'] == 0) {
  @ include ('writable/chuchuang/ad_juejinlian.txt');
}
?>
</html>
