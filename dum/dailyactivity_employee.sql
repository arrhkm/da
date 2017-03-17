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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` varchar(15) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `employee_id` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('admin','Admin',NULL,NULL,'',NULL),('LSF-S07035','Pudji Arijadi',NULL,NULL,NULL,NULL),('LSF-S09066','Bambang Sutikno',NULL,NULL,'',NULL),('LSF-S09072','David Ruston',NULL,NULL,'',NULL),('LSF-S09075','Tufail Syarif',NULL,NULL,'',NULL),('LSF-S10086','Yulianto Noorhidayat',NULL,NULL,NULL,NULL),('LSF-S11107','Nanang Fatoni',NULL,NULL,NULL,NULL),('LSF-S11109','Arif Sujono Hadi S',NULL,NULL,NULL,NULL),('LSF-S11150','Nony Ayu Dwi Damsyah',NULL,NULL,NULL,NULL),('LSF-S11165','Muhammad Hoir',NULL,NULL,NULL,NULL),('LSF-S12180','Gama Erik Firmansyah',NULL,NULL,NULL,NULL),('LSF-S12183','Media Lestika Sari',NULL,NULL,NULL,NULL),('LSF-S12184','Richy Dwi Very Sandy',NULL,NULL,NULL,NULL),('LSF-S12187','Yudha Anggara',NULL,NULL,NULL,NULL),('LSF-S13220','Abdul Majid',NULL,NULL,NULL,NULL),('LSF-S14246','Akhmad Hisyam',NULL,NULL,NULL,NULL),('LSF-S14251','Ardian Setya Gunawan',NULL,NULL,NULL,NULL),('LSF-S14253','Heru Setiawan',NULL,NULL,NULL,NULL),('LSF-S14254','Andi Purnawirawan',NULL,NULL,NULL,NULL),('LSF-S14269','Agus Santoso',NULL,NULL,NULL,NULL),('S02004','Imam Wahyudi',NULL,NULL,NULL,NULL),('S03005','Ahmad Zarkarsi',NULL,NULL,'zarkarsi@lintec',NULL),('S04007','Tatuk Bargijono',NULL,NULL,NULL,NULL),('S04008','Ahmad Fudholi',NULL,NULL,NULL,NULL),('S05009','Yuri Widyastuti',NULL,NULL,NULL,NULL),('S05010','Adi Irmantyo',NULL,NULL,NULL,NULL),('S05015','Rianto Halim',NULL,NULL,'rianto_halim@li',NULL),('S05019','Neni Rahayu',NULL,NULL,NULL,NULL),('S06020','Djoko Santoso',NULL,NULL,NULL,NULL),('S06023','Nia Nelviza',NULL,NULL,NULL,NULL),('S06024','Nur Aini',NULL,NULL,NULL,NULL),('S06026','Ahmad',NULL,NULL,'',NULL),('S06028','Sesile Santi Murti',NULL,NULL,NULL,NULL),('S06030','Daniel Arifin',NULL,NULL,'',NULL),('S07032','Muhammad Nadzir Zaini',NULL,NULL,NULL,NULL),('S07033','Isharyanto',NULL,NULL,NULL,NULL),('S07034','Mochmmad Arifin',NULL,NULL,NULL,NULL),('S08041','Nizma Hasbiyasari',NULL,NULL,NULL,NULL),('S08042','Dessy Nurmasari',NULL,NULL,'',NULL),('S08043','Nefertitie Anggen',NULL,NULL,'evie@lintech.co.id',NULL),('S08044','Benny Kurniawan',NULL,NULL,NULL,NULL),('S08047','Hariono',NULL,NULL,'',NULL),('S08048','Arlika Widya Manggar Sari',NULL,NULL,NULL,NULL),('S08049','Anita Yuliana',NULL,NULL,NULL,NULL),('S08050','Nuur Zainila Romadani',NULL,NULL,'',NULL),('S08052','Khushoyin',NULL,NULL,NULL,NULL),('S08054','Ari Susanto',NULL,NULL,'',NULL),('S08057','R. Ichwanul Hakim',NULL,NULL,'ichwanul_hakim@',NULL),('S08058','Agus Budiono',NULL,NULL,'agus_b@lintech.',NULL),('S09063','Achmad Zainuddin',NULL,NULL,NULL,NULL),('S09065','Akhmad Zamroni',NULL,NULL,'',NULL),('S09070','Andri Hermawan',NULL,NULL,'andri_hermawan@',NULL),('S09071','Endro Budiono',NULL,NULL,NULL,NULL),('S09074','Novi Kurniawan',NULL,NULL,'novi@lintech.co',NULL),('S09078','M. Arraf Hakam',NULL,NULL,'hakam@lintech.c',NULL),('S09080','Umakis Rahaju Wiludjeng',NULL,NULL,NULL,NULL),('S10083','Hermawan',NULL,NULL,'hermawan@lintech.co.id',NULL),('S10090','Joice Henryawardhani',NULL,NULL,NULL,NULL),('S10091','Made Astawa Adi D.',NULL,NULL,'',NULL),('S10094','Bondan Cahyadi',NULL,NULL,'',NULL),('S11103','Abdul Syakur',NULL,NULL,'saqur@lintech.c',NULL),('S11108','Agus Rohadi Wibisono',NULL,NULL,'agus_rw@lintech',NULL),('S11110','Agus Hermawan',NULL,NULL,NULL,NULL),('S11117','David Kurniawan',NULL,NULL,NULL,NULL),('S11123','Andhita Raheng Permadhi',NULL,NULL,NULL,NULL),('S11128','Esti Setyo Utami',NULL,NULL,NULL,NULL),('S11132','Rohmad Jarwanto',NULL,NULL,NULL,NULL),('S11133','Agung Joko Purnomo',NULL,NULL,NULL,NULL),('S11134','Satriyo Luhur Prasetyo',NULL,NULL,NULL,NULL),('S11135','Lukman Hakim',NULL,NULL,NULL,NULL),('S11140','Ilham',NULL,NULL,'ilham@lintech.c',NULL),('S11141','Bintang',NULL,NULL,'bintang@lintech',NULL),('S11142','Zulfikar',NULL,NULL,'',NULL),('S11144','Chusni Mubarok',NULL,NULL,'chusni_mubarok@',NULL),('S11148','Choirul Huda',NULL,NULL,NULL,NULL),('S11149','Yuniati',NULL,NULL,'hse@lintech.co.',NULL),('S11152','Anthon Widodo',NULL,NULL,NULL,NULL),('S11154','Nurani Hamidah',NULL,NULL,NULL,NULL),('S11158','Exiardhi Sri Wiyono Aji',NULL,NULL,'',NULL),('S11159','Naharis Salam',NULL,NULL,NULL,NULL),('S11162','Peni Choidjah',NULL,NULL,NULL,NULL),('S11164','Rima Maduwati Putri',NULL,NULL,NULL,NULL),('S11168','Yuli Kustiadi',NULL,NULL,NULL,NULL),('S11173','Awik Priono',NULL,NULL,'awik@lintech.co',NULL),('S11176','Sugeng Cahyo Wiyono',NULL,NULL,NULL,NULL),('S11177','Emil Budy Sasmito',NULL,NULL,NULL,NULL),('S12180','Asnan',NULL,NULL,'',NULL),('S12182','Eko ',NULL,NULL,'',NULL),('S12189 ','Winda',NULL,NULL,'',NULL),('S12194','Siwi Dwi Lestari',NULL,NULL,'siwi@lintech.co',NULL),('S13198','Achmad Syaiful Faried',NULL,NULL,'syaiful_faried@lintech.co.id',NULL),('S13200','Made Endra',NULL,NULL,'',NULL),('S13201','Muklis',NULL,NULL,'',NULL),('S13206','Heru Darmawan',NULL,NULL,NULL,NULL),('S13208','Andry Widya Putra',NULL,NULL,'andre@lintech.c',NULL),('S13209','Dian Agustina Retnowati',NULL,NULL,NULL,NULL),('S13210','M Saiful Hidayat',NULL,NULL,NULL,NULL),('S13213','Handy Susanto',NULL,NULL,NULL,NULL),('S13214','Achmad Rizal Rifa\'i',NULL,NULL,NULL,NULL),('S13219','Zudva Widiaranma Putri',NULL,NULL,NULL,NULL),('S13222','Heri Kurniawan',NULL,NULL,'',NULL),('S13223','Heri Kurniawan',NULL,NULL,'',NULL),('S13224','Noval Robiq',NULL,NULL,NULL,NULL),('S13225','Yuzar Slamet',NULL,NULL,NULL,NULL),('S13226','Imam Basofi',NULL,NULL,NULL,NULL),('S14227','Hariyanto Wibowo',NULL,NULL,NULL,NULL),('S14228','Nanang Hadi Rahman',NULL,NULL,NULL,NULL),('S14229','Nurlaili',NULL,NULL,NULL,NULL),('S14231','Sugiono Setiawan',NULL,NULL,NULL,NULL),('S14232','Ade Fariz Zakariya',NULL,NULL,NULL,NULL),('S14233','Shafarudin Shafar',NULL,NULL,NULL,NULL),('S14235','M Irfan Samsu Nuhan',NULL,NULL,NULL,NULL),('S14236','Irfan',NULL,NULL,'',NULL),('S14238','Ririk Hariasa',NULL,NULL,NULL,NULL),('S14239','Rina Buawan Fatmawati',NULL,NULL,NULL,NULL),('S14241','Edy Sunarko',NULL,NULL,NULL,NULL),('S14243','Dede Afrianto',NULL,NULL,NULL,NULL),('S14247','Tita',NULL,NULL,'',NULL),('S14249','Kancil',NULL,NULL,NULL,NULL),('S14250','Aditya Pratama',NULL,NULL,NULL,NULL),('S14252','Sugiarto',NULL,NULL,NULL,NULL),('S14255','Abdillah Rusdi',NULL,NULL,NULL,NULL),('S14256','Candra Bagaskara',NULL,NULL,'',NULL),('S14257','Hijrah Prajaya',NULL,NULL,NULL,NULL),('S14260','Agus Sigit Susanto',NULL,NULL,NULL,NULL),('S14263','Novita Sari',NULL,NULL,NULL,NULL),('S14264','Istianah',NULL,NULL,NULL,NULL),('S14265','Indah Heriningrum',NULL,NULL,NULL,NULL),('S14266','Candra Bagaskara',NULL,NULL,NULL,NULL),('S14271','Singgih',NULL,NULL,'singgih@lintech',NULL),('S14272','Rifky Febriansyah',NULL,NULL,'rifky@lintech.co.id',NULL),('S15267','Alif Badrut Tamam S',NULL,NULL,'alif_saputra@lintech.co.id',NULL),('S15274','Achmad Faizal',NULL,NULL,'achmad_faizal@l',NULL),('S15278','Suhendro Prayogo',NULL,NULL,'',NULL),('S15280','Dewi Ari Cahyanti',NULL,NULL,'dewi@lintech.co.id',NULL),('S15281','Eko Prasetyo Wahyudi',NULL,NULL,'eko_wahyudi@lintech.co.id',NULL),('S15282','Muhammad Reza Al Haq',NULL,NULL,'reza@lintech.co.id',NULL),('S15291','Muhammad Yusuf ',NULL,NULL,'m_yusuf@lintech.co.id',NULL),('S16302','Devan Aprian Pradikas Mukti',NULL,NULL,'devan@lintech.co.id',NULL),('S16303','Benny Syahputra',NULL,NULL,'benny_syahputra@lintech.co.id',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
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
