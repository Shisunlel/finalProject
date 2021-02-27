-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2021 at 08:09 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_rents`
--

DROP TABLE IF EXISTS `detail_rents`;
CREATE TABLE IF NOT EXISTS `detail_rents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `duration` smallint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_rents_user_id_foreign` (`user_id`),
  KEY `detail_rents_room_id_foreign` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `detail_rents`
--

INSERT INTO `detail_rents` (`id`, `duration`, `user_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 1, 5, 23, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 5, 2, 18, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 3, 5, 19, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 5, 4, 21, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 1, 2, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(7, 5, 5, 9, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(8, 3, 2, 13, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 1, 2, 17, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 5, 4, 12, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(11, 3, 4, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(12, 1, 3, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(13, 5, 4, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 1, 4, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 2, 3, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 3, 4, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(17, 5, 3, 18, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 5, 5, 8, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(19, 5, 1, 11, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(20, 5, 3, 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(21, 4, 5, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(22, 2, 4, 22, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(23, 3, 3, 25, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(24, 4, 1, 13, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(25, 1, 2, 19, '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
(1, 'iste', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 'repudiandae', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 'ipsum', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 'saepe', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 'est', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 'cumque', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(7, 'officiis', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(8, 'qui', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 'rerum', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 'ratione', '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `facility_rooms`
--

DROP TABLE IF EXISTS `facility_rooms`;
CREATE TABLE IF NOT EXISTS `facility_rooms` (
  `room_id` bigint UNSIGNED NOT NULL,
  `facility_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `facility_rooms_room_id_foreign` (`room_id`),
  KEY `facility_rooms_facility_id_foreign` (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `facility_rooms`
--

INSERT INTO `facility_rooms` (`room_id`, `facility_id`, `created_at`, `updated_at`) VALUES
(17, 8, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(17, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 8, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(13, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(22, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 8, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(24, 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(1, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(21, 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(12, 9, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_room_id_foreign` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/1920x1080.png/0099ff?text=room+cumque', 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 'https://via.placeholder.com/1920x1080.png/005599?text=room+tempora', 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 'https://via.placeholder.com/1920x1080.png/00ffdd?text=room+excepturi', 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 'https://via.placeholder.com/1920x1080.png/002200?text=room+in', 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 'https://via.placeholder.com/1920x1080.png/00aa33?text=room+ab', 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 'https://via.placeholder.com/1920x1080.png/00bbaa?text=room+velit', 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(7, 'https://via.placeholder.com/1920x1080.png/00dd33?text=room+rerum', 14, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(8, 'https://via.placeholder.com/1920x1080.png/004400?text=room+fugiat', 23, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 'https://via.placeholder.com/1920x1080.png/004411?text=room+dolore', 25, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 'https://via.placeholder.com/1920x1080.png/005544?text=room+non', 14, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(11, 'https://via.placeholder.com/1920x1080.png/00bb88?text=room+aperiam', 15, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(12, 'https://via.placeholder.com/1920x1080.png/007733?text=room+nihil', 17, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(13, 'https://via.placeholder.com/1920x1080.png/003399?text=room+doloremque', 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 'https://via.placeholder.com/1920x1080.png/004422?text=room+ut', 16, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 'https://via.placeholder.com/1920x1080.png/0088bb?text=room+modi', 15, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 'https://via.placeholder.com/1920x1080.png/00ff44?text=room+iusto', 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(17, 'https://via.placeholder.com/1920x1080.png/00ee11?text=room+veritatis', 20, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 'https://via.placeholder.com/1920x1080.png/000022?text=room+ut', 16, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(19, 'https://via.placeholder.com/1920x1080.png/008822?text=room+est', 13, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(20, 'https://via.placeholder.com/1920x1080.png/0033ff?text=room+id', 13, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(21, 'https://via.placeholder.com/1920x1080.png/0000ff?text=room+in', 11, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(22, 'https://via.placeholder.com/1920x1080.png/00ff22?text=room+cum', 21, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(23, 'https://via.placeholder.com/1920x1080.png/00aa33?text=room+in', 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(24, 'https://via.placeholder.com/1920x1080.png/004433?text=room+dicta', 17, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(25, 'https://via.placeholder.com/1920x1080.png/00ee99?text=room+libero', 14, '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_25_093252_create_rooms_table', 1),
(5, '2021_02_25_093425_create_reviews_table', 1),
(6, '2021_02_25_093442_create_images_table', 1),
(7, '2021_02_25_093448_create_rent_details_table', 1),
(8, '2021_02_25_093517_create_facilities_table', 1),
(9, '2021_02_25_093524_create_room_facilities_table', 1);

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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `review_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(2,1) UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
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
(1, 'Occaecati quis aspernatur vel ut qui accusamus. Aut alias quas minima voluptas explicabo autem. Ratione molestiae voluptatem sunt alias. Facilis eius natus reiciendis sed.', 0.9, 5, 24, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 'Aut consequatur aperiam praesentium. Eos nihil eum qui excepturi ex. Dolorem quia ea quasi.', 0.1, 3, 8, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 'Iste quia libero consequatur. Veniam cumque ipsam reprehenderit commodi voluptas aut et. Error exercitationem impedit error quia voluptas et.', 2.4, 1, 17, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 'Molestias totam error et ut aut cumque minima. Optio ratione quibusdam ipsa facere distinctio. Soluta ea id et consequuntur molestias culpa alias.', 0.8, 2, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 'Porro impedit cum sed neque. Dolorem occaecati mollitia aut numquam nobis aut. Autem reiciendis sunt minima non magni.', 4.6, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 'At rerum rerum rerum est. Cumque at ipsam excepturi perspiciatis sit est numquam. Reprehenderit dicta aut et porro reprehenderit.', 2.2, 5, 7, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(7, 'Earum debitis similique vel aut. Ea nemo omnis molestiae omnis quis. Voluptas harum totam eius. Reiciendis quam quod error ut tempore a eum.', 3.8, 1, 25, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(8, 'Blanditiis dolorem atque eos vero aut. Blanditiis odit esse quisquam et quasi eius quos molestias. Et cupiditate accusamus quam quam culpa. Repudiandae repellat illo dolore explicabo.', 2.2, 2, 20, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 'Explicabo nemo nihil autem enim sed qui. Ipsa perspiciatis necessitatibus in atque. Quas et rerum optio.', 1.1, 4, 24, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 'Quae dolor nobis molestias minima inventore saepe sequi nemo. Reiciendis molestiae dolor officiis est sed. Voluptatem est sed doloremque consequatur. Non aut numquam distinctio qui voluptatum.', 0.7, 1, 14, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(11, 'Vero dolorem sequi magnam et aspernatur. Nulla quia dignissimos iste eius deleniti quasi. Ut fugit eum fugiat quisquam nihil nostrum atque sit.', 3.9, 3, 10, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(12, 'Iste ut explicabo explicabo iure sed et. Et qui impedit consequatur odit illo dolores et. Qui labore modi quaerat. Nihil sed nihil accusamus magnam. Sunt odit quos nam nostrum.', 0.9, 5, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(13, 'Omnis sunt nisi ipsa sed. Placeat labore dolorum magnam quis minus ut. Aut eum nesciunt omnis voluptatem incidunt maxime nostrum.', 0.9, 5, 11, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 'Fugiat corrupti ad voluptas earum. Dolor voluptates minima odio ipsam.', 0.9, 1, 11, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 'Ut eos veniam qui. Eaque sed et quas cum. Amet molestiae aperiam laborum dolorum.', 4.4, 5, 12, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 'Ab blanditiis nisi labore nam sit ab impedit. Excepturi soluta et dolores culpa exercitationem. Amet ut fuga deleniti expedita.', 0.5, 5, 23, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(17, 'Fugiat et unde est et ipsa dolorum doloremque tempora. Molestiae ipsam ut labore et quas. Quia enim sint ea autem consequatur qui. Quisquam id maxime nisi molestiae facere quas voluptates. Et rerum laudantium dolorem.', 2.9, 4, 15, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 'Consequatur qui animi saepe aut in quibusdam illum consequatur. Possimus quaerat perspiciatis et quos reiciendis dolor laudantium impedit. Optio in tempore officiis tenetur ut. Est dolorem est nisi.', 4.8, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(19, 'Quia enim officiis minus et corrupti aliquid ullam. Cupiditate autem provident natus accusantium blanditiis sit commodi. Rerum aut odio consequuntur corrupti.', 4.0, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(20, 'Delectus maxime qui eum et aut explicabo laborum. Omnis autem magnam delectus velit. Doloremque sunt dolores eaque iste sunt doloremque assumenda. Provident magnam culpa veniam ex esse expedita.', 2.0, 2, 20, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(21, 'Rerum est sunt rerum aliquam qui consequuntur aliquid. Non a aut molestiae dolor labore quis blanditiis. Culpa quo atque similique omnis qui ut voluptas.', 2.3, 5, 22, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(22, 'Quos et natus provident ratione excepturi. Temporibus perspiciatis minus dicta nobis. Et suscipit et accusamus. Nihil mollitia reiciendis itaque veniam dolore aut. Aut quam adipisci dolores animi assumenda molestiae.', 2.0, 4, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(23, 'Distinctio omnis at sapiente omnis. Repellendus dolorem quod culpa ea dolor. Veritatis porro blanditiis laudantium ea omnis quod.', 0.2, 1, 6, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(24, 'Ipsa dolores at rem. Et sed explicabo similique aliquid ab earum qui. Tempora alias laboriosam ratione optio. Sunt minus fugit cum totam corporis repellendus.', 0.2, 3, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(25, 'Laudantium est mollitia quas a labore qui dolor. Aperiam illo corporis temporibus ut voluptatem animi illo. Voluptates rerum dolor occaecati iste aut omnis. Quod vel rem tempora.', 4.9, 3, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(5,2) NOT NULL,
  `qty` smallint UNSIGNED NOT NULL,
  `guest` smallint UNSIGNED NOT NULL,
  `available` tinyint(1) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `description`, `address`, `price`, `qty`, `guest`, `available`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Omnis accusantium voluptas et optio laboriosam.', 'Ut fuga sit quidem. Aspernatur in vitae atque et. Quod est debitis atque ut modi hic non.', '4875 Geovany Plain Suite 103\nSouth Armani, KS 15039-0758', 19.16, 6, 1, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 'Ut rem impedit quia qui excepturi non nisi.', 'Consequatur earum fuga sequi deserunt. Iure recusandae ex voluptate hic quas unde. Minima laboriosam et ad.', '617 Andre Orchard Suite 674\nNew Tate, AK 43304-5180', 24.29, 3, 5, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 'Et tenetur quasi totam.', 'Fugit labore deserunt necessitatibus at. Ipsum ratione officiis sequi dolorum iste voluptatem animi. Omnis quo libero asperiores aliquam reiciendis ea. Autem sit eos explicabo praesentium ad.', '49265 Pollich Ferry\nPort Albert, IN 70727-1554', 33.50, 7, 2, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 'Ea ea praesentium corrupti consequatur omnis.', 'Aut inventore repellendus est ea. Repudiandae sequi quasi omnis harum tempora. Excepturi saepe maiores eum eos corrupti.', '890 Christiansen Circle Apt. 192\nChristyhaven, AK 26302-7442', 28.17, 2, 2, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 'Minima qui id ea magni ipsam ut omnis.', 'Possimus deleniti quis voluptas corporis consequatur in voluptatem sint. Est explicabo et suscipit ab perferendis cupiditate. Nobis porro et aliquam hic perspiciatis.', '58154 Destinee Squares\nVincenzatown, NJ 11082', 18.75, 2, 2, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(6, 'Quo id aliquam explicabo possimus vitae at.', 'Exercitationem perspiciatis deleniti eius quibusdam omnis. Dolor voluptas dolores voluptas voluptas nobis aperiam. Et voluptates dolor voluptatibus non ut a voluptate.', '6612 Ondricka Knolls Suite 666\nLake Adan, NM 04736-6361', 18.45, 4, 3, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(7, 'Sequi iste nostrum repellat quae.', 'Laborum eum et repudiandae sit similique expedita. Deleniti eaque est corrupti in sit nisi provident dolores. Neque quia sed et rerum suscipit.', '19602 Greenholt Stream\nFreddiehaven, AZ 27756-8538', 19.40, 8, 4, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(8, 'Voluptates eius et culpa accusantium nam qui explicabo.', 'Numquam repudiandae molestiae quia sequi illo alias. Sapiente sit maiores rem aperiam ut necessitatibus et. A officiis est odit voluptas perspiciatis. Et quo dolorem nobis.', '898 O\'Connell Meadow\nEast Vicentechester, NE 46917-2480', 21.29, 1, 3, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(9, 'Eaque atque vel non ut illum eveniet ut non.', 'Tempore minus tenetur voluptatem iure et impedit. Possimus in quam error praesentium sint facilis aut. Illum eligendi sed voluptatibus rerum eaque.', '69049 Stamm Meadow Suite 507\nShaniaside, MN 72319', 29.39, 3, 3, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(10, 'Quidem nulla rem excepturi qui consectetur.', 'Similique et non et et. Enim sit cupiditate aspernatur rerum non eum exercitationem. Est quaerat consequuntur qui ut non.', '26506 Justine Lake\nTevinfort, DC 92348', 23.64, 7, 4, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(11, 'Quia in quaerat quo dolores ullam at reprehenderit aut.', 'Maxime pariatur excepturi repudiandae explicabo sint. Esse repellendus reiciendis dolor id rem aliquid. Ipsa voluptatem ut eos quia. Suscipit eveniet nihil et iste quia.', '56200 Elissa Burg Suite 407\nPredovicmouth, KS 40391', 28.99, 6, 5, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(12, 'Fugit explicabo earum tempora voluptatum.', 'Maxime ex eos omnis nihil. Quia tenetur veniam ea aut. Culpa cupiditate accusamus qui eos reprehenderit beatae quia. Quia ut accusantium occaecati et porro dolorem natus.', '411 Esteban Avenue Apt. 924\nNoraville, NE 12420-4734', 20.78, 6, 1, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(13, 'Non vel eveniet sed autem.', 'Unde nulla corrupti praesentium. Corrupti eligendi blanditiis dolor asperiores omnis nihil.', '839 Dario Overpass\nNew Cindymouth, DE 97469', 31.55, 4, 2, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(14, 'Quidem expedita autem odio laborum.', 'Modi alias autem nam qui. Cumque repudiandae voluptatibus dicta deleniti suscipit nostrum ut quae. Aliquam sint praesentium porro cupiditate veritatis. Nihil aspernatur et fugit dolorem.', '1049 Schowalter Camp\nPort Hiltonton, VA 83715-3022', 19.47, 2, 5, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(15, 'Vel aspernatur non voluptas itaque.', 'Dolorem deleniti rem tempora. Eos reiciendis magni consequatur quis. Est commodi tempore a aliquid ex et vitae. Commodi ratione fugit laudantium aut.', '1861 Cletus Prairie\nPreciousville, CO 55950-7802', 19.29, 2, 5, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(16, 'Aut modi eum est voluptatum eligendi.', 'Sed quo iusto ut quam. Quo nobis aut facere consequatur. Odit nihil nisi sint voluptas rerum.', '3240 Kunze Shore\nAuguststad, UT 77088', 28.80, 1, 4, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(17, 'Sapiente non blanditiis ipsa veniam iste quia.', 'Tempore necessitatibus similique asperiores ratione itaque omnis. Sunt a blanditiis eveniet sapiente deserunt quam maxime.', '57700 Hammes Manors\nRobertshaven, CT 89442-3316', 34.31, 2, 4, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(18, 'Voluptas totam ad voluptas optio ab.', 'Assumenda rerum sed quibusdam. Est architecto quia blanditiis iusto sit quo. In modi consequatur officiis ipsa. Cupiditate et doloribus ut ut expedita ad eveniet.', '9923 Rau Highway\nEast Tamaraville, AR 58323-5598', 23.44, 9, 3, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(19, 'Et excepturi quaerat necessitatibus illo eligendi vitae occaecati officia.', 'Nisi animi aperiam et impedit et. Recusandae illum est labore facilis qui quos excepturi ut. Et cupiditate ipsum non animi hic in dolor. Illo autem consectetur et eos ut doloremque fugiat.', '1515 Alicia Causeway\nVandervorttown, DC 37178', 16.32, 8, 5, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(20, 'Dolores qui omnis illum temporibus quia iste cupiditate quae.', 'Sunt odit nisi repellat rerum ducimus. Debitis sit laborum iusto non. Ea voluptatem velit quisquam accusantium earum. Minima a labore quibusdam nostrum delectus eligendi.', '8375 Jedediah Lock\nEast Bridieville, DC 40659-0898', 24.40, 5, 2, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(21, 'Et reiciendis aut expedita ratione temporibus.', 'Impedit doloribus atque ut quia. Ipsa id tempora nihil beatae repudiandae nostrum. Doloremque veniam et delectus natus quia qui veniam nam. Eum quia sed quia unde quod eum.', '981 Stokes Centers Apt. 662\nLake Haleigh, IL 84713', 19.29, 9, 2, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(22, 'Totam cupiditate voluptate nihil qui consequatur fugiat.', 'Quod accusamus exercitationem quia. Voluptatibus dolorem qui ratione. Consequuntur consequatur sit voluptas sed amet esse magnam. Architecto dolore nulla ab non.', '880 Scot Trail\nNoreneberg, TN 71927', 35.00, 1, 4, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(23, 'Nobis reiciendis est nam sequi cumque.', 'Nobis eius animi voluptates est ex harum. Aut ut ut et consectetur perspiciatis et. Voluptatem fugiat expedita magni. Tempora eos ad cumque ratione consequatur.', '120 Lehner Square Suite 956\nSouth Carmela, WI 02930', 28.50, 3, 3, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(24, 'Quos et ullam est consectetur et a.', 'Aut fuga aut blanditiis iusto necessitatibus. Quis ex a repellendus non et suscipit. Corrupti ad aut dolorum rerum sapiente animi veniam.', '721 Lyda Centers Suite 104\nWilkinsonside, VA 40806-5780', 29.31, 3, 5, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(25, 'Consequatur recusandae veritatis voluptas nam eligendi voluptatem.', 'Architecto temporibus dicta assumenda sit magnam a ab. Ullam voluptatem labore voluptas. Fugit corrupti qui repudiandae. Soluta iste magnam et ullam tempore perferendis architecto.', '63882 Funk Mountain Apt. 154\nSouth Groverburgh, VA 51203', 20.01, 3, 4, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(26, 'Accusamus voluptate porro in minima.', 'Qui eos accusantium ab ut voluptas. Perferendis quasi blanditiis qui illum quaerat. Dicta illo aut qui sed. Adipisci quasi temporibus nostrum distinctio ipsum totam esse et.', '30573 Glover Throughway\nErvinberg, MD 69226-5332', 21.64, 9, 3, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(27, 'Omnis ut distinctio dicta.', 'Ipsa qui eveniet ipsum mollitia eum eum possimus impedit. Iusto est rerum iure nostrum aut sed dolor quisquam. Nisi ipsum maiores optio placeat.', '553 Pierre Villages\nLake Jacynthe, UT 42567-9943', 21.56, 2, 2, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(28, 'Ut vitae et tempore similique velit aut voluptatum aperiam.', 'Asperiores et quis dignissimos eligendi optio laborum explicabo. Tenetur distinctio aspernatur debitis quia. Recusandae ut quaerat dolores perspiciatis. Eius tempora quam perspiciatis.', '9228 Pacocha Expressway\nWest Pierre, KS 12729', 17.88, 9, 1, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(29, 'Id magni voluptas fuga quisquam voluptas et.', 'Dolorem suscipit suscipit accusamus nemo aliquam enim. Quod architecto minus ex expedita quo sed et. Expedita quo at qui.', '7245 Effertz Radial\nJanestad, TX 79331', 32.31, 9, 4, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(30, 'Quo cum voluptate cum.', 'Id totam officiis delectus occaecati velit cupiditate facilis. Iste aut sit aut non officiis ipsam. Eius eos autem et placeat. Atque labore laboriosam vitae alias natus qui cupiditate necessitatibus.', '6031 Destiny Squares Suite 196\nEast Eda, AZ 27609', 25.89, 7, 3, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(31, 'Earum quos earum itaque qui.', 'Sit distinctio perferendis quis ullam adipisci modi et sed. Iure in est qui ea voluptatem mollitia dolorem. Iusto quia ab quam vel unde eum sit et.', '692 Johnston Groves\nLemuelmouth, FL 52837-7512', 20.81, 1, 3, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(32, 'Voluptatem earum quam molestiae nostrum id cum eaque.', 'Quis pariatur voluptas in qui. Modi eius magni voluptatem aut minima voluptatibus. Enim veniam id est ipsum voluptate id corrupti nisi. Quidem dolor itaque culpa dolore et et earum illum.', '12351 Toni Spurs\nEmiliaborough, MS 93400-3582', 34.24, 8, 3, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(33, 'Voluptatibus est quidem atque.', 'Est fuga nam consequatur enim. Voluptatem et quia sit magnam ratione. Blanditiis facilis est pariatur et voluptatibus qui.', '49037 Manley Orchard Suite 789\nBrakusview, MA 50849', 32.44, 4, 4, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(34, 'Ipsam in doloremque quia libero quod.', 'Eius et laboriosam aliquam vitae sequi nobis neque dolore. Dicta aperiam et repellendus dolores excepturi magni sapiente. Id facere earum voluptatum. Saepe adipisci aspernatur nesciunt quis.', '499 Adolph Junctions Suite 825\nPort Daynaland, NM 17574-3297', 29.67, 7, 5, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(35, 'Consequatur temporibus temporibus fugiat ratione explicabo sint.', 'Rerum eum illo provident ad voluptatem. Temporibus est voluptatem ut nulla perferendis. Quidem non est et voluptatum. Et qui rerum sequi et error deleniti temporibus.', '69257 Clifford Mountains Apt. 933\nWest Kyleigh, ID 17005', 20.16, 8, 5, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(36, 'Ex ut eaque excepturi quia cumque sunt nulla qui.', 'Reiciendis non qui eos sint et. Non dolorem asperiores consequatur quos aspernatur iusto. Pariatur aut dolorum voluptatibus autem cum esse impedit.', '288 Alexandro Avenue\nSouth Ambertown, AL 61642', 30.68, 1, 4, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(37, 'Omnis voluptas voluptate libero modi aspernatur.', 'Et qui sint voluptatum laboriosam. Rem dicta rerum et et. Beatae aut placeat eos velit.', '57522 Kaylah Mews Suite 359\nSchuppeshire, GA 00388-5325', 21.83, 4, 2, 1, 4, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(38, 'Eum delectus nemo et voluptates iusto.', 'Assumenda voluptas doloremque dolores et modi. Nihil enim cupiditate et dolore omnis qui libero. Totam et aut ipsa magni et.', '53700 Guiseppe Fort\nPort Arlie, OH 11041', 19.35, 6, 4, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(39, 'Rerum aut modi voluptas necessitatibus beatae autem rem.', 'In omnis enim ut asperiores. In pariatur consequuntur adipisci id. Natus qui quas voluptatum atque facilis modi distinctio repellendus.', '296 Huel Key\nArchport, HI 37256', 29.79, 1, 4, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(40, 'Itaque deleniti debitis totam quo.', 'Praesentium quae similique fugit aut deserunt sunt cum. Laboriosam aliquam totam voluptates qui hic quia. Assumenda velit modi atque est. Ipsam ipsum ut et sit laudantium ut eos.', '817 Paula Isle Apt. 205\nPort Ryannmouth, AR 67385', 17.44, 3, 1, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(41, 'Dolorum nam fugit quia aliquid atque.', 'Non quo sint et. Et enim et cupiditate facilis quia dolorum. Consequuntur quasi ipsam dolor. Nisi sapiente omnis facere animi consequatur labore.', '53852 Emmy Heights\nChamplinhaven, NC 76248', 15.97, 5, 5, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(42, 'Omnis ea adipisci tempora non rerum vel consectetur minus.', 'Voluptatem nostrum praesentium est qui rerum. Nesciunt occaecati tenetur non voluptas recusandae cumque inventore. Voluptas quidem nesciunt asperiores rerum aliquid reiciendis eligendi.', '724 Anna Stravenue\nRoweland, LA 35507-9415', 20.27, 1, 1, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(43, 'Et quidem voluptate molestiae et et cum rerum quia.', 'Dolorum magni sint delectus. Ut ratione suscipit similique voluptatem. Repellat expedita quisquam tenetur doloribus quo voluptate. Ipsam animi quia molestiae eaque sunt.', '47201 Goodwin Extensions Suite 954\nWest Trey, CA 41656-3757', 24.51, 3, 4, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(44, 'Quam ut nobis corporis qui deleniti unde.', 'Eos deserunt quos magnam quos porro. Ullam delectus excepturi ipsam ad hic eum. Molestias est facilis autem autem.', '228 Ashlee Park Suite 128\nKihnville, NY 56850-0869', 31.46, 9, 2, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(45, 'Accusamus nobis vitae rerum architecto illum eius.', 'Est veritatis enim explicabo atque nesciunt officia et. Nisi aut esse quaerat inventore reiciendis quo. Provident quis quam minus unde quam.', '9038 Charity Hollow Suite 428\nLake Lexitown, NM 77242', 18.71, 2, 3, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(46, 'Nulla incidunt id ea rerum id.', 'Qui deserunt voluptatibus distinctio ducimus est autem. Eaque autem architecto aut vel voluptas. Velit aut voluptatem saepe culpa.', '11806 Louvenia Mews Apt. 080\nPort Louisa, VT 83210', 30.10, 7, 1, 1, 5, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(47, 'Sed voluptas necessitatibus inventore ut.', 'Est excepturi quod optio. Provident aut debitis dolores sunt et sit error. Modi maxime animi rerum eum repellat est eaque. Voluptatibus non repellat sunt vitae voluptatibus itaque.', '35708 Little Mission Suite 703\nKrajcikstad, IA 10011-4797', 16.24, 4, 1, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(48, 'In aliquam architecto delectus nulla voluptas.', 'Laborum in ea repudiandae iste fugit. Accusantium magni nihil eaque et rerum. Iure qui doloremque placeat cupiditate. Amet aliquid in debitis est qui placeat eum.', '682 Renner Field Apt. 568\nSouth Mable, OK 46928-6305', 24.55, 6, 2, 1, 3, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(49, 'Nihil asperiores vel et deserunt impedit vel distinctio.', 'Alias dolor quia aliquam molestias molestiae qui nisi at. Est rerum officiis sunt. Accusantium repellat odit tempore.', '92457 Herman Mission Apt. 084\nLuthertown, FL 56489', 30.15, 1, 2, 1, 2, '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(50, 'Dolorum quasi illum blanditiis tempora accusantium veniam.', 'Omnis voluptatem nihil mollitia rerum iste enim. Repellendus ut est aut dolorem.', '80193 Darlene Tunnel Suite 762\nPort Pattie, NE 71601-4590', 33.87, 4, 2, 1, 1, '2021-02-27 13:07:25', '2021-02-27 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `id_card`, `phone_number`, `dob`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Karl', 'Mertz', 'pmills', 'ryley90@example.com', '2021-02-27 13:07:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/500x500.png/0055ff?text=users+velit', '292477938', '1995-10-04', 'https://via.placeholder.com/500x500.png/0077ee?text=user+officia', 'h1PhYaPKdE', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(2, 'Braden', 'Jast', 'rudy.reinger', 'randy31@example.net', '2021-02-27 13:07:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/500x500.png/00ee00?text=users+itaque', '706170249', '1989-11-16', 'https://via.placeholder.com/500x500.png/00aa55?text=user+earum', 'TzOOIqgwtB', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(3, 'Kareem', 'Thompson', 'gfarrell', 'nakia41@example.org', '2021-02-27 13:07:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/500x500.png/00bb22?text=users+nam', '457355863', '2006-06-30', 'https://via.placeholder.com/500x500.png/0044aa?text=user+repudiandae', '5bqsSv6bK8', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(4, 'Millie', 'Hauck', 'dudley.hand', 'ruecker.kendrick@example.com', '2021-02-27 13:07:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/500x500.png/00bbff?text=users+et', '170694598', '1993-03-30', 'https://via.placeholder.com/500x500.png/001144?text=user+ullam', 'E9mnZzCDcB', '2021-02-27 13:07:25', '2021-02-27 13:07:25'),
(5, 'Monica', 'Boehm', 'gleason.precious', 'zieme.marquis@example.com', '2021-02-27 13:07:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/500x500.png/00aaee?text=users+at', '659598823', '2008-10-02', 'https://via.placeholder.com/500x500.png/009955?text=user+sed', 'MtHoFPgsyA', '2021-02-27 13:07:25', '2021-02-27 13:07:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_rents`
--
ALTER TABLE `detail_rents`
  ADD CONSTRAINT `detail_rents_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facility_rooms`
--
ALTER TABLE `facility_rooms`
  ADD CONSTRAINT `facility_rooms_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facility_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
