-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 03:03 PM
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
-- Database: `jaideeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `unitInstock` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `unitInstock`, `picture`, `category`) VALUES
(1, 'Creative Sound BlasterX G1', 'FEATURES : 7.1 CHANNEL TYPE USB PORT', 1690, 15, 'g1.jpg', 1),
(2, 'RAZER Blackwidow TE 2014 ', 'FEATURES : MECHANICAL GREEN SWITCH', 3290, 18, 'kb.jpg', 1),
(3, 'HyperX Cloud Core', 'HEADSET RESPONSE : 15 Hz - 25000 Hz', 2590, 20, 'headset.jpg', 1),
(4, 'RAZER Deadthadder Elite', 'OPTICAL SENSOR : 16000 DPI', 1990, 8, 'mouse.jpg', 1),
(5, 'BENQ ZOWIE XL2411P', '24\" TN 144Hz', 8500, 10, 'x2411.jpg', 2),
(6, 'Beyerdynamic MMX300', 'ให้ย่านเสียงได้กว้าง 5-35kHz', 12490, 2, 'mmx300.jpg', 3),
(77, 'BENQ ZOWIE XL2546', '', 17800, 34, 'xl2546.jpg', 2),
(78, 'Sennheiser Momentum 2.0', '', 3690, 10, 'shsmmt.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
