<?php

/* 站点简介 */


@ require ('writable/set/set.php');
if (!isset($sql)) {
  @ require ('writable/set/set_sql.php');
}
if (!isset($web['area'])) {
  @ require ('writable/set/set_area.php');
}

if (empty($_GET['site_id']) || !preg_match('/^\d+_\d+$/', $_GET['site_id'])) {
  die('&#x53C2;&#x6570;ID&#x7F3A;&#x5931;&#x6216;&#x9519;&#x8BEF;&#xFF01;');
}

list($id, $site_id) = @explode('_', $_GET['site_id']);

$text = $text_ = $text_n = '';
$site = array();




if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE id="'.$id.'"');
  if ($row = db_fetch($db, $result)) {

    //if (!(isset($row['column_id']) && array_key_exists($row['column_id'], $web['area']))) {
    if (!(isset($row['column_id']) && isset($web['area'][$row['column_id']]))) {
      die('&#39057;&#36947;&#73;&#68;'.$row['column_id'].'&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;&#39318;&#39029;&#37325;&#26032;&#24320;&#22987;');
    }
    //if (!(isset($row['class_id']) && array_key_exists($row['class_id'], $web['area'][$row['column_id']]))) {
    if (!(isset($row['class_id']) && isset($web['area'][$row['column_id']][$row['class_id']]))) {
      die('&#26639;&#30446;&#73;&#68;'.$row['class_id'].'&#38169;&#35823;&#25110;&#32570;&#22833;&#65281;&#35831;&#37325;<a href="./">&#39318;&#39029;</a>&#37325;&#26032;&#24320;&#22987;');
    }

	$total_arr = @explode("\n", trim(trim($row['http_name_style'])));
    $n = count($total_arr);




	if ($n > 0) {
      foreach ($total_arr as $xh => $each) {
        $xh ++;
        $h = @explode("|", trim($each));

    if ($web['link_type'] == 1) {
      $link = $h[3] == "js" ? $h[0] : "export.php?url=".urlencode($h[0]);
    } else {
      $link = $h[3] == "js" ? "export.php?url=".urlencode($h[0]) : $h[0];
    }
        if ($xh == $site_id) {
          $site = $h;
//get_d($site[0])

          $text .= '<table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td><div style="text-align:center;"><h2>'.$site[1].'</h2><div class="site_http"><a onmouseover="addC(this)" onclick="addM(this)" href="'.$link.'">'.$site[0].'</a></div></div><div class="site_line"></div><div class="site_text" id="site_text">'.(!empty($site[4]) ? $site[4] : '<span style="color:#999999;">本站尚未添加该站点简介。</span>正在尝试获取…').'</div>';
          if (preg_match('/^https?:\/\/([^\/]+)\/?$/i', $site[0], $m)) {
            $text .= '<div class="site_line"></div><div><a class="chinaz" href="http://seo.chinaz.com/'.$site[0].'" target="seoifr" onclick="$(\'seoifr\').style.display=\'block\'; this.innerHTML=\'该网站来自中国站长站的综合数据&gt;&gt;\';">点击查看该网站来自中国站长站的综合数据&gt;&gt;</a></div>
<iframe id="seoifr" name="seoifr" frameborder="0" marginwidth="0" marginheight="0" width="100%" height="2000" style="display:none;" sandbox="allow-same-origin allow-scripts"></iframe>';
          }
          $text .= '</td>
    </tr>
  </table>';
          break;
        }
      }

	} else {
      $err .= '查无数据！';
    }
    //unset($row);
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
<title><?php echo trim(strip_tags($site[1])).' - '.$web['sitename2'], $web['code_author']; ?></title>
<base target="_blank" />
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
  <style>
.site_line { height:0; margin:20px 0; overflow:hidden; clear:both; border-bottom:1px #DDDDDD dotted; }
a.chinaz { color:#0033CC; text-decoration:underline; }
.site_text { text-align:left; }
   </style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./">首页</a><a href="<?php echo get_column_html($row['column_id']); ?>" target="_self"><?php echo $web['area'][$row['column_id']]['name'][0]; ?></a><a id="top_title_is" href="<?php echo get_class_html($row['column_id'], $row['class_id']); ?>"><?php echo $web['area'][$row['column_id']][$row['class_id']][0]; ?></a></div>
<div class="body">
<?php
if (!isset($err)) {
  echo $text != '' ? $text : '<div class="output">数据库没有查到该站点！</div>';

} else {
  echo '<div class="output">'.$err.'</div>';
}
?>
  </div><?php
if (file_exists('writable/chuchuang/ad_bottom.txt')) {
  @ include ('writable/chuchuang/ad_bottom.txt');
}
?>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>
<?php
if ($web['link_type'] == 0) {
  @ include ('writable/chuchuang/ad_juejinlian.txt');
}
?>
</body>
<?php
if (!function_exists('get_en_url')) {
  function get_en_url($d) {
    return urlencode(base64_encode($d));
  }
}

if (empty($site[4])) {
  if (preg_match('/yiqifa|duomai/i', $site[0]) || !preg_match('/^https?\:\/\//i', $site[0])) {

    echo '<script> $(\'site_text\').innerHTML = \'<span style="color:#999999;">本站尚未添加该站点简介。</span>\'; </script> ';
  } else {
    echo '
<iframe src="PseudoXMLHTTP.php?xml_id=site_text&xml_file='.get_en_url($site[0]).'" style="display:none;"></iframe>
';
  }



}

?>


</html>
