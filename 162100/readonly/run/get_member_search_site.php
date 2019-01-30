<?php
require ('authentication_member.php');
?>
<?php

@ require ('writable/set/set_area.php');

//处理关键字
function process_input() {
  global $str_kw;
  $str = preg_replace('/[^\x80-\xffa-zA-Z0-9\s]+/', '', trim($_GET['kw']));//\u4e00-\u9fa5
  $str_kw = preg_replace('/\s+/', ' ', $str);
  $str = preg_replace('/\s+/', '.*', $str);//\u4e00-\u9fa5
  //$str = trim($str);
  return $str;
}
//加亮标题中的关键字
function red_keyword_title($str) {
  global $keyword;
  return @preg_replace('/('.$keyword.')/i', '<span class="redword">$1</span>', $str);
}

//print_r($_GET);die;
$keyword = process_input();
?>
    <script type="text/javascript" language="JavaScript">
<!--
function confirmWhat(theForm){if(theForm.kw2.value!=''){theForm.submit();}else{alert('搜索关键词不能空！');return false;}}
-->
</script>

<form id="f2" name="f2" action="member.php?get=search_site" method="get" onsubmit="return confirmWhat(this);">
      <input name="get" type="hidden" value="search_site" />
      <input name="kw" id="kw2" type="text" maxlength="100" style="width:450px;" value="<?php echo $str_kw; ?>" />
      <button id="su2" type="submit">站内搜索</button> 模糊搜索请加空格
    </form>


<?php
/*
if (!empty($_SERVER['HTTP_REFERER'])) {
  if (!strstr($_SERVER['HTTP_REFERER'], $web['sitehttp'])) {
    die('搜索来路错！');
  }
}
*/

$text = '';
$n = 0;
if ($keyword != '') :

  $arr = array();
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT column_id,class_id,http_name_style FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE http_name_style REGEXP "(^|\n)[^\|\r\n]+\|[^\|\r\n]*'.$keyword.'" AND class_title<>"栏目头栏"');
    if ($result != false) {
      while ($row = db_fetch($db, $result)) {
        preg_match_all('/(^|\n)([^\|\r\n]+)\|([^\|\r\n]*('.$keyword.')[^\|\r\n\>]*)\|([^\|\r\n]*)\|/iU', $row['http_name_style'], $matches);
        if (is_array($matches[3]) && count($matches[3]) > 0) {
          foreach ((array)$matches[3] as $key => $val) {
            $val = strip_tags($val);
            //if (!isset($arr[$matches[1]]) && $val != '') {
              $n++;
	          $text .= '<li><a onmouseover="addC(this)" onclick="addM(this)" href="'.$matches[2][$key].'"'.($matches[5][$key] != '' ? ' class="'.$matches[5][$key].'"' : '').' target="_blank">'.red_keyword_title($val).'</a> <span style="font-size:12px;color:#999999;">[<a href="class.php?column_id='.$row['column_id'].'&class_id='.$row['class_id'].'" target="_blank" class="grayword">'.$web['area'][$row['column_id']][$row['class_id']][0].'</a>]</span></li>';
              @ $arr[$matches[2]] = true;
            //}
            //if ($_GET['qt'] == 40) {
              //if ($n >= 40) break 2;
            //}
          }
          unset($row, $matches);
        }
      }
    } else {
      $text .= '<div class="output">没有查到相应记录</div>';
    }
    $result = NULL;
  } else {
    $text .= $sql['db_err'];
  }
  db_close($db);

else :
  $text .= '<div class="output">关键字不能空！</div>';

endif;

?>
<img src="readonly/images/star.gif" id="star" style="display:none" title="加入收藏" />
<?php echo ($text != '' ? '<div class="note">共收到'.$n.'条记录</div><ul>'.$text.'</ul>' : '<div class="output">没有查到相应记录</div>'); ?>
