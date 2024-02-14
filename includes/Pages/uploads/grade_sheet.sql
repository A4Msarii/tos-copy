-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 09:36 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grade sheet`
--

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `shortacademic`, `ptype`, `percentage`, `phase`, `ctp`, `file`, `type`, `size`, `date`, `days`) VALUES
(1, 'acedemic', 'aced', NULL, NULL, '1', '1', '15484-mekala-rajesh-resume-(1).pdf', 'application/pdf', 682747757, '2023-08-22', 1),
(2, 'acedemic1', 'aced1', NULL, NULL, '1', '1', 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'location', NULL, '2023-08-22', 2),
(3, 'acedemic2', 'aed2', NULL, NULL, '1', '1', 'https://www.facebook.com/', 'link', NULL, '2023-08-22', 3),
(4, 'acedemic4', 'aed3', NULL, NULL, '1', '1', '77193-resume-(1).pdf', 'application/pdf', 1013765374, '2023-08-22', 11);

--
-- Dumping data for table `accomplish_task`
--

INSERT INTO `accomplish_task` (`ac_id`, `Item_ac`, `Stud_ac`, `gradsheet_id`, `Type`, `clone_id`, `assign_class`, `assign_class_table`, `assign_class_table_cloneid`) VALUES
(1, '1', '13', '3', 'item', NULL, '1', 'actual', NULL),
(2, '7', '13', '3', 'item', NULL, '1', 'actual', NULL),
(3, '8', '13', '3', 'item', NULL, '1', 'actual', NULL),
(4, '9', '13', '3', 'item', NULL, '1', 'actual', NULL),
(5, '7', '19', '4', 'item', NULL, NULL, NULL, NULL),
(6, '8', '19', '4', 'item', NULL, NULL, NULL, NULL),
(7, '9', '19', '4', 'item', NULL, NULL, NULL, NULL),
(8, '10', '19', '4', 'item', NULL, NULL, NULL, NULL);

--
-- Dumping data for table `acedemic_phase`
--

INSERT INTO `acedemic_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1'),
(2, '2', '1'),
(3, '3', '1'),
(4, '4', '1'),
(5, '5', '1');

--
-- Dumping data for table `acedemic_stu`
--

INSERT INTO `acedemic_stu` (`id`, `std_id`, `acedemic_id`, `permission`, `date`) VALUES
(8, 19, 3, '1', '2023-08-23 16:43:13.000000'),
(9, 13, 3, '1', '2023-08-23 16:43:14.000000'),
(11, 19, 4, '1', '2023-08-23 16:43:19.000000'),
(12, 13, 4, '1', '2023-08-23 16:43:19.000000'),
(14, 19, 1, '1', '2023-08-23 18:23:28.000000'),
(15, 13, 1, '1', '2023-08-23 18:23:28.000000'),
(16, 14, 1, '1', '2023-08-23 18:23:28.000000');

--
-- Dumping data for table `actual`
--

INSERT INTO `actual` (`id`, `actual`, `symbol`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'classs1', 'cl2', 'percentage', 100, '1', '1', '2023-08-22', 6),
(2, 'classs2', 'cl1', 'percentage', 100, '1', '1', '2023-08-22', 5),
(3, 'classs', 'scs', 'percentage', 100, '2', '1', '2023-09-03', NULL);

--
-- Dumping data for table `actual_phase`
--

INSERT INTO `actual_phase` (`id`, `phase`, `ctp_id`) VALUES
(6, '2', '1'),
(7, '3', '1'),
(8, '4', '1'),
(9, '5', '1'),
(10, '1', '1');

--
-- Dumping data for table `additional_task`
--

