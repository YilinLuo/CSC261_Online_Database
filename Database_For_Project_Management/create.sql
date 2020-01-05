CREATE DATABASE  IF NOT EXISTS `database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `database`;
-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: database
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `DEPARTMENT`
--

DROP TABLE IF EXISTS `DEPARTMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DEPARTMENT` (
  `DID` varchar(5) NOT NULL DEFAULT '00000',
  `DName` varchar(45) NOT NULL DEFAULT 'Department Name',
  `HeadID` char(8) NOT NULL DEFAULT '00000000',
  `Location` varchar(45) DEFAULT NULL,
  `DContact` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DID`),
  UNIQUE KEY `DID_UNIQUE` (`DID`),
  UNIQUE KEY `DName_UNIQUE` (`DName`),
  KEY `HeadID_idx` (`HeadID`),
  CONSTRAINT `HeadID` FOREIGN KEY (`HeadID`) REFERENCES `employee` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DEPARTMENT`
--

LOCK TABLES `DEPARTMENT` WRITE;
/*!40000 ALTER TABLE `DEPARTMENT` DISABLE KEYS */;
/*!40000 ALTER TABLE `DEPARTMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMERGENCY`
--

DROP TABLE IF EXISTS `EMERGENCY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EMERGENCY` (
  `EID` char(8) NOT NULL DEFAULT '00000000',
  `EmFName` varchar(15) NOT NULL DEFAULT 'First Name',
  `EmMinit` char(1) DEFAULT NULL,
  `EmLName` varchar(15) NOT NULL DEFAULT 'Last Name',
  `Relationship` varchar(20) NOT NULL DEFAULT 'Relationship',
  `Phone` varchar(20) NOT NULL DEFAULT '000-000-0000',
  `Email` varchar(45) NOT NULL DEFAULT 'Email',
  KEY `EID_idx` (`EID`),
  CONSTRAINT `EID` FOREIGN KEY (`EID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMERGENCY`
--

LOCK TABLES `EMERGENCY` WRITE;
/*!40000 ALTER TABLE `EMERGENCY` DISABLE KEYS */;
/*!40000 ALTER TABLE `EMERGENCY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMPLOYEE`
--

DROP TABLE IF EXISTS `EMPLOYEE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EMPLOYEE` (
  `ID` char(8) NOT NULL DEFAULT '00000000',
  `FName` varchar(15) NOT NULL DEFAULT 'First Name',
  `Minit` char(1) DEFAULT NULL,
  `LName` varchar(15) NOT NULL DEFAULT 'Last Name',
  `MgrID` char(8) NOT NULL DEFAULT '00000000',
  `DID` varchar(5) DEFAULT '00000',
  `Office` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`),
  KEY `MgrID` (`MgrID`),
  KEY `DID_idx` (`DID`),
  CONSTRAINT `DID` FOREIGN KEY (`DID`) REFERENCES `department` (`DID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `MgrID` FOREIGN KEY (`ID`) REFERENCES `employee` (`MgrID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMPLOYEE`
--

LOCK TABLES `EMPLOYEE` WRITE;
/*!40000 ALTER TABLE `EMPLOYEE` DISABLE KEYS */;
/*!40000 ALTER TABLE `EMPLOYEE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT`
--

DROP TABLE IF EXISTS `PROJECT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PROJECT` (
  `PNum` int(11) NOT NULL DEFAULT '0',
  `PName` varchar(45) NOT NULL DEFAULT 'Project Name',
  `PDID` varchar(5) NOT NULL DEFAULT '00000',
  `PMgrID` char(8) NOT NULL DEFAULT '00000000',
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  PRIMARY KEY (`PNum`),
  UNIQUE KEY `PNum_UNIQUE` (`PNum`),
  KEY `DID_idx` (`PDID`),
  KEY `MgrID_idx` (`PMgrID`),
  CONSTRAINT `PDID` FOREIGN KEY (`PDID`) REFERENCES `department` (`DID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PMgrID` FOREIGN KEY (`PMgrID`) REFERENCES `employee` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT`
--

LOCK TABLES `PROJECT` WRITE;
/*!40000 ALTER TABLE `PROJECT` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROJECT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TASK`
--

DROP TABLE IF EXISTS `TASK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TASK` (
  `TNum` int(11) NOT NULL DEFAULT '0',
  `PNum` int(11) NOT NULL DEFAULT '0',
  `TEID` char(8) NOT NULL DEFAULT '00000000',
  `Content` varchar(200) DEFAULT NULL,
  `Hour` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`TNum`),
  KEY `PNum_idx` (`PNum`),
  KEY `EID_idx` (`TEID`),
  CONSTRAINT `PNum` FOREIGN KEY (`PNum`) REFERENCES `project` (`PNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `TEID` FOREIGN KEY (`TEID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TASK`
--

LOCK TABLES `TASK` WRITE;
/*!40000 ALTER TABLE `TASK` DISABLE KEYS */;
/*!40000 ALTER TABLE `TASK` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-06 20:20:12
