-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 12 Décembre 2019 à 09:34
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_compte_tout`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_list`
--

DROP TABLE IF EXISTS `t_list`;
CREATE TABLE `t_list` (
  `idList` int(11) NOT NULL,
  `lisName` varchar(50) NOT NULL,
  `lisNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_list`
--

INSERT INTO `t_list` (`idList`, `lisName`, `lisNum`) VALUES
(10, 'coool alors ça marche', -22),
(12, 'yes on les a', 6),
(14, 'wak', 7),
(15, 'aits', 2),
(16, 'qwwq', 23),
(17, 'dadayum', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_list`
--
ALTER TABLE `t_list`
  ADD PRIMARY KEY (`idList`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_list`
--
ALTER TABLE `t_list`
  MODIFY `idList` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
