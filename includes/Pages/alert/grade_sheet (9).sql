-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 06:38 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `academic` varchar(255) DEFAULT NULL,
  `shortacademic` varchar(255) DEFAULT NULL,
  `ptype` varchar(30) DEFAULT NULL,
  `percentage` int(20) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `shortacademic`, `ptype`, `percentage`, `phase`, `ctp`, `file`, `type`, `size`, `date`, `days`) VALUES
(2, 'vbn', 'A02', NULL, NULL, '1', '1', 'https://careerfoundry.com/en/blog/ui-design/introduction-to-color-theory-and-color-palettes/', 'link', NULL, '2023-07-21', '2'),
(4, 'Parking in rush ', 'dcdc', NULL, NULL, '1', '1', 'Dubai', 'location', NULL, '2023-08-01', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomplish_task`
--

INSERT INTO `accomplish_task` (`ac_id`, `Item_ac`, `Stud_ac`, `gradsheet_id`, `Type`, `clone_id`, `assign_class`, `assign_class_table`, `assign_class_table_cloneid`) VALUES
(1, '1', '13', '14', 'item', '', NULL, NULL, NULL),
(2, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(3, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(4, '1', '13', '14', 'item', '', NULL, NULL, NULL),
(5, '3', '13', '14', 'item', '', NULL, NULL, NULL),
(6, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(7, '3', '13', '14', 'item', '', NULL, NULL, NULL),
(8, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(9, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(10, '3', '13', '14', 'item', '', NULL, NULL, NULL),
(11, '2', '13', '14', 'item', '', NULL, NULL, NULL),
(12, '3', '13', '14', 'item', '', NULL, NULL, NULL),
(13, '2', '13', '14', 'item', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acedemic_phase`
--

CREATE TABLE `acedemic_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acedemic_phase`
--

INSERT INTO `acedemic_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `acedemic_stu`
--

CREATE TABLE `acedemic_stu` (
  `id` int(30) NOT NULL,
  `std_id` int(30) DEFAULT NULL,
  `acedemic_id` int(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `actual`
--

CREATE TABLE `actual` (
  `id` int(11) NOT NULL,
  `actual` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `percentage` int(20) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual`
--

INSERT INTO `actual` (`id`, `actual`, `symbol`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'Front Drive Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world', 'ADR-1', 'percentage', 100, '1', '1', '2023-07-17', NULL),
(2, 'back adding "AYushi" .../ ) @ * ~ `', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-17', NULL),
(3, 'back adding', 'ADR-3', 'percentage', 100, '1', '1', '2023-07-17', NULL),
(4, 'Front Drive', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-18', '5'),
(5, 'Front Drive', 'ADR-9', 'percentage', 100, '3', '1', '2023-08-02', NULL),
(6, 'back park', 'ADR-92', 'percentage', 100, '3', '1', '2023-08-02', NULL),
(7, 'msarii', 'ADR-11', 'percentage', 100, '3', '1', '2023-08-02', NULL),
(8, 'back adding', 'ADR-8', 'percentage', 100, '1', '1', '2023-08-07', NULL),
(9, 'back adding', 'ADR-7', 'percentage', 100, '1', '1', '2023-08-07', NULL),
(10, 'back adding', 'wqopjow', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(11, 'Front Drive', '2uiy2iywio', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(12, 'back adding', '202uu2o', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(13, 'back park', 'ADR-366', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(14, 'back park', 'ADR-234', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(15, 'Front Drive', 'ADR-100', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(16, 'front adding', 'APR-10', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(17, 'Front Drive', 'APR-9', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(18, 'msarii', 'APR-8', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(19, 'Front Drive', 'APR-7', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(20, 'back adding', 'APR-6', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(21, 'back park', 'APR-4', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(22, 'Front Drive', 'APR-3', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(23, 'drive', 'APR-2', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(24, 'msarii', 'park 1', 'percentage', 100, '1', '1', '2023-08-09', NULL),
(25, 'Front Drive', 'park', 'percentage', 100, '1', '1', '2023-08-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `actual_gradesheet`
--

CREATE TABLE `actual_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `instructor` varchar(30) DEFAULT NULL,
  `vehicle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `actual_phase`
--

CREATE TABLE `actual_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual_phase`
--

INSERT INTO `actual_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '2'),
(2, '2', '2'),
(3, '3', '3'),
(4, '1', '1'),
(5, '2', '2'),
(6, '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `additional_task`
--

CREATE TABLE `additional_task` (
  `ad_id` int(11) NOT NULL,
  `Item` varchar(255) DEFAULT NULL,
  `Stud_id` int(30) DEFAULT NULL,
  `gradesheet_id` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `assign_class` varchar(30) DEFAULT NULL,
  `assign_class_table` varchar(30) DEFAULT NULL,
  `assign_class_table_cloneid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_task`
--

INSERT INTO `additional_task` (`ad_id`, `Item`, `Stud_id`, `gradesheet_id`, `type`, `clone_id`, `assign_class`, `assign_class_table`, `assign_class_table_cloneid`) VALUES
(1, '2', 13, '14', 'item', '', NULL, NULL, NULL),
(2, '6', 29, '5', 'item', NULL, NULL, NULL, NULL),
(3, '1', 29, '5', 'item', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminpagechangelog`
--

CREATE TABLE `adminpagechangelog` (
  `id` int(255) NOT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alertreply`
--

CREATE TABLE `alertreply` (
  `id` int(11) NOT NULL,
  `alert_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `is_read` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `alert_icon` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerttable`
--

INSERT INTO `alerttable` (`id`, `user_id`, `alert_type`, `message`, `date`, `permission`, `reciever_user_id`, `alertCategory`, `color`, `alert_file`, `alert_icon`) VALUES
(1, '11', 'General Announcement', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."\r\n"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."', '2023-08-21', 'NULL', '["12"]', 'General Announcement/Note To All', '#333CFF', 'MicrosoftTeams-image (55).png', 'announcement_w.png'),
(2, '11', 'caution', 'Hello world', '2023-08-21', 'student', 'null', 'Caution', '#FFC433', '1', 'caution_w.png'),
(3, '12', 'jklsjeflekrwel;kr;lewr', 'check le;lk;kr', '2023-08-22', 'NULL', '["12"]', 'Urgent Notice', '#FF1202', '1', 'urgent_w.png');

-- --------------------------------------------------------

--
-- Table structure for table `assing_warning_doc`
--

CREATE TABLE `assing_warning_doc` (
  `id` int(30) NOT NULL,
  `files` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `noti_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assing_warning_doc`
--

INSERT INTO `assing_warning_doc` (`id`, `files`, `type`, `noti_id`) VALUES
(1, 'orgChart.doc', '', '59'),
(2, 'orgChart (1).doc', '', '68'),
(3, 'MicrosoftTeams-image (52).png', '', '69');

-- --------------------------------------------------------

--
-- Table structure for table `briefcase`
--

CREATE TABLE `briefcase` (
  `id` int(11) NOT NULL,
  `briefcase` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classfilter`
--

CREATE TABLE `classfilter` (
  `id` int(11) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classfilter`
--

INSERT INTO `classfilter` (`id`, `className`, `pageName`) VALUES
(4, 'sim', 'qual');

-- --------------------------------------------------------

--
-- Table structure for table `class_documnet`
--

CREATE TABLE `class_documnet` (
  `id` int(11) NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_documnet`
--

INSERT INTO `class_documnet` (`id`, `classId`, `className`, `fileName`, `fileType`, `userId`) VALUES
(1, '1', 'test', 'Data Analyst Questions (5).docx', 'docx', '11');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_data`
--

CREATE TABLE `clearance_data` (
  `id` int(11) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `stud_id` varchar(30) DEFAULT NULL,
  `ctp_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance_data`
--

INSERT INTO `clearance_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`) VALUES
(1, '1', NULL, '', '1'),
(2, '2', NULL, '', '1'),
(3, '3', NULL, '', '1'),
(4, '4', NULL, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_student_id`
--

CREATE TABLE `clearance_student_id` (
  `id` int(30) NOT NULL,
  `clearance_id` varchar(30) NOT NULL,
  `stud_id` varchar(30) NOT NULL,
  `class_id` varchar(30) NOT NULL,
  `class_table` varchar(30) NOT NULL,
  `clone_cid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloned_gradesheet`
--

INSERT INTO `cloned_gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `status`, `cloned_id`, `created_at`, `gradsheet_status`) VALUES
(1, '29', '1', '1', '4', 'actual', '12', '1', '15:10', '2023-08-09', '11', '22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '13', '1', '1', '4', 'actual', '12', '1', '15:24', '2023-08-09', '11', '22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(3, '29', '1', '1', '1', 'actual', '12', '1', '14:08', '2023-08-09', '11', '22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, '29', '1', '1', '8', 'actual', '12', '1', '15:28', '2023-08-07', '11', '22', 'G', '80', ' Hello Msarii', '\r\n              \r\n                          2. item-3  : <br>2b. subitem-6  : <br>            ', '0', 1, NULL, '1'),
(5, '29', '1', '1', '4', 'actual', '12', '1', '17:15', '2023-08-01', '11', '11', 'V', '90', ' hello', '\r\n              \r\n                                      ', '1', 2, NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `clone_class`
--

CREATE TABLE `clone_class` (
  `id` int(30) NOT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `std_id` varchar(30) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `cloned_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clone_class`
--

INSERT INTO `clone_class` (`id`, `class_id`, `std_id`, `class_name`, `cloned_id`) VALUES
(1, '1', '14', 'actual', 1),
(2, '4', '18', 'actual', 1),
(3, '4', '29', 'actual', 1),
(4, '4', '13', 'actual', 1),
(5, '1', '29', 'actual', 1),
(7, '5', '29', 'actual', 1),
(8, '6', '29', 'actual', 1),
(9, '7', '29', 'actual', 1),
(10, '5', '29', 'actual', 2),
(11, '7', '29', 'actual', 2),
(12, '5', '29', 'actual', 3),
(13, '6', '29', 'actual', 2),
(14, '5', '29', 'actual', 4),
(15, '6', '29', 'actual', 3),
(16, '1', '27', 'actual', 1),
(17, '6', '27', 'actual', 1),
(18, '7', '27', 'actual', 1),
(19, '4', '29', 'sim', 1),
(20, '5', '29', 'sim', 1),
(21, '6', '29', 'sim', 1),
(22, '7', '29', 'sim', 1),
(23, '8', '29', 'sim', 1),
(24, '9', '29', 'sim', 1),
(25, '10', '29', 'sim', 1),
(26, '11', '29', 'sim', 1),
(27, '12', '29', 'sim', 1),
(28, '13', '29', 'sim', 1),
(29, '14', '29', 'sim', 1),
(30, '15', '29', 'sim', 1),
(31, '16', '29', 'sim', 1),
(32, '17', '29', 'sim', 1),
(33, '18', '29', 'sim', 1),
(34, '19', '29', 'sim', 1),
(35, '20', '29', 'sim', 1),
(36, '21', '29', 'sim', 1),
(37, '22', '29', 'sim', 1),
(38, '23', '29', 'sim', 1),
(39, '24', '29', 'sim', 1),
(40, '25', '29', 'sim', 1),
(41, '26', '29', 'sim', 1),
(42, '27', '29', 'sim', 1),
(43, '28', '29', 'sim', 1),
(44, '4', '29', 'actual', 2),
(45, '8', '29', 'actual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctppage`
--

CREATE TABLE `ctppage` (
  `CTPid` int(11) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `symbol` varchar(30) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `VehicleType` varchar(30) DEFAULT NULL,
  `manual` varchar(255) DEFAULT NULL,
  `Sponcors` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `CourseAim` varchar(255) DEFAULT NULL,
  `ClassSize` int(255) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `goal` varchar(3000) DEFAULT NULL,
  `total_mark` decimal(11,2) DEFAULT NULL,
  `divisionType` varchar(255) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `vehicleName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctppage`
--

INSERT INTO `ctppage` (`CTPid`, `course`, `symbol`, `Type`, `VehicleType`, `manual`, `Sponcors`, `Location`, `CourseAim`, `ClassSize`, `description`, `duration`, `goal`, `total_mark`, `divisionType`, `color`, `vehicleName`) VALUES
(1, 'Driving School Advanced', 'DA', 'Driving', '1', '66555-1607-new-microsoft-powerpoint-presentation-(3) (6) (9) (5) (1).pptx', 'UAE Driving School', 'Alkarama Branch A', 'To qualify drivers to drive', 4, 'ah', '6', '', '100.00', '1', '#1aff1d', 'Car'),
(2, 'Driving School Beginner', 'DB', 'Parking', '1', 'gradesheet.sql', 'UAE Driving School', 'Abu dhabi', 'To qualify drivers to drive', 4, 'dfghj', '7', 'Hello', NULL, '1', NULL, 'Car'),
(3, 'Python Class', 'PY', 'Parking', '2', 'hashoff (1).sql', 'UAE Driving School', 'Abu dhabi', 'To qualify drivers to drive', 4, 'hekk', '8', 'kdks', NULL, '1', NULL, NULL),
(4, 'Science Class', 'SC', 'hdkhs', '1', 'gradesheet (1).sql', 'dsjkhdk', 'Abu dhabi', 'To qualify drivers to drive', 4, 'fghj', '5', 'kdks', NULL, '1', NULL, NULL),
(5, 'Math Class', 'MA', 'Parking', '1', 'folders.sql', 'driving school', 'Abu dhabi', 'To qualify drivers to drive', 4, 'hello', '6', 'Hello', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `desccate`
--

CREATE TABLE `desccate` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--

CREATE TABLE `discipline` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `inst_id` varchar(30) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `dismarks` varchar(255) DEFAULT NULL,
  `student_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileExt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discipline_data`
--

CREATE TABLE `discipline_data` (
  `id` int(11) NOT NULL,
  `student_id` int(30) DEFAULT NULL,
  `dismarks` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `divisionName` varchar(255) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `divisionName`, `color`) VALUES
(1, 'devision 1', '#c01616'),
(2, 'devision 2', '#9aae0a'),
(3, 'devision 3', '#9aae0a'),
(4, 'devision 4', '#9aae0a'),
(5, 'devision 5', NULL),
(6, 'devision 6', NULL),
(7, 'devision 7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division_department`
--

CREATE TABLE `division_department` (
  `id` int(11) NOT NULL,
  `departmentId` varchar(255) DEFAULT NULL,
  `divisionId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division_department`
--

INSERT INTO `division_department` (`id`, `departmentId`, `divisionId`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `editor_data`
--

CREATE TABLE `editor_data` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) DEFAULT NULL,
  `editorData` mediumtext,
  `folderId` int(11) DEFAULT NULL,
  `shopid` varchar(30) NOT NULL DEFAULT '0',
  `briefId` int(11) DEFAULT NULL,
  `createdAt` varchar(255) DEFAULT NULL,
  `updatedAt` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `favouriteColor` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `admin_delete` varchar(30) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `userRole` varchar(255) DEFAULT NULL,
  `briefType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor_data`
--

INSERT INTO `editor_data` (`id`, `pageName`, `editorData`, `folderId`, `shopid`, `briefId`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `favouriteColor`, `userId`, `admin_delete`, `changeLog`, `color`, `userRole`, `briefType`) VALUES
(1, 'test page', '<p>hello word</p>\r\n', 9, '6', 0, '2023-07-24', '2023-07-24', 'A4', 'A4', NULL, '11', NULL, 'Initial publish', 'red', 'super admin', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_data`
--

CREATE TABLE `emergency_data` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `subitem` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `ctp_id` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_data`
--

INSERT INTO `emergency_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`, `type`) VALUES
(1, 2, NULL, 29, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_item_subitem`
--

CREATE TABLE `extra_item_subitem` (
  `id` int(255) NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `data_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_item_subitem`
--

INSERT INTO `extra_item_subitem` (`id`, `item_id`, `user_id`, `class_id`, `class`, `data_type`) VALUES
(1, '1', '29', '16', 'actual', 'item'),
(2, '2', '29', '16', 'actual', 'item'),
(3, '3', '29', '16', 'actual', 'item'),
(4, '4', '29', '16', 'actual', 'item'),
(5, '5', '29', '16', 'actual', 'item'),
(6, '6', '29', '16', 'actual', 'item'),
(7, '7', '29', '16', 'actual', 'item'),
(8, '8', '29', '16', 'actual', 'item'),
(9, '9', '29', '16', 'actual', 'item'),
(10, '10', '29', '16', 'actual', 'item'),
(11, '11', '29', '16', 'actual', 'item'),
(12, '12', '29', '16', 'actual', 'item'),
(13, '13', '29', '16', 'actual', 'item'),
(14, '14', '29', '16', 'actual', 'item'),
(15, '15', '29', '16', 'actual', 'item'),
(16, '16', '29', '16', 'actual', 'item'),
(17, '17', '29', '16', 'actual', 'item'),
(18, '18', '29', '16', 'actual', 'item'),
(19, '19', '29', '16', 'actual', 'item'),
(20, '20', '29', '16', 'actual', 'item'),
(21, '21', '29', '16', 'actual', 'item'),
(22, '22', '29', '16', 'actual', 'item'),
(23, '23', '29', '16', 'actual', 'item'),
(24, '24', '29', '16', 'actual', 'item'),
(25, '25', '29', '16', 'actual', 'item'),
(26, '26', '29', '16', 'actual', 'item'),
(27, '27', '29', '16', 'actual', 'item'),
(28, '1', '29', '16', 'actual', 'subitem'),
(29, '2', '29', '16', 'actual', 'subitem'),
(30, '3', '29', '16', 'actual', 'subitem'),
(31, '4', '29', '16', 'actual', 'subitem'),
(32, '5', '29', '16', 'actual', 'subitem'),
(33, '6', '29', '16', 'actual', 'subitem'),
(34, '7', '29', '16', 'actual', 'subitem'),
(35, '8', '29', '16', 'actual', 'subitem');

-- --------------------------------------------------------

--
-- Table structure for table `extra_item_subitem_cl`
--

CREATE TABLE `extra_item_subitem_cl` (
  `id` int(255) NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `data_type` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extra_item_subitem_grades`
--

CREATE TABLE `extra_item_subitem_grades` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extra_item_subitem_grades_cl`
--

CREATE TABLE `extra_item_subitem_grades_cl` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favouritefiles`
--

CREATE TABLE `favouritefiles` (
  `id` int(11) NOT NULL,
  `favouriteColors` varchar(255) DEFAULT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favouritefiles`
--

INSERT INTO `favouritefiles` (`id`, `favouriteColors`, `fileId`, `fileType`, `userId`) VALUES
(1, '#dc3545', '20', 'user', '11'),
(2, '#ffc107', '30', 'user', '11'),
(3, '#007bff', '1', 'user', '11');

-- --------------------------------------------------------

--
-- Table structure for table `favouritepages`
--

CREATE TABLE `favouritepages` (
  `id` int(11) NOT NULL,
  `favouriteColors` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `filepermissions`
--

CREATE TABLE `filepermissions` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filepermissions`
--

INSERT INTO `filepermissions` (`id`, `pageId`, `permissionId`, `userId`, `color`, `permissionType`, `phaseId`) VALUES
(1, '30', '11', 'Everyone', 'blue', 'readOnly', NULL),
(2, '31', '11', 'Everyone', 'blue', 'readOnly', NULL),
(3, '32', '11', 'Everyone', 'blue', 'readOnly', NULL),
(4, '33', '11', 'Everyone', 'blue', 'readOnly', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `filepermissionsfm`
--

CREATE TABLE `filepermissionsfm` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `content` longblob,
  `file_Type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_briefcase`
--

CREATE TABLE `file_briefcase` (
  `id` int(11) NOT NULL,
  `brief_id` varchar(30) NOT NULL,
  `breif_type` varchar(30) DEFAULT NULL,
  `file_id` varchar(30) DEFAULT NULL,
  `file_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_briefcase_folder`
--

CREATE TABLE `file_briefcase_folder` (
  `id` int(11) NOT NULL,
  `folder_id` varchar(30) NOT NULL,
  `file_id` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_menu_name`
--

CREATE TABLE `file_menu_name` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `type_menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_menu_name`
--

INSERT INTO `file_menu_name` (`id`, `menu_name`, `type_menu`) VALUES
(1, 'Menu', 'menu'),
(2, 'Mega Menu', 'megmenu'),
(4, 'Mega Menu1', 'megmenu');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `fileName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `folder`, `fileName`) VALUES
(2, 'folder00', NULL),
(3, 'folder3', NULL),
(4, 'folder', NULL),
(6, 'folder5', NULL),
(7, 'folder0', NULL),
(8, 'folder2', NULL),
(9, 'folder r', NULL),
(10, 'folder 178', NULL),
(11, 'jdlkjdkl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `folder_shop_user`
--

CREATE TABLE `folder_shop_user` (
  `id` int(30) NOT NULL,
  `folder_id` varchar(30) NOT NULL,
  `shelf_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `shop_id` varchar(30) NOT NULL,
  `lib_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder_shop_user`
--

INSERT INTO `folder_shop_user` (`id`, `folder_id`, `shelf_id`, `user_id`, `shop_id`, `lib_id`) VALUES
(1, '2', '1', '11', '2', '1'),
(2, '9', '1', '11', '6', '1');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gradeaheet_clear_reason`
--

CREATE TABLE `gradeaheet_clear_reason` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `gradesheetId` varchar(255) DEFAULT NULL,
  `clearDate` varchar(255) DEFAULT NULL,
  `clearTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradeaheet_clear_reason`
--

INSERT INTO `gradeaheet_clear_reason` (`id`, `userId`, `reason`, `gradesheetId`, `clearDate`, `clearTime`) VALUES
(1, '11', 'hello', '8', '2023-07-31', '13:07:16'),
(2, '12', 'hgdjdgjk', '2', '2023-08-07', '10:32:46'),
(3, '15', 'khasdiadibaidgy', '4', '2023-08-11', '05:25:48'),
(4, '15', 'akshdiuwadigqw8yd', '4', '2023-08-11', '05:39:03'),
(5, '12', 'jHSBuasgbyd iuasbdahydihau iasbnduah', '1', '2023-08-11', '06:46:00'),
(6, '12', 'kuhsduiqwuidbqwuidbuiqwebd kq ybqeyidb', '1', '2023-08-11', '08:37:46'),
(7, '12', 'asxkhbisgxyqqhj qwy  hjqw uh quw ', '4', '2023-08-11', '09:32:43'),
(8, '12', 'kjhiqwuhxuqwuxbqwuibsibqwiiqwnq ', '4', '2023-08-11', '09:34:01'),
(9, '11', 'dmnfbfmhk', '6', '2023-08-17', '10:57:54'),
(10, '12', 'htrh', '9', '2023-08-17', '11:56:15'),
(11, '12', 'ger', '16', '2023-08-17', '11:58:15'),
(12, '12', 'fcfcerfrcf', '16', '2023-08-21', '08:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `gradesheet`
--

CREATE TABLE `gradesheet` (
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
  `duration_hours` varchar(3) DEFAULT NULL,
  `duration_min` varchar(3) DEFAULT NULL,
  `over_all_grade` varchar(30) DEFAULT NULL,
  `over_all_grade_per` varchar(30) DEFAULT NULL,
  `over_all_comment` varchar(3000) DEFAULT NULL,
  `comments` varchar(3000) DEFAULT NULL,
  `gradsheet_status` varchar(255) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradesheet`
--

INSERT INTO `gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `gradsheet_status`, `status`, `created_at`) VALUES
(1, '18', '1', '1', '1', 'actual', '0', '0', '0', '0000-00-00', '0', '0', '0', '0', '0', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(2, '18', '1', '1', '3', 'actual', '0', '0', '0', '0000-00-00', '0', '0', '0', '0', '0', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(3, '18', '1', '1', '4', 'actual', '12', '1', '19:05', '2023-07-05', '00', '00', 'F', '55', ' ', '"""""""\r\n\\\\\\\\\\\r\n,,,,,,\r\n......\r\n(((((\r\n)))))\r\n@@@@@@@\r\n!!!!!!3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : \r\n5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : \r\n', NULL, '1', '2023-07-25 15:05:38.000000'),
(4, '13', '1', '1', '1', 'actual', '0', '0', '0', '0000-00-00', '0', '0', 'G', '80', '0', '\r\n              0            1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br><b>1. item-1 has very long text   : <br>1. item-1 has very long text   : </b><br>', '1', '1', '0000-00-00 00:00:00.000000'),
(5, '13', '1', '1', '2', 'actual', '12', '1', '14:35', '2023-07-12', '00', '00', 'F', '60', ' ', '<p>`</p>\r\n<p>~</p>\r\n<p>!</p>\r\n<p>@</p>\r\n<p>"</p>\r\n<p>''</p>\r\n<p>:</p>\r\n<p>;</p>\r\n<p>&lt;</p>\r\n<p>&gt;</p>\r\n<p>?</p>\r\n<p>/</p>', NULL, '1', '2023-07-27 14:32:21.000000'),
(6, '29', '1', '1', '1', 'actual', '12', '1', '01:01', '1970-01-01', '0', '0', '0', '0', '0', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(8, '13', '1', '1', '4', 'actual', '12', '1', '01:00', '1970-01-01', '02', '02', 'G', '80', 'Hello Everyone. How r u all?', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(9, '29', '1', '1', '4', 'actual', '12', '1', '01:00', '1970-01-01', '10', '10', 'G', '70', 'hello', '\r\n              \r\n              \r\n              \r\n              0                                                7. General knowledge Page  : <br>', '2', '1', '0000-00-00 00:00:00.000000'),
(10, '27', '1', '1', '4', 'actual', '12', '1', '09:50', '2023-08-09', '20', '22', 'F', '75', 'Hello Everyone. How r u all?', NULL, '2', NULL, '2023-08-03 09:48:35.000000'),
(11, '27', '1', '1', '1', 'actual', '12', '1', '10:35', '2023-08-07', '22', '30', 'F', '75', 'Hello Everyone. How r u all?', NULL, NULL, NULL, '2023-08-04 10:34:05.000000'),
(12, '18', '1', '1', '8', 'actual', '12', '1', '17:39', '2023-08-16', '22', '30', 'F', '50', ' Hello Everyone. How r u all?', '2. item-3  : \r\n7. General knowledge Page  : \r\n', NULL, '1', '2023-08-07 15:39:49.000000'),
(13, '18', '1', '1', '9', 'actual', '12', '1', '15:45', '2023-08-08', '18', '20', 'V', '90', ' Hello Everyone. How r u all?', '6. item-7  : \r\n6. item-7  : \r\n', NULL, '1', '2023-08-07 15:42:31.000000'),
(14, '13', '1', '1', '8', 'actual', '12', '1', '16:53', '2023-08-08', '18', '20', 'E', '99', ' Hello Everyone. How r u all?', '5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : \r\n', NULL, '1', '2023-08-07 16:51:47.000000'),
(16, '29', '1', '1', '8', 'actual', '12', '1', '00:41', '1970-01-14', '10', '10', 'F', '60', ' jekekelk', '\r\n              \r\n              \r\n              \r\n              \r\n                                                                          ', '1', '0', '0000-00-00 00:00:00.000000'),
(17, '13', '1', '1', '9', 'actual', '12', '1', '16:48', '2023-08-09', '22', '11', 'G', '80', ' Hello Everyone. How r u all?', '3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : \r\n7. General knowledge Page  : \r\n', '2', '0', '2023-08-08 16:46:22.000000'),
(18, '29', '1', '1', '3', 'actual', '15', '1', '14:59', '2023-08-04', '11', '11', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-09 12:59:12.000000'),
(19, '29', '1', '1', '9', 'actual', '12', '1', '11:05', '2023-08-15', '11', '11', 'G', '80', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages', '\r\n                          3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : <br>', '1', '1', '2023-08-10 10:05:57.000000'),
(20, '27', '1', '1', '8', 'actual', '0', '0', '0', '0000-00-00', '0', '0', 'F', '50', '0', '<font color="#ad1a1a">1b. subitem-3  : </font><br><span style="background-color: rgb(210, 25, 25);">4. msarii  : </span><br>5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : <br>5. The click event is handled for the menu icon, and the .other-options element is toggled with slide Toggle when the menu icon is clicked.  : <br><div><br></div><div>heelo ayuhsi</div>7. General knowledge Page  : <br>', '2', '1', '0000-00-00 00:00:00.000000'),
(21, '27', '1', '1', '9', 'actual', '0', '0', '0', '0000-00-00', '0', '0', '0', '0', '0', '0', '2', '0', '0000-00-00 00:00:00.000000'),
(22, '29', '1', '1', '16', 'actual', '12', '1', '14:41', '2023-08-02', '11', '22', NULL, '', ' ', '\r\n                          ', NULL, '0', '2023-08-16 14:39:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `grade_per`
--

CREATE TABLE `grade_per` (
  `id` int(30) NOT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `grade_permission`
--

CREATE TABLE `grade_permission` (
  `id` int(255) NOT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_permission`
--

INSERT INTO `grade_permission` (`id`, `grade_id`, `grade`, `status`, `cloneid`) VALUES
(1, '22', 'E', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grade_per_notifications`
--

CREATE TABLE `grade_per_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `to_userid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci,
  `data` text COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint(4) DEFAULT NULL,
  `permission` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gradsheet_final_hashoff`
--

CREATE TABLE `gradsheet_final_hashoff` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `hash_off` varchar(255) DEFAULT NULL,
  `hash_off_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradsheet_final_hashoff`
--

INSERT INTO `gradsheet_final_hashoff` (`id`, `user_id`, `class_id`, `class_name`, `hash_off`, `hash_off_value`) VALUES
(1, '18', '8', 'actual', '1', '0'),
(2, '18', '8', 'actual', '2', '0'),
(3, '29', '8', 'actual', '1', '2'),
(4, '29', '8', 'actual', '2', '5'),
(5, '13', '8', 'actual', '1', '1'),
(6, '13', '8', 'actual', '2', '1'),
(7, '27', '8', 'actual', '1', '0'),
(8, '27', '8', 'actual', '2', '0'),
(9, '29', '4', 'actual', '1', '0'),
(10, '29', '4', 'actual', '2', '0'),
(11, '29', '4', 'actual', '3', '0'),
(12, '29', '4', 'actual', '4', '0'),
(13, '29', '4', 'actual', '5', '0'),
(14, '29', '4', 'actual', '6', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gradsheet_final_hashoff_cl`
--

CREATE TABLE `gradsheet_final_hashoff_cl` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `hash_off` varchar(255) DEFAULT NULL,
  `hash_off_value` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradsheet_final_hashoff_cl`
--

INSERT INTO `gradsheet_final_hashoff_cl` (`id`, `user_id`, `class_id`, `class_name`, `hash_off`, `hash_off_value`, `cloneid`) VALUES
(1, '29', '4', 'actual', '1', '0', '2'),
(2, '29', '4', 'actual', '2', '0', '2'),
(3, '29', '4', 'actual', '3', '0', '2'),
(4, '29', '4', 'actual', '4', '0', '2'),
(5, '29', '4', 'actual', '5', '0', '2'),
(6, '29', '4', 'actual', '6', '0', '2'),
(7, '29', '8', 'actual', '1', '0', '1'),
(8, '29', '8', 'actual', '2', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_student_scheduling`
--

CREATE TABLE `group_student_scheduling` (
  `id` int(30) NOT NULL,
  `std_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hashoff`
--

CREATE TABLE `hashoff` (
  `id` int(30) NOT NULL,
  `hashoff` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashoff`
--

INSERT INTO `hashoff` (`id`, `hashoff`, `course_id`, `class_id`, `phase_id`, `class`) VALUES
(1, 'hashoff 1', NULL, NULL, NULL, NULL),
(2, 'hashoff 2', NULL, NULL, NULL, NULL),
(3, 'hashoff 3', NULL, NULL, NULL, NULL),
(4, 'hashoff 4', NULL, NULL, NULL, NULL),
(5, 'hash 5', NULL, NULL, NULL, NULL),
(6, 'hash 6', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hashoff_gradesheet`
--

CREATE TABLE `hashoff_gradesheet` (
  `id` int(11) NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `hashCheck` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hashoff_gradesheet`
--

INSERT INTO `hashoff_gradesheet` (`id`, `classId`, `phaseId`, `ctpId`, `className`, `hashCheck`) VALUES
(1, '4', '1', '1', 'actual', '1'),
(2, '4', '1', '1', 'actual', '2'),
(3, '4', '1', '1', 'actual', '3'),
(4, '4', '1', '1', 'actual', '4'),
(5, '4', '1', '1', 'actual', '5'),
(6, '4', '1', '1', 'actual', '6'),
(7, '8', '1', '1', 'actual', '1'),
(8, '8', '1', '1', 'actual', '2');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `file_name` varchar(30) DEFAULT NULL,
  `uploaded_on` varchar(30) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `file_name`, `uploaded_on`, `user_id`, `school_name`, `department_name`, `type`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, 'kudos.jpg', '2023-07-17', '11', '1', 'Driving school', NULL, 'Hello world', 'Dubai', '8765432190', 'ayushi260395@gmail.com', 'asdfghjkl', 'dfghjkl'),
(2, NULL, NULL, '11', '1', 'department 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, '11', '1', 'department 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, '11', '1', 'department 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, '11', '1', 'department 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(30) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `CTS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `course_id`, `class_id`, `phase_id`, `class`, `CTS`) VALUES
(1, '1', '1', '1', '1', 'actual', '1'),
(2, '2', '1', '1', '1', 'actual', '1'),
(5, '1', '1', '4', '1', 'actual', NULL),
(6, '2', '1', '4', '1', 'actual', NULL),
(7, '3', '1', '4', '1', 'actual', NULL),
(8, '4', '1', '4', '1', 'actual', NULL),
(9, '5', '1', '4', '1', 'actual', NULL),
(10, '6', '1', '4', '1', 'actual', NULL),
(11, '7', '1', '4', '1', 'actual', NULL),
(12, '1', '1', '8', '1', 'actual', NULL),
(13, '2', '1', '8', '1', 'actual', NULL),
(14, '3', '1', '8', '1', 'actual', NULL),
(15, '4', '1', '8', '1', 'actual', NULL),
(16, '5', '1', '8', '1', 'actual', NULL),
(17, '6', '1', '8', '1', 'actual', NULL),
(18, '7', '1', '8', '1', 'actual', NULL),
(19, '1', '1', '9', '1', 'actual', NULL),
(20, '2', '1', '9', '1', 'actual', NULL),
(21, '3', '1', '9', '1', 'actual', NULL),
(22, '4', '1', '9', '1', 'actual', NULL),
(23, '5', '1', '9', '1', 'actual', NULL),
(24, '6', '1', '9', '1', 'actual', NULL),
(25, '7', '1', '9', '1', 'actual', NULL),
(26, '1', '1', '2', '1', 'actual', NULL),
(27, '1', '2', '3', '1', 'sim', NULL),
(28, '2', '2', '3', '1', 'sim', NULL),
(29, '3', '2', '3', '1', 'sim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `itembank`
--

CREATE TABLE `itembank` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `U` varchar(255) DEFAULT NULL,
  `F` varchar(255) DEFAULT NULL,
  `G` varchar(255) DEFAULT NULL,
  `V` varchar(255) DEFAULT NULL,
  `E` varchar(255) DEFAULT NULL,
  `N` varchar(255) DEFAULT NULL,
  `CTScondition` varchar(255) DEFAULT NULL,
  `CTSstandards` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itembank`
--

INSERT INTO `itembank` (`id`, `item`, `U`, `F`, `G`, `V`, `E`, `N`, `CTScondition`, `CTSstandards`) VALUES
(1, 'item-1 has very long text ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'item-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'msarii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'item-7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'General knowledge Page', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'archana11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'msarii11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'ayushi11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'item-711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'item-311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'item-1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'archana78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'item-378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'msarii78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'helo1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'hlo2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'helo3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'helo8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'helo9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'helo7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'helo4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'gelo0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'shjkdkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'dfjklddjfv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_clone_gradesheet`
--

CREATE TABLE `item_clone_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `item_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `cloned_id` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_clone_gradesheet`
--

INSERT INTO `item_clone_gradesheet` (`id`, `user_id`, `item_id`, `grade`, `cloned_id`, `date`) VALUES
(1, '29', '5', '', '2', '2023-08-17'),
(2, '29', '6', '', '2', '2023-08-17'),
(3, '29', '7', '', '2', '2023-08-17'),
(4, '29', '8', '', '2', '2023-08-17'),
(5, '29', '9', '', '2', '2023-08-17'),
(6, '29', '10', '', '2', '2023-08-17'),
(7, '29', '11', '', '2', '2023-08-17'),
(8, '29', '12', 'G', '1', '2023-08-17'),
(9, '29', '13', 'G', '1', '2023-08-17'),
(10, '29', '14', 'G', '1', '2023-08-17'),
(11, '29', '15', 'G', '1', '2023-08-17'),
(12, '29', '16', 'E', '1', '2023-08-17'),
(13, '29', '17', 'F', '1', '2023-08-17'),
(14, '29', '18', 'G', '1', '2023-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `item_gradesheet`
--

CREATE TABLE `item_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `item_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_gradesheet`
--

INSERT INTO `item_gradesheet` (`id`, `user_id`, `item_id`, `grade`, `date`) VALUES
(1, '18', '3', '', '2023-07-25'),
(2, '18', '4', '', '2023-07-25'),
(10, '13', '5', '', '2023-08-04'),
(11, '13', '6', '', '2023-08-04'),
(12, '13', '7', '', '2023-08-04'),
(13, '13', '8', '', '2023-08-04'),
(14, '13', '9', '', '2023-08-04'),
(15, '13', '10', '', '2023-08-04'),
(16, '13', '11', '', '2023-08-04'),
(17, '18', '5', '', '2023-08-07'),
(18, '18', '6', '', '2023-08-07'),
(19, '18', '7', '', '2023-08-07'),
(20, '18', '8', '', '2023-08-07'),
(21, '18', '9', '', '2023-08-07'),
(22, '18', '10', '', '2023-08-07'),
(23, '18', '11', '', '2023-08-07'),
(24, '18', '12', 'E', '2023-08-07'),
(25, '18', '13', 'G', '2023-08-07'),
(26, '18', '14', 'E', '2023-08-07'),
(27, '18', '15', 'U', '2023-08-07'),
(28, '18', '16', 'F', '2023-08-07'),
(29, '18', '17', 'N', '2023-08-07'),
(30, '18', '18', 'G', '2023-08-07'),
(31, '18', '19', 'N', '2023-08-07'),
(32, '18', '20', 'G', '2023-08-07'),
(33, '18', '21', 'E', '2023-08-07'),
(34, '18', '22', 'G', '2023-08-07'),
(35, '18', '23', 'E', '2023-08-07'),
(36, '18', '24', 'F', '2023-08-07'),
(37, '18', '25', 'E', '2023-08-07'),
(45, '13', '12', '', '2023-08-08'),
(46, '13', '13', '', '2023-08-08'),
(47, '13', '14', '', '2023-08-08'),
(48, '13', '15', '', '2023-08-08'),
(49, '13', '16', '', '2023-08-08'),
(50, '13', '17', '', '2023-08-08'),
(51, '13', '18', 'E', '2023-08-08'),
(52, '13', '19', 'V', '2023-08-08'),
(53, '13', '20', 'V', '2023-08-08'),
(54, '13', '21', 'V', '2023-08-08'),
(55, '13', '22', 'N', '2023-08-08'),
(56, '13', '23', 'V', '2023-08-08'),
(57, '13', '24', 'V', '2023-08-08'),
(58, '13', '25', 'V', '2023-08-08'),
(59, '27', '12', 'G', '2023-08-10'),
(60, '27', '13', 'F', '2023-08-10'),
(61, '27', '14', 'F', '2023-08-10'),
(62, '27', '15', 'F', '2023-08-10'),
(63, '27', '16', 'F', '2023-08-10'),
(64, '27', '17', 'F', '2023-08-10'),
(65, '27', '18', 'F', '2023-08-10'),
(72, '13', '1', 'V', '2023-08-11'),
(73, '13', '2', 'V', '2023-08-11'),
(74, '29', '5', 'F', '2023-08-17'),
(75, '29', '6', 'G', '2023-08-17'),
(76, '29', '7', '', '2023-08-17'),
(77, '29', '8', '', '2023-08-17'),
(78, '29', '9', 'G', '2023-08-17'),
(79, '29', '10', '', '2023-08-17'),
(80, '29', '11', 'E', '2023-08-17'),
(88, '29', '12', '', '2023-08-21'),
(89, '29', '13', 'F', '2023-08-21'),
(90, '29', '14', 'V', '2023-08-21'),
(91, '29', '15', '', '2023-08-21'),
(92, '29', '16', '', '2023-08-21'),
(93, '29', '17', '', '2023-08-21'),
(94, '29', '18', '', '2023-08-21'),
(95, '29', '19', '', '2023-08-21'),
(96, '29', '20', '', '2023-08-21'),
(97, '29', '21', '', '2023-08-21'),
(98, '29', '22', '', '2023-08-21'),
(99, '29', '23', '', '2023-08-21'),
(100, '29', '24', 'E', '2023-08-21'),
(101, '29', '25', '', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `library` varchar(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `library`, `user_id`) VALUES
(1, 'Main', 'super_admin'),
(3, 'library 2', '11'),
(4, 'library 3', '11');

-- --------------------------------------------------------

--
-- Table structure for table `main_department`
--

CREATE TABLE `main_department` (
  `id` int(30) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `additional` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_department`
--

INSERT INTO `main_department` (`id`, `file_name`, `uploaded_on`, `user_id`, `department_name`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, '', '', '11', 'Alkarama', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `manage_role_course_phase`
--

CREATE TABLE `manage_role_course_phase` (
  `id` int(30) NOT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `intructor` varchar(30) DEFAULT NULL,
  `b_up_manger` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `phaseDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_role_course_phase`
--

INSERT INTO `manage_role_course_phase` (`id`, `phase_id`, `intructor`, `b_up_manger`, `course_id`, `phaseDate`) VALUES
(1, '1', '15', '15', '12', '2023-07-11'),
(2, '1', '12', '12', '13', '2023-07-04'),
(3, '2', '12', '12', '14', '2023-07-05'),
(4, '2', '12', '12', '15', '2023-06-25'),
(5, '1', '12', '12', '21', '2023-06-25'),
(6, '3', '12', '12', '21', '2023-07-17'),
(7, '1', '15', '15', '22', '2023-07-17'),
(8, '3', '15', '15', '22', '2023-07-10'),
(9, '1', '15', '12', '23', '2023-07-03'),
(10, '3', '12', '12', '23', '2023-06-26'),
(11, '1', '12', '12', '24', '2023-07-10'),
(12, '3', '15', '15', '24', '2023-06-27'),
(13, '2', '12', '12', '25', '2023-06-26'),
(14, '2', '12', '12', '26', '2023-07-18'),
(15, '2', '12', '12', '27', '2023-07-11'),
(16, '2', '15', '12', '28', '2023-07-09'),
(17, '1', '15', '12', '29', '2023-07-10'),
(18, '3', '12', '15', '29', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `mark_distribution`
--

CREATE TABLE `mark_distribution` (
  `id` int(30) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `categories` varchar(30) DEFAULT NULL,
  `categories_data` varchar(30) DEFAULT NULL,
  `marks` int(30) DEFAULT NULL,
  `total_marks` int(30) DEFAULT NULL,
  `ctp` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meesages`
--

CREATE TABLE `meesages` (
  `id` int(30) NOT NULL,
  `from_id` varchar(30) DEFAULT NULL,
  `to_id` varchar(30) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meesages`
--

INSERT INTO `meesages` (`id`, `from_id`, `to_id`, `message`, `date`) VALUES
(1, '11', '11', 'hello', '2023-08-02 15:51:40.000000');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `inst_id` varchar(30) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `student_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `memomarks` varchar(30) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileExt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `date`, `inst_id`, `topic`, `comment`, `student_id`, `course_id`, `memomarks`, `fileName`, `fileExt`) VALUES
(2, '2023-07-18', '11', 'asfdgfhghj', 'hello', '', '', '90', NULL, NULL),
(3, '2023-07-18', '11', 'student', 'student tet', '13', '1', '63', NULL, NULL),
(4, '2023-07-11', '12', 'Parking', '"ayushi" ,,,', '18', '1', '70', NULL, NULL),
(5, '2023-08-09', '11', '1', 'Hello Word', '29', '1', '70', 'orgChart (2).doc', 'doc'),
(6, '2023-08-02', '11', 'other', 'hello', '29', '1', '90', 'Gardening Dep (1).xlsx', 'xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `memocate`
--

CREATE TABLE `memocate` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memocate`
--

INSERT INTO `memocate` (`id`, `category`, `marks`, `date`) VALUES
(1, 'memo 1', NULL, '2023-08-09 16:07:15'),
(2, 'memo 2', NULL, '2023-08-09 16:07:15'),
(3, 'memo 33', NULL, '2023-08-09 16:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `newcourse`
--

CREATE TABLE `newcourse` (
  `Courseid` int(11) NOT NULL,
  `CourseName` varchar(255) DEFAULT NULL,
  `nick_name` varchar(30) DEFAULT NULL,
  `CourseDate` date DEFAULT NULL,
  `CourseCode` int(30) DEFAULT NULL,
  `StudentNames` varchar(255) DEFAULT NULL,
  `CourseManager` varchar(255) DEFAULT NULL,
  `file_name` varchar(30) DEFAULT NULL,
  `Instructor` varchar(30) DEFAULT NULL,
  `value_enter` varchar(30) DEFAULT NULL,
  `departmentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`Courseid`, `CourseName`, `nick_name`, `CourseDate`, `CourseCode`, `StudentNames`, `CourseManager`, `file_name`, `Instructor`, `value_enter`, `departmentId`) VALUES
(1, '1', 'fghj', '2023-07-13', 1, '13', '12', NULL, NULL, '', NULL),
(3, '1', 'Driving Beginner', '2023-07-15', 2, '18', '15', NULL, NULL, '', NULL),
(5, '2', 'Driving Beginner', '2023-07-20', 1, '16', '15', NULL, NULL, '', NULL),
(7, '3', 'Parking School', '2023-07-13', 1, '20', '12', NULL, NULL, '', NULL),
(10, '4', 'Driving Advanced', '2023-07-21', 1, '23', '12', NULL, NULL, '', NULL),
(13, '1', 'Driving Beginner', '2023-07-07', 3, '25', '12', NULL, NULL, '', NULL),
(14, '2', 'Driving Beginner', '2023-07-17', 2, '14', '15', NULL, NULL, '', NULL),
(15, '2', 'Parking School', '2023-07-18', 3, '17', '15', NULL, NULL, '', NULL),
(16, '3', 'Servicing', '2023-07-18', 2, '19', '15', NULL, NULL, '', NULL),
(17, '3', 'Servicing', '2023-07-07', 3, '22', '15', NULL, NULL, '', NULL),
(18, '4', 'Driving Beginner', '2023-07-25', 2, '24', '12', NULL, NULL, '', NULL),
(19, '4', 'Servicing', '2023-07-26', 3, '21', '15', NULL, NULL, '', NULL),
(20, '5', 'ddms', '2023-07-17', 1, '26', '12', NULL, NULL, '', NULL),
(21, '1', 'Driving Beginner', '2023-07-11', 4, '27', '15', NULL, NULL, '', NULL),
(22, '1', 'Parking School', '2023-07-18', 5, '29', '15', NULL, NULL, '', NULL),
(23, '1', 'Parking School', '2023-07-20', 6, '30', '15', NULL, NULL, '', NULL),
(24, '1', 'Parking School', '2023-07-13', 7, '31', '15', NULL, NULL, '', NULL),
(25, '2', 'Driving Beginner', '2023-07-06', 4, '33', '12', NULL, NULL, '', NULL),
(26, '2', 'Servicing', '2023-07-14', 5, '34', '15', NULL, NULL, '', NULL),
(27, '2', 'Parking School', '2023-07-07', 6, '35', '15', NULL, NULL, '', NULL),
(28, '2', 'Parking School', '2023-07-24', 7, '28', '12', NULL, NULL, '', NULL),
(29, '1', 'Driving Beginner', '2023-07-13', 8, '32', '12', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newpagechangelogdata`
--

CREATE TABLE `newpagechangelogdata` (
  `id` int(11) NOT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newpage_fm`
--

CREATE TABLE `newpage_fm` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) DEFAULT NULL,
  `editorData` longtext,
  `folderid` int(30) DEFAULT NULL,
  `briefid` int(30) DEFAULT NULL,
  `breif_type` varchar(300) DEFAULT NULL,
  `createdAt` varchar(255) DEFAULT NULL,
  `updatedAt` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `userRole` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_warnning`
--

CREATE TABLE `new_warnning` (
  `id` int(11) NOT NULL,
  `notificationId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `classId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_warnning`
--

INSERT INTO `new_warnning` (`id`, `notificationId`, `studentId`, `type`, `classId`) VALUES
(1, '59', '29', 'actual', '2'),
(2, '68', '29', 'actual', '4'),
(3, '69', '29', 'actual', '4');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_userid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_admin` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci,
  `data` text COLLATE utf8mb4_unicode_ci,
  `extra_data` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `to_userid`, `if_admin`, `type`, `data`, `extra_data`, `class_id`, `class_name`, `is_read`, `permission`, `date`) VALUES
(0, '13', '0', NULL, 'actual', '1', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-11 08:55:49.000000'),
(1, '13', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-07-27 14:28:44.000000'),
(2, '12', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-27 14:30:01.000000'),
(3, '12', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-27 14:30:36.000000'),
(4, '13', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-07-27 14:31:59.000000'),
(5, '12', '13', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-27 14:33:08.000000'),
(6, '12', '13', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-27 14:34:17.000000'),
(7, '29', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-07-27 17:18:12.000000'),
(8, '12', '29', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-27 17:19:28.000000'),
(9, '13', '12', NULL, 'actual', '4', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-07-28 15:41:59.000000'),
(10, '12', '13', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-31 13:31:51.000000'),
(11, '12', '13', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-07-31 13:32:49.000000'),
(12, '13', '12', NULL, 'actual', '4', 'You requested a gradesheet for a reset', NULL, NULL, 1, 0, '2023-07-31 16:37:16.000000'),
(13, '11', '11', NULL, 'message', '0', 'hello', NULL, NULL, 0, 0, '2023-08-02 15:51:40.000000'),
(14, '29', '12', NULL, 'actual', '4', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-02 16:29:51.000000'),
(15, '27', '12', NULL, 'actual', '4', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-03 09:48:07.000000'),
(16, '', '29', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-03 13:42:57.000000'),
(17, '29', '12', NULL, 'actual', '2', 'cloned_gradsheet', NULL, NULL, 1, 1, '2023-08-03 16:57:10.000000'),
(18, '12', '29', NULL, 'actual', '2', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-03 16:57:48.000000'),
(19, '29', '12', 'super admin', 'actual', '2', 'cloned delete ask', NULL, NULL, 1, 0, '2023-08-03 16:58:26.000000'),
(20, '27', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-04 10:33:47.000000'),
(21, '', '13', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-04 12:17:29.000000'),
(22, '13', '12', 'super admin', 'actual', '4', 'requesting to reset', NULL, NULL, 1, 0, '2023-08-04 14:16:21.000000'),
(23, '13', '12', 'super admin', 'actual', '4', 'requesting to unlock', NULL, NULL, 1, 0, '2023-08-04 14:19:57.000000'),
(24, '13', '12', NULL, 'actual', '1', 'You requested gradsheet is unlock for', NULL, NULL, 1, 0, '2023-08-04 16:45:04.000000'),
(25, '18', '12', NULL, 'actual', '4', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 13:09:12.000000'),
(26, '', '18', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-07 13:57:19.000000'),
(27, '18', '12', 'super admin', 'actual', '3', 'requesting to unlock', NULL, NULL, 1, 0, '2023-08-07 13:58:13.000000'),
(28, '18', '12', NULL, 'actual', '3', 'You requested gradsheet is unlock for', NULL, NULL, 1, 0, '2023-08-07 13:58:33.000000'),
(29, '18', '12', NULL, 'actual', '3', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 14:02:16.000000'),
(30, '18', '12', NULL, 'actual', '3', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-07 14:02:46.000000'),
(31, '18', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 14:59:02.000000'),
(32, '18', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 15:39:24.000000'),
(33, '', '18', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-07 15:40:37.000000'),
(34, '18', '12', NULL, 'actual', '9', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 15:42:02.000000'),
(35, '', '18', NULL, 'actual', '9', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-07 15:43:23.000000'),
(36, '13', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 16:51:22.000000'),
(37, '29', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-08 10:58:45.000000'),
(38, '', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-08 11:33:21.000000'),
(39, '', '13', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-08 11:44:15.000000'),
(40, '29', '12', NULL, 'actual', '4', 'cloned_gradsheet', NULL, NULL, 0, 1, '2023-08-08 15:00:48.000000'),
(41, '13', '12', NULL, 'actual', '4', 'cloned_gradsheet', NULL, NULL, 0, 1, '2023-08-08 15:23:39.000000'),
(42, '13', '12', NULL, 'actual', '9', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-08 16:45:58.000000'),
(43, '29', '15', NULL, 'actual', '3', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-09 12:58:47.000000'),
(44, '29', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-09 13:01:09.000000'),
(45, '', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-09 13:40:34.000000'),
(46, '29', '12', NULL, 'actual', '8', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-08-09 14:42:35.000000'),
(47, '29', '12', NULL, 'actual', '9', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-10 10:05:29.000000'),
(48, '27', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-10 11:26:50.000000'),
(49, '', '27', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-10 11:42:37.000000'),
(50, '27', '12', NULL, 'actual', '8', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-08-10 11:47:41.000000'),
(51, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 08:58:50.000000'),
(52, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 09:12:50.000000'),
(53, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 09:13:28.000000'),
(54, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 09:14:03.000000'),
(55, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 09:14:22.000000'),
(56, '18', '0', NULL, 'actual', '1', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-11 10:16:00.000000'),
(57, '', '18', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 11:19:27.000000'),
(58, '', '13', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-11 13:06:26.000000'),
(59, '29', '29', NULL, NULL, '0', 'reached_cout', NULL, NULL, 0, 0, '2023-08-16 14:26:09.000000'),
(60, '29', '12', NULL, 'actual', '16', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-16 14:38:52.000000'),
(61, '29', '12', 'super admin', 'actual', '16', 'requesting to grade', NULL, NULL, 0, 0, '2023-08-17 09:59:29.000000'),
(62, '29', '12', NULL, 'actual', '16', 'permission grade', NULL, NULL, 0, 0, '2023-08-17 10:01:14.000000'),
(63, '29', '12', NULL, 'actual', '1', 'cloned_gradsheet', NULL, NULL, 0, 1, '2023-08-17 14:06:18.000000'),
(64, '29', '12', NULL, 'actual', '1', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-17 14:27:54.000000'),
(65, '29', '12', NULL, 'actual', '4', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-17 15:26:15.000000'),
(66, '29', '12', NULL, 'actual', '8', 'cloned_gradsheet', NULL, NULL, 1, 1, '2023-08-17 15:27:29.000000'),
(67, '29', '12', NULL, 'actual', '8', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-17 15:28:15.000000'),
(68, '29', '29', NULL, NULL, '1', 'reached_cout', NULL, NULL, 0, 0, '2023-08-17 16:00:41.000000'),
(69, '29', '29', NULL, NULL, '2', 'reached_cout', NULL, NULL, 0, 0, '2023-08-17 16:01:18.000000'),
(70, '29', '12', NULL, 'actual', '4', 'cloned_gradsheet', NULL, NULL, 1, 2, '2023-08-17 17:13:53.000000'),
(71, '', '29', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-17 17:25:23.000000'),
(72, '29', '12', NULL, 'actual', '4', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-08-17 17:26:59.000000'),
(73, '', '29', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-17 17:27:43.000000'),
(74, '', '29', NULL, 'actual', '8', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-17 17:34:54.000000'),
(75, '29', '12', NULL, 'actual', '8', 'clone_unlock_request', NULL, NULL, 0, 1, '2023-08-17 17:36:11.000000'),
(76, '', '29', NULL, 'actual', '8', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-17 17:38:55.000000'),
(77, '', '29', NULL, 'actual', '4', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-17 17:45:24.000000'),
(78, '12', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 11:16:43.000000'),
(79, '12', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 16:14:42.000000'),
(80, '12', '29', NULL, 'actual', '9', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 16:18:04.000000'),
(81, '12', '29', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 17:00:12.000000'),
(82, '12', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 17:11:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `orgchart_data`
--

CREATE TABLE `orgchart_data` (
  `id` int(11) NOT NULL,
  `departmentName` varchar(255) DEFAULT NULL,
  `parentId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgchart_data`
--

INSERT INTO `orgchart_data` (`id`, `departmentName`, `parentId`, `type`) VALUES
(1, '2', '0', 'department'),
(2, '14', '1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pagepermissions`
--

CREATE TABLE `pagepermissions` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagepermissions`
--

INSERT INTO `pagepermissions` (`id`, `pageId`, `permissionId`, `userId`, `color`, `permissionType`) VALUES
(1, '1', '11', 'Everyone', 'blue', 'readOnly');

-- --------------------------------------------------------

--
-- Table structure for table `pagepermissionsfm`
--

CREATE TABLE `pagepermissionsfm` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` int(11) NOT NULL,
  `percentagetype` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `persontitle`
--

CREATE TABLE `persontitle` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persontitle`
--

INSERT INTO `persontitle` (`id`, `user_id`, `title`, `message`, `date`) VALUES
(2, '12', 'Employee of the Week', 'You done a very great job this year.', '2023-07-19'),
(3, '14', 'Student of the year', 'You score really great in this year so we r giving you this award.', '2023-07-19'),
(5, '25', 'Student of the month', 'Great work on this month', '2023-07-19'),
(6, '18', 'employee of the month', 'Great job', '2023-07-19'),
(7, '11', 'Student of the year', 'hjhdksfjsklfjksfj', '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE `phase` (
  `id` int(11) NOT NULL,
  `phasename` varchar(255) DEFAULT NULL,
  `objective` varchar(5000) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  `phaseDuration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`id`, `phasename`, `objective`, `ctp`, `color`, `phaseDuration`) VALUES
(1, 'Driving', NULL, '1', '#e51515', NULL),
(2, 'Driving', NULL, '2', NULL, NULL),
(3, 'Parking', NULL, '1', '#c0c318', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `popup`
--

CREATE TABLE `popup` (
  `id` int(100) NOT NULL,
  `item` text,
  `subitem` text,
  `radio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prereuisites`
--

CREATE TABLE `prereuisites` (
  `id` int(11) NOT NULL,
  `prereuisite` varchar(255) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prereuisite_data`
--

CREATE TABLE `prereuisite_data` (
  `id` int(11) NOT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL,
  `class_table` varchar(255) DEFAULT NULL,
  `prereui_id` varchar(30) DEFAULT NULL,
  `prereui_table` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prereuisite_data`
--

INSERT INTO `prereuisite_data` (`id`, `class_id`, `days`, `class_table`, `prereui_id`, `prereui_table`) VALUES
(1, '2', NULL, 'academic', '1', 'academic'),
(2, '3', NULL, 'academic', '2', 'academic'),
(3, '4', NULL, 'sim', '3', 'academic'),
(4, '4', NULL, 'actual', '3', 'academic'),
(5, '5', NULL, 'sim', '4', 'actual'),
(6, '5', NULL, 'sim', '4', 'sim'),
(7, '6', NULL, 'sim', '5', 'sim'),
(8, '7', NULL, 'sim', '6', 'sim'),
(9, '1', NULL, 'test', '7', 'sim');

-- --------------------------------------------------------

--
-- Table structure for table `qual_data`
--

CREATE TABLE `qual_data` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `stud_id` varchar(30) DEFAULT NULL,
  `ctp_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qual_data`
--

INSERT INTO `qual_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`) VALUES
(1, '1', NULL, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quiz` varchar(30) DEFAULT NULL,
  `phase` varchar(30) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `percentage` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_cloned_data`
--

CREATE TABLE `quiz_cloned_data` (
  `id` int(30) NOT NULL,
  `quiz_id` int(30) DEFAULT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` int(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_marks`
--

CREATE TABLE `quiz_marks` (
  `id` int(11) NOT NULL,
  `quiz_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `student_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `permission` varchar(1000) NOT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`, `color`) VALUES
(1, 'instructor', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', NULL),
(2, 'student', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"0";s:22:"select_student_details";s:1:"1";}', NULL),
(3, 'super admin', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"1";s:8:"Datapage";s:1:"1";s:3:"CTP";s:1:"1";s:9:"Newcourse";s:1:"1";s:13:"sidebar_phase";s:1:"1";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', NULL),
(4, 'IT people', 'a:25:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"1";s:10:"class_page";s:1:"1";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";}', '#b6b11b');

-- --------------------------------------------------------

--
-- Table structure for table `self`
--

CREATE TABLE `self` (
  `id` int(11) NOT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `shelf` varchar(30) NOT NULL,
  `library_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `shelf`, `library_id`) VALUES
(1, 'shelf 1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shelf_shop`
--

CREATE TABLE `shelf_shop` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `shelf_id` varchar(30) NOT NULL,
  `shop_id` varchar(30) NOT NULL,
  `lib_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf_shop`
--

INSERT INTO `shelf_shop` (`id`, `user_id`, `shelf_id`, `shop_id`, `lib_id`) VALUES
(1, '11', '1', '2', '1'),
(2, '11', '1', '6', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shops` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shops`, `image`) VALUES
(2, 'shop1', ''),
(3, 'shop3', 'Class v2.png'),
(4, 'shop8', 'Prerequisites v4.png'),
(5, 'shop10', 'File management v3.png'),
(6, 'Shop test', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_folder`
--

CREATE TABLE `shop_folder` (
  `id` int(30) NOT NULL,
  `shop_id` varchar(400) DEFAULT NULL,
  `folder_id` varchar(255) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_ctp`
--

CREATE TABLE `sidebar_ctp` (
  `id` int(30) NOT NULL,
  `ctp_id` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar_ctp`
--

INSERT INTO `sidebar_ctp` (`id`, `ctp_id`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `sim`
--

CREATE TABLE `sim` (
  `id` int(11) NOT NULL,
  `sim` varchar(255) DEFAULT NULL,
  `shortsim` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `percentage` int(20) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`id`, `sim`, `shortsim`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'Front Sim', 'SDR-2', '', 100, '1', '2', '2023-07-17', NULL),
(2, 'Front drive', 'SDR-1', '', 100, '1', '2', '2023-07-17', NULL),
(3, 'Front Sim', 'SDR-6', '', 100, '1', '2', '2023-07-17', NULL),
(4, 'Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world ', 'SDR-1', '', 100, '1', '1', '2023-07-21', '4'),
(5, 'Parking ', 'SDR-2', '', 100, '1', '1', '2023-07-21', '6'),
(6, 'jhgdjhf', 'SDR-3', '', 100, '1', '1', '2023-07-21', NULL),
(7, 'Front Sim', 'SDR-4', '', 100, '1', '1', '2023-07-21', NULL),
(8, 'Front drive', 'SDR-62', '', 100, '3', '1', '2023-08-02', NULL),
(9, 'ghj', 'SDR-14', '', 100, '3', '1', '2023-08-02', NULL),
(10, 'Front drive', 'SDR-61', '', 100, '3', '1', '2023-08-02', NULL),
(11, 'Front drive', 'SDR-6225', '', 100, '1', '1', '2023-08-09', NULL),
(12, 'ghj', 'SDR-145', '', 100, '1', '1', '2023-08-09', NULL),
(13, 'Front drive', 'SDR-615', '', 100, '1', '1', '2023-08-09', NULL),
(14, 'Front Sim', 'SDR-42', '', 100, '1', '1', '2023-08-09', NULL),
(15, 'Front Sim', 'door', '', 100, '1', '1', '2023-08-09', NULL),
(16, 'Front Sim', 'SDR-60', '', 100, '1', '1', '2023-08-09', NULL),
(17, 'ghj', 'SDR-19', '', 100, '1', '1', '2023-08-09', NULL),
(18, 'Parking ', 'SDR-134', '', 100, '1', '1', '2023-08-09', NULL),
(19, 'Front drive', '   s  s s', '', 100, '1', '1', '2023-08-09', NULL),
(20, 'Front Sim', 'park', '', 100, '1', '1', '2023-08-09', NULL),
(21, 'Front Sim', 'back', '', 100, '1', '1', '2023-08-09', NULL),
(22, 'Front drive', 'SDR-15', '', 100, '1', '1', '2023-08-09', NULL),
(23, 'jhgdjhf', 'SDR-191', '', 100, '1', '1', '2023-08-09', NULL),
(24, 'Parking ', 'SDR-623', '', 100, '1', '1', '2023-08-09', NULL),
(25, 'Front drive', 'back46', '', 100, '1', '1', '2023-08-09', NULL),
(26, 'Parking ', 'SDR-1p2i', '', 100, '1', '1', '2023-08-09', NULL),
(27, 'Front Sim', 'whio', '', 100, '1', '1', '2023-08-09', NULL),
(28, 'Front drive', 'jeiekwl', '', 100, '1', '1', '2023-08-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sim_phase`
--

CREATE TABLE `sim_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim_phase`
--

INSERT INTO `sim_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1'),
(2, '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `ctp` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `explanation` varchar(255) DEFAULT NULL,
  `progression` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `code`, `ctp`, `description`, `explanation`, `progression`) VALUES
(1, 'Code', '1', 'Array', 'Array', 'Array'),
(2, 'Code1', NULL, 'Description1', 'Explanantion1', 'Progression1');

-- --------------------------------------------------------

--
-- Table structure for table `subitem`
--

CREATE TABLE `subitem` (
  `id` int(30) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `CTS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subitem`
--

INSERT INTO `subitem` (`id`, `item`, `subitem`, `course_id`, `class_id`, `phase_id`, `class`, `CTS`) VALUES
(1, '1', '2', '1', '9', '1', 'actual', NULL),
(2, '1', '3', '1', '9', '1', 'actual', NULL),
(3, '1', '2', '1', '8', '1', 'actual', NULL),
(4, '1', '3', '1', '8', '1', 'actual', NULL),
(5, '2', '5', '1', '8', '1', 'actual', NULL),
(6, '2', '6', '1', '8', '1', 'actual', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subitem_cloned_gradesheet`
--

CREATE TABLE `subitem_cloned_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `subitem_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `cloned_id` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subitem_cloned_gradesheet`
--

INSERT INTO `subitem_cloned_gradesheet` (`id`, `user_id`, `subitem_id`, `grade`, `cloned_id`, `date`) VALUES
(1, '29', '3', 'G', '1', '2023-08-17'),
(2, '29', '4', 'V', '1', '2023-08-17'),
(3, '29', '5', 'G', '1', '2023-08-17'),
(4, '29', '6', 'G', '1', '2023-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `subitem_gradesheet`
--

CREATE TABLE `subitem_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `subitem_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subitem_gradesheet`
--

INSERT INTO `subitem_gradesheet` (`id`, `user_id`, `subitem_id`, `grade`, `date`) VALUES
(1, '13', '2', 'V', '2023-07-31'),
(2, '13', '3', 'U', '2023-07-31'),
(3, '13', '4', '', '2023-07-31'),
(4, '13', '5', '', '2023-07-31'),
(5, '18', '1', 'G', '2023-08-07'),
(6, '18', '2', 'E', '2023-08-07'),
(11, '13', '6', 'E', '2023-08-08'),
(12, '13', '1', 'V', '2023-08-08'),
(13, '27', '3', 'F', '2023-08-10'),
(14, '27', '4', 'F', '2023-08-10'),
(15, '27', '5', 'F', '2023-08-10'),
(16, '27', '6', 'F', '2023-08-10'),
(21, '29', '3', '', '2023-08-21'),
(22, '29', '4', '', '2023-08-21'),
(23, '29', '5', '', '2023-08-21'),
(24, '29', '6', '', '2023-08-21'),
(25, '29', '1', '', '2023-08-21'),
(26, '29', '2', 'E', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `sub_item`
--

CREATE TABLE `sub_item` (
  `id` int(30) NOT NULL,
  `subitem` varchar(300) DEFAULT NULL,
  `U` varchar(255) DEFAULT NULL,
  `F` varchar(255) DEFAULT NULL,
  `G` varchar(255) DEFAULT NULL,
  `V` varchar(255) DEFAULT NULL,
  `E` varchar(255) DEFAULT NULL,
  `N` varchar(255) DEFAULT NULL,
  `CTScondition` varchar(255) DEFAULT NULL,
  `CTSstandards` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_item`
--

INSERT INTO `sub_item` (`id`, `subitem`, `U`, `F`, `G`, `V`, `E`, `N`, `CTScondition`, `CTSstandards`) VALUES
(1, 'subitem-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'subitem-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'subitem-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'subitem-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'subitem-5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'subitem-6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'subitem-7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'subitem-8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_golas`
--

CREATE TABLE `table_golas` (
  `id` int(11) NOT NULL,
  `goalTable` varchar(255) DEFAULT NULL,
  `goalName` varchar(255) DEFAULT NULL,
  `goalClassId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempbrief`
--

CREATE TABLE `tempbrief` (
  `id` int(11) NOT NULL,
  `briefId` varchar(255) DEFAULT NULL,
  `folderId` varchar(255) DEFAULT NULL,
  `shopId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test` varchar(255) DEFAULT NULL,
  `shorttest` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`, `shorttest`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`) VALUES
(1, 'test', 'T01', '', '100', '1', '1', '2023-07-17', NULL),
(2, 'Parking', 'T02', '', '100', '1', '1', '2023-07-17', NULL),
(3, 'Parking', 'TOS-16', '', '100', '1', '1', '2023-08-09', NULL),
(4, 'test', 'TOS-1', '', '100', '1', '1', '2023-08-09', NULL),
(5, 'test5', 'TOS-2', '', '100', '1', '1', '2023-08-09', NULL),
(6, 'test5', 'TOS-3', '', '100', '1', '1', '2023-08-09', NULL),
(7, 'Parking', 'TOS-4', '', '100', '1', '1', '2023-08-09', NULL),
(8, 'test', 'TOS-5', '', '100', '1', '1', '2023-08-09', NULL),
(9, 'Parking', 'TOS-6', '', '100', '1', '1', '2023-08-09', NULL),
(10, 'test', 'TOS-7', '', '100', '1', '1', '2023-08-09', NULL),
(11, 'Parking', 'TOS-8', '', '100', '1', '1', '2023-08-09', NULL),
(12, 'test', 'TOS-9', '', '100', '1', '1', '2023-08-09', NULL),
(13, 'Parking', 'TOS-10', '', '100', '1', '1', '2023-08-09', NULL),
(14, 'test5', 'TOS-11', '', '100', '1', '1', '2023-08-09', NULL),
(15, 'Parking', 'TOS-12', '', '100', '1', '1', '2023-08-09', NULL),
(16, 'test', 'TOS-13', '', '100', '1', '1', '2023-08-09', NULL),
(17, 'Parking', 'TOS-14', '', '100', '1', '1', '2023-08-09', NULL),
(18, 'test', 'TOS-15', '', '100', '1', '1', '2023-08-09', NULL),
(19, 'Parking', 'TOS-17', '', '100', '1', '1', '2023-08-09', NULL),
(20, 'test', 'TOS-18', '', '100', '1', '1', '2023-08-09', NULL),
(21, 'Parking', 'TOS-19', '', '100', '1', '1', '2023-08-09', NULL),
(22, 'Parking', 'TOS-20', '', '100', '1', '1', '2023-08-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_cloned_data`
--

CREATE TABLE `test_cloned_data` (
  `id` int(11) NOT NULL,
  `test_id` int(30) NOT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` int(30) DEFAULT NULL,
  `clone_id` varchar(30) NOT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_data`
--

CREATE TABLE `test_data` (
  `id` int(30) NOT NULL,
  `test_id` int(30) DEFAULT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_phase`
--

CREATE TABLE `test_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_phase`
--

INSERT INTO `test_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `type_category_data`
--

CREATE TABLE `type_category_data` (
  `id` int(30) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `category_phase` varchar(30) DEFAULT NULL,
  `category_value` varchar(30) DEFAULT NULL,
  `percent` decimal(11,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_data`
--

CREATE TABLE `type_data` (
  `id` int(30) NOT NULL,
  `type_name` varchar(30) DEFAULT NULL,
  `marks` decimal(11,2) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_data`
--

INSERT INTO `type_data` (`id`, `type_name`, `marks`, `ctp`) VALUES
(1, 'type2', NULL, '3'),
(2, 'type2', '0.00', '1'),
(3, 'quiz', '40.00', '1'),
(4, 'type1', '30.50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userdepartment`
--

CREATE TABLE `userdepartment` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `departmentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdepartment`
--

INSERT INTO `userdepartment` (`id`, `userId`, `departmentId`) VALUES
(1, '12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userdocumnet`
--

CREATE TABLE `userdocumnet` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdocumnet`
--

INSERT INTO `userdocumnet` (`id`, `userId`, `studentId`, `fileName`, `fileType`) VALUES
(1, '13', '1', 'Shahid_Akhtar_Resume (3-yrs Exp.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `file_name` varchar(233) DEFAULT NULL,
  `uploaded_on` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nickname` varchar(70) DEFAULT NULL,
  `initial` varchar(30) DEFAULT NULL,
  `studid` varchar(30) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ins_id` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `seen_status` int(255) DEFAULT NULL,
  `departmentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `file_name`, `uploaded_on`, `name`, `nickname`, `initial`, `studid`, `role`, `phone`, `gender`, `username`, `ins_id`, `email`, `password`, `create_datetime`, `seen_status`, `departmentId`) VALUES
(11, 'agesearch logo final (2).png', '2023-07-21 09:43:39', 'A4', 'A4', 'HA', 'admin', 'super admin', '2147483647', 'gender', 'A4', '11', 'ayushi2@gmail.com1', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', 0, NULL),
(12, 'agesearch v3_1.png', '2023-07-20 13:01:00', 'archana guthale', 'Ayushi', NULL, 'inst1', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, '1'),
(13, 'Flower_jtca001.jpg', '2023-08-07 16:45:50', 'student1', 'inst', NULL, 'inst2', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(14, 'agesearch v3_1.png', '2023-07-19 15:28:57', 'student2', 'archi', 'AR', 'std1', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(15, 'pngtree-a-small-pink-white-flower-png-image_2664964.png', NULL, 'archananair', 'inst1', NULL, 'inst4', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(16, 'OIP (2).jpg', '2023-03-08 13:58:47', 'archana guthale', 'inst', NULL, 'studen4', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(17, NULL, NULL, 'jhvbsrf', 'stu', 'in', 'studen48', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(18, NULL, NULL, 'archana guthale', 'archi', 'ar', 'archana', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', 'cf65e9e5920cda080f7903a968ad9744', NULL, NULL, NULL),
(19, NULL, NULL, 'archana guthale', 'archi', '', 'studen9', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL),
(20, NULL, NULL, 'archana', 'archi', 'st', 'std20', 'student', '0702136474', 'female', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(21, NULL, NULL, 'student', 'stu', 'AR', 'std10', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(22, NULL, NULL, 'student', 'inst', 'ar', 'std11', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(23, NULL, NULL, 'testing user', 'testing user', 'AR', 'std103', 'student', '7021364749', 'female', NULL, '11', 'archana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL),
(24, NULL, NULL, 'archana guthale', 'testing user', 'AR', 'STD09', 'student', '+919474512', 'female', NULL, '11', 'archana@gmail.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(25, 'agesearch logo final (2).png', NULL, 'abcd', 'abcd', 'AB', 'std7', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(26, 'agesearch logo final (2).png', NULL, 'Ayushi Bharti', 'ayu', 'ayu', 'std44', 'IT people', '0883012547', 'female', NULL, '11', 'ayushi260395@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(27, 'MicrosoftTeams-image (40).png', NULL, 'student1', 'std1', 'SD', 'std0', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(28, 'MicrosoftTeams-image (38).png', NULL, 'student2', 'std2', 'SA', 'std9', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(29, 'Flower_jtca001.jpg', '2023-08-08 10:41:40', 'student3', 'std3', 'SG', 'std8', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(30, 'MicrosoftTeams-image (33).png', NULL, 'abcdefgh', 'abcd', 'MA', 'sti9', 'student', '8765432190', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(31, 'MicrosoftTeams-image (30).png', NULL, 'ayushi', 'ayu', 'MAA', 'std66', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(32, 'MicrosoftTeams-image (39).png', NULL, 'Varun Mishra', 'varun', 'VV', 'std88', 'student', '0876543219', 'male', NULL, '11', 'jack@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(33, 'MicrosoftTeams-image (43).png', NULL, 'Archana Nair', 'Archana', 'AA', 'std55', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(34, 'MicrosoftTeams-image (25).png', NULL, 'Anchit ', 'anchit', 'AN', 'std99', 'student', '0876543219', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

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
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_briefcase`
--

INSERT INTO `user_briefcase` (`id`, `briefcase_name`, `user_id`, `folderId`, `shopid`, `date`, `role`, `color`) VALUES
(1, 'brief 1', 11, '2', '2', NULL, 'super admin', 'red'),
(2, 'brief 1', 11, '0', '2', NULL, 'super admin', 'red'),
(3, 'brief 1', 11, '9', '6', NULL, 'super admin', 'red'),
(4, 'Ad', 11, '2', '2', NULL, 'super admin', 'red'),
(5, 'brief 3', 11, '2', '2', NULL, 'super admin', 'red'),
(6, 'Briefcase 1aaa', 11, '0', '0', NULL, 'super admin', 'red'),
(7, 'brief testaaaa', 11, '0', '0', NULL, 'super admin', 'red'),
(8, 'brief 6aaaa', 11, '0', '0', NULL, 'super admin', 'red'),
(9, 'brief test11', 11, '0', '0', NULL, 'super admin', 'red'),
(10, '11111brie', 11, '0', '0', NULL, 'super admin', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE `user_event` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_event`
--

INSERT INTO `user_event` (`id`, `userId`, `title`, `fileName`, `fileType`, `date`) VALUES
(1, '11', 'Graduation Ceremony', 'offer.png', 'png', '2023-07-20'),
(2, '11', 'Graduation Ceremony', 'sced.png', 'png', '2023-07-20'),
(3, '11', 'Graduation Ceremony', 'time.jpg', 'jpg', '2023-07-20'),
(4, '11', 'Graduation Ceremony', 'Asset 3.png', 'png', '2023-07-20'),
(5, '11', 'Graduation Ceremony', 'BF42337D.png', 'png', '2023-07-20'),
(6, '11', 'Graduation Ceremony', 'Flower_11.jpg', 'jpg', '2023-07-20'),
(7, '11', 'MCA Ceremony', 'MicrosoftTeams-image (48).png', 'png', '2023-08-02'),
(8, '11', 'MCA Ceremony', 'GS.png', 'png', '2023-08-02'),
(9, '11', 'MCA Ceremony', 'MicrosoftTeams-image (43).png', 'png', '2023-08-02'),
(10, '11', 'MCA Ceremony', 'MicrosoftTeams-image (41).png', 'png', '2023-08-02'),
(11, '11', 'MCA Ceremony', 'MicrosoftTeams-image (31).png', 'png', '2023-08-02'),
(12, '11', 'Msarii Unite', 'MicrosoftTeams-image (11).png', 'png', '2023-08-02'),
(13, '11', 'Msarii Unite', 'agesearch v3_1.png', 'png', '2023-08-02'),
(14, '11', 'Msarii Unite', 'MicrosoftTeams-image (6).png', 'png', '2023-08-02'),
(15, '11', 'Msarii Unite', 'time.jpg', 'jpg', '2023-08-02'),
(16, '11', 'Msarii Unite', 'kudos.jpg', 'jpg', '2023-08-02'),
(17, '11', 'Gathering Function', 'MicrosoftTeams-image (11).png', 'png', '2023-08-02'),
(18, '11', 'Gathering Function', 'MicrosoftTeams-image (28).png', 'png', '2023-08-02'),
(19, '11', 'Gathering Function', 'MicrosoftTeams-image (27).png', 'png', '2023-08-02'),
(20, '11', 'Gathering Function', 'time.jpg', 'jpg', '2023-08-02'),
(21, '11', 'Gathering Function', 'Asset 3.png', 'png', '2023-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `briefId` varchar(255) DEFAULT NULL,
  `admin_delete` varchar(30) DEFAULT NULL,
  `folderId` varchar(255) DEFAULT NULL,
  `shopid` varchar(30) NOT NULL DEFAULT '0',
  `user_id` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `createdAt` varchar(255) DEFAULT NULL,
  `updatedAt` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `fileBriefcase` varchar(255) DEFAULT NULL,
  `menu_type` varchar(30) DEFAULT NULL,
  `type_id` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `filename`, `lastName`, `type`, `briefId`, `admin_delete`, `folderId`, `shopid`, `user_id`, `role`, `color`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `fileBriefcase`, `menu_type`, `type_id`) VALUES
(1, 'Data Analyst Questions (5).docx', NULL, 'docx', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, NULL, 0),
(2, 'new plan (2).xlsx', NULL, 'xlsx', '1', NULL, '2', '0', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, NULL, 0),
(3, 'New Page.pdf', NULL, 'pdf', '7', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, 'megmenu', 4),
(4, 'Briefcase v2.png', NULL, 'png', '0', NULL, '2', '2', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, NULL, 0),
(5, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '0', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'megmenu', 2),
(6, 'https://www.facebook.com/', 'linkhiuh9i', 'online', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'megmenu', 4),
(7, 'C:\\xampp2\\htdocs', 'fefefjiejeov', 'offline', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', NULL, 0),
(12, 'new plan (2) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', NULL, 0),
(13, 'archana pages (1).pdf', NULL, 'pdf', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', NULL, 0),
(14, 'new plan (9) (1) (2) (5) (3) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', NULL, 0),
(15, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '3', NULL, '2', '2', '15', 'instructor', 'red', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'megmenu', 2),
(16, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '0', NULL, '2', '2', '13', 'student', 'red', '2023-07-06', '2023-07-06', 'inst', 'inst', '', 'megmenu', 2),
(17, 'google.com', 'zae', 'offline', '1', NULL, '2', '2', '13', 'super admin', 'red', '2023-07-07', '2023-07-07', 'A4', 'A4', 'user', NULL, 0),
(18, 'C:\\xampp\\htdocs', 'C:xampph', 'offline', '5', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-07', '2023-07-07', 'A4', 'A4', 'user', NULL, 0),
(20, '1.mp4', NULL, 'mp4', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-11', '2023-07-11', 'A4', 'A4', 'user', NULL, 0),
(21, 'bzdfb.pdf', NULL, 'pdf', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-12', '2023-07-12', 'A4', 'A4', NULL, 'files', 1),
(22, 'folder page varun.pdf', NULL, 'pdf', '7', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-12', '2023-07-12', 'A4', 'A4', NULL, 'files', 2),
(23, 'WhatsApp Video 2022-12-23 at 21.02.06.mp4', NULL, 'mp4', '7', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(25, 'MicrosoftTeams-image (12).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(26, 'MicrosoftTeams-image (11).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(27, 'MicrosoftTeams-image (10).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(28, 'MicrosoftTeams-image (9).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(30, 'ayushi.pdf', NULL, 'pdf', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-24', '2023-07-24', 'A4', 'A4', 'user', NULL, 0),
(31, '01.pdf', NULL, 'pdf', '0', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-24', '2023-07-24', 'A4', 'A4', '', NULL, 0),
(32, 'MicrosoftTeams-image (32).png', NULL, 'png', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-26', '2023-07-26', 'A4', 'A4', 'user', NULL, 0),
(33, 'MicrosoftTeams-image (35).png', NULL, 'png', '2', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-26', '2023-07-26', 'A4', 'A4', 'user', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `VehicleName` varchar(255) DEFAULT NULL,
  `VehicleType` varchar(255) DEFAULT NULL,
  `VehicleNumber` varchar(255) DEFAULT NULL,
  `VehicleSpot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `VehicleName`, `VehicleType`, `VehicleNumber`, `VehicleSpot`) VALUES
(1, NULL, '1', 'hsdjsd', 'dsmd');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `vehid` int(11) NOT NULL,
  `vehicletype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`vehid`, `vehicletype`) VALUES
(1, 'Car'),
(2, 'SUV ');

-- --------------------------------------------------------

--
-- Table structure for table `warning_category_data`
--

CREATE TABLE `warning_category_data` (
  `id` int(30) NOT NULL,
  `warning` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `category_phase` varchar(30) DEFAULT NULL,
  `category_value` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `count` int(30) DEFAULT NULL,
  `threshold` int(30) DEFAULT NULL,
  `group_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warning_data`
--

CREATE TABLE `warning_data` (
  `id` int(11) NOT NULL,
  `warning_name` varchar(30) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `file_name` varchar(299) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `uploaded_on` varchar(30) DEFAULT NULL,
  `bgColor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warning_data`
--

INSERT INTO `warning_data` (`id`, `warning_name`, `ctp`, `file_name`, `type`, `size`, `uploaded_on`, `bgColor`) VALUES
(1, 'Yellow Warninig', '1', NULL, NULL, NULL, NULL, '#401cf2'),
(2, 'Red Warning', '1', NULL, NULL, NULL, NULL, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `warning_permission`
--

CREATE TABLE `warning_permission` (
  `id` int(30) NOT NULL,
  `std_id` varchar(30) DEFAULT NULL,
  `warning_id` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accomplish_task`
--
ALTER TABLE `accomplish_task`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `acedemic_phase`
--
ALTER TABLE `acedemic_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acedemic_stu`
--
ALTER TABLE `acedemic_stu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actual`
--
ALTER TABLE `actual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actual_gradesheet`
--
ALTER TABLE `actual_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actual_phase`
--
ALTER TABLE `actual_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_task`
--
ALTER TABLE `additional_task`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `adminpagechangelog`
--
ALTER TABLE `adminpagechangelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alertreply`
--
ALTER TABLE `alertreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerttable`
--
ALTER TABLE `alerttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assing_warning_doc`
--
ALTER TABLE `assing_warning_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `briefcase`
--
ALTER TABLE `briefcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classfilter`
--
ALTER TABLE `classfilter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_documnet`
--
ALTER TABLE `class_documnet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_data`
--
ALTER TABLE `clearance_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_student_id`
--
ALTER TABLE `clearance_student_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clone_class`
--
ALTER TABLE `clone_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctppage`
--
ALTER TABLE `ctppage`
  ADD PRIMARY KEY (`CTPid`);

--
-- Indexes for table `desccate`
--
ALTER TABLE `desccate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discipline_data`
--
ALTER TABLE `discipline_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_department`
--
ALTER TABLE `division_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor_data`
--
ALTER TABLE `editor_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_data`
--
ALTER TABLE `emergency_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_item_subitem`
--
ALTER TABLE `extra_item_subitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_item_subitem_cl`
--
ALTER TABLE `extra_item_subitem_cl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_item_subitem_grades`
--
ALTER TABLE `extra_item_subitem_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_item_subitem_grades_cl`
--
ALTER TABLE `extra_item_subitem_grades_cl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favouritefiles`
--
ALTER TABLE `favouritefiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favouritepages`
--
ALTER TABLE `favouritepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filepermissions`
--
ALTER TABLE `filepermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filepermissionsfm`
--
ALTER TABLE `filepermissionsfm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_briefcase`
--
ALTER TABLE `file_briefcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_briefcase_folder`
--
ALTER TABLE `file_briefcase_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_menu_name`
--
ALTER TABLE `file_menu_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_shop_user`
--
ALTER TABLE `folder_shop_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradeaheet_clear_reason`
--
ALTER TABLE `gradeaheet_clear_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradesheet`
--
ALTER TABLE `gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_per`
--
ALTER TABLE `grade_per`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_permission`
--
ALTER TABLE `grade_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_per_notifications`
--
ALTER TABLE `grade_per_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradsheet_final_hashoff`
--
ALTER TABLE `gradsheet_final_hashoff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradsheet_final_hashoff_cl`
--
ALTER TABLE `gradsheet_final_hashoff_cl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_student_scheduling`
--
ALTER TABLE `group_student_scheduling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hashoff`
--
ALTER TABLE `hashoff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hashoff_gradesheet`
--
ALTER TABLE `hashoff_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itembank`
--
ALTER TABLE `itembank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_clone_gradesheet`
--
ALTER TABLE `item_clone_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_gradesheet`
--
ALTER TABLE `item_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_department`
--
ALTER TABLE `main_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_role_course_phase`
--
ALTER TABLE `manage_role_course_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_distribution`
--
ALTER TABLE `mark_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meesages`
--
ALTER TABLE `meesages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memocate`
--
ALTER TABLE `memocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcourse`
--
ALTER TABLE `newcourse`
  ADD PRIMARY KEY (`Courseid`);

--
-- Indexes for table `newpagechangelogdata`
--
ALTER TABLE `newpagechangelogdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newpage_fm`
--
ALTER TABLE `newpage_fm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_warnning`
--
ALTER TABLE `new_warnning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgchart_data`
--
ALTER TABLE `orgchart_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagepermissions`
--
ALTER TABLE `pagepermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagepermissionsfm`
--
ALTER TABLE `pagepermissionsfm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persontitle`
--
ALTER TABLE `persontitle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prereuisites`
--
ALTER TABLE `prereuisites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prereuisite_data`
--
ALTER TABLE `prereuisite_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qual_data`
--
ALTER TABLE `qual_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_cloned_data`
--
ALTER TABLE `quiz_cloned_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self`
--
ALTER TABLE `self`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf_shop`
--
ALTER TABLE `shelf_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_folder`
--
ALTER TABLE `shop_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar_ctp`
--
ALTER TABLE `sidebar_ctp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim`
--
ALTER TABLE `sim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim_phase`
--
ALTER TABLE `sim_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subitem`
--
ALTER TABLE `subitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subitem_cloned_gradesheet`
--
ALTER TABLE `subitem_cloned_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subitem_gradesheet`
--
ALTER TABLE `subitem_gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_item`
--
ALTER TABLE `sub_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_golas`
--
ALTER TABLE `table_golas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempbrief`
--
ALTER TABLE `tempbrief`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cloned_data`
--
ALTER TABLE `test_cloned_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_data`
--
ALTER TABLE `test_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_phase`
--
ALTER TABLE `test_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_category_data`
--
ALTER TABLE `type_category_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_data`
--
ALTER TABLE `type_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdepartment`
--
ALTER TABLE `userdepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdocumnet`
--
ALTER TABLE `userdocumnet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_event`
--
ALTER TABLE `user_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`vehid`);

--
-- Indexes for table `warning_category_data`
--
ALTER TABLE `warning_category_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_data`
--
ALTER TABLE `warning_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_permission`
--
ALTER TABLE `warning_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `accomplish_task`
--
ALTER TABLE `accomplish_task`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `acedemic_phase`
--
ALTER TABLE `acedemic_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `acedemic_stu`
--
ALTER TABLE `acedemic_stu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actual`
--
ALTER TABLE `actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `actual_gradesheet`
--
ALTER TABLE `actual_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actual_phase`
--
ALTER TABLE `actual_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `additional_task`
--
ALTER TABLE `additional_task`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `adminpagechangelog`
--
ALTER TABLE `adminpagechangelog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alertreply`
--
ALTER TABLE `alertreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alerttable`
--
ALTER TABLE `alerttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assing_warning_doc`
--
ALTER TABLE `assing_warning_doc`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `briefcase`
--
ALTER TABLE `briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classfilter`
--
ALTER TABLE `classfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_documnet`
--
ALTER TABLE `class_documnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clearance_data`
--
ALTER TABLE `clearance_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clearance_student_id`
--
ALTER TABLE `clearance_student_id`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clone_class`
--
ALTER TABLE `clone_class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `ctppage`
--
ALTER TABLE `ctppage`
  MODIFY `CTPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `desccate`
--
ALTER TABLE `desccate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discipline_data`
--
ALTER TABLE `discipline_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `division_department`
--
ALTER TABLE `division_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `editor_data`
--
ALTER TABLE `editor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emergency_data`
--
ALTER TABLE `emergency_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `extra_item_subitem`
--
ALTER TABLE `extra_item_subitem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `extra_item_subitem_cl`
--
ALTER TABLE `extra_item_subitem_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extra_item_subitem_grades`
--
ALTER TABLE `extra_item_subitem_grades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extra_item_subitem_grades_cl`
--
ALTER TABLE `extra_item_subitem_grades_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favouritefiles`
--
ALTER TABLE `favouritefiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favouritepages`
--
ALTER TABLE `favouritepages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filepermissions`
--
ALTER TABLE `filepermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `filepermissionsfm`
--
ALTER TABLE `filepermissionsfm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_briefcase`
--
ALTER TABLE `file_briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_briefcase_folder`
--
ALTER TABLE `file_briefcase_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_menu_name`
--
ALTER TABLE `file_menu_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `folder_shop_user`
--
ALTER TABLE `folder_shop_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradeaheet_clear_reason`
--
ALTER TABLE `gradeaheet_clear_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gradesheet`
--
ALTER TABLE `gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `grade_per`
--
ALTER TABLE `grade_per`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `grade_permission`
--
ALTER TABLE `grade_permission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade_per_notifications`
--
ALTER TABLE `grade_per_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff`
--
ALTER TABLE `gradsheet_final_hashoff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff_cl`
--
ALTER TABLE `gradsheet_final_hashoff_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_student_scheduling`
--
ALTER TABLE `group_student_scheduling`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hashoff`
--
ALTER TABLE `hashoff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hashoff_gradesheet`
--
ALTER TABLE `hashoff_gradesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `itembank`
--
ALTER TABLE `itembank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `item_clone_gradesheet`
--
ALTER TABLE `item_clone_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `item_gradesheet`
--
ALTER TABLE `item_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `main_department`
--
ALTER TABLE `main_department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manage_role_course_phase`
--
ALTER TABLE `manage_role_course_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mark_distribution`
--
ALTER TABLE `mark_distribution`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meesages`
--
ALTER TABLE `meesages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `memocate`
--
ALTER TABLE `memocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `newcourse`
--
ALTER TABLE `newcourse`
  MODIFY `Courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `newpagechangelogdata`
--
ALTER TABLE `newpagechangelogdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newpage_fm`
--
ALTER TABLE `newpage_fm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `new_warnning`
--
ALTER TABLE `new_warnning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `orgchart_data`
--
ALTER TABLE `orgchart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pagepermissions`
--
ALTER TABLE `pagepermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pagepermissionsfm`
--
ALTER TABLE `pagepermissionsfm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persontitle`
--
ALTER TABLE `persontitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prereuisites`
--
ALTER TABLE `prereuisites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prereuisite_data`
--
ALTER TABLE `prereuisite_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qual_data`
--
ALTER TABLE `qual_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_cloned_data`
--
ALTER TABLE `quiz_cloned_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `self`
--
ALTER TABLE `self`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shelf_shop`
--
ALTER TABLE `shelf_shop`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shop_folder`
--
ALTER TABLE `shop_folder`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sidebar_ctp`
--
ALTER TABLE `sidebar_ctp`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sim`
--
ALTER TABLE `sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sim_phase`
--
ALTER TABLE `sim_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subitem`
--
ALTER TABLE `subitem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subitem_cloned_gradesheet`
--
ALTER TABLE `subitem_cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subitem_gradesheet`
--
ALTER TABLE `subitem_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `table_golas`
--
ALTER TABLE `table_golas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempbrief`
--
ALTER TABLE `tempbrief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `test_cloned_data`
--
ALTER TABLE `test_cloned_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_phase`
--
ALTER TABLE `test_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `type_category_data`
--
ALTER TABLE `type_category_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_data`
--
ALTER TABLE `type_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userdepartment`
--
ALTER TABLE `userdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userdocumnet`
--
ALTER TABLE `userdocumnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `warning_data`
--
ALTER TABLE `warning_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
