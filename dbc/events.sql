-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 12:38 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `auID` int(11) NOT NULL,
  `autID` smallint(2) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `address` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `comfirmation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table Handling Events Author Detais And credential';

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`auID`, `autID`, `fname`, `mname`, `lname`, `email`, `phone`, `address`, `uname`, `passwd`, `comfirmation`) VALUES
(1, 1, 'seth', 'g', 'kiwira', 'seth@gmail.com', '07656893', 'seth@gmail.com', 'gerry', 'e738ef555fe41c2f8c2860cb22b6de6b', 1),
(2, 1, 'Andy', 'Andrew', 'Dodoma', 'emaboy1000@gmail.com', '0756738542', 'emaboy1000@gmail.com', 'Andrew', 'e738ef555fe41c2f8c2860cb22b6de6b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerreviews`
--

CREATE TABLE `customerreviews` (
  `rID` int(15) NOT NULL,
  `cID` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `cMID` int(15) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cAddress` varchar(100) NOT NULL,
  `cContact` varchar(250) NOT NULL,
  `cMsg` text NOT NULL,
  `servicedBy` int(11) NOT NULL DEFAULT '0',
  `contactedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`cMID`, `cName`, `cAddress`, `cContact`, `cMsg`, `servicedBy`, `contactedDate`) VALUES
