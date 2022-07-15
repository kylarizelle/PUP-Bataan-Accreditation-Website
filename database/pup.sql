-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 03:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pup`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomplishment`
--

CREATE TABLE `accomplishment` (
  `accom_id` int(2) NOT NULL,
  `year_` int(100) NOT NULL,
  `achievement` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomplishment`
--

INSERT INTO `accomplishment` (`accom_id`, `year_`, `achievement`) VALUES
(1, 2021, '2nd Place in Extemporaneous Speech');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `adminID` int(2) NOT NULL,
  `lastname_` varchar(100) NOT NULL,
  `firstname_` varchar(100) NOT NULL,
  `mi_` varchar(100) NOT NULL,
  `positionname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`adminID`, `lastname_`, `firstname_`, `mi_`, `positionname`, `username`, `password_`) VALUES
(7, 'Admin', 'Admin', 'A', 'Administration', 'admin', 'e52e7ce4ac2458867d05eaad577560db'),
(18, 'Litana', 'Joyce', 'A', 'Faculty', 'litana', '74db372bd97301af2d835bcc97386d2f'),
(19, 'Ybas', 'John Richie', 'Y', 'Accreditation Task Force', 'ybasjohn', '516dba7a84f6b6e58369f64b815c7987');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `adminID` int(2) NOT NULL,
  `lastname_` varchar(100) NOT NULL,
  `firstname_` varchar(100) NOT NULL,
  `mi_` varchar(100) NOT NULL,
  `positionname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`adminID`, `lastname_`, `firstname_`, `mi_`, `positionname`, `username`, `password_`) VALUES
(7, 'garduno', 'rommel', 'm', 'Administration', 'rommel', 'fa15a772bcf48d851c20e81a8ec107a0');

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `achieveID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `achieveyear` int(4) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `achievement` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`achieveID`, `programID`, `achieveyear`, `name`, `achievement`) VALUES
(1, 1, 2019, 'RAITE 2019', 'Mark Anthony Ambrocio won Champion in Desktop Publishing'),
(2, 1, 2019, 'RAITE 2019', 'Darren Monroe, Fed Monzaga Jr. and Vic Exclamador won 1st place in Music Video Editing'),
(3, 1, 2019, 'RAITE 2019', 'Mhika Carcueva and Myk Kenneth Escala won champoion in IT- quiz bee');

-- --------------------------------------------------------

--
-- Table structure for table `actprogram`
--

