<?php

$GLOBALS['WEATHER_DATA'] = '../../../';
@ require ('../../../writable/set/set.php');
@ require ('../../../writable/set/set_sql.php');

@ require ('../../../readonly/function/confirm_power.php');


define('POWER', confirm_power('../../../'));

if (POWER != 5) {
  die('&#x4F60;&#x4E0D;&#x5177;&#x5907;&#x7BA1;&#x7406;&#x5458;&#x6743;&#x9650;&#xFF01;');
}



//检查是不是已配置过
if(file_exists("setted.inc")){
@unlink("setted.inc");
    //echo '<meta charset="UTF-8">';
    //die("请先删除intall目录下setted.inc文件再进行配置<br /><span style='color:red'>如果已配置成功并发布到外网，请只保留API目录下文件，删除intall目录下和其他文件</span>");
}


if(!function_exists("curl_init")){
    echo "<h1>请先开启curl支持</h1>";
    echo "
        开启php curl函数库的步骤(for windows)<br />
        1).去掉windows/php.ini 文件里;extension=php_curl.dll前面的; /*用 echo phpinfo();查看php.ini的路径*/<br />
        2).把php5/libeay32.dll，ssleay32.dll复制到系统目录windows/下<br />
        3).重启apache<br />
        ";
    exit();
}
if($_POST){

    foreach($_POST as $k => $val){
        if(empty($val)){
            die("请填写$k");
        }
    }
    $_POST['storageType'] = "file";
    $_POST['host'] = "localhost";
    $_POST['user'] = "root";
    $_POST['password'] = "root";
    $_POST['database'] = "test";
    $_POST['scope'] = implode(",",$_POST['scope']);
    $_POST['errorReport'] = (boolean) $_POST['errorReport'];
    $setting = "<?php die('forbidden'); ?>\n";
    $setting .= json_encode($_POST);
    $setting = str_replace("\/", "/",$setting);
    $incFile = fopen("../API/comm/inc.php","w+") or die("请设置API\comm\inc.php的权限为可写（比如0777或0755）");
    if(fwrite($incFile, $setting)){
        echo "<meta charset='utf-8' />";
        echo "配置成功,<a href='../e/'>查看example</a><!--br /><span style='color:red'>如果已配置成功并发布到外网，请只保留API目录下文件，删除intall目录下和其他文件</span-->";

        fclose($incFile);
        fclose(fopen("setted.inc", "w"));
    }else{
        echo "Error";
    }
}else{
if (file_exists('../API/comm/inc.php') && ($f_li = file('../API/comm/inc.php'))) {
  $json=json_decode($f_li[1], true);
} else {
  $json=array();
}

    require_once("install.html");
}
?>