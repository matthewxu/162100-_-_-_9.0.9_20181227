<?php

@ header("content-type: text/html; charset=utf-8");


/* 管理员控制台 */

/*
* 程序名称：162100网址导航3号
* 作者：162100.com
* 邮箱：162100.com@163.com
* 网址：http://www.162100.com
* ＱＱ：184830962
* 声明：禁止侵犯版权或程序转发的行为，否则我方将追究法律责任
*/

@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');
@ require ('readonly/function/confirm_power.php');
define('POWER', confirm_power());

function get_en_url($d) {
  //$arr = @explode('/', $d);
  //$arr = array_map('urlencode', $arr);
  //return @implode('%2F', $arr);
  return urlencode(base64_encode($d));
}

$post = !empty($_POST['post']) ? $_POST['post'] : (!empty($_GET['post']) ? $_GET['post'] : false);
$post = preg_replace('/[^0-9a-zA-Z_]+/i', '', $post);
if (!empty($post)) {
  @ require ('readonly/function/reset_indexhtml.php');

  //输出信息
  function alert($text = '', $href) {
    global $web;
    echo '
    <div class="output"><p><img src="readonly/images/ok.gif" /> '.$text.'</p>
        <p>或点击以下链接进入...<a href="'.$href.'">'.$href.'</a></p></div>
    </td>
  </tr>
</table>
<style type="text/css">
<!--
#transition { /*background:#FFFFFF;*/ }
-->
</style>
<script language="javascript" type="text/javascript">
<!--
setTimeout("location.href=\''.$href.'\';", 5000);
function displayBg(){
  document.body.style.background="none";
}
  if (document.all) {
    window.attachEvent("onload", displayBg);
  } else {
    window.addEventListener("load", displayBg, false);
  }

-->
</script>
</body>
</html>';
    die;
  }

  //输出错误
  function err($text = '', $src = 'i') {
    global $web;
    echo '
    <div class="output"><p><img src="readonly/images/'.$src.'.gif" /> '.$text.'</p>
    <p>点此可<a href="javascript:window.history.back();" onclick="location.href=document.referrer">返回</a></p></div>
    </td>
  </tr>
</table>
<style type="text/css">
<!--
#transition { /*background:#FFFFFF;*/ }
-->
</style>
<script language="javascript" type="text/javascript">
<!--
function displayBg(){
  document.body.style.background="none";
}
  if (document.all) {
    window.attachEvent("onload", displayBg);
  } else {
    window.addEventListener("load", displayBg, false);
  }

-->
</script>
</body>
</html>';
    die;
  }
/*
  if ($_SERVER['HTTP_REFERER'] && strpos($_SERVER['HTTP_REFERER'], $web['sitehttp']) !== 0) {
    err('跨域操作越权！');
  }
*/
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>程序执行</title>
<link href="readonly/css/style.css" rel="stylesheet" type="text/css">
<link href="readonly/css/'.$web['cssfile'].'/style.css" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
html { width:100%; height:100%; text-align:center; background:none; border:none;  padding:0; }
body { width:720px; height:100%; margin:0 auto; padding:0; border-top:none; margin-top:0; background:url(readonly/images/loading.gif) 50% 50% no-repeat; border:none; }
#transition { text-align:center; margin:auto; }
.wherego { margin:10px auto; background-color:#FFFFFF; }
.wherego td { width:50%; font-size:12px; word-wrap:break-word; word-break:break-all; }
.wherego td.whereyou { text-align:right; }
-->
</style>
<script type="text/javascript" language="javascript" src="writable/js/main.js?'.filemtime('writable/js/main.js').'"></script>
</head>
<body>';

  //echo str_repeat(' ', 4096);
  //@ob_flush();
  //@flush();

  echo '
<table id="transition" width="720" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>';
  if ($post != false && file_exists('readonly/run/post_manager_'.$post.'.php')) {
    @ require ('readonly/run/post_manager_'.$post.'.php');
  } else {
    err('命令错误或功能尚未开通！');
  }
  echo '
<style type="text/css">
<!--
#transition { /*background:#FFFFFF;*/ }
-->
</style>
    </td>
  </tr>
</table>
</body>
</html>';


  //echo str_repeat(' ', 4096);
  //@ob_flush();
  //@flush();

  die;
}

























$power_url = array(
  'upgrade'         => '版本与升级',
  'chadu'           => '查木马',
  
  'set'             => '基本参数设置',
  'sql'             => '数据库管理',
  'mail'            => '邮箱参数设置',
  'logo'            => '上传图片（LOGO）',
  
  'area'            => '频道、栏目管理',
  'http'            => '分类、网址管理',
  
  'style'           => '模式、风格管理',
  'search'          => '自助搜索引擎',
  
  'search_hot'      => '搜索框下关键字广告',
  'modify'          => '在线修改文件',
  'foot'            => '编辑页脚',
  'newsite'         => '网址收录审核',
  'html'            => '一键全静态',
  'modify'          => '在线修改文件',
  'manager_browse_boin'          => '建立客户脱机缓存',
  'manager_browse_reload'        => '刷新客户端缓存',
  'user'                       => '用户控制设置',
  'member'                       => '成员帐号管理',
  'member_check_reg'             => '注册审批及违规管理',
  'member_funds'                 => '成员收支管理',
  'member_bulk_mail'             => '群发邮件',
  'weather'             => '天气预报设置',
  'calendar'             => '日历设置',
  'extra'             => '边栏、号外管理',
  'menu'             => '功能菜单栏管理',
  'welcome'             => '首页底部来路链接开关',
  'foot_searchbox'             => '首页底部搜索框开关',
  'chuchuang'             => '管理广告图片',
);

if (@ $_GET['get'] == 'sql') {
  header('Cache-Control:no-cache,must-revalidate');
  header('Pragma:no-cache');
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员中心<?php

//if (@ array_key_exists($_GET['get'], $power_url)) {
if ($_GET['get'] && isset($power_url[$_GET['get']])) {
  echo ' - '.$power_url[$_GET['get']];
  $nav = '<a href="webmaster_central.php">管理员控制台</a><a id="top_title_is">'.$power_url[$_GET['get']].'</a>';

} else {
  $_GET['get'] = 'door';
  $nav = '<a id="top_title_is">管理员控制台</a>';
}

echo ' - '.$web['sitename2'], $web['code_author'];
?></title>
<link href="readonly/css/style.css?<?php echo filemtime('readonly/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="readonly/css/<?php echo $web['cssfile']; ?>/style.css?<?php echo filemtime('readonly/css/'.$web['cssfile'].'/style.css'); ?>" rel="stylesheet" type="text/css" id="my_style">
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table td { background-color:#FFFFFF; text-align:left; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; }

h5.list_title { margin:0; margin-bottom:10px; height:28px; line-height:28px; border-bottom:1px #D8D8D8 solid; clear:both; }
h5.list_title a { height:26px; font-weight:normal; display:inline-block !important; display:inline; zoom:1; padding:0 15px; text-align:center; text-decoration:none; background-color:#FFFFFF; }
h5.list_title a.list_title_in { font-weight:bold; height:28px; border:1px #D8D8D8 solid; border-bottom:none; }
.note { margin-bottom:10px; padding:3px 6px; font-size:12px; border:1px #EEEEEE solid; overflow:hidden; clear:both; }

.menu_title { color:#057BD2; }
.red_err {background-color:yellow;font-size:12px; line-height:normal; }
#top_title_is { width:auto !important; padding-left:10px !important; padding-right:10px !important; }
-->
</style>
<script type="text/javascript" language="javascript">
<!--
var nowVersion='<?php @ include ('writable/require/browse_reload.txt'); ?>';
-->
</script>
<script type="text/javascript" language="javascript" src="writable/js/main.js?<?php echo filemtime('writable/js/main.js'); ?>"></script>
<script language="javascript" type="text/javascript">
<!--
// 只允许输入数字
function isDigit(obj, starVal, s, t) { //s：0要求大于0，1不必大于0；t：小数点代表货币型数字
  var ye = false;
  var d = r1 = r2 = '';
  if (typeof(s) != 'undefined') {
    if (s == 0) {
    } else {
      ye = true;
      if (obj.value == '0' || obj.value == '') {
        obj.value = '0';
        return;
      }
    }
  }
  if (ye == false) {
    d = '大于0的';
    r1 = ' || obj.value <= 0';
    r2 = '\-?';
  }

  if (typeof(t) != 'undefined' && t == '.') {
    var t = 'isNaN(obj.value)'+r1;
    var b = ''+d+'货币类型数值';
  } else {
    var t = '!/^'+r2+'([1-9]|[1-9][0-9]+)%?$/.test(obj.value)';
    var b = ''+d+'整数';
  }
  if (eval(t)) {
    alert('你输入的值不对，只允许输入'+b+'！');
    obj.value = starVal;
    //obj.focus();
  }
}

function allChoose(o, v1, v2) {
  var a = document.getElementsByName(o);
    for (var i = 0; i < a.length; i++){
      if (a[i].checked == false) a[i].checked = v1;
      else a[i].checked = v2;
  }
}

function get_checkbox(id) {
  var article = 0;
  var allCheckBox = document.getElementsByName(id);
  if (allCheckBox != null && allCheckBox.length > 0) {
    for (var i = 0; i < allCheckBox.length; i++) {
      if (allCheckBox[i].checked == true && allCheckBox[i].disabled == false) {
        article++;
        //break;
      }
    }
  }
  return article;
}

function chk(form, input, manageType) {
  if (get_checkbox('id[]') == 0) {
    alert('数据为空或尚未点选！');
    return false;
  }
  if (confirm('确定'+input.innerHTML+'吗？')) {
    form.limit.value = manageType;
    addSubmitSafe();
    form.submit();
  }
  return false;
}

-->
</script>
</head>
<body>
<div id="site_d"></div>
<?php @ include ('readonly/require/head.php'); ?>
<div id="top_title"><a href="./">首页</a><?php echo $nav; ?></div>


    <?php
if (POWER == 5) {
  echo '<div class="output" style="margin-bottom:10px;">欢迎您：<a href="webmaster_central.php" title="管理员，点击进入管理后台">管理员<img id="manager" src="readonly/images/manager.gif" alt="管理员，点击进入管理后台"></a> | 上次登陆'.$session[1].'</div>';
}
echo @ $GLOBALS['session_err'];


?>


<div class="body">
  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="menu">
    <tr valign="top">
<?php
if (POWER == 5) :


?>
      <td class="menu_left" valign="top">
          <div class="menu_title">程序升级</div>
          <ul>
            <li><a id="bar-upgrade" href="?get=upgrade" class="redword">在线升级</a></li>
          </ul>
          <div class="menu_title">系统设置</div>
          <ul>
            <li><a id="bar-set" href="?get=set">基本参数设置</a></li>
            <!--li style="list-style:none;"><a id="bar-writable/require/about.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/require/about.txt'); ?>" title="此项用代码编辑" onmouseover="sSD(this,event);">编辑关于我们</a></li-->
            <li><a id="bar-sql" href="?get=sql">数据库管理</a></li>
          <li><a id="bar-user" href="?get=user">用户控制设置</a></li>
            <li><a id="bar-mail" href="?get=mail">邮箱参数设置</a></li>
          </ul>
          <div class="menu_title">系统功能</div>
          <ul>
            <li><a id="bar-style" href="?get=style">模式、风格管理</a></li>
            <li><a id="bar-search" href="?get=search">集成搜索引擎管理</a></li>
            <li><a id="bar-menu" href="?get=menu">功能菜单栏管理</a></li>
            <li><a id="bar-extra" href="?get=extra">边栏、号外管理</a></li>
          </ul>
          <div class="menu_title">网址管理</div>
          <ul>
            <li><a id="bar-area" href="?get=area">频道、栏目管理</a></li>
            <li><a id="bar-http" href="?get=http" title="包含首页邮箱登陆、团购频道等"onmouseover="sSD(this,event);">分类、网址管理</a></li>
            <li><a id="bar-http_mingz" href="?get=http&column_id=homepage&class_id=0&bar=mingz">首页名站导航</a></li>
            <li><a id="bar-http_friendlink" href="?get=http&column_id=homepage&class_id=4&bar=friendlink">首页友情链接</a></li>
          </ul>
        <div class="menu_title">用户管理</div>
        <ul>
          <li><a id="bar-member" href="?get=member">成员帐号管理</a></li>
          <li><a id="bar-member_check_reg" href="?get=member_check_reg">注册审批及违规管理</a></li>
          <li><a id="bar-member_funds" href="?get=member_funds">成员收支管理</a></li>
          <li><a id="bar-member_bulk_mail" href="?get=member_bulk_mail">群发邮件</a><br />
          </li>
        </ul>
          <div class="menu_title">其它功能</div>
          <ul>
            <li><a id="bar-chadu" href="?get=chadu">查木马</a></li>
            <li><a id="bar-writable/require/badword.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/require/badword.txt'); ?>" title="注意！一词一行" onmouseover="sSD(this,event);">设置过滤词汇</a></li>
            <li><a id="bar-logo" href="?get=logo">上传图片</a></li>
          </ul>
        <div class="menu_title">编辑页脚</div>
        <ul>
          <li><a id="bar-welcome" href="?get=welcome">首页底部来路链接</a></li>
          <li><a id="bar-foot_searchbox" href="?get=foot_searchbox">首页底部搜索框</a></li>
          <li><a id="bar-foot_index" href="?get=foot&act=foot_index" title="此项用代码编辑" onmouseover="sSD(this,event);">首页页脚</a></li>
          <li><a id="bar-foot" href="?get=foot&act=foot" title="此项用代码编辑" onmouseover="sSD(this,event);">公用页脚</a></li>
          <li><a id="bar-writable/require/icp.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/require/icp.txt'); ?>">ICP备案号</a></li>
          <li><a id="bar-writable/require/statistics.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/require/statistics.txt'); ?>" title="第三方统计代码，如百度统计或中国站长统计等" onmouseover="sSD(this,event);">加入统计代码</a></li>
        </ul>
        <div class="menu_title">网址申录</div>
        <ul>
          <li><a id="bar-newsite" href="?get=newsite">网址收录审核(<span class="redword"><?php
$n_n = 0;
if ($n_arr = @file('writable/__temp__/newsite_list.txt')) {
  $n_n = count($n_arr);
}
echo $n_n;
unset($n_n, $n_arr);
?></span>)</a><br />
          </li>
        </ul>
        <div class="menu_title">静态生成</div>
        <ul>
          <li><a id="bar-html" href="?get=html">一键全静态</a>
            <?php

if (!isset($web['html'])) {
	  @ require ('writable/set/set_html.php');
}
if ($web['html'] == true) {
  echo '(<span class="redword">已生成</span>)';
}


?>
          </li>
        </ul>
        <div class="menu_title">天气预报、日历管理</div>
        <ul>
          <li><a id="bar-weather" href="?get=weather">天气预报设置</a></li>
          <li><a id="bar-calendar" href="?get=calendar">日历设置</a></li>
        </ul>
        <div class="menu_title">缓存技术</div>
        <ul>
          <li><a id="bar-browse_boin" href="?post=browse_boin">建立客户脱机缓存</a></li>
          <li><a id="bar-browse_reload" href="?post=browse_reload">刷新客户端缓存</a><br />
          </li>
        </ul>
        <div class="menu_title">文件管理</div>
        <ul>
          <li><a id="bar-writable/chuchuang/ad_top_index.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_top_index.txt'); ?>" title="首页页眉大横幅，位于搜索框上，最大宽度1000px" onmouseover="sSD(this,event);">首页头部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_banner_index.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_banner_index.txt'); ?>" title="首页颈部大横幅，位于搜索框下，最大宽度1000px" onmouseover="sSD(this,event);">首页颈部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_central.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_central.txt'); ?>" title="横幅广告，最大宽度760px" onmouseover="sSD(this,event);">首页腰部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_side.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_side.txt'); ?>" title="最大宽度230px" onmouseover="sSD(this,event);">首页边部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_bottom_index.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_bottom_index.txt'); ?>" title="首页底部大横幅，最大宽度1000px" onmouseover="sSD(this,event);">首页底部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_top.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_top.txt'); ?>" title="分类页面页眉大横幅，位于搜索框上，最大宽度1000px" onmouseover="sSD(this,event);">分类页面头部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_banner.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_banner.txt'); ?>" title="分类页面颈部大横幅，位于搜索框下，最大宽度1000px" onmouseover="sSD(this,event);">分类页面颈部广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_bottom.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_bottom.txt'); ?>" title="分类页面底部大横幅，最大宽度1000px" onmouseover="sSD(this,event);">分类页面底部广告</a></li>
          <li><a id="bar-writable/chuchuang/img" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/img'); ?>" class="greenword">管理广告图片</a></li>
          <li><a id="bar-search_hot" href="?get=search_hot">搜索框下（旁）广告</a></li>
          <li><a id="bar-writable/chuchuang/ad_juejinlian.txt" href="?get=modify&otherfile=<?php echo get_en_url('writable/chuchuang/ad_juejinlian.txt'); ?>" title="设置此项后，可自动识别亿起发联盟广告链接，进入商家网站而带来收益。不用再一个一个添加亿起发商家链接了。（也可在此加入淘宝客）" onmouseover="sSD(this,event);"<?php
  if (!file_exists('addfunds.php')) {
    echo ' onclick="alert(\'商业版才能修改此项！\');return false;"';
  }
?>>亿起发掘金链设置</a></li>
          </li>
        </ul>
        <!--div class="menu_title">修改文件[代码]</div>
        <ul>
          <li><a id="bar-modify" href="?get=modify">在线修改文件</a></li>
          <li><a id="bar-.htaccess" href="?get=modify&otherfile=<?php echo get_en_url('.htaccess'); ?>">修改.htaccess</a> </li>
        </ul-->

</td>
      <td class="menu_right"><?php
  if (file_exists('readonly/run/get_manager_'.$_GET['get'].'.php')) {
    @ require ('readonly/run/get_manager_'.$_GET['get'].'.php');


    if ($_GET['get'] == 'modify') {
      $bar_id = !empty($_GET['otherfile']) ? base64_decode($_GET['otherfile']) : 'modify';


    } elseif ($_GET['get'] == 'http') {
      if ($_GET['bar'] && $_GET['bar'] == 'mingz') {
        $bar_id = 'http_mingz';
      } elseif ($_GET['bar'] == 'friendlink') {
        $bar_id = 'http_friendlink';
      } else {
        $bar_id = 'http';
      }
    } elseif ($_GET['get'] == 'foot') {
      $bar_id = $_GET['act'];
    } else {
      $bar_id = $_GET['get'];
    }
    echo '<script> try { if ($("bar_id_") != null) { $("bar_id_").id = ""; } $("bar-'.$bar_id.'").parentNode.id = "bar_id_"; } catch (err) {} </script>';

  } else {
    echo '<img src="readonly/images/i.gif" /> 文件readonly/run/get_manager_'.$_GET['get'].'.php不见了！请检查。点此<a href="webmaster_central.php">回到管理员中心</a>。';
  }

?>

      </td>
<?php
else :
?>
<td><div class="output"><img src="readonly/images/i.gif" /> 请以基本管理员身份<a href="login.php">登陆</a>，以获得管理权限。</div>      </td>
<?php
endif;
?>
    </tr>
  </table>
</div>
<?php @ include ('writable/require/foot.php'); ?>

</body>
</html>