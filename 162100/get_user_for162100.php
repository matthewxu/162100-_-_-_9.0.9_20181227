<?php


@ header("content-type: text/html; charset=utf-8");

@ require ('writable/set/set.php');
@ require ('writable/set/set_sql.php');



$text = 'no';
if ((isset($_GET['username']) && !empty($_GET['username'])) && (isset($_GET['userkey']) && !empty($_GET['userkey']))) {
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$_GET['username'].'" LIMIT 1');
    if ($row = db_fetch($db, $result)) {
      if ($row['session_key'] == $_GET['userkey']) {
        $text = 'yes';
      }
      unset($row);
    }
    $result = NULL;
  }
  db_close($db);
}

echo $text;
die();

?>