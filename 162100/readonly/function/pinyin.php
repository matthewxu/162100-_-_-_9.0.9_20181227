<?php

@ require('readonly/data/pinyin_table.php');

function pinyin($string, $first = false) {
  global $pinyin_table, $duoyin_mark;
  if (function_exists('mb_detect_encoding')) {
    $cha = @mb_detect_encoding($string, array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
  }
  if (!$cha) {
    $cha = 'UTF-8';
  }
  if ($cha != 'GBK') {
    if (!function_exists('iconv')) {
      err('你的系统未开启iconv函数，无法转换拼音！请开启iconv函数。');
    }
    $str = @iconv($cha, 'GBK', $string);
  }
/*
  if(strlen('拼音') == 6) {
    if (!function_exists('iconv')) {
      err('你的系统未开启iconv函数，无法转换拼音！请开启iconv函数。');
    }
    $str = iconv('UTF-8', 'GBK', $string);
  }
*/

  $text = '';

  //$duoyin_mark[$string] = '';
  for ($i=0;$i<strlen($str);$i++) {
    if (ord($str[$i]) >= 0x81 and ord($str[$i]) <= 0xfe) {
      $h = ord($str[$i]);
      if (isset($str[++$i])) {
        $l = ord($str[$i]);
        if (isset($pinyin_table[$h][$l])) {
          if (is_array($pinyin_table[$h][$l]) && count($pinyin_table[$h][$l]) > 1) {
            @ $duoyin_mark[$string] .= ''.@iconv('GBK', $cha, chr($h).chr($l)).''.@implode(', ', $pinyin_table[$h][$l]); //@iconv('gbk', 'utf-8', chr($h).chr($l));//
          }
          $text .= $first == false ? $pinyin_table[$h][$l][0] : substr($pinyin_table[$h][$l][0], 0, 1);
        } else {
          $text .= $h+$l;
        }
      }
    } else {
      $text .= $str[$i];
    }
  }
  return $text;
}


?>