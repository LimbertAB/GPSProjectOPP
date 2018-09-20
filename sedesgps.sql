-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sedesgps
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `boleta`
--

DROP TABLE IF EXISTS `boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boleta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_chofer` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `unidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uso` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lugares` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_de` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boleta`
--

LOCK TABLES `boleta` WRITE;
/*!40000 ALTER TABLE `boleta` DISABLE KEYS */;
INSERT INTO `boleta` VALUES (2,18,43,'sedes potosis','capacitar en seminarios','oficials','ciudad de potosis','2018-08-19','2019-07-26','2018-08-18','2018-09-15'),(3,14,22,'sedes potosi','objetivo nuevo de hoy','oficial','clle pando potosi','2018-08-23','2018-08-25','2018-08-23','2018-09-15'),(4,10,22,'sedes potosi','viaje del mes de septiembre','oficial','aqui nomas','2018-09-05','2018-09-05','2018-09-05','2018-09-15'),(5,19,29,'sedes potosi','otra vez','oficial','potosiggg','2018-09-05','2018-09-05','2018-09-05','2018-09-13'),(6,17,16,'sedes potosi','idsfdsfsdfsdfsdf','oficial','dsfsdfdsaf','2018-09-05','2018-09-05','2018-09-05','2018-09-15');
/*!40000 ALTER TABLE `boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boleta_responsable`
--

DROP TABLE IF EXISTS `boleta_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boleta_responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_boleta` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_boleta_idx` (`id_boleta`),
  KEY `id_responsable_idx` (`id_responsable`),
  CONSTRAINT `id_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `responsable` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boleta_responsable`
--

