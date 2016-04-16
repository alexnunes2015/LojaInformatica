-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.32


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema leja_informatica
--

CREATE DATABASE IF NOT EXISTS leja_informatica;
USE leja_informatica;

--
-- Definition of table `definicoes`
--

DROP TABLE IF EXISTS `definicoes`;
CREATE TABLE `definicoes` (
  `TimeRefresh` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `definicoes`
--

/*!40000 ALTER TABLE `definicoes` DISABLE KEYS */;
INSERT INTO `definicoes` (`TimeRefresh`) VALUES 
 (5000);
/*!40000 ALTER TABLE `definicoes` ENABLE KEYS */;


--
-- Definition of table `emcaixa`
--

DROP TABLE IF EXISTS `emcaixa`;
CREATE TABLE `emcaixa` (
  `EmCaixa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emcaixa`
--

/*!40000 ALTER TABLE `emcaixa` DISABLE KEYS */;
INSERT INTO `emcaixa` (`EmCaixa`) VALUES 
 (200);
/*!40000 ALTER TABLE `emcaixa` ENABLE KEYS */;


--
-- Definition of table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE `mensagens` (
  `Mensagem` varchar(255) NOT NULL,
  `De` varchar(45) NOT NULL,
  `Para` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensagens`
--

/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;


--
-- Definition of table `notificacoes`
--

DROP TABLE IF EXISTS `notificacoes`;
CREATE TABLE `notificacoes` (
  `Tipo` int(10) unsigned NOT NULL,
  `Mensagem` varchar(255) NOT NULL,
  `ID` int(255) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificacoes`
--

/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;
INSERT INTO `notificacoes` (`Tipo`,`Mensagem`,`ID`) VALUES 
 (2,'A Caixa esta em baixo! :(',19);
/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;


--
-- Definition of table `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE `utilizadores` (
  `Name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizadores`
--

/*!40000 ALTER TABLE `utilizadores` DISABLE KEYS */;
INSERT INTO `utilizadores` (`Name`,`password`,`type`) VALUES 
 ('Administrador','Aa123456',0);
/*!40000 ALTER TABLE `utilizadores` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
