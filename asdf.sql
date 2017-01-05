-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: atl_hr
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `hr_comments`
--

DROP TABLE IF EXISTS `hr_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_comments` (
  `commentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objectTypeId` tinyint(3) unsigned NOT NULL,
  `comment` varchar(45) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) unsigned NOT NULL,
  `objectId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`commentId`),
  KEY `fk_hr_comments_hr_object_info1_idx` (`objectTypeId`),
  KEY `fk_hr_comments_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_comments_hr_object_info1` FOREIGN KEY (`objectTypeId`) REFERENCES `hr_object_type_info` (`objectTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_comments_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_comments`
--

LOCK TABLES `hr_comments` WRITE;
/*!40000 ALTER TABLE `hr_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_employee_addresses`
--

DROP TABLE IF EXISTS `hr_employee_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_employee_addresses` (
  `addressId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeId` int(10) unsigned NOT NULL,
  `street1` varchar(45) NOT NULL,
  `street2` varchar(45) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `county` varchar(45) DEFAULT NULL,
  `state` varchar(45) NOT NULL,
  `zip` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL DEFAULT 'USA',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`addressId`),
  KEY `fk_employeeAddresses_hr_employee_info1_idx` (`employeeId`),
  KEY `fk_employeeAddresses_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_employeeAddresses_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employeeAddresses_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_employee_addresses`
--

LOCK TABLES `hr_employee_addresses` WRITE;
/*!40000 ALTER TABLE `hr_employee_addresses` DISABLE KEYS */;
INSERT INTO `hr_employee_addresses` VALUES (2,5,'12 Washington Ave.','Apt. 2','Washington DC','Kenya County','NJ','50279','USA','2016-11-08 15:33:35',2001);
/*!40000 ALTER TABLE `hr_employee_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_employee_info`
--

DROP TABLE IF EXISTS `hr_employee_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_employee_info` (
  `employeeId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeFirstname` varchar(45) NOT NULL,
  `employeeLastname` varchar(45) NOT NULL,
  `employeeSSN` varchar(11) DEFAULT NULL,
  `employeeDOB` date NOT NULL,
  `employeeRace` varchar(45) DEFAULT NULL,
  `employeeGender` char(1) DEFAULT NULL,
  `cellphonePersonal` char(12) NOT NULL,
  `cellphoneWork` char(12) DEFAULT NULL,
  `phoneDirectLine` char(12) DEFAULT NULL,
  `phoneExt` char(4) DEFAULT NULL,
  `GCExpire` date DEFAULT NULL,
  `emailPersonal` varchar(100) NOT NULL,
  `emailWork` varchar(100) DEFAULT NULL,
  `hireDate` date DEFAULT NULL,
  `positionId` tinyint(3) unsigned DEFAULT NULL,
  `emergencyContact` varchar(200) DEFAULT NULL,
  `dlNumber` varchar(45) DEFAULT NULL,
  `tb_userId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`employeeId`),
  UNIQUE KEY `emailPersonal_UNIQUE` (`emailPersonal`),
  UNIQUE KEY `tb_userId_UNIQUE` (`tb_userId`),
  UNIQUE KEY `emailWork_UNIQUE` (`emailWork`),
  KEY `fk_hr_employee_info_position_type_info1_idx` (`positionId`),
  CONSTRAINT `fk_hr_employee_info_position_type_info1` FOREIGN KEY (`positionId`) REFERENCES `hr_position_type_info` (`positionId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_employee_info`
--

LOCK TABLES `hr_employee_info` WRITE;
/*!40000 ALTER TABLE `hr_employee_info` DISABLE KEYS */;
INSERT INTO `hr_employee_info` VALUES (5,'Barak','Obama','001-13-1234','1960-12-01','Asian','m','541-235-6547',NULL,NULL,NULL,'2020-01-01','barakobama@whitehouse.kz','barakobama@whitehouse.uz','2008-11-08',NULL,'Michelle Obama @ 582-548-6548','obamadrives323',NULL);
/*!40000 ALTER TABLE `hr_employee_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_employee_item_log`
--

DROP TABLE IF EXISTS `hr_employee_item_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_employee_item_log` (
  `logId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeId` int(10) unsigned NOT NULL,
  `itemId` int(10) unsigned NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`logId`),
  KEY `fk_hr_employee_item_log_hr_employee_info1_idx` (`employeeId`),
  KEY `fk_hr_employee_item_log_hr_inventory_item_info1_idx` (`itemId`),
  CONSTRAINT `fk_hr_employee_item_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_employee_item_log_hr_inventory_item_info1` FOREIGN KEY (`itemId`) REFERENCES `hr_inventory_item_info` (`itemId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_employee_item_log`
--

LOCK TABLES `hr_employee_item_log` WRITE;
/*!40000 ALTER TABLE `hr_employee_item_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_employee_item_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_event_log`
--

DROP TABLE IF EXISTS `hr_event_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_event_log` (
  `eventLogId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventTypeId` tinyint(3) unsigned NOT NULL,
  `assetId` int(10) unsigned NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `employeeId` int(10) unsigned DEFAULT NULL,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`eventLogId`),
  KEY `fk_hr_event_log_hr_event_type_info1_idx` (`eventTypeId`),
  KEY `fk_hr_event_log_hr_system_asset_info1_idx` (`assetId`),
  KEY `fk_hr_event_log_hr_employee_info1_idx` (`employeeId`),
  KEY `fk_hr_event_log_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_event_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_event_log_hr_event_type_info1` FOREIGN KEY (`eventTypeId`) REFERENCES `hr_event_type_info` (`eventTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_event_log_hr_system_asset_info1` FOREIGN KEY (`assetId`) REFERENCES `hr_system_asset_info` (`assetId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_event_log_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_event_log`
--

LOCK TABLES `hr_event_log` WRITE;
/*!40000 ALTER TABLE `hr_event_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_event_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_event_type_info`
--

DROP TABLE IF EXISTS `hr_event_type_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_event_type_info` (
  `eventTypeId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `eventTypeName` varchar(45) DEFAULT NULL COMMENT 'create, edit, delete',
  PRIMARY KEY (`eventTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_event_type_info`
--

LOCK TABLES `hr_event_type_info` WRITE;
/*!40000 ALTER TABLE `hr_event_type_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_event_type_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_files`
--

DROP TABLE IF EXISTS `hr_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_files` (
  `fileId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objectTypeId` tinyint(3) unsigned NOT NULL COMMENT 'What file belongs to.',
  `uploadDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(45) NOT NULL,
  `path` varchar(45) NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `objectId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fileId`),
  KEY `fk_hr_files_hr_object_info1_idx` (`objectTypeId`),
  KEY `fk_hr_files_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_files_hr_object_info1` FOREIGN KEY (`objectTypeId`) REFERENCES `hr_object_type_info` (`objectTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_files_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_files`
--

LOCK TABLES `hr_files` WRITE;
/*!40000 ALTER TABLE `hr_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_incident_log`
--

DROP TABLE IF EXISTS `hr_incident_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_incident_log` (
  `incidentLogId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeId` int(10) unsigned NOT NULL,
  `incidentTypeId` tinyint(3) unsigned NOT NULL,
  `incidentTimestamp` datetime NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`incidentLogId`),
  KEY `fk_hr_violation_log_hr_violation_type1_idx` (`incidentTypeId`),
  KEY `fk_hr_incident_log_hr_employee_info1_idx` (`employeeId`),
  KEY `fk_hr_incident_log_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_incident_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_incident_log_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_violation_log_hr_violation_type1` FOREIGN KEY (`incidentTypeId`) REFERENCES `hr_incident_type` (`typeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_incident_log`
--

LOCK TABLES `hr_incident_log` WRITE;
/*!40000 ALTER TABLE `hr_incident_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_incident_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_incident_type`
--

DROP TABLE IF EXISTS `hr_incident_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_incident_type` (
  `typeId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`typeId`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_incident_type`
--

LOCK TABLES `hr_incident_type` WRITE;
/*!40000 ALTER TABLE `hr_incident_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_incident_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_inventory_item_info`
--

DROP TABLE IF EXISTS `hr_inventory_item_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_inventory_item_info` (
  `itemId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventoryTypeId` tinyint(3) unsigned NOT NULL,
  `itemMake` varchar(45) NOT NULL,
  `itemModel` varchar(45) DEFAULT NULL,
  `itemSN` varchar(45) DEFAULT NULL,
  `itemPieceCount` tinyint(4) DEFAULT NULL,
  `itemDescription` varchar(45) DEFAULT NULL,
  `itemPurchseDate` date DEFAULT NULL,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`itemId`),
  KEY `fk_hr_inventory_item_info_hr_inventory_type1_idx` (`inventoryTypeId`),
  KEY `fk_hr_inventory_item_info_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_inventory_item_info_hr_inventory_type1` FOREIGN KEY (`inventoryTypeId`) REFERENCES `hr_inventory_type` (`typeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_inventory_item_info_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_inventory_item_info`
--

LOCK TABLES `hr_inventory_item_info` WRITE;
/*!40000 ALTER TABLE `hr_inventory_item_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_inventory_item_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_inventory_type`
--

DROP TABLE IF EXISTS `hr_inventory_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_inventory_type` (
  `typeId` tinyint(3) unsigned NOT NULL,
  `typeName` varchar(45) DEFAULT NULL,
  `typeDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_inventory_type`
--

LOCK TABLES `hr_inventory_type` WRITE;
/*!40000 ALTER TABLE `hr_inventory_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_inventory_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_object_type_info`
--

DROP TABLE IF EXISTS `hr_object_type_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_object_type_info` (
  `objectTypeId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` varchar(45) NOT NULL COMMENT 'Employee, File, Fire event, Hire event',
  PRIMARY KEY (`objectTypeId`),
  UNIQUE KEY `objectName_UNIQUE` (`objectType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_object_type_info`
--

LOCK TABLES `hr_object_type_info` WRITE;
/*!40000 ALTER TABLE `hr_object_type_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_object_type_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_position_type_info`
--

DROP TABLE IF EXISTS `hr_position_type_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_position_type_info` (
  `positionId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `positionName` varchar(45) NOT NULL,
  PRIMARY KEY (`positionId`),
  UNIQUE KEY `positionName_UNIQUE` (`positionName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_position_type_info`
--

LOCK TABLES `hr_position_type_info` WRITE;
/*!40000 ALTER TABLE `hr_position_type_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_position_type_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_sessions`
--

DROP TABLE IF EXISTS `hr_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_sessions` (
  `sessionId` char(34) NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  `userFullName` varchar(100) DEFAULT NULL,
  `sessionStartDatetime` datetime DEFAULT NULL,
  `sessionEndDatetime` datetime DEFAULT NULL,
  `sessionData` longtext,
  `lastAccessed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sessionId`),
  KEY `fk_hr_sessions_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_hr_sessions_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_sessions`
--

LOCK TABLES `hr_sessions` WRITE;
/*!40000 ALTER TABLE `hr_sessions` DISABLE KEYS */;
INSERT INTO `hr_sessions` VALUES ('rihg4prjsqmu01o80d963523d3',2001,' ',NULL,NULL,'User|O:4:\"User\":8:{s:9:\"\0*\0userId\";s:4:\"2001\";s:16:\"\0*\0userFirstName\";N;s:15:\"\0*\0userLastName\";N;s:15:\"\0*\0userPassword\";s:128:\"3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2\";s:12:\"\0*\0userEmail\";s:1:\"d\";s:12:\"\0*\0userPhone\";N;s:13:\"userFirstname\";s:4:\"Dima\";s:12:\"userLastname\";s:1:\"K\";}','2016-11-08 15:55:28');
/*!40000 ALTER TABLE `hr_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_system_asset_info`
--

DROP TABLE IF EXISTS `hr_system_asset_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_system_asset_info` (
  `assetId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assetName` varchar(45) NOT NULL,
  `assetDisplayValue` varchar(45) DEFAULT NULL,
  `assetDescription` varchar(45) NOT NULL COMMENT 'to show in hints.',
  `assetCSSClasses` varchar(100) DEFAULT NULL,
  `tableName` varchar(45) DEFAULT NULL COMMENT 'just to make it easy to find.',
  PRIMARY KEY (`assetId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_system_asset_info`
--

LOCK TABLES `hr_system_asset_info` WRITE;
/*!40000 ALTER TABLE `hr_system_asset_info` DISABLE KEYS */;
INSERT INTO `hr_system_asset_info` VALUES (1,'employeeId','Employee ID','Employee ID #',NULL,'hr_employee_info'),(2,'employeeFirstname','First name','Employee first name',NULL,'hr_employee_info'),(3,'employeeLastname','Last name','Employee last name',NULL,'hr_employee_info'),(4,'employeeSSN','SSN','SSN',NULL,'hr_employee_info'),(5,'employeeDOB','DOB','Date of birth',NULL,'hr_employee_info'),(6,'employeeRace','Race','Race',NULL,'hr_employee_info'),(7,'employeeGender','Gender','Gender',NULL,'hr_employee_info'),(8,'cellphonePersonal','Personal mobile#','Personal mobile#',NULL,'hr_employee_info'),(9,'cellphoneWork','Work mobile#','Work mobile#',NULL,'hr_employee_info'),(10,'phoneDirectLine','Direct line','Work phone direct line',NULL,'hr_employee_info'),(11,'phoneExt','Ext','Work phone extension',NULL,'hr_employee_info'),(12,'GCExpire','GC expire date','Expiration date of Green Card.',NULL,'hr_employee_info'),(13,'emailPersonal','Personal email','Personal email address.',NULL,'hr_employee_info'),(14,'emailWork','Work email','Work email address.',NULL,'hr_employee_info'),(15,'hireDate','Hire date','Hire date',NULL,'hr_employee_info'),(16,'positionId','Position ID','System position ID',NULL,'hr_employee_info'),(17,'emergencyContact','Emergency contact','Emergency contact',NULL,'hr_employee_info'),(18,'dlNumber','DL','Driver\'s license ID',NULL,'hr_employee_info'),(20,'tb_userId','TB user ID','User ID in Truckingbase',NULL,'hr_employee_info'),(21,'addressId','Address ID','Employee address ID in the system.',NULL,'employeeAddresses'),(22,'street1','Address 1','First address line',NULL,'employeeAddresses'),(23,'street 2','Street 2','Street address second line',NULL,'employeeAddresses'),(24,'city','City','City',NULL,'employeeAddresses'),(25,'county','County','County',NULL,'employeeAddresses'),(26,'state','State','State',NULL,'employeeAddresses'),(27,'zip','Zip','Zip code',NULL,'employeeAddresses'),(28,'country','County code','County code',NULL,'employeeAddresses'),(29,'datetime','Date','Date of address creation in the system.',NULL,'employeeAddresses');
/*!40000 ALTER TABLE `hr_system_asset_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_system_form_assets`
--

DROP TABLE IF EXISTS `hr_system_form_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_system_form_assets` (
  `formId` int(10) unsigned NOT NULL,
  `assetId` int(10) unsigned NOT NULL,
  `isRequired` tinyint(1) NOT NULL DEFAULT '0',
  `pattern` varchar(500) NOT NULL DEFAULT '.+',
  `displayValue` varchar(500) DEFAULT NULL COMMENT 'If null default displayValue from asset_info is to be used.',
  `errorMessage` varchar(500) DEFAULT NULL COMMENT 'Error message to display if validation is not passed.',
  `maxLength` tinyint(3) unsigned NOT NULL DEFAULT '45',
  `minLength` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `maxValue` varchar(45) DEFAULT NULL,
  `minValue` varchar(45) DEFAULT NULL,
  `css` varchar(200) DEFAULT NULL COMMENT 'additional css',
  PRIMARY KEY (`formId`,`assetId`),
  KEY `fk_hr_system_form_assets_hr_system_asset_info1_idx` (`assetId`),
  CONSTRAINT `fk_hr_system_form_assets_hr_system_asset_info1` FOREIGN KEY (`assetId`) REFERENCES `hr_system_asset_info` (`assetId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_system_form_assets_hr_system_form_info1` FOREIGN KEY (`formId`) REFERENCES `hr_system_form_info` (`formId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_system_form_assets`
--

LOCK TABLES `hr_system_form_assets` WRITE;
/*!40000 ALTER TABLE `hr_system_form_assets` DISABLE KEYS */;
INSERT INTO `hr_system_form_assets` VALUES (1,2,1,'^[a-zA-Z ]+$',NULL,'First name must consist of letters only and must not be longer than 20 characters.',20,1,NULL,NULL,NULL),(1,3,1,'^[a-zA-Z ]+$',NULL,'First name must consist of letters only and must not be longer than 20 characters.',20,1,NULL,NULL,NULL),(1,4,1,'\\d{3}-\\d{2}-\\d{4}',NULL,'Incorrect SSN provided.',11,11,NULL,NULL,NULL),(1,5,0,'^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$',NULL,NULL,45,0,NULL,NULL,NULL),(1,6,0,'[a-zA-Z]',NULL,NULL,20,0,NULL,NULL,NULL),(1,7,0,'[a-zA-Z]',NULL,NULL,10,0,NULL,NULL,NULL),(1,8,1,'\\d{3}-\\d{3}-\\d{4}',NULL,NULL,12,12,NULL,NULL,NULL),(1,9,0,'\\d{3}-\\d{3}-\\d{4}',NULL,NULL,12,12,NULL,NULL,NULL),(1,10,0,'\\d{3}-\\d{3}-\\d{4}',NULL,NULL,12,12,NULL,NULL,NULL),(1,11,0,'[0-9]',NULL,NULL,5,3,NULL,NULL,NULL),(1,12,0,'^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$',NULL,NULL,0,0,NULL,'today+10',NULL),(1,13,1,'^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$',NULL,NULL,50,0,NULL,NULL,NULL),(1,14,0,'^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$',NULL,NULL,45,0,NULL,NULL,NULL),(1,15,1,'^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$',NULL,NULL,45,0,NULL,NULL,NULL),(1,17,1,'.+',NULL,NULL,200,0,NULL,NULL,NULL),(1,18,0,'.+',NULL,NULL,45,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hr_system_form_assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_system_form_info`
--

DROP TABLE IF EXISTS `hr_system_form_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_system_form_info` (
  `formId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formName` varchar(45) NOT NULL,
  PRIMARY KEY (`formId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_system_form_info`
--

LOCK TABLES `hr_system_form_info` WRITE;
/*!40000 ALTER TABLE `hr_system_form_info` DISABLE KEYS */;
INSERT INTO `hr_system_form_info` VALUES (1,'New employee');
/*!40000 ALTER TABLE `hr_system_form_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_user_info`
--

DROP TABLE IF EXISTS `hr_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_user_info` (
  `userId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userFirstname` varchar(45) NOT NULL,
  `userLastname` varchar(45) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `userPassword` varchar(600) NOT NULL DEFAULT '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2002 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_user_info`
--

LOCK TABLES `hr_user_info` WRITE;
/*!40000 ALTER TABLE `hr_user_info` DISABLE KEYS */;
INSERT INTO `hr_user_info` VALUES (2001,'Dima','K','d','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');
/*!40000 ALTER TABLE `hr_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_vacation_info`
--

DROP TABLE IF EXISTS `hr_vacation_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_vacation_info` (
  `vocationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeId` int(10) unsigned NOT NULL,
  `requestDatetime` datetime DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `vocation_infocol` varchar(45) DEFAULT NULL,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`vocationId`),
  KEY `fk_vocation_info_hr_user_info1_idx` (`userId`),
  CONSTRAINT `fk_vocation_info_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_vacation_info`
--

LOCK TABLES `hr_vacation_info` WRITE;
/*!40000 ALTER TABLE `hr_vacation_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_vacation_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-08 16:54:17
