-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-01-27 19:16:40
-- 伺服器版本: 5.7.21
-- PHP 版本： 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `haoyuan`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'system', '用户管理', '2018-12-30 14:37:57', '2018-12-30 14:37:57'),
(2, 'post', '文章', '2018-12-30 14:45:20', '2018-12-30 14:45:20'),
(3, 'plan', '计划', '2018-12-31 09:57:09', '2018-12-31 09:57:09'),
(4, 'setting', '设置', '2018-12-31 10:30:51', '2018-12-31 10:30:51'),
(5, 'logs', '日志记录', '2018-12-31 10:32:28', '2018-12-31 10:32:28'),
(6, 'statistics', '统计', '2019-01-03 15:00:53', '2019-01-03 15:00:53'),
(7, 'schedule', '日程', '2019-01-03 15:24:28', '2019-01-03 15:24:28'),
(8, 'category', '分类', '2019-01-05 13:13:28', '2019-01-05 13:13:28'),
(9, 'api', '接口', '2019-01-05 13:36:41', '2019-01-05 13:36:41'),
(10, 'media', '媒体', '2019-01-05 13:46:18', '2019-01-05 13:46:18'),
(11, 'page', '页面', '2019-01-14 14:04:44', '2019-01-14 14:04:44');

-- --------------------------------------------------------

--
-- 資料表結構 `admin_permission_role`
--

DROP TABLE IF EXISTS `admin_permission_role`;
CREATE TABLE IF NOT EXISTS `admin_permission_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_permission_role`
--

