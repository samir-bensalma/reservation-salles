-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 déc. 2020 à 09:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(14, 'test', 'test', '2020-12-16 14:00:00', '2020-12-16 15:00:00', 33),
(13, 'test', 'test', '2020-12-16 18:00:00', '2020-12-16 19:00:00', 33),
(3, 'test2', 'test2', '2020-12-17 10:00:00', '2020-12-17 11:00:00', 9),
(4, 'test3', 'test3', '2020-12-25 08:00:00', '2020-12-25 09:00:00', 9),
(12, 'test', 'test', '2020-12-17 15:00:00', '2020-12-17 16:00:00', 33),
(6, 'test', 'test', '2020-12-15 08:00:00', '2020-12-15 09:00:00', 27),
(7, 'test', 'test', '2020-12-29 08:00:00', '2020-12-29 09:00:00', 27),
(8, 'test', 'test', '2020-12-14 09:00:00', '2020-12-14 10:00:00', 27),
(9, 'test date', 'test date', '2020-12-30 08:00:00', '2020-12-30 09:00:00', 28),
(10, 'test date 2', 'test date 3', '2020-12-31 11:00:00', '2020-12-31 12:00:00', 28),
(11, 'test date 2', 'test date 2', '2020-12-23 08:00:00', '2020-12-23 09:00:00', 28),
(15, 'test', 'test', '2020-12-15 16:00:00', '2020-12-15 17:00:00', 33),
(16, 'test', 'test', '2020-12-15 17:00:00', '2020-12-15 18:00:00', 33),
(17, 'test', 'test', '2020-12-15 18:00:00', '2020-12-15 19:00:00', 33),
(18, 'test', 'test', '2020-12-15 12:00:00', '2020-12-15 13:00:00', 33);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(31, 'bbbb', '$2y$10$TZWU43WuGTNLbu5kRxkH2eqCeA.iXZOPviJJXcK0eADgBq2kvV5.W'),
(9, 'vvvv', '$2y$10$tiggKQutnvCzPnmnRYFmfuSG2rpRpVpr72dNFk1qOerMahvjxtIpK'),
(15, 'aaaa', '$2y$10$x1ZdkMYSNU7qtVHEGNf.tej.pSVsbt6P5D/LvTch9k3HeZsWJIFYO'),
(19, 'mmmm', '$2y$10$Ri6zQc4wDsm.JpGV6xmEiup/rvbWZE23DPLmw6AJHGWU631wAyrqG'),
(16, 'zzzz', '$2y$10$qUaB4STXYRMpUFmPb.PZ1uZv1yh8dlCW0VfTF/pZ50Kkm2NWiZ37G'),
(13, 'xxxx', '$2y$10$L/WUe.aaHTv19at0fBI0iuqiOhv8ueWRL/ZtgO0LswIKaH.fH1IHa'),
(23, 'gggg', '$2y$10$9dSY3MySoSDr43OP9rU.AehCKvT1s4K7LSUB4OMJpdLjwQdX40pei'),
(26, 'tttt', '$2y$10$ow66LIgiHue7ch.pF0XpAuDLfPbAW/9ZHAbVJf3ArazGGnunI7S9S'),
(27, 'uuuu', '$2y$10$C9HdhpYr43kqFEfkT0v1AeRZj3otK9dq59AtTwwPOf6i3nIGhdETC'),
(28, 'wwww', '$2y$10$CLvfoEk5YA3FuP8tmn6kUepUrwIVGpZjG1GgCO8EJPcL8nXF3MAZS'),
(29, 'iiii', '$2y$10$etNNMXnKbmheaiJFHRx4XexX3nIFdx57JFh01ezOu4ysd/u6L8BNO'),
(30, 'rrrr', '$2y$10$y5Nw9v1bJdq61j0diCNv5uzaxOdIvYq2T/v5AaFgvFqktF5saU5mC'),
(32, 'jjjj', '$2y$10$PpFkvJ83u7NvdoQHGhpB0eNccDcz8zlds0ujfTY.MJCkUObTTrmCq'),
(33, 'oooo', '$2y$10$vgb6LfFb6CLZtytsKsEYZ.pfg9NypuofaRdbdp4kS5TFHsZ9UpVCi'),
(35, 'hhhh', '$2y$10$rd6YDxRLTXVRhDQTiD3zHOHid1TeY1jD1sFC4EJ/lWI9r7kSItJGS'),
(36, 'ffff', '$2y$10$PmyGBME2FyIL4IE.Bdx/.eHXwm9wBkjWzDkk9qM82K57WggdzHXb2'),
(37, 'llll', '$2y$10$O1aZq.qPVil8GGfJ.UjYAuaG6SYt2Tlk1Mjv5YCT.hnHBQEuWLbMO'),
(38, 'ssss', '$2y$10$FH71Qh6nDbIWpIbhIft7iO.iK6PPVreCHRmI6Ys6L69JrjZ5bXlxC'),
(39, 'cccc', '$2y$10$6YyAsJZzyF6v.ejsvjFUs.25DOEPDdZyhBv3cu6NbeOObDyFgnsvO'),
(45, 'kkkk', '$2y$10$lEwDfL/z0MZSZCjYS7xQZejDO4xDMfdZLt5Zr7fndWa/Jj3w2Mymm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
