-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-05-31 06:16:02
-- 服务器版本： 8.0.20
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `neo_cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_comments`
--

CREATE TABLE `b_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_id` int DEFAULT '0',
  `b_post_id` int DEFAULT '0',
  `status` int DEFAULT '0',
  `report` int DEFAULT '0',
  `ip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `parent` int DEFAULT '0',
  `parent_reply` int DEFAULT '0',
  `ranking` int DEFAULT '0',
  `language_id` int DEFAULT '0',
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_comments_categories`
--

CREATE TABLE `b_comments_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_languages`
--

CREATE TABLE `b_languages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` int DEFAULT '0',
  `sort` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_logs`
--

CREATE TABLE `b_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_media`
--

CREATE TABLE `b_media` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fix_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `month` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_count` int DEFAULT NULL,
  `b_media_category_id` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_media`
--

INSERT INTO `b_media` (`id`, `title`, `fix_link`, `month`, `size`, `size_count`, `b_media_category_id`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, 'flower1', 'bMedia_20210508_025830.jpg', '2021-05', '378.66 KB', 387749, 1, 1, '2021-05-07 18:58:30', '2021-05-07 18:58:30'),
(2, 'image1', 'bMedia_20210509_052336.jpg', '2021-05', '548.6 KB', 561771, 1, 1, '2021-05-08 21:23:36', '2021-05-08 21:23:36'),
(3, 'image3', 'bMedia_20210509_052512.jpg', '2021-05', '365.03 KB', 373788, 1, 1, '2021-05-08 21:25:12', '2021-05-08 21:25:12');

-- --------------------------------------------------------

--
-- 表的结构 `b_media_categories`
--

CREATE TABLE `b_media_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_media_categories`
--

INSERT INTO `b_media_categories` (`id`, `title`, `sort`, `parent`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, '未分类', 1, 0, 0, '2021-03-01 12:41:38', '2021-03-01 12:41:38'),
(2, '测试媒体分类1', 2, 0, 0, '2021-05-08 21:24:00', '2021-05-08 21:24:14'),
(3, '测试媒体分类2', 4, 0, 0, '2021-05-08 21:24:06', '2021-05-08 21:24:22'),
(4, '测试媒体分类1.1', 3, 2, 0, '2021-05-08 21:24:19', '2021-05-08 21:24:22');

-- --------------------------------------------------------

--
-- 表的结构 `b_menus`
--

CREATE TABLE `b_menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sort` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `b_menus_category_id` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `language_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_menus`
--

INSERT INTO `b_menus` (`id`, `title`, `link`, `icon`, `sort`, `parent`, `b_menus_category_id`, `b_user_id`, `language_id`, `created_at`, `updated_at`) VALUES
(1, '首页', NULL, '', 1, 0, 2, 0, 0, '2021-05-10 21:22:26', '2021-05-10 21:22:26'),
(2, '联系', NULL, '', 2, 0, 2, 0, 0, '2021-05-10 21:22:33', '2021-05-10 21:22:33'),
(3, '关于', NULL, '', 3, 0, 2, 0, 0, '2021-05-10 21:22:37', '2021-05-10 21:22:37'),
(4, '文章', 'null', '', 4, 0, 2, 0, 0, '2021-05-10 21:22:42', '2021-05-10 21:22:49'),
(5, '科技', NULL, '', 5, 4, 2, 0, 0, '2021-05-10 21:22:54', '2021-05-10 21:23:03'),
(6, '宣传', NULL, '', 6, 4, 2, 0, 0, '2021-05-10 21:23:00', '2021-05-10 21:23:03');

-- --------------------------------------------------------

--
-- 表的结构 `b_menus_categories`
--

CREATE TABLE `b_menus_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `location_status` int DEFAULT '0',
  `sort` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_menus_categories`
--

INSERT INTO `b_menus_categories` (`id`, `title`, `location_status`, `sort`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, '未分类', 0, 0, 1, '2021-02-08 10:40:36', '2021-02-08 10:40:36'),
(2, '主菜单', 1, 0, 1, '2021-05-10 21:21:56', '2021-05-10 21:22:05');

-- --------------------------------------------------------

--
-- 表的结构 `b_menus_locations`
--

CREATE TABLE `b_menus_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `b_menu_category_id` int DEFAULT '1',
  `b_user_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_menus_locations`
