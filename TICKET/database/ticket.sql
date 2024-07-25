-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `travel_date` date NOT NULL,
  `departure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `route`, `destination`, `travel_date`, `departure_time`) VALUES
(1, 'dar-es-salaam-ubungo', 'mwanza-bus-stand', '2024-07-27', '18:00:00'),
(2, 'dar-es-salaam-ubungo', 'mwanza-bus-stand', '2024-07-27', '18:00:00'),
(3, 'arusha-bus-stand', 'dar-es-salaam-ubungo', '2024-12-26', '18:00:00'),
(4, 'arusha-bus-stand', 'dar-es-salaam-ubungo', '2024-12-26', '18:00:00'),
(5, 'dodoma-bus-stand', 'dar-es-salaam-ubungo', '2024-08-12', '18:00:00'),
(6, 'dar-es-salaam-ubungo', 'kigoma-bus-stand', '2024-07-26', '18:00:00'),
(7, 'bukoba-bus-stand', 'musoma-bus-stand', '2024-12-26', '18:00:00'),
(8, 'bukoba-bus-stand', 'dar-es-salaam-ubungo', '2024-08-25', '18:00:00'),
(9, 'musoma-bus-stand', 'dar-es-salaam-ubungo', '2024-08-27', '18:00:00'),
(10, 'arusha-bus-stand', 'mwanza-bus-stand', '2024-07-27', '18:30:00'),
(11, 'dodoma-bus-stand', 'mbeya-bus-stand', '2024-07-28', '18:00:00'),
(12, 'iringa-bus-stand', 'moshi-bus-stand', '2024-07-25', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `departure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `route`, `bus_name`, `departure_time`) VALUES
(1, 'arusha-bus-stand', 'Arusha Express', '08:00:00'),
(2, 'arusha-bus-stand', 'Arusha Deluxe', '12:00:00'),
(3, 'arusha-bus-stand', 'Arusha Fast', '15:00:00'),
(4, 'arusha-bus-stand', 'Arusha Premium', '18:00:00'),
(5, 'arusha-bus-stand', 'Arusha Comfort', '21:00:00'),
(6, 'dar-es-salaam-ubungo', 'Dar Express', '09:00:00'),
(7, 'dar-es-salaam-ubungo', 'Dar Lux', '14:00:00'),
(8, 'dar-es-salaam-ubungo', 'Dar Premium', '17:00:00'),
(9, 'dar-es-salaam-ubungo', 'Dar Comfort', '20:00:00'),
(10, 'dar-es-salaam-ubungo', 'Dar Fast', '23:00:00'),
(11, 'dodoma-bus-stand', 'Dodoma Express', '07:00:00'),
(12, 'dodoma-bus-stand', 'Dodoma Deluxe', '13:00:00'),
(13, 'dodoma-bus-stand', 'Dodoma Premium', '16:00:00'),
(14, 'dodoma-bus-stand', 'Dodoma Fast', '19:00:00'),
(15, 'dodoma-bus-stand', 'Dodoma Comfort', '22:00:00'),
(16, 'geita-bus-stand', 'Geita Express', '08:30:00'),
(17, 'geita-bus-stand', 'Geita Deluxe', '11:30:00'),
(18, 'geita-bus-stand', 'Geita Premium', '14:30:00'),
(19, 'geita-bus-stand', 'Geita Fast', '17:30:00'),
(20, 'geita-bus-stand', 'Geita Comfort', '20:30:00'),
(21, 'iringa-bus-stand', 'Iringa Express', '09:00:00'),
(22, 'iringa-bus-stand', 'Iringa Deluxe', '12:00:00'),
(23, 'iringa-bus-stand', 'Iringa Premium', '15:00:00'),
(24, 'iringa-bus-stand', 'Iringa Fast', '18:00:00'),
(25, 'iringa-bus-stand', 'Iringa Comfort', '21:00:00'),
(26, 'bukoba-bus-stand', 'Bukoba Express', '07:30:00'),
(27, 'bukoba-bus-stand', 'Bukoba Deluxe', '10:30:00'),
(28, 'bukoba-bus-stand', 'Bukoba Premium', '13:30:00'),
(29, 'bukoba-bus-stand', 'Bukoba Fast', '16:30:00'),
(30, 'bukoba-bus-stand', 'Bukoba Comfort', '19:30:00'),
(31, 'katavi-bus-stand', 'Katavi Express', '08:00:00'),
(32, 'katavi-bus-stand', 'Katavi Deluxe', '11:00:00'),
(33, 'katavi-bus-stand', 'Katavi Premium', '14:00:00'),
(34, 'katavi-bus-stand', 'Katavi Fast', '17:00:00'),
(35, 'katavi-bus-stand', 'Katavi Comfort', '20:00:00'),
(36, 'kigoma-bus-stand', 'Kigoma Express', '09:00:00'),
(37, 'kigoma-bus-stand', 'Kigoma Deluxe', '12:00:00'),
(38, 'kigoma-bus-stand', 'Kigoma Premium', '15:00:00'),
(39, 'kigoma-bus-stand', 'Kigoma Fast', '18:00:00'),
(40, 'kigoma-bus-stand', 'Kigoma Comfort', '21:00:00'),
(41, 'moshi-bus-stand', 'Moshi Express', '07:00:00'),
(42, 'moshi-bus-stand', 'Moshi Deluxe', '10:00:00'),
(43, 'moshi-bus-stand', 'Moshi Premium', '13:00:00'),
(44, 'moshi-bus-stand', 'Moshi Fast', '16:00:00'),
(45, 'moshi-bus-stand', 'Moshi Comfort', '19:00:00'),
(46, 'lindi-bus-stand', 'Lindi Express', '08:00:00'),
(47, 'lindi-bus-stand', 'Lindi Deluxe', '11:00:00'),
(48, 'lindi-bus-stand', 'Lindi Premium', '14:00:00'),
(49, 'lindi-bus-stand', 'Lindi Fast', '17:00:00'),
(50, 'lindi-bus-stand', 'Lindi Comfort', '20:00:00'),
(51, 'babati-bus-stand', 'Babati Express', '09:30:00'),
(52, 'babati-bus-stand', 'Babati Deluxe', '12:30:00'),
(53, 'babati-bus-stand', 'Babati Premium', '15:30:00'),
(54, 'babati-bus-stand', 'Babati Fast', '18:30:00'),
(55, 'babati-bus-stand', 'Babati Comfort', '21:30:00'),
(56, 'musoma-bus-stand', 'Musoma Express', '07:00:00'),
(57, 'musoma-bus-stand', 'Musoma Deluxe', '10:00:00'),
(58, 'musoma-bus-stand', 'Musoma Premium', '13:00:00'),
(59, 'musoma-bus-stand', 'Musoma Fast', '16:00:00'),
(60, 'musoma-bus-stand', 'Musoma Comfort', '19:00:00'),
(61, 'mbeya-bus-stand', 'Mbeya Express', '08:00:00'),
(62, 'mbeya-bus-stand', 'Mbeya Deluxe', '11:00:00'),
(63, 'mbeya-bus-stand', 'Mbeya Premium', '14:00:00'),
(64, 'mbeya-bus-stand', 'Mbeya Fast', '17:00:00'),
(65, 'mbeya-bus-stand', 'Mbeya Comfort', '20:00:00'),
(66, 'mjini-magharibi-bus-stand', 'Magharibi Express', '09:00:00'),
(67, 'mjini-magharibi-bus-stand', 'Magharibi Deluxe', '12:00:00'),
(68, 'mjini-magharibi-bus-stand', 'Magharibi Premium', '15:00:00'),
(69, 'mjini-magharibi-bus-stand', 'Magharibi Fast', '18:00:00'),
(70, 'mjini-magharibi-bus-stand', 'Magharibi Comfort', '21:00:00'),
(71, 'morogoro-bus-stand', 'Morogoro Express', '07:30:00'),
(72, 'morogoro-bus-stand', 'Morogoro Deluxe', '10:30:00'),
(73, 'morogoro-bus-stand', 'Morogoro Premium', '13:30:00'),
(74, 'morogoro-bus-stand', 'Morogoro Fast', '16:30:00'),
(75, 'morogoro-bus-stand', 'Morogoro Comfort', '19:30:00'),
(76, 'mtwara-bus-stand', 'Mtwara Express', '08:00:00'),
(77, 'mtwara-bus-stand', 'Mtwara Deluxe', '11:00:00'),
(78, 'mtwara-bus-stand', 'Mtwara Premium', '14:00:00'),
(79, 'mtwara-bus-stand', 'Mtwara Fast', '17:00:00'),
(80, 'mtwara-bus-stand', 'Mtwara Comfort', '20:00:00'),
(81, 'mwanza-bus-stand', 'Mwanza Express', '09:00:00'),
(82, 'mwanza-bus-stand', 'Mwanza Deluxe', '12:00:00'),
(83, 'mwanza-bus-stand', 'Mwanza Premium', '15:00:00'),
(84, 'mwanza-bus-stand', 'Mwanza Fast', '18:00:00'),
(85, 'mwanza-bus-stand', 'Mwanza Comfort', '21:00:00'),
(86, 'njombe-bus-stand', 'Njombe Express', '07:30:00'),
(87, 'njombe-bus-stand', 'Njombe Deluxe', '10:30:00'),
(88, 'njombe-bus-stand', 'Njombe Premium', '13:30:00'),
(89, 'njombe-bus-stand', 'Njombe Fast', '16:30:00'),
(90, 'njombe-bus-stand', 'Njombe Comfort', '19:30:00'),
(91, 'pemba-north-bus-stand', 'Pemba North Express', '08:00:00'),
(92, 'pemba-north-bus-stand', 'Pemba North Deluxe', '11:00:00'),
(93, 'pemba-north-bus-stand', 'Pemba North Premium', '14:00:00'),
(94, 'pemba-north-bus-stand', 'Pemba North Fast', '17:00:00'),
(95, 'pemba-north-bus-stand', 'Pemba North Comfort', '20:00:00'),
(96, 'pemba-south-bus-stand', 'Pemba South Express', '09:00:00'),
(97, 'pemba-south-bus-stand', 'Pemba South Deluxe', '12:00:00'),
(98, 'pemba-south-bus-stand', 'Pemba South Premium', '15:00:00'),
(99, 'pemba-south-bus-stand', 'Pemba South Fast', '18:00:00'),
(100, 'pemba-south-bus-stand', 'Pemba South Comfort', '21:00:00'),
(101, 'pwani-bus-stand', 'Pwani Express', '07:00:00'),
(102, 'pwani-bus-stand', 'Pwani Deluxe', '10:00:00'),
(103, 'pwani-bus-stand', 'Pwani Premium', '13:00:00'),
(104, 'pwani-bus-stand', 'Pwani Fast', '16:00:00'),
(105, 'pwani-bus-stand', 'Pwani Comfort', '19:00:00'),
(106, 'rukwa-bus-stand', 'Rukwa Express', '08:30:00'),
(107, 'rukwa-bus-stand', 'Rukwa Deluxe', '11:30:00'),
(108, 'rukwa-bus-stand', 'Rukwa Premium', '14:30:00'),
(109, 'rukwa-bus-stand', 'Rukwa Fast', '17:30:00'),
(110, 'rukwa-bus-stand', 'Rukwa Comfort', '20:30:00'),
(111, 'songea-bus-stand', 'Songea Express', '09:00:00'),
(112, 'songea-bus-stand', 'Songea Deluxe', '12:00:00'),
(113, 'songea-bus-stand', 'Songea Premium', '15:00:00'),
(114, 'songea-bus-stand', 'Songea Fast', '18:00:00'),
(115, 'songea-bus-stand', 'Songea Comfort', '21:00:00'),
(116, 'shinyanga-bus-stand', 'Shinyanga Express', '08:00:00'),
(117, 'shinyanga-bus-stand', 'Shinyanga Deluxe', '11:00:00'),
(118, 'shinyanga-bus-stand', 'Shinyanga Premium', '14:00:00'),
(119, 'shinyanga-bus-stand', 'Shinyanga Fast', '17:00:00'),
(120, 'shinyanga-bus-stand', 'Shinyanga Comfort', '20:00:00'),
(121, 'simiyu-bus-stand', 'Simiyu Express', '09:00:00'),
(122, 'simiyu-bus-stand', 'Simiyu Deluxe', '12:00:00'),
(123, 'simiyu-bus-stand', 'Simiyu Premium', '15:00:00'),
(124, 'simiyu-bus-stand', 'Simiyu Fast', '18:00:00'),
(125, 'simiyu-bus-stand', 'Simiyu Comfort', '21:00:00'),
(126, 'singida-bus-stand', 'Singida Express', '07:30:00'),
(127, 'singida-bus-stand', 'Singida Deluxe', '10:30:00'),
(128, 'singida-bus-stand', 'Singida Premium', '13:30:00'),
(129, 'singida-bus-stand', 'Singida Fast', '16:30:00'),
(130, 'singida-bus-stand', 'Singida Comfort', '19:30:00'),
(131, 'tabora-bus-stand', 'Tabora Express', '08:00:00'),
(132, 'tabora-bus-stand', 'Tabora Deluxe', '11:00:00'),
(133, 'tabora-bus-stand', 'Tabora Premium', '14:00:00'),
(134, 'tabora-bus-stand', 'Tabora Fast', '17:00:00'),
(135, 'tabora-bus-stand', 'Tabora Comfort', '20:00:00'),
(136, 'tanga-bus-stand', 'Tanga Express', '09:00:00'),
(137, 'tanga-bus-stand', 'Tanga Deluxe', '12:00:00'),
(138, 'tanga-bus-stand', 'Tanga Premium', '15:00:00'),
(139, 'tanga-bus-stand', 'Tanga Fast', '18:00:00'),
(140, 'tanga-bus-stand', 'Tanga Comfort', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `seat_number` varchar(10) NOT NULL,
  `status` enum('available','booked') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `departure_time` time NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `phone_number` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `bus_name`, `departure_time`, `first_name`, `last_name`, `age`, `sex`, `phone_number`, `nationality`, `booking_date`) VALUES
