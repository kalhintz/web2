-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 17-12-17 20:57 
-- 서버 버전: 5.1.41
-- PHP 버전: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `ps`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `countb`
--

CREATE TABLE IF NOT EXISTS `countb` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `counter` int(11) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 테이블의 덤프 데이터 `countb`
--

INSERT INTO `countb` (`num`, `counter`, `regdate`) VALUES
(1, 6, '2017-11-24'),
(2, 5, '2017-12-02'),
(3, 2, '2017-12-03'),
(4, 1, '2017-12-04'),
(5, 1, '2017-12-05'),
(6, 1, '2017-12-06'),
(7, 1, '2017-12-08'),
(8, 1, '2017-12-09'),
(9, 1, '2017-12-10'),
(10, 1, '2017-12-11'),
(11, 1, '2017-12-12'),
(12, 1, '2017-12-14'),
(13, 2, '2017-12-15'),
(14, 1, '2017-12-16'),
(15, 2, '2017-12-17');

-- --------------------------------------------------------

--
-- 테이블 구조 `free`
--

CREATE TABLE IF NOT EXISTS `free` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `group_num` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `nick` char(10) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `file_name_0` char(40) DEFAULT NULL,
  `file_name_1` char(40) DEFAULT NULL,
  `file_name_2` char(40) DEFAULT NULL,
  `file_name_3` char(40) DEFAULT NULL,
  `file_name_4` char(40) DEFAULT NULL,
  `file_copied_0` char(30) DEFAULT NULL,
  `file_copied_1` char(30) DEFAULT NULL,
  `file_copied_2` char(30) DEFAULT NULL,
  `file_copied_3` char(30) DEFAULT NULL,
  `file_copied_4` char(30) DEFAULT NULL,
  `file_type_0` char(30) DEFAULT NULL,
  `file_type_1` char(30) DEFAULT NULL,
  `file_type_2` char(30) DEFAULT NULL,
  `file_type_3` char(30) DEFAULT NULL,
  `file_type_4` char(30) DEFAULT NULL,
  `file_size_0` char(30) DEFAULT NULL,
  `file_size_1` char(30) DEFAULT NULL,
  `file_size_2` char(30) DEFAULT NULL,
  `file_size_3` char(30) DEFAULT NULL,
  `file_size_4` char(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 테이블의 덤프 데이터 `free`
--

INSERT INTO `free` (`num`, `group_num`, `depth`, `ord`, `id`, `name`, `nick`, `subject`, `content`, `regist_day`, `hit`, `file_name_0`, `file_name_1`, `file_name_2`, `file_name_3`, `file_name_4`, `file_copied_0`, `file_copied_1`, `file_copied_2`, `file_copied_3`, `file_copied_4`, `file_type_0`, `file_type_1`, `file_type_2`, `file_type_3`, `file_type_4`, `file_size_0`, `file_size_1`, `file_size_2`, `file_size_3`, `file_size_4`) VALUES
(7, 7, 0, 0, 'admin2', '', '', '11', '<p>11</p>', '2017-12-15 (18:47)', 10, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL),
(12, 7, 1, 1, 'admin2', '', '', '[re]11', '&gt;<p>11</p>', '2017-12-15 (19:18)', 1, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `free_ripple`
--

CREATE TABLE IF NOT EXISTS `free_ripple` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `nick` char(10) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 테이블의 덤프 데이터 `free_ripple`
--

INSERT INTO `free_ripple` (`num`, `parent`, `id`, `name`, `nick`, `content`, `regist_day`, `type`) VALUES
(52, 7, 'admin2', '', '', 'sdf', '2017-12-15 (19:24)', 'free');

-- --------------------------------------------------------

--
-- 테이블 구조 `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `itemname` varchar(200) NOT NULL,
  `pricename` varchar(200) NOT NULL,
  `price` varchar(30) NOT NULL,
  `qut` int(11) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=61 ;

--
-- 테이블의 덤프 데이터 `item`
--

INSERT INTO `item` (`num`, `code`, `type`, `itemname`, `pricename`, `price`, `qut`) VALUES
(3, 1, '오전권 9시 - 13시', '스키', '일반', '10,000', 50),
(4, 1, '오전권 9시 - 13시', '스키', '고급', '15,000', 50),
(5, 1, '오전권 9시 - 13시', '보드', '일반', '10,000', 50),
(6, 1, '오전권 9시 - 13시', '보드', '고급', '15,000', 50),
(7, 1, '오전권 9시 - 13시', '의류', '', '10,000', 50),
(16, 1, '야간권 18시30분 - 23시', '스키', '일반', '10,000', 50),
(9, 1, '오전권 9시 - 13시', '리프트', '대인', '28,700', 50),
(10, 1, '오후권 13시 - 17시', '스키', '일반', '10,000', 50),
(11, 1, '오후권 13시 - 17시', '스키', '고급', '10,000', 50),
(12, 1, '오후권 13시 - 17시', '보드', '일반', '15,000', 50),
(13, 1, '오후권 13시 - 17시', '보드', '고급', '30,800', 50),
(14, 1, '오후권 13시 - 17시', '의류', '', '10,000', 50),
(15, 1, '오후권 13시 - 17시', '리프트', '대인', '15,000', 50),
(17, 1, '야간권 18시30분 - 23시', '스키', '고급', '10,000', 50),
(18, 1, '야간권 18시30분 - 23시', '보드', '일반', '15,000', 50),
(19, 1, '야간권 18시30분 - 23시', '보드', '고급', '30,800', 50),
(20, 1, '야간권 18시30분 - 23시', '의류', '', '10,000', 50),
(21, 1, '야간권 18시30분 - 23시', '리프트', '대인', '15,000', 50),
(22, 1, '심야권 22시 - 05시', '스키', '일반', '10,000', 50),
(23, 1, '심야권 22시 - 05시', '스키', '고급', '10,000', 50),
(24, 1, '심야권 22시 - 05시', '보드', '일반', '15,000', 50),
(25, 1, '심야권 22시 - 05시', '보드', '고급', '32,900', 50),
(26, 1, '심야권 22시 - 05시', '의류', '', '10,000', 50),
(27, 1, '심야권 22시 - 05시', '리프트', '대인', '15,000', 50),
(28, 1, '백야권 24시 - 05시', '스키', '일반', '10,000', 50),
(29, 1, '백야권 24시 - 05시', '스키', '고급', '10,000', 50),
(30, 1, '백야권 24시 - 05시', '보드', '일반', '15,000', 50),
(31, 1, '백야권 24시 - 05시', '보드', '고급', '32,900', 50),
(32, 1, '백야권 24시 - 05시', '의류', '', '10,000', 50),
(33, 1, '백야권 24시 - 05시', '리프트', '대인', '15,000', 50),
(34, 1, '주간 (오전+오후) 9시 - 5시', '스키', '일반', '10,000', 50),
(35, 1, '주간 (오전+오후) 9시 - 5시', '스키', '고급', '10,000', 50),
(36, 1, '주간 (오전+오후) 9시 - 5시', '보드', '일반', '15,000', 50),
(37, 1, '주간 (오전+오후) 9시 - 5시', '보드', '고급', '32,900', 50),
(38, 1, '주간 (오전+오후) 9시 - 5시', '의류', '', '10,000', 50),
(39, 1, '주간 (오전+오후) 9시 - 5시', '리프트', '대인', '15,000', 50),
(40, 1, '오후야간 13시 - 23시', '스키', '일반', '10,000', 50),
(41, 1, '오후야간 13시 - 23시', '스키', '고급', '10,000', 50),
(42, 1, '오후야간 13시 - 23시', '보드', '일반', '15,000', 50),
(43, 1, '오후야간 13시 - 23시', '보드', '고급', '32,900', 50),
(44, 1, '오후야간 13시 - 23시', '의류', '', '10,000', 50),
(45, 1, '오후야간 13시 - 23시', '리프트', '대인', '15,000', 50),
(46, 1, 'ALLNIGHT 18시30분 - 05시', '스키', '일반', '10,000', 50),
(47, 1, 'ALLNIGHT 18시30분 - 05시', '스키', '고급', '10,000', 50),
(48, 1, 'ALLNIGHT 18시30분 - 05시', '보드', '일반', '15,000', 50),
(49, 1, 'ALLNIGHT 18시30분 - 05시', '보드', '고급', '32,900', 50),
(50, 1, 'ALLNIGHT 18시30분 - 05시', '의류', '', '10,000', 50),
(51, 1, 'ALLNIGHT 18시30분 - 05시', '리프트', '대인', '15,000', 50),
(52, 2, '1:1 강습', '강습권', '반일권', '120,000', 10),
(53, 2, '1:1 강습', '강습권', '주간', '200,000', 10),
(54, 2, '2:1 강습', '강습권', '반일권', '70,000', 10),
(55, 2, '2:1 강습', '강습권', '주간', '100,000', 10),
(56, 2, '3:1 강습', '강습권', '반일권', '50,000', 10),
(57, 2, '3:1 강습', '강습권', '주간', '70,000', 10),
(58, 3, '펜션', '커플룸', '2인용', '100,000', 10),
(59, 3, '펜션', '프렌드룸', '4~6인용', '150,000', 10),
(60, 3, '펜션', '대형룸', '8인이상', '180,000', 10);

-- --------------------------------------------------------

--
-- 테이블 구조 `mainimg`
--

CREATE TABLE IF NOT EXISTS `mainimg` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(200) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `mainimg`
--

INSERT INTO `mainimg` (`num`, `src`) VALUES
(1, 'data/cc1.jpg'),
(2, 'data/ski2.jpg'),
(3, 'data/cc3.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `uno` int(11) NOT NULL AUTO_INCREMENT,
  `sosok` varchar(6) DEFAULT NULL,
  `com_name` varchar(50) DEFAULT NULL,
  `ceo_name` varchar(20) DEFAULT NULL,
  `jikwi` varchar(30) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `security_id1` varchar(10) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `hand_tel1` varchar(12) DEFAULT NULL,
  `e_mail01` varchar(50) DEFAULT NULL,
  `job_type` varchar(20) DEFAULT NULL,
  `fax1` varchar(12) DEFAULT NULL,
  `czip1` char(6) DEFAULT NULL,
  `caddress` varchar(100) DEFAULT NULL,
  `ctel1` varchar(12) DEFAULT NULL,
  `mem_yn` char(1) DEFAULT NULL,
  `mem_type` char(2) DEFAULT NULL,
  `joining_time` datetime DEFAULT NULL,
  `last_joining_time` date DEFAULT NULL,
  PRIMARY KEY (`uno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`uno`, `sosok`, `com_name`, `ceo_name`, `jikwi`, `user_name`, `security_id1`, `user_id`, `passwd`, `hand_tel1`, `e_mail01`, `job_type`, `fax1`, `czip1`, `caddress`, `ctel1`, `mem_yn`, `mem_type`, `joining_time`, `last_joining_time`) VALUES
(2, NULL, '대림', '권승환', '', '대리', '1234123', 'admin', '1234', '01051009151', 'shinhwa1156@gmail.com', '', '0332545454', '06000', '서울 강남구 강남대로 708 (압구정동, 한남대교레인보우카폐)', '0332513059', 'Y', 'A', '2017-11-25 16:17:56', '2017-12-17'),
(6, NULL, '123', '테스터', '123', '123', '111111', 'test', '1234', '01051009151', 'shinhwa1156@gmail.com', '', '0332545478', '42937', '대구 달성군 가창면 퇴계길 5 (행정리)', '0332513059', 'Y', 'E', '2017-12-16 19:05:05', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `group_num` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `nick` char(10) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `file_name_0` char(40) DEFAULT NULL,
  `file_name_1` char(40) DEFAULT NULL,
  `file_name_2` char(40) DEFAULT NULL,
  `file_name_3` char(40) DEFAULT NULL,
  `file_name_4` char(40) DEFAULT NULL,
  `file_copied_0` char(30) DEFAULT NULL,
  `file_copied_1` char(30) DEFAULT NULL,
  `file_copied_2` char(30) DEFAULT NULL,
  `file_copied_3` char(30) DEFAULT NULL,
  `file_copied_4` char(30) DEFAULT NULL,
  `file_type_0` char(30) DEFAULT NULL,
  `file_type_1` char(30) DEFAULT NULL,
  `file_type_2` char(30) DEFAULT NULL,
  `file_type_3` char(30) DEFAULT NULL,
  `file_type_4` char(30) DEFAULT NULL,
  `file_size_0` char(30) DEFAULT NULL,
  `file_size_1` char(30) DEFAULT NULL,
  `file_size_2` char(30) DEFAULT NULL,
  `file_size_3` char(30) DEFAULT NULL,
  `file_size_4` char(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`num`, `group_num`, `depth`, `ord`, `id`, `name`, `nick`, `subject`, `content`, `regist_day`, `hit`, `file_name_0`, `file_name_1`, `file_name_2`, `file_name_3`, `file_name_4`, `file_copied_0`, `file_copied_1`, `file_copied_2`, `file_copied_3`, `file_copied_4`, `file_type_0`, `file_type_1`, `file_type_2`, `file_type_3`, `file_type_4`, `file_size_0`, `file_size_1`, `file_size_2`, `file_size_3`, `file_size_4`) VALUES
(16, 16, 0, 0, 'admin2', '', '', 'asdfasdf', 'sdf', '2017-11-26 (12:19)', 14, 'admin.jpg', '', '', NULL, NULL, '2017_12_17_20_56_11_0.jpg', '', '', NULL, NULL, 'jpg', '', '', NULL, NULL, '22043', '0', '0', NULL, NULL),
(17, 17, 0, 0, 'admin2', '', '', 'fasfasf', 'sadf', '2017-11-26 (17:29)', 3, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL),
(19, 19, 0, 0, 'admin2', '', '', 'asdfasfas', '<p>dfasfasfd</p>', '2017-11-26 (17:34)', 1, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL),
(20, 20, 0, 0, 'admin2', '', '', 'ㅁㄴㅇㄹ', '<p>ㅁㄴㅇㄹ</p>', '2017-11-26 (19:16)', 0, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL),
(21, 21, 0, 0, 'admin2', '', '', 'ㅁㄴㅇㄹ', '<p>ㅁㄴㅇㄹ</p>', '2017-11-26 (19:16)', 2, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL),
(22, 22, 0, 0, 'admin2', '', '', 'ㅁㄴㅇㄹ', '<p>ㅁㄴㅇㄹ</p>', '2017-11-26 (19:16)', 1, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '0', '0', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `bank` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 테이블의 덤프 데이터 `payment`
--

INSERT INTO `payment` (`num`, `bank`, `account`, `name`) VALUES
(1, 3, '123-4567-89111', '권승환');

-- --------------------------------------------------------

--
-- 테이블 구조 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `group_num` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `nick` char(10) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `file_name_0` char(40) DEFAULT NULL,
  `file_name_1` char(40) DEFAULT NULL,
  `file_name_2` char(40) DEFAULT NULL,
  `file_name_3` char(40) DEFAULT NULL,
  `file_name_4` char(40) DEFAULT NULL,
  `file_copied_0` char(30) DEFAULT NULL,
  `file_copied_1` char(30) DEFAULT NULL,
  `file_copied_2` char(30) DEFAULT NULL,
  `file_copied_3` char(30) DEFAULT NULL,
  `file_copied_4` char(30) DEFAULT NULL,
  `file_type_0` char(30) DEFAULT NULL,
  `file_type_1` char(30) DEFAULT NULL,
  `file_type_2` char(30) DEFAULT NULL,
  `file_type_3` char(30) DEFAULT NULL,
  `file_type_4` char(30) DEFAULT NULL,
  `file_size_0` char(30) DEFAULT NULL,
  `file_size_1` char(30) DEFAULT NULL,
  `file_size_2` char(30) DEFAULT NULL,
  `file_size_3` char(30) DEFAULT NULL,
  `file_size_4` char(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 테이블의 덤프 데이터 `photo`
--

INSERT INTO `photo` (`num`, `group_num`, `depth`, `ord`, `id`, `name`, `nick`, `subject`, `content`, `regist_day`, `hit`, `file_name_0`, `file_name_1`, `file_name_2`, `file_name_3`, `file_name_4`, `file_copied_0`, `file_copied_1`, `file_copied_2`, `file_copied_3`, `file_copied_4`, `file_type_0`, `file_type_1`, `file_type_2`, `file_type_3`, `file_type_4`, `file_size_0`, `file_size_1`, `file_size_2`, `file_size_3`, `file_size_4`) VALUES
(22, 22, 0, 0, 'admin2', '', '', '1', '<p><img src="../upload/img_1.jpg" title="img_1.jpg">asfd<br style="clear:both;">&nbsp;</p>', '2017-12-15 (20:15)', 0, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
  `uno` int(11) NOT NULL AUTO_INCREMENT,
  `gubun` varchar(20) DEFAULT NULL,
  `iname` varchar(10) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `hp` varchar(12) DEFAULT NULL,
  `strlist` varchar(200) NOT NULL,
  `total1` varchar(50) NOT NULL,
  `code` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reservation_date_time` date DEFAULT NULL,
  `address` varchar(10) DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `comment` longtext,
  `hit` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `gno` int(11) DEFAULT NULL,
  `stcount` int(11) DEFAULT NULL,
  `replynum` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 테이블의 덤프 데이터 `reserve`
--

INSERT INTO `reserve` (`uno`, `gubun`, `iname`, `cname`, `hp`, `strlist`, `total1`, `code`, `email`, `reservation_date_time`, `address`, `register_date`, `comment`, `hit`, `num`, `gno`, `stcount`, `replynum`, `status`) VALUES
(20, NULL, 'sddfasf', NULL, '12341234123', '펜션(프렌드룸 4인∼6인)=1매,펜션(대형룸 8인이상)=3매', '690,000원', 'U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,C,1,C,3,', '', '2017-12-29', NULL, '2017-11-27', 'asdfasdfasf', 4, 1, 1, 1, 0, '예약접수'),
(21, NULL, 'sddfasf', NULL, '12341234123', '3:1강습권(주간)=1매,펜션(프렌드룸 4인∼6인)=1매,펜션(대형룸 8인이상)=1매', '400,000원', 'U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,C,1,U,N,C,1,C,1,', '', '2017-12-14', NULL, '2017-11-27', 'asdfasdfasf', 42, 2, 2, 1, 0, '예약접수'),
(22, NULL, 'sadf', NULL, '12341234123', '오전권(9시-13시)-보드[일반]=2매,1:1강습권(주간)=3매', '620,000원', 'U,N,C,2,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,U,N,C,3,U,N,U,N,U,N,U,N,U,N,U,N,U,N,', '', '2017-12-29', NULL, '2017-12-02', 'asdf', 3, 3, 3, 1, 0, '예약접수');
