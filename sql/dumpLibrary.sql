-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1-log

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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `uploaded_time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'1528036441photo_2018-04-23_20-19-01.jpg',9,'2018-06-03 17:34:01'),(2,'1528036452photo_2018-04-23_20-19-21.jpg',2,'2018-06-03 17:34:12'),(3,'1528036457photo_2018-04-23_20-19-15.jpg',1,'2018-06-03 17:34:17'),(4,'1528036463photo_2018-04-23_20-19-10.jpg',4,'2018-06-03 17:34:23'),(5,'1528036469photo_2018-04-23_20-19-21.jpg',3,'2018-06-03 17:34:29'),(6,'1528036473photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:34:33'),(7,'1528036477photo_2018-04-23_20-19-01.jpg',0,'2018-06-03 17:34:37'),(8,'1528036482photo_2018-04-23_20-19-21.jpg',0,'2018-06-03 17:34:42'),(9,'1528036486photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:34:46'),(10,'1528036491photo_2018-04-23_20-19-01.jpg',0,'2018-06-03 17:34:51'),(11,'1528036501photo_2018-04-23_20-19-01.jpg',0,'2018-06-03 17:35:01'),(12,'1528036506photo_2018-04-23_20-19-10.jpg',0,'2018-06-03 17:35:06'),(13,'1528036510photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:35:10'),(14,'1528036514photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:35:14'),(15,'1528036515photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:35:15'),(16,'1528036516photo_2018-04-23_20-19-15.jpg',0,'2018-06-03 17:35:16'),(17,'1528036530photo_2018-04-23_20-19-21.jpg',0,'2018-06-03 17:35:30'),(18,'1528036530photo_2018-04-23_20-19-21.jpg',0,'2018-06-03 17:35:30');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_properties`
--

DROP TABLE IF EXISTS `images_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_properties` (
  `image_id` int(11) NOT NULL,
  `img_key` varchar(255) NOT NULL,
  `img_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_properties`
--

LOCK TABLES `images_properties` WRITE;
/*!40000 ALTER TABLE `images_properties` DISABLE KEYS */;
INSERT INTO `images_properties` VALUES (1,'type','jpeg'),(1,'size','18.33'),(1,'width','620'),(1,'height','354'),(1,'name','1528036441photo_2018-04-23_20-19-01.jpg'),(2,'type','jpeg'),(2,'size','54.63'),(2,'width','1024'),(2,'height','806'),(2,'name','1528036452photo_2018-04-23_20-19-21.jpg'),(3,'type','jpeg'),(3,'size','167.14'),(3,'width','900'),(3,'height','600'),(3,'name','1528036457photo_2018-04-23_20-19-15.jpg'),(4,'type','jpeg'),(4,'size','5.92'),(4,'width','274'),(4,'height','184'),(4,'name','1528036463photo_2018-04-23_20-19-10.jpg'),(5,'type','jpeg'),(5,'size','54.63'),(5,'width','1024'),(5,'height','806'),(5,'name','1528036469photo_2018-04-23_20-19-21.jpg'),(6,'type','jpeg'),(6,'size','167.14'),(6,'width','900'),(6,'height','600'),(6,'name','1528036473photo_2018-04-23_20-19-15.jpg'),(7,'type','jpeg'),(7,'size','18.33'),(7,'width','620'),(7,'height','354'),(7,'name','1528036477photo_2018-04-23_20-19-01.jpg'),(8,'type','jpeg'),(8,'size','54.63'),(8,'width','1024'),(8,'height','806'),(8,'name','1528036482photo_2018-04-23_20-19-21.jpg'),(9,'type','jpeg'),(9,'size','167.14'),(9,'width','900'),(9,'height','600'),(9,'name','1528036486photo_2018-04-23_20-19-15.jpg'),(10,'type','jpeg'),(10,'size','18.33'),(10,'width','620'),(10,'height','354'),(10,'name','1528036491photo_2018-04-23_20-19-01.jpg'),(11,'type','jpeg'),(11,'size','18.33'),(11,'width','620'),(11,'height','354'),(11,'name','1528036501photo_2018-04-23_20-19-01.jpg'),(12,'type','jpeg'),(12,'size','5.92'),(12,'width','274'),(12,'height','184'),(12,'name','1528036506photo_2018-04-23_20-19-10.jpg'),(13,'type','jpeg'),(13,'size','167.14'),(13,'width','900'),(13,'height','600'),(13,'name','1528036510photo_2018-04-23_20-19-15.jpg'),(14,'type','jpeg'),(14,'size','167.14'),(14,'width','900'),(14,'height','600'),(14,'name','1528036514photo_2018-04-23_20-19-15.jpg'),(15,'type','jpeg'),(15,'size','167.14'),(15,'width','900'),(15,'height','600'),(15,'name','1528036515photo_2018-04-23_20-19-15.jpg'),(16,'type','jpeg'),(16,'size','167.14'),(16,'width','900'),(16,'height','600'),(16,'name','1528036516photo_2018-04-23_20-19-15.jpg'),(17,'type','jpeg'),(17,'size','54.63'),(17,'width','1024'),(17,'height','806'),(17,'name','1528036530photo_2018-04-23_20-19-21.jpg'),(18,'type','jpeg'),(18,'size','54.63'),(18,'width','1024'),(18,'height','806'),(18,'name','1528036530photo_2018-04-23_20-19-21.jpg');
/*!40000 ALTER TABLE `images_properties` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-05 13:01:47
