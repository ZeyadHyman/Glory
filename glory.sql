-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 09:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `frame_size` varchar(255) DEFAULT NULL,
  `frame_color` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `price`, `image`, `frame_size`, `frame_color`, `status`, `created_at`, `updated_at`) VALUES
(12, 3, 2, 8, 100.00, '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 'small', 'red', 'pending', '2024-08-22 16:39:01', '2024-08-22 16:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_23_190444_create_products_table', 1),
(5, '2024_07_23_203838_create_carts_table', 1),
(6, '2024_07_29_152212_create_social_logins_table', 1),
(7, '2024_07_23_190147_create_wishlists_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `frame_sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`frame_sizes`)),
  `frame_colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`frame_colors`)),
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `images`, `price`, `discount`, `frame_sizes`, `frame_colors`, `category`, `created_at`, `updated_at`) VALUES
(1, 'a', 'TESTING', '\"[\\\"images\\\\\\/Posters\\\\\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\\\",\\\"images\\\\\\/Posters\\\\\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\\\"]\"', 145, 21, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-24 16:20:48'),
(2, 'b', 'TESTING', '\"[\\\"images\\\\\\/Posters\\\\\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\\\",\\\"images\\\\\\/Posters\\\\\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\\\"]\"', 42, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-24 16:21:00'),
(3, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(4, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(5, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(6, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(7, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(8, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(9, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(10, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(11, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(12, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(13, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(14, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(15, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(16, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(17, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(18, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(19, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(20, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(21, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(22, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(23, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(24, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(25, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(26, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(27, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(28, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(29, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(30, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(31, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(32, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(33, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(34, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(35, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(36, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(37, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(38, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(39, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(40, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(41, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(42, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(43, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(44, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(45, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(46, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(47, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(48, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(49, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(50, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'players', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(51, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(52, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'clubs', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(53, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(54, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'movies', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(55, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(56, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 't-shirts', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(57, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(58, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'anime', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(59, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36'),
(60, 'TESTING', 'TESTING', '[\"images\\/Posters\\/1hJY6vgx6lOHLUV3V1n9tXw2XN7tsoWe6Nfp1zb3.jpg\",\"images\\/Posters\\/hkpJJD1zCm3c3oD5jdT551qq1ekZd3dkTxMhCyM2.jpg\"]', 100, 10, '[\"small\", \"medium\", \"large\", \"xlarge\"]', '[\"red\", \"blue\", \"green\", \"black\", \"white\"]', 'cars', '2024-08-22 17:41:36', '2024-08-22 17:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HDWQUIUVZFnqWTbNHPnzrN4Y3UoV41hBjfBaZZ99', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVJiWnBQSUNFcHRpbmU3dnRsc084Tm4zYm1ha3VUMWhxVFBNd2JWbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zb2NpYWxpdGUvZ29vZ2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiQmNNSW9hTkh3ckNvTEtWQkU4YVJzaUg1NW9MT29lMUlhMFBnTUI3WSI7fQ==', 1724355470),
('MFqGQXGV5bzIj8XjLydthw0npBqU8Cp4T6hW1SqC', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVQ4TTQ0eUp4eEZwcnJLUHJMOE1FRmQ0ZTE1WFRTeFlJcHpERWtwOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93aXNobGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1724355569),
('Nvb9ChzpVpjuzpO2bjJUyd2bCzQWLIC8ofUTjy5I', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6NjoiX3Rva2VuIjtzOjQwOiJCTG94ckEzTGFxUkI0RXFIaXBoWWVqeXJRRGVsdVVlMnk5YlB5MU1QIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2NhdGVnb3JpZXMiO319', 1724527302);

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_logins`
--

INSERT INTO `social_logins` (`id`, `provider`, `provider_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'google', '118393668483551378454', 3, '2024-08-22 16:38:30', '2024-08-22 16:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_image_changed` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `profile_image`, `email_verified_at`, `profile_image_changed`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Zeyad Hyman', 'zeyadhyman@gmail.com', '$2y$12$qTByRgh34Jy3Ptsuo0KaCe5392QNEVD9mO7UvmuKmmxS7nGDSOvcq', 'user', 'https://lh3.googleusercontent.com/a/ACg8ocJ49-5aBjzgDLBdjUiJ-j7H58Mv-5E12OH5kNtXNv6rRVGK-0h1=s96-c', '2024-08-22 16:38:29', 0, 'cLZ6R0rm5hgki5oDM1sJUGp8UEqiwBOMELeHh4cTt9hjnTxGcyQj3SArBb7F', '2024-08-22 16:38:30', '2024-08-22 16:38:30'),
(4, 'Admin User', 'admin@admin.com', '$2y$12$qJzIAZcpdj0JzFV7SF6ijuHhGluwypTokPb9CTJS8CEUZO4j4N2aK', 'admin', 'default-profile.jpg', '2024-08-22 16:39:44', 0, NULL, '2024-08-22 16:39:44', '2024-08-22 16:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, '2024-08-22 16:38:58', '2024-08-22 16:38:58');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
