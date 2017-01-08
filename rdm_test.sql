-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Janvier 2017 à 21:57
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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `NOM`) VALUES
(1, 'Photos'),
(2, 'Vidéos'),
(3, 'Son'),
(4, 'Eclairage'),
(5, 'Accessoires'),
(6, 'Salles');

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

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `NOMBRE` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `STATUT` tinyint(1) NOT NULL,
  `PDF` text NOT NULL,
  `ID_CAT` int(11) NOT NULL,
  `CAUTION` varchar(255) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`ID`, `NOM`, `DESCRIPTION`, `IMAGE`, `NOMBRE`, `QUANTITE`, `STATUT`, `PDF`, `ID_CAT`, `CAUTION`) VALUES
(1, 'Lumix DMC-GH1', 'L''EOS 5D Mark III est un reflex numérique plein format de 22,3 MP doté d''un système autofocus à 61\n                    collimateurs et capable d''effectuer des prises de vue en continu à 6 im./s. Enregistrez des vidéos\n                    Full HD de grande qualité, avec un contrôle manuel sur tous les réglages, de la fréquence d''images aux\n                    paramètres audio.', 'src/img/PHOTO/lumix.JPG ; src/img/PHOTO/lumix1.JPG', 1, 1, 1, 'src/pdf/lumix.pdf', 1, '300€'),
(2, 'Pack grosse caméra - Sony HDV 1080i', '', 'src/img/VIDEO/grossecamera.JPG; src/img/VIDEO/grossecamera1.JPG; src/img/VIDEO/grossecamera2.JPG; src/img/VIDEO/grossecamera3.JPG', 1, 1, 1, 'src/pdf/grossecamera.pdf', 2, '300€'),
(3, 'GoPro Hero 4', '', 'src/img/VIDEO/gopro.JPG; src/img/VIDEO/gopro1.JPG;src/img/VIDEO/gopro2.JPG', 1, 1, 1, 'src/pdf/gopro.pdf', 2, '300€'),
(4, 'Midland XTC-300 ', 'DESCRIPTION TEST POUR ECLAIRAGE', 'src/img/VIDEO/midland.JPG', 1, 1, 1, 'src/pdf/midland.pdf', 2, '300€'),
(5, 'Camescope Panasonic 3 CCD Mega O.I.S', 'DESCRIPTION TEST POUR ACCESSOIRE', 'src/img/VIDEO/camescopepanasonic.JPG', 1, 1, 1, 'src/pdf/camescopepanasonic.pdf', 2, '300€'),
(6, 'Zoom', 'DESCRIPTION TEST POUR SALLES', 'src/img/SON/zoom.JPG; src/img/SON/zoom1.JPG; src/img/SON/zoom2.JPG;src/img/SON/zoom3.JPG; src/img/SON/zoom4.JPG; src/img/SON/bonnettemousse.JPG; src/img/SON/bonnettepoils.JPG;', 1, 1, 1, '', 3, '300€'),
(7, 'Micro Sony F-V610', 'tedst', 'src/img/SON/microsony.JPG', 1, 1, 1, 'src/pdf/sonymicro.pdf', 3, '70€'),
(8, 'Petit micro Sony ECM-MS907', 'tedst', 'src/img/SON/petitmicro.JPG', 1, 1, 1, 'src/pdf/petitmicro.pdf', 3, ''),
(9, 'Micro Canon stéréo', 'tedst', 'src/img/SON/microcanon.JPG', 1, 1, 1, '', 3, ''),
(10, 'Fostex Model FR2', 'tedst', 'src/img/SON/fostex.JPG; src/img/SON/fostex1.JPG; src/img/SON/fostex2.JPG;', 1, 1, 1, 'src/pdf/fostex.pdf', 3, ''),
(11, 'Mandarine orange ', '', 'src/img/ECLAIRAGE/mandarine.JPG', 0, 2, 1, '', 4, ''),
(12, 'Parapluie réfléchissant', '', 'src/img/ECLAIRAGE/parapluie.JPG; src/img/ECLAIRAGE/parapluie1.JPG', 0, 2, 1, '', 4, ''),
(13, 'Boîte à lumière', '', 'src/img/ECLAIRAGE/boite.JPG', 0, 2, 1, '', 4, ''),
(14, 'Réflecteur de lumière + 1 bras ', '', 'src/img/ECLAIRAGE/reflecteur.JPG; src/img/ECLAIRAGE/reflecteur1.JPG; src/img/ECLAIRAGE/reflecteur2.JPG; src/img/ECLAIRAGE/reflecteurbras.JPG; src/img/ECLAIRAGE/reflecteurbras1.JPG', 0, 2, 1, '', 4, ''),
(15, 'Pied SLIK SO4QFII', '', 'src/img/ACCESSOIRES/piedslikS.JPG', 0, 2, 1, '', 5, ''),
(16, 'Pied SLIK S06QF', '', 'src/img/ACCESOIRES/piedn6.JPG', 0, 2, 1, '', 5, ''),
(17, 'Pied mandarine', '', 'src/img/ACCESOIRES/piedmandarine.JPG', 0, 2, 1, '', 5, ''),
(18, 'Dolly SLIK 6050', '', 'src/img/ACCESOIRES/dolly.JPG', 0, 2, 1, '', 5, ''),
(19, 'Casque Superlux + sac ', '', 'src/img/ACCESOIRES/casquesac.JPG', 0, 2, 1, '', 5, ''),
(20, 'Casque Sennheiser ', '', 'src/img/ACCESOIRES/casques.JPG', 0, 2, 1, '', 5, ''),
(21, 'Pied lourd ', '', 'src/img/ACCESOIRES/piedlourd.JPG; src/img/ACCESOIRES/piedlourd1.JPG; src/img/ACCESOIRES/piedlourd2.JPG;', 0, 2, 1, '', 5, ''),
(22, 'Attaches micro Sony ', '', 'src/img/ACCESOIRES/attachesony.JPG', 0, 2, 1, '', 5, ''),
(23, 'Stabilisateur caméra Aigle + manette', '', 'src/img/ACCESOIRES/stabilisateur.JPG; src/img/ACCESOIRES/stabilisateur1.JPG; src/img/ACCESOIRES/stabilisateur2.JPG; ', 0, 2, 1, 'src/pdf/stabilisateur', 5, ''),
(24, 'Salle avec fond vert ', '', 'src/img/SALLE/fondvert.JPG;  ', 0, 2, 1, '', 6, ''),
(25, 'Studio son', '', 'src/img/SALLE/studioson.JPG; src/img/SALLE/studioson1.JPG; src/img/SALLE/studioson2.JPG;\r\nsrc/img/SALLE/studioson3.JPG;\r\nsrc/img/SALLE/studioson4.JPG;  \r\nsrc/img/SALLE/studioson5.JPG       ', 0, 2, 1, '', 6, '');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `ADMIN` tinyint(1) NOT NULL,
  `MODERATEUR` tinyint(1) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`ID`, `NOM`, `PRENOM`, `LOGIN`, `MDP`, `MAIL`, `ADMIN`, `MODERATEUR`) VALUES
(1, 'Augier', 'Sébastien', 'augiers', 'augiers', 'augiersebastien@gmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `DATEDEBUT` date NOT NULL,
  `DATEFIN` date NOT NULL,
  `VALIDE` tinyint(1) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`ID`, `DATEDEBUT`, `DATEFIN`, `VALIDE`) VALUES
(1, '2017-01-10', '2017-01-19', 1),
(2, '2017-01-10', '2017-01-19', 1),
(3, '2017-01-10', '2017-01-19', 1),
(4, '1999-01-19', '2017-01-19', 1),
(6, '2017-01-10', '2017-01-19', 1),
(7, '2017-01-10', '2017-01-19', 1),
(8, '2017-01-10', '2017-01-19', 1),
(9, '2017-01-10', '2017-01-19', 1),
(10, '2017-01-10', '2017-01-19', 1),
(11, '0000-00-00', '0000-00-00', 0),
(12, '2016-09-17', '2016-01-30', 0),
(13, '2016-09-17', '2016-01-30', 0),
(14, '2016-09-17', '2016-01-30', 0),
(15, '2016-09-17', '2016-01-30', 0),
(16, '2016-09-17', '2016-01-30', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
