-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: sago
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `execucao_complexidade`
--

DROP TABLE IF EXISTS `execucao_complexidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `execucao_complexidade` (
  `cod_execucao_complexidade` int(11) NOT NULL,
  `cod_execucao` int(11) NOT NULL,
  `cod_complexidade_componente` int(11) DEFAULT NULL,
  `dta_registro` datetime,
  PRIMARY KEY (`cod_execucao_complexidade`),
  KEY `execucao_complexidade_execucao_fk` (`cod_execucao`),
  KEY `execucao_complexidade_complexidade_componente_fk` (`cod_complexidade_componente`),
  CONSTRAINT `execucao_complexidade_complexidade_componente_fk` FOREIGN KEY (`cod_complexidade_componente`) REFERENCES `complexidade_componente` (`cod_complexidade_componente`),
  CONSTRAINT `execucao_complexidade_execucao_fk` FOREIGN KEY (`cod_execucao`) REFERENCES `execucao` (`cod_execucao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `execucao_complexidade`
--

LOCK TABLES `execucao_complexidade` WRITE;
/*!40000 ALTER TABLE `execucao_complexidade` DISABLE KEYS */;
INSERT INTO `execucao_complexidade` VALUES (1,1,3,'2019-09-23 07:59:49'),(2,1,3,'2019-09-23 08:01:12'),(3,1,3,'2019-09-23 08:02:21'),(4,1,3,'2019-09-23 08:05:08'),(5,1,3,'2019-09-23 08:06:13'),(6,1,3,'2019-09-23 08:45:31'),(7,1,3,'2019-09-23 08:59:26'),(8,1,3,'2019-09-23 09:03:56'),(9,1,3,'2019-09-23 09:05:34'),(10,1,3,'2019-09-23 09:06:48'),(11,1,6,'2019-09-23 09:09:22'),(12,1,3,'2019-09-23 09:10:04'),(13,1,3,'2019-09-23 09:12:01'),(14,2,3,'2019-09-23 09:25:23'),(15,2,3,'2019-09-26 13:11:09'),(16,3,3,'2019-10-02 08:59:57'),(17,3,3,'2019-10-03 09:26:34'),(18,3,3,'2019-10-03 09:36:35'),(19,3,3,'2019-10-03 09:55:59'),(20,3,3,'2019-10-04 07:39:51'),(21,3,3,'2019-10-04 07:51:44'),(22,3,3,'2019-10-04 08:20:29'),(23,3,3,'2019-10-04 08:32:24'),(24,3,3,'2019-10-04 09:38:01'),(25,3,6,'2019-10-04 13:00:11');
/*!40000 ALTER TABLE `execucao_complexidade` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-14 18:44:24
