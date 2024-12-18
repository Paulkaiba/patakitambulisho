

-- phpMyAdmin SQL Dump -- version 5.2.0 -- https://www.phpmyadmin.net/
-- Host: 127.0.0.1 -- Generation Time: May 20, 2023 at 06:08 AM -- Server version: 10.4.24-MariaDB -- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; START TRANSACTION; SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT /; /!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS /; /!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION /; /!40101 SET NAMES utf8mb4 */;

-- -- Database: patakitambulisho
-- -- Table structure for table tbladmapplications
CREATE TABLE tbladmapplications ( birthcertificate varchar(120) COLLATE latin1_swedish_ci NOT NULL, fullname varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, citizenpic varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, dob date DEFAULT NULL, Gender varchar(200) COLLATE latin1_swedish_ci DEFAULT NULL, fathername varchar(200) COLLATE latin1_swedish_ci DEFAULT NULL, mothername varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, maritalstatus varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, partnername varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, partnerid int(120) DEFAULT NULL, districtofbirth varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, tribe varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, clan varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, family varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, homedistrict varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, constituency varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, location varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, sublocation varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, occupation varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, birthcertificatepic varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, religiouscard varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, passportorregistrationcertificate varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, schoolleavingcertificate varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, Declaration varchar(120) COLLATE latin1_swedish_ci DEFAULT NULL, Signature varchar(120) COLLATE latin1_swedish_ci DEFAULT NULL, CourseApplieddate timestamp NOT NULL DEFAULT current_timestamp(), AdminRemark varchar(255) COLLATE latin1_swedish_ci DEFAULT NULL, FeeAmount decimal(10,0) DEFAULT NULL,AdminStatus varchar(20) COLLATE latin1_swedish_ci DEFAULT NULL, AdminRemarkDate timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(), PRIMARY KEY (birthcertificate) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- -- Dumping data for table tbladmapplications
INSERT INTO tbladmapplications INSERT INTO tbladmapplications (birthcertificate, fullname, citizenpic, dob, Gender, fathername, mothername, maritalstatus, partnername, partnerid, districtofbirth, tribe, clan, family, homedistrict, constituency, location, sublocation, occupation, birthcertificatepic, religiouscard, passportorregistrationcertificate, schoolleavingcertificate, Declaration, Signature, CourseApplieddate, AdminRemark, FeeAmount, AdminStatus, AdminRemarkDate, UserPic)  VALUES ('12345678', 'John Doe', 'citizenpic.jpg', '1990-05-15', 'Male', 'Michael Doe', 'Jane Doe', 'Married', 'Alice Doe', 12345678, 'DistrictA', 'Some Tribe', 'Some Clan', 'Some Family', 'Home District', 'Constituency A', 'Location A', 'Sublocation A', 'Teacher', 'birthcertificate.jpg', 'religiouscard.jpg', 'passport.jpg', 'schoolleaving.jpg', 'Yes', 'John Doe Signature', '2024-03-13 12:00:00', 'Approved', 500, 'Approved', '2024-03-14 09:30:00', 'userpic.jpg');

-- -- Table structure for table tbladmin
CREATE TABLE tbladmin ( ID int(11) NOT NULL, AdminName varchar(120) DEFAULT NULL, AdminuserName varchar(20) NOT NULL, MobileNumber int(10) NOT NULL, Email varchar(120) NOT NULL, Password varchar(120) DEFAULT NULL, AdminRegdate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tbladmin
INSERT INTO tbladmin (ID, AdminName, AdminuserName, MobileNumber, Email, Password, AdminRegdate) VALUES (2, 'Zaid Siddiqui', 'Admin', 876545789, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-05-18 04:49:25');

-- -- Table structure for table tblcontact
CREATE TABLE tblcontact ( ID int(10) NOT NULL, Name varchar(200) DEFAULT NULL, Email varchar(200) DEFAULT NULL, PhoneNumber bigint(10) DEFAULT NULL, Message mediumtext DEFAULT NULL, EnquiryDate timestamp NOT NULL DEFAULT current_timestamp(), IsRead int(5) DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -- Dumping data for table tblcontact
INSERT INTO tblcontact (ID, Name, Email, PhoneNumber, Message, EnquiryDate, IsRead) VALUES (1, 'Kiran', 'kran@gmail.com', NULL, 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1), (2, 'Sarita Pandey', 'sar@gmail.com', NULL, 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1), (3, 'Test', 'test@gmail.com', NULL, 'Want to know price of forest cake', '2021-07-16 12:51:06', 1), (4, 'Anuj', 'ak330@gmail.com', NULL, 'This is for testing.', '2021-07-18 14:35:50', 1), (5, 'Nikhil', 'nk@gmail.com', 7798799999, 'hello', '2022-02-28 04:26:49', 1), (6, 'Anuj', 'ak@gmail.com', 1234567890, 'This is for testing', '2022-03-04 01:29:21', 1), (7, 'Test', 'test@gmail.com', 12365478910, 'This iis for testing', '2022-03-04 01:45:01', 1), (8, 'Subhan Raj', 'shubhanraj2002@gmail.com', 9450430095, 'a', '2023-05-19 19:08:27', NULL);

-- -- Table structure for table tblfraud
CREATE TABLE tblfraud ( ID int(11) NOT NULL AUTO_INCREMENT, UserId int(11) DEFAULT NULL, idnumbers varchar(255) COLLATE latin1_swedish_ci DEFAULT NULL, idfullnames varchar(255) COLLATE latin1_swedish_ci DEFAULT NULL, Attempts int(11) DEFAULT 0, Timestamp timestamp NOT NULL DEFAULT current_timestamp(), PRIMARY KEY (ID), KEY UserId (UserId) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

- -- Dumping data for table tblfraud
INSERT INTO tblfraud (ID, UserId, idnumbers, idfullnames, Attempts, Timestamp) VALUES (1, 1, '1234567890', 'John Doe', 0, '2023-05-20 06:08:00');

-- -- Table structure for table tblcourse
CREATE TABLE tblcourse ( ID int(11) NOT NULL, CourseName varchar(90) DEFAULT NULL, CourseDescription mediumtext DEFAULT NULL, CreationDate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tblcourse
INSERT INTO tblcourse (ID, CourseName, CourseDescription, CreationDate) VALUES (1, 'B.Tech', 'The Bachelor of Technology (B.Tech) program is a four-year undergraduate degree that focuses on engineering and technology.This course provides students with a strong foundation in core engineering concepts, practical skills, and problem-solving abilities. B.Tech graduates are equipped with the knowledge and expertise to innovate, design, and develop technological solutions in various fields, ranging from computer science and electrical engineering to mechanical and civil engineering.', '2022-02-28 06:31:24'), (2, 'MBA', 'The Master of Business Administration (MBA) program is a prestigious postgraduate degree that prepares individuals for leadership and management roles in the business world. This course provides a comprehensive understanding of business principles, strategic management, finance, marketing, and entrepreneurship. MBA graduates possess the necessary skills to navigate complex business environments, make informed decisions, and drive organizational growth and success.', '2023-05-19 19:28:19'), (3, 'BCA', 'The Bachelor of Computer Applications (BCA) program is a three-year undergraduate degree that focuses on computer science and its applications. This course provides students with a strong foundation in programming, software development, database management, and computer networking. BCA graduates are well-versed in various programming languages and are equipped to pursue careers in software development, web design, system administration, and other areas of information technology.', '2023-05-19 19:28:40'), (4, 'MCA', 'The Master of Computer Applications (MCA) program is a postgraduate degree that further enhances the knowledge and skills gained during a BCA or related undergraduate program. This course delves deeper into advanced topics such as software engineering, data structures, artificial intelligence, and computer networks. MCA graduates possess advanced programming expertise and are well-prepared for roles in software development, system analysis, database administration, and other specialized areas of computer science.', '2023-05-19 19:28:55'), (5, 'BBA', 'The Bachelor of Business Administration (BBA) program is a three-year undergraduate degree that provides a comprehensive understanding of business and management principles. This course covers various disciplines such as marketing, finance, human resources, operations, and entrepreneurship. BBA graduates develop strong analytical, communication, and leadership skills, preparing them for entry-level managerialpositions in diverse industries or for further studies in the field of business.', '2023-05-19 19:29:09'), (6, 'BA', 'The Bachelor of Arts (BA) program is a three-year undergraduate degree that offers a broad-based education in humanities, social sciences, and liberal arts. This course allows students to explore various subjects such as literature, history, sociology, psychology, economics, and political science. BA graduates develop critical thinking, research, and communication skills, enabling them to pursue careers in fields like journalism, education, public administration, research, or to pursue further studies in their chosen area of specialization.', '2023-05-19 19:29:29');

-- -- Table structure for table tblfees
CREATE TABLE tblfees ( ID int(5) NOT NULL, UserID int(5) DEFAULT NULL, PaymentAmount decimal(10,0) DEFAULT NULL, ModeofPayments varchar(200) DEFAULT NULL, TransactionNumber int(10) DEFAULT NULL, DateofTransaction date DEFAULT NULL, SubmissionDate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tblfees
INSERT INTO tblfees (ID, UserID, PaymentAmount, ModeofPayments, TransactionNumber, DateofTransaction, SubmissionDate) VALUES (1, 3, '60000', 'Credit Card', 789456, '2022-03-02', '2022-03-02 11:20:49'), (3, 4, '250000', 'E-Wallet', 2147483647, '2022-03-03', '2022-03-04 00:19:08'), (4, 5, '45230', 'UPI', 1597452, '2022-03-04', '2022-03-04 01:41:16'), (5, 6, '72000', 'Credit Card', 789456, '2022-03-04', '2022-03-04 04:38:12');

-- -- Table structure for table tblnotice
CREATE TABLE tblnotice ( ID int(11) NOT NULL, Title varchar(250) DEFAULT NULL, Decription varchar(350) DEFAULT NULL, CreationDate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tblnotice
INSERT INTO tblnotice (ID, Title, Decription, CreationDate) VALUES (4, 'Campus Closure Due to Weather Conditions', 'Attention all students and staff: Due to severe weather conditions, the campus will remain closed on 25-December-2025. All classes, events, and activities are canceled for the day. Please stay safe and monitor official communication channels for further updates.', '2023-05-19 19:43:21'), (5, 'Scholarship Application Deadline Extended', 'Important Announcement: The deadline for scholarship applications has been extended to [new deadline date]. This extension provides eligible students with additional time to submit their applications. Don't miss this opportunity to avail yourself of financial assistance. Visit the scholarship office or the university website for more information', '2023-05-19 20:01:04'), (6, 'Career Fair Announcement', 'Calling all students and recent graduates! We are excited to announce our upcoming Career Fair on [date]. This event will provide an excellent opportunity to meet and network with top employers from various industries. Come prepared with your resumes and dress professionally. Don't miss out on this chance to explore potential career opportunities!', '2023-05-19 20:01:38'), (7, 'Campus Closure Due to Weather Conditions', 'Attention all students and staff: Due to severe weather conditions, the campus will remain closed on [date]. All classes, events, and activities are canceled for the day. Please stay safe and monitor official communication channels for further updates.', '2023-05-19 20:01:38');

-- -- Table structure for table tblpage
CREATE TABLE tblpage ( ID int(10) NOT NULL, PageType varchar(200) DEFAULT NULL, PageTitle mediumtext DEFAULT NULL, PageDescription mediumtext DEFAULT NULL, Email varchar(200) DEFAULT NULL, MobileNumber bigint(10) DEFAULT NULL, UpdationDate date DEFAULT NULL, Timing varchar(200) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tblpage
INSERT INTO tblpage (ID, PageType, PageTitle, PageDescription, Email, MobileNumber, UpdationDate, Timing) VALUES (1, 'aboutus', 'About Us', 'Our University Admission Management system is a comprehensive and efficient solution designed to streamline and automate the university admission process. Our platform empowers universities to seamlessly manage and organize student applications, evaluate candidates, and facilitate communication with prospective students. With user-friendly interfaces and robust features, our system simplifies the complex tasks associated with admissions, ensuring a smooth and transparent experience for both applicants and university staff. By leveraging cutting-edge technology, we aim to revolutionize the admissions process, enabling universities to focus on their core mission of providing quality education while attracting the best-suited candidates', NULL, NULL, NULL, ''), (2, 'contactus', 'Contact Us', 'Street No. 6, Sector B, Vrindavan Colony, Lucknow', 'siddiquizaid213@gmail.com', 979528589452,85894 NULL, NULL, '10:30 am to 7:30 pm');

-- -- Table structure for table tblsubscriber
CREATE TABLE tblsubscriber, '1 ( ID0 int(5) NOT NULL, Email varchar(200) DEFAULT NULL:, DateofSub timestamp NOT NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -- Dumping data for table tblsubscriber
INSERT INTO tblsubscriber (ID, Email, DateofSub) VALUES (1, 'ani@gmail.com', '2021-07-16 07:32:33'),3 (2, 'rahul@gmail.com', '2021-07-16 07:32:33'), (6, 'j0@gmail.com', '2021-08-16 15:00:59'), (8 am, 'faraha@gmail.com', '2022-02-28 11:08:19');

-- -- Table structure for table tbltouser
CREATE TABLE tbluser ( ID int(11) NOT NULL, First 7Name varchar(4:30 pm');5)

-- -- Table structure for table tblsub DEFAULT NULL, LastscriberName varchar(4
CREATE TABLE tblsubscriber ( ID int(5) NOT NULL, Email varchar(200) DEFAULT NULL5, DateofSub timestamp) DEFAULT NULL, MobileNumber bigint(10) DEFAULT NULL, Email varchar(120) DEFAULT NULL, Password varchar(60) DEFAULT NULL, Posting NOTDate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table  NULL DEFAULT currenttbluser --_

INSERT INTO tbluser (ID, Firsttimestamp() ) ENGINE=InnoName, LastName,DB DEFAULT CHARSET=utf MobileNumber, Email, Password, `Post8mb4;

-- -- DingDate) VALUES (1, 'umping data for table tblsubscriber`Anuj
INSERT INTO tblsubscriber (ID', 'K, Emailumar', 123456789, Date0, 'anujk@gmail.com', 'f92ofSub) VALUES (1, 'ani@gmail.com', '2021-07-16 07:32:33'), (2, 'rahul@gmail.com', '2021-07-16 07:32:33'), (6, 'j@gmail.com', '2021-08-16 15:00:59'), (8, 'faraha@gmail.com', '2022-02-28 11:08:19');

-- -- Table structure for table tbluser
CREATE TABLE tbluser ( ID int(11) NOT NULL, FirstName varchar(45) DEFAULT NULL, LastName varchar(45) DEFAULT NULL, MobileNumber bigint(10) DEFAULT NULL, Email varchar(120) DEFAULT NULL, Password varchar(60) DEFAULT NULL, PostingDate timestamp NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -- Dumping data for table tblfraud
INSERT INTO tblfraud (ID, UserId, idnumbers, idfullnames, Attempts, Timestamp) VALUES (1, 1, '1234567890', 'John Doe', 0, '2023-05-20 06:08:00');

-- -- Table structure for table tblidnumbers
CREATE TABLE tblidnumbers ( ID int(10) NOT NULL AUTO_INCREMENT, Userid int(50) DEFAULT NULL, idnumber int(250) DEFAULT NULL, idfullname varchar(250) COLLATE latin1_swedish_ci DEFAULT NULL, PRIMARY KEY (ID), KEY Userid (Userid) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- -- Dumping data for table tblidnumbers
INSERT INTO tblidnumbers (ID, Userid, idnumber, idfullname) VALUES (1, 1, 1234567890, 'John Doe');

CREATE TABLE tblreplaceid (
    UserId INT NOT NULL,
    fullname VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    citizenpic VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    dob DATE DEFAULT NULL,
    gender VARCHAR(10) COLLATE latin1_swedish_ci DEFAULT NULL,
    fathername VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    mothername VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    maritalstatus VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
    partnername VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    partnerid VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    districtofbirth VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    tribe VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    clan VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    family VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    homedistrict VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    constituency VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    location VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    subLocation VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    Occupation VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    ReasonForChange VARCHAR(120) COLLATE latin1_swedish_ci DEFAULT NULL,
    UploadCourtDocument VARCHAR(120) COLLATE latin1_swedish_ci DEFAULT NULL,
    Declaration VARCHAR(120) COLLATE latin1_swedish_ci DEFAULT NULL,
    Signature VARCHAR(120) COLLATE latin1_swedish_ci DEFAULT NULL,
    CourseApplieddate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    AdminRemark VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
    FeeAmount DECIMAL(10,0) DEFAULT NULL,
    AdminStatus VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
    AdminRemarkDate TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(),
    PRIMARY KEY (UserId)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- -- Indexes for dumped tables
-- -- Indexes for table tbladmapplications --ALTER TABLE tbladmapplications ADD PRIMARY KEY (birthcertificate);

-- -- Indexes for table tbladmin
ALTER TABLE tbladmin ADD PRIMARY KEY (ID);

-- -- Indexes for table tblcontact
ALTER TABLE tblcontact ADD PRIMARY KEY (ID);

-- -- Indexes for table tblfraud
ALTER TABLE tblfraud ADD PRIMARY KEY (ID), ADD KEY UserId (UserId);

-- -- Indexes for table tblcourse
ALTER TABLE tblcourse ADD PRIMARY KEY (ID), ADD KEY CourseName (CourseName);

-- -- Indexes for table tblfees
ALTER TABLE tblfees ADD PRIMARY KEY (ID);

-- -- Indexes for table tblnotice
ALTER TABLE tblnotice ADD PRIMARY KEY (ID);

-- -- Indexes for table tblpage
ALTER TABLE tblpage ADD PRIMARY KEY (ID);

-- -- Indexes for table tblsubscriber
ALTER TABLE tblsubscriber ADD PRIMARY KEY (ID);

-- -- Indexes for table tbluser
ALTER TABLE tbluser ADD PRIMARY KEY (ID);

-- -- AUTO_INCREMENT for dumped tables
-- -- AUTO_INCREMENT for table tbladmapplications
ALTER TABLE tbladmapplications MODIFY birthcertificate varchar(120) COLLATE latin1_swedish_ci NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- -- AUTO_INCREMENT for table tbladmin
ALTER TABLE tbladmin MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- -- AUTO_INCREMENT for table tblcontact
ALTER TABLE tblcontact MODIFY ID int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- -- AUTO_INCREMENT for table tblfraud
ALTER TABLE tblfraud MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- -- AUTO_INCREMENT for table tblcourse
ALTER TABLE tblcourse MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- -- AUTO_INCREMENT for table tblfees
ALTER TABLE tblfees MODIFY ID int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- -- AUTO_INCREMENT for table tblnotice
ALTER TABLE tblnotice MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- -- AUTO_INCREMENT for table tblpage
ALTER TABLE tblpage MODIFY ID int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- -- AUTO_INCREMENT for table tblsubscriber
ALTER TABLE tblsubscriber MODIFY ID int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- -- AUTO_INCREMENT for table tbluser
ALTER TABLE tbluser MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8; COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT /; /!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS /; /!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;