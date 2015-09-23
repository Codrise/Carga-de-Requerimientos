-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema prueba
--

CREATE DATABASE IF NOT EXISTS prueba;
USE prueba;

--
-- Temporary table structure for view `poblacionsanta`
--
DROP TABLE IF EXISTS `poblacionsanta`;
DROP VIEW IF EXISTS `poblacionsanta`;

--
-- Definition of table `datos`
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE `datos` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos`
--

/*!40000 ALTER TABLE `datos` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;


--
-- Definition of view `poblacionsanta`
--

DROP TABLE IF EXISTS `poblacionsanta`;
DROP VIEW IF EXISTS `poblacionsanta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `poblacionsanta` AS select `prueba`.`poblacion`.`poblacion` AS `poblacion`,`prueba`.`poblacion`.`poblacionseo` AS `poblacionseo`,`prueba`.`poblacion`.`postal` AS `postal` from `poblacion` where (`prueba`.`poblacion`.`poblacion` like 'Santa%');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
