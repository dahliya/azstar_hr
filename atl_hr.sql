-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2016 at 04:58 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atl_hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_comments`
--

CREATE TABLE `hr_comments` (
  `commentId` int(10) UNSIGNED NOT NULL,
  `objectTypeId` tinyint(3) UNSIGNED NOT NULL,
  `comment` varchar(45) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) UNSIGNED NOT NULL,
  `objectId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_addresses`
--

CREATE TABLE `hr_employee_addresses` (
  `addressId` int(10) UNSIGNED NOT NULL,
  `employeeId` int(10) UNSIGNED NOT NULL,
  `street1` varchar(45) NOT NULL,
  `street2` varchar(45) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `county` varchar(45) DEFAULT NULL,
  `state` varchar(45) NOT NULL,
  `zip` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL DEFAULT 'USA',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_addresses`
--

INSERT INTO `hr_employee_addresses` (`addressId`, `employeeId`, `street1`, `street2`, `city`, `county`, `state`, `zip`, `country`, `datetime`, `userId`) VALUES
(2, 5, '12 Washington Ave.', 'Apt. 2', 'Washington DC', 'Kenya County', 'NJ', '50279', 'USA', '2016-11-08 15:33:35', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_info`
--

CREATE TABLE `hr_employee_info` (
  `employeeId` int(10) UNSIGNED NOT NULL,
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
  `positionId` tinyint(3) UNSIGNED DEFAULT NULL,
  `emergencyContact` varchar(200) DEFAULT NULL,
  `dlNumber` varchar(45) DEFAULT NULL,
  `tb_userId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_info`
--

INSERT INTO `hr_employee_info` (`employeeId`, `employeeFirstname`, `employeeLastname`, `employeeSSN`, `employeeDOB`, `employeeRace`, `employeeGender`, `cellphonePersonal`, `cellphoneWork`, `phoneDirectLine`, `phoneExt`, `GCExpire`, `emailPersonal`, `emailWork`, `hireDate`, `positionId`, `emergencyContact`, `dlNumber`, `tb_userId`) VALUES
(5, 'Barak', 'Obama', '001-13-1234', '1960-12-01', 'Asian', 'm', '541-235-6547', NULL, NULL, NULL, '2020-01-01', 'barakobama@whitehouse.kz', 'barakobama@whitehouse.uz', '2008-11-08', NULL, 'Michelle Obama @ 582-548-6548', 'obamadrives323', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_item_log`
--

CREATE TABLE `hr_employee_item_log` (
  `logId` int(10) UNSIGNED NOT NULL,
  `employeeId` int(10) UNSIGNED NOT NULL,
  `itemId` int(10) UNSIGNED NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_event_log`
--

CREATE TABLE `hr_event_log` (
  `eventLogId` int(10) UNSIGNED NOT NULL,
  `eventTypeId` tinyint(3) UNSIGNED NOT NULL,
  `assetId` int(10) UNSIGNED NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `employeeId` int(10) UNSIGNED DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_event_type_info`
--

CREATE TABLE `hr_event_type_info` (
  `eventTypeId` tinyint(3) UNSIGNED NOT NULL,
  `eventTypeName` varchar(45) DEFAULT NULL COMMENT 'create, edit, delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_files`
--

CREATE TABLE `hr_files` (
  `fileId` int(10) UNSIGNED NOT NULL,
  `objectTypeId` tinyint(3) UNSIGNED NOT NULL COMMENT 'What file belongs to.',
  `uploadDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(45) NOT NULL,
  `path` varchar(45) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `objectId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_incident_log`
--

CREATE TABLE `hr_incident_log` (
  `incidentLogId` int(10) UNSIGNED NOT NULL,
  `employeeId` int(10) UNSIGNED NOT NULL,
  `incidentTypeId` tinyint(3) UNSIGNED NOT NULL,
  `incidentTimestamp` datetime NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_incident_type`
--

CREATE TABLE `hr_incident_type` (
  `typeId` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_inventory_item_info`
--

CREATE TABLE `hr_inventory_item_info` (
  `itemId` int(10) UNSIGNED NOT NULL,
  `inventoryTypeId` tinyint(3) UNSIGNED NOT NULL,
  `itemMake` varchar(45) NOT NULL,
  `itemModel` varchar(45) DEFAULT NULL,
  `itemSN` varchar(45) DEFAULT NULL,
  `itemPieceCount` tinyint(4) DEFAULT NULL,
  `itemDescription` varchar(45) DEFAULT NULL,
  `itemPurchseDate` date DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_inventory_type`
--

CREATE TABLE `hr_inventory_type` (
  `typeId` tinyint(3) UNSIGNED NOT NULL,
  `typeName` varchar(45) DEFAULT NULL,
  `typeDescription` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_object_type_info`
--

CREATE TABLE `hr_object_type_info` (
  `objectTypeId` tinyint(3) UNSIGNED NOT NULL,
  `objectType` varchar(45) NOT NULL COMMENT 'Employee, File, Fire event, Hire event'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_position_type_info`
--

CREATE TABLE `hr_position_type_info` (
  `positionId` tinyint(3) UNSIGNED NOT NULL,
  `positionName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_sessions`
--

CREATE TABLE `hr_sessions` (
  `sessionId` char(34) NOT NULL,
  `userId` int(10) UNSIGNED DEFAULT NULL,
  `userFullName` varchar(100) DEFAULT NULL,
  `sessionStartDatetime` datetime DEFAULT NULL,
  `sessionEndDatetime` datetime DEFAULT NULL,
  `sessionData` longtext,
  `lastAccessed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_sessions`
--

INSERT INTO `hr_sessions` (`sessionId`, `userId`, `userFullName`, `sessionStartDatetime`, `sessionEndDatetime`, `sessionData`, `lastAccessed`) VALUES
('rihg4prjsqmu01o80d963523d3', 2001, ' ', NULL, NULL, 'User|O:4:"User":8:{s:9:"\0*\0userId";s:4:"2001";s:16:"\0*\0userFirstName";N;s:15:"\0*\0userLastName";N;s:15:"\0*\0userPassword";s:128:"3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2";s:12:"\0*\0userEmail";s:1:"d";s:12:"\0*\0userPhone";N;s:13:"userFirstname";s:4:"Dima";s:12:"userLastname";s:1:"K";}', '2016-11-08 15:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `hr_system_asset_info`
--

CREATE TABLE `hr_system_asset_info` (
  `assetId` int(10) UNSIGNED NOT NULL,
  `assetName` varchar(45) NOT NULL,
  `assetDisplayValue` varchar(45) DEFAULT NULL,
  `assetDescription` varchar(45) NOT NULL COMMENT 'to show in hints.',
  `assetCSSClasses` varchar(100) DEFAULT NULL,
  `tableName` varchar(45) DEFAULT NULL COMMENT 'just to make it easy to find.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_system_asset_info`
--

INSERT INTO `hr_system_asset_info` (`assetId`, `assetName`, `assetDisplayValue`, `assetDescription`, `assetCSSClasses`, `tableName`) VALUES
(1, 'employeeId', 'Employee ID', 'Employee ID #', NULL, 'hr_employee_info'),
(2, 'employeeFirstname', 'First name', 'Employee first name', NULL, 'hr_employee_info'),
(3, 'employeeLastname', 'Last name', 'Employee last name', NULL, 'hr_employee_info'),
(4, 'employeeSSN', 'SSN', 'SSN', NULL, 'hr_employee_info'),
(5, 'employeeDOB', 'DOB', 'Date of birth', NULL, 'hr_employee_info'),
(6, 'employeeRace', 'Race', 'Race', NULL, 'hr_employee_info'),
(7, 'employeeGender', 'Gender', 'Gender', NULL, 'hr_employee_info'),
(8, 'cellphonePersonal', 'Personal mobile#', 'Personal mobile#', NULL, 'hr_employee_info'),
(9, 'cellphoneWork', 'Work mobile#', 'Work mobile#', NULL, 'hr_employee_info'),
(10, 'phoneDirectLine', 'Direct line', 'Work phone direct line', NULL, 'hr_employee_info'),
(11, 'phoneExt', 'Ext', 'Work phone extension', NULL, 'hr_employee_info'),
(12, 'GCExpire', 'GC expire date', 'Expiration date of Green Card.', NULL, 'hr_employee_info'),
(13, 'emailPersonal', 'Personal email', 'Personal email address.', NULL, 'hr_employee_info'),
(14, 'emailWork', 'Work email', 'Work email address.', NULL, 'hr_employee_info'),
(15, 'hireDate', 'Hire date', 'Hire date', NULL, 'hr_employee_info'),
(16, 'positionId', 'Position ID', 'System position ID', NULL, 'hr_employee_info'),
(17, 'emergencyContact', 'Emergency contact', 'Emergency contact', NULL, 'hr_employee_info'),
(18, 'dlNumber', 'DL', 'Driver\'s license ID', NULL, 'hr_employee_info'),
(20, 'tb_userId', 'TB user ID', 'User ID in Truckingbase', NULL, 'hr_employee_info'),
(21, 'addressId', 'Address ID', 'Employee address ID in the system.', NULL, 'employeeAddresses'),
(22, 'street1', 'Address 1', 'First address line', NULL, 'employeeAddresses'),
(23, 'street 2', 'Street 2', 'Street address second line', NULL, 'employeeAddresses'),
(24, 'city', 'City', 'City', NULL, 'employeeAddresses'),
(25, 'county', 'County', 'County', NULL, 'employeeAddresses'),
(26, 'state', 'State', 'State', NULL, 'employeeAddresses'),
(27, 'zip', 'Zip', 'Zip code', NULL, 'employeeAddresses'),
(28, 'country', 'County code', 'County code', NULL, 'employeeAddresses'),
(29, 'datetime', 'Date', 'Date of address creation in the system.', NULL, 'employeeAddresses');

-- --------------------------------------------------------

--
-- Table structure for table `hr_system_form_assets`
--

CREATE TABLE `hr_system_form_assets` (
  `formId` int(10) UNSIGNED NOT NULL,
  `assetId` int(10) UNSIGNED NOT NULL,
  `isRequired` tinyint(1) NOT NULL DEFAULT '0',
  `pattern` varchar(500) NOT NULL DEFAULT '.+',
  `displayValue` varchar(500) DEFAULT NULL COMMENT 'If null default displayValue from asset_info is to be used.',
  `errorMessage` varchar(500) DEFAULT NULL COMMENT 'Error message to display if validation is not passed.',
  `maxLength` tinyint(3) UNSIGNED NOT NULL DEFAULT '45',
  `minLength` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `maxValue` varchar(45) DEFAULT NULL,
  `minValue` varchar(45) DEFAULT NULL,
  `css` varchar(200) DEFAULT NULL COMMENT 'additional css'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_system_form_assets`
--

INSERT INTO `hr_system_form_assets` (`formId`, `assetId`, `isRequired`, `pattern`, `displayValue`, `errorMessage`, `maxLength`, `minLength`, `maxValue`, `minValue`, `css`) VALUES
(1, 2, 1, '^[a-zA-Z ]+$', NULL, 'First name must consist of letters only and must not be longer than 20 characters.', 20, 1, NULL, NULL, NULL),
(1, 3, 1, '^[a-zA-Z ]+$', NULL, 'First name must consist of letters only and must not be longer than 20 characters.', 20, 1, NULL, NULL, NULL),
(1, 4, 1, '\\d{3}-\\d{2}-\\d{4}', NULL, 'Incorrect SSN provided.', 11, 11, NULL, NULL, NULL),
(1, 5, 0, '^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$', NULL, NULL, 45, 0, NULL, NULL, NULL),
(1, 6, 0, '[a-zA-Z]', NULL, NULL, 20, 0, NULL, NULL, NULL),
(1, 7, 0, '[a-zA-Z]', NULL, NULL, 10, 0, NULL, NULL, NULL),
(1, 8, 1, '\\d{3}-\\d{3}-\\d{4}', NULL, NULL, 12, 12, NULL, NULL, NULL),
(1, 9, 0, '\\d{3}-\\d{3}-\\d{4}', NULL, NULL, 12, 12, NULL, NULL, NULL),
(1, 10, 0, '\\d{3}-\\d{3}-\\d{4}', NULL, NULL, 12, 12, NULL, NULL, NULL),
(1, 11, 0, '[0-9]', NULL, NULL, 5, 3, NULL, NULL, NULL),
(1, 12, 0, '^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$', NULL, NULL, 0, 0, NULL, 'today+10', NULL),
(1, 13, 1, '^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$', NULL, NULL, 50, 0, NULL, NULL, NULL),
(1, 14, 0, '^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+(\\.[a-z0-9-]+)*(\\.[a-z]{2,4})$', NULL, NULL, 45, 0, NULL, NULL, NULL),
(1, 15, 1, '^(19|20)\\d\\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$', NULL, NULL, 45, 0, NULL, NULL, NULL),
(1, 17, 1, '.+', NULL, NULL, 200, 0, NULL, NULL, NULL),
(1, 18, 0, '.+', NULL, NULL, 45, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_system_form_info`
--

CREATE TABLE `hr_system_form_info` (
  `formId` int(10) UNSIGNED NOT NULL,
  `formName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_system_form_info`
--

INSERT INTO `hr_system_form_info` (`formId`, `formName`) VALUES
(1, 'New employee');

-- --------------------------------------------------------

--
-- Table structure for table `hr_user_info`
--

CREATE TABLE `hr_user_info` (
  `userId` int(10) UNSIGNED NOT NULL,
  `userFirstname` varchar(45) NOT NULL,
  `userLastname` varchar(45) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `userPassword` varchar(600) NOT NULL DEFAULT '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_user_info`
--

INSERT INTO `hr_user_info` (`userId`, `userFirstname`, `userLastname`, `userEmail`, `userPassword`) VALUES
(2001, 'Dima', 'K', 'd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

-- --------------------------------------------------------

--
-- Table structure for table `hr_vacation_info`
--

CREATE TABLE `hr_vacation_info` (
  `vocationId` int(10) UNSIGNED NOT NULL,
  `employeeId` int(10) UNSIGNED NOT NULL,
  `requestDatetime` datetime DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `vocation_infocol` varchar(45) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_comments`
--
ALTER TABLE `hr_comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `fk_hr_comments_hr_object_info1_idx` (`objectTypeId`),
  ADD KEY `fk_hr_comments_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_employee_addresses`
--
ALTER TABLE `hr_employee_addresses`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `fk_employeeAddresses_hr_employee_info1_idx` (`employeeId`),
  ADD KEY `fk_employeeAddresses_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_employee_info`
--
ALTER TABLE `hr_employee_info`
  ADD PRIMARY KEY (`employeeId`),
  ADD UNIQUE KEY `emailPersonal_UNIQUE` (`emailPersonal`),
  ADD UNIQUE KEY `tb_userId_UNIQUE` (`tb_userId`),
  ADD UNIQUE KEY `emailWork_UNIQUE` (`emailWork`),
  ADD KEY `fk_hr_employee_info_position_type_info1_idx` (`positionId`);

--
-- Indexes for table `hr_employee_item_log`
--
ALTER TABLE `hr_employee_item_log`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `fk_hr_employee_item_log_hr_employee_info1_idx` (`employeeId`),
  ADD KEY `fk_hr_employee_item_log_hr_inventory_item_info1_idx` (`itemId`);

--
-- Indexes for table `hr_event_log`
--
ALTER TABLE `hr_event_log`
  ADD PRIMARY KEY (`eventLogId`),
  ADD KEY `fk_hr_event_log_hr_event_type_info1_idx` (`eventTypeId`),
  ADD KEY `fk_hr_event_log_hr_system_asset_info1_idx` (`assetId`),
  ADD KEY `fk_hr_event_log_hr_employee_info1_idx` (`employeeId`),
  ADD KEY `fk_hr_event_log_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_event_type_info`
--
ALTER TABLE `hr_event_type_info`
  ADD PRIMARY KEY (`eventTypeId`);

--
-- Indexes for table `hr_files`
--
ALTER TABLE `hr_files`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `fk_hr_files_hr_object_info1_idx` (`objectTypeId`),
  ADD KEY `fk_hr_files_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_incident_log`
--
ALTER TABLE `hr_incident_log`
  ADD PRIMARY KEY (`incidentLogId`),
  ADD KEY `fk_hr_violation_log_hr_violation_type1_idx` (`incidentTypeId`),
  ADD KEY `fk_hr_incident_log_hr_employee_info1_idx` (`employeeId`),
  ADD KEY `fk_hr_incident_log_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_incident_type`
--
ALTER TABLE `hr_incident_type`
  ADD PRIMARY KEY (`typeId`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `hr_inventory_item_info`
--
ALTER TABLE `hr_inventory_item_info`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `fk_hr_inventory_item_info_hr_inventory_type1_idx` (`inventoryTypeId`),
  ADD KEY `fk_hr_inventory_item_info_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_inventory_type`
--
ALTER TABLE `hr_inventory_type`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `hr_object_type_info`
--
ALTER TABLE `hr_object_type_info`
  ADD PRIMARY KEY (`objectTypeId`),
  ADD UNIQUE KEY `objectName_UNIQUE` (`objectType`);

--
-- Indexes for table `hr_position_type_info`
--
ALTER TABLE `hr_position_type_info`
  ADD PRIMARY KEY (`positionId`),
  ADD UNIQUE KEY `positionName_UNIQUE` (`positionName`);

--
-- Indexes for table `hr_sessions`
--
ALTER TABLE `hr_sessions`
  ADD PRIMARY KEY (`sessionId`),
  ADD KEY `fk_hr_sessions_hr_user_info1_idx` (`userId`);

--
-- Indexes for table `hr_system_asset_info`
--
ALTER TABLE `hr_system_asset_info`
  ADD PRIMARY KEY (`assetId`);

--
-- Indexes for table `hr_system_form_assets`
--
ALTER TABLE `hr_system_form_assets`
  ADD PRIMARY KEY (`formId`,`assetId`),
  ADD KEY `fk_hr_system_form_assets_hr_system_asset_info1_idx` (`assetId`);

--
-- Indexes for table `hr_system_form_info`
--
ALTER TABLE `hr_system_form_info`
  ADD PRIMARY KEY (`formId`);

--
-- Indexes for table `hr_user_info`
--
ALTER TABLE `hr_user_info`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `hr_vacation_info`
--
ALTER TABLE `hr_vacation_info`
  ADD PRIMARY KEY (`vocationId`),
  ADD KEY `fk_vocation_info_hr_user_info1_idx` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_comments`
--
ALTER TABLE `hr_comments`
  MODIFY `commentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_employee_addresses`
--
ALTER TABLE `hr_employee_addresses`
  MODIFY `addressId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_employee_info`
--
ALTER TABLE `hr_employee_info`
  MODIFY `employeeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hr_employee_item_log`
--
ALTER TABLE `hr_employee_item_log`
  MODIFY `logId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_event_log`
--
ALTER TABLE `hr_event_log`
  MODIFY `eventLogId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_event_type_info`
--
ALTER TABLE `hr_event_type_info`
  MODIFY `eventTypeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_files`
--
ALTER TABLE `hr_files`
  MODIFY `fileId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_incident_log`
--
ALTER TABLE `hr_incident_log`
  MODIFY `incidentLogId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_incident_type`
--
ALTER TABLE `hr_incident_type`
  MODIFY `typeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_inventory_item_info`
--
ALTER TABLE `hr_inventory_item_info`
  MODIFY `itemId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_object_type_info`
--
ALTER TABLE `hr_object_type_info`
  MODIFY `objectTypeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_position_type_info`
--
ALTER TABLE `hr_position_type_info`
  MODIFY `positionId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_system_asset_info`
--
ALTER TABLE `hr_system_asset_info`
  MODIFY `assetId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `hr_system_form_info`
--
ALTER TABLE `hr_system_form_info`
  MODIFY `formId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_user_info`
--
ALTER TABLE `hr_user_info`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;
--
-- AUTO_INCREMENT for table `hr_vacation_info`
--
ALTER TABLE `hr_vacation_info`
  MODIFY `vocationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hr_comments`
--
ALTER TABLE `hr_comments`
  ADD CONSTRAINT `fk_hr_comments_hr_object_info1` FOREIGN KEY (`objectTypeId`) REFERENCES `hr_object_type_info` (`objectTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_comments_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_employee_addresses`
--
ALTER TABLE `hr_employee_addresses`
  ADD CONSTRAINT `fk_employeeAddresses_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employeeAddresses_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_employee_info`
--
ALTER TABLE `hr_employee_info`
  ADD CONSTRAINT `fk_hr_employee_info_position_type_info1` FOREIGN KEY (`positionId`) REFERENCES `hr_position_type_info` (`positionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_employee_item_log`
--
ALTER TABLE `hr_employee_item_log`
  ADD CONSTRAINT `fk_hr_employee_item_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_employee_item_log_hr_inventory_item_info1` FOREIGN KEY (`itemId`) REFERENCES `hr_inventory_item_info` (`itemId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_event_log`
--
ALTER TABLE `hr_event_log`
  ADD CONSTRAINT `fk_hr_event_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_event_log_hr_event_type_info1` FOREIGN KEY (`eventTypeId`) REFERENCES `hr_event_type_info` (`eventTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_event_log_hr_system_asset_info1` FOREIGN KEY (`assetId`) REFERENCES `hr_system_asset_info` (`assetId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_event_log_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_files`
--
ALTER TABLE `hr_files`
  ADD CONSTRAINT `fk_hr_files_hr_object_info1` FOREIGN KEY (`objectTypeId`) REFERENCES `hr_object_type_info` (`objectTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_files_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_incident_log`
--
ALTER TABLE `hr_incident_log`
  ADD CONSTRAINT `fk_hr_incident_log_hr_employee_info1` FOREIGN KEY (`employeeId`) REFERENCES `hr_employee_info` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_incident_log_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_violation_log_hr_violation_type1` FOREIGN KEY (`incidentTypeId`) REFERENCES `hr_incident_type` (`typeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_inventory_item_info`
--
ALTER TABLE `hr_inventory_item_info`
  ADD CONSTRAINT `fk_hr_inventory_item_info_hr_inventory_type1` FOREIGN KEY (`inventoryTypeId`) REFERENCES `hr_inventory_type` (`typeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_inventory_item_info_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_sessions`
--
ALTER TABLE `hr_sessions`
  ADD CONSTRAINT `fk_hr_sessions_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_system_form_assets`
--
ALTER TABLE `hr_system_form_assets`
  ADD CONSTRAINT `fk_hr_system_form_assets_hr_system_asset_info1` FOREIGN KEY (`assetId`) REFERENCES `hr_system_asset_info` (`assetId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr_system_form_assets_hr_system_form_info1` FOREIGN KEY (`formId`) REFERENCES `hr_system_form_info` (`formId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr_vacation_info`
--
ALTER TABLE `hr_vacation_info`
  ADD CONSTRAINT `fk_vocation_info_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
