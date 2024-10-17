-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 10:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_photo_path`, `token`, `role`, `status`, `phone`, `address`, `birth_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Developer', 'motin.mmk.jr@gmail.com', NULL, '$2y$12$CkHTRgwpXzErpGzDcFMPuOeJruMdkA6q6RFiN4FFfLydPjSrYTSB.', '1727666340.jfif', NULL, 'admin', 'active', '01936915657', 'Dhaka', NULL, NULL, '2024-09-23 20:34:11', '2024-09-29 21:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `link`, `target`, `status`, `created_at`, `updated_at`) VALUES
(2, 'upload/banners/1813128852312193.jfif', 'http://127.0.0.1:8000/all/admin/banner', NULL, NULL, 'active', '2024-10-16 21:06:58', NULL),
(3, 'upload/banners/1813128874473375.jfif', 'http://127.0.0.1:8000/all/admin/banner', NULL, NULL, 'active', '2024-10-16 21:07:20', NULL),
(4, 'upload/banners/1813134143983542.webp', 'http://127.0.0.1:8000/all/admin/banner/update', NULL, NULL, 'active', '2024-10-16 21:07:38', '2024-10-16 22:31:05'),
(5, 'upload/banners/1813135332221385.webp', 'http://127.0.0.1:8000/', NULL, NULL, 'active', '2024-10-16 22:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1727082224),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1727082224;', 1727082224),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1727849521),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1727849521;', 1727849521),
('admin@gmail.com|127.0.0.1', 'i:1;', 1727154092),
('admin@gmail.com|127.0.0.1:timer', 'i:1727154092;', 1727154092),
('ltcb6@example.com|127.0.0.1', 'i:2;', 1727154117),
('ltcb6@example.com|127.0.0.1:timer', 'i:1727154117;', 1727154117),
('motin.mmk.jr@gmail.com|127.0.0.1', 'i:1;', 1727922423),
('motin.mmk.jr@gmail.com|127.0.0.1:timer', 'i:1727922423;', 1727922423);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Chicken', 'Chicken', '1728292010.webp', '2024-10-06 22:12:34', '2024-10-07 03:06:50'),
(3, 'Cafe', 'Cheack', '1728291949.webp', '2024-10-07 00:43:57', '2024-10-07 03:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_slug`, `created_at`, `updated_at`, `client_id`) VALUES
(2, 'Dhaka', 'dhaka', NULL, NULL, NULL),
(3, 'Chottogram', 'chottogram', NULL, NULL, NULL),
(4, 'Jhenaidah', 'jhenaidah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `shopinfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_photo_path`, `token`, `role`, `status`, `phone`, `address`, `birth_date`, `remember_token`, `created_at`, `updated_at`, `city_id`, `shopinfo`, `cover_photo`) VALUES
(1, 'Spice Hut Indian Restaurant', 'client', 'client@gmail.com', NULL, '$2y$12$CkHTRgwpXzErpGzDcFMPuOeJruMdkA6q6RFiN4FFfLydPjSrYTSB.', '1729158304.webp', '349903d01323f21cf61566e1eff22542366ace621ff550d9e2c28293988b3d81', 'client', 'active', '01821669970', 'Chottogram', '2024-10-15', NULL, '2024-09-29 23:28:12', '2024-10-17 03:45:04', 2, 'Demo Food Shop', 'C-1729158304.webp'),
(3, 'Client2', 'client2', 'client2@gmail.com', NULL, '$2y$12$CkHTRgwpXzErpGzDcFMPuOeJruMdkA6q6RFiN4FFfLydPjSrYTSB.', '1729068605.webp', '349903d01323f21cf61566e1eff22542366ace621ff550d9e2c28293988b3d81', 'client', 'active', '01821669970', 'Chottogram', '2024-10-15', NULL, '2024-09-29 23:28:12', '2024-10-16 04:20:38', 2, 'Demo Food Shop', 'C-1729068605.webp');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_description` text COLLATE utf8mb4_unicode_ci,
  `coupon_discount` int DEFAULT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_description`, `coupon_discount`, `coupon_validity`, `client_id`, `coupon_status`, `created_at`, `updated_at`, `coupon_code`) VALUES
(2, 'Another 20', 'Another 20Another 20Another 20Another 20Another 20', 20, '2024-11-14T18:30', '1', 1, '2024-10-15 01:31:06', NULL, '2024-CO-1'),
(3, 'Another Coupon 40', 'Another Coupon 40Another Coupon 40Another Coupon 40Another Coupon 40', 40, '2024-10-26T14:06', '1', 1, '2024-10-15 02:06:28', NULL, '2024-CO-1'),
(4, 'Client2', 'Another Coupon Table Data', 12, '2024-11-08T22:23', '3', 1, '2024-10-15 04:17:57', NULL, '2024-CO-1');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glleries`
--

CREATE TABLE `glleries` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `glleries`
--

INSERT INTO `glleries` (`id`, `client_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(3, '1', '1812514367344270.webp', '2024-10-10 02:20:00', '2024-10-10 02:20:00'),
(6, '1', '1812517445525354.webp', '2024-10-10 03:08:55', '2024-10-10 03:08:55'),
(7, '1', '1812517445591364.webp', '2024-10-10 03:08:55', '2024-10-10 03:08:55'),
(8, '1', '1812517445632940.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(9, '1', '1812517445718049.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(10, '1', '1812517445756976.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(11, '1', '1812517445790680.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(12, '1', '1812517445822750.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(13, '1', '1812517445879897.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56'),
(14, '1', '1812517445928997.webp', '2024-10-10 03:08:56', '2024-10-10 03:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_slug`, `menu_icon`, `menu_link`, `menu_target`, `menu_status`, `created_at`, `updated_at`, `client_id`) VALUES
(1, 'Demo_update', 'dmon', '1812337433801415.webp', NULL, NULL, 'active', '2024-10-08 03:08:44', '2024-10-08 03:27:43', 1),
(3, 'Riche', 'Rice', '1812338579323553.webp', NULL, NULL, 'active', '2024-10-08 03:45:55', '2024-10-08 03:45:55', 1),
(4, 'Dips', 'dips', '1812973031602724.png', NULL, NULL, 'active', '2024-10-15 03:50:18', '2024-10-15 03:50:18', 3),
(5, 'Vegan Pizza', 'Vegan Pizza', '1812973074000746.png', NULL, NULL, 'active', '2024-10-15 03:50:57', '2024-10-15 03:50:57', 3),
(6, 'Pastas', 'Pastas', '1812973361415248.png', NULL, NULL, 'active', '2024-10-15 03:55:31', '2024-10-15 03:55:31', 3),
(7, 'Jumbo Slice', 'Jumbo Slice', '1812973391896060.png', NULL, NULL, 'active', '2024-10-15 03:56:00', '2024-10-15 03:56:00', 3),
(8, 'Lasagne', 'Lasagne', '1812973416962823.png', NULL, NULL, 'active', '2024-10-15 03:56:24', '2024-10-15 03:56:24', 3),
(9, 'Garlic Bread', 'Garlic Bread', '1812973451725247.png', NULL, NULL, 'active', '2024-10-15 03:56:57', '2024-10-15 03:56:57', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_23_091014_create_admins_table', 2),
(5, '2024_09_30_032140_create_clients_table', 3),
(6, '2024_10_03_070740_create_categories_table', 4),
(7, '2024_10_07_090758_create_cities_table', 5),
(8, '2024_10_07_101614_create_menus_table', 6),
(9, '2024_10_08_094405_create_products_table', 7),
(10, '2024_10_10_070031_create_glleries_table', 8),
(11, '2024_10_15_053032_create_coupons_table', 9),
(12, '2024_10_16_092257_create_banners_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `city_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `a_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `client_id` int DEFAULT NULL,
  `most_popular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_seller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `city_id`, `menu_id`, `a_code`, `qty`, `size`, `price`, `discount_price`, `image`, `description`, `client_id`, `most_popular`, `best_seller`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Holi', 'holi', 3, 2, 4, NULL, '12', '12', '109', '12', '1813140000536968.webp', NULL, 3, '1', NULL, 'active', '2024-10-09 22:34:03', '2024-10-17 00:04:10'),
(4, 'Another', 'another', 2, 2, 1, 'PC02', '3', '2', '233', '12', '1812503829226521.webp', 'Discumnt', 1, '1', '1', 'active', '2024-10-09 23:32:32', '2024-10-17 03:27:11'),
(6, 'JUMBO', 'jumbo', 3, 2, 8, 'PC03', '12', '4', '123', '12', '1812974558221952.webp', 'Full', 3, '1', NULL, 'active', '2024-10-15 04:14:32', '2024-10-15 23:54:15'),
(7, 'Chicken Masala', 'chicken-masala', 2, 4, 5, NULL, '12', '2', '390', '10', '1813049630420196.webp', NULL, 1, NULL, '1', 'active', '2024-10-16 00:07:49', '2024-10-16 00:18:04'),
(8, 'Dips', 'dips', 3, 2, 4, 'PC04', '2', '2', '120', '10', '1813139977983939.webp', 'DipsDipsDips', 3, '1', NULL, 'active', '2024-10-17 00:03:49', '2024-10-17 00:03:49'),
(9, 'Dhaka Food', 'dhaka-food', 2, 2, 8, 'PC05', '2', '1', '123', '1', '1813152895852474.webp', 'ok', 3, '1', NULL, 'active', '2024-10-17 03:29:08', '2024-10-17 03:29:08'),
(10, 'Dhaja 2', 'dhaja-2', 2, 3, 3, 'PC06', '12', '2', '123', '1', '1813152999799272.webp', 'ok', 1, '1', NULL, 'active', '2024-10-17 03:30:47', '2024-10-17 03:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1BAUHAdKRVMqXWjbJag4pph2NJjzwycHRuYfJrvd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmV5Q2RvcFlUM1J1TTc5RGZyTjJ3S2NKRzNNanVMZm56UzJRR0t1aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXN0YXVyYW50L2RldGFpbC8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MzoibG9naW5fY2xpZW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1729161783),
('YzNVdeOoHSQYoOoZVhhxx0TTfJLXWpR1WfzBMRcl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWFVmQmd6UVZNcFFRVG1mTnJUOWxnalRnV29JZW5KWHk3bFNEUm00ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXN0YXVyYW50L2RldGFpbC8zIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1729162161);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_photo_path`, `role`, `status`, `phone`, `address`, `birth_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@localhost.com', '2024-09-23 03:02:44', '$2y$12$dMjj/28sAEc2C.E0bIkVxOFuhGTB2JTBFgGYa9myNtMesKERIl61i', NULL, 'user', 'active', NULL, NULL, NULL, 'l0tvBuo0S6CpAqWmi8yvRzhLs0Co6hVHgDWgsN6LQEQ1Op8K6ruWO1tUOTWD', '2024-09-23 03:01:20', '2024-09-23 03:08:19'),
(2, 'Test User', NULL, 'test@example.com', '2024-09-23 20:34:11', '$2y$12$LHNC5isZ.CpQez7t7HDbueLrUUmippHkVSZl9SM2.QMCAYGvjIZg6', NULL, 'user', 'active', NULL, NULL, NULL, 'xxG8by0cXe', '2024-09-23 20:34:11', '2024-09-23 20:34:11'),
(3, 'Md Abdul Motin', 'ok', 'motin@gmail.com', '2024-10-01 23:33:32', '$2y$12$oqAxCI.dhR6AeIvmwJRAYOfxjV21XC/P80Al6jAqU4Ia4szUcmy1.', '1727923215.jfif', 'user', 'active', '018288237762', 'Haridash Pur', '2024-10-02', NULL, '2024-10-01 23:31:39', '2024-10-03 00:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_name_unique` (`coupon_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `glleries`
--
ALTER TABLE `glleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glleries`
--
ALTER TABLE `glleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
