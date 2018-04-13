/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : 127.0.0.1
 Source Database       : ylb_ump

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : utf-8

 Date: 06/04/2017 21:03:59 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `common_tianrun_dial_log`
-- ----------------------------
DROP TABLE IF EXISTS `common_tianrun_dial_log`;
CREATE TABLE `common_tianrun_dial_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ylb' COMMENT '产品编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '系统用户ID',
  `tianrun_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '天润工号',
  `unique_id` int(11) NOT NULL COMMENT '外呼返回的一通电话的唯一标示',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `customer_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '客户电话',
  `dial_at` int(11) NOT NULL DEFAULT '0' COMMENT '发起外呼时间',
  `dial_flag` smallint(6) NOT NULL DEFAULT '0' COMMENT '返回状态',
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='天润拨号日志表';

DROP TABLE IF EXISTS `common_tianrun_user_config`;
CREATE TABLE `common_tianrun_user_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '系统用户ID',
  `hot_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '400热线号码;一个 400对应多个 400客服;',
  `tianrun_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '天润工号',
  `bind_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '绑定电话',
  `tianrun_pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '天润密码',
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='天润用户配置信息表';

DROP TABLE IF EXISTS `customer_return_visit_owner`;
CREATE TABLE `customer_return_visit_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `owner_id` int(11) NOT NULL DEFAULT '0' COMMENT '归属人ID',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_id` (`customer_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户回访归属表';

DROP TABLE IF EXISTS `customer_return_visit_flag`;
CREATE TABLE `customer_return_visit_flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `visit_id` int(11) NOT NULL COMMENT '回访ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作人ID',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `customer_type` int(11) NOT NULL COMMENT '客户类型 按位存储 1:生日类；2：充值失败；4：大额提现 8: 提现失败 16:账户提空; 32:余额>2万未投资 64: 超过30天无充值 128:等级快到期',
  `flag_at` int(11) NOT NULL COMMENT '提醒时间',
  `flag_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '提醒内容',
  `flag_type` int(11) NOT NULL COMMENT '提醒方式,1: 站内信 2: 邮件',
  `flag_status` smallint(6) NOT NULL DEFAULT '1' COMMENT '提醒状态  1：未提醒  2：已提醒',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `visit_id` (`visit_id`),
  KEY `user_id` (`user_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户回访提醒表';

DROP TABLE IF EXISTS `customer_return_visit`;
CREATE TABLE `customer_return_visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `product_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '产品线代码 ylb:D0301 ；hlc:D0302',
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `customer_type` int(11) NOT NULL COMMENT '客户类型 按位存储 1:生日类；2：充值失败；4：大额提现 8: 提现失败 16:账户提空; 32:余额>2万未投资 64: 超过30天无充值 128:等级快到期',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '回访人ID',
  `remark` text COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `visit_status` smallint(6) NOT NULL DEFAULT '1' COMMENT '回访状态  1：未回访   2：正在回访  3：结束回访',
  `start_visit_at` int(11) NOT NULL DEFAULT '0' COMMENT '回访开始时间',
  `stop_visit_at` int(11) NOT NULL DEFAULT '0' COMMENT '回访结束时间',
  `visit_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '回访内容',
  `assign_status` smallint(6) NOT NULL DEFAULT '1' COMMENT '分配状态  1：未分配   2：已分配',
  `assign_at` int(11) NOT NULL COMMENT '分配时间',
  `operator_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作人ID : 0 为系统',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`visit_id`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户回访记录表';


SET FOREIGN_KEY_CHECKS = 1;
