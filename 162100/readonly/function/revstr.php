<?php

function revstr($str) {
  $n = mb_strlen($str, 'UTF-8');
  $temp = '';
  for ($i=$n; $i>=0; $i--) {
    $temp .= mb_substr($str, $i, 1, 'UTF-8');
  }
  return sha1(md5($temp));
}


?>