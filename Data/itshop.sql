-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2019 at 08:31 AM
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
(58, 1, 'คอมประกอบ');

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
(1, 'beer', 'beer_022Msn.com', 'ADMIN', '1234', 'เกียรติคุณ', 'จำนงอุดม', 0, 'ช', 'ด', '0898061748'),
(2, 'panida', 'nim_pongza@hotmail.com', 'USER', '4321', 'ปนิดา', 'จำนงอุดม', 0, 'ญ', 'ด', '0884621260'),
(3, 'supchai', 'supchaix1r@gmail.com', 'USER', '123456', 'Supchai', 'Kanhaphai', 1, 'm', '5 หมู่ 5 ต.บ้านทราย อ.บ้านหมี่ จ.ลพบุรี 15110', '877667779');

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
(10, 55, 'SF350'),
(11, 56, 'K616');

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
  `price` varchar(10) NOT NULL
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
  `pro_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `cust_id`, `order_date`, `quantity`, `price`, `pro_id`) VALUES
(52, 2, '2019-03-10 19:10:09', '1', '1590', 28),
(53, 2, '2019-03-10 19:11:00', '2', '1398', 29),
(54, 2, '2019-03-10 19:11:26', '4', '6360', 28),
(55, 2, '2019-03-10 19:17:51', '1', '212', 26);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(8) NOT NULL,
  `order_id` int(8) NOT NULL,
  `cust_id` int(8) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `transfer_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(8) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `ge_id` int(10) DEFAULT NULL,
  `imag` varchar(255) DEFAULT NULL,
  `imagtwo` varchar(255) DEFAULT NULL,
  `imagthree` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `pro_name`, `detail`, `price`, `quantity`, `brand_id`, `ge_id`, `imag`, `imagtwo`, `imagthree`) VALUES
