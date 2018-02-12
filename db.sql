-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: symfony
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `grouping`
--

DROP TABLE IF EXISTS `grouping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grouping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colours` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distribution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grouping` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grouping`
--

LOCK TABLES `grouping` WRITE;
/*!40000 ALTER TABLE `grouping` DISABLE KEYS */;
INSERT INTO `grouping` VALUES (1,'3','1,3,5','[[0,1,1],[1,2,2],[2,2,2]]'),(2,'10','7,1,25,4,3,33,5,8,11,3','[[1,8,8,8,8,8,8,8,8,8],[8,8,7,7,7,7,7,7,7,7],[4,4,4,0,0,0,0,0,0,0],[9,9,9,2,2,2,2,2,2,2],[3,3,3,3,2,2,2,2,2,2],[6,6,6,6,6,2,2,2,2,2],[2,2,2,2,2,2,2,5,5,5],[5,5,5,5,5,5,5,5,5,5],[5,5,5,5,5,5,5,5,5,5],[5,5,5,5,5,5,5,5,5,5]]'),(3,'6','5,2,9,16,3,1','[[5,0,0,0,0,0],[1,1,2,2,2,2],[4,4,4,2,2,2],[2,2,3,3,3,3],[3,3,3,3,3,3],[3,3,3,3,3,3]]'),(4,'5','8,2,9,3,3','[[1,1,3,3,3],[4,4,4,0,0],[0,0,0,0,0],[0,2,2,2,2],[2,2,2,2,2]]');
/*!40000 ALTER TABLE `grouping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-12  4:21:05