INSERT INTO `additional_task` (`ad_id`, `Item`, `Stud_id`, `gradesheet_id`, `type`, `clone_id`, `assign_class`, `assign_class_table`, `assign_class_table_cloneid`) VALUES
(1, '1', 13, '3', 'item', NULL, '1', 'actual', NULL),
(2, '2', 13, '3', 'item', NULL, '1', 'actual', NULL),
(3, '3', 13, '3', 'item', NULL, '1', 'actual', NULL),
(4, '1', 19, '4', 'item', NULL, NULL, NULL, NULL),
(5, '2', 19, '4', 'item', NULL, NULL, NULL, NULL),
(6, '3', 19, '4', 'item', NULL, NULL, NULL, NULL),
(7, '4', 19, '4', 'item', NULL, NULL, NULL, NULL),
(8, '5', 19, '4', 'item', NULL, NULL, NULL, NULL),
(9, '6', 19, '4', 'item', NULL, NULL, NULL, NULL),
(10, '7', 19, '4', 'item', NULL, NULL, NULL, NULL),
(11, '8', 19, '4', 'item', NULL, NULL, NULL, NULL),
(12, '9', 19, '4', 'item', NULL, NULL, NULL, NULL),
(13, '10', 19, '4', 'item', NULL, NULL, NULL, NULL),
(14, '11', 19, '4', 'item', NULL, NULL, NULL, NULL),
(15, '12', 19, '4', 'item', NULL, NULL, NULL, NULL),
(16, '13', 19, '4', 'item', NULL, NULL, NULL, NULL),
(17, '14', 19, '4', 'item', NULL, NULL, NULL, NULL),
(18, '15', 19, '4', 'item', NULL, NULL, NULL, NULL),
(19, '16', 19, '4', 'item', NULL, NULL, NULL, NULL),
(20, '1', 19, '4', 'subitem', NULL, NULL, NULL, NULL),
(21, '2', 19, '4', 'subitem', NULL, NULL, NULL, NULL),
(22, '3', 19, '4', 'subitem', NULL, NULL, NULL, NULL),
(23, '4', 19, '4', 'subitem', NULL, NULL, NULL, NULL),
(24, '5', 19, '4', 'subitem', NULL, NULL, NULL, NULL);

--
-- Dumping data for table `alertreply`
--

INSERT INTO `alertreply` (`id`, `alert_id`, `user_id`, `message`, `is_read`) VALUES
(1, 2, 15, 'ok', '0'),
(2, 1, 15, 'close', '0');

--
-- Dumping data for table `alerttable`
--

INSERT INTO `alerttable` (`id`, `user_id`, `alert_type`, `message`, `date`, `permission`, `reciever_user_id`, `alertCategory`, `color`, `alert_file`, `alert_icon`, `textcolor`) VALUES
(1, '11', 'eferfef', 'rferfer', '2023-08-24', 'instructor', NULL, 'Warning', '#f5ca99', '1', 'warning_b.png', 'black'),
(2, '11', 'efef', 'erferrg', '2023-08-24', 'instructor', '15', 'Warning', '#f5ca99', '1', 'warning_b.png', 'black');

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `senderId`, `receiverId`, `messages`, `date`) VALUES
(2, '11', '15', 'hiiii', '2023-08-24 15:05:23.000000');

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `checklist`, `ctp`, `subchecklist`, `description`, `status`, `priority`, `category`, `comment`, `date`) VALUES
(1, 'main checklist', '1', NULL, 'to give lesson', 'gfegeg', 'low', 'sadfsdfsdf', 'ththdvsdvsdv', '2023-08-17'),
(2, 'main checklist1', '1', NULL, 'to give lesson', 'gfegegdgndgd', 'medium', 'efefe', 'rerer', '2023-08-16');

--
-- Dumping data for table `classfilter`
--

INSERT INTO `classfilter` (`id`, `className`, `pageName`) VALUES
(7, 'sim', 'qual');

--
-- Dumping data for table `clearance_data`
--

INSERT INTO `clearance_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`) VALUES
(1, '1', NULL, '', '1'),
(2, '2', NULL, '', '1'),
(3, '3', NULL, '', '1'),
(4, '4', NULL, '', '1'),
(5, '5', NULL, '', '1'),
(6, '6', NULL, '', '1'),
(7, '7', NULL, '', '1'),
(8, '8', NULL, '', '1'),
(9, '9', NULL, '', '1'),
(10, '10', NULL, '', '1'),
(11, '11', NULL, '', '1'),
(12, '12', NULL, '', '1'),
(13, '13', NULL, '', '1'),
(14, '14', NULL, '', '1'),
(15, '15', NULL, '', '1'),
(16, '16', NULL, '', '1'),
(17, NULL, '1', '', '1'),
(18, NULL, '2', '', '1'),
(19, NULL, '3', '', '1'),
(20, NULL, '4', '', '1'),
(21, NULL, '5', '', '1');

--
-- Dumping data for table `clearance_student_id`
--

INSERT INTO `clearance_student_id` (`id`, `clearance_id`, `stud_id`, `class_id`, `class_table`, `clone_cid`) VALUES
(1, '1', '13', '1', 'actual', NULL),
(3, '3', '13', '1', 'actual', NULL),
(4, '4', '13', '1', 'actual', NULL),
(5, '5', '13', '1', 'actual', NULL),
(6, '6', '13', '1', 'actual', NULL),
(7, '2', '13', '2', 'actual', NULL),
(8, '1', '19', '2', 'actual', NULL),
(9, '2', '19', '1', 'actual', NULL);

--
-- Dumping data for table `cloned_gradesheet`
--

