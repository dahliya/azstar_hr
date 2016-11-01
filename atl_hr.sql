-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2016 at 02:53 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

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
-- Table structure for table `hr_employee_info`
--

CREATE TABLE `hr_employee_info` (
  `employeeId` int(10) UNSIGNED NOT NULL,
  `employeeName` varchar(45) NOT NULL,
  `employeeLastname` varchar(45) NOT NULL,
  `employeeSSN` varchar(11) NOT NULL,
  `employeeStreet` varchar(45) NOT NULL,
  `employeeCity` varchar(45) NOT NULL,
  `employeeState` varchar(8) NOT NULL,
  `employeeZip` char(5) DEFAULT NULL,
  `employeeDOB` date NOT NULL,
  `employeeRace` varchar(45) DEFAULT NULL,
  `employeeGender` char(1) DEFAULT NULL,
  `cellphonePersonal` char(8) NOT NULL,
  `cellphoneWork` char(8) DEFAULT NULL,
  `phoneDirect` char(8) DEFAULT NULL,
  `phoneExt` char(4) DEFAULT NULL,
  `GCExpire` date DEFAULT NULL,
  `emailPersonal` varchar(100) NOT NULL,
  `emailWork` varchar(100) DEFAULT NULL,
  `hireDate` date DEFAULT NULL,
  `positionId` tinyint(3) UNSIGNED DEFAULT NULL,
  `emergencyContact` varchar(45) DEFAULT NULL,
  `dlNumber` varchar(45) DEFAULT NULL,
  `supervisorId` int(10) UNSIGNED NOT NULL COMMENT 'employeeId of the supervisor.',
  `tb_userId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_info`
--

INSERT INTO `hr_employee_info` (`employeeId`, `employeeName`, `employeeLastname`, `employeeSSN`, `employeeStreet`, `employeeCity`, `employeeState`, `employeeZip`, `employeeDOB`, `employeeRace`, `employeeGender`, `cellphonePersonal`, `cellphoneWork`, `phoneDirect`, `phoneExt`, `GCExpire`, `emailPersonal`, `emailWork`, `hireDate`, `positionId`, `emergencyContact`, `dlNumber`, `supervisorId`, `tb_userId`) VALUES
(14, 'Irina', 'Kim', '111', 'Roundrock', 'Plano', 'TX', '75023', '2016-01-01', 'Asian', 'F', '111111', '111111', '222222', '123', '2016-01-01', 'kim@gmail.com', 'none@gmail.com', '2016-01-01', 1, '11', '11', 1, 2),
(25, 'Dmitriy', 'Kim', '111 11 1111', 'XXX', 'Indianapolis', 'TX', '77777', '2016-01-01', 'Pacific Asian', 'M', '2312311', '2313222', '2313213', '124', '2016-01-01', 'dima@gmail.com', 'kim@gmail.com', '2016-01-01', 2, '22222222', '22222222', 1, 11111);

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
  `eventTypeName` varchar(45) DEFAULT NULL COMMENT AS `create, edit, delete`
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
  `itemPurchaseDate` date DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_inventory_item_info`
--

INSERT INTO `hr_inventory_item_info` (`itemId`, `inventoryTypeId`, `itemMake`, `itemModel`, `itemSN`, `itemPieceCount`, `itemDescription`, `itemPurchaseDate`, `userId`) VALUES
(1, 222, 'TableProducer', 'tableikea', '123123123', 1, 'white table', '2016-10-04', 2),
(222, 111, 'Dell', 'last version 2016', '13123123', 1, 'Dell processor', '2016-10-07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hr_inventory_type`
--

CREATE TABLE `hr_inventory_type` (
  `typeId` tinyint(3) UNSIGNED NOT NULL,
  `typeName` varchar(45) DEFAULT NULL,
  `typeDescription` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_inventory_type`
--

INSERT INTO `hr_inventory_type` (`typeId`, `typeName`, `typeDescription`) VALUES
(111, 'Computer', 'Office Equipment'),
(222, 'Table', 'Wooden');

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

--
-- Dumping data for table `hr_position_type_info`
--

INSERT INTO `hr_position_type_info` (`positionId`, `positionName`) VALUES
(1, 'assistant'),
(2, 'IT');

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
('vm74l7e70tbva9bg5bm7585nh2', 2, ' ', NULL, NULL, 'User|O:4:"User":8:{s:9:"\0*\0userId";s:1:"2";s:16:"\0*\0userFirstName";N;s:15:"\0*\0userLastName";N;s:15:"\0*\0userPassword";s:128:"3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2";s:12:"\0*\0userEmail";s:13:"some@some.com";s:12:"\0*\0userPhone";N;s:13:"userFirstname";s:4:"Dima";s:12:"userLastname";s:3:"Kim";}', '2016-10-31 21:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `hr_system_asset_info`
--

CREATE TABLE `hr_system_asset_info` (
  `assetId` int(10) UNSIGNED NOT NULL,
  `assetName` varchar(45) NOT NULL,
  `tableName` varchar(45) DEFAULT NULL,
  `assetDisplayValue` varchar(45) DEFAULT NULL,
  `assetType` varchar(45) NOT NULL COMMENT 'table field, composition value,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Dima', 'Kim', 'some@some.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

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
-- Indexes for table `hr_employee_info`
--
ALTER TABLE `hr_employee_info`
  ADD PRIMARY KEY (`employeeId`),
  ADD UNIQUE KEY `tb_userId_UNIQUE` (`tb_userId`),
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
  MODIFY `itemId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `hr_object_type_info`
--
ALTER TABLE `hr_object_type_info`
  MODIFY `objectTypeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_position_type_info`
--
ALTER TABLE `hr_position_type_info`
  MODIFY `positionId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr_system_asset_info`
--
ALTER TABLE `hr_system_asset_info`
  MODIFY `assetId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_user_info`
--
ALTER TABLE `hr_user_info`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Constraints for table `hr_vacation_info`
--
ALTER TABLE `hr_vacation_info`
  ADD CONSTRAINT `fk_vocation_info_hr_user_info1` FOREIGN KEY (`userId`) REFERENCES `hr_user_info` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
