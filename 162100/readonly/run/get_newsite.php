<?php
@ini_set('default_charset', 'utf-8');
header('content-type:text/html; charset=utf-8');
header("Cache-Control: max-age=1296000");



$path = isset($_GET['path']) && $_GET['path'] == '../../' ? '../../' : './';

$text=@file_get_contents($path.'writable/require/newsite10.txt');
//echo !empty($text)?$text.'<li style="text-align:right"><a href="newsite.php">更多&gt;&gt;</a></li>':'<li>暂无收录记录！</li>';
echo !empty($text)?$text:'<li>暂无收录记录！</li>';
?>