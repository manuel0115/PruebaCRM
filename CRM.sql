-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: CRM
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `CLIENTE`
--

DROP TABLE IF EXISTS `CLIENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLIENTE` (
  `ID_CLIENTE` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `APELLIDO` varchar(45) NOT NULL,
  `TIPO` int NOT NULL,
  `CORREO` tinytext NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `ESTADO` int NOT NULL,
  `MODIFICADO_EN` varchar(45) NOT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` varchar(45) NOT NULL,
  `NOMBRE_EMPRESA` varchar(45) NOT NULL,
  `TELEFONO` varchar(14) NOT NULL,
  `DIRECCIONES` mediumtext NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLIENTE`
--

LOCK TABLES `CLIENTE` WRITE;
/*!40000 ALTER TABLE `CLIENTE` DISABLE KEYS */;
INSERT INTO `CLIENTE` VALUES (1,'enrique','medina',2,'enrique@gmail.com',1,2,'2021-06-18 14:34:53',1,'2021-06-17','chacabanas de erique','8084186426','calle el son,pedro abreu'),(2,'emely','romero',2,'emely@gmail.com',1,1,'2021-06-17',1,'2021-06-17','importadora emely','8098525645','CALLE MATAZANZA #31'),(3,'TEST','TEST A',2,'TEST@gmail.com',1,1,'2021-06-18 05:26:41',1,'2021-06-18 05:26:41','TEST COMPANI','8214587452','CALLE LAS CERCEDES #50'),(4,'test2','test 2a ',1,'test2@gmail.com',1,3,'2021-06-18 12:21:17',1,'2021-06-18 05:43:21','test2 com','8214578452','CALLES LAS PALMAS #10'),(5,'vanilla','vanila',2,'emmanue@gmail.com',1,3,'2021-06-18 12:19:03',1,'2021-06-18 08:28:30','vaniucpm','8094157885','CALLE LAS PETUNIAS #15'),(6,'vainilla 2','vaini;lla 2',2,'em@gmail.com',1,3,'2021-06-18 12:17:23',1,'2021-06-18 09:54:00','v com','8497541477','CALLES LOS CASCICXZGOS #20'),(7,'vanilla 3','vanilla 3 a',1,'emmanuel@gmail.com',1,3,'2021-06-18 14:31:23',1,'2021-06-18 14:30:59','emmpresa empresaria','8084531245','CALLES LAS PETUNIAS'),(8,'TEST 4','TEST A',2,'test4@gmail.com',1,1,'2021-06-18 15:06:03',1,'2021-06-18 15:03:52','test 4 comp','8094186426','calle luperon'),(9,'eso mimo','otra vez',1,'emma@gmail.com',1,1,'2021-06-18 15:06:34',1,'2021-06-18 15:06:34','oitra vez','8295452623','calle la misma #50');
/*!40000 ALTER TABLE `CLIENTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DIRECCIONES`
--

DROP TABLE IF EXISTS `DIRECCIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DIRECCIONES` (
  `ID_DIRECCION_CLIENTE_SUCURSAL` int NOT NULL AUTO_INCREMENT,
  `DIRECCION` varchar(45) NOT NULL,
  `SUCURSAL` int DEFAULT NULL,
  `CREADO_EN` varchar(45) NOT NULL,
  `CREADO_POR` int NOT NULL,
  `MODIFICADO_EN` varchar(45) NOT NULL,
  `MODIFCIADO_POR` int NOT NULL,
  `ESTADO` int NOT NULL,
  PRIMARY KEY (`ID_DIRECCION_CLIENTE_SUCURSAL`,`CREADO_EN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DIRECCIONES`
--

LOCK TABLES `DIRECCIONES` WRITE;
/*!40000 ALTER TABLE `DIRECCIONES` DISABLE KEYS */;
/*!40000 ALTER TABLE `DIRECCIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ESTADO`
--

DROP TABLE IF EXISTS `ESTADO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ESTADO` (
  `ID_ESTADO` int NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) NOT NULL,
  `CREADO_POR` int NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `CREADO_EN` varchar(45) NOT NULL,
  `MODIFICADO_EN` varchar(45) NOT NULL,
  `ESTADO` int NOT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ESTADO`
--

LOCK TABLES `ESTADO` WRITE;
/*!40000 ALTER TABLE `ESTADO` DISABLE KEYS */;
INSERT INTO `ESTADO` VALUES (1,'ACTIVO',1,1,'2021-06-17','2021-06-17',1),(2,'INACTIVO',1,1,'2021-06-17','2021-06-17',1),(3,'ELIMINADO',1,1,'2021-06-17','2021-06-17',1);
/*!40000 ALTER TABLE `ESTADO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUCURSALES`
--

DROP TABLE IF EXISTS `SUCURSALES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SUCURSALES` (
  `ID_SUCURSAL` int NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int NOT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` datetime NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `MODIFICADO_EN` datetime NOT NULL,
  `ESTADO` int NOT NULL,
  PRIMARY KEY (`ID_SUCURSAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUCURSALES`
--

LOCK TABLES `SUCURSALES` WRITE;
/*!40000 ALTER TABLE `SUCURSALES` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUCURSALES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TELEFONOS`
--

DROP TABLE IF EXISTS `TELEFONOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TELEFONOS` (
  `ID_TELEFONO` int NOT NULL,
  `ID_CLIENTE` int NOT NULL,
  `ID_SUCURSAL` int DEFAULT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` datetime NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `MODIFICADO_EN` datetime NOT NULL,
  `ESTADO` int NOT NULL,
  `TELEFONO` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`ID_TELEFONO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TELEFONOS`
--

LOCK TABLES `TELEFONOS` WRITE;
/*!40000 ALTER TABLE `TELEFONOS` DISABLE KEYS */;
/*!40000 ALTER TABLE `TELEFONOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TIPO_CLIENTE`
--

DROP TABLE IF EXISTS `TIPO_CLIENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TIPO_CLIENTE` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `ESTADO` int NOT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` datetime NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `MODIFICADO_EN` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TIPO_CLIENTE`
--

LOCK TABLES `TIPO_CLIENTE` WRITE;
/*!40000 ALTER TABLE `TIPO_CLIENTE` DISABLE KEYS */;
INSERT INTO `TIPO_CLIENTE` VALUES (1,'MULTIPLE SUCURSAL',1,1,'2021-06-17 00:00:00',1,'2021-06-17'),(2,'NORMAL',1,1,'2021-06-17 00:00:00',1,'2021-06-17');
/*!40000 ALTER TABLE `TIPO_CLIENTE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TIPO_USUARIO`
--

DROP TABLE IF EXISTS `TIPO_USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TIPO_USUARIO` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `ESTADO` int NOT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` datetime NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `MODIFICADO_EN` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TIPO_USUARIO`
--

LOCK TABLES `TIPO_USUARIO` WRITE;
/*!40000 ALTER TABLE `TIPO_USUARIO` DISABLE KEYS */;
/*!40000 ALTER TABLE `TIPO_USUARIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `USUARIOS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `APELLIDO` varchar(45) NOT NULL,
  `CORREO` tinytext NOT NULL,
  `PASS` tinytext NOT NULL,
  `ESTADO` int NOT NULL,
  `ROL` int NOT NULL,
  `CREADO_POR` int NOT NULL,
  `CREADO_EN` varchar(45) NOT NULL,
  `MODIFICADO_POR` int NOT NULL,
  `MODIFICADO_EN` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (1,'emmanuel','guzman','emmanuel.011593@gmail.com','$2y$10$/m.oEeS1CFM1tXL/1U2PHeYf5fHhM2MdK56JeSFrXO.B0RTKgC5Km',1,1,1,'2021-06-17',1,'2021-06-17');
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-18 15:20:42
