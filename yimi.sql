/*
Navicat MySQL Data Transfer

Source Server         : ljz
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yimi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-29 20:28:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yimi_address
-- ----------------------------
DROP TABLE IF EXISTS `yimi_address`;
CREATE TABLE `yimi_address` (
  `add_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否默认地址',
  PRIMARY KEY (`add_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_address
-- ----------------------------

-- ----------------------------
-- Table structure for yimi_cart
-- ----------------------------
DROP TABLE IF EXISTS `yimi_cart`;
CREATE TABLE `yimi_cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_num` int(11) NOT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否选中',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_cart
-- ----------------------------

-- ----------------------------
-- Table structure for yimi_cate
-- ----------------------------
DROP TABLE IF EXISTS `yimi_cate`;
CREATE TABLE `yimi_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `level` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_cate
-- ----------------------------
INSERT INTO `yimi_cate` VALUES ('1', '水果', '0', '1', '0');
INSERT INTO `yimi_cate` VALUES ('2', '蔬菜', '0', '2', '0');
INSERT INTO `yimi_cate` VALUES ('3', '海鲜', '0', '3', '0');
INSERT INTO `yimi_cate` VALUES ('4', '橘子', '1', '1,4', '1');
INSERT INTO `yimi_cate` VALUES ('5', '芒果', '1', '1,5', '1');
INSERT INTO `yimi_cate` VALUES ('6', '香菇', '2', '2,6', '1');
INSERT INTO `yimi_cate` VALUES ('7', '鱼类', '3', '3,7', '1');
INSERT INTO `yimi_cate` VALUES ('8', '虾类', '3', '3,8', '1');
INSERT INTO `yimi_cate` VALUES ('9', '小黄鱼', '7', '3,7,9', '2');
INSERT INTO `yimi_cate` VALUES ('10', '小龙虾', '8', '3,8,10', '2');
INSERT INTO `yimi_cate` VALUES ('36', '香蕉', '1', '1,36', '1');

-- ----------------------------
-- Table structure for yimi_goods
-- ----------------------------
DROP TABLE IF EXISTS `yimi_goods`;
CREATE TABLE `yimi_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(20) NOT NULL,
  `sell_price` decimal(8,2) NOT NULL,
  `market_price` decimal(8,2) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `store` int(20) NOT NULL,
  `freez` int(20) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `point` int(11) NOT NULL,
  `content` text NOT NULL,
  `last_modify_id` int(11) NOT NULL,
  `last_time` int(11) NOT NULL,
  `is_up` tinyint(1) NOT NULL DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_goods
-- ----------------------------

-- ----------------------------
-- Table structure for yimi_image
-- ----------------------------
DROP TABLE IF EXISTS `yimi_image`;
CREATE TABLE `yimi_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `img_b_url` varchar(100) NOT NULL,
  `img_m_url` varchar(100) NOT NULL,
  `img_s_url` varchar(255) NOT NULL,
  `is_face` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否首页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_image
-- ----------------------------

-- ----------------------------
-- Table structure for yimi_item
-- ----------------------------
DROP TABLE IF EXISTS `yimi_item`;
CREATE TABLE `yimi_item` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_num` int(11) NOT NULL,
  `goods_price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_item
-- ----------------------------

-- ----------------------------
-- Table structure for yimi_manager
-- ----------------------------
DROP TABLE IF EXISTS `yimi_manager`;
CREATE TABLE `yimi_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '权限管理',
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_manager
-- ----------------------------
INSERT INTO `yimi_manager` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '0');
INSERT INTO `yimi_manager` VALUES ('2', 'ljz', 'e10adc3949ba59abbe56e057f20f883e', '0', '0');
INSERT INTO `yimi_manager` VALUES ('4', 'iii', 'e10adc3949ba59abbe56e057f20f883e', '0', '1');
INSERT INTO `yimi_manager` VALUES ('6', 'qwer', '202cb962ac59075b964b07152d234b70', '0', '1');
INSERT INTO `yimi_manager` VALUES ('10', 'haha', '963017110c3d4f8b8a617203897535fa', '0', '0');
INSERT INTO `yimi_manager` VALUES ('11', 'eqwrf', 'e10adc3949ba59abbe56e057f20f883e', '0', '0');

-- ----------------------------
-- Table structure for yimi_member
-- ----------------------------
DROP TABLE IF EXISTS `yimi_member`;
CREATE TABLE `yimi_member` (
  `member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL,
  `reg_time` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_member
-- ----------------------------
INSERT INTO `yimi_member` VALUES ('1', 'qqq', '4d1ea1367acf0560c6716dd076a84d7f', '12345678901', '', '0', '', '0', '0');
INSERT INTO `yimi_member` VALUES ('2', 'iop', '9272c6f1f7568ade07f84c80a6c90c69', '15080321110', '', '0', '', '0', '0');

-- ----------------------------
-- Table structure for yimi_order
-- ----------------------------
DROP TABLE IF EXISTS `yimi_order`;
CREATE TABLE `yimi_order` (
  `order_id` varchar(255) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ship_name` varchar(20) NOT NULL,
  `ship_mobile` varchar(20) NOT NULL,
  `ship_area` varchar(100) NOT NULL,
  `ship_address` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `status` enum('finish','dead','active') NOT NULL DEFAULT 'active',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0',
  `pay_method` enum('online','-1','weixin','alipay') NOT NULL DEFAULT 'online',
  `create_time` int(11) NOT NULL,
  `last_time` int(11) NOT NULL,
  `last_modify` varchar(255) NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_order
-- ----------------------------
