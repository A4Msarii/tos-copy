-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 01:00 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grade sheet`
--

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `percentagetype`, `percentage`, `color`, `description`) VALUES
(1, 'U-Unsatisfied', '40', '#ed4c78', NULL),
(2, 'F-Fair', '60', '#f5ca99', 'This got fair'),
(3, 'G-Good', '80', '#71869d', NULL),
(4, 'V- Very Good', '90', '#00c9a7', NULL),
(5, 'E- Excellent', '100', '#377dff', NULL),
(6, 'N- Not Graded', '0', 'Black', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