INSERT INTO `admin_permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(7, 4, 1, NULL, NULL),
(6, 5, 1, NULL, NULL),
(8, 4, 2, NULL, NULL),
(17, 10, 1, NULL, NULL),
(15, 11, 1, NULL, NULL),
(18, 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '管理员', '系统管理员', '2018-12-30 15:03:16', '2018-12-30 15:03:16'),
(2, '编辑员', '编辑员', '2018-12-30 15:04:54', '2018-12-30 15:04:54'),
(3, '读者', '读者', '2018-12-30 15:05:04', '2018-12-30 15:05:04');

-- --------------------------------------------------------

--
-- 資料表結構 `admin_role_user`
--

DROP TABLE IF EXISTS `admin_role_user`;
CREATE TABLE IF NOT EXISTS `admin_role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_role_user`
--

INSERT INTO `admin_role_user` (`id`, `role_id`, `user_id`) VALUES
(8, 1, 1),
(2, 2, 4),
(3, 1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'test1', '$2y$10$22YQJJRA8BsWxk7xuafRYegtDaOqTug7v.9trsx/4AH6pr6NkLBUi', '2018-10-14 12:19:15', '2019-01-01 14:29:40'),
(4, 'test2', '$2y$10$B3ZYu8e.HQcx3cWmyWLjHuJgYVu415J69fQIwzL.4Cq/DkqflBEF2', '2018-10-14 12:55:52', '2019-01-01 15:14:54'),
(5, 'test3', '$2y$10$hAKq/erNWz9pcq.qngEJdOzM6J325K4NKBzUJz9WBI3wTzH6Dpmh.', '2018-10-14 12:55:55', '2018-10-14 12:55:55');

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `categories`
--

INSERT INTO `categories` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(4, '分类1 -', '分类1 - 测试', '2019-01-24 18:05:41', '2019-01-24 18:05:41');

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `logs`
--

INSERT INTO `logs` (`id`, `title`, `content`, `category`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-01 15:19:48', '2019-01-01 15:19:48'),
(2, 'test2', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-01 15:22:35', '2019-01-01 15:22:35'),
(3, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-01 15:57:16', '2019-01-01 15:57:16'),
(4, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-01 16:20:17', '2019-01-01 16:20:17'),
(5, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-01 16:21:05', '2019-01-01 16:21:05'),
(6, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 13:58:25', '2019-01-03 13:58:25'),
(7, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 14:32:53', '2019-01-03 14:32:53'),
(8, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 15:11:28', '2019-01-03 15:11:28'),
(9, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 15:14:04', '2019-01-03 15:14:04'),
(10, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 15:25:41', '2019-01-03 15:25:41'),
(11, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-03 15:25:42', '2019-01-03 15:25:42'),
(12, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-04 21:29:28', '2019-01-04 21:29:28'),
(13, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-05 12:45:48', '2019-01-05 12:45:48'),
(14, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-05 13:54:56', '2019-01-05 13:54:56'),
(15, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-05 13:54:58', '2019-01-05 13:54:58'),
(16, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-06 09:55:58', '2019-01-06 09:55:58'),
(17, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-06 09:58:00', '2019-01-06 09:58:00'),
(18, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-06 09:58:05', '2019-01-06 09:58:05'),
(19, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-06 09:58:06', '2019-01-06 09:58:06'),
(20, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 00:57:48', '2019-01-07 00:57:48'),
(21, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 01:05:37', '2019-01-07 01:05:37'),
(22, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 01:14:24', '2019-01-07 01:14:24'),
(23, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 01:14:55', '2019-01-07 01:14:55'),
(24, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 01:15:01', '2019-01-07 01:15:01'),
(25, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-07 01:25:16', '2019-01-07 01:25:16'),
(26, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 11:58:11', '2019-01-14 11:58:11'),
(27, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 12:36:26', '2019-01-14 12:36:26'),
(28, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 12:36:27', '2019-01-14 12:36:27'),
(29, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 13:14:58', '2019-01-14 13:14:58'),
(30, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 15:25:30', '2019-01-14 15:25:30'),
(31, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 15:25:34', '2019-01-14 15:25:34'),
(32, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 19:17:34', '2019-01-14 19:17:34'),
(33, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 19:53:36', '2019-01-14 19:53:36'),
(34, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 20:24:35', '2019-01-14 20:24:35'),
(35, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-14 20:41:15', '2019-01-14 20:41:15'),
(36, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-15 15:42:25', '2019-01-15 15:42:25'),
(37, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-16 09:20:15', '2019-01-16 09:20:15'),
(38, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-16 09:50:18', '2019-01-16 09:50:18'),
(39, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-17 10:43:00', '2019-01-17 10:43:00'),
(40, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-17 13:00:11', '2019-01-17 13:00:11'),
(41, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-17 13:00:59', '2019-01-17 13:00:59'),
(42, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-17 13:37:05', '2019-01-17 13:37:05'),
(43, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-19 10:18:46', '2019-01-19 10:18:46'),
(44, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-19 12:18:22', '2019-01-19 12:18:22'),
(45, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-19 12:18:27', '2019-01-19 12:18:27'),
(46, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-19 19:47:13', '2019-01-19 19:47:13'),
(47, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-20 16:10:19', '2019-01-20 16:10:19'),
(48, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 09:12:16', '2019-01-21 09:12:16'),
(49, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 13:23:18', '2019-01-21 13:23:18'),
(50, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:16:39', '2019-01-21 21:16:39'),
(51, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:18:06', '2019-01-21 21:18:06'),
(52, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:18:42', '2019-01-21 21:18:42'),
(53, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:18:44', '2019-01-21 21:18:44'),
(54, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:18:46', '2019-01-21 21:18:46'),
(55, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:18:52', '2019-01-21 21:18:52'),
(56, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:20:31', '2019-01-21 21:20:31'),
(57, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-21 21:23:37', '2019-01-21 21:23:37'),
(58, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-23 11:27:40', '2019-01-23 11:27:40'),
(59, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-23 13:26:46', '2019-01-23 13:26:46'),
(60, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-23 13:26:49', '2019-01-23 13:26:49'),
(61, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-23 17:24:23', '2019-01-23 17:24:23'),
(62, 'test1', 'Logout suceesfully', 'Login_logout', '127.0.0.1', '2019-01-23 17:40:51', '2019-01-23 17:40:51'),
(63, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-24 03:29:26', '2019-01-24 03:29:26'),
(64, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-24 12:30:45', '2019-01-24 12:30:45'),
(65, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-24 16:26:18', '2019-01-24 16:26:18'),
(66, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 12:14:56', '2019-01-25 12:14:56'),
(67, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 13:28:17', '2019-01-25 13:28:17'),
(68, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 13:48:41', '2019-01-25 13:48:41'),
(69, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 13:49:34', '2019-01-25 13:49:34'),
(70, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 13:54:47', '2019-01-25 13:54:47'),
(71, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 15:28:44', '2019-01-25 15:28:44'),
(72, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 17:52:37', '2019-01-25 17:52:37'),
(73, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-25 20:54:12', '2019-01-25 20:54:12'),
(74, 'test1', 'Login suceesfully', 'Login_logout', '127.0.0.1', '2019-01-27 19:12:19', '2019-01-27 19:12:19');

-- --------------------------------------------------------

--
-- 資料表結構 `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci,
  `recycle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_14_193515_create_admin_users_table', 2),
(4, '2018_10_28_172213_create_posts_table', 3),
(5, '2018_12_25_004343_create_plans_table', 4),
(8, '2018_12_30_170545_create_permission_and_roles', 5),
(15, '2018_12_31_182508_create_logs_table', 6),
(17, '2018_12_26_161833_create_pages_table', 7),
(20, '2019_01_21_173233_create_media_table', 8),
(21, '2019_01_24_013329_create_categories_table', 8);

-- --------------------------------------------------------

--
-- 資料表結構 `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ranking` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `recycle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `image`, `ranking`, `recycle`, `user_id`, `view`, `created_at`, `updated_at`) VALUES
(1, '页面1', '<p>页面1页面1页面1页面1页面1</p><p>页面1页面1页面1页面1页面1页面1页面1页面1页面1页面1页面1</p><p><img src=\"http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-19_22-47-14_1547909234.jpg\" alt=\"picture\" style=\"max-width:100%;\"><br></p><p><br></p>', '', '', '1', 0, 0, '2019-01-19 12:57:49', '2019-01-19 14:51:25'),
(3, '页面2', '<p>页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2页面2</p><p><br></p>', '', '', '1', 0, 0, '2019-01-19 14:51:16', '2019-01-19 14:51:16');

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
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
-- 資料表結構 `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `recycle` int(10) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) NOT NULL DEFAULT '0',
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `recycle`, `user_id`, `category_id`, `view`, `created_at`, `updated_at`) VALUES
(1, 'post - test 1', '<p>post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1</p><p><img src=\"http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-22_05-25-47_1548105947.jpg\" alt=\"backend\" style=\"max-width:100%;\"><br></p><p><br></p>', 'http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-22_05-25-47_1548105947.jpg', 1, 0, 0, '0', '2019-01-06 23:08:50', '2019-01-23 13:26:36'),
(2, 'post - test 2', '<p>post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2</p><p><img src=\"http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-46-35_1547916395.jpg\" alt=\"picture\" style=\"max-width:100%;\"><br></p><p><br></p>', 'http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-46-35_1547916395.jpg', 1, 0, 4, '0', '2019-01-06 23:08:59', '2019-01-19 16:46:52'),
(3, 'post - test 3', '<p>post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3</p><p><img src=\"http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-47-46_1547916466.jpg\" alt=\"timg\" style=\"max-width:100%;\"><br></p><p>post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3</p><p><br></p><p>post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3</p><p><img src=\"http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-47-46_1547916466.jpg\" alt=\"timg\"></p><p>post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3</p><p><br></p><p><br></p>', 'http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-47-46_1547916466.jpg', 1, 0, 1, '0', '2019-01-06 23:09:08', '2019-01-19 19:47:27'),
(4, 'post4', '<p>post4 - post4 - post4</p><p><br></p>', 'http://127.0.0.1:8000/storage/images/2019-01/image_2019-01-20_00-47-46_1547916466.jpg', 2, 0, 1, '0', '2019-01-19 16:57:02', '2019-01-19 16:57:18'),
(5, '分类2', '分类2 - 测试', '2019-01/image_2019-01-20_00-46-35_1547916395.jpg', 1, 0, 1, '0', '2019-01-24 17:42:11', '2019-01-25 21:43:08'),
(6, '文章1', '<p>12121212</p>', NULL, 1, 0, 0, '0', '2019-01-24 17:59:47', '2019-01-24 17:59:47');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
