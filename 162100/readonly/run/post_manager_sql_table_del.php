<?php
require ('authentication_manager.php');
?>
<?php


/* 删除数据表、建立删除索引 */
/* 162100源码 - 162100.com */

if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('readonly/function/deldir.php');

function addFileToZip($path, $to_dir, $zip){
  $handler=opendir($path); //打开当前文件夹由$path指定。
  while(($filename=readdir($handler))!==false){
    if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..'，不要对他们进行操作
      if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
        addFileToZip($path."/".$filename, $to_dir, $zip);
      }else{ //将文件加入zip对象
        $zip->addFile($path."/".$filename, $to_dir."/".$filename);
      }
    }
  }
  @closedir($path);
}

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

if ($_GET['act'] == 'zip_beifen') {
  if (empty($_GET['beifen']) || !file_exists($_GET['beifen'])) {
    err('<script> alert("备份源参数出错！"); </script>');
  }
  $filename = preg_replace('/\.zip/i', '', $_GET['beifen']);
  $filezip = $filename.'.zip';
  if (file_exists($filezip)) {
    err('同名压缩包已经存在了！若想重新打包，请删除再时行');
  } else {
    if (!class_exists('ZipArchive')) {
      err('ZipArchive压缩类未开启！'.(PHP_VERSION < '5.3.0' ? '请尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上（此版本以上默认支持）再试' : '').'');
    }
    $zip=new ZipArchive();
    if($zip->open($filezip, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE)=== TRUE){
      $to_dir = basename($filename);
      $zip->addEmptyDir($to_dir);
      addFileToZip($filename, $to_dir, $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
      $zip->close(); //关闭处理的zip文件
      alert('打包成功！可返回页面下载了', 'webmaster_central.php?get=sql#beifen_'.basename($filename).'');
    } else {
      err('打包失败！');
    }
  }

} else if ($_GET['act'] == 'down_beifen') {
  if (empty($_GET['beifen']) || !file_exists($_GET['beifen'])) {
    err('<script> alert("备份源参数出错！"); </script>');
  }
  $filename = preg_replace('/\.zip/i', '', $_GET['beifen']);
  $filezip = $filename.'.zip';
  if (file_exists($filezip)) {
/*
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer"); 
    header('Content-disposition: attachment; filename='.basename($filezip)); //文件名   
    header("Content-Type: application/zip"); //zip格式的   
    header("Content-Transfer-Encoding: binary"); //告诉浏览器，这是二进制文件    
    header('Content-Length: '. filesize($filezip)); //告诉浏览器，文件大小   
    @readfile($filezip);
*/
    header('Location: '.$filezip);
  } else {
    err('出错了！打包文件不存在！');
  }





} else if ($_GET['act'] == 'del_beifen') {
  if (empty($_GET['beifen']) || !file_exists($_GET['beifen'])) {
    err('<script> alert("备份源参数出错！"); </script>');
  }
  deldir($_GET['beifen']);
  $tname = basename($_GET['beifen']);
  list($bf_t, $table_t) = @explode('_', $tname);
  if ($_GET['m'] == 1) {
    err('<script>
  var allCheckBox = parent.document.getElementsByName("beifen_'.$tname.'");
  if (allCheckBox != null && allCheckBox.length > 0) {
    for (var i = 0; i < allCheckBox.length; i++) {
      if (allCheckBox[i] != null) {
        allCheckBox[i].innerHTML = "";
        allCheckBox[i].style.display = "none";
      }
    }
  }
  </script>');
  } else {
    alert('备份已删除！', 'webmaster_central.php?get=sql#table_'.$bf_t.'');
  }
} else {
  $_GET['table'] = trim(trim($_GET['table']), '`');
  if (empty($_GET['table']) || !in_array($_GET['table'], $sql['data'])) {
    err('数据表名传递出错。');
  }
  if ($_GET['act'] == 'reset_id') {
    if ($_GET['table'] == 'member') {
      err('该表无法重置主键排序！否则注册成员身份ID乱了。');
    }
    $step = 0;
    db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$_GET['table'].'` ADD `id_temp` INT(10) NOT NULL AFTER `id`');
    $result = db_query($db, 'SELECT id FROM `'.$sql['pref'].''.$_GET['table'].'` ORDER BY id ASC');
    if ($result != false) {
      while ($row = db_fetch($db, $result)) {
        $step++;
        db_exec($db, 'UPDATE `'.$sql['pref'].''.$_GET['table'].'` SET id_temp="'.$step.'" WHERE id="'.$row['id'].'"');
        unset($row);
      }
    }
    $result = NULL;

    db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$_GET['table'].'` DROP `id`');
    db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$_GET['table'].'` CHANGE COLUMN `id_temp` `id` INT(10) NOT NULL');
    db_exec($db, 'ALTER TABLE `'.$sql['pref'].''.$_GET['table'].'` MODIFY COLUMN `id` INT(10) NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(id)');

    $out .= '数据库表格['.$_GET['table'].']重置主键排序完毕！';

  } elseif ($_GET['act'] == 'empty') {
    if ($_GET['table'] == 'member') {
      $result = db_query($db, 'SELECT *, HEX(face) AS f FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$web['manager'].'" LIMIT 1');
      $row = db_fetch($db, $result);
      $result = NULL;
    }
    $rs = db_exec($db, 'TRUNCATE TABLE '.$sql['pref'].''.$_GET['table'].'');
    if ($_GET['table'] == 'member') {
      if (isset($row) && is_array($row) && count($row) > 0) {
        db_exec($db, "INSERT INTO `".$sql["pref"]."".$sql["data"]["承载成员档案的表名"]."` (`username`,`password`,`email`,`thisdate`,`regdate`,`realname`,`alipay`,`bank`,`collection`,`notepad`,`memory_website`,`recommendedby`,`face`,`check_reg`,`session_key`,`login_key_qq`,`login_key_weibo`,`login_key_baidu`,`login_key_162100`,`stop_login`) values ('".$row["username"]."','".$row["password"]."','".$row["email"]."','".$row["thisdate"]."','".$row["regdate"]."','".$row["realname"]."','".$row["alipay"]."','".$row["bank"]."',".db_escape_string($db, $row["collection"]).",".db_escape_string($db, $row["notepad"]).",".db_escape_string($db, $row["memory_website"]).",".db_escape_string($db, $row["recommendedby"]).",UNHEX('".$row["f"]."'),'".$row["check_reg"]."','".$row["session_key"]."','".$row["login_key_qq"]."','".$row["login_key_weibo"]."','".$row["login_key_baidu"]."','".$row["login_key_162100"]."','".$row["stop_login"]."')");
        unset($row);
      } else {
        @ require ('writable/set/set_mail.php');
        db_exec($db, 'INSERT INTO `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` (`username`,`password`,`email`,`collection`,`notepad`,`memory_website`,`face`) values ("'.$web['manager'].'","'.$web['password'].'","'.$web['sender'].'","","","","")');
        //echo $sql['db_err'];
      }
    }
    $out .= '数据库表格['.$_GET['table'].']清空'.($rs ? '成功' : '失败').'！';

  } elseif ($_GET['act'] == 'clear') {
    if ($_GET['table'] == $sql['data']['承载网址数据的表名']) {
      @ require ('writable/set/set_area.php');
      $result = db_query($db, 'SELECT * FROM '.$sql['pref'].''.$_GET['table'].' ORDER BY id');
      $s = 0;
      while ($row = db_fetch($db, $result)) {
        if ($row['column_id'] == '' || $row['class_id'] == '' || !isset($web['area'][$row['column_id']][$row['class_id']]) || empty($row['class_title'])) {
          if (db_exec($db, 'DELETE FROM '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' WHERE id="'.$row['id'].'"')) {
            $s++;
          }
        }
        unset($row);
      }
      $result = NULL;
    } else {
      err('此表不能净化！');
    }
    $out .= '数据库表格['.$_GET['table'].']净化完毕。总计删除'.$s.'无用记录。';

  } elseif ($_GET['act'] == 'index') {
    if ($_GET['table'] == '162100') {
      $eval_index = db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' ADD INDEX `column_id_class_id` (column_id,class_id)');
    } elseif ($_GET['table'] == 'member') {
      $eval_index = (db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' ADD UNIQUE `username_check_reg` (username,check_reg)') && db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' ADD UNIQUE `email_check_reg` (email,check_reg)'));
    } elseif ($_GET['table'] == 'myaccount') {
      $eval_index = (db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' ADD INDEX `username` (username)') && db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' ADD UNIQUE `date` (date)'));
    }
    $out .= '数据库表格['.$_GET['table'].']建立索引'.($eval_index ? '成功' : '失败（索引已存在）').'！';

  } elseif ($_GET['act'] == 'index_del') {
    if ($_GET['table'] == '162100') {
      $eval_index = db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' DROP INDEX `column_id_class_id`');
    } elseif ($_GET['table'] == 'member') {
      $eval_index = (db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' DROP INDEX `username_check_reg`') && db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' DROP INDEX `email_check_reg`'));
    } elseif ($_GET['table'] == 'myaccount') {
      $eval_index = (db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' DROP INDEX `username`') && db_exec($db, 'ALTER TABLE '.$sql['pref'].''.$_GET['table'].' DROP INDEX `date`'));
    }
    $out .= '数据库表格['.$_GET['table'].']删除索引'.($eval_index ? '成功' : '失败（索引不存在）').'！';

  } elseif ($_GET['act'] == 'del') {
    $out .= '数据库表格['.$_GET['table'].']删除'.(db_exec($db, 'DROP TABLE IF EXISTS '.$sql['pref'].''.$_GET['table'].'') ? '成功' : '失败').'！';
  } else {
    err('参数错误！');
  }
}
db_close($db);

err(''.$out.'<a href="webmaster_central.php?get=sql">进入webmaster_central.php?get=sql</a>');


?>



