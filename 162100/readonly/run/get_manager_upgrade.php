<?php
require ('authentication_manager.php');
?>
<div class="note">
<div>官方程序介绍与下载地址为<a href="http://download.162100.com/" target="_blank">http://download.162100.com/</a>，请随时关注。</div>
<?php

$f = @file_get_contents('v.txt');
$v = '7.9';
if ($f && preg_match('/\$v\s*\=\s*\'(.*)\';/iU', $f, $matches)) {
  $v = base64_decode($matches[1]);
}

?><div><b>当前版本：</b><?php

if (file_exists('addfunds.php')) {
  $v .= 's';
  $zz = $zz2 = '';
  $vv = '提示：以下为商业授权版本配套的增值功能，您已购买，以表对作者辛苦的支持。谢谢！但可——<a href="http://www.162100.com/pay/for_s_162100.php" target="_blannk" class="a_block b_block">点此增加绑定域名</a>';
} else {
  $zz = '但可——<a href="for_s.php" onclick="addSubmitSafe();$(\'addCFrame\').style.display=\'block\';" target="addCFrame" class="a_block b_block">获取商业版授权</a>';
  $zz2 = '到商业版';
  $vv = '提示：以下为免费开源版本配套的增值功能，如需要，请在线<a href="?post=upgrade" class="a_block" onclick="addSubmitSafe();">在线一键升级</a>或<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=184830962&amp;site=qq&amp;menu=yes" target="_blank" class="a_block b_block">联系作者购买</a>，以表对作者辛苦的支持。谢谢！';
}
 echo $v;
?></div>
    <div><b>官方版本：</b><?php


@ require ('readonly/function/read_file.php');
$f_162100 = read_file('http://www.162100.com/v.txt');
$v_162100 = '未知';
if ($f_162100 && preg_match('/\$v\s*\=\s*\'(.*)\';/iU', $f_162100, $matches_162100)) {
  $v_162100 = base64_decode($matches_162100[1]).'s';
}


 echo $v_162100; ?></div>
<style>
.a_block {display:inline-block; *display:inline; *zoom:1; background-color: #FFCC00; margin:0 5px; padding:0 10px; font-size:12px; text-decoration:none !important; }
.b_block { background-color: #C4E0C2; }
</style>
    <div><b>升级动作：</b><?php

if ($v_162100 == '未知') {
  echo '官方版本获取失败！<a href="javascript:void(0)" onclick="window.location.reload();">重新获取</a>或点此<a href="http://download.162100.com" target="_blank">到官方查看</a>。';
} else {
  $v_162100_ = abs(preg_replace('/[^\d]+/', '', $v_162100));
  $v_        = abs(preg_replace('/[^\d]+/', '', $v));
  $len = strlen($v_162100_) >= strlen($v_) ? strlen($v_162100_) : strlen($v_);
  $v_162100_ = str_pad($v_162100_, $len, 0);
  $v_        = str_pad($v_, $len, 0);

  if ($v_162100_ > $v_) {
    echo '<span class="redword">可升级'.$zz2.'！[<a href="http://www.162100.com/about.php?newcode=1" target="_blank">查看新版说明</a>]</span>三种方式实现升级——
<a href="?post=upgrade" class="a_block" onclick="addSubmitSafe();">在线一键升级</a>
'.($zz == '' ? '<a href="?post=upgrade&for_zip=1" class="a_block">' : '<a href="http://pan.baidu.com/share/link?shareid=141280&amp;uk=486771605" class="a_block" target="_blank">').'在线下载升级包手动覆盖升级</a>
<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=184830962&amp;site=qq&amp;menu=yes" target="_blank" class="a_block">联系作者索要升级包</a>
';
  } else {
    echo '不必升级。'.(file_exists('addfunds.php')?'<a href="?post=upgrade" class="grayword">强制重升级</a>':'').$zz.'';
  }
}

?></div></div>
<div class="note"><?php echo $vv; ?></div>
<div><b>去除版权文字：</b></div>
<blockquote>
可取消页头标题及页脚处标注的版权信息文字。
</blockquote>
<div><b>用户创收功能：</b></div>
<blockquote>
  类似2345导航的有偿推广功能，即对来站访问及对网站进行推广的用户赋与货币积分。增加此功能无疑可为网站带来访问流量。注：该功能4.2版起实现了防恶意刷量功能。
</blockquote>
<div><b>批量导入网址功能：</b></div>
<blockquote>管理分类网址过程中，可批量导入网址。导入支持二种方式：1、直接输入网址URL采集，抓取网页中的链接，导入；2、直接粘贴代码筛选链接，导入。</blockquote>
<div><b>个性搜索引擎功能：</b></div>
<blockquote>自助管理搜索类别、搜索引擎。随意增加、修改搜索类别及引擎形式、引擎图标等。轻松加入自己的搜索联盟的创收帐号ID等。</blockquote>
<div><b>网址名称插入图片功能：</b></div>
<blockquote>网址名称前插入图片或以图片形式显示。支持链接调用、本地上传、直接写代码三种方式。</blockquote>
<div><b>抓取站点简介功能：</b></div>
<blockquote>分类、网址管理中，可点击“抓”，即可自动快捷抓取该站点简介粘入编辑框，而不必手动麻烦去寻找站点简介内容。</blockquote>
<div><b>批量转移分类网址功能：</b></div>
<blockquote>频道、栏目管理中，可批量转移分类网址，整体转换各频道栏目分类下属网址。</blockquote>
<div><b>频道、栏目加背景功能：</b></div>
<blockquote>频道、栏目管理中，为该频道下栏目加背景，实现对该栏目的强调，同时栏目分类页面也能显示背景颜色。</blockquote>
<div><b>自动节日壁纸：</b></div>
<blockquote>节日壁纸控制，可以节日当天自动使用。</blockquote>
<div><b>更多风格：</b></div>
<blockquote>商业版风格包更丰富。</blockquote>
<div><b>功能菜单栏、边栏号外管理：</b></div>
<blockquote>商业版可对功能菜单栏、边栏号外进行管理控制。</blockquote>
<div><b>广告联盟创收：</b></div>
<blockquote>如亿起发掘金链、多麦多金链的轻松嵌入，自动为你创造收益。</blockquote>
<div><b>网页缓存加速：</b></div>
<blockquote>
  将网页缓存在客户端，即使脱机（断网）仍可正常浏览你的首页；同时网页素件缓存于客户端，使网页载入速度大大加速。
</blockquote>
<div><b>网页压缩加速：</b></div>
<blockquote>
开启Gzip网页压缩技术，将较大的网页尺寸合理压缩，使网页载入速度大大加速。
</blockquote>
<div><b><s>来路优先显示：</s></b></div>
<blockquote>
  <s>自动记忆来路，哪个站的友情链接带来用户访问，哪个站就优先排在前面。</s>
</blockquote>
<div><b><s>更多登录接口：</s></b></div>
<blockquote>
<s>免费版本中除QQ接口、新浪微博接口外，如可再安装百度、谷歌、人人接口等绑定你的登录。</s>
</blockquote>
<div><b><s>预装更多专题：</s></b></div>
<blockquote>
<s>可安装免费版本所不具备的更多专题，如更多在线电视频道及实用工具等。</s>
</blockquote>
<div><b>其它更多：</b></div>
<blockquote>
仅商业用户享受及时售后。
</blockquote>
