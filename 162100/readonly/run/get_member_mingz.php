<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#ad_table { background-color:#D8D8D8; }
#ad_table th { background-color:#EEEEEE; text-align:center; }
#ad_table th, #ad_table td { padding:5px 10px; font-size:12px; line-height:normal; word-wrap:break-word; word-break:break-all; }
#ad_table td { background-color:#FFFFFF; text-align:center; font-size:14px; }
.s_noset_bg { background:#CCC; }
-->
</style>
<?php

/*
$sbar = @glob('readonly/js/search_bar_*.js');
$sbar_n = @count($sbar);
*/

$sbar_n = 3;

$s_b = (!empty($_COOKIE['searchBarBody']) && $_COOKIE['searchBarBody'] != 0 && abs($_COOKIE['searchBarBody']) <= $sbar_n) ? abs($_COOKIE['searchBarBody']) : $web['search_bar'];
?>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th style="text-align:left;">我的引擎模式</th>
  </tr>
  <tr>
    <td>
<div class="note" style="background-color:#FFFFCC;">系统默认设置：样式<?php echo $web['search_bar']; ?></div>
  
<table border="0" cellspacing="0" cellpadding="0">
<?php
if ($sbar_n > 0) {
  echo '<tr>';
  for ($i = 1; $i<=$sbar_n; $i++) {
    echo '
    <td>样式'.$i.' [<a href="search_bar.php?type='.$i.'" target="_blank">预览</a>]</td>
';
  }
  echo '</tr>';
  echo '<tr>';
  for ($i = 1; $i<=$sbar_n; $i++) {
    echo '
    <td><button type="button" onclick="setS('.$i.');" id="yes'.$i.'"'.($s_b == $i ? '>√已选' : ' class="s_noset_bg">选').'择该样式</button></td>
';
  }
  echo '</tr>';
} else {
  echo '<tr><td>没有发现搜索引擎样式模板！</td></tr>';
}
?></table>
</td>
  </tr>
</table>
<script language="javascript" type="text/javascript">
<!--
var dfSet=<?php echo $s_b; ?>;
function setS(v) {
  if ($('yes'+v+'').innerHTML == '√已选择该样式') {
    alert('已是当前设置！');
    return;
  }
  setCookie('searchBarBody', v, 365);
  $('yes'+dfSet+'').innerHTML = '选择该样式';
  $('yes'+dfSet+'').className = 's_noset_bg';
  $('yes'+v+'').innerHTML = '√已选择该样式';
  $('yes'+v+'').className = '';
  dfSet = v;
  alert('设置好了！再次使用将显示此样式');
}
-->
</script>
<br />


<?php
$opensugV_default = '';
if (file_exists('writable/js/opensug.js')) {
  $opensugStr = '系统默认设置：<strong>开启</strong>';
  $opensugV_default .= '1';
  $opensugF = 'writable/js/opensug.js';
} else {
  $opensugStr = '系统默认设置：<strong>关闭</strong>';
  $opensugV_default .= '0';
  $opensugF = 'readonly/js/opensug.js';
}
if (preg_match('/var\s+sugSubmitV[\s\n\r]*\=[\s\n\r]*(1|0)[\s\n\r]*\;/', file_get_contents($opensugF), $m)) {
  $opensugV_default2 = $m[1];
} else {
  $opensugV_default2 = 1;
}
$opensugStr .= $opensugV_default2 == 1 ? '（点选关键词自动搜索）' : '（点选关键词<span class="redword">不</span>自动搜索）';
$opensugV_default .= $opensugV_default2;
$opensugV_current = $opensugV_default;


if (isset($_COOKIE['searchLenovo']) && preg_match('/(1|0){2}/', $_COOKIE['searchLenovo'])) {
  $opensugV_current = $_COOKIE['searchLenovo'];
}

$zn1 = substr($opensugV_current, 0, 1);
$zn2 = substr($opensugV_current, 1, 1);

?>

<script language="javascript" type="text/javascript">
<!--
var opensugDefault = '<?php echo $opensugV_default; ?>';
var opensugCurrent = '<?php echo $opensugV_current; ?>';
function setZ() {
  var opensugTmp = '';
  var allCheckBox = document.getElementsByName('zn');
  if (allCheckBox != null && allCheckBox.length > 0) {
    for (var i = 0; i < allCheckBox.length; i++) {
      if (allCheckBox[i].checked == true && allCheckBox[i].disabled == false) {
        opensugTmp = allCheckBox[i].value.toString();
        break;
      }
    }
  }
  if ($('zn_1').checked == true) {
    if ($('zn2').checked == true && $('zn2').disabled == false) {
      opensugTmp += '1';
    } else {
      opensugTmp += '0';
    }
  } else {
    opensugTmp += opensugCurrent.substr(1,1).toString();
  }
  if (opensugTmp == opensugCurrent) {
    alert('当前已是该选择！');
    return;
  }
  if (opensugTmp == opensugDefault) {
    setCookie('searchLenovo', '', -366);
  } else {
    setCookie('searchLenovo', opensugTmp, 365);
  }
  opensugCurrent = opensugTmp;
  alert('设置完毕！刷新首页就好了');
}
-->
</script>

<table width="100%" border="0" cellspacing="1" cellpadding="0" id="ad_table">
  <tr>
    <th style="text-align:left;">首页搜索下拉框内容智能联想</th>
  </tr>
  <tr>
    <td>
<div class="note" style="background-color:#FFFFCC;"><?php echo $opensugStr; ?></div>

<label for="zn_0"><input type="radio" class="radio" name="zn" id="zn_1" value="1" onclick="$('zn2').disabled=false;"<?php echo (isset($zn1) && $zn1 == 1) ? '  checked="checked"' : ''; ?> /> 开启</label>（<input type="checkbox" class="checkbox" id="zn2" onclick="$('zn_1').checked=true;"<?php echo (isset($zn2) && $zn2 == 1) ? '  checked="checked"' : ''; ?><?php echo (isset($zn1) && $zn1 == 0) ? ' disabled="disabled"' : ''; ?> />点选关键词自动搜索） <label for="zn_1"><input type="radio" class="radio" name="zn" id="zn_2" value="0" onclick="$('zn2').disabled='disabled';"<?php echo (isset($zn1) && $zn1 == 0) ? '  checked="checked"' : ''; ?> /> 关闭</label> &nbsp;&nbsp; <button type="button" onclick="setZ()">确定</button></td>
  </tr>
</table>














