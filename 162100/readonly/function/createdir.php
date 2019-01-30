<?php

//创建目录
  function createdir($dir) {
    global $web;
    $split_dir = strtok($dir, "/");
    $whole_dir = '';
    while ($split_dir !== false) {
      $whole_dir .= $split_dir.'/';
      $tempo_dir = rtrim($whole_dir, '/');
      //@chmod(dirname($tempo_dir), 0777);
      eval('@chmod(dirname($tempo_dir), 0'.$web['chmod'].');');
      if (!is_dir($tempo_dir)) {
        if (!@mkdir($tempo_dir)) {
          err('操作失败！原因分析：目录 '.$dir.' 不存在或不可创建或读写，可能是权限不足。请给予目录（'.dirname($tempo_dir).'）写权限。');
          return false;
        }
      }
      //@chmod($tempo_dir, 0777);
      eval('@chmod($tempo_dir, 0'.$web['chmod'].');');
      unset($tempo_dir);
      $split_dir = strtok("/");
    }
  }

?>