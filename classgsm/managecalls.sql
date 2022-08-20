-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2019 at 03:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managecalls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `base_station_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_lastname`, `admin_firstname`, `admin_password`, `admin_email`, `base_station_id`) VALUES
('Emmanuel', 'Peter', '827ccb0eea8a706c4c34a16891f84e7b', 'peter@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `base_station`
--

CREATE TABLE `base_station` (
  `base_station_id` int(100) NOT NULL,
  `nsp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num_channels` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `num_connect` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `base_station`
--

INSERT INTO `base_station` (`base_station_id`, `nsp`, `city`, `state`, `num_channels`, `num_connect`) VALUES
(1, 'MTN', 'Port Harcourt', 'Rivers State', '50', '5'),
(2, 'GLO', 'Yenagoa', 'Bayelsa', '100', '10'),
(3, 'AIRTEL', 'KANU', 'KANU', '30', '1'),
(4, 'MTN', 'ENUGU', 'ENUGU', '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `call_id` int(11) NOT NULL,
  `call_start_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `call_duration` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_call` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `source_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `destination_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`call_id`, `call_start_time`, `call_duration`, `date_of_call`, `source_number`, `destination_number`, `email`, `base_id`) VALUES
(2, '04:56:14pm', '62', '05/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '2'),
(3, '04:58:31pm', '41', '05/12/2019', '07062223456', '08051113455', 'oge@gmail.com', '2'),
(6, '03:07:21pm', '73', '06/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '3'),
(7, '10:35:14pm', '25', '11/12/2019', '08104380838', '07063032259', 'oge@gmail.com', '3'),
(8, '04:56:14pm', '62', '05/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '2'),
(9, '04:58:31pm', '41', '05/12/2019', '07062223456', '08051113455', 'oge@gmail.com', '2'),
(10, '03:07:21pm', '73', '06/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '3'),
(11, '10:35:14pm', '25', '11/12/2019', '08104380838', '07063032259', 'oge@gmail.com', '3'),
(12, '03:07:21pm', '73', '06/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '3'),
(13, '04:56:14pm', '62', '05/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '2'),
(14, '03:07:21pm', '73', '06/12/2019', '07062223456', '07063032259', 'oge@gmail.com', '3'),
(15, '10:35:14pm', '25', '11/12/2019', '08104380838', '07063032259', 'oge@gmail.com', '3');

-- --------------------------------------------------------

--
-- Table structure for table `network_line`
--

CREATE TABLE `network_line` (
  `id` int(11) NOT NULL,
  `sub_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nsp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `source_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `network_line`
--

INSERT INTO `network_line` (`id`, `sub_email`, `nsp`, `source_number`) VALUES
(1, 'oge@gmail.com', 'MTN', '07063032259'),
(2, 'oge@gmail.com', 'GLO', '08051113455');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_surname`, `sub_firstname`, `sub_email`, `date_of_birth`, `sex`, `sub_password`) VALUES
('Oge', 'Dan', 'oge@gmail.com', '5/5/1990', 'Male', '827ccb0eea8a706c4c34a16891f84e7b'),
('Olu', 'Dan', 'olu@gmail.com', '1990-12-12', 'female', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `base_station`
--
ALTER TABLE `base_station`
  ADD PRIMARY KEY (`base_station_id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`call_id`);

--
-- Indexes for table `network_line`
--
ALTER TABLE `network_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `base_station`
--
ALTER TABLE `base_station`
  MODIFY `base_station_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `call_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `network_line`
--
ALTER TABLE `network_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
