<?php
require ('authentication_manager.php');
?>
<?php

@ require ('readonly/weather/getweather_step.php');
?>
<style>
.note { background-color:#FFFFCC; }
</style>

<form action="?post=calendar" method="post" id="calendar_source">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="150" align="right">首页万年历调用地址：</td>
      <td><input type="text" name="calendar_source" value="<?php echo $web['calendar']; ?>" size="36" /></td>
    </tr>
    <tr>
      <td width="150">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" class="send2" style="border:none;">保存</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="calendar_source" />
</form>
<p>&nbsp;</p>
<script type="text/javascript" language="javascript">
<!--
function isDigit4(obj, starVal) {
  if (!/^[0-9]{4}$/.test(obj.value)) {
    alert('请输入日期类型的数字！');
    obj.value = starVal;
    //obj.focus();
  }
}
function isDigit5(obj, starVal) {
  if (/[\"\'\:\;\,\}]/.test(obj.value)) {
    alert('不能含 " \' : ; , } 最好别整特殊符号');
    obj.value = starVal;
    //obj.focus();
  }
}
//添加链接
function addKw(t){
  var par=document.getElementById('calendar_festival_'+t+'l');
  var newDiv=document.createElement('DIV');
  newDiv.innerHTML='<input type="text" name="calendar_festival_'+t+'l_date[]" size="4" onblur="isDigit4(this,\'\');" /> &raquo; <input type="text" name="calendar_festival_'+t+'l_name[]" size="10" onblur="isDigit5(this,\'\');" /> <a href="javascript:void(0)" onclick="removeKw(this,\''+t+'\');return false;" title="删除">删除</a> <input type="hidden" name="css[]" value="" />';
  par.insertBefore(newDiv, null);
}
//删除栏目
function removeKw(obj, type, id){
  if (arguments[1] && arguments[2]) {
    //判断阳历阴历
    if ($('style['+id+']')!=null){
      if($('style['+id+']').checked==true) {
        if(confirm('您选择了同时删除该节日匹配的风格文件，确定删除吗！？')){
          if (!/^[0-9]{4}$/.test(id)) {
            alert('参数ID错误！无法进行删除风格文件');
            return;
          }
          $('delcss_'+type+'l').value += type+''+id+'|';
        } else {
          return;
        }
      }
    }
  }

  var tar=obj.parentNode;
  var par=tar.parentNode;
  //if(confirm('确定删除此频道吗？！')){
    par.removeChild(tar);
  //}
}

-->
</script>

<iframe id="lastFrame" name="lastFrame" frameborder="0" style=" display:none;"></iframe>
<form action="?post=calendar" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="150" align="right">阴（农）历节日设置：</td>
      <td><div class="note" style=" margin-bottom:-1px;"><strong>阴（农）历节日已包含二十四节气：</strong><br />
小寒 &nbsp; 大寒 &nbsp; 立春 &nbsp; 雨水 &nbsp; 惊蛰 &nbsp; 春分 &nbsp; 清明 &nbsp; 谷雨 &nbsp; 立夏 &nbsp; 小满 &nbsp; 芒种 &nbsp; 夏至<br>
小暑 &nbsp; 大暑 &nbsp; 立秋 &nbsp; 处暑 &nbsp; 白露 &nbsp; 秋分 &nbsp; 寒露 &nbsp; 霜降 &nbsp; 立冬 &nbsp; 小雪 &nbsp; 大雪 &nbsp; 冬至</div>
<?php
function get_calendar($t) {
$text = '';
if ($fd = file_get_contents('writable/js/main.js')) {
  if (preg_match('/var[\s\n\r]+'.$t.'Ftv[\s\n\r]*\=[\s\n\r]*\{(.*)\}/isU', $fd, $md)) {
    $md[1] = preg_replace('/[\s\n\r\'\"]/', '', $md[1]);
    $lFtv = explode(',', $md[1]);
    if (is_array($lFtv) && count($lFtv) > 0) {
      foreach($lFtv as $vvvv) {
        list($key, $val) = explode(':', $vvvv);
        $lFtv_d = '';
        if (strstr($val, '*') || file_exists('readonly/css/festival/'.$t.''.$key.'')) {
          $val = trim($val, '*');
          $lFtv_d = '<input type="hidden" name="css[]" value="*" /><span class="grayword">（该节日配有风格，<input type="checkbox" id="style['.$key.']" value="'.$key.'" checked="checked" />删除时同时删除风格文件）</span>';
        } else {
          $lFtv_d = '<input type="hidden" name="css[]" value="" />';
        }
        $text .= '
<div><input type="text" name="calendar_festival_'.$t.'l_date[]" value="'.$key.'" size="4" onblur="isDigit4(this,\''.$key.'\');" /> &raquo; <input type="text" name="calendar_festival_'.$t.'l_name[]" value="'.$val.'" size="10" onblur="isDigit5(this,\''.$val.'\');" /> <a href="javascript:void(0)" onclick="removeKw(this,\''.$t.'\',\''.$key.'\');return false;" title="删除">删除</a> '.$lFtv_d.'</div>';
        unset($key, $val, $lFtv_d, $vvvv);
      }
    }
    unset($lFtv);
    return '
<form action="?post=calendar" method="post">
<div class="note" id="calendar_festival_'.$t.'l" style="height:128px; overflow:hidden;">
'.$text.'
</div>
<div id="calendar_festival_'.$t.'l_sub" style="display:none;">
  <button type="button" onclick="addKw(\''.$t.'\');">点此增加节日</button>
</div>
<div class="note" style=" margin-top:-11px; clear:both;">
  <a href="javascript:void(0)" onclick="$(\'calendar_festival_'.$t.'l\').style.height=\'auto\';$(\'calendar_festival_'.$t.'l_sub\').style.display=\'block\';this.parentNode.style.display=\'none\';return false;">展开︾</a>
</div>
  <input type="hidden" name="delcss" id="delcss_'.$t.'l" />
  <input type="hidden" name="type" value="'.$t.'" />
';
  }
}
}

echo get_calendar('l');
?>

</td>
    </tr>
    <tr>
      <td width="150">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" class="send2" style="border:none;">保存</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="calendar_festival" />
</form>
<p>&nbsp;</p>
<form action="?post=calendar" method="post">
  <table width="100%" border="0" cellspacing="5" cellpadding="0">
    <tr>
      <td width="150" align="right">阳（公）历节日设置：</td>
      <td>
<?php



echo get_calendar('s');

?>
</td>
    </tr>
    <tr>
      <td width="150">&nbsp;</td>
      <td style="padding-top:5px;"><button type="submit" class="send2" style="border:none;">保存</button></td>
    </tr>
  </table>
  <input type="hidden" name="act" value="calendar_festival" />
</form>
