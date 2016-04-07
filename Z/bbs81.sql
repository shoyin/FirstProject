-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 09 日 02:47
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs81`
--
CREATE DATABASE IF NOT EXISTS `bbs81` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbs81`;

-- --------------------------------------------------------

--
-- 表的结构 `banip`
--

CREATE TABLE IF NOT EXISTS `banip` (
  `id` int(10) unsigned NOT NULL,
  `ip` int(13) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_bclass`
--

CREATE TABLE IF NOT EXISTS `bbs_bclass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bname` varchar(50) NOT NULL,
  `orderno` int(11) unsigned DEFAULT NULL,
  `content` text,
  `logo` varchar(255) DEFAULT 'bclass.jpg',
  `url` varchar(255) NOT NULL DEFAULT 'bclass.php',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `bbs_bclass`
--

INSERT INTO `bbs_bclass` (`id`, `bname`, `orderno`, `content`, `logo`, `url`) VALUES
(40, '人生得意须尽欢', 1, ' ', '20140429535fc024bc2f324591.jpg', 'bclass.php'),
(45, '321木头人', 4, '', 'bclass.jpg', 'bclass.php'),
(35, '旮旯里的小青春', 0, '    qqqqqewrqewr', '20140429535fc01a0b85620846.jpg', 'bclass.php'),
(46, 'who am i', 5, '', 'bclass.jpg', 'bclass.php');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_sclass`
--

CREATE TABLE IF NOT EXISTS `bbs_sclass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `sname` varchar(40) NOT NULL,
  `content` text,
  `orderno` int(11) unsigned DEFAULT NULL,
  `logo` varchar(200) DEFAULT 'sclass.jpg',
  `banzhu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `bbs_sclass`
--

INSERT INTO `bbs_sclass` (`id`, `pid`, `sname`, `content`, `orderno`, `logo`, `banzhu`) VALUES
(37, 35, '我亲爱的', '', 5, '2014043053608c757725b31057.jpg', '207'),
(36, 35, '其实你很悲伤', '', 3, '20140429535fbd172b7b322855.jpg', '204'),
(38, 35, '偏执狂', '', 6, '20140429535fcc0e8b46b12073.jpg', '208'),
(31, 35, '特别能吃苦！', '222qerqewr', 0, '2014043053608c671d58d24184.jpg', '203'),
(35, 35, '我只做到了前四个', '', 2, '20140430536090bf0032118241.jpg', '205'),
(34, 35, '我想了想', '', 1, '20140430536090b898b1d28200.jpg', '196'),
(39, 40, '特别能吃苦！', '', 7, '20140509536c3fd67477e6448.jpg', NULL),
(40, 40, '我想了想', '我想了想', 8, '20140509536c3fe01fa462473.jpg', NULL),
(41, 40, '我只做到了前四个', '', 9, '20140509536c3feba077214288.jpg', NULL),
(45, 45, '木头人', '', 33, '20140509536c4005496bc32035.jpg', NULL),
(44, 45, '321', '', 22, '20140509536c3ff99202f12677.jpg', NULL),
(46, 46, '小青春', '', 44, '20140509536c40132c8fe19418.jpg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_user`
--

CREATE TABLE IF NOT EXISTS `bbs_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `userpwd` char(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `qq` int(11) unsigned DEFAULT NULL,
  `phoneno` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `sex` tinytext CHARACTER SET latin1,
  `birthday` int(11) DEFAULT NULL,
  `headpic` varchar(50) CHARACTER SET latin1 DEFAULT 'headpic.jpg',
  `website` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `signtext` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `intoduce` text CHARACTER SET latin1,
  `regtime` int(11) NOT NULL,
  `lastlogin` int(11) NOT NULL,
  `lastip` int(11) NOT NULL,
  `money` int(11) DEFAULT '100',
  `level` tinyint(1) NOT NULL DEFAULT '3',
  `isallow` tinyint(1) NOT NULL DEFAULT '1',
  `focus` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=212 ;

--
-- 转存表中的数据 `bbs_user`
--

INSERT INTO `bbs_user` (`id`, `username`, `userpwd`, `email`, `qq`, `phoneno`, `sex`, `birthday`, `headpic`, `website`, `signtext`, `intoduce`, `regtime`, `lastlogin`, `lastip`, `money`, `level`, `isallow`, `focus`) VALUES
(203, 'Duke', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, '0', NULL, '20140429535fc64687a4614532.jpg', NULL, NULL, NULL, 1398785332, 1398785332, 2130706433, 100, 1, 1, NULL),
(157, 'jack', 'c4ca4238a0b923820dcc509a6f75849b', 'qqq1@qq.com', 0, 'q', '0', NULL, '20140509536c4162dc7bf5711.jpeg', NULL, '11', '11asdas', 1398492288, 1399601894, 2130706433, 140, 0, 1, NULL),
(205, 'fox', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, '0', NULL, '20140429535fc8638d7cf5037.jpg', NULL, NULL, NULL, 1398785572, 1398785572, 2130706433, 100, 1, 1, NULL),
(204, 'Jazz', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, '0', NULL, '20140429535fc6c62f94a11966.jpg', NULL, NULL, NULL, 1398785362, 1398785362, 2130706433, 100, 1, 1, NULL),
(210, 'aaa', 'e10adc3949ba59abbe56e057f20f883e', 'qqq1@qq.com', NULL, NULL, NULL, NULL, 'headpic.jpg', NULL, NULL, NULL, 1398841276, 1398841276, 2130706433, 100, 3, 1, NULL),
(211, '12', 'c20ad4d76fe97759aa27a0c99bff6710', '', NULL, NULL, '0', NULL, '20140502536342aee21916270.jpg', NULL, NULL, NULL, 1399013918, 1399013918, 2130706433, 100, 3, 1, NULL),
(209, '123', '202cb962ac59075b964b07152d234b70', '', NULL, NULL, '0', NULL, '2014043053609c7f345dd23410.jpg', NULL, NULL, NULL, 1398840349, 1398840349, 2130706433, 100, 3, 1, NULL),
(206, 'sex', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, NULL, NULL, 'headpic.jpg', NULL, NULL, NULL, 1398785795, 1398785795, 2130706433, 100, 1, 1, NULL),
(207, 'max', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, NULL, NULL, 'headpic.jpg', NULL, NULL, NULL, 1398785964, 1398785964, 2130706433, 100, 1, 1, NULL),
(208, 'mm', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, NULL, NULL, 'headpic.jpg', NULL, NULL, NULL, 1398786480, 1398786480, 2130706433, 100, 1, 1, NULL),
(196, 'rose', 'c4ca4238a0b923820dcc509a6f75849b', '', NULL, NULL, '0', NULL, '20140429535fc58158f1730679.jpg', NULL, NULL, NULL, 1398651973, 1398651973, 2130706433, 100, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `keyword` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `postime` int(11) DEFAULT NULL,
  `visittime` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `ip` int(11) DEFAULT NULL,
  `isopen` int(11) DEFAULT '1',
  `ishot` int(11) DEFAULT '0',
  `isjinghua` int(11) DEFAULT '0',
  `istop` int(11) DEFAULT '0',
  `allowlevel` int(11) DEFAULT NULL,
  `needreply` int(11) DEFAULT NULL,
  `inbox` int(11) DEFAULT NULL,
  `islit` int(11) DEFAULT '0',
  `sid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `pid`, `uid`, `title`, `content`, `pic`, `edittime`, `keyword`, `description`, `postime`, `visittime`, `cost`, `ip`, `isopen`, `ishot`, `isjinghua`, `istop`, `allowlevel`, `needreply`, `inbox`, `islit`, `sid`) VALUES
(140, 31, 157, '你很悲伤', '<p>你很悲伤</p>', NULL, NULL, NULL, NULL, 1398785252, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(139, 31, 157, '我亲爱的', '<p>我亲爱的</p>', NULL, NULL, NULL, NULL, 1398785229, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(138, 31, 157, '偏执狂', '<p>偏执狂</p>', NULL, NULL, NULL, NULL, 1398785203, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(137, 31, 157, '其实！', '<p>其实！</p>', NULL, NULL, NULL, NULL, 1398785130, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(136, 34, 157, '偏执狂', '<p>偏执狂</p>', NULL, NULL, NULL, NULL, 1398784899, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(135, 31, 157, '我亲爱的偏执狂', '<p>1</p>', NULL, NULL, NULL, NULL, 1398784845, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(134, 31, 157, '你很悲伤', '<p>我&nbsp;&nbsp;</p>', NULL, NULL, NULL, NULL, 1398784791, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(125, 31, 157, '戒不掉', '<p>我是whi</p>', NULL, 1398780776, NULL, NULL, 1398776643, NULL, NULL, 2130706433, 1, 0, 0, 0, 4, 0, 0, 0, 0),
(133, 31, 157, '这个帖子很亮', '<p>这个帖子很亮</p>', NULL, 1399304672, NULL, NULL, 1398784543, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 1, 0),
(131, 31, 157, '这个帖子很精', '<p>这个帖子很精</p>', NULL, 1398784481, NULL, NULL, 1398784478, NULL, NULL, 2130706433, 1, 0, 1, 0, NULL, NULL, NULL, 0, 0),
(132, 31, 157, '这个帖子很顶', '<p>这个帖子很顶阿道夫</p>', NULL, 1398840496, NULL, NULL, 1398784504, NULL, NULL, 2130706433, 1, 0, 0, 1, 4, 0, 0, 0, 0),
(128, 31, 157, 'hggg', '<p>gkjll</p>', NULL, 1398782256, NULL, NULL, 1398781786, NULL, NULL, 2130706433, 1, 0, 0, 0, 4, 0, 0, 0, 0),
(130, 31, 157, '这个帖子很热', '<p>这个帖子很热</p>', NULL, 1398784456, NULL, NULL, 1398784450, NULL, NULL, 2130706433, 1, 1, 0, 0, NULL, NULL, NULL, 0, 0),
(141, 31, 157, '其实！', '<p>其实</p>', NULL, NULL, NULL, NULL, 1398785274, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(142, 31, 157, '啊飒飒的', '<p>阿萨德asdasd</p>', NULL, 1398820346, NULL, NULL, 1398820319, NULL, NULL, 2130706433, 1, 0, 0, 0, 4, 0, 0, 0, 0),
(143, 31, 157, 'asd', '<p>&nbsp;asd&nbsp;</p>', NULL, 1398820376, NULL, NULL, 1398820362, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(144, 0, 0, '', '', NULL, NULL, '请问', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(145, 31, 157, '111', '<p>1111</p>', NULL, NULL, NULL, NULL, 1398824857, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(146, 31, 157, '111', '<p>1111</p>', NULL, NULL, NULL, NULL, 1398826316, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(147, 31, 157, 'q', '<p>q</p>', NULL, NULL, NULL, NULL, 1398826742, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(148, 31, 157, '1', '<p>1wo</p>', NULL, NULL, NULL, NULL, 1398826865, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(149, 31, 157, 'wo shi 1', '<p>wo shi 1</p>', NULL, NULL, NULL, NULL, 1398827223, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(150, 31, 157, 'adf', '<p>qqq111</p>', NULL, NULL, NULL, NULL, 1398827808, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(151, 31, 157, 'q', '<p>qqww1</p>', NULL, NULL, NULL, NULL, 1398827941, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(153, 31, 157, '12', '<p>111wo 2222</p>', NULL, NULL, NULL, NULL, 1398828709, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(154, 31, 157, '1', '<p>11wo 222</p>', NULL, NULL, NULL, NULL, 1398830276, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(155, 31, 157, '1', '<p>1wo 2</p>', NULL, NULL, NULL, NULL, 1398830369, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(157, 31, 0, 'ww', '<p>www</p>', NULL, NULL, NULL, NULL, 1398840246, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0),
(160, 31, 0, 'QER', '<p>QER</p>', NULL, 1399304677, NULL, NULL, 1399270319, NULL, NULL, 2130706433, 1, 0, 0, 0, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `friendlink`
--

CREATE TABLE IF NOT EXISTS `friendlink` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `linkname` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT 'linklogo.jpg',
  `isindex` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `orderno` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `friendlink`
--

INSERT INTO `friendlink` (`id`, `linkname`, `url`, `logo`, `isindex`, `type`, `uid`, `orderno`) VALUES
(5, '腾讯', ' www.tengxun.com', '20140422535618b18f5d09950.jpg', 2, '3', 0, 4),
(8, '百度', '  www.baidu.com', '20140422535618a70a28c3015.jpg', 2, '1', 0, 2),
(9, '新浪', 'www.sina.com', '201404225355cc90f34f61947.jpg', 2, '0', 0, 0),
(12, '新潮', ' www.xinchao.com', '20140429535fc10bf32bd5754.jpg', 1, '0', 0, 33),
(13, '多玩', 'www.duowan.com', '20140429535fc0c2d518e677.jpg', 1, '0', 0, 6);

-- --------------------------------------------------------

--
-- 表的结构 `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `keyword`
--

INSERT INTO `keyword` (`id`, `keyword`) VALUES
(6, '2'),
(5, '1'),
(7, '我'),
(8, 'aaa');

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `posttime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `ip` int(11) NOT NULL,
  `isopen` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `title`, `content`, `uid`, `cid`, `posttime`, `edittime`, `ip`, `isopen`) VALUES
(120, 'q', '<p>1</p>', 157, 147, 1398826762, 1398826762, 2130706433, 1),
(119, 'q', '<p>q</p>', 157, 147, 1398826756, 1398826756, 2130706433, 1),
(118, 'qwe', '<p>qwe</p>', 157, 146, 1398826717, 1398826717, 2130706433, 1),
(117, 'qq', '<p>qqqq</p>', 157, 146, 1398826642, 1398826642, 2130706433, 1),
(116, 'q', '<p>q</p>', 157, 146, 1398826602, 1398826602, 2130706433, 1),
(114, 'qq', '<p>qw11qqqqqq111</p>', 157, 146, 1398826501, 1398826501, 2130706433, 1),
(111, 'q', '<p>q</p>', 157, 132, 1398821616, 1398821616, 2130706433, 1),
(112, '11', '<p>111</p>', 157, 145, 1398826092, 1398826092, 2130706433, 1),
(113, '11', '<p>11</p>', 157, 146, 1398826320, 1398826320, 2130706433, 1),
(13, 'qqqqqqqq', '<p>qqqqqqqq</p>', 0, 23, 1398309305, 1398309305, 2130706433, 1),
(14, 'qweqwe', '<p>qweqweqwe</p>', 0, 23, 1398309935, 1398309935, 2130706433, 1),
(15, 'qweqw', '<p>qeq</p>', 0, 23, 1398318693, 1398318693, 2130706433, 1),
(16, 'qweqw', '<p>qeq</p>', 0, 23, 1398318728, 1398318728, 2130706433, 1),
(17, '111', '<p>111<br/></p>', 0, 23, 1398318775, 1398318775, 2130706433, 1),
(18, '111111111', '<p>1111111</p>', 0, 23, 1398318922, 1398318922, 2130706433, 1),
(19, 'qqqqqqqqq', '<p>qqqqqqqq</p>', 0, 23, 1398319255, 1398319255, 2130706433, 1),
(106, 'ni', '<p>qoasd</p>', 157, 132, 1398821188, 1398821193, 2130706433, 1),
(21, 'qqqq', '<p>qqqqq</p>', 0, 23, 1398319492, 1398319492, 2130706433, 1),
(22, '1111111', '<p>111111111111</p>', 0, 23, 1398319690, 1398319690, 2130706433, 1),
(23, '11111111111', '<p>1111111111</p>', 0, 23, 1398319705, 1398319705, 2130706433, 1),
(24, 'adf', '<p>adf</p>', 0, 23, 1398326206, 1398326206, 2130706433, 1),
(25, '111111', '<p>1111111111</p>', 1, 56, 1398350914, 1398350914, 2130706433, 1),
(109, 'q', '<p>q</p>', 157, 132, 1398821602, 1398821602, 2130706433, 1),
(82, 'qqqqqqqqq', '<p>qqqqw</p>', 157, 84, 1398522337, 1398522344, 2130706433, 1),
(28, 'qqqqqqq', '<p>qqqqqqqqqq</p>', 1, 0, 1398350985, 1398350985, 2130706433, 1),
(110, 'q', '<p>q</p>', 157, 132, 1398821606, 1398821606, 2130706433, 1),
(30, 'qqqqqqqqqqqqq', '<p>qqqqqqqqq</p>', 1, 57, 1398351691, 1398351691, 2130706433, 1),
(31, 'qqqqqqqqq', '<p>qqqqqqqqqq</p>', 1, 58, 1398351912, 1398351912, 2130706433, 1),
(32, 'qqqqqqqq', '<p>qqqqqqqqqqqq</p>', 1, 58, 1398352329, 1398352329, 2130706433, 1),
(33, 'qqqqqqqq', '<p>qqqqqqqqqqqq</p>', 1, 58, 1398352400, 1398352400, 2130706433, 1),
(108, 'q', '<p>q</p>', 157, 132, 1398821597, 1398821597, 2130706433, 1),
(95, 'qqwefsdfsdfsdf', '<p>qqweasadf</p>', 157, 93, 1398657302, 1398666751, 2130706433, 1),
(36, '111111111', '<p>11111111111111</p>', 1, 59, 1398352580, 1398352580, 2130706433, 1),
(98, 'wwwwwwwwww', '<p>wwwwwwwwwwwwerewr</p>', 157, 93, 1398662926, 1398662931, 2130706433, 1),
(107, 'q', '<p>q</p>', 157, 132, 1398821593, 1398821593, 2130706433, 1),
(39, '11111111111', '<p>111111111111111</p>', 1, 59, 1398352599, 1398352599, 2130706433, 1),
(105, 'jack', '<p>去</p>', 157, 140, 1398820645, 1398820645, 2130706433, 1),
(104, 'giu', '<p>jljhjl^^^^</p>', 157, 128, 1398781795, 1398781818, 2130706433, 0),
(42, '1111111111', '<p>111111111111111</p>', 1, 59, 1398352616, 1398352616, 2130706433, 1),
(89, '111', '<p>111</p>', 157, 92, 1398610166, 1398610171, 2130706433, 0),
(44, '1111111111', '<p>1111111111111</p>', 1, 59, 1398352663, 1398352663, 2130706433, 1),
(45, '1111111111', '<p>1111111111111</p>', 1, 59, 1398352824, 1398352824, 2130706433, 1),
(46, 'qqqqqqqqqqq', '<p>qqqqqqqqqqqqqqqq</p>', 1, 59, 1398352836, 1398352836, 2130706433, 1),
(47, 'qqqqqqqqqqqqqqqqq', '<p>qqqqqqqqqqqqqqqq</p>', 1, 59, 1398352843, 1398352843, 2130706433, 1),
(96, 'qqqqqqq', '<p>qqqqqqqqweqw</p>', 157, 96, 1398657715, 1398657730, 2130706433, 1),
(49, 'qqqqqqqqq', '<p>qqqqqqqqqqqq</p>', 1, 60, 1398352909, 1398352909, 2130706433, 1),
(50, '1111111111', '<p>1111111111111</p>', 1, 61, 1398353913, 1398353913, 2130706433, 1),
(51, '11111111111111', '<p>1111111111</p>', 1, 61, 1398353918, 1398353918, 2130706433, 1),
(88, '11', '<p>1122</p>', 157, 89, 1398601755, 1398601762, 2130706433, 1),
(53, 'qqqqqqqqq', '<p>qqqqqqqqqqqqq</p>', 1, 63, 1398354786, 1398354786, 2130706433, 1),
(54, 'qqqqqqqqqqqq', '<p>qqqqqqqqqqqqqqq</p>', 1, 64, 1398355258, 1398355258, 2130706433, 1),
(56, 'qweqweqwe', '<p>qqweqweqwe</p>', 1, 57, 1398355288, 1398355288, 2130706433, 1),
(57, 'aaaaaaa', '<p>aaaaaaaaaaaaa<br/></p>', 0, 62, 1398402141, 1398402141, 2130706433, 1),
(90, 'qwe', '<p>qweqwe</p>', 157, 104, 1398655512, 1398655512, 2130706433, 1),
(91, 'asd', '<p>asdasd</p>', 157, 104, 1398655600, 1398655600, 2130706433, 1),
(86, '11asdasdas', '<p>11aaaaaaaaaaaasdasd<br/></p>', 179, 90, 1398577767, 1398609755, 2130706433, 0),
(59, 'qqqqqqqqqqq', '<p>qweqwe</p>', 0, 65, 1398418877, 1398418882, 2130706433, 1),
(115, 'w', '<p>ww</p>', 157, 146, 1398826527, 1398826527, 2130706433, 1),
(61, '111111111111', '<p>1111111111111111</p>', 1, 66, 1398419342, 1398419342, 2130706433, 1),
(62, '222222222', '<p>222222222</p>', 1, 66, 1398419348, 1398419348, 2130706433, 1),
(63, '22222222', '<p>22222222222</p>', 1, 66, 1398419353, 1398419353, 2130706433, 1),
(64, '2222222222222222', '<p>22222222222</p>', 1, 66, 1398419357, 1398419357, 2130706433, 1),
(65, '2222222222222', '<p>2222222222222222</p>', 1, 66, 1398419362, 1398419362, 2130706433, 1),
(66, '222222222222', '<p>22222222222222</p>', 1, 66, 1398419367, 1398419367, 2130706433, 1),
(67, '222222222222222', '<p>22222222222222222222</p>', 1, 66, 1398419373, 1398419373, 2130706433, 1),
(68, '222222222222222', '<p>22222222222222222222222</p>', 1, 66, 1398419378, 1398419378, 2130706433, 1),
(69, '22222222222', '<p>2222222222222222222</p>', 1, 66, 1398419390, 1398419390, 2130706433, 1),
(70, '122', '<p>123123</p>', 1, 66, 1398419402, 1398419402, 2130706433, 1),
(71, 'qqqqqqqqqqq', '<p>qqqqqqqqq</p>', 1, 66, 1398419424, 1398419424, 2130706433, 1),
(72, 'qqqqqq', '<p>qqqqqqqqqqqqqq</p>', 1, 0, 1398419533, 1398419533, 2130706433, 1),
(73, '', '', 1, 66, 1398419753, 1398419753, 2130706433, 1),
(74, '', '', 1, 66, 1398419770, 1398419770, 2130706433, 1),
(75, '1111111111', '<p>111111111111</p>', 1, 66, 1398419778, 1398419778, 2130706433, 1),
(76, '11111', '<p>11</p>', 1, 66, 1398419784, 1398419784, 2130706433, 1),
(77, '', '', 1, 66, 1398419787, 1398419787, 2130706433, 1),
(78, '111111111111', '<p>11111111111</p>', 1, 66, 1398419795, 1398420012, 2130706433, 1),
(121, '1', '<p>1</p>', 157, 147, 1398826770, 1398826770, 2130706433, 1),
(122, '1', '<p>1</p>', 157, 147, 1398826824, 1398826824, 2130706433, 1),
(123, '1', '<p>1</p>', 157, 148, 1398826944, 1398826944, 2130706433, 1),
(124, 'qqqqqqq', '<p>qqqqqwe</p>', 157, 149, 1398827231, 1398827387, 2130706433, 1),
(125, 'qqqqqqq', '<p>qqqqsd</p>', 157, 149, 1398827378, 1398827378, 2130706433, 1),
(126, 'qqqqqqq', '<p>qqqqsdasasd</p>', 157, 149, 1398827561, 1398827561, 2130706433, 1),
(127, 'q', '<p>qww1</p>', 157, 150, 1398827814, 1398827814, 2130706433, 1),
(128, '1', '<p>1</p>', 157, 151, 1398827947, 1398827947, 2130706433, 1),
(129, 'q', '<p>q</p>', 157, 151, 1398828021, 1398828021, 2130706433, 1),
(130, 'q', '<p>qqqw1</p>', 157, 151, 1398828407, 1398828407, 2130706433, 1),
(131, '111', '<p>111</p>', 157, 151, 1398828515, 1398828515, 2130706433, 1),
(132, '2', '<p>22</p>', 157, 153, 1398828721, 1398828721, 2130706433, 1),
(133, '1', '<p>12</p>', 157, 153, 1398828799, 1398828799, 2130706433, 1),
(134, '1', '<p>12</p>', 157, 153, 1398828831, 1398828831, 2130706433, 1),
(135, '1', '<p>2</p>', 157, 153, 1398828868, 1398828868, 2130706433, 1),
(136, '1', '<p>1</p>', 157, 153, 1398828876, 1398828876, 2130706433, 1),
(137, '1', '<p>woq1</p>', 157, 153, 1398829317, 1398829317, 2130706433, 1),
(138, '22', '<p>22wo 1</p>', 157, 153, 1398829327, 1398829327, 2130706433, 1),
(139, '1', '<p>1112222</p>', 157, 153, 1398829340, 1398829340, 2130706433, 1),
(140, '1', '<p>1qw2</p>', 157, 155, 1398830383, 1398830383, 2130706433, 1),
(141, '我就是我', '<p>121 我</p>', 157, 156, 1398836427, 1398836427, 2130706433, 1),
(142, '你妹', '<p>你妹</p>', 157, 156, 1398836437, 1398836437, 2130706433, 1),
(143, '1212', '<p>&nbsp;&nbsp;&nbsp;&nbsp;12344111<br/></p>', 209, 158, 1398840405, 1398840423, 2130706433, 1),
(144, 'adsf', '<p>aaaaaaaaa</p>', 157, 159, 1398840995, 1398840995, 2130706433, 1),
(145, 'asdfa', '<p>asdfasd</p>', 157, 159, 1398841001, 1398841001, 2130706433, 1),
(146, 'wo shi 111', '<p>w 1111wo&nbsp;<br/></p>', 157, 159, 1399015158, 1399015246, 2130706433, 1),
(147, 'ADF', '<p>AF</p>', 157, 159, 1399271948, 1399271948, 2130706433, 1),
(148, '11', '<p>111</p>', 157, 161, 1399272024, 1399272024, 2130706433, 1);

-- --------------------------------------------------------

--
-- 表的结构 `webmsg`
--

CREATE TABLE IF NOT EXISTS `webmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL DEFAULT 'logo.jpg',
  `ban` text NOT NULL,
  `webname` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `webmsg`
--

INSERT INTO `webmsg` (`id`, `logo`, `ban`, `webname`, `msg`) VALUES
(1, '20140509536c4034b92af21449.jpg', '心情小栈 , 独家放送 ，违版必究哦  ', '心情小栈', '本站可以抒发各种心情,各种闹心，和各种调调 ,有木有');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
