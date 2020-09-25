/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : mydb

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 25/09/2020 16:51:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for covid_patient
-- ----------------------------
DROP TABLE IF EXISTS `covid_patient`;
CREATE TABLE `covid_patient`  (
  `cp_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cp_fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cp_gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cp_dob` date NULL DEFAULT NULL,
  `cp_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cp_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cp_phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cp_status` tinyint(1) NULL DEFAULT NULL,
  `cp_created_at` datetime(0) NULL DEFAULT NULL,
  `cp_updated_at` datetime(0) NULL,
  `cp_created_by` int(10) NULL DEFAULT NULL,
  `cp_updated_by` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`cp_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of covid_patient
-- ----------------------------
INSERT INTO `covid_patient` VALUES ('CP0001', 'Kenny Christian', 'Male', '2000-12-12', 'Jl. Test No 123', 'Jakarta Barat', '081231231231', 1, '2020-09-24 14:55:52', '2020-09-25 11:09:01', 1, 1);
INSERT INTO `covid_patient` VALUES ('CP0002', 'Budi', 'Male', '1996-01-09', 'Jl Bud No 1', 'Jakarta Pusat', '0891919119', 1, '2020-09-25 11:07:46', '2020-09-25 11:13:12', 1, 1);
INSERT INTO `covid_patient` VALUES ('CP0003', 'Livia', 'Female', '1996-10-02', 'Jl Liv No 29', 'Jakarta Utara', '08989', 1, '2020-09-25 11:10:57', '0000-00-00 00:00:00', 1, NULL);
INSERT INTO `covid_patient` VALUES ('CP0004', 'Jonathan', 'Male', '1998-02-02', 'Jl Bang Jo No 23', 'Jakarta Barat', '089-23-825', 1, '2020-09-25 11:13:01', '2020-09-25 13:12:03', 1, 2);

-- ----------------------------
-- Table structure for covid_patient_record
-- ----------------------------
DROP TABLE IF EXISTS `covid_patient_record`;
CREATE TABLE `covid_patient_record`  (
  `cpr_id` int(15) NOT NULL AUTO_INCREMENT,
  `cpr_cp_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cpr_pic_sip_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cpr_check_in` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cpr_check_out` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cpr_status` int(10) NULL DEFAULT NULL,
  `cpr_is_active` tinyint(1) NULL DEFAULT NULL,
  `cpr_created_at` datetime(0) NULL DEFAULT NULL,
  `cpr_updated_at` datetime(0) NULL DEFAULT NULL,
  `cpr_created_by` int(10) NULL DEFAULT NULL,
  `cpr_updated_by` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`cpr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of covid_patient_record
-- ----------------------------
INSERT INTO `covid_patient_record` VALUES (1, 'CP0001', 'SIP0001', '2020-09-11 00:03:03', '2020-09-25 11:09:01', 2, 1, '2020-09-11 15:05:20', '2020-09-25 16:28:43', 1, 1);
INSERT INTO `covid_patient_record` VALUES (2, 'CP0002', 'SIP0002', '2020-09-11 06:07:03', '2020-09-25 11:13:12', 2, 1, '2020-09-11 11:07:46', '2020-09-25 11:13:12', 1, 1);
INSERT INTO `covid_patient_record` VALUES (3, 'CP0001', 'SIP0002', '2020-09-22 06:09:05', NULL, 1, 1, '2020-09-22 11:09:45', NULL, 1, NULL);
INSERT INTO `covid_patient_record` VALUES (4, 'CP0003', 'SIP0001', '2020-09-23 06:10:10', NULL, 1, 1, '2020-09-23 11:10:57', NULL, 1, NULL);
INSERT INTO `covid_patient_record` VALUES (5, 'CP0004', 'SIP0001', '2020-09-25 06:12:08', NULL, 1, 1, '2020-09-25 11:13:01', '2020-09-25 13:12:03', 1, 2);

-- ----------------------------
-- Table structure for covid_patient_status
-- ----------------------------
DROP TABLE IF EXISTS `covid_patient_status`;
CREATE TABLE `covid_patient_status`  (
  `cps_id` int(10) NOT NULL AUTO_INCREMENT,
  `cps_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cps_status` tinyint(1) NULL DEFAULT NULL,
  `cps_created_at` datetime(0) NULL DEFAULT NULL,
  `cps_updated_at` datetime(0) NULL,
  `cps_created_by` int(10) NULL DEFAULT NULL,
  `cps_updated_by` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`cps_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of covid_patient_status
-- ----------------------------
INSERT INTO `covid_patient_status` VALUES (1, 'In Treatment', 1, '2020-09-24 15:57:56', NULL, 1, NULL);
INSERT INTO `covid_patient_status` VALUES (2, 'Discharge', 1, '2020-09-24 15:59:11', NULL, 1, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_role_id` int(10) NULL DEFAULT NULL,
  `u_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `u_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `u_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `u_status` tinyint(1) NULL DEFAULT NULL,
  `u_created_at` datetime(0) NULL DEFAULT NULL,
  `u_updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 'Superadmin', 'su@covid.com', '$2y$10$0X/e9OjfP6Tf8pZgJlqtsu8sop.FfBgyTPG6Q.TLKg.UD68fjD8qu', 1, '2020-09-24 11:17:09', NULL);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `r_id` int(5) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `r_status` tinyint(1) NULL DEFAULT NULL,
  `r_created_at` datetime(0) NULL DEFAULT NULL,
  `r_updated_at` datetime(0) NULL DEFAULT NULL,
  `r_created_by` int(10) NULL DEFAULT NULL,
  `r_updated_by` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`r_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Superadmin', 1, '2020-09-24 15:01:21', NULL, NULL, NULL);
INSERT INTO `user_role` VALUES (2, 'Admin', 1, '2020-09-25 13:11:16', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
