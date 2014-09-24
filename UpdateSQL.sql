CREATE DATABASE  IF NOT EXISTS `distribution_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `distribution_db`;
-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: distribution_db
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1

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
-- Table structure for table `access_tab`
--

DROP TABLE IF EXISTS `access_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_tab` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `agid` int(4) unsigned NOT NULL,
  `apid` int(10) DEFAULT NULL,
  `aaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tab`
--

LOCK TABLES `access_tab` WRITE;
/*!40000 ALTER TABLE `access_tab` DISABLE KEYS */;
INSERT INTO `access_tab` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,1,29,1),(30,1,30,1),(31,1,31,1),(32,1,32,1),(33,1,33,1),(34,1,34,1),(35,1,35,1),(36,1,36,1),(37,1,37,1),(38,1,38,1),(39,1,39,1),(40,1,40,1),(41,1,41,1),(42,1,42,1),(43,1,43,1),(44,1,44,1),(45,1,45,1),(46,1,46,1),(47,1,47,1),(48,1,48,1),(49,1,49,1),(50,1,50,1),(51,1,51,1),(52,1,52,1),(53,1,53,1),(54,1,54,1),(55,1,55,1),(56,1,56,1),(57,1,57,1),(58,1,58,1),(59,1,59,1),(60,1,60,1),(61,1,61,1),(62,1,62,1),(63,1,63,1),(64,1,64,1),(65,1,65,1),(66,1,66,1),(67,1,67,1),(68,1,68,1),(69,1,69,1),(70,1,70,1),(71,1,71,1),(72,1,72,1),(73,1,73,1),(74,1,74,1),(75,1,75,1),(76,1,76,1),(77,1,77,1),(78,1,78,1),(79,1,79,1),(80,1,80,1),(81,1,81,1),(82,1,82,1),(83,1,83,1),(84,1,84,1),(85,1,85,1),(86,1,86,1),(87,1,87,1),(88,1,88,1),(89,1,89,1),(90,1,90,1),(91,1,91,1),(92,1,92,1),(93,1,93,1),(94,1,94,1),(95,1,95,1),(96,1,96,1),(97,1,97,1),(98,1,98,1),(99,1,99,1),(100,1,100,1),(101,1,101,1),(102,1,102,1),(103,1,103,1),(104,1,104,1),(105,1,105,1),(106,1,106,1),(107,1,107,1),(108,1,108,1),(109,1,109,1),(110,2,1,1),(111,2,2,1),(112,2,3,1),(113,2,4,1),(114,2,5,1),(115,2,6,1),(116,2,7,1),(117,2,8,1),(118,2,9,1),(119,2,10,1),(120,2,11,1),(121,2,12,1),(122,2,13,1),(123,2,14,1),(124,2,15,1),(125,2,16,1),(126,2,17,1),(127,2,18,1),(128,2,19,1),(129,2,20,1),(130,2,21,1),(131,2,22,1),(132,2,23,1),(133,2,24,1),(134,2,25,1),(135,2,26,1),(136,2,27,1),(137,2,28,1),(138,2,29,1),(139,2,30,1),(140,2,31,1),(141,2,32,1),(142,2,33,1),(143,2,34,1),(144,2,35,1),(145,2,36,1),(146,2,37,1),(147,2,38,1),(148,2,39,1),(149,2,40,1),(150,2,41,1),(151,2,42,1),(152,2,43,1),(153,2,44,1),(154,2,45,1),(155,2,46,1),(156,2,47,1),(157,2,48,1),(158,2,49,1),(159,2,50,1),(160,2,51,1),(161,2,52,1),(162,2,53,1),(163,2,54,1),(164,2,55,1),(165,2,56,1),(166,2,57,1),(167,2,58,1),(168,2,59,1),(169,2,60,1),(170,2,61,1),(171,2,62,1),(172,2,63,1),(173,2,64,1),(174,2,65,1),(175,2,66,1),(176,2,67,1),(177,2,68,1),(178,2,69,1),(179,2,70,1),(180,2,71,1),(181,2,72,1),(182,2,73,1),(183,2,74,1),(184,2,75,1),(185,2,76,1),(186,2,77,1),(187,2,78,1),(188,2,79,1),(189,2,80,1),(190,2,81,1),(191,2,82,1),(192,2,83,1),(193,2,84,1),(194,2,85,1),(195,2,86,1),(196,2,87,1),(197,2,88,1),(198,2,89,1),(199,2,90,1),(200,2,91,1),(201,2,92,1),(202,2,93,0),(203,2,94,0),(204,2,95,0),(205,2,96,0),(206,2,97,0),(207,2,98,0),(208,2,99,0),(209,2,100,0),(210,2,101,0),(211,2,102,0),(212,2,103,0),(213,2,104,0),(214,2,105,0),(215,2,106,0),(216,2,107,0),(217,2,108,0),(218,2,109,0),(219,2,110,1),(220,2,111,1),(221,2,112,1),(222,2,113,1),(223,2,114,1),(224,2,115,1),(225,2,116,1),(226,2,117,1),(227,1,110,1),(228,1,111,1),(229,1,112,1),(230,1,113,1),(231,1,114,1),(232,1,115,1),(233,1,116,1),(234,1,117,1),(235,1,110,1),(236,1,111,1),(237,1,112,1),(238,1,113,1),(239,1,114,1),(240,1,115,1),(241,1,116,1),(242,1,117,1),(243,1,118,1),(244,2,118,0),(245,1,119,1),(246,1,120,1),(247,1,121,1),(248,1,122,1),(249,1,123,1),(250,2,119,1),(251,2,120,1),(252,2,121,1),(253,2,122,1),(254,2,123,1);
/*!40000 ALTER TABLE `access_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_tab`
--

DROP TABLE IF EXISTS `permission_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) DEFAULT NULL,
  `pdesc` varchar(150) DEFAULT NULL,
  `purl` varchar(45) DEFAULT NULL,
  `pparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_tab`
