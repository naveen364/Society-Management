-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2020 at 02:28 PM
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
  `past-address` varchar(100) NOT NULL,
  `pending_dues` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `flat` (`flat_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `flat_id`, `password`, `fullname`, `e-mail`, `mobile_no`, `past-address`, `pending_dues`, `photo`) VALUES
('anil', 2, '123', 'anil pandit', 'anilpandit195@gmail.com', 9555095524, 'sdfg', '98.00', 'WhatsApp Image 2020-01-22 at 3.07.09 PM.jpeg'),
('ashu', 3, '123', 'ashu kumar pandit', 'ashupandit130496@gmail.com', 9876543, 'oiuytre', '9999.00', 'imresizer.com (1).jpg'),
('Baidnath', 7, '123', 'Mr Baidnath pandit', 'Baidnath@gmail.com', 987654321, 'Gdnd', '0.00', 'dad.jpg'),
('bhuppi', 10, 'me chutiya hoon', 'bhupendra bhandari', 'bhupendra007k@gmail.com', 9876543, 'lokijuhygtre', '0.00', 'default.png'),
('kartiken', 11, 'me chutiya hoon', 'kartiken rawat', 'kartikenrawat13@gmail.com', 9876543, 'lkjhgf', '0.00', 'default.png'),
('naveen', 1, '123', 'Naveen Pandit', 'naveen364@gmail.com', 9555095524, 'b2-5 flat 44 metropolis rudrapur uttrakhand', '0.00', 'IMG_20200112_170356_Bokeh__01__01.jpg'),
('sneha', 5, 'sneha', 'sneha pandit', 'snehapandit526@gmail.com', 8218509475, 'wertyuik', '0.00', 'default.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`alert_id`, `flat_id`, `msg`, `status`) VALUES
(4, 2, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 0),
(5, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(6, 1, 'ADMIN UPDATED YOUR Bill ! U+1F603', 1),
(7, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(8, 1, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(9, 1, 'ADMIN UPDATED YOUR Bill ! U+1F603', 1),
(20, 5, 'ADMIN UPDATE YOUR COMPLAIN ! U+1F603', 1),
(21, 2, 'ADMIN UPDATE YOUR COMPLAIN.', 0),
(22, 1, 'ADMIN UPDATE YOUR COMPLAIN.', 1),
(23, 1, 'ADMIN UPDATE YOUR COMPLAIN.', 1),
(24, 2, 'ADMIN UPDATE YOUR COMPLAIN.', 0),
(25, 1, 'ADMIN UPDATE YOUR COMPLAIN.', 1);

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
  PRIMARY KEY (`bill_num`),
  KEY `flat` (`flat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_num`, `flat_id`, `bill_date`, `water_charges`, `parking_charges`, `tax`, `due_date`, `grand_total`) VALUES
(7, 2, '2020-03-03', '1234.00', '1234.00', '9.00', '2020-03-03', '2690.12'),
(9, 4, '2020-04-10', '23456.00', '23456.00', '9.00', '2020-04-19', '51134.08'),
(10, 5, '2020-03-09', '2000000000.00', '2000000000.00', '98.00', '2020-03-09', '7920000000.00'),
(11, 3, '2020-04-02', '999.00', '999.00', '18.00', '2020-04-13', '2357.64'),
(12, 7, '2020-04-03', '1000.00', '1000.00', '9.00', '2020-04-03', '2180.00');

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
  `status` int(2) NOT NULL,
  PRIMARY KEY (`flat_id`),
  KEY `wing` (`wing_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `wing_id`, `flat_num`, `BHK`, `floor_no`, `status`) VALUES
(1, 200, 1, 3, 1, 1),
(2, 201, 1, 2, 1, 1),
(3, 202, 2, 2, 1, 1),
(4, 200, 22, 2, 2, 1),
(5, 200, 2, 3, 0, 1),
(7, 200, 33, 4, 4, 1),
(9, 201, 1, 4, 1, 1),
(10, 202, 1, 4, 1, 1),
(11, 202, 2, 5, 1, 1),
(12, 200, 12, 1, 1, 1);

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
  `mailed` varchar(50) NOT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `FORIGN` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `username`, `issue_date`, `issue_desc`, `status`, `mailed`) VALUES
(14, 'naveen', '2020-02-27', 'water supplie at A-block ', 'completed', 'fixed your water problem'),
(15, 'anil', '2020-02-27', 'electric issue', 'completed', 'oijuhgfdfghjkl'),
(16, 'naveen', '2020-03-07', 'not get bill', 'completed', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `society_id`, `notice_header`, `notice_date`, `notice_desc`) VALUES
(3, 1, '#stay home', '2020-04-02', '*Wash your hands frequently ->Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water  *Maintain social distancing ->Maintain at least 1 metre (3 feet) distance between yourself and anyone who is coughing or sneezing.*Avoid touching eyes, nose and mouth ->Why? Hands touch many surfaces and can pick up viruses. Once contaminated, hands can transfer the virus to your eyes, nose or mouth. From there, the virus can enter your body and can make you sick.');

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
