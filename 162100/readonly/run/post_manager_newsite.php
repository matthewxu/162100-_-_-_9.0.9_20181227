<?php
require ('authentication_manager.php');
?>
<?php

//栏目分类设置
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}

$_POST['id'] = array_unique((array)$_POST['id']);

if (count($_POST['id']) < 1) {
  err('参数出错！<br />问题分析：<br />1、您可能未选择<br />2、参数传递出错');
}
@ require ('writable/set/set_area.php');
@ require ('readonly/function/write_file.php');

if ($_POST['limit'] == 'del') {
  if ($file = @file('writable/__temp__/newsite_list.txt')) {
    foreach ((array)$_POST['id'] as $id) {
      unset($file[abs($id)]);
	}
    write_file('writable/__temp__/newsite_list.txt', @implode('', (array)$file));
    alert('执行成功。', 'webmaster_central.php?get=newsite');
  } else {
    err('文件writable/__temp__/newsite_list.txt已读不到数据');
  }


} elseif ($_POST['limit'] == 'pass') {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] != '') {
    err($sql['db_err']);
  }

  $new10 = array();
  $new10_file = (array)@file('writable/require/newsite10.txt');

  $file = (array)@file('writable/__temp__/newsite_list.txt');

  foreach ($_POST['id'] as $id) {
    //if... 此处应加安全判断，但由于是管理员自操作，免了
    $reset[$_POST['siteclass'][$id]] = 1;
    list($column_id, $class_id) = @explode('_', $_POST['siteclass'][$id]);
    list($class_title, $class_title_mark) = @explode('_', $_POST['sitetitle'][$id]);

    $result = db_query($db, 'SELECT http_name_style FROM '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.urldecode($class_title).'|%" AND detail_title="" LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;

    $new_line = preg_replace("/".preg_quote($_POST['siteurl'][$id], "/")."[^\n]+\|\n/iU", "", $row['http_name_style']);
	$new_line = $new_line.$_POST['siteurl'][$id]."|".$_POST['sitename'][$id]."||||\n";

    db_exec($db, 'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET http_name_style='.db_escape_string($db, $new_line).' WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.urldecode($class_title).'|%" AND detail_title=""');


	$new10[] = "<li>[<a href=\"class.php?column_id=".$column_id."&class_id=".$class_id."#class_title_".$class_title_mark."\">".$web["area"][$column_id][$class_id][0]."</a>] <a href=\"".$_POST['siteurl'][$id]."\">".$_POST['sitename'][$id]."</a></li>\n";
    unset($new_line, $column_id, $class_title, $class_title_mark, $class_id, $row);
	unset($file[abs($id)]);
  }
  db_close($db);

  $new10 = @array_merge($new10, $new10_file);
  $new10 = @array_unique($new10);
  $new10 = @array_filter($new10);
  $new10 = @array_slice($new10, 0, 10);
  write_file('writable/require/newsite10.txt', @implode('', $new10));
  write_file('writable/__temp__/newsite_list.txt', @implode('', $file));
  unset($id);


  foreach(array_keys((array)$reset) as $key) {
    list($_GET['column_id'], $_GET['class_id']) = @explode('_', $key);
    reset_indexhtml('class.php', $web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html');
    unset($key);
  }

  echo '<img src="readonly/images/ok.gif" /> 新站申录批准成功！';
  @ob_flush();
@flush();

  /*
  发送邮件-------------------
  */
  if ($_POST['mailto'] == 1) {
    echo '<br /><span style="background-color:#FF6600;color:#FFFFFF;">下面群发邮件通知</span>';
  @ob_flush();
@flush();
    if (count($_POST['email']) > 0) {

      @ require ('writable/set/set_mail.php');
      $web['mailer'] = !isset($web['mailer']) ? 0 : abs($web['mailer']);
      $web['smtpsecure'] = !isset($web['smtpsecure']) ? '' : ($web['smtpsecure']=='ssl'?'ssl':'');

      $mailerboty = array(0=>'readonly/function/mail_class.php', 1=>'PHPMailer-master/index.php');
      if (@file_exists($mailerboty[$web['mailer']])) {

        $web['mailto_subject_newsite'] = !empty($web['mailto_subject_newsite']) ? $web['mailto_subject_newsite'] : '恭喜：您网站的收录请求已经通过';
        $web['mailto_content_newsite'] = !empty($web['mailto_content_newsite']) ? $web['mailto_content_newsite'] : '　　您于<{addsitedate}>向<a href="<{webpath}>" target="_blank"><{sitename2}></a>提交的网站[<{addsitename}>]已通过审核，成功被收录。<br />　　收录页面为：<{addsitetext}><br />　　在此也欢迎光临<a href="<{webpath}>" target="_blank"><{sitename}></a>';

        $mailarr['subject'] = filter_mail($web['mailto_subject_newsite']);

        if ($web['mailer'] == 0) {
          $mailarr['subject'] = "=?UTF-8?B?".base64_encode($mailarr['subject'])."?="; //此行解决utf-8编码邮件标题乱码
        }
        @ require ($mailerboty[$web['mailer']]);

        foreach ($_POST['id'] as $id){
          list($column_id, $class_id) = @explode('_', $_POST['siteclass'][$id]);
          list($class_title, $class_title_mark) = @explode('_', $_POST['sitetitle'][$id]);

          $web['addsitedate'] = $_POST['date'][$id];
          $web['addsitename'] = $_POST['siteurl'][$id].' - '.$_POST['sitename'][$id];
          $web['addsitetext'] = '<a href="'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'#class_title_'.$class_title_mark.'" target="_blank">'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'</a>及<a href="'.$web['path'].''.$web['area'][$column_id]['name'][1].'_'.$web['area'][$column_id][$class_id][1].'.html#class_title_'.$class_title_mark.'" target="_blank">'.$web['area'][$column_id]['name'][1].'_'.$web['area'][$column_id][$class_id][1].'.html</a>';
          $mailarr['content'] = filter_mail($web['mailto_content_newsite']);
          unset($web['addsitedate'], $web['addsitename'], $web['addsitetext']);

          $to = $_POST['email'][$id]; //收件人
          if (mailer_send($to)) {
            echo '<br />邮件['.$to.']发送成功！';
          } else { 
            echo '<br />邮件['.$to.']发送失败！'; 
          }
          @ob_flush();
          @flush();

          unset($new_line, $column_id, $class_title, $class_title_mark, $to, $mailarr['content']);

        }
      } else {
        echo '<br />邮件发送插件未安装！';
      }
    } else {
      echo '<br />邮箱为空！';
    }
    echo '<br />群发邮件通知成功！';
  }
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);
reset_indexhtml('index.php', 'index.html');
  alert('执行完毕！', 'webmaster_central.php?get=newsite');


} else {
  err('命令错误！');
}


function filter_mail($text) {
  global $web;
  return preg_replace(
    array(
    '/\<\{sitename2\}\>/i',
    '/\<\{sitename\}\>/i',
    '/\<\{webpath\}\>/i',
    '/\<\{addsitedate\}\>/i',
    '/\<\{addsitename\}\>/i',
    '/\<\{addsitetext\}\>/i'
    ),
    array(
    $web['sitename2'],
    $web['sitename'],
    $web['path'],
    $web['addsitedate'],
    $web['addsitename'],
    $web['addsitetext']
    ),
    $text
  );
}



?>