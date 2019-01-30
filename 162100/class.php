<?php

$self = 'class.php';

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
  return '<span class="class_w_'.$class_n.'"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_1')) {
function get_list_mode_1($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.'"'.($h[4] != '' ? ' title="'.html_back($h[4]).'" onmouseover="sSD(this,event);"' : '').'><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</span>';
}
}
if (!function_exists('get_list_mode_2')) {
function get_list_mode_2($class_n, $href, $h, $id_site_id = NULL) {
  return '<span class="class_w_'.$class_n.'"><div class="class_wrap"><h4 class="site_title"><a onmouseover="addC(this, \''.$id_site_id.'\')" onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[1].'</a>'.$h[5].'</h4>
<div class="class_http"><a onclick="addM(this)" href="'.$href.'"'.($h[2] != '' ? ' class="'.$h[2].'"':'').'>'.$h[0].'</a></div>
'.($h[4] != '' ? '<div class="class_line"></div><div class="class_description">'.$h[4].'</div>' : '').'</div></span>';
}
}
$GLOBALS['function_list_mode'] = 'get_list_mode_'.$ssd.'';

if (!function_exists('get_m_class')) {
  function get_m_class($h_n_s, $class_title, $p, $class_n = 4, $class_more = '', $i, $tcolor_key, $id = NULL) {
    global $web, $sql, $db;
    $text = '';

    $n = 0;
    if ($h_n_s = trim($h_n_s)) {
      $text_class_n = $text_class_more = '';
	  $total_arr = @explode("\n", trim($h_n_s));
      $GLOBALS['LT'] = $n = count($total_arr);
    }



    $text .= '
  <div class="column'.($web['area'][$_GET['column_id']][$_GET['class_id']][2]==1?' qiangdiao_class':'').'" name="class_title_'.$i.'" id="class_title_'.$i.'"'.($i==1?' style="margin-top:0;"':'').'><input type="hidden" name="class_title[]" />
    <div class="column_title"><a class="tcolor '.$tcolor_key.'">'.$class_title.'<font style="font-weight:lighter;">（'.$n.'）</font></a></div>
        '.(preg_replace('/<style.+<\/style>/isU', '', trim($p)) != '' ? '<div class="priority">'.$p.'</div>' : $p).'';
    //导入专题链接
    $db_comm = 'FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.$class_title.'" AND detail_title<>"" AND http_name_style="" AND class_priority<>"" ORDER BY detail_title';
    $result = db_query($db, 'SELECT COUNT(id) AS total '.$db_comm.'');
    $row = db_fetch($db, $result);
    $n2 = abs($row['total']);
    $result = NULL;
    unset($row);
    if ($n2 > 0) {
      $result = db_query($db, 'SELECT class_title,detail_title '.$db_comm.'');
      $text .= '<div class="yingyong" title="这里是站内专题应用区">';
      while ($row = db_fetch($db, $result)) {
        list($dt, $dpy, ) = @explode('|', $row['detail_title']);
        $d_img_dir = 'writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'].'/'.$dpy;
        if (@file_exists($d_img_dir.'.gif')) {
          $dimg = '<img src="'.$d_img_dir.'.gif" /><br />';
        } else {
          if (@file_exists($d_img_dir.'.jpg')) {
            $dimg = '<img src="'.$d_img_dir.'.jpg" /><br />';
          } else {
            if (@file_exists($d_img_dir.'.png')) {
              $dimg = '<img src="'.$d_img_dir.'.png" /><br />';
            } else {
              $dimg = '';
            }
          }
        }
        $text .= '<span><a onmouseover="addC(this)" href="detail_current.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&detail_title='.urlencode($dt).'" onclick="addSubmitSafe(1);addM(this);" target="addCFrame">'.$dimg.''.$dt.'</a></span>';
        unset($row, $dt, $dpy, $dimg, $d_img_dir);
      }
      $text .= '</div>';
    }
    $result = NULL;


    //导入网址链接
    if ($n > 0) {
        if (!empty($class_more) && is_numeric($class_more) && $class_more < $n) {
          $total_arr = array_slice($total_arr, 0, $class_more);
          $text_class_more .= get_page_foot2($n, $class_more, 1, 'PseudoXMLHTTP.php?xml_id=class_'.$i.'&xml_a=1&xml_file='.get_en_url('class_page.php').'&id='.$i.'&current=&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($class_title).'&p=', 'addPFrame" onclick="addG(\''.$i.'\', this);', $class_n);

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
    if ($n + $n2 == 0) {
      //$text .= '没有网址数据！';
    }
    $text .= '
    </div>
';
    return $text;
  }

}

unset($_GET['detail_title']);
/*
$get = $_GET;
unset($get['column_id'], $get['class_id'], $get['http_type'], $get['for_self_menu']);
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
/*
//转向静态页
if ($web['html'] == true && file_exists($web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html')) {
  header('Location: '.$web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');
}
*/

$text = $text_ = $text__ = '';
$cssmark = 0;
$tcolor = 0;
$array_color = array('red', 'orange', 'green', 'blue');
$sort_arr = array();
$list_class_title = '<a id="class_is" name="list_class_title_all" href="javascript:void(0);" onclick="showListClass(this, \'all\');return false;"><b>全部</b></a>';

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title="" ORDER BY id');
  if ($result != false) {
    while ($row = db_fetch($db, $result)) {
      if (strstr($row['class_title'], '栏目头栏') && $row['http_name_style'] == '') { //这是头栏$priority_pos_key
      //if (!strstr($row['class_title'], '|') && $row['http_name_style'] == '' && trim($row['class_priority']) != '') { //这是头栏
        if ($row['class_grab'] = trim($row['class_grab'])) {
          $text .= '
<div class="body">
  <iframe id="caijiFrame" name="caijiFrame" allowtransparency="true" frameborder="0" width="100%" scrolling="No" style=" background:url(readonly/images/loading2.gif) 50% 50% no-repeat; height:50px;"></iframe>
</div>
<script type="text/javascript" language="javaScript">
<!--

function caijiOnload(){
  $("caijiFrame").src="./caiji.php?column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode('栏目头栏').'&detail_title=";
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
<div class="body">
  <div class="priority">'.$row['class_priority'].'</div>
</div>';
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
          $text_ .= get_m_class($row['http_name_style'], '栏目置顶', $row['class_priority'], $class_n, $class_more, 'top', '', $row['id']);
          continue;
        } else {
          $tcolor_key = $array_color[($tcolor + 4) % 4].'word';
          $tcolor ++;
          $cssmark++;
          $sort_arr[] = '"class_'.$cssmark.'":'.$class_n.'';
          //$list_class_title .= '<a href="javascript:void(0);" onclick="showListClass(this,\'body_\',this.innerHTML,\'\');return false;">'.$class_title.'</a>';
$GLOBALS['LT'] = 0;
          $text__ .= get_m_class($row['http_name_style'], $class_title, $row['class_priority'], $class_n, $class_more, $cssmark, $tcolor_key, $row['id']);
          $list_class_title .= '<a href="javascript:void(0)" id="list_class_title_'.$cssmark.'" name="list_class_title_'.$cssmark.'" onclick="showListClass(this,'.$cssmark.');return false;">'.$class_title.'<font style="color:#BBBBBB;">（'.$GLOBALS['LT'].'）</font></a>';

	    }
      }
      unset($row, $class_title, $class_n, $class_more, $tcolor_key);
    }
  } else {
    $err = '数据为空或读取失败！';
  }
  $result = NULL;

} else {
  $err = ''.$sql['db_err'].'';
}

db_close($db);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $web['area'][$_GET['column_id']][$_GET['class_id']][0].' - '.$web['sitename2'], $web['code_author']; ?></title>
<base target="_blank" />
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
function addG(objId, linkObj) {
  linkObj.innerHTML = '载入中…';
  var centerObj = linkObj.parentNode.parentNode.parentNode;
  if (centerObj.tagName == 'CENTER') {
    if ($('temppage')!=null){
      $('temppage').id='';
    }
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
function Sort(wrap){var n={<?php echo @implode(',',$sort_arr);?>};var columnW=parseInt(wrap.offsetWidth/n[wrap.id]);var icolumnT=[];for(var k=0;k<n[wrap.id];k++){icolumnT[k]=0}var minHK;var box=wrap.childNodes;wrap.style.position='relative';if(box.length>0){for(var i=0;i<box.length;i++){if(box[i].nodeType==1){minHK=MK(icolumnT);icolumnT[minHK[0]]=minHK[1];box[i].style.position='absolute';box[i].style.top=icolumnT[minHK[0]]+'px';box[i].style.left=(minHK[0]*columnW)+'px';icolumnT[minHK[0]]+=box[i].offsetHeight}}wrap.style.height=Math.max.apply({},icolumnT)+'px'}};function MK(arr){var minArr;var minV=arr[0];minArr=new Array(0,minV);for(var i=1;i<arr.length;i++){if(arr[i]<minV){minV=arr[i];minArr=new Array(i,arr[i])}}return minArr}function sortAll(){var allWrap=document.getElementsByName('wrap[]');var n=0;if(allWrap!=null&&allWrap.length>0){for(var i=0;i<allWrap.length;i++){Sort(allWrap[i].parentNode)}}}if(document.all){window.attachEvent('onload',sortAll)}else{window.addEventListener('load',sortAll,false)}
-->
</script>
<?php
}
?>
<script type="text/javascript" language="javascript">
<!--
function showListClass(o,objId){if($('class_is')!=null){$('class_is').id=$('class_is').name}o.id='class_is';var allC=document.getElementsByName('class_title[]');if(allC!=null&&allC.length>0){for(var i=0;i<allC.length;i++){if(objId=='all'){allC[i].parentNode.style.display='block'}else{if(allC[i].parentNode.id!='class_title_'+objId+''){allC[i].parentNode.style.display='none'}else{allC[i].parentNode.style.display='block'}}}}}function loadClass(){var cToId=null;if(c_to=location.search.match(/class\_title\_to\=class\_title\_(\d+)/i)){cToId=c_to[1];showListClass($('list_class_title_'+cToId+''),cToId)}}if(document.all){window.attachEvent('onload',loadClass)}else{window.addEventListener('load',loadClass,false)}
if(navigator.userAgent.indexOf("MSIE")>0){var location=''}
-->
</script>
<script>
if (location.search.indexOf('for_self_menu=1')!=-1) {
  document.write('<style> #new_top, #head_out, #head, #top_title, #for_menu { display:none; } </style>');
  function forSelfIfrH() {
    if (parent.$('bodyFrame') != null) {
      parent.$('bodyFrame').style.height = document.body.offsetHeight+'px';
    }
  }
  if (document.all) {
    window.attachEvent('onload', forSelfIfrH);
  } else {
    window.addEventListener('load', forSelfIfrH, false);
  }
}
</script>
</head>
<body><?php
//if (empty($_GET['for_self_menu'])) :
?>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./">首页</a><a href="<?php echo get_column_html($_GET['column_id']); ?>" target="_self"><?php echo $web['area'][$_GET['column_id']]['name'][0]; ?></a><a id="top_title_is"><?php echo $web['area'][$_GET['column_id']][$_GET['class_id']][0]; ?></a></div>
<?php
//endif;
?>
<div id="site_d"></div>
<img src="readonly/images/star.gif" id="star" style="display:none" title="加入收藏" />
<img src="readonly/images/star_d.gif" id="star_d" style="display:none" />
<iframe id="addPFrame" name="addPFrame" style="display:none"></iframe>
<?php
unset($array_color, $tcolor_key, $tcolor);
if (!isset($err)) {
  $text____ = (!empty($text_) || !empty($text__)) ? '<div class="body"><div id="list_class">'.$list_class_title.'</div></div><div class="body" id="body">'.$text_.$text__.'</div>' : '';
  echo (isset($priority_pos_key) && abs($priority_pos_key) == 1) ? $text____.$text : $text.$text____;
} else {
  echo '
  <div class="body">
    <div class="output">'.$err.'</div>
  </div>';
}
?>
<?php
//if (empty($_GET['for_self_menu'])) :
?>
<div id="for_menu"><?php
if (file_exists('writable/chuchuang/ad_bottom.txt')) {
  @ include ('writable/chuchuang/ad_bottom.txt');
}
?>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?></div>
<?php
//endif;
?>
<?php
if ($web['link_type'] == 0) {
  @ include ('writable/chuchuang/ad_juejinlian.txt');
}
?>
</body>
</html>
