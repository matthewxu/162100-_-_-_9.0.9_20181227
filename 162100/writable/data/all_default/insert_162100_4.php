<?php die(); ?> (`id`, `column_id`, `class_id`, `class_title`, `detail_title`, `http_name_style`, `class_priority`, `class_grab`) VALUES 
('3666','mingz','7','栏目头栏','','','<script language=\"JavaScript\" type=\"text/javascript\">
function qingtiancms_com_f(o, v){
  if (document.getElementById(\'sale_is\')!=null) {
    var isName=document.getElementById(\'sale_is\').name;
    document.getElementById(\'sale_is\').id=\'\';
  }
  o.id=\'sale_is\';
  try{document.getElementById(\'sale_list_\'+isName+\'\').style.display=\"none\";}catch(e){}
  try{document.getElementById(\'sale_list_\'+v+\'\').style.display=\"block\";	}catch(e){}
  if (par!=null) {
    openMy();
  }
}
</script>
<style>
.sale_menu_out { margin-bottom:10px; width:858px; background-color:#F6F6F6; padding:10px; }
.sale_menu { width:100%; border-collapse:collapse; }
.sale_menu td { height:56px; border-left:1px #D4D4D4 solid; border-right:1px #D4D4D4 solid; text-align:center; }
.sale_menu a { height:56px; padding-top:0; display:block; font-size:14px; }
.sale_menu a:hover { border-top:none; height:66px; padding-top:10px; margin-top:-10px; margin-bottom:-10px; background-color:#1BA358; color:#FFFFFF; }
.sale_menu a#sale_is { border-top:3px #0D8342 solid; border-bottom:10px #F6F6F6 solid; height:66px; padding-top:7px; margin-top:-10px; margin-bottom:-20px; background-color:#1BA358; color:#FFFFFF; }
.sale_menu a button { padding:0; border:none; display:block; margin:auto; width:40px; height:40px; overflow:hidden; border-radius:20px; -moz-border-radius:20px; -webkit-border-radius:20px; background-color:#FFCC00; background-image:url(writable/__web__/images/1_0/menu_pic.gif); background-repeat:no-repeat; }
.sale_menu a button::-moz-focus-inner{ margin:0; padding:0 }
.sale_menu a button:focus { outline:none; }
.sale_menu a:hover button { background-color:#FFFFFF; }
.sale_list { width:878px; text-align:center; display:none; }
.sale_list a { width:136px; height:68px; text-align:center; display:inline-block !important; display:inline; zoom:1; overflow:hidden; }
.sale_list a img { width:90px; height:40px; border:none; margin:auto; clear:both; display:block; }
</style>
<div id=\"sale_menu_column\">
<div class=\"sale_menu_out\">
  <table width=\"100%\" class=\"sale_menu\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <tr>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,1);return false;\" name=\"1\" id=\"sale_is\">
        <button name=\"sale_pic\"></button>
        推荐商家</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,2);return false;\" name=\"2\">
        <button name=\"sale_pic\"></button>
        综合商家</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,3);return false;\" name=\"3\">
        <button name=\"sale_pic\"></button>
        服饰鞋包</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,4);return false;\" name=\"4\">
        <button name=\"sale_pic\"></button>
        食品酒水</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,5);return false;\" name=\"5\">
        <button name=\"sale_pic\"></button>
        团购商家</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,6);return false;\" name=\"6\">
        <button name=\"sale_pic\"></button>
        数码书籍</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,7);return false;\" name=\"7\">
        <button name=\"sale_pic\"></button>
        日用百货</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,8);return false;\" name=\"8\">
        <button name=\"sale_pic\"></button>
        母婴玩具</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,9);return false;\" name=\"9\">
        <button name=\"sale_pic\"></button>
        美妆护理</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,10);return false;\" name=\"10\">
        <button name=\"sale_pic\"></button>
        旅行票务</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,11);return false;\" name=\"11\">
        <button name=\"sale_pic\"></button>
        海外商家</a></td>
      <td><a href=\"javascript:void(0)\" onclick=\"qingtiancms_com_f(this,12);return false;\" name=\"12\">
        <button name=\"sale_pic\"></button>
        其他商家</a></td>
    </tr>
  </table>
</div>
<script>
var saleMenuColor=new Array(\'#D4ACF9\', \'#F7DA71\', \'#F0C6A1\', \'#97E6C0\', \'#A5C2EE\', \'#FFA9CB\');
  var saleMenu=document.getElementsByName(\'sale_pic\');
  if (saleMenu.length>0){
    for (var i = 0; i < saleMenu.length; i++){
      saleMenu[i].style.backgroundColor=saleMenuColor[(i+6) % 6];
	  saleMenu[i].style.backgroundPosition=\'-\'+(i*40)+\'px 0\';
      saleMenu[i].title=i;
      saleMenu[i].onmouseover=function(){showbg(this);}
    }
  }
function showbg(o){
  o.style.backgroundColor=\'#FFFFFF\';
  o.style.backgroundPosition=\'-\'+(parseInt(o.title)*40)+\'px -40px\';
  o.onmouseout=function(){
    o.style.backgroundColor=saleMenuColor[(parseInt(o.title)+6) % 6];
	o.style.backgroundPosition=\'-\'+(parseInt(o.title)*40)+\'px 0\';
  }
}
</script>
<div class=\"sale_list\" id=\"sale_list_1\" style=\"display:block;\"> <a href=\"http://www.taobao.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/taobao.gif\" />淘宝网</a> <a href=\"http://www.tmall.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/tmall.jpg\" />天猫商城</a> <a href=\"http://www.jd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jd.gif\" />京东商城</a> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://t.dianping.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dianping.gif\" />大众点评网</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.jumei.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jumei.gif\" />聚美优品</a> <a href=\"http://www.yixun.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yixun.gif\" />易迅网</a> <a href=\"http://bj.meituan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/meituan.gif\" />美团</a> <a href=\"http://www.suning.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/suning.gif\" />苏宁易购</a> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://travel.elong.com/hotel/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/elong.gif\" />艺龙网</a> <a href=\"http://www.nuomi.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/nuomi.gif\" />糯米网</a> <a href=\"http://www.lefeng.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lefeng.gif\" />乐蜂网</a> <a href=\"http://www.yintai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yintai.gif\" />银泰</a> <a href=\"http://www.55tuan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/55tuan.jpg\" />窝窝团</a> <a href=\"http://www.moonbasa.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/moonbasa.gif\" />梦芭莎</a> <a href=\"http://www.muyingzhijia.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/muyingzhijia.gif\" />母婴之家</a> <a href=\"http://www.banggo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/banggo.gif\" />邦购</a> <a href=\"http://www.ocj.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/ocj.gif\" />东方cj购物</a> <a href=\"http://www.gome.com.cn/ec/homeus/index.html\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/gome.gif\" />国美在线</a> <a href=\"http://redbaby.suning.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/redbaby.gif\" />红孩子</a> <a href=\"http://www.fclub.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/fclub.gif\" />聚尚网</a> <a href=\"http://www.keede.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/keede.gif\" />可得眼镜</a> <a href=\"http://www.lashou.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lashou.gif\" />拉手网</a> <a href=\"http://www.lamiu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lamiu.gif\" />兰缪</a> <a href=\"http://www.mbaobao.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/mbaobao.gif\" />麦包包</a> <a href=\"http://www.m18.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/m18.gif\" />M18趣天麦网</a> <a href=\"http://www.homevv.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/homevv.gif\" />为为网</a> <a href=\"http://www.womai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/womai.gif\" />中粮我买网</a> </div>
<div class=\"sale_list\" id=\"sale_list_2\"> <a href=\"http://www.taobao.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/taobao.gif\" />淘宝网</a> <a href=\"http://www.tmall.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/tmall.jpg\" />天猫商城</a> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.jd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jd.gif\" />京东商城</a> <a href=\"http://www.yixun.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yixun.gif\" />易迅网</a> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://www.suning.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/suning.gif\" />苏宁易购</a> <a href=\"http://t.dianping.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dianping.gif\" />大众点评网</a> <a href=\"http://www.nuomi.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/nuomi.gif\" />糯米网</a> <a href=\"http://bj.meituan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/meituan.gif\" />美团</a> <a href=\"http://www.jumei.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jumei.gif\" />聚美优品</a> <a href=\"http://te.paipai.com/cps_lady.shtml\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/paipai.gif\" />拍拍网</a> <a href=\"http://www.lashou.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lashou.gif\" />拉手网</a> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_3\"> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a> <a href=\"http://www.yintai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yintai.gif\" />银泰</a> <a href=\"http://www.17ugo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/17ugo.gif\" />优购物</a> <a href=\"http://www.vjia.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/vjia.gif\" />Vjia</a> <a href=\"http://www.moonbasa.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/moonbasa.gif\" />梦芭莎</a> <a href=\"http://www.fclub.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/fclub.gif\" />聚尚网</a> <a href=\"http://www.banggo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/banggo.gif\" />邦购</a> <a href=\"http://www.xiu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xiu.gif\" />走秀</a> <a href=\"http://www.lamiu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lamiu.gif\" />兰缪</a> <a href=\"http://www.gap.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/gap.gif\" />Gap中国官网</a> <a href=\"http://www.pb89.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/pb89.gif\" />太平鸟</a> <a href=\"http://www.aimer.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/aimer.gif\" />爱慕鞋包</a> <a href=\"http://www.masamaso.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/masamaso.gif\" />玛萨玛索</a> <a href=\"http://www.mbaobao.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/mbaobao.gif\" />麦包包</a> <a href=\"http://www.m18.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/m18.gif\" />M18趣天麦网</a> <a href=\"http://www.s.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/s.gif\" />名鞋库</a> <a href=\"http://www.paixie.net/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/paixie.gif\" />拍鞋网</a> <a href=\"http://www.shopin.net\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/shopin.gif\" />上品折扣</a> <a href=\"http://www.secoo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/secoo.gif\" />寺库奢侈品网</a> <a href=\"http://www.bosideng.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/bosideng.gif\" />波司登</a> <a href=\"http://www.uiyi.cn/Default.aspx\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/uiyi.gif\" />佑一良品</a> <a href=\"http://www.5lux.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/5lux.gif\" />第五大道奢侈品网</a> <a href=\"http://www.nzmall.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/nzmall.jpg\" />牛仔商城</a> <a href=\"http://www.liebo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/liebo.gif\" />裂帛服饰</a> <a href=\"http://www.esprit.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/esprit.gif\" />esprit官网</a> <a href=\"http://www.anta.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/anta.gif\" />安踏</a> <a href=\"http://www.e-lining.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lining.jpg\" />李宁官方商城</a> <a href=\"http://www.xtep.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xtep.gif\" />特步官方网站</a> <a href=\"http://www.outlets365.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/outlets365.gif\" />奥特莱斯商城</a> <a href=\"http://www.aolai.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/aolai.gif\" />尚品奥莱</a> <a href=\"http://www.qipaimall.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/qipaimall.gif\" />柒牌商城</a> <a href=\"http://www.asos.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/asos.gif\" />ASOS中国官网</a> <a href=\"http://www.mfplaza.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/mfplaza.gif\" />马克华菲官方商城</a> <a href=\"http://www.51hqt.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/51hqt.gif\" />红蜻蜓官方商城</a> <a href=\"http://www.bagtree.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/bagtree.png\" />包包树</a> <a href=\"http://www.glamour-sales.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/glamour-sales.png\" />魅力惠</a> </div>
<div class=\"sale_list\" id=\"sale_list_4\"> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.sfbest.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/sfbest.gif\" />顺丰优选</a> <a href=\"http://www.womai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/womai.gif\" />中粮我买网</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://redbaby.suning.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/redbaby.gif\" />红孩子</a> <a href=\"http://www.lingshi.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lingshi.gif\" />中国零食网</a> <a href=\"http://www.didamall.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/didamall.gif\" />嘀嗒猫</a> <a href=\"http://www.shouliwang.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/shouliwang.gif\" />手礼网</a> <a href=\"http://www.lecake.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lecake.gif\" />诺心LECAKE</a> <a href=\"http://www.tootoo.cn/?buyersource=emacps\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/tootoo.jpg\" />沱沱工社</a> <a href=\"http://www.yesmywine.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yesmywine.jpg\" />也买酒</a> <a href=\"http://www.maidangao.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/maidangao.jpg\" />好利来买蛋糕网</a> <a href=\"http://www.benlai.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/benlai.gif\" />本来生活网</a> <a href=\"http://www.yiguo.com/default.aspx\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yiguo.gif\" />易果生鲜</a> <a href=\"http://www.winenice.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/winenice.jpg\" />酒美网</a> <a href=\"http://www.maimaicha.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/maimaicha.gif\" />买买茶</a> <a href=\"http://shop.boqii.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/boqii.gif\" />波奇商城</a> <a href=\"http://www.wangjiu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/wangjiu.gif\" />网酒网</a> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a>  <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_5\"> <a href=\"http://t.dianping.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dianping.gif\" />大众点评网</a> <a href=\"http://bj.meituan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/meituan.gif\" />美团</a> <a href=\"http://www.nuomi.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/nuomi.gif\" />糯米网</a> <a href=\"http://www.lashou.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lashou.gif\" />拉手网</a> <a href=\"http://www.55tuan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/55tuan.jpg\" />窝窝团</a> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.zhiwo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/zhiwo.jpg\" />知我网</a> <a href=\"http://www.lefeng.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lefeng.gif\" />乐蜂网</a> <a href=\"http://www.xilituan.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xilituan.gif\" />犀利团</a> <a href=\"http://www.vetuan.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/vetuan.jpg\" />VE实体团</a> <a href=\"http://www.pztuan.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/pztuan.gif\" />品质团</a> <a href=\"http://www.hebaotuan.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/hebaotuan.gif\" />荷包团</a> <a href=\"http://www.bbhun.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/bbhun.gif\" />宝贝婚团</a>  <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_6\"> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://www.jd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jd.gif\" />京东商城</a> <a href=\"http://www.yixun.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yixun.gif\" />易迅网</a> <a href=\"http://www.suning.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/suning.gif\" />苏宁易购</a> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.gome.com.cn/ec/homeus/index.html\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/gome.gif\" />国美在线</a> <a href=\"http://shop.letv.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/letv.gif\" />乐视商城</a> <a href=\"http://www.mi.com/index.php\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/mi.gif\" />小米</a> <a href=\"http://www.newegg.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/newegg.jpg\" />新蛋商城</a> <a href=\"http://www.ocj.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/ocj.gif\" />东方CJ购物</a> <a href=\"http://www.skg.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/skg.gif\" />SKG官方商城</a> <a href=\"http://www.vmall.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/vmall.gif\" />华为商城</a> <a href=\"http://www.ehaier.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/ehaier.gif\" />海尔商城</a> <a href=\"http://www.coolpad.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/coolpad.gif\" />酷派官方商城</a> <a href=\"http://shop.lenovo.com.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lenovo.gif\" />联想官方网上商城</a> <a href=\"http://www.bookuu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/bookuu.gif\" />博库网</a> <a href=\"http://www.china-pub.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/china-pub.gif\" />互动出版网</a> <a href=\"http://book.beifabook.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/beifabook.gif\" />北发图书网</a> <a href=\"http://www.zazhipu.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/zazhipu.gif\" />杂志铺</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_7\"> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.jd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jd.gif\" />京东商城</a> <a href=\"http://www.yixun.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yixun.gif\" />易迅网</a> <a href=\"http://www.womai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/womai.gif\" />中粮我买网</a> <a href=\"http://www.sfbest.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/sfbest.gif\" />顺丰优选</a> <a href=\"http://www.ocj.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/ocj.gif\" />东方CJ购物</a> <a href=\"http://www.lovo.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lovo.gif\" />LOVO家居商城</a> <a href=\"http://www.lifevc.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lifevc.jpg\" />LifeVC丽芙家居</a> <a href=\"http://www.staples.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/staples.jpg\" />史泰博办公用品网</a> <a href=\"http://www.dapu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dapu.gif\" />大朴网</a> <a href=\"http://www.hao24.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/hao24.jpg\" />好享商城</a> <a href=\"http://www.parkson.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/parkson.gif\" />百盛网</a> <a href=\"http://www.xiangguo.tv/nav\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xiangguo.jpg\" />橡果国际</a> <a href=\"http://www.kuaishubao.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/kuaishubao.gif\" />快书包</a> <a href=\"http://www.hxshop.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/hxshop.gif\" />红星家品会</a> <a href=\"http://www.zgjf168.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/zgjf168.gif\" />中国家纺官网</a> <a href=\"http://www.uya100.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/uya100.gif\" />优雅100-家纺商城</a> <a href=\"http://www.kyp.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/kyp.gif\" />快易拍购物商城</a> <a href=\"http://www.beyond.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/beyond.gif\" />博洋家纺官网</a> <a href=\"http://www.feiniu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/feiniu.gif\" />飞牛网</a> <a href=\"http://www.muji.com.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/muji.jpg\" />无印良品</a> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a> </div>
<div class=\"sale_list\" id=\"sale_list_8\"> <a href=\"http://www.muyingzhijia.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/muyingzhijia.gif\" />母婴之家</a> <a href=\"http://redbaby.suning.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/redbaby.gif\" />红孩子</a> <a href=\"http://www.yhd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yhd.gif\" />1号店</a> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://www.jd.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jd.gif\" />京东商城</a> <a href=\"http://www.suning.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/suning.gif\" />苏宁易购</a> <a href=\"http://www.m6go.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/m6go.gif\" />麦乐购</a> <a href=\"http://www.baobeigou.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/baobeigou.gif\" />宝贝购</a> <a href=\"http://www.kissbb.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/kissbb.gif\" />今生宝贝</a> <a href=\"http://www.supuy.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/supuy.gif\" />速普商城</a> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_9\"> <a href=\"http://www.jumei.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jumei.gif\" />聚美优品</a> <a href=\"http://www.lefeng.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lefeng.gif\" />乐蜂网</a> <a href=\"http://www.dangdang.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dangdang.gif\" />当当网</a> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.suning.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/suning.gif\" />苏宁易购</a> <a href=\"http://www.yintai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yintai.gif\" />银泰百货</a> <a href=\"http://www.dhc.net.cn/top/index.jsp\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/dhc.gif\" />DHC</a> <a href=\"http://www.strawberrynet.com/landPage.aspx\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/strawberrynet.gif\" />香港草莓网</a> <a href=\"http://www.xiu.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xiu.gif\" />走秀时尚商城</a> <a href=\"http://www.naruko.com.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/naruko.gif\" />牛尔娜露可</a> <a href=\"http://www.lizi.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lizi.gif\" />丽子美妆</a> <a href=\"http://www.xiangshe.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xiangshe.gif\" />香舍臻品</a> <a href=\"http://www.xifuquan.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xifuquan.gif\" />皙肤泉</a> <a href=\"http://www.uzise.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/uzise.gif\" />柚子舍</a> <a href=\"http://www.xilituan.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/xilituan.gif\" />犀利团</a> <a href=\"http://www.zhiwo.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/zhiwo.jpg\" />知我网</a> <a href=\"http://item.koudai.com/index?utm_source=yiqifa\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koudai.jpg\" />口袋购物</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_10\"> <a href=\"http://trip.taobao.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/trip.png\" />淘宝旅行</a> <a href=\"http://travel.elong.com/hotel/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/elong.gif\" />艺龙网</a> <a href=\"http://www.lvmama.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lvmama.gif\" />驴妈妈旅游网</a> <a href=\"http://tuan.qunar.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/qunar.gif\" />去哪儿</a> <a href=\"http://www.springtour.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/springtour.gif\" />春秋旅游网</a> <a href=\"http://www.uzai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/uzai.gif\" />悠哉旅游网</a> <a href=\"http://www.yododo.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/yododo.gif\" />游多多</a> <a href=\"http://www.lulutrip.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/lulutrip.gif\" />路路行旅游</a> <a href=\"http://www.tujia.com/Promotion/tujiadachoujiang.htm\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/tujia.gif\" />途家网</a> <a href=\"http://www.kuxun.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/kuxun.gif\" />酷讯旅游</a> <a href=\"http://www.aoyou.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/aoyou.gif\" />中青旅遨游网</a> <a href=\"http://www.podinns.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/podinns.gif\" />布丁酒店</a> <a href=\"http://www.qmango.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/qmango.gif\" />青芒果旅行网</a> <a href=\"http://www.mangocity.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/mangocity.gif\" />芒果网</a> <a href=\"http://www.jinjiang.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jinjiang.jpg\" />锦江国际</a> <a href=\"http://www.wyn88.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/wyn88.gif\" />维也纳酒店</a> <a href=\"http://www.spider.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/spider.gif\" />蜘蛛网</a> <a href=\"http://caipiao.wanlitong.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/wanlitong.gif\" />平安彩票</a> <a href=\"http://www.310win.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/310wi.gif\" />彩客网</a> <a href=\"http://www.228cai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/228cai.gif\" />优彩网</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_11\"> <a href=\"http://www.amazon.cn?tag=eqifarebate-23&amp;ascsubtag=436015|1|\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/amazon.gif\" />亚马逊</a> <a href=\"http://www.ebay.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/ebay.gif\" />ebay</a> <a href=\"http://www.coach.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/coach.gif\" />Coach</a> <a href=\"http://www.uggaustralia.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/uggaustralia.gif\" />UGG</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
<div class=\"sale_list\" id=\"sale_list_12\"> <a href=\"http://www.keede.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/keede.gif\" />可得眼镜网</a> <a href=\"http://www.vsigo.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/vsigo.gif\" />视客眼镜网</a> <a href=\"http://www.aidai.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/aidai.gif\" />爱戴眼镜网</a> <a href=\"http://www.meijing.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/meijing.gif\" />美睛网眼镜商城</a> <a href=\"http://www.koolearn.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/koolearn.gif\" />新东方在线</a> <a href=\"http://www.jinghua.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/jinghua.gif\" />精华在线</a> <a href=\"http://www.111.com.cn/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/111.gif\" />壹药网</a> <a href=\"http://www.aizhigu.com.cn\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/aizhigu.gif\" />爱之谷</a> <a href=\"http://www.j1.com/\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/j1.gif\" />健一网</a> <a href=\"http://www.zbird.com\" target=\"_blank\"><img src=\"writable/__web__/images/1_0/zbird.gif\" />钻石小鸟</a> <a>&nbsp;</a> <a>&nbsp;</a> </div>
</div>
<script type=\'text/javascript\'>
 var _jjl = new Date().toDateString().replace(/s/g, \'\') + new Date().toTimeString().replace(/:d{2}:d{2}sUTC[+]d{4}$/g, \'\');
 document.write(unescape(\"%3Cscript src=\'http://p.yiqifa.com/js/juejinlian.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
 document.write(unescape(\"%3Cscript src=\'http://p.yiqifa.com/jj?_jjl.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
 document.write(unescape(\"%3Cscript src=\'http://p.yiqifa.com/js/md.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
</script>
<script type=\'text/javascript\'>
try{ 
 var siteId = 148176;
 document.write(unescape(\"%3Cscript src=\'http://p.yiqifa.com/jj?sid=\" + siteId + \"&_jjl.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
 var jjl = JueJinLian._init(); 
 jjl._addWid(siteId);
 jjl._addE(\"162100\");
 jjl._addScope(0);
 jjl._run(); 
}catch(e){} 
</script>',''),
('3733','mingz','9','栏目头栏','','','<table width=\"878\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#8FA4E8\" id=\"162100musicbox\">
  <tr valign=\"middle\">
    <td width=\"800\" height=\"550\" align=\"left\"><iframe width=\"100%\" height=\"100%\" name=\"musicframe\" id=\"musicframe\" scrolling=\"no\" src=\"http://player.kuwo.cn/webmusic/webmusic2011/hao123/index.jsp\" frameborder=\"0\"></iframe></td>
    <td width=\"140\" height=\"550\" align=\"center\">音乐播放器列表<br />
<table width=\"100%\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.xiami.com/player/hao123/\"><img src=\"writable/__web__/images/0_0/xiami.png\" /><br />
      虾米音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://web.kugou.com/hao123.html\"><img src=\"writable/__web__/images/0_0/kugou-mb.png\" /><br />
      酷狗音乐</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.1ting.com/api/hao123/\"><img src=\"writable/__web__/images/0_0/1ting.png\" /><br />
      一听音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://player.kuwo.cn/webmusic/webmusic2011/hao123/index.jsp\"><img src=\"writable/__web__/images/0_0/kuwomb.png\" /><br />
      酷我音乐</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://y.qq.com/\"><img src=\"writable/__web__/images/0_0/qq1.png\" /><br />
      QQ音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.xiami.com/kuang/hao123/\"><img src=\"writable/__web__/images/0_0/xiami.png\" /><br />
      虾米电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.yinyuetai.com/baidu/hao123\"><img src=\"writable/__web__/images/0_0/green-64.png\" /><br />
      音悦TV</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://topic.kugou.com/radio/\"><img src=\"writable/__web__/images/0_0/kugou-fm.png\" /><br />
      酷狗电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://douban.fm/partner/playerhao123\"><img src=\"writable/__web__/images/0_0/douban.png\" /><br />
      豆瓣FM</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://app.beva.com/hao123/fm/index.html\"><img src=\"writable/__web__/images/0_0/beva.png\" /><br />
      贝瓦电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://player.kuwo.cn/webmusic/kuwodt/diantai123.html\"><img src=\"writable/__web__/images/0_0/kuwoIcon.png\" /><br />
      酷我电台</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://ting.baidu.com/app/hao123/tingradio/\"><img src=\"writable/__web__/images/0_0/tingicon.png\" /><br />
      ting!电台</a></td>
  </tr>
</table>
</td>
  </tr>
</table>',''),
('4723','0','5','影视资讯|4|','','http://ent.163.com/movie|网易娱乐-电影频道||||
http://ent.qq.com/movie|腾讯娱乐-电影频道||||
http://ent.sina.com.cn/film|新浪-电影频道||||
http://my.tv.sohu.com/|搜狐影视库||||
http://ent.ifeng.com/movie|凤凰影视娱乐||||
http://www.bug.cn/|穿帮网|||穿帮网（www.bug.cn）创办于2007年，是中国第一个影视找茬网站，致力于发现有趣的穿帮镜头。|
http://www.mtime.com/|Mtime时光网|||Mtime时光网,中国最专业的电影电视剧及影人资料库,这里有最新最专业的电影新闻,预告片,海报,写真和热门影评,同时提供电影院影讯查询,博客,相册和群组等服务,是电影粉丝的最佳电影社区.|
http://www.insun.com.cn/|电影风向标||||
','',''),
('4724','0','5','影视论坛|4|','','http://bbs.cnxp.com/|影视帝国论坛|||帝国  - Discuz! Board|
','',''),
('4722','0','5','电影下载|4|','','http://www.verycd.com/|VeryCD|||电驴大全，为你提供最多最全面的电影、电视剧在线观看导航。为自己喜欢的资料打分，畅玩最好玩的游戏，了解全方位的影视资讯、游戏动态。|
http://movie.kankan.com/|迅雷影视|||迅雷看看电影频道是中国最新最热最全的高清电影免费在线观看第一频道，免费提供了欧美大片、华语大片、日韩电影、好莱坞大片等高清大片在线点播和下载，是中国最大最全的正版电影点播及发行平台。|
http://www.ygdy8.net/|阳光电影||||
http://www.funshion.com/?alliance_id=43271|风行影视||||
http://emule.ppcn.net/c6.aspx|电影eMule下载||||
http://www.verycd.com/|VeryCD共享|||电驴大全，为你提供最多最全面的电影、电视剧在线观看导航。为自己喜欢的资料打分，畅玩最好玩的游戏，了解全方位的影视资讯、游戏动态。|
http://shooter.com.cn/|射手网||||
http://www.btwuji.com/|无极BT下载||||
','',''),
('4333','0','0','播放软件|4|','','http://music.baidu.com/pc/index.html|百度音乐PC版|||百度音乐，百度音乐PC客户端，音乐播放器，千千静听，百度手机音乐播放器，手机音乐播放器，千千静听正式更名为百度音乐|
http://y.qq.com/download/index.html|QQ音乐PC版|||QQ音乐最新版官方下载。最全的高品质正版音乐曲库，任你免费试听下载。最新最热的排行榜、歌单、电台、MV天天推荐，智能音乐搜索、猜你喜欢帮你轻松发现音乐，歌词翻译、免费空间背景音乐，尽在QQ音乐。|
http://download.kugou.com/|KuGoo(酷狗)|||本站是酷狗音乐官方唯一指定的下载站点，主要提供酷狗音乐2015最新电脑版(pc和mac版)、手机版（苹果和安卓）和平板电脑（ipad和pad版）等创新软件免费下载。|
http://www.onlinedown.net/soft/3336.htm|MediaPlayer|||Windows Media Player 11 for Windows XP 为数字媒体提供无以伦比的选择和灵活性。使用它可以轻松管理计算机上的数字音乐库、数字照片库和数字视频库，并可以将它们同步到各种便携设备上，以便您可以随时随地欣赏.|
http://www.real.com/|RealPlayer|||官网为你提供强大的视频播放器和播放器下载，支持FLV、AVI、WMA、MP3、MP4、RM、JPG、GIF等多种主流的媒体格式，随时播放您喜爱的视频、音乐及图片，让一切都变得如此轻松。|
','',''),
('4332','0','0','原创/翻唱|4|','','http://www.a8.com/|A8音乐-原创中国|||A8音乐是为音乐人提供音乐管理、歌曲入库，数据分析和推广营销等服务的网络平台。|
http://www.51mike.com/|麦客网|||麦客疯　麦客网 麦克疯 网络在线卡拉OK 网络K歌 在线K歌 音乐翻唱|
http://www.yyyyba.com/|YY原创音乐|||中国原创音乐基地是全国最有影响力的原创间乐、翻唱音乐、喊麦歌曲等新歌发布网站,欢迎各大网络歌手及麦手前来发布作品。|
http://www.oyinyue.com/|噢音乐|||噢音乐-原创音乐网站,一个社交音乐平台,在这里可尽情展示你的音乐才华。这个大家庭有,本兮,汪苏泷,徐良,龙梅子,单色凌,董贞,阿悄,河图,小贱,小凌,祁隆,沉珂,小曲儿,回音哥,等等...让我们一起,热爱音乐,分享音乐!|
','',''),
('4327','0','0','在线音乐|4|','','http://www.1ting.com/|一听音乐网|||一听音乐网是中国最大的在线音乐网站，提供免费歌曲在线试听、下载。一听音乐网拥有正版、庞大、完整的曲库，歌曲更新迅速，试听流畅，口碑极佳。一听音乐网，每天听一听|
http://www.9ku.com/|九酷音乐网|||音乐-歌曲.九酷音乐网是专业的在线音乐试听mp3下载网站.收录了网上最新歌曲和流行音乐,网络歌曲,好听的歌,非主流音乐,QQ音乐,经典老歌,劲舞团歌曲,搞笑歌曲,儿童歌曲,英文歌曲等。是您寻找好听的歌首选网站。|
http://www.5nd.com/|5nd音乐网|||歌曲,音乐,提供MP3歌曲免费下载,歌曲下载,在线试听流行歌曲和好听的歌,劲舞团歌曲,伤感歌曲,非主流音乐,好听的英文歌曲,儿童歌曲,网络歌曲,最新歌曲下载,下歌曲听音乐,在线听歌曲尽在5nd音乐网。|
http://mp3.baidu.com/|百度MP3|||百度MP3，拥有丰富权威的华语音乐排行榜，帮您找到最新、最热的流行歌曲。音乐分类标签帮您挑歌，音乐随心听方便您听歌，更有个性化的私人推荐，音乐专题为您收集经典和天籁，音乐掌门人是强大的音乐分享平台。您会获得最动听的音乐享受。|
http://mp3.sogou.com/|搜狗MP3||||
http://y.qq.com/|QQ音乐|||QQ音乐是腾讯公司推出的一款免费音乐服务，海量音乐在线试听、最流行音乐在线首发、歌词翻译、手机铃声下载、高品质音乐试听、正版音乐下载、免费空间背景音乐设置、MV观看等，是互联网音乐播放和下载的首选|
http://www.yue365.com/|365音乐网|||高品质音乐Mp3下载试听网站，提供最新最好听的流行歌曲、网络歌曲，以及权威、全面的歌曲排行榜。|
','',''),
('4328','0','0','MP3歌词|4|','','http://music.baidu.com/|百度MP3搜索||||
http://mp3.sogou.com/|搜狗MP3||||
http://so.1ting.com/|一听音乐搜索|||一听音乐搜索|
http://www.sooopu.com/|搜谱网|||搜谱是一个专业的歌谱搜索网站，主要有以下栏目：简谱，吉他谱，钢琴谱，电子琴谱，手风琴谱，二胡谱，笛萧谱，萨克斯谱，古筝谱，总谱，其他曲谱。另外提供歌词、MP3与伴奏搜索。|
','',''),
('4329','0','0','轻音乐|4|','','http://www.999ttt.com/|轻音乐世界|||轻音乐网是中国最大的轻音乐交流平台,这里为网友提供了很多好听的轻音乐、经典钢琴曲、自然乐曲、中国轻音乐、优美古曲、心灵随想、是专业的轻音乐在线试听网站。|
http://www.htqyy.com/|好听轻音乐网|||好听轻音乐网是中国最好的轻音乐交流平台,专注于分享好听的轻音乐、纯音乐、经典钢琴曲、中国轻音乐、新世纪音乐、背景音乐，是专业的轻音乐在线试听、MP3下载网站。|
http://www.yue365.com/bang/tag18.shtml|365轻音乐|||这里有最好听的轻音乐钢琴曲，最流行的班得瑞轻音乐，为喜欢安静平和的人提供轻音乐欣赏|
http://www.9ku.com/qingyinyue/haoting.htm|九酷轻音乐|||好听的轻音乐大全，热门好听的轻音乐，九酷提供好听的轻音乐MP3试听下载。|
','',''),
('4330','0','0','DJ音乐|4|','','http://music.baidu.com/tag/DJ%20%E8%88%9E%E6%9B%B2|百度-热门DJ列表||||
http://www.ik123.com/|深港DJ舞曲|||DJ原创网站以推荐好听的DJ舞曲为主,收录的DJ舞曲质量为主,每首DJ音乐都由dj精心打造,下载好听的DJ舞曲,感受香港与深圳两地的dj文化,深港DJ网站是您的首选。|
http://www.djwma.com/|中国dj音乐网|||DJWMA舞曲网站为您推荐最好听的DJ舞曲试听,我们用心做dj音乐,大家用心听好dj舞曲,提供高速的mp3dj免费下载,是您上网首选的dj舞曲网站。|
http://www.dj-dj.net/|DJ先锋网|||中国大型专业dj站点。|
http://www.111ttt.com/|要听dj舞曲网|||DJ原创网站以推荐好听的DJ舞曲为主,收录的DJ舞曲质量为主,每首DJ音乐都由dj精心打造,下载好听的DJ舞曲,感受高品质音乐给您带来的震撼,要听舞曲网站是您的首选。|
','',''),
('4331','0','0','音乐周边|4|','','http://www.kugou.com/|KuGou酷狗音乐|||酷狗音乐旗下最新最全的在线正版音乐网站，本站为您免费提供最全的在线音乐试听下载，以及全球海量电台和MV播放服务、最新音乐播放器下载。酷狗音乐 和音乐在一起。|
http://music.sohu.com/|搜狐音乐||||
http://musicradio.cnr.cn/|音乐之声||||
http://www.ccjt.net/|虫虫吉他|||吉他商城|
http://www.guqu.net/|中国古曲网|||中国古曲网提供中国古典音乐(中国民族音乐-中国民乐)试听和下载,还有古筝、笛子、二胡、琵琶、葫芦丝、民歌、戏曲等内容的的视频、曲谱、新闻和相关内容的知识。|
shwh_quyi.html|有关曲艺网址&gt;&gt;||||
','',''),
('3763','mingz','11','栏目头栏','','','<div style=\"width:100%; text-align:center; overflow:auto; margin-bottom:38px;\">
  <div style=\"width:750px; overflow:hidden;\">
  <iframe src=\"http://cdn.inf.v.360.cn/daohang/dianying.html\" width=\"750\" allowtransparency=\"true\" scrolling=\"no\" height=\"1394\" frameborder=\"no\"></iframe>
  </div>
</div>
<div class=qiangdiao style=\" position: fixed; bottom:10px; left:11px; width:878px;z-index:97;\"><a href=\"xxyl_yingshi.html\" target=\"_parent\" class=\"redword\">进入影视频道&gt;&gt;</a></div>',''),
('3760','mingz','4','栏目头栏','','','<iframe src=\"http://www.cpdyj.com/apps/162100/162100.html\" allowtransparency=\"true\" width=\"100%\" height=\"220\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"no\" style=\"margin-bottom:38px\"></iframe>
<div class=qiangdiao style=\" position: fixed; bottom:10px; left:11px; width:878px;z-index:97;\"><a href=\"syjj_caipiao.html\" target=\"_parent\">进入彩票频道&gt;&gt;</a></div>',''),
('5867','1','12','黑龙江医院|4|','','http://www.hrbmush.edu.cn/|哈医大二院||||
http://www.first-hospital.com/|大庆油田总医院||||
http://www.cnhch.com/|哈尔滨市儿童医院||||
http://www.dekun.com/|大庆德坤瑶特色医院|||中国瑶医网作为提供国内权威瑶医知识的专业网站，由覃氏瑶医第十三代传人、中国第一位瑶医主任医师覃迅云教授领头并集合国内一流瑶医（医院）专家团队，为广大患者在线提供重大疾病治疗指导及瑶族养生知识，将广西瑶族传统民族医疗手法与现代医学结合，为红斑狼疮、肝癌、肺癌、淋巴瘤、脑瘤、骨肉瘤等肿瘤、癌症患者带来康复希望，同时传播健康理念，普及传统瑶浴文化，用药浴为现代人的健康保驾护航。|
http://www.dqeyy.com/|大庆市第二医院||||
http://www.hrbmu.edu.cn/|黑龙江省肿瘤医院||||
http://zxyy.jms.gov.cn/|佳木斯市中心医院||||
http://www.hq120.net/|哈尔滨虹桥医院||||
','',''),
('5868','1','12','江苏医院|4|16','','http://www.jswst.gov.cn/|江苏省卫生厅||||
http://www.jshtcm.com/|江苏省中医院|||江苏省中医院 - 省中医中医世家|
http://www.jsph.net/|江苏省人民医院||||
http://www.454hosp.cn/|解放军第四五四医院||||
http://www.njch.com.cn/|南京市儿童医院|||南京市儿童医院，亦名南京医科大学附属南京儿童医院、江苏省红十字儿童医院，是一所集医疗、科研、教学、康复、保健为一体的三级甲等儿童医院。|
http://www.njglyy.com/|南京市鼓楼医院||||
http://www.njka.com/|南京康爱医院|||《复古传奇》是一款以传统传奇题材为背景的即时战斗类角色扮演游戏。玩家通过江湖历练，领悟武学，打通经脉，江湖奇遇来体会真正的传奇世界，可以真正体会到与小说人物共同成长，问鼎传奇私服，笑傲传奇。|
http://www.njmu.edu.cn/|南京市第一医院||||
http://www.njzy666.com/|南京军区南京总医院||||
http://www.njfybjy.com/|南京市妇幼保健院||||
http://www.njkq.net/|南京市口腔医院||||
http://www.wuxihospital.com/|无锡市第四医院||||
http://www.ahnmc.com/|南通医学院附属医院||||
http://www.nt2191.com/|南通市第一医院||||
http://www.rcstar.com/|淮安市第二医院|||淮安市第二人民医院,江苏省淮安仁慈医院|
http://www.wuximhc.com/|无锡市精神卫生中心||||
http://www.dxc-online.com/|曹医生在线|||治疗股骨头坏死,股骨头坏死,股骨头坏死治疗,中医治疗股骨头坏死,儿童股骨头坏死,无菌性股骨头坏死,骨不连,股骨颈骨折,缺血性股骨头坏死,股骨头坏死治疗方法,预防股骨头坏死|
http://www.jyry.com/|姜堰市人民医院|||泰州市第二人民医院官方网站。|
http://www.nchospital.com/|无锡市南长人民医院|||无锡人民医院南长人民医院，作为无锡老年病医院，始建于1958年，地处南长街256号，坐落于清明桥历史文化街区，是一所以老年病诊治为特色、功能齐全、设施完备的二级综合性医院，是江苏省首批确认的爱婴医院。作为全市唯一的老年病医院，致力于老年病的临床研究，设有老年病临床医学研究机构，开展了紫外线照射充氧自血回输疗法在心脑血管等疾病方面的临床应用及药物溶栓治疗脑血栓形成等临床研究项目。此外，医院在老年骨科、老年神经内科等领域都处于市内领先水平，曾经成功地为一名98岁老人施行右股骨颈骨折复位和双头加压螺钉内固定手术，运用局部注射肉毒杆菌毒素使一名患面肌痉挛长达７年之久的患者得以康复。近来，无锡南长医院划归无锡人民医院，作为无锡人民医院老年病专业分院，继续为锡城及周边老年病患者服务。|
','',''),
('4668','2','2','影音播放|4|','','http://www.baofeng.com/|<img src=\"writable/__web__/images/2_2/media1.gif\" /> 暴风影音|||暴风影音-万能播放器,3D高清环绕声视频网站,提供独有的3D格式影片、左耳环绕声内容、最新3D电影、好看的电视剧、综艺、音乐MV、动漫、新片、大片的高清在线免费点播|
http://download.kugou.com/|<img src=\"writable/__web__/images/2_2/media5.gif\" /> 酷狗|||本站是酷狗音乐官方唯一指定的下载站点，主要提供酷狗音乐2015最新电脑版(pc和mac版)、手机版（苹果和安卓）和平板电脑（ipad和pad版）等创新软件免费下载。|
http://ttplayer.qianqian.com/|<img src=\"writable/__web__/images/2_2/media2.gif\" /> 千千静听||||
http://www.koowo.com/pa_mbox/1616/music-1616.htm|<img src=\"writable/__web__/images/2_2/media3.gif\" /> 酷我音乐盒||||
http://www.onlinedown.net/soft/16622.htm|<img src=\"writable/__web__/images/2_2/media4.gif\" /> RealPlayer||||
','',''),
('4669','2','2','下载工具|4|','','http://dl.xunlei.com/index.htm?tag=1|<img src=\"writable/__web__/images/2_2/download1.gif\" /> 迅雷||||
http://www.emule.org.cn/download|<img src=\"writable/__web__/images/2_2/download4.gif\" /> 电驴（eMule）||||
http://xf.qq.com/|<img src=\"writable/__web__/images/2_2/download5.gif\" /> 超级旋风||||
http://www.flashget.com/cn/download.htm|<img src=\"writable/__web__/images/2_2/download2.gif\" /> 网际快车||||
http://www.duote.com/soft/57.html|<img src=\"writable/__web__/images/2_2/download3.gif\" /> 哇嘎Vagaa||||
','',''),
('4670','2','2','系统工具|4|','','http://www.newhua.com/soft/42557.htm|<img src=\"writable/__web__/images/2_2/system4.gif\" /> 鱼鱼桌面秀||||
http://drivers.mydrivers.com/drivers/243-97244-Mydrivers-2008-B5.2-For-Win2000-XP-2003-Vista|<img src=\"writable/__web__/images/2_2/system5.gif\" /> 驱动精灵||||
http://www.386w.com/html/20090307/6459.html|<img src=\"writable/__web__/images/2_2/system2.gif\" /> Windows优化大师||||
http://www.pctutu.com/download|<img src=\"writable/__web__/images/2_2/system3.gif\" /> 超级兔子||||
http://www.52z.com/soft/148.Html|<img src=\"writable/__web__/images/2_2/system1.gif\" /> WinRAR||||
http://www.115.com/|115网盘|||115为全球超过1亿用户提供个人云服务，产品模块包括云（个人数据中心），我聊（即时通讯工具），社区（群体社交互动工具、精准的信息平台）。|
','',''),
('4667','2','2','聊天工具|4|','','http://im.qq.com/|<img src=\"writable/__web__/images/2_2/im1.gif\" /> 腾讯QQ|||腾讯QQ，8亿人在用的即时通讯软件，你不仅可以在各类通讯终端上通过QQ聊天交友，还能进行免费的视频、语音通话，或者随时随地收发重要文件。欢迎访问QQ官方网站，下载体验最新版QQ，了解QQ最新功能。|
http://www.fetion.com.cn/download|<img src=\"writable/__web__/images/2_2/im3.gif\" /> 飞信Fetion||||
http://www.windowslive.cn/|<img src=\"writable/__web__/images/2_2/im2.gif\" /> MSN||||
http://uc.sina.com.cn/download/uc_download.html|<img src=\"writable/__web__/images/2_2/im4.gif\" /> 新浪UC||||
http://www.taobao.com/wangwang|<img src=\"writable/__web__/images/2_2/im5.gif\" /> 阿里旺旺||||
','',''),
('4663','2','2','软件下载|4|','','http://www.skycn.com/|天空软件站|||天空下载站，提供国内外最新最安全的免费软件资源下载，所有软件通过安全检测，无木马病毒，无诱导广告，绿色软件轻松下载|
http://www.onlinedown.net/|华军软件园|||华军软件园提供国内外最新的免费软件、共享软件下载及发布的软件下载站，包含系统软件、网络工具、杀毒安全、图形图像、媒体工具、管理软件、桌面工具、教育教学、游戏娱乐、硬件相关等软件下载，另外涉及软件行业资讯、软件使用技巧、相关软件评测、软件使用教程等相关软件行业的综合软件网站！|
http://down.admin5.com/|A5源码||||
http://dl.pconline.com.cn/|太平洋软件下载||||
http://mydown.yesky.com/|天极下载|||天极下载提供最新最全的电脑软件、手机应用、网络游戏、电视应用、盒子应用、驱动下载，安全、绿色、快速，是国内最早、最专业的下载站之一。精彩下载，尽在天极。|
http://download.pcpop.com/|泡泡网下载|||泡泡网下载频道-提供最新最全的免费软件、绿色软件、手机软件、硬件驱动的高速下载，包括手机软件、应用软件、系统软件、网络软件、图像软件、视频软件、音频软件、聊天软件、安全软件、硬件驱动、软件资讯及其他软件。|
http://down.chinaz.com/|中国站长下载||||
http://download.pchome.net/|电脑之家软件下载|||电脑之家下载中心提供安全无毒的电脑软件下载、手机软件下载、壁纸素材打包下载、驱动下载和游戏下载等，下载软件就到电脑之家下载中心！|
http://download.enet.com.cn/|eNet下载|||eNet硅谷动力下载频道是中国最大的免费软件下载站点。提供免费杀毒下载,网络软件下载,图像处理下载,影音播放下载,工具软件下载,小游戏下载,桌面下载,鼠标指针等免费,共享软件下载服务,同时提供原创软件下载发布。|
http://download.it168.com/|IT168下载|||IT168软件下载频道是国内最专业最权威的软件下载网站之一，提供绿色安全的官方版免费软件下载，还提供免费单机游戏下载、万能驱动下载和手机游戏下载、手机软件下载。IT168软件下载-最新最全的免费软件下载基地。|
http://download.qq.com/|腾讯下载||||
http://tech.sina.com.cn/down|新浪软件下载||||
http://xiazai.zol.com.cn/|软件下载-中关村在线|||软件下载频道（消费类软件门户媒体）提供最新最全网络软件、杀毒软件、聊天工具、系统工具、媒体播放、输入法、QQ工具、手机主题和驱动等丰富的绿色软件下载,互联网软件资源共享的宝藏!－中关村在线软件频道!|
http://www.xdowns.com/|绿色软件联盟|||绿色软件联盟，也叫绿盟，是一个以绿色软件为主的软件下载平台，已经有9年多历史了,以软件绿色安全,最新最快最全为广大网友所喜爱。|
http://www.xz7.com/|极光下载站|||河源下载站正式改名极光下载站,每天更新大量最新的绿色软件、安卓软件、安卓游戏下载！|
http://www.52z.com/|飞翔下载站||||
','',''),
('4664','2','2','驱动下载|4|','','http://drivers.mydrivers.com/|驱动之家-驱动中心|||驱动之家-驱动下载频道共有十多万种各类别产品驱动、工具及说明书，为您提供最全面的驱动下载和驱动一体化自动安装服务|
http://driver.zol.com.cn/|中关村在线-驱动下载||||
http://drivers.yesky.com/|天极网-驱动下载||||
http://dl.pconline.com.cn/sort/2.html|太平洋网-驱动下载||||
http://driver.it168.com/|IT168-驱动下载|||IT168驱动之家，是国内著名的驱动下载站点，提供声卡、显卡、主板、网卡等硬件驱动和笔记本、数码相机、MP3、MP4等数码驱动下载，是国内最大最全的驱动程序下载中心。|
http://drivers.qudong.com/|驱动中国-驱动下载|||驱动中国提供专业的驱动下载服务,驱动之家,声卡驱动,显卡驱动,摄像头驱动,网卡驱动,万能驱动,驱动资讯,驱动评测等等。|
http://www.xiazaiba.com/downlist/43.html|下载吧-常用驱动下载||||
','',''),
('4665','2','2','装机软件|4|','','http://www.xiazaiba.com/diy.html|绿色下载吧-装机必备||||
http://dl.pconline.com.cn/changyong.html|太平洋-装机常用软件||||
http://www.skycn.com/cy.htm|天空-装机常用软件||||
http://down1.tech.sina.com.cn/download/html/diy/index.html|新浪网-装机必备软件||||
http://www.so138.com/sf.aspx|千源网-装机软件||||
','',''),
('4666','2','2','软件论坛|4|','','http://softbbs.pconline.com.cn/|太平洋软件论坛|||国内最大的软件教程、操作系统交流社区。内容涵盖各种工具软件、办公软件、网页设计、平面设计、三维设计、操作系统、网络安全、病毒、程序开发基础、开发技巧、开发实例等，全面系统介绍各类软件用法、技巧以及应用解决方案，为读者提供最新最全的软件资讯与学习教程。|
http://bbs.mumayi.net/|木蚂蚁社区|||木蚂蚁社区是国内比较大的绿色软件下载社区，免费提供各种绿色软件和游戏下载，是国内更新最及时，内容最丰富的绿色软件下载网站之一，是各类绿色软件下载站素材源泉地|
http://it.crfly.com/|箫心IT乐园|||crfly.com,it.crfly.com,箫心IT乐园,箫心下载,下载资源,资讯,下载,游戏,动画,软件,动态,源程序,源码,工具,教育,培训,学习,ASP.net,商品,产品,免费,破解,正版,破解版,在线,优化设置,系统辅助,光碟工具,开关定时,系统检测,系统其他,磁盘工具,卸载清除,升级补丁,压缩解压,文件处理,时钟日历,数据备份,键盘鼠标,汉字输入,文件管理,字体工具,转换翻译,信息管理,其他工具,手机工具,数据恢复,扫描打印,办公软件,天文地理,bbs.52happy.net,52happy.net|
http://bbs.pcbeta.com/|远景论坛|||论坛 ,远景论坛 - 微软极客社区|
http://bbs.mydrivers.com/|驱动之家论坛|||首页 ,驱动之家论坛|
','',''),
('4701','2','7','股市论坛|4|','','http://bbs.jrj.com.cn/gupiao|股票论坛-金融界||||
http://bbs.hexun.com/|和讯论坛|||中国最具影响力的专业财经论坛，拥有忠实的资深用户群体！包含股票、基金、期货、债券、外汇等投资理财品种。我们愿与天下投资理财人共同打造无沟通障碍的优质网络家园！|
http://bbs.macd.cn/|MACD股市技术论坛|||最专业的股市技术分析论坛，股民最喜爱的股票论坛，提供全方位的股市分析、行情分析、股票分析、板块分析、股票指标公式、股指期货、实时看盘、研究报告、荐股大赛、软件下载和学习交流。|
http://www.55188.com/|理想论坛|||理想论坛建立已经超过10年,是最好的炒股论坛,其股票公式,股票软件,研究报告,新手入门,证券图书,炒股秘籍等区是全国最好的,选股公式中包含了股票公式,选股公式,通达信公式,大智慧公式,同花顺公式,飞狐公式，通达信选股公式,股票软件中有免费通达信,飞狐交易师,益盟操盘手,通达信免费版等等几十款免费炒股软件|
http://www.chcj.net/bbs.php|创幻论坛||||
http://www.y2.cn/|外汇论坛|||外汇行情分析,外汇走势咨询,最权威,人气最旺的专业外汇社区,凝聚全球顶尖外汇专家智慧,共同创造财富！|
','',''),
('4702','2','7','体育论坛|4|','','http://bbs.sports.tom.com/|TOM体育论坛||||
http://bbs.sports.sohu.com/|搜狐体育社区||||
http://bbs.sports.163.com/|网易体育论坛|||网易论坛,最贴近生活的中文论坛!看新闻上网易,聊新闻上网易论坛!看最新鲜的娱乐八褂上网易论坛!情感交流上网易论坛!买股票,玩投资上网易论坛!要买车要玩车自驾游上网易论坛!玩数码,买手机上网易论坛!聊文化,谈历史,爱军事上网易论坛!网易论坛有你需要的一切!|
http://bbs.hupu.com/|HoopChina篮球论坛|||虎扑体育论坛以NBA话题为主,包含CBA,足球,F1等内容的讨论,拥有热情而不失理性的良好讨论氛围,提供论坛版块定制等个性化功能.|
http://www.sundns.org/discuz|乒乓家园BBS||||
http://bbs.badmintoncn.com/|羽球在线|||专业羽毛球论坛，羽毛球迷资讯共享与交流的平台|
','',''),
('4703','2','7','足球论坛|4|','','http://www.zgqmbbs.com/|中国足球球迷论坛||||
http://bbs.arsenal.com.cn/|枪手论坛|||枪手论坛 全球最大的阿森纳中文球迷网络社区，阿森纳中国网旗下论坛|
http://q.163.com/fcbasa|巴萨球迷之家||||
http://www.interclub.cn/board|国际米兰球迷协会||||
http://www.scacm.com/bbs|红黑米兰论坛||||
','',''),
('4704','2','7','贴图论坛|4|','','http://www.cameraunion.net/|色影无忌||||
http://bbs.sina.com.cn/pic|精彩贴图-新浪论坛||||
http://bbs.hnol.net/list2.asp?boardid=50|美女贴图-华声在线||||
http://bbs.hnol.net/list2.asp?boardid=61|绝美图库-华声在线||||
http://bbs.hzcnc.com/forumdisplay.php?fid=46|泡泡相册-城市论坛||||
','',''),
('4705','2','7','笑话论坛|4|','','http://tieba.baidu.com/f?kw=%D0%A6%BB%B0|百度笑话吧||||
http://people.sina.com.cn/forum/xiaohua2.html|新浪笑话论坛||||
http://www.iq888.com/|笑话大全|||笑话大全为您提供最新经典笑话,包括冷笑话,谐音笑话,爆笑笑话,幽默笑话,成人笑话,冷笑话大全,搞笑短信,英语笑话,笑话视频,校园笑话,笑话网站,等精选笑话,希望笑话大全能给您带去轻松快乐的心情|
http://bbs.haha168.com/|八目妖爆笑娱乐社区||||
http://www.51haha.net/club|哈哈社区||||
http://bbs.tianya.cn/list-14-1.shtml|天涯社区开心乐园||||
http://fun.china.com/zh_cn/joke/index.html|中华网幽默娱乐||||
','',''),
('4706','2','7','游戏论坛|4|','','http://bbs.17173.com/|17173游戏论坛|||17173游戏论坛是中国游戏第一门户站17173的玩家交流平台,全年365天保持高品质的一站式互动服务,您可以在这里感受到各款最新最热游戏的讨论氛围，获得您喜爱的游戏的全方位资讯，并可以轻松赢取最新游戏测试账号、高档数码产品和海量现金奖励等丰厚活动奖品,是游戏玩家首选网络游戏论坛。|
http://bbs.1t1t.com/|网游先锋论坛||||
http://iq.sdo.com/|盛大论坛|||盛大在线自主研发的互动问答平台，通过用户交流互动，提供游戏心得体会、经验攻略等实用性知识。同时可以通过贡献答案累积获取财富值，赢取盛大点券，将知识兑换成财富。|
http://bbs.chinagames.net/|中国游戏中心论坛|||中国游戏中心论坛  - Discuz! Board|
http://bbs.92wy.com/|万宇在线网游论坛|||万宇在线网友社区,在线讨论,网游论坛|
http://xy2.netease.com/|大话西游官方论坛|||《新大话西游2》官方论坛 回合制网游经典之作，注册用户超1.5亿，126万同时在线。最新资料片《月光爱人》推出定心除魔、齐天大殿副本、新天赋、召唤兽比斗、月光爱人五大玩法。为您提供最新资讯、攻略录像、藏宝阁淘宝、名人访谈、原创漫画等丰富内容。 - Discuz! Board|
http://bbs.9you.com/|久游社区|||久游论坛|
http://bbs.ourgame.com/|联众游戏讨论区|||联众论坛,为您提供最专业的游戏论坛,棋牌游戏,网络游戏,四国军棋,象棋,围棋,斗地主,德州扑克,各种休闲游戏供您选择|
http://bbs.xoyo.com/|金山逍遥社区|||龙门客栈|
http://bbs.joyyang.com/|骄阳游戏社区|||骄阳网，中国最权威的游戏媒体。以游戏下载、游戏资讯、专区专题、游戏活动及玩家互动为特色，为玩家提供最好的游戏资讯。|
','',''),
('4699','2','7','手机论坛|4|','','http://bbs.imobile.com.cn/|手机论坛-手机之家||||
http://bbs.shouji.com.cn/|手机论坛-手机乐园|||手机乐园论坛为广大手机用户提供一个手机交流平台，用户可以分享手机使用心得，上传下载精彩手机资源|
http://it.sohu.com/94/83/column204948394.shtml|手机论坛-搜狐论坛||||
http://tech.sina.com.cn/mobile/forum.html|手机论坛-新浪科技||||
http://www.nokiacn.net/|诺基亚手机论坛||||
http://bbs.52samsung.com/|三星手机论坛|||三星手机论坛是国内最专业的手机技术论坛,致力于智能手机技术,提供优秀的ROM下载,打造超越三星手机官网的最强三星智能手机论坛|
http://bbs.dospy.com/|塞班智能手机论坛||||
http://bbs.139shop.com/|北斗手机网论坛|||首页|
http://bbs.blueshow.net/|忧郁的蓝色-手机论坛|||蓝色手机社区-忧郁的蓝色 2002年成立的老牌专业手机论坛,真正专业手机玩家大型交流社区，诺基亚手机论坛,三星手机,索爱手机,夏普手机论坛,日系手机,二手手机,夏普,MOTO,摩托罗拉,sharp,索爱,松下,NEC,软解手机,原创手机软件,mp3铃声,免费mp4下载,电子书,手机java下载,手机短片,手机铃声,手机图片,手机电影,手机游戏,手机资源,手机汉化,手机维修,刷机工具,手机破解,刷机教程,手机硬件故障,GPS,手机配件-Blueshow 忧郁的蓝色手机社区|
','',''),
('4700','2','7','军事论坛|4|','','http://bbs.tiexue.net/|铁血论坛||||
http://forum.xinhuanet.com/|新华网军事论坛||||
http://www.chinamil.com.cn/site1/gwgfsq/index.htm|中国军网国防社区||||
http://bbs.hnol.net/list2.asp?boardid=70|华声在线军事杂谈||||
','',''),
('4697','2','7','安全防毒论坛|4|','','http://forum.jiangmin.com/|江民反病毒社区||||
http://it.sohu.com/90/71/column203667190.shtml|搜狐病毒专区||||
http://tieba.baidu.com/f?kw=%B2%A1%B6%BE|百度病毒吧||||
','',''),
('4698','2','7','数码论坛|4|','','http://bbs.imp3.net/|iMP3数码影音|||论坛 ,iMP3随身影音|
http://bbs.it168.com/|IT168论坛|||欢迎关注IT168产品论坛 - 提供手机论坛、笔记本论坛、数码相机论坛、平板电脑、,数码相机论坛、本友会、机友会、板友会、摄友会、Ixpub技术社区、chinaunix技术社区等各产品线论坛，是IT网友信赖的IT大论坛－IT168|
','',''),
('4696','2','7','软件论坛|4|','','http://bbs.newhua.com/|华军软件园论坛|||编看编买,什么值得买,网购攻略,网购比价,电商导购|
http://bbs.crsky.com/|霏凡论坛||||
http://community.csdn.net/|Csdn社区||||
http://softbbs.pconline.com.cn/|太平洋电脑软件论坛|||国内最大的软件教程、操作系统交流社区。内容涵盖各种工具软件、办公软件、网页设计、平面设计、三维设计、操作系统、网络安全、病毒、程序开发基础、开发技巧、开发实例等，全面系统介绍各类软件用法、技巧以及应用解决方案，为读者提供最新最全的软件资讯与学习教程。|
http://bbs.mydrivers.com/|驱动之家论坛|||首页 ,驱动之家论坛|
http://bbs.pediy.com/|看雪软件安全|||安全,软件安全,WEB安全,加密,解密,加壳,脱壳,加密壳,软件保护,破解,debug,pack,unpack|
http://www.phpwind.net/|PHPWind||||
http://www.discuz.net/|Discuz!|||本站是 Discuz! 论坛社区产品的官方交流站点。提供风格、模板、插件、产品扩展、技术支持等全方位服务。Discuz! 论坛（BBS），是一个采用 PHP 和 MySQL 等其他多种数据库构建的性能优异、功能全面、安全稳定的社区论坛平台，是全球市场占有率第一的社区论坛（BBS）软件。|
http://bbs.dvbbs.net/|动网先锋论坛|||动网论坛是使用量最多、覆盖面最广的免费中文论坛，也是国内知名的技术讨论站点，希望我们辛苦的努力可以为您带来很多方便|
http://bbs.powereasy.net/|动易论坛|||动易论坛是动易网络为我们的产品－－动易网站管理－－提供技术支持、网友互相交流的论坛|
http://tieba.baidu.com/f?kw=%C8%ED%BC%FE|百度软件吧||||
http://bbs.bccn.net/|编程论坛||||
','',''),
('4692','2','7','特色论坛|4|16','','http://community.39.net/|三九健康社区||||
http://club.autohome.com.cn/|汽车之家社区||||
http://bbs.imobile.com.cn/|手机之家||||
http://www.tiexue.net/|铁血军事论坛||||
http://www.abbs.com.cn/bbs/index.html|ABBS建筑论坛||||
http://community.csdn.net/|CSDN技术社区||||
http://bbs.anquan.com.cn/|安全论坛|||安全文化网论坛（bbs.anquan.com.cn）开通于2004年2月，是目前国内专业且极具人气的安全生产专业论坛。安全论坛旨在为网友提供安全生产工作交流平台，致力于为安全工作者打造网上新生活。|
http://bbs.eastmoney.com/|东方财富网论坛|||汇聚股市大智慧的东方财富网论坛包括:谈股论金,投资内参等股票期货指标评论板块!|
http://bbs.xunlei.com/|迅雷论坛|||迅雷论坛,是迅雷的官方会员论坛,拥有大量雷友原创的迅雷产品评测,迅雷官方资讯,想知道迅雷官方活动怎么样,水晶价格,快鸟加速,离线高速问题解答就来迅雷论坛|
http://bbs.dospy.com/|塞班智能手机论坛||||
http://bbs.haha168.com/|八目妖社区||||
http://club.xcar.com.cn/|爱卡汽车俱乐部|||爱卡汽车是中国最大的汽车社区，包括各品牌汽车论坛，汽车俱乐部，车友会，车友互动，经验交流，XCAR-爱卡汽车网是全球最大的汽车主题社区让你的生活更精彩。|
http://bbs.guoxue.com/|国学论坛|||国学论坛 国学网旗下公益性论坛，讨论内容包罗万象，涉及文学艺术、历史考古、思想宗教、文字音韵、天文地理、易学术数、古艺国粹等国学文化知识及专题，同时亦开设有电子文献资源、国学相关图片等方面的资料共享版块，论坛名家云集，好者纷至，是中国最大最专业的国学文化普及研究网站。 - Discuz! Board|
http://club.china.alibaba.com/|阿里巴巴商人论坛||||
http://bbs.fang.com/|搜房网业主论坛||||
http://www.iyaya.com/|丫丫家庭社区||||
http://www.jdbbs.com/|家电论坛|||家电,家电论坛,电视机,音响,家庭影院,投影,空调,洗衣机,冰箱,电影,音乐,CD,DVD,蓝光,高清,交易|
http://bbs.trends.com.cn/|时尚论坛|||时尚论坛（bbs.trends.com.cn）引领时尚潮流,深刻解析时尚都市谜语,及时报道时尚达人、时尚社区事件,有时尚达人交流、潮流社区信息、时尚资讯、时尚社区交流等时尚都市资讯,时尚都市生活尽在时尚论坛.|
http://bbs.8264.com/|中国驴友论坛|||中国最大的旅游网及驴友户外运动社区,630万注册驴友,数十万精美游记,每日发贴70000,每周数百户外活动,期待你的加入 ,户外资料网8264.com|
http://www.guba.com.cn/|股吧|||股吧--东方财富网打造的中国人气最旺的股票主题社区，实时行情评论和个股交流让你感受到证券经济的力量。|
http://www.xinnong.com/|新农网-农民的朋友|||新农网_涉农信息聚集地！涵盖：农业新闻、农产品价格、养猪技术、养牛技术、种殖技术、农民致富经、农民学电脑。农民朋友最喜欢的农业网站！|
http://bbs.533.com/|出国留学论坛||||
http://bbs.xfwed.com/|幸福婚嫁社区|||幸福婚嫁社区，是中国最大的新娘结婚经验交流社区，提供婚纱照、婚礼、新娘、婚礼筹备、蜜月旅行、新娘日记、新房装修、妈咪宝贝、美容、新娘化妆、婚后生活等结婚相关信息，新人轻松搞定婚礼的完美婚嫁平台。|
http://www.dianping.com/|大众点评网|||中国城市消费指南 餐馆美食、购物、休闲娱乐、生活服务、活动优惠打折信息。大众点评网是中国第一家也是领先的web2.0式的本地搜索门户。商户的信息和评价全部由会员共同管理和维护。|
http://www.rongshuxia.com/|榕树下|||榕树下是中国最大、最具影响力的文学互动门户，向用户提供网络文学与实体出版书籍的阅读、推荐、评价，以及业内媒体资讯、文化娱乐社区等服务。此外榕树下还致力于向中文原创作者提供完备的网络发表及出版通道。|
http://www.im286.com/|落伍者|||落伍者创办于2001年，系国内历史最悠久的互联网创业者交流平台。|
http://bbs.hongxiu.com/|红袖论坛||||
http://bbs.kaoyan.com/|考研论坛|||考研党们，快加入中国最大的考研论坛（bbs.kaoyan.com）！告别孤独备考，来与同校研友、同专业考友、师兄师姐交流考研资料和考研经验吧！|
http://www.blueidea.com/bbs|经典论坛||||
http://bbs.admin5.com/|站长交易论坛|||A5交易，站长们都信赖的交易中介平台，致力打造最大站长交流学习赚钱的专业平台；专业提供域名网站、链接买卖、程序源码、建站美工任务等交易中介服务平台。|
http://bbs.yaolan.com/|摇篮网|||摇篮网育儿论坛是为准备怀孕、怀孕以及0-6岁婴幼儿父母提供的网上交流的育儿社区平台。育儿论坛内容涉及备孕追孕、早期胎教、孕期保健、怀孕分娩、亲子早教、育儿方法、婴幼儿接种等常见病护理常识。还有女人心情、婆媳关系、旅游攻略、美食营养、减肥美容、购物分享、家庭理财等生活服务信息。在这里您可以与其他父母一起分享您的生活经验和育儿心得,记录宝宝成长历程和家庭生活琐事！|
','',''),
('4693','2','7','音乐论坛|4|','','http://bbs.guitarchina.com/|吉他中国论坛|||吉他中国为访问量最大用户数最多知名度最高专业性最强合作艺人最权威和最受吉他爱好者欢迎的第一华语吉他网络媒体与门户,吉他中国论坛是网络上人气最旺的吉他世界、乐器与音乐类社区|
http://club.xialala.com/|极品音乐论坛|||论坛 ,极乐 - 分享音乐|
http://www.breezee.org/|清风音乐论坛||||
http://bbs.musicool.cn/|炫音音乐论坛|||炫音音乐论坛提供WAV,APE,FLAC,DTS等音质最好的无损音乐,M4A,AAC音乐下载分享和讨论,开设具有影响力的新世纪音乐，欧美流行音乐，AAC,M4A音乐，肚皮舞音乐等板块。|
http://bbs.besgold.com/|百事高音乐论坛|||百事高音乐论坛是领先的专业音乐社区，包括发烧音乐,古典音乐,新世纪音乐,流行歌曲,轻音乐,摇滚,爵士,民乐,DJ,MTV介绍和讨论。|
http://www.pt80.com/|捌零音乐论坛|||专业发烧音乐试听,最新专辑,发烧器材评测,HD高清MV信息交流|
http://www.zasv.com/|杂碎音乐论坛|||分享音乐，分享心情……|
','',''),
('4694','2','7','小说论坛|4|','','http://club.xilu.com/|西陆文学社区|||西陆网是中国第一军事门户网站，西陆论坛是中国最早最大的论坛，是最受网民欢迎的网络社区。军事论坛、文学论坛、汽车论坛、财经论坛、社会论坛、娱乐论坛、游戏论坛、图片论坛、戏曲论坛、健康论坛、学术论坛、情感论坛，尽在西陆论坛|
http://www.paipaitxt.com/|派派小说论坛|||派派海淘论坛成立于2006年，是最热的海淘交流社区，偏重女性类海淘，在这里分享最新鲜的海淘资讯、折扣优惠信息，交流海外购物的经验和心得。是最好的转运交流社区。|
http://www.itxtbook.com/|小说之家|||小说之家提供:小说下载,txt 电子书免费下载,全本小说免费下载,手机小说下载,穿越小说下载等免费小说下载服务,是最专业的txt小说下载和电子书下载论坛.|
http://www.txtbbs.com/|TXT论坛|||精品小说尽在TXT小说网，提供最新的中文小说、言情小说在线阅读及免费小说下载、手机电子书下载。编辑及书友推荐好看的小说、言情小说、玄幻小说，一站式阅读TXT小说网。|
http://club.cul.sohu.com/|搜狐读书社区||||
http://bbs.hongxiu.com/|红袖论坛||||
http://tieba.baidu.com/f?kw=%D0%A1%CB%B5|百度小说吧||||
http://bbs.txtnovel.com/|书香门第TXT论坛|||提供全本完结的TXT格式电子书免费下载,TXT小说下载,手机电子书下载,纯文字版小说下载,在这里,活跃的会员分享,负责的版主整理,带给您一个整洁舒适的小说下载环境|
','',''),
('4695','2','7','硬件论坛|4|','','http://diybbs.it168.com/|硬件DIY论坛||||
http://www.52hardware.com/bbs|52硬件论坛||||
http://bbs.zol.com.cn/|中关村在线论坛|||中关村在线论坛是it行业内最具潜力的Web2.0互动平台。丰富高质的论坛内容和精彩不断的定期活动，使得论坛得到了广大网友的一致认同，成为业界第一的专业论坛、第一最具人气的论坛－ZOL中关村在线|
http://itbbs.pconline.com.cn/|太平洋电脑产品论坛|||太平洋电脑网论坛,最火热的IT产品BBS社区.其中有DIY论坛,笔记本论坛,手机论坛,数码相机论坛,软件论坛,休闲论坛等|
http://bbs.mydrivers.com/|驱动之家社区|||首页 ,驱动之家论坛|
http://bbs.beareyes.com.cn/|小熊在线论坛||||
http://bbs.it168.com/|IT168论坛|||欢迎关注IT168产品论坛 - 提供手机论坛、笔记本论坛、数码相机论坛、平板电脑、,数码相机论坛、本友会、机友会、板友会、摄友会、Ixpub技术社区、chinaunix技术社区等各产品线论坛，是IT网友信赖的IT大论坛－IT168|
http://bbs.pcpop.com/|泡泡产品论坛|||IT论坛是泡泡网为广大的IT用户提供BBS论坛,手机论坛,数码相机论坛,笔记本论坛,液晶电视论坛等服务的网站.泡泡网产品论坛为您的每一款产品找到一个家|
http://bbs.enet.com.cn/|eNet硅谷动力论坛||||
http://zone.it.sohu.com/|搜狐数码公社||||
http://www.haseebbs.com/|神舟电脑俱乐部|||ok365.com---便民导航，是三六五集团旗下上网导航服务网站，我们始终致力于为用户提供最简单、最实用、最贴心的上网导航服务。我们的目标是致力发展成为中国领先的上网导航服务商|
','',''),
('4691','2','7','综合论坛|4|16','','http://www.tianya.cn/|天涯社区|||天涯社区，以“全球最具影响力的论坛”闻名于世，并提供博客、相册、个人空间等服务。拥有天涯杂谈、娱乐八卦、情感天地等超人气栏目，以及关天茶舍、煮酒论史等高端人文论坛。这里诞生了最热的网络事件，最多的草根明星……|
http://bbs.sina.com.cn/|新浪论坛|||新浪论坛社区，全球最大华人中文社区；新浪论坛社区是互联网最具知名度的综合性BBS，拥有庞大核心用户群体，主题板块涵盖文化、生活、社会、时事、体育、娱乐等各项领域。|
http://club.sohu.com/|搜狐社区|||搜狐社区倡导分享生活每一天的理念，这里拥有与网友生活密切相关的各类论坛。包括女人、健康、财经、教育、汽车、IT、护肤、读书、娱乐等四十多个主题分类和1000多个论坛，囊括了网民生活的方方面面，已经成为中国互联网最具影响力，人气最高的互动社区，被业界公认为，中文第一社区。|
http://bbs.qq.com/|QQ论坛|||腾讯论坛是中国互联网历史最悠久，人气最旺的综合性中文论坛之一；它依托于全球最大门户网站腾讯网，已发展为腾讯旗下最大的开放式社区。主题内容涵盖时事、娱乐、体育、财经、汽车等各个领域。|
http://bbs.163.com/|网易论坛|||网易论坛,最贴近网友的综合性中文论坛,网络热点一网打尽!|
http://bbs.voc.com.cn/|华声论坛|||华声论坛每天新注册用户数2000多人，已经拥有360多万忠实注册会员，是国内最著名大型社区之一，位居全球中文论坛前十强。华声论坛特色栏目有贴图专区、辣眼时评、参考文摘、图说历史、网友自拍、绝美图库、特效绝美、音乐地带、驴友户外、搞笑图库、军事杂谈等|
http://www.xici.net/|西祠胡同|||西祠胡同（www.xici.net），是国内首创的网友“自行开版、自行管理、自行发展”的开放式社区平台，致力于为各地用户提供便捷的生活交流空间与本地生活服务平台。|
http://bbs.rednet.cn/|红网论坛|||论坛首页|
http://forum.home.news.cn/|新华网论坛||||
http://bbs.cntv.cn/|CCTV-论坛|||央视复兴论坛是以CCTV、CNTV为依托，以时事民生话题为焦点，具有电视媒体特色的综合论坛。复兴论坛现有民声、财经、娱乐、CCTV5体育等论坛，是央视人交流的最大网上社区。|
http://club.china.com/|中华网论坛|||以|
http://bbs.ifeng.com/|凤凰论坛||||
http://www.xilu.com/|西陆社区|||西陆网是中国第一军事门户网站，军事领域范围最广、军事内容最权威、军迷影响力最大、历史最久。为大国之崛起，关注中国军事利益，对比国际军事力量，探寻军事战略，解读军事战争历史，求索强国之路。|
http://pop.pcpop.com/|泡泡俱乐部|||泡泡俱乐部论坛是您沟通首选平台,在这里您能看到最新的生活科技类资讯,良好的互动体验让您和您朋友在这里畅所欲言,泡泡俱乐部为您的生活带来高品质体验|
http://club.dayoo.com/|大洋论坛|||首页|
http://bbs.qianlong.com/|京华论坛|||国务院新闻办公室批准的国内第一家拥有新闻发布权的重点新闻网站“千龙网”旗下论坛，立足首都北京、面向全国，高效有理传播网民声音，全心全意和您一起创造民间影响力。千龙网京华论坛，地道的北京论坛，全中国人民的论坛。|
http://bbs.people.com.cn/|人民网强国社区|||强国社区，全球最著名的中文时政社区，包括了强国论坛、强国博客、人民微博、人民聊吧、E政广场等众多综合性互动平台。这里有最爱国的声音、最深刻的评论、最开放的氛围。来这里，我们一起强国！|
http://www.19lou.com/|19楼论坛||||
http://bbs.dahe.cn/bbs|大河论坛||||
http://www.mop.com/|猫扑社区|||猫扑网是中国互联网流行文化发源地,以猫扑大杂烩、猫扑贴贴等互动产品为核心。猫扑网独特的文化气质吸引了大量锐意创新,乐观向上,具有时代代表性和生活主张的用户群体。|
http://www.newsmth.net/|水木社区|||源于清华的高知社群，象牙塔通向社会的桥梁|
http://bbs.21cn.com/|21CN社区||||
http://bbs.southcn.com/|南方社区|||南方社区，广东第一政民互动平台，广东省人民政府政务论坛、广东发展论坛、岭南茶馆、博客等众多综合性互动平台。一方水土一方人，青山秀水的养育，岭南文化的浸润，我们都热爱这片土地，我们都为她的发展建言献策！|
http://www.daqi.com/|大旗网|||中国最早的论坛聚合门户。提供中文论坛热门帖子、图片、视频聚合；提供web2.0消费指南，拥有汽车口碑榜、化妆品口碑榜、手机口碑榜、笔记本口碑榜、数码口碑榜|
http://bbs.huanqiu.com/|环球时报论坛|||,环球论坛|
','',''),
('5866','1','12','吉林医院|4|','','http://www.hdyanke.com/|吉林恒达眼科医院|||吉林恒达眼科医院 恒达 眼科 医院 长春最好的眼科医院 视神经萎缩 视网膜色素变性 黄斑变性 缺血性视神经病变 白内障 青光眼 结膜炎 近视 弱视|
http://www.jlsfcyy.com/|吉林市妇产医院|||吉林市妇产医院建院于1954年,是国家举办的非营利性妇产科专科医院,是医疗保险定点单位，隶属于吉林市卫生局领导，担负着吉林地区妇幼保健、医疗、科研、教学任务。地址在吉林市船营区光华路53号。占地面积8176.86平方米，建筑面积11679平方米。|
http://www.fengshi120.com/|长春中医学院风湿院|||长中风湿骨病医院|
http://www.jl.xinhuanet.com/shangye/zhongliu|吉林省肿瘤医院||||
http://www.viaear.com/|彭大夫耳病门诊|||专业前庭导水管扩大治疗中心-彭大夫耳病门诊，为耳部疾病患者开通免费咨询平台：维耳网，提供全面的前庭导水管扩大常识、前庭导水管扩大新闻以及前庭导水管扩大治疗方法等资讯，www.viaear.com-维护你的耳朵！|
http://www.fkyy123.com/|长春哪家妇科医院好||||
','',''),
('5863','1','12','山西医院|4|','','http://www.sxws.cn/|山西卫生信息网||||
http://www.t-dsyy.com/|太原市第四人民医院|||太原市第四人民（结核病）医院始建于1952年，占地面积13.2万平方米，固定资产8600 万元。集医疗、教学、科研于一体，主要诊疗范围包括结核病、呼吸系统疾病、胸部外科疾病、艾滋病、突发公共卫生疾病等。|
http://www.plthbyy.com/|平陆县中医瘫痪专科||||
http://www.yqxbdfyy.com/|垣曲县白癜风医院|||垣曲县白癜风医院位于山西垣曲县城，专治白癜风已有二十年时间，是全国唯一的一家规模最大的白癜风专科医院。现有床位200多张，配有五室二部二个科.白癜风患者咨询电话：0359-6023704|
','',''),
('5864','1','12','内蒙古医院|4|','','http://www.nmwst.gov.cn/|内蒙古自治区卫生厅|||内蒙古自治区卫生和计划生育委员会,内蒙古卫生计生委,内蒙古自治区卫生和计划生育委员会门户网站|
http://www.immc.edu.cn/|内蒙古医学院||||
','',''),
('5865','1','12','辽宁医院|4|','','http://www.204hsy.com/|沈阳二〇四医院|||沈阳204医院,热线电话024-88435495，为国家卫生部人类辅助生殖技术准入机构，是东北地区第一家卫生部批准的辅助生殖医疗机构， 引进国内外先进中心的管理和技术 ,可以开展不孕不育辅助生殖技术（夫精人工授精、供精人工授精、试管婴儿、卵胞浆内单精子注射、胚胎冷冻复苏、未成熟卵体外培养、冻卵、供精试管婴儿）.|
http://www.xkyy.com/|沈阳市胸科医院|||沈阳市第十人民医院|
http://www.dalian-tcm.com/|大连市中医医院|||大连市中医医院,大连中医医院|
http://www.dl3y.com/|大连市第三人民医院||||
http://www.dljhb.com/|大连市结核病医院||||
http://www.dmu-1.com/NEW.NET|大连医大附属一院||||
http://www.nb120.com/fzjg/liaoning/ln.asp|西安中医脑病沈阳分院部||||
http://www.cmu.edu.cn/|医科大学附属医院|||本网站是中国医科大学的官方网站。|
http://www.cyhospital.com/|朝阳市第二医院||||
http://www.dlzxyy.com/|大连市中心医院||||
http://www.eye024.com/|爱尔眼科医院|||爱尔眼科中国驰名品牌，中国首家上市医疗机构，全国连锁眼科医院。沈阳首家三级眼科医院，沈阳爱尔眼科医院是省、市医保、新农合定点单位。官方咨询电话：4000-500-666|
http://www.ly2hos.com/|辽阳市第二人民医院|||辽阳市第二人民医院_|
','',''),
('5852','1','12','重庆医院|4|','','http://www.cqwsj.gov.cn/|重庆市卫生信息网||||
http://www.cq2hospital.com/|重庆市第二人民医院||||
http://www.cqumssah.com.cn/|重庆医大附属二院||||
http://www.swhospital.com/|西南医院||||
http://www.xqhospital.com.cn/|新桥医院||||
','',''),
('5853','1','12','四川医院|4|','','http://www.fy114.com.cn/|成都市妇幼保健院||||
','',''),
('5854','1','12','贵州医院|4|','','http://www.5055.cn/|贵州省人民医院|||贵州省人民医院,省医,省人民医院,贵州医院,医院,在线咨询,医疗服务,健康,保健,医疗卫生,卫生系统|
http://www.czzyy.com/|常州市中医医院||||
http://www.fqey.com/|福泉市第二人民医院|||福泉市中医医院(第二人民医院)，位于发展中的福泉南市区——马场坪， 1997 年福泉撤县建市，我院由马场坪中心卫生院更名为福泉市第二人民医院（福泉市中医医院），它是福泉市唯一的一所以中医药治疗为主、中西并重、集医疗、护理、教学、科研、急救为一体的综合性医院， 担负着福泉市南片区急救任务。现有在职职工 110 余人，其中高、中级职称 30 余人。拥有固定资产 1000 余万元 , 万元以上医疗设备 50 余件（包括美国 GESytec1800plusCT 、美国柯达CR、MYLab50全数字化彩色多普勒超声|
http://www.qnzyy.com/|黔南州中医院||||
','',''),
('5855','1','12','新疆医院|4|','','http://www.xjrmyy.com/|新疆人民医院||||
','',''),
('5856','1','12','云南医院|4|','','http://www.yn-tcm-hospital.com/|云南省中医院||||
http://www.etyy.cn/|昆明市儿童医院||||
http://www.kmeye.com/|昆明眼科医院|||昆明眼科医院是1997年经昆明市卫生局批准执业的第一家眼科专科医院。医院属省市医保、新农合、居民医保定点医院；省政府“白内障光明工程”手术定点医院、昆明市侨联、五华区侨联指定的“归侨侨眷眼科诊疗医院”。|
http://www.ydyy.cn/|昆明医学院附属一院||||
http://www.ynbsyy.com/|保山市人民医院||||
','',''),
('5857','1','12','陕西医院|4|','','http://www.sxhealth.gov.cn/|陕西卫生网||||
http://www.mchsn.com/|陕西省妇幼保健院|||ok365.com---便民导航，是三六五集团旗下上网导航服务网站，我们始终致力于为用户提供最简单、最实用、最贴心的上网导航服务。我们的目标是致力发展成为中国领先的上网导航服务商|
http://www.sxcahosp.com/|陕西省肿瘤医院||||
http://www.sspph.cn/|陕西省第二人民医院|||陕西省第二人民医院首页|
','',''),
('5858','1','12','甘肃医院|4|','','http://www.zy120.com/|张掖市人民医院|||河西学院附属张掖人民医院︱临床医学院,张掖市人民医院,甘肃省张掖市人民医院,张掖人民医院,张掖|
http://www.8502222.com/|红十字会黄河医院||||
','',''),
('5859','1','12','湖南医院|4|','','http://www.21hospital.com/|湖南卫生信息网||||
http://www.hnzlyy.com/|湖南省肿瘤医院||||
http://www.hnsrmyy.com/|湖南省人民医院|||湖南省人民医院|
http://www.xiangya.com.cn/|中南大学湘雅医院||||
http://www.xy3yy.com/|中南大学湘雅三医院|||中南大学湘雅三医院|
http://www.vasculitis.net/|肖德安脉管炎专科||||
','',''),
('5860','1','12','湖北医院|4|','','http://www.hbws.gov.cn/|湖北省卫生厅||||
http://www.hbch.com.cn/|湖北省肿瘤医院|||湖北省肿瘤医院|
http://www.hbfy.com/|湖北省妇幼保健院||||
http://www.whyyy.com.cn/|武汉市第一医院||||
http://www.snakecure.com/|武汉升华蛇疗中医院||||
http://www.taihehospital.com/|十堰市太和医院|||十堰市太和医院始建于1965年，是一所集医疗、教学、科研、防保、急救、康复、培干为一体的综合性国家三级甲等医院。|
http://www.wdyy.com/|武汉市武东医院||||
http://www.whyyy.com.cn/|武汉市第一医院||||
http://www.xqhospital.com.cn/default.asp|新桥医院||||
','',''),
('5861','1','12','河南医院|4|','','http://www.hnszyy.com.cn/|河南省中医院||||
http://www.hnwsyl.com/|河南省卫生厅|||Health Infomation of Henan Organizing comprehensive survey and research of medical policies to analyze the reform and development of health system in Henan, developing governing policies in the field of medicine and health.|
http://www.zzgkyy.com/|郑州市骨科医院|||郑州市骨科医院(河南省红十字骨科医院):始建于1952年,是一所集医疗、急救、教学、科研、预防保健、康复为一体的三级甲等中西结合骨专科医院,是河南省中西医结合脊柱病诊疗中心、河南省关节镜诊疗中心，全国首家骨专科无痛医院。省、市“医保定点单位”，新型农村合作医疗定点医院。|
http://www.jzfybjy.cn/|焦作市妇幼保健院|||焦作市妇幼保健院 集妇幼保健、医疗、预防、教学、科研为一体，承担市辖六县（市）五区妇幼保健业务指导任务。为河南省“十佳”妇幼保健院、省新生儿重症救护网络焦作分中心、市孕产妇网络管理中心、市妇女儿童心理咨询治疗中心、妇女病防治中心、全市唯一的生殖医学中心。产科、妇科、儿科为市重点学科。小儿脑瘫康复治疗中心、生殖医学中心、医学保健为市级特色专科。|
http://www.jzsyy.com/|焦作市人民医院|||国家卫生部命名的“三级甲等”医院——焦作市人民医院是焦作市最大的综合性医院，全院占地6.2万平方米，建筑面积16万平方米，开放床位1500张。医院拥有一套较为完整的医疗、教学、科研、预防、保健、康复和急救体系。心血管外科为省级重点专科，神经内科专业为省级特色专科，心血管外科、心血管内科、神经内科、神经外科、血液内科、骨科、肾脏内科、耳鼻喉科、产科和急救学科系焦作市重点专科。|
http://www.cnjibing.com/|肌病肌萎缩治疗中心|||管城中医院健肌生肌疗法治疗肌肉萎缩,进行性肌营养不良,重症肌无力,肌营养不良,多发性神经根炎,肌炎,偏侧面肌萎缩,格林巴利,咨询电话400-0371-330|
http://www.xxszxyy.com.cn/|新乡市中心医院||||
','',''),
('5862','1','12','河北医院|4|','','http://www.hebwst.gov.cn/|河北卫生信息网||||
http://www.czrmyy.com/|沧州市人民医院||||
http://www.dmxrmyy.com/|大名县人民医院|||河北省大名县人民医院--　现新建大名县人民医院设办公室、政工科、医务科、护理部、药剂科、信息科、防感科、财务科、总务科、保卫科等10余个行管科室和神内、心内、呼吸内科、消化内科，普外、骨一科、骨二科、胸外，妇科、产一科、产二科，儿一科、儿二科，急救中心、中医科、耳鼻喉科、手术室、理疗科、皮肤科、眼科、门诊部等20余个临床科室以及检验科、放射科、CT室、B超室、心电工作站5个辅助科室。|
http://www.hbsxkyy.com/|河北省胸科医院|||河北省胸科医院，是华北地区最大的以诊断、治疗呼吸系统及结核病等胸部疾病为特色的省级公立三级医院，省市医保新农合定点医院，官方免费咨询预约挂号热线400-6323-120。|
http://www.hbydsy.com/|医科大学第四医院|||河北医科大学第四医院暨河北省肿瘤医院，是一所以诊治肿瘤为重点的集医疗、教学、科研、预防保健为一体的大型综合性“三级甲等”医院。河北省肿瘤研究所、河北省肿瘤防治办公室、河北省抗癌协会、河北省中日友好癌检诊中心均设在该院。|
http://www.psychal-hospital.com.cn/|河北省第六人民医院||||
http://www.ylyy.org/|河北以岭医院|||河北以岭医院是一所综合性三级甲等医院,为河北医科大学附属医院、河北省中西医结合医药研究院附属医院、省市医疗保险定点医院、省市级新农合定点医院、国家临床重点专科单位、国家工伤康复试点医院|
http://www.sjzsdyyy.com/|石家庄市第一医院||||
http://www.chinabloodinst.com/|石家庄平安医院|||Getting way too considerably sunshine can guide to skin cancer, which is among the most common cancers. Always go over your entire body and confront in|
http://www.xuekang.net/|河北无极血康医院|||血液病能治好吗？中医血液病网详细介绍血液病症状和血液病治疗知识,中医白血病治疗理念,儿童白血病,(再障)再生障碍性贫血,血小板减少,骨髓增生异常综合症等各型血液病的治疗,河北无极红十字血康医院咨询电话：0311-86508999.|
','',''),
('4659','2','1','数码综合|4|','','http://digital.pconline.com.cn/|太平洋数码|||太平洋电脑网数码世界栏目是集合所有数码产品的内容栏目,为用户提供各种数码产品的所有资讯,包括行情报价,导购评测,使用技巧,论坛交流等|
http://dcdv.zol.com.cn/|中关村在线数码|||数码相机资讯中心，提供数码相机新闻、数码相机价格、数码相机评测、数码相机参数、数码相机选购、拍摄技巧、免费美女图片、样片分析、网友外拍、索尼、三星、佳能、尼康、奥林巴斯、柯达、理光、富士、爱国者、数码相机行情等|
http://digi.it.sohu.com/|搜狐数码||||
http://tech.sina.com.cn/digi|新浪数码||||
http://digi.qq.com/|腾讯数码|||腾讯数码频道旨在打造灵活、创新、独立、有趣的原创产品资讯，为数码行业的高端人士们提供对新技术新产品的洞察，致力成为消费电子产品资讯爱好者及业内人士首选媒体。腾讯数码频道现包含手机、家电、智能硬件以及传统数码等主要频道，涵盖消费电子全产品线。|
http://digi.163.com/|网易数码||||
http://www.enet.com.cn/edigi/index.shtml|eNet数码||||
http://tech.huanqiu.com/|环球网科技|||环球网科技，不一样的IT视角！以“成为全球科技界的一面镜子”为出发点，向关注国际科技类资讯的网民，提供国际科技资讯的传播与服务。|
http://digital.yesky.com/|天极网数码|||数码频道重点产品涵盖数码相机, 数码摄像机, 数字电视, 数码随身听, mp3, mp4, 掌上电脑, pda等, 产品新闻报道及时深入, 产品评测专业公正, 导购指南丰富实用, 各类应用技巧专区, 融电脑家电一体, 面向广大数码爱好者以及数字生活体验者, 打造大众数码资讯传播平台,指导数字家庭消费和娱乐.|
http://digi.pcpop.com/|泡泡网数码||||
http://digital.it168.com/|IT168消费数码|||IT168数码频道向您提供最权威最专业的MP3/MP4、GPS导航仪、电子书评测,为您带来最新最准确的MP3/MP4、GPS导航仪、电子书资讯报价信息,给您带来最热卖的MP3/MP4、GPS导航仪、电子书,帮您更好的选购和使用MP3/MP4、GPS导航仪、电子书。|
http://www.beareyes.com.cn/|小熊在线数码|||小熊在线是在全国区域分布最广泛的IT类网站，内容涉及电脑硬件、数码、游戏、报价、下载、软件等电脑能够用到的一切。|
http://digi.pchome.net/|电脑之家-数码中心||||
http://www.it.com.cn/|IT世界网-数码|||IT世界网，中国IT第一资讯门户网站，旗下硬件、数码、笔记本、手机、下载、游戏等40个专业频道，每天为全国超过四百万的用户提供第一手IT资讯，全国各地最新报价，各类产品促销信息以及最专业的评测文章，为消费者，厂商，经销商提供一个信息共享，交流互动综合平台。|
','',''),
('4617','1','15','身体健康|4|','','http://yyk.99.com.cn/|医院查询||||
http://health.sohu.com/medisearch.html|疾病查询||||
http://health.sohu.com/health/drugsearch.htm|药品查询||||
','',''),
('4618','1','15','其它查询|4|','','http://car.autohome.com.cn/|汽车报价|||汽车之家汽车报价，为您提供2015最新最全的汽车报价信息，汇总所有品牌的热门车型、上市新车的最新报价、全国最低价格及各地报价优惠信息，汽车报价大全尽在汽车之家|
http://auto.sohu.com/s2004/weizhangchaxun.shtml|查违章车辆||||
http://www.sheup.com/chepaichaxun.php|车牌查询||||
http://law.baidu.com/mis/index|法律法规||||
http://www.mtime.com/showtime/|各地影讯||||
shenfenzhengchaxun.html|身份证查询||||
http://www.360hy.com/ourname|同名同姓查询||||
','',''),
('4662','2','1','数码品牌|4|16','','http://www.canon.com.cn/|佳能|||佳能公司是以光学为核心的相机与办公设备制造商，始终以创造世界一流产品为目标，积极推动事业向多元化和全球化发展。|
http://www.sony.com.cn/|索尼|||索尼（Sony）在中国网站，全面介绍Sony公司的各项业务.提供丰富的产品信息，包括数码相机，摄像机，笔记本电脑，电视系列，影音产品等以及售后服务和购买服务|
http://wwwcn.kodak.com/|柯达||||
http://www.olympus.com.cn/|奥林巴斯||||
http://www.samsung.com.cn/|三星|||三星手机等产品官方网站。想象三星能为您做什么？在这里您可以找到三星手机、三星笔记本、三星显示器、三星电视、三星数码相机、三星打印机、三星家电等三星产品官方介绍及服务支持信息。|
http://www.apple.com.cn/|苹果|||Apple 凭借 iPhone、iPad、Mac、Apple Watch、iOS、OS X、watchOS 等产品引领了全球创新。你可以访问网站，了解和购买产品，并获得技术支持。|
http://www.aigochina.com/|爱国者||||
http://www.iriverchina.com/|艾利和|||艾利和中国网站，为您带来最新最好的数码产品，让您享受全新的数码体验|
http://www.benq.com.cn/|明基|||你可以找到BenQ多元化的产品信息，包括投影机、液晶显示器、商用大型显示器（交互式、数字广告牌）、数码相机/摄像机、移动网络产品、LED 照明等，以及明基优惠活动、明基购买服务和明基售后服务信息等。BenQ用心帮你实现数字生活的崭新乐趣。|
http://www.nikon.com.cn/|尼康||||
http://www.fujifilm.com.cn/|富士|||富士在各种领域为社会服务创造和创新产品，并提供有效的解决方案，有助于生活质量，增强环境的可持续性。|
http://www.lenovo.com.cn/|联想|||联想官方网上商城,为您提供最新联想笔记本电脑,联想平板电脑,联想手机,联想台式机,联想一体电脑,联想服务器,联想外设数码产品,联想智能电视等产品在线购买及售后服务,您提供愉悦的网上购物体验|
http://www.tcl.com/|TCL|||TCL集团股份有限公司是中国最大、全球性规模经营的消费类电子企业集团之一。 TCL旗下有四家上市公司并形成五大产业。TCL创意感动生活|
http://www.toshiba.com.cn/|东芝|||东芝集团创立于1875年，致力于为人类和地球的明天而努力奋斗，力争成为能创造丰富的价值并能为全人类的生活、文化作贡献的企业集团，东芝集团业务领域包括数码产品、电子元器件、社会基础设备、家电等。|
http://www.oppo.com/|OPPO|||OPPO是一家全球性智能手机制造商和移动互联网服务商，让您随时了解OPPO手机官网,OPPO智能手机,,OPPO拍照手机OPPO新款手机,OPPO手机资讯等内容，为客户开创先进的智能手机产品和移动互联网服务。|
http://www.konicaminolta.com.cn/|柯尼卡美能达||||
http://www.meizu.com/|魅族|||魅族官网提供魅族MX系列和魅蓝note系列产品的预约和购买.提供最新魅族产品资讯、完善的售后服务、社区在线交流,手机固件/应用下载.|
http://www.epson.com.cn/|爱普生|||爱普生(Epson)在中国开展的业务主要有打印机、扫描仪、投影机等信息关联产品业务、电子元器件业务、以及工业自动化设备业务。其产品以卓越的品质和节能环保的特点，赢得了中国消费者的厚爱。|
http://www.thunis.com/|清华紫光||||
http://www.hp.com/|惠普||||
http://www.hitachi.com.cn/|日立||||
http://www.casio.com.cn/|卡西欧|||卡西欧（CASIO）在中国的官方网站，提供丰富的产品信息，包括数码相机，手表，电子乐器，计算器，电子教育和投影仪等以及客户支持服务。产品购买请上卡西欧官方商城|
http://www.sharp.cn/|夏普|||夏普公司是以诚意和创意作为经营宗旨的大型的综合性电子信息公司。自1912年创业以来，通过至诚与创新的工作，一直在为大家生活的提高和社会的进步作着贡献和努力。目前，夏普AQUOS液晶电视、手机、白色家电等产品均得到了市场的认可，深受消费者喜爱。|
http://www.founder.com/|方正|||方正集团现已发展成为旗下拥有北大方正信产集团、北大医疗集团、北大资源集团、方正金融、方正物产集团的投资控股公司。|
http://www.leica-camera.com/|徕卡|||Root Corposite|
http://www.boe.com.cn/|京东方||||
http://www.ricoh.com.cn/|理光|||理光中国的官方网站，介绍理光复印机，打印机，相机等产品信息，以及环保理念等相关信息。|
http://www.sigmaphoto.com.cn/|适马|||适马SIGMA中国(sigmaphoto.com.cn)为你提供适马镜头官价格,适马镜头大全,适马镜头评测对比,为您购买适马镜头提供最全面参考。推荐最好的适马镜头专卖店,拥有最全的适马镜头说明书,让你售后无忧。|
http://www.kyocera.com.cn/|京瓷||||
http://cn.creative.com/|创新|||CREATIVE创新科技总部位于新加坡，是研究多媒体，平板电脑和网络方面，专注Sound Blaster声卡，ZEN MP3播放器，ZiiO平板电脑等无线设备开发和生产的全球领导厂商。|
http://www.ramos.com.cn/|蓝魔||||
','',''),
('4616','1','15','星座命理|4|','','http://astro.sina.com.cn/fate/index.shtml|星座运程||||
http://health.sohu.com/bytalk/dream/|周公解梦1||||
http://www.51jiemeng.com/|周公解梦2||||
http://astro.httpcn.com/blood.html|血型性格||||
http://www.chinesezhouyi.com/computersm.html|网上算命||||
http://www.chinalong-wj.com/|居家风水||||
http://www.chinesezhouyi.com/wwsg.html|周易预测||||
http://www.zdic.net/appendix/f27.htm|择吉老黄历||||
http://www.hao123.com/haoserver/shuxing.htm|生肖属相||||
http://www.chinesezhouyi.com/freefate.html|更多免费算命||||
','',''),
('4615','1','15','网络科技|4|','','http://detail.zol.com.cn/|电脑价格|||中关村在线IT产品报价库提供所有IT产品最新最权威的报价，包括手机数码,、DIY配件、笔记本整机、网络设备、办公外设、数字家庭等IT产品最新报价，为您购买IT产品提供最有价值的参考。最新最权威的IT产品报价尽在中关村在线IT产品报价库-ZOL中关村在线|
http://tech.sina.com.cn/mobile/select/index.html|手机报价||||
IPdizhichaxun.html|IP地址查询||||
http://alexa.chinaz.com/|Alexa网站排名|||专业提供中文网站alexa排名查询服务。|
http://www.chinarank.org.cn/|网站排名|||中国网站排名网(www.chinarank.org.cn)是由中国互联网协会主办，国务院新闻办公室网络局、信息产业部电信管理局指导，北京华瑞网标信息技术有限公司提供技术支持的大型网站排名项目。中国网站排名网的主旨是按照客观、真实、公正原则，以网站访问流量统计数据为依据适时发布“中国网站排名”，是中国互联网协会把握互联网发展趋势、引导互联网行业发展、服务广大网民、服务政府决策的公益举措。|
http://www.net.cn/|域名查询||||
http://www.microsoft.com/protect/yourself/password/checker.mspx|微软密码强度测试||||
http://www.benmi.com/|域名工具||||
http://www.pctowap.com/|电脑上WAP网||||
','',''),
('6088','4','0','江西报刊|4|16','','','',''),
('6089','4','0','广西报刊|4|16','','http://www.gxnews.com.cn/|广西新闻网|||广西新闻网为网友提供全面快捷权威的综合新闻信息报道，包括广西新闻、国内国际要闻、体育娱乐新闻、社会生活新闻、东盟博览会新闻、房产、汽车、健康女性、IT等多类新闻服务|
http://ngzb.gxnews.com.cn/|南国早报||||
http://epaper.gxnews.com.cn/ddshb/|当代生活报||||
http://epaper.gxnews.com.cn/ngjb/|南国今报||||
http://www.nnrb.com.cn/|南宁日报||||
http://www.guilinlife.com/|桂林日报||||
http://www.gxylnews.com/|玉林日报|||玉林新闻网是中共玉林市委宣传部主管、玉林日报社主办的综合性新闻门户网站，关注广西玉林最新动态就上玉林新闻网。|
http://epaper.bsyjrb.com/|右江日报||||
','',''),
('6090','4','0','吉林报刊|4|16','','http://www.chinajilin.com.cn/jlrb/|吉林日报||||
http://www.chinajilin.com.cn/|吉林农村报|||中国吉林网是吉林省第一新闻网站,也是吉林省最大的地方资讯门户;提供吉林日报,城市晚报等多种数字报;每天发布大量有关吉林省,吉林人的新闻信息和专题,联系电话0431-88600622 0431-88600621|
http://www.dyxw.com/|吉和网||||
http://www.appliedwriting.com/|应用写作|||This is my page|
','',''),
('6091','4','0','云南报刊|4|16','','http://www.baoshandaily.com/|保山日报||||
http://www.yxdaily.com/|玉溪日报||||
http://www.cxdaily.com/|楚雄日报||||
','',''),
('6092','4','0','陕西报刊|4|16','','http://www.sxdaily.com.cn/|陕西日报|||陕西传媒网是经国务新闻办公室批准从事互联网新闻业务，由陕西省委宣传部主管的重点新闻网站，是《陕西日报》的媒体新业态。|
http://www.xawb.com/|西安日报|||西安新闻网是西安最具知名度和影响力的门户网站,xiancn下设西安、旅游、美食、教育、房产、长安文 化、原创镜头、魅力西安、韵味西安、时政、社会、陕西、科教、文化、娱乐、体育、健身、健康专题、政务、评论、社区、视觉、人物等频 道，拥有西安人气最旺的老城根论坛社区。是西安日报、西安晚报的官方网站，每天定期发布西安最新最权威的时政新闻信息平台。向世界介绍西安，展示西安，宣传西安，推广西安|
http://www.baojidaily.com/|宝鸡日报|||ePaper,电子报,数字报|
http://www.nkb.com.cn/|农业科技报|||全国农业科技综合门户，面向全国，服务三农|
http://www.xbxxb.com/|西北信息报|||西北在线主要提供在线西北新闻资讯和互动娱乐平台服务。直击西北新闻视点，提供西北发展商机，聚焦时事重大新闻，剖析社会现实问题|
http://www.lzbs.com.cn/|兰州新闻网-兰州日报|||兰州新闻网——是由兰州日报社主办，甘肃省人民政府新闻办公室、甘肃省通讯管理局批准，国务院新闻出版署、国家信息产业部备案的新闻类网站。网站全面准确发布《兰州日报》、《兰州晚报》新闻，及时反映兰州地区以及当前国内外重大热点、焦点问题。|
http://jcrb.gansudaily.com.cn/|金昌日报||||
http://plrb.gansudaily.com.cn/|平凉日报||||
','',''),
('6093','4','0','山西报刊|4|16','','http://www.tynews.com.cn/|太原新闻网-太原日报|||太原新闻网,山西省重点新闻网，了解太原的第一选择,太原市综合性门户网站，国务院新闻办批准的太原市唯一一家综合性新闻网站,太原,山西,新闻,太原日报,太原晚报,山西商报,视频,并州,龙城,山西,新太原论坛,文化,娱乐,时尚|
http://www.pinyinbao.com/|小学生拼音报|||汉语拼音网由小学生拼音报主办，《小学生拼音报》前身是《晋南拼音报》,创刊于1960年,是新中国最早的语言文字类专业报纸之一。汉语拼音网的宗旨是彰显拼音特色,服务素质教育,有效培养儿童的听说读写能力、创新思维能力和自主学习能力|
','',''),
('6094','4','0','内蒙古报刊|4|16','','http://www.nmgnews.com.cn/|内蒙古新闻网|||内蒙古新闻网，是国务院新闻办批准的内蒙古最大的综合性门户网站，是内蒙古地区覆盖面最广、影响力最大、信息量最大、浏览人数最多的新闻网站。内容包括内蒙古新闻、民族文化、道德法制、国内国际、文体娱乐，五大发布区域占领舆论制高点，将内蒙古各类新闻一网打尽；社会中心汽车、楼市、教育、金融、健康、美食、旅游、质监，八大行业频道服务大众；内蒙古12个盟市101个旗县地方网群，把内蒙古新闻触角伸向基层。|
http://www.soubaoad.com/newspaper/1494.shtml|内蒙古商报||||
http://www.nmgcb.com.cn/|内蒙古晨报||||
http://www.wuhaidaily.com/|乌海日报||||
','',''),
('5834','1','7','游戏童谣|4|','','http://www.76baobao.com/|齐乐儿歌网|||齐乐儿歌网收集海量的儿童歌曲、有声读物、儿童动画片、儿童FLASH、儿童游戏 、儿童学习资源，是免费儿童教育类公益网站。适合各年龄段儿童浏览和学习。|
http://www.xiaoyaya.com/|丫丫儿童乐园||||
http://www.060s.com/childrens/erge.php|小精灵儿童网-儿歌||||
http://www.chinababy.com/|中国娃娃儿童网||||
http://www.etgq.com/|儿童歌曲网|||儿童歌曲网是专业的儿歌试听及下载网站.目前总计约10余万首歌曲，收录了网上最新儿童歌曲及视频,是中国最大的儿童歌曲大全网站,也是您寻找儿歌的首选网站|
http://tonghua.webqun.cn/|童话故事网|||童话窝-最好的童话故事网,分享格林童话,安徒生童话,寓言故事,民间童话故事,神话童话故事,幼儿少儿童话故事,成语故事,短篇童话故事,外国童话故事等童话故事作品！|
http://www.gushi160.com/|少儿古诗歌曲集|||古诗新唱网站深受儿童父母、幼儿园、少年宫和中小学老师喜爱,多年来坚持为孩子和关心儿童早教的有识之士创作，在这里可以免费试听学唱朗朗上口易唱易记利于背诵演唱的古诗歌曲。这些古诗歌曲孩子们既可以独唱重唱合唱，也可以利用音乐曲调编排清新自然活泼可爱乐观向上的舞蹈，让孩子们轻松愉快的终生牢记古诗词|
http://www.aobi.com/|奥比岛|||奥比岛, 在一望无际的大洋上，有一个美丽神秘的奥比岛，小奥比们居住在里面，每天都发生一些好玩的故事。百田奥比岛官网联合4399奥比岛、7k7k奥比岛提供最新的任务攻略、图鉴内容，还有奥比秀展示和提问交流。|
http://www.61baobao.com/|六一宝宝|||61宝宝网原创和收集高清儿歌视频大全，儿童小游戏，儿童故事，儿童歌曲，儿童歌曲大全，儿歌童谣，经典儿歌，儿童动画片，儿童文学，儿童舞蹈。提供儿歌下载，儿歌mp3打包下载。是宝宝妈妈最喜欢的儿歌大全网站。独立自主开发的亲宝儿歌播放器是百度搜索开放平台合作伙伴。|
http://www.kisspopo.com/|亲嘴宝宝儿歌|||儿歌下载网提供最新mp3儿歌下载，包括经典的儿歌童谣，儿童故事，英文儿歌，唐诗宋词，儿童音乐，胎教音乐mp3，为准妈妈胎教和宝宝启智早教提供一个优良是视听环境，让妈妈在儿歌网找到想要的儿歌。|
http://www.tonghua123.com/|童话故事天堂||||
http://www.cnfla.com/|闪靓童网|||免费提供:儿歌大全100首&#124;儿童歌曲&#124;儿童故事&#124;儿童舞蹈&#124;儿童画&#124;儿童学习等资源, 闪靓童网是爸妈放心的儿童绿色公益网站！|
','',''),
('5850','1','12','广西医院|4|','','http://www.gxws.gov.cn/|广西卫生信息网||||
http://www.glrmyy.com/|桂林市人民医院|||桂林市人民医院|
http://www.glzyy.com/|桂林市中医医院||||
http://www.glwyy.com/|桂林市第五人民医院||||
http://www.lzgryy.com/|柳州市工人医院|||柳州市工人医院是一所集医疗、保健、科研、为一体的国家三级甲等医院、全国百姓放心示范医院、广西医科大学第四附属医院、卫生部国际紧急救援中心网络医院、柳州市医保定点医院。|
http://www.glmc.edu.cn/|桂林医学院||||
','',''),
('5851','1','12','海南医院|4|','','http://www.wst.hainan.gov.cn/|海南省卫生厅|||海南省卫生厅是主管全省医药卫生工作的省政府组成部门，负责贯彻执行党和国家卫生工作方针、政策和法规；拟定全省卫生事业发展的总体规划和计划，制定各项医疗卫生技术标准，并组织实施有关我省卫生工作的政策、规章制度。（办公地点：海口市海府路42号，邮政编码：570203）|
http://www.haikoumh.com.cn/|海口市人民医院|||湘雅二医院,中南大学湘雅二医院,长沙湘雅二医院,湘雅二医院网站|
http://www.hainmc.edu.cn/|海南省医学院|||海南医学院1993年经教育部（原国家教委）批准成立，隶属海南省人民政府主管，是海南省惟一的一所省属公办普通高等医学院校。学校前身是私立海强医事技术学校（1947年创建）与私立海南大学医学院（1948年创建）合并成立的海南医学专门学校及建国后续办的海南医学专科学校、海南大学医学部。学校1994年获准授予学士学位，1996年通过国家教委本科教学工作合格评估，2003年被教育部确定为联合培养硕士研究生单位，2005年通过教育部本科教学工作水平评估,结论|
http://www.hnfck.com/|海南妇产科医院|||海南妇产科医院建院21年，是海南省首家通过ISO国际质量认证体系的专科医院，世界卫生组织，联合国儿童基金会和中国卫生部联合授予的|
http://www.phhp.com.cn/|海南省人民医院||||
','',''),
('4341','0','1','电影下载|4|','','http://movie.xunlei.com/|迅雷影视|||迅雷看看电影频道是中国最新最热最全的高清电影免费在线观看第一频道，免费提供了欧美大片、华语大片、日韩电影、好莱坞大片等高清大片在线点播和下载，是中国最大最全的正版电影点播及发行平台。|
http://www.verycd.com/|VeryCD共享|||电驴大全，为你提供最多最全面的电影、电视剧在线观看导航。为自己喜欢的资料打分，畅玩最好玩的游戏，了解全方位的影视资讯、游戏动态。|
http://www.dytt8.net/|电影天堂||||
http://www.bttiantang.com/|BT天堂|||bt天堂为各位网友提供：1080p高清电影BT种子下载,720p高清电影BT种子下载|
','',''),
('4342','0','1','栏目头栏','','','<style type=\"text/css\">
<!--
#now_tv { width:800px; margin:0 0 10px 0; clear:both; }
#now_tv td { font-size:12px; text-align:left; overflow:hidden; }
#now_tv #now_tv_is { font-size:14px; font-weight:bold; color:#FF6600; }
-->
</style>
<script type=\"text/javascript\" language=\"javascript\">
<!--
function chaTV(obj, TVUrl, h) {
  try {
    $(\'now_tv_is\').id = \'\';
    $(\'now_tv_is\').title = \'\';
  } catch (err) {
  }
  try {
    obj.id = \'now_tv_is\';
    obj.title = \'当前播放\';
  } catch (err) {
  }
  $(\'TVFrime\').src = TVUrl;
  $(\'TVFrime\').height = h;
}
-->
</script>
<center>
  <table id=\"now_tv\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <tr>
      <td><a id=\"now_tv_is\" href=\"javascript:void(0)\" onclick=\"chaTV(this, \'http://app.aplus.pptv.com/tgapp/baidu/live/main\', \'534\');return false;\" title=\"当前播放\">PPTV</a> | <a href=\"javascript:void(0)\" onclick=\"chaTV(this, \'http://player.uusee.com/apps/baidu/index.html\', \'476\');return false;\">UUSee</a> | <a href=\"javascript:void(0)\" onclick=\"chaTV(this, \'http://www.iqiyi.com/mini/home800.html?app800&bd_user=486771605&bd_sig=88b3e763298e10d4b8f435064a74b6a2&canvas_pos=platform#pd%E9%A6%96%E9%A1%B5\', \'650\');return false;\">奇艺高清影视</a> | <a href=\"class.php?column_id=0&class_id=14\">更多影视频道&gt;&gt;</a></td>
      <td style=\"text-align:right;color:#006600;\">注：所有电视均可直接观看，如遇线程忙时可能提示下载插件，请尝试刷新页面解决</td>
    </tr>
  </table>
  <iframe id=\"TVFrime\" name=\"TVFrime\" width=\"800\" height=\"534\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"No\" allowtransparency=\"true\" src=\"http://app.aplus.pptv.com/tgapp/baidu/live/main\"></iframe>
</center>',''),
('4340','0','1','网络电视|4|','','http://www.pplive.com/|PPLive||||
http://www.pps.tv/|PPS|||PPS影音是全球影音软件领导品牌，集P2P直播点播于一身.能够在线收看高清电影电视剧、体育直播、游戏竞技视频、动漫视频、综艺视频、财经资讯视频播放流畅、完全免费,是网民喜爱的装机必备视频播放软件。|
http://tv.qq.com/|QQ直播||||
http://www.uusee.com/|悠视网UUsee|||UUSee悠视网-体育直播娱乐互动平台，全年85000场体育赛事，NBA直播、足球直播、体育直播、电视直播、娱乐节目、在线电影、电视剧、uusee客户端、uusee网络电视等,更多精彩内容尽在悠视网。|
http://www.zhibo8.com/|直播吧|||直播吧提供NBA直播,NBA直播吧,足球直播,英超直播,CCTV5在线直播,CBA直播,NBA在线直播,NBA视频直播,等体育赛事直播,我们努力做最好的直播吧|
http://www.51live.com/|我要直播|||51LIVE提供CCTV5在线直播,湖南卫视在线直播,江苏卫视直播,浙江卫视直播等电视直播。还提供NBA直播、足球直播、英雄联盟直播、电视剧和电影等视频直播服务。|
','',''),
('4339','0','1','视频短片|4|16','','http://www.youku.com/|优酷|||优酷-中国领先视频网站,提供视频播放,视频发布,视频搜索 - 视频服务平台,提供视频播放,视频发布,视频搜索,视频分享 - 优酷视频| · <a href=\"http://www.tudou.com/\">土豆</a>
http://www.ku6.com/|酷6网||||
http://www.56.com/|56网|||56网是中国最大的原创视频网站,免费上传搞笑逗趣生活视频，观看优质丰富的特色节目，关注感兴趣的原创导演和美女解说，快速分享及评论互动。|
http://www.6.cn/|六间房|||六间房是中国最大的真人互动视频直播社区。秀场视频直播间，支持数万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费与数万个美女主播在线聊天。|
http://v.sina.com.cn/|新浪播客||||
http://video.sohu.com/|搜狐视频||||
http://video.qq.com/|QQ播客|||腾讯视频致力于打造中国最大的在线视频媒体平台，以丰富的内容、极致的观看体验、便捷的登录方式、24小时多平台无缝应用体验以及快捷分享的产品特性，主要满足用户在线观看视频的需求。|
http://www.joy.cn/|激动网||||
http://www.xinhuanet.com/video|新华视频||||
http://www.smgbb.cn/|东方宽频|||风行提供高清电影及电视剧的免费在线点播，支持网络电视、在线电影点播、免费电影下载、在线网络电视、边下边看。采用全球最先进的P2P点播,高速流畅,高清晰度,上万部免费电影、网络电视、动漫综艺，每日更新,全球超过一亿两千万用户已经在使用了。|
http://media.17173.com/|17173游戏视频|||中国最专业的游戏视频平台，拥有丰富高质量的游戏视频供玩家欣赏，同时免费提供游戏视频上传、游戏视频分享服务。|
http://www.vodone.com/|第一视频||||
http://www.pomoho.com/|爆米花视频|||在爆米花，你可以分享视频给你的好友、同学、同事、家人，让他们随时了解你的动态同时还能获得不菲的现金收入，爆米花还为你提供一站式的在线娱乐服务，在美女秀场中与美女进行视频聊天和实时互动，各种类型的网页游戏和社交游戏应有尽有。|
http://v.zol.com.cn/|ZOL视频|||ZOL视频提供大量ZOL原创视频，包括科技节目视频、时尚新品视频、IT大事件视频、风云人物视频、展会活动视频、校园行、网友聚会等原创视频，周周新内容，期期都精彩尽在ZOL视频频道|
http://www.cuctv.com/|视友网|||视友网是微视频移动互联网平台,视频社交网络平台,其核心应用为国内首创在线校园直播、企业直播和视友空间.移动互联网新时代用视友在线网络微视频直播看世界.|
','',''),
('5833','1','7','母婴商城|4|','','http://www.leyou.com.cn/|乐友孕婴童||||
http://www.muyingzhijia.com/|母婴之家|||母婴之家是一站式专业母婴用品网上商城！|
http://www.supuy.com/|速普商城|||速普母婴商城-山东地区专业的母婴用品商城，主营惠氏，雅培，多美滋，美赞臣，好奇，花王，贝亲等多种品牌的母婴用品，安全放心，7天退换！速普商城为您提供便捷的一站式母婴商城购物体验，母婴用品购物就到速普商城，让您购物无忧！|
http://www.baiyjk.com/|百洋健康网|||百洋健康网网上药店是中国品类齐全、价格低100%正品保证的网上药店，药监局认证的合法网上药店，为您提供最便捷的网上药店服务，网上买药还有专业执业药师和健康资讯为您服务。|
http://shop.yunfubao.com/|孕肤宝||||
http://www.redbaby.com.cn/|红孩子母婴|||苏宁易购苏宁红孩子母婴用品商城（redbaby.suning.com）,热销全球优质品牌的母婴用品、孕妇奶粉、纸尿裤、尿不湿、进口奶粉、婴儿奶粉、婴儿用品、玩具,100%正品保证,超低价折扣促销,2000万妈妈购物首选！|
http://www.m6go.com/|麦乐购|||麦乐购海外母婴商城，跨境母婴电商提供全球优质品牌的进口奶粉，进口辅食，玩具，营养品，纸尿裤，喂养用品，化妆护肤品等全球精品，麦乐购专业致力于全球一站式购物，100%正品100%安全保证，中华保险正品承保，品牌授权海外采购，独有进口奶粉买9送2折扣多多。麦乐购进口母婴商城，连续三年销售、服务、口碑居跨境母婴电商榜首。|
http://www.waipowang.com/|外婆网|||外婆网是中国领先的网上孕婴用品商城，目前孕婴用品有超过100个著名品牌，16200多款孕妇、婴儿用品。天天有特价，全场免运费，退换货免运费，24小时在线客服，让您放心买到便宜的孕婴用品！尽享网上购物之趣！好孩子推车,好奇纸尿裤s60,nuk纸巾,贝亲棉花棒,帮宝适超薄干爽|
http://www.anngo.net/|安购母婴商城|||安购Anngo.net - 进口母婴用品商城，在线销售进口奶粉、宝宝辅食、洗浴护肤品、纸尿裤、孕妇用品等。全场包邮、顺丰配送、货到付款、中华承保，海外直邮代购在安购！|
http://www.motherbuy.com/|贝因美|||妈妈购官方网站是贝因美旗下专业母婴购物网站。妈妈购贝因美官方网站提供贝因美奶粉、贝因美奶粉价格,及其他食品营养喂养用品洗浴护肤服饰鞋袜童车床椅等.|
http://www.51ibaby.com/|英伦宝贝|||i-baby官方商城，不仅销售i-baby品牌下的抱毯,婴儿装，童装，新生儿服装，肚衣，新生儿礼包，益智玩具，布艺玩具，同时还代理MyBrest Friend，Silver Cross，Kissy Kissy，romina,Bambolina,Bratt Decor,Bloom,baby banana brushes,4moms,skip hop,stokke等国际高端婴童品牌的母婴用品/婴儿用品。|
http://www.234.cn/|益智堂||||
http://www.haohaizi.com/|好孩子|||好孩子官方商城为您和孩子提供最安全、最全面、便捷的购物服务以及最优质的生活体验。主要销售：婴儿推车、汽车安全座椅、婴儿床、儿童三轮车、学步车、自行车、电动车和儿童鞋服、洗护哺育用品等80多个品类、3000余款母婴、儿童商品。|
http://www.baobeigou.com/|宝贝购||||
http://www.kissbb.com/|今生宝贝||||
http://www.haiziwang.com/|孩子王|||孩子王孕婴童商城 - 父母孕育婴童的全方位支持者，提供各类奶粉、营养品、纸尿裤、婴幼儿服饰、玩具、妈妈用品等上万种优质特惠商品，均层层严格把关，件件精挑细选！同时提供货到付款等安全交易保障服务，让你轻松放心享受育儿乐趣！|
http://home.meiyuetao.com/|美月淘|||美月淘一家专门做预售的网站，立志成为定制化服务专家，为用户提供全国最专业的母婴产品月送服务，商品全部选用安全、绿色，同时被千万妈妈选用并推崇的品牌产品，给妈妈宝宝最天然的呵护。|
','',''),
('5831','1','7','儿童教育|4|16','','http://www.preschool.net.cn/|中国学前教育网|||中国学前教育网是学前教育专业网站。我们为幼儿、家长、幼儿教师、幼儿园园长和幼教企业提供专业资讯与服务,包括最新育儿资讯、幼教动态、教师教案、幼儿园管理案例、幼教项目招商、幼儿教师培训、幼儿园教材批发、幼儿图书销售等|
http://bbs.etjy.com/|儿童教育论坛|||儿童教育论坛|
http://www.tom61.com/|中国儿童资源网||||
http://www.jy135.com/|中国幼儿教育网|||中国幼儿教育网为幼儿教师提供幼儿园教案、幼教经验论文、幼儿园管理等专业知识。帮助家长正确认识幼儿教育以及科学对待幼儿教育，让孩子健康快乐地成长。|
http://xiazai.zol.com.cn/children_soft_index/children_page_1.html|儿童教育软件下载||||
http://www.zuowen.com/|中小学作文网|||作文网提供专业、原创中小学生作文，包括中考满分作文、高考满分作文、零分作文、优秀作文大全、作文素材、作文辅导、英语作文等，欢迎踊跃投稿。|
http://www.k12.com.cn/|中小学教育教学网|||K12教育空间|
http://www.fumubidu.com.cn/|父母必读||||
http://www.wawayaya.com/|wawayaya|||wawayaya 官方网站|
http://www.etyyy.com/|儿童英语乐园|||听歌学英语 学字母 学单词 卡通动画 音标|
http://www.xinzhitang.com.cn/|新知堂少儿英语网||||
http://www.jiajiao400.com/|家教网|||最专业的家教网★超过15万名真实家教信息,10万名注册家长,双方直接联络★特高级教师,名校大学生一对一上门辅导,免费试讲！无中介费用★全面覆盖北京上海等32座大中城市|
','',''),
('5832','1','7','素质教育|4|16','','http://www.youth.cn/|中国青年网|||中国青年网，1999年5月4日正式开通，共青团中央主办的中央重点新闻网站，是国内最大的青年主流网站。中国青年网竭诚服务青年的文化、心理、情感和创业需求，是共青团运用网络文化元素吸引青年的新载体和引导青年的新途径，为团组织通过新媒体融入青年提供有力支撑。 中国青年网拥有400余个子网站，2000多个栏目，用文字、图片、动漫、音视频、论坛、博客、微博、手机、网上直播等多种手段，依托共青团中央丰富的资源，每天向全球网民发布丰富多彩的信息，内容包括政治、经济、社会、文化、娱乐、时尚、教育、心理等各个领域。|
http://www.cydf.org.cn/|中国青少年基金会|||中国青少年发展基金会|
http://www.ccyl.org.cn/|中国共青团||||
http://daode.youth.cn/|青少年思想道德网|||青少年思想道德频道是在中央及地方重点新闻网站中唯一的以弘扬青少年道德文化为宗旨的网络平台，关注社会热点，复兴传统道德精粹，重塑正见真知，开创全新人文教育。|
http://www.tgedu.cn/|青少年素质培训||||
http://www.yejs.com.cn/|中国幼教网|||师乐汇,原中国幼儿教师网，为幼师免费提供丰富的幼儿园教案、课件下载、环境布置图片、自制玩教具等教学资源，以及幼师在教学过程中需要的幼儿园工作计划、工作总结、观察记录、教师随笔等文案，是中国最权威、最专业的集幼教资源和幼教社区为一体的幼教行业门户网站|
','',''),
('5830','1','7','亲子育儿|4|16','','http://baby.sina.com.cn/|新浪亲子中心|||新浪育儿是国内最权威、最专业的育儿知识网站。为准备怀孕，已怀孕妈妈及0-6岁的婴幼儿父母提供育儿百科、育儿宝典、育儿常识、育儿心得、儿童早期教育，小儿疾病查询及宝宝健康喂养、育儿专家问答、育儿专家视频、育儿论坛、育儿博客、育儿微博等科学育儿知识、服务和资讯。|
http://shaoer.cntv.cn/jianianhua/index.shtml|CCTV少儿频道||||
http://www.pckids.com.cn/|太平洋亲子网|||太平洋亲子网为家长们提供0-6岁各阶段孩子成长、教育、家庭和用品等全方位、多角度的各种实用资讯以及有关怀孕的各方面知识。 ……|
http://www.ci123.com/|育儿网|||育儿网为父母提供怀孕分娩,胎教,育儿,保健,喂养,常见病护理,早教知识.大容量的宝宝主页,育儿博客服务.还提供有声读物,儿歌,亲子游戏下载.为家长们提供了优秀全面的一站式育儿服务|
http://kid.qq.com/|腾讯儿童|||陪养大于培养，有陪伴才真童年；我们致力于打造儿童创造力衍生平台(CDI)，为儿童提供最干净纯粹的儿童社区。|
http://www.goodbaby.com/|好孩子|||好孩子育儿网，值得信赖的专业育儿网站。全方位提供准备怀孕、怀孕期、宝宝0-6岁育儿知识。拥有实力最强的育儿专家团队，全程陪伴宝宝成长。内容涵盖|
http://www.babytree.com/|宝宝树|||大型育儿网站社区，提供育儿博客、10G超大空间免费电子相册、在线交流育儿论坛等服务，为准备怀孕、怀孕期以及0-6岁的婴幼儿父母提供育儿知识与育儿问答等内容。|
http://www.yaolan.com/|摇篮网|||摇篮育儿网，国内最为专业的育儿门户网站:为准备怀孕、怀孕以及0-6岁的婴幼儿父母提供最权威最全面最实用的育儿知识、育儿产品和早教服务，是科学育儿必选网站！|
http://www.0-6.com/|妈妈说|||妈妈说育儿社区包括怀孕、胎教、育儿、早教等专业知识。让您轻松和300万妈妈共同交流怀孕育儿经验，分享亲子教育快乐的母婴社区。为您的宝宝成长提供健康快乐的交流平台。|
http://www.9ye.com/|9ye育儿园|||育儿园,九叶网为幼儿园与家庭提供互动交流平台,电子杂志,明星宝宝,宝宝相册,宝宝视频及个性空间尽显宝宝才华,父母和老师通过家庭教育,学前教育网络学习,分享育儿经验,家园共育,轻松培养奇才宝宝|
http://www.060s.com/|小精灵儿童网站||||
http://www.78baby.com/|趣吧贝贝|||宝宝最喜欢的儿童flash,妈妈最放心的儿童网站_78baby趣吧贝贝，提供宝宝主页、儿童动画、教育、学习卡以及0-6岁的婴幼儿父母提供育儿信息与知识等内容。|
http://www.seedit.com/|播种网|||播种网是中国第一备孕服务网站,提供科学备孕,初次怀孕,早孕反应等各种实用知识,以及有关备孕成功经验,怀孕和试管婴儿的各方面资讯。|
http://www.chinakids.com.cn/|中国儿童网||||
http://www.zaojiao.com/|中国早教网||||
http://www.12anmo.cn/|小儿按摩网|||小儿推拿培训与服务第一品牌，提供小儿推拿培训(职业班、妈妈班)、葫芦娃小儿推拿门店服务、小儿推拿加盟、小儿推拿&新生儿推拿网络课堂等，设有小儿推拿商学院和研究院。电话010-58896259；QQ：800055412|
http://www.babydao.com/|宝贝岛|||宝贝岛：为江西省0-6岁的婴幼儿父母提供关于备孕、怀孕、育儿、早教、购物等育儿交流互动平台。|
http://www.qqbaobao.com/|亲亲宝宝育儿网|||亲宝网是专业的育儿网站,提供:育儿知识,育儿论坛,育儿问答,宝宝主页,妈妈博客,亲宝儿歌等内容。是国内知名的专业母婴网站,旗下拥有专业的儿歌网站61宝宝网及多吉多莉和咕力咕力等原创卡通形象|
http://baby.39.net/|39健康育儿|||39健康育儿频道是国内领先的育儿亲子网站，为年轻的父母或准爸爸准妈妈提供丰富的育儿知识，育儿论坛涵盖怀孕、分娩、胎教、早教、母乳喂养、宝宝健康等育儿热门话题。|
http://www.babyschool.com.cn/|中国育婴网|||中国育婴网创建于2002年，是国内最早成立的母婴网站之一。网站以“传播科学育儿知识，成就幸福家庭”为己任，平台上汇集了国内外众多从事科学育儿工作的专家、学者、教授、医师资源，为全国8000万的年轻父母们提供专业的“生、养、教”咨询和指导；中国育婴网亲子俱乐部是年轻父母孕期及亲子活动的互动平台，提供公益讲座、宝宝展示、线下活动、免费试用、公益分享等相关服务|
http://www.qbaobei.com/|亲亲宝贝|||亲亲宝贝网--中国最专业的育儿网站。爱的小家，学习．记录．分享。儿歌童谣、宝宝小家、育儿文萃、亲子论坛、网上商城等多个频道各具特色。这里是孕育希望的摇篮，让每一位充满爱意的父母，带着宝宝畅游知识的海洋，让爱回归大众。|
http://baobao.sohu.com/|搜狐母婴频道||||
http://www.bb06.com/|小脚印亲子网|||小脚印亲子网：福州妈妈首选的备孕、怀孕、宝宝、育儿、早教、妈妈集市等育儿、亲子交流平台，汇集福州美食、购物、情感、生活、便民等互动交流。小脚印亲子网，福州最火的妈妈社区，快乐的育儿生活，福州妈妈自己的网站！|
http://www.mmbang.com/|妈妈帮|||为什么身边的妈妈都加入了妈妈帮？①找到了组织，和有经验的人聚在一起 ②建宝宝小楼，这是送给宝宝最好的成长纪念 ③参加线上线下的活动，宝宝从小不孤单 ④获得最优惠、实用的消费情报…|
','',''),
('5819','1','3','汽车资讯|4|16','','http://www.pcauto.com.cn/|太平洋汽车|||太平洋汽车网下设汽车报价,汽车评测,以及新闻、导购、维修、保养、安全、汽车论坛、自驾游、汽车休闲、汽车文化等方面的内容,为中国汽车排名第一的综合汽车网站,提供最权威,最全面的车型数据、参数、配置、报价、相关新闻和图片等|
http://www.xcar.com.cn/|爱卡汽车网|||爱卡汽车网为您提供最新汽车报价、汽车图片、车型资料、汽车论坛、汽车资讯信息,XCAR-爱卡汽车网是全球最大的汽车主题社区,其中包括85个主流品牌车型俱乐部,国内32个省市和地区分会,36个特色讨论区|
http://auto.sina.com.cn/|新浪汽车|||新浪汽车为您提供汽车报价,汽车图片,汽车视频,汽车价格及车型信息,每日更新上千条汽车新闻和报价。汇集国内外所有汽车品牌,是中国规模最大、内容最全、影响力最大的汽车专业网站。新浪汽车第一时间报道新车上市信息，新浪汽车同时提供便捷的汽车搜索,实用的购车指南。是网友购车、用车、爱车的最佳选择。|
http://auto.163.com/|网易汽车|greenword||网易汽车_易乐车生活:为您提供最新最全汽车导购,汽车报价,汽车图片,汽车行情,汽车试驾,汽车评测,是服务于购车人群的汽车资讯门户|
http://www.autohome.com.cn/|汽车之家|||汽车之家为您提供最新汽车报价，汽车图片，汽车价格大全，最精彩的汽车新闻、行情、评测、导购内容，是提供信息最快最全的中国汽车网站。|
http://auto.sohu.com/|搜狐汽车||||
http://auto.qq.com/|腾讯汽车|||腾讯汽车，为您提供最新最快的车市行情，最全面的购车指导及车型信息，旨在成为中国最具影响力、规模最大、内容最全的汽车专业网站，是网民获取汽车资讯的最佳选择。|
http://auto.tom.com/|TOM汽车|||TOM网发布最新汽车报价、高清汽车图片,并且TOM网提供最及时的汽车资讯、汽车行业信息,最精华的新车、购车、用车、汽车文化、二手汽车尽在TOM网|
http://auto.china.com/zh_cn|中华网汽车频道||||
http://www.chelink.com/|新锐车网||||
http://www.chetx.com/|汽车天下|||沈阳搜房网房天下是中国最大的房地产家居网络平台，提供全面及时的房地产新闻资讯内容，为所有楼盘提供网上浏览、业主论坛和社区网站，房地产精英人物个人主页，是国内房地产媒体及业内外网友公认的全球最大的房地产网络平台，搜房网引擎给网友提供房地产网站中速度快捷内容全面的智能搜索。|
http://www.bitauto.com/|易车网||||
http://auto.huanqiu.com/|环球网汽车|||环球网汽车频道真实、客观、准确的报道全球汽车新闻，拥有英、日、韩专业编译团队实时报道团队，提供全球150国家和地区用户的购车、养护、保险等最新资讯。|
http://auto.21cn.com/|21CN汽车频道|||21CN汽车频道是华南第一门户网站旗下专业汽车频道,提供最翔实的新车资讯,最实用的购车手册,最热辣的汽车图片,最刺激的汽车视频|
http://www.webcars.com.cn/|万车网||||
http://www.che168.com/|CHE168|||二手车之家是中国访问量最大,二手车源信息最真实,最值得信赖的网上二手车交易市场,提供二手车评估,二手车报价,二手车资讯等相关服务,买卖二手车就上二手车之家|
http://auto.mop.com/|猫扑汽车频道|||猫扑汽车频道依托于猫扑网，是汽车领域的先锋观点发源地、伴随年轻奋斗者的购车决策平台。车型数据化的内容体系、先锋观点的原创文章、网友购车点评及经验分享。同时还与人人网联合成立“人人汽车”平台，使猫扑汽车得到有效的渠道延伸。|
http://www.autofan.com.cn/|汽车之友|||汽车之友为您提供最权威试车，汽车图片，新车大全，最及时的汽车新闻、行情、评测、以及全面的导购内容，汽车之友是发行量最大的汽车杂志，汽车之友网也是提供信息及时全面的中国汽车网站。|
http://www.52che.com/|我爱车|||我爱车汽车网是中国第一汽车口碑评论网站,下设汽车口碑专区,汽车博客报,汽车报价,评测,试驾,导购,以及新车报道,汽车口碑榜,口碑指数,维修保养,论坛,汽车用品,图片库和汽车百问等购车用车内容|
http://www.ieche.com/|爱意汽车||||
http://www.xincheping.com/|新车评网|||新车评网是最专业的汽车评测导购网站，为您提供最专业的汽车评测，汽车试驾报告，专家在线导购，更有数万网友用车经验和汽车口碑。看车、买车请先上新车评网！|
http://www.xgo.com.cn/|XGO汽车网|||汽车点评提供最新汽车报价,行情导购,评测试驾,二手车及汽车图片,为用户打造选车购车,维修保养,口碑问答等精选内容,创建第一个汽车类社交网络平台.|
http://www.t139.com/|汽车改装网|||T139汽车改装网为您提供真实的汽车改装案例和汽车改装配件信息，同时还提供改装车图片欣赏、音响改装、外观改装、轮毂改装、动力改装、改装视频、改装车友会等信息，最全的汽车改装信息尽在T139汽车改装|
','',''),
('5817','1','2','食疗养生|4|','','http://www.shiliao.com.cn/|食疗网|||中国食疗网，专业的食疗健康资讯门户网站，第一食疗健康门户网站。提供最专业、完善的健康信息服务，包括疾病，保健，健康新闻 ，专家咨询，病友论坛，男科，妇科，育儿，性爱，心理，整形，减肥，药品，急救，中医，美容，饮食，健身，医院查询，医生查询，疾病查询，药品查询，疾病自测等频道。|
http://shiliao.59120.com/|中健网-食疗频道|||中健网食疗养生频道,包含有大话食疗,疾病食疗(心血管病,胃肠疾病,肝胆疾病,内分泌病,肿瘤食疗),养生之道,两性食疗,饮食保健,食疗美容,吃遍天下,明星食经,老年饮食等板块。|
http://ill.51ttyy.com/shiliao|天天营养网-健康食疗||||
http://www.cnkang.com/zyzy/yssl/Index.html|中华康网-食疗频道||||
http://www.17shiliao.com/|一起食疗网|||一起食疗网-您的食疗养生专家,这里有全面的食疗养生知识,养生常识,健康常识。通过食疗养生,中医食疗,食疗菜谱,食疗美容,食物相克,食品安全,饮食禁忌等多方面的内容帮助大家养成健康的饮食习惯,有效的预防各种疾病,在这里您也可以成为一个养生专家,为大家分享自己的食疗养生经验。|
','',''),
('5818','1','2','栏目头栏','','','<!--iframe src=\"http://www.hao123.com/menu\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" height=\"2486\" scrolling=\"no\" style=\" margin-top:-143px;\"></iframe-->
',''),
('5823','1','3','汽车配件|4|16','','http://www.car2100.com/|中国汽车用品网||||
http://www.auto-p.hc360.com/|慧聪网汽车配件行业|||慧聪汽车配件网隶属于慧聪网(股票:HK8292)是全国汽车配件领先的B2B汽配电商平台,以媒体优势纵览汽配业前沿,以及汽配零部件供求信息,解读新汽配技术更新换代,尽在其中!|
http://www.autosup.com/|中国汽车用品在线|||汽车用品，汽车装饰，汽车美容，汽车服务连锁，汽车用品批发，中国汽车用品在线为中国最早的汽车用品在线销售平台，中国领先的汽车用品网上商城门户平台，同时建立全国壹捷汽车服务连锁体系，包含汽车用品供应、汽车装饰、汽车美容、快修保养、汽车改装、车主服务等在内的品牌连锁体系，北京，上海，杭州，广州，天津|
http://www.chebao360.com/|车保网|greenword||车保网是国内领先的汽车保养品网购平台，让养车变的简单，聪明车主首选，100%正品原厂配件，服务热线：4000-228-168|
http://www.toowell.com/|特维轮|redword|||
http://www.qipei.com/|中国汽配网||||
http://www.all2car.com/|全球汽配网||||
http://www.qp365.net/|全球汽配采购网||||
http://www.auto-a.hc360.com/|慧聪汽车用品网|||慧聪汽车用品网是汽车用品行业门户网站,提供权威的汽车用品资讯与开放的汽车用品交易信息,开展汽车用品供需见面会、汽车用品高峰论坛与汽车用品展览等汽车用品市场活动。|
http://www.auto-m.hc360.com/|慧聪汽车维修保养网|||慧聪网汽保设备工具网行业频道是集产品信息、行业信息、技术信息、人物访谈、产品专题、技术专题、求购信息、供应信息、产品动态、企业动态、市场动态分析于一体的专业汽车维修保养行业网站。让您足不出户做生意，了解行业内最新资讯信息|
http://www.motor.hc360.com/|慧聪摩托车网|||摩托车行业―hc360慧聪网 慧聪网摩托车频道是摩托车行业的门户网站之一,拥有丰富的行业资讯和广大的摩托车经销商配件用品供应商,是商家信息发布和交易的网络平台|
http://www.qipei.hc360.com/|慧聪汽车配件网|||慧聪汽车配件网隶属于慧聪网(股票:HK8292)是全国汽车配件领先的B2B汽配电商平台,以媒体优势纵览汽配业前沿,以及汽配零部件供求信息,解读新汽配技术更新换代,尽在其中!|
','',''),
('5814','1','2','饮食综合|4|','','http://www.dianping.com/|大众点评网|||中国城市消费指南 餐馆美食、购物、休闲娱乐、生活服务、活动优惠打折信息。大众点评网是中国第一家也是领先的web2.0式的本地搜索门户。商户的信息和评价全部由会员共同管理和维护。|
http://www.meishichina.com/|美食天下|||美食天下是最大的中文美食网站与厨艺交流社区，拥有最多的美食做法、菜谱、食谱大全以及家常菜菜谱，同时美食天下是聚集百万美食爱好者的美食家社区，欢迎您的加入！|
http://www.fantong.com/|饭统网|redword|||
http://www.bettyskitchen.com.cn/|贝太厨房|||贝太厨房，中国最具人气的一站式美食厨艺生活门户。提供海量原创菜谱、大众食谱，权威饮食指导；分享上万道好吃易做的家常菜做法，享受美食乐趣，分享美食经验，带您做出生活好味道|
http://www.fancai.com/|饭菜网|||饭菜网提供菜谱大全,家常菜谱,包括中外各大菜系的做法;集美食资讯, ,饮食健康等为一体的行业资讯站,为您提供家常菜的做法,让你足不出户吃遍各种美味美食。|
http://www.lingshi.com/|中国零食网|||中国零食网是休闲食品商城,24小时提供：好吃的零食,零食团购,零食加盟,进口零食,零食特产,低热量零食,健康零食等各种更多休闲食品；正品保证,让您尽享美味安全食品！|
http://shenyang.koubei.com/|口碑网-餐饮休闲||||
http://eat.sina.com.cn/|新浪美食|||新浪美食博客,美食达人的汇聚地,最具原创精神的网络美食家园,为您提供简单实用,图文并茂的美食博文,详细的美食制作指南,世界各地特色美食荟萃,以及生活百科，家常菜谱,北京菜,鲁菜,川菜,湘菜,湖北菜,江浙菜,粤菜,东北菜,西北菜|
http://chihe.sohu.com/|搜狐吃喝||||
http://food.39.net/|39健康饮食频道|||39饮食频道介绍了饮食保健、饮食营养、饮食烹饪、美食、饮料等内容，包括饮食文化、茶、酒、中华饮食等和饮食相关的细节栏目。|
http://www.zhms.cn/|中华美食网|||欢迎来到中华美食网,中华美食网为您提供美食菜谱大全,美食视频教学指南,家常菜谱,特色美食,健康饮食资讯等,是美食爱好者必上的网站,是中国饮食餐饮行业知名品牌。|
http://food.poco.cn/|POCO中国美食网||||
http://www.gudumami.cn/|咕嘟妈咪||||
http://www.fancai.com/yingyang|食物营养成分表||||
http://www.greatchef.com.cn/|名厨网|||名厨网是国内首家服务于专业厨师的分享交流平台，业内顶级名厨的汇集地。名厨网注重食材探索，菜品创新，新店的发掘。通过千万厨师的分享，致力打造一个有层次、有品位、有号召力厨界交流平台！|
http://www.51ttyy.com/|天天营养网||||
http://www.jx09.com/|嘉兴第九区|||嘉兴第九区是嘉兴人的生活消费互动社区，提供了嘉兴人吃、穿、住、行各类消费经验。|
http://www.foodstar.com.cn/|亨氏-福达鲜活健康|||亨氏福达官网介绍了旗下味事达产品，如味事达味极鲜酱油、味事达味极鲜蚝油、味事达味极鲜豆豉辣椒酱以及广合产品，广合腐乳、芝麻油等产品特色。还推荐了各式大厨健康菜谱，加入食尚享乐会即可轻松得一周菜谱美味。味事达味极鲜酱油富含第一道酱油原汁，令菜肴鲜活健康好味道！广合腐乳则特有细滑、鲜香，还有蚝油，芝麻油、豆鼓辣椒酱为你的菜肴添新色！|
http://www.mocook.com/|妙客美食网|||要请客，找妙客,订餐中心400-050-8877！济南最大最全餐厅指南，专业领先的餐饮预订服务平台，提供全面详实的中高档餐厅环境、菜品图文信息、餐厅点评等，支持电话订餐，网上订餐，手机订餐。|
','',''),
('5815','1','2','菜谱大全|4|','','http://www.meishij.net/|美食杰|||美食杰 - 中国最优质的美食，食谱，菜谱网。做你最喜爱的美食网，菜谱网。提供最人性化的菜谱大全,食谱家常菜，家常菜谱大全的美食网,让人们在宣泄的都市中体验在家常做菜,享受美食的乐趣.找家常菜谱,上美食杰菜谱美食网|
http://www.haochi123.com/|123美食网菜谱|||专业的美食菜谱、电子菜谱、视频菜谱、图解菜谱、美食分享。|
http://plum.blog.sohu.com/|梅子的写食日记||||
http://www.meishichina.com/|美食天下|||美食天下是最大的中文美食网站与厨艺交流社区，拥有最多的美食做法、菜谱、食谱大全以及家常菜菜谱，同时美食天下是聚集百万美食爱好者的美食家社区，欢迎您的加入！|
http://www.xinshipu.com/|心食谱||||
http://www.chinacaipu.com/|中国菜谱网|||中国各地菜谱,外国菜谱,家常菜谱,创意美食等菜谱知识的专业网站。|
http://www.shrimp.org.cn/|煲汤食谱网|||煲汤食谱大全为你收集儿童煲汤、孕妇煲汤、壮阳补肾煲汤、强身润肺煲汤、美容养颜煲汤、减肥瘦身煲汤、益气理血煲汤、滋阴润燥煲汤、补心安神煲汤、润肺清热煲汤、康复食疗煲汤等汤煲美食的做法|
http://www.fancai.com/|饭菜网|||饭菜网提供菜谱大全,家常菜谱,包括中外各大菜系的做法;集美食资讯, ,饮食健康等为一体的行业资讯站,为您提供家常菜的做法,让你足不出户吃遍各种美味美食。|
','',''),
('5816','1','2','茶/酒水|4|','','http://www.lao9.com/|老酒商城||||
http://www.zuipin.cn/|醉品商城||||
http://www.wangjiu.com/|网酒网|||网酒网是专业进口葡萄酒红酒网站，致力于国际一流进口葡萄酒,法国红酒品牌的销售，传递最新国际葡萄酒动态,葡萄酒专业课程培训，提供葡萄酒窖藏,红酒收藏投资服务|
http://www.shi78.com/|食尚网||||
http://www.maichawang.com/|买茶网||||
http://www.maidangao.com/|好利来|||好利来实体店蛋糕外送,在线下单,立即派送，防腐剂0添加，好利来授权专卖好利来实体店蛋糕，全国1000多家分店,400-700-5999|
http://www.ganso.com.cn/|元祖食品|||元祖食品-元祖官网是专注于食品礼品业著名网站,为顾客打造一流的线上购物体验,订购热线:400-110-3737,在这里不仅与线下实体店同步,足不出户就能享受宅配到家服务。|
http://www.yiguo.com/default.aspx|易果网||||
http://www.maimaicha.com/|买买茶||||
http://www.gjw.com/|购酒网||||
http://www.lingshi.com/|中国零食网|||中国零食网是休闲食品商城,24小时提供：好吃的零食,零食团购,零食加盟,进口零食,零食特产,低热量零食,健康零食等各种更多休闲食品；正品保证,让您尽享美味安全食品！|
http://www.jiuxian.com/|酒仙网|||【酒仙网】酒水在线销售专业品牌，提供白酒、红酒、洋酒、保健酒、黄酒、酒具、正品等多种品类，官方授权在线销售，各类酒水团购、秒杀不断。|
http://www.wine9.com/|品尚红酒|||品尚红酒&品尚汇主营葡萄酒、啤酒、保健品、生鲜、巧克力、食品等品类。品尚红酒网专注于进口红酒、葡萄酒、法国红酒、法国葡萄酒、波尔多红酒、西班牙红酒、西班牙葡萄酒、澳洲红酒、美国红酒、智利红酒、意大利红酒、干红葡萄酒等多个国家上千个红酒品牌。|
http://www.hecha.cn/|和茶网|||和茶网精选全国各地优质茶叶、茶具、保健茶等茶产品，并邀请知名专家进行质量把关，让用户方便快捷的购买到性价比高的茶叶、茶具、保健茶等茶产品，更有时尚热卖茶叶：铁观音、普洱茶；和茶网茶叶商城茶叶价格全场特 惠满98元免运费。|
http://www.womai.com/|中粮我买网|||中粮我买网，世界500强中粮集团旗下食品网上购物网站。全部商品品质保证，严格把关保质期，支持货到付款，中粮我买网是网购用户首选的B2C网上购物商城。|
http://www.winenice.com/|酒美网|||JiuMei酒美网-中国专业的进口葡萄酒直购服务平台，葡萄酒满100免运费，全国货到付款！酒美网从以经营法国葡萄酒，法国红酒为主，扩大到经营全球红酒，全球各大葡萄酒品牌，为广大酒葡萄酒爱好者提供全方位的服务。|
','
',''),
('4251','0','8','金山游戏|4|','','http://sh.xoyo.com/|水浒Q传||||
http://cq.xoyo.com/|春秋Q传|||春秋神魔争霸凡人飘飘欲仙，亲，Q传神仙打架了，我们也一起来休仙哦|
http://jx.xoyo.com/|剑侠情缘|||金山剑侠情缘，金山原创武侠网络游戏官方网站，提供官方新闻公告，官方权威攻略，最新活动消息以及玩家交流文选。|
http://fs.xoyo.com/|封神榜|||封神榜为您提供游戏下载、官方新闻、官方公告、官方消息、游戏资料、攻略、客户服务、玩家互动、玩家照片、优惠充值、注册账号、问题解答和最及时的游戏活动信息。准确、及时、官方及诸多资源是您查看游戏所有消息的最佳途径。|
http://fs2.xoyo.com/|封神榜2|||封神榜2官网,封神榜2官方网站,封神榜2,封神榜2主页,封神2官网活动专区为您提供07以来封神举办过的线上线下活动一览，您可以在这里查询到封神榜2举办活动的所有记录。|
http://jxsj.xoyo.com/|剑侠世界|||《剑侠世界2》是西山居剑侠情缘系列2D收山之作，在优化剑侠情缘系列前作众多核心功能点的同时，利用全新引擎打造极致2D画面质感特效。游戏玩法方面更是力创全新网游模式，进行全面小米化改造，提出|
http://jx3.xoyo.com/|剑侠情缘网络版叁|||《剑网3》周年庆典火爆开启，机甲骑宠免费放送，秘境、日常通通额外奖励，还有双倍玄晶掉率！限定版披风外观惊艳上架，7.9折扣券疯狂派送！|
','',''),
('4252','0','8','QQ游戏|4|','','http://sg.qq.com/|QQ三国|||《QQ三国》是腾讯公司自主研发的第一款2D横版MMORPG游戏，精美细腻的游戏场景，清新悠扬的古典背景音乐，可爱搞笑的骁勇悍将，唯美绚丽的动作特效，还原经典的三国战役，将带您体验无与伦比的战斗乐趣、为您重塑忍俊不禁的奇幻三国。|
http://ffo.qq.com/|QQ自由幻想|||QQ自由幻想 幻想 官方网站 首页 引导 免费 永久 QQ Q版游戏 自由体验 免费|
http://r2.qq.com/|QQ音速|||《QQ音速》是一款音乐与竞技完美结合的经典网游，可爱的3D人物、绚丽多姿的造型，塑造出百变个性。节奏竞速、策略道具、华丽舞蹈等多种游戏模式为你带来无限欢乐，全球总玩家8000万，马上来挑战你的指尖急速吧。|
http://qqhx.qq.com/main.html?fromid=21mmo_index_smallpic|QQ华夏||||
http://speed.qq.com/|QQ飞车|||《QQ飞车》是首款腾讯自主研发的竞速类休闲网络游戏，底层架构基于世界领先的物理引擎PhysX，游戏手感全面超越市场同类产品，全力为用户打造逼真的驾驶体验；3D时尚人物造型、古朴潮流幻想的赛道主题、第三人称尾随视角，力求为用户营造身历其境的感觉。在2011年的5月，最高同时在线帐户数突破200万，乃中国网游史上第九款同时在线冲破百万大关的产品，并为全球游戏市场奉献了第一款同时在线破百万的竞速类网络游戏，同时，也使腾讯拥有了第一款同时在线破百万的自主研发产品。|
http://fo.qq.com/|QQ幻想|||QQ自由幻想 QQ幻想 引导 免费 永久|
http://qqtang.qq.com/|QQ堂|||QQ堂官方网站|
http://xunxian.qq.com/|寻仙||||
http://cf.qq.com/|穿越火线|||腾讯游戏《穿越火线》下载官方网站。300万人同时在线，三亿鼠标的枪战梦想。《穿越火线》追求的不仅仅是开枪的爽快感，而是来自相互合作及默契带来的战略意义。最新活动尽在CF官方网站。|
http://dnf.qq.com/|地下城与勇士|||《地下城与勇士》DNF下载官方网站。《地下城与勇士》是由腾讯代理引进的一款超人气格斗网游作品，WCG2011年DNF中国区总决赛一起超越格斗极限。|
http://x5.qq.com/|QQ炫舞|||《QQ炫舞》下载官方网站。最时尚浪漫的舞蹈游戏，260万人同时在线陪你一起舞动青春。QQ炫舞有着最丰富的模式和玩法，最浪漫的交友平台，最华丽精美的画面表现，最紧跟潮流的版本开发迭代节奏，持续不断的为千万炫舞玩家，提供着最优质的游戏体验！更有全新真人视频秀平台炫舞梦工厂助您实现明星梦！|
http://nana.qq.com/|QQ飞行岛|||QQ飞行岛是全球首款飞行射击休闲网络游戏,采用飞行射击的战斗方式,同时融入卡片收集系统,道具合成系统,宠物成长系统,房屋系统等RPG要素,为玩家打造了一个全新概念的休闲网游！|
http://sl.qq.com/|丝路英雄|||丝路英雄官方网站|
','',''),
('4250','0','8','九城游戏|4|','','http://at.the9.com/|王者世界|||第九城市官方网站 The9|
http://www.muchina.com/|奇迹|||Find domain names, web hosting and online marketing for your website -- all in one place. Network Solutions helps businesses get online and grow online with domain name registration, web hosting and innovative online marketing services.|
http://sun.the9.com/|奇迹世界|||第九城市官方网站 The9|
http://joyxy.the9.com/|快乐西游||||
http://www.wofchina.com/|名将三国|||最新电影-最新电视剧-湖南卫视直播-婷婷影视-西瓜影音在线观看|
','',''),
('4248','0','8','久游游戏|4|','','http://au.9you.com/|劲舞团|||劲舞团 突破78万同时在线 休闲网络游戏的王者|
http://xj.9you.com/|仙剑奇侠传Online|||互动娱乐社区2.0，娱乐时尚尽在久游|
http://sdo.9you.com/|超级舞者||||
http://rc.9you.com/|光线飞车||||
http://mf.9you.com/|宠物森林||||
','',''),
('4249','0','8','网易游戏|4|','','http://www.wowchina.com/|魔兽世界|||访问魔兽世界中文官方网站，获取最时事的魔兽世界官方动态，参与丰富的魔兽世界官方活动，查阅最权威丰富的魔兽世界资讯|
http://xyq.163.com/|梦幻西游|||梦幻西游2，网易回合制网游旗舰，西游题材扛鼎之作；2.5亿注册用户， 271万玩家最高在线，每周有新服开放。人物和画面超可爱、轻轻松松交朋友！|
http://xy2.163.com/|大话西游II|||新大话西游2，全新国人精品RPG网络游戏。全新人物属性、全新召唤兽玩法、全新剧情和画面、更有全服混战PK和海战副本玩法等多项革新。2014，让故事继续|
http://xyw.163.com/|大话西游外传|||《大话外传新篇》是网易唯一免费无商城网游，继承大话系列正统2D回合血脉，于2014年8月迎来六周年庆典。秉承“回归游戏本质快乐“理念，推出”逆生长“计划，带领玩家回归轻松无压游戏感受。|
http://tx2.163.com/|天下贰|||《天下3》是网易自主研发的国风幻想3D网游。展现了一个雄奇壮丽、异彩纷呈的逼真虚拟世界，突破传统网游！在全新资料片中，玩家可以与顶级BOSS齐聚交锋，计谋与硬实力的双重碰撞，顶级配音阵容，电影级听觉与视觉享受！玩法上不仅推出了无属性压制、高自由度的门派比武，更有敦煌全息动态场景新副本、定制化门派轻功等你纵横天地间！|
http://popogame.163.com/|泡泡游戏||||
http://ff.163.com/|飞飞|||《新飞飞》新资料片“异域远征军”火热上线。跨服去见隔壁老王，待客有美味辣条、昨晚的100块和魔鬼滑板鞋，还送火影忍者和海贼王手办哦！|
http://xy3.163.com/|大话西游3|||大话西游3，中国最经典爱情网络游戏，由网易公司自主研发运营。人、妖、仙三大种族，24个主角任你选择，打造爱情网游史诗神话，使你如临仙境，为爱西行！邀请好友回归大话3，还有海量经验和极品道具。|
http://www.flamesky.com/|雅燃-非流行音乐||||
','',''),
('4247','0','8','盛大游戏|4|','','http://bnb.sdo.com/|泡泡堂|||泡泡堂-盛大网络|
http://kart.sdo.com/|疯狂赛车|||盛大在线是中国领先的互动娱乐内容运营平台。利用便捷的销售网络、完善的付费系统、广泛的市场推广网络、强大的技术保障系统、领先的客户服务、稳妥的网络安全系统为用户提供高水准的服务，为合作伙伴创造价值。|
http://mxd.sdo.com/|冒险岛||||
http://bfo.sdo.com/web3/home/|热血英豪||||
http://rich.sdo.com/|盛大富翁||||
http://ac.sdo.com/|霸王|||盛大在线是中国领先的互动娱乐内容运营平台。利用便捷的销售网络、完善的付费系统、广泛的市场推广网络、强大的技术保障系统、领先的客户服务、稳妥的网络安全系统为用户提供高水准的服务，为合作伙伴创造价值。|
http://chd.sdo.com/homepage.asp|彩虹岛||||
http://mir2.sdo.com/|热血传奇||||
http://fy0.17173.com/|风云武魂传说||||
http://pao.sdo.com/|超级跑跑|||《超级跑跑》中国大陆地区官方网站。超级跑跑是全球首款3D休闲竞速赛跑网游，以赛跑为主，集跳跃、攀藤、翻滚、游泳、滑雪等为一体，首创接力、生存挑战模式……前所未有的丰富元素迅速征服中国、韩国、香港、台湾、泰国等众多亚洲玩家。|
http://ct.sdo.com/|苍天OL|||World Zero即盛大“零”世界，将是首款以用户创造世界的网络游戏平台。零世界的寓意以：“无生有，有生万物，世界从新诞生的过程”，标志着盛大对于网络游戏产品的新格局的诞生的憧憬与期盼。|
http://1000y.sdo.com/|千年3|||《千年3》是在韩国Actoz公司开发的千年系列游戏的基础上，由盛大网络进行后续研发和独家运营的一款纯正武侠风格的大型多人在线角色扮演网络游戏。它架构出一个精彩纷呈的古代武侠虚拟世界。通过修炼各种相生相克的武功，闯荡江湖体会游戏乐趣，并成武林霸主、一代宗师来造就这恩怨不息的千年江湖。|
http://aion.sdo.com/|永恒之塔||||
','',''),
('4246','0','8','栏目置顶|4|','','http://popkart.tiancity.com/homepage/|<img src=\"writable/__web__/images/0_8/ng_01.jpg\" /> <br>跑跑卡丁车||||
http://au.9you.com/|<img src=\"writable/__web__/images/0_8/ng_02.jpg\" /> <br>劲舞团|||劲舞团 突破78万同时在线 休闲网络游戏的王者|
http://www.zhuxian.com/|<img src=\"writable/__web__/images/0_8/ng_zx.gif\" /> <br>诛仙|||《诛仙3》新春狂欢进行时！天书新卷开启终极秘境；封神“天罡”横空出世；十万大山探寻神装奥秘！十五大职业再现光彩，灵境战场打破数据鸿沟。系列新春装备火热上市，线上狂欢等你参加！|
http://xyq.163.com/|<img src=\"writable/__web__/images/0_8/ng_04.jpg\" /> <br>梦幻西游|||梦幻西游2，网易回合制网游旗舰，西游题材扛鼎之作；2.5亿注册用户， 271万玩家最高在线，每周有新服开放。人物和画面超可爱、轻轻松松交朋友！|
http://www.wowchina.com/|<img src=\"writable/__web__/images/0_8/ng_05.jpg\" /> <br>魔兽世界|||访问魔兽世界中文官方网站，获取最时事的魔兽世界官方动态，参与丰富的魔兽世界官方活动，查阅最权威丰富的魔兽世界资讯|
http://zt.ztgame.com/|<img src=\"writable/__web__/images/0_8/ng_06.jpg\" /> <br>征途|||《征途》是上海巨人网络科技有限公司第一款自主研发的网络游戏，这款2D大型多人在线角色扮演类网游，始终扮演着行业“创新者”的角色。给玩家发“工资”的运营创新、“无区界”自由跨服的“技术创新”、“大百科全书”的玩法创新，促使《征途》注册用户和同时在线人数一路飚升，成为全球第三款同时在线超百万的网络游戏。|
http://wd.gyyx.cn/download/|<img src=\"writable/__web__/images/0_8/ng_07.jpg\" /> <br>问道||||
http://rxjh.17game.com/|<img src=\"writable/__web__/images/0_8/ng_08.jpg\" /> <br>热血江湖|||《热血江湖online》是一款以中国武侠为背景的卡通风格网络游戏，在画面以及系统上都比以往的网络游戏有所突破。《热血江湖online》是根据韩国同名的畅销漫画改编的网络游戏，它拥有其他游戏没有的故事情节以及庞大的世界观。《热血江湖online》一上市就引起了广大用户的热烈欢迎，尤其是《热血江湖online》宣布免费运营后，在短短的几个月内，游戏的同时在线人数就突破了20万！|
http://dnf.qq.com/|<img src=\"writable/__web__/images/0_8/dnf_01.gif\" /> <br>地下城与勇士|||《地下城与勇士》DNF下载官方网站。《地下城与勇士》是由腾讯代理引进的一款超人气格斗网游作品，WCG2011年DNF中国区总决赛一起超越格斗极限。|
http://www.tl.sohu.com/|<img src=\"writable/__web__/images/0_8/ng_tlbb.gif\" /> <br>天龙八部|||《新天龙八部》全新版本纵情四海即将揭晓，亲朋好友齐聚江湖，多重夏季活动持续更新，暑期福利天天放送，热力引爆整个夏天！入驻新服，秒享多项特权；社交体系全面进化，让天龙成为你的生活方式，情燃七月，四海天下！|
','',''),
('4253','0','8','完美游戏|4|','','http://www.world2.com.cn/|完美世界|||《完美世界》官网，《完美世界》首创飞行系统、形象自定义系统！爽快PK、恢弘城战、拥有私人家园、15大副本。内容丰富，好玩不贵！|
http://chibi.wanmei.com/|赤壁|||《赤壁-王者归来》7月20日新版上线，三国的全新历史即将续写！战场全新升级、究级神器现世、图鉴套装系统震撼开启，千元礼包上线即领！期待你的王者归来，再创赤壁奇迹！|
http://www.zhuxian.com/|诛仙|||《诛仙3》新春狂欢进行时！天书新卷开启终极秘境；封神“天罡”横空出世；十万大山探寻神装奥秘！十五大职业再现光彩，灵境战场打破数据鸿沟。系列新春装备火热上市，线上狂欢等你参加！|
http://rwpd.wanmei.com/|热舞派对||||
http://kdxy.wanmei.com/|口袋西游|||口袋西游“大圣的梦境”官方网站，全新实时渲染动画引擎，一部可以玩的动画片！还你一个真实的西游，大圣的梦境震撼上线，化龙空战、千变万化2012最火爆的Q版3D动画网游|
http://w2i.wanmei.com/|完美国际|||《完美国际2》是完美世界出品的国内3D玄幻唯美扛鼎大作,千万玩家挚爱的网络游戏,7月15日 血战!金银岛 即将震撼开启公测.六大种族十二大职业驰骋完美大陆,无缝大地图海陆空全3D激爽战斗,邀你体验!|
http://wulin2.wanmei.com/|武林外传|||旗舰级Q版3D网游巨作《武林外传·号令江湖》，秉承了《武林外传》原作轻松、幽默的风格，为玩家展现一个内容丰富的喜剧武侠世界。|
http://sgcq.wanmei.com/|神鬼传奇|||《神鬼传奇》是完美世界投入巨资历时两年时间倾力打造的国内首款魔幻探险网游。玩家将扮演来自世界各地的探险者，亲历亚特兰蒂斯、百慕大三角、埃及金字塔、复活节岛、秦始皇陵等众多神秘遗迹，寻找西方神话中众神散落的灵魂。世界领先的Cube Engine 3D引擎将完整还原秘境探险的独特魅力。魔幻探险，神鬼至尊！|
','',''),
('4254','0','8','综合网游|4|16','','http://popkart.tiancity.com/homepage/|跑跑卡丁车||||
http://www.lineage2.com.cn/|天堂II||||
http://zt.ztgame.com/|征途|||《征途》是上海巨人网络科技有限公司第一款自主研发的网络游戏，这款2D大型多人在线角色扮演类网游，始终扮演着行业“创新者”的角色。给玩家发“工资”的运营创新、“无区界”自由跨服的“技术创新”、“大百科全书”的玩法创新，促使《征途》注册用户和同时在线人数一路飚升，成为全球第三款同时在线超百万的网络游戏。|
http://wd.gyyx.cn/download/|问道||||
http://www.srocn.com/|丝路传说||||
http://www.fsjoy.com/|街头篮球||||
http://jr.ztgame.com/|巨人|||命运之轮是现代战争网游《巨人》的最新版本资料片，已于2012年5月开放中将军衔，同时进行游戏的一系列优化和改进，让玩家游戏更顺畅，福利更丰厚。|
http://dg.mop.com/|帝国争霸|||《帝国争霸》是一款以人类、矮人、兽人三个种族为了自己民族的成功，屹立在帝国之巅为背景的英雄养成、策略战争类大型网页游戏。无需下载客户端，只要打开浏览器即可免费游戏，2009年最火爆网页游戏。|
http://sg.iyoyo.com.cn/|三国群英传||||
http://xd.xoyo.com/|反恐行动|||反恐行动MAT是金山第一款3D射击类网游。反恐行动MAT官方网站为您提供最新最权威的游戏新闻公告活动消息、客户端更新包下载以及玩家文选视频、壁纸原画截图等。|
http://sx.baiyou100.com/|兽血沸腾||||
http://yx.91.com/|英雄无敌Online|||《英雄无敌在线》中文官方网站，十年单机经典，育碧独家授权，再现四系魔法，八大种族，56类兵种史诗战场，千元礼包上线即领，诚邀英雄归来！|
http://www.yuyan.com/|预言Online||||
http://zf.91.com/|征服|||《征服》新资料片“功夫之王”开启热血PK模式！新职业踢馆？谁怕谁？不服来战！iPhone6、特权礼包送送送！|
http://ldj.sohu.com/|鹿鼎记|||《鹿鼎记》历时四年打造即时跨服超人气网游。画面卡通绚丽，玩法丰富多彩，一人三职、服务器对抗、跨服无限制PK、自由建设城邦。|
http://ddt.duowan.com/|弹弹堂|||YY弹弹堂|
http://www.gamebto.com/|商业大亨|||商业大亨官方网站 - 商业大亨OnLine  -  新商业大亨官网 - 2012年最火爆的模拟经营网页游戏 – 最高60万人同时在线！|
http://www.henhaoji.com/|梦想世界|||广州多益网络科技有限公司，以自主研发和运营网络游戏及互联网产品为主要业务，中国十大网游研发以及运营公司之一，目前运营多款自主研发免费回合制游戏，神武，神武手游和梦想世界。另外，还推出了《诸神》、《梦想帝王》、《梦想世界》手游、《梦想世界2》等多款具有持续盈利能力的网游。|
http://pet.mop.com/|猫游记||||
http://www.7fgame.com/|三国争霸|||起凡游戏是上海起凡数字科技有限公司的官方网站，旗下拥有起凡平台、11对战平台两大游戏平台，游戏包括群雄逐鹿10V10、三国争霸5V5、修真世界、真三国乱舞、三国伏魔、三国英魂、守卫剑阁、黑暗三国、借东风、起凡社区、金戈铁马、终极火力EF等|
http://www.sanguosha.com/|三国杀|||三国杀是一款风靡中国的智力卡牌桌游，以三国为背景、以身份为线索、以武将为角色，构建起一个集历史、文学、美术、游戏等元素于一身的桌面游戏世界，已经推出PC版、手机版等产品。|
http://sg.dipan.com/|兵临城下|||《兵临城下》是一款策略类网页游戏，融合了丰富的三国历史背景。利用先进的webgame（即网页游戏）技术，让用户从视觉、玩法、方便性上面得到空前的游戏享受！|
http://5jq.woniu.com/|舞街区|||《舞街区》是蜗牛数字推出的一款时尚前卫的舞蹈游戏，游戏以唯美写实的精美画面著称，时尚新潮、另类前卫的游戏设计理念，辅以真实唯美的3D画面风格，呈现出一个充满音乐与舞蹈的现代感十足的梦幻大都市。舞街区有着丰富的舞蹈模式和玩法，互动的交友平台，真实的街舞舞蹈动作，炫酷时尚的服装、称号等，为千万玩家提供优质的游戏体验！|
http://t.mop.com/|天书奇谈|||《天书奇谈》是由猫扑网历时两年自主研发并运营的新生代Q版神幻网游，是国内首款在网页上运行的大型2D回合制MMORPG。该游戏以清新可爱的Q版元素作为游戏设计主轴，人物造型及游戏画面生动细致，回合制战斗场景节奏明快，游戏整体性动感十足。|
http://www.r2online.cn/|R2||||
http://kl.kunlun.com/login/|昆仑||||
http://dol.17173.com/|大航海时代||||
http://www.star07.com/|星尘传说||||
http://www.xba.com.cn/|xba篮球经理||||
http://yx.xunlei.com/|迅雷英雄||||
http://www.travian.cn/|部落战争Travian|||成為羅馬、高盧 和 條頓中的戰略之王！|
http://www.wushuangol.com/|真三国无双ol|||《真·三国无双Online》是由日本光荣公司出品，周杰伦代言，上海天希网络技术有限公司 TCI（TC internet）在中国运营的全球第一款竞技类网游。游戏画面优美，技能华丽震撼，操作爽快淋漓。是动作网游中的完美之作。2010年9月全新资料片“真武霸业”。6级武器，无双武将服饰，角色美容，无双的世界精彩纷呈。公司即将引进的《光之冒险》（NOSTALE）由张翰代言。|
http://50.catv.net/|武林群侠传|||“武林群侠传”系列网游第三部，全新究级续作《新武林群侠传》隆重登场。作为《武林群侠传OL》和《武林群侠传2》的改版新作，《新武林群侠传》充分融合前作的精华内容，同时全面响应两岸玩家的游戏心声，本着最人性化的原则进行大胆创新和升华完善，从而成为这一经典系列网游的最新巅峰大作。《新武林群侠传》以打造“全民福利网游”为核心理念，并通过更加震撼的3D画面特效以及独创的“究级副本”等创新内容，为广大玩家带来“遵循经典”更“体验非凡”的游戏享受，引领玩家进入“武林群侠”世界的全新时代。|
http://bo.sohu.com/|刀剑|||《刀剑英雄》全新资料片“遗忘之城”9月11日火热开启！全新战场邀你来战！|
http://kx.91.com/|开心online|||《开心》用玩笑精神述说新仙事,你可以体验最时尚,最无厘头,最CUTE的网游生活.Q版视觉,养成系统,副职技能,前所未有的DIY宠物,互动社区功能以及最爽的懒人系统,你都能在《开心》里领略到!|
http://sg.9wee.com/|武林三国|||《武林三国》是一款大型战争策略类网页游戏。多变的战争谋略，丰富的将领养成，气势恢弘的据点争夺，助您踏上争霸天下之路。建设城池，发展军队，发动战争，一统天下！|
http://yxd.21mmo.com/|英雄岛||||
','',''),
('5874','1','12','青海医院|4|','','http://www.ktmh.com/|青海省塔尔寺臧医院||||
http://www.qhrch.com/|青海红十字医院|||本系统集手机站、微信站、电脑站三站合一，各站数据同步|
','',''),
('5875','1','12','香港医院|4|','','http://www.tungwah.org.hk/|东华三院||||
http://www.yanchai.org.hk/|仁济医院||||
','',''),
('5876','1','12','澳门医院|4|','','http://www.kwh.org.mo/|澳门镜湖医院||||
http://www.ssm.gov.mo/|澳门行政区卫生局||||
http://www.uni-care.com.mo/|仁康牙医诊所||||
','',''),
('5877','1','12','台湾医院|4|','','http://www.ch.com.tw/asp/home.asp|启新诊所||||
http://www.cych.org.tw/cych|嘉义基督教医院||||
http://www.mmh.org.tw/|马偕纪念医院||||
http://www.show.org.tw/|秀传医疗体系||||
http://www.vghtpe.gov.tw/|台北荣民总医院||||
http://www.wanfang.gov.tw/|台北市立万方医院||||
','',''),
('5878','1','12','医学研究|4|16','','http://www.med66.com/|医学教育网|||医学教育网-正保旗下中国超大型国家医学考试网站,常年开展:临床,中医,口腔执业医师考试培训班,执业药师,卫生资格考试辅导班,屡创中国医学考试网上辅导通过率奇迹！同时也提供中国卫生人才网和国家医学考试中心最新考试报名动态。|
http://www.clinet.com.cn/|检验医学信息网||||
http://www.aijk.com/|爱健康网||||
http://www.cma.org.cn/|中华医学会||||
http://www.csnm.com.cn/|中华核医学专业网||||
http://www.shouxi.net/|中华首席医学网||||
http://www.zgmryx.com/|中国美容医学网||||
http://www.kq88.com/|口腔医学网|||KQ88口腔医学网是中国创建最早、认知度最高的口腔医学综合性专业网站，是最专业的口腔学习交流平台。|
http://www.cem.org.cn/|中华急诊网||||
http://www.med126.com/|医学全在线|||医学全在线/医学考试网-提供2015年国家医学考试网报名时间及国家医学考试中心网考试时间,2015年中国医学教育考试网站执业医师报名入口,医学考试在线网培训课程,医学生网上家园-执业医师考试报名时间/医学职称考试网/医学高级职称考试网|
http://www.medkaoyan.net/|医学考研网|||医学考研网是中国最专业的医学考研信息网站.提供医学考研报考指导,西医考研,考研大纲,考研复试,考研调剂,专科考研等内容.下载最全医学考研资料,就在医学考研网!|
http://www.tnbz.com/|甜蜜家园糖尿病网|||糖尿病信息交流网站,包括糖尿病治疗咨询,口服降糖药的方法,糖尿病饮食食谱,如何预防并发症,以及怎样购买血糖仪,如何使用胰岛素注射笔,血糖监测的方法,低血糖的预防与处理等|
http://kbtkbt.com/|北京康本堂中医研究院||||
','',''),
('5879','1','12','国外医院|4|','','http://www.ahd.com/|美国医院指南||||
http://www.nhs.uk/|英国国民健康保健|||Information from the National Health Service on conditions, treatments, local services and healthy living.|
http://www.childrenshospital.org/|波士顿儿童医院|||Boston Children’s Hospital ranked #1 childrens hospital from U.S.News &amp; World Report -  See how we are working until every child is well.|
http://www.athp.jp/|日本明石土山病院||||
http://www.rikshospitalet.no/|挪威国立医院||||
http://www.brighamandwomens.org/|BrighamHospital|||Brigham and Womens Hospital in Boston, Massachusetts, is one of Americas Best Hospitals.|
http://www.harthosp.org/|HartfordHospital||||
http://www.flhosp.org/|FloridaHospital||||
http://www.hospitalcompare.hhs.gov/|HHS-Hospital||||
http://www.massgeneral.org/neurology/index.asp|SzentJánosKórház||||
http://www.tbh.net/|RegionalHospitals||||
http://www.everybody.co.nz/|NewZealandHospitals||||
','',''),
('5880','1','12','艾滋病防治|4|','','http://news.tom.com/hot/aizibing/index.html|艾滋专题-TOM||||
http://news.sohu.com/s2005/05aizibingri.shtml|艾滋专题-sohu||||
http://news.sina.com.cn/pc/aids2005/index.shtml|艾滋专题-sina||||
http://www.aids-china.com/|艾滋中国网|||艾之网做为国内最早的专业艾滋病咨询服务平台,具有10多年的艾滋病服务经验.为恐艾的朋友提供最专业可靠的解答,本站提供雅培、艾博、爱卫唾液等可靠的艾滋病检测试纸,完善的售前售后服务和全国货到付款为您保证检测安全可靠|
http://www.chain.net.cn/|全国艾滋病信息网|||Copyright &copy; 2002-2012 中国红丝带网（www.chain.net.cn）|
http://www.chinaids.org.cn/|性病艾滋病防控中心||||
http://www.china-fpsa.com/|预防性病艾滋病基金会|||Asiatische Frauen zeigen sich in frivolen Posen vor der Cam um beim Camsex ihrer Lust freien Lauf zu lassen. Thais, Chinesinnen und Japanerinnen nackt vor der Webcam.|
http://www.unchina.org/unaids|联合国艾滋病规划网||||
http://www.hiv-vct.net/|检验天空性艾频道|||艾滋病论坛|
','',''),
('5881','1','12','栏目头栏','','','<iframe width=\"100%\" frameborder=\"0\" scrolling=\"no\" allowtransparency=\"true\" style=\"height:605px;\" src=\" http://www.j1.com/ask/static/tuiguang/114.html\"></iframe>
',''),
('4334','0','0','栏目头栏','','','<table width=\"878\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#8FA4E8\" id=\"162100musicbox\">
  <tr valign=\"middle\">
    <td width=\"800\" height=\"550\" align=\"left\"><iframe width=\"100%\" height=\"100%\" name=\"musicframe\" id=\"musicframe\" scrolling=\"no\" src=\"http://player.kuwo.cn/webmusic/webmusic2011/hao123/index.jsp\" frameborder=\"0\"></iframe></td>
    <td width=\"140\" height=\"550\" align=\"center\">音乐播放器列表<br />
<table width=\"100%\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.xiami.com/player/hao123/\"><img src=\"writable/__web__/images/0_0/xiami.png\" /><br />
      虾米音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://web.kugou.com/hao123.html\"><img src=\"writable/__web__/images/0_0/kugou-mb.png\" /><br />
      酷狗音乐</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.1ting.com/api/hao123/\"><img src=\"writable/__web__/images/0_0/1ting.png\" /><br />
      一听音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://player.kuwo.cn/webmusic/webmusic2011/hao123/index.jsp\"><img src=\"writable/__web__/images/0_0/kuwomb.png\" /><br />
      酷我音乐</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://y.qq.com/\"><img src=\"writable/__web__/images/0_0/qq1.png\" /><br />
      QQ音乐</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.xiami.com/kuang/hao123/\"><img src=\"writable/__web__/images/0_0/xiami.png\" /><br />
      虾米电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://www.yinyuetai.com/baidu/hao123\"><img src=\"writable/__web__/images/0_0/green-64.png\" /><br />
      音悦TV</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://topic.kugou.com/radio/\"><img src=\"writable/__web__/images/0_0/kugou-fm.png\" /><br />
      酷狗电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://douban.fm/partner/playerhao123\"><img src=\"writable/__web__/images/0_0/douban.png\" /><br />
      豆瓣FM</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://app.beva.com/hao123/fm/index.html\"><img src=\"writable/__web__/images/0_0/beva.png\" /><br />
      贝瓦电台</a></td>
  </tr>
  <tr>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://player.kuwo.cn/webmusic/kuwodt/diantai123.html\"><img src=\"writable/__web__/images/0_0/kuwoIcon.png\" /><br />
      酷我电台</a></td>
    <td width=\"10\"> </td>
    <td width=\"60\" style=\"font-size:12px\" align=\"center\"><a target=\"musicframe\" href=\"http://ting.baidu.com/app/hao123/tingradio/\"><img src=\"writable/__web__/images/0_0/tingicon.png\" /><br />
      ting!电台</a></td>
  </tr>
</table>
</td>
  </tr>
</table>',''),
('4444','0','9','体育赛事早知道|4|','','http://sports.tom.com/snooker/|斯诺克中国官方网站||||
','',''),
('4445','0','9','体育报刊汇总|4|','','http://sports.zaobao.com/|体坛风云-联合早报|||Zaobao website - Home page|
http://www.sportsol.com.cn/|中国体育报||||
http://tyzb.cnhubei.com/|《体育周报》||||
http://www.dfsports.com.cn/|东方体育日报|||东方体育网提供最新最全面的体育资讯，每日报道东方体育新闻，为广大用户提供足球,NBA,CBA,欧冠,英超,意甲,西甲,葡超,法甲,中超,亚冠等体育行业资讯。|
http://www.ycwb.com/misc/jyty.htm|羊城体育||||
http://www.sportsol.com.cn/yls/paper/zgzqb/|中国足球报||||
http://www.goalchina.net/|足球报社||||
http://www.soccerfanz.com.my/|足球周报||||
','',''),
('4446','0','9','球类运动协会|4|','','http://www.fa.org.cn/|中国足球协会||||
http://www.basketball.org.cn/|中国篮球协会网|||华奥星空是中国专业体育网站，属于国家体育总局官方背景的体育综合门户网站,提供全方位的体育报道,内容涵盖时事体育、竞技体育、体育赛事、体育产业、群众体育、体育彩票、协会体育等。拥有nest全国电子竞技大赛、中国乒乓球超级联赛赛事直播权。体育新闻包括奥运、足球（中超）、篮球（CBA、NBA）、排球、乒乓球、羽毛球、网球、体育视频|
http://www.volleyball.org.cn/|中国排球协会|||描述|
http://www.cba.org.cn/|中国羽毛球协会网|||中国羽毛球协会官方网站|
http://tabletennis.sport.org.cn/|中国乒乓球协会||||
http://tennis.sport.org.cn/|中国网球协会||||
http://softtennis.sport.org.cn/|中国软式网球协会||||
http://www.golf.org.cn/|中国高尔夫球协会|||中国高尔夫球协会官方网站|
http://baseball.sport.org.cn/|中国棒球协会||||
http://softball.sport.org.cn/|中国垒球协会||||
http://handball.sport.org.cn/|中国手球协会||||
http://hockey.sport.org.cn/|中国曲棍球协会||||
http://billiards.sport.org.cn/|中国台球协会||||
http://bowling.sport.org.cn/|中国保龄球协会||||
http://jianqiu.sport.org.cn/|中国毽球协会网||||
http://boules.sport.org.cn/|中国掷球协会||||
','',''),
('4447','0','9','栏目头栏','','','<div style=\"border:1px #EEE solid;padding:5px 0;text-align:center;\">
<iframe id=\"o1416307230435\" name=\"o1416307230435\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" height=\"375\" scrolling=\"no\" src=\"http://sports.sohu.com/114la/index.shtml\" style=\"margin-top:px; margin-left:px;\"></iframe>
<iframe id=\"o1416307295932\" name=\"o1416307295932\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" height=\"266\" scrolling=\"no\" src=\"http://www.aicai.com/news/topic/114lasports/index_new.shtml?agentId=233181\" style=\"margin-top:px; margin-left:px;\"></iframe>
</div>',''),
('6076','4','0','江苏报刊|4|','','','',''),
('6077','4','0','山东报刊|4|','','http://www.dzdaily.com.cn/|大众网|||山东新闻信息权威发布平台,山东重点新闻网站和外宣网站,大众报业集团网站,以中共山东省委机关报大众日报为旗帜和核心的报业集团。集团拥有大众日报、农村大众、齐鲁晚报、生活日报、鲁中晨报、半岛都市报、经济导报、青年记者、小记者等报纸、刊物。|
http://dzrb.dzwww.com/|大众日报|||大众报业集团（大众日报社）是以中共山东省委机关报——大众日报为旗帜和核心、报刊种类齐全、宣传力量强大、经济实力雄厚、产业功能完备的社会主义现代化报业集团。|
http://www.qlwb.com.cn/|齐鲁晚报|||齐鲁晚报是由大众报业集团主办的山东省唯一的省级晚报,1988年1月1日创刊,由邓小平同志亲笔题写报头,多年来一直是山东省发行量最大、广告收入最高、社会影响面最广的一份报纸，在全国晚报都市类报纸综合竞争力的排行榜上稳居前10强，曾经名列第三。在世界日报发行量百强当中位居第22名。齐鲁晚报网是《齐鲁晚报》及其报系内容的官方网站，是读者浏览齐鲁晚报报系所有新闻内容的唯一入口。|
http://bddsb.bandao.cn/|半岛都市报|||半岛网数字报是半岛传媒系下半岛都市报、城市信报、蓝色快报、青岛早报、青岛晚报等青岛优秀报纸的数字版 ！|
http://ncdz.dzwww.com/|农村大众|||农村大众报集蔬菜、水果、食用菌方面的市场行情、实用技术、最新商机、产品推广、企业宣传于一体，是您寻找信息，寻求帮助或进行企业宣传的良好平台。|
http://jnsb.e23.cn/|济南时报|||济南时报 请保留版权|
http://dsnb.e23.cn/|都市女报|||都市女报 请保留版权|
http://rkb.e23.cn/|人口导报|||人口导报 请保留版权|
http://www.qingdaonews.com/|青岛日报报业集团|||山东最具知名度和影响力的门户网站，青岛新闻网拥有青岛最大的门户论坛社区青青岛。网站下设青岛新闻、微博，青岛房产，青岛汽车，青岛美食，青岛旅游等频道，是青岛互联网用户获取信息的媒体平台。|
http://www.qingdaonews.com/hb.htm|青岛画报||||
http://www.laiwunews.cn/|莱芜日报|||莱芜新闻网是以新闻为先导的地方综合性权威性门户网站，是由莱芜市宣传部、莱芜市人民政府新闻办公室主管，莱芜日报社主办的官方网站，下设莱芜新闻中心、莱芜政务、莱芜教育、莱芜论坛、莱芜团购、莱芜房产、莱芜汽车、莱芜书画、嬴牟、莱芜视频、莱芜图片等频道，提供本地区新闻资讯和网友实用信息资讯库。|
http://www.zbnews.net/|淄博日报|||淄博新闻,淄博新闻网,淄博日报,淄博晚报,淄博财经新报,经济,民生,图文,特别推荐,视频,专题,时评,国内,国际,生活,体育,娱乐,科技,财经,汽车,美食,教育,论坛,微博|
http://www.whnews.cn/|威海日报|||威海网是由威海市人民政府新闻办公室与威海报业集团联合主办，依托《威海日报》《威海晚报》的本地新闻资源，拥有最受威海人喜爱的门户社区，最受威海人欢迎的博客平台，打造最受威海人关注的原创活动，是威海人气最旺的综合性网站，是威海地区最大的网上新闻发布、资讯服务中心和威海市外宣传工作的主要窗口。|
http://www.wfnews.com.cn/|潍坊日报|||潍坊新闻网由潍坊市委宣传部主管、潍坊日报社主办, 是潍坊市目前最大的网上新闻发布中心、网上公众信息服务中心、潍坊市对外宣传的主渠道之一，是世界了解潍坊、潍坊走向世界的重要窗口|
http://www.hezeribao.com/|菏泽日报|||中国菏泽网是菏泽地区权威的大型新闻生活门户，菏泽日报--牡丹晚报--菏泽手机报；看菏泽新闻，知菏泽，览天下|
http://www.dezhoudaily.com/|德州日报|||德州新闻网是由德州日报社主办的德州市唯一一家具有新闻发布资质的综合性网站，权威发布来自《德州日报》、《德州晚报》等媒体的新闻，密切关注世界动向，架设德州通往世界的桥梁；宣传党的路线方针政策，服务百姓生活。|
http://qnjz.dzwww.com/|青年记者||||
','',''),
('6078','4','0','浙江报刊|4|','','http://zjdaily.zjol.com.cn/|浙江日报||||
http://zjdaily.zjol.com.cn/msb|美术报||||
http://zjdaily.zjol.com.cn/zjlnb|浙江老年报||||
http://zjfzb.zjol.com.cn/|法制报||||
http://hzrb.hangzhou.com.cn/|杭州日报|||杭报在线是杭州日报依托现有采编资源开发的多媒体、多元化的信息即使发布终端，是一个与《杭州日报》高度融合的全新网站。杭报在线提供以杭州为中心，辐射国内国际的时政、财经、生活、服务等综合新闻与信息。杭报在线真正实现了报网合一、网报联动。|
http://dskb.hangzhou.com.cn/|都市快报|||都市快报新闻网 快豹宽频 透过快报看电视|
http://www.lybs.com.cn/|联谊报||||
http://www.cnnb.com.cn/|宁波日报|||中国宁波网由中共宁波市委宣传部和宁波日报报业集团联合主办，创办于2001年6月1日，是宁波市唯一一家经国务院新闻办公室批准正式建立的综合性重点新闻网站。中国宁波网作为宁波市级主流媒体，立足宁波、辐射华东，为用户提供新闻、资讯、服务、论坛、游戏等多种网络产品，以及宁波日报报业集团旗下《宁波日报》《宁波晚报》《东南商报》等10家报刊电子版。|
http://www.shaoxingdaily.com.cn/|绍兴日报|||绍兴网是全国新闻网站前三十强，是绍兴本土的新锐主流媒体。是综合性、多媒体的绍兴第一门户网站，为您提供各类及时的新闻和资讯信息|
http://epaper.zgkqw.com/|绍兴县报||||
http://www.qz828.com/|衢州日报|||主要提供本地的新闻报道以及国内，国际的大事件报道，是衢州市最大的门户网站|
http://www.ywnews.cn/|义乌商报||||
http://xsrb.xsnet.cn/|萧山日报||||
http://www.zjrb.cn/|诸暨日报||||
http://rarb.zjol.com.cn/|瑞安日报||||
','',''),
('6079','4','0','河南报刊|4|','','http://www.dahe.cn/|河南报业网|||大河网，河南省首家全国重点新闻网站，由中共河南省委宣传部主管，河南日报报业集团主办。大河网眼遇客户端，是河南最热闹的移动兴趣圈子和社交平台。|
http://www.pdsxww.com/|平顶山日报|||平顶山新闻网是平顶山门户网站，由平顶山市委宣传部主管、平顶山日报传媒集团主办, 是平顶山市目前最大的网上新闻发布中心、网上公众信息服务中心、平顶山市对外宣传的主渠道，是世界了解平顶山、平顶山走向世界的重要窗口|
http://www.zhld.com/|中华龙都网-周口日报||||
http://www.lyd.com.cn/|洛阳日报|||洛阳网（http://www.lyd.com.cn）——洛阳日报报业集团主办，国务院新闻办公室批准的国家一类新闻网站，下设洛阳新闻、百姓呼声、22楼会客厅、洛阳房产、洛阳汽车、经典洛阳等频道， 拥有本地最大的互动论坛“洛阳社区”， 在河南综合性网站及社区网站综合影响力排名榜单上进入前三强，为洛阳最具知名度和影响力的门户网站。|
http://www.zynews.com/|郑州日报||||
http://www.21xc.com/|许昌新网--许昌日报||||
http://www.xb01.cn/|西部在线-三门峡日报||||
http://www.xytv.com.cn/|信阳广播电视报|||1号线是信阳广播电视报社主办的以服务百姓民生，秉承有态度的新闻理念，构建本地“平民媒体”，为信阳人打造一个本地化的互联网信息服务平台。|
http://www.kf.cn/|开封日报|||开封最具影响力和知名度的门户网站，看开封新闻，必上开封网。拥有本地最大的论坛开封社区。开封网是开封日报、汴梁晚报指定发布平台，为用户提供开封新闻、开封房产、开封汽车、开封旅游、微博等二十多个频道。|
','',''),
('6080','4','0','河北报刊|4|16','','http://www.yzdsb.com.cn/|燕赵都市报|||燕赵都市网,系燕赵都市报网站,燕赵都市网与燕赵都市报深度融合,报网一体运营,以河北网民需求为核心,涵盖新闻,论坛,商业生活三大类,全方位搭建河北网民网上互动交流和生活服务平台。|
http://www.hehechengde.cn/|承德日报|||和合承德网是由承德市委宣传部、外宣局、市政府新闻办主管 承德日报社主办的最权威的承德新闻门户网站|
http://www.hbjjrb.com/|河北经济日报||||
','',''),
('6085','4','0','湖南报刊|4|16','','http://www.rednet.cn/|红网||||
http://hnrb.rednet.cn/|湖南日报|||《湖南日报》是中共湖南省委机关报，是湖南省最具权威性、发行量最大的综合性大报。湖南日报网是由《湖南日报》根据网络时代发展需求创立，湖南省内最大最权威的党政新闻网站，简称“党网”。每日为网友提供最新最快最全的湖南省内党政、社会、经济等新闻资讯。现设有：视点头条、滚动新闻、今日要闻、市州要闻、特别关注、每周评论等十多个新闻栏目。|
http://cswb.csonline.com.cn/|长沙晚报||||
http://www.tuanjiebao.com/|团结报|||团结网（www.tuanjiewang.cn）是我国唯一的参政党报纸团结报主办的综合性网站，秉承“倾听民主党派声音，记录多党合作进程，传播核心价值理念”的定位，综合运用各种表现手段，以“民主党派新闻总汇，参政议政网上窗口，统一战线纵横巡礼，历史文化精品集萃，各地组织风貌展示”为特色，努力打造互联网上丰富、全面、权威的民主党派参政议政新闻、信息与史料平台。|
http://www.xxcb.com.cn/|潇湘晨报|||潇湘晨报网，第一湖南新闻网，第一湖南生活资讯网。由潇湘晨报创办运营，集湖南新闻,长沙新闻，长沙生活资讯，长沙商业资讯于一体。致力于打造成为湖南网民必看的湖南新闻门户网站，湖南网民必用的城市生活门户网站。|
http://www.xiangshengbao.com/|湘声报|||政协湖南省委员会湘声报社主管主办。见证民主进程，记录时代发展；湖南政协委员风采,社情民意,调研成果,民主监督,参政议政,民主评议,建言献策,共商国是,人才荟萃,三湘统战,湖南“两会”,政协概况等。|
http://www.803.com.cn/|岳阳晚报|||岳阳网是市委、市政府的新闻门户网,岳阳新兴主流媒体.拥有岳阳日报数字报、长江信息报数字报、洞庭之声数字报以及岳阳网即时新闻,本土95%的文字新闻从岳阳网向世界各地传播.加盟有岳阳各职能部门网站和岳阳各区县网站,且开通有岳阳论坛、房产频道、健康频道、汽车频道等服务市民,日平均点击率达到7万多人次,是岳阳当之无愧的第一新闻门户网站.|
http://www.iyxwzx.com/|益阳日报||||
http://epaper.shaoyangnews.net/|邵阳日报||||
http://cdrb.cdyee.com/|常德日报||||
','',''),
('6084','4','0','福建报刊|4|','','http://www.fjsen.com/|福建东南新闻网|||东南网（www.fjsen.com）前身为福建东南新闻网，成立于2001年10月，是经国务院新闻办公室批准的具有新闻登载资质的省级重点新闻网站。东南网是福建省规模最大的新闻门户网站，设有新闻、互动、资讯等版块30多个频道200多个栏目。借助上千名专职记者和通讯员在各地的新闻采集，东南网每天提供新闻资讯数千条，致力打造最快的本地新闻、最强的时政报道。网站同时发布福建日报报业集团旗下各报刊的数字报和电子版，提供各种本土生活资讯，搭建电子杂志、网络广告、博客、SNS交友、在线调查、视频、RSS订阅等综合性服务平台，介入丰富多彩的虚拟空间。|
http://www.dnkb.com.cn/|东南快报|||东快网，东南快报官方网站，福建本土资讯门户，福建新闻，福州新闻，厦门新闻，24小时即时新闻，体育，娱乐，论坛，搜城，数码，汽车，财经，房产，健康，教育，福建省贸促会主办，以福州、厦门为中心，面向全省九地市发行的都市报，含新闻和生活消费资讯|
http://www.fzd.com.cn/|福州日报||||
http://www.fzen.com.cn/|福州晚报|||东街口是福州晚报的在线社区，内容包括晚爆话题、晚报俱乐部、视频抢鲜、第一商圈、都市向导、i问、个人空间等多个内容频道，涵盖哈楼会、车友会、穷游、理财、婚恋、宠物、教育、亲子、55路、影迷、美食、健康、时尚、休闲等多个栏目，提供晚报特惠、批量团购、个人寄售等商品交易信息，开设记者播报、网友快拍等视频上传功能|
http://szb.qzwb.com/dnzb/paperindex.htm|泉州晚报||||
http://www.mnrb.net/|闽南日报||||
http://www.mxrb.cn/dzb/dzb.htm|漳州新闻网||||
http://www.greatwuyi.com/mbrb|闽北日报||||
http://dzb.ptweb.com.cn/|湄洲日报|||湄洲日报,湄洲日报电子报，湄洲日报电子版,莆田新闻,湄洲,妈祖|
http://www.66163.com/Fujian_w/news/fjqb|福建侨报||||
http://www.ssrb.com.cn/|石狮日报|||海峡西岸最大综合信息生活资讯门户-石狮日报社|
','',''),
('6083','4','0','湖北报刊|4|','','http://www.cnhubei.com/|湖北日报报业集团|||荆楚网由湖北日报传媒集团主办，湖北荆楚网络科技股份有限公司运营，是湖北地区最大的网络平台。业务涉及新闻资讯、财经房产、时尚娱乐、旅游信息、教育培训、短信服务、福利彩票、社区论坛等，并积极开拓电子商务、动画动漫、二维码产业。|
http://hbrb.cnhubei.com/|湖北日报|||湖北日报电子版、多媒体报官方站点，荆楚网每日上午10点为您提供湖北日报最新的电子版报纸，给您提供最好的湖北日报在线阅读体验。|
http://ctdsb.cnhubei.com/cache/paper_ctdsb.aspx|楚天都市报||||
http://ctjb.cnhubei.com/|楚天金报|||楚天金报电子版和多媒体报官方站点，荆楚网授权每日上午10点为您提供楚天金报最新的电子版报纸和多媒体报，给您提供最好的楚天金报在线阅读体验。|
http://www.cnhan.com/|汉网|||汉网-武汉综合新闻门户，湖北自媒体服务平台。汉网由长江日报报业集团主办，是湖北地区具有影响力的生活资讯平台之一。|
http://cjmp.cnhan.com/|武汉晨报|||长江日报报业集团_汉网_长江日报_武汉晚报_武汉晨报_电子报_数字报|
http://ncxb.cnhubei.com/|农村新报|||农村新报是湖北日报农村版，事事处处为农民说话，实实在在为农民服务。荆楚网授权发布农村新报多媒体报、电子版，为您提供最好的农村新报在线阅读体验。|
http://www.zhiyin.com.cn/|知音|||做中国最具公信力的婚恋交友网|
http://www.dagong.com/|打工网|||求职招聘网主要包含事业单位招聘,银行招聘,教师招聘网,招聘信息,兼职招聘,教师招聘,以及应届生求职,求职信,求职简历,为主体集招聘网站、求职网站与一身的求职招聘类网站,一网在手,前程无忧！|
','',''),
('6082','4','0','四川报刊|4|','','http://www.scol.com.cn/|四川日报报业集团|||四川门户网站，四川群众路线网，四川，成都，蓉城，天府，大熊猫，四川新闻，四川体育，四川人事，四川旅游，成都新闻，成都体育，成都人事，成都旅游，成都美女，成都美食，成都房产，成都汽车，成都财经，成都教育，医院，图片，交通，航班，健康，评论，论坛，团购，电子版，四川日报，华西都市报，天府早报，天府社区，四川微博，成都微博|
http://www.sichuandaily.com.cn/|四川日报|||Scdaily.cn四川日报网由四川日报社主办，突出原创报道。以四川地区时事新闻、财经新闻、民生新闻为主。网络四川新闻，把握四川舆情，权威媒体，主流网站。|
http://www.cdsb.com/|成都商报||||
http://digest.scol.com.cn/|文摘周报||||
http://homelife.scol.com.cn/|家庭与生活报||||
http://scgrrb.newssc.org/|四川工人日报||||
http://wxb.newssc.org/|晚霞报||||
http://www.swbd.cn/|西南商报|||西部经济,西部经济网,西南商报,财经,三农,商经,合作经济,教育,国内,民生,旅游,魅力西部,红盾风采,房产,四川商界,人物,健康,文化,汽车,环保,工商,区域在线|
http://dyrb.newssc.org/|德阳日报||||
http://www.lsrbs.net/|乐山日报|||乐山日报社数字报 三江都市报社数字报|
http://www.lsrb.cn/|凉山日报||||
http://msrb.newssc.org/|眉山日报||||
http://ybrb.newssc.org/|宜宾日报||||
http://lswb.newssc.org/|三江都市报||||
','',''),
('6081','4','0','辽宁报刊|4|16','','http://www.lnd.com.cn/|北国网||||
http://www.syd.com.cn/|沈阳日报|||沈阳网是沈阳门户网站,是沈阳地区新闻发布网站,是沈阳市民最关注的地方门户网站.有沈阳最快的新闻,沈阳最新的生活信息,沈阳最全的打折信息,沈阳政府政闻,沈阳房价,沈阳车市,沈阳人网上社区,沈阳论坛,沈阳家园.每天提供沈阳日报,沈阳晚报等多种数字报,每天发布大小沈阳新闻信息和沈阳专题,沈阳网络广告投放,联系电话024-22690000|
http://www.qianhuaweb.com/|千华网-鞍山日报|||千华网，创立于2002年，隶属于鞍山报业集团。作为鞍山生活资讯第一门户，千华网目前注册用户超百万，日均访问量超50万，百度权重排名在鞍山首屈一指，跻身全国地方新闻门户网站百强。同时也是《鞍山日报》、《千山晚报》数字报发布平台。|
http://www.nen.com.cn/|东北新闻网|||东北新闻网是辽宁省委、省政府领导的，辽宁省委宣传部主办的权威的专业的新闻网站，是目前东北地区最大的综合性网络新闻发布平台。作为国新办确定的辽宁省内唯一一家地方重点新闻网站，东北新闻网以新闻报道的权威性、及时性，内容的丰富性和辛辣的点评为特色，在网民中树立起了“权威媒体、辽宁门户”的形象。|
','',''),
('6105','1','0','网上购物|4|','','http://www.taobao.com/|淘宝网|greenword||<div style=\"text-align:center;\"><a href=\"http://www.taobao.com/\"><img src=\"writable/images/taobao.png\" /></a></div>淘宝网 - 亚洲较大的网上交易平台，提供各类服饰、美容、家居、数码、话费/点卡充值… 数亿优质商品，同时提供担保交易(先收货后付款)等安全交易保障服务，并由商家提供退货承诺、破损补寄等消费者保障服务，让你安心享受网上购物乐趣！<br><div style=\"text-align:center;\"><a href=\"http://www.tmall.com/\"><img src=\"writable/images/tmall.png\" /></a></div>天猫 -中国地标性的线上综合购物平台，拥有超1.2万国际品牌，18万知名大牌，8.9万品牌旗舰店。商品涵盖服饰鞋包，美妆护肤，家电数码，母婴玩具，食品饮料等各品类，为日益成熟的中国消费者提供全球精选好货、无后顾之忧的好服务，致力于为你打造品质购物体验！| · <a href=\"http://www.tmall.com/\">天猫</a>
http://www.dangdang.com/|当当网|||全球领先的综合性网上购物中心。超过100万种商品在线热销！图书、音像、母婴、美妆、家居、数码3C、服装、鞋包等几十大类，正品行货，低至2折，700多城市货到付款，（全场购物满29元免运费。当当网一贯秉承提升顾客体验的承诺，自助退换货便捷又放心）。|
http://www.paixie.net/|拍鞋网|||买鞋子哪个网站好，当然首选拍鞋网! 中国最早成立的正品鞋服购物网站, 国内最专业的品牌鞋服在线商城。所售鞋服100%厂家授权, 全国包邮, 货到付款, 提供最完美的购物体验！|
http://www.amazon.cn/|卓越亚马逊|||亚马逊中国（z.cn）坚持“以客户为中心”的理念，秉承“天天低价，正品行货”信念，销售图书、电脑、数码家电、母婴百货、服饰箱包等上千万种产品。亚马逊中国提供专业服务：正品行货天天低价，机打发票全国联保。货到付款，30天内可退换货。亚马逊为中国消费者提供便利、快捷的网购体验。|
http://www.suning.com/|苏宁易购|||<div style=\"text-align:center;\"><a href=\"http://www.suning.com/\"><img src=\"writable/images/suning.jpg\" /></a></div>苏宁易购(Suning.com)网上商城 - 苏宁云商综合网上购物商城，销售传统家电、通讯数码、电脑、家居百货、服装服饰、母婴、图书、食品、保险、旅行、充值等数万类商品和服务。正品行货,全国联保,本地配送,货到付款。省钱放心上苏宁网上商城(原苏宁电器）,尽享购物乐趣！|
http://www.jd.com/|<img src=\"writable/__web__/images/1_0/20151225205232.gif\" /> 京东商城|redword||京东JD.COM-专业的综合网上购物商城,销售家电、数码通讯、电脑、家居百货、服装服饰、母婴、图书、食品等数万个品牌优质商品.便捷、诚信的服务，为您提供愉悦的网上购物体验!| <img src=\"writable/__web__/images/homepage_0/rm.gif\" width=\"34\" height=\"30\" />
http://www.m18.com/|麦考林|||M18-趣天麦网是全球最大的中文女性網上購物網站，在線特價銷售超過60萬種品牌服裝,時尚飾品。是白領女性購買時尚女裝、配飾、家居用品、健康美容、母嬰用品的首選，同時有天天搶,特價,積分換購等特色購物專區；|
http://www.wangfujing.com/|王府井百货|underline||王府井网上商城依托王府井百货品牌优势，是集化妆品、服装、鞋帽、箱包、珠宝、配饰、户外、运动、家居生活等产品，定位于面向品位、品质、时尚和追求购物乐趣消费者的B2C精品购物平台。|
http://www.chinadrtv.com/home|橡果购物||||
http://www.d1.com.cn/|D1优尚网|||D1优尚网（原名D1便利网），国内领先的个人时尚扮靓商城,支持全国货到付款，北京、上海、天津用户网上购物满99免运费，其他城市网上购物货付满199元免运费。想通过网上购物买到名牌商品，又享受比商场优惠得多的价格、比商场更优质的服务？来D1网上购物商城吧！|
http://www.quwan.com/|趣玩网|||趣玩网 “趣生活，货好玩”。在线销售最具创意家居商品、创意礼物、原创设计师作品、极客数码，一切为了有趣好玩。支持全国货到付款，30天自由退换货保障。|
http://www.m18.com/|M18趣天麦网|||M18-趣天麦网是全球最大的中文女性網上購物網站，在線特價銷售超過60萬種品牌服裝,時尚飾品。是白領女性購買時尚女裝、配飾、家居用品、健康美容、母嬰用品的首選，同時有天天搶,特價,積分換購等特色購物專區；|
http://www.yintai.com/|银泰|||银泰网（www.yintai.com）作为银泰商业集团官方购物网站,专注经营精品时尚百货类，包括女装，男装，鞋靴，化妆品，运动系列，时尚配饰，名品箱包等万种百货商品，100%正品，15天免费退换货。银泰网作为银泰百货连锁在线购物中心，致力打造成为中国最卓越的百货购物网站！|
http://www.no5.com.cn/|No5化妆品网|||NO5时尚广场-国内领先的化妆品折扣网站,13年来赢得了超过2000000会员的信赖，在线销售护肤品、彩妆、香水、时尚礼品等种类的500多个品牌、20000多种商品。1800多城市直达，货到付款，15天不满意退换货保障，超低折扣促销，全场满额免运费！|
http://www.yinzuo100.com/|银座网|||银座网上商城，银座官方购物网站，母婴、家电、数码、百货、食品等数万种商品，综合类网上购物商城，银座正品保证,为您提供方便快捷的无忧网上购物体验！|
http://www.anport-e.com/|万翔商城|||万翔商城-厦门翔业集团旗下正品商城,国企信誉保证,政府采购价,货到付款,安全便捷.产品涵盖家电、电脑、数码、手机、生活用品等千种商品!|
http://www.usashopcn.com/|美国购物网||||
http://www.xinbaigo.com/|新世界百货||||
http://www.wowsai.com/|哇噻网|||365天不打烊的创意市集，汇集全球优质设计师产品、纯手工手作产品的购物网站，创意礼物首选网站，中国领先的设计师手工diy产品网购平台，小清新电商|
http://www.epetbar.com/|E宠商城|||E宠商城是专业宠物用品商城,网站提供宠物狗、宠物猫、宠物用品、狗粮、猫粮、宠物领养等,宠物市场近万种狗狗，猫咪用品任你选,上千知名宠物品牌【正牌保障】货到付款30天无条件退换货。品质养宠,尽在E宠！|
http://www.ujipin.com/|优集品|||优集品，国内唯一采用全球买手模式，向海外家居品牌直接采购的正品家居百货电商，汇集欧美、日韩、港台大陆的上千个品牌，让全世界为你的生活添彩。|
http://shop.boqii.com/|波奇商城|||波奇宠物商城是多家知名宠物用品官方授权宠物商城.在波奇不仅有各种知名品牌的狗粮,猫粮,还能找到宠物玩具,宠物日用品等多种宠物用品.选择波奇，健康宠物生活从波奇开始。|
http://www.metro.cn/|麦德龙||||
http://www.lhmart.com/|联华易购|||联华易购 随心购买 便捷生活 我家里的大卖场 OK卡|
http://www.jianianle.com/|嘉年乐|||嘉年乐老年商城是专注于老年人用品的电子商务平台，专注老年人保健、生活、健身等精品购物。是中国老年人用品购物第E站|
http://www.blemall.com/|百联E城|||由国内销售规模最大的零售集团百联集团投资创办的网上BTOC、BTOB和信息发布平台，主营手机、笔记本、电脑、数码相机、电视家电、礼品、票务等|
http://www.paipai.com/|拍拍网||||
http://www.qqgshop.com/|爱福恩美国直邮|||QQG全球购是一家以保健品,化妆品,婴儿用品,休闲零食为主的美国直邮代购网站，我们是唯一做到直邮承诺的商家,让你在家就能享受在美国购物的乐趣和直邮带来的快感......|
http://www.pinstore.cn/|品店||||
http://k.cn/|移动商街|||移动商街,开创新一代电子商务平台,提供高质量,低价格的线上消费|
http://www.1mall.com/2/|1号商城||||
http://www.ule.com/|邮乐网|||邮乐网由中国邮政与TOM集团携手呈现的创新网上购物平台!网购新西兰奶粉、土特产、鞋帽箱包、个人护理、数码、小家电、居家百货、母婴、手机充值全网最低，原产地直销原汁原味，尽在邮乐,为您提供愉悦的网上购物体验.|
http://www.xjh.com/|徐家汇商城|||徐家汇商城是徐家汇官方的综合类高端网上购物商城,专注经营服饰精品、鞋履潮品、运动户外、婴童精品、美容妆品、家居饰品、箱包、珠宝、时尚数码、商超礼品等十大商品种类,100%正品保证,品质首选。7天无条件退换货。徐家汇商城致力打造成为中国一流的综合类高端网络百货商场 - 徐家汇商城|
http://www.jxmall.com/|吉象吉送||||
http://www.hitao.com/|嗨淘||||
http://www.buysku.com/|Buysku|||BuySKU.com is an professional and reliable online shopping store for apple accessories, android cell phones, Tablet PC, magic cubes and other hot selling electronics gadgets at reasonable prices and global free shipping.|
http://www.jajn.com/|家健商城|||家健商城官方网站，进口商品首选网购平台！100%原装进口，全场包邮，30天无理由退换货。网上购买进口化妆品、家居用品、母婴用品就上家健商城！|
http://www.jiuxian.com/|酒仙网|||【酒仙网】酒水在线销售专业品牌，提供白酒、红酒、洋酒、保健酒、黄酒、酒具、正品等多种品类，官方授权在线销售，各类酒水团购、秒杀不断。|
http://www.jiayougo.com/|家有购物网上商城|||家有汇商城-品质家居第一商城！家有购物电视购物唯一官方网站。在线销售家用电器，家居用品，美容服饰等近万个品牌数十万种超值商品1折起，100%正品保证，支持货到付款，满199元包邮，4008-678-888。|
http://135aa.uz.taobao.com/|9块9折扣|||九块九包邮官网，九块邮，九块九折扣，淘宝秒杀商品尽在9块9折扣-九块邮u站|
http://www.xiji.com/|西集网||||
','<center><script type=\"text/javascript\">
    (function(win,doc){
        var s = doc.createElement(\"script\"), h = doc.getElementsByTagName(\"head\")[0];
        if (!win.alimamatk_show) {
            s.charset = \"gbk\";
            s.async = true;
            s.src = \"http://a.alimama.cn/tkapi.js\";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: \"mm_11234643_1130577_74820761\",/*推广单元ID，用于区分不同的推广渠道*/
            appkey: \"\",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: \"\",/*自定义统计字段*/
            type: \"click\" /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
</script>
</center>',''),
('6070','4','0','新闻搜索|4|16','','http://news.baidu.com/|百度新闻搜索|||百度新闻是包含海量资讯的新闻服务平台，真实反映每时每刻的新闻热点。您可以搜索新闻事件、热点话题、人物动态、产品资讯等，快速了解它们的最新进展。|
http://news.google.cn/|Google资讯搜索||||
http://news.sogou.com/|搜狗新闻搜索||||
http://news.yodao.com/|有道新闻搜索||||
','',''),
('6071','4','0','北京报刊|4|16','','http://www.jkb.com.cn/|健康报||||
http://www.chinacampus.org/|中国大学生||||
http://www.beijingreview.com.cn/|北京周报|||《北京周报》是中国唯一的国家级英文新闻周刊,向关心中国的读者提供中国时事和经济发展的报道和评论，评述重大国际事件，提供权威咨询以及实用的信息服务。北京周报网站依托纸媒，定位为多语种新闻周刊网站，既强调对新闻热点的及时跟踪报道，又紧紧围绕焦点问题进行深度报道。|
http://www.bqweekly.com/|北京青年周刊||||
http://www.yicai.com/|第一财经||||
http://www.fawan.com/|法制晚报||||
http://www.jinghua.cn/|京华时报|||京华网依托北京市最有影响力的报纸《京华时报》，为互联网用户提供全面的、及时的北京新闻和资讯。|
http://www.thebeijingnews.com/|新京报|||新京报网以文字、图片、视频等全媒体形式，为用户提供全天候热点新闻，涵盖突发新闻、时事、财经、娱乐、体育，以及评论、杂志和博客等，新京报网本着品质源于责任的的信念,致力于成为用户喜爱的精品新闻网站。|
http://www.ynet.com/|北京青年报|||最适合白领人群阅读的资讯精选|
http://www.bbtnews.com.cn/|北京商报||||
http://www.morningpost.com.cn/|北京晨报|||对于北京晨报网来说，今天是新的一天。希望今后的每一天，北京晨报网都能为您开启新生活。这是一种责任，同样也是一种莫大的荣幸。北晨网提供北京最早、最有特色的新闻、力争打造北京主流综合新闻信息服务平台。|
','',''),
('6072','4','0','上海报刊|4|','','http://www.news365.com.cn/|文新传媒||||
http://whb.news365.com.cn/|文汇报||||
http://xmwb.news365.com.cn/|新民晚报||||
http://www.shanghaidaily.com/|上海日报|||The largest English-language news portal in East China, providing the latest news, business news, comments, analysis and multimedia coverage of Shanghai and China news from Shanghai Daily.|
http://www.jfdaily.com.cn/|解放日报|||解放网是上海市委机关报——解放日报的官方新闻网站，传播“有深度、有温度”的新闻。以上海政经、民生新闻为重点，同时关注国内、国际、文娱、体育等各领域新闻。|
http://www.nbd.com.cn/|每日经济新闻||||
http://www.dfdaily.com/|东方早报||||
http://www.dfsports.com.cn/|东方体育日报|||东方体育网提供最新最全面的体育资讯，每日报道东方体育新闻，为广大用户提供足球,NBA,CBA,欧冠,英超,意甲,西甲,葡超,法甲,中超,亚冠等体育行业资讯。|
http://app.why.com.cn/epaper/qnb/html/2016-03/08/node_1.htm|上海青年报||||
http://www.cnstock.com/|上海证券报|||中国证券网提供【股票行情】实时查看，最专业的财经新闻报道，上证微博博客论坛携手上海证券报打造国内第一财经新闻平台，中国证券网欢迎您！|
http://www.shfinancialnews.com/|上海金融报||||
http://www.envir.gov.cn/index.asp|上海环境报||||
http://xmzk.xinminweekly.com.cn/|新民周刊||||
http://www.bundpic.com/|外滩画报|||《外滩画报》力求融合深度新闻报道、独到文化视角、健康生活方式和新锐时尚潮流，为读者提供具有国际视野的原创内容，打造中国最优质的生活媒体。|
http://www.eastday.com/|东方网|||东方网,上海,新闻,政务,视频,图片,突发,原创,独家,现场,报道,博客,微博,交友,评论,访谈,长三角,财经,体育,娱乐,社会,军事,论坛,聊天,短信,世博|
http://www.shanghai-style.com/|上海服饰||||
http://www.wxrb.com/|无锡日报||||
http://www.lygnews.com/|连云港日报|||连网是连云港第一门户网站，为用户提供连云港地区最全面、最权威、最及时的新闻政务服务资讯，及论坛、微信、客户端、手机报等网络服务。|
http://www.yzrb.com/|扬州日报||||
http://www.yzwb.com/|扬州晚报|||扬州晚报，扬州晚报网，扬州，扬州新闻，扬州特产，扬州旅游，扬州天气，景点，文化，教育，视频，名人，地图，电子地图，汽车，火车，小区，街道，政府，市政府，市委，市人大，市政协，交友，娱乐，美食，沐浴，休闲，三把刀，包子，漆器，玉器，扬州美女，美女，www.yzwb.com|
http://jsydb.jsinfo.net/|江苏邮电报（电信版）||||
http://www.hynews.net/|淮安日报|||淮安新闻网是淮安地区唯一新闻门户网站，是以新闻宣传为内容主体，集宽屏、社区、微博、移动终端等综合信息服务和技术应用为一体的全媒体新闻综合门户。淮安新闻网作为苏北重要中心城市综合信息门户网站，为淮安及周边人群提供全面网络服务。|
http://www.njnews.cn/|南京报业|||南京报业网，隶属于南京日报报业集团新媒体部，为南京日报报业集团的官方网站，南京报业网有专业的记者编辑深入南京街头巷尾，，为南京及周边人群提供有关南京美食、旅游、汽车、房产、装修、IT、影视等多方面的生活资讯。|
http://www.ntrb.com.cn/|南通日报|||南通网由南通日报社主办，是南通地区最权威的主流新闻门户和资讯平台，南通新闻最快权威发布，南通资讯最大网络平台。|
http://www.wxrb.com/|无锡报业集团||||
','',''),
('6073','4','0','天津报刊|4|16','','http://www.tianjindaily.com.cn/|天津日报|||天津网是由国务院新闻办公室批准、天津日报报业集团主办的天津市重点新闻网站之一。贴近生活、贴近实际，贴近群众,以新闻报道为主线。每日发布天津日报、每日新报、城市快报、假日100天、新金融观察、采风报、球迷、滨海时报、蓝盾、范、新领军者等数字报刊。|
http://www.jwb.com.cn/|今晚报|||今晚网是今晚报官方网站，强势新闻门户，以天津突发、财经、原创新闻为特色，采用文字、视频、图片、交互社区等全媒体技术创新报道，另有当日《今晚报》、《渤海早报》、《中老年时报》、《今晚经济周报》、《中国技术市场报》数字报纸供应|
','',''),
('6074','4','0','重庆报刊|4|','','http://www.cqnews.net/|华龙网-重庆日报|||重庆华龙网集团有限公司（WWW.CQNEWS.NET）成立于2000年12月20日，是国务院新闻办公室批准组建的首批省级重点新闻网站，由中共重庆市委宣传部主管，重庆日报报业集团、重庆市国有文化资产经营管理有限责任公司、重庆广播电视集团（总台）作为股东联手打造，是集数字报、广播、电视、网络、手机报、客户端、微博、微信、户外LED、杂志等“十媒一体”的重庆首个全媒体网站。|
http://www.cqwb.com.cn/|重庆晚报|||第一眼是重庆最具影响力媒体,重庆晚报官方网站,全方位全时段滚动播报重庆新闻及国内国际重大事件|
http://www.newoo.com/|新女报|||新女网是一个集购物、时尚、健康、美容、两性、体验、奢侈品、吃喝玩 乐等各方面女性资讯为一身的重庆本土实用女性网站。从女性的角度出发,为女性提供了一个获取时尚生活资讯的宝地,不仅如此,还有新女报商城为你提供完美的购物体验，24小时网络热卖，送货上门、货真价实。|
','',''),
('6075','4','0','广东报刊|4|','','http://www.southcn.com/|南方日报报业集团|||南方网/南方新闻网是经中共广东省委，广东省人民政府批准建设的新闻宣传网站。南方网/南方新闻网由广东省委宣传部主办主管并作为南方报业传媒集团之成员单位，获国务院新闻办公室批准从事登载新闻业务并被确定为全国重点新闻网站之一。南方网/南方新闻网作为华南地区最大型的新闻融合平台，是国内外网民认识、了解广东最权威、最快捷的途径。|
http://www.ycwb.com/|羊城晚报报业集团|||金羊网是广东省顶级报刊媒体羊城晚报集团旗下新媒体网站，华南区四大媒体网站之一，为用户提供最新新闻资讯等。并提供《羊城晚报》、《新快报》、《可乐生活》等多家报刊电子版！|
http://www.dayoo.com/|广州日报报业集团||||
http://www.sznews.com/|深圳报业集团|||深圳新闻网是立足深圳、辐射全国的综合性区域门户网站,为用户提供新闻、视频、博客、房产、汽车、财经、健康、美食、旅游、教育、时尚、娱乐、交友等20多个频道,并拥有深圳最大的门户互动社区深圳论坛,以及深圳报业集团旗下《深圳特区报》、《深圳商报》、《深圳晚报》、《晶报》、《香港商报》、《Shenzhen Daily》等系列报刊杂志电子版|
http://www.nanfangdaily.com.cn/|南方日报|||南方报业网（www.nfmedia.com）是南方报业传媒集团官方网站，是宣传和推广南方报业媒体和品牌最权威、最具公信力的网络平台，是广大网民了解南方报业的形象窗口。南方报业网创建于1999年，是全国最早开通的传统媒体的网站之一，曾入选全国十大新闻网站，2006年入选“中国新闻网站TOP100强”|
http://www.xkb.com.cn/|新快报|||新快报官方网站,手机部落,人人做记者|
http://www.ycwb.com/myjjb/private_economy_news.htm|民营经济报||||
http://www.ycwb.com/misc/jyty.htm|羊城体育||||
http://www.goalchina.net/|足球报||||
http://www.thebeijingnews.com/|新京报|||新京报网以文字、图片、视频等全媒体形式，为用户提供全天候热点新闻，涵盖突发新闻、时事、财经、娱乐、体育，以及评论、杂志和博客等，新京报网本着品质源于责任的的信念,致力于成为用户喜爱的精品新闻网站。|
http://www.zsnews.cn/|中山日报|||中山网是由市委宣传部主管，中山日报报业集团主办的中山门户网站。作为本地规模最大、流量最高、信息最全的权威网站，中山网推出了新闻、视频、楼市、汽车、社区论坛、电子商务、网络问政等20多个专业频道，是中山互联网用户获取信息的主要媒体平台。|
http://www.stcd.com.cn/|汕头都市报||||
http://www.hznews.com/|惠州日报|||惠州新闻网是由惠州报业传媒集团主办，提供由惠州日报、东江时报等媒体报道的惠州本地最火辣及时的新闻资讯，是浏览惠州新闻最佳本地媒体。|
http://www.jmrb.com.cn/|江门日报|||中国江门网,江门市综合门户网站,江门新闻,江门,新闻网,五邑,蓬江,高新江海,新会,鹤山,台山,开平,恩平,侨乡,华人,港澳台,江门网,江门日报社,江门日报,日报,江门报,报社,报纸,电子版,PDF版,jiangmen,jm,jmrb,jmnews,jmrb.com,jmnews.com.cn,jmrb.com.cn|
http://szdaily.sznews.com/|ShenzhenDaily||||
http://www.lnsnb.cn/|岭南少年报||||
http://modern.dayoo.com/|新现代画报|||《新现代画报》创刊于1985年，其前身为原身为《现代画报》，由香港著名传媒人郑经翰先生创办。这是中国最早的综合类时尚杂志，也是第一本进入中国国际机场，和五星级酒店的“中国制造”的高档杂志，《新现代画报》自创刊以来一直是中国社会精英的焦点读本，特别是在华南地区拥有非常大的影响力。|
http://kanshijie.dooland.com/|看世界|||看世界,看世界 - 免费在线电子杂志阅读,发布平台,提供免费《看世界 》在线杂志阅读,免费《看世界 》杂志原版下载等服务.|
http://www.fstcb.com/|陶城报|||陶城网是建立于陶城报20多年专业媒体之上，有着强大的媒体宣传能力和在丰富的客户群体，是一个旨在服务于陶瓷企业，创效于行业于新型陶瓷电子商务平台,在这里你可以挖掘崭新的陶瓷市场。|
http://www.qyrb.com/|清远日报|||清远日报-清远第一门户|
http://www.sc168.com/|顺德报|||顺德权威网络媒体：顺德新闻网是立足顺德、以顺德新闻为核心，以顺德美食传播全球，以顺德bbs与珠江商报进行报网互动反映民意的顺德门户网站。|
','',''),
('6069','4','0','国内知名报刊|4|','','http://www.abbao.cn/|AB报-在线读报|||ABBAO(AB报)是原版数字报刊赏析学习网。收录展示了大量国内优秀晚报、早报、日报、都市报、财经报、电脑报、体育报、地方报纸等，所有报纸均原版呈现，方便报业从业者互相学习交流。|
http://www.infzm.com/|南方周末|||www.infzm.com，南方周末新闻社区|
http://hsb.hsw.cn/|华商报||||
http://www.dahe.cn/|大河报|||大河网，河南省首家全国重点新闻网站，由中共河南省委宣传部主管，河南日报报业集团主办。大河网眼遇客户端，是河南最热闹的移动兴趣圈子和社交平台。|
http://www.wenweipo.com/|香港文汇报|||ゅ蹲呼琌翠ゅ蹲厨|
http://www.takungpao.com/|大公报|||大公网，百年大公报的新媒体平台。专注于时政、财经与生活资讯，提供新闻与独家评论。秉持“香港视角、中国观点、世界表达”的媒体理念，为全球华人提供媒体、公关、培训等多元媒体服务。|
http://www.chinadaily.com.cn/|中国日报||||
http://www.gxnews.com.cn/|广西新闻网|||广西新闻网为网友提供全面快捷权威的综合新闻信息报道，包括广西新闻、国内国际要闻、体育娱乐新闻、社会生活新闻、东盟博览会新闻、房产、汽车、健康女性、IT等多类新闻服务|
http://www.ynet.com/|北京青年报|||最适合白领人群阅读的资讯精选|
http://www.sxrb.com/|山西新闻网|||山西新闻网,主流媒体,山西门户。山西新闻网是经国务院新闻办审核批准，由山西日报报业集团主管、主办的山西省重点新闻网站。山西新闻网以“立足山西、传播山西、服务网友”为职责，走全媒体、多终端的发展道路，被中国互联网协会列为“全国百强网站”之一”。|
http://www.fjsen.com/|福建东南新闻网|||东南网（www.fjsen.com）前身为福建东南新闻网，成立于2001年10月，是经国务院新闻办公室批准的具有新闻登载资质的省级重点新闻网站。东南网是福建省规模最大的新闻门户网站，设有新闻、互动、资讯等版块30多个频道200多个栏目。借助上千名专职记者和通讯员在各地的新闻采集，东南网每天提供新闻资讯数千条，致力打造最快的本地新闻、最强的时政报道。网站同时发布福建日报报业集团旗下各报刊的数字报和电子版，提供各种本土生活资讯，搭建电子杂志、网络广告、博客、SNS交友、在线调查、视频、RSS订阅等综合性服务平台，介入丰富多彩的虚拟空间。|
http://www.thebeijingnews.com/|新京报|||新京报网以文字、图片、视频等全媒体形式，为用户提供全天候热点新闻，涵盖突发新闻、时事、财经、娱乐、体育，以及评论、杂志和博客等，新京报网本着品质源于责任的的信念,致力于成为用户喜爱的精品新闻网站。|
http://www.nddaily.com/|南方都市报||||
http://www.enorth.com.cn/|天津北方网||||
http://www.ycwb.com/|金羊网|||金羊网是广东省顶级报刊媒体羊城晚报集团旗下新媒体网站，华南区四大媒体网站之一，为用户提供最新新闻资讯等。并提供《羊城晚报》、《新快报》、《可乐生活》等多家报刊电子版！|
http://www.dzwww.com/|山东大众网|||山东新闻信息权威发布平台,山东重点新闻网站和外宣网站,大众报业集团网站,以中共山东省委机关报大众日报为旗帜和核心的报业集团。集团拥有大众日报、农村大众、齐鲁晚报、生活日报、鲁中晨报、半岛都市报、经济导报、青年记者、小记者等报纸、刊物。|
http://www.wccdaily.com.cn/|华西都市报|||《华西都市报》创刊于1995年1月1日，是中国第一张都市报，是四川发行量最大、影响力最强、覆盖面最广的综合性日报，也是中国西部最大区域组合城市媒体|
http://ctdsb.cnhubei.com/|楚天都市报|||楚天都市报电子版和多媒体官方站点，荆楚网每日上午10点为您提供楚天都市报最新的电子版报纸，给您提供最好的楚天都市报在线阅读体验。|
http://www.sanqindaily.com/|三秦网|||三秦网是中共陕西省委宣传部直接领导下的陕西新闻门户网站，同时也是陕西日报传媒集团纸媒在国际互联网上的重要出口，由三秦都市报主管主办。|
http://www.cqnews.net/|华龙网|||重庆华龙网集团有限公司（WWW.CQNEWS.NET）成立于2000年12月20日，是国务院新闻办公室批准组建的首批省级重点新闻网站，由中共重庆市委宣传部主管，重庆日报报业集团、重庆市国有文化资产经营管理有限责任公司、重庆广播电视集团（总台）作为股东联手打造，是集数字报、广播、电视、网络、手机报、客户端、微博、微信、户外LED、杂志等“十媒一体”的重庆首个全媒体网站。|
http://www.lnd.com.cn/|北国网||||
','',''),
('6068','4','0','新闻综合|4|','','http://news.sina.com.cn/|新浪新闻|||新浪网新闻中心是新浪网最重要的频道之一，24小时滚动报道国内、国际及社会新闻。每日编发新闻数以万计。|
http://www.xinhuanet.com/|新华网|||中国主要重点新闻网站,依托新华社遍布全球的采编网络,记者遍布世界100多个国家和地区,地方频道分布全国31个省市自治区,每天24小时同时使用6种语言滚动发稿,权威、准确、及时播发国内外重要新闻和重大突发事件,受众覆盖200多个国家和地区,发展论坛是全球知名的中文论坛。|
http://news.qq.com/|腾讯新闻|||腾讯新闻，事实派。新闻中心,包含有时政新闻、国内新闻、国际新闻、社会新闻、时事评论、新闻图片、新闻专题、新闻论坛、军事、历史、的专业时事报道门户网站|
http://news.163.com/|网易新闻|||新闻,新闻中心,包含有时政新闻,国内新闻,国际新闻,社会新闻,时事评论,新闻图片,新闻专题,新闻论坛,军事,历史,的专业时事报道门户网站|
http://www.chinanews.com.cn/|中新网|||中国新闻网是知名的中文新闻门户网站，也是全球互联网中文新闻资讯最重要的原创内容供应商之一。依托中新社遍布全球的采编网络,每天24小时面向广大网民和网络媒体，快速、准确地提供文字、图片、视频等多样化的资讯服务。在新闻报道方面，中新网动态新闻及时准确，解释性报道角度独特，稿件被国内外网络媒体大量转载。|
http://news.sohu.com/|搜狐新闻||||
http://www.people.com.cn/|人民网|||人民网，是世界十大报纸之一《人民日报》建设的以新闻为主的大型网上信息发布平台，也是互联网上最大的中文和多语种新闻网站之一。作为国家重点新闻网站，人民网以新闻报道的权威性、及时性、多样性和评论性为特色，在网民中树立起了“权威媒体、大众网站”的形象。|
http://news.china.com/|中华网新闻|||中华网新闻频道主要栏目：国内新闻、国际新闻、社会新闻、史海钩沉、老照片图库、经济|
http://news.cctv.com/|CCTV新闻|||CCTV.com央视网（中央电视台官方网站）新闻中心为全球用户24小时提供全面及时的中文资讯,同时开设视频、论坛等自由互动交流空间。|
http://www.ifeng.com/|凤凰网|||凤凰网是中国领先的综合门户网站，提供含文图音视频的全方位综合新闻资讯、深度访谈、观点评论、财经产品、互动应用、分享社区等服务，同时与凤凰无线、凤凰宽频形成三屏联动，为全球主流华人提供互联网、无线通信、电视网三网融合无缝衔接的新媒体优质体验。|
http://www.china.com.cn/|中国网|||国家重点新闻网站，拥有十个语种独立新闻采编、报道和发布权；第一时间报道国家重大新闻事件；国情信息库服务全球读者了解中国；国务院新闻办公室发布会独家网络直播发布网站；拥有国内外顶级学者专家资源，独家编发各种相关政策解读。|
http://www.dayoo.com/|大洋网||||
http://www.qianlong.com/|千龙网|||千龙网·中国首都网是中共北京市委宣传部主管主办，由北京日报社、北京人民广播电台、北京电视台、北京青年报社、北京晨报社等京城主要传媒共同发起和创办的国内第一家综合性新闻网站，是北京网络舆论宣传主阵地。千龙网于2000年5月25日正式开通。2012年，千龙网·中国首都网在过去12年的发展基础上，着眼发展新趋势和舆论传播格局新变革，开拓创新，迈入新一轮发展阶段。|
http://www.eastday.com/|东方网|||东方网,上海,新闻,政务,视频,图片,突发,原创,独家,现场,报道,博客,微博,交友,评论,访谈,长三角,财经,体育,娱乐,社会,军事,论坛,聊天,短信,世博|
http://www.cri.cn/|CRI国际在线||||
http://news.tom.com/|TOM新闻|||提供国内、国际、娱乐、体育等各方面新闻信息。含国内新闻、国际新闻、社会新闻、图片新闻、故事汇、探索、军事等栏目。|
http://news.21cn.com/|21CN新闻|||21CN新闻,关注最有价值的新闻；新闻频道,包含有国内新闻,国际新闻,社会新闻,新闻评论,新闻图片,新闻专题,的新闻资讯聚合门户网站。|
http://www.gmw.cn/|光明网|||光明网是光明日报在网络时代的新延伸，也是国内唯一一家定位于思想理论领域的中央重点新闻网站。光明网坚持“可读、可信、可用”的办网原则，以“新闻视野、文化视角、思想深度、理论高度”为理念，努力打造“知识分子网上精神家园，权威思想理论文化网站”。|
http://www.southcn.com/|南方网|||南方网/南方新闻网是经中共广东省委，广东省人民政府批准建设的新闻宣传网站。南方网/南方新闻网由广东省委宣传部主办主管并作为南方报业传媒集团之成员单位，获国务院新闻办公室批准从事登载新闻业务并被确定为全国重点新闻网站之一。南方网/南方新闻网作为华南地区最大型的新闻融合平台，是国内外网民认识、了解广东最权威、最快捷的途径。|
http://www.ce.cn/|中国经济网|||中国经济网是国家重点新闻网站中唯一以经济报道为中心的综合新闻网站，每日采写大量经济新闻，同时整合国内主要媒体经济新闻及信息，为政府部门、企业决策提供权威的参考依据；为所有关注经济生活的网络读者提供丰富及时的经济新闻。|
http://www.chinataiwan.org/|中国台湾网|||中国台湾网是中央台办和国台办管理的国家重点新闻网站，拥有庞大的涉台资源。全面报道台湾事务和两岸关系的重要新闻资讯，致力于传播两岸亲情，沟通两岸民意，服务两岸交流，是两岸网络信息枢纽和同胞交流互动平台。|
http://www.stnn.cc/|星岛环球网||||
http://www.huanqiu.com/|环球时报|||环球网是中国领先的国际资讯门户，拥有独立采编权的中央重点新闻网站。环球网秉承环球时报的国际视野，力求及时、客观、权威、独立地报道新闻，致力于应用前沿的互联网技术，为全球化时代的中国互联网用户提供与国际生活相关的资讯服务、互动社区。未来会致力于打造全球化在线生活平台，成为中国与国际之间沟通与交流的桥梁。|
http://www.zaobao.com/|联合早报|||Zaobao website - Home page|
http://www.rednet.cn/|红网||||
http://www.iopen.cn/|爱开大学生|||爱开大学生网是大学生网上家园,包括大学生创业,大学生就业,大学生职业生涯规划,大学生自我鉴定,大学生就业形势等信息.|
','',''),
('5986','1','9','时尚资讯|4|','','http://www.trends.com.cn/|时尚网|||时尚网（www.trends.com.cn）是中国第一个引进国际数字媒体及国际博主版权的时尚潮牌新媒体,提供时尚杂志潮流、时尚女装搭配、型男造型搭配、时尚芭莎流行趋势等时尚搭配资讯,了解更多时尚潮牌资讯就到时尚网.|
http://fashion.ifeng.com/|凤凰网-时尚||||
http://luxury.qq.com/|腾讯-时尚|||luxury.qq.com: 腾讯时尚频道，不止于了解时尚。参与时尚界一切话题与趋势。与时尚保持零距离，对于时尚界真正关心的话题，包括流行趋势、名人动态、生活方式、时尚体验永不放弃。奢侈品,服饰,珠宝,美容,名表,美食,酷品,奢华,名流,文化,展览,|
http://www.yoka.com/|Yoka时尚网|||YOKA时尚网是服务于高收入群体的时尚生活门户,时尚网站.专注提供时尚奢侈品资讯报道,品牌动态,购物交流等服务；同时也是时尚人士,明星生活交流的主题社区。优卡网,全方位诠释时尚奢华生活。|
http://gb.cri.cn/fashion|国际在线-时尚频道||||
http://fashion.mop.com/|猫扑-时尚系|||猫扑头条新闻包含国内外时事要闻,国内新闻,国际新闻,社会新闻,时事评论,新闻图片,突发事件，新闻论坛的专业时事报道站点|
http://www.ellechina.com/?d=1|ELLE中国||||
http://www.1626.com/|1626城中至潮|||1626,潮流爱好者集结的潮流购物分享社区,每日为您推送特价潮品,热卖潮牌,聚划算潮物,还有最新潮流资讯和潮流搭配图片,潮牌先锋新品推介,爱潮流，看潮人,就上1626潮流网!|
http://www.27.cn/|美悦时尚网||||
http://www.chinapp.com/|中国品牌网|||中国品牌网,中文品牌网,全球品牌网,中国品牌网,中国第一品牌网,全球中文品牌网|
','',''),
('5987','1','9','奢侈品|4|','','http://eladies.sina.com.cn/lux|新浪-奢华名品||||
http://women.sohu.com/luxury|搜狐-奢华风尚||||
http://luxury.pclady.com.cn/|太平洋女性网-奢华风尚|||太平洋女性网奢品频道是专业的奢侈品网络媒体,提供顶级产品的资讯和报道,通过时尚话题形成各种小圈子形成社区,教您领悟真正的时尚内涵。今天的奢侈品正是明天的必需品|
http://www.xiu.com/|走秀||||
http://www.shangpin.com/|尚品|||尚品网，轻奢时尚全球购。品牌官网授权，100%正品保证；海量新品，全球同步更新；支持货到付款，7天包退换，售后无忧；新人注册即送100元；手机下单全场包邮。|
http://www.buyfine.net/|有好网|||BUYFINE.NET, 有好网, BUYFINE, 中国领先的奢侈品时尚名牌购物网站, All of Luxury Designer Collections, 中国领先的国际名牌购物网站, Polo By Ralph Lauren 拉夫劳伦马球, BURBERRY 巴宝莉, Brooksbrothers 布克兄弟, Victoria`s Secret 维多利亚的秘密, MARC JACOBS 马克雅可布, Jcrew , Banana Republic 香蕉共和国, Juicy Couture 橘滋, MICHAEL KORS 迈克柯尔, DIESEL 迪赛, Gucci 古驰, Express , COACH 寇兹, THE NORTH FACE 乐斯菲斯, Abercrombie & fitch 阿贝克隆比 & 费奇, Levis 李维斯, Mulberry 玛百莉, Kate spade 凯特·丝蓓, Theory 希尔瑞, Vince , David Yurman 大卫·雅曼, Salvatore Ferragamo 薩瓦托 菲拉格慕, Lanvin 朗万, Armani Exchange 阿玛尼, RUGBY , Tory Burch 托里伯奇, VERA WANG 王薇薇, Diane Von Furstenberg 黛安 冯芙丝汀宝, DKNY 唐可娜儿, Alexander Wang 亚历山大·王, Calvin Klein 卡尔文克莱恩, Alexander McQueen 亚历山大 麦昆, UGG® australia 雪地靴, Hugo Boss 波士, HOLLISTER 霍利斯特, Timberland 天木蓝, FENDI 芬迪, Chloe 珂洛艾伊, Rag & Bone 瑞格布恩, Paul Smith 保罗史密斯, Maison Martin Margiela 梅森·马丁·马吉拉, Dsquared2 D二次方, PRADA 普拉达, GIVENCHY 纪梵希, TUMI 塔米, Yves Saint Laurent 伊夫圣罗兰, D&G , 7 For All Mankind , Vivienne Westwood 薇薇恩韦斯特伍德, Moncler , 3.1 Phillip Lim 菲利林3.1, Donna Karan 唐娜 凯伦, Giuseppe Zanotti 朱塞佩 萨诺第, Stella McCartney 斯特拉 麦卡特尼, Badgley Mischka 巴杰利·米施卡, Jil Sander 吉尔 桑达, Jimmy Choo 周仰杰, Manolo Blahnik 莫罗伯拉尼克, Bottega Veneta 宝缇嘉, Dolce & Gabbana 杜嘉班纳, Helmut Lang 海尔姆特·朗, VALENTINO 华伦天奴, GUESS 古斯, Armani Collezioni 阿玛尼 黑标, Emporio Armani 安普里奥阿玛尼, G-Star , Stuart Weitzman 斯图尔特·韦茨曼, Balenciaga 巴黎世家, Oscar de la Renta 奥斯卡·德拉伦塔, Acne 艾克妮, Christian Louboutin 克里斯提 鲁布托, Tods 托德斯, Christian Dior 克里斯汀 迪奥, Hanro , Kenneth Cole 凯尼斯·柯尔, Akris Punto 艾克瑞斯, Rebecca Taylor 瑞贝卡 泰勒, VERSACE 范思哲, Valextra, Tag Heuer, John Varvatos 约翰·瓦维托斯, True Religion 真实信仰牛仔, Missoni 米索尼, LACOSTE 法国鳄鱼, Etro 艾特罗, BETSEY JOHNSON 贝齐 约翰逊, BCBGMAXAZRIA , TOMMY HILFIGER 唐美希绯格, Red Valentino 华伦天奴年轻副线, Nudie Jeans , CONVERSE 匡威, St. John 圣约翰, Balmain, Alice + Olivia 爱丽丝 + 奥利维亚, Anne Klein 安妮克莱恩, Nina Ricci 莲娜丽姿, Marni, Jason Wu 吴季刚, Just Cavalli 卡沃利, AG Adriano Goldschmied , Jean Paul Gaultier 高缇耶, Herve Leger 荷芙妮格, Victorinox 瑞士维氏军官刀, Roberto Cavalli 罗伯特・卡沃利, Tom Ford 汤姆·福特, Brunello Cucinelli , Zegna 杰尼亚, Brioni, Rick Owens, Giorgio Armani 乔治阿玛尼,Miu Miu 缪缪, Canada Goose , Dr Martens 马丁靴, Jessica Simpson 杰西卡辛普森, Emilio Pucci 璞琪, Donatella 多娜泰拉·范思哲, Loro Piana 罗罗皮雅娜, Armani Jeans , Bikkembergs, Nancy Gonzalez 南希·冈萨雷斯, Bulova 宝路华, Fred Perry 弗莱德·派瑞, BALLY 巴利, MaxMara 麦丝玛拉, A. Testoni , Escada 爱斯卡达, Kipling 凯普林, Etienne Aigner 爱格纳, Ben Sherman 宾舍曼, Carlos Falchi 卡洛斯·方驰, Zac Posen 扎克·珀森, CARTIER 卡地亚, Marco Bicego, Judith Ripka, Roberto Coin|
http://www.mei.com/|魅力惠||||
http://www.uemall.com/|优e网|||欧美一线奢侈品牌当季款，现货送达或上海展示厅自取。靓装名履、箱包配饰、时尚男士、靓丽妆容、尚居家饰等各类商品，专柜价2-5折，网上高端百货不二之选。100%正品保证，7天退换货，全场免运费，支持货到付款，更可选择门店自提。|
http://www.secoo.com/|寺库|||寺库奢侈品网站(secoo.com)作为全球最大的奢侈品购物服务平台，涉及了奢侈品网上销售、奢侈品实体休闲会所、奢侈品鉴定与养护服务等主营业务，100%正品保证，全球奢品，尽在寺库。寺库，我是奢侈品！|
http://www.meici.com/|美西时尚|||中国奢侈品时尚网购平台【美西时尚】提供国际一线奢侈品品牌包包,服装,配件,鞋履等系列产品,100%正品保障,限量特卖4折起,7天无理由退换货,订购热线：400-600-6618 轻松享受奢华！|
http://www.saite.com/|赛特春天|||王府井网上商城依托王府井百货品牌优势，是集化妆品、服装、鞋帽、箱包、珠宝、配饰、户外、运动、家居生活等产品，定位于面向品位、品质、时尚和追求购物乐趣消费者的B2C精品购物平台。|
http://www.5lux.com/|第五大道|||第五大道(www.5lux.com)是中国第一家“网上的奥特莱斯”，提供奢侈品网购服务，在线折扣销售世界时尚名品、奢侈品和奢侈品保养服务，拥有品牌授权，支持专柜验货，7天无理由退换货，100%正品保证，为每位中国精英带来高端时尚生活品质快乐，是中国最大的奢侈品网站。|
http://www.aolai.com/|尚品奥莱||||
http://www.fragrancenet.com/|FragranceNetCPS||||
http://www.guuoo.com/|谷网|||谷网专注【正品手表导购】。男士女士情侣手表报价/图片，瑞士手表品牌腕表报价，正品手表商城团购手表、天梭、浪琴手表网购、提供最全手表品牌信息查阅，品牌商官方授权总代理。谷网正品承诺7天质量退货，货到付款，国家三包政策。|
','',''),
('5988','1','9','时尚杂志|4|','','http://www.ellechina.com/|世界时装之苑-ELLE|||ELLE中国高端女性门户，全方位解读最新的时装趋势，提供最专业的美容指南，剖析最热门的明星事件，倡导最健康的生活品质，分享最感人的情感故事，着力打造全新潮流女性高端门户。|
http://www.trendsmag.com/trendsmag/bazaar|BAZAAR-时尚芭莎||||
http://www.zcom.com/|ZCOM-电子杂志||||
http://www.trendsmag.com/trendsmag|时尚系列刊物||||
http://esquire.trends.com.cn/|时尚先生||||
http://www.jessicahk.com/|香港JESSICA||||
http://www.trendsmag.com/trendsmag/cosmogirl|时尚.娇点||||
http://madame.lefigaro.fr/|Figaromadame&#091;法&#093;|||L\'univers féminin du Figaro : toutes les tendances mode, beauté, people, bijoux, déco, design, recettes, mariage, enfants, cuisine... Le Web version luxe.|
','',''),
('5989','1','9','栏目头栏','','','<iframe width=\"100%\" frameborder=\"0\" scrolling=\"no\" allowtransparency=\"true\" style=\"height: 2512px;\" src=\"http://coop.pclady.com.cn/114/1405/intf3947.html\"></iframe>',''),
('6095','4','0','新疆报刊|4|16','','','',''),
('6096','4','0','贵州报刊|4|16','','http://www.qxnrb.com/|黔西南日报||||
','',''),
('6097','4','0','甘肃报刊|4|16','','http://www.gansudaily.com.cn/|每日甘肃网-甘肃日报||||
http://gnrb.gansudaily.com.cn/|甘南日报||||
http://zyrb.gansudaily.com.cn/|张掖日报||||
','',''),
('6098','4','0','海南报刊|4|16','','http://www.hndaily.com.cn/|海南日报||||
http://www.hntqb.com/|海南特区报||||
http://www.hkwb.net/|海口晚报|||海口网提供海口最权威,最快捷,最全面的海口新闻,是海口市唯一重点新闻网站,汇集海口新闻,生活资讯,汽车,体育,娱乐,视频,人文,健康,教育,旅游,彩票,婚庆,美食等为一体的海口权威新闻门户网站。|
','',''),
('6099','4','0','青海报刊|4|16','','http://www.qhnews.com/|青海新闻网-青海日报|||青海新闻网,青海,青海新闻,青海视频新闻,青海要闻,青海新闻图片,青海新闻中心,我省,热点新闻,新闻事件,特别关注,法制新闻,经济新闻,时政市县新闻,科教文体新闻,专题新闻,深度报道,新闻追踪,青海新闻大事,热点回顾 ,焦点网谈,记者专栏,图片新闻,图片中心,精品摄影,美女图片,明星写真,青海车市,青海楼市,青海美食,青海美女,楚文化 ,经典青海,青海特产,青海名校,精品推荐,展会,健康,健康乐园,美容护肤,情感话题,读书,热门小说,精彩视频,娱乐新闻, 时尚话题,短信,剧情介绍,西宁城市圈,西宁新闻,青海旅游|
','',''),
('6100','4','0','宁夏报刊|4|16','','http://www.nxnews.net/|宁夏新闻网|||权威媒体,宁夏门户-网上宁夏新闻总汇&#124;网上宁夏百科全书&#124;网上宁夏百姓家园&#124;宁夏日报,新消息报,法制新报,小龙人学习报,看天下,博客天下|
http://www.ycen.com.cn/|银川晚报|||银川新闻网,银川市重点新闻网,了解银川的第一选择,银川市综合性门户网站,银川新闻,银川日报,银川晚报,第一地产 汽车频道 豆包社区 旅游 美食 数码 家电 教育 健康 亲子 婚嫁 艺藏 时尚|
','',''),
('6101','4','0','西藏报刊|4|16','','','',''),
('6102','4','0','香港报刊|4|16','','http://www.wenweipo.com/|文匯报|||ゅ蹲呼琌翠ゅ蹲厨|
http://www.takungpao.com/|大公报|||大公网，百年大公报的新媒体平台。专注于时政、财经与生活资讯，提供新闻与独家评论。秉持“香港视角、中国观点、世界表达”的媒体理念，为全球华人提供媒体、公关、培训等多元媒体服务。|
http://www.magazine.com.hk/|亚太网||||
http://www.hkcd.com.hk/|香港商报|||《香港商報》是一份歷史悠久、發行海內外的商業財經類大報，1952年新中國成立初期即在香港正式創辦，至今已有57年的風雨歷程，是香港歷史上最爲悠久的中文報章之一，被中央政府定位爲中國的國際傳媒窗口（簡稱中國窗）：對外宣傳中國，對內報道國外；以商業財經宣傳爲主，以政治改革報道爲輔。|
','',''),
('5596','1','11','时尚生活|4|','','http://life.sina.com.cn/|新浪生活|||沈阳生活服务指南、生活社区，提供餐厅、休闲、购物、教育、健身等商户搜索及优惠打折下载，数码、化妆、演出、机票的评论及价格查询，实现“我的生活”定制与分享。|
http://life.21cn.com/|21cn生活|||妆品21CN生活频道关注两性、健康、美食、生活、奇闻等众多生活焦点话题，频道内容涉及养生、美食攻略、奇闻异事、健康百科、社会百态等相关的媒体关注密切相关的内容，做最专业的生活聚合门户网站。|
http://www.baixing.com/|百姓网||||
http://www.neeu.com/|Neeu奢侈品||||
','<iframe src=\"http://www.zhuqu.com/114la\" frameborder=\"0\" scrolling=\"no\" width=\"100%\" height=\"1500\" style=\"background-color:#FFF\"></iframe>',''),
('5597','1','11','衣食住行用|4|','','http://www.no5.com.cn/|No5时尚广场|||NO5时尚广场-国内领先的化妆品折扣网站,13年来赢得了超过2000000会员的信赖，在线销售护肤品、彩妆、香水、时尚礼品等种类的500多个品牌、20000多种商品。1800多城市直达，货到付款，15天不满意退换货保障，超低折扣促销，全场满额免运费！|
http://www.zhms.cn/|中华美食|||欢迎来到中华美食网,中华美食网为您提供美食菜谱大全,美食视频教学指南,家常菜谱,特色美食,健康饮食资讯等,是美食爱好者必上的网站,是中国饮食餐饮行业知名品牌。|
http://www.meishij.net/|美食杰|||美食杰 - 中国最优质的美食，食谱，菜谱网。做你最喜爱的美食网，菜谱网。提供最人性化的菜谱大全,食谱家常菜，家常菜谱大全的美食网,让人们在宣泄的都市中体验在家常做菜,享受美食的乐趣.找家常菜谱,上美食杰菜谱美食网|
http://www.dianping.com/|大众点评网|||中国城市消费指南 餐馆美食、购物、休闲娱乐、生活服务、活动优惠打折信息。大众点评网是中国第一家也是领先的web2.0式的本地搜索门户。商户的信息和评价全部由会员共同管理和维护。|
http://www.chinavegan.com/|素食文化|||中华素食网-中国专业素食资讯网站,也是中国素食者社区,包括素食资讯,素食咨询,素食新闻,素食文化,素食养生与健康,素食营养,素食菜谱,素食餐馆,素食论坛,素食美容,素食减肥,素食环保,素食专卖店,素食加盟,素食护生,素食主义者资讯介绍等。|
http://www.spos.com.cn/|食谱大全|||食谱网将美食与互联网完美结合,打造全新的餐饮资讯平台,提供菜谱、食谱、养生、美容、减肥等信息，同时也是福州最专业、最具人气的美食网站。|
http://www.fang.com/|搜房网|||沈阳搜房网房天下是中国最大的房地产家居网络平台，提供全面及时的房地产新闻资讯内容，为所有楼盘提供网上浏览、业主论坛和社区网站，房地产精英人物个人主页，是国内房地产媒体及业内外网友公认的全球最大的房地产网络平台，搜房网引擎给网友提供房地产网站中速度快捷内容全面的智能搜索。|
http://house.focus.cn/|焦点房产网|||搜狐焦点，爱家爱生活！北京搜狐焦点网是最大的北京房地产网站，提供最全面最及时的北京房产楼市资讯，北京房产楼盘详情、买房流程、业主论坛等高质量内容|
http://www.ctrip.com/|携程旅行|||携程旅行网是中国领先的在线旅行服务公司，向超过9000万会员提供酒店预订、酒店点评及特价酒店查询、机票预订、飞机票查询、时刻表、票价查询、航班查询、度假预订、商旅管理、为您的出行提供全方位旅行服务。|
http://flight.mangocity.com/|芒果网|||芒果网为您的出行提供机票,特价机票,打折机票，通过在线查询预订便可快速预订机票，同时为您提供国内航班信息查询，国内航班机票预订服务，超低的折扣价格，优质的预订服务，安全的支付平台，覆盖全国的服务网络，订机票首选芒果网。免费咨询电话：40066-40066|
http://tuan.qunar.com/|去哪儿||||
http://ditu.google.com/|谷歌地图||||
http://www.easiu.com/|中国易修网|||中国易修网是中国综合维修门户网。提供家电维修、电脑维修与电脑配件、手机维修、汽车维修与汽车配件、数码相机维修、办公设备维修与配件、机械维修与配件等维修商家和维修供求信息。同时提供维修资料,维修工具、维修培训、维修人才招聘求职信息|
http://www.jiazhuang.com/|家装网||||
http://www.huarenjie.com/|华人街|||华人街网是一个专门提供欧洲本地华人生活、消费信息和情感交流的网上生活家园。专注华人生活，让华人享受时尚生活乐趣。|
http://www.furuijinzhao.com/|保洁服务|||专业专注提供：保洁服务、物业管理、秩维管理、绿化养护、保洁物料配送……数一流服务，还看今朝|
','',''),
('5598','1','11','餐饮食品|4|16','','http://www.coca-cola.com.cn/|可口可乐|||欢迎浏览一路可口可乐，这里是可口可乐中国官方网站，提供最新最全的可口可乐产品资讯。立即点击体验可口可乐的世界。|
http://www.kfc.com.cn/kfccda/default.aspx|肯德基||||
http://www.yonghe.com.cn/|永和大王|||恭喜永和大王再度荣获中国食品健康七星奖!永和大王连续三年获得中国中式快餐行业C-BPI品牌力第一名&#124;大王美食&#124;大王送 4000979797&#124;加盟专区&#124;加入我们&#124;|
http://www.mcdonalds.com.cn/|麦当劳||||
http://www.chivas.com.cn/|芝华士||||
http://www.pizzahut.com.cn/phcda/index.aspx|必胜客||||
http://www.starbucks.cn/|星巴克||||
http://www.huiyuan.com.cn/|汇源|||汇源果汁是由中国汇源果汁集团生产的一系列果汁产品，“汇源果汁”是中国果汁行业第一品牌。了解汇源最新品牌动态请访问汇源官网。|
http://www.ubc-coffee.com/|上岛咖啡||||
http://www.nongfuspring.com/|农夫山泉||||
http://www.quanjude.com.cn/main.php|全聚德||||
http://www.nescafe.com.cn/|雀巢咖啡|||雀巢咖啡中国官方网站为您带来雀巢咖啡产品介绍,包含咖啡历史文化和咖啡健康在内的资料库大全,更有促销活动及新品发布最新动态等详细资讯。|
http://www.masterkong.com.cn/|康师傅||||
http://www.lolo.com.cn/|露露|||河北承德露露股份有限公司|
http://www.origus.com/|好伦哥|||好伦哥（ORIGUS）是外商独资西餐连锁企业，于1998年登陆中国，在中国率先推出了比萨自助经营模式。除了自助餐，好伦哥还提供零点、外送套餐、冷餐会等全方位服务，并成为2008北京奥运会新闻中心指定餐饮服务商。目前好伦哥已在全国数十个城市开办了百余家餐厅，并拥有数十万好伦哥会员。|
http://www.xfy.com.cn/|小肥羊||||
http://www.haagendazs.com.cn/|哈根达斯||||
http://www.uni-president.com.cn/|统一||||
http://www.jianlibao.com.cn/|健力宝|||广东健力宝集团有限公司|
http://www.wahaha.com.cn/|娃哈哈|||娃哈哈创建于1987年，在创始人宗庆后的领导下，现已发展成为一家集产品研发、生产、销售为一体的大型食品饮料企业集团，为中国最大、全球领先的的饮料生产企业。公司产品涉及含乳饮料、瓶装水、碳酸饮料、茶饮料、果汁饮料、罐头食品、医药保健品、休闲食品、婴儿奶粉等九大类150多个品种。|
http://www.tsingtao.com.cn/|青岛啤酒||||
http://www.meadjohnson.com.cn/|美赞臣|||美赞臣创立于1905年,创始人为爱德华·美赞臣.至今已有百年历史,是世界上生产营养品的大型跨国企业之一,堪称世界营养权威.美赞臣拥有全球统一的全程质量安全管理体系,涵盖了从产品研发到产品被消费的全过程.100%进口奶源,提供安全的品质和科学的营养.|
http://www.o-box.cn/|统一鲜橙多||||
http://www.yanjing.com.cn/|燕京啤酒||||
http://www.heinz.com.cn/|亨氏||||
http://www.luhua.cn/index.asp|鲁花||||
http://www.dumex.com.cn/|多美滋|||多美滋奶粉,100%爱尔兰原装进口精确盈养+，专为中国宝宝营养需求，抢先预购共享百万豪礼！访问多美滋官方网站了解多美滋奶粉品牌故事,专家在线咨询为您解答孕育问题,让宝宝健康成长。|
http://www.mengniu.com.cn/|蒙牛|||蒙牛乳业是中国领先的乳制品供应商，专注于研发并生产适合国人的乳制品，建立了全链条端到端质量保障体系。先后与中国领先的粮油食品企业中粮集团、欧洲领先的乳企Arla Foods达成战略合作，对标国际品质。|
http://www.yili.com/|伊利|||伊利牛奶是绿色，健康，纯天然的|
http://www.wuliangye.com.cn/|五粮液||||
http://www.danone-institute.org.cn/|达能营养||||
http://www.cb-dl.com/|大连城邦饮品||||
','',''),
('5599','1','11','生活日用|4|16','','http://www.head-shoulders.com.cn/|海飞丝||||
http://www.slek.com.cn/|舒蕾|||舒蕾坚持以塑造中国女性健康美丽为己任，倡导“健康最美”的生活方式和美丽观，同时以不断创新的科研技术作为卓越品质保证，针对消费者日益细分的个人护理需求，不断研发推出新产品，满足广大女性对秀发和肌肤呵护的需要。|
http://www.mentholatum.com.cn/|曼秀雷敦|||曼秀雷敦自1889年创立以来，分支机构遍布全球多个国家。1991年，曼秀雷敦（中国）药业有限公司在广东省中山市成立，其先进的生产设备、严谨的生产标准及专业的销售团队，成为曼秀雷敦服务广大中国消费者的有力支持。曼秀雷敦（中国）药业有限公司，于1991年10月建成投产，总投资额逾一亿元人民币，扩建后总建筑面积达12,440平方，厂内各种生产设备均由美国曼秀雷敦公司及日本乐敦药厂引进。为了确保能于最卫生、最安全的工作环境下生产出稳定高质量的产品，厂房及高科技无菌密封式的生产车间，如药物药品车间（眼药水车间和软膏剂车间）、医疗器械车间、化妆品车间（润唇膏车间和抗晒乳液车间），均符合GMP要求。厂内还设有高科技研发部门，为产品品质奠定了基础。曼秀雷敦进驻中国近二十年以来，凭借不断创新丰富的日用药品和个人护理产品线，为广大消费者带来周全细心的关爱。现时，中国曼秀雷敦主要生产曼秀雷敦和乐敦系列产品，包括薄荷膏系列、乐敦眼药水系列、新碧防晒系列、乐肤洁系列、男士护肤系列、欧治型男护肤系列、肌研护肤系列、潇洒去头屑洗发系列、乐碧止汗系列、什果冰等润唇系列等等，除满足中国消费者需求，更远销英国、美国、德国、法国、澳洲、加拿大、日本及新马泰等地。自90年代初什果冰润唇膏及新乐敦眼药水在中国分别掀起润唇、护眼的潮流后，近20年间，曼秀雷敦继续积极拓展中国市场，于北京、上海、广州三大城市建立分公司，并同时在大连、天津、哈尔滨、沈阳、南京、苏州、无锡、杭州、宁波、中山、汕头、成都、重庆、武汉及深圳等城市进行发展，致力为全中国消费者提供优质产品。曼秀雷敦，处处关怀。|
http://www.pg.com.cn/|宝洁|||宝洁中国官方网站。宝洁公司是中国最大的日用消费品公司，飘柔、舒肤佳、玉兰油、帮宝适、汰渍及吉列等品牌在各自的产品领域内都处于领先的市场地位。|
http://www.china-ajjj.com/|爱家家居||||
http://www.rejoice.com.cn/|飘柔|||飘柔洗发水和飘柔护发素富含多倍维他命配方和全球独创角蛋白损伤隔离因子,让你拥有梦寐以求的秀发,飘柔官网更为你的秀发量身定制健康护发方案,让你闪耀全场|
http://www.cnnice.com/|纳爱斯||||
http://www.watsons.com.cn/|屈臣氏|||屈臣氏官方网上健与美购物商城，过百强势品牌进驻，100%正品保证，全场多款给力优惠，支持会员积分，全国快捷配送。更有最新实体店优惠活动随时看。|
http://www.unilever.com.cn/|联合利华|||联合利华中国主页|
http://www.ikea.com/ms/zh_CN|宜家||||
http://www.colgate.com.cn/app/Colgate/CN/HomePage.cvsp|高露洁||||
http://www.c-bons.com.cn/|丝宝|||丝宝集团是在香港注册的国际集团公司。1989年进入中国大陆发展实业，并在湖北省武汉市设立中国总部，主要涉及卫生用品、药业、房地产、旅游、纺织业等领域。”|
http://www.carrefour.com.cn/|家乐福||||
http://www.vs.com.cn/|沙宣|||沙宣是由国际著名美发大师维达沙宣作为品牌形象大使，并用其名为品牌，从而树立起专业洗发、护发的形象。沙宣作为国际美发先锋，从怀旧的摇滚到摩登的T台时装秀每一款都张扬着沙宣的创新精神|
http://www.crest.com.cn/|佳洁士|||欢迎登陆佳洁士官网，清洁口腔，保护牙齿健康，佳洁士健康炫白，笑开怀。佳洁士首页为消费者提供最新产品。|
http://www.amway.com.cn/index.aspx|安利||||
http://www.wal-martchina.com/|沃尔玛|||沃尔玛中国公司信息网站|
http://www.zjyoubei.com/|开化优贝家具有限公司|||浙江优贝家具有限公司是专业生产钢木家具系列产品的。公司主要提供铁床批发、铁床价格、仓储货架批发、仓储货架价格、食堂餐桌批发、食堂餐桌价格、公寓床批发、公寓床价格等信息。拥有从德国、台湾等地进口先进家具制造设备，自动化程度较高。公司“以诚信为本，以质量求生存”，坚持“物美、价廉、打造现代钢木家具典范”的经营理念，经过不懈的努力和先进的、严格的质量控制，使优贝家具逐步成为“钢木家具”知名优秀品牌。拥有了质量才能拥有市场，创新成就未来，我们将不断努力，使品牌日趋完美，优贝全体员工愿真诚为您服务并回报社会ﺿ|
http://www.zjybjck.com/|亦博进||||
','',''),
('5600','1','11','化妆品牌|4|16','','http://www.lancome.com.cn/_zh/_cn/index.aspx|兰蔻-Lancome||||
http://www.chanel.com/|香奈儿-Chanel|||Enter the world of CHANEL and discover the latest in Fashion & Accessories, Eyewear, Fragrance, Skincare & Makeup, Fine Jewellery & Watches.|
http://www.shiseido.com.tw/|资生堂-Shiseido||||
http://www.olay.com.cn/|玉兰油-Olay|||OLAY(玉兰油)中国官方网站，玉兰油是抗老化与皮肤护理专家，全方位的抗老化和皮肤护理产品，以及各种皮肤护理技巧。官方网站提供Olay相关抗老化和皮肤护理产品的在线购买。|
http://www.maybellinechina.com/|美宝莲||||
http://www.clinique.com.cn/index.tmpl?ngextredir=1|倩碧-Clinique||||
http://www.kose.co.jp/|高丝-KOSE||||
http://www.avon.com.cn/PRSuite/home/home.jsp|雅芳-Avon||||
http://www.esteelauder.com/|雅诗兰黛-Esteelauder|||Discover Beauty at esteelauder.com, your destination for high-performance Skincare, Makeup, Fragrance, videos, more. Free Shipping &amp; Returns|
http://www.nivea.com/|妮维雅-Nivea||||
http://www.vichy.com.cn/|薇姿-VICHY|||薇姿（VICHY）是全球专业敏感肌护肤领先品牌。薇姿一直关注于美丽，并倡导健康引导美丽，且不断探索创新，1600年以来享有 温泉皇后 的美誉。|
http://www.shu-uemura.co.jp/|植村秀||||
http://www.marykay.com.cn/|玫琳凯-Marykay|||全球最大的护肤品和彩妆品直销企业之一。登录官网或致电8008201655寻找你的美容顾问，获取专属美丽密码，量身定制你的美丽！|
http://www.tjoy.biz/|丁家宜-TJOY||||
http://www.tayoi.com/|东洋之花|||东洋之花官方网站|
http://www.ettusais.co.jp/|Ettusais艾杜紗|||壔徬昳僽儔儞僪亂僄僥儏僙亃偺岞幃捠斕丅僄僥儏僙偼僾儔僓丒儘僼僩側偳傪拞怱偵揥奐偟偰偄傞乽僇儚僀僀偗傟偳僗僌儗儌僲乿 側壔徬昳僽儔儞僪偱偡丅偍攦偄媮傔偼埨怱埨慡側岞幃僒僀僩偱丅|
http://www.ocliane.cn/|欧克兰妮||||
','',''),
('5601','1','11','服饰品牌|4|16','','http://www.nike.com.cn/|耐克|||访问耐克(Nike)官网，了解最新的运动训练理念及产品信息，成为耐克会员，自由畅快的购物体验，尽在Nike.com.|
http://www.li-ning.com.cn/|李宁|||2|
http://www.bosideng.com/|波司登|||波司登国际控股有限公司连同其附属公司是中国最大的羽绒服装企业，旗下的四大核心羽绒服品牌包括波司登、雪中飞、康博和冰洁。通过这些品牌，本集团提供多种羽绒服产品以迎合不同阶层的消费者，藉此进一步巩固其在中国羽绒服行业的市场龙头地位。|
http://www.pirateship.com.cn/|海盗船||||
http://www.adidas.com/|阿迪达斯|||Browse for adidas shoes, clothing and collections, adidas Originals, Running, Football, Training and more on the official adidas website.|
http://www.converse.com.cn/|匡威|||CONVERSE匡威官方网站,美国著名帆布鞋品牌,辉煌历史创于1908年,代表永恒不灭的原创力。匡威官网独家限量发售匡威帆布鞋,板鞋,T恤衫,卫衣,外套夹克,牛仔裤,短裤,双肩包等匡威产品,街头潮流,滑板文化,匡威为你提供全面的装备。|
http://www.romon.com/index.php|罗蒙服装||||
http://www.bossini.com/bossini/html/eng/common/index.jsp|堡狮龙||||
http://www.etam.com.cn/|艾格||||
http://www.rbk.com/cn/default.htm|锐步-Reebok||||
http://www.mizuno.com.cn/|美津浓||||
http://www.goldlion-china.com/|金利来|||金利来集团|
http://www.phland.com.cn/|丽婴房|||les|
http://www.betu.com.hk/|百图|||深圳百多尔时装有限公司|
http://www.puma.com/|彪马-Puma|||PUMA是全球最快的运动品牌，设计、开发、销售并推广各种鞋类、服装以及配件产品。走过65年辉煌足迹，PUMA秉承着“Forever Faster”的品牌理念，致力于用胆色、自信、坚定和痛快的价值理念影响体育行业。PUMA提供包括足球、跑步、训练、健身、高尔夫及赛车领域的运动产品和源自运动灵感的生活系列产品。PUMA同亚历山大·麦昆(Alexander McQueen)在内的顶尖设计品牌携手合作，将最前沿和最快的设计融入运动界。PUMA集团旗下品牌包括：PUMA、Cobra Golf、Tretorn、Dobotex以及Brandon。PUMA总部位于德国赫尔佐根，在全球范围内约有10,000名员工，产品远销120多个国家和地区。|
http://www.pierrecardan.cn/|皮尔卡丹||||
http://www.bobdog.com.cn/|巴布豆||||
http://www.fairyfair.com/|淑女屋||||
http://www.e-giordano.com/|佐丹奴||||
http://www.formosa-optical.com.tw/|宝岛眼镜|||專業好視力，服務好品質【寶島眼鏡】|
http://www.lee.com.cn/|lee|||H.D. Lee Mercantile公司于1889年在美国堪萨斯创立了Lee品牌。1926年Lee发明了世界上第一条带拉链牛仔裤101Z系列，与之后推出著名的 Hair-On-Hide 马毛皮版和Ş形后袋产品车缝线设计（Lazy S）一同成为Lee的经典标志。从推出第一款具有保护性的Lee Bib连身工装裤，到13安士重磅丹宁布制作的经典101系列，Lee始终锐意创新，在牛仔服装从实用走向时尚的过程中，扮演了至关重要的角色。 Lee一直保存传统，同时不断创新，在牛仔时尚界稳占领导地位，与时尚的年青一代连成一线，被誉为牛仔文化的经典。|
http://www.rojrover.com/html/main.htm|莱姿||||
http://www.semir.com/|森马||||
http://www.triumph.com.cn/|黛安芬||||
http://only.nzn.cn/|only||||
http://www.moiselle.com.hk/|慕诗-MOISELLE||||
http://www.balenciaga.com/|巴黎世家|||发现 Balenciaga 女士及男士系列并在线选购鞋履、手袋与服装。|
http://www.ordifen.com.cn/|欧迪芬|||欧迪芬国际集团1980年成立于台湾，是一家专业生产女性内衣及经营欧迪芬品牌的公司十多年来以其深厚的经营经验、坚强的生产能力，以及前卫的设计风格，将产品成功推进法国、美国、日本等国际内衣市场。|
http://www.ochirly.com/|欧时力-OCHIRLY||||
http://www.frcports.com/|宝姿||||
http://www.white-collar.com/|白领||||
http://www.sunflora.com.cn/|桑扶兰||||
http://www.alergin.com.cn/|阿勒锦-A.LerGin||||
http://www.azona.com.hk/|阿桑娜-azona|||AZONA集团品牌,香港设计师的原创潮流女装品牌，深受时尚女性追捧的时装系列。集团至今已在中国开设了500多个销售点及形象店。|
http://www.freebird.com.cn/|自由鸟||||
http://www.valentino.it/|瓦伦蒂诺-ntino|||探索华伦天奴的世界：新品系列、秀场展示、在线店铺、Rockstud 配饰、新闻资讯以及更|
http://www.aimer.com.cn/|爱慕|||内衣、女士内衣、男士内衣、儿童内衣|
http://www.septwolves.com/|七匹狼|||男人不只一面，七匹狼男装是中国男装行业开创性品牌，始终致力于为消费者提供满足现代多元化生活需求的高品质服装产品，2015年七匹狼受米兰时装周官方邀请走秀，并以时尚产业整合集团的全新身份亮相国际舞台|
http://www.baleno.com.hk/|班尼路||||
http://www.metersbonwe.com/|美特斯·邦威||||
http://www.belle.com.cn/|百丽||||
http://www.teenmix.com.cn/|天美意|||天美意-描述|
http://www.chinajierda.com/|吉尔达|||温州吉尔达|
http://www.daphne.com.cn/|达芙妮|||达芙妮集团于1987年成立,旗下拥有包括:达芙妮、鞋柜Shoebox、AEE、dulala、ALDO、 AEROSOLES、Step Higher等知名品牌及通路渠道。|
http://www.c-banner.com/|千百度|||.|
http://www.staccato.com/|思加图-STACCATO|||STACCATO is an iconic fashion footwear brand which encompasses a confident sense of style. The brand traces its root to the meaning of STACCATO. “ STACCATO ” is a form of musical articulation, a note holds a grace melody that empowers creativity and diversity. Jumping notes is symbolized as a contemporary lady who walks confidently and comfortably with her high heels, and reflects an attitude of young and stylish. STACCATO commits to excite and inspire the fashionista with its edgy yet sophisticated design. The brand brings the exquisite shoes from runway to real way which expresses the cosmopolitan working ladies with their unique style every day.|
http://www.jeanswest.com/|真维斯|||Jeanswest Online Store now open! Find the latest in Jeans, Denim and Fashion Clothing at Jeanswest. Regular competitons, key looks and more...真维斯服饰(中国)有限公司,休闲服饰品牌|
http://www.kappa.com.cn/|背靠背-Kappa||||
http://www.cnhqt.com/|红蜻蜓||||
http://www.doublestar.com.cn/|双星|||双星集团有限责任公司双星集团|
http://www.robinhood.com.cn/|罗宾汉|||罗宾汉|
http://www.aokang.com.cn/|奥康王||||
http://www.fzjm.cn/|中国服装加盟网|||中国服装加盟网【fzjm.cn】是中国专业的服装加盟平台.为您提供：服装加盟代理,服装招商等国内品牌服装信息。包括有：品牌女装加盟,品牌男装加盟,品牌童装加盟,品牌内衣加盟,运动品牌加盟,休闲品牌加盟及品牌服装加盟店排行榜等相关资讯。|
','',''),
('5602','1','11','手机品牌|4|16','','http://www.nokia.com.cn/|诺基亚|||欢迎访问诺基亚 - 我们致力于人类科技的可能性来帮助人类的繁荣。|
http://www.ericsson.com.cn/|索尼爱立信|||Ericsson is shaping the future of mobile broadband Internet communications through its continuous technology leadership,  helping to create the most powerful communication companies in the world.|
http://www.chinabird.com/|波导|||欢迎光临宁波波导股份有限公司，宁波波导股份有限公司是专业从事移动通讯产品开发、制造和销售的高科技上市公司，是通过国家科技部和中国科学院的高新技术企业评审的国家级重点高新技术企业|
http://www.motorola.com.cn/|摩托罗拉|||null|
http://www.alcatel-lucent.com/|阿尔卡特||||
http://www.samsung.com.cn/|三星|||三星手机等产品官方网站。想象三星能为您做什么？在这里您可以找到三星手机、三星笔记本、三星显示器、三星电视、三星数码相机、三星打印机、三星家电等三星产品官方介绍及服务支持信息。|
http://www.philips.com.cn/|飞利浦|||了解更多关于飞利浦如何通过在医疗保健、优质生活和照明领域进行有意义的创新来提升人们生活品质的信息。|
http://www.amobile.com.cn/|夏新|||夏新官方商城是夏新科技有限责任公司自主运营的B2C销售平台，商城中销售的夏新产品确保品质、保证售后，请消费者放心购买，夏新大V闪亮登场|
http://www.tclmobile.com.cn/|TCL|||TCL手机官网提供最新TCL智能手机产品资讯，详细功能参数、手机实物图，精美配件及售后服务，铁粉社区铁就一起来！|
http://www.siemens.com/|西门子|||Electrification, automation and digitalization require innovative solutions: Discover Siemens as a strong partner, technological pioneer and responsible employer.|
','',''),
('5603','1','11','汽车品牌|4|16','','http://www.mercedes-benz.com.cn/|奔驰中国|||欢迎浏览梅赛德斯-奔驰中国网站。在这里您可以浏览有关奔驰乘用车、AMG、商用汽车，梅赛德斯-奔驰的优质服务、最新消息及活动，一级方程式赛车的精彩信息以及职位招聘的相关信息。|
http://www.bmw.com.cn/|宝马中国|||访问BMW中国官方网站，详细了解BMW全线车型，BMW官方价格，BMW最新市场活动和新闻，BMW官方授权经销商，BMW二手车，金融服务与BMW原装配件的详尽信息。BMW中国官方俱乐部，精彩在线视频，带您步入BMW天地，开启BMW驾驶乐趣之旅。|
http://www.audi.cn/|奥迪|||欢迎来到一汽-大众奥迪官方网站。在这里您可以查看奥迪全线车型、奥迪授权经销商、奥迪品鉴二手车、奥迪服务、奥迪领先科技等内容，了解奥迪最新活动动态，下载奥迪资讯等。|
http://www.buick.com.cn/|别克中国|||欢迎访问上汽通用别克品牌中国官方网站。在这里，您将可以了解别克全线车型，品牌最新动态新闻，市场活动，及全国授权经销商。免费咨询热线: 800-820-2020。|
http://www.ford.com.cn/|福特|||View the range of new Ford vehicles.|
http://www.csvw.com/|上海大众||||
http://www.toyota.com.cn/|丰田汽车|||丰田的企业讯息,产品以及技术,环境和社会活动等企业报道的官方网站。|
http://www.guangzhouhonda.com.cn/|广州本田||||
http://www.beijing-hyundai.com.cn/|北京现代||||
http://www.peugeot.com.cn/|东风标致|||东风标致官方网站,提供您东风标致全车系最详尽的产品资料,配置价格,售后服务,新闻资讯和市场活动,您可以线上查询东风标致经销商,预约试驾,在线订车,享受全新驾驭感受.根基于严谨激情致雅的品牌优势,东风标致与您同心同行,标新致远。|
http://www.mitsubishi-motors.com.cn/|三菱|||三菱汽车销售（中国）有限公司官方网站首页。MITSUBISHI MOTORS 三菱汽车中国的官方网页。新闻与活动信息、车种介绍（微型车,小型车,紧凑型车,中型车,中大型车,豪华车,跑车,MPV,多功能乘用车,SUV,越野车）、经销商检索、企业信息等。|
http://www.tjfaw.com/|一汽夏利||||
http://www.haima.com/|海南马自达||||
http://www.jmc.com.cn/|江铃汽车||||
http://www.chery.cn/|奇瑞汽车|||奇瑞汽车官网为您提供奇瑞艾瑞泽7,瑞虎5,瑞虎3,奇瑞E3,奇瑞E5等各款车型的报价、油耗、性能等参数及各经销商信息,支持消费者预约试驾及在线购买,更多奇瑞汽车、二手车等信息尽在奇瑞官方网站。|
http://www.changansuzuki.com/|长安铃木|||长安铃木官方网站,包括世界级小车领袖新奥拓、极具驾驶乐趣的两厢车雨燕、真正的跨界车天语SX4、黄金性价比之车天语尚悦、省油耐用好养护新羚羊的车型展示|
','',''),
('5604','1','11','家电品牌|4|16','','http://www.skyworth.com/|创维||||
http://www.sony.com.cn/|索尼|||索尼（Sony）在中国网站，全面介绍Sony公司的各项业务.提供丰富的产品信息，包括数码相机，摄像机，笔记本电脑，电视系列，影音产品等以及售后服务和购买服务|
http://www.siemens.com.cn/|西门子|||电气化、自动化和数字化需要创新解决方案：西门子中国是实力强大的合作伙伴、技术先锋和负责任的雇主。|
http://www.gree.com.cn/|格力|||成立于1991年的珠海格力电器股份有限公司是目前全球最大的集研发、生产、销售、服务于一体的国有控股专业化空调企业，2012年实现营业总收入1001.10亿元，纳税超过74亿元，连续12年上榜美国《财富》杂志中国上市公司100强。|
http://www.shinco.com/|新科||||
http://www.midea.com.cn/|美的|||美的集团官网,是美的集团唯一官方商城,商城致力于为用户提供最新、最全、最优惠的一站式购物体验,涵盖品类包括美的空调、冰箱、洗衣机、净水器、中央空调、电饭煲、微波炉、电风扇等大小家电产品,全场正品包邮,全国联保,让您轻松购物,享受无忧售后！|
http://www.samsung.com.cn/|三星|||三星手机等产品官方网站。想象三星能为您做什么？在这里您可以找到三星手机、三星笔记本、三星显示器、三星电视、三星数码相机、三星打印机、三星家电等三星产品官方介绍及服务支持信息。|
http://www.hitachi.com.cn/|日立||||
http://www.electrolux.com.cn/|伊莱克斯||||
http://www.toshiba.com.cn/|东芝|||东芝集团创立于1875年，致力于为人类和地球的明天而努力奋斗，力争成为能创造丰富的价值并能为全人类的生活、文化作贡献的企业集团，东芝集团业务领域包括数码产品、电子元器件、社会基础设备、家电等。|
http://www.canon.com.cn/|佳能|||佳能公司是以光学为核心的相机与办公设备制造商，始终以创造世界一流产品为目标，积极推动事业向多元化和全球化发展。|
http://www.littleswan.com/|小天鹅|||无锡小天鹅股份有限公司|
http://www.lg.com.cn/|LG|||LG中国公司多年来不断创新，生产将尖端科技与顶级外观设计完美融合的电视，手机，冰箱，空调，显示器等优质LG产品，让智能科技为中国消费者享受更轻松舒适的家居生活。|
http://cn.changhong.com/|长虹||||
http://www.haier.com/|海尔|||海尔产品官方网站，官方权威信息发布，最新最全产品信息、会员权益、优惠活动、网上报修、购买渠道查询等，海尔产品一站式体验，提供海尔冰箱、海尔空调、海尔洗衣机、海尔电视、海尔热水器、海尔厨电、海尔厨房、海尔电脑、海尔手机、海尔生活家电、海尔智能产品等所有海尔在售产品的信息查询及反馈、购买渠道选择、售后服务等。|
http://www.philips.com.cn/|飞利浦|||了解更多关于飞利浦如何通过在医疗保健、优质生活和照明领域进行有意义的创新来提升人们生活品质的信息。|
http://www.konka.com/|康佳||||
http://www.tcl.com/|TCL|||TCL集团股份有限公司是中国最大、全球性规模经营的消费类电子企业集团之一。 TCL旗下有四家上市公司并形成五大产业。TCL创意感动生活|
http://www.supor.com.cn/|苏泊尔||||
http://www.fotile.com/|方太|||方太始终坚持专业,高端,负责的战略性定位,品牌实力不断提升.目前方太产品包括油烟机,燃气灶,消毒柜,蒸箱,烤箱,微波炉,水槽洗碗机,热水器,查找更多方太产品详情尽在FOTILE方太厨房电器官方网站!|
http://www.galanz.com.cn/|格兰仕|||格兰仕集团-百年企业,世界品牌.拥有国际领先的微波炉、空调、生活电器及日用电器研究和制造中心|
http://www.chinamacro.com/|万家乐||||
http://www.sacon.cn/|帅康|||帅康集团坐落在杭州湾南岸宁波市余姚境内，是中国家电行业中以生产厨卫家电系列产品为主，以资产、技术、产品、管理为纽带，以帅康集团有限公司为核心，由32家企业组成的现代企业集团。|
http://www.sharp.cn/|夏普|||夏普公司是以诚意和创意作为经营宗旨的大型的综合性电子信息公司。自1912年创业以来，通过至诚与创新的工作，一直在为大家生活的提高和社会的进步作着贡献和努力。目前，夏普AQUOS液晶电视、手机、白色家电等产品均得到了市场的认可，深受消费者喜爱。|
http://www.shspt.com/cs1.htm|尚朋堂||||
http://www.chunlan.com/|春兰|||春兰（集团）公司是集制造、科研、投资、贸易于一体的多元化、高科技、国际化的大型现代公司，是中国最大的企业集团之一。公司下辖42个独立子公司，其中制造公司18家，并设有春兰研究院、春兰学院、博士后工作站和国家级技术开发中心。春兰产业覆盖制造业、流通业、投资业、能源产业、服务业等，主导产品包括空调器、洗衣机、压缩机、除湿机、自动车、高能动力镍氢电池、机械及动力产品等。|
http://www.kelon.com/|科龙|||海信科龙电器股份有限公司是中国最大的白电产品制造企业之一，创立于1984年，总部位于中国广东顺德，主要生产冰箱、空调、冷柜和洗衣机等系列产品。|
http://www.hisense.com/|海信||||
http://www.rongsheng.biz/|容声|||广东容声电器股份有限公司,专业制造大吸力油烟机,高温消毒柜,节能燃气灶具,多功能集成灶,热水器,冰箱,橱柜等厨卫电器,容声电器,为您营造美满生活,全国招商,欢迎垂询!|
http://www.sast.com.cn/|先科||||
http://www.aucma.com.cn/|澳柯玛|||秉承“没有最好 只有更好”的专注精神，澳柯玛专注冷柜制造26年，家用制冷、商用冷链、生物冷链、超低温设备行业领先。为全球合作伙伴提供全冷链解决方案，全力打造制冷第一竞争力，为中国制造赢得世界尊敬。|
http://www.auxgroup.com/|奥克斯||||
http://www.gdbbk.com/|步步高||||
http://www.xoceco.com.cn/|厦华||||
http://www.xinfei.com/|新飞电器||||
http://www.cnsuning.com/|苏宁电器|||苏宁(Suning.cn)是中国最大的商业零售企业，依托线上线下平台优势，率先在行业内推行O2O模式，经营品类涵盖家电、3C、母婴、百货、超市、服装等|
http://www.gome.com.cn/|国美电器|||国美在线(Gome.com.cn)国美电器唯一官方网上商城，中国领先的专业家电网购平台。全球品牌电视、洗衣机、电脑、手机、数码、空调、电脑配件、生活电器、网络产品等正品行货，更低价格，更快送达，为您提供便捷、诚信的服务。有国美，生活美！|
','',''),
('5605','1','11','品牌电脑|4|16','','http://www.lenovo.com.cn/|联想|||联想官方网上商城,为您提供最新联想笔记本电脑,联想平板电脑,联想手机,联想台式机,联想一体电脑,联想服务器,联想外设数码产品,联想智能电视等产品在线购买及售后服务,您提供愉悦的网上购物体验|
http://www.apple.com.cn/|苹果|||Apple 凭借 iPhone、iPad、Mac、Apple Watch、iOS、OS X、watchOS 等产品引领了全球创新。你可以访问网站，了解和购买产品，并获得技术支持。|
http://www.foundertech.com/|方正|||方正科技官方网站,介绍方正科技销售产品|
http://www.tclinfo.com/|TCL电脑||||
http://www.dell.com.cn/|DELL|||欢迎访问戴尔官方网站。Dell中国为个人、家庭、企业办公等提供高品质戴尔产品及服务。登录Dell官方网站查询最新Dell产品价格、戴尔优惠活动、戴尔售后服务信息等。|
http://notebook.samsung.com.cn/|三星||||
http://www.hedy.com.cn/|七喜|||七喜控股 七喜控股 七喜控股|
http://www.hasee.com/|神舟||||
http://www.asus.com/|华硕|||华硕电脑是全球消费型笔记本电脑全球第三大,主板全球第一的厂商.拥有世界级研发团队,2013年赢得4,256个奖项.2013年营收达到140亿美金,是数字新时代最受推崇的世界级领导企业.|
http://www.ibm.com/cn|IBM||||
http://www.benq.com.cn/|明基|||你可以找到BenQ多元化的产品信息，包括投影机、液晶显示器、商用大型显示器（交互式、数字广告牌）、数码相机/摄像机、移动网络产品、LED 照明等，以及明基优惠活动、明基购买服务和明基售后服务信息等。BenQ用心帮你实现数字生活的崭新乐趣。|
http://www.greatwall.com.cn/|金长城||||
http://www.acer.com.cn/|宏碁|||宏碁的产品范围包括面向家庭用户、企业、政府和教育机构的笔记本电脑和台式机、平板电脑、智能手机、显示器、投影仪及云解决方案。|
http://www.sony.com.cn/|索尼|||索尼（Sony）在中国网站，全面介绍Sony公司的各项业务.提供丰富的产品信息，包括数码相机，摄像机，笔记本电脑，电视系列，影音产品等以及售后服务和购买服务|
http://www.fujitsu.com/cn|富士通||||
','',''),
('5706','6','10','其他|4|','','http://www.cngame.com.cn/|娱网棋牌|||辽宁最大的本土棋牌游戏平台。平台包括大连、沈阳、鞍山、抚顺、丹东、本溪、铁岭等地地方特色棋牌游戏，《步步为赢》大型益智类竞技节目，以及斗地主、连连看等诸多大众游戏！|
http://www.runsky.com/|大连天健网||||
http://www.lnlib.com/|辽宁省图书馆||||
http://www.dlfilm.com/|大连影城||||
','',''),
('5704','6','10','论坛|4|','','http://bbs.lnd.com.cn/|北国论坛|||北国网论坛开设于2001年8月18日，现有注册会员一百四十余万，总帖数一百九十余万。北国网论坛拥有北国视线、民生热线、沈阳生活、读步天下、东晒西图、报料台、都来拍、装修团购、艺术之窗、收藏天地、楹联艺术、全民健身、美食生活、天天健康、旅游休闲、彩票预测、我的文字、娱乐八卦、房产家居、相亲交友、北国车汇、游戏攻略、星座测试和信息服务等特色栏目，是辽宁广大网民交流互动重要平台之一。|
http://forum.xinhuanet.com/listtopic.jsp?bid=82&catid=56|新华网社区振兴东北||||
http://www.chinayk.com/|营口论坛|||中国营口网、是营口地区最大最专业的社区门户、中营网包括互动营口,吃喝玩乐、营口商业街、营口房产、装修、汽车等版块，为营口人民提供最全面最及时生活信息，是营口人民最喜爱的专业网站和生活信息库。|
http://tieba.baidu.com/f?kw=%C1%C9%C4%FE|辽宁贴吧||||
http://tieba.baidu.com/f?kw=%C9%F2%D1%F4|沈阳贴吧||||
http://tieba.baidu.com/f?kw=%B4%F3%C1%AC|大连贴吧||||
','',''),
('5705','6','10','政府|4|16','','http://www.ln.gov.cn/|辽宁省政府||||
http://ln-n-tax.gov.cn/|辽宁省国家税务局||||
http://www.ln.lss.gov.cn/|劳动社会保障厅||||
http://www.hld.gov.cn/|葫芦岛||||
http://www.shenyang.gov.cn/|沈阳||||
http://www.dl.gov.cn/|大连||||
http://www.anshan.gov.cn/|鞍山||||
http://www.fushun.gov.cn/|抚顺||||
http://www.benxi.gov.cn/|本溪|||本溪市人民政府门户网站,由本溪市人民政府主办,本溪市人民政府办公厅为责任主体,本溪政务网管理中心承办并负责网站的建设、管理和维护工作...|
http://www.dandong.gov.cn/|丹东||||
http://www.jz.gov.cn/|锦州|||首页|
http://www.yingkou.gov.cn/|营口||||
http://www.fuxin.gov.cn/|阜新||||
http://www.liaoyang.gov.cn/|辽阳|||辽阳市政府门户网 辽阳新闻 办事服务|
http://www.tieling.gov.cn/|铁岭||||
http://www.zgcy.gov.cn/|朝阳||||
http://www.panjin.gov.cn/|盘锦||||
','',''),
('5698','6','10','人才|4|','','http://www.syrc.com.cn/|中国沈阳人才网||||
http://www.lnrc.com.cn/|辽宁人事人才信息网||||
','',''),
('5699','6','10','房产|4|','','http://www.syfc.com.cn/|沈阳房产||||
http://sy.fang.com/|搜房沈阳|||沈阳搜房网房天下是中国最大的房地产家居网络平台，提供全面及时的房地产新闻资讯内容，为所有楼盘提供网上浏览、业主论坛和社区网站，房地产精英人物个人主页，是国内房地产媒体及业内外网友公认的全球最大的房地产网络平台，搜房网引擎给网友提供房地产网站中速度快捷内容全面的智能搜索。|
http://www.gjj.dl.gov.cn/|大连住房公积金网|||This is my page|
http://dl.goufang.com/|购房者网站|||大连房产网，拥有大连最全面,最实时的大连房地产信息，大连购房网是大连地区房地产专业服务网站，为您提供最及时大连楼盘、大连二手房、大连租房信息，最权威的大连房价走势，及时的大连房地产资讯，购房网-购房如此简单。|
','',''),
('5700','6','10','物业|4|','','http://www.furuijinzhao.com/|沈阳物业公司|||专业专注提供：保洁服务、物业管理、秩维管理、绿化养护、保洁物料配送……数一流服务，还看今朝|
http://www.furuijinzhao.com/|沈阳保洁公司||||
http://www.furuijinzhao.com/|沈阳保安公司||||
','',''),
('5701','6','10','美食|4|','','http://www.dianping.com/dalian/food|大众点评－大连||||
','',''),
('5702','6','10','健康|4|','','http://www.syyb.gov.cn/|沈阳医疗保险|||沈阳市社会医疗保险管理局欢迎您！|
','',''),
('5703','6','10','教育|4|16','','http://www.lnen.cn/|辽宁教育网||||
http://www.lnein.gov.cn/|辽宁省教育厅||||
http://www.lnzsks.com/|辽宁招生考试之窗||||
http://www.syzsks.com/|沈阳招生考试网||||
http://www.lnrsks.com/|辽宁人事考试网||||
http://www.dlut.edu.cn/|大连理工大学||||
http://www.neu.edu.cn/|东北大学||||
http://www.cmu.edu.cn/|中国医科大学|||本网站是中国医科大学的官方网站。|
http://www.dufe.edu.cn/|东北财经大学||||
http://www.syphu.edu.cn/|沈阳药科大学|||沈阳药科大学是一所具有光荣革命传统的学校，是我国历史最悠久的综合性药科大学。学校目前已发展成为多学科、多层次、多形式教育的高等药学学府。学校是国家批准有权授予博士学位、硕士学位和招收港、澳、台地区学员及外国留学生、国内高中保送生的院校。学校坚持“团结、勤奋、求实、创新”的校训精神，立足辽宁、面向全国，建设药学教育领域国内一流、国际知名的教学研究型大学。|
http://www.lnu.edu.cn/|辽宁大学||||
http://www.syau.edu.cn/|沈阳农业大学|||沈阳农业大学是一所以农业与生命科学为特色，农、理、工、经、管多学科协调发展的全国重点大学，是我国农业科技人才培养和科学研究的重要基地。|
http://www.lnu.edu.cn/|辽宁大学||||
http://www.syau.edu.cn/|沈阳农业大学|||沈阳农业大学是一所以农业与生命科学为特色，农、理、工、经、管多学科协调发展的全国重点大学，是我国农业科技人才培养和科学研究的重要基地。|
http://www.sut.edu.cn/|沈阳工业大学||||
http://www.syit.edu.cn/|沈阳理工大学|||沈阳理工大学前身是东北军工专门学校，始建于1948年。1960年组建成立沈阳工业学院，2004年经教育部批准更名为沈阳理工大学。学校位于辽宁省沈阳市浑南高新区风景秀丽的浑河南岸，校园内建筑气势恢宏，庄重典雅，环境清新宜人。经过六十多年的建设和发展，沈阳理工大学已由一所学科单一的军工院校发展成为以工为主，理、管、文、经、法、艺相结合，服务辽宁、面向全国，具有鲜明国防特色的多科性大学。学校设有16个学院，2个教学部。有硕士学位一级学科点12个，涵盖了37个二级学科硕士学位授权点和7个工程硕士授权领域。学校设有49个本科专业、23个专科专业。有5个省部级重点学科，1个国家级沈阳中俄科技合作基地，1个国家863高技术发展计划重点实验室，7个省部级重点实验室和5个省部级工程技术研究中心。学校重视师资队伍建设，师资力量雄厚。现有专任教师1062人，教授165人，副教授335人，具有博士学位教师205人，26人享受政府特殊津贴。|
http://www.dlmu.edu.cn/|大连海事大学||||
http://www.lntu.edu.cn/|辽宁工程技术大学||||
http://www.synu.edu.cn/|沈阳师范大学||||
http://www.lnnu.edu.cn/|辽宁师范大学||||
http://www.symc.edu.cn/|沈阳医学院||||
http://www.dlu.edu.cn/|大连大学||||
http://www.syu.edu.cn/|沈阳大学||||
http://www.tlsz.com.cn/|铁岭师范高等专科学校||||
http://www.lnist.edu.cn/|辽宁科技学院||||
http://www.lnit.edu.cn/|辽宁工业大学||||
http://www.sycm.com.cn/|沈阳音乐学院|||沈阳音乐学院在中国具有悠久历史的专业音乐学院，也是东北地区最好的高等音乐学府。|
http://www.lumei.edu.cn/|鲁迅美术学院|||沈阳鲁迅美术学院|
http://www.syty.edu.cn/|沈阳体育学院||||
http://www.dlufl.edu.cn/|大连外国语学院||||
http://www.lnutcm.edu.cn/|辽宁中医药大学||||
http://www.dlfu.edu.cn/|大连水产学院||||
http://www.ldxy.cn/|辽东学院|||辽东学院|
http://www.bhu.edu.cn/|渤海大学||||
http://www.dlmedu.edu.cn/|大连医科大学||||
http://www.dlpu.edu.cn/|大连工业大学|||大连工业大学创建于1958年，是一所以工为主，工、理、艺、文、管、经六大学科门类协调发展，以培养轻工、纺织、食品、艺术等专业人才为办学特色的高等学府。|
http://www.ustl.edu.cn/|辽宁科技大学|||辽宁科技大学是一所面向全国招生，以工学为主，涵盖工学、理学、经济学、管理学、文学、法学、艺术等七大门类的多科性大学。学校始建于1948年。前身为鞍山钢铁学院，是我国较早组建的冶金高校之一。2006年更名为辽宁科技大学。学校现有一级学科博士点1个、二级学科博士点6个，一级学科硕士点9个、二级学科硕士点39个，专业64个。学校有同等学力在职人员申请硕士学位授予权和工程硕士、工商管理硕士（MBA）学位授予权以及研究生推免权。|
http://www.dlnu.edu.cn/|大连民族学院||||
http://www.luibe.edu.cn/|辽宁对外经贸学院||||
http://www.sjzu.edu.cn/|沈阳建筑大学||||
http://www.lnpu.edu.cn/|辽宁石油化工大学||||
http://www.lncc.edu.cn/|辽宁省交通高等专科学校||||
http://www.dlvtc.edu.cn/|大连职业技术学院||||
http://www.lnmec.net.cn/|辽宁机电职业技术学院|||学院始建于1965年，系辽宁省教育厅直属普通高等职业院校。|
http://www.lnfvc.cn/|辽宁金融职业学院|||辽宁金融职业学院&#124;金融&#124;高职学院|
http://www.cysz.com.cn/|朝阳师范高等专科学校|||朝阳师范高等专科学校|
http://www.syce.edu.cn/|沈阳工程学院||||
http://www.neusoft.edu.cn/|东北大学东软信息学院||||
http://www.jzmu.edu.cn/|辽宁医学院||||
http://www.vtcsy.com/|沈阳职业技术学院||||
http://www.dlteacher.com/|大连教育学院|||大连教师网是大连教育学院主办的大连地区教育门户网站,提供全面的教育政策,教育服务,教师培训信息,并且是大连教师网络培训最全面最权威的平台|
http://city.dlut.edu.cn/|大连理工大学城市学院||||
http://www.ltcem.com/|辽宁装备制造职业技术学院||||
http://www.bhcy.cn/|渤海船舶职业学院|||渤海船舶职业学院前身是渤海船舶工业学校，建校于1959年，原隶属于中国船舶工业总公司，2001年5月，与葫芦岛市师范学校、葫芦岛市广播电视 大学合并，成立了渤海船舶职业学院，目前是我国北方地区唯一的一所以培养造船业高、中级专业技术人才为主、多科性、面向全国招生的高等职业技术学院|
','',''),
('5695','6','10','彩票|4|','','http://www.lntycp.com/|辽宁体彩||||
','',''),
('5696','6','10','交通|4|','','http://www.ln2car.com/|辽宁二手车|||辽宁二手车网是辽宁，黑龙江，吉林，东北地区最完善的二手车交易网站和二手车信息平台，提供：二手汽车,二手车市场信息,二手车交易市场,二手汽车市场行情,二手车评估,二手汽车价格,二手车咨询,二手车资讯,汽车租赁,驾校学车,修车保养,二手车评估,二手车新闻,经销商加盟,汽车详细参数配置库,汽车图片库等|
http://www.shenyangbus.com/|沈阳公交网|||沈阳公交网提供沈阳公交线路、公交信息、公交地图查询等服务，为热爱公交、热爱沈阳、热爱生活的网友提供一个交流互动的平台；以服务市民、方便出行为宗旨。|
http://map.baidu.com/#word=%C9%F2%D1%F4&ct=10|百度地图沈阳||||
http://www.sygajj.gov.cn/|沈阳交通违章查询||||
http://www.symtc.com/|沈阳地铁|||沈阳地铁|
http://www.lnmoto.cn/bbs/|东北摩托联盟||||
http://www.dalianbus.com/|大连公交网||||
http://www.dlairport.com/|大连机场||||
','',''),
('5697','6','10','通信|4|','','http://www.ln.chinamobile.com/|辽宁移动|||欢迎您访问辽宁移动网站。中国移动通信集团公司，是中国规模最大的移动通信运营商，主要经营移动话音、数据、IP电话和多媒体业务，并具有计算机互联网国际联网单位经营权和国际出入口局业务经营权。|
http://ln.ct10000.com/|辽宁电信||||
','',''),
('5694','6','10','栏目置顶|4|16','','http://www.northtimes.com/|北方时空|||北方时空是辽宁省内最大的以民生类新闻为主的新闻聚合网站。网站创建于2001年1月19日，曾打进“全国网站访问量前十强”，获得过“北十省第一大信息港”的殊荣。|
http://www.nen.com.cn/|东北新闻网|||东北新闻网是辽宁省委、省政府领导的，辽宁省委宣传部主办的权威的专业的新闻网站，是目前东北地区最大的综合性网络新闻发布平台。作为国新办确定的辽宁省内唯一一家地方重点新闻网站，东北新闻网以新闻报道的权威性、及时性，内容的丰富性和辛辣的点评为特色，在网民中树立起了“权威媒体、辽宁门户”的形象。|
http://www.lnd.com.cn/|北国网||||
http://www.041599.com/|丹东信息港||||
http://www.ln.gov.cn/|辽宁省政府||||
http://www.lntv.cn/|辽宁电视台||||
http://www.sanhaostreet.com/|网上三好街||||
http://www.hilizi.com/|半岛晨报|||海力网是大连地区最大最具有权威性的新门户网站，大连最大的交友互动平台，是半岛晨报官方网站，是经过辽宁省委宣传部授权的辽宁省重点新闻网站，提供半岛晨报电子版，即时新闻、社区、餐饮、娱乐、房产、汽车、招聘等增值资讯服务|
http://chinaneast.xinhuanet.com/|振兴东北网||||
http://www.syd.com.cn/|沈阳网|||沈阳网是沈阳门户网站,是沈阳地区新闻发布网站,是沈阳市民最关注的地方门户网站.有沈阳最快的新闻,沈阳最新的生活信息,沈阳最全的打折信息,沈阳政府政闻,沈阳房价,沈阳车市,沈阳人网上社区,沈阳论坛,沈阳家园.每天提供沈阳日报,沈阳晚报等多种数字报,每天发布大小沈阳新闻信息和沈阳专题,沈阳网络广告投放,联系电话024-22690000|
http://www.csytv.com/|沈阳电视台|||沈阳广播电视台官方网站，网站整合了沈阳广播电视台强大的视频新闻资源，提供最新最热的视频新闻在线播放，提供24小时电视直播回看，提供最权威的沈阳本地资讯服务。|
http://sy.northtimes.com/|沈阳热线||||
http://www.syradio.cn/|沈阳广播网||||
http://www.asptt.ln.cn/|鞍山信息港||||
http://tl.northtimes.com/|铁岭信息港||||
http://www.yktx.com/|营口信息港||||
http://www.liao1.com/|辽一网|||辽一网作为华商晨报官方网站,提供华商晨报电子版，以及权威沈阳城市生活信息。包括：沈阳婚庆公司、沈阳装修、沈阳房产、二手房、租房、沈阳交通违章查询、沈阳驾校学车、沈阳团购、交友、相亲等权威信息|
http://www.jzptt.ln.cn/|锦州在线||||
','',''),
('5933','5','0','物业家政|4|','','http://www.furuijinzhao.com/|沈阳保洁公司||||
http://www.furuijinzhao.com/|沈阳物业公司||||
','',''),
('5931','5','0','包装印刷|4|','','http://www.tup.tsinghua.edu.cn/|清华大学出版社||||
http://www.cp.com.cn/|商务印书馆|||商务印书馆|
http://www.phei.com.cn/|电子工业出版社|||电子工业出版社：科技与教育出版社，博士后科研工作站，信息技术、工业技术、经济管理、大众生活和少儿科普出版商，图书、期刊、音像和网络出版商|
http://www.pack.net.cn/|中国包装网|||包装e城-依托中国包装网拥有注册50万多家企业资源优势,打造行业领先的包装印刷电子商务在线交易商城一站式采购体验。“上淘宝不如选包装e城。专业我放心”！|
http://www.pep.com.cn/|人民教育出版社||||
','',''),
('5932','5','0','广告营销|4|','','http://www.21manager.com/|栖息谷|||家园 ,栖息谷-管理人的网上家园|
http://www.cnad.com/|中国广告网|||Ad,广告,China,Chinese Ad,Ad Movie,户外广告,广告制作,传媒,媒体,平面广告,杂志,电视,创意,广州4A,Cnad,广告论坛,论坛,广告交流中心,最新广告,广告设计,广告影视,品牌,市场,策划,营销,活动f,模特,广告博客,创意影视,平面创意,嘎纳广告,金犊奖,动漫,广告学,广告节,广告人物,设计师,人才,猎头,oneshow,中国4A|
http://club.hr.com.cn/|中国人力资源网|||社区 ,HR大家社区|
http://www.alimama.com/|阿里妈妈|||阿里妈妈是阿里巴巴公司旗下的一个全新的“跨平台，跨屏幕，跨渠道”的全域营销平台，即通过大数据整合各类可触达消费者的渠道资源，建立全链路、精准、高效、可衡量的跨屏跨渠道营销体系。|
http://www.a.com.cn/|中华广告网|||中华广告网, 广告传媒产业资源众筹平台,以广告传媒产业为重点,通过“互联网平台+移动互联平台+资源众筹联盟”的运营模式，打造广告传媒产业线上线下一体化运营体系，为广告传媒产业搭建实时搜索、资源众筹、投融资资源对接与互联网金融产品、指数发布等服务平台，最终实现广告传媒产业全产业链要素的交互与跨界融合。|
http://www.linkshop.com.cn/|联商网|||我们提供超市,百货,购物中心,商业地产,便利店,O2O等零售业态相关行业数据,经营管理资料下载,以及商业地产招商,品牌加盟,新型人力培训招聘,论坛交流等|
http://www.emkt.com.cn/|中国营销传播网||||
','',''),
('5930','5','0','纺织印染|4|','','http://www.texindex.com.cn/|中华纺织网|||中国最具有影响力的纺织专业网站之一。是纺织(纱、线、布、服装、家用纺织品、纺织服装机械设备)业内人士进行网上交易的平台。主要栏目:供求信息、国际求购信息、纺织新闻、市场行情、纺织展会、纺织人才、纺织论坛等。|
http://www.tnc.com.cn/|全球纺织网|||全球纺织网-纺织行业中的权威门户网站，依托全球纺织品集散地--中国轻纺城市场，收罗全球纺织产品和采购交易信息，是纺织人士上网首选！提供纺织人士专用的“纺织商务邮”邮箱；开启纺织行业网上沟通新革命－“纺织聊”；纺织市场行情的网上发源地。|
http://www.qfc.cn/|网上轻纺城|||网上轻纺城qfc.cn是中国服装纺织行业专业的网上纺织品交易市场,全力打造一个集纺织行业资讯、贸易信息数据库、产品及企业大全、网上纺织品交易、公共信息化服务于一身的纺织行业电子商务平台|
','',''),
('5929','5','0','冶金矿产|4|','','http://www.wjw.cn/|全球五金网|||全球五金网是中国五金机电行业的最大的网上产品营销平台,为中国五金机电企业及经销商提供专业买卖信息对接及贸易撮合,包括五金产品供应,五金产品采购,五金企业招募经销商,五金加工,五金新闻资讯,五金技术等信息,是中国五金机电企业开展网上贸易的首选平台网站.|
http://www.csteelnews.com/|中国钢铁新闻网|||中国钢铁工业协会主管、中国冶金报社主办的最具权威的钢铁行业信息资讯门户网站 中国冶金报  冶金报 钢铁新闻网|
http://www.kitco.cn/|稀有金属价格网|||Kitco金拓提供国际黄金价格、白银价格，实时黄金白银价格走势图、黄金白银实时行情，技术分析图，贵金属新闻、评论等资讯，主营投资类、收藏类实物黄金、白银产品。|
http://www.chinamining.com.cn/|中国矿业网|||中国矿业网是由国土资源部规划司、矿产开发管理司、中国矿业联合会主办 ，中国矿业报社、中国矿业杂志社联办 的矿业行业门户网站。|
http://www.steelhome.cn/|钢之家|||钢之家网站从事钢铁行业信息服务,钢材交易,网站建设,准确及时的反映各地区钢材市场的钢材价格,钢铁价格以及钢材行情信息,是一个专注于钢铁行业的专业钢铁网站.|
http://www.ometal.com/|全球金属网|||全球金属网为上海有色金属网络及全球有色金属网络用户提供上海有色，长江现货，南储现货，废旧金属等金属行情、走势、生意商机等一站式冶金免费服务。|
http://www.shmet.com/|上海金属网|||金属网,上海金属,上海期货,有色金属价格行情网,上海现货交易价格,铜今日价格,上海有色金属铜价,掌上财富,金属期货,金属行情|
http://www.mysteel.com/|我的钢铁|||我的钢铁网是中国钢铁行业钢材价格信息最全面的门户网站，包括钢铁网,钢材网,钢铁价格,钢材价格,钢铁行情,钢材行情,钢材价格走势,钢铁价格走势,钢铁市场,钢材市场,钢铁行业分析等信息，为国内钢铁企业、钢材企业提供最新的钢材价格行情资讯和钢材现货电子商务服务。|
','',''),
('5926','5','0','能源动力|4|','','http://www.coal.com.cn/|煤碳网|||中煤远大煤炭现货交易平台由中煤远大（北京）电子商务股份有限公司运营，是煤炭行业电子商务及供应链管理的综合服务商。平台为客户提供煤炭现货电子交易、煤炭贸易融资、第四方煤炭物流运输为一体的创新型煤炭电子商务服务。|
http://www.mlr.gov.cn/|国土资源部||||
http://www.sinopecnews.com.cn/|中国石化新闻网||||
http://www.chinapower.com.cn/|中国电力网||||
http://www.china5e.com/|中国能源网|||中国能源网是一家提供能源信息与咨询服务的独立第三方，提供能源经济、煤炭、电力、油气、新兴能源、节能环保、页岩气、分布式能源等能源行业的能源资讯、能源分析、能源数据、能源研究等能源信息与咨询服务。|
','',''),
('5927','5','0','化学工业|4|','','http://www.fert.cn/|中国化肥网||||
http://china.chemnet.com/|中国化工网|||网盛生意宝旗下专业化工网站，中国化工网提供化工市场行情及化工产品交易信息，包括化工产品数据库、化工供求信息、REACH服务、化工搜索、化工资讯、化工会展、化工人才等栏目。|
http://www.chem17.com/|化工仪器网||||
http://bbs.hcbbs.com/|海川化工论坛|||海川化工论坛,会员来自于国内各大设计院、生产制造企业、销售单位及各大高校,这里拥有旺盛的人气、良好的交流氛围及广阔的交流空间,是化工类交流的专业平台。海川化工论坛秉承“共同学习 共同提高”宗旨，已成为国内最有人气的化工技术站！|
','',''),
('5928','5','0','机械仪表|4|','','http://www.instrument.com.cn/|仪器信息网|||仪器信息网是科学仪器, 分析仪器,实验室仪器装备,生命科学仪器,环境监测仪器,工业在线仪器等专业网站,提供仪器人才,仪器操作培训,仪器操作视频,仪器社区,分析测试服务,二手仪器,免费发布仪器信息,仪器市场咨询服务。|
http://www.21-sun.com/|中国工程机械商贸网|||中国工程机械商贸网专业从事工程机械领域商贸服务的电子商务网站。中国工程机械商贸网是目前最知名、人气最旺的工程机械门户网站，大量的企业在中国工程机械商贸网的辅导下完成了从企业网站制作、网上业务开展……|
http://china.machine365.com/|中华机械网|||中华机械网（china.machine365.com）是中国领先的机械行业网站，机械企业信息化专家，专为机械企业提供b2b电子商务服务的网上贸易平台，汇集海量供求信息，是企业寻求电子商务网络贸易信息的首选网站。|
http://www.jxcad.com.cn/|机械CAD论坛|||中国机械CAD论坛|
http://www.gongkong.com/|中国工控网|||中国工控网(www.gongkong.com)是gongkong推出的中国工控、工业自动化、工业智能化领域浏览量最大的门户网站，是工业互联与智能制造的互联网+解决方案提供商，工控网面向装备制造业的机械自动化、连续生产行业的工厂自动化,生产自动化.过程自动化，以及制造业升级,两化深度融合的企业信息化,工业智能化,智能制造,工业4.0,2025战略,工业互联网,互联网+，提供自动化,信息化,智能化的产品选型,产品采购,安装调试,操作使用,维护维修,优化升级等工具资讯服务,为制造业用户提供自动化培训,招聘,自动化论坛交流等职业发展服务,同时为自动化企业提供包括市场研究与咨询,网络营销,电子商务销售,O2O售后服务,团队建设等优化服务。|
http://www.daishiyalvji.com/|美邦环保设备有限|||广州美邦环保设备有限公司专业生产带式压滤机,污泥压滤机,泥浆压滤机,带式污泥压滤机,广东最大的带式压滤机生产厂家；质量第一,价格合理|
http://www.juxinanfang.cn/|氯气检测仪|||济南鸿安电子器材有限公司是专业从事气体检测仪器的开发、生产、销售、技术服务于一体的高新技术企业。公司产品,氯气检测仪,氯气报警器,氯气报警仪 氯气报警仪自推出市场以来，其可靠的性能，人性化的设计，合理的价格，完善的售后服务为公司树立形象、开展业务奠定了良好的市场基础，吸引了众多客户的目光。现在，本公司产品已经在石油、化工、燃气输配、仓储、市政燃气、消防、环保、冶金、生化医药、能源电力等行业得到了广泛的应用，并得到广大客户的一致认可。|
http://www.gaotai-valve.com/|高泰阀门制造||||
','',''),
('5925','5','0','建筑建材|4|','','http://www.haofamen.net/|全球好阀门网|greenword||全球阀门网提供阀门的销售，阀门公司,阀门供应,阀门信息资讯，同时提供调节阀,闸阀,球阀,截止阀,止回阀,蝶阀,电动阀门,进口阀门等产品的阀门厂家最新求购阀门资讯和阀门采购供求信息发布。|
http://www.c-bm.com/|中国建材商务网|||中国建材网（www.c-bm.com）是建材行业（B2B）多功能电子商务建材网站，致力于搭建建筑设计师与材料商之间的垂直信息交流社区，为设计师选材提供一站式服务，帮助材料商开拓市场、建立品牌、以及网络推广等综合性服务平台。|
http://www.jc.net.cn/|中国建材价格网|||中国建材在线是收录国内建材厂商和建材产品报价数量最大的专业网站，国内第一个权威的中字头建筑建材综合门户.提供建材价格信息服务（入网会员、造价光盘、人工询价等）、建材采购,报价,会议等服务或产品。中国建材在线注册会员已超过200万家，拥有千万条建材产品信息，在全国28个省、市、自治区建立了分站，将信息和服务网络扩展到了全国，是中国建筑、建材领域中最有影响力的建材信息服务和电子商务网站。|
http://www.abbs.com.cn/|ABBS建筑论坛|||ABBS建筑论坛创建于1998年,为全球最大建筑专业论坛。涵盖从城市规划、建筑设计、室内设计、表现动画到建筑材料、施工技术、房地产的整个产业链。旗下还包括建筑微信、微博、品房网在内的建筑新传媒群|
http://www.zstb1688.com/|中山天柏||||
http://www.cyqiaojia.com/|创元桥架金属制品|||慈溪市创元桥架金属制品有限公司主要专业从事桥架（包括电缆桥架、喷塑桥架、镀锌桥架、不锈钢桥架、铝合金桥架等）、仓储货架等产品的生产加工销售为一体的公司。|
http://www.mztieyi.com/|铭泽铁艺|||临沂铁艺大门专业生产厂家,生产和安装各种临沂铁艺,临沂铁艺大门,临沂铁艺围栏,山东铁艺,江苏铁艺,临沂铁艺扶手,临沂铁艺防盗窗,临沂铁艺床,临沂铁艺楼梯,是临沂铁艺厂家中最大的一家,承接山东铁艺、江苏铁艺安装生产,欢迎来电咨询.|
','',''),
('5923','5','0','运输物流|4|','','http://www.kiees.cn/|快递查询|||【快递之家】集成常用快递单号查询，包括申通快递、顺丰、圆通、韵达、汇通、天天、德邦物流、中通、宅急送、快捷、信丰、邮政包裹、挂号信及EMS等！|
http://www.jctrans.com/|锦程物流网|||锦程物流网是中国访问量排名第一的物流门户网站,主要提供国际海空物流,国际贸易,国际货运,物流公司等物流查询信息,本站拥有物流第一传媒资讯中心及全球最大的物流论坛!|
','',''),
('5924','5','0','国际贸易|4|','','http://china.nowec.com/|环球经贸网||||
http://china.alibaba.com/|阿里巴巴|||阿里巴巴（1688.com）是全球企业间（B2B）电子商务的著名品牌，为数千万网商提供海量商机信息和便捷安全的在线交易市场，也是商人们以商会友、真实互动的社区平台。目前1688.com已覆盖原材料、工业品、服装服饰、家居百货、小商品等12个行业大类，提供从原料--生产--加工--现货等一系列的供应产品和服务。|
http://www.taxrefund.com.cn/|中国出口退税咨询网|||中国出口退税咨询网由龙图信息创建，是我国出口退税业务领域中第一个专业咨询及服务网站，是国内目前最权威、最代表性的出口退税咨询网站。网站全力为全国出口企业提供出口退税申报工作的全面业务指导与技术支持，同时面向全国税务代理、税务机关及所有出口退税从业人员提供集|
http://www.hc360.com/|慧聪网|||慧聪网（Hc360.Com）中国领先的B2B电子商务平台，为您提供全面的B2B行业资讯、供应、求购、库存信息，是企业寻求电子商务网络贸易信息的首选行业门户，聪慧的老板上慧聪！|
http://www.fx168.com/|FX168财经网|||FX168财经网提供实时外汇牌价,汇率换算,黄金,今日黄金价格,白银价格,美元走势图,外汇黄金实时行情及投资资讯,是全球视野下的中文财经网站。包括外汇投资策略,黄金交易提示,财经日历，火线速递，外汇黄金交易论坛。|
http://www.shippingchina.com/|国际海运网|||中国国际海运网是中国最大的航运物流门户网站，为货主、外贸企业出口商提供国际海运费查询、国际海运运价查询、船东船期查询、整箱船期查询、拼箱船期查询、散杂船期查询、货运超市、货柜租赁、空船信息、应征代理等航贸商机，并提供订舱中心、国际危规、货物追踪查询、展会信息、快递空运和港口动态诸多信息。|
http://www.customs.gov.cn/|海关总署||||
http://bbs.fobshanghai.com/|外贸论坛|||福步外贸论坛(FOB Business Forum) 福步外贸论坛是中国最大的专业外贸论坛，致力于打造全球最具人气、最实用的外贸社区。|
','',''),
('5922','5','0','家用电器|4|','','http://www.ea3w.com/|万维家电网|||家电,万维家电网,电视,空调,厨卫,小家电,冰箱,洗衣机,新闻,数据,评测,导购,售后,投诉,供求|
http://tech.sina.com.cn/elec|新浪家电||||
http://digi.it.sohu.com/digital-home|搜狐数字家电||||
http://www.jd-bbs.com/|家电论坛|||家电,家电论坛,电视机,音响,家庭影院,投影,空调,洗衣机,冰箱,电影,音乐,CD,DVD,蓝光,高清,交易|
http://www.chaolielectric.com/|余姚市超力电力电器|||余姚市超力电力电器有限公司是一家专业生产高压熔断器, 高压熔断器配件,避雷器,隔离开关及其相关产品的私营企业。|
','',''),
('5921','5','0','服装鞋帽|4|','','http://www.china-ef.com/|中国品牌服装网|||中国品牌服装网是服装品牌行业巨头网站,汇聚国内外知名服装品牌名录、世界顶级奢侈品牌大全,全球品牌服装资讯报道的大型品牌服装行业平台。|
http://www.ef360.com/|华衣网|||华衣网-主流服装服饰品牌媒体,提供女装男装童装休闲装等服装服饰品牌招商加盟代理信息,系统介绍女装品牌,男装品牌,童装品牌,内衣品牌等服装品牌信息,发布行业资讯,服装流行趋势,服装搭配,服装时尚,时尚服饰资讯.|
http://www.51fashion.com.cn/|中华服装网|||时尚饰界是国内最大的配饰类综合门户网站，旗下包括饰品、珠宝首饰、腕表眼镜、包包皮具、围巾丝巾、丝袜袜子、家居饰品、领带八大类。致力于饰品品牌推广、招商加盟代理、批发零售等服务，同时也是大众分享配饰之时尚潮流聚集地。|
http://www.auspicious.cc/|卓祥进出口|||义乌市卓祥进出口有限公司位于世界最大的小商品集散地中国义乌，是一家经外经贸委批准的，具有自营进出口权的法人企业。公司主要从事品牌女装尾货批发，电脑绣花机, 各类大型机械及设备，节能环保产品，文体用品，箱包，装饰家具, 围巾，饰品，工艺品，床上用品等各种小商品以及汽车配件的货物进出口、人才和技术进出口业务。|
http://www.zjytwy.com/|天台县运通袜业经营部|||天台县运通袜业经营部位于浙江省台州市天台县，主要经营打底裤批发，内衣批发，短袜批发，肉色连裤袜批发等业务。公司实力雄厚，重信用、守合同、保证产品质量，以多品经营特色和薄利多销的原则，始终坚持以市场为向导，根据精准的市场细分，赢得了广大客户的信任。|
http://www.eelly.com/|服装批发|||衣联网是中国网上服装批发市场的领航者,汇聚了广州白马服装批发,十三行,沙河,杭州四季青及深圳,浙江等服装批发市场,更有女装十大品牌,T恤,连衣裙,牛仔,瑞丽,韩版等优质货源。告诉你最好的服装批发在哪里和最实用的批发商电子商务实战指南 www.eelly.com 400-6688-038|
','',''),
('5920','5','0','电工电子|4|','','http://www.rfidworld.com.cn/|RFID世界网|||RFID世界网是RFID行业的门户网站. 致力于RFID电子标签,智能卡等无线射频识别技术的应用与推广,网站内汇集了RFID的全球最新资讯,RFID电子标签产品,智能卡,读卡器设备及其应用集成的厂家和产品信息,提供详尽的RFID在各行业的解决方案资料.对行业内的RFID展会进行报道,为RFID终端用户提供电子标签射频识别技术产品信息及RFID解决方案的咨询,为RFID行业人士提供良好的专业论坛交流平台。|
http://www.ednchina.com/|电子设计技术||||
http://www.21ic.com/|21IC中国电子网|||21IC中国电子网， 中国电子工程师的首选网站(嵌入式,单片机,DSP,EDA,测试测量,元器件,医疗电子,智能电网)|
http://www.eepw.com.cn/|电子产品世界|||电子产品世界,为电子工程师提供全面的电子产品信息和行业解决方案,是电子工程师的技术中心和交流中心,是电子产品的市场中心,EEPW 20年的品牌历史,是电子工程师的网络家园|
http://www.ziliw.com/|烙铁咀|||生产销售、点焊头、热压点焊、精密点焊头、脉冲点焊头、东莞三藏五金电子厂专业生产点焊头、脉冲热压焊头、哈巴头、精密点焊头,焊头品质优越、使用寿命长,规格型号齐全,可来样订做。咨询热线:13712345020 林先生|
','',''),
('5919','5','0','农林牧渔|4|','','http://www.zhue.com.cn/|中国猪网|||猪e网是集养猪财经、技术、生猪价格行情、猪病问答、社区论坛、畜牧商城为一体，涵盖种猪、兽药、器械、饲料的养猪行业综合门户网站，成立于2000年，致力为养猪人服务。我们的宗旨是：让养猪更简单，更高效，更快乐。|
http://www.xinnong.com/|新农网|||新农网_涉农信息聚集地！涵盖：农业新闻、农产品价格、养猪技术、养牛技术、种殖技术、农民致富经、农民学电脑。农民朋友最喜欢的农业网站！|
http://www.chinabreed.com/|中国养殖网|||中国养殖网是畜牧养殖行业门户网站,有养殖,饲料,养猪,养鸡,养殖视频,养牛,养羊,家禽,兽药,特种养殖,畜牧机械等频道,中国畜牧养殖行业门户网站|
http://www.forestry.gov.cn/|国家林业局|||中国林业网（国家林业局政府网、国家生态网）（www.forestry.gov.cn）是国家林业局官方网站，2000年建成，具备政务信息公开、网上在线办事、公众互动交流和综合信息服务功能，具有简体版、繁体版和英文版3种版本，目前日均访问量在90万人次左右，是具有权威性和广泛影响的中国林业行业门户网站。网站由国家林业局信息办承办|
http://www.zgny.com.cn/|中国农业网|||中国农业网:创建于2000年,客服电话010-62110035,农业网包括:中国农业企业,农业供求,农业产品,农业商务等蔬菜,果品,花卉,苗木,粮油,食用菌,中草药,棉花,茶叶,畜牧,兽药,饲料,肥料,种业,农药,农机农具,节水灌溉,温室等专栏.|
http://www.vegnet.com.cn/|中国蔬菜网|||中国蔬菜网自1997年成立以来,以行业细分模式整合蔬菜资源，集蔬菜种子、蔬菜基地、蔬菜加工、蔬菜价格、蔬菜批发市场、蔬菜资讯、蔬菜供求、蔬菜企业为一体，一直引领蔬菜产业信息化潮流,网站已经发展成为蔬菜以及相关农业行业最大最知名的专业商务网站。|
http://www.aweb.com.cn/|农博网|||农博网以“服务农业,E化农业”的宗旨，为涉农人群提供农业资讯、农产品报价、农业财经以及农业知识百科数据库。农博网，一切皆为农业。|
http://www.lgyx58.com/|银杏树||||
http://www.zj123.com/|浙江民营企业网|||浙江民营企业网-浙江中小企业网上贸易中心，领先的浙江产业集群B2B电子商务平台，服务于浙江杭州、宁波、温州、绍兴、台州、嘉兴、金华等地的民营企业！|
http://www.nong365.com/|旭农网|||旭农网是一家服务于农民、农企、农村经纪人的农产品供求平台。|
http://www.yz355.com/|养殖商务网|||养殖商务网是最适合中国养殖业的养殖商务网平台！了解中国养殖业的发展前景,了解农村养殖业致富项目,了解养殖业什么最赚钱。|
','',''),
('5756','1','15','日常生活','闹钟|naozhong|','','<style type=\"text/css\">
<!--
#bodyC { font-size:12px; line-height:normal; margin-left:auto; margin-right:auto; padding:0; width:300px; height:400px; text-align:left; position:relative; }
#bodyC a { color:#0E6DBC; }
#bodyC h3 { margin:0; margin-top:8px; }
#bodyC p { margin:0; line-height:150%; }
#bodyC form { margin:0; padding:0; }
#bodyC #bodyD { padding:6px; border-left:1px #327CBD solid; border-right:1px #327CBD solid; background-color:#ECF7FF; clear:both;}
#bodyC #nowclock { overflow:hidden; margin-bottom:6px; padding:5px; text-align:center; clear:both; }
#bodyC .titleC { margin-top:6px; height:36px; }
#bodyC #titleC { background-color:#FFFFFF; font-weight:bold; border:1px #AFD2F0 solid; border-bottom:none; cursor:pointer; }
#bodyC .title_ { border-bottom:1px #AFD2F0 solid; cursor:pointer; }
#bodyC #table { height:150px; border:1px #AFD2F0 solid; border-top:none; padding-top:10px; padding-bottom:8px; background-color:#FFFFFF; clear:both; }
#bodyC .point { color:#0E6DBC; }
#bodyC .red { color:#FF5500; }
#bodyC .is { margin:0; height:4px; font-weight:bold; text-align:center; font-size:1px; position:relative; clear:both; }
#bodyC .i1 { height:1px; width:292px; margin-left:4px; margin-right:4px; font-size:1px; background-color:#327CBD; overflow:hidden; }
#bodyC .i2 { height:1px; width:292px; margin-left:2px; margin-right:2px; font-size:1px; background-color:#ECF7FF; border-left:2px #327CBD solid; border-right:2px #327CBD solid; overflow:hidden; }
#bodyC .i3 { height:2px; width:296px; margin-left:1px; margin-right:1px; font-size:1px; background-color:#ECF7FF; border-left:1px #327CBD solid; border-right:1px #327CBD solid; overflow:hidden; }
#bodyC .i5 { position:absolute; top:2px; left:2px; width:290px; padding-left:6px; height:24px; line-height:24px; background-color:#499CE2; z-index:12; color:#FFFFFF; overflow:hidden; font-size:12px; }
-->
</style>
<script type=\"text/javascript\">
<!--
var midPath = \'./writable/__web__/images/clock/\';
var midType = \'.mp3\';
if(typeof(\'$\')!=\'function\'){var $=function(o){return document.getElementById(o)}}if(typeof(\'setCookie\')!=\'function\'){var setCookie=function(name,value,time){var cookieEnabled=(typeof navigator.cookieEnabled!=\'undefined\'&&navigator.cookieEnabled)?true:false;if(cookieEnabled==false){alert(\'您的浏览器未开通cookie，程序无法正常使用！\');return false}if(!time||isNaN(time))time=365;var cookieStr=encodeURIComponent(value);var expireStr=time>0?\' expires=\'+(new Date(new Date().getTime()+time*24*60*60*1000).toGMTString())+\';\':\'\';document.cookie=name+\'=\'+cookieStr+\';\'+expireStr+\' path=/;\'}}if(typeof(\'getCookie\')!=\'function\'){var getCookie=function(name){var arr=document.cookie.match(new RegExp(\"(^| )\"+name+\"=([^;]*)(;|$)\"));if(arr!=null&&arr!=false)return decodeURIComponent(arr[2]);return false}}function tick(){var date=new Date();window.setTimeout(\"tick()\",1000);$(\'clock\').innerHTML=date.getFullYear()+\'年\'+(date.getMonth()+1)+\'月\'+date.getDate()+\'日 \'+date.getHours().toString().replace(/^(d{1})$/,\'0$1\')+\':\'+date.getMinutes().toString().replace(/^(d{1})$/,\'0$1\')+\':\'+date.getSeconds().toString().replace(/^(d{1})$/,\'0$1\')+\'\'}if(document.all){window.attachEvent(\'onload\',startClock)}else{window.addEventListener(\'load\',startClock,false)}function startClock(){tick();var base=new Date();var time_=base.getTime()+10*60*1000;var date=new Date(time_);$(\'h\').value=date.getHours();$(\'m\').value=date.getMinutes();var overSetClock=new Array();for(var i=1;i<=3;i++){var reg=false;var reg2=false;var reg3=false;if(overSetClock[i]=getCookie(\'cookieColok\'+i+\'\')){if(reg=overSetClock[i].toString().split(\':\')){reg2=(parseFloat(reg[2])>parseFloat(base.getHours())||(parseFloat(reg[2])==parseFloat(base.getHours())&&parseFloat(reg[3])>parseFloat(base.getMinutes()))||parseFloat(reg[1])!=1)?true:false;reg3=(parseFloat(reg[2])<parseFloat(base.getHours())||(parseFloat(reg[2])==parseFloat(base.getHours())&&parseFloat(reg[3])<parseFloat(base.getMinutes()))||parseFloat(reg[1])==1)?true:false;if(reg2==true||reg3==true){tickC(reg[0],reg[1],reg[2]+\':\'+reg[3],reg[4],reg[5]);$(\'clock\'+i+\'ye\').innerHTML=\'\'+reg[2]+\':\'+reg[3]+\'\'+(parseFloat(reg[1])!=1?\'重复\':\'\'+(reg3==true?\'明天\':\'\')+\'一次\')+\'√\';$(\'clock\'+i+\'ye\').title=\"闹钟\"+i+\"已设定。时间：\"+reg[2]+\":\"+reg[3]+\"，\"+(parseFloat(reg[1])!=1?\"每天重复\":\"不重复\")+\"\";$(\'clock\'+i+\'no\').innerHTML=\'×\';$(\'clock\'+i+\'no\').title=\'关闭闹钟\'+i+\'\'}}}}}function xuan(obj,n){try{$(\'titleC\').id=null}catch(err){}obj.id=\'titleC\';$(\'clock123\').value=n}function runMusic(fr,mid){var im_text=\'\';if(document.all){im_text+=\'<bgsound src=\"\'+midPath+mid+\'\'+midType+\'\" autostart=\"true\" loop=\"infinite\" style=\"width:0px;height:0px;overflow:hidden;\" />\'}else{im_text+=\'<object id=\"mediaplayer\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" align=\"center\" border=\"0\" type=\"application/x-oleobject\" standby=\"Loading Windows Media Player components...\" style=\"width:0px;height:0px;overflow:hidden;\"><param name=\"url\" value=\"\'+midPath+mid+\'\'+midType+\'\"><param name=\"AutoStart\" value=\"1\"><param name=\"Balance\" value=\"0\"><param name=\"enabled\" value=\"-1\"><param name=\"EnableContextMenu\" value=\"0\"><param name=\"PlayCount\" value=\"1\"><param name=\"rate\" value=\"1\"><param name=\"currentPosition\" value=\"0\"><param name=\"currentMarker\" value=\"0\"><param name=\"defaultFrame\" value=\"\"><param name=\"invokeURLs\" value=\"-1\"><param name=\"baseURL\" value=\"\"><param name=\"stretchToFit\" value=\"0\"><param name=\"volume\" value=\"100\"><param name=\"mute\" value=\"0\"><param name=\"uiMode\" value=\"full\"><param name=\"windowlessVideo\" value=\"0\"><param name=\"fullScreen\" value=\"0\"><param name=\"enableErrorDialogs\" value=\"0\"><param name=\"SAMIStyle\" value=\"\"><param name=\"SAMILang\" value=\"\"><param name=\"SAMIFilename\" value=\"\"><param name=\"captioningID\" value=\"\"><EMBED src=\"\'+midPath+mid+\'\'+midType+\'\" style=\"width:0px;height:0px;overflow:hidden;\" type=\"audio/mpeg\" loop=\"-1\"></EMBED></object>\'}var im=$(fr).contentWindow;/*im.document.designMode=\'on\';im.document.contentEditable=true;*/im.document.open();im.document.writeln(\'<html><head></head><body>\'+im_text+\'</body></html>\');im.document.close()}function tryM(obj){if(obj.innerHTML==\'试听\'){runMusic(\'tryMusicFr\',$(\'mid\').value);obj.innerHTML=\'关闭\'}else{$(\'tryMusicFr\').src=\'about:blank\';obj.innerHTML=\'试听\'}}function post(){var clock123=$(\'clock123\').value.toString();if(clock123!=\'1\'&&clock123!=\'2\'&&clock123!=\'3\'){clock123=\'1\'}if($(\'clock\'+clock123+\'ye\').innerHTML!=\'\'){if(!confirm(\'闹钟\'+clock123+\'已设定，再次设定将覆盖上一个\')){return false}}var repeat=$(\'repeat1\').checked==true?1:365;var dateN=new Date();var timeN=dateN.getHours()+\':\'+dateN.getMinutes();var h=$(\'h\').value;var m=$(\'m\').value;var tmr=\'\';if(repeat==1){if(h+\':\'+m==timeN){alert(\'设置的时间不能等于当前时间！\');return false}else if(h+\':\'+m<timeN){tmr=\'明天\';alert(\'提示：设置的时间小于当前时间，明天此时才会响铃。\')}else{}}$(\'clock\'+clock123+\'ye\').innerHTML=\'\'+h+\':\'+m+\'\'+(repeat!=1?\'重复\':\'\'+tmr+\'一次\')+\'√\';$(\'clock\'+clock123+\'ye\').title=\"闹钟\"+clock123+\"已设定。时间：\"+h+\":\"+m+\"，\"+(repeat!=1?\"每天重复\":\"不重复\")+\"\";$(\'clock\'+clock123+\'no\').innerHTML=\'×\';$(\'clock\'+clock123+\'no\').title=\'关闭闹钟\'+clock123+\'\';$(\'time\').value=h+\':\'+m;var mid=$(\'mid\').value;var text=$(\'text\').value.replace(/:/g,\'\');tickC(clock123,repeat,h+\':\'+m,mid,text);setCookie(\'cookieColok\'+clock123+\'\',\'\'+clock123+\':\'+repeat+\':\'+h+\':\'+m+\':\'+mid+\':\'+text+\'\',repeat);alert(\'闹钟\'+clock123+\'已设定好！\')}function del(n){if(confirm(\'确定关闭闹钟\'+n+\'么？\')){setCookie(\'cookieColok\'+n+\'\',\'\',0);$(\'clock\'+n+\'Fr\').src=\'about:blank\';$(\'clock\'+n+\'ye\').innerHTML=\'\';$(\'clock\'+n+\'ye\').title=\'\';$(\'clock\'+n+\'no\').innerHTML=\'\';$(\'clock\'+n+\'no\').title=\'\'}}
-->
</script>
<script type=\"text/javascript\">
<!--
function sendMusic(clock123,repeat,time,mid,text){runMusic(\'clock\'+clock123+\'Fr\',mid);setTimeout(\'openMusic(\"\'+clock123+\'\", \"\'+repeat+\'\", \"\'+time+\'\", \"\'+mid+\'\", \"\'+text+\'\");\',2000)}function tickC(clock123,repeat,time,mid,text){var once=window.setTimeout(\'tickC(\"\'+clock123+\'\", \"\'+repeat+\'\", \"\'+time+\'\", \"\'+mid+\'\", \"\'+text+\'\")\',1000);var dateC=new Date();var timeC=dateC.getHours()+\':\'+dateC.getMinutes();if(timeC==time){if(repeat.toString()==\'1\'){window.clearTimeout(once)}sendMusic(clock123,repeat,time,mid,text)}}function openMusic(clock123,repeat,time,mid,text){window.focus();setCookie(\'cookieColok\'+clock123+\'\',\'\',0);if(confirm(\"闹钟\"+clock123+\"提醒您：现在是\"+time+\" \"+text+\" [点确定关闭]\")){$(\'clock\'+clock123+\'Fr\').src=\'about:blank\'}if(repeat.toString()==\'1\'){$(\'clock\'+clock123+\'ye\').innerHTML=\'\';$(\'clock\'+clock123+\'ye\').title=\'\';$(\'clock\'+clock123+\'no\').innerHTML=\'\';$(\'clock\'+clock123+\'no\').title=\'\'}}
-->
</script>
<div id=\"bodyC\">
<div style=\"width:0px;height:0px;overflow:hidden;\">
  <iframe id=\"tryMusicFr\" name=\"tryMusicFr\"></iframe>
  <iframe id=\"clock1Fr\" name=\"clock1Fr\"></iframe>
  <iframe id=\"clock2Fr\" name=\"clock2Fr\"></iframe>
  <iframe id=\"clock3Fr\" name=\"clock3Fr\"></iframe>
</div>
<div class=\"is\">
  <div class=\"i1\"></div>
  <div class=\"i2\"></div>
  <div class=\"i3\"></div>
  <div class=\"i5\">闹钟提醒</div>
</div>
<div id=\"bodyD\">
  <div style=\"height:24px;\">&nbsp;</div>
  <div id=\"nowclock\">当前时间：<font id=\"clock\" face=\"Arial\" color=\"#000080\" size=\"4\" align=\"center\">2010年01月01日 00时00分00秒</font></div>
  <!--form action=\"setclock.html\" method=\"get\" onsubmit=\"return post(this)\"-->
  <form id=\"clockform\">
    <input type=\"hidden\" id=\"time\" name=\"time\" />
    <input type=\"hidden\" id=\"clock123\" name=\"clock123\" value=\"1\" />
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"titleC\">
      <tr>
        <td align=\"center\" class=\"title_\" onclick=\"xuan(this,1)\" id=\"titleC\">闹钟1<br />
            <span id=\"clock1ye\" class=\"red\"></span><span id=\"clock1no\" onclick=\"del(1)\"></span></td>
        <td align=\"center\" class=\"title_\" onclick=\"xuan(this,2)\">闹钟2<br />
            <span id=\"clock2ye\" class=\"red\"></span><span id=\"clock2no\" onclick=\"del(2)\"></span></td>
        <td align=\"center\" class=\"title_\" onclick=\"xuan(this,3)\">闹钟3<br />
            <span id=\"clock3ye\" class=\"red\"></span><span id=\"clock3no\" onclick=\"del(3)\"></span></td>
      </tr>
    </table>
    <div id=\"table\">
      <table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">
        <tr>
          <td width=\"84\" align=\"center\">提醒时间：</td>
          <td>
            <select name=\"h\" id=\"h\">
              <option value=\"0\">0</option>
              <option value=\"1\">1</option>
              <option value=\"2\">2</option>
              <option value=\"3\">3</option>
              <option value=\"4\">4</option>
              <option value=\"5\">5</option>
              <option value=\"6\">6</option>
              <option value=\"7\">7</option>
              <option value=\"8\">8</option>
              <option value=\"9\">9</option>
              <option value=\"10\">10</option>
              <option value=\"11\">11</option>
              <option value=\"12\">12</option>
              <option value=\"13\">13</option>
              <option value=\"14\">14</option>
              <option value=\"15\">15</option>
              <option value=\"16\">16</option>
              <option value=\"17\">17</option>
              <option value=\"18\">18</option>
              <option value=\"19\">19</option>
              <option value=\"20\">20</option>
              <option value=\"21\">21</option>
              <option value=\"22\">22</option>
              <option value=\"23\">23</option>
            </select>
            时
              <select name=\"m\" id=\"m\">
                <option value=\"0\">0</option>
                <option value=\"1\">1</option>
                <option value=\"2\">2</option>
                <option value=\"3\">3</option>
                <option value=\"4\">4</option>
                <option value=\"5\">5</option>
                <option value=\"6\">6</option>
                <option value=\"7\">7</option>
                <option value=\"8\">8</option>
                <option value=\"9\">9</option>
                <option value=\"10\">10</option>
                <option value=\"11\">11</option>
                <option value=\"12\">12</option>
                <option value=\"13\">13</option>
                <option value=\"14\">14</option>
                <option value=\"15\">15</option>
                <option value=\"16\">16</option>
                <option value=\"17\">17</option>
                <option value=\"18\">18</option>
                <option value=\"19\">19</option>
                <option value=\"20\">20</option>
                <option value=\"21\">21</option>
                <option value=\"22\">22</option>
                <option value=\"23\">23</option>
                <option value=\"24\">24</option>
                <option value=\"25\">25</option>
                <option value=\"26\">26</option>
                <option value=\"27\">27</option>
                <option value=\"28\">28</option>
                <option value=\"29\">29</option>
                <option value=\"30\">30</option>
                <option value=\"31\">31</option>
                <option value=\"32\">32</option>
                <option value=\"33\">33</option>
                <option value=\"34\">34</option>
                <option value=\"35\">35</option>
                <option value=\"36\">36</option>
                <option value=\"37\">37</option>
                <option value=\"38\">38</option>
                <option value=\"39\">39</option>
                <option value=\"40\">40</option>
                <option value=\"41\">41</option>
                <option value=\"42\">42</option>
                <option value=\"43\">43</option>
                <option value=\"44\">44</option>
                <option value=\"45\">45</option>
                <option value=\"46\">46</option>
                <option value=\"47\">47</option>
                <option value=\"48\">48</option>
                <option value=\"49\">49</option>
                <option value=\"50\">50</option>
                <option value=\"51\">51</option>
                <option value=\"52\">52</option>
                <option value=\"53\">53</option>
                <option value=\"54\">54</option>
                <option value=\"55\">55</option>
                <option value=\"56\">56</option>
                <option value=\"57\">57</option>
                <option value=\"58\">58</option>
                <option value=\"59\">59</option>
              </select>
            分 </td>
        </tr>
        <tr>
          <td width=\"84\" align=\"center\">闹钟铃声：</td>
          <td>
            <select name=\"mid\" id=\"mid\">
              <option value=\'1\'>滴滴</option>
              <option value=\'2\'>八音盒</option>
              <option value=\'3\'>竹林溪水清笛</option>
              <option value=\'4\'>开场曲</option>
              <option value=\'5\'>Whistle口哨</option>
            </select>
            <button type=\"button\" onclick=\"tryM(this)\">试听</button>
          </td>
        </tr>
        <tr>
          <td width=\"84\" align=\"center\">提示文字：</td>
          <td><input type=\"text\" name=\"text\" id=\"text\" maxlength=\"40\" value=\"休息，休息一下吧！\" />
          </td>
        </tr>
        <tr>
          <td width=\"84\" align=\"center\">重复提醒：</td>
          <td><label for=\"repeat1\">
            <input type=\"radio\" name=\"repeat\" id=\"repeat1\" value=\"1\" checked=\"checked\" />
            不重复</label>
              <label for=\"repeat2\">
              <input type=\"radio\" name=\"repeat\" id=\"repeat365\" value=\"365\" />
                每天提醒</label></td>
        </tr>
        <tr>
          <td width=\"84\" align=\"center\">&nbsp;</td>
          <td><button type=\"button\" onclick=\"post();\">开 启 定 时 闹 钟</button></td>
        </tr>
      </table>
    </div>
  </form>
  <div class=\"point\">
    <h3><a href=\"http://www.162100.com/\" target=\"_blank\">162100</a>提示：</h3>
    <p>·如果关闭页面，闹钟将无法响铃。</p>
    <p>·再次打开页面，先前设定的闹钟仍然生效。</p>
    <p>·需要打开音响或佩戴耳机，以便听到提示铃声。</p>
    <p>·闹钟以您电脑时间为准，请先校对好本机时间。</p>
  </div>
</div>
<div class=\"is\">
  <div class=\"i3\"></div>
  <div class=\"i2\"></div>
  <div class=\"i1\"></div>
</div>
</div>',''),
('5757','homepage','1489203528119','栏目1分类1|4|','','http://www.162100.com/|162100||||
','',''),
('5758','homepage','1489203515724','栏目2分类2|4|','','http://www.162100.com/|162100||||
','',''),
('5764','0','2','综合游戏|4|16','','http://www.17173.com/|17173网游天下||||
http://games.sina.com.cn/|新浪游戏|||新浪游戏是最大中文游戏媒体，下设PC网络游戏、手机游戏、单机游戏、电子竞技、电视游戏、休闲游戏、产业等7大内容板块，超多的游戏美女靓照,提供高速免费游戏下载、游戏试玩、高清游戏视频播报,提供手机游戏新手礼包，权威游戏新闻资讯报道,游戏论坛、游戏工会玩家社区、网络游戏、网游、最新网络游戏、好玩的网络游戏、游戏网站、最新游戏、免费网络游戏、新游戏、最新免费网络游戏。|
http://www.pcgames.com.cn/|太平洋游戏网|||太平洋游戏网是国内专业悠久的游戏资讯门户网站，有电子竞技、网络游戏、电玩游戏、掌机游戏、动漫在线等资讯频道，游戏下载、游戏视频、游戏图库等功能频道，还有火热的游戏公会和社区论坛等着游戏玩家您。|
http://www.4399.com/|<img src=\"writable/__web__/images/0_2/20140305163733.gif\" /> 4399小游戏|redword||4399是中国最大的小游戏专业网站,免费为你提供小游戏大全,4399洛克王国小游戏,双人小游戏,连连看小游戏,赛尔号,奥拉星,奥奇传说小游戏,造梦西游3等最新小游戏。|
http://games.tom.com/|TOM游戏|||TOM游戏|
http://www.7k7k.com/|7k7k小游戏|||7k7k小游戏大全包含洛克王国,赛尔号,7k7k洛克王国,连连看 ,连连看小游戏大全,美女小游戏,双人小游戏大全,在线小游戏,7k7k赛尔号,7k7k奥拉星,斗破苍穹 2,7k7k奥比岛,7k7k弹弹堂,7k7k单人小游戏,奥比岛小游戏,7k7k功夫派,7k7k小花仙,功夫派等最新小游戏。|
http://www.51.com/|51游戏社区|||玩游戏,上51.COM。51游戏是国内知名的网页游戏社区化平台,集游戏研发运营、真人交友、博客空间、美女主播等娱乐业务为一体,51游戏只做口碑最好的网页游戏运营和客户服务。|
http://game.china.com/zh_cn|中华网游戏||||
http://game.yesky.com/|天极网游戏中心|||天极游戏频道提供网络游戏、单机游戏、电脑游戏、电视游戏、手机游戏、网页游戏等新闻资讯、快报、攻略、游戏下载等内容.独特全面的游戏评测、游戏下载、游戏论坛、游戏壁纸等信息尽在天极游戏频道.|
http://game.zol.com.cn/|中关村游戏||||
http://game.mop.com/|猫扑游戏频道|||猫扑游戏频道提供详细的游戏资讯，提供最齐全的游戏攻略、最全面的新游戏产品资讯。给广大网友提供游戏观点发表的社区化游戏平台。|
http://games.qq.com/|腾讯游戏|||games.qq.com:腾讯游戏频道是综合性的游戏媒体,内容涵盖PC网络游戏,网页游戏,IOS安卓手机游戏等各种平台内容，另外还提供激活码礼包发放，永久免费网游、电视游戏、单机游戏等各类消息，此外，还有论坛,写真,迷你游戏,小游戏,攻略秘籍,有奖活动,八卦趣闻,游戏视频,游戏周边等供玩家选择。|
http://game.qq.com/|QQ游戏|||腾讯游戏是腾讯四大网络平台之一，是全球领先的游戏开发和运营机构，也是国内最大的网络游戏社区。无论是腾讯公司整体的在线生活模式布局，还是腾讯游戏的产品布局，都是从用户的最基本需求、最简单应用入手，注重产品的可持续发展和长久生命力，打造绿色健康的精品游戏。在开放性的发展模式下，腾讯游戏采取内部自主研发和多元化的外部合作两者结合的方式，已经在网络游戏的多个细分市场领域形成专业化布局并取得良好的市场业绩。|
http://www.9you.com/|久游网|||互动娱乐社区2.0，娱乐时尚尽在久游|
http://www.chinagames.net/|中国游戏中心|||中国游戏中心是国内著名游戏平台，中国最大的网页游戏、网络游戏、休闲小游戏、棋牌游戏平台，注册用户超2.5亿。提供连连看,升级,斗地主,锄大地,麻将,象棋,五子棋,围棋,四国军棋,台球, 斗地主等数十款在线网络棋牌休闲小游戏; 画皮2、侠义道系列、成吉思汗系列、凡人修真系列、天界、斗破乾坤、大航海、傲剑、神途、新问鼎、热血三国系列、凤舞天骄等大型网游;还有让人热血沸腾的美女社团、帅哥军团等您加入!精彩网络游戏尽在中国游戏中心!|
http://www.92wy.com/|万宇在线|||万宇首页,网络游戏 ,电视游戏,动漫,下载,BT,图库,论坛,博客,个人中心,点卡,游戏美女,截图,壁纸,发号,公会,DKP,图鉴,壁纸板,手办,涂鸦,漫画连载,cosplay,,最大的中文游戏社区|
http://www.131.com/|131游戏之家|||131游戏之家是一家专业性的游戏综合门户网站,为玩家提供游戏资料查询,免费游戏下载,关注网络游戏,在线游戏,电子竞技,动漫,电视游戏,电脑单机游戏,网页游戏的互动交流.|
http://www.7yx.com.cn/|7yx游戏网|||7yx游戏网为您提供最新最全的魔兽世界,天龙八部,永恒之塔,魔域,诛仙,奇迹世界,地下城与勇士,征途,仙剑OL,大话西游,SD敢达,三界奇缘,倚天屠龙记,天堂梦,玄武,笑傲江湖,桃园等网游相关资讯,测试账号,客户端下载。您可以在这里获得最专业的游戏新闻资讯,完善的游戏攻略专区,人气游戏论坛以及新游戏测试账号等,是游戏玩家首选网络游戏资讯门户网站。|
http://www.uuu9.com/|游久网|||游久网是一家专业的游戏媒体，拥有完整且庞大的游戏资讯体系和优质的社区服务，客观真实的反应玩家的声音，是广大玩家必不可少的游戏平台。|
http://www.52pk.com/|52PK游戏网|||游戏第一综合门户是52pk游戏网超过10年的奋斗目标,打造免费中文网游单机游戏下载大全,为玩家提供最权威的原创评测及攻略等。|
http://www.766.com/|766游戏网|||766作为国内最大的游戏玩家聚集地,以服务广大玩家为宗旨,秉承独乐乐不如齐乐乐的文化,提供游戏资讯,下载,视频,社区,专区,活动,空间等各种各样的服务,上766,让你玩得更好|
http://www.ourgame.com/|联众世界|||联众大厅——“快乐每一天！” 联众大厅是提供棋牌休闲与竞技的综合网络休闲游戏平台，包含棋牌、麻将、休闲、大型网络游戏、社区互动娱乐等200余款游戏产品，为用户提供棋牌竞技、社区互动、游戏增值等多种服务。|
http://www.ali213.net/|游侠网|||游侠网为单机游戏玩家提供最新单机游戏业界动态、国内外单机游戏下载、单机游戏补丁、单机游戏攻略秘籍、单机游戏专题等内容。坚守单机阵地，弘扬单机文化！|
http://www.yzz.cn/|叶子猪游戏网|||叶子猪游戏网是国内最专业的网络游戏门户网站,主要为游戏玩家提供最新最全的网络网页游戏资讯,游戏攻略,游戏内测号,游戏激活码等等,同时还提供网游下载,单机游戏下载,网络游戏截图壁纸等下载,选择网络游戏就到叶子猪游戏网.|
http://www.pceggs.com/|PC蛋蛋|||PC蛋蛋(荣获第四届中国最具投资价值媒体奖)于2006年正式上线，融合点击、体验、定向等广告概念，倡导“看广告，赚金蛋，玩游戏，赢大奖！”的理念，让有电脑的用户都有机会通过PC蛋蛋获得丰富的奖品，同时为广告商提供真实有效的广告受众！|
http://www.gamersky.com/|游民星空|||游民星空是国内单机游戏门户网站,提供最具特色的游戏资讯,最新最全的游戏下载,大量游戏攻略,经验,评测文章,以及最新热门游戏资料专题|
http://www.2u.com.cn/|兔友网|||兔友网提供专业的游戏资讯和下载，并有最强的游戏互动专区。是游戏玩家的乐园。|
http://www.youwo.com/|由我网|||游窝网页游戏大全是国内最好玩的网页游戏平台，我们通过不断努力认真挑选网页游戏排行榜，为大家奉上更多高品质好玩的网页游戏和2013最新网页游戏。|
http://www.gameabc.com/|边锋棋牌|||边锋游戏平台是中国专业的网络棋牌游戏中心之一，是边锋网络旗下最主要的棋牌游戏平台，拥有各类棋牌游戏累计达100多种，包括人们熟知的斗地主、升级、麻将、围棋、四国军棋等。|
http://www.duowan.com/|多玩游戏|||多玩游戏网以最专业的游戏新闻中心,最具特色YY语音社区,最强大的游戏论坛为重要组成部分,为玩家提供资讯娱乐全方位体验,成为游戏玩家首要选择的网络游戏资讯门户网站。|
http://www.5378.com/|5378游戏中心|||5378游戏官方网站是目前国内专业网络棋牌平台,提供斗地主,手机斗地主,麻将等游戏.5378游戏麻将网络版提供麻将单机版,麻将网络版下载,麻将游戏机下载还带有3D森林舞、5378游戏中心,奔驰宝马升级游戏下载等.是坐在家里就能玩的网上电玩城！|
','',''),
('5765','0','2','小游戏|4|16','','http://www.4399.com/|4399小游戏|||4399是中国最大的小游戏专业网站,免费为你提供小游戏大全,4399洛克王国小游戏,双人小游戏,连连看小游戏,赛尔号,奥拉星,奥奇传说小游戏,造梦西游3等最新小游戏。|
http://www.3839.com/|3839小游戏|||3839小游戏提供好玩的在线小游戏,双人小游戏,单机小游戏,小游戏下载,包括连连看,奥特曼,赛尔号,洛克王国,奥比岛,摩尔庄园,奥拉星,功夫派,斗龙战士,摩尔勇士等各类小游戏大全。|
http://www.7k7k.com/|7k7k小游戏|||7k7k小游戏大全包含洛克王国,赛尔号,7k7k洛克王国,连连看 ,连连看小游戏大全,美女小游戏,双人小游戏大全,在线小游戏,7k7k赛尔号,7k7k奥拉星,斗破苍穹 2,7k7k奥比岛,7k7k弹弹堂,7k7k单人小游戏,奥比岛小游戏,7k7k功夫派,7k7k小花仙,功夫派等最新小游戏。|
http://www.2144.cn/|2144小游戏|||2144游戏是中国最专业的游戏平台,免费为你提供各种精品小游戏,最全的网页游戏,好玩的手机游戏,同时还提供精品游戏专题，游戏攻略，人气论坛等，玩小游戏,网页游戏,手机游戏就上2144游戏网2144.cn|
http://www.gx22.com/|双人小游戏|||61K小游戏为大家提供各种好玩的小游戏大全,好玩的在线小游戏,,在线小游戏,动作小游戏,冒险小游戏,赛车游戏,等最新经典小游戏。喜欢本站的朋友,让我们一起打造一片快乐的小游戏天地!|
http://www.game.com.cn/|游戏中国|||Looking for amazing games? A10.com has awesome free online games for you. Enjoy racing, action and multiplayer games. All full screen in your browser!|
http://www.456.net/|456小游戏|||7k7k小游戏大全包含7k7k单人小游戏,7k7k双人小游戏大全,美女小游戏,连连看,奥特曼小游戏等,还有7k7k赛尔号,7k7k赛尔号2,7k7k洛克王国,7k7k弹弹堂,7k7k功夫派,7k7k奥拉星。快来玩吧!|
http://www.92game.net/|92小游戏||||
http://wanwan.sina.com.cn/casual/|新浪小游戏||||
http://www.caihongtang.com/|彩虹堂|||欢迎光临彩虹堂小游戏网,这里有很多很漂亮很好玩的休闲小游戏,尤其是女生喜欢的各种换装小游戏,美女小游戏,化妆小游戏,做饭小游戏,解谜小游戏,让你在玩的同时,还能锻炼自己审美能力和动手能力,快来玩吧,还等什么呢？|
http://miyu.yule.com.cn/|中娱网谜语大全|||娱乐谜语，谜语大全|
http://www.9477.com/|9477小游戏|||9477小游戏是一个比7k7k小游戏更加好玩的在线小游戏网站,提供7k7k小游戏,4399小游戏等的优秀小游戏大全|
','',''),
('5766','0','2','网页游戏|4|16','','http://www.265g.com/|265G网页游戏|||网页游戏第一门户站:::265G.COM:::是全国最大的网页游戏资讯网站，提供最新网页游戏相关报道和免费网页游戏资料。|
http://www.91wan.com/|91wan网页游戏|||91wan网页游戏平台是专业的网页游戏娱乐平台,这里汇集了最新网页游戏和好玩的网页游戏!想玩什么,就玩什么.是白领们玩网页游戏的首选网页游戏大全网站!|
http://www.51wan.com/|我要玩网页游戏|||网页游戏第一平台::51WAN.COM::网页游戏,网页游戏开服表，权威网页游戏排行榜,最超值免费网页游戏礼包。|
http://web.4399.com/|4399网页游戏|||4399网页游戏是专注精品页游的一线游戏平台，为广大玩家提供战天、七杀、弹弹堂、神武九天、风色轨迹、太古遮天、凡人修真2、小小精灵、梦幻飞仙、莽荒记等精品好玩的网页游戏|
http://www.popwan.com/|泡泡玩网页游戏|||优玩游戏(uwan) 是国内最顶尖的网页游戏开发和运营平台。秉承优质好玩,快乐分享的理念。你可以免费体验最精品的游戏、分享你快乐的游戏生活！|
http://www.yeyou.com/|页游网|||页游网是全球最大的网页游戏门户网站，内容涵盖最新最全的网页游戏资讯、免费的网页游戏资料、及时准确的网页游戏开服开测信息、最丰富的网页游戏活动发号、最劲爆的3D页游收录等，并致力于成为为所有网页游戏用户提供一站式服务的开放平台。|
http://youxi.baidu.com/|百度玩吧|||百度游戏是百度旗下网页游戏，移动游戏，网络游戏，跨平台多端网络游戏运营发行平台，为亿万网民提供最贴心便捷的游戏娱乐服务，使用百度通行证可快速登录百度游戏各种精品游戏，还能独享百度游戏为您准备的专属特权服务，使用积分、金券，优惠券享受各种游戏礼品!玩游戏，就选百度，一起来吧！|
http://www.07073.com/|07073游戏网|||网页游戏第一门户：为玩家朋友提供最新网页游戏、网页游戏大全、激活码、礼包、评测、产业、开服、攻略等20多个频道，是游戏玩家和厂商首选的最佳服务平台。|
http://www.dajiawan.com/|大家玩||||
','',''),
('5767','0','2','网络游戏|4|16','','http://wow.blizzard.cn/|魔兽世界|||访问魔兽世界中文官方网站，获取最时事的魔兽世界官方动态，参与丰富的魔兽世界官方活动，查阅最权威丰富的魔兽世界资讯|
http://au.9you.com/|劲舞团|||劲舞团 突破78万同时在线 休闲网络游戏的王者|
http://popkart.tiancity.com/homepage/|跑跑卡丁车||||
http://zt.ztgame.com/|征途|||《征途》是上海巨人网络科技有限公司第一款自主研发的网络游戏，这款2D大型多人在线角色扮演类网游，始终扮演着行业“创新者”的角色。给玩家发“工资”的运营创新、“无区界”自由跨服的“技术创新”、“大百科全书”的玩法创新，促使《征途》注册用户和同时在线人数一路飚升，成为全球第三款同时在线超百万的网络游戏。|
http://wd.gyyx.cn/|问道|||问道，精品免费回合网游,百万在线巅峰巨作，中国传统风格回合巨作，《问道》以千锤百炼的精良品质、海量玩法竭诚为您开启封神洪荒世界，火爆新服等你来，5万人同服竞技！|
http://bnb.sdo.com/|泡泡堂|||泡泡堂-盛大网络|
http://www.fsjoy.com/|街头篮球||||
http://xyq.163.com/|梦幻西游|||梦幻西游2，网易回合制网游旗舰，西游题材扛鼎之作；2.5亿注册用户， 271万玩家最高在线，每周有新服开放。人物和画面超可爱、轻轻松松交朋友！|
http://speed.qq.com/|QQ飞车|||《QQ飞车》是首款腾讯自主研发的竞速类休闲网络游戏，底层架构基于世界领先的物理引擎PhysX，游戏手感全面超越市场同类产品，全力为用户打造逼真的驾驶体验；3D时尚人物造型、古朴潮流幻想的赛道主题、第三人称尾随视角，力求为用户营造身历其境的感觉。在2011年的5月，最高同时在线帐户数突破200万，乃中国网游史上第九款同时在线冲破百万大关的产品，并为全球游戏市场奉献了第一款同时在线破百万的竞速类网络游戏，同时，也使腾讯拥有了第一款同时在线破百万的自主研发产品。|
http://mxd.sdo.com/|冒险岛||||
http://cf.qq.com/|穿越火线|||腾讯游戏《穿越火线》下载官方网站。300万人同时在线，三亿鼠标的枪战梦想。《穿越火线》追求的不仅仅是开枪的爽快感，而是来自相互合作及默契带来的战略意义。最新活动尽在CF官方网站。|
http://tl.sohu.com/|天龙八部|||《新天龙八部》全新版本纵情四海即将揭晓，亲朋好友齐聚江湖，多重夏季活动持续更新，暑期福利天天放送，热力引爆整个夏天！入驻新服，秒享多项特权；社交体系全面进化，让天龙成为你的生活方式，情燃七月，四海天下！|
http://www.zhuxian.com/|诛仙|||《诛仙3》新春狂欢进行时！天书新卷开启终极秘境；封神“天罡”横空出世；十万大山探寻神装奥秘！十五大职业再现光彩，灵境战场打破数据鸿沟。系列新春装备火热上市，线上狂欢等你参加！|
http://www.wulin2.com.cn/|武林外传|||旗舰级Q版3D网游巨作《武林外传·号令江湖》，秉承了《武林外传》原作轻松、幽默的风格，为玩家展现一个内容丰富的喜剧武侠世界。|
http://www.world2.com.cn/|完美世界|||《完美世界》官网，《完美世界》首创飞行系统、形象自定义系统！爽快PK、恢弘城战、拥有私人家园、15大副本。内容丰富，好玩不贵！|
http://mir2.sdo.com/|热血传奇||||
http://td.zqgame.com/|天道|||迎八周年庆典，极限PK经典国战网游《天道》2015年度资料片“武道之巅”来袭，职业转换系统与昆仑六境副本同步上线，助玩家开启全能武道之巅时代……|
http://kz.zqgame.com/|抗战|||中国第一抗战网游《抗战》新服火爆开启,全维度史诗抗战拉开序幕!万人跨服军演,首创地道战、地雷战、战机飞行、战舰突袭、保钓等玩法！|
http://1000y.sdo.com/|千年3|||《千年3》是在韩国Actoz公司开发的千年系列游戏的基础上，由盛大网络进行后续研发和独家运营的一款纯正武侠风格的大型多人在线角色扮演网络游戏。它架构出一个精彩纷呈的古代武侠虚拟世界。通过修炼各种相生相克的武功，闯荡江湖体会游戏乐趣，并成武林霸主、一代宗师来造就这恩怨不息的千年江湖。|
http://www.shumenol.com/|蜀门|||《新蜀门》官方网站提供最新游戏下载。《新蜀门》是上海绿岸网络旗下的中国原创武侠游戏，最高在线突破50万人。蜀门客户端下载仅需10分钟。2.8D山水画风，中低配置效果全开。登录蜀门游戏还有30元话费奖励领取。2014年《新蜀门》全新资料片今日开测，上线即可领取限时限量的游戏礼包，火爆新区新服同步开启。一起抵制蜀门私服。|
http://hero.woniu.com/|英雄之城|||《英雄之城》荣获2009年金翎奖-玩家最爱网页游戏奖项，《英雄之城》是蜗牛游戏自主研发的第二代网页游戏,拥有媲美单机游戏的华丽画面、堪比大型网络游戏的丰富玩法。《英雄之城》属第二代网页游戏开山之作!|
http://www.uwan.com/Special/090626/default.htm|商业大亨||||
http://han.70yx.com/|成吉思汗|||《成吉思汗》全新资料片“全职联盟”10月25日火爆上线，全新全职业转职功能即将开启，体验更多职业，PK不惧他人！|
http://chd.sdo.com/|彩虹岛|||彩虹岛-盛大网络|
http://aion.sdo.com/|永恒之塔||||
http://mirs.sdo.com/|传奇外传|||传奇外传―PK爽 升级快 人人有钱赚|
http://kart.sdo.com/|疯狂赛车II|||盛大在线是中国领先的互动娱乐内容运营平台。利用便捷的销售网络、完善的付费系统、广泛的市场推广网络、强大的技术保障系统、领先的客户服务、稳妥的网络安全系统为用户提供高水准的服务，为合作伙伴创造价值。|
http://xyx.sdo.com/|新英雄年代||||
list_class.php?column_id=0&class_id=3|更多精彩网游&gt;&gt;||||
','',''),
('5768','0','2','电竞资讯|4|16','','http://www.cga.com.cn/|浩方对战平台||||
http://battle.qq.com/|QQ对战平台||||
http://game.vsa.com.cn/|VS对战平台|||全球最大的电子竞技平台，最专业的平台带给您最专业的服务。|
http://ts.youxia.com/|TS语音聊天||||
http://games.sina.com.cn/esports|新浪电子竞技||||
http://www.pcgames.com.cn/fight|太平洋电子竞技||||
http://www.esport.com.cn/|ECP电子竞技|||在线运动商城是您首选的体育运动用品网上商城，提供足球,乒乓球,羽毛球,网球,运动鞋,运动服饰,户外用品，健身器材等专业运动装备，任您挑选，满足您的运动所需。|
http://www.5173.com/|5173游戏服务网||||
http://www.emu999.net/|模拟999|||emu999.net电玩999,原模拟999为您提供街机游戏下载,PSP游戏下载,NDS游戏下载,GBA游戏下载,模拟游戏下载,街机游戏下载第一站!|
http://www.51nes.cn/|我要nes游戏网|||最全面的NES游戏下载网站，拥有几千个nes游戏和上万篇攻略秘籍，适合各种手机使用的nes手机模拟器，并不断进行nes游戏相关资源的收集及整理，喜欢本站的朋友请牢记www.51nes.cn。|
http://www.jdyou.com/|简单游||||
http://tingyx.uuu9.com/|优久网-游戏音乐||||
http://www.yezizhu.com/|叶子猪游戏乐园|||叶子猪游戏网是国内最专业的网络游戏门户网站,主要为游戏玩家提供最新最全的网络网页游戏资讯,游戏攻略,游戏内测号,游戏激活码等等,同时还提供网游下载,单机游戏下载,网络游戏截图壁纸等下载,选择网络游戏就到叶子猪游戏网.|
http://war3.uuu9.com/sports|U9魔兽竞技频道||||
http://www.plu.cn/|PLU游戏平台|||PLU游戏视频,龙珠直播,TGA直播-最全的赛事直播,最丰富的游戏视频互动平台.提供德玛西亚杯、LPL、CFPL、SSC、F1天王赛等顶级赛事的高清、流畅直播,为玩家个人直播提供全面支持,最快更新上传赛事、解说、搞笑、攻略、花絮视频,这里是观看比赛、选手、解说、美女直播和视频的最佳平台|
http://www.gtv.com.cn/|GTV|||GTV每年制作上千小时的精良电视节目内容，包括电竞赛事转播、游戏新闻资讯、热门游戏攻略教学、明星访谈、专题片等，在广泛且忠实的游戏玩家用户群体中拥有良好的口碑，并致力于成为中国最具影响的游戏媒体。|
http://www.replays.net/|Replays.net|||锐派游戏(RN)是专业游戏资讯站，从2002年成立至今，锐派网一直是国内最领先的电子竞技专业门户，连续多年荣获电竞奥斯卡全球最佳电子竞技网站提名，并于2008年电竞奥斯卡当选全球最佳电子竞技 网站，我们提供电子竞技、网络游戏、单机游戏、游戏下载、小游戏、网页游戏等所有相关的游戏资讯相关服务。For Fun, For Game...|
','',''),
('5769','0','2','掌机游戏|4|16','','http://www.cngba.com/|玩家网|||游戏玩家网是中国最大的电视游戏、网络游戏、网页游戏、单机游戏、手机游戏、掌上游戏网站,给游戏玩家提供最新游戏资讯、游戏大全、游戏下载、游戏攻略和游戏论坛等,玩游戏就上玩家网!|
http://www.gamer.com.tw/|巴哈姆特||||
http://www.a9vg.com/|电玩部落|||A9VG电玩部落，中国电玩领先平台，致力于为玩家报道最新主机游戏独家资讯，ps4和xbox one等主机电视游戏原创攻略，更有玩家论坛提供电玩游戏交流平台。|
http://www.91uu.com/|91uu手游门户|||91uu手游门户为您提供最好玩的手机游戏，最新手机游戏新闻，手机游戏免费下载，专业手机游戏测评，深度手机游戏攻略，手机游戏破解版下载，安卓手机游戏下载，手游就上91uu.com!|
','',''),
('5770','0','2','游戏下载|4|16','','http://pstatic.xunlei.com/channel3/|迅雷游戏下载||||
http://games.qq.com/downlo/download.shtml|腾讯游戏下载||||
http://www.ourgame.com/download|联众游戏下载||||
http://dl.pcgames.com.cn/|太平洋游戏下载|||游戏下载：太平洋游戏网游戏下载中心提供各类最新免费网游客户端补丁下载，电脑单机游戏下载，手机掌机游戏下载，竞技比赛视频录像下载、游戏周边动漫音乐下载等资源。|
http://download.17173.com/|17173游戏下载|||17173下载站是专业的游戏下载站点,提供游戏免费高速CDN下载服务.同时提供游戏,客户端,补丁,壁纸,视频,动画,工具等下载服务|
http://www.ali213.net/|游侠网|||游侠网为单机游戏玩家提供最新单机游戏业界动态、国内外单机游戏下载、单机游戏补丁、单机游戏攻略秘籍、单机游戏专题等内容。坚守单机阵地，弘扬单机文化！|
http://www.onlinedown.net/sort/8_1.htm|华军软件游戏下载||||
http://games.sina.com.cn/downgames|新浪游戏下载||||
http://www.verycd.com/groups/onlinegame|VeryCD网游专区||||
','',''),
('5771','0','2','栏目头栏','','','<iframe id=\"o1489927434578\" name=\"o1489927434578\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" height=\"3000\" scrolling=\"yes\" src=\"http://g.360.cn/topbar.html\" style=\"margin-top:px; margin-left:px;\"></iframe>',''),
('5873','1','12','浙江医院|4|16','','http://www.zjwst.gov.cn/|浙江卫生信息网||||
http://www.hospitalstar.com/|浙江省人民医院|||浙江省人民医院|
http://www.womanhospital.cn/|浙大医学院妇产科||||
http://www.zjuch.cn/|浙大医学院儿童医院||||
http://www.zjhospital.com.cn/|浙江医院||||
http://www.zy91.com/|浙江省第一医院||||
http://www.zjtongde.com/|浙江省立同德医院||||
http://www.hz6hospital.com/|杭州市第六人民医院||||
http://www.hzabl.com/|杭州阿波罗男子医院|||杭州阿波罗男子男科医院，是中国杭州最好的男科医院，是浙江省男科医院的典范，浙江最好的男科医院。主要针对男性前列腺炎，早泄，阳痿，生殖器官感染，男性不孕不育等症状进行治疗，为广大男性朋友提供健康保健服务，还有男科专家在线为您解答，选男科医院就到杭州阿波罗男科医院|
http://www.hzgchospital.com/|湖州市肛肠专科医院||||
http://www.jh-hospital.com.cn/|金华铁路医院|||金华市第五医院创建于1982年，市直属公立医院；皮肤病诊疗水平浙江中西部处于领先地位，金华皮肤病医院皮肤科开展自体表皮游离移植治疗白癜风、骨科开展关节镜治疗关节疾病，创金华皮肤病治疗之先。金华市第五医院皮肤科专家达40余名。金华皮肤病,金华皮肤美容,金华皮肤病医院,金华皮肤美容,金华美容医院,金华皮肤病专科，金华皮肤科,金华皮肤专科,金华皮肤病治疗,金华皮肤病专家,金华第五医院,金华铁路医院|
http://www.zjkq.com.cn/|浙江省口腔医院||||
http://www.zjrj.com/|浙江省荣军医院||||
','',''),
('5872','1','12','安徽医院|4|','','http://www.ahwst.gov.cn/|安徽省卫生厅|||安徽省卫生和计划生育委员会,安徽卫计委,卫计委|
http://www.ahetyy.com/|安徽省立儿童医院||||
http://www.ahslyy.com.cn/|安徽省立医院||||
http://www.ayfy.com/|安徽医大附属一院|||安徽医科大学第一附属医院创办于1926年，经过80多年的发展，医院已成为国家卫生部三级甲等医院，全国卫生系统先进集体，卫生部临床药理基地，安徽省文明标兵单位，是安徽省规模最大的、集医疗、教学、科研、预防、康复、急救为一体的综合性教学医院。|
http://www.yjsyy.com/|皖南医学院弋矶山院||||
http://www.ahmch.com.cn/|安徽省妇幼保健所|||安徽省妇幼保健所是安徽省卫生行政部门批准的一所集医疗、预防、科研、康复于一体的现代化宗合性医疗机构，医院倡导绿色医疗、人文医疗、和谐医疗。安徽省妇幼保健院网上预约|
http://www.hfzs.com/|合肥中山医院|||合肥中山医院是综合性非营利性大医院，是合肥最好男科妇科医院，合肥中山医院设有男科，妇科，不孕不育科，妇产科等科室。合肥中山医院电话0551-64251111。|
','',''),
('5870','1','12','江西医院|4|','','http://www.jxwst.gov.cn/|江西省卫生厅||||
http://www.jxcancer.cn/|江西省肿瘤医院||||
http://www.jxndefy.cn/|南昌大学附属二院|||南昌大学第二附属医院官方网站-江西优秀的公立三级甲等医院|
http://www.jxszyy.nc.jx.cn/|江西省中医院||||
http://www.jxmu.edu.cn/|南昌大学医学院||||
http://www.jxbc.org/|江西省血液中心||||
http://www.lslyy.com/|江西省庐山疗养院||||
','',''),
('5871','1','12','福建医院|4|16','','http://www.fjphb.gov.cn/|福建卫生信息网||||
http://www.fjsl.com.cn/|福建省立医院||||
http://www.fjzl.com.cn/|福建省肿瘤医院||||
http://www.fjsj.com/|福建省级机关医院|||设计维护：海西天成(www.txwl.cn)|
http://www.fjfk.com/|福州肺科医院||||
http://www.bmjkw.com/|福州鼓楼医院|||福州鼓楼医院创建于1958年是福州首家具有55年的综合性医院,鼓楼医院临床重点科室是:福州妇科医院,福州骨科医院,福州不孕不育医院,福州耳鼻喉医院为一体的综合性老牌医院,专家咨询电话400-899-0333|
http://www.xmdeyy.com/|厦门市第二医院||||
http://www.xmfybj.cn/default.asp|厦门市妇幼保健院||||
http://www.xmhealth.gov.cn/|厦门市卫生局||||
http://www.xmxy.net/|厦门市仙岳医院||||
http://www.xmzsh.com/|厦门市中山医院||||
http://www.xmdsyy.com.cn/|厦门市第三医院||||
http://www.qzfeyy.com/|泉州市妇幼保健院||||
http://www.xiameneye.org.cn/|厦门眼科中心|||厦门大学附属厦门眼科中心是国家临床重点专科医院，坚持以病人为中心，是无假日医院。中心集教学、科研、防盲为一体，医术精湛，被誉为海西第一眼科、全国最好的眼科医院。中心设立眼库及博士后科研工作站，专业治疗近视眼、白内障、小儿斜弱视、眼底疾病、角膜病、眼外伤、青光眼、眼整形、医学验光配镜等。全国咨询热线：400-8852-777|
http://www.zzfh.com/|漳州市医院网站||||
http://www.fjxiehe.com/|医科大学协和医院|||This is my page|
http://www.dfnz.com.cn/|福州东方男子医院|||福州男科医院-福州东方男子医院是福州最好的男科医院,福州男科规范诊疗医院看男科疾病最权威!福州治疗前列腺炎,包皮过长,包茎,早泄,阳痿,男性不育,男性传播疾病等男科疾病最好的唯一专业男科医院,福州男科医院男科医生咨询0591-83510000.|
http://www.fyyy.com/|医科大学附属一院||||
http://www.chinazxmr.com/|福州总院整形科|||福州总院整形是福州第一家公立三甲整形医院,60多年历史的千锤百炼,过硬的整形美容技术,已使总院整形成为福州整形医院中的领头者!福州总院公立三甲整形,让你美不胜收.|
http://www.4666111.cn/|福州三爱堂医院|||4666111游戏赚钱网为您分享免费的网络游戏赚钱项目，分享玩游戏赚钱方法，提供现在有什么游戏好玩可以赚钱，为您推荐最赚钱的游戏。|
','',''),
('5829','1','3','栏目头栏','','','<iframe width=\"100%\" frameborder=\"0\" scrolling=\"no\"  style=\"height:1521px;background:#FFFFFF;\" src=\"http://auto.sina.com.cn/416/2014/0926/3048.shtml\"></iframe>',''),
('5869','1','12','山东医院|4|','','http://www.qd-hospital.com.cn/|青岛市市立医院||||
http://www.sdhospital.com.cn/|山东省千佛山医院|||山东省千佛山医院成立于年隶属山东省卫生厅为山东大学附属医院经过年的开拓创新现已发展成为专业布局合理科室设置齐全技术力量雄厚医疗设备先进服务质量优良集医疗教学科研康复保健预防急救于一体的省级大型综合性三级甲等医院医院设有临床医技科室余个开放床位张现有副高级以上职称专业技术人员余人博士硕士生导师多名山东大学等兼职教授副。|
http://qdumh.qd.sd.cn/|青大医学院附属医院|||青岛大学附属医院是青岛市最大最全的综合性医院，国家三级甲等医院！|
http://qdumh.qd.sd.cn/|青大医学院附属医院|||青岛大学附属医院是青岛市最大最全的综合性医院，国家三级甲等医院！|
http://www.add-ts.com/|博大儿童多动抽动症防治|||ギャンブルでADHDの治療 ADHDトゥレットパートナーを持つ子供達の予防と治療の最新の科学的な発展について話をする場であるadd-ts.comへようこそ。近日、日本の研究者たちはADHDを持つ大人が、治療法としてオンラインカジノを試すと最高のオンラインカジノオンラインカジノの評価をするウェブサイトいう興味深い記事を|
http://www.east120.com/|济宁老年血管病医院|||治疗血管病医院哪家好?选济宁老年血管病医院,专业治疗各类心脑血管病的专科医院，已治疗海内外心脑血管病患者二十余万例，总有效率达99%以上。咨询电话：400-6937-120。|
http://www.lchospital.cn/|聊城市人民医院|||聊城市人民医院现已发展成为国家药物临床试验基地、博士后科研工作站、卫生部肝脏移植指定单位、澳大利亚查尔斯特大学博士研究生培养基地、山东大学医学院研究生培养基地、徐州医学院麻醉学硕士研究生培养基地、泰山医学院聊城临床学院，泰山医学院口腔学院设在该院。|
','',''),
('5824','1','3','驾校学车|4|','','http://www.xueche.net/|学车网||||
http://www.jxedt.com/|驾校一点通||||
http://www.51xueche.com/|全国驾校网||||
','',''),
('5825','1','3','各地汽车网|4|16','','http://www.beiyacheshi.com/|北亚车市||||
http://www.mycar168.com/|深圳汽车大世界网|||汽车大世界（mycar168.com）是中国第一全互动汽车新媒体平台。为您提供最新最全汽车报价，汽车图片，车型参数，车市行情，新车实拍、试驾评测，车型导购，车友会论坛，自驾游，维修保养，养车用车，自媒体矩阵等互动资讯内容。|
http://www.029car.cn/|西安汽车网|||西安汽车网为车友提供最新的西安汽车报价,陕西汽车报价,西安违章查询,西安汽车团购,西安车市最新报价行情,西安汽车优惠信息,西安新车及经销商信息,西安汽车团购,车型图库,西安汽车维修,西安汽车违章查询,西安自驾游活动,西安车友会,西安车友俱乐部,西安汽车论坛,西安汽车用品,西安汽车经销商4s店等信息,是您选车购车的第一网络平台.|
http://www.0755car.com/|车神榜深圳汽车网||||
http://www.qdcars.com/|青岛汽车网|||青岛汽车网是青岛市汽车行业协会官方网站，青岛汽车网为您提供青岛汽车最新资讯，青岛汽车团购，青岛二手车，青岛汽车报价，青岛4S店等相关方面的第一手资讯。|
http://www.autohunan.com/|湖南汽车网|||湖南汽车网(www.autohunan.com)-中国区域(本地)汽车网的领跑者|
http://www.auto.js.cn/|江苏汽车网||||
http://auto.tfol.com/|天府汽车||||
http://auto.online.sh.cn/|上海热线汽车频道||||
http://www.szcw.cn/|苏州车网|||苏州车网为您提供苏州地区最全面,最及时的汽车新闻,汽车导购,汽车报价及车型参数配置,汽车图片,汽车行情,汽车试驾,汽车评测,汽车经销商信息,是苏州地区信息最快最全的专业汽车网站|
http://www.yzcar.net/|扬州汽车网||||
http://www.xjauto.net/|新疆汽车网||||
http://www.autodg.com/|东莞汽车网|||东莞汽车网(Autodg.com)东莞汽车专业媒体，东莞车展、电台合作伙伴。提供东莞汽车报价、东莞车行、原创试驾、汽车导购、汽车团购、汽车答疑、东莞汽车违章查询。|
http://www.sxac.com/|陕西汽车网|||陕西汽车网是陕西省专业的汽车网，为车友提供最新的陕西汽车报价、西安汽车报价、西安汽车团购、西安车市行情、车型图库、西安汽车维修、西安自驾游活动、西安车友会、西安车友俱乐部、西安汽车论坛、西安汽车用品等及时、便捷的信息通道。服务陕西车市动态、最新汽车报价、汽车团购信息，在陕西汽车车商与消费者之间搭建一座快速及时的桥梁。|
http://www.wzauto.com/|温州汽车网|||温州人的汽车门户网站。温州专业的汽车门户网站。温州汽车网下设汽车资讯、报价、导购、评测、用车玩车、用品、二手车、专题、交通、香车美女、论坛、博客等频道，并拥有温州地区全面的、评价权威的车型数据库和图库。公益服务项目：温州车行、auto在线、车型对比、汽车团购、车管疑问、温州违章查询、购车顾问服务等，为老百姓提供方便快捷的有关汽车类的信息。|
http://www.ahauto.com/|安徽汽车网|||安徽汽车网是一个安徽省汽车行业专业网站,主要提供汽车报价、汽车资讯、汽车图片、二手车、汽车租赁、汽车贷款、汽车保险、汽车美容、汽车维修、汽车驾校团购、品牌官方车友会等信息|
http://www.bayuche.com/|巴渝车网|||巴渝车网是重庆本土最大的重庆汽车网站，为您提供重庆汽车报价，重庆车市动态，重庆汽车资讯的专业重庆汽车网，关注巴渝车网，玩转重庆汽车生活！|
http://www.0769auto.com/|东莞汽车网|||东莞汽车网(www.0769auto.com)东莞本土汽车网络媒体,东莞信息港旗下东莞汽车网站,东莞汽车网下设东莞汽车新闻、东莞汽车报价、汽车导购、东莞汽车团购、试驾评测、用车玩车、东莞汽车用品、东莞二手车、东莞车展|
','',''),
('5826','1','3','汽车品牌|4|16','','http://www.toyota.com.cn/|丰田汽车|||丰田的企业讯息,产品以及技术,环境和社会活动等企业报道的官方网站。|
http://www.gmchina.com/|通用汽车中国|||General Motors Company(GM), the worlds largest automaker,brands among automakers in China. Products are sold under the Baojun, Buick, Cadillac, Chevrolet, Opel, Wuling and Jiefang nameplates.Based in China, Together with China, the intentions of the Chinese|
http://www.csvw.com/|上海大众汽车||||
http://www.renault.com.cn/|日产-雷诺||||
http://www.bmw.com.cn/|宝马|||访问BMW中国官方网站，详细了解BMW全线车型，BMW官方价格，BMW最新市场活动和新闻，BMW官方授权经销商，BMW二手车，金融服务与BMW原装配件的详尽信息。BMW中国官方俱乐部，精彩在线视频，带您步入BMW天地，开启BMW驾驶乐趣之旅。|
http://www.bbdc.com.cn/|戴姆勒-克莱斯勒||||
http://www.kia-motor.com.cn/|现代-起亚||||
http://www.honda.com.cn/|本田中国|||欢迎访问Honda本田中国官方网站。本站提供关于本田产品、先进技术的介绍，和公司在国内及全球范围社会活动的最新资讯。|
http://www.mercedes-benz.com.cn/|奔驰|||欢迎浏览梅赛德斯-奔驰中国网站。在这里您可以浏览有关奔驰乘用车、AMG、商用汽车，梅赛德斯-奔驰的优质服务、最新消息及活动，一级方程式赛车的精彩信息以及职位招聘的相关信息。|
http://www.shanghaigm.com/|上海通用||||
http://www.audi.cn/audi/cn/zh2.html|奥迪||||
http://www.guangzhouhonda.com.cn/|广州本田||||
http://www.beijing-hyundai.com.cn/|北京现代汽车||||
http://www.dpca.com.cn/|神龙汽车||||
http://www.chery.cn/|奇瑞汽车|||奇瑞汽车官网为您提供奇瑞艾瑞泽7,瑞虎5,瑞虎3,奇瑞E3,奇瑞E5等各款车型的报价、油耗、性能等参数及各经销商信息,支持消费者预约试驾及在线购买,更多奇瑞汽车、二手车等信息尽在奇瑞官方网站。|
http://www.geely.com/|吉利轿车|||浙江吉利控股集团始建于1986年，1997年进入汽车行业，多年来专注实业，专注技术创新和人才培养，取得了快速发展。现资产总值超过1000亿元，连续十年进入中国企业500强，连续八年进入中国汽车行业十强，是国家|
http://www.tjfaw.com/|天津一汽夏利汽车||||
http://car.faw.com.cn/car/index.jsp|红旗网||||
http://www.acura.com.cn/acuranewsite/index.html?http://auto.sina.com.cn/salon/HONDA/acurajk/sub_brand/TL.html|Acura讴歌汽车||||
http://www.brilliance-auto.com/|华晨汽车||||
http://www.bydauto.com.cn/|比亚迪汽车|||比亚迪汽车官方网站,介绍产品包括比亚迪宋、比亚迪唐、比亚迪秦、比亚迪S7、比亚迪S6、比亚迪全新F3、比亚迪G5、比亚迪速锐、比亚迪M6、比亚迪F0、F3DM、电动汽车e6等,以及陆续推出的一系列542战略新车型,比亚迪,新能源汽车领导者,与您一路同驰骋。|
http://www.cadillac.com.cn/|凯迪拉克|||欢迎进入全新凯迪拉克中国官方网站。在这里您可以浏览凯迪拉克全系车型、查询全国凯迪拉克经销商、品鉴凯迪拉克优质服务、了解凯迪拉克最新消息及活动等信息。|
http://www.changansuzuki.com/|长安铃木|||长安铃木官方网站,包括世界级小车领袖新奥拓、极具驾驶乐趣的两厢车雨燕、真正的跨界车天语SX4、黄金性价比之车天语尚悦、省油耐用好养护新羚羊的车型展示|
http://www.dyk.com.cn/|东风悦达.起亚|||欢迎您来到东风悦达起亚官网。目前我们提供新K5、K3、K2、K2两厢、新福瑞迪等的高级轿车和智跑、新狮跑、秀尔等SUV车型的外观、内饰图片和信息|
http://www.gwm.com.cn/|长城汽车|||长城汽车股份有限公司是中国最大的SUV和皮卡制造企业，已于2003年、2011年分别在香港H股和国内A股上市，截止2012年12月31日总资产达到425.69亿元。目前，旗下拥有哈弗、长城两个产品品类品牌，产品涵盖SUV、轿车、皮卡三大品类，拥有四个整车生产基地、80万辆产能。|
http://www.hafeiauto.com.cn/|哈飞汽车|||中国微型车制造和研发的奠基者和先行者,中国汽车骨干生产企业和研发基地。主要产品有哈飞骏意、路尊小霸王、民意等微型客车与货车系列,路宝微型轿车系列,赛马、赛豹经济型轿车系列及新能源汽车。|
http://www.heibao.com/|黑豹汽车|||中航黑豹股份有限公司位于山东省威海市文登区龙山路107号，总占地面积96.4万平方米，现有员工2000余人。|
http://www.huapucar.com/|华普汽车|||Chat lines numbers with free trials are generally frequently used nowadays by women and also intriguing guys. Before you decide to become an actual participant consider a local chatline that offer a free trial to find out if you enjoy the chat platform.|
http://www.hyundai-motor.com.cn/|现代汽车|||欢迎来现代进口汽车官方网站. 本网站包括现代汽，紧凑型，中高级车，豪华车，SUV, MPV车型欣赏、产品亮点、车型配置、市场指导价格，以及产品手册等综合信息，了解更多现代捷恩斯。|
http://www.jac.com.cn/|江淮汽车|||安徽江淮汽车股份有限公司(简称“江淮汽车”)，是一家集商用车、乘用车及动力总成研发、制造、销售和服务于一体的综合型汽车厂商。公司前身是创建于1964年的合肥江淮汽车制造厂。1999年9月改制为股份制企业，隶属于安徽江淮汽车集团有限公司。2001年在上海证券交易所挂牌上市，股票代码为600418。|
http://www.mazda3.com.cn/|一汽马自达||||
http://www.nissan.com.cn/|NISSAN中国||||
http://www.peugeot.com/fr/default.htm|标致汽车||||
http://www.saicgroup.com/|上海汽车工业总公司|||上海汽车集团股份有限公司（简称上汽集团，股票代码为600104）是国内A股市场最大的汽车上市公司，截至2012年底，上汽集团总股本达到110亿股。目前，上汽集团主要业务涵盖整车(包括乘用车、商用车)、零部件(包括发动机、变速箱、动力传动、底盘、内外饰、电子电器等)的研发、生产、销售，物流、车载信息、二手车等汽车服务贸易业务，以及汽车金融业务。|
http://www.sgmw.com.cn/|上汽通用五菱|||上汽通用五菱官方网站|
http://www.shac.com.cn/|上海汇众汽车||||
http://www.soueast-motor.com/|东南汽车|||1995年金秋，福建省汽车工业集团有限公司与台湾中华汽车股份有限公司结缘创立海峡两岸最大的汽车合资企业——东南汽车，开启一段长达十数年的发展历程|
http://www.ssangyongmotor.com.cn/|双龙汽车|||ssangyongmotor.com.cn|
http://www.volvocars.com.cn/|长安福特|||沃尔沃汽车中国官网，为您提供Volvo各类车型概览，不仅能够预约试驾，获得沃尔沃增值服务。更为您提供金融和售后服务的全套解决方案，参加车主活动及最新优惠，更多精彩，尽在沃尔沃。|
http://www.zhengzhounissan.com.cn/|郑州日产汽车|||郑州日产汽车有限公司是经国家批准，由中日双方合资组建的整车制造企业，成立于1993年。其中，东风汽车股份有限公司拥有股份51%、东风汽车有限公司拥有股份28.651%、日本国日产自动车株式会社拥有股份20.349%。企业定位是东风、日产双品牌LCV产品的主要发展基地。即专业致力于东风品牌中高级皮卡、SUV和MPV及其延伸商品事业的发展，同时作为日产品牌LCV商品线在中国事业的主要担当者。|
http://www.zxauto.com.cn/|中兴汽车||||
http://www.vw.com.cn/|大众中国|||大众汽车在华经营范围包括汽车整车、零部件、发动机以及变速器的生产、销售与服务等，在中国市场中至始至终处于领先者的地位。大众汽车品牌携手上海大众、一汽-大众，连同大众进口车，为您带来驾车新体验。|
http://www.zhonghuacar.com/|中华轿车||||
','',''),
('5827','1','3','汽车企业汇总|4|16','','http://www.ford.com.cn/|福特汽车|||View the range of new Ford vehicles.|
http://www.bmw.com.cn/|宝马汽车|||访问BMW中国官方网站，详细了解BMW全线车型，BMW官方价格，BMW最新市场活动和新闻，BMW官方授权经销商，BMW二手车，金融服务与BMW原装配件的详尽信息。BMW中国官方俱乐部，精彩在线视频，带您步入BMW天地，开启BMW驾驶乐趣之旅。|
http://www.chery.cn/|奇瑞汽车|||奇瑞汽车官网为您提供奇瑞艾瑞泽7,瑞虎5,瑞虎3,奇瑞E3,奇瑞E5等各款车型的报价、油耗、性能等参数及各经销商信息,支持消费者预约试驾及在线购买,更多奇瑞汽车、二手车等信息尽在奇瑞官方网站。|
http://www.hyundai-motor.com.cn/|现代汽车|||欢迎来现代进口汽车官方网站. 本网站包括现代汽，紧凑型，中高级车，豪华车，SUV, MPV车型欣赏、产品亮点、车型配置、市场指导价格，以及产品手册等综合信息，了解更多现代捷恩斯。|
http://www.mercedes-benz.com.cn/|奔驰中国网站|||欢迎浏览梅赛德斯-奔驰中国网站。在这里您可以浏览有关奔驰乘用车、AMG、商用汽车，梅赛德斯-奔驰的优质服务、最新消息及活动，一级方程式赛车的精彩信息以及职位招聘的相关信息。|
http://www.beijing-hyundai.com.cn/|北京现代||||
http://www.peugeot.com.cn/|标致汽车|||东风标致官方网站,提供您东风标致全车系最详尽的产品资料,配置价格,售后服务,新闻资讯和市场活动,您可以线上查询东风标致经销商,预约试驾,在线订车,享受全新驾驭感受.根基于严谨激情致雅的品牌优势,东风标致与您同心同行,标新致远。|
http://www.bydauto.com.cn/|比亚迪汽车|||比亚迪汽车官方网站,介绍产品包括比亚迪宋、比亚迪唐、比亚迪秦、比亚迪S7、比亚迪S6、比亚迪全新F3、比亚迪G5、比亚迪速锐、比亚迪M6、比亚迪F0、F3DM、电动汽车e6等,以及陆续推出的一系列542战略新车型,比亚迪,新能源汽车领导者,与您一路同驰骋。|
http://www.shanghaigm.com/|上海通用||||
http://www.gwm.com.cn/|长城汽车|||长城汽车股份有限公司是中国最大的SUV和皮卡制造企业，已于2003年、2011年分别在香港H股和国内A股上市，截止2012年12月31日总资产达到425.69亿元。目前，旗下拥有哈弗、长城两个产品品类品牌，产品涵盖SUV、轿车、皮卡三大品类，拥有四个整车生产基地、80万辆产能。|
http://www.hafeiauto.com.cn/|哈飞汽车|||中国微型车制造和研发的奠基者和先行者,中国汽车骨干生产企业和研发基地。主要产品有哈飞骏意、路尊小霸王、民意等微型客车与货车系列,路宝微型轿车系列,赛马、赛豹经济型轿车系列及新能源汽车。|
http://www.gmchina.com/|通用汽车中国网站|||General Motors Company(GM), the worlds largest automaker,brands among automakers in China. Products are sold under the Baojun, Buick, Cadillac, Chevrolet, Opel, Wuling and Jiefang nameplates.Based in China, Together with China, the intentions of the Chinese|
http://www.zxauto.com.cn/|河北中兴汽车||||
http://www.dfmc.com.cn/|东风汽车||||
http://www.tjfaw.com/|天津一汽夏利汽车||||
http://www.naveco.com.cn/|南京依维柯||||
http://www.volvocars.com.cn/|沃尔沃中国|||沃尔沃汽车中国官网，为您提供Volvo各类车型概览，不仅能够预约试驾，获得沃尔沃增值服务。更为您提供金融和售后服务的全套解决方案，参加车主活动及最新优惠，更多精彩，尽在沃尔沃。|
http://www.dpca.com.cn/|神龙汽车||||
http://www.shac.com.cn/|上海汇众汽车公司||||
http://www.dongfeng-nissan.com.cn/|东风日产||||
http://www.saicgroup.com/|上海汽车工业总公司|||上海汽车集团股份有限公司（简称上汽集团，股票代码为600104）是国内A股市场最大的汽车上市公司，截至2012年底，上汽集团总股本达到110亿股。目前，上汽集团主要业务涵盖整车(包括乘用车、商用车)、零部件(包括发动机、变速箱、动力传动、底盘、内外饰、电子电器等)的研发、生产、销售，物流、车载信息、二手车等汽车服务贸易业务，以及汽车金融业务。|
http://www.zhengzhounissan.com.cn/|郑州日产汽车|||郑州日产汽车有限公司是经国家批准，由中日双方合资组建的整车制造企业，成立于1993年。其中，东风汽车股份有限公司拥有股份51%、东风汽车有限公司拥有股份28.651%、日本国日产自动车株式会社拥有股份20.349%。企业定位是东风、日产双品牌LCV产品的主要发展基地。即专业致力于东风品牌中高级皮卡、SUV和MPV及其延伸商品事业的发展，同时作为日产品牌LCV商品线在中国事业的主要担当者。|
http://www.china-motor.com.tw/|中华汽车企业||||
http://www.huapucar.com/|华普汽车|||Chat lines numbers with free trials are generally frequently used nowadays by women and also intriguing guys. Before you decide to become an actual participant consider a local chatline that offer a free trial to find out if you enjoy the chat platform.|
http://www.heibao.com/|山东黑豹集团公司|||中航黑豹股份有限公司位于山东省威海市文登区龙山路107号，总占地面积96.4万平方米，现有员工2000余人。|
http://www.king-long.com.cn/|金龙客车|||厦门金龙联合汽车工业有限公司(简称“大金龙”)成立于1988年，专门致力于大、中、轻型客车整车研发、生产和销售。下辖厦门大中型、厦门轻型、绍兴公交三个生产基地，年产客车能力5万辆，旗下产品涵盖从4.8米到18米各型客车，广泛应用于客运、旅游、团体、公交和专用车等领域。|
','',''),
('5828','1','3','各地二手车网|4|16','','http://www.51qc.com/|中国海峡汽车网|||51QC我要汽车网国内最大的本地汽车团购汽车网站，传递最新车市行情，汽车优惠信息，汽车价格，汽车图片，车友论坛，汽车导购和评测，涵盖全国品牌汽车4S店的汽车价格和优惠信息，打造选车，看车，购车的汽车团购网络平台-51QC我要汽车网。|
http://www.che11.com/|北方二手车网|||东北最大的车来车往二手车交易网站和二手车信息平台，提供：二手车市场信息,二手车交易市场,二手汽车市场行情,二手车评估,二手车搜索,二手车咨询,二手车资讯,汽车租赁，二手汽车，二手车评估，二手车新闻，经销商加盟，汽车网址导航，二手汽车政策保险，交通违章查询等.|
http://www.bj2sc.net/|北京二手车网|||全国二手车收购交易首选站.二手车收购部:51250101/0202(高档车大客户部) 四城区二手车收购分部:51660561/0562(各类二手车收购咨询专线) 客服部:51252801 传真:51252802|
http://www.hnesc.net/|湖南二手车网||||
http://www.hx-car.com/|互信二手汽车网|||互信二手汽车网致力打造诚信、专业的二手车交易平台。包括各地二手车信息（广州二手车、佛山二手车、深圳二手车、武汉二手车、浙江二手车、东莞二手车、中山二手车、江门二手车、珠海二手车、惠州二手车等）。每天有大量最新二手车信息更新。全方位展示车辆，欢迎选购|
http://www.hx2car.com/|华夏二手车网|||华夏二手车网(www.hx2car.com),让每个人都成为二手车专家,汇集海量二手车供求信息,有高档二手轿车,二手货车,二手SUV及越野车,提供二手车价格查询、新车配置查询、4S店电话查询、二手汽车评估、二手车买卖等服务,是二手车经销商和个人购买二手车、出售二手车的首选网站。|
http://www.nb2sc.com/|宁波市二手汽车||||
http://www.wz2sc.com/|温州二手车网|||温州二手车交易网是温州地区专业二手车信息交流及二手车商展示平台。|
http://www.hx-car.com/|广州二手车|||互信二手汽车网致力打造诚信、专业的二手车交易平台。包括各地二手车信息（广州二手车、佛山二手车、深圳二手车、武汉二手车、浙江二手车、东莞二手车、中山二手车、江门二手车、珠海二手车、惠州二手车等）。每天有大量最新二手车信息更新。全方位展示车辆，欢迎选购|
http://www.2sche.cn/|龙江二手车网|||龙江二手车网是东北最大的车来车往二手车交易网站和二手车信息平台，提供：二手车市场信息,二手车交易市场,二手汽车市场行情,二手车评估,二手车搜索,二手车咨询,二手车资讯,汽车租赁，二手汽车，二手车评估，二手车新闻，经销商加盟，汽车网址导航，二手汽车政策保险，交通违章查询等.|
http://www.zj2car.com/|浙江二手车市场|||浙江二手车市场,汇集浙江各地内货车、高档车、中档车、紧凑型车,提供杭州市二手车,宁波市二手车,温州市二手车,嘉兴市二手车,湖州市二手车,绍兴市二手车,金华市二手车,衢州市二手车,舟山市二手车,台州市二手车,丽水市二手车、买卖、过户、保险、二手车贷款,二手车价格指南,了解浙江二手车市场行情|
http://www.ln2car.com/|辽宁二手车网|||辽宁二手车网是辽宁，黑龙江，吉林，东北地区最完善的二手车交易网站和二手车信息平台，提供：二手汽车,二手车市场信息,二手车交易市场,二手汽车市场行情,二手车评估,二手汽车价格,二手车咨询,二手车资讯,汽车租赁,驾校学车,修车保养,二手车评估,二手车新闻,经销商加盟,汽车详细参数配置库,汽车图片库等|
','',''),
('6123','2','11','搜索工具及相关|4|','','http://www.sowang.com/|中文搜索引擎指南网|||探讨和研究搜索引擎的专业网站。为您提供国内外搜索引擎大全，百度、谷歌、搜狗、360好搜、必应、雅虎等搜索引擎使用技巧，搜索引擎排名优化、搜索引擎营销方法与技巧。|
http://bar.baidu.com/sobar/promotion.html|百度工具栏||||
http://toolbar.google.com/|Google Toolbar||||
http://zhuomian.baidu.com/|百度桌面|||桌面百度是百度推出的一款致力于为用户提供更极致搜索体验的PC客户端，依托百度领先大数据技术，打通云端、本地数据壁垒，让搜索变得更快更全更高效。|
http://earth.google.com/download-earth.html|Google Earth||||
','',''),
('6167','1','4','栏目头栏','','','<iframe src=\"weather.php\" allowtransparency=\"true\" width=\"100%\" height=\"700\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"auto\"></iframe>',''),
('6157','1','4','华北地区|4|','','http://php.weather.sina.com.cn/search_sheng.php?sheng=北京&dpc=1|北京||||
http://php.weather.sina.com.cn/search_sheng.php?sheng=天津&dpc=1|天津||||
http://php.weather.sina.com.cn/search_sheng.php?sheng=河北&dpc=1|河北||||
http://php.weather.sina.com.cn/search_sheng.php?sheng=山西&dpc=1|山西||||
http://php.weather.sina.com.cn/search_sheng.php?sheng=内蒙古&dpc=1|内蒙古||||
','',''),
('6168','1','1','旅游/酒店/票务|4|','','http://c.duomai.com/track.php?site_id=55169&aid=83&euid=&t=http%3A%2F%2Fwww.ctrip.com%2F|携程旅行网||||
http://www.zhuna.cn/|住哪儿|||住哪网是中国最专业的在线旅行住宿服务平台,提供国内40000多家酒店、全球260000家海外酒店的预订服务，及短租公寓、民宿客栈等预订服务。订酒店，返现金！|
http://www.dazijia.com/|大自驾|||大自驾网是最大的中国自驾游网站，全国各地出发自驾游线路查询，组织元旦/春节/清明/五一/端午/中秋/十一自驾游和周末周边自驾游，出国自驾游。全国近百家自驾游俱乐部，自驾车旅游首选大自驾网。|
http://flight.mangocity.com/|芒果网|||芒果网为您的出行提供机票,特价机票,打折机票，通过在线查询预订便可快速预订机票，同时为您提供国内航班信息查询，国内航班机票预订服务，超低的折扣价格，优质的预订服务，安全的支付平台，覆盖全国的服务网络，订机票首选芒果网。免费咨询电话：40066-40066|
http://travel.elong.com/hotel/|艺龙旅行网||||
http://e.7daysinn.cn/market/track.php|7天连锁酒店||||
http://tuan.qunar.com/|去哪儿||||
http://www.tuniu.com/|途牛旅游网|||途牛旅游网-中国专业全面的旅游网,客户满意度94%;提供自助游(自由行),国内旅游,出境旅游,自驾游,公司旅游。低价保证,专业服务,九大出游保障,服务超百万人出游|
http://www.17u.cn/|同程网||||
http://12580.10086.cn/|12580旅游||||
http://www.kuxun.com/|酷讯旅游网|||酷讯旅游网(Kuxun.cn)是中国领先的在线旅游媒体。为您提供低价可靠的国内国际机票，特价机票99元起，另提供全国20万家酒店预订查询、酒店评论，最低2折起，以及列车时刻表、50000多旅游景点的旅游攻略信息，为您的度假提供最佳的旅游线路。|
http://www.qtour.com/|趣旅网|||趣旅网:国内领先的出境旅游服务提供商,我们提供出境游,出国游,海岛游,出境旅游,海岛旅游等全方位的出境旅游服务.免费热线:400-6399-960|
http://www.228.com.cn/|永乐票务||||
http://www.wyn88.com/|维也纳连锁酒店|||维也纳酒店是全球首家以“音乐艺术”为主题的精品连锁酒店,维也纳酒店官网在线注册免38元入会费,酒店预订8折优惠,让您预订酒店更加轻松快捷,是您出差、旅游首选的酒店预订网站。|
http://www.aoyou.com/|中青旅遨游|||遨游网(aoyou.com)中青旅旗下专业度假旅游网站,提供出境游、国内游、海岛游、邮轮旅游、签证办理、旅游团购、机票预订、查询、下订单送保险,全程优质服务,咨询电话：40088 40086|
http://www.jinjiang.com/|锦江国际||||
http://www.podinns.com/|布丁酒店|||布丁酒店连锁是全国快捷连锁酒店前10强,为客户提供经济型客房,支持在线酒店预订,电话预订,wap预订,手机客户端预订.目前酒店在杭州,上海,西安,武汉,北京,苏州,成都,天津,丽江,无锡,厦门,沈阳,南京等城市拥有门店。|
http://www.lvmama.com/|驴妈妈|||驴妈妈旅游网-中国最领先的在线旅游预订服务商,为您提供景点门票/国内自助游线路/出境游/酒店预订等旅游产品.《自助游天下,就找驴妈妈!》-www.lvmama.com|
http://www.uzai.com/|悠哉网|||悠哉旅游网（Uzai.com）－中国非常专业、全面的旅游线路和自助游预订网站，一站式个性化旅游服务提供商；跟团游+自助游+公司旅游专家；出境游、周边游、国内游、酒店、签证；出发地：上海、北京、杭州、深圳、成都、南京。|
http://www.qmango.com/|青芒果旅行网|||青芒果是国内领先的国际青旅、青年旅舍、客栈、酒店、家庭旅馆预订平台，产品分布全国1000个城市、3000多个目的地的，还有各种本地化深度旅游产品预订和旅行攻略信息。|
http://flight.mangocity.com/|芒果网|||芒果网为您的出行提供机票,特价机票,打折机票，通过在线查询预订便可快速预订机票，同时为您提供国内航班信息查询，国内航班机票预订服务，超低的折扣价格，优质的预订服务，安全的支付平台，覆盖全国的服务网络，订机票首选芒果网。免费咨询电话：40066-40066|
http://www.yododo.cn/|游多多旅行网|||游多多客栈,游多多旅游网旗下旅游住宿,家庭旅馆,青年旅社,客栈预订平台.入住有保障,到店无房赔付首晚!Yododo.cn|
http://cn.toursforfun.com/|途风网|||途风旅游网是一家专业提供海外目的地旅游的华人旅行社，涵盖美国、加拿大、欧洲、澳大利亚、新西兰等5000多条出国旅游线路，同时提供邮轮、旅游签证、星级酒店、机场接送、景点门票等各类出境游服务。400 - 635 - 6555|
http://www.lulutrip.com/|路路行|||路路行旅游网(lulutrip.com)-专业出国旅游服务网站，提供美国、欧洲、加拿大、澳洲新西兰旅游度假服务；涵盖机票酒店预订，自由行，团购及私人定制包团游等个性化服务，客户满意94%，电话：400-821-8973 。|
http://www.homeinns.com/|如家酒店连锁|||如家酒店集团，中国经济型连锁酒店第一品牌。旗下如家快捷酒店、莫泰168连锁酒店、和颐酒店 三大品牌遍布全国 300 多个城市，拥有 2200 多家酒店。网上预订，方便快捷，优惠更多！|
http://www.htinns.com/|汉庭连锁酒店|||华住无线官网:提供酒店查询、酒店预订服务,通过手机即预订华住旗下六大品牌:“禧玥酒店”、“漫心度假酒店”及“全季酒店”、“星程酒店”、“汉庭酒店”、“海友酒店”,让您酒店订房更轻松快捷,还不赶快登录华住手机无线官网!|
http://www.aoliday.com/|澳乐网|||iTrip爱去自由(原澳乐网)为您提供澳洲/澳大利亚旅游、新西兰/斐济自由行、东南亚自助游,还有英国、法国、意大利等欧洲自由行、跟团游,线路行程、景点门票低价在线预订,出境游华人旅行社中英文翻译服务|
http://www.pailv.com/|拍旅网||||
','',''),
('6169','1','1','旅行社|4|','','http://www.cits.cn/|中国国旅||||
http://ctsho.com/|中旅总社|||中国旅行社总社是中国旅游业领先的5A级旅行社。中旅每年为近百万游客提供出境旅游,国内旅游, 周边旅游，自助旅游，主题旅游等相关旅游服务,中国旅行社总社致力于为您提供高品质的旅游服务！|
http://www.aoyou.com/|中青旅遨游|||遨游网(aoyou.com)中青旅旗下专业度假旅游网站,提供出境游、国内游、海岛游、邮轮旅游、签证办理、旅游团购、机票预订、查询、下订单送保险,全程优质服务,咨询电话：40088 40086|
http://www.yoee.com/|游易航空旅游网||||
http://www.travelsky.com/|信天游||||
http://www.goldenholiday.com/|黄金假日|||黄金假日旅游网是集国内机票,国际机票,国内酒店,国际酒店,度假,签证为一体的综合性商旅服务型企业，为广大会员提供全球数十万特价机票酒店实时预定,旅游度假服务！十年资质，诚信品牌！全国24小时免费客服电话：800-810-9990 400-810-9990|
http://www.cct.cn/|中国康辉||||
http://www.china-sss.com/|春秋航空旅游网|||春秋航空网依托上海春秋航空提供飞机票特价机票打折机票查询预定,机票预订,及国际机票、电子机票、航班查询飞机票。99元,199元国内最低价机票,为您提供低价,安全,温馨,优质的服务,24小时免费咨询热线95524。|
http://www.etpass.com/|快乐e行商务旅行网||||
http://www.kunmingguoji.com/|昆明中国国际旅行社|||昆明中国国际旅行社有限公司竭诚为您提供：云南旅游,大理丽江景点攻略,云南旅游报价,云南昆明旅行社,旅游线路报价,一站式跟团旅游,公司旅游包团,云南旅游,昆明旅游,大理丽江旅游团及旅游线路咨询服务，免费预订热线4006-0871-29,网址：http://www.kunmingguoji.com/|
http://www.99sun.com/|艳阳度假网|||艳阳度假网提供以各大城市景点周边为中心的休闲度假、生态度假、度假酒店、自驾游、自助游、庄园、客栈、度假农庄、休闲农家乐等’田园牧歌式’的休闲度假旅游体验;回归自然，预订闲居休憩型私家农庄度假公寓从选择艳阳度假网开始!|
http://www.2008ly.com/|北京青旅|||北京青年旅行社为您提供最好最专业的跟团旅游线路和自由行机票+酒店等业务,给您最优质的旅游价格及旅游线路,专业的团队为您提供专业的服务，我们全体员工向您致敬！联系电话:400-671-2008,400-671-2007|
http://www.aotrip.net/|纳美旅游网|||纳美旅行社系知名美国华人旅行社，纳美旅游（aotrip.net）专注于为全球华人提供美国旅游华人旅游团，5大协会认证，美中双重旅行社保障，$500万保险保障，24小时服务，保障您的安全出行。纳美旅游官网电话：1-800-508-6936(美)(011)86-400-028-8666(中国)。|
','',''),
('6170','1','1','天气预报|4|','','shfw_tianqi.html|天气预报查询||||
http://www.weather.com.cn/|中国天气网|||中国天气网官方权威发布天气预报,逐三小时天气预报,提供天气预报查询一周,天气预报15天查询,空气质量,生活指数,旅游出行,交通天气等查询服务|
http://www.nmc.gov.cn/|中央气象台|||中央气象台官方网站权威发布台风、暴雨、寒潮、高温、沙尘暴、大雾等各类灾害性天气的预报警报。提供天气预报、天气实况、降水量预报、强对流天气预报、农业气象、海洋气象、环境气象、地质灾害气象、交通气象、水文气象、数值预报及预报员交流论坛等栏目|
http://weather.news.qq.com/|腾讯天气预报|||腾讯天气频道为您提供全国3000多个城市和大多数国际个城市的最及时全面的天气预报,即时天气预报, 灾害预警、气象云图、旅游天气、台风、暴雨雪等气象信息，历史气候查询,未来三天预报,天气预报7天查询,重大天气新闻,气象知识,气象视频,为您提供全面精准的气象服|
http://weather.sina.com.cn/|新浪天气|||新浪天气频道为您提供中国2600个及世界两万个主要城市一周甚至十天天气预报,实况,历史气候,实景图,天气指数,日出日落,机场天气,最新资讯,预警,空气质量等.|
','',''),
('6171','1','1','栏目头栏','','','<div style=\"border:1px #DDD solid;text-align:center;padding:5px 0;\">
<iframe src=\"http://u.ctrip.com/HotelCSPSit/PhoenixPage/index.html\" frameborder=\"0\" scrolling=\"no\" width=\"100%\" height=\"1485\" style=\"background-color:#FFF\"></iframe>
</div>',''),
('6176','homepage','3','实用功能|4|','','kjyy_youxiangdenglu.html|邮箱登录||||
xxyl_yinyue.html|<img src=\"writable/__web__/images/homepage_3/20171220204014.gif\" /> 听音乐||||
shijieshijian.html|时间|||| · <a href=\"naozhong.html\">闹钟</a>
kuaidichaxun.html|查快递|redword|||
syjj_caipiao.html|兑彩票||||
http://www.tvmao.com/|电视节目|||提供国内外最新电视节目预告，电视剧分集剧情， 电视的相关评论，影社区，电视剧，电影，栏目，预告片，片花等高清在线观看，推荐好的电视节目|
changyongdianhuachaxun.html|电话||||
youzhengbianma.html|邮编||||
http://jingzhi.funds.hexun.com/jz/|基金净值|||| · <a href=\"http://www.boc.cn/sourcedb/whpj/\">外汇排价</a>
http://www.8684.cn/|公交|||公交查询,公交车线路查询,公交换乘查询,公交路线查询,公交查询网,公交网,乘车网,坐车网，8684公交查询,8684公交| · <a href=\"http://www.checi.cn/\">长途</a>
http://flights.ctrip.com/Domestic/SearchFlights.aspx|航班预订|||| · <a href=\"http://www.huoche.com.cn/\">火车预订</a> · <a href=\"http://hotels.ctrip.com/Domestic/SearchHotel.aspx\">宾馆酒店</a>
http://translate.google.cn/?hl=zh-CN#|翻译|||| · <a href=\"http://www.iciba.com/\">词典</a>
http://astro.sina.com.cn/fate/index.shtml|星座运程||||
shoujiweizhi.html|手机位置||||
http://auto.sohu.com/s2004/weizhangchaxun.shtml|违章|greenword||| · <a href=\"http://www.sheup.com/chepaichaxun.php\">车牌</a>
shenfenzhengchaxun.html|身份证号||||
IPdizhichaxun.html|查IP||||
','',''),
('6287','0','3','小说阅读|4|16','','http://www.qidian.com/|起点中文网|||小说阅读,精彩小说尽在起点小说。起点小说提供玄幻小说,武侠小说,原创小说,网游小说,都市小说,言情小说,青春小说,历史小说,军事小说,网游小说,科幻小说,恐怖小说,首发小说最新章节免费小说阅读,精彩尽在起点小说！ver:261845热门小说:我欲封天,雪鹰领主,原始战记,银河霸主饲养手记,巫神纪。|<span class=\"xialacaidan\">&nbsp;<a href=\"https://www.qidian.com/rank\" class=\"a_more\" title=\"人气排行\"><img src=\"writable/chuchuang/img/point.gif\" width=\"10\" height=\"10\" /></a><span class=\"morelis_hidden\"> <a href=\"https://www.qidian.com/rank\" class=\"morelis_box\"><img src=\"writable/chuchuang/img/qidian_paihang.jpg\" width=\"88\" height=\"76\" /></a> </span> </span>
http://www.readnovel.com/|小说阅读网|||《小说阅读网》提供原创小说，包含穿越小说、言情小说、校园小说、玄幻小说、武侠小说、历史小 说、军事小说、网游小说、免费小说等在线阅读和小说下载。页面简洁，无眩杂广告。|
http://www.hongxiu.com/|红袖添香|||红袖添香小说网提供最新免费言情小说在线阅读及下载。红袖小说网包括言情小说，玄幻小说，穿越小说，都市小说，言情小说书库等。是最经典华语文学小说网。|
http://hjsm.tom.com/|幻剑书盟|||幻剑书盟是中国首家永久免费原创文学门户，全站小说任意章节均可免费阅读！包括奇幻玄幻、武侠仙侠、女生言情、都市游戏、悬疑科幻、军事历史等。|
http://www.xs8.cn/|言情小说吧|||最好看的免费言情小说阅读网，24小时首发穿越小说、校园言情小说、都市言情小说在线阅读，所有的言情小说都提供txt免费下载！－－看言情小说就上言情小说吧！|
http://www.jjwxc.net/|晋江原创网|||《晋江文学城》提供原创言情小说,穿越言情小说,纯爱言情小说,同人言情小说在线阅读,免费言情小说电子书,手机言情小说,言情小说下载,手机小说在线阅读,都市言情小说,更新快,页面简洁。|
http://www.17k.com/|17K文学网|||17k小说网，最好看的小说阅读网站，提供都市小说、玄幻小说、仙侠小说、历史小说、网游小说、免费小说等在线阅读以及免费下载。每日最快更新，页面简洁，访问速度快。|
http://www.xxsy.net/|潇湘言情小说||||
http://www.2200book.com/|世纪文学|||世纪书城为国内最大的小说网站之一,提供,玄幻小说,言情小说,网游小说,修真小说,都市小说,武侠小说,网络小说等在线阅读,永做更新最快,小说最多的小说网!|
http://www.xstxw.com/|小说天下网|||小说天下原创小说网提供大量精彩小说，致力于打造最好最完善的原创小说门户网站，小说天下原创小说网提供小说天下阅读下载，武侠小说阅读下载，言情小说阅读下载，校园小说阅读下载。汇聚经典原创小说，注重用户阅读体验！|
http://www.zhulang.com/|逐浪文学网|||小说阅读,精彩小说尽在逐浪小说网。逐浪小说提供玄幻小说,武侠小说,网游小说,都市言情小说,历史军事小说,首发小说最新章节免费阅读！热门小说:绝世武神,我的美女总裁老婆,异世灵武天下,九阴九阳,天眼人生,天控者,官途。|
http://www.kanshu.com/|看书网|||看书网,专业原创小说网站,提供最新言情,都市校园,穿越,网游,玄幻,武侠,科幻,历史等小说免费阅读和小说下载,是最好看的小说阅读网。看小说,就上看书网！|
','',''),
('6288','0','3','文化文学|4|16','','http://book.qq.com/|腾讯读书|||精彩小说尽在腾讯文学,腾讯文学提供玄幻小说,武侠小说,原创小说,网游小说,都市小说,言情小说,青春小说,历史小说,军事小说,网游小说,科幻小说,恐怖小说,首发小说最新章节免费小说阅读小说下载txt,精彩尽在腾讯文学!2013年热门小说:无敌唤灵,无红色权力,无限曙光,余罪,兵临天下,盛唐风月,武帝,大官人,勇闯天涯,机甲天王|
http://vip.book.sohu.com/|搜狐读书||||
http://book.sina.com.cn/|新浪读书|||新浪读书为读者提供好看的小说推荐、小说排行榜、免费小说阅读体验,为文学爱好者搭建华文最具影响力的网络原创平台和交流社区。|
http://wind.yinsha.com/|且听风吟|||且听风吟是碧海银沙2001年底推出的原创文学栏目，为广大网友提供原创文学作品发表、欣赏的园地，深受全国网民喜爱。提供纯正、广涵、和谐的小说、杂文、诗歌、文集、散文|
http://book.douban.com/|豆瓣读书-书评||||
http://book.hexun.com/|和讯读书|||和讯读书提供最丰富和最专业的网上财经图书阅读。文化新闻、文化评论、书评、在线阅读、作家访谈、财经图书排行榜，以财经阅读为核心打造最佳网络读书频道。|
http://www.baidu.com/search/guoxue/dir/fenlei.html|百度国学||||
http://culture.china.com/zh_cn/reading|中华网-读书频道||||
http://www.duwenzhang.com/|文章阅读网||||
http://www.xilu.com/|西陆文学|||西陆网是中国第一军事门户网站，军事领域范围最广、军事内容最权威、军迷影响力最大、历史最久。为大国之崛起，关注中国军事利益，对比国际军事力量，探寻军事战略，解读军事战争历史，求索强国之路。|
http://www.nlc.gov.cn/|国家图书馆||||
http://www.xiaogushi.com/|小故事网|||小故事网,免费提供各种故事的在线阅读,包括哲理故事、小故事、爱情故事、鬼故事等，我们的口号是小故事,大道理|
','',''),
('6289','0','3','作家作品|4|16','','http://www.chinawriter.com.cn/|中国作家网|||作协,作协新闻,文学,作家,文化|
http://www.writermagazine.cn/|作家杂志||||
http://www.renyu.net/|美人鱼文学阅读网|||,美人鱼论坛|
http://www.zuojiachubanshe.com/|作家出版社|||作家在线，最权威的文学门户|
http://www.chinapoet.net/|中国诗人|||中国诗人论坛,诗人,诗人论坛,诗歌,散文,小说,文学,诗词|
http://www.tougao.com/|中国投稿热线||||
http://www.bingxin.org/|冰心|||冰心官方网站|
http://www.qiuyuonline.com/|余秋雨|||秋雨在线2014全新改版。全面更新人生哲理，情感相关，励志相关等等一些可以让广大网友受益的文章，秋雨在线期待您的光临！|
http://www.xzmsw.com/|徐志摩诗文网|||海宁市徐志摩研究会官方网站|
http://www.my285.com/wuxia/jinyong/|金庸作品集||||
http://www.my285.com/wuxia/gulong/|古龙作品集||||
http://www.my285.com/wuxia/wls/|卧龙生作品集||||
http://www.my285.com/wuxia/liangyusheng/|梁羽生作品集||||
http://www.my285.com/yq/qiongyao/|琼瑶作品集||||
','',''),
('6290','0','3','文学论坛|4|16','','http://club.history.sina.com.cn/|新浪文化社区|||历史文化社区 历史文化社区 - sina|
http://www.tianya.cn/Publicforum/ArticlesList/0/culture.shtml|舞文弄墨-天涯社区|||这是天涯论坛所属的舞文弄墨版块，共有841674个主帖，15463152个回帖，96151个成员。1999年3月开版，为天涯社区最早的版块之一。是中文互联网最优秀的文学论坛。包容各种文学形式，但以小说原创为主。2002年4月，网友慕容雪村在舞文连载小说《成都，今夜请将我遗忘》，阅读量迅速超过30万次，创造了网络文学史上的一个奇迹。|
http://club.book.sohu.com/|读书社区-搜狐||||
http://www.douban.com/book|豆瓣读书-书评||||
http://bbs.hongxiu.com/|红袖论坛||||
http://www.gudian.net/|中国古典文化论坛||||
http://www.pkucn.com/|北大中文论坛|||致力于做全球最好的中文学术论坛！|
','',''),
('6291','0','3','玄幻言情|4|16','','http://www.xs8.cn/|言情小说吧|||最好看的免费言情小说阅读网，24小时首发穿越小说、校园言情小说、都市言情小说在线阅读，所有的言情小说都提供txt免费下载！－－看言情小说就上言情小说吧！|
http://www.xdyqw.com/|心动言情网|||心动言情网，提供最新免费言情小说，TXT电子书下载。包括都市言情小说，穿越小说，古代言情小说等热门分类。找好看的言情小说，请到xdyqw.com，超快网速，更新频繁，永久免费。|
http://www.jjwxc.net/|晋江原创网|||《晋江文学城》提供原创言情小说,穿越言情小说,纯爱言情小说,同人言情小说在线阅读,免费言情小说电子书,手机言情小说,言情小说下载,手机小说在线阅读,都市言情小说,更新快,页面简洁。|
http://www.fmx.cn/|凤鸣轩言情小说||||
','',''),
('6292','0','3','小说搜索|4|16','','http://www.zhaoxiaoshuo.com/|找小说|||找小说网是以小说搜索引擎为主，书友交流为辅的小说网站；我们致力于小说搜索引擎的研究，让大家看书更方便；我们获得众多原创小说网站授权，建立网络小说免费阅读基地。|
','',''),
('6293','0','3','电子书|4|16','','http://www.ibook8.com/|爱电子书吧|||爱电子书吧-电子书下载txt免费下载网站提供txt电子书,TXT小说下载,手机电子书的txt下载。每天坚持更新txt电子书免费下载,TXT小说下载电子书免费下载坚持做最简单的TXT电子书下载网站|
http://www.txtbbs.com/|TXT论坛|||精品小说尽在TXT小说网，提供最新的中文小说、言情小说在线阅读及免费小说下载、手机电子书下载。编辑及书友推荐好看的小说、言情小说、玄幻小说，一站式阅读TXT小说网。|
http://www.eshuba.com/|E书吧|||E书吧,专业的电子书免费下载网站,提供exe,pdf,pdg,txt等格式的电子书免费下载|
http://www.bookdown.com.cn/|TXT图书下载网|||TXT图书下载网免费提供txt图书,txt电子书,txt小说下载,txt格式电子书,jar格式电子书,umd格式电子书,mp4电子书,手机电子书,电子书制作软件等资源的免费下载.|
','',''),
('6294','0','3','栏目头栏','','','<iframe id=\"o1489927542045\" name=\"o1489927542045\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" height=\"1000\" scrolling=\"yes\" src=\"http://xiaoshuo.360.cn/index/indexIframe\" style=\"margin-top:px; margin-left:px;\"></iframe>',''),
('6186','2','12','设计综合|4|20','','http://www.visionunion.com/|视觉同盟|||视觉同盟网站（VisionUnion.com）是为全中国及全球各行业的设计师和设计院校在校学生提供全方位服务的专业内容提供商，全面覆盖设计行业，内容信息全面高效及时。是受中国及全球设计师推崇的专业网站，是专业的艺术设计网络媒体。|
http://www.arting365.com/|中国艺术设计联盟||||
http://www.chinavisual.com/|视觉中国|||视觉中国是领先的视觉影像内容和整合营销传播服务提供商，旗下包括华盖创意(Getty Images China)、汉华易美(CFP)、东星娱乐(TungStar)、视觉ME社区(Shijue.me)、艾特凡斯(Advance)等业界著名品牌。|
http://www.gjart.cn/|国际艺术界网|||全球最大的综合艺术门户网站,内容覆盖全球艺术领域,是国际最推崇的专业艺术门户,包涵八大艺术网:广告艺术网,设计艺术网,美术艺术网,书法艺术网,摄影艺术网,音乐艺术网,影视综艺网,文学艺术网|
http://www.dolcn.com/|设计在线|||华人地区设计艺术专业网站。含工业设计、平面设计、数码设计、环境设计。|
http://www.52design.com/|中国创意在线|||征集网-创意在线(原我爱设计网-52Design)是中国专业创意征集数字艺术设计领域垂直门户网, 致力于为中国的设计者、设计院校与设计企业提供高质量、多元化的信息交流咨询及专业的数字艺术设计行业应用解决方案，拥有国内最丰富最专业的的设计行业资源网站群，我们将伴随中国创意产业发展不断调整进步，并提供更为广泛、专业、及时的创意资讯及丰富的设计资源。|
http://bbs.redocn.com/|红动中国|||红动中国-Redocn 中国人气最旺的平面设计论坛，大量平面设计师及设计相关人员在线互动交流，设计平台提供设计作品欣赏，素材下载，设计教程学习，设计资讯等内容。|
http://www.333cn.com/|中国设计之窗|||致力设计文化的交流,提供平面设计,包装设计,标志设计,设计大赛,设计征集,平面设计大赛,平面设计征集,商标设计,VI设计,工业设计,室内设计,建筑设计等领域的资讯和优秀设计服务 编辑QQ:775487204 电话:0755-83663023|
http://www.cndu.cn/|设计联盟|||中国创意之都www.cndu.cn是一家专注中国大陆及全球创意人群的在线媒体，致力于打造荟萃国内及至全球创意设计、艺术设计、时尚文化、摄影等各类人文艺术资讯平台，引领中国创意产业发展潮流风向！|
http://design.icxo.com/|哈佛设计|||哈佛设计(design.icxo.com)是世界经理人专为商人而设的设计产业网站，为高端设计人士提供最新的设计资讯。|
http://www.blueidea.com/|蓝色理想|||专业的设计与技术支持，为您提供 网站设计与网络技术支持、商业网站开发。DREAM TEAM 系列软件的技术支持。|
http://www.chda.net/|设计艺术家网|||设计艺术家,艺术家,设计家,设计展览,设计竞赛,设计艺术家协会|
http://www.fansart.com/|艺术迷|||艺术迷网。|
http://www.sj33.cn/|设计之家|||设计之家,中国原创设计的领导者,致力于推广最新的设计理念，关注最新的设计动态|
http://www.missyuan.com/|思缘论坛|||Photoshop论坛交流,矢量素材,PSD素材,高清图片,图片素材,影楼婚纱模板,CG素材,PS笔刷,动作,滤镜,图案等素材下载,设计作品欣赏,PS,AI,CD,3dmax,CAD,Flash,Fireworks,网页等教程学习等内容|
http://www.xiusheji.net/|大学生设计联盟|||大学生设计联盟是艺术设计交流学习的互联网平台,内容涵盖设计资讯、设计欣赏、设计论文、设计视频、资源下载、设计博客等方面,集聚了最具潮流时尚、年轻活力的青年及学生人群。|
http://www.logofree.cn/|logo设计|greenword||LogoFree是一个简单易用的免费logo在线制作平台，只需两分钟，就可以设计精美的LOGO，一站式的LOGO设计在线生成就这么简单，而且免费下载。|
','',''),
('6187','2','12','设计素材|4|','','http://www.sccnn.com/|素材中国|||素材中国_免费素材共享平台.图片素材图库提供海量素材,图片下载,设计素材,PSD源文件,矢量图,AI,CDR,EPS等高清图片下载|
http://www.zcool.com.cn/|站酷|||站酷（ZCOOL），中国最具人气的设计师互动平台，300万设计师聚集地。致力于打造伴随设计创意群体学习、交流、就业、交易、创业各个成长环节的生态体系。站酷，让设计更有价值，与创意群体一同进步。|
http://sc.chinaz.com/|站长素材|||站长素材是一家大型综合设计类素材网站，提供高清图片素材、PSD素材、PPT模板、网页模板、脚本下载、设计字体、精美表情、矢量素材、桌面壁纸、酷站欣赏、Flash动画等设计素材，免费安全快速下载。|
http://www.3lian.com/|3lian素材网||||
http://www.jianjie8.com/|简洁设计网|||简洁设计网提供平面设计,网页设计等设计作品欣赏以及设计素材,网页模板,设计论坛等的设计人互动的平台，便于设计人交流设计作品、设计素材，提高自己的设计水平,发布原创作品,结交更多的设计师。|
http://sc.52design.com/|52design素材库||||
http://www.114sucai.com/|素材黄页||||
http://www.ooopic.com/|我图网|||我图网是中国最大的设计作品交易平台(销售设计稿和视频素材)！对于设计师、摄影师等设计工作者,你可以卖作品赚钱。对于设计公司、印刷公司，你可以享受海量正版设计作品高速下载！|
http://www.lanrentuku.com/|懒人图库|||懒人图库专注于提供网页素材下载，其内容涵盖网页素材，矢量图素材，JS代码，psd素材，导航菜单，PNG图标等，让任何一个网页设计师都能轻松找到自己想要的素材！|
http://www.mbsky.com/|模板天下|||A5旗下模板站,专业提供CMS网站模板,论坛模板,网店模板,个人博客模板等主流网站程序模板及淘宝旺铺模板,网页模板设计,flash模板的共享和交易平台.|
http://bestmoban.com/|最好模版|||最好模板——中国最大的免费网页模板下载基地。全面提供网页模板、网站模板、网页素材、矢量图等资源下载，与网页制作及WEB设计完美结合，方便网站美工、设计师、程序员能快速设计出理想的作品。|
http://www.mb5u.com/|模板无忧|||模板无忧是国内最具人气的网站模板、网页模板下载站，提供网站模板、网页模板、程序模板下载及建站相关素材、教程资源。众多专业模板设计师,新模板每日更新|
http://www.wzsky.net/|设计前沿|||设计前沿网是中国优秀设计在线网站,提供平面设计,广告设计,插画,标志设计,logo设计,室内设计等作品,还有ps教程,php教程,css教程等技术文章,以及网页模板,ps素材下载服务,为站长及设计师提供最新最全的设计资讯与学习教程。|
','',''),
('6188','2','12','平面设计|4|','','http://gra.dolcn.com/|中国平面设计在线||||
http://www.apoints.com/|圆点视线|||www.apoints.com: 圆点视线,点点滴滴积攒设计创意艺术。|
http://www.chinavisual.com/|视觉中国|||视觉中国是领先的视觉影像内容和整合营销传播服务提供商，旗下包括华盖创意(Getty Images China)、汉华易美(CFP)、东星娱乐(TungStar)、视觉ME社区(Shijue.me)、艾特凡斯(Advance)等业界著名品牌。|
http://www.heyshow.com/|黑秀网||||
http://www.23ps.com/|图片处理教程网||||
http://www.smzy.com/|数码资源网|||提供在线照片处理,视频素材,电子相册模板,psd照片模板,psd婚纱模板,儿童psd模板,摄影模板,3D模型下载,图片素材,音效素材和软件插件下载|
http://www.swcool.com/|形色主义||||
http://bbs.16xx8.com/|Photoshop教程论坛|||ps教程论坛是一个教你从零开始学习ps的ps论坛,ps论坛提供ps教程和ps笔刷、字体下载、PSD模板下载，ps非主流教程和免费photoshop教程下载;做最好的ps论坛！ ,ps教程论坛|
','',''),
('6189','2','12','室内设计|4|','','http://www.ciid.com.cn/|中国室内设计网|||CIID|
http://bbs.cool-de.com/|中国室内设计联盟|||首页|
http://www.maxsou.com/|室内设计资料网|||室内设计资料网是一个专业的室内设计资料网站,是室内设计师学习的乐园!|
http://www.cool-de.com/|中国室内装饰网|||首页|
http://www.id-china.com.cn/|美国室内设计中文网|||美国室内设计中文网是中国室内设计与建筑行业的专业设计创意网站。网站具有强大的内容优势，收录国内外最新的设计案例、产品与最新行业资讯，充分发挥设计师参与、互动、反馈的功能，并提供大量行业信息。|
http://www.tianwu.com.cn/|深圳室内设计网|||深圳室内设计网是深圳地区专业的家庭室内设计门户网站。主要提供深圳室内设计公司,深圳装修公司,深圳装饰公司等深圳地区专业装修设计公司信息,包括室内设计行业资讯,政策法规,设计指南,装修效果图,装修词典，装修报价，客厅、厨房、卧室、书房、阳台、卫生间、餐厅、玄关等家庭装修设计，办公室、别墅、店铺、楼房、酒店、商场设计,装修材料咨询,选购及家居环保等室内设计资讯。|
http://www.snren.com/|中国室内人设计师网|||门户|
http://www.dr.eju.cn/|室内设计师联盟|||“中国室内设计师网”网站是由易居网设立的专业室内设计师网站。网站拥有全国数20万名注册室内装修设计师，发布装修设计作品100余万张，是业主选择装修设计和设计师、装修公司、建材企业最理想的选择交流平台。|
','',''),
('6190','2','12','建筑设计|4|','','http://www.china-designer.com/|建筑与室内设计网||||
http://www.chinabuilding.com.cn/|国家建筑标准设计网||||
http://www.abbs.com.cn/|ABBS建筑论坛|||ABBS建筑论坛创建于1998年,为全球最大建筑专业论坛。涵盖从城市规划、建筑设计、室内设计、表现动画到建筑材料、施工技术、房地产的整个产业链。旗下还包括建筑微信、微博、品房网在内的建筑新传媒群|
http://www.333cn.com/architecture|中国设计在线-建筑设计||||
','',''),
('6191','2','12','服装设计|4|','','http://www.pop-fashion.com/|服饰流行前线|||POP服饰流行前线是目前国内最专业的服装设计、服装设计图、服装款式图库资讯网站，专业为服装设计师提供最新最全面的服装设计图、服装款式图、服饰趋势分析、各类矢量手稿、国内外时尚杂志书籍及图案花型等设计素材。|
http://www.efu.com.cn/design|中国服装网-服装设计||||
http://www.xiebaowang.com/|蝶讯鞋业网|||蝶讯鞋业网是国内专业的鞋子品牌大全、鞋子款式、鞋子设计图片素材网站。蝶讯鞋业网提供最全、最流行的鞋子款式图片、鞋子设计效果图、鞋子设计趋势手稿及最新的鞋子资讯和鞋子发布会秀场时装鞋。|
','',''),
('6192','2','12','设计竞标|4|','','http://www.zhengjicn.com/|中国征集网|||征集网(原中国征集网)创建于2005年,中国征集第一门户网站。标志征集、logo征集、吉祥物设计大赛以及广告语、广告词、歌词、歌曲权威发布平台。|
http://www.toidea.com/|创易网|||toidea中国创意交易网（toidea创易网），威客、沃客平台，满足客户在标志设计,包装设计,吉祥物设计,命名,logo设计,商标设计,vi设计,广告设计,网页设计,环境,画册等方面创意需求；自主定价，公开竞标；众多设计师为客户提供上百个方案，体验百里挑一的待遇。满足设计师在家设计、兼职工作、能赚钱、能成名的要求，入围就给钱。|
http://www.51ps.com/|图片作坊威客网|||国内最诚信的威客(witkey)在线工作平台，请专业设计师帮您LOGO设计、商标设计、包装设计、照片后期处理……|
','',''),
('6193','2','12','字体下载|4|','','http://www.zhaozi.cn/|找字网|||找字网,您的字体管家！提供中英文原创字体在线预览，免费字体下载，在线字体设计，在线印章、光盘面、名片设计，平面设计教程在线学习！|
http://font.chinaz.com/|中国站长站-字体下载|||字体库提供,中文字体下载,英文字体下载,流行字体下载,繁体字体下载,艺术字体下载,广告字体下载,方正字体下载,草书字体下载,毛笔字体下载,字体设计下载,书法字体下载,字体库,等字体免费下载。|
http://www.1001fonts.com/|1001Fonts||||
http://www.dafont.com/|Dafont|||Archive of freely downloadable fonts. Browse by alphabetical listing, by style, by author or by popularity.|
http://simplythebest.net/fonts|SimplytheBestFonts||||
','',''),
('6285','2','15','编码转换相关','JS-ascii-unicode编码互转|JS-ascii-unicodebianmahuzhuan|3-r-0-180','','<p>
  <textarea name=\"source\" rows=\"14\" id=\"source\" style=\"width:99%\">
  中华人民共和国万岁
  中華人民共和國萬歲
  u4E2Du534Eu4EBAu6C11u5171u548Cu56FDu4E07u5C81
  u4E2Du83EFu4EBAu6C11u5171u548Cu570Bu842Cu6B72
  </textarea>
</p>
<button type=\"button\" onclick=\"action(\'CONVERT_FMT1\');\">转为ascii</button>
<button type=\"button\" onclick=\"action(\'CONVERT_FMT2\');\">转为unicode</button>
<button type=\"button\" onclick=\"action(\'RECONVERT\');\">恢复</button>
<p>
<textarea name=\"source\" rows=\"14\" style=\"width:99%\" id=\"show2\">
</textarea>
</p>
<script type=\"text/javascript\">
var oSource = document.getElementById(\"source\");
var oShow2 = document.getElementById(\"show2\");
var oTt = document.getElementById(\"tt\");
function action(pChoice)
 {
	switch (pChoice)
	 {
	case \"CONVERT_FMT1\":
		oShow2.value = ascii(oSource.value);
		break;
	case \"CONVERT_FMT2\":
		oShow2.value = unicode(oSource.value);
		break;
	case \"RECONVERT\":
		oShow2.value = reconvert(oSource.value);
		break;
	}
}
function ascii(str){   
return str.replace(/[^\\u0000-\\u00FF]/g,function($0){return escape($0).replace(/(%u)(\\w{4})/gi,\"\\&#x$2;\")});   
}   
function unicode(str){   
return str.replace(/[^\\u0000-\\u00FF]/g,function($0){return escape($0).replace(/(%u)(\\w{4})/gi,\"\\\\u$2\")});   
}   
function reconvert(str){   
str = str.replace(/(\\\\u)(\\w{4})/gi,function($0){   
return (String.fromCharCode(parseInt((escape($0).replace(/(%5Cu)(\\w{4})/g,\"$2\")),16)));   
});   
str = str.replace(/(&#x)(\\w{4});/gi,function($0){   
return String.fromCharCode(parseInt(escape($0).replace(/(%26%23x)(\\w{4})(%3B)/g,\"$2\"),16));   
});   
return str;   
}   
</script>',''),
('6297','1','15','日常生活','身份证查询|shenfenzhengchaxun|','','<iframe src=\"http://qq.ip138.com/idsearch/\" allowtransparency=\"true\" width=\"100%\" height=\"363\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"no\"></iframe>',''),
('6300','2','8','站长资讯|4|','','http://www.chinaz.com/|中国站长站|||站长之家(中国站长站)为个人站长与企业网络提供全面的站长资讯、最新最全的源代码程序下载、海量建站素材、强大的搜索优化辅助工具、网络产品设计与运营理念以及一站式网络解决方案，十年来我们一直致力为中文网站提供动力。|
http://www.admin5.com/|站长网|||A5站长网，专业服务于站长和网站的信息平台，全力为站长和网站提供服务为己任。提供全面的站长资讯、站长交易中介服务、站长工具、建站源码软件下载等服务。|
http://www.zzchn.com/|站长中国|||站长中国 - 与中国站长一起成长!|
http://www.im286.com/|落伍者|||落伍者创办于2001年，系国内历史最悠久的互联网创业者交流平台。|
http://www.cnzz.cn/|中国站长 CNZZ|||中国站长cnzz.cn将伴随着站长这一群体一起成长，希望更多的站长能够融入，我们一起前行!|
http://www.zhanzhang.com/|站长网|||站长网是一个关注站长、云服务器、网站建设、站长工具、SEO优化、搜索引擎、网络推广、免费资源、wordpress、自媒体、创业等内容的网站。站长每天必上的网站，站长就上zhanzhang.com！|
','',''),
('6301','2','8','论坛CMS|4|','','http://www.phpwind.com/|PhpWind||||
http://www.discuz.net/|Discuz！|||本站是 Discuz! 论坛社区产品的官方交流站点。提供风格、模板、插件、产品扩展、技术支持等全方位服务。Discuz! 论坛（BBS），是一个采用 PHP 和 MySQL 等其他多种数据库构建的性能优异、功能全面、安全稳定的社区论坛平台，是全球市场占有率第一的社区论坛（BBS）软件。|
http://www.dvbbs.net/|动网论坛||||
http://www.dedecms.com/|织梦内容管理系统||||
http://www.phome.net/|帝国CMS|||帝国网站管理系统(EmpireCMS) － 最安全、最稳定的开源CMS系统|
http://www.powereasy.net/|动易网络||||
','',''),
('6302','2','8','站长工具|4|','','http://www.miibeian.gov.cn/|信产部网站备案系统||||
http://www.cnnic.cn/|中国互联网络信息中心||||
http://top.chinaz.com/|中文Alexa排名查询|||网站排行榜是站长之家旗下专业提供中文网站排名服务的栏目，收集了国内各行业排名前列的众多知名网站，是国内最专业、最权威的中文网站排行榜。|
http://www.alexa.com/topsites|全球网站排名500强||||
http://www.123cha.com/domain|Whois信息查询||||
http://tool.chinaz.com/|站长工具-中国站长站|||站长工具是站长的必备工具。经常上站长工具可以了解SEO数据变化。还可以检测网站死链接、蜘蛛访问、HTML格式检测、网站速度测试、友情链接检查、网站域名IP查询、PR、权重查询、alexa、whois查询等等。|
http://www.iwebchoice.com/|中国网络媒体排行|||iwebchoice是国内最大最全面的免费网站排名、网站流量、网站数据查询网站。iwebchoice收集了2000家以上的国内主流网站，每日更新网站流量数据，为广大网站主及网站运营、市场、媒介、销售及广告人员提供数据参考。|
http://www.infomall.cn/|中国web信息博物馆||||
http://www.alexa.com/site/help/webmasters|alexa资料提交(英)||||
http://jigsaw.w3.org/css-validator|W3C CSS验证||||
http://validator.w3.org/|W3C WEB标准验证|||W3Cs easy-to-use      markup validation service, based on SGML and XML parsers.|
http://mgt.dns.com.cn/|新网互联域名管理|||专业的域名注册服务机构，新网互联是经ICANN和CNNIC权威认证的金牌服务商，提供域名注册、域名查询、域名申请服务。域名实时注册，自主管理，7*24小时全天候咨询热线: 95105612|
http://www.tool.la/|工具啦|||工具啦，提供各类站长工具、实用查询、娱乐算命、在线图片处理、贷款计算器、在线手册等常用工具。|
http://www.54zz.com/|网站历史库|||本站记录网站历史,使用网站截图的方式,以图片的形式记录域名历史,定期为网站记录成长的过程照片,并做永久保留,供随时查询建站历史|
http://www.locoy.com/|火车头采集器|||火车采集器软件，是用于网站信息采集，网站信息抓取，是目前使用人数最多的互联网采集软件。合肥乐维信息技术有限公司出品，推荐网站信息数据采集软件，10年打造网页数据采集利器。|
','',''),
('6303','2','8','网站推广|4|','','https://www.google.com/adsense/login/zh_CN/|Google Adsense||||
http://union.baidu.com/|百度联盟|||百度联盟隶属于全球最大的中文搜索引擎百度。一直致力于帮助合作伙伴挖掘互联网流量的媒体价值，帮助推广客户拓展精准有效的投放通路，是现今国内颇具规模的网络联盟体系之一。百度联盟的使命是，帮助合作伙伴在各自领域获得成功。|
http://www.alimama.com/|阿里妈妈|||阿里妈妈是阿里巴巴公司旗下的一个全新的“跨平台，跨屏幕，跨渠道”的全域营销平台，即通过大数据整合各类可触达消费者的渠道资源，建立全链路、精准、高效、可衡量的跨屏跨渠道营销体系。|
http://union.sogou.com/|搜狗联盟||||
http://union.alicall.com/|阿里通联盟|||阿里通联盟，打造联盟赚钱，联盟推广，推广赚钱，是中国最赚钱的电子商务联盟。|
https://associates.amazon.cn/|亚马逊联盟||||
http://newun.zhongsou.com/|中搜联盟||||
http://www.baidu.com/search/url_submit.html|提交百度搜索||||
','',''),
('6304','2','8','流量统计|4|','','http://www.cnzz.com/|中国站长联盟统计|||CNZZ数据专家是全球最大的中文网站统计分析平台，为各类网站提供免费、安全、稳定的流量统计系统与网站数据服务，帮助网站创造更大价值！|
http://www.51.la/|我要啦免费统计|||我要啦 统计面向网站站长提供免费的、功能完善的、人性化的网站流量统计分析服务|
http://count.51yes.com/|51yes网站流量统计|||流量,免费,站长,统计,网站,免费网站流量统计|
http://tongji.baidu.com/|百度统计||||
','',''),
('6309','2','6','硬件品牌|4|16','','http://www.lenovo.com.cn/|联想中国|||联想官方网上商城,为您提供最新联想笔记本电脑,联想平板电脑,联想手机,联想台式机,联想一体电脑,联想服务器,联想外设数码产品,联想智能电视等产品在线购买及售后服务,您提供愉悦的网上购物体验|
http://welcome.hp.com/country/cn/zh/welcome.html|HP(惠普)||||
http://www.samsung.com.cn/|三星中国|||三星手机等产品官方网站。想象三星能为您做什么？在这里您可以找到三星手机、三星笔记本、三星显示器、三星电视、三星数码相机、三星打印机、三星家电等三星产品官方介绍及服务支持信息。|
http://www.ibm.com/cn|IBM||||
http://www.intel.cn/|Intel(中文)||||
http://www.hedy.com.cn/|七喜电脑|||七喜控股 七喜控股 七喜控股|
http://www.tclinfo.com/|TCL电脑||||
http://www.hasee.com/|神舟电脑||||
http://www.logitech.com.cn/|Logitech(罗技)||||
http://www.nvidia.com/page/home|Nvidia||||
http://www.gigabyte.cn/|gigabyte(技嘉)|||技嘉用心, 领导创新。技嘉发挥创新优势, 推出G1™游戏主板 ,超耐久™主板 ,超频玩家主板  , WINDFORCE风之力散热显卡 ,技嘉GTX游戏本 ,技嘉效能超极本 ,技嘉2-in-1商用娱乐平板电脑 ,超微型电脑 ,电竞周边 ,服务器及企业级信息设备等产品。|
http://www.aocmonitor.com.cn/|AOC(冠捷)||||
http://www1.ap.dell.com/content/default.aspx?c=cn&l=zh&s=gen|Dell||||
http://www.amd.com.cn/CHCN/index.asp.htm|AMD||||
http://www.sony.com.cn/|索尼中国|||索尼（Sony）在中国网站，全面介绍Sony公司的各项业务.提供丰富的产品信息，包括数码相机，摄像机，笔记本电脑，电视系列，影音产品等以及售后服务和购买服务|
http://www.epson.com.cn/|爱普生中国|||爱普生(Epson)在中国开展的业务主要有打印机、扫描仪、投影机等信息关联产品业务、电子元器件业务、以及工业自动化设备业务。其产品以卓越的品质和节能环保的特点，赢得了中国消费者的厚爱。|
http://www.aigochina.com/|爱国者|||爱国者|
http://www.greatwall.com.cn/|长城集团||||
http://www.thtf.com.cn/|清华同方股份有限公司|||清华同方（同方股份有限公司)是由清华大学控股的高科技公司，于1997年6月成立并在上海证券交易所挂牌交易，股票代码600100。清华同方以科技成果产业化为模式，致力于信息、安防和节能环保三大领域，以“科技服务社会”为宗旨，同方股份有限公司紧密依托清华大学的科研实力与人才平台，围绕“技术＋资本”、“合作与发展”、“品牌化+国际化”的发展战略，弘扬“承担、探索、超越；忠诚、责任与价值等同”的企业文化。|
http://www.foxconn.com.cn/|Foxconn(富士康)|||富士康科技集团是专业从事电脑、通讯、消费电子、数位内容、汽车零组件、通路等6C产业的高新科技企业。|
http://www.thunis.com/|清华紫光电脑||||
http://www.digitalchina.com/|神州数码||||
http://www.toshiba.com.cn/|东芝公司|||东芝集团创立于1875年，致力于为人类和地球的明天而努力奋斗，力争成为能创造丰富的价值并能为全人类的生活、文化作贡献的企业集团，东芝集团业务领域包括数码产品、电子元器件、社会基础设备、家电等。|
http://www.triplex.com.tw/|TRIPLEX(启亨)||||
http://www.edifier.com/cn/zh/|漫步者||||
http://www.philips.com.cn/|Philips(菲利普)||||
http://www.dlink.com.cn/|D-Link友讯网络|||友讯科技股份有限公司成立于1986年，专注于电脑网路设备的设计开发，并自创「D-Link」品牌，行销全球。目前已在全世界70余国设立超过160个行销据点，产品销售遍布全球170多个主要市场，全球品牌营收超过10亿美金，为全球前三大专业网路公司。友讯科技的主要产品为交换器、无线、宽频及数位家庭等网路产品，在全球中小企业及家庭网路市场，为领导网通品牌。|
http://www.tp-link.com.cn/|TP-LINK|||全球领先的网络通讯设备供应商, 产品涵盖以太网、无线局域网、宽带接入、电力线通信，在既有的传输、交换、路由等主要核心领域外，正逐步进入移动互联网终端、数字家庭、网络安全等领域。TP-LINK始终致力于为大众提供最便利的本地局域网络互联和Internet接入手段，为大众在生活、工作、娱乐上日益增长的网络使用需求，提供高品质、高性能价格比的全面设备解决方案。|
http://www.xerox.com.cn/|Xerox(富士施乐)|||富士施乐FujiXerox产品包括各种打印机、多功能一体机、数码工程系统和生产型打印系统；提供行业所需的解决方案，协助企业提高生产力和知识共享能力。|
http://www.intel.com/|Intel(英文)|||英特尔设计和构建关键技术，为全球的计算设备奠定基础。|
http://www.unika.com.cn/|UNIKA双敏电子||||
http://cn.creative.com/|Creative(创新)|||CREATIVE创新科技总部位于新加坡，是研究多媒体，平板电脑和网络方面，专注Sound Blaster声卡，ZEN MP3播放器，ZiiO平板电脑等无线设备开发和生产的全球领导厂商。|
http://www.microtek.com.cn/|中晶科技|||Magic Color Theme, Colorful Template, free website template by templatemo.com|
http://www.netac.com.cn/|深圳市朗科科技||||
http://www.kingston.com/china|KingSton(金士顿)||||
http://www.soyo.com.cn/|梅捷电脑公司||||
http://www.3nod.com.cn/|深圳三诺电子有限公司||||
http://www.ecs.com.cn/|ECSWetsite||||
http://www.deluxworld.com/|DELUX（多彩）|||多彩科技集团创建于1994年，专注于电竞外设、电脑外设、移动互联外围设备产品的研发、生产、销售，并以优质的产品行销世界各地 。“为顾客创造价值”是我们始终的追求。DELUX官方网站为您提供键盘、鼠标、机箱、电源、音箱及移动互联产品的参数,图片,测评,及售后服务,售后网点已覆盖国内300多个城市国外150多个国家，正品保障，7天可退，1年换新！|
http://www.asrock.com/|Asrock(华擎)|||ASRock Inc. is established in 2002, specialized in the field of motherboards. ASRock strives to build up its own brand. With the 3C design concept, “Creativity, Consideration, Cost-effectiveness”, the company explores the limit of motherboards manufacturing while paying attention on the eco issue at the same time, developing products with the consideration of eco-friendly concept.|
http://www.leadtek.com/|leadtek(丽台)||||
http://www.wdc.com/|WesternDigital&#091;美&#093;|||WD® a long-time leader in hard drive technology designs and manufactures the #1 selling internal and external hard drives and award-winning media players and network drives|
http://www.pcasl.com/|东方恒健-翔升|||翔升电子多年来致力于主板、显卡等电脑配件、游戏硬件的研发和制造，是集一流的研发、生产为一体的国家级高新技术企业。其中翔升金刚显卡、金刚狼显卡、终结显卡、金刚主板、翔升显卡、翔升主板等酷劲十足的金刚形象|
http://www.emater.com/|美之尊-雅兰仕-朗龙||||
http://www.jetway.com.cn/|捷锐资讯中文网|||Jetway Info.Co., LTD. was established in Taipei, Taiwan 1986. The dedicated and professional motherboard manufacturer is founded on genuine and honest. We present the IT products of quality and performance with experiences of being devoted to motherboards designing,|
http://www.microlab.com.cn/|Microlab麦博||||
http://www.topstar1.com/|顶星产品||||
http://www.transcendchina.com/|Transcend(创见)|||支援与下载,公司简介,库存信息,每月营业额报告,获奖信息,Stockholders meeting,支持,投资者资汛,产品验证,股东服务,关于创见,历年股利发放,产品注册,新闻中心,财务报告书,财务报告,绿能环保,兼容性,联络我们,法律条款,何处购买,招聘信息,产品返修|
http://www.kingmax.com.cn/|KingMax(胜创)||||
http://www.huntkey.com.cn/|航嘉创威||||
http://www.longway.com/|深圳龙维科技股份有限公司|||深圳市龙维科技股份有限公司SHENZHEN LONGWAY TECHNOLOGIES CO.,LTD is specialized in R&D,self-production,marketing and after sales services of networking products.With our own brand,we determined to be the worlwide professional networking products provider.|
http://www.alliedtelesis.com.cn/|AlliedTelesyn|||安奈特网站|
http://www.maxtor.com/|迈拓(maxtor)||||
http://www.supermicro.com/|Supermicro(超微)|||Supermicro provides customers around the world with application-optimized server, workstation, blade, embedded, storage and GPU systems. Leveraging our advanced Server Building Block Solutions and system architecture innovations with advanced software and services offerings, Supermicro offers the industrys most optimized customer solutions for IT, datacenter, embedded, HPC, and Cloud deployments.|
http://www.aeolus.com.cn/|北京九州风神||||
http://www.hyundaicorp.com/|hyundai(现代)||||
http://www.aopen.com.cn/|AOpen||||
http://www.accton.com.cn/|智邦大陆科技有限公司||||
http://www.chaintech.com.tw/|chaintech(承启)||||
http://www.newmen.com.cn/|新贵科技|||中国电脑外设领先品牌，荣获广东省著名商标、深圳市知名品牌、国家高新技术企业。Newmen新贵致力于开发、制造及销售新颖时尚的电子消费类技术产品，为消费者带来快乐的高品质生活。|
http://www.mustek.com/|Mustek（鸿友）||||
http://www.case-pro.com/|LEGIONE(联志)||||
http://www.mag.com.tw/|MAG(美格)|||徚旓幰嬥梈偺偄偄偲偙傠傕埆偄偲偙傠傕愒棁乆偵偍榖偟偡傞僒僀僩偱偡丅|
http://www.eacan.com.cn/|盈佳|||盈佳坚信，唯有好产品，才有持久的竞争力。音响，是声音的艺术。盈佳认为，造出一个可发声的箱子并不难，造出一套品质佳、性价高的优秀产品并不易，产品研发能力、音响调试能力、工艺水平及成本控制能力，缺一不可。这其中，最重要的是“用心”，是诚意。EACAN盈佳音响背后是盈信制造——盈信电子有限公司。盈信电子专注于音响产业。多年来，盈信电子在这个领域精耕细作，厚积薄发。从产品研发能力、音响调试能力，到工艺水准、成本与控制能力，盈信电子累积了强大的综合实力，领先业界。|
http://www.webeye.com.cn/|Webeye(东英-网眼)||||
http://www.diamondmm.com/|Diamond(帝盟)|||Diamond offers a complete multimedia solution featuring AMD Radeon graphics cards, TV tuners, USB display adapters, video capture devices, sound cards, modems, and electronics accessories all from one convenient location.|
http://www.geil.com.cn/|金邦科技|||GeIL offers High Quality, High Performance, Overclocking DDR, DDR2 memory modules for computers and offers great options for upgrades.  Perfect for gaming and hardcore gamers.|
http://www.szkomar.com/|ComeOn(科盟)|||深圳科盟电子有限公司|
http://www.liteon.com/|Liteon(光宝)||||
http://www.biostar.cn/|BIOSTAR(映泰)||||
http://cn.shuttle.com/|Shuttle(浩鑫)|||Shuttle, a leading PC manufacturer specializing in high-performance desktop PCs in compact designs offers a full range of products, from XPC, AIO to Slim PC.|
http://www.syntax.com.cn/|北京经纶全讯科技有限公司|||经纶全讯|
http://www.jizhan.com.cn/|技展||||
http://www.mitsubishicorp.com/en/index.html|Mitsubishi三菱||||
http://www.crucial.cn/|英睿达|||Crucial英睿达，镁光旗下知名品牌，内存条及固态硬盘存储专家。专业提供高品质、高性能、高稳定性的DDR2内存条、DDR3内存条、Mac系统内存条、M550系列、MX100系列、BX100系列及MX200系列的2.5英寸固态硬盘及mSATA固态硬盘。|
','',''),
('6310','2','6','电脑公司|4|16','','http://www.lenovo.com.cn/|联想集团|||联想官方网上商城,为您提供最新联想笔记本电脑,联想平板电脑,联想手机,联想台式机,联想一体电脑,联想服务器,联想外设数码产品,联想智能电视等产品在线购买及售后服务,您提供愉悦的网上购物体验|
http://www.dell.com.cn/|戴尔中国(DellChina)|||欢迎访问戴尔官方网站。Dell中国为个人、家庭、企业办公等提供高品质戴尔产品及服务。登录Dell官方网站查询最新Dell产品价格、戴尔优惠活动、戴尔售后服务信息等。|
http://www.apple.com.cn/|苹果中国|||Apple 凭借 iPhone、iPad、Mac、Apple Watch、iOS、OS X、watchOS 等产品引领了全球创新。你可以访问网站，了解和购买产品，并获得技术支持。|
http://www.ithaier.com/|海尔电脑||||
http://www.ibm.com/cn|IBM中国||||
http://www8.hp.com/cn/zh/home.html|惠普中国||||
http://www.intel.com/cn/gb|Intel公司||||
http://www.hedy.com.cn/|七喜电脑|||七喜控股 七喜控股 七喜控股|
http://www.foundertech.com/|方正集团|||方正科技官方网站,介绍方正科技销售产品|
http://www.thunis.com/|清华紫光||||
http://www.greatwall.com.cn/|长城集团||||
http://www.logitech.com/index.cfm/CN/ZH|罗技中国||||
http://www.tongfangpc.com/|清华同方|||广州2010年亚运会计算机设备供应商-同方电脑，作为同方股份的领军企业，始终专注于计算机产品及外围设备的研发、生产、销售和服务。同方电脑销量已稳居国内前三、全球十强，同方品牌更是跻身世界品牌500强之列。|
http://www.gigabyte.com.cn/|技嘉科技|||技嘉用心, 领导创新。技嘉发挥创新优势, 推出G1™游戏主板 ,超耐久™主板 ,超频玩家主板  , WINDFORCE风之力散热显卡 ,技嘉GTX游戏本 ,技嘉效能超极本 ,技嘉2-in-1商用娱乐平板电脑 ,超微型电脑 ,电竞周边 ,服务器及企业级信息设备等产品。|
http://www.hasee.com/|神舟电脑||||
http://www.unika.com.cn/|UNIKA双敏电子||||
','','');