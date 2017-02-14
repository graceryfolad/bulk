-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 11:23 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bulk`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_email` varchar(70) NOT NULL,
  `acc_pwd` varchar(250) NOT NULL,
  `air_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `acc_status` tinyint(4) NOT NULL,
  `acc_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_email`, `acc_pwd`, `air_id`, `cl_id`, `acc_type`, `acc_status`, `acc_created`) VALUES
(1, 'folad2012@gmail.com', 'a02728a79586255b4a515f8996344988', 1, 1, 700, 100, '2017-02-08 01:45:09'),
(2, 'admin@callphone.com', '53b9e9679a8ea25880376080b76f98ad', 1, 3, 700, 100, '2017-02-08 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `addressbookdetails`
--

CREATE TABLE IF NOT EXISTS `addressbookdetails` (
  `bk_id` int(11) NOT NULL,
  `abh_id` int(11) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `emp_phone` varchar(17) NOT NULL,
  `ph_network` varchar(10) NOT NULL,
  `bk_status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addressbookdetails`
--

INSERT INTO `addressbookdetails` (`bk_id`, `abh_id`, `emp_name`, `emp_phone`, `ph_network`, `bk_status`) VALUES
(1, 1, 'folarin', '07062746793', 'mtn', 1),
(2, 2, 'Kemisola', '08137122633', 'mtn', 1),
(4, 1, 'Kemisola', '08137122633', 'mtn', 0),
(5, 1, 'daddy', '08055260533', 'glo', 0),
(6, 1, 'Joan', '08037263969', 'mtn', 0),
(7, 1, 'Mic', '1234', 'mtn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `addressbookheaders`
--

CREATE TABLE IF NOT EXISTS `addressbookheaders` (
  `abh_id` int(11) NOT NULL,
  `abh_name` varchar(50) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `abh_status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addressbookheaders`
--

INSERT INTO `addressbookheaders` (`abh_id`, `abh_name`, `cl_id`, `abh_status`) VALUES
(1, 'daniel', 1, 1),
(2, 'staff', 1, 1),
(3, 'Management', 1, 1),
(4, 'New Book', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `airvend_account`
--

CREATE TABLE IF NOT EXISTS `airvend_account` (
  `air_username` varchar(50) NOT NULL,
  `air_pass` varchar(50) DEFAULT NULL,
  `air_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='account from airvend api';

--
-- Dumping data for table `airvend_account`
--

INSERT INTO `airvend_account` (`air_username`, `air_pass`, `air_id`) VALUES
('callphone', 'call123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(11) NOT NULL,
  `cl_comp` varchar(100) NOT NULL,
  `cl_email` varchar(70) NOT NULL,
  `cl_address` varchar(150) NOT NULL,
  `cl_phone` varchar(17) NOT NULL,
  `cl_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_comp`, `cl_email`, `cl_address`, `cl_phone`, `cl_date`) VALUES
