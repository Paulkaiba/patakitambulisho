-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 01:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patakitambulisho`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmapplications`
--

CREATE TABLE `tbladmapplications` (
  `ID` int(10) NOT NULL,
  `UserId` char(10) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `citizenpic` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `fathername` varchar(200) NOT NULL,
  `mothername` varchar(250) NOT NULL,
  `maritalstatus` varchar(250) NOT NULL,
  `partnername` varchar(250) NOT NULL,
  `partnerid` int(120) NOT NULL,
  `districtofbirth` varchar(250) NOT NULL,
  `tribe` varchar(250) NOT NULL,
  `clan` varchar(250) NOT NULL,
  `family` varchar(250) NOT NULL,
  `homedistrict` varchar(250) NOT NULL,
  `constituency` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `sublocation` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `birthcertificatepic` varchar(250) NOT NULL,
  `religiouscard` varchar(250) NOT NULL,
  `passportorregistrationcertificate` varchar(250) NOT NULL,
  `schoolleavingcertificate` varchar(250) NOT NULL,
  `Declaration` varchar(120) NOT NULL,
  `Signature` varchar(120) NOT NULL,
  `CourseApplieddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` varchar(255) DEFAULT NULL,
  `FeeAmount` decimal(10,0) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AdminStatus` varchar(20) DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmapplications`
--

INSERT INTO `tbladmapplications` (`ID`, `UserId`, `fullname`, `citizenpic`, `dob`, `Gender`, `fathername`, `mothername`, `maritalstatus`, `partnername`, `partnerid`, `districtofbirth`, `tribe`, `clan`, `family`, `homedistrict`, `constituency`, `location`, `sublocation`, `occupation`, `birthcertificatepic`, `religiouscard`, `passportorregistrationcertificate`, `schoolleavingcertificate`, `Declaration`, `Signature`, `CourseApplieddate`, `AdminRemark`, `FeeAmount`, `AppointmentDate`, `AdminStatus`, `AdminRemarkDate`) VALUES
(22, '12', 'Mary Kipto', 'IMG_2217.JPG', '2000-11-24', 'Female', 'Peter Rotich', 'Leah Rotich', 'Single', '', 0, 'Dagoreti ', 'Kale', 'Kipsigis', 'Rotich', 'Kajiado North', 'Ngong', 'Lekurruki', 'Upper matasia', 'student', 'birthcertificate.jpeg', 'baptism card.jpg', 'pasii.jpg', 'schlcert.png', '', '', '2024-04-01 07:23:30', 'keep time on that day ', 50, '2024-04-03', '1', '2024-04-01 07:34:47'),
(23, '14', 'Mohamed Ali', 'download.jpeg', '2004-07-03', 'Male', 'Abdul Ali ', 'Marium Abdi', 'Married', 'Ayesha Hassan', 35432468, 'Dagoreti ', 'Arabs ', 'Banu Yam', 'Ali', 'Dagoretti ', 'Dagoreti', 'kilimani', 'Hurligam', 'N/A', 'download (1).jpeg', 'download (2).jpeg', 'download (3).jpeg', 'download (4).jpeg', '', '', '2024-04-01 09:46:05', 'your pictures are invalid', 0, '0000-00-00', '2', '2024-04-01 10:38:54'),
(24, '8', 'Paul Kanyari Kaiba', 'IMG_2226.JPG', '2004-05-12', 'Male', 'Clement Kaiba', 'Esther Rotich', 'Single', '', 0, 'Dagoreti ', 'kikuyu', 'heghog', 'Kaiba\'s', 'Kajiado North', 'Ngong', 'Lekurruki', 'Upper matasia', 'N/A', 'California birth_certificate.jpg', 'reli card.jpeg', 'passport.jpeg', 'primary cert.jpeg', '', '', '2024-04-01 19:32:34', 'keep time ', 50, '2024-04-05', '1', '2024-04-01 19:34:27'),
(25, '15', 'jemima moye', 'WhatsApp Image 2024-01-14 at 18.36.14_ffe704f0.jpg', '2004-12-03', 'Female', 'Clement Kaiba', 'Marium Abdi', 'Single', '', 0, 'Eldoret', 'Kale', 'Banu Yam', 'Kaiba\'s', 'Dagoretti ', 'Ngong', 'Upperhill', 'Upper matasia', 'student', 'WhatsApp Image 2024-01-14 at 18.47.04_1f28421a.jpg', 'WhatsApp Image 2024-01-14 at 18.47.52_73b3f951.jpg', 'WhatsApp Image 2024-01-14 at 20.12.54_95fc45a3.jpg', 'WhatsApp Image 2024-01-14 at 18.53.37_8988513c.jpg', '', '', '2024-04-02 12:11:22', 'keep time ', 50, '2024-04-03', '1', '2024-04-02 12:14:56'),
(26, '16', 'Paul Karanjaa', 'download (2).jpeg', '0000-00-00', 'Male', 'Clement Kaiba', 'Esther Rotich', 'Married', 'Tyra Camilla Hassan', 4233557, 'Dagoreti ', 'Kale', 'Kipsigis', 'Kaiba', 'Dagoretti ', 'KIlimani', 'kilimani', 'Hurligam', 'N/A', 'pasii.jpg', 'schlcert.png', 'California birth_certificate.jpg', 'ab2.jpg', '', '', '2024-04-02 19:25:15', 'Keep time on that day ', 50, '2024-04-03', '1', '2024-04-02 19:28:19'),
(27, '9', 'Nyaga Gacheru', 'p4.jpeg', '2004-07-03', 'Male', 'Abdul Ali ', 'Marium Abdi', 'Single', '', 0, 'Dagoreti ', 'Kale', 'cheetah', 'Kipto\'s', 'Dagoretti ', 'Ngong', 'kilimani', 'Upper matasia', 'student', 'birthcert1.jpeg', 'baptism card.jpeg', 'passport.jpeg', 'sc1.jpeg', '', '', '2024-04-03 06:29:14', 'images are invalid ', 0, '0000-00-00', '2', '2024-04-03 07:22:55'),
(28, '18', 'Benson Olang ', 'p3.jpeg', '2004-07-03', 'Male', 'Peter Rotich', 'Marium Abdi', 'Married', 'Tyra Camilla Hassan', 42177181, 'Dagoreti ', 'Kale', 'heghog', 'Rotich', 'Dagoretti Sourth', 'Nairobi CBD', 'Hardy', 'Upperhill', 'N/A', 'birthcert3.jpeg', 'baptism card2.jpeg', 'pass3.jpeg', 'court3.jpeg', '', '', '2024-04-03 07:19:52', 'Please come to TNRB outlet at Dagoretti. Keep time ', 50, '2024-04-04', '1', '2024-04-03 07:22:11'),
(29, '19', 'Gladys Omolo', 'download (1).jpeg', '2005-09-26', 'Female', 'Brian Kipto', 'Sandra Chepkoech', 'Single', '', 0, 'Dagoreti ', 'kikuyu', 'Kipsigis', 'Ali', 'Kajiado Sorth', 'Nairobi CBD', 'kilimani', 'Upperhill', 'student', 'birthcert2.jpeg', 'court2.png', 'batism c3.jpg', 'sc2.jpeg', '', '', '2024-06-06 13:25:27', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'kitambulisho', 'Admin', 876545789, 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '2024-03-01 16:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `PhoneNumber` bigint(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `PhoneNumber`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', NULL, 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Sarita Pandey', 'sar@gmail.com', NULL, 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1),
(3, 'Test', 'test@gmail.com', NULL, 'Want to know price of forest cake', '2021-07-16 12:51:06', 1),
(4, 'Anuj', 'ak330@gmail.com', NULL, 'This is for testing.', '2021-07-18 14:35:50', 1),
(5, 'Nikhil', 'nk@gmail.com', 7798799999, 'hello', '2022-02-28 04:26:49', 1),
(6, 'Anuj', 'ak@gmail.com', 1234567890, 'This is for testing', '2022-03-04 01:29:21', 1),
(7, 'Test', 'test@gmail.com', 12365478910, 'This iis for testing', '2022-03-04 01:45:01', 1),
(8, 'Subhan Raj', 'shubhanraj2002@gmail.com', 9450430095, 'a', '2023-05-19 19:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfees`
--

CREATE TABLE `tblfees` (
  `ID` int(5) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `PaymentAmount` decimal(10,0) DEFAULT NULL,
  `ModeofPayments` varchar(200) DEFAULT NULL,
  `TransactionNumber` varchar(250) DEFAULT NULL,
  `DateofTransaction` date DEFAULT NULL,
  `SubmissionDate` timestamp NULL DEFAULT current_timestamp(),
  `approval` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfees`
--

INSERT INTO `tblfees` (`ID`, `UserID`, `PaymentAmount`, `ModeofPayments`, `TransactionNumber`, `DateofTransaction`, `SubmissionDate`, `approval`) VALUES
(16, 12, 50, 'Credit Card', 'SCS8DIUJ1PK6URL8', '2024-04-04', '2024-04-01 09:21:46', 'Approved'),
(17, 8, 50, 'Mpesa', 'SCS8DIUJ1M', '2024-04-12', '2024-04-01 20:19:45', 'Approved'),
(18, 15, 50, 'Mpesa', 'SCS8UJ1PK6URL8', '2024-04-04', '2024-04-02 12:16:48', 'Approved'),
(19, 16, 50, 'Paypal', 'SQB8PK6URL8', '2024-04-03', '2024-04-02 19:32:39', 'Approved'),
(20, 18, 50, 'Mpesa', 'SCS8DI4KL1M', '2024-04-04', '2024-04-03 07:25:15', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeesre`
--

CREATE TABLE `tblfeesre` (
  `ID` int(5) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `PaymentAmount` decimal(10,0) DEFAULT NULL,
  `ModeofPayments` varchar(200) DEFAULT NULL,
  `TransactionNumber` varchar(250) DEFAULT NULL,
  `DateofTransaction` date DEFAULT NULL,
  `SubmissionDate` timestamp NULL DEFAULT current_timestamp(),
  `approval` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfeesre`
--

INSERT INTO `tblfeesre` (`ID`, `UserID`, `PaymentAmount`, `ModeofPayments`, `TransactionNumber`, `DateofTransaction`, `SubmissionDate`, `approval`) VALUES
(10, 8, 100, 'Credit Card', 'SCS8UJ1PK6URL8', '2024-04-11', '2024-04-02 07:05:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeesst`
--

CREATE TABLE `tblfeesst` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `PaymentAmount` decimal(10,0) DEFAULT NULL,
  `ModeofPayments` varchar(200) DEFAULT NULL,
  `TransactionNumber` varchar(250) DEFAULT NULL,
  `DateofTransaction` date DEFAULT NULL,
  `SubmissionDate` timestamp NULL DEFAULT current_timestamp(),
  `approval` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfeesst`
--

INSERT INTO `tblfeesst` (`ID`, `UserID`, `PaymentAmount`, `ModeofPayments`, `TransactionNumber`, `DateofTransaction`, `SubmissionDate`, `approval`) VALUES
(2, 12, 100, 'Debit Card', 'SQB8PK6URL8', '2024-04-05', '2024-04-02 07:03:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblfraud`
--

CREATE TABLE `tblfraud` (
  `ID` int(11) NOT NULL,
  `UserId` int(25) NOT NULL,
  `idnumber` int(250) DEFAULT NULL,
  `idfullname` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Attempts` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblidnumbers`
--

CREATE TABLE `tblidnumbers` (
  `ID` int(10) NOT NULL,
  `Userid` int(50) NOT NULL,
  `idnumber` int(250) NOT NULL,
  `idfullname` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblidnumbers`
--

INSERT INTO `tblidnumbers` (`ID`, `Userid`, `idnumber`, `idfullname`) VALUES
(1, 0, 42177181, 'PAUL KANYARI KAIBA'),
(4, 0, 9806008, 'ESTHER JEPKEMOI ROTICH'),
(5, 0, 16729468, 'CLEMENT KAIBA KANYARI'),
(6, 0, 9810034, 'ELIZABETH KEEN REDINTON');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Decription` varchar(350) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `Title`, `Decription`, `CreationDate`) VALUES
(7, 'TNRB Closure Due to Easter festive Season ', 'Attention all citizens and staff: Due to the Easter festive season, the TNRB will remain closed from Thursday 29th March to Tuesday 2nd of April. All appointments for New ID applications will be pushed to the next week if affected with the closer of TNRB.  Please stay safe and have a happy Easter', '2024-03-15 20:01:38'),
(9, 'NEW IDS ', 'If you know you applied for a New ID 2 weeks before Easter and you were meant to take it during the week of Easter. You have 2 weeks to pick it up from TNRB outlet near you. After two weeks you will start paying a fee of 50 bob per day.', '2024-04-08 19:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', 'Our Pata Kitambulisho Management System is a comprehensive and efficient solution designed to streamline and automate the registration process. Our platform empowers citizens to seamlessly manage and organise their applications, go for biometrics, and be told when to collect their ID. With user-friendly interfaces and robust features, our system simplifies the complex tasks associated with applications, ensuring a smooth and transparent experience for both citizens and the admin. By leveraging cutting-edge technology, we aim to revolutionise the registration process, enabling citizens to have an easy time while registering for a national identity card ', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'NSSF Bldg, 8th Flr-Block B, Nairobi, Kenya', 'pataKMS@gmail.com', 795285894, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblreplaceid`
--

CREATE TABLE `tblreplaceid` (
  `UserId` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `userpic` varchar(250) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `maritalstatus` varchar(20) NOT NULL,
  `partnername` varchar(255) NOT NULL,
  `partnerid` varchar(255) DEFAULT NULL,
  `districtofbirth` varchar(255) NOT NULL,
  `tribe` varchar(255) NOT NULL,
  `clan` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `homedistrict` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `subLocation` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `ReasonForChange` varchar(120) NOT NULL,
  `UploadCourtDocument` varchar(250) DEFAULT NULL,
  `Declaration` varchar(120) NOT NULL,
  `Signature` varchar(120) NOT NULL,
  `CourseApplieddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` varchar(255) DEFAULT NULL,
  `FeeAmount` decimal(10,0) DEFAULT NULL,
  `AdminStatus` varchar(20) DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblreplaceid`
--

INSERT INTO `tblreplaceid` (`UserId`, `fullname`, `userpic`, `dob`, `gender`, `fathername`, `mothername`, `maritalstatus`, `partnername`, `partnerid`, `districtofbirth`, `tribe`, `clan`, `family`, `homedistrict`, `constituency`, `location`, `subLocation`, `Occupation`, `ReasonForChange`, `UploadCourtDocument`, `Declaration`, `Signature`, `CourseApplieddate`, `AdminRemark`, `FeeAmount`, `AdminStatus`, `AdminRemarkDate`) VALUES
(8, 'Paul Kanyari Kaiba', 'WhatsApp Image 2024-01-14 at 18.41.45_1fc048c1.jpg', '2004-05-12', 'Male', 'Clement Kaiba', 'Esther Rotich', 'Single', '', '0', 'Dagoreti ', 'kikuyu', 'heghog', 'Kaiba\'s', 'Kajiado North', 'Ngong', 'Lekurruki', 'Upper matasia', 'N/A', 'just needed a new picture ', 'Mehndi-Design-00.jpeg', 'Paul Kaiba', 'PK', '2024-04-01 21:15:06', 'Okay then ', 100, '1', '2024-04-02 05:24:42'),
(9, 'Nyaga Gacheru', 'p4.jpeg', '2004-07-03', 'Male', 'Abdul Ali ', 'Marium Abdi', 'Single', '', '0', 'Dagoreti ', 'Kale', 'cheetah', 'Kipto\'s', 'Dagoretti ', 'Ngong', 'kilimani', 'Upper matasia', 'student', 'Changing of name', 'court1.png', 'Nyaga Gacheru', 'NG', '2024-04-03 06:33:52', NULL, NULL, NULL, NULL),
(16, 'Paul Karanjaa', 'download (3).jpeg', '0000-00-00', 'Male', 'Clement Kaiba', 'Esther Rotich', 'Married', 'Tyra Camilla Hassan', '4233557', 'Dagoreti ', 'Kale', 'Kipsigis', 'Kaiba', 'Dagoretti ', 'KIlimani', 'kilimani', 'Hurligam', 'N/A', 'Picture faded', 'download (4).jpeg', 'Paul', 'JO', '2024-04-02 19:44:57', 'Make payment ', 100, '1', '2024-04-02 19:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `ID` int(11) NOT NULL,
  `CourseName` varchar(90) DEFAULT NULL,
  `CourseDescription` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`ID`, `CourseName`, `CourseDescription`, `CreationDate`) VALUES
(4, 'Replaced ID', 'Replaced IDs are one of the services we offer. This service may take place when one has a decolorized ID, broken ID or when one wants to change a certain detail on their ID. for this services on must fill the information on the application form, make the required payment and bring the current ID they have to the bureau. The service will take approximately 3 weeks after all the information has been collected. ', '2023-05-19 19:28:55'),
(7, 'New ID', 'The service of the new ID is where one who has no ID they apply for one. For one to apply for an ID they need to provided the following information: parents/guardian ID number, birth certificate number,  fill information on the application form, go to take their finger print and passport photo and make the necessary payment needed. After the confirmation o the information provided they would get their ID after 3 weeks  ', '2024-03-10 19:28:57'),
(8, 'Stolen ID ', 'Stolen ID replacement will be offered to citizens whose original IDs have been stolen. For the replacement to take place one will need to get an abstract from the police. the abstract will need to be taken to the bureau for verification. Once it has been verified and the required payment has been made, the ID will be made by 3 weeks. ', '2024-03-10 20:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblstolenid`
--

CREATE TABLE `tblstolenid` (
  `UserId` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `userpic` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `maritalstatus` varchar(20) NOT NULL,
  `partnername` varchar(255) NOT NULL,
  `partnerid` varchar(255) DEFAULT NULL,
  `districtofbirth` varchar(255) NOT NULL,
  `tribe` varchar(255) NOT NULL,
  `clan` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `homedistrict` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `subLocation` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `UploadAbstract` varchar(255) DEFAULT NULL,
  `Declaration` varchar(120) NOT NULL,
  `Signature` varchar(120) NOT NULL,
  `CourseApplieddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` varchar(255) DEFAULT NULL,
  `FeeAmount` decimal(10,0) DEFAULT NULL,
  `AdminStatus` varchar(20) DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstolenid`
--

INSERT INTO `tblstolenid` (`UserId`, `fullname`, `userpic`, `dob`, `gender`, `fathername`, `mothername`, `maritalstatus`, `partnername`, `partnerid`, `districtofbirth`, `tribe`, `clan`, `family`, `homedistrict`, `constituency`, `location`, `subLocation`, `Occupation`, `UploadAbstract`, `Declaration`, `Signature`, `CourseApplieddate`, `AdminRemark`, `FeeAmount`, `AdminStatus`, `AdminRemarkDate`) VALUES
(12, 'Mary Kipto', 'WhatsApp Image 2024-01-14 at 20.11.37_61ccbcef.jpg', '2000-11-24', 'Female', 'Peter Rotich', 'Leah Rotich', 'Single', '', '0', 'Dagoreti ', 'Kale', 'Kipsigis', 'Rotich', 'Kajiado North', 'Ngong', 'Lekurruki', 'Upper matasia', 'student', 'ab2.jpg', 'Mary Kipto', 'MK', '2024-04-02 06:47:36', 'make payment ', 100, '1', '2024-04-02 06:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `ID` int(5) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DateofSub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`ID`, `Email`, `DateofSub`) VALUES
(1, 'ani@gmail.com', '2021-07-16 07:32:33'),
(2, 'rahul@gmail.com', '2021-07-16 07:32:33'),
(6, 'j@gmail.com', '2021-08-16 15:00:59'),
(8, 'faraha@gmail.com', '2022-02-28 11:08:19'),
(10, 'paulkaiba2@gmail.com', '2024-02-29 19:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `PostingDate`) VALUES
(8, 'Paul', 'Kaiba', 735432086, 'paulkaiba2@gmail.com', '2e69f107d4be5f743461cb66d55d5e6e', '2024-03-11 19:18:51'),
(9, 'Nyaga', 'Gacheru', 741846804, 'ngacheru@gmail.com', '87746528a7695a1f42804ad7b2709b64', '2024-03-26 09:57:27'),
(10, 'james', 'omolo', 722384400, 'jomolo@gmail.com', 'f54c64a7f4fa3e547d3677c39dbbf333', '2024-03-28 05:50:10'),
(11, 'Gladys', 'Njoki', 789654321, 'gnjoki@gmail.com', 'fee26f33a3bb58528b917aad3564b6b1', '2024-03-28 10:21:12'),
(12, 'Mary', 'kipto', 788995566, 'MaryK@gmail.com', '3fcd1a9d953a3ce7f113de1984540d54', '2024-03-30 12:52:15'),
(13, 'Esther', 'Jepkemoi', 733737048, 'estjep@gmail.com', 'be9998e7fe844cb1e758eb4129712c77', '2024-03-31 16:57:28'),
(14, 'Mohamed', 'Ali', 707800990, 'moha@gmail.com', 'd7779a7871b95cb6b6eeffbc99c0a0f6', '2024-04-01 08:11:38'),
(15, 'Jemima', 'Moye', 788665544, 'Jmoye@gmail.com', '2c1ef3ba53266c4514b25e0c6267dc98', '2024-04-02 12:07:18'),
(16, 'Paul', 'Njoki', 767384400, 'kpk@gmail.com', 'ed8f1f0bfd67a24e6fe1402f073afa2a', '2024-04-02 19:00:17'),
(18, 'Benson', 'Olang', 734542311, 'bolang@gmail.com', '13cc0495947c66aff5d10f2e69714c1f', '2024-04-03 07:15:30'),
(19, 'Gladys', 'omolo', 710250029, 'GO@gmail.com', 'b56f003159be20872772ec32d7086654', '2024-06-06 13:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfees`
--
ALTER TABLE `tblfees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfeesre`
--
ALTER TABLE `tblfeesre`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfeesst`
--
ALTER TABLE `tblfeesst`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfraud`
--
ALTER TABLE `tblfraud`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblidnumbers`
--
ALTER TABLE `tblidnumbers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreplaceid`
--
ALTER TABLE `tblreplaceid`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `tblstolenid`
--
ALTER TABLE `tblstolenid`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblfees`
--
ALTER TABLE `tblfees`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblfeesre`
--
ALTER TABLE `tblfeesre`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblfeesst`
--
ALTER TABLE `tblfeesst`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfraud`
--
ALTER TABLE `tblfraud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblidnumbers`
--
ALTER TABLE `tblidnumbers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;