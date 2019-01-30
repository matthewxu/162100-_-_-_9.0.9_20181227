<?php

function stripslashes_($str) {
  if (get_magic_quotes_gpc()) { //get_magic_quotes_runtime()
    $str = stripslashes($str);
  }
  return $str;
}

//过滤主题
function filter1($text, $no_filter_key = true) {
  $text = trim($text);
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n]+/', '<br />', $text);
  $text = preg_replace('/\s+/', ' ', $text);
  $text = str_replace('|', '&#124;', $text);
  $text = str_replace('\'', '&#039;', $text);
  //$text = str_replace('\\', '&#92;', $text);
  //$text = str_replace('?', '&#63;', $text);
  //$text = str_replace('*', '&#42;', $text);
  //$text = str_replace(':', '&#58;', $text);
  if ($no_filter_key == true) {
    filter_badwords($text);
  }
  return $text;
}

//对主题检测
function server_sbj($str) {
  if ($str == '')
    err('题目出现空项！问题分析：1、你没添写 2、程序传递出错。');
  if (($n = strlen($str)) && $n > 180)
    err('提交被拒绝！当前题目超过限度180个字符！（即限汉字60个，英文180个）<br />你要减少约'.ceil(($n - 180) / 3).'汉字，或减少约'.($n - 180).'个英文。');
}


//过滤内容
function filter2($text) {
  $text = trim($text);
  $text = stripslashes_($text);
  $text = str_replace('[','&#091;', $text);
  $text = str_replace(']', '&#093;', $text);
  $text = str_replace('|', '&#124;', $text);
  $text = str_replace('\\', '&#92;', $text);
  $text = preg_replace('/[\r\n\s]+/', ' ', $text);
  $text = preg_replace('/<\?.*\?>/sU', '', $text);
  $text = preg_replace('/<\!--.*-->/sU', '', $text);
  $text = preg_replace('/<\!DOCTYPE[^>]*>/i', '', $text);
  $text = preg_replace('/<\/(p|div|ul|ol|dt|dd|li)>/i', '</span>', $text);
  $text = preg_replace('/<p( [^>]*)?>/i', '<br><br><span$1>', $text);
  $text = preg_replace('/<(div|ul|ol)([^>]*)>/i', '<br><span$2>', $text);
  $text = preg_replace('/<(dt|dd|li)([^>]*)>/i', '<br>　·<span$2>', $text);
  $text = preg_replace('/<span>(.*)<\/span>/isU', '$1', $text);
  $text = preg_replace('/<([^>]+)align\s*=[\s\"\']*(center|left|right)[\s\"\']*([^>]*)>/i', '<${1} style="text-align:${2}" ${3}>', $text);
  
  $text = preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|noscript|form|iframe|frame|frameset|noframes|\?xml)[^>]*>/i', '', $text);
  //处理视频播放器
  //$text = preg_replace('/<(object|param)([^>]*) (id|name)([^>]*)>/i', '<${1}${2} video${3}${4}>', $text); //如果是视频，放行id或name标签
  $text = preg_replace('/<\/embed>/i', '', $text); //不得不加之，解决firefox下的bug
  $text = preg_replace('/<embed [^>]*>/i', '$0 <i style="display:none;">162100</i></embed>', $text); //不得不加之，解决firefox下的bug
  
  while (preg_match('/(<[^>]+) (title|alt|lang|id|name|class|on\w+)\s*=\s*((\"[^\">]+\")|(\'[^\'>]+\')|[^\s>]+)([^>]*>)/i', $text, $mat)) {
    $text = str_replace($mat[0], $mat[1].' '.$mat[6], $text);
    unset($mat);
  }
  while (preg_match('/(<[^>]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^>]*)/i', $text, $mat)) {
    $text = str_replace($mat[0], $mat[1].' '.$mat[3], $text);
    unset($mat);
  }

  $text=preg_replace('/<(hr|br|nobr|img|input|area|isindex|param)([^>]*)>/i','[\1\2]',$text); //单个使用的标记处理

  while(preg_match('/<(\w+)[^>]*>[^<>]*<\/\1>/i',$text,$mat)) {
    $text=str_replace($mat[0],str_replace('>',']',str_replace('<','[',$mat[0])),$text);
    unset($mat);
  }

  $text = str_replace('<', '&lt;', $text);
  $text = str_replace('>', '&gt;', $text);

  $text = preg_replace('/(\[br\]){2,}/i', '[br][br]', $text);

  while (preg_match('/(\[[^\]]*=\s*)(\"|\')([^=\2\]]+)\2([^\]]*\])/i', $text, $mat)) {
    $text=str_replace($mat[0], $mat[1].'|'.$mat[3].'|'.$mat[4], $text);
    unset($mat);
  }
  while (preg_match('/(\[[^\"\'\]]*)(\"|\')([^\]]*\])/i', $text, $mat)) {
    $text = str_replace($mat[0], $mat[1].$mat[3], $text);
    unset($mat);
  }
  $text = str_replace('"', '&quot;', $text);
  $text = str_replace('\'', '&#039;', $text);
  $text = str_replace('[', '<', $text);
  $text = str_replace(']', '>', $text);
  $text = str_replace('|', '"', $text);
  $text = preg_replace('/<(object|param)([^>]*) video(id|name)([^>]*)>/i', '<${1}${2} ${3}${4}>', $text); //转换视频中的id或name标签

  filter_badwords($text);
  return $text;
}

//内容提交检查
function filter_result_check($text) {
  $text = preg_replace('/ |&nbsp;|\r?\n|<br(\s+\/)?>/i', '', $text);
  while (preg_match('/<([a-z]+)[^><]*>([^><]*)<\/\1>/i', $text, $mat)) {
    $text = str_replace($mat[0], $mat[2], $text);
  }
  return $text;
}

//服务器端对内容检验
function server_chk($str,$len) {
  if (filter_result_check($str) == '')
    err('提交被拒绝！问题分析：1、你没添写 2、您并未输入有效的文本内容，如：你只输入了空格、空html标签等。');
  if (abs($len) > 0) {
    if (strlen($str) > $len)
      err('提交被拒绝！字数超出限定数量'.$len.'。');
  }
}

//过滤词汇
function filter_badwords($text) {
  if ($badwords = @file('writable/require/badword.txt')) {
    foreach ($badwords as $badword) {
	  $badword = trim($badword);
	  if ($badword != '') {
        $badword = preg_replace('/[0-9a-z]|[\x80-\xff]{3}/iU', '$0([^0-9a-z\x80-\xff]|(&[#a-z0-9]+;)| )*', $badword);
        $badword = preg_replace('/\(\[\^0-9a-z\\\x80-\\\xff\]\|\(&\[#a-z0-9\]\+;\)\| \)\*$/i', '', $badword);
        $badword = preg_replace('/^﻿\(\[\^0-9a-z\\\x80-\\\xff\]\|\(\&\[\#a-z0-9\]\+\;\)\| \)\*/i', '', $badword);
        if (preg_match('/'.$badword.'/i', $text, $matches))
          err('提交被拒绝！有禁用词汇“'.preg_replace('/[0-9a-z]|[\x80-\xff]{3}/iU', '$0<span style="color:#FFFFFF;display:none;">禁</span>', $matches[0]).'”。请返回检查。');
        unset($matches);
      }
    }
  }
}

?>