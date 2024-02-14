-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 11:22 AM
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
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`, `color`) VALUES
(1, 'instructor', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', NULL),
(2, 'student', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"0";s:22:"select_student_details";s:1:"1";}', NULL),
(3, 'super admin', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"1";s:8:"Datapage";s:1:"1";s:3:"CTP";s:1:"1";s:9:"Newcourse";s:1:"1";s:13:"sidebar_phase";s:1:"1";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', NULL),
(4, 'IT people', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', '#b6b11b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
