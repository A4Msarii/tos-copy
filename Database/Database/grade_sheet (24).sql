-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 10:02 AM
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
  `date` datetime(6) DEFAULT NULL,
  `updateDate` varchar(255) DEFAULT NULL
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
  `type` varchar(255) NOT NULL,
  `structure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `msgRead` varchar(255) DEFAULT '0',
  `notification` varchar(255) NOT NULL DEFAULT '0',
  `loca` varchar(255) DEFAULT NULL
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
-- Table structure for table `checklistfile`
--

CREATE TABLE `checklistfile` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `checkListId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkonline`
--

CREATE TABLE `checkonline` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `deconflicterdata`
--

CREATE TABLE `deconflicterdata` (
  `id` int(11) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) NOT NULL,
  `linePerDay` int(11) DEFAULT NULL,
  `departMentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `document_test`
--

CREATE TABLE `document_test` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `refrence` varchar(3000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileLoca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `briefType` varchar(255) DEFAULT NULL,
  `pageLoc` varchar(255) DEFAULT NULL
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
  `exam_id` varchar(255) DEFAULT NULL,
  `countAttempts` int(11) NOT NULL DEFAULT '0'
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
  `repeat_id` int(255) DEFAULT NULL,
  `countAttempts` int(11) NOT NULL DEFAULT '0'
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
  `color` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `questionRef` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `type_menu` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `fileName` varchar(30) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL
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
  `duration_hours` int(11) DEFAULT NULL,
  `duration_min` int(11) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `grade_permission_clone`
--

CREATE TABLE `grade_permission_clone` (
  `id` int(255) NOT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `clone_id` varchar(255) DEFAULT NULL
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
  `replyStatus` varchar(255) DEFAULT NULL,
  `loca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `horizontal_cert`
--

CREATE TABLE `horizontal_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `widht` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `originalcertificate`
--

CREATE TABLE `originalcertificate` (
  `id` int(11) NOT NULL,
  `certificateId` varchar(255) DEFAULT NULL,
  `certificateHtml` mediumtext
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
-- Table structure for table `personalchecklist_files`
--

CREATE TABLE `personalchecklist_files` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `mainCheckId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personalsubchecklist_files`
--

CREATE TABLE `personalsubchecklist_files` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `color` varchar(255) DEFAULT NULL,
  `mainCheckId` varchar(255) DEFAULT NULL,
  `sharedType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `phasefilepermission`
--

CREATE TABLE `phasefilepermission` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `rolepermission`
--

CREATE TABLE `rolepermission` (
  `id` int(11) NOT NULL,
  `rolePermission` varchar(255) DEFAULT NULL,
  `cardName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `permission` varchar(50000) NOT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`, `color`) VALUES
(2, 'student', 'a:57:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"0";s:10:"class_page";s:1:"0";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"0";s:22:"select_student_details";s:1:"1";s:14:"course_details";s:1:"1";s:12:"landing_page";s:1:"1";s:15:"checklist_pages";s:1:"1";s:12:"clone_delete";s:1:"0";s:15:"askclone_delete";s:1:"1";s:14:"fill_gradsheet";s:1:"0";s:15:"reset_gradsheet";s:1:"0";s:16:"Unlock_gradsheet";s:1:"0";s:19:"askUnlock_gradsheet";s:1:"0";s:18:"askreset_gradsheet";s:1:"0";s:18:"give_per_gradsheet";s:1:"0";s:17:"ask_per_gradsheet";s:1:"0";s:13:"give_Acedemic";s:1:"0";s:14:"Clear_Acedemic";s:1:"0";s:12:"ask_Acedemic";s:1:"1";s:11:"delete_task";s:1:"0";s:20:"give_marks_evalution";s:1:"0";s:20:"view_marks_evalution";s:1:"1";s:15:"give_marks_test";s:1:"0";s:11:"unlock_test";s:1:"0";s:14:"askunlock_test";s:1:"0";s:19:"add_attachment_test";s:1:"0";s:16:"delete_emergance";s:1:"0";s:10:"assign_Cap";s:1:"0";s:11:"Create_memo";s:1:"0";s:9:"Edit_memo";s:1:"0";s:11:"Delete_memo";s:1:"0";s:13:"Delete_course";s:1:"0";s:12:"Edit_landing";s:1:"0";s:14:"Delete_landing";s:1:"0";s:6:"alerts";N;s:13:"export_course";s:1:"0";}', NULL),
(6, 'instructor', 'a:57:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"0";s:10:"class_page";s:1:"0";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"0";s:8:"Datapage";s:1:"0";s:3:"CTP";s:1:"0";s:9:"Newcourse";s:1:"0";s:13:"sidebar_phase";s:1:"0";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";s:14:"course_details";s:1:"1";s:12:"landing_page";s:1:"1";s:15:"checklist_pages";s:1:"1";s:12:"clone_delete";s:1:"0";s:15:"askclone_delete";s:1:"1";s:14:"fill_gradsheet";s:1:"1";s:15:"reset_gradsheet";s:1:"0";s:16:"Unlock_gradsheet";s:1:"0";s:19:"askUnlock_gradsheet";s:1:"1";s:18:"askreset_gradsheet";s:1:"1";s:18:"give_per_gradsheet";s:1:"0";s:17:"ask_per_gradsheet";s:1:"1";s:13:"give_Acedemic";s:1:"1";s:14:"Clear_Acedemic";s:1:"0";s:12:"ask_Acedemic";s:1:"0";s:11:"delete_task";s:1:"0";s:20:"give_marks_evalution";s:1:"1";s:20:"view_marks_evalution";s:1:"0";s:15:"give_marks_test";s:1:"1";s:11:"unlock_test";s:1:"0";s:14:"askunlock_test";s:1:"1";s:19:"add_attachment_test";s:1:"1";s:16:"delete_emergance";s:1:"0";s:10:"assign_Cap";s:1:"1";s:11:"Create_memo";s:1:"0";s:9:"Edit_memo";s:1:"0";s:11:"Delete_memo";s:1:"0";s:13:"Delete_course";s:1:"0";s:12:"Edit_landing";s:1:"0";s:14:"Delete_landing";s:1:"0";s:6:"alerts";N;s:13:"export_course";s:1:"0";}', NULL),
(7, 'super admin', 'a:57:{s:9:"Dashboard";s:1:"1";s:10:"phase_page";s:1:"0";s:10:"class_page";s:1:"0";s:6:"actual";s:1:"1";s:3:"sim";s:1:"1";s:8:"Academic";s:1:"1";s:7:"Testing";s:1:"1";s:10:"evaluation";s:1:"1";s:4:"Task";s:1:"1";s:7:"Student";s:1:"1";s:9:"Emergency";s:1:"1";s:4:"Qual";s:1:"1";s:9:"Clearance";s:1:"1";s:3:"CAP";s:1:"1";s:4:"Memo";s:1:"1";s:6:"Report";s:1:"1";s:10:"Discipline";s:1:"1";s:6:"Start0";s:1:"1";s:8:"Datapage";s:1:"1";s:3:"CTP";s:1:"1";s:9:"Newcourse";s:1:"1";s:13:"sidebar_phase";s:1:"1";s:4:"Quiz";s:1:"1";s:13:"select_Course";s:1:"1";s:22:"select_student_details";s:1:"0";s:14:"course_details";s:1:"1";s:12:"landing_page";s:1:"1";s:15:"checklist_pages";s:1:"1";s:12:"clone_delete";s:1:"1";s:15:"askclone_delete";s:1:"0";s:14:"fill_gradsheet";s:1:"1";s:15:"reset_gradsheet";s:1:"1";s:16:"Unlock_gradsheet";s:1:"1";s:19:"askUnlock_gradsheet";s:1:"0";s:18:"askreset_gradsheet";s:1:"0";s:18:"give_per_gradsheet";s:1:"1";s:17:"ask_per_gradsheet";s:1:"0";s:13:"give_Acedemic";s:1:"1";s:14:"Clear_Acedemic";s:1:"1";s:12:"ask_Acedemic";s:1:"0";s:11:"delete_task";s:1:"0";s:20:"give_marks_evalution";s:1:"0";s:20:"view_marks_evalution";s:1:"1";s:15:"give_marks_test";s:1:"1";s:11:"unlock_test";s:1:"1";s:14:"askunlock_test";s:1:"0";s:19:"add_attachment_test";s:1:"1";s:16:"delete_emergance";s:1:"1";s:10:"assign_Cap";s:1:"1";s:11:"Create_memo";s:1:"1";s:9:"Edit_memo";s:1:"0";s:11:"Delete_memo";s:1:"1";s:13:"Delete_course";s:1:"1";s:12:"Edit_landing";s:1:"0";s:14:"Delete_landing";s:1:"1";s:6:"alerts";N;s:13:"export_course";s:1:"1";}', NULL);

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
  `image` varchar(30) NOT NULL,
  `ctpId` varchar(255) DEFAULT NULL
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
  `days` int(30) DEFAULT NULL,
  `linesRequired` int(255) DEFAULT NULL,
  `studentPerClass` varchar(255) DEFAULT NULL
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
-- Table structure for table `studentexam`
--

CREATE TABLE `studentexam` (
  `id` int(255) NOT NULL,
  `examId` varchar(255) NOT NULL,
  `examSubject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subchecklistfile`
--

CREATE TABLE `subchecklistfile` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `updatehide`
--

CREATE TABLE `updatehide` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `departmentId` varchar(255) DEFAULT NULL,
  `signature` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `file_name`, `uploaded_on`, `name`, `nickname`, `initial`, `studid`, `role`, `phone`, `gender`, `username`, `ins_id`, `email`, `password`, `create_datetime`, `seen_status`, `departmentId`, `signature`) VALUES
(11, '850_6727-PRINT.jpg', '2023-08-24 12:50:42', 'A4', 'A4', 'HA', 'admin', 'super admin', '2147483647', 'gender', 'A4', '11', 'ayushi2@gmail.com1', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', 0, NULL, 'data:image/png;base64,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');

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
  `courseId` varchar(255) DEFAULT NULL
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
  `type_id` int(30) NOT NULL DEFAULT '0',
  `fileLocation` varchar(255) DEFAULT NULL
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
-- Indexes for table `checklistfile`
--
ALTER TABLE `checklistfile`
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
-- Indexes for table `grade_permission_clone`
--
ALTER TABLE `grade_permission_clone`
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
-- Indexes for table `personalchecklist_files`
--
ALTER TABLE `personalchecklist_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalsubchecklist_files`
--
ALTER TABLE `personalsubchecklist_files`
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
-- Indexes for table `phasefilepermission`
--
ALTER TABLE `phasefilepermission`
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
-- Indexes for table `subchecklistfile`
--
ALTER TABLE `subchecklistfile`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accomplish_task`
--
ALTER TABLE `accomplish_task`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acedemic_phase`
--
ALTER TABLE `acedemic_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acedemic_stu`
--
ALTER TABLE `acedemic_stu`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actual`
--
ALTER TABLE `actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actual_gradesheet`
--
ALTER TABLE `actual_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actual_phase`
--
ALTER TABLE `actual_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `additional_task`
--
ALTER TABLE `additional_task`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assing_warning_doc`
--
ALTER TABLE `assing_warning_doc`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attrition`
--
ALTER TABLE `attrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `briefcase`
--
ALTER TABLE `briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `certificate_data`
--
ALTER TABLE `certificate_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chatdeleteforme`
--
ALTER TABLE `chatdeleteforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chatgroup`
--
ALTER TABLE `chatgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chatpagepermission`
--
ALTER TABLE `chatpagepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checklistfile`
--
ALTER TABLE `checklistfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkonline`
--
ALTER TABLE `checkonline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checktyping`
--
ALTER TABLE `checktyping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `check_sub_checklist`
--
ALTER TABLE `check_sub_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classfilter`
--
ALTER TABLE `classfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_documnet`
--
ALTER TABLE `class_documnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clearance_data`
--
ALTER TABLE `clearance_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clearance_student_id`
--
ALTER TABLE `clearance_student_id`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cloned_gradesheet`
--
ALTER TABLE `cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clone_class`
--
ALTER TABLE `clone_class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ctppage`
--
ALTER TABLE `ctppage`
  MODIFY `CTPid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deconflicterdata`
--
ALTER TABLE `deconflicterdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deconflicterdepartment`
--
ALTER TABLE `deconflicterdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desccate`
--
ALTER TABLE `desccate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `digramtable`
--
ALTER TABLE `digramtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `division_department`
--
ALTER TABLE `division_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_test`
--
ALTER TABLE `document_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editor_data`
--
ALTER TABLE `editor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emergency_data`
--
ALTER TABLE `emergency_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examname`
--
ALTER TABLE `examname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examsubcategory`
--
ALTER TABLE `examsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_answers_once_test`
--
ALTER TABLE `exam_answers_once_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_answers_repeat_test`
--
ALTER TABLE `exam_answers_repeat_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_question_ist`
--
ALTER TABLE `exam_question_ist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extra_item_subitem`
--
ALTER TABLE `extra_item_subitem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favouritepages`
--
ALTER TABLE `favouritepages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filepermissions`
--
ALTER TABLE `filepermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `folder_shop_user`
--
ALTER TABLE `folder_shop_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frame_cert`
--
ALTER TABLE `frame_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradeaheet_clear_reason`
--
ALTER TABLE `gradeaheet_clear_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradesheet`
--
ALTER TABLE `gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_per`
--
ALTER TABLE `grade_per`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `grade_permission`
--
ALTER TABLE `grade_permission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_permission_clone`
--
ALTER TABLE `grade_permission_clone`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_per_notifications`
--
ALTER TABLE `grade_per_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff`
--
ALTER TABLE `gradsheet_final_hashoff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gradsheet_final_hashoff_cl`
--
ALTER TABLE `gradsheet_final_hashoff_cl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupdeleteforme`
--
ALTER TABLE `groupdeleteforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupmember`
--
ALTER TABLE `groupmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hashoff_gradesheet`
--
ALTER TABLE `hashoff_gradesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `heading_cert`
--
ALTER TABLE `heading_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holydays`
--
ALTER TABLE `holydays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `horizontal_cert`
--
ALTER TABLE `horizontal_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_cert`
--
ALTER TABLE `image_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itembank`
--
ALTER TABLE `itembank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_clone_gradesheet`
--
ALTER TABLE `item_clone_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_gradesheet`
--
ALTER TABLE `item_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logo_cert`
--
ALTER TABLE `logo_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_department`
--
ALTER TABLE `main_department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manage_role_course_phase`
--
ALTER TABLE `manage_role_course_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mark_distribution`
--
ALTER TABLE `mark_distribution`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meesages`
--
ALTER TABLE `meesages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memoabs`
--
ALTER TABLE `memoabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memocate`
--
ALTER TABLE `memocate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newcourse`
--
ALTER TABLE `newcourse`
  MODIFY `Courseid` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orgchart_data`
--
ALTER TABLE `orgchart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `originalcertificate`
--
ALTER TABLE `originalcertificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagepermissions`
--
ALTER TABLE `pagepermissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagepermissionsfm`
--
ALTER TABLE `pagepermissionsfm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `para_cert`
--
ALTER TABLE `para_cert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `personalchecklist_files`
--
ALTER TABLE `personalchecklist_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personalsubchecklist_files`
--
ALTER TABLE `personalsubchecklist_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persontitle`
--
ALTER TABLE `persontitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `per_checklist`
--
ALTER TABLE `per_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `per_check_sub_checklist`
--
ALTER TABLE `per_check_sub_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `per_subchecklist`
--
ALTER TABLE `per_subchecklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `per_subchecklistfile`
--
ALTER TABLE `per_subchecklistfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phasefilepermission`
--
ALTER TABLE `phasefilepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prereuisites`
--
ALTER TABLE `prereuisites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prereuisite_data`
--
ALTER TABLE `prereuisite_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qual_data`
--
ALTER TABLE `qual_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `rolepermission`
--
ALTER TABLE `rolepermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `self`
--
ALTER TABLE `self`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shelf_shop`
--
ALTER TABLE `shelf_shop`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_folder`
--
ALTER TABLE `shop_folder`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sidebar_ctp`
--
ALTER TABLE `sidebar_ctp`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sim`
--
ALTER TABLE `sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sim_phase`
--
ALTER TABLE `sim_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentexam`
--
ALTER TABLE `studentexam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subchecklistfile`
--
ALTER TABLE `subchecklistfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subchecklistfiles`
--
ALTER TABLE `subchecklistfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcheclist`
--
ALTER TABLE `subcheclist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subitem`
--
ALTER TABLE `subitem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subitem_cloned_gradesheet`
--
ALTER TABLE `subitem_cloned_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subitem_gradesheet`
--
ALTER TABLE `subitem_gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_phase`
--
ALTER TABLE `test_phase`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_updates`
--
ALTER TABLE `test_updates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typegradefilter`
--
ALTER TABLE `typegradefilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_category_data`
--
ALTER TABLE `type_category_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_data`
--
ALTER TABLE `type_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updatehide`
--
ALTER TABLE `updatehide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdepartment`
--
ALTER TABLE `userdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdocumnet`
--
ALTER TABLE `userdocumnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_briefcase`
--
ALTER TABLE `user_briefcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `vehid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warning_category_data`
--
ALTER TABLE `warning_category_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warning_data`
--
ALTER TABLE `warning_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warning_permission`
--
ALTER TABLE `warning_permission`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
