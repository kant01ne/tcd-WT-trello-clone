-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 09 Janvier 2016 à 19:24
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `trello-clone`
--

-- --------------------------------------------------------

--
-- Structure de la table `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `board`
--

INSERT INTO `board` (`id`, `name`, `description`, `owner_id`) VALUES
(1, 'web technologies project', 'Development of a PHP clone of trello', 1),
(2, 'Personal Life', 'This is the trello I use for my personal life - to get my shit together if you prefer', 1),
(7, 'qdsqd', NULL, 20),
(8, 'qsd', NULL, 16),
(11, 'New Board', NULL, 16),
(14, 'Web-Technologies-Project', NULL, 16),
(15, 'sdqd', NULL, 16);

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `list_id` (`list_id`),
  KEY `list_id_2` (`list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `card`
--

INSERT INTO `card` (`id`, `name`, `description`, `list_id`) VALUES
(1, 'make a clone of trello', 'Develop a clone of trello', 2),
(2, 'PPS Number', 'Take the rendez-vous', 1),
(3, 'Take Flight ticket', '', 1),
(4, 'Finish my semester in TCD', '', 3),
(8, 'Come back to Dublin', NULL, 1),
(20, 'New card', NULL, 13),
(22, 'Come back to Dublin', NULL, 13),
(27, 'dqsds', NULL, 22),
(28, 'sqdsqd', NULL, 22);

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `board_id` (`board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `list`
--

INSERT INTO `list` (`id`, `name`, `description`, `board_id`) VALUES
(1, 'TO DO', 'Things left to do in my life', 2),
(2, 'In progress', '', 2),
(3, 'Done', 'Yeah! High Five!', 2),
(6, 'New List Test', NULL, 1),
(13, 'New List Test', NULL, 14),
(22, 'sqdqsd', NULL, 8),
(24, 'qsdsd', NULL, 8),
(25, 'sqdqsd', NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Kevin', 'Antoine', 'antoink@tcd.ie'),
(2, 'Jean', 'Jean', 'jean@tcd.ie'),
(16, 'kevin', 'antoine', 'kevin.antoine@insa-lyon.fr'),
(20, 'kekzr', 'kllksq', 'qsdqsd@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `user_board`
--

CREATE TABLE IF NOT EXISTS `user_board` (
  `user_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`board_id`),
  KEY `user_id` (`user_id`),
  KEY `board_id` (`board_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_card`
--

CREATE TABLE IF NOT EXISTS `user_card` (
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`card_id`),
  KEY `user_id` (`user_id`),
  KEY `card_id` (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `is owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_belongs_to_list` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `belong` FOREIGN KEY (`board_id`) REFERENCES `board` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_board`
--
ALTER TABLE `user_board`
  ADD CONSTRAINT `user_board_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_board_ibfk_2` FOREIGN KEY (`board_id`) REFERENCES `list` (`board_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_card`
--
ALTER TABLE `user_card`
  ADD CONSTRAINT `user_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_card_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
