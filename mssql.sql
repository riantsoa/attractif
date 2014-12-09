-- phpMyAdmin SQL Dump
-- version 4.2.12deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Décembre 2014 à 15:04
-- Version du serveur :  5.5.40-1
-- Version de PHP :  5.6.2-1

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  "attractif"
--

-- --------------------------------------------------------

--
-- Structure de la table "category"
--

CREATE TABLE "category" (
  "id" int NOT NULL,
  "name" varchar(1024) NOT NULL
);

--
-- Contenu de la table "category"
--

SET IDENTITY_INSERT "category" ON ;
INSERT INTO "category" ("id", "name") VALUES
(1, 'toto'),
(2, 'titi'),
(3, 'toto'),
(4, 'titi');

SET IDENTITY_INSERT "category" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "event"
--

CREATE TABLE "event" (
  "id" int NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "place" varchar(1024) NOT NULL,
  "descript" varchar(1024) NOT NULL,
  "name" varchar(1024) NOT NULL
);

--
-- Contenu de la table "event"
--

SET IDENTITY_INSERT "event" ON ;
INSERT INTO "event" ("id", "date", "place", "descript", "name") VALUES
(1, '0000-00-00 00:00:00', 'rrr', 'rrr', 'rrr'),
(2, '0000-00-00 00:00:00', 'rrr', 'rrr', 'rrrgffff');

SET IDENTITY_INSERT "event" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "event_user"
--

CREATE TABLE "event_user" (
  "id" int NOT NULL,
  "status" int NOT NULL,
  "customer" int NOT NULL,
  "event" int NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Contenu de la table "event_user"
--

SET IDENTITY_INSERT "event_user" ON ;
INSERT INTO "event_user" ("id", "status", "customer", "event", "date") VALUES
(1, 0, 2, 1, '2014-12-09 09:24:31'),
(2, 2, 3, 2, '2014-12-09 09:24:31'),
(3, 0, 2, 1, '2014-12-09 09:24:35'),
(4, 2, 3, 2, '2014-12-09 09:24:35');

SET IDENTITY_INSERT "event_user" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "product"
--

CREATE TABLE "product" (
  "id" int NOT NULL,
  "name" varchar(1024) NOT NULL,
  "quantity" int NOT NULL,
  "category" int NOT NULL,
  "descript" varchar(1024) NOT NULL,
  "image" varchar(1024) NOT NULL
);

--
-- Contenu de la table "product"
--

SET IDENTITY_INSERT "product" ON ;
INSERT INTO "product" ("id", "name", "quantity", "category", "descript", "image") VALUES
(1, 'aaa', 0, 0, 'aaa', 'aaa'),
(2, 'zzz', 0, 0, 'zzz', 'zzz');

SET IDENTITY_INSERT "product" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "product_event"
--

CREATE TABLE "product_event" (
  "id" int NOT NULL,
  "product" int NOT NULL,
  "event" int NOT NULL
);

--
-- Contenu de la table "product_event"
--

SET IDENTITY_INSERT "product_event" ON ;
INSERT INTO "product_event" ("id", "product", "event") VALUES
(1, 1, 2),
(2, 2, 1),
(3, 1, 2),
(4, 2, 1),
(5, 2, 2);

SET IDENTITY_INSERT "product_event" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "sell"
--

CREATE TABLE "sell" (
  "id" int NOT NULL,
  "user" int NOT NULL,
  "product" int NOT NULL,
  "quantity" int NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "event" int NOT NULL
);

--
-- Contenu de la table "sell"
--

SET IDENTITY_INSERT "sell" ON ;
INSERT INTO "sell" ("id", "user", "product", "quantity", "date", "event") VALUES
(1, 1, 2, 2, '2014-12-09 09:25:43', 2),
(2, 3, 2, 5, '2014-12-09 09:25:43', 1),
(3, 1, 2, 2, '2014-12-09 09:25:46', 2),
(4, 3, 2, 5, '2014-12-09 09:25:46', 1),
(5, 1418119354, 1, 1, '0000-00-00 00:00:00', 1);

SET IDENTITY_INSERT "sell" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "user"
--

CREATE TABLE "user" (
  "id" int NOT NULL,
  "name" varchar(1024) NOT NULL,
  "mail" varchar(1024) NOT NULL,
  "pass" varchar(1024) NOT NULL,
  "newsletter" tinyint NOT NULL DEFAULT '0',
  "alert" tinyint NOT NULL DEFAULT '0',
  "admin" tinyint NOT NULL DEFAULT '0'
);

--
-- Contenu de la table "user"
--

SET IDENTITY_INSERT "user" ON ;
INSERT INTO "user" ("id", "name", "mail", "pass", "newsletter", "alert", "admin") VALUES
(1, 'aaaa', 'ggggg', 'ff', 1, 1, 1),
(2, 'totouv', 'toto@toto.toto', 'toto', 1, 0, 1),
(3, 'titijhgjhgjh', 'titiddddfsdfs@hghy', 'titi', 0, 0, 1),
(4, 'titi', 'titi', 'titi', 0, 0, 0);

SET IDENTITY_INSERT "user" OFF;

--
-- Index pour les tables exportées
--

--
-- Index pour la table "category"
--
ALTER TABLE "category"
 ADD PRIMARY KEY ("id"), ADD UNIQUE KEY "id" ("id");

--
-- Index pour la table "event"
--
ALTER TABLE "event"
 ADD PRIMARY KEY ("id");

--
-- Index pour la table "event_user"
--
ALTER TABLE "event_user"
 ADD PRIMARY KEY ("id");

--
-- Index pour la table "product"
--
ALTER TABLE "product"
 ADD PRIMARY KEY ("id");

--
-- Index pour la table "product_event"
--
ALTER TABLE "product_event"
 ADD PRIMARY KEY ("id");

--
-- Index pour la table "sell"
--
ALTER TABLE "sell"
 ADD PRIMARY KEY ("id");

--
-- Index pour la table "user"
--
ALTER TABLE "user"
 ADD PRIMARY KEY ("id");

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
