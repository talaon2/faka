-- MySQL dump 10.13  Distrib 5.6.41, for Linux (x86_64)
--
-- Host: localhost    Database: s1931641
-- ------------------------------------------------------
-- Server version	5.6.41-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ayangw_config`
--

DROP TABLE IF EXISTS `ayangw_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_config` (
  `ayangw_k` varchar(255) NOT NULL DEFAULT '',
  `ayangw_v` text,
  PRIMARY KEY (`ayangw_k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_config`
--

LOCK TABLES `ayangw_config` WRITE;
/*!40000 ALTER TABLE `ayangw_config` DISABLE KEYS */;
INSERT INTO `ayangw_config` VALUES ('title','吾爱破解'),('keywords','个人发卡网,自助发卡,在线购买'),('description','吾爱破解'),('zzqq','吾爱破解'),('notice2','付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！'),('notice3','提取码是订单编号 或者 您的联系方式！'),('notice1','提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密'),('foot','吾爱破解'),('dd_notice','1.联系方式也可以作为你的提卡凭证<br>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负'),('admin','admin'),('pwd','admin'),('web_url','wanlxh.yzjia.cc'),('paiapi','1'),('xq_id',''),('xq_key',''),('showKc','1'),('CC_Defender','2'),('txprotect','1'),('qqtz','1');
/*!40000 ALTER TABLE `ayangw_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_goods`
--

DROP TABLE IF EXISTS `ayangw_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `tpId` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sales` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_goods`
--

LOCK TABLES `ayangw_goods` WRITE;
/*!40000 ALTER TABLE `ayangw_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_km`
--

DROP TABLE IF EXISTS `ayangw_km`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_km`
--

LOCK TABLES `ayangw_km` WRITE;
/*!40000 ALTER TABLE `ayangw_km` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_km` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_order`
--

DROP TABLE IF EXISTS `ayangw_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_order`
--

LOCK TABLES `ayangw_order` WRITE;
/*!40000 ALTER TABLE `ayangw_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayangw_type`
--

DROP TABLE IF EXISTS `ayangw_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayangw_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayangw_type`
--

LOCK TABLES `ayangw_type` WRITE;
/*!40000 ALTER TABLE `ayangw_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayangw_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-12 20:02:01
