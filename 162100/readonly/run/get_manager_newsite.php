<?php
require ('authentication_manager.php');
?>
<?php
@ require ('writable/set/set_area.php');
$text = '';

$file = @file('writable/__temp__/newsite_list.txt');
if (is_array($file) && count($file) > 0) {
  foreach ($file as $key => $line) {
    $row = @explode('^', $line);
	$text .= '
    <tr>
    <td width="12"><input name="id[]" id="id[]" type="checkbox" class="checkbox" value="'.$key.'" /></td>
    <td><input type="hidden" name="siteurl['.$key.']" value="'.$row[0].'" /><a href="'.$row[0].'" target="_blank">'.$row[0].'</a><br />
<a href="?post=pr_alexa&siteurl='.urlencode($row[0]).'" target="lastFrame" style="font-family:宋体;font-size:12px;background-color:#EFEFEF;color:#FF9900;" id="site_'.urlencode($row[0]).'" onclick="this.innerHTML=\'检测中…\';">Alexa排名、百度收录检测</a></td>
    <td width="120"><input type="text" style="width:110px" name="sitename['.$key.']" value="'.$row[1].'" /></td>
    <td width="80"><input type="hidden" style="width:20px" name="siteclass['.$key.']" value="'.$row[2].'" /><input type="hidden" name="sitetitle['.$key.']" value="'.gettitle($row[3]).'" />'.getclass($row[2]).'&gt;'.gettitle_($row[3]).'</td>
    <td width="150"><input type="hidden" name="email['.$key.']" value="'.$row[4].'" />'.$row[4].'</td>
    <td width="80"><input type="hidden" name="date['.$key.']" value="'.trim($row[5]).'" />'.$row[5].'</td>
    </tr>';
    unset($row);
  }
}

function gettitle($v) {
  list($class_title, $class_title_mark) = @explode('_', $v);
  if ($class_title_mark && is_numeric($class_title_mark)) {
    return $v;
  } else {
    return urlencode($v);
  }
}
function gettitle_($v) {
  list($class_title, $class_title_mark) = @explode('_', $v);
  if ($class_title_mark && is_numeric($class_title_mark)) {
    return urldecode($class_title);
  } else {
    return $class_title;
  }
}


function getclass($v) {
  global $web;
  list($column_id, $class_id) = @explode('_', $v);
  return ''.$web['area'][$column_id]['name'][0].'&gt;<a href="class.php?column_id='.$column_id.'&class_id='.$class_id.'" target="_blank">'.$web['area'][$column_id][$class_id][0].'</a>';
}
?>


<!--h5 class="list_title"><a class="list_title_in">网站收录审核</a></h5-->
<div class="note">注：该功能显示在首页边栏为“新录网站”。</div>

<iframe id="lastFrame" name="lastFrame" style="display:none;"></iframe>
<form action="?post=newsite" method="post">
  <table width="100%" border="0" cellpadding="0" cellspacing="1" id="ad_table">
    <tr>
      <th width="12">&nbsp;</th>
      <th>网址</th>
      <th width="80">站名</th>
      <th width="120">类别</th>
      <th width="150">站长邮箱</th>
      <th width="80">提交日期</th>
    </tr>
    <?php echo !empty($text) ? $text : '
    <tr>
      <td width="12">&nbsp;</td>
      <td>暂无数据！</td>
      <td width="120">&nbsp;</td>
      <td width="80">&nbsp;</td>
      <td width="150">&nbsp;</td>
      <td width="80">&nbsp;</td>
    </tr>'; ?>
  </table>
  <a href="void(0)" onClick="javascript:allChoose('id[]',1,1);return false;">全选</a>- <a href="void(0)" onClick="javascript:allChoose('id[]',1,0);return false;">反选</a>- <a href="void(0)" onClick="javascript:allChoose('id[]',0,0);return false;">不选</a> <button name="act" type="submit" onclick="return chk(this.form,this,'del');">删除</button>
  <input name="limit" type="hidden" />
  <input type="checkbox" class="checkbox" name="mailto" value="1" checked="checked" />
  审批通过群发邮件通知（注：若发邮件，一次性点选不要太多）<br />

  
  <button name="act2" type="submit" class="send2" style="border:none;" onclick="return chk(this.form,this,'pass');">通过</button>
  <button type="button" class="send2" style="border:none;" onclick="location.href='?get=modify&otherfile=<?php echo get_en_url('writable/require/newsite10.txt'); ?>'">编辑最新收录前10条（首页，随着审核通过自动显示的）</button>
</form>
