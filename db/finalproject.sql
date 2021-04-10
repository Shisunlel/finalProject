-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2021 at 08:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_rent`
--

DROP TABLE IF EXISTS `detail_rent`;
CREATE TABLE IF NOT EXISTS `detail_rent` (
  `rent_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `duration` smallint(5) UNSIGNED NOT NULL,
  `housenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(9,2) UNSIGNED NOT NULL,
  `total` double(9,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rent_id`),
  KEY `detail_rent_room_id_foreign` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `detail_rent`
--

INSERT INTO `detail_rent` (`rent_id`, `room_id`, `duration`, `housenumber`, `street`, `commune`, `district`, `province`, `cost`, `total`, `created_at`, `updated_at`) VALUES
(3, 4, 2, '90329', 'Hill Fork', 'Nevada', 'South', 'Mondulkiri', 548.68, 626.63, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 25, 4, '47269', 'Streich Row', 'Nebraska', 'New', 'Kampong Cham', 135.35, 199.11, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 20, 4, '61891', 'Jamison Gateway', 'Delaware', 'East', 'Koh Kong', 701.74, 364.38, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 11, 3, '95689', 'Carroll Trafficway', 'New Mexico', 'South', 'Siem Reap', 140.67, 247.29, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(10, 15, 5, '11122', 'Pascale Rapids', 'Maine', 'East', 'Mondulkiri', 529.33, 801.43, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(12, 16, 1, '84050', 'Ashley Spring', 'Missouri', 'South', 'Kampong Thom', 159.72, 587.18, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(14, 1, 4, '18008', 'Zechariah Gateway', 'Florida', 'West', 'Kampong Thom', 624.48, 234.59, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(15, 24, 3, '82365', 'DuBuque Valleys', 'North Carolina', 'South', 'Siem Reap', 486.36, 124.43, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(18, 23, 3, '7496', 'Collins Forges', 'Oregon', 'Lake', 'Phnom Penh', 325.72, 799.38, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(20, 3, 1, '60139', 'Bode Extensions', 'Louisiana', 'Lake', 'Phnom Penh', 323.85, 879.48, '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `facility` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_facility_unique` (`facility`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility`, `created_at`, `updated_at`) VALUES
(1, 'ipsum', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 'magnam', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 'incidunt', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 'est', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 'repellendus', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 'ab', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 'qui', '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(8, 'dolorem', '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(9, 'sunt', '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(10, 'debitis', '2021-04-10 04:56:37', '2021-04-10 04:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `facility_room`
--

DROP TABLE IF EXISTS `facility_room`;
CREATE TABLE IF NOT EXISTS `facility_room` (
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `facility_room_room_id_foreign` (`room_id`),
  KEY `facility_room_facility_id_foreign` (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `facility_room`
--

INSERT INTO `facility_room` (`room_id`, `facility_id`, `created_at`, `updated_at`) VALUES
(14, 10, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(4, 3, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(6, 6, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(23, 5, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(15, 6, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(19, 1, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(3, 3, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(9, 5, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(12, 4, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(23, 8, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(6, 3, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(19, 5, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(4, 2, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(24, 4, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(25, 3, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(17, 8, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(24, 2, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(10, 6, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(10, 4, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(15, 4, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(1, 7, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(5, 5, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(2, 7, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(17, 5, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(4, 1, '2021-04-10 04:56:37', '2021-04-10 04:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_room_id_foreign` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/1920x1080.png/0022dd?text=room+nobis', 14, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 'https://via.placeholder.com/1920x1080.png/00eebb?text=room+in', 9, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 'https://via.placeholder.com/1920x1080.png/004411?text=room+asperiores', 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 'https://via.placeholder.com/1920x1080.png/00ee44?text=room+sunt', 18, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 'https://via.placeholder.com/1920x1080.png/000022?text=room+laborum', 9, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 'https://via.placeholder.com/1920x1080.png/00cc88?text=room+praesentium', 6, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 'https://via.placeholder.com/1920x1080.png/00bbbb?text=room+quia', 15, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(8, 'https://via.placeholder.com/1920x1080.png/00dd66?text=room+quia', 9, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(9, 'https://via.placeholder.com/1920x1080.png/00ee11?text=room+molestiae', 14, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(10, 'https://via.placeholder.com/1920x1080.png/00aabb?text=room+eveniet', 15, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(11, 'https://via.placeholder.com/1920x1080.png/0055bb?text=room+incidunt', 24, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(12, 'https://via.placeholder.com/1920x1080.png/0088aa?text=room+excepturi', 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(13, 'https://via.placeholder.com/1920x1080.png/00ffaa?text=room+dolor', 16, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(14, 'https://via.placeholder.com/1920x1080.png/009977?text=room+laudantium', 21, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(15, 'https://via.placeholder.com/1920x1080.png/00dd11?text=room+laboriosam', 10, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(16, 'https://via.placeholder.com/1920x1080.png/0088cc?text=room+quidem', 21, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(17, 'https://via.placeholder.com/1920x1080.png/00ff99?text=room+ipsum', 9, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(18, 'https://via.placeholder.com/1920x1080.png/00ff44?text=room+illum', 14, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(19, 'https://via.placeholder.com/1920x1080.png/003399?text=room+eius', 18, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(20, 'https://via.placeholder.com/1920x1080.png/005555?text=room+qui', 12, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(21, 'https://via.placeholder.com/1920x1080.png/00bb33?text=room+ea', 16, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(22, 'https://via.placeholder.com/1920x1080.png/0011ee?text=room+minus', 18, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(23, 'https://via.placeholder.com/1920x1080.png/002288?text=room+iure', 6, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(24, 'https://via.placeholder.com/1920x1080.png/0000bb?text=room+assumenda', 7, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(25, 'https://via.placeholder.com/1920x1080.png/00ccaa?text=room+eaque', 25, '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_25_043512_create_rents_table', 1),
(5, '2021_02_25_093252_create_rooms_table', 1),
(6, '2021_02_25_093425_create_reviews_table', 1),
(7, '2021_02_25_093442_create_images_table', 1),
(8, '2021_02_25_093448_create_detail_rents_table', 1),
(9, '2021_02_25_093517_create_facilities_table', 1),
(10, '2021_02_25_093524_create_room_facilities_table', 1),
(11, '2021_02_28_040242_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

DROP TABLE IF EXISTS `rents`;
CREATE TABLE IF NOT EXISTS `rents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(8, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(9, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(10, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(11, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(12, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(13, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(14, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(15, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(16, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(17, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(18, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(19, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(20, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(21, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(22, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(23, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(24, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(25, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `review_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(2,1) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_room_id_foreign` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review_detail`, `rating`, `user_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'Nobis ut omnis autem. Officiis accusantium repudiandae sit aspernatur optio culpa. Exercitationem ut exercitationem ab doloribus.', 0.6, 2, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 'Itaque eos dolorum officiis libero. Ea molestias optio perferendis aut voluptatem voluptatem. Eum autem laboriosam mollitia.', 0.8, 1, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 'Doloribus aut vel eos dignissimos modi accusantium et. Eligendi est non molestias quis nostrum dolorem. Non neque voluptatem et atque quia alias.', 4.1, 3, 19, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 'Ipsam doloremque veniam sunt cum voluptatem beatae quaerat. Voluptates veniam fugit omnis fugit architecto ex. Natus qui quo aut dolorem unde aut facilis.', 4.2, 1, 20, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 'Aut ipsum necessitatibus iste a. Nulla sed sunt a. Minus culpa aspernatur rerum expedita illum.', 0.2, 5, 12, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 'Id illo necessitatibus commodi ipsam. Quia quibusdam rerum saepe illum voluptatem voluptatum molestiae minima. Animi et accusamus ut aliquam. Laborum et non aut nam nihil illum. Blanditiis hic eos aut voluptates hic officia.', 1.3, 3, 21, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 'Labore sit adipisci modi iusto porro odit maiores. Quis voluptas ipsum aut dolorum ducimus. Est sit voluptas optio hic eius veniam est quos.', 4.0, 1, 23, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(8, 'Quisquam error placeat nisi laudantium sunt. Quia ullam est dolor repudiandae fugit sit rerum. Sed et non eum beatae ipsa.', 3.6, 1, 9, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(9, 'Reprehenderit quisquam et qui ut excepturi possimus. Id libero voluptatum dolor dicta natus. Officia et vel aut voluptas quod.', 2.5, 3, 11, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(10, 'Delectus corporis placeat similique incidunt dolorem. Eum rerum voluptas nihil. Quis nobis quis sit quo similique. Et assumenda magni perspiciatis vel in qui.', 1.8, 2, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(11, 'Incidunt corrupti aut dolorum voluptas qui. Saepe non quia quo esse delectus aut magnam. Dolore quos qui corrupti dolor magnam eum eos. Dolorum molestiae sunt minus commodi ut.', 3.4, 5, 15, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(12, 'Maiores nisi quae quas quasi nulla. Excepturi qui sit eaque quia impedit. Voluptatem deserunt est est aut assumenda nesciunt vel. Inventore aliquam harum aut autem reiciendis voluptas praesentium.', 5.0, 2, 20, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(13, 'Autem id quia velit rem assumenda. Eaque ut quia nesciunt corporis. Laboriosam est ut dolore.', 0.6, 5, 23, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(14, 'Eum temporibus consequatur eveniet accusamus totam. Sapiente voluptas voluptate quis eaque voluptate.', 0.9, 2, 21, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(15, 'Placeat sed in temporibus animi veritatis ut. Autem autem ut commodi qui a corrupti. In quidem incidunt reprehenderit veritatis non tempore. Veniam qui et facilis voluptatem nostrum rem enim. Blanditiis laboriosam eveniet incidunt omnis vel provident.', 4.2, 2, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(16, 'Quo doloremque cum consequatur. Quisquam vero aspernatur ea et atque illo illum. Atque quam voluptatum animi quia officia repellat possimus.', 4.7, 5, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(17, 'Velit a voluptas alias magni saepe. Optio repellat aut fuga sunt labore. Quia qui iure qui delectus et aut.', 4.1, 3, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(18, 'Earum ut sed nihil deleniti optio est. Pariatur deserunt et sed cumque id. Ut delectus ut ipsa atque ad.', 5.0, 1, 25, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(19, 'Est aspernatur nihil exercitationem est veniam. Fugiat ut eos et voluptates vitae. Aut dolorum vitae exercitationem est explicabo. Adipisci qui voluptas dolores vel voluptas rerum est.', 4.3, 3, 20, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(20, 'Quas animi eos laboriosam ipsam recusandae eius esse. Commodi neque veniam consequatur iure. Velit ea debitis aliquid et ducimus nisi. Occaecati ullam non fugiat.', 1.4, 3, 15, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(21, 'Eligendi magnam animi corrupti nostrum neque. Unde et eveniet et qui optio quis quia. Sed id rerum voluptatibus quia voluptatem quos qui.', 1.8, 5, 25, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(22, 'Dolores maxime aut dicta autem inventore accusantium. Natus eligendi sit qui debitis est. Qui dolores voluptatum consectetur aut fugit ut.', 4.2, 2, 7, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(23, 'Aut qui cumque iste quia sed laudantium. Inventore reprehenderit est reprehenderit inventore mollitia vel saepe. Nisi sunt eos ut dicta. Non sint qui quam.', 1.7, 5, 25, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(24, 'Officia architecto eaque nobis id qui. Aliquid et dolorem laboriosam quia qui id quia. Aut vitae sint qui ipsa est ipsum dignissimos. Saepe voluptatem soluta libero iusto qui necessitatibus molestias ut.', 1.9, 3, 24, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(25, 'Maiores voluptatem laborum corrupti commodi. Consectetur itaque sint placeat. Officiis optio saepe aut.', 3.6, 3, 8, '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(5,2) NOT NULL,
  `qty` smallint(5) UNSIGNED NOT NULL,
  `guest` smallint(5) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `description`, `address`, `price`, `qty`, `guest`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Qui incidunt reprehenderit deserunt quos.', 'Totam qui dicta esse rerum. Corporis omnis doloremque dolor in et distinctio exercitationem perspiciatis. Minima ipsam et cupiditate libero et molestias.', '2010 Schumm Ramp Suite 236\nHerzogburgh, HI 04371-7381', 20.80, 6, 3, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 'Excepturi delectus totam sed molestiae.', 'Soluta et voluptatum ipsa illo aut ducimus. Quasi ut dolorem ut dolores magnam praesentium odio. Quam accusamus voluptatem cupiditate placeat.', '39808 O\'Reilly Ridge Apt. 916\nNew Oriechester, OR 74156-5459', 19.42, 4, 1, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 'Sequi qui voluptatem accusantium blanditiis assumenda.', 'Iste corporis et et placeat est consequuntur. Repudiandae occaecati velit voluptas rem minus. Laudantium sed cupiditate porro. Dolorum ex quam temporibus sunt illo laudantium.', '543 Elvie Key Suite 799\nLake Roxanechester, OR 17454', 27.66, 1, 5, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 'Consequatur officiis ipsum eos earum ducimus quaerat.', 'Harum in ut deserunt quia ipsam itaque. Minus totam quibusdam ex quibusdam nostrum voluptatem. Voluptate officia molestias ut. Repudiandae dicta numquam perspiciatis voluptas ullam iusto iste.', '56171 Rath Pike Suite 468\nMonicashire, NY 59781-9357', 22.21, 9, 4, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 'Beatae amet autem perspiciatis dolores aspernatur.', 'Et sit optio nostrum quasi perferendis. Similique voluptas voluptatem est. Laborum itaque est dolore expedita.', '4235 Alexandre Meadow Suite 687\nSouth Alyshaview, AK 10039-8515', 19.15, 4, 4, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(6, 'Molestiae aut nobis est est magnam occaecati.', 'Labore aperiam velit optio aut debitis velit. Est recusandae voluptas voluptas vitae possimus voluptas. Placeat architecto illo aliquam debitis. Quo fugiat ut in incidunt odit adipisci.', '889 Clement Tunnel Apt. 779\nJohnschester, OR 93784-7680', 34.72, 4, 3, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(7, 'Eveniet aut consequatur unde assumenda.', 'Vitae quasi laborum ipsam quibusdam. Rem deleniti nihil possimus aut aut asperiores. Voluptatem et itaque et aperiam aliquid. Eos officia sed harum perspiciatis unde sunt exercitationem est.', '1774 Lois Valley\nSouth Christina, CA 04245-1255', 22.98, 7, 1, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(8, 'Tempore omnis aut voluptates rerum est.', 'Debitis esse quo reiciendis consectetur aut. Eligendi eligendi iusto est eos aut. Voluptatem qui debitis asperiores. Enim et voluptatem ducimus possimus minus non est.', '53766 Mariana Isle Apt. 076\nWest Minerva, AL 21053', 18.22, 8, 2, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(9, 'Impedit est qui adipisci numquam id.', 'Perferendis et placeat explicabo repellat labore voluptas ut. Sit praesentium culpa aut voluptas deleniti. Est dicta mollitia cupiditate.', '536 Bogan Drives Apt. 180\nWilliamsonview, OK 87909', 23.63, 5, 3, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(10, 'Est earum consectetur alias quod.', 'Molestiae ex minima suscipit magnam omnis. Sunt et ullam accusantium libero. Ut eaque possimus cupiditate facilis.', '35638 Satterfield Center\nSouth Frankmouth, AZ 82636-7670', 29.83, 4, 2, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(11, 'Ut amet ea sed magni.', 'Tempora quis qui consequatur consequatur. Qui voluptatibus laudantium et omnis. Enim quae officiis voluptatem. Dolores cum dolores deserunt.', '4328 Cole Canyon\nEmmashire, AR 85658', 30.05, 7, 1, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(12, 'Dolore pariatur consequuntur ut.', 'Enim consequuntur sint labore necessitatibus ratione eos. Reprehenderit nesciunt magnam porro voluptatem. Debitis illo et velit qui exercitationem qui maiores. Corrupti totam labore et.', '3827 Kiehn Roads Apt. 991\nPort Russellbury, IL 09113', 17.92, 2, 3, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(13, 'Id quibusdam nihil eius sapiente distinctio eum omnis nihil.', 'Est totam dolores non voluptatem enim. Et placeat laudantium voluptatum voluptates rerum veritatis. Labore vel ut cupiditate architecto consectetur aut.', '3085 Blaze Plain\nRomagueraburgh, KY 99105-8554', 33.81, 9, 5, 4, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(14, 'Enim est vel veritatis assumenda.', 'Possimus consequatur impedit ut hic ex temporibus sed. Totam quasi facilis inventore quos officiis. Provident non culpa et sint vel aut perferendis. Voluptatem incidunt fugit saepe veritatis.', '320 Darby Mountain\nTodchester, ND 03140', 16.87, 1, 1, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(15, 'Sunt sit nemo eum et non delectus aut quasi.', 'Odio error nihil rerum maxime ut. Sed est dicta impedit. Ratione veritatis est aut. Dolore quam ipsum quisquam repellendus.', '561 Champlin Canyon\nNorth Helenaburgh, MN 50333', 27.74, 5, 5, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(16, 'Adipisci maxime fugiat quasi minima.', 'Id et provident autem. Autem rerum ea exercitationem consequuntur. Sit odio ut voluptatem excepturi.', '9767 Ritchie Island Suite 144\nDeondremouth, DE 28342', 20.33, 6, 3, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(17, 'Sed culpa eveniet maxime beatae.', 'Dolorem nihil et optio consequatur voluptatem. Doloremque a vitae est soluta.', '11495 Jarred Ports Suite 053\nDontown, UT 13462-8076', 34.80, 1, 2, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(18, 'Ut nihil accusamus et nesciunt fugit molestias rerum.', 'Odit sint nihil exercitationem sit et. Officiis quos accusantium eos illum quis ut. Magnam est est et tempora odio.', '470 Kerluke Square\nDeshaunborough, OR 38689-8707', 31.15, 7, 2, 2, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(19, 'Quia aliquam quibusdam harum similique.', 'Alias minima aut eos. In est nesciunt atque quam dolorem qui. Unde reiciendis et sed cumque praesentium exercitationem.', '7351 Santos Shoal\nFelixmouth, DC 30056', 22.92, 3, 2, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(20, 'Aut minus occaecati et.', 'Perspiciatis repellat soluta voluptas. Voluptas vero dolor quisquam maiores. Sunt corporis sint rerum. Est harum laborum iusto iste.', '8283 Arjun Spur Suite 237\nLeliafort, VT 77673-4200', 24.49, 3, 4, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(21, 'Recusandae recusandae est et doloribus aut.', 'Est doloremque fugit aut. Quia vel eaque rem saepe. Magni in odio quia omnis.', '32791 Ortiz Garden Suite 780\nSouth Birdie, IL 97714-2493', 23.83, 4, 5, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(22, 'Doloremque ullam eum qui exercitationem.', 'Repellat delectus dolores ipsa optio consequatur aut sequi. Tempora qui asperiores et sed. Quo quasi veniam officia mollitia iure hic aperiam aut. Libero labore minus voluptatem amet iste dicta enim.', '9141 Schaefer Drives\nNew Colefort, TX 29465', 25.63, 3, 1, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(23, 'Voluptates repudiandae quia et repellendus sint voluptas libero impedit.', 'Facere aut excepturi possimus dolor porro. Qui mollitia sed corrupti qui quia. Consequatur repudiandae occaecati ea qui pariatur a expedita. Aut eos atque sed.', '259 Cassin Pines Apt. 372\nLake Sabina, OK 81490-9178', 21.84, 2, 5, 5, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(24, 'Nihil pariatur illo facere dicta quae fugit.', 'Sit quae totam porro laudantium et. Nesciunt qui consequuntur aut esse necessitatibus voluptatem nobis unde. Culpa dolores eius provident id autem et qui.', '683 Leopold Views\nStammborough, AZ 92059', 29.98, 3, 4, 1, '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(25, 'Sunt omnis quia repellat rerum.', 'Reiciendis consequuntur laudantium nesciunt nihil. Dignissimos tenetur mollitia a distinctio quam. Suscipit eum quibusdam velit doloribus quis omnis quia natus.', '9254 Leffler Springs Apt. 207\nWest Keaton, WA 13094-6477', 34.15, 1, 2, 3, '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `housenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `id_card`, `phone_number`, `housenumber`, `street`, `commune`, `district`, `province`, `dob`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Isaac', 'Harris', 'elliott54', 'howell.kenyatta@example.org', '2021-04-10 04:56:36', '$2y$10$rlKQVfKaE57IU6ROGgzACudencc2pLuv8tVVSOWRsbnpJCbRZAwAe', 'https://via.placeholder.com/500x500.png/00dd99?text=users+amet', '731578839', '56918', 'Abigail Mountain', 'New Jersey', 'East', 'Kampong Cham', '1996-05-23', 'https://via.placeholder.com/500x500.png/003355?text=user+nesciunt', 'VyHBPpr1yY', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(2, 'Jefferey', 'Smitham', 'myost', 'herzog.manuel@example.org', '2021-04-10 04:56:36', '$2y$10$DeRHqHkaxwRqXuAPxNe6VuadfL8//BYVcOVf8XZiEP7ry8mVzTF5K', 'https://via.placeholder.com/500x500.png/009999?text=users+exercitationem', '686986351', '17166', 'Yvonne Trafficway', 'New Mexico', 'South', 'Phnom Penh', '1979-09-14', 'https://via.placeholder.com/500x500.png/00ff33?text=user+unde', 'Z7lfcjnMkl', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(3, 'Rachelle', 'Littel', 'mariela36', 'cassie.rutherford@example.com', '2021-04-10 04:56:36', '$2y$10$7ifvpnRjzRyPuBpYTRJAE.kcgfRjuTQ/0hD0FEoQf98ykAyo4PWyS', 'https://via.placeholder.com/500x500.png/0077ff?text=users+exercitationem', '690990191', '17359', 'Carrie Oval', 'Wyoming', 'West', 'Koh Kong', '1976-12-31', 'https://via.placeholder.com/500x500.png/009911?text=user+qui', 'dPMChOOF5x', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(4, 'Walton', 'Goldner', 'satterfield.kamryn', 'mariam.kessler@example.com', '2021-04-10 04:56:36', '$2y$10$xoCYOmKkOMvV38TizuIEcepal8vno6zcdhn2B0z.oAE9Per1UnnXy', 'https://via.placeholder.com/500x500.png/007733?text=users+quisquam', '397525350', '69605', 'Holly Squares', 'Mississippi', 'Port', 'Mondulkiri', '1995-10-04', 'https://via.placeholder.com/500x500.png/006633?text=user+fugiat', 'qFDNsJBm6H', '2021-04-10 04:56:36', '2021-04-10 04:56:36'),
(5, 'Ayana', 'Wilderman', 'daniel.gustave', 'deborah01@example.com', '2021-04-10 04:56:36', '$2y$10$7.kzIz1JTUrNQz3WKSN9ze3ulTenFUl5N3OHrLHEoZHiRwMIiH/Hi', 'https://via.placeholder.com/500x500.png/005544?text=users+fugiat', '531493278', '29867', 'Lakin Pike', 'Illinois', 'Port', 'Phnom Penh', '2016-03-25', 'https://via.placeholder.com/500x500.png/0099dd?text=user+sunt', '3pV4jROBuK', '2021-04-10 04:56:36', '2021-04-10 04:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_room_id_foreign` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 4, 20, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(2, 1, 20, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(3, 3, 9, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(4, 1, 22, '2021-04-10 04:56:37', '2021-04-10 04:56:37'),
(5, 4, 16, '2021-04-10 04:56:37', '2021-04-10 04:56:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_rent`
--
ALTER TABLE `detail_rent`
  ADD CONSTRAINT `detail_rent_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`),
  ADD CONSTRAINT `detail_rent_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `facility_room`
--
ALTER TABLE `facility_room`
  ADD CONSTRAINT `facility_room_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facility_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
