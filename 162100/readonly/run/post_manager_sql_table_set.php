<?php
require ('authentication_manager.php');
?>
<?php
@ set_time_limit(0);  //若配置为 0 则不限定最久时间

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


function freed_zip($file, $path) {
  if (class_exists('ZipArchive')) {
    $zip = new ZipArchive;
    if ($zip->open($file)) {
      $zip->extractTo($path);
      $zip->close();
      return true;
    }
  } else {
    if (function_exists('zip_open')) {
      $resource = @zip_open($file);
      while ($dir_resource = @zip_read($resource)) {
        if (@zip_entry_open($resource, $dir_resource)) {
          $file_name = $path.zip_entry_name($dir_resource);
          $file_path = substr($file_name, 0, strrpos($file_name, "/"));
          if(!is_dir($file_path)){
            @mkdir($file_path, 0755, true);
          }
          if(!is_dir($file_name)){
            $file_size = @zip_entry_filesize($dir_resource);
            $file_content = @zip_entry_read($dir_resource, $file_size);
            write_file_($file_name, $file_content);
          }
          @zip_entry_close($dir_resource);
        }
      }
      @zip_close($resource); 
      return true;
    }    
  }
  err('解压失败！不要再试了！你的服务器不支持解压！请到官方<a href="http://www.162100.com/s/download.php" target="_blank">下载专口</a>去下载，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />
（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
}

function write_file_($file, $text) {
  if (!file_put_contents($file, $text)) {
    write_file($file, $text);
  }
}


if (empty($_REQUEST['beifen'])) {
  err('备份源不能空！');
}
if (!file_exists($_REQUEST['beifen'])) {
  err('指定的备份源不存在！');
}

if (preg_match('/^(.+)\.zip$/i', $_REQUEST['beifen'], $m)) {
  if (!class_exists('ZipArchive') && !function_exists('zip_open')) {
    err('你的服务器太弱，不支持解压！无法直接使用压缩包导入数据。'.(PHP_VERSION < '5.3.0' ? '请尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上（此版本以上默认支持）再试' : '').'');
  }
  @ require ('readonly/function/write_file.php');
  if (!freed_zip($_REQUEST['beifen'], dirname($_REQUEST['beifen']))) {
    err('解压失败！');
  }
  $_REQUEST['beifen'] = preg_replace('/\.zip/i', '', $_REQUEST['beifen']);

}

if (!empty($_GET['table'])) {
  if (!in_array($_GET['table'], $sql['data'])) {
    err('数据表名出错！');
  }
  $arr_creare = @glob($_REQUEST['beifen'].'/create_'.$_GET['table'].'.php');
  $arr_insert = @glob($_REQUEST['beifen'].'/insert_'.$_GET['table'].'_*.php');
} else {
  $arr_creare = @glob($_REQUEST['beifen'].'/create_*.php');
  $arr_insert = @glob($_REQUEST['beifen'].'/insert_*.php');
}

if (count($arr_creare) == 0) {
  err('备份源文件出错！（没有MYsql结构文件源）');
}

if (!$db) {
  $db = db_conn();
}
if (!$db) {
  err($sql['db_err']);
}


$sql['sql_version'] = db_version($db);
/*
//查看分区：SELECT * FROM INFORMATION_SCHEMA.partitions WHERE TABLE_SCHEMA='web162100' AND TABLE_NAME='yzsou_reply';
*/
$result = db_query($db, 'SHOW VARIABLES LIKE "%partition%"');
$row = db_fetch($db, $result);
$sql['sql_part'] = $row; //[Variable_name] => have_partitioning  [Value] => YES
$result = NULL;
unset($row);

if (!($sql['sql_version'] >= '5.1' && $sql['sql_part']['Variable_name'] == 'have_partitioning' && $sql['sql_part']['Value'] == 'YES')) {
  $sql_err = '<div class="siteannounce">告知：你的MYSQL服务器分区功能被禁用，可能是设置问题或被空间商禁用，数据表无法实现分区功能。虽大数据量时优化受影响，但仍可正常使用。</div>';
}


foreach ($arr_creare as $k => $v) {
  $s_table = substr(basename($v, '.php'), 7);

  $sql_ta_query = @file_get_contents($v);
  $sql_ta_query = isset($sql_err) ? preg_replace('/[\s\r\n]*\/\*.*\*\/[\s\r\n]*/sU', '', $sql_ta_query) : $sql_ta_query;

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$s_table.'` LIMIT 1');
  $row = db_fetch($db, $result);
  $result = NULL;
  if (abs($row['total']) > 0) {
    $out_put .= '〖表'.$s_table.'已存在！是否：<a href="?post=sql_table_del&table='.$s_table.'&act=del" onclick="return confirm(\'确定删除表'.$s_table.'么？\')" target="_blank">删除</a>〗 ';
  } else {
    if (db_exec($db, 'CREATE TABLE IF NOT EXISTS `'.$sql['pref'].''.$s_table.'` '.substr($sql_ta_query, 15).'')) {
      $out_put .= '〖表'.$s_table.'创建成功！〗 ';
    } else {
      $out_put .= '〖表'.$s_table.'创建失败！'.$sql['db_err'].']〗　 ';
    }
  }
  unset($row);
}
unset($arr_creare, $k, $v, $s_table);

foreach ($arr_insert as $k => $v) {
  list($s_table, ) = @explode('_', substr(basename($v, '.php'), 7));
  if ($s_table == $sql['data']['承载成员档案的表名']) {
    $reset_member_tb = true;
  }
  db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$s_table.'` '.substr(@file_get_contents($v), 15).'');
  //echo ''.$sql['db_err'].'<br />';
}
unset($arr_insert, $k, $v, $s_table);

if (isset($reset_member_tb) && $reset_member_tb == true) {
  db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET session_key="'.$session[1].'|'.$session[2].'" WHERE username="'.$web['manager'].'" LIMIT 1');
}

db_close($db);

alert($out_put.$sql_err.'<br />数据库配置成功！<a href="?get=sql">返回数据库管理</a>', '?get=sql');


?>