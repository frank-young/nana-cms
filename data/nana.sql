

CREATE TABLE IF NOT EXISTS `nana_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `nana_admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cFzbkHzzhGDoIh_Z3U7MdZR1MQo2tmYB', '$2y$13$tk//YNUSuTorIoFbGn/VV.frtPiBYdfJXNp6VdGdhsKwFHtBhizwS', NULL, 'admin@admin.com', 10, 1462462835, 1462462835);


CREATE TABLE IF NOT EXISTS `nana_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `tags` varchar(32) DEFAULT NULL COMMENT '标签',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '日期',
  `views` int(10) unsigned DEFAULT '0' COMMENT '浏览人数',
  `status` int(1) unsigned DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=3 ;



CREATE TABLE IF NOT EXISTS `nana_carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `other` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `time` int(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk COMMENT='询盘产品表' AUTO_INCREMENT=4 ;



CREATE TABLE IF NOT EXISTS `nana_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;



CREATE TABLE IF NOT EXISTS `nana_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='图片路径表' AUTO_INCREMENT=33 ;


CREATE TABLE IF NOT EXISTS `nana_inquiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(50) NOT NULL COMMENT '用户姓名',
  `subject` varchar(255) DEFAULT NULL COMMENT '主题',
  `description` text NOT NULL COMMENT '内容',
  `email` varchar(50) NOT NULL COMMENT '邮件',
  `phone` int(20) DEFAULT NULL COMMENT '手机',
  `country` varchar(50) DEFAULT NULL COMMENT '国家',
  `address` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `ip` varchar(16) DEFAULT NULL COMMENT 'ip地址',
  `pubtime` int(11) DEFAULT NULL COMMENT '发布时间',
  `facebook` varchar(20) DEFAULT NULL COMMENT 'facebook',
  `twitter` varchar(20) DEFAULT NULL COMMENT 'twitter',
  `sns` varchar(20) DEFAULT NULL COMMENT 'sns',
  `url` varchar(255) DEFAULT NULL COMMENT '提交的网址',
  `page` varchar(50) DEFAULT NULL COMMENT '提交的页面',
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='询盘信息表' AUTO_INCREMENT=38 ;



CREATE TABLE IF NOT EXISTS `nana_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(200) NOT NULL COMMENT '产品名称',
  `model` varchar(200) NOT NULL COMMENT '产品型号',
  `cId` int(11) unsigned NOT NULL COMMENT '产品分类',
  `description` varchar(255) NOT NULL COMMENT '产品描述',
  `content` text NOT NULL COMMENT '产品内容',
  `carton` varchar(50) DEFAULT NULL COMMENT '产品包装',
  `quantity` varchar(10) DEFAULT NULL COMMENT '每箱重量',
  `weight` varchar(10) DEFAULT NULL COMMENT '每箱净重',
  `putTime` int(11) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL COMMENT '图片路径',
  `file` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=24 ;


CREATE TABLE IF NOT EXISTS `nana_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `google` text COMMENT 'google分析代码',
  `seo` text COMMENT 'SEO代码',
  `webtitle` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `copyright` varchar(255) DEFAULT NULL COMMENT '网站版权信息',
  `webdesc` varchar(255) DEFAULT NULL COMMENT '网站描述',
  `robots` text COMMENT '网站robots文件',
  `admin_email` varchar(50) DEFAULT NULL COMMENT '管理员邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='网站信息文件' AUTO_INCREMENT=2 ;

INSERT INTO `nana_setting` (`id`, `google`, `seo`, `webtitle`, `copyright`, `webdesc`, `robots`, `admin_email`) VALUES
(1, '', '', '', '', '', '', 'admin@gmail.com');


CREATE TABLE IF NOT EXISTS `nana_statistics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) DEFAULT NULL COMMENT 'ip地址',
  `url` varchar(200) DEFAULT NULL COMMENT 'url地址',
  `language` varchar(50) DEFAULT NULL COMMENT '语言',
  `country` varchar(50) DEFAULT NULL COMMENT '国家',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `title` varchar(200) DEFAULT NULL COMMENT '网页标题',
  `device` varchar(50) DEFAULT NULL COMMENT '设备',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `count` int(10) unsigned DEFAULT '0' COMMENT '数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户信息统计表' AUTO_INCREMENT=152 ;


CREATE TABLE IF NOT EXISTS `nana_statistics_unique` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) DEFAULT NULL COMMENT 'ip地址',
  `language` varchar(50) DEFAULT NULL COMMENT '语言',
  `country` varchar(50) DEFAULT NULL COMMENT '国家',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `device` varchar(50) DEFAULT NULL COMMENT '设备',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `count` int(10) unsigned DEFAULT '0' COMMENT '数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户信息统计表' AUTO_INCREMENT=77 ;



CREATE TABLE IF NOT EXISTS `nana_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

