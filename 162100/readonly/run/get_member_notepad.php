<?php
require ('authentication_member.php');
?>
<style type="text/css">
<!--
#barl { text-align:right; margin-bottom:2px; }
#content { float:left; padding:0; width:100%; height:270px; overflow:auto; overflow-y:auto; overflow-x:hidden; font-size:14px; border:none; line-height:30px; background:url(readonly/images/img_mzline.gif); color:blue; }
-->
</style>


<script language="javascript" type="text/javascript">
<!--
<?php

if (POWER > 0.5) {
  echo '
  var userP=1;
  var maxWordCount=50000; //最多字数限制
  ';
  $notepadText = preg_replace("/\r/", "", get_notepad_text());
  $userPower = '您已登陆，';
  $userPower .= ($session[1].'|'.$session[2] == $GLOBALS['session_key']) ? '欢迎使用在线记事本！' : '<b class="redword">但身份密钥不符，你需要重登陆验证！否则无法保存！[<a href="member.php?post=login&act=logout" target="_self">退出</a>]</b>';
  if ($notepadText != '') {
    $eval_js = 'document.getElementById(\'content\').focus();';
  }
} else {
  echo '
  var userP=0;
  var maxWordCount=500; //最多字数限制
  ';
  $userPower = 'GUEST，欢迎使用在线记事本！若登陆则不限字数，并可永久保存。否则Cookie保存 ';
  $notepadText = preg_replace("/\r/", "", $_COOKIE['myNotepad']);
}

function get_notepad_text() {
  global $web, $sql, $db, $session;
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT notepad,session_key FROM `'.$sql['pref'].''.$sql['data']['承载成员档案的表名'].'` WHERE username="'.$session[0].'" LIMIT 1');
    $row = db_fetch($db, $result);
    $GLOBALS['session_key'] = $row['session_key'];
    $result = NULL;
  }
  db_close($db);
  return $row['notepad'] ? $row['notepad'] : $_COOKIE['myNotepad'];
}
?>
-->
</script>

<iframe id="lastFrame" name="lastFrame" frameborder="0" style="display:none"></iframe>
<div class="note" id="barl"><div style="float:left"><?php echo $userPower; ?></div><font id="max_words" class="redword"></font> [<a href="#" onclick="document.getElementById('content').value='';document.getElementById('content').focus();return false;">清空</a>]</div>

<form id="notepad_form" name="notepad_form" method="post" action="readonly/run/post_member_notepad.php" target="lastFrame">
<!--
<textarea name="content" id="content" onblur="save(this.value)"><?php //echo $notepadText; ?></textarea>
-->
<textarea name="content" id="content" onpropertychange="save(this.value)" oninput="save(this.value)"><?php echo $notepadText; ?></textarea>

<input type="submit" style="display:none" />
</form>

<script language="javascript" type="text/javascript">
<!--
function save(v){
  //v=v.replace(/^[\s\n\r]+|[\s\n\r]+$/g,'');
  v=v.replace(/</g,'&lt;');
  v=v.replace(/>/g,'&gt;');
  v=v.replace(/\"/g,'&quot;');
  v=v.replace(/\'/g,'&#039;');
  v=v.replace(/\\/g,'&#92;');
  //v=v.replace(/\r\n/g,"\n");
  v=v.replace(/\r/g,"");
  v=v.substr(0,500);
  setCookie('myNotepad',v,365);
  if(userP==1){
    document.notepad_form.submit();
  }
}

/*
另一种方式
function confirmWho(v){
  runGetWordCount();
  // onpropertychange="confirmWho(this.value)" oninput="confirmWho(this.value)"
  //document.getElementById("lastFrame").src='notepad_save.php?designer='+encodeURI(v)+'';
}
function runGetWordCount(){
  document.getElementById('max_words').innerHTML='字数'+document.getElementById('content').value.length+' 限'+maxWordCount+'';
}
*/
function runGetWordCount(){
  var calcCountTimer;
  var nowM=document.getElementById('content').value.length;
  var errM=nowM>maxWordCount?' style="color:#FF6600">保留':'>';
  document.getElementById('max_words').innerHTML='字数'+nowM+' <font'+errM+'限'+maxWordCount+'字</font> ';
  if(calcCountTimer){
    window.clearTimeout(calcCountTimer);
  }
  calcCountTimer=setTimeout('runGetWordCount()',1000);
}


runGetWordCount();
<?php echo $eval_js; ?>

$('content').focus();


-->
</script>