--

INSERT INTO `b_menus_locations` (`id`, `title`, `sort`, `b_menu_category_id`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, '主菜单', 0, 2, 1, '2021-05-10 21:22:05', '2021-05-10 21:22:05');

-- --------------------------------------------------------

--
-- 表的结构 `b_paragraphs`
--

CREATE TABLE `b_paragraphs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `language_id` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_paragraphs`
--

INSERT INTO `b_paragraphs` (`id`, `title`, `content`, `category`, `language_id`, `created_at`, `updated_at`) VALUES
(1, '', '{\"t1\":\"Neo CMS\",\"t2\":\"Neo CMS\"}', 'json', 1, '2021-03-26 10:05:00', '2021-05-31 05:23:13');

-- --------------------------------------------------------

--
-- 表的结构 `b_permissions`
--

CREATE TABLE `b_permissions` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_permissions`
--

INSERT INTO `b_permissions` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'system', '用户角色权限模块', '2021-02-11 02:17:03', '2021-02-11 02:17:03'),
(2, 'media', '媒体模块', '2021-02-11 02:17:24', '2021-02-11 02:17:24'),
(3, 'setting', '设置模块', '2021-02-11 02:17:43', '2021-02-11 02:17:43'),
(4, 'menu', '通用的菜单模块', '2021-02-11 02:18:01', '2021-02-11 02:18:01');

-- --------------------------------------------------------

--
-- 表的结构 `b_permission_role`
--

CREATE TABLE `b_permission_role` (
  `id` int UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_permission_role`
--

INSERT INTO `b_permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, NULL, NULL),
(6, 1, 2, NULL, NULL),
(7, 1, 3, NULL, NULL),
(8, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `b_posts`
--

CREATE TABLE `b_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `abstract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_show` int DEFAULT '0',
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `structure` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `template` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `public` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `comment` int DEFAULT '1',
  `b_posts_type_id` int DEFAULT '1',
  `b_posts_category_id` int DEFAULT '0',
  `b_posts_tag_id` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `language_id` int DEFAULT '0',
  `view` int DEFAULT '0',
  `ranking` int DEFAULT '0',
  `recycle` int DEFAULT '0',
  `remark` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_posts`
--

INSERT INTO `b_posts` (`id`, `title`, `url`, `abstract`, `content`, `content_show`, `banner`, `image`, `structure`, `template`, `public`, `comment`, `b_posts_type_id`, `b_posts_category_id`, `b_posts_tag_id`, `b_user_id`, `language_id`, `view`, `ranking`, `recycle`, `remark`, `created_at`, `updated_at`) VALUES
(1, '首页', '', '首页内容', '<p>首页内容</p>', 0, '2021-05/bMedia_20210508_025830.jpg', NULL, '{\"text\":\"0\",\"image\":\"0\",\"video\":\"0\",\"slider\":{\"number\":0}}', 'index', 'public', 1, 1, 0, 0, 1, 0, 1, 0, 0, NULL, '2021-05-31 06:14:51', '2021-05-31 06:15:16');

-- --------------------------------------------------------

--
-- 表的结构 `b_posts_categories`
--

CREATE TABLE `b_posts_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `b_posts_type_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_posts_paragraphs`
--

CREATE TABLE `b_posts_paragraphs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `b_post_id` int DEFAULT '0',
  `language_id` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_posts_tags`
--

CREATE TABLE `b_posts_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `b_posts_type_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_posts_types`
--

CREATE TABLE `b_posts_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `b_user_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_posts_types`
--

INSERT INTO `b_posts_types` (`id`, `title`, `sort`, `parent`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, '专题页', 0, 0, 0, '2021-05-28 14:38:38', '2021-05-28 14:38:38'),
(2, '博客', 1, 0, 0, '2021-05-28 14:38:38', '2021-05-28 14:38:38'),
(3, '新闻', 2, 0, 0, '2021-05-28 14:38:38', '2021-05-28 14:38:38'),
(4, '公告', 3, 0, 0, '2021-05-28 14:38:38', '2021-05-28 14:38:38');

