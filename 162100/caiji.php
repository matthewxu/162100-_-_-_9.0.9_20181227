<?php

/* 采集处理页 */


@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
@ require ('writable/set/set_area.php');


if (!function_exists('run_URLdecode')) {
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
}


$js_ok = '<script type="text/javascript" language="javaScript">
<!--
function caijiShow(){
  if(parent && parent!=self){
    var CF=parent.document.getElementById("caijiFrame");
    if(CF!=null){
      CF.style.height=document.body.offsetHeight+"px";
      CF.style.background="#FFFFFF";
    }
  }
}

if (document.all) {
	window.attachEvent("onload", caijiShow);
} else {
	window.addEventListener("load", caijiShow, false);
}
-->
</script>
';
$js_err = '<script type="text/javascript" language="javaScript">
<!--
function caijiShow(){
  if(parent && parent!=self){
    var CF=parent.document.getElementById("caijiFrame");
    if(CF!=null){
      CF.style.display="none";
    }
  }
}

if (document.all) {
	window.attachEvent("onload", caijiShow);
} else {
	window.addEventListener("load", caijiShow, false);
}
-->
</script>';



@ $_GET['column_id'] = preg_replace('/[^\w]/', '', $_GET['column_id']);
@ $_GET['class_id'] = preg_replace('/[^\w]/', '', $_GET['class_id']);
//if (!(isset($_GET['column_id']) && array_key_exists($_GET['column_id'], $web['area']))) {
if (!(isset($_GET['column_id']) && isset($web['area'][$_GET['column_id']]))) {
  die($js_err);
}
//if (!(isset($_GET['class_id']) && array_key_exists($_GET['class_id'], $web['area'][$_GET['column_id']]))) {
if (!(isset($_GET['class_id']) && isset($web['area'][$_GET['column_id']][$_GET['class_id']]))) {
  die($js_err);
}
$_GET['class_title'] = @htmlspecialchars($_GET['class_title']);
$_GET['detail_title'] = @htmlspecialchars($_GET['detail_title']);

if (!empty($_GET['class_title']) && !empty($_GET['detail_title'])) {
  $reg_sql = ' AND class_title NOT LIKE "%|%" AND detail_title LIKE "'.$_GET['detail_title'].'|%"';

} else {
  $reg_sql = ' AND class_title="'.$_GET['class_title'].'"';

}


