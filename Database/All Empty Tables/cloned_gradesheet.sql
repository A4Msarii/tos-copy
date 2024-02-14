-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 11:01 AM
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
-- Table structure for table `cloned_gradesheet`
--

CREATE TABLE `cloned_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `instructor` varchar(30) DEFAULT NULL,
  `vehicle` varchar(30) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `duration_hours` varchar(3) NOT NULL,
  `duration_min` varchar(3) NOT NULL,
  `over_all_grade` varchar(30) DEFAULT NULL,
  `over_all_grade_per` varchar(30) DEFAULT NULL,
  `over_all_comment` varchar(3000) DEFAULT NULL,
  `comments` varchar(3000) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `cloned_id` int(30) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `gradsheet_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