--

LOCK TABLES `permission_tab` WRITE;
/*!40000 ALTER TABLE `permission_tab` DISABLE KEYS */;
INSERT INTO `permission_tab` VALUES (1,'BranchView','Branch View','branch',0),(2,'BranchAdd','Branch Add','branch/branch_add',1),(3,'BranchUpdate','Branch Update','branch/branch_update',1),(4,'BranchDelete','Branch Delete','branch/branch_delete',1),(5,'CustomersView','Customers View','customers',0),(6,'CustomersAdd','Customers Add','customers/customers_add',5),(7,'CustomersUpdate','Customers Update','customers/customers_update',5),(8,'CustomersDelete','Customers Delete','customers/customers_delete',5),(9,'ProductsView','Products View','products',0),(10,'ProductsAdd','Products Add','products/products_add',9),(11,'ProductsUpdate','Products Update','products/products_update',9),(12,'ProductsDelete','Products Delete','products/products_delete',9),(13,'PackagingView','Packaging View','packaging',0),(14,'PackagingAdd','Packaging Add','packaging/packaging_add',13),(15,'PackagingUpdate','Packaging Update','packaging/packaging_update',13),(16,'PackagingDelete','Packaging Delete','packaging/packaging_delete',13),(17,'CategoriesProductView','Categories Product View','categories',0),(18,'CategoriesProductAdd','Categories Product Add','categories/categories_add',17),(19,'CategoriesProductUpdate','Categories Product Update','categories/categories_update',17),(20,'CategoriesProductDelete','Categories Product Delete','categories/categories_delete',17),(21,'SparepartView','Sparepart View','sparepart',0),(22,'SparepartAdd','Sparepart Add','sparepart/sparepart_add',21),(23,'SparepartUpdate','Sparepart Update','sparepart/sparepart_update',21),(24,'SparepartDelete','Sparepart Delete','sparepart/sparepart_delete',21),(25,'TargetOmsetView','Target Omset View','target',0),(26,'TargetOmsetAdd','Target Omset Add','target/target_add',25),(27,'TargetOmsetUpdate','Target Omset Update','target/target_update',25),(28,'TargetOmsetDelete','Target Omset Delete','target/target_delete',25),(29,'SalesView','Sales View','sales',0),(30,'SalesAdd','Sales Add','sales/sales_add',29),(31,'SalesUpdate','Sales Update','sales/sales_update',29),(32,'SalesDelete','Sales Delete','sales/sales_delete',29),(33,'SalesCommisionView','Sales Commision View','sales_commision',0),(34,'SalesCommisionAdd','Sales Commision Add','sales_commision/sales_commision_add',33),(35,'SalesCommisionUpdate','Sales Commision Update','sales_commision/sales_commision_update',33),(36,'SalesCommisionDelete','Sales Commision Delete','sales_commision/sales_commision_delete',33),(37,'TechnicalView','Technical View','technical',0),(38,'TechnicalAdd','Technical Add','technical/technical_add',37),(39,'TechnicalUpdate','Technical Update','technical/technical_update',37),(40,'TechnicalDelete','Technical Delete','technical/technical_delete',37),(41,'SuplierView','Suplier View','suplier/suplier_view',0),(42,'SuplierAdd','Suplier Add','suplier/suplier_add',41),(43,'SuplierUpdate','Suplier Update','suplier/suplier_update',41),(44,'SuplierDelete','Suplier Delete','suplier/suplier_delete',41),(45,'ServicesView','Services View','services',0),(46,'ServicesAdd','Services Add','services/services_add',45),(47,'ServicesUpdate','Services Update','services/services_update',45),(48,'ServicesDelete','Services Delete','services/services_delete',45),(49,'InventoryProductView','Inventory Product View','inventory/1',0),(50,'InventoryProductAdd','Inventory Product Add','inventory/inventory_add/1',49),(51,'InventoryProductUpdate','Inventory Product Update','inventory/inventory_update/1',49),(52,'InventoryProductDelete','Inventory Product Delete','inventory/inventory_delete/1',49),(53,'InventorySparepartView','Inventory Sparepart View','inventory/2',0),(54,'InventorySparepartAdd','Inventory Sparepart Add','inventory/inventory_add/2',53),(55,'InventorySparepartUpdate','Inventory Sparepart Update','inventory/inventory_update/2',53),(56,'InventorySparepartDelete','Inventory Sparepart Delete','inventory/inventory_delete/2',53),(57,'InventoryServicesView','Inventory Services View','inventory/3',0),(58,'InventoryServicesAdd','Inventory Services Add','inventory/inventory_add/3',57),(59,'InventoryServicesUpdate','Inventory Services Update','inventory/inventory_update/3',57),(60,'InventoryServicesDelete','Inventory Services Delete','inventory/inventory_delete/3',57),(61,'InventoryReturnView','Inventory Return View','inventory/4',0),(62,'InventoryReturnAdd','Inventory Return Add','inventory/inventory_add/4',61),(63,'InventoryReturnUpdate','Inventory Return Update','inventory/inventory_update/4',61),(64,'InventoryReturnDelete','Inventory Return Delete','inventory/inventory_delete/4',61),(65,'OpnameProductView','Opname Product View','opname/1',0),(66,'OpnameProductAdd','Opname Product Add','opname/opname_add/1',65),(67,'OpnameProductUpdate','Opname Product Update','opname/opname_update/1',65),(68,'OpnameProductDelete','Opname Product Delete','opname/opname_delete/1',65),(69,'OpnameSparepartView','Opname Sparepart View','opname/2',0),(70,'OpnameSparepartAdd','Opname Sparepart Add','opname/opname_add/2',69),(71,'OpnameSparepartUpdate','Opname Sparepart Update','opname/opname_update/2',69),(72,'OpnameSparepartDelete','Opname Sparepart Delete','opname/opname_delete/2',69),(73,'OpnameServicesView','Opname Services View','opname/3',0),(74,'OpnameServicesAdd','Opname Services Add','opname/opname_add/3',73),(75,'OpnameServicesUpdate','Opname Services Update','opname/opname_update/3',73),(76,'OpnameServicesDelete','Opname Services Delete','opname/opname_delete/3',73),(77,'OpnameReturnView','Opname Return View','opname/4',0),(78,'OpnameReturnAdd','Opname Return Add','opname/opname_add/4',77),(79,'OpnameReturnUpdate','Opname Return Update','opname/opname_update/4',77),(80,'OpnameReturnDelete','Opname Return Delete','opname/opname_delete/4',77),(81,'PurchaseOrderView','Purchase Order View','purchase_order/home',0),(82,'PurchaseOrderAdd','Purchase Order Add','purchase_order/home/purchase_order_add',81),(83,'PurchaseOrderUpdate','Purchase Order Update','purchase_order/home/purchase_order_update',81),(84,'PurchaseOrderDelete','Purchase Order Delete','purchase_order/home/purchase_order_delete',81),(85,'SalesOrderView','Sales Order View','sales_order/home',0),(86,'SalesOrderAdd','Sales Order Add','sales_order/home/sales_order_add',85),(87,'SalesOrderUpdate','Sales Order Update','sales_order/home/sales_order_update',85),(88,'SalesOrderDelete','Sales Order Delete','sales_order/home/sales_order_delete',85),(89,'DeliveryOrderView','Delivery Order View','delivery_order/home',0),(90,'DeliveryOrderAdd','Delivery Order Add','delivery_order/home/delivery_order_add',89),(91,'DeliveryOrderUpdate','Delivery Order Update','delivery_order/home/delivery_order_update',89),(92,'DeliveryOrderDelete','Delivery Order Delete','delivery_order/home/delivery_order_delete',89),(93,'ExecuteAllBranchCustomers','Execute All Branch Customers','customers/*',0),(94,'ExecuteAllBranchTargetOmset','Execute All Branch Target Omset','target/*',0),(95,'ExecuteAllBranchSales','Execute All Branch Sales','sales/*',0),(96,'ExecuteAllBranchSalesCommision','Execute All Branch Sales Commision','sales_commision/*',0),(97,'ExecuteAllBranchTechnical','Execute All Branch Technical','technical/*',0),(98,'ExecuteAllBranchServices','Execute All Branch Services','services/*',0),(99,'ExecuteAllBranchInventoryProduct','Execute All Branch Inventory Product','inventory/1/*',0),(100,'ExecuteAllBranchInventorySparepart','Execute All Branch Inventory Sparepart','inventory/2/*',0),(101,'ExecuteAllBranchInventoryServices','Execute All Branch Inventory Services','inventory/3/*',0),(102,'ExecuteAllBranchInventoryReturn','Execute All Branch Inventory Return','inventory/4/*',0),(103,'ExecuteAllBranchOpnameProduct','Execute All Branch Opname Product','opname/1/*',0),(104,'ExecuteAllBranchOpnameSparepart','Execute All Branch Opname Sparepart','opname/2/*',0),(105,'ExecuteAllBranchOpnameServices','Execute All Branch Opname Services','opname/3/*',0),(106,'ExecuteAllBranchOpnameReturn','Execute All Branch Opname Return','opname/4/*',0),(107,'ExecuteAllBranchPurchaseOrder','Execute All Branch Purchase Order','purchase_order/home/*',0),(108,'ExecuteAllBranchPurchaseOrder','Execute All Branch Sales Order','sales_order/home/*',0),(109,'ExecuteAllBranchPurchaseOrder','Execute All Branch Delivery Order','delivery_order/home/*',0),(110,'COAView','COA View','coa',0),(111,'COAAdd','COA Add','coa/coa_add',110),(112,'COAUpdate','COA Update','coa/coa_update',110),(113,'COADelete','COA Delete','coa/coa_delte',110),(114,'JournalView','Journal View','journal',0),(115,'JournalAdd','Journal Add','journal/journal_add',114),(116,'JournalUpdate','Journal Update','journal/journal_update',114),(117,'JournalDelete','Journal Delete','journal/journal_delete',114),(118,'ExecuteAllBranch','Execute All Branch','branch/*',0),(119,'GroupProductView','Group Product View','product_group',0),(120,'GroupProductAdd','Group Product Add','product_group/product_group_add',119),(121,'GroupProductUpdate','Group Product Update','product_group/product_group_update',119),(122,'GroupProductDelete','Group Product Delete','product_group/product_group_delete',119),(123,'ExecuteAllGroupProduct','Execute All Group Product','product_group/*',0);
/*!40000 ALTER TABLE `permission_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-24 10:21:13
