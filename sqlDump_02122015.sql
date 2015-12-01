-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: rgk-solution
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'George','Martin'),(2,'Stephen','King'),(3,'John','Tolkien'),(4,'Tom','Clancy'),(5,'Joanne','Rowling');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (32,'The Lord of the Rings','2015-12-01 19:04:43','2015-12-02 01:40:30','WOByuUb7DehBMw61-RoaNRCe8zHVu8Ex.jpg','1955-05-24',3),(33,'The Hobbit','2015-12-01 19:06:05','2015-12-01 19:06:05','RBRTMgjzodHqtx1SJZ8a8VXgF15Xg29k.jpg','1936-12-16',3),(34,'A Game of Thrones','2015-12-01 19:09:49','2015-12-01 19:09:49','eeDrqvgxbGZKzU4T_Vl6SyYK_AVHHbc9.jpeg','1996-08-13',1),(35,'A Clash of Kings','2015-12-01 19:11:33','2015-12-01 19:11:33','964yUsCpUQQGRta4D42HeFa1yHK0EDyV.jpg','1999-02-18',1),(36,'A Storm of Swords','2015-12-01 19:12:56','2015-12-01 19:12:56','M7qkebk8_lc2lUxrcIisSoc8p74gi6hX.jpg','2000-11-09',1),(37,'A Feast for Crows','2015-12-01 19:13:56','2015-12-01 19:13:56','iIEYNzVQfjUVsOcJw1bl_ytHzc3bie-L.jpg','2005-11-08',1),(39,'The Hunt for Red October','2015-12-01 19:18:52','2015-12-01 19:18:52','nnMV-hL0QGShIwmGsd88BADrApbDsRjK.jpg','1984-04-22',4),(40,'Red Storm Rising','2015-12-01 19:20:17','2015-12-01 19:20:17','zAIYS1HnzXy8oiU7KcbKOV9VWjFmrZWB.jpg','1986-01-15',4),(41,'Patriot Games','2015-12-01 19:22:12','2015-12-01 19:22:12','K-ykQZ7GVWWEVCQzqni3-I1jWhOLQW1J.jpg','1987-02-23',4),(42,'Harry Potter and the Philosopher\'s Stone','2015-12-01 22:40:39','2015-12-01 22:40:39','JXaxGpFNbI7NIKcDO6FcZ-Qs3CRoHmVd.jpg','1998-07-09',5),(43,'Harry Potter and the Chamber of Secrets','2015-12-01 22:41:56','2015-12-01 22:41:56','LgHS7KAM8XCST4SRCAeh_H2Oqc4Mcuvm.jpg','1999-06-02',5);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `first_name` text COLLATE latin1_general_ci,
  `last_name` text COLLATE latin1_general_ci,
  `birthdate` date DEFAULT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gender_idx` (`gender_id`),
  CONSTRAINT `gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (2,2,'Andrey','Solodov','1986-12-25',1,'2015-11-26 18:59:19','2015-11-26 18:59:19');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `role_value` smallint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'User',10),(2,'Admin',20),(3,'SuperUser',30);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `status_value` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active',10),(2,'Pending',5);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role_id` smallint(6) NOT NULL DEFAULT '10',
  `user_type_id` smallint(6) NOT NULL DEFAULT '10',
  `status_id` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'legandr.86','OjR9j5SwaCE7gKr2Oj9jUcBMOlcMqzri','$2y$13$/fKpkDnckkQRCt4PDPalEe1zo48a6h..MY13VJtyqFPFlz.XOs42.',NULL,'legandr.86@gmail.com','2015-11-19 10:23:52','2015-11-23 13:46:44',20,10,10),(3,'soanni','fwO7y3E0bwnP_5DnEfAey6VRBfdYKQsN','$2y$13$a2cZxzmx2ccrMHoGhQbLYeIyllGx2wDJ81l0ItJWZnVu/M/OHQG4C',NULL,'soanni@gmail.com','2015-11-29 21:17:00','2015-11-29 21:17:50',30,10,10),(4,'rumazda','M69BaqE68Gv_RxQ0aLAY-s1VrZUtqjbA','$2y$13$9FXNarFJSfvx8LJFOmr/rOgB9PTGyQnvA7QLIQ.Kj6m2J6ywyQWWG',NULL,'rumazda@outlook.com','2015-11-30 23:58:36','2015-11-30 23:58:36',10,10,10);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `user_type_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Free',10),(2,'Paid',30);
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-02  3:08:39
