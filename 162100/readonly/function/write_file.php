<?php

if (!function_exists('err')) {
  function err($text) {
    die('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>'.$text.'</body></html>');
  }
}

//写文件
if (!function_exists('write_file')) {
  function write_file($file, $text) {
    global $web;
    if (empty($web['chmod']) || $web['chmod'] < 755) {
      $web['chmod'] = 755;
    }
    $split_dir = strtok($file, "/");
    $whole_dir = '';
    while ($split_dir !== false) {
      $whole_dir .= $split_dir.'/';
      $tempo_dir = rtrim($whole_dir, '/');
      //@chmod(dirname($tempo_dir), 0777);
      eval('@chmod(dirname($tempo_dir), 0'.$web['chmod'].');');
      if (!file_exists($tempo_dir)) {
        if ($tempo_dir != $file) {
          $mk = '目录';
          eval('$sk = @mkdir($tempo_dir, 0'.$web['chmod'].');');
        } else {
          $mk = '文件';
          $sk = @touch($tempo_dir);
        }
        if (!$sk) {
          err('操作失败！原因分析：'.$mk.' '.$file.' 不存在或不可创建或读写，可能是权限不足。请给予目录（'.dirname($tempo_dir).'）写权限。');
          return false;
        }
      }
      //@chmod($tempo_dir, 0777);
      eval('@chmod($tempo_dir, 0'.$web['chmod'].');');
      unset($tempo_dir);
      $split_dir = strtok("/");
    }

    if (is_writable($file) && ($fp = @fopen($file, 'rb+'))) {
      f_lock($fp);
      @ftruncate($fp, 0);
      @fwrite($fp, $text);
      @flock($fp, LOCK_UN);
      fclose($fp);
      return true;
    } else {
      err('操作失败！原因分析：文件'.$file.'不可读写，请给予目录写权限。');
      return false;
    }

  }

  //锁定文件
  function f_lock($fp) {
    if ($fp) {
      if (!flock($fp, LOCK_EX)) {
        sleep(1);
        f_lock($fp);
      }
    }
  }
}

?>