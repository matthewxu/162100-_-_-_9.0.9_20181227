<?php
if (!function_exists('read_file')) {
  function read_file($url) {
  $r = '';
  if (preg_match('/^https?\:\/\//i', $url)) {
    $timeout = 5;                                           //设置一个超时时间，单位为秒
    $ch = @curl_init();
    @curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);           //设置超时   
    @curl_setopt($ch, CURLOPT_URL, $url);                   //设置访问的url地址   
    //@curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);    //用户访问代理 User-Agent   
    @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    @curl_setopt($ch, CURLOPT_REFERER, $url);               //设置 referer 
    @curl_setopt($ch, CURLOPT_HEADER, FALSE);               //是否显示头部信息   
    @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);        //跟踪301 
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);        //返回结果
    $r = @curl_exec($ch);
    @curl_close($ch);
    if(!$r){
      $ctx = @stream_context_create(array('http' => array('timeout' => $timeout)));
      $r=@file_get_contents($url, 0, $ctx);
    }
  } else {
    //if (file_exists($url)) {
      $r=@file_get_contents($url);
    //}
  }
  return $r;
  }
}
?>