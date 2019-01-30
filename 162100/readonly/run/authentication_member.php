<?php
$self_power = basename($_SERVER['SCRIPT_NAME']);
if ($self_power != 'member.php' && $self_power != 'member_current.php') {
  die('&#x8BF7;&#x4ECE;&#x5408;&#x6CD5;&#x9875;&#x9762;&#x83B7;&#x53D6;&#x8EAB;&#x4EFD;&#xFF01;');
}
unset($self_power);
?>