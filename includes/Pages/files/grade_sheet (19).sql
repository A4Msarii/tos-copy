-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 06:38 AM
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
  `days` int(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `shortacademic`, `ptype`, `percentage`, `phase`, `ctp`, `file`, `type`, `size`, `date`, `days`) VALUES
(2, 'vbn', 'A02', NULL, NULL, '1', '1', 'https://careerfoundry.com/en/blog/ui-design/introduction-to-color-theory-and-color-palettes/', 'link', NULL, '2023-07-21', 2),
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
  `days` int(155) DEFAULT NULL,
  `linesRequired` varchar(255) DEFAULT NULL,
  `studentPerClass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual`
--

INSERT INTO `actual` (`id`, `actual`, `symbol`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`, `linesRequired`, `studentPerClass`) VALUES
(1, 'Front', 'ADR-1', 'percentage', 100, '1', '1', '2023-07-17', NULL, '2', '4'),
(2, 'back data', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-17', NULL, '4', '2'),
(3, 'demo', 'ADR-45', 'percentage', 100, '1', '1', '2023-07-17', NULL, '4', '4'),
(4, 'Front Drive', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-18', 5, '4', '4'),
(5, 'Front Drive', 'ADR-9', 'percentage', 100, '3', '1', '2023-08-02', NULL, '4', '4'),
(6, 'back park', 'ADR-92', 'percentage', 100, '3', '1', '2023-08-02', NULL, '4', '4'),
(7, 'msarii', 'ADR-11', 'percentage', 100, '3', '1', '2023-08-02', NULL, '4', '4'),
(8, 'back adding', 'ADR-8', 'percentage', 100, '1', '1', '2023-08-07', NULL, '4', '4'),
(9, 'back adding', 'ADR-7', 'percentage', 100, '1', '1', '2023-08-07', NULL, '4', '4'),
(10, 'back adding', 'wqopjow', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(11, 'Front Drive', '2uiy2iywio', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(12, 'back adding', '202uu2o', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(13, 'back park', 'ADR-366', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(14, 'back park', 'ADR-234', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(15, 'Front Drive', 'ADR-100', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(16, 'front adding', 'APR-10', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(17, 'Front Drive', 'APR-9', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(18, 'msarii', 'APR-8', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(19, 'Front Drive', 'APR-7', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(20, 'back adding', 'APR-6', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(21, 'back park', 'APR-4', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(22, 'Front Drive', 'APR-3', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(23, 'drive', 'APR-2', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(24, 'msarii', 'park 1', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(25, 'Front Drive', 'park', 'percentage', 100, '1', '1', '2023-08-09', NULL, '4', '4'),
(26, 'Front Drive', 'ADR-9', 'percentage', 100, '2', '2', '2023-08-25', NULL, '4', '4'),
(28, 'demo', 'ac-2', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(29, 'demo2', 'ac-3', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(30, 'demo3', 'ac-4', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(31, 'demo4', 'ac-5', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(32, 'demo5', 'ac-6', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(33, 'demo8', 'ac-7', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(34, 'demo9', 'ac-8', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(35, 'data', 'ac-23', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(36, 'dat1', 'ac-11', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(37, 'Physics3', 'ac-56', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(38, 'Physics1', 'rrf4', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(39, 'Physics2', 'ad2', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(40, 'Physics6', 'ad4', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(41, 'Physics7', 'ads3', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(42, 'Physics8', 'adse4', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(43, 'Physics87', 'ac56-7', 'percentage', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(44, 'parking', 'prk-1', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(45, 'parking1', 'prk-2', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(46, 'parking2', 'prk-3', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(47, 'parking3', 'prk-4', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(48, 'parking4', 'prk-5', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(49, 'parking5', 'prk-6', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(50, 'parking6', 'prk-7', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(51, 'parking7', 'prk-8', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(52, 'parking8', 'prk-9', 'percentage', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(53, 'engine', 'en-1', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(54, 'engine1', 'en-2', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(55, 'engine2', 'en-3', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(56, 'engine3', 'en-4', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(57, 'engine4', 'en-5', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(58, 'engine5', 'en-6', 'percentage', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(59, 'test1', 'te-1', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(60, 'test2', 'te-2', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(61, 'test3', 'te-3', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(62, 'test4', 'te-4', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(63, 'test6', 'te-5', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(64, 'test5', 'te-6', 'percentage', 100, '9', '1', '2023-09-13', NULL, NULL, NULL);

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
(6, '3', '1'),
(7, '7', '1'),
(8, '8', '1'),
(9, '9', '1'),
(10, '10', '1'),
(11, '11', '1'),
(12, '12', '1'),
(13, '13', '1'),
(14, '14', '1'),
(15, '15', '1'),
(16, '16', '1'),
(17, '17', '1'),
(18, '18', '1'),
(19, '19', '1');

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
(3, '1', 29, '5', 'item', NULL, NULL, NULL, NULL),
(4, '1', 29, '26', 'item', NULL, NULL, NULL, NULL),
(5, '2', 29, '26', 'item', NULL, NULL, NULL, NULL),
(6, '3', 29, '26', 'item', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `alertreply`
--

INSERT INTO `alertreply` (`id`, `alert_id`, `user_id`, `message`, `is_read`) VALUES
(1, 1, 12, 'ok', '0'),
(2, 2, 12, 'ok', '0'),
(3, 3, 12, 'ok', '0'),
(4, 2, 36, 'ok', '0'),
(5, 1, 36, 'ok', '0'),
(6, 4, 12, 'ok', '0'),
(7, 4, 14, 'ok', '0'),
(8, 3, 14, 'ok', '0'),
(9, 2, 14, 'ok', '0'),
(10, 1, 14, 'ok', '0'),
(11, 4, 32, 'ok', '0'),
(12, 3, 32, 'ok', '0'),
(13, 2, 32, 'ok', '0'),
(14, 1, 32, 'ok', '0'),
(15, 4, 13, 'ok', '0'),
(16, 3, 13, 'ok', '0'),
(17, 2, 13, 'ok', '0'),
(18, 1, 13, 'ok', '0'),
(19, 4, 15, 'ok', '0'),
(20, 3, 15, 'ok', '0'),
(21, 2, 15, 'ok', '0'),
(22, 1, 15, 'ok', '0'),
(23, 4, 0, 'close', '0'),
(24, 3, 0, 'close', '0'),
(25, 2, 0, 'close', '0'),
(26, 1, 0, 'close', '0'),
(27, 4, 60, 'close', '0'),
(28, 3, 60, 'ok', '0'),
(29, 2, 60, 'ok', '0'),
(30, 1, 60, 'ok', '0'),
(31, 4, 16, 'ok', '0'),
(32, 3, 16, 'ok', '0'),
(33, 2, 16, 'ok', '0'),
(34, 2, 16, 'ok', '0'),
(35, 1, 16, 'ok', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerttable`
--

INSERT INTO `alerttable` (`id`, `user_id`, `alert_type`, `message`, `date`, `permission`, `reciever_user_id`, `alertCategory`, `color`, `alert_file`, `alert_icon`, `textcolor`) VALUES
(1, '11', 'General Announcement', 'Hello everyone', '2023-08-24', 'everyone', NULL, 'General Announcement/Note To All', '#333CFF', '1', 'announcement_w.png', 'white'),
(2, '11', 'Graduation ceremony', 'hello world', '2023-08-24', 'everyone', NULL, 'Urgent Notice', '#FF1202', '1', 'urgent_w.png', 'white'),
(3, '11', 'status report', 'efewfef', '2023-08-24', 'everyone', '', 'Status Reports', '#77F869', '1', 'status_report_b.png', 'black'),
(4, '11', 'Student of the year', 'cvhgj', '2023-08-24', 'everyone', '', 'Instructions', 'brown', '1', 'instrcution_w.png', 'white');

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
-- Table structure for table `attrition`
--

CREATE TABLE `attrition` (
  `id` int(11) NOT NULL,
  `attritionDepartment` int(11) NOT NULL,
  `attritionPercent` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `certificate_data`
--

CREATE TABLE `certificate_data` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate_data`
--

INSERT INTO `certificate_data` (`id`, `name`, `type`) VALUES
(2, 'Certificate', 'vertical'),
(3, 'Certificate1', 'horizontal'),
(4, 'Certificate2', 'vertical'),
(5, 'Certificate3', 'vertical'),
(6, 'Certificat4', 'vertical'),
(7, 'certification6', 'horizontal'),
(8, 'certification 8', 'horizontal'),
(9, 'certification 9', 'vertical');

-- --------------------------------------------------------

--
-- Table structure for table `chatdeleteforme`
--

CREATE TABLE `chatdeleteforme` (
  `id` int(11) NOT NULL,
  `msgId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatgroup`
--

CREATE TABLE `chatgroup` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `groupDesc` varchar(255) DEFAULT NULL,
  `groupProfile` varchar(255) DEFAULT NULL,
  `createdAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatgroup`
--

INSERT INTO `chatgroup` (`id`, `groupName`, `groupDesc`, `groupProfile`, `createdAt`) VALUES
(1, 'test', 'vmfnvkdfh', 'success.jpg', '2023-10-16'),
(2, 'test2', 'fvdbge', 'VarunPicture.jpeg', '2023-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `chatpagepermission`
--

CREATE TABLE `chatpagepermission` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL,
  `pageType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatpagepermission`
--

INSERT INTO `chatpagepermission` (`id`, `pageId`, `permissionId`, `userId`, `permissionType`, `pageType`) VALUES
(1, '2', '11', 'None', 'readOnly', 'chatPage'),
(3, '1', '11', 'Everyone', 'readOnly', 'groupPage');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `senderId` varchar(255) DEFAULT NULL,
  `receiverId` varchar(255) DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `msgEdit` varchar(255) DEFAULT NULL,
  `deleteStatus` varchar(255) DEFAULT NULL,
  `replyMsg` varchar(255) DEFAULT NULL,
  `replyStatus` varchar(255) DEFAULT NULL,
  `msgRead` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `senderId`, `receiverId`, `messages`, `lastName`, `fileType`, `date`, `msgEdit`, `deleteStatus`, `replyMsg`, `replyStatus`, `msgRead`) VALUES
(1, '11', '12', 'hii', NULL, NULL, '2023-10-16 11:51:38.000000', NULL, NULL, NULL, NULL, '1'),
(2, '12', '11', 'hello', NULL, NULL, '2023-10-16 11:52:03.000000', NULL, NULL, NULL, NULL, '1'),
(4, '11', '12', 'C:\\xampp\\htdocs\\latest\\TOS', 'C:xampph', 'offline', '2023-10-16 12:21:41.000000', NULL, NULL, NULL, NULL, '1'),
(5, '11', '12', 'http://arudantech.com/', 'http://aru', 'online', '2023-10-16 12:22:10.000000', NULL, NULL, NULL, NULL, '1'),
(6, '11', '14', 'http://arudantech.com/', 'http://aru', 'online', '2023-10-16 12:22:40.000000', NULL, NULL, NULL, NULL, '0'),
(7, '11', '14', 'hello', NULL, NULL, '2023-10-16 12:33:26.000000', NULL, NULL, NULL, NULL, '0'),
(8, '11', '12', 'hello', NULL, NULL, '2023-10-16 13:15:03.000000', NULL, NULL, NULL, NULL, '1'),
(9, '11', '12', 'hii', NULL, NULL, '2023-10-16 13:16:08.000000', NULL, NULL, NULL, NULL, '1'),
(12, '11', '12', 'VarunPicture.jpeg', 'file', 'jpeg', '2023-10-16 13:24:02.000000', NULL, NULL, NULL, NULL, '1'),
(13, '11', '12', 'new plan (9) (1) (2) (2) (1).xlsx', 'file', 'xlsx', '2023-10-16 14:05:08.000000', NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(30) NOT NULL,
  `checklist` varchar(255) DEFAULT NULL,
  `ctp` varchar(255) DEFAULT NULL,
  `subchecklist` varchar(255) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `status` varchar(3000) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `category` varchar(3000) DEFAULT NULL,
  `comment` varchar(3000) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `checklist`, `ctp`, `subchecklist`, `description`, `status`, `priority`, `category`, `comment`, `date`, `color`) VALUES
(4, 'checklist 1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 16:34:06', '#f00a0a'),
(5, 'checklist 2', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 16:34:06', NULL),
(6, 'checklist 3', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 16:34:06', NULL),
(7, 'checklist per 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-04 14:08:30', NULL),
(8, 'checklist [er 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-04 14:08:30', NULL),
(9, 'checklist per 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-04 14:08:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkonline`
--

CREATE TABLE `checkonline` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkonline`
--

INSERT INTO `checkonline` (`id`, `userId`, `status`) VALUES
(65, '16', 'online'),
(83, '12', 'online'),
(84, '11', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `checktyping`
--

CREATE TABLE `checktyping` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `chatId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `check_sub_checklist`
--

CREATE TABLE `check_sub_checklist` (
  `id` int(11) NOT NULL,
  `checkListId` varchar(255) DEFAULT NULL,
  `subCheckListId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_sub_checklist`
--

INSERT INTO `check_sub_checklist` (`id`, `checkListId`, `subCheckListId`, `studentId`, `ctpId`) VALUES
(1, '4', '3', '29', '1'),
(2, '4', '1', '29', '1'),
(3, '4', '2', '29', '1'),
(4, '4', '4', '29', '1'),
(5, '5', '6', '29', '1'),
(6, '5', '5', '29', '1');

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
(6, 'sim', 'qual');

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

--
-- Dumping data for table `clearance_student_id`
--

INSERT INTO `clearance_student_id` (`id`, `clearance_id`, `stud_id`, `class_id`, `class_table`, `clone_cid`) VALUES
(1, '1', '29', '2', 'actual', NULL);

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
(1, '29', '1', '1', '4', 'actual', '12', '1', '15:10', '2023-08-09', '11', '22', 'G', '77', ' hello world', '\r\n                          ', '1', 1, NULL, '1'),
(2, '13', '1', '1', '4', 'actual', '12', '1', '15:24', '2023-08-09', '11', '22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(6, '29', '1', '1', '1', 'actual', '12', '1', '16:34', '2023-08-02', '11', '22', 'F', '60', ' Hello Msarii', '\r\n                          ', '1', 1, NULL, '1'),
(7, '29', '1', '1', '19', 'actual', '12', '1', '16:17', '2023-09-28', '', '', 'U', '10', ' dcvsvc', '\r\n                          ', '1', 1, NULL, '1');

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
(45, '8', '29', 'actual', 1),
(46, '1', '29', 'actual', 2),
(47, '9', '29', 'actual', 1),
(48, '19', '29', 'actual', 1);

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
-- Table structure for table `deconflicterdata`
--

CREATE TABLE `deconflicterdata` (
  `id` int(11) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) NOT NULL,
  `linePerDay` int(11) DEFAULT NULL,
  `departMentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deconflicterdata`
--

INSERT INTO `deconflicterdata` (`id`, `startDate`, `endDate`, `linePerDay`, `departMentId`) VALUES
(1, '2023-09-12', '2023-09-15', 12, '1');

-- --------------------------------------------------------

--
-- Table structure for table `deconflicterdepartment`
--

CREATE TABLE `deconflicterdepartment` (
  `id` int(11) NOT NULL,
  `departMentId` varchar(255) DEFAULT NULL,
  `mainId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `desccate`
--

INSERT INTO `desccate` (`id`, `category`, `marks`, `date`) VALUES
(1, 'Descipline 1', '60', '2023-08-23 16:15:05'),
(2, 'Descipline 2', '70', '2023-08-23 16:15:05'),
(3, 'Descipline', '80', '2023-08-23 16:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `digramtable`
--

CREATE TABLE `digramtable` (
  `id` int(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `question` varchar(3000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `figure_name` varchar(255) DEFAULT NULL,
  `labels` varchar(255) DEFAULT NULL,
  `difficulty` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `test` varchar(255) DEFAULT NULL
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
  `fileExt` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discipline`
--

INSERT INTO `discipline` (`id`, `date`, `inst_id`, `topic`, `comment`, `dismarks`, `student_id`, `course_id`, `fileName`, `fileExt`, `categoryId`) VALUES
(1, '2023-08-08', '11', NULL, 'Descipline Marks', '60', '29', '1', 'users (1).csv', 'csv', '1'),
(2, '2023-08-18', '11', NULL, 'Hello world', '80', '29', '1', 'Gardening Dep (2).xlsx', 'xlsx', '3');

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
-- Table structure for table `document_test`
--

CREATE TABLE `document_test` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `refrence` varchar(3000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_test`
--

INSERT INTO `document_test` (`id`, `file_name`, `refrence`, `title`, `year`, `file_type`, `lastName`) VALUES
(1, 'TOS CHARTS.xlsx', 'mishra', 'document5', '2017', 'xlsx', NULL),
(2, 'Presentations.pptx', NULL, 'document1', '2023', 'pptx', NULL),
(3, 'VarunPicture.jpeg', NULL, 'vdsbsdbg', '2023-10-04', 'jpeg', NULL),
(4, 'dbrwbg', NULL, 'jggkuv', '2023-10-04', 'offline', 'bgrr'),
(5, 'http://arudantech.com/', NULL, 'bgkuguky', '2023-10-17', 'online', 'C:xampphtdocsTos');

-- --------------------------------------------------------

--
-- Table structure for table `editor_data`
--

CREATE TABLE `editor_data` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) DEFAULT NULL,
  `editorData` mediumtext DEFAULT NULL,
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
(1, 2, NULL, 29, 1, NULL),
(2, 1, NULL, 29, 1, NULL),
(3, 2, NULL, 29, 1, NULL),
(4, 3, NULL, 29, 1, NULL);

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
  `location` varchar(255) DEFAULT NULL,
  `randomCode` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examsubcategory`
--

CREATE TABLE `examsubcategory` (
  `id` int(11) NOT NULL,
  `examId` varchar(255) DEFAULT NULL,
  `examSubject` varchar(255) DEFAULT NULL,
  `subjectPercentage` varchar(255) DEFAULT NULL,
  `exam_marks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examsubcategory`
--

INSERT INTO `examsubcategory` (`id`, `examId`, `examSubject`, `subjectPercentage`, `exam_marks`) VALUES
(1, '3', '1', '50', NULL),
(2, '3', '5', '25', NULL),
(3, '3', '6', '25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `id` int(11) NOT NULL,
  `examId` varchar(255) DEFAULT NULL,
  `examType` varchar(255) DEFAULT NULL,
  `examTypePercentage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`id`, `examId`, `examType`, `examTypePercentage`) VALUES
(1, '3', 'mcq', '50'),
(2, '3', 'true_false', '50'),
(4, '3', 'mcq', '35'),
(5, '3', 'trueOrFalse', '35'),
(6, '3', 'trueOrFalse', '30');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers_once_test`
--

CREATE TABLE `exam_answers_once_test` (
  `id` int(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers_repeat_test`
--

CREATE TABLE `exam_answers_repeat_test` (
  `id` int(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `repeat_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` int(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `type_color` varchar(255) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correst_answer` varchar(255) DEFAULT NULL,
  `marks` int(255) DEFAULT NULL,
  `difficulty` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `category`, `type`, `type_color`, `question`, `file_name`, `option1`, `option2`, `option3`, `option4`, `correst_answer`, `marks`, `difficulty`, `document`, `color`) VALUES
(1, '1', 'mcq', NULL, 'Identify the sentence with correct subject-verb agreement.??', NULL, 'swimmed', 'swam', 'swum', 'swim', 'b', 10, 'veryhard', '1', NULL),
(2, '1', 'mcq', NULL, 'Identify the sentence with correct subject-verb agreement.', NULL, 'swimmed', 'swam', 'swum', 'swim', 'b', 10, 'easy', NULL, NULL),
(3, '1', 'mcq', NULL, 'Which of the following is a pronoun?', NULL, ' jump', 'quickly', 'she', 'delicious', 'c', 10, 'veryhard', NULL, NULL),
(4, '1', 'mcq', NULL, 'Identify the sentence with correct subject-verb agreement.', NULL, 'The team are playing well', 'The team is playing well.', 'The team plays well.', 'The team playing well.', 'b', 10, 'medium', NULL, NULL),
(5, '1', 'mcq', NULL, 'What is the past tense of the verb \"run\"?', NULL, ' Ran', 'Running', 'Runned', 'Runs', 'a', 2, 'easy', NULL, NULL),
(6, '1', 'mcq', NULL, 'Choose the correctly spelled word:', NULL, 'Neccessary', 'Necesssary', 'Necesary', 'Necessary', 'c', 2, 'easy', NULL, NULL),
(7, '1', 'mcq', NULL, 'In the sentence, \"She sings beautifully,\" what part of speech is \"beautifully\"?', NULL, ' Adjective', 'Verb', 'Adverb', 'Noun', 'c', 2, 'medium', NULL, NULL),
(8, '5', 'mcq', NULL, 'What is the SI unit of electric current?', NULL, 'Watts', 'Volts', 'Amperes (A)', 'Ohms', 'a', 3, 'hard', NULL, NULL),
(9, '5', 'mcq', NULL, 'What is the powerhouse of the cell?', NULL, 'Nucleus', 'Ribosome', 'Mitochondria', 'Endoplasmic reticulum', 'c', 6, 'veryhard', NULL, NULL),
(10, '5', 'mcq', NULL, 'What is the layer of the Earth beneath the crust called?', NULL, 'Mantle', 'Core', 'Lithosphere', 'Asthenosphere', 'a', 5, 'medium', NULL, NULL),
(11, '5', 'mcq', NULL, 'What is the chemical symbol for gold?', NULL, 'Ag', 'Au', 'Fe', 'Hg', 'b', 7, 'veryhard', NULL, NULL),
(12, '5', 'mcq', NULL, 'Which gas do plants absorb from the atmosphere during photosynthesis?', NULL, 'Oxygen (O2)', 'Nitrogen (N2)', 'Carbon dioxide (CO2)', 'Hydrogen (H2)', 'c', 3, 'hard', NULL, NULL),
(13, '6', 'mcq', NULL, 'à¤•à¤¿à¤¸à¤•à¤¾ à¤®à¥à¤–à¥à¤¯ à¤•à¤¾à¤°à¤£ à¤¹à¥ˆ à¤œà¤²à¤µà¤¾à¤¯à¥ à¤ªà¤°à¤¿à¤µà¤°à¥à¤¤à¤¨?', NULL, 'à¤ªà¥à¤°à¤¾à¤•à¥ƒà¤¤à¤¿à¤• à¤—à¥ˆà¤¸à¥‹à¤‚ à¤•à¤¾ à¤ªà¥à¤°à¤µà¤¾à¤¹', 'à¤µà¤¨à¤¸à¥à¤ªà¤¤à¤¿ à¤”à¤° à¤µà¤¨à¤¸à¥à¤ªà¤¤à¤¿ à¤šà¥‹à¤Ÿ', 'à¤®à¤¾à¤¨à¤µ à¤—à¤¤à¤¿à¤µà¤¿à¤§à¤¿à¤¯à¤¾à¤', 'à¤¬à¥à¤°à¤¹à¥à¤®à¤¾à¤‚à¤¡ à¤•à¥‡ à¤ªà¤°à¤¿à¤µà¤°à¥à¤¤à¤¨', 'c', 10, 'easy', NULL, NULL),
(14, '6', 'mcq', NULL, 'à¤¯à¤¦à¤¿ à¤à¤• à¤µà¤¸à¥à¤¤à¥ à¤ªà¤° à¤à¤• à¤¬à¤¾à¤¹à¤°à¥€ à¤¬à¤² à¤¨à¤¹à¥€à¤‚ à¤•à¤¾à¤® à¤•à¤°à¤¤à¤¾ à¤¹à¥ˆ, à¤¤à¥‹ à¤µà¤¸à¥à¤¤à¥ à¤•à¥€ à¤¸à¥à¤¥à¤¿à¤¤à¤¿ à¤•à¥à¤¯à¤¾ à¤¹à¥‹à¤¤à¥€ à¤¹à¥ˆ?', NULL, 'à¤†à¤°à¤¾à¤® à¤¸à¥‡ à¤¸à¥à¤¥à¤¿à¤°', 'à¤§à¥à¤µà¤¸à¥à¤¤', 'à¤—à¤¤à¤¿à¤¶à¥€à¤²', 'à¤¶à¤¾à¤‚à¤¤', 'a', 4, 'medium', NULL, NULL),
(15, '6', 'mcq', NULL, 'à¤•à¤¿à¤¸ à¤®à¤¹à¤¾à¤¸à¤¾à¤—à¤° à¤•à¥‹ \"à¤®à¤¹à¤¾à¤¸à¤¾à¤—à¤° à¤•à¤¾ à¤†à¤à¤–\" à¤•à¤¹à¤¾ à¤œà¤¾à¤¤à¤¾ à¤¹à¥ˆ?', NULL, 'à¤­à¥‚à¤®à¤§à¥à¤¯ à¤¸à¤¾à¤—à¤°', 'à¤¹à¤¿à¤‚à¤¦ à¤®à¤¹à¤¾à¤¸à¤¾à¤—à¤°', 'à¤‰à¤¦à¤¯ à¤¸à¤¾à¤—à¤°', 'à¤ªà¥ˆà¤¸à¤¿à¤«à¤¿à¤• à¤®à¤¹à¤¾à¤¸à¤¾à¤—à¤°', 'b', 7, 'veryhard', NULL, NULL),
(16, '1', 'mcq', NULL, 'rethrthr', NULL, 'thrth', 'thhrth', 'rthrthrt', 'hrth', 'b', 104, 'easy', '1', NULL),
(17, '1', 'mcq', NULL, 'fedfegf', NULL, NULL, NULL, NULL, NULL, 'true', 10, 'easy', '1', NULL),
(18, '1', 'true_false', NULL, 'egertgrtgthrt', NULL, NULL, NULL, NULL, NULL, 'true', 13, 'easy', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_ist`
--

CREATE TABLE `exam_question_ist` (
  `id` int(255) NOT NULL,
  `question_id` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_ist`
--

INSERT INTO `exam_question_ist` (`id`, `question_id`, `exam_id`, `code`) VALUES
(5, '14', '3', 'qlgy2MXz'),
(6, '1', '3', 'qlgy2MXz'),
(7, '7', '3', 'qlgy2MXz'),
(8, '10', '3', 'qlgy2MXz');

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
  `data_type` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_item_subitem`
--

INSERT INTO `extra_item_subitem` (`id`, `item_id`, `user_id`, `class_id`, `class`, `data_type`, `grade_id`) VALUES
(1, '5', '29', '4', 'sim', 'item', '26'),
(2, '6', '29', '4', 'sim', 'item', '26'),
(3, '7', '29', '4', 'sim', 'item', '26'),
(4, '8', '29', '4', 'sim', 'item', '26'),
(5, '8', '29', '8', 'actual', 'item', '16'),
(6, '9', '29', '8', 'actual', 'item', '16'),
(7, '10', '29', '8', 'actual', 'item', '16'),
(8, '11', '29', '8', 'actual', 'item', '16'),
(9, '12', '29', '8', 'actual', 'item', '16'),
(10, '13', '29', '8', 'actual', 'item', '16'),
(11, '14', '29', '8', 'actual', 'item', '16'),
(12, '15', '29', '8', 'actual', 'item', '16'),
(13, '16', '29', '8', 'actual', 'item', '16'),
(14, '17', '29', '8', 'actual', 'item', '16'),
(15, '18', '29', '8', 'actual', 'item', '16'),
(16, '19', '29', '8', 'actual', 'item', '16'),
(17, '20', '29', '8', 'actual', 'item', '16'),
(18, '21', '29', '8', 'actual', 'item', '16'),
(19, '22', '29', '8', 'actual', 'item', '16'),
(20, '23', '29', '8', 'actual', 'item', '16'),
(21, '24', '29', '8', 'actual', 'item', '16'),
(22, '25', '29', '8', 'actual', 'item', '16'),
(23, '26', '29', '8', 'actual', 'item', '16'),
(24, '27', '29', '8', 'actual', 'item', '16'),
(25, '1', '29', '8', 'actual', 'subitem', '16'),
(26, '4', '29', '8', 'actual', 'subitem', '16'),
(27, '7', '29', '8', 'actual', 'subitem', '16'),
(28, '8', '29', '8', 'actual', 'subitem', '16'),
(29, '1', '29', '1', 'sim', 'item', '24'),
(30, '2', '29', '1', 'sim', 'item', '24'),
(31, '3', '29', '1', 'sim', 'item', '24'),
(32, '5', '29', '2', 'actual', 'item', '29'),
(33, '6', '29', '2', 'actual', 'item', '29'),
(34, '7', '29', '2', 'actual', 'item', '29'),
(35, '4', '29', '2', 'sim', 'item', '25'),
(36, '5', '29', '2', 'sim', 'item', '25'),
(37, '6', '29', '2', 'sim', 'item', '25'),
(38, '1', '29', '14', 'actual', 'item', '30'),
(39, '2', '29', '14', 'actual', 'item', '30'),
(40, '3', '29', '14', 'actual', 'item', '30'),
(41, '4', '29', '14', 'actual', 'item', '30'),
(42, '5', '29', '14', 'actual', 'item', '30'),
(43, '1', '29', '3', 'actual', 'item', '18'),
(44, '2', '29', '3', 'actual', 'item', '18'),
(45, '3', '29', '3', 'actual', 'item', '18'),
(46, '4', '29', '3', 'actual', 'item', '18'),
(47, '5', '29', '3', 'actual', 'item', '18'),
(48, '6', '29', '3', 'actual', 'item', '18'),
(49, '7', '29', '3', 'actual', 'item', '18'),
(50, '1', '29', '12', 'actual', 'item', '32'),
(51, '2', '29', '12', 'actual', 'item', '32'),
(52, '3', '29', '12', 'actual', 'item', '32'),
(53, '4', '29', '12', 'actual', 'item', '32'),
(54, '5', '29', '12', 'actual', 'item', '32'),
(55, '6', '29', '12', 'actual', 'item', '32'),
(56, '7', '29', '12', 'actual', 'item', '32'),
(57, '8', '29', '12', 'actual', 'item', '32'),
(58, '9', '29', '12', 'actual', 'item', '32'),
(59, '10', '29', '12', 'actual', 'item', '32'),
(60, '11', '29', '12', 'actual', 'item', '32'),
(61, '12', '29', '12', 'actual', 'item', '32'),
(62, '13', '29', '12', 'actual', 'item', '32'),
(63, '14', '29', '12', 'actual', 'item', '32'),
(64, '15', '29', '12', 'actual', 'item', '32'),
(65, '16', '29', '12', 'actual', 'item', '32'),
(66, '17', '29', '12', 'actual', 'item', '32'),
(67, '18', '29', '12', 'actual', 'item', '32'),
(68, '19', '29', '12', 'actual', 'item', '32'),
(69, '20', '29', '12', 'actual', 'item', '32'),
(70, '21', '29', '12', 'actual', 'item', '32'),
(71, '22', '29', '12', 'actual', 'item', '32'),
(72, '23', '29', '12', 'actual', 'item', '32'),
(73, '24', '29', '12', 'actual', 'item', '32'),
(74, '25', '29', '12', 'actual', 'item', '32'),
(75, '26', '29', '12', 'actual', 'item', '32'),
(76, '27', '29', '12', 'actual', 'item', '32'),
(77, '1', '29', '12', 'actual', 'subitem', '32'),
(78, '2', '29', '12', 'actual', 'subitem', '32'),
(79, '3', '29', '12', 'actual', 'subitem', '32'),
(80, '4', '29', '12', 'actual', 'subitem', '32'),
(81, '5', '29', '12', 'actual', 'subitem', '32'),
(82, '6', '29', '12', 'actual', 'subitem', '32'),
(83, '7', '29', '12', 'actual', 'subitem', '32'),
(84, '8', '29', '12', 'actual', 'subitem', '32'),
(85, '1', '29', '16', 'actual', 'item', '22'),
(86, '2', '29', '16', 'actual', 'item', '22'),
(87, '3', '29', '16', 'actual', 'item', '22'),
(88, '4', '29', '16', 'actual', 'item', '22'),
(89, '5', '29', '16', 'actual', 'item', '22'),
(90, '6', '29', '16', 'actual', 'item', '22'),
(91, '7', '29', '16', 'actual', 'item', '22'),
(92, '8', '29', '16', 'actual', 'item', '22'),
(93, '9', '29', '16', 'actual', 'item', '22'),
(94, '10', '29', '16', 'actual', 'item', '22'),
(95, '11', '29', '16', 'actual', 'item', '22'),
(96, '12', '29', '16', 'actual', 'item', '22'),
(97, '13', '29', '16', 'actual', 'item', '22'),
(98, '14', '29', '16', 'actual', 'item', '22'),
(99, '15', '29', '16', 'actual', 'item', '22'),
(100, '16', '29', '16', 'actual', 'item', '22'),
(101, '17', '29', '16', 'actual', 'item', '22'),
(102, '18', '29', '16', 'actual', 'item', '22'),
(103, '19', '29', '16', 'actual', 'item', '22'),
(104, '20', '29', '16', 'actual', 'item', '22'),
(105, '21', '29', '16', 'actual', 'item', '22'),
(106, '22', '29', '16', 'actual', 'item', '22'),
(107, '23', '29', '16', 'actual', 'item', '22'),
(108, '24', '29', '16', 'actual', 'item', '22'),
(109, '25', '29', '16', 'actual', 'item', '22'),
(110, '26', '29', '16', 'actual', 'item', '22'),
(111, '27', '29', '16', 'actual', 'item', '22'),
(112, '1', '29', '16', 'actual', 'subitem', '22'),
(113, '2', '29', '16', 'actual', 'subitem', '22'),
(114, '3', '29', '16', 'actual', 'subitem', '22'),
(115, '4', '29', '16', 'actual', 'subitem', '22'),
(116, '5', '29', '16', 'actual', 'subitem', '22'),
(117, '6', '29', '16', 'actual', 'subitem', '22'),
(118, '7', '29', '16', 'actual', 'subitem', '22'),
(119, '8', '29', '16', 'actual', 'subitem', '22'),
(120, '1', '29', '28', 'actual', 'item', '33'),
(121, '2', '29', '28', 'actual', 'item', '33'),
(122, '3', '29', '28', 'actual', 'item', '33'),
(123, '4', '29', '28', 'actual', 'item', '33'),
(124, '5', '29', '28', 'actual', 'item', '33'),
(125, '6', '29', '28', 'actual', 'item', '33'),
(126, '7', '29', '28', 'actual', 'item', '33'),
(127, '8', '29', '28', 'actual', 'item', '33'),
(128, '9', '29', '28', 'actual', 'item', '33'),
(129, '10', '29', '28', 'actual', 'item', '33'),
(130, '11', '29', '28', 'actual', 'item', '33'),
(131, '12', '29', '28', 'actual', 'item', '33'),
(132, '13', '29', '28', 'actual', 'item', '33'),
(133, '14', '29', '28', 'actual', 'item', '33'),
(134, '15', '29', '28', 'actual', 'item', '33'),
(135, '16', '29', '28', 'actual', 'item', '33'),
(136, '17', '29', '28', 'actual', 'item', '33'),
(137, '18', '29', '28', 'actual', 'item', '33'),
(138, '19', '29', '28', 'actual', 'item', '33'),
(139, '20', '29', '28', 'actual', 'item', '33'),
(140, '21', '29', '28', 'actual', 'item', '33'),
(141, '22', '29', '28', 'actual', 'item', '33'),
(142, '23', '29', '28', 'actual', 'item', '33'),
(143, '24', '29', '28', 'actual', 'item', '33'),
(144, '25', '29', '28', 'actual', 'item', '33'),
(145, '26', '29', '28', 'actual', 'item', '33'),
(146, '27', '29', '28', 'actual', 'item', '33'),
(147, '1', '29', '28', 'actual', 'subitem', '33'),
(148, '2', '29', '28', 'actual', 'subitem', '33'),
(149, '3', '29', '28', 'actual', 'subitem', '33'),
(150, '4', '29', '28', 'actual', 'subitem', '33'),
(151, '5', '29', '28', 'actual', 'subitem', '33'),
(152, '6', '29', '28', 'actual', 'subitem', '33'),
(153, '7', '29', '28', 'actual', 'subitem', '33'),
(154, '8', '29', '28', 'actual', 'subitem', '33'),
(155, '1', '29', '29', 'actual', 'item', '34'),
(156, '2', '29', '29', 'actual', 'item', '34'),
(157, '3', '29', '29', 'actual', 'item', '34'),
(158, '4', '29', '29', 'actual', 'item', '34'),
(159, '5', '29', '29', 'actual', 'item', '34'),
(160, '6', '29', '29', 'actual', 'item', '34'),
(161, '7', '29', '29', 'actual', 'item', '34'),
(162, '8', '29', '29', 'actual', 'item', '34'),
(163, '9', '29', '29', 'actual', 'item', '34'),
(164, '10', '29', '29', 'actual', 'item', '34'),
(165, '11', '29', '29', 'actual', 'item', '34'),
(166, '12', '29', '29', 'actual', 'item', '34'),
(167, '13', '29', '29', 'actual', 'item', '34'),
(168, '14', '29', '29', 'actual', 'item', '34'),
(169, '15', '29', '29', 'actual', 'item', '34'),
(170, '16', '29', '29', 'actual', 'item', '34'),
(171, '17', '29', '29', 'actual', 'item', '34'),
(172, '18', '29', '29', 'actual', 'item', '34'),
(173, '19', '29', '29', 'actual', 'item', '34'),
(174, '20', '29', '29', 'actual', 'item', '34'),
(175, '21', '29', '29', 'actual', 'item', '34'),
(176, '22', '29', '29', 'actual', 'item', '34'),
(177, '23', '29', '29', 'actual', 'item', '34'),
(178, '24', '29', '29', 'actual', 'item', '34'),
(179, '25', '29', '29', 'actual', 'item', '34'),
(180, '26', '29', '29', 'actual', 'item', '34'),
(181, '27', '29', '29', 'actual', 'item', '34'),
(182, '1', '29', '29', 'actual', 'subitem', '34'),
(183, '2', '29', '29', 'actual', 'subitem', '34'),
(184, '3', '29', '29', 'actual', 'subitem', '34'),
(185, '4', '29', '29', 'actual', 'subitem', '34'),
(186, '5', '29', '29', 'actual', 'subitem', '34'),
(187, '6', '29', '29', 'actual', 'subitem', '34'),
(188, '7', '29', '29', 'actual', 'subitem', '34'),
(189, '8', '29', '29', 'actual', 'subitem', '34'),
(190, '1', '29', '30', 'actual', 'item', '35'),
(191, '2', '29', '30', 'actual', 'item', '35'),
(192, '3', '29', '30', 'actual', 'item', '35'),
(193, '4', '29', '30', 'actual', 'item', '35'),
(194, '5', '29', '30', 'actual', 'item', '35'),
(195, '6', '29', '30', 'actual', 'item', '35'),
(196, '7', '29', '30', 'actual', 'item', '35'),
(197, '8', '29', '30', 'actual', 'item', '35'),
(198, '9', '29', '30', 'actual', 'item', '35'),
(199, '10', '29', '30', 'actual', 'item', '35'),
(200, '11', '29', '30', 'actual', 'item', '35'),
(201, '12', '29', '30', 'actual', 'item', '35'),
(202, '13', '29', '30', 'actual', 'item', '35'),
(203, '14', '29', '30', 'actual', 'item', '35'),
(204, '15', '29', '30', 'actual', 'item', '35'),
(205, '16', '29', '30', 'actual', 'item', '35'),
(206, '17', '29', '30', 'actual', 'item', '35'),
(207, '18', '29', '30', 'actual', 'item', '35'),
(208, '19', '29', '30', 'actual', 'item', '35'),
(209, '20', '29', '30', 'actual', 'item', '35'),
(210, '21', '29', '30', 'actual', 'item', '35'),
(211, '22', '29', '30', 'actual', 'item', '35'),
(212, '23', '29', '30', 'actual', 'item', '35'),
(213, '24', '29', '30', 'actual', 'item', '35'),
(214, '25', '29', '30', 'actual', 'item', '35'),
(215, '26', '29', '30', 'actual', 'item', '35'),
(216, '27', '29', '30', 'actual', 'item', '35'),
(217, '1', '29', '30', 'actual', 'subitem', '35'),
(218, '2', '29', '30', 'actual', 'subitem', '35'),
(219, '3', '29', '30', 'actual', 'subitem', '35'),
(220, '4', '29', '30', 'actual', 'subitem', '35'),
(221, '5', '29', '30', 'actual', 'subitem', '35'),
(222, '6', '29', '30', 'actual', 'subitem', '35'),
(223, '7', '29', '30', 'actual', 'subitem', '35'),
(224, '8', '29', '30', 'actual', 'subitem', '35'),
(225, '1', '29', '37', 'actual', 'item', '36'),
(226, '2', '29', '37', 'actual', 'item', '36'),
(227, '3', '29', '37', 'actual', 'item', '36'),
(228, '4', '29', '37', 'actual', 'item', '36'),
(229, '5', '29', '37', 'actual', 'item', '36'),
(230, '6', '29', '37', 'actual', 'item', '36'),
(231, '7', '29', '37', 'actual', 'item', '36'),
(232, '8', '29', '37', 'actual', 'item', '36'),
(233, '9', '29', '37', 'actual', 'item', '36'),
(234, '10', '29', '37', 'actual', 'item', '36'),
(235, '11', '29', '37', 'actual', 'item', '36'),
(236, '12', '29', '37', 'actual', 'item', '36'),
(237, '13', '29', '37', 'actual', 'item', '36'),
(238, '14', '29', '37', 'actual', 'item', '36'),
(239, '15', '29', '37', 'actual', 'item', '36'),
(240, '16', '29', '37', 'actual', 'item', '36'),
(241, '17', '29', '37', 'actual', 'item', '36'),
(242, '18', '29', '37', 'actual', 'item', '36'),
(243, '19', '29', '37', 'actual', 'item', '36'),
(244, '20', '29', '37', 'actual', 'item', '36'),
(245, '21', '29', '37', 'actual', 'item', '36'),
(246, '22', '29', '37', 'actual', 'item', '36'),
(247, '23', '29', '37', 'actual', 'item', '36'),
(248, '24', '29', '37', 'actual', 'item', '36'),
(249, '25', '29', '37', 'actual', 'item', '36'),
(250, '26', '29', '37', 'actual', 'item', '36'),
(251, '27', '29', '37', 'actual', 'item', '36'),
(252, '1', '29', '37', 'actual', 'subitem', '36'),
(253, '2', '29', '37', 'actual', 'subitem', '36'),
(254, '3', '29', '37', 'actual', 'subitem', '36'),
(255, '4', '29', '37', 'actual', 'subitem', '36'),
(256, '5', '29', '37', 'actual', 'subitem', '36'),
(257, '6', '29', '37', 'actual', 'subitem', '36'),
(258, '7', '29', '37', 'actual', 'subitem', '36'),
(259, '8', '29', '37', 'actual', 'subitem', '36'),
(260, '1', '29', '43', 'actual', 'item', '37'),
(261, '2', '29', '43', 'actual', 'item', '37'),
(262, '3', '29', '43', 'actual', 'item', '37'),
(263, '4', '29', '43', 'actual', 'item', '37'),
(264, '5', '29', '43', 'actual', 'item', '37'),
(265, '6', '29', '43', 'actual', 'item', '37'),
(266, '7', '29', '43', 'actual', 'item', '37'),
(267, '8', '29', '43', 'actual', 'item', '37'),
(268, '9', '29', '43', 'actual', 'item', '37'),
(269, '10', '29', '43', 'actual', 'item', '37'),
(270, '11', '29', '43', 'actual', 'item', '37'),
(271, '12', '29', '43', 'actual', 'item', '37'),
(272, '13', '29', '43', 'actual', 'item', '37'),
(273, '14', '29', '43', 'actual', 'item', '37'),
(274, '15', '29', '43', 'actual', 'item', '37'),
(275, '16', '29', '43', 'actual', 'item', '37'),
(276, '17', '29', '43', 'actual', 'item', '37'),
(277, '18', '29', '43', 'actual', 'item', '37'),
(278, '19', '29', '43', 'actual', 'item', '37'),
(279, '20', '29', '43', 'actual', 'item', '37'),
(280, '21', '29', '43', 'actual', 'item', '37'),
(281, '22', '29', '43', 'actual', 'item', '37'),
(282, '23', '29', '43', 'actual', 'item', '37'),
(283, '24', '29', '43', 'actual', 'item', '37'),
(284, '25', '29', '43', 'actual', 'item', '37'),
(285, '26', '29', '43', 'actual', 'item', '37'),
(286, '27', '29', '43', 'actual', 'item', '37'),
(287, '1', '29', '43', 'actual', 'subitem', '37'),
(288, '2', '29', '43', 'actual', 'subitem', '37'),
(289, '3', '29', '43', 'actual', 'subitem', '37'),
(290, '4', '29', '43', 'actual', 'subitem', '37'),
(291, '5', '29', '43', 'actual', 'subitem', '37'),
(292, '6', '29', '43', 'actual', 'subitem', '37'),
(293, '7', '29', '43', 'actual', 'subitem', '37'),
(294, '8', '29', '43', 'actual', 'subitem', '37'),
(295, '1', '29', '55', 'actual', 'item', '54'),
(296, '8', '29', '55', 'actual', 'item', '54'),
(297, '9', '29', '55', 'actual', 'item', '54'),
(298, '10', '29', '55', 'actual', 'item', '54'),
(299, '11', '29', '55', 'actual', 'item', '54'),
(300, '12', '29', '55', 'actual', 'item', '54'),
(301, '13', '29', '55', 'actual', 'item', '54'),
(302, '14', '29', '55', 'actual', 'item', '54'),
(303, '15', '29', '55', 'actual', 'item', '54'),
(304, '16', '29', '55', 'actual', 'item', '54'),
(305, '17', '29', '55', 'actual', 'item', '54'),
(306, '18', '29', '55', 'actual', 'item', '54'),
(307, '19', '29', '55', 'actual', 'item', '54'),
(308, '20', '29', '55', 'actual', 'item', '54'),
(309, '21', '29', '55', 'actual', 'item', '54'),
(310, '22', '29', '55', 'actual', 'item', '54'),
(311, '23', '29', '55', 'actual', 'item', '54'),
(312, '24', '29', '55', 'actual', 'item', '54'),
(313, '25', '29', '55', 'actual', 'item', '54'),
(314, '26', '29', '55', 'actual', 'item', '54'),
(315, '27', '29', '55', 'actual', 'item', '54'),
(316, '1', '29', '55', 'actual', 'subitem', '54'),
(317, '2', '29', '55', 'actual', 'subitem', '54'),
(318, '3', '29', '55', 'actual', 'subitem', '54'),
(319, '4', '29', '55', 'actual', 'subitem', '54'),
(320, '5', '29', '55', 'actual', 'subitem', '54'),
(321, '6', '29', '55', 'actual', 'subitem', '54'),
(322, '7', '29', '55', 'actual', 'subitem', '54'),
(323, '8', '29', '55', 'actual', 'subitem', '54'),
(324, '1', '29', '62', 'actual', 'item', '60'),
(325, '2', '29', '62', 'actual', 'item', '60'),
(326, '3', '29', '62', 'actual', 'item', '60'),
(327, '4', '29', '62', 'actual', 'item', '60'),
(328, '5', '29', '62', 'actual', 'item', '60'),
(329, '6', '29', '62', 'actual', 'item', '60'),
(330, '7', '29', '62', 'actual', 'item', '60'),
(331, '8', '29', '62', 'actual', 'item', '60'),
(332, '9', '29', '62', 'actual', 'item', '60'),
(333, '10', '29', '62', 'actual', 'item', '60'),
(334, '11', '29', '62', 'actual', 'item', '60'),
(335, '12', '29', '62', 'actual', 'item', '60'),
(336, '13', '29', '62', 'actual', 'item', '60'),
(337, '14', '29', '62', 'actual', 'item', '60'),
(338, '15', '29', '62', 'actual', 'item', '60'),
(339, '16', '29', '62', 'actual', 'item', '60'),
(340, '17', '29', '62', 'actual', 'item', '60'),
(341, '18', '29', '62', 'actual', 'item', '60'),
(342, '19', '29', '62', 'actual', 'item', '60'),
(343, '20', '29', '62', 'actual', 'item', '60'),
(344, '21', '29', '62', 'actual', 'item', '60'),
(345, '22', '29', '62', 'actual', 'item', '60'),
(346, '23', '29', '62', 'actual', 'item', '60'),
(347, '24', '29', '62', 'actual', 'item', '60'),
(348, '25', '29', '62', 'actual', 'item', '60'),
(349, '26', '29', '62', 'actual', 'item', '60'),
(350, '27', '29', '62', 'actual', 'item', '60'),
(351, '1', '29', '62', 'actual', 'subitem', '60'),
(352, '2', '29', '62', 'actual', 'subitem', '60'),
(353, '3', '29', '62', 'actual', 'subitem', '60'),
(354, '4', '29', '62', 'actual', 'subitem', '60'),
(355, '5', '29', '62', 'actual', 'subitem', '60'),
(356, '6', '29', '62', 'actual', 'subitem', '60'),
(357, '7', '29', '62', 'actual', 'subitem', '60'),
(358, '8', '29', '62', 'actual', 'subitem', '60'),
(359, '1', '29', '18', 'actual', 'item', '23'),
(360, '2', '29', '18', 'actual', 'item', '23'),
(361, '3', '29', '18', 'actual', 'item', '23'),
(362, '4', '29', '18', 'actual', 'item', '23'),
(363, '5', '29', '18', 'actual', 'item', '23'),
(364, '6', '29', '18', 'actual', 'item', '23'),
(365, '7', '29', '18', 'actual', 'item', '23'),
(366, '8', '29', '18', 'actual', 'item', '23'),
(367, '9', '29', '18', 'actual', 'item', '23'),
(368, '10', '29', '18', 'actual', 'item', '23'),
(369, '11', '29', '18', 'actual', 'item', '23'),
(370, '12', '29', '18', 'actual', 'item', '23'),
(371, '13', '29', '18', 'actual', 'item', '23'),
(372, '14', '29', '18', 'actual', 'item', '23'),
(373, '15', '29', '18', 'actual', 'item', '23'),
(374, '16', '29', '18', 'actual', 'item', '23'),
(375, '17', '29', '18', 'actual', 'item', '23'),
(376, '18', '29', '18', 'actual', 'item', '23'),
(377, '19', '29', '18', 'actual', 'item', '23'),
(378, '20', '29', '18', 'actual', 'item', '23'),
(379, '21', '29', '18', 'actual', 'item', '23'),
(380, '22', '29', '18', 'actual', 'item', '23'),
(381, '23', '29', '18', 'actual', 'item', '23'),
(382, '24', '29', '18', 'actual', 'item', '23'),
(383, '25', '29', '18', 'actual', 'item', '23'),
(384, '26', '29', '18', 'actual', 'item', '23'),
(385, '27', '29', '18', 'actual', 'item', '23'),
(386, '1', '29', '18', 'actual', 'subitem', '23'),
(387, '2', '29', '18', 'actual', 'subitem', '23'),
(388, '3', '29', '18', 'actual', 'subitem', '23'),
(389, '4', '29', '18', 'actual', 'subitem', '23'),
(390, '5', '29', '18', 'actual', 'subitem', '23'),
(391, '6', '29', '18', 'actual', 'subitem', '23'),
(392, '7', '29', '18', 'actual', 'subitem', '23'),
(393, '8', '29', '18', 'actual', 'subitem', '23'),
(394, '1', '29', '17', 'sim', 'item', '66'),
(395, '2', '29', '17', 'sim', 'item', '66'),
(396, '3', '29', '17', 'sim', 'item', '66'),
(397, '4', '29', '17', 'sim', 'item', '66'),
(398, '5', '29', '17', 'sim', 'item', '66'),
(399, '6', '29', '17', 'sim', 'item', '66'),
(400, '7', '29', '17', 'sim', 'item', '66'),
(401, '8', '29', '17', 'sim', 'item', '66'),
(402, '9', '29', '17', 'sim', 'item', '66'),
(403, '10', '29', '17', 'sim', 'item', '66'),
(404, '11', '29', '17', 'sim', 'item', '66'),
(405, '12', '29', '17', 'sim', 'item', '66'),
(406, '13', '29', '17', 'sim', 'item', '66'),
(407, '14', '29', '17', 'sim', 'item', '66'),
(408, '15', '29', '17', 'sim', 'item', '66'),
(409, '16', '29', '17', 'sim', 'item', '66'),
(410, '17', '29', '17', 'sim', 'item', '66'),
(411, '18', '29', '17', 'sim', 'item', '66'),
(412, '19', '29', '17', 'sim', 'item', '66'),
(413, '20', '29', '17', 'sim', 'item', '66'),
(414, '21', '29', '17', 'sim', 'item', '66'),
(415, '22', '29', '17', 'sim', 'item', '66'),
(416, '23', '29', '17', 'sim', 'item', '66'),
(417, '24', '29', '17', 'sim', 'item', '66'),
(418, '25', '29', '17', 'sim', 'item', '66'),
(419, '26', '29', '17', 'sim', 'item', '66'),
(420, '27', '29', '17', 'sim', 'item', '66'),
(421, '1', '29', '17', 'sim', 'subitem', '66'),
(422, '2', '29', '17', 'sim', 'subitem', '66'),
(423, '3', '29', '17', 'sim', 'subitem', '66'),
(424, '4', '29', '17', 'sim', 'subitem', '66'),
(425, '5', '29', '17', 'sim', 'subitem', '66'),
(426, '6', '29', '17', 'sim', 'subitem', '66'),
(427, '7', '29', '17', 'sim', 'subitem', '66'),
(428, '8', '29', '17', 'sim', 'subitem', '66'),
(429, '1', '29', '24', 'sim', 'item', '70'),
(430, '2', '29', '24', 'sim', 'item', '70'),
(431, '3', '29', '24', 'sim', 'item', '70'),
(432, '4', '29', '24', 'sim', 'item', '70'),
(433, '5', '29', '24', 'sim', 'item', '70'),
(434, '6', '29', '24', 'sim', 'item', '70'),
(435, '7', '29', '24', 'sim', 'item', '70'),
(436, '8', '29', '24', 'sim', 'item', '70'),
(437, '9', '29', '24', 'sim', 'item', '70'),
(438, '10', '29', '24', 'sim', 'item', '70'),
(439, '11', '29', '24', 'sim', 'item', '70'),
(440, '12', '29', '24', 'sim', 'item', '70'),
(441, '13', '29', '24', 'sim', 'item', '70'),
(442, '14', '29', '24', 'sim', 'item', '70'),
(443, '15', '29', '24', 'sim', 'item', '70'),
(444, '16', '29', '24', 'sim', 'item', '70'),
(445, '17', '29', '24', 'sim', 'item', '70'),
(446, '18', '29', '24', 'sim', 'item', '70'),
(447, '19', '29', '24', 'sim', 'item', '70'),
(448, '20', '29', '24', 'sim', 'item', '70'),
(449, '21', '29', '24', 'sim', 'item', '70'),
(450, '22', '29', '24', 'sim', 'item', '70'),
(451, '23', '29', '24', 'sim', 'item', '70'),
(452, '24', '29', '24', 'sim', 'item', '70'),
(453, '25', '29', '24', 'sim', 'item', '70'),
(454, '26', '29', '24', 'sim', 'item', '70'),
(455, '27', '29', '24', 'sim', 'item', '70'),
(456, '1', '29', '24', 'sim', 'subitem', '70'),
(457, '2', '29', '24', 'sim', 'subitem', '70'),
(458, '3', '29', '24', 'sim', 'subitem', '70'),
(459, '4', '29', '24', 'sim', 'subitem', '70'),
(460, '5', '29', '24', 'sim', 'subitem', '70'),
(461, '6', '29', '24', 'sim', 'subitem', '70'),
(462, '7', '29', '24', 'sim', 'subitem', '70'),
(463, '8', '29', '24', 'sim', 'subitem', '70'),
(464, '1', '29', '25', 'sim', 'item', '71'),
(465, '2', '29', '25', 'sim', 'item', '71'),
(466, '3', '29', '25', 'sim', 'item', '71'),
(467, '4', '29', '25', 'sim', 'item', '71'),
(468, '5', '29', '25', 'sim', 'item', '71'),
(469, '6', '29', '25', 'sim', 'item', '71'),
(470, '7', '29', '25', 'sim', 'item', '71'),
(471, '8', '29', '25', 'sim', 'item', '71'),
(472, '9', '29', '25', 'sim', 'item', '71'),
(473, '10', '29', '25', 'sim', 'item', '71'),
(474, '11', '29', '25', 'sim', 'item', '71'),
(475, '12', '29', '25', 'sim', 'item', '71'),
(476, '13', '29', '25', 'sim', 'item', '71'),
(477, '14', '29', '25', 'sim', 'item', '71'),
(478, '15', '29', '25', 'sim', 'item', '71'),
(479, '16', '29', '25', 'sim', 'item', '71'),
(480, '17', '29', '25', 'sim', 'item', '71'),
(481, '18', '29', '25', 'sim', 'item', '71'),
(482, '19', '29', '25', 'sim', 'item', '71'),
(483, '20', '29', '25', 'sim', 'item', '71'),
(484, '21', '29', '25', 'sim', 'item', '71'),
(485, '22', '29', '25', 'sim', 'item', '71'),
(486, '23', '29', '25', 'sim', 'item', '71'),
(487, '24', '29', '25', 'sim', 'item', '71'),
(488, '25', '29', '25', 'sim', 'item', '71'),
(489, '26', '29', '25', 'sim', 'item', '71'),
(490, '27', '29', '25', 'sim', 'item', '71'),
(491, '1', '29', '25', 'sim', 'subitem', '71'),
(492, '2', '29', '25', 'sim', 'subitem', '71'),
(493, '3', '29', '25', 'sim', 'subitem', '71'),
(494, '4', '29', '25', 'sim', 'subitem', '71'),
(495, '5', '29', '25', 'sim', 'subitem', '71'),
(496, '6', '29', '25', 'sim', 'subitem', '71'),
(497, '7', '29', '25', 'sim', 'subitem', '71'),
(498, '8', '29', '25', 'sim', 'subitem', '71'),
(499, '1', '29', '3', 'sim', 'item', '74'),
(500, '2', '29', '3', 'sim', 'item', '74'),
(501, '3', '29', '3', 'sim', 'item', '74'),
(502, '4', '29', '3', 'sim', 'item', '74'),
(504, '6', '29', '3', 'sim', 'item', '74'),
(505, '7', '29', '3', 'sim', 'item', '74'),
(506, '8', '29', '3', 'sim', 'item', '74'),
(507, '9', '29', '3', 'sim', 'item', '74'),
(508, '10', '29', '3', 'sim', 'item', '74'),
(509, '11', '29', '3', 'sim', 'item', '74'),
(510, '12', '29', '3', 'sim', 'item', '74'),
(511, '13', '29', '3', 'sim', 'item', '74'),
(512, '14', '29', '3', 'sim', 'item', '74'),
(513, '15', '29', '3', 'sim', 'item', '74'),
(514, '16', '29', '3', 'sim', 'item', '74'),
(515, '17', '29', '3', 'sim', 'item', '74'),
(516, '18', '29', '3', 'sim', 'item', '74'),
(517, '19', '29', '3', 'sim', 'item', '74'),
(518, '20', '29', '3', 'sim', 'item', '74'),
(519, '21', '29', '3', 'sim', 'item', '74'),
(520, '22', '29', '3', 'sim', 'item', '74'),
(521, '23', '29', '3', 'sim', 'item', '74'),
(522, '24', '29', '3', 'sim', 'item', '74'),
(523, '25', '29', '3', 'sim', 'item', '74'),
(524, '26', '29', '3', 'sim', 'item', '74'),
(525, '27', '29', '3', 'sim', 'item', '74'),
(526, '1', '29', '3', 'sim', 'subitem', '74'),
(527, '2', '29', '3', 'sim', 'subitem', '74'),
(528, '3', '29', '3', 'sim', 'subitem', '74'),
(529, '4', '29', '3', 'sim', 'subitem', '74'),
(530, '5', '29', '3', 'sim', 'subitem', '74'),
(531, '6', '29', '3', 'sim', 'subitem', '74'),
(532, '7', '29', '3', 'sim', 'subitem', '74'),
(533, '8', '29', '3', 'sim', 'subitem', '74'),
(534, '1', '29', '22', 'sim', 'item', '76'),
(535, '2', '29', '22', 'sim', 'item', '76'),
(536, '3', '29', '22', 'sim', 'item', '76'),
(537, '4', '29', '22', 'sim', 'item', '76'),
(539, '6', '29', '22', 'sim', 'item', '76'),
(540, '7', '29', '22', 'sim', 'item', '76'),
(541, '8', '29', '22', 'sim', 'item', '76'),
(542, '9', '29', '22', 'sim', 'item', '76'),
(543, '10', '29', '22', 'sim', 'item', '76'),
(544, '11', '29', '22', 'sim', 'item', '76'),
(545, '12', '29', '22', 'sim', 'item', '76'),
(546, '13', '29', '22', 'sim', 'item', '76'),
(547, '14', '29', '22', 'sim', 'item', '76'),
(548, '15', '29', '22', 'sim', 'item', '76'),
(549, '16', '29', '22', 'sim', 'item', '76'),
(550, '17', '29', '22', 'sim', 'item', '76'),
(551, '18', '29', '22', 'sim', 'item', '76'),
(552, '19', '29', '22', 'sim', 'item', '76'),
(553, '20', '29', '22', 'sim', 'item', '76'),
(554, '21', '29', '22', 'sim', 'item', '76'),
(555, '22', '29', '22', 'sim', 'item', '76'),
(556, '23', '29', '22', 'sim', 'item', '76'),
(557, '24', '29', '22', 'sim', 'item', '76'),
(558, '25', '29', '22', 'sim', 'item', '76'),
(559, '26', '29', '22', 'sim', 'item', '76'),
(560, '27', '29', '22', 'sim', 'item', '76'),
(561, '1', '29', '22', 'sim', 'subitem', '76'),
(562, '2', '29', '22', 'sim', 'subitem', '76'),
(563, '3', '29', '22', 'sim', 'subitem', '76'),
(564, '4', '29', '22', 'sim', 'subitem', '76'),
(565, '5', '29', '22', 'sim', 'subitem', '76'),
(566, '6', '29', '22', 'sim', 'subitem', '76'),
(567, '7', '29', '22', 'sim', 'subitem', '76'),
(568, '8', '29', '22', 'sim', 'subitem', '76'),
(569, '1', '29', '9', 'sim', 'item', '78'),
(570, '2', '29', '9', 'sim', 'item', '78'),
(571, '3', '29', '9', 'sim', 'item', '78'),
(572, '4', '29', '9', 'sim', 'item', '78'),
(573, '5', '29', '9', 'sim', 'item', '78'),
(574, '6', '29', '9', 'sim', 'item', '78'),
(575, '7', '29', '9', 'sim', 'item', '78'),
(576, '8', '29', '9', 'sim', 'item', '78'),
(577, '9', '29', '9', 'sim', 'item', '78'),
(578, '10', '29', '9', 'sim', 'item', '78'),
(579, '11', '29', '9', 'sim', 'item', '78'),
(580, '12', '29', '9', 'sim', 'item', '78'),
(581, '13', '29', '9', 'sim', 'item', '78'),
(582, '14', '29', '9', 'sim', 'item', '78'),
(583, '15', '29', '9', 'sim', 'item', '78'),
(584, '16', '29', '9', 'sim', 'item', '78'),
(585, '17', '29', '9', 'sim', 'item', '78'),
(586, '18', '29', '9', 'sim', 'item', '78'),
(587, '19', '29', '9', 'sim', 'item', '78'),
(588, '20', '29', '9', 'sim', 'item', '78'),
(589, '21', '29', '9', 'sim', 'item', '78'),
(590, '22', '29', '9', 'sim', 'item', '78'),
(591, '23', '29', '9', 'sim', 'item', '78'),
(592, '24', '29', '9', 'sim', 'item', '78'),
(593, '25', '29', '9', 'sim', 'item', '78'),
(594, '26', '29', '9', 'sim', 'item', '78'),
(595, '27', '29', '9', 'sim', 'item', '78'),
(596, '1', '29', '9', 'sim', 'subitem', '78'),
(597, '2', '29', '9', 'sim', 'subitem', '78'),
(598, '3', '29', '9', 'sim', 'subitem', '78'),
(599, '4', '29', '9', 'sim', 'subitem', '78'),
(600, '5', '29', '9', 'sim', 'subitem', '78'),
(601, '6', '29', '9', 'sim', 'subitem', '78'),
(602, '7', '29', '9', 'sim', 'subitem', '78'),
(603, '8', '29', '9', 'sim', 'subitem', '78'),
(604, '1', '29', '31', 'sim', 'item', '82'),
(605, '2', '29', '31', 'sim', 'item', '82'),
(606, '3', '29', '31', 'sim', 'item', '82'),
(607, '4', '29', '31', 'sim', 'item', '82'),
(608, '5', '29', '31', 'sim', 'item', '82'),
(609, '6', '29', '31', 'sim', 'item', '82'),
(610, '7', '29', '31', 'sim', 'item', '82'),
(611, '8', '29', '31', 'sim', 'item', '82'),
(612, '9', '29', '31', 'sim', 'item', '82'),
(613, '10', '29', '31', 'sim', 'item', '82'),
(614, '11', '29', '31', 'sim', 'item', '82'),
(615, '12', '29', '31', 'sim', 'item', '82'),
(616, '13', '29', '31', 'sim', 'item', '82'),
(617, '14', '29', '31', 'sim', 'item', '82'),
(618, '15', '29', '31', 'sim', 'item', '82'),
(619, '16', '29', '31', 'sim', 'item', '82'),
(620, '17', '29', '31', 'sim', 'item', '82'),
(621, '18', '29', '31', 'sim', 'item', '82'),
(622, '19', '29', '31', 'sim', 'item', '82'),
(623, '20', '29', '31', 'sim', 'item', '82'),
(624, '21', '29', '31', 'sim', 'item', '82'),
(625, '22', '29', '31', 'sim', 'item', '82'),
(626, '23', '29', '31', 'sim', 'item', '82'),
(627, '24', '29', '31', 'sim', 'item', '82'),
(628, '25', '29', '31', 'sim', 'item', '82'),
(629, '26', '29', '31', 'sim', 'item', '82'),
(630, '27', '29', '31', 'sim', 'item', '82'),
(631, '1', '29', '31', 'sim', 'subitem', '82'),
(632, '2', '29', '31', 'sim', 'subitem', '82'),
(633, '3', '29', '31', 'sim', 'subitem', '82'),
(634, '4', '29', '31', 'sim', 'subitem', '82'),
(635, '5', '29', '31', 'sim', 'subitem', '82'),
(636, '6', '29', '31', 'sim', 'subitem', '82'),
(637, '7', '29', '31', 'sim', 'subitem', '82'),
(638, '8', '29', '31', 'sim', 'subitem', '82'),
(639, '1', '29', '34', 'sim', 'item', '85'),
(640, '2', '29', '34', 'sim', 'item', '85'),
(641, '3', '29', '34', 'sim', 'item', '85'),
(642, '4', '29', '34', 'sim', 'item', '85'),
(643, '5', '29', '34', 'sim', 'item', '85'),
(644, '6', '29', '34', 'sim', 'item', '85'),
(645, '7', '29', '34', 'sim', 'item', '85'),
(646, '8', '29', '34', 'sim', 'item', '85'),
(647, '9', '29', '34', 'sim', 'item', '85'),
(648, '10', '29', '34', 'sim', 'item', '85'),
(649, '11', '29', '34', 'sim', 'item', '85'),
(650, '12', '29', '34', 'sim', 'item', '85'),
(651, '13', '29', '34', 'sim', 'item', '85'),
(652, '14', '29', '34', 'sim', 'item', '85'),
(653, '15', '29', '34', 'sim', 'item', '85'),
(654, '16', '29', '34', 'sim', 'item', '85'),
(655, '17', '29', '34', 'sim', 'item', '85'),
(656, '18', '29', '34', 'sim', 'item', '85'),
(657, '19', '29', '34', 'sim', 'item', '85'),
(658, '20', '29', '34', 'sim', 'item', '85'),
(659, '21', '29', '34', 'sim', 'item', '85'),
(660, '22', '29', '34', 'sim', 'item', '85'),
(661, '23', '29', '34', 'sim', 'item', '85'),
(662, '24', '29', '34', 'sim', 'item', '85'),
(663, '25', '29', '34', 'sim', 'item', '85'),
(664, '26', '29', '34', 'sim', 'item', '85'),
(665, '27', '29', '34', 'sim', 'item', '85'),
(666, '1', '29', '34', 'sim', 'subitem', '85'),
(667, '2', '29', '34', 'sim', 'subitem', '85'),
(668, '3', '29', '34', 'sim', 'subitem', '85'),
(669, '4', '29', '34', 'sim', 'subitem', '85'),
(670, '5', '29', '34', 'sim', 'subitem', '85'),
(671, '6', '29', '34', 'sim', 'subitem', '85'),
(672, '7', '29', '34', 'sim', 'subitem', '85'),
(673, '8', '29', '34', 'sim', 'subitem', '85'),
(674, '1', '29', '35', 'sim', 'item', '86'),
(675, '2', '29', '35', 'sim', 'item', '86'),
(676, '3', '29', '35', 'sim', 'item', '86'),
(677, '4', '29', '35', 'sim', 'item', '86'),
(678, '5', '29', '35', 'sim', 'item', '86'),
(679, '6', '29', '35', 'sim', 'item', '86'),
(680, '7', '29', '35', 'sim', 'item', '86'),
(681, '8', '29', '35', 'sim', 'item', '86'),
(682, '9', '29', '35', 'sim', 'item', '86'),
(683, '10', '29', '35', 'sim', 'item', '86'),
(684, '11', '29', '35', 'sim', 'item', '86'),
(685, '12', '29', '35', 'sim', 'item', '86'),
(686, '13', '29', '35', 'sim', 'item', '86'),
(687, '14', '29', '35', 'sim', 'item', '86'),
(688, '15', '29', '35', 'sim', 'item', '86'),
(689, '16', '29', '35', 'sim', 'item', '86'),
(690, '17', '29', '35', 'sim', 'item', '86'),
(691, '18', '29', '35', 'sim', 'item', '86'),
(692, '19', '29', '35', 'sim', 'item', '86'),
(693, '20', '29', '35', 'sim', 'item', '86'),
(694, '21', '29', '35', 'sim', 'item', '86'),
(695, '22', '29', '35', 'sim', 'item', '86'),
(696, '23', '29', '35', 'sim', 'item', '86'),
(697, '24', '29', '35', 'sim', 'item', '86'),
(698, '25', '29', '35', 'sim', 'item', '86'),
(699, '26', '29', '35', 'sim', 'item', '86'),
(700, '27', '29', '35', 'sim', 'item', '86'),
(701, '1', '29', '35', 'sim', 'subitem', '86'),
(702, '2', '29', '35', 'sim', 'subitem', '86'),
(703, '3', '29', '35', 'sim', 'subitem', '86'),
(704, '4', '29', '35', 'sim', 'subitem', '86'),
(705, '5', '29', '35', 'sim', 'subitem', '86'),
(706, '6', '29', '35', 'sim', 'subitem', '86'),
(707, '7', '29', '35', 'sim', 'subitem', '86'),
(708, '8', '29', '35', 'sim', 'subitem', '86'),
(709, '1', '29', '44', 'sim', 'item', '93'),
(710, '2', '29', '44', 'sim', 'item', '93'),
(711, '3', '29', '44', 'sim', 'item', '93'),
(712, '4', '29', '44', 'sim', 'item', '93'),
(713, '5', '29', '44', 'sim', 'item', '93'),
(714, '6', '29', '44', 'sim', 'item', '93'),
(715, '7', '29', '44', 'sim', 'item', '93'),
(716, '8', '29', '44', 'sim', 'item', '93'),
(717, '9', '29', '44', 'sim', 'item', '93'),
(718, '10', '29', '44', 'sim', 'item', '93'),
(719, '11', '29', '44', 'sim', 'item', '93'),
(720, '12', '29', '44', 'sim', 'item', '93'),
(721, '13', '29', '44', 'sim', 'item', '93'),
(722, '14', '29', '44', 'sim', 'item', '93'),
(723, '15', '29', '44', 'sim', 'item', '93'),
(724, '16', '29', '44', 'sim', 'item', '93'),
(725, '17', '29', '44', 'sim', 'item', '93'),
(726, '18', '29', '44', 'sim', 'item', '93'),
(727, '19', '29', '44', 'sim', 'item', '93'),
(728, '20', '29', '44', 'sim', 'item', '93'),
(729, '21', '29', '44', 'sim', 'item', '93'),
(730, '22', '29', '44', 'sim', 'item', '93'),
(731, '23', '29', '44', 'sim', 'item', '93'),
(732, '24', '29', '44', 'sim', 'item', '93'),
(733, '25', '29', '44', 'sim', 'item', '93'),
(734, '26', '29', '44', 'sim', 'item', '93'),
(735, '27', '29', '44', 'sim', 'item', '93'),
(736, '1', '29', '44', 'sim', 'subitem', '93'),
(737, '2', '29', '44', 'sim', 'subitem', '93'),
(738, '3', '29', '44', 'sim', 'subitem', '93'),
(739, '4', '29', '44', 'sim', 'subitem', '93'),
(740, '5', '29', '44', 'sim', 'subitem', '93'),
(741, '6', '29', '44', 'sim', 'subitem', '93'),
(742, '7', '29', '44', 'sim', 'subitem', '93'),
(743, '8', '29', '44', 'sim', 'subitem', '93');

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
  `cloneid` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL
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

--
-- Dumping data for table `extra_item_subitem_grades`
--

INSERT INTO `extra_item_subitem_grades` (`id`, `user_id`, `item_id`, `grade`, `date`, `type`) VALUES
(1, '29', '8', 'E', '2023-09-08 10:54:08', 'item'),
(2, '29', '9', 'E', '2023-09-08 10:54:08', 'item'),
(3, '29', '10', 'F', '2023-09-08 10:54:08', 'item'),
(4, '29', '11', 'V', '2023-09-08 10:54:08', 'item'),
(5, '29', '12', 'E', '2023-09-08 10:54:08', 'item'),
(6, '29', '13', 'G', '2023-09-08 10:54:08', 'item'),
(7, '29', '14', 'V', '2023-09-08 10:54:08', 'item'),
(8, '29', '15', 'E', '2023-09-08 10:54:08', 'item'),
(9, '29', '16', 'V', '2023-09-08 10:54:08', 'item'),
(10, '29', '17', 'V', '2023-09-08 10:54:08', 'item'),
(11, '29', '18', 'G', '2023-09-08 10:54:08', 'item'),
(12, '29', '19', 'E', '2023-09-08 10:54:08', 'item'),
(13, '29', '20', 'G', '2023-09-08 10:54:08', 'item'),
(14, '29', '21', 'N', '2023-09-08 10:54:08', 'item'),
(15, '29', '22', 'V', '2023-09-08 10:54:08', 'item'),
(16, '29', '23', 'E', '2023-09-08 10:54:08', 'item'),
(17, '29', '24', 'V', '2023-09-08 10:54:08', 'item'),
(18, '29', '25', 'E', '2023-09-08 10:54:08', 'item'),
(19, '29', '26', 'V', '2023-09-08 10:54:08', 'item'),
(20, '29', '27', 'E', '2023-09-08 10:54:08', 'item'),
(21, '29', '1', 'E', '2023-09-08 10:54:08', 'subitem'),
(22, '29', '4', 'N', '2023-09-08 10:54:08', 'subitem'),
(23, '29', '7', 'E', '2023-09-08 10:54:08', 'subitem'),
(24, '29', '8', 'E', '2023-09-08 10:54:08', 'subitem'),
(25, '29', '1', 'V', '2023-09-13 14:59:06', 'item'),
(26, '29', '2', 'F', '2023-09-13 14:59:06', 'item'),
(27, '29', '3', 'U', '2023-09-13 14:59:06', 'item'),
(28, '29', '5', 'F', '2023-09-13 15:01:23', 'item'),
(29, '29', '6', 'E', '2023-09-13 15:01:23', 'item'),
(30, '29', '7', 'E', '2023-09-13 15:01:23', 'item'),
(31, '29', '4', 'E', '2023-09-14 11:01:11', 'item'),
(32, '29', '2', '', '2023-09-14 11:16:10', 'subitem'),
(33, '29', '3', '', '2023-09-14 11:16:11', 'subitem'),
(34, '29', '5', '', '2023-09-14 11:16:11', 'subitem'),
(35, '29', '6', '', '2023-09-14 11:16:11', 'subitem');

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
(3, '#007bff', '1', 'user', '11'),
(4, '#dc3545', '5', 'user', '11'),
(5, '#28a745', '5', 'user', '11'),
(6, '#ffc107', '5', 'user', '11'),
(7, '#dc3545', '17', 'user', '11'),
(8, '#28a745', '17', 'user', '11'),
(9, '#ffc107', '17', 'user', '11'),
(10, '#dc3545', '35', 'user', '11'),
(11, '#28a745', '35', 'user', '11'),
(12, '#ffc107', '35', 'user', '11');

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
(4, '33', '11', 'Everyone', 'blue', 'readOnly', NULL),
(5, '34', '11', 'Everyone', 'blue', 'readOnly', NULL),
(6, '35', '11', 'Everyone', 'blue', 'readOnly', NULL);

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
  `content` longblob DEFAULT NULL,
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
  `type_menu` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_menu_name`
--

INSERT INTO `file_menu_name` (`id`, `menu_name`, `type_menu`, `color`) VALUES
(4, 'Mega Menu1', 'megmenu', NULL),
(8, 'Menu', 'menu', NULL),
(9, 'Menu123', 'menu', ''),
(10, 'Menu1180000', 'menu', ''),
(11, 'menucheck', 'menu', '#fd1717'),
(12, 'megacheck', 'megmenu', '#27e10e');

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
-- Table structure for table `frame_cert`
--

CREATE TABLE `frame_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `image_height` varchar(255) DEFAULT NULL,
  `image_width` varchar(255) DEFAULT NULL,
  `border_radius` varchar(255) DEFAULT NULL,
  `border` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frame_cert`
--

INSERT INTO `frame_cert` (`id`, `cert_id`, `image_height`, `image_width`, `border_radius`, `border`, `border_color`, `file_name`, `status`) VALUES
(1, '2', '800', '1300', '0', '1', '#000000', 'frame.png', '1'),
(2, '4', '800', '1300', '0', '0', '#000000', 'frame1.jpg', '1'),
(3, '5', '800', '1300', '0', '0', '#000000', 'frame1.jpg', '1');

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
(12, '12', 'fcfcerfrcf', '16', '2023-08-21', '08:04:45'),
(13, '12', 'e5y5', '22', '2023-08-22', '13:42:44'),
(14, '12', 'dff', '23', '2023-08-22', '14:30:00'),
(15, '12', 'dvd', '16', '2023-09-08', '07:22:21'),
(16, '12', 'aefwrgre', '30', '2023-09-14', '07:31:56'),
(17, '12', 'sfbvdfgdh', '30', '2023-09-14', '07:34:00'),
(18, '12', 'gfbrthrnjtu', '16', '2023-09-14', '07:38:55'),
(19, '12', 'zdvsdggrger', '32', '2023-09-14', '07:45:09'),
(20, '12', 'fgbfgh', '22', '2023-09-14', '07:47:07');

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
(1, '29', '1', '1', '2', 'actual', '12', '1', '20:20', '2023-10-05', '', '', 'V', '87', ' dffvevef', '\r\n                          ', '2', '1', '2023-10-05 20:20:06.000000'),
(2, '29', '1', '1', '1', 'actual', '12', '1', '20:47', '2023-10-06', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-05 20:47:25.000000'),
(3, '29', '1', '1', '8', 'actual', '12', '1', '20:48', '2023-10-06', '', '', 'F', '87', ' nvhmhjch', '\r\n                          ', '1', '1', '2023-10-05 20:48:46.000000'),
(4, '34', '1', '1', '8', 'actual', '12', '1', '20:53', '2023-10-05', '', '', 'U', '87', ' kbjhvjvhmch', '\r\n                          ', '2', '1', '2023-10-05 20:53:44.000000');

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
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(14, '29', '4', 'actual', '6', '0'),
(15, '29', '4', 'sim', '1', '0'),
(16, '29', '4', 'sim', '2', '0'),
(17, '29', '4', 'sim', '3', '0'),
(18, '29', '4', 'sim', '4', '0'),
(19, '29', '36', 'actual', '1', '3'),
(20, '29', '36', 'actual', '2', '4'),
(21, '29', '36', 'actual', '3', '2'),
(22, '29', '8', 'sim', '1', '2'),
(23, '29', '8', 'sim', '2', '2'),
(24, '29', '8', 'sim', '3', '2'),
(25, '29', '8', 'sim', '4', '2'),
(26, '34', '8', 'actual', '1', '0'),
(27, '34', '8', 'actual', '2', '0');

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
(8, '29', '8', 'actual', '2', '0', '1'),
(9, '29', '4', 'actual', '1', '0', '1'),
(10, '29', '4', 'actual', '2', '0', '1'),
(11, '29', '4', 'actual', '3', '0', '1'),
(12, '29', '4', 'actual', '4', '0', '1'),
(13, '29', '4', 'actual', '5', '0', '1'),
(14, '29', '4', 'actual', '6', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groupchats`
--

CREATE TABLE `groupchats` (
  `id` int(11) NOT NULL,
  `senderId` varchar(255) DEFAULT NULL,
  `groupId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `msgEdit` varchar(255) DEFAULT NULL,
  `deleteStatus` varchar(255) DEFAULT NULL,
  `replyMsg` varchar(255) DEFAULT NULL,
  `replyStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupchats`
--

INSERT INTO `groupchats` (`id`, `senderId`, `groupId`, `userId`, `messages`, `lastName`, `fileType`, `date`, `msgEdit`, `deleteStatus`, `replyMsg`, `replyStatus`) VALUES
(1, '11', '1', NULL, 'www.google.com', 'www.google', 'offline', '2023-10-16 12:51:48', NULL, NULL, NULL, NULL),
(2, '11', '1', NULL, 'D:\\xampp\\htdocs', 'D:xampph', 'online', '2023-10-16 12:52:15', NULL, NULL, NULL, NULL),
(3, '11', '1', NULL, 'D:\\xampp\\htdocs', 'D:xampph', 'online', '2023-10-16 12:58:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupdeleteforme`
--

CREATE TABLE `groupdeleteforme` (
  `id` int(11) NOT NULL,
  `msgId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `id` int(11) NOT NULL,
  `groupId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `createdAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupmember`
--

INSERT INTO `groupmember` (`id`, `groupId`, `userId`, `type`, `createdAt`) VALUES
(1, '1', '11', 'admin', '2023-10-16'),
(2, '1', '12', 'member', '2023-10-16'),
(3, '1', '13', 'member', '2023-10-16'),
(4, '1', '14', 'member', '2023-10-16'),
(5, '1', '15', 'member', '2023-10-16'),
(6, '1', '16', 'member', '2023-10-16'),
(7, '1', '17', 'member', '2023-10-16'),
(8, '1', '18', 'member', '2023-10-16'),
(9, '1', '19', 'member', '2023-10-16'),
(10, '1', '20', 'member', '2023-10-16'),
(11, '1', '21', 'member', '2023-10-16'),
(14, '2', '11', 'admin', '2023-10-16'),
(15, '2', '13', 'member', '2023-10-16'),
(16, '2', '14', 'member', '2023-10-16'),
(17, '2', '15', 'member', '2023-10-16');

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
(8, '8', '1', '1', 'actual', '2'),
(9, '4', '1', '1', 'sim', '1'),
(10, '4', '1', '1', 'sim', '2'),
(11, '4', '1', '1', 'sim', '3'),
(12, '4', '1', '1', 'sim', '4'),
(13, '8', '3', '1', 'sim', '1'),
(14, '8', '3', '1', 'sim', '2'),
(15, '8', '3', '1', 'sim', '3'),
(16, '8', '3', '1', 'sim', '4'),
(17, '7', '3', '1', 'actual', '1'),
(18, '7', '3', '1', 'actual', '2'),
(19, '35', '3', '1', 'actual', '2'),
(20, '35', '3', '1', 'actual', '3'),
(21, '35', '3', '1', 'actual', '4'),
(22, '36', '3', '1', 'actual', '1'),
(23, '36', '3', '1', 'actual', '2'),
(24, '36', '3', '1', 'actual', '3');

-- --------------------------------------------------------

--
-- Table structure for table `heading_cert`
--

CREATE TABLE `heading_cert` (
  `cert_id` varchar(255) NOT NULL,
  `headings_name` varchar(255) NOT NULL,
  `font_size_height` varchar(255) DEFAULT NULL,
  `heading_text_value` varchar(255) DEFAULT NULL,
  `headings_style` varchar(255) NOT NULL,
  `heading_backgoround` varchar(255) NOT NULL,
  `heading_text` varchar(255) NOT NULL,
  `text_type_heading` varchar(255) NOT NULL,
  `font_family` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heading_cert`
--

INSERT INTO `heading_cert` (`cert_id`, `headings_name`, `font_size_height`, `heading_text_value`, `headings_style`, `heading_backgoround`, `heading_text`, `text_type_heading`, `font_family`, `id`, `status`) VALUES
('2', '0', '50', 'Certifcates of student', 'h1', '#f28307', '#0d1d40', '', 'Comic Sans MS', 5, '1'),
('2', '2', '30', '', 'h4', '#ffffff', '#00ffb3', '', 'New Century Schoolbook', 6, '1'),
('4', '0', '70', 'CERTIFICATE', 'h1', '#fcfcfc', '#0d1d40', 'Bold', 'Times New Roman', 7, '1'),
('4', '0', '20', 'Of Achievement', 'h3', '#ffffff', '#0d1a40', 'Bold', 'Times New Roman', 8, '1'),
('4', '2', '50', '', 'h1', '#fffafa', '#0d1d40', 'italic', 'Comic Sans MS', 10, '1'),
('4', '0', '25', 'DATE', 'h3', '#fffafa', '#0d1840', 'Bold', 'Big Caslon', 11, '1'),
('4', '0', '20', 'SIGNATURE', 'h3', '#fffafa', '#0d1840', '', 'Big Caslon', 12, '1'),
('5', '0', '60', 'CERTIFICATE', 'h1', '#ffffff', '#d81313', 'italic', 'Comic Sans MS', 13, '1'),
('', '3', '50', '', 'h1', '#ffffff', '#000000', '', 'JasmineUPC', 36, '0'),
('9', '3', '50', '', 'h1', '#ffffff', '#fd0808', '', 'JasmineUPC', 37, '1');

-- --------------------------------------------------------

--
-- Table structure for table `holydays`
--

CREATE TABLE `holydays` (
  `id` int(11) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `holyDayName` varchar(255) DEFAULT NULL,
  `departMentId` varchar(255) DEFAULT NULL,
  `leaveType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holydays`
--

INSERT INTO `holydays` (`id`, `startDate`, `endDate`, `holyDayName`, `departMentId`, `leaveType`) VALUES
(1, '2023-09-13', '2023-09-15', 'ganpati', '1', 'planned');

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
-- Table structure for table `horizontal_cert`
--

CREATE TABLE `horizontal_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `widht` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horizontal_cert`
--

INSERT INTO `horizontal_cert` (`id`, `cert_id`, `widht`, `border_color`, `status`) VALUES
(1, '4', '100', '#0d1d40', '1'),
(2, '4', '100', '#0d1d40', '1'),
(3, '4', '200', '#0d1845', '1'),
(4, '4', '200', '#0d1845', '1'),
(5, '5', '120', '#000000', '1'),
(8, '9', '1000', '#000000', '1'),
(9, '7', '60', '#000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `image_cert`
--

CREATE TABLE `image_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) NOT NULL,
  `image_of_image` varchar(255) NOT NULL,
  `image_width` varchar(255) NOT NULL,
  `image_height` varchar(255) NOT NULL,
  `border_radius` varchar(255) NOT NULL,
  `border` varchar(255) NOT NULL,
  `border_color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_cert`
--

INSERT INTO `image_cert` (`id`, `cert_id`, `image_of_image`, `image_width`, `image_height`, `border_radius`, `border`, `border_color`, `status`) VALUES
(1, '2', '1', '100', '100', '50', '9', '#000000', '1');

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
(26, '1', '1', '2', '1', 'actual', '1'),
(27, '1', '2', '3', '1', 'sim', NULL),
(28, '2', '2', '3', '1', 'sim', NULL),
(29, '3', '2', '3', '1', 'sim', NULL),
(30, '1', '2', '2', '1', 'sim', NULL),
(31, '2', '2', '2', '1', 'sim', NULL),
(32, '3', '2', '2', '1', 'sim', NULL),
(33, '4', '2', '2', '1', 'sim', NULL),
(34, '1', '1', '4', '1', 'sim', NULL),
(35, '2', '1', '4', '1', 'sim', NULL),
(36, '3', '1', '4', '1', 'sim', NULL),
(37, '4', '1', '4', '1', 'sim', NULL),
(38, '3', '1', '1', '1', 'actual', NULL),
(39, '4', '1', '1', '1', 'actual', NULL),
(40, '6', '1', '1', '1', 'actual', NULL),
(41, '7', '1', '1', '1', 'actual', NULL),
(42, '8', '1', '1', '1', 'actual', NULL),
(43, '1', '1', '8', '3', 'sim', NULL),
(44, '2', '1', '8', '3', 'sim', NULL),
(45, '3', '1', '8', '3', 'sim', NULL),
(46, '4', '1', '8', '3', 'sim', NULL),
(47, '5', '1', '8', '3', 'sim', NULL),
(48, '1', '1', '7', '3', 'actual', NULL),
(49, '2', '1', '7', '3', 'actual', NULL),
(50, '3', '1', '7', '3', 'actual', NULL),
(51, '4', '1', '7', '3', 'actual', NULL),
(52, '1', '1', '44', '7', 'actual', NULL),
(53, '2', '1', '44', '7', 'actual', NULL),
(54, '3', '1', '44', '7', 'actual', NULL),
(55, '4', '1', '44', '7', 'actual', NULL),
(56, '5', '1', '44', '7', 'actual', NULL),
(57, '6', '1', '44', '7', 'actual', NULL),
(58, '1', '1', '45', '7', 'actual', NULL),
(59, '2', '1', '45', '7', 'actual', NULL),
(60, '3', '1', '45', '7', 'actual', NULL),
(61, '4', '1', '45', '7', 'actual', NULL),
(62, '6', '1', '45', '7', 'actual', NULL),
(63, '1', '1', '46', '7', 'actual', NULL),
(64, '2', '1', '46', '7', 'actual', NULL),
(65, '4', '1', '46', '7', 'actual', NULL),
(66, '5', '1', '46', '7', 'actual', NULL),
(67, '7', '1', '46', '7', 'actual', NULL),
(68, '9', '1', '46', '7', 'actual', NULL),
(69, '1', '1', '47', '7', 'actual', NULL),
(70, '2', '1', '47', '7', 'actual', NULL),
(71, '3', '1', '47', '7', 'actual', NULL),
(72, '4', '1', '47', '7', 'actual', NULL),
(73, '1', '1', '48', '7', 'actual', NULL),
(74, '2', '1', '48', '7', 'actual', NULL),
(75, '3', '1', '48', '7', 'actual', NULL),
(76, '4', '1', '48', '7', 'actual', NULL),
(77, '5', '1', '48', '7', 'actual', NULL),
(78, '1', '1', '49', '7', 'actual', NULL),
(79, '2', '1', '49', '7', 'actual', NULL),
(80, '3', '1', '49', '7', 'actual', NULL),
(81, '4', '1', '49', '7', 'actual', NULL),
(82, '5', '1', '49', '7', 'actual', NULL),
(83, '6', '1', '49', '7', 'actual', NULL),
(84, '1', '1', '50', '7', 'actual', NULL),
(85, '2', '1', '50', '7', 'actual', NULL),
(86, '3', '1', '50', '7', 'actual', NULL),
(87, '4', '1', '50', '7', 'actual', NULL),
(88, '5', '1', '50', '7', 'actual', NULL),
(89, '6', '1', '50', '7', 'actual', NULL),
(90, '7', '1', '50', '7', 'actual', NULL),
(91, '8', '1', '50', '7', 'actual', NULL),
(92, '9', '1', '50', '7', 'actual', NULL),
(93, '10', '1', '50', '7', 'actual', NULL),
(94, '11', '1', '50', '7', 'actual', NULL),
(95, '12', '1', '50', '7', 'actual', NULL),
(96, '13', '1', '50', '7', 'actual', NULL),
(97, '14', '1', '50', '7', 'actual', NULL),
(98, '15', '1', '50', '7', 'actual', NULL),
(99, '16', '1', '50', '7', 'actual', NULL),
(100, '17', '1', '50', '7', 'actual', NULL),
(101, '18', '1', '50', '7', 'actual', NULL),
(102, '19', '1', '50', '7', 'actual', NULL),
(103, '20', '1', '50', '7', 'actual', NULL),
(104, '21', '1', '50', '7', 'actual', NULL),
(105, '22', '1', '50', '7', 'actual', NULL),
(106, '23', '1', '50', '7', 'actual', NULL),
(107, '24', '1', '50', '7', 'actual', NULL),
(108, '25', '1', '50', '7', 'actual', NULL),
(109, '26', '1', '50', '7', 'actual', NULL),
(110, '27', '1', '50', '7', 'actual', NULL),
(111, '1', '1', '51', '7', 'actual', NULL),
(112, '2', '1', '51', '7', 'actual', NULL),
(113, '3', '1', '51', '7', 'actual', NULL),
(114, '4', '1', '51', '7', 'actual', NULL),
(115, '5', '1', '51', '7', 'actual', NULL),
(116, '6', '1', '51', '7', 'actual', NULL),
(117, '7', '1', '51', '7', 'actual', NULL),
(118, '8', '1', '51', '7', 'actual', NULL),
(119, '9', '1', '51', '7', 'actual', NULL),
(120, '10', '1', '51', '7', 'actual', NULL),
(121, '11', '1', '51', '7', 'actual', NULL),
(122, '12', '1', '51', '7', 'actual', NULL),
(123, '13', '1', '51', '7', 'actual', NULL),
(124, '14', '1', '51', '7', 'actual', NULL),
(125, '15', '1', '51', '7', 'actual', NULL),
(126, '16', '1', '51', '7', 'actual', NULL),
(127, '17', '1', '51', '7', 'actual', NULL),
(128, '18', '1', '51', '7', 'actual', NULL),
(129, '19', '1', '51', '7', 'actual', NULL),
(130, '20', '1', '51', '7', 'actual', NULL),
(131, '21', '1', '51', '7', 'actual', NULL),
(132, '22', '1', '51', '7', 'actual', NULL),
(133, '23', '1', '51', '7', 'actual', NULL),
(134, '24', '1', '51', '7', 'actual', NULL),
(135, '25', '1', '51', '7', 'actual', NULL),
(136, '26', '1', '51', '7', 'actual', NULL),
(137, '27', '1', '51', '7', 'actual', NULL),
(138, '1', '1', '52', '7', 'actual', NULL),
(139, '2', '1', '52', '7', 'actual', NULL),
(140, '3', '1', '52', '7', 'actual', NULL),
(141, '4', '1', '52', '7', 'actual', NULL),
(142, '5', '1', '52', '7', 'actual', NULL),
(143, '6', '1', '52', '7', 'actual', NULL),
(144, '7', '1', '52', '7', 'actual', NULL),
(145, '8', '1', '52', '7', 'actual', NULL),
(146, '9', '1', '52', '7', 'actual', NULL),
(147, '10', '1', '52', '7', 'actual', NULL),
(148, '11', '1', '52', '7', 'actual', NULL),
(149, '12', '1', '52', '7', 'actual', NULL),
(150, '13', '1', '52', '7', 'actual', NULL),
(151, '14', '1', '52', '7', 'actual', NULL),
(152, '15', '1', '52', '7', 'actual', NULL),
(153, '16', '1', '52', '7', 'actual', NULL),
(154, '17', '1', '52', '7', 'actual', NULL),
(155, '18', '1', '52', '7', 'actual', NULL),
(156, '19', '1', '52', '7', 'actual', NULL),
(157, '20', '1', '52', '7', 'actual', NULL),
(158, '21', '1', '52', '7', 'actual', NULL),
(159, '22', '1', '52', '7', 'actual', NULL),
(160, '23', '1', '52', '7', 'actual', NULL),
(161, '24', '1', '52', '7', 'actual', NULL),
(162, '25', '1', '52', '7', 'actual', NULL),
(163, '26', '1', '52', '7', 'actual', NULL),
(164, '27', '1', '52', '7', 'actual', NULL),
(165, '2', '1', '53', '8', 'actual', NULL),
(166, '3', '1', '53', '8', 'actual', NULL),
(167, '4', '1', '53', '8', 'actual', NULL),
(168, '5', '1', '53', '8', 'actual', NULL),
(169, '6', '1', '53', '8', 'actual', NULL),
(170, '7', '1', '53', '8', 'actual', NULL),
(171, '1', '1', '54', '8', 'actual', NULL),
(172, '2', '1', '54', '8', 'actual', NULL),
(173, '3', '1', '54', '8', 'actual', NULL),
(174, '4', '1', '54', '8', 'actual', NULL),
(175, '5', '1', '54', '8', 'actual', NULL),
(176, '6', '1', '54', '8', 'actual', NULL),
(177, '7', '1', '54', '8', 'actual', NULL),
(178, '8', '1', '54', '8', 'actual', NULL),
(179, '9', '1', '54', '8', 'actual', NULL),
(180, '10', '1', '54', '8', 'actual', NULL),
(181, '11', '1', '54', '8', 'actual', NULL),
(182, '12', '1', '54', '8', 'actual', NULL),
(183, '13', '1', '54', '8', 'actual', NULL),
(184, '14', '1', '54', '8', 'actual', NULL),
(185, '15', '1', '54', '8', 'actual', NULL),
(186, '16', '1', '54', '8', 'actual', NULL),
(187, '17', '1', '54', '8', 'actual', NULL),
(188, '18', '1', '54', '8', 'actual', NULL),
(189, '19', '1', '54', '8', 'actual', NULL),
(190, '20', '1', '54', '8', 'actual', NULL),
(191, '21', '1', '54', '8', 'actual', NULL),
(192, '22', '1', '54', '8', 'actual', NULL),
(193, '23', '1', '54', '8', 'actual', NULL),
(194, '24', '1', '54', '8', 'actual', NULL),
(195, '25', '1', '54', '8', 'actual', NULL),
(196, '26', '1', '54', '8', 'actual', NULL),
(197, '27', '1', '54', '8', 'actual', NULL),
(198, '2', '1', '55', '8', 'actual', NULL),
(199, '3', '1', '55', '8', 'actual', NULL),
(200, '4', '1', '55', '8', 'actual', NULL),
(201, '5', '1', '55', '8', 'actual', NULL),
(202, '6', '1', '55', '8', 'actual', NULL),
(203, '7', '1', '55', '8', 'actual', NULL),
(204, '1', '1', '57', '8', 'actual', NULL),
(205, '2', '1', '57', '8', 'actual', NULL),
(206, '3', '1', '57', '8', 'actual', NULL),
(207, '4', '1', '57', '8', 'actual', NULL),
(208, '5', '1', '57', '8', 'actual', NULL),
(209, '1', '1', '58', '8', 'actual', NULL),
(210, '2', '1', '58', '8', 'actual', NULL),
(211, '3', '1', '58', '8', 'actual', NULL),
(212, '4', '1', '58', '8', 'actual', NULL),
(213, '5', '1', '58', '8', 'actual', NULL),
(214, '6', '1', '58', '8', 'actual', NULL),
(215, '2', '1', '47', '7', 'sim', NULL),
(216, '3', '1', '47', '7', 'sim', NULL),
(217, '4', '1', '47', '7', 'sim', NULL),
(218, '5', '1', '47', '7', 'sim', NULL),
(219, '3', '1', '48', '7', 'sim', NULL),
(220, '4', '1', '48', '7', 'sim', NULL),
(221, '5', '1', '48', '7', 'sim', NULL),
(222, '6', '1', '48', '7', 'sim', NULL),
(223, '7', '1', '48', '7', 'sim', NULL),
(224, '8', '1', '48', '7', 'sim', NULL),
(225, '1', '1', '49', '7', 'sim', NULL),
(226, '2', '1', '49', '7', 'sim', NULL),
(227, '3', '1', '49', '7', 'sim', NULL),
(228, '4', '1', '49', '7', 'sim', NULL),
(229, '5', '1', '49', '7', 'sim', NULL),
(230, '6', '1', '49', '7', 'sim', NULL),
(231, '7', '1', '49', '7', 'sim', NULL),
(232, '8', '1', '49', '7', 'sim', NULL),
(233, '1', '1', '50', '7', 'sim', NULL),
(234, '2', '1', '50', '7', 'sim', NULL),
(235, '3', '1', '50', '7', 'sim', NULL),
(236, '4', '1', '50', '7', 'sim', NULL),
(237, '5', '1', '50', '7', 'sim', NULL),
(238, '6', '1', '50', '7', 'sim', NULL),
(239, '7', '1', '50', '7', 'sim', NULL),
(240, '8', '1', '50', '7', 'sim', NULL),
(241, '9', '1', '50', '7', 'sim', NULL),
(242, '10', '1', '50', '7', 'sim', NULL),
(243, '11', '1', '50', '7', 'sim', NULL),
(244, '12', '1', '50', '7', 'sim', NULL),
(245, '13', '1', '50', '7', 'sim', NULL),
(246, '14', '1', '50', '7', 'sim', NULL),
(247, '15', '1', '50', '7', 'sim', NULL),
(248, '16', '1', '50', '7', 'sim', NULL),
(249, '17', '1', '50', '7', 'sim', NULL),
(250, '18', '1', '50', '7', 'sim', NULL),
(251, '19', '1', '50', '7', 'sim', NULL),
(252, '20', '1', '50', '7', 'sim', NULL),
(253, '21', '1', '50', '7', 'sim', NULL),
(254, '22', '1', '50', '7', 'sim', NULL),
(255, '23', '1', '50', '7', 'sim', NULL),
(256, '24', '1', '50', '7', 'sim', NULL),
(257, '25', '1', '50', '7', 'sim', NULL),
(258, '26', '1', '50', '7', 'sim', NULL),
(259, '27', '1', '50', '7', 'sim', NULL),
(260, '1', '1', '51', '7', 'sim', NULL),
(261, '2', '1', '51', '7', 'sim', NULL),
(262, '3', '1', '51', '7', 'sim', NULL),
(263, '4', '1', '51', '7', 'sim', NULL),
(264, '5', '1', '51', '7', 'sim', NULL),
(265, '6', '1', '51', '7', 'sim', NULL),
(266, '7', '1', '51', '7', 'sim', NULL),
(267, '8', '1', '51', '7', 'sim', NULL),
(268, '9', '1', '51', '7', 'sim', NULL),
(269, '10', '1', '51', '7', 'sim', NULL),
(270, '11', '1', '51', '7', 'sim', NULL),
(271, '12', '1', '51', '7', 'sim', NULL),
(272, '13', '1', '51', '7', 'sim', NULL),
(273, '14', '1', '51', '7', 'sim', NULL),
(274, '15', '1', '51', '7', 'sim', NULL),
(275, '16', '1', '51', '7', 'sim', NULL),
(276, '17', '1', '51', '7', 'sim', NULL),
(277, '18', '1', '51', '7', 'sim', NULL),
(278, '19', '1', '51', '7', 'sim', NULL),
(279, '20', '1', '51', '7', 'sim', NULL),
(280, '21', '1', '51', '7', 'sim', NULL),
(281, '22', '1', '51', '7', 'sim', NULL),
(282, '23', '1', '51', '7', 'sim', NULL),
(283, '24', '1', '51', '7', 'sim', NULL),
(284, '25', '1', '51', '7', 'sim', NULL),
(285, '26', '1', '51', '7', 'sim', NULL),
(286, '27', '1', '51', '7', 'sim', NULL),
(287, '1', '1', '59', '9', 'actual', NULL),
(288, '2', '1', '59', '9', 'actual', NULL),
(289, '3', '1', '59', '9', 'actual', NULL),
(290, '4', '1', '59', '9', 'actual', NULL),
(291, '5', '1', '59', '9', 'actual', NULL),
(292, '2', '1', '60', '9', 'actual', NULL),
(293, '3', '1', '60', '9', 'actual', NULL),
(294, '7', '1', '60', '9', 'actual', NULL),
(295, '8', '1', '60', '9', 'actual', NULL),
(296, '14', '1', '60', '9', 'actual', NULL),
(297, '15', '1', '60', '9', 'actual', NULL),
(298, '16', '1', '60', '9', 'actual', NULL),
(299, '17', '1', '60', '9', 'actual', NULL),
(300, '18', '1', '60', '9', 'actual', NULL),
(301, '20', '1', '61', '9', 'actual', NULL),
(302, '21', '1', '61', '9', 'actual', NULL),
(303, '22', '1', '61', '9', 'actual', NULL),
(304, '23', '1', '61', '9', 'actual', NULL),
(305, '24', '1', '61', '9', 'actual', NULL),
(306, '25', '1', '61', '9', 'actual', NULL),
(307, '26', '1', '61', '9', 'actual', NULL),
(308, '27', '1', '61', '9', 'actual', NULL),
(309, '1', '1', '63', '9', 'actual', NULL),
(310, '2', '1', '63', '9', 'actual', NULL),
(311, '3', '1', '63', '9', 'actual', NULL),
(312, '4', '1', '63', '9', 'actual', NULL),
(313, '5', '1', '63', '9', 'actual', NULL),
(314, '6', '1', '63', '9', 'actual', NULL),
(315, '7', '1', '63', '9', 'actual', NULL),
(316, '8', '1', '63', '9', 'actual', NULL),
(317, '9', '1', '63', '9', 'actual', NULL),
(318, '10', '1', '63', '9', 'actual', NULL),
(319, '11', '1', '63', '9', 'actual', NULL),
(320, '12', '1', '63', '9', 'actual', NULL),
(321, '13', '1', '63', '9', 'actual', NULL),
(322, '14', '1', '63', '9', 'actual', NULL),
(323, '15', '1', '63', '9', 'actual', NULL),
(324, '16', '1', '63', '9', 'actual', NULL),
(325, '17', '1', '63', '9', 'actual', NULL),
(326, '18', '1', '63', '9', 'actual', NULL),
(327, '19', '1', '63', '9', 'actual', NULL),
(328, '20', '1', '63', '9', 'actual', NULL),
(329, '21', '1', '63', '9', 'actual', NULL),
(330, '22', '1', '63', '9', 'actual', NULL),
(331, '23', '1', '63', '9', 'actual', NULL),
(332, '24', '1', '63', '9', 'actual', NULL),
(333, '25', '1', '63', '9', 'actual', NULL),
(334, '26', '1', '63', '9', 'actual', NULL),
(335, '27', '1', '63', '9', 'actual', NULL),
(336, '1', '1', '64', '9', 'actual', NULL),
(337, '2', '1', '64', '9', 'actual', NULL),
(338, '3', '1', '64', '9', 'actual', NULL),
(339, '4', '1', '64', '9', 'actual', NULL),
(340, '5', '1', '64', '9', 'actual', NULL),
(341, '6', '1', '64', '9', 'actual', NULL),
(342, '7', '1', '64', '9', 'actual', NULL),
(343, '8', '1', '64', '9', 'actual', NULL),
(344, '9', '1', '64', '9', 'actual', NULL),
(345, '10', '1', '64', '9', 'actual', NULL),
(346, '11', '1', '64', '9', 'actual', NULL),
(347, '12', '1', '64', '9', 'actual', NULL),
(348, '13', '1', '64', '9', 'actual', NULL),
(349, '14', '1', '64', '9', 'actual', NULL),
(350, '15', '1', '64', '9', 'actual', NULL),
(351, '16', '1', '64', '9', 'actual', NULL),
(352, '17', '1', '64', '9', 'actual', NULL),
(353, '18', '1', '64', '9', 'actual', NULL),
(354, '19', '1', '64', '9', 'actual', NULL),
(355, '20', '1', '64', '9', 'actual', NULL),
(356, '21', '1', '64', '9', 'actual', NULL),
(357, '22', '1', '64', '9', 'actual', NULL),
(358, '23', '1', '64', '9', 'actual', NULL),
(359, '24', '1', '64', '9', 'actual', NULL),
(360, '25', '1', '64', '9', 'actual', NULL),
(361, '26', '1', '64', '9', 'actual', NULL),
(362, '27', '1', '64', '9', 'actual', NULL),
(363, '1', '1', '57', '9', 'sim', NULL),
(364, '2', '1', '57', '9', 'sim', NULL),
(365, '3', '1', '57', '9', 'sim', NULL),
(366, '4', '1', '57', '9', 'sim', NULL),
(367, '5', '1', '57', '9', 'sim', NULL),
(368, '6', '1', '57', '9', 'sim', NULL),
(369, '1', '1', '58', '9', 'sim', NULL),
(370, '2', '1', '58', '9', 'sim', NULL),
(371, '3', '1', '58', '9', 'sim', NULL),
(372, '4', '1', '58', '9', 'sim', NULL),
(373, '5', '1', '58', '9', 'sim', NULL),
(374, '6', '1', '58', '9', 'sim', NULL),
(375, '7', '1', '58', '9', 'sim', NULL),
(376, '8', '1', '58', '9', 'sim', NULL),
(377, '9', '1', '58', '9', 'sim', NULL),
(378, '10', '1', '58', '9', 'sim', NULL),
(379, '11', '1', '58', '9', 'sim', NULL),
(380, '12', '1', '58', '9', 'sim', NULL),
(381, '13', '1', '58', '9', 'sim', NULL),
(382, '14', '1', '58', '9', 'sim', NULL),
(383, '15', '1', '58', '9', 'sim', NULL),
(384, '16', '1', '58', '9', 'sim', NULL),
(385, '17', '1', '58', '9', 'sim', NULL),
(386, '18', '1', '58', '9', 'sim', NULL),
(387, '19', '1', '58', '9', 'sim', NULL),
(388, '20', '1', '58', '9', 'sim', NULL),
(389, '21', '1', '58', '9', 'sim', NULL),
(390, '22', '1', '58', '9', 'sim', NULL),
(391, '23', '1', '58', '9', 'sim', NULL),
(392, '24', '1', '58', '9', 'sim', NULL),
(393, '25', '1', '58', '9', 'sim', NULL),
(394, '26', '1', '58', '9', 'sim', NULL),
(395, '27', '1', '58', '9', 'sim', NULL),
(396, '5', '1', '59', '9', 'sim', NULL),
(397, '6', '1', '59', '9', 'sim', NULL),
(398, '7', '1', '59', '9', 'sim', NULL),
(399, '8', '1', '59', '9', 'sim', NULL),
(400, '9', '1', '59', '9', 'sim', NULL),
(401, '1', '1', '61', '9', 'sim', NULL),
(402, '2', '1', '61', '9', 'sim', NULL),
(403, '3', '1', '61', '9', 'sim', NULL),
(404, '4', '1', '61', '9', 'sim', NULL),
(405, '5', '1', '61', '9', 'sim', NULL),
(406, '6', '1', '61', '9', 'sim', NULL),
(407, '1', '1', '13', '1', 'actual', NULL),
(408, '2', '1', '13', '1', 'actual', NULL),
(409, '3', '1', '13', '1', 'actual', NULL),
(410, '4', '1', '13', '1', 'actual', NULL),
(411, '5', '1', '13', '1', 'actual', NULL),
(412, '6', '1', '13', '1', 'actual', NULL),
(413, '7', '1', '13', '1', 'actual', NULL),
(414, '8', '1', '13', '1', 'actual', NULL),
(415, '9', '1', '13', '1', 'actual', NULL),
(416, '10', '1', '13', '1', 'actual', NULL),
(417, '11', '1', '13', '1', 'actual', NULL),
(418, '12', '1', '13', '1', 'actual', NULL),
(419, '13', '1', '13', '1', 'actual', NULL),
(420, '14', '1', '13', '1', 'actual', NULL),
(421, '15', '1', '13', '1', 'actual', NULL),
(422, '16', '1', '13', '1', 'actual', NULL),
(423, '17', '1', '13', '1', 'actual', NULL),
(424, '18', '1', '13', '1', 'actual', NULL),
(425, '19', '1', '13', '1', 'actual', NULL),
(426, '20', '1', '13', '1', 'actual', NULL),
(427, '21', '1', '13', '1', 'actual', NULL),
(428, '22', '1', '13', '1', 'actual', NULL),
(429, '23', '1', '13', '1', 'actual', NULL),
(430, '24', '1', '13', '1', 'actual', NULL),
(431, '25', '1', '13', '1', 'actual', NULL),
(432, '26', '1', '13', '1', 'actual', NULL),
(433, '27', '1', '13', '1', 'actual', NULL),
(434, '1', '1', '29', '3', 'actual', NULL),
(435, '2', '1', '29', '3', 'actual', NULL),
(436, '3', '1', '29', '3', 'actual', NULL),
(437, '4', '1', '29', '3', 'actual', NULL),
(438, '5', '1', '29', '3', 'actual', NULL),
(439, '6', '1', '29', '3', 'actual', NULL),
(440, '7', '1', '29', '3', 'actual', NULL),
(441, '8', '1', '29', '3', 'actual', NULL),
(442, '9', '1', '29', '3', 'actual', NULL),
(443, '10', '1', '29', '3', 'actual', NULL),
(444, '11', '1', '29', '3', 'actual', NULL),
(445, '12', '1', '29', '3', 'actual', NULL),
(446, '13', '1', '29', '3', 'actual', NULL),
(447, '14', '1', '29', '3', 'actual', NULL),
(448, '15', '1', '29', '3', 'actual', NULL),
(449, '16', '1', '29', '3', 'actual', NULL),
(450, '17', '1', '29', '3', 'actual', NULL),
(451, '18', '1', '29', '3', 'actual', NULL),
(452, '19', '1', '29', '3', 'actual', NULL),
(453, '20', '1', '29', '3', 'actual', NULL),
(454, '21', '1', '29', '3', 'actual', NULL),
(455, '22', '1', '29', '3', 'actual', NULL),
(456, '23', '1', '29', '3', 'actual', NULL),
(457, '24', '1', '29', '3', 'actual', NULL),
(458, '25', '1', '29', '3', 'actual', NULL),
(459, '26', '1', '29', '3', 'actual', NULL),
(460, '27', '1', '29', '3', 'actual', NULL),
(461, '1', '1', '35', '3', 'actual', NULL),
(462, '2', '1', '35', '3', 'actual', NULL),
(463, '3', '1', '35', '3', 'actual', NULL),
(464, '4', '1', '35', '3', 'actual', NULL),
(465, '5', '1', '35', '3', 'actual', NULL),
(466, '6', '1', '35', '3', 'actual', NULL),
(467, '7', '1', '35', '3', 'actual', NULL),
(468, '8', '1', '35', '3', 'actual', NULL),
(469, '9', '1', '35', '3', 'actual', NULL),
(470, '10', '1', '35', '3', 'actual', NULL),
(471, '11', '1', '35', '3', 'actual', NULL),
(472, '12', '1', '35', '3', 'actual', NULL),
(473, '13', '1', '35', '3', 'actual', NULL),
(474, '14', '1', '35', '3', 'actual', NULL),
(475, '15', '1', '35', '3', 'actual', NULL),
(476, '16', '1', '35', '3', 'actual', NULL),
(477, '17', '1', '35', '3', 'actual', NULL),
(478, '18', '1', '35', '3', 'actual', NULL),
(479, '19', '1', '35', '3', 'actual', NULL),
(480, '20', '1', '35', '3', 'actual', NULL),
(481, '21', '1', '35', '3', 'actual', NULL),
(482, '22', '1', '35', '3', 'actual', NULL),
(483, '23', '1', '35', '3', 'actual', NULL),
(484, '24', '1', '35', '3', 'actual', NULL),
(485, '25', '1', '35', '3', 'actual', NULL),
(486, '26', '1', '35', '3', 'actual', NULL),
(487, '27', '1', '35', '3', 'actual', NULL),
(488, '1', '1', '41', '3', 'actual', NULL),
(489, '2', '1', '41', '3', 'actual', NULL),
(490, '3', '1', '41', '3', 'actual', NULL),
(491, '4', '1', '41', '3', 'actual', NULL),
(492, '5', '1', '41', '3', 'actual', NULL),
(493, '6', '1', '41', '3', 'actual', NULL),
(494, '7', '1', '41', '3', 'actual', NULL),
(495, '8', '1', '41', '3', 'actual', NULL),
(496, '9', '1', '41', '3', 'actual', NULL),
(497, '10', '1', '41', '3', 'actual', NULL),
(498, '11', '1', '41', '3', 'actual', NULL),
(499, '12', '1', '41', '3', 'actual', NULL),
(500, '13', '1', '41', '3', 'actual', NULL),
(501, '14', '1', '41', '3', 'actual', NULL),
(502, '15', '1', '41', '3', 'actual', NULL),
(503, '16', '1', '41', '3', 'actual', NULL),
(504, '17', '1', '41', '3', 'actual', NULL),
(505, '18', '1', '41', '3', 'actual', NULL),
(506, '19', '1', '41', '3', 'actual', NULL),
(507, '20', '1', '41', '3', 'actual', NULL),
(508, '21', '1', '41', '3', 'actual', NULL),
(509, '22', '1', '41', '3', 'actual', NULL),
(510, '23', '1', '41', '3', 'actual', NULL),
(511, '24', '1', '41', '3', 'actual', NULL),
(512, '25', '1', '41', '3', 'actual', NULL),
(513, '26', '1', '41', '3', 'actual', NULL),
(514, '27', '1', '41', '3', 'actual', NULL),
(515, '1', '1', '42', '3', 'actual', NULL),
(516, '2', '1', '42', '3', 'actual', NULL),
(517, '3', '1', '42', '3', 'actual', NULL),
(518, '4', '1', '42', '3', 'actual', NULL),
(519, '5', '1', '42', '3', 'actual', NULL),
(520, '6', '1', '42', '3', 'actual', NULL),
(521, '7', '1', '42', '3', 'actual', NULL),
(522, '8', '1', '42', '3', 'actual', NULL),
(523, '9', '1', '42', '3', 'actual', NULL),
(524, '10', '1', '42', '3', 'actual', NULL),
(525, '11', '1', '42', '3', 'actual', NULL),
(526, '12', '1', '42', '3', 'actual', NULL),
(527, '13', '1', '42', '3', 'actual', NULL),
(528, '14', '1', '42', '3', 'actual', NULL),
(529, '15', '1', '42', '3', 'actual', NULL),
(530, '16', '1', '42', '3', 'actual', NULL),
(531, '17', '1', '42', '3', 'actual', NULL),
(532, '18', '1', '42', '3', 'actual', NULL),
(533, '19', '1', '42', '3', 'actual', NULL),
(534, '20', '1', '42', '3', 'actual', NULL),
(535, '21', '1', '42', '3', 'actual', NULL),
(536, '22', '1', '42', '3', 'actual', NULL),
(537, '23', '1', '42', '3', 'actual', NULL),
(538, '24', '1', '42', '3', 'actual', NULL),
(539, '25', '1', '42', '3', 'actual', NULL),
(540, '26', '1', '42', '3', 'actual', NULL),
(541, '27', '1', '42', '3', 'actual', NULL),
(542, '1', '1', '34', '3', 'actual', NULL),
(543, '2', '1', '34', '3', 'actual', NULL),
(544, '3', '1', '34', '3', 'actual', NULL),
(545, '4', '1', '34', '3', 'actual', NULL),
(546, '5', '1', '34', '3', 'actual', NULL),
(547, '6', '1', '34', '3', 'actual', NULL),
(548, '7', '1', '34', '3', 'actual', NULL),
(549, '8', '1', '34', '3', 'actual', NULL),
(550, '9', '1', '34', '3', 'actual', NULL),
(551, '10', '1', '34', '3', 'actual', NULL),
(552, '11', '1', '34', '3', 'actual', NULL),
(553, '12', '1', '34', '3', 'actual', NULL),
(554, '13', '1', '34', '3', 'actual', NULL),
(555, '14', '1', '34', '3', 'actual', NULL),
(556, '15', '1', '34', '3', 'actual', NULL),
(557, '16', '1', '34', '3', 'actual', NULL),
(558, '17', '1', '34', '3', 'actual', NULL),
(559, '18', '1', '34', '3', 'actual', NULL),
(560, '19', '1', '34', '3', 'actual', NULL),
(561, '20', '1', '34', '3', 'actual', NULL),
(562, '21', '1', '34', '3', 'actual', NULL),
(563, '22', '1', '34', '3', 'actual', NULL),
(564, '23', '1', '34', '3', 'actual', NULL),
(565, '24', '1', '34', '3', 'actual', NULL),
(566, '25', '1', '34', '3', 'actual', NULL),
(567, '26', '1', '34', '3', 'actual', NULL),
(568, '27', '1', '34', '3', 'actual', NULL),
(569, '1', '1', '36', '3', 'actual', NULL),
(570, '2', '1', '36', '3', 'actual', NULL),
(571, '3', '1', '36', '3', 'actual', NULL),
(572, '4', '1', '36', '3', 'actual', NULL),
(573, '5', '1', '36', '3', 'actual', NULL),
(574, '6', '1', '36', '3', 'actual', NULL),
(575, '7', '1', '36', '3', 'actual', NULL),
(576, '8', '1', '36', '3', 'actual', NULL),
(577, '9', '1', '36', '3', 'actual', NULL),
(578, '10', '1', '36', '3', 'actual', NULL),
(579, '11', '1', '36', '3', 'actual', NULL),
(580, '12', '1', '36', '3', 'actual', NULL),
(581, '13', '1', '36', '3', 'actual', NULL),
(582, '14', '1', '36', '3', 'actual', NULL),
(583, '15', '1', '36', '3', 'actual', NULL),
(584, '16', '1', '36', '3', 'actual', NULL),
(585, '17', '1', '36', '3', 'actual', NULL),
(586, '18', '1', '36', '3', 'actual', NULL),
(587, '19', '1', '36', '3', 'actual', NULL),
(588, '20', '1', '36', '3', 'actual', NULL),
(589, '21', '1', '36', '3', 'actual', NULL),
(590, '22', '1', '36', '3', 'actual', NULL),
(591, '23', '1', '36', '3', 'actual', NULL),
(592, '24', '1', '36', '3', 'actual', NULL),
(593, '25', '1', '36', '3', 'actual', NULL),
(594, '26', '1', '36', '3', 'actual', NULL),
(595, '27', '1', '36', '3', 'actual', NULL),
(596, '1', '1', '39', '3', 'actual', NULL),
(597, '2', '1', '39', '3', 'actual', NULL),
(598, '3', '1', '39', '3', 'actual', NULL),
(599, '4', '1', '39', '3', 'actual', NULL),
(600, '5', '1', '39', '3', 'actual', NULL),
(601, '6', '1', '39', '3', 'actual', NULL),
(602, '7', '1', '39', '3', 'actual', NULL),
(603, '8', '1', '39', '3', 'actual', NULL),
(604, '9', '1', '39', '3', 'actual', NULL),
(605, '10', '1', '39', '3', 'actual', NULL),
(606, '11', '1', '39', '3', 'actual', NULL),
(607, '12', '1', '39', '3', 'actual', NULL),
(608, '13', '1', '39', '3', 'actual', NULL),
(609, '14', '1', '39', '3', 'actual', NULL),
(610, '15', '1', '39', '3', 'actual', NULL),
(611, '16', '1', '39', '3', 'actual', NULL),
(612, '17', '1', '39', '3', 'actual', NULL),
(613, '18', '1', '39', '3', 'actual', NULL),
(614, '19', '1', '39', '3', 'actual', NULL),
(615, '20', '1', '39', '3', 'actual', NULL),
(616, '21', '1', '39', '3', 'actual', NULL),
(617, '22', '1', '39', '3', 'actual', NULL),
(618, '23', '1', '39', '3', 'actual', NULL),
(619, '24', '1', '39', '3', 'actual', NULL),
(620, '25', '1', '39', '3', 'actual', NULL),
(621, '26', '1', '39', '3', 'actual', NULL),
(622, '27', '1', '39', '3', 'actual', NULL),
(623, '1', '1', '56', '8', 'actual', NULL),
(624, '2', '1', '56', '8', 'actual', NULL),
(625, '3', '1', '56', '8', 'actual', NULL),
(626, '4', '1', '56', '8', 'actual', NULL),
(627, '5', '1', '56', '8', 'actual', NULL),
(628, '6', '1', '56', '8', 'actual', NULL),
(629, '7', '1', '56', '8', 'actual', NULL),
(630, '8', '1', '56', '8', 'actual', NULL),
(631, '9', '1', '56', '8', 'actual', NULL),
(632, '10', '1', '56', '8', 'actual', NULL),
(633, '11', '1', '56', '8', 'actual', NULL),
(634, '12', '1', '56', '8', 'actual', NULL),
(635, '13', '1', '56', '8', 'actual', NULL),
(636, '14', '1', '56', '8', 'actual', NULL),
(637, '15', '1', '56', '8', 'actual', NULL),
(638, '16', '1', '56', '8', 'actual', NULL),
(639, '17', '1', '56', '8', 'actual', NULL),
(640, '18', '1', '56', '8', 'actual', NULL),
(641, '19', '1', '56', '8', 'actual', NULL),
(642, '20', '1', '56', '8', 'actual', NULL),
(643, '21', '1', '56', '8', 'actual', NULL),
(644, '22', '1', '56', '8', 'actual', NULL),
(645, '23', '1', '56', '8', 'actual', NULL),
(646, '24', '1', '56', '8', 'actual', NULL),
(647, '25', '1', '56', '8', 'actual', NULL),
(648, '26', '1', '56', '8', 'actual', NULL),
(649, '27', '1', '56', '8', 'actual', NULL),
(650, '1', '1', '5', '1', 'sim', NULL),
(651, '2', '1', '5', '1', 'sim', NULL),
(652, '3', '1', '5', '1', 'sim', NULL),
(653, '4', '1', '5', '1', 'sim', NULL),
(654, '5', '1', '5', '1', 'sim', NULL),
(655, '6', '1', '5', '1', 'sim', NULL),
(656, '7', '1', '5', '1', 'sim', NULL),
(657, '8', '1', '5', '1', 'sim', NULL),
(658, '9', '1', '5', '1', 'sim', NULL),
(659, '10', '1', '5', '1', 'sim', NULL),
(660, '11', '1', '5', '1', 'sim', NULL),
(661, '12', '1', '5', '1', 'sim', NULL),
(662, '13', '1', '5', '1', 'sim', NULL),
(663, '14', '1', '5', '1', 'sim', NULL),
(664, '15', '1', '5', '1', 'sim', NULL),
(665, '16', '1', '5', '1', 'sim', NULL),
(666, '17', '1', '5', '1', 'sim', NULL),
(667, '18', '1', '5', '1', 'sim', NULL),
(668, '19', '1', '5', '1', 'sim', NULL),
(669, '20', '1', '5', '1', 'sim', NULL),
(670, '21', '1', '5', '1', 'sim', NULL),
(671, '22', '1', '5', '1', 'sim', NULL),
(672, '23', '1', '5', '1', 'sim', NULL),
(673, '24', '1', '5', '1', 'sim', NULL),
(674, '25', '1', '5', '1', 'sim', NULL),
(675, '26', '1', '5', '1', 'sim', NULL),
(676, '27', '1', '5', '1', 'sim', NULL),
(677, '1', '1', '6', '1', 'sim', NULL),
(678, '2', '1', '6', '1', 'sim', NULL),
(679, '3', '1', '6', '1', 'sim', NULL),
(680, '4', '1', '6', '1', 'sim', NULL),
(681, '5', '1', '6', '1', 'sim', NULL),
(682, '6', '1', '6', '1', 'sim', NULL),
(683, '7', '1', '6', '1', 'sim', NULL),
(684, '8', '1', '6', '1', 'sim', NULL),
(685, '9', '1', '6', '1', 'sim', NULL),
(686, '10', '1', '6', '1', 'sim', NULL),
(687, '11', '1', '6', '1', 'sim', NULL),
(688, '12', '1', '6', '1', 'sim', NULL),
(689, '13', '1', '6', '1', 'sim', NULL),
(690, '14', '1', '6', '1', 'sim', NULL),
(691, '15', '1', '6', '1', 'sim', NULL),
(692, '16', '1', '6', '1', 'sim', NULL),
(693, '17', '1', '6', '1', 'sim', NULL),
(694, '18', '1', '6', '1', 'sim', NULL),
(695, '19', '1', '6', '1', 'sim', NULL),
(696, '20', '1', '6', '1', 'sim', NULL),
(697, '21', '1', '6', '1', 'sim', NULL),
(698, '22', '1', '6', '1', 'sim', NULL),
(699, '23', '1', '6', '1', 'sim', NULL),
(700, '24', '1', '6', '1', 'sim', NULL),
(701, '25', '1', '6', '1', 'sim', NULL),
(702, '26', '1', '6', '1', 'sim', NULL),
(703, '27', '1', '6', '1', 'sim', NULL),
(704, '1', '1', '7', '1', 'sim', NULL),
(705, '2', '1', '7', '1', 'sim', NULL),
(706, '3', '1', '7', '1', 'sim', NULL),
(707, '4', '1', '7', '1', 'sim', NULL),
(708, '5', '1', '7', '1', 'sim', NULL),
(709, '6', '1', '7', '1', 'sim', NULL),
(710, '7', '1', '7', '1', 'sim', NULL),
(711, '8', '1', '7', '1', 'sim', NULL),
(712, '9', '1', '7', '1', 'sim', NULL),
(713, '10', '1', '7', '1', 'sim', NULL),
(714, '11', '1', '7', '1', 'sim', NULL),
(715, '12', '1', '7', '1', 'sim', NULL),
(716, '13', '1', '7', '1', 'sim', NULL),
(717, '14', '1', '7', '1', 'sim', NULL),
(718, '15', '1', '7', '1', 'sim', NULL),
(719, '16', '1', '7', '1', 'sim', NULL),
(720, '17', '1', '7', '1', 'sim', NULL),
(721, '18', '1', '7', '1', 'sim', NULL),
(722, '19', '1', '7', '1', 'sim', NULL),
(723, '20', '1', '7', '1', 'sim', NULL),
(724, '21', '1', '7', '1', 'sim', NULL),
(725, '22', '1', '7', '1', 'sim', NULL),
(726, '23', '1', '7', '1', 'sim', NULL),
(727, '24', '1', '7', '1', 'sim', NULL),
(728, '25', '1', '7', '1', 'sim', NULL),
(729, '26', '1', '7', '1', 'sim', NULL),
(730, '27', '1', '7', '1', 'sim', NULL),
(731, '1', '1', '11', '1', 'sim', NULL),
(732, '2', '1', '11', '1', 'sim', NULL),
(733, '3', '1', '11', '1', 'sim', NULL),
(734, '4', '1', '11', '1', 'sim', NULL),
(735, '5', '1', '11', '1', 'sim', NULL),
(736, '6', '1', '11', '1', 'sim', NULL),
(737, '7', '1', '11', '1', 'sim', NULL),
(738, '8', '1', '11', '1', 'sim', NULL),
(739, '9', '1', '11', '1', 'sim', NULL),
(740, '10', '1', '11', '1', 'sim', NULL),
(741, '11', '1', '11', '1', 'sim', NULL),
(742, '12', '1', '11', '1', 'sim', NULL),
(743, '13', '1', '11', '1', 'sim', NULL),
(744, '14', '1', '11', '1', 'sim', NULL),
(745, '15', '1', '11', '1', 'sim', NULL),
(746, '16', '1', '11', '1', 'sim', NULL),
(747, '17', '1', '11', '1', 'sim', NULL),
(748, '18', '1', '11', '1', 'sim', NULL),
(749, '19', '1', '11', '1', 'sim', NULL),
(750, '20', '1', '11', '1', 'sim', NULL),
(751, '21', '1', '11', '1', 'sim', NULL),
(752, '22', '1', '11', '1', 'sim', NULL),
(753, '23', '1', '11', '1', 'sim', NULL),
(754, '24', '1', '11', '1', 'sim', NULL),
(755, '25', '1', '11', '1', 'sim', NULL),
(756, '26', '1', '11', '1', 'sim', NULL),
(757, '27', '1', '11', '1', 'sim', NULL),
(758, '1', '1', '12', '1', 'sim', NULL),
(759, '2', '1', '12', '1', 'sim', NULL),
(760, '3', '1', '12', '1', 'sim', NULL),
(761, '4', '1', '12', '1', 'sim', NULL),
(762, '5', '1', '12', '1', 'sim', NULL),
(763, '6', '1', '12', '1', 'sim', NULL),
(764, '7', '1', '12', '1', 'sim', NULL),
(765, '8', '1', '12', '1', 'sim', NULL),
(766, '9', '1', '12', '1', 'sim', NULL),
(767, '10', '1', '12', '1', 'sim', NULL),
(768, '11', '1', '12', '1', 'sim', NULL),
(769, '12', '1', '12', '1', 'sim', NULL),
(770, '13', '1', '12', '1', 'sim', NULL),
(771, '14', '1', '12', '1', 'sim', NULL),
(772, '15', '1', '12', '1', 'sim', NULL),
(773, '16', '1', '12', '1', 'sim', NULL),
(774, '17', '1', '12', '1', 'sim', NULL),
(775, '18', '1', '12', '1', 'sim', NULL),
(776, '19', '1', '12', '1', 'sim', NULL),
(777, '20', '1', '12', '1', 'sim', NULL),
(778, '21', '1', '12', '1', 'sim', NULL),
(779, '22', '1', '12', '1', 'sim', NULL),
(780, '23', '1', '12', '1', 'sim', NULL),
(781, '24', '1', '12', '1', 'sim', NULL),
(782, '25', '1', '12', '1', 'sim', NULL),
(783, '26', '1', '12', '1', 'sim', NULL),
(784, '27', '1', '12', '1', 'sim', NULL),
(785, '1', '1', '18', '1', 'sim', NULL),
(786, '2', '1', '18', '1', 'sim', NULL),
(787, '3', '1', '18', '1', 'sim', NULL),
(788, '4', '1', '18', '1', 'sim', NULL),
(789, '5', '1', '18', '1', 'sim', NULL),
(790, '6', '1', '18', '1', 'sim', NULL),
(791, '7', '1', '18', '1', 'sim', NULL),
(792, '8', '1', '18', '1', 'sim', NULL),
(793, '9', '1', '18', '1', 'sim', NULL),
(794, '10', '1', '18', '1', 'sim', NULL),
(795, '11', '1', '18', '1', 'sim', NULL),
(796, '12', '1', '18', '1', 'sim', NULL),
(797, '13', '1', '18', '1', 'sim', NULL),
(798, '14', '1', '18', '1', 'sim', NULL),
(799, '15', '1', '18', '1', 'sim', NULL),
(800, '16', '1', '18', '1', 'sim', NULL),
(801, '17', '1', '18', '1', 'sim', NULL),
(802, '18', '1', '18', '1', 'sim', NULL),
(803, '19', '1', '18', '1', 'sim', NULL),
(804, '20', '1', '18', '1', 'sim', NULL),
(805, '21', '1', '18', '1', 'sim', NULL),
(806, '22', '1', '18', '1', 'sim', NULL),
(807, '23', '1', '18', '1', 'sim', NULL),
(808, '24', '1', '18', '1', 'sim', NULL),
(809, '25', '1', '18', '1', 'sim', NULL),
(810, '26', '1', '18', '1', 'sim', NULL),
(811, '27', '1', '18', '1', 'sim', NULL),
(812, '1', '1', '15', '1', 'sim', NULL),
(813, '2', '1', '15', '1', 'sim', NULL),
(814, '3', '1', '15', '1', 'sim', NULL),
(815, '4', '1', '15', '1', 'sim', NULL),
(816, '5', '1', '15', '1', 'sim', NULL),
(817, '6', '1', '15', '1', 'sim', NULL),
(818, '7', '1', '15', '1', 'sim', NULL),
(819, '8', '1', '15', '1', 'sim', NULL),
(820, '9', '1', '15', '1', 'sim', NULL),
(821, '10', '1', '15', '1', 'sim', NULL),
(822, '11', '1', '15', '1', 'sim', NULL),
(823, '12', '1', '15', '1', 'sim', NULL),
(824, '13', '1', '15', '1', 'sim', NULL),
(825, '14', '1', '15', '1', 'sim', NULL),
(826, '15', '1', '15', '1', 'sim', NULL),
(827, '16', '1', '15', '1', 'sim', NULL),
(828, '17', '1', '15', '1', 'sim', NULL),
(829, '18', '1', '15', '1', 'sim', NULL),
(830, '19', '1', '15', '1', 'sim', NULL),
(831, '20', '1', '15', '1', 'sim', NULL),
(832, '21', '1', '15', '1', 'sim', NULL),
(833, '22', '1', '15', '1', 'sim', NULL),
(834, '23', '1', '15', '1', 'sim', NULL),
(835, '24', '1', '15', '1', 'sim', NULL),
(836, '25', '1', '15', '1', 'sim', NULL),
(837, '26', '1', '15', '1', 'sim', NULL),
(838, '27', '1', '15', '1', 'sim', NULL),
(839, '1', '1', '13', '1', 'sim', NULL),
(840, '2', '1', '13', '1', 'sim', NULL),
(841, '3', '1', '13', '1', 'sim', NULL),
(842, '4', '1', '13', '1', 'sim', NULL),
(843, '5', '1', '13', '1', 'sim', NULL),
(844, '6', '1', '13', '1', 'sim', NULL),
(845, '7', '1', '13', '1', 'sim', NULL),
(846, '8', '1', '13', '1', 'sim', NULL),
(847, '9', '1', '13', '1', 'sim', NULL),
(848, '10', '1', '13', '1', 'sim', NULL),
(849, '11', '1', '13', '1', 'sim', NULL),
(850, '12', '1', '13', '1', 'sim', NULL),
(851, '13', '1', '13', '1', 'sim', NULL),
(852, '14', '1', '13', '1', 'sim', NULL),
(853, '15', '1', '13', '1', 'sim', NULL),
(854, '16', '1', '13', '1', 'sim', NULL),
(855, '17', '1', '13', '1', 'sim', NULL),
(856, '18', '1', '13', '1', 'sim', NULL),
(857, '19', '1', '13', '1', 'sim', NULL),
(858, '20', '1', '13', '1', 'sim', NULL),
(859, '21', '1', '13', '1', 'sim', NULL),
(860, '22', '1', '13', '1', 'sim', NULL),
(861, '23', '1', '13', '1', 'sim', NULL),
(862, '24', '1', '13', '1', 'sim', NULL),
(863, '25', '1', '13', '1', 'sim', NULL),
(864, '26', '1', '13', '1', 'sim', NULL),
(865, '27', '1', '13', '1', 'sim', NULL),
(866, '1', '1', '14', '1', 'sim', NULL),
(867, '2', '1', '14', '1', 'sim', NULL),
(868, '3', '1', '14', '1', 'sim', NULL),
(869, '4', '1', '14', '1', 'sim', NULL),
(870, '5', '1', '14', '1', 'sim', NULL),
(871, '6', '1', '14', '1', 'sim', NULL),
(872, '7', '1', '14', '1', 'sim', NULL),
(873, '8', '1', '14', '1', 'sim', NULL),
(874, '9', '1', '14', '1', 'sim', NULL),
(875, '10', '1', '14', '1', 'sim', NULL),
(876, '11', '1', '14', '1', 'sim', NULL),
(877, '12', '1', '14', '1', 'sim', NULL),
(878, '13', '1', '14', '1', 'sim', NULL),
(879, '14', '1', '14', '1', 'sim', NULL),
(880, '15', '1', '14', '1', 'sim', NULL),
(881, '16', '1', '14', '1', 'sim', NULL),
(882, '17', '1', '14', '1', 'sim', NULL),
(883, '18', '1', '14', '1', 'sim', NULL),
(884, '19', '1', '14', '1', 'sim', NULL),
(885, '20', '1', '14', '1', 'sim', NULL),
(886, '21', '1', '14', '1', 'sim', NULL),
(887, '22', '1', '14', '1', 'sim', NULL),
(888, '23', '1', '14', '1', 'sim', NULL),
(889, '24', '1', '14', '1', 'sim', NULL),
(890, '25', '1', '14', '1', 'sim', NULL),
(891, '26', '1', '14', '1', 'sim', NULL),
(892, '27', '1', '14', '1', 'sim', NULL),
(893, '1', '1', '19', '1', 'sim', NULL),
(894, '2', '1', '19', '1', 'sim', NULL),
(895, '3', '1', '19', '1', 'sim', NULL),
(896, '4', '1', '19', '1', 'sim', NULL),
(897, '5', '1', '19', '1', 'sim', NULL),
(898, '6', '1', '19', '1', 'sim', NULL),
(899, '7', '1', '19', '1', 'sim', NULL),
(900, '8', '1', '19', '1', 'sim', NULL),
(901, '9', '1', '19', '1', 'sim', NULL),
(902, '10', '1', '19', '1', 'sim', NULL),
(903, '11', '1', '19', '1', 'sim', NULL),
(904, '12', '1', '19', '1', 'sim', NULL),
(905, '13', '1', '19', '1', 'sim', NULL),
(906, '14', '1', '19', '1', 'sim', NULL),
(907, '15', '1', '19', '1', 'sim', NULL),
(908, '16', '1', '19', '1', 'sim', NULL),
(909, '17', '1', '19', '1', 'sim', NULL),
(910, '18', '1', '19', '1', 'sim', NULL),
(911, '19', '1', '19', '1', 'sim', NULL),
(912, '20', '1', '19', '1', 'sim', NULL),
(913, '21', '1', '19', '1', 'sim', NULL),
(914, '22', '1', '19', '1', 'sim', NULL),
(915, '23', '1', '19', '1', 'sim', NULL),
(916, '24', '1', '19', '1', 'sim', NULL),
(917, '25', '1', '19', '1', 'sim', NULL),
(918, '26', '1', '19', '1', 'sim', NULL),
(919, '27', '1', '19', '1', 'sim', NULL),
(920, '1', '1', '23', '1', 'sim', NULL),
(921, '2', '1', '23', '1', 'sim', NULL),
(922, '3', '1', '23', '1', 'sim', NULL),
(923, '4', '1', '23', '1', 'sim', NULL),
(924, '5', '1', '23', '1', 'sim', NULL),
(925, '6', '1', '23', '1', 'sim', NULL),
(926, '7', '1', '23', '1', 'sim', NULL),
(927, '8', '1', '23', '1', 'sim', NULL),
(928, '9', '1', '23', '1', 'sim', NULL),
(929, '10', '1', '23', '1', 'sim', NULL),
(930, '11', '1', '23', '1', 'sim', NULL),
(931, '12', '1', '23', '1', 'sim', NULL),
(932, '13', '1', '23', '1', 'sim', NULL),
(933, '14', '1', '23', '1', 'sim', NULL),
(934, '15', '1', '23', '1', 'sim', NULL),
(935, '16', '1', '23', '1', 'sim', NULL),
(936, '17', '1', '23', '1', 'sim', NULL),
(937, '18', '1', '23', '1', 'sim', NULL),
(938, '19', '1', '23', '1', 'sim', NULL),
(939, '20', '1', '23', '1', 'sim', NULL),
(940, '21', '1', '23', '1', 'sim', NULL),
(941, '22', '1', '23', '1', 'sim', NULL),
(942, '23', '1', '23', '1', 'sim', NULL),
(943, '24', '1', '23', '1', 'sim', NULL),
(944, '25', '1', '23', '1', 'sim', NULL),
(945, '26', '1', '23', '1', 'sim', NULL),
(946, '27', '1', '23', '1', 'sim', NULL),
(947, '1', '1', '28', '1', 'sim', NULL),
(948, '2', '1', '28', '1', 'sim', NULL),
(949, '3', '1', '28', '1', 'sim', NULL),
(950, '4', '1', '28', '1', 'sim', NULL),
(951, '5', '1', '28', '1', 'sim', NULL),
(952, '6', '1', '28', '1', 'sim', NULL),
(953, '7', '1', '28', '1', 'sim', NULL),
(954, '8', '1', '28', '1', 'sim', NULL),
(955, '9', '1', '28', '1', 'sim', NULL),
(956, '10', '1', '28', '1', 'sim', NULL),
(957, '11', '1', '28', '1', 'sim', NULL),
(958, '12', '1', '28', '1', 'sim', NULL),
(959, '13', '1', '28', '1', 'sim', NULL),
(960, '14', '1', '28', '1', 'sim', NULL),
(961, '15', '1', '28', '1', 'sim', NULL),
(962, '16', '1', '28', '1', 'sim', NULL),
(963, '17', '1', '28', '1', 'sim', NULL),
(964, '18', '1', '28', '1', 'sim', NULL),
(965, '19', '1', '28', '1', 'sim', NULL),
(966, '20', '1', '28', '1', 'sim', NULL),
(967, '21', '1', '28', '1', 'sim', NULL),
(968, '22', '1', '28', '1', 'sim', NULL),
(969, '23', '1', '28', '1', 'sim', NULL),
(970, '24', '1', '28', '1', 'sim', NULL),
(971, '25', '1', '28', '1', 'sim', NULL),
(972, '26', '1', '28', '1', 'sim', NULL),
(973, '27', '1', '28', '1', 'sim', NULL),
(974, '1', '1', '20', '1', 'sim', NULL),
(975, '2', '1', '20', '1', 'sim', NULL),
(976, '3', '1', '20', '1', 'sim', NULL),
(977, '4', '1', '20', '1', 'sim', NULL),
(978, '5', '1', '20', '1', 'sim', NULL),
(979, '6', '1', '20', '1', 'sim', NULL),
(980, '7', '1', '20', '1', 'sim', NULL),
(981, '8', '1', '20', '1', 'sim', NULL),
(982, '9', '1', '20', '1', 'sim', NULL),
(983, '10', '1', '20', '1', 'sim', NULL),
(984, '11', '1', '20', '1', 'sim', NULL),
(985, '12', '1', '20', '1', 'sim', NULL),
(986, '13', '1', '20', '1', 'sim', NULL),
(987, '14', '1', '20', '1', 'sim', NULL),
(988, '15', '1', '20', '1', 'sim', NULL),
(989, '16', '1', '20', '1', 'sim', NULL),
(990, '17', '1', '20', '1', 'sim', NULL),
(991, '18', '1', '20', '1', 'sim', NULL),
(992, '19', '1', '20', '1', 'sim', NULL),
(993, '20', '1', '20', '1', 'sim', NULL),
(994, '21', '1', '20', '1', 'sim', NULL),
(995, '22', '1', '20', '1', 'sim', NULL),
(996, '23', '1', '20', '1', 'sim', NULL),
(997, '24', '1', '20', '1', 'sim', NULL),
(998, '25', '1', '20', '1', 'sim', NULL),
(999, '26', '1', '20', '1', 'sim', NULL),
(1000, '27', '1', '20', '1', 'sim', NULL),
(1001, '1', '1', '26', '1', 'sim', NULL),
(1002, '2', '1', '26', '1', 'sim', NULL),
(1003, '3', '1', '26', '1', 'sim', NULL),
(1004, '4', '1', '26', '1', 'sim', NULL),
(1005, '5', '1', '26', '1', 'sim', NULL),
(1006, '6', '1', '26', '1', 'sim', NULL),
(1007, '7', '1', '26', '1', 'sim', NULL),
(1008, '8', '1', '26', '1', 'sim', NULL),
(1009, '9', '1', '26', '1', 'sim', NULL),
(1010, '10', '1', '26', '1', 'sim', NULL),
(1011, '11', '1', '26', '1', 'sim', NULL),
(1012, '12', '1', '26', '1', 'sim', NULL),
(1013, '13', '1', '26', '1', 'sim', NULL),
(1014, '14', '1', '26', '1', 'sim', NULL),
(1015, '15', '1', '26', '1', 'sim', NULL),
(1016, '16', '1', '26', '1', 'sim', NULL),
(1017, '17', '1', '26', '1', 'sim', NULL),
(1018, '18', '1', '26', '1', 'sim', NULL),
(1019, '19', '1', '26', '1', 'sim', NULL),
(1020, '20', '1', '26', '1', 'sim', NULL),
(1021, '21', '1', '26', '1', 'sim', NULL),
(1022, '22', '1', '26', '1', 'sim', NULL),
(1023, '23', '1', '26', '1', 'sim', NULL),
(1024, '24', '1', '26', '1', 'sim', NULL),
(1025, '25', '1', '26', '1', 'sim', NULL),
(1026, '26', '1', '26', '1', 'sim', NULL),
(1027, '27', '1', '26', '1', 'sim', NULL),
(1028, '1', '1', '10', '3', 'sim', NULL),
(1029, '2', '1', '10', '3', 'sim', NULL),
(1030, '3', '1', '10', '3', 'sim', NULL),
(1031, '4', '1', '10', '3', 'sim', NULL),
(1032, '5', '1', '10', '3', 'sim', NULL),
(1033, '6', '1', '10', '3', 'sim', NULL),
(1034, '7', '1', '10', '3', 'sim', NULL),
(1035, '8', '1', '10', '3', 'sim', NULL),
(1036, '9', '1', '10', '3', 'sim', NULL),
(1037, '10', '1', '10', '3', 'sim', NULL),
(1038, '11', '1', '10', '3', 'sim', NULL),
(1039, '12', '1', '10', '3', 'sim', NULL),
(1040, '13', '1', '10', '3', 'sim', NULL),
(1041, '14', '1', '10', '3', 'sim', NULL),
(1042, '15', '1', '10', '3', 'sim', NULL),
(1043, '16', '1', '10', '3', 'sim', NULL),
(1044, '17', '1', '10', '3', 'sim', NULL),
(1045, '18', '1', '10', '3', 'sim', NULL),
(1046, '19', '1', '10', '3', 'sim', NULL),
(1047, '20', '1', '10', '3', 'sim', NULL),
(1048, '21', '1', '10', '3', 'sim', NULL),
(1049, '22', '1', '10', '3', 'sim', NULL),
(1050, '23', '1', '10', '3', 'sim', NULL),
(1051, '24', '1', '10', '3', 'sim', NULL),
(1052, '25', '1', '10', '3', 'sim', NULL),
(1053, '26', '1', '10', '3', 'sim', NULL),
(1054, '27', '1', '10', '3', 'sim', NULL),
(1055, '1', '1', '29', '3', 'sim', NULL),
(1056, '2', '1', '29', '3', 'sim', NULL),
(1057, '3', '1', '29', '3', 'sim', NULL),
(1058, '4', '1', '29', '3', 'sim', NULL),
(1059, '5', '1', '29', '3', 'sim', NULL),
(1060, '6', '1', '29', '3', 'sim', NULL),
(1061, '7', '1', '29', '3', 'sim', NULL),
(1062, '8', '1', '29', '3', 'sim', NULL),
(1063, '9', '1', '29', '3', 'sim', NULL),
(1064, '10', '1', '29', '3', 'sim', NULL),
(1065, '11', '1', '29', '3', 'sim', NULL),
(1066, '12', '1', '29', '3', 'sim', NULL),
(1067, '13', '1', '29', '3', 'sim', NULL),
(1068, '14', '1', '29', '3', 'sim', NULL),
(1069, '15', '1', '29', '3', 'sim', NULL),
(1070, '16', '1', '29', '3', 'sim', NULL),
(1071, '17', '1', '29', '3', 'sim', NULL),
(1072, '18', '1', '29', '3', 'sim', NULL),
(1073, '19', '1', '29', '3', 'sim', NULL),
(1074, '20', '1', '29', '3', 'sim', NULL),
(1075, '21', '1', '29', '3', 'sim', NULL),
(1076, '22', '1', '29', '3', 'sim', NULL),
(1077, '23', '1', '29', '3', 'sim', NULL),
(1078, '24', '1', '29', '3', 'sim', NULL),
(1079, '25', '1', '29', '3', 'sim', NULL),
(1080, '26', '1', '29', '3', 'sim', NULL),
(1081, '27', '1', '29', '3', 'sim', NULL),
(1082, '1', '1', '30', '3', 'sim', NULL),
(1083, '2', '1', '30', '3', 'sim', NULL),
(1084, '3', '1', '30', '3', 'sim', NULL),
(1085, '4', '1', '30', '3', 'sim', NULL),
(1086, '5', '1', '30', '3', 'sim', NULL),
(1087, '6', '1', '30', '3', 'sim', NULL),
(1088, '7', '1', '30', '3', 'sim', NULL),
(1089, '8', '1', '30', '3', 'sim', NULL),
(1090, '9', '1', '30', '3', 'sim', NULL),
(1091, '10', '1', '30', '3', 'sim', NULL),
(1092, '11', '1', '30', '3', 'sim', NULL),
(1093, '12', '1', '30', '3', 'sim', NULL),
(1094, '13', '1', '30', '3', 'sim', NULL),
(1095, '14', '1', '30', '3', 'sim', NULL),
(1096, '15', '1', '30', '3', 'sim', NULL),
(1097, '16', '1', '30', '3', 'sim', NULL),
(1098, '17', '1', '30', '3', 'sim', NULL),
(1099, '18', '1', '30', '3', 'sim', NULL),
(1100, '19', '1', '30', '3', 'sim', NULL),
(1101, '20', '1', '30', '3', 'sim', NULL),
(1102, '21', '1', '30', '3', 'sim', NULL),
(1103, '22', '1', '30', '3', 'sim', NULL),
(1104, '23', '1', '30', '3', 'sim', NULL),
(1105, '24', '1', '30', '3', 'sim', NULL),
(1106, '25', '1', '30', '3', 'sim', NULL),
(1107, '26', '1', '30', '3', 'sim', NULL),
(1108, '27', '1', '30', '3', 'sim', NULL),
(1109, '1', '1', '32', '3', 'sim', NULL),
(1110, '2', '1', '32', '3', 'sim', NULL),
(1111, '3', '1', '32', '3', 'sim', NULL),
(1112, '4', '1', '32', '3', 'sim', NULL),
(1113, '5', '1', '32', '3', 'sim', NULL),
(1114, '6', '1', '32', '3', 'sim', NULL),
(1115, '7', '1', '32', '3', 'sim', NULL),
(1116, '8', '1', '32', '3', 'sim', NULL),
(1117, '9', '1', '32', '3', 'sim', NULL),
(1118, '10', '1', '32', '3', 'sim', NULL),
(1119, '11', '1', '32', '3', 'sim', NULL),
(1120, '12', '1', '32', '3', 'sim', NULL),
(1121, '13', '1', '32', '3', 'sim', NULL),
(1122, '14', '1', '32', '3', 'sim', NULL),
(1123, '15', '1', '32', '3', 'sim', NULL),
(1124, '16', '1', '32', '3', 'sim', NULL),
(1125, '17', '1', '32', '3', 'sim', NULL),
(1126, '18', '1', '32', '3', 'sim', NULL),
(1127, '19', '1', '32', '3', 'sim', NULL),
(1128, '20', '1', '32', '3', 'sim', NULL),
(1129, '21', '1', '32', '3', 'sim', NULL),
(1130, '22', '1', '32', '3', 'sim', NULL),
(1131, '23', '1', '32', '3', 'sim', NULL),
(1132, '24', '1', '32', '3', 'sim', NULL),
(1133, '25', '1', '32', '3', 'sim', NULL),
(1134, '26', '1', '32', '3', 'sim', NULL),
(1135, '27', '1', '32', '3', 'sim', NULL),
(1136, '1', '1', '33', '3', 'sim', NULL),
(1137, '2', '1', '33', '3', 'sim', NULL),
(1138, '3', '1', '33', '3', 'sim', NULL),
(1139, '4', '1', '33', '3', 'sim', NULL),
(1140, '5', '1', '33', '3', 'sim', NULL),
(1141, '6', '1', '33', '3', 'sim', NULL),
(1142, '7', '1', '33', '3', 'sim', NULL),
(1143, '8', '1', '33', '3', 'sim', NULL),
(1144, '9', '1', '33', '3', 'sim', NULL),
(1145, '10', '1', '33', '3', 'sim', NULL),
(1146, '11', '1', '33', '3', 'sim', NULL),
(1147, '12', '1', '33', '3', 'sim', NULL),
(1148, '13', '1', '33', '3', 'sim', NULL),
(1149, '14', '1', '33', '3', 'sim', NULL),
(1150, '15', '1', '33', '3', 'sim', NULL),
(1151, '16', '1', '33', '3', 'sim', NULL),
(1152, '17', '1', '33', '3', 'sim', NULL),
(1153, '18', '1', '33', '3', 'sim', NULL),
(1154, '19', '1', '33', '3', 'sim', NULL),
(1155, '20', '1', '33', '3', 'sim', NULL),
(1156, '21', '1', '33', '3', 'sim', NULL),
(1157, '22', '1', '33', '3', 'sim', NULL),
(1158, '23', '1', '33', '3', 'sim', NULL),
(1159, '24', '1', '33', '3', 'sim', NULL),
(1160, '25', '1', '33', '3', 'sim', NULL),
(1161, '26', '1', '33', '3', 'sim', NULL),
(1162, '27', '1', '33', '3', 'sim', NULL),
(1163, '1', '1', '36', '3', 'sim', NULL),
(1164, '2', '1', '36', '3', 'sim', NULL),
(1165, '3', '1', '36', '3', 'sim', NULL),
(1166, '4', '1', '36', '3', 'sim', NULL),
(1167, '5', '1', '36', '3', 'sim', NULL),
(1168, '6', '1', '36', '3', 'sim', NULL),
(1169, '7', '1', '36', '3', 'sim', NULL),
(1170, '8', '1', '36', '3', 'sim', NULL),
(1171, '9', '1', '36', '3', 'sim', NULL),
(1172, '10', '1', '36', '3', 'sim', NULL),
(1173, '11', '1', '36', '3', 'sim', NULL),
(1174, '12', '1', '36', '3', 'sim', NULL),
(1175, '13', '1', '36', '3', 'sim', NULL),
(1176, '14', '1', '36', '3', 'sim', NULL),
(1177, '15', '1', '36', '3', 'sim', NULL),
(1178, '16', '1', '36', '3', 'sim', NULL),
(1179, '17', '1', '36', '3', 'sim', NULL),
(1180, '18', '1', '36', '3', 'sim', NULL),
(1181, '19', '1', '36', '3', 'sim', NULL),
(1182, '20', '1', '36', '3', 'sim', NULL),
(1183, '21', '1', '36', '3', 'sim', NULL),
(1184, '22', '1', '36', '3', 'sim', NULL),
(1185, '23', '1', '36', '3', 'sim', NULL),
(1186, '24', '1', '36', '3', 'sim', NULL),
(1187, '25', '1', '36', '3', 'sim', NULL),
(1188, '26', '1', '36', '3', 'sim', NULL),
(1189, '27', '1', '36', '3', 'sim', NULL),
(1190, '1', '1', '37', '3', 'sim', NULL),
(1191, '2', '1', '37', '3', 'sim', NULL),
(1192, '3', '1', '37', '3', 'sim', NULL),
(1193, '4', '1', '37', '3', 'sim', NULL),
(1194, '5', '1', '37', '3', 'sim', NULL),
(1195, '6', '1', '37', '3', 'sim', NULL),
(1196, '7', '1', '37', '3', 'sim', NULL),
(1197, '8', '1', '37', '3', 'sim', NULL),
(1198, '9', '1', '37', '3', 'sim', NULL),
(1199, '10', '1', '37', '3', 'sim', NULL),
(1200, '11', '1', '37', '3', 'sim', NULL),
(1201, '12', '1', '37', '3', 'sim', NULL),
(1202, '13', '1', '37', '3', 'sim', NULL),
(1203, '14', '1', '37', '3', 'sim', NULL),
(1204, '15', '1', '37', '3', 'sim', NULL),
(1205, '16', '1', '37', '3', 'sim', NULL),
(1206, '17', '1', '37', '3', 'sim', NULL),
(1207, '18', '1', '37', '3', 'sim', NULL),
(1208, '19', '1', '37', '3', 'sim', NULL),
(1209, '20', '1', '37', '3', 'sim', NULL),
(1210, '21', '1', '37', '3', 'sim', NULL),
(1211, '22', '1', '37', '3', 'sim', NULL),
(1212, '23', '1', '37', '3', 'sim', NULL),
(1213, '24', '1', '37', '3', 'sim', NULL),
(1214, '25', '1', '37', '3', 'sim', NULL),
(1215, '26', '1', '37', '3', 'sim', NULL),
(1216, '27', '1', '37', '3', 'sim', NULL),
(1217, '1', '1', '38', '3', 'sim', NULL),
(1218, '2', '1', '38', '3', 'sim', NULL),
(1219, '3', '1', '38', '3', 'sim', NULL),
(1220, '4', '1', '38', '3', 'sim', NULL),
(1221, '5', '1', '38', '3', 'sim', NULL),
(1222, '6', '1', '38', '3', 'sim', NULL),
(1223, '7', '1', '38', '3', 'sim', NULL),
(1224, '8', '1', '38', '3', 'sim', NULL);
INSERT INTO `item` (`id`, `item`, `course_id`, `class_id`, `phase_id`, `class`, `CTS`) VALUES
(1225, '9', '1', '38', '3', 'sim', NULL),
(1226, '10', '1', '38', '3', 'sim', NULL),
(1227, '11', '1', '38', '3', 'sim', NULL),
(1228, '12', '1', '38', '3', 'sim', NULL),
(1229, '13', '1', '38', '3', 'sim', NULL),
(1230, '14', '1', '38', '3', 'sim', NULL),
(1231, '15', '1', '38', '3', 'sim', NULL),
(1232, '16', '1', '38', '3', 'sim', NULL),
(1233, '17', '1', '38', '3', 'sim', NULL),
(1234, '18', '1', '38', '3', 'sim', NULL),
(1235, '19', '1', '38', '3', 'sim', NULL),
(1236, '20', '1', '38', '3', 'sim', NULL),
(1237, '21', '1', '38', '3', 'sim', NULL),
(1238, '22', '1', '38', '3', 'sim', NULL),
(1239, '23', '1', '38', '3', 'sim', NULL),
(1240, '24', '1', '38', '3', 'sim', NULL),
(1241, '25', '1', '38', '3', 'sim', NULL),
(1242, '26', '1', '38', '3', 'sim', NULL),
(1243, '27', '1', '38', '3', 'sim', NULL),
(1244, '1', '1', '39', '3', 'sim', NULL),
(1245, '2', '1', '39', '3', 'sim', NULL),
(1246, '3', '1', '39', '3', 'sim', NULL),
(1247, '4', '1', '39', '3', 'sim', NULL),
(1248, '5', '1', '39', '3', 'sim', NULL),
(1249, '6', '1', '39', '3', 'sim', NULL),
(1250, '7', '1', '39', '3', 'sim', NULL),
(1251, '8', '1', '39', '3', 'sim', NULL),
(1252, '9', '1', '39', '3', 'sim', NULL),
(1253, '10', '1', '39', '3', 'sim', NULL),
(1254, '11', '1', '39', '3', 'sim', NULL),
(1255, '12', '1', '39', '3', 'sim', NULL),
(1256, '13', '1', '39', '3', 'sim', NULL),
(1257, '14', '1', '39', '3', 'sim', NULL),
(1258, '15', '1', '39', '3', 'sim', NULL),
(1259, '16', '1', '39', '3', 'sim', NULL),
(1260, '17', '1', '39', '3', 'sim', NULL),
(1261, '18', '1', '39', '3', 'sim', NULL),
(1262, '19', '1', '39', '3', 'sim', NULL),
(1263, '20', '1', '39', '3', 'sim', NULL),
(1264, '21', '1', '39', '3', 'sim', NULL),
(1265, '22', '1', '39', '3', 'sim', NULL),
(1266, '23', '1', '39', '3', 'sim', NULL),
(1267, '24', '1', '39', '3', 'sim', NULL),
(1268, '25', '1', '39', '3', 'sim', NULL),
(1269, '26', '1', '39', '3', 'sim', NULL),
(1270, '27', '1', '39', '3', 'sim', NULL),
(1271, '1', '1', '40', '3', 'sim', NULL),
(1272, '2', '1', '40', '3', 'sim', NULL),
(1273, '3', '1', '40', '3', 'sim', NULL),
(1274, '4', '1', '40', '3', 'sim', NULL),
(1275, '5', '1', '40', '3', 'sim', NULL),
(1276, '6', '1', '40', '3', 'sim', NULL),
(1277, '7', '1', '40', '3', 'sim', NULL),
(1278, '8', '1', '40', '3', 'sim', NULL),
(1279, '9', '1', '40', '3', 'sim', NULL),
(1280, '10', '1', '40', '3', 'sim', NULL),
(1281, '11', '1', '40', '3', 'sim', NULL),
(1282, '12', '1', '40', '3', 'sim', NULL),
(1283, '13', '1', '40', '3', 'sim', NULL),
(1284, '14', '1', '40', '3', 'sim', NULL),
(1285, '15', '1', '40', '3', 'sim', NULL),
(1286, '16', '1', '40', '3', 'sim', NULL),
(1287, '17', '1', '40', '3', 'sim', NULL),
(1288, '18', '1', '40', '3', 'sim', NULL),
(1289, '19', '1', '40', '3', 'sim', NULL),
(1290, '20', '1', '40', '3', 'sim', NULL),
(1291, '21', '1', '40', '3', 'sim', NULL),
(1292, '22', '1', '40', '3', 'sim', NULL),
(1293, '23', '1', '40', '3', 'sim', NULL),
(1294, '24', '1', '40', '3', 'sim', NULL),
(1295, '25', '1', '40', '3', 'sim', NULL),
(1296, '26', '1', '40', '3', 'sim', NULL),
(1297, '27', '1', '40', '3', 'sim', NULL),
(1298, '1', '1', '41', '3', 'sim', NULL),
(1299, '2', '1', '41', '3', 'sim', NULL),
(1300, '3', '1', '41', '3', 'sim', NULL),
(1301, '4', '1', '41', '3', 'sim', NULL),
(1302, '5', '1', '41', '3', 'sim', NULL),
(1303, '6', '1', '41', '3', 'sim', NULL),
(1304, '7', '1', '41', '3', 'sim', NULL),
(1305, '8', '1', '41', '3', 'sim', NULL),
(1306, '9', '1', '41', '3', 'sim', NULL),
(1307, '10', '1', '41', '3', 'sim', NULL),
(1308, '11', '1', '41', '3', 'sim', NULL),
(1309, '12', '1', '41', '3', 'sim', NULL),
(1310, '13', '1', '41', '3', 'sim', NULL),
(1311, '14', '1', '41', '3', 'sim', NULL),
(1312, '15', '1', '41', '3', 'sim', NULL),
(1313, '16', '1', '41', '3', 'sim', NULL),
(1314, '17', '1', '41', '3', 'sim', NULL),
(1315, '18', '1', '41', '3', 'sim', NULL),
(1316, '19', '1', '41', '3', 'sim', NULL),
(1317, '20', '1', '41', '3', 'sim', NULL),
(1318, '21', '1', '41', '3', 'sim', NULL),
(1319, '22', '1', '41', '3', 'sim', NULL),
(1320, '23', '1', '41', '3', 'sim', NULL),
(1321, '24', '1', '41', '3', 'sim', NULL),
(1322, '25', '1', '41', '3', 'sim', NULL),
(1323, '26', '1', '41', '3', 'sim', NULL),
(1324, '27', '1', '41', '3', 'sim', NULL),
(1325, '1', '1', '42', '3', 'sim', NULL),
(1326, '2', '1', '42', '3', 'sim', NULL),
(1327, '3', '1', '42', '3', 'sim', NULL),
(1328, '4', '1', '42', '3', 'sim', NULL),
(1329, '5', '1', '42', '3', 'sim', NULL),
(1330, '6', '1', '42', '3', 'sim', NULL),
(1331, '7', '1', '42', '3', 'sim', NULL),
(1332, '8', '1', '42', '3', 'sim', NULL),
(1333, '9', '1', '42', '3', 'sim', NULL),
(1334, '10', '1', '42', '3', 'sim', NULL),
(1335, '11', '1', '42', '3', 'sim', NULL),
(1336, '12', '1', '42', '3', 'sim', NULL),
(1337, '13', '1', '42', '3', 'sim', NULL),
(1338, '14', '1', '42', '3', 'sim', NULL),
(1339, '15', '1', '42', '3', 'sim', NULL),
(1340, '16', '1', '42', '3', 'sim', NULL),
(1341, '17', '1', '42', '3', 'sim', NULL),
(1342, '18', '1', '42', '3', 'sim', NULL),
(1343, '19', '1', '42', '3', 'sim', NULL),
(1344, '20', '1', '42', '3', 'sim', NULL),
(1345, '21', '1', '42', '3', 'sim', NULL),
(1346, '22', '1', '42', '3', 'sim', NULL),
(1347, '23', '1', '42', '3', 'sim', NULL),
(1348, '24', '1', '42', '3', 'sim', NULL),
(1349, '25', '1', '42', '3', 'sim', NULL),
(1350, '26', '1', '42', '3', 'sim', NULL),
(1351, '27', '1', '42', '3', 'sim', NULL),
(1352, '1', '1', '43', '3', 'sim', NULL),
(1353, '2', '1', '43', '3', 'sim', NULL),
(1354, '3', '1', '43', '3', 'sim', NULL),
(1355, '4', '1', '43', '3', 'sim', NULL),
(1356, '5', '1', '43', '3', 'sim', NULL),
(1357, '6', '1', '43', '3', 'sim', NULL),
(1358, '7', '1', '43', '3', 'sim', NULL),
(1359, '8', '1', '43', '3', 'sim', NULL),
(1360, '9', '1', '43', '3', 'sim', NULL),
(1361, '10', '1', '43', '3', 'sim', NULL),
(1362, '11', '1', '43', '3', 'sim', NULL),
(1363, '12', '1', '43', '3', 'sim', NULL),
(1364, '13', '1', '43', '3', 'sim', NULL),
(1365, '14', '1', '43', '3', 'sim', NULL),
(1366, '15', '1', '43', '3', 'sim', NULL),
(1367, '16', '1', '43', '3', 'sim', NULL),
(1368, '17', '1', '43', '3', 'sim', NULL),
(1369, '18', '1', '43', '3', 'sim', NULL),
(1370, '19', '1', '43', '3', 'sim', NULL),
(1371, '20', '1', '43', '3', 'sim', NULL),
(1372, '21', '1', '43', '3', 'sim', NULL),
(1373, '22', '1', '43', '3', 'sim', NULL),
(1374, '23', '1', '43', '3', 'sim', NULL),
(1375, '24', '1', '43', '3', 'sim', NULL),
(1376, '25', '1', '43', '3', 'sim', NULL),
(1377, '26', '1', '43', '3', 'sim', NULL),
(1378, '27', '1', '43', '3', 'sim', NULL),
(1379, '1', '1', '45', '3', 'sim', NULL),
(1380, '2', '1', '45', '3', 'sim', NULL),
(1381, '3', '1', '45', '3', 'sim', NULL),
(1382, '4', '1', '45', '3', 'sim', NULL),
(1383, '5', '1', '45', '3', 'sim', NULL),
(1384, '6', '1', '45', '3', 'sim', NULL),
(1385, '7', '1', '45', '3', 'sim', NULL),
(1386, '8', '1', '45', '3', 'sim', NULL),
(1387, '9', '1', '45', '3', 'sim', NULL),
(1388, '10', '1', '45', '3', 'sim', NULL),
(1389, '11', '1', '45', '3', 'sim', NULL),
(1390, '12', '1', '45', '3', 'sim', NULL),
(1391, '13', '1', '45', '3', 'sim', NULL),
(1392, '14', '1', '45', '3', 'sim', NULL),
(1393, '15', '1', '45', '3', 'sim', NULL),
(1394, '16', '1', '45', '3', 'sim', NULL),
(1395, '17', '1', '45', '3', 'sim', NULL),
(1396, '18', '1', '45', '3', 'sim', NULL),
(1397, '19', '1', '45', '3', 'sim', NULL),
(1398, '20', '1', '45', '3', 'sim', NULL),
(1399, '21', '1', '45', '3', 'sim', NULL),
(1400, '22', '1', '45', '3', 'sim', NULL),
(1401, '23', '1', '45', '3', 'sim', NULL),
(1402, '24', '1', '45', '3', 'sim', NULL),
(1403, '25', '1', '45', '3', 'sim', NULL),
(1404, '26', '1', '45', '3', 'sim', NULL),
(1405, '27', '1', '45', '3', 'sim', NULL),
(1406, '1', '1', '46', '3', 'sim', NULL),
(1407, '2', '1', '46', '3', 'sim', NULL),
(1408, '3', '1', '46', '3', 'sim', NULL),
(1409, '4', '1', '46', '3', 'sim', NULL),
(1410, '5', '1', '46', '3', 'sim', NULL),
(1411, '6', '1', '46', '3', 'sim', NULL),
(1412, '7', '1', '46', '3', 'sim', NULL),
(1413, '8', '1', '46', '3', 'sim', NULL),
(1414, '9', '1', '46', '3', 'sim', NULL),
(1415, '10', '1', '46', '3', 'sim', NULL),
(1416, '11', '1', '46', '3', 'sim', NULL),
(1417, '12', '1', '46', '3', 'sim', NULL),
(1418, '13', '1', '46', '3', 'sim', NULL),
(1419, '14', '1', '46', '3', 'sim', NULL),
(1420, '15', '1', '46', '3', 'sim', NULL),
(1421, '16', '1', '46', '3', 'sim', NULL),
(1422, '17', '1', '46', '3', 'sim', NULL),
(1423, '18', '1', '46', '3', 'sim', NULL),
(1424, '19', '1', '46', '3', 'sim', NULL),
(1425, '20', '1', '46', '3', 'sim', NULL),
(1426, '21', '1', '46', '3', 'sim', NULL),
(1427, '22', '1', '46', '3', 'sim', NULL),
(1428, '23', '1', '46', '3', 'sim', NULL),
(1429, '24', '1', '46', '3', 'sim', NULL),
(1430, '25', '1', '46', '3', 'sim', NULL),
(1431, '26', '1', '46', '3', 'sim', NULL),
(1432, '27', '1', '46', '3', 'sim', NULL),
(5000, '2', '1', '2', '1', 'actual', '1'),
(5001, '3', '1', '2', '1', 'actual', '1'),
(5002, '4', '1', '2', '1', 'actual', '1'),
(5003, '5', '1', '2', '1', 'actual', NULL),
(5004, '6', '1', '2', '1', 'actual', NULL),
(5005, '7', '1', '2', '1', 'actual', NULL),
(5006, '8', '1', '2', '1', 'actual', NULL),
(5007, '9', '1', '2', '1', 'actual', NULL),
(5008, '10', '1', '2', '1', 'actual', NULL),
(5009, '11', '1', '2', '1', 'actual', NULL),
(5010, '12', '1', '2', '1', 'actual', NULL),
(5011, '13', '1', '2', '1', 'actual', NULL),
(5012, '14', '1', '2', '1', 'actual', NULL),
(5013, '15', '1', '2', '1', 'actual', NULL),
(5014, '16', '1', '2', '1', 'actual', NULL),
(5015, '17', '1', '2', '1', 'actual', NULL),
(5016, '18', '1', '2', '1', 'actual', NULL),
(5017, '19', '1', '2', '1', 'actual', NULL),
(5018, '20', '1', '2', '1', 'actual', NULL),
(5019, '21', '1', '2', '1', 'actual', NULL),
(5020, '22', '1', '2', '1', 'actual', NULL),
(5021, '23', '1', '2', '1', 'actual', NULL),
(5022, '24', '1', '2', '1', 'actual', NULL),
(5023, '25', '1', '2', '1', 'actual', NULL),
(5024, '26', '1', '2', '1', 'actual', NULL),
(5025, '27', '1', '2', '1', 'actual', NULL);

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
(3, 'Item -1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(14, '29', '18', 'G', '1', '2023-08-17'),
(15, '29', '1', 'F', '1', '2023-08-31'),
(16, '29', '2', 'E', '1', '2023-08-31'),
(17, '29', '5', '', '1', '2023-08-31'),
(18, '29', '6', '', '1', '2023-08-31'),
(19, '29', '7', 'G', '1', '2023-08-31'),
(20, '29', '8', '', '1', '2023-08-31'),
(21, '29', '9', '', '1', '2023-08-31'),
(22, '29', '10', 'E', '1', '2023-08-31'),
(23, '29', '11', '', '1', '2023-08-31');

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
(1, '29', '26', 'U', '2023-10-05'),
(2, '29', '5000', 'F', '2023-10-05'),
(3, '29', '5001', 'U', '2023-10-05'),
(4, '29', '5002', '', '2023-10-05'),
(5, '29', '5003', 'F', '2023-10-05'),
(6, '29', '5004', 'U', '2023-10-05'),
(7, '29', '5005', '', '2023-10-05'),
(8, '29', '5006', 'F', '2023-10-05'),
(9, '29', '5007', '', '2023-10-05'),
(10, '29', '5008', '', '2023-10-05'),
(11, '29', '5009', '', '2023-10-05'),
(12, '29', '5010', '', '2023-10-05'),
(13, '29', '5011', '', '2023-10-05'),
(14, '29', '5012', '', '2023-10-05'),
(15, '29', '5013', '', '2023-10-05'),
(16, '29', '5014', '', '2023-10-05'),
(17, '29', '5015', '', '2023-10-05'),
(18, '29', '5016', '', '2023-10-05'),
(19, '29', '5017', '', '2023-10-05'),
(20, '29', '5018', '', '2023-10-05'),
(21, '29', '5019', '', '2023-10-05'),
(22, '29', '5020', '', '2023-10-05'),
(23, '29', '5021', '', '2023-10-05'),
(24, '29', '5022', '', '2023-10-05'),
(25, '29', '12', 'U', '2023-10-05'),
(26, '29', '13', 'F', '2023-10-05'),
(27, '29', '14', '', '2023-10-05'),
(28, '29', '15', '', '2023-10-05'),
(29, '29', '16', '', '2023-10-05'),
(30, '29', '17', '', '2023-10-05'),
(31, '29', '18', '', '2023-10-05'),
(32, '34', '12', 'U', '2023-10-05'),
(33, '34', '13', 'F', '2023-10-05'),
(34, '34', '14', '', '2023-10-05'),
(35, '34', '15', '', '2023-10-05'),
(36, '34', '16', '', '2023-10-05'),
(37, '34', '17', '', '2023-10-05'),
(38, '34', '18', '', '2023-10-05');

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
-- Table structure for table `logo_cert`
--

CREATE TABLE `logo_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `image_height` varchar(255) DEFAULT NULL,
  `image_width` varchar(255) DEFAULT NULL,
  `border_radius` varchar(255) DEFAULT NULL,
  `border` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo_cert`
--

INSERT INTO `logo_cert` (`id`, `cert_id`, `image_height`, `image_width`, `border_radius`, `border`, `border_color`, `file_name`, `status`) VALUES
(2, '2', '200', '150', '0', '0', '#ffffff', 'logo_cer.jpg', '1');

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
  `phase_id` varchar(255) DEFAULT NULL,
  `intructor` varchar(255) DEFAULT NULL,
  `b_up_manger` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `phaseDate` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_role_course_phase`
--

INSERT INTO `manage_role_course_phase` (`id`, `phase_id`, `intructor`, `b_up_manger`, `course_id`, `phaseDate`, `courseName`, `courseCode`) VALUES
(1, '1', '12', '12', '1', '2023-08-01', '1', '1'),
(2, '3', '12', '12', '1', '2023-08-01', '1', '1'),
(3, '1', '12', '12', '22', '2023-08-08', '1', '5'),
(4, '3', '12', '12', '22', '2023-08-08', '1', '5');

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
  `fileExt` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `date`, `inst_id`, `topic`, `comment`, `student_id`, `course_id`, `memomarks`, `fileName`, `fileExt`, `categoryId`) VALUES
(1, '2023-08-02', '11', NULL, 'Memorandum for record', '29', '1', '', 'item.csv', 'csv', '1'),
(2, '2023-08-08', '11', NULL, 'memo ', '29', '1', '', 'Gardening Dep.csv', 'csv', '3'),
(3, '2023-09-12', '11', NULL, 'frf', '29', '1', '7', '', '', 'absent'),
(4, '2023-09-13', '11', NULL, 'sfg', '29', '1', '5', '', '', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `memoabs`
--

CREATE TABLE `memoabs` (
  `id` int(11) NOT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `absday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, '2', 'Parking School', '2023-07-07', 6, '35', '15', NULL, NULL, '', NULL),
(28, '2', 'Parking School', '2023-07-24', 7, '28', '12', NULL, NULL, '', NULL),
(29, '1', 'Driving Beginner', '2023-07-13', 8, '32', '12', NULL, NULL, '', NULL),
(30, '1', 'Parking School', '2023-07-18', 5, '34', '15', NULL, NULL, NULL, NULL);

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
  `editorData` longtext DEFAULT NULL,
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
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_data` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `permission` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `to_userid`, `if_admin`, `type`, `data`, `extra_data`, `class_id`, `class_name`, `is_read`, `permission`, `date`) VALUES
(2, '29', '60', NULL, 'actual', '5', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-09-18 14:49:52.000000'),
(3, '29', '60', 'super admin', 'actual', '5', 'requesting to unlock', NULL, NULL, 0, 0, '2023-09-18 14:51:31.000000'),
(4, '29', '60', NULL, 'actual', '5', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-09-18 14:51:57.000000'),
(5, '29', '15', NULL, 'actual', '10', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-09-20 15:38:18.000000'),
(6, '34', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-28 14:08:53.000000'),
(7, '12', '34', NULL, 'actual', '1', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-28 14:09:44.000000'),
(8, '34', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-28 14:36:17.000000'),
(9, '12', '34', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-28 14:36:47.000000'),
(10, '34', '12', NULL, 'actual', '19', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-28 16:12:34.000000'),
(11, '12', '34', NULL, 'actual', '19', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-28 16:13:42.000000'),
(12, '29', '12', NULL, 'actual', '19', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-28 16:16:37.000000'),
(13, '12', '29', NULL, 'actual', '19', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-28 16:16:52.000000'),
(14, '29', '12', NULL, 'actual', '19', 'cloned_gradsheet', NULL, NULL, 1, 1, '2023-09-28 16:17:39.000000'),
(15, '', '29', NULL, 'actual', '19', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-09-28 16:18:06.000000'),
(16, '29', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-10-05 20:20:06.000000'),
(17, '12', '29', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-10-05 20:20:54.000000'),
(18, '29', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-10-05 20:47:25.000000'),
(19, '29', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-10-05 20:48:46.000000'),
(20, '12', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-10-05 20:49:19.000000'),
(21, '34', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-10-05 20:53:44.000000'),
(22, '12', '34', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-10-05 20:54:11.000000');

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
-- Table structure for table `originalcertificate`
--

CREATE TABLE `originalcertificate` (
  `id` int(11) NOT NULL,
  `certificateId` varchar(255) DEFAULT NULL,
  `certificateHtml` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `originalcertificate`
--

INSERT INTO `originalcertificate` (`id`, `certificateId`, `certificateHtml`) VALUES
(2, '6', '\n                \n                                      <div id=\"resizable13\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"width: 200px; height: 200px; padding: 0.5em; position: relative; left: 516.889px; top: 544.889px;\">\n                        <img src=\"/latest/TOS/includes/Pages/draganddropimg/logo_cer.jpg\" alt=\"Your Image\" style=\"height:200px;width:200px;border-radius:50px;border:3px solid #ffae00\" class=\"ui-widget-header get_id_class\" data-value=\"logo_cert\" data-id=\"3\">\n                        <a style=\"float:right\" href=\"delete_logo_id.php?id=3\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                 \n                                    <div id=\"resizables38\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; width: 440.875px; height: 135.111px; left: 482.889px; top: -7.11111px;\">\n                        <h1 style=\"background-color:#ffffff;color:#000000;;font-family:JasmineUPC;font-size:50px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"38\">students Names</h1>                         <a href=\"delete_heading_id.php?id=38\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                 \n              '),
(3, '5', '\n                \n                \n                \n                \n                \n                                      <div id=\"resizable13\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"width: 1300px; height:800px; padding: 0.5em; position: relative;z-index:0\">\n                        <img src=\"/latest/TOS/includes/Pages/draganddropimg/frame1.jpg\" alt=\"Your Image\" style=\"height:800px;width:1300px;border-radius:0px;border:0px solid #000000\" class=\"ui-widget-header get_id_class\" data-value=\"frame_cert\" data-id=\"3\">\n                        <a style=\"float:right\" href=\"delete_frame_id.php?id=3\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables13\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 397.889px; top: -668.111px; width: 448.653px; height: 85.1112px;\">\n                        <h1 style=\"background-color:#ffffff;color:#d81313;font-style: italic;;font-family:Comic Sans MS;font-size:60px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"13\">CERTIFICATE</h1>                         <a href=\"delete_heading_id.php?id=13\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizable33\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 210.889px; top: -645.111px; width: 886.875px; height: 373.319px;\">\n                        <p style=\"background-color:#000000;color:#fffafa;font-style: italic;;font-family:Comic Sans MS;font-size:30px\" class=\"get_id_class\" data-value=\"para_cert\" data-id=\"3\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. </p>                           <a href=\"delete_para_id.php?id=3\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizable25\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 909.889px; top: -632.111px; height: 90.5555px; width: 233.442px;\">\n                        <hr style=\"width:120px;border-top: 3px solid #000000;\" data-value=\"horizontal_cert\" data-id=\"5\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=5\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                               \n                           \n                           \n                           \n                           \n                           \n              '),
(4, '2', '\n                                      <div id=\"resizable11\" class=\"ui-widget-content drag_and_drop\" style=\"width: 1300px; height:800px; padding: 0.5em; position: relative;z-index:0\">\n                        <img src=\"/latest/TOS/includes/Pages/draganddropimg/frame.png\" alt=\"Your Image\" style=\"height:800px;width:1300px;border-radius:0px;border:1px solid #000000\" class=\"ui-widget-header get_id_class\" data-value=\"frame_cert\" data-id=\"1\">\n                        <a style=\"float:right\" href=\"delete_frame_id.php?id=1\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizable1\" class=\"ui-widget-content drag_and_drop\" style=\"width: 100px; height:100px; padding: 0.5em; position: relative;\">\n                        <img src=\"/latest/TOS/includes/Pages/upload/850_6727-PRINT.jpg\" alt=\"Your Image\" style=\"height:100px;width:100px;border-radius:50px;border:9px solid #000000\" data-value=\"image_cert\" data-id=\"1\" class=\"ui-widget-header get_id_class\">\n                        <a href=\"delete_image_id.php?id=1\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizables5\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 317.889px; top: -761.111px; width: 672.442px; height: 123.889px;\">\n                        <h1 style=\"background-color:#f28307;color:#0d1d40;;font-family:Comic Sans MS;font-size:50px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"5\">Certifcates of student</h1>                         <a href=\"delete_heading_id.php?id=5\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables6\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <h4 style=\"background-color:#ffffff;color:#00ffb3;;font-family:New Century Schoolbook;font-size:30px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"6\">students Names</h4>                         <a href=\"delete_heading_id.php?id=6\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizable31\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <p style=\"background-color:#ffffff;color:#f00a0a;font-weight: bold;font-family:Big Caslon;font-size:20px\" class=\"get_id_class\" data-value=\"para_cert\" data-id=\"1\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. Aliquam erat volutpat. Integer efficitur, arcu at congue consectetur, </p>                           <a href=\"delete_para_id.php?id=1\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                 \n              '),
(5, '9', '\n                \n                \n                                      <div id=\"resizables37\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; width: 513.653px; height: 92.1111px; left: 359.889px; top: 34.8889px;\">\n                        <h1 style=\"background-color:#ffffff;color:#fd0808;;font-family:JasmineUPC;font-size:50px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"37\">super admins Names</h1>                         <a href=\"delete_heading_id.php?id=37\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                 \n                                    <div id=\"resizable36\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 530.889px; top: 77.8889px; width: 174.652px; height: 56.8889px;\">\n                        <p style=\"background-color:#000000;color:#ffffff;;font-family:Times New Roman;font-size:10px\" class=\"get_id_class\" data-value=\"para_cert\" data-id=\"6\">56h5yh56j57j67j67</p>                           <a href=\"delete_para_id.php?id=6\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                 \n                                    <div id=\"resizable28\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 223.889px; top: 116.889px; height: 74.5555px; width: 290.442px;\">\n                        <hr style=\"width:1000px;border-top: 3px solid #000000;\" data-value=\"horizontal_cert\" data-id=\"8\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=8\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                               \n              '),
(6, '7', '\n                \n                                      <div id=\"resizable37\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; height: 147.111px; width: 344.444px; left: 177.889px; top: 45.8889px;\">\n                        <p style=\"background-color:#000000;color:#fffafa;;font-family:Times New Roman;font-size:80px\" class=\"get_id_class\" data-value=\"para_cert\" data-id=\"7\">thrthrth</p>                           <a href=\"delete_para_id.php?id=7\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                 \n                                    <div id=\"resizable29\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; width: 152.444px; height: 122.556px; left: 306.889px; top: 84.8889px;\">\n                        <hr style=\"width:60px;border-top: 3px solid #000000;\" data-value=\"horizontal_cert\" data-id=\"9\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=9\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                               \n              '),
(7, '4', '\n                \n                \n                \n                \n                                      <div id=\"resizable12\" class=\"ui-widget-content drag_and_drop\" style=\"width: 1300px; height:800px; padding: 0.5em; position: relative;z-index:0\">\n                        <img src=\"/latest/TOS/includes/Pages/draganddropimg/frame1.jpg\" alt=\"Your Image\" style=\"height:800px;width:1300px;border-radius:0px;border:0px solid #000000\" class=\"ui-widget-header get_id_class\" data-value=\"frame_cert\" data-id=\"2\">\n                        <a style=\"float:right\" href=\"delete_frame_id.php?id=2\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizables7\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 413.889px; top: -662.111px; width: 509.442px; height: 112.889px;\">\n                        <h1 style=\"background-color:#fcfcfc;color:#0d1d40;font-weight: bold;font-family:Times New Roman;font-size:70px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"7\">CERTIFICATE</h1>                         <a href=\"delete_heading_id.php?id=7\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables8\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; left: 521.889px; top: -651.111px; width: 321.442px; height: 58.8889px;\">\n                        <h3 style=\"background-color:#ffffff;color:#0d1a40;font-weight: bold;font-family:Times New Roman;font-size:20px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"8\">Of Achievement</h3>                         <a href=\"delete_heading_id.php?id=8\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables9\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; width: 308.653px; height: 47.8889px; left: 531.889px; top: -641.111px;\">\n                        <h5 style=\"background-color:#ffffff;color:#0d1d40;font-weight: bold;font-family:New Century Schoolbook;font-size:15px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"9\">This certificate is Proudly Presented To</h5>                         <a href=\"delete_heading_id.php?id=9\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables10\" class=\"ui-widget-content drag_and_drop ui-resizable ui-draggable ui-draggable-handle\" style=\"padding: 0.5em; position: relative; width: 405.442px; height: 81.8892px; left: 470.889px; top: -620.111px;\">\n                        <h1 style=\"background-color:#fffafa;color:#0d1d40;font-style: italic;;font-family:Comic Sans MS;font-size:50px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"10\">students Names</h1>                         <a href=\"delete_heading_id.php?id=10\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      <div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div></div>\n                                          <div id=\"resizables11\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <h3 style=\"background-color:#fffafa;color:#0d1840;font-weight: bold;font-family:Big Caslon;font-size:25px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"11\">DATE</h3>                         <a href=\"delete_heading_id.php?id=11\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizables12\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <h3 style=\"background-color:#fffafa;color:#0d1840;font-weight: bold;font-family:Big Caslon;font-size:20px\" class=\"get_id_class\" data-value=\"heading_cert\" data-id=\"12\">SIGNATURE</h3>                         <a href=\"delete_heading_id.php?id=12\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizable32\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <p style=\"background-color:#ffffff;color:#0d1a40;font-style: italic;;font-family:Optima;font-size:10px\" class=\"get_id_class\" data-value=\"para_cert\" data-id=\"2\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. </p>                           <a href=\"delete_para_id.php?id=2\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                          <div id=\"resizable21\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <hr style=\"width:100px;border-top: 3px solid #0d1d40;\" data-value=\"horizontal_cert\" data-id=\"1\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=1\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                        <div id=\"resizable22\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <hr style=\"width:100px;border-top: 3px solid #0d1d40;\" data-value=\"horizontal_cert\" data-id=\"2\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=2\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                        <div id=\"resizable23\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <hr style=\"width:200px;border-top: 3px solid #0d1845;\" data-value=\"horizontal_cert\" data-id=\"3\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=3\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                                        <div id=\"resizable24\" class=\"ui-widget-content drag_and_drop\" style=\"padding: 0.5em; position: relative;\">\n                        <hr style=\"width:200px;border-top: 3px solid #0d1845;\" data-value=\"horizontal_cert\" data-id=\"4\" class=\"get_id_class\">\n                        <a href=\"delete_horizontal_id.php?id=4\"><i class=\"bi bi-x-circle-fill text-danger\"></i></a>\n                      </div>\n                               \n                           \n                           \n                           \n                           \n              ');

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
-- Table structure for table `para_cert`
--

CREATE TABLE `para_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `text_data` varchar(2000) DEFAULT NULL,
  `heading_backgoround` varchar(255) DEFAULT NULL,
  `heading_text` varchar(255) DEFAULT NULL,
  `font_size_height` varchar(255) DEFAULT NULL,
  `text_type_heading` varchar(255) DEFAULT NULL,
  `font_style` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `para_cert`
--

INSERT INTO `para_cert` (`id`, `cert_id`, `text_data`, `heading_backgoround`, `heading_text`, `font_size_height`, `text_type_heading`, `font_style`, `status`) VALUES
(1, '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. Aliquam erat volutpat. Integer efficitur, arcu at congue consectetur, ', '#ffffff', '#f00a0a', '20', 'Bold', 'Big Caslon', '1'),
(2, '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. ', '#ffffff', '#0d1a40', '10', 'italic', 'Optima', '1'),
(3, '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo, libero nec ultrices ultricies, augue libero cursus mi, a sollicitudin purus massa eu nibh. Fusce bibendum erat nec elit hendrerit, sed sollicitudin justo iaculis. Pellentesque fermentum felis a justo facilisis, ac interdum mi ullamcorper. Donec euismod velit ac justo eleifend, ut interdum justo varius. Vivamus eget nunc id velit ultrices venenatis eu vitae nulla. ', '#000000', '#fffafa', '30', 'italic', 'Comic Sans MS', '1'),
(6, '9', '56h5yh56j57j67j67', '#000000', '#ffffff', '10', '', 'Times New Roman', '1'),
(7, '7', 'thrthrth', '#000000', '#fffafa', '80', '', 'Times New Roman', '1');

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
-- Table structure for table `per_checklist`
--

CREATE TABLE `per_checklist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `per_checklist`
--

INSERT INTO `per_checklist` (`id`, `user_id`, `title`, `description`, `status`, `priority`, `comment`, `date`, `category`, `color`) VALUES
(1, '11', 'checklist per 1skjvbfkgv', 'TOS Academy offers a diverse array of online and offline courses', 'Complted', 'low', 'hello wolrd', '2023-09-07', 'Category 33', '#ea1a1a'),
(4, '11', 'checklist4 test', NULL, NULL, NULL, NULL, '2023-09-12 12:59:36', NULL, '#14e16d'),
(5, '11', 'checkist5', NULL, NULL, NULL, NULL, '2023-09-12 13:11:25', NULL, NULL),
(6, '11', 'checklist6', NULL, NULL, NULL, NULL, '2023-09-12 13:12:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `per_check_sub_checklist`
--

CREATE TABLE `per_check_sub_checklist` (
  `id` int(11) NOT NULL,
  `checkListId` varchar(255) DEFAULT NULL,
  `subCheckListId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `per_check_sub_checklist`
--

INSERT INTO `per_check_sub_checklist` (`id`, `checkListId`, `subCheckListId`, `userId`) VALUES
(2, '1', '1', '11'),
(3, '1', '2', '11');

-- --------------------------------------------------------

--
-- Table structure for table `per_subchecklist`
--

CREATE TABLE `per_subchecklist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `main_checklist_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `per_subchecklist`
--

INSERT INTO `per_subchecklist` (`id`, `user_id`, `name`, `main_checklist_id`, `description`, `status`, `priority`, `category`, `comment`, `date`) VALUES
(1, '', 'sub1', '1', NULL, NULL, NULL, NULL, NULL, '2023-10-03 12:25:32'),
(2, '', 'sub2', '1', NULL, NULL, NULL, NULL, NULL, '2023-10-03 12:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `per_subchecklistfile`
--

CREATE TABLE `per_subchecklistfile` (
  `id` int(11) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `checkId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `per_subchecklistfile`
--

INSERT INTO `per_subchecklistfile` (`id`, `fileName`, `lastName`, `fileType`, `checkId`, `subCheckId`) VALUES
(1, 'C:\\xampp\\htdocs\\latest\\TOS', 'C:xampph', 'offline', '1', '1');

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
(3, 'Parking', NULL, '1', '#c0c318', NULL),
(7, 'parking1', NULL, '1', '#c82d2d', NULL),
(8, 'engin', NULL, '1', '#14d768', NULL),
(9, 'testing', NULL, '1', '#f0ca0a', NULL),
(10, 'parking2', NULL, '1', '#fb8804', NULL),
(11, 'engin1', NULL, '1', '#f510f9', NULL),
(12, 'testing2', NULL, '1', '#9f20d9', NULL),
(13, 'demo', NULL, '1', '#22ba17', NULL),
(14, 'demo1', NULL, '1', '#ff1900', NULL),
(15, 'demo3', NULL, '1', '#fbf432', NULL),
(16, 'demo5', NULL, '1', '#6bffbf', NULL),
(17, 'phase_1', NULL, '1', '#73f2c8', NULL),
(18, 'phase3', NULL, '1', '#37821c', NULL),
(19, 'phase4', NULL, '1', '#4df3ff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `popup`
--

CREATE TABLE `popup` (
  `id` int(100) NOT NULL,
  `item` text DEFAULT NULL,
  `subitem` text DEFAULT NULL,
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
(17, '17', NULL, '', '1'),
(18, '18', NULL, '', '1'),
(19, '19', NULL, '', '1'),
(20, '20', NULL, '', '1'),
(21, '21', NULL, '', '1'),
(22, '22', NULL, '', '1'),
(23, '23', NULL, '', '1'),
(24, '24', NULL, '', '1'),
(25, '25', NULL, '', '1'),
(26, '26', NULL, '', '1'),
(27, '27', NULL, '', '1'),
(28, NULL, '1', '', '1'),
(29, NULL, '2', '', '1'),
(30, NULL, '3', '', '1'),
(31, NULL, '4', '', '1'),
(32, NULL, '5', '', '1'),
(33, NULL, '6', '', '1'),
(34, NULL, '7', '', '1'),
(35, NULL, '8', '', '1');

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

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quiz`, `phase`, `ctp`, `percentage`, `date`) VALUES
(1, 'Subject1', '', '1', '100', '2023-09-04'),
(2, 'Subject2', '', '1', '100', '2023-09-04'),
(3, 'Subject3', '', '1', '100', '2023-09-04'),
(4, 'Subject4', '', '1', '100', '2023-09-04'),
(5, 'Subject5', '', '1', '100', '2023-09-04'),
(6, 'Subject6', '', '1', '100', '2023-09-04'),
(7, 'Subject7', '', '1', '100', '2023-09-04'),
(8, 'Subject8', '', '1', '100', '2023-09-04');

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

--
-- Dumping data for table `quiz_marks`
--

INSERT INTO `quiz_marks` (`id`, `quiz_id`, `marks`, `student_id`, `course_id`, `created`, `status`, `userId`) VALUES
(1, '1', '90', '29', '1', '2023-09-04', '1', '11'),
(2, '2', '80', '29', '1', '2023-09-04', '1', '11'),
(3, '3', '70', '29', '1', '2023-09-04', '1', '11'),
(4, '4', '60', '29', '1', '2023-09-04', '1', '11'),
(5, '5', '50', '29', '1', '2023-09-04', '1', '11'),
(6, '6', '88', '29', '1', '2023-09-04', '1', '11');

-- --------------------------------------------------------

--
-- Table structure for table `rolepermission`
--

CREATE TABLE `rolepermission` (
  `id` int(11) NOT NULL,
  `rolePermission` varchar(255) DEFAULT NULL,
  `cardName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rolepermission`
--

INSERT INTO `rolepermission` (`id`, `rolePermission`, `cardName`) VALUES
(1, 'instructor', 'allGradsheet');

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
(1, 'instructor', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL),
(2, 'student', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"0\";s:22:\"select_student_details\";s:1:\"1\";}', NULL),
(3, 'super admin', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL),
(4, 'IT people', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', '#b6b11b'),
(5, 'instructors', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL);

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
(2, 'shop1', 'hello1.png'),
(3, 'shop3', 'hello.jpg'),
(4, 'shop8', 'hello1.png'),
(5, 'shop10', 'File management v3.png'),
(6, 'Shop test', 'hello.jpg');

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
  `days` int(30) DEFAULT NULL,
  `linesRequired` int(255) DEFAULT NULL,
  `studentPerClass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`id`, `sim`, `shortsim`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`, `linesRequired`, `studentPerClass`) VALUES
(1, 'Front Sim', 'SDR-2', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(2, 'Front drive', 'SDR-1', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(3, 'Front Sim', 'SDR-6', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(4, 'Front drive', 'SDR-1', '', 100, '1', '1', '2023-07-21', 4, 4, '2'),
(5, 'Parking ', 'SDR-2', '', 100, '1', '1', '2023-07-21', 6, NULL, NULL),
(6, 'jhgdjhf', 'SDR-3', '', 100, '1', '1', '2023-07-21', NULL, NULL, NULL),
(7, 'Front Sim', 'SDR-4', '', 100, '1', '1', '2023-07-21', NULL, NULL, NULL),
(8, 'Front drive', 'SDR-62', '', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(9, 'ghj', 'SDR-14', '', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(10, 'Front drive', 'SDR-61', '', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(11, 'Front drive', 'SDR-6225', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(12, 'ghj', 'SDR-145', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(13, 'Front drive', 'SDR-615', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(14, 'Front Sim', 'SDR-42', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(15, 'Front Sim', 'door', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(16, 'Front Sim', 'SDR-60', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(17, 'ghj', 'SDR-19', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(18, 'Parking ', 'SDR-134', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(19, 'Front drive', '   s  s s', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(20, 'Front Sim', 'park', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(21, 'Front Sim', 'back', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(22, 'Front drive', 'SDR-15', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(23, 'jhgdjhf', 'SDR-191', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(24, 'Parking ', 'SDR-623', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(25, 'Front drive', 'back46', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(26, 'Parking ', 'SDR-1p2i', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(27, 'Front Sim', 'whio', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(28, 'Front drive', 'jeiekwl', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(29, 'demo34', 'sim-122', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(30, 'demor4', 'ser-1', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(31, 'were', 'wr-4', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(32, 'demo56', 'Si-4', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(33, 'demo56r', 'Si-56', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(34, 'demo56re', 'sim-123', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(35, 'demo56rf', 'sim-125', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(36, 'demo56rv', 'sim-128', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(37, 'demo56rd', 'sim-1245', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(38, 'demo56rt', 'sim-1265', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(39, 'simulation1', 'sm-1', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(40, 'simulation2', 'sm-3', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(41, 'simulation3', 'sm-2', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(42, 'simulation5', 'sm-4', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(43, 'simulation4', 'sm-5', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(44, 'simulation6', 'sm-6', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(45, 'simulation7', 'sm-7', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(46, 'simulation8', 'sm-8', '', 100, '3', '1', '2023-09-13', NULL, NULL, NULL),
(47, 'parking1', 'spr-2', '', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(48, 'parking2', 'spr-63', '', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(49, 'parking3', 'spr-5', '', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(50, 'parking4', 'spr-3', '', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(51, 'parking5', 'spr-6', '', 100, '7', '1', '2023-09-13', NULL, NULL, NULL),
(52, 'sengin', 'sen-1', '', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(53, 'sengin1', 'sen-2', '', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(54, 'sengin3', 'sen-3', '', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(55, 'sengin2', 'sen-4', '', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(56, 'sengin4', 'sen-5', '', 100, '8', '1', '2023-09-13', NULL, NULL, NULL),
(57, 'demo17', 'Si-558', '', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(58, 'demo28', 'Si-89', '', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(59, 'sdre', 'sim-124', '', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(60, 'sdre2', 'sim-01', '', 100, '9', '1', '2023-09-13', NULL, NULL, NULL),
(61, 'sdre434', 'sim21', '', 100, '9', '1', '2023-09-13', NULL, NULL, NULL);

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
(2, '3', '1'),
(3, '7', '1'),
(4, '8', '1'),
(5, '9', '1'),
(6, '10', '1'),
(7, '11', '1'),
(8, '12', '1'),
(9, '13', '1'),
(10, '14', '1'),
(11, '15', '1'),
(12, '16', '1');

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
-- Table structure for table `studentexam`
--

CREATE TABLE `studentexam` (
  `id` int(255) NOT NULL,
  `examId` varchar(255) NOT NULL,
  `examSubject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subchecklistfiles`
--

CREATE TABLE `subchecklistfiles` (
  `id` int(11) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `checkId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subchecklistfiles`
--

INSERT INTO `subchecklistfiles` (`id`, `fileName`, `lastName`, `fileType`, `checkId`, `subCheckId`, `ctpId`) VALUES
(1, 'Django Task (1).docx', NULL, 'docx', '4', '1', '1'),
(2, 'Python Probation Task.docx', NULL, 'docx', '4', '1', '1'),
(3, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1'),
(4, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1'),
(5, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1'),
(8, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1'),
(9, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1'),
(10, 'C:\\xampp\\htdocs\\latest\\TOS', 'C:xampph', 'offline', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subcheclist`
--

CREATE TABLE `subcheclist` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `main_checklist_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcheclist`
--

INSERT INTO `subcheclist` (`id`, `name`, `main_checklist_id`, `description`, `status`, `priority`, `category`, `comment`) VALUES
(1, 'subchecklist1', '4', NULL, NULL, NULL, NULL, NULL),
(2, 'subchecklist2', '4', NULL, NULL, NULL, NULL, NULL),
(3, 'checklist 3', '4', NULL, NULL, NULL, NULL, NULL),
(4, 'checklist4', '4', NULL, NULL, NULL, NULL, NULL),
(5, 'Checklist 1', '5', NULL, NULL, NULL, NULL, NULL),
(6, 'subchecklist 77', '5', NULL, NULL, NULL, NULL, NULL),
(7, 'subchecklist 88', '5', NULL, NULL, NULL, NULL, NULL),
(8, 'subchecklist 0', '5', NULL, NULL, NULL, NULL, NULL),
(9, 'subchecklist 10', '5', NULL, NULL, NULL, NULL, NULL);

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
(6, '2', '6', '1', '8', '1', 'actual', NULL),
(7, '1', '1', '1', '8', '3', 'sim', NULL),
(8, '1', '2', '1', '8', '3', 'sim', NULL),
(9, '2', '3', '1', '8', '3', 'sim', NULL),
(10, '2', '4', '1', '8', '3', 'sim', NULL),
(11, '2', '5', '1', '8', '3', 'sim', NULL),
(12, '3', '8', '1', '8', '3', 'sim', NULL),
(13, '5', '6', '1', '8', '3', 'sim', NULL),
(14, '5', '7', '1', '8', '3', 'sim', NULL),
(20, '1', '6', '1', '7', '3', 'actual', NULL),
(21, '2', '1', '1', '7', '3', 'actual', NULL),
(22, '3', '3', '1', '7', '3', 'actual', NULL),
(23, '4', '2', '1', '7', '3', 'actual', NULL),
(24, '4', '4', '1', '7', '3', 'actual', NULL);

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
(1, '29', '3', 'U', '2023-10-05'),
(2, '29', '4', 'F', '2023-10-05'),
(3, '29', '5', '', '2023-10-05'),
(4, '29', '6', '', '2023-10-05'),
(5, '34', '3', 'U', '2023-10-05'),
(6, '34', '4', 'F', '2023-10-05'),
(7, '34', '5', '', '2023-10-05'),
(8, '34', '6', '', '2023-10-05');

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
-- Table structure for table `temp_cat`
--

CREATE TABLE `temp_cat` (
  `id` int(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `days` int(30) DEFAULT NULL
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
(22, 'Parking', 'TOS-20', '', '100', '1', '1', '2023-08-09', NULL),
(23, 'Test on Introduction to Medicinal Plants and Soil Types', 'T03', '', '100', '1', '1', '2023-08-31', NULL),
(24, 'Parking', 'T04', '', '100', '1', '1', '2023-08-31', NULL),
(25, 'Test on Introduction to Medicinal Plants and Soil Types', 'T05', '', '100', '1', '1', '2023-08-31', NULL),
(26, 'Planting Techniques', 'T06', '', '100', '1', '1', '2023-08-31', NULL),
(27, 'test', 'T07', '', '100', '1', '1', '2023-08-31', NULL),
(28, 'Test on Watering Techniques and Fertilization Methods', 'T08', '', '100', '1', '1', '2023-08-31', NULL),
(29, 'test5', 'T09', '', '100', '1', '1', '2023-08-31', NULL),
(30, 'Parking', 'T010', '', '100', '1', '1', '2023-08-31', NULL),
(31, 'gbrgtgbr', 't1', '', '100', '2', '2', '2023-09-21', NULL),
(32, 'rfer', 't2', '', '100', '2', '2', '2023-09-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testcatfil`
--

CREATE TABLE `testcatfil` (
  `id` int(11) NOT NULL,
  `courseId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `test_course`
--

CREATE TABLE `test_course` (
  `id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_course`
--

INSERT INTO `test_course` (`id`, `course_name`, `course_description`, `date`) VALUES
(1, 'english', 'subject learn english', '0000-00-00'),
(2, 'maths', 'subject learn maths', '0000-00-00'),
(5, 'science', 'subject learn science', '0000-00-00'),
(6, 'hindi', 'subject learn hindi', '0000-00-00'),
(7, 'history', 'subject learn history', '0000-00-00');

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

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`id`, `test_id`, `student_id`, `course_id`, `marks`, `created`, `status`, `userId`) VALUES
(0, 1, 34, '1', '10', '2023-09-19 16:18:30.000000', '1', '11'),
(1, 9, 29, '1', '60', '2023-08-31 14:32:41.000000', '1', '11'),
(2, 1, 29, '1', '70', '2023-08-31 14:33:03.000000', '1', '11'),
(3, 13, 29, '1', '50', '2023-08-31 14:33:19.000000', '1', '11'),
(4, 20, 29, '1', '80', '2023-08-31 14:33:31.000000', '1', '11'),
(5, 30, 29, '1', '70', '2023-08-31 14:33:43.000000', '1', '11'),
(6, 10, 29, '1', '98', '2023-08-31 14:38:49.000000', '1', '11'),
(7, 15, 29, '1', '80', '2023-08-31 14:39:01.000000', '1', '11');

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
-- Table structure for table `test_updates`
--

CREATE TABLE `test_updates` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `status_start` varchar(255) DEFAULT '0',
  `start_time` datetime(6) DEFAULT NULL,
  `status_end` varchar(255) DEFAULT '0',
  `end_time` datetime(6) DEFAULT NULL,
  `repeat_id` int(255) DEFAULT NULL,
  `exam_status` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL,
  `marks_got` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typegradefilter`
--

CREATE TABLE `typegradefilter` (
  `id` int(11) NOT NULL,
  `ctpId` varchar(255) DEFAULT NULL,
  `gradeValue` varchar(255) DEFAULT NULL,
  `filterStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typegradefilter`
--

INSERT INTO `typegradefilter` (`id`, `ctpId`, `gradeValue`, `filterStatus`) VALUES
(5, '1', '70', NULL);

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

--
-- Dumping data for table `type_category_data`
--

INSERT INTO `type_category_data` (`id`, `type`, `category`, `category_phase`, `category_value`, `percent`) VALUES
(1, '5', 'actual', '0', '19', '100.00000');

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
(2, 'type2', '25.00', '1'),
(3, 'quiz', '25.00', '1'),
(4, 'type1', '25.00', '1'),
(5, 'type4', '10.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `updatehide`
--

CREATE TABLE `updatehide` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updatehide`
--

INSERT INTO `updatehide` (`id`, `userId`) VALUES
(1, '11'),
(2, '12');

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
(1, '12', '1'),
(2, '12', '1'),
(3, '15', '1'),
(4, '13', '1'),
(5, '14', '1'),
(6, '16', '1'),
(7, '17', '1'),
(8, '18', '1'),
(9, '26', '1'),
(10, '0', '1');

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
(11, '850_6727-PRINT.jpg', '2023-08-24 12:50:42', 'A4', 'A4', 'HA', 'admin', 'super admin', '2147483647', 'gender', 'A4', '11', 'ayushi2@gmail.com1', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', 0, NULL),
(12, 'agesearch v3_1.png', '2023-07-20 13:01:00', 'archana guthale', 'Ayushi', NULL, 'inst1', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, '1'),
(13, 'Flower_jtca001.jpg', '2023-08-07 16:45:50', 'student1', 'inst', NULL, 'inst2', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(14, 'agesearch v3_1.png', '2023-07-19 15:28:57', 'student2', 'archi', 'AR', 'std1', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(15, 'pngtree-a-small-pink-white-flower-png-image_2664964.png', NULL, 'archananair', 'inst1', NULL, 'inst4', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(16, 'OIP (2).jpg', '2023-03-08 13:58:47', 'archana guthale', 'inst', NULL, 'studen4', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(17, 'Donna.png', NULL, 'jhvbsrf', 'stu', 'in', 'studen48', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(18, 'Donna.png', NULL, 'archana guthale', 'archi', 'ar', 'archana', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', 'cf65e9e5920cda080f7903a968ad9744', NULL, NULL, NULL),
(19, 'Donna.png', NULL, 'archana guthale', 'archi', '', 'studen9', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL),
(20, 'Donna.png', NULL, 'archana', 'archi', 'st', 'std20', 'student', '0702136474', 'female', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(21, 'Donna.png', NULL, 'student', 'stu', 'AR', 'std10', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(22, 'Donna.png', NULL, 'student', 'inst', 'ar', 'std11', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(23, 'Donna.png', NULL, 'testing user', 'testing user', 'AR', 'std103', 'student', '7021364749', 'female', NULL, '11', 'archana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL),
(24, 'Donna.png', NULL, 'archana guthale', 'testing user', 'AR', 'STD09', 'student', '+919474512', 'female', NULL, '11', 'archana@gmail.com', '26bca7d18fac41f574d34da8d6df4170', NULL, NULL, NULL),
(25, 'Donna.png', NULL, 'abcd', 'abcd', 'AB', 'std7', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(26, 'Donna.png', NULL, 'Ayushi Bharti', 'ayu', 'ayu', 'std44', 'IT people', '0883012547', 'female', NULL, '11', 'ayushi260395@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(27, 'Donna.png', NULL, 'student1', 'std1', 'SD', 'std0', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(28, 'Donna.png', NULL, 'student2', 'std2', 'SA', 'std9', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(29, 'Donna.png', '2023-08-08 10:41:40', 'student3', 'std3', 'SG', 'std8', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(30, 'Donna.png', NULL, 'abcdefgh', 'abcd', 'MA', 'sti9', 'student', '8765432190', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(31, 'Donna.png', NULL, 'ayushi', 'ayu', 'MAA', 'std66', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(32, 'Donna.png', NULL, 'Varun Mishra', 'varun', 'VV', 'std88', 'student', '0876543219', 'male', NULL, '11', 'jack@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(33, 'Donna.png', NULL, 'Archana Nair', 'Archana', 'AA', 'std55', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(34, 'Donna.png', NULL, 'Anchit ', 'anchit', 'AN', 'std99', 'student', '0876543219', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(60, NULL, NULL, 'demo', 'demo', 'AR', 'instruct1', 'instructors', '+919474512', 'female', NULL, '11', 'archana@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

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
  `type_id` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `filename`, `lastName`, `type`, `briefId`, `admin_delete`, `folderId`, `shopid`, `user_id`, `role`, `color`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `fileBriefcase`, `menu_type`, `type_id`) VALUES
(1, 'Data Analyst Questions (5).docx', NULL, 'docx', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, 'NULL', 0),
(2, 'new plan (2).xlsx', NULL, 'xlsx', '1', NULL, '2', '0', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, 'NULL', 0),
(3, 'New Page.pdf', NULL, 'pdf', '7', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, 'megmenu', 4),
(4, 'Briefcase v2.png', NULL, 'png', '0', NULL, '2', '2', '11', 'super admin', 'blue', '2023-07-06', '2023-07-06', 'A4', 'A4', NULL, 'NULL', 0),
(5, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '0', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'NULL', 0),
(6, 'https://www.facebook.com/', 'linkhiuh9i', 'online', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'megmenu', 4),
(7, 'C:\\xampp2\\htdocs', 'fefefjiejeov', 'offline', '6', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'NULL', 0),
(12, 'new plan (2) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'files', 4),
(13, 'archana pages (1).pdf', NULL, 'pdf', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'files', 4),
(14, 'new plan (9) (1) (2) (5) (3) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', NULL, 0),
(15, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '3', NULL, '2', '2', '15', 'instructor', 'red', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'NULL', 0),
(16, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '0', NULL, '2', '2', '13', 'student', 'red', '2023-07-06', '2023-07-06', 'inst', 'inst', '', 'NULL', 0),
(17, 'arudan.com', 'zae', 'offline', '1', NULL, '2', '2', '13', 'super admin', 'red', '2023-07-07', '2023-07-07', 'A4', 'A4', 'user', 'NULL', 0),
(18, 'C:\\xampp\\htdocs', 'C:xampph', 'offline', '5', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-07', '2023-07-07', 'A4', 'A4', 'user', NULL, 0),
(20, '1.mp4', NULL, 'mp4', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-11', '2023-07-11', 'A4', 'A4', 'user', NULL, 0),
(21, 'bzdfb.pdf', NULL, 'pdf', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-12', '2023-07-12', 'A4', 'A4', NULL, 'NULL', 0),
(22, 'folder page varun.pdf', NULL, 'pdf', '7', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-12', '2023-07-12', 'A4', 'A4', NULL, 'NULL', 0),
(23, 'WhatsApp Video 2022-12-23 at 21.02.06.mp4', NULL, 'mp4', '7', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(25, 'MicrosoftTeams-image (12).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(26, 'MicrosoftTeams-image (11).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(27, 'MicrosoftTeams-image (10).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(28, 'MicrosoftTeams-image (9).png', NULL, 'png', '0', NULL, '0', '0', '11', 'super admin', 'blue', '2023-07-19', '2023-07-19', 'A4', 'A4', NULL, NULL, 0),
(30, 'ayushi.pdf', NULL, 'pdf', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-24', '2023-07-24', 'A4', 'A4', 'user', NULL, 0),
(31, '01.pdf', NULL, 'pdf', '0', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-24', '2023-07-24', 'A4', 'A4', '', NULL, 0),
(32, 'MicrosoftTeams-image (32).png', NULL, 'png', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-26', '2023-07-26', 'A4', 'A4', 'user', NULL, 0),
(33, 'MicrosoftTeams-image (35).png', NULL, 'png', '2', NULL, '2', '2', '11', 'super admin', 'red', '2023-07-26', '2023-07-26', 'A4', 'A4', 'user', NULL, 0),
(34, 'Python Probation Task (1).docx', NULL, 'docx', '0', NULL, '0', '0', '11', 'super admin', 'red', '2023-09-01', '2023-09-01', 'A4', 'A4', NULL, 'files', 3),
(35, 'C:\\Users\\Lenovo\\Desktop\\Im', 'checking', 'online', '1', NULL, '2', '2', '11', 'super admin', 'red', '2023-09-01', '2023-09-01', 'A4', 'A4', '', NULL, 0);

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
-- Indexes for table `attrition`
--
ALTER TABLE `attrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `briefcase`
--
ALTER TABLE `briefcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_data`
--
ALTER TABLE `certificate_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatdeleteforme`
--
ALTER TABLE `chatdeleteforme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatgroup`
--
ALTER TABLE `chatgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatpagepermission`
--
ALTER TABLE `chatpagepermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkonline`
--
ALTER TABLE `checkonline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checktyping`
--
ALTER TABLE `checktyping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_sub_checklist`
--
ALTER TABLE `check_sub_checklist`
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
-- Indexes for table `deconflicterdata`
--
ALTER TABLE `deconflicterdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deconflicterdepartment`
--
ALTER TABLE `deconflicterdepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desccate`
--
ALTER TABLE `desccate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digramtable`
--
ALTER TABLE `digramtable`
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
-- Indexes for table `document_test`
--
ALTER TABLE `document_test`
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
-- Indexes for table `examname`
--
ALTER TABLE `examname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsubcategory`
--
ALTER TABLE `examsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_answers_once_test`
--
ALTER TABLE `exam_answers_once_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_answers_repeat_test`
--
ALTER TABLE `exam_answers_repeat_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question_ist`
--
ALTER TABLE `exam_question_ist`
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
-- Indexes for table `frame_cert`
--
ALTER TABLE `frame_cert`
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
-- Indexes for table `groupchats`
--
ALTER TABLE `groupchats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupdeleteforme`
--
ALTER TABLE `groupdeleteforme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupmember`
--
ALTER TABLE `groupmember`
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
-- Indexes for table `heading_cert`
--
ALTER TABLE `heading_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holydays`
--
ALTER TABLE `holydays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horizontal_cert`
--
ALTER TABLE `horizontal_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_cert`
--
ALTER TABLE `image_cert`
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
-- Indexes for table `logo_cert`
--
ALTER TABLE `logo_cert`
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
-- Indexes for table `memoabs`
--
ALTER TABLE `memoabs`
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
-- Indexes for table `originalcertificate`
--
ALTER TABLE `originalcertificate`
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
-- Indexes for table `para_cert`
--
ALTER TABLE `para_cert`
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
-- Indexes for table `per_checklist`
--
ALTER TABLE `per_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_check_sub_checklist`
--
ALTER TABLE `per_check_sub_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_subchecklist`
--
ALTER TABLE `per_subchecklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `per_subchecklistfile`
--
ALTER TABLE `per_subchecklistfile`
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
-- Indexes for table `rolepermission`
--
ALTER TABLE `rolepermission`
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
-- Indexes for table `studentexam`
--
ALTER TABLE `studentexam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subchecklistfiles`
--
ALTER TABLE `subchecklistfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcheclist`
--
ALTER TABLE `subcheclist`
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
-- Indexes for table `temp_cat`
--
ALTER TABLE `temp_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testcatfil`
--
ALTER TABLE `testcatfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cloned_data`
--
ALTER TABLE `test_cloned_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_course`
--
ALTER TABLE `test_course`
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
-- Indexes for table `test_updates`
--
ALTER TABLE `test_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typegradefilter`
--
ALTER TABLE `typegradefilter`
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
-- Indexes for table `updatehide`
--
ALTER TABLE `updatehide`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `actual_gradesheet`
--
ALTER TABLE `actual_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `actual_phase`
--
ALTER TABLE `actual_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `additional_task`
--
ALTER TABLE `additional_task`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adminpagechangelog`
--
ALTER TABLE `adminpagechangelog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alertreply`
--
ALTER TABLE `alertreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `alerttable`
--
ALTER TABLE `alerttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assing_warning_doc`
--
ALTER TABLE `assing_warning_doc`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attrition`
--
ALTER TABLE `attrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `briefcase`
--
ALTER TABLE `briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_data`
--
ALTER TABLE `certificate_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chatdeleteforme`
--
ALTER TABLE `chatdeleteforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatgroup`
--
ALTER TABLE `chatgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chatpagepermission`
--
ALTER TABLE `chatpagepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkonline`
--
ALTER TABLE `checkonline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `checktyping`
--
ALTER TABLE `checktyping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `check_sub_checklist`
--
ALTER TABLE `check_sub_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classfilter`
--
ALTER TABLE `classfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clone_class`
--
ALTER TABLE `clone_class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ctppage`
--
ALTER TABLE `ctppage`
  MODIFY `CTPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deconflicterdata`
--
ALTER TABLE `deconflicterdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deconflicterdepartment`
--
ALTER TABLE `deconflicterdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `desccate`
--
ALTER TABLE `desccate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `digramtable`
--
ALTER TABLE `digramtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `document_test`
--
ALTER TABLE `document_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `editor_data`
--
ALTER TABLE `editor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_data`
--
ALTER TABLE `emergency_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examname`
--
ALTER TABLE `examname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `examsubcategory`
--
ALTER TABLE `examsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `exam_answers_once_test`
--
ALTER TABLE `exam_answers_once_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_answers_repeat_test`
--
ALTER TABLE `exam_answers_repeat_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `exam_question_ist`
--
ALTER TABLE `exam_question_ist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `extra_item_subitem`
--
ALTER TABLE `extra_item_subitem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=744;

--
-- AUTO_INCREMENT for table `extra_item_subitem_cl`
--
ALTER TABLE `extra_item_subitem_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_item_subitem_grades`
--
ALTER TABLE `extra_item_subitem_grades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `extra_item_subitem_grades_cl`
--
ALTER TABLE `extra_item_subitem_grades_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favouritefiles`
--
ALTER TABLE `favouritefiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `favouritepages`
--
ALTER TABLE `favouritepages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filepermissions`
--
ALTER TABLE `filepermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `frame_cert`
--
ALTER TABLE `frame_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradeaheet_clear_reason`
--
ALTER TABLE `gradeaheet_clear_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gradesheet`
--
ALTER TABLE `gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff_cl`
--
ALTER TABLE `gradsheet_final_hashoff_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groupdeleteforme`
--
ALTER TABLE `groupdeleteforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupmember`
--
ALTER TABLE `groupmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `heading_cert`
--
ALTER TABLE `heading_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `holydays`
--
ALTER TABLE `holydays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `horizontal_cert`
--
ALTER TABLE `horizontal_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image_cert`
--
ALTER TABLE `image_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5026;

--
-- AUTO_INCREMENT for table `itembank`
--
ALTER TABLE `itembank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_clone_gradesheet`
--
ALTER TABLE `item_clone_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `item_gradesheet`
--
ALTER TABLE `item_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logo_cert`
--
ALTER TABLE `logo_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_department`
--
ALTER TABLE `main_department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_role_course_phase`
--
ALTER TABLE `manage_role_course_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `memoabs`
--
ALTER TABLE `memoabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memocate`
--
ALTER TABLE `memocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newcourse`
--
ALTER TABLE `newcourse`
  MODIFY `Courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `orgchart_data`
--
ALTER TABLE `orgchart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `originalcertificate`
--
ALTER TABLE `originalcertificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `para_cert`
--
ALTER TABLE `para_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `per_checklist`
--
ALTER TABLE `per_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `per_check_sub_checklist`
--
ALTER TABLE `per_check_sub_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `per_subchecklist`
--
ALTER TABLE `per_subchecklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `per_subchecklistfile`
--
ALTER TABLE `per_subchecklistfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz_cloned_data`
--
ALTER TABLE `quiz_cloned_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rolepermission`
--
ALTER TABLE `rolepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `sim_phase`
--
ALTER TABLE `sim_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentexam`
--
ALTER TABLE `studentexam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subchecklistfiles`
--
ALTER TABLE `subchecklistfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcheclist`
--
ALTER TABLE `subcheclist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subitem`
--
ALTER TABLE `subitem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT for table `temp_cat`
--
ALTER TABLE `temp_cat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `testcatfil`
--
ALTER TABLE `testcatfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_cloned_data`
--
ALTER TABLE `test_cloned_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_course`
--
ALTER TABLE `test_course`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test_phase`
--
ALTER TABLE `test_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_updates`
--
ALTER TABLE `test_updates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typegradefilter`
--
ALTER TABLE `typegradefilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_category_data`
--
ALTER TABLE `type_category_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_data`
--
ALTER TABLE `type_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `updatehide`
--
ALTER TABLE `updatehide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdepartment`
--
ALTER TABLE `userdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdocumnet`
--
ALTER TABLE `userdocumnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `vehid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warning_category_data`
--
ALTER TABLE `warning_category_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warning_data`
--
ALTER TABLE `warning_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warning_permission`
--
ALTER TABLE `warning_permission`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
