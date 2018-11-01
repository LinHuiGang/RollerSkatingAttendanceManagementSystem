-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-11-01 10:25:26
-- 服务器版本： 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `coach` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(6) NOT NULL,
  `password` varchar(20) NOT NULL,
  `class_hour_sum` int(10) NOT NULL,
  `identity` varchar(10) NOT NULL,
  `add_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `coach`
--

INSERT INTO `coach` (`id`, `name`, `password`, `class_hour_sum`, `identity`, `add_time`) VALUES
(1, '王渊', '123456', 10, '管理员', '2018-10-09'),
(2, '李学子', '123456', 0, '教练', '2018-10-10'),
(7, '付晓冉', '123456', 0, '教练', '0000-00-00'),
(8, '戎锦朝', '1234567', 0, '管理员', '0000-00-00');

-- --------------------------------------------------------

--
-- 表的结构 `qiandao`
--

CREATE TABLE `qiandao` (
  `id` int(5) NOT NULL,
  `name_` varchar(5) NOT NULL,
  `qd_time` datetime NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
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
  `scope` varchar(10) DEFAULT '室内' COMMENT '练习场地',
  `password` varchar(20) NOT NULL DEFAULT '123456',
  `start_time` date NOT NULL,
  `end_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tongji`
--

CREATE TABLE `tongji` (
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
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `coach`
--
ALTER TABLE `coach`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
