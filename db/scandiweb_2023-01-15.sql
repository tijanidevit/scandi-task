# ************************************************************
# Sequel Ace SQL dump
# Version 20044
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 5.7.39)
# Database: scandiweb
# Generation Time: 2023-01-15 09:19:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`)
VALUES
	(1,'Book'),
	(2,'DVD'),
	(3,'Furniture');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_items`;

CREATE TABLE `category_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `text` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `error_message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category_items` WRITE;
/*!40000 ALTER TABLE `category_items` DISABLE KEYS */;

INSERT INTO `category_items` (`id`, `category_id`, `name`, `text`, `type`, `error_message`)
VALUES
	(1,1,'weight','Weight','text','Please, provide weight'),
	(2,2,'size','Size','text','Please, provide size'),
	(3,3,'height','Height','text','Please, provide height'),
	(4,3,'width','Width','text','Please, provide width'),
	(5,3,'length','Length','text','Please, provide length');

/*!40000 ALTER TABLE `category_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `sku` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `productType` text COLLATE utf8_bin NOT NULL,
  `size` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `weight` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `height` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `length` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `width` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`sku`, `name`, `price`, `productType`, `size`, `weight`, `height`, `length`, `width`)
VALUES
	(X'736464797364',X'6864686468',123,X'64666666',X'3130',X'313230',X'3230',X'3130',X'313230'),
	(X'736B75',X'6864686468',123,X'64666666',X'3130',X'313230',X'3230',X'3130',X'313230'),
	(X'736B753233653264647777',X'6864686468',123,X'64666666',X'3130',X'313230',X'3230',X'3130',X'313230');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
