<?php
require ('authentication_member.php');
?>
<?php
@ require('writable/set/set_area.php');



if (!empty($_REQUEST['act'])) {
  list($column_id, $class_id) = @explode('_', $_REQUEST['act']);
  //if (@!array_key_exists($column_id, $web['area']))
  if (!isset($web['area'][$column_id]))
    err('<script> alert("频道参数出错！"); </script>');
  //if (!array_key_exists($class_id, $web['area'][$column_id]))
  if (!isset($web['area'][$column_id][$class_id]))
    err('<script> alert("栏目参数出错！"); </script>');

  $text = '';
  $mark = 0;
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    if ($result = db_query($db, 'SELECT class_title FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title NOT LIKE "栏目置顶%" AND class_title NOT LIKE "栏目头栏%" AND detail_title="" ORDER BY id')) {
      $text .= '
        var obj=parent.$(\'sitetitle\');
        obj.options.length=0;
';
      while ($row = db_fetch($db, $result)) {
	    $mark++;
        list($class_title, , ) = @explode('|', $row['class_title']);
        $text .= '
        var objOption=document.createElement("OPTION");
        objOption.value="'.urlencode($class_title).'_'.$mark.'";
        objOption.text="'.$class_title.'";
	    obj.options[obj.length]=objOption;
';
        unset($row, $class_title);
      }
    }
    $result = NULL;

  }
  db_close($db);

  err('<script> '.$text.' </script>');
}

















@ require ('readonly/function/read_file.php');



function read_reg($url,$reg){
  if(preg_match($reg,read_file($url),$m)){
	return $m[1];
  }
  return false;
}

function write_file_end($url,$v){
  if($fp=@fopen($url,'ab')){
    if(@fwrite($fp,$v)){
      @fclose($fp);
	  return true;
	}
  }else{
    if(@file_put_contents($url,$v,FILE_APPEND)){
	  return true;
    }
  }
  return false;
}


function filter($text) {
  $text = trim($text);
  $text = stripslashes($text);
  //$text = htmlspecialchars($text);
  $text = preg_replace('/[\r\n\'\"\s\<\>]+/', '', $text);
  $text = str_replace('|', '&#124;', $text);
  //$text = str_replace('/', '&#47;', $text);
  return $text;
}

$_POST['siteurl']=rtrim($_POST['siteurl'],'/');
$_POST['siteurl']=preg_replace('/[\s\r\n\"\'\^]+/','',$_POST['siteurl']);


echo '<span class="grayword">网址检测中…</span>';
@ob_flush();
@flush();


if($_POST['siteurl']==''){
  err('网址不能空！');
}
if(!preg_match('/^https?\:\/\//i',$_POST['siteurl'])){
  err('网址格式不对！请以http://或https://开头');
}
if(strlen($_POST['siteurl'])>200 || strlen($_POST['siteurl'])<13){
  err('网址长度是13-200字符！');
}
if($file=@file('writable/__temp__/newsite_list.txt')){
  if(preg_grep('/^'.preg_quote($_POST['siteurl'],'/').'/i',$file)){
    err('该网址已经提交！请等候审核');
  }
}
/*
if(!preg_match('/\.(com|cn|mobi|tel|asia|net|org|name|me|info|com\.cn|net\.cn|org\.cn|gov\.cn|cc|hk|biz|tv|公司|网络|中国)$/i',$_POST['siteurl'])){
  err('网址格式不对！请以.com .cn .mobi .tel .asia .net .org .name .me .info .com.cn .net.cn .org.cn .gov.cn .cc .hk .biz .tv .公司 .网络 .中国 结尾');
}
*/

$_POST['sitename']=preg_replace('/[\s\r\n\"\'\^]+/',' ',trim($_POST['sitename']));
if($_POST['sitename']==''){
  err('站名不能空！');
}
if(strlen($_POST['sitename'])>100 || strlen($_POST['sitename'])<3){
  err('站名长度是3-30字符（汉字为3字符），请尽量用汉字、数字、英文及下划线组成！');
}
echo '√<br />';

echo '<span class="grayword">频道、栏目检测中…</span> ';
@ob_flush();
@flush();


list($column_id,$class_id)=@explode('_',$_POST['siteclass']);
//if(@!array_key_exists($column_id,$web['area']))
if(!isset($web['area'][$column_id]))
  err('频道参数出错！');
//if(@!array_key_exists($class_id,$web['area'][$column_id]))
if(!isset($web['area'][$column_id][$class_id]))
  err('栏目参数出错！');

list($class_title,$class_title_mark)=@explode('_',$_POST['sitetitle']);
$class_title=filter(htmlspecialchars(urldecode($class_title)));
if(empty($class_title)){
  err('分类不能空！');
}
if(empty($class_title_mark) || !is_numeric($class_title_mark)){
  err('分类序号出错！');
}
echo '√<br />';

