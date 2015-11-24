CREATE DATABASE  IF NOT EXISTS `distribution_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `distribution_db`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: distribution_db
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `receiving_item_tab`
--

DROP TABLE IF EXISTS `receiving_item_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiving_item_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rrid` int(10) DEFAULT NULL,
  `rbid` int(10) DEFAULT NULL,
  `riid` int(10) DEFAULT NULL,
  `rqty` int(10) DEFAULT NULL,
  `rtype` tinyint(1) DEFAULT '1',
  `ritype` tinyint(1) DEFAULT '1',
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_item_tab`
--

LOCK TABLES `receiving_item_tab` WRITE;
/*!40000 ALTER TABLE `receiving_item_tab` DISABLE KEYS */;
INSERT INTO `receiving_item_tab` VALUES (1,1,1,1,23,1,1,1),(2,1,1,7,11,1,1,1),(3,1,1,1,34,1,2,1);
/*!40000 ALTER TABLE `receiving_item_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution_tab`
--

DROP TABLE IF EXISTS `distribution_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribution_tab` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `dtype` tinyint(1) DEFAULT '0',
  `ddrid` int(10) DEFAULT NULL,
  `ddocno` varchar(15) DEFAULT NULL,
  `ddate` int(10) DEFAULT NULL,
  `dtitle` varchar(150) DEFAULT NULL,
  `ddesc` varchar(350) DEFAULT NULL,
  `dstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution_tab`
--

LOCK TABLES `distribution_tab` WRITE;
/*!40000 ALTER TABLE `distribution_tab` DISABLE KEYS */;
INSERT INTO `distribution_tab` VALUES (1,1,1,'T1115101',1447693200,'Resep Masakan Kue Lapet Khas Batak','wwwwwwwwwww',3),(2,1,3,'T1115203',1447779600,'Resep Sambal Goreng Ikan Teri Medan','wwwwwwwwwwwww',3),(3,1,3,'T1115303',1447952400,'Resep Masakan Kue Lapet Khas Batak','wewew',1),(4,1,5,'T1115405',1447952400,'Dapur Palma - Kumpulan Resep Masakan Nusantara dan Mancanegara','wewew',3);
/*!40000 ALTER TABLE `distribution_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution_item_tab`
--

DROP TABLE IF EXISTS `distribution_item_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribution_item_tab` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `ddrid` int(10) DEFAULT NULL,
  `diid` int(10) DEFAULT NULL,
  `dqty` int(10) DEFAULT NULL,
  `dtype` tinyint(1) DEFAULT '1',
  `ditype` tinyint(1) DEFAULT '1',
  `dstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution_item_tab`
--

LOCK TABLES `distribution_item_tab` WRITE;
/*!40000 ALTER TABLE `distribution_item_tab` DISABLE KEYS */;
INSERT INTO `distribution_item_tab` VALUES (1,5,1,32,1,1,1),(2,5,2,1,1,1,1),(3,5,3,3,1,1,1),(4,5,3,51,1,2,1);
/*!40000 ALTER TABLE `distribution_item_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution_request_tab`
--

DROP TABLE IF EXISTS `distribution_request_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribution_request_tab` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `dtype` tinyint(1) DEFAULT NULL,
  `dbfrom` int(10) DEFAULT NULL,
  `dbto` int(10) DEFAULT NULL,
  `ddate` int(10) DEFAULT NULL,
  `dtitle` varchar(150) DEFAULT NULL,
  `ddesc` varchar(350) DEFAULT NULL,
  `dstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution_request_tab`
--

LOCK TABLES `distribution_request_tab` WRITE;
/*!40000 ALTER TABLE `distribution_request_tab` DISABLE KEYS */;
INSERT INTO `distribution_request_tab` VALUES (1,1,6,8,1447775530,'Resep Masakan Kue Lapet Khas Batak','wwwwwwwwwwww',3),(2,1,1,6,1447818739,'Resep Sambal Goreng Ikan Teri Medan','wwwwwwwwww',3),(3,1,6,1,1447818766,'Resep Sambal Goreng Ikan Teri Medan','wwwwwwwwww',3),(4,1,1,8,1447994005,'Resep Masakan Kue Lapet Khas Batak','wwwwwwww',2),(5,1,8,1,1448002031,'Resep Masakan Kue Lapet Khas Batak','wwwwwwww',3);
/*!40000 ALTER TABLE `distribution_request_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receiving_tab`
--

DROP TABLE IF EXISTS `receiving_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiving_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rbid` int(10) DEFAULT NULL,
  `rtype` tinyint(1) DEFAULT '1',
  `rdocno` varchar(10) DEFAULT NULL,
  `riid` varchar(300) DEFAULT NULL,
  `rvendor` varchar(300) DEFAULT NULL,
  `rdate` int(10) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_tab`
--

LOCK TABLES `receiving_tab` WRITE;
/*!40000 ALTER TABLE `receiving_tab` DISABLE KEYS */;
INSERT INTO `receiving_tab` VALUES (1,1,2,'w121wqwasa','0','wewew',1447606800,'wwwwwwww',3);
/*!40000 ALTER TABLE `receiving_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-24 15:21:54
