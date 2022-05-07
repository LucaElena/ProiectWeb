-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 19, 2022 la 11:42 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Bază de date: `moto_service`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `appointments`
--

CREATE TABLE `appointments` (
  `id_appointment` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `id_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `appointments`
--

INSERT INTO `appointments` (`id_appointment`, `date`, `status`, `id_user`, `id_form`) VALUES
(1, '2022-06-5 15:00:00', 1, 4, 1),
(2, '2022-04-10 16:00:00', 1, 4, 2),
(3, '2022-05-20 09:00:00', 1, 4, 3),
(4, '2022-05-27 08:00:00', 1, 3, 4),
(5, '2022-06-19 11:00:00', 1, 2, 5),
(6, '2022-06-26 14:00:00', 1, 4, 6),
(7, '2022-06-19 14:00:00', 1, 3, 7),
(8, '2022-06-12 14:00:00', 1, 2, 8),
(9, '2022-06-27 16:00:00', 1, 2, 9),
(10, '2022-04-14 14:00:00', 1, 3, 10),
(11, '2022-06-7 17:00:00', 1, 3, 11),
(12, '2022-05-5 12:00:00', 1, 3, 12),
(13, '2022-06-21 15:00:00', 1, 4, 13),
(14, '2022-06-6 14:00:00', 1, 2, 14),
(15, '2022-06-3 10:00:00', 1, 3, 15),
(16, '2022-06-25 09:00:00', 1, 4, 16),
(17, '2022-06-18 11:00:00', 1, 3, 17),
(18, '2022-06-7 18:00:00', 1, 2, 18),
(19, '2022-04-27 14:00:00', 1, 4, 19),
(20, '2022-06-7 08:00:00', 1, 2, 20),
(21, '2022-05-7 14:00:00', 1, 3, 21),
(22, '2022-04-10 10:00:00', 1, 4, 22),
(23, '2022-06-11 11:00:00', 1, 2, 23),
(24, '2022-05-7 08:00:00', 1, 3, 24),
(25, '2022-06-2 14:00:00', 1, 4, 25),
(26, '2022-04-20 10:00:00', 1, 3, 26),
(27, '2022-06-11 11:00:00', 1, 3, 27),
(28, '2022-06-7 15:00:00', 1, 3, 28),
(29, '2022-04-13 14:00:00', 1, 4, 29),
(30, '2022-06-9 15:00:00', 1, 2, 30),
(31, '2022-04-12 12:00:00', 1, 4, 31),
(32, '2022-05-14 17:00:00', 1, 4, 32),
(33, '2022-06-24 12:00:00', 1, 3, 33),
(34, '2022-05-2 13:00:00', 1, 3, 34),
(35, '2022-06-10 16:00:00', 1, 4, 35),
(36, '2022-04-16 09:00:00', 1, 2, 36),
(37, '2022-06-18 15:00:00', 1, 4, 37),
(38, '2022-05-7 11:00:00', 1, 2, 38),
(39, '2022-05-26 16:00:00', 1, 4, 39),
(40, '2022-06-14 15:00:00', 1, 4, 40),
(41, '2022-06-14 12:00:00', 1, 2, 41),
(42, '2022-04-2 13:00:00', 1, 3, 42),
(43, '2022-05-16 18:00:00', 1, 3, 43),
(44, '2022-05-23 16:00:00', 1, 3, 44),
(45, '2022-05-5 11:00:00', 1, 3, 45),
(46, '2022-05-24 12:00:00', 1, 4, 46),
(47, '2022-04-11 10:00:00', 1, 3, 47),
(48, '2022-05-10 11:00:00', 1, 3, 48),
(49, '2022-05-23 13:00:00', 1, 3, 49),
(50, '2022-06-4 14:00:00', 1, 2, 50),
(51, '2022-06-1 08:00:00', 1, 3, 51),
(52, '2022-05-10 15:00:00', 1, 4, 52),
(53, '2022-05-29 17:00:00', 1, 4, 53),
(54, '2022-05-8 11:00:00', 1, 2, 54),
(55, '2022-04-19 15:00:00', 1, 4, 55),
(56, '2022-05-23 16:00:00', 1, 3, 56),
(57, '2022-06-10 11:00:00', 1, 2, 57),
(58, '2022-05-4 12:00:00', 1, 2, 58),
(59, '2022-06-16 10:00:00', 1, 4, 59),
(60, '2022-04-17 09:00:00', 1, 4, 60),
(61, '2022-05-27 09:00:00', 1, 3, 61),
(62, '2022-05-21 11:00:00', 1, 2, 62),
(63, '2022-04-4 11:00:00', 1, 3, 63),
(64, '2022-05-10 18:00:00', 1, 2, 64),
(65, '2022-05-26 08:00:00', 1, 3, 65),
(66, '2022-06-19 11:00:00', 1, 4, 66),
(67, '2022-05-15 15:00:00', 1, 3, 67),
(68, '2022-06-19 15:00:00', 1, 4, 68),
(69, '2022-04-7 10:00:00', 1, 4, 69),
(70, '2022-04-4 08:00:00', 1, 4, 70),
(71, '2022-04-16 13:00:00', 1, 3, 71),
(72, '2022-06-26 15:00:00', 1, 4, 72),
(73, '2022-05-22 11:00:00', 1, 2, 73),
(74, '2022-04-15 18:00:00', 1, 4, 74),
(75, '2022-04-29 12:00:00', 1, 2, 75),
(76, '2022-04-20 08:00:00', 1, 3, 76),
(77, '2022-06-21 08:00:00', 1, 2, 77),
(78, '2022-05-7 13:00:00', 1, 2, 78),
(79, '2022-05-28 09:00:00', 1, 2, 79),
(80, '2022-04-22 10:00:00', 1, 3, 80),
(81, '2022-04-7 15:00:00', 1, 3, 81),
(82, '2022-04-21 13:00:00', 1, 3, 82),
(83, '2022-05-7 11:00:00', 1, 2, 83),
(84, '2022-04-7 09:00:00', 1, 4, 84),
(85, '2022-04-16 15:00:00', 1, 2, 85),
(86, '2022-06-29 14:00:00', 1, 4, 86),
(87, '2022-04-18 17:00:00', 1, 2, 87),
(88, '2022-04-28 12:00:00', 1, 4, 88),
(89, '2022-04-9 11:00:00', 1, 4, 89),
(90, '2022-05-22 15:00:00', 1, 3, 90),
(91, '2022-04-11 11:00:00', 1, 2, 91),
(92, '2022-04-26 09:00:00', 1, 3, 92),
(93, '2022-06-3 15:00:00', 1, 4, 93),
(94, '2022-06-16 10:00:00', 1, 3, 94),
(95, '2022-04-2 10:00:00', 1, 4, 95),
(96, '2022-04-1 09:00:00', 1, 4, 96),
(97, '2022-05-29 11:00:00', 1, 4, 97),
(98, '2022-05-12 16:00:00', 1, 4, 98),
(99, '2022-05-14 08:00:00', 1, 2, 99),
(100, '2022-04-20 16:00:00', 1, 4, 100);

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
(13, 'Uleiuri si Lubrifianti'),
(14, 'Plastice si Aptibilduri'),
(15, 'Protectii si Scuturi'),
(16, 'Radiatoare'),
(17, 'Suspensii Moto');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `file` mediumblob NOT NULL,
  `id_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `forms`
--

CREATE TABLE `forms` (
  `id_form` int(11) NOT NULL,
  `request_message` varchar(500) DEFAULT NULL,
  `response_message` varchar(500) DEFAULT NULL,
  `reserved_parts_list` varchar(500) DEFAULT NULL
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
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `price` int(10) NOT NULL DEFAULT 10,
  `id_stoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `parts`
--

INSERT INTO `parts` (`id_part`, `name`, `id_category`, `id_brand`, `price`, `id_stoc`) VALUES
(1, 'Claxon 12V Negru', 1, 10, 30, 1),
(2, 'Protectie schimbator viteze', 1, 10, 25, 2),
(3, 'Cablu antifurt', 1, 10, 85, 3),
(4, 'Anvelopa Spate', 2, 1, 800, 4),
(5, 'Anvelopa Spate', 2, 1, 810, 5),
(6, 'Anvelopa Spate', 2, 2, 820, 6),
(7, 'Anvelopa Spate', 2, 3, 830, 7),
(8, 'Anvelopa Spate', 2, 4, 840, 8),
(9, 'Anvelopa Spate', 2, 5, 850, 9),
(10, 'Anvelopa Spate', 2, 6, 750, 10),
(11, 'Anvelopa Spate', 2, 7, 760, 11),
(12, 'Anvelopa Spate', 2, 8, 770, 12),
(13, 'Anvelopa Spate', 2, 9, 780, 13),
(14, 'Anvelopa Fata', 2, 1, 610, 14),
(15, 'Anvelopa Fata', 2, 2, 620, 15),
(16, 'Anvelopa Fata', 2, 3, 630, 16),
(17, 'Anvelopa Fata', 2, 4, 640, 17),
(18, 'Anvelopa Fata', 2, 5, 650, 18),
(19, 'Anvelopa Fata', 2, 6, 660, 19),
(20, 'Anvelopa Fata', 2, 7, 670, 20),
(21, 'Anvelopa Fata', 2, 8, 680, 21),
(22, 'Anvelopa Fata', 2, 9, 690, 22),
(23, 'Kit piston', 3, 1, 110, 23),
(24, 'kit piston', 3, 2, 120, 24),
(25, 'kit piston', 3, 3, 130, 25),
(26, 'kit piston', 3, 4, 140, 26),
(27, 'kit piston', 3, 5, 150, 27),
(28, 'kit piston', 3, 6, 150, 28),
(29, 'kit piston', 3, 7, 160, 29),
(30, 'kit piston', 3, 8, 170, 30),
(31, 'kit piston', 3, 9, 180, 31),
(32, 'garnitura', 3, 1, 10, 32),
(33, 'garnitura', 3, 2, 20, 33),
(34, 'garnitura', 3, 3, 30, 34),
(35, 'garnitura', 3, 4, 40, 35),
(36, 'garnitura', 3, 5, 50, 36),
(37, 'garnitura', 3, 6, 60, 37),
(38, 'garnitura', 3, 7, 70, 38),
(39, 'garnitura', 3, 8, 80, 39),
(40, 'garnitura', 3, 9, 90, 40),
(41, 'supapa', 3, 1, 10, 41),
(42, 'supapa', 3, 2, 20, 42),
(43, 'supapa', 3, 3, 30, 43),
(44, 'supapa', 3, 4, 40, 44),
(45, 'supapa', 3, 5, 50, 45),
(46, 'supapa', 3, 6, 60, 46),
(47, 'supapa', 3, 7, 70, 47),
(48, 'supapa', 3, 8, 80, 48),
(49, 'supapa', 3, 9, 90, 49),
(50, 'Kit Reparatie Bascula', 4, 1, 110, 50),
(51, 'Kit Reparatie Bascula', 4, 2, 120, 51),
(52, 'Kit Reparatie Bascula', 4, 3, 130, 52),
(53, 'Kit Reparatie Bascula', 4, 4, 140, 53),
(54, 'Kit Reparatie Bascula', 4, 5, 150, 54),
(55, 'Kit Reparatie Bascula', 4, 6, 150, 55),
(56, 'Kit Reparatie Bascula', 4, 7, 160, 56),
(57, 'Kit Reparatie Bascula', 4, 8, 170, 57),
(58, 'Kit Reparatie Bascula', 4, 9, 180, 58),
(59, 'Rulmenti de Jug', 4, 1, 10, 59),
(60, 'Rulmenti de Jug', 4, 2, 20, 60),
(61, 'Rulmenti de Jug', 4, 3, 30, 61),
(62, 'Rulmenti de Jug', 4, 4, 40, 62),
(63, 'Rulmenti de Jug', 4, 5, 50, 63),
(64, 'Rulmenti de Jug', 4, 6, 60, 64),
(65, 'Rulmenti de Jug', 4, 7, 70, 65),
(66, 'Rulmenti de Jug', 4, 8, 80, 66),
(67, 'Rulmenti de Jug', 4, 9, 90, 67),
(68, 'Kit Reparatie Bucsa', 4, 1, 10, 68),
(69, 'Kit Reparatie Bucsa', 4, 2, 20, 69),
(70, 'Kit Reparatie Bucsa', 4, 3, 30, 70),
(71, 'Kit Reparatie Bucsa', 4, 4, 40, 71),
(72, 'Kit Reparatie Bucsa', 4, 5, 50, 72),
(73, 'Kit Reparatie Bucsa', 4, 6, 60, 73),
(74, 'Kit Reparatie Bucsa', 4, 7, 70, 74),
(75, 'Kit Reparatie Bucsa', 4, 8, 80, 75),
(76, 'Kit Reparatie Bucsa', 4, 9, 90, 76),
(77, 'Acumulator', 5, 1, 110, 77),
(78, 'Acumulator', 5, 2, 120, 78),
(79, 'Acumulator', 5, 3, 130, 79),
(80, 'Acumulator', 5, 4, 140, 80),
(81, 'Acumulator', 5, 5, 150, 81),
(82, 'Acumulator', 5, 6, 150, 82),
(83, 'Acumulator', 5, 7, 160, 83),
(84, 'Acumulator', 5, 8, 170, 84),
(85, 'Acumulator', 5, 9, 180, 85),
(86, 'Becuri', 5, 1, 10, 86),
(87, 'Becuri', 5, 2, 20, 87),
(88, 'Becuri', 5, 3, 30, 88),
(89, 'Becuri', 5, 4, 40, 89),
(90, 'Becuri', 5, 5, 50, 90),
(91, 'Becuri', 5, 6, 60, 91),
(92, 'Becuri', 5, 7, 70, 92),
(93, 'Becuri', 5, 8, 80, 93),
(94, 'Becuri', 5, 9, 90, 94),
(95, 'Bujii', 5, 1, 10, 95),
(96, 'Bujii', 5, 2, 20, 96),
(97, 'Bujii', 5, 3, 30, 97),
(98, 'Bujii', 5, 4, 40, 98),
(99, 'Bujii', 5, 5, 50, 99),
(100, 'Bujii', 5, 6, 60, 100),
(101, 'Bujii', 5, 7, 70, 101),
(102, 'Bujii', 5, 8, 80, 102),
(103, 'Bujii', 5, 9, 90, 103),
(104, 'Evacuare moto', 6, 1, 110, 104),
(105, 'Evacuare moto', 6, 2, 120, 105),
(106, 'Evacuare moto', 6, 3, 130, 106),
(107, 'Evacuare moto', 6, 4, 140, 107),
(108, 'Evacuare moto', 6, 5, 150, 108),
(109, 'Evacuare moto', 6, 6, 150, 109),
(110, 'Evacuare moto', 6, 7, 160, 110),
(111, 'Evacuare moto', 6, 8, 170, 111),
(112, 'Evacuare moto', 6, 9, 180, 112),
(113, 'Filtru Benzina', 7, 1, 110, 113),
(114, 'Filtru Benzina', 7, 2, 120, 114),
(115, 'Filtru Benzina', 7, 3, 130, 115),
(116, 'Filtru Benzina', 7, 4, 140, 116),
(117, 'Filtru Benzina', 7, 5, 150, 117),
(118, 'Filtru Benzina', 7, 6, 150, 118),
(119, 'Filtru Benzina', 7, 7, 160, 119),
(120, 'Filtru Benzina', 7, 8, 170, 120),
(121, 'Filtru Benzina', 7, 9, 180, 121),
(122, 'Filtru de aer', 7, 1, 110, 122),
(123, 'Filtru de aer', 7, 2, 120, 123),
(124, 'Filtru de aer', 7, 3, 130, 124),
(125, 'Filtru de aer', 7, 4, 140, 125),
(126, 'Filtru de aer', 7, 5, 150, 126),
(127, 'Filtru de aer', 7, 6, 160, 127),
(128, 'Filtru de aer', 7, 7, 170, 128),
(129, 'Filtru de aer', 7, 8, 180, 129),
(130, 'Filtru de aer', 7, 9, 190, 130),
(131, 'Filtru ulei', 7, 1, 210, 131),
(132, 'Filtru ulei', 7, 2, 220, 132),
(133, 'Filtru ulei', 7, 3, 230, 133),
(134, 'Filtru ulei', 7, 4, 240, 134),
(135, 'Filtru ulei', 7, 5, 250, 135),
(136, 'Filtru ulei', 7, 6, 260, 136),
(137, 'Filtru ulei', 7, 7, 270, 137),
(138, 'Filtru ulei', 7, 8, 280, 138),
(139, 'Filtru ulei', 7, 9, 290, 139),
(140, 'Discuri Frana', 8, 1, 110, 140),
(141, 'Discuri Frana', 8, 2, 120, 141),
(142, 'Discuri Frana', 8, 3, 130, 142),
(143, 'Discuri Frana', 8, 4, 140, 143),
(144, 'Discuri Frana', 8, 5, 150, 144),
(145, 'Discuri Frana', 8, 6, 150, 145),
(146, 'Discuri Frana', 8, 7, 160, 146),
(147, 'Discuri Frana', 8, 8, 170, 147),
(148, 'Discuri Frana', 8, 9, 180, 148),
(149, 'Kit Reparatie Frana', 8, 1, 110, 149),
(150, 'Kit Reparatie Frana', 8, 2, 120, 150),
(151, 'Kit Reparatie Frana', 8, 3, 130, 151),
(152, 'Kit Reparatie Frana', 8, 4, 140, 152),
(153, 'Kit Reparatie Frana', 8, 5, 150, 153),
(154, 'Kit Reparatie Frana', 8, 6, 160, 154),
(155, 'Kit Reparatie Frana', 8, 7, 170, 155),
(156, 'Kit Reparatie Frana', 8, 8, 180, 156),
(157, 'Kit Reparatie Frana', 8, 9, 190, 157),
(158, 'Kit Upgrade Frana', 8, 1, 210, 158),
(159, 'Kit Upgrade Frana', 8, 2, 220, 159),
(160, 'Kit Upgrade Frana', 8, 3, 230, 160),
(161, 'Kit Upgrade Frana', 8, 4, 240, 161),
(162, 'Kit Upgrade Frana', 8, 5, 250, 162),
(163, 'Kit Upgrade Frana', 8, 6, 260, 163),
(164, 'Kit Upgrade Frana', 8, 7, 270, 164),
(165, 'Kit Upgrade Frana', 8, 8, 280, 165),
(166, 'Kit Upgrade Frana', 8, 9, 290, 166),
(167, 'Husa', 9, 1, 110, 167),
(168, 'Husa', 9, 2, 120, 168),
(169, 'Husa', 9, 3, 130, 169),
(170, 'Husa', 9, 4, 140, 170),
(171, 'Husa', 9, 5, 150, 171),
(172, 'Husa', 9, 6, 150, 172),
(173, 'Husa', 9, 7, 160, 173),
(174, 'Husa', 9, 8, 170, 174),
(175, 'Husa', 9, 9, 180, 175),
(176, 'Kit Lant Moto', 10, 1, 110, 176),
(177, 'Kit Lant Moto', 10, 2, 120, 177),
(178, 'Kit Lant Moto', 10, 3, 130, 178),
(179, 'Kit Lant Moto', 10, 4, 140, 179),
(180, 'Kit Lant Moto', 10, 5, 150, 180),
(181, 'Kit Lant Moto', 10, 6, 150, 181),
(182, 'Kit Lant Moto', 10, 7, 160, 182),
(183, 'Kit Lant Moto', 10, 8, 170, 183),
(184, 'Kit Lant Moto', 10, 9, 180, 184),
(185, 'KTM Sistem Racire', 11, 1, 110, 185),
(186, 'KTM Sistem Racire', 11, 2, 120, 186),
(187, 'KTM Sistem Racire', 11, 3, 130, 187),
(188, 'KTM Sistem Racire', 11, 4, 140, 188),
(189, 'KTM Sistem Racire', 11, 5, 150, 189),
(190, 'KTM Sistem Racire', 11, 6, 150, 190),
(191, 'KTM Sistem Racire', 11, 7, 160, 191),
(192, 'KTM Sistem Racire', 11, 8, 170, 192),
(193, 'KTM Sistem Racire', 11, 9, 180, 193),
(194, 'Ghidoan', 12, 1, 110, 194),
(195, 'Ghidoan', 12, 2, 120, 195),
(196, 'Ghidoan', 12, 3, 130, 196),
(197, 'Ghidoan', 12, 4, 140, 197),
(198, 'Ghidoan', 12, 5, 150, 198),
(199, 'Ghidoan', 12, 6, 150, 199),
(200, 'Ghidoan', 12, 7, 160, 200),
(201, 'Ghidoan', 12, 8, 170, 201),
(202, 'Ghidoan', 12, 9, 180, 202),
(203, 'Maneta Ambreiaj', 12, 1, 110, 203),
(204, 'Maneta Ambreiaj', 12, 2, 120, 204),
(205, 'Maneta Ambreiaj', 12, 3, 130, 205),
(206, 'Maneta Ambreiaj', 12, 4, 140, 206),
(207, 'Maneta Ambreiaj', 12, 5, 150, 207),
(208, 'Maneta Ambreiaj', 12, 6, 160, 208),
(209, 'Maneta Ambreiaj', 12, 7, 170, 208),
(210, 'Maneta Ambreiaj', 12, 8, 180, 210),
(211, 'Maneta Ambreiaj', 12, 9, 190, 211),
(212, 'Maneta Frana ', 12, 1, 210, 212),
(213, 'Maneta Frana ', 12, 2, 220, 213),
(214, 'Maneta Frana ', 12, 3, 230, 214),
(215, 'Maneta Frana ', 12, 4, 240, 215),
(216, 'Maneta Frana ', 12, 5, 250, 216),
(217, 'Maneta Frana ', 12, 6, 260, 217),
(218, 'Maneta Frana ', 12, 7, 270, 218),
(219, 'Maneta Frana ', 12, 8, 280, 219),
(220, 'Maneta Frana ', 12, 9, 290, 220);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `stoc`
--

CREATE TABLE `stoc` (
  `id_stoc` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `cantitate_stoc` int(11) NOT NULL DEFAULT 0,
  `cantitate_rezervata` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `stoc`
--

INSERT INTO `stoc` (`id_stoc`, `id_part`, `cantitate_stoc`, `cantitate_rezervata`) VALUES
(1, 1, 18, 0),
(2, 2, 10, 2),
(3, 3, 19, 1),
(4, 4, 23, 1),
(5, 5, 18, 0),
(6, 6, 22, 3),
(7, 7, 7, 2),
(8, 8, 20, 2),
(9, 9, 17, 4),
(10, 10, 19, 1),
(11, 11, 9, 3),
(12, 12, 20, 3),
(13, 13, 0, 0),
(14, 14, 28, 0),
(15, 15, 6, 3),
(16, 16, 22, 3),
(17, 17, 2, 0),
(18, 18, 14, 0),
(19, 19, 6, 0),
(20, 20, 9, 3),
(21, 21, 6, 4),
(22, 22, 15, 3),
(23, 23, 13, 3),
(24, 24, 19, 2),
(25, 25, 11, 1),
(26, 26, 6, 3),
(27, 27, 9, 0),
(28, 28, 18, 3),
(29, 29, 1, 0),
(30, 30, 21, 4),
(31, 31, 14, 1),
(32, 32, 27, 4),
(33, 33, 27, 1),
(34, 34, 29, 0),
(35, 35, 20, 0),
(36, 36, 19, 1),
(37, 37, 20, 2),
(38, 38, 21, 0),
(39, 39, 3, 0),
(40, 40, 14, 1),
(41, 41, 8, 3),
(42, 42, 29, 4),
(43, 43, 13, 3),
(44, 44, 26, 1),
(45, 45, 19, 3),
(46, 46, 15, 0),
(47, 47, 24, 1),
(48, 48, 29, 2),
(49, 49, 11, 4),
(50, 50, 24, 0),
(51, 51, 25, 0),
(52, 52, 1, 0),
(53, 53, 11, 2),
(54, 54, 11, 0),
(55, 55, 7, 1),
(56, 56, 14, 1),
(57, 57, 17, 1),
(58, 58, 24, 1),
(59, 59, 2, 1),
(60, 60, 27, 2),
(61, 61, 29, 0),
(62, 62, 9, 1),
(63, 63, 0, 0),
(64, 64, 11, 3),
(65, 65, 6, 1),
(66, 66, 8, 1),
(67, 67, 4, 1),
(68, 68, 1, 0),
(69, 69, 11, 0),
(70, 70, 25, 3),
(71, 71, 19, 4),
(72, 72, 19, 3),
(73, 73, 7, 0),
(74, 74, 5, 2),
(75, 75, 22, 0),
(76, 76, 22, 2),
(77, 77, 22, 4),
(78, 78, 15, 2),
(79, 79, 18, 4),
(80, 80, 1, 0),
(81, 81, 15, 4),
(82, 82, 13, 3),
(83, 83, 3, 0),
(84, 84, 20, 2),
(85, 85, 21, 3),
(86, 86, 22, 2),
(87, 87, 9, 0),
(88, 88, 25, 2),
(89, 89, 23, 4),
(90, 90, 10, 4),
(91, 91, 15, 3),
(92, 92, 6, 4),
(93, 93, 8, 2),
(94, 94, 9, 4),
(95, 95, 5, 1),
(96, 96, 10, 4),
(97, 97, 20, 2),
(98, 98, 24, 3),
(99, 99, 14, 2),
(100, 100, 26, 4),
(101, 101, 18, 3),
(102, 102, 26, 3),
(103, 103, 15, 0),
(104, 104, 2, 0),
(105, 105, 7, 2),
(106, 106, 5, 0),
(107, 107, 25, 1),
(108, 108, 6, 3),
(109, 109, 2, 1),
(110, 110, 17, 3),
(111, 111, 28, 2),
(112, 112, 0, 0),
(113, 113, 25, 1),
(114, 114, 14, 4),
(115, 115, 0, 0),
(116, 116, 9, 2),
(117, 117, 20, 2),
(118, 118, 1, 0),
(119, 119, 13, 1),
(120, 120, 10, 2),
(121, 121, 1, 0),
(122, 122, 9, 0),
(123, 123, 25, 1),
(124, 124, 21, 3),
(125, 125, 14, 0),
(126, 126, 27, 0),
(127, 127, 29, 3),
(128, 128, 9, 3),
(129, 129, 14, 2),
(130, 130, 20, 1),
(131, 131, 13, 1),
(132, 132, 17, 1),
(133, 133, 5, 1),
(134, 134, 20, 1),
(135, 135, 6, 0),
(136, 136, 9, 1),
(137, 137, 5, 0),
(138, 138, 25, 3),
(139, 139, 16, 3),
(140, 140, 7, 1),
(141, 141, 17, 4),
(142, 142, 2, 0),
(143, 143, 16, 3),
(144, 144, 19, 4),
(145, 145, 24, 3),
(146, 146, 12, 2),
(147, 147, 1, 0),
(148, 148, 1, 0),
(149, 149, 17, 1),
(150, 150, 21, 0),
(151, 151, 14, 2),
(152, 152, 16, 0),
(153, 153, 22, 0),
(154, 154, 17, 1),
(155, 155, 5, 0),
(156, 156, 3, 0),
(157, 157, 29, 2),
(158, 158, 21, 2),
(159, 159, 19, 3),
(160, 160, 11, 4),
(161, 161, 22, 1),
(162, 162, 6, 0),
(163, 163, 18, 4),
(164, 164, 11, 4),
(165, 165, 21, 2),
(166, 166, 1, 0),
(167, 167, 25, 0),
(168, 168, 21, 2),
(169, 169, 14, 4),
(170, 170, 29, 2),
(171, 171, 19, 1),
(172, 172, 6, 1),
(173, 173, 29, 4),
(174, 174, 13, 4),
(175, 175, 29, 2),
(176, 176, 28, 2),
(177, 177, 14, 4),
(178, 178, 22, 3),
(179, 179, 27, 0),
(180, 180, 9, 2),
(181, 181, 16, 2),
(182, 182, 29, 2),
(183, 183, 20, 4),
(184, 184, 2, 0),
(185, 185, 13, 4),
(186, 186, 12, 0),
(187, 187, 16, 3),
(188, 188, 8, 3),
(189, 189, 22, 2),
(190, 190, 8, 0),
(191, 191, 9, 1),
(192, 192, 13, 3),
(193, 193, 24, 4),
(194, 194, 2, 0),
(195, 195, 8, 2),
(196, 196, 6, 0),
(197, 197, 8, 1),
(198, 198, 15, 4),
(199, 199, 4, 0),
(200, 200, 25, 3),
(201, 201, 27, 2),
(202, 202, 25, 4),
(203, 203, 26, 1),
(204, 204, 2, 0),
(205, 205, 13, 0),
(206, 206, 5, 3),
(207, 207, 25, 2),
(208, 208, 17, 2),
(209, 209, 7, 3),
(210, 210, 27, 2),
(211, 211, 1, 0),
(212, 212, 15, 0),
(213, 213, 14, 4),
(214, 214, 3, 0),
(215, 215, 6, 2),
(216, 216, 16, 3),
(217, 217, 19, 1),
(218, 218, 10, 4),
(219, 219, 2, 0),
(220, 220, 4, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `type`, `user_name`, `email`, `phone`, `password`) VALUES
(1, 1, 'admin', 'admin@cymat.ro', '0721231234', '1234'),
(2, 0, 'elena', 'elena@gmail.com', '0741231234', '1234'),
(3, 0, 'liliana', 'liliana@yahoo.com', '0751231234', '1234'),
(4, 0, 'adina', 'adina@hotmail.com', '0761231234', '1234');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id_appointment`),
  ADD UNIQUE KEY `id_appointment` (`id_appointment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status` (`status`),
  ADD KEY `status_2` (`status`);

--
-- Indexuri pentru tabele `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexuri pentru tabele `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexuri pentru tabele `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_formular` (`id_form`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- Indexuri pentru tabele `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id_part`),
  ADD UNIQUE KEY `id_part` (`id_part`);

--
-- Indexuri pentru tabele `stoc`
--
ALTER TABLE `stoc`
  ADD PRIMARY KEY (`id_stoc`),
  ADD UNIQUE KEY `id_part` (`id_part`),
  ADD KEY `id_stoc` (`id_stoc`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT pentru tabele `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `forms`
--
ALTER TABLE `forms`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `parts`
--
ALTER TABLE `parts`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT pentru tabele `stoc`
--
ALTER TABLE `stoc`
  MODIFY `id_stoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;