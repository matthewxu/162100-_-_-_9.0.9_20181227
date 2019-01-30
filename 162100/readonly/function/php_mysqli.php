<?php

//连接数据库
if (!function_exists('db_conn')) {
  function db_conn() {
    global $sql;
    $test = $sql;
    unset($test['pass'], $test['data']);
    if (in_array('', $test)) {
      $sql['db_err'] = '<div style="text-align:center"><p>&#25968;&#25454;&#24211;&#36830;&#25509;&#19981;&#25104;&#21151;&#65281;</p>'.db_err_text().'</div>';
      return false;
    }
    unset($test);
    /*
    //面向对象模式
    $db = new mysqli($sql['host'], $sql['user'], $sql['pass'], $sql['name'], $sql['port']);
    $db->set_charset($sql['char']);
    if ($db->connect_errno) {
      $sql['db_err'] = '<div style="text-align:center"><p>'.mysqli_connect_errno($db).''.mysqli_connect_error($db).'<br />&#25968;&#25454;&#24211;['.$sql['host'].':'.$sql['port'].'->'.$sql['name'].']&#36830;&#25509;&#19981;&#25104;&#21151;&#65281;</p>'.db_err_text().'</div>';
      return false;
    }
    $sql['db_err'] = '';
    return $db;
    */
    if ($db = @mysqli_connect($sql['host'], $sql['user'], $sql['pass'], $sql['name'], $sql['port'])) {
      if (function_exists('mysqli_set_charset')) {
        mysqli_set_charset($db, $sql['char']);
      }
      $sql['db_err'] = '';
      return $db;
    } else {
      if (@mysqli_connect_errno($db)) {
        $sql['db_err'] = '<div style="text-align:center"><p>'.mysqli_connect_errno($db).''.mysqli_connect_error($db).'<br />&#25968;&#25454;&#24211;['.$sql['host'].':'.$sql['port'].'->'.$sql['name'].']&#36830;&#25509;&#19981;&#25104;&#21151;&#65281;</p>'.db_err_text().'</div>';
      }
      return false;
    }
  }
}

function db_conn_temp($host, $port, $user, $pass, $char) {
  global $sql;
  if ($db = @mysqli_connect($host, $user, $pass, '', $port)) {
    if (function_exists('mysqli_set_charset')) {
      mysqli_set_charset($db, $char);
    }
    $sql['db_err'] = '';
    return $db;
  } else {
    if (@mysqli_connect_errno($db)) {
      $sql['db_err'] = mysqli_connect_errno($db).''.mysqli_connect_error($db);
    }
    return false;
  }
}

function db_query($db, $comm) {
  global $sql;
  //$result = $db->query($comm);
  //if ($db->errno) {
  //  $sql['db_err'] .= $db->errno.':'.$db->error;
  //}
  //return $result;
  $result = @mysqli_query($db, $comm);
  if (mysqli_errno($db)) {
    $sql['db_err'] = mysqli_errno($db).''.mysqli_error($db);
  }
  return $result;

}

function db_fetch($db, $result) {
  global $sql;
  //$row = $result->fetch_assoc();
  //if ($db->errno) {
  //  $sql['db_err'] .= $db->errno.':'.$db->error;
  //}
  //return $row;
  $row = @mysqli_fetch_assoc($result);
  if (mysqli_errno($db)) {
    $sql['db_err'] = mysqli_errno($db).''.mysqli_error($db);
  }
  return $row;
}

function db_exec($db, $comm) {
  global $sql;
  //$result = $db->query($comm);
  //if ($db->errno) {
  //  $sql['db_err'] .= $db->errno.':'.$db->error;
  //}
  //if (preg_match('/^\s*(INSERT|REPLACE|UPDATE|DELETE)/i', $comm)) {
  //  $n = $db->affected_rows;
  //  return $n > 0 ? $n : 0;
  //}
  $result = @mysqli_query($db, $comm);
  if (mysqli_errno($db)) {
    $sql['db_err'] = mysqli_errno($db).''.mysqli_error($db);
  }
  if (preg_match('/^\s*(INSERT|REPLACE|UPDATE|DELETE)/i', $comm)) {
    $n = @mysqli_affected_rows($db);
    return $n > 0 ? $n : 0;
  }
  return $result;
}

function db_close($db) {
  global $sql, $persistent;
  if (!isset($persistent)) {
    //return $db->close();
    @mysqli_close($db);
    unset($sql['db_err']);
  }
}

function db_version($db) {
  return mysqli_get_server_info($db);
}

function db_escape_string($db, $text) {
  return '\''.mysqli_real_escape_string($db, $text).'\'';
}

function db_err_text() {
  return '<div id="db_err_text" style="background-color:#EEEEEE; font-size:12px; padding:10px;"><h2><center>&#x5B9E;&#x73B0;&#x6570;&#x636E;&#x5E93;&#x8FDE;&#x63A5;&#x2014;&#x2014;</center></h2>
<p><strong>&#x5982;&#x679C;&#x4F60;&#x662F;&#x7BA1;&#x7406;&#x5458;&#x521D;&#x88C5;&#x7A0B;&#x5E8F;</strong>&#xFF0C;<a href="webmaster_central.php?get=sql">&#x8BF7;&#x70B9;&#x6B64;&#x767B;&#x9646;&#x540E;&#x53F0;</a>&#xFF0C;&#x5FC5;&#x987B;&#x6B63;&#x786E;&#x914D;&#x7F6E;&#x6570;&#x636E;&#x5E93;&#x5404;&#x53C2;&#x6570;&#x914D;&#x7F6E;&#x540E;&#xFF0C;&#x624D;&#x80FD;&#x8FD0;&#x884C;&#x3002;</p>
<p><strong>&#x5982;&#x679C;&#x4F60;&#x662F;&#x6765;&#x8BBF;&#x6D4F;&#x89C8;&#x8005;</strong>&#xFF0C;&#x8FD9;&#x53EF;&#x80FD;&#x662F;&#x6682;&#x65F6;&#x6027;&#x7684;&#x670D;&#x52A1;&#x5668;&#x969C;&#x788D;&#xFF0C;&#x4F60;&#x53EF;&#x4EE5;&#x7A0D;&#x5019;<a href="javascript:window.history.back();">&#x8FD4;&#x56DE;&#x518D;&#x8BD5;</a>&#xFF1B;&#x6216;&#x5411;&#x7AD9;&#x957F;&#x53CD;&#x9988;&#x3002;</p>
</div>';
}










?>