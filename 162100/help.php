<?php
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用帮助 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./write_newsite.php" class="top_title_other">网站加入</a><a href="./member.php?get=collection" class="top_title_other">自定义网址</a><a href="./">首页</a><a id="top_title_is">使用帮助</a></div>


<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr>
      <td class="menu_left" valign="top"><p>问题：</p>
          <ul>
            <li><a href="#w1">如何进入邮箱</a></li>
            <li><a href="#w2">如何定制天气</a></li>
            <li><a href="#w3">时钟和日历!</a></li>
            <li><a href="#w4">选择风格</a></li>
            <li><a href="#w6">使用搜索引擎</a></li>
            <li><a href="#w7">定制“我的网址”</a></li>
            <li><a href="#w8">查看分类栏目</a></li>
            <li><a href="#w9">设为首页及加入收藏</a></li>
            <li><a href="#w10">如何提交网站</a><br />
              <br />
            </li>
          </ul>
</td>
      <td class="menu_right"><h5>如何进入邮箱？<a name="w1" id="w1"></a></h5>
        答：将鼠标移到首页“邮箱登陆”，就会出现各类邮箱入口，然后选择进入即可。见下图：<br />
              <img src="readonly/images/help/w1.jpg" width="530" height="120" style="border:#66CCFF 2px solid;" /><br /><br />
              <h5>如何定制天气？<a name="w2" id="w2"></a></h5>
        答：在首页顶端点击天气预报，即可进入天气预报页面，然后选择您想要定制的城市设置即可。见下图：<br />
              <img src="readonly/images/help/w2_1.jpg" width="461" height="27" style="border:#66CCFF 2px solid;" /> =&gt; <img src="readonly/images/help/w2_2.jpg" width="500" height="52" style="border:#66CCFF 2px solid;" /><br />
              <br />
        <h5>时钟和日历!<a name="w3" id="w3"></a></h5>
        答：在首页右上部显示时间处，可直接点击进入更为详细的“世界时钟及日历”。见下图：<br />
              <img src="readonly/images/help/w3_1.jpg" width="221" height="26" style="border:#66CCFF 2px solid;" align="texttop" /> =&gt; <img src="readonly/images/help/w3_2.jpg" width="422" height="221" style="border:#66CCFF 2px solid;" align="texttop" /><br />
<br />

        <h5>选择风格？<a name="w4" id="w4"></a></h5>
        答：在首页右上角点击“个性化管理中心”点击“我的风格”即可设置各种风格。风格以cookie保存，见下图：<br />
              <img src="readonly/images/help/w4_1.jpg" width="100" height="27" style="border:#66CCFF 2px solid;" align="texttop" /> =&gt; 
              <img src="readonly/images/help/w4_2.jpg" width="500" height="228" style="border:#66CCFF 2px solid;" align="texttop" />
              <h5>使用搜索引擎？<a name="w6" id="w6"></a></h5>
        答：在各页面均有搜索引擎模块，并集成了各大著名搜索引擎，可一站式使用，可进行任意功能切换，优化搜索，见下图：<br />
              <img src="readonly/images/help/w6_1.jpg" width="669" height="189" style="border:#66CCFF 2px solid;" /><br />
              <br />
        <h5>定制“我的网址”？<a name="w7" id="w7"></a></h5>
        答：在首面找到“自定义网址”进入个性网址设置页面，设置自己喜欢的站点网址即可；另外，当您浏览分类栏目时，可随时将您喜欢的站点加入收藏，将其放进“我的网址”中，方便下次直接浏览。见下图：<br />
              <img src="readonly/images/help/w7_1.jpg" width="222" height="122" style="border:#66CCFF 2px solid;" /><br />
              <br />
        <h5>查看分类栏目？<a name="w8" id="w8"></a></h5>
        答：这个很简单，点击首页各栏分类即可。分类中又细分子类等，请仔细浏览吧！<br />
              <br />
        <h5>设为首页及加入收藏？<a name="w9" id="w9"></a></h5>
        答：这个很简单，找到“设为首页”或“加入收藏”，点击后弹出窗口，然后点确定即可。注意如果你电脑中的杀毒软件阻拦的话，请点允许放行。见下图：<br />
              <img src="readonly/images/help/w8_1.jpg" width="296" height="119" style="border:#66CCFF 2px solid;" /> <img src="readonly/images/help/w8_2.jpg" width="449" height="128" style="border:#66CCFF 2px solid;" /><br />
              <br />
        <h5>如何提交网站？<a name="w10" id="w10"></a></h5>
        答：点击首页“网站加入”或各页面底部页脚部分的“网站提交”。注意：您提交的网站需要站长审核后才能确定是否被收录。如果不符合收录要求，您的收录请求将会被拒绝。<br /></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>

</body>
</html>
