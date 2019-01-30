<?php die(); ?> 
(
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `userip` varchar(64) NOT NULL DEFAULT '',
  `description` int(2) NOT NULL DEFAULT '0' COMMENT '0 未定义 1 用户注册 2 成员登陆 3 推广URL来访 4 下线注册分成 5 下线登陆分成 6 管理员加赠 7 管理员减扣',
  `date` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
  `money` numeric(9,2) NOT NULL DEFAULT '0' COMMENT '金额',
  `other` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `fettle` int(2) NOT NULL DEFAULT '0' COMMENT '0 有效 1+ 无效：原因',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `date` (`date`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