(1, 'Dar Lux', '14:00:00', 'EDWIN', 'TURYA', 16, 'male', 0, 'Tanzanian', '2024-07-23 11:25:23'),
(2, 'Dar Lux', '14:00:00', 'AAD', 'AAD', 36, 'male', 774892870, 'Tanzanian', '2024-07-23 12:11:28'),
(3, 'Dar Lux', '14:00:00', 'EDWIN', 'NASHON', 16, 'male', 64452444, 'Tanzanian', '2024-07-23 12:15:36'),
(4, 'Mwanza Fast', '18:00:00', 'SAM', 'JUMA', 36, 'male', 988876, 'Tanzanian', '2024-07-23 12:19:28'),
(5, 'Mbeya Express', '08:00:00', 'mwakipesile', 'mwaipopo', 36, 'male', 774892870, 'Tanzanian', '2024-07-23 13:15:23'),
(6, 'Mbeya Express', '08:00:00', 'mwakipesile', 'mwaipopo', 36, 'male', 774892870, 'Tanzanian', '2024-07-23 13:39:05'),
(7, 'Mbeya Express', '08:00:00', 'AAD', 'AAD', 50, 'male', 774892870, 'Tanzanian', '2024-07-23 13:40:24'),
(8, 'Moshi Comfort', '19:00:00', 'Collins', 'Olotu', 50, 'male', 675567890, 'Western Africa', '2024-07-23 18:13:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
