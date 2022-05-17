-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: lambrou
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccination_center_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,1,0,'2022-04-01','08:00',0,NULL),(2,1,0,'2022-04-01','09:00',0,'0000-00-00 00:00:00'),(3,1,NULL,'2022-04-01','10:00',0,NULL),(4,1,0,'2022-04-02','08:00',0,NULL),(5,1,NULL,'2022-04-02','09:00',0,NULL),(6,1,NULL,'2022-04-02','10:00',0,NULL),(7,2,NULL,'2022-04-01','08:00',0,NULL),(8,2,NULL,'2022-04-01','09:00',0,NULL),(9,2,13,'2022-04-01','10:00',0,NULL),(10,2,NULL,'2022-04-02','08:00',0,NULL),(11,2,NULL,'2022-04-02','09:00',0,NULL),(12,2,0,'2022-04-02','10:00',0,NULL);
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `vaccination_center_id` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,10,1,NULL),(2,11,2,NULL);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `lastname` varchar(145) NOT NULL,
  `amka` varchar(11) NOT NULL,
  `afm` varchar(9) NOT NULL,
  `artaftotitas` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobilephone` varchar(10) NOT NULL,
  `role` int(11) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'despoinaki1','alexiadou','066452627','066452627','1233123123',23,1,'themhz@gmail.com1','6987556486',0,'2022-04-04 02:54:42'),(2,'despoinaki2','alexiadoulini','066452628','066452628','1233123123',23,1,'themhz@gmail.com2','6987556486',0,'0000-00-00 00:00:00'),(7,'ΕΥΘΎΜΙΟΣ ΘΕΟΤΟΚΆΤΟΣ','tester','17107901071','uy57','',45,1,'themhz@gmail.com3','',0,'2022-04-07 00:56:35'),(8,'maria','labrou','11079999008','113595666','',60,1,'lamproumaria@gmail.com','',0,'2022-04-07 22:58:58'),(9,'ΕΥΘΎΜΙΟΣ ΘΕΟΤΟΚΆΤΟΣ','tester','17107901072','uy58','',45,2,'themhz@gmail.com4','',0,'2022-04-08 00:39:55'),(10,'ΕΥΘΎΜΙΟΣ ΘΕΟΤΟΚΆΤΟΣ','Θεοτοκάτος','17107901073','uy59','',45,2,'themhz@gmail.com5','6987556486',2,'2022-04-08 00:47:12'),(11,'ΕΥΘΎΜΙΟΣ ΘΕΟΤΟΚΆΤΟΣ','Θεοτοκάτος','17107901074','uy5611','',45,2,'themhz@gmail.com6','6987556486',2,'2022-04-08 00:50:31'),(12,'Gerasimos Theotokatos','asdsad','17107901075','171079010','',40,1,'themhz@gmail.com7','+306987556',1,'2022-04-08 00:51:13'),(13,'Gerasimos Theotokatos','tester','17107901070','uy56','',45,1,'themhz@gmail.com8','+306987556',1,'2022-04-08 01:16:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaccination_centers`
--

DROP TABLE IF EXISTS `vaccination_centers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vaccination_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `address` varchar(245) NOT NULL,
  `taxidromikos_kodikas` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaccination_centers`
--

LOCK TABLES `vaccination_centers` WRITE;
/*!40000 ALTER TABLE `vaccination_centers` DISABLE KEYS */;
INSERT INTO `vaccination_centers` VALUES (1,'Αθήνα','Λεωφ. Μεσογείων 454, Αγ. Παρασκευή','15342','2106016911',NULL),(2,'Θεσσαλονίκης','Περίπτερο 13, Θεσσαλονίκη','54621','2122222344',NULL);
/*!40000 ALTER TABLE `vaccination_centers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-08 22:11:56
