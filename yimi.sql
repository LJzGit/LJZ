/*
Navicat MySQL Data Transfer

Source Server         : ljz
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yimi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-31 20:20:07
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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

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
INSERT INTO `yimi_cate` VALUES ('46', '酸奶', '45', '45,46', '1');
INSERT INTO `yimi_cate` VALUES ('41', '电器', '0', '41', '0');
INSERT INTO `yimi_cate` VALUES ('36', '香蕉', '1', '1,36', '1');
INSERT INTO `yimi_cate` VALUES ('47', '鲜奶', '45', '45,47', '1');
INSERT INTO `yimi_cate` VALUES ('45', '乳制品类', '0', '45', '0');
INSERT INTO `yimi_cate` VALUES ('42', '家用电器', '41', '41,42', '1');
INSERT INTO `yimi_cate` VALUES ('43', '电视', '42', '41,42,43', '2');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_goods
-- ----------------------------
INSERT INTO `yimi_goods` VALUES ('5', '空调', '8400.00', '6900.00', '41', '300', '0', '热吗？', '8400', '<p>好空调</p>', '0', '1504091323', '1', '1');
INSERT INTO `yimi_goods` VALUES ('2', '澳洲小龙虾', '300.00', '200.00', '10', '100', '0', '澳洲进口小龙虾，香甜可口', '300', '<p>好吃</p>', '0', '1504093757', '1', '1');
INSERT INTO `yimi_goods` VALUES ('3', '枳', '4.00', '3.00', '4', '200', '0', '甜', '4', '<p>好吃啊</p>', '0', '1504093708', '1', '1');
INSERT INTO `yimi_goods` VALUES ('4', '鲨鱼', '6000.00', '4000.00', '7', '5', '0', '温顺', '6000', '<p>大撒旦</p>', '0', '1504093746', '1', '1');
INSERT INTO `yimi_goods` VALUES ('6', '梨城故事 原味酸奶', '12.00', '8.00', '46', '88', '0', '来自新疆巴音布鲁克大草原的优质奶源，纯鲜奶发酵，只含有鲜奶、糖与发酵所需的有益菌种。乳香浓郁；半凝固形态，如同豆腐一样滑嫩。', '12', '<p>温馨提示：天气热容易发酸变质，喝不完请盖上盖子或包好后，尽快放入冰箱保存。如果已经沾染过唾液，请及时喝掉，不要久放。<br/></p><p><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">乳香浓郁；半凝固形态，如同豆腐一样滑嫩。</p><p><br style=\"margin: 0px;\"/><img src=\"http://ymsj.com/static/index/images/nai1.jpg\" width=\"650\" height=\"433.33\" alt=\"\" style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">来自新疆巴音布鲁克大草原的优质奶源，纯鲜奶发酵，只含有鲜奶、糖与发酵所需的有益菌种。美味而安全，准妈妈、小朋友都能安心食用。</p><p><br style=\"margin: 0px;\"/><img src=\"http://ymsj.com/static/index/images/nai2.jpg\" width=\"650\" height=\"975\" alt=\"\" style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><img src=\"http://ymsj.com/static/index/images/nai3.jpg\" width=\"650\" height=\"433.33\" alt=\"\" style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">对于中国人来说，新鲜的牛奶很容易导致乳糖不耐受，比如拉肚子、腹胀等。这是因为成年中国人的消化系统中广泛缺乏乳糖酶，难以将牛奶中的双糖分解为人体能够吸收的单糖。而酸奶就能很好地解决这个问题。乳酸菌能够将乳糖分解为葡萄糖和半乳糖，不易引起腹胀不适。</p><p><br style=\"margin: 0px;\"/><img src=\"http://ymsj.com/static/index/images/nai4.jpg\" width=\"650\" height=\"433.33\" alt=\"\" style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><br style=\"margin: 0px;\"/><span style=\"margin: 0px; font-size: 0.8rem; font-weight: bold;\">食物的背后</span></p><hr style=\"margin: 20px 0px 0px; border: 1.1px solid rgb(153, 153, 153);\"/><p><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">瑞缘乳业的奶源来自以现代科学养殖方式放养于巴音布鲁克草原的荷斯坦奶牛，纯净安全无污染。</p><p><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">巴音布鲁克大草原是中国的第二大草原，也是中国最大的高山牧场，在蒙语中，「巴音布鲁克」意为丰富的泉水。它地处天山深处，群峰环抱，泉流密布，水草丰美，是新疆的牧业基地之一。</p><p><br style=\"margin: 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px;\">瑞缘乳业有志于通过积极研发科技含量高的乳产品，一方面帮助改善国民膳食营养结构，促进青少年增强体质，促进民族振兴和发展，另一方面通过科技创新，达到降耗环保，优化人类居住环境的远景目标。</p><p><br/></p>', '0', '1504180363', '1', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_image
-- ----------------------------
INSERT INTO `yimi_image` VALUES ('7', '4', '/uploads/20170830/65f2cd1b9959adcbd52a73aa397231e6.jpg', '/uploads/20170830/200_65f2cd1b9959adcbd52a73aa397231e6.jpg', '/uploads/20170830/120_65f2cd1b9959adcbd52a73aa397231e6.jpg', '/uploads/20170830/60_65f2cd1b9959adcbd52a73aa397231e6.jpg', '1');
INSERT INTO `yimi_image` VALUES ('5', '2', '/uploads/20170830/eb952aeff8575c6dcc8b780ce7f865e0.jpg', '/uploads/20170830/200_eb952aeff8575c6dcc8b780ce7f865e0.jpg', '/uploads/20170830/120_eb952aeff8575c6dcc8b780ce7f865e0.jpg', '/uploads/20170830/60_eb952aeff8575c6dcc8b780ce7f865e0.jpg', '0');
INSERT INTO `yimi_image` VALUES ('6', '3', '/uploads/20170830/a0cf7c8f27d117f686a279c1c7f0743f.jpg', '/uploads/20170830/200_a0cf7c8f27d117f686a279c1c7f0743f.jpg', '/uploads/20170830/120_a0cf7c8f27d117f686a279c1c7f0743f.jpg', '/uploads/20170830/60_a0cf7c8f27d117f686a279c1c7f0743f.jpg', '0');
INSERT INTO `yimi_image` VALUES ('8', '4', '/uploads/20170830/94d9db6004628aa03cfeef4f5fd9b700.jpg', '/uploads/20170830/200_94d9db6004628aa03cfeef4f5fd9b700.jpg', '/uploads/20170830/120_94d9db6004628aa03cfeef4f5fd9b700.jpg', '/uploads/20170830/60_94d9db6004628aa03cfeef4f5fd9b700.jpg', '0');
INSERT INTO `yimi_image` VALUES ('9', '5', '/uploads/20170831/db3405ddeda119bf840dabd328895c88.jpg', '/uploads/20170831/200_db3405ddeda119bf840dabd328895c88.jpg', '/uploads/20170831/120_db3405ddeda119bf840dabd328895c88.jpg', '/uploads/20170831/60_db3405ddeda119bf840dabd328895c88.jpg', '0');
INSERT INTO `yimi_image` VALUES ('11', '6', '/uploads/20170831/4097be7a8916d38f2f276acbba03cfe6.jpg', '/uploads/20170831/650_4097be7a8916d38f2f276acbba03cfe6.jpg', '/uploads/20170831/120_4097be7a8916d38f2f276acbba03cfe6.jpg', '/uploads/20170831/60_4097be7a8916d38f2f276acbba03cfe6.jpg', '0');
INSERT INTO `yimi_image` VALUES ('12', '6', '/uploads/20170831/ac9cb3450d3bfb560afae74db9a0f739.jpg', '/uploads/20170831/650_ac9cb3450d3bfb560afae74db9a0f739.jpg', '/uploads/20170831/120_ac9cb3450d3bfb560afae74db9a0f739.jpg', '/uploads/20170831/60_ac9cb3450d3bfb560afae74db9a0f739.jpg', '0');
INSERT INTO `yimi_image` VALUES ('13', '6', '/uploads/20170831/b032866866db70f012ea72b4da550ba7.jpg', '/uploads/20170831/650_b032866866db70f012ea72b4da550ba7.jpg', '/uploads/20170831/120_b032866866db70f012ea72b4da550ba7.jpg', '/uploads/20170831/60_b032866866db70f012ea72b4da550ba7.jpg', '0');
INSERT INTO `yimi_image` VALUES ('14', '6', '/uploads/20170831/cc9e5237ad36237f10db63325b8be907.jpg', '/uploads/20170831/650_cc9e5237ad36237f10db63325b8be907.jpg', '/uploads/20170831/120_cc9e5237ad36237f10db63325b8be907.jpg', '/uploads/20170831/60_cc9e5237ad36237f10db63325b8be907.jpg', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yimi_member
-- ----------------------------
INSERT INTO `yimi_member` VALUES ('12', 'ljz', 'e10adc3949ba59abbe56e057f20f883e', '17750635497', '', '1', '10.16.1.121', '1504167240', '0');
INSERT INTO `yimi_member` VALUES ('13', '13980243556', 'e10adc3949ba59abbe56e057f20f883e', '13980243556', '', '1', '10.16.1.121', '1504167266', '0');
INSERT INTO `yimi_member` VALUES ('11', '吕金镇', '017d001e7405a6cf6ec4ec207af8a4de', '15083211110', '', '0', '10.16.1.121', '1504167209', '0');
INSERT INTO `yimi_member` VALUES ('10', '66666666666', 'f379eaf3c831b04de153469d1bec345e', '66666666666', '', '0', '10.16.1.121', '1504166789', '0');

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