INSERT INTO `cloned_gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `status`, `cloned_id`, `created_at`, `gradsheet_status`) VALUES
(1, '13', '1', '1', '1', 'actual', '15', '1', '15:44', '2023-08-09', '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '14', '1', '1', '1', 'actual', '15', '2', '11:15', '2023-08-10', '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

--
-- Dumping data for table `clone_class`
--

INSERT INTO `clone_class` (`id`, `class_id`, `std_id`, `class_name`, `cloned_id`) VALUES
(1, '1', '13', 'actual', 1),
(2, '2', '13', 'actual', 1),
(3, '1', '13', 'actual', 2),
(4, '2', '13', 'actual', 2),
(5, '1', '13', 'sim', 1),
(6, '2', '13', 'sim', 1),
(7, '3', '13', 'sim', 1),
(8, '4', '13', 'sim', 1),
(9, '1', '13', 'sim', 2),
(10, '2', '13', 'sim', 2),
(11, '3', '13', 'sim', 2),
(12, '4', '13', 'sim', 2),
(13, '1', '14', 'actual', 1),
(14, '1', '19', 'actual', 1);

--
-- Dumping data for table `ctppage`
--

INSERT INTO `ctppage` (`CTPid`, `course`, `symbol`, `Type`, `VehicleType`, `manual`, `Sponcors`, `Location`, `CourseAim`, `ClassSize`, `description`, `duration`, `goal`, `total_mark`, `divisionType`, `color`, `vehicleName`) VALUES
(1, 'Driving School Advanced1', 'ad1', 'science', '0', 'Mekala-Rajesh-Resume.pdf', 'test', 'Alkarama Branch A', 'test', 5, 'kdfncijsdnijn', '50', '', NULL, '1', NULL, '');

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `divisionName`, `color`) VALUES
(1, 'division1', '#bf2222'),
(2, 'division', '#adcd0e'),
(3, 'division2', '#426bcd'),
(4, 'division3', '#09c6ec');

--
-- Dumping data for table `division_department`
--

INSERT INTO `division_department` (`id`, `departmentId`, `divisionId`) VALUES
(1, '0', '1'),
(2, '0', '2'),
(4, '2', '2'),
(5, '3', '3'),
(6, '4', '4'),
(7, '1', '1');

--
-- Dumping data for table `extra_item_subitem`
--

INSERT INTO `extra_item_subitem` (`id`, `item_id`, `user_id`, `class_id`, `class`, `data_type`, `grade_id`) VALUES
(1, '11', '13', '1', 'actual', 'item', '3'),
(2, '12', '13', '1', 'actual', 'item', '3'),
(3, '13', '13', '1', 'actual', 'item', '3'),
(5, '2', '19', '2', 'actual', 'item', '7'),
(6, '3', '19', '2', 'actual', 'item', '7');

--
-- Dumping data for table `extra_item_subitem_grades`
--

INSERT INTO `extra_item_subitem_grades` (`id`, `user_id`, `item_id`, `grade`, `date`, `type`) VALUES
(1, '13', '11', 'U', '2023-08-22 16:48:28', 'item'),
(2, '13', '12', 'G', '2023-08-22 16:48:28', 'item'),
(3, '13', '13', 'G', '2023-08-22 16:48:28', 'item'),
(4, '19', '1', 'U', '2023-08-23 12:43:19', 'item'),
(5, '19', '2', 'F', '2023-08-23 12:43:19', 'item'),
(6, '19', '3', 'G', '2023-08-23 12:43:19', 'item');

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `goal`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'phase goals1', '1', '1', '2023-08-22', NULL),
(2, 'phase goals2', '1', '1', '2023-08-22', NULL),
(3, 'phase goals3', '1', '1', '2023-08-22', NULL),
(4, 'phase goals4', '1', '1', '2023-08-22', NULL);

--
-- Dumping data for table `gradesheet`
--

INSERT INTO `gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `gradsheet_status`, `status`, `created_at`) VALUES
(1, '13', '1', '1', '1', 'sim', '15', '1', '15:40', '2023-08-24', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-22 15:39:39.000000'),
(2, '13', '1', '1', '2', 'sim', '28', '1', '15:45', '2023-08-06', '10', '20', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-22 15:42:08.000000'),
(3, '13', '1', '1', '1', 'actual', '15', '2', '16:29', '2023-08-03', '', '', NULL, '', ' ', '\r\n              \r\n              \r\n              \r\n              \r\n              \r\n              \r\n              \r\n              \r\n              \r\n                                                                                                                                      ', NULL, '0', '2023-08-22 16:27:36.000000'),
(4, '19', '1', '1', '1', 'actual', '15', '1', '16:50', '2023-08-23', '', '', 'U', '10', ' efeergerht', '\r\n              \r\n              \r\n              \r\n                                                              ', '1', '0', '2023-08-22 16:47:43.000000'),
(5, '14', '1', '1', '1', 'actual', '15', '1', '00:12', '2023-08-02', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 09:12:23.000000'),
(6, '19', '1', '1', '1', 'sim', '28', '1', '09:24', '2023-08-17', '', '', 'U', '10', ' ', '\r\n                          ', '1', '0', '2023-08-23 09:22:35.000000'),
(7, '19', '1', '1', '2', 'actual', '15', '1', '09:38', '2023-08-24', '', '', 'U', '10', ' k8ui8k', '\r\n              \r\n              \r\n                                                  ', '1', '0', '2023-08-23 09:35:07.000000'),
(8, '13', '1', '1', '2', 'actual', '15', '1', '14:19', '2023-08-09', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 14:17:45.000000'),
(9, '14', '1', '1', '1', 'sim', '15', '2', '17:10', '2023-08-15', '', '', 'U', '10', ' ', '\r\n                          ', NULL, '0', '2023-08-25 15:10:29.000000'),
(10, '14', '1', '1', '2', 'actual', '15', '2', '16:11', '2023-08-15', '', '', 'U', '10', ' ', '\r\n                          ', NULL, '0', '2023-08-25 15:11:43.000000');

--
-- Dumping data for table `grade_per`
--

INSERT INTO `grade_per` (`id`, `grade`, `permission`) VALUES
(2, 'U', '0'),
(3, 'F', '0'),
(4, 'G', '0'),
(5, 'V', '0'),
(6, 'E', '0'),
(7, 'N', '0');

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `file_name`, `uploaded_on`, `user_id`, `school_name`, `department_name`, `type`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, '404-Error.gif', '2023-08-22 13:49:00', '11', '1', 'department', NULL, 'to give lesson', 'india', '', 'archana@gmail.com', '', 'hello ebdhebdkjefnedme;'),
(2, 'MicrosoftTeams-image.png', '2023-08-22 13:49:34', '11', '1', 'departement1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '404-Error.gif', NULL, '11', '1', 'departement2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '404-Error.gif', '2023-08-22 13:49:45', '11', '1', 'departement3', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `course_id`, `class_id`, `phase_id`, `class`, `CTS`) VALUES
(1, '1', '1', '1', '1', 'actual', NULL),
(2, '2', '1', '1', '1', 'actual', NULL),
(3, '3', '1', '1', '1', 'actual', NULL),
(4, '4', '1', '1', '1', 'actual', NULL),
(5, '5', '1', '1', '1', 'actual', NULL),
(6, '6', '1', '1', '1', 'actual', NULL),
(7, '7', '1', '1', '1', 'actual', NULL),
(8, '8', '1', '1', '1', 'actual', NULL),
(9, '9', '1', '1', '1', 'actual', NULL),
(10, '10', '1', '1', '1', 'actual', NULL),
(11, '14', '1', '1', '1', 'actual', NULL),
(12, '15', '1', '1', '1', 'actual', NULL),
(13, '16', '1', '1', '1', 'actual', NULL),
(14, '1', '1', '1', '1', 'sim', NULL),
(15, '2', '1', '1', '1', 'sim', NULL),
(16, '3', '1', '1', '1', 'sim', NULL),
(17, '4', '1', '1', '1', 'sim', NULL),
(18, '5', '1', '1', '1', 'sim', NULL),
(19, '6', '1', '1', '1', 'sim', NULL),
(20, '7', '1', '1', '1', 'sim', NULL),
(21, '8', '1', '1', '1', 'sim', NULL),
(22, '9', '1', '1', '1', 'sim', NULL),
(23, '10', '1', '1', '1', 'sim', NULL),
(24, '11', '1', '1', '1', 'sim', NULL),
(25, '12', '1', '1', '1', 'sim', NULL),
(26, '13', '1', '1', '1', 'sim', NULL),
(27, '14', '1', '1', '1', 'sim', NULL),
(28, '15', '1', '1', '1', 'sim', NULL),
(29, '16', '1', '1', '1', 'sim', NULL);

--
-- Dumping data for table `itembank`
--

INSERT INTO `itembank` (`id`, `item`, `U`, `F`, `G`, `V`, `E`, `N`, `CTScondition`, `CTSstandards`) VALUES
(1, 'item', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'item1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'item2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'item3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'item4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'item0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'item7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'item4jk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'dscf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'item4asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'item1efer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'item564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'item43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'item49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'item4oo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'item49098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `item_gradesheet`
--

INSERT INTO `item_gradesheet` (`id`, `user_id`, `item_id`, `grade`, `date`) VALUES
(1, '13', '1', 'N', '2023-08-22'),
(2, '13', '2', 'V', '2023-08-22'),
(3, '13', '3', 'V', '2023-08-22'),
(4, '13', '4', 'V', '2023-08-22'),
(5, '13', '5', 'V', '2023-08-22'),
(6, '13', '6', 'V', '2023-08-22'),
(7, '13', '7', '', '2023-08-22'),
(8, '13', '8', '', '2023-08-22'),
(9, '13', '9', '', '2023-08-22'),
(10, '13', '10', '', '2023-08-22'),
(11, '13', '11', '', '2023-08-22'),
(12, '13', '12', '', '2023-08-22'),
(13, '13', '13', '', '2023-08-22'),
(14, '19', '1', 'U', '2023-08-23'),
(15, '19', '2', 'U', '2023-08-23'),
(16, '19', '3', 'U', '2023-08-23'),
(17, '19', '4', 'U', '2023-08-23'),
(18, '19', '5', 'U', '2023-08-23'),
(19, '19', '6', 'U', '2023-08-23'),
(20, '19', '7', 'N', '2023-08-23'),
(21, '19', '8', 'N', '2023-08-23'),
(22, '19', '9', 'N', '2023-08-23'),
(23, '19', '10', 'N', '2023-08-23'),
(24, '19', '11', 'U', '2023-08-23'),
(25, '19', '12', 'U', '2023-08-23'),
(26, '19', '13', 'U', '2023-08-23'),
(27, '19', '14', 'F', '2023-08-23'),
(28, '19', '15', 'F', '2023-08-23'),
(29, '19', '16', 'F', '2023-08-23'),
(30, '19', '17', 'F', '2023-08-23'),
(31, '19', '18', 'F', '2023-08-23'),
(32, '19', '19', 'F', '2023-08-23'),
(33, '19', '20', 'F', '2023-08-23'),
(34, '19', '21', 'F', '2023-08-23'),
(35, '19', '22', 'F', '2023-08-23'),
(36, '19', '23', 'F', '2023-08-23'),
(37, '19', '24', 'F', '2023-08-23'),
(38, '19', '25', 'F', '2023-08-23'),
(39, '19', '26', 'F', '2023-08-23'),
(40, '19', '27', 'F', '2023-08-23'),
(41, '19', '28', 'F', '2023-08-23'),
(42, '19', '29', 'F', '2023-08-23'),
(43, '14', '14', 'V', '2023-08-25'),
(44, '14', '15', 'V', '2023-08-25'),
(45, '14', '16', 'V', '2023-08-25'),
(46, '14', '17', 'V', '2023-08-25'),
(47, '14', '18', 'V', '2023-08-25'),
(48, '14', '19', 'V', '2023-08-25'),
(49, '14', '20', 'V', '2023-08-25'),
(50, '14', '21', 'V', '2023-08-25'),
(51, '14', '22', 'V', '2023-08-25'),
(52, '14', '23', 'V', '2023-08-25'),
(53, '14', '24', 'V', '2023-08-25'),
(54, '14', '25', 'V', '2023-08-25'),
(55, '14', '26', 'V', '2023-08-25'),
(56, '14', '27', 'V', '2023-08-25'),
(57, '14', '28', 'V', '2023-08-25'),
(58, '14', '29', 'V', '2023-08-25');

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `library`, `user_id`) VALUES
(1, 'Main', 'super_admin');

--
-- Dumping data for table `main_department`
--

INSERT INTO `main_department` (`id`, `file_name`, `uploaded_on`, `user_id`, `department_name`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, 'Briefcase v2.png', '2023-08-22', '11', 'main department', '', '', '', '', '', '');

--
-- Dumping data for table `manage_role_course_phase`
--

INSERT INTO `manage_role_course_phase` (`id`, `phase_id`, `intructor`, `b_up_manger`, `course_id`, `phaseDate`, `courseName`, `courseCode`) VALUES
(1, '1', '28', '28', '1', '2023-07-30', '1', '1'),
(2, '2', '28', '15', '1', '2023-08-08', '1', '1'),
(3, '3', '15', '15', '1', '2023-08-08', '1', '1'),
(4, '4', '15', '15', '1', '2023-07-31', '1', '1'),
(5, '5', '15', '15', '1', '2023-07-30', '1', '1'),
(6, '1', '28', '15', '2', '2023-08-06', '1', '2'),
(7, '2', '15', '15', '2', '2023-08-08', '1', '2'),
(8, '3', '28', '15', '2', '2023-08-01', '1', '2'),
(9, '4', '15', '15', '2', '2023-08-01', '1', '2'),
(10, '5', '28', '28', '2', '2023-07-31', '1', '2');

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`Courseid`, `CourseName`, `nick_name`, `CourseDate`, `CourseCode`, `StudentNames`, `CourseManager`, `file_name`, `Instructor`, `value_enter`, `departmentId`) VALUES
(1, '1', 'course1', '2023-08-21', 1, '19', '15', NULL, NULL, '', '1'),
(2, '1', 'course1', '2023-08-21', 2, '13', '15', NULL, NULL, '', '1'),
(3, '1', 'course1', '2023-08-21', 2, '14', '15', NULL, NULL, '', '1');

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `to_userid`, `if_admin`, `type`, `data`, `extra_data`, `class_id`, `class_name`, `is_read`, `permission`, `date`) VALUES
(2, '13', '28', NULL, 'sim', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-22 15:42:08.000000'),
(10, '14', '15', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 09:12:24.000000'),
(11, '19', '28', NULL, 'sim', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 09:22:35.000000'),
(12, '19', '15', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 09:35:07.000000'),
(13, '19', '15', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 09:58:35.000000'),
(20, '15', '19', NULL, 'academic', '3', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 16:13:27.000000'),
(21, '15', '13', NULL, 'academic', '3', 'Has Accepted Academic For', NULL, NULL, 1, 0, '2023-08-23 16:13:27.000000'),
(23, '15', '19', NULL, 'academic', '4', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 16:13:32.000000'),
(24, '15', '13', NULL, 'academic', '4', 'Has Accepted Academic For', NULL, NULL, 1, 0, '2023-08-23 16:13:32.000000'),
(33, '15', '19', NULL, 'academic', '3', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 16:43:13.000000'),
(34, '15', '13', NULL, 'academic', '3', 'Has Accepted Academic For', NULL, NULL, 1, 0, '2023-08-23 16:43:14.000000'),
(36, '15', '19', NULL, 'academic', '4', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 16:43:18.000000'),
(37, '15', '13', NULL, 'academic', '4', 'Has Accepted Academic For', NULL, NULL, 1, 0, '2023-08-23 16:43:19.000000'),
(40, '15', '19', NULL, 'academic', '1', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 18:23:28.000000'),
(41, '15', '13', NULL, 'academic', '1', 'Has Accepted Academic For', NULL, NULL, 1, 0, '2023-08-23 18:23:28.000000'),
(42, '15', '14', NULL, 'academic', '1', 'Has Accepted Academic For', NULL, NULL, 0, 0, '2023-08-23 18:23:28.000000'),
(43, '13', '15', NULL, 'academic', '2', 'has request you to give acedemic for', NULL, NULL, 1, 0, '2023-08-23 18:24:10.000000'),
(44, '13', '15', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-25 14:17:45.000000'),
(45, '14', '15', NULL, 'sim', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-25 15:10:29.000000'),
(46, '14', '15', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-25 15:11:43.000000');

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

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`id`, `phasename`, `objective`, `ctp`, `color`, `phaseDuration`) VALUES
(1, 'phase1', 'flniefniuewmefne', '1', '#c7ca21', '20'),
(2, 'phase2', 'edfelkfnjenedfv ldkfmoidkcmd\r\n', '1', '#44d011', '10'),
(3, 'phase3', 'eflknjfnfje\r\n', '1', '#1055f4', '20'),
(4, 'phase4', 'dfkleioej\r\n', '1', '#d016ca', NULL),
(5, 'phase5', NULL, '1', '#ce3636', NULL);

--
-- Dumping data for table `qual_data`
--

INSERT INTO `qual_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`) VALUES
(1, '1', NULL, '', '1'),
(2, '2', NULL, '', '1'),
(3, '3', NULL, '', '1'),
(4, '4', NULL, '', '1'),
(5, '5', NULL, '', '1'),
(6, '6', NULL, '', '1'),
(7, '7', NULL, '', '1'),
(8, '8', NULL, '', '1'),
(9, '9', NULL, '', '1'),
(10, '10', NULL, '', '1'),
(11, '11', NULL, '', '1'),
(12, '12', NULL, '', '1'),
(13, '13', NULL, '', '1'),
(14, '14', NULL, '', '1'),
(15, '15', NULL, '', '1'),
(16, '16', NULL, '', '1'),
(17, NULL, '1', '', '1'),
(18, NULL, '2', '', '1'),
(19, NULL, '3', '', '1'),
(20, NULL, '4', '', '1'),
(21, NULL, '5', '', '1');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`, `color`) VALUES
(1, 'instructor', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL),
(2, 'student', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"0\";s:22:\"select_student_details\";s:1:\"1\";}', NULL),
(3, 'super admin', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL);

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `shelf`, `library_id`) VALUES
(0, 'btgbt', '1');

--
-- Dumping data for table `sidebar_ctp`
--

INSERT INTO `sidebar_ctp` (`id`, `ctp_id`) VALUES
(0, '1');

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`id`, `sim`, `shortsim`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'sim', 'si1', '', 100, '1', '1', '2023-08-22', 7),
(2, 'sim1', 'si2', '', 100, '1', '1', '2023-08-22', 8),
(3, 'sim2', 'si3', '', 100, '1', '1', '2023-08-22', 10),
(4, 'sim3', 'si4', '', 100, '1', '1', '2023-08-22', 7);

--
-- Dumping data for table `sim_phase`
--

INSERT INTO `sim_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1'),
(2, '2', '1'),
(3, '3', '1'),
(4, '4', '1'),
(5, '5', '1');

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `code`, `ctp`, `description`, `explanation`, `progression`) VALUES
(1, 'fail', NULL, 'student failed', 'if gets U ', '10%'),
(2, 'good', NULL, 'student passed', 'if gets V', '70%');

--
-- Dumping data for table `subcheclist`
--

INSERT INTO `subcheclist` (`id`, `name`, `main_checklist_id`) VALUES
(1, 'efefef', '1'),
(2, 'rfrfr', '1'),
(3, 'efev', '2');

--
-- Dumping data for table `subitem`
--

INSERT INTO `subitem` (`id`, `item`, `subitem`, `course_id`, `class_id`, `phase_id`, `class`, `CTS`) VALUES
(1, '1', '1', '1', '1', '1', 'actual', NULL),
(2, '1', '2', '1', '1', '1', 'actual', NULL),
(3, '1', '3', '1', '1', '1', 'actual', NULL),
(4, '1', '4', '1', '1', '1', 'actual', NULL),
(5, '1', '5', '1', '1', '1', 'actual', NULL),
(6, '1', '1', '1', '1', '1', 'sim', NULL),
(7, '1', '2', '1', '1', '1', 'sim', NULL),
(8, '1', '3', '1', '1', '1', 'sim', NULL),
(9, '1', '4', '1', '1', '1', 'sim', NULL),
(10, '1', '5', '1', '1', '1', 'sim', NULL);

--
-- Dumping data for table `subitem_gradesheet`
--

INSERT INTO `subitem_gradesheet` (`id`, `user_id`, `subitem_id`, `grade`, `date`) VALUES
(1, '13', '1', 'N', '2023-08-22'),
(2, '13', '2', 'N', '2023-08-22'),
(3, '13', '3', 'V', '2023-08-22'),
(4, '13', '4', 'V', '2023-08-22'),
(5, '13', '5', 'V', '2023-08-22'),
(6, '19', '1', 'U', '2023-08-23'),
(7, '19', '2', 'U', '2023-08-23'),
(8, '19', '3', 'U', '2023-08-23'),
(9, '19', '4', 'U', '2023-08-23'),
(10, '19', '5', 'U', '2023-08-23'),
(11, '19', '6', 'F', '2023-08-23'),
(12, '19', '7', 'F', '2023-08-23'),
(13, '19', '8', 'F', '2023-08-23'),
(14, '19', '9', 'F', '2023-08-23'),
(15, '19', '10', 'F', '2023-08-23'),
(16, '14', '6', 'V', '2023-08-25'),
(17, '14', '7', 'V', '2023-08-25'),
(18, '14', '8', 'V', '2023-08-25'),
(19, '14', '9', 'V', '2023-08-25'),
(20, '14', '10', 'V', '2023-08-25');

--
-- Dumping data for table `sub_item`
--

INSERT INTO `sub_item` (`id`, `subitem`, `U`, `F`, `G`, `V`, `E`, `N`, `CTScondition`, `CTSstandards`) VALUES
(1, 'subitem1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'subitem2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'subitem3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'subitem4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'subitem5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `table_golas`
--

INSERT INTO `table_golas` (`id`, `goalTable`, `goalName`, `goalClassId`) VALUES
(5, 'actual', 'goal1', '2'),
(6, 'actual', 'goal2', '2'),
(7, 'actual', 'goal3', '2'),
(8, 'actual', 'goal4', '2'),
(9, 'sim', 'goals sim1', '1'),
(10, 'sim', 'goals sim2', '1'),
(11, 'academic', 'goal4', '1'),
(12, 'academic', 'goals1', '1'),
(13, 'academic', 'goals2', '1'),
(14, 'test', 'goals1', '1'),
(15, 'test', 'goals2', '1'),
(16, 'test', 'goals3', '1');

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`, `shorttest`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'test', 'ts1', '', '100', '1', '1', '2023-08-22', NULL),
(2, 'test1', 'ts2', '', '100', '1', '1', '2023-08-22', NULL),
(3, 'test2', 't32', '', '100', '1', '1', '2023-08-22', 12),
(4, '	test3', 'ts3', '', '100', '1', '1', '2023-08-22', NULL),
(5, 'dfvrfg', 'rtgrt', '', '100', '1', '1', '2023-09-04', NULL);

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`id`, `test_id`, `student_id`, `course_id`, `marks`, `created`, `status`, `userId`) VALUES
(1, 1, 13, '1', '10', '2023-09-04 13:04:13.000000', '1', '11');

--
-- Dumping data for table `test_phase`
--

INSERT INTO `test_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1'),
(2, '2', '1'),
(3, '3', '1'),
(4, '4', '1'),
(5, '5', '1');

--
-- Dumping data for table `userdepartment`
--

INSERT INTO `userdepartment` (`id`, `userId`, `departmentId`) VALUES
(1, '12', '1'),
(2, '13', '1'),
(3, '14', '1'),
(4, '15', '1'),
(5, '16', '1'),
(6, '17', '1'),
(7, '18', '1'),
(8, '19', '1'),
(9, '20', '1'),
(10, '21', '1'),
(11, '22', '1'),
(12, '23', '1'),
(13, '24', '1'),
(14, '27', '1'),
(15, '28', '1'),
(16, '29', '1');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `file_name`, `uploaded_on`, `name`, `nickname`, `initial`, `studid`, `role`, `phone`, `gender`, `username`, `ins_id`, `email`, `password`, `create_datetime`, `seen_status`, `departmentId`) VALUES
(11, '404-Error.gif', '2023-08-22 08:49:50', 'A4', 'A4', 'HA', 'admin', 'super admin', '2147483647', 'gender', 'A4', '11', 'ayushi2@gmail.com1', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', 0, NULL),
(12, 'pngtree-a-small-pink-white-flower-png-image_2664964.png', NULL, 'archana guthale', 'inst', NULL, 'inst1', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, '3'),
(13, '404-Error.gif', NULL, 'student1', 'inst', NULL, 'inst2', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(14, '404-Error.gif', '2023-03-08 13:59:15', 'student2', 'archi', 'AR', 'std1', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(15, 'pngtree-a-small-pink-white-flower-png-image_2664964.png', NULL, 'archananair', 'inst1', NULL, 'inst4', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, '3'),
(16, '404-Error.gif', '2023-03-08 13:58:47', 'archana guthale', 'inst', NULL, 'studen4', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(17, NULL, NULL, 'jhvbsrf', 'stu', 'in', 'studen48', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(18, NULL, NULL, 'archana guthale', 'archi', 'ar', 'archana', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', 'cf65e9e5920cda080f7903a968ad9744', NULL, NULL, NULL),
(19, NULL, NULL, 'archana guthale', 'archi', '', 'studen9', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL),
(20, NULL, NULL, 'archana', 'archi', 'st', 'std20', 'student', '0702136474', 'female', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(21, NULL, NULL, 'student', 'stu', 'AR', 'std10', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(22, NULL, NULL, 'student', 'inst', 'ar', 'std11', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(23, NULL, NULL, 'testing user', 'testing user', 'AR', 'std103', 'student', '7021364749', 'female', NULL, '11', 'archana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL),
(24, NULL, NULL, 'archana guthale', 'testing user', 'AR', 'STD09', 'student', '+919474512', 'female', NULL, '11', 'archana@gmail.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(27, NULL, NULL, 'archana guthale', 'testing user', 'CM', 'std101', 'student', '+919474512', 'male', NULL, '11', 'archana@gmail.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(28, 'VarunPicture.jpeg', '2023-07-28 16:59:05', 'Varun Mishra', 'varun', '', 'varun', 'instructor', '0630660463', 'male', NULL, '11', 'varun123@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(29, NULL, NULL, 'varun', 'varun', 'NA', 'betu', 'student', '6306604635', 'male', NULL, '11', 'varun1234@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `VehicleName`, `VehicleType`, `VehicleNumber`, `VehicleSpot`) VALUES
(1, NULL, '0', 'mh01', 'parking'),
(2, NULL, '0', 'mho2', 'parking');

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`vehid`, `vehicletype`) VALUES
(0, 'bus');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
