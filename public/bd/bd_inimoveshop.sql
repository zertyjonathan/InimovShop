-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 02 avr. 2022 à 12:00
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_inimoveshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_fileimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_fileimg`, `user_id`, `created_at`, `updated_at`, `category_description`) VALUES
(1, 'Vêtements222', '1200px-Attention_Sign.svg.png', 1, '2022-03-31 03:31:52', '2022-03-31 04:45:16', 'pantalon, autres'),
(2, 'categorie2', 'package.png', 1, '2022-04-01 22:37:42', '2022-04-02 05:10:22', 'Aucune descprition'),
(3, 'Véhicules', '497738.png', 1, '2022-04-01 22:38:12', '2022-04-02 04:59:19', 'Tout type de véhicule, gros engins et autres'),
(4, 'pantalon', 'colis-suspect.png', 1, '2022-04-01 22:55:58', '2022-04-01 22:55:58', NULL),
(5, 'Categorie 6', 'istockphoto-1311125940-170667a.jpg', 1, '2022-04-02 05:40:27', '2022-04-02 05:40:27', 'Aucune description');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2022_03_29_191329_create_category', 1),
(11, '2022_03_29_191348_create_product', 1),
(12, '2022_03_30_190609_add_column_description_categorie', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `categorie_id` int NOT NULL,
  `product_stock` int NOT NULL,
  `product_fileimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categorie_id_foreign` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `categorie_id`, `product_stock`, `product_fileimg`, `created_at`, `updated_at`) VALUES
(2, 'Produit 772', 10000, 2, 200, 'colis-suspect.png', '2022-04-01 23:40:58', '2022-04-01 23:40:58'),
(43, 'K135sdsds1221', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:43:25', '2022-04-01 23:43:25'),
(4, 'Produit K134', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:41:45', '2022-04-01 23:41:45'),
(5, 'Produit K135', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:43:25', '2022-04-01 23:43:25'),
(35, 'Produit 772sdsd', 10000, 2, 200, 'colis-suspect.png', '2022-04-01 23:40:58', '2022-04-01 23:40:58'),
(36, 'Produit K13687', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:41:45', '2022-04-01 23:41:45'),
(37, 'Produit K135sdsds', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:43:25', '2022-04-01 23:43:25'),
(38, 'JJJJ772', 10000, 2, 200, 'colis-suspect.png', '2022-04-01 23:40:58', '2022-04-01 23:40:58'),
(39, 'ZYUOIK134', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:41:45', '2022-04-01 23:41:45'),
(40, '271892K135', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:43:25', '2022-04-01 23:43:25'),
(41, 'MMM772sdsd', 10000, 2, 200, 'colis-suspect.png', '2022-04-01 23:40:58', '2022-04-01 23:40:58'),
(42, '78892K13687', 10000, 4, 200, 'citations-directeur-commercial-malin16.jpg', '2022-04-01 23:41:45', '2022-04-01 23:41:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan', 'Talla ', 'tallajonathan12@gmail.com', '2022-03-31 09:59:55', '$2y$10$sD8Tsos8i4eTTkOhoGa0i.K/T2WbX7QpZMUB3vejYmjJF.d89hYaO', 'OTbWf9xRoWB4ZYLGQe4w0TvcWAfIsNdyudtaFTf8OqFl6MrNqQWtd9IS9Oye', '2022-03-31 09:59:12', '2022-03-31 09:59:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
