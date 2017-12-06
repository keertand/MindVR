-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 11:06 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myndvr_myfamily`
--

-- --------------------------------------------------------

--
-- Table structure for table `connectedmedia`
--

CREATE TABLE `connectedmedia` (
  `connectionid` int(11) NOT NULL,
  `env_id` int(11) NOT NULL,
  `env_config_id` int(11) NOT NULL,
  `img_placeholder` int(11) NOT NULL,
  `video_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `env1`
--

CREATE TABLE `env1` (
  `env_config_id` int(11) NOT NULL,
  `user_id` int(4) NOT NULL,
  `s_id` int(11) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `img_no` int(2) NOT NULL DEFAULT '8',
  `img_placeholder_1` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_2` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_3` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_4` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_5` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_6` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_7` int(5) NOT NULL DEFAULT '0',
  `img_placeholder_8` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `env1`
--

INSERT INTO `env1` (`env_config_id`, `user_id`, `s_id`, `timestamp`, `flag`, `img_no`, `img_placeholder_1`, `img_placeholder_2`, `img_placeholder_3`, `img_placeholder_4`, `img_placeholder_5`, `img_placeholder_6`, `img_placeholder_7`, `img_placeholder_8`) VALUES
(1, 1, 4, '1512347596', -2, 8, 0, 0, 12, 0, 0, 0, 0, 0),
(2, 1, 4, '1512371271', 0, 8, 12, 13, 0, 0, 0, 0, 0, 0),
(3, 1, 7, '1512349880', 0, 8, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 1, 4, '1512265729', -2, 8, 1, 1, 0, 0, 0, 0, 0, 0),
(4, 1, 7, '1512363461', 0, 8, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 4, '1512287128', -2, 8, 1, 1, 1, 7, 7, 7, 7, 1),
(7, 1, 4, '1512364613', 0, 8, 1, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 4, '1512348789', 1, 8, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `environments`
--

CREATE TABLE `environments` (
  `env_id` int(11) NOT NULL,
  `env_name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `side1` varchar(200) NOT NULL,
  `side2` varchar(200) NOT NULL,
  `side3` varchar(200) NOT NULL,
  `side4` varchar(200) NOT NULL,
  `tablename` varchar(200) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `environments`
--

INSERT INTO `environments` (`env_id`, `env_name`, `details`, `side1`, `side2`, `side3`, `side4`, `tablename`, `timestamp`, `flag`) VALUES
(1, '3D Virtual room', '3D virtual room with pictures.. details still to be filled', 'images/environments/wall1.jpg', 'images/environments/wall1.jpg', 'images/environments/wall1.jpg', 'images/environments/wall1.jpg', 'env1', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `familymembers`
--

CREATE TABLE `familymembers` (
  `family_addition_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `s_id` int(5) NOT NULL,
  `familymember_id` int(6) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `familymembers`
--

INSERT INTO `familymembers` (`family_addition_id`, `user_id`, `s_id`, `familymember_id`, `timestamp`, `flag`) VALUES
(2, 1, 2, 7, '1509815909', 1),
(3, 1, 2, 8, '1509815998', 1),
(4, 1, 2, 9, '1509816129', 1),
(5, 1, 2, 10, '1509816225', 0),
(6, 1, 4, 11, '1510033876', 0),
(7, 1, 4, 12, '1510034033', 1),
(8, 1, 5, 13, '1510034145', 0),
(9, 1, 6, 14, '1510260424', 0);

-- --------------------------------------------------------

--
-- Table structure for table `imagedb`
--

CREATE TABLE `imagedb` (
  `img_id` int(5) NOT NULL,
  `img_link` varchar(300) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `s_id` int(11) NOT NULL,
  `uploaded_by` int(6) NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `videoflag` int(1) NOT NULL,
  `uploadedon` varchar(100) NOT NULL,
  `currentlyused` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagedb`
--

INSERT INTO `imagedb` (`img_id`, `img_link`, `user_id`, `s_id`, `uploaded_by`, `img_name`, `videoflag`, `uploadedon`, `currentlyused`) VALUES
(1, 'images/user_resources/1/1_image_1509833004.jpg', '1', 4, 0, 'Anusha picture', 0, '1509833004', 1),
(12, 'images/user_resources/1/1_image_1512345938.JPG', '1', 4, 1, 'moon', 0, '1512345938', 2),
(13, 'images/user_resources/1/1_image_1512350268.jpg', '1', 4, 1, '', 0, '1512350268', 1),
(0, 'images/default.jpg', '1', 1, 1, 'Default', 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE `logfile` (
  `logid` int(11) NOT NULL,
  `type` int(3) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `user_id` int(5) NOT NULL,
  `content_id` int(6) DEFAULT NULL,
  `handler_id` int(6) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`logid`, `type`, `activity`, `timestamp`, `user_id`, `content_id`, `handler_id`, `ip`) VALUES
(1, 1, 'login', '1509054786', 1, NULL, 0, '127.0.0.1'),
(2, 1, 'login', '1509056278', 1, NULL, 0, '127.0.0.1'),
(3, 2, 'signup', '1509063424', 34, NULL, 0, ''),
(4, 2, 'signup', '1509063621', 34, NULL, 0, '127.0.0.1'),
(5, 2, 'signup', '1509079141', 2, NULL, 0, '127.0.0.1'),
(6, 2, 'signup', '1509079258', 3, NULL, 0, '127.0.0.1'),
(7, 1, 'login', '1509079355', 3, NULL, 0, '127.0.0.1'),
(8, 3, 'image_upload', '1509085329', 3, 10, 0, '127.0.0.1'),
(9, 1, 'login', '1509086964', 3, NULL, 0, '127.0.0.1'),
(10, 1, 'login', '1509089082', 3, NULL, 0, '127.0.0.1'),
(11, 7, 'addsenior', '1509089091', 3, 1, 0, '127.0.0.1'),
(12, 7, 'addsenior', '1509089223', 3, 1, 0, '127.0.0.1'),
(13, 7, 'addsenior', '1509089280', 3, 1, 0, '127.0.0.1'),
(14, 7, 'addsenior', '1509090139', 3, 2, 0, '127.0.0.1'),
(15, 7, 'addsenior', '1509090387', 3, 3, 0, '127.0.0.1'),
(16, 7, 'addsenior', '1509652759', 3, 4, 0, '127.0.0.1'),
(17, 1, 'login', '1509755744', 1, NULL, 0, '127.0.0.1'),
(18, 1, 'login', '1509755793', 1, NULL, 0, '127.0.0.1'),
(19, 1, 'login', '1509755816', 1, NULL, 0, '127.0.0.1'),
(20, 1, 'login', '1509755873', 1, NULL, 0, '127.0.0.1'),
(21, 1, 'login', '1509755891', 1, NULL, 0, '127.0.0.1'),
(22, 1, 'login', '1509756033', 1, NULL, 0, '127.0.0.1'),
(23, 7, 'addsenior', '1509756743', 1, 2, 0, '127.0.0.1'),
(24, 1, 'login', '1509758184', 1, NULL, 0, '127.0.0.1'),
(27, 9, 'addfamilymember', '1509815998', 1, 3, 0, '127.0.0.1'),
(28, 9, 'addfamilymember', '1509816129', 1, 4, 0, '127.0.0.1'),
(29, 9, 'addfamilymember', '1509816225', 1, 5, 0, '127.0.0.1'),
(30, 1, 'login', '1509818510', 9, NULL, 0, '127.0.0.1'),
(31, 1, 'login', '1509819356', 1, 9, 0, '127.0.0.1'),
(32, 1, 'login', '1509819382', 1, 9, 0, '127.0.0.1'),
(33, 3, 'image_upload', '1509819427', 1, 11, 0, '127.0.0.1'),
(34, 1, 'login', '1509832798', 0, NULL, 0, '127.0.0.1'),
(35, 1, 'login', '1509832937', 1, NULL, 1, '127.0.0.1'),
(36, 1, 'login', '1509832966', 1, NULL, 9, '127.0.0.1'),
(37, 3, 'image_upload', '1509833004', 1, 9, 1, '127.0.0.1'),
(38, 1, 'login', '1509833050', 1, NULL, 1, '127.0.0.1'),
(39, 3, 'image_upload', '1509833254', 1, 1, 2, '127.0.0.1'),
(40, 3, 'image_upload', '1509840613', 1, 1, 3, '127.0.0.1'),
(41, 3, 'image_upload', '1509943872', 1, 1, 4, '127.0.0.1'),
(42, 10, 'delfamilymember', '1509945491', 1, 10, 1, '127.0.0.1'),
(43, 10, 'delfamilymember', '1510033974', 1, 11, 1, '127.0.0.1'),
(44, 10, 'delsenior', '1510034650', 1, 5, 1, '127.0.0.1'),
(45, 1, 'login', '1510075523', 1, NULL, 1, '127.0.0.1'),
(46, 1, 'login', '1510089093', 1, NULL, 1, '127.0.0.1'),
(47, 3, 'image_upload', '1510089547', 1, 5, 1, '127.0.0.1'),
(48, 1, 'login', '1510089587', 1, NULL, 12, '127.0.0.1'),
(49, 3, 'image_upload', '1510089644', 1, 6, 12, '127.0.0.1'),
(50, 1, 'login', '1510260465', 1, NULL, 14, '127.0.0.1'),
(51, 3, 'image_upload', '1510260487', 1, 7, 14, '127.0.0.1'),
(52, 8, 'delsenior', '1510260567', 1, 6, 1, '127.0.0.1'),
(53, 1, 'login', '1510286081', 1, NULL, 1, '127.0.0.1'),
(54, 1, 'login', '1510286165', 1, NULL, 1, '127.0.0.1'),
(55, 1, 'login', '1510291050', 1, NULL, 1, '127.0.0.1'),
(56, 1, 'login', '1510291348', 1, NULL, 1, '127.0.0.1'),
(57, 1, 'login', '1510291938', 1, NULL, 1, '127.0.0.1'),
(58, 1, 'login', '1510291970', 1, NULL, 1, '127.0.0.1'),
(59, 1, 'login', '1510292869', 1, NULL, 1, '127.0.0.1'),
(60, 1, 'login', '1510292926', 1, NULL, 1, '127.0.0.1'),
(61, 1, 'login', '1510292971', 1, NULL, 1, '127.0.0.1'),
(62, 1, 'login', '1510305987', 1, NULL, 1, '127.0.0.1'),
(63, 1, 'login', '1510306101', 1, NULL, 1, '127.0.0.1'),
(64, 1, 'login', '1510306163', 1, NULL, 1, '127.0.0.1'),
(65, 4, 'delmedia', '1510306174', 1, 4, 1, '127.0.0.1'),
(66, 4, 'delmedia', '1510306338', 1, 2, 1, '127.0.0.1'),
(67, 4, 'delmedia', '1510306360', 1, 5, 1, '127.0.0.1'),
(68, 4, 'delmedia', '1510308524', 1, 3, 1, '127.0.0.1'),
(69, 1, 'login', '1510388030', 1, NULL, 12, '127.0.0.1'),
(70, 1, 'login', '1510861676', 1, NULL, 12, '127.0.0.1'),
(71, 3, 'image_upload', '1510861701', 1, 8, 1, '127.0.0.1'),
(72, 1, 'login', '1510862184', 1, NULL, 12, '127.0.0.1'),
(73, 1, 'login', '1510862191', 1, NULL, 12, '127.0.0.1'),
(74, 1, 'login', '1510862259', 1, NULL, 12, '127.0.0.1'),
(75, 1, 'login', '1510863192', 1, NULL, 1, '127.0.0.1'),
(76, 1, 'login', '1510863321', 1, NULL, 1, '127.0.0.1'),
(77, 1, 'login', '1510863353', 1, NULL, 1, '127.0.0.1'),
(78, 11, 'createenv', '1512259870', 1, 1, 2, '127.0.0.1'),
(79, 11, 'createenv', '1512259906', 1, 1, 2, '127.0.0.1'),
(80, 11, 'createenv', '1512259965', 1, 1, 2, '127.0.0.1'),
(81, 11, 'createenv', '1512259990', 1, 1, 2, '127.0.0.1'),
(82, 11, 'createenv', '1512260576', 1, 1, 2, '127.0.0.1'),
(83, 11, 'createenv', '1512260672', 1, 3, 1, '127.0.0.1'),
(84, 11, 'createenv', '1512265607', 1, 4, 1, '127.0.0.1'),
(85, 12, 'deleteenv', '1512265701', 1, 1, 1, '127.0.0.1'),
(86, 11, 'createenv', '1512265729', 1, 5, 1, '127.0.0.1'),
(87, 11, 'createenv', '1512287128', 1, 6, 1, '127.0.0.1'),
(88, 14, 'approveuser', '1512323594', 1, 2, 1, '127.0.0.1'),
(89, 15, 'disapproveuser', '1512323781', 1, 2, 1, '127.0.0.1'),
(90, 14, 'approveuser', '1512323815', 1, 2, 1, '127.0.0.1'),
(91, 15, 'disapproveuser', '1512323818', 1, 13, 1, '127.0.0.1'),
(92, 15, 'disapproveuser', '1512323822', 1, 14, 1, '127.0.0.1'),
(93, 15, 'envapprove', '1512324846', 1, 1, 1, '127.0.0.1'),
(94, 15, 'envapprove', '1512324890', 1, 2, 1, '127.0.0.1'),
(95, 15, 'envapprove', '1512324926', 1, 2, 1, '127.0.0.1'),
(96, 15, 'envapprove', '1512324991', 1, 2, 1, '127.0.0.1'),
(97, 15, 'envapprove', '1512324994', 1, 3, 1, '127.0.0.1'),
(98, 16, 'envdisapprove', '1512325059', 1, 2, 1, '127.0.0.1'),
(99, 16, 'envdisapprove', '1512325067', 1, 3, 1, '127.0.0.1'),
(100, 16, 'envdisapprove', '1512325240', 1, 5, 1, '127.0.0.1'),
(101, 15, 'envapprove', '1512330077', 1, 4, 1, '127.0.0.1'),
(102, 13, 'deleteenv', '1512330085', 1, 4, 1, '127.0.0.1'),
(103, 16, 'envsave', '1512330322', 1, 6, 1, '127.0.0.1'),
(104, 12, 'envsave', '1512330817', 1, 6, 1, '127.0.0.1'),
(105, 15, 'envapprove', '1512330982', 1, 6, 1, '127.0.0.1'),
(106, 12, 'envsave', '1512331015', 1, 6, 1, '127.0.0.1'),
(107, 15, 'envapprove', '1512331059', 1, 6, 1, '127.0.0.1'),
(108, 16, 'envdisapprove', '1512331129', 1, 6, 1, '127.0.0.1'),
(109, 15, 'envapprove', '1512331175', 1, 1, 1, '127.0.0.1'),
(110, 16, 'envdisapprove', '1512331201', 1, 1, 1, '127.0.0.1'),
(111, 15, 'envapprove', '1512331606', 1, 4, 1, '127.0.0.1'),
(112, 1, 'login', '1512331732', 1, NULL, 12, '127.0.0.1'),
(113, 12, 'envsave', '1512334865', 1, 1, 1, '127.0.0.1'),
(114, 12, 'envsave', '1512335144', 1, 2, 1, '127.0.0.1'),
(115, 12, 'envsave', '1512335398', 1, 2, 12, '127.0.0.1'),
(116, 12, 'envsave', '1512335424', 1, 2, 1, '127.0.0.1'),
(117, 12, 'envsave', '1512344763', 1, 5, 1, '127.0.0.1'),
(118, 12, 'envsave', '1512344954', 1, 5, 1, '127.0.0.1'),
(119, 3, 'image_upload', '1512345938', 1, 12, 1, '127.0.0.1'),
(120, 12, 'envsave', '1512347596', 1, 1, 1, '127.0.0.1'),
(121, 13, 'deleteenv', '1512347797', 1, 1, 1, '127.0.0.1'),
(122, 13, 'deleteenv', '1512347800', 1, 1, 1, '127.0.0.1'),
(123, 13, 'deleteenv', '1512347802', 1, 1, 1, '127.0.0.1'),
(124, 13, 'deleteenv', '1512347805', 1, 1, 1, '127.0.0.1'),
(125, 13, 'deleteenv', '1512347814', 1, 1, 1, '127.0.0.1'),
(126, 13, 'deleteenv', '1512348283', 1, 1, 1, '127.0.0.1'),
(127, 13, 'deleteenv', '1512348291', 1, 5, 1, '127.0.0.1'),
(128, 13, 'deleteenv', '1512348296', 1, 6, 1, '127.0.0.1'),
(129, 11, 'createenv', '1512348398', 1, 7, 1, '127.0.0.1'),
(130, 11, 'createenv', '1512348789', 1, 8, 1, '127.0.0.1'),
(131, 12, 'envsave', '1512349811', 1, 3, 1, '127.0.0.1'),
(132, 12, 'envsave', '1512349880', 1, 3, 1, '127.0.0.1'),
(133, 3, 'image_upload', '1512350268', 1, 13, 1, '127.0.0.1'),
(134, 3, 'image_upload', '1512350382', 1, 14, 1, '127.0.0.1'),
(135, 12, 'envsave', '1512363461', 1, 4, 1, '127.0.0.1'),
(136, 12, 'envsave', '1512364613', 1, 7, 1, '127.0.0.1'),
(137, 1, 'login', '1512367561', 1, NULL, 1, '127.0.0.1'),
(138, 12, 'envsave', '1512367966', 1, 2, 1, '127.0.0.1'),
(139, 12, 'envsave', '1512368892', 1, 2, 1, '127.0.0.1'),
(140, 12, 'envsave', '1512368913', 1, 2, 1, '127.0.0.1'),
(141, 15, 'envapprove', '1512368998', 1, 2, 1, '127.0.0.1'),
(142, 12, 'envsave', '1512371245', 1, 2, 1, '127.0.0.1'),
(143, 12, 'envsave', '1512371271', 1, 2, 1, '127.0.0.1'),
(144, 3, 'image_upload', '1512375370', 1, 15, 12, '127.0.0.1'),
(145, 4, 'delmedia', '1512375375', 1, 15, 12, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `seniors`
--

CREATE TABLE `seniors` (
  `s_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `profile` int(3) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `details` varchar(500) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seniors`
--

INSERT INTO `seniors` (`s_id`, `user_id`, `profile`, `fullname`, `details`, `timestamp`, `flag`) VALUES
(1, 3, 2, 'uncle bob', '', '1509090139', 1),
(2, 3, 3, 'aunt may', '', '1509090387', 1),
(3, 3, 4, 'uncle joe', '', '1509652759', 1),
(4, 1, 2, 'uncle joe', 'The patient is a ward member of xyz faciltiy, and is suffering from dimensia.', '1509756743', 1),
(5, 1, 3, 'Aunt May', 'The patient is in a siituaiton with low blurred vision and dimnished cognitive abilities', '1510034100', 0),
(6, 1, 4, 'just another', 'sdfghjkhcvhjkfghj details', '1510260357', 0),
(7, 1, 5, 'vbnm', 'bjk', '1510356530', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `user_id` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `createdon` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `username`, `firstname`, `lastname`, `email`, `createdon`) VALUES
(34, 'yo', 'yo', 'yo', 'yo@gmail.com', '1509063424'),
(2, 'hello', 'h', 'k', 'k@gm.com', '1509079141'),
(3, 'kd', 'keertan', 'dakarapu', 'kxd160830@utdallas.edu', '1509079258'),
(9, '1_1509816129', 'sneha', 'madasu', 'yo@gmail.com', '1509816129'),
(10, '1_1509816225', 'anirush', 'bose', 'anirudh@gmail.com', '1509816225'),
(11, '1_1510033876', 'doitdoit', 'yoyo', 'yo@gmail.com', '1510033876'),
(12, '1_1510034033', 'sneha', 'madasu', 'sneha.madasu@gmail.com', '1510034033'),
(13, '1_1510034145', 'Gowtham', 'Addepalli', 'Gowtham.gr88@gmail.com', '1510034145'),
(14, '1_1510260424', 'joshua', 'fghj', 'yo@gjhl.com', '1510260424'),
(1, 'admin', 'MyndrVR ', 'Administrator', 'contactus@MyndVR.com', '0'),
(15, 'trial10', 't', 't', 't@gmail.com', '1510863343');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(4) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `usertype` int(2) NOT NULL,
  `token` varchar(200) DEFAULT '0',
  `lastlogin` varchar(100) NOT NULL DEFAULT '0',
  `flag` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `username`, `password`, `usertype`, `token`, `lastlogin`, `flag`) VALUES
(1, 'admin', 'admin', 3, '4j9tF5Wlupe%!8Ksx@*v7X,)?k1gbi=3+6OJTIHC', '1512367561', 1),
(2, 'hello', 'k', 2, '0', '0', 1),
(3, 'kd', 'kd', 2, 'yx#E0@MS6(1W:&Nh8^lZ$Fd27cmpzf,vLao+sUYK', '1509089082', 0),
(9, '1_1509816129', 'yo', 1, '-EkMwRe2Fg^3at7sK%ZfJQ+CO_4(L,on1dqGrzm)', '1509832966', 1),
(10, '1_1509816225', 'yo', 1, '0', '0', 0),
(11, '1_1510033876', 'naya', 1, '0', '0', 0),
(12, '1_1510034033', 'sneha', 1, '5I%rKeS$H6LaCpfcU_m!BQsdWiqNn8@x2gb7,^M*', '1512331732', 1),
(13, '1_1510034145', 'gowtham', 1, '0', '0', 0),
(14, '1_1510260424', 'wertyuvbn', 1, 'as.)^2,x7bndJgDqcK0IjWYOvy41;&*XZ6w-PT@Q', '1510260465', 0),
(15, 'trial10', 't', 2, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videodb`
--

CREATE TABLE `videodb` (
  `video_id` int(5) NOT NULL,
  `video_link` varchar(300) NOT NULL,
  `user_id` int(4) NOT NULL,
  `s_id` int(11) NOT NULL,
  `uploaded_by` int(6) NOT NULL,
  `video_name` varchar(200) NOT NULL,
  `uploadedon` varchar(100) NOT NULL,
  `currentlyused` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videodb`
--

INSERT INTO `videodb` (`video_id`, `video_link`, `user_id`, `s_id`, `uploaded_by`, `video_name`, `uploadedon`, `currentlyused`) VALUES
(1, 'images/user_resources/1/catsvideo.mp4', 1, 4, 1, 'cats video', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectedmedia`
--
ALTER TABLE `connectedmedia`
  ADD PRIMARY KEY (`connectionid`);

--
-- Indexes for table `env1`
--
ALTER TABLE `env1`
  ADD PRIMARY KEY (`env_config_id`);

--
-- Indexes for table `environments`
--
ALTER TABLE `environments`
  ADD PRIMARY KEY (`env_id`);

--
-- Indexes for table `familymembers`
--
ALTER TABLE `familymembers`
  ADD PRIMARY KEY (`family_addition_id`);

--
-- Indexes for table `imagedb`
--
ALTER TABLE `imagedb`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `seniors`
--
ALTER TABLE `seniors`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `videodb`
--
ALTER TABLE `videodb`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connectedmedia`
--
ALTER TABLE `connectedmedia`
  MODIFY `connectionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `env1`
--
ALTER TABLE `env1`
  MODIFY `env_config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `environments`
--
ALTER TABLE `environments`
  MODIFY `env_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `family_addition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `imagedb`
--
ALTER TABLE `imagedb`
  MODIFY `img_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `seniors`
--
ALTER TABLE `seniors`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
