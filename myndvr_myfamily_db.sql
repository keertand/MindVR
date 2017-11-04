-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 12:42 AM
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
  `img_id` int(5) NOT NULL,
  `video_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `env1`
--

CREATE TABLE `env1` (
  `user_id` int(4) NOT NULL,
  `profile` int(3) NOT NULL,
  `img_no` int(2) NOT NULL,
  `img_placeholder_1` int(5) NOT NULL,
  `img_placeholder_2` int(5) NOT NULL,
  `img_placeholder_3` int(5) NOT NULL,
  `img_placeholder_4` int(5) NOT NULL,
  `img_placeholder_5` int(5) NOT NULL,
  `img_placeholder_6` int(5) NOT NULL,
  `img_placeholder_7` int(5) NOT NULL,
  `img_placeholder_8` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `env1`
--

INSERT INTO `env1` (`user_id`, `profile`, `img_no`, `img_placeholder_1`, `img_placeholder_2`, `img_placeholder_3`, `img_placeholder_4`, `img_placeholder_5`, `img_placeholder_6`, `img_placeholder_7`, `img_placeholder_8`) VALUES
(1, 1, 8, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `familymembers`
--

CREATE TABLE `familymembers` (
  `family_addition_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `profile` int(5) NOT NULL,
  `family_id` int(6) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imagedb`
--

CREATE TABLE `imagedb` (
  `img_id` int(5) NOT NULL,
  `img_link` varchar(300) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `videoflag` int(1) NOT NULL,
  `uploadedon` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagedb`
--

INSERT INTO `imagedb` (`img_id`, `img_link`, `user_id`, `img_name`, `videoflag`, `uploadedon`) VALUES
(1, 'images/sample.jpg', '1', 'sala name', 0, ''),
(3, 'images/user_resources/admin/admin_image_1509047090.jpg', '1', 'comment', 0, ''),
(4, 'images/user_resources/kd/kd_image_1509079892.jpeg', '3', 'comment', 0, ''),
(5, 'images/user_resources/kd/kd_image_1509081854.jpg', '3', 'comment', 0, ''),
(6, 'images/user_resources/kd/kd_image_1509084630.jpg', '3', 'comment', 0, ''),
(7, 'images/user_resources/kd/kd_image_1509084784.jpeg', '3', 'chumma', 0, ''),
(8, 'images/user_resources/kd/kd_image_1509085060.jpg', '3', 'chumma', 0, '1509085060'),
(9, 'images/user_resources/kd/kd_image_1509085175.jpeg', '3', '', 0, '1509085175'),
(10, 'images/user_resources/kd/kd_image_1509085329.jpeg', '3', '', 0, '1509085329');

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
  `ip` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`logid`, `type`, `activity`, `timestamp`, `user_id`, `content_id`, `ip`) VALUES
(1, 1, 'login', '1509054786', 1, NULL, '127.0.0.1'),
(2, 1, 'login', '1509056278', 1, NULL, '127.0.0.1'),
(3, 2, 'signup', '1509063424', 34, NULL, ''),
(4, 2, 'signup', '1509063621', 34, NULL, '127.0.0.1'),
(5, 2, 'signup', '1509079141', 2, NULL, '127.0.0.1'),
(6, 2, 'signup', '1509079258', 3, NULL, '127.0.0.1'),
(7, 1, 'login', '1509079355', 3, NULL, '127.0.0.1'),
(8, 3, 'image_upload', '1509085329', 3, 10, '127.0.0.1'),
(9, 1, 'login', '1509086964', 3, NULL, '127.0.0.1'),
(10, 1, 'login', '1509089082', 3, NULL, '127.0.0.1'),
(11, 7, 'addsenior', '1509089091', 3, 1, '127.0.0.1'),
(12, 7, 'addsenior', '1509089223', 3, 1, '127.0.0.1'),
(13, 7, 'addsenior', '1509089280', 3, 1, '127.0.0.1'),
(14, 7, 'addsenior', '1509090139', 3, 2, '127.0.0.1'),
(15, 7, 'addsenior', '1509090387', 3, 3, '127.0.0.1'),
(16, 7, 'addsenior', '1509652759', 3, 4, '127.0.0.1'),
(17, 1, 'login', '1509755744', 1, NULL, '127.0.0.1'),
(18, 1, 'login', '1509755793', 1, NULL, '127.0.0.1'),
(19, 1, 'login', '1509755816', 1, NULL, '127.0.0.1'),
(20, 1, 'login', '1509755873', 1, NULL, '127.0.0.1'),
(21, 1, 'login', '1509755891', 1, NULL, '127.0.0.1'),
(22, 1, 'login', '1509756033', 1, NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `seniors`
--

CREATE TABLE `seniors` (
  `s_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `profile` int(3) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seniors`
--

INSERT INTO `seniors` (`s_id`, `user_id`, `profile`, `fullname`, `timestamp`, `flag`) VALUES
(1, 3, 2, 'uncle bob', '1509090139', 1),
(2, 3, 3, 'aunt may', '1509090387', 1),
(3, 3, 4, 'uncle joe', '1509652759', 1);

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
(3, 'kd', 'keertan', 'dakarapu', 'kxd160830@utdallas.edu', '1509079258');

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
(1, 'admin', 'admin', 3, 'xdO+QLYEeUj5@(G)-pF9Do1u?yh6_n$kCTKfPZ4t', '1509756033', 0),
(2, 'hello', 'k', 2, '0', '0', 0),
(3, 'kd', 'kd', 2, 'yx#E0@MS6(1W:&Nh8^lZ$Fd27cmpzf,vLao+sUYK', '1509089082', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videodb`
--

CREATE TABLE `videodb` (
  `video_id` int(5) NOT NULL,
  `video_link` varchar(300) NOT NULL,
  `user_id` int(4) NOT NULL,
  `video_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectedmedia`
--
ALTER TABLE `connectedmedia`
  ADD PRIMARY KEY (`img_id`);

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
-- AUTO_INCREMENT for table `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `family_addition_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagedb`
--
ALTER TABLE `imagedb`
  MODIFY `img_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `seniors`
--
ALTER TABLE `seniors`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
