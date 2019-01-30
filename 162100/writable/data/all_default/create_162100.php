<?php die(); ?> 
(
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `column_id` varchar(32) NOT NULL DEFAULT '',
  `class_id` varchar(32) NOT NULL DEFAULT '',
  `class_title` varchar(255) NOT NULL DEFAULT '',
  `detail_title` varchar(255) NOT NULL DEFAULT '',
  `http_name_style` text,
  `class_priority` longtext COMMENT '头栏',
  `class_grab` text COMMENT '采集（抓取）',
  PRIMARY KEY (`id`),
  KEY `column_id_class_id` (`column_id`,`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6330 DEFAULT CHARSET=utf8;
