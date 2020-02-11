-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 11 fév. 2020 à 09:11
-- Version du serveur :  8.0.13-4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `LAGvAwusu3`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_count`
--

CREATE TABLE `t_count` (
  `idCount` int(11) NOT NULL,
  `idList` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `couName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `couCount` int(11) NOT NULL,
  `couDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_count`
--

INSERT INTO `t_count` (`idCount`, `idList`, `idUser`, `couName`, `couCount`, `couDate`) VALUES
(1, 16, 9, 'ea', -297, NULL),
(2, 5, 5, 'accusantium', -906, NULL),
(3, 4, 7, 'voluptatem', -975, NULL),
(4, 19, 5, 'corrupti', -90, NULL),
(5, 2, 7, 'ullam', -485, NULL),
(6, 10, 5, 'nobis', 952, NULL),
(7, 12, 19, 'eaque', -164, NULL),
(8, 1, 2, 'eos', 54, NULL),
(9, 5, 6, 'eligendi', -660, NULL),
(10, 7, 17, 'nisi', 929, NULL),
(11, 12, 16, 'ut', 566, NULL),
(12, 15, 14, 'mollitia', 69, NULL),
(13, 3, 16, 'quis', -261, NULL),
(14, 10, 12, 'exercitationem', 841, NULL),
(15, 19, 4, 'explicabo', -726, NULL),
(16, 6, 5, 'excepturi', 189, NULL),
(17, 8, 14, 'magni', 274, NULL),
(18, 2, 10, 'quae', -503, NULL),
(19, 20, 16, 'non', -974, NULL),
(20, 15, 11, 'quas', -914, NULL),
(109, 3, 13, 'in', 791, NULL),
(110, 9, 5, 'et', -873, NULL),
(111, 7, 9, 'alias', -839, NULL),
(112, 16, 14, 'eos', -150, NULL),
(113, 16, 17, 'magnam', 72, NULL),
(114, 15, 11, 'harum', 986, NULL),
(115, 17, 11, 'dolore', -735, NULL),
(116, 4, 3, 'fugiat', -4, NULL),
(117, 20, 17, 'dolorem', -263, NULL),
(118, 12, 14, 'nihil', 47, NULL),
(119, 10, 18, 'ducimus', -525, NULL),
(120, 14, 14, 'consectetur', 426, NULL),
(121, 1, 13, 'in', -130, NULL),
(122, 13, 2, 'quia', 941, NULL),
(123, 2, 9, 'exercitationem', 298, NULL),
(124, 6, 1, 'ut', 927, NULL),
(125, 1, 4, 'mollitia', -401, NULL),
(126, 15, 1, 'quasi', 166, NULL),
(127, 2, 15, 'laboriosam', 141, NULL),
(128, 2, 3, 'sunt', 509, NULL),
(129, 4, 1, 'newCount', 23, '2020-02-11'),
(132, 23, 21, 'll', 0, '2020-02-11'),
(133, 37, 21, 'jh', 15, '2020-02-11'),
(134, 37, 21, 'oppp', 15, '2020-02-11');

-- --------------------------------------------------------

--
-- Structure de la table `t_list`
--

CREATE TABLE `t_list` (
  `idList` int(11) NOT NULL,
  `lisName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_list`
--

INSERT INTO `t_list` (`idList`, `lisName`) VALUES
(1, 'dolorum'),
(2, 'vel'),
(3, 'quia'),
(4, 'consequatur'),
(5, 'quo'),
(6, 'et'),
(7, 'facere'),
(8, 'neque'),
(9, 'tempore'),
(10, 'culpa'),
(11, 'quam'),
(12, 'perspiciatis'),
(13, 'deleniti'),
(14, 'deleniti'),
(15, 'ipsam'),
(16, 'quo'),
(17, 'molestiae'),
(18, 'et'),
(19, 'aut'),
(20, 'consequatur'),
(21, 'waklist'),
(22, 'waklist2'),
(23, 'alors oui'),
(31, 'newlisttt'),
(32, 'yestest'),
(33, 'yessss'),
(34, 'yesssss'),
(35, 'Active directory'),
(37, 'poui');

-- --------------------------------------------------------

--
-- Structure de la table `t_listOwners`
--

CREATE TABLE `t_listOwners` (
  `idList` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_listOwners`
--

INSERT INTO `t_listOwners` (`idList`, `idUser`) VALUES
(15, 2),
(16, 3),
(9, 4),
(11, 4),
(19, 4),
(14, 5),
(18, 5),
(3, 6),
(2, 8),
(5, 9),
(10, 10),
(11, 10),
(17, 10),
(20, 10),
(1, 12),
(12, 12),
(8, 13),
(6, 14),
(11, 15),
(15, 17),
(22, 20),
(23, 21),
(31, 21),
(32, 21),
(37, 21),
(33, 29),
(34, 29),
(35, 29);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useUsername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usePassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useUsername`, `usePassword`) VALUES
(1, 'ofritsch', 'Greenfelder'),
(2, 'phodkiewicz', 'Moen'),
(3, 'ritchie.giovanni', 'Mayer'),
(4, 'rosanna03', 'Kshlerin'),
(5, 'humberto.damore', 'Ortiz'),
(6, 'iklein', 'Muller'),
(7, 'rkuhn', 'Parisian'),
(8, 'graham.chase', 'Ankunding'),
(9, 'gislason.erica', 'Pfeffer'),
(10, 'vconroy', 'Kassulke'),
(11, 'hoppe.haskell', 'Towne'),
(12, 'nyah.rohan', 'Muller'),
(13, 'ollie.jacobi', 'Balistreri'),
(14, 'kyla38', 'Powlowski'),
(15, 'zena.orn', 'Buckridge'),
(16, 'dach.demetrius', 'Konopelski'),
(17, 'thintz', 'Hilpert'),
(18, 'fherzog', 'Lowe'),
(19, 'alisa.johnson', 'Emmerich'),
(20, 'mgibson', 'Koss'),
(21, 'corboi', 'corboi'),
(22, 'zhi', 'zhi'),
(23, 'qwe', 'qwe'),
(24, 'newUsr', 'newUsr'),
(25, 'a', 'a'),
(26, 'b', 'b'),
(27, 'd', 'd'),
(28, 't', 't'),
(29, 'ok', 'ok'),
(30, '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_count`
--
ALTER TABLE `t_count`
  ADD PRIMARY KEY (`idCount`),
  ADD KEY `idList` (`idList`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `t_list`
--
ALTER TABLE `t_list`
  ADD PRIMARY KEY (`idList`) USING BTREE;

--
-- Index pour la table `t_listOwners`
--
ALTER TABLE `t_listOwners`
  ADD PRIMARY KEY (`idList`,`idUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idList` (`idList`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_count`
--
ALTER TABLE `t_count`
  MODIFY `idCount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT pour la table `t_list`
--
ALTER TABLE `t_list`
  MODIFY `idList` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `t_listOwners`
--
ALTER TABLE `t_listOwners`
  MODIFY `idList` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_count`
--
ALTER TABLE `t_count`
  ADD CONSTRAINT `t_count_ibfk_1` FOREIGN KEY (`idList`) REFERENCES `t_list` (`idlist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_count_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_listOwners`
--
ALTER TABLE `t_listOwners`
  ADD CONSTRAINT `t_listOwners_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_listOwners_ibfk_3` FOREIGN KEY (`idList`) REFERENCES `t_list` (`idlist`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
