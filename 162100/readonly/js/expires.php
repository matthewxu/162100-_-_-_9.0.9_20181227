<?php
header('Content-type:application/x-javascript');
?>

if(typeof(nowVersion)!='undefined' && nowVersion!='<?php @ include('../../writable/require/browse_reload.txt'); ?>'){

  $('addCFrame').src='webmaster_central.php?post=browse_reload';



  //document.cookie='myStyle=; path=/;';
  location.reload(true);
}

