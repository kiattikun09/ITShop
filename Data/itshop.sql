-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2019 at 04:28 AM
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
  `cat_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `cat_id`, `brand_name`) VALUES
(1, 1, 'Apple'),
(2, 1, 'Dell'),
(3, 1, 'ASUS'),
(4, 1, 'ACER'),
(5, 1, 'HP'),
(6, 1, 'Lenovo'),
(7, 1, 'LG'),
(8, 2, 'Samsung'),
(9, 2, 'Toshiba'),
(10, 2, 'ACER'),
(11, 2, 'Microsoft'),
(12, 2, 'HP'),
(13, 2, 'MSI'),
(14, 2, 'Lenovo'),
(15, 2, 'ASUS'),
(16, 2, 'Dell'),
(17, 2, 'Apple'),
(18, 3, 'Cooler Master'),
(19, 3, 'Delux'),
(20, 3, 'SIGNO'),
(21, 3, 'Nubwo'),
(24, 3, 'Dell'),
(25, 3, 'ASUS'),
(26, 3, 'Lenovo'),
(27, 3, 'Motospeed'),
(28, 3, 'DB POWER'),
(29, 4, 'SteelSeries'),
(30, 4, 'Razer'),
(31, 4, 'Logitech'),
(32, 4, 'MSI'),
(34, 5, 'HP'),
(35, 5, 'Canon'),
(36, 5, 'Epson'),
(37, 5, 'Brother'),
(38, 5, 'Sumsung'),
(39, 5, 'Lexmark'),
(40, 5, 'Oki'),
(41, 5, 'Richoh'),
(42, 5, 'Panasonic'),
(43, 5, 'Kyocera'),
(44, 9, 'ASUS'),
(45, 9, 'ACER'),
(46, 9, 'Sumsung'),
(47, 9, 'HP'),
(48, 9, 'PHILIPS'),
(50, 4, 'ASUS'),
(51, 4, 'LOGITECH'),
(52, 4, 'Marvo'),
(53, 10, 'ACER'),
(54, 10, 'ASUS'),
(55, 10, 'SAMSUNG'),
(56, 3, 'Marvo'),
(57, 1, 'AMD'),
(58, 1, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(2, 'Notebook'),
(3, 'Keyboard'),
(4, 'Mouse'),
(5, 'Printer'),
(6, 'Loudspeaker'),
(7, 'RAM'),
(8, 'Power supply'),
(9, 'electric wire '),
(10, 'Screen'),
(12, 'Case PC');

-- --------------------------------------------------------

--
-- Table structure for table `cpro`
--

CREATE TABLE `cpro` (
  `CPro_id` int(10) NOT NULL,
  `pro_id` int(8) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `CPro_M` varchar(200) NOT NULL,
  `CPro_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cpro`
--

INSERT INTO `cpro` (`CPro_id`, `pro_id`, `cust_id`, `CPro_M`, `CPro_Time`) VALUES
(20, 29, 2, 'As', '2019-05-31 18:50:19'),
(21, 29, 2, 'Aa', '2019-05-31 18:50:34'),
(22, 14, 2, 'สินค้าดีเหมาะสมกับราคา', '2019-06-02 08:57:17'),
(23, 25, 2, 'ดด', '2019-05-31 19:49:49'),
(24, 22, 2, 'ดก', '2019-05-31 19:50:22'),
(25, 27, 2, '', '2019-05-31 20:09:08'),
(26, 25, 2, '', '2019-05-31 20:15:44'),
(27, 32, 2, '', '2019-05-31 20:17:23'),
(28, 27, 2, 'f', '2019-05-31 20:19:28'),
(29, 22, 2, 'r', '2019-05-31 20:22:29'),
(30, 29, 2, 'jk', '2019-05-31 20:24:54'),
(31, 29, 2, 'jk', '2019-05-31 20:25:02'),
(32, 26, 2, 'oooo', '2019-05-31 20:27:06'),
(33, 26, 2, 'oooo', '2019-05-31 20:27:22'),
(34, 22, 2, 'd', '2019-05-31 20:28:47'),
(35, 26, 2, 'yuyu', '2019-05-31 20:29:35'),
(36, 26, 2, 'yuyu', '2019-05-31 20:29:40'),
(37, 28, 2, 'g', '2019-05-31 20:30:25'),
(38, 28, 3, 'ดีอยู่นะ', '2019-06-02 19:45:53'),
(39, 28, 2, 'สินค้าส่งช้ามาก', '2019-06-02 19:45:02'),
(40, 27, 2, 'b', '2019-05-31 20:32:09'),
(41, 26, 2, 's', '2019-05-31 20:33:04'),
(42, 22, 2, 'ss', '2019-05-31 20:33:14'),
(43, 34, 2, 'test', '2019-06-01 04:01:19'),
(44, 14, 2, 'ก็โอเคนะคับ', '2019-06-02 08:57:33'),
(46, 22, 6, 'fuck', '2019-06-01 13:51:15'),
(48, 22, 6, 'กากก', '2019-06-01 13:54:28'),
(49, 22, 6, 'ds', '2019-06-01 13:56:06'),
(107, 33, 2, 'fs', '2019-06-02 12:46:38'),
(121, 0, 0, '', '2019-06-02 13:13:32'),
(122, 0, 0, '', '2019-06-02 13:16:15'),
(182, 14, 2, 'โอเคนะคับ', '2019-06-02 19:01:07'),
(183, 14, 1, 'w', '2019-05-31 19:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(8) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('USER','ADMIN') NOT NULL COMMENT '''ADMIN'',''USER''',
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `prefix` int(1) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `user`, `email`, `status`, `password`, `firstname`, `lastname`, `prefix`, `sex`, `address`, `phone`) VALUES
(1, 'admin', 'beer_022Msn.com', 'ADMIN', '09092537', 'เกียรติคุณ', 'จำนงอุดม', 0, 'ช', 'ด', '0898061748'),
(2, 'panida', 'beer000nim@gmail.com', '', '280638', 'ปนิดา', 'เหล็กสิงห์', 0, '', 'ต.บ้านทราย อ.บ้านหมี่ จังหวัดลพบุรี่', '0884621260'),
(3, 'Supchai', 'supchaix1r@gmail.com', '', '123456', 'Kanhaphai', 'Supchai', 1, 'm', '5 หมู่ 5 ต.บ้านทราย อใบ้านหมี่ จฬลพบุรี', '087-766-7779');

-- --------------------------------------------------------

--
-- Table structure for table `gen`
--

CREATE TABLE `gen` (
  `ge_id` int(10) NOT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `ge_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen`
--

INSERT INTO `gen` (`ge_id`, `brand_id`, `ge_name`) VALUES
(1, 45, 'S200HQLHb'),
(2, 44, 'VP247QG'),
(3, 46, 'SF350'),
(4, 21, 'NK030'),
(5, 51, 'M311'),
(6, 52, 'M915M315'),
(7, 53, 'S200HQLHb'),
(8, 2, 'V3470-W268954206THW10'),
(9, 54, 'VP247QG'),
(10, 55, 'SF350');

-- --------------------------------------------------------

--
-- Table structure for table `list_order_details`
--

CREATE TABLE `list_order_details` (
  `list_id` int(10) NOT NULL,
  `list_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) NOT NULL,
  `cust_id` int(8) NOT NULL,
  `order_date` datetime NOT NULL,
  `pro_id` int(8) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `price` varchar(10) NOT NULL,
  `list_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(8) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `list_order` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(8) NOT NULL,
  `cust_id` int(8) DEFAULT NULL,
  `transfer_date` varchar(20) DEFAULT NULL,
  `slip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_payment` int(11) DEFAULT NULL,
  `list_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(8) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `detail` varchar(1500) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `ge_id` int(10) DEFAULT NULL,
  `p_view` int(11) NOT NULL,
  `imag` varchar(255) DEFAULT NULL,
  `imagtwo` varchar(255) DEFAULT NULL,
  `imagthree` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `pro_name`, `detail`, `price`, `quantity`, `brand_id`, `ge_id`, `p_view`, `imag`, `imagtwo`, `imagthree`) VALUES
