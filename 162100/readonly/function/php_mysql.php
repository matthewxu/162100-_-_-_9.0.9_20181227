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
    if ($db = @mysql_connect($sql['host'].':'.$sql['port'], $sql['user'], $sql['pass'])) {
      if (@mysql_select_db($sql['name'], $db)) {
        @mysql_query('SET NAMES '.$sql['char'].'');
        $sql['db_err'] = '';
        return $db;
      } else {
        $sql['db_err'] = '<div style="text-align:center"><p>'.mysql_errno($db).''.mysql_error($db).'<br />&#25968;&#25454;&#24211;['.$sql['name'].']&#36830;&#25509;&#19981;&#25104;&#21151;&#65281;</p>'.db_err_text().'</div>';
        return false;
      }
    } else {
      $sql['db_err'] = '<div style="text-align:center"><p>'.mysql_errno().''.mysql_error().'<br />&#25968;&#25454;&#24211;&#26381;&#21153;&#22120;['.$sql['host'].':'.$sql['port'].']&#36830;&#25509;&#19981;&#25104;&#21151;&#65281;</p>'.db_err_text().'</div>';
      return false;
    }
  }
}

function db_conn_temp($host, $port, $user, $pass, $char) {
  global $sql;
  if ($db = @mysql_connect($host.':'.$port, $user, $pass)) {
    @mysql_query('SET NAMES '.$char.'');
    $sql['db_err'] = '';
    return $db;
  } else {
    if (mysql_errno()) {
      $sql['db_err'] = mysql_errno().''.mysql_error();
    }
    return false;
  }
}

function db_query($db, $comm) {
  global $sql;
  $result = @mysql_query($comm, $db);
  //$result = @mysql_unbuffered_query($comm, $db);
  if (mysql_errno($db)) {
    $sql['db_err'] = mysql_errno($db).''.mysql_error($db);
  }
  return $result;
}

function db_fetch($db, $result) {
  global $sql;
  $row = @mysql_fetch_assoc($result);
  if (mysql_errno($db)) {
    $sql['db_err'] = mysql_errno($db).''.mysql_error($db);
  }
  return $row;
}

function db_exec($db, $comm) {
  global $sql;
  $result = @mysql_query($comm, $db);
  if (mysql_errno($db)) {
    $sql['db_err'] = mysql_errno($db).''.mysql_error($db);
  }
  if (preg_match('/^\s*(INSERT|REPLACE|UPDATE|DELETE)/i', $comm)) {
    $n = @mysql_affected_rows($db);
    return $n > 0 ? $n : 0;
  }
  return $result;
}

function db_close($db) {
  global $sql, $persistent;
  if (!isset($persistent)) {
    @mysql_close($db);
    unset($sql['db_err']);
  }
}

function db_version($db) {
  return mysql_get_server_info($db);
}

function db_escape_string($db, $text) {
  return '\''.mysql_real_escape_string($text, $db).'\'';
}

function db_err_text() {
  return '<div id="db_err_text" style="background-color:#EEEEEE; font-size:12px; padding:10px;"><h2><center>&#x5B9E;&#x73B0;&#x6570;&#x636E;&#x5E93;&#x8FDE;&#x63A5;&#x2014;&#x2014;</center></h2>
<p><strong>&#x5982;&#x679C;&#x4F60;&#x662F;&#x7BA1;&#x7406;&#x5458;&#x521D;&#x88C5;&#x7A0B;&#x5E8F;</strong>&#xFF0C;<a href="webmaster_central.php?get=sql">&#x8BF7;&#x70B9;&#x6B64;&#x767B;&#x9646;&#x540E;&#x53F0;</a>&#xFF0C;&#x5FC5;&#x987B;&#x6B63;&#x786E;&#x914D;&#x7F6E;&#x6570;&#x636E;&#x5E93;&#x5404;&#x53C2;&#x6570;&#x914D;&#x7F6E;&#x540E;&#xFF0C;&#x624D;&#x80FD;&#x8FD0;&#x884C;&#x3002;</p>
<p><strong>&#x5982;&#x679C;&#x4F60;&#x662F;&#x6765;&#x8BBF;&#x6D4F;&#x89C8;&#x8005;</strong>&#xFF0C;&#x8FD9;&#x53EF;&#x80FD;&#x662F;&#x6682;&#x65F6;&#x6027;&#x7684;&#x670D;&#x52A1;&#x5668;&#x969C;&#x788D;&#xFF0C;&#x4F60;&#x53EF;&#x4EE5;&#x7A0D;&#x5019;<a href="javascript:window.history.back();">&#x8FD4;&#x56DE;&#x518D;&#x8BD5;</a>&#xFF1B;&#x6216;&#x5411;&#x7AD9;&#x957F;&#x53CD;&#x9988;&#x3002;</p>
</div>';
}



?>