LOCK TABLES `boleta_responsable` WRITE;
/*!40000 ALTER TABLE `boleta_responsable` DISABLE KEYS */;
INSERT INTO `boleta_responsable` VALUES (18,2,81),(25,3,9),(26,4,80),(27,3,1),(28,5,57),(29,6,19),(30,2,80),(31,4,3),(32,6,81);
/*!40000 ALTER TABLE `boleta_responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'DESARROLLADOR DE SOFTWARE',''),(2,'INGENIERO DE SISTEMAS',''),(3,'TECNICO ','');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronograma_boletas`
--

DROP TABLE IF EXISTS `cronograma_boletas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cronograma_boletas` (
  `id_cronograma` int(11) NOT NULL,
  `id_boleta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronograma_boletas`
--

LOCK TABLES `cronograma_boletas` WRITE;
/*!40000 ALTER TABLE `cronograma_boletas` DISABLE KEYS */;
INSERT INTO `cronograma_boletas` VALUES (3,10,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,9,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,8,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,7,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,6,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,5,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(3,4,'2016-07-20 18:58:49','2016-07-20 18:58:49'),(4,17,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(4,16,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(4,15,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(4,14,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(4,13,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(4,12,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(5,21,'2016-08-02 19:37:00','2016-08-02 19:37:00'),(5,20,'2016-08-02 19:37:00','2016-08-02 19:37:00'),(5,19,'2016-08-02 19:37:00','2016-08-02 19:37:00'),(5,18,'2016-08-02 19:37:00','2016-08-02 19:37:00'),(6,31,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,30,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,29,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,28,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,27,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,26,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,25,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,24,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(6,23,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(7,36,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(7,35,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(7,34,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(7,33,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(7,32,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(8,44,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(8,43,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(8,42,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(8,41,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(8,40,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(8,38,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(9,51,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(9,50,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(9,49,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(9,48,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(9,47,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(9,46,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(10,52,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,51,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,50,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,49,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,48,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,47,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(10,46,'2016-08-31 00:56:26','2016-08-31 00:56:26'),(11,61,'2016-09-09 19:36:24','2016-09-09 19:36:24'),(11,60,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,59,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,58,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,57,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,56,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,55,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,54,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(11,53,'2016-09-09 19:36:25','2016-09-09 19:36:25'),(14,72,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,71,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,70,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,69,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,68,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,67,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,66,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,65,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,64,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,63,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(14,62,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(15,82,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,81,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,80,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,79,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,78,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,77,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,76,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(15,75,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(16,89,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,88,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,87,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,86,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,85,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,84,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(16,83,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(17,96,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,95,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,94,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,93,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,92,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,91,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(17,90,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(18,107,'2016-10-18 22:33:44','2016-10-18 22:33:44'),(18,106,'2016-10-18 22:33:44','2016-10-18 22:33:44'),(18,105,'2016-10-18 22:33:44','2016-10-18 22:33:44'),(18,104,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,103,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,102,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,101,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,100,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,99,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(18,98,'2016-10-18 22:33:45','2016-10-18 22:33:45'),(20,118,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,117,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,116,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,115,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,114,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,113,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,112,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,111,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,110,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,109,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(20,108,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(23,126,'2016-10-26 17:12:24','2016-10-26 17:12:24'),(23,125,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,124,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,123,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,122,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,121,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,120,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(23,119,'2016-10-26 17:12:25','2016-10-26 17:12:25'),(24,133,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,132,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,131,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,130,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,129,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,128,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(24,127,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(25,137,'2016-11-15 17:30:08','2016-11-15 17:30:08'),(25,136,'2016-11-15 17:30:08','2016-11-15 17:30:08'),(25,135,'2016-11-15 17:30:08','2016-11-15 17:30:08'),(25,134,'2016-11-15 17:30:08','2016-11-15 17:30:08'),(26,146,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,145,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,144,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,143,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,142,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,141,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,140,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,139,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(26,138,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(27,159,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,158,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,157,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,156,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,155,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,154,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,152,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,151,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(27,150,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(28,168,'2016-12-01 23:47:01','2016-12-01 23:47:01'),(28,167,'2016-12-01 23:47:01','2016-12-01 23:47:01'),(28,166,'2016-12-01 23:47:01','2016-12-01 23:47:01'),(28,165,'2016-12-01 23:47:01','2016-12-01 23:47:01'),(28,164,'2016-12-01 23:47:02','2016-12-01 23:47:02'),(28,163,'2016-12-01 23:47:02','2016-12-01 23:47:02'),(28,162,'2016-12-01 23:47:02','2016-12-01 23:47:02'),(28,161,'2016-12-01 23:47:02','2016-12-01 23:47:02'),(28,160,'2016-12-01 23:47:02','2016-12-01 23:47:02'),(29,170,'2016-12-01 23:48:25','2016-12-01 23:48:25'),(29,169,'2016-12-01 23:48:25','2016-12-01 23:48:25'),(30,178,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,177,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,176,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,175,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,174,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,173,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,172,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(30,171,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(31,241,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,240,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,239,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,238,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,237,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,236,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,235,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,234,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(31,233,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(32,281,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,280,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,279,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,278,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,277,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,276,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,275,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(32,274,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(33,631,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,630,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,629,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,628,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,627,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,626,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,625,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,624,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(33,623,'2018-04-19 19:41:31','2018-04-19 19:41:31'),(33,622,'2018-04-19 19:41:31','2018-04-19 19:41:31'),(34,621,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(34,620,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(34,619,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(34,618,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(34,617,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(35,640,'2018-04-26 17:53:01','2018-04-26 17:53:01'),(35,639,'2018-04-26 17:53:01','2018-04-26 17:53:01'),(35,638,'2018-04-26 17:53:01','2018-04-26 17:53:01'),(35,637,'2018-04-26 17:53:01','2018-04-26 17:53:01'),(35,636,'2018-04-26 17:53:02','2018-04-26 17:53:02'),(35,635,'2018-04-26 17:53:02','2018-04-26 17:53:02'),(35,634,'2018-04-26 17:53:02','2018-04-26 17:53:02'),(35,633,'2018-04-26 17:53:02','2018-04-26 17:53:02'),(35,632,'2018-04-26 17:53:02','2018-04-26 17:53:02'),(36,649,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,648,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,647,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,646,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,645,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,644,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,643,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,642,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(36,641,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(37,660,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,659,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,658,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,657,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,656,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,655,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,654,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,653,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(37,652,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(38,677,'2018-06-14 19:18:18','2018-06-14 19:18:18'),(38,676,'2018-06-14 19:18:18','2018-06-14 19:18:18'),(38,675,'2018-06-14 19:18:18','2018-06-14 19:18:18'),(38,674,'2018-06-14 19:18:18','2018-06-14 19:18:18'),(38,673,'2018-06-14 19:18:19','2018-06-14 19:18:19'),(38,672,'2018-06-14 19:18:19','2018-06-14 19:18:19'),(38,671,'2018-06-14 19:18:19','2018-06-14 19:18:19'),(38,670,'2018-06-14 19:18:19','2018-06-14 19:18:19'),(39,680,'2018-07-04 01:01:53','2018-07-04 01:01:53'),(39,679,'2018-07-04 01:01:53','2018-07-04 01:01:53'),(39,678,'2018-07-04 01:01:53','2018-07-04 01:01:53'),(40,686,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(40,685,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(40,684,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(40,683,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(40,682,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(40,681,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(41,692,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(41,691,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(41,690,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(41,689,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(41,688,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(42,705,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,704,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,703,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,702,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,701,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,700,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,699,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,698,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,697,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,696,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,695,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,694,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(42,693,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(43,710,'2018-07-25 18:43:33','2018-07-25 18:43:33'),(43,709,'2018-07-25 18:43:33','2018-07-25 18:43:33'),(43,708,'2018-07-25 18:43:33','2018-07-25 18:43:33'),(43,707,'2018-07-25 18:43:33','2018-07-25 18:43:33'),(43,706,'2018-07-25 18:43:33','2018-07-25 18:43:33');
/*!40000 ALTER TABLE `cronograma_boletas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronogramas`
--

DROP TABLE IF EXISTS `cronogramas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cronogramas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronogramas`
--

LOCK TABLES `cronogramas` WRITE;
/*!40000 ALTER TABLE `cronogramas` DISABLE KEYS */;
INSERT INTO `cronogramas` VALUES (1,'primera insersion',0,NULL,NULL),(2,'19 al 22 de julio 2016',1,'2016-07-19 23:08:43','2016-07-19 23:08:43'),(3,'19 al 22 de julio 2016',2,'2016-07-19 23:17:07','2016-07-19 23:17:07'),(4,'del 26 al 29 de julio',3,'2016-07-27 20:11:13','2016-07-27 20:11:13'),(5,'del 2 al 5 de Agosto',4,'2016-08-02 19:37:00','2016-08-02 19:37:00'),(6,'del 8 al 12 de Agosto',5,'2016-08-10 17:40:19','2016-08-10 17:40:19'),(7,'del 16 al 19 de Agosto',6,'2016-08-18 01:26:09','2016-08-18 01:26:09'),(8,'del 23 al 26 de Agosto',7,'2016-08-23 23:26:38','2016-08-23 23:26:38'),(9,'30 31 de Agosto 1 y 2 Septiembre',8,'2016-08-31 00:38:24','2016-08-31 00:38:24'),(10,'29 30 31 de Agosto 1 y 2 de Septiembre',9,'2016-08-31 00:56:25','2016-08-31 00:56:25'),(11,'del 5 al 9 de Septiembre 2016',10,'2016-09-09 19:36:24','2016-09-09 19:36:24'),(14,'del 13 al 16 de Septiembre',11,'2016-09-14 01:13:56','2016-09-14 01:13:56'),(15,'del 20 al 23 de Septimbre',12,'2016-09-22 01:10:57','2016-09-22 01:10:57'),(16,'del 27 al 30 de Septiembre',13,'2016-10-03 16:40:24','2016-10-03 16:40:24'),(17,'del 4 al 7 de Octubre 2016',14,'2016-10-07 16:47:04','2016-10-07 16:47:04'),(18,'del 11 al 14 de Octubre 2016',15,'2016-10-18 22:33:44','2016-10-18 22:33:44'),(19,'',16,'2016-10-24 19:12:29','2016-10-24 19:12:29'),(20,'Del 17 de Octubre 2016',17,'2016-10-24 20:01:24','2016-10-24 20:01:24'),(21,'Del 17 al 21 de Octubre 2016',18,'2016-10-24 20:03:29','2016-10-24 20:03:29'),(22,'Del 17 al 21 de Octubre 2016',19,'2016-10-24 22:22:59','2016-10-24 22:22:59'),(23,'del 25 al 28 de Octubre 2016',20,'2016-10-26 17:12:24','2016-10-26 17:12:24'),(24,'31 de Octubre y 1,3,y 4 de Noviembre',21,'2016-11-04 17:33:21','2016-11-04 17:33:21'),(25,'del 7 al 11 de Noviembre 2016',22,'2016-11-15 17:30:08','2016-11-15 17:30:08'),(26,'del 14 al 18 de Noviembre 2016',23,'2016-11-16 00:22:20','2016-11-16 00:22:20'),(27,'del 21 al 25 de Noviembre 2016',24,'2016-11-28 22:23:42','2016-11-28 22:23:42'),(28,'del 28 al 30 de Octubre 2016 ',25,'2016-12-01 23:47:01','2016-12-01 23:47:01'),(29,'del1 al 2 de Diciembre 2016',26,'2016-12-01 23:48:25','2016-12-01 23:48:25'),(30,'del 5 al 9 de Diciembre 2016',27,'2016-12-07 16:50:17','2016-12-07 16:50:17'),(31,'del 20 al 24 de Marzo 2017',28,'2017-03-22 22:24:35','2017-03-22 22:24:35'),(32,'del 25 al 28 de Abril 2017 ',29,'2017-04-25 23:53:53','2017-04-25 23:53:53'),(33,'del 17 al 20 de Abril 2018',30,'2018-04-19 19:41:30','2018-04-19 19:41:30'),(34,'',31,'2018-04-19 19:43:42','2018-04-19 19:43:42'),(35,'del 24 al 27 de Abril 2018',32,'2018-04-26 17:53:01','2018-04-26 17:53:01'),(36,'del 14 al 18 de Mayo 2018 ',33,'2018-05-21 18:24:20','2018-05-21 18:24:20'),(37,'del 21 al 25 de Mayo 2018',34,'2018-05-22 16:40:36','2018-05-22 16:40:36'),(38,'del 11 al 15 de Junio 2018',35,'2018-06-14 19:18:18','2018-06-14 19:18:18'),(39,'del 19 al 22 de Junio ',36,'2018-07-04 01:00:20','2018-07-04 01:00:20'),(40,'del 25 al 29 de Junio ',37,'2018-07-04 01:02:59','2018-07-04 01:02:59'),(41,'del 10 al 13 de Julio  2018',38,'2018-07-14 00:44:19','2018-07-14 00:44:19'),(42,'del  17 AL 20 de Julio 2018',39,'2018-07-19 01:21:52','2018-07-19 01:21:52'),(43,'del 24 al 27 de Julio 2018',40,'2018-07-25 18:43:33','2018-07-25 18:43:33');
/*!40000 ALTER TABLE `cronogramas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `jefatura` varchar(200) DEFAULT NULL,
  `unidad` varchar(200) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Hola mundo','JEFATURA DE GESTION DE CALIDAD Y AUDITORIA EN SALUD','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','#000','2017-04-24 00:00:00','2017-04-25 00:00:00'),(3,'REALIZAR UNA FERIA','JEFATURA ADMINISTRATIVA Y FINANCIERA','UNIDAD FINANCIERA','#FF0000','2017-04-10 00:00:00','2017-04-11 00:00:00'),(4,'FORTALESIMIENTO INSTITUCIONAL','JEFATURA DE PLANIFICACION Y PROYECTOS','UNIDAD DE PLANIFICACION','#008000','2017-04-04 00:00:00','2017-04-07 00:00:00');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gps`
--

DROP TABLE IF EXISTS `gps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chofer` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `filename` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_vehiculo_gps_idx` (`id_vehiculo`),
  KEY `id_chofer_gps_idx` (`id_chofer`),
  CONSTRAINT `id_chofer_gps` FOREIGN KEY (`id_chofer`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_vehiculo_gps` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gps`
--

LOCK TABLES `gps` WRITE;
/*!40000 ALTER TABLE `gps` DISABLE KEYS */;
INSERT INTO `gps` VALUES (1,1,1,'fue una viaje a un centro de salud','2018-09-10-090909-1.gpx','2018-09-10',1),(2,1,1,'otra ruta de prueba','2018-09-11-090909-1.gpx','2018-09-11',1),(3,1,44,'viaje de emergencia a uyuni','2018-09-12031329-144.gpx','2018-09-12',1),(4,1,6,'viajando a tupiza','2018-09-12031630-16.gpx','2018-09-12',1),(5,22,39,'de sedes a casa','2018-09-14231815-2239.gpx','2018-09-14',1),(6,2,2,'el de hoyyyy','2018-09-15003030-22.gpx','2018-09-15',1);
/*!40000 ALTER TABLE `gps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informe` (
  `id_i` int(11) NOT NULL AUTO_INCREMENT,
  `id_us` int(11) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellido` varchar(70) DEFAULT NULL,
  `cargo` varchar(70) DEFAULT NULL,
  `jefatura` varchar(100) DEFAULT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `fecha_ela` date DEFAULT NULL,
  `fecha_p` date DEFAULT NULL,
  `objetivo` varchar(200) DEFAULT NULL,
  `actividades` varchar(200) DEFAULT NULL,
  `resultados` varchar(200) DEFAULT NULL,
  `fecha_e` date DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_i`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
INSERT INTO `informe` VALUES (1,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE REDES DE SERVICIO DE SALUD','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','CALLE NOGALES NÂº 666','2017-04-25','2017-04-26','LOGRAR MEJORAS EN LA SALUD','REALIZAR UNA FERIA EN SAN PEDRO','VENEFICIAR A FAMILIAS','2017-04-27','2017-04-28','NINGUNA'),(2,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE GESTION DE CALIDAD Y AUDITORIA EN SALUD','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','CALLE NOGALES NÂº 666','2017-04-25','2017-04-26','TTT','YYY','UUU','2017-04-27','2017-04-28','OOO'),(3,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE PLANIFICACION Y PROYECTOS','UNIDAD DE  PLANIFICACION','CALLE NOGALES NÂº 666','2017-05-02','2017-05-03','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades.','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento','2017-05-17','2017-05-25','NINGUNA'),(4,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA ADMINISTRATIVA Y FINANCIERA','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','CALLE NOGALES NÂº 666','2017-05-02','2017-05-03','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento.','2017-05-10','2017-05-18','NINGUNA'),(5,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE PLANIFICACION Y PROYECTOS','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','CALLE NOGALES NÂº 666','2017-04-19','2017-04-20','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades.','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento.','2017-04-26','2017-04-27','NINGUNA'),(6,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE PLANIFICACION Y PROYECTOS','UNIDAD DE PLANIFICACION','CALLE NOGALES NÂº 666','2017-04-24','2017-04-25','FORTALECIMIENTO INSTITUCIONAL','RevisiÃ³n de hojas de ruta  que ingresen a la Jefatura de planificaciÃ³n ','Hojas de ruta respondidas informes elaborados.','2017-04-27','2017-04-28','NINGUNA');
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructivo`
--

DROP TABLE IF EXISTS `instructivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructivo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_chofer` int(10) NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chofer_idx` (`id_chofer`),
  CONSTRAINT `id_chofer` FOREIGN KEY (`id_chofer`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=696 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructivo`
--

LOCK TABLES `instructivo` WRITE;
/*!40000 ALTER TABLE `instructivo` DISABLE KEYS */;
INSERT INTO `instructivo` VALUES (692,19,'la unidad de transportes, dependiente de la unidad administrativa y jefatura del departamento de administraciÃ³n y finanzas del servicio departamental de salud potosÃ­, instruye a usted realizar el apoyo como conductor para el viaje a los municipios de llallagua y ocuri para el traslado tÃ©cnico de planificaciÃ³n dr. gary barrios garcia que realizara seguimiento y monitoreo de los proyectos de salud del 5 al 7 de julio de la presente gestiÃ³n.','2018-08-21','2018-08-21 20:57:04','2018-08-21 20:57:46'),(694,10,'La unidad de Transportes, dependiente de la Unidad Administrativa y jefatura del Departamento de AdministraciÃ³n y Finanzas del Servicio Departamental de Salud PotosÃ­, instruye a usted realizar el apoyo como conductor para el viaje a los municipios de Llallagua y Ocuri para el traslado tÃ©cnico de planificaciÃ³n Dr. Gary Barrios Garcia que realizara seguimiento y monitoreo de los proyectos de salud del 5 al 7 de julio de la presente gestiÃ³n.','2018-08-21','2018-08-21 20:58:01',NULL),(695,1,'la unidad de transportes, dependiente de la unidad administrativa y jefatura del departamento de administraciÃ³n y finanzas del servicio departamental de salud potosÃ­, instruye a usted realizar el apoyo como conductor para el viaje a los municipios de llallagua y ocuri para el traslado tÃ©cnico de planificaciÃ³n dr. gary barrios garcia que realizara seguimiento y monitoreo de los proyectos de salud del 5 al 7 de julio de la presente gestiÃ³n. modificado22','2018-08-23','2018-08-23 22:59:36','2018-08-23 23:01:04');
/*!40000 ALTER TABLE `instructivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jefatura`
--

DROP TABLE IF EXISTS `jefatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jefatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jefatura`
--

LOCK TABLES `jefatura` WRITE;
/*!40000 ALTER TABLE `jefatura` DISABLE KEYS */;
INSERT INTO `jefatura` VALUES (1,'JEFATURA DE GESTION DE CALIDAD Y AUDITORIA EN SALUD','\0'),(2,'JEFATURA DE REDES DE SERVICIO DE SALUD',''),(3,'JEFATURA DE EPIDEMIOLOGIA E INVESTIGACION',''),(4,'JEFATURA DE SEGUROS DE SALUD',''),(5,'JEFATURA PROMOCION DE LA SALUD',''),(6,'JEFATURA DE PLANIFICACION Y PROYECTOS',''),(7,'JEFATURA MEDICINA TRADICIONAL',''),(8,'JEFATURA ADMINISTRATIVA Y FINANCIERA',''),(9,'mi propia jefatura edita una vez mas','\0'),(10,'Mi Propia Jeafturas','\0');
/*!40000 ALTER TABLE `jefatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'TOYOTA HYLUX','2016-07-18 21:09:21','2016-07-18 21:10:32'),(2,'TOYOTA LAND CRUISER','2016-07-18 21:09:21','2016-07-18 21:10:01'),(3,'TOYOTA','2016-07-18 21:09:21','2016-07-18 21:09:33'),(4,'DODGE DAKOTA','2016-07-18 21:10:56','2016-07-18 21:11:05'),(5,'CHEROKEE','2016-07-18 21:13:03','2016-07-18 21:13:03'),(6,'NISSAN PATROL','2016-07-18 21:13:22','2016-07-18 21:46:48'),(7,'SUZUKI','2016-07-18 21:13:43','2016-07-18 21:13:43'),(8,'MITSUBISHI','2016-07-18 21:15:29','2016-07-18 21:15:29'),(9,'NISSAN FRONTIER','2016-07-18 21:52:53','2016-07-18 21:52:53'),(10,'TOYOTA PRADO Placa 1154  FKS','2016-08-10 00:54:20','2016-08-10 00:54:20'),(11,'NISSAN FRONTIER','2016-09-13 19:28:52','2016-09-13 19:28:52'),(12,'NISSAN FRONTIER   16/01/1931','2016-09-13 19:31:15','2016-09-13 19:31:15'),(13,'TOYOTA PRADO','2016-10-11 19:29:17','2016-10-11 19:29:17'),(14,'NISSAN CONDOR ODONTO BUS','2016-12-20 19:07:42','2016-12-20 19:07:42'),(15,'FORD ANBULANCIA','2017-01-12 00:33:38','2017-01-12 00:33:38'),(16,'NISSAN PATROL','2017-03-10 22:57:12','2017-03-10 22:57:12'),(17,'DONG FENG','2017-03-24 01:30:22','2017-10-10 17:02:01'),(18,'ZNA-RISH','2017-05-09 01:06:27','2017-05-09 01:06:27'),(19,'Toyota Hilux','2017-06-23 19:28:24','2017-06-23 19:28:24'),(20,'DONG-FENG','2017-08-16 19:29:49','2017-08-16 19:29:49');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(3) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `brevet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_unidad` (`id_unidad`),
  KEY `idunidad` (`id_unidad`),
  KEY `idunidadrow2` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,1,'Valerio Rodriguez C.','5071999 C',3,1,'2016-07-18 21:56:20','2016-07-18 21:56:20'),(2,1,'Jhonny Rivera','3661247 C',3,1,'2016-07-18 21:57:39','2018-05-15 19:30:47'),(3,1,'Freddy Gonzales C.','1393484 C IND',3,1,'2016-07-18 21:59:20','2016-07-18 21:59:20'),(4,1,'Nicolas Sequeiros Ch.','5425 BREVET IND',3,1,'2016-07-18 21:59:43','2016-07-18 21:59:43'),(5,1,'Abel Gamarra A.','3058081 C',3,1,'2016-07-18 22:00:08','2016-07-18 22:00:08'),(6,1,'Alberto Olmos Calizaya',' 1266970 C',3,1,'2016-07-18 22:00:25','2017-03-28 17:45:00'),(7,2,'Mario Rene Vera','3688350 C',3,1,'2016-07-18 22:01:01','2016-07-18 22:01:01'),(9,2,'Raul Guzman','  3674969 C',3,1,'2016-07-18 22:01:40','2016-07-18 22:06:39'),(10,2,'David Ivan Urquizu','5537789 C',3,1,'2016-07-18 22:01:57','2016-07-18 22:01:57'),(12,2,'Willy Nogales C.',' 6341033 C',3,1,'2016-07-18 22:03:07','2018-02-06 00:51:40'),(13,2,'Nicanor Condori Vargas','1435755',3,1,'2016-07-21 16:52:05','2016-07-21 16:52:05'),(14,2,'Carlos Flores Zarate','  3690439 C',3,1,'2016-08-05 19:07:05','2018-03-27 19:28:52'),(16,2,'Orlando Cepeda A.','   5555508',3,1,'2016-11-17 18:26:04','2017-11-21 17:02:33'),(17,2,'Luis Sandro Camino Lenis','3704656 C.',3,1,'2017-01-12 00:26:22','2017-01-12 00:26:22'),(18,2,'Hugo Murillo Anagua','3683162',3,1,'2017-03-17 23:22:56','2017-03-17 23:22:56'),(19,2,'Farid Osmar Chura ',' 6649173',3,1,'2017-03-22 18:05:24','2017-10-10 16:59:25'),(20,2,'Richar Ovando CruzÃ±','6581977',3,1,'2017-06-23 18:05:59','2017-06-23 18:05:59'),(21,2,'Edgar Rodriguez R','8549840',3,1,'2017-10-10 16:58:23','2018-03-27 19:25:02'),(22,2,'Jhonny Rivera Morales ','3661247',3,1,'2018-05-15 19:29:21','2018-05-15 19:29:21'),(24,0,'junito dolores',NULL,0,1,'2018-05-15 19:29:21','2018-05-15 19:29:21'),(25,41,'transportista usuario','5570423',2,1,'2018-08-12 23:24:58','2018-08-13 01:55:41'),(32,0,'paola castro',NULL,1,1,'2018-08-14 23:21:22','2018-08-14 23:21:33');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellido` varchar(70) DEFAULT NULL,
  `cargo` varchar(70) DEFAULT NULL,
  `jefatura` varchar(100) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `fecha_ela` date DEFAULT NULL,
  `fecha_p` date DEFAULT NULL,
  `objetivo` varchar(200) DEFAULT NULL,
  `actividades` varchar(200) DEFAULT NULL,
  `resultados` varchar(200) DEFAULT NULL,
  `fecha_e` date DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `mes` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_r`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte`
--

LOCK TABLES `reporte` WRITE;
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
INSERT INTO `reporte` VALUES (1,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE GESTION DE CALIDAD Y AUDITORIA EN SALUD','CALLE NOGALES NÂº 666','2017-04-25','2017-04-26','LOGRAR MEJORAS EN LA SALUD DE  POTOSI','REALIZAR UNA FERIA EN SAN PEDRO','VENEFICIAR A FAMILIAS','2017-04-27','2017-04-28','NINGUNA','4'),(2,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA ADMINISTRATIVA Y FINANCIERA','CALLE NOGALES NÂº 666','2017-05-02','2017-05-03','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento.','2017-05-10','2017-05-18','NINGUNA','5'),(3,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE PLANIFICACION Y PROYECTOS','CALLE NOGALES NÂº 666','2017-04-19','2017-04-20','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades.','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento.','2017-04-26','2017-04-27','NINGUNA','4');
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte_u`
--

DROP TABLE IF EXISTS `reporte_u`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte_u` (
  `id_re` int(11) NOT NULL AUTO_INCREMENT,
  `id_un` int(11) DEFAULT NULL,
  `nombre_u` varchar(70) DEFAULT NULL,
  `apellido` varchar(70) DEFAULT NULL,
  `cargo` varchar(70) DEFAULT NULL,
  `jefatura` varchar(100) DEFAULT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `fecha_ela` date DEFAULT NULL,
  `fecha_p` date DEFAULT NULL,
  `objetivo` varchar(200) DEFAULT NULL,
  `actividades` varchar(200) DEFAULT NULL,
  `resultados` varchar(200) DEFAULT NULL,
  `fecha_e` date DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `mes` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_re`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte_u`
--

LOCK TABLES `reporte_u` WRITE;
/*!40000 ALTER TABLE `reporte_u` DISABLE KEYS */;
INSERT INTO `reporte_u` VALUES (2,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE PLANIFICACION Y PROYECTOS','UNIDAD DE INFORMATICA Y TELECOMUNICACIONES','CALLE NOGALES NÂº 666','2017-05-02','2017-05-03','REUNION TECNICA CON RESPONSABLES DE JEFATURAS DEL SEDES POTOSI','ElaboraciÃ³n de cronograma de actividades de jefaturas y unidades.','Mejorar la coordinaciÃ³n de actividades de cada jefatura y unidad en las CRSS y RSSM del departamento','2017-05-17','2017-05-25','NINGUNA','5'),(3,4,'MIKI','THENIER','INGENIERO DE SISTEMAS','JEFATURA DE GESTION DE CALIDAD Y AUDITORIA EN SALUD','UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD','CALLE NOGALES NÂº 666','2017-04-24','2017-04-25','FORTALECIMIENTO INSTITUCIONAL DE SEDES POTOSI','RevisiÃ³n de hojas de ruta  que ingresen a la Jefatura de planificaciÃ³n ','Hojas de ruta respondidas informes elaborados.','2017-04-27','2017-04-28','NINGUNA','4');
/*!40000 ALTER TABLE `reporte_u` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(11) NOT NULL,
  `ci` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_unidad_idx` (`id_unidad`),
  KEY `id_unidad` (`id_unidad`),
  CONSTRAINT `idunidad` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsable`
--

LOCK TABLES `responsable` WRITE;
/*!40000 ALTER TABLE `responsable` DISABLE KEYS */;
INSERT INTO `responsable` VALUES (1,1,1234,'ROGER','CHOQUE V.',1),(3,1,5085834,'NELSON','VIRGO',1),(9,1,3989458,'Carlos','Aramayo Arancibia',1),(10,1,6601259,'Victor','Canaviri',1),(12,1,5085487,'Jhuri Patricia','Santalla Magne',1),(13,1,1305667,'Mabel','Balderrama Chavarria',1),(14,2,3674442,'Nieves','Erquicia Mamani',1),(16,2,5520329,'Wilson','Maquera Quichu',1),(17,2,5556620,'Olker','Araujo',1),(18,2,3969647,'Marlene','Colque',1),(19,2,3716036,'Lilian','Perreira Reynolds',1),(20,2,8577738,'Lilian Noemi','SiÃ±ani Montalvo',1),(22,2,8545375,'Walter','Espada ',1),(23,2,6582059,'Gildo','Martines',1),(24,2,1427887,'Carlos','ZÃ¡rate',1),(25,3,4009706,'Romelia','Torrez',1),(26,3,3972034,'Carmen R','Quispe Martines',1),(27,3,5072274,'Mario','Mamani',1),(28,3,4041472,'Cinthia','Flores',1),(29,3,860270716,'Vania','ArgandoÃ±a',1),(30,3,3698695,'David ','Coila ',1),(31,3,5666570,'Ines','Quispe Gonzales',1),(32,4,2736681,'VICENTE ','MAMANI QUISPE',1),(33,4,3679068,'Delfi Flora','Equice',1),(34,4,1384643,'Jacinto','Perez',1),(35,4,1332487,'Mery','Elias',1),(36,4,5571542,'Cecilia Jimena','Coca Espinoza',1),(37,4,3981816,'Huascar','Alarcon',1),(38,4,4011654,'Sandra','Laime',1),(39,4,3989287,'Fabiola','Ticona',1),(40,4,1338280,'Saul','Morales',1),(41,4,3662835,'Adolfo','Medrano',1),(42,5,3977178,'Araceli','Ari T',1),(43,5,1282998,'Remberto','Miranda',1),(45,5,4008430,'Nelcy','Bonifaz',1),(46,5,1379833,'Rosario','Delgado',1),(47,5,5132630,'Paola','Choque',1),(49,5,6671727,'Victor Hugo','Ibarra',1),(50,5,1420315,'Mirtha','MuÃ±oz',1),(51,5,4020414,'Tereza','Idalgo',1),(52,5,6560164,'Deicy','Callapino',1),(53,5,1334998,'Walberto','Coronado',1),(54,5,3978487,'Ramiro','Choque',1),(55,5,3965846,'Jhovana','Gamon',1),(56,5,5086978,'Jose Luis','Flores',1),(57,5,1289092,'Hector','Soraida',1),(58,6,3783835,'Jacqueline','Sanchez',1),(59,6,1422234,'Fidel','Menchaca',1),(60,6,1306017,'Rafael ','Davila',1),(61,6,6641659,'Alejandro','Orellana',1),(62,6,3711116,'Marisol','Condori C',1),(63,6,4009016,'Elizabeth','Colque',1),(64,6,3673092,'Felicidad','Villarroel',1),(65,6,3981315,'David ','Huanca',1),(66,6,3679079,'Delsy','Flores',1),(67,6,123456789,'juan','perez',1),(68,6,6571062,'Eliseo','Mamani',1),(69,6,832850,'David','Choqueticlla',1),(70,6,1309733,'Yolanda ','Lacoa',1),(71,6,5332145,'Venjo','Benites',1),(72,6,3674969,'Raul','Guzman',1),(73,6,4012091,'Marco ','Mamani',1),(74,6,1417999,'Juan','Cabrera',1),(75,6,1335520,'Antonio','Nogales',1),(76,7,1285206,'Nelia','Machicado',1),(77,7,5076789,'Javier','Soliz',1),(78,7,5652182,'Angel','Martinez R',1),(79,7,5550869,'Matilde','Cruz',1),(80,7,3964293,'Juana','Coro A',1),(81,41,39642931,'encargado','prueba editar',1);
/*!40000 ALTER TABLE `responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `id_jefatura` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `id_jefatura_idx` (`id_jefatura`),
  CONSTRAINT `id_jefatura` FOREIGN KEY (`id_jefatura`) REFERENCES `jefatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'UNIDAD HABILITACION ESTABLECIMIENTOS DE SALUD',1,''),(2,'UNIDAD DE ACREDITACION DE ESTABLECIMIENTOS DE SALUD',1,''),(3,'UNIDAD DE AUDITORIA EN SALUD',1,''),(4,'UNIDAD DE ATENCION INTEGRAL A LA MUJER SSR',2,''),(5,'UNIDAD SALUD MENTAL ESCOLAR Y ADOLESCENTES',2,''),(6,'UNIDAD DE LABORATORIOS',2,''),(7,'UNIDAD DE FARMACIA Y SUMINISTROS',2,''),(8,'UNIDAD DE SALUD ORAL',2,''),(9,'UNIDAD DE EMERGENCIAS',2,''),(10,' UNIDAD DE ATENCION INTEGRAL',2,''),(11,'UNIDAD DE GESTION HOSPITALES DE II Y III NIVEL',2,''),(12,' UNIDAD DE RED DE ENLACE',3,''),(13,'UNIDAD ENFERMEDADES NO TRANSMISIBLES',3,''),(14,'UNIDAD DE TUBERCULOSIS',3,''),(15,'UNIDAD DE CONTROL DE VECTORES',3,''),(16,'UNIDAD PAI',3,''),(17,'UNIDAD DE SALUD AMBIENTAL',3,''),(18,'UNIDAD ITS VIH-SIDA',3,''),(19,'UNIDAD DE ENFERMEDADES EMERGENTES Y REMERGENTES\n',3,''),(20,'UNIDAD DE LABORATORIO VIGILANCIA EPIDEMIOLOGICA',3,''),(21,'JEFATURA DE SEGUROS SALUD',4,''),(22,'UNIDAD DE DISCAPACIDAD',5,''),(23,'UNIDAD DE EDUCACION PARA LA VIDA',5,''),(24,'UNIDAD DEL BUEN TRATO Y GENERO',5,''),(25,'UNIDAD DE ALIMENTACION Y NUTRICION',5,''),(26,'UNIDAD DE SALUD COMUNITARIA Y MOVILIZACION SOCIAL',5,''),(27,'PROGRAMA MI SALUD',5,''),(28,'PROGRAMA BONO JUANA AZURDUY',5,''),(29,'UNIDAD DE PLANIFICACION',6,''),(31,'UNIDAD DE PROYECTOS',6,''),(32,'UNIDAD SNIS-VE',6,''),(33,'UNIDAD DE INFORMATICA Y TELECOMUNICACIONES',6,''),(34,'UNIDAD DE CAPACITACION Y ACREDITACION PROFESIONAL',6,''),(35,'JEFATURA MEDICINA TRADICIONAL',7,''),(36,'UNIDAD FINANCIERA',8,''),(37,'UNIDAD ADMINISTRATIVA',8,''),(38,'UNIDAD DE RECURSOS HUMANOS',8,''),(39,'UNIDAD DE CONTRATACIONES',8,''),(40,'UNIDAD MANTENIMIENTO SEDES POTOSI',8,''),(41,'mi propia unidad editada despues de cambiar a persona',2,''),(42,'mi propia unidad de alado',10,'\0');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `ci` int(9) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_persona_idx` (`id_persona`),
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (26,24,0,'$2y$10$d5WrohzkA3FojFln5raEaelgJqwCCeDSkVqF8Mdxu1b0yDmf6rZfe'),(28,25,2222222,'$2y$10$d5WrohzkA3FojFln5raEaelgJqwCCeDSkVqF8Mdxu1b0yDmf6rZfe'),(32,32,1111111,'$2y$10$d5WrohzkA3FojFln5raEaelgJqwCCeDSkVqF8Mdxu1b0yDmf6rZfe');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_marca` int(11) NOT NULL,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(4) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca_idx` (`id_marca`),
  CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,2,'JEEP','AZUL','1205-BHH',1989,1,'2016-07-18 21:32:07','2016-07-18 21:32:07'),(2,2,'JEEP','ROJO','1332-ACA',1991,1,'2016-07-18 21:32:49','2016-07-18 21:32:49'),(3,2,'VAGONETA','PLOMO','137-GEC',1988,1,'2016-07-18 21:33:36','2016-07-18 21:33:36'),(4,2,'VAGONETA','BLANCO EXTENSA','1342-TGX',2004,1,'2016-07-18 21:36:02','2016-07-18 21:36:02'),(5,2,'VAGONETA','BLANCO JICA','369-HCG',1987,1,'2016-07-18 21:38:37','2016-07-18 21:38:37'),(6,2,'AMBULANCIA','BLANCO','S/N',2008,1,'2016-07-18 21:39:53','2016-07-18 21:39:53'),(7,1,'CAMIONETA','BLANCO SNIS','S/N',2004,1,'2016-07-18 21:41:14','2016-07-18 21:41:14'),(8,1,'CAMIONETA','BLANCO','S/N CHAGAS',2000,1,'2016-07-18 21:41:52','2016-07-18 21:41:52'),(9,1,'CAMIONETA','GRIZ','3859-APA',2013,1,'2016-07-18 21:42:23','2016-07-18 21:42:23'),(10,4,'CAMIONETA','GUINDO','1332-ISG',2002,1,'2016-07-18 21:45:31','2016-07-18 21:45:31'),(11,5,'VAGONETA','AZUL','1157-PTD',2002,1,'2016-07-18 21:46:11','2016-07-18 21:46:11'),(12,6,'VAGONETA','DORADO','09-MI-36',2007,1,'2016-07-18 21:47:34','2016-07-18 21:47:34'),(13,6,'JEEP','GUINDO','1332-AAR',1992,1,'2016-07-18 21:48:17','2016-07-18 21:48:17'),(14,7,'VAGONETA','VERDE','S/N',2003,1,'2016-07-18 21:49:24','2016-07-18 21:49:24'),(15,8,'CAMIONETA','PLOMO','1332-BAS',1991,1,'2016-07-18 21:50:46','2016-07-18 21:50:46'),(16,8,'CAMIONETA','BLANCO','1154-SZT',2001,1,'2016-07-18 21:51:19','2016-07-18 21:51:19'),(17,8,'CAMIONETA','PLOMO','1154-TCD',2001,1,'2016-07-18 21:51:56','2016-07-18 21:51:56'),(18,9,'CAMIONETA','AZUL','2427-SPX',2009,1,'2016-07-18 21:53:47','2016-07-18 21:53:47'),(19,9,'CAMIONETA','BLANCO','4073-UBP',2010,1,'2016-07-18 21:54:28','2016-07-19 01:01:52'),(20,3,'CAMIONETA','BLANCO','S/N',1987,1,'2016-07-18 21:54:51','2016-07-18 21:54:51'),(21,6,'VAGONETA','DORADO','3445-ZBR',2013,1,'2016-07-19 22:46:52','2017-03-10 22:59:14'),(22,6,'VAGONETA','DORADO','3817-XAH',2013,1,'2016-07-19 22:47:26','2016-07-19 22:47:26'),(23,3,'Vagoneta','Guindo','1154 FKS',1998,1,'2016-08-10 00:57:47','2016-08-10 00:57:47'),(24,2,'Anbulancia','Blanco','3589 ZAB',2014,1,'2016-09-07 22:44:15','2016-09-07 22:44:15'),(25,9,'CAMIONETA TUBERCULOSIS','BLANCO ','16/01/1931',2013,1,'2016-09-13 19:35:54','2016-09-13 19:35:54'),(26,9,'CAMIONETA TUBERCULUOSIS','Blanco','16/01/1931',2013,1,'2016-09-13 19:38:11','2016-09-13 19:38:11'),(27,10,'VAGONETA','Guindo','1154 FKS',1998,1,'2016-10-11 19:27:59','2016-10-11 19:27:59'),(28,6,'Vagoneta ','Plomo (Griz)','3982 CXX',2013,1,'2016-10-26 00:06:08','2016-10-26 00:06:08'),(29,14,'ODONTO BUS','BLANCO','3760-PLG',2013,1,'2016-12-20 19:09:09','2016-12-20 19:09:09'),(30,14,'ODONTO BUS','BLANCO','3988-SYX',2014,1,'2016-12-20 19:10:26','2016-12-20 19:10:26'),(31,2,'AMBULANCIA ','BLANCO','S/P',2010,1,'2017-01-12 00:30:22','2017-01-12 00:30:22'),(32,15,'ANBULANCIA','BLANCO','3993 DYY',2014,1,'2017-01-12 00:39:45','2017-01-12 00:39:45'),(33,14,'ODONTO BUS','BLANCO','3760 PKD',2014,1,'2017-01-12 00:49:55','2017-01-12 00:49:55'),(34,18,'CAMIONETA','BLANCO','4238- EIH',2016,1,'2017-05-09 01:07:23','2017-05-09 01:07:23'),(35,1,'Camioneta ','Negro ','4413 ABN',2016,1,'2017-06-23 19:29:42','2017-06-23 19:29:42'),(36,20,'CAMIONETA ','BLANCO ','4238-EES',2016,1,'2017-08-16 19:32:08','2017-08-16 19:32:08'),(37,9,'camioneta ','DORADO','01-0I- 58',2000,1,'2017-08-29 23:58:21','2017-08-29 23:58:21'),(38,9,'CAMIONETA','DORADO','01-0I- 58',2000,1,'2017-08-29 23:59:12','2017-08-29 23:59:12'),(39,20,'CAMIONETA BLANCA','BLANCO','4238 - ERD',2017,1,'2017-10-10 17:04:14','2018-02-06 00:52:16'),(40,20,'CAMIONETA','BLANCO','4238- EIH',2017,1,'2017-10-10 17:05:23','2017-10-10 17:05:23'),(41,20,'CAMIONETA','BLANCO','4238- EPA',2017,1,'2017-10-10 17:06:45','2017-10-10 17:06:45'),(42,17,'Camioneta ','BLANCA','4238 - ERD',2017,1,'2018-02-06 00:58:26','2018-02-06 00:58:26'),(43,20,'camioneta','anarillo','3453-fdd',2013,1,'2018-08-09 22:12:03',NULL),(44,20,'vagonetae','rojazoe','3453-fdd5',1990,1,'2018-08-09 22:18:55','2018-08-09 23:53:01');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-14 21:05:55
