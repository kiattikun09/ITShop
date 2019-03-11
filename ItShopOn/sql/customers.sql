-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2018 at 07:33 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` mediumint(8) UNSIGNED NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` enum('USER') NOT NULL COMMENT 'USER',
  `password` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `prefix` int(1) DEFAULT NULL,
  `sex` varchar(1) NOT NULL COMMENT 'm',
  `address` text,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `user`, `email`, `status`, `password`, `firstname`, `lastname`, `prefix`, `sex`, `address`, `phone`) VALUES
(5, 'admin', 'kiattinu09@gmail.com', '', 'itshop', 'itshop', 'itshop', 0, '', 'บ้านทราย บ้านหมี่ ลพบุรี', '7654345678'),
(11, 'banmi', 'beer000nim@gmail.com', '', '09092537', 'เกียรติคุณ', 'จำนงอุม', 1, 'm', '27 ม.6 ต.บ้านทราย อ.้านหมี่ จ.ลพบุรี', '898061748'),
(12, 'nim', 'neer@msn.com', '', '1234', 'bdf', 'gfd', 0, '', 'fds', 'fds'),
(13, 'ew', 'fw@msn.com', '', '1234', 'ds', 'ds', 2, 'f', 'ด', '8830'),
(14, 'asd', 'hmnm@hjkbk.com', 'USER', '1234321', 'bbb', 'ccc', 1, 'm', '27 ม.6', '878');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email_id` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