(14, 10, 'Asus Monitor 23.6นิ้ว', 'Asus Monitor 23.6นิ้ว รุ่น VP247QG\r\nBrand : ASUS\r\nModel : VP247QG\r\nCabinet Color : Black\r\nUsage : Consumer\r\nDisplay\r\nScreen Size : 23.6\"\r\nGlare Screen : non-glare\r\nWidescreen : \r\nMaximum Resolution : 1920 x 1080\r\nRecommended Resolution : 1920 x 1080\r\nRefr', '4790.00', 31, 54, 54, 3, 'A0113664OK.jpg', 'l266.jpg', '6252819_bd.jpg'),
(22, 10, 'Acer Monitor LED 19.5 นิ้ว', 'Acer Monitor LED 19.5 นิ้ว รุ่น S200HQLHb\r\nขนาดหน้าจอ 19.5 นิ้ว\r\nความละเอียด 1366 x 768 พิกเซล\r\nResponse Time 5 ms\r\nContrast Ratio 100,000,000 : 1\r\nBrightness 200 cd/m?\r\nเปิดประสบการณ์ต้อนรับสิ่งใหม่ๆเข้าสู่ชีวิตของคุณด้วย Acer Monitor LED 19.5 นิ้ว รุ่น ', '1890.00', 40, 53, 53, 51, '49e1de8f03d5394a35d5972837ad08ee.jpg', '4713147862023-r1.jpg', 'f6a8c085069318cd8895e564cac6a9e0_tn.jpg'),
(25, 10, 'Samsung Monitor 24” FullHD', 'ดีไซน์เพรียวบางอย่างเหลือเชื่อ\r\nเล่นเกมได้อย่างราบรื่น ด้วย AMD FreeSync และโหมดเกม\r\nเพิ่มความสบายในการรับชมอย่างเป็นธรรมชาติ ด้วยโหมดถนอมสายตาและเทคโนโลยีป้องกันการกะพริบ\r\n\r\nดีไซน์ร่วมสมัย เพรียวบาง และดูดีมีสไตล์\r\n• จอเพรียวบางเป็นพิเศษ: ด้วยความบางเพีย', '3690.00', 25, 55, 55, 43, 'th-led-sf350-ls22f350fhexxt-027-dynamic-black.jpg', 'th-led-sf350-ls22f350fhexxt-028-back-perspective-black.jpg', '87655-624302-full.jpg'),
(26, 3, 'keyboard Marvo k616', 'เป็นคีย์บอรืด Marvo เกม\r\nเป็นคีย์บอร์ด Marvo เกมมิ่ง ไฟทะลุตัวหนังสือ\r\nมีไฟ 3สี สวยงาม สามารถ เปิด/ปิดไฟได้ ปุ่มสูงกดง่าย\r\nใช้ได้ทุกเครื่อง ทุกวินโด\r\nสายเป็น USB เสียบใช้งานได้เลย\r\nมีมัลติมีเดีย สามารถกดใช้งานได้เลย สะดวก\r\nเหมาะสำหรับเล่นเกมส์ หรือทำงานก็', '212.00', 23, 56, 56, 26, 'marvo-k-616-scorpion-rainbow-black-light-7306-36937849-23af009777887c1e3aaadd30340c1176-catalog.jpg_350x350q90.jpg', 'k616.jpg', 'marvo-keyboard-gaming-scorpion-rainbow-black-light-k616-3739-41729305-a26fe27062faf214f15e5991fbd731d1.jpg'),
(27, 3, 'Nubwo VAKANT NK030 Gaming Gaming', 'CDR แป้นพิมพ์ Nubwo VAKANT NK030 Gaming เกมมิ่ง แป้นพิมพ์ คีย์บอร์ด เล่นเกมส์ ปรับโหมดไฟได้ RUBBER DOME SWITCH เก็บเงินปลายทาง รับประกัน 1 ปี\r\nสามารถกดปุ่มพร้อมกันได้ถึง 19 ปุ่ม\r\n12 ปุ่ม มัลติมีเดีย\r\nแป้นพิมพ์สามารถกดได้มากกว่า 50 ล้านครั้ง\r\nป้อมกันของเหล', '590.00', 45, 21, 21, 33, 'nk30.jpg', '20180912134603_24170_24_1.png', 'maxresdefault.jpg'),
(28, 4, 'MOUSE (เม้าส์) ASUS ROG STRIX Gameing', 'MOUSE (เม้าส์) ASUS ROG STRIX EVOLVE\r\nProperty\r\nSpecification\r\nDetail\r\nConnectivity Technology : Wired\r\nTracking : Optical\r\nOS Support : Windows 10,Windows 8.1,Windows 7\r\nDimensions : L 125 x W 65 x H 41 mm\r\nWeight : 100 g without cable\r\nResolution : 7200', '1590.00', 54, 50, 0, 8, '588093-asus-rog-strix-evolve-under-the-plate.jpg', 'a448c06230afe38981b6d0ae7f69403e.png', 'ROG-Strix-Evolve-3D-4.png'),
(29, 4, 'Logitech Silent Plus', 'M331 SILENT PLUS เทคโนโลยีเม้าส์ไร้เสียง ลดเสียง\r\nรบกวนได้มากกว่า 90% ทำให้คุณใช้งานได้โดยไม่มีเสียงคลิ้ก\r\nรบกวน พร้อมดีไซน์โค้งมน เพลิดเพลินกับการเชื่อมต่อไร้สายในระยะ 10 เมตร* ด้วยตัวรับสัญญาณขนาดเล็กจิ๋ว M331 SILENT PLUS ประกอบด้วย Logitech? Advanced O', '699.00', 43, 51, 51, 4, 'Logitech-M331-blk.jpg', 'A0092867OK_BIG_3.jpg', '67433d9ffec0849858c560a51f8beaca.jpg'),
(30, 4, 'Marvo เมาส์เกมส์มิ่ง รุ่น M915M315', 'คุณสมบัติ\r\n- Optical Gaming Mouse ยอดนิยม MARVO Gaming Mouse M915 \r\n- สีดำ หัวเสียบเป็นแบบ USB (เสียบแล้วเล่นได้เลย ไม่ต้องลงไดร์เวอร์) \r\n- ด้วยดีไซน์ที่กระชับและโค้งรับรูปมือ จับถนัด ไม่เมื่อยมือ และ พิเศษ 2 ปุ่มด้านข้าง ใช้สำหรับ backward และ Forward เว', '199.00', 2, 52, 52, 5, 'efba76a4e67bd794d9019af93334fcda.jpg', 'marvo-m315m915-1500534254-61118443-1f82fedca79544a76942387a6210bcd8-zoom.jpg', 'marvo-m915-g1-0597-373568-4.jpg'),
(32, 1, 'AMD FX 8300', 'AMD FX 8300 Turbo 4.1Ghz 8 Core / 8GB / GTX 1050 2GB /1TB ของใหม่ / 580W / CASE (สินค้าใหม่)\r\nCPU : AMD FX 8300 Turbo4.1Ghz8 CoreMB : ASrock N68S-FXMainboard ของใหม่ประกัน 3 ปีRAM :8GB DDR3 OEM1600MhzVGA : NVIDIA GTX1050 2GBของใหม่ประกัน 3 ปีพัดลม :DEEPCO', '13340.00', 29, 57, 0, 4, '2.jpg', '1.jpg', NULL),
(33, 1, 'PC INTEL i7-2600 ', 'INTEL i7-2600 หรือ i7-3770 3.8 Ghz 4C 8T / 8GB / GTX 1050 Ti 4GB / 500GB / 580W / CASE Coolman Gorilla เคสกระจก อัพเกรดได้ (สินค้าใหม่)\r\nCPU :INTEL i7-2600 3.8 Ghz 4C 8T(เปลี่ยน i7-3770 เพิ่ม 800.-)MB : BiostarH77RAM :8GB DDR3 OEM 1600 MhzVGA : NVIDIA GTX', '14290.00', 34, 58, 0, 6, 'ggd.jpg', 'fdgd.jpg', 'dfg.jpg'),
(34, 1, 'Wokstarion 10 Core 20 Thread', ' Wokstarion 10 Core 20 Thread พร้อม SSD NVME *อัพเกรดได้* พร้อม SSD 480 GB !!!\r\nCPU : Xeon E5-2660 V2 up to 3.0Ghz 10 Core 20 ThreadMB : X79 OEM \r\nรองรับ M.2NVME รองรับ SLIใหม่RAM : 16GB DDR3 ECCVGA : NVIDIA \r\nQUADRO 2000CASE : Pro Heroใหม่PSU : ANTEC VP 500w', '20690.00', 34, 58, 2, 2, '956.jpg', '58.jpg', '7d.jpg'),
(37, 5, 'ปริ้นเตอร์', 'ปริ้นเตอร์', '2500', 10, 37, 0, 2, 'cp_PWB000218127.jpg', 'cp_pwb000238882.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `the_post`
--

CREATE TABLE `the_post` (
  `The_post_id` int(100) NOT NULL,
  `The_post_number` varchar(200) NOT NULL,
  `The_post_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_post`
--

INSERT INTO `the_post` (`The_post_id`, `The_post_number`, `The_post_name`) VALUES
(2, 'EH12325435423', 'คุณ เกียติคุณ จำนงอุดม'),
(3, 'EH12342923342', 'ปนิดา เหล็กสิงห์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cpro`
--
ALTER TABLE `cpro`
  ADD PRIMARY KEY (`CPro_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`ge_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `list_order_details`
--
ALTER TABLE `list_order_details`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `list_order` (`list_order`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `pro_id` (`order_date`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `pro_id_2` (`pro_id`),
  ADD KEY `list_order` (`list_order`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `ge_id` (`ge_id`);

--
-- Indexes for table `the_post`
--
ALTER TABLE `the_post`
  ADD PRIMARY KEY (`The_post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cpro`
--
ALTER TABLE `cpro`
  MODIFY `CPro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `gen`
--
ALTER TABLE `gen`
  MODIFY `ge_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `list_order_details`
--
ALTER TABLE `list_order_details`
  MODIFY `list_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `the_post`
--
ALTER TABLE `the_post`
  MODIFY `The_post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `gen`
--
ALTER TABLE `gen`
  ADD CONSTRAINT `gen_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

--
-- Constraints for table `list_order_details`
--
ALTER TABLE `list_order_details`
  ADD CONSTRAINT `list_order_details_ibfk_1` FOREIGN KEY (`list_order`) REFERENCES `order_details` (`list_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
