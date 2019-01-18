-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2019 年 01 月 18 日 02:23
-- 伺服器版本: 5.7.19-log
-- PHP 版本： 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `demo_testdomain`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin_permissions`
--

CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'system', '用户管理', '2018-12-30 14:37:57', '2018-12-30 14:37:57'),
(2, 'post', '文章', '2018-12-30 14:45:20', '2018-12-30 14:45:20'),
(3, 'plan', '计划', '2018-12-31 09:57:09', '2018-12-31 09:57:09'),
(4, 'setting', '设置', '2018-12-31 10:30:51', '2018-12-31 10:30:51'),
(5, 'logs', '日志记录', '2018-12-31 10:32:28', '2018-12-31 10:32:28');

-- --------------------------------------------------------

--
-- 資料表結構 `admin_permission_role`
--

CREATE TABLE IF NOT EXISTS `admin_permission_role` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `admin_roles`
--

CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `admin_role_user` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
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

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- 資料表結構 `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `logs`
--

INSERT INTO `logs` (`id`, `title`, `content`, `category`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:07:41', '2019-01-06 23:07:41'),
(2, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:07:47', '2019-01-06 23:07:47'),
(3, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:07:51', '2019-01-06 23:07:51'),
(4, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:09:53', '2019-01-06 23:09:53'),
(5, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:09:59', '2019-01-06 23:09:59'),
(6, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:13:04', '2019-01-06 23:13:04'),
(7, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:13:20', '2019-01-06 23:13:20'),
(8, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:13:40', '2019-01-06 23:13:40'),
(9, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:14:38', '2019-01-06 23:14:38'),
(10, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:17:52', '2019-01-06 23:17:52'),
(11, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:19:25', '2019-01-06 23:19:25'),
(12, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:19:56', '2019-01-06 23:19:56'),
(13, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:20:09', '2019-01-06 23:20:09'),
(14, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:23:04', '2019-01-06 23:23:04'),
(15, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:29:41', '2019-01-06 23:29:41'),
(16, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-06 23:29:52', '2019-01-06 23:29:52'),
(17, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 00:32:32', '2019-01-07 00:32:32'),
(18, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:21:38', '2019-01-07 01:21:38'),
(19, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:21:51', '2019-01-07 01:21:51'),
(20, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:22:03', '2019-01-07 01:22:03'),
(21, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:22:37', '2019-01-07 01:22:37'),
(22, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:22:43', '2019-01-07 01:22:43'),
(23, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:31:00', '2019-01-07 01:31:00'),
(24, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 01:49:57', '2019-01-07 01:49:57'),
(25, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 05:02:51', '2019-01-07 05:02:51'),
(26, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 21:02:26', '2019-01-07 21:02:26'),
(27, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 21:03:13', '2019-01-07 21:03:13'),
(28, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 21:03:24', '2019-01-07 21:03:24'),
(29, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-07 21:03:31', '2019-01-07 21:03:31'),
(30, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-16 04:03:37', '2019-01-16 04:03:37'),
(31, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-16 04:05:20', '2019-01-16 04:05:20'),
(32, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-17 13:39:20', '2019-01-17 13:39:20'),
(33, 'test1', 'Logout suceesfully', 'Login_logout', '000.000.000.000', '2019-01-17 13:39:36', '2019-01-17 13:39:36'),
(34, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-17 13:42:48', '2019-01-17 13:42:48'),
(35, 'test1', 'Login suceesfully', 'Login_logout', '000.000.000.000', '2019-01-17 18:21:55', '2019-01-17 18:21:55');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_14_193515_create_admin_users_table', 2),
(4, '2018_10_28_172213_create_posts_table', 3),
(5, '2018_12_25_004343_create_plans_table', 4),
(7, '2018_12_26_161833_create_documents_table', 5),
(8, '2018_12_30_170545_create_permission_and_roles', 5),
(15, '2018_12_31_182508_create_logs_table', 6);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recycle` int(10) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `recycle`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'post - test 1', '<p>post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1post - test 1</p>', 1, 0, '2019-01-06 23:08:50', '2019-01-06 23:08:50'),
(13, 'post - test 2', '<p>post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2post - test 2</p>', 1, 0, '2019-01-06 23:08:59', '2019-01-06 23:08:59'),
(14, 'post - test 3', '<p>post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3post - test 3</p>', 1, 0, '2019-01-06 23:09:08', '2019-01-06 23:09:08');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin_permission_role`
--
ALTER TABLE `admin_permission_role`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin_role_user`
--
ALTER TABLE `admin_role_user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `admin_permission_role`
--
ALTER TABLE `admin_permission_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `admin_role_user`
--
ALTER TABLE `admin_role_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- 使用資料表 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
