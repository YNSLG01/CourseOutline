-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 03:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satit`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_page`
--

CREATE TABLE `api_page` (
  `id` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_page`
--

INSERT INTO `api_page` (`id`, `file_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'select_semester.php', NULL, NULL, NULL, '2023-09-24 07:14:52'),
(2, 'select_class.php', NULL, NULL, NULL, '2023-09-25 17:21:39'),
(3, 'select_department.php', NULL, NULL, NULL, '2023-09-25 17:22:43'),
(4, 'select_subjects.php', NULL, NULL, NULL, '2023-09-25 17:23:46'),
(5, 'select_science.php', NULL, NULL, '2023-10-13 12:00:02', '2023-10-13 11:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class` varchar(512) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'ม.1', NULL, NULL, NULL, '2023-09-24 06:15:31'),
(2, 'ม.2', NULL, NULL, NULL, '2023-09-24 06:15:36'),
(3, 'ม.3', NULL, NULL, NULL, '2023-09-24 06:15:40'),
(4, 'ม.4', NULL, NULL, NULL, '2023-09-24 06:15:43'),
(5, 'ม.5', NULL, NULL, NULL, '2023-09-24 06:15:46'),
(6, 'ม.6', NULL, NULL, NULL, '2023-09-24 06:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `coursecode`
--

CREATE TABLE `coursecode` (
  `course_id` int(5) NOT NULL,
  `code_id` varchar(6) NOT NULL,
  `subject_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursecode`
--

INSERT INTO `coursecode` (`course_id`, `code_id`, `subject_id`) VALUES
(1, 'ว21101', 1),
(2, 'ว21102', 1),
(3, 'ว21103', 1),
(4, 'ว21104', 1),
(5, 'ว21111', 2),
(6, 'ว21112', 2),
(7, 'อ21101', 3),
(8, 'อ21102', 3),
(9, 'อ21103', 3),
(10, 'จ21101', 4),
(11, 'จ21102', 4),
(12, 'ท21101', 5),
(13, 'ท21102', 5),
(14, 'ค21101', 6),
(15, 'ค21102', 6),
(16, 'ส21101', 7),
(17, 'ส21102', 7),
(18, 'ด21101', 8),
(19, 'ศ21101', 9),
(20, 'ง21101', 10),
(21, 'พ21101', 11),
(22, 'น21101', 12);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `d_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'วิทยาศาสตร์และเทคโนโลยี', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(2, 'ภาษาต่างประเทศ', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(3, 'ภาษาไทย', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(4, 'คณิตศาสตร์', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(5, 'สังคมศึกษา ศาสนาและวัฒนธรรม', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(6, 'สุนทรียภาพและทักษะชีวิต', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(7, 'พัฒนาผู้เรียน (งานแนะแนว)', NULL, NULL, NULL, '2023-09-24 06:23:25'),
(10, 'อังกฤษ', NULL, NULL, '2023-10-02 22:15:04', '2023-09-27 07:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `foreign`
--

CREATE TABLE `foreign` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foreign`
--

INSERT INTO `foreign` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'อ31101', 'ภาษาอังกฤษ 1', 2, '', NULL, NULL, NULL, '2023-10-07 15:46:59'),
(2, 4, 'อ31201', 'ภาษาอังกฤษเพื่อการสื่อสาร 1', 2, '', NULL, NULL, NULL, '2023-10-07 15:47:52'),
(3, 4, 'จ31201', 'ภาษาจีน 1', 2, '', NULL, NULL, NULL, '2023-10-07 15:48:35'),
(4, 5, 'จ32101', 'ภาษาอังกฤษ 3', 2, '', NULL, NULL, NULL, '2023-10-07 15:49:43'),
(5, 5, 'อ32201', 'ภาษาอังกฤษเพื่อการสื่อสาร 3', 2, '', NULL, NULL, NULL, '2023-10-07 15:51:35'),
(6, 5, 'อ32203', 'ภาษาอังกฤษในชีวิตประจำวัน ', 2, '', NULL, NULL, NULL, '2023-10-07 15:53:06'),
(7, 5, 'จ32201', 'ภาษาจีน 3', 2, '', NULL, NULL, NULL, '2023-10-07 15:53:47'),
(8, 6, 'อ33101', 'ภาษาอังกฤษ 5', 2, '', NULL, NULL, NULL, '2023-10-07 15:55:02'),
(9, 6, 'อ33201', 'ภาษาอังกฤษเพื่อการสื่อสาร 5', 2, '', NULL, NULL, NULL, '2023-10-07 15:56:15'),
(10, 6, 'จ33201', 'ภาษาจีน 5', 2, '', NULL, NULL, NULL, '2023-10-07 15:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `guidance`
--

CREATE TABLE `guidance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidance`
--

INSERT INTO `guidance` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, '', 'แนะแนว', 7, '', NULL, NULL, NULL, '2023-10-10 14:20:56'),
(2, 5, '', 'แนะแนว', 7, '', NULL, NULL, NULL, '2023-10-10 14:21:11'),
(3, 6, '', 'แนะแนว', 7, '', NULL, NULL, NULL, '2023-10-10 14:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maths`
--

INSERT INTO `maths` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'ค31101', 'คณิตศาสตร์ 1', 4, '', NULL, NULL, NULL, '2023-10-07 16:11:36'),
(2, 4, 'ค31201', 'คณิตศาสตร์เพิ่มเติม 1', 4, '', NULL, NULL, NULL, '2023-10-07 16:12:14'),
(3, 5, 'ค32101', 'คณิตศาสตร์ 3', 4, '', NULL, NULL, NULL, '2023-10-07 16:13:21'),
(4, 5, 'ค32201', 'คณิตศาสตร์เพิ่มเติม 3', 4, '', NULL, NULL, NULL, '2023-10-07 16:13:43'),
(5, 6, 'ค33101', 'คณิตศาสตร์ 5', 4, '', NULL, NULL, NULL, '2023-10-07 16:14:03'),
(6, 6, 'ค33201', 'คณิตศาสตร์เพิ่มเติม 5', 4, '', NULL, NULL, NULL, '2023-10-07 16:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `permission_api_usertype`
--

CREATE TABLE `permission_api_usertype` (
  `api_page_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_api_usertype`
--

INSERT INTO `permission_api_usertype` (`api_page_id`, `usertype_id`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 1, NULL, NULL, NULL, '2023-09-24 07:20:06'),
(1, 2, NULL, NULL, NULL, '2023-09-24 07:56:21'),
(2, 2, NULL, NULL, NULL, '2023-10-13 06:09:31'),
(3, 3, NULL, NULL, NULL, '2023-10-13 06:09:58'),
(4, 4, NULL, NULL, NULL, '2023-10-13 07:42:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `permission_api_usertype_full`
-- (See below for the actual view)
--
CREATE TABLE `permission_api_usertype_full` (
`api_page_id` int(11)
,`usertype_id` int(11)
,`create_by` varchar(255)
,`update_by` varchar(255)
,`update_timestamp` timestamp
,`create_timestamp` timestamp
,`file_name` varchar(50)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `permission_web_usertype`
--

CREATE TABLE `permission_web_usertype` (
  `web_page_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_web_usertype`
--

INSERT INTO `permission_web_usertype` (`web_page_id`, `usertype_id`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 1, NULL, NULL, NULL, '2023-10-13 07:41:40'),
(2, 2, NULL, NULL, NULL, '2023-10-13 11:52:49'),
(3, 3, NULL, NULL, NULL, '2023-10-13 11:52:57'),
(4, 4, NULL, NULL, NULL, '2023-10-13 11:53:07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `permission_web_usertype_full`
-- (See below for the actual view)
--
CREATE TABLE `permission_web_usertype_full` (
`web_page_id` int(11)
,`usertype_id` int(11)
,`create_by` varchar(255)
,`update_by` varchar(255)
,`update_timestamp` timestamp
,`create_timestamp` timestamp
,`file_name` varchar(50)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `science`
--

CREATE TABLE `science` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `science`
--

INSERT INTO `science` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'ว30111', 'ฟิสิกส์พื้นฐาน 1', 1, 'สลินทิพย์ ศรีเงิน', NULL, NULL, '2023-10-13 06:25:36', '2023-10-07 14:05:50'),
(2, 4, 'ว30211', 'ฟิสิกส์เพิ่มเติม 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:10:40'),
(3, 4, 'ว30131', 'เคมีพื้นฐาน 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:11:23'),
(4, 4, 'ว30231', 'เคมีเพิ่มเติม 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:12:03'),
(5, 4, 'ว30151', 'ชีววิทยาพื้นฐาน 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:12:47'),
(6, 4, 'ว30251', 'ชีววิทยาเพิ่มเติม 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:13:21'),
(7, 4, 'ว30171', 'โลก ดาราศาสตร์ และอวกาศ 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:14:26'),
(8, 4, 'ว30181', 'วิทยาการคำนวณ 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:15:25'),
(9, 4, 'ว30281', 'เทคนิคปฏิบัติการพื้นฐานทางวิทยาศาตร์ 1', 1, '', NULL, NULL, '2023-10-07 15:16:41', '2023-10-07 15:16:33'),
(10, 4, 'ว30283', 'อินเตอร์เน็ตและการพฒนาเว็บไซต์', 1, '', NULL, NULL, '2023-10-07 15:18:27', '2023-10-07 15:17:49'),
(11, 5, 'ว30112', 'ฟิสิกส์พื้นฐาน 2', 1, 'สลินทิพย์ ศรีเงิน', NULL, NULL, '2023-10-13 06:26:04', '2023-10-07 15:19:51'),
(12, 5, 'ว30213', 'ฟิสิกส์เพิ่มเติม 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:21:15'),
(13, 5, 'ว30132', 'เคมีพื้นฐาน 2', 1, '', NULL, NULL, NULL, '2023-10-07 15:22:19'),
(14, 5, 'ว30233', 'เคมีเพิ่มเติม 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:22:53'),
(15, 5, 'ว30152', 'ชีววิทยาพื้นฐาน 2', 1, '', NULL, NULL, NULL, '2023-10-07 15:24:09'),
(16, 5, 'ว30253', 'ชีววิทยาเพิ่มเติม 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:24:42'),
(17, 5, 'ว30172', 'โลก ดาราศาสตร์ และอวกาศ 2', 1, '', NULL, NULL, NULL, '2023-10-07 15:25:29'),
(18, 5, 'ว30185', 'การออกแบบและเทคโนโลยี 2', 1, '', NULL, NULL, '2023-10-07 15:26:19', '2023-10-07 15:26:13'),
(19, 5, 'ว30288', 'โครงงาน STEM 1', 1, '', NULL, NULL, NULL, '2023-10-07 15:27:30'),
(20, 5, 'ว30290', 'การเขียนโปรแกรมควบคุมแขนหุ่นยนต์ ROBOT Magician Basic Plan', 1, '', NULL, NULL, '2023-10-07 15:30:19', '2023-10-07 15:29:37'),
(21, 6, 'ว30113', 'ฟิสิกส์พื้นฐาน 3', 1, 'สลินทิพย์ ศรีเงิน', NULL, NULL, '2023-10-13 06:26:11', '2023-10-07 15:31:38'),
(22, 6, 'ว30215', 'ฟิสิกส์เพิ่มเติม 5', 1, '', NULL, NULL, NULL, '2023-10-07 15:33:20'),
(23, 6, 'ว30133', 'เคมีพื้นฐาน 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:34:42'),
(24, 6, 'ว30235', 'เคมีเพิ่มเติม 5', 1, '', NULL, NULL, NULL, '2023-10-07 15:35:33'),
(25, 6, 'ว30153', 'ชีววิทยาพื้นฐาน 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:36:17'),
(26, 6, 'ว30255', 'ชีววิทยาเพิ่มเติม 5', 1, '', NULL, NULL, NULL, '2023-10-07 15:36:38'),
(27, 6, 'ว30173', 'โลก ดาราศาสตร์ และอวกาศ 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:37:42'),
(28, 6, 'ว30183', 'วิทยาการคำนวณ 3', 1, '', NULL, NULL, NULL, '2023-10-07 15:38:13'),
(29, 6, 'ว30294', 'เทคโนโลยีชีวภาพ', 1, '', NULL, NULL, NULL, '2023-10-07 15:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `description`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, '1/2566', NULL, NULL, NULL, '2023-09-24 05:28:43'),
(2, '2/2566', NULL, NULL, NULL, '2023-09-24 05:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'ศ31101', 'สุนทรียภาพ 1', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:10:19'),
(2, 4, 'ง31101', 'พื้นฐานการดำรงชีวิต', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:11:29'),
(3, 4, 'ง31201', 'การเป็นผู้ประกอบการ', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:11:59'),
(4, 4, 'พ31101', 'สุขศึกษา และพลศึกษา 1', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:12:50'),
(5, 4, 'พ31201', 'ว่ายน้ำ 1', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:13:12'),
(6, 5, 'ศ32103', 'สุนทรียภาพ 3', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:15:17'),
(7, 5, 'พ32101', 'สุขศึกษา และพลศึกษา 2', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:16:24'),
(8, 5, 'พ32201', 'กีฬา (เทนนิส)', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:16:57'),
(9, 6, 'ศ33101', 'สุนทรียภาพ 5', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:18:04'),
(10, 6, 'พ33101', 'สุขศึกษา และพลศึกษา 3', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:18:46'),
(11, 6, 'พ33201', 'กีฬา (บาสเกตบอล)', 6, NULL, NULL, NULL, NULL, '2023-10-10 14:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'ส31111', 'พระพุทธศาสนา 1', 5, NULL, NULL, NULL, '2023-10-07 16:02:20', '2023-10-07 16:01:29'),
(2, 4, 'ส31121', 'หน้าที่พลเมือง 1', 5, NULL, NULL, NULL, '2023-10-07 16:02:24', '2023-10-07 16:02:01'),
(3, 5, 'ส32111', 'พระพุทธศาสนา 3', 5, NULL, NULL, NULL, NULL, '2023-10-07 16:03:41'),
(4, 5, 'ส32141', 'เศรษฐศาสตร์ ', 5, NULL, NULL, NULL, NULL, '2023-10-07 16:04:46'),
(5, 6, 'ส33101', 'ประวัติศาสตร์สากล', 5, NULL, NULL, NULL, NULL, '2023-10-07 16:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(5) NOT NULL,
  `department_id` int(5) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `department_id`, `s_name`) VALUES
(0, 0, 'พละ'),
(1, 1, 'วิทยาศาสตร์'),
(2, 1, 'คอมพิวเตอร์'),
(3, 2, 'ภาษาอังกฤษ'),
(4, 2, 'ภาษาจีน'),
(5, 3, 'ภาษาไทย'),
(6, 4, 'คณิตศาสตร์'),
(7, 5, 'สังคมศึกษา'),
(8, 6, 'ดนตรี'),
(9, 6, 'ศิลปะ'),
(10, 6, 'การงานอาชีพ'),
(11, 6, 'สุขศึกษา และพลศึกษา'),
(12, 7, 'แนะแนว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf`
--

CREATE TABLE `tbl_pdf` (
  `tbl_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(5) NOT NULL,
  `doc_name` varchar(200) NOT NULL COMMENT 'ชื่อวิชา',
  `doc_file` text NOT NULL COMMENT 'ชื่อไฟล์เอกสาร',
  `date` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เพิ่มเอกสาร',
  `course_id` varchar(6) NOT NULL COMMENT 'รหัสวิชา',
  `class_id` varchar(3) NOT NULL COMMENT 'ระดับชั้น',
  `status` varchar(1) NOT NULL,
  `department_id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pdf`
--

INSERT INTO `tbl_pdf` (`tbl_id`, `subject_id`, `doc_name`, `doc_file`, `date`, `course_id`, `class_id`, `status`, `department_id`, `text`, `file`) VALUES
(1, 0, 'พละ', 'doc_65290196b6cdf.pdf', '2023-10-13', '', '', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `department_id` int(11) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `name`, `lastname`, `subject_id`, `department_id`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'สุดา', 'เธียรมนตรี', 2, 1, NULL, NULL, '2023-10-15 13:03:38', '2023-09-29 17:09:51'),
(2, 'เมธาวี ', 'ไพบูลย์สวัสดิ์', 2, 1, NULL, NULL, '2023-10-15 13:03:43', '2023-09-29 17:26:29'),
(3, 'ณัฐณิชา ', 'วังบุญคง', 3, 2, NULL, NULL, '2023-10-15 13:03:46', '2023-09-29 17:28:32'),
(4, 'ทวีสิน', 'จิระนนทกร', 1, 1, NULL, NULL, '2023-10-15 13:03:47', '2023-09-29 17:56:05'),
(5, 'สลินทิพย์ ', 'ศรีเงิน', 1, 1, NULL, NULL, '2023-10-15 13:03:49', '2023-09-29 18:06:56'),
(6, 'ณัฐณิชา', 'วังบุญคง', 3, 2, NULL, NULL, '2023-10-15 13:03:53', '2023-09-29 18:31:32'),
(7, 'กชกร', 'ชูสุข', 3, 2, NULL, NULL, '2023-10-15 13:03:56', '2023-09-29 18:32:57'),
(8, 'มนฤดี ', 'ดำเอี่ยม', 5, 3, NULL, NULL, '2023-10-15 13:03:58', '2023-09-29 18:35:24'),
(9, 'สลินทิพย์ ', 'ศรีเงิน', 1, 1, NULL, NULL, '2023-10-15 13:04:00', '2023-09-29 21:15:56'),
(10, 'Yanisa ', 'Longklang', 12, 7, NULL, NULL, '2023-10-15 13:04:02', '2023-10-01 20:20:55'),
(11, 'สุดา', 'เธียรมนตรี', 6, 4, NULL, NULL, '2023-10-15 13:04:04', '2023-10-03 05:10:48'),
(12, 'สุดา', 'เธียรมนตรี', 10, 6, NULL, NULL, '2023-10-15 13:04:13', '2023-10-03 05:36:43'),
(777, '4454', '456', 22, 0, NULL, NULL, '2023-09-24 04:36:53', '2023-09-24 04:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `thai`
--

CREATE TABLE `thai` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `s_name` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thai`
--

INSERT INTO `thai` (`id`, `class_id`, `course_id`, `s_name`, `department_id`, `t_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 4, 'ท31101', 'ภาษาไทย 1', 3, '', NULL, NULL, NULL, '2023-10-07 15:57:55'),
(2, 5, 'ท32101', 'ภาษาไทย 3', 3, '', NULL, NULL, NULL, '2023-10-07 15:58:31'),
(3, 6, 'ท33101', 'ภาษาไทย 5', 3, '', NULL, NULL, NULL, '2023-10-07 15:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` char(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype_id` varchar(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `tel`, `img`, `username`, `password`, `usertype_id`, `department_id`, `subject_id`) VALUES
(00001, 'สุไวบะห์', 'นาวานิ', 'suwaibah.8989ptn@gmail.com', '0631031175', '188659262620230923_164150.png', 'cherbell', '1234', '1', 0, 0),
(00032, 'ทวีสิน', 'จิระนนทกร', 'thawisin@gmail.com', '0652145897', '99695195120230929_195325.png', 'thawisin', '1234', '3', 1, 1),
(00033, 'ทวีสิน', 'จิระนนทกร', 'thawisin@gmail.com', '0651465856', '124878150020230929_195605.png', 'thawisin', '12345', '2', 1, 1),
(00035, 'ณัฐณิชา', 'วังบุญคง', 'natnicah@gmail.com', '0980918573', '104404837020230929_203045.png', 'natnicha', '1234', '3', 2, 3),
(00036, 'ณัฐณิชา', 'วังบุญคง', 'natnicah@gmail.com', '0980918573', '32020201620230929_203132.png', 'natnicha', '12345', '2', 2, 3),
(00037, 'กชกร', 'ชูสุข', 'kothchakorn@gmail.com', '0980918573', '187526966520230929_203257.png', 'kothchakorn', '12345', '2', 2, 3),
(00038, 'มนฤดี', 'ดำเอี่ยม', 'monrudee@gmail.com', '0980918573', '41641474020230929_203430.png', 'monrudee', '1234', '3', 3, 5),
(00039, 'มนฤดี ', 'ดำเอี่ยม', 'monrudee@gmail.com', '0980918573', '16414999820230929_203524.png', 'monrudee', '12345', '2', 3, 5),
(00040, 'สลินทิพย์ ', 'ศรีเงิน', 'salintip@gmail.com', '0980918573', '64542496920230929_231556.png', 'salintip', '12345', '2', 1, 1),
(00042, 'สุนิสา', 'คงประสิทธิ์', 'sunisa@gmail.com', '0326514857', '', 'sunisa', '1234', '4', 0, 0),
(00044, 'Yanisa ', 'Longklang', 'yanisaa026@gmail.com', '0983264888', '', 'Yanisa', '12345', '2', 7, 12),
(00046, 'สุดา', 'เธียรมนตรี', 'suda@tsu.sc.th', '032651485', '89475603520231003_073643.PNG', 'suda', '1234', '2', 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertype_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `description`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'admin', NULL, NULL, NULL, '2023-09-24 07:02:53'),
(2, 'teachers', NULL, NULL, NULL, '2023-09-24 07:02:53'),
(3, 'หัวหน้ากลุ่มสาระ', NULL, NULL, '2023-09-29 14:38:36', '2023-09-24 07:02:53'),
(4, 'ผู้บริหาร', NULL, NULL, NULL, '2023-09-24 19:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_department`
--

CREATE TABLE `user_department` (
  `id` int(11) NOT NULL,
  `usertype_id` varchar(50) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `subject_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_department`
--

INSERT INTO `user_department` (`id`, `usertype_id`, `department_id`, `subject_id`) VALUES
(1, '3', '1', 0),
(2, '4', '2', 0),
(3, '5', '3', 0),
(4, '6', '4', 0),
(5, '7', '5', 0),
(6, '8', '6', 0),
(7, '9', '7', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_usertype`
-- (See below for the actual view)
--
CREATE TABLE `user_usertype` (
`id` int(5) unsigned zerofill
,`name` varchar(100)
,`surname` varchar(100)
,`email` varchar(100)
,`tel` char(10)
,`img` varchar(100)
,`username` varchar(50)
,`password` varchar(50)
,`usertype_id` varchar(11)
,`description` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `web_page`
--

CREATE TABLE `web_page` (
  `id` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_page`
--

INSERT INTO `web_page` (`id`, `file_name`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(1, 'adminhome.php', NULL, NULL, '2023-10-13 07:37:39', '2023-10-13 07:36:49'),
(2, 'userhome.php', NULL, NULL, '2023-10-13 11:43:34', '2023-10-13 07:37:11'),
(3, 'teacherhome.php', NULL, NULL, '2023-10-13 11:42:39', '2023-10-13 11:41:36'),
(4, 'executivehome.php', NULL, NULL, '2023-10-13 11:43:42', '2023-10-13 11:42:27');

-- --------------------------------------------------------

--
-- Structure for view `permission_api_usertype_full`
--
DROP TABLE IF EXISTS `permission_api_usertype_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permission_api_usertype_full`  AS SELECT `permission_api_usertype`.`api_page_id` AS `api_page_id`, `permission_api_usertype`.`usertype_id` AS `usertype_id`, `permission_api_usertype`.`create_by` AS `create_by`, `permission_api_usertype`.`update_by` AS `update_by`, `permission_api_usertype`.`update_timestamp` AS `update_timestamp`, `permission_api_usertype`.`create_timestamp` AS `create_timestamp`, `api_page`.`file_name` AS `file_name`, `usertype`.`description` AS `description` FROM ((`permission_api_usertype` left join `api_page` on(`permission_api_usertype`.`api_page_id` = `api_page`.`id`)) left join `usertype` on(`permission_api_usertype`.`usertype_id` = `usertype`.`usertype_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `permission_web_usertype_full`
--
DROP TABLE IF EXISTS `permission_web_usertype_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permission_web_usertype_full`  AS SELECT `permission_web_usertype`.`web_page_id` AS `web_page_id`, `permission_web_usertype`.`usertype_id` AS `usertype_id`, `permission_web_usertype`.`create_by` AS `create_by`, `permission_web_usertype`.`update_by` AS `update_by`, `permission_web_usertype`.`update_timestamp` AS `update_timestamp`, `permission_web_usertype`.`create_timestamp` AS `create_timestamp`, `web_page`.`file_name` AS `file_name`, `usertype`.`description` AS `description` FROM ((`permission_web_usertype` left join `web_page` on(`permission_web_usertype`.`web_page_id` = `web_page`.`id`)) left join `usertype` on(`permission_web_usertype`.`usertype_id` = `usertype`.`usertype_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `user_usertype`
--
DROP TABLE IF EXISTS `user_usertype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_usertype`  AS SELECT `user`.`id` AS `id`, `user`.`name` AS `name`, `user`.`surname` AS `surname`, `user`.`email` AS `email`, `user`.`tel` AS `tel`, `user`.`img` AS `img`, `user`.`username` AS `username`, `user`.`password` AS `password`, `user`.`usertype_id` AS `usertype_id`, `usertype`.`description` AS `description` FROM (`user` left join `usertype` on(`user`.`usertype_id` = `usertype`.`usertype_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_page`
--
ALTER TABLE `api_page`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`) USING BTREE;

--
-- Indexes for table `coursecode`
--
ALTER TABLE `coursecode`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `foreign`
--
ALTER TABLE `foreign`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  ADD PRIMARY KEY (`api_page_id`,`usertype_id`) USING BTREE,
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `permission_web_usertype`
--
ALTER TABLE `permission_web_usertype`
  ADD PRIMARY KEY (`web_page_id`,`usertype_id`) USING BTREE,
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `science`
--
ALTER TABLE `science`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`) USING BTREE;

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  ADD PRIMARY KEY (`tbl_id`) USING BTREE;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `thai`
--
ALTER TABLE `thai`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `department_id` (`department_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertype_id`) USING BTREE;

--
-- Indexes for table `user_department`
--
ALTER TABLE `user_department`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `web_page`
--
ALTER TABLE `web_page`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_page`
--
ALTER TABLE `api_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `foreign`
--
ALTER TABLE `foreign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guidance`
--
ALTER TABLE `guidance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  MODIFY `api_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission_web_usertype`
--
ALTER TABLE `permission_web_usertype`
  MODIFY `web_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `science`
--
ALTER TABLE `science`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `tbl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=792;

--
-- AUTO_INCREMENT for table `thai`
--
ALTER TABLE `thai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `web_page`
--
ALTER TABLE `web_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursecode`
--
ALTER TABLE `coursecode`
  ADD CONSTRAINT `coursecode_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `foreign`
--
ALTER TABLE `foreign`
  ADD CONSTRAINT `foreign_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `foreign_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `guidance`
--
ALTER TABLE `guidance`
  ADD CONSTRAINT `guidance_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `guidance_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `maths`
--
ALTER TABLE `maths`
  ADD CONSTRAINT `maths_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `maths_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  ADD CONSTRAINT `permission_api_usertype_ibfk_1` FOREIGN KEY (`api_page_id`) REFERENCES `api_page` (`id`),
  ADD CONSTRAINT `permission_api_usertype_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`usertype_id`);

--
-- Constraints for table `permission_web_usertype`
--
ALTER TABLE `permission_web_usertype`
  ADD CONSTRAINT `permission_web_usertype_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`usertype_id`),
  ADD CONSTRAINT `permission_web_usertype_ibfk_3` FOREIGN KEY (`web_page_id`) REFERENCES `web_page` (`id`);

--
-- Constraints for table `science`
--
ALTER TABLE `science`
  ADD CONSTRAINT `science_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `science_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `social_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `thai`
--
ALTER TABLE `thai`
  ADD CONSTRAINT `thai_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `thai_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
