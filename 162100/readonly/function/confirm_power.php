<?php

//判断登陆权限
//成员名|最后访问时间|KEY|上线|快捷登录入口标记|根目录
function confirm_power($path = './') {
  global $web, $session;
  if (isset($_COOKIE['usercookie'])) {
    //$_COOKIE['usercookie'] = preg_replace('/[\"\'\<\>\=]+/', '', $_COOKIE['usercookie']);
    if (!empty($_COOKIE['usercookie'])) {
      $session = @explode('|', $_COOKIE['usercookie']);
	  if (is_array($session)) {
	    $n = count($session);
        if ($n >= 7) {
		  
	      if (strstr($session[7], $web['root'])) {
            $get_162100_session = get_162100_session($path);
	        if (!$get_162100_session) {
              $session[4] = '162100';
              //$session[5] = $session[7];
	          $session[5] = preg_replace('/login_key(\/.*)?$/i', '', $session[7]);
              return 0.5;
		    } else {
              return $get_162100_session;
		    }
	      }
          return 0; //过客
		  
	    } elseif ($n >= 5) {
          if (isset($session[4]) && !empty($session[4])/* && array_key_exists($session[4], (array)$web['login_key'])*/) {
            return 0.5;
          }
          if ($session[0] != $web['manager']) {
            return 1; //成员
          } else {
            if (!($GLOBALS['session_key'] = get_session_key())) {
              $GLOBALS['session_key'] = substr(@file_get_contents($path.'writable/__temp__/'.urlencode($session[0]).'.php'), 15);
            }
            if (strlen($GLOBALS['session_key']) == 36 && $session[1].'|'.$session[2] == $GLOBALS['session_key']) {
              return 5; //基础管理员
            } else {
              $GLOBALS['session_err'] = ' <span class="redword">身份密钥已更改！请重新在此浏览器<a href="'.$path.'login.php" onclick="if(parent!=self)this.target=\'_blank\';">登陆</a>恢复。</span>';
              return 1; //成员
            }
          }
        } else {
	      return 0;
	    }
      }
	}
  }
  return 0;
}


function get_162100_session($path) {
  global $web, $sql, $session, $db;

  if (!function_exists('read_file')) {
    @ require ($path.'readonly/function/read_file.php');
  }
  $member_confirm = read_file($session[7].'/get_user_for162100.php?username='.urlencode($session[0]).'&userkey='.urlencode($session[1].'|'.$session[2]).'');
  if ((string)$member_confirm != 'yes') {
    return 0;
  }

  $cookie_time = time() + floatval($web['time_pos']) * 3600 + 31536000;
  if (!isset($sql['db_err'])) {
    $db = db_conn();
  }
  if ($sql['db_err'] == '') {
    $result = db_query($db, 'SELECT username,session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE login_key_162100="'.$session[0].'" LIMIT 1');
    if ($row = db_fetch($db, $result)) {
      setcookie('usercookie', '', time() - 366 * 60 * 60, '/');
      setcookie('usercookie', ''.$row['username'].'|'.$row['session_key'].'|'.$row['recommendedby'].'||'.$web['path'], $cookie_time, '/');
	  $session[0] = $row['username'];
	  list($session[1], $session[2]) = @explode('|', $row['session_key']);
	  $session[3] = $row['recommendedby'];
	  //$session[5] = $web['sitehttp'];
	  $session[5] = $web['path'];
	  
      if ($session[0] != $web['manager']) {
        return 1; //成员
      } else {
        if (!($GLOBALS['session_key'] = get_session_key())) {
          $GLOBALS['session_key'] = substr(@file_get_contents($path.'writable/__temp__/'.urlencode($session[0]).'.php'), 15);
        }
        if ($session[1].'|'.$session[2] == $GLOBALS['session_key']) {
          return 5; //基础管理员
        } else {
          $GLOBALS['session_err'] = ' <span class="redword">身份密钥已更改！请重新在此浏览器<a href="'.$path.'login.php" onclick="if(parent!=self)this.target=\'_blank\';">登陆</a>恢复。</span>';
          return 1; //成员
        }
      }
    }
    $result = NULL;
  } else {
    //echo $sql['db_err'];
  }
  //@mysql_close($db);
  return 0;
}

function get_session_key() {
  global $web, $sql, $session, $db;
  if (!isset($GLOBALS['session_key']) || !$GLOBALS['session_key']) {
    $GLOBALS['session_key'] = false;
    if (!isset($sql['db_err'])) {
      $db = db_conn();
    }
    if ($sql['db_err'] == '') {
      $result = db_query($db, 'SELECT session_key FROM '.$sql['pref'].''.$sql['data']['承载成员档案的表名'].' WHERE username="'.$session[0].'" LIMIT 1');
      if ($row = db_fetch($db, $result)) {
        $GLOBALS['session_key'] = $row['session_key'];
      }
      $result = NULL;
    } else {
      //echo $sql['db_err'];
    }
    //@mysql_close($db);
  }
  return $GLOBALS['session_key'];
}

//获取ip
function user_ip() {
    if(getenv('HTTP_CLIENT_IP')){
      $ip=getenv('HTTP_CLIENT_IP'); 
    }elseif(getenv('HTTP_X_FORWARDED_FOR')){
      $ip=getenv('HTTP_X_FORWARDED_FOR');
    }elseif(getenv('HTTP_X_FORWARDED')){ 
      $ip=getenv('HTTP_X_FORWARDED');
    }elseif(getenv('HTTP_FORWARDED_FOR')){
      $ip=getenv('HTTP_FORWARDED_FOR'); 
    }elseif(getenv('HTTP_FORWARDED')){
      $ip=getenv('HTTP_FORWARDED');
    }elseif($_SERVER['REMOTE_ADDR']=str_replace('::1', '', $_SERVER['REMOTE_ADDR'])){ 
      $ip=$_SERVER['REMOTE_ADDR'];
    }else{ 
      $ip = @file_get_contents('http://www.162100.com/readonly/weather/ip.php');
    }
    return preg_match('/^\d+\.\d+\.\d+\.\d+$/', $ip) ? $ip : '';
}

?>