<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

$err_pldr = '';

if ($_GET['act'] == 'del') {
  if (!empty($_GET['imgurl']) && file_exists($_GET['imgurl'])) {
    @unlink($_GET['imgurl']);
  }
  err('<script>
try{
  parent.$("n_img'.$_GET['id'].'").innerHTML="";
  parent.$("linkimg'.$_GET['id'].'").value="";
  parent.$("linkimgold'.$_GET['id'].'").value="";
}catch(e){}
</script>');


}

@ require ('readonly/function/read_file.php');

if ($_GET['act'] == 'zhua') {
  if (empty($_GET['http']) || !preg_match('/^https?:\/\/.+/i', $_GET['http'])) {
    err('<script> alert("请填写准确的网址先！"); </script>');
  } 
  if (empty($_GET['id'])) {
    err('<script> alert("参数缺失！"); </script>');
  }
  $text = '';
  if ($f=read_file($_GET['http'])){
    if (function_exists('mb_detect_encoding')) {
      $cha=mb_detect_encoding($f, array('UTF-8','GB2312','GBK','ASCII','EUC-CN','CP936','BIG-5'));
    }
    if (!$cha) {
      if(preg_match('/<meta [^>]+charset=([\w\-]+)[^\>]*>/i',$f,$m)){
        $cha=$m[1];
      }  
    }
    if ($cha) {
      if(preg_match('/<meta [^>]+"description"[^>]+content="([^>\"]+)"[^>]*>/i', $f, $mm) || preg_match('/<meta content="([^>\"]+)"[^>]+"description"[^>]*>/i', $f, $mm)){
        if(strtolower($cha)!='utf-8'){
          $mm[1]=iconv($cha,'utf-8//IGNORE',$mm[1]);
        }
        $text .= str_replace('|','&#124;',preg_replace('/[\'\"\>\<\n\r]+/','',$mm[1]));
      }
    }
  }
  if ($text != '') {
    err('<script>
try{
  parent.document.getElementById("linkdescription'.$_GET['id'].'").value="'.$text.'";
  alert("抓取成功！");
  parent.document.getElementById("zhua'.$_GET['id'].'").innerHTML="抓";
}catch(e){}
</script>');
  } else {
    err('<script>
  alert("抱歉，抓取失败！请手动添加吧");
  parent.$("zhua'.$_GET['id'].'").innerHTML="抓";
</script>');
  }

}
if ($_POST['act'] == 'zhua_all') {
  if (empty($_POST['_linkhttp'])) {
    err('<script> alert("没有有效的网址！"); parent.delSubmitSafe(); </script>');
  } 
  if (empty($_POST['id'])) {
    err('<script> alert("参数缺失！"); parent.delSubmitSafe(); </script>');
  }
  foreach ((array)$_POST['_linkhttp'] as $k => $v) {
    list($h_id, $h_url) = @explode('|', $v);
    echo '<script>
if (parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'")!=null) {
  parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'").style.background="yellow";
}
</script>';
    @ob_flush();@flush();

    if ($h_url != '' && preg_match('/^https?:\/\/.+/i', $h_url)) {
      if ($f=read_file($h_url)){
        if (function_exists('mb_detect_encoding')) {
          $cha=mb_detect_encoding($f, array('UTF-8','GB2312','GBK','ASCII','EUC-CN','CP936','BIG-5'));
        }
        if (!$cha) {
          if(preg_match('/<meta [^>]+charset=([\w\-]+)[^\>]*>/i',$f,$m)){
            $cha=$m[1];
          }  
        }
        if ($cha) {
          if(preg_match('/<meta [^>]+"description"[^>]+content="([^>\"]+)"[^>]*>/i', $f, $mm) || preg_match('/<meta content="([^>\"]+)"[^>]+"description"[^>]*>/i', $f, $mm)){
            if(strtolower($cha)!='utf-8'){
              $mm[1]=iconv($cha,'utf-8//IGNORE',$mm[1]);
            }
            echo '<script>
if (parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'")!=null) {
  parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'").value="'.str_replace('|','&#124;',preg_replace('/[\'\"\>\<\n\r]+/','',$mm[1])).'";
}
</script>';
            @ob_flush();@flush();
            unset($cha, $m, $mm);
          }
        }
        unset($f);
      }
    }
    echo '<script>
if (parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'")!=null) {
  parent.document.getElementById("linkdescription['.$_POST['id'].']'.$h_id.'").style.background="none";
}
</script>';
    unset($k, $v, $h_id, $h_url);

  }
  err('<script> parent.delSubmitSafe(); alert("抓取完毕！"); </script>', 'ok');
}


if ($_POST['act'] == 'up') {
  $err1 = '<script> alert("';
  $err2 = '"); </script>';
}
@ require ('writable/set/set_area.php');

//if (!(isset($_GET['column_id']) && array_key_exists($_GET['column_id'], $web['area']))) {
if (!(isset($_GET['column_id']) && isset($web['area'][$_GET['column_id']]))) {
  err($err1.'频道参数缺失或错误'.$err2);
}
//if (!(isset($_GET['class_id']) && array_key_exists($_GET['class_id'], $web['area'][$_GET['column_id']]))) {
if (!(isset($_GET['class_id']) && isset($web['area'][$_GET['column_id']][$_GET['class_id']]))) {
  err($err1.'栏目参数缺失或错误'.$err2);
}





if ($_POST['act'] == 'up') {
  err('该版本没有开放此功能！<a href="http://www.162100.com/pay/for_s_162100.php">请升级商业版</a><script> alert("该版本没有开放此功能！请升级商业版"); window.open("http://www.162100.com/pay/for_s_162100.php"); parent.$("mainform").act.value=""; parent.delSubmitSafe(); </script>');
}


$text_del = 0;
$text_caiji = '';
$text_p = '';
$p_b = $p_e = NULL;

if (!empty($_POST['p_url'])) {
  if (!preg_match("/^https?:\/\//i", $_POST['p_url'])) {
    err('采集源URL填写不对！应以http://或https://开头');
  }
  if (empty($_POST['p_b']) && empty($_POST['p_e'])) {
    err('采集前后标记必填一项！');
  }
  $text_caiji = '采集也成功执行完毕。';
  $time_step = time() + floatval($web['time_pos']) * 3600;


  if (!isset($_POST['p_time']) || !is_numeric($_POST['p_time']) || $_POST['p_time'] == '') {
    $_POST["p_time"] = "";
    $time_stamp = $time_step + 100 * 365 * 24 * 60 * 60;
  } else {
    if ($_POST['p_time'] == 1) {
      if (!abs($_POST['p_time_val']) > 0) {
        err('采集时效若以分钟为间隔必须大于0啊！');
      } else {
        $_POST['p_time'] = abs($_POST['p_time_val']);
        $time_stamp = $time_step + $_POST['p_time'] * 60;
      }
    } else {
      $_POST['p_time_key'] = abs($_POST['p_time_key']);
      $_POST['p_time'] = $_POST['p_time_key'] > 0 ? '-'.$_POST['p_time_key'] : 0;
      $time_0 = $time_step - (gmdate('H', $time_step) * 3600 + gmdate('i', $time_step) * 60 + gmdate('s', $time_step));
      $time_stamp = $time_0 + $_POST['p_time_key'] * 3600 + ($_POST['p_time_key'] > abs(gmdate('H', $time_step)) ? 0 : 24 * 3600);
    }
  }

  $eval_caiji = 1;

  
} else {
  $text_caiji = '未填写采集源URL，未进行采集。';
}


function run_URLdecode($e) {
/*
    $text = "";
    if ($m = preg_split('/%3F/i', $e[1], 2)) {
      $text .= preg_match("/%[0-9A-Z]+/", $m[0]) ? urldecode($m[0]) : $m[0];
      if (count($m) == 2) {
        $text .= (!empty($m[1]) && preg_match("/(%[0-9A-Z]{4}){2,}/", $m[1])) ? '?'.urldecode($m[1]) : '?'.$m[1];
      }
    }
    return $text;
*/
    return '<a href='.urldecode($e[1]).'>';
}






if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

//为旧版列增加长度
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` MODIFY COLUMN column_id VARCHAR(32)');
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` MODIFY COLUMN http_name_style LONGTEXT');
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` ADD COLUMN `class_grab` text');

@ require ('readonly/function/filter.php');

$e0 = $e1 = $text_correct = $text_chongfu = $up_err = '';
$text_del = 0;

$_GET['class_title'] = preg_replace('/\|.*$/', '', $_GET['class_title']);

if (!empty($_GET['class_title']) && !empty($_GET['detail_title'])) {
  $_GET['detail_title'] = str_replace('/', '-', filter(htmlspecialchars($_GET['detail_title']))); //&#47;
@ require ('readonly/function/pinyin.php');
  $dpy = pinyin($_GET['detail_title']);

  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE detail_title LIKE "%|'.$dpy.'|%" AND detail_title NOT LIKE "'.$_GET['detail_title'].'|'.$dpy.'|%" AND http_name_style="" AND class_priority<>""');
  if ($result != false) {
    while ($row = db_fetch($db, $result)) {
      list($detail_cf, $dpy_cf, ) = @explode('|', $row['detail_title']);
      $text_chongfu .= '
<div style="color:blue;">专题：<input type="text" size="10" name="detail_correct['.$row['column_id'].'_'.$row['class_id'].'_'.urlencode($detail_cf).'_'.urlencode($dpy_cf).']" value="'.$dpy_cf.'" /> '.$detail_cf.'</div>';
      unset($row, $detail_cf, $dpy_cf);
    }
  }
  $result = NULL;

  if (isset($duoyin_mark[$_GET['detail_title']])) {
    $text_correct .= '<div>专题：<input type="text" size="10" name="detail_correct['.$_GET['column_id'].'_'.$_GET['class_id'].'_'.urlencode($_GET['detail_title']).'_'.urlencode($dpy).']" value="'.$dpy.'" /> '.$_GET['detail_title'].'（'.$duoyin_mark[$_GET['detail_title']].'）</div>';
  }

  $name = '专题';
  if (isset($_POST['dside']) && is_numeric($_POST['dside']) && ($_POST['dside'] == 1 || $_POST['dside'] == 2 || $_POST['dside'] == 3)) {
    $ds .= $_POST['dside'];
    $ds .= '-';
    $ds .= $_POST['dside_'] == 'l' || $_POST['dside_'] == 'r' ? $_POST['dside_'] : 'r';
    $ds .= '-';
    $ds .= $_POST['dside'] == 1 || $_POST['dside'] == 3 ? ($_POST['dside__'] == 1 ? (abs($_POST['dside__n']) >= 1 && abs($_POST['dside__n']) <= 4 ? abs($_POST['dside__n']) : 2) : 0) : 0;
    $ds .= '-';
    $ds .= abs($_POST['dside___']) < 120 ? 120 : (abs($_POST['dside___']) > 380 ? 380 : abs($_POST['dside___']));
  } else {
    $ds .= '';
  }
  $e0 = $_GET['detail_title'].'|'.$dpy.'|'.$ds.'';
  $e_ = $_GET['detail_title'].'|';
  $e1 = ' AND detail_title LIKE "'.$_GET['detail_title'].'|%"';
  $eh1 = 'detail.php';
  $eh2 = $dpy.'.html';
  $html_page = $dpy.'.html';

} else {
  $name = '栏目';
  $e0 = $e_ = '';
  $e1 = ' AND detail_title=""';
  $eh1 = 'class.php';
  $eh2 = $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html';
  $html_page = $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html';
  $_GET['class_title'] = '栏目头栏';
  $chan_zt = 1;
}

$beiarr = $imarro = $imarrn = array();
$imgreg = '/<img [^>]*src\s*=\s*"?(writable/__web__\/images\/'.$_GET['column_id'].'_'.$_GET['class_id'].'\/[^\/\"\s]+)"?/i';
$result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'"'.$e1.'');// ORDER BY id
if ($result != false) {
  while ($row = db_fetch($db, $result)) {
    preg_match_all($imgreg, $row['http_name_style'], $m1);
    preg_match_all($imgreg, $row['class_priority'], $m2);
    $imarro = @array_merge($imarro, $m1[1], $m2[1]);
    $beiarr[$row['id']] = $row['id'];
    unset($row, $m1, $m2);
  }
}
$result = NULL;

$_POST['class_title'] = (array)$_POST['class_title'];

$o_n = $s_n = 0;

if (count($_POST['class_title']) > 0) {
  if (count($_POST['class_title']) > count(array_unique($_POST['class_title']))) {
    err('栏目分类名称不能空也不能有重名！');
  }
  if (count($_POST['class_title']) > count(array_filter(preg_replace('/^\s+|\s+$/', '', $_POST['class_title'])))) {
    err('栏目分类名称不能有空值！');
  }
  foreach ($_POST['class_title'] as $class_title_old => $class_title_new) {
    if (/*$class_title_new == '栏目置顶' || */$class_title_new == '栏目头栏') {
      err('栏目分类名称不能为“栏目头栏”！与系统默认词冲突！');
    }
/*
    if (trim($class_title_new) == '') {
      continue;
    }
*/
    //$class_priority = filter2($_POST['class_priority'][$class_title_old]); //分类头栏
    $class_priority = stripslashes_($_POST['class_priority'][$class_title_old]); //分类头栏
    $http_name_style = stripslashes_($_POST['http_name_style'][$class_title_old]);
    $img_t .= $http_name_style;
    $class_n = (!empty($_POST['class_n'][$class_title_old]) && is_numeric($_POST['class_n'][$class_title_old]) && $_POST['class_n'][$class_title_old] >= 2 && $_POST['class_n'][$class_title_old] <= 8) ? $_POST['class_n'][$class_title_old] : 4;
    $class_more = (!empty($_POST['class_more'][$class_title_old]) && is_numeric($_POST['class_more'][$class_title_old])) ? $_POST['class_more'][$class_title_old] : '';
    
    if (db_exec($db, "INSERT INTO `".$sql["pref"]."".$sql["data"]["承载网址数据的表名"]."` (`column_id`,`class_id`,`class_title`,`http_name_style`,`class_priority`,`detail_title`) VALUES ('".$_GET["column_id"]."','".$_GET["class_id"]."','".filter($class_title_new)."|".$class_n."|".$class_more."',".db_escape_string($db, $http_name_style).",".db_escape_string($db, $class_priority).",'".$e_."')")) {
	  $res = 1;
	}
    //echo $sql['db_err'];

    $o_n += substr_count($http_name_style, "\n");

    if (!$res) {
      $s_n += $o_n;
    } else {
      if (isset($chan_zt)) { //该栏目下的专题一起带过来
        db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET class_title="'.filter($class_title_new).'" WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.urldecode($class_title_old).'" AND detail_title<>"" AND (http_name_style="" AND class_priority<>"")');
      }
      //echo $sql['db_err'];

    }

    preg_match_all($imgreg, $img_t, $m1);
    preg_match_all($imgreg, $class_priority, $m2);
    $imarrn = @array_merge($imarrn, $m1[1], $m2[1]);
    if (isset($chan_zt)) { //该栏目下的专题一起带过来
      db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET class_title="'.filter($class_title_new).'" WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.urldecode($class_title_old).'" AND detail_title<>"" AND (http_name_style="" AND class_priority<>"")');
    }
    unset($class_title_old, $class_title_new, $class_priority, $http_name_style, $class_n, $class_more, $img_t, $m1, $m2);
  }

} else {
  $text_del ++;
  db_exec($db, 'DELETE FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND NOT (class_title="'.$_GET['class_title'].'" AND http_name_style="" AND class_priority<>"")'.$e1.''); //删除除头栏之外的分类列表
}





@ ini_set('track_errors', 1);


//$_POST['priority'] = filter2($_POST['priority']);

$_POST['priority'] = stripslashes_($_POST['priority']);
if (isset($eval_caiji)) {
  $php_errormsg = NULL;
  $_POST["p_url"] = filter($_POST["p_url"]);
  if ($str_caiji = read_file($_POST["p_url"])) {

	if (function_exists("mb_detect_encoding")) {
	  $cha = mb_detect_encoding($str_caiji, array("UTF-8","ASCII","EUC-CN","CP936","BIG-5","GB2312","GBK"));
	}
    if (!$cha) {
      if(preg_match("/charset[\s\r\n]*=[\s\r\n'\"]*([\w\-]+)[^\>]*>/i", $str_caiji, $m_cha)){
	    $cha = $m_cha[1];
      }
    }
    if (isset($cha) && $cha != "") {
      if(strtolower($cha) != "utf-8"){
        $str_caiji = @iconv($cha, "utf-8", $str_caiji);
      }
    }

    $_POST["p_b"] = preg_replace("/[\s\r\n]+/", " ", $_POST["p_b"]);
    $_POST["p_b"] = get_magic_quotes_gpc() ? stripslashes($_POST["p_b"]) : $_POST["p_b"];
    $p_b = addcslashes($_POST["p_b"], '.\+*?[^]$(){}=!<>|:-"/'); //preg_quote
    $p_b = preg_replace("/[\s\r\n]+/", "[\\s\\r\\n]+", $p_b);
    $p_b = (isset($_POST["p_b_is"]) && $_POST["p_b_is"] == 1) ? $p_b."(" : "(".$p_b;
    $_POST["p_e"] = preg_replace("/[\s\r\n]+/", " ", $_POST["p_e"]);
    $_POST["p_e"] = get_magic_quotes_gpc() ? stripslashes($_POST["p_e"]) : $_POST["p_e"];
    $p_e = addcslashes($_POST["p_e"], '.\+*?[^]$(){}=!<>|:-"/'); //preg_quote
    $p_e = preg_replace("/[\s\r\n]+/", "[\\s\\r\\n]+", $p_e);
    $p_e = (isset($_POST["p_e_is"]) && $_POST["p_e_is"] == 1) ? ")".$p_e : $p_e.")";

    preg_match("/".$p_b.".+".$p_e."/is", $str_caiji, $m_caiji);

    if ($php_errormsg !== NULL) {
      $text_caiji = "<b>采集标记填写得不对！请填写准确的正则。错误代码：</b><i>[".$php_errormsg."]</i><br>";
      $php_errormsg = NULL;
    } else {
      if (!$m_caiji) {
        $text_caiji = "<b>采集源URL或采集标记填写得不对！请检查。没有采集数据被存储。</b><br>";
      } else {
        $_POST["priority"] = $m_caiji[1];
        $_POST["p_change_fr"] = array_filter($_POST["p_change_fr"]);
        $_POST["p_change_to"] = array_filter($_POST["p_change_to"]);
        if ($_POST["p_change_fr"] && $_POST["p_change_to"]) {
          $text_caiji = "";
          foreach((array)$_POST["p_change_fr"] as $p_key => $p_val) {
            $p_val = get_magic_quotes_gpc() ? stripslashes($p_val) : $p_val;
            $p_val = trim($p_val);
            $p_val = preg_replace("/[\s\r\n]+/", "[\\s\\r\\n]+", $p_val);
            $p_val = preg_replace("/\{162100\~mark\d+\}/i", "", $p_val);
            $_POST["p_change_to"][$p_key] = !isset($_POST["p_change_to"][$p_key]) || empty($_POST["p_change_to"][$p_key]) ? "" : $_POST["p_change_to"][$p_key];
            $_POST["p_change_to"][$p_key] = get_magic_quotes_gpc() ? stripslashes($_POST["p_change_to"][$p_key]) : $_POST["p_change_to"][$p_key];
            $_POST["p_change_to"][$p_key] = trim($_POST["p_change_to"][$p_key]);
            $_POST["p_change_to"][$p_key] = preg_replace("/\{162100\~mark\d+\}/i", "", $_POST["p_change_to"][$p_key]);
            if ($p_val != "") {
              $priority_temp = preg_replace(''.$p_val.'', ''.$_POST['p_change_to'][$p_key].'', $_POST["priority"]);
              if ($php_errormsg !== NULL) {
                $text_caiji .= "<b>过滤正则[".($p_key+1)."]填写得不对！故没有对采集到的数据进行过滤。错误代码：</b><i>[".$php_errormsg."]</i><br>";
                $php_errormsg = NULL;
                continue;
              } else {
                $_POST["priority"] = $priority_temp;
                $p_change_arr[] = $p_val."{162100~mark1}".$_POST["p_change_to"][$p_key];
              }
              unset($priority_temp);
            }
          }
          if ($_POST["URLdecode"] == 1) {
            $_POST["priority"] = preg_replace_callback('/<a [^>]*href=([^>]+)>/iU', 'run_URLdecode', $_POST["priority"]);
          }
          $text_caiji = $text_caiji == "" ? "采集也成功执行完毕。" : $text_caiji;
        }
        $text_p = "".$time_stamp."\n".$_POST["p_time"]."\n".$_POST["p_url"]."\n".$_POST["p_b"]."\n".$_POST["p_e"]."\n".((isset($_POST["p_b_is"]) && $_POST["p_b_is"] == 1) ? 1 : 0)."\n".((isset($_POST["p_e_is"]) && $_POST["p_e_is"] == 1) ? 1 : 0)."\n".(isset($p_change_arr) && is_array($p_change_arr) && count($p_change_arr) > 0 ? @implode("{162100~mark2}", $p_change_arr) : "")."\n".(!empty($_POST["priority_pos"]) ? "1" : "")."\n".(!empty($_POST["URLdecode"]) ? "1" : "")."";
      }
    }

  } else {
    $text_caiji = "<b>采集源URL填写得不对！没有采集到数据。</b><br>";
  }
}



if ((!empty($_POST['priority']) && trim($_POST['priority']) != '') || !empty($text_p)) {
  if (!db_exec($db, "INSERT INTO `".$sql["pref"]."".$sql["data"]["承载网址数据的表名"]."` (`column_id`,`class_id`,`class_title`,`detail_title`,`http_name_style`,`class_priority`,`class_grab`) VALUES ('".$_GET["column_id"]."','".$_GET["class_id"]."','".$_GET["class_title"]."','".$e0."','',".db_escape_string($db, $_POST["priority"]).",".db_escape_string($db, $text_p).")")) {
    $text_caiji = '<b>栏目头栏储存失败！错误代码：</b><i>['.$sql['db_err'].']</i><br>';
  }
} else {
  if ($name == '专题' && $text_del == 0) { //如果专题的头栏没有内容，也不能为空，否则失去专题引导
    $result = db_query($db, 'SELECT id FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.$_GET['class_title'].'" AND (http_name_style="" AND class_priority<>"")'.$e1.' LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;
    if ($row) {
      db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET class_priority=" " WHERE id="'.$row['id'].'"');
      unset($row);
    } else {
      db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` (`column_id`,`class_id`,`class_title`,`http_name_style`,`class_priority`,`detail_title`) VALUES ("'.$_GET['column_id'].'","'.$_GET['class_id'].'","'.$_GET['class_title'].'",""," ","'.$e0.'")');
    }
  } else {
    $text_del ++;
    db_exec($db, 'DELETE FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title="'.$_GET['class_title'].'" AND (http_name_style="" AND class_priority<>"")'.$e1.''); // AND class_priority<>""
  }
}

