<div style=" background:#F3FDC3;">
<?php

/* 更多 */

@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
@ require ('writable/set/set_area.php');
@ require ('writable/set/set_html.php');

function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  //$text = str_replace('/', '&#47;', $text);
  return $text;
}

@ $_GET = array_map('htmlspecialchars', $_GET);

@ $_GET['column_id'] = preg_replace('/[^\w]/', '', $_GET['column_id']);
@ $_GET['class_id'] = preg_replace('/[^\w]/', '', $_GET['class_id']);

//if (!(isset($_GET['column_id']) && array_key_exists($_GET['column_id'], $web['area']))) {
if (!(isset($_GET['column_id']) && isset($web['area'][$_GET['column_id']]))) {
  die('&#20998;&#31867;&#73;&#68;'.$_GET['column_id'].'&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
}

if (isset($_GET['show_o']) && $_GET['show_o'] == 'index') {
  $text = '';
  $tcolor = 0;
  $array_color = array('red', 'orange', 'green', 'blue');
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
	  $text .= '
      <div class="column" style="line-height:180%;'.($cssmark==1?' margin-top:0;':'').'">
        <div class="column_title_" style="width:90px; float:left; text-align:right; font-family:宋体;"><a href="'.$column_title.'" class="tcolor '.$tcolor_key.'" style="border:none; ">'.$class[0].' &gt; </a> </div>';
      $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$class_id.'" AND class_title NOT LIKE "栏目置顶%" AND class_title NOT LIKE "栏目头栏%" AND detail_title="" ORDER BY id');
      if ($result != false) {
        $text .= '<div class="class" style=" width:660px; float:right;">';
        while ($row = db_fetch($db, $result)) {
	      $mark++;
          list($class_title, , ) = @explode('|', $row['class_title']);
          $text .= ' <span style="white-space:nowrap;">| <a onmouseover="addC(this)" onclick="addM(this)" href="class.php?column_id='.$_GET['column_id'].'&class_id='.$class_id.'&class_title_to=class_title_'.$mark.'#list_class">'.$class_title.'</a></span>';
          //$text .= ' <span style="white-space:nowrap;">| <a onmouseover="addC(this)" onclick="addM(this)" href="more.php?list_fr=index_hiddenmenu&column_id='.$_GET['column_id'].'&class_id='.$class_id.'&class_title='.urlencode($class_title).'#class_title_'.$mark.'">'.$class_title.'</a></span>';
          unset($row);
        }
	    $mark = 0;
        $text .= '</div>';
      } else {
        //$text .= $_GET['column_id'].' - '.$class_id.' 的数据为空或读取失败！';
      }
      $result = NULL;
      $text .= '  <div style="clear:both; height:0px; overflow:hidden;">&nbsp;</div></div>';
    }
  } else {
    $err = $sql['db_err'];
  }
  db_close($db);

  echo '
<style type="text/css">
<!--
#left_menu_'.$_GET['column_id'].' { background:#F3FDC3; }
.column_title_ .tcolor {}
.column_title_ a.tcolor { /*display:block; font-weight:bold; border-bottom:1px solid;*/ }
-->
</style>
';
  echo $text.$err;

} else {
  echo '&#x547D;&#x4EE4;&#x9519;&#x8BEF;&#xFF01;';
}

?>
</div>