-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2020 at 02:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(30) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(127) NOT NULL,
  `e-mail` varchar(40) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pending_dues` decimal(10,2) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `flat` (`flat_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `flat_id`, `password`, `fullname`, `e-mail`, `mobile_no`, `address`, `pending_dues`) VALUES
('anil', 2, '123', 'anil pandit', 'anil@vip.com', 9555095524, 'sdfg', '98.00'),
('ashok', 4, 'ashok123', 'ashok kumar pandit', 'ashok@vip.com', 999999, 'qwertyuiop', '0.00'),
('ashu', 3, 'aspandit', 'ashu kumar pandit', 'ashu@gmail.com', 9876543, 'oiuytre', '9999.00'),
('naveen', 1, '123', 'Naveen Pandit', 'naveen364@vip.com', 9555095524, 'b2-5 flat 44 metropolis rudrapur uttrakhand', '0.00'),
('sneha', 5, 'bhaisneha', 'sneha pandit', 'snehapandit526@gmail.com', 8218509475, 'wertyuik', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `mobile_no`, `email`, `address`) VALUES
(1, 'admin', '123', 9555095524, 'admin@gmail.com', 'A-Block Metropolish Rudrapur');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
CREATE TABLE IF NOT EXISTS `alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `flat_id` int(11) NOT NULL,
  `msg` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`alert_id`),
  KEY `flat_id` (`flat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`alert_id`, `flat_id`, `msg`, `status`) VALUES
(1, 2, 'you got bill! U+1F603', 1),
(4, 2, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(5, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(6, 1, 'ADMIN UPDATED YOUR Bill ! U+1F603', 1),
(7, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(8, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(9, 1, 'ADMIN UPDATED YOUR Bill ! U+1F603', 1),
(10, 3, 'you got bill! U+1F603', 1),
(11, 4, 'you got bill! U+1F603', 1),
(12, 5, 'you got bill! U+1F603', 1),
(13, 5, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(14, 4, 'ADMIN UPDATED YOUR Bill ! U+1F603', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_num` int(11) NOT NULL AUTO_INCREMENT,
  `flat_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `water_charges` decimal(20,2) NOT NULL,
  `parking_charges` decimal(20,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `due_date` date NOT NULL,
  `grand_total` decimal(65,2) NOT NULL,
  `notification` varchar(25) NOT NULL,
  PRIMARY KEY (`bill_num`),
  KEY `flat` (`flat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_num`, `flat_id`, `bill_date`, `water_charges`, `parking_charges`, `tax`, `due_date`, `grand_total`, `notification`) VALUES
(3, 1, '2020-02-26', '10000.00', '20000.00', '9.00', '2020-02-26', '32700.00', 'unread'),
(7, 2, '2020-03-03', '1234.00', '1234.00', '9.00', '2020-03-03', '2690.12', 'unread'),
(8, 3, '2020-04-10', '20000.00', '20000.00', '9.00', '2020-04-19', '43600.00', 'unread'),
(9, 4, '2020-04-10', '23456.00', '23456.00', '9.00', '2020-04-19', '51134.08', 'unread'),
(10, 5, '2020-03-09', '2000000000.00', '2000000000.00', '98.00', '2020-03-09', '7920000000.00', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

DROP TABLE IF EXISTS `flat`;
CREATE TABLE IF NOT EXISTS `flat` (
  `flat_id` int(11) NOT NULL AUTO_INCREMENT,
  `wing_id` int(11) NOT NULL,
  `flat_num` int(11) NOT NULL,
  `BHK` int(10) NOT NULL,
  `floor_no` int(11) NOT NULL,
  PRIMARY KEY (`flat_id`),
  KEY `wing` (`wing_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `wing_id`, `flat_num`, `BHK`, `floor_no`) VALUES
(1, 200, 1, 3, 1),
(2, 201, 1, 2, 1),
(3, 202, 2, 2, 1),
(4, 200, 22, 2, 2),
(5, 200, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `issue_date` date NOT NULL,
  `issue_desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `FORIGN` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `username`, `issue_date`, `issue_desc`, `status`) VALUES
(14, 'naveen', '2020-02-27', 'water supplie at A-block ', 'completed'),
(15, 'anil', '2020-02-27', 'electric issue', 'completed'),
(16, 'naveen', '2020-03-07', 'not get bill', 'incomplete'),
(17, 'sneha', '2020-03-09', 'bill is not correct', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) NOT NULL,
  `notice_header` varchar(63) NOT NULL,
  `notice_date` date NOT NULL,
  `notice_desc` varchar(1023) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `society` (`society_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `society_id`, `notice_header`, `notice_date`, `notice_desc`) VALUES
(2, 1, 'HOLI', '2020-03-07', 'There is a funtion on 10-03-2020 at club backside park B-block');

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

DROP TABLE IF EXISTS `society`;
CREATE TABLE IF NOT EXISTS `society` (
  `society_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_name` varchar(255) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  PRIMARY KEY (`society_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `society`
--

INSERT INTO `society` (`society_id`, `society_name`, `city`, `state`) VALUES
(1, 'metropolis', 'Rudrapur', 'Uttrakhand');

-- --------------------------------------------------------

--
-- Table structure for table `wing`
--

DROP TABLE IF EXISTS `wing`;
CREATE TABLE IF NOT EXISTS `wing` (
  `wing_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) NOT NULL,
  `wing_name` varchar(15) NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  PRIMARY KEY (`wing_id`),
  KEY `society` (`society_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wing`
--

INSERT INTO `wing` (`wing_id`, `society_id`, `wing_name`, `no_of_floors`) VALUES
(200, 1, 'A', 6),
(201, 1, 'B', 6),
(202, 1, 'C', 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `flat_acc` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `alert_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `flat_bill` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `wing_flat` FOREIGN KEY (`wing_id`) REFERENCES `wing` (`wing_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `society_notice` FOREIGN KEY (`society_id`) REFERENCES `society` (`society_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wing`
--
ALTER TABLE `wing`
  ADD CONSTRAINT `society_wing` FOREIGN KEY (`society_id`) REFERENCES `society` (`society_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
