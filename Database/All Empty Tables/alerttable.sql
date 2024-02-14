-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 08:22 AM
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
-- Database: `grade sheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerttable`
--

CREATE TABLE `alerttable` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `alert_type` varchar(255) DEFAULT NULL,
  `message` varchar(3000) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL,
  `reciever_user_id` varchar(250) DEFAULT NULL,
  `alertCategory` varchar(255) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `alert_file` varchar(250) DEFAULT NULL,
  `alert_icon` varchar(250) DEFAULT NULL,
  `textcolor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerttable`
--
ALTER TABLE `alerttable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerttable`
--
ALTER TABLE `alerttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
