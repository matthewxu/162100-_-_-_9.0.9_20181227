<?php
header('Content-type:application/x-javascript');
//header('Cache-Control:no-cache,must-revalidate');
//header('Pragma:no-cache');

$GLOBALS['WEATHER_DATA'] = '../../../';
require ($GLOBALS['WEATHER_DATA'].'writable/set/set.php');

//$time['now'] = time() + floatval($web['time_pos']) * 3600;
//$time['date'] = gmdate("YmdHis", $time['now']);

?>

if(typeof(updateStamp) != 'undefined'){
  if (updateStamp < '<?php echo gmdate("YmdHis", time() + floatval($web['time_pos']) * 3600); ?>'){
    document.write("<iframe src=\"inc/update.php?type=<?php echo $_GET['type']; ?>\" style=\"display:none;\"></iframe>");
  }
}

