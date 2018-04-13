/*
Navicat MySQL Data Transfer

Source Server         : 114.215.154.14
Source Server Version : 50717
Source Host           : 114.215.154.14:3306
Source Database       : ylb_ump

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-04-28 16:46:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ump_payback_method
-- ----------------------------
DROP TABLE IF EXISTS `ump_payback_method`;
CREATE TABLE `ump_payback_method` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `payback_method_id` int(4) DEFAULT NULL COMMENT '还款方式id',
  `paback_method_name` varchar(255) DEFAULT NULL COMMENT '还款方式名称',
  `status` tinyint(4) DEFAULT '0' COMMENT '0：未删除；1：删除',
  `sort_id` int(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='还款方式字典表';

-- ----------------------------
-- Records of ump_payback_method
-- ----------------------------
INSERT INTO `ump_payback_method` VALUES ('1', '1', '到期还本付息', '0', '1');
INSERT INTO `ump_payback_method` VALUES ('2', '2', '先息后本', '0', '2');
INSERT INTO `ump_payback_method` VALUES ('3', '3', '等本等息', '0', '3');
INSERT INTO `ump_payback_method` VALUES ('4', '4', '等额本息', '0', '4');
SET FOREIGN_KEY_CHECKS=1;
