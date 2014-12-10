-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 10 Décembre 2014 à 08:31
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `attractif`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL COMMENT 'lieu de la VP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `nom`, `description`, `date`, `location`) VALUES
(1, 'Vente privée 1', 'vp de claviers gamers', '2014-12-10 00:00:00', 'Paris'),
(2, 'Vente privée 2', 'vp de souris gamers', '2014-12-11 00:00:00', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `event_product`
--

CREATE TABLE IF NOT EXISTS `event_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Gestion des differents produits sur les VP' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `event_product`
--

INSERT INTO `event_product` (`id`, `event_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `event_user`
--

CREATE TABLE IF NOT EXISTS `event_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('client','inscrit','participant','termine','refuse') NOT NULL DEFAULT 'client',
  `date_updated` datetime NOT NULL COMMENT 'date mise a jour sur changement de statut',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Gère les status de user sur les VP' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `event_user`
--

INSERT INTO `event_user` (`id`, `user_id`, `event_id`, `status`, `date_updated`) VALUES
(1, 2, 1, 'termine', '2014-12-09 00:00:00'),
(2, 1, 1, 'refuse', '2014-12-09 00:00:00'),
(3, 2, 1, 'client', '2014-12-09 00:00:00'),
(4, 1, 2, 'client', '2014-12-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT 'type de produit (ex. clavier)',
  `description` mediumtext NOT NULL,
  `stock` varchar(255) NOT NULL COMMENT 'quantité disponible',
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `type_id`, `description`, `stock`, `img`) VALUES
(1, 'roccat isku', 1, 'clavier roccat isku', '25', 'isku.jpg'),
(2, 'razer lycosa', 1, 'clavier razer lycosa', '12', 'lycosa.jpg'),
(3, 'razer deathadder', 2, 'souris razer deathadder', '15', 'deathadder.jpg'),
(4, 'razer tarentula', 1, 'clavier razer tarentula', '7', 'tarentula.jpg'),
(5, 'Logitech G502 Proteus', 2, 'souris logitech G502 proteus', '11', 'proteus.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Types de produits' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `product_type`
--

INSERT INTO `product_type` (`id`, `type`) VALUES
(1, 'clavier'),
(2, 'souris');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL COMMENT 'date inscription',
  `newsletter` int(11) NOT NULL DEFAULT '1' COMMENT '0 = non / 1 = oui',
  `admin` int(11) NOT NULL DEFAULT '0' COMMENT '0 = user / 1 = admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`, `date`, `newsletter`, `admin`) VALUES
(1, 'user1', 'user1@user.fr', '123', '2014-12-09 00:00:00', 1, 1),
(2, 'user1', 'user1@user.fr', '123', '2014-12-09 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_favorite`
--

CREATE TABLE IF NOT EXISTS `user_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0' COMMENT 'si il aime un produit (sinon 0)',
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'si il aime un type (sinon 0)',
  `event_id` int(11) DEFAULT '0' COMMENT 'si il aime une VP (sinon 0)',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Gestion des favoris user' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user_favorite`
--

INSERT INTO `user_favorite` (`id`, `user_id`, `product_id`, `type_id`, `event_id`) VALUES
(2, 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_sales`
--

CREATE TABLE IF NOT EXISTS `user_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Participation VP + achats effectués par user' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user_sales`
--

INSERT INTO `user_sales` (`id`, `user_id`, `product_id`, `date`, `event_id`) VALUES
(1, 2, 2, '2014-12-09 00:00:00', 1),
(2, 2, 4, '2014-12-09 00:00:00', 1),
(3, 2, 3, '2014-12-11 00:00:00', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `event_product`
--
ALTER TABLE `event_product`
  ADD CONSTRAINT `event_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `event_product_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `event_user_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `event_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `product_type` (`id`);

--
-- Contraintes pour la table `user_favorite`
--
ALTER TABLE `user_favorite`
  ADD CONSTRAINT `user_favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `user_favorite_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `user_sales`
--
ALTER TABLE `user_sales`
  ADD CONSTRAINT `user_sales_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `user_sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_sales_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
