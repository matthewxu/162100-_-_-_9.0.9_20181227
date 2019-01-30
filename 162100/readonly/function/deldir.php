<?php

//删除目录
function deldir($dir) {
  if (empty($dir) || !file_exists($dir)) {
    return;
  }
  if (is_file($dir)) {
    @unlink($dir);
     return true;
  }
  if ($fp = @opendir($dir)) {
    while (false !== ($file = @readdir($fp))) {
      if ($file != '.' && $file != '..') {
        if (is_dir($dir.'/'.$file)) {
          deldir($dir.'/'.$file);
        } else {
          @unlink($dir.'/'.$file);
        }
      }
    }
    if (readdir($fp) == false) {
      @closedir($fp);
      if (@rmdir($dir)) {
        return true;
      }
    }
  }
}

?>