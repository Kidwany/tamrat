-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 12:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamra`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfer`
--

CREATE TABLE `bank_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_transfer`
--

INSERT INTO `bank_transfer` (`id`, `order_id`, `bank_name`, `owner_name`, `account_number`, `amount`, `image_url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'cib', 'Mohamed Kidwany', '10002556566665', 1500, '1', NULL, '2020-03-03 22:00:00', '2020-03-03 22:00:00'),
(2, 26, 'CIB', 'Mohamed Kidwany', '21254559878', 25.23, 'https://www.sss.com', NULL, '2020-03-12 10:50:13', '2020-03-12 10:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_alt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pintrest` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `phone`, `phone_alt`, `address_en`, `address_ar`, `location`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `pintrest`, `behance`, `whatsapp`, `google_plus`, `updated_at`, `created_at`) VALUES
(1, 'info@shagher.com', '01000606733', '01200521111', '87 المنيل، ‎، الجيزة', '87 شارع المنيل المنيل أعلى معامل الفا, الجيزة', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55275.52514509239!2d31.20875689950108!3d30.016186075699363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847250305755f%3A0x16caea213c6c3f6b!2z2K_Zg9iq2YjYsSDYp9it2YXYryDYudio2K8g2KfZhNiz2YTYp9mFINmE2KzYsdin2K3Yp9iqINin2YTYs9mF2YbYqSDZiNiq2YPZhdmK2YUg2KfZhNmF2LnYr9ip!5e0!3m2!1sar!2seg!4v1569379456926!5m2!1sar!2seg', 'https://www.facebook.com/AbdelsalamObesityClinic/', 'https://www.facebook.com/AbdelsalamObesityClinic/', 'https://www.instagram.com/abdelsalamobesityclinic/', 'https://www.youtube.com/channel/UCaqjULCLUiYLhW9A4X9ZlpA', 'https://www.facebook.com/AbdelsalamObesityClinic/', NULL, NULL, '+201004996929', NULL, '2020-04-09 17:27:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `delivery` double DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `date_start`, `date_end`, `discount_type`, `percentage`, `amount`, `delivery`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'الخصم الأسبوعي', '2020-03-13 22:00:00', '2020-03-13 22:00:00', NULL, 0.1, NULL, 1000, NULL, '2020-03-06 22:00:00', '2020-03-14 10:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `alt`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 'dashboardImages\\products\\15832653893.jpg', NULL, NULL, '2020-03-03 17:56:29', '2020-03-03 17:56:29'),
(2, 'dashboardImages\\products\\15832666593.jpg', NULL, NULL, '2020-03-03 18:17:39', '2020-03-03 18:17:39'),
(3, 'dashboardImages\\products\\1583266839dsj.png', NULL, NULL, '2020-03-03 18:20:39', '2020-03-03 18:20:39'),
(4, 'dashboardImages\\products\\15832679121.jpg', NULL, NULL, '2020-03-03 18:38:32', '2020-03-03 18:38:32'),
(5, 'dashboardImages\\products\\1583599579dsj.png', NULL, NULL, '2020-03-07 14:46:19', '2020-03-07 14:46:19'),
(6, 'dashboardImages\\products\\158777134217-650x350.jpg', NULL, NULL, '2020-04-24 21:35:42', '2020-04-24 21:35:42'),
(7, 'dashboardImages\\products\\158777203017-650x350.jpg', NULL, NULL, '2020-04-24 21:47:10', '2020-04-24 21:47:10'),
(8, 'dashboardImages\\products\\158777238217-650x350.jpg', NULL, NULL, '2020-04-24 21:53:02', '2020-04-24 21:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'احمد المطيري', 'ahmed@gmail.com', '01122555544', 'اريد شراء كمية كبيرة من التمور بسعر الجملة', '2020-04-07 22:00:00', '2020-04-07 22:00:00'),
(2, 'Mohamed', 'kidwany60@gmail.com', '01100960900', 'اريد كمية تمور من ةتمر المدينة بسعر الجملة', '2020-04-08 20:30:33', '2020-04-08 20:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2020_03_01_194027_create_product_table', 3),
(10, '2020_03_01_200700_create_order_table', 4),
(11, '2020_03_01_201309_create_order_finance_table', 5),
(12, '2020_03_01_205516_create_order_items_table', 6),
(13, '2020_03_01_211828_create_order_delivery_details_table', 7),
(14, '2020_03_01_212956_create_bank_transfer_table', 8),
(15, '2020_03_01_213521_create_bank_transfer_table', 9),
(16, '2020_03_02_212436_create_total_user_orders', 10),
(17, '2020_03_03_005224_create_total_user_orders', 11),
(19, '2020_03_03_201156_create_products_table', 12),
(20, '2020_03_03_223929_create_orders_table', 13),
(22, '2020_03_03_225219_create_orders_finance_table', 14),
(23, '2020_03_03_225951_create_orders_items_table', 14),
(24, '2020_03_03_230907_create_orders_delivery_details_table', 15),
(25, '2020_03_04_000315_create_bank_transfers_table', 16),
(26, '2020_03_12_165048_create_vrification_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sent_from` bigint(20) UNSIGNED DEFAULT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `sent_from`, `notifiable_type`, `title`, `data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'New Notification', NULL, 78, 'user', 'ازيك يا علاء', 'اهلا صديقي علاء كيف حالك اتمنى ان تكون بخير', '2020-04-01 22:02:15', '2020-04-01 22:02:15', NULL),
(17, 'New Notification', NULL, 78, 'user', 'الله صل على محمد', 'ﺍﻟﺼﻼﺓ ﺍﻟﻜﺎﻣﻠﺔ *( ﺍﻟﻠﻬﻢ ﺻﻞ ﺻﻼﺓ ﻛﺎﻣﻠﺔ ﻭﺳﻠﻢ ﺳﻼﻣﺎ ﺗﺎﻣﺎ ﻋﻠﻰ ﺳﻴﺪﻧﺎ ﻣﺤﻤﺪ ﺍﻟﺬﻱ ﺗﻨﺤﻞ ﺑﻪ ﺍﻟﻌﻘﺪ ﻭﺗﻨﻔﺮﺝ ﺑﻪ ﺍﻟﻜﺮﺏ ﻭﺗﻘﻀﻰ ﺑﻪ ﺍﻟﺤﻮﺍﺋﺞ ﻭﺗﻨﺎﻝ ﺑﻪ ﺍﻟﺮﻏﺎﺋﺐ ﻭﺣﺴﻦ ﺍﻟﺨﻮﺍﺗﻴﻢ ﻭﻳﺴﺘﺴﻘﻰ ﺍﻟﻐﻤﺎﻡ ﺑﻮﺟﻬﻪ ﺍﻟﻜﺮﻳﻢ ﻭﻋﻠﻰ ﺁﻟﻪ ﻭﺻﺤﺒﻪ ﻓﻲ ﻛﻞ ﻟﻤﺤﺔ ﻭﻧﻔﺲ ﺑﻌﺪﺩ ﻛﻞ ﻣﻌﻠﻮﻡ ﻟﻚ .', '2020-04-17 23:00:02', '2020-04-17 23:00:02', NULL),
(18, 'New Notification', NULL, 78, 'user', 'xevykixeda@mailinator.com', 'cyrewy@mailinator.com', '2020-04-24 13:13:15', '2020-04-24 13:13:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('026a153b1a7a5e18a5aaaee652c6ea6de598831fee390078b6815926e77042b2721e5c89e78bd31b', 123, 1, 'MyApp', '[]', 0, '2020-03-29 23:43:03', '2020-03-29 23:43:03', '2021-03-30 01:43:03'),
('05808bd5f34d2516a08083dbeb486c2b0d134598d5d77cec8b2306127f949c5719f1130ea367c067', 97, 1, 'MyApp', '[]', 0, '2020-03-12 20:45:34', '2020-03-12 20:45:34', '2021-03-12 22:45:34'),
('10a58a9aa258f89a1dff561530aace8ac3e9145a8ebfc7503b3453b8470d8ef2cfeec54dda2ecfcf', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:45:45', '2020-04-01 21:45:45', '2021-04-01 23:45:45'),
('10fcb16c65d2add22f5e7f3b0e232153b60438b6f43ec751322ebbbe8bbf6e1e0bf18d64f639ae50', 108, 1, 'MyApp', '[]', 0, '2020-03-28 21:21:09', '2020-03-28 21:21:09', '2021-03-28 23:21:09'),
('11eae7eab422170e00410ec5b2c2752843a82dc792980ad3b230ea9d132d17cdc07c593ca5400367', 103, 1, 'MyApp', '[]', 0, '2020-03-28 20:54:12', '2020-03-28 20:54:12', '2021-03-28 22:54:12'),
('176b43ba049aaf9ce46fb3549fb3cd71dd35c34c994fa9fe77d403ee918951f2b401ac7f849613c7', 126, 1, 'MyApp', '[]', 0, '2020-04-01 21:49:18', '2020-04-01 21:49:18', '2021-04-01 23:49:18'),
('1d34c2f6337b1bdf49a65867adad454750c7c402ac944d678a8b5cb6f73345b1c28d0c9f217721c2', 113, 1, 'MyApp', '[]', 0, '2020-03-28 21:34:43', '2020-03-28 21:34:43', '2021-03-28 23:34:43'),
('1f10fad31b497b037bfd2752a32c3e2196b1747317df8d0a6eadc2638f83f4591dad3393f5c2710e', 127, 1, 'MyApp', '[]', 0, '2020-04-24 22:21:20', '2020-04-24 22:21:20', '2021-04-25 00:21:20'),
('207ff3555ceb130a738e28e6525da5468774a3df8350bded8ecf8d79a7841fbf401e48059818d50b', 90, 1, 'MyApp', '[]', 0, '2020-03-12 17:52:01', '2020-03-12 17:52:01', '2021-03-12 19:52:01'),
('226f2cd24d64a124ed0ef7f6bfa2a996060aa9c9681a5dff474998a3bbffe414d074ae1e1af99b4e', 122, 1, 'MyApp', '[]', 0, '2020-03-29 23:42:09', '2020-03-29 23:42:09', '2021-03-30 01:42:09'),
('231cf7393012f9b8b20586d7b6704acfa78430370c6717acce7b0c2248062fd0b7393ae6839bb7cf', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:49:04', '2020-04-01 21:49:04', '2021-04-01 23:49:04'),
('261e4cf82dd5aa67a730af6df0fe8450ee93dbc369754d0a0539b3a6d098de2f14ccd3516f6c6099', 86, 1, 'MyApp', '[]', 0, '2020-03-12 17:44:43', '2020-03-12 17:44:43', '2021-03-12 19:44:43'),
('2896647bf7e5c683ff364ebfccbc1296f1ca7c044404780baf9803bf14df6f826a58006f2e214e67', 83, 1, 'MyApp', '[]', 0, '2020-03-12 17:32:17', '2020-03-12 17:32:17', '2021-03-12 19:32:17'),
('2ec9472f8abad5301ce853a492cb21cc378832b3028abe8de1ffb28aaabd0d22df8da8d49271955b', 114, 1, 'MyApp', '[]', 0, '2020-03-28 21:37:56', '2020-03-28 21:37:56', '2021-03-28 23:37:56'),
('33f219366e1c388cadfa631647fde959d1297a4959bd856f89ee61f156252b5fc994792b7499ecaf', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:44:17', '2020-04-01 21:44:17', '2021-04-01 23:44:17'),
('3ba344169320b45337863dab42dd1ee681a206c18d43680f4fb04813c471e81b7c02a25e45ace1d2', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:45:36', '2020-04-01 21:45:36', '2021-04-01 23:45:36'),
('44e1073614c1b989a3b570f5833c157b8fb72eec8453edadb46a74444ad001611a4d725f2e380f68', 82, 1, 'MyApp', '[]', 0, '2020-03-12 17:16:25', '2020-03-12 17:16:25', '2021-03-12 19:16:25'),
('469abc8670374ad4075882bf02014904936f1913cfa87b5827bba46584c71d7c0cbff11ec719fe52', 119, 1, 'MyApp', '[]', 0, '2020-03-28 21:50:06', '2020-03-28 21:50:06', '2021-03-28 23:50:06'),
('50d850ba7de58b3ba45a028f7e55b69863de8e862da647ef9b953aaf750f04a96592a105c09da328', 96, 1, 'MyApp', '[]', 0, '2020-03-12 20:44:45', '2020-03-12 20:44:45', '2021-03-12 22:44:45'),
('5b6b943cb3bd9fbfb53c266563fb6cf7a4d7e0fc502792f8aa0a6095dacfbac18cd7033193a573c5', 128, 1, 'MyApp', '[]', 0, '2020-04-24 22:22:28', '2020-04-24 22:22:28', '2021-04-25 00:22:28'),
('5c24ca304f184d34bebd2050a028e886101aed137bbf13c3f7584bcde307fc40cc86d75b46810fe7', 91, 1, 'MyApp', '[]', 0, '2020-03-12 17:54:24', '2020-03-12 17:54:24', '2021-03-12 19:54:24'),
('693bf8620692f186c6a2aeb4079ef00ad2b15f127d336c317b672610c9195f66d9ef5318de372fcc', 110, 1, 'MyApp', '[]', 0, '2020-03-28 21:28:26', '2020-03-28 21:28:26', '2021-03-28 23:28:26'),
('6ff233e9553f6f67c2b2c4b62699fe31dcc7067b752c596afa87c4a5714bda1fe0e35240f0df533c', 106, 1, 'MyApp', '[]', 0, '2020-03-28 21:15:13', '2020-03-28 21:15:13', '2021-03-28 23:15:13'),
('710e67cae83b8426b2245128c0250e53baec14d1b7e521f6002a1205770b0050220268b7f4bfa78a', 101, 1, 'MyApp', '[]', 0, '2020-03-28 20:20:58', '2020-03-28 20:20:58', '2021-03-28 22:20:58'),
('71f315ada0342a16c4aa11f7464a9124baf5945abfda44afd2f6611069de92285420cc8f78b7be3d', 125, 1, 'MyApp', '[]', 0, '2020-03-29 23:47:12', '2020-03-29 23:47:12', '2021-03-30 01:47:12'),
('739b12d7371720c569a435fada3dc0ef80b85a62fb683678e4fc5a98f8406d32b67a6f485aafd405', 111, 1, 'MyApp', '[]', 0, '2020-03-28 21:29:23', '2020-03-28 21:29:23', '2021-03-28 23:29:23'),
('7ae9bc27bb6c2c0992a0193ec13e4207f5edce88a35c63199c534a9d87c7d85cac4f6b7316f2c3e5', 85, 1, 'MyApp', '[]', 0, '2020-03-12 17:43:24', '2020-03-12 17:43:24', '2021-03-12 19:43:24'),
('7d6fb0e0497ba52681539cc3f57577870809435fc7144be96bc95eb21813e382069d820ccc4d4133', 88, 1, 'MyApp', '[]', 0, '2020-03-12 17:48:59', '2020-03-12 17:48:59', '2021-03-12 19:48:59'),
('810ff7bc6c4a0755e6b5e94aa94554534812f2d2ad4497771c9ee4e4a2a2970fe0c4ebb897839f34', 116, 1, 'MyApp', '[]', 0, '2020-03-28 21:40:42', '2020-03-28 21:40:42', '2021-03-28 23:40:42'),
('84744b2e477af2574481b6d896126185a50a3c2b76eac481b90affe587f6ceaaf97acc4455fe2c98', 128, 1, 'MyApp', '[]', 0, '2020-05-07 16:45:54', '2020-05-07 16:45:54', '2021-05-07 18:45:54'),
('8effb5cb05e08321dfbf693faa3120ec55afd764caee533839c763d30330b08bad37978bd6e2f072', 78, 1, 'MyApp', '[]', 0, '2020-03-06 18:25:48', '2020-03-06 18:25:48', '2021-03-06 20:25:48'),
('9b6138832e5e455e81e384b1051928ceae9c667be42fe34659e924d04682cc4e01d1ad5390e8b6d6', 118, 1, 'MyApp', '[]', 0, '2020-03-28 21:46:07', '2020-03-28 21:46:07', '2021-03-28 23:46:07'),
('a15a479766a0b01b464d6f563474f7d5c05560ba273a06424a87befa2195ba85e3b081e5791a01c4', 92, 1, 'MyApp', '[]', 0, '2020-03-12 17:56:42', '2020-03-12 17:56:42', '2021-03-12 19:56:42'),
('a640cf7988380359ad587761e4b217b06fc78b1e07b4b69f6dcde3e16bef56200165efbd2f8d9883', 94, 1, 'MyApp', '[]', 0, '2020-03-12 20:42:02', '2020-03-12 20:42:02', '2021-03-12 22:42:02'),
('a67030d5f702a3321c98bff173b4349d88d9546db11b56c4ab4ec658280824ce93b25f73073a1549', 98, 1, 'MyApp', '[]', 0, '2020-03-12 20:58:44', '2020-03-12 20:58:44', '2021-03-12 22:58:44'),
('a816079d58ca1d4e621d5042cbc1ec9d7895ba7655c5b7fb950b7a388cb8b69b4c287ef31a8bab36', 93, 1, 'MyApp', '[]', 0, '2020-03-12 20:39:47', '2020-03-12 20:39:47', '2021-03-12 22:39:47'),
('a848d3fae14c8c17c33186b31885581569d2e3f9fcb39bdad7ce91854a394836fbddb78d11429a14', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:45:26', '2020-04-01 21:45:26', '2021-04-01 23:45:26'),
('b155f9f67916e20d87291a57c39ea4c1a6a6672e59d366729f7361ff6594cfdd3a7e92e9b92911cd', 89, 1, 'MyApp', '[]', 0, '2020-03-12 17:50:21', '2020-03-12 17:50:21', '2021-03-12 19:50:21'),
('b39de0b62b02185cad818c545d2f827e74c83dc0a7b96b4a784d647c55fe9ae14af49623f32436bc', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:43:40', '2020-04-01 21:43:40', '2021-04-01 23:43:40'),
('b446acd24d84dc9bd5b7e163050e48de68903d6a65c3fa2d54243ecc3a93c29f9bc90d0135da6bdc', 125, 1, 'MyApp', '[]', 0, '2020-04-24 20:10:11', '2020-04-24 20:10:11', '2021-04-24 22:10:11'),
('b560e2f6b65dc7e47e6c3a3a85f7034b688a5410f871e7b6751570876302c507fb63061da42c10d4', 76, 1, 'MyApp', '[]', 0, '2020-03-06 18:19:29', '2020-03-06 18:19:29', '2021-03-06 20:19:29'),
('b5f3c54d16db08d59cb54010acfdbbf19015c7f66c3ea48c22860a7ae9680b7c160fd40be5c8f9f5', 102, 1, 'MyApp', '[]', 0, '2020-03-28 20:47:43', '2020-03-28 20:47:43', '2021-03-28 22:47:43'),
('b98a5fc7faab4c3beffb5d895d8bf1fe66090c93b1a08aca18e6bd99f78f37787eec968aa2010d1b', 99, 1, 'MyApp', '[]', 0, '2020-03-12 21:06:46', '2020-03-12 21:06:46', '2021-03-12 23:06:46'),
('c1f7803fdbdefecf709f2dfd63099bd1ab07e33f7a1de287fa9fb42213752face7328fce9f20d440', 78, 1, 'MyApp', '[]', 0, '2020-03-12 10:28:10', '2020-03-12 10:28:10', '2021-03-12 12:28:10'),
('c2824536f3397bf3fe53a5f8ad43e839e39b159f8f4491907c2c63fffe31f49bf605cad763f4da0c', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:48:33', '2020-04-01 21:48:33', '2021-04-01 23:48:33'),
('c5b78ec5ab4b0a0b826a115141768a9e4d631b5d0b918750ef36099a5e08b0ab1d09e0c097a73820', 117, 1, 'MyApp', '[]', 0, '2020-03-28 21:45:12', '2020-03-28 21:45:12', '2021-03-28 23:45:12'),
('caffa8aa8a8978bd1fa6e14be327b183d6931c1351433fdd748b2de1ee5e00e5e4265135028c12aa', 81, 1, 'MyApp', '[]', 0, '2020-03-12 17:04:11', '2020-03-12 17:04:11', '2021-03-12 19:04:11'),
('d19ad9177e0feda9e53eea205e87daae690865d226c36e143cce33c2fc4d2ee40a7032311ff7d7cc', 121, 1, 'MyApp', '[]', 0, '2020-03-28 21:53:10', '2020-03-28 21:53:10', '2021-03-28 23:53:10'),
('da92c6a18d1822cefd17988aa7d3ce5ca27166e3ee1d3abd82c5dd366c82967a592143840cb86e69', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:47:36', '2020-04-01 21:47:36', '2021-04-01 23:47:36'),
('db78e4c3538e391082aba708454456bcf73f522444efd129d24a7fb473cf67acd541cf1aa97a9b25', 109, 1, 'MyApp', '[]', 0, '2020-03-28 21:25:27', '2020-03-28 21:25:27', '2021-03-28 23:25:27'),
('dca7e810df16bfe5656d0f69eb0a7a77457351d609c23bda01dc64563a2b2f87787f6d7bbd2ed038', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:48:52', '2020-04-01 21:48:52', '2021-04-01 23:48:52'),
('e10fee9a8378c0f8b94f31686f395d9c9255dcf984cca1d0414ce268246604cd344e560f49b82a09', 115, 1, 'MyApp', '[]', 0, '2020-03-28 21:40:01', '2020-03-28 21:40:01', '2021-03-28 23:40:01'),
('e3b73d8c26cf78a2311fc6b7de25f532eb1a5ce5eff730e2ee56f6a38ddfd21fa16a75697818ea78', 80, 1, 'MyApp', '[]', 0, '2020-03-12 14:32:12', '2020-03-12 14:32:12', '2021-03-12 16:32:12'),
('ea384a4ca6e705af00c38f1110b9dc2eb93d52571ffdda7cbcbe8af2bfb1dd1a1a7c588045ea1816', 105, 1, 'MyApp', '[]', 0, '2020-03-28 21:12:17', '2020-03-28 21:12:17', '2021-03-28 23:12:17'),
('ec8f73e1bd9bed7e0a69b5b8363061d734c06e826140b326ca562702469837464e03eacbaf80983d', 124, 1, 'MyApp', '[]', 0, '2020-03-29 23:44:19', '2020-03-29 23:44:19', '2021-03-30 01:44:19'),
('f0945a024f8f41449c395d216bf43ba2227145efdf2f7dd05f005ed73a63f0b9b0a311f9926799bb', 107, 1, 'MyApp', '[]', 0, '2020-03-28 21:16:13', '2020-03-28 21:16:13', '2021-03-28 23:16:13'),
('f0a3a27fca74304e5f5aec4af94ab153fb966a04a235995951eb1d7a2348a2211ba8cca639a17907', 104, 1, 'MyApp', '[]', 0, '2020-03-28 21:11:31', '2020-03-28 21:11:31', '2021-03-28 23:11:31'),
('f27194290dfe8fa5bd66d16711fc5b1660eeb0efd5d6697808c8c48a27a51af10e4ca990e2275c1a', 95, 1, 'MyApp', '[]', 0, '2020-03-12 20:42:53', '2020-03-12 20:42:53', '2021-03-12 22:42:53'),
('f3fe6f77e446d4fabc577df1bd20fc3c9a612b85d24dbd2386abd711c277b055b0b09d8de2f0affc', 77, 1, 'MyApp', '[]', 0, '2020-03-06 18:23:35', '2020-03-06 18:23:35', '2021-03-06 20:23:35'),
('fad1d01c224c3a5012a21c19dd4d09632f3ff375f72e2490f888b9e37dc207c67ced4bde4b41cf73', 84, 1, 'MyApp', '[]', 0, '2020-03-12 17:36:11', '2020-03-12 17:36:11', '2021-03-12 19:36:11'),
('fb3d3f0b092087101d93a72b0c54f91f25984cb77a623e21832a4e807e8aa20099d58ff384e8ce53', 79, 1, 'MyApp', '[]', 0, '2020-03-12 14:28:32', '2020-03-12 14:28:32', '2021-03-12 16:28:32'),
('fc2dcef6e428b65c4076156b709830967f528274c19ea64f7411145a7718c382a1c2de81a648c10d', 125, 1, 'MyApp', '[]', 0, '2020-04-24 20:09:52', '2020-04-24 20:09:52', '2021-04-24 22:09:52'),
('fe0261539c83d1f44f5d1b87cb2dad7ced69fcef22746c904083858b75a97adf6257185b11fd4da7', 125, 1, 'MyApp', '[]', 0, '2020-04-01 21:42:51', '2020-04-01 21:42:51', '2021-04-01 23:42:51'),
('ff6bb5c060609f2dd93b8b4e5c97003884212a9f9cfcbf6d9f14d766eec95fbcd24d80c48467e9fd', 87, 1, 'MyApp', '[]', 0, '2020-03-12 17:47:04', '2020-03-12 17:47:04', '2021-03-12 19:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'dbx5q7nklUNoomiH7dYuvR8WXCxOkw7HFoHob3Yj', 'http://localhost', 1, 0, 0, '2020-03-01 17:26:12', '2020-03-01 17:26:12'),
(2, NULL, 'Laravel Password Grant Client', 'bM4ttSXnvpLvGIjIiqX6D9GQcrzUQSfvbYJgcaKa', 'http://localhost', 0, 1, 0, '2020-03-01 17:26:12', '2020-03-01 17:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-01 17:26:12', '2020-03-01 17:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `code`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 53, '#542424242', 3, NULL, '2020-03-03 22:00:00', '2020-03-03 21:51:07'),
(26, 78, '#hRg1Dp', 7, NULL, '2020-03-07 16:41:54', '2020-03-12 10:41:21'),
(27, NULL, '#tFDmmL', 6, NULL, '2020-03-12 10:25:09', '2020-03-12 10:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_details`
--

CREATE TABLE `order_delivery_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mosque` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `mosque_lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mosque_long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_delivery_details`
--

INSERT INTO `order_delivery_details` (`id`, `item_id`, `mosque`, `city`, `address`, `mosque_lat`, `mosque_long`, `name`, `phone`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'مسجد سعد بن ابي وقاص', 'مكة المكرمة', NULL, '2.24155555555', '2.15555445554', 'احمد حماد', '+996622221115', NULL, NULL, '2020-03-03 22:00:00', '2020-03-03 22:00:00'),
(4, 5, 'الفتاح العليم', 'مكة', NULL, '2.33322564', '2.1145888', 'احمد محمد حسام', '+96665541', NULL, NULL, '2020-03-07 16:41:54', '2020-03-07 16:41:54'),
(5, 6, 'القهار العليم', 'مكة', NULL, '2.33322564', '2.1145888', 'ميدو محمد حسام', '+96665444541', NULL, NULL, '2020-03-07 16:41:55', '2020-03-07 16:41:55'),
(6, 7, 'الفتاح العليم', 'مكة', NULL, '2.33322564', '2.1145888', 'احمد محمد حسام', '+96665541', NULL, NULL, '2020-03-12 10:25:10', '2020-03-12 10:25:10'),
(7, 8, 'القهار العليم', 'مكة', NULL, '2.33322564', '2.1145888', 'ميدو محمد حسام', '+96665444541', NULL, NULL, '2020-03-12 10:25:11', '2020-03-12 10:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_finance`
--

CREATE TABLE `order_finance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `delivery` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `promo_code_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_finance`
--

INSERT INTO `order_finance` (`id`, `order_id`, `sub_total`, `discount`, `delivery`, `tax`, `payment_method`, `total`, `notes`, `promo_code_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1500, 10, 15, 2.2, 'باي بال', 1300, NULL, NULL, NULL, '2020-03-03 22:00:00', '2020-03-03 22:00:00'),
(2, 26, 3500, 0.2, 50, 0.1, 'paypal', 3250, NULL, 1, NULL, '2020-03-07 17:13:31', '2020-03-12 10:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2020-03-03 22:00:00', '2020-03-03 22:00:00'),
(5, 26, 1, 1, '2020-03-07 16:41:54', '2020-03-07 16:41:54'),
(6, 26, 2, 1, '2020-03-07 16:41:54', '2020-03-07 16:41:54'),
(7, 27, 1, 1, '2020-03-12 10:25:10', '2020-03-12 10:25:10'),
(8, 27, 2, 1, '2020-03-12 10:25:10', '2020-03-12 10:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kidwany60@gmail.com', '$2y$10$8PfOGLcBgHTBop9GyLHW6ONBqdfsNllBW355xWW3mGKeMysLmCeLO', '2020-03-13 20:22:12'),
('kidwany60@gmail.com', '1b182ba03921abd22c3e20ace96dd9128ec7f41b253bfe1ed3ba600a128839d6', '2020-03-13 20:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment_setting`
--

CREATE TABLE `payment_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `delivery` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_setting`
--

INSERT INTO `payment_setting` (`id`, `delivery`, `tax`, `created_at`, `updated_at`) VALUES
(1, 200, 0.2, '2020-03-06 22:00:00', '2020-03-14 17:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `image_id`, `price`, `weight`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'تمر السكري', 'Sokkary', 'تمر السكري تمر السكري', 'Sokkary Sokkary Sokkary', 4, 150, 10, 1, NULL, '2020-03-03 18:17:39', '2020-03-03 18:38:49'),
(2, 'تمر المدينة', 'Madinah Dates', 'نمر من مدينة الرسول صلى الله عليه و سلم', 'Dates From Madinah', 5, 450, 5, 1, NULL, '2020-03-07 14:46:19', '2020-03-07 14:46:19'),
(3, 'xajyz@mailinator.net', NULL, 'mazu@mailinator.net', NULL, 6, 376, 12, 2, NULL, '2020-04-24 21:35:42', '2020-04-24 21:35:42'),
(4, 'xujydav@mailinator.com', NULL, 'comike@mailinator.net', NULL, 8, 249, 50, 2, NULL, '2020-04-24 21:53:02', '2020-04-24 21:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `delivery` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`id`, `code`, `expire_date`, `type_id`, `percentage`, `amount`, `delivery`, `created_at`, `updated_at`) VALUES
(1, 'ramadan2020', '2020-04-03 22:00:00', NULL, NULL, 20, 0, '2020-04-03 21:52:06', '2020-04-03 21:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code_type`
--

CREATE TABLE `promo_code_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_code_type`
--

INSERT INTO `promo_code_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'خصم قيمة من إجمالي الطلب', '2020-04-02 22:00:00', '2020-04-02 22:00:00'),
(2, 'خصم نسبة من اجمالي الطلب', '2020-04-02 22:00:00', '2020-04-02 22:00:00'),
(3, 'خصم قيمة التوصيل', '2020-04-02 22:00:00', '2020-04-02 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code_user`
--

CREATE TABLE `promo_code_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `promo_code_id` int(10) UNSIGNED DEFAULT NULL,
  `using_times` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title_ar`, `title_en`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'نشط', 'Enabled', NULL, '2020-03-02 22:00:00', '2020-03-02 22:00:00'),
(2, 'معطل', 'Disabled', NULL, '2020-03-02 22:00:00', '2020-03-03 22:00:00'),
(3, 'في انتظار التوصيل', 'Waiting Shipping', NULL, '2020-03-02 22:00:00', '2020-03-02 22:00:00'),
(4, 'تم الشحن', 'Shipped', NULL, '2020-03-02 22:00:00', '2020-03-02 22:00:00'),
(5, 'تم التوصيل', 'Delivered', NULL, '2020-03-02 22:00:00', '2020-03-02 22:00:00'),
(6, 'تم انشاء الطلب', 'Order Created', NULL, '2020-03-06 22:00:00', '2020-03-06 22:00:00'),
(7, 'تم الدفع', 'Paid', NULL, '2020-03-11 22:00:00', '2020-03-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `total_user_orders`
--

CREATE TABLE `total_user_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_orders_count` int(11) NOT NULL DEFAULT '0',
  `total_orders_amount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_token` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` int(1) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `user_type_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `mobile_token`, `phone`, `platform`, `lang`, `status_id`, `user_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(53, NULL, 'Alessandra Jacobson', 'addison97@example.org', '2020-03-03 20:33:51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NTCZEkqFqW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-03 20:33:52', '2020-03-03 20:33:52'),
(78, '#UKiki', 'محمد كدواني', 'kidwany60@gmail.com', NULL, '$2y$10$bYmUqwUY2xlJmoMVId9HHOwMsq.WOZ8ops9Z9LKVDzgl96rA6KQim', 'VnXgTQ5hxSJ8D1dO4XcoiRXLWSvNjc4ntlJAk4N2HDXFgIq9iirw2kRNCJPQ', 'fW0a5UxjMAc:APA91bGsWQb73EJThcDEavJ4cog0czUl0l9adC3_ihc6Zu1cIVQ4i9YECQpJfc5_nphFEzcA0h_No-hJPdno6EgK6DCybmi0iqvIn0dCdzXdGf0A2cUS5PLJKZ24NaxJMUg05PSnU4qh', '0110022255', 1, 'en', 1, 2, NULL, '2020-03-06 18:25:47', '2020-03-13 19:10:50'),
(126, '#Uمki', 'محمد', 'kidwany700@gmail.com', NULL, '$2y$10$9mHN8pwYx9Wp8NUGMwgSQ.pWR.PkLJoYS4DZbwg3oa9H.bI/RcG3m', NULL, 'fW0a5UxjMAc:APA91bGsWQb73EJThcDEavJ4cog0czUl0l9adC3_ihc6Zu1cIVQ4i9YECQpJfc5_nphFEzcA0h_No-hJPdno6EgK6DCybmi0iqvIn0dCdzXdGf0A2cUS5PLJKZ24NaxJMUg05PSnU4qh', '0110022255', 1, 'en', 1, 1, NULL, '2020-04-01 21:49:18', '2020-04-01 21:49:18'),
(128, '#Uمki', 'محمد', 'kidwany70@gmail.com', NULL, '$2y$10$4eQ/849n4qJZiqxMS4GVdeEhKPC6Kcs96CU2YOGVDr9//sWShsrfu', NULL, 'cFHN1r_BJus:APA91bGW62xi82t85cEeQk9HccVO81eqVsarpp0yzLbjTrTJhy2g0ovlmDHEksJi84mGR1TFbw7befID82oCgkNwXj4oAYhAHQQySQ-3rOJewQOaqeg7IYByX69plwyTJu-MLlV3QSTm', '0110022255', 1, 'en', 1, 1, NULL, '2020-04-24 22:22:27', '2020-05-07 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_types`
--

CREATE TABLE `users_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_types`
--

INSERT INTO `users_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'User', '2020-01-14 22:00:00', '2020-01-14 22:00:00'),
(2, 'Admin', '2020-01-14 22:00:00', '2020-01-14 22:00:00'),
(3, 'Admin', '2020-01-17 05:00:00', '2020-01-17 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 126, 'adscvdcvadsvasdvasv', '2020-04-23 22:00:00', '2020-04-23 22:00:00'),
(2, NULL, 'asvdabgdnhjhfmk.lil;lfjghklu;tgmxcbvnxbv', '2020-04-23 22:00:00', '2020-04-23 22:00:00'),
(5, 128, 'cFHN1r_BJus:APA91bGW62xi82t85cEeQk9HccVO81eqVsarpp0yzLbjTrTJhy2g0ovlmDHEksJi84mGR1TFbw7befID82oCgkNwXj4oAYhAHQQySQ-3rOJewQOaqeg7IYByX69plwyTJu-MLlV3QSTm', '2020-04-24 22:22:28', '2020-05-07 16:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 78, '2028', '2020-04-24 13:39:33', '2020-04-24 13:39:33'),
(3, 128, '2592', '2020-04-24 22:22:28', '2020-04-24 22:22:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_transfer_order_id_foreign` (`order_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_status_id` (`status_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_foreign` (`notifiable_id`),
  ADD KEY `notifications_sent_from_foreign` (`sent_from`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Indexes for table `order_delivery_details`
--
ALTER TABLE `order_delivery_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_delivery_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `order_finance`
--
ALTER TABLE `order_finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_finance_order_id_foreign` (`order_id`),
  ADD KEY `promo_code_id` (`promo_code_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_setting`
--
ALTER TABLE `payment_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_id_foreign` (`image_id`),
  ADD KEY `product_status_id_foreign` (`status_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_code_type_id` (`type_id`);

--
-- Indexes for table `promo_code_type`
--
ALTER TABLE `promo_code_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_code_user`
--
ALTER TABLE `promo_code_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_code_user_id` (`promo_code_id`),
  ADD KEY `user_id_promo_code` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_user_orders`
--
ALTER TABLE `total_user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_user_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `userTypeIdFK` (`user_type_id`),
  ADD KEY `userStatusId` (`status_id`);

--
-- Indexes for table `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokenUserid` (`user_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_delivery_details`
--
ALTER TABLE `order_delivery_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_finance`
--
ALTER TABLE `order_finance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_setting`
--
ALTER TABLE `payment_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo_code_type`
--
ALTER TABLE `promo_code_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo_code_user`
--
ALTER TABLE `promo_code_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `total_user_orders`
--
ALTER TABLE `total_user_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users_types`
--
ALTER TABLE `users_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD CONSTRAINT `bank_transfer_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_notifiable_id_foreign` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_sent_from_foreign` FOREIGN KEY (`sent_from`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_delivery_details`
--
ALTER TABLE `order_delivery_details`
  ADD CONSTRAINT `order_delivery_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_finance`
--
ALTER TABLE `order_finance`
  ADD CONSTRAINT `order_finance_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promo_code_id` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `product_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD CONSTRAINT `promo_code_type_id` FOREIGN KEY (`type_id`) REFERENCES `promo_code_type` (`id`);

--
-- Constraints for table `promo_code_user`
--
ALTER TABLE `promo_code_user`
  ADD CONSTRAINT `promo_code_user_id` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_promo_code` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `total_user_orders`
--
ALTER TABLE `total_user_orders`
  ADD CONSTRAINT `total_user_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `userStatusId` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `userTypeIdFK` FOREIGN KEY (`user_type_id`) REFERENCES `users_types` (`id`);

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `tokenUserid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `verification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
