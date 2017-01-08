-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Janvier 2017 à 21:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rdm_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `PROMO` varchar(255) NOT NULL,
  `GROUPE` varchar(255) NOT NULL,
  `BLACKLIST` tinyint(1) NOT NULL,
  `PANIER` longtext NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`ID`, `NOM`, `PRENOM`, `LOGIN`, `MDP`, `MAIL`, `PROMO`, `GROUPE`, `BLACKLIST`, `PANIER`) VALUES
(1, 'Dupont', 'Pierre', 'pierrep', 'pierrep', 'pierre@gmail.fr', '2a', '3', 0, '["3","3","24"]'),
(2, 'Tournesol', 'John', 'tournej', 'tournej', 'john@gmail.fr', '2a', '3', 0, ''),
(3, 'Derreck', 'Justine', 'derreckj', 'derreckj', 'justine@gmail.fr', '2a', '3', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
