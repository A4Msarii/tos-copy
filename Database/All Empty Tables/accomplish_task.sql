-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 07:12 AM
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
-- Table structure for table `accomplish_task`
--

CREATE TABLE `accomplish_task` (
  `ac_id` int(11) NOT NULL,
  `Item_ac` varchar(255) DEFAULT NULL,
  `Stud_ac` varchar(255) DEFAULT NULL,
  `gradsheet_id` varchar(30) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `assign_class` varchar(30) DEFAULT NULL,
  `assign_class_table` varchar(30) DEFAULT NULL,
  `assign_class_table_cloneid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplish_task`
--
ALTER TABLE `accomplish_task`
  ADD PRIMARY KEY (`ac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplish_task`
--
ALTER TABLE `accomplish_task`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
