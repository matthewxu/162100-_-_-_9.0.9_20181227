<?php

if (file_exists('writable/set/set.php')) {
  $GLOBALS['WEATHER_DATA'] = '';
} else {
  $GLOBALS['WEATHER_DATA'] = '../../';
}
if (!isset($web)) {
  require ($GLOBALS['WEATHER_DATA'].'writable/set/set.php');
}
if (!function_exists('read_file')) {
function read_file($url){
  $timeout = array(
    'http' => array(
        'timeout' => 5 //设置一个超时时间，单位为秒
    )
  );
  $ctx = @stream_context_create($timeout);
  $r=@file_get_contents($url, 0, $ctx);
  if(!$r){
    $ch = @curl_init();   
    @curl_setopt($ch, CURLOPT_URL, $url);            //设置访问的url地址   
    //curl_setopt($ch,CURLOPT_HEADER,1);            //是否显示头部信息   
    @curl_setopt($ch, CURLOPT_TIMEOUT, 3);           //设置超时   
    @ curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);   //用户访问代理 User-Agent   
    @curl_setopt($ch, CURLOPT_REFERER,_REFERER_);        //设置 referer   
    @curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);      //跟踪301   
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果   
    $r = @curl_exec($ch);
    @curl_close($ch);
  }
  return $r;
}
}

if (empty($web['newinfo_url'][0]) || empty($web['newinfo_url'][1])) {
  $web['newinfo_url'][0] = 'http://info.162100.com/get_newinfo_for162100.php';
  $web['newinfo_url'][1] = 'http://info.162100.com/write.php';
}
if (!preg_match('/^https?:\/\//i', $web['newinfo_url'][0])) {
  if (!file_exists($web['newinfo_url'][0])) {
    echo '信息窗调用路径出错！<br />
请检查后台“基本参数管理”中此项设置';
    die();
  }
}


echo read_file($web['newinfo_url'][0]);






?>