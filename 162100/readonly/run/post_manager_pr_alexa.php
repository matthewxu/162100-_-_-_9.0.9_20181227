<?php
require ('authentication_manager.php');
?>
<?php


function read_reg($url,$reg){
  if(preg_match($reg,read_file($url),$m)){
	return $m[1];
  }
  return false;
}


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


if (POWER != 5) {
  err('<script> alert("该命令必须以基本管理员身份登陆！请重登陆"); </script>');
}

@ require ('readonly/function/read_file.php');


$website = preg_replace('/https?\:\/\//i', '', $_GET['siteurl']);
$website = preg_replace('/\/?$/i', '', $website);
$alexa = getAlexaRank(urlencode($website));
echo '<script> try{parent.$(\'site_'.urlencode($_GET['siteurl']).'\').innerHTML =\'Alexa:'.preg_replace('/[\r\n]+/', '', $alexa).' \';}catch(e){} </script>';

$shoulu = read_reg('http://www.baidu.com/s?ie=utf-8&word=site%3A'.urlencode($website).'', '/('.preg_quote($website, '/').'\/(\s|&nbsp;)+)/is');
echo '<script> try{parent.$(\'site_'.urlencode($_GET['siteurl']).'\').innerHTML+=\'首页:百度'.($shoulu ? '<span class="redword">已收录</span>' : '<span class="blueword">未收录</span>').'\';}catch(e){} </script>';
unset($website);

?>