(14, 10, 'Asus Monitor 23.6นิ้ว รุ่น VP247QG', 'Asus Monitor 23.6นิ้ว รุ่น VP247QG\r\nBrand : ASUS\r\nModel : VP247QG\r\nCabinet Color : Black\r\nUsage : Consumer\r\nDisplay\r\nScreen Size : 23.6\"\r\nGlare Screen : non-glare\r\nWidescreen : \r\nMaximum Resolution : 1920 x 1080\r\nRecommended Resolution : 1920 x 1080\r\nRefr', '4790.00', -25, 54, 54, 'A0113664OK.jpg', 'l266.jpg', '6252819_bd.jpg'),
(22, 10, 'Acer Monitor LED 19.5 นิ้ว', 'Acer Monitor LED 19.5 นิ้ว รุ่น S200HQLHb\r\nขนาดหน้าจอ 19.5 นิ้ว\r\nความละเอียด 1366 x 768 พิกเซล\r\nResponse Time 5 ms\r\nContrast Ratio 100,000,000 : 1\r\nBrightness 200 cd/m?\r\nเปิดประสบการณ์ต้อนรับสิ่งใหม่ๆเข้าสู่ชีวิตของคุณด้วย Acer Monitor LED 19.5 นิ้ว รุ่น ', '1890.00', -4, 53, 53, '49e1de8f03d5394a35d5972837ad08ee.jpg', '4713147862023-r1.jpg', 'f6a8c085069318cd8895e564cac6a9e0_tn.jpg'),
(25, 10, 'Samsung Monitor 24” Full HD SF350', 'ดีไซน์เพรียวบางอย่างเหลือเชื่อ\r\nเล่นเกมได้อย่างราบรื่น ด้วย AMD FreeSync และโหมดเกม\r\nเพิ่มความสบายในการรับชมอย่างเป็นธรรมชาติ ด้วยโหมดถนอมสายตาและเทคโนโลยีป้องกันการกะพริบ\r\n\r\nดีไซน์ร่วมสมัย เพรียวบาง และดูดีมีสไตล์\r\n• จอเพรียวบางเป็นพิเศษ: ด้วยความบางเพีย', '3690.00', 1, 55, 55, 'th-led-sf350-ls22f350fhexxt-027-dynamic-black.jpg', 'th-led-sf350-ls22f350fhexxt-028-back-perspective-black.jpg', '87655-624302-full.jpg'),
(26, 3, 'keyboard Marvo k616', 'เป็นคีย์บอรืด Marvo เกม\r\nเป็นคีย์บอร์ด Marvo เกมมิ่ง ไฟทะลุตัวหนังสือ\r\nมีไฟ 3สี สวยงาม สามารถ เปิด/ปิดไฟได้ ปุ่มสูงกดง่าย\r\nใช้ได้ทุกเครื่อง ทุกวินโด\r\nสายเป็น USB เสียบใช้งานได้เลย\r\nมีมัลติมีเดีย สามารถกดใช้งานได้เลย สะดวก\r\nเหมาะสำหรับเล่นเกมส์ หรือทำงานก็', '212.00', 0, 56, 56, 'marvo-k-616-scorpion-rainbow-black-light-7306-36937849-23af009777887c1e3aaadd30340c1176-catalog.jpg_350x350q90.jpg', 'k616.jpg', 'marvo-keyboard-gaming-scorpion-rainbow-black-light-k616-3739-41729305-a26fe27062faf214f15e5991fbd731d1.jpg'),
(27, 3, 'Nubwo VAKANT NK030 Gaming', 'CDR แป้นพิมพ์ Nubwo VAKANT NK030 Gaming เกมมิ่ง แป้นพิมพ์ คีย์บอร์ด เล่นเกมส์ ปรับโหมดไฟได้ RUBBER DOME SWITCH เก็บเงินปลายทาง รับประกัน 1 ปี\r\nสามารถกดปุ่มพร้อมกันได้ถึง 19 ปุ่ม\r\n12 ปุ่ม มัลติมีเดีย\r\nแป้นพิมพ์สามารถกดได้มากกว่า 50 ล้านครั้ง\r\nป้อมกันของเหล', '590.00', 0, 21, 21, 'nk30.jpg', '20180912134603_24170_24_1.png', 'maxresdefault.jpg'),
(28, 4, 'MOUSE (เม้าส์) ASUS ROG STRIX EVOLVE', 'MOUSE (เม้าส์) ASUS ROG STRIX EVOLVE\r\nProperty\r\nSpecification\r\nDetail\r\nConnectivity Technology : Wired\r\nTracking : Optical\r\nOS Support : Windows 10,Windows 8.1,Windows 7\r\nDimensions : L 125 x W 65 x H 41 mm\r\nWeight : 100 g without cable\r\nResolution : 7200', '1590.00', 5, 50, 0, '588093-asus-rog-strix-evolve-under-the-plate.jpg', 'a448c06230afe38981b6d0ae7f69403e.png', 'ROG-Strix-Evolve-3D-4.png'),
(29, 4, 'Logitech Silent Plus Wireless Mouse M331', 'M331 SILENT PLUS เทคโนโลยีเม้าส์ไร้เสียง ลดเสียง\r\nรบกวนได้มากกว่า 90% ทำให้คุณใช้งานได้โดยไม่มีเสียงคลิ้ก\r\nรบกวน พร้อมดีไซน์โค้งมน เพลิดเพลินกับการเชื่อมต่อไร้สายในระยะ 10 เมตร* ด้วยตัวรับสัญญาณขนาดเล็กจิ๋ว M331 SILENT PLUS ประกอบด้วย Logitech? Advanced O', '699.00', 3, 51, 51, 'Logitech-M331-blk.jpg', 'A0092867OK_BIG_3.jpg', '67433d9ffec0849858c560a51f8beaca.jpg'),
(30, 4, 'Marvo เมาส์เกมส์มิ่ง รุ่น M915M315', 'คุณสมบัติ\r\n- Optical Gaming Mouse ยอดนิยม MARVO Gaming Mouse M915 \r\n- สีดำ หัวเสียบเป็นแบบ USB (เสียบแล้วเล่นได้เลย ไม่ต้องลงไดร์เวอร์) \r\n- ด้วยดีไซน์ที่กระชับและโค้งรับรูปมือ จับถนัด ไม่เมื่อยมือ และ พิเศษ 2 ปุ่มด้านข้าง ใช้สำหรับ backward และ Forward เว', '199.00', 5, 52, 52, 'efba76a4e67bd794d9019af93334fcda.jpg', 'marvo-m315m915-1500534254-61118443-1f82fedca79544a76942387a6210bcd8-zoom.jpg', 'marvo-m915-g1-0597-373568-4.jpg'),
(32, 1, 'AMD FX 8300 Turbo 4.1Ghz 8 Core  8GB  GTX 1050 2GB 1TB', 'AMD FX 8300 Turbo 4.1Ghz 8 Core / 8GB / GTX 1050 2GB /1TB ของใหม่ / 580W / CASE (สินค้าใหม่)\r\nCPU : AMD FX 8300 Turbo4.1Ghz8 CoreMB : ASrock N68S-FXMainboard ของใหม่ประกัน 3 ปีRAM :8GB DDR3 OEM1600MhzVGA : NVIDIA GTX1050 2GBของใหม่ประกัน 3 ปีพัดลม :DEEPCO', '13340.00', 1, 57, 0, '2.jpg', '1.jpg', NULL),
(33, 1, 'PC INTEL i7-2600 ', 'INTEL i7-2600 หรือ i7-3770 3.8 Ghz 4C 8T / 8GB / GTX 1050 Ti 4GB / 500GB / 580W / CASE Coolman Gorilla เคสกระจก อัพเกรดได้ (สินค้าใหม่)\r\nCPU :INTEL i7-2600 3.8 Ghz 4C 8T(เปลี่ยน i7-3770 เพิ่ม 800.-)MB : BiostarH77RAM :8GB DDR3 OEM 1600 MhzVGA : NVIDIA GTX', '14290.00', 5, 58, 0, 'ggd.jpg', 'fdgd.jpg', 'dfg.jpg'),
(34, 1, 'Wokstarion 10 Core 20 Thread พร้อม SSD NVME', ' Wokstarion 10 Core 20 Thread พร้อม SSD NVME *อัพเกรดได้* พร้อม SSD 480 GB !!!\r\nCPU : Xeon E5-2660 V2 up to 3.0Ghz 10 Core 20 ThreadMB : X79 OEM รองรับ M.2NVME รองรับ SLIใหม่RAM : 16GB DDR3 ECCVGA : NVIDIA QUADRO 2000CASE : Pro Heroใหม่PSU : ANTEC VP 500w', '20690.00', 1, 58, 0, '956.jpg', '58.jpg', '7d.jpg'),
(35, 3, '1212312121', '555555', '50000', 100, 21, 0, 'Wallpeper_iPCOMPUTER.jpg', NULL, NULL);

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
  ADD KEY `pro_id_2` (`pro_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order_id` (`order_id`),
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gen`
--
ALTER TABLE `gen`
  MODIFY `ge_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

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
