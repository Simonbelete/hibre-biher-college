-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 11:54 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `stud_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`stud_id`, `course_id`, `file_name`) VALUES
('soft_hbc1', 'ena1011', 'soft_hbc1_ena1011_578_Chapter 5 - Clipping.pdf'),
('soft0092_09', 'php', 'soft0092_09_php_mamaru.docx');

-- --------------------------------------------------------

--
-- Stand-in structure for view `batch_semister_course_program_vies`
-- (See below for the actual view)
--
CREATE TABLE `batch_semister_course_program_vies` (
`All_Program` varchar(60)
,`Batch` int(1)
,`Semister` varchar(30)
,`Course_Id` varchar(30)
,`c_name` varchar(30)
,`c_credit` int(30)
,`c_ects` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `comment` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `subject` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `status`, `subject`) VALUES
(35, 'Studens Grade whose Id = soft0092_09  In  software PHD Regular is updated By jj ', 1, 'Student Grade Is Updated'),
(36, 'Studens Grade whose Id = soft0092_09  In  software Bachelor Degree Regular is updated By jj ', 1, 'Student Grade Is Updated'),
(37, 'Studens Grade whose Id = soft0092_09  In  software Bachelor Degree Regular is updated By aa ', 1, 'Student Grade Is Updated'),
(38, 'Studens Grade whose Id = soft0092_09  In  software Bachelor Degree Regular is updated By aa ', 1, 'Student Grade Is Updated'),
(39, 'Studens Grade whose Id = soft0092_09  In  software Bachelor Degree Regular is updated By aa ', 1, 'Student Grade Is Updated'),
(40, 'Studens Grade whose Id = soft0092_09  In  software Bachelor Degree Regular is updated By jj ', 1, 'Student Grade Is Updated'),
(41, 'Studens Grade whose Id = soft_hbc1  In  software PHD Extension is updated By jj ', 1, 'Student Grade Is Updated'),
(42, 'Studens Grade whose Id = soft_hbc1  In  software PHD Extension is updated By soft_dist ', 1, 'Student Grade Is Updated');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `c_credit` int(30) NOT NULL,
  `c_ects` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_credit`, `c_ects`) VALUES
