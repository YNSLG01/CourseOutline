/*
 Navicat Premium Data Transfer

 Source Server         : CourseOutlineWebApplicationsofThaksinUniversityDemonstrationSchool
 Source Server Type    : MySQL
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : satit

 Target Server Type    : MySQL
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 24/09/2023 18:45:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `a_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `a_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `a_tel` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`a_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'yanisa', 'y12345', NULL, NULL, NULL, NULL, '2023-09-24 11:37:45', '2023-09-24 11:37:19');

-- ----------------------------
-- Table structure for api_page
-- ----------------------------
DROP TABLE IF EXISTS `api_page`;
CREATE TABLE `api_page`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of api_page
-- ----------------------------
INSERT INTO `api_page` VALUES (1, 'select_class.php', NULL, NULL, NULL, '2023-09-24 14:14:52');

-- ----------------------------
-- Table structure for approval
-- ----------------------------
DROP TABLE IF EXISTS `approval`;
CREATE TABLE `approval`  (
  `id_approval` int NOT NULL,
  `t_id` int NULL DEFAULT NULL,
  `s_id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `approval` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_approval`) USING BTREE,
  UNIQUE INDEX `s_id`(`s_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of approval
-- ----------------------------

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class`  (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`class_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES (1, 'ม.1', NULL, NULL, NULL, '2023-09-24 13:15:31');
INSERT INTO `class` VALUES (2, 'ม.2', NULL, NULL, NULL, '2023-09-24 13:15:36');
INSERT INTO `class` VALUES (3, 'ม.3', NULL, NULL, NULL, '2023-09-24 13:15:40');
INSERT INTO `class` VALUES (4, 'ม.4', NULL, NULL, NULL, '2023-09-24 13:15:43');
INSERT INTO `class` VALUES (5, 'ม.5', NULL, NULL, NULL, '2023-09-24 13:15:46');
INSERT INTO `class` VALUES (6, 'ม.6', NULL, NULL, NULL, '2023-09-24 13:15:51');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `course_id` int NOT NULL,
  `code_id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`course_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, 'ว21101', 0);
INSERT INTO `course` VALUES (2, 'ว21102', 0);
INSERT INTO `course` VALUES (3, 'ว21103', 0);
INSERT INTO `course` VALUES (4, 'ว21104', 0);
INSERT INTO `course` VALUES (5, 'ว21105', 0);
INSERT INTO `course` VALUES (6, 'ว21106', 0);
INSERT INTO `course` VALUES (7, 'ว21111', 0);
INSERT INTO `course` VALUES (8, 'ว21112', 0);
INSERT INTO `course` VALUES (9, 'ว21113', 0);
INSERT INTO `course` VALUES (10, 'ว21114', 0);
INSERT INTO `course` VALUES (11, 'ว21115', 0);
INSERT INTO `course` VALUES (12, 'ว21116', 0);
INSERT INTO `course` VALUES (13, 'อ21101', 0);
INSERT INTO `course` VALUES (14, 'อ21102', 0);
INSERT INTO `course` VALUES (15, 'จ21101', 0);
INSERT INTO `course` VALUES (16, 'จ21102', 0);
INSERT INTO `course` VALUES (17, 'ท21101', 0);
INSERT INTO `course` VALUES (18, 'ท21102', 0);
INSERT INTO `course` VALUES (19, 'ค21101', 0);
INSERT INTO `course` VALUES (20, 'ค21102', 0);
INSERT INTO `course` VALUES (21, 'ส21101', 0);
INSERT INTO `course` VALUES (22, 'ส21102', 0);
INSERT INTO `course` VALUES (23, 'ด21101', 0);
INSERT INTO `course` VALUES (24, 'ด21102', 0);
INSERT INTO `course` VALUES (25, 'ศ21101', 0);
INSERT INTO `course` VALUES (26, 'ศ21102', 0);
INSERT INTO `course` VALUES (27, 'ง21101', 0);
INSERT INTO `course` VALUES (28, 'ง21102', 0);
INSERT INTO `course` VALUES (29, 'พ21101', 0);
INSERT INTO `course` VALUES (30, 'พ21102', 0);
INSERT INTO `course` VALUES (31, 'น21101', 0);
INSERT INTO `course` VALUES (32, 'น21102', 0);

-- ----------------------------
-- Table structure for course syllabus
-- ----------------------------
DROP TABLE IF EXISTS `course syllabus`;
CREATE TABLE `course syllabus`  (
  `cs_id` int NOT NULL,
  `cs_approval` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cs_suggestion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course syllabus
-- ----------------------------

-- ----------------------------
-- Table structure for coursecode
-- ----------------------------
DROP TABLE IF EXISTS `coursecode`;
CREATE TABLE `coursecode`  (
  `course_id` int NOT NULL,
  `code_id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`course_id`) USING BTREE,
  INDEX `subject_id`(`subject_id` ASC) USING BTREE,
  CONSTRAINT `coursecode_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coursecode
-- ----------------------------
INSERT INTO `coursecode` VALUES (1, 'ว21101', 1);
INSERT INTO `coursecode` VALUES (2, 'ว21102', 1);
INSERT INTO `coursecode` VALUES (3, 'ว21103', 1);
INSERT INTO `coursecode` VALUES (4, 'ว21104', 1);
INSERT INTO `coursecode` VALUES (5, 'ว21111', 2);
INSERT INTO `coursecode` VALUES (6, 'ว21112', 2);
INSERT INTO `coursecode` VALUES (7, 'อ21101', 3);
INSERT INTO `coursecode` VALUES (8, 'อ21102', 3);
INSERT INTO `coursecode` VALUES (9, 'อ21103', 3);
INSERT INTO `coursecode` VALUES (10, 'จ21101', 4);
INSERT INTO `coursecode` VALUES (11, 'จ21102', 4);
INSERT INTO `coursecode` VALUES (12, 'ท21101', 5);
INSERT INTO `coursecode` VALUES (13, 'ท21102', 5);
INSERT INTO `coursecode` VALUES (14, 'ค21101', 6);
INSERT INTO `coursecode` VALUES (15, 'ค21102', 6);
INSERT INTO `coursecode` VALUES (16, 'ส21101', 7);
INSERT INTO `coursecode` VALUES (17, 'ส21102', 7);
INSERT INTO `coursecode` VALUES (18, 'ด21101', 8);
INSERT INTO `coursecode` VALUES (19, 'ศ21101', 9);
INSERT INTO `coursecode` VALUES (20, 'ง21101', 10);
INSERT INTO `coursecode` VALUES (21, 'พ21101', 11);
INSERT INTO `coursecode` VALUES (22, 'น21101', 12);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `d_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`department_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'วิทยาศาสตร์และเทคโนโลยี', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (2, 'ภาษาต่างประเทศ', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (3, 'ภาษาไทย', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (4, 'คณิตศาสตร์', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (5, 'สังคมศึกษา ศาสนาและวัฒนธรรม', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (6, 'สุนทรียภาพและทักษะชีวิต', NULL, NULL, NULL, '2023-09-24 13:23:25');
INSERT INTO `department` VALUES (7, 'พัฒนาผู้เรียน (งานแนะแนว)', NULL, NULL, NULL, '2023-09-24 13:23:25');

-- ----------------------------
-- Table structure for executive
-- ----------------------------
DROP TABLE IF EXISTS `executive`;
CREATE TABLE `executive`  (
  `e_id` int NOT NULL,
  `e_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `e_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `e_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `e_tel` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`e_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of executive
-- ----------------------------

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp,
  `degree` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_data` longblob NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('', 'วิทยาศาสตร์และเทคโนโลยี');
INSERT INTO `groups` VALUES ('2', 'ภาษาต่างประเทศ');
INSERT INTO `groups` VALUES ('3', 'ภาษาไทย');
INSERT INTO `groups` VALUES ('4', 'คณิศาสตร์');
INSERT INTO `groups` VALUES ('5', 'สังคมศึกษา ศาสนาและวัฒนธรรม');
INSERT INTO `groups` VALUES ('6', 'สุนทรียภาพและทักษะชีวิต');
INSERT INTO `groups` VALUES ('7', 'พัฒนาผู้เรียน (งานแนะนว)');

-- ----------------------------
-- Table structure for head of subject areas
-- ----------------------------
DROP TABLE IF EXISTS `head of subject areas`;
CREATE TABLE `head of subject areas`  (
  `hs_id` int NOT NULL,
  `hs_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hs_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hs_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hs_tel` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`hs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of head of subject areas
-- ----------------------------
INSERT INTO `head of subject areas` VALUES (301, 'ทวีสิน', '25645', 'thaweesin@gmail.com', '0615548791');

-- ----------------------------
-- Table structure for pdf_files
-- ----------------------------
DROP TABLE IF EXISTS `pdf_files`;
CREATE TABLE `pdf_files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_data` longblob NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdf_files
-- ----------------------------

-- ----------------------------
-- Table structure for permission_api_usertype
-- ----------------------------
DROP TABLE IF EXISTS `permission_api_usertype`;
CREATE TABLE `permission_api_usertype`  (
  `api_page_id` int NOT NULL AUTO_INCREMENT,
  `usertype_id` int NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`api_page_id`, `usertype_id`) USING BTREE,
  INDEX `usertype_id`(`usertype_id` ASC) USING BTREE,
  CONSTRAINT `permission_api_usertype_ibfk_1` FOREIGN KEY (`api_page_id`) REFERENCES `api_page` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `permission_api_usertype_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`usertype_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_api_usertype
-- ----------------------------
INSERT INTO `permission_api_usertype` VALUES (1, 1, NULL, NULL, NULL, '2023-09-24 14:20:06');
INSERT INTO `permission_api_usertype` VALUES (1, 2, NULL, NULL, NULL, '2023-09-24 14:56:21');

-- ----------------------------
-- Table structure for schedule
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule`  (
  `id_schedule` int NOT NULL,
  `t_id` int NULL DEFAULT NULL,
  `s_id` int NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_schedule`) USING BTREE,
  INDEX `s_id`(`s_id` ASC) USING BTREE,
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `subject` (`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of schedule
-- ----------------------------

-- ----------------------------
-- Table structure for semester
-- ----------------------------
DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester`  (
  `semester_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`semester_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semester
-- ----------------------------
INSERT INTO `semester` VALUES (1, '1/2566', NULL, NULL, NULL, '2023-09-24 12:28:43');
INSERT INTO `semester` VALUES (2, '2/2566', NULL, NULL, NULL, '2023-09-24 12:28:52');
INSERT INTO `semester` VALUES (3, '1/2565', NULL, NULL, NULL, '2023-09-24 12:29:02');
INSERT INTO `semester` VALUES (4, '2/2565', NULL, NULL, NULL, '2023-09-24 12:29:08');

-- ----------------------------
-- Table structure for subjects
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects`  (
  `subject_id` int NOT NULL,
  `department_id` int NOT NULL,
  `s_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`subject_id`) USING BTREE,
  INDEX `department_id`(`department_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES (1, 1, 'วิทยาศาสตร์');
INSERT INTO `subjects` VALUES (2, 1, 'คอมพิวเตอร์');
INSERT INTO `subjects` VALUES (3, 2, 'ภาษาอังกฤษ');
INSERT INTO `subjects` VALUES (4, 2, 'ภาษาจีน');
INSERT INTO `subjects` VALUES (5, 3, 'ภาษาไทย');
INSERT INTO `subjects` VALUES (6, 4, 'คณิตศาสตร์');
INSERT INTO `subjects` VALUES (7, 5, 'สังคมศึกษา');
INSERT INTO `subjects` VALUES (8, 6, 'ดนตรี');
INSERT INTO `subjects` VALUES (9, 6, 'ศิลปะ');
INSERT INTO `subjects` VALUES (10, 6, 'การงานอาชีพ');
INSERT INTO `subjects` VALUES (11, 6, 'สุขศึกษา และพลศึกษา');
INSERT INTO `subjects` VALUES (12, 7, 'แนะแนว');

-- ----------------------------
-- Table structure for tbl_pdf
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pdf`;
CREATE TABLE `tbl_pdf`  (
  `no` int NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อวิชา',
  `doc_file` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อไฟล์เอกสาร',
  `date` date NOT NULL DEFAULT current_timestamp COMMENT 'วันที่เพิ่มเอกสาร',
  `s_id` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสวิชา',
  `degree` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ระดับชั้น',
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pdf
-- ----------------------------
INSERT INTO `tbl_pdf` VALUES (2, 'วิทยาศาสตร์', 'doc_59230674120230911_230056.pdf', '2023-09-11', 'ว21101', 'ม.1');
INSERT INTO `tbl_pdf` VALUES (3, 'วิทยาศาสตร์', 'doc_161376456920230911_200907.pdf', '2023-09-18', 'ว21102', 'ม.2');
INSERT INTO `tbl_pdf` VALUES (4, 'วิทย์', '', '2023-09-19', 'ว21103', 'ม.3');
INSERT INTO `tbl_pdf` VALUES (17, 'วิทยาศาสตร์', 'doc_28995675520230922_080836.pdf', '2023-09-22', '', '');
INSERT INTO `tbl_pdf` VALUES (18, 'วิทยาศาสตร์', 'doc_102853273220230922_104658.pdf', '2023-09-22', '', '');
INSERT INTO `tbl_pdf` VALUES (20, 'วิทยาศาสตร์', 'doc_68081158120230924_083348.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (21, 'วิทยาศาสตร์', 'doc_650fa8f58d3a7.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (22, 'วิทยาศาสตร์', 'doc_650fa9f308705.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (23, 'วิทยาศาสตร์', 'doc_650faa1973fd0.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (24, 'วิทยาศาสตร์', 'doc_650faa4da3dbe.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (25, 'วิทยาศาสตร์', 'doc_650fabf43edb3.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (26, 'วิทยาศาสตร์', 'doc_650facbe01445.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (27, 'วิทยาศาสตร์', 'doc_650fad796416f.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (28, 'วิทยาศาสตร์', 'doc_650fae8fe1c63.pdf', '2023-09-24', '', '');
INSERT INTO `tbl_pdf` VALUES (29, 'วิทยาศาสตร์', 'doc_650fc2172a3d9.pdf', '2023-09-24', '', '');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `t_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`t_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (0, 'lll', '', 0, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (101, 'ทวีสิน', 'จิระนนทกร', 1, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (102, 'สลินทิพย์', 'ศรีเงิน', 1, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (103, 'เมธาวี', 'ไพบูลย์สวัสดิ์', 1, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (104, 'จุฬาลักษณ์', 'จันทร์เกตุ', 1, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (105, 'ฟาฏิมะฮ์', 'ตอฮา', 1, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (106, 'วราลักษณ์', 'รัฐจักร', 2, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (107, 'อนุสรณ์', 'เขียวทอง', 2, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (201, 'ณัฐณิชา', 'วังบุญคง', 3, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (202, 'กชกร', 'ชูสุข', 3, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (203, 'Mr. Lei', 'Yutian', 4, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (301, 'มนฤดี', 'ดำเอี่ยม', 5, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (302, 'ศิริชัย', 'ไหมด้วง', 5, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (401, 'ปริญา', 'โต๊ะขวัญ', 6, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (402, 'กนกณิศา ', 'เรืองวุฒิ', 6, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (501, 'ณัศรุฒน์', 'หลีหนุด', 7, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (502, 'พิชชากร ', 'ตะนุสะ', 7, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (601, 'ศักสุดา ', 'แสงมณี', 8, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (602, 'พิมประภา ', 'เจ้ยแก้ว', 9, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (603, 'วีรศักดิ์ ', 'มะลิทอง', 10, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (604, 'กฤตนันท์ ', 'นวลแก้ว', 11, NULL, NULL, NULL, NULL);
INSERT INTO `teacher` VALUES (701, 'วรรณพัชร', 'ชูทอง', 11, NULL, NULL, '2023-09-24 11:33:44', NULL);
INSERT INTO `teacher` VALUES (777, '4454', '456', 22, NULL, NULL, '2023-09-24 11:36:53', '2023-09-24 11:36:39');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usertype_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `usertype_id`(`usertype_id` ASC) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`usertype_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (00001, 'สุไวบะห์', 'นาวานิ', 'suwaibah.8989ptn@gmail.com', '0631031175', '188659262620230923_164150.png', 'cherbell', '1234', 1);
INSERT INTO `user` VALUES (00002, 'yanisa', 'longklang', 'iyou66677@gmail.com', '0980918573', '135831310120230923_164235.png', 'yanisa', '1234', 2);
INSERT INTO `user` VALUES (00003, 'ทวีสิน', 'จิระนนทกร', 'thawisin@gmail.com', '0980918573', '79261275820230924_005746.png', 'thawisin', '1234', 2);
INSERT INTO `user` VALUES (00004, 'กชกร ', 'ชูสุข', 'kokchakorn@gmail.com', '0806508103', '145863445920230924_010045.png', 'kokchakorn', '1234', 3);
INSERT INTO `user` VALUES (00005, 'มนฤดี ', 'ดำเอี่ยม', 'mon@gmail.com', '0806508175', '127474193220230924_010226.png', 'mon', '1234', 4);

-- ----------------------------
-- Table structure for usertype
-- ----------------------------
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE `usertype`  (
  `usertype_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_timestamp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`usertype_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usertype
-- ----------------------------
INSERT INTO `usertype` VALUES (1, 'admin', NULL, NULL, NULL, '2023-09-24 14:02:53');
INSERT INTO `usertype` VALUES (2, 'user', NULL, NULL, NULL, '2023-09-24 14:02:53');
INSERT INTO `usertype` VALUES (3, 'หัวหน้ากลุ่มสาระวิทยาศาตร์', NULL, NULL, NULL, '2023-09-24 14:02:53');
INSERT INTO `usertype` VALUES (4, 'หัวหน้ากลุ่มสาระภาษาต่างประเทศ', NULL, NULL, NULL, '2023-09-24 14:02:53');
INSERT INTO `usertype` VALUES (5, 'หัวหน้ากลุ่มสาระภาษาไทย', NULL, NULL, NULL, '2023-09-24 14:02:53');

-- ----------------------------
-- View structure for permission_api_usertype_full
-- ----------------------------
DROP VIEW IF EXISTS `permission_api_usertype_full`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `permission_api_usertype_full` AS SELECT
	permission_api_usertype.*,
	api_page.file_name,
	usertype.description 
FROM
	`permission_api_usertype`
	LEFT JOIN api_page ON permission_api_usertype.api_page_id = api_page.id 
	LEFT JOIN usertype ON usertype.usertype_id = permission_api_usertype.usertype_id ;

-- ----------------------------
-- View structure for user_usertype
-- ----------------------------
DROP VIEW IF EXISTS `user_usertype`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `user_usertype` AS SELECT user.* , usertype.description  FROM `user` LEFT JOIN usertype ON user.usertype_id = usertype.usertype_id ;

SET FOREIGN_KEY_CHECKS = 1;
