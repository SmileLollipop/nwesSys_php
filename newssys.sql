-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-07-07 15:30:32
-- 服务器版本： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newssys`
--

-- --------------------------------------------------------

--
-- 表的结构 `news_admin`
--

CREATE TABLE IF NOT EXISTS `news_admin` (
  `id` tinyint(3) unsigned NOT NULL COMMENT '主键id，自动增长',
  `username` varchar(10) NOT NULL COMMENT '用户名，唯一约束 ',
  `password` char(32) NOT NULL COMMENT '加密后的密码',
  `salt` char(6) NOT NULL COMMENT '密钥'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news_admin`
--

INSERT INTO `news_admin` (`id`, `username`, `password`, `salt`) VALUES
(1, 'admin', '56802b0058be8a26bd633d5f46760dfb', 'ItcAst');

-- --------------------------------------------------------

--
-- 表的结构 `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL COMMENT '主键id，自动增长',
  `name` varchar(20) NOT NULL COMMENT '新闻分类名称'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news_category`
--

INSERT INTO `news_category` (`id`, `name`) VALUES
(1, '推荐'),
(2, '百家'),
(3, '本地'),
(4, '图片'),
(5, '娱乐'),
(6, '社会'),
(7, '军事'),
(8, '女人'),
(9, '搞笑'),
(10, '科技'),
(11, '互联网');

-- --------------------------------------------------------

--
-- 表的结构 `news_list`
--

CREATE TABLE IF NOT EXISTS `news_list` (
  `id` int(10) unsigned NOT NULL COMMENT '主键id，自动增长',
  `cid` int(10) unsigned NOT NULL COMMENT '分类id',
  `title` varchar(60) NOT NULL COMMENT '新闻标题',
  `lable` varchar(20) NOT NULL COMMENT '新闻标签',
  `img` varchar(200) NOT NULL COMMENT '新闻插图路径',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新闻添加时间'
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news_list`
--

INSERT INTO `news_list` (`id`, `cid`, `title`, `lable`, `img`, `time`) VALUES
(52, 1, '习近平指示解放军和武警部队支持防汛救灾', '防汛救灾', '2016-07/07/577e2ee665ce5.jpg', '2016-07-06 23:39:02'),
(53, 1, '马云阿里上汽互联网汽车：便宜得惊人', '猜你喜欢', '2016-07/07/577e2ed880188.jpg', '2016-07-06 23:44:35'),
(54, 1, '北京将落实延迟退休政策 女干部或将率先施行', '搜狐要闻', '2016-07/07/577e2ecc65aaf.JPEG', '2016-07-06 23:46:52'),
(55, 1, '京东企业购杀入阿里大本营,市场格局为何出现一边倒?', '百家原创', '2016-07/07/577e2ebfd75cb.jpg', '2016-07-06 23:51:24'),
(56, 1, '冰晨携手向武汉捐款100万元：望快点雨过天晴', '搜狐要闻', '2016-07/07/577e2ea8b1f90.JPEG', '2016-07-06 23:55:27'),
(57, 1, '血的教训！雨天用车务必注意这几点', '百家原创', '2016-07/07/577e2e8a425cd.jpg', '2016-07-06 23:57:17'),
(58, 1, '历经四年，奇瑞小蚂蚁终于不只是概念了', '搜狐汽车', '2016-07/07/577e2e6fe56ae.jpg', '2016-07-07 00:00:18'),
(59, 2, '市场发展缓慢，中国独立游戏到底缺少些什么?', '游戏', '2016-07/07/577e2e209f2dc.jpg', '2016-07-07 00:03:00'),
(61, 2, '沟通越多，越难以沟通？ | 青山冷思考', '思考', '2016-07/07/577e2e166ec8a.jpg', '2016-07-07 00:04:27'),
(62, 2, '中国好声音复议被法院驳回，田明的恼火 反思与野心', '中国好声音', '2016-07/07/577e2d88f1496.jpg', '2016-07-07 00:05:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_admin`
--
ALTER TABLE `news_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_list`
--
ALTER TABLE `news_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_admin`
--
ALTER TABLE `news_admin`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id，自动增长',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id，自动增长',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news_list`
--
ALTER TABLE `news_list`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id，自动增长',AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
