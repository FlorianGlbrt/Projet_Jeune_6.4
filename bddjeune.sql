-- phpMyAdmin SQL Dump
-- version 3.3.7deb8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2016 at 03:43 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3-7+squeeze24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bddjeune`
--

-- --------------------------------------------------------

--
-- Table structure for table `expe`
--

CREATE TABLE IF NOT EXISTS `expe` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tag` smallint(5) unsigned NOT NULL,
  `nomR` varchar(30) DEFAULT NULL,
  `prenomR` varchar(30) DEFAULT NULL,
  `reseau` varchar(100) DEFAULT NULL,
  `engagement` varchar(100) DEFAULT NULL,
  `annee` smallint(6) DEFAULT NULL,
  `mois` smallint(6) DEFAULT NULL,
  `jour` smallint(6) DEFAULT NULL,
  `mailR` varchar(30) DEFAULT NULL,
  `reseauR` varchar(100) DEFAULT NULL,
  `entreprise` varchar(50) DEFAULT NULL,
  `jesuis` varchar(30) DEFAULT NULL,
  `ilest` varchar(30) DEFAULT NULL,
  `commentaire` varchar(5000) DEFAULT NULL,
  `anneeR` smallint(6) DEFAULT NULL,
  `moisR` smallint(6) DEFAULT NULL,
  `jourR` smallint(6) DEFAULT NULL,
  `enCours` smallint(2) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expe`
--


-- --------------------------------------------------------

--
-- Table structure for table `jeune`
--

CREATE TABLE IF NOT EXISTS `jeune` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `jour` smallint(6) DEFAULT NULL,
  `mois` smallint(6) DEFAULT NULL,
  `annee` smallint(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `civil` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jeune`
--

INSERT INTO `jeune` (`id`, `login`, `pass`, `nom`, `prenom`, `jour`, `mois`, `annee`, `email`, `civil`) VALUES
(1, 'guilbertflorian', 'guilbertflorian', 'Guilbert', 'Florian', 9, 12, 1996, 'durandjean@eisti.eu', 'M');
