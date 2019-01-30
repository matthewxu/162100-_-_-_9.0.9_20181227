<?php
@ini_set('default_charset', 'utf-8');
@ header("content-type: text/html; charset=utf-8");
@ini_set('display_errors', false);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ require ('readonly/function/get_root_domain.php');
@ require ('readonly/function/read_file.php');

$web['sitehttp'] = 'http://'.(!empty($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']).'/';  //站点网址
$web['root'] = get_root_domain($web['sitehttp']);
$web['path'] = dirname(trim($web['sitehttp'], '/').$_SERVER['REQUEST_URI'].'.abc').'/';  //路径

if (!$web['root'] || $web['root']=='localhost' || $web['root']=='127.0.0.1') {
  define('DOMAIN_FALSE', 0);
} else {
  define('DOMAIN_FALSE', 1);
}

function check_sq($domain) {
  if (DOMAIN_FALSE === 0){
    return '';
  }
  if ($ide = read_file('http://www.162100.com/s/ide_back.php?domain='.urlencode($domain).'')) {
    if ($ide) {
      return $ide;
    }
  }
  return '';
}
function check_bd($domain_path) {
  if (DOMAIN_FALSE === 0){
    return '';
  }
  if ($ide_f = read_file('http://www.162100.com/s/ide_bd.php?domain_path='.urlencode($domain_path).'')) {
    $ide_f = trim($ide_f);
    if ($ide_f) {
      return $ide_f;
    }
  }
  return '';
}
function revstr($str) {
  $n = mb_strlen($str, 'UTF-8');
  $temp = '';
  for ($i=$n; $i>=0; $i--) {
    $temp .= mb_substr($str, $i, 1, 'UTF-8');
  }
  return sha1(md5($temp));
}
function decode162100($text){
  return trim(base64_decode($text), '|');
}
function run_datetime($v) {
  $v = preg_replace('/^(\d{4})(\d{2})?(\d{2})?(\d{2})?(\d{2})?(\d{2})?$/', '$1-$2-$3 $4:$5:$6', preg_replace('/[^\d]+/', '', $v));
  return preg_replace('/^[^\d]+|[^\d]+$/', '', $v);
}


list($sq_ide, $sq_date, $sq_domain) = @explode('|', check_sq($web['root']));
$bd_ide = check_bd($web['path']);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
body { margin:0; padding:0; background-color:#FFFFFF; text-align:center; }
h4 { font-size:32px; color:#663399; }
h4, p, h6 { margin:10px auto; padding:0; line-height:normal; }
p { margin:0px auto; }
.body {background-color:#EEEEEE; font-size:12px; padding:10px; color:#999999; }
.body h6 { font-size:16px; }
.ye {display:inline-block; *display:inline; *zoom:1; vertical-align:middle; font-size:32px; color:#FF9900; cursor:pointer; }
.no {display:inline-block; *display:inline; *zoom:1; vertical-align:middle; font-size:32px; color:#336699; cursor:pointer; }
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>升级到商业版</title>
</head>

<body style="height:480px; background-color:#FFFFFF;">

<?php
if ($_POST && !empty($web['root'])) :
  if (DOMAIN_FALSE === 0){
    echo '<p>您当前域名不合法！无法进行进一步的授权或绑定操作。<a href="javascript:window.history.back();" onclick="location.href=document.referrer">返回</a></p>';
  } else {
    if (!$sq_ide) {
      echo '<p>您当前域名未获授权！<a href="http://www.162100.com/pay/for_s_162100.php?domain='.urlencode($web['root']).'" target="_blank">去官方注册授权</a></p>';
    } else {
      if ($bd_ide !== 'yes') {
        @ require ('readonly/function/write_file.php');
        if ($bd_ide) {
          if (write_file('writable/set/set_ide.php', $bd_ide)) {
            echo '<p>绑定成功！<a href="javascript:window.history.back();" onclick="location.href=document.referrer">返回</a>或<a href="./" target="_top">进入网站首页</a></p>';
          } else {
            echo '<p>绑定失败！<a href="javascript:window.history.back();" onclick="location.href=document.referrer">返回</a></p>';
          }
        } else {
          echo '<p>绑定失败！密钥生出失败，请稍候再试。<a href="javascript:window.history.back();" onclick="location.href=document.referrer">返回</a></p>';
        }
      } else {
        echo '<p>您当前域名已绑定。可以启用商业版！ <a href="./webmaster_central.php?post=upgrade" target="_top">在线一键升级</a> <a href="./" target="_top">进入网站首页</a></p>';
      }
    }
  }


else :










?>


<div><h4>当前域名：<?php echo $web['root']; ?></h4>
<div class="body"><h6><center>若启用商业版，应使域名获得授权并绑定——</center></h6>

<?php
if (DOMAIN_FALSE === 0) {
  echo '<p>您当前域名不合法！无法进行下一步的授权或绑定操作。</p>';
} else {
  echo '
<p><strong>1、检测授权</strong><span id="sq"><img src="readonly/images/loading2.gif" width="16" height="16" border="0" align="absmiddle" /></span></p>
<p><strong>2、检测绑定</strong><span id="bd"><img src="readonly/images/loading2.gif" width="16" height="16" border="0" align="absmiddle" /></span></p>';

  if ($sq_ide) {
    echo '
<script>
var sq = document.getElementById(\'sq\');
if (sq != null) {
  sq.innerHTML = \' <span class="ye" title="已授权'.(!empty($sq_date) ? '（'.run_datetime($sq_date).'）' : '').'">√</span>'.(!empty($sq_domain) ? '<span style="color:#999999">（当前域名是授权域名'.$sq_domain.'下增加的绑定域名）</span>' : '').'\';
}
</script>
';
    if ($bd_ide === 'yes') {
      echo '
<script>
var bd = document.getElementById(\'bd\');
if (bd != null) {
  bd.innerHTML = \' <span class="ye" title="已绑定">√</span> 当前域名已可以启用商业版！</span> <a href="./webmaster_central.php?post=upgrade" target="_top">在线一键升级</a> <a href="./" target="_top">进入网站首页</a>\';
}
</script>
';
    } else {
      echo '<input type="hidden" name="bd_ide" value="'.$bd_ide.'" />
<script>
var bd = document.getElementById(\'bd\');
if (bd != null) {
  bd.innerHTML = \' <span class="no" title="未绑定">×</span> 绑定后可启用商业版，<form method="post" action="for_s.php" style="display:inline;"><input type="hidden" name="domain" value="'.$web['root'].'" /><button type="submit">现在绑定</button></form>\';
}
</script>
';
    }
  } else {
    echo '<input type="hidden" name="sq_ide" value="'.$sq_ide.'" />
<script>
var sq = document.getElementById(\'sq\');
if (sq != null) {
  sq.innerHTML = \' <span class="no" title="未授权">×</span> <a href="http://www.162100.com/pay/for_s_162100.php?domain='.urlencode($web['root']).'" target="_blank">去官方注册授权</a>\';
}
</script>
';
    if ($bd_ide === 'yes') {
      echo '
<script>
var bd = document.getElementById(\'bd\');
if (bd != null) {
  bd.innerHTML = \' <span class="ye" title="已绑定">√</span> <span style="color:#336699;">但你要还要进行上一步授权操作</span>\';
}
</script>
';
    } else {
      echo '<input type="hidden" name="bd_ide" value="'.$sq_ide.'" />
<script>
var bd = document.getElementById(\'bd\');
if (bd != null) {
  bd.innerHTML = \' <span class="no" title="未绑定">×</span> 请先进行上一步授权操作，然后返回这里进行绑定\';
}
</script>
';
    }
  }
}
?>
</div>
</div>
<p>&nbsp;</p>
<p id="close_self" style="cursor:pointer; color:#999999;"></p>
<?php
endif;
?>
<script>
window.onload=function(){
if(parent && parent!=self){
  document.getElementById('close_self').innerHTML = '[关闭]';
  document.getElementById('close_self').onclick=function(){
    parent.delSubmitSafe();
    parent.document.getElementById('addCFrame').style.display='none';
  }
}
}
</script>

</body>
</html>