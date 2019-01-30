<?php
require ('authentication_manager.php');
?>
<?php

/* 网站参数配置 */
/* 162100源码 - 162100.com */
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}
@ require ('readonly/function/write_file.php');

function read_write($there_file, $here_file, $once_lenth) {
/*
  if ($fp1 = fopen($there_file, 'rb')) {
    while (!feof($fp1)) {
      $text = fread($fp1, $once_lenth);
      if ($fp2 = @fopen($here_file, 'ab')) {
        fwrite($fp2, $text);
      } else {
        return false;
        break;
      }
    }
    if (feof($fp1)) {
      return true;
    }
    fclose($fp1);
    fclose($fp2);
  } else {
    err('读取远程升级包失败！');
  }
*/
  if (($fp1 = fopen($there_file, 'rb')) && ($fp2 = @fopen($here_file, 'ab'))) {
    while (!feof($fp1)) {
      $text = fread($fp1, $once_lenth);
      fwrite($fp2, $text);
    }
    fclose($fp2);
    fclose($fp1);
  } else {
    err('读取远程升级包或创建本地升级包失败！原因：可能空间写权限不足');
  }

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
  //global $web;
  //err('解压失败！不要再试了！你的服务器不支持解压！请到官方<a href="http://www.162100.com/s/upload_mailer.php?domain='.urlencode($web['root']).'&for_zip=1" target="_blank">下载</a>，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
}

function write_file_($file, $text) {
  if (!file_put_contents($file, $text)) {
    write_file($file, $text);
  }
}





