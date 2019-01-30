<?php
$web['smtpserver'] = ''; //您的smtp服务器的地址 
$web['port']       = 25; //smtp服务器的端口，一般是 25  
$web['smtpuser']   = ''; //您登陆smtp服务器的用户名 
$web['smtppwd']    = ''; //您登陆smtp服务器的密码 
$web['mailtype']   = 'html'; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件 
$web['sender']     = ''; //发件人,一般要与您登陆smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败



?>