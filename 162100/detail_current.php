<?php

/* 专题 */

$self = 'detail.php';

@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
@ require ('writable/set/set_area.php');
@ require ('writable/set/set_html.php');

if (isset($GLOBALS['page_style'])) {
  unset($GLOBALS['page_style']);
}

if (!function_exists('get_page')) {
  @ require ('readonly/function/get_page.php');
}
if (!function_exists('get_en_url')) {
  function get_en_url($d) {
    return urlencode(base64_encode($d));
  }
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

if (!isset($_GET['http_type'])) {
  $ssd = abs($web['area'][$_GET['column_id']][$_GET['class_id']][3]);

} else {
  if (empty($_GET['http_type']) || (abs($_GET['http_type']) !== 0 && abs($_GET['http_type']) !== 1 && abs($_GET['http_type']) !== 2)) {
    $ssd = 0;
  } else {
    $ssd = $_GET['http_type'];
  }
}

if (!function_exists('get_list_mode_0')) {
function get_list_mode_0($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.'_s"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_1')) {
function get_list_mode_1($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.'_s"'.($h[4] != '' ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_2')) {
function get_list_mode_2($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.'_s"><div class="class_wrap"><h4 class="site_title"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'" class="site_title"><h4'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</h4>
<div class="class_http"><a onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[0].'</a></div>
'.($h[4] != '' ? '<div class="class_line"></div><div class="class_description">'.$h[4].'</div>' : '').'</div></span>';
}
}
$GLOBALS['function_list_mode'] = 'get_list_mode_'.$ssd.'';


if (!function_exists('get_m_detail')) {
  function get_m_detail($h_n_s, $class_title, $p, $class_n = 4, $class_more = '', $i, $tcolor_key, $id = NULL) {
    global $web;
    $text = '';

    $n = 0;
    if ($h_n_s = trim($h_n_s)) {
      $text_class_n = $text_class_more = '';
	  $total_arr = @explode("\n", trim($h_n_s));
      $n = count($total_arr);
    }

    $p = preg_replace('/<style.+<\/style>/isU', '', trim($p));
    $text .= '
  <div class="column'.($web['area'][$_GET['column_id']][$_GET['class_id']][2]==1?' qiangdiao_class':'').'" name="class_title_'.$i.'" id="class_title_'.$i.'" style="border:none;'.($i==1?' margin-top:0;':'').'">
    <div class="column_title"><a class="tcolor '.$tcolor_key.'">'.$class_title.'<font style="font-weight:lighter;">（'.$n.'）</font></a></div>
        '.($p != '' ? '<div class="priority">'.$p.'</div>' : $p).'
    ';

      //导入网址链接
    if ($n > 0) {
        if (!empty($class_more) && is_numeric($class_more) && $class_more < $n) {
          $total_arr = array_slice($total_arr, 0, $class_more);
          $text_class_more .= get_page_foot2($n, $class_more, 1, 'PseudoXMLHTTP.php?xml_id=class_'.$i.'&xml_a=1&xml_file='.get_en_url('class_page.php').'&id='.$i.'&current=_s&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($class_title).'&detail_title='.urlencode($_GET['detail_title']).'&p=', 'addPFrame" onclick="addG(\''.$i.'\', this);', $class_n.'_s');
       }

        //$text .= $text_class_n.'<div class="class" id="class_'.$i.'">';
        $text .= '<div class="class" id="class_'.$i.'"><input type="hidden" name="wrap[]" />';
        foreach ($total_arr as $xh => $each) {
          $h = @explode("|", trim($each));

          if ($web['link_type'] == 1) {
            $link = $h[3] == "js" ? $h[0] : "export.php?url=".urlencode($h[0]);
          } else {
            $link = $h[3] == "js" ? "export.php?url=".urlencode($h[0]) : $h[0];
          }

          $text .= $GLOBALS['function_list_mode']($class_n, $link, $h, $id.'_'.(abs($xh)+1));
          unset($link);
        }
        $text .= ''.$text_class_more.'</div>';

    }
    $text .= '
    </div>
';

    return $text;
  }
}

/*
$get = $_GET;
unset($get['column_id'], $get['class_id'], $get['detail_title'], $get['http_type']);
if (!empty($get)) {
  die('err:get!');
}
unset($get);
*/
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

$_GET['detail_title'] = @htmlspecialchars($_GET['detail_title']);
if (empty($_GET['detail_title'])) {
  die('&#19987;&#39064;&#21442;&#25968;&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
}


$text = $text_ = $text__ = '';
$cssmark = 0;
$tcolor = 0;
$array_color = array('red', 'orange', 'green', 'blue');
$sort_arr = array();
$link_current = 'detail.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($_GET['detail_title']).'';

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {

  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title LIKE "'.$_GET['detail_title'].'|%"');
  if ($result != false) {
    while ($row = db_fetch($db, $result)) {
      if (!strstr($row['class_title'], '|') && $row['http_name_style'] == '') { // && trim($row['class_priority']) != ''这是头栏
        list(,$dpy, $ds) = @explode('|', $row['detail_title']);
        if ($web['html'] == true) {
          $link_current = $dpy.'.html';
        }

        if ($row['class_grab'] = trim($row['class_grab'])) {

          $text .= '
<div style="max-width:1000px; min-width:878px; margin-bottom:10px;">
  <iframe id="caijiFrame" name="caijiFrame" allowtransparency="true" frameborder="0" width="100%" scrolling="No" style=" background:url(readonly/images/loading2.gif) 50% 50% no-repeat; height:50px;"></iframe>
</div>
<script type="text/javascript" language="javaScript">
<!--

function caijiOnload(){
  $("caijiFrame").src="./caiji.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($row['class_title']).'&detail_title='.$_GET['detail_title'].'";
}

if (document.all) {
	window.attachEvent("onload", caijiOnload);
} else {
	window.addEventListener("load", caijiOnload, false);
}

-->
</script>


';

        } else {



        if (preg_replace('/<style.+<\/style>/isU', '', trim($row['class_priority'])) != '') {
          $text .= '
';
          @ list(,$dpy, $ds) = @explode('|', $row['detail_title']);
          @ list($dside, $dside_, $dside__, $dside___) = @explode('-', $ds);
/*
          $link_d = '"detail_current.php?column_id=".$_GET["column_id"]."&class_id=".$_GET["class_id"]."&detail_title=".urlencode($dt)."\" onclick=\"addSubmitSafe(1);addM(this);\" target=\"addCFrame\""';
*/

          $dside___ = abs($dside___) <= 120 ? 120 : (abs($dside___) >= 318 ? 318 : abs($dside___));
          //$bodywidth = 900 - 42 - $dside___;
          if (is_numeric($dside__) && $dside__ >= 1  && $dside__ <= 4) {
            $imgwidth = (int)($dside___ / $dside__);
            $text_dside .= '
<style type="text/css">
<!--
#detail_obj { width:'.$dside___.'px; overflow:hidden; text-align:center; }
#detail_obj span { width:'.$imgwidth.'px; height:90px; margin:0; text-align:center; overflow:hidden; display:inline-block !important; display:inline; zoom:1; }
#detail_obj span img { max-width:64px; max-height:64px; margin:0; padding:0; clear:both; }

-->
</style>';
          } else {
          }

          if (empty($ds)) {
            $text .= '
  <div class="priority">'.$row['class_priority'].'</div>';
          } else {
            $text .= '
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">';

            switch ($dside) {
              case 1 :
              $result_ = db_query($db, 'SELECT detail_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.$row['class_title'].'" AND detail_title<>"" AND (http_name_style="" AND class_priority<>"")');
              if ($result_ != false) {
                //if ($web['html'] == true) {
                //  $link_ = '"".$dpy_.".html"';
                //} else {
                //  $link_ = '"detail_current.php?column_id=".$_GET["column_id"]."&class_id=".$_GET["class_id"]."&detail_title=".urlencode($detail_title).""';
                //}
                //  $link_ = '"detail_current.php?column_id=".$_GET["column_id"]."&class_id=".$_GET["class_id"]."&detail_title=".urlencode($detail_title).""';
                //$text_dside .= '<div class="dside_title">同栏目下其它专题</div>';
                $text_dside .= '<div id="detail_out"><div id="detail_obj">';
                while ($row_ = db_fetch($db, $result_)) {
                  list($detail_title, $dpy_, ) = @explode('|', $row_['detail_title']);
                  $img_d = 'writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'].'/'.$dpy_;
                  $link_ = 'detail_current.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($detail_title).'';
                  if (isset($imgwidth)) {
                    $link_img = '<img src="'.(@file_exists($img_d.'.gif') ? $img_d.'.gif' : (@file_exists($img_d.'.jpg') ? $img_d.'.jpg' : (@file_exists($img_d.'.png') ? $img_d.'.png' : "readonly/images/i.gif"))).'" alt="'.$detail_title.'" /><br />'.$detail_title.'';
                  } else {
                    $link_img = $detail_title;
                  }
                  $text_dside .= '<span><a href="'.$link_.'" target="_self">'.$link_img.'</a></span>';
                  unset($row_, $detail_title, $dpy_, $img_d, $link_, $link_img);
                }
                $text_dside .= '</div></div>';
              }
              $result_ = NULL;

              break;
              case 2 :
              $result_ = db_query($db, 'SELECT class_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title<>"" AND class_title<>"栏目头栏" AND class_title<>"栏目置顶" AND detail_title="" ORDER BY id');
              if ($result_ != false) {
                //$text_dside .= '<div class="dside_title">上级全部栏目</div>';
                $tli = 0;
                $text_dside .= '<ul>';
                while ($row_ = db_fetch($db, $result_)) {
                  $tli++;
                  list($class_title, , ) = @explode('|', $row_['class_title']);
                  $text_dside .= '<li>
<a href="class.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'#class_title_'.$tli.'">'.$class_title.'</a></li>';
                  unset($row_, $class_title);
                }
                unset($link);
                $text_dside .= '</ul>';
              }
              $result_ = NULL;

              break;
              case 3 :
              $result_c = db_query($db, 'SELECT class_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title="" ORDER BY id');
              if ($result_c != false) {
                $sli = 0;
                //if ($web['html'] == true) {
                //  $link_ = '"".$dpy_.".html"';
                //} else {
                //  $link_ = '"detail.php?column_id=".$_GET["column_id"]."&class_id=".$_GET["class_id"]."&detail_title=".urlencode($detail_title).""';
                //}
                //  $link_ = '"detail.php?column_id=".$_GET["column_id"]."&class_id=".$_GET["class_id"]."&detail_title=".urlencode($detail_title).""';
                if (isset($imgwidth)) {
                  $text_dside .= '<div id="detail_out"><div id="detail_obj">';                  
                }
                while ($row_c = db_fetch($db, $result_c)) {
                  $sli++;
                  list($class_title_c, ) = @explode('|', $row_c['class_title']);
                  if (!isset($imgwidth)) {
                    $text_dside .= '<div class="dside_title">
<a href="class.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'#class_title_'.$sli.'">'.$class_title_c.'</a></div><div id="detail_out"><div id="detail_obj">';                 

                  }
                  if ($class_title_c) {
                    $result_ = db_query($db, 'SELECT detail_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND (detail_title<>"" AND http_name_style="" AND class_priority<>"") AND class_title="'.$class_title_c.'" ORDER BY detail_title');
                    if ($result_ != false) {
                      while ($row_ = db_fetch($db, $result_)) {
                        list($class_title, , ) = @explode('|', $row_['class_title']);
                        list($detail_title, $dpy_, ) = @explode('|', $row_['detail_title']);
                        $img_d = 'writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'].'/'.$dpy_;
                        $ct = urlencode($class_title);
                        $link_ = 'detail.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($detail_title).'';
                        if (isset($imgwidth)) {
                          $link_img = '<img src="'.(@file_exists($img_d.'.gif') ? $img_d.'.gif' : (@file_exists($img_d.'.jpg') ? $img_d.'.jpg' : (@file_exists($img_d.'.png') ? $img_d.'.png' : "readonly/images/i.gif"))).'" alt="'.$detail_title.'" /><br />'.$detail_title.'';
                        } else {
                          $link_img = $detail_title;
                        }
                        $text_dside .= '<span><a href="'.$link_.'" target="_self">'.$link_img.'</a></span>';
                        unset($row_, $class_title, $ct, $detail_title, $dpy_, $link, $link_img);
                      }
                    }
                    $result_ = NULL;
                  }
                  if (!isset($imgwidth)) {
                    $text_dside .= '</div></div>';                  
                  }
                }
                if (isset($imgwidth)) {
                  $text_dside .= '</div></div>';                  
                }
                unset($row_c, $class_title_c);
              }
              $result_c = NULL;
              break;
              default :
            }

            switch ($dside_) {
              case 'r' :
              $text .= '
<style type="text/css">
<!--
.dside_left { line-height:29px; text-align:center; }
#detail_body { overflow:hidden; }
.dside_right { width:'.$dside___.'px; padding-left:7px; border-left:1px #D4D4D4 solid; font-size:12px; text-align:left; }
.dside_right li a { color:#0033CC; font-family:宋体; white-space:nowrap; }
-->
</style>
      <td class="dside_left"><div id="detail_body">'.$row['class_priority'].'</div></td>
      <td class="dside_right">'.$text_dside.'</td>';
              break;
              case 'l' :
              $text .= '
<style type="text/css">
<!--
.dside_left { width:'.$dside___.'px; padding-right:7px; border-right:1px #D4D4D4 solid; font-size:12px; text-align:left; }
.dside_left li a { color:#0033CC; font-family:宋体; white-space:nowrap; }
.dside_right { line-height:29px; text-align:center; }
#detail_body { overflow:hidden; }
-->
</style>
      <td class="dside_left">'.$text_dside.'</td>
      <td class="dside_right"><div id="detail_body">'.$row['class_priority'].'</div></td>';

              break;
              default :
              $text .= '
      <td><div class="priority">'.$row['class_priority'].'</div></td>';
              break;
            }
            $text .= '
    </tr>
  </table>';
            unset($text_dside);
          }
          $text .= '
';
        } else {
          $text .= $row['class_priority'];
        }

        }
        continue;
      } else {
        list($class_title, $class_n, $class_more) = @explode("|", $row['class_title']);
        $class_n = $class_n ? $class_n : 4;
        if ($class_title == '栏目置顶') {
          $sort_arr[] = '"class_top":'.$class_n.'';
          $text .= get_m_detail($row['http_name_style'], '栏目置顶', $row['class_priority'], $class_n, $class_more, 'top', '', $row['id']);
          continue;
        } else {
          $tcolor_key = $array_color[($tcolor + 4) % 4].'word';
          $tcolor ++;
          $cssmark++;
          $sort_arr[] = '"class_'.$cssmark.'":'.$class_n.'';
          $text__ .= get_m_detail($row['http_name_style'], $class_title, $row['class_priority'], $class_n, $class_more, $cssmark, $tcolor_key, $row['id']);
	    }
      }
      unset($row, $class_title, $class_n, $class_more, $tcolor_key);
    }
  } else {
    $err = '读取失败！没有查到此专题应用';
  }
  $result = NULL;


} else {
  $err = $sql['db_err'];
}

db_close($db);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_GET['detail_title'].' - '.$web['sitename2'], $web['code_author']; ?></title>
<base target="_blank" />
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
.dside_title, .dside_title a { font-weight:bold; color:#969696; }
#detail_obj span { display:block; margin-left:12px; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script type="text/javascript" language="javaScript" src="readonly/js/current.js?<?php echo filemtime('readonly/js/current.js'); ?>"></script>
<script type="text/javascript" language="javaScript">
<!--
if(par==null || parent==self){
  location.href='<?php echo $link_current; ?>';
}
function atParSize() {
  var bot=document.getElementById('body_tl');
  var bop=bop==null?bop=document.getElementById('body_p'):bop;
  var thisH=thisH==null?par.offsetHeight:thisH;
  if(bot!=null){
    var botH=bot.offsetHeight;
    var bopH=bop.offsetHeight-2;
    var diff=bopH-botH;
    if(diff>0){
      bop.style.height=botH+'px';
      par.style.height=(thisH-diff)+'px';
      par.style.top=(t+diff/2)+'px';

    }
  }
}
/*
function parNarrow(){
  if (par!=null){
    var parShowH=parent.document.documentElement.clientHeight;
    par.style.position='fixed';
    par.style.top=(parShowH-38)+'px';
    par.style.left=(parShowH-38)+'px';
    par.style.height='38px';
    parent.delSubmitSafe();
    parShowH=null;
    parent.window.onresize=window.onresize=function(){parNarrow();}
  }
}
*/
/*
if (document.all) {
  window.attachEvent('onload', atParSize);//对于IE
} else {
  window.addEventListener('load', atParSize, false);//对于FireFox
}
*/

if(navigator.userAgent.indexOf("MSIE")>0){
  var location='';
}

-->
</script>
<script type="text/javascript" language="javaScript">
<!--
function addG(objId, linkObj) {
	linkObj.innerHTML = '载入中…';
      var centerObj = linkObj.parentNode.parentNode.parentNode;
      if (centerObj.tagName == 'CENTER') {
        if ($('temppage')!=null){$('temppage').id='';}
        centerObj.id = 'temppage'
	    setTimeout(function (){$('temppage').style.display = 'none';}, 1000);
      }


<?php
if($ssd==2){
?>
setTimeout('Sort(document.getElementById(\'class_' + objId+'\'));', 1000);
<?php
}
?>
}
-->
</script>
<?php
if ($ssd==1) {
?>
  <?php
}
if($ssd==2){
?>
  <style>
.class { line-height:150%; word-wrap:break-word;word-break:break-all; }
.class .class_wrap { margin:2px; border:1px #DDDDDD solid; background-color:#FFFFE7; overflow:hidden; }
.class .class_wrap:hover { background-color:#F9F9F9; }
.class .class_wrap .site_title { margin:5px 0; }
.class .class_wrap .class_line { height:0; margin:0 10px; overflow:hidden; clear:both; border-bottom:1px #DDDDDD dotted; }
.class .class_wrap .class_http { font-size:12px; margin:5px 0; }
.class .class_wrap .class_http a { font-size:12px; }
.class .class_wrap .class_description { margin:5px 10px; color:#999999; font-size:12px; text-align:left; }
.class .class_wrap .class_description a.xiangxi { color:#669966; display:inline !important; margin:0; padding:0; white-space:nowrap; }
   </style>
<script type="text/javascript" language="javascript">
<!--
function Sort(wrap){var n={<?php echo@implode(',',$sort_arr);?>};var columnW=parseInt(wrap.offsetWidth/n[wrap.id]);var icolumnT=[];for(var k=0;k<n[wrap.id];k++){icolumnT[k]=0}var minHK;var box=wrap.childNodes;wrap.style.position='relative';if(box.length>0){for(var i=0;i<box.length;i++){if(box[i].nodeType==1){minHK=MK(icolumnT);icolumnT[minHK[0]]=minHK[1];box[i].style.position='absolute';box[i].style.top=icolumnT[minHK[0]]+'px';box[i].style.left=(minHK[0]*columnW)+'px';icolumnT[minHK[0]]+=box[i].offsetHeight}}wrap.style.height=Math.max.apply({},icolumnT)+'px'}};function MK(arr){var minArr;var minV=arr[0];minArr=new Array(0,minV);for(var i=1;i<arr.length;i++){if(arr[i]<minV){minV=arr[i];minArr=new Array(i,arr[i])}}return minArr}function sortAll(){var allWrap=document.getElementsByName('wrap[]');var n=0;if(allWrap!=null&&allWrap.length>0){for(var i=0;i<allWrap.length;i++){Sort(allWrap[i].parentNode)}}}if(document.all){window.attachEvent('onload',sortAll)}else{window.addEventListener('load',sortAll,false)}
-->
</script>

<?php
}
?>
</head>
<body style="background-color:transparent; background-image:none;">
<img src="readonly/images/star.gif" id="star" style="display:none" title="加入收藏" />
<img src="readonly/images/star_d.gif" id="star_d" style="display:none" />
<div class="i1">&nbsp;</div>
<div class="i2">&nbsp;</div>
<div class="i3">&nbsp;</div>
<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe>

<div id="nav">
  <div id="nav_mingz"><a href="./">首页</a> / <a href="<?php echo get_column_html($_GET['column_id']); ?>"><?php echo $web['area'][$_GET['column_id']]['name'][0]; ?></a> / <a href="<?php echo get_class_html($_GET['column_id'], $_GET['class_id']); ?>"><?php echo $web['area'][$_GET['column_id']][$_GET['class_id']][0]; ?></a> / <?php echo $_GET['detail_title']; ?></div>
  <div id="nav_session"><a href="<?php echo $link_current; ?>" title="展开" target="_parent"><img src="readonly/images/y.gif" class="close" /></a> <!--a href="javascript:void(0)" title="缩小" onclick="parNarrow()" target="_self"><img src="readonly/images/z.gif" class="close" /></a--> <a href="about:blank" title="关闭" onclick="parClose()" target="_self"><img src="readonly/images/x.gif" class="close" /></a></div>
</div>
<div class="body" id="body"><div id="body_p"><div id="body_p_in">
<?php
if (!isset($err)) {
  $text____ = (!empty($text_) || !empty($text__)) ? $text_.$text__ : '';
  echo (isset($priority_pos_key) && abs($priority_pos_key) == 1) ? $text____.$text : $text.$text____;
} else {
  echo '
    <div class="output">'.$err.'</div>';
}
?>
<?php
if (isset($imgwidth)) {
?>
<script language="javascript" type="text/javascript">
<!--

function startDList(showHeight){function $(objId){return document.getElementById(objId);}
var dOut=$('detail_out');var dObj=$('detail_obj');dOut.style.overflow='hidden';var dObjMarginTop=0;var firstLi=dObj.firstChild;while(firstLi&&firstLi.nodeType!==1){firstLi=firstLi.nextSibling;}
childLiHeight=firstLi==null?90:firstLi.offsetHeight;showHeight=showHeight<childLiHeight?childLiHeight:showHeight;showHeight=parseInt(showHeight/childLiHeight)*childLiHeight;dOut.style.height=showHeight+'px';dObjH=dObj.offsetHeight;if(dObjH>showHeight){var newDiv=document.createElement('DIV');newDiv.style.width=dOut.offsetWidth+'px';newDiv.innerHTML+='<button type="button" id="detail_up">∧</button><button type="button" id="detail_down">∨</button>';dOut.parentNode.insertBefore(newDiv,null);}
$('detail_up').style.cssText=$('detail_down').style.cssText='width:50%; height:24px; line-height:18px; overflow:hidden; font-size:18px; font-weight:bold; font-family:"Microsoft YaHei"; text-align:center;';$('detail_down').onmousedown=function(){calcCountTimer=setInterval(function(){if(Math.abs(dObjMarginTop)>=dObjH-showHeight){window.clearInterval(calcCountTimer);return false;}
dObjMarginTop-=childLiHeight;dObj.style.marginTop=dObjMarginTop+'px';},100);}
$('detail_up').onmousedown=function(){calcCountTimer=setInterval(function(){if(dObjMarginTop>=0){window.clearInterval(calcCountTimer);return false;}
dObjMarginTop+=childLiHeight;dObj.style.marginTop=dObjMarginTop+'px';},100);}
$('detail_up').onmouseup=$('detail_down').onmouseup=function(){window.clearInterval(calcCountTimer);}}

function getDList_() {
  startDList($('detail_body').offsetHeight);
}
if (document.all) {
  window.attachEvent('onload', getDList_);//对于IE
} else {
  window.addEventListener('load', getDList_, false);//对于FireFox
}

-->
</script>
<?php
}
?>
</div></div></div>
<div class="i3">&nbsp;</div>
<div class="i2">&nbsp;</div>
<div class="i1">&nbsp;</div>
<?php
if ($web['link_type'] == 0) {
  @ include ('writable/chuchuang/ad_juejinlian.txt');
}
?>
</body>
</html>