if (isset($_GET['mailer_upload']) && $_GET['mailer_upload'] == 1) {

  if (!empty($_GET['del_zip_file'])) {
    $zip_file = preg_replace('/[\/]+|eval|base64_/i', '', $_GET['del_zip_file']);
    if (preg_match('/\.(zip|rar|gzip)$/i', $zip_file) && file_exists($zip_file)) {
      @unlink($zip_file);
    }
    alert('升级包已在根目录移除', '?get=mail');
  }

  if (file_exists('./PHPMailer-master')) {
    err('你已经安装了PHPMailer-master插件！不必重复安装');
  }
  if (!file_exists('addfunds.php')) {
    err('商业版才能进行此项！');
  }
  @ set_time_limit(0);  //若配置为 0 则不限定最久时间
  $web['sitehttp'] = 'http://'.(!empty($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']).'/';  //站点网址
  $web['root'] = get_root_domain($web['sitehttp']);
  if (!$web['root'] || $web['root']=='localhost' || $web['root']=='127.0.0.1') {
    err('您当前域名不合法！无法进行进一步的升级操作');
  }
  if (!class_exists('ZipArchive') && !function_exists('zip_open')) {
    err('你的服务器太弱，不支持解压！请到官方<a href="http://www.162100.com/s/upload_mailer.php?domain='.urlencode($web['root']).'&for_zip=1" target="_blank">下载</a>，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />
（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
  }



  echo '<p>连接下载中……请等候</p>';
  @ob_flush();
  @flush();
  @ require ('readonly/function/read_file.php');
  if ($remotely_file = read_file('http://www.162100.com/s/upload_mailer.php?domain='.urlencode($web['root']).'')) {
    echo '<p>读取远程信息成功！</p>';
    @ob_flush();
    @flush();
    if (preg_match('/\.(zip|rar|gzip)$/i', $remotely_file)) {
      echo '<p>识别远程升级包成功！</p>';
      @ob_flush();
      @flush();
      $local_file = basename($remotely_file);
      echo '<p>下载远程升级包……请等候</p>';
      @ob_flush();
      @flush();
      read_write($remotely_file, $local_file, 1024*8);
      if (file_exists($local_file)) {
          echo '<p>下载远程升级包成功！</p>';
          echo '<p>正在升级、文件更新中……请等候</p>';
          @ob_flush();
          @flush();
          if (freed_zip($local_file, './')) {
            err('<p><b class="redword">安装成功！</b></p><p class="grayword">是否删除升级包？<a href="?post=mail&mailer_upload=1&del_zip_file='.urlencode($local_file).'">删除</a></p>');
          } else {
            err('解压失败！不要再试了！你的服务器不支持解压！请到官方<a href="http://www.162100.com/s/upload_mailer.php?domain='.urlencode($web['root']).'&for_zip=1" target="_blank">下载</a>，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
          }
      } else {
        err('安装包没有正确生成！原因：空间写权限不足');
      }
    } else {
      err($remotely_file);
    }
  } else {
    err('读取远程信息失败！');
  }

  die;

}








@ require ('readonly/function/cutstr.php');
@ require ('readonly/function/filter.php');

$_POST['smtppwd'] = str_replace('\'', '\\\'', $_POST['smtppwd']);

//$_POST = array_map('filter1', $_POST);

if (abs($_POST['mailer']) == 1) {
  if (!file_exists('./PHPMailer-master')) {
    err('你尚未安装PHPMailer-master插件！请选择轻量级驱动');
  }
}
if (empty($_POST['smtpuser']) || !preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['smtpuser']) || strlen($_POST['smtpuser']) > 255) {
  err('您登陆smtp服务器的用户名必填！格式：xxx@xxx.xxx(.xx) 。');
}
if (empty($_POST['sender']) || !preg_match('/^[\w\.\-]+@[\w\-]+\.[\w\.]+$/', $_POST['sender']) || strlen($_POST['sender']) > 255) {
  err('发件人必填！格式：xxx@xxx.xxx(.xx) 。');
}
if ($_POST['mailtype'] != 'html' && $_POST['mailtype'] != 'txt') {
  $_POST['mailtype'] = 'html';
}
function filter_this($t) {
  return str_replace('\'', '', $t);


}

$text = '<?php
$web[\'mailer\']     = '.(abs($_POST['mailer'])==1?1:0).'; //您的邮件发送插件类型 
$web[\'smtpsecure\'] = \''.($_POST['smtpsecure']=='ssl'?'ssl':'').'\'; //是否启用SSL加密  
$web[\'port\']       = '.cutstr((int)$_POST['port'], 255).'; //smtp服务器的端口  
$web[\'smtpserver\'] = \''.cutstr($_POST['smtpserver'], 255).'\'; //您的smtp服务器的地址 
$web[\'smtpuser\']   = \''.$_POST['smtpuser'].'\'; //您登陆smtp服务器的用户名 
$web[\'smtppwd\']    = \''.cutstr($_POST['smtppwd'], 255).'\'; //您登陆smtp服务器的密码 
$web[\'mailtype\']   = \''.$_POST['mailtype'].'\'; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件 
$web[\'sender\']     = \''.$_POST['sender'].'\'; //发件人,一般要与您登陆smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败

$web[\'mailto_subject_reg\'] = \''.filter_this($_POST['mailto_subject_reg']).'\';
$web[\'mailto_content_reg\'] = \''.filter_this($_POST['mailto_content_reg']).'\';

$web[\'mailto_subject_file\'] = \''.filter_this($_POST['mailto_subject_file']).'\';
$web[\'mailto_content_file\'] = \''.filter_this($_POST['mailto_content_file']).'\';

$web[\'mailto_subject_forpsw\'] = \''.filter_this($_POST['mailto_subject_forpsw']).'\';
$web[\'mailto_content_forpsw\'] = \''.filter_this($_POST['mailto_content_forpsw']).'\';

$web[\'mailto_subject_newsite\'] = \''.filter_this($_POST['mailto_subject_newsite']).'\';
$web[\'mailto_content_newsite\'] = \''.filter_this($_POST['mailto_content_newsite']).'\';


?>';

/* 写 */
write_file('writable/set/set_mail.php', $text);
reset_indexhtml('index.php', 'index.html');
alert('设置完毕！', 'webmaster_central.php?get=mail');




?>