echo '<span class="grayword">邮箱检测中…</span> ';
@ob_flush();
@flush();


$_POST['email']=preg_replace('/[\s\r\n]+/','',$_POST['email']);
if($_POST['email']==''){
  err('email不能留空！');
}
if(!preg_match('/^[\w\.\-]+@[\w\.\-]+$/',$_POST['email'])){
  err('email填：xxx@xxx.xxx(.xx) 格式');
}
echo '√<br />';

echo '<span class="grayword">验证码检测…</span> ';
@ob_flush();
@flush();


if(isset($_COOKIE['regimcode'])){
  if($_POST['imcode']=='')
    err('验证码不能留空！');
  if($_POST['imcode']!=$_COOKIE['regimcode'])
    err('验证码不符！');
}
echo '√<br />';

echo '<span class="grayword">正抓取网站…</span> ';
@ob_flush();
@flush();

if(!$yoursitetitle=read_reg($_POST['siteurl'],'/<title>(.+)<\/title>/isU')){
  err('系统尝试连接你的网址：'.$_POST['siteurl'].'失败！请确定网址无误及网络正常');
}

if (function_exists('mb_detect_encoding')) {
  $cha=mb_detect_encoding(read_file($_POST['siteurl']) , array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
}
if (!$cha) {
  $cha=read_reg($_POST['siteurl'],'/charset[\s\r\n]*=[\s\r\n\'\"]*([\w\-]+)[^\>]*>/i');
}
if ($cha) {
  //$cha=preg_replace('/[\"\']+/', '', $cha);
  if(strtolower($cha)!='utf-8'){
    $yoursitetitle=iconv($cha,'utf-8',$yoursitetitle);
  }
  if(!preg_match('/'.preg_quote($_POST['sitename'],'/').'/i',$yoursitetitle)){
    err('系统抓取你的网站标题为：'.htmlspecialchars($yoursitetitle).'，并未包含：'.$_POST['sitename'].'，提交被拒绝');
  }
}
unset($yoursitetitle);
echo '√<br />';


/*
$website = preg_replace('/https?\:\/\//i', '', $_POST['siteurl']);

echo '<span class="grayword">网站Alexa排名检测中…</span> ';
@ob_flush();
@flush();

function getAlexaRank($Domain) {
  $alexa = '<span class="blueword">无</span>';
  $data = "";
  $URL = "http://data.alexa.com/data/?cli=10&dat=snba&ver=7.0&url=".$Domain;
  $fp = @fopen($URL, "r");
  if ($fp){
    while (!@feof($fp)) {
      $data .= @fgets($fp);
    }
    $p = @xml_parser_create();
    @xml_parse_into_struct($p, $data , $vals);
    @xml_parser_free($p);
    for ($i = 0; $i < count($vals); $i++) {
      if ($vals[$i]["tag"] == "POPULARITY") {
        $alexa = '<span class="redword">'.$vals[$i]["attributes"]["TEXT"].'</span>';    
      }
    }
  }
  return $alexa;
}

$alexa = getAlexaRank(urlencode($website));
echo ''.$alexa.'<br />';


echo '<span class="grayword">百度收录检测中…</span> ';
@ob_flush();
@flush();


$shoulu = read_reg('http://www.baidu.com/s?ie=utf-8&word=site%3A'.urlencode($website).'','/('.preg_quote($website, '/').'\/(\s|&nbsp;)+)/is');

if($shoulu){
  echo '首页已收录<br />';
}else{
  echo '首页未收录<br />';
}
unset($website);
*/
/*
if ((abs($alexa) > 0 && abs($alexa) <= 20000) && $shoulu) {
  $eval = '
  $result = db_query($db, \'SELECT http_name_style FROM '.$sql['pref'].''.$sql['data']['承载网址数据的表名'].' WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.$_POST['sitetitle'].'|%" AND detail_title="" LIMIT 1\');
  $row = db_fetch($db, $result);
  $result = NULL;
  $new_line = preg_replace("/".preg_quote($_POST["siteurl"], "/")."[^\n]+\|\n/iU", "", $row["http_name_style"]);
  $new_line = $new_line.$_POST["siteurl"]."|".$_POST["sitename"]."||\n";
  db_exec($db, \'UPDATE `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` SET http_name_style="\'.addslashes($new_line).\'" WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.$_POST['sitetitle'].'|%" AND detail_title=""\');
@ require (\'readonly/function/write_file.php\');
  $_GET["column_id"] = $column_id;
  $_GET["class_id"] = $class_id;
  reset_indexhtml("class.php", $web["area"][$_GET["column_id"]]["name"][1]."_".$web["area"][$_GET["column_id"]][$_GET["class_id"]][1].".html");

  if ($_POST["mailto"] == 1) {

    @ require ('writable/set/set_mail.php');
    $web[\'mailer\'] = !isset($web[\'mailer\']) ? 0 : abs($web[\'mailer\']);
    $web[\'smtpsecure\'] = !isset($web[\'smtpsecure\']) ? '' : ($web[\'smtpsecure\']==\'ssl\'?\'ssl\':\'\');
    $mailerboty = array(0=>'readonly/function/mail_class.php', 1=>'PHPMailer-master/index.php');

    if (@file_exists($mailerboty[$web['mailer']])) {

      $mailarr[\'subject\'] = "恭喜：您网站的收录请求已经通过";
      $mailarr[\'content\'] = \'　　您于".gmdate("Y-m-d H:i:s", time() + (floatval($web["time_pos"]) * 3600))."向<a href="'.$web['path'].'" target="_blank">'.$web['sitename2'].'</a>提交的网站['.$_POST['siteurl'].' - '.$_POST['sitename'].']已通过审核，成功被收录。<br />　　收录页面为：<a href="'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'" target="_blank">'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'</a>及<a href="'.$web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html" target="_blank">'.$web['area'][$_GET['column_id']]['name'][1].'_'.$web['area'][$_GET['column_id']][$_GET['class_id']][1].'.html</a><br />　　在此也欢迎光临<a href="'.$web['path'].'" target="_blank">'.$web['sitename'].'</a>\';

      if ($web['mailer'] == 0) {
        $mailarr['subject'] = "=?UTF-8?B?".base64_encode($mailarr['subject'])."?="; //此行解决utf-8编码邮件标题乱码
      }
      @ require ($mailerboty[$web['mailer']]);
      mailer_send($_POST["email"]);
    }
  }
  $new10 = array();
  $new10_file = (array)@file(\'writable/require/newsite10.txt\');
  $new10[] = "<li>[<a href=\"class.php?column_id=".$column_id."&class_id=".$class_id."\">".$web["area"][$column_id][$class_id][0]."</a>] <a href=\"".$_POST["siteurl"]."\">".$_POST["sitename"]."</a></li>\n";
  $new10 = @array_merge($new10, $new10_file);
  $new10 = @array_unique($new10);
  $new10 = @array_filter($new10);
  $new10 = @array_slice($new10, 0, 10);
  write_file(\'writable/require/newsite10.txt\', @implode(\'\', $new10));

  ';
}
*/

$text=array();
if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] == '') {
  echo '<span class="grayword">分类检测中…</span> ';
  @ob_flush();
@flush();

  $result = db_query($db, 'SELECT COUNT(id) AS total FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE column_id="'.$column_id.'" AND class_id="'.$class_id.'" AND class_title LIKE "'.$class_title.'|%" AND detail_title=""');
  $row = db_fetch($db, $result);
  if(abs($row['total']) == 0) {
    err('分类'.$class_title.'不存在！');
  }
  unset($row);
  $result = NULL;
  echo '√<br />';

  if ($result=db_query($db, 'SELECT column_id,class_id,http_name_style FROM `'.$sql['pref'].''.$sql['data']['承载网址数据的表名'].'` WHERE http_name_style LIKE "%'.$_POST['siteurl'].'%" ORDER BY id')){
    echo '<span class="grayword">检测数据库首次提交该网址…</span> ';
    @ob_flush();
@flush();

    while($row=db_fetch($db, $result)){
      $text[]='<a href="class.php?column_id='.$row['column_id'].'&class_id='.$row['class_id'].'" target="_blank">['.$web['area'][$row['column_id']][$row['class_id']][0].']</a> ';
    }
    $text=array_unique($text);
    if(count($text)>0){
      err('你提交的网址数据库中已存在！请查看：'.@implode('',$text).'');
    }
    unset($text);
    echo '√<br />';
  }
  $result = NULL;
/*
  if (isset($eval)) {
    e            val($eval);
    err('恭喜！提交成功，你的网站已经被收录，地址为：<a href="'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'" target="_blank">'.$web['path'].'class.php?column_id='.$column_id.'&class_id='.$class_id.'</a>及<a href="'.$web['area'][$column_id]['name'][1].'_'.$web['area'][$column_id][$class_id][1].'.html" target="_blank">'.$web['area'][$column_id]['name'][1].'_'.$web['area'][$column_id][$class_id][1].'.html</a>。');
  }
*/
}
db_close($db);



$line=$_POST['siteurl']."^".$_POST['sitename']."^".$column_id."_".$class_id."^".urlencode($class_title)."_".$class_title_mark."^".$_POST['email']."^".gmdate('Y/m/d H:i:s',time()+(floatval($web['time_pos'])*3600))."\n";
if(write_file_end('writable/__temp__/newsite_list.txt',$line)){
  err('提交成功。请等候审核', 'ok');
}else{
  err('出现错误！写权限[目录：writable/__temp__]不足，请稍候再提交');
}


?>