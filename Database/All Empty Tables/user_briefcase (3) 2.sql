-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 10:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `user_briefcase`
--

CREATE TABLE `user_briefcase` (
  `id` int(11) NOT NULL,
  `briefcase_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `folderId` varchar(255) DEFAULT NULL,
  `shopid` varchar(30) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `courseId` varchar(255) DEFAULT NULL,
  `stuId` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
