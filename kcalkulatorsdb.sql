-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produkts`
--

DROP TABLE IF EXISTS `produkts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produkts` (
  `id` int(11) NOT NULL,
  `Nosaukums` varchar(45) COLLATE utf8_bin NOT NULL,
  `Mērvienība` int(11) NOT NULL,
  `Kaloritāte` int(11) NOT NULL,
  `Kategorija` enum('gaļa','piens','rieksti','garšvielas','dārzeņi') COLLATE utf8_bin NOT NULL,
  `Vegan` tinyint(4) NOT NULL,
  `Alergija` enum('nav','glutēns','vēžveidīgie','olas','zivis','zemesrieksti','soja','piens','rieksti','selerija','sinepes','sezams','sulfīti','lupīna','gliemji') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Produkta_ID_UNIQUE` (`id`),
  UNIQUE KEY `Nosaukums_UNIQUE` (`Nosaukums`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produkts`
--

LOCK TABLES `produkts` WRITE;
/*!40000 ALTER TABLE `produkts` DISABLE KEYS */;
INSERT INTO `produkts` VALUES (1,'Vista, vārīta',0,206,'gaļa',0,'nav'),(2,'Vista, cepta eļļā',0,300,'gaļa',0,'nav'),(3,'Piens, 3.2%',2,65,'piens',0,'piens'),(4,'Cukurs',0,402,'garšvielas',1,'nav'),(5,'Redīss',0,16,'dārzeņi',1,'nav'),(6,'Piens, 2%',2,44,'piens',0,'piens');
/*!40000 ALTER TABLE `produkts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepte`
--

DROP TABLE IF EXISTS `recepte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recepte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosaukums` varchar(25) DEFAULT NULL,
  `apraksts` varchar(50) DEFAULT NULL,
  `instrukcijas` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepte`
--

LOCK TABLES `recepte` WRITE;
/*!40000 ALTER TABLE `recepte` DISABLE KEYS */;
/*!40000 ALTER TABLE `recepte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sastavdala`
--

DROP TABLE IF EXISTS `sastavdala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sastavdala` (
  `receptes_id` int(11) NOT NULL,
  `produkta_id` int(11) NOT NULL,
  `produkta_nosaukums` varchar(45) NOT NULL,
  `mervieniba` int(11) NOT NULL,
  `daudzums` double NOT NULL,
  KEY `fk_recepte` (`receptes_id`),
  KEY `fk_produkts` (`produkta_id`),
  KEY `fk_mervieniba_idx` (`mervieniba`),
  CONSTRAINT `fk_produkts` FOREIGN KEY (`produkta_id`) REFERENCES `produkts` (`id`),
  CONSTRAINT `fk_recepte` FOREIGN KEY (`receptes_id`) REFERENCES `recepte` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sastavdala`
--

LOCK TABLES `sastavdala` WRITE;
/*!40000 ALTER TABLE `sastavdala` DISABLE KEYS */;
/*!40000 ALTER TABLE `sastavdala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-19 13:02:57
