-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 12:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `email`, `phone`, `password`, `role`, `status`, `date`) VALUES
(1, 'A3dge', 'Daniel Jude', 'jude@gmail.com', '07063032259', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 0, '1992-03-09 00:00:00'),
(2, 'g5870E', 'Emmanuel Daniel', 'emma@gmail.com', '08169889334', 'e10adc3949ba59abbe56e057f20f883e', 'Receptionist', 0, '2021-03-20 00:00:00'),
(4, 'a1691K', 'Daniel Efire', 'efiri@gmail.com', '07012345678', 'e10adc3949ba59abbe56e057f20f883e', 'Doctor', 0, '2021-03-20 00:00:00'),
(5, 'X3846D', 'Elaun Adogu', 'eluan@gmail.com', '08144456788', 'e10adc3949ba59abbe56e057f20f883e', 'Nurse', 0, '2021-03-20 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