if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'"'.$reg_sql.' AND http_name_style="" ORDER BY id LIMIT 1');

    if ($row = db_fetch($db, $result)) {

        if (!empty($row['class_grab'])) {
          $row['class_grab'] = preg_replace("/[\r\n]+/", "\n", $row['class_grab']);
           list($p_time_stamp, $p_time, $p_url, $p_b, $p_e, $p_b_is, $p_e_is, $p_change_rule, $priority_pos_key, $urlencode) = @explode("\n", $row['class_grab']);
          //计算时间间隔差
          if ($p_time == '' || !is_numeric($p_time)) {
            //$time_stamp = $time_now + 100 * 365 * 24 * 60 * 60;
          } else {
            $time_now = time() + floatval($web['time_pos']) * 3600;
            $p_time = floatval($p_time);
            if ($p_time > 0) {
              $time_stamp = $time_now + $p_time * 60;
            } else {
              $p_time_temp = abs($p_time);
              $time_0 = $time_now - (gmdate('H', $time_now) * 3600 + gmdate('i', $time_now) * 60 + gmdate('s', $time_now));
              $time_stamp = $time_0 + $p_time_temp * 3600 + ($p_time_temp > abs(gmdate('H', $time_now)) ? 0 : 24 * 3600);
            }
            if ($time_now - $p_time_stamp > 0) {
              @ ini_set('track_errors', 1); 
              if (!function_exists('read_file')) {
                @ require ('readonly/function/read_file.php');
              }
              $php_errormsg = NULL;
              if ($str_caiji = read_file($p_url)) {
  if (function_exists('mb_detect_encoding')) {
    $cha = mb_detect_encoding($str_caiji, array("UTF-8","ASCII","EUC-CN","CP936","BIG-5","GB2312","GBK"));
  }
                if (!$cha) {
                  if(preg_match("/charset[\s\r\n]*=[\s\r\n\'\"]*([\w\-]+)[^\>]*>/i", $str_caiji, $m_cha)){
                    $cha = $m_cha[1];
                  }
                }
                if (isset($cha) && $cha != "") {
                  if(strtolower($cha) != "utf-8"){
                    $str_caiji = @iconv($cha, "utf-8", $str_caiji);
                  }
                }

                $p_b_temp = preg_replace("/[\s\r\n]+/", " ", $p_b);
                $p_b = addcslashes($p_b_temp, '.\+*?[^]$(){}=!<>|:-"/'); //preg_quote
                $p_b = preg_replace("/[\s\r\n]+/", "[\\\s\\\\r\\\\n]+", $p_b);
                $p_b = (isset($p_b_is) && $p_b_is == 1) ? $p_b."(" : "(".$p_b;
                $p_e_temp = preg_replace("/[\s\r\n]+/", " ", $p_e);
                $p_e = addcslashes($p_e_temp, '.\+*?[^]$(){}=!<>|:-"/'); //preg_quote
                $p_e = preg_replace("/[\s\r\n]+/", "[\\\s\\\\r\\\\n]+", $p_e);
                $p_e = (isset($p_e_is) && $p_e_is == 1) ? ")".$p_e : $p_e.")";

                preg_match("/".$p_b."(.+)".$p_e."/isU", $str_caiji, $m_caiji);
                if ($php_errormsg !== NULL) {
                  //echo "<b>采集标记填写得不对！请填写准确的正则。错误代码：</b><i>[".$php_errormsg."]</i><br>";
                  $php_errormsg = NULL;
                } else {
                  if (!$m_caiji) {
                    //echo "<b>采集源URL或采集标记填写得不对！请检查。没有采集数据被存储。</b><br>";
                  } else {
                    if (!function_exists('filter')) {
                      @ require ('readonly/function/filter.php');
                    }
                    $row['class_priority'] = $m_caiji[1];

                    if ($p_change_rule = trim($p_change_rule)) {
                      $p_change_arr = @explode("{162100~mark2}", $p_change_rule);
                      $p_change_arr = array_unique(array_filter($p_change_arr));
                      if (is_array($p_change_arr) && count($p_change_arr) > 0) {
                        foreach ($p_change_arr as $p_c_key => $p_c_val) {
                          list($p_fr, $p_to) = @explode("{162100~mark1}", $p_c_val);

                          //$p_fr = trim($p_fr);
                          $p_fr = preg_replace("/[\s\r\n]+/", "[\\\s\\\\r\\\\n]+", $p_fr);
                          //$p_to = trim($p_to);

                          if ($p_fr != "") {
                            $priority_temp = preg_replace($p_fr, $p_to, $row['class_priority']);
                            if ($php_errormsg !== NULL) {
                              //echo "<b>过滤正则[".($p_c_key+1)."]填写得不对！故没有对采集到的数据进行过滤。错误代码：</b><i>[".$php_errormsg."]</i><br>";
                              $php_errormsg = NULL;
                              continue;
                            } else {
                              $row['class_priority'] = $priority_temp;
                            }
                            unset($priority_temp);
                          }
                        }
                        if ($urldecode == 1) {
                          $row['class_priority'] = preg_replace_callback('/<a [^>]*href=([^>]+)>/iU', 'run_URLdecode', $row['class_priority']);
                          //$row['class_priority'] = filter2($row['class_priority']);
                        }
                      }
                    }
                    $text_p = "".($time_stamp)."\n".$p_time."\n".$p_url."\n".$p_b_temp."\n".$p_e_temp."\n".$p_b_is."\n".$p_e_is."\n".$p_change_rule."\n".$priority_pos_key."\n".$urldecode."";
                    $db_count = db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET class_priority="'.addslashes($row['class_priority']).'",class_grab="'.addslashes($text_p).'" WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title LIKE "栏目头栏%"');
                    //if ($db_count > 0) {
                    //   echo '<b>栏目头栏储存失败！错误代码：</b><i>['.$sql['db_err'].']</i><br>';
                    //}

                  }
                }
              } else {
                //echo "<b>采集源URL填写得不对！没有采集到数据。</b><br>";
              }
              //@ ini_set('track_errors', 0); 
            }
          }
        }
    } else {
      //$err = '数据为空或读取失败！';
    }
    $result = NULL;

} else {
  //$err = ''.$sql['db_err'].'';
}

db_close($db);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $web['area'][$_GET['column_id']][$_GET['class_id']][0]; ?> - 采集</title>
<style type="text/css">
<!--
html { margin:0; padding:0; }
body { margin:0; padding:0; font-size:14px; }
-->
</style>
</head>
<body>
<?php

if (isset($row['class_priority']) && !empty($row['class_priority'])) {
  echo $js_ok;
  echo $row['class_priority'];
} else {
  echo $js_err;

}

?>
</body>
</html>
