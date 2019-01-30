<?php

//页面静态化
if (!function_exists('reset_indexhtml')) {
function reset_indexhtml($fr, $to) {
  global $web, $sql, $db, $persistent;
if (!isset($web['html'])) {
  @ require ('writable/set/set_html.php');
}

  if($web['html'] == true) {
    ob_start();
    $indexmod = 1;
    include ($fr);
    $content_t = ob_get_contents();
    ob_end_clean();
    if (write_file($to, $content_t)) {
      return true;
    }
  }
  return false;
}
}
?>