-- --------------------------------------------------------

--
-- 表的结构 `b_post_category_relationships`
--

CREATE TABLE `b_post_category_relationships` (
  `id` bigint UNSIGNED NOT NULL,
  `b_post_id` int DEFAULT '0',
  `b_category_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_post_tag_relationships`
--

CREATE TABLE `b_post_tag_relationships` (
  `id` bigint UNSIGNED NOT NULL,
  `b_post_id` int DEFAULT '0',
  `b_tag_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `b_roles`
--

CREATE TABLE `b_roles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_roles`
--

INSERT INTO `b_roles` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '系统管理员', '全局权限', '2021-05-15 00:01:35', '2021-05-15 00:01:35'),
(2, '编辑员', '编辑权限', '2021-05-15 00:01:56', '2021-05-15 00:01:56');

-- --------------------------------------------------------

--
-- 表的结构 `b_role_user`
--

CREATE TABLE `b_role_user` (
  `id` int UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_role_user`
--

INSERT INTO `b_role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `b_settings`
--

CREATE TABLE `b_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_settings`
--

INSERT INTO `b_settings` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'media_upload_box', 0, NULL, '2021-05-31 05:35:18'),
(2, 'show_media_category', 0, NULL, NULL),
(3, 'show_posts_types_box', 0, NULL, '2021-05-15 09:09:01');

-- --------------------------------------------------------

--
-- 表的结构 `b_templates`
--

CREATE TABLE `b_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `b_templates_category` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_templates`
--

INSERT INTO `b_templates` (`id`, `title`, `template`, `structure`, `b_templates_category`, `created_at`, `updated_at`) VALUES
(1, '111', 'template3', '{\"text\":\"3\",\"image\":\"5\",\"video\":\"2\",\"slider\":\"1\"}', 2, '2021-03-23 06:48:48', '2021-03-23 06:48:48'),
(2, '222', 'template1', '{\"text\":\"3\",\"image\":\"3\",\"video\":\"1\",\"slider\":\"1\"}', 1, '2021-03-23 06:49:05', '2021-03-23 06:49:05'),
(3, '333', 'template1', '{\"text\":\"10\",\"image\":\"5\",\"video\":\"2\",\"slider\":\"1\"}', 2, '2021-03-23 06:49:20', '2021-03-23 06:49:20'),
(4, '444', 'template3', '{\"text\":\"3\",\"image\":\"3\",\"video\":\"1\",\"slider\":\"1\"}', 1, '2021-03-23 06:49:33', '2021-03-23 06:49:33'),
(5, '555', 'template5', '{\"text\":\"10\",\"image\":\"3\",\"video\":\"1\",\"slider\":\"1\"}', 2, '2021-03-23 06:49:50', '2021-03-23 06:49:50');

-- --------------------------------------------------------

--
-- 表的结构 `b_templates_categories`
--

CREATE TABLE `b_templates_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_templates_categories`
--

INSERT INTO `b_templates_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '循环页', NULL, NULL),
(2, '专题页', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `b_users`
--

CREATE TABLE `b_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `b_users`
--

INSERT INTO `b_users` (`id`, `name`, `password`, `b_user_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$lSRypPgTkDvqymv61anmv.akf9h.BZpscltOWh6/8m8X96GAm.Nre', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_01_130351_create_b_users_table', 1),
(5, '2020_01_01_130357_create_b_permissions_and_roles_table', 1),
(6, '2020_01_01_130403_create_b_logs_table', 1),
(7, '2020_01_01_130409_create_b_posts_table', 1),
(8, '2020_01_01_130415_create_b_posts_paragraphs_table', 1),
(9, '2020_01_01_130416_create_b_posts_categories_table', 1),
(10, '2020_01_01_130422_create_b_posts_types_table', 1),
(11, '2020_01_01_130428_create_b_posts_tags_table', 1),
(12, '2020_01_01_130434_create_b_pages_table', 1),
(13, '2020_01_01_130438_create_b_pages_paragraphs_table', 1),
(14, '2020_01_01_130440_create_b_media_table', 1),
(15, '2020_01_01_130447_create_b_media_categories_table', 1),
(16, '2021_01_24_132044_create_b_languages_table', 1),
(17, '2021_02_03_131229_create_b_menus_table', 1),
(18, '2021_02_05_093708_create_b_menus_categories_table', 1),
(19, '2021_02_05_093943_create_b_menus_locations_table', 1),
(20, '2021_02_10_181329_create_b_paragraphs_table', 1),
(21, '2021_02_12_105335_create_b_comments_table', 1),
(22, '2021_02_12_111450_create_b_comments_categories_table', 1),
(23, '2021_03_06_123237_create_b_settings_table', 1),
(24, '2021_03_13_172533_create_b_templates_table', 1),
(25, '2021_03_13_173641_create_b_templates_categories_table', 1),
(26, '2021_03_26_070307_create_b_post_category_relationships_table', 1),
(27, '2021_03_26_070717_create_b_post_tag_relationships_table', 1),
(28, '2021_05_12_131052_create_b_comments_replies_table', 2);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `b_comments`
--
ALTER TABLE `b_comments`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_comments_categories`
--
ALTER TABLE `b_comments_categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_languages`
--
ALTER TABLE `b_languages`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_logs`
--
ALTER TABLE `b_logs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_media`
--
ALTER TABLE `b_media`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_media_categories`
--
ALTER TABLE `b_media_categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_menus`
--
ALTER TABLE `b_menus`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_menus_categories`
--
ALTER TABLE `b_menus_categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_menus_locations`
--
ALTER TABLE `b_menus_locations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_paragraphs`
--
ALTER TABLE `b_paragraphs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_permissions`
--
ALTER TABLE `b_permissions`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_permission_role`
--
ALTER TABLE `b_permission_role`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_posts`
--
ALTER TABLE `b_posts`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_posts_categories`
--
ALTER TABLE `b_posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_posts_paragraphs`
--
ALTER TABLE `b_posts_paragraphs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_posts_tags`
--
ALTER TABLE `b_posts_tags`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_posts_types`
--
ALTER TABLE `b_posts_types`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_post_category_relationships`
--
ALTER TABLE `b_post_category_relationships`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_post_tag_relationships`
--
ALTER TABLE `b_post_tag_relationships`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_roles`
--
ALTER TABLE `b_roles`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_role_user`
--
ALTER TABLE `b_role_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_settings`
--
ALTER TABLE `b_settings`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_templates`
--
ALTER TABLE `b_templates`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_templates_categories`
--
ALTER TABLE `b_templates_categories`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `b_users`
--
ALTER TABLE `b_users`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 表的索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `b_comments`
--
ALTER TABLE `b_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- 使用表AUTO_INCREMENT `b_comments_categories`
--
ALTER TABLE `b_comments_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_languages`
--
ALTER TABLE `b_languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_logs`
--
ALTER TABLE `b_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_media`
--
ALTER TABLE `b_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `b_media_categories`
--
ALTER TABLE `b_media_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `b_menus`
--
ALTER TABLE `b_menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `b_menus_categories`
--
ALTER TABLE `b_menus_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `b_menus_locations`
--
ALTER TABLE `b_menus_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `b_paragraphs`
--
ALTER TABLE `b_paragraphs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `b_permissions`
--
ALTER TABLE `b_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `b_permission_role`
--
ALTER TABLE `b_permission_role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `b_posts`
--
ALTER TABLE `b_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `b_posts_categories`
--
ALTER TABLE `b_posts_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_posts_paragraphs`
--
ALTER TABLE `b_posts_paragraphs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_posts_tags`
--
ALTER TABLE `b_posts_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `b_posts_types`
--
ALTER TABLE `b_posts_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `b_post_category_relationships`
--
ALTER TABLE `b_post_category_relationships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 使用表AUTO_INCREMENT `b_post_tag_relationships`
--
ALTER TABLE `b_post_tag_relationships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `b_roles`
--
ALTER TABLE `b_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `b_role_user`
--
ALTER TABLE `b_role_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `b_settings`
--
ALTER TABLE `b_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `b_templates`
--
ALTER TABLE `b_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `b_templates_categories`
--
ALTER TABLE `b_templates_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `b_users`
--
ALTER TABLE `b_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
