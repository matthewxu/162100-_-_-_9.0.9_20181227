<?php
require ('authentication_member.php');
?>
<?php


if (empty($_GET['url'])) {
  die();
}

if (!isset($_GET['o'])) {
  die();
}

function filter($text){
  $text = trim($text);
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n]+/', '', $text);
  $text = preg_replace('/\s+/', ' ', $text);
  $text = str_replace('\'', '&#039;', $text);
  return $text;
}

$_GET['url'] = filter($_GET['url']);
$GLOBALS['num'] = (isset($_GET['num']) && is_numeric($_GET['num']) && $_GET['num'] > 0) ? $_GET['num'] : 50;

function read_reg($reg){
  global $webcontents;
  if(preg_match($reg,$webcontents,$m)){
	return filter($m[1]);
  }
  return $_GET['url'];
}


function run_url($matches) {
  global $t;
  $text = stripslashes($t.$matches[2]);
/*
  $text = preg_replace('/\'[\s\r\n]*\:[\s\r\n]*\'/', '\' => \'', $text);
  $uarr = e     val(str_replace('Q','', 'rQQeturQQn arQrQay').'('.$text.');');
*/
  $uarr_temp = preg_split('/\,/', trim(preg_replace('/[\n\r\s]/', '', trim($text, ',')), ','));

  if (is_array($uarr_temp) && count($uarr_temp) > 0) {
    foreach($uarr_temp as $vvvv) {
      list($key, $val) = preg_split('/\'\:\'/', $vvvv);
      $uarr[trim($key, " \n\r'")] = trim($val, " \n\r'");
      unset($key, $val);
    }
  }
  unset($uarr_temp, $vvvv);

  $urlv[$_GET['url']] = $uarr[$_GET['url']];
  unset($uarr[$_GET['url']]);

  $uarr = array($_GET['url'] => $urlv[$_GET['url']]) + $uarr;
  if (count($uarr) > $GLOBALS['num']) {
    $uarr = array_slice($uarr, 0, $GLOBALS['num']);
  }

  $text_new = var_export($uarr, TRUE);
  $text_new = str_replace('=>', ':', $text_new);
  $text_new = preg_replace('/array[\s\r\n]*\(/i', '', $text_new);
  $text_new = preg_replace('/\)[\s\r\n]*;?/', '', $text_new);
  $text_new = "
".trim($text_new, " \n\r,")."
";
  return 'var referrerTop={'.$text_new.'}';
}

@ require ('readonly/function/read_file.php');
@ require ('readonly/function/write_file.php');

$text = file_get_contents('writable/js/referrer_top.js');
$t = '';

if ($_GET['o'] == 0) {

} else {
  $webcontents=read_file($_GET['url']);

  if (!$sitetitle = read_reg('/<title>(.+)<\/title>/isU')){
    err('系统尝试连接网址：'.$_GET['url'].'失败！');
  }
  if (function_exists('mb_detect_encoding')) {
    $cha=mb_detect_encoding($webcontents, array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
  }
  if (!$cha) {
    $cha=read_reg('/charset[\s\r\n]*=[\s\r\n\'\"]*([\w\-]+)[^\>]*>/i');
  }
  unset($webcontents);
  if ($cha) {
    //$cha=preg_replace('/[\"\']+/', '', $cha);
    if(strtolower($cha)!='utf-8'){
      $sitetitle=iconv($cha,'utf-8',$sitetitle);
    }
  }
  $t = '\''.$_GET['url'].'\' : \''.$sitetitle.'\',';

}

$text = preg_replace_callback('/(var[\s\r\n]+referrerTop[\s\r\n]*=[\s\r\n]*\{)(.*)(\})/isU', 'run_url', $text);

//echo $text;

write_file('writable/js/referrer_top.js', $text);



?>