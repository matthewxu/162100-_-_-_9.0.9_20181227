<?php
require ('authentication_member.php');
?>
<?php
if (POWER > 0) {
  unset($text);
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {

    $result = db_query($db, 'SELECT memory_website FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
    $row = db_fetch($db, $result);
    $result = NULL;

    if (!empty($_GET['linkhttp']) && !empty($_GET['linkname'])) {
      @ require ('readonly/function/filter.php');

      $_GET['linkhttp'] = urldecode($_GET['linkhttp']);
      $_GET['linkname'] = urldecode($_GET['linkname']);

      $_GET['linkhttp'] = preg_replace('/^(https?:\/\/[^\/]+)\/?$/', '$1/', filter1($_GET['linkhttp']));
      $_GET['linkname'] = filter2($_GET['linkname']);

      $text = '<span><a href="'.$_GET['linkhttp'].'">'.$_GET['linkname'].'</a></span>';
      $text = $text.preg_replace('/<(li|span)><a [^>]*=\"'.preg_quote($_GET['linkhttp'], '/').'\".+<\/(li|span)>/iU', '', $row['memory_website']);
      //if (!empty($row['memory_website'])) {
        if (strlen($text) > 40000) {
          $text = substr($text, 0, 40000);
          $text = preg_replace('/<\/(li|span)>.*$/iU', '</(li|span)>', $text);
        }
      //}
      $text = addslashes($text);
      $eval = '';
    } else {
      if ($_GET['act'] == 'clear') {
        $text = '';
      }
      $eval = '<script> try { parent.$("mingz_").innerHTML = "<div class=\"output\">&#27983;&#35272;&#35760;&#24405;&#24050;&#32463;&#28165;&#38500;&#12290;</div>"; } catch (err) {} </script>';
    }
    if (isset($text)) {
      db_exec($db, 'UPDATE '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' SET memory_website="'.$text.'" WHERE username="'.$session[0].'" LIMIT 1');
    }
    die($eval);
    //err('OK', 'ok');
  }
  db_close($db);

}

?>