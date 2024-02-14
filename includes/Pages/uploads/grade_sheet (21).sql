-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 09:29 AM
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
  `days` int(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `acedemic_phase`
--

CREATE TABLE `acedemic_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `days` int(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `alert_icon` varchar(250) DEFAULT NULL,
  `textcolor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `senderId` varchar(255) DEFAULT NULL,
  `receiverId` varchar(255) DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `classfilter`
--

CREATE TABLE `classfilter` (
  `id` int(11) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fileExt` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `division_department`
--

CREATE TABLE `division_department` (
  `id` int(11) NOT NULL,
  `departmentId` varchar(255) DEFAULT NULL,
  `divisionId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `fileName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `grade_per`
--

CREATE TABLE `grade_per` (
  `id` int(30) NOT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `library` varchar(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shops` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `days` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sim_phase`
--

CREATE TABLE `sim_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `days` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `userdepartment`
--

CREATE TABLE `userdepartment` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `departmentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `vehid` int(11) NOT NULL,
  `vehicletype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `alerttable`
--
ALTER TABLE `alerttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `extra_item_subitem`
--
ALTER TABLE `extra_item_subitem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gradesheet`
--
ALTER TABLE `gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff_cl`
--
ALTER TABLE `gradsheet_final_hashoff_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
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
-- AUTO_INCREMENT for table `subchecklistfiles`
--
ALTER TABLE `subchecklistfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subcheclist`
--
ALTER TABLE `subcheclist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `test_cloned_data`
--
ALTER TABLE `test_cloned_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `warning_permission`
--
ALTER TABLE `warning_permission`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
