-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 avr. 2020 à 23:58
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`) VALUES
(1, 'test4', 'test4@gmail.com', '1ff2b3704aede04eecb51e50ca698efd50a1379b'),
(2, 're', 're@gmail.com', '482eb9fcbff61e68be14a22327c3a35121da901f'),
(3, 'rere', 'rerre@gmail.com', '60e052a48a49d18e594129800610637958a0dd05'),
(4, 're', 'ref@gmail.com', 'c387c982a132d05cbd5f88840aef2c8157740049'),
(5, 'rerere', 'rererr@gmail.com', 'f1add7fed6cd17fa9f2959f97c73f8486cdc1988'),
(6, 'rr', 'rr@gmail.com', 'c387c982a132d05cbd5f88840aef2c8157740049'),
(7, 'eeeee', 'eeee@gmail.com', 'fbf1dcb18cea40a065fa2489d87bbc7a9fe0aaca'),
(8, 'eeeeeee', 'eeeeeee@gmail.com', '43f1fc123ada355a00d832a2d834cc4476ce02b0'),
(9, 'eeeeeeeeeeeee', 'eeeeeeeeeeeee@gmail.com', 'e357b5e3a0371d7803869f9ba84a17a81dd0e2bf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
