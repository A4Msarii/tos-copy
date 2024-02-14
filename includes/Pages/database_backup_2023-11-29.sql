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
  `days` int(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO academic VALUES('2','vbn','A02','','','1','1','56','user_file','','2023-07-21','2');
INSERT INTO academic VALUES('4','Parking in rush ','dcdc','','','1','1','55','user_file','','2023-08-01','');
INSERT INTO academic VALUES('5','academic -5','ac5','','','1','1','58','user_file','659523895','2023-11-01','');
INSERT INTO academic VALUES('6','park1','pk1','','','3','1','','','','2023-11-08','');
INSERT INTO academic VALUES('7','park2','pk2','','','3','1','','','','2023-11-08','');
INSERT INTO academic VALUES('8','academic3','AC3','','','7','1','','','','2023-11-09','');


CREATE TABLE `accomplish_task` (
  `ac_id` int(11) NOT NULL,
  `Item_ac` varchar(255) DEFAULT NULL,
  `Stud_ac` varchar(255) DEFAULT NULL,
  `gradsheet_id` varchar(30) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `assign_class` varchar(30) DEFAULT NULL,
  `assign_class_table` varchar(30) DEFAULT NULL,
  `assign_class_table_cloneid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO accomplish_task VALUES('1','1','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('2','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('3','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('4','1','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('5','3','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('6','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('7','3','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('8','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('9','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('10','3','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('11','2','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('12','3','13','14','item','','','','');
INSERT INTO accomplish_task VALUES('13','2','13','14','item','','','','');


CREATE TABLE `acedemic_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO acedemic_phase VALUES('1','1','1');
INSERT INTO acedemic_phase VALUES('2','7','1');


CREATE TABLE `acedemic_stu` (
  `id` int(30) NOT NULL,
  `std_id` int(30) DEFAULT NULL,
  `acedemic_id` int(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `updateDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO acedemic_stu VALUES('1','29','2','1','2023-11-16 11:05:36.000000','2023-11-16');
INSERT INTO acedemic_stu VALUES('2','13','2','1','2023-11-16 11:05:36.000000','2023-11-16');


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
  `studentPerClass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO actual VALUES('1','Front Drive','PRK-1','percentage','100','1','1','2023-07-17','','4','5');
INSERT INTO actual VALUES('2','back adding \"AYushi\"','ADR-2','percentage','100','1','1','2023-07-17','','','');
INSERT INTO actual VALUES('3','back adding','ADR-3','percentage','100','1','1','2023-07-17','','','');
INSERT INTO actual VALUES('4','Front Drive','ADR-2','percentage','100','1','1','2023-07-18','5','','');
INSERT INTO actual VALUES('5','Front Drive','ADR-9','percentage','100','3','1','2023-08-02','','','');
INSERT INTO actual VALUES('6','back park','ADR-92','percentage','100','3','1','2023-08-02','','','');
INSERT INTO actual VALUES('7','msarii','ADR-11','percentage','100','3','1','2023-08-02','','','');
INSERT INTO actual VALUES('8','back adding','ADR-8','percentage','100','1','1','2023-08-07','','','');
INSERT INTO actual VALUES('9','back adding','ADR-7','percentage','100','1','1','2023-08-07','','','');
INSERT INTO actual VALUES('10','back adding','wqopjow','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('11','Front Drive','2uiy2iywio','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('12','back adding','202uu2o','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('13','back park','ADR-366','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('14','back park ,xcnskcbsbcw scbvbevfbvcbcbwaukfvgefvbefjvefbvejbvdgvebvjebvebvfehjfg wvaefkbgveilhi dkvnfdfkgnbiebhrnbgkgrd ebve,bgkievnbk.jethlgtw ebgegtehgivhetgi;legt;oeu egnektghwupgh;otjgwi\'hw4 engekgheigbvkdsghsgtri dvnkdbgiuleshgbvegi','ADR-234','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('15','Front Drive','ADR-100','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('16','front adding','APR-10','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('17','Front Drive','APR-9','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('18','msarii','APR-8','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('19','Front Drive','APR-7','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('20','back adding','APR-6','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('21','back park','APR-4','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('22','Front Drive','APR-3','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('23','drive','APR-2','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('24','msarii','park 1','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('25','Front Drive','park','percentage','100','1','1','2023-08-09','','','');
INSERT INTO actual VALUES('26','Front Drive','ADR-9','percentage','100','2','2','2023-08-25','','','');
INSERT INTO actual VALUES('27','PPK','PPK','percentage','100','3','1','2023-09-08','','','');
INSERT INTO actual VALUES('28','newAct1','Act1','percentage','100','4','1','2023-11-08','','','');
INSERT INTO actual VALUES('29','newAct2','Act2','percentage','100','4','1','2023-11-08','','','');
INSERT INTO actual VALUES('30','newFolClass','NFC1','percentage','100','8','6','2023-11-22','','','');
INSERT INTO actual VALUES('31','newFolClass','NFC2','percentage','100','8','6','2023-11-22','','','');


CREATE TABLE `actual_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `instructor` varchar(30) DEFAULT NULL,
  `vehicle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `actual_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO actual_phase VALUES('1','1','2');
INSERT INTO actual_phase VALUES('2','2','2');
INSERT INTO actual_phase VALUES('3','3','3');
INSERT INTO actual_phase VALUES('4','1','1');
INSERT INTO actual_phase VALUES('5','2','2');
INSERT INTO actual_phase VALUES('6','3','1');
INSERT INTO actual_phase VALUES('7','0','1');
INSERT INTO actual_phase VALUES('8','6','1');
INSERT INTO actual_phase VALUES('9','4','1');
INSERT INTO actual_phase VALUES('10','7','1');
INSERT INTO actual_phase VALUES('11','8','6');


CREATE TABLE `additional_task` (
  `ad_id` int(11) NOT NULL,
  `Item` varchar(255) DEFAULT NULL,
  `Stud_id` int(30) DEFAULT NULL,
  `gradesheet_id` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `assign_class` varchar(30) DEFAULT NULL,
  `assign_class_table` varchar(30) DEFAULT NULL,
  `assign_class_table_cloneid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO additional_task VALUES('1','2','13','14','item','','','','');
INSERT INTO additional_task VALUES('2','6','29','5','item','','','','');
INSERT INTO additional_task VALUES('3','1','29','5','item','','','','');
INSERT INTO additional_task VALUES('4','1','29','26','item','','','','');
INSERT INTO additional_task VALUES('5','2','29','26','item','','','','');
INSERT INTO additional_task VALUES('6','3','29','26','item','','','','');


CREATE TABLE `adminpagechangelog` (
  `id` int(255) NOT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `alertreply` (
  `id` int(11) NOT NULL,
  `alert_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `is_read` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO alertreply VALUES('1','1','12','ok','0');
INSERT INTO alertreply VALUES('2','2','12','ok','0');
INSERT INTO alertreply VALUES('3','3','12','ok','0');
INSERT INTO alertreply VALUES('4','2','36','ok','0');
INSERT INTO alertreply VALUES('5','1','36','ok','0');
INSERT INTO alertreply VALUES('6','4','12','ok','0');
INSERT INTO alertreply VALUES('7','4','14','ok','0');
INSERT INTO alertreply VALUES('8','3','14','ok','0');
INSERT INTO alertreply VALUES('9','2','14','ok','0');
INSERT INTO alertreply VALUES('10','1','14','ok','0');
INSERT INTO alertreply VALUES('11','4','15','close','0');
INSERT INTO alertreply VALUES('12','3','15','close','0');
INSERT INTO alertreply VALUES('13','2','15','close','0');
INSERT INTO alertreply VALUES('14','1','15','close','0');
INSERT INTO alertreply VALUES('15','4','13','close','0');
INSERT INTO alertreply VALUES('16','3','13','close','0');
INSERT INTO alertreply VALUES('17','2','13','close','0');
INSERT INTO alertreply VALUES('18','1','13','close','0');
INSERT INTO alertreply VALUES('19','5','12','ok','0');
INSERT INTO alertreply VALUES('20','5','14','close','0');
INSERT INTO alertreply VALUES('21','5','16','ok','0');
INSERT INTO alertreply VALUES('22','4','16','ok','0');
INSERT INTO alertreply VALUES('23','2','16','ok','0');
INSERT INTO alertreply VALUES('24','1','16','ok','0');
INSERT INTO alertreply VALUES('25','6','12','ok','0');
INSERT INTO alertreply VALUES('26','6','14','ok','0');
INSERT INTO alertreply VALUES('27','8','12','ok','0');
INSERT INTO alertreply VALUES('28','7','12','ok','0');
INSERT INTO alertreply VALUES('29','8','16','ok','0');
INSERT INTO alertreply VALUES('30','7','16','ok','0');
INSERT INTO alertreply VALUES('31','6','16','ok','0');
INSERT INTO alertreply VALUES('33','8','14','ok','0');
INSERT INTO alertreply VALUES('34','7','14','ok','0');
INSERT INTO alertreply VALUES('35','8','29','ok','0');
INSERT INTO alertreply VALUES('36','7','29','ok','0');
INSERT INTO alertreply VALUES('37','6','29','ok','0');
INSERT INTO alertreply VALUES('38','2','29','ok','0');
INSERT INTO alertreply VALUES('39','8','34','ok','0');
INSERT INTO alertreply VALUES('40','7','34','ok','0');
INSERT INTO alertreply VALUES('41','6','34','ok','0');
INSERT INTO alertreply VALUES('42','2','34','ok','0');
INSERT INTO alertreply VALUES('43','8','33','ok','0');
INSERT INTO alertreply VALUES('44','7','33','ok','0');
INSERT INTO alertreply VALUES('45','6','33','ok','0');
INSERT INTO alertreply VALUES('46','2','33','ok','0');
INSERT INTO alertreply VALUES('47','8','32','ok','0');
INSERT INTO alertreply VALUES('48','7','32','ok','0');
INSERT INTO alertreply VALUES('49','6','32','ok','0');
INSERT INTO alertreply VALUES('50','2','32','ok','0');
INSERT INTO alertreply VALUES('51','8','31','ok','0');
INSERT INTO alertreply VALUES('52','7','31','ok','0');
INSERT INTO alertreply VALUES('53','6','31','ok','0');
INSERT INTO alertreply VALUES('54','2','31','ok','0');


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
  `textcolor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO alerttable VALUES('2','11','Graduation ceremony','hello world','2023-09-19','everyone','','Urgent Notice','#FF1202','Mekala-Rajesh-Resume.pdf','urgent_w.png','white');
INSERT INTO alerttable VALUES('6','11','Red Warning','Hello guys its woraning for u','2023-10-12','Everyone','','Caution','#FFC433','1aHE.gif','caution_w.png','black');
INSERT INTO alerttable VALUES('7','11','FeedBack Request','Request for exam, hello everyone, how r u? all good. have u all ok. please contact as soon as possible','2023-10-13','Everyone','','Feedback Request','#e933cf','the-difference-between-trees-and-shrubs-3269804-hero-a4000090f0714f59a8ec6201ad250d90.jpg','feedback_w.png','white');
INSERT INTO alerttable VALUES('8','11','meeting summary','Meeting in 10 minutes come as soon as possible','2023-10-13','Everyone','','Meeting Summaries','grey','how-to-draw-a-sun-featured-image-1200-991x1024.webp','summary_w.png','white');


CREATE TABLE `assing_warning_doc` (
  `id` int(30) NOT NULL,
  `files` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `noti_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO assing_warning_doc VALUES('1','orgChart.doc','','59');
INSERT INTO assing_warning_doc VALUES('2','orgChart (1).doc','','68');
INSERT INTO assing_warning_doc VALUES('3','MicrosoftTeams-image (52).png','','69');


CREATE TABLE `attrition` (
  `id` int(11) NOT NULL,
  `attritionDepartment` int(11) NOT NULL,
  `attritionPercent` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO attrition VALUES('1','0','60','');
INSERT INTO attrition VALUES('2','0','50','');


CREATE TABLE `briefcase` (
  `id` int(11) NOT NULL,
  `briefcase` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `certificate_data` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `structure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `chatdeleteforme` (
  `id` int(11) NOT NULL,
  `msgId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `chatgroup` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `groupDesc` varchar(255) DEFAULT NULL,
  `groupProfile` varchar(255) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO chatgroup VALUES('4','test group','vdvddv','','2023-11-03');


CREATE TABLE `chatpagepermission` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL,
  `pageType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO chatpagepermission VALUES('1','15','11','Everyone','readOnly','chatPage');


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
  `loca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO chats VALUES('1','11','12','hii?','','','2023-11-02 09:58:34.000000','Edited','','','','1','1','');
INSERT INTO chats VALUES('2','11','12','44','file','','2023-11-02 09:59:32.000000','','','','','1','1','userfile');
INSERT INTO chats VALUES('3','11','12','Shivani_Sharma.pdf','','','2023-11-02 10:05:15.000000','','','good','yes','1','1','');
INSERT INTO chats VALUES('4','11','12','45','file','','2023-11-02 10:08:57.000000','','','','','1','1','userfile');
INSERT INTO chats VALUES('5','11','12','Django Task (1).docx','','','2023-11-02 10:09:12.000000','','','nice','yes','1','1','');
INSERT INTO chats VALUES('6','11','12','46','','','2023-11-02 10:17:05.000000','Edited','','','','1','1','userfile');
INSERT INTO chats VALUES('7','11','12','C:\\xampp\\htdocs\\latest\\TOS','','','2023-11-02 10:20:22.000000','','','ok','yes','1','1','');
INSERT INTO chats VALUES('34','11','12','53','file','','2023-11-03 10:06:05.000000','','','','','1','1','userfile');
INSERT INTO chats VALUES('35','12','11','hii','','','2023-11-06 13:08:40.000000','','','','','1','1','');
INSERT INTO chats VALUES('36','12','11','57','','','2023-11-06 13:14:50.000000','','','','','1','1','userfile');
INSERT INTO chats VALUES('37','11','12','hii','','','2023-11-06 16:36:54.000000','','','','','1','1','');
INSERT INTO chats VALUES('38','12','11','hello','','','2023-11-07 11:11:37.000000','','','','','1','1','');
INSERT INTO chats VALUES('39','11','12','hii','','','2023-11-07 11:13:18.000000','','','','','1','1','');
INSERT INTO chats VALUES('40','12','11','how r you?','','','2023-11-07 11:14:36.000000','','','','','1','1','');
INSERT INTO chats VALUES('41','11','12','11','','','2023-11-07 14:44:00.000000','','','','','1','1','page');
INSERT INTO chats VALUES('42','12','11','64','','','2023-11-07 14:50:43.000000','','','','','1','1','userfile');
INSERT INTO chats VALUES('43','12','13','hii','','','2023-11-07 14:51:49.000000','','','','','0','0','');
INSERT INTO chats VALUES('44','12','11','hii','','','2023-11-07 17:02:38.000000','','','','','1','1','');
INSERT INTO chats VALUES('45','12','11','hii','','','2023-11-07 17:04:13.000000','','','','','1','1','');
INSERT INTO chats VALUES('46','11','12','hii','','','2023-11-14 16:41:36.000000','','','','','1','1','');
INSERT INTO chats VALUES('47','11','','69','','','2023-11-16 15:31:05.000000','','','','','0','0','userfile');
INSERT INTO chats VALUES('48','12','11','hii','','','2023-11-17 12:30:33.000000','','','','','1','1','');
INSERT INTO chats VALUES('49','12','11','hii','','','2023-11-17 12:31:01.000000','','','','','1','1','');
INSERT INTO chats VALUES('50','12','11','hii','','','2023-11-17 12:39:22.000000','','','','','1','1','');
INSERT INTO chats VALUES('51','11','12','hii','','','2023-11-17 12:57:46.000000','','','','','0','1','');
INSERT INTO chats VALUES('52','11','12','hii','','','2023-11-17 13:14:12.000000','','','','','0','1','');
INSERT INTO chats VALUES('53','11','12','varun','','','2023-11-17 13:14:26.000000','','','','','0','1','');
INSERT INTO chats VALUES('54','11','12','mishra','','','2023-11-17 13:15:35.000000','','','','','0','1','');
INSERT INTO chats VALUES('55','11','4','hii','','','2023-11-17 13:17:27.000000','','','','','0','0','');
INSERT INTO chats VALUES('56','11','12','hii','','','2023-11-20 16:29:33.000000','','','','','0','1','');


CREATE TABLE `check_sub_checklist` (
  `id` int(11) NOT NULL,
  `checkListId` varchar(255) DEFAULT NULL,
  `subCheckListId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO check_sub_checklist VALUES('1','4','3','29','1');
INSERT INTO check_sub_checklist VALUES('4','4','4','29','1');
INSERT INTO check_sub_checklist VALUES('5','5','6','29','1');
INSERT INTO check_sub_checklist VALUES('6','5','5','29','1');


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
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO checklist VALUES('4','checklist 1','1','','','','','','','2023-08-25 16:34:06','#f00a0a');
INSERT INTO checklist VALUES('5','checklist 2','1','','','','','','','2023-08-25 16:34:06','');
INSERT INTO checklist VALUES('6','checklist 3','1','','','','','','','2023-08-25 16:34:06','');
INSERT INTO checklist VALUES('7','checklist per 1','','','','','','','','2023-09-04 14:08:30','');
INSERT INTO checklist VALUES('8','checklist [er 2','','','','','','','','2023-09-04 14:08:30','');
INSERT INTO checklist VALUES('9','checklist per 1','','','','','','','','2023-09-04 14:08:49','');


CREATE TABLE `checkonline` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO checkonline VALUES('153','31','online');
INSERT INTO checkonline VALUES('162','34','online');
INSERT INTO checkonline VALUES('181','11','online');
INSERT INTO checkonline VALUES('182','12','online');


CREATE TABLE `checktyping` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `chatId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `class_documnet` (
  `id` int(11) NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO class_documnet VALUES('1','1','test','Data Analyst Questions (5).docx','docx','11');


CREATE TABLE `classfilter` (
  `id` int(11) NOT NULL,
  `className` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO classfilter VALUES('6','sim','qual');


CREATE TABLE `clearance_data` (
  `id` int(11) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `stud_id` varchar(30) DEFAULT NULL,
  `ctp_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO clearance_data VALUES('1','1','','','1');
INSERT INTO clearance_data VALUES('2','2','','','1');
INSERT INTO clearance_data VALUES('3','3','','','1');
INSERT INTO clearance_data VALUES('4','4','','','1');


CREATE TABLE `clearance_student_id` (
  `id` int(30) NOT NULL,
  `clearance_id` varchar(30) NOT NULL,
  `stud_id` varchar(30) NOT NULL,
  `class_id` varchar(30) NOT NULL,
  `class_table` varchar(30) NOT NULL,
  `clone_cid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO clearance_student_id VALUES('1','1','29','2','actual','');


CREATE TABLE `clone_class` (
  `id` int(30) NOT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `std_id` varchar(30) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `cloned_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO clone_class VALUES('1','1','14','actual','1');
INSERT INTO clone_class VALUES('2','4','18','actual','1');
INSERT INTO clone_class VALUES('3','4','29','actual','1');
INSERT INTO clone_class VALUES('5','1','29','actual','1');
INSERT INTO clone_class VALUES('7','5','29','actual','1');
INSERT INTO clone_class VALUES('8','6','29','actual','1');
INSERT INTO clone_class VALUES('9','7','29','actual','1');
INSERT INTO clone_class VALUES('10','5','29','actual','2');
INSERT INTO clone_class VALUES('11','7','29','actual','2');
INSERT INTO clone_class VALUES('12','5','29','actual','3');
INSERT INTO clone_class VALUES('13','6','29','actual','2');
INSERT INTO clone_class VALUES('14','5','29','actual','4');
INSERT INTO clone_class VALUES('15','6','29','actual','3');
INSERT INTO clone_class VALUES('16','1','27','actual','1');
INSERT INTO clone_class VALUES('17','6','27','actual','1');
INSERT INTO clone_class VALUES('18','7','27','actual','1');
INSERT INTO clone_class VALUES('19','4','29','sim','1');
INSERT INTO clone_class VALUES('20','5','29','sim','1');
INSERT INTO clone_class VALUES('21','6','29','sim','1');
INSERT INTO clone_class VALUES('22','7','29','sim','1');
INSERT INTO clone_class VALUES('23','8','29','sim','1');
INSERT INTO clone_class VALUES('24','9','29','sim','1');
INSERT INTO clone_class VALUES('26','11','29','sim','1');
INSERT INTO clone_class VALUES('27','12','29','sim','1');
INSERT INTO clone_class VALUES('28','13','29','sim','1');
INSERT INTO clone_class VALUES('29','14','29','sim','1');
INSERT INTO clone_class VALUES('30','15','29','sim','1');
INSERT INTO clone_class VALUES('31','16','29','sim','1');
INSERT INTO clone_class VALUES('32','17','29','sim','1');
INSERT INTO clone_class VALUES('33','18','29','sim','1');
INSERT INTO clone_class VALUES('34','19','29','sim','1');
INSERT INTO clone_class VALUES('35','20','29','sim','1');
INSERT INTO clone_class VALUES('36','21','29','sim','1');
INSERT INTO clone_class VALUES('37','22','29','sim','1');
INSERT INTO clone_class VALUES('38','23','29','sim','1');
INSERT INTO clone_class VALUES('39','24','29','sim','1');
INSERT INTO clone_class VALUES('40','25','29','sim','1');
INSERT INTO clone_class VALUES('41','26','29','sim','1');
INSERT INTO clone_class VALUES('42','27','29','sim','1');
INSERT INTO clone_class VALUES('43','28','29','sim','1');
INSERT INTO clone_class VALUES('44','4','29','actual','2');
INSERT INTO clone_class VALUES('45','8','29','actual','1');
INSERT INTO clone_class VALUES('46','2','29','actual','1');
INSERT INTO clone_class VALUES('49','1','29','test','1');
INSERT INTO clone_class VALUES('50','2','29','test','1');
INSERT INTO clone_class VALUES('51','1','29','quiz','1');


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
  `gradsheet_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO cloned_gradesheet VALUES('1','29','1','1','1','actual','12','1','12:20','2023-11-29','','','U','20',' cdcwv','\r\n                          ','1','1','','1');


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
  `vehicleName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CTPid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO ctppage VALUES('1','Driving School Advanced','DA','Driving','1','66555-1607-new-microsoft-powerpoint-presentation-(3) (6) (9) (5) (1).pptx','UAE Driving School','Alkarama Branch A','To qualify drivers to drive','4','ah','6','','100.00','1','#1aff1d','Car');
INSERT INTO ctppage VALUES('2','Driving School Beginner','DB','Parking','1','gradesheet.sql','UAE Driving School','Abu dhabi','To qualify drivers to drive','4','dfghj','7','Hello','','1','','Car');
INSERT INTO ctppage VALUES('3','Python Class','PY','Parking','2','hashoff (1).sql','UAE Driving School','Abu dhabi','To qualify drivers to drive','4','hekk','8','kdks','','1','','');
INSERT INTO ctppage VALUES('4','Science Class','SC','hdkhs','1','gradesheet (1).sql','dsjkhdk','Abu dhabi','To qualify drivers to drive','4','fghj','5','kdks','','1','','');
INSERT INTO ctppage VALUES('5','Math Class','MA','Parking','1','folders.sql','driving school','Abu dhabi','To qualify drivers to drive','4','hello','6','Hello','','1','','');
INSERT INTO ctppage VALUES('6','test shop','ts','ts1','2','Sandeep_Kumar_Resume_Software_Developer.pdf','Mr.varun','prayagraj','NA','200','NA','5','Without Goal','','1','','BMW');


CREATE TABLE `deconflicterdata` (
  `id` int(11) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) NOT NULL,
  `linePerDay` int(11) DEFAULT NULL,
  `departMentId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO deconflicterdata VALUES('1','2023-09-08','2023-09-13','5','');


CREATE TABLE `deconflicterdepartment` (
  `id` int(11) NOT NULL,
  `departMentId` varchar(255) DEFAULT NULL,
  `mainId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO deconflicterdepartment VALUES('1','1','1','planedLeave');
INSERT INTO deconflicterdepartment VALUES('2','3','2','unPlanned');
INSERT INTO deconflicterdepartment VALUES('3','3','1','attrition');
INSERT INTO deconflicterdepartment VALUES('4','1','1','linePerDay');


CREATE TABLE `desccate` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO desccate VALUES('1','Descipline 1','60','2023-08-23 16:15:05');
INSERT INTO desccate VALUES('2','Descipline 2','70','2023-08-23 16:15:05');
INSERT INTO desccate VALUES('3','Descipline','80','2023-08-23 16:15:05');


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
  `test` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



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
  `categoryId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO discipline VALUES('1','2023-08-08','11','','Descipline Marks','60','29','1','users (1).csv','csv','1');
INSERT INTO discipline VALUES('2','2023-08-18','11','','Hello world','80','29','1','Gardening Dep (2).xlsx','xlsx','3');
INSERT INTO discipline VALUES('3','2023-10-09','11','','hi','60','14','1','test_updates (2) (1).sql','sql','1');
INSERT INTO discipline VALUES('4','2023-10-09','11','','hi','20','14','1','test_updates (2) (1).sql','sql','1');
INSERT INTO discipline VALUES('5','2023-10-09','11','','bye','60','14','1','document_test (2).sql','sql','1');
INSERT INTO discipline VALUES('6','2023-10-09','11','','bye','30','14','1','document_test (2).sql','sql','1');
INSERT INTO discipline VALUES('7','2023-10-09','11','','bye','7','14','1','roles (2).sql','sql','absent');


CREATE TABLE `discipline_data` (
  `id` int(11) NOT NULL,
  `student_id` int(30) DEFAULT NULL,
  `dismarks` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO discipline_data VALUES('1','29','90');


CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `divisionName` varchar(255) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO division VALUES('1','devision 1','#c01616');
INSERT INTO division VALUES('2','devision 2','#9aae0a');
INSERT INTO division VALUES('3','devision 3','#9aae0a');
INSERT INTO division VALUES('4','devision 4','#9aae0a');
INSERT INTO division VALUES('5','devision 5','');
INSERT INTO division VALUES('6','devision 6','');
INSERT INTO division VALUES('7','devision 7','');


CREATE TABLE `division_department` (
  `id` int(11) NOT NULL,
  `departmentId` varchar(255) DEFAULT NULL,
  `divisionId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO division_department VALUES('1','1','1');
INSERT INTO division_department VALUES('2','1','2');
INSERT INTO division_department VALUES('3','2','2');


CREATE TABLE `document_test` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `refrence` varchar(3000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileLoca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO document_test VALUES('4','Shivani_Sharma.pdf','hii','testing1','2023-11-06','pdf','','');
INSERT INTO document_test VALUES('5','D:\\xampp\\htdocs','','link','','offline','D:xampph','');
INSERT INTO document_test VALUES('6','http://arudantech.com/','','link1','2023-11-07','online','http://aru','');
INSERT INTO document_test VALUES('7','60','','lab file','2023-11-07','','','userFile');
INSERT INTO document_test VALUES('8','61','','lab link','2023-11-07','','','userFile');
INSERT INTO document_test VALUES('9','62','','lab link online','2023-11-07','','','userFile');


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
  `briefType` varchar(255) DEFAULT NULL,
  `pageLoc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO editor_data VALUES('1','test page','<p>hello word</p>\r\n','9','6','0','2023-07-24','2023-07-24','A4','A4','','11','','Initial publish','red','super admin','NULL','');
INSERT INTO editor_data VALUES('6','again test','<p>sdcscdsvvvedvqeveqb</p>\r\n','','0','','2023-10-31','2023-10-31','A4','A4','','11','','','red','super admin','','chat');
INSERT INTO editor_data VALUES('7','group page','<p>&nbsp;avadfbdgbgfnf&nbsp; f</p>\r\n','','0','','2023-11-01','2023-11-01','A4','A4','','11','','','red','super admin','','chat');
INSERT INTO editor_data VALUES('8','varun page','<p>brgrbrbrbr varun mishra</p>\r\n','','0','','2023-11-02','2023-11-02','A4','A4','','11','','','red','super admin','','chat');
INSERT INTO editor_data VALUES('9','group page','<p>vdbshrnrnrnsnrw varun</p>\r\n','','0','','2023-11-02','2023-11-02','A4','A4','','11','','','red','super admin','','chat');
INSERT INTO editor_data VALUES('10','group page','<p>cscsvv</p>\r\n','','0','','2023-11-07','2023-11-07','A4','A4','','11','','','red','super admin','','chat');
INSERT INTO editor_data VALUES('11','chat page','<p>hello guy&#39;s</p>\r\n','','0','','2023-11-07','2023-11-07','A4','A4','','11','','','red','super admin','','chat');


CREATE TABLE `emergency_data` (
  `id` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `subitem` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `ctp_id` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO emergency_data VALUES('1','2','','29','1','');
INSERT INTO emergency_data VALUES('2','1','','29','1','');
INSERT INTO emergency_data VALUES('3','2','','29','1','');
INSERT INTO emergency_data VALUES('4','3','','29','1','');


CREATE TABLE `exam_answers_once_test` (
  `id` int(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `countAttempts` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO exam_answers_once_test VALUES('1','118','16','','c','12','4');
INSERT INTO exam_answers_once_test VALUES('2','119','16','','d','12','2');


CREATE TABLE `exam_answers_repeat_test` (
  `id` int(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `repeat_id` int(255) DEFAULT NULL,
  `countAttempts` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO exam_answers_repeat_test VALUES('1','91','a','29','a','1','1','0');
INSERT INTO exam_answers_repeat_test VALUES('2','91','b','29','a','1','1','0');
INSERT INTO exam_answers_repeat_test VALUES('3','110','','14','false','9','8','0');
INSERT INTO exam_answers_repeat_test VALUES('4','111','','14','true','9','8','0');
INSERT INTO exam_answers_repeat_test VALUES('5','114','hand1','14','a','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('6','','','14','','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('7','114','leg1','14','b','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('8','115','leg1','14','a','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('9','115','eye1','14','c','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('10','115','hand1','14','b','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('11','116','','14','false','11','8','0');
INSERT INTO exam_answers_repeat_test VALUES('12','117','','14','true','11','8','0');


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
  `questionRef` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO exam_question VALUES('1','1','mcq','','HTML stand for','','Hypermark Language','Hypermix language','Hypertext Markup Language','Hypertension Language','c','','easy','1','','','','Read about Html.');
INSERT INTO exam_question VALUES('2','1','mcq','','Which tag is used to create a check box','','<checkbox>','<Input type=\"checkbox\">','<type=\"checkbox\"','None of the above','b','','easy','1','','','','');
INSERT INTO exam_question VALUES('3','1','mcq','','From which tag descriptive list starts ?','',' <LL>',' <DL>',' <LDL>',' <DD>','b','','easy','1','','','','');
INSERT INTO exam_question VALUES('4','1','mcq','','Which HTML tag produces the biggest heading? ','','<h7>','<H>','<H1>','<HI>','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('5','1','mcq','','Which type of HTML language is ? ','','scripting language','programming language','Markup language','Network language','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('6','2','mcq','','What does CSS stand for?','','Colorful Style Sheets','Creative Style Sheets','Cascading Style Sheets','Computer Style Sheets','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('7','2','mcq','','How can we change the background color of an element?','','background-color','color','Both A and B','None of above','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('8','2','mcq','','Which of the following tag is used to embed css in html page?','','<css>','<!DOCTYPE html>','<script> ','<style>','d','','easy','1','','','','');
INSERT INTO exam_question VALUES('9','2','mcq','','Which of the following CSS selectors are used to specify a group of elements?','','tag','id','class','both class and tag','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('10','2','mcq','','Which of the following CSS framework is used to create a responsive design?','','Django','Rails','Laravell','bootstrap','d','','medium','1','','','','');
INSERT INTO exam_question VALUES('11','2','mcq','','Which of the following CSS property is used to make the text bold?','','text-decoration: bold','font-weight: bold',' font-style: bold','text-align: bold','b','','easy','1','','','','');
INSERT INTO exam_question VALUES('12','2','mcq','','Which of the following CSS style property is used to specify an italic text?','','style','font','font-style','@font-face','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('13','6','mcq','','What is JavaScript?','','JavaScript is a scripting language used to make the website interactive','JavaScript is an assembly language used to make the website interactive','JavaScript is a compiled language used to make the website interactive','None of the mentioned','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('14','6','mcq','','Which of the following object is the main entry point to all client-side JavaScript features and APIs?','','Position','Window','Standard','Location','b','','easy','1','','','','');
INSERT INTO exam_question VALUES('15','6','mcq','','Which of the following is correct about JavaScript?','',' JavaScript is an Object-Based language','JavaScript is Assembly-language','JavaScript is an Object-Oriented language','JavaScript is a High-level language','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('16','6','mcq','','Arrays in JavaScript are defined by which of the following statements?','','It is an ordered list of values','It is an ordered list of objects',' It is an ordered list of string','It is an ordered list of functions','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('17','6','mcq','','Which of the following is not javascript data types?','','Null type','Undefined type','Number type','All of the mentioned','d','','easy','1','','','','');
INSERT INTO exam_question VALUES('18','3','mcq','','Which of the following class in Bootstrap is used to provide a responsive fixed width container?','','.container-fixed','.container-fluid','.container','All of the above','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('19','3','mcq','','Which of the following class in Bootstrap is used to create a dropdown menu?','','.dropdown','.select','.select-list','None of the above','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('20','3','mcq','','Which of the following bootstrap styles can be used to create a default progress bar?','','.nav-progress','.link-progress-bar','.progress, .progress-bar','All of the mentioned','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('21','3','mcq','','The Bootstrap grid system is based on how many columns?','','4','6','12','18','c','','easy','1','','','','');
INSERT INTO exam_question VALUES('22','3','mcq','','Which plugin is used to cycle through elements, like a slideshow?','','Carousel Plugin','Modal Plugin','Tooltip Plugin','None of the mentioned','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('23','3','mcq','','Which of the following is correct about the data-animation Data attribute of the Popover Plugin?','','Gives the popover a CSS fade transition','Inserts the popover with HTML','Indicates how the popover should be positioned','Assigns delegated tasks to the designated targets','a','','easy','1','','','','');
INSERT INTO exam_question VALUES('24','2','diagram','','Guess the name','MicrosoftTeams-image (104).png','','','','','a:0:{}','','easy','1','','','','');
INSERT INTO exam_question VALUES('25','1','true_false','','The HTML tags can be written in Capital or small Letters?','','','','','','true','','medium','1','','','','');
INSERT INTO exam_question VALUES('26','1','true_false','','Text is written in word pad to create a home page?','','','','','','true','','hard','1','','','','');
INSERT INTO exam_question VALUES('27','1','true_false','','Body tag is written after Head tag','','','','','','true','','medium','1','','','','');
INSERT INTO exam_question VALUES('28','1','true_false','','Container tag is a solo tag.','','','','','','false','','medium','1','','','','');
INSERT INTO exam_question VALUES('29','1','true_false','','Title is written in Head Tag','','','','','','true','','hard','1','','','','');
INSERT INTO exam_question VALUES('30','1','true_false','','There are six levels in Heading.','','','','','','true','','veryhard','1','','','','');
INSERT INTO exam_question VALUES('31','1','true_false','','The tag\r\nis used for paragraph.','','','','','','true','','medium','1','','','','');
INSERT INTO exam_question VALUES('32','2','true_false','','Linking to an external style sheet allows you to have hyperlinks from your page to the World Wide Web.','','','','','','true','','easy','1','','','','');
INSERT INTO exam_question VALUES('33','2','true_false','','The MIME type for a CSS style sheet is \"stylesheet = CSS\"','','','','','','true','','medium','1','','','','');
INSERT INTO exam_question VALUES('34','2','true_false','','The rel attribute specifies a relationship between the current document and another document, such as a style sheet.','','','','','','true','','easy','1','','','','');
INSERT INTO exam_question VALUES('35','2','true_false','','The link element should be placed at the top of the body section.','','','','','','true','','medium','1','','','','');
INSERT INTO exam_question VALUES('36','2','true_false','','CSS can add background images to documents.','','','','','','false','','hard','1','','','','');
INSERT INTO exam_question VALUES('37','10','diagram','','Name The Animal','download (2).jfif','','','','','a:2:{s:1:\"a\";s:3:\"Dog\";s:1:\"b\";s:5:\"Puppy\";}','','medium','1','','','','');
INSERT INTO exam_question VALUES('38','10','diagram','','Guess The Animal','cat.jpg','','','','','a:1:{s:1:\"a\";s:3:\"Cat\";}','','easy','1','','','','');
INSERT INTO exam_question VALUES('39','10','diagram','','Name 5 organs','human-skeleton-art-vector.jpg','','','','','a:5:{s:1:\"a\";s:4:\"Head\";s:1:\"b\";s:4:\"Eyes\";s:1:\"c\";s:4:\"Hand\";s:1:\"d\";s:8:\"Shoulder\";s:1:\"e\";s:4:\"Nose\";}','','easy','1','','','','');
INSERT INTO exam_question VALUES('40','10','diagram','','What is this?','tennis-ball.jpg','','','','','a:1:{s:1:\"a\";s:4:\"Ball\";}','','easy','1','','','','');
INSERT INTO exam_question VALUES('41','10','diagram','','Twinkle Twinkle Little ________','24098481.jpg','','','','','a:1:{s:1:\"a\";s:4:\"Star\";}','','easy','1','','','','');
INSERT INTO exam_question VALUES('43','1','diagram','','How Many Columns Are there?','3JoAZ.png','','','','','a:0:{}','','easy','1','','','','');
INSERT INTO exam_question VALUES('62','1','digrame','','label','success.jpg','','','','','a:2:{s:1:\"a\";s:5:\"hand1\";s:1:\"b\";s:4:\"leg1\";}','','easy','4','','','','');
INSERT INTO exam_question VALUES('63','1','digrame','','2 digram12','success.jpg','','','','','a:3:{s:1:\"a\";s:5:\"hand1\";s:1:\"b\";s:4:\"leg1\";s:1:\"c\";s:4:\"eye1\";}','','medium','4','','','','');
INSERT INTO exam_question VALUES('64','1','mcq','','Large tag for heading?','','h1','h4','h6','h3','a','','easy','4','','','','');
INSERT INTO exam_question VALUES('65','1','mcq','','Which one is paragraph tag?','','p','h1','span','div','a','','easy','4','','blog2.jpg','jpg','');
INSERT INTO exam_question VALUES('66','1','mcq','','vvvgbgwv','','we','er','we','hii','d','','easy','4','','','','');
INSERT INTO exam_question VALUES('67','1','true_false','','we can apply height and width in display inline or not?','','','','','','false','','easy','4','','VarunPicture.jpeg','jpeg','');
INSERT INTO exam_question VALUES('68','1','true_false','','we can apply height and width in display inline-block?','','','','','','true','','easy','4','','','','');
INSERT INTO exam_question VALUES('69','1','mcq','','dnwcc','','faef','vv','dfv','fvfdv','a','','easy','4','','','','mmjym');
INSERT INTO exam_question VALUES('70','1','mcq','','jmymy','','df','nh','S','H','b','','easy','4','','','','sqxx');


CREATE TABLE `exam_question_ist` (
  `id` int(255) NOT NULL,
  `question_id` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO exam_question_ist VALUES('1','19','7','');
INSERT INTO exam_question_ist VALUES('2','5','7','');
INSERT INTO exam_question_ist VALUES('3','2','7','');
INSERT INTO exam_question_ist VALUES('4','18','7','');
INSERT INTO exam_question_ist VALUES('5','6','7','');
INSERT INTO exam_question_ist VALUES('34','6','8','');
INSERT INTO exam_question_ist VALUES('35','11','8','');
INSERT INTO exam_question_ist VALUES('36','3','8','');
INSERT INTO exam_question_ist VALUES('37','22','8','');
INSERT INTO exam_question_ist VALUES('38','23','8','');
INSERT INTO exam_question_ist VALUES('39','1','8','');
INSERT INTO exam_question_ist VALUES('40','19','8','');
INSERT INTO exam_question_ist VALUES('41','8','8','');
INSERT INTO exam_question_ist VALUES('42','1','6','');
INSERT INTO exam_question_ist VALUES('43','37','6','');
INSERT INTO exam_question_ist VALUES('44','34','6','');
INSERT INTO exam_question_ist VALUES('45','11','6','');
INSERT INTO exam_question_ist VALUES('46','41','6','');
INSERT INTO exam_question_ist VALUES('47','2','6','');
INSERT INTO exam_question_ist VALUES('48','31','6','');
INSERT INTO exam_question_ist VALUES('49','26','6','');
INSERT INTO exam_question_ist VALUES('50','35','6','');
INSERT INTO exam_question_ist VALUES('51','40','6','');
INSERT INTO exam_question_ist VALUES('86','4','13','');
INSERT INTO exam_question_ist VALUES('87','3','13','');
INSERT INTO exam_question_ist VALUES('88','2','13','');
INSERT INTO exam_question_ist VALUES('89','1','13','');
INSERT INTO exam_question_ist VALUES('90','5','13','');
INSERT INTO exam_question_ist VALUES('91','62','1','');
INSERT INTO exam_question_ist VALUES('92','62','2','');
INSERT INTO exam_question_ist VALUES('93','62','3','');
INSERT INTO exam_question_ist VALUES('94','63','3','');
INSERT INTO exam_question_ist VALUES('95','65','4','');
INSERT INTO exam_question_ist VALUES('96','66','4','');
INSERT INTO exam_question_ist VALUES('99','65','6','');
INSERT INTO exam_question_ist VALUES('100','66','6','');
INSERT INTO exam_question_ist VALUES('101','40','7','');
INSERT INTO exam_question_ist VALUES('102','41','7','');
INSERT INTO exam_question_ist VALUES('103','67','7','');
INSERT INTO exam_question_ist VALUES('104','68','7','');
INSERT INTO exam_question_ist VALUES('105','1','8','');
INSERT INTO exam_question_ist VALUES('106','2','8','');
INSERT INTO exam_question_ist VALUES('107','3','8','');
INSERT INTO exam_question_ist VALUES('108','62','8','');
INSERT INTO exam_question_ist VALUES('109','63','8','');
INSERT INTO exam_question_ist VALUES('110','67','9','');
INSERT INTO exam_question_ist VALUES('111','68','9','');
INSERT INTO exam_question_ist VALUES('112','67','10','');
INSERT INTO exam_question_ist VALUES('113','68','10','');
INSERT INTO exam_question_ist VALUES('114','62','11','');
INSERT INTO exam_question_ist VALUES('115','63','11','');
INSERT INTO exam_question_ist VALUES('116','67','11','');
INSERT INTO exam_question_ist VALUES('117','68','11','');
INSERT INTO exam_question_ist VALUES('118','1','12','');
INSERT INTO exam_question_ist VALUES('119','2','12','');
INSERT INTO exam_question_ist VALUES('120','3','12','');
INSERT INTO exam_question_ist VALUES('121','4','12','');


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
  `attempts` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO examname VALUES('1','2','','','digram exam','1','','','','','repeat','show','100','Equal','50','Open_Book','10:09','13:09','','2023-11-06','2023-11-06 10:09:13.000000','2023-11-09','india','','no','','manual','0');
INSERT INTO examname VALUES('2','2','','','digram exam1','1','','','','','once','show','100','Equal','50','Open_Book','14:43','16:44','','2023-11-06','2023-11-06 14:42:41.000000','2023-11-09','india','','no','','manual','0');
INSERT INTO examname VALUES('3','2','','','digram exam3','2','','','','','once','show','100','Equal','40','Open_Book','15:18','16:19','','2023-11-06','2023-11-06 15:17:47.000000','2023-11-07','india','','no','','manual','0');
INSERT INTO examname VALUES('4','2','','','imageExam','2','','','','','once','show','100','Equal','50','Open_Book','13:06','17:07','','2023-11-08','2023-11-08 13:06:04.000000','2023-11-09','india','','no','','manual','0');
INSERT INTO examname VALUES('5','2','','','imageTrueFalse','2','','','','','once','show','100','Equal','50','Open_Book','13:33','17:34','','2023-11-08','2023-11-08 13:33:04.000000','2023-11-09','india','','no','','manual','0');
INSERT INTO examname VALUES('6','2','','','image Tes2','2','','','','','once','show','100','Equal','50','Open_Book','10:17','12:19','','2023-11-09','2023-11-09 10:18:11.000000','2023-11-11','india','','no','','manual','0');
INSERT INTO examname VALUES('7','2','','','test exam12','4','','','','','once','show','100','Equal','50','Open_Book','18:43','22:43','','2023-11-09','2023-11-09 18:44:12.000000','2023-11-17','india','','no','','manual','0');
INSERT INTO examname VALUES('8','2','','','test both','5','','','','','once','show','100','Equal','20','Open_Book','14:49','18:51','','2023-11-14','2023-11-14 12:50:07.000000','18:51','india','','no','','manual','0');
INSERT INTO examname VALUES('9','2','NULL','NULL','2','2','','','','','once','hide','100','Equal','20','closed','10:00','18:50','','2023-11-14','2023-11-14 16:48:29.000000','18:50','india','','yes','','manual','0');
INSERT INTO examname VALUES('10','2','','','3','2','','','','','repeat','hide','100','Equal','20','closed','10:51','18:52','','2023-11-15','2023-11-15 10:52:16.000000','18:52','india','','yes','','manual','0');
INSERT INTO examname VALUES('11','2','','','test3','4','','','','','once','show','100','Equal','20','Open_Book','14:33','18:33','','2023-11-15','2023-11-15 14:33:58.000000','18:33','india','','no','','manual','0');
INSERT INTO examname VALUES('12','2','','','attempExam','4','','','','','once','show','100','Equal','20','Open_Book','10:19','18:20','','2023-11-22','2023-11-22 10:20:21.000000','2023-11-25','india','','no','','manual','3');


CREATE TABLE `examsubcategory` (
  `id` int(11) NOT NULL,
  `examId` varchar(255) DEFAULT NULL,
  `examSubject` varchar(255) DEFAULT NULL,
  `subjectPercentage` varchar(255) DEFAULT NULL,
  `exam_marks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO examsubcategory VALUES('1','1','3','20','');
INSERT INTO examsubcategory VALUES('2','2','2','10','');
INSERT INTO examsubcategory VALUES('3','3','2','10','10');
INSERT INTO examsubcategory VALUES('4','3','1','0','0');
INSERT INTO examsubcategory VALUES('5','3','1','0','0');
INSERT INTO examsubcategory VALUES('6','3','1','0','0');
INSERT INTO examsubcategory VALUES('7','4','2','10','10');
INSERT INTO examsubcategory VALUES('8','4','1','0','0');
INSERT INTO examsubcategory VALUES('9','4','1','0','0');
INSERT INTO examsubcategory VALUES('10','4','1','0','0');
INSERT INTO examsubcategory VALUES('11','5','2','10','10');
INSERT INTO examsubcategory VALUES('12','6','2','10','10');
INSERT INTO examsubcategory VALUES('13','7','1','20','20');
INSERT INTO examsubcategory VALUES('14','8','1','30','30');
INSERT INTO examsubcategory VALUES('15','9','2','20','20');
INSERT INTO examsubcategory VALUES('16','9','3','20','20');
INSERT INTO examsubcategory VALUES('17','9','1','20','20');
INSERT INTO examsubcategory VALUES('18','10','2','20','20');
INSERT INTO examsubcategory VALUES('19','10','3','20','20');
INSERT INTO examsubcategory VALUES('20','10','1','20','20');
INSERT INTO examsubcategory VALUES('21','11','2','20','20');
INSERT INTO examsubcategory VALUES('22','11','3','20','20');
INSERT INTO examsubcategory VALUES('23','11','1','20','20');
INSERT INTO examsubcategory VALUES('24','5','1','50','50');
INSERT INTO examsubcategory VALUES('25','5','2','20','20');
INSERT INTO examsubcategory VALUES('26','5','3','30','30');
INSERT INTO examsubcategory VALUES('27','6','1','50','30');
INSERT INTO examsubcategory VALUES('28','6','2','50','50');
INSERT INTO examsubcategory VALUES('29','6','3','0','20');
INSERT INTO examsubcategory VALUES('30','7','1','100','100');
INSERT INTO examsubcategory VALUES('31','7','3','0','0');
INSERT INTO examsubcategory VALUES('32','7','2','0','0');
INSERT INTO examsubcategory VALUES('33','8','3','50','50');
INSERT INTO examsubcategory VALUES('34','8','2','50','50');
INSERT INTO examsubcategory VALUES('35','8','4','0','0');
INSERT INTO examsubcategory VALUES('36','9','1','20','20');
INSERT INTO examsubcategory VALUES('37','9','2','30','30');
INSERT INTO examsubcategory VALUES('38','9','3','50','50');
INSERT INTO examsubcategory VALUES('39','10','1','40','40');
INSERT INTO examsubcategory VALUES('40','10','2','40','40');
INSERT INTO examsubcategory VALUES('41','10','3','20','20');
INSERT INTO examsubcategory VALUES('42','11','1','40','40');
INSERT INTO examsubcategory VALUES('43','11','2','50','50');
INSERT INTO examsubcategory VALUES('44','11','3','10','10');
INSERT INTO examsubcategory VALUES('45','12','1','20','20');
INSERT INTO examsubcategory VALUES('46','12','2','30','30');
INSERT INTO examsubcategory VALUES('47','12','6','50','50');
INSERT INTO examsubcategory VALUES('48','5','1','50','50');
INSERT INTO examsubcategory VALUES('49','6','1','25','25');
INSERT INTO examsubcategory VALUES('50','6','2','25','25');
INSERT INTO examsubcategory VALUES('51','6','3','0','0');
INSERT INTO examsubcategory VALUES('52','6','4','0','0');
INSERT INTO examsubcategory VALUES('53','6','5','0','0');
INSERT INTO examsubcategory VALUES('54','6','6','0','0');
INSERT INTO examsubcategory VALUES('55','6','7','0','0');
INSERT INTO examsubcategory VALUES('56','6','8','0','0');
INSERT INTO examsubcategory VALUES('57','6','9','0','0');
INSERT INTO examsubcategory VALUES('58','6','10','50','50');
INSERT INTO examsubcategory VALUES('59','7','1','50','50');
INSERT INTO examsubcategory VALUES('60','7','2','50','50');
INSERT INTO examsubcategory VALUES('61','7','3','0','0');
INSERT INTO examsubcategory VALUES('62','7','4','0','0');
INSERT INTO examsubcategory VALUES('63','7','5','0','0');
INSERT INTO examsubcategory VALUES('64','7','6','0','0');
INSERT INTO examsubcategory VALUES('65','7','7','0','0');
INSERT INTO examsubcategory VALUES('66','7','8','0','0');
INSERT INTO examsubcategory VALUES('67','7','9','0','0');
INSERT INTO examsubcategory VALUES('68','7','10','0','0');
INSERT INTO examsubcategory VALUES('119','13','1','100','100');
INSERT INTO examsubcategory VALUES('120','13','2','0','0');
INSERT INTO examsubcategory VALUES('121','13','3','0','0');
INSERT INTO examsubcategory VALUES('122','13','4','0','0');
INSERT INTO examsubcategory VALUES('123','13','5','0','0');
INSERT INTO examsubcategory VALUES('124','13','6','0','0');
INSERT INTO examsubcategory VALUES('125','13','7','0','0');
INSERT INTO examsubcategory VALUES('126','13','8','0','0');
INSERT INTO examsubcategory VALUES('127','13','9','0','0');
INSERT INTO examsubcategory VALUES('128','13','10','0','0');


CREATE TABLE `examtype` (
  `id` int(11) NOT NULL,
  `examId` varchar(255) DEFAULT NULL,
  `examType` varchar(255) DEFAULT NULL,
  `examTypePercentage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO examtype VALUES('1','1','mcq','20');
INSERT INTO examtype VALUES('2','2','mcq','20');
INSERT INTO examtype VALUES('3','3','trueOrFalse','40');
INSERT INTO examtype VALUES('4','3','mcq','50');
INSERT INTO examtype VALUES('5','3','trueOrFalse','10');
INSERT INTO examtype VALUES('6','4','trueOrFalse','40');
INSERT INTO examtype VALUES('7','4','mcq','50');
INSERT INTO examtype VALUES('8','4','trueOrFalse','10');
INSERT INTO examtype VALUES('9','5','mcq','10');
INSERT INTO examtype VALUES('10','5','mcq','0');
INSERT INTO examtype VALUES('11','5','mcq','0');
INSERT INTO examtype VALUES('12','5','mcq','0');
INSERT INTO examtype VALUES('13','6','mcq','10');
INSERT INTO examtype VALUES('14','6','mcq','0');
INSERT INTO examtype VALUES('15','6','mcq','0');
INSERT INTO examtype VALUES('16','6','mcq','0');
INSERT INTO examtype VALUES('17','7','trueOrFalse','20');
INSERT INTO examtype VALUES('18','8','mcq','30');
INSERT INTO examtype VALUES('19','9','trueOrFalse','20');
INSERT INTO examtype VALUES('20','9','trueOrFalse','20');
INSERT INTO examtype VALUES('21','9','mcq','20');
INSERT INTO examtype VALUES('22','10','trueOrFalse','20');
INSERT INTO examtype VALUES('23','10','trueOrFalse','20');
INSERT INTO examtype VALUES('24','10','mcq','20');
INSERT INTO examtype VALUES('25','11','trueOrFalse','20');
INSERT INTO examtype VALUES('26','11','trueOrFalse','20');
INSERT INTO examtype VALUES('27','11','mcq','20');
INSERT INTO examtype VALUES('28','5','mcq','100');
INSERT INTO examtype VALUES('29','5','trueOrFalse','0');
INSERT INTO examtype VALUES('30','5','digrame','0');
INSERT INTO examtype VALUES('31','6','mcq','100');
INSERT INTO examtype VALUES('32','6','trueOrFalse','0');
INSERT INTO examtype VALUES('33','6','digrame','0');
INSERT INTO examtype VALUES('34','7','mcq','100');
INSERT INTO examtype VALUES('35','7','trueOrFalse','0');
INSERT INTO examtype VALUES('36','7','digrame','0');
INSERT INTO examtype VALUES('37','8','mcq','100');
INSERT INTO examtype VALUES('38','8','trueOrFalse','0');
INSERT INTO examtype VALUES('39','8','digrame','0');
INSERT INTO examtype VALUES('40','9','mcq','100');
INSERT INTO examtype VALUES('41','9','trueOrFalse','0');
INSERT INTO examtype VALUES('42','9','digrame','0');
INSERT INTO examtype VALUES('43','10','mcq','100');
INSERT INTO examtype VALUES('44','10','trueOrFalse','0');
INSERT INTO examtype VALUES('45','10','digrame','0');
INSERT INTO examtype VALUES('46','11','mcq','100');
INSERT INTO examtype VALUES('47','11','trueOrFalse','0');
INSERT INTO examtype VALUES('48','11','digrame','0');
INSERT INTO examtype VALUES('49','12','mcq','100');
INSERT INTO examtype VALUES('50','12','trueOrFalse','0');
INSERT INTO examtype VALUES('51','12','digrame','0');
INSERT INTO examtype VALUES('52','5','mcq','100');
INSERT INTO examtype VALUES('53','6','mcq','25');
INSERT INTO examtype VALUES('54','6','true_false','25');
INSERT INTO examtype VALUES('55','6','digrame','50');
INSERT INTO examtype VALUES('56','7','mcq','50');
INSERT INTO examtype VALUES('57','7','true_false','30');
INSERT INTO examtype VALUES('58','7','digrame','20');
INSERT INTO examtype VALUES('74','13','mcq','100');
INSERT INTO examtype VALUES('75','13','true_false','0');
INSERT INTO examtype VALUES('76','13','digrame','0');


CREATE TABLE `extra_item_subitem` (
  `id` int(255) NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `data_type` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO extra_item_subitem VALUES('1','5','29','4','sim','item','26');
INSERT INTO extra_item_subitem VALUES('2','6','29','4','sim','item','26');
INSERT INTO extra_item_subitem VALUES('3','7','29','4','sim','item','26');
INSERT INTO extra_item_subitem VALUES('4','8','29','4','sim','item','26');
INSERT INTO extra_item_subitem VALUES('5','8','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('6','9','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('7','10','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('8','11','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('9','12','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('10','13','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('11','14','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('12','15','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('13','16','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('14','17','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('15','18','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('16','19','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('17','20','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('18','21','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('19','22','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('20','23','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('21','24','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('22','25','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('23','26','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('24','27','29','8','actual','item','16');
INSERT INTO extra_item_subitem VALUES('25','1','29','8','actual','subitem','16');
INSERT INTO extra_item_subitem VALUES('26','4','29','8','actual','subitem','16');
INSERT INTO extra_item_subitem VALUES('27','7','29','8','actual','subitem','16');
INSERT INTO extra_item_subitem VALUES('28','8','29','8','actual','subitem','16');


CREATE TABLE `extra_item_subitem_cl` (
  `id` int(255) NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `data_type` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `extra_item_subitem_grades` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `extra_item_subitem_grades_cl` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `favouritefiles` (
  `id` int(11) NOT NULL,
  `favouriteColors` varchar(255) DEFAULT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO favouritefiles VALUES('1','#dc3545','20','user','11');
INSERT INTO favouritefiles VALUES('2','#ffc107','30','user','11');
INSERT INTO favouritefiles VALUES('3','#007bff','1','user','11');


CREATE TABLE `favouritepages` (
  `id` int(11) NOT NULL,
  `favouriteColors` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `file_briefcase` (
  `id` int(11) NOT NULL,
  `brief_id` varchar(30) NOT NULL,
  `breif_type` varchar(30) DEFAULT NULL,
  `file_id` varchar(30) DEFAULT NULL,
  `file_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `file_briefcase_folder` (
  `id` int(11) NOT NULL,
  `folder_id` varchar(30) NOT NULL,
  `file_id` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `file_menu_name` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `type_menu` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO file_menu_name VALUES('4','Mega Menu1','megmenu','');
INSERT INTO file_menu_name VALUES('8','Menu','menu','');
INSERT INTO file_menu_name VALUES('9','Menu123','menu','');
INSERT INTO file_menu_name VALUES('10','Menu1180000','menu','');
INSERT INTO file_menu_name VALUES('11','menucheck','menu','#fd1717');
INSERT INTO file_menu_name VALUES('12','megacheck','megmenu','#27e10e');


CREATE TABLE `filepermissions` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO filepermissions VALUES('1','30','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('2','31','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('3','32','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('4','33','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('5','34','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('6','35','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('7','36','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('9','37','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('10','38','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('11','39','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('12','40','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('14','42','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('15','43','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('16','44','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('17','45','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('18','46','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('19','47','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('20','48','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('21','49','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('22','50','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('23','51','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('24','52','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('25','53','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('26','54','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('27','55','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('28','56','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('29','57','12','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('30','58','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('31','59','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('32','60','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('33','61','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('34','62','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('35','63','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('36','64','12','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('37','65','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('38','66','11','All instructor','yellow','readOnly','');
INSERT INTO filepermissions VALUES('39','67','11','All instructor','yellow','readOnly','');
INSERT INTO filepermissions VALUES('41','69','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('42','70','11','Everyone','blue','readOnly','');
INSERT INTO filepermissions VALUES('43','71','11','Everyone','blue','readOnly','');


CREATE TABLE `filepermissionsfm` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `content` longblob DEFAULT NULL,
  `file_Type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `folder_shop_user` (
  `id` int(30) NOT NULL,
  `folder_id` varchar(30) NOT NULL,
  `shelf_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `shop_id` varchar(30) NOT NULL,
  `lib_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO folder_shop_user VALUES('1','2','1','11','2','1');
INSERT INTO folder_shop_user VALUES('2','9','1','11','6','1');


CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `fileName` varchar(30) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO folders VALUES('2','folder00','','');
INSERT INTO folders VALUES('3','folder3','','');
INSERT INTO folders VALUES('4','folder','','');
INSERT INTO folders VALUES('6','folder5','','');
INSERT INTO folders VALUES('7','folder0','','');
INSERT INTO folders VALUES('8','folder2','','');
INSERT INTO folders VALUES('9','folder r','','');
INSERT INTO folders VALUES('10','folder 178','','');
INSERT INTO folders VALUES('11','jdlkjdkl','','');
INSERT INTO folders VALUES('12','phase1','','8');
INSERT INTO folders VALUES('13','Driving','','1');


CREATE TABLE `frame_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `image_height` varchar(255) DEFAULT NULL,
  `image_width` varchar(255) DEFAULT NULL,
  `border_radius` varchar(255) DEFAULT NULL,
  `border` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `phase` varchar(255) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `grade_per` (
  `id` int(30) NOT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO grade_per VALUES('2','U','0');
INSERT INTO grade_per VALUES('3','F','0');
INSERT INTO grade_per VALUES('4','G','0');
INSERT INTO grade_per VALUES('5','V','0');
INSERT INTO grade_per VALUES('6','E','0');
INSERT INTO grade_per VALUES('7','N','0');


CREATE TABLE `grade_per_notifications` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `to_userid` varchar(30) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `permission` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `grade_permission` (
  `id` int(255) NOT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO grade_permission VALUES('1','22','E','1','');


CREATE TABLE `grade_permission_clone` (
  `id` int(255) NOT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `clone_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `gradeaheet_clear_reason` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `gradesheetId` varchar(255) DEFAULT NULL,
  `clearDate` varchar(255) DEFAULT NULL,
  `clearTime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO gradeaheet_clear_reason VALUES('1','11','hello','8','2023-07-31','13:07:16');
INSERT INTO gradeaheet_clear_reason VALUES('2','12','hgdjdgjk','2','2023-08-07','10:32:46');
INSERT INTO gradeaheet_clear_reason VALUES('3','15','khasdiadibaidgy','4','2023-08-11','05:25:48');
INSERT INTO gradeaheet_clear_reason VALUES('4','15','akshdiuwadigqw8yd','4','2023-08-11','05:39:03');
INSERT INTO gradeaheet_clear_reason VALUES('5','12','jHSBuasgbyd iuasbdahydihau iasbnduah','1','2023-08-11','06:46:00');
INSERT INTO gradeaheet_clear_reason VALUES('6','12','kuhsduiqwuidbqwuidbuiqwebd kq ybqeyidb','1','2023-08-11','08:37:46');
INSERT INTO gradeaheet_clear_reason VALUES('7','12','asxkhbisgxyqqhj qwy  hjqw uh quw ','4','2023-08-11','09:32:43');
INSERT INTO gradeaheet_clear_reason VALUES('8','12','kjhiqwuhxuqwuxbqwuibsibqwiiqwnq ','4','2023-08-11','09:34:01');
INSERT INTO gradeaheet_clear_reason VALUES('9','11','dmnfbfmhk','6','2023-08-17','10:57:54');
INSERT INTO gradeaheet_clear_reason VALUES('10','12','htrh','9','2023-08-17','11:56:15');
INSERT INTO gradeaheet_clear_reason VALUES('11','12','ger','16','2023-08-17','11:58:15');
INSERT INTO gradeaheet_clear_reason VALUES('12','12','fcfcerfrcf','16','2023-08-21','08:04:45');
INSERT INTO gradeaheet_clear_reason VALUES('13','12','e5y5','22','2023-08-22','13:42:44');
INSERT INTO gradeaheet_clear_reason VALUES('14','12','dff','23','2023-08-22','14:30:00');
INSERT INTO gradeaheet_clear_reason VALUES('15','12','fnhzn','2','2023-11-21','05:40:24');


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
  `created_at` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO gradesheet VALUES('1','29','1','1','1','actual','12','1','12:18','2023-11-29','12','05','U','10',' ,mkjbk','\r\n                          ','1','1','2023-11-29 12:19:06.000000');


CREATE TABLE `gradsheet_final_hashoff` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `hash_off` varchar(255) DEFAULT NULL,
  `hash_off_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO gradsheet_final_hashoff VALUES('1','18','8','actual','1','0');
INSERT INTO gradsheet_final_hashoff VALUES('2','18','8','actual','2','0');
INSERT INTO gradsheet_final_hashoff VALUES('3','29','8','actual','1','2');
INSERT INTO gradsheet_final_hashoff VALUES('4','29','8','actual','2','5');
INSERT INTO gradsheet_final_hashoff VALUES('5','13','8','actual','1','1');
INSERT INTO gradsheet_final_hashoff VALUES('6','13','8','actual','2','1');
INSERT INTO gradsheet_final_hashoff VALUES('7','27','8','actual','1','0');
INSERT INTO gradsheet_final_hashoff VALUES('8','27','8','actual','2','0');
INSERT INTO gradsheet_final_hashoff VALUES('9','29','4','actual','1','0');
INSERT INTO gradsheet_final_hashoff VALUES('10','29','4','actual','2','0');
INSERT INTO gradsheet_final_hashoff VALUES('11','29','4','actual','3','0');
INSERT INTO gradsheet_final_hashoff VALUES('12','29','4','actual','4','0');
INSERT INTO gradsheet_final_hashoff VALUES('13','29','4','actual','5','0');
INSERT INTO gradsheet_final_hashoff VALUES('14','29','4','actual','6','0');
INSERT INTO gradsheet_final_hashoff VALUES('15','29','4','sim','1','0');
INSERT INTO gradsheet_final_hashoff VALUES('16','29','4','sim','2','0');
INSERT INTO gradsheet_final_hashoff VALUES('17','29','4','sim','3','0');
INSERT INTO gradsheet_final_hashoff VALUES('18','29','4','sim','4','0');


CREATE TABLE `gradsheet_final_hashoff_cl` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `hash_off` varchar(255) DEFAULT NULL,
  `hash_off_value` varchar(255) DEFAULT NULL,
  `cloneid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO gradsheet_final_hashoff_cl VALUES('1','29','4','actual','1','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('2','29','4','actual','2','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('3','29','4','actual','3','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('4','29','4','actual','4','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('5','29','4','actual','5','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('6','29','4','actual','6','0','2');
INSERT INTO gradsheet_final_hashoff_cl VALUES('7','29','8','actual','1','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('8','29','8','actual','2','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('9','29','4','actual','1','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('10','29','4','actual','2','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('11','29','4','actual','3','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('12','29','4','actual','4','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('13','29','4','actual','5','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('14','29','4','actual','6','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('15','29','4','sim','1','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('16','29','4','sim','2','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('17','29','4','sim','3','0','1');
INSERT INTO gradsheet_final_hashoff_cl VALUES('18','29','4','sim','4','0','1');


CREATE TABLE `group_student_scheduling` (
  `id` int(30) NOT NULL,
  `std_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



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
  `loca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO groupchats VALUES('1','11','2','','hii','','','2023-11-02 12:08:50','','','','','');
INSERT INTO groupchats VALUES('2','11','2','','48','file','','2023-11-02 12:16:24','','','','','userfile');
INSERT INTO groupchats VALUES('3','11','2','','49','file','','2023-11-02 12:18:32','','','','','userfile');
INSERT INTO groupchats VALUES('6','11','2','','51','','','2023-11-02 12:25:16','Edited','','','','userfile');
INSERT INTO groupchats VALUES('7','11','2','','52','','','2023-11-02 12:28:42','Edited','','','','userfile');
INSERT INTO groupchats VALUES('8','11','2','','C:\\xampp\\htdocs','','','2023-11-02 12:32:48','','','nice','yes','');
INSERT INTO groupchats VALUES('9','11','2','','C:\\xampp\\htdocs','','','2023-11-02 12:41:09','','','good','yes','');
INSERT INTO groupchats VALUES('10','11','2','','9','','','2023-11-02 12:45:26','Edited','','','','page');
INSERT INTO groupchats VALUES('11','11','2','','group page','','','2023-11-02 12:54:03','','','ohh','yes','');
INSERT INTO groupchats VALUES('12','11','3','','9','','','2023-11-02 13:04:12','','','','','page');
INSERT INTO groupchats VALUES('13','11','2','','group page','','','2023-11-02 13:05:05','','',',,','yes','');
INSERT INTO groupchats VALUES('14','11','3','','52','','','2023-11-02 13:15:42','','','','','');
INSERT INTO groupchats VALUES('15','11','2','','C:xampphtdocs','','','2023-11-02 13:16:22','','','wow','yes','');
INSERT INTO groupchats VALUES('16','11','3','','51','','','2023-11-02 13:16:31','','','','','');
INSERT INTO groupchats VALUES('17','11','2','','Python Probation Task (1).docx','','','2023-11-02 13:16:51','','','good','yes','');
INSERT INTO groupchats VALUES('18','11','3','','49','file','','2023-11-02 13:18:22','','','','','userfile');
INSERT INTO groupchats VALUES('19','11','3','','48','file','','2023-11-02 13:18:46','','','','','userfile');
INSERT INTO groupchats VALUES('20','11','2','','54','file','','2023-11-03 11:42:40','','','','','userfile');
INSERT INTO groupchats VALUES('21','11','4','','10','','','2023-11-07 14:15:56','','','','','page');
INSERT INTO groupchats VALUES('22','12','4','','hii','','','2023-11-07 14:27:41','','','','','');
INSERT INTO groupchats VALUES('23','12','4','','hello','','','2023-11-07 14:28:16','','','','','');
INSERT INTO groupchats VALUES('24','11','4','','63','','','2023-11-07 14:34:56','','','','','userfile');
INSERT INTO groupchats VALUES('25','11','4','','hii','','','2023-11-17 13:17:51','','','','','');


CREATE TABLE `groupdeleteforme` (
  `id` int(11) NOT NULL,
  `msgId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `groupmember` (
  `id` int(11) NOT NULL,
  `groupId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO groupmember VALUES('15','4','12','member','2023-11-03');
INSERT INTO groupmember VALUES('16','4','13','member','2023-11-03');
INSERT INTO groupmember VALUES('17','4','14','member','2023-11-03');
INSERT INTO groupmember VALUES('18','4','11','admin','2023-11-03');


CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `hashoff` (
  `id` int(30) NOT NULL,
  `hashoff` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO hashoff VALUES('1','hashoff 1','','','','');
INSERT INTO hashoff VALUES('2','hashoff 2','','','','');
INSERT INTO hashoff VALUES('3','hashoff 3','','','','');
INSERT INTO hashoff VALUES('4','hashoff 4','','','','');
INSERT INTO hashoff VALUES('5','hash 5','','','','');
INSERT INTO hashoff VALUES('6','hash 6','','','','');


CREATE TABLE `hashoff_gradesheet` (
  `id` int(11) NOT NULL,
  `classId` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `hashCheck` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO hashoff_gradesheet VALUES('1','4','1','1','actual','1');
INSERT INTO hashoff_gradesheet VALUES('2','4','1','1','actual','2');
INSERT INTO hashoff_gradesheet VALUES('3','4','1','1','actual','3');
INSERT INTO hashoff_gradesheet VALUES('4','4','1','1','actual','4');
INSERT INTO hashoff_gradesheet VALUES('5','4','1','1','actual','5');
INSERT INTO hashoff_gradesheet VALUES('6','4','1','1','actual','6');
INSERT INTO hashoff_gradesheet VALUES('7','8','1','1','actual','1');
INSERT INTO hashoff_gradesheet VALUES('8','8','1','1','actual','2');
INSERT INTO hashoff_gradesheet VALUES('9','4','1','1','sim','1');
INSERT INTO hashoff_gradesheet VALUES('10','4','1','1','sim','2');
INSERT INTO hashoff_gradesheet VALUES('11','4','1','1','sim','3');
INSERT INTO hashoff_gradesheet VALUES('12','4','1','1','sim','4');


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
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `holydays` (
  `id` int(11) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `holyDayName` varchar(255) DEFAULT NULL,
  `departMentId` varchar(255) DEFAULT NULL,
  `leaveType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO holydays VALUES('1','2023-09-14','2023-09-06','Diwali','1','planned');
INSERT INTO holydays VALUES('2','2023-09-08','2023-09-07','Dasherra','','unPlanned');


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
  `additional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO homepage VALUES('1','kudos.jpg','2023-07-17','11','1','Driving school','','Hello world','Dubai','8765432190','ayushi260395@gmail.com','asdfghjkl','dfghjkl');
INSERT INTO homepage VALUES('2','','','11','1','department 2','','','','','','','');
INSERT INTO homepage VALUES('3','','','11','1','department 3','','','','','','','');
INSERT INTO homepage VALUES('4','','','11','1','department 4','','','','','','','');
INSERT INTO homepage VALUES('5','','','11','1','department 5','','','','','','','');


CREATE TABLE `horizontal_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `widht` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `image_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) NOT NULL,
  `image_of_image` varchar(255) NOT NULL,
  `image_width` varchar(255) NOT NULL,
  `image_height` varchar(255) NOT NULL,
  `border_radius` varchar(255) NOT NULL,
  `border` varchar(255) NOT NULL,
  `border_color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO image_cert VALUES('1','1','1','100','100','5','9','#000000','0');


CREATE TABLE `item` (
  `id` int(30) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `CTS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO item VALUES('1','1','1','1','1','actual','1');
INSERT INTO item VALUES('2','2','1','1','1','actual','1');
INSERT INTO item VALUES('5','1','1','4','1','actual','');
INSERT INTO item VALUES('6','2','1','4','1','actual','');
INSERT INTO item VALUES('7','3','1','4','1','actual','');
INSERT INTO item VALUES('8','4','1','4','1','actual','');
INSERT INTO item VALUES('9','5','1','4','1','actual','');
INSERT INTO item VALUES('10','6','1','4','1','actual','');
INSERT INTO item VALUES('11','7','1','4','1','actual','');
INSERT INTO item VALUES('12','1','1','8','1','actual','');
INSERT INTO item VALUES('13','2','1','8','1','actual','');
INSERT INTO item VALUES('14','3','1','8','1','actual','');
INSERT INTO item VALUES('15','4','1','8','1','actual','');
INSERT INTO item VALUES('16','5','1','8','1','actual','');
INSERT INTO item VALUES('17','6','1','8','1','actual','');
INSERT INTO item VALUES('18','7','1','8','1','actual','');
INSERT INTO item VALUES('19','1','1','9','1','actual','');
INSERT INTO item VALUES('20','2','1','9','1','actual','');
INSERT INTO item VALUES('21','3','1','9','1','actual','');
INSERT INTO item VALUES('22','4','1','9','1','actual','');
INSERT INTO item VALUES('23','5','1','9','1','actual','');
INSERT INTO item VALUES('24','6','1','9','1','actual','');
INSERT INTO item VALUES('25','7','1','9','1','actual','');
INSERT INTO item VALUES('26','1','1','2','1','actual','');
INSERT INTO item VALUES('27','1','2','3','1','sim','');
INSERT INTO item VALUES('28','2','2','3','1','sim','');
INSERT INTO item VALUES('29','3','2','3','1','sim','');
INSERT INTO item VALUES('30','1','2','2','1','sim','');
INSERT INTO item VALUES('31','2','2','2','1','sim','');
INSERT INTO item VALUES('32','3','2','2','1','sim','');
INSERT INTO item VALUES('33','4','2','2','1','sim','');
INSERT INTO item VALUES('34','1','1','4','1','sim','');
INSERT INTO item VALUES('35','2','1','4','1','sim','');
INSERT INTO item VALUES('36','3','1','4','1','sim','');
INSERT INTO item VALUES('37','4','1','4','1','sim','');


CREATE TABLE `item_clone_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `item_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `cloned_id` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO item_clone_gradesheet VALUES('1','29','1','F','1','2023-11-29');
INSERT INTO item_clone_gradesheet VALUES('2','29','2','U','1','2023-11-29');


CREATE TABLE `item_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `item_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO item_gradesheet VALUES('1','29','1','U','2023-11-29');
INSERT INTO item_gradesheet VALUES('2','29','2','F','2023-11-29');


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
  `CTSstandards` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO itembank VALUES('1','item-1 has very long text ','','','','','','','','');
INSERT INTO itembank VALUES('2','item-3','','','','','','','','');
INSERT INTO itembank VALUES('3','Item -1','','','','','','','','');
INSERT INTO itembank VALUES('4','msarii','','','','','','','','');
INSERT INTO itembank VALUES('5','The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.','','','','','','','','');
INSERT INTO itembank VALUES('6','item-7','','','','','','','','');
INSERT INTO itembank VALUES('7','General knowledge Page','','','','','','','','');
INSERT INTO itembank VALUES('8','archana11','','','','','','','','');
INSERT INTO itembank VALUES('9','msarii11','','','','','','','','');
INSERT INTO itembank VALUES('10','ayushi11','','','','','','','','');
INSERT INTO itembank VALUES('11','item-711','','','','','','','','');
INSERT INTO itembank VALUES('12','item-311','','','','','','','','');
INSERT INTO itembank VALUES('13','item-1111','','','','','','','','');
INSERT INTO itembank VALUES('14','archana78','','','','','','','','');
INSERT INTO itembank VALUES('15','item-378','','','','','','','','');
INSERT INTO itembank VALUES('16','msarii78','','','','','','','','');
INSERT INTO itembank VALUES('17','hello','','','','','','','','');
INSERT INTO itembank VALUES('18','helo1','','','','','','','','');
INSERT INTO itembank VALUES('19','hlo2','','','','','','','','');
INSERT INTO itembank VALUES('20','helo3','','','','','','','','');
INSERT INTO itembank VALUES('21','helo8','','','','','','','','');
INSERT INTO itembank VALUES('22','helo9','','','','','','','','');
INSERT INTO itembank VALUES('23','helo7','','','','','','','','');
INSERT INTO itembank VALUES('24','helo4','','','','','','','','');
INSERT INTO itembank VALUES('25','gelo0','','','','','','','','');
INSERT INTO itembank VALUES('26','shjkdkl','','','','','','','','');
INSERT INTO itembank VALUES('27','dfjklddjfv','','','','','','','','');


CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `library` varchar(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO library VALUES('1','Main','super_admin');
INSERT INTO library VALUES('3','library 2','11');
INSERT INTO library VALUES('4','library 3','11');


CREATE TABLE `logo_cert` (
  `id` int(255) NOT NULL,
  `cert_id` varchar(255) DEFAULT NULL,
  `image_height` varchar(255) DEFAULT NULL,
  `image_width` varchar(255) DEFAULT NULL,
  `border_radius` varchar(255) DEFAULT NULL,
  `border` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



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
  `additional` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO main_department VALUES('1','','','11','Alkarama','','','','','','');


CREATE TABLE `manage_role_course_phase` (
  `id` int(30) NOT NULL,
  `phase_id` varchar(255) DEFAULT NULL,
  `intructor` varchar(255) DEFAULT NULL,
  `b_up_manger` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `phaseDate` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO manage_role_course_phase VALUES('1','1','12','12','1','2023-08-01','1','1');
INSERT INTO manage_role_course_phase VALUES('2','3','12','12','1','2023-08-01','1','1');
INSERT INTO manage_role_course_phase VALUES('3','1','12','12','22','2023-08-08','1','5');
INSERT INTO manage_role_course_phase VALUES('4','3','12','12','22','2023-08-08','1','5');


CREATE TABLE `mark_distribution` (
  `id` int(30) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `categories` varchar(30) DEFAULT NULL,
  `categories_data` varchar(30) DEFAULT NULL,
  `marks` int(30) DEFAULT NULL,
  `total_marks` int(30) DEFAULT NULL,
  `ctp` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `meesages` (
  `id` int(30) NOT NULL,
  `from_id` varchar(30) DEFAULT NULL,
  `to_id` varchar(30) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO meesages VALUES('1','11','11','hello','2023-08-02 15:51:40.000000');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO memo VALUES('1','2023-08-02','11','','Memorandum for record','29','1','','item.csv','csv','1');
INSERT INTO memo VALUES('2','2023-08-08','11','','memo ','29','1','','Gardening Dep.csv','csv','3');
INSERT INTO memo VALUES('3','2023-09-04','11','','hello','29','1','2','','','absent');
INSERT INTO memo VALUES('4','2023-09-06','11','','hello','29','1','7','','','absent');
INSERT INTO memo VALUES('5','2023-10-10','11','','Hello','13','1','7','examform2.php','php','absent');
INSERT INTO memo VALUES('6','2023-10-09','11','','hello','13','1','70','document_test (2).sql','sql','2');
INSERT INTO memo VALUES('7','2023-10-08','11','','hello','16','1','3','','','absent');
INSERT INTO memo VALUES('8','2023-10-10','11','','h','16','1','20','test_updates (2) (1).sql','sql','2');
INSERT INTO memo VALUES('9','2023-11-03','11','','fgfgve','29','1','3','','','absent');


CREATE TABLE `memoabs` (
  `id` int(11) NOT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `absday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO memoabs VALUES('1','29','2');


CREATE TABLE `memocate` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO memocate VALUES('1','memo 1','','2023-08-09 16:07:15');
INSERT INTO memocate VALUES('2','memo 2','','2023-08-09 16:07:15');
INSERT INTO memocate VALUES('3','memo 33','','2023-08-09 16:07:15');


CREATE TABLE `new_warnning` (
  `id` int(11) NOT NULL,
  `notificationId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `classId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO new_warnning VALUES('1','59','29','actual','2');
INSERT INTO new_warnning VALUES('2','68','29','actual','4');
INSERT INTO new_warnning VALUES('3','69','29','actual','4');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO newcourse VALUES('13','1','Driving Beginner','2023-07-07','3','25','12','','','','');
INSERT INTO newcourse VALUES('17','3','Servicing','2023-07-07','3','22','15','','','','');
INSERT INTO newcourse VALUES('19','4','Servicing','2023-07-26','3','21','15','','','','');
INSERT INTO newcourse VALUES('21','1','Driving Beginner','2023-07-11','4','27','15','','','','');
INSERT INTO newcourse VALUES('22','1','Parking School','2023-07-18','5','29','12','','','','');
INSERT INTO newcourse VALUES('23','1','Parking School','2023-07-20','6','30','15','','','','');
INSERT INTO newcourse VALUES('24','1','Parking School','2023-07-13','7','31','15','','','','');
INSERT INTO newcourse VALUES('25','2','Driving Beginner','2023-07-06','4','33','12','','','','');
INSERT INTO newcourse VALUES('26','2','Servicing','2023-07-14','5','34','15','','','','');
INSERT INTO newcourse VALUES('27','2','Parking School','2023-07-07','6','35','15','','','','');
INSERT INTO newcourse VALUES('28','2','Parking School','2023-07-24','7','28','12','','','','');
INSERT INTO newcourse VALUES('29','1','Driving Beginner','2023-07-13','8','32','12','','','','');
INSERT INTO newcourse VALUES('30','1','Parking School','2023-07-18','5','13','15','','','','');
INSERT INTO newcourse VALUES('31','1','Parking School','2023-07-18','5','16','12','','','','');
INSERT INTO newcourse VALUES('32','1','Parking School','2023-07-18','5','14','12','','','','');
INSERT INTO newcourse VALUES('33','1','Parking School','2023-07-18','5','18','12','','','','');
INSERT INTO newcourse VALUES('34','1','Parking School','2023-07-18','5','19','12','','','','');
INSERT INTO newcourse VALUES('35','1','Parking School','2023-07-18','5','20','15','','','','');
INSERT INTO newcourse VALUES('36','1','Parking School','2023-07-18','5','23','15','','','','');
INSERT INTO newcourse VALUES('37','1','Parking School','2023-07-18','5','17','12','','','','');
INSERT INTO newcourse VALUES('38','1','Parking School','2023-07-18','5','24','12','','','','');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `newpagechangelogdata` (
  `id` int(11) NOT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `changeLog` varchar(255) DEFAULT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `pageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `to_userid` varchar(30) DEFAULT NULL,
  `if_admin` varchar(30) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `extra_data` varchar(100) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `permission` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO notifications VALUES('1','12','29','','academic','2','Has Accepted Academic For','','','0','0','2023-11-15 16:47:31.000000');
INSERT INTO notifications VALUES('2','12','13','','academic','2','Has Accepted Academic For','','','0','0','2023-11-15 16:47:31.000000');
INSERT INTO notifications VALUES('3','12','16','','academic','2','Has Accepted Academic For','','','0','0','2023-11-15 16:47:31.000000');
INSERT INTO notifications VALUES('4','12','14','','academic','2','Has Accepted Academic For','','','0','0','2023-11-15 16:47:31.000000');
INSERT INTO notifications VALUES('5','','29','','actual','1','filled your repeated gradsheet for','','','0','0','2023-11-15 17:34:37.000000');
INSERT INTO notifications VALUES('6','29','12','','actual','4','cloned_gradsheet','','','1','1','2023-11-16 09:20:02.000000');
INSERT INTO notifications VALUES('7','29','12','','actual','4','cloned_gradsheet','','','0','2','2023-11-16 10:32:00.000000');
INSERT INTO notifications VALUES('8','12','29','','academic','2','Has Accepted Academic For','','','0','0','2023-11-16 11:05:36.000000');
INSERT INTO notifications VALUES('9','12','13','','academic','2','Has Accepted Academic For','','','0','0','2023-11-16 11:05:36.000000');
INSERT INTO notifications VALUES('10','12','29','','actual','3','filled your gradsheet for','','','0','0','2023-11-17 09:10:29.000000');
INSERT INTO notifications VALUES('11','29','12','','actual','4','is selected to fill gradsheet of','','','1','0','2023-11-17 09:13:53.000000');
INSERT INTO notifications VALUES('12','12','29','','actual','4','filled your gradsheet for','','','0','0','2023-11-17 09:14:10.000000');
INSERT INTO notifications VALUES('13','29','12','','sim','1','is selected to fill gradsheet of','','','1','0','2023-11-17 09:34:17.000000');
INSERT INTO notifications VALUES('14','12','29','','sim','1','filled your gradsheet for','','','0','0','2023-11-17 09:34:35.000000');
INSERT INTO notifications VALUES('15','29','12','','actual','1','is selected to fill gradsheet of','','','1','0','2023-11-21 09:52:44.000000');
INSERT INTO notifications VALUES('16','12','29','','actual','1','filled your gradsheet for','','','0','0','2023-11-21 09:53:12.000000');
INSERT INTO notifications VALUES('17','29','12','','actual','2','is selected to fill gradsheet of','','','1','0','2023-11-21 10:07:01.000000');
INSERT INTO notifications VALUES('18','12','29','','actual','2','filled your gradsheet for','','','0','0','2023-11-21 10:07:22.000000');
INSERT INTO notifications VALUES('19','29','12','','actual','2','You requested a gradesheet for a reset','','','0','0','2023-11-21 10:10:24.000000');
INSERT INTO notifications VALUES('20','12','29','','actual','2','filled your gradsheet for','','','0','0','2023-11-21 10:11:02.000000');
INSERT INTO notifications VALUES('21','29','12','','actual','2','cloned_gradsheet','','','1','1','2023-11-21 10:12:02.000000');
INSERT INTO notifications VALUES('22','','29','','actual','2','filled your repeated gradsheet for','','','0','0','2023-11-21 10:12:19.000000');
INSERT INTO notifications VALUES('23','29','12','','sim','6','is selected to fill gradsheet of','','','1','0','2023-11-21 10:22:22.000000');
INSERT INTO notifications VALUES('24','12','29','','sim','6','filled your gradsheet for','','','0','0','2023-11-21 10:22:44.000000');
INSERT INTO notifications VALUES('25','29','12','','sim','7','is selected to fill gradsheet of','','','1','0','2023-11-21 10:33:20.000000');
INSERT INTO notifications VALUES('26','12','29','','sim','7','filled your gradsheet for','','','0','0','2023-11-21 10:33:38.000000');
INSERT INTO notifications VALUES('27','29','12','','sim','7','cloned_gradsheet','','','1','1','2023-11-21 10:37:06.000000');
INSERT INTO notifications VALUES('28','','29','','sim','7','filled your repeated gradsheet for','','','0','0','2023-11-21 10:37:24.000000');
INSERT INTO notifications VALUES('29','29','12','','actual','3','is selected to fill gradsheet of','','','0','0','2023-11-21 12:56:50.000000');
INSERT INTO notifications VALUES('115','29','12','','actual','2','clone_unlock_request','','','0','1','2023-11-29 12:14:00.000000');
INSERT INTO notifications VALUES('116','','29','','actual','2','filled your repeated gradsheet for','','','0','0','2023-11-29 12:14:29.000000');
INSERT INTO notifications VALUES('117','12','29','','actual','1','filled your gradsheet for','','','0','0','2023-11-29 12:19:49.000000');
INSERT INTO notifications VALUES('118','29','12','','actual','1','cloned_gradsheet','','','1','1','2023-11-29 12:20:51.000000');
INSERT INTO notifications VALUES('119','','29','','actual','1','filled your repeated gradsheet for','','','0','0','2023-11-29 12:21:25.000000');


CREATE TABLE `orgchart_data` (
  `id` int(11) NOT NULL,
  `departmentName` varchar(255) DEFAULT NULL,
  `parentId` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO orgchart_data VALUES('1','2','0','department');
INSERT INTO orgchart_data VALUES('2','14','1','user');
INSERT INTO orgchart_data VALUES('3','13','2','user');
INSERT INTO orgchart_data VALUES('4','3','1','department');


CREATE TABLE `originalcertificate` (
  `id` int(11) NOT NULL,
  `certificateId` varchar(255) DEFAULT NULL,
  `certificateHtml` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `pagepermissions` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pagepermissions VALUES('1','1','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('2','13','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('3','15','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('4','6','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('5','7','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('6','8','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('7','9','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('8','10','11','Everyone','blue','readOnly');
INSERT INTO pagepermissions VALUES('9','11','11','Everyone','blue','readOnly');


CREATE TABLE `pagepermissionsfm` (
  `id` int(11) NOT NULL,
  `pageId` varchar(255) DEFAULT NULL,
  `permissionId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `per_check_sub_checklist` (
  `id` int(11) NOT NULL,
  `checkListId` varchar(255) DEFAULT NULL,
  `subCheckListId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO per_check_sub_checklist VALUES('6','1','3','11');
INSERT INTO per_check_sub_checklist VALUES('7','1','4','11');
INSERT INTO per_check_sub_checklist VALUES('8','1','8','11');
INSERT INTO per_check_sub_checklist VALUES('9','1','7','11');
INSERT INTO per_check_sub_checklist VALUES('11','5','6','14');
INSERT INTO per_check_sub_checklist VALUES('12','6','9','14');
INSERT INTO per_check_sub_checklist VALUES('13','6','11','14');
INSERT INTO per_check_sub_checklist VALUES('14','6','10','14');
INSERT INTO per_check_sub_checklist VALUES('15','4','12','12');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO per_checklist VALUES('1','11','checklist per 13','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello wolrd','2023-09-07','Category 33','#e21818');
INSERT INTO per_checklist VALUES('3','11','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-09-06','Category 33','red');
INSERT INTO per_checklist VALUES('4','12','checklist inst','TOS Academy offers a diverse array of online and offline courses','Complted','low','helo','2023-09-12','Category 33','orange');
INSERT INTO per_checklist VALUES('5','14','Personal my','','','','','2023-10-06 09:25:31','','#1e1bc5');
INSERT INTO per_checklist VALUES('6','14','Profession','','','','','2023-10-06 09:25:31','','#e60f0f');
INSERT INTO per_checklist VALUES('7','14','White','','','','','2023-10-06 09:25:31','','#2fec09');
INSERT INTO per_checklist VALUES('8','14','Blue','','','','','2023-10-06 09:25:31','','#f109de');
INSERT INTO per_checklist VALUES('9','','today event','','','','','2023-10-11 00:00:00','','');
INSERT INTO per_checklist VALUES('10','11','birthday','','','','','2023-10-11 00:00:00','','');
INSERT INTO per_checklist VALUES('11','','my birthday','','','','','2023-10-05 00:00:00','','');
INSERT INTO per_checklist VALUES('12','','Msarii bday','','','','','2023-10-06 00:00:00','','');
INSERT INTO per_checklist VALUES('16','11','check color','','','','','2023-10-05 00:00:00','','#e41111');
INSERT INTO per_checklist VALUES('36','11','chat page','','','low','','2023-11-09 13:12:10','','#f42525');
INSERT INTO per_checklist VALUES('37','11','chat page','','','medium','','2023-11-14 16:40:33','','#d31212');
INSERT INTO per_checklist VALUES('38','11','hii','','','medium','','2023-11-16 16:49:51','','#d01b1b');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO per_subchecklist VALUES('1','11','per sub 1 ','1','Hello world','Complted','low','Category 33','hello msarii','');
INSERT INTO per_subchecklist VALUES('3','11','per sub 4','1','','','','','','2023-09-06 10:29:23');
INSERT INTO per_subchecklist VALUES('4','11','per sub 5','1','','','','','','2023-09-06 10:29:23');
INSERT INTO per_subchecklist VALUES('5','11','sub test','5','','','','','','2023-09-11 11:29:00');
INSERT INTO per_subchecklist VALUES('6','11','sub test 1','5','','','','','','2023-09-11 11:29:00');
INSERT INTO per_subchecklist VALUES('7','11','per sub 2','1','','','','','','2023-10-03 14:31:29');
INSERT INTO per_subchecklist VALUES('8','11','per sub 6','1','','','','','','2023-10-03 16:32:19');
INSERT INTO per_subchecklist VALUES('9','14','Hello','6','','','','','','2023-10-06 09:29:45');
INSERT INTO per_subchecklist VALUES('10','14','World','6','','','','','','2023-10-06 09:29:45');
INSERT INTO per_subchecklist VALUES('11','14','Mine','6','','','','','','2023-10-06 09:29:45');
INSERT INTO per_subchecklist VALUES('12','12','subchecklist 11','4','','','','','','2023-10-09 15:39:56');
INSERT INTO per_subchecklist VALUES('16','11','per sub8','1','','','','','','');
INSERT INTO per_subchecklist VALUES('17','11','per sub7','1','','','','','','');
INSERT INTO per_subchecklist VALUES('18','11','per sub9','1','','','','','','');
INSERT INTO per_subchecklist VALUES('19','11','per sub10','1','','','','','','');


CREATE TABLE `per_subchecklistfile` (
  `id` int(11) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `checkId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `percentage` (
  `id` int(11) NOT NULL,
  `percentagetype` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO percentage VALUES('1','U-Unsatisfied','40','#ed4c78','');
INSERT INTO percentage VALUES('2','F-Fair','60','#f5ca99','This got fair');
INSERT INTO percentage VALUES('3','G-Good','80','#71869d','');
INSERT INTO percentage VALUES('4','V- Very Good','90','#00c9a7','');
INSERT INTO percentage VALUES('5','E- Excellent','100','#377dff','');
INSERT INTO percentage VALUES('6','N- Not Graded','0','Black','');


CREATE TABLE `persontitle` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO persontitle VALUES('2','12','Employee of the Week','You done a very great job this year.','2023-07-19');
INSERT INTO persontitle VALUES('3','14','Student of the year','You score really great in this year so we r giving you this award.','2023-07-19');
INSERT INTO persontitle VALUES('5','25','Student of the month','Great work on this month','2023-07-19');
INSERT INTO persontitle VALUES('6','18','employee of the month','Great job','2023-07-19');
INSERT INTO persontitle VALUES('7','11','Student of the year','hjhdksfjsklfjksfj','2023-08-08');


CREATE TABLE `phase` (
  `id` int(11) NOT NULL,
  `phasename` varchar(255) DEFAULT NULL,
  `objective` varchar(5000) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  `phaseDuration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO phase VALUES('1','Driving','','1','red','');
INSERT INTO phase VALUES('2','Driving','','2','green','');
INSERT INTO phase VALUES('3','Parking','','1','blue','');
INSERT INTO phase VALUES('4','phase','','1','','');
INSERT INTO phase VALUES('6','test phase','','1','','');
INSERT INTO phase VALUES('7','academic phase','','1','','');
INSERT INTO phase VALUES('8','phase1','','6','','');


CREATE TABLE `phasefilepermission` (
  `id` int(11) NOT NULL,
  `fileId` varchar(255) DEFAULT NULL,
  `phaseId` varchar(255) DEFAULT NULL,
  `permissionType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO phasefilepermission VALUES('2','70','1','readAndWrite');
INSERT INTO phasefilepermission VALUES('3','71','1','readAndWrite');
INSERT INTO phasefilepermission VALUES('4','30','1','readAndWrite');
INSERT INTO phasefilepermission VALUES('5','31','1','readAndWrite');
INSERT INTO phasefilepermission VALUES('8','35','1','readAndWrite');
INSERT INTO phasefilepermission VALUES('9','36','1','readAndWrite');


CREATE TABLE `popup` (
  `id` int(100) NOT NULL,
  `item` text DEFAULT NULL,
  `subitem` text DEFAULT NULL,
  `radio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `prereuisite_data` (
  `id` int(11) NOT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL,
  `class_table` varchar(255) DEFAULT NULL,
  `prereui_id` varchar(30) DEFAULT NULL,
  `prereui_table` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO prereuisite_data VALUES('1','2','','academic','1','academic');
INSERT INTO prereuisite_data VALUES('2','3','','academic','2','academic');
INSERT INTO prereuisite_data VALUES('3','4','','sim','3','academic');
INSERT INTO prereuisite_data VALUES('4','4','','actual','3','academic');
INSERT INTO prereuisite_data VALUES('5','5','','sim','4','actual');
INSERT INTO prereuisite_data VALUES('6','5','','sim','4','sim');
INSERT INTO prereuisite_data VALUES('7','6','','sim','5','sim');
INSERT INTO prereuisite_data VALUES('8','7','','sim','6','sim');
INSERT INTO prereuisite_data VALUES('9','1','','test','7','sim');


CREATE TABLE `prereuisites` (
  `id` int(11) NOT NULL,
  `prereuisite` varchar(255) DEFAULT NULL,
  `class_name` varchar(30) DEFAULT NULL,
  `days` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `qual_data` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `stud_id` varchar(30) DEFAULT NULL,
  `ctp_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO qual_data VALUES('1','1','','','1');
INSERT INTO qual_data VALUES('2','2','','','1');
INSERT INTO qual_data VALUES('3','3','','','1');
INSERT INTO qual_data VALUES('4','4','','','1');
INSERT INTO qual_data VALUES('5','5','','','1');
INSERT INTO qual_data VALUES('6','6','','','1');
INSERT INTO qual_data VALUES('7','7','','','1');
INSERT INTO qual_data VALUES('8','8','','','1');
INSERT INTO qual_data VALUES('9','9','','','1');
INSERT INTO qual_data VALUES('10','10','','','1');
INSERT INTO qual_data VALUES('11','11','','','1');
INSERT INTO qual_data VALUES('12','12','','','1');
INSERT INTO qual_data VALUES('13','13','','','1');
INSERT INTO qual_data VALUES('14','14','','','1');
INSERT INTO qual_data VALUES('15','15','','','1');
INSERT INTO qual_data VALUES('16','16','','','1');
INSERT INTO qual_data VALUES('17','17','','','1');
INSERT INTO qual_data VALUES('18','18','','','1');
INSERT INTO qual_data VALUES('19','19','','','1');
INSERT INTO qual_data VALUES('20','20','','','1');
INSERT INTO qual_data VALUES('21','21','','','1');
INSERT INTO qual_data VALUES('22','22','','','1');
INSERT INTO qual_data VALUES('23','23','','','1');
INSERT INTO qual_data VALUES('24','24','','','1');
INSERT INTO qual_data VALUES('25','25','','','1');
INSERT INTO qual_data VALUES('26','26','','','1');
INSERT INTO qual_data VALUES('27','27','','','1');
INSERT INTO qual_data VALUES('28','','1','','1');
INSERT INTO qual_data VALUES('29','','2','','1');
INSERT INTO qual_data VALUES('30','','3','','1');
INSERT INTO qual_data VALUES('31','','4','','1');
INSERT INTO qual_data VALUES('32','','5','','1');
INSERT INTO qual_data VALUES('33','','6','','1');
INSERT INTO qual_data VALUES('34','','7','','1');
INSERT INTO qual_data VALUES('35','','8','','1');


CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quiz` varchar(30) DEFAULT NULL,
  `phase` varchar(30) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `percentage` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO quiz VALUES('1','Subject1','','1','100','2023-09-04');
INSERT INTO quiz VALUES('2','Subject2','','1','100','2023-09-04');
INSERT INTO quiz VALUES('3','Subject3','','1','100','2023-09-04');
INSERT INTO quiz VALUES('4','Subject4','','1','100','2023-09-04');
INSERT INTO quiz VALUES('5','Subject5','','1','100','2023-09-04');
INSERT INTO quiz VALUES('6','Subject6','','1','100','2023-09-04');
INSERT INTO quiz VALUES('7','Subject7','','1','100','2023-09-04');
INSERT INTO quiz VALUES('8','Subject8','','1','100','2023-09-04');


CREATE TABLE `quiz_cloned_data` (
  `id` int(30) NOT NULL,
  `quiz_id` int(30) DEFAULT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` int(30) DEFAULT NULL,
  `clone_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO quiz_cloned_data VALUES('1','1','29','1','1','86','12');


CREATE TABLE `quiz_marks` (
  `id` int(11) NOT NULL,
  `quiz_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `student_id` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO quiz_marks VALUES('2','1','0','29','1','2023-11-21','1','12');


CREATE TABLE `rolepermission` (
  `id` int(11) NOT NULL,
  `rolePermission` varchar(255) DEFAULT NULL,
  `cardName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO rolepermission VALUES('1','super admin','');


CREATE TABLE `roles` (
  `id` int(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `permission` varchar(50000) NOT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO roles VALUES('2','student','a:56:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"0\";s:22:\"select_student_details\";s:1:\"1\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"0\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"0\";s:18:\"askreset_gradsheet\";s:1:\"0\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"0\";s:13:\"give_Acedemic\";s:1:\"0\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"1\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"0\";s:20:\"view_marks_evalution\";s:1:\"1\";s:15:\"give_marks_test\";s:1:\"0\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"0\";s:19:\"add_attachment_test\";s:1:\"0\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"0\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;}','');
INSERT INTO roles VALUES('6','instructor','a:56:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"1\";s:18:\"askreset_gradsheet\";s:1:\"1\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"1\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"1\";s:20:\"view_marks_evalution\";s:1:\"0\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"1\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;}','');
INSERT INTO roles VALUES('7','super admin','a:56:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"1\";s:15:\"askclone_delete\";s:1:\"0\";s:14:\"fill_gradsheet\";s:1:\"0\";s:15:\"reset_gradsheet\";s:1:\"1\";s:16:\"Unlock_gradsheet\";s:1:\"1\";s:19:\"askUnlock_gradsheet\";s:1:\"0\";s:18:\"askreset_gradsheet\";s:1:\"0\";s:18:\"give_per_gradsheet\";s:1:\"1\";s:17:\"ask_per_gradsheet\";s:1:\"0\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"1\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"1\";s:20:\"give_marks_evalution\";s:1:\"0\";s:20:\"view_marks_evalution\";s:1:\"1\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"1\";s:14:\"askunlock_test\";s:1:\"0\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"1\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"1\";s:9:\"Edit_memo\";s:1:\"1\";s:11:\"Delete_memo\";s:1:\"1\";s:13:\"Delete_course\";s:1:\"1\";s:12:\"Edit_landing\";s:1:\"1\";s:14:\"Delete_landing\";s:1:\"1\";s:6:\"alerts\";N;}','');


CREATE TABLE `self` (
  `id` int(11) NOT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO self VALUES('1','75','29','1');


CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `shelf` varchar(30) NOT NULL,
  `library_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO shelf VALUES('1','shelf 1','1');


CREATE TABLE `shelf_shop` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `shelf_id` varchar(30) NOT NULL,
  `shop_id` varchar(30) NOT NULL,
  `lib_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO shelf_shop VALUES('1','11','1','2','1');
INSERT INTO shelf_shop VALUES('2','11','1','6','1');


CREATE TABLE `shop_folder` (
  `id` int(30) NOT NULL,
  `shop_id` varchar(400) DEFAULT NULL,
  `folder_id` varchar(255) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shops` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `ctpId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO shops VALUES('2','shop1','hello1.png','');
INSERT INTO shops VALUES('3','shop3','hello.jpg','');
INSERT INTO shops VALUES('4','shop8','hello1.png','');
INSERT INTO shops VALUES('5','shop10','File management v3.png','');
INSERT INTO shops VALUES('6','Shop test','hello.jpg','');
INSERT INTO shops VALUES('7','test shop','','6');
INSERT INTO shops VALUES('8','Driving School Advanced','','1');


CREATE TABLE `sidebar_ctp` (
  `id` int(30) NOT NULL,
  `ctp_id` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sidebar_ctp VALUES('1','1');
INSERT INTO sidebar_ctp VALUES('2','2');
INSERT INTO sidebar_ctp VALUES('3','3');
INSERT INTO sidebar_ctp VALUES('4','4');
INSERT INTO sidebar_ctp VALUES('5','5');
INSERT INTO sidebar_ctp VALUES('6','6');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sim VALUES('1','Front Sim','SDR-2','','100','1','2','2023-07-17','','','');
INSERT INTO sim VALUES('2','Front drive','SDR-1','','100','1','2','2023-07-17','','','');
INSERT INTO sim VALUES('3','Front Sim','SDR-6','','100','1','2','2023-07-17','','','');
INSERT INTO sim VALUES('4','Front Drive','SDR-1','','100','1','1','2023-07-21','4','','');
INSERT INTO sim VALUES('5','Parking ','SDR-2','','100','1','1','2023-07-21','6','','');
INSERT INTO sim VALUES('6','jhgdjhf','SDR-3','','100','1','1','2023-07-21','','','');
INSERT INTO sim VALUES('7','Front Sim','SDR-4','','100','1','1','2023-07-21','','','');
INSERT INTO sim VALUES('8','Front drive','SDR-62','','100','3','1','2023-08-02','','','');
INSERT INTO sim VALUES('9','ghj','SDR-14','','100','3','1','2023-08-02','','','');
INSERT INTO sim VALUES('10','Front drive','SDR-61','','100','3','1','2023-08-02','','','');
INSERT INTO sim VALUES('11','Front drive','SDR-6225','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('12','ghj','SDR-145','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('13','Front drive','SDR-615','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('14','Front Sim','SDR-42','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('15','Front Sim','door','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('16','Front Sim','SDR-60','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('17','ghj','SDR-19','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('18','Parking ','SDR-134','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('19','Front drive','   s  s s','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('20','Front Sim','park','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('21','Front Sim','back','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('22','Front drive','SDR-15','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('23','jhgdjhf','SDR-191','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('24','Parking ','SDR-623','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('25','Front drive','back46','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('26','Parking ','SDR-1p2i','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('27','Front Sim','whio','','100','1','1','2023-08-09','','','');
INSERT INTO sim VALUES('28','Front drive','jeiekwl','','100','1','1','2023-08-09','','','');


CREATE TABLE `sim_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sim_phase VALUES('1','1','1');
INSERT INTO sim_phase VALUES('2','3','1');


CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `ctp` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `explanation` varchar(255) DEFAULT NULL,
  `progression` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO status VALUES('1','Code','1','Array','Array','Array');
INSERT INTO status VALUES('2','Code1','','Description1','Explanantion1','Progression1');


CREATE TABLE `studentexam` (
  `id` int(255) NOT NULL,
  `examId` varchar(255) NOT NULL,
  `examSubject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sub_item VALUES('1','subitem-1','','','','','','','','');
INSERT INTO sub_item VALUES('2','subitem-2','','','','','','','','');
INSERT INTO sub_item VALUES('3','subitem-3','','','','','','','','');
INSERT INTO sub_item VALUES('4','subitem-4','','','','','','','','');
INSERT INTO sub_item VALUES('5','subitem-5','','','','','','','','');
INSERT INTO sub_item VALUES('6','subitem-6','','','','','','','','');
INSERT INTO sub_item VALUES('7','subitem-7','','','','','','','','');
INSERT INTO sub_item VALUES('8','subitem-8','','','','','','','','');


CREATE TABLE `subchecklistfiles` (
  `id` int(11) NOT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `checkId` varchar(255) DEFAULT NULL,
  `subCheckId` varchar(255) DEFAULT NULL,
  `ctpId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO subchecklistfiles VALUES('1','Django Task (1).docx','','docx','4','1','1');
INSERT INTO subchecklistfiles VALUES('2','Python Probation Task.docx','','docx','4','1','1');
INSERT INTO subchecklistfiles VALUES('3','checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');
INSERT INTO subchecklistfiles VALUES('4','checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');
INSERT INTO subchecklistfiles VALUES('5','checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');
INSERT INTO subchecklistfiles VALUES('8','checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');
INSERT INTO subchecklistfiles VALUES('9','checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');


CREATE TABLE `subcheclist` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `main_checklist_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO subcheclist VALUES('1','subchecklist1','4','','','','','');
INSERT INTO subcheclist VALUES('2','subchecklist2','4','','','','','');
INSERT INTO subcheclist VALUES('3','checklist 3','4','','','','','');
INSERT INTO subcheclist VALUES('4','checklist4','4','','','','','');
INSERT INTO subcheclist VALUES('5','Checklist 1','5','','','','','');
INSERT INTO subcheclist VALUES('6','subchecklist 77','5','','','','','');
INSERT INTO subcheclist VALUES('7','subchecklist 88','5','','','','','');
INSERT INTO subcheclist VALUES('8','subchecklist 0','5','','','','','');
INSERT INTO subcheclist VALUES('9','subchecklist 10','5','','','','','');


CREATE TABLE `subitem` (
  `id` int(30) NOT NULL,
  `item` varchar(30) DEFAULT NULL,
  `subitem` varchar(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `class_id` varchar(30) DEFAULT NULL,
  `phase_id` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `CTS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO subitem VALUES('1','1','2','1','9','1','actual','');
INSERT INTO subitem VALUES('2','1','3','1','9','1','actual','');
INSERT INTO subitem VALUES('3','1','2','1','8','1','actual','');
INSERT INTO subitem VALUES('4','1','3','1','8','1','actual','');
INSERT INTO subitem VALUES('5','2','5','1','8','1','actual','');
INSERT INTO subitem VALUES('6','2','6','1','8','1','actual','');


CREATE TABLE `subitem_cloned_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `subitem_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `cloned_id` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `subitem_gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `subitem_id` varchar(30) DEFAULT NULL,
  `grade` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `table_golas` (
  `id` int(11) NOT NULL,
  `goalTable` varchar(255) DEFAULT NULL,
  `goalName` varchar(255) DEFAULT NULL,
  `goalClassId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `temp_cat` (
  `id` int(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO temp_cat VALUES('1','2');
INSERT INTO temp_cat VALUES('2','5');


CREATE TABLE `tempbrief` (
  `id` int(11) NOT NULL,
  `briefId` varchar(255) DEFAULT NULL,
  `folderId` varchar(255) DEFAULT NULL,
  `shopId` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test VALUES('1','test','T01','','100','1','1','2023-07-17','');
INSERT INTO test VALUES('2','Parking','T02','','100','1','1','2023-07-17','');
INSERT INTO test VALUES('3','Parking','TOS-16','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('4','test','TOS-1','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('5','test5','TOS-2','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('6','test5','TOS-3','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('7','Parking','TOS-4','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('8','test','TOS-5','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('9','Parking','TOS-6','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('10','test','TOS-7','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('11','Parking','TOS-8','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('12','test','TOS-9','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('13','Parking','TOS-10','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('14','test5','TOS-11','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('15','Parking','TOS-12','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('16','test','TOS-13','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('17','Parking','TOS-14','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('18','test','TOS-15','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('19','Parking','TOS-17','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('20','test','TOS-18','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('21','Parking','TOS-19','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('22','Parking','TOS-20','','100','1','1','2023-08-09','');
INSERT INTO test VALUES('23','Test on Introduction to Medicinal Plants and Soil Types','T03','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('24','Parking','T04','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('25','Test on Introduction to Medicinal Plants and Soil Types','T05','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('26','Planting Techniques','T06','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('27','test','T07','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('28','Test on Watering Techniques and Fertilization Methods','T08','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('29','test5','T09','','100','1','1','2023-08-31','');
INSERT INTO test VALUES('30','Parking','T010','','100','1','1','2023-08-31','');


CREATE TABLE `test_cloned_data` (
  `id` int(11) NOT NULL,
  `test_id` int(30) NOT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` int(30) DEFAULT NULL,
  `clone_id` varchar(30) NOT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test_cloned_data VALUES('1','2','29','1','1','86','12');


CREATE TABLE `test_course` (
  `id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test_course VALUES('1','HTML New','Markup language hello','0000-00-00');
INSERT INTO test_course VALUES('2','CSS','cascading stylesheet','0000-00-00');
INSERT INTO test_course VALUES('3','Bootstrap','Use for responsive website','0000-00-00');
INSERT INTO test_course VALUES('4','PHP','High speed language','0000-00-00');
INSERT INTO test_course VALUES('5','MYSQL','Database to store data','0000-00-00');
INSERT INTO test_course VALUES('6','Javascript','scripting language','0000-00-00');
INSERT INTO test_course VALUES('7','Jquery','scripting language 2','0000-00-00');
INSERT INTO test_course VALUES('8','Ajax','scripting language 3','0000-00-00');
INSERT INTO test_course VALUES('9','driving','bdjkshfkjsrhks','2023-10-12');
INSERT INTO test_course VALUES('10','Nature diagram','Nature related photos here','2023-10-12');


CREATE TABLE `test_data` (
  `id` int(30) NOT NULL,
  `test_id` int(30) DEFAULT NULL,
  `student_id` int(30) DEFAULT NULL,
  `course_id` varchar(30) DEFAULT NULL,
  `marks` varchar(30) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test_data VALUES('1','1','29','1','86','2023-11-21 10:42:20.000000','1','12');
INSERT INTO test_data VALUES('2','2','29','1','0','2023-11-21 11:29:49.000000','1','12');


CREATE TABLE `test_phase` (
  `id` int(30) NOT NULL,
  `phase` varchar(30) NOT NULL,
  `ctp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test_phase VALUES('1','1','1');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO test_updates VALUES('1','14','9','1','2023-11-15 10:56:38.000000','0','','8','','','');
INSERT INTO test_updates VALUES('2','14','11','1','2023-11-15 14:34:05.000000','1','2023-11-15 14:34:58.000000','8','failed','0','0');
INSERT INTO test_updates VALUES('3','16','12','1','2023-11-22 10:22:24.000000','0','','0','','','');


CREATE TABLE `testcatfil` (
  `id` int(11) NOT NULL,
  `courseId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `type_category_data` (
  `id` int(30) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `category_phase` varchar(30) DEFAULT NULL,
  `category_value` varchar(30) DEFAULT NULL,
  `percent` decimal(11,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO type_category_data VALUES('10','2','sim','0','6','100.00000');
INSERT INTO type_category_data VALUES('12','3','test','0','all','100.00000');
INSERT INTO type_category_data VALUES('13','4','discipline','0','0','50.00000');
INSERT INTO type_category_data VALUES('14','5','self','0','0','50.00000');
INSERT INTO type_category_data VALUES('15','6','quiz','0','0','50.00000');
INSERT INTO type_category_data VALUES('16','1','actual','0','2','50.00000');


CREATE TABLE `type_data` (
  `id` int(30) NOT NULL,
  `type_name` varchar(30) DEFAULT NULL,
  `marks` decimal(11,2) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO type_data VALUES('1','actual','40.00','1');
INSERT INTO type_data VALUES('2','sim','20.00','1');
INSERT INTO type_data VALUES('3','test1','7.50','1');
INSERT INTO type_data VALUES('4','discipline','5.00','1');
INSERT INTO type_data VALUES('5','self','5.00','1');
INSERT INTO type_data VALUES('6','quiz','5.00','1');


CREATE TABLE `typegradefilter` (
  `id` int(11) NOT NULL,
  `ctpId` varchar(255) DEFAULT NULL,
  `gradeValue` varchar(255) DEFAULT NULL,
  `filterStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO typegradefilter VALUES('7','1','80','Active');


CREATE TABLE `updatehide` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO updatehide VALUES('0','16');
INSERT INTO updatehide VALUES('2','14');
INSERT INTO updatehide VALUES('3','12');
INSERT INTO updatehide VALUES('4','11');


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
  `className` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_briefcase VALUES('1','brief 1','11','2','2','','super admin','red','','');
INSERT INTO user_briefcase VALUES('2','brief 1','11','0','2','','super admin','red','','');
INSERT INTO user_briefcase VALUES('3','brief 1','11','9','6','','super admin','red','','');
INSERT INTO user_briefcase VALUES('4','Ad','11','2','2','','super admin','red','','');
INSERT INTO user_briefcase VALUES('5','brief 3','11','2','2','','super admin','red','','');
INSERT INTO user_briefcase VALUES('6','Briefcase 1aaa','11','0','0','','super admin','red','','');
INSERT INTO user_briefcase VALUES('7','brief testaaaa','11','0','0','','super admin','red','','');
INSERT INTO user_briefcase VALUES('8','brief 6aaaa','11','2','2','','super admin','red','','');
INSERT INTO user_briefcase VALUES('9','brief test11','11','0','0','','super admin','red','','');
INSERT INTO user_briefcase VALUES('10','11111brie','11','0','0','','super admin','red','','');
INSERT INTO user_briefcase VALUES('11','newFolClass','11','12','7','','super admin','red','30','');
INSERT INTO user_briefcase VALUES('12','newFolClass','11','12','7','','super admin','red','31','');
INSERT INTO user_briefcase VALUES('13','Front Drive','11','13','8','','super admin','red','1','actual');
INSERT INTO user_briefcase VALUES('14','Front Drive','11','13','8','','super admin','red','4','sim');


CREATE TABLE `user_event` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_event VALUES('1','11','Graduation Ceremony','offer.png','png','2023-07-20');
INSERT INTO user_event VALUES('2','11','Graduation Ceremony','sced.png','png','2023-07-20');
INSERT INTO user_event VALUES('3','11','Graduation Ceremony','time.jpg','jpg','2023-07-20');
INSERT INTO user_event VALUES('4','11','Graduation Ceremony','Asset 3.png','png','2023-07-20');
INSERT INTO user_event VALUES('5','11','Graduation Ceremony','BF42337D.png','png','2023-07-20');
INSERT INTO user_event VALUES('6','11','Graduation Ceremony','Flower_11.jpg','jpg','2023-07-20');
INSERT INTO user_event VALUES('7','11','MCA Ceremony','MicrosoftTeams-image (48).png','png','2023-08-02');
INSERT INTO user_event VALUES('8','11','MCA Ceremony','GS.png','png','2023-08-02');
INSERT INTO user_event VALUES('9','11','MCA Ceremony','MicrosoftTeams-image (43).png','png','2023-08-02');
INSERT INTO user_event VALUES('10','11','MCA Ceremony','MicrosoftTeams-image (41).png','png','2023-08-02');
INSERT INTO user_event VALUES('11','11','MCA Ceremony','MicrosoftTeams-image (31).png','png','2023-08-02');
INSERT INTO user_event VALUES('12','11','Msarii Unite','MicrosoftTeams-image (11).png','png','2023-08-02');
INSERT INTO user_event VALUES('13','11','Msarii Unite','agesearch v3_1.png','png','2023-08-02');
INSERT INTO user_event VALUES('14','11','Msarii Unite','MicrosoftTeams-image (6).png','png','2023-08-02');
INSERT INTO user_event VALUES('15','11','Msarii Unite','time.jpg','jpg','2023-08-02');
INSERT INTO user_event VALUES('16','11','Msarii Unite','kudos.jpg','jpg','2023-08-02');
INSERT INTO user_event VALUES('17','11','Gathering Function','MicrosoftTeams-image (11).png','png','2023-08-02');
INSERT INTO user_event VALUES('18','11','Gathering Function','MicrosoftTeams-image (28).png','png','2023-08-02');
INSERT INTO user_event VALUES('19','11','Gathering Function','MicrosoftTeams-image (27).png','png','2023-08-02');
INSERT INTO user_event VALUES('20','11','Gathering Function','time.jpg','jpg','2023-08-02');
INSERT INTO user_event VALUES('21','11','Gathering Function','Asset 3.png','png','2023-08-02');


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
  `type_id` int(30) NOT NULL DEFAULT 0,
  `fileLocation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO user_files VALUES('1','Data Analyst Questions (5).docx','','docx','11','','12','7','11','super admin','red','2023-07-06','2023-07-06','A4','A4','','menu','10','');
INSERT INTO user_files VALUES('2','new plan (2).xlsx','','xlsx','1','','2','0','11','super admin','blue','2023-07-06','2023-07-06','A4','A4','','menu','10','');
INSERT INTO user_files VALUES('3','New Page.pdf','','pdf','7','','0','0','11','super admin','blue','2023-07-06','2023-07-06','A4','A4','','megmenu','4','');
INSERT INTO user_files VALUES('4','Briefcase v2.png','','png','0','','2','2','11','super admin','blue','2023-07-06','2023-07-06','A4','A4','','NULL','0','');
INSERT INTO user_files VALUES('5','C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','0','','2','2','11','super admin','red','2023-07-06','2023-07-06','A4','A4','','files','5','');
INSERT INTO user_files VALUES('6','https://www.facebook.com/','linkhiuh9i','online','6','','0','0','11','super admin','red','2023-07-06','2023-07-06','A4','A4','','megmenu','4','');
INSERT INTO user_files VALUES('12','new plan (2) (1).xlsx','','xlsx','3','','2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user','files','4','');
INSERT INTO user_files VALUES('13','archana pages (1).pdf','','pdf','3','','2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user','files','4','');
INSERT INTO user_files VALUES('14','new plan (9) (1) (2) (5) (3) (1).xlsx','','xlsx','3','','2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user','','0','');
INSERT INTO user_files VALUES('15','C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','3','','2','2','15','instructor','red','2023-07-06','2023-07-06','inst1','inst1','user','NULL','0','');
INSERT INTO user_files VALUES('16','C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','0','','2','2','13','student','red','2023-07-06','2023-07-06','inst','inst','','NULL','0','');
INSERT INTO user_files VALUES('17','google.com','zae','offline','1','','2','2','13','super admin','red','2023-07-07','2023-07-07','A4','A4','user','NULL','0','');
INSERT INTO user_files VALUES('18','C:\\xampp\\htdocs','C:xampph','offline','5','','2','2','11','super admin','red','2023-07-07','2023-07-07','A4','A4','user','','0','');
INSERT INTO user_files VALUES('20','1.mp4','','mp4','1','','2','2','11','super admin','red','2023-07-11','2023-07-11','A4','A4','user','','0','');
INSERT INTO user_files VALUES('21','bzdfb.pdf','','pdf','6','','0','0','11','super admin','red','2023-07-12','2023-07-12','A4','A4','','NULL','0','');
INSERT INTO user_files VALUES('22','folder page varun.pdf','','pdf','7','','0','0','11','super admin','red','2023-07-12','2023-07-12','A4','A4','','NULL','0','');
INSERT INTO user_files VALUES('23','WhatsApp Video 2022-12-23 at 21.02.06.mp4','','mp4','7','','0','0','11','super admin','red','2023-07-19','2023-07-19','A4','A4','','','0','');
INSERT INTO user_files VALUES('25','MicrosoftTeams-image (12).png','','png','0','','0','0','11','super admin','red','2023-07-19','2023-07-19','A4','A4','','','0','');
INSERT INTO user_files VALUES('26','MicrosoftTeams-image (11).png','','png','0','','0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4','','','0','');
INSERT INTO user_files VALUES('27','MicrosoftTeams-image (10).png','','png','0','','0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4','','','0','');
INSERT INTO user_files VALUES('28','MicrosoftTeams-image (9).png','','png','0','','0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4','','','0','');
INSERT INTO user_files VALUES('30','ayushi.pdf','','pdf','1','','2','2','11','super admin','red','2023-07-24','2023-07-24','A4','A4','user','','0','');
INSERT INTO user_files VALUES('31','01.pdf','','pdf','0','','2','2','11','super admin','red','2023-07-24','2023-07-24','A4','A4','','','0','');
INSERT INTO user_files VALUES('32','MicrosoftTeams-image (32).png','','png','1','','2','2','11','super admin','red','2023-07-26','2023-07-26','A4','A4','user','','0','');
INSERT INTO user_files VALUES('33','MicrosoftTeams-image (35).png','','png','2','','2','2','11','super admin','red','2023-07-26','2023-07-26','A4','A4','user','','0','');
INSERT INTO user_files VALUES('34','Python Probation Task (1).docx','','docx','0','','0','0','11','super admin','red','2023-09-01','2023-09-01','A4','A4','','files','3','');
INSERT INTO user_files VALUES('35','C:\\Users\\Lenovo\\Desktop\\Im','checking','online','0','','0','0','11','super admin','red','2023-09-01','2023-09-01','A4','A4','','','0','');
INSERT INTO user_files VALUES('36','Resume--Munavar.pdf','','pdf','0','','2','2','11','super admin','red','2023-10-10','2023-10-10','A4','A4','','','0','');
INSERT INTO user_files VALUES('37','Shivani_Sharma.pdf','','pdf','','','','0','11','super admin','red','2023-10-31','2023-10-31','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('38','success.jpg','','jpg','','','','0','11','super admin','red','2023-10-31','2023-10-31','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('39','C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS','C:\\xampp\\h','offline','','','','0','11','super admin','red','2023-10-31','2023-10-31','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('40','arudantech.com/','arudantech','online','','','','0','11','super admin','red','2023-10-31','2023-10-31','A4','A4','','','0','');
INSERT INTO user_files VALUES('42','Shivani_Sharma.pdf','','pdf','','','','0','11','super admin','red','2023-11-01','2023-11-01','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('43','76895-shivamcv-2.pdf','','pdf','','','','0','11','super admin','red','2023-11-01','2023-11-01','A4','A4','','','0','academic');
INSERT INTO user_files VALUES('44','Shivani_Sharma.pdf','','pdf','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('45','Django Task (1).docx','','docx','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('46','C:\\xampp\\\\htdocs\\latest\\TOS','C:xampph','offline','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('47','D:\\xampp','D:xampp','online','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','');
INSERT INTO user_files VALUES('48','Shivani_Sharma.pdf','','pdf','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('49','Python Probation Task (1).docx','','docx','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('51','C:\\xampp\\htdocs','C:xampph','offline','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('52','D:\\xampp\\htdocs','D:xampph','online','','','','0','11','super admin','red','2023-11-02','2023-11-02','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('53','VarunPicture.jpeg','','jpeg','','','','0','11','super admin','red','2023-11-03','2023-11-03','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('54','check.jpg','','jpg','','','','0','11','super admin','red','2023-11-03','2023-11-03','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('55','C:\\\\xampp\\\\htdocs','C:\\xampp\\h','offline','','','','0','11','super admin','red','2023-11-06','2023-11-06','A4','A4','','','0','academic');
INSERT INTO user_files VALUES('56','http://arudantech.com/','http://aru','online','','','','0','11','super admin','red','2023-11-06','2023-11-06','A4','A4','','','0','academic');
INSERT INTO user_files VALUES('57','C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS','C:\\xampp\\h','offline','','','','0','12','instructor','yellow','2023-11-06','2023-11-06','Bharti','Bharti','','','0','chat');
INSERT INTO user_files VALUES('58','81660-shivani_sharma.pdf','','','','','','0','11','super admin','red','2023-11-06','2023-11-06','A4','A4','','','0','academic');
INSERT INTO user_files VALUES('60','admin test.html','','html','','','','0','11','super admin','red','2023-11-07','2023-11-07','A4','A4','','','0','testDoc');
INSERT INTO user_files VALUES('61','D:\\xampp\\htdocs/latest','D:xampph','offline','','','','0','11','super admin','red','2023-11-07','2023-11-07','A4','A4','','','0','testDoc');
INSERT INTO user_files VALUES('62','http://arudantech.com/services','http://aru','online','','','','0','11','super admin','red','2023-11-07','2023-11-07','A4','A4','','','0','testDoc');
INSERT INTO user_files VALUES('63','C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS\'s','C:\\xampp\\h','offline','','','','0','11','super admin','red','2023-11-07','2023-11-07','A4','A4','','','0','chat');
INSERT INTO user_files VALUES('64','C:\\\\xampp','C:\\xampp','offline','','','','0','12','instructor','yellow','2023-11-07','2023-11-07','Bharti','Bharti','','','0','chat');
INSERT INTO user_files VALUES('65','webrun: D:\\xampp\\htdocs','webrun: D:','online','5','','2','2','11','super admin','red','2023-11-09','2023-11-09','A4','A4','user','','0','');
INSERT INTO user_files VALUES('66','https://www.google.com/search?q=what+are+the+macros+conditions&rlz=1C1ONGR_enIN1030IN1030&oq=what+are+the+macros+conditions&aqs=chrome..69i57j0i22i30j0i8i13i30j0i390i650l4.11772j0j7&sourceid=chrome&ie=UTF-8','https://ww','online','5','','2','2','11','super admin','red','2023-11-09','2023-11-09','A4','A4','user','files','6','');
INSERT INTO user_files VALUES('67','https://chat.openai.com/c/41263fe5-77a6-4829-90dc-6c379b032851','https://ch','online','5','','2','2','11','super admin','red','2023-11-14','2023-11-14','A4','A4','user','files','7','');
INSERT INTO user_files VALUES('69','C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS\'s','C:\\xampp\\h','offline','','','','0','11','super admin','red','2023-11-16','2023-11-16','A4','A4','','','0','');
INSERT INTO user_files VALUES('70','C:\\\\xampp/Tos','C:xampp','offline','','','','0','11','super admin','red','2023-11-16','2023-11-17','A4','Bharti','','','0','');
INSERT INTO user_files VALUES('71','D:\\\\xampp\\\\htdocs','D:\\xampp\\h','online','','','','0','11','super admin','red','2023-11-16','2023-11-16','A4','A4','','','0','');


CREATE TABLE `userdepartment` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `departmentId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO userdepartment VALUES('1','12','1');
INSERT INTO userdepartment VALUES('2','12','2');
INSERT INTO userdepartment VALUES('3','13','2');


CREATE TABLE `userdocumnet` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `fileType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO userdocumnet VALUES('1','13','1','Shahid_Akhtar_Resume (3-yrs Exp.pdf','pdf');


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
  `signature` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO users VALUES('11','850_6727-PRINT.jpg','2023-08-24 12:50:42','A4','A4','HA','admin','super admin','2147483647','gender','A4','11','ayushi2@gmail.com1','25d55ad283aa400af464c76d713c07ad','2022-06-06 10:31:19','0','','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAADICAYAAADGFbfiAAAAAXNSR0IArs4c6QAAFLVJREFUeF7t3QfsBEUdhuFPRAERbIiKWBJsqBgQFRuCaASsKGJXbNg7oogoICoWQCn2bizYFVGwE7EHey8RO6IgShFsaL5kz0yGubu9vZvd2bl3EkK4292ZeWa533932mVEQgABBBBAoIPAZTqcwykIIIAAAgiIAMJNgAACCCDQSYAA0omNkxBAAAEECCDcAwgggAACnQQIIJ3YOAkBBBBAgADCPYAAAggg0EmAANKJjZMQQAABBAgg3AMIIIAAAp0ECCCd2DgJAQQQQIAAwj2AAAIIINBJgADSiY2TEEAAAQQIINwDCCCAAAKdBAggndg4CQEEEECAAMI9gAACCCDQSYAA0omNkxBAAAEECCDcAwgggAACnQQIIJ3YOAkBBBBAgADCPYAAAggg0EmAANKJjZMQQAABBAgg3AMIIIAAAp0ECCCd2DgJAQQQQIAAwj2AAAIIINBJgADSiY2TEEAAAQQIINwDCCCAAAKdBAggndg4CQEEEECAAMI9gAACCCDQSYAA0omNkxBAAAEECCDcAwgggAACnQQIIJ3YOAkBBBBAgADCPYAAAggg0EmAANKJjZMQQAABBAgg3AMIIIAAAp0ECCCd2DgJAQQQQIAAwj2AAAIIINBJgADSiY2TEEAAAQQIINwDCCCAAAKdBAggndg4CQEEEECAAMI9gAACCCDQSYAA0omNkxBAAAEECCDcAwgggAACnQQIIJ3YVnrSVSVdRdK5kv6y0itzMQQQQCCjAAEkI26LS99R0mnBcTtL+lKL8zgEAQQQGFyAADJsE3xY0n2DIpwu6dbDFoncEUAAgXYCBJB2TrmOeqekhwcX/6+kG0v6ea4MuS4CCCCwKgECyKoku13nW5J2aE69SNImkj4oaZ9ul+MsBBBAoD8BAkh/1nFOG0o6X9LGki5unjq2aw7aS9LHhisaOSOAAALzBQgg841yHXGHoMP8+03AOFCSA4ufRm4j6Qe5Mue6CCCAwLICBJBlBbuf/xZJj25O/4Ck50n6iqQtm89+K8mjtH7TPQvORAABBPIJEEDy2c668uaS/izp8s1Br5T0HEnfkzR5jeWvfMwkoAxTUnJFAAEEpggQQIa5Nfy08dIg62dLOkrSKZJ2j4r0FEmvGaaY5IoAAghMFyCADHN3eMa5Z59P0hMkvUHScZIcMML0V0nbSvrjMEUlVwQQQCAtQADp/87YuxmqG+Z8uKQXStqq6fO4bFSsoyXt339RyREBBBDgCaSke+C1kp4YFej5wSutR0l6a/S918m6XjPst6S6UBYEEFhjAZ5A+m98zzYP09mSbijJr6qc3CbfjTrT/fl+kt7cf3HJEQEEEEgLEED6vTN2lfSFKEv3ezwt+mwnSZ+XdIXgcw/x9dwREgIIIFCEAAGk32Z4f2KZkjtLOjVRDA/t9eisMN0pWr23benvJ+mpkg6bklfb63AcAggg8H8BAki/N4MXSbxBkKUDhwNIKvk4L2dy0+BLv9rafoEi+4nnEEn+9yTt2QwXXuAyHIoAAghcWoAA0t9dcS1Jv4heS017+piUynNCPtIssjj5bN45k+P8xHFsononSHpwf9UmJwQQqFWAANJfyz4pmhD46cSkwVRp/ARxaPCFlz15wJRiX1HSvs2ILs92TyUPI/Y+JCQEEEBgKQECyFJ8C53szvPwVZL7I8LAMO1iDgR+lRWem1qtN/W6Kr6mhxA/eaFSczACCCAwRYAA0t+tEQeQtq+iXELvD+IO+EkK+07cp+G5I7P2EPmypGMk+emFhAACCKxEgACyEsZWFzkrWhhxEfvNJH1V0s2CnE6UtJskv7aals5pJi0SOFo1EQchgMAiAov8iC1yXY69tMB5khwInC6c88Of8oufQuYZf07S/YMJivOO53sEEEBgIYGhA8hVm9J6ccHaUzwDva29X1E9V9I/JN1tDpIdPTHRr7t+VDso9UMAgWEF2v6I5SilN0s6rbnwnyR5g6XjJf0hR2YFXDMMIN+UdKsZZfLw3QdJuoekq7cou1fq9Wq+R0q6oMXxHIIAAggsLTBkAPmopPvMqMGXJL2t+Sf+633pivd8AT9puT8iTLH9Rs2ThjeW2nSB8h0h6aAFjudQBBBAYCUCQwYQb5LkuRHzkvsLPILIK9aONe0o6fSg8N7rPNx5MNzedlYdvfCi0xbBQe+V9JCxwlBuBBAYr8CQAeRkSXssQOc9wj3y6F2SvrbAeSUcGgcQl8kr8O4QDc9NldXb2r5T0qckfabZcMr9HJN0iaQbN7PcS6grZUAAgTURGDKArOK11N8kva7pP/EyIaWmVADxpL5ZT2BnSnqjpPdI+llQMa/I69d7Yfq+pFs3He2lGlAuBBCoTGDIAOJXOv5hnSS/qnKnumdUb9zR+SJJ7pB3J7WX6/ikJG/GNHSKh+B6RJX7PKald0t62Izvz5B0/ej7xyQ2ohq63uSPAAIVCwwZQPwDf9/I1n9de9+LDZohq97m9XZL+P9e0ickfajpgxhquLAXNfTihpP0L0mXS9TLE/78ZJJa3j08fJtm06mws91PYDeStIonuyXIORUBBNZFYMgAEi8uaHN3rD8lwPcP5IGSDl5Bg/hH2T/kXt227+Qhto+bk6kXSFxkxvgBkl4RXdOj2txPREIAAQSyCwwZQPxXdNxv4VdQWybmMtxc0tOjvTT8WTgaqS3W95rXQ+436CvF62DF+XrorjeQWiT5Kc1PcfdutsH1uexauIggxyKAwFICQwYQF9z7gF8pqsEzmmG7bSq2rST/c4vg4P9I8rIhD4/6WMLruV/ETzXugO/jlU+8JHtYlrc3iyG2qW98jNfCOinaL+RFzSZSXa7HOQgggEBrgaEDiCcKPjIq7a+aJw0HgmWTO+Q9VNYdzOFChJPrfqsJNLmX/XjxlHkss/b2aFN3t5/3FblrcPAvJfnpjoQAAghkFRg6gDh4OIjEadH+gFlIGzZLfPgVWCp56Q8/iXg2978zaXs5kp9KukpzfT8hub9iXmd5m+J4i1sHwrAtnd9k0mGba3AMAgggsLDA0AHE+33/MFHqXyeGqS5cueaEj0u6Z4uTPaz4idGM8RantT7EP/R3aY72SrnfaX3m/APdlxQ+dSyy18j8q3MEAgggkBAYOoC4SO6PuHKibP5B9OuYZZL/yveaW3Hya7J4HoWPcSe+h9t6Ndvzl8m453PjV4Geqf60nstAdgggsGYCJQSQH0u6ScJ9P0lvXqI9vNGSnyq8zEeYPAnPfSMPbIYIT5aUD4/xqyVvObuKV0xLVKH1qa6PR3pNkp9IvFQKCQEEEMgmUEIAmTZHYtm/ol8v6fGRnCcWulPd60s5bS3pfZJuP0W47b7l2Rqo5YVTS6WU0LYti89hCCAwRoESfmReLsnzIOLkBRO7zkL3UNYXRBf8uyTvQfLt6PPNm+1i3R+TSn7F5ldhk71LSmznVF+S9xvxki4kBBBAIItACQHkoc0Ku3EF/YPvH/dFh/N6fwzPXo+TN6sKlxOJv/cGTvvP2Oip9KcRB9ydgkqVXt4sNzQXRQCB/gRKCCCp1y8TAa8wG+6jMU/Ge4Z4zkWcfiNpr8TTR+p6h86YiFfyj3K8v4r7bzwai4QAAghkESghgLhiHv2UWoF3kRVmry3pdwklr/Lr1XC9/0jb5OPdge8noDgtO/mvbRkWPS4ViK8zxWTRa3M8AgggcCmBUgLIWc0aWHEBvVjgc1u2m9eSenZ0rIfi+hWZ54IsmjzM1yObUsN9S30SiZfI9yAC7ylCQgABBFYuUEoA8V/7ftqIk3fi27dlrT0hMewI96zyXZoFBlteInmY54T4iSROXmr+8GUunOFc79bogDlJNvGikyQEEEBg5QKlBBAvM/LqRO28Ym64UOI0AO8r4pVpw/QqSc9akVgqiHhPj5dKcp9JKclzWs4JCuMnL6/WS0IAAQRWLlBKAPHoodQ+596yNjVLPYZILZe+6rp5vojX6IpTaX0iezb7nrjPh9noK/9fhgsigMBEYNU/sl1lvTufdwv07PE43bLF6Kl4SfZcP+reS2S7RBlL7RPp2h6chwACCMwVKCWAuKDev9x/PcfJEw1T8zomx3mo7zeik3LuzBcPl51k7c7+eIfAuQ3AAQgggMBYBUoKIN7K1suXxMlDc687Y+OnVP+J9wb/ecZGSS2/8k9JG2XMk0sjgAACRQmUFEBuMONH35tBTdv0yXuA3ytS7aNeX5d0myhfXmUVdXtTGAQQyCnQxw/tIuV3P8hk06XwvGdOGaUVr0Lrc94k6XGLZLrEsX+QdK0BgtcSReZUBBBAYDUCpQWQR0h6R6Jq0zrFU6+S7rCCuR9tdVPrePEU0laP4xBAYNQCpQWQaTsUehl2L70epvtJ+lD0Wa7RV7Ma+SvRqsF+irraqO8KCo8AAgi0ECgtgLjIP5DkPo84eWOonzUfOtB8TJL7TcI0xFaufuLwrPQwefJel+VTWjQZhyCAAAJlCJQYQLyelde1itOjJXnrVqd4C1d/dqakrQZg9fDdl0X5sgbVAA1Blggg0K9AiQHEe6F7S9Y4eb0sb3O7qaSfJF5pedZ1ahhwbtF4+RDnd8qUOS25y8L1EUAAgd4ESgwgrnw8s9yfecST54M4kDwyEvKKs/H2tb0hNqv2ekRYmIZ4ndZnnckLAQTWXKDUAJJa28pN5b4Gb1cbJ88DOWnAtvSwYY8IC9OPo9WBByweWSOAAAKrFyg1gPgJY9LfEdba+5LvHDEMMfIq1RKpp6ZjJD1j9c3GFRFAAIHhBUoNIF6B99wEj/e3CEdoeSfDu0vy9q1DJ09gfGyiEF7B10GOhAACCFQlUGoAMfLZifkU/myLoAU86TDuDxmqgRz0fiXpSgSRoZqAfBFAoE+BkgOIg4NnpofpEkkbNB/4qcMd1SWl1NIqk/LxJFJSS1EWBBBYWqDkAHJ1SZ9vOqInQSOscKk/yN6h8JBEy7xW0pOXbjEugAACCBQiUHIAMdE9Jb1VkoNJmP4sactCDFPFSG2Be5QkT5IkIYAAAlUIlB5AXL4vR2tNGf4ISQcV3gL7SPIs9R0lufPfwcMTDEkIIIBAFQKlBxAj7yvp7ZG29yd/0EhawP0iJYwSGwkXxUQAgbEIjCGAbN4soniNBtXzLa4g6eKxIFNOBBBAoEaBMQQQu3udK0/Km6SvJV5r1dg+1AkBBBAoVmAsAcQLKJ4RdKZfKOkmkrxfOgkBBBBAYACBsQQQ07gDevfAqNRhvAM0I1kigAAC/QuMKYAcIOkVAVGJEwn7b0FyRAABBAYSGFMA2UmS+z7CtAmd6QPdOWSLAAJrLzCmAOJ9xr0WVpi8vPvha9+KACCAAAIDCIwpgJjnT9GsdO9MuO0AbmSJAAIIrL3A2ALIZyXdJWq160v69dq3JAAIIIBAzwJjCyBHS3pmZHSwpJf07EZ2CCCAwNoLjC2APEnSa6JWY+vYtb+NAUAAgSEExhZAbt8srhhb3VbS14cAJE8EEEBgXQXGFkCuKOk8SXG5x7A677reY9QbAQQqFRhbAHEzePmSa0ft8R1JO1TaRlQLAQQQKFJgjAHkZEl7JDS3knRmkcoUCgEEEKhQYIwB5PgpW8PuLenDFbYRVUIAAQSKFBhjAPGQ3dRuhMc1y74XCU2hEEAAgdoExhhAvEXs6YmGOF+SN58iIYAAAgj0IDDGAGIW70qYSttL+m4PbmSBAAIIrL1AbQHk5ZIOXPtWBQABBBDoQWCsAcSjra6Z8PmlpG16cCMLBBBAYO0FxhpA3N/hSYWpdENJv1j7lgUAAQQQyCww1gAyrQ/EXA+WdEJmNy6PAAIIrL3AWAPIFyTtOqX1jpX09LVvWQAQQACBzAI1BpAvStolsxuXRwABBNZeYKwB5FBJh0xpvXMlefvbWa+51r7hAUAAAQSWFRhrAPHrK7/GmpZYF2vZO4PzEUAAgTkCYw0g3sb2jBl1221OgOHGQAABBBBYUmCsAcTVvkDSplPqf5gkv+YiIYAAAghkEhhzADlS0v5TXB4v6Y2ZzLgsAggggEBiZ78xodxU0g95AhlTk1FWBBCoSWDMTyBuhxMl3SvRILzCqukupS4IIFCkwNgDyD0knZSQvZWkbxYpTqEQQACBSgTGHkA2k/QWSfsE7fF7SVtX0j5UAwEEEChWYOwBZAL7VUm3bf6DnQmLvd0oGAII1CRQSwBxm0zWxjq1pgaiLggggECpAjUFkFKNKRcCCCBQpQABpMpmpVIIIIBAfgECSH5jckAAAQSqFCCAVNmsVAoBBBDIL0AAyW9MDggggECVAgSQKpuVSiGAAAL5BQgg+Y3JAQEEEKhSgABSZbNSKQQQQCC/AAEkvzE5IIAAAlUKEECqbFYqhQACCOQXIIDkNyYHBBBAoEoBAkiVzUqlEEAAgfwCBJD8xuSAAAIIVClAAKmyWakUAgggkF+AAJLfmBwQQACBKgUIIFU2K5VCAAEE8gsQQPIbkwMCCCBQpQABpMpmpVIIIIBAfgECSH5jckAAAQSqFCCAVNmsVAoBBBDIL0AAyW9MDggggECVAgSQKpuVSiGAAAL5BQgg+Y3JAQEEEKhSgABSZbNSKQQQQCC/AAEkvzE5IIAAAlUKEECqbFYqhQACCOQXIIDkNyYHBBBAoEoBAkiVzUqlEEAAgfwCBJD8xuSAAAIIVClAAKmyWakUAgggkF+AAJLfmBwQQACBKgUIIFU2K5VCAAEE8gsQQPIbkwMCCCBQpQABpMpmpVIIIIBAfgECSH5jckAAAQSqFCCAVNmsVAoBBBDIL0AAyW9MDggggECVAgSQKpuVSiGAAAL5BQgg+Y3JAQEEEKhSgABSZbNSKQQQQCC/AAEkvzE5IIAAAlUKEECqbFYqhQACCOQXIIDkNyYHBBBAoEoBAkiVzUqlEEAAgfwCBJD8xuSAAAIIVClAAKmyWakUAgggkF+AAJLfmBwQQACBKgUIIFU2K5VCAAEE8gsQQPIbkwMCCCBQpQABpMpmpVIIIIBAfgECSH5jckAAAQSqFCCAVNmsVAoBBBDIL0AAyW9MDggggECVAgSQKpuVSiGAAAL5BQgg+Y3JAQEEEKhS4H8ksw7nKJVYXgAAAABJRU5ErkJggg==');
INSERT INTO users VALUES('12','agesearch v3_1.png','2023-07-20 13:01:00','Ayushi bharti','Bharti','','inst1','instructor','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','','','1','');
INSERT INTO users VALUES('13','Donna.png','2023-09-11 17:21:31','student1','Archana','','inst2','instructor','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('14','Donna.png','2023-07-19 15:28:57','student2','archi','AR','std1','student','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-05-10 10:31:19','','','');
INSERT INTO users VALUES('15','pngtree-a-small-pink-white-flower-png-image_2664964.png','','varun mishra','varun','','inst33','instructor','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('16','Donna.png','2023-03-08 13:58:47','archana guthale','inst','','studen4','student','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-04-05 10:31:19','','','');
INSERT INTO users VALUES('17','Donna.png','','jhvbsrf','stu','in','studen48','student','7021364749','male','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-06-06 10:31:19','','','');
INSERT INTO users VALUES('18','Donna.png','','archana guthale','archi3','ar','archana','student','0702136474','male','','11','archana@msarii.com','cf65e9e5920cda080f7903a968ad9744','2022-06-06 10:31:19','','','');
INSERT INTO users VALUES('19','Donna.png','','archana guthale','archi1','','studen9','student','0702136474','male','','11','archana@msarii.com','827ccb0eea8a706c4c34a16891f84e7b','2022-01-12 10:31:19','','','');
INSERT INTO users VALUES('20','Donna.png','','archana','archi4','st','std20','student','0702136474','female','','11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-07-13 10:31:19','','','');
INSERT INTO users VALUES('21','Donna.png','','student','stu','AR','std10','student','0702136474','male','','11','archana@msarii.com','26bca7d18fac41f574d34da8d6df4170','2022-08-18 10:31:19','','','');
INSERT INTO users VALUES('22','Donna.png','','student','inst','ar','std11','student','0702136474','male','','11','archana@msarii.com','26bca7d18fac41f574d34da8d6df4170','2023-09-13 00:00:00','','','');
INSERT INTO users VALUES('23','Donna.png','','testing user','user1','AR','std103','student','7021364749','female','','11','archana@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','2023-10-19 00:00:00','','','');
INSERT INTO users VALUES('24','Donna.png','','archana guthale','user4','AR','STD09','student','+919474512','female','','11','archana@gmail.com','26bca7d18fac41f574d34da8d6df4170','2023-12-14 00:00:00','','','');
INSERT INTO users VALUES('25','Donna.png','','abcd','abcd','AB','std7','student','0876543219','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','2023-02-21 00:00:00','','','');
INSERT INTO users VALUES('26','Donna.png','','Ayushi Bharti','ayu','ayu','std44','IT people','0883012547','female','','11','ayushi260395@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('27','Donna.png','','student1','std1','SD','std0','student','8765432190','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('28','Donna.png','','student2','std2','SA','std9','student','8765432190','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('29','Donna.png','2023-08-08 10:41:40','student3','std3','SG','std8','student','0876543219','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('30','Donna.png','','abcdefgh','abcd','MA','sti9','student','8765432190','male','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('31','Donna.png','','ayushi','ayu','MAA','std66','student','0876543219','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('32','Donna.png','','Varun Mishra','varun','VV','std88','student','0876543219','male','','11','jack@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('33','Donna.png','','Archana Nair','Archana','AA','std55','student','0876543219','female','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');
INSERT INTO users VALUES('34','Donna.png','','Anchit ','anchit','AN','std99','student','0876543219','male','','11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','','','','');


CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `VehicleName` varchar(255) DEFAULT NULL,
  `VehicleType` varchar(255) DEFAULT NULL,
  `VehicleNumber` varchar(255) DEFAULT NULL,
  `VehicleSpot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO vehicle VALUES('1','','1','hsdjsd','dsmd');


CREATE TABLE `vehicletype` (
  `vehid` int(11) NOT NULL,
  `vehicletype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO vehicletype VALUES('1','Car');
INSERT INTO vehicletype VALUES('2','SUV ');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `warning_data` (
  `id` int(11) NOT NULL,
  `warning_name` varchar(30) DEFAULT NULL,
  `ctp` varchar(30) DEFAULT NULL,
  `file_name` varchar(299) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `uploaded_on` varchar(30) DEFAULT NULL,
  `bgColor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO warning_data VALUES('1','Yellow Warninig','1','','','','','#401cf2');
INSERT INTO warning_data VALUES('2','Red Warning','1','','','','','brown');
INSERT INTO warning_data VALUES('3','green warning','2','','','','','');


CREATE TABLE `warning_permission` (
  `id` int(30) NOT NULL,
  `std_id` varchar(30) DEFAULT NULL,
  `warning_id` varchar(30) DEFAULT NULL,
  `permission` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



