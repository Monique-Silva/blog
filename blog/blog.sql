-- Adminer 4.8.1 MySQL 10.6.12-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `blog`;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `text` text NOT NULL,
  `publishdate` datetime NOT NULL,
  `lastdate` datetime NOT NULL,
  `importdegree` int(11) NOT NULL DEFAULT 0,
  `autors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_autors1_idx` (`autors_id`),
  CONSTRAINT `fk_articles_autors1` FOREIGN KEY (`autors_id`) REFERENCES `autors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `articles` (`id`, `title`, `text`, `publishdate`, `lastdate`, `importdegree`, `autors_id`) VALUES
(1,	'Faire du sport : loisirs obligatoire pour avoir une bonne santé',	'Le biathlon, du latin bis, « deux fois » d\'où bi- « deux », et du grec ἆθλον « combat, lutte », est une épreuve sportive combinant deux disciplines. Par coutume, quand on parle du biathlon, on évoque ce sport d\'hiver qui associe le ski de fond au tir à la carabine.',	'2023-06-28 13:36:36',	'2023-07-01 00:00:00',	0,	1),
(2,	'Sport pour plus de plaisir',	'Lorsqu\'on pratique une activité sportive, le corps sécrète des hormones telles que l\'endorphine, la dopamine ou l\'adrénaline qui permettent de réduire le stress, améliorer la qualité du sommeil, diminuer les douleurs et agir comme un antidépresseur, c\'est donc avant tout une source de plaisir. Le biathlon est idéal pour cela. ',	'2023-06-28 13:41:18',	'2023-07-01 00:00:00',	3,	1),
(3,	'Le sport à l\'école',	'Le sport contribue au bien-être, indépendamment de l\'âge, du sexe, de l\'appartenance ethnique. Il est apprécié de tous et sa portée n\'a pas d\'équivalent. Le biathlon devrait être pratiqué à l\'école.',	'2023-06-28 13:43:55',	'2023-07-01 00:00:00',	2,	3)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `title` = VALUES(`title`), `text` = VALUES(`text`), `publishdate` = VALUES(`publishdate`), `lastdate` = VALUES(`lastdate`), `importdegree` = VALUES(`importdegree`), `autors_id` = VALUES(`autors_id`);

DROP TABLE IF EXISTS `articles_has_categories`;
CREATE TABLE `articles_has_categories` (
  `articles_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`articles_id`,`categories_id`),
  KEY `fk_articles_has_categories_categories1_idx` (`categories_id`),
  KEY `fk_articles_has_categories_articles_idx` (`articles_id`),
  CONSTRAINT `fk_articles_has_categories_articles` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_articles_has_categories_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `autors`;
CREATE TABLE `autors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext DEFAULT NULL,
  `lastname` tinytext NOT NULL,
  `pseudoname` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudoname_UNIQUE` (`pseudoname`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `autors` (`id`, `name`, `lastname`, `pseudoname`) VALUES
(1,	'Matéo',	'Smith',	'Mat'),
(2,	'Valentine',	'Lee',	'Val'),
(3,	'Olivia',	'Torres',	'Liv'),
(4,	'Jack',	'Dawson',	'Jay'),
(5,	'Ming',	'Li',	'Mina')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `lastname` = VALUES(`lastname`), `pseudoname` = VALUES(`pseudoname`);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Minimum 5 autors';

INSERT INTO `categories` (`id`, `name`) VALUES
(1,	'hobbies')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` tinytext NOT NULL,
  `compublishdate` datetime GENERATED ALWAYS AS (current_timestamp()) VIRTUAL,
  `articles_id` int(11) NOT NULL,
  `autors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_articles1_idx` (`articles_id`),
  KEY `fk_comments_autors1_idx` (`autors_id`),
  CONSTRAINT `fk_comments_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_autors1` FOREIGN KEY (`autors_id`) REFERENCES `autors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`id`, `text`, `compublishdate`, `articles_id`, `autors_id`) VALUES
(1,	'Bravo à tous qui ont pris le temps de lire les bêtises que j\'écris.',	'2023-06-28 11:59:37',	1,	1),
(2,	'Bravo, vous avez tout à fait raison!',	'2023-06-28 11:59:37',	2,	1),
(3,	'Sans avis',	'2023-06-28 11:59:37',	3,	5),
(4,	'Sans avis',	'2023-06-28 11:59:37',	2,	5)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `text` = VALUES(`text`), `compublishdate` = VALUES(`compublishdate`), `articles_id` = VALUES(`articles_id`), `autors_id` = VALUES(`autors_id`);

-- 2023-06-28 11:59:37
