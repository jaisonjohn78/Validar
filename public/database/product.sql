-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 09:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validar`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `product_img` varchar(225) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `lic_num` varchar(75) NOT NULL,
  `mfg_date` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `main_usage` varchar(255) NOT NULL DEFAULT ' ',
  `useurl` varchar(225) NOT NULL,
  `fssai_code` varchar(225) DEFAULT NULL,
  `customer_care` varchar(50) NOT NULL,
  `net_wt` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `uid`, `qr_code`, `bar_code`, `company_name`, `company_email`, `product_img`, `brand_name`, `product_name`, `category`, `price`, `gst`, `lic_num`, `mfg_date`, `ingredients`, `main_usage`, `useurl`, `fssai_code`, `customer_care`, `net_wt`, `units`, `exp_date`) VALUES
(1, 1, '123456', '123456', 'jajaj', 'j@gmail.com', 'img_src', 'ITC', 'Bistuct', '1', 150, 20, '8512865', 'asdf', 'sadadads', 'asfddf', 'adsfasdf', '1234', '68415', 252, 10, 'tomotoodf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qr_code` (`qr_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
