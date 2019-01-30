<?php


require_once('baiduapi.inc.php');

$baidu->setSession(null);

$next = $_GET['u'];
header('Location: ' . $next);