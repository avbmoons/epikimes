-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.44 - MySQL Community Server - GPL
-- Операционная система:         Linux
-- HeidiSQL Версия:              12.15.0.7171
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных epikimes
CREATE DATABASE IF NOT EXISTS `epikimes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `epikimes`;

-- Дамп структуры для таблица epikimes.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','active','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.categories: ~3 rows (приблизительно)
INSERT INTO `categories` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Epic', 'some epics themes', 'active', '2026-10-10 21:07:26', '2026-10-10 21:07:28'),
	(2, 'Other', 'other themes', 'draft', '2026-10-10 21:07:33', '2026-10-10 21:07:36'),
	(3, 'test category test', 'test category description\r\nedit edit', 'draft', '2026-10-12 11:36:15', '2026-10-12 12:55:58');

-- Дамп структуры для таблица epikimes.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.colors: ~0 rows (приблизительно)
INSERT INTO `colors` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'grey', 'HEX #837E7B; \r\n rgb(131, 126, 123)', '2026-10-10 21:07:56', '2026-10-12 14:26:42'),
	(2, 'grey dark', 'HEX #453B3A;  rgb(69, 59, 58)', '2026-10-10 21:08:04', '2026-10-12 14:27:47'),
	(3, 'brown', 'HEX #5A0402;  rgb(90, 4, 2)', '2026-10-10 21:08:12', '2026-10-12 14:28:18'),
	(4, 'green', 'HEX #30522F;  rgb(48, 82, 47)', '2026-10-10 21:08:20', '2026-10-12 15:20:03'),
	(5, 'blue', 'HEX #295173; rgb(41, 81, 115)', '2026-10-10 21:08:26', '2026-10-12 15:20:38'),
	(6, 'blue light', 'HEX #3D70AF; rgb(61, 112, 175)', '2026-10-10 21:08:30', '2026-10-12 15:22:15'),
	(7, 'black', 'HEX #000000; rgb(0, 0, 0)', '2026-10-10 21:08:33', '2026-10-12 15:30:37'),
	(8, 'red', 'HEX #c0271e;  //rgb(192, 39, 30)', '2026-10-10 21:08:36', '2026-10-12 15:31:11'),
	(9, 'violet', 'HEX #ee82ee, rgb(238, 130, 238)', '2026-10-11 14:48:07', '2026-10-12 15:33:43'),
	(10, 'orange', 'HEX #EF9C33; rgb(239, 156, 51)', '2026-10-11 14:48:31', '2026-10-12 15:34:20'),
	(11, 'yellow', 'HEX #F9E352; rgb(249, 227, 82)', '2026-10-11 14:48:52', '2026-10-12 15:35:02'),
	(12, 'test color', 'HEX #eeeaaa color test', '2026-10-12 14:23:06', '2026-10-12 14:25:01');

-- Дамп структуры для таблица epikimes.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.failed_jobs: ~0 rows (приблизительно)

-- Дамп структуры для таблица epikimes.item_has_colors
CREATE TABLE IF NOT EXISTS `item_has_colors` (
  `item_id` bigint unsigned NOT NULL,
  `color_id` bigint unsigned NOT NULL,
  KEY `item_has_colors_item_id_foreign` (`item_id`),
  KEY `item_has_colors_color_id_foreign` (`color_id`),
  CONSTRAINT `item_has_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_has_colors_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.item_has_colors: ~0 rows (приблизительно)
INSERT INTO `item_has_colors` (`item_id`, `color_id`) VALUES
	(1, 3),
	(2, 1),
	(3, 2),
	(3, 8),
	(4, 5),
	(5, 3),
	(6, 1),
	(7, 4),
	(8, 2),
	(9, 7),
	(10, 3),
	(11, 5),
	(12, 2),
	(13, 7),
	(14, 2),
	(15, 6),
	(16, 1),
	(17, 5),
	(17, 8),
	(1, 3),
	(2, 1),
	(3, 2),
	(3, 8),
	(4, 5),
	(5, 3),
	(6, 1),
	(7, 4),
	(8, 2),
	(9, 7),
	(10, 3),
	(11, 5),
	(12, 2),
	(13, 7),
	(14, 2),
	(15, 6),
	(16, 1),
	(17, 5),
	(17, 8);

