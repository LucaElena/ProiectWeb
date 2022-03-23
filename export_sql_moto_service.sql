-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 23, 2022 la 10:32 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Bază de date: `moto_service`
--
CREATE DATABASE IF NOT EXISTS `moto_service` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moto_service`;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `appointments`
--

CREATE TABLE `appointments` (
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `id_formular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `brands`
--

INSERT INTO `brands` (`id_brand`, `brand_name`) VALUES
(1, 'APRILIA'),
(2, 'BETA'),
(3, 'BMW'),
(4, 'HONDA'),
(5, 'HUSABERG'),
(6, 'HUSQVARNA'),
(7, 'KAWASAKI'),
(8, 'SUZUKI'),
(9, 'YAMAHA'),
(10, 'GENERAL');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'Accesorii si piese'),
(2, 'Anvelope si Roti'),
(3, 'Componente Motor'),
(4, 'Componente Sasiu'),
(5, 'Electrice'),
(6, 'Evacuari'),
(7, 'Filtre'),
(8, 'Frane'),
(9, 'Huse Moto'),
(10, 'Transmisie'),
(11, 'KTM Power Parts'),
(12, 'Manete si Comenzi'),
(13, 'Manete si Comenzi'),
(14, 'Plastice si Aptibilduri'),
(15, 'Protectii si Scuturi'),
(16, 'Radiatoare'),
(17, 'Suspensii Moto'),
(18, 'Uleiuri si Lubrifianti');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `formulars`
--

CREATE TABLE `formulars` (
  `id_formular` int(11) NOT NULL,
  `request_message` varchar(500) DEFAULT NULL,
  `response_message` varchar(500) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `request_picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(5) NOT NULL DEFAULT 0,
  `shipped_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `parts`
--

CREATE TABLE `parts` (
  `id_part` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `id_category` int(11) NOT NULL,
  `total_quantity` int(5) NOT NULL DEFAULT 0,
  `schedule_quantity` int(5) NOT NULL DEFAULT 0,
  `id_brand` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `parts`
--

INSERT INTO `parts` (`id_part`, `name`, `price`, `id_category`, `total_quantity`, `schedule_quantity`, `id_brand`) VALUES
(1, 'Claxon 12V Negru', 30, 1, 15, 0, 10),
(2, 'Protectie schimbator viteze', 25, 1, 15, 0, 10);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `user_name` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`user_name`, `id_user`, `email`, `phone`, `password`, `type`) VALUES
('admin', 1, 'admin@cymat.ro', '0721231234', '1234', 1),
('elena', 2, 'elena@gmail.com', '0741231234', '1234', 0),
('liliana', 3, 'liliana@yahoo.com', '0751231234', '1234', 0),
('adina', 4, 'adina@hotmail.com', '0761231234', '1234', 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexuri pentru tabele `formulars`
--
ALTER TABLE `formulars`
  ADD PRIMARY KEY (`id_formular`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexuri pentru tabele `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id_part`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `formulars`
--
ALTER TABLE `formulars`
  MODIFY `id_formular` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `parts`
--
ALTER TABLE `parts`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;