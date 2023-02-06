CREATE DATABASE  IF NOT EXISTS `siasef_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `siasef_bd`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: siasef_bd
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `discentes`
--

DROP TABLE IF EXISTS `discentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeDisc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matriDisc` int NOT NULL,
  `emailDisc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discentes`
--

LOCK TABLES `discentes` WRITE;
/*!40000 ALTER TABLE `discentes` DISABLE KEYS */;
INSERT INTO `discentes` VALUES (1,'acsa',102401,'cibellyacsa@gmail.com'),(2,'guto',102416,'gabrieleuro.1500@gmail.com'),(3,'isabelle',102403,'r.isabelle@escolar.ifrn.edu.br'),(4,'livia',102406,'livia@gmail.com'),(5,'martinho',102400,'rafaelneves0405@gmail.com');
/*!40000 ALTER TABLE `discentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo` (
  `idemprestimo` int NOT NULL AUTO_INCREMENT,
  `dataEmprestimo` date DEFAULT NULL,
  `dataDevolPrevista` date DEFAULT NULL,
  `idRespon` int DEFAULT NULL,
  `idMateriais` int DEFAULT NULL,
  `idDiscente` int DEFAULT NULL,
  `qntdMaterial` int NOT NULL,
  `dataDevol` date DEFAULT NULL,
  PRIMARY KEY (`idemprestimo`),
  KEY `idrespon_idx` (`idRespon`),
  KEY `id_idx` (`idDiscente`),
  KEY `idmateriais_idx` (`idMateriais`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
INSERT INTO `emprestimo` VALUES (5,'2023-01-16','2023-01-17',1,2,1,1,'2023-02-05'),(19,'2023-01-16',NULL,1,2,NULL,2,'2023-02-05'),(20,'2023-01-16',NULL,1,2,NULL,8,'2023-02-05'),(21,'2023-01-16',NULL,1,3,NULL,0,'2023-02-06'),(22,'2023-01-16','2023-01-17',1,3,1,1,'2023-02-06'),(29,'2023-01-18','2023-01-19',1,15,NULL,1,'2023-02-04'),(30,'2023-01-18','2023-01-19',1,5,NULL,1,'2023-02-06'),(31,'2023-02-04','2023-02-05',1,5,3,2,'2023-02-06'),(32,'2023-02-04','2023-02-05',1,5,4,0,'2023-02-06'),(33,'2023-02-04','2023-02-05',1,17,1,3,'2023-02-04'),(34,'2023-02-04','2023-02-05',1,5,1,0,'2023-02-06'),(35,'2023-02-04','2023-02-05',1,9,1,0,'2023-02-05'),(36,'2023-02-04','2023-02-05',1,9,1,0,'2023-02-05'),(37,'2023-02-04','2023-02-05',1,5,2,1,'2023-02-06'),(38,'2023-02-04','2023-02-05',1,2,1,7,'2023-02-05'),(39,'2023-02-04','2023-02-05',1,2,1,1,'2023-02-05'),(40,'2023-02-04','2023-02-05',1,2,3,1,'2023-02-05'),(41,'2023-02-04','2023-02-05',1,17,1,1,'2023-02-04'),(42,'2023-02-04','2023-02-05',1,17,1,1,'2023-02-04'),(43,'2023-02-04','2023-02-05',1,17,4,1,'2023-02-04'),(44,'2023-02-04','2023-02-05',1,2,1,10,'2023-02-05'),(45,'2023-02-04','2023-02-05',2,3,4,1,'2023-02-06'),(46,'2023-02-05','2023-02-06',2,5,3,4,'2023-02-06'),(47,'2023-02-05','2023-02-06',1,9,2,1,'2023-02-05'),(48,'2023-02-05','2023-02-06',2,22,3,1,'2023-02-05'),(49,'2023-02-05','2023-02-06',2,22,3,1,'2023-02-05'),(50,'2023-02-05','2023-02-06',2,22,3,1,'2023-02-05'),(51,'2023-02-05','2023-02-06',2,22,3,1,'2023-02-05'),(52,'2023-02-05','2023-02-06',2,22,1,8,'2023-02-05'),(53,'2023-02-05','2023-02-06',2,22,1,2,'2023-02-05'),(54,'2023-02-05','2023-02-06',2,22,1,2,'2023-02-05'),(55,'2023-02-05','2023-02-06',2,22,2,2,'2023-02-05'),(56,'2023-02-05','2023-02-06',2,22,2,2,'2023-02-05'),(57,'2023-02-05','2023-02-06',2,22,1,1,'2023-02-05'),(58,'2023-02-05','2023-02-06',2,22,1,1,'2023-02-05'),(59,'2023-02-05','2023-02-06',1,23,4,1,'2023-02-05'),(60,'2023-02-05','2023-02-06',1,23,1,1,'2023-02-05'),(61,'2023-02-05','2023-02-06',1,9,1,1,'2023-02-05'),(62,'2023-02-05','2023-02-06',1,23,1,1,'2023-02-05'),(63,'2023-02-05','2023-02-06',1,9,1,1,'2023-02-05'),(64,'2023-02-05','2023-02-06',1,23,1,1,'2023-02-05'),(65,'2023-02-05','2023-02-06',1,9,1,1,NULL),(66,'2023-02-05','2023-02-06',1,23,1,1,NULL),(67,'2023-02-05','2023-02-06',1,5,1,1,'2023-02-06'),(68,'2023-02-05','2023-02-06',1,24,1,1,'2023-02-05'),(69,'2023-02-05','2023-02-06',1,24,6,1,NULL),(70,'2023-02-05','2023-02-06',1,5,1,1,'2023-02-06'),(71,'2023-02-05','2023-02-06',1,2,1,1,'2023-02-05'),(72,'2023-02-05','2023-02-06',1,3,1,1,'2023-02-06'),(73,'2023-02-06','2023-02-07',1,3,1,1,'2023-02-06'),(74,'2023-02-06','2023-02-07',1,5,1,3,'2023-02-06'),(75,'2023-02-06','2023-02-07',1,5,1,1,'2023-02-06'),(76,'2023-02-06','2023-02-07',1,5,1,1,NULL);
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiais`
--

