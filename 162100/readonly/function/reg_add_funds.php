<?php


//用户直接注册赠送货币值
function add_funds_from_reg() {
  global $web;
  return $web['loginadd'] * 12.5;
}

//从推广URL引来的注册（即下线注册）获取货币值
function add_funds_from_reg_subordinate() {
  global $web;
  return $web['loginadd2'] * 12.5;
}


?>