if (count($beiarr) > 0) {
  foreach ($beiarr as $id) {
    if ($id && is_numeric($id) && $id > 0) {
      db_exec($db, 'DELETE FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE id="'.$id.'"');
    }
  }
}


if ($name == '专题') {
  if (isset($_POST['detail_list']) && $_POST['detail_list'] == 1) { //自动将专题链接加入上级栏目列表中
    $up_img = '';
/*
    $url = $dpy.'.html';
    $result = db_query($db, 'SELECT id,http_name_style FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title LIKE "'.$_GET['class_title'].'|%" AND detail_title=""'); //其实应该 LIMIT 1
    if ($result != false) {
      while ($row = db_fetch($db, $result)) {
        $row['http_name_style'] = preg_replace('/.*'.preg_quote($url, '/').'\|[^\r\n]+[\r\n]+/', '', $row['http_name_style']);
*/
        if ($text_del != 2) {
          $up_img = get_up_img();
/*
          $row['http_name_style'] = $row["http_name_style"]."".$url."|".$up_img."".$_GET['detail_title']."||\n";
*/
        }
/*
        if (!db_exec($db, "UPDATE `".$sql["pref"]."".$sql["data"]["承载网址数据的表名"]."` SET http_name_style=".db_escape_string($db, $row["http_name_style"])." WHERE id='".$row["id"]."'")) {
          $up_err .= '[加入上级分类列表失败]';
        }
        unset($row);
      }
    }
    $result = NULL;
*/
    $eh1 = 'class.php';
    $eh2 = $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html';
  }
} else {
  if (!(isset($_POST['detail_keep']) && $_POST['detail_keep'] == 1)) { //如果删除失去上级栏目的专题
    //if (count($_POST['class_title']) > 0) {
      db_exec($db, 'DELETE FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title<>"" AND detail_title NOT IN (SELECT TEMP.detail_title FROM (SELECT M.* FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` M) TEMP WHERE TEMP.column_id="'.$_GET['column_id'].'" AND TEMP.class_id="'.$_GET['class_id'].'" AND (TEMP.class_title LIKE "'.@implode('|%" OR TEMP.class_title LIKE "', $_POST['class_title']).'|%") AND TEMP.detail_title<>"" AND (TEMP.http_name_style="" AND TEMP.class_priority<>""))');
    //}
  }
}

