<?php
require ('authentication_manager.php');
?>
<?php

//备份数据库
if (POWER != 5) {
  err('该命令必须以基本管理员身份登陆！请重登陆');
}


function filterbr($text) {
  //global $db;
  return addslashes(stripslashes($text));
}


@ require ('readonly/function/deldir.php');

if (!empty($_GET['table'])) {
  if (!in_array($_GET['table'], $sql['data'])) {
    err('数据表名出错！');
  }
  $table_pre = $_GET['table'];
  $array_tables = array($_GET['table']);
} else {
  $table_pre = 'all';
  $array_tables = $sql['data'];
}


$beifen_dir = ''.$table_pre.'_'.gmdate("YmdHis", time() + (floatval($web["time_pos"]) * 3600));
if (file_exists('writable/data/'.$beifen_dir)) {
  deldir('writable/data/'.$beifen_dir);
}
eval('@chmod(\'writable/data\', 0'.$web['chmod'].');');
if (!@mkdir('writable/data/'.$beifen_dir)) {
  err('备份目录writable/data/'.$beifen_dir.'无法建立，可能是写权限不足');
}


if (!isset($sql['db_err'])) {
  $db = db_conn();
}
if ($sql['db_err'] != '') {
  err($sql['db_err']);
}
$sql['sql_version'] = db_version($db);


@ require('readonly/function/write_file.php');

foreach ($array_tables as $table) {
  write_table_create($table);
}

foreach ($array_tables as $table) {
  write_table_insert($table);
}

db_close($db);

alert('数据库备份成功！已储存为'.$beifen_dir.'', '?get=sql#table_'.$table_pre.'');

function write_table_insert($table) {
  global $sql, $db, $beifen_dir;
  $text = $line = '';
  $size = 0;
  $step = 0;
  $beifen_each_limit = 512 * 1024; //按此尺寸（KB）备份
  $result = db_query($db, 'SELECT * FROM `'.$sql['pref'].''.$table.'`');
  if ($result != false) {
    while ($row = db_fetch($db, $result)) {
	  if (!isset($row_name)) {
	    $row_name = '<?php die(); ?> (`'.@implode("`, `", array_keys($row)).'`)';
      }
      //$row = array_map('filterbr', $row);
      $row = array_map('addslashes', $row);
      $line = "\n('".@implode("','", $row)."')";
	  $size += strlen($line).'  ';
		
	  $text .= $line.",";
	  if ($size >= $beifen_each_limit) {
	    $step++;
        write_file('writable/data/'.$beifen_dir.'/insert_'.$table.'_'.$step.'.php', $row_name.' VALUES '.preg_replace('/,$/', ';', $text));
        $text = '';
	    $size = 0;
      } else {
      }
      unset($row);
    }
    $step++;
    write_file('writable/data/'.$beifen_dir.'/insert_'.$table.'_'.$step.'.php', $row_name.' VALUES '.preg_replace('/,$/', ';', $text));
  }
  $result = NULL;
}

function write_table_create($table) {
  global $sql, $db, $beifen_dir;
  $result = db_query($db, 'SELECT MAX(id) AS in_mark FROM `'.$sql['pref'].''.$table.'`');
  $row = db_fetch($db, $result);
  $li_count = $row['in_mark'] + 1;
  $result = NULL;
  unset($row);
  $text = '';
  switch ($table) {
    case $sql['data']['承载网址数据的表名'] :
    $text .= '
(
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `column_id` varchar(32) NOT NULL DEFAULT \'\',
  `class_id` varchar(32) NOT NULL DEFAULT \'\',
  `class_title` varchar(255) NOT NULL DEFAULT \'\',
  `detail_title` varchar(255) NOT NULL DEFAULT \'\',
  `http_name_style` text,
  `class_priority` longtext COMMENT \'头栏\',
  `class_grab` text COMMENT \'采集（抓取）\',
  PRIMARY KEY (`id`),
  KEY `column_id_class_id` (`column_id`,`class_id`)
) '.($sql['sql_version'] > '4.1' ? 'ENGINE=MyISAM AUTO_INCREMENT='.$li_count.' DEFAULT CHARSET='.$sql['char'].'' : 'TYPE=MYISAM').';
';
    break;

    case $sql['data']['承载成员档案的表名'] :
    $text .= '
(
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT \'\',
  `password` varchar(32) NOT NULL DEFAULT \'\',
  `email` varchar(255) NOT NULL DEFAULT \'\',
  `thisdate` timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `regdate` timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `realname` varchar(64) NOT NULL DEFAULT \'\',
  `alipay` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'支付宝\',
  `bank` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'银行\',
  `collection` text NOT NULL COMMENT \'我的收藏\',
  `notepad` text NOT NULL COMMENT \'记事本\',
  `memory_website` text NOT NULL COMMENT \'浏览记录\',
  `recommendedby` varchar(64) NOT NULL DEFAULT \'\' COMMENT \'上线人\',
  `face` longblob COMMENT \'头像\',
  `check_reg` int(2) NOT NULL DEFAULT \'0\' COMMENT \'0 正常 1 审核中 2 黑名单 3 冻结 4 异常\',
  `session_key` varchar(64) NOT NULL DEFAULT \'\' COMMENT \'密钥\',
  `login_key_qq` varchar(255) NOT NULL DEFAULT \'\',
  `login_key_weibo` varchar(255) NOT NULL DEFAULT \'\',
  `login_key_baidu` varchar(255) NOT NULL DEFAULT \'\',
  `login_key_162100` varchar(255) NOT NULL DEFAULT \'\',
  `stop_login` int(2) NOT NULL DEFAULT \'0\',
  PRIMARY KEY (id,check_reg),
  UNIQUE username_check_reg (username,check_reg),
  UNIQUE email_check_reg (email,check_reg)
) '.($sql['sql_version'] > '4.1' ? 'ENGINE=MyISAM AUTO_INCREMENT='.$li_count.' DEFAULT CHARSET='.$sql['char'].'' : 'TYPE=MYISAM').';
';
/*!50100 PARTITION BY LIST (check_reg)
(PARTITION p0 VALUES IN (0),
PARTITION p1 VALUES IN (1),
PARTITION p2 VALUES IN (2),
PARTITION p3 VALUES IN (3),
PARTITION p4 VALUES IN (4)
) */
    break;

    case $sql['data']['承载财务数据的表名'] :
    $text .= '
(
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT \'\',
  `userip` varchar(64) NOT NULL DEFAULT \'\',
  `description` int(2) NOT NULL DEFAULT \'0\' COMMENT \'0 未定义 1 用户注册 2 成员登陆 3 推广URL来访 4 下线注册分成 5 下线登陆分成 6 管理员加赠 7 管理员减扣\',
  `date` timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `money` numeric(9,2) NOT NULL DEFAULT \'0\' COMMENT \'金额\',
  `other` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'备注\',
  `fettle` int(2) NOT NULL DEFAULT \'0\' COMMENT \'0 有效 1+ 无效：原因\',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `date` (`date`)
) '.($sql['sql_version'] > '4.1' ? 'ENGINE=MyISAM AUTO_INCREMENT='.$li_count.' DEFAULT CHARSET='.$sql['char'].'' : 'TYPE=MYISAM').';
';

    break;
  }
  write_file('writable/data/'.$beifen_dir.'/create_'.$table.'.php', '<?php die(); ?> '.$text);
}


?>