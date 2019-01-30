<?php
require ('authentication_member.php');
?>
<?php


//处理关键字
function process_input() {
  $str = preg_replace('/[^\x80-\xffa-zA-Z0-9]+/', '', $_GET['kw']);//\u4e00-\u9fa5
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

$text = $err = '';
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
        preg_match_all('/(^|\n)([^\|\r\n]+)\|([^\|\r\n]*('.$keyword.')[^\|\r\n\>]*)\|([^\|\r\n]*).*/iU', $row['http_name_style'], $matches);
        foreach ((array)$matches[2] as $key => $val) {
          $val = strip_tags($val);
          //if (!isset($arr[$matches[1]]) && $val != '') {
            $n++;
	        $text .= '<div><a onmouseover="addC(this)" onclick="addM(this)" href="'.$matches[1][$key].'"'.($matches[4][$key] != '' ? ' class="'.$matches[4][$key].'"' : '').'>'.red_keyword_title($val).'</a> <span style="font-size:12px;color:#999999;">[<a href="class.php?column_id='.$row['column_id'].'&class_id='.$row['class_id'].'" class="grayword">'.$web['area'][$row['column_id']][$row['class_id']][0].'</a>]</span></div>';
            @ $arr[$matches[1]] = true;
          //}
          //if ($_GET['qt'] == 40) {
            //if ($n >= 40) break 2;
          //}
        }
        unset($row, $matches);
      }
    } else {
      $err = '没有查到相应记录';
    }
    $result = NULL;
  } else {
    $err .= $sql['db_err'];
  }
  db_close($db);

else :
  $err = '关键字不能空！';

endif;

?>


<?php err('<style type="text/css">
<!--
body { width:auto; padding:0 10px 0 20px; height:auto; background-color:#FFFFCC; text-align:left; background-image:none; }
-->
</style>



<img src="readonly/images/star.gif" id="star" style="display:none" title="加入收藏" /><script language="javascript" type="text/javascript">
<!--
//调出用户信息弹窗
window.onload=function(){
  var par=parent.document.getElementById("t2Frame");
  if(par!=null){
    try{
      par.style.height=document.body.offsetHeight+\'px\';
    }catch(err){
    }
  }
}
//-->
</script>'.($text != '' ? '<div><b>共收到'.$n.'条记录</b></div>'.$text : $err)); ?>
