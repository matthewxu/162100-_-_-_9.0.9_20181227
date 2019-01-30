<?php

if (!function_exists('fsockopen')) {
  if (!function_exists('pfsockopen')) {
    if (!function_exists('stream_socket_client')) {
      function f_sockopen($hostname, $port, $errno, $errstr, $timeout) {
        echo '系统不支持函数fsockopen及替代函数pfsockopen、stream_socket_client！';
        return false;
      }
    } else {
      function f_sockopen($hostname, $port, $errno, $errstr, $timeout) {
        return stream_socket_client($hostname.':'.$port, $errno, $errstr, $timeout);
      }
    }
  } else {
    function f_sockopen($hostname, $port, $errno, $errstr, $timeout) {
      return pfsockopen($hostname, $port, $errno, $errstr, $timeout);
    }
  }
} else {
  function f_sockopen($hostname, $port, $errno, $errstr, $timeout) {
    return fsockopen($hostname, $port, $errno, $errstr, $timeout);
  }
}


@ set_time_limit(120);  //若配置为 0 则不限定最久时间
class smtp {
/* Public Variables */ 
var $smtp_port;
var $time_out;
var $host_name;
var $relay_host;
var $auth;
var $user;
var $pass;
var $sender;
/* Private Variables */
var $sock;
/* Constractor */

function __construct($relay_host = '', $smtp_port = 25, $auth = false, $user, $pass, $sender) {
  $this -> smtp_port = $smtp_port;
  $this -> relay_host = $relay_host;
  $this -> time_out = 30; //is used in pfsockopen() 
  $this -> auth = $auth;//auth
  $this -> user = $user;
  $this -> pass = $pass;
  $this -> sender = $sender;
  $this -> host_name = "localhost"; //is used in HELO command
  $this -> sock = false;
}

/* Main Function */ 
function sendmail($to, $from, $subject = '', $body = '', $mailtype, $cc = '', $bcc = '', $additional_headers = '') {
  $sent = true; 
  
  $mail_from = $this -> get_address($this -> strip_comment($from)); 
  $body = preg_replace('/(^|(\r\n))(\.)/', '$1.$3', $body);
  $header .= "mime-version:1.0\r\n";
  if ($mailtype == "html") {
    $header .= "content-type:text/html; charset=utf-8\r\n"; //php_eol
  } 
  $header .= "to: ".$to."\r\n";
  if ($cc != "") {
    $header .= "cc: ".$cc."\r\n";
  } 
  //$header .= "from: $from<".$from.">\r\n";
  $header .= "from: ".$from."\r\n"; 
  $header .= "subject: ".$subject."\r\n";
  $header .= $additional_headers;
  $header .= "date: ".date("r")."\r\n";
  $header .= "x-mailer: 162100.com (php/".phpversion().")\r\n";
  list($msec, $sec) = explode(" ", microtime());
  $header .= "message-id: <".date("ymdhis", $sec).".".($msec * 1000000).".".$mail_from.">\r\n";
  $to_ = explode(",", $this -> strip_comment($to));
  if ($cc != "") {
    $to_ = array_merge($to_, explode(",", $this -> strip_comment($cc)));
  }
  if ($bcc != "") {
    $to_ = array_merge($to_, explode(",", $this -> strip_comment($bcc)));
  }

  foreach ($to_ as $rcpt_to) {
    $rcpt_to = $this -> get_address($rcpt_to);
    if (!$this -> smtp_sockopen($rcpt_to)) {
      $sent = $this -> smtp_error("Error: Cannot send email to ".$rcpt_to."<br />");
      continue; 
    } 
    if (!$this -> smtp_send($this -> host_name, $mail_from, $rcpt_to, $header, $body)) {
      $sent = $this -> smtp_error("Error: Cannot send email to <".$rcpt_to."><br />");
    }
    @fclose($sock);
  }
  return $sent;
} 


function smtp_send($helo, $from, $to, $header, $body = '') {
  if (!$this -> smtp_putcmd("HELO", $helo)) {
    return $this -> smtp_error("Error: Error occurred while sending HELO command<br />");
  }
  #auth 
  if($this -> auth){ 
    if (!$this -> smtp_putcmd("AUTH LOGIN", base64_encode($this -> user))) {
      return $this -> smtp_error("Error: Error occurred while sending AUTH command<br />");
    } 
    if (!$this -> smtp_putcmd("", base64_encode($this -> pass))) {
      return $this -> smtp_error("Error: Error occurred while sending AUTH command<br />"); 
    } 
  } 
  # 
  //if (!$this->smtp_putcmd("MAIL", "FROM:".$from."")) { 
  if (!$this -> smtp_putcmd("MAIL", "FROM:<".$this->sender.">")) {
    return $this -> smtp_error("Error: Error occurred while sending MAIL FROM command<br />");
  }
  if (!$this -> smtp_putcmd("RCPT", "TO:<".$to.">")) {
    return $this -> smtp_error("Error: Error occurred while sending RCPT TO command<br />");
  } 
  if (!$this -> smtp_putcmd("DATA")) {
    return $this -> smtp_error("Error: Error occurred while sending DATA command<br />");
  }
  if (!(fputs($this -> sock, $header."\r\n".$body))) {
    return $this -> smtp_error("Error: Error occurred while sending message<br />");
  }
  if (!(fputs($this -> sock, "\r\n.\r\n") && $this -> smtp_ok())) {
    return $this -> smtp_error("Error: Error occurred while sending <CR><LF>.<CR><LF> [EOM]<br />");
  }
  if (!$this -> smtp_putcmd("QUIT")) {
    return $this -> smtp_error("Error: Error occurred while sending QUIT command<br />");
  }
  return true; 
} 

function smtp_sockopen($address) {
  if ($this -> relay_host == "") {
    return $this -> smtp_sockopen_mx($address);
  } else {
    return $this -> smtp_sockopen_relay();
  }
} 

function smtp_sockopen_mx($address) {
  $domain = preg_replace('/^.+@([^@]+)$/', '$1', $address);
  if (!@getmxrr($domain, $MXHOSTS)) {
    return $this -> smtp_error("Error: Cannot resolve MX \"".$domain."\"<br />");
  }
  foreach ($MXHOSTS as $host) {
    $this -> sock = @f_sockopen($host, $this -> smtp_port, $errno, $errstr, $this -> time_out);
    if ($this -> sock && $this -> smtp_ok()) {
      return true;
    }
  }
  return $this -> smtp_error("Error: Cannot connect to any mx hosts (".implode(", ", $MXHOSTS).")<br />");
}

function smtp_sockopen_relay() {
  $this -> sock = @f_sockopen($this -> relay_host, $this -> smtp_port, $errno, $errstr, $this -> time_out);
  if ($this -> sock && $this -> smtp_ok()) {
    return true;
  }
  return $this -> smtp_error("Error: Cannot connenct to relay host ".$this -> relay_host."<br />"); //Error: ".$errstr." (".$errno.")
}

function smtp_ok() {
  $response = str_replace("\r\n", "", fgets($this -> sock, 512));
  //echo "response = ".$response."\r\n";
  //echo "ereg 23 == ".ereg("^[23]", $response)."\n";
  if (!ereg("^[23]", $response)) {
    //echo "@@@@@";
    fputs($this -> sock, "QUIT\r\n");
    fgets($this -> sock, 512);
    return $this -> smtp_error("Error: Remote host returned \"".$response."\"<br />");
  }
  return true;
}

function smtp_putcmd($cmd, $arg = '') {
  if ($arg != '') {
    if ($cmd == '') $cmd = $arg;
    else $cmd = $cmd.' '.$arg;
  }
  fputs($this -> sock, $cmd."\r\n");
  //echo "cmd=".$cmd."\r\n";
  return $this -> smtp_ok();
} 

function smtp_error($string) {
  echo $string;
  return false;
}

function strip_comment($address) {
  //$comment = "\([^()]*\)";
  //while (ereg($comment, $address)) {
    //$address = ereg_replace($comment, "", $address);
  //}
  return $address;
} 

function get_address($address) {
  //$address = preg_replace('/([\s\t\r\n])+/', '', $address);
  //$address = preg_replace('/^.*<(.+)>.*$/', '$1', $address);
  return $address;
}


} // end class 


$smtp = new smtp($web['smtpserver'], $web['port'], true, $web['smtpuser'], $web['smtppwd'], $web['sender']);



function mailer_send($to) {
  global $smtp, $web, $mailarr;
  return $smtp -> sendmail($to, $web['sender'], $mailarr['subject'], $mailarr['content'], $web['mailtype']);


}



















?>