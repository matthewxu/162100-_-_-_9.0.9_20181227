<?php
ini_set('display_errors', false);

if (!file_exists('API/comm/inc.php') || filesize('API/comm/inc.php') == 0) {
  //die('<a href="../../webmaster_central.php?get=set#login_key">&#x4F60;&#x8FD8;&#x6CA1;&#x6709;&#x914D;&#x7F6E;&#x53C2;&#x6570;&#xFF01;</a>');
}









require_once("./API/qqConnectAPI.php");
$qc = new QC();
$qc->qq_login();












?>