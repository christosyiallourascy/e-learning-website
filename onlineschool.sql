CREATE DATABASE  IF NOT EXISTS `onlineschool` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `onlineschool`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: onlineschool
-- ------------------------------------------------------
-- Server version	5.5.21

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
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudent` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `fathername` varchar(45) DEFAULT NULL,
  `idnumber` varchar(45) DEFAULT NULL,
  `birthdate` varchar(45) DEFAULT NULL,
  `entereddata` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `areacode` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `mobilephone` varchar(45) DEFAULT NULL,
  `homephone` varchar(45) DEFAULT NULL,
  `fatherphone` varchar(45) DEFAULT NULL,
  `motherphone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudent`
--

LOCK TABLES `tblstudent` WRITE;
/*!40000 ALTER TABLE `tblstudent` DISABLE KEYS */;
INSERT INTO `tblstudent` VALUES (1,'Andreas','Pavlou','Kostas','856655','03/02/1985','01/10/2011','Cypriot','Cyprus','Limassol','Kolonakiou 65 A','5523','26','andreas1','123456','99663322','25147896','99653214','99854521');
/*!40000 ALTER TABLE `tblstudent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblevent`
--

DROP TABLE IF EXISTS `tblevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblevent` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(45) DEFAULT NULL,
  `eventdescription` varchar(255) DEFAULT NULL,
  `eventdate` varchar(45) DEFAULT NULL,
  `eventtime` varchar(45) DEFAULT NULL,
  `eventplace` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblevent`
--

