-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 11:47 PM
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
(7, 'พัฒนาผู้เรียน (งานแนะแนว)', NULL, NULL, NULL, '2023-09-24 06:23:25');

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
  `doc_name` varchar(200) NOT NULL COMMENT 'ชื่อวิชา',
  `doc_file` text NOT NULL COMMENT 'ชื่อไฟล์เอกสาร',
  `date` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เพิ่มเอกสาร',
  `s_id` varchar(6) NOT NULL COMMENT 'รหัสวิชา',
  `degree` varchar(3) NOT NULL COMMENT 'ระดับชั้น',
  `status` varchar(1) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `create_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `name`, `lastname`, `subject_id`, `create_by`, `update_by`, `update_timestamp`, `create_timestamp`) VALUES
(0, 'lll', '', 0, NULL, NULL, NULL, NULL),
(101, 'ทวีสิน', 'จิระนนทกร', 1, NULL, NULL, NULL, NULL),
(102, 'สลินทิพย์', 'ศรีเงิน', 1, NULL, NULL, NULL, NULL),
(103, 'เมธาวี', 'ไพบูลย์สวัสดิ์', 1, NULL, NULL, NULL, NULL),
(104, 'จุฬาลักษณ์', 'จันทร์เกตุ', 1, NULL, NULL, NULL, NULL),
(105, 'ฟาฏิมะฮ์', 'ตอฮา', 1, NULL, NULL, NULL, NULL),
(106, 'วราลักษณ์', 'รัฐจักร', 2, NULL, NULL, NULL, NULL),
(107, 'อนุสรณ์', 'เขียวทอง', 2, NULL, NULL, NULL, NULL),
(201, 'ณัฐณิชา', 'วังบุญคง', 3, NULL, NULL, NULL, NULL),
(202, 'กชกร', 'ชูสุข', 3, NULL, NULL, NULL, NULL),
(203, 'Mr. Lei', 'Yutian', 4, NULL, NULL, NULL, NULL),
(301, 'มนฤดี', 'ดำเอี่ยม', 5, NULL, NULL, NULL, NULL),
(302, 'ศิริชัย', 'ไหมด้วง', 5, NULL, NULL, NULL, NULL),
(401, 'ปริญา', 'โต๊ะขวัญ', 6, NULL, NULL, NULL, NULL),
(402, 'กนกณิศา ', 'เรืองวุฒิ', 6, NULL, NULL, NULL, NULL),
(501, 'ณัศรุฒน์', 'หลีหนุด', 7, NULL, NULL, NULL, NULL),
(502, 'พิชชากร ', 'ตะนุสะ', 7, NULL, NULL, NULL, NULL),
(601, 'ศักสุดา ', 'แสงมณี', 8, NULL, NULL, NULL, NULL),
(602, 'พิมประภา ', 'เจ้ยแก้ว', 9, NULL, NULL, NULL, NULL),
(603, 'วีรศักดิ์ ', 'มะลิทอง', 10, NULL, NULL, NULL, NULL),
(604, 'กฤตนันท์ ', 'นวลแก้ว', 11, NULL, NULL, NULL, NULL),
(701, 'วรรณพัชร', 'ชูทอง', 11, NULL, NULL, '2023-09-24 04:33:44', NULL),
(777, '4454', '456', 22, NULL, NULL, '2023-09-24 04:36:53', '2023-09-24 04:36:39');

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
  `usertype_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `tel`, `img`, `username`, `password`, `usertype_id`) VALUES
(00001, 'สุไวบะห์', 'นาวานิ', 'suwaibah.8989ptn@gmail.com', '0631031175', '188659262620230923_164150.png', 'cherbell', '1234', '1'),
(00002, 'yanisa', 'longklang', 'iyou66677@gmail.com', '0980918573', '135831310120230923_164235.png', 'yanisa', '1234', '2'),
(00003, 'ทวีสิน', 'จิระนนทกร', 'thawisin@gmail.com', '0980918573', '79261275820230924_005746.png', 'thawisin', '1234', '3'),
(00015, 'ณัฐณิชา', 'วังบุญคง', 'natthanicha@gmail.com', '0648251657', '76687449520230925_200834.png', 'natthanicha', '1234', '4'),
(00016, 'มนฤดี', 'ดำเอี่ยม', 'monrudee@gmail.com', '0615462587', '55305153820230925_212154.png', 'monrudee', '1234', '5'),
(00017, 'ปริญา', 'โต๊ะขวัญ', 'pariya@gmail.com', '0645215794', '134362402120230925_212304.png', 'pariya', '1234', '6'),
(00018, 'ณัศรุฒน์', 'หลีหนุด', 'natsarut@gmail.com', '064125398', '77491263720230925_212443.png', 'natsarut', '1234', '7'),
(00019, 'ศักสุดา', 'แสงมณี', 'saksuda@gmail.com', '0648592358', '167762520220230925_212612.png', 'saksuda', '1234', '8'),
(00020, 'วรรณพัชร', 'ชูทอง', 'wannapat@gmail.com', '0653254864', '87694750220230925_212716.png', 'wannapat', '1234', '9'),
(00021, 'สุนิสา', 'คงประสิทธิ์', 'sunisa@gmail.com', '036542597', '129140994520230925_213048.png', 'sunisa', '1234', '10'),
(00022, 'สลิลทิพย์', 'ศรีเงิน', 'salintip@gmail.com', '0654235987', '64847055920230925_213227.png', 'salintip', '1234', '2');

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
(2, 'user', NULL, NULL, NULL, '2023-09-24 07:02:53'),
(3, 'หัวหน้ากลุ่มสาระวิทยาศาตร์และเทคโนโลยี', NULL, NULL, '2023-09-24 18:19:51', '2023-09-24 07:02:53'),
(4, 'หัวหน้ากลุ่มสาระภาษาต่างประเทศ', NULL, NULL, NULL, '2023-09-24 07:02:53'),
(5, 'หัวหน้ากลุ่มสาระภาษาไทย', NULL, NULL, NULL, '2023-09-24 07:02:53'),
(6, 'หัวหน้ากลุ่มสาระคณิตศาสตร์', NULL, NULL, NULL, '2023-09-24 18:16:51'),
(7, 'หัวหน้ากลุ่มสาระสังคมศึกษา ศาสนาและวัฒนธรรม', NULL, NULL, NULL, '2023-09-24 18:17:12'),
(8, 'หัวหน้ากลุ่มสาระสุนทรียภาพและทักษะชีวิต', NULL, NULL, NULL, '2023-09-24 18:17:29'),
(9, 'หัวหน้ากลุ่มสาระพฒนาผู้เรียน (งานแนะแนว)', NULL, NULL, NULL, '2023-09-24 18:18:03'),
(10, 'ผู้บริหาร', NULL, NULL, NULL, '2023-09-24 19:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_department`
--

CREATE TABLE `user_department` (
  `id` int(11) NOT NULL,
  `usertype_id` varchar(50) NOT NULL,
  `depaertment_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_department`
--

INSERT INTO `user_department` (`id`, `usertype_id`, `depaertment_id`) VALUES
(1, '3', '1'),
(2, '4', '2'),
(3, '5', '3'),
(4, '6', '4'),
(5, '7', '5'),
(6, '8', '6'),
(7, '9', '7');

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
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `tbl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
