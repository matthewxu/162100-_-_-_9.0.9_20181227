<?php
require ('authentication_manager.php');
?>
<!--h5 class="list_title"><a class="list_title_in">管理员中心</a></h5-->
<div class="note">提示：
  <ol>
      <li>安装及使用帮助参见：<a href="http://www.162100.com/help/162100.html" target="_blank">http://www.162100.com/help/162100.html</a></li>
    <li>或者<a href="http://www.162100.com/help/162100.html" target="_blank">下载官方帮助文档</a></li>
  </ol>
</div>
<p> <b>欢迎使用162100.com原创程序！</b></p>
<ul>
  <li><b>名称：</b>162100网址导航3号 </li>
  <li><b>作者：</b>162100.com</li>
  <li><b>邮箱：</b>162100.com@163.com</li>
  <li><b>网址：</b>http://www.162100.com</li>
  <li><b>ＱＱ：</b>184830962</li>
  <li><b>声明：</b>仅供个人使用，禁止用于商业目的，特别是侵犯版权或程序转发的行为，否则我方将追究法律责任</li>
</ul>
<p>&nbsp;</p>
<p><b>版权声明</b></p>
<ul>
  <li>162100网址导航当前版本为免费，您下载后可以无偿使用，但不能以本程序进行商业交易或程序转发的形为。否则我方有追究法律责任的权利。</li>
  <li>使用者如使用、撷取162100网址导航的整体或部分程序，都应在您的网页中标记我方版权信息、或链接信息。</li>
  <li>使用者对下载、安装、使用或转载本程序而造成的纠纷或违规行为自承担全部责任。</li>
</ul>
<p>&nbsp;</p>
<p><b>问题汇报</b></p>
<ul>
  <li>欢迎您在使用过程中及时将发现的问题汇报与我方：<a href="http://download.162100.com" target="_blank">http://download.162100.com</a>，以便修正此程序。 </li>
</ul>
<p>&nbsp;</p>

<p><b>服务器系统信息</b></p>
<ul>
  <li>操作系统：<?php echo php_uname('s').php_uname('r'); ?></li>
  <li>PHP版本：<?php echo PHP_VERSION; ?></li>
  <li>MySQL版本：<?php 
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  echo db_version($db); 
} else {
  echo '未知';
}

db_close($db);
?></li>
  <li>Apache版本：<?php 
if (function_exists('apache_get_version')) {
  $version = @ apache_get_version();
  echo $version ? $version : '未取到';
  unset($version);
} else {
  echo '无法获取';
}
?></li></ul>
<p>&nbsp;</p>

<p><b>客户端信息</b></p>
<?php
 // 作用取得客户端的ip、地理信息、浏览器、本地真实IP
  
  ////获得访客浏览器类型
  function GetBrowser(){
   if(!empty($_SERVER['HTTP_USER_AGENT'])){
    $br = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/MSIE/i',$br)) {    
               $br = 'MSIE';
             }elseif (preg_match('/Firefox/i',$br)) {
     $br = 'Firefox';
    }elseif (preg_match('/Chrome/i',$br)) {
     $br = 'Chrome';
       }elseif (preg_match('/Safari/i',$br)) {
     $br = 'Safari';
    }elseif (preg_match('/Opera/i',$br)) {
        $br = 'Opera';
    }else {
        $br = 'Other';
    }
    return $br;
   }else{return "获取浏览器信息失败！";} 
  }
  
  ////获得访客浏览器语言
  function GetLang(){
   if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $lang = substr($lang,0,5);
    if(preg_match("/zh-cn/i",$lang)){
     $lang = "简体中文";
    }elseif(preg_match("/zh/i",$lang)){
     $lang = "繁体中文";
    }else{
        $lang = "English";
    }
    return $lang;
    
   }else{return "获取浏览器语言失败！";}
  }
  
   ////获取访客操作系统
  function GetOs(){
   if(!empty($_SERVER['HTTP_USER_AGENT'])){
    $OS = $_SERVER['HTTP_USER_AGENT'];
      if (preg_match('/win/i',$OS)) {
     $OS = 'Windows';
    }elseif (preg_match('/mac/i',$OS)) {
     $OS = 'MAC';
    }elseif (preg_match('/linux/i',$OS)) {
     $OS = 'Linux';
    }elseif (preg_match('/unix/i',$OS)) {
     $OS = 'Unix';
    }elseif (preg_match('/bsd/i',$OS)) {
     $OS = 'BSD';
    }else {
     $OS = 'Other';
    }
          return $OS;  
   }else{return "获取访客操作系统信息失败！";}   
  }
?>
<ul> 
<li>操作系统：<?php echo GetOs(); ?></li>
<li>您的IP：<?php echo user_ip(); ?></li>
<li>浏览器类型：<?php echo GetBrowser(); ?></li>
<li>浏览器语言：<?php echo GetLang(); ?></li>
</ul>


