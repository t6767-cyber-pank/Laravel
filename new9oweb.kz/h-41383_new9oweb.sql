-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 20 2020 г., 05:10
-- Версия сервера: 10.2.26-MariaDB-cll-lve
-- Версия PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `h-41383_new9oweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nextField` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`, `nextField`) VALUES
(1, NULL, 1, 'Что мы можем', 'mimozhem', '2019-11-19 11:03:11', '2019-11-21 06:21:06', 'Все услуги'),
(2, NULL, 2, 'Портфолио', 'portfolio', '2019-11-19 11:03:11', '2019-11-21 22:43:29', 'Все услуги'),
(3, NULL, 3, 'Нам доверяют', 'nam-doveryayut', '2019-11-21 23:19:18', '2019-11-21 23:19:48', 'Все отзывы'),
(4, NULL, 4, 'нам доверяют видео', 'nam-doveryayut-video', '2019-11-21 23:20:31', '2019-11-21 23:20:47', 'Все отзывы'),
(5, NULL, 5, 'Читайте нас', 'chitajte-nas', '2019-11-22 00:52:09', '2019-11-22 01:00:03', 'Все новости'),
(6, 5, 6, 'Кейсы', 'kejsy', '2019-11-22 01:01:00', '2019-11-22 01:01:00', 'Все кейсы'),
(7, 5, 7, 'Новости', 'novosti', '2019-11-22 01:01:26', '2019-11-22 01:01:26', 'Все новости');

-- --------------------------------------------------------

--
-- Структура таблицы `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, '{}', 3),
(32, 5, 'title', 'text', 'Заголовок', 1, 1, 1, 1, 1, 1, '{}', 5),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 7),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '{}', 8),
(35, 5, 'image', 'image', 'Картинка', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 9),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 10),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 11),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 12),
(39, 5, 'status', 'select_dropdown', 'Статус', 1, 1, 1, 1, 1, 1, '{\"default\":\"\\u0427\\u0435\\u0440\\u043d\\u043e\\u0432\\u0438\\u043a\",\"options\":{\"PUBLISHED\":\"\\u041e\\u043f\\u0443\\u0431\\u043b\\u0438\\u043a\\u043e\\u0432\\u0430\\u043d\",\"DRAFT\":\"\\u0427\\u0435\\u0440\\u043d\\u043e\\u0432\\u0438\\u043a\",\"PENDING\":\"\\u041c\\u043e\\u0434\\u0435\\u0440\\u0430\\u0446\\u0438\\u044f\"}}', 6),
(40, 5, 'created_at', 'timestamp', 'Дата', 0, 1, 1, 0, 0, 0, '{}', 13),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 14),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 0, 1, 1, 1, 1, '{}', 15),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 0, 1, 1, 1, 1, '{}', 16),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 1, 0, 0, 0, '{}', 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 4),
(48, 6, 'body', 'rich_text_box', 'Body', 0, 0, 1, 1, 1, 1, '{}', 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '{}', 12),
(56, 4, 'nextField', 'text', 'Дополнительное поле', 0, 1, 1, 1, 1, 1, '{}', 8),
(57, 5, 'nField', 'text', 'Дополнительное поле', 0, 0, 1, 1, 1, 1, '{}', 17),
(58, 5, 'post_belongsto_category_relationship', 'relationship', 'Категория', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(59, 5, 'imageField', 'image', 'Дополнительные картинки', 0, 0, 1, 1, 1, 1, '{}', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-19 11:03:11', '2019-11-21 06:20:41'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-19 11:03:11', '2020-02-19 22:53:08'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-19 11:03:11', '2020-01-07 23:53:34');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(2, 'main', '2019-11-19 11:32:32', '2019-11-19 11:32:32');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2019-11-19 11:03:08', '2019-11-19 11:03:08', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2019-11-19 11:03:08', '2019-11-19 11:03:08', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2019-11-19 11:03:11', '2019-11-19 11:03:11', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2019-11-19 11:03:11', '2019-11-19 11:03:11', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2019-11-19 11:03:11', '2019-11-19 11:03:11', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2019-11-19 11:03:11', '2019-11-19 11:03:11', 'voyager.hooks', NULL),
(15, 2, 'Главная', '/', '_self', NULL, '#000000', NULL, 1, '2019-11-19 11:33:11', '2020-02-19 22:40:38', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2016_01_01_000000_create_pages_table', 2),
(25, '2016_01_01_000000_create_posts_table', 2),
(26, '2016_02_15_204651_create_categories_table', 2),
(27, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Про нас', '<div class=\"entry__title\">Мы - современное прогресивное диджитал агентство полного цикла</div>\r\n                            <div class=\"entry__text\">В процессе разработки наших продуктов мы используем самые современные технологии проектирования, дизайна, программирования и продвижения.</div>', '<div class=\"entry__title\" style=\"box-sizing: border-box; font-size: 1.125rem; padding-bottom: 1.5625rem; color: #222222; font-family: sans-serif;\">Мы - современное прогресивное диджитал агентство полного цикла</div>\n<div class=\"entry__text\" style=\"box-sizing: border-box; color: #383e44; font-family: sans-serif;\">В процессе разработки наших продуктов мы используем самые современные технологии проектирования, дизайна, программирования и продвижения.</div>', 'pages/page1.jpg', 'aboutus', 'О нас', 'Keyword1, Keyword2', 'ACTIVE', '2019-11-19 11:03:11', '2019-11-21 06:09:39'),
(2, 1, 'Почему мы', '<p>\r\n                                    9 O’WEB — агентство digital-маркетинга, продвигающее бренды, товары и услуги в цифровых каналах коммуникации. Мы знаем аудиторию и механизмы взаимодействия с ней, и поэтому отлично решаем бизнес-задачи наших клиентов, начиная со стратегического планирования\r\n                                    и заканчивая продвижением и поддержкой.\r\n                                </p>\r\n                                <p>\r\n                                    Работать с нами, значит, в первую очередь, вовлечься в процесс, ведь мы считаем, что для клиента командная работа с агентством — самая эффективная. В этой связке мы берём на себя генерацию смелых идей и скрупулёзное их развитие, а клиенты — смелость доверять\r\n                                    нашему опыту и решимость выйти за рамки устоявшихся и привычных решений.\r\n                                </p>', '<p>9 O&rsquo;WEB &mdash; агентство digital-маркетинга, продвигающее бренды, товары и услуги в цифровых каналах коммуникации. Мы знаем аудиторию и механизмы взаимодействия с ней, и поэтому отлично решаем бизнес-задачи наших клиентов, начиная со стратегического планирования и заканчивая продвижением и поддержкой.</p>\n<p>Работать с нами, значит, в первую очередь, вовлечься в процесс, ведь мы считаем, что для клиента командная работа с агентством &mdash; самая эффективная. В этой связке мы берём на себя генерацию смелых идей и скрупулёзное их развитие, а клиенты &mdash; смелость доверять нашему опыту и решимость выйти за рамки устоявшихся и привычных решений.</p>', 'pages/November2019/i4bTYxwcc8bFuIj9ZyIV.jpg', 'pochemu-my', 'почему мы', 'мы почему', 'ACTIVE', '2019-11-22 02:28:31', '2019-11-22 02:28:45');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(2, 'browse_bread', NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(3, 'browse_database', NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(4, 'browse_media', NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(5, 'browse_compass', NULL, '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(6, 'browse_menus', 'menus', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(7, 'read_menus', 'menus', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(8, 'edit_menus', 'menus', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(9, 'add_menus', 'menus', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(10, 'delete_menus', 'menus', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(11, 'browse_roles', 'roles', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(12, 'read_roles', 'roles', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(13, 'edit_roles', 'roles', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(14, 'add_roles', 'roles', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(15, 'delete_roles', 'roles', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(16, 'browse_users', 'users', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(17, 'read_users', 'users', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(18, 'edit_users', 'users', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(19, 'add_users', 'users', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(20, 'delete_users', 'users', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(21, 'browse_settings', 'settings', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(22, 'read_settings', 'settings', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(23, 'edit_settings', 'settings', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(24, 'add_settings', 'settings', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(25, 'delete_settings', 'settings', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(26, 'browse_categories', 'categories', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(27, 'read_categories', 'categories', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(28, 'edit_categories', 'categories', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(29, 'add_categories', 'categories', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(30, 'delete_categories', 'categories', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(31, 'browse_posts', 'posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(32, 'read_posts', 'posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(33, 'edit_posts', 'posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(34, 'add_posts', 'posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(35, 'delete_posts', 'posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(36, 'browse_pages', 'pages', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(37, 'read_pages', 'pages', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(38, 'edit_pages', 'pages', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(39, 'add_pages', 'pages', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(40, 'delete_pages', 'pages', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(41, 'browse_hooks', NULL, '2019-11-19 11:03:11', '2019-11-19 11:03:11');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(30, 1),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nField` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageField` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `nField`, `imageField`) VALUES
(1, 1, 1, 'Продвижение сайтов', '', 'saitAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">1234354545Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/pv1hcy43dIP5B8dxkaQj.jpg', 'prodvizhenie-sajtov', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-19 11:03:11', '2019-11-21 06:51:25', NULL, NULL),
(2, 1, 2, '123', '', 'Сайт гос. учреждения', '<p>123</p>', 'posts/November2019/ExsD6OIAFvjNfMyKSIzG.jpg', '123', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-19 11:03:11', '2020-01-05 02:16:10', 'static/img/content/client-logo.png', NULL),
(6, 1, 1, 'Создание сайтов', '', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/pAmbsY1gp47o4iit7az2.jpg', 'sozdanie-sajtov', '', '', 'PUBLISHED', 0, '2019-11-21 06:25:59', '2019-11-21 06:25:59', NULL, NULL),
(7, 1, 1, 'Мобильные приложения', '', 'В процессе разработки наших продуктов мы используем самые современные технологии проектирования, дизайна, программирования и продвижения.', '<p><span style=\"color: #222222; font-family: sans-serif;\">В процессе разработки наших продуктов мы используем самые современные технологии проектирования, дизайна, программирования и продвижения.</span></p>', 'posts/November2019/U2pYvQa35dsOZtLap4F5.jpg', 'mobil-nye-prilozheniya', '', '', 'PUBLISHED', 0, '2019-11-21 06:30:16', '2019-11-21 06:30:16', NULL, NULL),
(8, 1, 1, 'Контекстная реклама', '', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/Q4a0ixBEKx4KQwQkAfb9.jpg', 'kontekstnaya-reklama', '', '', 'PUBLISHED', 0, '2019-11-21 06:31:45', '2019-11-21 06:31:45', NULL, NULL),
(9, 1, 1, 'Таргетированная реклама', '', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/DcDrvbWDo3f15cLexgh7.jpg', 'targetirovannaya-reklama', '', '', 'PUBLISHED', 0, '2019-11-21 06:32:36', '2019-11-21 06:32:36', NULL, NULL),
(10, 1, 1, 'SMM продвижение', '', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/A8fsl5nc5bnqADcsDebs.jpg', 'smm-prodvizhenie', '', '', 'PUBLISHED', 0, '2019-11-21 06:33:27', '2019-11-21 06:33:27', NULL, NULL),
(11, 1, 1, 'Техподдержка', '', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '<p><span style=\"color: #222222; font-family: sans-serif;\">tpAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span></p>', 'posts/November2019/F1OywcJ9qfgqrFj5vqfu.jpg', 'tehpodderzhka', '', '', 'PUBLISHED', 0, '2019-11-21 06:34:00', '2019-11-21 06:46:46', NULL, NULL),
(12, 1, 2, 'mail.ru', '', 'Сайт Организации', '<p>Вечный сервис</p>', 'posts/November2019/RNMRpaMXl4Miz6QV6cpU.jpg', 'mail-ru', '', '', 'PUBLISHED', 0, '2019-11-21 22:49:06', '2020-01-05 02:19:03', 'static/img/content/client-logo.png', NULL),
(13, 1, 2, 'Yandex.ru', '', 'Шпионская система поиска ', '<p>Бля круто мы его написали найдет все и всех.</p>', 'posts/November2019/fG5s493NZz3HwLJXLcMq.jpg', 'yandex-ru', '', '', 'PUBLISHED', 0, '2019-11-21 22:51:05', '2019-11-22 05:05:59', 'static/img/content/client-logo.png', NULL),
(14, 1, 2, 'FaceBook.com', '', 'Зачем мы создали этого монстра', '<p>Пиздатый сайт.&nbsp;</p>', 'posts/November2019/69SsM9Tat9v3iFNypOPY.jpg', 'facebook-com', '', '', 'PUBLISHED', 0, '2019-11-21 22:52:30', '2019-11-22 05:06:16', 'static/img/content/client-logo.png', NULL),
(15, 1, 3, 'Сергей из Талдыкургана', '', 'Хороший чел.', '<p>Очень приятный молодой человек. Ему всего 6 лет а уже нам доверяет.</p>', 'posts/November2019/RxeVarHnsKGQJy1wykAl.jpeg', 'sergej-iz-taldykurgana', '', '', 'PUBLISHED', 0, '2019-11-21 23:45:57', '2019-11-22 05:10:26', NULL, NULL),
(16, 1, 3, 'Маша из Перми', '', 'Она очень добрая', '<p>Хорошая девушка живет и работает в доме для престорелых. Профессия: Бабушка.&nbsp;</p>', 'posts/November2019/a04oj387F31QydNeA1Kk.jpg', 'masha-iz-permi', '', '', 'PUBLISHED', 0, '2019-11-21 23:47:40', '2019-11-22 05:12:47', NULL, NULL),
(17, 1, 3, 'Паша городской из Томска', '', 'Эх. Паша, паша', '<p>Когда мы ему подкидываем мелочь и еду, он искренне верит что мы прейдем к нему завтра</p>', 'posts/November2019/bmmUhVFatiVE1KhYtnQU.jpg', 'pasha-gorodskoj-iz-tomska', '', '', 'PUBLISHED', 0, '2019-11-21 23:54:10', '2019-11-22 05:12:17', NULL, NULL),
(18, 1, 3, 'Иван Дизилек', '', 'Крутой чел.', '<p>Мы ему загоняем спайс. А он нам выбивыает отзывы от своих клиентов.</p>', 'posts/November2019/kH650ziva69IVpXh42AN.png', 'ivan-dizilek', '', '', 'PUBLISHED', 0, '2019-11-21 23:55:25', '2019-11-22 05:11:30', NULL, NULL),
(19, 1, 4, 'Сергей Лазеров', '', 'https://www.youtube.com/embed/cMNPPgB0_mU', '<p>Директор по развитию ТОО &ldquo;SHELBY GT500&rdquo;</p>', 'posts/January2020/raGv9GtWMZx68LbNbnfS.jpg', 'sergej-lazerov', '', '', 'DRAFT', 0, '2019-11-22 00:14:12', '2020-02-19 22:54:36', NULL, NULL),
(20, 1, 4, 'Крутой челеловек', '', 'https://www.youtube.com/embed/r6IqZkr1ZxQ/', '<p>Из крутой компании</p>', 'posts/January2020/hMZf9g6PDd6Cw5rJ2Z5V.jpg', 'krutoj-chelelovek', '', '', 'PUBLISHED', 0, '2019-11-22 00:19:37', '2020-01-05 02:36:30', NULL, NULL),
(21, 1, 6, 'Кейс-Как мы все-таки перевернули календарь, а вмете с ним и рынок диджитал Казахстана', '', 'Ну ваще', '<p>Это реально так ваще отвечаю</p>', 'posts/November2019/EIxNUKgPSd2esw2Trkww.jpg', 'kejs-kak-my-vse-taki-perevernuli-kalendar-a-vmete-s-nim-i-rynok-didzhital-kazahstana', '', '', 'PUBLISHED', 0, '2019-11-22 01:32:30', '2020-02-19 22:54:25', NULL, 'posts/February2020/dLGplaF1AjGa6em9ONxs.jpg'),
(22, 1, 7, 'Новость - Кейс-Как мы все-таки перевернули календарь, а вмете с ним и рынок диджитал Казахстана', '', 'новость', '<p>новость</p>', 'posts/November2019/Wlq4WcoAyMnovT1EWQdB.jpg', 'novost-kejs-kak-my-vse-taki-perevernuli-kalendar-a-vmete-s-nim-i-rynok-didzhital-kazahstana', '', '', 'PUBLISHED', 0, '2019-11-22 02:05:59', '2019-11-22 04:11:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(2, 'user', 'Normal User', '2019-11-19 11:03:08', '2019-11-19 11:03:08'),
(3, 'contentKiller', 'ContentManager', '2020-01-05 02:24:46', '2020-01-05 02:24:46');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', '9Oweb', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.telephone', 'telephone', '+7 708 103 74 85', NULL, 'text', 6, 'Site'),
(12, 'site.mail', 'mail', 'info@9oweb.kz', NULL, 'text', 7, 'Site'),
(13, 'site.getZayavka', 'Оставить заявку', 'Оставить заявку', NULL, 'text', 8, 'Site'),
(14, 'site.tweeterlink', 'tweeterlink', 'https://twitter.com/sberbank', NULL, 'text', 9, 'Site'),
(15, 'site.facebook', 'facebook', 'https://www.facebook.com/pg/9owebkz', NULL, 'text', 10, 'Site'),
(16, 'site.instagramm', 'instagram', 'https://www.instagram.com/bmw/', NULL, 'text', 11, 'Site'),
(17, 'site.proektvmeste', 'Давайте сделаем проект вместе', 'Давайте сделаем проект вместе', NULL, 'text', 12, 'Site'),
(18, 'site.Copiright', 'Copiright', '2015 - 2019. Все права защищены. Агентство 9 O’WEB', NULL, 'text', 13, 'Site'),
(19, 'site.CopirightRight', 'CopirightRight', 'Сделано своими руками с любовью.', NULL, 'text', 14, 'Site');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-11-19 11:03:11', '2019-11-19 11:03:11'),
(31, 'posts', 'title', 1, 'en', 'poster 111111', '2019-11-19 11:21:31', '2019-11-21 05:38:59'),
(32, 'posts', 'excerpt', 1, 'en', 'This is the excerpt for the Lorem Ipsum Post', '2019-11-19 11:21:31', '2019-11-19 11:21:31'),
(33, 'posts', 'body', 1, 'en', '<p>This is the body of the lorem ipsum post</p>', '2019-11-19 11:21:31', '2019-11-19 11:21:31'),
(34, 'posts', 'slug', 1, 'en', 'poster-111111', '2019-11-19 11:21:31', '2019-11-21 05:38:59'),
(35, 'posts', 'meta_description', 1, 'en', 'This is the meta description', '2019-11-19 11:21:31', '2019-11-19 11:21:31'),
(36, 'posts', 'meta_keywords', 1, 'en', 'keyword1, keyword2, keyword3', '2019-11-19 11:21:31', '2019-11-19 11:21:31'),
(37, 'pages', 'title', 1, 'en', 'Hello Worlden', '2019-11-19 11:23:54', '2019-11-19 11:23:54'),
(38, 'pages', 'slug', 1, 'en', 'hello-world', '2019-11-19 11:23:54', '2019-11-19 11:23:54'),
(39, 'pages', 'body', 1, 'en', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-11-19 11:23:54', '2019-11-19 11:23:54'),
(40, 'menu_items', 'title', 15, 'en', 'Home', '2019-11-19 11:33:11', '2019-11-19 11:33:11'),
(41, 'posts', 'title', 2, 'en', 'foobar 2', '2019-11-20 01:06:18', '2019-11-20 01:58:31'),
(42, 'posts', 'excerpt', 2, 'en', 'This is the excerpt for the sample Post', '2019-11-20 01:06:18', '2019-11-20 01:06:18'),
(43, 'posts', 'body', 2, 'en', '<p>This is the body for the sample post, which includes the body.</p>\n<h2>We can use all kinds of format!</h2>\n<p>And include a bunch of other stuff.</p>', '2019-11-20 01:06:18', '2019-11-20 01:06:18'),
(44, 'posts', 'slug', 2, 'en', 'foobar-2', '2019-11-20 01:06:18', '2019-11-20 01:58:31'),
(45, 'posts', 'meta_description', 2, 'en', 'Meta Description for sample post', '2019-11-20 01:06:18', '2019-11-20 01:06:18'),
(46, 'posts', 'meta_keywords', 2, 'en', 'keyword1, keyword2, keyword3', '2019-11-20 01:06:18', '2019-11-20 01:06:18'),
(47, 'posts', 'title', 3, 'en', 'foobar  3', '2019-11-20 01:49:50', '2019-11-20 01:58:45'),
(48, 'posts', 'title', 4, 'en', 'foobar 4', '2019-11-20 01:49:50', '2019-11-20 01:58:57'),
(49, 'posts', 'excerpt', 3, 'en', 'This is the excerpt for the latest post', '2019-11-20 01:58:45', '2019-11-20 01:58:45'),
(50, 'posts', 'body', 3, 'en', '<p>This is the body for the latest post</p>', '2019-11-20 01:58:45', '2019-11-20 01:58:45'),
(51, 'posts', 'slug', 3, 'en', 'foobar-3', '2019-11-20 01:58:45', '2019-11-20 01:58:45'),
(52, 'posts', 'meta_description', 3, 'en', 'This is the meta description', '2019-11-20 01:58:45', '2019-11-20 01:58:45'),
(53, 'posts', 'meta_keywords', 3, 'en', 'keyword1, keyword2, keyword3', '2019-11-20 01:58:45', '2019-11-20 01:58:45'),
(54, 'posts', 'excerpt', 4, 'en', 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '2019-11-20 01:58:57', '2019-11-20 01:58:57'),
(55, 'posts', 'body', 4, 'en', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', '2019-11-20 01:58:57', '2019-11-20 01:58:57'),
(56, 'posts', 'slug', 4, 'en', 'foobar-4', '2019-11-20 01:58:57', '2019-11-20 01:58:57'),
(57, 'posts', 'meta_description', 4, 'en', 'this be a meta descript', '2019-11-20 01:58:57', '2019-11-20 01:58:57'),
(58, 'posts', 'meta_keywords', 4, 'en', 'keyword1, keyword2, keyword3', '2019-11-20 01:58:57', '2019-11-20 01:58:57'),
(59, 'categories', 'slug', 1, 'en', 'category-1', '2019-11-21 04:38:57', '2019-11-21 04:38:57'),
(60, 'categories', 'name', 1, 'en', 'Category 1en', '2019-11-21 04:38:57', '2019-11-21 04:38:57'),
(61, 'categories', 'slug', 2, 'en', 'category-2', '2019-11-21 04:39:09', '2019-11-21 04:39:09'),
(62, 'categories', 'name', 2, 'en', 'Category 2en', '2019-11-21 04:39:09', '2019-11-21 04:39:09'),
(63, 'posts', 'title', 5, 'en', 'testen', '2019-11-21 05:28:42', '2019-11-21 05:28:42'),
(64, 'posts', 'body', 5, 'en', '<p>test111111111</p>', '2019-11-21 05:28:42', '2019-11-21 05:28:42'),
(65, 'posts', 'slug', 5, 'en', 'testen', '2019-11-21 05:28:42', '2019-11-21 05:28:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 't777@t777', 'users/default.png', NULL, '$2y$10$usmzdSuThUrxVqX.Plh4peXfH5a7OY0x8uur/2MlS8ma2c5B04ZXm', 'fcVuQAKOkcxUvEdoXlLpTv5BfwDeZK8pA5oU0kM4feWOhEww56Y4QlaHn0T1', '{\"locale\":\"ru\"}', '2019-11-19 11:03:11', '2019-11-21 05:26:39'),
(2, 3, 'beybaris', 't777@beybaris', 'users/January2020/6o6vgFB3s0Di0khCs898.jpg', NULL, '$2y$10$hoH7r/L9ooEQWCdarszwrOmXYwU3WsPz/38oy8fuebimZvVvqN05G', NULL, '{\"locale\":\"ru\"}', '2020-01-05 02:26:29', '2020-01-05 02:26:29');

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Индексы таблицы `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
