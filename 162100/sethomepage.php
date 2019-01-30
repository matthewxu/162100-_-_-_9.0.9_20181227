<?php
@ require ('writable/set/set.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设为首页 - <?php echo $web['sitename2'], $web['code_author']; ?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
.no { display:none; }
#current_browser { display:block; }
.browser_contents { font-size:12px; margin:10px 0; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>

</head>
<body>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./">首页</a><a id="top_title_is">各种浏览器如何设为首页</a></div>

<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
      <td class="menu_left"><ul>
        <li><a id="bar-ie" href="#ie" onclick="confirmBrowser('ie');">IE浏览器</a></li>
        <li><a id="bar-360" href="#360" onclick="confirmBrowser('360');">360浏览器</a></li>
        <li><a id="bar-sogou" href="#sogou" onclick="confirmBrowser('sogou');">搜狗浏览器</a></li>
        <li><a id="bar-chrome" href="#chrome" onclick="confirmBrowser('chrome');">谷歌Chrome浏览器</a></li>
        <li><a id="bar-2345" href="#2345" onclick="confirmBrowser('2345');">2345浏览器</a></li>
        <li><a id="bar-theworld" href="#theworld" onclick="confirmBrowser('theworld');">世界之窗浏览器</a></li>
        <li><a id="bar-tt" href="#tt" onclick="confirmBrowser('tt');">腾迅TT浏览器</a></li>
        <li><a id="bar-maxthon" href="#maxthon" onclick="confirmBrowser('maxthon');">遨游浏览器</a></li>
        <li><a id="bar-qq" href="#qq" onclick="confirmBrowser('qq');">QQ浏览器</a></li>
        <li><a id="bar-firefox" href="#firefox" onclick="confirmBrowser('firefox');">火狐Firefox浏览器</a></li>
        <li><a id="bar-opera" href="#opera" onclick="confirmBrowser('opera');">Opera浏览器</a></li>
        <li><a id="bar-safari" href="#safari" onclick="confirmBrowser('safari');">safari浏览器</a></li>
        <li><a id="bar-green" href="#green" onclick="confirmBrowser('green');">绿色浏览器</a></li>
        <li><a id="bar-360ee" href="#360ee" onclick="confirmBrowser('360ee');">360极速浏览器</a></li>
        <li><a id="bar-kr" href="#kr" onclick="confirmBrowser('kr');">KR浏览器</a></li>
      </ul></td>
      <td class="menu_right">

      <div class="no" id="current_browser">
        <div id="area_ie" class="column_title_">IE浏览器</div>
        <div class="browser_contents">
          <p><strong>方法一：点击本站的“设为首页”链接进行设置</strong></p>
          <p>打开<?php echo $web['sitename2']; ?>首页<?php echo $web['path']; ?>，点击页面左上角的LOGO，或右上角的“设为主页”</p>
          <p><img src="readonly/images/sethomepage/ie_1.gif" /></p>
          <p>然后在弹出的“是否设为主页”的窗口里选择“是”即可。 </p>
          <p><img src="readonly/images/sethomepage/ie_2.gif" /></p>
          <br/>
          <p><strong>方法二：设置浏览器的“主页”选项</strong> </p>
          <p>首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“Internet 选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/ie_3.gif" /></p>
          <br/>
          <p> 然后在打开的对话窗口中的主页栏的地址输入框中输入“<?php echo $web['path']; ?>”，然后点击窗口下方的“确定”按扭即可，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/ie_4.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_360" class="column_title_">360浏览器</div>
        <div class="browser_contents">
          <p>360浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“360安全浏览器选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/360_1.gif" /></p>
          <p>2）然后在打开的对话窗口中的主页设置的地址输入框中输入“<?php echo $web['path']; ?>”设置修改后会自动生效，无需手动保存。如图所示： </p>
          <p><img src="readonly/images/sethomepage/360_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_sogou" class="column_title_">搜狗浏览器</div>
        <div class="browser_contents">
          <p>搜狗浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“搜狗浏览器选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/sogou_1.gif" /></p>
          <p>&nbsp; </p>
          <p> 2）然后在打开的对话窗口中选择“自定义网址”，在后面的对话框中输入“<?php echo $web['path']; ?>”，然后点击窗口下方的“确定”按扭即可，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/sogou_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_chrome" class="column_title_">谷歌Chrome浏览器</div>
        <div class="browser_contents">
          <p>Chrome浏览器设置主页的方法：</p>
          <p>1）首先，点击浏览器上右侧“扳手”按钮，在下拉列表中选择“选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/chrome_1.gif" /></p>
          <p>2）然后选择“外观”点击“更改”：</p>
          <p><img src="readonly/images/sethomepage/chrome_2.gif" /></p>
          <p>3) 并在输入框中输入“<?php echo $web['path']; ?>”即可 </p>
          <p><img src="readonly/images/sethomepage/chrome_3.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>


      <div class="no">
        <div id="area_2345" class="column_title_">2345浏览器</div>
        <div class="browser_contents">
          <p>2345浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“2345浏览器选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/2345_1.gif" /></p>
          <p>2）然后在打开的对话窗口中点击“自定义网址”，输入“<?php echo $web['path']; ?>”点击“确定”即可。</p>
          <p><img src="readonly/images/sethomepage/2345_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>


      <div class="no">
        <div id="area_theworld" class="column_title_">世界之窗浏览器</div>
        <div class="browser_contents">
          <p>世界之窗浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/theworld_1.gif" /></p>
          <p>2）然后在打开的对话窗口中的主页设置的输入框中输入“<?php echo $web['path']; ?>”即可</p>
          <p><img src="readonly/images/sethomepage/theworld_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>


      <div class="no">
        <div id="area_tt" class="column_title_">腾讯TT浏览器</div>
        <div class="browser_contents">
          <p>腾讯TT浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“TT选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/tt_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中的主页栏的地址输入框中输入“<?php echo $web['path']; ?>”，然后点击窗口上方的“保存”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/tt_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>


      <div class="no">
        <div id="area_maxthon" class="column_title_">遨游浏览器</div>
        <div class="browser_contents">
          <p>傲游浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“傲游设置中心”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/maxthon_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中的主页栏的地址输入框中输入“<?php echo $web['path']; ?>”，然后点击窗口上方的“应用”按扭即可，如下图所示： </p>
          <p><img src="readonly/images/sethomepage/maxthon_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_qq" class="column_title_">QQ浏览器</div>
        <div class="browser_contents">
          <p>QQ浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“扳手”，在下拉列表中选择“选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/qq_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中选择“自定义网址”并输入“<?php echo $web['path']; ?>”，然后点击“保存”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/qq_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>
      <div class="no">
        <div id="area_firefox" class="column_title_">火狐Firefox浏览器</div>
        <div class="browser_contents">
          <p>火狐(Firefox)浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/firefox_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中的主页栏的主页地址输入框中输入“<?php echo $web['path']; ?>”，然后点击“确定”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/firefox_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>
      <div class="no">
        <div id="area_opera" class="column_title_">Opera浏览器</div>
        <div class="browser_contents">
          <p>Opera浏览器设置主页的方法：</p>
          <p>1）首先，点击左上角菜单按钮，在下拉列表中选择“设置”—“首选项”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/opera_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中的主页栏的主页地址输入框中输入“<?php echo $web['path']; ?>”，然后点击“确定”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/opera_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>
      <div class="no">
        <div id="area_safari" class="column_title_">Safari浏览器</div>
        <div class="browser_contents">
          <p>Safari浏览器设置主页的方法：</p>
          <p>1）首先，点击“设置按钮”，在下拉列表中选择“偏好设置”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/safari_1.gif" /></p>
          <p>2）然后在打开的对话框窗口中的地址输入框中输入“<?php echo $web['path']; ?>”，关闭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/safari_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>
      <div class="no">
        <div id="area_green" class="column_title_">绿色浏览器</div>
        <div class="browser_contents">
          <p>绿色浏览器设置主页的方法：</p>
          <p>1）首先，点击浏览器右上角的“菜单”，在下拉列表中选择“工具”—“Internet选择”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/green_1.gif" /></p>
          <p> 2）然后在打开的对话窗口中的主页栏的主页地址输入框中输入“<?php echo $web['path']; ?>”，然后点击“确定”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/green_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_360ee" class="column_title_">360极速浏览器</div>
        <div class="browser_contents">
          <p>360极速浏览器设置主页的方法：</p>
          <p>1）首先，点击右上角的“设置”按钮，在下拉列表中选择&quot;选项&quot;，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/360_1.gif" /></p>
          <p>2）然后在打开的页面中的打开此页输入框中输入“<?php echo $web['path']; ?>”，关闭浏览器重新打开即可，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/360_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>
      <div class="no">
        <div id="area_kr" class="column_title_">KR浏览器</div>
        <div class="browser_contents">
          <p>KR浏览器设置主页的方法：</p>
          <p>1）首先，打开浏览器上部菜单栏的“工具”栏，在下拉列表中选择“修改主页”，如下图所示：</p>
          <p><img src="readonly/images/sethomepage/kr_1.gif" /></p>
          <p>2）然后在打开的对话窗口中当前主页输入框中输入“<?php echo $web['path']; ?>”，然后点击“确定”按扭即可，如图所示：</p>
          <p><img src="readonly/images/sethomepage/kr_2.gif" /></p>
          <!-- 批注提示 -->
          <p><strong>提示：</strong>若仍无法设置主页，请点击查看“<a href="setindex.php" target="_blank">主页修复</a>”；或“<a href="162100.php" target="_blank">把<?php echo $web['sitename2']; ?>下载到桌面</a>”</p>
          <!-- 批注提示end -->
        </div>
      </div>

      <div class="no">
        <div id="area_err" class="column_title_">浏览器参数出错！</div>
        <div class="browser_contents">
          你传递的参数出错！
        </div>
      </div>

</td>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>
<?php @ include ('writable/require/statistics.txt'); ?>
<script type="text/javascript" language="javaScript">
<!--
function confirmBrowser(){
var browsers='ie|360|sogou|chrome|2345|theworld|tt|maxthon|qq|firefox|opera|safari|green|360ee|kr';
var browserMark;
if(browserMark=(typeof(arguments[0])!='undefined' && browsers.indexOf(arguments[0])>-1)){
browserMark=arguments[0];

}else{
if(fr=window.location.href.replace(/^[^#]+(#(.+))?$/,'$2').replace(/[^0-9a-zA-Z]+/g,'').toLowerCase()){
  if(browsers.indexOf(fr)>-1){
    browserMark=fr;
  }else{
    browserMark='err';
  }
}else{
  var is360=false;
  try{
    if(window.external&&window.external.twGetRunPath){ 
      var r=external.twGetRunPath(); 
      if(r&&r.toLowerCase().indexOf("360")>-1){
        is360=true;
      }
    }
  }catch(e){
    is360=false;
  }
  if(is360){
    browserMark='360';
  }else{
    var nVersion=navigator.appVersion;
    if(/2345Explorer/i.test(nVersion)){
      browserMark='2345';
    }else if(/Maxthon/i.test(nVersion)){
      browserMark='maxthon';
    }else if(/TheWorld/i.test(nVersion)){
      browserMark='theworld';
    }else if(/TencentTraveler/i.test(nVersion)){
      browserMark='tt';
    }else if(/SE.*MetaSr/i.test(nVersion)){
      browserMark='sogou';
    }else if(/QQbrowser/i.test(nVersion)){
      browserMark='qq';
    }else if(/GreenBrowser/i.test(nVersion)){
      browserMark='green';
    }else if(/360EE/i.test(nVersion)){
      browserMark='360ee';
    }else if(/Chrome/i.test(nVersion)){
      browserMark='chrome';
    }else if(/Firefox/i.test(navigator.userAgent)){
      browserMark='firefox';
    }else if(/Opera/i.test(navigator.userAgent)){
      browserMark='opera';
    }else if(/Safari/i.test(navigator.userAgent)){
      browserMark='safari';
    }else{
      browserMark='ie';
    }
  }
}
}
//if($('area_'+browserMark)!=null){
  if($('current_browser')!=null){
    $('current_browser').id='';
  }
  try{
    $('area_'+browserMark+'').parentNode.id='current_browser';
  }catch(err){
  }
  try { if ($('bar_id_') != null) { $('bar_id_').id = ''; } $('bar-'+browserMark+'').parentNode.id = 'bar_id_'; } catch (err) {}
//}
}

/*
if(document.all){
  window.attachEvent('onload',confirmBrowser);
}else{
  window.addEventListener('load',confirmBrowser,false);
}
*/
confirmBrowser();

-->
</script>


</body>
</html>