(1, 'jane', 'wer34', 'rfrff', 'few', 0, '2020-09-29 15:17:55'),
(2, 'Busipa Lukosa', 'Ngala', '0764098179', 'check interface for small device, on contact field', 0, '2020-10-06 16:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` bigint(100) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cEId` int(11) NOT NULL,
  `comment_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `comment_date`, `cEId`, `comment_desc`) VALUES
(2, '2020-11-04 06:00:58', 8, 'mmetisha saana wajuba');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_etype`
--

CREATE TABLE `tbl_etype` (
  `etid` smallint(2) NOT NULL,
  `edesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_etype`
--

INSERT INTO `tbl_etype` (`etid`, `edesc`) VALUES
(1, 'Tour'),
(2, 'News'),
(3, 'Location'),
(4, 'Studio');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `eID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `eheading` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ecaption` text NOT NULL,
  `etypeID` smallint(2) NOT NULL,
  `eventdate` datetime NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table Handling Events Records';

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`eID`, `authorID`, `eheading`, `ecaption`, `etypeID`, `eventdate`, `status`) VALUES
(1, 1, 'Marry Matema tour', 'Hmm. We’re having trouble finding that site.\n\nWe can’t connect to the server at www.computernetworkingnotes.com.\n\nIf that address is correct, here are three other things you can try:\n\n    Try again later.\n    Check your network connection.\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.', 1, '2020-10-08 00:00:00', 'done'),
(2, 1, 'helooos', 'huyu ndiye yeye mwenyewe muimba \nnyimbo za aina yote', 2, '2020-09-16 00:00:00', 'On Progress'),
(3, 1, 'helooos', 'huyu ndiye alie imba nita imba haleluya mchana, asubuhi na usiku\npia hata jion ataimba halellujah................\nna appriciate what he gaves', 2, '2020-09-16 00:00:00', 'On Progress'),
(4, 1, 'Siasa za Kiwiara za Tia Ukingo', 'What the heck This is Difficult on Doing Politics Fellas. AS how we can see what going on', 2, '2020-10-13 00:00:00', 'On Progress'),
(5, 1, 'Blaah! Blaa! News..!', 'After long Time no see I have To write This Guys Take Care if There is Some one Trying to Help You on The Staf You are capable of', 2, '2020-10-06 00:00:00', 'On Progress'),
(6, 1, 'Blaah! Blaa! News..!', '\n\nIf that address is correct, here are three other things you can try:\n\n    Try again later.\n    Check your network connection.\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.', 2, '2020-10-06 00:00:00', 'On Progress'),
(7, 1, 'Seth Family Tour', 'Seth\'s Family is Here To Announce Their yearly tour you are welcome to join them thank you.', 1, '2020-10-14 00:00:00', 'done'),
(8, 1, 'Ziwa ngosi Tour by AG camp', 'This Tour is for everybody need to take country wise tour looking for different tanzania environments ', 1, '2020-10-29 00:00:00', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `iID` int(15) NOT NULL,
  `ieID` int(11) NOT NULL,
  `aID` int(11) NOT NULL,
  `idesc` varchar(250) NOT NULL,
  `postedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`iID`, `ieID`, `aID`, `idesc`, `postedDate`) VALUES
(1, 1, 1, '0A71EA48-9A06-4C79-AB6F-1B0ED6A7AD59L0001.jpeg', '2020-10-06 12:48:05'),
(2, 1, 1, '0AB0CBE6-8EC6-4571-B14F-A74DE0D2FB55L0001.jpeg', '2020-10-06 12:48:05'),
(3, 1, 1, '0CB7EABE-36A5-4EA5-A3F8-9A18C3D052D9L0001.jpeg', '2020-10-06 12:48:05'),
(4, 1, 1, '0CCE5E92-5D66-4FC4-802A-5C8818AC8EC7L0001.jpeg', '2020-10-06 12:48:05'),
(5, 7, 1, '2C34635E-4DB6-43C5-9F33-B09981234411L0001.jpeg', '2020-10-06 15:09:16'),
(6, 7, 1, '2D5944F4-C5EA-480B-B088-21E5C98C3A66L0001.jpeg', '2020-10-06 15:09:16'),
(7, 7, 1, '\r\n2DA3CF46-A235-4670-B324-9EB75E7D1C07L0001.jpeg', '2020-10-06 15:09:17'),
(8, 7, 1, '2ECD806A-01A5-4112-A9D1-C288DC864FFFL0001.jpeg', '2020-10-06 15:09:17'),
(13, 7, 1, '3FCACF97-4D7D-4C5C-A801-26D67973257CL0001.jpeg', '2020-10-06 15:18:41'),
(14, 7, 1, '4B424E07-2017-4CC4-938B-EA48F2A0BF18L0001.jpeg', '2020-10-06 15:18:41'),
(15, 7, 1, '4C29B4D3-C609-4423-B293-46C4C64CE38FL0001.jpeg', '2020-10-06 15:18:41'),
(16, 7, 1, '4E1AC15F-781E-4BA0-AE70-93887E65FF62L0001.jpeg', '2020-10-06 15:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utype`
--

CREATE TABLE `tbl_utype` (
  `utid` smallint(2) NOT NULL,
  `udesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_utype`
--

INSERT INTO `tbl_utype` (`utid`, `udesc`) VALUES
(1, 'User'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`auID`),
  ADD UNIQUE KEY `u_name` (`uname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `author_ifbk_1` (`autID`);

--
-- Indexes for table `customerreviews`
--
ALTER TABLE `customerreviews`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`cMID`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_eid` (`cEId`);

--
-- Indexes for table `tbl_etype`
--
ALTER TABLE `tbl_etype`
  ADD PRIMARY KEY (`etid`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`eID`),
  ADD KEY `tbl_events_ifbk_1` (`authorID`),
  ADD KEY `tbl_events_ifbk_2` (`etypeID`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`iID`),
  ADD KEY `tbl_images_ifbk_1` (`ieID`),
  ADD KEY `tbl_images_ifbk_2` (`aID`);

--
-- Indexes for table `tbl_utype`
--
ALTER TABLE `tbl_utype`
  ADD PRIMARY KEY (`utid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `auID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerreviews`
--
ALTER TABLE `customerreviews`
  MODIFY `rID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `cMID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_etype`
--
ALTER TABLE `tbl_etype`
  MODIFY `etid` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `eID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `iID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_utype`
--
ALTER TABLE `tbl_utype`
  MODIFY `utid` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ifbk_1` FOREIGN KEY (`autID`) REFERENCES `tbl_utype` (`utid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `comment_eid` FOREIGN KEY (`cEId`) REFERENCES `tbl_events` (`eID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_ifbk_1` FOREIGN KEY (`authorID`) REFERENCES `author` (`auID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbl_events_ifbk_2` FOREIGN KEY (`etypeID`) REFERENCES `tbl_etype` (`etid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD CONSTRAINT `tbl_images_ifbk_1` FOREIGN KEY (`ieID`) REFERENCES `tbl_events` (`eID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbl_images_ifbk_2` FOREIGN KEY (`aID`) REFERENCES `author` (`auID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
