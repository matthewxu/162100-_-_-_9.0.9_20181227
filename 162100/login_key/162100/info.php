<?php
    $key1 = '';
    $key2 = $session[0];
    $bar = '162100';
    $bar_name = $session[0];
    $bar_face = $session[5].'obj.php?title=face-'.urlencode($bar_name).'.gif';
    @ require ('login_key/tie.php');
if (!function_exists('read_file')) {
  @require ('readonly/function/read_file.php');
}


?>

<style>
#newinfo li { list-style:outside; margin-left:24px; }
</style>
<h5 class="list_title"><a class="list_title_in">来自<img src="readonly/images/<?php echo $bar; ?>.png" />的信息</a></h5>
<!--div class="column"-->
  <div class="column_title"><a href="http://info.162100.com/write.php" class="send" style="float:right;" target="_blank">我要发布</a>信 息 窗</div>
  <ul class="class" id="newinfo"><?php echo read_file($session[5].'get_newinfo_for162100.php'); ?></ul>
<!--/div-->
