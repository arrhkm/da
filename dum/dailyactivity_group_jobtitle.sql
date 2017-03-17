CREATE DATABASE  IF NOT EXISTS `dailyactivity` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dailyactivity`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 192.168.100.111    Database: dailyactivity
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `group_jobtitle`
--

DROP TABLE IF EXISTS `group_jobtitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_jobtitle` (
  `jobtitle_id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`employee_id`),
  KEY `fk_group_jobtitle_jobtitle1_idx` (`jobtitle_id`),
  KEY `fk_group_jobtitle_employee1_idx` (`employee_id`),
  CONSTRAINT `fk_group_jobtitle_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_jobtitle_jobtitle1` FOREIGN KEY (`jobtitle_id`) REFERENCES `jobtitle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_jobtitle`
--

LOCK TABLES `group_jobtitle` WRITE;
/*!40000 ALTER TABLE `group_jobtitle` DISABLE KEYS */;
INSERT INTO `group_jobtitle` VALUES (1,'S08057'),(2,'S10094'),(3,'S13208'),(5,'S05019'),(6,'S05015'),(6,'S09078'),(6,'S14272'),(7,'LSF-S09072'),(7,'LSF-S11107'),(7,'S11108'),(7,'S14271'),(7,'S16302'),(8,'LSF-S11109'),(8,'LSF-S14253'),(8,'S11141'),(8,'S14243'),(9,'LSF-S12187'),(9,'S08058'),(10,'LSF-S07035'),(10,'S09065'),(11,'S02004'),(11,'S08047'),(12,'S09071'),(12,'S10091'),(12,'S11110'),(12,'S11123'),(13,'S05009'),(14,'S08042'),(15,'LSF-S12183'),(15,'S08049'),(17,'S08052'),(18,'S06026'),(18,'S11144'),(18,'S11162'),(18,'S15280'),(19,'S06023'),(30,'S14236'),(32,'LSF-S14254'),(35,'S12194'),(36,'S08048'),(37,'S12189 '),(38,'LSF-S09066'),(38,'LSF-S10086'),(38,'S06020'),(38,'S09070'),(39,'LSF-S11165'),(39,'S14252'),(40,'S07034'),(40,'S13200'),(41,'S03005'),(41,'S15281'),(42,'LSF-S09075'),(42,'LSF-S12184'),(42,'LSF-S14246'),(42,'S09074'),(42,'S12180'),(42,'S14231'),(42,'S14233'),(43,'S08054'),(45,'S13219'),(47,'S11140'),(48,'S08043'),(48,'S11128'),(48,'S11133'),(48,'S11173'),(48,'S13209'),(48,'S15282'),(49,'S13213'),(50,'S14239'),(51,'S11117'),(52,'S08044'),(52,'S11148'),(52,'S11152'),(53,'S06024'),(54,'S14264'),(55,'S14265'),(56,'S08041'),(57,'S11158'),(59,'S11149'),(59,'S11176'),(59,'S13210'),(60,'S11103'),(62,'S09080'),(65,'S15274'),(66,'S11134'),(67,'S11142'),(69,'LSF-S11150'),(70,'S05010'),(70,'S06030'),(71,'S13198'),(72,'S13222');
/*!40000 ALTER TABLE `group_jobtitle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-11 17:21:47
