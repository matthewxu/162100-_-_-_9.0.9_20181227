<?php
session_start();

include_once( 'config.php' );

if (!WB_AKEY || !WB_SKEY || !WB_CALLBACK_URL) {
  die('<a href="../../webmaster_central.php?get=set#login_key">&#x4F60;&#x8FD8;&#x6CA1;&#x6709;&#x914D;&#x7F6E;&#x53C2;&#x6570;&#xFF01;</a>');
}

include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
  header('Location: '.$code_url.'');

?>