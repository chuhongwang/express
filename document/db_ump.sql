/*
Navicat MySQL Data Transfer

Source Server         : ump
Source Server Version : 50627
Source Host           : 192.168.1.120:3306
Source Database       : ylb_ump

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2017-04-12 21:32:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ump_agency
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency`;
CREATE TABLE `ump_agency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(255) NOT NULL COMMENT '机构名称',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0. 未审核 1. 审核通过 -1. 审核未通过/禁用',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='组织机构表';



-- ----------------------------
-- Table structure for ump_agency_debt_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_debt_amount`;
CREATE TABLE `ump_agency_debt_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '相应机构id',
  `value` decimal(11,2) NOT NULL COMMENT '相应机构新债权金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计相应机构的新债权金额表';

-- ----------------------------
-- Table structure for ump_agency_debt_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_debt_amount_a1`;
CREATE TABLE `ump_agency_debt_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '相应机构id',
  `value` decimal(11,2) NOT NULL COMMENT '任我花A1新债权金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计任我花A1新债权金额表';



-- ----------------------------
-- Table structure for ump_agency_interest_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_interest_amount`;
CREATE TABLE `ump_agency_interest_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '相关机构id',
  `value` decimal(15,2) NOT NULL COMMENT '付息金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='相关机构付息金额表';

-- ----------------------------
-- Table structure for ump_agency_interest_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_interest_amount_a1`;
CREATE TABLE `ump_agency_interest_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '任我花A1的id',
  `value` decimal(15,2) NOT NULL COMMENT '任我花A1的付息金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='任我花A1的付息金额表';




-- ----------------------------
-- Table structure for ump_agency_investing_amount_out
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_investing_amount_out`;
CREATE TABLE `ump_agency_investing_amount_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '相关组织机构id',
  `value` decimal(11,2) NOT NULL COMMENT '在贷余额',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='相关机构在贷余额统计表';

-- ----------------------------
-- Table structure for ump_agency_investing_amount_out_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_investing_amount_out_a1`;
CREATE TABLE `ump_agency_investing_amount_out_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '任我花A1的id',
  `value` decimal(11,2) NOT NULL COMMENT '任我花A1在贷余额',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='任我花A1在贷余额统计表';



-- ----------------------------
-- Table structure for ump_agency_payout_principal_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_payout_principal_amount`;
CREATE TABLE `ump_agency_payout_principal_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  `value` decimal(15,2) NOT NULL COMMENT '还本金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计相应机构的还本总金额表';

-- ----------------------------
-- Table structure for ump_agency_payout_principal_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_agency_payout_principal_amount_a1`;
CREATE TABLE `ump_agency_payout_principal_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  `value` decimal(15,2) NOT NULL COMMENT '还本金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='任我花A1机构的还本总金额表';



-- ----------------------------
-- Table structure for ump_cost_coupons
-- ----------------------------
DROP TABLE IF EXISTS `ump_cost_coupons`;
CREATE TABLE `ump_cost_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '总成本',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='满返券成本历史统计表';


-- ----------------------------
-- Table structure for ump_cost_experience_invest
-- ----------------------------
DROP TABLE IF EXISTS `ump_cost_experience_invest`;
CREATE TABLE `ump_cost_experience_invest` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '总成本',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='体验金成本历史统计表';


-- ----------------------------
-- Table structure for ump_cost_extra_money
-- ----------------------------
DROP TABLE IF EXISTS `ump_cost_extra_money`;
CREATE TABLE `ump_cost_extra_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '总成本',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='派息成本历史统计表';



-- ----------------------------
-- Table structure for ump_cw_capital_verification
-- ----------------------------
DROP TABLE IF EXISTS `ump_cw_capital_verification`;
CREATE TABLE `ump_cw_capital_verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `principal_amount` decimal(15,2) NOT NULL COMMENT '还本金额（元）：所有机构在统计日当日需要返还本金的债权的返还的本金总金额',
  `interest_amount` decimal(15,2) NOT NULL COMMENT '付息金额(元)：所有机构在统计日当日需付息的债权的付息的总金额',
  `recharge_amount` decimal(15,2) NOT NULL COMMENT '充值金额(元)：在统计日当日所有用户充值的总金额',
  `invest_amount` decimal(15,2) NOT NULL COMMENT '投资金额(元)：在统计日当日所有用户投资的总金额',
  `withdraw_amount` decimal(15,2) NOT NULL COMMENT '提现金额(元):在统计日当日所有用户提现的总金额',
  `jx_account_balance` decimal(15,2) NOT NULL COMMENT '江西银行账户余额(元)在统计日T日的T+1日02：00统计的江西银行账户余额',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '统计日期',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='财务对账中的债券数据中的平台投资人资金每日核对表';



-- ----------------------------
-- Table structure for ump_cw_day
-- ----------------------------
DROP TABLE IF EXISTS `ump_cw_day`;
CREATE TABLE `ump_cw_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构的id',
  `agency_name` varchar(255) NOT NULL COMMENT '机构名称',
  `payout_principal_amount` decimal(15,2) NOT NULL COMMENT '还本金额(元)：对应机构在统计日当日需要返还本金的债权的返还的本金总金额',
  `investing_amount_amount` decimal(15,2) NOT NULL COMMENT '在贷余额(元)：对应机构在统计日当日已被投资而尚未返本的债权总金额\r\n',
  `debt_out_amount` decimal(15,2) NOT NULL COMMENT '已慕满（放款）(元)对应机构在统计日当日被已经慕满且已经放款的债权的已经放款的总金额',
  `debt_not_out_amount` decimal(15,2) NOT NULL COMMENT '已慕满（未放款）:对应机构在统计日当日被已经慕满但未放款的债权的总金额',
  `raise_debt_amount` decimal(15,2) NOT NULL COMMENT '募集中(元):对应机构在统计日当日正在募集中的债权的总金额',
  `no_rasie_debt_amount` decimal(15,2) NOT NULL COMMENT '未开始募集(元)：对应机构在统计日当日还未开始募集的债权的总金额',
  `increase_debt_amount` decimal(15,2) NOT NULL COMMENT '新增债权金额(元)：对应机构在统计日当日机构推送过来的债权的总金额',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '统计日期',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='财务对账中的债券数据中的平台当日数据统计表';



-- ----------------------------
-- Table structure for ump_cw_principal_interest
-- ----------------------------
DROP TABLE IF EXISTS `ump_cw_principal_interest`;
CREATE TABLE `ump_cw_principal_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  `agency_name` varchar(255) NOT NULL COMMENT '组织结构名称',
  `principal_amount` decimal(15,2) NOT NULL COMMENT '对应机构对应产品的项目返本（元）',
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='财务统计中的返本派息表';



-- ----------------------------
-- Table structure for ump_cw_recharge_details
-- ----------------------------
DROP TABLE IF EXISTS `ump_cw_recharge_details`;
CREATE TABLE `ump_cw_recharge_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jx_recharge_amount` decimal(15,2) NOT NULL COMMENT '江西银行充值金额(元)',
  `jx_recharge_count` int(11) NOT NULL COMMENT '江西银行充值笔数（笔）',
  `recharge_amount` decimal(15,2) NOT NULL COMMENT '线上加线下的总的充值金额（元）',
  `recharge_cost_amount` decimal(15,2) NOT NULL COMMENT '充值成本（元）：',
  `withdraw_count` int(11) NOT NULL COMMENT '提现笔数：在统计日当日提现的总笔数（不包含借款人提现笔数）',
  `withdraw_amount` decimal(15,2) NOT NULL COMMENT '提现金额（元）：在统计日当日提现的总金额（不包含借款人提现金额）',
  `withdraw_cost_amount` decimal(15,2) NOT NULL COMMENT '提现成本',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '统计时间',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='财务对账中的充值提现明细表';


-- ----------------------------
-- Table structure for ump_daily_funds
-- ----------------------------
DROP TABLE IF EXISTS `ump_daily_funds`;
CREATE TABLE `ump_daily_funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recharge_amount` decimal(15,2) NOT NULL COMMENT '在统计日所有用户充值的总金额（不包含借款人的充值金额）（元）',
  `first_recharge_amount` decimal(15,2) NOT NULL COMMENT '在统计日当天第一次充值的用户已经充值成功的充值的总金额（不包含借款人的充值金额）（元）',
  `withdraw_amount` decimal(15,2) NOT NULL COMMENT '在统计日所有用户已经提现成功提现的总金额（不包含借款人的提现金额）（元）',
  `invest_amount` decimal(15,2) NOT NULL COMMENT '成交额（算上复投的）(元):在统计日当天所有用户首次投资总金额和所有复投的总金额',
  `payout_principal_amount` decimal(15,2) NOT NULL COMMENT '还本(元)：在统计日当天已经到期的债权返还本金至用户账户余额的总金额',
  `interest_amount` decimal(15,2) NOT NULL COMMENT '派息(元)在统计日当天给用户发放的利息的总金额（不包含借款人的派息金额）',
  `transfers_count` int(11) NOT NULL COMMENT '债权转让笔数(笔)在统计日当天已经变现成功的笔数',
  `transfers_amount` decimal(15,2) NOT NULL COMMENT '债权转让申请金额(元)：在统计日当天申请变现的总金额',
  `balance_amount` decimal(15,2) NOT NULL COMMENT '投资人余额(元)在统计日当天所有用户的账户余额（不包含借款人的账户金额）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '对应原始数据的统计时间',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='日报表资金统计';


-- ----------------------------
-- Table structure for ump_daily_integrated
-- ----------------------------
DROP TABLE IF EXISTS `ump_daily_integrated`;
CREATE TABLE `ump_daily_integrated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_investing_amount` decimal(15,2) NOT NULL COMMENT '在投总金额(元)：在统计日当天所有投资人正在投资的总金额',
  `total_avg_invest_amount` decimal(15,2) NOT NULL COMMENT '人均投资总额(元)：在统计日当天平均每个人的投资总额',
  `avg_15_recharge_amount` decimal(15,2) NOT NULL COMMENT '15天平均充值额(元)：从（T-15）日至统计日当天T日平均每天的充值金额',
  `avg_15_withdraw_amount` decimal(15,2) NOT NULL COMMENT '15天平均提现额(元)：从（T-15）日至统计日当天T日平均每天的提现金额',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '对应原始数据的统计时间',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='日报综合统计表';



-- ----------------------------
-- Table structure for ump_daily_project
-- ----------------------------
DROP TABLE IF EXISTS `ump_daily_project`;
CREATE TABLE `ump_daily_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debt_count` int(11) NOT NULL COMMENT '新债券数量（笔）：在统计日当天从不同机构推送过来的债权总笔数',
  `debt_amount` decimal(15,2) NOT NULL COMMENT '新债权金额(元)：在统计日当天从不同机构推送过来的债权总金额',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '对应原始数据的统计时间',
  `statistics_time` time DEFAULT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='日报项目统计表';


-- ----------------------------
-- Table structure for ump_daily_users
-- ----------------------------
DROP TABLE IF EXISTS `ump_daily_users`;
CREATE TABLE `ump_daily_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `new_register_user_count` int(11) NOT NULL COMMENT '新注册（人数）',
  `new_first_invest_count` int(11) NOT NULL COMMENT '首次投资人数',
  `new_first_recharge_count` int(11) NOT NULL COMMENT '首次充值（人数）',
  `sign_in_count` int(11) NOT NULL COMMENT '签到（人数）',
  `invest_0_2` int(11) NOT NULL COMMENT '在投资金【0—2W】(人数)',
  `invest_2_10` int(11) NOT NULL COMMENT '在投资金【2—10W](人数)',
  `invest_10_20` int(11) NOT NULL COMMENT '在投资金【10—20W】（人数）',
  `invest_20_` int(11) NOT NULL COMMENT '在投资金【20W以上】（人数）',
  `total_invest_count` int(11) NOT NULL COMMENT '累计投资人',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `statistics_at` date DEFAULT NULL COMMENT '原来的数据所属的统计时间',
  `statistics_time` time DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='针对用户的日报统计分析表';


-- ----------------------------
-- Table structure for ump_debt_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_amount`;
CREATE TABLE `ump_debt_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '新债权金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计新债权金额表';



-- ----------------------------
-- Table structure for ump_debt_not_raise_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_not_raise_amount`;
CREATE TABLE `ump_debt_not_raise_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构id',
  `value` decimal(15,2) NOT NULL COMMENT '未募集金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计未募集金额表（放款）';

-- ----------------------------
-- Table structure for ump_debt_not_raise_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_not_raise_amount_a1`;
CREATE TABLE `ump_debt_not_raise_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构id',
  `value` decimal(15,2) NOT NULL COMMENT '任我花A1未募集金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计任我花A1未募集金额表';



-- ----------------------------
-- Table structure for ump_debt_num
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_num`;
CREATE TABLE `ump_debt_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '债权数量',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='债权数量统计表';

-- ----------------------------
-- Table structure for ump_debt_raise_full_credit_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raise_full_credit_amount`;
CREATE TABLE `ump_debt_raise_full_credit_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构id',
  `value` decimal(15,2) NOT NULL COMMENT '已慕满金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计已慕满金额表（放款）';

-- ----------------------------
-- Table structure for ump_debt_raise_full_credit_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raise_full_credit_amount_a1`;
CREATE TABLE `ump_debt_raise_full_credit_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '任我花A1id',
  `value` decimal(15,2) NOT NULL COMMENT '任我花A1已慕满金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计任我花A1已慕满金额表';


-- ----------------------------
-- Table structure for ump_debt_raise_full_not_credit_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raise_full_not_credit_amount`;
CREATE TABLE `ump_debt_raise_full_not_credit_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构id',
  `value` decimal(15,2) NOT NULL COMMENT '已慕满金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计已慕满金额表(未放款)';

-- ----------------------------
-- Table structure for ump_debt_raise_full_not_credit_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raise_full_not_credit_amount_a1`;
CREATE TABLE `ump_debt_raise_full_not_credit_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '任我花A1id',
  `value` decimal(15,2) NOT NULL COMMENT '任我花A1已慕满（未放款）金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计任我花A1已慕满(未放款)金额表';


-- ----------------------------
-- Table structure for ump_debt_raising_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raising_amount`;
CREATE TABLE `ump_debt_raising_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '机构id',
  `value` decimal(15,2) NOT NULL COMMENT '募集中金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计募集中金额表（放款）';

-- ----------------------------
-- Table structure for ump_debt_raising_amount_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_debt_raising_amount_a1`;
CREATE TABLE `ump_debt_raising_amount_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '任我花A1id',
  `value` decimal(15,2) NOT NULL COMMENT '任我花A1募集中金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='统计任我花A1募集中金额表';





-- ----------------------------
-- Table structure for ump_interest_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_interest_amount`;
CREATE TABLE `ump_interest_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '派息金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史统计派息总金额表';



-- ----------------------------
-- Table structure for ump_invest_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_invest_amount`;
CREATE TABLE `ump_invest_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '成交额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史统计成交额表';



-- ----------------------------
-- Table structure for ump_invest_people
-- ----------------------------
DROP TABLE IF EXISTS `ump_invest_people`;
CREATE TABLE `ump_invest_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '历史投资用户',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史投资用户（数量）统计表';



-- ----------------------------
-- Table structure for ump_investing_amount_in
-- ----------------------------
DROP TABLE IF EXISTS `ump_investing_amount_in`;
CREATE TABLE `ump_investing_amount_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '再投金额',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='再投资金统计表';



-- ----------------------------
-- Table structure for ump_investing_amount_out
-- ----------------------------
DROP TABLE IF EXISTS `ump_investing_amount_out`;
CREATE TABLE `ump_investing_amount_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '再投金额',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='在贷资金统计表';



-- ----------------------------
-- Table structure for ump_investing_num_in
-- ----------------------------
DROP TABLE IF EXISTS `ump_investing_num_in`;
CREATE TABLE `ump_investing_num_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '在投总人数',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='在投总人数状态统计表';



-- ----------------------------
-- Table structure for ump_jx_balance_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_jx_balance_amount`;
CREATE TABLE `ump_jx_balance_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '账户余额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='江西银行账户余额表';



-- ----------------------------
-- Table structure for ump_jx_recharge_num
-- ----------------------------
DROP TABLE IF EXISTS `ump_jx_recharge_num`;
CREATE TABLE `ump_jx_recharge_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值笔数',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='江西银行充值笔数统计表';



-- ----------------------------
-- Table structure for ump_member_account_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_member_account_amount`;
CREATE TABLE `ump_member_account_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '投资人余额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史统计投资人余额表';



-- ----------------------------
-- Table structure for ump_new_invest_people
-- ----------------------------
DROP TABLE IF EXISTS `ump_new_invest_people`;
CREATE TABLE `ump_new_invest_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '新增投资用户',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='新增投资用户（数量）统计表';


-- ----------------------------
-- Table structure for ump_new_recharge
-- ----------------------------
DROP TABLE IF EXISTS `ump_new_recharge`;
CREATE TABLE `ump_new_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史首次充值金额统计表';


-- ----------------------------
-- Table structure for ump_new_register
-- ----------------------------
DROP TABLE IF EXISTS `ump_new_register`;
CREATE TABLE `ump_new_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '注册数量',
  `statistics_at` date NOT NULL COMMENT '创建时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='新增注册用户统计';



-- ----------------------------
-- Table structure for ump_payout_principal
-- ----------------------------
DROP TABLE IF EXISTS `ump_payout_principal`;
CREATE TABLE `ump_payout_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '还本金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史还本总金额表';



-- ----------------------------
-- Table structure for ump_platform_overview
-- ----------------------------
DROP TABLE IF EXISTS `ump_platform_overview`;
CREATE TABLE `ump_platform_overview` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `today_invest_amount` decimal(15,2) NOT NULL COMMENT '今日成交额',
  `today_payout_cost_amount` decimal(15,2) NOT NULL COMMENT '今日总成本',
  `today_register_count` int(11) NOT NULL COMMENT '当日新增注册用户个数',
  `today_recharge_amount` decimal(15,2) NOT NULL COMMENT '当日充值总额',
  `today_withdraw_amount` decimal(15,2) NOT NULL COMMENT '当日提现总金额',
  `investing_amount` decimal(15,2) NOT NULL COMMENT '平台在贷余额(再投余额)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='UMP系统平台数据总览（该表数据统计的当天的实时数据，最长会有一个小时的延迟）';


-- ----------------------------
-- Table structure for ump_product
-- ----------------------------
DROP TABLE IF EXISTS `ump_product`;
CREATE TABLE `ump_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `product_name` varchar(32) NOT NULL COMMENT '产品名称，如月利宝',
  `is_suspend` tinyint(4) DEFAULT '0' COMMENT '是否暂停售卖：0不是,1是',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='产品表';



-- ----------------------------
-- Table structure for ump_product_payout_principal
-- ----------------------------
DROP TABLE IF EXISTS `ump_product_payout_principal`;
CREATE TABLE `ump_product_payout_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `value` decimal(15,2) NOT NULL COMMENT '还本金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='已选产品项目返本表';

-- ----------------------------
-- Table structure for ump_product_payout_principal_a1
-- ----------------------------
DROP TABLE IF EXISTS `ump_product_payout_principal_a1`;
CREATE TABLE `ump_product_payout_principal_a1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL COMMENT '组织机构id',
  `product_id` int(11) NOT NULL COMMENT '任我花A1产品id',
  `value` decimal(15,2) NOT NULL COMMENT '还本金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='任我花A1产品项目返本表';



-- ----------------------------
-- Table structure for ump_recharge
-- ----------------------------
DROP TABLE IF EXISTS `ump_recharge`;
CREATE TABLE `ump_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史充值金额统计表';



-- ----------------------------
-- Table structure for ump_recharge_cost_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_recharge_cost_amount`;
CREATE TABLE `ump_recharge_cost_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值总成本（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='充值总成本统计表';



-- ----------------------------
-- Table structure for ump_recharge_offline
-- ----------------------------
DROP TABLE IF EXISTS `ump_recharge_offline`;
CREATE TABLE `ump_recharge_offline` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史线下充值金额统计表';



-- ----------------------------
-- Table structure for ump_recharge_people
-- ----------------------------
DROP TABLE IF EXISTS `ump_recharge_people`;
CREATE TABLE `ump_recharge_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '充值次数',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史充值人数统计表';



-- ----------------------------
-- Table structure for ump_reinvest_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_reinvest_amount`;
CREATE TABLE `ump_reinvest_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '复投金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史统计复投金额表';


-- ----------------------------
-- Table structure for ump_sign_people
-- ----------------------------
DROP TABLE IF EXISTS `ump_sign_people`;
CREATE TABLE `ump_sign_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `value` decimal(15,2) NOT NULL COMMENT '签到次数',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史签到人数统计表';



-- ----------------------------
-- Table structure for ump_transfer_amount
-- ----------------------------
DROP TABLE IF EXISTS `ump_transfer_amount`;
CREATE TABLE `ump_transfer_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '债权转让金额（元）',
  `statistics_at` date NOT NULL COMMENT '统计日期',
  `statistics_time` time NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='历史债权转让金额表';



-- ----------------------------
-- Table structure for ump_transfer_num
-- ----------------------------
DROP TABLE IF EXISTS `ump_transfer_num`;
CREATE TABLE `ump_transfer_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '债权转让笔数',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='债权转让笔数统计表';


-- ----------------------------
-- Table structure for ump_withdraw
-- ----------------------------
DROP TABLE IF EXISTS `ump_withdraw`;
CREATE TABLE `ump_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(15,2) NOT NULL COMMENT '提现金额（元）',
  `statistics_at` date NOT NULL COMMENT '创建时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='提现金额历史统计表';



-- ----------------------------
-- Table structure for ump_withdraw_num
-- ----------------------------
DROP TABLE IF EXISTS `ump_withdraw_num`;
CREATE TABLE `ump_withdraw_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL COMMENT '提现笔数',
  `statistics_at` date NOT NULL COMMENT '统计时间',
  `statistics_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='提现笔数统计表';