('dat11', 'database', 3, 5),
('db', 'introduction to database', 3, 2),
('dd', 'dddddd', 4, 45),
('eco1', 'econometrics', 3, 4),
('ena1011', 'commiunication', 3, 2),
('health12', 'anatomy', 5, 3),
('hth', 'csharp', 5, 5),
('intel', 'Artificial Intelligence', 3, 5),
('java', 'advanced java', 4, 12),
('php', 'web programming', 3, 5),
('t', 'power', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `course_batch_semister`
--

CREATE TABLE `course_batch_semister` (
  `All_Program` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Batch` int(1) NOT NULL,
  `Semister` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Course_Id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_batch_semister`
--

INSERT INTO `course_batch_semister` (`All_Program`, `Batch`, `Semister`, `Course_Id`) VALUES
('electrical Bachelor Degree Regular', 1, 'First semister', 't'),
('software Bachelor Degree Distance', 1, 'First semister', 'dd'),
('software Bachelor Degree Regular', 2, 'First semister', 'php'),
('software PHD Extension', 1, 'First semister', 'ena1011'),
('software PHD Extension', 5, 'First semister', 'db'),
('software PHD Regular', 1, 'First semister', 'db'),
('software PHD Regular', 1, 'First semister', 'java'),
('software PHD Regular', 2, 'First semister', 'intel');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_Id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Dept_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Dept_Head` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_Id`, `Dept_Name`, `Dept_Head`) VALUES
('11', 'software', 'jj'),
('eco2013', 'economics', '058772'),
('FDGDF', 'FDGRE', 'aa'),
('MANAGMENT', 'MANAGMENT', '1122'),
('one', 'electrical', '4345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `department_course_view`
-- (See below for the actual view)
--
CREATE TABLE `department_course_view` (
`Id` int(11)
,`Dept_Name` varchar(30)
,`c_id` varchar(30)
,`c_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `department_program`
--

CREATE TABLE `department_program` (
  `Id` int(11) UNSIGNED NOT NULL,
  `dept_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Type_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_program`
--

INSERT INTO `department_program` (`Id`, `dept_id`, `program_id`, `Type_id`) VALUES
(17, 'eco2013', '1', 'Distance'),
(19, '11', '1', 'Distance'),
(14, 'one', '2', 'Extension'),
(15, '11', '3', 'Extension'),
(13, 'one', '1', 'Night'),
(10, '11', '1', 'Regular'),
(20, 'one', '1', 'Regular'),
(21, 'eco2013', '1', 'Regular');

-- --------------------------------------------------------

--
-- Stand-in structure for view `department_program_view`
-- (See below for the actual view)
--
CREATE TABLE `department_program_view` (
`Id` int(11) unsigned
,`Dept_Name` varchar(30)
,`program_name` varchar(30)
,`Name` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `department_to_course`
--

CREATE TABLE `department_to_course` (
  `Id` int(11) NOT NULL,
  `course_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_to_course`
--

INSERT INTO `department_to_course` (`Id`, `course_id`, `department_id`) VALUES
(5, 'db', '11'),
(8, 'dd', '11'),
(6, 'eco1', 'eco2013'),
(9, 'ena1011', '11'),
(7, 'intel', '11'),
(1, 'java', '11'),
(3, 'php', '11'),
(2, 't', 'one');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_Id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Field_of_study` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `wereda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kebele` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-Gender` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-zone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-wereda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee-kebele` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `referee_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `referee_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Regi_Year` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_Id`, `password`, `First_Name`, `Last_Name`, `Gender`, `Phone`, `Email`, `Field_of_study`, `Role`, `Region`, `zone`, `wereda`, `kebele`, `referee-fname`, `referee-lname`, `referee-Gender`, `referee-region`, `referee-zone`, `referee-wereda`, `referee-kebele`, `referee_phone`, `referee_email`, `Profile_Image`, `Regi_Year`) VALUES
('009809', '$2y$10$DN8Pu4yFSm2ETP5O0ON0Q.qXxzHyGKlpYRLqjxGOIbiG8AtPo/uRu', 'aleka', 'karati', 'male', '577', 'XYZb@gmail.com', 'managment', 'instructor', 'amhara', 'gojam', 'lumame', 'gree', 'hdgtd', 'fgg', 'male', 'ghjhk', 'rgtrtg', 'gfjghj', 'grt', '5746', 'erte@gmail.com', 'a.jpg', '17/02/2020'),
('058772', '$2y$10$eJbqUWMx1f4Ii8VWSMPjJ.8vUIdV95UYUSkxsEf7R5PqPylpRA7FG', 'abebe', 'alemu', 'male', '0988766765', 'abc@gmail.com', 'economics', 'dean', 'amhara', 'west gojam', 'xyz', 'ugkg', 'hdgtd', 'MAZE', 'male', 'ghjhk', 'rgtrtg', 'gfjghj', 'legga', '0909887887', 'erte@gmail.com', 'More.png', '20/03/2020'),
('1122', '$2y$10$B1ZjcjBEUi3FuAJbKUWOO.F2S6o17MsBGLRlZ9O.NVSkZ46tT1S8O', 'mazengia', 'tesfa', 'male', '0909090909', 'abcd@gmail.com', 'Accounting', 'accountant', 'Amhara', 'east go-jam', 'Awebel', 'lega', 'ertert', 'fret', 'male', 'rtert', 'retet', 'rteyre', 'rtert', '0988888888', 'xyz@gmail.com', 'photo_2020-03-19_06-29-21.jpg', '23/03/2020'),
('4345', '$2y$10$CSDswcnfiFvYXlt373DemeI9hAsJYpnUFKTuPcCI8waGe2Ll3E2mS', 'maze', 'karati', 'male', '8568756', 'hgngh@gmail.com', 'computer science', 'head', 'amhara', 'gojam', 'lumame', 'gree', 'hdgtd', 'fgg', 'male', 'ghjhk', 'rgtrtg', 'gfjghj', 'grt', '89797', 'erte@gmail.com', 'e.jpg', '18/02/2020'),
('aa', '$2y$10$J/7LOEhptduwMaiWoNc6BuyVD.FBG3EvrQiSAeCstbjrEbOefyMu6', 'gonder', 'gojam', 'male', '5675', 'kkl@gmail.com', 'software', 'instructor', 'amhara', 'gojam', 'kiyu', 'yity', 'hdgtd', 'fgg', 'male', 'ghjhk', 'rgtrtg', 'gfjghj', 'grt', '67878', 'erte@gmail.com', 'WIN_20200121_21_15_06_Pro.jpg', '19/02/2020'),
('jj', '$2y$10$b.TPKSYZK8NtexqxJ7jCoOkOGQAptssiZmTcPYQBs.v74Mazairyy', 'demelashe', 'karati', 'male', '464', 'nn@gmail.com', 'HJGIH', 'admin', 'amhara', 'gojam', 'lumame', 'gree', 'hdgtd', 'fgg', 'male', 'ghjhk', 'rgtrtg', 'gfjghj', 'grt', '34534', 'erte@gmail.com', 'e.jpg', '18/02/2020'),
('soft_dist', '$2y$10$SHRMFtabuCh0pt5U/KF.be3JBqYKObwZqTv0cNBpEmHy9VnKRuyGC', 'jo', 'giug', 'male', '0909090909', 'kugkgki@gmail.com', 'software', 'instructor', 'yjfjyf', 'fyjyfj', 'jfjfjh', 'jhgjf', 'fhhjfj', 'jfhhjfjh', 'male', 'fhjfjhfhj', 'jhfhjfj', 'gjgjg', 'jhgkjg', '0988888888', '', 'WIN_20200924_02_29_44_Pro.jpg', '25/09/2020');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `number` int(11) NOT NULL,
  `course_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`number`, `course_id`, `file_name`) VALUES
(16, 'php', 'php_artisan.pdf'),
(17, 't', 't_My New App.accdb'),
(18, 'ena1011', 'ena1011_gem.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scale`
--

CREATE TABLE `grade_scale` (
  `Id` int(11) NOT NULL,
  `minimum` float NOT NULL,
  `maximum` float NOT NULL,
  `letter` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_scale`
--

INSERT INTO `grade_scale` (`Id`, `minimum`, `maximum`, `letter`) VALUES
(1, 90, 100, 'A+'),
(2, 81, 89.9, 'A'),
(3, 80, 84.9, 'A-'),
(4, 75, 79.9, 'B+'),
(5, 70, 74.9, 'B'),
(6, 65, 69.9, 'B-'),
(7, 60, 64.9, 'C+'),
(8, 50, 59.9, 'C'),
(9, 45, 49.9, 'C-'),
(10, 40, 44.9, 'D'),
(11, 30, 39.9, 'FX'),
(12, 0, 29.9, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_cours`
--

CREATE TABLE `lecture_cours` (
  `Id` int(100) NOT NULL,
  `Lecture_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Section` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecture_cours`
--

INSERT INTO `lecture_cours` (`Id`, `Lecture_id`, `course_id`, `Section`) VALUES
(1, '009809', 't', 'A'),
(3, '058772', 'java', 'B'),
(4, '058772', 'java', 'E'),
(5, '4345', 'intel', 'B'),
(6, 'aa', 'php', 'A'),
(7, 'aa', 't', 'A'),
(8, 'jj', 'java', 'A'),
(9, 'soft_dist', 'dd', 'A'),
(11, 'soft_dist', 'ena1011', 'A'),
(10, 'soft_dist', 'ena1011', 'B'),
(2, 'soft_dist', 'java', 'A');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lecture_cours_view`
-- (See below for the actual view)
--
CREATE TABLE `lecture_cours_view` (
`Employee_Id` varchar(30)
,`First_Name` varchar(30)
,`Last_Name` varchar(30)
,`Field_of_study` varchar(30)
,`Role` varchar(30)
,`course_id` varchar(30)
,`Section` varchar(1)
,`c_name` varchar(30)
,`All_Program` varchar(60)
,`Batch` int(1)
,`Semister` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `Designation` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Signature` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Designation`, `Signature`, `subject`, `Description`, `Date`) VALUES
('manager', 'Maze', '124ኛው የዓድዋ ድል', 'You can use the Bootstrap navbar component to create responsive navigation header for your website or application. These responsive navbar initially collapsed on devices having small viewports like cell-phones but expand when user click the toggle button. However, it will be horizontal as normal on the medium and large devices like laptop or desktop.\r\n\r\nYou can also create different variations of the navbar such as navbars with dropdown menus and search boxes as well as fixed positioned navbar with much less effort. The following example will show you how to create a simple static navbar with navigation links.', '2020-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `No` int(30) NOT NULL,
  `stud_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_of_edu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `semister` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `program_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`) VALUES
('1', 'Bachelor Degree'),
('2', 'Master Degree'),
('3', 'PHD'),
('4', 'Level One'),
('5', 'Level Two'),
('6', 'Level Three'),
('7', 'Level Four');

-- --------------------------------------------------------

--
-- Table structure for table `resettable`
--

CREATE TABLE `resettable` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resettable`
--

INSERT INTO `resettable` (`id`, `code`, `email`) VALUES
(29, '15e77c103c6942', 'mz.tesfa@gmail.com'),
(30, '15e77c11268a81', 'mz.tesfa@gmail.com'),
(31, '15e77c132d8ebe', 'demelash1452@gmail.com'),
(33, '15e77c7ddc030e', 'mz.tesfa@gmail.com'),
(34, '15e77c90e9afc8', 'mz.tesfa@gmail.com'),
(35, '15e77c98c04e45', 'mz.tesfa@gmail.com'),
(36, '15e77c9d60eac5', 'mz.tesfa@gmail.com'),
(37, '15e77ca09bf44f', 'mz.tesfa@gmail.com'),
(38, '15e77cd3fdcefb', 'mz.tesfa@gmail.com'),
(40, '15e77cedd62c0c', 'mz.tesfa@gmail.com'),
(41, '15e77cf3cb537c', 'mz.tesfa@gmail.com'),
(42, '15e77cf552a145', 'mz.tesfa@gmail.com'),
(43, '15e77cf8e2f261', 'mz.tesfa@gmail.com'),
(44, '15e77cfd149a21', 'mz.tesfa@gmail.com'),
(45, '15e77cfdfe1e69', 'mz.tesfa@gmail.com'),
(46, '15e77d07af2457', 'mz.tesfa@gmail.com'),
(47, '15e77d0a3be29e', 'mz.tesfa@gmail.com'),
(48, '15e77d0bfc7e0d', 'mz.tesfa@gmail.com'),
(49, '15e77d0e9b2e20', 'mz.tesfa@gmail.com'),
(50, '15e77d15ddf6d8', 'mz.tesfa@gmail.com'),
(53, '15e7912ed2e593', 'mz.tesfa@gmail.com'),
(54, '15e79144ae5e35', 'mz.tesfa@gmail.com'),
(59, '15e791ec8406e6', 'mz.tesfa@gmail.com'),
(60, '15efe49acbd103', 'mz.tesfa@gmail.com'),
(61, '15efe49b7b1606', 'mz.tesfa@gmail.com'),
(62, '15efe49f679c0e', 'mz.tesfa@gmail.com'),
(63, '15efe4bc833174', 'mz.tesfa@gmail.com'),
(64, '15efe4d1b02122', 'mz.tesfa@gmail.com'),
(65, '15efe548a65b4a', 'mz.tesfa@gmail.com'),
(66, '15efe557d10fca', 'mz.tesfa@gmail.com'),
(67, '15efb1f745e2d8', 'mz.tesfa@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_batch_dept_pro_view`
-- (See below for the actual view)
--
CREATE TABLE `student_batch_dept_pro_view` (
`First_Name` varchar(30)
,`Last_Name` varchar(30)
,`Grand_Father_Name` varchar(30)
,`gender` varchar(7)
,`Status` varchar(30)
,`program` varchar(80)
,`Section` varchar(30)
,`Student_id` varchar(30)
,`Batch` int(1)
,`First_Semister` varchar(20)
,`Second_Semister` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `All_Program` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Batch` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Semister` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Course_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mid` float UNSIGNED DEFAULT NULL,
  `quize` float UNSIGNED DEFAULT NULL,
  `assignment` float UNSIGNED DEFAULT NULL,
  `final` float UNSIGNED DEFAULT NULL,
  `total` float UNSIGNED DEFAULT NULL,
  `letter_grade` varchar(2) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `All_Program`, `Batch`, `Semister`, `Course_id`, `mid`, `quize`, `assignment`, `final`, `total`, `letter_grade`) VALUES
('soft_hbc1', 'software PHD Extension', '1', 'First semister', 'ena1011', 20, 5, 11, 20, 56, 'C'),
('soft0092_09', 'software Bachelor Degree Regular', '2', 'First semister', 'php', 8, 8, 8, 8, 32, 'FX'),
('soft0092_09', 'software PHD Regular', '1', 'First semister', 'db', 4.3, 20.2, 5.5, 55.5, 85.5, 'A'),
('soft0092_09', 'software PHD Regular', '2', 'First semister', 'intel', 4, 44, 44, 1, 93, 'A+');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_course_view`
-- (See below for the actual view)
--
CREATE TABLE `student_course_view` (
`Student_id` varchar(30)
,`All_Program` varchar(60)
,`Batch` varchar(30)
,`Section` varchar(30)
,`Semister` varchar(30)
,`Course_Id` varchar(30)
,`mid` float unsigned
,`quize` float unsigned
,`assignment` float unsigned
,`final` float unsigned
,`total` float unsigned
,`letter_grade` varchar(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollment`
--

CREATE TABLE `student_enrollment` (
  `Registration_Id` int(30) NOT NULL,
  `Student_Id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Section` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Dept_Program` int(11) NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_enrollment`
--

INSERT INTO `student_enrollment` (`Registration_Id`, `Student_Id`, `Section`, `Dept_Program`, `password`) VALUES
(4, 'soft0091_09', 'A', 10, '$2y$10$8KzrygDPvtHjp5J2okGVkeM3VLJajE/9v5d2ulHdVT00bPgTepxDe'),
(5, 'soft0092_09', 'A', 15, '$2y$10$R8XmmJk5Jxj/UxbDnrsEiuTLcj71iAlX2lKhI2rr3JgNA3aQQE6eu'),
(6, 'soft0093_09', 'A', 10, '$2y$10$/lL16gmvazRtVcGcrpXM6uCJ7MN7plx6hGWtAkus4zdh.V07QoyFu'),
(7, 'soft0094_09', 'A', 15, '$2y$10$SrmlsCaBGnP3TB6szFtgIuqpwSLcNFpKwbfybA3lYnWvFYk/p4hbS'),
(8, 'elect0091_09', 'A', 13, '$2y$10$py1QDxAtUV4Sm2SkSYNHNOmkrtre1LxRtb.5nIktzAykYUo4cGmZS'),
(11, 'c0091_09', 'A', 16, '$2y$10$aHTfrEApucUDav.K7IYCoO1rTxjLQXX9ex9sNAiDRNUXP8KEdb1Oy'),
(13, 'eco1452', 'A', 17, '$2y$10$S51DMnQh7Hc0oTMyJmQTZ.xl9myJ6opXJf6TCEguTobCyy7MInuVG'),
(21, 'hbc01', 'A', 21, '$2y$10$F8NikZTYwME40M1R..XDCuHPEhY4oajHeC0fOPYnohYErn5jaAaBm'),
(90, 'soft_hbc1', 'A', 15, '$2y$10$81iGp18DOa03NMq0DS3W1./Lc/lDBoo7saWknfy.Wr8i2EtcA6VOO'),
(91, 'eeee', 'A', 17, '$2y$10$uMlcX6yCjHA1MK8g/eHJG.knP56uhATUdc0B3ZhiT6iOpyiUb68GK'),
(93, 'rrr', 'A', 17, '$2y$10$zscIe5mnX2us5JzbbTtJseN4o.2UOjd6nli9lARkZsVCUqbfUqtdC'),
(1452, 'soft1452', 'A', 15, '$2y$10$tp0n3Dax1/mEeQocbq/KEer43yZNRc4gchrYxgu6IEplAJPODq096');

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollment_semister`
--

CREATE TABLE `student_enrollment_semister` (
  `semister_enrol_id` int(11) NOT NULL,
  `Student_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Batch` int(1) NOT NULL,
  `Section` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `First_Semister` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Disable',
  `Second_Semister` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_enrollment_semister`
--

INSERT INTO `student_enrollment_semister` (`semister_enrol_id`, `Student_id`, `Batch`, `Section`, `First_Semister`, `Second_Semister`) VALUES
(10, 'soft0091_09', 1, 'B', 'Registered', 'Incomplete'),
(11, 'soft0092_09', 1, 'A', 'Complete', 'Complete'),
(12, 'soft0093_09', 1, 'A', 'Complete', 'Incomplete'),
(13, 'soft0094_09', 1, 'A', 'Complete', 'Incomplete'),
(14, 'soft0092_09', 2, 'A', 'Registered', 'Not Registered'),
(15, 'elect0091_09', 1, 'A', 'Complete', 'Incomplete'),
(16, 'c0091_09', 1, 'A', 'Registered', 'Incomplete'),
(18, 'eco1452', 1, 'A', 'Registered', 'Not Registered'),
(19, 'hbc01', 1, 'A', 'Registered', 'Complete'),
(20, 'hbc01', 2, 'A', 'Complete', 'Not Registered'),
(21, 'soft1452', 1, 'A', 'Registered', 'Not Registered'),
(22, 'soft_hbc1', 1, 'A', 'Registered', 'Not Registered'),
(23, 'eeee', 1, 'A', 'Registered', 'Not Registered'),
(24, 'rrr', 1, 'A', 'Registered', 'Not Registered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`, `Description`) VALUES
(3, 'logo.jpg', 'Our Collages Logo'),
(4, 'five.jpg', 'students in class'),
(5, 'four.jpg', 'students in exam'),
(6, 'one.jpg', 'students on library'),
(7, 'three.jpg', 'session on our collages'),
(8, 'two.jpg', 'fbdudoho'),
(10, 'hbcblock.jpg', 'collages image'),
(11, 'h.jpg', 'trgherg'),
(12, 'd.jpg', 'trhre'),
(13, 'i.jpg', 'regegherh'),
(14, 'img.jpg', 'haerghe'),
(15, 'WIN_20200921_23_54_35_Pro.jpg', 'developers');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `End_time` varchar(60) NOT NULL,
  `No` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`End_time`, `No`) VALUES
('2020-09-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

CREATE TABLE `tuition` (
  `Id` int(11) NOT NULL,
  `Batch` int(11) NOT NULL,
  `Semister` int(11) NOT NULL,
  `Field_of_education` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Credit_hr` int(11) NOT NULL,
  `payment_per_Credit_hr` float NOT NULL,
  `Total_Credit_hr_payment` float NOT NULL,
  `To_register` float NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuition`
--

INSERT INTO `tuition` (`Id`, `Batch`, `Semister`, `Field_of_education`, `Credit_hr`, `payment_per_Credit_hr`, `Total_Credit_hr_payment`, `To_register`, `Total`) VALUES
(1, 1, 1, 'economics', 1, 60, 60, 20, 80),
(2, 1, 2, 'economics', 10, 70, 700, 0, 700),
(3, 4, 2, 'managment', 3, 80, 240, 0, 240),
(4, 1, 1, 'software Bachelor Degree Regular', 2, 40, 80, 6, 86);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Name`) VALUES
('Distance'),
('Extension'),
('Night'),
('Regular');

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

CREATE TABLE `user_student` (
  `Registration_Id` int(30) NOT NULL,
  `First_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Grand_Father_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `Birth_Date` date NOT NULL,
  `Email_Address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Zone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Wereda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Kebele` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `School_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parene_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_zone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_wereda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_kebele` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Parent_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Regi_Year` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Batch` int(1) DEFAULT NULL,
  `Profile_Image` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'In Active',
  `program` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Section` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`Registration_Id`, `First_Name`, `Last_Name`, `Grand_Father_Name`, `gender`, `Birth_Date`, `Email_Address`, `Phone`, `Region`, `Zone`, `Wereda`, `Kebele`, `School_Name`, `Parent_fname`, `Parene_lname`, `Parent_region`, `Parent_zone`, `Parent_wereda`, `Parent_kebele`, `Parent_email`, `Parent_phone`, `Regi_Year`, `Batch`, `Profile_Image`, `Status`, `program`, `Section`) VALUES
(4, 'mazengia', 'tesfa', 'Gella', 'male', '2020-01-18', 'mz.tes@gmail.com', '948707227', 'Amhara', 'east/go-jam', 'Awebel', 'lega', 'lumame', 'Ban', 'Demamu', 'amhara', 'east/gojam', 'awebel', 'lega', 'aa@gmail.com', '0966436546', '2020-01-14', 1, 'e.jpg', 'Active', 'software Bachelor Degree Regular', 'A'),
(5, 'aleka', 'bzu', 'gemechu', 'male', '2020-01-29', 'mztesfa@gmail.com', '948704455', 'Amhara', 'east/go-jam', 'Awebel', 'lega', 'lumame', 'Ban', 'Demamu', 'amhara', 'east/gojam', 'awebel', 'lega', 'aa@gmail.com', '0909787687', '2019-12-30', 1, 'd.jpg', 'Active', 'software Bachelor Degree Regular', 'A'),
(6, 'mazengia', 'tesfa', 'Gella', 'male', '2020-01-23', 'tesfa@gmail.com', '0948707227', 'Amhara', 'east go-jam', 'Awebel', 'lega', 'lumame', 'Ban', 'Demamu', 'amhara', 'east/gojam', 'awebel', 'lega', 'aa@gmail.com', '0934564622', '2020-01-01', 1, 'hfc.jpg', 'Active', 'software Bachelor Degree Distance', 'A'),
(7, 'aleka', 'karati', 'rgres', 'male', '2020-02-07', 'hg@gmail.com', '0977868899', 'amhara', 'gojam', 'lumame', 'yity', 'ght', 'gbhdfgh', 'ghgfh', 'gfhgfh', 'dvhfg', 'ghgfh', 'fghgh', 'gg@gmail.com', '0998868758', '0000-00-00', 1, 'b.jpg', 'Active', 'software PHD Extension', 'A'),
(8, 'aleka', 'karati', 'rgres', 'male', '2020-02-13', 'hgng@gmail.com', '0911223479', 'amhara', 'gojam', 'lumame', 'gree', 'ght', 'gbhdfgh', 'ghgfh', 'gfhgfh', 'dvhfg', 'ghgfh', 'fghgh', 'gg@gmail.com', '0910109989', '0000-00-00', 1, 'a.jpg', 'Active', 'electrical Bachelor Degree Regular', 'A'),
(11, 'welega', 'buktar', 'rgres', 'male', '2020-02-21', 'hgn@gmail.com', '0923555546', 'amhara', 'gojam', 'lumame', 'gree', 'ght', 'gbhdfgh', 'ghgfh', 'gfhgfh', 'dvhfg', 'ghgfh', 'fghgh', 'gg@gmail.com', '0990034534', '02/19/2020', 1, 'img.jpg', 'Active', 'economics Bachelor Degree Distance', 'B'),
(13, 'aleka', 'karati', 'rgres', 'male', '2020-03-19', 'hgngh@gmail.com', '0948707227', 'amhara', 'gojam', 'lumame', 'gree', 'lumame', 'gbhdfgh', 'ghgfh', 'gfhgfh', 'dvhfg', 'ghgfh', 'jdkhfk', 'xyz@gmail.com', '0989999999', '03/21/2020', 1, 'aa.jpg', 'Active', 'economics Bachelor Degree Regular', 'A'),
(21, 'yohanis', 'ghh', 'chcghgc', 'male', '2020-09-08', 'maze@gmail.com', '0948707227', 'east gojam', 'awebel', 'gfhdfgd', 'dgdgdfg', 'dfgdfgdf', 'GHHTH', 'GFJGFJUF', 'FUGJ', 'JGJHGJ', 'GFYGF', 'HJFJFHJ', 'DFGERgg@gmail.com', '0920202020', '09/25/2020', 1, 'WIN_20200121_21_19_39_Pro.jpg', 'Active', 'economics Bachelor Degree Regular', 'A'),
(90, 'gech', 'bfiud', 'kjkiewbgf', 'male', '2020-09-23', 'xyzxyz@gmail.com', '988888888', 'trkjh', 'rjghekjh', 'kjhkjl', 'hoo', '[ip[', 'iuwfiuqw', 'dsuhfiuew', 'duhfiewufh', 'iuhyierohf', 'iuefhyewiu', 'dufiue', '', '909090909', '09/25/2020', 1, 'WIN_20200909_02_35_57_Pro.jpg', 'Active', 'software PHD Extension', 'A'),
(91, 'dfshj', 'jfjwfj', 'fjwdfj', 'male', '2020-09-24', 'fdgdeef@gmail.com', '910101010', 'sdmgj', 'ghjdgjg', 'jgjhfj', 'fhjfjf', 'jfhjhfhj', 'skjdvhdskjh', 'kjlfhklw', 'ihloehf', 'ldilsjvldh', 'lkdsjfls', 'ldkjlds', '', '930303030', '09/25/2020', 1, 'WIN_20200115_02_03_35_Pro-dpre', 'Active', 'economics Bachelor Degree Distance', 'A'),
(93, 'dfkgjkl', 'sjdfslkj', 'jekfks', 'male', '2020-08-31', 'gdgtgf@gmail.com', '988888888', 'dfdsjg', 'hgsdhh', 'ghhdfj', 'jhgdsjhyh', 'hjdvjh', 'dshjdbjs', 'ghcgjh', 'hjsadgcbjas', 'ghdsch', 'gjscas', 'gsdhgas', 'ss@gmail.com', '966666666', '09/25/2020', 1, '12901244_836876956417395_60571', 'Active', 'economics Bachelor Degree Distance', 'A'),
(1452, 'demi', 'fff', 'fffdWEeeeeeeeee', 'male', '2020-09-26', 'hh@gmail.com', '939706469', 'fef', 'ggh', 'hg', 'hghhhhhhhh', 'hhhhhhh', 'sdsd', 'dccd', 'add', 'dd', 'ddd', 'ddd', 'dd@gmail.com', '929454587', '09/25/2020', 1, 'IMG_20190720_165837.jpg', 'Active', 'software Bachelor Degree Distance', 'B');

-- --------------------------------------------------------

--
-- Structure for view `batch_semister_course_program_vies`
--
DROP TABLE IF EXISTS `batch_semister_course_program_vies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `batch_semister_course_program_vies`  AS  select `t1`.`All_Program` AS `All_Program`,`t1`.`Batch` AS `Batch`,`t1`.`Semister` AS `Semister`,`t1`.`Course_Id` AS `Course_Id`,`t2`.`c_name` AS `c_name`,`t2`.`c_credit` AS `c_credit`,`t2`.`c_ects` AS `c_ects` from (`course_batch_semister` `t1` left join `course` `t2` on(`t1`.`Course_Id` = `t2`.`c_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `department_course_view`
--
DROP TABLE IF EXISTS `department_course_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `department_course_view`  AS  select `t1`.`Id` AS `Id`,`t2`.`Dept_Name` AS `Dept_Name`,`t3`.`c_id` AS `c_id`,`t3`.`c_name` AS `c_name` from ((`department_to_course` `t1` left join `department` `t2` on(`t1`.`department_id` = `t2`.`Dept_Id`)) left join `course` `t3` on(`t1`.`course_id` = `t3`.`c_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `department_program_view`
--
DROP TABLE IF EXISTS `department_program_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `department_program_view`  AS  select `t1`.`Id` AS `Id`,`t2`.`Dept_Name` AS `Dept_Name`,`t3`.`program_name` AS `program_name`,`t4`.`Name` AS `Name` from (((`department_program` `t1` left join `department` `t2` on(`t1`.`dept_id` = `t2`.`Dept_Id`)) left join `program` `t3` on(`t1`.`program_id` = `t3`.`program_id`)) left join `type` `t4` on(`t1`.`Type_id` = `t4`.`Name`)) ;

-- --------------------------------------------------------

--
-- Structure for view `lecture_cours_view`
--
DROP TABLE IF EXISTS `lecture_cours_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lecture_cours_view`  AS  select `t1`.`Employee_Id` AS `Employee_Id`,`t1`.`First_Name` AS `First_Name`,`t1`.`Last_Name` AS `Last_Name`,`t1`.`Field_of_study` AS `Field_of_study`,`t1`.`Role` AS `Role`,`t3`.`course_id` AS `course_id`,`t3`.`Section` AS `Section`,`t4`.`c_name` AS `c_name`,`t2`.`All_Program` AS `All_Program`,`t2`.`Batch` AS `Batch`,`t2`.`Semister` AS `Semister` from (((`employee` `t1` left join `lecture_cours` `t3` on(`t1`.`Employee_Id` = `t3`.`Lecture_id`)) left join `course` `t4` on(`t4`.`c_id` = `t3`.`course_id`)) left join `course_batch_semister` `t2` on(`t2`.`Course_Id` = `t3`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_batch_dept_pro_view`
--
DROP TABLE IF EXISTS `student_batch_dept_pro_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_batch_dept_pro_view`  AS  select `t1`.`First_Name` AS `First_Name`,`t1`.`Last_Name` AS `Last_Name`,`t1`.`Grand_Father_Name` AS `Grand_Father_Name`,`t1`.`gender` AS `gender`,`t1`.`Status` AS `Status`,`t1`.`program` AS `program`,`t2`.`Section` AS `Section`,`t3`.`Student_Id` AS `Student_id`,`t2`.`Batch` AS `Batch`,`t2`.`First_Semister` AS `First_Semister`,`t2`.`Second_Semister` AS `Second_Semister` from ((`user_student` `t1` left join `student_enrollment` `t3` on(`t1`.`Registration_Id` = `t3`.`Registration_Id`)) left join `student_enrollment_semister` `t2` on(`t2`.`Student_id` = `t3`.`Student_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_course_view`
--
DROP TABLE IF EXISTS `student_course_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_course_view`  AS  select distinct `t2`.`Student_id` AS `Student_id`,`t1`.`All_Program` AS `All_Program`,`t1`.`Batch` AS `Batch`,`t2`.`Section` AS `Section`,`t1`.`Semister` AS `Semister`,`t3`.`Course_Id` AS `Course_Id`,`t1`.`mid` AS `mid`,`t1`.`quize` AS `quize`,`t1`.`assignment` AS `assignment`,`t1`.`final` AS `final`,`t1`.`total` AS `total`,`t1`.`letter_grade` AS `letter_grade` from ((`student_course` `t1` left join `student_enrollment_semister` `t2` on(`t1`.`student_id` = `t2`.`Student_id`)) left join `course_batch_semister` `t3` on(`t1`.`Course_id` = `t3`.`Course_Id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD UNIQUE KEY `stud_id` (`stud_id`,`course_id`,`file_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_batch_semister`
--
ALTER TABLE `course_batch_semister`
  ADD UNIQUE KEY `All_Program` (`All_Program`,`Batch`,`Semister`,`Course_Id`),
  ADD KEY `course_batch_semister_ibfk_1` (`Course_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_Id`),
  ADD KEY `Dept_Head` (`Dept_Head`);

--
-- Indexes for table `department_program`
--
ALTER TABLE `department_program`
  ADD PRIMARY KEY (`Id`,`dept_id`,`program_id`),
  ADD KEY `dept_id` (`dept_id`,`program_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `Type_id` (`Type_id`);

--
-- Indexes for table `department_to_course`
--
ALTER TABLE `department_to_course`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `c_id` (`course_id`,`department_id`),
  ADD KEY `lecture_id` (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`number`,`course_id`,`file_name`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `grade_scale`
--
ALTER TABLE `grade_scale`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lecture_cours`
--
ALTER TABLE `lecture_cours`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Lecture_id` (`Lecture_id`,`course_id`,`Section`),
  ADD KEY `l_c_c` (`course_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`subject`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `stud_id` (`stud_id`,`field_of_edu`,`batch`,`semister`,`month`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `resettable`
--
ALTER TABLE `resettable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`All_Program`,`Batch`,`Semister`,`Course_id`),
  ADD KEY `semister_enrol_id` (`student_id`),
  ADD KEY `c_id` (`Course_id`);

--
-- Indexes for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
  ADD PRIMARY KEY (`Registration_Id`,`Dept_Program`,`Student_Id`),
  ADD KEY `Registration_Id` (`Registration_Id`,`Dept_Program`),
  ADD KEY `Student_Id` (`Student_Id`),
  ADD KEY `Dept_Program` (`Dept_Program`);

--
-- Indexes for table `student_enrollment_semister`
--
ALTER TABLE `student_enrollment_semister`
  ADD PRIMARY KEY (`semister_enrol_id`,`Student_id`,`Batch`,`First_Semister`,`Second_Semister`),
  ADD UNIQUE KEY `semister_enrol_id` (`semister_enrol_id`,`Student_id`,`Batch`,`Section`,`First_Semister`,`Second_Semister`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition`
--
ALTER TABLE `tuition`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `user_student`
--
ALTER TABLE `user_student`
  ADD PRIMARY KEY (`Registration_Id`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`),
  ADD KEY `Student_Id` (`Registration_Id`),
  ADD KEY `Section` (`Section`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `department_program`
--
ALTER TABLE `department_program`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department_to_course`
--
ALTER TABLE `department_to_course`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grade_scale`
--
ALTER TABLE `grade_scale`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecture_cours`
--
ALTER TABLE `lecture_cours`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `No` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resettable`
--
ALTER TABLE `resettable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `student_enrollment_semister`
--
ALTER TABLE `student_enrollment_semister`
  MODIFY `semister_enrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tuition`
--
ALTER TABLE `tuition`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_student`
--
ALTER TABLE `user_student`
  MODIFY `Registration_Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1453;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_batch_semister`
--
ALTER TABLE `course_batch_semister`
  ADD CONSTRAINT `course_batch_semister_ibfk_1` FOREIGN KEY (`Course_Id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`Dept_Head`) REFERENCES `employee` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_program`
--
ALTER TABLE `department_program`
  ADD CONSTRAINT `department_program_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`Dept_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_program_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_program_ibfk_3` FOREIGN KEY (`Type_id`) REFERENCES `type` (`Name`);

--
-- Constraints for table `department_to_course`
--
ALTER TABLE `department_to_course`
  ADD CONSTRAINT `department_to_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_to_course_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`Dept_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_batch_semister` (`Course_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture_cours`
--
ALTER TABLE `lecture_cours`
  ADD CONSTRAINT `l_c_c` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_c_emp` FOREIGN KEY (`Lecture_id`) REFERENCES `employee` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `course_batch_semister` (`Course_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_enrollment_semister` (`Student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
  ADD CONSTRAINT `student_enrollment_ibfk_2` FOREIGN KEY (`Registration_Id`) REFERENCES `user_student` (`Registration_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_enrollment_semister`
--
ALTER TABLE `student_enrollment_semister`
  ADD CONSTRAINT `student_enrollment_semister_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student_enrollment` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
