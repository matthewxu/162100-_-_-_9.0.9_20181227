<?php
//ob_start();
//@ ini_set('display_errors', false);

$GLOBALS['WEATHER_DATA'] = (basename(dirname($_SERVER['PHP_SELF'])) == 'weather' ? '../../' : '').'';
$GLOBALS['WEATHER_BORN'] = 0;

require ($GLOBALS['WEATHER_DATA'].'writable/set/set.php');
require ($GLOBALS['WEATHER_DATA'].'readonly/function/read_file.php');
require ($GLOBALS['WEATHER_DATA'].'readonly/function/write_file.php');
require ($GLOBALS['WEATHER_DATA'].'readonly/weather/getweather_step.php');

//$web['time_pos'] = isset($web['time_pos']) ? $web['time_pos'] : 8;
$web['weather_from'] = (!empty($_COOKIE['weatherfrom']) && is_dir($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$_COOKIE['weatherfrom'])) ? $_COOKIE['weatherfrom'] : $web['weather_from'];


require ($GLOBALS['WEATHER_DATA'].'readonly/weather/'.$web['weather_from'].'/getweather.php');




















?>