-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2014 at 09:28 AM
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
-- Table structure for table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `start`, `end`) VALUES
(3, 'tester', '2014-09-15 00:00:00', '2014-09-17 00:00:00'),
(11, 'test', '2014-09-23 00:00:00', '2014-09-23 00:00:00');

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
  `leerkrachtid` int(3) NOT NULL AUTO_INCREMENT,
  `emailadres` varchar(50) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `familienaam` varchar(25) NOT NULL,
  `geboortedatum` date NOT NULL,
  `foto` varchar(50) NOT NULL,
  `klasid` int(3) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`leerkrachtid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leerkracht`
--

INSERT INTO `leerkracht` (`leerkrachtid`, `emailadres`, `wachtwoord`, `voornaam`, `familienaam`, `geboortedatum`, `foto`, `klasid`, `admin`) VALUES
(1, 'admin@smartschool.be', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'unknown', '1111-11-11', '', 1, 1),
(2, 'paul.de_bakker@skynet.be', '5116bc3b41f7a391438d6c6a23cd540f4d70d5e8', 'paul', 'de bakker', '1978-04-01', '', 1, 0);

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
  PRIMARY KEY (`leerlingid`),
  UNIQUE KEY `emailadres` (`emailadres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`leerlingid`, `voornaam`, `familienaam`, `geboortedatum`, `foto`, `straat`, `huisnr`, `bus`, `postcode`, `telefoonnr`, `klasid`, `voornaamouder1`, `familienaamouder1`, `voornaamouder2`, `familienaamouder2`, `GSMouder1`, `GSMouder2`, `emailadres`, `wachtwoord`) VALUES
(1, 'fdsqfdqs', 'gfqdfsqgsdq', '2014-09-22', '', 'fdsqfdsq', 6, 'a3', 8659, 561234567, 1, 'fdsqmphnfsq', 'gfqgjpfq', 'qgjdkosqmjg', 'gdsqjgkodsqjp', 561234567, 561234567, '123b@hotmail.com', 'c9ef04c0132062413bdeaf3fe59d3c3a3602a019'),
(2, 'niels', 'vromanos', '2014-02-09', '', '', 0, '', 0, 0, 1, '', '', '', '', 0, 0, 'abd@hotmail.com', '5ea90870feae5cb40fbcd09b6ece0084ac613bfa'),
(3, 'karel', 'schoep', '2014-09-15', '', '', 0, '', 0, 0, 0, '', '', '', '', 0, 0, 'karelschoep@hotmail.com', 'fa7eca88d2efd20161e807a1b17715d42513d0d6'),
(4, 'hans', 'schoep', '2009-01-14', '', '', 0, '', 0, 0, 1, '', '', '', '', 0, 0, 'paschoep@hotmail.com', '874c0585e6774c8d14f2470273c1bacfa0558cec'),
(5, 'zot', 'fdsqfq', '2009-01-12', '', '', 0, '', 0, 0, 0, '', '', '', '', 0, 0, 'fdsqfq@hotmail.com', 'e65162d9d20548e44339a880d21f8e74e7526928'),
(6, 'jfkdllsq', 'fdsqgfsq', '2014-09-16', '', '', 0, '', 0, 0, 0, '', '', '', '', 0, 0, 'niels.012345@hotmail.com', '2ac39dc3ecbd7255c32f0db3e3d686288b1e972d');

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
