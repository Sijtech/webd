-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cmsDb
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Art_Kat`
--

DROP TABLE IF EXISTS `Art_Kat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Art_Kat` (
  `idArt_Kat` int(11) NOT NULL AUTO_INCREMENT,
  `idArtikel` int(11) DEFAULT NULL,
  `idKategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArt_Kat`),
  KEY `idArtikel_idx` (`idArtikel`),
  KEY `idKategorie_idx` (`idKategorie`),
  CONSTRAINT `idArtikel` FOREIGN KEY (`idArtikel`) REFERENCES `Artikel` (`idArtikel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idKategorie` FOREIGN KEY (`idKategorie`) REFERENCES `Kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Artikel`
--

DROP TABLE IF EXISTS `Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Artikel` (
  `idArtikel` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `Autor` int(11) DEFAULT NULL,
  `Titel` tinytext,
  `Artikel` mediumtext,
  `Erstelldatum` datetime DEFAULT NULL,
  PRIMARY KEY (`idArtikel`),
  KEY `idBenutzer_idx` (`Autor`),
  CONSTRAINT `idBenutzer` FOREIGN KEY (`Autor`) REFERENCES `Benutzer` (`idBenutzer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Benutzer`
--

DROP TABLE IF EXISTS `Benutzer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Benutzer` (
  `idBenutzer` int(11) NOT NULL AUTO_INCREMENT,
  `Benutzername` varchar(16) DEFAULT NULL,
  `Passwort` varchar(30) DEFAULT NULL,
  `Beschreibung` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idBenutzer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Kategorie`
--

DROP TABLE IF EXISTS `Kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kategorie` (
  `idKategorie` int(11) NOT NULL AUTO_INCREMENT,
  `Kategorie` varchar(45) DEFAULT NULL,
  `Beschreibung` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idKategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-31  8:18:43
