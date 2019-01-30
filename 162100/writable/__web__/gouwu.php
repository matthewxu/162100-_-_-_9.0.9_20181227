<?php
header("Cache-Control: max-age=1296000");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="max-age=1296000" />
<title>购物 - 162100.com源码</title>
<base target="_blank" />
</head>
<style>
body { margin:0; padding:0; color:#999999; font-size:12px; background-color:#FFFFFF; }
a { color:#666666; text-decoration:none; }
</style>
<body>
<script language="JavaScript" type="text/javascript">
function menu_f(o, v){
  if (document.getElementById('sale_is')!=null) {
    var isName=document.getElementById('sale_is').name;
    document.getElementById('sale_is').id='';
  }
  o.id='sale_is';
  try{document.getElementById('sale_list_'+isName+'').style.display="none";}catch(e){}
  try{document.getElementById('sale_list_'+v+'').style.display="block";	}catch(e){}
	chanPH();
}
</script>
<style>
.sale_menu_out { margin-bottom:10px; min-width:730px; max-width:980px; background-color:#F6F6F6; padding:10px; }
.sale_menu { width:100%; border-collapse:collapse; }
.sale_menu td { height:56px; border-left:1px #D4D4D4 solid; border-right:1px #D4D4D4 solid; text-align:center; }
.sale_menu a { height:56px; padding-top:0; display:block; }
.sale_menu a:hover { border-top:none; height:66px; padding-top:10px; margin-top:-10px; margin-bottom:-10px; background-color:#1BA358; color:#FFFFFF; }
.sale_menu a#sale_is { border-top:3px #0D8342 solid; border-bottom:10px #F6F6F6 solid; height:66px; padding-top:7px; margin-top:-10px; margin-bottom:-20px; background-color:#1BA358; color:#FFFFFF; }
.sale_menu a button { padding:0; border:none; display:block; margin:auto; width:40px; height:40px; overflow:hidden; border-radius:20px; -moz-border-radius:20px; -webkit-border-radius:20px; background-color:#FFCC00; background-image:url(images/1_0/menu_pic.gif); background-repeat:no-repeat; }
.sale_menu a button::-moz-focus-inner{ margin:0; padding:0 }
.sale_menu a button:focus { outline:none; }
.sale_menu a:hover button { background-color:#FFFFFF; }
.sale_list { min-width:750px; max-width:1000px; text-align:left; display:none; }
.sale_list a { width:125px; height:80px; text-align:center; display:inline-block !important; display:inline; zoom:1; /*float:left;*/ overflow:hidden; }
.sale_list a img { width:90px; height:40px; border:none; margin:auto; margin-bottom:5px; clear:both; display:block; }
</style>
<div id="sale_menu_column">
<div class="sale_menu_out">
  <table width="100%" class="sale_menu" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><a href="javascript:void(0)" onclick="menu_f(this,1);return false;" name="1" id="sale_is">
        <button name="sale_pic"></button>
        推荐商家</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,2);return false;" name="2">
        <button name="sale_pic"></button>
        综合商家</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,3);return false;" name="3">
        <button name="sale_pic"></button>
        服饰鞋包</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,4);return false;" name="4">
        <button name="sale_pic"></button>
        食品酒水</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,5);return false;" name="5">
        <button name="sale_pic"></button>
        团购商家</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,6);return false;" name="6">
        <button name="sale_pic"></button>
        数码书籍</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,7);return false;" name="7">
        <button name="sale_pic"></button>
        日用百货</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,8);return false;" name="8">
        <button name="sale_pic"></button>
        母婴玩具</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,9);return false;" name="9">
        <button name="sale_pic"></button>
        美妆护理</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,10);return false;" name="10">
        <button name="sale_pic"></button>
        旅行票务</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,11);return false;" name="11">
        <button name="sale_pic"></button>
        海外商家</a></td>
      <td><a href="javascript:void(0)" onclick="menu_f(this,12);return false;" name="12">
        <button name="sale_pic"></button>
        其他商家</a></td>
    </tr>
  </table>
