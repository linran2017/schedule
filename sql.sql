/*
Navicat MySQL Data Transfer

Source Server         : duty_linran136_
Source Server Version : 50554
Source Host           : duty.linran136.com:3306
Source Database       : duty_linran136_

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-12-26 14:08:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `duty_person`
-- ----------------------------
DROP TABLE IF EXISTS `duty_person`;
CREATE TABLE `duty_person` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `normal` tinyint(4) NOT NULL DEFAULT '1',
  `remark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of duty_person
-- ----------------------------
INSERT INTO `duty_person` VALUES ('23', '小王', '1', '');
INSERT INTO `duty_person` VALUES ('24', '小周', '0', '请假');
INSERT INTO `duty_person` VALUES ('26', '小李', '0', '请假');
INSERT INTO `duty_person` VALUES ('27', '小贾', '1', '');
INSERT INTO `duty_person` VALUES ('31', '小于', '1', '');
INSERT INTO `duty_person` VALUES ('30', '小赵', '1', '');

-- ----------------------------
-- Table structure for `duty_task`
-- ----------------------------
DROP TABLE IF EXISTS `duty_task`;
CREATE TABLE `duty_task` (
  `tid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `person_id` smallint(6) NOT NULL,
  `fromday` char(5) DEFAULT NULL,
  `today` char(5) DEFAULT NULL,
  `note` varchar(20) DEFAULT NULL,
  `num` smallint(6) NOT NULL DEFAULT '1',
  `url` varchar(100) DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT '1',
  `important` tinyint(4) NOT NULL DEFAULT '1',
  `well` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of duty_task
-- ----------------------------
INSERT INTO `duty_task` VALUES ('37', '网站后台', '0', '27', '4', '7', '', '1', '', '1', '2', '1');
INSERT INTO `duty_task` VALUES ('38', '美工设计', '0', '30', '10', '25', '', '1', 'http://www.baidu.com', '1', '2', '1');
INSERT INTO `duty_task` VALUES ('39', '前台布局', '0', '23', '', '', '时间待定', '1', 'http://www.baidu.com', '1', '1', '1');
INSERT INTO `duty_task` VALUES ('41', '发布帖子', '0', '27', '12', '31', '', '10', 'http://www.jd.com', '0', '1', '1');
INSERT INTO `duty_task` VALUES ('42', '文案编辑', '0', '26', '5', '8', '请假', '1', '', '1', '3', '0');
INSERT INTO `duty_task` VALUES ('43', '前台动画', '0', '23', '9', '24', '', '1', '', '1', '3', '1');
INSERT INTO `duty_task` VALUES ('44', '文案编辑', '0', '31', '2', '15', '', '10', '', '1', '1', '1');
INSERT INTO `duty_task` VALUES ('45', '网站配置', '0', '27', '4', '18', '', '1', '', '1', '2', '1');
INSERT INTO `duty_task` VALUES ('46', '前端模板', '0', '23', '5', '25', '', '1', '', '1', '3', '1');
INSERT INTO `duty_task` VALUES ('47', 'app开发', '0', '30', '12', '18', '', '1', '', '1', '1', '1');
INSERT INTO `duty_task` VALUES ('48', '发表评论', '0', '31', '5', '16', '', '18', '', '0', '3', '1');
INSERT INTO `duty_task` VALUES ('49', '微信公众号', '0', '31', '1', '9', '', '1', '', '1', '2', '1');
INSERT INTO `duty_task` VALUES ('50', '微信开发', '0', '31', '16', '26', '', '1', '', '1', '1', '1');
INSERT INTO `duty_task` VALUES ('51', '移动端布局', '0', '23', '4', '14', '', '1', '', '1', '1', '1');
INSERT INTO `duty_task` VALUES ('52', '图片上传', '0', '23', '8', '21', '', '38', '', '0', '1', '1');
INSERT INTO `duty_task` VALUES ('53', '数据库维护', '0', '30', '4', '31', '', '1', '', '0', '2', '1');
