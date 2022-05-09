-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 09:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `moto_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(5) NOT NULL DEFAULT 0,
  `shipped_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_part`, `order_date`, `status`, `quantity`, `shipped_date`) VALUES
(1, 95, '2022-04-05', 1, 5, '2022-04-07'),
(2, 96, '2022-04-06', 1, 6, '2022-04-08'),
(3, 97, '2022-04-07', 1, 5, '2022-04-08'),
(4, 98, '2022-04-08', 1, 6, '2022-04-09'),
(5, 97, '2022-04-12', 31, 2, '2022-04-16'),
(6, 98, '2022-04-13', 51, 1, '2022-04-15'),
(7, 97, '2022-04-20', 68, 3, '2022-04-22'),
(8, 98, '2022-04-21', 38, 1, '2022-04-22'),
(9, 97, '2022-04-21', 23, 3, '2022-04-23'),
(10, 98, '2022-04-23', 12, 2, '2022-04-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
