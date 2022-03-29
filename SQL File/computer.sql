-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2021 at 04:37 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'anuj.lpu1@gmail.com', 'Test@1234', '2016-04-04 20:31:45', '2016-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

DROP TABLE IF EXISTS `adminlog`;
CREATE TABLE IF NOT EXISTS `adminlog` (
  `id` int NOT NULL,
  `adminid` int NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regnum` varchar(100) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `location` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `service` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `time` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `regnum`, `name`, `contactNo`, `email`, `address`, `pincode`, `location`, `service`, `time`, `date`, `payment`) VALUES
(1, '617144390', 'jackkk kk', 7812096354, 'racchu2@gmail.com', 'kuvempunagara,near SPSM PU College',577005 , 'Davangere', 'Desktop Repair', '6 PM - 9 P', '2021-06-20', 'cash'),
(2, '966229221', 'Anil', 9975861254, 'anil023nh@gmail.com', 'gokul road,near to airport,hubbali',580030 , 'Dharwad', 'Networking Service', '12 AM - 3 ', '2021-06-21', 'cash'),
(3, '976663100', 'praveen', 963245898, 'praveen005@gmail.com', 'MCC b block ,10th cross',577004 , 'Davangere', 'AMC Services', '3 PM - 6 P', '2021-06-20', 'card');

-- --------------------------------------------------------

--
-- Table structure for table `eng-assigne`
--

DROP TABLE IF EXISTS `eng-assigne`;
CREATE TABLE IF NOT EXISTS `eng-assigne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engdetails`
--

DROP TABLE IF EXISTS `engdetails`;
CREATE TABLE IF NOT EXISTS `engdetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `engdetails`
--

INSERT INTO `engdetails` (`id`, `name`, `contactNo`, `email`, `address`, `pincode`, `location`, `profession`) VALUES
(1, 'aditya', 9985632493, 'adi123@gmail.com', 'kuvempunagara,near biet college', 577005, 'Davangere', 'Desktop Repair'),
(2, 'rohan MG', 7812096354, 'rohan23@gmail.com', 'MCC b block ,8th cross', 577004, 'Davangere', 'Networking Service'),
(3, 'goutam D', 741235698, 'dar.goutam1998@gmail.com', 'gokul road,near to airport,hubbali', 580030, 'Dharwad', 'Desktop Repair');


-- --------------------------------------------------------

--
-- Table structure for table `enggineerregistration`
--

DROP TABLE IF EXISTS `enggineerregistration`;
CREATE TABLE IF NOT EXISTS `enggineerregistration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `regDate` timestamp(5) NULL DEFAULT CURRENT_TIMESTAMP(5) ON UPDATE CURRENT_TIMESTAMP(5),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enggineerregistration`
--

INSERT INTO `enggineerregistration` (`id`, `username`, `name`, `contactNo`, `email`, `password`) VALUES
(1, 'john', 'john', 7812096354, 'rachana@gmail.com', '00114477'),
(2, 'sonu', 'somaya', 741235698, 'sonu2011aryan@gmail.com', '00114477'),
(3, 'sonu', 'somaya', 741235698, 'sonu2011aryan@gmail.com', '00114477'),
(4, 'adi', 'aditya', 963245898, 'adi123@gmail.com', '33669900'),
(5, 'rohan', 'Rohan Mg', 997284589, 'rohan23@gmail.com', '11447700'),
(6, 'gotya', 'goutam', 963245898, 'dar.goutam1998@gmail.com', '123456789'),
(7, 'manu', 'manoj', 9972835742, 'manoj1234@gmail.com', 'Ab@123456'),
(8, 'chethu', 'chethan', 7963185264, 'chethan123@gmail.com', 'Za#123456');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(6, 3, '10806121', 0x3a3a31, '', '', '2020-07-20 14:56:45'),
(7, 4, '121', 0x3a3a31, '', '', '2021-06-08 12:07:17'),
(8, 4, '121', 0x3a3a31, '', '', '2021-06-08 12:34:17'),
(9, 4, '121', 0x3a3a31, '', '', '2021-06-08 15:00:07'),
(10, 4, '121', 0x3a3a31, '', '', '2021-06-08 15:30:51'),
(11, 4, '121', 0x3a3a31, '', '', '2021-06-08 15:33:56'),
(12, 6, 'poojakb065@gmail.com', 0x3a3a31, '', '', '2021-06-09 05:08:12'),
(13, 6, 'poojakb065@gmail.com', 0x3a3a31, '', '', '2021-06-09 05:08:29'),
(14, 7, 'poojakb056@gmail.com', 0x3a3a31, '', '', '2021-06-09 07:21:59'),
(15, 5, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-09 11:48:53'),
(16, 8, 'rachana@gmail.com', 0x3a3a31, '', '', '2021-06-09 14:47:51'),
(17, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-10 03:44:45'),
(18, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-10 05:36:42'),
(19, 8, 'rachana@gmail.com', 0x3a3a31, '', '', '2021-06-10 05:59:57'),
(20, 10, 'rachana266@gmail.com', 0x3a3a31, '', '', '2021-06-10 14:09:36'),
(21, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-11 13:51:26'),
(22, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-11 17:05:54'),
(23, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-11 17:07:56'),
(24, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-11 17:16:07'),
(25, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-12 17:20:56'),
(26, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-14 17:12:13'),
(27, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-15 06:40:11'),
(28, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-15 17:03:50'),
(29, 27, 'racchu2@gmail.com', 0x3a3a31, '', '', '2021-06-17 06:01:00'),
(30, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-17 17:19:14'),
(31, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-17 17:20:50'),
(32, 9, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-17 17:30:26'),
(33, 28, 'anil023nh@gmail.com', 0x3a3a31, '', '', '2021-06-18 07:45:28'),
(34, 29, 'praveen005@gmail.com', 0x3a3a31, '', '', '2021-06-18 07:51:35'),
(35, 29, 'praveen005@gmail.com', 0x3a3a31, '', '', '2021-06-18 09:21:58'),
(36, 2, 'rachana06racchu@gmail.com', 0x3a3a31, '', '', '2021-06-18 15:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

DROP TABLE IF EXISTS `userregistration`;
CREATE TABLE IF NOT EXISTS `userregistration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(45) DEFAULT NULL,
  `passUdateDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `Name`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(1, 'Anuj', 1234567890, 'test@gmail.com', 'Test@123', '2020-07-20 14:56:18', NULL, NULL),
(2, 'Appu', 7812096354, 'rachana06racchu@gmail.com', '11223300', '2021-06-10 03:44:35', NULL, NULL),
(3, 'jack', 8754219631, 'rachana266@gmail.com', '11223300', '2021-06-10 14:09:20', NULL, NULL),
(4, 'name', 7894632331, 'sonu2011aryan@gmail.com', 'QWEasd!123', '2021-06-12 08:08:55', NULL, NULL),
(5, 'xxxx', 9632458958, 'takashi2010sam@gmail.com', 'QWEzxc#123', '2021-06-12 08:09:59', NULL, NULL),
(6, 'johnmm', 7812096354, 'xxxxx@gmail.com', 'ZXCqwe!123', '2021-06-12 08:41:24', NULL, NULL),
(7, 'santhu', 7894513285, 'santhu@gmail.com', '!QWERzx123', '2021-06-12 08:47:57', NULL, NULL),
(8, 'john K', 9632458982, 'john@gmail.com', 'QAZqaz!234', '2021-06-12 08:51:08', NULL, NULL),
(9, 'jackk', 7894632331, 'racchu2@gmail.com', 'Qw123456', '2021-06-17 05:59:02', NULL, NULL),
(10, 'Anil ', 8965417395, 'anil023nh@gmail.com', 'Aq!123456', '2021-06-18 07:45:12', NULL, NULL),
(11, 'praveen', 9368752419, 'praveen005@gmail.com', 'QWas!123456', '2021-06-18 07:51:12', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