-- Дамп структуры для таблица epikimes.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `palette` enum('monochrome','multicolor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` smallint unsigned NOT NULL,
  `file_path` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('draft','active','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.items: ~0 rows (приблизительно)
INSERT INTO `items` (`id`, `title`, `description`, `palette`, `size`, `year`, `file_path`, `category_id`, `is_new`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Ulfhedinn', 'The epic character Ulfhedinn', 'monochrome', '21x14 cm', 2026, 'item-1.png', 1, 1, 'active', '2026-10-10 13:59:30', '2026-10-10 13:59:32'),
	(2, 'Odinn', 'The epic character Odinn', 'monochrome', '15x21 cm', 2026, 'item-2.png', 1, 1, 'active', '2026-10-10 13:59:34', '2026-10-10 13:59:35'),
	(3, 'Fenrir', 'The epic character Fenrir', 'multicolor', '19x14 cm', 2026, 'item-3.png', 1, 0, 'active', '2026-10-10 13:59:37', '2026-10-10 13:59:38'),
	(4, 'Odinn', 'The epic character Odinn', 'monochrome', '15x21 cm', 2026, 'item-4.png', 1, 0, 'active', '2026-10-10 13:59:40', '2026-10-10 13:59:42'),
	(5, 'Odinn', 'The epic character Odinn', 'monochrome', '15x21 cm', 2024, 'item-5.png', 1, 0, 'active', '2026-10-10 13:59:43', '2026-10-10 13:59:45'),
	(6, 'Drengir', 'The epic character Drengir', 'monochrome', '15x21 cm', 2026, 'item-6.png', 1, 1, 'active', '2026-10-10 13:59:46', '2026-10-10 13:59:47'),
	(7, 'Dragon', 'The epic character Dragon', 'monochrome', '29x21 cm', 2026, 'item-7.png', 1, 0, 'active', '2026-10-10 13:59:48', '2026-10-10 13:59:50'),
	(8, 'Drengir', 'The epic character Drengir', 'monochrome', '29x14 cm', 2024, 'item-8.png', 1, 0, 'active', '2026-10-10 13:59:13', '2026-10-10 13:59:51'),
	(9, 'Fenrir', 'The epic character Fenrir', 'monochrome', '29x 21 cm', 2024, 'item-9.png', 1, 0, 'active', '2026-10-10 14:01:54', '2026-10-10 14:01:58'),
	(10, 'Ulfhedinn', 'The epic character Ulfhedinn', 'monochrome', '18x13 cm', 2024, 'item-10.png', 1, 0, 'active', '2026-10-10 14:03:55', '2026-10-10 14:03:57'),
	(11, 'Huginn & Muninn', 'The epic character Huginn and Muninn', 'monochrome', '29x21 cm', 2026, 'item-11.png', 1, 1, 'active', '2026-10-10 14:06:28', '2026-10-10 14:06:30'),
	(12, 'Odinn', 'The epic character Odinn', 'monochrome', '21x29 cm', 2024, 'item-12.png', 1, 0, 'active', '2026-10-10 14:07:32', '2026-10-10 14:07:34'),
	(13, 'Birds', 'The epic character Birds', 'monochrome', '15x21 cm', 2026, 'item-13.png', 1, 0, 'active', '2026-10-10 14:09:44', '2026-10-10 14:09:45'),
	(14, 'Elf', 'The character Elf', 'monochrome', '14x10 cm', 2025, 'item-14.png', 2, 0, 'active', '2026-10-10 14:12:22', '2026-10-10 14:12:24'),
	(15, 'Huginn & Muninn', 'The epic character Huginn and Muninn', 'monochrome', '21x15 cm', 2024, 'item-15.png', 1, 0, 'draft', '2026-10-10 14:38:30', '2026-10-10 14:38:32'),
	(16, 'test image', 'test image', 'monochrome', '15x21 cm', 2026, 'Dragon+_29x21_grey_0001.png', 3, 1, 'draft', '2026-10-13 14:18:37', '2026-10-17 11:21:37'),
	(17, 'test 2', 'test 2', 'multicolor', '21x15', 2025, 'Birds_21x15_blue_0001.png', 3, 1, 'draft', '2026-10-13 14:40:02', '2026-10-17 11:18:43');

-- Дамп структуры для таблица epikimes.mails
CREATE TABLE IF NOT EXISTS `mails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','active','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.mails: ~0 rows (приблизительно)
INSERT INTO `mails` (`id`, `user_id`, `username`, `email`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'avbmoons', 'avb_2@mail.ru', 'test text\r\nhere', 'active', '2026-10-19 12:30:20', '2026-10-19 12:30:20'),
	(2, 1, 'avbmoons', 'avb_2@mail.ru', 'another test \r\ntext\r\nhere', 'active', '2026-10-19 12:31:02', '2026-10-19 12:31:03'),
	(3, 1, 'avbmoons', 'avb_2@mail.ru', 'the new\r\ntest\r\ntext\r\nhere', 'active', '2026-10-19 12:35:34', '2026-10-19 12:35:34'),
	(4, 1, 'avbmoons', 'avb_2@mail.ru', 'other test\r\ntext\r\nhere', 'active', '2026-10-19 12:37:46', '2026-10-19 12:37:46'),
	(5, 1, 'avbmoons', 'avb_2@mail.ru', 'other\r\nother\r\ntest\r\ntext', 'close', '2026-10-19 12:41:46', '2026-10-19 13:57:26');

-- Дамп структуры для таблица epikimes.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.migrations: ~0 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2026_10_09_143040_create_categories_table', 1),
	(7, '2026_10_09_143226_create_items_table', 1),
	(8, '2026_10_09_143309_create_colors_table', 1),
	(9, '2026_10_10_111804_item_has_colors', 1),
	(10, '2026_10_15_162303_create_page_elements_table', 1),
	(11, '2026_10_15_181601_change_title_in_page_elements_table', 1),
	(12, '2026_10_18_120657_add_is_admin_column_to_users_table', 1),
	(13, '2026_10_18_121937_add_last_login_at_column_to_users_table', 1),
	(14, '2026_10_19_110042_create_mails_table', 1),
	(15, '2026_10_19_162921_create_notifications_table', 1);

-- Дамп структуры для таблица epikimes.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.notifications: ~16 rows (приблизительно)
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('0cad2ff7-f9d9-4259-9e9c-a0f10bdecc98', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 4, '{"title":"new template","message":"new template message"}', NULL, '2026-10-20 19:19:33', '2026-10-20 19:19:33'),
	('1ea72265-f27f-4a2b-8fd6-5a96fc35f9c1', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 3, '{"title":"Administrator\'s newslettertest subject all users","message":"The system message has been sent to the user"}', NULL, '2026-10-20 12:42:17', '2026-10-20 12:42:17'),
	('59ee5e8b-0dc1-4885-89c4-173dd234a9fa', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 3, '{"title":"test real subject","message":"test real message"}', NULL, '2026-10-20 12:51:03', '2026-10-20 12:51:03'),
	('5e5cf0cc-812e-49f4-b254-ea3d41e4282c', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 1, '{"title":"new template","message":"new template message"}', NULL, '2026-10-20 19:19:33', '2026-10-20 19:19:33'),
	('663e31e1-b3c9-4c67-a2e9-f55861845444', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 3, '{"title":"Administrator\'s newslettertest subject for 3 users","message":"The system message has baan sent to the user"}', NULL, '2026-10-20 12:37:56', '2026-10-20 12:37:56'),
	('68f5bfae-a0c1-4805-a36b-d3fc23f5a8c3', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 2, '{"title":"Administrator\'s newslettertest subject all users","message":"The system message has been sent to the user"}', NULL, '2026-10-20 12:42:17', '2026-10-20 12:42:17'),
	('70c83493-3c80-45fa-8beb-63e89049c061', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 3, '{"title":"test 2","message":"test 2 message"}', NULL, '2026-10-20 16:29:58', '2026-10-20 16:29:58'),
	('832b55a0-4670-460e-8511-ca764cce360f', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 3, '{"title":"new template","message":"new template message"}', NULL, '2026-10-20 19:19:33', '2026-10-20 19:19:33'),
	('906b56b0-3be4-4080-bd8e-07c2155aaffb', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 1, '{"title":"Administrator\'s newslettertest subject all users","message":"The system message has been sent to the user"}', NULL, '2026-10-20 12:42:17', '2026-10-20 12:42:17'),
	('92e684bb-9ab3-48d5-9c67-f7d76c0b7853', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 4, '{"title":"Administrator\'s newslettertest subject all users","message":"The system message has been sent to the user"}', NULL, '2026-10-20 12:42:17', '2026-10-20 12:42:17'),
	('bc204ec7-d051-4c74-8eb7-3a6bd2552198', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 5, '{"title":"new template","message":"new template message"}', NULL, '2026-10-20 19:19:33', '2026-10-20 19:19:33'),
	('e38ec8fe-8ee3-4eff-a60e-4ed28a7722c3', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 4, '{"title":"test 2","message":"test 2 message"}', NULL, '2026-10-20 16:29:59', '2026-10-20 16:29:59'),
	('e632edd1-f6ab-47c4-859e-c87b7a56ddf5', 'App\\Notifications\\WelcomeNotification', 'App\\Models\\User', 4, '{"subject":"Welcome to MyHobbyArts!","message":"UserVanya-testregister.","user_id":4}', NULL, '2026-10-19 16:37:37', '2026-10-19 16:37:37'),
	('e82ddfbe-a8c6-4643-b7ce-eec0279c3c16', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 2, '{"title":"Administrator\'s newslettertest subject for 3 users","message":"The system message has baan sent to the user"}', NULL, '2026-10-20 12:37:56', '2026-10-20 12:37:56'),
	('ee3a9a32-9386-4f19-9cce-5d3263bf128d', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 2, '{"title":"new template","message":"new template message"}', NULL, '2026-10-20 19:19:33', '2026-10-20 19:19:33'),
	('fcfb35e2-199b-4af6-848b-ad81790d7797', 'App\\Notifications\\AdminBroadcastNotification', 'App\\Models\\User', 5, '{"title":"test 2","message":"test 2 message"}', NULL, '2026-10-20 16:29:59', '2026-10-20 16:29:59');

-- Дамп структуры для таблица epikimes.page_elements
CREATE TABLE IF NOT EXISTS `page_elements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_elements_page_element_key_unique` (`page`,`element_key`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.page_elements: ~0 rows (приблизительно)
INSERT INTO `page_elements` (`id`, `page`, `element_key`, `title`, `image_path`, `color`, `is_visible`, `created_at`, `updated_at`) VALUES
	(1, 'home', 'title_link_catalog', 'All arts catalog', NULL, '#5A0402', 1, '2026-10-15 20:36:33', '2026-10-15 20:36:34'),
	(2, 'home', 'welcome_text', 'Greetings, dear frends! \r\nCome share the inspiration sparkles\r\nand take a look at my arts.', NULL, '#453B3A', 1, '2026-10-15 20:39:44', '2026-10-15 20:39:45'),
	(3, 'home', 'collage_img', NULL, 'collage.png', '#000000', 1, '2026-10-15 20:44:15', '2026-10-16 17:19:23'),
	(4, 'home', 'title_news', 'New arts', NULL, '#5A0402', 1, '2026-10-15 20:46:39', '2026-10-15 20:46:40'),
	(5, 'catalog', 'title_catalog', 'Arts catalog', NULL, '#5A0402', 1, '2026-10-15 20:49:13', '2026-10-15 20:49:14'),
	(6, 'about', 'left_top_img', NULL, 'left-top.png', '#000000', 1, '2026-10-15 20:53:08', '2026-10-15 20:53:08'),
	(7, 'about', 'right_bottom_img', NULL, 'right-bottom.png', '#000000', 1, '2026-10-15 20:54:32', '2026-10-15 20:54:33'),
	(8, 'about', 'title_top', 'About My Arts', NULL, '#5A0402', 1, '2026-10-15 20:57:58', '2026-10-15 20:57:59'),
	(9, 'about', 'title_bottom', 'About Me', NULL, '#5A0402', 1, '2026-10-15 20:58:49', '2026-10-16 15:23:11'),
	(10, 'about', 'text_top', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta maxime voluptatum possimus, sunt eveniet atque ipsam saepe. \r\nAut autem hic ea harum, sint vel repellendus necessitatibus sequi accusamus consequatur, ut alias est ipsam rerum qui cupiditate fuga reprehenderit dolor voluptas molestiae laborum? Nostrum, error ipsa a expedita cum ullam dignissimos corporis deserunt,\r\nsuscipit deleniti rem optio sapiente reiciendis incidunt sed natus laborum. Quod consequatur cum neque dolorem eos magni distinctio est eveniet cumque, soluta repellendus. \r\nNam dolorum itaque rem ipsa.', NULL, '#453B3A', 1, '2026-10-15 21:01:54', '2026-10-15 21:01:54'),
	(11, 'about', 'text_bottom', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. \r\nQuidem rem quasi fugit nam! Officiis itaque adipisci natus reprehenderit corporis ad debitis necessitatibus quibusdam nisi? Quae, iusto. \r\nModi officia nemo obcaecati qui optio tempore rem sed dignissimos id suscipit eius quaerat quia pariatur quisquam, itaque iste autem atque ullam excepturi vero tenetur. \r\nFacere quibusdam quam architecto quidem est sunt nisi. Commodi alias ad iste. Accusamus incidunt quidem eveniet, cum autem mollitia!', NULL, '#453B3A', 1, '2026-10-15 21:05:47', '2026-10-15 21:05:47'),
	(12, 'header', 'title_site', 'My Hobby Arts', NULL, '#5A0402', 1, '2026-10-15 21:24:10', '2026-10-15 21:24:10'),
	(13, 'footer', 'copyrights_owner', 'Pavel Alfimov', NULL, '#453B3A', 1, '2026-10-15 21:29:51', '2026-10-15 21:29:52'),
	(14, 'footer', 'copyrights_years', '2026', NULL, '#453B3A', 1, '2026-10-15 21:30:38', '2026-10-15 21:30:38'),
	(15, 'footer', 'signature_img', NULL, 'signature.png', '#000000', 1, '2026-10-15 21:31:57', '2026-10-15 21:31:58');

-- Дамп структуры для таблица epikimes.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.password_reset_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица epikimes.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.personal_access_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица epikimes.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `is_admin` enum('guest','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы epikimes.users: ~0 rows (приблизительно)
INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `last_login_at`) VALUES
	(1, 'admin', 'avbmoons', 'avb_2@mail.ru', NULL, '$2y$10$8sEopIzZLtoFW1uiKHgkyedk8laI6sR7Hw44d9piniQ2XTX8vOPxC', NULL, NULL, NULL, 'rPgtEm6AG7hrHn6CJS0dJqxh2dhs2T8WFo9JsJBoSuJ9SbdFCwgnDngV0qzg', '2026-10-18 13:50:10', '2026-10-19 12:16:12', '2026-10-19 12:16:12'),
	(2, 'guest', 'Vasya-test', 'vasya.test@test.co', NULL, '$2y$10$2vVSIJsibT7Towfi58mnAOsFPTyKO9aGusEjHQjThM36ToHrZLWYW', NULL, NULL, NULL, NULL, '2026-10-19 16:09:03', '2026-10-19 16:09:04', '2026-10-19 16:09:04'),
	(3, 'guest', 'Manya', 'manya.test@test.co', NULL, '$2y$10$cMGsnLUeYs9DZuRBuhjMrec8SdZSEtxZw0ptVAgNrGXsgtSuAcr3W', NULL, NULL, NULL, NULL, '2026-10-19 16:17:50', '2026-10-19 16:17:51', '2026-10-19 16:17:51'),
	(4, 'guest', 'Vanya-test', 'vanya.test@test.co', NULL, '$2y$10$4bBTt4/KN1JR66DmQDgb1O7HCDcl4uGR6xns2a0rHyB7rBTJ.GFn2', NULL, NULL, NULL, NULL, '2026-10-19 16:37:35', '2026-10-19 16:37:37', '2026-10-19 16:37:37'),
	(5, 'guest', 'Kolya-test', 'kolya.test@test.co', NULL, '$2y$10$nVhvMyJ.FSZowmQK00CN9.p.t.nTcnhe5.HU4QDDlcVCg6ruNPD2i', NULL, NULL, NULL, NULL, '2026-10-20 11:34:56', '2026-10-20 11:34:58', '2026-10-20 11:34:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
