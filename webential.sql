-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2024 at 06:15 AM
-- Server version: 5.7.31
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webential`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Hi', '2024-05-22 01:53:15', '2024-05-22 01:53:15'),
(2, 1, 3, 'Hello', '2024-05-22 01:54:28', '2024-05-22 01:54:28'),
(3, 3, 1, 'I am AS', '2024-05-22 01:54:58', '2024-05-22 01:54:58'),
(4, 1, 3, 'I am S', '2024-05-22 01:55:13', '2024-05-22 01:55:13'),
(5, 3, 1, 'ok', '2024-05-22 04:33:02', '2024-05-22 04:33:02'),
(6, 3, 1, 'How are you ?', '2024-05-22 04:33:18', '2024-05-22 04:33:18'),
(7, 3, 1, 'Hey', '2024-05-22 06:38:17', '2024-05-22 06:38:17'),
(8, 3, 1, 'Ohh', '2024-05-22 06:49:06', '2024-05-22 06:49:06'),
(9, 3, 1, 'Hi', '2024-05-22 08:18:30', '2024-05-22 08:18:30'),
(10, 3, 1, 'ooooo', '2024-05-22 08:26:04', '2024-05-22 08:26:04'),
(11, 3, 1, 'WWW', '2024-05-22 08:54:03', '2024-05-22 08:54:03'),
(12, 3, 1, 'QQQ', '2024-05-22 08:56:53', '2024-05-22 08:56:53'),
(13, 3, 1, 'EEE', '2024-05-22 08:57:36', '2024-05-22 08:57:36'),
(14, 3, 1, 'jjj', '2024-05-22 09:23:07', '2024-05-22 09:23:07'),
(15, 3, 1, 'ppp', '2024-05-22 09:31:20', '2024-05-22 09:31:20'),
(16, 3, 1, 'zzz', '2024-05-22 09:31:57', '2024-05-22 09:31:57'),
(17, 3, 1, 'lll', '2024-05-22 09:36:32', '2024-05-22 09:36:32'),
(18, 3, 1, 'KKK', '2024-05-22 11:11:27', '2024-05-22 11:11:27'),
(19, 1, 3, 'Hey friend', '2024-05-22 12:17:13', '2024-05-22 12:17:13'),
(20, 3, 1, 'Hi bhabandh', '2024-05-22 12:17:39', '2024-05-22 12:17:39'),
(21, 3, 1, 'How are you ?', '2024-05-22 12:17:56', '2024-05-22 12:17:56'),
(22, 1, 3, 'Yes i am fine', '2024-05-22 12:18:05', '2024-05-22 12:18:05'),
(23, 3, 2, 'Hi Sumit Kapuriya', '2024-05-22 12:22:12', '2024-05-22 12:22:12'),
(24, 2, 3, 'Hi AS', '2024-05-22 12:22:25', '2024-05-22 12:22:25'),
(25, 3, 1, 'Nice', '2024-05-22 12:22:47', '2024-05-22 12:22:47'),
(26, 3, 2, 'How are you ?', '2024-05-22 12:35:01', '2024-05-22 12:35:01'),
(27, 2, 3, 'I am good', '2024-05-22 12:35:29', '2024-05-22 12:35:29'),
(28, 2, 3, 'and what about you ?', '2024-05-22 12:35:40', '2024-05-22 12:35:40'),
(29, 3, 2, 'Yes I am also fine', '2024-05-22 12:35:51', '2024-05-22 12:35:51'),
(30, 3, 1, 'are you there ?', '2024-05-22 12:50:21', '2024-05-22 12:50:21'),
(31, 1, 4, 'Hey', '2024-05-22 21:42:51', '2024-05-22 21:42:51'),
(32, 4, 1, 'Hi', '2024-05-22 21:43:20', '2024-05-22 21:43:20'),
(33, 1, 4, 'Good Morning', '2024-05-22 21:43:35', '2024-05-22 21:43:35'),
(34, 4, 1, 'Very Good Morning', '2024-05-22 21:43:44', '2024-05-22 21:43:44'),
(35, 1, 3, 'Yes I am here', '2024-05-22 21:44:14', '2024-05-22 21:44:14'),
(36, 4, 3, 'Hey AS AS', '2024-05-22 23:40:24', '2024-05-22 23:40:24'),
(37, 3, 4, 'Hi John Smith', '2024-05-22 23:40:41', '2024-05-22 23:40:41'),
(38, 3, 4, 'Hope you doing well', '2024-05-22 23:41:47', '2024-05-22 23:41:47'),
(39, 4, 3, 'Yes Bro', '2024-05-22 23:41:55', '2024-05-22 23:41:55'),
(40, 3, 4, 'What is the plan for today ?', '2024-05-23 00:01:11', '2024-05-23 00:01:11'),
(41, 4, 3, 'Yes we will discuss soon for today plan', '2024-05-23 00:01:38', '2024-05-23 00:01:38'),
(42, 4, 3, 'when you available ?', '2024-05-23 00:07:50', '2024-05-23 00:07:50'),
(43, 3, 4, 'after some time i am available, Smith', '2024-05-23 00:08:25', '2024-05-23 00:08:25'),
(44, 4, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-05-23 00:09:12', '2024-05-23 00:09:12'),
(45, 3, 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2024-05-23 00:09:41', '2024-05-23 00:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_16_170545_add_multiple_column_users_table', 1),
(6, '2024_05_22_024740_create_requests_table', 2),
(7, '2024_05_22_071748_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_sender_id_foreign` (`sender_id`),
  KEY `requests_receiver_id_foreign` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'accepted', '2024-05-21 21:38:56', '2024-05-21 22:11:49'),
(2, 1, 3, 'accepted', '2024-05-22 01:53:56', '2024-05-22 11:45:05'),
(3, 2, 3, 'accepted', '2024-05-22 12:21:34', '2024-05-22 12:21:48'),
(4, 4, 1, 'accepted', '2024-05-22 21:38:17', '2024-05-22 21:41:22'),
(5, 4, 3, 'accepted', '2024-05-22 21:49:37', '2024-05-22 23:27:06'),
(6, 2, 4, 'pending', '2024-05-22 23:58:20', '2024-05-22 23:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `phone_no`, `profile_picture`) VALUES
(1, 's', 'sd@gmail.com', NULL, '$2y$10$thKQG1Q6w.yhCHT3xXlss.jHaDYvVv2HoS/iCXe1AM1uWWFlrIn8i', NULL, '2024-05-21 10:25:53', '2024-05-21 10:25:53', 'd', '7744112255', '1716306953.jpg'),
(2, 'sumit', 'sdk@gmail.com', NULL, '$2y$10$SlgPERy63d4LCR8kTotj4esjT8CiASwqIZNmQSvuuUyRL9W2D.NhG', NULL, '2024-05-21 10:27:45', '2024-05-21 10:27:45', 'kapuriya', '7788996655', '1716307065.jpg'),
(3, 'as', 'as@gmail.com', NULL, '$2y$10$VQoloBprpjqt3nqrqGodUOy.5PHsOOvvlzAj.voKSDOSM2VkNJ9AG', NULL, '2024-05-21 10:34:15', '2024-05-21 10:34:15', 'as', '7744558899', '1716307455.png'),
(4, 'John', 'johnsmith@gmail.com', NULL, '$2y$10$8LwHDqT7tvMJGv54kAm64u4YkAP720jTALI93Z5DzOAko.Naq/cW.', NULL, '2024-05-22 21:29:56', '2024-05-22 21:29:56', 'Smith', '7744558899', '1716433195.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
