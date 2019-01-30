<?php
header('content-type:text/html; charset=utf-8');


$_GET['url'] = preg_replace('/[\s\r\n\<\>\"\']+|javascript\:/i', '', $_GET['url']);

if (!empty($_GET['url'])) {
  if (strpos($_GET['url'], 'http') === 0) {
    if (@ $_SERVER['HTTP_REFERER']) {
/*
      @ require ('writable/set/set.php');

function get_root_domain($url, $b=''){
  $url=preg_replace('/[\s\r\n]+/','',$url);
  $url=preg_replace('/^.+:\/\//U','',$url);
  $url=preg_replace('/\/.*$/','',$url);
  if(!$url){
    return '';
  }
  $top_domain=array('com','arpa','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','me','mobi'); 
  $state_domain=array( 
'al','dz','af','ar','ae','aw','om','az','eg','et','ie','ee','ad','ao','ai','ag','at','au','mo','bb','pg','bs','pk','py','ps','bh','pa','br','by','bm','bg','mp','bj','be','is','pr','ba','pl','bo','bz','bw','bt','bf','bi','bv','kp','gq','dk','de','tl','tp','tg','dm','do','ru','ec','er','fr','fo','pf','gf','tf','va','ph','fj','fi','cv','fk','gm','cg','cd','co','cr','gg','gd','gl','ge','cu','gp','gu','gy','kz','ht','kr','nl','an','hm','hn','ki','dj','kg','gn','gw','ca','gh','ga','kh','cz','zw','cm','qa','ky','km','ci','kw','cc','hr','ke','ck','lv','ls','la','lb','lt','lr','ly','li','re','lu','rw','ro','mg','im','mv','mt','mw','my','ml','mk','mh','mq','yt','mu','mr','us','um','as','vi','mn','ms','bd','pe','fm','mm','md','ma','mc','mz','mx','nr','np','ni','ne','ng','nu','no','nf','na','za','aq','gs','eu','pw','pn','pt','jp','se','ch','sv','ws','yu','sl','sn','cy','sc','sa','cx','st','sh','kn','lc','sm','pm','vc','lk','sk','si','sj','sz','sd','sr','sb','so','tj','tw','th','tz','to','tc','tt','tn','tv','tr','tm','tk','wf','vu','gt','ve','bn','ug','ua','uy','uz','es','eh','gr','hk','sg','nc','nz','hu','sy','jm','am','ac','ye','iq','ir','il','it','in','id','uk','vg','io','jo','vn','zm','je','td','gi','cl','cf','cn','yr' 
);
  $url=strtolower($url);
  $arr=@explode('.',$url);
  $n=count($arr);
  if($n<=2){
    return $b.$url;
  }
  $d1=$arr[$n-2];
  $d2=$arr[$n-1];
  if(in_array($d1, $top_domain)){
    if(in_array($d2, $state_domain)){
      return $b.$arr[$n-3].'.'.$d1.'.'.$d2;
    }else{
      return $b.$d1.'.'.$d2;
    }
  }else{
    return $b.$d1.'.'.$d2;
  }
}
      if (get_root_domain(htmlspecialchars($_SERVER['HTTP_REFERER'])) != get_root_domain(rtrim($web['sitehttp'], '/'))) {
        die('error!');
      }
*/

    } else {
      echo '<?xml version="1.0" encoding="UTF-8"?>';
      echo '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示：</title>
<style type="text/css">
<!--
body { text-align:center; margin:0; padding:10px; }
h2 { font-size:14px; color:#FF6600; }
.box { margin:50px auto; max-width:600px; background-color:#FFFFCC; border:1px dashed #339933; }
.in { line-height:30px; font-size:12px; }
-->
</style></head>
<body>
<div class="box">
<h2>提示：页面即将跳转至…</h2>
<div class="in">
<a href="'.$_GET['url'].'" id="a">'.$_GET['url'].'</a><br />
<a href="'.$_GET['url'].'">点击进入</a> <a href="javascript:void(0);" onclick="window.close();">关闭</a>';
  @ include ('writable/chuchuang/ad_juejinlian.txt');
  echo '
<script>
setTimeout(function(){
  clickButton("a");
}, 3000);
function clickButton(id) {
            if (document.all) {
                document.getElementById(id).click();
            }
            else {
                var evt = document.createEvent("MouseEvents");
                evt.initEvent("click", true, true);
                document.getElementById(id).dispatchEvent(evt);
            }
        }
</script>
</div>
</div>
</body>
</html>';
      die;
    }
  }
  //header('location: '.$_GET['url'].'');
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  echo '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示：</title>
</head>
<body>
<a href="'.$_GET['url'].'" id="a">正在进入...</a>
';
  @ include ('writable/chuchuang/ad_juejinlian.txt');
  echo '
<script>
function clickButton(id) {
            if (document.all) {
                document.getElementById(id).click();
            }
            else {
                var evt = document.createEvent("MouseEvents");
                evt.initEvent("click", true, true);
                document.getElementById(id).dispatchEvent(evt);
            }
        }
clickButton("a");
</script>
</body>
</html>
';







} else {
  header('location: http://www.162100.com/');
}







?>