DROP TABLE IF EXISTS `materiais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materiais` (
  `idmateriais` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qntd` int NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idmateriais`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiais`
--

LOCK TABLES `materiais` WRITE;
/*!40000 ALTER TABLE `materiais` DISABLE KEYS */;
INSERT INTO `materiais` VALUES (2,'Bola de futsal','Ginásio',20,'Novas'),(3,'Raquete','Ginásio',9,'Novas'),(5,'Uniformes','Ginásio',5,'sujos'),(9,'luvas de boxe','sala de lutas',0,'novas'),(23,'Halteres','Sala de lutas',0,'Novos'),(25,'Luva','Sala de lutas',10,'Novas'),(26,'Colchonete','Sala de lutas',5,'Novos'),(27,'Colchonete','Sala de lutas',5,'Novos'),(28,'Pé de pato','Piscina',2,'tamanho 35x36'),(29,'Pranchas','Piscina',30,'Coloridas'),(30,'Jogo de damas','Setor',2,'Novos'),(31,'Raquetes','Setor',20,'Usadas'),(32,'Raquete de Fresconol','Setor',9,'Quebradas');
/*!40000 ALTER TABLE `materiais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respon`
--

DROP TABLE IF EXISTS `respon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respon` (
  `idrespon` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` int NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idrespon`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respon`
--

LOCK TABLES `respon` WRITE;
/*!40000 ALTER TABLE `respon` DISABLE KEYS */;
INSERT INTO `respon` VALUES (1,'Acsa Cibely Carvalho Bezerra',123456,'123'),(2,'Isabelle Fernandes',10203,'000'),(3,'Guto Gabriel',2016,'123'),(4,'lucas',102,'007');
/*!40000 ALTER TABLE `respon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'siasef_bd'
--

--
-- Dumping routines for database 'siasef_bd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-05 23:43:42
