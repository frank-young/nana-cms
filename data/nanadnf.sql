

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

--
-- 转存表中的数据 `nana_admin`
--

INSERT INTO `nana_admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cFzbkHzzhGDoIh_Z3U7MdZR1MQo2tmYB', '$2y$13$tk//YNUSuTorIoFbGn/VV.frtPiBYdfJXNp6VdGdhsKwFHtBhizwS', NULL, 'admin@admin.com', 10, 1462462835, 1462462835);

-- --------------------------------------------------------

--
-- 表的结构 `nana_article`
--

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

--
-- 转存表中的数据 `nana_article`
--

INSERT INTO `nana_article` (`id`, `title`, `description`, `content`, `tags`, `date`, `views`, `status`) VALUES
(1, 'nana', 'nana科技有限公司nana科技有限公司', 'nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司nana科技有限公司', '', '2016-05-13 07:06:30', NULL, NULL),
(2, '的趣味无穷', '饿我去', '<p><img><img></p><p>恶趣味</p>', '恶气', '2016-05-13 08:57:49', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nana_carts`
--

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

--
-- 转存表中的数据 `nana_carts`
--

INSERT INTO `nana_carts` (`id`, `product_id`, `name`, `quantity`, `other`, `model`, `price`, `time`, `ip`) VALUES
(1, 2, 'fran', 10, '', NULL, 0, 1469589161, '127.0.0.1'),
(2, 2, 'fran', 10, '', NULL, 0, 1469589632, '127.0.0.1'),
(3, 3, '呃', 1, '', NULL, 0, 1469589632, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `nana_cate`
--

CREATE TABLE IF NOT EXISTS `nana_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `nana_cate`
--

INSERT INTO `nana_cate` (`id`, `cName`) VALUES
(1, '一类产品'),
(2, '二类产品'),
(3, '三类产品');

-- --------------------------------------------------------

--
-- 表的结构 `nana_image`
--

CREATE TABLE IF NOT EXISTS `nana_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='图片路径表' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `nana_image`
--

INSERT INTO `nana_image` (`id`, `pid`, `path`, `file`) VALUES
(22, 16, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(23, 17, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(24, 18, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(25, 19, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(26, 20, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(27, 21, NULL, 'images/Uploads/2016-07-27/4016035e4f0cf1bcc84df6c79e81036e.png'),
(28, 21, NULL, 'images/Uploads/2016-07-27/c787e06c856faff1f278524d71cec626.jpg'),
(29, 22, NULL, 'images/Uploads/2016-07-27/c787e06c856faff1f278524d71cec626.jpg'),
(30, 22, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(31, 23, NULL, 'images/Uploads/2016-07-27/c787e06c856faff1f278524d71cec626.jpg'),
(32, 23, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png');

-- --------------------------------------------------------

--
-- 表的结构 `nana_inquiry`
--

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

--
-- 转存表中的数据 `nana_inquiry`
--

INSERT INTO `nana_inquiry` (`id`, `name`, `subject`, `description`, `email`, `phone`, `country`, `address`, `ip`, `pubtime`, `facebook`, `twitter`, `sns`, `url`, `page`, `status`) VALUES
(1, 'ewqewq', 'eqwe', 'ewq', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'frank young ', 'i want som apple', 'i need your apple', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dasd', 'fas', 'dsada', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'dasd', 'fas', 'dsada', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'dasd', 'fas', 'dsada', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'dasd', 'fas', 'dsada', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'da''s', 'fa''s', 'fsa', 'dsa@qw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '大蛇丸', '范德萨', '供热费多少', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '大蛇丸', '范德萨', '供热费多少fadsadsadsaDFASFSAFSAFfasfas法撒旦撒旦撒', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '烦烦烦', '翻噶', 'f''sa''fa''s飞洒发生飞洒发生发飞洒飞洒', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '烦烦烦', '翻噶', 'f''sa''fa''s飞洒发生飞洒发生发飞洒飞洒', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '烦烦烦', '翻噶', 'f''sa''fa''s飞洒发生飞洒发生发飞洒飞洒', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '烦烦烦', '翻噶', 'f''sa''fa''s飞洒发生飞洒发生发飞洒飞洒', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2完全', 'd''d''sa', ' 倒萨', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, '倒萨', 'd''d''sa', ' 倒萨', 'frankyoung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 'frank young ', 'i want you ', 'dahfaw', 'frank@qq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, '杨军e', '倒萨', '大撒旦法', 'frank@qq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(32, '杨军e', '倒萨', '大撒旦法', 'frank@qq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(33, '杨军e', '倒萨', '大撒旦法', 'frank@qq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, 'frankyoung', 'i want some mois', 'i want some mois', 'frankgyoung@gmail.com', NULL, '中国 天津 天津', NULL, '127.0.0.1', 1469582084, NULL, NULL, NULL, NULL, NULL, 0),
(35, 'frankyoung', 'i want some mois', 'i want some mois', 'frankgyoung@gmail.com', NULL, '中国 天津 天津', NULL, '127.0.0.1', 1469582088, NULL, NULL, NULL, NULL, NULL, 0),
(36, 'frankyoung', 'i want some mois', 'i want some mois', 'frankgyoung@gmail.com', NULL, '中国 天津 天津', NULL, '127.0.0.1', 1469585241, NULL, NULL, NULL, NULL, NULL, 0),
(37, 'dasfd', 'fqwq', 'fqw', 'fagwergew@qw.com', NULL, '中国 天津 天津', NULL, '127.0.0.1', 1469587310, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nana_products`
--

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

--
-- 转存表中的数据 `nana_products`
--

INSERT INTO `nana_products` (`id`, `name`, `model`, `cId`, `description`, `content`, `carton`, `quantity`, `weight`, `putTime`, `img_path`, `file`) VALUES
(2, 'fran', 'lfja032', 3, 'fafsas', '<p>dasdas da 打算</p>', '', '', '', NULL, '', NULL),
(3, '呃', '214', 2, '的萨阿丹感受到对方个', '<p>dasf发放大使发生发生飞洒发生发感觉啊老感觉啊看来</p>', '', '', '', NULL, '', ''),
(4, '大大撒', '打算', 2, '打算', '', '', '', '', NULL, '', ''),
(5, '大 ', '123s', 3, 'dwq', '<p>eqw eewq 吃撒</p>', '', '', '', NULL, NULL, NULL),
(6, '感受到', '324', 2, '312', '<p>432</p>', '124231', '231', '434', NULL, NULL, 'images/Uploads/2016-07-27/a95f10e1f15e1f7dbe559a30340bc40e.jpg'),
(7, '奉公守法', '额', 1, '32', '<p>423</p>', '4', '4', '5', NULL, NULL, 'images/Uploads/2016-07-27/a95f10e1f15e1f7dbe559a30340bc40e.jpg'),
(8, '让33', '432', 1, '3', '<p>4</p>', '432', '32', '32', NULL, NULL, 'images/Uploads/2016-07-27/4016035e4f0cf1bcc84df6c79e81036e.png'),
(9, 'da''s', '2', 1, '2', '<p>打算</p>', '', '', '', NULL, NULL, NULL),
(10, '21', '21', 1, '3', '<p>2</p>', '1', '1', '2', NULL, NULL, 'images/Uploads/2016-07-27/2174ea06c4bc083521bba40025906f4d.png'),
(11, 'dsa', 'd', 1, 'dsa', '<p>da</p>', '', '', '', NULL, NULL, 'images/Uploads/2016-07-27/3b0e65e3860dda0be60bf9b3f43dad31.jpg'),
(12, 'dfgsdgfsd', 'gsd', 1, 'd', '<p>grtht</p>', 'fsd', 'd', 'd', NULL, NULL, 'images/Uploads/2016-07-27/3b0e65e3860dda0be60bf9b3f43dad31.jpg'),
(13, 'd', 'd', 1, 'd', '<p>dqw</p>', 'd', 'd', 'w', NULL, NULL, NULL),
(14, 'd', 'd', 1, 'd', '<p>dqw</p>', 'd', 'd', 'w', NULL, NULL, NULL),
(15, 'd', 'd', 1, 'd', '<p>dqw</p>', 'd', 'd', 'w', NULL, NULL, NULL),
(16, 'dwgvdsf d', 'dwq', 1, 'kj', '<p>fh</p>', 'dqw', 'gfd', 'kj', NULL, NULL, NULL),
(17, 'dwgvdsf d', 'dwq', 1, 'kj', '<p>fh</p>', 'dqw', 'gfd', 'kj', NULL, NULL, NULL),
(18, 'dwgvdsf d', 'dwq', 1, 'kj', '<p>fh</p>', 'dqw', 'gfd', 'kj', NULL, NULL, NULL),
(19, 'sdgsd', 'fds', 1, 'd', '<p>uj</p>', 'fds', 'g', 'f', NULL, NULL, NULL),
(20, 'sdgsd', 'fds', 1, 'd', '<p>uj</p>', 'fds', 'g', 'f', NULL, NULL, NULL),
(21, 'ouyuiuy', 'dsa', 2, 'k', '<p>jhgk</p>', 'fh', 'jt', 'j', NULL, NULL, NULL),
(22, '会发回发收两个few湖北人', '分公司电话给东方红', 1, '432', '<p>4gfdgbfs</p>', '教育厅', '3', '432', NULL, NULL, NULL),
(23, 'jhnjhnjhng', 'htr', 1, 'hrt', '<p>hrttjj</p>', 'hrt', 'hrt', 'htr', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `nana_setting`
--

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

--
-- 转存表中的数据 `nana_setting`
--

INSERT INTO `nana_setting` (`id`, `google`, `seo`, `webtitle`, `copyright`, `webdesc`, `robots`, `admin_email`) VALUES
(1, '', '', '', '', '', '', 'yangjunalns0@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `nana_statistics`
--

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

--
-- 转存表中的数据 `nana_statistics`
--

INSERT INTO `nana_statistics` (`id`, `ip`, `url`, `language`, `country`, `province`, `city`, `title`, `device`, `time`, `count`) VALUES
(1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '::1', NULL, NULL, NULL, NULL, NULL, NULL, 'Windows', NULL, 0),
(4, '::1', NULL, 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462642103, 0),
(5, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462642140, 0),
(6, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462642247, 0),
(7, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462642291, 0),
(8, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462644806, 0),
(9, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462644873, 0),
(10, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462644945, 0),
(11, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '湖南', '长沙', '测试是', 'Windows', 1462644999, 0),
(12, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '湖南', '长沙', '测试是', 'Windows', 1462645470, 0),
(13, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '湖南', '长沙', '测试是', 'Windows', 1462645620, 0),
(14, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462645663, 0),
(15, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462645698, 0),
(16, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462645786, 0),
(17, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462645787, 0),
(18, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462645811, 0),
(19, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651621, 0),
(20, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651623, 0),
(21, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651624, 0),
(22, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651626, 0),
(23, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651627, 0),
(24, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651629, 0),
(25, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPhone', 1462651631, 0),
(26, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651692, 0),
(27, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651694, 0),
(28, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651695, 0),
(29, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651698, 0),
(30, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651700, 0),
(31, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651701, 0),
(32, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651703, 0),
(33, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651925, 0),
(34, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Android ', 1462651927, 0),
(35, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651932, 0),
(36, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651933, 0),
(37, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651935, 0),
(38, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651935, 0),
(39, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651938, 0),
(40, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462651939, 0),
(41, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651953, 0),
(42, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651954, 0),
(43, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651956, 0),
(44, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651957, 0),
(45, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651965, 0),
(46, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651967, 0),
(47, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651969, 0),
(48, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651970, 0),
(49, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651970, 0),
(50, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651971, 0),
(51, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462651972, 0),
(52, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462652289, 0),
(53, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462652301, 0),
(54, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462652321, 0),
(55, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'iPad', 1462652338, 0),
(56, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462652349, 0),
(57, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'ot', 1462652430, 0),
(58, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805214, 0),
(59, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805216, 0),
(60, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805261, 0),
(61, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805266, 0),
(62, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805396, 0),
(63, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462805475, 0),
(64, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806120, 0),
(65, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806708, 0),
(66, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806728, 0),
(67, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806773, 0),
(68, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806774, 0),
(69, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806811, 0),
(70, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806837, 0),
(71, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806849, 0),
(72, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806871, 0),
(73, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806885, 0),
(74, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806912, 0),
(75, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462806936, 0),
(76, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807008, 0),
(77, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807085, 0),
(78, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807134, 0),
(79, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(80, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807136, 0),
(81, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(83, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '天津', '天津', '测试是', 'Windows', 1462807199, 0),
(84, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807255, 0),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(87, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '天津', '天津', '测试是', 'Windows', 1462807301, 0),
(88, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', '中国', '天津', '天津', '测试是', 'Windows', 1462807336, 0),
(89, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807421, 0),
(90, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807454, 0),
(91, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807484, 0),
(92, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807568, 0),
(93, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807646, 0),
(94, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807667, 0),
(95, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807765, 0),
(96, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807803, 0),
(97, '::1', 'http://localhost/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807814, 0),
(98, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807833, 0),
(99, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462807843, 0),
(100, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462809866, 0),
(101, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462810209, 0),
(102, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=statistics/index', 'zh-CN', NULL, NULL, NULL, '测试是', 'Windows', 1462812666, 0),
(103, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/index', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1462812676, 0),
(104, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/signup', 'zh-CN', NULL, NULL, NULL, 'Signup', 'Windows', 1462812692, 0),
(105, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/signup', 'zh-CN', NULL, NULL, NULL, 'Signup', 'Windows', 1462812728, 0),
(106, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/about', 'zh-CN', NULL, NULL, NULL, 'About', 'Windows', 1462975584, 0),
(107, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/contact', 'zh-CN', NULL, NULL, NULL, 'Contact', 'Windows', 1462975594, 0),
(108, '::1', 'http://localhost/nana/frontend/web/', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1463123391, 0),
(109, '::1', 'http://localhost/nana/frontend/web/index.php?r=site/login', 'zh-CN', NULL, NULL, NULL, 'Login', 'Windows', 1463123394, 0),
(110, '::1', 'http://localhost/nana/frontend/web/index.php?r=site/login', 'zh-CN', NULL, NULL, NULL, 'Login', 'Windows', 1463123397, 0),
(111, '::1', 'http://localhost/nana/frontend/web/index.php?r=site/login', 'zh-CN', NULL, NULL, NULL, 'Login', 'Windows', 1463123404, 0),
(112, '::1', 'http://localhost/nana/frontend/web/index.php', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1467338703, 0),
(113, '::1', 'http://localhost/nana/frontend/web/index.php?r=site/about', 'zh-CN', NULL, NULL, NULL, 'About', 'Windows', 1467338708, 0),
(114, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1469581503, 0),
(115, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/about', 'zh-CN', NULL, NULL, NULL, 'About', 'Windows', 1469581701, 0),
(116, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Not Found (', 'Windows', 1469581719, 0),
(117, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Not Found (', 'Windows', 1469581723, 0),
(118, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/index', 'zh-CN', NULL, NULL, NULL, 'Products', 'Windows', 1469581731, 0),
(119, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/view', 'zh-CN', NULL, NULL, NULL, '大大撒', 'Windows', 1469581736, 0),
(120, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/index', 'zh-CN', NULL, NULL, NULL, 'Products', 'Windows', 1469581755, 0),
(121, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/view', 'zh-CN', NULL, NULL, NULL, 'fran', 'Windows', 1469581760, 0),
(122, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Not Found (', 'Windows', 1469581779, 0),
(123, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/about', 'zh-CN', NULL, NULL, NULL, 'About', 'Windows', 1469581783, 0),
(124, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/login', 'zh-CN', NULL, NULL, NULL, 'Login', 'Windows', 1469581785, 0),
(125, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/signup', 'zh-CN', NULL, NULL, NULL, 'Signup', 'Windows', 1469581788, 0),
(126, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/login', 'zh-CN', NULL, NULL, NULL, 'Login', 'Windows', 1469581789, 0),
(127, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/contact', 'zh-CN', NULL, NULL, NULL, 'Contact', 'Windows', 1469581791, 0),
(128, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/signup', 'zh-CN', NULL, NULL, NULL, 'Signup', 'Windows', 1469581793, 0),
(129, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/about', 'zh-CN', NULL, NULL, NULL, 'About', 'Windows', 1469581795, 0),
(130, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=site/index', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1469581796, 0),
(131, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products', 'zh-CN', NULL, NULL, NULL, 'Products', 'Windows', 1469581813, 0),
(132, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/view', 'zh-CN', NULL, NULL, NULL, '大大撒', 'Windows', 1469581818, 0),
(133, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/index', 'zh-CN', NULL, NULL, NULL, 'Products', 'Windows', 1469581826, 0),
(134, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=products/view', 'zh-CN', NULL, NULL, NULL, '呃', 'Windows', 1469581830, 0),
(135, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Not Found (', 'Windows', 1469581874, 0),
(136, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 'Not Found (', 'Windows', 1469581879, 0),
(137, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/info', 'zh-CN', NULL, NULL, NULL, '', 'Windows', 1469581916, 0),
(138, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469581923, 0),
(139, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/info', 'zh-CN', NULL, NULL, NULL, '', 'Windows', 1469582089, 0),
(140, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1469582098, 0),
(141, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php', 'zh-CN', NULL, NULL, NULL, 'My Yii Application', 'Windows', 1469582249, 0),
(142, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/info', 'zh-CN', NULL, NULL, NULL, '', 'Windows', 1469585242, 0),
(143, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469587297, 0),
(144, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469587300, 0),
(145, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/info', 'zh-CN', NULL, NULL, NULL, '', 'Windows', 1469587312, 0),
(146, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589092, 0),
(147, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589153, 0),
(148, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589255, 0),
(149, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589453, 0),
(150, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589629, 0),
(151, '127.0.0.1', 'http://127.0.0.1/nana/frontend/web/index.php?r=inquiry/create', 'zh-CN', NULL, NULL, NULL, 'Create Inquiry', 'Windows', 1469589643, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nana_statistics_unique`
--

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

--
-- 转存表中的数据 `nana_statistics_unique`
--

INSERT INTO `nana_statistics_unique` (`id`, `ip`, `language`, `country`, `province`, `city`, `device`, `time`, `count`) VALUES
(68, '::1', 'zh-CN', '美国', '洛杉矶', '', 'Windows', 1462807803, 0),
(69, '127.0.0.1', 'zh-CN', '中国', '天津', '天津', 'Windows', 1462807833, 0),
(71, '123.22.124.2', 'en', '美国', '新泽西', '', NULL, NULL, 0),
(72, '123.24.124.2', 'en', '法国', '巴黎', '', NULL, NULL, 0),
(73, '123.23.124.2', 'en', '法国', NULL, NULL, NULL, NULL, 0),
(74, '12.234.124.2', 'en', '中国', NULL, NULL, NULL, NULL, 0),
(76, '13.234.124.2', 'en', '俄罗斯', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nana_user`
--

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

--
-- 转存表中的数据 `nana_user`
--

INSERT INTO `nana_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'frank', 'dKHQJh88lS3L28uOAft2ShI28KH6oUl9', '$2y$13$RIJjbh/Y0xDKYJJHT/FxCOPQw32a/sPkPuJESoZWS17AJBW81DfUO', NULL, 'admi3n@admin.com', 10, 1462471331, 1462471331),
(3, 'frank1', 'M_njVnlnVH_tat2CRv46l2C3qP4FInoN', '$2y$13$zpRWCvrWv9j.zE73GRWE8O.R.4tP/RnBx3VWy/pQIRZoSx3pwHqo.', NULL, 'admidwn@admin.com', 10, 1462472630, 1462472630),
(4, 'admin', '9H6HmwpmE1jKpLeVbJ4QRrgS-lDsnSjT', '$2y$13$fQ2WF6Wbf6wEZ1vGM6f2jOW2B3o1D/D3GCSAGXnLWAjaacLHZdbZq', NULL, 'admid2wn@admin.com', 10, 1462473268, 1462473268);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
