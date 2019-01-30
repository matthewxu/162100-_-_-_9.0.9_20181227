<?php
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页修复 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
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
<div id="top_title"><a href="./">首页</a><a id="top_title_is">首页修复</a></div>

<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><p>问题：</p>
        <ul>
          <li><a href="#w1">如何将162100设为您的主页？</a></li>
          <li><a href="#w2">162100首页被恶意篡改，我该怎么办？</a></li>
          <li><a href="#w3">反馈</a></li>
          <li><a href="#w4">系统安全补丁更新</a></li>
        </ul></td>
      <td class="menu_right"><h5>如何将162100设为您的主页？<a name="w1" id="w1"></a></h5>
        以IE5.0以上版本为例，点击浏览器上方菜单的“ 工具(Tools) ”选项，选择“Internet 选 项 (Internet   Options)”，如下图所示：<br />
        <img height="168" src="readonly/images/help/help_01.gif" width="360" style="border:#66CCFF 2px solid;" /> <br />
        在弹出的对话框中“主页”空白处填入http://www.162100.com，然后点“确定”即可。如下图所示：<br />
        <img src="readonly/images/help/help_02.gif" width="430" height="447" style="border:#66CCFF 2px solid;" /><br />
        <br />
        <h5>162100首页被恶意篡改，我该怎么办？<a name="w2" id="w2"></a></h5>
        1.使用<strong>162100</strong>桌面快捷方式，方法如下：<br />
        第一步：在桌面空白处按鼠标右键，点“新建”，再点“快捷方式”；<br />
        第二步：输入 http://www.162100.com/ ，按下一步；<br />
        第三步：再输入 162100 按完成。图示说明如下： <br />
        2.如果您的首页被别的不法网站恶意修改，而无法将“162100”www.162100.com设为首页，请用以下方法→<br />
        第一步：在桌面空白处按鼠标右键，点“新建”，再点“快捷方式”，见图1<br />
        第二步：输入 http://www.162100.com/ ，按下一步，见图2<br />
        第三步：再输入 162100 按完成，见图3<br />
        图示说明如下：<br />
        <img height="377" src="readonly/images/help/162100-1.gif" width="379" style="border:#66CCFF 2px solid;" /><br />
        图1--在桌面空白处按鼠标右键，点“新建”，再点“快捷方式”
        </p>
        <img height="301" src="readonly/images/help/162100-2.gif" width="447" style="border:#66CCFF 2px solid;" /><br />
        图2--在上面输入http://www.162100.com
        </p>
        <img height="301" src="readonly/images/help/162100-3.gif" width="447" style="border:#66CCFF 2px solid;" /><br />
        图3--为它取个名字，请输入162100 或者输入162100<br />
        以后上网看网页就点桌面上的<img height="71" src="readonly/images/help/162100-4.gif" width="71" style="border:#66CCFF 2px solid;" />即可。不再是点击<img height="75" src="readonly/images/help/162100-5.gif" width="68" style="border:#66CCFF 2px solid;" />这个图标了。<br />
        <br />
        <h5>反馈<a name="w3" id="w3"></a></h5>
        <a href="http://www.12321.org.cn/">中国互联网协会举报受理中心</a> 　举报电话：010-12321 　　举报邮箱：<a href="mailto:f21@12321.org.cn">f21＠12321.org.cn</a><br />
        <br />
        <h5>系统安全补丁更新<a name="w4" id="w4"></a></h5>
        如果您的首页被恶意篡改，绑定首页的病毒木马都是通过系统或者IE漏洞修改的，请大家及时更新系统安全补丁，提早预防。您可以通过以下几种方式更新：<br />
        1、系统自带的自动更新功能（开始-控制面版-自动更新）或 <a href="http://update.microsoft.com/">点此更新</a><br />
        2、江民、瑞星等杀毒软件自带的系统漏洞检查<br />
        3、360安全卫士的漏洞补丁 <a href="http://www.360.cn/">http://www.360.cn/</a></td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>


</body>
</html>
