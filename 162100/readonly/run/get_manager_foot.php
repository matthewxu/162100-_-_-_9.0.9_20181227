<?php
require ('authentication_manager.php');
?>
<?php
$title = '<a class="list_title_in">修改页脚</a>';
?>
<?php
if ($_GET['act'] == 'foot_index') {
  $title .= ' &gt; 首页页脚';
} else {
  $title .= ' &gt; 公用页脚';
  $_GET['act'] = 'foot';
}
?>
<h5 class="list_title"><?php echo $title; ?></h5>
<?php
if ($file = file_get_contents('writable/require/'.$_GET['act'].'.php')) {
  $file = preg_replace('/.*<\!--foot-->(.*)<\!--\/foot-->.*/is', '$1', $file);
  $file = str_replace('&', '&amp;', $file);
  $file = str_replace('<', '&lt;', $file);
  $file = str_replace('>', '&gt;', $file);
?>
<form action="?post=foot" method="post">
  <textarea name="content" rows="30" style="width:99%"><?php echo $file; ?></textarea>
  <br />
  <input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" /><br />
  <button name="submit" type="submit" class="send2" style="border:none;" onClick="javascript:return confirm('提交吗？请确定无误后再执行');">提交修改</button>
</form>
<?php
} else {
  echo '没有找到页脚模板文件！可能是参数传递错误。';
}
?>