<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类设置——拼音纠错
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}

$output = '执行完毕。';

if (!empty($_POST['detail_correct']) && count($_POST['detail_correct']) > 0) {
@ require ('readonly/function/write_file.php');
  foreach($_POST['detail_correct'] as $k => $v) {
    list($_GET['column_id'], $_GET['class_id'], $_GET['detail_title'], $dpy_old) = @explode('_', $k);
    $_GET['detail_title'] = urldecode($_GET['detail_title']);
    $dpy_old = urldecode($dpy_old);
    if (db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET detail_title=CONCAT("'.$_GET['detail_title'].'|'.$v.'|",SUBSTRING(detail_title,LOCATE("|",detail_title,INSTR(detail_title, "|")+1)+1)) WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND detail_title LIKE "'.$_GET['detail_title'].'|%" AND http_name_style="" AND class_priority<>""')) {
      $o = 1;
    }
    if ($o == 1) {
      $output .= '多音字校正完毕！专题['.$_GET['detail_title'].']已设置好。<br />';
      //reset_indexhtml('index.php', 'index.html');
      if ($dpy_old != $v) {
        $d_ = 'writable/__web__/images/'.$_GET['column_id'].'_'.$_GET['class_id'];
        //@chmod('writable/__web__', 0777);
        //@chmod('writable/__web__/images', 0777);
        //@chmod($d_, 0777);
        eval('@chmod(\'writable/__web__\', 0'.$web['chmod'].');');
        eval('@chmod(\'writable/__web__/images\', 0'.$web['chmod'].');');
        eval('@chmod($d_, 0'.$web['chmod'].');');
        if (file_exists($d_.'/'.$dpy_old.'.gif')) { @rename($d_.'/'.$dpy_old.'.gif', $d_.'/'.$v.'.gif'); }
        if (file_exists($d_.'/'.$dpy_old.'.jpg')) { @rename($d_.'/'.$dpy_old.'.jpg', $d_.'/'.$v.'.jpg'); }
        if (file_exists($d_.'/'.$dpy_old.'.png')) { @rename($d_.'/'.$dpy_old.'.png', $d_.'/'.$v.'.png'); }
        @unlink($dpy_old.'.html');
        db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET http_name_style=REPLACE(REPLACE(http_name_style,"'.$dpy_old.'.html","'.$v.'.html"),"'.$d_.'/'.$dpy_old.'.","'.$d_.'/'.$v.'.") WHERE column_id="'.$_GET['column_id'].'" AND class_id="'.$_GET['class_id'].'" AND class_title=(SELECT TEMP.class_title FROM (SELECT M.* FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` M) TEMP WHERE TEMP.column_id="'.$_GET['column_id'].'" AND TEMP.class_id="'.$_GET['class_id'].'" AND TEMP.detail_title LIKE "'.$_GET['detail_title'].'|%" AND (TEMP.http_name_style="" AND TEMP.class_priority<>"") LIMIT 1)');
      }
      reset_indexhtml('detail.php', ''.$v.'.html');
    }
    unset($_GET['column_id'], $_GET['class_id'], $_GET['detail_title'], $img_, $dpy_old);
  }
}
db_close($db);

alert($output, 'webmaster_central.php?get=http');



?>