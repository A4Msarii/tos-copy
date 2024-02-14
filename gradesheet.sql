-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: grade sheet
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `academic`
--

LOCK TABLES `academic` WRITE;
/*!40000 ALTER TABLE `academic` DISABLE KEYS */;
INSERT INTO `academic` VALUES (2,'vbn','A02',NULL,NULL,'1','1','56','user_file',NULL,'2023-07-21',3),(4,'Parking in rush ','dcdc',NULL,NULL,'1','1','55','user_file',NULL,'2023-08-01',7),(5,'academic -5','ac5',NULL,NULL,'1','1','58','user_file',659523895,'2023-11-01',5),(6,'park1','pk1',NULL,NULL,'3','1',NULL,NULL,NULL,'2023-11-08',NULL),(7,'park2','pk2',NULL,NULL,'3','1',NULL,NULL,NULL,'2023-11-08',15),(8,'academic3','AC3',NULL,NULL,'7','1',NULL,NULL,NULL,'2023-11-09',4);
/*!40000 ALTER TABLE `academic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `academicassignee`
--

LOCK TABLES `academicassignee` WRITE;
/*!40000 ALTER TABLE `academicassignee` DISABLE KEYS */;
/*!40000 ALTER TABLE `academicassignee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `accomplish_task`
--

LOCK TABLES `accomplish_task` WRITE;
/*!40000 ALTER TABLE `accomplish_task` DISABLE KEYS */;
INSERT INTO `accomplish_task` VALUES (1,'1','13','14','item','',NULL,NULL,NULL),(2,'2','13','14','item','',NULL,NULL,NULL),(3,'2','13','14','item','',NULL,NULL,NULL),(4,'1','13','14','item','',NULL,NULL,NULL),(5,'3','13','14','item','',NULL,NULL,NULL),(6,'2','13','14','item','',NULL,NULL,NULL),(7,'3','13','14','item','',NULL,NULL,NULL),(8,'2','13','14','item','',NULL,NULL,NULL),(9,'2','13','14','item','',NULL,NULL,NULL),(10,'3','13','14','item','',NULL,NULL,NULL),(11,'2','13','14','item','',NULL,NULL,NULL),(12,'3','13','14','item','',NULL,NULL,NULL),(13,'2','13','14','item','',NULL,NULL,NULL),(14,'1','29','1','item',NULL,NULL,NULL,NULL),(15,'1','29','1','item','1',NULL,NULL,NULL),(16,'8','29','1','subitem',NULL,NULL,NULL,NULL),(17,'8','29','1','subitem',NULL,NULL,NULL,NULL),(18,'2','29','1','item',NULL,NULL,NULL,NULL),(19,'2','29','1','item',NULL,NULL,NULL,NULL),(20,'2','29','1','item',NULL,NULL,NULL,NULL),(21,'2','29','1','item',NULL,NULL,NULL,NULL),(22,'2','29','1','item',NULL,NULL,NULL,NULL),(23,'2','29','1','item',NULL,NULL,NULL,NULL),(24,'2','29','1','item',NULL,NULL,NULL,NULL),(25,'2','29','1','item',NULL,NULL,NULL,NULL),(26,'1','29','1','item','1',NULL,NULL,NULL),(27,'1','29','1','item','1',NULL,NULL,NULL),(28,'1','29','1','item',NULL,NULL,NULL,NULL),(29,'1','29','1','item','1',NULL,NULL,NULL),(30,'2','29','1','item','1',NULL,NULL,NULL),(31,'8','29','1','subitem','1',NULL,NULL,NULL),(32,'1','29','1','item','1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `accomplish_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acedemic_phase`
--

LOCK TABLES `acedemic_phase` WRITE;
/*!40000 ALTER TABLE `acedemic_phase` DISABLE KEYS */;
INSERT INTO `acedemic_phase` VALUES (1,'1','1'),(2,'7','1'),(3,'3','1');
/*!40000 ALTER TABLE `acedemic_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acedemic_stu`
--

LOCK TABLES `acedemic_stu` WRITE;
/*!40000 ALTER TABLE `acedemic_stu` DISABLE KEYS */;
INSERT INTO `acedemic_stu` VALUES (1,29,2,'1','2024-01-29 15:06:15.000000','2024-01-29','12');
/*!40000 ALTER TABLE `acedemic_stu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `actual`
--

LOCK TABLES `actual` WRITE;
/*!40000 ALTER TABLE `actual` DISABLE KEYS */;
INSERT INTO `actual` VALUES (1,'Front Drive','PRK-1','percentage',100,'1','1','2023-07-17',NULL,NULL,NULL),(2,'back adding \"AYushi\"','ADR-2','percentage',100,'1','1','2023-07-17',NULL,NULL,NULL),(3,'back adding','ADR-3','percentage',100,'1','1','2023-07-17',NULL,NULL,NULL),(4,'Front Drive','ADR-2','percentage',100,'1','1','2023-07-18',NULL,NULL,NULL),(5,'Front Drive','ADR-9','percentage',100,'3','1','2023-08-02',NULL,NULL,NULL),(6,'back park','ADR-92','percentage',100,'3','1','2023-08-02',NULL,NULL,NULL),(7,'msarii','ADR-11','percentage',100,'3','1','2023-08-02',NULL,NULL,NULL),(8,'back adding','ADR-8','percentage',100,'1','1','2023-08-07',NULL,NULL,NULL),(9,'back adding','ADR-7','percentage',100,'1','1','2023-08-07',NULL,NULL,NULL),(10,'back adding','wqopjow','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(11,'Front Drive','2uiy2iywio','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(12,'back adding','202uu2o','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(13,'back park','ADR-366','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(14,'back park ,xcnskcbsbcw scbvbevfbvcbcbwaukfvgefvbefjvefbvejbvdgvebvjebvebvfehjfg wvaefkbgveilhi dkvnfdfkgnbiebhrnbgkgrd ebve,bgkievnbk.jethlgtw ebgegtehgivhetgi;legt;oeu egnektghwupgh;otjgwi\'hw4 engekgheigbvkdsghsgtri dvnkdbgiuleshgbvegi','ADR-234','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(15,'Front Drive','ADR-100','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(16,'front adding','APR-10','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(17,'Front Drive','APR-9','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(18,'msarii','APR-8','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(19,'Front Drive','APR-7','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(20,'back adding','APR-6','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(21,'back park','APR-4','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(22,'Front Drive','APR-3','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(23,'drive','APR-2','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(24,'msarii','park 1','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(25,'Front Drive','park','percentage',100,'1','1','2023-08-09',NULL,NULL,NULL),(26,'Front Drive','ADR-9','percentage',100,'2','2','2023-08-25',NULL,NULL,NULL),(27,'PPK','PPK','percentage',100,'3','1','2023-09-08',NULL,NULL,NULL),(28,'newAct1','Act1','percentage',100,'4','1','2023-11-08',6,NULL,NULL),(29,'newAct2','Act2','percentage',100,'4','1','2023-11-08',NULL,NULL,NULL),(30,'newFolClass','NFC1','percentage',100,'8','6','2023-11-22',NULL,NULL,NULL),(31,'newFolClass','NFC2','percentage',100,'8','6','2023-11-22',NULL,NULL,NULL),(32,'shop test','sp1','percentage',100,'2','2','2023-12-07',NULL,NULL,NULL),(33,'scActual','sc1','percentage',100,'9','4','2023-12-07',NULL,NULL,NULL),(34,'scActual1','sc2','percentage',100,'9','4','2023-12-07',NULL,NULL,NULL),(36,'actual10','act10','percentage',100,'13','1','2024-01-31',NULL,NULL,NULL);
/*!40000 ALTER TABLE `actual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `actual_gradesheet`
--

LOCK TABLES `actual_gradesheet` WRITE;
/*!40000 ALTER TABLE `actual_gradesheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `actual_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `actual_phase`
--

LOCK TABLES `actual_phase` WRITE;
/*!40000 ALTER TABLE `actual_phase` DISABLE KEYS */;
INSERT INTO `actual_phase` VALUES (1,'1','2'),(2,'2','2'),(3,'3','3'),(4,'1','1'),(5,'2','2'),(6,'3','1'),(7,'0','1'),(8,'6','1'),(9,'4','1'),(10,'7','1'),(11,'8','6'),(12,'9','4'),(13,'10','7'),(14,'11','8'),(15,'12','1'),(16,'13','1');
/*!40000 ALTER TABLE `actual_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `additional_task`
--

LOCK TABLES `additional_task` WRITE;
/*!40000 ALTER TABLE `additional_task` DISABLE KEYS */;
INSERT INTO `additional_task` VALUES (1,'2',13,'14','item','',NULL,NULL,NULL),(2,'6',29,'5','item',NULL,NULL,NULL,NULL),(3,'1',29,'5','item',NULL,NULL,NULL,NULL),(4,'1',29,'26','item',NULL,NULL,NULL,NULL),(5,'2',29,'26','item',NULL,NULL,NULL,NULL),(6,'3',29,'26','item',NULL,NULL,NULL,NULL),(7,'8',29,'1','subitem',NULL,NULL,NULL,NULL),(8,'8',29,'1','subitem',NULL,NULL,NULL,NULL),(9,'1',29,'1','item',NULL,NULL,NULL,NULL),(10,'7',29,'1','subitem',NULL,NULL,NULL,NULL),(11,'1',29,'1','item','1',NULL,NULL,NULL),(12,'1',29,'1','item',NULL,NULL,NULL,NULL),(13,'7',29,'1','subitem',NULL,NULL,NULL,NULL),(14,'8',29,'1','subitem',NULL,NULL,NULL,NULL),(15,'1',29,'1','item',NULL,NULL,NULL,NULL),(16,'2',29,'1','item','1',NULL,NULL,NULL),(17,'1',29,'1','item','1',NULL,NULL,NULL),(18,'2',29,'1','item','1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `additional_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `adminpagechangelog`
--

LOCK TABLES `adminpagechangelog` WRITE;
/*!40000 ALTER TABLE `adminpagechangelog` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminpagechangelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `alertreply`
--

LOCK TABLES `alertreply` WRITE;
/*!40000 ALTER TABLE `alertreply` DISABLE KEYS */;
INSERT INTO `alertreply` VALUES (1,1,12,'ok','0'),(2,2,12,'ok','0'),(3,3,12,'ok','0'),(4,2,36,'ok','0'),(5,1,36,'ok','0'),(6,4,12,'ok','0'),(7,4,14,'ok','0'),(8,3,14,'ok','0'),(9,2,14,'ok','0'),(10,1,14,'ok','0'),(11,4,15,'close','0'),(12,3,15,'close','0'),(13,2,15,'close','0'),(14,1,15,'close','0'),(15,4,13,'close','0'),(16,3,13,'close','0'),(17,2,13,'close','0'),(18,1,13,'close','0'),(19,5,12,'ok','0'),(20,5,14,'close','0'),(21,5,16,'ok','0'),(22,4,16,'ok','0'),(23,2,16,'ok','0'),(24,1,16,'ok','0'),(25,6,12,'ok','0'),(26,6,14,'ok','0'),(27,8,12,'ok','0'),(28,7,12,'ok','0'),(29,8,16,'ok','0'),(30,7,16,'ok','0'),(31,6,16,'ok','0'),(33,8,14,'ok','0'),(34,7,14,'ok','0'),(35,8,29,'ok','0'),(36,7,29,'ok','0'),(37,6,29,'ok','0'),(38,2,29,'ok','0'),(39,8,34,'ok','0'),(40,7,34,'ok','0'),(41,6,34,'ok','0'),(42,2,34,'ok','0'),(43,8,33,'ok','0'),(44,7,33,'ok','0'),(45,6,33,'ok','0'),(46,2,33,'ok','0'),(47,8,32,'ok','0'),(48,7,32,'ok','0'),(49,6,32,'ok','0'),(50,2,32,'ok','0'),(51,8,31,'ok','0'),(52,7,31,'ok','0'),(53,6,31,'ok','0'),(54,2,31,'ok','0'),(55,8,36,'ok','0'),(56,7,36,'ok','0'),(57,6,36,'ok','0'),(58,8,15,'ok','0'),(59,7,15,'ok','0'),(60,6,15,'ok','0'),(61,10,36,'ok','0'),(62,11,36,'ok','0'),(63,13,12,'ok','0'),(64,12,12,'ok','0'),(65,8,13,'ok','0'),(66,7,13,'ok','0'),(67,6,13,'ok','0'),(68,74,12,'ok','0'),(69,73,12,'ok','0'),(70,71,12,'ok','0'),(71,70,12,'ok','0'),(72,66,12,'ok','0'),(73,64,12,'ok','0'),(74,62,12,'ok','0'),(75,60,12,'ok','0'),(76,55,12,'ok','0'),(77,54,12,'ok','0'),(78,49,12,'ok','0'),(79,44,12,'ok','0'),(80,39,12,'ok','0'),(81,19,12,'ok','0'),(82,14,12,'ok','0'),(83,76,12,'ok','0'),(84,105,12,'ok','0'),(85,104,12,'ok','0'),(86,103,12,'ok','0'),(87,102,12,'ok','0'),(88,101,12,'ok','0'),(89,100,12,'ok','0'),(90,99,12,'ok','0'),(91,98,12,'ok','0'),(92,97,12,'ok','0'),(93,96,12,'ok','0'),(94,94,12,'ok','0'),(95,92,12,'ok','0'),(96,90,12,'ok','0'),(97,88,12,'ok','0'),(98,87,12,'ok','0'),(99,85,12,'ok','0'),(100,84,12,'ok','0'),(101,83,12,'ok','0'),(102,82,12,'ok','0'),(103,81,12,'ok','0'),(104,80,12,'ok','0'),(105,79,12,'ok','0'),(106,78,12,'ok','0'),(107,106,12,'ok','0'),(108,108,12,'ok','0'),(109,113,12,'ok','0'),(110,112,12,'ok','0'),(111,111,12,'ok','0'),(112,110,12,'ok','0'),(113,114,12,'ok','0'),(114,115,12,'ok','0'),(115,116,12,'ok','0'),(116,117,12,'ok','0'),(117,107,13,'ok','0'),(118,86,13,'ok','0'),(119,77,13,'ok','0'),(120,75,13,'ok','0'),(121,72,13,'ok','0'),(122,69,13,'ok','0'),(123,67,13,'ok','0'),(124,61,13,'ok','0'),(125,59,13,'ok','0'),(126,57,13,'ok','0'),(127,56,13,'ok','0'),(128,56,13,'ok','0'),(129,29,13,'ok','0'),(130,24,13,'ok','0'),(131,120,12,'ok','0'),(132,119,12,'ok','0'),(133,118,12,'ok','0');
/*!40000 ALTER TABLE `alertreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `alerttable`
--

LOCK TABLES `alerttable` WRITE;
/*!40000 ALTER TABLE `alerttable` DISABLE KEYS */;
INSERT INTO `alerttable` VALUES (2,'11','Graduation ceremony','hello world','2023-09-19','everyone',NULL,'Urgent Notice','#FF1202','Mekala-Rajesh-Resume.pdf','urgent_w.png','white'),(6,'11','Red Warning','Hello guys its woraning for u','2023-10-12','Everyone',NULL,'Caution','#FFC433','1aHE.gif','caution_w.png','black'),(7,'11','FeedBack Request','Request for exam, hello everyone, how r u? all good. have u all ok. please contact as soon as possible','2023-10-13','Everyone',NULL,'Feedback Request','#e933cf','the-difference-between-trees-and-shrubs-3269804-hero-a4000090f0714f59a8ec6201ad250d90.jpg','feedback_w.png','white'),(8,'11','meeting summary','Meeting in 10 minutes come as soon as possible','2023-10-13','Everyone',NULL,'Meeting Summaries','grey','how-to-draw-a-sun-featured-image-1200-991x1024.webp','summary_w.png','white'),(10,'11','test','testing alert','2024-01-08','NULL','36','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(11,'','Phase Alert','sabre You are assigned as a phase manager for phase1 phase.','2024-01-08',NULL,'36','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(12,'11','Phase Alert','Bharti you are assigned as a phase manager for phase1 phase.','2024-01-17',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(13,'11','Phase Alert','Bharti you are assigned as a phase manager for phase1 phase.','2024-01-17',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(14,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(15,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(16,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(17,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(18,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(19,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(20,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(21,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(22,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(23,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(24,'11','Phase Alert','Archana you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(25,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(26,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(27,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(28,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(29,'11','Phase Alert','Archana you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(30,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(31,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(32,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(33,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(34,'11','Phase Alert','varun you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'15','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(35,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(36,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(37,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(38,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(39,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(40,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(41,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(42,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(43,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'NULL','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(44,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(45,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(46,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(47,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(48,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(49,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(50,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(51,'11','Phase Alert',' you are assigned as a phase manager for phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(52,'11','Phase Alert',' you are assigned as a phase manager for test phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(53,'11','Phase Alert',' you are assigned as a phase manager for academic phase phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(54,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(55,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(56,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(57,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(58,'11','Phase Alert',' you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(59,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(60,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(61,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(62,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(63,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(64,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(65,'11','Phase Alert',' you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(66,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(67,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(68,'11','Phase Alert',' you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(69,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(70,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(71,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(72,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(73,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(74,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-22',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(75,'11','Phase Alert','Archana you are assigned as a phase manager for Parking phase.','2024-01-22',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(76,'11','Phase Alert','Bharti you are assigned as a phase manager for Driving phase.','2024-01-23',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(77,'11','Phase Alert','Archana you are assigned as a phase manager for Driving phase.','2024-01-23',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(78,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(79,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(80,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(81,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(82,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(83,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(84,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(85,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(86,'11','Phase Alert','','2024-01-24',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(87,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(88,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(89,'11','Phase Alert','','2024-01-24',NULL,'36','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(90,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(91,'11','Phase Alert','','2024-01-24',NULL,'15','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(92,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(93,'11','Phase Alert','','2024-01-24',NULL,'37','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(94,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(95,'11','Phase Alert','','2024-01-24',NULL,'15','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(96,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(97,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(98,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(99,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(100,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(101,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(102,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(103,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(104,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(105,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(106,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(107,'11','Phase Alert','','2024-01-24',NULL,'13','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(108,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(109,'11','Phase Alert','','2024-01-24',NULL,'15','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(110,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(111,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(112,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(113,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(114,'11','Phase Alert','','2024-01-24',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(115,'11','Phase Alert','','2024-01-29',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(116,'11','Phase Alert','','2024-01-29',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(117,'12','Phase Alert','','2024-01-29',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(118,'11','Phase Alert','','2024-01-30',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(119,'11','Phase Alert','','2024-01-30',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white'),(120,'11','Phase Alert','','2024-01-30',NULL,'12','General Announcement/Note To All','#333CFF','1','announcement_w.png','white');
/*!40000 ALTER TABLE `alerttable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `assing_warning_doc`
--

LOCK TABLES `assing_warning_doc` WRITE;
/*!40000 ALTER TABLE `assing_warning_doc` DISABLE KEYS */;
INSERT INTO `assing_warning_doc` VALUES (4,'78','','131'),(5,'79','','131'),(6,'86','','153');
/*!40000 ALTER TABLE `assing_warning_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attrition`
--

LOCK TABLES `attrition` WRITE;
/*!40000 ALTER TABLE `attrition` DISABLE KEYS */;
/*!40000 ALTER TABLE `attrition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bridge_app_blacklistedtoken`
--

LOCK TABLES `bridge_app_blacklistedtoken` WRITE;
/*!40000 ALTER TABLE `bridge_app_blacklistedtoken` DISABLE KEYS */;
INSERT INTO `bridge_app_blacklistedtoken` VALUES (1,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDM1MTgzMTcuMzQzNTE4fQ.ls748frPXkNeo5eY8OcU1v0vYA155v50F6skxA1Tb7o','2023-12-25 11:34:22.256991'),(2,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDM2NjkwMjQuOTc4NDMyMn0.go_TMvm6uLm7k2JgtqUGms8A4lrHk1-GNagdzYukFpk','2023-12-27 05:47:48.702465'),(3,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0Nzk3MDY1fQ.frDG8xm7FT1DnDsj0mUzYimQGmV-CupPxDfq9YfBCRc','2024-01-09 06:44:57.410107'),(4,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA1MDQ1fQ.RvppqholgREfcOrYeUG-IYLdp0pz5F351AAgGFsrSe4','2024-01-09 08:57:28.078005'),(5,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA1MzQxfQ.A6FgfVVefkw8CGQI74LWWZlhH1ZCPwXFA1uNUOXJN4c','2024-01-09 09:02:29.826802'),(6,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA1NDIzfQ.PAxTVG85-P6O1mGVQaRJ6gbn1jhwCu0ntWAeEP3EDCw','2024-01-09 09:03:49.836532'),(7,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA2MDg2fQ.RyA6ZioVNpuzR0Hax8zZ8HgwSoY106gWFCIONPsHE3A','2024-01-09 09:14:51.277989'),(8,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA2MjU5fQ.TNHXtO_ovohG6P8tenECWn-HcvoDBn_hiY9_LpeKkus','2024-01-09 09:17:45.099338'),(9,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA2MjkxfQ.tdAYhyU3Rq5BpF-IbPGZSLLPhJLHpDMDrwDtaHO8rPc','2024-01-09 09:18:23.828494'),(10,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA2NDQ3fQ.rS71JnI5j2T2xz-4Hq4m4_12OpePPVcSfiC23C4d3Mg','2024-01-09 09:20:54.995967'),(11,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA2NjE3fQ.x_RZgIsbIImikSclPJuVIChWN8x7Y20couS5ufno7gE','2024-01-09 09:23:46.637218'),(12,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA3MDI5fQ.RgT7uaArDfPHAOwWa1p0DEWd0_sX4AwrXiFrhtsQ95E','2024-01-09 09:30:36.202224'),(13,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA3MDU0fQ.Fycy4xl2cCZJW7TblA3I8_Rjy3MFZET6Xibqe93S9PY','2024-01-09 09:31:56.597685'),(14,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA3MTM0fQ.1cBZD3xp9DbZ6ENxs8ODPWP6qxyzZE2gja6OfrgtikI','2024-01-09 09:32:20.486590'),(15,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA3MTg2fQ.uCCdgkO3eK-FNvyJbk5mL-zhEYm2BPRzCIZTtCKbTkM','2024-01-09 09:33:11.407032'),(16,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA4NjIxfQ.OiA_Q_8zrmqsOfjuqy-ex4_wNk1zkLGrToX5Uae-yOM','2024-01-09 10:00:17.515448'),(17,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA5MDUxfQ.2mxFtMYpVkrqzw2Pgr_Owp4EXmmX-NZ2nN5MqlpTAUI','2024-01-09 10:04:47.141031'),(18,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEwMTM5fQ.pVJqprg6r9QqtfC9tVZQUQW9WOgMXrbSNGzCMyu5_Sw','2024-01-09 10:30:17.976997'),(19,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEwNjc3fQ.SYjvqXbmsRPIBWIM1n6crjKYfElgeYhN8E_ytz8M7oo','2024-01-09 10:44:45.624123'),(20,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODA5MTYwfQ.vsBCJCtdpsX8UBqBB7u7-i1TrzNslet_wBzP09phObQ','2024-01-09 10:44:49.988895'),(21,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODExOTEzfQ.Id7ES27elva6SuPEydAh1BmZ6uLakhTUqi_SKMksWs4','2024-01-09 10:51:59.018014'),(22,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEyNTA3fQ.YZ4p4ip9ohFBqYML2T1auo8n6eyfMX4ZW2AQAUEq8UI','2024-01-09 11:01:56.214304'),(23,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEyNzY3fQ.rjGQwV6_xxDJGCzmoEzxjKviovXQRTUlPUXGb0z-sHA','2024-01-09 11:06:16.919608'),(24,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEyOTkzfQ.r_4eSujd7JWqF9aihy8Xp_udKPNXeTMOwp7uCZD0gAM','2024-01-09 11:09:58.279758'),(25,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEzNjMxfQ.R0k2ehWb0eP6Ai0Xh3E-A9EPYPCw0_MaK7xNVSRH7Kk','2024-01-09 11:20:37.854983'),(26,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEzODI1fQ.lgGijqUp-6SQox4gkljmVYcyNP60JzsrsjE0Z276pvM','2024-01-09 11:23:56.162191'),(27,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODEzOTUyfQ.VkUGst1ZylGish2F7IPokOVm2F9QBpDADH0VW3kplvg','2024-01-09 11:26:32.824836'),(28,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODE0MDQ0fQ.oPS9h-_S9UafqdbJkvAMABsPH9sGTHVJXDptmqLxfdc','2024-01-09 11:27:35.685119'),(29,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODc0OTg1fQ.OZhHAKpKlgJpen21cUf1NJEpeJGO657eACBrAiGh7G4','2024-01-10 04:23:12.253161'),(30,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODc3MDI5fQ.TXH-C12r8euXi5_cxf8MQdnFysZw6IB_E40KmPGc2-4','2024-01-10 04:57:14.343575'),(31,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODc5MjIyfQ.PgVdltZKG5z8Np7XRem1KcBdNVIXf0tZFvANS3qNbo4','2024-01-10 05:33:49.654278'),(32,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODc5MjYxfQ.wmo1BmxZrpeX466h30W510l9U8Y590nFnt11NFEIKG4','2024-01-10 05:34:31.863040'),(34,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODgxMDAyfQ.zlHJrCZ-xmghOATUMohEvXrkpg946nkYTz28PEF9lxU','2024-01-10 06:03:29.932344'),(35,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODgxMDU4fQ.u5B2FS1GuCYx_ZieqX1j7RNlnDDFjJO-mQV_K-oJj9w','2024-01-10 06:04:23.123120'),(37,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODgxMjUwfQ.J20dl-ifVCQYsfeavLwq0Dsi5CKE-ZtMfj33GydlmQI','2024-01-10 06:36:29.544820'),(38,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODgzMDA3fQ.YKubedkZZXmsVA15DDv275X_BJmAXxiH6OaVb4eb5Qw','2024-01-10 06:36:57.505860'),(39,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODg0NjkwfQ.A9IEFYcStVd9u4vZWlA2ZaQiTithmbCUYKKsBp19VoY','2024-01-10 07:05:22.486296'),(40,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODg0NzcxfQ.VOMVH2gTHJ0HGJkMdGqOA04H1cntsRXK6d3DANR9qnU','2024-01-10 07:06:18.861284'),(42,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDQ4ODU1MTUuNzM2MzAyfQ.1gVYH0Q0XTm5UQqGP64rPOhdf-Z0Bprqxnc7yrgs8FU','2024-01-10 07:19:34.601785'),(43,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODg1MDE5fQ.hNL-PApbgNkngLSNLGjtCYwzb7phRAVTMmQN5IW5JJw','2024-01-10 07:19:34.641842'),(44,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDQ4ODU1OTcuNTE3MjEzfQ.SDfDZNGWutxhG9JBvTMcoZ4c97j257Xq-VxZyWtbP7A','2024-01-10 08:17:14.137816'),(45,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODg1NTk3fQ.jBFNsqW_4CoeSQKMBCvCor3VcRVgwzHIPP3zb7U2mmo','2024-01-10 08:17:14.181023'),(46,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODg5MDQ4fQ.niTkkhdBZZ1kYTl9oE3cyFAfBFOoEImSUaivlzsMwbE','2024-01-10 08:31:19.288030'),(48,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODkyNzMxfQ.1pUnNxDd6oaKOeEqAk9o3pr1Iu2SBozQSPvy9iEvSUg','2024-01-10 09:48:18.513138'),(49,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk1OTYzfQ.voq5vPdoOXlJAp--5RrqNMq9n2_61LiR3s1EKwAA3K0','2024-01-10 10:12:48.427608'),(51,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk2MTY1fQ.5rng-ppHNWFVT1L_FSlEzqx-vpuDcpvEijDOLPyEJDc','2024-01-10 10:16:12.520313'),(53,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk2MTkyfQ.mQtcd59Ew7DUByZooPXds9iNatmMYrnR6mHKp_nY-2c','2024-01-10 10:16:45.197682'),(54,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk2MzI1fQ.g-vtJO3jL2_SWgN4KTFCtdfrQNdQJs_GUVuGeEkedrg','2024-01-10 10:18:50.889222'),(56,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDQ4OTcwNDAuMDQwNTc5OH0.bPzr-DmrcIBDh778xFq4bUWh1NlWpfq5NwPvRcWUiOY','2024-01-10 10:30:58.857757'),(57,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk2OTU1fQ.SF4NO9heMEHkjGzIFgXZB7De6iweLddIZVuCRfzT1_w','2024-01-10 10:30:58.891938'),(58,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk3MDcyfQ.fEj601gbqDw_4UaCYfXPeV1vgh8ArTyWrUIMWFNwAHE','2024-01-10 10:40:19.165576'),(60,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0ODk4OTA2fQ.lrqJuk9EzPt-kuos0ayiO_uF2KjSu2M42ZzsaaeLZWM','2024-01-10 11:02:13.250543'),(61,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0OTAwOTg2fQ.MVmcowpy9eLuiLxv9b75fkhn8P0sMF9GcFxCKssSBcw','2024-01-10 11:36:40.158992'),(62,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0OTAxMDQ2fQ.AFTnNrtMn-ZuEid13xmgcqwwLDPET45hfWOUqnEo0yk','2024-01-10 11:39:13.997755'),(64,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA0OTgwNjM3fQ.Y9hr2g5iY41-SNlDWcdGIYpW-4sQ_dhd920_vsziG4U','2024-01-11 11:16:07.028120'),(65,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjoiMSJ9LCJleHAiOjE3MDU5MTQ2MDl9.5FGisA2RywmZ7BPgcTYr6IHjRYV89JdRtvrR9SiOP0E','2024-01-22 05:10:32.959639'),(66,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDU5MTQ4NjkuMzIwMDYxMn0.-Qp-ZZe4vsN-sHekWvUvQqc5l5wYsq31deNh5N33bN8','2024-01-22 05:14:35.916184'),(67,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA1OTE0NjUyfQ.Z1haLHwRzJVKpMykZjQCWzoI5pDYERy5wF1RiQld5go','2024-01-22 05:14:35.970027'),(68,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDU5NTE3MTUuNzYyNTA2N30.drG4m8ajObDn8P5VuGYosyza0xb58LUV3Ww0ICNhf2U','2024-01-22 15:28:52.733961'),(69,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjoiMSJ9LCJleHAiOjE3MDU5NTE3MTV9.D8dlZZBOVK0YWlzk7XJN4g7ntHWDeGDmw1YjrRe0EUU','2024-01-22 15:28:52.773204'),(70,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDU5NTE3NDUuMDYxMzE1fQ.q_JOS5Pmp6_oYowvcPQ8hd_QOqTJ6wk-m7KYsiTEUcQ','2024-01-22 15:29:13.207744'),(71,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA1OTUxNzQ1fQ.CK6nmVk-q_4Sw4diVkfCCJ8PTMSY-BfUx4dA2B2X34Y','2024-01-22 15:29:13.276211'),(72,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDU5NTE3NjkuMzM0MTIzNn0.0AsFOQNDh3Lsk2zS7Cxih-h9j9rRBS3cZhheODqUR6g','2024-01-22 15:29:37.254451'),(73,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA1OTUxNzY5fQ.JoMn7bgq_LNLgy0wyBZRgOBaWvj0jH43lLizY-Yhw4k','2024-01-22 15:29:37.307576'),(74,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA1OTUxNzg5fQ.7caVcqnegAeT-sqXbRm2-c7b9gui2i_PhAzCy6OceZQ','2024-01-22 15:29:58.029444'),(76,'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6bnVsbCwibG9naW5faWQiOm51bGwsImluc3RfaWQiOm51bGwsInJvbGUiOm51bGwsImRlcGFydG1lbnRfSWQiOm51bGx9LCJleHAiOjE3MDU5OTc2NzYuOTg2ODI3Nn0.ubdwos6xu8c2mv6YUVFE1bLaPexUsCMYXFQA6LUS9Ic','2024-01-23 04:14:50.638523'),(77,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyRGF0YSI6eyJuaWNrbmFtZSI6IkE0IiwibG9naW5faWQiOjExLCJpbnN0X2lkIjoiMTEiLCJyb2xlIjoic3VwZXIgYWRtaW4iLCJkZXBhcnRtZW50X0lkIjo1fSwiZXhwIjoxNzA1OTk3Njc2fQ.k5xcQvL3PPcn9rabdtKRCUE1l8CrHLRwMasSMo79DUg','2024-01-23 04:14:50.691570');
/*!40000 ALTER TABLE `bridge_app_blacklistedtoken` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bridge_app_userpreferences`
--

LOCK TABLES `bridge_app_userpreferences` WRITE;
/*!40000 ALTER TABLE `bridge_app_userpreferences` DISABLE KEYS */;
INSERT INTO `bridge_app_userpreferences` VALUES (1,1,0,0,'11','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(2,1,0,0,'12','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(3,1,0,0,'13','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(4,1,0,0,'14','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(5,1,0,0,'15','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(6,1,0,0,'16','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(7,1,0,0,'17','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(8,1,0,0,'18','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(9,1,0,0,'19','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(10,1,0,0,'20','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(11,1,0,0,'21','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(12,1,0,0,'22','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(13,1,0,0,'23','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(14,1,0,0,'24','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(15,1,0,0,'25','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(16,1,0,0,'26','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(17,1,0,0,'27','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(18,1,0,0,'28','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(19,1,0,0,'29','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(20,1,0,0,'30','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(21,1,0,0,'31','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(22,1,0,0,'32','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(23,1,0,0,'33','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(24,1,0,0,'34','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(25,1,0,0,'36','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(26,1,0,0,'37','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(27,1,0,0,'38','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(28,1,0,0,'39','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(29,1,0,0,'40','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(30,1,0,0,'41','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(31,1,0,0,'42','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(32,1,0,0,'43','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(33,1,0,0,'44','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(34,1,0,0,'45','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(35,1,0,0,'46','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(36,1,0,0,'47','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(37,1,0,0,'54','',0,0,0,0,0,'Select Hour Format','Select Time Zone'),(38,1,0,0,'50','',0,0,0,0,0,'Select Hour Format','Select Time Zone');
/*!40000 ALTER TABLE `bridge_app_userpreferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `briefcase`
--

LOCK TABLES `briefcase` WRITE;
/*!40000 ALTER TABLE `briefcase` DISABLE KEYS */;
/*!40000 ALTER TABLE `briefcase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `certificate_data`
--

LOCK TABLES `certificate_data` WRITE;
/*!40000 ALTER TABLE `certificate_data` DISABLE KEYS */;
INSERT INTO `certificate_data` VALUES (11,'test cer','landscape',''),(12,'tes2','landscape','');
/*!40000 ALTER TABLE `certificate_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chatdeleteforme`
--

LOCK TABLES `chatdeleteforme` WRITE;
/*!40000 ALTER TABLE `chatdeleteforme` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatdeleteforme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chatgroup`
--

LOCK TABLES `chatgroup` WRITE;
/*!40000 ALTER TABLE `chatgroup` DISABLE KEYS */;
INSERT INTO `chatgroup` VALUES (4,'test group','vdvddv',NULL,'2023-11-03');
/*!40000 ALTER TABLE `chatgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chatpagepermission`
--

LOCK TABLES `chatpagepermission` WRITE;
/*!40000 ALTER TABLE `chatpagepermission` DISABLE KEYS */;
INSERT INTO `chatpagepermission` VALUES (1,'15','11','Everyone','readOnly','chatPage');
/*!40000 ALTER TABLE `chatpagepermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,'11','12','hii?',NULL,NULL,'2023-11-02 09:58:34.000000','Edited',NULL,NULL,NULL,'1','1',NULL),(2,'11','12','44','file',NULL,'2023-11-02 09:59:32.000000',NULL,NULL,NULL,NULL,'1','1','userfile'),(3,'11','12','Shivani_Sharma.pdf',NULL,NULL,'2023-11-02 10:05:15.000000',NULL,NULL,'good','yes','1','1',NULL),(4,'11','12','45','file',NULL,'2023-11-02 10:08:57.000000',NULL,NULL,NULL,NULL,'1','1','userfile'),(5,'11','12','Django Task (1).docx',NULL,NULL,'2023-11-02 10:09:12.000000',NULL,NULL,'nice','yes','1','1',NULL),(6,'11','12','46',NULL,NULL,'2023-11-02 10:17:05.000000','Edited',NULL,NULL,NULL,'1','1','userfile'),(7,'11','12','C:\\xampp\\htdocs\\latest\\TOS',NULL,NULL,'2023-11-02 10:20:22.000000',NULL,NULL,'ok','yes','1','1',NULL),(34,'11','12','53','file',NULL,'2023-11-03 10:06:05.000000',NULL,NULL,NULL,NULL,'1','1','userfile'),(35,'12','11','hii',NULL,NULL,'2023-11-06 13:08:40.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(36,'12','11','57',NULL,NULL,'2023-11-06 13:14:50.000000',NULL,NULL,NULL,NULL,'1','1','userfile'),(37,'11','12','hii',NULL,NULL,'2023-11-06 16:36:54.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(38,'12','11','hello',NULL,NULL,'2023-11-07 11:11:37.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(39,'11','12','hii',NULL,NULL,'2023-11-07 11:13:18.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(40,'12','11','how r you?',NULL,NULL,'2023-11-07 11:14:36.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(41,'11','12','11',NULL,NULL,'2023-11-07 14:44:00.000000',NULL,NULL,NULL,NULL,'1','1','page'),(42,'12','11','64',NULL,NULL,'2023-11-07 14:50:43.000000',NULL,NULL,NULL,NULL,'1','1','userfile'),(43,'12','13','hii',NULL,NULL,'2023-11-07 14:51:49.000000',NULL,NULL,NULL,NULL,'0','1',NULL),(44,'12','11','hii',NULL,NULL,'2023-11-07 17:02:38.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(45,'12','11','hii',NULL,NULL,'2023-11-07 17:04:13.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(46,'11','12','hii',NULL,NULL,'2023-11-14 16:41:36.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(47,'11','','69',NULL,NULL,'2023-11-16 15:31:05.000000',NULL,NULL,NULL,NULL,'0','1','userfile'),(48,'12','11','hii',NULL,NULL,'2023-11-17 12:30:33.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(49,'12','11','hii',NULL,NULL,'2023-11-17 12:31:01.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(50,'12','11','hii',NULL,NULL,'2023-11-17 12:39:22.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(51,'11','12','hii',NULL,NULL,'2023-11-17 12:57:46.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(52,'11','12','hii',NULL,NULL,'2023-11-17 13:14:12.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(53,'11','12','varun',NULL,NULL,'2023-11-17 13:14:26.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(54,'11','12','mishra',NULL,NULL,'2023-11-17 13:15:35.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(55,'11','4','hii',NULL,NULL,'2023-11-17 13:17:27.000000',NULL,NULL,NULL,NULL,'0','0',NULL),(56,'11','12','hii',NULL,NULL,'2023-11-20 16:29:33.000000',NULL,NULL,NULL,NULL,'1','1',NULL),(57,'12','11','hii',NULL,NULL,'2023-12-13 10:52:42.000000',NULL,NULL,NULL,NULL,'0','1',NULL);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `check_sub_checklist`
--

LOCK TABLES `check_sub_checklist` WRITE;
/*!40000 ALTER TABLE `check_sub_checklist` DISABLE KEYS */;
INSERT INTO `check_sub_checklist` VALUES (1,'4','3','29','1'),(4,'4','4','29','1'),(5,'5','6','29','1'),(6,'5','5','29','1');
/*!40000 ALTER TABLE `check_sub_checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `checklist`
--

LOCK TABLES `checklist` WRITE;
/*!40000 ALTER TABLE `checklist` DISABLE KEYS */;
INSERT INTO `checklist` VALUES (4,'checklist 1','1',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 16:34:06','#f00a0a'),(5,'checklist 2','1',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 16:34:06',NULL),(6,'checklist 3','1',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 16:34:06',NULL),(7,'checklist per 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-04 14:08:30',NULL),(8,'checklist [er 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-04 14:08:30',NULL),(9,'checklist per 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-04 14:08:49',NULL);
/*!40000 ALTER TABLE `checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `checklistfile`
--

LOCK TABLES `checklistfile` WRITE;
/*!40000 ALTER TABLE `checklistfile` DISABLE KEYS */;
INSERT INTO `checklistfile` VALUES (1,'1','4');
/*!40000 ALTER TABLE `checklistfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `checkonline`
--

LOCK TABLES `checkonline` WRITE;
/*!40000 ALTER TABLE `checkonline` DISABLE KEYS */;
INSERT INTO `checkonline` VALUES (153,'31','online'),(162,'34','online'),(231,'16','online'),(286,'36','online'),(337,'13','online'),(342,'11','online'),(344,'12','online');
/*!40000 ALTER TABLE `checkonline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `checktyping`
--

LOCK TABLES `checktyping` WRITE;
/*!40000 ALTER TABLE `checktyping` DISABLE KEYS */;
/*!40000 ALTER TABLE `checktyping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class_documnet`
--

LOCK TABLES `class_documnet` WRITE;
/*!40000 ALTER TABLE `class_documnet` DISABLE KEYS */;
INSERT INTO `class_documnet` VALUES (1,'1','test','Data Analyst Questions (5).docx','docx','11',NULL),(3,'1','test','80',NULL,'11','29'),(4,'1','quiz','81',NULL,'11','29');
/*!40000 ALTER TABLE `class_documnet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `classfilter`
--

LOCK TABLES `classfilter` WRITE;
/*!40000 ALTER TABLE `classfilter` DISABLE KEYS */;
INSERT INTO `classfilter` VALUES (6,'sim','qual');
/*!40000 ALTER TABLE `classfilter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clearance_data`
--

LOCK TABLES `clearance_data` WRITE;
/*!40000 ALTER TABLE `clearance_data` DISABLE KEYS */;
INSERT INTO `clearance_data` VALUES (1,'1',NULL,'','1'),(2,'2',NULL,'','1'),(3,'3',NULL,'','1'),(4,'4',NULL,'','1');
/*!40000 ALTER TABLE `clearance_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clearance_student_id`
--

LOCK TABLES `clearance_student_id` WRITE;
/*!40000 ALTER TABLE `clearance_student_id` DISABLE KEYS */;
INSERT INTO `clearance_student_id` VALUES (1,'1','29','2','actual',NULL);
/*!40000 ALTER TABLE `clearance_student_id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clone_class`
--

LOCK TABLES `clone_class` WRITE;
/*!40000 ALTER TABLE `clone_class` DISABLE KEYS */;
INSERT INTO `clone_class` VALUES (1,'1','14','actual',1),(2,'4','18','actual',1),(3,'4','29','actual',1),(5,'1','29','actual',1),(7,'5','29','actual',1),(8,'6','29','actual',1),(9,'7','29','actual',1),(10,'5','29','actual',2),(11,'7','29','actual',2),(12,'5','29','actual',3),(13,'6','29','actual',2),(14,'5','29','actual',4),(15,'6','29','actual',3),(16,'1','27','actual',1),(17,'6','27','actual',1),(18,'7','27','actual',1),(19,'4','29','sim',1),(20,'5','29','sim',1),(21,'6','29','sim',1),(22,'7','29','sim',1),(23,'8','29','sim',1),(24,'9','29','sim',1),(26,'11','29','sim',1),(27,'12','29','sim',1),(28,'13','29','sim',1),(29,'14','29','sim',1),(30,'15','29','sim',1),(31,'16','29','sim',1),(32,'17','29','sim',1),(33,'18','29','sim',1),(34,'19','29','sim',1),(35,'20','29','sim',1),(36,'21','29','sim',1),(37,'22','29','sim',1),(38,'23','29','sim',1),(39,'24','29','sim',1),(40,'25','29','sim',1),(41,'26','29','sim',1),(42,'27','29','sim',1),(43,'28','29','sim',1),(44,'4','29','actual',2),(45,'8','29','actual',1),(46,'2','29','actual',1),(49,'1','29','test',1),(50,'2','29','test',1),(51,'1','29','quiz',1),(52,'2','29','test',2),(53,'1','29','test',2);
/*!40000 ALTER TABLE `clone_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cloned_gradesheet`
--

LOCK TABLES `cloned_gradesheet` WRITE;
/*!40000 ALTER TABLE `cloned_gradesheet` DISABLE KEYS */;
INSERT INTO `cloned_gradesheet` VALUES (1,'29','1','1','1','actual','12','1','12:20','2023-11-29','','','U','20',' cdcwv','\r\n              \r\n                                      ','1',1,NULL,'1'),(2,'29','1','1','2','actual','12','1','10:43','2023-11-30','','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `cloned_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `course_cal`
--

LOCK TABLES `course_cal` WRITE;
/*!40000 ALTER TABLE `course_cal` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_cal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `course_color`
--

LOCK TABLES `course_color` WRITE;
/*!40000 ALTER TABLE `course_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `course_in_department`
--

LOCK TABLES `course_in_department` WRITE;
/*!40000 ALTER TABLE `course_in_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_in_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `coursepermission`
--

LOCK TABLES `coursepermission` WRITE;
/*!40000 ALTER TABLE `coursepermission` DISABLE KEYS */;
INSERT INTO `coursepermission` VALUES (1,'22','12','11'),(2,'22','13','11'),(3,'22','15','11'),(4,'22','36','11'),(5,'22','37','11');
/*!40000 ALTER TABLE `coursepermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ctppage`
--

LOCK TABLES `ctppage` WRITE;
/*!40000 ALTER TABLE `ctppage` DISABLE KEYS */;
INSERT INTO `ctppage` VALUES (1,'Driving School Advanced','DA','Driving','1','66555-1607-new-microsoft-powerpoint-presentation-(3) (6) (9) (5) (1).pptx','UAE Driving School','Alkarama Branch A','To qualify drivers to drive',4,'ah','6','',100.00,'1','#1aff1d','Car'),(2,'Driving School Beginner','DB','Parking','1','gradesheet.sql','UAE Driving School','Abu dhabi','To qualify drivers to drive',4,'dfghj','7','Hello',NULL,'1',NULL,'Car'),(3,'Python Class','PY','Parking','2','hashoff (1).sql','UAE Driving School','Abu dhabi','To qualify drivers to drive',4,'hekk','8','kdks',NULL,'1',NULL,NULL),(4,'Science Class','SC','hdkhs','1','gradesheet (1).sql','dsjkhdk','Abu dhabi','To qualify drivers to drive',4,'fghj','5','kdks',NULL,'1',NULL,NULL),(5,'Math Class','MA','Parking','1','folders.sql','driving school','Abu dhabi','To qualify drivers to drive',4,'hello','6','Hello',NULL,'1',NULL,NULL),(6,'test shop','ts','ts1','2','Sandeep_Kumar_Resume_Software_Developer.pdf','Mr.varun','prayagraj','NA',200,'NA','5','Without Goal',NULL,'1',NULL,'BMW'),(8,'test CTP','TC','test','2','Data Analyst Questions (5) (2).docx','varun','allahabad','NA',200,'na','3','Without Goal',NULL,'1',NULL,'Honda');
/*!40000 ALTER TABLE `ctppage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `deconflicterdata`
--

LOCK TABLES `deconflicterdata` WRITE;
/*!40000 ALTER TABLE `deconflicterdata` DISABLE KEYS */;
INSERT INTO `deconflicterdata` VALUES (6,'','',5,NULL,'2022','Friday','2','exclude'),(7,'2023-12-15','2023-12-25',10,NULL,NULL,'Tuesday','10',NULL),(8,NULL,NULL,5,NULL,'2023',NULL,NULL,'exclude'),(9,NULL,NULL,7,NULL,'2024',NULL,NULL,NULL);
/*!40000 ALTER TABLE `deconflicterdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `deconflicterdepartment`
--

LOCK TABLES `deconflicterdepartment` WRITE;
/*!40000 ALTER TABLE `deconflicterdepartment` DISABLE KEYS */;
INSERT INTO `deconflicterdepartment` VALUES (1,'1','6','linePerDay'),(13,'1','5','unPlanned'),(15,'1','7','unPlanned'),(18,'1','8','linePerDay'),(19,'1','8','unPlanned'),(20,'1','9','planedLeave'),(21,'1','10','planedLeave');
/*!40000 ALTER TABLE `deconflicterdepartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `desccate`
--

LOCK TABLES `desccate` WRITE;
/*!40000 ALTER TABLE `desccate` DISABLE KEYS */;
INSERT INTO `desccate` VALUES (1,'Descipline 1','60','2023-08-23 16:15:05'),(2,'Descipline 2','70','2023-08-23 16:15:05'),(3,'Descipline','80','2023-08-23 16:15:05');
/*!40000 ALTER TABLE `desccate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `digramtable`
--

LOCK TABLES `digramtable` WRITE;
/*!40000 ALTER TABLE `digramtable` DISABLE KEYS */;
/*!40000 ALTER TABLE `digramtable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `discipline`
--

LOCK TABLES `discipline` WRITE;
/*!40000 ALTER TABLE `discipline` DISABLE KEYS */;
INSERT INTO `discipline` VALUES (1,'2023-08-08','11',NULL,'Descipline Marks','60','29','1','users (1).csv','csv','1'),(2,'2023-08-18','11',NULL,'Hello world','80','29','1','Gardening Dep (2).xlsx','xlsx','3'),(3,'2023-10-09','11',NULL,'hi','60','14','1','test_updates (2) (1).sql','sql','1'),(4,'2023-10-09','11',NULL,'hi','20','14','1','test_updates (2) (1).sql','sql','1'),(5,'2023-10-09','11',NULL,'bye','60','14','1','document_test (2).sql','sql','1'),(6,'2023-10-09','11',NULL,'bye','30','14','1','document_test (2).sql','sql','1'),(7,'2023-10-09','11',NULL,'bye','7','14','1','roles (2).sql','sql','absent'),(8,'2023-12-12','11',NULL,'check','60','29','1','82',NULL,'1');
/*!40000 ALTER TABLE `discipline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `discipline_data`
--

LOCK TABLES `discipline_data` WRITE;
/*!40000 ALTER TABLE `discipline_data` DISABLE KEYS */;
INSERT INTO `discipline_data` VALUES (1,29,'90');
/*!40000 ALTER TABLE `discipline_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (1,'devision 1','#c01616'),(2,'devision 2','#9aae0a'),(3,'devision 4','#9aae0a'),(4,'devision 5','#9aae0a'),(5,'devision 5',NULL),(6,'devision 6',NULL),(7,'devision 7',NULL);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `division_department`
--

LOCK TABLES `division_department` WRITE;
/*!40000 ALTER TABLE `division_department` DISABLE KEYS */;
INSERT INTO `division_department` VALUES (1,'1','1'),(2,'1','2'),(3,'2','2');
/*!40000 ALTER TABLE `division_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `django_session`
--

LOCK TABLES `django_session` WRITE;
/*!40000 ALTER TABLE `django_session` DISABLE KEYS */;
INSERT INTO `django_session` VALUES ('25nm7gesyuie50bxcgdczxa3du67z4ft','.eJxVystSgzAAQNF_YW-nocBM3HV4xMQWbFqeG4dEsCEhPghS2vHfZeXo8t45N6ubzLN5k4227q1mJmeGuEgEwekVg1jgAWvqch97WL4XmU_gakGA29lMUbQuj9hbeqzz-JP1kamWZjobmD8JhqCuc7et84NIehcwNA24VyPf0P9Pky-G0j-GKo6i-QUBxTRtj7_2Anc-Uc3DViRduNkHKYhPr04cbMd9V9rJ6eDExXplXEnkXGQmys_1le-eHicipA7bynZgGFy61FN3JYw-qsH6_gG10lZL:1rQI1M:AP1tq5HSurnm3zpOUhesllthYd84J-GTZWXCf0_TwGM','2024-01-18 03:20:44.728488'),('4pign6usym4vtyy56t2pe8vn6nb9qx0e','.eJxVz9FOgzAYhuF74QKWFQSDZwsbv20EQldgeLLQAlu30qlQAY33Po6MHr5fnpPv27qMw3G4XRttPVnNTM4chEwkwdkXRrHEPdbUFQH28PXtkAfEXy0ICTufKYTrco-9pU1VxB-8C4fXpbnOex6MkoOvq8JtqyKVSeciDmOPO2WEQ_9vmnxyyP4YqgSEcw1IcU3b_a-d_JeAqOZ5I5PLzom2mRux9CFhJxOzkxNvM6dNV6EH-JEbaspKUShtm7V1PZTTcul23PEJ3MM52rwzZK-tnztXiVWR:1rRn6k:quL2QZ4XSNioaOYP_GKOFJUgYeqByNGEUJjab95rfUw','2024-01-22 06:44:30.177934'),('55uobsw04bykwdvxlakkya2vp49vgj9x','.eJwdjdtugjAAht-FBzAtnsbucKtYxBoQaenNQhsqBUS3sJSy7N0Hu_u__Kcfpzb9R_9oys55dUobgpL5-qzDYwZjHb2FlQjkzPg6Ykh06C2mEJRuZpNgD_IL3kz8XVDyJe77nk-MGwSwNloEXlfQtSporM81Gqaxp-gIYG7b4PqhTymaD6xwh3ZmucwMZ_iW06Qv6Gr2Gs52leySntM1YOC_B9XFaM4qM-mBjD48vV9XZIyhihdbF93L0HjblJho-OTYvkRASSUP9pgGbe2DJ975OVgekPP7B82nVGc:1rOC4I:zCCm-Gb93W07qo-sOe5S7mSXVOJhamyRfTZ8Ka-_E-Q','2024-01-12 08:35:06.380637'),('57avxdij2igadpn19lsuul6n8w3byiz1','.eJwdjd1OgzAYhu-Fc5e2wpJ5xpSRMoEBjpaemLaCfDCZWboUMN674Nn75P37cTpr3s21rwfnyamnCNXchxSiY4kzeH2OWhXqlel5pjiBaLdZQliTcsrDA6oKul34LllyU18HIxamfYAoWFDhbpDMayTLIO2CcRn7VkOCOLn0tLtC_BasB5Mi42Vl_VhawelnxXIjmbt6veD7Vg-5EcxDHP33cFNYELy1ix6T2cfJiybx7LtNtjkFHySK0QPWtYSiyKG6VW4Xk1PaWhd5dn9mo2mO93DrO79_v8lUYg:1rPx9o:jY8FfM5w5vZsfADMCKmVAHDr_EriZBZyi1Kiddn_pSo','2024-01-17 05:04:04.222721'),('5gimjg79wu67fejrsejt9ntsc3ey1tws','.eJxVyt1ugjAAQOF34QEM1WBS71w3ahstESnobgztQAqlbuOnlmXvPq6W7fKcfF9ebftrf28K4228wtFKYKkiRQmfCGCKdMTEgURkTZr3c4ooXMwIyGXqYhz6lxNZzz3kGfsUbdi_zi1M2glklcDQ5FlQ5tlRRW0ABLYdafUgV_H_Z-goMP9jYi1x6N4w0MLE5enXPuAeUV3stiqqX1aHZw4OSTOxRA6sPgYsuU3Rzl_QR2-S69OtR9nAtx8clv7IE7BUHGi7Z7BC4Yhs5c7u4n3_ANspVzU:1rQ87G:RRfRJODZtxBnspLXL1KV45kXmJSN1j-I4B2I4z3-Elo','2024-01-17 16:46:10.468883'),('6mom11cqouq4m844v133e807zvmu696i','.eJxVjU1ygjAYhu_CAZykWqd2h1jil5ZQQwVhw5AYxyikTosgcXr3humqy-f9vXunvi3bz7My3rOnBorUztexpq8p3ui3gB4FkSPD1gJmmi4mLoTlQzpwEqI8gbnja5WxL9GEbeEYzi8IdK8FWZgqezxU2cYNwC1K4Bua-iqn_L9maCfIdjyx-92ylnp5LAi-CD3meS1JOOwJroXhh-Svh8Eg56UzGcA8-pA9O_k9sxJHazTJWWxXjFeqeIdL1zFQt3wF06ZQZayGJNWzcv0U-JZkkffzC75BVxw:1rSAzM:zE9GiXluFz8f5GYCTiIzBVP4yf-74Xbq_GcOwBJo3vQ','2024-01-23 08:14:28.310237'),('6xkfu82lc1x56uya09pxp3zdy6dvuwr7','.eJxVjctygjAUht-FB3CSYm3tTh2IJxWo3IJsHBKhRDAyFptCp-_eMNNNl99__bbOuj_216ZU1otVDhSV2UoGkr6meC93G1pzIiaGZATsS7qcmRAWD-kQEhcdIlgYvhfMv_GL2-eGoXEQSC05WaqCPVYF25sB-PIi-IBLexd2-F9T9JOTZDoZT9m6FXJd5wR3XE75sBXEHU4Et1yFVfTXA4WMl87FBhZeLLR_PsyDONFBhmaMP8VQpzQQb1XnaMo8x0b5bSTXVdOpPHreevY7dXaMCOvnF8BfVtY:1rV2D7:McE-N7SmYDti084Xw3MJ_4GZ1i6Dj8daUfJIV2xlIxc','2024-01-31 05:28:29.205901'),('7u71cu7kfysjk95dt7e6brraur1zarpf','.eJwtjU1PgzAAhv8L9y3lY5v1xqRlRccEhAIXQ0kdBaRmqWFg_O-2iYf38OT9-rH6Wb0rOfDJerT4EgFe-uIioufCTsTLU9SxsDVM8pXYsYjgVofs1imWNMSgyshe83dD4xv7xKrWTAYEiJgFC-HU0N1HQxNx6dFdj32xKQalMw6kl-L8hszBwpz7aLh1i7kuybWiqWqoZ7yhLo9dO6WqpjtQgv9eFkHtjfzkm133HOROvPpaGG6l-3CD-cx8eQDzFcvuFQPBDxXLgYc2-012XJMg8OgJAev3DyzmU0U:1rQl72:u6G_rX0GzFpUl8UsR3eRv3qt-Jk2k-edDJIUMmq54Es','2024-01-19 10:24:32.626045'),('awgzmdimyhthg26b9ukx930vl3e0teib','.eJxVyk1PgzAAgOH_wt1FIMXgTeuorQLSAZ27GFpBC22n8lGY8b_Lyczj--b5dlo7vAzHrjbOtVMv5J0jIVNJcHHCbiJxjw0FAuIAdx_7EpJwsyJXeOVCUXT5vMPB2mPFki-uo-GwNjdlz6GVHIWmYqCpWCZTDVyObI-1GoVP_z9DJo6KM0OVQNHyilzFDW12f3YOHyFR9f2NTNutH98VIM3f5iQXY5p3XnzK_CbbQNRoatTTxV5ParbCPkxo8q5MazA--regBywOPtWBs8L5-QWQBVcD:1rS8jh:7XxOzfp0dK0T6xmhAgrIZ0ZDFamxHvuwlGF6AgzYZEI','2024-01-23 05:50:09.370532'),('bb9hoh0jayryyt08yid2hc6aqi35bfzr','.eJxVyt1OgzAAQOF34QEWfsIU70g3aqsM7UaB3RhaWCyUDoXCqPHd5cro5Tn5vqxmHt_Ga1sr68GqF_zOIBeJwCg1yDkINCBFfA7QFrV9TgEONityuEsXAiO7OKLt2rrMDp-si8bz2kzRgYFZMBioMvMvZfYqks53GJwH1EnNPfL_KTwxmP4xRHIYLRV0JFPkcvy1t-AZYFk_hiJp9l68S-3YFF5y2uvYhG5suIlze_PiTlVNMTwN010xZ2j54G0PGldH-Xn3dG36aib3VJY3HVrfP9mIV5w:1rPmgL:xN4-5eN9kskva7QSK9J-u7RKVQaH1VEUNFGJU6IDjwg','2024-01-16 17:52:57.597465'),('cl47w2ki7ig6amkuanesk52gz990ac4i','.eJwtjUtugzAARO_CASKbfBp3R1tCTAopELDxJsLIBfONKlcOrXr32FKXTzPz5tfptLqquReT8-yIJQSCevIsw1MBE_n-GrY8qC3j_AfDWIZoZUqwdoslDQ6gzPDO8HdF4i8-HhQzjHsfYKklD9BUke1nRRJ57vy7kd34FAPqDj3uZhldfHuwcPc-WK7XhWYUNyVJVUU2NusZfWnrKVWMbAEF_7ssRCYbxNGz3nX0lkPj0lGXohVL9sdTmZFm0I1eIMdz67E9dP2PcdyJy-2K0FNWJ5t87J2_B0UoVJk:1rQ5bX:Bgo_zSDN1BICti26BucV2aQ96_tVwErj6aIDpDvwZGI','2024-01-17 14:05:15.124080'),('fd5bodxjc029zc465xqu6gpktox15op9','.eJxVysFOgzAAgOF34c5Ch0XxtqGtbQZ1rMDYhdDKYqFUIiBji-8uJ6PH_893s-ppKIaPpjLWo1XN9F1gqZiiJLkSECnSExNDGRCPNN0xDai_WhCQ63SOMXLyA_GWHsss-hQtGk5LC5P2IpiUwL4pM3gus71iLQQCTz1p9Sjd-P8z9Evg5I-JtcRofsNACxOfD7_24u8CqquXjWL1sxs-JQ7j8o7xfGR8D0O-AZHrrOxX2GridYrZNupCujvW8ynjACK1vj7c98Yrou22uRRdbn3_AIPOVSs:1rQ345:B0Ohun8dCPWWjJSxYQz_QCEANTlfjt8LpLCVwXMllX4','2024-01-17 11:22:33.138210'),('gba0m3dsa43dqlbjisx1wmlglyq0j8nj','.eJxVysFOgzAAgOF34QEWYMKCt6WDro3Q0Qk4LoZWlrWFTgUsnfHdx8no8f_zfTvSjK_jVbXaeXRaiy8MckEERsUNeZlAA9I04ACFSL2_lABHqwV53C8thYl7OqJw6ampsk_WJ2O9NNPlwIARDEa6qYJzU-WC9IHHoBlQ3018Tf8_jb8YLP4Y2nGY2DfodUzT8_HXztETwF273woi43W6O5lU5jbbqYk8F0Eqt262d1cfm_m28WMJ0hgf7DzWhVL1A0lUFRp_yv2DW-v8AtroqpyfO8qeVoc:1rSF6C:_aGz3hVAqURvE53m6DAzhZ41N2Kx-3InvIL8GJYi2qA','2024-01-23 12:37:48.059482'),('hlldckmvqkdujsvxx1gptuspibvi0ezs','.eJxVysFOgzAAgOF34QEWKusSvC1ldO2QYmdhcFloB7Gj1CkgMOO7y8no8f_zfTnXsT_3b01lnUenmumrxEozTYm4ExBr0hHLoUJkQ5rbKUXUXy0IqId05jh08yPZLD2UWfwh27AvlpY27SQatcS-LTNYl9mzZi0EEo8dac2gPP7_WfopsfhjuFE4nC8YGGl5ffy1kx8haqr9VrPrznsKxJ0FArKgGeJgO8UvZB3v3dUZqdPByyEskqJZ86HqjFuwXEcR9MEuT0t4S8T0XntJ43z_AKNGVa8:1rPZ3e:E4epdRbk786qAlRWg2bQ-IgB0N0bP0sLFW-kOS3vMo8','2024-01-16 03:20:06.389738'),('jy8l9gjae2hm0pimfwz6nfx3kp1qi8mz','.eJwdjd1OgzAAhd-FB1gKCgbv0AArmyBQaNcbQzsYpQjGdClgfHeLd-fL-fuxBq0-1CzbyXq22jUBLQlEJpJTbefi_Jr0LOY7w2qDdioS_2BCNnfqtYgjcCmhZ_je4PSbfUaKGoYyBFBowWJ_arDbNTgX2RAuZuyLTSkgzijhMIs3FO4HK3OWcWf-UGtK4O2CC9Xgx92TlLz0fCoUxS4g4L9nd6UWlPTa6CXdApAh7mQo3Lr8cEegOuas5EcceOOwUsGe2gi9X0MPSaxOUTV7V-VK2-fW7x_eXFUQ:1rNqdS:bHKB9Pwh2xvFG6S8sWwvbARngFKD_melJGL5WWLKNpo','2024-01-11 09:41:58.416337'),('kfdmcuzt7pca1h0vok90wpo1gov2p2ys','.eJxVyk1PgzAAgOH_wt2llY-It6VAaTNo-HZeDO0g64AqAnbM-N_HyejxffN8Gxc9v83vXaOMZ6NZ6ZljIZmkpLgRGEsyEZXaAhGHdB8vJaLubkNQPJZrigNwzIiz9VJX8Scfgvl1a67KiSMtOXZVXdltXSWSDTbkWE9k6Bdhpv-fol8cF39M2gscrCcMe67SNvu1V_eAaN-Ee8kuvhl5BYy8o47zYmE5saK8AywEu1OdQAvxgzcC06MZbhNrfHIkediPNxrB-Uyl9sMAXYFv_NwBjQtU7g:1rQ4I0:9rdIz4uUgP9R8cd0uJaJKqchtKHQWglXrfagwqaWU5s','2024-01-17 12:41:00.632852'),('kw3a912zvkpm7g6xrybjmferon6c1rd7','.eJwdjdtOgzAAht-FB1gKUjO8mwpN2YDAgJbemLbhUNhATZcCxncXvPu__Kcfqzf6Q09DPVovVr2EoKYnlajwXNqpuryFnUByZ1ys2I5V6B22kC2dcslQAKorft74wUn8Le6BZhvjwQdYGSWQN3ICG05SlfT-vI19ijEG1LkNuJ9UlPv7wSKc-bazfCoNo7itSKY5cXdvYPS1k2OmGYGAgv-e3VyNYrQzm57j9QSSvHWjXq5NerClRpCPGUgY_ALnChaPtHTvy5Kj9uiZ6r2uggi1RUEm6_cP3bRVJw:1rNudf:4jCqAqk8jbFP8foouJ-hZ96P4PMfxn2P7yFfbhLFWlc','2024-01-11 13:58:27.784636'),('lsmxepvrq6bdxkdfu0k03xyxts6jttok','.eJwdjUlugzAARe_CASIDJVK6I4lBhgBlCDbeRBhBbUxMVdEyVL17TXf_6U8_Rj9Pj2mUrTJejXYNQEtckYggLM1U3C4BZ36zM7pvyIxFcDrokNlY5Zr5HqhydNT8VeP4kz29iWpGEgIkZsH8k6qx09U4FUkPFz32wVQMiDVI1I8iKuB-sDJrGXZu7HKmBL1XOJtq_LJ7kpIzb1Q2UewAAv57ZpfPghI-a73EmwuSK7SjwrW79PB9z5O3a8WUM575kcpLxJ9BOBZ5nNoPKEsZ8s2rboMDoPH7B8ofVKE:1rNB46:rwe1SPAZuC69_lU3VKWOhRk4rZPGjIQvRW30weSk5Vs','2024-01-09 13:18:42.885508'),('mx5xly97npswbfzers8vhodz8ql7f515','.eJwdjdtOgzAAht-FB1haGCZ4N5RhOXRybOnNQglIoYJxVeiM7y5493_5Tz_GsKirmsd2Mh6NVgegpSdxEUFYwkRET0HP_WZnVNwRxCJwDlsINmapU_8Mqgw9bPxVE_zJ38-KbYxGDyCxCO47U03sriaJuAzeuo198AkDasoRDbOIc28_0Nxc5c6NVS6MoreKpKomx90bGXX7ZkoVIzag4L8Hu2wRjPbLpld8P0GcVxbOY7tLDrNVvMLKIULLXmbR1ZK3IYyVW9iufD6-RGGv89S_-d86MX7_ANNTVSM:1rQKHc:XwjFg_o_hoG2jIv3bGQHaBt03X5EZHH1q9SaE_kAIns','2024-01-18 05:45:40.763281'),('ogwonte1ihlbh07kc04iqttr7fpvn14x','.eJxVyt1OgzAYgOF74QKWAWOKZ0s3uo-MIhCK7mShBWILVOV31HjvcmT08H3zfBlyHm7De10q48koF_-NYS5C4UOqwSQCelCxwxHsof54och3NysyuUWXGHvb1wT2a495RjrWesN1baZoz9AsGHZVnjlVnkUibB2T4bmHthm5Hf9_yp8YTv-YuOHYWwpsNkzFVfJr7-4F-U15PohQnuzgGDlEHmai65EcQQc60sTebgp4fjjXj7SbpBnI2-6zQCm1pns1NpLTybpYRRLWuezcnfH9A93eVyw:1rNmVO:aWPMWiWdpxqmGprHWybg6Vigd3U6nwXDpY5r1tWOuMc','2024-01-11 05:17:22.852233'),('oo1pprjw3hroksc1z4tn98i90a5uc57x','.eJxVyk1ygjAAQOG7cADHQGOb7pRKTDQwRH6qG4ekoNEQmRJK0endSzeddvm9eXfn3NuDvV5K4zw75UBPAksVKUrSGwGhIi0xHEqfzMilec18iibjBKSbDRwH092WzEZ3RR6-izqw-9HCZK3weyUwMkUOqyKPVVRDIHDfklp30uP_m6EfAqd_Hq4lDoY3DLQwvNr-vp9o41NdruYqOi899pJOWXIELGFdmPw4vlXxRCO7ZE_ro-eaRbCzjZQ8pyfPBQ_wulih9aZ5RPu2hwd37nx9A0S8VLU:1rPiDr:v3-T_bYIyjn1aJeN717EzwmeaRlgQHVGk1a0vPo_Mog','2024-01-16 13:07:15.456303'),('ubbqc0d2fvv8hsft6n8hclf0f3ogytg5','.eJxVysFOgzAAgOF34QGWQcMM3gxCbTOKlhSUy0Ir00KpxMK61vjucjJ6_P98X8Fgl9PyMfY6uA16h985FLKUGDGPQiKRQZrGIkUHNM7PdYqT3YZCEdWOwnz_UqHD1mvXkE8-5Uu7Nde14amVHCa6a-Jz1zzJcopDDq1Bk1oFoP-fxhcO2R9DlYC5e4Wh4pqeq197TY4pVv3DnSyHDBT3zJJhjAov1sIzRwbkCdjv1GNjvW0zdwHkBkSVmpd0nk5tUmpSm55duyOEbzjDzATfP__DV8s:1rOFe9:p6ZDwTRdzFyAELC5KCZ4Qoz-Gj09PwKpenMXeh2RJN0','2024-01-12 12:24:21.107828'),('vslb65jslwp2l1x3whsf035ntfa4huqo','.eJwdjd1OgzAYhu-FC1gKA5N5hhuD4oDANlp6YqAp9gMsU1HKjPdu8ex98v79WN08vUxjL5T1aIklRoL6kEH8XNo5nPaxbEK-Mr7esZ1CvNuYkM2dcinCI6rO-MHwV03Sj-btODHDuA8QhhmacKdq4rU1ySHrAm3Gbo1KEXWGHncjJJdgPVgaRw8r8205M4pfK1JMNXFXr2f0SXJVTIx4iKL_nt2eZ2BUzkbr9O6j7MB1csndNt-gQ8X8fSQRl0Nkv38HJ8cV0RhGjsDCUwt0t62u6DXRn9bvH8y8VRM:1rNP82:I-2s9OxmTv9v8c1uzgZpOqKbdZAQeFwI8xDQEwXogKw','2024-01-10 04:19:42.618855'),('x0wzzlso4imw0n5j51dswvdt7kv4toty','.eJwdjd1ugjAYhu-FCzAtDpPuDAeysoEDtS2cGFpBPiqwLSwFF-99sLP3yfv3azVmOA-9Ljvr2SqnEJXChT2Ebwwn8P4S1jJQC9PTneIYQrKaQ1jZbEqDHcoOdDPzT8Hjb9nuhnxmqn1EwYAMSFdwpyp4AvvGH-exT9nFSNg3TZseoqO_HEzSHm8LqzUzuaDXjKdDwZ8WT-diW6suHXLuIIH-e7g6GMhFbWY9xncXR15kx16GqmRFxMW0XzVJz_RDt68edp1soxjpPNordoQeLhq26nRdI-vxB8vqVM8:1rO7V6:3DKa7SxBIiZ3WYXNs16UP2AKbKnrAsn-wgDnKMpNlKk','2024-01-12 03:42:28.525503'),('yncq31978snwzlhjz6uj05e8ndn7n9di','.eJxVysFOgzAAgOF34QGWVcYUbwuO0rrS2FEQLwvtYBbaqgOsbPHd5WT0-P_5rl7rhsPw1tXWu_fqCb8KKBVVGPELAqlCPbIskBFao-79OY9wuJgRkDf5xGC8LPdoPfdYFelZmHh4mVvYvBeRUwKGtiqCpiqeFDUBEND1yOhR-uz_s_hTQP7HMC1hPB0h0MKyZv9rv8JdhHWdbBRttz554I5kaEUuZCQZB2lbrlJ_uTDUVB1oT9sDLfWOktsjt-cNzsid_uiSBBP3KPtTPTUYed8_wehWxg:1rO02m:I6g3WMdP0qm1vHJnJN3x2QzSZrqams3ET2uA67GOrRs','2024-01-11 19:44:44.826822');
/*!40000 ALTER TABLE `django_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `document_test`
--

LOCK TABLES `document_test` WRITE;
/*!40000 ALTER TABLE `document_test` DISABLE KEYS */;
INSERT INTO `document_test` VALUES (4,'Shivani_Sharma.pdf','hii','testing1','2023-11-06','pdf',NULL,NULL),(5,'D:\\xampp\\htdocs',NULL,'link','','offline','D:xampph',NULL),(6,'http://arudantech.com/',NULL,'link1','2023-11-07','online','http://aru',NULL),(7,'60',NULL,'lab file','2023-11-07',NULL,NULL,'userFile'),(8,'61',NULL,'lab link','2023-11-07',NULL,NULL,'userFile'),(9,'62',NULL,'lab link online','2023-11-07',NULL,NULL,'userFile');
/*!40000 ALTER TABLE `document_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `editor_data`
--

LOCK TABLES `editor_data` WRITE;
/*!40000 ALTER TABLE `editor_data` DISABLE KEYS */;
INSERT INTO `editor_data` VALUES (1,'test page','<p>hello word</p>\r\n',9,'6',0,'2023-07-24','2023-07-24','A4','A4',NULL,'11',NULL,'Initial publish','red','super admin','NULL',NULL),(6,'again test','<p>sdcscdsvvvedvqeveqb</p>\r\n',NULL,'0',NULL,'2023-10-31','2023-10-31','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat'),(7,'group page','<p>&nbsp;avadfbdgbgfnf&nbsp; f</p>\r\n',NULL,'0',NULL,'2023-11-01','2023-11-01','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat'),(8,'varun page','<p>brgrbrbrbr varun mishra</p>\r\n',NULL,'0',NULL,'2023-11-02','2023-11-02','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat'),(9,'group page','<p>vdbshrnrnrnsnrw varun</p>\r\n',NULL,'0',NULL,'2023-11-02','2023-11-02','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat'),(10,'group page','<p>cscsvv</p>\r\n',NULL,'0',NULL,'2023-11-07','2023-11-07','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat'),(11,'chat page','<p>hello guy&#39;s</p>\r\n',NULL,'0',NULL,'2023-11-07','2023-11-07','A4','A4',NULL,'11',NULL,NULL,'red','super admin',NULL,'chat');
/*!40000 ALTER TABLE `editor_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `emergency_data`
--

LOCK TABLES `emergency_data` WRITE;
/*!40000 ALTER TABLE `emergency_data` DISABLE KEYS */;
INSERT INTO `emergency_data` VALUES (1,2,NULL,29,1,NULL),(2,1,NULL,29,1,NULL),(3,2,NULL,29,1,NULL),(4,3,NULL,29,1,NULL);
/*!40000 ALTER TABLE `emergency_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (11,'2024-01-11',NULL,'1942 jayanagar',NULL,'Indian',NULL,NULL,'Hardworker',NULL,NULL,'','','','','','2024-01-17',0.00,'2024-01-18',NULL,NULL,NULL,NULL,'SLV hotel'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ˇÿˇ‡\0JFIF\0\0`\0`\0\0ˇ€\0C\0		\n\r\Z\Z $.\' \",#(7),01444\'9=82<.342ˇ€\0C			\r\r2!!22222222222222222222222222222222222222222222222222ˇ¿\0¿¿\"\0ˇƒ\0\0\0\0\0\0\0\0\0\0\0	\nˇƒ\0µ\0\0\0}\0!1AQa\"q2Åë°',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PK\0\0\0\0\0\0?\0ÁmÜ≥ì\0\0¬	\0\0\0\0\0[Content_Types].xmlÕñ…n√ ÜÔï˙◊ &IUUú∫€HMÄöâçbb»ˆˆ;â⁄(ª#’c33ˇ˜·n^‰¡\n%c“éZ$\0ô(.d\ZìØ·[¯H¥Lrñ+	1Y\0í~Ô˙™;\\h¿¿UKåIf≠~¢ì\nÜë“ ]d§L¡¨˚4)’,≥hß’z†âí§\r≠◊ ΩÓåÿ$∑¡Î‹MWN‰HÇÁ*—≥b¬¥ŒE¬¨ã”©‰îpIà\\eôÉô–x„›Jë›Ä›uZ¶u¢ù',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'%PDF-1.5\n%‚„œ”\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0',NULL,'','%PDF-1.5\n%????\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'%PDF-1.5\n%‚„œ”\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0',NULL,'%PDF-1.5\n%‚„œ”\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0','%PDF-1.5\n%????\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'%PDF-1.5\n%‚„œ”\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0',NULL,'%PDF-1.5\n%‚„œ”\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0','%PDF-1.5\n%????\n8 0 obj\n<<\n/Type /FontDescriptor\n/FontName /Arial\n/Flags 32\n/ItalicAngle 0\n/Ascent 905\n/Descent -210\n/CapHeight 728\n/AvgWidth 441\n/MaxWidth 2665\n/FontWeight 400\n/XHeight 250\n/Leading 33\n/StemV 44\n/FontBBox [-665 -210 2000 728]\n>>\nendobj\n9 0','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `enddays`
--

LOCK TABLES `enddays` WRITE;
/*!40000 ALTER TABLE `enddays` DISABLE KEYS */;
/*!40000 ALTER TABLE `enddays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_answers_once_test`
--

LOCK TABLES `exam_answers_once_test` WRITE;
/*!40000 ALTER TABLE `exam_answers_once_test` DISABLE KEYS */;
INSERT INTO `exam_answers_once_test` VALUES (1,'118','16',NULL,'c','12',4),(2,'119','16',NULL,'d','12',2);
/*!40000 ALTER TABLE `exam_answers_once_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_answers_repeat_test`
--

LOCK TABLES `exam_answers_repeat_test` WRITE;
/*!40000 ALTER TABLE `exam_answers_repeat_test` DISABLE KEYS */;
INSERT INTO `exam_answers_repeat_test` VALUES (1,'91','a','29','a','1',1,0),(2,'91','b','29','a','1',1,0),(3,'110',NULL,'14','false','9',8,0),(4,'111',NULL,'14','true','9',8,0),(5,'114','hand1','14','a','11',8,0),(6,'',NULL,'14','','11',8,0),(7,'114','leg1','14','b','11',8,0),(8,'115','leg1','14','a','11',8,0),(9,'115','eye1','14','c','11',8,0),(10,'115','hand1','14','b','11',8,0),(11,'116',NULL,'14','false','11',8,0),(12,'117',NULL,'14','true','11',8,0);
/*!40000 ALTER TABLE `exam_answers_repeat_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question`
--

LOCK TABLES `exam_question` WRITE;
/*!40000 ALTER TABLE `exam_question` DISABLE KEYS */;
INSERT INTO `exam_question` VALUES (1,'1','mcq',NULL,'HTML stand for',NULL,'Hypermark Language','Hypermix language','Hypertext Markup Language','Hypertension Language','c',NULL,'easy','1',NULL,NULL,NULL,'Read about Html.'),(2,'1','mcq',NULL,'Which tag is used to create a check box',NULL,'<checkbox>','<Input type=\"checkbox\">','<type=\"checkbox\"','None of the above','b',NULL,'easy','1',NULL,NULL,NULL,NULL),(3,'1','mcq',NULL,'From which tag descriptive list starts ?',NULL,' <LL>',' <DL>',' <LDL>',' <DD>','b',NULL,'easy','1',NULL,NULL,NULL,NULL),(4,'1','mcq',NULL,'Which HTML tag produces the biggest heading? ',NULL,'<h7>','<H>','<H1>','<HI>','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(5,'1','mcq',NULL,'Which type of HTML language is ? ',NULL,'scripting language','programming language','Markup language','Network language','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(6,'2','mcq',NULL,'What does CSS stand for?',NULL,'Colorful Style Sheets','Creative Style Sheets','Cascading Style Sheets','Computer Style Sheets','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(7,'2','mcq',NULL,'How can we change the background color of an element?',NULL,'background-color','color','Both A and B','None of above','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(8,'2','mcq',NULL,'Which of the following tag is used to embed css in html page?',NULL,'<css>','<!DOCTYPE html>','<script> ','<style>','d',NULL,'easy','1',NULL,NULL,NULL,NULL),(9,'2','mcq',NULL,'Which of the following CSS selectors are used to specify a group of elements?',NULL,'tag','id','class','both class and tag','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(10,'2','mcq',NULL,'Which of the following CSS framework is used to create a responsive design?',NULL,'Django','Rails','Laravell','bootstrap','d',NULL,'medium','1',NULL,NULL,NULL,NULL),(11,'2','mcq',NULL,'Which of the following CSS property is used to make the text bold?',NULL,'text-decoration: bold','font-weight: bold',' font-style: bold','text-align: bold','b',NULL,'easy','1',NULL,NULL,NULL,NULL),(12,'2','mcq',NULL,'Which of the following CSS style property is used to specify an italic text?',NULL,'style','font','font-style','@font-face','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(13,'6','mcq',NULL,'What is JavaScript?',NULL,'JavaScript is a scripting language used to make the website interactive','JavaScript is an assembly language used to make the website interactive','JavaScript is a compiled language used to make the website interactive','None of the mentioned','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(14,'6','mcq',NULL,'Which of the following object is the main entry point to all client-side JavaScript features and APIs?',NULL,'Position','Window','Standard','Location','b',NULL,'easy','1',NULL,NULL,NULL,NULL),(15,'6','mcq',NULL,'Which of the following is correct about JavaScript?',NULL,' JavaScript is an Object-Based language','JavaScript is Assembly-language','JavaScript is an Object-Oriented language','JavaScript is a High-level language','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(16,'6','mcq',NULL,'Arrays in JavaScript are defined by which of the following statements?',NULL,'It is an ordered list of values','It is an ordered list of objects',' It is an ordered list of string','It is an ordered list of functions','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(17,'6','mcq',NULL,'Which of the following is not javascript data types?',NULL,'Null type','Undefined type','Number type','All of the mentioned','d',NULL,'easy','1',NULL,NULL,NULL,NULL),(18,'3','mcq',NULL,'Which of the following class in Bootstrap is used to provide a responsive fixed width container?',NULL,'.container-fixed','.container-fluid','.container','All of the above','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(19,'3','mcq',NULL,'Which of the following class in Bootstrap is used to create a dropdown menu?',NULL,'.dropdown','.select','.select-list','None of the above','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(20,'3','mcq',NULL,'Which of the following bootstrap styles can be used to create a default progress bar?',NULL,'.nav-progress','.link-progress-bar','.progress, .progress-bar','All of the mentioned','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(21,'3','mcq',NULL,'The Bootstrap grid system is based on how many columns?',NULL,'4','6','12','18','c',NULL,'easy','1',NULL,NULL,NULL,NULL),(22,'3','mcq',NULL,'Which plugin is used to cycle through elements, like a slideshow?',NULL,'Carousel Plugin','Modal Plugin','Tooltip Plugin','None of the mentioned','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(23,'3','mcq',NULL,'Which of the following is correct about the data-animation Data attribute of the Popover Plugin?',NULL,'Gives the popover a CSS fade transition','Inserts the popover with HTML','Indicates how the popover should be positioned','Assigns delegated tasks to the designated targets','a',NULL,'easy','1',NULL,NULL,NULL,NULL),(24,'2','diagram',NULL,'Guess the name','MicrosoftTeams-image (104).png',NULL,NULL,NULL,NULL,'a:0:{}',NULL,'easy','1',NULL,NULL,NULL,NULL),(25,'1','true_false',NULL,'The HTML tags can be written in Capital or small Letters?',NULL,NULL,NULL,NULL,NULL,'true',NULL,'medium','1',NULL,NULL,NULL,NULL),(26,'1','true_false',NULL,'Text is written in word pad to create a home page?',NULL,NULL,NULL,NULL,NULL,'true',NULL,'hard','1',NULL,NULL,NULL,NULL),(27,'1','true_false',NULL,'Body tag is written after Head tag',NULL,NULL,NULL,NULL,NULL,'true',NULL,'medium','1',NULL,NULL,NULL,NULL),(28,'1','true_false',NULL,'Container tag is a solo tag.',NULL,NULL,NULL,NULL,NULL,'false',NULL,'medium','1',NULL,NULL,NULL,NULL),(29,'1','true_false',NULL,'Title is written in Head Tag',NULL,NULL,NULL,NULL,NULL,'true',NULL,'hard','1',NULL,NULL,NULL,NULL),(30,'1','true_false',NULL,'There are six levels in Heading.',NULL,NULL,NULL,NULL,NULL,'true',NULL,'veryhard','1',NULL,NULL,NULL,NULL),(31,'1','true_false',NULL,'The tag\r\nis used for paragraph.',NULL,NULL,NULL,NULL,NULL,'true',NULL,'medium','1',NULL,NULL,NULL,NULL),(32,'2','true_false',NULL,'Linking to an external style sheet allows you to have hyperlinks from your page to the World Wide Web.',NULL,NULL,NULL,NULL,NULL,'true',NULL,'easy','1',NULL,NULL,NULL,NULL),(33,'2','true_false',NULL,'The MIME type for a CSS style sheet is \"stylesheet = CSS\"',NULL,NULL,NULL,NULL,NULL,'true',NULL,'medium','1',NULL,NULL,NULL,NULL),(34,'2','true_false',NULL,'The rel attribute specifies a relationship between the current document and another document, such as a style sheet.',NULL,NULL,NULL,NULL,NULL,'true',NULL,'easy','1',NULL,NULL,NULL,NULL),(35,'2','true_false',NULL,'The link element should be placed at the top of the body section.',NULL,NULL,NULL,NULL,NULL,'true',NULL,'medium','1',NULL,NULL,NULL,NULL),(36,'2','true_false',NULL,'CSS can add background images to documents.',NULL,NULL,NULL,NULL,NULL,'false',NULL,'hard','1',NULL,NULL,NULL,NULL),(37,'10','diagram',NULL,'Name The Animal','download (2).jfif',NULL,NULL,NULL,NULL,'a:2:{s:1:\"a\";s:3:\"Dog\";s:1:\"b\";s:5:\"Puppy\";}',NULL,'medium','1',NULL,NULL,NULL,NULL),(38,'10','diagram',NULL,'Guess The Animal','cat.jpg',NULL,NULL,NULL,NULL,'a:1:{s:1:\"a\";s:3:\"Cat\";}',NULL,'easy','1',NULL,NULL,NULL,NULL),(39,'10','diagram',NULL,'Name 5 organs','human-skeleton-art-vector.jpg',NULL,NULL,NULL,NULL,'a:5:{s:1:\"a\";s:4:\"Head\";s:1:\"b\";s:4:\"Eyes\";s:1:\"c\";s:4:\"Hand\";s:1:\"d\";s:8:\"Shoulder\";s:1:\"e\";s:4:\"Nose\";}',NULL,'easy','1',NULL,NULL,NULL,NULL),(40,'10','diagram',NULL,'What is this?','tennis-ball.jpg',NULL,NULL,NULL,NULL,'a:1:{s:1:\"a\";s:4:\"Ball\";}',NULL,'easy','1',NULL,NULL,NULL,NULL),(41,'10','diagram',NULL,'Twinkle Twinkle Little ________','24098481.jpg',NULL,NULL,NULL,NULL,'a:1:{s:1:\"a\";s:4:\"Star\";}',NULL,'easy','1',NULL,NULL,NULL,NULL),(43,'1','diagram',NULL,'How Many Columns Are there?','3JoAZ.png',NULL,NULL,NULL,NULL,'a:0:{}',NULL,'easy','1',NULL,NULL,NULL,NULL),(62,'1','digrame',NULL,'label','success.jpg',NULL,NULL,NULL,NULL,'a:2:{s:1:\"a\";s:5:\"hand1\";s:1:\"b\";s:4:\"leg1\";}',NULL,'easy','4',NULL,NULL,NULL,NULL),(63,'1','digrame',NULL,'2 digram12','success.jpg',NULL,NULL,NULL,NULL,'a:3:{s:1:\"a\";s:5:\"hand1\";s:1:\"b\";s:4:\"leg1\";s:1:\"c\";s:4:\"eye1\";}',NULL,'medium','4',NULL,NULL,NULL,NULL),(64,'1','mcq',NULL,'Large tag for heading?',NULL,'h1','h4','h6','h3','a',NULL,'easy','4',NULL,NULL,NULL,NULL),(65,'1','mcq',NULL,'Which one is paragraph tag?',NULL,'p','h1','span','div','a',NULL,'easy','4',NULL,'blog2.jpg','jpg',NULL),(66,'1','mcq',NULL,'vvvgbgwv',NULL,'we','er','we','hii','d',NULL,'easy','4',NULL,NULL,NULL,NULL),(67,'1','true_false',NULL,'we can apply height and width in display inline or not?',NULL,NULL,NULL,NULL,NULL,'false',NULL,'easy','4',NULL,'VarunPicture.jpeg','jpeg',NULL),(68,'1','true_false',NULL,'we can apply height and width in display inline-block?',NULL,NULL,NULL,NULL,NULL,'true',NULL,'easy','4',NULL,NULL,NULL,NULL),(69,'1','mcq',NULL,'dnwcc',NULL,'faef','vv','dfv','fvfdv','a',NULL,'easy','4',NULL,NULL,NULL,'mmjym'),(70,'1','mcq',NULL,'jmymy',NULL,'df','nh','S','H','b',NULL,'easy','4',NULL,NULL,NULL,'sqxx');
/*!40000 ALTER TABLE `exam_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `exam_question_ist`
--

LOCK TABLES `exam_question_ist` WRITE;
/*!40000 ALTER TABLE `exam_question_ist` DISABLE KEYS */;
INSERT INTO `exam_question_ist` VALUES (1,'19','7',''),(2,'5','7',''),(3,'2','7',''),(4,'18','7',''),(5,'6','7',''),(34,'6','8',''),(35,'11','8',''),(36,'3','8',''),(37,'22','8',''),(38,'23','8',''),(39,'1','8',''),(40,'19','8',''),(41,'8','8',''),(42,'1','6',''),(43,'37','6',''),(44,'34','6',''),(45,'11','6',''),(46,'41','6',''),(47,'2','6',''),(48,'31','6',''),(49,'26','6',''),(50,'35','6',''),(51,'40','6',''),(86,'4','13',''),(87,'3','13',''),(88,'2','13',''),(89,'1','13',''),(90,'5','13',''),(91,'62','1',NULL),(92,'62','2',NULL),(93,'62','3',NULL),(94,'63','3',NULL),(95,'65','4',NULL),(96,'66','4',NULL),(99,'65','6',NULL),(100,'66','6',NULL),(101,'40','7',NULL),(102,'41','7',NULL),(103,'67','7',NULL),(104,'68','7',NULL),(105,'1','8',NULL),(106,'2','8',NULL),(107,'3','8',NULL),(108,'62','8',NULL),(109,'63','8',NULL),(110,'67','9',NULL),(111,'68','9',NULL),(112,'67','10',NULL),(113,'68','10',NULL),(114,'62','11',NULL),(115,'63','11',NULL),(116,'67','11',NULL),(117,'68','11',NULL),(118,'1','12',NULL),(119,'2','12',NULL),(120,'3','12',NULL),(121,'4','12',NULL),(122,'1','21',NULL),(123,'2','21',NULL),(124,'3','21',NULL),(125,'4','21',NULL);
/*!40000 ALTER TABLE `exam_question_ist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `examname`
--

LOCK TABLES `examname` WRITE;
/*!40000 ALTER TABLE `examname` DISABLE KEYS */;
INSERT INTO `examname` VALUES (1,'2',NULL,NULL,'digram exam','1','','','','','repeat','show','100','Equal','50','Open_Book','10:09','13:09',NULL,'2023-11-06','2023-11-06 10:09:13.000000','2023-11-09','india',NULL,'no',NULL,'manual','0'),(2,'2',NULL,NULL,'digram exam1','1','','','','','once','show','100','Equal','50','Open_Book','14:43','16:44',NULL,'2023-11-06','2023-11-06 14:42:41.000000','2023-11-09','india',NULL,'no',NULL,'manual','0'),(3,'2',NULL,NULL,'digram exam3','2','','','','','once','show','100','Equal','40','Open_Book','15:18','16:19',NULL,'2023-11-06','2023-11-06 15:17:47.000000','2023-11-07','india',NULL,'no',NULL,'manual','0'),(4,'2',NULL,NULL,'imageExam','2','','','','','once','show','100','Equal','50','Open_Book','13:06','17:07',NULL,'2023-11-08','2023-11-08 13:06:04.000000','2023-11-09','india',NULL,'no',NULL,'manual','0'),(5,'2',NULL,NULL,'imageTrueFalse','2','','','','','once','show','100','Equal','50','Open_Book','13:33','17:34',NULL,'2023-11-08','2023-11-08 13:33:04.000000','2023-11-09','india',NULL,'no',NULL,'manual','0'),(6,'2',NULL,NULL,'image Tes2','2','','','','','once','show','100','Equal','50','Open_Book','10:17','12:19',NULL,'2023-11-09','2023-11-09 10:18:11.000000','2023-11-11','india',NULL,'no',NULL,'manual','0'),(7,'2',NULL,NULL,'test exam12','4','','','','','once','show','100','Equal','50','Open_Book','18:43','22:43',NULL,'2023-11-09','2023-11-09 18:44:12.000000','2023-11-17','india',NULL,'no',NULL,'manual','0'),(8,'2',NULL,NULL,'test both','5','','','','','once','show','100','Equal','20','Open_Book','14:49','18:51',NULL,'2023-11-14','2023-11-14 12:50:07.000000','18:51','india',NULL,'no',NULL,'manual','0'),(9,'2','NULL','NULL','2','2','','','','','once','hide','100','Equal','20','closed','10:00','18:50',NULL,'2023-11-14','2023-11-14 16:48:29.000000','18:50','india',NULL,'yes',NULL,'manual','0'),(10,'2',NULL,NULL,'3','2','','','','','repeat','hide','100','Equal','20','closed','10:51','18:52',NULL,'2023-11-15','2023-11-15 10:52:16.000000','18:52','india',NULL,'yes',NULL,'manual','0'),(11,'2',NULL,NULL,'test3','4','','','','','once','show','100','Equal','20','Open_Book','14:33','18:33',NULL,'2023-11-15','2023-11-15 14:33:58.000000','18:33','india',NULL,'no',NULL,'manual','0'),(12,'2',NULL,NULL,'attempExam','4','','','','','once','show','100','Equal','20','Open_Book','10:19','18:20',NULL,'2023-11-22','2023-11-22 10:20:21.000000','2023-11-25','india',NULL,'no',NULL,'manual','3'),(20,'2',NULL,NULL,'new test','5','100','0','0','0','once','show','100','Equal','30','Open_Book','10:53','18:58',NULL,'2023-12-15','2023-12-15 10:53:42.000000','2023-12-19','india',NULL,'no',NULL,NULL,'no'),(21,'2',NULL,NULL,'dummy test','4','','','','','once','show','100','Equal','20','Open_Book','16:20','18:20',NULL,'2023-12-15','2023-12-15 16:20:42.000000','2023-12-20','india',NULL,'no',NULL,'manual','no');
/*!40000 ALTER TABLE `examname` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `examsubcategory`
--

LOCK TABLES `examsubcategory` WRITE;
/*!40000 ALTER TABLE `examsubcategory` DISABLE KEYS */;
INSERT INTO `examsubcategory` VALUES (1,'1','3','20',NULL),(2,'2','2','10',NULL),(3,'3','2','10','10'),(4,'3','1','0','0'),(5,'3','1','0','0'),(6,'3','1','0','0'),(7,'4','2','10','10'),(8,'4','1','0','0'),(9,'4','1','0','0'),(10,'4','1','0','0'),(11,'5','2','10','10'),(12,'6','2','10','10'),(13,'7','1','20','20'),(14,'8','1','30','30'),(15,'9','2','20','20'),(16,'9','3','20','20'),(17,'9','1','20','20'),(18,'10','2','20','20'),(19,'10','3','20','20'),(20,'10','1','20','20'),(21,'11','2','20','20'),(22,'11','3','20','20'),(23,'11','1','20','20'),(24,'5','1','50','50'),(25,'5','2','20','20'),(26,'5','3','30','30'),(27,'6','1','50','30'),(28,'6','2','50','50'),(29,'6','3','0','20'),(30,'7','1','100','100'),(31,'7','3','0','0'),(32,'7','2','0','0'),(33,'8','3','50','50'),(34,'8','2','50','50'),(35,'8','4','0','0'),(36,'9','1','20','20'),(37,'9','2','30','30'),(38,'9','3','50','50'),(39,'10','1','40','40'),(40,'10','2','40','40'),(41,'10','3','20','20'),(42,'11','1','40','40'),(43,'11','2','50','50'),(44,'11','3','10','10'),(45,'12','1','20','20'),(46,'12','2','30','30'),(47,'12','6','50','50'),(48,'5','1','50','50'),(49,'6','1','25','25'),(50,'6','2','25','25'),(51,'6','3','0','0'),(52,'6','4','0','0'),(53,'6','5','0','0'),(54,'6','6','0','0'),(55,'6','7','0','0'),(56,'6','8','0','0'),(57,'6','9','0','0'),(58,'6','10','50','50'),(59,'7','1','50','50'),(60,'7','2','50','50'),(61,'7','3','0','0'),(62,'7','4','0','0'),(63,'7','5','0','0'),(64,'7','6','0','0'),(65,'7','7','0','0'),(66,'7','8','0','0'),(67,'7','9','0','0'),(68,'7','10','0','0'),(119,'13','1','100','100'),(120,'13','2','0','0'),(121,'13','3','0','0'),(122,'13','4','0','0'),(123,'13','5','0','0'),(124,'13','6','0','0'),(125,'13','7','0','0'),(126,'13','8','0','0'),(127,'13','9','0','0'),(128,'13','10','0','0'),(159,'20','1','30','30'),(160,'20','2','30','30'),(161,'20','3','40','40');
/*!40000 ALTER TABLE `examsubcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `examtype`
--

LOCK TABLES `examtype` WRITE;
/*!40000 ALTER TABLE `examtype` DISABLE KEYS */;
INSERT INTO `examtype` VALUES (1,'1','mcq','20'),(2,'2','mcq','20'),(3,'3','trueOrFalse','40'),(4,'3','mcq','50'),(5,'3','trueOrFalse','10'),(6,'4','trueOrFalse','40'),(7,'4','mcq','50'),(8,'4','trueOrFalse','10'),(9,'5','mcq','10'),(10,'5','mcq','0'),(11,'5','mcq','0'),(12,'5','mcq','0'),(13,'6','mcq','10'),(14,'6','mcq','0'),(15,'6','mcq','0'),(16,'6','mcq','0'),(17,'7','trueOrFalse','20'),(18,'8','mcq','30'),(19,'9','trueOrFalse','20'),(20,'9','trueOrFalse','20'),(21,'9','mcq','20'),(22,'10','trueOrFalse','20'),(23,'10','trueOrFalse','20'),(24,'10','mcq','20'),(25,'11','trueOrFalse','20'),(26,'11','trueOrFalse','20'),(27,'11','mcq','20'),(28,'5','mcq','100'),(29,'5','trueOrFalse','0'),(30,'5','digrame','0'),(31,'6','mcq','100'),(32,'6','trueOrFalse','0'),(33,'6','digrame','0'),(34,'7','mcq','100'),(35,'7','trueOrFalse','0'),(36,'7','digrame','0'),(37,'8','mcq','100'),(38,'8','trueOrFalse','0'),(39,'8','digrame','0'),(40,'9','mcq','100'),(41,'9','trueOrFalse','0'),(42,'9','digrame','0'),(43,'10','mcq','100'),(44,'10','trueOrFalse','0'),(45,'10','digrame','0'),(46,'11','mcq','100'),(47,'11','trueOrFalse','0'),(48,'11','digrame','0'),(49,'12','mcq','100'),(50,'12','trueOrFalse','0'),(51,'12','digrame','0'),(52,'5','mcq','100'),(53,'6','mcq','25'),(54,'6','true_false','25'),(55,'6','digrame','50'),(56,'7','mcq','50'),(57,'7','true_false','30'),(58,'7','digrame','20'),(74,'13','mcq','100'),(75,'13','true_false','0'),(76,'13','digrame','0'),(86,'20','mcq','50'),(87,'20','true_false','50');
/*!40000 ALTER TABLE `examtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `extra_item_subitem`
--

LOCK TABLES `extra_item_subitem` WRITE;
/*!40000 ALTER TABLE `extra_item_subitem` DISABLE KEYS */;
INSERT INTO `extra_item_subitem` VALUES (1,'5','29','4','sim','item','26'),(2,'6','29','4','sim','item','26'),(3,'7','29','4','sim','item','26'),(4,'8','29','4','sim','item','26'),(5,'8','29','8','actual','item','16'),(6,'9','29','8','actual','item','16'),(7,'10','29','8','actual','item','16'),(8,'11','29','8','actual','item','16'),(9,'12','29','8','actual','item','16'),(10,'13','29','8','actual','item','16'),(11,'14','29','8','actual','item','16'),(12,'15','29','8','actual','item','16'),(13,'16','29','8','actual','item','16'),(14,'17','29','8','actual','item','16'),(15,'18','29','8','actual','item','16'),(16,'19','29','8','actual','item','16'),(17,'20','29','8','actual','item','16'),(18,'21','29','8','actual','item','16'),(19,'22','29','8','actual','item','16'),(20,'23','29','8','actual','item','16'),(21,'24','29','8','actual','item','16'),(22,'25','29','8','actual','item','16'),(23,'26','29','8','actual','item','16'),(24,'27','29','8','actual','item','16'),(25,'1','29','8','actual','subitem','16'),(26,'4','29','8','actual','subitem','16'),(27,'7','29','8','actual','subitem','16'),(28,'8','29','8','actual','subitem','16');
/*!40000 ALTER TABLE `extra_item_subitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `extra_item_subitem_cl`
--

LOCK TABLES `extra_item_subitem_cl` WRITE;
/*!40000 ALTER TABLE `extra_item_subitem_cl` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra_item_subitem_cl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `extra_item_subitem_grades`
--

LOCK TABLES `extra_item_subitem_grades` WRITE;
/*!40000 ALTER TABLE `extra_item_subitem_grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra_item_subitem_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `extra_item_subitem_grades_cl`
--

LOCK TABLES `extra_item_subitem_grades_cl` WRITE;
/*!40000 ALTER TABLE `extra_item_subitem_grades_cl` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra_item_subitem_grades_cl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `favouritefiles`
--

LOCK TABLES `favouritefiles` WRITE;
/*!40000 ALTER TABLE `favouritefiles` DISABLE KEYS */;
INSERT INTO `favouritefiles` VALUES (1,'#dc3545','20','user','11'),(2,'#ffc107','30','user','11'),(3,'#007bff','1','user','11');
/*!40000 ALTER TABLE `favouritefiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `favouritepages`
--

LOCK TABLES `favouritepages` WRITE;
/*!40000 ALTER TABLE `favouritepages` DISABLE KEYS */;
/*!40000 ALTER TABLE `favouritepages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `file_briefcase`
--

LOCK TABLES `file_briefcase` WRITE;
/*!40000 ALTER TABLE `file_briefcase` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_briefcase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `file_briefcase_folder`
--

LOCK TABLES `file_briefcase_folder` WRITE;
/*!40000 ALTER TABLE `file_briefcase_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_briefcase_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `file_menu_name`
--

LOCK TABLES `file_menu_name` WRITE;
/*!40000 ALTER TABLE `file_menu_name` DISABLE KEYS */;
INSERT INTO `file_menu_name` VALUES (4,'Mega Menu1','megmenu',NULL),(8,'Menu','menu',NULL),(9,'Menu123','menu',''),(10,'Menu1180000','menu',''),(11,'menucheck','menu','#fd1717'),(12,'megacheck','megmenu','#27e10e');
/*!40000 ALTER TABLE `file_menu_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `filepermissions`
--

LOCK TABLES `filepermissions` WRITE;
/*!40000 ALTER TABLE `filepermissions` DISABLE KEYS */;
INSERT INTO `filepermissions` VALUES (1,'30','11','Everyone','blue','readOnly',NULL),(2,'31','11','Everyone','blue','readOnly',NULL),(3,'32','11','Everyone','blue','readOnly',NULL),(4,'33','11','Everyone','blue','readOnly',NULL),(5,'34','11','Everyone','blue','readOnly',NULL),(6,'35','11','Everyone','blue','readOnly',NULL),(7,'36','11','Everyone','blue','readOnly',NULL),(9,'37','11','Everyone','blue','readOnly',NULL),(10,'38','11','Everyone','blue','readOnly',NULL),(11,'39','11','Everyone','blue','readOnly',NULL),(12,'40','11','Everyone','blue','readOnly',NULL),(14,'42','11','Everyone','blue','readOnly',NULL),(15,'43','11','Everyone','blue','readOnly',NULL),(16,'44','11','Everyone','blue','readOnly',NULL),(17,'45','11','Everyone','blue','readOnly',NULL),(18,'46','11','Everyone','blue','readOnly',NULL),(19,'47','11','Everyone','blue','readOnly',NULL),(20,'48','11','Everyone','blue','readOnly',NULL),(21,'49','11','Everyone','blue','readOnly',NULL),(22,'50','11','Everyone','blue','readOnly',NULL),(23,'51','11','Everyone','blue','readOnly',NULL),(24,'52','11','Everyone','blue','readOnly',NULL),(25,'53','11','Everyone','blue','readOnly',NULL),(26,'54','11','Everyone','blue','readOnly',NULL),(27,'55','11','Everyone','blue','readOnly',NULL),(28,'56','11','Everyone','blue','readOnly',NULL),(29,'57','12','Everyone','blue','readOnly',NULL),(30,'58','11','Everyone','blue','readOnly',NULL),(31,'59','11','Everyone','blue','readOnly',NULL),(32,'60','11','Everyone','blue','readOnly',NULL),(33,'61','11','Everyone','blue','readOnly',NULL),(34,'62','11','Everyone','blue','readOnly',NULL),(35,'63','11','Everyone','blue','readOnly',NULL),(36,'64','12','Everyone','blue','readOnly',NULL),(37,'65','11','Everyone','blue','readOnly',NULL),(38,'66','11','All instructor','yellow','readOnly',NULL),(39,'67','11','All instructor','yellow','readOnly',NULL),(41,'69','11','Everyone','blue','readOnly',NULL),(42,'70','11','Everyone','blue','readOnly',NULL),(43,'71','11','Everyone','blue','readOnly',NULL),(44,'77','11','Everyone','blue','readOnly',NULL),(45,'84','11','Everyone','blue','readOnly',NULL),(52,'56','11','12','blue','readAndWrite','academic'),(53,'56','11','12','blue','readAndWrite','academic'),(54,'56','11','15','blue','readAndWrite','academic'),(55,'55','11','12','blue','readAndWrite','academic'),(56,'55','11','12','blue','readAndWrite','academic'),(57,'55','11','15','blue','readAndWrite','academic'),(58,'58','11','12','blue','readAndWrite','academic'),(59,'58','11','12','blue','readAndWrite','academic'),(60,'58','11','15','blue','readAndWrite','academic'),(61,'1','11','12','blue','readAndWrite',NULL),(62,'1','11','12','blue','readAndWrite',NULL),(63,'1','11','15','blue','readAndWrite',NULL),(64,'3','11','12','blue','readAndWrite',NULL),(65,'3','11','12','blue','readAndWrite',NULL),(66,'3','11','15','blue','readAndWrite',NULL),(67,'4','11','12','blue','readAndWrite',NULL),(68,'4','11','12','blue','readAndWrite',NULL),(69,'4','11','15','blue','readAndWrite',NULL),(70,'56','11','12','blue','readAndWrite','academic'),(71,'56','11','12','blue','readAndWrite','academic'),(72,'56','11','15','blue','readAndWrite','academic'),(73,'58','11','12','blue','readAndWrite','academic'),(74,'58','11','13','blue','readAndWrite','academic'),(75,'58','11','15','blue','readAndWrite','academic'),(76,'2','11','12','blue','readAndWrite',NULL),(77,'2','11','12','blue','readAndWrite',NULL),(78,'2','11','13','blue','readAndWrite',NULL),(79,'2','11','15','blue','readAndWrite',NULL),(80,'2','11','12','blue','readAndWrite',NULL),(81,'2','11','15','blue','readAndWrite',NULL),(82,'1','11','12','blue','readAndWrite',NULL),(83,'1','11','12','blue','readAndWrite',NULL),(84,'1','11','13','blue','readAndWrite',NULL),(85,'1','11','15','blue','readAndWrite',NULL),(86,'1','11','12','blue','readAndWrite',NULL),(87,'1','11','13','blue','readAndWrite',NULL),(88,'1','11','15','blue','readAndWrite',NULL),(89,'1','11','12','blue','readAndWrite',NULL),(90,'1','11','13','blue','readAndWrite',NULL),(91,'1','11','15','blue','readAndWrite',NULL),(92,'56','11','12','blue','readAndWrite','academic'),(93,'56','11','13','blue','readAndWrite','academic'),(94,'56','11','15','blue','readAndWrite','academic'),(95,'55','11','12','blue','readAndWrite','academic'),(96,'55','11','13','blue','readAndWrite','academic'),(97,'55','11','15','blue','readAndWrite','academic'),(98,'56','11','12','blue','readAndWrite','academic'),(99,'56','11','13','blue','readAndWrite','academic'),(100,'56','11','15','blue','readAndWrite','academic'),(101,'55','11','12','blue','readAndWrite','academic'),(102,'55','11','13','blue','readAndWrite','academic'),(103,'55','11','15','blue','readAndWrite','academic'),(104,'2','11','12','blue','readAndWrite',NULL),(105,'2','11','13','blue','readAndWrite',NULL),(106,'2','11','15','blue','readAndWrite',NULL),(107,'2','11','12','blue','readAndWrite',NULL),(108,'4','11','12','blue','readAndWrite',NULL),(109,'4','11','13','blue','readAndWrite',NULL),(110,'4','11','15','blue','readAndWrite',NULL),(111,'4','11','12','blue','readAndWrite',NULL),(112,'1','11','12','blue','readAndWrite',NULL),(113,'1','11','13','blue','readAndWrite',NULL),(114,'1','11','15','blue','readAndWrite',NULL),(115,'1','11','12','blue','readAndWrite',NULL),(116,'56','11','12','blue','readAndWrite','academic'),(117,'56','11','13','blue','readAndWrite','academic'),(118,'56','11','15','blue','readAndWrite','academic'),(119,'56','11','12','blue','readAndWrite','academic'),(120,'55','11','12','blue','readAndWrite','academic'),(121,'55','11','13','blue','readAndWrite','academic'),(122,'55','11','15','blue','readAndWrite','academic'),(123,'55','11','12','blue','readAndWrite','academic'),(124,'56','11','12','blue','readAndWrite','academic'),(125,'56','11','13','blue','readAndWrite','academic'),(126,'56','11','15','blue','readAndWrite','academic'),(127,'56','11','12','blue','readAndWrite','academic'),(128,'1','11','12','blue','readAndWrite',NULL),(129,'1','11','12','blue','readAndWrite',NULL),(130,'1','11','15','blue','readAndWrite',NULL),(131,'2','11','12','blue','readAndWrite',NULL),(132,'2','11','12','blue','readAndWrite',NULL),(133,'2','11','15','blue','readAndWrite',NULL),(134,'1','11','12','blue','readAndWrite',NULL),(135,'1','11','13','blue','readAndWrite',NULL),(136,'1','11','15','blue','readAndWrite',NULL),(137,'1','11','12','blue','readAndWrite',NULL),(138,'88','11','Everyone','blue','readOnly',NULL),(139,'89','11','12','blue','readAndWrite',NULL),(140,'1','11','12','blue','readAndWrite',NULL),(141,'90','11','12','blue','readAndWrite',NULL),(142,'91','11','12','blue','readAndWrite',NULL),(143,'91','11','Everyone','blue','readOnly',NULL),(144,'1','11','12','blue','readAndWrite',NULL),(145,'2','11','13','blue','readAndWrite',NULL),(146,'1','11','13','blue','readAndWrite',NULL),(147,'55','11','13','blue','readAndWrite','academic'),(148,'55','11','0','blue','readAndWrite','academic'),(149,'2','11','12','blue','readAndWrite',NULL),(150,'3','11','12','blue','readAndWrite',NULL),(151,'2','11','12','blue','readAndWrite',NULL),(152,'3','11','12','blue','readAndWrite',NULL),(153,'56','11','12','blue','readAndWrite','academic'),(154,'56','11','12','blue','readAndWrite','academic'),(155,'56','11','12','blue','readAndWrite','academic'),(156,'55','11','12','blue','readAndWrite','academic'),(157,'58','11','12','blue','readAndWrite','academic'),(158,'56','12','12','blue','readAndWrite','academic'),(159,'55','12','12','blue','readAndWrite','academic'),(160,'58','12','12','blue','readAndWrite','academic'),(161,'56','11','12','blue','readAndWrite','academic'),(162,'55','11','12','blue','readAndWrite','academic'),(163,'58','11','12','blue','readAndWrite','academic'),(164,'56','11','12','blue','readAndWrite','academic'),(165,'55','11','12','blue','readAndWrite','academic'),(166,'58','11','12','blue','readAndWrite','academic'),(167,'56','11','12','blue','readAndWrite','academic'),(168,'55','11','12','blue','readAndWrite','academic'),(169,'58','11','12','blue','readAndWrite','academic'),(170,'56','11','13','blue','readAndWrite','academic'),(171,'55','11','13','blue','readAndWrite','academic'),(172,'58','11','13','blue','readAndWrite','academic'),(173,'93','11','Everyone','blue','readOnly',NULL);
/*!40000 ALTER TABLE `filepermissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `filepermissionsfm`
--

LOCK TABLES `filepermissionsfm` WRITE;
/*!40000 ALTER TABLE `filepermissionsfm` DISABLE KEYS */;
/*!40000 ALTER TABLE `filepermissionsfm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `folder_shop_user`
--

LOCK TABLES `folder_shop_user` WRITE;
/*!40000 ALTER TABLE `folder_shop_user` DISABLE KEYS */;
INSERT INTO `folder_shop_user` VALUES (1,'2','1','11','2','1'),(2,'9','1','11','6','1'),(118,'127','8','11','21','1'),(119,'128','8','11','21','1'),(120,'129','8','11','21','1'),(121,'130','8','11','21','1'),(122,'131','8','11','21','1'),(123,'132','8','11','21','1'),(124,'133','8','11','21','1'),(125,'134','8','11','21','1'),(126,'135','8','11','21','1'),(127,'136','8','11','21','1'),(128,'137','8','11','21','1'),(129,'138','8','11','21','1'),(130,'139','8','11','21','1'),(131,'140','8','11','21','1'),(132,'141','8','11','21','1'),(133,'142','8','11','21','1');
/*!40000 ALTER TABLE `folder_shop_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `folders`
--

LOCK TABLES `folders` WRITE;
/*!40000 ALTER TABLE `folders` DISABLE KEYS */;
INSERT INTO `folders` VALUES (2,'folder00',NULL,NULL,NULL,NULL),(3,'folder3',NULL,NULL,NULL,NULL),(4,'folder',NULL,NULL,NULL,NULL),(6,'folder5',NULL,NULL,NULL,NULL),(7,'folder0',NULL,NULL,NULL,NULL),(8,'folder2',NULL,NULL,NULL,NULL),(9,'folder r',NULL,NULL,NULL,NULL),(10,'folder 178',NULL,NULL,NULL,NULL),(11,'jdlkjdkl',NULL,NULL,NULL,NULL),(127,'Admin Folder',NULL,NULL,NULL,NULL),(128,'Academics',NULL,NULL,NULL,'1'),(129,'Driving',NULL,'1',NULL,NULL),(130,'Parking',NULL,'3',NULL,NULL),(131,'phase',NULL,'4',NULL,NULL),(132,'test phase',NULL,'6',NULL,NULL),(133,'academic phase',NULL,'7',NULL,NULL),(134,'DA - 03',NULL,NULL,'13',NULL),(135,'DA - 04',NULL,NULL,'21',NULL),(136,'DA - 05',NULL,NULL,'22',NULL),(137,'DA - 06',NULL,NULL,'23',NULL),(138,'DA - 07',NULL,NULL,'24',NULL),(139,'DA - 08',NULL,NULL,'29',NULL),(140,'DA - 09',NULL,NULL,'45',NULL),(141,'phase5',NULL,'12',NULL,NULL),(142,'phase6',NULL,'13',NULL,NULL);
/*!40000 ALTER TABLE `folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `frame_cert`
--

LOCK TABLES `frame_cert` WRITE;
/*!40000 ALTER TABLE `frame_cert` DISABLE KEYS */;
/*!40000 ALTER TABLE `frame_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grade_per`
--

LOCK TABLES `grade_per` WRITE;
/*!40000 ALTER TABLE `grade_per` DISABLE KEYS */;
INSERT INTO `grade_per` VALUES (2,'U','0'),(3,'F','0'),(4,'G','0'),(5,'V','0'),(6,'E','0'),(7,'N','0');
/*!40000 ALTER TABLE `grade_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grade_per_notifications`
--

LOCK TABLES `grade_per_notifications` WRITE;
/*!40000 ALTER TABLE `grade_per_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade_per_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grade_permission`
--

LOCK TABLES `grade_permission` WRITE;
/*!40000 ALTER TABLE `grade_permission` DISABLE KEYS */;
INSERT INTO `grade_permission` VALUES (1,'22','E','1',NULL);
/*!40000 ALTER TABLE `grade_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grade_permission_clone`
--

LOCK TABLES `grade_permission_clone` WRITE;
/*!40000 ALTER TABLE `grade_permission_clone` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade_permission_clone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gradeaheet_clear_reason`
--

LOCK TABLES `gradeaheet_clear_reason` WRITE;
/*!40000 ALTER TABLE `gradeaheet_clear_reason` DISABLE KEYS */;
INSERT INTO `gradeaheet_clear_reason` VALUES (1,'11','hello','8','2023-07-31','13:07:16'),(2,'12','hgdjdgjk','2','2023-08-07','10:32:46'),(3,'15','khasdiadibaidgy','4','2023-08-11','05:25:48'),(4,'15','akshdiuwadigqw8yd','4','2023-08-11','05:39:03'),(5,'12','jHSBuasgbyd iuasbdahydihau iasbnduah','1','2023-08-11','06:46:00'),(6,'12','kuhsduiqwuidbqwuidbuiqwebd kq ybqeyidb','1','2023-08-11','08:37:46'),(7,'12','asxkhbisgxyqqhj qwy  hjqw uh quw ','4','2023-08-11','09:32:43'),(8,'12','kjhiqwuhxuqwuxbqwuibsibqwiiqwnq ','4','2023-08-11','09:34:01'),(9,'11','dmnfbfmhk','6','2023-08-17','10:57:54'),(10,'12','htrh','9','2023-08-17','11:56:15'),(11,'12','ger','16','2023-08-17','11:58:15'),(12,'12','fcfcerfrcf','16','2023-08-21','08:04:45'),(13,'12','e5y5','22','2023-08-22','13:42:44'),(14,'12','dff','23','2023-08-22','14:30:00'),(15,'12','fnhzn','2','2023-11-21','05:40:24');
/*!40000 ALTER TABLE `gradeaheet_clear_reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gradeaheet_clear_reason1`
--

LOCK TABLES `gradeaheet_clear_reason1` WRITE;
/*!40000 ALTER TABLE `gradeaheet_clear_reason1` DISABLE KEYS */;
/*!40000 ALTER TABLE `gradeaheet_clear_reason1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gradesheet`
--

LOCK TABLES `gradesheet` WRITE;
/*!40000 ALTER TABLE `gradesheet` DISABLE KEYS */;
INSERT INTO `gradesheet` VALUES (1,'29','1','1','1','actual','12','1','12:18','2023-11-29',12,5,'U','30',' ,mkjbk','\r\n              \r\n              \r\n                                                  ','1','1','2023-07-17 12:19:06.000000'),(2,'29','1','1','2','actual','12','1','14:36','2023-11-29',0,0,'U','10',' bbfgf','\r\n              \r\n                                      ','1','1','2023-11-29 14:36:42.000000'),(3,'13','1','1','2','actual','12','1','14:40','2023-12-04',0,0,'U','10',' kkb','\r\n                          ','1','1','2023-12-04 14:40:12.000000'),(4,'13','1','1','3','actual','12','1','14:56','2023-12-04',12,5,'U','10',' bjvkkgv','\r\n                          ','1','1','2023-12-04 14:57:16.000000'),(5,'29','1','1','3','actual','12','1','15:21','2023-12-04',1,20,'U','10',' dcwcvwsw','\r\n                          ','1','1','2023-12-04 15:21:53.000000'),(6,'29','1','1','4','actual','12','1','10:39','2023-12-05',0,0,'G','80',' dscasrfqrwg','\r\n                          ','2','1','2023-12-05 10:39:54.000000'),(7,'32','1','1','1','actual','36','1','14:16','2024-01-09',0,0,NULL,NULL,NULL,NULL,NULL,NULL,'2024-01-09 14:16:19.000000'),(8,'29','1','1','13','actual','36','1','13:07','2024-01-10',0,0,NULL,NULL,NULL,NULL,NULL,NULL,'2024-01-10 13:07:18.000000'),(9,'29','1','1','19','sim','12','1','10:57','2024-01-17',0,0,'G','68',' dcwc','\r\n                          ','1','1','2024-01-17 10:57:11.000000'),(10,'29','1','1','18','actual','12','1','16:41','2024-01-17',0,0,NULL,NULL,NULL,NULL,NULL,NULL,'2024-01-17 16:41:45.000000'),(11,'33','2','2','26','actual','12','1','13:59','2024-01-24',0,0,'G','65',' svSFSF','\r\n                          ','1','1','2024-01-24 13:59:35.000000'),(12,'33','2','2','32','actual','12','1','14:00','2024-01-24',0,0,'G','67',' dcvv','\r\n                          ','2','1','2024-01-24 14:00:43.000000');
/*!40000 ALTER TABLE `gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gradsheet_final_hashoff`
--

LOCK TABLES `gradsheet_final_hashoff` WRITE;
/*!40000 ALTER TABLE `gradsheet_final_hashoff` DISABLE KEYS */;
INSERT INTO `gradsheet_final_hashoff` VALUES (1,'18','8','actual','1','0'),(2,'18','8','actual','2','0'),(3,'29','8','actual','1','2'),(4,'29','8','actual','2','5'),(5,'13','8','actual','1','1'),(6,'13','8','actual','2','1'),(7,'27','8','actual','1','0'),(8,'27','8','actual','2','0'),(9,'29','4','actual','1','0'),(10,'29','4','actual','2','0'),(11,'29','4','actual','3','0'),(12,'29','4','actual','4','0'),(13,'29','4','actual','5','0'),(14,'29','4','actual','6','0'),(15,'29','4','sim','1','0'),(16,'29','4','sim','2','0'),(17,'29','4','sim','3','0'),(18,'29','4','sim','4','0');
/*!40000 ALTER TABLE `gradsheet_final_hashoff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gradsheet_final_hashoff_cl`
--

LOCK TABLES `gradsheet_final_hashoff_cl` WRITE;
/*!40000 ALTER TABLE `gradsheet_final_hashoff_cl` DISABLE KEYS */;
INSERT INTO `gradsheet_final_hashoff_cl` VALUES (1,'29','4','actual','1','0','2'),(2,'29','4','actual','2','0','2'),(3,'29','4','actual','3','0','2'),(4,'29','4','actual','4','0','2'),(5,'29','4','actual','5','0','2'),(6,'29','4','actual','6','0','2'),(7,'29','8','actual','1','0','1'),(8,'29','8','actual','2','0','1'),(9,'29','4','actual','1','0','1'),(10,'29','4','actual','2','0','1'),(11,'29','4','actual','3','0','1'),(12,'29','4','actual','4','0','1'),(13,'29','4','actual','5','0','1'),(14,'29','4','actual','6','0','1'),(15,'29','4','sim','1','0','1'),(16,'29','4','sim','2','0','1'),(17,'29','4','sim','3','0','1'),(18,'29','4','sim','4','0','1');
/*!40000 ALTER TABLE `gradsheet_final_hashoff_cl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `group_student_scheduling`
--

LOCK TABLES `group_student_scheduling` WRITE;
/*!40000 ALTER TABLE `group_student_scheduling` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_student_scheduling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groupchats`
--

LOCK TABLES `groupchats` WRITE;
/*!40000 ALTER TABLE `groupchats` DISABLE KEYS */;
INSERT INTO `groupchats` VALUES (1,'11','2',NULL,'hii',NULL,NULL,'2023-11-02 12:08:50',NULL,NULL,NULL,NULL,NULL),(2,'11','2',NULL,'48','file',NULL,'2023-11-02 12:16:24',NULL,NULL,NULL,NULL,'userfile'),(3,'11','2',NULL,'49','file',NULL,'2023-11-02 12:18:32',NULL,NULL,NULL,NULL,'userfile'),(6,'11','2',NULL,'51',NULL,NULL,'2023-11-02 12:25:16','Edited',NULL,NULL,NULL,'userfile'),(7,'11','2',NULL,'52',NULL,NULL,'2023-11-02 12:28:42','Edited',NULL,NULL,NULL,'userfile'),(8,'11','2',NULL,'C:\\xampp\\htdocs',NULL,NULL,'2023-11-02 12:32:48',NULL,NULL,'nice','yes',NULL),(9,'11','2',NULL,'C:\\xampp\\htdocs',NULL,NULL,'2023-11-02 12:41:09',NULL,NULL,'good','yes',NULL),(10,'11','2',NULL,'9',NULL,NULL,'2023-11-02 12:45:26','Edited',NULL,NULL,NULL,'page'),(11,'11','2',NULL,'group page',NULL,NULL,'2023-11-02 12:54:03',NULL,NULL,'ohh','yes',NULL),(12,'11','3',NULL,'9',NULL,NULL,'2023-11-02 13:04:12',NULL,NULL,NULL,NULL,'page'),(13,'11','2',NULL,'group page',NULL,NULL,'2023-11-02 13:05:05',NULL,NULL,',,','yes',NULL),(14,'11','3',NULL,'52',NULL,NULL,'2023-11-02 13:15:42',NULL,NULL,NULL,NULL,NULL),(15,'11','2',NULL,'C:xampphtdocs',NULL,NULL,'2023-11-02 13:16:22',NULL,NULL,'wow','yes',NULL),(16,'11','3',NULL,'51',NULL,NULL,'2023-11-02 13:16:31',NULL,NULL,NULL,NULL,NULL),(17,'11','2',NULL,'Python Probation Task (1).docx',NULL,NULL,'2023-11-02 13:16:51',NULL,NULL,'good','yes',NULL),(18,'11','3',NULL,'49','file',NULL,'2023-11-02 13:18:22',NULL,NULL,NULL,NULL,'userfile'),(19,'11','3',NULL,'48','file',NULL,'2023-11-02 13:18:46',NULL,NULL,NULL,NULL,'userfile'),(20,'11','2',NULL,'54','file',NULL,'2023-11-03 11:42:40',NULL,NULL,NULL,NULL,'userfile'),(21,'11','4',NULL,'10',NULL,NULL,'2023-11-07 14:15:56',NULL,NULL,NULL,NULL,'page'),(22,'12','4',NULL,'hii',NULL,NULL,'2023-11-07 14:27:41',NULL,NULL,NULL,NULL,NULL),(23,'12','4',NULL,'hello',NULL,NULL,'2023-11-07 14:28:16',NULL,NULL,NULL,NULL,NULL),(24,'11','4',NULL,'63',NULL,NULL,'2023-11-07 14:34:56',NULL,NULL,NULL,NULL,'userfile'),(25,'11','4',NULL,'hii',NULL,NULL,'2023-11-17 13:17:51',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `groupchats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groupdeleteforme`
--

LOCK TABLES `groupdeleteforme` WRITE;
/*!40000 ALTER TABLE `groupdeleteforme` DISABLE KEYS */;
/*!40000 ALTER TABLE `groupdeleteforme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groupmember`
--

LOCK TABLES `groupmember` WRITE;
/*!40000 ALTER TABLE `groupmember` DISABLE KEYS */;
INSERT INTO `groupmember` VALUES (15,'4','12','member','2023-11-03'),(16,'4','13','member','2023-11-03'),(17,'4','14','member','2023-11-03'),(18,'4','11','admin','2023-11-03');
/*!40000 ALTER TABLE `groupmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `hashoff`
--

LOCK TABLES `hashoff` WRITE;
/*!40000 ALTER TABLE `hashoff` DISABLE KEYS */;
INSERT INTO `hashoff` VALUES (1,'hashoff 1',NULL,NULL,NULL,NULL),(2,'hashoff 2',NULL,NULL,NULL,NULL),(3,'hashoff 3',NULL,NULL,NULL,NULL),(4,'hashoff 4',NULL,NULL,NULL,NULL),(5,'hash 5',NULL,NULL,NULL,NULL),(6,'hash 6',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hashoff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `hashoff_gradesheet`
--

LOCK TABLES `hashoff_gradesheet` WRITE;
/*!40000 ALTER TABLE `hashoff_gradesheet` DISABLE KEYS */;
INSERT INTO `hashoff_gradesheet` VALUES (1,'4','1','1','actual','1'),(2,'4','1','1','actual','2'),(3,'4','1','1','actual','3'),(4,'4','1','1','actual','4'),(5,'4','1','1','actual','5'),(6,'4','1','1','actual','6'),(7,'8','1','1','actual','1'),(8,'8','1','1','actual','2'),(9,'4','1','1','sim','1'),(10,'4','1','1','sim','2'),(11,'4','1','1','sim','3'),(12,'4','1','1','sim','4');
/*!40000 ALTER TABLE `hashoff_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `heading_cert`
--

LOCK TABLES `heading_cert` WRITE;
/*!40000 ALTER TABLE `heading_cert` DISABLE KEYS */;
/*!40000 ALTER TABLE `heading_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `hideclass`
--

LOCK TABLES `hideclass` WRITE;
/*!40000 ALTER TABLE `hideclass` DISABLE KEYS */;
INSERT INTO `hideclass` VALUES (21,'1','5','11'),(22,'1','3','11');
/*!40000 ALTER TABLE `hideclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `holydays`
--

LOCK TABLES `holydays` WRITE;
/*!40000 ALTER TABLE `holydays` DISABLE KEYS */;
INSERT INTO `holydays` VALUES (5,'2023-07-06','2023-07-07','NA',NULL,'unPlanned'),(7,'2023-07-18','2023-07-20','NA1',NULL,'unPlanned'),(8,'2023-07-22','2023-07-22','Birthday',NULL,'unPlanned'),(9,'2023-10-04','2023-10-04','NA5',NULL,'planned'),(10,'2024-05-03','2024-05-03','NA6',NULL,'planned');
/*!40000 ALTER TABLE `holydays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `homepage`
--

LOCK TABLES `homepage` WRITE;
/*!40000 ALTER TABLE `homepage` DISABLE KEYS */;
INSERT INTO `homepage` VALUES (1,'kudos.jpg','2023-07-17','11','1','Driving school',NULL,'Hello world','Dubai','8765432190','ayushi260395@gmail.com','asdfghjkl','dfghjkl'),(2,NULL,NULL,'11','1','department 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'11','1','department 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'11','1','department 4',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,'11','1','department 5',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `homepage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `horizontal_cert`
--

LOCK TABLES `horizontal_cert` WRITE;
/*!40000 ALTER TABLE `horizontal_cert` DISABLE KEYS */;
/*!40000 ALTER TABLE `horizontal_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `image_cert`
--

LOCK TABLES `image_cert` WRITE;
/*!40000 ALTER TABLE `image_cert` DISABLE KEYS */;
INSERT INTO `image_cert` VALUES (1,'1','1','100','100','5','9','#000000','0');
/*!40000 ALTER TABLE `image_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'1','1','1','1','actual','1'),(2,'2','1','1','1','actual','1'),(5,'1','1','4','1','actual',NULL),(6,'2','1','4','1','actual',NULL),(7,'3','1','4','1','actual',NULL),(8,'4','1','4','1','actual',NULL),(9,'5','1','4','1','actual',NULL),(10,'6','1','4','1','actual',NULL),(11,'7','1','4','1','actual',NULL),(12,'1','1','8','1','actual',NULL),(13,'2','1','8','1','actual',NULL),(14,'3','1','8','1','actual',NULL),(15,'4','1','8','1','actual',NULL),(16,'5','1','8','1','actual',NULL),(17,'6','1','8','1','actual',NULL),(18,'7','1','8','1','actual',NULL),(19,'1','1','9','1','actual',NULL),(20,'2','1','9','1','actual',NULL),(21,'3','1','9','1','actual',NULL),(22,'4','1','9','1','actual',NULL),(23,'5','1','9','1','actual',NULL),(24,'6','1','9','1','actual',NULL),(25,'7','1','9','1','actual',NULL),(26,'1','1','2','1','actual',NULL),(27,'1','2','3','1','sim',NULL),(28,'2','2','3','1','sim',NULL),(29,'3','2','3','1','sim',NULL),(30,'1','2','2','1','sim',NULL),(31,'2','2','2','1','sim',NULL),(32,'3','2','2','1','sim',NULL),(33,'4','2','2','1','sim',NULL),(34,'1','1','4','1','sim',NULL),(35,'2','1','4','1','sim',NULL),(36,'3','1','4','1','sim',NULL),(37,'4','1','4','1','sim',NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item_clone_gradesheet`
--

LOCK TABLES `item_clone_gradesheet` WRITE;
/*!40000 ALTER TABLE `item_clone_gradesheet` DISABLE KEYS */;
INSERT INTO `item_clone_gradesheet` VALUES (1,'29','1','U','1','2023-11-29'),(2,'29','2','F','1','2023-11-29');
/*!40000 ALTER TABLE `item_clone_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item_gradesheet`
--

LOCK TABLES `item_gradesheet` WRITE;
/*!40000 ALTER TABLE `item_gradesheet` DISABLE KEYS */;
INSERT INTO `item_gradesheet` VALUES (1,'29','1','N','2023-11-29'),(2,'29','2','F','2023-11-29'),(3,'29','26','U','2023-11-30'),(4,'13','26','U','2023-12-04'),(5,'29','5','F','2024-01-12'),(6,'29','6','','2024-01-12'),(7,'29','7','','2024-01-12'),(8,'29','8','','2024-01-12'),(9,'29','9','','2024-01-12'),(10,'29','10','','2024-01-12'),(11,'29','11','','2024-01-12');
/*!40000 ALTER TABLE `item_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `itembank`
--

LOCK TABLES `itembank` WRITE;
/*!40000 ALTER TABLE `itembank` DISABLE KEYS */;
INSERT INTO `itembank` VALUES (1,'item-1 has very long text ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'item-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Item -1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'msarii',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'The click event is handled for the menu icon, and the .other-options element is toggled with slideToggle when the menu icon is clicked.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'item-7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'General knowledge Page',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'archana11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'msarii11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'ayushi11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'item-711',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'item-311',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'item-1111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'archana78',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'item-378',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'msarii78',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'hello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'helo1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'hlo2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'helo3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'helo8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'helo9',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'helo7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'helo4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'gelo0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'shjkdkl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'dfjklddjfv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `itembank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `library`
--

LOCK TABLES `library` WRITE;
/*!40000 ALTER TABLE `library` DISABLE KEYS */;
INSERT INTO `library` VALUES (1,'Main','super_admin'),(3,'library 2','11'),(4,'library 3','11');
/*!40000 ALTER TABLE `library` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `logo_cert`
--

LOCK TABLES `logo_cert` WRITE;
/*!40000 ALTER TABLE `logo_cert` DISABLE KEYS */;
/*!40000 ALTER TABLE `logo_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `main_department`
--

LOCK TABLES `main_department` WRITE;
/*!40000 ALTER TABLE `main_department` DISABLE KEYS */;
INSERT INTO `main_department` VALUES (1,'','','11','Alkarama','','','','','','');
/*!40000 ALTER TABLE `main_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `manage_role_course_phase`
--

LOCK TABLES `manage_role_course_phase` WRITE;
/*!40000 ALTER TABLE `manage_role_course_phase` DISABLE KEYS */;
/*!40000 ALTER TABLE `manage_role_course_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mark_distribution`
--

LOCK TABLES `mark_distribution` WRITE;
/*!40000 ALTER TABLE `mark_distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `mark_distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `meesages`
--

LOCK TABLES `meesages` WRITE;
/*!40000 ALTER TABLE `meesages` DISABLE KEYS */;
INSERT INTO `meesages` VALUES (1,'11','11','hello','2023-08-02 15:51:40.000000');
/*!40000 ALTER TABLE `meesages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `memo`
--

LOCK TABLES `memo` WRITE;
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` VALUES (1,'2023-08-02','11',NULL,'Memorandum for record','29','1','','item.csv','csv','1'),(2,'2023-08-08','11',NULL,'memo ','29','1','','Gardening Dep.csv','csv','3'),(3,'2023-09-04','11',NULL,'hello','29','1','2','','','absent'),(4,'2023-09-06','11',NULL,'hello','29','1','7','','','absent'),(5,'2023-10-10','11',NULL,'Hello','13','1','7','examform2.php','php','absent'),(6,'2023-10-09','11',NULL,'hello','13','1','70','document_test (2).sql','sql','2'),(7,'2023-10-08','11',NULL,'hello','16','1','3','','','absent'),(8,'2023-10-10','11',NULL,'h','16','1','20','test_updates (2) (1).sql','sql','2'),(9,'2023-11-03','11',NULL,'fgfgve','29','1','3','','','absent'),(10,'2023-12-12','11',NULL,'test','29','1','60','83',NULL,'1');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `memoabs`
--

LOCK TABLES `memoabs` WRITE;
/*!40000 ALTER TABLE `memoabs` DISABLE KEYS */;
INSERT INTO `memoabs` VALUES (1,'29','2');
/*!40000 ALTER TABLE `memoabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `memocate`
--

LOCK TABLES `memocate` WRITE;
/*!40000 ALTER TABLE `memocate` DISABLE KEYS */;
INSERT INTO `memocate` VALUES (1,'memo 1','60','2023-08-09 16:07:15'),(2,'memo 2',NULL,'2023-08-09 16:07:15'),(3,'memo 33',NULL,'2023-08-09 16:07:15');
/*!40000 ALTER TABLE `memocate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `new_warnning`
--

LOCK TABLES `new_warnning` WRITE;
/*!40000 ALTER TABLE `new_warnning` DISABLE KEYS */;
INSERT INTO `new_warnning` VALUES (1,'59','29','actual','2'),(2,'68','29','actual','4'),(3,'69','29','actual','4'),(4,'131','29','actual','1'),(5,'153','13','actual','1');
/*!40000 ALTER TABLE `new_warnning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `newcourse`
--

LOCK TABLES `newcourse` WRITE;
/*!40000 ALTER TABLE `newcourse` DISABLE KEYS */;
INSERT INTO `newcourse` VALUES (13,'1','Driving Beginner','2023-07-07',3,'25','12',NULL,NULL,'',NULL),(17,'3','Servicing','2023-07-07',3,'22','15',NULL,NULL,'',NULL),(19,'4','Servicing','2023-07-26',3,'21','15',NULL,NULL,'',NULL),(21,'1','Driving Beginner','2023-07-17',4,'27','varun',NULL,NULL,'',NULL),(22,'1','Parking School','2022-07-18',5,'29','12',NULL,NULL,'',NULL),(23,'1','Parking School','2022-08-18',6,'30','15',NULL,NULL,'',NULL),(24,'1','Parking School','2023-07-13',7,'31','15',NULL,NULL,'',NULL),(25,'2','Driving Beginner','2023-07-17',4,'33','Bharti',NULL,NULL,'',NULL),(27,'2','Parking School','2023-07-07',6,'35','15',NULL,NULL,'',NULL),(28,'2','Parking School','2023-07-24',7,'28','12',NULL,NULL,'',NULL),(29,'1','Driving Beginner','2023-07-13',8,'32','12',NULL,NULL,'',NULL),(30,'1','Parking School','2022-07-18',5,'13','12',NULL,NULL,NULL,NULL),(31,'1','Parking School','2022-07-18',5,'16','12',NULL,NULL,NULL,NULL),(32,'1','Parking School','2022-07-18',5,'14','12',NULL,NULL,NULL,NULL),(33,'1','Parking School','2022-07-18',5,'18','12',NULL,NULL,NULL,NULL),(34,'1','Parking School','2022-07-18',5,'19','12',NULL,NULL,NULL,NULL),(35,'1','Parking School','2022-07-18',5,'20','12',NULL,NULL,NULL,NULL),(36,'1','Parking School','2022-07-18',5,'23','12',NULL,NULL,NULL,NULL),(37,'1','Parking School','2022-07-18',5,'17','12',NULL,NULL,NULL,NULL),(39,'8','test-course','2023-12-11',1,'38','15',NULL,NULL,'','1'),(40,'8','tes2','2023-12-11',2,'39','36',NULL,NULL,'','1'),(41,'1','Driving Beginner','2023-07-13',8,'24','Bharti',NULL,NULL,NULL,NULL),(45,'1','saurabh','2024-01-24',9,'34','12',NULL,NULL,'','1');
/*!40000 ALTER TABLE `newcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `newpage_fm`
--

LOCK TABLES `newpage_fm` WRITE;
/*!40000 ALTER TABLE `newpage_fm` DISABLE KEYS */;
/*!40000 ALTER TABLE `newpage_fm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `newpagechangelogdata`
--

LOCK TABLES `newpagechangelogdata` WRITE;
/*!40000 ALTER TABLE `newpagechangelogdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `newpagechangelogdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'12','29',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-15 16:47:31.000000'),(2,'12','13',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-15 16:47:31.000000'),(3,'12','16',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-15 16:47:31.000000'),(4,'12','14',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-15 16:47:31.000000'),(5,'','29',NULL,'actual','1','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-15 17:34:37.000000'),(6,'29','12',NULL,'actual','4','cloned_gradsheet',NULL,NULL,1,1,'2023-11-16 09:20:02.000000'),(7,'29','12',NULL,'actual','4','cloned_gradsheet',NULL,NULL,0,2,'2023-11-16 10:32:00.000000'),(8,'12','29',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-16 11:05:36.000000'),(9,'12','13',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2023-11-16 11:05:36.000000'),(10,'12','29',NULL,'actual','3','filled your gradsheet for',NULL,NULL,0,0,'2023-11-17 09:10:29.000000'),(11,'29','12',NULL,'actual','4','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-17 09:13:53.000000'),(12,'12','29',NULL,'actual','4','filled your gradsheet for',NULL,NULL,0,0,'2023-11-17 09:14:10.000000'),(13,'29','12',NULL,'sim','1','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-17 09:34:17.000000'),(14,'12','29',NULL,'sim','1','filled your gradsheet for',NULL,NULL,0,0,'2023-11-17 09:34:35.000000'),(15,'29','12',NULL,'actual','1','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-21 09:52:44.000000'),(16,'12','29',NULL,'actual','1','filled your gradsheet for',NULL,NULL,0,0,'2023-11-21 09:53:12.000000'),(17,'29','12',NULL,'actual','2','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-21 10:07:01.000000'),(18,'12','29',NULL,'actual','2','filled your gradsheet for',NULL,NULL,0,0,'2023-11-21 10:07:22.000000'),(19,'29','12',NULL,'actual','2','You requested a gradesheet for a reset',NULL,NULL,0,0,'2023-11-21 10:10:24.000000'),(20,'12','29',NULL,'actual','2','filled your gradsheet for',NULL,NULL,0,0,'2023-11-21 10:11:02.000000'),(21,'29','12',NULL,'actual','2','cloned_gradsheet',NULL,NULL,1,1,'2023-11-21 10:12:02.000000'),(22,'','29',NULL,'actual','2','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-21 10:12:19.000000'),(23,'29','12',NULL,'sim','6','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-21 10:22:22.000000'),(24,'12','29',NULL,'sim','6','filled your gradsheet for',NULL,NULL,0,0,'2023-11-21 10:22:44.000000'),(25,'29','12',NULL,'sim','7','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-21 10:33:20.000000'),(26,'12','29',NULL,'sim','7','filled your gradsheet for',NULL,NULL,0,0,'2023-11-21 10:33:38.000000'),(27,'29','12',NULL,'sim','7','cloned_gradsheet',NULL,NULL,1,1,'2023-11-21 10:37:06.000000'),(28,'','29',NULL,'sim','7','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-21 10:37:24.000000'),(29,'29','12',NULL,'actual','3','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-11-21 12:56:50.000000'),(115,'29','12',NULL,'actual','2','clone_unlock_request',NULL,NULL,0,1,'2023-11-29 12:14:00.000000'),(116,'','29',NULL,'actual','2','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-29 12:14:29.000000'),(117,'12','29',NULL,'actual','1','filled your gradsheet for',NULL,NULL,0,0,'2023-11-29 12:19:49.000000'),(118,'29','12',NULL,'actual','1','cloned_gradsheet',NULL,NULL,1,1,'2023-11-29 12:20:51.000000'),(119,'','29',NULL,'actual','1','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-29 12:21:25.000000'),(120,'29','12',NULL,'actual','1','You requested gradsheet is unlock for',NULL,NULL,0,0,'2023-11-29 14:14:30.000000'),(121,'12','29',NULL,'actual','1','filled your gradsheet for',NULL,NULL,0,0,'2023-11-29 14:14:43.000000'),(122,'29','12',NULL,'actual','1','clone_unlock_request',NULL,NULL,0,1,'2023-11-29 14:32:24.000000'),(123,'','29',NULL,'actual','1','filled your repeated gradsheet for',NULL,NULL,0,0,'2023-11-29 14:32:43.000000'),(124,'11','29',NULL,'actual','2','filled your gradsheet for',NULL,NULL,0,0,'2023-11-30 11:59:00.000000'),(125,'29','12',NULL,'actual','2','You requested gradsheet is unlock for',NULL,NULL,0,0,'2023-11-30 11:59:50.000000'),(126,'13','12',NULL,'actual','2','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-12-04 14:40:12.000000'),(127,'12','13',NULL,'actual','2','filled your gradsheet for',NULL,NULL,0,0,'2023-12-04 14:40:34.000000'),(128,'13','12',NULL,'actual','3','is selected to fill gradsheet of',NULL,NULL,1,0,'2023-12-04 14:57:16.000000'),(129,'12','13',NULL,'actual','3','filled your gradsheet for',NULL,NULL,0,0,'2023-12-04 14:57:36.000000'),(130,'12','29',NULL,'actual','3','filled your gradsheet for',NULL,NULL,0,0,'2023-12-04 15:22:27.000000'),(131,'29','29',NULL,NULL,'1','reached_cout',NULL,NULL,0,0,'2023-12-12 11:13:27.000000'),(132,'14','14',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(133,'16','16',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(134,'17','17',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(135,'18','18',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(136,'19','19',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(137,'20','20',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(138,'21','21',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(139,'22','22',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(140,'23','23',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(141,'24','24',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(142,'25','25',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(143,'27','27',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(144,'28','28',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(145,'29','29',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(146,'30','30',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(147,'31','31',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(148,'32','32',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(149,'33','33',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(150,'34','34',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(151,'38','38',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(152,'39','39',NULL,NULL,'21','test scheduled',NULL,NULL,0,0,'2023-12-15 16:20:53.000000'),(153,'13','13',NULL,NULL,'1','reached_cout',NULL,NULL,0,0,'2023-12-22 10:34:58.000000'),(154,'32','36',NULL,'actual','1','is selected to fill gradsheet of',NULL,NULL,0,0,'2024-01-09 14:16:19.000000'),(155,'29','36',NULL,'actual','13','is selected to fill gradsheet of',NULL,NULL,0,0,'2024-01-10 13:07:18.000000'),(156,'12','29',NULL,'actual','2','filled your gradsheet for',NULL,NULL,0,0,'2024-01-11 16:20:23.000000'),(157,'12','29',NULL,'actual','4','filled your gradsheet for',NULL,NULL,0,0,'2024-01-12 09:26:13.000000'),(158,'29','12',NULL,'sim','19','is selected to fill gradsheet of',NULL,NULL,1,0,'2024-01-17 10:57:11.000000'),(159,'12','29',NULL,'sim','19','filled your gradsheet for',NULL,NULL,0,0,'2024-01-17 10:57:29.000000'),(160,'','29',NULL,'academic','4','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:33:44.000000'),(161,'','13',NULL,'academic','5','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:33:50.000000'),(162,'','29',NULL,'academic','5','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:33:57.000000'),(163,'','29',NULL,'academic','8','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:34:06.000000'),(164,'','29',NULL,'academic','6','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:34:12.000000'),(165,'','29',NULL,'academic','7','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 14:34:20.000000'),(166,'','29',NULL,'academic','7','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-17 16:38:58.000000'),(167,'29','12',NULL,'actual','18','is selected to fill gradsheet of',NULL,NULL,0,0,'2024-01-17 16:41:45.000000'),(168,'33','12',NULL,'actual','26','is selected to fill gradsheet of',NULL,NULL,1,0,'2024-01-24 13:59:35.000000'),(169,'12','33',NULL,'actual','26','filled your gradsheet for',NULL,NULL,0,0,'2024-01-24 13:59:57.000000'),(170,'33','12',NULL,'actual','32','is selected to fill gradsheet of',NULL,NULL,1,0,'2024-01-24 14:00:43.000000'),(171,'12','33',NULL,'actual','32','filled your gradsheet for',NULL,NULL,0,0,'2024-01-24 14:00:59.000000'),(172,'12','29',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-29 14:56:56.000000'),(173,'12','29',NULL,'academic','2','Has Accepted Academic For',NULL,NULL,0,0,'2024-01-29 15:06:15.000000'),(174,'12','29',NULL,'actual','1','filled your gradsheet for',NULL,NULL,0,0,'2024-01-31 11:22:49.000000');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orgchart_data`
--

LOCK TABLES `orgchart_data` WRITE;
/*!40000 ALTER TABLE `orgchart_data` DISABLE KEYS */;
INSERT INTO `orgchart_data` VALUES (1,'2','0','department'),(2,'14','1','user'),(3,'13','2','user'),(4,'3','1','department');
/*!40000 ALTER TABLE `orgchart_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `originalcertificate`
--

LOCK TABLES `originalcertificate` WRITE;
/*!40000 ALTER TABLE `originalcertificate` DISABLE KEYS */;
/*!40000 ALTER TABLE `originalcertificate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pagepermissions`
--

LOCK TABLES `pagepermissions` WRITE;
/*!40000 ALTER TABLE `pagepermissions` DISABLE KEYS */;
INSERT INTO `pagepermissions` VALUES (1,'1','11','Everyone','blue','readOnly'),(2,'13','11','Everyone','blue','readOnly'),(3,'15','11','Everyone','blue','readOnly'),(4,'6','11','Everyone','blue','readOnly'),(5,'7','11','Everyone','blue','readOnly'),(6,'8','11','Everyone','blue','readOnly'),(7,'9','11','Everyone','blue','readOnly'),(8,'10','11','Everyone','blue','readOnly'),(9,'11','11','Everyone','blue','readOnly');
/*!40000 ALTER TABLE `pagepermissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pagepermissionsfm`
--

LOCK TABLES `pagepermissionsfm` WRITE;
/*!40000 ALTER TABLE `pagepermissionsfm` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagepermissionsfm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `para_cert`
--

LOCK TABLES `para_cert` WRITE;
/*!40000 ALTER TABLE `para_cert` DISABLE KEYS */;
/*!40000 ALTER TABLE `para_cert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `per_check_sub_checklist`
--

LOCK TABLES `per_check_sub_checklist` WRITE;
/*!40000 ALTER TABLE `per_check_sub_checklist` DISABLE KEYS */;
INSERT INTO `per_check_sub_checklist` VALUES (6,'1','3','11'),(7,'1','4','11'),(8,'1','8','11'),(9,'1','7','11'),(11,'5','6','14'),(12,'6','9','14'),(13,'6','11','14'),(14,'6','10','14'),(15,'4','12','12'),(22,'44','19','12');
/*!40000 ALTER TABLE `per_check_sub_checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `per_checklist`
--

LOCK TABLES `per_checklist` WRITE;
/*!40000 ALTER TABLE `per_checklist` DISABLE KEYS */;
INSERT INTO `per_checklist` VALUES (1,'11','checklist per 13','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello wolrd','2023-09-07','Category 33','#e21818',NULL,NULL,NULL),(3,'11','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-09-06','Category 33','red',NULL,NULL,NULL),(4,'12','checklist inst','TOS Academy offers a diverse array of online and offline courses','Complted','low','helo','2023-09-13 00:00:00','Category 33','orange',NULL,NULL,NULL),(5,'14','Personal my',NULL,NULL,NULL,NULL,'2023-10-06 09:25:31',NULL,'#1e1bc5',NULL,NULL,NULL),(6,'14','Profession',NULL,NULL,NULL,NULL,'2023-10-06 09:25:31',NULL,'#e60f0f',NULL,NULL,NULL),(7,'14','White',NULL,NULL,NULL,NULL,'2023-10-06 09:25:31',NULL,'#2fec09',NULL,NULL,NULL),(8,'14','Blue',NULL,NULL,NULL,NULL,'2023-10-06 09:25:31',NULL,'#f109de',NULL,NULL,NULL),(10,'11','birthday',NULL,NULL,NULL,NULL,'2023-10-10 00:00:00',NULL,NULL,NULL,NULL,NULL),(16,'11','check color',NULL,NULL,NULL,NULL,'2023-10-05 00:00:00',NULL,'#e41111',NULL,NULL,NULL),(36,'11','chat page',NULL,NULL,'low',NULL,'2023-11-09 13:12:10',NULL,'#f42525',NULL,NULL,NULL),(37,'11','chat page',NULL,NULL,'medium',NULL,'2023-11-14 16:40:33',NULL,'#d31212',NULL,NULL,NULL),(38,'11','hii',NULL,NULL,'medium',NULL,'2023-11-16 16:49:51',NULL,'#d01b1b',NULL,NULL,NULL),(95,'12','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(96,'13','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(97,'14','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(98,'15','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(99,'16','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(100,'17','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(101,'18','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(102,'19','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(103,'20','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(104,'21','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(105,'22','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(106,'23','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(107,'24','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(108,'25','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(109,'26','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(110,'27','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(111,'28','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(112,'29','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(113,'30','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(114,'31','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(115,'32','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(116,'33','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(117,'34','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(118,'36','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(119,'37','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(120,'38','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(121,'39','checklist per 33','TOS Academy offers a diverse array of online and offline courses','Complted','low','hello','2023-12-13 13:32:59','Category 33','red','3','everyone','readOnly'),(122,'12','birthday','','','','','2023-10-10 00:00:00','','','10','instructor','readOnly'),(123,'13','birthday','','','','','2023-10-10 00:00:00','','','10','instructor','readOnly'),(124,'15','birthday','','','','','2023-10-10 00:00:00','','','10','instructor','readOnly'),(125,'36','birthday','','','','','2023-10-10 00:00:00','','','10','instructor','readOnly'),(126,'37','birthday','','','','','2023-10-10 00:00:00','','','10','instructor','readOnly'),(127,'12','chat page','','','low','','2024-01-05 16:11:35','','#10e028','36','instructor','readOnly'),(128,'13','chat page','','','low','','2024-01-05 16:11:35','','#f42525','36','instructor','readOnly'),(129,'15','chat page','','','low','','2024-01-05 16:11:35','','#f42525','36','instructor','readOnly'),(130,'36','chat page','','','low','','2024-01-05 16:11:35','','#f42525','36','instructor','readOnly'),(131,'37','chat page','','','low','','2024-01-05 16:11:35','','#f42525','36','instructor','readOnly');
/*!40000 ALTER TABLE `per_checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `per_subchecklist`
--

LOCK TABLES `per_subchecklist` WRITE;
/*!40000 ALTER TABLE `per_subchecklist` DISABLE KEYS */;
INSERT INTO `per_subchecklist` VALUES (1,'11','per sub 1 ','1','Hello world','Complted','low','Category 33','hello msarii',NULL),(3,'11','per sub 4','1',NULL,NULL,NULL,NULL,NULL,'2023-09-06 10:29:23'),(4,'11','per sub 5','1',NULL,NULL,NULL,NULL,NULL,'2023-09-06 10:29:23'),(5,'11','sub test','5',NULL,NULL,NULL,NULL,NULL,'2023-09-11 11:29:00'),(6,'11','sub test 1','5',NULL,NULL,NULL,NULL,NULL,'2023-09-11 11:29:00'),(7,'11','per sub 2','1',NULL,NULL,NULL,NULL,NULL,'2023-10-03 14:31:29'),(8,'11','per sub 6','1',NULL,NULL,NULL,NULL,NULL,'2023-10-03 16:32:19'),(9,'14','Hello','6',NULL,NULL,NULL,NULL,NULL,'2023-10-06 09:29:45'),(10,'14','World','6',NULL,NULL,NULL,NULL,NULL,'2023-10-06 09:29:45'),(11,'14','Mine','6',NULL,NULL,NULL,NULL,NULL,'2023-10-06 09:29:45'),(12,'12','subchecklist 11','4',NULL,NULL,NULL,NULL,NULL,'2023-10-09 15:39:56'),(16,'11','per sub8','1',NULL,NULL,NULL,NULL,NULL,NULL),(17,'11','per sub7','1',NULL,NULL,NULL,NULL,NULL,NULL),(18,'11','per sub9','1',NULL,NULL,NULL,NULL,NULL,NULL),(19,'11','per sub10','1',NULL,NULL,NULL,NULL,NULL,NULL),(20,'12','sub1','69',NULL,NULL,NULL,NULL,NULL,NULL),(21,'15','birthday1','94',NULL,NULL,NULL,NULL,NULL,NULL),(22,'11','birthday2','10',NULL,NULL,NULL,NULL,NULL,NULL),(23,'11','chat sub1','36',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `per_subchecklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `per_subchecklistfile`
--

LOCK TABLES `per_subchecklistfile` WRITE;
/*!40000 ALTER TABLE `per_subchecklistfile` DISABLE KEYS */;
/*!40000 ALTER TABLE `per_subchecklistfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `percentage`
--

LOCK TABLES `percentage` WRITE;
/*!40000 ALTER TABLE `percentage` DISABLE KEYS */;
INSERT INTO `percentage` VALUES (1,'U-Unsatisfied','40','#ed4c78',NULL),(2,'F-Fair','60','#f5ca99','This got fair'),(3,'G-Good','80','#71869d',NULL),(4,'V- Very Good','90','#00c9a7',NULL),(5,'E- Excellent','100','#377dff',NULL),(6,'N- Not Graded','0','Black',NULL);
/*!40000 ALTER TABLE `percentage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personalchecklist_files`
--

LOCK TABLES `personalchecklist_files` WRITE;
/*!40000 ALTER TABLE `personalchecklist_files` DISABLE KEYS */;
INSERT INTO `personalchecklist_files` VALUES (1,'72','1'),(3,'74','1'),(4,'75','1'),(5,'1','1');
/*!40000 ALTER TABLE `personalchecklist_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personalsubchecklist_files`
--

LOCK TABLES `personalsubchecklist_files` WRITE;
/*!40000 ALTER TABLE `personalsubchecklist_files` DISABLE KEYS */;
INSERT INTO `personalsubchecklist_files` VALUES (1,'76','1'),(2,'1','1'),(3,'1','');
/*!40000 ALTER TABLE `personalsubchecklist_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `persontitle`
--

LOCK TABLES `persontitle` WRITE;
/*!40000 ALTER TABLE `persontitle` DISABLE KEYS */;
INSERT INTO `persontitle` VALUES (2,'12','Employee of the Week','You done a very great job this year.','2023-07-19'),(3,'14','Student of the year','You score really great in this year so we r giving you this award.','2023-07-19'),(5,'25','Student of the month','Great work on this month','2023-07-19'),(6,'18','employee of the month','Great job','2023-07-19'),(7,'11','Student of the year','hjhdksfjsklfjksfj','2023-08-08');
/*!40000 ALTER TABLE `persontitle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `phase`
--

LOCK TABLES `phase` WRITE;
/*!40000 ALTER TABLE `phase` DISABLE KEYS */;
INSERT INTO `phase` VALUES (1,'Driving',NULL,'1','red',NULL),(2,'Driving',NULL,'2','green',NULL),(3,'Parking',NULL,'1','blue',NULL),(4,'phase',NULL,'1',NULL,NULL),(6,'test phase',NULL,'1',NULL,NULL),(7,'academic phase',NULL,'1',NULL,NULL),(8,'phase1',NULL,'6',NULL,NULL),(9,'scPhase',NULL,'4',NULL,NULL),(10,'phase1',NULL,'7',NULL,NULL),(11,'phase1',NULL,'8',NULL,NULL),(12,'phase5',NULL,'1',NULL,NULL),(13,'phase6',NULL,'1',NULL,NULL);
/*!40000 ALTER TABLE `phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `phasefilepermission`
--

LOCK TABLES `phasefilepermission` WRITE;
/*!40000 ALTER TABLE `phasefilepermission` DISABLE KEYS */;
/*!40000 ALTER TABLE `phasefilepermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `popup`
--

LOCK TABLES `popup` WRITE;
/*!40000 ALTER TABLE `popup` DISABLE KEYS */;
/*!40000 ALTER TABLE `popup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prereuisite_data`
--

LOCK TABLES `prereuisite_data` WRITE;
/*!40000 ALTER TABLE `prereuisite_data` DISABLE KEYS */;
INSERT INTO `prereuisite_data` VALUES (2,'3',NULL,'academic','2','academic'),(5,'5',NULL,'sim','4','actual'),(6,'5',NULL,'sim','4','sim'),(7,'6',NULL,'sim','5','sim'),(8,'7',NULL,'sim','6','sim'),(9,'1',NULL,'test','7','sim');
/*!40000 ALTER TABLE `prereuisite_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prereuisites`
--

LOCK TABLES `prereuisites` WRITE;
/*!40000 ALTER TABLE `prereuisites` DISABLE KEYS */;
/*!40000 ALTER TABLE `prereuisites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `progress_weekend`
--

LOCK TABLES `progress_weekend` WRITE;
/*!40000 ALTER TABLE `progress_weekend` DISABLE KEYS */;
INSERT INTO `progress_weekend` VALUES (2,'exclude','1','5'),(3,'include','1','3');
/*!40000 ALTER TABLE `progress_weekend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `qual_data`
--

LOCK TABLES `qual_data` WRITE;
/*!40000 ALTER TABLE `qual_data` DISABLE KEYS */;
INSERT INTO `qual_data` VALUES (1,'1',NULL,'','1'),(2,'2',NULL,'','1'),(3,'3',NULL,'','1'),(4,'4',NULL,'','1'),(5,'5',NULL,'','1'),(6,'6',NULL,'','1'),(7,'7',NULL,'','1'),(8,'8',NULL,'','1'),(9,'9',NULL,'','1'),(10,'10',NULL,'','1'),(11,'11',NULL,'','1'),(12,'12',NULL,'','1'),(13,'13',NULL,'','1'),(14,'14',NULL,'','1'),(15,'15',NULL,'','1'),(16,'16',NULL,'','1'),(17,'17',NULL,'','1'),(18,'18',NULL,'','1'),(19,'19',NULL,'','1'),(20,'20',NULL,'','1'),(21,'21',NULL,'','1'),(22,'22',NULL,'','1'),(23,'23',NULL,'','1'),(24,'24',NULL,'','1'),(25,'25',NULL,'','1'),(26,'26',NULL,'','1'),(27,'27',NULL,'','1'),(28,NULL,'1','','1'),(29,NULL,'2','','1'),(30,NULL,'3','','1'),(31,NULL,'4','','1'),(32,NULL,'5','','1'),(33,NULL,'6','','1'),(34,NULL,'7','','1'),(35,NULL,'8','','1');
/*!40000 ALTER TABLE `qual_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Subject1','','1','100','2023-09-04'),(2,'Subject2','','1','100','2023-09-04'),(3,'Subject3','','1','100','2023-09-04'),(4,'Subject4','','1','100','2023-09-04'),(5,'Subject5','','1','100','2023-09-04'),(6,'Subject6','','1','100','2023-09-04'),(7,'Subject7','','1','100','2023-09-04'),(8,'Subject8','','1','100','2023-09-04');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `quiz_cloned_data`
--

LOCK TABLES `quiz_cloned_data` WRITE;
/*!40000 ALTER TABLE `quiz_cloned_data` DISABLE KEYS */;
INSERT INTO `quiz_cloned_data` VALUES (1,1,29,1,'1','86','12');
/*!40000 ALTER TABLE `quiz_cloned_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `quiz_marks`
--

LOCK TABLES `quiz_marks` WRITE;
/*!40000 ALTER TABLE `quiz_marks` DISABLE KEYS */;
INSERT INTO `quiz_marks` VALUES (2,'1','80','29','1','2024-01-08','0','12');
/*!40000 ALTER TABLE `quiz_marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rolepermission`
--

LOCK TABLES `rolepermission` WRITE;
/*!40000 ALTER TABLE `rolepermission` DISABLE KEYS */;
INSERT INTO `rolepermission` VALUES (1,'super admin',NULL);
/*!40000 ALTER TABLE `rolepermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'student','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"0\";s:22:\"select_student_details\";s:1:\"1\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"0\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"0\";s:18:\"askreset_gradsheet\";s:1:\"0\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"0\";s:13:\"give_Acedemic\";s:1:\"0\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"1\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"0\";s:20:\"view_marks_evalution\";s:1:\"1\";s:15:\"give_marks_test\";s:1:\"0\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"0\";s:19:\"add_attachment_test\";s:1:\"0\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"0\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"0\";s:26:\"course_phase_man_dashbirad\";s:1:\"0\";s:13:\"test_dasborad\";s:1:\"0\";s:13:\"coursemanager\";s:1:\"0\";s:12:\"phasemanager\";s:1:\"0\";s:15:\"assingeresource\";s:1:\"0\";}',NULL,NULL),(6,'instructor','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"1\";s:18:\"askreset_gradsheet\";s:1:\"1\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"1\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"1\";s:20:\"view_marks_evalution\";s:1:\"0\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"1\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"0\";s:26:\"course_phase_man_dashbirad\";s:1:\"1\";s:13:\"test_dasborad\";s:1:\"1\";s:13:\"coursemanager\";s:1:\"1\";s:12:\"phasemanager\";s:1:\"1\";s:15:\"assingeresource\";s:1:\"1\";}',NULL,NULL),(7,'super admin','a:59:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"1\";s:15:\"askclone_delete\";s:1:\"0\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"1\";s:16:\"Unlock_gradsheet\";s:1:\"1\";s:19:\"askUnlock_gradsheet\";s:1:\"0\";s:18:\"askreset_gradsheet\";s:1:\"0\";s:18:\"give_per_gradsheet\";s:1:\"1\";s:17:\"ask_per_gradsheet\";s:1:\"0\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"1\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"0\";s:20:\"view_marks_evalution\";s:1:\"1\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"1\";s:14:\"askunlock_test\";s:1:\"0\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"1\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"1\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"1\";s:13:\"Delete_course\";s:1:\"1\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"1\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"1\";s:26:\"course_phase_man_dashbirad\";s:1:\"0\";s:13:\"test_dasborad\";s:1:\"0\";}',NULL,NULL),(8,'dynamic roles','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"1\";s:18:\"askreset_gradsheet\";s:1:\"1\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"1\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"1\";s:20:\"view_marks_evalution\";s:1:\"0\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"1\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"0\";s:26:\"course_phase_man_dashbirad\";s:1:\"1\";s:13:\"test_dasborad\";s:1:\"1\";s:13:\"coursemanager\";s:1:\"1\";s:12:\"phasemanager\";s:1:\"1\";s:15:\"assingeresource\";s:1:\"1\";}',NULL,'6'),(10,'IT','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"1\";s:8:\"Datapage\";s:1:\"1\";s:3:\"CTP\";s:1:\"1\";s:9:\"Newcourse\";s:1:\"1\";s:13:\"sidebar_phase\";s:1:\"1\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"1\";s:15:\"askclone_delete\";s:1:\"0\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"1\";s:16:\"Unlock_gradsheet\";s:1:\"1\";s:19:\"askUnlock_gradsheet\";s:1:\"0\";s:18:\"askreset_gradsheet\";s:1:\"0\";s:18:\"give_per_gradsheet\";s:1:\"1\";s:17:\"ask_per_gradsheet\";s:1:\"0\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"1\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"0\";s:20:\"view_marks_evalution\";s:1:\"1\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"1\";s:14:\"askunlock_test\";s:1:\"0\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"1\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"1\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"1\";s:13:\"Delete_course\";s:1:\"1\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"1\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"1\";s:26:\"course_phase_man_dashbirad\";s:1:\"0\";s:13:\"test_dasborad\";s:1:\"0\";s:13:\"coursemanager\";s:1:\"0\";s:12:\"phasemanager\";s:1:\"0\";s:15:\"assingeresource\";s:1:\"0\";}',NULL,'7'),(11,'new','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"1\";s:18:\"askreset_gradsheet\";s:1:\"1\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"1\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"1\";s:20:\"view_marks_evalution\";s:1:\"0\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"1\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"0\";s:26:\"course_phase_man_dashbirad\";s:1:\"1\";s:13:\"test_dasborad\";s:1:\"1\";s:13:\"coursemanager\";s:1:\"1\";s:12:\"phasemanager\";s:1:\"1\";s:15:\"assingeresource\";s:1:\"0\";}',NULL,'8'),(12,'test role','a:62:{s:9:\"Dashboard\";s:1:\"1\";s:10:\"phase_page\";s:1:\"0\";s:10:\"class_page\";s:1:\"0\";s:6:\"actual\";s:1:\"1\";s:3:\"sim\";s:1:\"1\";s:8:\"Academic\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:10:\"evaluation\";s:1:\"1\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:3:\"CAP\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";s:6:\"Report\";s:1:\"1\";s:10:\"Discipline\";s:1:\"1\";s:6:\"Start0\";s:1:\"0\";s:8:\"Datapage\";s:1:\"0\";s:3:\"CTP\";s:1:\"0\";s:9:\"Newcourse\";s:1:\"0\";s:13:\"sidebar_phase\";s:1:\"0\";s:4:\"Quiz\";s:1:\"1\";s:13:\"select_Course\";s:1:\"1\";s:22:\"select_student_details\";s:1:\"0\";s:14:\"course_details\";s:1:\"1\";s:12:\"landing_page\";s:1:\"1\";s:15:\"checklist_pages\";s:1:\"1\";s:12:\"clone_delete\";s:1:\"0\";s:15:\"askclone_delete\";s:1:\"1\";s:14:\"fill_gradsheet\";s:1:\"1\";s:15:\"reset_gradsheet\";s:1:\"0\";s:16:\"Unlock_gradsheet\";s:1:\"0\";s:19:\"askUnlock_gradsheet\";s:1:\"1\";s:18:\"askreset_gradsheet\";s:1:\"1\";s:18:\"give_per_gradsheet\";s:1:\"0\";s:17:\"ask_per_gradsheet\";s:1:\"1\";s:13:\"give_Acedemic\";s:1:\"1\";s:14:\"Clear_Acedemic\";s:1:\"0\";s:12:\"ask_Acedemic\";s:1:\"0\";s:11:\"delete_task\";s:1:\"0\";s:20:\"give_marks_evalution\";s:1:\"1\";s:20:\"view_marks_evalution\";s:1:\"0\";s:15:\"give_marks_test\";s:1:\"1\";s:11:\"unlock_test\";s:1:\"0\";s:14:\"askunlock_test\";s:1:\"1\";s:19:\"add_attachment_test\";s:1:\"1\";s:16:\"delete_emergance\";s:1:\"0\";s:10:\"assign_Cap\";s:1:\"1\";s:11:\"Create_memo\";s:1:\"0\";s:9:\"Edit_memo\";s:1:\"0\";s:11:\"Delete_memo\";s:1:\"0\";s:13:\"Delete_course\";s:1:\"0\";s:12:\"Edit_landing\";s:1:\"0\";s:14:\"Delete_landing\";s:1:\"0\";s:6:\"alerts\";N;s:13:\"export_course\";s:1:\"0\";s:26:\"course_phase_man_dashbirad\";s:1:\"1\";s:13:\"test_dasborad\";s:1:\"1\";s:13:\"coursemanager\";s:1:\"1\";s:12:\"phasemanager\";s:1:\"1\";s:15:\"assingeresource\";s:1:\"1\";}',NULL,'6');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `self`
--

LOCK TABLES `self` WRITE;
/*!40000 ALTER TABLE `self` DISABLE KEYS */;
INSERT INTO `self` VALUES (1,'75','29','1');
/*!40000 ALTER TABLE `self` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shelf`
--

LOCK TABLES `shelf` WRITE;
/*!40000 ALTER TABLE `shelf` DISABLE KEYS */;
INSERT INTO `shelf` VALUES (1,'shelf 1','1'),(8,'Course Training Standard','1');
/*!40000 ALTER TABLE `shelf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shelf_shop`
--

LOCK TABLES `shelf_shop` WRITE;
/*!40000 ALTER TABLE `shelf_shop` DISABLE KEYS */;
INSERT INTO `shelf_shop` VALUES (1,'11','1','2','1'),(2,'11','1','6','1'),(17,'11','8','21','1');
/*!40000 ALTER TABLE `shelf_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_folder`
--

LOCK TABLES `shop_folder` WRITE;
/*!40000 ALTER TABLE `shop_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (2,'shop1','hello1.png',NULL),(3,'shop3','hello.jpg',NULL),(4,'shop8','hello1.png',NULL),(5,'shop10','File management v3.png',NULL),(6,'Shop test','hello.jpg',NULL),(21,'Driving School Advanced','','1');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sidebar_ctp`
--

LOCK TABLES `sidebar_ctp` WRITE;
/*!40000 ALTER TABLE `sidebar_ctp` DISABLE KEYS */;
INSERT INTO `sidebar_ctp` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8');
/*!40000 ALTER TABLE `sidebar_ctp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sim`
--

LOCK TABLES `sim` WRITE;
/*!40000 ALTER TABLE `sim` DISABLE KEYS */;
INSERT INTO `sim` VALUES (1,'Front Sim','SDR-2','',100,'1','2','2023-07-17',NULL,NULL,NULL),(2,'Front drive','SDR-1','',100,'1','2','2023-07-17',NULL,NULL,NULL),(3,'Front Sim','SDR-6','',100,'1','2','2023-07-17',NULL,NULL,NULL),(4,'Front Drive','SDR-1','',100,'1','1','2023-07-21',2,10,'5'),(5,'Parking ','SDR-2','',100,'1','1','2023-07-21',NULL,NULL,NULL),(6,'jhgdjhf','SDR-3','',100,'1','1','2023-07-21',NULL,NULL,NULL),(7,'Front Sim','SDR-4','',100,'1','1','2023-07-21',NULL,NULL,NULL),(8,'Front drive','SDR-62','',100,'3','1','2023-08-02',NULL,NULL,NULL),(9,'ghj','SDR-14','',100,'3','1','2023-08-02',NULL,NULL,NULL),(10,'Front drive','SDR-61','',100,'3','1','2023-08-02',NULL,NULL,NULL),(11,'Front drive','SDR-6225','',100,'1','1','2023-08-09',NULL,NULL,NULL),(12,'ghj','SDR-145','',100,'1','1','2023-08-09',NULL,NULL,NULL),(13,'Front drive','SDR-615','',100,'1','1','2023-08-09',NULL,NULL,NULL),(14,'Front Sim','SDR-42','',100,'1','1','2023-08-09',NULL,NULL,NULL),(15,'Front Sim','door','',100,'1','1','2023-08-09',NULL,NULL,NULL),(16,'Front Sim','SDR-60','',100,'1','1','2023-08-09',NULL,NULL,NULL),(17,'ghj','SDR-19','',100,'1','1','2023-08-09',NULL,NULL,NULL),(18,'Parking ','SDR-134','',100,'1','1','2023-08-09',NULL,NULL,NULL),(19,'Front drive','   s  s s','',100,'1','1','2023-08-09',1,2,'2'),(20,'Front Sim','park','',100,'1','1','2023-08-09',NULL,NULL,NULL),(21,'Front Sim','back','',100,'1','1','2023-08-09',NULL,NULL,NULL),(22,'Front drive','SDR-15','',100,'1','1','2023-08-09',NULL,NULL,NULL),(23,'jhgdjhf','SDR-191','',100,'1','1','2023-08-09',NULL,NULL,NULL),(24,'Parking ','SDR-623','',100,'1','1','2023-08-09',NULL,NULL,NULL),(25,'Front drive','back46','',100,'1','1','2023-08-09',NULL,NULL,NULL),(26,'Parking ','SDR-1p2i','',100,'1','1','2023-08-09',NULL,NULL,NULL),(27,'Front Sim','whio','',100,'1','1','2023-08-09',NULL,NULL,NULL),(28,'Front drive','jeiekwl','',100,'1','1','2023-08-09',NULL,NULL,NULL),(29,'scSim','sc1','',100,'9','4','2023-12-07',NULL,NULL,NULL),(30,'scSim1','sc2','',100,'9','4','2023-12-07',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sim_phase`
--

LOCK TABLES `sim_phase` WRITE;
/*!40000 ALTER TABLE `sim_phase` DISABLE KEYS */;
INSERT INTO `sim_phase` VALUES (1,'1','1'),(2,'3','1');
/*!40000 ALTER TABLE `sim_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Code','1','Array','Array','Array'),(2,'Code1',NULL,'Description1','Explanantion1','Progression1');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `studentexam`
--

LOCK TABLES `studentexam` WRITE;
/*!40000 ALTER TABLE `studentexam` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentexam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sub_item`
--

LOCK TABLES `sub_item` WRITE;
/*!40000 ALTER TABLE `sub_item` DISABLE KEYS */;
INSERT INTO `sub_item` VALUES (1,'subitem-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'subitem-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'subitem-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'subitem-4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'subitem-5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'subitem-6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'subitem-7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'subitem-8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sub_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subchecklistfile`
--

LOCK TABLES `subchecklistfile` WRITE;
/*!40000 ALTER TABLE `subchecklistfile` DISABLE KEYS */;
INSERT INTO `subchecklistfile` VALUES (1,'1','1');
/*!40000 ALTER TABLE `subchecklistfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subchecklistfiles`
--

LOCK TABLES `subchecklistfiles` WRITE;
/*!40000 ALTER TABLE `subchecklistfiles` DISABLE KEYS */;
INSERT INTO `subchecklistfiles` VALUES (1,'Django Task (1).docx',NULL,'docx','4','1','1'),(2,'Python Probation Task.docx',NULL,'docx','4','1','1'),(3,'checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1'),(4,'checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1'),(5,'checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1'),(8,'checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1'),(9,'checklist page','<p>subchecklist</p>\r\n','editorData','4','1','1');
/*!40000 ALTER TABLE `subchecklistfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subcheclist`
--

LOCK TABLES `subcheclist` WRITE;
/*!40000 ALTER TABLE `subcheclist` DISABLE KEYS */;
INSERT INTO `subcheclist` VALUES (1,'subchecklist1','4',NULL,NULL,NULL,NULL,NULL),(2,'subchecklist2','4',NULL,NULL,NULL,NULL,NULL),(3,'checklist 3','4',NULL,NULL,NULL,NULL,NULL),(4,'checklist4','4',NULL,NULL,NULL,NULL,NULL),(5,'Checklist 1','5',NULL,NULL,NULL,NULL,NULL),(6,'subchecklist 77','5',NULL,NULL,NULL,NULL,NULL),(7,'subchecklist 88','5',NULL,NULL,NULL,NULL,NULL),(8,'subchecklist 0','5',NULL,NULL,NULL,NULL,NULL),(9,'subchecklist 10','5',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `subcheclist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subitem`
--

LOCK TABLES `subitem` WRITE;
/*!40000 ALTER TABLE `subitem` DISABLE KEYS */;
INSERT INTO `subitem` VALUES (1,'1','2','1','9','1','actual',NULL),(2,'1','3','1','9','1','actual',NULL),(3,'1','2','1','8','1','actual',NULL),(4,'1','3','1','8','1','actual',NULL),(5,'2','5','1','8','1','actual',NULL),(6,'2','6','1','8','1','actual',NULL),(7,'1','7','1','1','1','actual',NULL),(8,'1','8','1','1','1','actual',NULL);
/*!40000 ALTER TABLE `subitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subitem_cloned_gradesheet`
--

LOCK TABLES `subitem_cloned_gradesheet` WRITE;
/*!40000 ALTER TABLE `subitem_cloned_gradesheet` DISABLE KEYS */;
INSERT INTO `subitem_cloned_gradesheet` VALUES (1,'29','7','F','1','2023-11-29'),(2,'29','8','U','1','2023-11-29');
/*!40000 ALTER TABLE `subitem_cloned_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subitem_gradesheet`
--

LOCK TABLES `subitem_gradesheet` WRITE;
/*!40000 ALTER TABLE `subitem_gradesheet` DISABLE KEYS */;
INSERT INTO `subitem_gradesheet` VALUES (1,'29','7','U','2023-11-29'),(2,'29','8','F','2023-11-29');
/*!40000 ALTER TABLE `subitem_gradesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `table_golas`
--

LOCK TABLES `table_golas` WRITE;
/*!40000 ALTER TABLE `table_golas` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_golas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `temp_cat`
--

LOCK TABLES `temp_cat` WRITE;
/*!40000 ALTER TABLE `temp_cat` DISABLE KEYS */;
INSERT INTO `temp_cat` VALUES (1,'2'),(2,'5');
/*!40000 ALTER TABLE `temp_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tempbrief`
--

LOCK TABLES `tempbrief` WRITE;
/*!40000 ALTER TABLE `tempbrief` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempbrief` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'test','T01','','100','1','1','2023-07-17',25),(2,'Parking','T02','','100','1','1','2023-07-17',8),(3,'Parking','TOS-16','','100','1','1','2023-08-09',NULL),(4,'test','TOS-1','','100','1','1','2023-08-09',NULL),(5,'test5','TOS-2','','100','1','1','2023-08-09',NULL),(6,'test5','TOS-3','','100','1','1','2023-08-09',NULL),(7,'Parking','TOS-4','','100','1','1','2023-08-09',NULL),(8,'test','TOS-5','','100','1','1','2023-08-09',NULL),(9,'Parking','TOS-6','','100','1','1','2023-08-09',NULL),(10,'test','TOS-7','','100','1','1','2023-08-09',NULL),(11,'Parking','TOS-8','','100','1','1','2023-08-09',NULL),(12,'test','TOS-9','','100','1','1','2023-08-09',NULL),(13,'Parking','TOS-10','','100','1','1','2023-08-09',NULL),(14,'test5','TOS-11','','100','1','1','2023-08-09',NULL),(15,'Parking','TOS-12','','100','1','1','2023-08-09',NULL),(16,'test','TOS-13','','100','1','1','2023-08-09',NULL),(17,'Parking','TOS-14','','100','1','1','2023-08-09',NULL),(18,'test','TOS-15','','100','1','1','2023-08-09',NULL),(19,'Parking','TOS-17','','100','1','1','2023-08-09',NULL),(20,'test','TOS-18','','100','1','1','2023-08-09',NULL),(21,'Parking','TOS-19','','100','1','1','2023-08-09',NULL),(22,'Parking','TOS-20','','100','1','1','2023-08-09',NULL),(23,'Test on Introduction to Medicinal Plants and Soil Types','T03','','100','1','1','2023-08-31',NULL),(24,'Parking','T04','','100','1','1','2023-08-31',1),(25,'Test on Introduction to Medicinal Plants and Soil Types','T05','','100','1','1','2023-08-31',NULL),(26,'Planting Techniques','T06','','100','1','1','2023-08-31',NULL),(27,'test','T07','','100','1','1','2023-08-31',1),(28,'Test on Watering Techniques and Fertilization Methods','T08','','100','1','1','2023-08-31',NULL),(29,'test5','T09','','100','1','1','2023-08-31',NULL),(30,'Parking','T010','','100','1','1','2023-08-31',NULL),(31,'test45','T045','','100','2','2','2024-01-27',NULL);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_cloned_data`
--

LOCK TABLES `test_cloned_data` WRITE;
/*!40000 ALTER TABLE `test_cloned_data` DISABLE KEYS */;
INSERT INTO `test_cloned_data` VALUES (1,2,29,1,'1','86','12'),(2,2,29,1,'2','75','11'),(3,1,29,1,'1','40','11');
/*!40000 ALTER TABLE `test_cloned_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_course`
--

LOCK TABLES `test_course` WRITE;
/*!40000 ALTER TABLE `test_course` DISABLE KEYS */;
INSERT INTO `test_course` VALUES (1,'HTML New','Markup language hello','0000-00-00'),(2,'CSS','cascading stylesheet','0000-00-00'),(3,'Bootstrap','Use for responsive website','0000-00-00'),(4,'PHP','High speed language','0000-00-00'),(5,'MYSQL','Database to store data','0000-00-00'),(6,'Javascript','scripting language','0000-00-00'),(7,'Jquery','scripting language 2','0000-00-00'),(8,'Ajax','scripting language 3','0000-00-00'),(9,'driving','bdjkshfkjsrhks','2023-10-12'),(10,'Nature diagram','Nature related photos here','2023-10-12');
/*!40000 ALTER TABLE `test_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_data`
--

LOCK TABLES `test_data` WRITE;
/*!40000 ALTER TABLE `test_data` DISABLE KEYS */;
INSERT INTO `test_data` VALUES (1,1,29,'1','86','2023-11-21 10:42:20.000000','0','12'),(2,2,29,'1','0','2023-11-21 11:29:49.000000','1','12'),(20,0,29,'1','80','2024-01-17 11:04:12.000000','1','12'),(21,27,29,'1','87','2024-01-17 11:04:42.000000','1','11'),(22,24,29,'1','57','2024-01-17 11:05:26.000000','1','11'),(23,31,33,'2','88','2024-01-27 21:16:32.000000','1','11');
/*!40000 ALTER TABLE `test_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_phase`
--

LOCK TABLES `test_phase` WRITE;
/*!40000 ALTER TABLE `test_phase` DISABLE KEYS */;
INSERT INTO `test_phase` VALUES (1,'1','1'),(2,'2','2');
/*!40000 ALTER TABLE `test_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_updates`
--

LOCK TABLES `test_updates` WRITE;
/*!40000 ALTER TABLE `test_updates` DISABLE KEYS */;
INSERT INTO `test_updates` VALUES (1,'14','9','1','2023-11-15 10:56:38.000000','0',NULL,8,NULL,NULL,NULL),(2,'14','11','1','2023-11-15 14:34:05.000000','1','2023-11-15 14:34:58.000000',8,'failed','0','0'),(3,'16','12','1','2023-11-22 10:22:24.000000','0',NULL,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `test_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `testcatfil`
--

LOCK TABLES `testcatfil` WRITE;
/*!40000 ALTER TABLE `testcatfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `testcatfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_category_data`
--

LOCK TABLES `type_category_data` WRITE;
/*!40000 ALTER TABLE `type_category_data` DISABLE KEYS */;
INSERT INTO `type_category_data` VALUES (10,'2','sim','0','6',100.00000),(12,'3','test','0','all',100.00000),(13,'4','discipline','0','0',50.00000),(14,'5','self','0','0',50.00000),(15,'6','quiz','0','0',50.00000),(16,'1','actual','0','2',50.00000);
/*!40000 ALTER TABLE `type_category_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_data`
--

LOCK TABLES `type_data` WRITE;
/*!40000 ALTER TABLE `type_data` DISABLE KEYS */;
INSERT INTO `type_data` VALUES (1,'actual',40.00,'1'),(2,'sim',20.00,'1'),(3,'test1',7.50,'1'),(4,'discipline',5.00,'1'),(5,'self',5.00,'1'),(6,'quiz',5.00,'1');
/*!40000 ALTER TABLE `type_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `typegradefilter`
--

LOCK TABLES `typegradefilter` WRITE;
/*!40000 ALTER TABLE `typegradefilter` DISABLE KEYS */;
INSERT INTO `typegradefilter` VALUES (7,'1','80','Active');
/*!40000 ALTER TABLE `typegradefilter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unclock_gradsheet_reason`
--

LOCK TABLES `unclock_gradsheet_reason` WRITE;
/*!40000 ALTER TABLE `unclock_gradsheet_reason` DISABLE KEYS */;
INSERT INTO `unclock_gradsheet_reason` VALUES (1,'11','just testing','1','2024-01-31 11:22:21');
/*!40000 ALTER TABLE `unclock_gradsheet_reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unclock_gradsheet_reason1`
--

LOCK TABLES `unclock_gradsheet_reason1` WRITE;
/*!40000 ALTER TABLE `unclock_gradsheet_reason1` DISABLE KEYS */;
/*!40000 ALTER TABLE `unclock_gradsheet_reason1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `updatehide`
--

LOCK TABLES `updatehide` WRITE;
/*!40000 ALTER TABLE `updatehide` DISABLE KEYS */;
INSERT INTO `updatehide` VALUES (0,'16'),(2,'14'),(3,'12'),(4,'11'),(5,'36'),(6,'11'),(7,'11'),(8,'11'),(9,'15'),(10,'13'),(11,'11'),(12,'11'),(13,'11'),(14,'11'),(15,'11'),(16,'11');
/*!40000 ALTER TABLE `updatehide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_briefcase`
--

LOCK TABLES `user_briefcase` WRITE;
/*!40000 ALTER TABLE `user_briefcase` DISABLE KEYS */;
INSERT INTO `user_briefcase` VALUES (1,'brief 1',11,'2','2',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(2,'brief 1',11,'0','2',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(3,'brief 1',11,'9','6',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(4,'Ad',11,'2','2',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(5,'brief 3',11,'2','2',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(6,'Briefcase 1aaa',11,'0','0',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(7,'brief testaaaa',11,'0','0',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(8,'brief 6aaaa',11,'2','2',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(9,'brief test11',11,'0','0',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(10,'11111brie',11,'0','0',NULL,'super admin','red',NULL,NULL,NULL,NULL,NULL),(465,'Driving',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'1'),(466,'Parking',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'3'),(467,'phase',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'4'),(468,'test phase',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'6'),(469,'academic phase',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'7'),(470,'PRK-1',11,'129','21',NULL,'super admin','red','1','actual',NULL,NULL,NULL),(471,'ADR-2',11,'129','21',NULL,'super admin','red','2','actual',NULL,NULL,NULL),(472,'ADR-3',11,'129','21',NULL,'super admin','red','3','actual',NULL,NULL,NULL),(473,'ADR-2',11,'129','21',NULL,'super admin','red','4','actual',NULL,NULL,NULL),(474,'ADR-8',11,'129','21',NULL,'super admin','red','8','actual',NULL,NULL,NULL),(475,'ADR-7',11,'129','21',NULL,'super admin','red','9','actual',NULL,NULL,NULL),(476,'wqopjow',11,'129','21',NULL,'super admin','red','10','actual',NULL,NULL,NULL),(477,'2uiy2iywio',11,'129','21',NULL,'super admin','red','11','actual',NULL,NULL,NULL),(478,'202uu2o',11,'129','21',NULL,'super admin','red','12','actual',NULL,NULL,NULL),(479,'ADR-366',11,'129','21',NULL,'super admin','red','13','actual',NULL,NULL,NULL),(480,'ADR-234',11,'129','21',NULL,'super admin','red','14','actual',NULL,NULL,NULL),(481,'ADR-100',11,'129','21',NULL,'super admin','red','15','actual',NULL,NULL,NULL),(482,'APR-10',11,'129','21',NULL,'super admin','red','16','actual',NULL,NULL,NULL),(483,'APR-9',11,'129','21',NULL,'super admin','red','17','actual',NULL,NULL,NULL),(484,'APR-8',11,'129','21',NULL,'super admin','red','18','actual',NULL,NULL,NULL),(485,'APR-7',11,'129','21',NULL,'super admin','red','19','actual',NULL,NULL,NULL),(486,'APR-6',11,'129','21',NULL,'super admin','red','20','actual',NULL,NULL,NULL),(487,'APR-4',11,'129','21',NULL,'super admin','red','21','actual',NULL,NULL,NULL),(488,'APR-3',11,'129','21',NULL,'super admin','red','22','actual',NULL,NULL,NULL),(489,'APR-2',11,'129','21',NULL,'super admin','red','23','actual',NULL,NULL,NULL),(490,'park 1',11,'129','21',NULL,'super admin','red','24','actual',NULL,NULL,NULL),(491,'park',11,'129','21',NULL,'super admin','red','25','actual',NULL,NULL,NULL),(492,'SDR-1',11,'129','21',NULL,'super admin','red','4','sim',NULL,NULL,NULL),(493,'SDR-2',11,'129','21',NULL,'super admin','red','5','sim',NULL,NULL,NULL),(494,'SDR-3',11,'129','21',NULL,'super admin','red','6','sim',NULL,NULL,NULL),(495,'SDR-4',11,'129','21',NULL,'super admin','red','7','sim',NULL,NULL,NULL),(496,'SDR-6225',11,'129','21',NULL,'super admin','red','11','sim',NULL,NULL,NULL),(497,'SDR-145',11,'129','21',NULL,'super admin','red','12','sim',NULL,NULL,NULL),(498,'SDR-615',11,'129','21',NULL,'super admin','red','13','sim',NULL,NULL,NULL),(499,'SDR-42',11,'129','21',NULL,'super admin','red','14','sim',NULL,NULL,NULL),(500,'door',11,'129','21',NULL,'super admin','red','15','sim',NULL,NULL,NULL),(501,'SDR-60',11,'129','21',NULL,'super admin','red','16','sim',NULL,NULL,NULL),(502,'SDR-19',11,'129','21',NULL,'super admin','red','17','sim',NULL,NULL,NULL),(503,'SDR-134',11,'129','21',NULL,'super admin','red','18','sim',NULL,NULL,NULL),(504,'   s  s s',11,'129','21',NULL,'super admin','red','19','sim',NULL,NULL,NULL),(505,'park',11,'129','21',NULL,'super admin','red','20','sim',NULL,NULL,NULL),(506,'back',11,'129','21',NULL,'super admin','red','21','sim',NULL,NULL,NULL),(507,'SDR-15',11,'129','21',NULL,'super admin','red','22','sim',NULL,NULL,NULL),(508,'SDR-191',11,'129','21',NULL,'super admin','red','23','sim',NULL,NULL,NULL),(509,'SDR-623',11,'129','21',NULL,'super admin','red','24','sim',NULL,NULL,NULL),(510,'back46',11,'129','21',NULL,'super admin','red','25','sim',NULL,NULL,NULL),(511,'SDR-1p2i',11,'129','21',NULL,'super admin','red','26','sim',NULL,NULL,NULL),(512,'whio',11,'129','21',NULL,'super admin','red','27','sim',NULL,NULL,NULL),(513,'jeiekwl',11,'129','21',NULL,'super admin','red','28','sim',NULL,NULL,NULL),(514,'ADR-9',11,'130','21',NULL,'super admin','red','5','actual',NULL,NULL,NULL),(515,'ADR-92',11,'130','21',NULL,'super admin','red','6','actual',NULL,NULL,NULL),(516,'ADR-11',11,'130','21',NULL,'super admin','red','7','actual',NULL,NULL,NULL),(517,'PPK',11,'130','21',NULL,'super admin','red','27','actual',NULL,NULL,NULL),(518,'SDR-62',11,'130','21',NULL,'super admin','red','8','sim',NULL,NULL,NULL),(519,'SDR-14',11,'130','21',NULL,'super admin','red','9','sim',NULL,NULL,NULL),(520,'SDR-61',11,'130','21',NULL,'super admin','red','10','sim',NULL,NULL,NULL),(521,'Act1',11,'131','21',NULL,'super admin','red','28','actual',NULL,NULL,NULL),(522,'Act2',11,'131','21',NULL,'super admin','red','29','actual',NULL,NULL,NULL),(523,'abcd',11,'134','21',NULL,'super admin','red',NULL,'course','13','25',NULL),(524,'std1',11,'135','21',NULL,'super admin','red',NULL,'course','21','27',NULL),(525,'std3',11,'136','21',NULL,'super admin','red',NULL,'course','22','29',NULL),(526,'Archana',11,'136','21',NULL,'super admin','red',NULL,'course','22','13',NULL),(527,'inst',11,'136','21',NULL,'super admin','red',NULL,'course','22','16',NULL),(528,'archi',11,'136','21',NULL,'super admin','red',NULL,'course','22','14',NULL),(529,'archi3',11,'136','21',NULL,'super admin','red',NULL,'course','22','18',NULL),(530,'archi1',11,'136','21',NULL,'super admin','red',NULL,'course','22','19',NULL),(531,'archi4',11,'136','21',NULL,'super admin','red',NULL,'course','22','20',NULL),(532,'user1',11,'136','21',NULL,'super admin','red',NULL,'course','22','23',NULL),(533,'stu',11,'136','21',NULL,'super admin','red',NULL,'course','22','17',NULL),(534,'abcd',11,'137','21',NULL,'super admin','red',NULL,'course','23','30',NULL),(535,'ayu',11,'138','21',NULL,'super admin','red',NULL,'course','24','31',NULL),(536,'varun',11,'139','21',NULL,'super admin','red',NULL,'course','29','32',NULL),(537,'user4',11,'139','21',NULL,'super admin','red',NULL,'course','29','24',NULL),(538,'anchit',11,'140','21',NULL,'super admin','red',NULL,'course','45','34',NULL),(539,'phase5',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'12'),(540,'phase6',11,'128','21',NULL,'super admin','red',NULL,'academic',NULL,NULL,'13'),(541,'act10',11,'142','21',NULL,'super admin','red','36','actual',NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_briefcase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_event`
--

LOCK TABLES `user_event` WRITE;
/*!40000 ALTER TABLE `user_event` DISABLE KEYS */;
INSERT INTO `user_event` VALUES (1,'11','Graduation Ceremony','offer.png','png','2023-07-20'),(2,'11','Graduation Ceremony','sced.png','png','2023-07-20'),(3,'11','Graduation Ceremony','time.jpg','jpg','2023-07-20'),(4,'11','Graduation Ceremony','Asset 3.png','png','2023-07-20'),(5,'11','Graduation Ceremony','BF42337D.png','png','2023-07-20'),(6,'11','Graduation Ceremony','Flower_11.jpg','jpg','2023-07-20'),(7,'11','MCA Ceremony','MicrosoftTeams-image (48).png','png','2023-08-02'),(8,'11','MCA Ceremony','GS.png','png','2023-08-02'),(9,'11','MCA Ceremony','MicrosoftTeams-image (43).png','png','2023-08-02'),(10,'11','MCA Ceremony','MicrosoftTeams-image (41).png','png','2023-08-02'),(11,'11','MCA Ceremony','MicrosoftTeams-image (31).png','png','2023-08-02'),(12,'11','Msarii Unite','MicrosoftTeams-image (11).png','png','2023-08-02'),(13,'11','Msarii Unite','agesearch v3_1.png','png','2023-08-02'),(14,'11','Msarii Unite','MicrosoftTeams-image (6).png','png','2023-08-02'),(15,'11','Msarii Unite','time.jpg','jpg','2023-08-02'),(16,'11','Msarii Unite','kudos.jpg','jpg','2023-08-02'),(17,'11','Gathering Function','MicrosoftTeams-image (11).png','png','2023-08-02'),(18,'11','Gathering Function','MicrosoftTeams-image (28).png','png','2023-08-02'),(19,'11','Gathering Function','MicrosoftTeams-image (27).png','png','2023-08-02'),(20,'11','Gathering Function','time.jpg','jpg','2023-08-02'),(21,'11','Gathering Function','Asset 3.png','png','2023-08-02');
/*!40000 ALTER TABLE `user_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_files`
--

LOCK TABLES `user_files` WRITE;
/*!40000 ALTER TABLE `user_files` DISABLE KEYS */;
INSERT INTO `user_files` VALUES (1,'Assignment.pdf',NULL,'pdf',NULL,NULL,'129','21','11','super admin','red','2023-07-06','2024-01-19','A4','Bharti',NULL,'menu',10,NULL,'1'),(2,'new plan (2).xlsx',NULL,'xlsx',NULL,NULL,'98','19','11','super admin','blue','2023-07-06','2023-07-06','A4','A4',NULL,'menu',10,NULL,'1'),(3,'New Page.pdf',NULL,'pdf',NULL,NULL,'98','19','11','super admin','blue','2023-07-06','2023-07-06','A4','A4',NULL,'megmenu',4,NULL,'1'),(4,'Briefcase v2.png',NULL,'png','0',NULL,'2','2','11','super admin','blue','2023-07-06','2023-07-06','A4','A4',NULL,'NULL',0,NULL,NULL),(5,'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','0',NULL,'2','2','11','super admin','red','2023-07-06','2023-07-06','A4','A4','','files',5,NULL,NULL),(6,'https://www.facebook.com/','linkhiuh9i','online','6',NULL,'0','0','11','super admin','red','2023-07-06','2023-07-06','A4','A4','','megmenu',4,NULL,NULL),(12,'new plan (2) (1).xlsx',NULL,'xlsx','3',NULL,'2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user','files',4,NULL,NULL),(13,'archana pages (1).pdf',NULL,'pdf','3',NULL,'2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user','files',4,NULL,NULL),(14,'new plan (9) (1) (2) (5) (3) (1).xlsx',NULL,'xlsx','3',NULL,'2','2','15','instructor','yellow','2023-07-06','2023-07-06','inst1','inst1','user',NULL,0,NULL,NULL),(15,'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','3',NULL,'2','2','15','instructor','red','2023-07-06','2023-07-06','inst1','inst1','user','NULL',0,NULL,NULL),(16,'C:\\xampp2\\htdocs\\latest\\TOS\\includes\\Pages\\files','links','offline','0',NULL,'2','2','13','student','red','2023-07-06','2023-07-06','inst','inst','','NULL',0,NULL,NULL),(17,'google.com','zae','offline','1',NULL,'2','2','13','super admin','red','2023-07-07','2023-07-07','A4','A4','user','NULL',0,NULL,NULL),(18,'C:\\xampp\\htdocs','C:xampph','offline','5',NULL,'2','2','11','super admin','red','2023-07-07','2023-07-07','A4','A4','user',NULL,0,NULL,NULL),(20,'1.mp4',NULL,'mp4','1',NULL,'2','2','11','super admin','red','2023-07-11','2023-07-11','A4','A4','user',NULL,0,NULL,NULL),(21,'bzdfb.pdf',NULL,'pdf','6',NULL,'0','0','11','super admin','red','2023-07-12','2023-07-12','A4','A4',NULL,'NULL',0,NULL,NULL),(22,'folder page varun.pdf',NULL,'pdf','7',NULL,'0','0','11','super admin','red','2023-07-12','2023-07-12','A4','A4',NULL,'NULL',0,NULL,NULL),(23,'WhatsApp Video 2022-12-23 at 21.02.06.mp4',NULL,'mp4','7',NULL,'0','0','11','super admin','red','2023-07-19','2023-07-19','A4','A4',NULL,NULL,0,NULL,NULL),(25,'MicrosoftTeams-image (12).png',NULL,'png','0',NULL,'0','0','11','super admin','red','2023-07-19','2023-07-19','A4','A4',NULL,NULL,0,NULL,NULL),(26,'MicrosoftTeams-image (11).png',NULL,'png','0',NULL,'0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4',NULL,NULL,0,NULL,NULL),(27,'MicrosoftTeams-image (10).png',NULL,'png','0',NULL,'0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4',NULL,NULL,0,NULL,NULL),(28,'MicrosoftTeams-image (9).png',NULL,'png','0',NULL,'0','0','11','super admin','blue','2023-07-19','2023-07-19','A4','A4',NULL,NULL,0,NULL,NULL),(30,'ayushi.pdf',NULL,'pdf','1',NULL,'2','2','11','super admin','red','2023-07-24','2023-07-24','A4','A4','user',NULL,0,NULL,NULL),(31,'01.pdf',NULL,'pdf','0',NULL,'2','2','11','super admin','red','2023-07-24','2023-07-24','A4','A4','',NULL,0,NULL,NULL),(32,'MicrosoftTeams-image (32).png',NULL,'png','1',NULL,'2','2','11','super admin','red','2023-07-26','2023-07-26','A4','A4','user',NULL,0,NULL,NULL),(33,'MicrosoftTeams-image (35).png',NULL,'png','2',NULL,'2','2','11','super admin','red','2023-07-26','2023-07-26','A4','A4','user',NULL,0,NULL,NULL),(34,'Python Probation Task (1).docx',NULL,'docx','0',NULL,'0','0','11','super admin','red','2023-09-01','2023-09-01','A4','A4',NULL,'files',3,NULL,NULL),(35,'C:\\Users\\Lenovo\\Desktop\\Im','checking','online','0',NULL,'0','0','11','super admin','red','2023-09-01','2023-09-01','A4','A4','',NULL,0,NULL,NULL),(36,'Resume--Munavar.pdf',NULL,'pdf','0',NULL,'2','2','11','super admin','red','2023-10-10','2023-10-10','A4','A4','',NULL,0,NULL,NULL),(37,'Shivani_Sharma.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-10-31','2023-10-31','A4','A4',NULL,NULL,0,'chat',NULL),(38,'success.jpg',NULL,'jpg',NULL,NULL,NULL,'0','11','super admin','red','2023-10-31','2023-10-31','A4','A4',NULL,NULL,0,'chat',NULL),(39,'C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS','C:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-10-31','2023-10-31','A4','A4',NULL,NULL,0,'chat',NULL),(40,'arudantech.com/','arudantech','online',NULL,NULL,NULL,'0','11','super admin','red','2023-10-31','2023-10-31','A4','A4',NULL,NULL,0,NULL,NULL),(42,'Shivani_Sharma.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-11-01','2023-11-01','A4','A4',NULL,NULL,0,'chat',NULL),(43,'76895-shivamcv-2.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-11-01','2023-11-01','A4','A4',NULL,NULL,0,'academic',NULL),(44,'Shivani_Sharma.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(45,'Django Task (1).docx',NULL,'docx',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(46,'C:\\xampp\\\\htdocs\\latest\\TOS','C:xampph','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(47,'D:\\xampp','D:xampp','online',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,NULL,NULL),(48,'Shivani_Sharma.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(49,'Python Probation Task (1).docx',NULL,'docx',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(51,'C:\\xampp\\htdocs','C:xampph','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(52,'D:\\xampp\\htdocs','D:xampph','online',NULL,NULL,NULL,'0','11','super admin','red','2023-11-02','2023-11-02','A4','A4',NULL,NULL,0,'chat',NULL),(53,'VarunPicture.jpeg',NULL,'jpeg',NULL,NULL,NULL,'0','11','super admin','red','2023-11-03','2023-11-03','A4','A4',NULL,NULL,0,'chat',NULL),(54,'check.jpg',NULL,'jpg',NULL,NULL,NULL,'0','11','super admin','red','2023-11-03','2023-11-03','A4','A4',NULL,NULL,0,'chat',NULL),(55,'C:\\\\xampp\\\\htdocs/Tos','C:xampph','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-06','2023-12-18','A4','Bharti',NULL,NULL,0,'academic',NULL),(56,'http://arudantech.com/','http://aru','online',NULL,NULL,NULL,'0','11','super admin','red','2023-11-06','2023-11-06','A4','A4',NULL,NULL,0,'academic',NULL),(57,'C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS','C:\\xampp\\h','offline',NULL,NULL,NULL,'0','12','instructor','yellow','2023-11-06','2023-11-06','Bharti','Bharti',NULL,NULL,0,'chat',NULL),(58,'81660-shivani_sharma.pdf',NULL,'',NULL,NULL,NULL,'0','11','super admin','red','2023-11-06','2023-11-06','A4','A4',NULL,NULL,0,'academic',NULL),(60,'admin test.html',NULL,'html',NULL,NULL,NULL,'0','11','super admin','red','2023-11-07','2023-11-07','A4','A4',NULL,NULL,0,'testDoc',NULL),(61,'D:\\xampp\\htdocs/latest','D:xampph','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-07','2023-11-07','A4','A4',NULL,NULL,0,'testDoc',NULL),(62,'http://arudantech.com/services','http://aru','online',NULL,NULL,NULL,'0','11','super admin','red','2023-11-07','2023-11-07','A4','A4',NULL,NULL,0,'testDoc',NULL),(63,'C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS\'s','C:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-07','2023-11-07','A4','A4',NULL,NULL,0,'chat',NULL),(64,'C:\\\\xampp','C:\\xampp','offline',NULL,NULL,NULL,'0','12','instructor','yellow','2023-11-07','2023-11-07','Bharti','Bharti',NULL,NULL,0,'chat',NULL),(65,'webrun: D:\\xampp\\htdocs','webrun: D:','online','5',NULL,'2','2','11','super admin','red','2023-11-09','2023-11-09','A4','A4','user',NULL,0,NULL,NULL),(66,'https://www.google.com/','https://ww','online','5',NULL,'2','2','11','super admin','red','2023-11-09','2023-11-09','A4','A4','user','files',6,NULL,NULL),(67,'https://chat.openai.com/c/41263fe5-77a6-4829-90dc-6c379b032851','https://ch','online','5',NULL,'2','2','11','super admin','red','2023-11-14','2023-11-14','A4','A4','user','files',7,NULL,NULL),(69,'C:\\\\xampp\\\\htdocs\\\\latest\\\\TOS\'s','C:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-16','2023-11-16','A4','A4',NULL,NULL,0,NULL,NULL),(70,'C:\\\\xampp/Tos','C:xampp','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-11-16','2023-11-17','A4','Bharti',NULL,NULL,0,NULL,NULL),(71,'D:\\\\xampp\\\\htdocs','D:\\xampp\\h','online',NULL,NULL,NULL,'0','11','super admin','red','2023-11-16','2023-11-16','A4','A4',NULL,NULL,0,NULL,NULL),(72,'test page (1).docx',NULL,'docx',NULL,NULL,NULL,'0','11','super admin','red','2023-12-07','2023-12-07','A4','A4',NULL,NULL,0,NULL,NULL),(74,'D:\\\\xampp\\\\htdocs','D:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-12-07','2023-12-07','A4','A4',NULL,NULL,0,NULL,NULL),(75,'arudantech.com/','arudantech','online',NULL,NULL,NULL,'0','11','super admin','red','2023-12-07','2023-12-07','A4','A4',NULL,NULL,0,NULL,NULL),(76,'filename.docx',NULL,'docx',NULL,NULL,NULL,'0','11','super admin','red','2023-12-07','2023-12-07','A4','A4',NULL,NULL,0,NULL,NULL),(77,'https://github.com/ayushimsarii/TOS','https://gi','online','238',NULL,'81','18','11','super admin','red','2023-12-11','2023-12-11','A4','A4','user',NULL,0,NULL,NULL),(78,'sumashetty-resume.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(79,'D:\\\\xampp\\\\htdocs','D:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(80,'D:\\\\xampp\\\\htdocs','D:\\xampp\\h','offline',NULL,NULL,NULL,'0','11','super admin','red','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(81,'madhun.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(82,'madhun.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','blue','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(83,'madhun.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-12-12','2023-12-12','A4','A4',NULL,NULL,0,NULL,NULL),(84,'http://localhost/phpmyadmin/','http://loc','online','298',NULL,'89','18','11','super admin','red','2023-12-12','2023-12-12','A4','A4','user',NULL,0,NULL,NULL),(85,'veni_resume_20231204 (1).pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-12-13','2023-12-13','A4','A4',NULL,NULL,0,NULL,NULL),(86,'arudantech.com/','aru','online',NULL,NULL,NULL,'0','11','super admin','red','2023-12-22','2023-12-22','A4','A4',NULL,NULL,0,NULL,NULL),(87,'chandra_pathak_resume (6).pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2023-12-27','2023-12-27','A4','A4',NULL,NULL,0,NULL,NULL),(88,'admin test.pdf',NULL,'pdf','0',NULL,'98','19','11','super admin','red','2024-01-23','2024-01-23','A4','A4','',NULL,0,NULL,NULL),(89,'Assignment.pdf',NULL,'pdf',NULL,NULL,NULL,'0','11','super admin','red','2024-01-23','2024-01-23','A4','A4',NULL,NULL,0,NULL,NULL),(90,'Screenshot (1).png',NULL,'png',NULL,NULL,'98','19','11','super admin','red','2024-01-23','2024-01-23','A4','A4',NULL,NULL,0,NULL,NULL),(91,'Screenshot (33).png',NULL,'png','0',NULL,'98','19','11','super admin','red','2024-01-23','2024-01-23','A4','A4','',NULL,0,NULL,NULL),(92,'report (3).xlsx',NULL,'xlsx',NULL,NULL,'129','21','11','super admin','red','2024-01-31','2024-01-31','A4','A4',NULL,NULL,0,NULL,'1'),(93,'report (2).xlsx',NULL,'xlsx','0',NULL,'129','21','11','super admin','red','2024-01-31','2024-01-31','A4','A4','',NULL,0,NULL,'1');
/*!40000 ALTER TABLE `user_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userdepartment`
--

LOCK TABLES `userdepartment` WRITE;
/*!40000 ALTER TABLE `userdepartment` DISABLE KEYS */;
INSERT INTO `userdepartment` VALUES (1,'12','1'),(2,'12','2'),(3,'13','2'),(4,'15','1');
/*!40000 ALTER TABLE `userdepartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `userdocumnet`
--

LOCK TABLES `userdocumnet` WRITE;
/*!40000 ALTER TABLE `userdocumnet` DISABLE KEYS */;
INSERT INTO `userdocumnet` VALUES (1,'13','1','Shahid_Akhtar_Resume (3-yrs Exp.pdf','pdf');
/*!40000 ALTER TABLE `userdocumnet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'850_6727-PRINT.jpg','2023-08-24 12:50:42','A4','A4','HA','admin','super admin',2147483647,'gender','A4','11','ayushi2@gmail.com1','25d55ad283aa400af464c76d713c07ad','2022-06-06 10:31:19',0,NULL,'data:image/png;base64,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','',NULL,NULL,NULL,'','',NULL,''),(12,'agesearch v3_1.png','2023-07-20 13:01:00','Ayushi bharti','Bharti',NULL,'inst1','instructor',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'1',NULL,'',NULL,NULL,NULL,'','',NULL,''),(13,'Donna.png','2023-09-11 17:21:31','student1','Archana',NULL,'inst2','instructor',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(14,'Donna.png','2023-07-19 15:28:57','student2','archi','AR','std1','student',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-05-10 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(15,'pngtree-a-small-pink-white-flower-png-image_2664964.png',NULL,'varun mishra','varun',NULL,'inst33','instructor',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(16,'Donna.png','2023-03-08 13:58:47','archana guthale','inst',NULL,'studen4','student',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-04-05 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(17,'Donna.png',NULL,'jhvbsrf','stu','in','studen48','student',2147483647,'male',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-06-06 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(18,'Donna.png',NULL,'archana guthale','archi3','ar','archana','student',702136474,'male',NULL,'11','archana@msarii.com','cf65e9e5920cda080f7903a968ad9744','2022-06-06 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(19,'Donna.png',NULL,'archana guthale','archi1','','studen9','student',702136474,'male',NULL,'11','archana@msarii.com','827ccb0eea8a706c4c34a16891f84e7b','2022-01-12 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(20,'Donna.png',NULL,'archana','archi4','st','std20','student',702136474,'female',NULL,'11','archana@msarii.com','25d55ad283aa400af464c76d713c07ad','2022-07-13 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(21,'Donna.png',NULL,'student','stu','AR','std10','student',702136474,'male',NULL,'11','archana@msarii.com','26bca7d18fac41f574d34da8d6df4170','2022-08-18 10:31:19',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(22,'Donna.png',NULL,'student','inst','ar','std11','student',702136474,'male',NULL,'11','archana@msarii.com','26bca7d18fac41f574d34da8d6df4170','2023-09-13 00:00:00',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(23,'Donna.png',NULL,'testing user','user1','AR','std103','student',2147483647,'female',NULL,'11','archana@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','2023-10-19 00:00:00',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(24,'Donna.png',NULL,'archana guthale','user4','AR','STD09','student',919474512,'female',NULL,'11','archana@gmail.com','26bca7d18fac41f574d34da8d6df4170','2023-12-14 00:00:00',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(25,'Donna.png',NULL,'abcd','abcd','AB','std7','student',876543219,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad','2023-02-21 00:00:00',NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(26,'Donna.png',NULL,'Ayushi Bharti','ayu','ayu','std44','IT people',883012547,'female',NULL,'11','ayushi260395@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(27,'Donna.png',NULL,'student1','std1','SD','std0','student',2147483647,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(28,'Donna.png',NULL,'student2','std2','SA','std9','student',2147483647,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(29,'Donna.png','2023-08-08 10:41:40','student3','std3','SG','std8','student',876543219,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(30,'Donna.png',NULL,'abcdefgh','abcd','MA','sti9','student',2147483647,'male',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(31,'Donna.png',NULL,'ayushi','ayu','MAA','std66','student',876543219,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(32,'Donna.png',NULL,'Varun Mishra','varun','VV','std88','student',876543219,'male',NULL,'11','jack@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(33,'Donna.png',NULL,'Archana Nair','Archana','AA','std55','student',876543219,'female',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(34,'Donna.png',NULL,'Anchit ','anchit','AN','std99','student',876543219,'male',NULL,'11','ayushi2@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(36,'success.jpg',NULL,'akansha','sabre','NA','akansha','instructor',630660463,'female',NULL,'11','akansha123@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(37,NULL,NULL,'akansha1','sabre1','NA','akansha1','instructor',630660463,'female',NULL,'11','akansha1123@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(38,NULL,NULL,'varun stu','varun12','NA','betu','student',630660463,'male',NULL,'11','varun1234@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,''),(39,NULL,NULL,'an','ans','NA','anshi','student',630660463,'female',NULL,'11','ans@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'','',NULL,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,NULL,'1','hsdjsd','dsmd');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vehicletype`
--

LOCK TABLES `vehicletype` WRITE;
/*!40000 ALTER TABLE `vehicletype` DISABLE KEYS */;
INSERT INTO `vehicletype` VALUES (1,'Car'),(2,'SUV ');
/*!40000 ALTER TABLE `vehicletype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `warning_category_data`
--

LOCK TABLES `warning_category_data` WRITE;
/*!40000 ALTER TABLE `warning_category_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `warning_category_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `warning_data`
--

LOCK TABLES `warning_data` WRITE;
/*!40000 ALTER TABLE `warning_data` DISABLE KEYS */;
INSERT INTO `warning_data` VALUES (1,'Yellow Warninig','1',NULL,NULL,NULL,NULL,'#401cf2'),(2,'Red Warning','1',NULL,NULL,NULL,NULL,'brown'),(3,'green warning','2',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `warning_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `warning_permission`
--

LOCK TABLES `warning_permission` WRITE;
/*!40000 ALTER TABLE `warning_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `warning_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `working_file`
--

LOCK TABLES `working_file` WRITE;
/*!40000 ALTER TABLE `working_file` DISABLE KEYS */;
INSERT INTO `working_file` VALUES (1,'87');
/*!40000 ALTER TABLE `working_file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-31 11:29:08
