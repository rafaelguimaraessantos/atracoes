CREATE DATABASE  IF NOT EXISTS `its_teste` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `its_teste`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: its_teste
-- ------------------------------------------------------
-- Server version	5.6.44

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
-- Table structure for table `atracoes`
--

DROP TABLE IF EXISTS `atracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atracoes` (
  `id_atracao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atracao` varchar(450) NOT NULL,
  `data` datetime NOT NULL,
  `descricao` varchar(450) NOT NULL,
  `flyer` blob NOT NULL,
  PRIMARY KEY (`id_atracao`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atracoes`
--

LOCK TABLES `atracoes` WRITE;
/*!40000 ALTER TABLE `atracoes` DISABLE KEYS */;
INSERT INTO `atracoes` VALUES (25,'CS 2','2023-10-12 19:18:00','Evendo de CS 2 ',_binary 'cs2.png'),(26,'FreeFire','2023-10-26 15:15:00','evento freefire',_binary 'free.png'),(27,'Conde só Brega','2023-10-12 16:15:00','festa conde so brega',_binary 'dgegerg.jpg'),(28,'Festa de São João','2023-12-21 20:28:00','festa para toda a familia',_binary 'saojoao.jpg');
/*!40000 ALTER TABLE `atracoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-11 14:27:10
