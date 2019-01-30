<?php

function get_root_domain($url, $b=''){
  $url=preg_replace('/[\s\r\n]+/','',$url);
  $url=preg_replace('/^.+:\/\//U','',$url);
  $url=preg_replace('/\/.*$/','',$url);
  $url=preg_replace('/\:\d+$/','',$url);
  if(!$url){
    return '';
  }
  /*
  */
  if($url=='localhost' || $url=='127.0.0.1' || preg_match('/^\d+\.\d+\.\d+\.\d+$/', $url)){
    return $url;
  }
  if(!strstr($url, '.')){
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
?>