/*
//重置MYSQL ID
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` DROP `id`');
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` ADD `id` INT(10) NOT NULL FIRST');
db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` MODIFY COLUMN `id` INT(10) NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(id)');
*/

db_close($db);

@ require ('readonly/function/write_file.php');
reset_indexhtml('index.php', 'index.html');
$out_detail_title = $_GET['detail_title'];
if ($eh1 && $eh2) {
  reset_indexhtml($eh1, $eh2);
}

if ($text_del == 2) {
  $out_text = '数据删除成功！';
  @ require ('writable/set/set_html.php');
  if ($web['html'] == true) {
    if (file_exists($html_page)) {
	  @unlink($html_page);
	}
  }
  @ require ('readonly/function/deldir.php');
  deldir('writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'].'');
} else {
  $out_text = '设置成功！';
}


if ($name == '专题' || ($name == '栏目' && (isset($_POST['detail_keep']) && $_POST['detail_keep'] == 1))) {
  if (!(isset($_POST['img_keep']) && $_POST['img_keep'] == 1)) {
    if (count($imarro) > 0) {
      foreach ($imarro as $im) {
        if (!in_array($im, $imarrn)) {
          @unlink($im);
        }
      }
    }
  }
}


if (($text_correct != '' || $text_chongfu != '') && $text_del != 2) {
  $text_correct = '<form action="?post=http_p" method="post" style="border:1px #FF6600 solid; padding:5px; color:#FF6600;">'.($text_correct != '' ? '<p><b>重要！发现专题名有多音字（或拼音重复），请进行校正，再提交</b></p>'.$text_correct :'').($text_chongfu != '' ? '<p><b style="color:blue;">重要！发现专题名有拼音重名，请进行校正，再提交</b></p>'.$text_chongfu.'<div style="color:blue;">专题：<input type="text" size="10" name="detail_correct['.$_GET['column_id'].'_'.$_GET['class_id'].'_'.urlencode($out_detail_title).'_'.urlencode($dpy).']" value="'.$dpy.'" /> '.$out_detail_title.'</div>' : '').'<button type="submit">提交</button> <button type="button" onclick="window.history.back();">放弃，返回</button> </form>';
  err(''.$err_pldr.$name.$out_text.''.$text_correct.$up_err.$text_caiji.'', 'ok');
}



