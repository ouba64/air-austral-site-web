-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 07:52 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airaustral`
--
CREATE DATABASE `airaustral` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `airaustral`;

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

CREATE TABLE IF NOT EXISTS `aeroport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `idPays` int(11) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`id`, `nom`, `idPays`, `lat`, `long`) VALUES
(1, 'Charles de Gaulle', 1, 49.010014, 2.547646),
(2, 'Roland Garros', 2, -20.89304, 55.514034),
(3, 'Sir Seewosagur', 3, 0, 0),
(4, 'Antananarivo', 4, 0, 0),
(5, 'Mahé', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `avion`
--

CREATE TABLE IF NOT EXISTS `avion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`id`, `nom`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cb`
--

CREATE TABLE IF NOT EXISTS `cb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `expiration` int(11) NOT NULL,
  `cvv` int(2) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cb`
--

INSERT INTO `cb` (`id`, `nom`, `numero`, `expiration`, `cvv`, `idClient`) VALUES
(1, 'Mme.dupond', 1258489625, 2821, 157, 0),
(2, 'M.rafiki', 2147483647, 220, 788, 0),
(3, 'Mme.payet', 2147483647, 521, 555, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `nom`) VALUES
(1, 'Economique'),
(2, 'Affaire'),
(3, 'Première');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `idCb` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCb` (`idCb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `adresse`, `email`, `tel`, `mdp`, `idCb`) VALUES
(1, 'Timon', 'Pumba', '5 rue de l''échiquier', 't.pumb@hotmail.com', '05124578', '1254', 1),
(2, 'Rafiki', 'Simba', '3 rue des écuries', 'r.simba@hotmail.fr', '0637482945', 'azertyuiop', 2),
(3, 'Patrick', 'Dupond', '156 rue alsace', 'patrick@gmail.com', '0745321435', 'yhhfryjiu', 3),
(4, 'a', 'a', 'a', 'a', 'a', 'a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gestion`
--

CREATE TABLE IF NOT EXISTS `gestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarifkm` float NOT NULL COMMENT 'Prix par km en centimes',
  `surcout_affaire` float NOT NULL COMMENT 'Surcoût de la classe affaire par rapport à la classe économique',
  `surcout_premiere` float NOT NULL COMMENT 'Surcoût de la première classe par rapport à la classe économique',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gestion`
--

INSERT INTO `gestion` (`id`, `tarifkm`, `surcout_affaire`, `surcout_premiere`) VALUES
(1, 13.7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'France'),
(2, 'Ile de La Réunion'),
(3, 'Ile Maurice'),
(4, 'Madagascar'),
(5, 'Seychelles');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAvion` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAvion_4` (`idAvion`,`idClasse`,`numero`),
  KEY `idAvion` (`idAvion`),
  KEY `idAvion_2` (`idAvion`),
  KEY `idAvion_3` (`idAvion`),
  KEY `idClasse` (`idClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `idAvion`, `idClasse`, `numero`) VALUES
(15, 1, 1, 'A1'),
(16, 1, 1, 'A2'),
(17, 1, 1, 'A3'),
(18, 1, 1, 'A4'),
(19, 1, 1, 'A5'),
(20, 1, 2, 'B1'),
(21, 1, 2, 'B2'),
(22, 1, 2, 'B3'),
(23, 1, 2, 'B4'),
(24, 1, 2, 'B5');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `idClient` int(11) NOT NULL,
  `idVol` int(11) NOT NULL,
  `idPlace` int(11) NOT NULL,
  UNIQUE KEY `idClient_2` (`idClient`,`idVol`,`idPlace`),
  KEY `idPlace` (`idPlace`),
  KEY `idVol` (`idVol`),
  KEY `idClient` (`idClient`),
  KEY `idPlace_2` (`idPlace`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAvion` int(11) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `duree` int(11) NOT NULL COMMENT 'Durée en minute du vol',
  `nom` varchar(50) NOT NULL,
  `ae_depart` int(11) NOT NULL,
  `ae_arrivee` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ae_depart` (`ae_depart`),
  KEY `ae_arrivee` (`ae_arrivee`),
  KEY `ae_depart_2` (`ae_depart`),
  KEY `ae_arrivee_2` (`ae_arrivee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`id`, `idAvion`, `heure_depart`, `duree`, `nom`, `ae_depart`, `ae_arrivee`) VALUES
(1, 1, '2019-06-05 06:00:00', 720, 'VOL1', 1, 2),
(2, 2, '2019-06-05 07:00:00', 725, 'VOL2', 1, 2),
(3, 1, '2019-07-06 20:00:00', 720, 'VOL3', 1, 2),
(4, 1, '2019-07-06 07:00:00', 725, 'VOL4', 1, 2),
(5, 1, '2019-06-15 08:00:00', 800, 'AF512', 1, 2),
(6, 2, '2019-06-17 15:00:00', 700, 'AF513', 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aeroport`
--
ALTER TABLE `aeroport`
  ADD CONSTRAINT `aeroport_ibfk_1` FOREIGN KEY (`idPays`) REFERENCES `pays` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`idCb`) REFERENCES `cb` (`id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`idAvion`) REFERENCES `avion` (`id`),
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idVol`) REFERENCES `vol` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`idPlace`) REFERENCES `place` (`id`);

--
-- Constraints for table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`ae_depart`) REFERENCES `aeroport` (`id`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`ae_arrivee`) REFERENCES `aeroport` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
