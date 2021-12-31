-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: alissoncouto
-- ------------------------------------------------------
-- Server version	8.0.26

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

DROP DATABASE IF EXISTS `alissoncouto`;

CREATE DATABASE alissoncouto
	DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;
    
USE alissoncouto;

--
-- Table structure for table `tbbrands`
--

DROP TABLE IF EXISTS `tbbrands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbbrands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbbrands`
--

LOCK TABLES `tbbrands` WRITE;
/*!40000 ALTER TABLE `tbbrands` DISABLE KEYS */;
INSERT INTO `tbbrands` VALUES (1,'Toyota'),(2,'Chevrolet'),(3,'Ford'),(4,'BMW');
/*!40000 ALTER TABLE `tbbrands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcategories`
--

DROP TABLE IF EXISTS `tbcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcategories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategories`
--

LOCK TABLES `tbcategories` WRITE;
/*!40000 ALTER TABLE `tbcategories` DISABLE KEYS */;
INSERT INTO `tbcategories` VALUES (1,'ESPORTE'),(2,'CLÁSSICO'),(3,'TURBO'),(4,'ECONÔMICO'),(5,'PARA CIDADE'),(6,'PARA LONGAS VIAGENS');
/*!40000 ALTER TABLE `tbcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbmodels`
--

DROP TABLE IF EXISTS `tbmodels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbmodels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idBrand` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idBrand` (`idBrand`),
  CONSTRAINT `tbmodels_ibfk_1` FOREIGN KEY (`idBrand`) REFERENCES `tbbrands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbmodels`
--

LOCK TABLES `tbmodels` WRITE;
/*!40000 ALTER TABLE `tbmodels` DISABLE KEYS */;
INSERT INTO `tbmodels` VALUES (1,'Hillux',1),(2,'Corolla',1);
/*!40000 ALTER TABLE `tbmodels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvehiclecategory`
--

DROP TABLE IF EXISTS `tbvehiclecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbvehiclecategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idVehicle` int NOT NULL,
  `idCategory` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVehicle` (`idVehicle`),
  KEY `idCategory` (`idCategory`),
  CONSTRAINT `tbvehiclecategory_ibfk_1` FOREIGN KEY (`idVehicle`) REFERENCES `tbvehicles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbvehiclecategory_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `tbcategories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvehiclecategory`
--

LOCK TABLES `tbvehiclecategory` WRITE;
/*!40000 ALTER TABLE `tbvehiclecategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbvehiclecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvehicles`
--

DROP TABLE IF EXISTS `tbvehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbvehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chassis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `plate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `year` year NOT NULL,
  `idModel` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chassis` (`chassis`),
  UNIQUE KEY `plate` (`plate`),
  KEY `idModel` (`idModel`),
  CONSTRAINT `tbvehicles_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `tbmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvehicles`
--

LOCK TABLES `tbvehicles` WRITE;
/*!40000 ALTER TABLE `tbvehicles` DISABLE KEYS */;
INSERT INTO `tbvehicles` VALUES (1,'45fds5d45f6ds','HQH2Q14',2021,1),(2,'45sds5d4sfsds','QWH2T21',2021,2);
/*!40000 ALTER TABLE `tbvehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-31 17:44:29
