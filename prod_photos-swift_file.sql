--
-- Table structure for table `swift_file`
--

DROP TABLE IF EXISTS `swift_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swift_file` (
  `hash` varchar(255) DEFAULT NULL,
  `swift_filename` varchar(255) DEFAULT NULL,
  `real_filename` varchar(255) DEFAULT NULL,
  `file_hash` varchar(255) DEFAULT NULL,
  `swift_container` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