LOCK TABLES `tblevent` WRITE;
/*!40000 ALTER TABLE `tblevent` DISABLE KEYS */;
INSERT INTO `tblevent` VALUES (1,'Event One','Event Description 1','02/03/2012','17:00','Main Building'),(2,'Event Two','Event Description 2','10/05/2012','14:00','Main Building Room C'),(3,'Event Three','Event Description 3','15/05/2012','19:00','Limassol Campus Roof 2 Room 5'),(4,'Event Four','Event Description 4','16/06/2012','15:30','Main Building Room 6'),(5,'Event Five','Event Description Five','15/06/2012','19:00','Main Bulding Room 16'),(6,' ','Event Six description','23/06/2012','15:00','Conference Room 2');
/*!40000 ALTER TABLE `tblevent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblforumpost`
--

DROP TABLE IF EXISTS `tblforumpost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblforumpost` (
  `forumpostid` int(11) NOT NULL AUTO_INCREMENT,
  `postname` varchar(45) DEFAULT NULL,
  `postdetail` varchar(255) DEFAULT NULL,
  `datetimeadded` varchar(45) DEFAULT NULL,
  `subjectsemesterforumid` int(11) DEFAULT NULL,
  PRIMARY KEY (`forumpostid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblforumpost`
--

LOCK TABLES `tblforumpost` WRITE;
/*!40000 ALTER TABLE `tblforumpost` DISABLE KEYS */;
INSERT INTO `tblforumpost` VALUES (1,'test','insert posrt to current forum','',1),(2,'test 2','insert test 2 ','',1),(3,'test 3','perigrafi 3','',1);
/*!40000 ALTER TABLE `tblforumpost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbleventgrade`
--

DROP TABLE IF EXISTS `tbleventgrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbleventgrade` (
  `eventgradeid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectsemestereventid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`eventgradeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbleventgrade`
--

LOCK TABLES `tbleventgrade` WRITE;
/*!40000 ALTER TABLE `tbleventgrade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbleventgrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschool`
--

DROP TABLE IF EXISTS `tblschool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschool` (
  `schoolid` int(11) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`schoolid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschool`
--

LOCK TABLES `tblschool` WRITE;
/*!40000 ALTER TABLE `tblschool` DISABLE KEYS */;
INSERT INTO `tblschool` VALUES (1,'Egnineering and Applied Science','Perigrafi'),(2,'Economic Science and Administration','Perigrafi'),(3,'Education','Perigrafi'),(4,'Architecture and Applied Sience','Perigrafi'),(5,'Humanities and Social Sience','Perigrafi'),(6,'Health Science','Perigrafi'),(7,'Sports Managment','Perigrafi gia auto to school'),(8,'Mathimatical Science','Perigrafi Mathimatical'),(9,'Space Science','perigrafi');
/*!40000 ALTER TABLE `tblschool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcoursecategories`
--

DROP TABLE IF EXISTS `tblcoursecategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcoursecategories` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `schoolid` int(11) DEFAULT NULL,
  `coursename` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcoursecategories`
--

LOCK TABLES `tblcoursecategories` WRITE;
/*!40000 ALTER TABLE `tblcoursecategories` DISABLE KEYS */;
INSERT INTO `tblcoursecategories` VALUES (1,4,'Applied Arts','Perigrafi'),(2,4,'Architecture','Perigrafi'),(3,2,'Business Administration','Perigrafi'),(4,1,'Civil Engineering','Perigrafi'),(5,1,'Computer Science & Engineering','Perigrafi'),(6,1,'Electrical Engineering','Perifgrafi'),(7,5,'Lournalism','Perigrafi'),(8,2,'Meritime Studies','Perigrafi'),(9,6,'Nursing','Perigrafi'),(10,5,'Social Work','Perigrafi'),(11,3,'Pre Primary Education','Perigrafi katigorias');
/*!40000 ALTER TABLE `tblcoursecategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjectsemesterevent`
--

DROP TABLE IF EXISTS `tblsubjectsemesterevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjectsemesterevent` (
  `subjectsemestereventid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectsemester` int(11) DEFAULT NULL,
  `eventtitle` varchar(45) DEFAULT NULL,
  `eventdescription` varchar(255) DEFAULT NULL,
  `dateadded` varchar(45) DEFAULT NULL,
  `expiredate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectsemestereventid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjectsemesterevent`
--

LOCK TABLES `tblsubjectsemesterevent` WRITE;
/*!40000 ALTER TABLE `tblsubjectsemesterevent` DISABLE KEYS */;
INSERT INTO `tblsubjectsemesterevent` VALUES (1,1,'Assignment 1','Perigrafi ergasias','25/02/2012','25/03/2012');
/*!40000 ALTER TABLE `tblsubjectsemesterevent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudentsubjectsemester`
--

DROP TABLE IF EXISTS `tblstudentsubjectsemester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstudentsubjectsemester` (
  `studentid` int(11) NOT NULL,
  `subjectsemesterid` int(11) NOT NULL,
  `grade1` varchar(45) DEFAULT NULL,
  `grade2` varchar(45) DEFAULT NULL,
  `grade3` varchar(45) DEFAULT NULL,
  `enrollment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`studentid`,`subjectsemesterid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudentsubjectsemester`
--

LOCK TABLES `tblstudentsubjectsemester` WRITE;
/*!40000 ALTER TABLE `tblstudentsubjectsemester` DISABLE KEYS */;
INSERT INTO `tblstudentsubjectsemester` VALUES (1,1,'null','null','null','yes'),(1,3,'60','55','50','yes'),(1,4,'null','null','null','yes');
/*!40000 ALTER TABLE `tblstudentsubjectsemester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjectsemesterforum`
--

DROP TABLE IF EXISTS `tblsubjectsemesterforum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjectsemesterforum` (
  `subjectsemesterforum` int(11) NOT NULL AUTO_INCREMENT,
  `subjectsemesterid` int(11) DEFAULT NULL,
  `forumname` varchar(45) DEFAULT NULL,
  `forumdescription` varchar(45) DEFAULT NULL,
  `open` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectsemesterforum`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjectsemesterforum`
--

LOCK TABLES `tblsubjectsemesterforum` WRITE;
/*!40000 ALTER TABLE `tblsubjectsemesterforum` DISABLE KEYS */;
INSERT INTO `tblsubjectsemesterforum` VALUES (1,1,'ACSC183 Spring 2011 - 2012 ','Post from students','yes');
/*!40000 ALTER TABLE `tblsubjectsemesterforum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubjectsemester`
--

DROP TABLE IF EXISTS `tblsubjectsemester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubjectsemester` (
  `subjectsemesterid` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `instructor` int(11) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `day1` varchar(45) DEFAULT NULL,
  `time1` varchar(45) DEFAULT NULL,
  `enrollkey` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectsemesterid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubjectsemester`
--

LOCK TABLES `tblsubjectsemester` WRITE;
/*!40000 ALTER TABLE `tblsubjectsemester` DISABLE KEYS */;
INSERT INTO `tblsubjectsemester` VALUES (1,'2011 - 2012','Spring',1,1,'Monady','09:30 - 10:30','Friday','09:30 - 11:30','ACSC183'),(2,'2011 - 2012','Fall',2,1,'Friday','12:00 - 2:00','','','ACSC388'),(3,'2011 - 2012','Spring',2,1,'Monday','12:00 - 2:00','','','ACSC388a'),(4,'2011 - 2012','Spring',3,1,'Monday','15:00 - 18:00','','','ACOE254');
/*!40000 ALTER TABLE `tblsubjectsemester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubject`
--

DROP TABLE IF EXISTS `tblsubject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubject` (
  `subjectid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectname` varchar(45) DEFAULT NULL,
  `subjectcode` varchar(45) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubject`
--

LOCK TABLES `tblsubject` WRITE;
/*!40000 ALTER TABLE `tblsubject` DISABLE KEYS */;
INSERT INTO `tblsubject` VALUES (1,'Programming Prenciples','ACSC183',5,'Perigrafi subject'),(2,'Data Structure','ACSC388',5,'perigrafi acsc388 data structure'),(3,'Digital Logic For Computer','ACOE254',5,'perigrafi gia to digital klp');
/*!40000 ALTER TABLE `tblsubject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstructor`
--

DROP TABLE IF EXISTS `tblinstructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstructor` (
  `instructorid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `fathername` varchar(45) DEFAULT NULL,
  `idnumber` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `birthdate` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `areacode` varchar(45) DEFAULT NULL,
  `mobilephone` varchar(45) DEFAULT NULL,
  `homephone` varchar(45) DEFAULT NULL,
  `degrees` varchar(255) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`instructorid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstructor`
--

LOCK TABLES `tblinstructor` WRITE;
/*!40000 ALTER TABLE `tblinstructor` DISABLE KEYS */;
INSERT INTO `tblinstructor` VALUES (1,'Christos','Andronikou','Andreas','632514','35','01/03/1975','Cypruot','Cyprus','Limassol','Ekali 5 A','3311','99665588','25774411','BSc, MSc, PhD in Electrical','5000','christos1','123456');
/*!40000 ALTER TABLE `tblinstructor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-21 10:52:18
