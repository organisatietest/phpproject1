-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2014 at 11:01 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `afwezigheden`
--

CREATE TABLE IF NOT EXISTS `afwezigheden` (
  `afwezigheidid` int(5) NOT NULL AUTO_INCREMENT,
  `leerlingid` int(3) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`afwezigheidid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `agendaid` int(5) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `agendapunt` varchar(25) NOT NULL,
  `omschrijving` text NOT NULL,
  PRIMARY KEY (`agendaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gemeente`
--

CREATE TABLE IF NOT EXISTS `gemeente` (
  `postcode` int(5) NOT NULL,
  `gemeente` varchar(25) NOT NULL,
  UNIQUE KEY `postcode` (`postcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klas`
--

CREATE TABLE IF NOT EXISTS `klas` (
  `klasid` int(3) NOT NULL AUTO_INCREMENT,
  `naamklas` varchar(25) NOT NULL,
  PRIMARY KEY (`klasid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leerkracht`
--

CREATE TABLE IF NOT EXISTS `leerkracht` (
  `leerkrachid` int(3) NOT NULL AUTO_INCREMENT,
  `emailadres` varchar(50) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `familienaam` varchar(25) NOT NULL,
  `geboortedatum` date NOT NULL,
  `foto` varchar(50) NOT NULL,
  `klasid` int(3) NOT NULL,
  PRIMARY KEY (`leerkrachid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

CREATE TABLE IF NOT EXISTS `leerling` (
  `leerlingid` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(20) NOT NULL,
  `familienaam` varchar(25) NOT NULL,
  `geboortedatum` date NOT NULL,
  `foto` varchar(50) NOT NULL,
  `straat` varchar(25) NOT NULL,
  `huisnr` int(3) NOT NULL,
  `bus` varchar(3) NOT NULL,
  `postcode` int(5) NOT NULL,
  `telefoonnr` int(15) NOT NULL,
  `klasid` int(3) NOT NULL,
  `voornaamouder1` varchar(20) NOT NULL,
  `familienaamouder1` varchar(25) NOT NULL,
  `voornaamouder2` varchar(20) NOT NULL,
  `familienaamouder2` varchar(25) NOT NULL,
  `GSMouder1` int(15) NOT NULL,
  `GSMouder2` int(15) NOT NULL,
  `emailadres` varchar(50) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  PRIMARY KEY (`leerlingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `punten`
--

CREATE TABLE IF NOT EXISTS `punten` (
  `puntenid` int(5) NOT NULL AUTO_INCREMENT,
  `leerlingid` int(3) NOT NULL,
  `punten` int(3) NOT NULL,
  `puntentotaal` int(3) NOT NULL,
  `testnr` int(5) NOT NULL,
  PRIMARY KEY (`puntenid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `testid` int(5) NOT NULL AUTO_INCREMENT,
  `testnr` int(5) NOT NULL,
  `vakid` int(3) NOT NULL,
  `testomschrijving` text NOT NULL,
  `datum` date NOT NULL,
  `trimister` int(1) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vak`
--

CREATE TABLE IF NOT EXISTS `vak` (
  `vakid` int(3) NOT NULL AUTO_INCREMENT,
  `vaknaam` varchar(25) NOT NULL,
  `klasid` int(3) NOT NULL,
  PRIMARY KEY (`vakid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
