-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurant
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bebida`
--

DROP TABLE IF EXISTS `bebida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bebida` (
  `id_bebida` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` varchar(15) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_bebida`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bebida`
--

LOCK TABLES `bebida` WRITE;
/*!40000 ALTER TABLE `bebida` DISABLE KEYS */;
INSERT INTO `bebida` VALUES (1,'Coca vidrio 600','20','Comida'),(2,'Agua natural embotellada 600','20','Ambos'),(3,'Licuado','20','Desayuno'),(4,'Vaso de Leche','20','Desayuno'),(5,'Leche chocolatosa','20','Desayuno'),(6,'Té','20','Desayuno'),(7,'Café','20','Desayuno'),(8,'Jugo de Naranja','20','Ambos');
/*!40000 ALTER TABLE `bebida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasificacion` (
  `id_clasificacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion`
--

LOCK TABLES `clasificacion` WRITE;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
INSERT INTO `clasificacion` VALUES (1,'Huevos'),(2,'Omelettes'),(3,'Chilaquiles'),(4,'Enchiladas'),(5,'Huaraches'),(6,'Molletes'),(7,'Otros'),(8,'Guarniciones'),(9,'Para preparar');
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuerte`
--

DROP TABLE IF EXISTS `fuerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fuerte` (
  `id_fuerte` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_fuerte`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuerte`
--

LOCK TABLES `fuerte` WRITE;
/*!40000 ALTER TABLE `fuerte` DISABLE KEYS */;
INSERT INTO `fuerte` VALUES (1,'Cochinita pibil'),(2,'Croquetas de papa'),(3,'Alambre de res'),(4,'Pollo a la jardinera'),(5,'Pechugas rellenas en salsa ciruela'),(6,'Lomo de cerdo salsa 3 chiles'),(7,'Brócoli al horno'),(8,'Calabazas al horno');
/*!40000 ALTER TABLE `fuerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `entrada11` int DEFAULT NULL,
  `entrada12` int DEFAULT NULL,
  `entrada21` int DEFAULT NULL,
  `entrada22` int DEFAULT NULL,
  `fuerte1` int DEFAULT NULL,
  `fuerte2` int DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `entrada11` (`entrada11`),
  KEY `entrada12` (`entrada12`),
  KEY `entrada21` (`entrada21`),
  KEY `entrada22` (`entrada22`),
  KEY `fuerte1` (`fuerte1`),
  KEY `fuerte2` (`fuerte2`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`entrada11`) REFERENCES `p_entradas` (`id_entrada`),
  CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`entrada12`) REFERENCES `p_entradas` (`id_entrada`),
  CONSTRAINT `menu_ibfk_3` FOREIGN KEY (`entrada21`) REFERENCES `s_entradas` (`id_entrada`),
  CONSTRAINT `menu_ibfk_4` FOREIGN KEY (`entrada22`) REFERENCES `s_entradas` (`id_entrada`),
  CONSTRAINT `menu_ibfk_5` FOREIGN KEY (`fuerte1`) REFERENCES `fuerte` (`id_fuerte`),
  CONSTRAINT `menu_ibfk_6` FOREIGN KEY (`fuerte2`) REFERENCES `fuerte` (`id_fuerte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden` (
  `id_orden` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_entradas`
--

DROP TABLE IF EXISTS `p_entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_entradas` (
  `id_entrada` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_entradas`
--

LOCK TABLES `p_entradas` WRITE;
/*!40000 ALTER TABLE `p_entradas` DISABLE KEYS */;
INSERT INTO `p_entradas` VALUES (1,'Ensalada de Pollo'),(2,'Ensalada florentina'),(3,'Ensalada de berros'),(4,'Ensalada fresca');
/*!40000 ALTER TABLE `p_entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `fecha_pedido` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platillo`
--

DROP TABLE IF EXISTS `platillo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `platillo` (
  `id_platillo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` varchar(15) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `clasificacion` int DEFAULT NULL,
  PRIMARY KEY (`id_platillo`),
  KEY `clasificacion` (`clasificacion`),
  CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `clasificacion` (`id_clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platillo`
--

LOCK TABLES `platillo` WRITE;
/*!40000 ALTER TABLE `platillo` DISABLE KEYS */;
INSERT INTO `platillo` VALUES (1,'Jamón','85','Desayuno',1),(2,'Chorizo','85','Desayuno',1),(3,'Divorciados','85','Desayuno',1),(4,'Rancheros','85','Desayuno',1),(5,'Espinaca','100','Desayuno',2),(6,'Champiñones','105','Desayuno',2),(7,'Jamón','95','Desayuno',2),(8,'Papa','90','Desayuno',2),(9,'Zanahoria','90','Desayuno',2),(10,'Pollo','90','Desayuno',3),(11,'Chorizo','100','Desayuno',3),(12,'Huevo','90','Desayuno',3),(13,'Bisteck','100','Desayuno',3),(14,'Pechuga Asada','95','Desayuno',3),(15,'Pechuga Empanizada','95','Desayuno',3),(16,'Rojas','100','Desayuno',4),(17,'Suizas','100','Desayuno',4),(18,'Verdes','95','Desayuno',4),(19,'Enjitomatadas','85','Desayuno',4),(20,'Enfrijoladas','85','Desayuno',4),(21,'Bisteck','105','Desayuno',5),(22,'Huevo','95','Desayuno',5),(23,'Pechuga Asada','95','Desayuno',5),(24,'Chorizo','110','Desayuno',6),(25,'Naturales','95','Desayuno',6),(26,'Jamón','95','Desayuno',6),(27,'Club Sandwich','85','Desayuno',7),(28,'Hot Cakes','85','Desayuno',7),(29,'Tortas Chilaquiles (Cochinita,Milanesa)','90','Desayuno',7),(30,'Tortas Chilaquiles Especial','120','Desayuno',7),(31,'Torta de milanesa (Jamon y queso)','90','Desayuno',7),(32,'Pechuga empanizada','100','Comida',8),(33,'Pechuga azada','100','Comida',8),(34,'Filete de pescado azado','120','Comida',8),(35,'Filete de pescado empanizado','120','Comida',8),(36,'Bisteck azado','100','Comida',8),(37,'Enchiladas verdes','90','Comida',9),(38,'Chilaquiles con pollo','90','Comida',9),(39,'Tacos dorados','90','Comida',9);
/*!40000 ALTER TABLE `platillo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `producto` varchar(40) DEFAULT NULL,
  `id_evento` int DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `root`
--

DROP TABLE IF EXISTS `root`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `root` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `root`
--

LOCK TABLES `root` WRITE;
/*!40000 ALTER TABLE `root` DISABLE KEYS */;
/*!40000 ALTER TABLE `root` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_entradas`
--

DROP TABLE IF EXISTS `s_entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_entradas` (
  `id_entrada` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_entradas`
--

LOCK TABLES `s_entradas` WRITE;
/*!40000 ALTER TABLE `s_entradas` DISABLE KEYS */;
INSERT INTO `s_entradas` VALUES (1,'Sopa de verdura'),(2,'Sopa de fideo'),(3,'Sopa de lentejas'),(4,'Sopa juliana'),(5,'Sopa de zetas'),(6,'Sopa de calabaza'),(7,'Sopa de tortilla'),(8,'Sopa de ava'),(9,'Arroz rojo'),(10,'Arroz blanco'),(11,'Arroz poblano'),(12,'Espagueti blanco'),(13,'Espagueti a la italiana'),(14,'Espagueti a la boloñesa'),(15,'Coditos fríos');
/*!40000 ALTER TABLE `s_entradas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-22 20:24:16
