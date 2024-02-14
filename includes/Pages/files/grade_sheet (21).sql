-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 06:26 AM
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

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `shortacademic`, `ptype`, `percentage`, `phase`, `ctp`, `file`, `type`, `size`, `date`, `days`) VALUES
(2, 'vbn', 'A02', NULL, NULL, '1', '1', 'https://careerfoundry.com/en/blog/ui-design/introduction-to-color-theory-and-color-palettes/', 'link', NULL, '2023-07-21', 2),
(4, 'Parking in rush ', 'dcdc', NULL, NULL, '1', '1', 'Dubai', 'location', NULL, '2023-08-01', NULL);

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

--
-- Dumping data for table `acedemic_phase`
--

INSERT INTO `acedemic_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1');

--
-- Dumping data for table `actual`
--

INSERT INTO `actual` (`id`, `actual`, `symbol`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`, `linesRequired`, `studentPerClass`) VALUES
(1, 'Front Drive hello world Front drive hello world', 'PRK-1', 'percentage', 100, '1', '1', '2023-07-17', NULL, '4', '5'),
(2, 'back adding \"AYushi\"', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-17', NULL, NULL, NULL),
(3, 'back adding', 'ADR-3', 'percentage', 100, '1', '1', '2023-07-17', NULL, NULL, NULL),
(4, 'Front Drive', 'ADR-2', 'percentage', 100, '1', '1', '2023-07-18', 5, NULL, NULL),
(5, 'Front Drive', 'ADR-9', 'percentage', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(6, 'back park', 'ADR-92', 'percentage', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(7, 'msarii', 'ADR-11', 'percentage', 100, '3', '1', '2023-08-02', NULL, NULL, NULL),
(8, 'back adding', 'ADR-8', 'percentage', 100, '1', '1', '2023-08-07', NULL, NULL, NULL),
(9, 'back adding', 'ADR-7', 'percentage', 100, '1', '1', '2023-08-07', NULL, NULL, NULL),
(10, 'back adding', 'wqopjow', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(11, 'Front Drive', '2uiy2iywio', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(12, 'back adding', '202uu2o', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(13, 'back park', 'ADR-366', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(14, 'back park', 'ADR-234', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(15, 'Front Drive', 'ADR-100', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(16, 'front adding', 'APR-10', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(17, 'Front Drive', 'APR-9', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(18, 'msarii', 'APR-8', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(19, 'Front Drive', 'APR-7', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(20, 'back adding', 'APR-6', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(21, 'back park', 'APR-4', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(22, 'Front Drive', 'APR-3', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(23, 'drive', 'APR-2', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(24, 'msarii', 'park 1', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(25, 'Front Drive', 'park', 'percentage', 100, '1', '1', '2023-08-09', NULL, NULL, NULL),
(26, 'Front Drive', 'ADR-9', 'percentage', 100, '2', '2', '2023-08-25', NULL, NULL, NULL),
(27, 'PPK', 'PPK', 'percentage', 100, '3', '1', '2023-09-08', NULL, NULL, NULL);

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
(7, '0', '1');

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
(11, 4, 15, 'close', '0'),
(12, 3, 15, 'close', '0'),
(13, 2, 15, 'close', '0'),
(14, 1, 15, 'close', '0'),
(15, 4, 13, 'close', '0'),
(16, 3, 13, 'close', '0'),
(17, 2, 13, 'close', '0'),
(18, 1, 13, 'close', '0'),
(19, 5, 12, 'ok', '0'),
(20, 5, 14, 'close', '0'),
(21, 5, 16, 'ok', '0'),
(22, 4, 16, 'ok', '0'),
(23, 2, 16, 'ok', '0'),
(24, 1, 16, 'ok', '0'),
(25, 6, 12, 'ok', '0'),
(26, 6, 14, 'ok', '0'),
(27, 8, 12, 'ok', '0'),
(28, 7, 12, 'ok', '0'),
(29, 8, 16, 'ok', '0'),
(30, 7, 16, 'ok', '0'),
(31, 6, 16, 'ok', '0');

--
-- Dumping data for table `alerttable`
--

INSERT INTO `alerttable` (`id`, `user_id`, `alert_type`, `message`, `date`, `permission`, `reciever_user_id`, `alertCategory`, `color`, `alert_file`, `alert_icon`, `textcolor`) VALUES
(2, '11', 'Graduation ceremony', 'hello world', '2023-09-19', 'everyone', NULL, 'Urgent Notice', '#FF1202', 'Mekala-Rajesh-Resume.pdf', 'urgent_w.png', 'white'),
(6, '11', 'Red Warning', 'Hello guys its woraning for u', '2023-10-12', 'Everyone', NULL, 'Caution', '#FFC433', '1aHE.gif', 'caution_w.png', 'black'),
(7, '11', 'FeedBack Request', 'Request for exam, hello everyone, how r u? all good. have u all ok. please contact as soon as possible', '2023-10-13', 'Everyone', NULL, 'Feedback Request', '#e933cf', 'the-difference-between-trees-and-shrubs-3269804-hero-a4000090f0714f59a8ec6201ad250d90.jpg', 'feedback_w.png', 'white'),
(8, '11', 'meeting summary', 'Meeting in 10 minutes come as soon as possible', '2023-10-13', 'Everyone', NULL, 'Meeting Summaries', 'grey', 'how-to-draw-a-sun-featured-image-1200-991x1024.webp', 'summary_w.png', 'white');

--
-- Dumping data for table `assing_warning_doc`
--

INSERT INTO `assing_warning_doc` (`id`, `files`, `type`, `noti_id`) VALUES
(1, 'orgChart.doc', '', '59'),
(2, 'orgChart (1).doc', '', '68'),
(3, 'MicrosoftTeams-image (52).png', '', '69');

--
-- Dumping data for table `attrition`
--

INSERT INTO `attrition` (`id`, `attritionDepartment`, `attritionPercent`, `date`) VALUES
(1, 0, 60, NULL),
(2, 0, 50, NULL);

--
-- Dumping data for table `certificate_data`
--

INSERT INTO `certificate_data` (`id`, `name`, `type`) VALUES
(1, 'Math Certificate', 'vertical'),
(2, 'Bio ', 'horizontal');

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `senderId`, `receiverId`, `messages`, `lastName`, `fileType`, `date`, `msgEdit`, `deleteStatus`, `replyMsg`, `replyStatus`, `msgRead`, `notification`) VALUES
(1, '11', '12', 'hii', NULL, NULL, '2023-10-23 09:37:04.000000', NULL, NULL, NULL, NULL, '1', '1'),
(3, '12', '11', 'hello', NULL, NULL, '2023-10-23 09:43:01.000000', NULL, NULL, NULL, NULL, '1', '1'),
(4, '11', '13', 'hii', NULL, NULL, '2023-10-23 09:43:28.000000', NULL, NULL, NULL, NULL, '0', '0'),
(5, '11', '12', 'how are you?', NULL, NULL, '2023-10-23 09:43:46.000000', NULL, NULL, NULL, NULL, '1', '1'),
(6, '12', '11', 'good', NULL, NULL, '2023-10-23 09:44:06.000000', NULL, NULL, NULL, NULL, '1', '1');

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

--
-- Dumping data for table `checkonline`
--

INSERT INTO `checkonline` (`id`, `userId`, `status`) VALUES
(81, '14', 'online'),
(88, '11', 'online'),
(89, '12', 'online');

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

--
-- Dumping data for table `classfilter`
--

INSERT INTO `classfilter` (`id`, `className`, `pageName`) VALUES
(6, 'sim', 'qual');

--
-- Dumping data for table `class_documnet`
--

INSERT INTO `class_documnet` (`id`, `classId`, `className`, `fileName`, `fileType`, `userId`) VALUES
(1, '1', 'test', 'Data Analyst Questions (5).docx', 'docx', '11');

--
-- Dumping data for table `clearance_data`
--

INSERT INTO `clearance_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`) VALUES
(1, '1', NULL, '', '1'),
(2, '2', NULL, '', '1'),
(3, '3', NULL, '', '1'),
(4, '4', NULL, '', '1');

--
-- Dumping data for table `clearance_student_id`
--

INSERT INTO `clearance_student_id` (`id`, `clearance_id`, `stud_id`, `class_id`, `class_table`, `clone_cid`) VALUES
(1, '1', '29', '2', 'actual', NULL);

--
-- Dumping data for table `cloned_gradesheet`
--

INSERT INTO `cloned_gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `status`, `cloned_id`, `created_at`, `gradsheet_status`) VALUES
(1, '29', '1', '1', '4', 'actual', '12', '1', '15:10', '2023-08-09', '11', '22', 'G', '77', ' hello world', '\r\n                          ', '1', 1, NULL, '1'),
(2, '13', '1', '1', '4', 'actual', '12', '1', '15:24', '2023-08-09', '11', '22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(6, '29', '1', '1', '1', 'actual', '12', '1', '16:34', '2023-08-02', '11', '22', 'F', '60', ' Hello Msarii', '\r\n                          ', '1', 1, NULL, '1'),
(7, '29', '1', '1', '4', 'actual', '12', '1', '15:16', '2023-10-09', '11', '11', 'F', '60', ' hello everyone', '\r\n                          ', '1', 2, NULL, '1');

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

--
-- Dumping data for table `ctppage`
--

INSERT INTO `ctppage` (`CTPid`, `course`, `symbol`, `Type`, `VehicleType`, `manual`, `Sponcors`, `Location`, `CourseAim`, `ClassSize`, `description`, `duration`, `goal`, `total_mark`, `divisionType`, `color`, `vehicleName`) VALUES
(1, 'Driving School Advanced', 'DA', 'Driving', '1', '66555-1607-new-microsoft-powerpoint-presentation-(3) (6) (9) (5) (1).pptx', 'UAE Driving School', 'Alkarama Branch A', 'To qualify drivers to drive', 4, 'ah', '6', '', '100.00', '1', '#1aff1d', 'Car'),
(2, 'Driving School Beginner', 'DB', 'Parking', '1', 'gradesheet.sql', 'UAE Driving School', 'Abu dhabi', 'To qualify drivers to drive', 4, 'dfghj', '7', 'Hello', NULL, '1', NULL, 'Car'),
(3, 'Python Class', 'PY', 'Parking', '2', 'hashoff (1).sql', 'UAE Driving School', 'Abu dhabi', 'To qualify drivers to drive', 4, 'hekk', '8', 'kdks', NULL, '1', NULL, NULL),
(4, 'Science Class', 'SC', 'hdkhs', '1', 'gradesheet (1).sql', 'dsjkhdk', 'Abu dhabi', 'To qualify drivers to drive', 4, 'fghj', '5', 'kdks', NULL, '1', NULL, NULL),
(5, 'Math Class', 'MA', 'Parking', '1', 'folders.sql', 'driving school', 'Abu dhabi', 'To qualify drivers to drive', 4, 'hello', '6', 'Hello', NULL, '1', NULL, NULL);

--
-- Dumping data for table `deconflicterdata`
--

INSERT INTO `deconflicterdata` (`id`, `startDate`, `endDate`, `linePerDay`, `departMentId`) VALUES
(1, '2023-09-08', '2023-09-13', 5, NULL);

--
-- Dumping data for table `deconflicterdepartment`
--

INSERT INTO `deconflicterdepartment` (`id`, `departMentId`, `mainId`, `type`) VALUES
(1, '1', '1', 'planedLeave'),
(2, '3', '2', 'unPlanned'),
(3, '3', '1', 'attrition');

--
-- Dumping data for table `desccate`
--

INSERT INTO `desccate` (`id`, `category`, `marks`, `date`) VALUES
(1, 'Descipline 1', '60', '2023-08-23 16:15:05'),
(2, 'Descipline 2', '70', '2023-08-23 16:15:05'),
(3, 'Descipline', '80', '2023-08-23 16:15:05');

--
-- Dumping data for table `discipline`
--

INSERT INTO `discipline` (`id`, `date`, `inst_id`, `topic`, `comment`, `dismarks`, `student_id`, `course_id`, `fileName`, `fileExt`, `categoryId`) VALUES
(1, '2023-08-08', '11', NULL, 'Descipline Marks', '60', '29', '1', 'users (1).csv', 'csv', '1'),
(2, '2023-08-18', '11', NULL, 'Hello world', '80', '29', '1', 'Gardening Dep (2).xlsx', 'xlsx', '3'),
(3, '2023-10-09', '11', NULL, 'hi', '60', '14', '1', 'test_updates (2) (1).sql', 'sql', '1'),
(4, '2023-10-09', '11', NULL, 'hi', '20', '14', '1', 'test_updates (2) (1).sql', 'sql', '1'),
(5, '2023-10-09', '11', NULL, 'bye', '60', '14', '1', 'document_test (2).sql', 'sql', '1'),
(6, '2023-10-09', '11', NULL, 'bye', '30', '14', '1', 'document_test (2).sql', 'sql', '1'),
(7, '2023-10-09', '11', NULL, 'bye', '7', '14', '1', 'roles (2).sql', 'sql', 'absent');

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

--
-- Dumping data for table `division_department`
--

INSERT INTO `division_department` (`id`, `departmentId`, `divisionId`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '2', '2');

--
-- Dumping data for table `editor_data`
--

INSERT INTO `editor_data` (`id`, `pageName`, `editorData`, `folderId`, `shopid`, `briefId`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`, `favouriteColor`, `userId`, `admin_delete`, `changeLog`, `color`, `userRole`, `briefType`) VALUES
(1, 'test page', '<p>hello word</p>\r\n', 9, '6', 0, '2023-07-24', '2023-07-24', 'A4', 'A4', NULL, '11', NULL, 'Initial publish', 'red', 'super admin', 'NULL');

--
-- Dumping data for table `emergency_data`
--

INSERT INTO `emergency_data` (`id`, `item`, `subitem`, `stud_id`, `ctp_id`, `type`) VALUES
(1, 2, NULL, 29, 1, NULL),
(2, 1, NULL, 29, 1, NULL),
(3, 2, NULL, 29, 1, NULL),
(4, 3, NULL, 29, 1, NULL);

--
-- Dumping data for table `examname`
--

INSERT INTO `examname` (`id`, `examFor`, `dep_id`, `course_id`, `examName`, `questionNumber`, `percentageEasy`, `percentageMedium`, `percentageHard`, `percentageveryhard`, `exam_Types`, `result_hide_show`, `total_marks`, `marks_type`, `passing_marks`, `exam_type`, `start_hours`, `end_hours`, `timings`, `dates`, `date`, `location`, `randomCode`, `code`) VALUES
(1, 'dep', '2', NULL, 'department', '10', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '20', 'Open_Book', '09:49', '10:55', NULL, '2023-10-10', '2023-10-04 09:59:25.000000', NULL, NULL, 'no'),
(2, '2', NULL, NULL, 'student final exam', '10', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '30', 'Open_Book', '10:02', '11:30', NULL, '2023-10-11', '2023-10-04 10:01:31.000000', NULL, NULL, 'no'),
(3, '2', NULL, NULL, 'students exam', '10', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '30', 'Open_Book', '12:40', '13:30', NULL, '2023-10-10', '2023-10-04 10:02:01.000000', NULL, NULL, 'no'),
(4, 'dep', '1', NULL, 'department1', '10', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '20', 'Open_Book', '10:12', '11:45', NULL, '2023-10-04', '2023-10-04 10:12:56.000000', NULL, NULL, 'no'),
(5, '2', NULL, NULL, 'hello wolrd test', '3', '100', '0', '0', '0', 'once', 'show', '100', 'Equal', '30', 'Open_Book', '13:17', '13:29', NULL, '2023-10-12', '2023-10-09 13:17:18.000000', NULL, NULL, 'no'),
(6, '2', NULL, NULL, 'Diagram Name', '10', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '50', 'Open_Book', '15:10', '15:30', NULL, '2023-10-12', '2023-10-12 15:07:35.000000', 'india', NULL, 'no'),
(7, '2', NULL, NULL, 'hello wolrdjdskhkdjhf', '6', '25', '25', '25', '25', 'once', 'show', '100', 'Equal', '70', 'Open_Book', '15:10', '15:41', NULL, '2023-10-13', '2023-10-13 14:41:28.000000', 'india', NULL, 'no');

--
-- Dumping data for table `examsubcategory`
--

INSERT INTO `examsubcategory` (`id`, `examId`, `examSubject`, `subjectPercentage`, `exam_marks`) VALUES
(1, '1', '3', '20', NULL),
(2, '2', '2', '10', NULL),
(3, '3', '2', '10', '10'),
(4, '3', '1', '0', '0'),
(5, '3', '1', '0', '0'),
(6, '3', '1', '0', '0'),
(7, '4', '2', '10', '10'),
(8, '4', '1', '0', '0'),
(9, '4', '1', '0', '0'),
(10, '4', '1', '0', '0'),
(11, '5', '2', '10', '10'),
(12, '6', '2', '10', '10'),
(13, '7', '1', '20', '20'),
(14, '8', '1', '30', '30'),
(15, '9', '2', '20', '20'),
(16, '9', '3', '20', '20'),
(17, '9', '1', '20', '20'),
(18, '10', '2', '20', '20'),
(19, '10', '3', '20', '20'),
(20, '10', '1', '20', '20'),
(21, '11', '2', '20', '20'),
(22, '11', '3', '20', '20'),
(23, '11', '1', '20', '20'),
(24, '5', '1', '50', '50'),
(25, '5', '2', '20', '20'),
(26, '5', '3', '30', '30'),
(27, '6', '1', '50', '30'),
(28, '6', '2', '50', '50'),
(29, '6', '3', '0', '20'),
(30, '7', '1', '100', '100'),
(31, '7', '3', '0', '0'),
(32, '7', '2', '0', '0'),
(33, '8', '3', '50', '50'),
(34, '8', '2', '50', '50'),
(35, '8', '4', '0', '0'),
(36, '9', '1', '20', '20'),
(37, '9', '2', '30', '30'),
(38, '9', '3', '50', '50'),
(39, '10', '1', '40', '40'),
(40, '10', '2', '40', '40'),
(41, '10', '3', '20', '20'),
(42, '11', '1', '40', '40'),
(43, '11', '2', '50', '50'),
(44, '11', '3', '10', '10'),
(45, '12', '1', '20', '20'),
(46, '12', '2', '30', '30'),
(47, '12', '6', '50', '50'),
(48, '5', '1', '50', '50'),
(49, '6', '1', '25', '25'),
(50, '6', '2', '25', '25'),
(51, '6', '3', '0', '0'),
(52, '6', '4', '0', '0'),
(53, '6', '5', '0', '0'),
(54, '6', '6', '0', '0'),
(55, '6', '7', '0', '0'),
(56, '6', '8', '0', '0'),
(57, '6', '9', '0', '0'),
(58, '6', '10', '50', '50'),
(59, '7', '1', '50', '50'),
(60, '7', '2', '50', '50'),
(61, '7', '3', '0', '0'),
(62, '7', '4', '0', '0'),
(63, '7', '5', '0', '0'),
(64, '7', '6', '0', '0'),
(65, '7', '7', '0', '0'),
(66, '7', '8', '0', '0'),
(67, '7', '9', '0', '0'),
(68, '7', '10', '0', '0');

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`id`, `examId`, `examType`, `examTypePercentage`) VALUES
(1, '1', 'mcq', '20'),
(2, '2', 'mcq', '20'),
(3, '3', 'trueOrFalse', '40'),
(4, '3', 'mcq', '50'),
(5, '3', 'trueOrFalse', '10'),
(6, '4', 'trueOrFalse', '40'),
(7, '4', 'mcq', '50'),
(8, '4', 'trueOrFalse', '10'),
(9, '5', 'mcq', '10'),
(10, '5', 'mcq', '0'),
(11, '5', 'mcq', '0'),
(12, '5', 'mcq', '0'),
(13, '6', 'mcq', '10'),
(14, '6', 'mcq', '0'),
(15, '6', 'mcq', '0'),
(16, '6', 'mcq', '0'),
(17, '7', 'trueOrFalse', '20'),
(18, '8', 'mcq', '30'),
(19, '9', 'trueOrFalse', '20'),
(20, '9', 'trueOrFalse', '20'),
(21, '9', 'mcq', '20'),
(22, '10', 'trueOrFalse', '20'),
(23, '10', 'trueOrFalse', '20'),
(24, '10', 'mcq', '20'),
(25, '11', 'trueOrFalse', '20'),
(26, '11', 'trueOrFalse', '20'),
(27, '11', 'mcq', '20'),
(28, '5', 'mcq', '100'),
(29, '5', 'trueOrFalse', '0'),
(30, '5', 'digrame', '0'),
(31, '6', 'mcq', '100'),
(32, '6', 'trueOrFalse', '0'),
(33, '6', 'digrame', '0'),
(34, '7', 'mcq', '100'),
(35, '7', 'trueOrFalse', '0'),
(36, '7', 'digrame', '0'),
(37, '8', 'mcq', '100'),
(38, '8', 'trueOrFalse', '0'),
(39, '8', 'digrame', '0'),
(40, '9', 'mcq', '100'),
(41, '9', 'trueOrFalse', '0'),
(42, '9', 'digrame', '0'),
(43, '10', 'mcq', '100'),
(44, '10', 'trueOrFalse', '0'),
(45, '10', 'digrame', '0'),
(46, '11', 'mcq', '100'),
(47, '11', 'trueOrFalse', '0'),
(48, '11', 'digrame', '0'),
(49, '12', 'mcq', '100'),
(50, '12', 'trueOrFalse', '0'),
(51, '12', 'digrame', '0'),
(52, '5', 'mcq', '100'),
(53, '6', 'mcq', '25'),
(54, '6', 'true_false', '25'),
(55, '6', 'digrame', '50'),
(56, '7', 'mcq', '50'),
(57, '7', 'true_false', '30'),
(58, '7', 'digrame', '20');

--
-- Dumping data for table `exam_answers_once_test`
--

INSERT INTO `exam_answers_once_test` (`id`, `question`, `user_id`, `options`, `answer`, `exam_id`) VALUES
(1, '1', '14', NULL, 'a', '7'),
(2, '2', '14', NULL, 'c', '7'),
(3, '3', '14', NULL, 'b', '7'),
(4, '4', '14', NULL, 'd', '7'),
(5, '5', '14', NULL, 'c', '7'),
(6, '42', '14', NULL, 'c', '6'),
(7, '43', '14', 'b', 'a', '6'),
(8, '43', '14', 'a', 'a', '6'),
(9, '44', '14', NULL, 'true', '6'),
(10, '45', '14', NULL, 'b', '6'),
(11, '46', '14', 'a', 'a', '6'),
(12, '47', '14', NULL, 'b', '6'),
(13, '48', '14', NULL, 'true', '6'),
(14, '49', '14', NULL, 'true', '6'),
(15, '50', '14', NULL, 'true', '6'),
(16, '51', '14', 'a', 'a', '6');

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `category`, `type`, `question`, `file_name`, `option1`, `option2`, `option3`, `option4`, `correst_answer`, `marks`, `difficulty`, `document`) VALUES
(1, '1', 'mcq', 'HTML stand for', NULL, 'Hypermark Language', 'Hypermix language', 'Hypertext Markup Language', 'Hypertension Language', 'c', NULL, 'easy', '1'),
(2, '1', 'mcq', 'Which tag is used to create a check box', NULL, '<checkbox>', '<Input type=\"checkbox\">', '<type=\"checkbox\"', 'None of the above', 'b', NULL, 'easy', '1'),
(3, '1', 'mcq', 'From which tag descriptive list starts ?', NULL, ' <LL>', ' <DL>', ' <LDL>', ' <DD>', 'b', NULL, 'easy', '1'),
(4, '1', 'mcq', 'Which HTML tag produces the biggest heading? ', NULL, '<h7>', '<H>', '<H1>', '<HI>', 'c', NULL, 'easy', '1'),
(5, '1', 'mcq', 'Which type of HTML language is ? ', NULL, 'scripting language', 'programming language', 'Markup language', 'Network language', 'c', NULL, 'easy', '1'),
(6, '2', 'mcq', 'What does CSS stand for?', NULL, 'Colorful Style Sheets', 'Creative Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'c', NULL, 'easy', '1'),
(7, '2', 'mcq', 'How can we change the background color of an element?', NULL, 'background-color', 'color', 'Both A and B', 'None of above', 'a', NULL, 'easy', '1'),
(8, '2', 'mcq', 'Which of the following tag is used to embed css in html page?', NULL, '<css>', '<!DOCTYPE html>', '<script> ', '<style>', 'd', NULL, 'easy', '1'),
(9, '2', 'mcq', 'Which of the following CSS selectors are used to specify a group of elements?', NULL, 'tag', 'id', 'class', 'both class and tag', 'c', NULL, 'easy', '1'),
(10, '2', 'mcq', 'Which of the following CSS framework is used to create a responsive design?', NULL, 'Django', 'Rails', 'Laravell', 'bootstrap', 'd', NULL, 'medium', '1'),
(11, '2', 'mcq', 'Which of the following CSS property is used to make the text bold?', NULL, 'text-decoration: bold', 'font-weight: bold', ' font-style: bold', 'text-align: bold', 'b', NULL, 'easy', '1'),
(12, '2', 'mcq', 'Which of the following CSS style property is used to specify an italic text?', NULL, 'style', 'font', 'font-style', '@font-face', 'c', NULL, 'easy', '1'),
(13, '6', 'mcq', 'What is JavaScript?', NULL, 'JavaScript is a scripting language used to make the website interactive', 'JavaScript is an assembly language used to make the website interactive', 'JavaScript is a compiled language used to make the website interactive', 'None of the mentioned', 'a', NULL, 'easy', '1'),
(14, '6', 'mcq', 'Which of the following object is the main entry point to all client-side JavaScript features and APIs?', NULL, 'Position', 'Window', 'Standard', 'Location', 'b', NULL, 'easy', '1'),
(15, '6', 'mcq', 'Which of the following is correct about JavaScript?', NULL, ' JavaScript is an Object-Based language', 'JavaScript is Assembly-language', 'JavaScript is an Object-Oriented language', 'JavaScript is a High-level language', 'a', NULL, 'easy', '1'),
(16, '6', 'mcq', 'Arrays in JavaScript are defined by which of the following statements?', NULL, 'It is an ordered list of values', 'It is an ordered list of objects', ' It is an ordered list of string', 'It is an ordered list of functions', 'a', NULL, 'easy', '1'),
(17, '6', 'mcq', 'Which of the following is not javascript data types?', NULL, 'Null type', 'Undefined type', 'Number type', 'All of the mentioned', 'd', NULL, 'easy', '1'),
(18, '3', 'mcq', 'Which of the following class in Bootstrap is used to provide a responsive fixed width container?', NULL, '.container-fixed', '.container-fluid', '.container', 'All of the above', 'a', NULL, 'easy', '1'),
(19, '3', 'mcq', 'Which of the following class in Bootstrap is used to create a dropdown menu?', NULL, '.dropdown', '.select', '.select-list', 'None of the above', 'a', NULL, 'easy', '1'),
(20, '3', 'mcq', 'Which of the following bootstrap styles can be used to create a default progress bar?', NULL, '.nav-progress', '.link-progress-bar', '.progress, .progress-bar', 'All of the mentioned', 'c', NULL, 'easy', '1'),
(21, '3', 'mcq', 'The Bootstrap grid system is based on how many columns?', NULL, '4', '6', '12', '18', 'c', NULL, 'easy', '1'),
(22, '3', 'mcq', 'Which plugin is used to cycle through elements, like a slideshow?', NULL, 'Carousel Plugin', 'Modal Plugin', 'Tooltip Plugin', 'None of the mentioned', 'a', NULL, 'easy', '1'),
(23, '3', 'mcq', 'Which of the following is correct about the data-animation Data attribute of the Popover Plugin?', NULL, 'Gives the popover a CSS fade transition', 'Inserts the popover with HTML', 'Indicates how the popover should be positioned', 'Assigns delegated tasks to the designated targets', 'a', NULL, 'easy', '1'),
(24, '2', 'diagram', 'Guess the name', 'MicrosoftTeams-image (104).png', NULL, NULL, NULL, NULL, 'a:0:{}', NULL, 'easy', '1'),
(25, '1', 'true_false', 'The HTML tags can be written in Capital or small Letters?', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'medium', '1'),
(26, '1', 'true_false', 'Text is written in word pad to create a home page?', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'hard', '1'),
(27, '1', 'true_false', 'Body tag is written after Head tag', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'medium', '1'),
(28, '1', 'true_false', 'Container tag is a solo tag.', NULL, NULL, NULL, NULL, NULL, 'false', NULL, 'medium', '1'),
(29, '1', 'true_false', 'Title is written in Head Tag', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'hard', '1'),
(30, '1', 'true_false', 'There are six levels in Heading.', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'veryhard', '1'),
(31, '1', 'true_false', 'The tag\r\nis used for paragraph.', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'medium', '1'),
(32, '2', 'true_false', 'Linking to an external style sheet allows you to have hyperlinks from your page to the World Wide Web.', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'easy', '1'),
(33, '2', 'true_false', 'The MIME type for a CSS style sheet is \"stylesheet = CSS\"', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'medium', '1'),
(34, '2', 'true_false', 'The rel attribute specifies a relationship between the current document and another document, such as a style sheet.', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'easy', '1'),
(35, '2', 'true_false', 'The link element should be placed at the top of the body section.', NULL, NULL, NULL, NULL, NULL, 'true', NULL, 'medium', '1'),
(36, '2', 'true_false', 'CSS can add background images to documents.', NULL, NULL, NULL, NULL, NULL, 'false', NULL, 'hard', '1'),
(37, '10', 'diagram', 'Name The Animal', 'download (2).jfif', NULL, NULL, NULL, NULL, 'a:2:{s:1:\"a\";s:3:\"Dog\";s:1:\"b\";s:5:\"Puppy\";}', NULL, 'medium', '1'),
(38, '10', 'diagram', 'Guess The Animal', 'cat.jpg', NULL, NULL, NULL, NULL, 'a:1:{s:1:\"a\";s:3:\"Cat\";}', NULL, 'easy', '1'),
(39, '10', 'diagram', 'Name 5 organs', 'human-skeleton-art-vector.jpg', NULL, NULL, NULL, NULL, 'a:5:{s:1:\"a\";s:4:\"Head\";s:1:\"b\";s:4:\"Eyes\";s:1:\"c\";s:4:\"Hand\";s:1:\"d\";s:8:\"Shoulder\";s:1:\"e\";s:4:\"Nose\";}', NULL, 'easy', '1'),
(40, '10', 'diagram', 'What is this?', 'tennis-ball.jpg', NULL, NULL, NULL, NULL, 'a:1:{s:1:\"a\";s:4:\"Ball\";}', NULL, 'easy', '1'),
(41, '10', 'diagram', 'Twinkle Twinkle Little ________', '24098481.jpg', NULL, NULL, NULL, NULL, 'a:1:{s:1:\"a\";s:4:\"Star\";}', NULL, 'easy', '1'),
(43, '1', 'diagram', 'How Many Columns Are there?', '3JoAZ.png', NULL, NULL, NULL, NULL, 'a:0:{}', NULL, 'easy', '1');

--
-- Dumping data for table `exam_question_ist`
--

INSERT INTO `exam_question_ist` (`id`, `question_id`, `exam_id`, `code`) VALUES
(1, '19', '7', ''),
(2, '5', '7', ''),
(3, '2', '7', ''),
(4, '18', '7', ''),
(5, '6', '7', ''),
(16, '11', '5', ''),
(17, '9', '5', ''),
(18, '7', '5', ''),
(19, '21', '5', ''),
(20, '22', '5', ''),
(21, '20', '5', ''),
(22, '6', '5', ''),
(23, '12', '5', ''),
(24, '4', '5', ''),
(25, '3', '5', ''),
(34, '6', '8', ''),
(35, '11', '8', ''),
(36, '3', '8', ''),
(37, '22', '8', ''),
(38, '23', '8', ''),
(39, '1', '8', ''),
(40, '19', '8', ''),
(41, '8', '8', ''),
(42, '1', '6', ''),
(43, '37', '6', ''),
(44, '34', '6', ''),
(45, '11', '6', ''),
(46, '41', '6', ''),
(47, '2', '6', ''),
(48, '31', '6', ''),
(49, '26', '6', ''),
(50, '35', '6', ''),
(51, '40', '6', '');

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
(28, '8', '29', '8', 'actual', 'subitem', '16');

--
-- Dumping data for table `favouritefiles`
--

INSERT INTO `favouritefiles` (`id`, `favouriteColors`, `fileId`, `fileType`, `userId`) VALUES
(1, '#dc3545', '20', 'user', '11'),
(2, '#ffc107', '30', 'user', '11'),
(3, '#007bff', '1', 'user', '11');

--
-- Dumping data for table `filepermissions`
--

INSERT INTO `filepermissions` (`id`, `pageId`, `permissionId`, `userId`, `color`, `permissionType`, `phaseId`) VALUES
(1, '30', '11', 'Everyone', 'blue', 'readOnly', NULL),
(2, '31', '11', 'Everyone', 'blue', 'readOnly', NULL),
(3, '32', '11', 'Everyone', 'blue', 'readOnly', NULL),
(4, '33', '11', 'Everyone', 'blue', 'readOnly', NULL),
(5, '34', '11', 'Everyone', 'blue', 'readOnly', NULL),
(6, '35', '11', 'Everyone', 'blue', 'readOnly', NULL),
(7, '36', '11', 'Everyone', 'blue', 'readOnly', NULL);

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

--
-- Dumping data for table `folder_shop_user`
--

INSERT INTO `folder_shop_user` (`id`, `folder_id`, `shelf_id`, `user_id`, `shop_id`, `lib_id`) VALUES
(1, '2', '1', '11', '2', '1'),
(2, '9', '1', '11', '6', '1');

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
(14, '12', 'dff', '23', '2023-08-22', '14:30:00');

--
-- Dumping data for table `gradesheet`
--

INSERT INTO `gradesheet` (`id`, `user_id`, `phase_id`, `course_id`, `class_id`, `class`, `instructor`, `vehicle`, `time`, `date`, `duration_hours`, `duration_min`, `over_all_grade`, `over_all_grade_per`, `over_all_comment`, `comments`, `gradsheet_status`, `status`, `created_at`) VALUES
(1, '18', '1', '1', '1', 'actual', '0', '0', '0', '2023-01-01', '0', '0', 'U', '30', '0', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(2, '18', '1', '1', '3', 'actual', '0', '0', '0', '2023-01-02', '0', '0', 'U', '40', '0', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(3, '18', '1', '1', '4', 'actual', '12', '1', '19:05', '2023-02-07', '00', '00', 'F', '55', ' ', '\"\"\"\"\"\"\"\r\n\\\\\\\\\\\r\n,,,,,,\r\n......\r\n(((((\r\n)))))\r\n@@@@@@@\r\n!!!!!!3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : \r\n5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : \r\n', NULL, '1', '2023-07-25 15:05:38.000000'),
(4, '13', '1', '1', '1', 'actual', '0', '0', '0', '2023-02-14', '0', '0', 'G', '80', '0', '\r\n              0            1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br>1. item-1 has very long text   : <br><b>1. item-1 has very long text   : <br>1. item-1 has very long text   : </b><br>', '1', '1', '0000-00-00 00:00:00.000000'),
(5, '13', '1', '1', '2', 'actual', '12', '1', '14:35', '0000-00-00', '00', '00', 'F', '60', ' Hello Everyone. How r u all?', '<p>`</p>\r\n<p>~</p>\r\n<p>!</p>\r\n<p>@</p>\r\n<p>\"</p>\r\n<p>\'</p>\r\n<p>:</p>\r\n<p>;</p>\r\n<p>&lt;</p>\r\n<p>&gt;</p>\r\n<p>?</p>\r\n<p>/</p>', NULL, '1', '2023-07-27 14:32:21.000000'),
(6, '29', '1', '1', '1', 'actual', '12', '1', '01:01', '0000-00-00', '0', '0', 'U', '50', 'Hello World', '0', NULL, '0', '0000-00-00 00:00:00.000000'),
(8, '13', '1', '1', '4', 'actual', '12', '1', '01:00', '0000-00-00', '02', '02', 'G', '80', 'Hello Everyone. How r u all?', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(9, '29', '1', '1', '4', 'actual', '12', '1', '01:00', '0000-00-00', '10', '10', 'G', '70', 'hello', '\r\n              \r\n              \r\n              \r\n              \r\n              0                                                7. General knowledge Page  : <br>            ', '2', '1', '0000-00-00 00:00:00.000000'),
(10, '27', '1', '1', '4', 'actual', '12', '1', '09:50', '0000-00-00', '20', '22', 'F', '75', 'Hello Everyone. How r u all?', NULL, '2', NULL, '2023-08-03 09:48:35.000000'),
(11, '27', '1', '1', '1', 'actual', '12', '1', '10:35', '0000-00-00', '22', '30', 'F', '75', 'Hello Everyone. How r u all?', NULL, NULL, NULL, '2023-08-04 10:34:05.000000'),
(12, '18', '1', '1', '8', 'actual', '12', '1', '17:39', '0000-00-00', '22', '30', 'F', '50', ' Hello Everyone. How r u all?', '2. item-3  : \r\n7. General knowledge Page  : \r\n', NULL, '1', '2023-08-07 15:39:49.000000'),
(13, '18', '1', '1', '9', 'actual', '12', '1', '15:45', '0000-00-00', '18', '20', 'V', '90', ' Hello Everyone. How r u all?', '6. item-7  : \r\n6. item-7  : \r\n', NULL, '1', '2023-08-07 15:42:31.000000'),
(14, '13', '1', '1', '8', 'actual', '12', '1', '16:53', '0000-00-00', '18', '20', 'E', '99', ' Hello Everyone. How r u all?', '5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : \r\n', NULL, '1', '2023-08-07 16:51:47.000000'),
(16, '29', '1', '1', '8', 'actual', '12', '1', '00:41', '0000-00-00', '10', '10', 'F', '60', ' jekekelk', '\r\n              \r\n              \r\n              \r\n              \r\n              \r\n                                                                                      ', '1', '0', '0000-00-00 00:00:00.000000'),
(17, '13', '1', '1', '9', 'actual', '12', '1', '16:48', '0000-00-00', '22', '11', 'G', '80', ' Hello Everyone. How r u all?', '3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : \r\n7. General knowledge Page  : \r\n', '2', '0', '2023-08-08 16:46:22.000000'),
(18, '29', '1', '1', '3', 'actual', '15', '1', '14:59', '0000-00-00', '11', '11', 'F', '50', 'Hello Everyone. How r u all?', NULL, NULL, NULL, '2023-08-09 12:59:12.000000'),
(19, '29', '1', '1', '9', 'actual', '12', '1', '11:05', '0000-00-00', '11', '11', 'G', '80', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages', '\r\n              \r\n              \r\n                          3. Item -1 item -2 utem -2 tebjhskdjlskdjaslkdmdxsa,mxas,ms  : <br>                        ', '1', '1', '2023-08-10 10:05:57.000000'),
(20, '27', '1', '1', '8', 'actual', '0', '0', '0', '0000-00-00', '0', '0', 'F', '50', 'Hello Everyone. How r u all?', '<font color=\"#ad1a1a\">1b. subitem-3  : </font><br><span style=\"background-color: rgb(210, 25, 25);\">4. msarii  : </span><br>5. The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.  : <br>5. The click event is handled for the menu icon, and the .other-options element is toggled with slide Toggle when the menu icon is clicked.  : <br><div><br></div><div>heelo ayuhsi</div>7. General knowledge Page  : <br>', '2', '1', '0000-00-00 00:00:00.000000'),
(21, '27', '1', '1', '9', 'actual', '0', '0', '0', '0000-00-00', '0', '0', '0', '0', '0', '0', '2', '0', '0000-00-00 00:00:00.000000'),
(22, '29', '1', '1', '16', 'actual', '12', '1', '09:48', '0000-00-00', '11', '22', NULL, NULL, NULL, NULL, NULL, '0', '2023-08-16 14:39:15.000000'),
(23, '29', '1', '1', '18', 'actual', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-08-22 17:13:55.000000'),
(24, '29', '1', '1', '1', 'sim', '12', '1', '16:30', '0000-00-00', '11', '22', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 16:28:59.000000'),
(25, '29', '1', '1', '2', 'sim', '12', '1', '18:32', '0000-00-00', '11', '22', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 16:32:57.000000'),
(26, '29', '1', '1', '4', 'sim', '12', '1', '16:45', '0000-00-00', '11', '22', 'G', '80', ' Hello mSarii', '\r\n                          ', '2', '1', '2023-08-23 16:40:22.000000'),
(27, '29', '3', '1', '5', 'actual', '12', '1', '15:48', '0000-00-00', '11', '22', 'G', '77', ' Hello world', '\r\n                          ', '1', '1', '2023-08-31 15:48:45.000000'),
(28, '29', '3', '1', '7', 'actual', '12', '1', '15:51', '0000-00-00', '22', '33', 'V', '90', ' ayushi bharti ', '\r\n                          ', '2', '1', '2023-08-31 15:50:33.000000'),
(29, '29', '3', '1', '27', 'actual', '12', '1', '17:03', '2023-09-18', '11', '11', 'F', '60', ' hello', '\r\n                          ', '1', '0', '2023-09-08 15:46:07.000000'),
(30, '24', '1', '1', '2', 'actual', '12', '1', '12:47', '2023-08-30', '11', '22', 'G', '70', ' Hello Everyone', '\r\n                          ', '2', '1', '2023-09-21 12:45:29.000000'),
(31, '16', '1', '1', '2', 'actual', '12', '1', '12:49', '2023-08-29', '23', '55', 'F', '50', ' Hello World', '\r\n                          ', '1', '1', '2023-09-21 12:48:07.000000'),
(32, '14', '1', '1', '3', 'actual', '12', '1', '12:51', '2023-09-13', '12', '22', 'V', '90', ' Hi guys', '\r\n                          ', '2', '1', '2023-09-21 12:49:26.000000'),
(33, '17', '1', '1', '3', 'actual', '12', '1', '12:53', '2023-08-29', '11', '22', 'G', '77', ' Hello Msarii', '\r\n                          ', '2', '1', '2023-09-21 12:51:50.000000'),
(34, '29', '1', '1', '2', 'actual', '12', '1', '15:41', '2023-10-13', '', '', 'U', '10', ' ', '\r\n                          ', NULL, '0', '2023-10-13 15:41:58.000000'),
(35, '32', '1', '1', '1', 'actual', '12', '1', '16:45', '2023-10-13', '', '', 'U', '20', ' ', '\r\n                          ', NULL, '0', '2023-10-13 16:45:52.000000'),
(36, '25', '1', '1', '1', 'actual', '12', '1', '16:52', '2023-10-13', '', '', 'U', '10', ' ', '\r\n                          ', NULL, '0', '2023-10-13 16:52:48.000000');

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
-- Dumping data for table `grade_permission`
--

INSERT INTO `grade_permission` (`id`, `grade_id`, `grade`, `status`, `cloneid`) VALUES
(1, '22', 'E', '1', NULL);

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
(18, '29', '4', 'sim', '4', '0');

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
(12, '4', '1', '1', 'sim', '4');

--
-- Dumping data for table `holydays`
--

INSERT INTO `holydays` (`id`, `startDate`, `endDate`, `holyDayName`, `departMentId`, `leaveType`) VALUES
(1, '2023-09-14', '2023-09-06', 'Diwali', '1', 'planned'),
(2, '2023-09-08', '2023-09-07', 'Dasherra', NULL, 'unPlanned');

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `file_name`, `uploaded_on`, `user_id`, `school_name`, `department_name`, `type`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, 'kudos.jpg', '2023-07-17', '11', '1', 'Driving school', NULL, 'Hello world', 'Dubai', '8765432190', 'ayushi260395@gmail.com', 'asdfghjkl', 'dfghjkl'),
(2, NULL, NULL, '11', '1', 'department 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, '11', '1', 'department 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, '11', '1', 'department 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, '11', '1', 'department 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `image_cert`
--

INSERT INTO `image_cert` (`id`, `cert_id`, `image_of_image`, `image_width`, `image_height`, `border_radius`, `border`, `border_color`, `status`) VALUES
(1, '1', '1', '100', '100', '5', '9', '#000000', '0');

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
(29, '3', '2', '3', '1', 'sim', NULL),
(30, '1', '2', '2', '1', 'sim', NULL),
(31, '2', '2', '2', '1', 'sim', NULL),
(32, '3', '2', '2', '1', 'sim', NULL),
(33, '4', '2', '2', '1', 'sim', NULL),
(34, '1', '1', '4', '1', 'sim', NULL),
(35, '2', '1', '4', '1', 'sim', NULL),
(36, '3', '1', '4', '1', 'sim', NULL),
(37, '4', '1', '4', '1', 'sim', NULL);

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

--
-- Dumping data for table `item_clone_gradesheet`
--

INSERT INTO `item_clone_gradesheet` (`id`, `user_id`, `item_id`, `grade`, `cloned_id`, `date`) VALUES
(1, '29', '5', 'F', '2', '2023-08-17'),
(2, '29', '6', '', '2', '2023-08-17'),
(3, '29', '7', 'V', '2', '2023-08-17'),
(4, '29', '8', '', '2', '2023-08-17'),
(5, '29', '9', 'V', '2', '2023-08-17'),
(6, '29', '10', '', '2', '2023-08-17'),
(7, '29', '11', 'V', '2', '2023-08-17'),
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

--
-- Dumping data for table `item_gradesheet`
--

INSERT INTO `item_gradesheet` (`id`, `user_id`, `item_id`, `grade`, `date`) VALUES
(0, '29', '26', 'F', '2023-10-13'),
(1, '18', '1', 'U', '2023-07-25'),
(2, '18', '1', 'U', '2023-07-25'),
(10, '13', '5', 'U', '2023-08-04'),
(11, '13', '6', 'F', '2023-08-04'),
(12, '13', '7', 'F', '2023-08-04'),
(13, '13', '8', 'U', '2023-08-04'),
(14, '13', '9', 'U', '2023-08-04'),
(15, '13', '10', 'F', '2023-08-04'),
(16, '13', '11', 'G', '2023-08-04'),
(17, '18', '5', 'U', '2023-08-07'),
(18, '18', '6', 'U', '2023-08-07'),
(19, '18', '7', 'U', '2023-08-07'),
(20, '18', '8', 'U', '2023-08-07'),
(21, '18', '9', 'U', '2023-08-07'),
(22, '18', '10', 'U', '2023-08-07'),
(23, '18', '11', 'G', '2023-08-07'),
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
(95, '29', '19', 'F', '2023-08-21'),
(96, '29', '20', 'F', '2023-08-21'),
(97, '29', '21', 'F', '2023-08-21'),
(98, '29', '22', 'G', '2023-08-21'),
(99, '29', '23', 'G', '2023-08-21'),
(100, '29', '24', 'G', '2023-08-21'),
(101, '29', '25', 'G', '2023-08-21'),
(102, '29', '34', '', '2023-08-23'),
(103, '29', '35', 'G', '2023-08-23'),
(104, '29', '36', 'V', '2023-08-23'),
(105, '29', '37', '', '2023-08-23'),
(106, '24', '26', 'V', '2023-09-21'),
(107, '16', '26', 'E', '2023-09-21');

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `library`, `user_id`) VALUES
(1, 'Main', 'super_admin'),
(3, 'library 2', '11'),
(4, 'library 3', '11');

--
-- Dumping data for table `main_department`
--

INSERT INTO `main_department` (`id`, `file_name`, `uploaded_on`, `user_id`, `department_name`, `description`, `location`, `contact_number`, `email`, `website`, `additional`) VALUES
(1, '', '', '11', 'Alkarama', '', '', '', '', '', '');

--
-- Dumping data for table `manage_role_course_phase`
--

INSERT INTO `manage_role_course_phase` (`id`, `phase_id`, `intructor`, `b_up_manger`, `course_id`, `phaseDate`, `courseName`, `courseCode`) VALUES
(1, '1', '12', '12', '1', '2023-08-01', '1', '1'),
(2, '3', '12', '12', '1', '2023-08-01', '1', '1'),
(3, '1', '12', '12', '22', '2023-08-08', '1', '5'),
(4, '3', '12', '12', '22', '2023-08-08', '1', '5');

--
-- Dumping data for table `meesages`
--

INSERT INTO `meesages` (`id`, `from_id`, `to_id`, `message`, `date`) VALUES
(1, '11', '11', 'hello', '2023-08-02 15:51:40.000000');

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `date`, `inst_id`, `topic`, `comment`, `student_id`, `course_id`, `memomarks`, `fileName`, `fileExt`, `categoryId`) VALUES
(1, '2023-08-02', '11', NULL, 'Memorandum for record', '29', '1', '', 'item.csv', 'csv', '1'),
(2, '2023-08-08', '11', NULL, 'memo ', '29', '1', '', 'Gardening Dep.csv', 'csv', '3'),
(3, '2023-09-04', '11', NULL, 'hello', '29', '1', '3', '', '', 'absent'),
(4, '2023-09-06', '11', NULL, 'hello', '29', '1', '7', '', '', 'absent'),
(5, '2023-10-10', '11', NULL, 'Hello', '13', '1', '7', 'examform2.php', 'php', 'absent'),
(6, '2023-10-09', '11', NULL, 'hello', '13', '1', '70', 'document_test (2).sql', 'sql', '2'),
(7, '2023-10-08', '11', NULL, 'hello', '16', '1', '3', '', '', 'absent'),
(8, '2023-10-10', '11', NULL, 'h', '16', '1', '20', 'test_updates (2) (1).sql', 'sql', '2');

--
-- Dumping data for table `memoabs`
--

INSERT INTO `memoabs` (`id`, `studentId`, `absday`) VALUES
(1, '29', '2');

--
-- Dumping data for table `memocate`
--

INSERT INTO `memocate` (`id`, `category`, `marks`, `date`) VALUES
(1, 'memo 1', NULL, '2023-08-09 16:07:15'),
(2, 'memo 2', NULL, '2023-08-09 16:07:15'),
(3, 'memo 33', NULL, '2023-08-09 16:07:15');

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`Courseid`, `CourseName`, `nick_name`, `CourseDate`, `CourseCode`, `StudentNames`, `CourseManager`, `file_name`, `Instructor`, `value_enter`, `departmentId`) VALUES
(13, '1', 'Driving Beginner', '2023-07-07', 3, '25', '12', NULL, NULL, '', NULL),
(17, '3', 'Servicing', '2023-07-07', 3, '22', '15', NULL, NULL, '', NULL),
(19, '4', 'Servicing', '2023-07-26', 3, '21', '15', NULL, NULL, '', NULL),
(21, '1', 'Driving Beginner', '2023-07-11', 4, '27', '15', NULL, NULL, '', NULL),
(22, '1', 'Parking School', '2023-07-18', 5, '29', '12', NULL, NULL, '', NULL),
(23, '1', 'Parking School', '2023-07-20', 6, '30', '15', NULL, NULL, '', NULL),
(24, '1', 'Parking School', '2023-07-13', 7, '31', '15', NULL, NULL, '', NULL),
(25, '2', 'Driving Beginner', '2023-07-06', 4, '33', '12', NULL, NULL, '', NULL),
(26, '2', 'Servicing', '2023-07-14', 5, '34', '15', NULL, NULL, '', NULL),
(27, '2', 'Parking School', '2023-07-07', 6, '35', '15', NULL, NULL, '', NULL),
(28, '2', 'Parking School', '2023-07-24', 7, '28', '12', NULL, NULL, '', NULL),
(29, '1', 'Driving Beginner', '2023-07-13', 8, '32', '12', NULL, NULL, '', NULL),
(30, '1', 'Parking School', '2023-07-18', 5, '13', '15', NULL, NULL, NULL, NULL),
(31, '1', 'Parking School', '2023-07-18', 5, '16', '12', NULL, NULL, NULL, NULL),
(32, '1', 'Parking School', '2023-07-18', 5, '14', '12', NULL, NULL, NULL, NULL),
(33, '1', 'Parking School', '2023-07-18', 5, '18', '12', NULL, NULL, NULL, NULL),
(34, '1', 'Parking School', '2023-07-18', 5, '19', '12', NULL, NULL, NULL, NULL),
(35, '1', 'Parking School', '2023-07-18', 5, '20', '15', NULL, NULL, NULL, NULL),
(36, '1', 'Parking School', '2023-07-18', 5, '23', '15', NULL, NULL, NULL, NULL),
(37, '1', 'Parking School', '2023-07-18', 5, '17', '12', NULL, NULL, NULL, NULL),
(38, '1', 'Parking School', '2023-07-18', 5, '24', '12', NULL, NULL, NULL, NULL);

--
-- Dumping data for table `new_warnning`
--

INSERT INTO `new_warnning` (`id`, `notificationId`, `studentId`, `type`, `classId`) VALUES
(1, '59', '29', 'actual', '2'),
(2, '68', '29', 'actual', '4'),
(3, '69', '29', 'actual', '4');

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
(30, '18', '12', NULL, 'actual', '3', 'You requested a gradesheet for a reset', NULL, NULL, 1, 0, '2023-08-07 14:02:46.000000'),
(31, '18', '12', NULL, 'actual', '1', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 14:59:02.000000'),
(32, '18', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 15:39:24.000000'),
(33, '', '18', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-07 15:40:37.000000'),
(34, '18', '12', NULL, 'actual', '9', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 15:42:02.000000'),
(35, '', '18', NULL, 'actual', '9', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-07 15:43:23.000000'),
(36, '13', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-07 16:51:22.000000'),
(37, '29', '12', NULL, 'actual', '8', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-08 10:58:45.000000'),
(38, '', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-08 11:33:21.000000'),
(39, '', '13', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-08 11:44:15.000000'),
(40, '29', '12', NULL, 'actual', '4', 'cloned_gradsheet', NULL, NULL, 1, 1, '2023-08-08 15:00:48.000000'),
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
(60, '29', '12', NULL, 'actual', '16', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-16 14:38:52.000000'),
(61, '29', '12', 'super admin', 'actual', '16', 'requesting to grade', NULL, NULL, 0, 0, '2023-08-17 09:59:29.000000'),
(62, '29', '12', NULL, 'actual', '16', 'permission grade', NULL, NULL, 0, 0, '2023-08-17 10:01:14.000000'),
(63, '29', '12', NULL, 'actual', '1', 'cloned_gradsheet', NULL, NULL, 1, 1, '2023-08-17 14:06:18.000000'),
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
(82, '12', '29', NULL, 'actual', '8', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-21 17:11:11.000000'),
(83, '29', '12', NULL, 'actual', '16', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-22 17:12:44.000000'),
(84, '29', '12', NULL, 'actual', '18', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-22 17:13:55.000000'),
(85, '29', '12', NULL, 'actual', '18', 'You requested a gradesheet for a reset', NULL, NULL, 0, 0, '2023-08-22 18:00:00.000000'),
(86, '29', '12', NULL, 'actual', '9', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-08-22 18:00:20.000000'),
(87, '12', '29', NULL, 'actual', '9', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-22 18:48:18.000000'),
(88, '', '29', NULL, 'actual', '8', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-22 19:00:50.000000'),
(89, '29', '12', NULL, 'sim', '1', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 16:28:59.000000'),
(90, '29', '12', NULL, 'sim', '2', 'is selected to fill gradsheet of', NULL, NULL, 0, 0, '2023-08-23 16:32:57.000000'),
(91, '29', '12', NULL, 'sim', '4', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-23 16:40:22.000000'),
(92, '12', '29', NULL, 'sim', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-23 16:44:34.000000'),
(93, '', '29', NULL, 'actual', '4', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-31 13:57:55.000000'),
(94, '29', '12', NULL, 'actual', '5', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-31 15:48:45.000000'),
(95, '12', '29', NULL, 'actual', '5', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-31 15:49:48.000000'),
(96, '29', '12', NULL, 'actual', '7', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-08-31 15:50:33.000000'),
(97, '12', '29', NULL, 'actual', '7', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-08-31 15:51:04.000000'),
(98, '', '29', NULL, 'actual', '1', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-08-31 16:36:46.000000'),
(99, '12', '29', NULL, 'actual', '4', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-06 16:51:20.000000'),
(100, '12', '29', NULL, 'actual', '9', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-07 16:43:46.000000'),
(101, '29', '12', NULL, 'actual', '27', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-08 15:46:07.000000'),
(102, '12', '29', NULL, 'actual', '27', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-08 15:47:21.000000'),
(103, '29', '12', NULL, 'actual', '27', 'You requested gradsheet is unlock for', NULL, NULL, 0, 0, '2023-09-18 17:00:29.000000'),
(104, '24', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-21 12:45:29.000000'),
(105, '12', '24', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-21 12:46:15.000000'),
(106, '16', '12', NULL, 'actual', '2', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-21 12:48:07.000000'),
(107, '12', '16', NULL, 'actual', '2', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-21 12:48:42.000000'),
(108, '14', '12', NULL, 'actual', '3', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-21 12:49:26.000000'),
(109, '12', '14', NULL, 'actual', '3', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-21 12:50:08.000000'),
(110, '17', '12', NULL, 'actual', '3', 'is selected to fill gradsheet of', NULL, NULL, 1, 0, '2023-09-21 12:51:50.000000'),
(111, '12', '17', NULL, 'actual', '3', 'filled your gradsheet for', NULL, NULL, 0, 0, '2023-09-21 12:52:23.000000'),
(112, '', '29', NULL, 'actual', '4', 'filled your repeated gradsheet for', NULL, NULL, 0, 0, '2023-10-09 15:19:09.000000');

--
-- Dumping data for table `orgchart_data`
--

INSERT INTO `orgchart_data` (`id`, `departmentName`, `parentId`, `type`) VALUES
(1, '2', '0', 'department'),
(2, '14', '1', 'user');

--
-- Dumping data for table `pagepermissions`
--

INSERT INTO `pagepermissions` (`id`, `pageId`, `permissionId`, `userId`, `color`, `permissionType`) VALUES
(1, '1', '11', 'Everyone', 'blue', 'readOnly');

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
-- Dumping data for table `persontitle`
--

INSERT INTO `persontitle` (`id`, `user_id`, `title`, `message`, `date`) VALUES
(2, '12', 'Employee of the Week', 'You done a very great job this year.', '2023-07-19'),
(3, '14', 'Student of the year', 'You score really great in this year so we r giving you this award.', '2023-07-19'),
(5, '25', 'Student of the month', 'Great work on this month', '2023-07-19'),
(6, '18', 'employee of the month', 'Great job', '2023-07-19'),
(7, '11', 'Student of the year', 'hjhdksfjsklfjksfj', '2023-08-08');

--
-- Dumping data for table `per_checklist`
--

INSERT INTO `per_checklist` (`id`, `user_id`, `title`, `description`, `status`, `priority`, `comment`, `date`, `category`, `color`) VALUES
(1, '11', 'checklist per 13', 'TOS Academy offers a diverse array of online and offline courses', 'Complted', 'low', 'hello wolrd', '2023-09-07', 'Category 33', '#e21818'),
(3, '11', 'checklist per 33', 'TOS Academy offers a diverse array of online and offline courses', 'Complted', 'low', 'hello', '2023-09-06', 'Category 33', 'red'),
(4, '12', 'checklist inst', 'TOS Academy offers a diverse array of online and offline courses', 'Complted', 'low', 'helo', '2023-09-12', 'Category 33', 'orange'),
(5, '14', 'Personal my', NULL, NULL, NULL, NULL, '2023-10-06 09:25:31', NULL, '#1e1bc5'),
(6, '14', 'Profession', NULL, NULL, NULL, NULL, '2023-10-06 09:25:31', NULL, '#e60f0f'),
(7, '14', 'White', NULL, NULL, NULL, NULL, '2023-10-06 09:25:31', NULL, '#2fec09'),
(8, '14', 'Blue', NULL, NULL, NULL, NULL, '2023-10-06 09:25:31', NULL, '#f109de'),
(9, '', 'today event', NULL, NULL, NULL, NULL, '2023-10-11 00:00:00', NULL, NULL),
(10, '11', 'birthday', NULL, NULL, NULL, NULL, '2023-10-11 00:00:00', NULL, NULL),
(11, '', 'my birthday', NULL, NULL, NULL, NULL, '2023-10-05 00:00:00', NULL, NULL),
(12, '', 'Msarii bday', NULL, NULL, NULL, NULL, '2023-10-06 00:00:00', NULL, NULL),
(13, '11', 'msarii bday', NULL, NULL, NULL, NULL, '2023-10-04 00:00:00', NULL, NULL),
(14, '11', 'my bday', NULL, NULL, NULL, NULL, '2023-10-06 00:00:00', NULL, NULL),
(15, '11', 'archana bday', NULL, NULL, NULL, NULL, '2023-10-02 00:00:00', NULL, NULL),
(16, '11', 'check color', NULL, NULL, NULL, NULL, '2023-10-05 00:00:00', NULL, '#e41111');

--
-- Dumping data for table `per_check_sub_checklist`
--

INSERT INTO `per_check_sub_checklist` (`id`, `checkListId`, `subCheckListId`, `userId`) VALUES
(6, '1', '3', '11'),
(7, '1', '4', '11'),
(8, '1', '8', '11'),
(9, '1', '7', '11'),
(11, '5', '6', '14'),
(12, '6', '9', '14'),
(13, '6', '11', '14'),
(14, '6', '10', '14'),
(15, '4', '12', '12');

--
-- Dumping data for table `per_subchecklist`
--

INSERT INTO `per_subchecklist` (`id`, `user_id`, `name`, `main_checklist_id`, `description`, `status`, `priority`, `category`, `comment`, `date`) VALUES
(0, '11', 'per sub7', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(1, '11', 'per sub 1 ', '1', 'Hello world', 'Complted', 'low', 'Category 33', 'hello msarii', NULL),
(3, '11', 'per sub 4', '1', NULL, NULL, NULL, NULL, NULL, '2023-09-06 10:29:23'),
(4, '11', 'per sub 5', '1', NULL, NULL, NULL, NULL, NULL, '2023-09-06 10:29:23'),
(5, '11', 'sub test', '5', NULL, NULL, NULL, NULL, NULL, '2023-09-11 11:29:00'),
(6, '11', 'sub test 1', '5', NULL, NULL, NULL, NULL, NULL, '2023-09-11 11:29:00'),
(7, '11', 'per sub 2', '1', NULL, NULL, NULL, NULL, NULL, '2023-10-03 14:31:29'),
(8, '11', 'per sub 6', '1', NULL, NULL, NULL, NULL, NULL, '2023-10-03 16:32:19'),
(9, '14', 'Hello', '6', NULL, NULL, NULL, NULL, NULL, '2023-10-06 09:29:45'),
(10, '14', 'World', '6', NULL, NULL, NULL, NULL, NULL, '2023-10-06 09:29:45'),
(11, '14', 'Mine', '6', NULL, NULL, NULL, NULL, NULL, '2023-10-06 09:29:45'),
(12, '12', 'subchecklist 11', '4', NULL, NULL, NULL, NULL, NULL, '2023-10-09 15:39:56'),
(13, '11', 'hello', '13', NULL, NULL, NULL, NULL, NULL, '2023-10-04 00:00:00'),
(14, '11', 'ayushi', '14', NULL, NULL, NULL, NULL, NULL, '2023-10-06 00:00:00'),
(15, '11', 'hello ayus', '15', NULL, NULL, NULL, NULL, NULL, '2023-10-02T00:00:00');

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`id`, `phasename`, `objective`, `ctp`, `color`, `phaseDuration`) VALUES
(0, 'phase', NULL, '1', NULL, NULL),
(1, 'Driving', NULL, '1', 'red', NULL),
(2, 'Driving', NULL, '2', 'green', NULL),
(3, 'Parking', NULL, '1', 'blue', NULL);

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

--
-- Dumping data for table `rolepermission`
--

INSERT INTO `rolepermission` (`id`, `rolePermission`, `cardName`) VALUES
(1, 'super admin', NULL);

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`, `color`) VALUES
(1, 'instructor', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL),
(2, 'student', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"0\";s:22:\"select_student_details\";s:1:\"1\";}', NULL),
(3, 'super admin', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', NULL),
(4, 'IT people', 'a:25:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"1\";s:10:\"class_page\";s:1:\"1\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";}', '#b6b11b');

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `shelf`, `library_id`) VALUES
(1, 'shelf 1', '1');

--
-- Dumping data for table `shelf_shop`
--

INSERT INTO `shelf_shop` (`id`, `user_id`, `shelf_id`, `shop_id`, `lib_id`) VALUES
(1, '11', '1', '2', '1'),
(2, '11', '1', '6', '1');

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shops`, `image`) VALUES
(2, 'shop1', 'hello1.png'),
(3, 'shop3', 'hello.jpg'),
(4, 'shop8', 'hello1.png'),
(5, 'shop10', 'File management v3.png'),
(6, 'Shop test', 'hello.jpg');

--
-- Dumping data for table `sidebar_ctp`
--

INSERT INTO `sidebar_ctp` (`id`, `ctp_id`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`id`, `sim`, `shortsim`, `ptype`, `percentage`, `phase`, `ctp`, `date`, `days`, `linesRequired`, `studentPerClass`) VALUES
(1, 'Front Sim', 'SDR-2', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(2, 'Front drive', 'SDR-1', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(3, 'Front Sim', 'SDR-6', '', 100, '1', '2', '2023-07-17', NULL, NULL, NULL),
(4, 'Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world Front drive hello world ', 'SDR-1', '', 100, '1', '1', '2023-07-21', 4, NULL, NULL),
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
(28, 'Front drive', 'jeiekwl', '', 100, '1', '1', '2023-08-09', NULL, NULL, NULL);

--
-- Dumping data for table `sim_phase`
--

INSERT INTO `sim_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1'),
(2, '3', '1');

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `code`, `ctp`, `description`, `explanation`, `progression`) VALUES
(1, 'Code', '1', 'Array', 'Array', 'Array'),
(2, 'Code1', NULL, 'Description1', 'Explanantion1', 'Progression1');

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
(9, 'checklist page', '<p>subchecklist</p>\r\n', 'editorData', '4', '1', '1');

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

--
-- Dumping data for table `subitem_cloned_gradesheet`
--

INSERT INTO `subitem_cloned_gradesheet` (`id`, `user_id`, `subitem_id`, `grade`, `cloned_id`, `date`) VALUES
(1, '29', '3', 'G', '1', '2023-08-17'),
(2, '29', '4', 'V', '1', '2023-08-17'),
(3, '29', '5', 'G', '1', '2023-08-17'),
(4, '29', '6', 'G', '1', '2023-08-17');

--
-- Dumping data for table `subitem_gradesheet`
--

INSERT INTO `subitem_gradesheet` (`id`, `user_id`, `subitem_id`, `grade`, `date`) VALUES
(1, '13', '2', 'V', '2023-07-31'),
(2, '13', '3', 'U', '2023-07-31'),
(3, '13', '4', 'U', '2023-07-31'),
(4, '13', '5', 'U', '2023-07-31'),
(5, '18', '1', 'G', '2023-08-07'),
(6, '18', '2', 'E', '2023-08-07'),
(11, '13', '6', 'E', '2023-08-08'),
(12, '13', '1', 'V', '2023-08-08'),
(13, '27', '3', 'F', '2023-08-10'),
(14, '27', '4', 'F', '2023-08-10'),
(15, '27', '5', 'F', '2023-08-10'),
(16, '27', '6', 'F', '2023-08-10'),
(21, '29', '3', 'U', '2023-08-21'),
(22, '29', '4', 'U', '2023-08-21'),
(23, '29', '5', 'U', '2023-08-21'),
(24, '29', '6', 'U', '2023-08-21'),
(25, '29', '1', 'F', '2023-08-21'),
(26, '29', '2', 'F', '2023-08-21');

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

--
-- Dumping data for table `temp_cat`
--

INSERT INTO `temp_cat` (`id`, `cat_id`) VALUES
(1, '2'),
(2, '5');

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
(30, 'Parking', 'T010', '', '100', '1', '1', '2023-08-31', NULL);

--
-- Dumping data for table `test_course`
--

INSERT INTO `test_course` (`id`, `course_name`, `course_description`, `date`) VALUES
(1, 'HTML New', 'Markup language hello', '0000-00-00'),
(2, 'CSS', 'cascading stylesheet', '0000-00-00'),
(3, 'Bootstrap', 'Use for responsive website', '0000-00-00'),
(4, 'PHP', 'High speed language', '0000-00-00'),
(5, 'MYSQL', 'Database to store data', '0000-00-00'),
(6, 'Javascript', 'scripting language', '0000-00-00'),
(7, 'Jquery', 'scripting language 2', '0000-00-00'),
(8, 'Ajax', 'scripting language 3', '0000-00-00'),
(9, 'driving', 'bdjkshfkjsrhks', '2023-10-12'),
(10, 'Nature diagram', 'Nature related photos here', '2023-10-12');

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`id`, `test_id`, `student_id`, `course_id`, `marks`, `created`, `status`, `userId`) VALUES
(1, 9, 29, '1', '60', '2023-08-31 14:32:41.000000', '1', '11'),
(2, 1, 29, '1', '70', '2023-08-31 14:33:03.000000', '1', '11'),
(3, 13, 29, '1', '50', '2023-08-31 14:33:19.000000', '1', '11'),
(4, 20, 29, '1', '80', '2023-08-31 14:33:31.000000', '1', '11'),
(5, 30, 29, '1', '70', '2023-08-31 14:33:43.000000', '1', '11'),
(6, 10, 29, '1', '98', '2023-08-31 14:38:49.000000', '1', '11'),
(7, 15, 29, '1', '80', '2023-08-31 14:39:01.000000', '1', '11'),
(8, 1, 13, '1', '70', '2023-09-21 10:23:19.000000', '1', '11'),
(9, 11, 13, '1', '75', '2023-09-21 10:23:32.000000', '1', '11'),
(10, 30, 13, '1', '50', '2023-09-21 10:23:45.000000', '1', '11'),
(11, 24, 13, '1', '40', '2023-09-21 10:24:00.000000', '1', '11'),
(12, 2, 16, '1', '60', '2023-09-21 10:24:21.000000', '1', '11'),
(13, 13, 16, '1', '90', '2023-09-21 10:24:34.000000', '1', '11'),
(14, 20, 16, '1', '20', '2023-09-21 10:24:48.000000', '1', '11'),
(15, 22, 16, '1', '55', '2023-09-21 10:25:02.000000', '1', '11'),
(16, 1, 14, '1', '90', '2023-09-21 10:26:37.000000', '1', '11'),
(17, 8, 14, '1', '60', '2023-09-21 10:27:49.000000', '1', '11'),
(18, 30, 14, '1', '30', '2023-09-21 10:28:02.000000', '1', '11'),
(19, 17, 14, '1', '55', '2023-09-21 10:28:16.000000', '1', '11');

--
-- Dumping data for table `test_phase`
--

INSERT INTO `test_phase` (`id`, `phase`, `ctp_id`) VALUES
(1, '1', '1');

--
-- Dumping data for table `test_updates`
--

INSERT INTO `test_updates` (`id`, `user_id`, `exam_id`, `status_start`, `start_time`, `status_end`, `end_time`, `repeat_id`, `exam_status`, `correct_answer`, `marks_got`) VALUES
(1, '14', '6', '1', '2023-10-12 15:10:15.000000', '1', '2023-10-12 15:30:08.000000', 0, 'pass', '7', '70');

--
-- Dumping data for table `typegradefilter`
--

INSERT INTO `typegradefilter` (`id`, `ctpId`, `gradeValue`, `filterStatus`) VALUES
(5, '1', '20', NULL);

--
-- Dumping data for table `type_category_data`
--

INSERT INTO `type_category_data` (`id`, `type`, `category`, `category_phase`, `category_value`, `percent`) VALUES
(0, '2', 'actual', '0', '5', '50.00000'),
(1, '2', 'actual', '0', '1', '50.00000'),
(2, '4', 'phase', 'actual', '1', '50.00000'),
(3, '4', 'phase', 'actual', '3', '50.00000');

--
-- Dumping data for table `type_data`
--

INSERT INTO `type_data` (`id`, `type_name`, `marks`, `ctp`) VALUES
(1, 'type2', NULL, '3'),
(2, 'type2', '20.00', '1'),
(3, 'quiz', '40.00', '1'),
(4, 'type1', '30.50', '1');

--
-- Dumping data for table `updatehide`
--

INSERT INTO `updatehide` (`id`, `userId`) VALUES
(0, '16'),
(2, '14'),
(3, '12'),
(4, '11');

--
-- Dumping data for table `userdepartment`
--

INSERT INTO `userdepartment` (`id`, `userId`, `departmentId`) VALUES
(1, '12', '1'),
(2, '12', '2'),
(3, '13', '2');

--
-- Dumping data for table `userdocumnet`
--

INSERT INTO `userdocumnet` (`id`, `userId`, `studentId`, `fileName`, `fileType`) VALUES
(1, '13', '1', 'Shahid_Akhtar_Resume (3-yrs Exp.pdf', 'pdf');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `file_name`, `uploaded_on`, `name`, `nickname`, `initial`, `studid`, `role`, `phone`, `gender`, `username`, `ins_id`, `email`, `password`, `create_datetime`, `seen_status`, `departmentId`) VALUES
(11, '850_6727-PRINT.jpg', '2023-08-24 12:50:42', 'A4', 'A4', 'HA', 'admin', 'super admin', '2147483647', 'gender', 'A4', '11', 'ayushi2@gmail.com1', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', 0, NULL),
(12, 'agesearch v3_1.png', '2023-07-20 13:01:00', 'Ayushi bharti', 'Bharti', NULL, 'inst1', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, '1'),
(13, 'Donna.png', '2023-09-11 17:21:31', 'student1', 'Archana', NULL, 'inst2', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(14, 'Donna.png', '2023-07-19 15:28:57', 'student2', 'archi', 'AR', 'std1', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-10 10:31:19', NULL, NULL),
(15, 'pngtree-a-small-pink-white-flower-png-image_2664964.png', NULL, 'varun mishra', 'varun', NULL, 'inst33', 'instructor', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(16, 'Donna.png', '2023-03-08 13:58:47', 'archana guthale', 'inst', NULL, 'studen4', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', '2022-04-05 10:31:19', NULL, NULL),
(17, 'Donna.png', NULL, 'jhvbsrf', 'stu', 'in', 'studen48', 'student', '7021364749', 'male', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', '2022-06-06 10:31:19', NULL, NULL),
(18, 'Donna.png', NULL, 'archana guthale', 'archi3', 'ar', 'archana', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', 'cf65e9e5920cda080f7903a968ad9744', '2022-06-06 10:31:19', NULL, NULL),
(19, 'Donna.png', NULL, 'archana guthale', 'archi1', '', 'studen9', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-01-12 10:31:19', NULL, NULL),
(20, 'Donna.png', NULL, 'archana', 'archi4', 'st', 'std20', 'student', '0702136474', 'female', NULL, '11', 'archana@msarii.com', '25d55ad283aa400af464c76d713c07ad', '2022-07-13 10:31:19', NULL, NULL),
(21, 'Donna.png', NULL, 'student', 'stu', 'AR', 'std10', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', '2022-08-18 10:31:19', NULL, NULL),
(22, 'Donna.png', NULL, 'student', 'inst', 'ar', 'std11', 'student', '0702136474', 'male', NULL, '11', 'archana@msarii.com', '26bca7d18fac41f574d34da8d6df4170', '2023-09-13 00:00:00', NULL, NULL),
(23, 'Donna.png', NULL, 'testing user', 'user1', 'AR', 'std103', 'student', '7021364749', 'female', NULL, '11', 'archana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-10-19 00:00:00', NULL, NULL),
(24, 'Donna.png', NULL, 'archana guthale', 'user4', 'AR', 'STD09', 'student', '+919474512', 'female', NULL, '11', 'archana@gmail.com', '26bca7d18fac41f574d34da8d6df4170', '2023-12-14 00:00:00', NULL, NULL),
(25, 'Donna.png', NULL, 'abcd', 'abcd', 'AB', 'std7', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-02-21 00:00:00', NULL, NULL),
(26, 'Donna.png', NULL, 'Ayushi Bharti', 'ayu', 'ayu', 'std44', 'IT people', '0883012547', 'female', NULL, '11', 'ayushi260395@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(27, 'Donna.png', NULL, 'student1', 'std1', 'SD', 'std0', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(28, 'Donna.png', NULL, 'student2', 'std2', 'SA', 'std9', 'student', '8765432190', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(29, 'Donna.png', '2023-08-08 10:41:40', 'student3', 'std3', 'SG', 'std8', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(30, 'Donna.png', NULL, 'abcdefgh', 'abcd', 'MA', 'sti9', 'student', '8765432190', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(31, 'Donna.png', NULL, 'ayushi', 'ayu', 'MAA', 'std66', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(32, 'Donna.png', NULL, 'Varun Mishra', 'varun', 'VV', 'std88', 'student', '0876543219', 'male', NULL, '11', 'jack@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(33, 'Donna.png', NULL, 'Archana Nair', 'Archana', 'AA', 'std55', 'student', '0876543219', 'female', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(34, 'Donna.png', NULL, 'Anchit ', 'anchit', 'AN', 'std99', 'student', '0876543219', 'male', NULL, '11', 'ayushi2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

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
(7, 'C:\\xampp2\\htdocs', 'fefefjiejeov', 'offline', '6', NULL, '0', '0', '11', 'super admin', 'red', '2023-07-06', '2023-07-06', 'A4', 'A4', '', 'NULL', 0),
(12, 'new plan (2) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'files', 4),
(13, 'archana pages (1).pdf', NULL, 'pdf', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'files', 4),
(14, 'new plan (9) (1) (2) (5) (3) (1).xlsx', NULL, 'xlsx', '3', NULL, '2', '2', '15', 'instructor', 'yellow', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', NULL, 0),
(15, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '3', NULL, '2', '2', '15', 'instructor', 'red', '2023-07-06', '2023-07-06', 'inst1', 'inst1', 'user', 'NULL', 0),
(16, 'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files', 'links', 'offline', '0', NULL, '2', '2', '13', 'student', 'red', '2023-07-06', '2023-07-06', 'inst', 'inst', '', 'NULL', 0),
(17, 'google.com', 'zae', 'offline', '1', NULL, '2', '2', '13', 'super admin', 'red', '2023-07-07', '2023-07-07', 'A4', 'A4', 'user', 'NULL', 0),
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
(35, 'C:\\Users\\Lenovo\\Desktop\\Im', 'checking', 'online', '0', NULL, '0', '0', '11', 'super admin', 'red', '2023-09-01', '2023-09-01', 'A4', 'A4', '', NULL, 0),
(36, 'Resume--Munavar.pdf', NULL, 'pdf', '0', NULL, '2', '2', '11', 'super admin', 'red', '2023-10-10', '2023-10-10', 'A4', 'A4', '', NULL, 0);

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `VehicleName`, `VehicleType`, `VehicleNumber`, `VehicleSpot`) VALUES
(1, NULL, '1', 'hsdjsd', 'dsmd');

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`vehid`, `vehicletype`) VALUES
(1, 'Car'),
(2, 'SUV ');

--
-- Dumping data for table `warning_data`
--

INSERT INTO `warning_data` (`id`, `warning_name`, `ctp`, `file_name`, `type`, `size`, `uploaded_on`, `bgColor`) VALUES
(1, 'Yellow Warninig', '1', NULL, NULL, NULL, NULL, '#401cf2'),
(2, 'Red Warning', '1', NULL, NULL, NULL, NULL, 'brown'),
(3, 'green warning', '2', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
