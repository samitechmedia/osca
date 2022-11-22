-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: onlineslots_ca_centralise
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1:10.3.22+maria~bionic

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
-- Table structure for table `affiliate_link_constraints`
--

DROP TABLE IF EXISTS `affiliate_link_constraints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_link_constraints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliate_link_id` int(11) DEFAULT NULL,
  `field_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `constraint_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `constraint_value` longtext COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `alc_link_constraint_id_on_affiliate_link_constrains` (`affiliate_link_id`),
  CONSTRAINT `alc_link_constraint_id_on_affiliate_link_constrains` FOREIGN KEY (`affiliate_link_id`) REFERENCES `affiliate_links` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_link_constraints`
--

LOCK TABLES `affiliate_link_constraints` WRITE;
/*!40000 ALTER TABLE `affiliate_link_constraints` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliate_link_constraints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_link_criteria`
--

DROP TABLE IF EXISTS `affiliate_link_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_link_criteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` mediumint(9) DEFAULT NULL,
  `vertical_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `device_type_id` tinyint(4) NOT NULL DEFAULT 1,
  `split_test_id` int(11) DEFAULT NULL,
  `affiliate_link_id` int(11) DEFAULT NULL,
  `clicky_bits_id` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_criteria_by_partner` (`partner_id`,`vertical_id`,`location_id`,`device_type_id`),
  KEY `a_url_id_on_affiliate_link_table` (`affiliate_link_id`),
  KEY `a_location_id_on_locations_table` (`location_id`),
  KEY `a_device_type_id_on_devices_table` (`device_type_id`),
  KEY `a_split_test_id_on_spit_test_table` (`split_test_id`),
  KEY `a_vertical_id_on_vertical_table` (`vertical_id`),
  KEY `a_clicky_bit_id_on_clicky_bit_table` (`clicky_bits_id`),
  CONSTRAINT `a_clicky_bit_id_on_clicky_bit_table` FOREIGN KEY (`clicky_bits_id`) REFERENCES `clicky_bits` (`id`) ON DELETE SET NULL,
  CONSTRAINT `a_device_type_id_on_devices_table` FOREIGN KEY (`device_type_id`) REFERENCES `onlineslots_ca_site_information`.`devices` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `a_location_id_on_locations_table` FOREIGN KEY (`location_id`) REFERENCES `onlineslots_ca_site_information`.`locations` (`location_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `a_partner_id_on_partners_table` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`partner_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `a_split_test_id_on_spit_test_table` FOREIGN KEY (`split_test_id`) REFERENCES `affiliate_link_split_tests` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `a_url_id_on_affiliate_link_table` FOREIGN KEY (`affiliate_link_id`) REFERENCES `affiliate_links` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `a_vertical_id_on_vertical_table` FOREIGN KEY (`vertical_id`) REFERENCES `partner_verticals` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_link_criteria`
--

LOCK TABLES `affiliate_link_criteria` WRITE;
/*!40000 ALTER TABLE `affiliate_link_criteria` DISABLE KEYS */;
INSERT INTO `affiliate_link_criteria` VALUES (1,2,2,NULL,2,NULL,1,1,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(2,2,2,NULL,3,NULL,2,1,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(3,2,2,NULL,1,NULL,3,1,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(4,3,2,NULL,1,NULL,4,2,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(5,4,2,NULL,1,NULL,5,3,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(6,6,2,NULL,1,NULL,6,4,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(7,5,2,NULL,1,NULL,6,5,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(8,7,2,NULL,1,NULL,7,6,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(9,8,2,NULL,1,NULL,8,7,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(10,11,2,NULL,1,NULL,9,8,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(11,9,2,NULL,1,NULL,10,9,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(12,10,2,NULL,1,NULL,11,10,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(13,12,2,NULL,1,NULL,12,11,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(14,13,2,NULL,1,NULL,13,12,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(15,14,2,NULL,1,NULL,14,13,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(16,15,2,NULL,1,NULL,15,14,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(17,17,2,NULL,5,NULL,16,15,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(18,17,2,NULL,1,NULL,17,15,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(19,16,30,NULL,1,NULL,18,16,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(20,16,2,NULL,1,NULL,19,17,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(21,18,2,NULL,1,NULL,20,18,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(22,20,2,NULL,1,NULL,21,19,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(23,33,2,NULL,1,NULL,22,20,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(24,21,2,NULL,1,NULL,23,21,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(25,22,2,NULL,1,NULL,24,22,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(26,23,2,NULL,1,NULL,25,23,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(27,24,2,NULL,1,NULL,26,24,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(28,26,2,NULL,1,NULL,27,25,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(29,25,2,NULL,5,NULL,28,26,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(30,25,2,NULL,1,NULL,29,26,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(31,28,2,NULL,1,NULL,30,27,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(32,27,2,NULL,1,NULL,31,28,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(33,34,2,NULL,1,NULL,32,29,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(34,30,2,NULL,1,NULL,33,30,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(35,29,30,NULL,1,NULL,34,31,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(36,29,2,NULL,1,NULL,35,32,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(37,31,2,NULL,1,NULL,36,33,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(38,32,2,NULL,1,NULL,37,34,'2020-02-07 14:53:23','2020-02-07 14:53:23'),(39,1,2,NULL,1,NULL,38,35,'2020-02-07 14:53:23','2020-02-07 14:53:23');
/*!40000 ALTER TABLE `affiliate_link_criteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_link_split_tests`
--

DROP TABLE IF EXISTS `affiliate_link_split_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_link_split_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_link_split_tests`
--

LOCK TABLES `affiliate_link_split_tests` WRITE;
/*!40000 ALTER TABLE `affiliate_link_split_tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliate_link_split_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_link_test_url_clicks`
--

DROP TABLE IF EXISTS `affiliate_link_test_url_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_link_test_url_clicks` (
  `afflink_test_id` int(11) NOT NULL,
  `afflink_id` int(11) NOT NULL,
  `clicky_bits_id` int(11) NOT NULL,
  `total_clicks` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) DEFAULT 1,
  UNIQUE KEY `unique_test_link` (`afflink_test_id`,`afflink_id`),
  KEY `altuc_affiliate_link_id_on_affiliate_link` (`afflink_id`),
  KEY `altuc_clicky_bits_id_on_clicky_bits` (`clicky_bits_id`),
  CONSTRAINT `altuc_affiliate_link_id_on_affiliate_link` FOREIGN KEY (`afflink_id`) REFERENCES `affiliate_links` (`id`) ON DELETE CASCADE,
  CONSTRAINT `altuc_clicky_bits_id_on_clicky_bits` FOREIGN KEY (`clicky_bits_id`) REFERENCES `clicky_bits` (`id`) ON DELETE CASCADE,
  CONSTRAINT `altuc_split_test_id_on_affiliate_link_split_test` FOREIGN KEY (`afflink_test_id`) REFERENCES `affiliate_link_split_tests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_link_test_url_clicks`
--

LOCK TABLES `affiliate_link_test_url_clicks` WRITE;
/*!40000 ALTER TABLE `affiliate_link_test_url_clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliate_link_test_url_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_links`
--

DROP TABLE IF EXISTS `affiliate_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affiliate_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_affiliate_link_url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_links`
--

LOCK TABLES `affiliate_links` WRITE;
/*!40000 ALTER TABLE `affiliate_links` DISABLE KEYS */;
INSERT INTO `affiliate_links` VALUES (20,'http://ads.leovegas.com/redirect.aspx?pid=3080730&bid=1466&lpid=8'),(27,'http://fr.royalvegascasino.com/btag-P24527-PR129-CM14238-TS156112/?test=HP'),(22,'http://jackpotcitycasino.com/canada/lp/megamoolah-2209.aspx?s=wgs16221&a=1620578546025746'),(4,'http://play.allslotscasino.com/asc/asc-hp-wd41/?a=bfpadid95157'),(11,'http://play.ellmountgaming.com/redirect.aspx?pid=377397&bid=3745'),(8,'http://record.bettingpartners.com/_naWoRy_psoXfjgRf_EGLtmNd7ZgqdRLk/2/'),(21,'http://wlbroadwaygaming.adsrv.eacdn.com/C.ashx?btag=a_3523b_3395c_&affid=1112&siteid=3523&adid=3395&c='),(9,'http://www.casinotitan.im/aiddownload.php?affid=71763%C2%A0%C2%A0%C2%A0'),(12,'http://www.drakecasino.eu/?refer=531'),(14,'http://www.grandparker.me/r.php?a=26469%C2%A0%C2%A0%C2%A0%C2%A0'),(24,'http://www.platinumplay.eu/aff/ca/btag-ad484587/'),(32,'http://www.silveroakcasino.eu/click/1/9319/13901/1'),(37,'http://www.winpalace.im/?affid=46714%C2%A0%C2%A0%C2%A0'),(6,'https://betway.com/vegas1500/?s=wgs16221&a=bwadid47839 '),(29,'https://ca.royalvegascasino.com/?a=bfpadid88039//Default desktop link'),(28,'https://ca.royalvegascasino.com/?a=bfpadid88040//Default mobile link'),(13,'https://casino.gamingclub.com/gcc/ca/6135_v9.aspx?a=1907252757412064'),(18,'https://casino.jackpotcitycasino.com/jpc/20790.aspx?s=wgs16221&a=bfpadid53177'),(34,'https://casino.spincasino.com/spc/20790.aspx?s=wgs16221&a=bfpadid53175'),(33,'https://casino.spincasino.com/spc/fr/22942.aspx?s=wgs16221&a=bfpadid57761'),(38,'https://dspk.kindredplc.com/redirect.aspx?pid=27927854&bid=30278'),(25,'https://dspk.kindredplc.com/redirect.aspx?pid=27927881&bid=30312'),(19,'https://exclusivecredits.com/jpc/gl-jpc/?a=bfpadid93995'),(36,'https://media.sia.com/C.ashx?btag=a_9905b_1988c_&affid=4614&siteid=9905&adid=1988&c='),(23,'https://mediaserver.bwinpartypartners.com/renderBanner.do?zoneId=1744094'),(7,'https://record.bettingpartners.com/_naWoRy_psoVmcN_rcTxTOGNd7ZgqdRLk/13/'),(5,'https://record.commission.bz/_gL7vGf00fpXfkb3gg_bGdGNd7ZgqdRLk/41074/'),(10,'https://record.mansionaffiliates.com/_iAkLcOQVTK9Ff3LdmP_7y2Nd7ZgqdRLk/2/'),(26,'https://tracking.royalpanda.com/redirect.aspx?pid=15218&bid=3016'),(3,'https://www.7sultanscasino.com/btag-P24527-PR144-CM14178-TS82006/'),(1,'https://www.7sultanscasino.com/btag-P24527-PR144-CM14178-TS82034/'),(2,'https://www.7sultanscasino.com/btag-P24527-PR144-CM14178-TS82035/'),(15,'https://www.hippodromeonline.com/welcome/?a=AFF1830581629472774'),(17,'https://www.jackpotcitycasino.com/canada/?a=2191601377460592'),(16,'https://www.jackpotcitycasino.com/canada/?s=wgs16221&a=bfpadid50751'),(31,'https://www.rubyfortune.com/ca/?a=bfpadid88288'),(30,'https://www.rubyfortune.com/lp/ca/online-slots/?s=wgs16221&a=wgsaffad41433'),(35,'https://www.spincasino.com/ca/?a=bfpadid93031');
/*!40000 ALTER TABLE `affiliate_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocked_partners_countries`
--

DROP TABLE IF EXISTS `blocked_partners_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocked_partners_countries` (
  `blocked_partner_country_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` mediumint(9) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`blocked_partner_country_id`),
  UNIQUE KEY `unique_partner_country` (`partner_id`,`location_id`),
  KEY `location_id_on_locations_table` (`location_id`),
  CONSTRAINT `location_id_on_locations_table` FOREIGN KEY (`location_id`) REFERENCES `onlineslots_ca_site_information`.`locations` (`location_id`) ON UPDATE CASCADE,
  CONSTRAINT `partner_id_on_partners_table` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`partner_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocked_partners_countries`
--

LOCK TABLES `blocked_partners_countries` WRITE;
/*!40000 ALTER TABLE `blocked_partners_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocked_partners_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bottom_toplist_views`
--

DROP TABLE IF EXISTS `bottom_toplist_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bottom_toplist_views` (
  `bottom_toplist_view_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_type_id` int(11) NOT NULL,
  `view_file_to_use` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`bottom_toplist_view_id`),
  UNIQUE KEY `bottom_toplist_and_view_pair` (`bottom_toplist_view_id`,`view_file_to_use`),
  KEY `page_type_id_on_bottom_toplist_view_table` (`page_type_id`),
  CONSTRAINT `page_type_id_on_bottom_toplist_view_table` FOREIGN KEY (`page_type_id`) REFERENCES `onlineslots_ca_site_information`.`page_type` (`page_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bottom_toplist_views`
--

LOCK TABLES `bottom_toplist_views` WRITE;
/*!40000 ALTER TABLE `bottom_toplist_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `bottom_toplist_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clicky_bits`
--

DROP TABLE IF EXISTS `clicky_bits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clicky_bits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clicky_caption` varchar(254) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_affiliate_link_url` (`clicky_caption`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clicky_bits`
--

LOCK TABLES `clicky_bits` WRITE;
/*!40000 ALTER TABLE `clicky_bits` DISABLE KEYS */;
INSERT INTO `clicky_bits` VALUES (35,'/go/32red.php'),(1,'/go/7-sultans.php'),(2,'/go/allslots.php'),(3,'/go/betonline.php'),(4,'/go/betway-fr.php'),(5,'/go/betway.php'),(6,'/go/bodog.php'),(7,'/go/bovada.php'),(8,'/go/casino-titan.php'),(9,'/go/casinocom.php'),(10,'/go/casinoroom.php'),(11,'/go/drake.php'),(12,'/go/gaming-club.php'),(13,'/go/grand-parker.php'),(14,'/go/hippodrome.php'),(15,'/go/jackpot-city-fr.php'),(16,'/go/jackpot-city-freespins.php'),(17,'/go/jackpot-city.php'),(18,'/go/leo-vegas.php'),(19,'/go/lucky-247.php'),(20,'/go/mega-moolah.php'),(21,'/go/party-casino.php'),(22,'/go/platinum-play.php'),(23,'/go/roxy-palace.php'),(24,'/go/royal-panda.php'),(25,'/go/royal-vegas-fr.php'),(26,'/go/royal-vegas.php'),(27,'/go/ruby-fortune-fr.php'),(28,'/go/ruby-fortune.php'),(29,'/go/silveroak.php'),(30,'/go/spin-casino-fr.php'),(31,'/go/spin-casino-freespins.php'),(32,'/go/spin-casino.php'),(33,'/go/sportsinteraction.php'),(34,'/go/winpalace.php');
/*!40000 ALTER TABLE `clicky_bits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `default_partner_information`
--

DROP TABLE IF EXISTS `default_partner_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `default_partner_information` (
  `default_partner_information_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` mediumint(9) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `partner_information_pairs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`default_partner_information_id`),
  KEY `dpi_partner_id_on_partners_table` (`partner_id`),
  KEY `dpi_location_id_on_locations_table` (`location_id`),
  KEY `dpi_partner_pairs_id_on_partner_information_pairs_table` (`partner_information_pairs_id`),
  CONSTRAINT `dpi_location_id_on_locations_table` FOREIGN KEY (`location_id`) REFERENCES `onlineslots_ca_site_information`.`locations` (`location_id`) ON UPDATE CASCADE,
  CONSTRAINT `dpi_partner_id_on_partners_table` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpi_partner_pairs_id_on_partner_information_pairs_table` FOREIGN KEY (`partner_information_pairs_id`) REFERENCES `partner_information_pairs` (`partner_information_pairs_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=888 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `default_partner_information`
--

LOCK TABLES `default_partner_information` WRITE;
/*!40000 ALTER TABLE `default_partner_information` DISABLE KEYS */;
INSERT INTO `default_partner_information` VALUES (1,1,NULL,1),(2,1,NULL,2),(3,1,NULL,3),(4,1,NULL,4),(5,1,NULL,5),(6,1,NULL,6),(7,1,NULL,7),(8,1,NULL,8),(9,1,NULL,9),(10,1,NULL,10),(11,1,NULL,11),(12,1,NULL,12),(13,1,NULL,13),(14,1,NULL,14),(15,1,NULL,15),(16,1,NULL,16),(17,1,NULL,17),(18,1,NULL,18),(19,1,NULL,19),(20,1,NULL,20),(21,1,NULL,21),(22,1,NULL,22),(23,2,NULL,23),(24,2,NULL,24),(25,2,NULL,25),(26,2,NULL,26),(27,2,NULL,27),(28,2,NULL,28),(29,2,NULL,29),(30,2,NULL,30),(31,2,NULL,31),(32,2,NULL,32),(33,2,NULL,33),(34,2,NULL,34),(35,2,NULL,35),(36,2,NULL,36),(37,2,NULL,37),(38,2,NULL,38),(39,2,NULL,39),(40,3,NULL,40),(41,3,NULL,41),(42,3,NULL,42),(43,3,NULL,43),(44,3,NULL,44),(45,3,NULL,45),(46,3,NULL,46),(47,3,NULL,47),(48,3,NULL,48),(49,3,NULL,49),(50,3,NULL,50),(51,3,NULL,51),(52,3,NULL,52),(53,3,NULL,53),(54,3,NULL,54),(55,3,NULL,55),(56,3,NULL,56),(57,3,NULL,57),(58,3,NULL,58),(59,3,NULL,59),(60,3,NULL,60),(61,3,NULL,61),(62,3,NULL,62),(63,3,NULL,63),(64,3,NULL,64),(65,3,NULL,65),(66,3,NULL,66),(67,3,NULL,67),(68,3,NULL,68),(69,3,NULL,69),(70,3,NULL,70),(71,3,NULL,71),(72,3,NULL,72),(73,3,NULL,73),(74,3,NULL,74),(75,3,NULL,75),(76,3,NULL,76),(77,3,NULL,77),(78,3,NULL,78),(79,4,NULL,79),(80,4,NULL,80),(81,4,NULL,81),(82,4,NULL,82),(83,4,NULL,83),(84,4,NULL,84),(85,4,NULL,85),(86,4,NULL,86),(87,4,NULL,87),(88,4,NULL,88),(89,4,NULL,89),(90,4,NULL,90),(91,4,NULL,91),(92,4,NULL,92),(93,4,NULL,93),(94,4,NULL,94),(95,4,NULL,95),(96,4,NULL,96),(97,4,NULL,97),(98,4,NULL,98),(99,4,NULL,99),(100,4,NULL,100),(101,4,NULL,101),(102,4,NULL,102),(103,4,NULL,103),(104,4,NULL,104),(105,4,NULL,105),(106,4,NULL,106),(107,4,NULL,107),(108,4,NULL,108),(109,4,NULL,109),(110,4,NULL,110),(111,4,NULL,111),(112,4,NULL,112),(113,4,NULL,113),(114,4,NULL,114),(115,4,NULL,115),(116,5,NULL,116),(117,5,NULL,117),(118,5,NULL,118),(119,5,NULL,119),(120,5,NULL,120),(121,5,NULL,121),(122,5,NULL,122),(123,5,NULL,123),(124,5,NULL,124),(125,5,NULL,125),(126,5,NULL,126),(127,5,NULL,127),(128,5,NULL,128),(129,5,NULL,129),(130,5,NULL,130),(131,5,NULL,131),(132,5,NULL,132),(133,5,NULL,133),(134,5,NULL,134),(135,5,NULL,135),(136,5,NULL,136),(137,5,NULL,137),(138,5,NULL,138),(139,5,NULL,139),(140,5,NULL,140),(141,5,NULL,141),(142,5,NULL,142),(143,5,NULL,143),(144,5,NULL,144),(145,5,NULL,145),(146,5,NULL,146),(147,5,NULL,147),(148,5,NULL,148),(149,5,NULL,149),(150,5,NULL,150),(151,5,NULL,151),(152,5,NULL,152),(153,5,NULL,153),(154,5,NULL,154),(155,6,NULL,155),(156,6,NULL,156),(157,6,NULL,157),(158,6,NULL,158),(159,6,NULL,159),(160,6,NULL,160),(161,6,NULL,161),(162,6,NULL,162),(163,6,NULL,163),(164,6,NULL,164),(165,6,NULL,165),(166,6,NULL,166),(167,6,NULL,167),(168,6,NULL,168),(169,6,NULL,169),(170,6,NULL,170),(171,6,NULL,171),(172,6,NULL,172),(173,6,NULL,173),(174,6,NULL,174),(175,6,NULL,175),(176,6,NULL,176),(177,6,NULL,177),(178,6,NULL,178),(179,6,NULL,179),(180,6,NULL,180),(181,7,NULL,181),(182,7,NULL,182),(183,7,NULL,183),(184,7,NULL,184),(185,7,NULL,185),(186,7,NULL,186),(187,7,NULL,187),(188,7,NULL,188),(189,7,NULL,189),(190,7,NULL,190),(191,7,NULL,191),(192,7,NULL,192),(193,7,NULL,193),(194,7,NULL,194),(195,7,NULL,195),(196,7,NULL,196),(197,7,NULL,197),(198,7,NULL,198),(199,7,NULL,199),(200,7,NULL,200),(201,7,NULL,201),(202,7,NULL,202),(203,7,NULL,203),(204,7,NULL,204),(205,7,NULL,205),(206,7,NULL,206),(207,7,NULL,207),(208,7,NULL,208),(209,7,NULL,209),(210,7,NULL,210),(211,7,NULL,211),(212,7,NULL,212),(213,7,NULL,213),(214,7,NULL,214),(215,7,NULL,215),(216,7,NULL,216),(217,7,NULL,217),(218,8,NULL,218),(219,8,NULL,219),(220,8,NULL,220),(221,8,NULL,221),(222,8,NULL,222),(223,8,NULL,223),(224,8,NULL,224),(225,8,NULL,225),(226,8,NULL,226),(227,8,NULL,227),(228,9,NULL,228),(229,9,NULL,229),(230,9,NULL,230),(231,9,NULL,231),(232,9,NULL,232),(233,9,NULL,233),(234,9,NULL,234),(235,9,NULL,235),(236,9,NULL,236),(237,9,NULL,237),(238,9,NULL,238),(239,9,NULL,239),(240,9,NULL,240),(241,9,NULL,241),(242,9,NULL,242),(243,9,NULL,243),(244,9,NULL,244),(245,9,NULL,245),(246,9,NULL,246),(247,9,NULL,247),(248,9,NULL,248),(249,9,NULL,249),(250,9,NULL,250),(251,9,NULL,251),(252,9,NULL,252),(253,9,NULL,253),(254,9,NULL,254),(255,9,NULL,255),(256,9,NULL,256),(257,9,NULL,257),(258,9,NULL,258),(259,9,NULL,259),(260,9,NULL,260),(261,9,NULL,261),(262,9,NULL,262),(263,9,NULL,263),(264,9,NULL,264),(265,10,NULL,265),(266,10,NULL,266),(267,10,NULL,267),(268,10,NULL,268),(269,10,NULL,269),(270,10,NULL,270),(271,10,NULL,271),(272,10,NULL,272),(273,10,NULL,273),(274,10,NULL,274),(275,10,NULL,275),(276,10,NULL,276),(277,10,NULL,277),(278,10,NULL,278),(279,10,NULL,279),(280,10,NULL,280),(281,10,NULL,281),(282,10,NULL,282),(283,10,NULL,283),(284,10,NULL,284),(285,10,NULL,285),(286,10,NULL,286),(287,10,NULL,287),(288,10,NULL,288),(289,10,NULL,289),(290,10,NULL,290),(291,10,NULL,291),(292,10,NULL,292),(293,10,NULL,293),(294,10,NULL,294),(295,10,NULL,295),(296,10,NULL,296),(297,10,NULL,297),(298,10,NULL,298),(299,10,NULL,299),(300,10,NULL,300),(301,10,NULL,301),(302,11,NULL,302),(303,11,NULL,303),(304,11,NULL,304),(305,11,NULL,305),(306,11,NULL,306),(307,11,NULL,307),(308,11,NULL,308),(309,11,NULL,309),(310,11,NULL,310),(311,11,NULL,311),(312,11,NULL,312),(313,11,NULL,313),(314,11,NULL,314),(315,11,NULL,315),(316,11,NULL,316),(317,12,NULL,317),(318,12,NULL,318),(319,12,NULL,319),(320,12,NULL,320),(321,12,NULL,321),(322,12,NULL,322),(323,12,NULL,323),(324,12,NULL,324),(325,12,NULL,325),(326,12,NULL,326),(327,13,NULL,327),(328,13,NULL,328),(329,13,NULL,329),(330,13,NULL,330),(331,13,NULL,331),(332,13,NULL,332),(333,13,NULL,333),(334,13,NULL,334),(335,13,NULL,335),(336,13,NULL,336),(337,13,NULL,337),(338,13,NULL,338),(339,13,NULL,339),(340,13,NULL,340),(341,13,NULL,341),(342,13,NULL,342),(343,13,NULL,343),(344,13,NULL,344),(345,13,NULL,345),(346,13,NULL,346),(347,13,NULL,347),(348,13,NULL,348),(349,13,NULL,349),(350,13,NULL,350),(351,13,NULL,351),(352,13,NULL,352),(353,13,NULL,353),(354,13,NULL,354),(355,13,NULL,355),(356,13,NULL,356),(357,13,NULL,357),(358,13,NULL,358),(359,13,NULL,359),(360,13,NULL,360),(361,13,NULL,361),(362,13,NULL,362),(363,13,NULL,363),(364,13,NULL,364),(365,13,NULL,365),(366,13,NULL,366),(367,13,NULL,367),(368,13,NULL,368),(369,13,NULL,369),(370,13,NULL,370),(371,13,NULL,371),(372,14,NULL,372),(373,14,NULL,373),(374,14,NULL,374),(375,14,NULL,375),(376,14,NULL,376),(377,14,NULL,377),(378,14,NULL,378),(379,14,NULL,379),(380,14,NULL,380),(381,14,NULL,381),(382,15,NULL,382),(383,15,NULL,383),(384,15,NULL,384),(385,15,NULL,385),(386,15,NULL,386),(387,15,NULL,387),(388,15,NULL,388),(389,15,NULL,389),(390,15,NULL,390),(391,15,NULL,391),(392,15,NULL,392),(393,15,NULL,393),(394,15,NULL,394),(395,15,NULL,395),(396,15,NULL,396),(397,15,NULL,397),(398,15,NULL,398),(399,15,NULL,399),(400,16,NULL,400),(401,16,NULL,401),(402,16,NULL,402),(403,16,NULL,403),(404,16,NULL,404),(405,16,NULL,405),(406,16,NULL,406),(407,16,NULL,407),(408,16,NULL,408),(409,16,NULL,409),(410,16,NULL,410),(411,16,NULL,411),(412,16,NULL,412),(413,16,NULL,413),(414,16,NULL,414),(415,16,NULL,415),(416,16,NULL,416),(417,16,NULL,417),(418,16,NULL,418),(419,16,NULL,419),(420,16,NULL,420),(421,16,NULL,421),(422,16,NULL,422),(423,16,NULL,423),(424,16,NULL,424),(425,16,NULL,425),(426,16,NULL,426),(427,16,NULL,427),(428,16,NULL,428),(429,16,NULL,429),(430,16,NULL,430),(431,16,NULL,431),(432,16,NULL,432),(433,16,NULL,433),(434,16,NULL,434),(435,16,NULL,435),(436,16,NULL,436),(437,16,NULL,437),(438,16,NULL,438),(439,16,NULL,439),(440,16,NULL,440),(441,16,NULL,441),(442,16,NULL,442),(443,16,NULL,443),(444,17,NULL,444),(445,17,NULL,445),(446,17,NULL,446),(447,17,NULL,447),(448,17,NULL,448),(449,17,NULL,449),(450,17,NULL,450),(451,17,NULL,451),(452,17,NULL,452),(453,17,NULL,453),(454,17,NULL,454),(455,17,NULL,455),(456,17,NULL,456),(457,17,NULL,457),(458,17,NULL,458),(459,17,NULL,459),(460,17,NULL,460),(461,17,NULL,461),(462,17,NULL,462),(463,17,NULL,463),(464,17,NULL,464),(465,17,NULL,465),(466,17,NULL,466),(467,17,NULL,467),(468,17,NULL,468),(469,17,NULL,469),(470,17,NULL,470),(471,18,NULL,471),(472,18,NULL,472),(473,18,NULL,473),(474,18,NULL,474),(475,18,NULL,475),(476,18,NULL,476),(477,18,NULL,477),(478,18,NULL,478),(479,18,NULL,479),(480,18,NULL,480),(481,18,NULL,481),(482,18,NULL,482),(483,18,NULL,483),(484,18,NULL,484),(485,18,NULL,485),(486,18,NULL,486),(487,18,NULL,487),(488,18,NULL,488),(489,19,NULL,489),(490,19,NULL,490),(491,19,NULL,491),(492,19,NULL,492),(493,19,NULL,493),(494,19,NULL,494),(495,19,NULL,495),(496,19,NULL,496),(497,19,NULL,497),(498,19,NULL,498),(499,19,NULL,499),(500,19,NULL,500),(501,19,NULL,501),(502,19,NULL,502),(503,19,NULL,503),(504,20,NULL,504),(505,20,NULL,505),(506,20,NULL,506),(507,20,NULL,507),(508,20,NULL,508),(509,20,NULL,509),(510,20,NULL,510),(511,20,NULL,511),(512,20,NULL,512),(513,20,NULL,513),(514,20,NULL,514),(515,20,NULL,515),(516,20,NULL,516),(517,20,NULL,517),(518,20,NULL,518),(519,20,NULL,519),(520,20,NULL,520),(521,21,NULL,521),(522,21,NULL,522),(523,21,NULL,523),(524,21,NULL,524),(525,21,NULL,525),(526,21,NULL,526),(527,21,NULL,527),(528,21,NULL,528),(529,21,NULL,529),(530,21,NULL,530),(531,21,NULL,531),(532,21,NULL,532),(533,21,NULL,533),(534,21,NULL,534),(535,21,NULL,535),(536,21,NULL,536),(537,21,NULL,537),(538,22,NULL,538),(539,22,NULL,539),(540,22,NULL,540),(541,22,NULL,541),(542,22,NULL,542),(543,22,NULL,543),(544,22,NULL,544),(545,22,NULL,545),(546,22,NULL,546),(547,22,NULL,547),(548,22,NULL,548),(549,22,NULL,549),(550,22,NULL,550),(551,22,NULL,551),(552,22,NULL,552),(553,22,NULL,553),(554,22,NULL,554),(555,22,NULL,555),(556,22,NULL,556),(557,22,NULL,557),(558,22,NULL,558),(559,22,NULL,559),(560,22,NULL,560),(561,23,NULL,561),(562,23,NULL,562),(563,23,NULL,563),(564,23,NULL,564),(565,23,NULL,565),(566,23,NULL,566),(567,23,NULL,567),(568,23,NULL,568),(569,23,NULL,569),(570,23,NULL,570),(571,23,NULL,571),(572,23,NULL,572),(573,23,NULL,573),(574,23,NULL,574),(575,23,NULL,575),(576,23,NULL,576),(577,23,NULL,577),(578,23,NULL,578),(579,23,NULL,579),(580,23,NULL,580),(581,23,NULL,581),(582,23,NULL,582),(583,23,NULL,583),(584,24,NULL,584),(585,24,NULL,585),(586,24,NULL,586),(587,24,NULL,587),(588,24,NULL,588),(589,24,NULL,589),(590,24,NULL,590),(591,24,NULL,591),(592,24,NULL,592),(593,24,NULL,593),(594,24,NULL,594),(595,24,NULL,595),(596,24,NULL,596),(597,24,NULL,597),(598,24,NULL,598),(599,24,NULL,599),(600,24,NULL,600),(601,24,NULL,601),(602,25,NULL,602),(603,25,NULL,603),(604,25,NULL,604),(605,25,NULL,605),(606,25,NULL,606),(607,25,NULL,607),(608,25,NULL,608),(609,25,NULL,609),(610,25,NULL,610),(611,25,NULL,611),(612,25,NULL,612),(613,25,NULL,613),(614,25,NULL,614),(615,25,NULL,615),(616,25,NULL,616),(617,25,NULL,617),(618,25,NULL,618),(619,25,NULL,619),(620,25,NULL,620),(621,25,NULL,621),(622,25,NULL,622),(623,25,NULL,623),(624,25,NULL,624),(625,25,NULL,625),(626,25,NULL,626),(627,25,NULL,627),(628,25,NULL,628),(629,25,NULL,629),(630,25,NULL,630),(631,25,NULL,631),(632,25,NULL,632),(633,25,NULL,633),(634,25,NULL,634),(635,25,NULL,635),(636,25,NULL,636),(637,25,NULL,637),(638,25,NULL,638),(639,25,NULL,639),(640,25,NULL,640),(641,25,NULL,641),(642,25,NULL,642),(643,26,NULL,643),(644,26,NULL,644),(645,26,NULL,645),(646,26,NULL,646),(647,26,NULL,647),(648,26,NULL,648),(649,26,NULL,649),(650,26,NULL,650),(651,26,NULL,651),(652,26,NULL,652),(653,26,NULL,653),(654,26,NULL,654),(655,26,NULL,655),(656,26,NULL,656),(657,26,NULL,657),(658,26,NULL,658),(659,26,NULL,659),(660,26,NULL,660),(661,26,NULL,661),(662,26,NULL,662),(663,26,NULL,663),(664,26,NULL,664),(665,26,NULL,665),(666,26,NULL,666),(667,26,NULL,667),(668,26,NULL,668),(669,26,NULL,669),(670,26,NULL,670),(671,26,NULL,671),(672,26,NULL,672),(673,26,NULL,673),(674,26,NULL,674),(675,26,NULL,675),(676,27,NULL,676),(677,27,NULL,677),(678,27,NULL,678),(679,27,NULL,679),(680,27,NULL,680),(681,27,NULL,681),(682,27,NULL,682),(683,27,NULL,683),(684,27,NULL,684),(685,27,NULL,685),(686,27,NULL,686),(687,27,NULL,687),(688,27,NULL,688),(689,27,NULL,689),(690,27,NULL,690),(691,27,NULL,691),(692,27,NULL,692),(693,27,NULL,693),(694,27,NULL,694),(695,27,NULL,695),(696,27,NULL,696),(697,27,NULL,697),(698,27,NULL,698),(699,27,NULL,699),(700,27,NULL,700),(701,27,NULL,701),(702,27,NULL,702),(703,27,NULL,703),(704,27,NULL,704),(705,27,NULL,705),(706,27,NULL,706),(707,27,NULL,707),(708,27,NULL,708),(709,27,NULL,709),(710,27,NULL,710),(711,27,NULL,711),(712,27,NULL,712),(713,27,NULL,713),(714,27,NULL,714),(715,27,NULL,715),(716,27,NULL,716),(717,27,NULL,717),(718,27,NULL,718),(719,27,NULL,719),(720,27,NULL,720),(721,28,NULL,721),(722,28,NULL,722),(723,28,NULL,723),(724,28,NULL,724),(725,28,NULL,725),(726,28,NULL,726),(727,28,NULL,727),(728,28,NULL,728),(729,28,NULL,729),(730,28,NULL,730),(731,28,NULL,731),(732,28,NULL,732),(733,28,NULL,733),(734,28,NULL,734),(735,28,NULL,735),(736,28,NULL,736),(737,28,NULL,737),(738,28,NULL,738),(739,28,NULL,739),(740,28,NULL,740),(741,28,NULL,741),(742,28,NULL,742),(743,28,NULL,743),(744,28,NULL,744),(745,28,NULL,745),(746,28,NULL,746),(747,28,NULL,747),(748,28,NULL,748),(749,28,NULL,749),(750,28,NULL,750),(751,28,NULL,751),(752,28,NULL,752),(753,28,NULL,753),(754,28,NULL,754),(755,29,NULL,755),(756,29,NULL,756),(757,29,NULL,757),(758,29,NULL,758),(759,29,NULL,759),(760,29,NULL,760),(761,29,NULL,761),(762,29,NULL,762),(763,29,NULL,763),(764,29,NULL,764),(765,29,NULL,765),(766,29,NULL,766),(767,29,NULL,767),(768,29,NULL,768),(769,29,NULL,769),(770,29,NULL,770),(771,29,NULL,771),(772,29,NULL,772),(773,29,NULL,773),(774,29,NULL,774),(775,29,NULL,775),(776,29,NULL,776),(777,29,NULL,777),(778,29,NULL,778),(779,29,NULL,779),(780,29,NULL,780),(781,29,NULL,781),(782,29,NULL,782),(783,29,NULL,783),(784,29,NULL,784),(785,29,NULL,785),(786,29,NULL,786),(787,29,NULL,787),(788,29,NULL,788),(789,29,NULL,789),(790,29,NULL,790),(791,29,NULL,791),(792,29,NULL,792),(793,29,NULL,793),(794,29,NULL,794),(795,29,NULL,795),(796,29,NULL,796),(797,29,NULL,797),(798,29,NULL,798),(799,29,NULL,799),(800,29,NULL,800),(801,30,NULL,801),(802,30,NULL,802),(803,30,NULL,803),(804,30,NULL,804),(805,30,NULL,805),(806,30,NULL,806),(807,30,NULL,807),(808,30,NULL,808),(809,30,NULL,809),(810,30,NULL,810),(811,30,NULL,811),(812,30,NULL,812),(813,30,NULL,813),(814,30,NULL,814),(815,30,NULL,815),(816,30,NULL,816),(817,30,NULL,817),(818,30,NULL,818),(819,30,NULL,819),(820,30,NULL,820),(821,30,NULL,821),(822,30,NULL,822),(823,30,NULL,823),(824,30,NULL,824),(825,30,NULL,825),(826,30,NULL,826),(827,30,NULL,827),(828,30,NULL,828),(829,30,NULL,829),(830,30,NULL,830),(831,30,NULL,831),(832,30,NULL,832),(833,30,NULL,833),(834,30,NULL,834),(835,30,NULL,835),(836,31,NULL,836),(837,31,NULL,837),(838,31,NULL,838),(839,31,NULL,839),(840,31,NULL,840),(841,31,NULL,841),(842,31,NULL,842),(843,31,NULL,843),(844,31,NULL,844),(845,31,NULL,845),(846,31,NULL,846),(847,31,NULL,847),(848,31,NULL,848),(849,31,NULL,849),(850,31,NULL,850),(851,31,NULL,851),(852,31,NULL,852),(853,31,NULL,853),(854,31,NULL,854),(855,31,NULL,855),(856,31,NULL,856),(857,31,NULL,857),(858,31,NULL,858),(859,31,NULL,859),(860,31,NULL,860),(861,31,NULL,861),(862,31,NULL,862),(863,31,NULL,863),(864,31,NULL,864),(865,31,NULL,865),(866,31,NULL,866),(867,31,NULL,867),(868,31,NULL,868),(869,31,NULL,869),(870,31,NULL,870),(871,31,NULL,871),(872,31,NULL,872),(873,32,NULL,873),(874,32,NULL,874),(875,32,NULL,875),(876,32,NULL,876),(877,32,NULL,877),(878,32,NULL,878),(879,32,NULL,879),(880,32,NULL,880),(881,32,NULL,881),(882,32,NULL,882),(883,32,NULL,883),(884,32,NULL,884),(885,32,NULL,885),(886,32,NULL,886),(887,32,NULL,887);
/*!40000 ALTER TABLE `default_partner_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_views`
--

DROP TABLE IF EXISTS `page_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_views` (
  `page_view_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_type_id` int(11) NOT NULL,
  `view_file_to_use` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`page_view_id`),
  UNIQUE KEY `page_type_view` (`page_type_id`,`view_file_to_use`),
  CONSTRAINT `t_page_type_id_on_page_view_table` FOREIGN KEY (`page_type_id`) REFERENCES `onlineslots_ca_site_information`.`page_type` (`page_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_views`
--

LOCK TABLES `page_views` WRITE;
/*!40000 ALTER TABLE `page_views` DISABLE KEYS */;
INSERT INTO `page_views` VALUES (1,1,'Homepage-toplist-template.php'),(3,2,'Top-three-vertical-toplist.php'),(2,4,'Homepage-fr-toplist-template.php'),(4,14,'Freeslots-toplist-template.php');
/*!40000 ALTER TABLE `page_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_facts`
--

DROP TABLE IF EXISTS `partner_facts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_facts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` mediumint(9) DEFAULT NULL,
  `fact_key` varchar(128) COLLATE utf8_bin NOT NULL,
  `fact_value` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `single_partner_fact` (`partner_id`,`fact_key`),
  CONSTRAINT `partner_facts_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_facts`
--

LOCK TABLES `partner_facts` WRITE;
/*!40000 ALTER TABLE `partner_facts` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_facts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_information`
--

DROP TABLE IF EXISTS `partner_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_information` (
  `partner_information_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_id` mediumint(9) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `page_type_id` int(11) DEFAULT NULL,
  `partner_information_pairs_id` int(11) DEFAULT NULL,
  `language_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`partner_information_id`),
  KEY `pi_partner_id_on_partners_table` (`partner_id`),
  KEY `pi_location_id_on_locations_table` (`location_id`),
  KEY `pi_page_type_id_on_pages_table` (`page_type_id`),
  KEY `pi_language_id_on_language_table` (`language_id`),
  KEY `pi_partner_pairs_id_on_partner_information_pairs_table` (`partner_information_pairs_id`),
  CONSTRAINT `pi_language_id_on_language_table` FOREIGN KEY (`language_id`) REFERENCES `onlineslots_ca_site_information`.`languages` (`language_id`) ON DELETE SET NULL,
  CONSTRAINT `pi_location_id_on_locations_table` FOREIGN KEY (`location_id`) REFERENCES `onlineslots_ca_site_information`.`locations` (`location_id`) ON UPDATE CASCADE,
  CONSTRAINT `pi_page_type_id_on_pages_table` FOREIGN KEY (`page_type_id`) REFERENCES `onlineslots_ca_site_information`.`page_type` (`page_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `pi_partner_id_on_partners_table` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pi_partner_pairs_id_on_partner_information_pairs_table` FOREIGN KEY (`partner_information_pairs_id`) REFERENCES `partner_information_pairs` (`partner_information_pairs_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_information`
--

LOCK TABLES `partner_information` WRITE;
/*!40000 ALTER TABLE `partner_information` DISABLE KEYS */;
INSERT INTO `partner_information` VALUES (1,29,NULL,6,888,NULL),(2,29,NULL,6,889,NULL),(3,29,NULL,6,890,NULL),(4,29,NULL,6,891,NULL),(5,27,NULL,6,892,NULL),(6,27,NULL,6,893,NULL),(7,27,NULL,6,894,NULL),(8,27,NULL,6,895,NULL),(9,25,NULL,6,896,NULL),(10,25,NULL,6,897,NULL),(11,25,NULL,6,898,NULL),(12,25,NULL,6,899,NULL),(13,29,NULL,7,900,NULL),(14,29,NULL,7,901,NULL),(15,29,NULL,7,902,NULL),(16,29,NULL,7,903,NULL),(17,27,NULL,7,904,NULL),(18,27,NULL,7,905,NULL),(19,27,NULL,7,906,NULL),(20,27,NULL,7,907,NULL),(21,25,NULL,7,908,NULL),(22,25,NULL,7,909,NULL),(23,25,NULL,7,910,NULL),(24,25,NULL,7,911,NULL),(25,25,NULL,8,912,NULL),(26,25,NULL,8,913,NULL),(27,25,NULL,8,914,NULL),(28,25,NULL,8,915,NULL),(29,27,NULL,8,916,NULL),(30,27,NULL,8,917,NULL),(31,27,NULL,8,918,NULL),(32,27,NULL,8,919,NULL),(33,29,NULL,8,920,NULL),(34,29,NULL,8,921,NULL),(35,29,NULL,8,922,NULL),(36,29,NULL,8,923,NULL),(37,29,NULL,9,924,NULL),(38,29,NULL,9,925,NULL),(39,29,NULL,9,926,NULL),(40,29,NULL,9,927,NULL),(41,27,NULL,9,928,NULL),(42,27,NULL,9,929,NULL),(43,27,NULL,9,930,NULL),(44,27,NULL,9,931,NULL),(45,25,NULL,9,932,NULL),(46,25,NULL,9,933,NULL),(47,25,NULL,9,934,NULL),(48,25,NULL,9,935,NULL),(49,25,NULL,10,936,NULL),(50,25,NULL,10,937,NULL),(51,25,NULL,10,938,NULL),(52,25,NULL,10,939,NULL),(53,29,NULL,10,940,NULL),(54,29,NULL,10,941,NULL),(55,29,NULL,10,942,NULL),(56,29,NULL,10,943,NULL),(57,27,NULL,10,944,NULL),(58,27,NULL,10,945,NULL),(59,27,NULL,10,946,NULL),(60,27,NULL,10,947,NULL),(61,25,NULL,11,948,NULL),(62,25,NULL,11,949,NULL),(63,25,NULL,11,950,NULL),(64,25,NULL,11,951,NULL),(65,27,NULL,11,952,NULL),(66,27,NULL,11,953,NULL),(67,27,NULL,11,954,NULL),(68,27,NULL,11,955,NULL),(69,29,NULL,11,956,NULL),(70,29,NULL,11,957,NULL),(71,29,NULL,11,958,NULL),(72,29,NULL,11,959,NULL),(73,29,NULL,12,960,NULL),(74,29,NULL,12,961,NULL),(75,29,NULL,12,962,NULL),(76,29,NULL,12,963,NULL),(77,27,NULL,12,964,NULL),(78,27,NULL,12,965,NULL),(79,27,NULL,12,966,NULL),(80,27,NULL,12,967,NULL),(81,25,NULL,12,968,NULL),(82,25,NULL,12,969,NULL),(83,25,NULL,12,970,NULL),(84,25,NULL,12,971,NULL),(85,29,NULL,13,972,NULL),(86,29,NULL,13,973,NULL),(87,29,NULL,13,974,NULL),(88,29,NULL,13,975,NULL),(89,27,NULL,13,976,NULL),(90,27,NULL,13,977,NULL),(91,27,NULL,13,978,NULL),(92,27,NULL,13,979,NULL),(93,25,NULL,13,980,NULL),(94,25,NULL,13,981,NULL),(95,25,NULL,13,982,NULL),(96,25,NULL,13,983,NULL);
/*!40000 ALTER TABLE `partner_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_information_pairs`
--

DROP TABLE IF EXISTS `partner_information_pairs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_information_pairs` (
  `partner_information_pairs_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_information_field` varchar(128) COLLATE utf8_bin NOT NULL,
  `partner_information_value` text COLLATE utf8_bin DEFAULT NULL,
  `custom_value_used` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'false',
  PRIMARY KEY (`partner_information_pairs_id`),
  KEY `information_pair` (`partner_information_field`,`partner_information_value`(255))
) ENGINE=InnoDB AUTO_INCREMENT=984 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_information_pairs`
--

LOCK TABLES `partner_information_pairs` WRITE;
/*!40000 ALTER TABLE `partner_information_pairs` DISABLE KEYS */;
INSERT INTO `partner_information_pairs` VALUES (1,'sitename','32 Red',''),(2,'sitecode','32red',''),(3,'logo','/images/screen-32red-logo.png',''),(4,'logohome','/images/logos/32red_home_logo.png',''),(5,'link','/go/32red.php',''),(6,'bonusvalue','C$160 + C$10',''),(7,'bonuspercent','160%',''),(8,'payout','97.8%',''),(9,'rating','9',''),(10,'ratingstars','90%',''),(11,'cta','Get Your C$160 Slots Bonus at 32 Red Now!',''),(12,'features','More than 500 games||Established site from 2002||Sport bets available',''),(13,'vip','Red Ruby points||Monthly prizes||Birthday presents!||Enhanced bonuses & promos||Dedicated support',''),(14,'slotgames','mega-moolah||major-millions||immortal-romance||thunderstruck-ii||the-dark-knight-rises',''),(15,'software','10',''),(16,'graphics','9.5',''),(17,'bonus','9.5',''),(18,'support','9',''),(19,'banking','9',''),(20,'loyaltyprogramme','9',''),(21,'email','support@32Red.com',''),(22,'tollfree','1-866-902-0499',''),(23,'sitename','7 Sultans',''),(24,'sitecode','7s',''),(25,'logo','/images/logo-7sultans.jpg',''),(26,'logohome','/images/logos/7sultans_home_logo.png',''),(27,'logoinner','/images/logos/inner/7-sultans-logo.png',''),(28,'link','/go/7-sultans.php',''),(29,'bonusvalue','C$500',''),(30,'bonuspercent','100%',''),(31,'payout','<span class=\"percent\">94.9%</span>',''),(32,'rating','9',''),(33,'cta','Get your C$500 slots bonus at 7 Sultans today!',''),(34,'tooltip','You could earn up to C$500 on your first 5 deposits at 7 Sultans.',''),(35,'screen1','/images/screens/7-sultans/7-sultans-smallscreen.jpg',''),(36,'screen1link','/images/screens/7-sultans/lg/7-sultans-bigscreen.jpg',''),(37,'screen2','/images/screens/7-sultans/7-sultans-smallscreen2.jpg',''),(38,'screen2link','/images/screens/7-sultans/lg/7-sultans-bigscreen2.jpg',''),(39,'slots','180+',''),(40,'sitename','All Slots',''),(41,'sitecode','allslots',''),(42,'logo','/images/logos/logo-allslots.png',''),(43,'logohome','/images/logos/all_slots_large.png',''),(44,'logoinner','/images/logos/inner/allslots.png',''),(45,'link','/go/allslots.php',''),(46,'bonusvalue','C$1600',''),(47,'bonuspercent','100%',''),(48,'payout','<span class=\"percent\">96.32%</span>',''),(49,'rating','8.55',''),(50,'ratingstars','85%',''),(51,'cta','Get your C$1600 bonus at All Slots today!',''),(52,'slots','415',''),(53,'bullet1','Enjoy a huge selection of over 500 games',''),(54,'bullet2','Play instantly with easy-to-use software',''),(55,'bullet3','Opportunity to win jackpots worth millions',''),(56,'bullet4','Deposit using a wide range of methods',''),(57,'payouttime','2-4 Days',''),(58,'gamestatus','MOST POPULAR',''),(59,'gametitle','ALASKAN FISHING',''),(60,'gametext','VIDEO SLOT TAKES YOU ON A FISHING ADVENTURE',''),(61,'gamelogo','/images/redesign/alaskan-fishing.jpg',''),(62,'gamelogoalt','Alaskan Fishing Logo',''),(63,'gamelink','/games/alaskan-fishing',''),(64,'realmoneygames','545',''),(65,'devices','apple||windows||android',''),(66,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(67,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(68,'features','Huge games variety||eCogra certification||Smartphone & tablet compatibility||Free customer support line',''),(69,'vip','Free spins & credits||Dedicated tournaments||Player prizes||Exclusive bonus||Personal Assistant',''),(70,'slotgames','tomb-raider||hellboy||hitman||stash-of-the-titans||thunderstruck||the-dark-knight-rises||double-magic||fantastic-7s||high-5-mega-spin||mega-moolah||major-millions||tunzamunni-',''),(71,'software','9',''),(72,'graphics','9',''),(73,'bonus','9',''),(74,'support','9.5',''),(75,'banking','9.5',''),(76,'loyaltyprogramme','9.5',''),(77,'email','See form on website',''),(78,'tollfree','1-800-768-1946',''),(79,'sitename','BetOnline',''),(80,'sitecode','betonline',''),(81,'logo','/images/betonline.png',''),(82,'link','/go/betonline.php',''),(83,'bonusvalue','C$3000',''),(84,'bonuspercent','100%',''),(85,'payout','<span class=\"percent\">95.84%</span>',''),(86,'rating','7.6',''),(87,'ratingstars','76%',''),(88,'cta','Get Your C$3000 Slots Bonus at BetOnline Now!',''),(89,'reviewurl','/reviews/betonline',''),(90,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(91,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(92,'screen2','/images/screens/jackpot-city/slots.jpg',''),(93,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(94,'slots','200',''),(95,'payouttime','3-4 Days',''),(96,'gamestatus','MOST POPULAR',''),(97,'gametitle','JUNGLE JIM',''),(98,'gametext','AN EXCITING QUEST FOR LOST TREASURE',''),(99,'gamelogo','junglejim-logo.png',''),(100,'gamelogoalt','Jungle Jim Logo',''),(101,'realmoneygames','200',''),(102,'devices','apple||windows||android',''),(103,'paymentsystems','visa||mastercard||maestro||skrill',''),(104,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(105,'features','Legit online casino established in 2004||Full Betsoft gaming software||Over 200 games, including 3D slots||Big deposit bonuses for Canadian players',''),(106,'vip','3 x 100% up to $1,000||Monthly slots bonus of $1,000||20% casino rebate every month||High roller bonus up to $200',''),(107,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(108,'software','8',''),(109,'graphics','8.5',''),(110,'bonus','9',''),(111,'support','8',''),(112,'banking','7.5',''),(113,'loyaltyprogramme','6',''),(114,'email','casino@betonline.ag',''),(115,'tollfree','1 888 426 3661',''),(116,'sitename','Betway',''),(117,'sitecode','betway',''),(118,'logo','/images/screen-betway.png',''),(119,'logohome','/images/logos/betway_casino_large.png',''),(120,'logoinner','/images/logos/inner/betwayb.png',''),(121,'link','/go/betway.php',''),(122,'bonusvalue','C$200',''),(123,'reviewurl','/reviews/betway',''),(124,'bonuspercent','100%',''),(125,'payout','93.6%',''),(126,'rating','8',''),(127,'ratingstars','90%',''),(128,'slots','370',''),(129,'bullet1','Offers once in a lifetime competition prizes',''),(130,'bullet2','Home to some of the biggest progressive jackpots',''),(131,'bullet3','Play via the innovative Betway Casino app',''),(132,'bullet4','Take advantage of a lucrative welcome bonus',''),(133,'payouttime','2-4 Days',''),(134,'gamestatus','MOST POPULAR',''),(135,'gametitle','GUNS N ROSES',''),(136,'gametext','CROWD-PLEASING SLOT WITH A ROCKING SOUNDTRACK',''),(137,'gamelogo','/images/redesign/guns-n-roses.jpg',''),(138,'gamelogoalt','Guns n Roses Logo',''),(139,'gamelink','/games/guns-n-roses',''),(140,'realmoneygames','490',''),(141,'devices','apple||windows||android',''),(142,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(143,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(144,'features','Payout rate of 95.2%||Excellent mobile gaming||Powered by Microgaming||Over 500 games to enjoy',''),(145,'vip','Rewards points scale||Extra game access||Prizes for players||Speedier payouts||Dedicated support lines',''),(146,'slotgames','avalon||hellboy||hot-ink||monsters-in-the-closet||robin-hood',''),(147,'software','10',''),(148,'graphics','9',''),(149,'bonus','8.5',''),(150,'support','9',''),(151,'banking','9.5',''),(152,'loyaltyprogramme','9.0',''),(153,'email','support@betway.com',''),(154,'tollfree','1-877-811-2604',''),(155,'sitename','Betway-FR',''),(156,'sitecode','betway-fr',''),(157,'logo','/images/screen-betway.png',''),(158,'logohome','/images/logos/betway_casino_large.png',''),(159,'link','/go/betway-fr.php',''),(160,'bonusvalue','1000 &dollar; CA',''),(161,'bonuspercent','100%',''),(162,'payout','<span class=\"percent\">93.6%</span>',''),(163,'rating','8',''),(164,'ratingstars','80%',''),(165,'bullet1','Offre d\'&eacute;normes cagnottes et r&eacute;compenses',''),(166,'bullet2','Propose les plus gros jackpots progressifs',''),(167,'bullet3','Application innovante et facile &agrave; utiliser',''),(168,'bullet4','Profitez d&rsquo;un g&eacute;n&eacute;reux bonus de bienvenue',''),(169,'slots','370',''),(170,'payouttime','2-4 Jours',''),(171,'gamestatus','Jeu vedette',''),(172,'gametitle','GUNS N ROSES',''),(173,'gametext','MACHINE &Agrave; SOUS POPULAIRE AVEC UNE BANDE-SON &Agrave; TH&Egrave;ME DE ROCK',''),(174,'gamelogo','/images/redesign/guns-n-roses.jpg',''),(175,'gamelogoalt','Guns n Roses Logo',''),(176,'gamelink','/games/guns-n-roses',''),(177,'realmoneygames','490',''),(178,'devices','apple||windows||android',''),(179,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(180,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(181,'sitename','Bodog Casino',''),(182,'sitecode','bodog',''),(183,'logo','http://www.onlinegambling.ca/images/site/bodog.png',''),(184,'link','/go/bodog.php',''),(185,'bonusvalue','C$600',''),(186,'bonuspercent','100%',''),(187,'payout','<span class=\"percent\">96.71%</span>',''),(188,'rating','7.5',''),(189,'ratingstars','75%',''),(190,'cta','Get Your C$600 Slots Bonus at Bodog Now!',''),(191,'reviewurl','/reviews/bodog',''),(192,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(193,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(194,'screen2','/images/screens/jackpot-city/slots.jpg',''),(195,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(196,'slots','200',''),(197,'payouttime','3-6 Days',''),(198,'gamestatus','MOST POPULAR',''),(199,'gametitle','JUNGLE JIM',''),(200,'gametext','AN EXCITING QUEST FOR LOST TREASURE',''),(201,'gamelogo','junglejim-logo.png',''),(202,'gamelogoalt','Jungle Jim Logo',''),(203,'realmoneygames','200',''),(204,'devices','apple||windows||android',''),(205,'paymentsystems','visa||mastercard||maestro||skrill',''),(206,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(207,'features','Trusted Canadian online casino||Instant play platform for Mac, PC, and mobile devices||Big casino bonuses for registered members||Over 200 real money slots games',''),(208,'vip','Exclusive promotions and giveaways||Weekly bonus offers||Increased rates for cash rewards||Invitations to exclusive parties and live events',''),(209,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(210,'software','7.5',''),(211,'graphics','8',''),(212,'bonus','8',''),(213,'support','9',''),(214,'banking','6.5',''),(215,'loyaltyprogramme','7',''),(216,'email','service@bodog.eu',''),(217,'tollfree','1 877 263 6422',''),(218,'sitename','Bovada',''),(219,'sitecode','bovada',''),(220,'logo','/images/logos/bovada_home_logo.png',''),(221,'logohome','/images/logos/bovada_home_logo.png',''),(222,'link','/go/bovada.php',''),(223,'bonusvalue','C$2000',''),(224,'bonuspercent','100%',''),(225,'payout','97.3',''),(226,'rating','9',''),(227,'description','Bovada is an excellent casino with a huge first deposit bonus. They offer an amazing selection of slot games that has all your favorites, plus the classics. If you ever need help while playing, they have excellent support and their loyalty rewards are some of the best in the business.',''),(228,'sitename','Casino.com',''),(229,'sitecode','casinocom',''),(230,'logo','/images/casino.com.png',''),(231,'link','/go/casinocom.php',''),(232,'bonusvalue','C$400',''),(233,'bonuspercent','100%',''),(234,'payout','<span class=\"percent\">96.72%</span>',''),(235,'rating','8.1',''),(236,'ratingstars','81%',''),(237,'cta','Get Your C$400 Slots Bonus at Casino.com Now!',''),(238,'reviewurl','/reviews/casino-com',''),(239,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(240,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(241,'screen2','/images/screens/jackpot-city/slots.jpg',''),(242,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(243,'slots','200',''),(244,'payouttime','3-6 Days',''),(245,'gamestatus','MOST POPULAR',''),(246,'gametitle','JUNGLE JIM',''),(247,'gametext','AN EXCITING QUEST FOR LOST TREASURE',''),(248,'gamelogo','junglejim-logo.png',''),(249,'gamelogoalt','Jungle Jim Logo',''),(250,'realmoneygames','200',''),(251,'devices','apple||windows||android',''),(252,'paymentsystems','visa||mastercard||maestro||skrill',''),(253,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(254,'features','Playtech-powered online casino||Welcome package of $400 and 200 spins for free||Awesome progressive slots games||Mobile casino app with top gaming options',''),(255,'vip','Personal account manager||Exclusive promotions||Higher loyalty point conversion rate||Fast withdrawal times',''),(256,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(257,'software','9',''),(258,'graphics','8.5',''),(259,'bonus','9',''),(260,'support','8',''),(261,'banking','7',''),(262,'loyaltyprogramme','8',''),(263,'email','support@casino.com',''),(264,'tollfree','+350 200 44793',''),(265,'sitename','Casino Room',''),(266,'sitecode','casinoroom',''),(267,'logo','/images/casinoroom.png',''),(268,'link','/go/casinoroom.php',''),(269,'bonusvalue','C$200',''),(270,'bonuspercent','200%',''),(271,'payout','<span class=\"percent\">95.83%</span>',''),(272,'rating','9.2',''),(273,'ratingstars','92%',''),(274,'cta','Get Your C$200 Slots Bonus at Casino Room Now!',''),(275,'reviewurl','/reviews/casinoroom',''),(276,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(277,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(278,'screen2','/images/screens/jackpot-city/slots.jpg',''),(279,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(280,'slots','300',''),(281,'payouttime','3-5 Days',''),(282,'gamestatus','MOST POPULAR',''),(283,'gametitle','JUNGLE JIM',''),(284,'gametext','AN EXCITING QUEST FOR LOST TREASURE',''),(285,'gamelogo','junglejim-logo.png',''),(286,'gamelogoalt','Jungle Jim Logo',''),(287,'realmoneygames','300',''),(288,'devices','apple||windows||android',''),(289,'paymentsystems','visa||mastercard||maestro||skrill',''),(290,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(291,'features','Over 400 slots from top providers||No download online casino||Top mobile casino with 300+ games||Multiple choices for the welcome bonuses',''),(292,'vip','Daily missions with rewards||Super free spins||Free reload offers||Experience Points for being active',''),(293,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(294,'software','9.5',''),(295,'graphics','10',''),(296,'bonus','8',''),(297,'support','10',''),(298,'banking','8',''),(299,'loyaltyprogramme','7',''),(300,'email','support@casinoroom.com',''),(301,'tollfree','+1(587) 806 5051',''),(302,'sitename','Casino Titan',''),(303,'sitecode','ctitan',''),(304,'logo','/images/logo-casinotitan.jpg',''),(305,'logohome','/images/logos/titan_home_logo.png',''),(306,'logoinner','/images/logos/loco_home_logo.png',''),(307,'link','/go/casino-titan.php',''),(308,'bonusvalue','C$3000',''),(309,'bonuspercent','100%',''),(310,'payout','94.9%',''),(311,'rating','8',''),(312,'description','Casino Titan is an excellent established brand in the online casino realm. They have an excellent welcome bonus plus excellent loyalty and VIP programs for returning players. Additionally because they have been around a long time, their customer support is some of the best in the industry.',''),(313,'bullet1','A great selection of over 500 games',''),(314,'bullet2','Play instantly with easy-to-use software',''),(315,'bullet3','Enjoy huge jackpots over C$5 million',''),(316,'bullet4','Deposit using a wide range of methods',''),(317,'sitename','Drake',''),(318,'sitecode','drake',''),(319,'logo','/images/logo-drake.jpg',''),(320,'logohome','/images/logos/drake_home_logo.png',''),(321,'link','/go/drake.php',''),(322,'bonusvalue','C$1000',''),(323,'bonuspercent','100%',''),(324,'payout','97.5',''),(325,'rating','9',''),(326,'description','Drake casino is one of the leading mobile casinos out there. They offer a great first deposit bonus and the graphics and feel of their casino software are second to none. The support at this casino is excellent too ensuring you\'ll have a great time while playing slots here.',''),(327,'sitename','Gaming Club',''),(328,'sitecode','gamingclub',''),(329,'logo','/images/logos/logo-gamingclub.png',''),(330,'logohome','/images/logos/gamingclub-logo.png',''),(331,'logoinner','/images/logos/inner/gamingclub.png',''),(332,'link','/go/gaming-club.php',''),(333,'bonusvalue','C$800',''),(334,'bonuspercent','100%',''),(335,'payout','<span class=\"percent\">94.9%</span>',''),(336,'rating','8.55',''),(337,'ratingstars','85%',''),(338,'cta','Get your C$800 bonus at Gaming Club today!',''),(339,'reviewurl','/reviews/gaming-club',''),(340,'tooltip','Your first 2 deposits are worth more at Gaming Club. Get a 100% bonus up to C$200 on your 1st deposit and a 150% bonus up to C$150 on your 2nd.',''),(341,'screen1','/images/screens/gaming-club/gaming-club-lobby.jpg',''),(342,'screen1link','/images/screens/gaming-club/lg/gaming-club-lobby.jpg',''),(343,'screen2','/images/screens/gaming-club/gaming-club-slots.jpg',''),(344,'screen2link','/images/screens/gaming-club/lg/gaming-club-slots.jpg',''),(345,'slots','415',''),(346,'bullet1','Enjoy a huge selection of over 500 games',''),(347,'bullet2','Play instantly with easy-to-use software',''),(348,'bullet3','Opportunity to win jackpots worth millions',''),(349,'bullet4','Deposit using a wide range of methods',''),(350,'payouttime','2-4 Days',''),(351,'gamestatus','MOST POPULAR',''),(352,'gametitle','ALASKAN FISHING',''),(353,'gametext','VIDEO SLOT TAKES YOU ON A FISHING ADVENTURE',''),(354,'gamelogo','/images/redesign/alaskan-fishing.jpg',''),(355,'gamelogoalt','Alaskan Fishing Logo',''),(356,'gamelink','/games/alaskan-fishing',''),(357,'realmoneygames','545',''),(358,'devices','apple||windows||android',''),(359,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(360,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(361,'features','Huge games variety||eCogra certification||Smartphone & tablet compatibility||Free customer support line',''),(362,'vip','Free spins & credits||Dedicated tournaments||Player prizes||Exclusive bonus||Personal Assistant',''),(363,'slotgames','tomb-raider||hellboy||hitman||stash-of-the-titans||thunderstruck||the-dark-knight-rises||double-magic||fantastic-7s||high-5-mega-spin||mega-moolah||major-millions||tunzamunni-',''),(364,'software','9',''),(365,'graphics','9',''),(366,'bonus','9',''),(367,'support','9.5',''),(368,'banking','9.5',''),(369,'loyaltyprogramme','9.5',''),(370,'email','See form on website',''),(371,'tollfree','1-800-768-1946',''),(372,'sitename','Grand Parker',''),(373,'sitecode','gparker',''),(374,'logo','/images/logo-grandparker.jpg',''),(375,'logohome','/images/logos/grandparker_home_logo.png',''),(376,'link','/go/grand-parker.php',''),(377,'bonusvalue','C$4000',''),(378,'bonuspercent','100%',''),(379,'payout','98.2%',''),(380,'rating','10',''),(381,'description','Grand Parker Casino boasts one of the best first deposit bonuses in the industry and has outstanding VIP programs also. Grand Parker boasts over three hundred different slot games including all your favorites. This is a top notch site that you have to try!',''),(382,'logo','/images/hippodrome/hippodrome-logo.png',''),(383,'bonusvalue','C$1000',''),(384,'bonuspercent','100%',''),(385,'reviewurl','/reviews/hippodrome',''),(386,'link','/go/hippodrome.php',''),(387,'sitename','Hippodrome',''),(388,'ratingstars','91%',''),(389,'features','Live Casino||5 Reel Slots||3 Reel Slots||Blackjack||Roulette||Banking||Rewards',''),(390,'vip','Tiered loyalty points||Exclusive events||Player rewards||Cash back for gaming||Concierge',''),(391,'slotgames','break-da-bank-again||immortal-romance||mega-moolah||thunderstruck-ii',''),(392,'software','9.3',''),(393,'graphics','9.6',''),(394,'bonus','8.2',''),(395,'support','9.1',''),(396,'banking','10',''),(397,'loyaltyprogramme','8.5',''),(398,'email','support@hippodromeonline.com',''),(399,'tollfree','1-877-907-4248',''),(400,'sitename','Jackpot City',''),(401,'sitecode','jpc',''),(402,'logo','/images/jackpotjoy-big-logo.png',''),(403,'logoinner','/images/logos/inner/jackpotcity-logo.png',''),(404,'logohome','/images/logos/jackpotcity_large.png',''),(405,'link','/go/jackpot-city.php',''),(406,'bonusvalue','C$1600',''),(407,'bonuspercent','100%',''),(408,'payout','<span class=\"percent\">98.5%</span>',''),(409,'rating','9',''),(410,'ratingstars','90%',''),(411,'cta','Get Your C$1600 Slots Bonus at Jackpot City Now!',''),(412,'reviewurl','/reviews/jackpot-city',''),(413,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(414,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(415,'screen2','/images/screens/jackpot-city/slots.jpg',''),(416,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(417,'slots','415',''),(418,'bullet1','A great selection of over 400 casino games',''),(419,'bullet2','Opportunity to win jackpots over C$10 million',''),(420,'bullet3','Exchange loyalty points for real money credits',''),(421,'bullet4','Play in browser or download software for free',''),(422,'payouttime','1-2 Days',''),(423,'gamestatus','MOST POPULAR',''),(424,'gametitle','GONZO\'S QUEST',''),(425,'gametext','HELP GONZO ON HIS QUEST FOR THE LOST CITY OF GOLD',''),(426,'gamelogo','/images/redesign/gonzos-quest.jpg',''),(427,'gamelogoalt','Gonzo\'s Quest Logo',''),(428,'gamelink','/games/gonzos-quest',''),(429,'realmoneygames','650+',''),(430,'devices','apple||windows||android',''),(431,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(432,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(433,'features','4 new games each month||more than 500+ to choose from!||No download games available||96.80% payout rate',''),(434,'vip','Personal assistant||Custom promotions||Free spins||Credits for playing',''),(435,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(436,'software','9',''),(437,'graphics','8.5',''),(438,'bonus','8.5',''),(439,'support','9',''),(440,'banking','10',''),(441,'loyaltyprogramme','8',''),(442,'email','support@jackpotcity.com\n                        ',''),(443,'tollfree','1-800-768-1946',''),(444,'sitename','Jackpot City',''),(445,'sitecode','jackpotcity',''),(446,'logo','/images/logo-jackpotcity.jpg',''),(447,'logohome','/images/logos/jackpotcity_large.png',''),(448,'link','/go/jackpot-city-fr.php',''),(449,'bonusvalue','500 &dollar; CA',''),(450,'bonuspercent','100%',''),(451,'payout','<span class=\"percent\">97.1%</span>',''),(452,'rating','8',''),(453,'ratingstars','80%',''),(454,'cta','Get Your C&dollar;500 Slots Bonus at Jackpot City Now!',''),(455,'bullet1','Formidable choix de plus de 400 jeux de casino',''),(456,'bullet2','Offre des jackpots de plus de 10 millions de &dollar;CA',''),(457,'bullet3','&Eacute;changez vos points de fid&eacute;lit&eacute; contre de l\'argent r&eacute;el',''),(458,'bullet4','Jouez en instant play ou t&eacute;l&eacute;chargez le logiciel gratuit',''),(459,'slots','415',''),(460,'payouttime','1-2 Jours',''),(461,'gamestatus','Jeu vedette',''),(462,'gametitle','GONZO\'S QUEST',''),(463,'gametext','AIDEZ GONZO DANS SA RECHERCHE DE LA CIT&Eacute; PERDUE DE L\'OR',''),(464,'gamelogo','/images/redesign/gonzos-quest.jpg',''),(465,'gamelogoalt','Gonzo\'s Quest Logo',''),(466,'gamelink','/games/gonzos-quest',''),(467,'realmoneygames','650+',''),(468,'devices','apple||windows||android',''),(469,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(470,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(471,'logo','/images/logo-leo-vegas.png',''),(472,'bonuspercent','100%',''),(473,'bonusvalue','C$1000',''),(474,'reviewurl','/reviews/leo-vegas',''),(475,'link','/go/leo-vegas.php',''),(476,'sitename','Leo Vegas',''),(477,'ratingstars','85%',''),(478,'features','Welcome bonuses||Vivid graphics and sound||Huge selection of mobile-optimized slots.',''),(479,'vip','Get free cash and spins||Special event invites||Other prizes||Higher limits on banking||Support hotline',''),(480,'slotgames','eye-of-the-kraken||immortal-romance||razor-tooth',''),(481,'software','9.5',''),(482,'graphics','9.5',''),(483,'bonus','9',''),(484,'support','10',''),(485,'banking','8',''),(486,'loyaltyprogramme','8',''),(487,'email','support@leovegas.com',''),(488,'tollfree','888-409-1165',''),(489,'sitename','Loco Panda',''),(490,'sitecode','locop',''),(491,'logo','/images/logo-locopanda.jpg',''),(492,'logohome','/images/logos/loco_home_logo.png',''),(493,'logoinner','/images/logos/loco_home_logo.png',''),(494,'link','/go/loco-panda.php',''),(495,'bonusvalue','C$4000',''),(496,'bonuspercent','100%',''),(497,'payout','98.5%',''),(498,'rating','10',''),(499,'description','Loco Panda Casino is clearly one of the best online casino\'s in the industry. Their platform has over 400 excellent slot games and their first deposit bonus is huge! With up to C$4000 in initial deposit bonuses, you will be in on the action fast! Loco Panda Casion has excellent customer support and always takes care of their loyal customers.',''),(500,'bullet1','All your Canadian credit cards accepted',''),(501,'bullet2','More than C$5 million in daily payouts',''),(502,'bullet3','Enjoy a huge variety with 580+ games',''),(503,'bullet4','Get up to C$1000 in deposit bonuses  ',''),(504,'logo','/images/lucky247/lucky247_logo.png',''),(505,'bonusvalue','C$500',''),(506,'reviewurl','/reviews/lucky-247',''),(507,'link','/go/lucky-247.php',''),(508,'sitename','Lucky 247',''),(509,'ratingstars','80%',''),(510,'features','All Of Microgaming’s Latest Releases||Range Of Bonuses And Monthly Promotions||Loyalty Points Earned On All Games',''),(511,'vip','Tiered loyalty points||Go to special events||Monthly prizes||Express payouts||Better player support',''),(512,'slotgames','bridesmaids||immortal-romance||terminator-2||wild-orient||hot-as-hades||jackpot-express',''),(513,'software','8.5',''),(514,'graphics','8.0',''),(515,'bonus','8.5',''),(516,'support','9',''),(517,'banking','8.5',''),(518,'loyaltyprogramme','7.5',''),(519,'email','See Contact Form',''),(520,'tollfree','1866-785-1681Also Live Chat and Skype',''),(521,'logo','/images/partycasino/partycasino-logo.png',''),(522,'bonusvalue','C$100',''),(523,'reviewurl','/reviews/party-casino',''),(524,'link','/go/party-casino.php',''),(525,'sitename','Party Casino',''),(526,'ratingstars','70%',''),(527,'features','Huge slots selection||All major payment options||Powerful software from IGT||Excellent mobile play',''),(528,'vip','Points programme||Exclusive events||Ongoing promotions||Speedier cashouts||VIP hospitality',''),(529,'slotgames','games-of-thrones||melon-madness||jurassic-park||karaoke-party||ace-ventura||thunderstruck-ii',''),(530,'software','9',''),(531,'graphics','9.5',''),(532,'bonus','8',''),(533,'support','10',''),(534,'banking','9.5',''),(535,'loyaltyprogramme','9.5',''),(536,'email','info@partycasino.com\n                        ',''),(537,'tollfree','1-844-440-6188',''),(538,'sitename','Platinum Play',''),(539,'sitecode','plat',''),(540,'logo','/images/screen-platinum-logo.png',''),(541,'logohome','/images/logos/platinum_home_logo.png',''),(542,'link','/go/platinum-play.php',''),(543,'bonusvalue','C$200 + 1500',''),(544,'bonuspercent','100%',''),(545,'payout','96.8%',''),(546,'rating','8',''),(547,'ratingstars','80%',''),(548,'cta','Claim Your C$200 Bonus and 1500 Free Bets at Platinum Play Now!',''),(549,'reviewurl','/reviews/platinum-play',''),(550,'features','Established site trusted by players||Free cash on sign up||Fast payment at the cashier||Innovative welcome bonus',''),(551,'vip','Reward points||Stay at hotels & events||Weekly & monthly promotions||Win huge cash prizes||Dedicated player support',''),(552,'slotgames','reel-gems||immortal-romance||bush-telegraph||mermaid-millions',''),(553,'software','10',''),(554,'graphics','9.5',''),(555,'bonus','9.5',''),(556,'support','9',''),(557,'banking','9',''),(558,'loyaltyprogramme','9',''),(559,'email','support@casinodesk.com',''),(560,'tollfree','1-866-7452-416',''),(561,'sitename','Roxy Palace',''),(562,'sitecode','roxypalace',''),(563,'logo','/images/logo-roxy-palace.png',''),(564,'logohome','/images/logos/roxypalace-logo.png',''),(565,'link','/go/roxy-palace.php',''),(566,'bonusvalue','C$350',''),(567,'bonuspercent','100%',''),(568,'payout','<span class=\"percent\">95.9%</span>',''),(569,'rating','7',''),(570,'ratingstars','80%',''),(571,'cta','Get your C$350 slots bonus at Roxy Palace today!',''),(572,'reviewurl','/reviews/roxy-palace',''),(573,'features','Over 500 slots Powered by Microgaming||Realistic Graphics and Sounds||Multi-line Games||Canadian Players Welcome',''),(574,'vip','Rewards scheme||VIP Events||Exclusive promotions||Substantial bonus||Player assistance',''),(575,'slotgames','games-of-thrones||thunderstruck||thunderstruck-ii||jurassic-park||avalon-ii||immortal-romance||the-dark-knight-rises||mega-moolah',''),(576,'software','9',''),(577,'graphics','9',''),(578,'bonus','8',''),(579,'support','9.5',''),(580,'banking','8.5',''),(581,'loyaltyprogramme','9.5',''),(582,'email','See form on website',''),(583,'tollfree','1855-388-1461',''),(584,'logo','/images/logo-royal-panda.png',''),(585,'bonuspercent','100%',''),(586,'bonusvalue','C$100',''),(587,'reviewurl','/reviews/royal-panda',''),(588,'link','/go/royal-panda.php',''),(589,'sitename','Royal Panda',''),(590,'ratingstars','90%',''),(591,'features','Extensive games range||Software and no download gaming||Full range of fast payment options',''),(592,'vip','Points programme||Access more games||Seasonal prize draws||Higher bet limits||Personal assistant',''),(593,'slotgames','south-park||starburst||gonzos-quest||thunderstruck-ii||mega-moolah||cash-splash',''),(594,'software','9.0',''),(595,'graphics','8.5',''),(596,'bonus','8.5',''),(597,'support','9',''),(598,'banking','8.8',''),(599,'loyaltyprogramme','9',''),(600,'email','\n                            support@royalpanda.com\n                        ',''),(601,'tollfree','+356 2778 0418',''),(602,'sitename','Royal Vegas',''),(603,'sitecode','royalvegas',''),(604,'logo','/images/screen-royal-logo.png',''),(605,'logohome','/images/logos/royal_home_logo.png',''),(606,'logoinner','/images/logos/inner/royal-vegas-logo.png',''),(607,'link','/go/royal-vegas.php',''),(608,'bonusvalue','C$250',''),(609,'bonuspercent','100%',''),(610,'payout','<span class=\"percent\">94.9%</span>',''),(611,'rating','8',''),(612,'ratingstars','80%',''),(613,'cta','Get yourC$250 slots bonus at Royal Vegas today!',''),(614,'reviewurl','/reviews/royal-vegas',''),(615,'tooltip','You could earn up to C$250 on your first 5 deposits at Royal Vegas. Create your free account using our links to qualify.',''),(616,'screen1','/images/screens/royal-vegas/royal-vegas-smallscreen.png',''),(617,'screen1link','/images/screens/royal-vegas/lg/royal-vegas-bigscreen.png',''),(618,'screen2','/images/screens/royal-vegas/royal-vegas-smallscreen2.png',''),(619,'screen2link','/images/screens/royal-vegas/lg/royal-vegas-bigscreen2.png',''),(620,'slots','415',''),(621,'bullet1','A great selection of over 500 games',''),(622,'bullet2','Play instantly with easy-to-use software',''),(623,'bullet3','Enjoy huge jackpots over C$5 million',''),(624,'bullet4','Deposit using a wide range of methods',''),(625,'payouttime','2-4 Days',''),(626,'gamestatus','MOST POPULAR',''),(627,'gametitle','RECORD JACKPOT STARBURST',''),(628,'gametext','up to 20 winning lines',''),(629,'gamelogo','logo-record-jackpot-starburst.png',''),(630,'gamelogoalt','Record Jackpot Starburst Logo',''),(631,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(632,'features','Over 500 games to enjoy||Established site from 2000||Dedicated iOS app for mobile gaming||Exciting live dealer variants',''),(633,'vip','Casino credits||Attend events||Exclusive promotions||Extra bonus||Bespoke player support',''),(634,'slotgames','tomb-raider||mega-moolah||the-dark-knight-rises||thunderstruck',''),(635,'software','8.5',''),(636,'graphics','9.5',''),(637,'bonus','8.5',''),(638,'support','9',''),(639,'banking','9',''),(640,'loyaltyprogramme','8',''),(641,'email','support@fortunelounge.com',''),(642,'tollfree','1-866-7452-416',''),(643,'sitename','Royal Vegas',''),(644,'sitecode','royalvegas',''),(645,'logo','/images/logo-royalvegas.jpg',''),(646,'logohome','/images/logos/royal_home_logo.png',''),(647,'logoinner','/images/logos/inner/royal-vegas-logo.png',''),(648,'link','/go/royal-vegas-fr.php',''),(649,'bonusvalue','250 &dollar; CA',''),(650,'bonuspercent','100%',''),(651,'payout','<span class=\"percent\">94.9%</span>',''),(652,'rating','8',''),(653,'ratingstars','80%',''),(654,'cta','Get your C&dollar;250 slots bonus at Royal Vegas today!',''),(655,'tooltip','You could earn up to C&dollar;250 on your first 5 deposits at Royal Vegas. Create your free account using our links to qualify.',''),(656,'screen1','/images/screens/royal-vegas/royal-vegas-smallscreen.png',''),(657,'screen1link','/images/screens/royal-vegas/lg/royal-vegas-bigscreen.png',''),(658,'screen2','/images/screens/royal-vegas/royal-vegas-smallscreen2.png',''),(659,'screen2link','/images/screens/royal-vegas/lg/royal-vegas-bigscreen2.png',''),(660,'slots','415',''),(661,'bullet1','Décrochez jusqu\'&agrave; C&dollar;250 de bonus !',''),(662,'bullet2','200 machines &agrave; sous progressives',''),(663,'bullet3','Jeux de casinos prim&eacute;s',''),(664,'bullet4','Compatible avec iOS et Android',''),(665,'payouttime','2-4 Jours',''),(666,'gamestatus','Jeu vedette',''),(667,'gametitle','ALASKAN FISHING',''),(668,'gametext','CETTE MACHINE &Agrave; SOUS VID&Eacute;O VOUS EMM&Egrave;NE P&Ecirc;CHER  ',''),(669,'gamelogo','/images/redesign/alaskan-fishing.jpg',''),(670,'gamelogoalt','Alaskan Fishing Logo',''),(671,'gamelink','/games/alaskan-fishing',''),(672,'realmoneygames','350',''),(673,'devices','apple||windows||android',''),(674,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(675,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(676,'sitename','Ruby Fortune',''),(677,'sitecode','rubyfortune',''),(678,'logo','/images/screen-ruby-logo.png',''),(679,'logohome','/images/logos/ruby_fortune_large.png',''),(680,'logoinner','/images/logos/inner/rubyfortune.png',''),(681,'link','/go/ruby-fortune.php',''),(682,'bonusvalue','C$750',''),(683,'bonuspercent','100%',''),(684,'payout','<span class=\"percent\">97.1%</span>',''),(685,'rating','8.5',''),(686,'ratingstars','90%',''),(687,'cta','PocketC$750 in deposit bonuses to play slots at Ruby Fortune today!',''),(688,'reviewurl','/reviews/ruby-fortune',''),(689,'tooltip','Get up toC$750 on your very first deposit with the exclusive welcome bonus that we\'ve negotiated.',''),(690,'screen1','/images/screens/ruby-fortune/ruby-fortune-smallscreen.jpg',''),(691,'screen1link','/images/screens/ruby-fortune/lg/ruby-fortune-bigscreen.jpg',''),(692,'screen2','/images/screens/ruby-fortune/ruby-fortune-smallscreen2.jpg',''),(693,'screen2link','/images/screens/ruby-fortune/lg/ruby-fortune-bigscreen2.jpg',''),(694,'slots','420',''),(695,'bullet1','Free spins to enjoy real money slots online',''),(696,'bullet2','Enjoy monthly bonuses &amp; promotions',''),(697,'bullet3','Benefit from a high payout rate of 97.8%',''),(698,'bullet4','Play on your desktop and mobile phone',''),(699,'payouttime','2-3 Days',''),(700,'gamestatus','MOST POPULAR',''),(701,'gametitle','AVALON',''),(702,'gametext','CLASSIC SLOT BASED ON THE LEGEND OF ARTHUR',''),(703,'gamelogo','/images/redesign/avalon.jpg',''),(704,'gamelogoalt','Avalon Logo',''),(705,'gamelink','/games/avalon',''),(706,'realmoneygames','650',''),(707,'devices','apple||windows||android',''),(708,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(709,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(710,'features','Sharp||Realistic graphics||Several bonuses||Comprehensive mobile gaming||Nearly 500 games to play',''),(711,'vip','Tiered bonus points||Extra gaming||Player rewards||Speedier payments||Total support',''),(712,'slotgames','mega-moolah||hitman||reel-strike||world-cup-mania||jungle-jim',''),(713,'software','9',''),(714,'graphics','8',''),(715,'bonus','8.5',''),(716,'support','9.5',''),(717,'banking','9',''),(718,'loyaltyprogramme','8',''),(719,'email','support@rubyfortunecasino.com\n                            ',''),(720,'tollfree','1-800-768-1965',''),(721,'sitename','Ruby Fortune',''),(722,'sitecode','rubyfortune',''),(723,'logo','/images/logo-rubyfortune.jpg',''),(724,'logohome','/images/logos/ruby_fortune_large.png',''),(725,'logoinner','/images/logos/inner/rubyfortune.png',''),(726,'link','/go/ruby-fortune-fr.php',''),(727,'bonusvalue','750 &dollar; CA',''),(728,'bonuspercent','100%',''),(729,'payout','<span class=\"percent\">97.8%</span>',''),(730,'rating','8.5',''),(731,'ratingstars','85%',''),(732,'cta','PocketC&dollar;750 in deposit bonuses to play slots at Ruby Fortune today!',''),(733,'tooltip','Get up to C&dollar;750 on your very first deposit with the exclusive welcome bonus that we\'ve negotiated.',''),(734,'screen1','/images/screens/ruby-fortune/ruby-fortune-smallscreen.jpg',''),(735,'screen1link','/images/screens/ruby-fortune/lg/ruby-fortune-bigscreen.jpg',''),(736,'screen2','/images/screens/ruby-fortune/ruby-fortune-smallscreen2.jpg',''),(737,'screen2link','/images/screens/ruby-fortune/lg/ruby-fortune-bigscreen2.jpg',''),(738,'slots','420',''),(739,'bullet1','D&eacute;crochez jusqu\'&agrave; C&dollar;750 de bonus !',''),(740,'bullet2','Moyens de paiement s&ucirc;rs',''),(741,'bullet3','Inscrivez-vous et doublez votre premier d&eacute;p&ocirc;t',''),(742,'bullet4','Compatible avec Android et iOS',''),(743,'bullet5','Jouez et touchez des bonus de fid&eacute;lit&eacute;',''),(744,'payouttime','2-3 Jours',''),(745,'gamestatus','Jeu vedette',''),(746,'gametitle','AVALON',''),(747,'gametext','MACHINE &Agrave; SOUS CLASSIQUE BAS&Eacute;E SUR LA L&Eacute;GENDE D\'ARTHUR',''),(748,'gamelogo','/images/redesign/avalon.jpg',''),(749,'gamelogoalt','Avalon Logo',''),(750,'gamelink','/games/avalon',''),(751,'realmoneygames','650',''),(752,'devices','apple||windows||android',''),(753,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(754,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(755,'sitename','Spin Palace',''),(756,'sitecode','spinpalace',''),(757,'logo','/images/logo-spin-palace.jpg',''),(758,'logohome','/images/logos/spin_palace_large.png',''),(759,'logoinner','/images/logos/inner/spinpalace.png',''),(760,'link','/go/spin-palace.php',''),(761,'screen1','/images/screens/spin-palace/spin-palace-smallscreen.jpg',''),(762,'screen1link','/images/screens/spin-palace/lg/spin-palace-bigscreen.jpg',''),(763,'screen2','/images/screens/spin-palace/spin-palace-smallscreen2.jpg',''),(764,'screen2link','/images/screens/spin-palace/lg/spin-palace-bigscreen2.jpg',''),(765,'bonusvalue','C$1000',''),(766,'bonuspercent','100%',''),(767,'payout','<span class=\"percent\">97.8%</span>',''),(768,'payoutplain','98.5',''),(769,'rating','9',''),(770,'ratingstars','92%',''),(771,'cta','Play slots at Spin Palace and claim C$1000 in bonus money today!',''),(772,'reviewurl','/reviews/spin-palace',''),(773,'slots','450+',''),(774,'tooltip','Use our links to sign up and earn a 100% match bonus worth up to C$1000 on your first deposit. That means deposit C$1,000 and get a C$1,000 bonus.',''),(775,'bullet1','All your Canadian credit cards accepted',''),(776,'bullet2','More than C$5 million in daily payouts',''),(777,'bullet3','Enjoy a huge variety with 580+ games',''),(778,'bullet4','Get up to C$1000 in deposit bonuses  ',''),(779,'payouttime','1-3 Days',''),(780,'gamestatus','FEATURED GAME',''),(781,'gametitle','THUNDERSTRUCK II',''),(782,'gametext','COLOURFUL SLOT STEEPED IN NORSE MYTHOLOGY',''),(783,'gamelogo','/images/redesign/thunderstruck-ii.jpg',''),(784,'gamelogoalt','ThunderStruck II Logo',''),(785,'gamelink','/games/thunderstruck-ii',''),(786,'realmoneygames','655',''),(787,'devices','apple||windows||android',''),(788,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(789,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(790,'features','Autospin||Bonus Rounds||Multi-line Games||Realistic Graphics & Sound.',''),(791,'vip','Rewards points programme||Invites to events||Gifts to plays||Custom bonuses||Exclusive member support',''),(792,'slotgames','tomb-raider||the-dark-knight-rises||thunderstruck-ii||riviere-riches',''),(793,'software','9.5',''),(794,'graphics','8.5',''),(795,'bonus','8.5',''),(796,'support','9',''),(797,'banking','10',''),(798,'loyaltyprogramme','8',''),(799,'email','support@spinpalace.com',''),(800,'tollfree','1877-710-8016',''),(801,'sitename','Spin Palace',''),(802,'sitecode','spinpalace',''),(803,'logo','/images/logo-spinpalace.jpg',''),(804,'logohome','/images/logos/spin_palace_large.png',''),(805,'logoinner','/images/logos/inner/spinpalace.png',''),(806,'link','/go/spin-palace-fr.php',''),(807,'screen1','/images/screens/spin-palace/spin-palace-smallscreen.jpg',''),(808,'screen1link','/images/screens/spin-palace/lg/spin-palace-bigscreen.jpg',''),(809,'screen2','/images/screens/spin-palace/spin-palace-smallscreen2.jpg',''),(810,'screen2link','/images/screens/spin-palace/lg/spin-palace-bigscreen2.jpg',''),(811,'bonusvalue','1000 &dollar; CA',''),(812,'bonuspercent','100%',''),(813,'payout','<span class=\"percent\">98.5%</span>',''),(814,'payoutplain','98.5',''),(815,'rating','9.5',''),(816,'ratingstars','95%',''),(817,'cta','Play slots at Spin Palace and claim C&dollar;1000 in bonus money today!',''),(818,'slots','450+',''),(819,'tooltip','Use our links to sign up and earn a 100% match bonus worth up to C&dollar;1000 on your first deposit. That means deposit C&dollar;1,000 and get a C&dollar;1,000 bonus.',''),(820,'bullet1','D&eacute;crochez jusqu\'&agrave; C&dollar;1000 de bonus !',''),(821,'bullet2','Jouez et gagnez de l\'argent r&eacute;el !',''),(822,'bullet3','Bonus de d&eacute;p&ocirc;t de plus de 1000 $',''),(823,'bullet4','Plus de 580 jeux en argent fictif et r&eacute;el',''),(824,'bullet5','+ de 350 machines &agrave; sous',''),(825,'payouttime','1-3 Jours',''),(826,'gamestatus','Jeu vedette',''),(827,'gametitle','THUNDERSTRUCK II',''),(828,'gametext','MACHINE &Agrave; SOUS HAUTE EN COULEURS &Agrave; TH&Egrave;ME DE MYTHOLOGIE NORDIQUE',''),(829,'gamelogo','/images/redesign/thunderstruck-ii.jpg',''),(830,'gamelogoalt','ThunderStruck II Logo',''),(831,'gamelink','/games/thunderstruck-ii',''),(832,'realmoneygames','655',''),(833,'devices','apple||windows||android',''),(834,'paymentsystems','visa||mastercard||skrill||neteller||paysafecard||instadebit',''),(835,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(836,'sitename','Sports Interaction',''),(837,'sitecode','sportsinteraction',''),(838,'logo','/images/sportsinteraction.png',''),(839,'link','/go/sportsinteraction.php',''),(840,'bonusvalue','C$100',''),(841,'bonuspercent','100%',''),(842,'payout','<span class=\"percent\">95.91%</span>',''),(843,'rating','8.5',''),(844,'ratingstars','85%',''),(845,'cta','Get Your C$100 Slots Bonus at Sports Interaction Now!',''),(846,'reviewurl','/reviews/sportsinteraction',''),(847,'screen1','/images/screens/jackpot-city/lobby.jpg',''),(848,'screen1link','/images/screens/jackpot-city/lg/lobby.jpg',''),(849,'screen2','/images/screens/jackpot-city/slots.jpg',''),(850,'screen2link','/images/screens/jackpot-city/lg/slots.jpg',''),(851,'slots','100',''),(852,'payouttime','3-4 Days',''),(853,'gamestatus','MOST POPULAR',''),(854,'gametitle','JUNGLE JIM',''),(855,'gametext','AN EXCITING QUEST FOR LOST TREASURE',''),(856,'gamelogo','junglejim-logo.png',''),(857,'gamelogoalt','Jungle Jim Logo',''),(858,'realmoneygames','100',''),(859,'devices','apple||windows||android',''),(860,'paymentsystems','visa||mastercard||maestro||skrill',''),(861,'paymentsystemsbig','visa_big||mastercard_big||maestro_big||skrill_big',''),(862,'features','Betting site launched in 1997||Licensed by Kahnawake Gaming Commission||Slots from Playtech, Betsoft, and iSoftBet||Exclusive bonuses for Canadians',''),(863,'vip','100% casino welcome bonus||Maximum amount of $100||Bonus code FIRST100||Monthly reload bonuses and promos',''),(864,'slotgames','hellboy||tomb-raider||cashapillar||avalon',''),(865,'software','8.5',''),(866,'graphics','8.5',''),(867,'bonus','7',''),(868,'support','8',''),(869,'banking','7.5',''),(870,'loyaltyprogramme','5',''),(871,'email','casino@sportsinteraction.com',''),(872,'tollfree','1 888 922 5575',''),(873,'sitename','Win Palace',''),(874,'sitecode','wpalace',''),(875,'logo','/images/logo-winpalace.jpg',''),(876,'logohome','/images/logos/winpalace_home_logo.png',''),(877,'logoinner','/images/logos/loco_home_logo.png',''),(878,'link','/go/winpalace.php',''),(879,'bonusvalue','C$1000',''),(880,'bonuspercent','100%',''),(881,'payout','97.8%',''),(882,'rating','9',''),(883,'description','Winpalace Casino has been around for a long time; it goes without saying that they know what they are doing! They offer a lucrative C$1000 first deposit bonus and they have an wide selection of everyone\'s favorite slot games. You will find their casino inviting from every angle, including support, loyalty and continuing bonuses.',''),(884,'bullet1','Great reputation, established in 2003',''),(885,'bullet2','Enjoy monthly bonuses &amp; promotions',''),(886,'bullet3','Benefit from a high payout rate of 97.8%',''),(887,'bullet4','Play on your desktop and mobile phone',''),(888,'bullet1','Compatible with all Android devices','false'),(889,'bullet1','Earn real money with over 580 games','false'),(890,'bullet3','Access to large sign up bonuses','true'),(891,'bullet4','Wide range of payment methods accepted','true'),(892,'bullet1','Over a decade of online gambling experience','false'),(893,'bullet2','Easy to use on mobile devices','true'),(894,'bullet3','Payout rate of 97.8%','true'),(895,'bullet4','Free play options available','true'),(896,'bullet1','Incredible range of gaming themes','false'),(897,'bullet2','Earn bonuses on your first 5 deposits','false'),(898,'bullet3','Exchange loyalty points for real cash','false'),(899,'bullet4','Progressive jackpots over C$3 million','false'),(900,'bullet1','Mac compatible','false'),(901,'bullet2','Wide range of deposit method options','true'),(902,'bullet3','500 loyalty points upon sign up','true'),(903,'bullet4','Up to C$1000 in sign up bonuses','true'),(904,'bullet1','Play across different platform types','true'),(905,'bullet2','Bonuses offered on big wins!','true'),(906,'bullet3','Amazing payout rate of 97.8%','true'),(907,'bullet4','Both 3 and 5 reel slots available','true'),(908,'bullet1','Up toC$1200 worth of deposit bonuses','false'),(909,'bullet2','Progressive jackpots on slot games','false'),(910,'bullet3','Transfer funds using a range of methods','false'),(911,'bullet4','More than 500 games to choose from','false'),(912,'bullet4','Bonus offers and promotions accessible','false'),(913,'bullet3','24/7 customer service available','false'),(914,'bullet2','Trouble-free, in app registration','false'),(915,'bullet1','Choice of 300 slot machines','false'),(916,'bullet1','Fair, easy, safe & fun gaming','true'),(917,'bullet2','Monthly cash prize draws','true'),(918,'bullet3','Multiple payment options','true'),(919,'bullet4','Easy use on iPhones','true'),(920,'bullet1','Now playable on your iPhone','false'),(921,'bullet2','C$5 million  in real money payouts daily','false'),(922,'bullet3','More than 500 games to win on','false'),(923,'bullet4','Huge sign up bonuses available','false'),(924,'bullet1','Useable on mobiles & smartphones','false'),(925,'bullet2','Incredible variety of games','false'),(926,'bullet3','C$1000 welcome package','false'),(927,'bullet4','Easy-to-use interface','false'),(928,'bullet1','Easy-to-use mobile app','false'),(929,'bullet2','Gain up toC$750 worth of bonuses','false'),(930,'bullet3','As well as regular promotions','false'),(931,'bullet4','Regularly third-party tested for security','false'),(932,'bullet1','Average payout of 94.9%','false'),(933,'bullet2','Wide range of playable slot games','false'),(934,'bullet3','C$1200 worth of welcome bonuses available','false'),(935,'bullet4','Funds manageable through many methods','false'),(936,'bullet1','200  slots with progressive jackpots','false'),(937,'bullet2','Award winning casino entertainment','false'),(938,'bullet3','Secure gaming environment','false'),(939,'bullet4','Accessible across a range of platforms','false'),(940,'bullet1','Play with and earn real cash','false'),(941,'bullet2','Over C$1000 available in deposit bonuses','false'),(942,'bullet3','More than 580 games to play with real money','false'),(943,'bullet4','350  themed slot games','false'),(944,'bullet1','Reliable banking options','false'),(945,'bullet2','Sign up and double your first real money deposit','false'),(946,'bullet3','Available on Android & iOS','false'),(947,'bullet4','Loyalty bonuses when playing with real cash','false'),(948,'bullet1','Great choice of over 500 games','false'),(949,'bullet2','Strong reputation, established in 2000','false'),(950,'bullet3','Easy gaming on any device','false'),(951,'bullet4','Latest software for authentic casino experience','false'),(952,'bullet1','Australia&apos;s most recommended casino','false'),(953,'bullet2','Enjoy real money sign up bonuses','false'),(954,'bullet3','Deposit with debit and credit cards','false'),(955,'bullet4','500  games and great player experience','false'),(956,'bullet1','Earn quality player rewards and bonuses','false'),(957,'bullet2','Flexible bet rates for any budget','false'),(958,'bullet3','Over 580 games with great themes','false'),(959,'bullet4','Trusted site with great support','false'),(960,'bullet1','Feel welcome with C$1000 deposit bonus','false'),(961,'bullet2','Latest software with great gameplay','false'),(962,'bullet3','Accepts online payments like Interac','false'),(963,'bullet4','Nearly 600 games to try','false'),(964,'bullet1','Play every slot machine type','false'),(965,'bullet2','Excellent payout rates of 97.8%','false'),(966,'bullet3','Get rewarded with loyalty points','false'),(967,'bullet4','Latest and trusted software','false'),(968,'bullet1','Play for high payout ratios','false'),(969,'bullet2','Get up toC$750 in bonuses','false'),(970,'bullet3','Trusted, with over a decade of experience','false'),(971,'bullet4','Great gameplay on mobile','false'),(972,'bullet1','Bigger & better progressive jackpots','false'),(973,'bullet2','Dedicated helpdesk for players','false'),(974,'bullet3','Over 580 online games, and growing','false'),(975,'bullet4','Bonuses on your first 3 deposits','false'),(976,'bullet1','Engaging real images and sound themes','false'),(977,'bullet2','Over 300 video slot games','false'),(978,'bullet3','Play in your choice of currency','false'),(979,'bullet4','97.8% payout rate','false'),(980,'bullet1','Fair & random slot games','false'),(981,'bullet2','Extra features in video slot games','false'),(982,'bullet3','Progressive jackpots worth millions of $','false'),(983,'bullet4','Earn up toC$1200 in real money','false');
/*!40000 ALTER TABLE `partner_information_pairs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_verticals`
--

DROP TABLE IF EXISTS `partner_verticals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_verticals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_verticals`
--

LOCK TABLES `partner_verticals` WRITE;
/*!40000 ALTER TABLE `partner_verticals` DISABLE KEYS */;
INSERT INTO `partner_verticals` VALUES (1,'poker'),(2,'casino'),(3,'sports'),(4,'bingo'),(5,'lottery'),(6,'socialcasino'),(7,'fantasysports'),(8,'socialpoker'),(9,'paypal'),(10,'android'),(11,'iphone'),(12,'visa'),(13,'mastercard'),(14,'amex'),(15,'maestro'),(16,'paysafecard'),(17,'neteller'),(18,'skrill'),(19,'interac'),(20,'bitcoin'),(21,'trustly'),(22,'apple-pay'),(23,'slots'),(24,'jackpots'),(25,'roulette'),(26,'blackjack'),(27,'livecasino'),(28,'baccarat'),(29,'video-poker'),(30,'free-spins'),(31,'no-deposit'),(32,'novoline'),(33,'merkur'),(34,'microgaming'),(35,'play\'n\'go'),(36,'netent'),(37,'igt'),(38,'btg'),(39,'rtg'),(40,'yggdrasil'),(41,'blueprint'),(42,'bally'),(43,'playtech'),(44,'wms'),(45,'nextgen'),(46,'sg-interactive'),(47,'ainsworth'),(48,'egt'),(49,'casino-chde'),(50,'casino-chfr'),(51,'casino-chit'),(53,'casino-cafr'),(54,'keno'),(55,'terms'),(56,'cafr'),(57,'debit'),(58,'echeck'),(59,'quebec'),(60,'casinocafr'),(61,'real-money'),(62,'craps'),(63,'caribbean-stud-poker'),(64,'special-ae'),(65,'casino-inhi'),(66,'paysafe'),(67,'megamoolah'),(68,'racing'),(69,'bookofra'),(70,'review'),(71,'homepage'),(72,'test'),(73,'retro-vegas'),(74,'live1');
/*!40000 ALTER TABLE `partner_verticals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `partner_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `partner_active` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT 'true',
  PRIMARY KEY (`partner_id`),
  UNIQUE KEY `unique_partner_name` (`partner_name`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'32red','true'),(2,'7sultans','true'),(3,'allslots','true'),(4,'betonline','true'),(5,'betway','true'),(6,'betway-fr','true'),(7,'bodog','true'),(8,'bovada','true'),(9,'casinocom','true'),(10,'casinoroom','true'),(11,'casinotitan','true'),(12,'drake','true'),(13,'gamingclub','true'),(14,'grandparker','true'),(15,'hippodrome','true'),(16,'jackpotcity','true'),(17,'jackpotcity-fr','true'),(18,'leovegas','true'),(19,'locopanda','true'),(20,'lucky247','true'),(21,'partycasino','true'),(22,'platinumplay','true'),(23,'roxypalace','true'),(24,'royalpanda','true'),(25,'royalvegas','true'),(26,'royalvegas-fr','true'),(27,'rubyfortune','true'),(28,'rubyfortune-fr','true'),(29,'spincasino','true'),(30,'spincasino-fr','true'),(31,'sportsinteraction','true'),(32,'winpalace','true'),(33,'megamoolah','true'),(34,'silveroak','true');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toplist`
--

DROP TABLE IF EXISTS `toplist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toplist` (
  `toplist_id` int(11) NOT NULL AUTO_INCREMENT,
  `toplist_group_id` mediumint(9) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `device_id` tinyint(4) DEFAULT NULL,
  `page_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`toplist_id`),
  UNIQUE KEY `toplist_records` (`toplist_group_id`,`location_id`,`device_id`,`page_type_id`),
  KEY `t_location_id_on_locations_table` (`location_id`),
  KEY `t_device_id_on_devices_table` (`device_id`),
  KEY `t_page_type_id_on_page_type_table` (`page_type_id`),
  CONSTRAINT `t_device_id_on_devices_table` FOREIGN KEY (`device_id`) REFERENCES `onlineslots_ca_site_information`.`devices` (`device_id`) ON UPDATE CASCADE,
  CONSTRAINT `t_location_id_on_locations_table` FOREIGN KEY (`location_id`) REFERENCES `onlineslots_ca_site_information`.`locations` (`location_id`) ON UPDATE CASCADE,
  CONSTRAINT `t_page_type_id_on_page_type_table` FOREIGN KEY (`page_type_id`) REFERENCES `onlineslots_ca_site_information`.`page_type` (`page_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toplist`
--

LOCK TABLES `toplist` WRITE;
/*!40000 ALTER TABLE `toplist` DISABLE KEYS */;
INSERT INTO `toplist` VALUES (1,1,NULL,1,1),(2,1,NULL,5,1),(8,2,NULL,1,4),(9,2,NULL,5,4),(7,3,NULL,1,NULL),(3,3,NULL,1,2),(10,3,NULL,5,NULL),(4,3,NULL,5,2),(5,4,NULL,1,3),(6,4,NULL,5,3);
/*!40000 ALTER TABLE `toplist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toplist_group`
--

DROP TABLE IF EXISTS `toplist_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toplist_group` (
  `toplist_group_row_id` int(11) NOT NULL AUTO_INCREMENT,
  `toplist_group_id` mediumint(9) DEFAULT NULL,
  `toplist_partner_id` mediumint(9) DEFAULT NULL,
  `toplist_position` int(11) DEFAULT NULL,
  `fixed` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`toplist_group_row_id`),
  UNIQUE KEY `toplist_group_records` (`toplist_group_id`,`toplist_partner_id`,`toplist_position`),
  KEY `tg_toplist_partner_id_on_partners_table` (`toplist_partner_id`),
  CONSTRAINT `tg_toplist_partner_id_on_partners_table` FOREIGN KEY (`toplist_partner_id`) REFERENCES `partners` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toplist_group`
--

LOCK TABLES `toplist_group` WRITE;
/*!40000 ALTER TABLE `toplist_group` DISABLE KEYS */;
INSERT INTO `toplist_group` VALUES (1,1,16,1,0),(2,1,29,2,0),(3,1,27,3,0),(4,1,3,4,0),(5,1,5,5,0),(6,2,30,1,0),(7,2,28,2,0),(8,2,26,3,0),(9,2,17,4,0),(10,2,6,5,0),(11,3,16,1,0),(12,3,29,2,0),(13,3,27,3,0),(14,3,3,4,0),(15,3,5,5,0),(16,4,16,1,0);
/*!40000 ALTER TABLE `toplist_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toplist_group_name`
--

DROP TABLE IF EXISTS `toplist_group_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toplist_group_name` (
  `toplist_group_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `toplist_group_name` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`toplist_group_id`),
  UNIQUE KEY `toplist_group_records` (`toplist_group_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toplist_group_name`
--

LOCK TABLES `toplist_group_name` WRITE;
/*!40000 ALTER TABLE `toplist_group_name` DISABLE KEYS */;
INSERT INTO `toplist_group_name` VALUES (4,'CTA-Toplist-group'),(1,'main-hp-toplists--Toplist-group'),(2,'main-hp-toplists-ca-fr-Toplist-group'),(3,'main-vertical-toplists--Toplist-group');
/*!40000 ALTER TABLE `toplist_group_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toplist_group_view`
--

DROP TABLE IF EXISTS `toplist_group_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toplist_group_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toplist_group_name_id` mediumint(9) DEFAULT NULL,
  `view_file_to_use` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `single_view_toplist_group` (`toplist_group_name_id`),
  CONSTRAINT `toplist_group_view_ibfk_1` FOREIGN KEY (`toplist_group_name_id`) REFERENCES `toplist_group_name` (`toplist_group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toplist_group_view`
--

LOCK TABLES `toplist_group_view` WRITE;
/*!40000 ALTER TABLE `toplist_group_view` DISABLE KEYS */;
/*!40000 ALTER TABLE `toplist_group_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toplist_structure_options`
--

DROP TABLE IF EXISTS `toplist_structure_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toplist_structure_options` (
  `toplist_structure_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` smallint(6) NOT NULL,
  `translated_field` varchar(128) COLLATE utf8_bin NOT NULL,
  `translated_value` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`toplist_structure_id`),
  UNIQUE KEY `unique_language_pairs` (`language_id`,`translated_field`,`translated_value`),
  KEY `translate_pairs_index` (`translated_field`,`translated_value`),
  CONSTRAINT `tso_language_id_on_languages_table` FOREIGN KEY (`language_id`) REFERENCES `onlineslots_ca_site_information`.`languages` (`language_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toplist_structure_options`
--

LOCK TABLES `toplist_structure_options` WRITE;
/*!40000 ALTER TABLE `toplist_structure_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `toplist_structure_options` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-12 13:55:25
