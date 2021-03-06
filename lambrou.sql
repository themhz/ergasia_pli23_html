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
  PRIMARY KEY (`id`),
  KEY `FK_appointments_vaccination_centers` (`vaccination_center_id`),
  CONSTRAINT `FK_appointments_vaccination_centers` FOREIGN KEY (`vaccination_center_id`) REFERENCES `vaccination_centers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,1,1,'2022-04-01','08:00',1,NULL),(2,1,2,'2022-04-01','09:00',1,'0000-00-00 00:00:00'),(3,1,3,'2022-04-01','10:00',1,NULL),(4,1,4,'2022-04-02','08:00',1,NULL),(5,1,5,'2022-04-02','09:00',1,NULL),(6,1,6,'2022-04-02','10:00',0,NULL),(7,2,7,'2022-04-01','08:00',0,NULL),(8,2,8,'2022-04-01','09:00',1,NULL),(9,2,9,'2022-04-01','10:00',1,NULL),(10,2,12,'2022-04-02','08:00',0,NULL),(11,2,13,'2022-04-02','09:00',0,NULL),(12,2,14,'2022-04-02','10:00',0,NULL);
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
  PRIMARY KEY (`id`),
  KEY `FK_doctors_users` (`user_id`),
  KEY `FK_doctors_vaccination_centers` (`vaccination_center_id`),
  CONSTRAINT `FK_doctors_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_doctors_vaccination_centers` FOREIGN KEY (`vaccination_center_id`) REFERENCES `vaccination_centers` (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'╬æ╬╜╬▒╬╝╬▒╧ü╬╣╬▒','╬¥╧ä╬╣╬╗╬¡╬╜╬▒','066452627','066452627','AT065851',23,1,'uqmcolyv@yahoo.ca','6155246368',1,'2022-04-04 02:54:42'),(2,'╬ö╬╡╧â╧Ç╬┐╬╣╬╜╬▒','╬ö╧ü╬┐╬│╬│╬»╧ä╬╖','066452628','066452628','AI035852',23,1,'mwilson@att.net','9096105752',1,'0000-00-00 00:00:00'),(7,'╬æ╬╜╬▒╧â╧ä╬¼╧â╬╣╬┐╧é','╬ª╬▒╧â╬┐╧à╬╗╬▒╧é','17107901071','uy57','AT045853',45,1,'anastastis@nomail.com','',1,'2022-04-07 00:56:35'),(8,'╬ñ╬¼╧â╧â╬┐╧é','╬ñ╬▒╧â╧î╧Ç╬┐╧à╬╗╬┐╧é','11079999008','113595666','AT065854',60,1,'kostas@live.com','',1,'2022-04-07 22:58:58'),(9,'╬ú╧ä╬╡╧ü╬│╬╣╬┐╧é','╬Ü╬▒╧ü╬▒╬┤╬»╬╝╬▒╧é','17107901072','uy58','AT011855',45,2,'jshearer@outlook.com','',1,'2022-04-08 00:39:55'),(10,'╬Æ╬▒╬│╬│╬¡╬╗╬╖╧é','╬¢╬▒╬▓╬┤╬¼╬║╬╖╧é','17107901073','uy59','AT063856',45,2,'barjam@aol.com','3133746704',2,'2022-04-08 00:47:12'),(11,'╬£╬▒╧ü╬»╬▒','╬¢╬¼╬╝╧Ç╧ü╬┐╧à','12345678910','123456789','AT064857',45,2,'temis@google.com','6987556056',2,'2022-04-08 00:50:31'),(12,'╬Ü╬▒╧Ç╬┐╬╣╬┐╧é','╬Ü╬▒╧Ç╬┐╬╣╧î╧Ç╬┐╧à╬╗╬┐╧é','17107901075','171079010','AT063858',40,1,'kapiopiopoulos@email.com','7855324759',1,'2022-04-08 00:51:13'),(13,'╬ô╬╣╬¼╬╜╬╜╬╖╧é','╬ò╬╜╧î╧Ç╬┐╬▒╬║╬╣╧é','98765432111','552252352','AT061859',45,1,'bader@optonline.net','3069875565',1,'2022-04-08 01:16:14'),(14,'╬ª╬¼╬╜╬╖╧é','╬ô╬╡╧ë╧ü╬│╧î╧Ç╬¼╬║╬╖╧é','19885754253','558896696','AT061830',65,1,'fanis@optonline.net','3069875852',1,'2022-04-08 01:16:14');
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
INSERT INTO `vaccination_centers` VALUES (1,'╬æ╬╕╬«╬╜╬▒','╬¢╬╡╧ë╧å. ╬£╬╡╧â╬┐╬│╬╡╬»╧ë╬╜ 454, ╬æ╬│. ╬á╬▒╧ü╬▒╧â╬║╬╡╧à╬«','15342','2106016911',NULL),(2,'╬ÿ╬╡╧â╧â╬▒╬╗╬┐╬╜╬»╬║╬╖╧é','╬á╬╡╧ü╬»╧Ç╧ä╬╡╧ü╬┐ 13, ╬ÿ╬╡╧â╧â╬▒╬╗╬┐╬╜╬»╬║╬╖','54621','2122222344',NULL);
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

-- Dump completed on 2022-05-22 17:23:17
