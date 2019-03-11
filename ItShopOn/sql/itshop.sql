-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2018 at 07:50 AM
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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `cat_id`) VALUES
(1, 'ASUS', 100),
(2, 'DELL', 100),
(3, 'ACER', 100),
(4, 'SONY', 100),
(5, 'LG', 101),
(6, 'SAMSUNG', 101),
(7, 'ACER', 101),
(8, 'GearMaster', 102),
(9, 'Nubuo', 102),
(10, 'Mionix', 103),
(11, 'zowie', 103),
(12, 'cooler', 103),
(13, 'logitechg', 103),
(14, 'AMD', 104),
(16, 'Loveee', 100);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `item_id` mediumint(8) UNSIGNED NOT NULL,
  `pro_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `attribute` varchar(100) NOT NULL DEFAULT '',
  `quantity` tinyint(3) UNSIGNED DEFAULT NULL,
  `date_shop` datetime DEFAULT NULL,
  `session_id` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`item_id`, `pro_id`, `attribute`, `quantity`, `date_shop`, `session_id`) VALUES
(87, 43, 'à¸ªà¸µ: à¸Šà¸¡à¸žà¸¹', 1, '2014-07-18 23:50:39', '1s3d10ublocio80h0l71hpcsp3'),
(84, 39, 'à¸ªà¸µ: à¸Ÿà¹‰à¸²', 1, '2014-07-18 23:37:52', '0tngdccpjh8rfk370mcj7se3d5'),
(88, 42, 'à¸‚à¸™à¸²à¸”: L', 1, '2014-07-19 12:31:29', 'imp5dob1biunkl5oj4b3r9e993');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `cat_name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(100, 'คอมพิวเตอร์'),
(101, 'จอ LEB'),
(102, 'แป้นพิมพ์'),
(103, 'เม้าส์'),
(104, 'สายไฟ'),
(105, 'Asusssss'),
(158, 'aaaa'),
(122, 'ดิไนมิก LED'),
(159, 'ffffffff'),
(125, 'เบีย'),
(129, 'kiattikun'),
(136, 'cv'),
(139, 'ดิไนมิก LEDdsdcxzcx'),
(142, 'ดิไนมิก LEDuytrewsdf'),
(161, 'เบียxxxx'),
(180, 'cccc'),
(164, 'kjcx'),
(176, 'มททท'),
(167, 'dzfhkhj'),
(168, 'สสส'),
(169, '22'),
(170, '123'),
(179, 'kiat');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` mediumint(8) UNSIGNED NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` enum('USER','ADMIN','ADMINTWO') NOT NULL COMMENT 'USER',
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
(5, 'admin', 'kiattinu09@gmail.com', 'ADMIN', 'itshop', 'itshop', 'itshop', 0, '', 'บ้านทราย บ้านหมี่ ลพบุรี', '7654345678'),
(11, 'banmi', 'beer000nim@gmail.com', 'ADMINTWO', '09092537', 'เกียรติคุณ', 'จำนงอุม', 1, 'm', '27 ม.6 ต.บ้านทราย อ.้านหมี่ จ.ลพบุรี', '898061748'),
(12, 'nim', 'neer@msn.com', 'USER', '1234', 'bdf', 'gfd', 0, '', 'fds', 'fds');

-- --------------------------------------------------------

--
-- Table structure for table `gen`
--

CREATE TABLE `gen` (
  `ge_id` int(10) NOT NULL,
  `ge_name` varchar(50) NOT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `brand_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen`
--

INSERT INTO `gen` (`ge_id`, `ge_name`, `cat_id`, `brand_id`) VALUES
(1, 'SonicMaster', 100, 1),
(2, 'ASUS รุ่น ER12357423', 102, 7),
(3, 'F243124', 103, 6),
(4, 'DF85393', 104, 4),
(6, 'nimzaaaaaaaaaa', 102, 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `cust_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `paid` set('no','yes') DEFAULT NULL,
  `delivery` set('no','yes') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `order_date`, `paid`, `delivery`) VALUES
(1000001, 5, '2014-05-26 21:30:32', 'yes', 'no'),
(1000002, 6, '2014-05-26 21:37:58', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `item_id` mediumint(8) UNSIGNED NOT NULL,
  `order_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `pro_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `attribute` varchar(100) DEFAULT NULL,
  `quantity` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`item_id`, `order_id`, `pro_id`, `attribute`, `quantity`) VALUES
(3, 1000001, 37, 'à¸ªà¸µ: à¸Šà¸¡à¸žà¸¹, à¸‚à¸™à¸²à¸”: S', 1),
(4, 1000001, 43, 'à¸ªà¸µ: à¸Ÿà¹‰à¸²', 2),
(5, 1000002, 42, 'à¸‚à¸™à¸²à¸”: L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` mediumint(8) UNSIGNED NOT NULL,
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `cust_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `transfer_date` varchar(20) DEFAULT NULL,
  `confirm` set('no','yes') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `order_id`, `cust_id`, `bank`, `location`, `amount`, `transfer_date`, `confirm`) VALUES
(4, 1000002, 6, 'à¸à¸£à¸¸à¸‡à¹€à¸—à¸ž', '99xx', '999.00', '2014/05/31 12:59', 'no'),
(2, 1000001, 5, 'à¹„à¸—à¸¢à¸žà¸²à¸“à¸´à¸Šà¸¢à¹Œ', 'à¸£à¸±à¸Šà¸”à¸²', '1300.00', '2014/05/26 22:12', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` mediumint(8) UNSIGNED NOT NULL,
  `cat_id` smallint(5) UNSIGNED DEFAULT NULL,
  `pro_name` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `price` mediumint(8) UNSIGNED DEFAULT NULL,
  `quantity` smallint(5) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) NOT NULL,
  `ge_id` int(10) NOT NULL,
  `imag` varchar(200) NOT NULL,
  `imagtwo` varchar(200) NOT NULL,
  `imagthree` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `pro_name`, `detail`, `price`, `quantity`, `brand_id`, `ge_id`, `imag`, `imagtwo`, `imagthree`) VALUES
(10, 100, 'คอมพิวเตอร์', '0', 1500, 30, 3, 3, '34132376593_84f90f5748_o.jpg', '9SIA9RF4516452-001.jpg', '3w.jpg'),
(13, 101, 'คอม ASUS', '0', 490, 20, 5, 5, 'as.jpg', 'comforts-com1.jpg', 'dsa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pro_id`,`attribute`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email_id` (`email`);

--
-- Indexes for table `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`ge_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gen`
--
ALTER TABLE `gen`
  MODIFY `ge_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000003;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `item_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
