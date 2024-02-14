-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 05:39 AM
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
-- Table structure for table `examname`
--

CREATE TABLE `examname` (
  `id` int(11) NOT NULL,
  `examFor` varchar(255) DEFAULT NULL,
  `dep_id` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `examName` varchar(255) DEFAULT NULL,
  `questionNumber` varchar(255) DEFAULT NULL,
  `percentageEasy` varchar(255) DEFAULT NULL,
  `percentageMedium` varchar(255) DEFAULT NULL,
  `percentageHard` varchar(255) DEFAULT NULL,
  `percentageveryhard` varchar(255) DEFAULT NULL,
  `exam_Types` varchar(255) DEFAULT NULL,
  `result_hide_show` varchar(255) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `marks_type` varchar(255) DEFAULT NULL,
  `passing_marks` varchar(255) DEFAULT NULL,
  `exam_type` varchar(255) DEFAULT NULL,
  `start_hours` varchar(20) DEFAULT NULL,
  `end_hours` varchar(20) DEFAULT NULL,
  `timings` varchar(255) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `randomCode` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `gen_code` varchar(255) DEFAULT NULL,
  `exam_created_type` varchar(255) DEFAULT NULL,
  `attempts` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examname`
--
ALTER TABLE `examname`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examname`
--
ALTER TABLE `examname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
