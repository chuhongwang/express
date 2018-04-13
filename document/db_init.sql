/*
Navicat MySQL Data Transfer

Source Server         : ump
Source Server Version : 50627
Source Host           : 192.168.1.120:3306
Source Database       : ylb_ump

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2017-04-12 21:33:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('客户资料', '1', '1491558143');
INSERT INTO `auth_assignment` VALUES ('管理员', '1', '1490418729');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1490416273', '1490416273');
INSERT INTO `auth_item` VALUES ('/dashboards/*', '2', null, null, null, '1490416261', '1490416261');
INSERT INTO `auth_item` VALUES ('/dashboards/day-report', '2', null, null, null, '1490425622', '1490425622');
INSERT INTO `auth_item` VALUES ('/dashboards/index', '2', null, null, null, '1490416261', '1490416261');
INSERT INTO `auth_item` VALUES ('/debt/*', '2', null, null, null, '1491550849', '1491550849');
INSERT INTO `auth_item` VALUES ('/debt/index', '2', null, null, null, '1491550839', '1491550839');
INSERT INTO `auth_item` VALUES ('/debt/payout-principal-interest', '2', null, null, null, '1491557451', '1491557451');
INSERT INTO `auth_item` VALUES ('/debt/recharge-withdraw', '2', null, null, null, '1491557514', '1491557514');
INSERT INTO `auth_item` VALUES ('/query/*', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('/query/create', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('/query/delete', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('/query/index', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('/query/update', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('/query/view', '2', null, null, null, '1491041731', '1491041731');
INSERT INTO `auth_item` VALUES ('客户资料', '2', '客户资料', null, null, '1491007409', '1491557972');
INSERT INTO `auth_item` VALUES ('管理员', '1', null, null, null, '1490416308', '1490416308');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('管理员', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/dashboards/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/dashboards/*');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/dashboards/day-report');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/dashboards/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/dashboards/index');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/debt/*');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/debt/index');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/debt/payout-principal-interest');
INSERT INTO `auth_item_child` VALUES ('客户资料', '/debt/recharge-withdraw');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/*');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/create');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/delete');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/index');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/update');
INSERT INTO `auth_item_child` VALUES ('管理员', '/query/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '平台数据', null, '/dashboards/index', '1', 0x7B2269636F6E223A223C6920636C6173733D5C2266612066612D74682D6C617267655C223E3C5C2F693E20222C2261223A2262227D);
INSERT INTO `menu` VALUES ('2', '平台总览', '1', '/dashboards/index', null, null);
INSERT INTO `menu` VALUES ('3', '日报', '1', '/dashboards/day-report', null, null);
INSERT INTO `menu` VALUES ('4', '权限管理', null, '/admin/menu/index', '99', 0x7B2269636F6E223A223C6920636C6173733D5C2266612066612D63756265732066612D66775C223E3C5C2F693E20222C2261223A2262227D);
INSERT INTO `menu` VALUES ('5', '菜单管理', '4', '/admin/menu/index', '4', null);
INSERT INTO `menu` VALUES ('6', '权限列表', '4', '/admin/permission/index', '5', null);
INSERT INTO `menu` VALUES ('7', '角色管理', '4', '/admin/role/index', '3', null);
INSERT INTO `menu` VALUES ('8', '分配角色', '4', '/admin/assignment/index', '2', null);
INSERT INTO `menu` VALUES ('9', '用户管理', '4', '/admin/user/index', '1', null);
INSERT INTO `menu` VALUES ('11', '信息查询', null, '/query/index', '3', 0x7B2269636F6E223A223C6920636C6173733D5C2266612066612D7365617263685C223E3C5C2F693E20222C2261223A2262227D);
INSERT INTO `menu` VALUES ('12', '财务对帐', null, '/debt/index', '2', 0x7B2269636F6E223A223C6920636C6173733D5C2266612066612D74682D6C617267655C223E3C5C2F693E20222C2261223A2262227D);
INSERT INTO `menu` VALUES ('13', '债权数据', '12', '/debt/index', '1', null);
INSERT INTO `menu` VALUES ('14', '返本派息', '12', '/debt/payout-principal-interest', '2', null);
INSERT INTO `menu` VALUES ('15', '充值提现明细', '12', '/debt/recharge-withdraw', '3', null);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1490413104');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1490413283');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1490413556');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1490413556');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'cbIZYIiuME23YnPnZwt12ifb32Aw_Qs-', '$2y$13$dE1yZ5oINKl/T4dTCXIfsegw5Q37Hl/zgJH7WZlbTWEXVF90Z0Qii', null, 'admin@yonglibao.com', '10', '1490413569', '1490413569');
SET FOREIGN_KEY_CHECKS=1;
