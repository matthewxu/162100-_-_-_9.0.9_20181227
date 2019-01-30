<?php
require ('authentication_manager.php');
?>
<?php
//栏目分类设置
if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}
if (!isset($web['html'])) {
  @ require ('writable/set/set_html.php');
}


$no_ad = '';
$f = @file_get_contents('v.txt');
$v = '7.9';
if ($f && preg_match('/\$v\s*\=\s*\'(.*)\';/iU', $f, $matches)) {
  $v = base64_decode($matches[1]);
}
$v_162100 = '8.9.6';
  $v_162100_ = abs(preg_replace('/[^\d]+/', '', $v_162100));
  $v_        = abs(preg_replace('/[^\d]+/', '', $v));
  $len = strlen($v_162100_) >= strlen($v_) ? strlen($v_162100_) : strlen($v_);
  $v_162100_ = str_pad($v_162100_, $len, 0);
  $v_        = str_pad($v_, $len, 0);
  if ($v_ >= $v_162100_) {
    $no_ad = '&no_ad=1';
  }





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
  err('解压失败！不要再试了！你的服务器不支持解压！请到官方<a href="http://www.162100.com/s/download.php" target="_blank">下载专口</a>去下载，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />
（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
}

function write_file_($file, $text) {
  if (!file_put_contents($file, $text)) {
    write_file($file, $text);
  }
}

















@ set_time_limit(0);  //若配置为 0 则不限定最久时间


$web['sitehttp'] = 'http://'.(!empty($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']).'/';  //站点网址
$web['root'] = get_root_domain($web['sitehttp']);

if (!$web['root'] || $web['root']=='localhost' || $web['root']=='127.0.0.1') {
  err('您当前域名不合法！无法进行进一步的升级操作');
}

if ($_GET && $_GET['for_zip'] == 1) {
  err('<p>连接下载中……请等候</p><iframe src="http://www.162100.com/s/upload.php?domain='.urlencode($web['root']).'&for_zip=1" allowtransparency="true" frameborder="0" scrolling="no" style="width:100%; height:60px;"></iframe>');
} else {

  if (!class_exists('ZipArchive') && !function_exists('zip_open')) {
    err('你的服务器太弱，不支持解压！请到官方<a href="http://www.162100.com/s/download.php" target="_blank">下载专口</a>去下载，手动升级吧。'.(PHP_VERSION < '5.3.0' ? '<br />
（或者尝试升级你的PHP版本（当前'.PHP_VERSION.'）到5.3以上再试）' : '').'');
  }


  //$index_size = filesize('index.php');
  if (preg_match('/\$self\s*\=\s*\'(index\_\w+\.php)\'\;/i', @file_get_contents('index.php'), $mi)) {
    if ($mi[1]) {
      if (file_exists($mi[1])) {
        $eval1 = $mi[1];
        $eval2 = 'index.php';
      } elseif (file_exists('writable/require/'.$mi[1])) {
        $eval1 = 'writable/require/'.$mi[1];
        $eval2 = 'index.php';
      }
    }
  }

  if (!empty($_GET['del_zip_file'])) {
    $zip_file = preg_replace('/[\/]+|eval|base64_/i', '', $_GET['del_zip_file']);
    if (preg_match('/\.(zip|rar|gzip)$/i', $zip_file) && file_exists($zip_file)) {
      @unlink($zip_file);
    }
    alert('升级包已在根目录移除', '?get=upgrade');
  }

  echo '<p>连接下载中……请等候</p>';
  @ob_flush();
  @flush();
  @ require ('readonly/function/read_file.php');
  if ($remotely_file = read_file('http://www.162100.com/s/upload.php?domain='.urlencode($web['root']).$no_ad.'')) {
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
          @ require ('readonly/function/write_file.php');
          echo '<p>下载远程升级包成功！</p>';
          echo '<p>正在升级、文件更新中……请等候</p>';
          @ob_flush();
          @flush();
          if (freed_zip($local_file, './')) {

if($eval1 && $eval2) {
  @copy($eval1, $eval2);
}
if(file_exists('writable/js/parallel.js')) {
  @copy('readonly/js/parallel.js', 'writable/js/parallel.js');
}
if(file_exists('writable/js/referrer_top.js')) {
  @copy('readonly/js/referrer_top.js', 'writable/js/referrer_top.js');
}
if(file_exists('writable/require/newinfo.php')) {
  @copy('readonly/require/newinfo.php', 'writable/require/newinfo.php');
}
if(file_exists('writable/require/newsite.php')) {
  @copy('readonly/require/newsite.php', 'writable/require/newsite.php');
}
if(!file_exists('writable/js/search.js')) {
  @copy('readonly/require/search.js', 'writable/js/search.js');
  @unlink('readonly/require/search.js');
}
if(!file_exists('writable/js/search_h.js')) {
  @copy('readonly/require/search_h.js', 'writable/js/search_h.js');
  @unlink('readonly/require/search_h.js');
}

/*
$mode_arr = @glob('index_*.php');
if (count($mode_arr) > 0) {
  foreach ($mode_arr as $k) {
    if (file_exists($k)) {
      if ($index_size == filesize($k)) {
        @copy($k, 'index.php');
        break;
      }
    }
    unset($k);
  }
}
*/

@ setcookie('weathercity', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
@ setcookie('weathercity2', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600
@ setcookie('weatherfrom', '', -(time() + 365 * 24 * 60 * 60), '/'); //+8*3600

echo '<script> setCookie(\'weathercity\',\'\',-366);setCookie(\'weathercity2\',\'\',-366);setCookie(\'weatherfrom\',\'\',-366); </script>';
$id = gmdate('YmdHis', time() + (floatval($web['time_pos']) * 3600));
write_file('writable/require/browse_reload.txt', $id);

if ($web['html'] == true) {
  $SET_RELOAD = 1;
  //$style_set_unset .= '<div style="background-color:#FF6600; color:#FFF;">你对系统设置进行了更改，因为你开启了全静态，建议重新<a href="?post=html">一键生成全静态</a></div>';
  echo '<div style="background-color:#FF6600; color:#FFF;">正在更新静态页面...</div>
<div style="height:150px; overflow:auto;">';
  @ require ('readonly/run/post_manager_html.php');
  echo '</div>';
}

            err('<p><b class="redword">升级成功！</b></p><p class="grayword">是否删除升级包？<a href="?post=upgrade&del_zip_file='.urlencode($local_file).'">删除</a></p>');
          } else {
            err('升级失败！不要再试了！你的服务器不支持解压！请到官方<a href="http://www.162100.com/s/download.php" target="_blank">下载专口</a>去下载，手动升级吧');
          }
      } else {
        err('升级包没有正确生成！原因：空间写权限不足');
      }
    } else {
      err($remotely_file);
    }
  } else {
    err('读取远程信息失败！');
  }

}






?>