-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 juil. 2023 à 13:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `la_tresse`
--
CREATE DATABASE IF NOT EXISTS `la_tresse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `la_tresse`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `art_title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `art_publication_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`article_id`),
  KEY `fk_articles_users` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `art_title`, `art_content`, `art_image_url`, `art_publication_date`, `user`) VALUES
(1, 'Article test', 'Contenu test', NULL, '2023-07-20 10:40:12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`) VALUES
(1, 'Sans catégorie');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cm_id` int NOT NULL AUTO_INCREMENT,
  `cm_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  `pj_id` int DEFAULT NULL,
  `ht_id` int DEFAULT NULL,
  `parent` int DEFAULT NULL,
  PRIMARY KEY (`cm_id`),
  KEY `fk_comments_users` (`user`),
  KEY `fk_comments_projects` (`pj_id`),
  KEY `fk_comments_hello_thanks` (`ht_id`),
  KEY `fk_parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hello_thanks`
--

DROP TABLE IF EXISTS `hello_thanks`;
CREATE TABLE IF NOT EXISTS `hello_thanks` (
  `ht_id` int NOT NULL AUTO_INCREMENT,
  `ht_text_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `ht_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  PRIMARY KEY (`ht_id`),
  KEY `fk_ht_users` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `msg_first_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg_email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg_object` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `msg_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg_creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `fk_messages_users` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `pj_id` int NOT NULL AUTO_INCREMENT,
  `pj_title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pj_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `pj_banner_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pj_creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `pj_create` int NOT NULL,
  `pj_update` int DEFAULT NULL,
  PRIMARY KEY (`pj_id`),
  KEY `fk_create_projects` (`pj_create`),
  KEY `fk_update_projects` (`pj_update`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`pj_id`, `pj_title`, `pj_description`, `pj_banner_url`, `pj_creation_date`, `pj_create`, `pj_update`) VALUES
(1, 'Projet test', 'Description du projet test', NULL, '0000-00-00 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projects_categories`
--

DROP TABLE IF EXISTS `projects_categories`;
CREATE TABLE IF NOT EXISTS `projects_categories` (
  `project` int NOT NULL,
  `category` int NOT NULL,
  KEY `fk_projects_categories` (`category`),
  KEY `fk_categories_projects` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash_pass` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `nb_reactions` int DEFAULT '0',
  `nb_hello_thanks` int DEFAULT '0',
  `nb_comments` int DEFAULT '0',
  `account_creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `pj_reaction` int DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `fk_reaction_projects` (`pj_reaction`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `user_email`, `hash_pass`, `is_admin`, `nb_reactions`, `nb_hello_thanks`, `nb_comments`, `account_creation_date`, `pj_reaction`) VALUES
(1, 'Franco', 'Pedro', 'pmplf1960@gmail.com', '12345678', 1, 0, 0, 0, '0000-00-00 00:00:00', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_hello_thanks` FOREIGN KEY (`ht_id`) REFERENCES `hello_thanks` (`ht_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_projects` FOREIGN KEY (`pj_id`) REFERENCES `projects` (`pj_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parent`) REFERENCES `comments` (`cm_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `hello_thanks`
--
ALTER TABLE `hello_thanks`
  ADD CONSTRAINT `fk_ht_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_create_projects` FOREIGN KEY (`pj_create`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_update_projects` FOREIGN KEY (`pj_update`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD CONSTRAINT `fk_categories_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`pj_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projects_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_reaction_projects` FOREIGN KEY (`pj_reaction`) REFERENCES `projects` (`pj_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
