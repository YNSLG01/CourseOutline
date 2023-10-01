-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 10:48 PM
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
(4, 'select_subjects.php', NULL, NULL, NULL, '2023-09-25 17:23:46');

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
(10, 'ไทย', NULL, NULL, NULL, '2023-09-27 07:32:24'),
(11, 'ดาราศาสตร์', NULL, NULL, NULL, '2023-09-27 11:19:41');

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
(1, 2, NULL, NULL, NULL, '2023-09-24 07:56:21');

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
(2, '2/2566', NULL, NULL, NULL, '2023-09-24 05:28:52'),
(3, '1/2565', NULL, NULL, NULL, '2023-09-24 05:29:02'),
(4, '2/2565', NULL, NULL, NULL, '2023-09-24 05:29:08');

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
(1, 1, 'วิทยาศาสตร์', 'doc_65137e2c4198d.pdf', '2023-09-27', '1', '1', '4', 1, '565', 'downloads/หน้าปกรายงาน.pdf'),
(2, 0, 'คอมพิวเตอร์', 'doc_651413e33bd1f.pdf', '2023-09-27', '', '', '3', 0, NULL, ''),
(89, 0, 'วิทยาศาสตร์', 'doc_65186cce977a8.pdf', '2023-10-01', '', '', '4', 0, '12345', 'downloads/รายละเอียดการแก้รายงาน.pdf'),
(91, 0, 'คอมพิวเตอร์', 'doc_65187658d794a.pdf', '2023-10-01', '', '', '5', 0, '987', 'downloads/รายละเอียดการแก้รายงาน.pdf'),
(92, 0, 'วิทยาศาสตร์', 'doc_6518f8ce61905.pdf', '2023-10-01', '', '', '1', 0, NULL, NULL),
(93, 0, 'วิทยาศาสตร์', 'doc_65191b1be4938.pdf', '2023-10-01', '', '', '1', 1, NULL, NULL),
(94, 0, 'วิทยาศาสตร์', 'doc_65191e713e8ad.pdf', '2023-10-01', '', '', '2', 1, NULL, NULL),
(95, 0, 'ว21101', 'doc_6519bcd421213.pdf', '2023-10-02', '', '', '5', 1, 'ส่งใหม่', 'downloads/120_134.pdf'),
(96, 0, 'วิทยาศาสตร์', 'doc_6519bdcf97d7d.pdf', '2023-10-02', '', '', '2', 1, NULL, NULL),
(97, 0, 'คอมพิวเตอร์', 'doc_6519cbba9dffd.pdf', '2023-10-02', '', '', '4', 1, 'ไม่ผ่าน', 'downloads/ใบคำร้องขอปฏิบัติงานสหกิจศึกษา.pdf'),
(98, 0, 'คอมพิวเตอร์', 'doc_6519ce91a9f07.pdf', '2023-10-02', '', '', '2', 1, NULL, NULL),
(99, 0, 'การงานอาชีพ', 'doc_6519d17fb87d0.pdf', '2023-10-02', '', '', '3', 6, NULL, NULL),
(100, 0, 'สุขศึกษา และพลศึกษา', 'doc_6519d197b9908.pdf', '2023-10-02', '', '', '4', 6, 'ส่งเอกสารใหม่', 'downloads/แบบฝึกหัดท้ายบท 3.pdf'),
(101, 0, 'ภาษาจีน', 'doc_6519d24adb4bf.pdf', '2023-10-02', '', '', '5', 2, 'เอกสารไม่ถูกต้อง', 'downloads/แบบฝึกหัดท้ายบท 5.pdf');

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
(777, '4454', '456', 22, 0, NULL, NULL, '2023-09-24 04:36:53', '2023-09-24 04:36:39'),
(778, 'สุดา', 'เธียรมนตรี', 2, 1, NULL, NULL, NULL, '2023-09-29 17:09:51'),
(779, 'เมธาวี ', 'ไพบูลย์สวัสดิ์', 2, 1, NULL, NULL, NULL, '2023-09-29 17:26:29'),
(780, 'ณัฐณิชา ', 'วังบุญคง', 3, 2, NULL, NULL, NULL, '2023-09-29 17:28:32'),
(781, 'ทวีสิน', 'จิระนนทกร', 1, 1, NULL, NULL, NULL, '2023-09-29 17:56:05'),
(782, 'สลินทิพย์ ', 'ศรีเงิน', 1, 1, NULL, NULL, NULL, '2023-09-29 18:06:56'),
(783, 'ณัฐณิชา', 'วังบุญคง', 3, 2, NULL, NULL, NULL, '2023-09-29 18:31:32'),
(784, 'กชกร', 'ชูสุข', 3, 2, NULL, NULL, NULL, '2023-09-29 18:32:57'),
(785, 'มนฤดี ', 'ดำเอี่ยม', 5, 3, NULL, NULL, NULL, '2023-09-29 18:35:24'),
(786, 'สลินทิพย์ ', 'ศรีเงิน', 1, 1, NULL, NULL, NULL, '2023-09-29 21:15:56'),
(789, 'Yanisa ', 'Longklang', 12, 7, NULL, NULL, NULL, '2023-10-01 20:20:55');

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
(00044, 'Yanisa ', 'Longklang', 'yanisaa026@gmail.com', '0983264888', '', 'Yanisa', '12345', '2', 7, 12);

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
-- Indexes for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  ADD PRIMARY KEY (`api_page_id`,`usertype_id`) USING BTREE,
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`) USING BTREE;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_page`
--
ALTER TABLE `api_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  MODIFY `api_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `tbl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=790;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursecode`
--
ALTER TABLE `coursecode`
  ADD CONSTRAINT `coursecode_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `permission_api_usertype`
--
ALTER TABLE `permission_api_usertype`
  ADD CONSTRAINT `permission_api_usertype_ibfk_1` FOREIGN KEY (`api_page_id`) REFERENCES `api_page` (`id`),
  ADD CONSTRAINT `permission_api_usertype_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`usertype_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
