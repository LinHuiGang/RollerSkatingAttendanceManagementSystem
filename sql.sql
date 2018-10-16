-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-10-16 10:49:23
-- 服务器版本： 5.6.37-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunhua_ym998_cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(6) NOT NULL,
  `password` varchar(20) NOT NULL,
  `class_hour_sum` int(10) NOT NULL,
  `identity` varchar(10) NOT NULL,
  `add_time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `coach`
--

INSERT INTO `coach` (`id`, `name`, `password`, `class_hour_sum`, `identity`, `add_time`) VALUES
(1, '王渊', '123456', 10, '管理员', '2018-10-09'),
(2, '李学子', '123456', 0, '教练', '2018-10-10');

-- --------------------------------------------------------

--
-- 表的结构 `qiandao`
--

CREATE TABLE IF NOT EXISTS `qiandao` (
  `id` int(5) NOT NULL,
  `name_` varchar(5) NOT NULL,
  `qd_time` datetime NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `qiandao`
--

INSERT INTO `qiandao` (`id`, `name_`, `qd_time`, `name`) VALUES
(1007, '张俊淇', '2018-10-13 22:49:50', '王渊'),
(1008, '孙婧涵', '2018-10-13 22:49:50', '王渊'),
(1009, '董若涵', '2018-10-13 22:49:50', '王渊'),
(1010, '李天乐', '2018-10-13 22:49:50', '王渊'),
(1011, '丁芝涵', '2018-10-13 22:49:50', '王渊'),
(1012, '宋奕霖', '2018-10-13 22:49:50', '王渊'),
(1013, '魏凡雅', '2018-10-13 22:49:50', '王渊'),
(1014, '蔡正熙', '2018-10-13 22:49:50', '王渊'),
(1007, '张俊淇', '2018-10-13 22:49:59', '王渊'),
(1008, '孙婧涵', '2018-10-13 22:49:59', '王渊'),
(1009, '董若涵', '2018-10-13 22:49:59', '王渊'),
(1010, '李天乐', '2018-10-13 22:49:59', '王渊'),
(1011, '丁芝涵', '2018-10-13 22:49:59', '王渊'),
(1012, '宋奕霖', '2018-10-13 22:49:59', '王渊'),
(1013, '魏凡雅', '2018-10-13 22:49:59', '王渊'),
(1014, '蔡正熙', '2018-10-13 22:49:59', '王渊'),
(1007, '张俊淇', '2018-10-13 22:50:06', '王渊'),
(1008, '孙婧涵', '2018-10-13 22:50:06', '王渊'),
(1009, '董若涵', '2018-10-13 22:50:06', '王渊'),
(1010, '李天乐', '2018-10-13 22:50:06', '王渊'),
(1011, '丁芝涵', '2018-10-13 22:50:06', '王渊'),
(1012, '宋奕霖', '2018-10-13 22:50:06', '王渊'),
(1013, '魏凡雅', '2018-10-13 22:50:06', '王渊'),
(1014, '蔡正熙', '2018-10-13 22:50:06', '王渊');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `name_` varchar(10) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `age` int(5) NOT NULL,
  `birth_date` date NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `money` int(15) NOT NULL COMMENT '所交费用',
  `type` varchar(10) NOT NULL COMMENT '报名类型',
  `max_count` int(10) NOT NULL COMMENT '最大次数',
  `integral` varchar(20) NOT NULL COMMENT '备注',
  `password` varchar(20) NOT NULL DEFAULT '123456',
  `start_time` date NOT NULL,
  `end_time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1016 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `name_`, `sex`, `age`, `birth_date`, `height`, `weight`, `phone`, `money`, `type`, `max_count`, `integral`, `password`, `start_time`, `end_time`) VALUES
(1007, '张俊淇', '男', 6, '2011-05-27', 125, 65, '13920047650', 6400, '年卡', 365, '0', '111111', '2017-10-01', '2018-10-02'),
(1008, '孙婧涵', '女', 6, '2009-03-27', 135, 62, '13502058702', 6400, '年卡', 365, '0', '111111', '2017-10-01', '2018-10-02'),
(1009, '董若涵', '女', 6, '2011-07-23', 120, 48, '13512981611', 1400, '次卡', 24, '0', '111111', '2017-10-01', '2018-02-21'),
(1010, '李天乐', '男', 6, '2011-06-30', 115, 40, '13752289005', 5800, '年卡', 365, '0', '111111', '2017-10-01', '2018-11-01'),
(1011, '丁芝涵', '女', 5, '2012-01-21', 125, 44, '18630841795', 6200, '年卡', 0, '0', '111111', '2017-10-01', '2018-10-01'),
(1012, '宋奕霖', '女', 5, '2013-04-19', 110, 32, '13207508896', 3200, '次卡', 50, '0', '111111', '2017-10-01', '2019-02-02'),
(1013, '魏凡雅', '女', 6, '2011-08-09', 150, 50, '18622146133', 2080, '次卡', 24, '0', '111111', '2017-10-01', '2018-02-21'),
(1014, '蔡正熙', '男', 6, '2011-05-22', 110, 41, '13821770722', 3000, '次卡', 59, '0', '111111', '2017-10-01', '2020-09-09');

-- --------------------------------------------------------

--
-- 表的结构 `tongji`
--

CREATE TABLE IF NOT EXISTS `tongji` (
  `timermb` varchar(20) NOT NULL,
  `timermb1` varchar(20) NOT NULL,
  `timermb2` varchar(20) NOT NULL,
  `timermb3` varchar(20) NOT NULL,
  `timermb4` varchar(20) NOT NULL,
  `timermb5` varchar(20) NOT NULL,
  `timermb6` varchar(20) NOT NULL,
  `timermb7` varchar(20) NOT NULL,
  `timermb8` varchar(20) NOT NULL,
  `timermb9` varchar(20) NOT NULL,
  `timermb10` varchar(20) NOT NULL,
  `timermb11` varchar(20) NOT NULL,
  `timermb12` varchar(20) NOT NULL,
  `timermb13` varchar(20) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tongji`
--

INSERT INTO `tongji` (`timermb`, `timermb1`, `timermb2`, `timermb3`, `timermb4`, `timermb5`, `timermb6`, `timermb7`, `timermb8`, `timermb9`, `timermb10`, `timermb11`, `timermb12`, `timermb13`, `id`) VALUES
('9740', '20298', '3740', '17512', '21003', '4140', '2582', '888821', '1111', '22223', '5852', '541112', '5555', '5511', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tongji`
--
ALTER TABLE `tongji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1016;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
