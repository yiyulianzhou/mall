/*
Navicat MySQL Data Transfer

Source Server         : 10.10.10.205
Source Server Version : 50717
Source Host           : 10.10.10.205:3306
Source Database       : block

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-03-22 14:52:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for block_company
-- ----------------------------
DROP TABLE IF EXISTS `block_company`;
CREATE TABLE `block_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键、自增',
  `name` varchar(90) NOT NULL COMMENT '公司名称',
  `img` varchar(255) NOT NULL COMMENT '配图',
  `basic` text NOT NULL COMMENT '基本信息',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '状态：1：运行中，0:关闭',
  `data_source` varchar(255) NOT NULL COMMENT '数据来源',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_company
-- ----------------------------

-- ----------------------------
-- Table structure for block_info
-- ----------------------------
DROP TABLE IF EXISTS `block_info`;
CREATE TABLE `block_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
  `title` varchar(90) NOT NULL COMMENT '快讯标题',
  `author` varchar(90) NOT NULL COMMENT '作者',
  `pub_time` int(11) NOT NULL COMMENT '发布时间',
  `click_num` int(11) NOT NULL COMMENT '点击量',
  `body` text NOT NULL COMMENT '内容主体',
  `data_source` varchar(255) NOT NULL COMMENT '数据来源',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_info
-- ----------------------------

-- ----------------------------
-- Table structure for block_news
-- ----------------------------
DROP TABLE IF EXISTS `block_news`;
CREATE TABLE `block_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
  `type` tinyint(3) NOT NULL COMMENT '分类 1：区块链，2：比特币，3：其他新闻',
  `title` varchar(90) NOT NULL COMMENT '文章标题',
  `author` varchar(90) NOT NULL COMMENT '文章作者',
  `small_img` varchar(255) NOT NULL COMMENT '文章缩略图',
  `pub_time` int(11) NOT NULL COMMENT '发表时间',
  `click_num` int(11) NOT NULL COMMENT '文章点击量',
  `content` text NOT NULL COMMENT '内容主体',
  `data_source` varchar(255) NOT NULL COMMENT '数据来源url',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_news
-- ----------------------------

-- ----------------------------
-- Table structure for block_quotation
-- ----------------------------
DROP TABLE IF EXISTS `block_quotation`;
CREATE TABLE `block_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
  `name` varchar(90) NOT NULL COMMENT '币种名称',
  `type` tinyint(3) NOT NULL COMMENT '币种分类',
  `last_price` decimal(10,4) NOT NULL COMMENT '最新成交价格',
  `day_change` varchar(255) NOT NULL COMMENT '24H变化',
  `day_highest` decimal(10,4) NOT NULL COMMENT '24H最高',
  `day_lowest` decimal(10,4) NOT NULL COMMENT '24H最低',
  `volume` int(11) NOT NULL COMMENT '成交量',
  `market_equity` decimal(10,4) NOT NULL COMMENT '流通市值',
  `data_source` varchar(255) NOT NULL COMMENT '数据来源',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_quotation
-- ----------------------------
