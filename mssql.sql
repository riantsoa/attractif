-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: attractif
-- ------------------------------------------------------
-- Server version	5.5.40-1
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,MSSQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: "attractif"
--

/*!40000 DROP DATABASE IF EXISTS "attractif"*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ "attractif" /*!40100 DEFAULT CHARACTER SET latin1 */;

USE "attractif";

--
-- Table structure for table "category"
--

DROP TABLE IF EXISTS "category";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "category" (
  "id" int(11) NOT NULL,
  "name" varchar(1024) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "category"
--

LOCK TABLES "category" WRITE;
/*!40000 ALTER TABLE "category" DISABLE KEYS */;
/*!40000 ALTER TABLE "category" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "event"
--

DROP TABLE IF EXISTS "event";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "event" (
  "id" int(11) NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "place" varchar(1024) NOT NULL,
  "descript" varchar(1024) NOT NULL,
  "name" varchar(1024) NOT NULL,
  "category" int(11) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "event"
--

LOCK TABLES "event" WRITE;
/*!40000 ALTER TABLE "event" DISABLE KEYS */;
/*!40000 ALTER TABLE "event" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "event_user"
--

DROP TABLE IF EXISTS "event_user";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "event_user" (
  "id" int(11) NOT NULL,
  "status" int(11) NOT NULL,
  "client" int(11) NOT NULL,
  "event" int(11) NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "event_user"
--

LOCK TABLES "event_user" WRITE;
/*!40000 ALTER TABLE "event_user" DISABLE KEYS */;
/*!40000 ALTER TABLE "event_user" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "product"
--

DROP TABLE IF EXISTS "product";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "product" (
  "id" int(11) NOT NULL,
  "name" varchar(1024) NOT NULL,
  "quantity" int(11) NOT NULL,
  "category" int(11) NOT NULL,
  "descript" varchar(1024) NOT NULL,
  "image" varchar(1024) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "product"
--

LOCK TABLES "product" WRITE;
/*!40000 ALTER TABLE "product" DISABLE KEYS */;
/*!40000 ALTER TABLE "product" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "product_event"
--

DROP TABLE IF EXISTS "product_event";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "product_event" (
  "product" int(11) NOT NULL,
  "event" int(11) NOT NULL
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "product_event"
--

LOCK TABLES "product_event" WRITE;
/*!40000 ALTER TABLE "product_event" DISABLE KEYS */;
/*!40000 ALTER TABLE "product_event" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "sell"
--

DROP TABLE IF EXISTS "sell";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "sell" (
  "id" int(11) NOT NULL,
  "user" int(11) NOT NULL,
  "product" int(11) NOT NULL,
  "quantity" int(11) NOT NULL,
  "date" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "sell"
--

LOCK TABLES "sell" WRITE;
/*!40000 ALTER TABLE "sell" DISABLE KEYS */;
/*!40000 ALTER TABLE "sell" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "user"
--

DROP TABLE IF EXISTS "user";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "user" (
  "id" int(11) NOT NULL,
  "name" varchar(1024) NOT NULL,
  "mail" varchar(1024) NOT NULL,
  "pass" varchar(1024) NOT NULL,
  "newsletter" tinyint(1) NOT NULL DEFAULT '0',
  "alert" tinyint(1) NOT NULL DEFAULT '0',
  "admin" tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "user"
--

LOCK TABLES "user" WRITE;
/*!40000 ALTER TABLE "user" DISABLE KEYS */;
/*!40000 ALTER TABLE "user" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-08 12:51:30