CREATE TABLE `actprogram` (
  `actprogID` int(3) NOT NULL,
  `programID` int(2) NOT NULL,
  `activity_prog` varchar(3000) NOT NULL,
  `act_img` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actprogram`
--

INSERT INTO `actprogram` (`actprogID`, `programID`, `activity_prog`, `act_img`) VALUES
(1, 1, 'IT day', 'CCC.jpg'),
(2, 3, 'Ieskwelahan', 'ieskwelahan.png'),
(3, 1, 'RAITE', 'raite.jpg'),
(4, 1, 'Student week', 'studentweek.png'),
(5, 2, 'webinar', 'webinar.jpg'),
(6, 2, 'webinar', 'webinar.jpg'),
(7, 2, 'student week', 'studentweek.png'),
(8, 3, 'student week', 'studentweek.png'),
(10, 3, 'webinar', 'webinar.jpg'),
(11, 3, 'webinar', 'webinar.jpg'),
(12, 4, 'student week', 'studentweek.png'),
(13, 4, 'webinar', 'webinar.jpg'),
(14, 4, 'webinar', 'webinar.jpg'),
(15, 4, 'webinar', 'webinar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addfile`
--

CREATE TABLE `addfile` (
  `addfileID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `addfilename` varchar(1000) NOT NULL,
  `addfile_docu` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addfile`
--

INSERT INTO `addfile` (`addfileID`, `programID`, `addfilename`, `addfile_docu`) VALUES
(2, 1, 'BSIT ADDITIONAL FILES', 'BSIT-ADDFILE.pdf'),
(3, 3, 'BSIE ADDITIONAL FILES', 'BSIE-ADDFILE.pdf'),
(4, 2, 'BSA ADDITIONAL FILES', 'BSA-ADDFILE.pdf'),
(5, 4, 'BEED ADDITIONAL FILES', 'BEED-ADDFILE.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `adminID` int(2) NOT NULL,
  `positionID` int(2) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `professionalname` varchar(100) NOT NULL,
  `image_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`adminID`, `positionID`, `fullname`, `professionalname`, `image_`) VALUES
(1, 1, 'Leonila Generales', 'Asst. Prof', 'ljgenerales.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumniID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `alumniyear` int(5) NOT NULL,
  `alumniname_` varchar(100) NOT NULL,
  `alumniposition` varchar(1000) NOT NULL,
  `alumni_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumniID`, `programID`, `alumniyear`, `alumniname_`, `alumniposition`, `alumni_img`) VALUES
(1, 1, 2020, 'Kharen Mhae Patal', 'IT/admin of Apat Dapat Party List', 'kharen.png'),
(3, 1, 2020, 'John Lester Villaflor', 'ICT Teacher', 'Bill Gates.png'),
(4, 1, 2015, 'John Paul Belga', 'Team Leader- Software Development', 'Elon Msuk.png'),
(5, 1, 2019, 'Nikko Aldrich Monroe', 'Software Engineer', 'Mark Z.png'),
(6, 3, 2021, 'Debbie Arsenio', 'Industrial Engineer', 'debi.png'),
(7, 3, 2021, 'Marcnell Agoncillo', 'Finance and Admin Specialist', 'isko.png'),
(8, 3, 2020, 'Teofilo Coloquit', 'Mathematics Teacher', 'bong.png'),
(9, 3, 2014, 'Celso Enriquez', 'Head Engineer', 'Sotto.png'),
(10, 2, 2015, 'Jerric Guiterrez', 'Accounting Clerk', 'will.png'),
(11, 2, 2018, 'Rommel Oliveria', 'Book Keeper', 'lloyd.png'),
(12, 2, 2021, 'Joshua Delos Santos', 'Credit Analyst', 'emman.png'),
(13, 2, 2021, 'Beniece Calilung', 'Compliance Officer', 'cong.png'),
(14, 4, 2019, 'Christian Jade Rana', 'Elementary Teacher', 'daniel.png'),
(15, 4, 2018, 'John Paul Cebrian', 'High School Teacher', 'joshua.png'),
(16, 4, 2014, 'Alfred Mendoza', 'Senior High School Teacher', 'zaijan.png'),
(17, 4, 2019, 'Mark Perez', 'Elementary Teacher', 'Putin.png');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` int(2) NOT NULL,
  `areaname` varchar(50) NOT NULL,
  `area_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areaname`, `area_img`) VALUES
(1, 'Vision, Mission, Goals, and Objectives', 'Area I - Mission, Vision, Goals.png'),
(2, 'Faculties', 'Area II - Faculty.png'),
(3, 'Curriculum and Instruction', '(BSIT) Area III - Curriculum and Instruction.png'),
(4, 'Support to Student', '(BSIT) Area IV - Support to students.png'),
(5, 'Research', 'Area V - Research.png'),
(6, 'Extension and Community Involvement', 'Area VI - Extenstion and Community Involvement.png'),
(7, 'Library', 'Area VII - Library.png'),
(8, 'Physical Plants and Facilities', 'Area VIII - Physical Plant and Facilities.png'),
(9, 'Laboratories', 'Area IX - Laboratories.png'),
(10, 'Administration', 'Area X - Administration.png');

-- --------------------------------------------------------

--
-- Table structure for table `cmo`
--

CREATE TABLE `cmo` (
  `cmoID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `cmotitle_` varchar(100) NOT NULL,
  `cmo_img` varchar(255) NOT NULL,
  `cmodocument` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmo`
--

INSERT INTO `cmo` (`cmoID`, `programID`, `cmotitle_`, `cmo_img`, `cmodocument`) VALUES
(2, 3, 'CMO BSIT', 'BSIE.PNG', 'cmo bsie.pdf'),
(3, 1, 'CMO BSIT', 'CMO_BSIT.PNG', 'cmo bsit.pdf'),
(4, 2, 'CMO BSA', 'CMO_BSA.PNG', 'cmo bsa.pdf'),
(5, 4, 'CMO BEED', 'CMO_BEED.PNG', 'cmo beed.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `exhibit`
--

CREATE TABLE `exhibit` (
  `exhibitID` int(11) NOT NULL,
  `exhibitname` varchar(100) NOT NULL,
  `documents` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibit`
--

INSERT INTO `exhibit` (`exhibitID`, `exhibitname`, `documents`) VALUES
(1, 'citizens charter', 'CITIZENS CHARTER.pdf'),
(2, 'students handbook', 'ThePUPStudentHandbook2014.pdf'),
(3, 'university code', 'UNIVERSITY CODE.pdf'),
(4, 'administrative manual', 'ADMINISTRATIVE MANUAL.pdf'),
(5, 'faculty manual', 'FACULTY MANUAL.pdf'),
(6, 'UPG- Office of the president', 'UPG-OP.pdf'),
(7, 'UPG- Office of the vice-president', 'UPG-OVP.pdf'),
(8, 'UPG- Office of the vice-president for academic affairs', 'UPG-OVPAA.pdf'),
(9, 'UPG- Office of the vice-president for administration', 'UPG-OVPA.pdf'),
(10, 'UPG- Office of the vice-president for student affairs and services', 'UPG-OVPSAS.pdf'),
(11, 'UPG- office of the vice-president for finance', 'UPG-OVPF.pdf'),
(12, 'UPG- Office of the vice-president for branches and satellite campuses', 'UPG-OVPBSC.pdf'),
(13, 'Certificate of Authenticity', 'CERTIFICATE OF AUTHENTICITY.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facilityID` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facilityID`, `name`, `picture`, `description`) VALUES
(1, 'Court', 'court.jpg', 'multi-sport athletic space, typically constructed outdoors, where such games as basketball, volleyball, paddle tennisand other racquet sports, and up to a dozen more games and activities can be played.'),
(2, 'Council Cubicle', 'cubicle.jpg', 'This is the office of different organization or council in PUP-Bataan. '),
(3, 'ETG Hall', 'etg3.jpg', 'Most of the activities like webinar, team building, meeting and other activities were held in this area'),
(4, 'Library', 'library.jpg', 'This is room containing collections of books for stundents to read, borrow, or refer to. '),
(5, 'Speech Laboratory', 'room3.jpg', 'The speech laboratory is an audio or audio-visual system used as an aid in modern language teaching. '),
(6, 'Study Area', 'etg2.jpg', 'Study area was used by the student to study. This commonly held group study.'),
(7, ' Science Laboratory', 'etg.jpg', 'facility where experiments are done and typically contains equipment, beakers, burners and other tools necessary to complete experiments.'),
(8, 'Computer Laboratory', 'comlab1.jpg', 'Computer lab on SUNY Purchase campus. A computer lab is a space which provides computer services to a defined community. Computer labs are typically provided by libraries to the public, by academic institutions to students who attend the institution, or by other institutions to the public or to people affiliated with that institution.');

-- --------------------------------------------------------

--
-- Table structure for table `instructional`
--

CREATE TABLE `instructional` (
  `materialID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `yearlevel` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `materialtitle_` varchar(100) NOT NULL,
  `materialdocument` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructional`
--

INSERT INTO `instructional` (`materialID`, `programID`, `yearlevel`, `semester`, `materialtitle_`, `materialdocument`) VALUES
(1, 1, '1st', '1st', 'Accounting Principles', 'accounting principles.pdf'),
(2, 1, '1st', '1st', 'Introduction to Computing', 'introduction to computing.pdf'),
(3, 1, '1st', '1st', 'Computer Programming 1', 'computer programming  1.pdf'),
(5, 1, '1st', '1st', 'Purposive Communication', 'purposive communication.pdf'),
(6, 1, '1st', '2nd', 'Discrete Structure', 'discrete structure.pdf'),
(7, 1, '1st', '2nd', 'Pagsalin sa kontekstong Pilipino', 'PAGSASALIN_SA_KONTEKSTONG_FILIPINO.pdf'),
(8, 1, '2nd', '1st', 'Object Oriented Programming', 'OOP.pdf'),
(9, 1, '2nd', '1st', 'Human Computer Interaction', 'HCI.pdf'),
(10, 1, '2nd', '1st', 'Network Administration', 'network administration.pdf'),
(11, 1, '2nd', '1st', 'Integrative Programming and Technologies', 'integrative-programming-and-technologies-chapter-1_compress.pdf'),
(12, 1, '2nd', '2nd', 'data structures and algorithms', 'data strcutures and algorithms.pdf'),
(13, 1, '2nd', '2nd', 'Operating Systems', 'operating system.pdf'),
(14, 1, '2nd', '2nd', 'data Structures and Networking', 'Network Communication and Networking.pdf'),
(15, 1, '3rd', '1st', 'Art Appreciation', 'GEED-10073-Art-Appreciation.pdf'),
(16, 1, '3rd', '1st', 'Database Administration', 'Structured Query Language.pdf'),
(17, 1, '3rd', '1st', 'Fundamentals of Research', '1._Introduction_to_Research_IM_5f79880f1bca2.pdf'),
(18, 1, '3rd', '1st', 'IT-Elective 1', 'Project Management Module 1 neww.pdf'),
(19, 1, '3rd', '1st', 'Web Development', 'HTML, CSS and JavaScript All in One, Sams Teach Your_ Covering HTML5, CSS3, and jQuery - Julie C. Meloni.pdf'),
(20, 1, '3rd', '2nd', 'Application Development and Emerging Technologies', 'Application Development and Emerging Technologies.pdf'),
(21, 1, '3rd', '2nd', 'Information Assurance and Security', 'Information Assurance and Security all in One Handout.pdf'),
(22, 1, '3rd', '2nd', 'IT-Elective 2', 'E-COMMERCE.pdf'),
(23, 1, '3rd', '2nd', 'System Analysis and Design', 'SAD 1-7.pdf'),
(24, 1, '3rd', '2nd', 'Technopreneurship', 'Entreprenuership.pdf'),
(25, 1, '4th', '1st', 'Buhay at mga sinulat ni Rizal', 'THE LIFE AND WORKS OF RIZAL.pdf'),
(26, 1, '4th', '1st', 'Capstone', 'BSIT Capstone Project Terminal Report Format.pdf'),
(27, 1, '4th', '1st', 'Social and Professional Issues in IT', 'social-professional-issues-in-it.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `labID` int(2) NOT NULL,
  `labtitle` varchar(1000) NOT NULL,
  `lab_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`labID`, `labtitle`, `lab_img`) VALUES
(1, 'Computer Laboratory', 'comlab1.jpg\r\n'),
(2, 'Speech Laboratory', 'room3.jpg'),
(3, 'Science Laboratory', 'etg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `officeID` int(2) NOT NULL,
  `officetitle` varchar(1000) NOT NULL,
  `office_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`officeID`, `officetitle`, `office_img`) VALUES
(1, 'Director Office', 'do.jpg'),
(2, 'Student Affairs and Publications Office', 'IMG_1773.JPG'),
(3, 'Research Office', 'IMG_1770.JPG'),
(4, 'Academic Affair', 'IMG_1742.JPG'),
(5, 'Registrar', 'IMG_1744.JPG'),
(6, 'Accounting Office', 'IMG_1699.JPG'),
(7, 'PUPAA', 'IMG_1721.JPG'),
(8, 'Cubicle/Council offices', 'IMG_1717.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `parameterlibrary`
--

CREATE TABLE `parameterlibrary` (
  `paralib_ID` int(2) NOT NULL,
  `libpara_let` varchar(3) NOT NULL,
  `libSIP` varchar(100) NOT NULL,
  `lib_imp` varchar(100) NOT NULL,
  `lib_outcome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameterlibrary`
--

INSERT INTO `parameterlibrary` (`paralib_ID`, `libpara_let`, `libSIP`, `lib_imp`, `lib_outcome`) VALUES
(2, 'A', 'LIBRARY-A SIP.pdf', 'LIBRARY-A IMP.pdf', 'LIBRARY-A OUT.pdf'),
(3, 'B', 'LIBRARY-B SIP.pdf', 'LIBRARY-B IMP.pdf', 'LIBRARY-B OUT.pdf'),
(4, 'C', 'LIBRARY-C SIP.pdf', 'LIBRARY-C IMP.pdf', 'LIBRARY-C OUT.pdf'),
(5, 'D', 'LIBRARY-D SIP.pdf', 'LIBRARY-D IMP.pdf', 'LIBRARY-D OUT.pdf'),
(6, 'E', 'LIBRARY-E SIP.pdf', 'LIBRARY-E IMP.pdf', 'LIBRARY-E OUT.pdf'),
(7, 'F', 'LIBRARY-F.pdf', 'LIBRARY-F IMP.pdf', 'LIBRARY-F OUT.pdf'),
(8, 'G', 'LIBRARY-G SIP.pdf', 'LIBRARY-G IMP.pdf', 'LIBRARY-G OUT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionID` int(2) NOT NULL,
  `positionname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionID`, `positionname`) VALUES
(1, 'Administration'),
(2, 'Branch Official'),
(3, 'Part-Time Faculty'),
(4, 'Accreditation Task Force');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(2) NOT NULL,
  `programname` varchar(1000) NOT NULL,
  `prog_ac` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `prog_img` varchar(1000) NOT NULL,
  `definition` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `programname`, `prog_ac`, `description`, `prog_img`, `definition`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT', 'The Bachelor of Science in Information Technology (BSIT) is a four-year degree program in the\r\nPhilippines that deals with the processing and distribution of data with emphasis on its application\r\non businesses.', 'comp.jpg', 'Graduates with an information technology background are able to perform technology tasks relating to the processing, storing, and communication of information between computers, mobile phones, and other electronic devices. Information technology as a field emphasizes the secure management of large amounts of variable information and its accessibility via a wide variety of systems both local and worldwide'),
(2, 'Bachelor of Science in Accountancy', 'BSA', 'This program focused on subjects in financial, public, and managerial accounting, auditing, administration, business laws, and taxation. The program also teaches students to integrate information technology concepts into business systems, to create a more systematic and organized way of storing business-related data. Aside from business topics, BSA also equips students with a basic understanding of computer programming and auditing systems. ', 'acc.jpeg', 'This program offers both specialized knowledge in accounting and a general education leading to a broad understanding of the business world. The program is designed to prepare students for a professional career in accounting as well as graduate study in business, finance, information systems, or laws.'),
(3, 'Bachelor of Science in Industrial Engineering', 'BSIE', 'This program designed to prepare students for teaching technical courses in secondary and college levels, including vocational schools. The program covers a variety of technical and technological subjects, including Automotive, Civil, Drafting, Electrical, Electronics, Food and Garments Technology, Computer and Refrigeration and Air-conditioning. The program aims to strengthen the students’ knowledge of technical skills and effective teacher education. BSIE is a ladderized program, meaning that the students who successfully complete each year level and pass the TESDA Competency Assessment are issued the National Certificate (NC) of that particular level.', 'scical.jpg', 'This program concerned with the optimization of complex processes, systems, or organizations by developing, improving and implementing integrated systems of people, money, knowledge, information and equipment. Industrial engineering is central to manufacturing operations.'),
(4, 'Bachelor of Science in Elementary Education', 'BEED', 'This degree program designed to prepare\r\nstudents to become primary school\r\nteachers. ', 'educ.jpg', 'The program combines both theory and practice in order to teach students the necessary knowledge and skills a primary school teacher needs.');

-- --------------------------------------------------------

--
-- Table structure for table `sslibrary`
--

CREATE TABLE `sslibrary` (
  `sslibraryID` int(2) NOT NULL,
  `ss` varchar(1000) NOT NULL,
  `ppp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sslibrary`
--

INSERT INTO `sslibrary` (`sslibraryID`, `ss`, `ppp`) VALUES
(6, 'SS.pdf', 'PPP.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surveyarea`
--

CREATE TABLE `surveyarea` (
  `surveyareaID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `areaID` int(2) NOT NULL,
  `areades` varchar(8000) NOT NULL,
  `areappp` varchar(1000) NOT NULL,
  `areass` varchar(1000) NOT NULL,
  `area_addfile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyarea`
--

INSERT INTO `surveyarea` (`surveyareaID`, `programID`, `areaID`, `areades`, `areappp`, `areass`, `area_addfile`) VALUES
(2, 1, 1, 'The area of Vision, Mission, Goals, and Objectives is the most fundamental of all the (10) areas to be surveyed. Everything in the Institution is justified only to the extent that it realizes its vision and mission. It is essential therefore, for the Institution to formulate the vision and mission which should be the bases of all its operations. The Institution is judged by the degree to which these are attained, not in comparison with others.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(3, 2, 2, 'The standard or quality of an institution or program is greatly measured by the qualification of its faculty. In this light, the faculty should be composed of competent members in terms of academic qualifications, experience and professional expertise. In addition, they should manifest desirable personal qualities and high level of professionalism. To be effective, faculty members should be properly compensated and taken care of. They must be given opportunities for continuous personal and professional development. A policy of fair and equitable distribution of teaching assignments and workload should be practiced. Likewise, objective and clear promotion criteria/scheme should be adopted by the Institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(4, 1, 2, 'The standard or quality of an institution or program is greatly measured by the qualification of its faculty. In this light, the faculty should be composed of competent members in terms of academic qualifications, experience and professional expertise. In addition, they should manifest desirable personal qualities and high level of professionalism. To be effective, faculty members should be properly compensated and taken care of. They must be given opportunities for continuous personal and professional development. A policy of fair and equitable distribution of teaching assignments and workload should be practiced. Likewise, objective and clear promotion criteria/scheme should be adopted by the Institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(5, 1, 3, 'Curriculum and instruction occupy center stage in any educational program. These seek to research, develop, and implement curriculum changes that enhance student achievement within and outside of institutions. How students learn and the best ways to educate deserve much consideration. The quality of these two allied areas determine primarily the prestige and strength of the institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(6, 1, 4, 'Students are the raison d etre for the establishment of learning institutions. Thus, the school has the responsibility to support the family and other social institutions in the development of the total personality of the student. Towards this end a program of student services is designed as an integral part of institutional effectiveness. All activities should be well planned and implemented to assist the student to attain his/her maximum potential and become a worthy contributor in his/her social environment.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(7, 1, 5, 'Research is an avenue through which new knowledge is discovered, applied or verified and through which appropriate technologies are generated. Thus, it is a basic requirement for an educational institution to have a firmly established research and development program. Its thrusts and priorities should be congruent with those identified in the development plans of regional and national R and D-oriented agencies such as NEDA, DOST, CHED, etc. The institutional leadership in research should be proactive and developmental in orientation. It must provide adequate and sustained budget allocation annually for the academic Unit. Adequate physical facilities, laboratory equipment and supplies for research should be provided. The Academic unit has to maintain strong research linkages with various R and D agencies locally and internationally.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(8, 1, 6, 'The extension function makes the institutions presence felt in the community. It involves the application of existing and new knowledge and technology and those generated in the Institution to improve the quality of life of the people. Through the extension program, people are empowered with appropriate knowledge, attitudes and skills. Thus, extension services cater to various aspects of the community life, e.g., economic growth, promotion of health, environmental management, and social transformation. The Institution plans and implements an extension program that is need and client-based. This program should have a budgetary support and other resource allocation. The faculty members may serve as experts, consultants, organizers, facilitators, coordinators, service providers, and change agents in the community as forms of extension and community involvement. Careful planning and coordination with other community outreach agencies should be considered to avoid duplication of services offered to the clientele.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(9, 1, 7, 'The library is the heart of any learning institution. It is a synergy of people, hardware and software whose purpose is to assist clients in using knowledge and technology to transform and improve their lives. Information and knowledge are essential to the attainment of institutional goals. The ways in which they are selected, acquired, stored, accessed and distributed within the Institution will, in large measure, determine the success of teaching, research and other academic endeavors. The Institution thrives on clear policies concerning access to, and provision of, information. Thus, the library must take an active role in the development and implementation of these policies. Each institution has a unique vision, mission, goals and objectives. These are influenced by its philosophy, geographical location and social responsibility. Similarly, as a subsystem of the Institution, the library has a unique role to perform.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(10, 1, 8, 'The quality and adequacy of the physical plant and facilities of a learning institution determine to a large measure the successful implementation of its curricular programs. In a broad sense, physical plant and facilities include school campus, buildings and other physical infrastructures, equipment and services that complement institutional and program effectiveness.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(11, 1, 9, 'Laboratories are included in the support systems for any academic program. Broadly defined, they cover science laboratories, speech laboratories, demonstration farms, shops, and other facilities for practicum activities essential to the successful implementation of curricular programs inclusive of their use and functions.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(12, 1, 10, 'The administration is the engine of the Institution in the attainment of its vision, mission, goals and objectives. It is concerned with the general affairs of the Institution and its organization performance. Thus, the administration adopts institutional processes and ensures that said processes are satisfactorily implemented.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(13, 2, 1, 'The area of Vision, Mission, Goals, and Objectives is the most fundamental of all the (10) areas to be surveyed. Everything in the Institution is justified only to the extent that it realizes its vision and mission. It is essential therefore, for the Institution to formulate the vision and mission which should be the bases of all its operations. The Institution is judged by the degree to which these are attained, not in comparison with others.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(14, 2, 3, 'Curriculum and instruction occupy center stage in any educational program. These seek to research, develop, and implement curriculum changes that enhance student achievement within and outside of institutions. How students learn and the best ways to educate deserve much consideration. The quality of these two allied areas determine primarily the prestige and strength of the institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(15, 2, 4, 'Students are the raison d etre for the establishment of learning institutions. Thus, the school has the responsibility to support the family and other social institutions in the development of the total personality of the student. Towards this end a program of student services is designed as an integral part of institutional effectiveness. All activities should be well planned and implemented to assist the student to attain his/her maximum potential and become a worthy contributor in his/her social environment. Student support and services complement the Academic Program.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(16, 2, 5, 'Research is an avenue through which new knowledge is discovered, applied or verified and through which appropriate technologies are generated. Thus, it is a basic requirement for an educational institution to have a firmly established research and development program. Its thrusts and priorities should be congruent with those identified in the development plans of regional and national R and D-oriented agencies such as NEDA, DOST, CHED, etc. The institutional leadership in research should be proactive and developmental in orientation. It must provide adequate and sustained budget allocation annually for the academic Unit. Adequate physical facilities, laboratory equipment and supplies for research should be provided. The Academic unit has to maintain strong research linkages with various R and D agencies locally and internationally.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(17, 2, 6, 'The extension function makes the institutions presence felt in the community. It involves the application of existing and new knowledge and technology and those generated in the Institution to improve the quality of life of the people. Through the extension program, people are empowered with appropriate knowledge, attitudes and skills. Thus, extension services cater to various aspects of the community life, e.g., economic growth, promotion of health, environmental management, and social transformation. The Institution plans and implements an extension program that is need and client-based. This program should have a budgetary support and other resource allocation. The faculty members may serve as experts, consultants, organizers, facilitators, coordinators, service providers, and change agents in the community as forms of extension and community involvement. Careful planning and coordination with other community outreach agencies should be considered to avoid duplication of services offered to the clientele.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(18, 2, 7, 'The library is the heart of any learning institution. It is a synergy of people, hardware and software whose purpose is to assist clients in using knowledge and technology to transform and improve their lives. Information and knowledge are essential to the attainment of institutional goals. The ways in which they are selected, acquired, stored, accessed and distributed within the Institution will, in large measure, determine the success of teaching, research and other academic endeavors. The Institution thrives on clear policies concerning access to, and provision of, information. Thus, the library must take an active role in the development and implementation of these policies. Each institution has a unique vision, mission, goals and objectives. These are influenced by its philosophy, geographical location and social responsibility. Similarly, as a subsystem of the Institution, the library has a unique role to perform..', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(19, 2, 8, 'The quality and adequacy of the physical plant and facilities of a learning institution determine to a large measure the successful implementation of its curricular programs. In a broad sense, physical plant and facilities include school campus, buildings and other physical infrastructures, equipment and services that complement institutional and program effectiveness.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(20, 2, 9, 'Laboratories are included in the support systems for any academic program. Broadly defined, they cover science laboratories, speech laboratories, demonstration farms, shops, and other facilities for practicum activities essential to the successful implementation of curricular programs inclusive of their use and functions.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(21, 2, 10, 'The administration is the engine of the Institution in the attainment of its vision, mission, goals and objectives. It is concerned with the general affairs of the Institution and its organization performance. Thus, the administration adopts institutional processes and ensures that said processes are satisfactorily implemented.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(22, 3, 1, 'The area of Vision, Mission, Goals, and Objectives is the most fundamental of all the (10) areas to be surveyed. Everything in the Institution is justified only to the extent that it realizes its vision and mission. It is essential therefore, for the Institution to formulate the vision and mission which should be the bases of all its operations. The Institution is judged by the degree to which these are attained, not in comparison with others.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(23, 3, 2, 'The standard or quality of an institution or program is greatly measured by the qualification of its faculty. In this light, the faculty should be composed of competent members in terms of academic qualifications, experience and professional expertise. In addition, they should manifest desirable personal qualities and high level of professionalism. To be effective, faculty members should be properly compensated and taken care of. They must be given opportunities for continuous personal and professional development. A policy of fair and equitable distribution of teaching assignments and workload should be practiced. Likewise, objective and clear promotion criteria/scheme should be adopted by the Institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(24, 3, 3, 'Curriculum and instruction occupy center stage in any educational program. These seek to research, develop, and implement curriculum changes that enhance student achievement within and outside of institutions. How students learn and the best ways to educate deserve much consideration. The quality of these two allied areas determine primarily the prestige and strength of the institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(25, 3, 4, 'Students are the raison d etre for the establishment of learning institutions. Thus, the school has the responsibility to support the family and other social institutions in the development of the total personality of the student. Towards this end a program of student services is designed as an integral part of institutional effectiveness. All activities should be well planned and implemented to assist the student to attain his/her maximum potential and become a worthy contributor in his/her social environment. Student support and services complement the Academic Program.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(26, 3, 5, 'Research is an avenue through which new knowledge is discovered, applied or verified and through which appropriate technologies are generated. Thus, it is a basic requirement for an educational institution to have a firmly established research and development program. Its thrusts and priorities should be congruent with those identified in the development plans of regional and national R and D-oriented agencies such as NEDA, DOST, CHED, etc. The institutional leadership in research should be proactive and developmental in orientation. It must provide adequate and sustained budget allocation annually for the academic Unit. Adequate physical facilities, laboratory equipment and supplies for research should be provided. The Academic unit has to maintain strong research linkages with various R and D agencies locally and internationally.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(27, 3, 6, 'The extension function makes the institutions presence felt in the community. It involves the application of existing and new knowledge and technology and those generated in the Institution to improve the quality of life of the people. Through the extension program, people are empowered with appropriate knowledge, attitudes and skills. Thus, extension services cater to various aspects of the community life, e.g., economic growth, promotion of health, environmental management, and social transformation. The Institution plans and implements an extension program that is need and client-based. This program should have a budgetary support and other resource allocation. The faculty members may serve as experts, consultants, organizers, facilitators, coordinators, service providers, and change agents in the community as forms of extension and community involvement. Careful planning and coordination with other community outreach agencies should be considered to avoid duplication of services offered to the clientele.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(28, 3, 7, 'The library is the heart of any learning institution. It is a synergy of people, hardware and software whose purpose is to assist clients in using knowledge and technology to transform and improve their lives. Information and knowledge are essential to the attainment of institutional goals. The ways in which they are selected, acquired, stored, accessed and distributed within the Institution will, in large measure, determine the success of teaching, research and other academic endeavors. The Institution thrives on clear policies concerning access to, and provision of, information. Thus, the library must take an active role in the development and implementation of these policies. Each institution has a unique vision, mission, goals and objectives. These are influenced by its philosophy, geographical location and social responsibility. Similarly, as a subsystem of the Institution, the library has a unique role to perform.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(29, 3, 8, 'The quality and adequacy of the physical plant and facilities of a learning institution determine to a large measure the successful implementation of its curricular programs. In a broad sense, physical plant and facilities include school campus, buildings and other physical infrastructures, equipment and services that complement institutional and program effectiveness.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(30, 3, 9, 'Laboratories are included in the support systems for any academic program. Broadly defined, they cover science laboratories, speech laboratories, demonstration farms, shops, and other facilities for practicum activities essential to the successful implementation of curricular programs inclusive of their use and functions.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(31, 3, 10, 'The administration is the engine of the Institution in the attainment of its vision, mission, goals and objectives. It is concerned with the general affairs of the Institution and its organization performance. Thus, the administration adopts institutional processes and ensures that said processes are satisfactorily implemented.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(32, 4, 1, 'The area of Vision, Mission, Goals, and Objectives is the most fundamental of all the (10) areas to be surveyed. Everything in the Institution is justified only to the extent that it realizes its vision and mission. It is essential therefore, for the Institution to formulate the vision and mission which should be the bases of all its operations. The Institution is judged by the degree to which these are attained, not in comparison with others.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(33, 4, 2, 'The standard or quality of an institution or program is greatly measured by the qualification of its faculty. In this light, the faculty should be composed of competent members in terms of academic qualifications, experience and professional expertise. In addition, they should manifest desirable personal qualities and high level of professionalism. To be effective, faculty members should be properly compensated and taken care of. They must be given opportunities for continuous personal and professional development. A policy of fair and equitable distribution of teaching assignments and workload should be practiced. Likewise, objective and clear promotion criteria/scheme should be adopted by the Institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(34, 4, 3, 'Curriculum and instruction occupy center stage in any educational program. These seek to research, develop, and implement curriculum changes that enhance student achievement within and outside of institutions. How students learn and the best ways to educate deserve much consideration. The quality of these two allied areas determine primarily the prestige and strength of the institution.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(35, 4, 4, 'Students are the raison d etre for the establishment of learning institutions. Thus, the school has the responsibility to support the family and other social institutions in the development of the total personality of the student. Towards this end a program of student services is designed as an integral part of institutional effectiveness. All activities should be well planned and implemented to assist the student to attain his/her maximum potential and become a worthy contributor in his/her social environment. Student support and services complement the Academic Program.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(36, 4, 5, 'Research is an avenue through which new knowledge is discovered, applied or verified and through which appropriate technologies are generated. Thus, it is a basic requirement for an educational institution to have a firmly established research and development program. Its thrusts and priorities should be congruent with those identified in the development plans of regional and national R and D-oriented agencies such as NEDA, DOST, CHED, etc. The institutional leadership in research should be proactive and developmental in orientation. It must provide adequate and sustained budget allocation annually for the academic Unit. Adequate physical facilities, laboratory equipment and supplies for research should be provided. The Academic unit has to maintain strong research linkages with various R and D agencies locally and internationally.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(37, 4, 6, 'The extension function makes the institutions presence felt in the community. It involves the application of existing and new knowledge and technology and those generated in the Institution to improve the quality of life of the people. Through the extension program, people are empowered with appropriate knowledge, attitudes and skills. Thus, extension services cater to various aspects of the community life, e.g., economic growth, promotion of health, environmental management, and social transformation. The Institution plans and implements an extension program that is need and client-based. This program should have a budgetary support and other resource allocation. The faculty members may serve as experts, consultants, organizers, facilitators, coordinators, service providers, and change agents in the community as forms of extension and community involvement. Careful planning and coordination with other community outreach agencies should be considered to avoid duplication of services offered to the clientele.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(38, 4, 7, 'The library is the heart of any learning institution. It is a synergy of people, hardware and software whose purpose is to assist clients in using knowledge and technology to transform and improve their lives. Information and knowledge are essential to the attainment of institutional goals. The ways in which they are selected, acquired, stored, accessed and distributed within the Institution will, in large measure, determine the success of teaching, research and other academic endeavors. The Institution thrives on clear policies concerning access to, and provision of, information. Thus, the library must take an active role in the development and implementation of these policies. Each institution has a unique vision, mission, goals and objectives. These are influenced by its philosophy, geographical location and social responsibility. Similarly, as a subsystem of the Institution, the library has a unique role to perform.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(39, 4, 8, 'The quality and adequacy of the physical plant and facilities of a learning institution determine to a large measure the successful implementation of its curricular programs. In a broad sense, physical plant and facilities include school campus, buildings and other physical infrastructures, equipment and services that complement institutional and program effectiveness.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(40, 4, 9, 'Laboratories are included in the support systems for any academic program. Broadly defined, they cover science laboratories, speech laboratories, demonstration farms, shops, and other facilities for practicum activities essential to the successful implementation of curricular programs inclusive of their use and functions.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf'),
(41, 4, 10, 'The administration is the engine of the Institution in the attainment of its vision, mission, goals and objectives. It is concerned with the general affairs of the Institution and its organization performance. Thus, the administration adopts institutional processes and ensures that said processes are satisfactorily implemented.', 'PPP.pdf', 'SS.pdf', 'ADDITIONAL FILES.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surveyparameter`
--

CREATE TABLE `surveyparameter` (
  `surveyparaID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `areaID` int(2) NOT NULL,
  `parameterletter` varchar(5) NOT NULL,
  `parametertitle` varchar(3000) NOT NULL,
  `sip_` varchar(1000) NOT NULL,
  `implementation` varchar(1000) NOT NULL,
  `outcome` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyparameter`
--

INSERT INTO `surveyparameter` (`surveyparaID`, `programID`, `areaID`, `parameterletter`, `parametertitle`, `sip_`, `implementation`, `outcome`) VALUES
(2, 1, 1, 'A', 'Statement of Vision, Mission and Goals', 'BSIT_AREA1_PARAMETER(A)_SIP.pdf', 'BSIT_AREA1_PARAMETER(A)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(A)_OUTCOME.pdf'),
(3, 1, 1, 'B', 'Dissemination and Acceptability', 'BSIT_AREA1_PARAMETER(B)_SIP.pdf', 'BSIT_AREA1_PARAMETER(B)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(B)_OUTCOME.pdf'),
(4, 1, 2, 'A', 'Academic Qualification and Professional Experience', 'BSIT_AREA2_PARAMETER(A)_SIP.pdf', 'BSIT_AREA2_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(A)_OUTCOME.pdf'),
(5, 1, 2, 'B', 'Recruitment, Selection and Orientation', 'BSIT_AREA2_PARAMETER(B)_SIP.pdf', 'BSIT_AREA2_PARAMETER(B)_IMPLEMENTATION - Copy.pdf', 'BSIT_AREA2_PARAMETER(B)_OUTCOME.pdf'),
(6, 1, 2, 'C', 'Faculty, Adequacy and Loading', 'BSIT_AREA2_PARAMETER(C)_SIP.pdf', 'BSIT_AREA2_PARAMETER(C)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA2_PARAMETER(C)_OUTCOME.pdf'),
(7, 1, 2, 'D', 'Rank and Tenure', 'BSIT_AREA2_PARAMETER(D)_SIP.pdf', 'BSIT_AREA2_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(D)_OUTCOME.pdf'),
(8, 1, 2, 'E', 'Faculty Development', 'BSIT_AREA2_PARAMETER(E)_SIP.pdf', 'BSIT_AREA2_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(E)_OUTCOME.pdf'),
(9, 1, 2, 'F', 'Professional Performance and Scholarly Works', 'BSIT_AREA2_PARAMETER(F)_SIP.pdf', 'BSIT_AREA2_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(F)_OUTCOME.pdf'),
(10, 1, 2, 'G', 'Salaries, Fringe Benefits and Incentives', 'BSIT_AREA2_PARAMETER(G)_SIP.pdf', 'BSIT_AREA2_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(G)_OUTCOME.pdf'),
(11, 1, 2, 'H', 'Professionalism', 'BSIT_AREA2_PARAMETER(H)_SIP.pdf', 'BSIT_AREA2_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(H)_OUTCOME.pdf'),
(12, 1, 3, 'A', 'Curriculum, Program and Studies', 'BSIT_AREA3_PARAMETER(A)_SIP.pdf', 'BSIT_AREA3_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(A)_OUTCOME.pdf'),
(13, 1, 3, 'B', 'Instructional Process, Methodologies and Learning', 'BSIT_AREA3_PARAMETER(B)_SIP.pdf', 'BSIT_AREA3_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(B)_OUTCOME.pdf'),
(14, 1, 3, 'C', 'Management of Learning', 'BSIT_AREA3_PARAMETER(C)_SIP.pdf', 'BSIT_AREA3_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(C)_OUTCOME.pdf'),
(15, 1, 3, 'D', 'Management of Learning', 'BSIT_AREA3_PARAMETER(D)_SIP.pdf', 'BSIT_AREA3_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(D)_OUTCOME.pdf'),
(16, 1, 3, 'E', 'Graduation Requirements', 'BSIT_AREA3_PARAMETER(E)_SIP.pdf', 'BSIT_AREA3_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(E)_OUTCOME.pdf'),
(17, 1, 3, 'F', 'Administrative Support for Effective Instruction', 'BSIT_AREA3_PARAMETER(F)_SIP.pdf', 'BSIT_AREA3_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(F)_OUTCOME.pdf'),
(18, 1, 4, 'A', 'Student Services Program(SSP)', 'BSIT_AREA4_PARAMETER(A)_SIP.pdf', 'BSIT_AREA4_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(A)_OUTCOME.pdf'),
(19, 1, 4, 'B', 'Student Welfare', 'BSIT_AREA4_PARAMETER(B)_SIP.pdf', 'BSIT_AREA4_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(B)_OUTCOME.pdf'),
(20, 1, 4, 'C', 'Student Development', 'BSIT_AREA4_PARAMETER(C)_SIP.pdf', 'BSIT_AREA4_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(C)_OUTCOME.pdf'),
(21, 1, 4, 'D', 'Instructional Programs and Services', 'BSIT_AREA4_PARAMETER(D)_SIP.pdf', 'BSIT_AREA4_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(D)_OUTCOME.pdf'),
(22, 1, 4, 'E', 'Research Monitoring and Evaluation', 'BSIT_AREA4_PARAMETER(E)_SIP.pdf', 'BSIT_AREA4_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(E)_OUTCOME.pdf'),
(23, 1, 5, 'A', 'Priorities and Relevance', 'BSIT_AREA5_PARAMETER(A)_SIP.pdf', 'BSIT_AREA5_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(A)_OUTCOME.pdf'),
(24, 1, 5, 'B', 'Funding and Other Resources', 'BSIT_AREA5_PARAMETER(B)_SIP.pdf', 'BSIT_AREA5_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(B)_OUTCOME.pdf'),
(25, 1, 5, 'C', 'Implementation, Monitoring, Evaluation and Utilization of Research Result/Output', 'BSIT_AREA5_PARAMETER(C)_SIP.pdf', 'BSIT_AREA5_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(C)_OUTCOME.pdf'),
(26, 1, 5, 'D', 'Publication and Dissemination', 'BSIT_AREA5_PARAMETER(D)_SIP.pdf', 'BSIT_AREA5_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(D)_OUTCOME.pdf'),
(27, 1, 6, 'A', 'Priorities and Relevance', 'BSIT_AREA6_PARAMETER(A)_SIP.pdf', 'BSIT_AREA6_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(A)_OUTCOME.pdf'),
(28, 1, 6, 'B', 'Planning, Implementation, Monitoring and Evaluation', 'BSIT_AREA6_PARAMETER(B)_SIP.pdf', 'BSIT_AREA6_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(B)_OUTCOME.pdf'),
(29, 1, 6, 'C', 'Funding and Other Resources', 'BSIT_AREA6_PARAMETER(C)_SIP.pdf', 'BSIT_AREA6_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(C)_OUTCOME.pdf'),
(30, 1, 6, 'D', 'Community Involvement and Participation', 'BSIT_AREA6_PARAMETER(D)_SIP.pdf', 'BSIT_AREA6_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(D)_OUTCOME.pdf'),
(31, 1, 7, 'A', 'Administration', 'BSIT_AREA7_PARAMETER(A)_SIP.pdf', 'BSIT_AREA7_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(A)_OUTCOME.pdf'),
(32, 1, 7, 'B', 'Administrative Staff', 'BSIT_AREA7_PARAMETER(B)_SIP.pdf', 'BSIT_AREA7_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(B)_OUTCOME.pdf'),
(33, 1, 7, 'C', 'Collection, Development, Organization, and Preservation', 'BSITAREA7_PARAMETER(C)_SIP.pdf', 'BSIT_AREA7_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(C)_OUTCOME.pdf'),
(34, 1, 7, 'D', 'Service and Utilization', 'BSIT_AREA7_PARAMETER(D)_SIP.pdf', 'BSIT_AREA7_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(D)_OUTCOME.pdf'),
(35, 1, 7, 'E', 'Physical Setup and Facilities', 'BSIT_AREA7_PARAMETER(E)_SIP.pdf', 'BSIT_AREA7_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(E)_OUTCOME.pdf'),
(36, 1, 7, 'F', 'Financial Support', 'BSIT_AREA7_PARAMETER(F)_SIP.pdf', 'BSIT_AREA7_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(F)_OUTCOME.pdf'),
(37, 1, 7, 'G', 'Linkage', 'BSIT_AREA7_PARAMETER(G)_SIP.pdf', 'BSIT_AREA7_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(G)_OUTCOME.pdf'),
(38, 1, 8, 'A', 'Campus', 'BSIT_AREA8_PARAMETER(A)_SIP.pdf', 'BSIT_AREA8_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(A)_OUTCOME.pdf'),
(39, 1, 8, 'B', 'Buildings', 'BSIT_AREA8_PARAMETER(B)_SIP.pdf', 'BSIT_AREA8_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(B)_OUTCOME.pdf'),
(40, 1, 8, 'C', 'Classroom', 'BSIT_AREA8_PARAMETER(C)_SIP.pdf', 'BSIT_AREA8_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(C)_OUTCOME.pdf'),
(41, 1, 8, 'D', 'Offices, Staff and Function Room', 'BSIT_AREA8_PARAMETER(D)_SIP.pdf', 'BSIT_AREA8_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(D)_OUTCOME.pdf'),
(42, 1, 8, 'E', 'Assembly and Athlete Facility', 'BSIT_AREA8_PARAMETER(E)_SIP.pdf', 'BSIT_AREA8_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(E)_OUTCOME.pdf'),
(43, 1, 8, 'F', 'Medical and Dental Clinic', 'BSIT_AREA8_PARAMETER(F)_SIP.pdf', 'BSIT_AREA8_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(F)_OUTCOME.pdf'),
(44, 1, 8, 'G', 'Student Center', 'BSIT_AREA8_PARAMETER(G)_SIP.pdf', 'BSIT_AREA8_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(G)_OUTCOME.pdf'),
(45, 1, 8, 'H', 'Food Services/Canteen', 'BSIT_AREA8_PARAMETER(H)_SIP.pdf', 'BSIT_AREA8_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(H)_OUTCOME.pdf'),
(46, 1, 8, 'I', 'Accreditation Center', 'BSIT_AREA8_PARAMETER(I)_SIP.pdf', 'BSIT_AREA8_PARAMETER(I)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(I)_OUTCOME.pdf'),
(47, 1, 8, 'J', 'Housing', 'BSIT_AREA8_PARAMETER(J)_SIP.pdf', 'BSIT_AREA8_PARAMETER(J)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(J)_OUTCOME.pdf'),
(48, 1, 9, 'A', 'Laboratories, Shop and Facilities', 'BSIT_AREA9_PARAMETER(A)_SIP.pdf', 'BSIT_AREA9_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(A)_OUTCOME.pdf'),
(49, 1, 9, 'B', 'Equipment and Supplies', 'BSIT_AREA9_PARAMETER(B)_SIP.pdf', 'BSIT_AREA9_PARAMETER(B)_SIP - Copy (2).pdf', 'BSIT_AREA9_PARAMETER(B)_OUTCOME.pdf'),
(50, 1, 9, 'C', 'Maintenance', 'BSIT_AREA9_PARAMETER(C)_SIP.pdf', 'BSIT_AREA9_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(C)_OUTCOME.pdf'),
(51, 1, 9, 'D', 'Special Provisions', 'BEED_AREA9_PARAMETER(D)_SIP.pdf', 'BEED_AREA9_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA9_PARAMETER(D)_OUTCOME.pdf'),
(52, 1, 10, 'A', 'Organization', 'BEED_AREA10_PARAMETER(A)_SIP.pdf', 'BEED_AREA10_PARAMETER(A)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(A)_OUTCOME.pdf'),
(53, 1, 10, 'B', 'Academic Administration', 'BEED_AREA10_PARAMETER(B)_SIP.pdf', 'BEED_AREA10_PARAMETER(B)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(B)_OUTCOME.pdf'),
(54, 1, 10, 'C', 'Academic Administration', 'BEED_AREA10_PARAMETER(C)_SIP.pdf', 'BEED_AREA10_PARAMETER(C)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(C)_OUTCOME.pdf'),
(55, 1, 10, 'D', 'Financial Management', 'BEED_AREA10_PARAMETER(D)_SIP.pdf', 'BEED_AREA10_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(D)_OUTCOME.pdf'),
(56, 1, 10, 'E', 'Supply Management', 'BEED_AREA10_PARAMETER(E)_SIP.pdf', 'BEED_AREA10_PARAMETER(E)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(E)_OUTCOME.pdf'),
(57, 1, 10, 'F', 'Record Management', 'BEED_AREA10_PARAMETER(F)_SIP.pdf', 'BEED_AREA10_PARAMETER(F)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(F)_OUTCOME.pdf'),
(58, 1, 10, 'G', 'Institution, Planning and Development', 'BEED_AREA10_PARAMETER(G)_SIP.pdf', 'BEED_AREA10_PARAMETER(G)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(G)_OUTCOME.pdf'),
(59, 1, 10, 'H', 'Performance of Administrative Personnel', 'BEED_AREA10_PARAMETER(H)_SIP.pdf', 'BEED_AREA10_PARAMETER(H)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(H)_OUTCOME.pdf'),
(60, 2, 1, 'A', 'Statement of Vision, Mission and Goals', 'BSIT_AREA1_PARAMETER(A)_SIP.pdf', 'BSIT_AREA1_PARAMETER(A)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(A)_OUTCOME.pdf'),
(61, 2, 1, 'B', 'Dissemination and Acceptability', 'BSIT_AREA1_PARAMETER(B)_SIP.pdf', 'BSIT_AREA1_PARAMETER(B)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(B)_OUTCOME.pdf'),
(62, 2, 2, 'A', 'Academic Qualification and Professional Experience', 'BSIT_AREA2_PARAMETER(A)_SIP.pdf', 'BSIT_AREA2_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(A)_OUTCOME.pdf'),
(63, 2, 2, 'B', 'Recruitment, Selection and Orientation', 'BSIT_AREA2_PARAMETER(B)_SIP.pdf', 'BSIT_AREA2_PARAMETER(B)_IMPLEMENTATION - Copy.pdf', 'BSIT_AREA2_PARAMETER(B)_OUTCOME.pdf'),
(64, 2, 2, 'C', 'Faculty, Adequacy and Loading', 'BSIT_AREA2_PARAMETER(C)_SIP.pdf', 'BSIT_AREA2_PARAMETER(C)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA2_PARAMETER(C)_OUTCOME.pdf'),
(65, 2, 2, 'D', 'Rank and Tenure', 'BSIT_AREA2_PARAMETER(D)_SIP.pdf', 'BSIT_AREA2_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(D)_OUTCOME.pdf'),
(66, 2, 2, 'E', 'Faculty Development', 'BSIT_AREA2_PARAMETER(E)_SIP.pdf', 'BSIT_AREA2_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(E)_OUTCOME.pdf'),
(67, 2, 2, 'F', 'Professional Performance and Scholarly Works', 'BSIT_AREA2_PARAMETER(F)_SIP.pdf', 'BSIT_AREA2_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(F)_OUTCOME.pdf'),
(68, 2, 2, 'G', 'Salaries, Fringe Benefits and Incentives', 'BSIT_AREA2_PARAMETER(G)_SIP.pdf', 'BSIT_AREA2_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(G)_OUTCOME.pdf'),
(69, 2, 2, 'H', 'Professionalism', 'BSIT_AREA2_PARAMETER(H)_SIP.pdf', 'BSIT_AREA2_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(H)_OUTCOME.pdf'),
(70, 2, 3, 'A', 'Curriculum, Program and Studies', 'BSIT_AREA3_PARAMETER(A)_SIP.pdf', 'BSIT_AREA3_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(A)_OUTCOME.pdf'),
(71, 2, 3, 'B', 'Instructional Process, Methodologies and Learning', 'BSIT_AREA3_PARAMETER(B)_SIP.pdf', 'BSIT_AREA3_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(B)_OUTCOME.pdf'),
(72, 2, 3, 'C', 'Management of Learning', 'BSIT_AREA3_PARAMETER(C)_SIP.pdf', 'BSIT_AREA3_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(C)_OUTCOME.pdf'),
(73, 2, 3, 'D', 'Management of Learning', 'BSIT_AREA3_PARAMETER(D)_SIP.pdf', 'BSIT_AREA3_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(D)_OUTCOME.pdf'),
(74, 2, 3, 'E', 'Graduation Requirements', 'BSIT_AREA3_PARAMETER(E)_SIP.pdf', 'BSIT_AREA3_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(E)_OUTCOME.pdf'),
(75, 2, 3, 'F', 'Administrative Support for Effective Instruction', 'BSIT_AREA3_PARAMETER(F)_SIP.pdf', 'BSIT_AREA3_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(F)_OUTCOME.pdf'),
(76, 2, 4, 'A', 'Student Services Program(SSP)', 'BSIT_AREA4_PARAMETER(A)_SIP.pdf', 'BSIT_AREA4_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(A)_OUTCOME.pdf'),
(77, 2, 4, 'B', 'Student Welfare', 'BSIT_AREA4_PARAMETER(B)_SIP.pdf', 'BSIT_AREA4_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(B)_OUTCOME.pdf'),
(78, 2, 4, 'C', 'Student Development', 'BSIT_AREA4_PARAMETER(C)_SIP.pdf', 'BSIT_AREA4_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(C)_OUTCOME.pdf'),
(79, 2, 4, 'D', 'Instructional Programs and Services', 'BSIT_AREA4_PARAMETER(D)_SIP.pdf', 'BSIT_AREA4_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(D)_OUTCOME.pdf'),
(80, 2, 4, 'E', 'Research Monitoring and Evaluation', 'BSIT_AREA4_PARAMETER(E)_SIP.pdf', 'BSIT_AREA4_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(E)_OUTCOME.pdf'),
(81, 2, 5, 'A', 'Priorities and Relevance', 'BSIT_AREA5_PARAMETER(A)_SIP.pdf', 'BSIT_AREA5_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(A)_OUTCOME.pdf'),
(82, 2, 5, 'B', 'Funding and Other Resources', 'BSIT_AREA5_PARAMETER(B)_SIP.pdf', 'BSIT_AREA5_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(B)_OUTCOME.pdf'),
(83, 2, 5, 'C', 'Implementation, Monitoring, Evaluation and Utilization of Research Result/Output', 'BSIT_AREA5_PARAMETER(C)_SIP.pdf', 'BSIT_AREA5_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(C)_OUTCOME.pdf'),
(84, 2, 5, 'D', 'Publication and Dissemination', 'BSIT_AREA5_PARAMETER(D)_SIP.pdf', 'BSIT_AREA5_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(D)_OUTCOME.pdf'),
(85, 2, 6, 'A', 'Priorities and Relevance', 'BSIT_AREA6_PARAMETER(A)_SIP.pdf', 'BSIT_AREA6_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(A)_OUTCOME.pdf'),
(86, 2, 6, 'B', 'Planning, Implementation, Monitoring and Evaluation', 'BSIT_AREA6_PARAMETER(B)_SIP.pdf', 'BSIT_AREA6_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(B)_OUTCOME.pdf'),
(87, 2, 6, 'C', 'Funding and Other Resources', 'BSIT_AREA6_PARAMETER(C)_SIP.pdf', 'BSIT_AREA6_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(C)_OUTCOME.pdf'),
(88, 2, 6, 'D', 'Community Involvement and Participation', 'BSIT_AREA6_PARAMETER(D)_SIP.pdf', 'BSIT_AREA6_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(D)_OUTCOME.pdf'),
(89, 2, 7, 'A', 'Administration', 'BSIT_AREA7_PARAMETER(A)_SIP.pdf', 'BSIT_AREA7_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(A)_OUTCOME.pdf'),
(90, 2, 7, 'B', 'Administrative Staff', 'BSIT_AREA7_PARAMETER(B)_SIP.pdf', 'BSIT_AREA7_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(B)_OUTCOME.pdf'),
(91, 2, 7, 'C', 'Collection, Development, Organization, and Preservation', 'BSITAREA7_PARAMETER(C)_SIP.pdf', 'BSIT_AREA7_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(C)_OUTCOME.pdf'),
(92, 2, 7, 'D', 'Service and Utilization', 'BSIT_AREA7_PARAMETER(D)_SIP.pdf', 'BSIT_AREA7_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(D)_OUTCOME.pdf'),
(93, 2, 7, 'E', 'Physical Setup and Facilities', 'BSIT_AREA7_PARAMETER(E)_SIP.pdf', 'BSIT_AREA7_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(E)_OUTCOME.pdf'),
(94, 2, 7, 'F', 'Financial Support', 'BSIT_AREA7_PARAMETER(F)_SIP.pdf', 'BSIT_AREA7_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(F)_OUTCOME.pdf'),
(95, 2, 7, 'G', 'Linkage', 'BSIT_AREA7_PARAMETER(G)_SIP.pdf', 'BSIT_AREA7_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(G)_OUTCOME.pdf'),
(96, 2, 8, 'A', 'Campus', 'BSIT_AREA8_PARAMETER(A)_SIP.pdf', 'BSIT_AREA8_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(A)_OUTCOME.pdf'),
(97, 2, 8, 'B', 'Buildings', 'BSIT_AREA8_PARAMETER(B)_SIP.pdf', 'BSIT_AREA8_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(B)_OUTCOME.pdf'),
(98, 2, 8, 'C', 'Classroom', 'BSIT_AREA8_PARAMETER(C)_SIP.pdf', 'BSIT_AREA8_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(C)_OUTCOME.pdf'),
(99, 2, 8, 'D', 'Offices, Staff and Function Room', 'BSIT_AREA8_PARAMETER(D)_SIP.pdf', 'BSIT_AREA8_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(D)_OUTCOME.pdf'),
(100, 2, 8, 'E', 'Assembly and Athlete Facility', 'BSIT_AREA8_PARAMETER(E)_SIP.pdf', 'BSIT_AREA8_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(E)_OUTCOME.pdf'),
(101, 2, 8, 'F', 'Medical and Dental Clinic', 'BSIT_AREA8_PARAMETER(F)_SIP.pdf', 'BSIT_AREA8_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(F)_OUTCOME.pdf'),
(102, 2, 8, 'G', 'Student Center', 'BSIT_AREA8_PARAMETER(G)_SIP.pdf', 'BSIT_AREA8_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(G)_OUTCOME.pdf'),
(103, 2, 8, 'H', 'Food Services/Canteen', 'BSIT_AREA8_PARAMETER(H)_SIP.pdf', 'BSIT_AREA8_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(H)_OUTCOME.pdf'),
(104, 2, 8, 'I', 'Accreditation Center', 'BSIT_AREA8_PARAMETER(I)_SIP.pdf', 'BSIT_AREA8_PARAMETER(I)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(I)_OUTCOME.pdf'),
(105, 2, 8, 'J', 'Housing', 'BSIT_AREA8_PARAMETER(J)_SIP.pdf', 'BSIT_AREA8_PARAMETER(J)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(J)_OUTCOME.pdf'),
(106, 2, 9, 'A', 'Laboratories, Shop and Facilities', 'BSIT_AREA9_PARAMETER(A)_SIP.pdf', 'BSIT_AREA9_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(A)_OUTCOME.pdf'),
(107, 2, 9, 'B', 'Equipment and Supplies', 'BSIT_AREA9_PARAMETER(B)_SIP.pdf', 'BSIT_AREA9_PARAMETER(B)_SIP - Copy (2).pdf', 'BSIT_AREA9_PARAMETER(B)_OUTCOME.pdf'),
(108, 2, 9, 'C', 'Maintenance', 'BSIT_AREA9_PARAMETER(C)_SIP.pdf', 'BSIT_AREA9_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(C)_OUTCOME.pdf'),
(109, 2, 9, 'D', 'Special Provisions', 'BEED_AREA9_PARAMETER(D)_SIP.pdf', 'BEED_AREA9_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA9_PARAMETER(D)_OUTCOME.pdf'),
(110, 2, 10, 'A', 'Organization', 'BEED_AREA10_PARAMETER(A)_SIP.pdf', 'BEED_AREA10_PARAMETER(A)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(A)_OUTCOME.pdf'),
(111, 2, 10, 'B', 'Academic Administration', 'BEED_AREA10_PARAMETER(B)_SIP.pdf', 'BEED_AREA10_PARAMETER(B)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(B)_OUTCOME.pdf'),
(112, 2, 10, 'C', 'Academic Administration', 'BEED_AREA10_PARAMETER(C)_SIP.pdf', 'BEED_AREA10_PARAMETER(C)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(C)_OUTCOME.pdf'),
(113, 2, 10, 'D', 'Financial Management', 'BEED_AREA10_PARAMETER(D)_SIP.pdf', 'BEED_AREA10_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(D)_OUTCOME.pdf'),
(114, 2, 10, 'E', 'Supply Management', 'BEED_AREA10_PARAMETER(E)_SIP.pdf', 'BEED_AREA10_PARAMETER(E)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(E)_OUTCOME.pdf'),
(115, 2, 10, 'F', 'Record Management', 'BEED_AREA10_PARAMETER(F)_SIP.pdf', 'BEED_AREA10_PARAMETER(F)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(F)_OUTCOME.pdf'),
(116, 2, 10, 'G', 'Institution, Planning and Development', 'BEED_AREA10_PARAMETER(G)_SIP.pdf', 'BEED_AREA10_PARAMETER(G)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(G)_OUTCOME.pdf'),
(117, 2, 10, 'H', 'Performance of Administrative Personnel', 'BEED_AREA10_PARAMETER(H)_SIP.pdf', 'BEED_AREA10_PARAMETER(H)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(H)_OUTCOME.pdf'),
(118, 3, 1, 'A', 'Statement of Vision, Mission and Goals', 'BSIT_AREA1_PARAMETER(A)_SIP.pdf', 'BSIT_AREA1_PARAMETER(A)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(A)_OUTCOME.pdf'),
(119, 3, 1, 'B', 'Dissemination and Acceptability', 'BSIT_AREA1_PARAMETER(B)_SIP.pdf', 'BSIT_AREA1_PARAMETER(B)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(B)_OUTCOME.pdf'),
(120, 3, 2, 'A', 'Academic Qualification and Professional Experience', 'BSIT_AREA2_PARAMETER(A)_SIP.pdf', 'BSIT_AREA2_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(A)_OUTCOME.pdf'),
(121, 3, 2, 'B', 'Recruitment, Selection and Orientation', 'BSIT_AREA2_PARAMETER(B)_SIP.pdf', 'BSIT_AREA2_PARAMETER(B)_IMPLEMENTATION - Copy.pdf', 'BSIT_AREA2_PARAMETER(B)_OUTCOME.pdf'),
(122, 3, 2, 'C', 'Faculty, Adequacy and Loading', 'BSIT_AREA2_PARAMETER(C)_SIP.pdf', 'BSIT_AREA2_PARAMETER(C)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA2_PARAMETER(C)_OUTCOME.pdf'),
(123, 3, 2, 'D', 'Rank and Tenure', 'BSIT_AREA2_PARAMETER(D)_SIP.pdf', 'BSIT_AREA2_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(D)_OUTCOME.pdf'),
(124, 3, 2, 'E', 'Faculty Development', 'BSIT_AREA2_PARAMETER(E)_SIP.pdf', 'BSIT_AREA2_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(E)_OUTCOME.pdf'),
(125, 3, 2, 'F', 'Professional Performance and Scholarly Works', 'BSIT_AREA2_PARAMETER(F)_SIP.pdf', 'BSIT_AREA2_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(F)_OUTCOME.pdf'),
(126, 3, 2, 'G', 'Salaries, Fringe Benefits and Incentives', 'BSIT_AREA2_PARAMETER(G)_SIP.pdf', 'BSIT_AREA2_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(G)_OUTCOME.pdf'),
(127, 3, 2, 'H', 'Professionalism', 'BSIT_AREA2_PARAMETER(H)_SIP.pdf', 'BSIT_AREA2_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(H)_OUTCOME.pdf'),
(128, 3, 3, 'A', 'Curriculum, Program and Studies', 'BSIT_AREA3_PARAMETER(A)_SIP.pdf', 'BSIT_AREA3_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(A)_OUTCOME.pdf'),
(129, 3, 3, 'B', 'Instructional Process, Methodologies and Learning', 'BSIT_AREA3_PARAMETER(B)_SIP.pdf', 'BSIT_AREA3_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(B)_OUTCOME.pdf'),
(130, 3, 3, 'C', 'Management of Learning', 'BSIT_AREA3_PARAMETER(C)_SIP.pdf', 'BSIT_AREA3_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(C)_OUTCOME.pdf'),
(131, 3, 3, 'D', 'Management of Learning', 'BSIT_AREA3_PARAMETER(D)_SIP.pdf', 'BSIT_AREA3_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(D)_OUTCOME.pdf'),
(132, 3, 3, 'E', 'Graduation Requirements', 'BSIT_AREA3_PARAMETER(E)_SIP.pdf', 'BSIT_AREA3_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(E)_OUTCOME.pdf'),
(133, 3, 3, 'F', 'Administrative Support for Effective Instruction', 'BSIT_AREA3_PARAMETER(F)_SIP.pdf', 'BSIT_AREA3_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(F)_OUTCOME.pdf'),
(134, 3, 4, 'A', 'Student Services Program(SSP)', 'BSIT_AREA4_PARAMETER(A)_SIP.pdf', 'BSIT_AREA4_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(A)_OUTCOME.pdf'),
(135, 3, 4, 'B', 'Student Welfare', 'BSIT_AREA4_PARAMETER(B)_SIP.pdf', 'BSIT_AREA4_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(B)_OUTCOME.pdf'),
(136, 3, 4, 'C', 'Student Development', 'BSIT_AREA4_PARAMETER(C)_SIP.pdf', 'BSIT_AREA4_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(C)_OUTCOME.pdf'),
(137, 3, 4, 'D', 'Instructional Programs and Services', 'BSIT_AREA4_PARAMETER(D)_SIP.pdf', 'BSIT_AREA4_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(D)_OUTCOME.pdf'),
(138, 3, 4, 'E', 'Research Monitoring and Evaluation', 'BSIT_AREA4_PARAMETER(E)_SIP.pdf', 'BSIT_AREA4_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(E)_OUTCOME.pdf'),
(139, 3, 5, 'A', 'Priorities and Relevance', 'BSIT_AREA5_PARAMETER(A)_SIP.pdf', 'BSIT_AREA5_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(A)_OUTCOME.pdf'),
(140, 3, 5, 'B', 'Funding and Other Resources', 'BSIT_AREA5_PARAMETER(B)_SIP.pdf', 'BSIT_AREA5_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(B)_OUTCOME.pdf'),
(141, 3, 5, 'C', 'Implementation, Monitoring, Evaluation and Utilization of Research Result/Output', 'BSIT_AREA5_PARAMETER(C)_SIP.pdf', 'BSIT_AREA5_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(C)_OUTCOME.pdf'),
(142, 3, 5, 'D', 'Publication and Dissemination', 'BSIT_AREA5_PARAMETER(D)_SIP.pdf', 'BSIT_AREA5_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(D)_OUTCOME.pdf'),
(143, 3, 6, 'A', 'Priorities and Relevance', 'BSIT_AREA6_PARAMETER(A)_SIP.pdf', 'BSIT_AREA6_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(A)_OUTCOME.pdf'),
(144, 3, 6, 'B', 'Planning, Implementation, Monitoring and Evaluation', 'BSIT_AREA6_PARAMETER(B)_SIP.pdf', 'BSIT_AREA6_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(B)_OUTCOME.pdf'),
(145, 3, 6, 'C', 'Funding and Other Resources', 'BSIT_AREA6_PARAMETER(C)_SIP.pdf', 'BSIT_AREA6_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(C)_OUTCOME.pdf'),
(146, 3, 6, 'D', 'Community Involvement and Participation', 'BSIT_AREA6_PARAMETER(D)_SIP.pdf', 'BSIT_AREA6_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(D)_OUTCOME.pdf'),
(147, 3, 7, 'A', 'Administration', 'BSIT_AREA7_PARAMETER(A)_SIP.pdf', 'BSIT_AREA7_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(A)_OUTCOME.pdf'),
(148, 3, 7, 'B', 'Administrative Staff', 'BSIT_AREA7_PARAMETER(B)_SIP.pdf', 'BSIT_AREA7_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(B)_OUTCOME.pdf'),
(149, 3, 7, 'C', 'Collection, Development, Organization, and Preservation', 'BSITAREA7_PARAMETER(C)_SIP.pdf', 'BSIT_AREA7_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(C)_OUTCOME.pdf'),
(150, 3, 7, 'D', 'Service and Utilization', 'BSIT_AREA7_PARAMETER(D)_SIP.pdf', 'BSIT_AREA7_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(D)_OUTCOME.pdf'),
(151, 3, 7, 'E', 'Physical Setup and Facilities', 'BSIT_AREA7_PARAMETER(E)_SIP.pdf', 'BSIT_AREA7_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(E)_OUTCOME.pdf'),
(152, 3, 7, 'F', 'Financial Support', 'BSIT_AREA7_PARAMETER(F)_SIP.pdf', 'BSIT_AREA7_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(F)_OUTCOME.pdf'),
(153, 3, 7, 'G', 'Linkage', 'BSIT_AREA7_PARAMETER(G)_SIP.pdf', 'BSIT_AREA7_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(G)_OUTCOME.pdf'),
(154, 3, 8, 'A', 'Campus', 'BSIT_AREA8_PARAMETER(A)_SIP.pdf', 'BSIT_AREA8_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(A)_OUTCOME.pdf'),
(155, 3, 8, 'B', 'Buildings', 'BSIT_AREA8_PARAMETER(B)_SIP.pdf', 'BSIT_AREA8_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(B)_OUTCOME.pdf'),
(156, 3, 8, 'C', 'Classroom', 'BSIT_AREA8_PARAMETER(C)_SIP.pdf', 'BSIT_AREA8_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(C)_OUTCOME.pdf'),
(157, 3, 8, 'D', 'Offices, Staff and Function Room', 'BSIT_AREA8_PARAMETER(D)_SIP.pdf', 'BSIT_AREA8_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(D)_OUTCOME.pdf'),
(158, 3, 8, 'E', 'Assembly and Athlete Facility', 'BSIT_AREA8_PARAMETER(E)_SIP.pdf', 'BSIT_AREA8_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(E)_OUTCOME.pdf'),
(159, 3, 8, 'F', 'Medical and Dental Clinic', 'BSIT_AREA8_PARAMETER(F)_SIP.pdf', 'BSIT_AREA8_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(F)_OUTCOME.pdf'),
(160, 3, 8, 'G', 'Student Center', 'BSIT_AREA8_PARAMETER(G)_SIP.pdf', 'BSIT_AREA8_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(G)_OUTCOME.pdf'),
(161, 3, 8, 'H', 'Food Services/Canteen', 'BSIT_AREA8_PARAMETER(H)_SIP.pdf', 'BSIT_AREA8_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(H)_OUTCOME.pdf'),
(162, 3, 8, 'I', 'Accreditation Center', 'BSIT_AREA8_PARAMETER(I)_SIP.pdf', 'BSIT_AREA8_PARAMETER(I)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(I)_OUTCOME.pdf'),
(163, 3, 8, 'J', 'Housing', 'BSIT_AREA8_PARAMETER(J)_SIP.pdf', 'BSIT_AREA8_PARAMETER(J)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(J)_OUTCOME.pdf'),
(164, 3, 9, 'A', 'Laboratories, Shop and Facilities', 'BSIT_AREA9_PARAMETER(A)_SIP.pdf', 'BSIT_AREA9_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(A)_OUTCOME.pdf'),
(165, 3, 9, 'B', 'Equipment and Supplies', 'BSIT_AREA9_PARAMETER(B)_SIP.pdf', 'BSIT_AREA9_PARAMETER(B)_SIP - Copy (2).pdf', 'BSIT_AREA9_PARAMETER(B)_OUTCOME.pdf'),
(166, 3, 9, 'C', 'Maintenance', 'BSIT_AREA9_PARAMETER(C)_SIP.pdf', 'BSIT_AREA9_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(C)_OUTCOME.pdf'),
(167, 3, 9, 'D', 'Special Provisions', 'BEED_AREA9_PARAMETER(D)_SIP.pdf', 'BEED_AREA9_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA9_PARAMETER(D)_OUTCOME.pdf'),
(168, 3, 10, 'A', 'Organization', 'BEED_AREA10_PARAMETER(A)_SIP.pdf', 'BEED_AREA10_PARAMETER(A)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(A)_OUTCOME.pdf'),
(169, 3, 10, 'B', 'Academic Administration', 'BEED_AREA10_PARAMETER(B)_SIP.pdf', 'BEED_AREA10_PARAMETER(B)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(B)_OUTCOME.pdf'),
(170, 3, 10, 'C', 'Academic Administration', 'BEED_AREA10_PARAMETER(C)_SIP.pdf', 'BEED_AREA10_PARAMETER(C)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(C)_OUTCOME.pdf'),
(171, 3, 10, 'D', 'Financial Management', 'BEED_AREA10_PARAMETER(D)_SIP.pdf', 'BEED_AREA10_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(D)_OUTCOME.pdf'),
(172, 3, 10, 'E', 'Supply Management', 'BEED_AREA10_PARAMETER(E)_SIP.pdf', 'BEED_AREA10_PARAMETER(E)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(E)_OUTCOME.pdf'),
(173, 3, 10, 'F', 'Record Management', 'BEED_AREA10_PARAMETER(F)_SIP.pdf', 'BEED_AREA10_PARAMETER(F)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(F)_OUTCOME.pdf'),
(174, 3, 10, 'G', 'Institution, Planning and Development', 'BEED_AREA10_PARAMETER(G)_SIP.pdf', 'BEED_AREA10_PARAMETER(G)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(G)_OUTCOME.pdf'),
(175, 3, 10, 'H', 'Performance of Administrative Personnel', 'BEED_AREA10_PARAMETER(H)_SIP.pdf', 'BEED_AREA10_PARAMETER(H)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(H)_OUTCOME.pdf'),
(176, 4, 1, 'A', 'Statement of Vision, Mission and Goals', 'BSIT_AREA1_PARAMETER(A)_SIP.pdf', 'BSIT_AREA1_PARAMETER(A)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(A)_OUTCOME.pdf'),
(177, 4, 1, 'B', 'Dissemination and Acceptability', 'BSIT_AREA1_PARAMETER(B)_SIP.pdf', 'BSIT_AREA1_PARAMETER(B)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA1_PARAMETER(B)_OUTCOME.pdf'),
(178, 4, 2, 'A', 'Academic Qualification and Professional Experience', 'BSIT_AREA2_PARAMETER(A)_SIP.pdf', 'BSIT_AREA2_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(A)_OUTCOME.pdf'),
(179, 4, 2, 'B', 'Recruitment, Selection and Orientation', 'BSIT_AREA2_PARAMETER(B)_SIP.pdf', 'BSIT_AREA2_PARAMETER(B)_IMPLEMENTATION - Copy.pdf', 'BSIT_AREA2_PARAMETER(B)_OUTCOME.pdf'),
(180, 4, 2, 'C', 'Faculty, Adequacy and Loading', 'BSIT_AREA2_PARAMETER(C)_SIP.pdf', 'BSIT_AREA2_PARAMETER(C)_IMPLEMENTATION - Copy (2).pdf', 'BSIT_AREA2_PARAMETER(C)_OUTCOME.pdf'),
(181, 4, 2, 'D', 'Rank and Tenure', 'BSIT_AREA2_PARAMETER(D)_SIP.pdf', 'BSIT_AREA2_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(D)_OUTCOME.pdf'),
(182, 4, 2, 'E', 'Faculty Development', 'BSIT_AREA2_PARAMETER(E)_SIP.pdf', 'BSIT_AREA2_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(E)_OUTCOME.pdf'),
(183, 4, 2, 'F', 'Professional Performance and Scholarly Works', 'BSIT_AREA2_PARAMETER(F)_SIP.pdf', 'BSIT_AREA2_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(F)_OUTCOME.pdf'),
(184, 4, 2, 'G', 'Salaries, Fringe Benefits and Incentives', 'BSIT_AREA2_PARAMETER(G)_SIP.pdf', 'BSIT_AREA2_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(G)_OUTCOME.pdf'),
(185, 4, 2, 'H', 'Professionalism', 'BSIT_AREA2_PARAMETER(H)_SIP.pdf', 'BSIT_AREA2_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA2_PARAMETER(H)_OUTCOME.pdf'),
(186, 4, 3, 'A', 'Curriculum, Program and Studies', 'BSIT_AREA3_PARAMETER(A)_SIP.pdf', 'BSIT_AREA3_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(A)_OUTCOME.pdf'),
(187, 4, 3, 'B', 'Instructional Process, Methodologies and Learning', 'BSIT_AREA3_PARAMETER(B)_SIP.pdf', 'BSIT_AREA3_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(B)_OUTCOME.pdf'),
(188, 4, 3, 'C', 'Management of Learning', 'BSIT_AREA3_PARAMETER(C)_SIP.pdf', 'BSIT_AREA3_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(C)_OUTCOME.pdf'),
(189, 4, 3, 'D', 'Management of Learning', 'BSIT_AREA3_PARAMETER(D)_SIP.pdf', 'BSIT_AREA3_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(D)_OUTCOME.pdf'),
(190, 4, 3, 'E', 'Graduation Requirements', 'BSIT_AREA3_PARAMETER(E)_SIP.pdf', 'BSIT_AREA3_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(E)_OUTCOME.pdf'),
(191, 4, 3, 'F', 'Administrative Support for Effective Instruction', 'BSIT_AREA3_PARAMETER(F)_SIP.pdf', 'BSIT_AREA3_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA3_PARAMETER(F)_OUTCOME.pdf'),
(192, 4, 4, 'A', 'Student Services Program(SSP)', 'BSIT_AREA4_PARAMETER(A)_SIP.pdf', 'BSIT_AREA4_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(A)_OUTCOME.pdf'),
(193, 4, 4, 'B', 'Student Welfare', 'BSIT_AREA4_PARAMETER(B)_SIP.pdf', 'BSIT_AREA4_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(B)_OUTCOME.pdf'),
(194, 4, 4, 'C', 'Student Development', 'BSIT_AREA4_PARAMETER(C)_SIP.pdf', 'BSIT_AREA4_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(C)_OUTCOME.pdf'),
(195, 4, 4, 'D', 'Instructional Programs and Services', 'BSIT_AREA4_PARAMETER(D)_SIP.pdf', 'BSIT_AREA4_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(D)_OUTCOME.pdf'),
(196, 4, 4, 'E', 'Research Monitoring and Evaluation', 'BSIT_AREA4_PARAMETER(E)_SIP.pdf', 'BSIT_AREA4_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA4_PARAMETER(E)_OUTCOME.pdf'),
(197, 4, 5, 'A', 'Priorities and Relevance', 'BSIT_AREA5_PARAMETER(A)_SIP.pdf', 'BSIT_AREA5_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(A)_OUTCOME.pdf'),
(198, 4, 5, 'B', 'Funding and Other Resources', 'BSIT_AREA5_PARAMETER(B)_SIP.pdf', 'BSIT_AREA5_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(B)_OUTCOME.pdf'),
(199, 4, 5, 'C', 'Implementation, Monitoring, Evaluation and Utilization of Research Result/Output', 'BSIT_AREA5_PARAMETER(C)_SIP.pdf', 'BSIT_AREA5_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(C)_OUTCOME.pdf'),
(200, 4, 5, 'D', 'Publication and Dissemination', 'BSIT_AREA5_PARAMETER(D)_SIP.pdf', 'BSIT_AREA5_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA5_PARAMETER(D)_OUTCOME.pdf'),
(201, 4, 6, 'A', 'Priorities and Relevance', 'BSIT_AREA6_PARAMETER(A)_SIP.pdf', 'BSIT_AREA6_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(A)_OUTCOME.pdf'),
(202, 4, 6, 'B', 'Planning, Implementation, Monitoring and Evaluation', 'BSIT_AREA6_PARAMETER(B)_SIP.pdf', 'BSIT_AREA6_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(B)_OUTCOME.pdf'),
(203, 4, 6, 'C', 'Funding and Other Resources', 'BSIT_AREA6_PARAMETER(C)_SIP.pdf', 'BSIT_AREA6_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(C)_OUTCOME.pdf'),
(204, 4, 6, 'D', 'Community Involvement and Participation', 'BSIT_AREA6_PARAMETER(D)_SIP.pdf', 'BSIT_AREA6_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA6_PARAMETER(D)_OUTCOME.pdf'),
(205, 4, 7, 'A', 'Administration', 'BSIT_AREA7_PARAMETER(A)_SIP.pdf', 'BSIT_AREA7_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(A)_OUTCOME.pdf'),
(206, 4, 7, 'B', 'Administrative Staff', 'BSIT_AREA7_PARAMETER(B)_SIP.pdf', 'BSIT_AREA7_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(B)_OUTCOME.pdf'),
(207, 4, 7, 'C', 'Collection, Development, Organization, and Preservation', 'BSITAREA7_PARAMETER(C)_SIP.pdf', 'BSIT_AREA7_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(C)_OUTCOME.pdf'),
(208, 4, 7, 'D', 'Service and Utilization', 'BSIT_AREA7_PARAMETER(D)_SIP.pdf', 'BSIT_AREA7_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(D)_OUTCOME.pdf'),
(209, 4, 7, 'E', 'Physical Setup and Facilities', 'BSIT_AREA7_PARAMETER(E)_SIP.pdf', 'BSIT_AREA7_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(E)_OUTCOME.pdf'),
(210, 4, 7, 'F', 'Financial Support', 'BSIT_AREA7_PARAMETER(F)_SIP.pdf', 'BSIT_AREA7_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(F)_OUTCOME.pdf'),
(211, 4, 7, 'G', 'Linkage', 'BSIT_AREA7_PARAMETER(G)_SIP.pdf', 'BSIT_AREA7_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA7_PARAMETER(G)_OUTCOME.pdf'),
(212, 4, 8, 'A', 'Campus', 'BSIT_AREA8_PARAMETER(A)_SIP.pdf', 'BSIT_AREA8_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(A)_OUTCOME.pdf'),
(213, 4, 8, 'B', 'Buildings', 'BSIT_AREA8_PARAMETER(B)_SIP.pdf', 'BSIT_AREA8_PARAMETER(B)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(B)_OUTCOME.pdf'),
(214, 4, 8, 'C', 'Classroom', 'BSIT_AREA8_PARAMETER(C)_SIP.pdf', 'BSIT_AREA8_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(C)_OUTCOME.pdf'),
(215, 4, 8, 'D', 'Offices, Staff and Function Room', 'BSIT_AREA8_PARAMETER(D)_SIP.pdf', 'BSIT_AREA8_PARAMETER(D)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(D)_OUTCOME.pdf'),
(216, 4, 8, 'E', 'Assembly and Athlete Facility', 'BSIT_AREA8_PARAMETER(E)_SIP.pdf', 'BSIT_AREA8_PARAMETER(E)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(E)_OUTCOME.pdf'),
(217, 4, 8, 'F', 'Medical and Dental Clinic', 'BSIT_AREA8_PARAMETER(F)_SIP.pdf', 'BSIT_AREA8_PARAMETER(F)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(F)_OUTCOME.pdf'),
(218, 4, 8, 'G', 'Student Center', 'BSIT_AREA8_PARAMETER(G)_SIP.pdf', 'BSIT_AREA8_PARAMETER(G)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(G)_OUTCOME.pdf'),
(219, 4, 8, 'H', 'Food Services/Canteen', 'BSIT_AREA8_PARAMETER(H)_SIP.pdf', 'BSIT_AREA8_PARAMETER(H)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(H)_OUTCOME.pdf'),
(220, 4, 8, 'I', 'Accreditation Center', 'BSIT_AREA8_PARAMETER(I)_SIP.pdf', 'BSIT_AREA8_PARAMETER(I)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(I)_OUTCOME.pdf'),
(221, 4, 8, 'J', 'Housing', 'BSIT_AREA8_PARAMETER(J)_SIP.pdf', 'BSIT_AREA8_PARAMETER(J)_IMPLEMENTATION.pdf', 'BSIT_AREA8_PARAMETER(J)_OUTCOME.pdf'),
(222, 4, 9, 'A', 'Laboratories, Shop and Facilities', 'BSIT_AREA9_PARAMETER(A)_SIP.pdf', 'BSIT_AREA9_PARAMETER(A)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(A)_OUTCOME.pdf'),
(223, 4, 9, 'B', 'Equipment and Supplies', 'BSIT_AREA9_PARAMETER(B)_SIP.pdf', 'BSIT_AREA9_PARAMETER(B)_SIP - Copy (2).pdf', 'BSIT_AREA9_PARAMETER(B)_OUTCOME.pdf'),
(224, 4, 9, 'C', 'Maintenance', 'BSIT_AREA9_PARAMETER(C)_SIP.pdf', 'BSIT_AREA9_PARAMETER(C)_IMPLEMENTATION.pdf', 'BSIT_AREA9_PARAMETER(C)_OUTCOME.pdf'),
(225, 4, 9, 'D', 'Special Provisions', 'BEED_AREA9_PARAMETER(D)_SIP.pdf', 'BEED_AREA9_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA9_PARAMETER(D)_OUTCOME.pdf'),
(226, 4, 10, 'A', 'Organization', 'BEED_AREA10_PARAMETER(A)_SIP.pdf', 'BEED_AREA10_PARAMETER(A)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(A)_OUTCOME.pdf'),
(227, 4, 10, 'B', 'Academic Administration', 'BEED_AREA10_PARAMETER(B)_SIP.pdf', 'BEED_AREA10_PARAMETER(B)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(B)_OUTCOME.pdf'),
(228, 4, 10, 'C', 'Academic Administration', 'BEED_AREA10_PARAMETER(C)_SIP.pdf', 'BEED_AREA10_PARAMETER(C)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(C)_OUTCOME.pdf'),
(229, 4, 10, 'D', 'Financial Management', 'BEED_AREA10_PARAMETER(D)_SIP.pdf', 'BEED_AREA10_PARAMETER(D)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(D)_OUTCOME.pdf'),
(230, 4, 10, 'E', 'Supply Management', 'BEED_AREA10_PARAMETER(E)_SIP.pdf', 'BEED_AREA10_PARAMETER(E)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(E)_OUTCOME.pdf'),
(231, 4, 10, 'F', 'Record Management', 'BEED_AREA10_PARAMETER(F)_SIP.pdf', 'BEED_AREA10_PARAMETER(F)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(F)_OUTCOME.pdf'),
(232, 4, 10, 'G', 'Institution, Planning and Development', 'BEED_AREA10_PARAMETER(G)_SIP.pdf', 'BEED_AREA10_PARAMETER(G)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(G)_OUTCOME.pdf'),
(233, 4, 10, 'H', 'Performance of Administrative Personnel', 'BEED_AREA10_PARAMETER(H)_SIP.pdf', 'BEED_AREA10_PARAMETER(H)_IMPLEMENTATION.pdf', 'BEED_AREA10_PARAMETER(H)_OUTCOME.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surveyprogram`
--

CREATE TABLE `surveyprogram` (
  `surveyID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `objective` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyprogram`
--

INSERT INTO `surveyprogram` (`surveyID`, `programID`, `objective`) VALUES
(1, 1, 'aims to produce students whose knowledge and competence in planning, installing, customizing, operating, managing, administering, and maintaining information technology infrastructure are grounded on the effective utilization of computers and computer software and thus enabling them to contribute worthwhile IT solutions to the business communities all over the world.'),
(2, 1, 'It  provides the student with the knowledge to successfully apply information technology theory and principles to address real world business opportunities and challenges. The one of the primary educational objective of the program is produce graduates who can enter into and advance in the professions of IT, management information systems, and IT business infrastructure, as well as continue their education and obtain advanced degrees in these and related fields.'),
(3, 1, 'With regard to program outcomes, graduates must be able to evaluate current and emerging technologies; identify user needs; design user-friendly interfaces; apply, configure, and manage these technologies; assess their impacts on individuals, organizations, and the environment, apply fundamental business concepts and strategies; and use innovative digital materials to develop competencies to apply: Systems Analysis and Design, Computer Programming, Database Development, Network Technologies, Information Systems Security, Web Technologies and Project Planning.'),
(4, 2, 'Create competent professionals capable of making a positive contribution to the profession and society;'),
(5, 2, 'Prepare the students for the Certified Public Accountants (CPA) Licensure Examinations; and,'),
(6, 2, 'Assure students of the opportunities for employment in various businesses, including government agencies by strengthening industry partnerships and linkages.'),
(7, 3, 'An ability to identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics '),
(8, 3, 'An ability to apply engineering design to produce solutions that meet specified needs with consideration of public health, safety, and welfare, as well as global, cultural, social, environmental, and economic factors '),
(9, 3, 'An ability to communicate effectively with a range of audiences '),
(10, 4, ' Demonstrate in-depth understanding of the diversity of learners in various learning areas.'),
(11, 4, ' Manifest meaningful and comprehensive pedagogical content knowledge (PCK) of the different subject areas.'),
(12, 4, 'Utilize appropriate assessment and evaluation tools to measure learning outcomes.');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `syllabiID` int(2) NOT NULL,
  `programID` int(2) NOT NULL,
  `syllabititle_` varchar(100) NOT NULL,
  `syllabi_img` varchar(255) NOT NULL,
  `syllabidocument` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`syllabiID`, `programID`, `syllabititle_`, `syllabi_img`, `syllabidocument`) VALUES
(2, 1, 'SYLLABI BSIT', 'SYLLABI_BSIT.PNG', 'BSIT SYLLABI.pdf'),
(3, 2, 'syllabi bsa', 'SYLLABI_BSA.PNG', 'BSA SYLLABI.pdf'),
(4, 3, 'SYLLABI BSIE', 'SYLLABI_BSIE.PNG', 'BSIE syllabi.pdf'),
(5, 4, 'SYLLABI BEED', 'SYLLABI_BEED.PNG', 'beed syllabi.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplishment`
--
ALTER TABLE `accomplishment`
  ADD PRIMARY KEY (`accom_id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achieveID`),
  ADD KEY `programID` (`programID`);

--
-- Indexes for table `actprogram`
--
ALTER TABLE `actprogram`
  ADD PRIMARY KEY (`actprogID`),
  ADD KEY `actprogram_ibfk_1` (`programID`);

--
-- Indexes for table `addfile`
--
ALTER TABLE `addfile`
  ADD PRIMARY KEY (`addfileID`),
  ADD KEY `addfile_ibfk_1` (`programID`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `positionID` (`positionID`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumniID`),
  ADD KEY `alumni_ibfk_1` (`programID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `cmo`
--
ALTER TABLE `cmo`
  ADD PRIMARY KEY (`cmoID`),
  ADD KEY `cmo_ibfk_1` (`programID`);

--
-- Indexes for table `exhibit`
--
ALTER TABLE `exhibit`
  ADD PRIMARY KEY (`exhibitID`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityID`);

--
-- Indexes for table `instructional`
--
ALTER TABLE `instructional`
  ADD PRIMARY KEY (`materialID`),
  ADD KEY `porgramID` (`programID`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`labID`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officeID`);

--
-- Indexes for table `parameterlibrary`
--
ALTER TABLE `parameterlibrary`
  ADD PRIMARY KEY (`paralib_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sslibrary`
--
ALTER TABLE `sslibrary`
  ADD PRIMARY KEY (`sslibraryID`);

--
-- Indexes for table `surveyarea`
--
ALTER TABLE `surveyarea`
  ADD PRIMARY KEY (`surveyareaID`),
  ADD KEY `programID` (`programID`),
  ADD KEY `areaID` (`areaID`);

--
-- Indexes for table `surveyparameter`
--
ALTER TABLE `surveyparameter`
  ADD PRIMARY KEY (`surveyparaID`),
  ADD KEY `programID` (`programID`),
  ADD KEY `areaID` (`areaID`);

--
-- Indexes for table `surveyprogram`
--
ALTER TABLE `surveyprogram`
  ADD PRIMARY KEY (`surveyID`),
  ADD KEY `programID` (`programID`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`syllabiID`),
  ADD KEY `programID` (`programID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplishment`
--
ALTER TABLE `accomplishment`
  MODIFY `accom_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `adminID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `adminID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `achieveID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actprogram`
--
ALTER TABLE `actprogram`
  MODIFY `actprogID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `addfile`
--
ALTER TABLE `addfile`
  MODIFY `addfileID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `adminID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumniID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `areaID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cmo`
--
ALTER TABLE `cmo`
  MODIFY `cmoID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exhibit`
--
ALTER TABLE `exhibit`
  MODIFY `exhibitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructional`
--
ALTER TABLE `instructional`
  MODIFY `materialID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `labID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `officeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parameterlibrary`
--
ALTER TABLE `parameterlibrary`
  MODIFY `paralib_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `positionID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sslibrary`
--
ALTER TABLE `sslibrary`
  MODIFY `sslibraryID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surveyarea`
--
ALTER TABLE `surveyarea`
  MODIFY `surveyareaID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `surveyparameter`
--
ALTER TABLE `surveyparameter`
  MODIFY `surveyparaID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `surveyprogram`
--
ALTER TABLE `surveyprogram`
  MODIFY `surveyID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `syllabiID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `programID` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `actprogram`
--
ALTER TABLE `actprogram`
  ADD CONSTRAINT `actprogram_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `addfile`
--
ALTER TABLE `addfile`
  ADD CONSTRAINT `addfile_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `administration`
--
ALTER TABLE `administration`
  ADD CONSTRAINT `positionID` FOREIGN KEY (`positionID`) REFERENCES `position` (`positionID`);

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `cmo`
--
ALTER TABLE `cmo`
  ADD CONSTRAINT `cmo_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `instructional`
--
ALTER TABLE `instructional`
  ADD CONSTRAINT `porgramID` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `surveyarea`
--
ALTER TABLE `surveyarea`
  ADD CONSTRAINT `surveyarea_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `surveyarea_ibfk_2` FOREIGN KEY (`areaID`) REFERENCES `area` (`areaID`);

--
-- Constraints for table `surveyparameter`
--
ALTER TABLE `surveyparameter`
  ADD CONSTRAINT `surveyparameter_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `surveyparameter_ibfk_2` FOREIGN KEY (`areaID`) REFERENCES `area` (`areaID`);

--
-- Constraints for table `surveyprogram`
--
ALTER TABLE `surveyprogram`
  ADD CONSTRAINT `surveyprogram_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD CONSTRAINT `syllabi_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`program_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