</div>
<script language="JavaScript" type="text/javascript">
var saleMenuColor=new Array('#D4ACF9', '#F7DA71', '#F0C6A1', '#97E6C0', '#A5C2EE', '#FFA9CB');
  var saleMenu=document.getElementsByName('sale_pic');
  if (saleMenu && saleMenu.length>0){
    for (var i = 0; i < saleMenu.length; i++){
      saleMenu[i].style.backgroundColor=saleMenuColor[(i+6) % 6];
	  saleMenu[i].style.backgroundPosition='-'+(i*40)+'px 0';
      saleMenu[i].title=i;
      saleMenu[i].onmouseover=function(){showbg(this);}
    }
  }
function showbg(o){
  o.style.backgroundColor='#FFFFFF';
  o.style.backgroundPosition='-'+(parseInt(o.title)*40)+'px -40px';
  o.onmouseout=function(){
    o.style.backgroundColor=saleMenuColor[(parseInt(o.title)+6) % 6];
	o.style.backgroundPosition='-'+(parseInt(o.title)*40)+'px 0';
  }
}
</script>
<div class="sale_list" id="sale_list_1" style="display:block;"><a href="http://www.taobao.com/" target="_blank"><img src="images/1_0/taobao.gif" />淘宝网</a><a href="http://www.tmall.com/" target="_blank"><img src="images/1_0/tmall.jpg" />天猫商城</a><a href="http://www.jd.com/" target="_blank"><img src="images/1_0/jd.gif" />京东商城</a><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://t.dianping.com" target="_blank"><img src="images/1_0/dianping.gif" />大众点评网</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.jumei.com/" target="_blank"><img src="images/1_0/jumei.gif" />聚美优品</a><a href="http://www.yixun.com" target="_blank"><img src="images/1_0/yixun.gif" />易迅网</a><a href="http://bj.meituan.com/" target="_blank"><img src="images/1_0/meituan.gif" />美团</a><a href="http://www.suning.com/" target="_blank"><img src="images/1_0/suning.gif" />苏宁易购</a><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://travel.elong.com/hotel/" target="_blank"><img src="images/1_0/elong.gif" />艺龙网</a><a href="http://www.nuomi.com/" target="_blank"><img src="images/1_0/nuomi.gif" />糯米网</a><a href="http://www.lefeng.com/" target="_blank"><img src="images/1_0/lefeng.gif" />乐蜂网</a><a href="http://www.yintai.com" target="_blank"><img src="images/1_0/yintai.gif" />银泰</a><a href="http://www.55tuan.com/" target="_blank"><img src="images/1_0/55tuan.jpg" />窝窝团</a><a href="http://www.moonbasa.com" target="_blank"><img src="images/1_0/moonbasa.gif" />梦芭莎</a><a href="http://www.muyingzhijia.com" target="_blank"><img src="images/1_0/muyingzhijia.gif" />母婴之家</a><a href="http://www.banggo.com/" target="_blank"><img src="images/1_0/banggo.gif" />邦购</a><a href="http://www.ocj.com.cn/" target="_blank"><img src="images/1_0/ocj.gif" />东方cj购物</a><a href="http://www.gome.com.cn/ec/homeus/index.html" target="_blank"><img src="images/1_0/gome.gif" />国美在线</a><a href="http://redbaby.suning.com" target="_blank"><img src="images/1_0/redbaby.gif" />红孩子</a><a href="http://www.fclub.cn" target="_blank"><img src="images/1_0/fclub.gif" />聚尚网</a><a href="http://www.keede.com" target="_blank"><img src="images/1_0/keede.gif" />可得眼镜</a><a href="http://www.lashou.com/" target="_blank"><img src="images/1_0/lashou.gif" />拉手网</a><a href="http://www.lamiu.com" target="_blank"><img src="images/1_0/lamiu.gif" />兰缪</a><a href="http://www.mbaobao.com" target="_blank"><img src="images/1_0/mbaobao.gif" />麦包包</a><a href="http://www.m18.com" target="_blank"><img src="images/1_0/m18.gif" />M18趣天麦网</a><a href="http://www.homevv.com" target="_blank"><img src="images/1_0/homevv.gif" />为为网</a><a href="http://www.womai.com" target="_blank"><img src="images/1_0/womai.gif" />中粮我买网</a> </div>
<div class="sale_list" id="sale_list_2"><a href="http://www.taobao.com/" target="_blank"><img src="images/1_0/taobao.gif" />淘宝网</a><a href="http://www.tmall.com/" target="_blank"><img src="images/1_0/tmall.jpg" />天猫商城</a><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.jd.com/" target="_blank"><img src="images/1_0/jd.gif" />京东商城</a><a href="http://www.yixun.com" target="_blank"><img src="images/1_0/yixun.gif" />易迅网</a><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://www.suning.com/" target="_blank"><img src="images/1_0/suning.gif" />苏宁易购</a><a href="http://t.dianping.com" target="_blank"><img src="images/1_0/dianping.gif" />大众点评网</a><a href="http://www.nuomi.com/" target="_blank"><img src="images/1_0/nuomi.gif" />糯米网</a><a href="http://bj.meituan.com/" target="_blank"><img src="images/1_0/meituan.gif" />美团</a><a href="http://www.jumei.com/" target="_blank"><img src="images/1_0/jumei.gif" />聚美优品</a><a href="http://te.paipai.com/cps_lady.shtml" target="_blank"><img src="images/1_0/paipai.gif" />拍拍网</a><a href="http://www.lashou.com/" target="_blank"><img src="images/1_0/lashou.gif" />拉手网</a><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a> </div>
<div class="sale_list" id="sale_list_3"><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a><a href="http://www.yintai.com" target="_blank"><img src="images/1_0/yintai.gif" />银泰</a><a href="http://www.17ugo.com/" target="_blank"><img src="images/1_0/17ugo.gif" />优购物</a><a href="http://www.vjia.com/" target="_blank"><img src="images/1_0/vjia.gif" />Vjia</a><a href="http://www.moonbasa.com" target="_blank"><img src="images/1_0/moonbasa.gif" />梦芭莎</a><a href="http://www.fclub.cn" target="_blank"><img src="images/1_0/fclub.gif" />聚尚网</a><a href="http://www.banggo.com/" target="_blank"><img src="images/1_0/banggo.gif" />邦购</a><a href="http://www.xiu.com" target="_blank"><img src="images/1_0/xiu.gif" />走秀</a><a href="http://www.lamiu.com" target="_blank"><img src="images/1_0/lamiu.gif" />兰缪</a><a href="http://www.gap.cn" target="_blank"><img src="images/1_0/gap.gif" />Gap中国官网</a><a href="http://www.pb89.com" target="_blank"><img src="images/1_0/pb89.gif" />太平鸟</a><a href="http://www.aimer.com.cn/" target="_blank"><img src="images/1_0/aimer.gif" />爱慕鞋包</a><a href="http://www.masamaso.com" target="_blank"><img src="images/1_0/masamaso.gif" />玛萨玛索</a><a href="http://www.mbaobao.com" target="_blank"><img src="images/1_0/mbaobao.gif" />麦包包</a><a href="http://www.m18.com" target="_blank"><img src="images/1_0/m18.gif" />M18趣天麦网</a><a href="http://www.s.cn" target="_blank"><img src="images/1_0/s.gif" />名鞋库</a><a href="http://www.paixie.net/" target="_blank"><img src="images/1_0/paixie.gif" />拍鞋网</a><a href="http://www.shopin.net" target="_blank"><img src="images/1_0/shopin.gif" />上品折扣</a><a href="http://www.secoo.com/" target="_blank"><img src="images/1_0/secoo.gif" />寺库奢侈品网</a><a href="http://www.bosideng.cn" target="_blank"><img src="images/1_0/bosideng.gif" />波司登</a><a href="http://www.uiyi.cn/Default.aspx" target="_blank"><img src="images/1_0/uiyi.gif" />佑一良品</a><a href="http://www.5lux.com" target="_blank"><img src="images/1_0/5lux.gif" />第五大道奢侈品网</a><a href="http://www.nzmall.cn" target="_blank"><img src="images/1_0/nzmall.jpg" />牛仔商城</a><a href="http://www.liebo.com/" target="_blank"><img src="images/1_0/liebo.gif" />裂帛服饰</a><a href="http://www.esprit.cn/" target="_blank"><img src="images/1_0/esprit.gif" />esprit官网</a><a href="http://www.anta.cn/" target="_blank"><img src="images/1_0/anta.gif" />安踏</a><a href="http://www.e-lining.com" target="_blank"><img src="images/1_0/lining.jpg" />李宁官方商城</a><a href="http://www.xtep.com.cn/" target="_blank"><img src="images/1_0/xtep.gif" />特步官方网站</a><a href="http://www.outlets365.com" target="_blank"><img src="images/1_0/outlets365.gif" />奥特莱斯商城</a><a href="http://www.aolai.com/" target="_blank"><img src="images/1_0/aolai.gif" />尚品奥莱</a><a href="http://www.qipaimall.com/" target="_blank"><img src="images/1_0/qipaimall.gif" />柒牌商城</a><a href="http://www.asos.cn" target="_blank"><img src="images/1_0/asos.gif" />ASOS中国官网</a><a href="http://www.mfplaza.com" target="_blank"><img src="images/1_0/mfplaza.gif" />马克华菲官方商城</a><a href="http://www.51hqt.com" target="_blank"><img src="images/1_0/51hqt.gif" />红蜻蜓官方商城</a><a href="http://www.bagtree.com" target="_blank"><img src="images/1_0/bagtree.png" />包包树</a><a href="http://www.glamour-sales.com.cn/" target="_blank"><img src="images/1_0/glamour-sales.png" />魅力惠</a> </div>
<div class="sale_list" id="sale_list_4"><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.sfbest.com/" target="_blank"><img src="images/1_0/sfbest.gif" />顺丰优选</a><a href="http://www.womai.com" target="_blank"><img src="images/1_0/womai.gif" />中粮我买网</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://redbaby.suning.com" target="_blank"><img src="images/1_0/redbaby.gif" />红孩子</a><a href="http://www.lingshi.com/" target="_blank"><img src="images/1_0/lingshi.gif" />中国零食网</a><a href="http://www.didamall.com/" target="_blank"><img src="images/1_0/didamall.gif" />嘀嗒猫</a><a href="http://www.shouliwang.com/" target="_blank"><img src="images/1_0/shouliwang.gif" />手礼网</a><a href="http://www.lecake.com/" target="_blank"><img src="images/1_0/lecake.gif" />诺心LECAKE</a><a href="http://www.tootoo.cn/?buyersource=emacps" target="_blank"><img src="images/1_0/tootoo.jpg" />沱沱工社</a><a href="http://www.yesmywine.com" target="_blank"><img src="images/1_0/yesmywine.jpg" />也买酒</a><a href="http://www.maidangao.com/" target="_blank"><img src="images/1_0/maidangao.jpg" />好利来买蛋糕网</a><a href="http://www.benlai.com/" target="_blank"><img src="images/1_0/benlai.gif" />本来生活网</a><a href="http://www.yiguo.com/default.aspx" target="_blank"><img src="images/1_0/yiguo.gif" />易果生鲜</a><a href="http://www.winenice.com/" target="_blank"><img src="images/1_0/winenice.jpg" />酒美网</a><a href="http://www.maimaicha.com/" target="_blank"><img src="images/1_0/maimaicha.gif" />买买茶</a><a href="http://shop.boqii.com" target="_blank"><img src="images/1_0/boqii.gif" />波奇商城</a><a href="http://www.wangjiu.com" target="_blank"><img src="images/1_0/wangjiu.gif" />网酒网</a><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a>   </div>
<div class="sale_list" id="sale_list_5"><a href="http://www.dianping.com" target="_blank"><img src="images/1_0/dianping.gif" />大众点评网</a><a href="http://www.meituan.com/" target="_blank"><img src="images/1_0/meituan.gif" />美团</a><a href="http://www.nuomi.com/" target="_blank"><img src="images/1_0/nuomi.gif" />糯米网</a><a href="http://www.lashou.com/" target="_blank"><img src="images/1_0/lashou.gif" />拉手网</a><a href="http://www.55tuan.com/" target="_blank"><img src="images/1_0/55tuan.jpg" />窝窝团</a><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.zhiwo.com/" target="_blank"><img src="images/1_0/zhiwo.jpg" />知我网</a><a href="http://www.lefeng.com/" target="_blank"><img src="images/1_0/lefeng.gif" />乐蜂网</a><a href="http://www.pztuan.com/" target="_blank"><img src="images/1_0/pztuan.gif" />品质团</a><a href="http://www.bbhun.com" target="_blank"><img src="images/1_0/bbhun.gif" />宝贝婚团</a>   </div>
<div class="sale_list" id="sale_list_6"><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://www.jd.com/" target="_blank"><img src="images/1_0/jd.gif" />京东商城</a><a href="http://www.yixun.com" target="_blank"><img src="images/1_0/yixun.gif" />易迅网</a><a href="http://www.suning.com/" target="_blank"><img src="images/1_0/suning.gif" />苏宁易购</a><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.gome.com.cn/ec/homeus/index.html" target="_blank"><img src="images/1_0/gome.gif" />国美在线</a><a href="http://shop.letv.com/" target="_blank"><img src="images/1_0/letv.gif" />乐视商城</a><a href="http://www.mi.com/index.php" target="_blank"><img src="images/1_0/mi.gif" />小米</a><a href="http://www.newegg.cn" target="_blank"><img src="images/1_0/newegg.jpg" />新蛋商城</a><a href="http://www.ocj.com.cn/" target="_blank"><img src="images/1_0/ocj.gif" />东方CJ购物</a><a href="http://www.skg.com" target="_blank"><img src="images/1_0/skg.gif" />SKG官方商城</a><a href="http://www.vmall.com" target="_blank"><img src="images/1_0/vmall.gif" />华为商城</a><a href="http://www.ehaier.com/" target="_blank"><img src="images/1_0/ehaier.gif" />海尔商城</a><a href="http://www.coolpad.com/" target="_blank"><img src="images/1_0/coolpad.gif" />酷派官方商城</a><a href="http://shop.lenovo.com.cn" target="_blank"><img src="images/1_0/lenovo.gif" />联想官方网上商城</a><a href="http://www.bookuu.com" target="_blank"><img src="images/1_0/bookuu.gif" />博库网</a><a href="http://www.china-pub.com/" target="_blank"><img src="images/1_0/china-pub.gif" />互动出版网</a><a href="http://book.beifabook.com" target="_blank"><img src="images/1_0/beifabook.gif" />北发图书网</a><a href="http://www.zazhipu.com/" target="_blank"><img src="images/1_0/zazhipu.gif" />杂志铺</a> </div>
<div class="sale_list" id="sale_list_7"><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.jd.com/" target="_blank"><img src="images/1_0/jd.gif" />京东商城</a><a href="http://www.yixun.com" target="_blank"><img src="images/1_0/yixun.gif" />易迅网</a><a href="http://www.womai.com" target="_blank"><img src="images/1_0/womai.gif" />中粮我买网</a><a href="http://www.sfbest.com/" target="_blank"><img src="images/1_0/sfbest.gif" />顺丰优选</a><a href="http://www.ocj.com.cn/" target="_blank"><img src="images/1_0/ocj.gif" />东方CJ购物</a><a href="http://www.lovo.cn" target="_blank"><img src="images/1_0/lovo.gif" />LOVO家居商城</a><a href="http://www.lifevc.com" target="_blank"><img src="images/1_0/lifevc.jpg" />LifeVC丽芙家居</a><a href="http://www.staples.cn/" target="_blank"><img src="images/1_0/staples.jpg" />史泰博办公用品网</a><a href="http://www.dapu.com" target="_blank"><img src="images/1_0/dapu.gif" />大朴网</a><a href="http://www.hao24.cn" target="_blank"><img src="images/1_0/hao24.jpg" />好享商城</a><a href="http://www.parkson.com.cn/" target="_blank"><img src="images/1_0/parkson.gif" />百盛网</a><a href="http://www.xiangguo.tv/nav" target="_blank"><img src="images/1_0/xiangguo.jpg" />橡果国际</a><a href="http://www.kuaishubao.com/" target="_blank"><img src="images/1_0/kuaishubao.gif" />快书包</a><a href="http://www.hxshop.com" target="_blank"><img src="images/1_0/hxshop.gif" />红星家品会</a><a href="http://www.zgjf168.com/" target="_blank"><img src="images/1_0/zgjf168.gif" />中国家纺官网</a><a href="http://www.uya100.com" target="_blank"><img src="images/1_0/uya100.gif" />优雅100-家纺商城</a><a href="http://www.kyp.com" target="_blank"><img src="images/1_0/kyp.gif" />快易拍购物商城</a><a href="http://www.beyond.cn" target="_blank"><img src="images/1_0/beyond.gif" />博洋家纺官网</a><a href="http://www.feiniu.com" target="_blank"><img src="images/1_0/feiniu.gif" />飞牛网</a><a href="http://www.muji.com.cn" target="_blank"><img src="images/1_0/muji.jpg" />无印良品</a><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a> </div>
<div class="sale_list" id="sale_list_8"><a href="http://www.muyingzhijia.com" target="_blank"><img src="images/1_0/muyingzhijia.gif" />母婴之家</a><a href="http://redbaby.suning.com" target="_blank"><img src="images/1_0/redbaby.gif" />红孩子</a><a href="http://www.yhd.com/" target="_blank"><img src="images/1_0/yhd.gif" />1号店</a><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://www.jd.com/" target="_blank"><img src="images/1_0/jd.gif" />京东商城</a><a href="http://www.suning.com/" target="_blank"><img src="images/1_0/suning.gif" />苏宁易购</a><a href="http://www.m6go.com" target="_blank"><img src="images/1_0/m6go.gif" />麦乐购</a><a href="http://www.baobeigou.com" target="_blank"><img src="images/1_0/baobeigou.gif" />宝贝购</a><a href="http://www.kissbb.com" target="_blank"><img src="images/1_0/kissbb.gif" />今生宝贝</a><a href="http://www.supuy.com/" target="_blank"><img src="images/1_0/supuy.gif" />速普商城</a><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a> </div>
<div class="sale_list" id="sale_list_9"><a href="http://www.jumei.com/" target="_blank"><img src="images/1_0/jumei.gif" />聚美优品</a><a href="http://www.lefeng.com/" target="_blank"><img src="images/1_0/lefeng.gif" />乐蜂网</a><a href="http://www.dangdang.com" target="_blank"><img src="images/1_0/dangdang.gif" />当当网</a><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.suning.com/" target="_blank"><img src="images/1_0/suning.gif" />苏宁易购</a><a href="http://www.yintai.com" target="_blank"><img src="images/1_0/yintai.gif" />银泰百货</a><a href="http://www.dhc.net.cn/top/index.jsp" target="_blank"><img src="images/1_0/dhc.gif" />DHC</a><a href="http://www.strawberrynet.com/landPage.aspx" target="_blank"><img src="images/1_0/strawberrynet.gif" />香港草莓网</a><a href="http://www.xiu.com" target="_blank"><img src="images/1_0/xiu.gif" />走秀时尚商城</a><a href="http://www.naruko.com.cn" target="_blank"><img src="images/1_0/naruko.gif" />牛尔娜露可</a><a href="http://www.lizi.com/" target="_blank"><img src="images/1_0/lizi.gif" />丽子美妆</a><a href="http://www.xiangshe.com/" target="_blank"><img src="images/1_0/xiangshe.gif" />香舍臻品</a><a href="http://www.xifuquan.com" target="_blank"><img src="images/1_0/xifuquan.gif" />皙肤泉</a><a href="http://www.uzise.com/" target="_blank"><img src="images/1_0/uzise.gif" />柚子舍</a><a href="http://www.xilituan.com" target="_blank"><img src="images/1_0/xilituan.gif" />犀利团</a><a href="http://www.zhiwo.com/" target="_blank"><img src="images/1_0/zhiwo.jpg" />知我网</a><a href="http://item.koudai.com/index?utm_source=yiqifa" target="_blank"><img src="images/1_0/koudai.jpg" />口袋购物</a> </div>
<div class="sale_list" id="sale_list_10"><a href="http://trip.taobao.com/" target="_blank"><img src="images/1_0/trip.png" />淘宝旅行</a><a href="http://travel.elong.com/hotel/" target="_blank"><img src="images/1_0/elong.gif" />艺龙网</a><a href="http://www.lvmama.com" target="_blank"><img src="images/1_0/lvmama.gif" />驴妈妈旅游网</a><a href="http://tuan.qunar.com/" target="_blank"><img src="images/1_0/qunar.gif" />去哪儿</a><a href="http://www.springtour.com" target="_blank"><img src="images/1_0/springtour.gif" />春秋旅游网</a><a href="http://www.uzai.com" target="_blank"><img src="images/1_0/uzai.gif" />悠哉旅游网</a><a href="http://www.yododo.cn/" target="_blank"><img src="images/1_0/yododo.gif" />游多多</a><a href="http://www.lulutrip.com/" target="_blank"><img src="images/1_0/lulutrip.gif" />路路行旅游</a><a href="http://www.tujia.com/Promotion/tujiadachoujiang.htm" target="_blank"><img src="images/1_0/tujia.gif" />途家网</a><a href="http://www.kuxun.cn" target="_blank"><img src="images/1_0/kuxun.gif" />酷讯旅游</a><a href="http://www.aoyou.com/" target="_blank"><img src="images/1_0/aoyou.gif" />中青旅遨游网</a><a href="http://www.podinns.com/" target="_blank"><img src="images/1_0/podinns.gif" />布丁酒店</a><a href="http://www.qmango.com" target="_blank"><img src="images/1_0/qmango.gif" />青芒果旅行网</a><a href="http://www.mangocity.com/" target="_blank"><img src="images/1_0/mangocity.gif" />芒果网</a><a href="http://www.jinjiang.com/" target="_blank"><img src="images/1_0/jinjiang.jpg" />锦江国际</a><a href="http://www.wyn88.com/" target="_blank"><img src="images/1_0/wyn88.gif" />维也纳酒店</a><a href="http://www.spider.com.cn/" target="_blank"><img src="images/1_0/spider.gif" />蜘蛛网</a><a href="http://caipiao.wanlitong.com/" target="_blank"><img src="images/1_0/wanlitong.gif" />平安彩票</a><a href="http://www.310win.com" target="_blank"><img src="images/1_0/310wi.gif" />彩客网</a><a href="http://www.228cai.com" target="_blank"><img src="images/1_0/228cai.gif" />优彩网</a> </div>
<div class="sale_list" id="sale_list_11"><a href="http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|" target="_blank"><img src="images/1_0/amazon.gif" />亚马逊</a><a href="http://www.ebay.com/" target="_blank"><img src="images/1_0/ebay.gif" />ebay</a><a href="http://www.coach.com/" target="_blank"><img src="images/1_0/coach.gif" />Coach</a><a href="http://www.uggaustralia.cn/" target="_blank"><img src="images/1_0/uggaustralia.gif" />UGG</a> </div>
<div class="sale_list" id="sale_list_12"><a href="http://www.keede.com" target="_blank"><img src="images/1_0/keede.gif" />可得眼镜网</a><a href="http://www.vsigo.cn" target="_blank"><img src="images/1_0/vsigo.gif" />视客眼镜网</a><a href="http://www.aidai.com" target="_blank"><img src="images/1_0/aidai.gif" />爱戴眼镜网</a><a href="http://www.meijing.com/" target="_blank"><img src="images/1_0/meijing.gif" />美睛网眼镜商城</a><a href="http://www.koolearn.com" target="_blank"><img src="images/1_0/koolearn.gif" />新东方在线</a><a href="http://www.jinghua.com/" target="_blank"><img src="images/1_0/jinghua.gif" />精华在线</a><a href="http://www.111.com.cn/" target="_blank"><img src="images/1_0/111.gif" />壹药网</a><a href="http://www.aizhigu.com.cn" target="_blank"><img src="images/1_0/aizhigu.gif" />爱之谷</a><a href="http://www.j1.com/" target="_blank"><img src="images/1_0/j1.gif" />健一网</a><a href="http://www.zbird.com" target="_blank"><img src="images/1_0/zbird.gif" />钻石小鸟</a> </div>
</div>
<?php
  @ include ('../../writable/chuchuang/ad_juejinlian.txt');
?>
<script type='text/javascript'>
function chanPH(){
  var bf=(location.search=='?bodyFrame') ? '':'2';
  if(parent && parent.document.getElementById('bodyFrame'+bf+'')!=null){
    parent.document.getElementById('bodyFrame'+bf+'').style.height=(document.getElementById('sale_menu_column').offsetHeight+10)+'px';
  }
}
if (document.all) {
	window.attachEvent('onload', chanPH);
} else {
	window.addEventListener('load', chanPH, false);
}
</script>
</div>
</div>
</body>
</html>
