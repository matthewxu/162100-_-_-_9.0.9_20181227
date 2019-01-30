<?php
@ini_set('display_errors', false);
@error_reporting(E_ERROR | E_WARNING | E_PARSE);
$_GET = array_map('htmlspecialchars', preg_replace('/[\r\n]+/', '', $_GET));


if (empty($_GET['xml_id']) || empty($_GET['xml_file'])){
  die('&#x53C2;&#x6570;&#x7F3A;&#x5931;&#x6216;&#x9519;&#x8BEF;&#xFF01;');
}

$content_t = '';
$err = '';
if (isset($_GET['xml_file']) && !empty($_GET['xml_file'])) {
  $_GET['xml_file'] = base64_decode($_GET['xml_file']);
  $_GET['xml_file'] = preg_replace('/(\.+\/)+/i', '', $_GET['xml_file']);
  if (file_exists($_GET['xml_file'])) {
    @ob_start();
    @ include ($_GET['xml_file']);
    $content_t .= @ob_get_contents();
    @ob_end_clean();
  } else {
    if (preg_match('/^https?\:\/\//i', $_GET['xml_file'])) {
      @ require ('readonly/function/read_file.php');

      if ($f=read_file($_GET['xml_file'])){
        if (function_exists('mb_detect_encoding')) {
          $cha=mb_detect_encoding($f, array('UTF-8','ASCII','EUC-CN','CP936','BIG-5','GB2312','GBK'));
        }
        if (!$cha) {
          if(preg_match('/<meta [^>]+charset=([\w\-]+)[^\>]*>/i',$f,$m)){
            $cha=$m[1];
          }  
        }
        if ($cha) {
          if(preg_match('/<meta [^>]+"description"[^>]+content="([^>\"]+)"[^>]*>/i', $f, $mm)){
            if(strtolower($cha)!='utf-8'){
              $mm[1]=iconv($cha,'utf-8',$mm[1]);
            }
            $content_t .= preg_replace('/[\'\"\>\<\n\r]+/','',$mm[1]);
          }
        }
      }
    } else {
      $err = '<br>&#x8BF7;&#x540E;&#x53F0;&#x5173;&#x95ED;&#x6B64;&#x6A21;&#x5757;&#x518D;&#x5F00;&#x542F;&#x8BD5;&#x8BD5;';
    }
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加载内容</title>
</head>
<body>
<code id="fr">
<!--<?php echo preg_replace('/<\!\-\-.*\-\->/sU', '', $content_t); ?>-->
</code>
<script type="text/javascript" language="JavaScript">
<!--
function addOther(){
  if (parent && parent!=self) {
    var par=parent.document.getElementById('<?php echo $_GET['xml_id']; ?>');
    var a=<?php echo isset($_GET['xml_a'])&&$_GET['xml_a']==1?1:0;?>;
    if(par!=null){
      var text=document.getElementById('fr').innerHTML.replace(/^[\s\n\r]*<\!\-\-|\-\->[\s\n\r]*$/g, '');
      text=text!=''?text:'&#x52A0;&#x8F7D;&#x5931;&#x8D25;&#xFF01;&#x6CA1;&#x53D6;&#x5230;&#x6570;&#x636E;&#x3002;<?php echo $err; ?>';
      if(a==1){
        par.innerHTML+=text;
      }else{
        par.innerHTML=text;
      }
    }
  }
}
if(document.all){
  window.attachEvent('onload',addOther);
}else{
  window.addEventListener('load',addOther,false);
}
-->
</script>
</body>
</html>