-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 juil. 2023 à 07:19
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
  `article_number` int NOT NULL AUTO_INCREMENT,
  `title` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `modification_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL,
  PRIMARY KEY (`article_number`),
  KEY `fk_articles_users` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_number` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`category_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  `project` int NOT NULL,
  `reaction` int NOT NULL,
  `parent` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users` (`user`),
  KEY `fk_comments_projects` (`project`),
  KEY `fk_comments_reactions` (`reaction`),
  KEY `fk_parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_number` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `object` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL,
  PRIMARY KEY (`message_number`),
  KEY `fk_messages_users` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_number` int NOT NULL AUTO_INCREMENT,
  `title` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Cotignac',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `modification_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects_categories`
--

DROP TABLE IF EXISTS `projects_categories`;
CREATE TABLE IF NOT EXISTS `projects_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project` int NOT NULL,
  `category` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_categories` (`category`),
  KEY `fk_categories_projects` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE IF NOT EXISTS `reactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_activated` tinyint(1) NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  `project` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reactions_users` (`user`),
  KEY `fk_reactions_projects` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `hash_pass` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_adherent` tinyint(1) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_projects`
--

DROP TABLE IF EXISTS `users_projects`;
CREATE TABLE IF NOT EXISTS `users_projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `project` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_users` (`user`),
  KEY `fk_users_projects` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`project_number`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_reactions` FOREIGN KEY (`reaction`) REFERENCES `reactions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parent`) REFERENCES `comments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD CONSTRAINT `fk_categories_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`project_number`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projects_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`category_number`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `fk_reactions_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`project_number`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reactions_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_projects`
--
ALTER TABLE `users_projects`
  ADD CONSTRAINT `fk_projects_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`project_number`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
