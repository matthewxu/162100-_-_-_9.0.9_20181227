<?php

/* 频道 - 即大类 */

$self = 'column.php';

@ require ('writable/set/set.php');
if (!isset($sql)) {
  @ require ('writable/set/set_sql.php');
}
if (!isset($web['area'])) {
  @ require ('writable/set/set_area.php');
}
if (!isset($web['html'])) {
  @ require ('writable/set/set_html.php');
}


$text = '';
$tcolor = 0;
$array_color = array('red', 'orange', 'green', 'blue');
$list_class_title = '<a id="class_is" href="javascript:void(0);" onclick="showListClass(this,null);return false;"><b>全部</b></a>';

if (isset($_GET['column_id'])) {
  @ $_GET['column_id'] = preg_replace('/[^\w]/', '', $_GET['column_id']);

  //if (!array_key_exists($_GET['column_id'], $web['area'])) {
  if (!isset($web['area'][$_GET['column_id']])) {
    die('&#20998;&#31867;&#73;&#68;&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
  }
/*
//转向静态页
if ($web['html'] == true && file_exists($web['area'][$_GET['column_id']]['name'][1].'.html')) {
  header('Location: '.$web['area'][$_GET['column_id']]['name'][1].'.html');
}
*/

  $title = $web['area'][$_GET['column_id']]['name'][0];
  $cssmark = $mark = 0;
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    //$column_py = $web['area'][$_GET['column_id']]['name'][1];
    //unset($web['area'][$_GET['column_id']]['name']);
    foreach ($web['area'][$_GET['column_id']] as $class_id => $class) {
      if ($class_id === 'name') continue;
	  $cssmark++;
    $tcolor_key = $array_color[($tcolor + 4) % 4].'word';
    $tcolor ++;
$column_title = get_class_html($_GET['column_id'], $class_id);
          $list_class_title .= '<a href="javascript:void(0);" onclick="showListClass(this,'.$cssmark.');return false;">'.$class[0].'</a>';



	  $text .= '
      <div class="column" id="column_'.$cssmark.'"'.($cssmark==1?' style="margin-top:0;"':'').'><input type="hidden" name="column[]">
        <div class="column_title"><a onmouseover="addC(this)" onclick="addM(this)" href="'.$column_title.'" class="tcolor '.$tcolor_key.'">'.$class[0].'</a></div>';
      $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$class_id.'" AND class_title NOT LIKE "栏目置顶%" AND class_title NOT LIKE "栏目头栏%" AND detail_title="" ORDER BY id');
      if ($result != false) {
        $text .= '<div class="class">';
        while ($row = db_fetch($db, $result)) {
	      $mark++;
          list($class_title, , ) = @explode('|', $row['class_title']);
          $n = count(@explode("\n", trim($row['http_name_style'])));
          $text .= '<span class="class_w_4"><a onmouseover="addC(this)" onclick="addM(this)" href="'.$column_title.'#class_title_'.$mark.'">'.$class_title.'<font style="color:#BBBBBB;">（'.$n.'）</font></a></span>';
          unset($row, $n);
        }
	    $mark = 0;
        $text .= '</div>';
      } else {
        //$text .= $_GET['column_id'].' - '.$class_id.' 的数据为空或读取失败！';
      }
      $result = NULL;

        $text .= '
      </div>
';
    }
  } else {
    $err = $sql['db_err'];
  }
  db_close($db);

} else {
  $title = '网站地图';
  $cssmark = 0;
  foreach ((array)$web['area'] as $column_id => $column) {
    $cssmark++;
    $tcolor_key = $array_color[($tcolor + 4) % 4].'word';
    $tcolor ++;
    $column = (array)$column;
          $list_class_title .= '<a href="javascript:void(0);" onclick="showListClass(this,'.$cssmark.');return false;">'.$column['name'][0].'</a>';
    $text .= '
  <div class="column" id="column_'.$cssmark.'"'.($cssmark==1?' style="margin-top:0;"':'').'><input type="hidden" name="column[]">
  <div class="column_title"><a onmouseover="addC(this)" onclick="addM(this)" href="'.get_column_html($column_id).'" class="tcolor '.$tcolor_key.'">'.$column['name'][0].'</a></div>
  <div class="class">';
    unset($column['name']);
    foreach ($column as $class_id => $class) {
      $text .= '<span class="class_w_4"><a onmouseover="addC(this)" onclick="addM(this)" href="'.get_class_html($column_id, $class_id).'">'.$class[0].'</a></span>';
    }
    $text .= '</div>
      </div>
';
  }
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title.' - '.$web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script type="text/javascript" language="javaScript">
<!--
function showListClass(o,sid){if(o!=null){try{$('class_is').id=''}catch(e){}o.id='class_is'}var allCheckBox=document.getElementsByName('column[]');if(allCheckBox!=null&&allCheckBox.length>0){for(var i=1;i<=allCheckBox.length;i++){if(sid!=null){if(i==sid){try{$('column_'+sid+'').style.display='block'}catch(e){}}else{try{$('column_'+i+'').style.display='none'}catch(e){}}}else{try{$('column_'+i+'').style.display='block'}catch(e){}}}}}
-->
</script>
</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./">首页</a><a id="top_title_is"><?php echo $title; ?></a></div>

<img src="readonly/images/star.gif" id="star" style="display:none" title="加入收藏" />
<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe>

<div class="body"><div id="list_class"><?php echo $list_class_title; ?></div></div><div class="body">
  <?php echo $text, $err; ?>
</div>
<?php
if (file_exists('writable/chuchuang/ad_bottom.txt')) {
  @ include ('writable/chuchuang/ad_bottom.txt');
}
?>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>


</body>
</html>
