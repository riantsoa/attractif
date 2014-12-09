-- phpMyAdmin SQL Dump
-- version 4.2.12deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Décembre 2014 à 09:38
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

-- --------------------------------------------------------

--
-- Structure de la table "event_user"
--

CREATE TABLE "event_user" (
  "id" int NOT NULL,
  "status" int NOT NULL,
  "client" int NOT NULL,
  "event" int NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

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

-- --------------------------------------------------------

--
-- Structure de la table "product_event"
--

CREATE TABLE "product_event" (
  "product" int NOT NULL,
  "event" int NOT NULL
);

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