alert(''.$err_pldr.$name.$out_text.'（总计提交'.$o_n.'条，实际导入'.($o_n - $s_n).'条）'.$text_correct.$text_chongfu.$up_err.$text_caiji, 'webmaster_central.php?get=http&column_id='.$_GET['column_id'].'&class_id='.$_GET['class_id'].'&class_title='.urlencode($_GET['class_title']).'&detail_title='.urlencode($out_detail_title).'');



function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  //$text = str_replace('/', '&#47;', $text);
  return $text;
}


function get_up_img() {
  global $dpy, $up_err, $web;
  $img = '';
  $br = (isset($_POST['detail_logo']) && $_POST['detail_logo'] == 1) ? '<br />' : '';
  $upload_dir = 'writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'];
  if (is_array($_FILES['uploadfile']) && $_FILES['uploadfile']['size']) {
    $max_size = 100 * 10000;
    if ($_FILES['uploadfile']['size'] <= $max_size) {
      if (preg_match('/\.(gif|jpg|png)$/i', $_FILES['uploadfile']['name'], $im)) {
        //@chmod('writable/__web__', 0777);
        //@chmod('writable/__web__/images', 0777);
        eval('@chmod(\'writable/__web__\', 0'.$web['chmod'].');');
        eval('@chmod(\'writable/__web__/images\', 0'.$web['chmod'].');');
        if (!file_exists($upload_dir)) {
          @mkdir($upload_dir);
        }
        if (file_exists($upload_dir)) {
          //@chmod($upload_dir, 0777);
          eval('@chmod($upload_dir, 0'.$web['chmod'].');');
          $upload_filename = $dpy.'.'.strtolower($im[1]);
          if (@move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upload_dir.'/'.$upload_filename)) {
            $img = '<img src="'.$upload_dir.'/'.$upload_filename.'" />'.$br.'';
          } else {
            $up_err .= '（上传专题图标失败[上传失败，主机系统权限不足]）';
          }
        } else {
          $up_err .= '（上传专题图标失败[上传路径'.$upload_dir.'不存在且不能建立]）';
        }
      } else {
        $up_err .= '（上传专题图标失败[图片格式不是gif|jpg|png]）';
      }
    } else {
      $up_err .= '（上传专题图标失败[上传尺寸大于100KB]）';
    }
  } else {
    $up_err .= '（上传专题图标失败[没选择图片]）';
  }
  return $img != '' ? $img : ($_POST['detail_logo_old'] == 1 ? (@file_exists($upload_dir.'/'.$dpy.'.gif') ? '<img src="'.$upload_dir.'/'.$dpy.'.gif" />'.$br : (@file_exists($upload_dir.'/'.$dpy.'.jpg') ? '<img src="'.$upload_dir.'/'.$dpy.'.jpg" />'.$br : (@file_exists($upload_dir.'/'.$dpy.'.png') ? '<img src="'.$upload_dir.'/'.$dpy.'.png" />'.$br : ''))) : '');
}










?>