(1, 'Gracery Folad Technology', 'folad2012@gmail.com', '24, awaye street,mosalasi', '07062746793', '2017-02-08'),
(3, 'callphone limited', 'admin@callphone.com', '24 Opebi Road', '08156791346', '2017-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `client_credits`
--

CREATE TABLE IF NOT EXISTS `client_credits` (
  `credit_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `credit_balance` double NOT NULL,
  `credit_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_credits`
--

INSERT INTO `client_credits` (`credit_id`, `cl_id`, `credit_balance`, `credit_date`) VALUES
(1, 1, 0, '2017-02-08 01:45:09'),
(2, 3, 0, '2017-02-08 05:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `det_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL DEFAULT '0',
  `ord_id` int(11) NOT NULL,
  `abh_id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `network` varchar(50) NOT NULL,
  `det_status` int(11) NOT NULL,
  `det_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`det_id`, `cl_id`, `ord_id`, `abh_id`, `phone`, `amount`, `network`, `det_status`, `det_created`) VALUES
(1, 1, 1, 1, '07062746793', 100, 'mtn', 0, '2017-02-14 08:51:20'),
(2, 1, 2, 1, '07062746793', 5, 'mtn', 0, '2017-02-14 08:59:43'),
(3, 1, 3, 1, '07062746793', 5, 'mtn', 0, '2017-02-14 09:04:13'),
(4, 1, 4, 1, '07062746793', 2, 'mtn', 0, '2017-02-14 09:08:33'),
(5, 1, 4, 1, '08137122633', 2, 'mtn', 0, '2017-02-14 09:08:33'),
(6, 1, 4, 1, '08055260533', 2, 'glo', 0, '2017-02-14 09:08:33'),
(7, 1, 5, 1, '07062746793', 3, 'mtn', 0, '2017-02-14 09:11:22'),
(8, 1, 5, 1, '08137122633', 3, 'mtn', 0, '2017-02-14 09:11:22'),
(9, 1, 5, 1, '08055260533', 3, 'glo', 0, '2017-02-14 09:11:22'),
(10, 1, 6, 1, '07062746793', 3, 'mtn', 0, '2017-02-14 09:12:42'),
(11, 1, 6, 1, '08137122633', 3, 'mtn', 0, '2017-02-14 09:12:42'),
(12, 1, 6, 1, '08055260533', 3, 'glo', 0, '2017-02-14 09:12:42'),
(13, 1, 7, 1, '07062746793', 3, 'mtn', 0, '2017-02-14 09:13:31'),
(14, 1, 7, 1, '08137122633', 3, 'mtn', 0, '2017-02-14 09:13:31'),
(15, 1, 7, 1, '08055260533', 3, 'glo', 0, '2017-02-14 09:13:31'),
(16, 1, 8, 1, '07062746793', 1, 'mtn', 0, '2017-02-14 09:18:05'),
(17, 1, 8, 1, '08137122633', 1, 'mtn', 0, '2017-02-14 09:18:05'),
(18, 1, 8, 1, '08055260533', 1, 'glo', 0, '2017-02-14 09:18:05'),
(19, 1, 8, 1, '08037263969', 1, 'mtn', 0, '2017-02-14 09:18:05'),
(20, 1, 9, 1, '07062746793', 1, 'mtn', 0, '2017-02-14 11:12:43'),
(21, 1, 9, 1, '08137122633', 1, 'mtn', 0, '2017-02-14 11:12:43'),
(22, 1, 9, 1, '08055260533', 1, 'glo', 0, '2017-02-14 11:12:43'),
(23, 1, 9, 1, '08037263969', 1, 'mtn', 0, '2017-02-14 11:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `abh_id` int(11) NOT NULL,
  `ord_total` int(11) NOT NULL,
  `ord_created` datetime NOT NULL,
  `ord_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `cl_id`, `abh_id`, `ord_total`, `ord_created`, `ord_amount`) VALUES
(1, 1, 1, 3, '2017-02-14 08:51:20', 100),
(2, 1, 1, 3, '2017-02-14 08:59:43', 5),
(3, 1, 1, 3, '2017-02-14 09:04:13', 5),
(4, 1, 1, 3, '2017-02-14 09:08:33', 2),
(5, 1, 1, 3, '2017-02-14 09:11:22', 3),
(6, 1, 1, 3, '2017-02-14 09:12:42', 3),
(7, 1, 1, 3, '2017-02-14 09:13:31', 3),
(8, 1, 1, 4, '2017-02-14 09:18:05', 1),
(9, 1, 1, 4, '2017-02-14 11:12:42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`), ADD UNIQUE KEY `acc_email` (`acc_email`), ADD KEY `cl_id` (`cl_id`);

--
-- Indexes for table `addressbookdetails`
--
ALTER TABLE `addressbookdetails`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `addressbookheaders`
--
ALTER TABLE `addressbookheaders`
  ADD PRIMARY KEY (`abh_id`), ADD UNIQUE KEY `abh_name` (`abh_name`);

--
-- Indexes for table `airvend_account`
--
ALTER TABLE `airvend_account`
  ADD PRIMARY KEY (`air_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`), ADD UNIQUE KEY `cl_email` (`cl_email`);

--
-- Indexes for table `client_credits`
--
ALTER TABLE `client_credits`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`det_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `addressbookdetails`
--
ALTER TABLE `addressbookdetails`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `addressbookheaders`
--
ALTER TABLE `addressbookheaders`
  MODIFY `abh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `airvend_account`
--
ALTER TABLE `airvend_account`
  MODIFY `air_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client_credits`
--
ALTER TABLE `client_credits`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
