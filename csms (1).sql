-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2021 at 10:58 AM
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
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `approver_settings`
--

DROP TABLE IF EXISTS `approver_settings`;
CREATE TABLE IF NOT EXISTS `approver_settings` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `stock_category_id` int NOT NULL,
  `amount` bigint NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approver_settings`
--

INSERT INTO `approver_settings` (`id`, `stock_category_id`, `amount`) VALUES
(1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EVID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_From` datetime NOT NULL,
  `Date_To` datetime NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Event_Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int DEFAULT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EVID`),
  KEY `Event_Type` (`Event_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE IF NOT EXISTS `event_types` (
  `ETID` int NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ETID`),
  UNIQUE KEY `Type_Name` (`Type_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`ETID`, `Type_Name`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(4, 'Corporate events', 'B', 'MA', 2, 2, '2021-07-02 06:02:53', '2021-07-02 06:02:53'),
(5, 'Holiday events', 'B', 'MA', 2, 2, '2021-07-02 06:03:05', '2021-07-02 06:03:05'),
(6, 'Concerts', 'B', 'MA', 2, 2, '2021-07-02 06:03:24', '2021-07-02 06:03:24'),
(7, 'Inbar Activations', 'B', 'MA', 2, 2, '2021-07-02 06:03:32', '2021-07-02 06:03:32'),
(8, 'Social events', 'B', 'MA', 2, 2, '2021-07-02 06:03:40', '2021-07-02 06:03:40'),
(9, 'Exhibitions', 'B', 'MA', 2, 2, '2021-07-02 06:03:47', '2021-07-02 06:03:47'),
(10, 'Traditional & Cultural Events', 'B', 'MA', 2, 2, '2021-07-02 06:03:56', '2021-07-02 06:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `item_requests`
--

DROP TABLE IF EXISTS `item_requests`;
CREATE TABLE IF NOT EXISTS `item_requests` (
  `IRID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Requester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Responsible_person_BGI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_Number_BGI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Responsible_person_Client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Number_Client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Return_date` date NOT NULL,
  `Transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction_Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApprovalOne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApprovalTwo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Posted` enum('Posted','Not_Posted') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not_Posted',
  `Issued` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IRID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2021_01_11_121644_create_event_type_table', 1),
(23, '2021_01_11_121644_create_stock_brands_table', 1),
(24, '2021_01_11_121644_create_stock_categorys_table', 1),
(25, '2021_01_11_121644_create_stock_colors_table', 1),
(26, '2021_01_11_121644_create_stock_fabrics_table', 1),
(27, '2021_01_11_121644_create_stock_manufacturers_table', 1),
(28, '2021_01_11_121644_create_stock_movements_table', 1),
(29, '2021_01_11_121644_create_stock_stock_rooms_table', 1),
(30, '2021_01_11_121644_create_stocks_table', 1),
(31, '2021_01_12_120955_create_stock_items_table', 1),
(32, '2021_01_28_192006_create_permission_tables', 1),
(33, '2021_01_29_192006_create_Events_tables', 1),
(34, '2021_01_29_192006_create_Item_requests_tables', 1),
(35, '2021_01_29_192006_create_reqested_item_lists_tables', 1),
(36, '2021_01_29_192006_create_stock_users_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abenezer.ayalneh@castel-afrique.com', '$2y$10$fYuMw9sMErGz4DMzqbgceurSc8JcY.u5a4O2i7XPIx0M/6pRkRxEu', '2021-06-15 03:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Configration', 'web', '2021-03-04 16:02:27', '2021-03-04 16:02:27'),
(3, 'Normal', 'web', '2021-06-15 05:50:20', '2021-06-15 05:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `reqested_item_lists`
--

DROP TABLE IF EXISTS `reqested_item_lists`;
CREATE TABLE IF NOT EXISTS `reqested_item_lists` (
  `RILID` int NOT NULL AUTO_INCREMENT,
  `Request_ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ItemCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Approval1Quantity` int DEFAULT NULL,
  `Approval2Quantity` int DEFAULT NULL,
  `IssuedQuantity` int DEFAULT NULL,
  `Issued` int DEFAULT NULL,
  `Item_Remaining` int DEFAULT NULL,
  `Qty` int DEFAULT NULL,
  `File_Path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image_Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Damage_Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`RILID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-03-04 16:02:27', '2021-03-04 16:02:27'),
(3, 'User', 'web', '2021-06-15 05:50:20', '2021-06-15 05:50:20'),
(4, 'Approver_One', 'web', '2021-06-17 02:17:35', '2021-06-17 02:17:35'),
(5, 'Approver_Two', 'web', '2021-06-17 02:17:44', '2021-06-17 02:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `SID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` double NOT NULL DEFAULT '0',
  `MAX` double DEFAULT NULL,
  `MIN` double DEFAULT NULL,
  `Asset_No` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reorder_Point` double DEFAULT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`SID`, `Company`, `Department`, `Stock_Room`, `Item`, `Quantity`, `MAX`, `MIN`, `Asset_No`, `Reorder_Point`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', '1', '1', 18, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(2, 'B', 'MA', '2', '2', 16, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(3, 'B', 'MA', '3', '3', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(4, 'B', 'MA', '4', '4', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(5, 'B', 'MA', '5', '5', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(6, 'B', 'MA', '1', '6', 18, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(7, 'B', 'MA', '2', '7', 12, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(8, 'B', 'MA', '3', '8', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(9, 'B', 'MA', '4', '9', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(10, 'B', 'MA', '5', '10', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(11, 'B', 'MA', '1', '11', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(12, 'B', 'MA', '2', '12', 11, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(13, 'B', 'MA', '1', '13', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(14, 'B', 'MA', '2', '14', 8, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(15, 'B', 'MA', '1', '15', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(16, 'B', 'MA', '2', '16', 7, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(17, 'B', 'MA', '1', '17', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(18, 'B', 'MA', '2', '18', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(19, 'B', 'MA', '3', '19', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(20, 'B', 'MA', '4', '20', 4, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(21, 'B', 'MA', '5', '21', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(22, 'B', 'MA', '1', '22', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(23, 'B', 'MA', '1', '23', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(24, 'B', 'MA', '2', '24', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(25, 'B', 'MA', '1', '25', 8, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(26, 'B', 'MA', '2', '26', 13, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(27, 'B', 'MA', '2', '27', 8, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(28, 'B', 'MA', '1', '28', 938, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(29, 'B', 'MA', '1', '29', 130, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(30, 'B', 'MA', '1', '30', 60, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(31, 'B', 'MA', '1', '31', 9, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(32, 'B', 'MA', '1', '32', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(33, 'B', 'MA', '1', '33', 40, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(34, 'B', 'MA', '1', '34', 100, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(35, 'B', 'MA', '1', '35', 60, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(36, 'B', 'MA', '1', '36', 14, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(37, 'B', 'MA', '1', '37', 64, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(38, 'B', 'MA', '1', '38', 18, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(39, 'B', 'MA', '1', '39', 90, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(40, 'B', 'MA', '1', '40', 18, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(41, 'B', 'MA', '2', '41', 120, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(42, 'B', 'MA', '2', '42', 32, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(43, 'B', 'MA', '2', '43', 36, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(44, 'B', 'MA', '2', '44', 30, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(45, 'B', 'MA', '2', '45', 17, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(46, 'B', 'MA', '2', '46', 9, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(47, 'B', 'MA', '2', '47', 14, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(48, 'B', 'MA', '2', '48', 7, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(49, 'B', 'MA', '2', '49', 204, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(50, 'B', 'MA', '2', '50', 33, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(51, 'B', 'MA', '2', '51', 65, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(52, 'B', 'MA', '2', '52', 17, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:37'),
(53, 'B', 'MA', '4', '53', 79, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(54, 'B', 'MA', '4', '54', 35, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(55, 'B', 'MA', '4', '55', 25, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(56, 'B', 'MA', '3', '56', 8, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(57, 'B', 'MA', '2', '57', 21, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(58, 'B', 'MA', '4', '58', 32, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(59, 'B', 'MA', '1', '59', 18, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(60, 'B', 'MA', '1', '60', 8, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(61, 'B', 'MA', '2', '61', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(62, 'B', 'MA', '1', '62', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(63, 'B', 'MA', '1', '63', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(64, 'B', 'MA', '1', '64', 55, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(65, 'B', 'MA', '1', '65', 200, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(66, 'B', 'MA', '1', '66', 44, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(67, 'B', 'MA', '1', '67', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(68, 'B', 'MA', '2', '68', 4, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(69, 'B', 'MA', '1', '69', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(70, 'B', 'MA', '3', '70', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(71, 'B', 'MA', '3', '71', 9, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(72, 'B', 'MA', '1', '72', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(73, 'B', 'MA', '1', '73', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(74, 'B', 'MA', '1', '74', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(75, 'B', 'MA', '2', '75', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(76, 'B', 'MA', '3', '76', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(77, 'B', 'MA', '5', '77', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(78, 'B', 'MA', '3', '78', 100, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(79, 'B', 'MA', '1', '79', 1000, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(80, 'B', 'MA', '2', '80', 500, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(81, 'B', 'MA', '3', '81', 2000, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(82, 'B', 'MA', '1', '82', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(83, 'B', 'MA', '2', '83', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(84, 'B', 'MA', '3', '84', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(85, 'B', 'MA', '4', '85', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(86, 'B', 'MA', '1', '86', 20, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(87, 'B', 'MA', '2', '87', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(88, 'B', 'MA', '3', '88', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(89, 'B', 'MA', '4', '89', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(90, 'B', 'MA', '5', '90', 45, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(91, 'B', 'MA', '1', '91', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(92, 'B', 'MA', '2', '92', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(93, 'B', 'MA', '1', '93', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(94, 'B', 'MA', '2', '94', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(95, 'B', 'MA', '1', '95', 20, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(96, 'B', 'MA', '2', '96', 20, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(97, 'B', 'MA', '3', '97', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(98, 'B', 'MA', '4', '98', 20, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(99, 'B', 'MA', '5', '99', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(100, 'B', 'MA', '1', '100', 25, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(101, 'B', 'MA', '2', '101', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(102, 'B', 'MA', '4', '102', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(103, 'B', 'MA', '1', '103', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(104, 'B', 'MA', '2', '104', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(105, 'B', 'MA', '3', '105', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(106, 'B', 'MA', '4', '106', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(107, 'B', 'MA', '5', '107', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(108, 'B', 'MA', '1', '108', 25, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(109, 'B', 'MA', '2', '109', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(110, 'B', 'MA', '3', '110', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(111, 'B', 'MA', '4', '111', 10, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(112, 'B', 'MA', '5', '112', 6, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(113, 'B', 'MA', '1', '113', 100, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(114, 'B', 'MA', '2', '114', 50, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(115, 'B', 'MA', '3', '115', 40, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(116, 'B', 'MA', '1', '116', 100, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(117, 'B', 'MA', '2', '117', 50, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(118, 'B', 'MA', '3', '118', 40, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(119, 'B', 'MA', '1', '119', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(120, 'B', 'MA', '2', '120', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(121, 'B', 'MA', '3', '121', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(122, 'B', 'MA', '4', '122', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(123, 'B', 'MA', '1', '123', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(124, 'B', 'MA', '2', '124', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(125, 'B', 'MA', '3', '125', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(126, 'B', 'MA', '1', '126', 50, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(127, 'B', 'MA', '2', '127', 50, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(128, 'B', 'MA', '3', '128', 15, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(129, 'B', 'MA', '4', '129', 25, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(130, 'B', 'MA', '1', '130', 50, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(131, 'B', 'MA', '1', '131', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(132, 'B', 'MA', '2', '132', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(133, 'B', 'MA', '3', '133', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(134, 'B', 'MA', '4', '134', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(135, 'B', 'MA', '5', '135', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(136, 'B', 'MA', '1', '136', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(137, 'B', 'MA', '2', '137', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(138, 'B', 'MA', '3', '138', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(139, 'B', 'MA', '4', '139', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(140, 'B', 'MA', '5', '140', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(141, 'B', 'MA', '1', '141', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(142, 'B', 'MA', '2', '142', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(143, 'B', 'MA', '3', '143', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(144, 'B', 'MA', '4', '144', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(145, 'B', 'MA', '5', '145', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(146, 'B', 'MA', '1', '146', 5, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(147, 'B', 'MA', '2', '147', 4, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(148, 'B', 'MA', '3', '148', 4, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(149, 'B', 'MA', '4', '149', 3, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(150, 'B', 'MA', '5', '150', 2, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(151, 'B', 'MA', '1', '151', 75, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(152, 'B', 'MA', '4', '152', 200, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(153, 'B', 'MA', '5', '153', 28, NULL, NULL, NULL, NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(154, 'B', 'MA', '1', '154', 1, NULL, NULL, '3218', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(155, 'B', 'MA', '1', '155', 1, NULL, NULL, '22688', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(156, 'B', 'MA', '1', '156', 1, NULL, NULL, 'SINGLE_DOOR1', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(157, 'B', 'MA', '2', '157', 1, NULL, NULL, '22598', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(158, 'B', 'MA', '2', '158', 1, NULL, NULL, '22881', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(159, 'B', 'MA', '2', '159', 1, NULL, NULL, 'DOUBLE_DOOR1', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(160, 'B', 'MA', '2', '160', 1, NULL, NULL, 'DOUBLE_DOOR2', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(161, 'B', 'MA', '4', '161', 1, NULL, NULL, '22687', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(162, 'B', 'MA', '1', '162', 1, NULL, NULL, '21440', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(163, 'B', 'MA', '1', '163', 1, NULL, NULL, '21430', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(164, 'B', 'MA', '1', '164', 1, NULL, NULL, '21423', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(165, 'B', 'MA', '1', '165', 1, NULL, NULL, '21435', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(166, 'B', 'MA', '1', '166', 1, NULL, NULL, '21421', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(167, 'B', 'MA', '1', '167', 1, NULL, NULL, '21433', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(168, 'B', 'MA', '1', '168', 1, NULL, NULL, '21434', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(169, 'B', 'MA', '1', '169', 1, NULL, NULL, '21425', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(170, 'B', 'MA', '1', '170', 1, NULL, NULL, '21428', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(171, 'B', 'MA', '1', '171', 1, NULL, NULL, '21439', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(172, 'B', 'MA', '1', '172', 1, NULL, NULL, '21437', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(173, 'B', 'MA', '1', '173', 1, NULL, NULL, '21436', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(174, 'B', 'MA', '1', '174', 1, NULL, NULL, '21438', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(175, 'B', 'MA', '1', '175', 1, NULL, NULL, '21426', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(176, 'B', 'MA', '1', '176', 1, NULL, NULL, '21420', NULL, 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(177, 'B', 'MA', '1', '177', 1, NULL, NULL, 'Chilli1', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(178, 'B', 'MA', '1', '178', 1, NULL, NULL, 'Chilli2', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(179, 'B', 'MA', '1', '179', 1, NULL, NULL, 'Chilli3', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(180, 'B', 'MA', '1', '180', 1, NULL, NULL, 'Chilli4', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(181, 'B', 'MA', '1', '181', 1, NULL, NULL, 'Chilli5', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(182, 'B', 'MA', '1', '182', 1, NULL, NULL, 'Chilli6', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(183, 'B', 'MA', '1', '183', 1, NULL, NULL, 'Chilli7', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(184, 'B', 'MA', '1', '184', 1, NULL, NULL, 'Chilli8', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(185, 'B', 'MA', '1', '185', 1, NULL, NULL, 'Chilli9', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(186, 'B', 'MA', '1', '186', 1, NULL, NULL, '1824', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(187, 'B', 'MA', '1', '187', 1, NULL, NULL, '1531', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(188, 'B', 'MA', '1', '188', 1, NULL, NULL, '2347', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(189, 'B', 'MA', '1', '189', 1, NULL, NULL, '1489', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(190, 'B', 'MA', '1', '190', 1, NULL, NULL, '1255', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(191, 'B', 'MA', '1', '191', 1, NULL, NULL, '2116', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(192, 'B', 'MA', '1', '192', 1, NULL, NULL, '2606', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(193, 'B', 'MA', '1', '193', 1, NULL, NULL, '1550', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(194, 'B', 'MA', '1', '194', 1, NULL, NULL, '1248', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(195, 'B', 'MA', '1', '195', 1, NULL, NULL, '2348', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(196, 'B', 'MA', '1', '196', 1, NULL, NULL, '628', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(197, 'B', 'MA', '1', '197', 1, NULL, NULL, 'CONTOUR1', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(198, 'B', 'MA', '1', '198', 1, NULL, NULL, 'CONTOUR2', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(199, 'B', 'MA', '1', '199', 1, NULL, NULL, '21934', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(200, 'B', 'MA', '1', '200', 1, NULL, NULL, '21932', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(201, 'B', 'MA', '1', '201', 1, NULL, NULL, '21933', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(202, 'B', 'MA', '1', '202', 1, NULL, NULL, '21929', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(203, 'B', 'MA', '1', '203', 1, NULL, NULL, 'TOP_COUNTER1', NULL, 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(204, 'B', 'MA', '1', '204', 1, NULL, NULL, 'TOP_COUNTER2', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(205, 'B', 'MA', '1', '205', 1, NULL, NULL, '14769', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(206, 'B', 'MA', '1', '206', 1, NULL, NULL, '14770', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(207, 'B', 'MA', '1', '207', 1, NULL, NULL, '14613', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(208, 'B', 'MA', '1', '208', 1, NULL, NULL, '14706', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(209, 'B', 'MA', '1', '209', 1, NULL, NULL, '17692', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(210, 'B', 'MA', '1', '210', 1, NULL, NULL, '17696', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(211, 'B', 'MA', '1', '211', 1, NULL, NULL, '14709', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(212, 'B', 'MA', '1', '212', 1, NULL, NULL, '14768', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(213, 'B', 'MA', '1', '213', 1, NULL, NULL, 'DEEP_FRIDGE1', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(214, 'B', 'MA', '1', '214', 1, NULL, NULL, 'DEEP_FRIDGE2', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(215, 'B', 'MA', '1', '215', 1, NULL, NULL, 'DEEP_FRIDGE3', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(216, 'B', 'MA', '1', '216', 1, NULL, NULL, 'DEEP_FRIDGE4', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(217, 'B', 'MA', '1', '217', 1, NULL, NULL, 'DEEP_FRIDGE5', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(218, 'B', 'MA', '1', '218', 1, NULL, NULL, 'DEEP_FRIDGE6', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(219, 'B', 'MA', '1', '219', 1, NULL, NULL, 'DEEP_FRIDGE7', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(220, 'B', 'MA', '1', '220', 1, NULL, NULL, 'DEEP_FRIDGE8', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(221, 'B', 'MA', '1', '221', 1, NULL, NULL, 'DEEP_FRIDGE9', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(222, 'B', 'MA', '1', '222', 1, NULL, NULL, 'DEEP_FRIDGE10', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(223, 'B', 'MA', '1', '223', 1, NULL, NULL, 'DEEP_FRIDGE11', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(224, 'B', 'MA', '1', '224', 1, NULL, NULL, 'DEEP_FRIDGE12', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(225, 'B', 'MA', '1', '225', 1, NULL, NULL, 'DEEP_FRIDGE13', NULL, 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `stock_brands`
--

DROP TABLE IF EXISTS `stock_brands`;
CREATE TABLE IF NOT EXISTS `stock_brands` (
  `SBID` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SBID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_brands`
--

INSERT INTO `stock_brands` (`SBID`, `Type`, `Brand`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'Tent', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(2, 'Tent', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(3, 'Tent', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(4, 'Tent', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(5, 'Tent', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(6, 'Chair', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(7, 'Table', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(8, 'Stool', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(9, 'Chair', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(10, 'Table', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(11, 'Chair', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(12, 'Table', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(13, 'Chair', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(14, 'Umbrella', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(15, 'Umbrella', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(16, 'Umbrella', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(17, 'Draught Cooler', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(18, 'Co2', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(19, 'Case', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(20, 'Keg', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(21, 'Ice Box', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(22, 'Ice Box', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(23, 'Fridge', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(24, 'Fridge', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(25, 'Generator', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(26, 'Banner', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(27, 'Banner', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(28, 'Banner', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(29, 'Banner', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(30, 'Bean Bag', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(31, 'Light Box', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(32, 'Light Box', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(33, 'Light Box', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(34, 'Light Box', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(35, 'Banner', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(36, 'Bean', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(37, 'Ex-Star', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(38, 'Ex-Star', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(39, 'Ex-T', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(40, 'Ex-T', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(41, 'Ex-T', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(42, 'Ex-T', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(43, 'Ex-T', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(44, 'Ex-Up', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(45, 'Ex-Up', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(46, 'Ex-Up', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(47, 'Ex-Up', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(48, 'Ex-Up', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(49, 'Bottle', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(50, 'Bottle', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(51, 'Bottle', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(52, 'Bottle', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(53, 'Wonda Sign', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(54, 'Wonda Sign', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(55, 'Wonda Sign', 'SENQ', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(56, 'Wonda Sign', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(57, 'Wonda Sign', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(58, 'T-Shirt', 'ST GEORGE', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(59, 'Sweater', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(60, 'Sweater', 'BGI CORPORATE', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(61, 'Fridge', 'CASTEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(62, 'Fridge', 'DOPPEL', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `stock_categorys`
--

DROP TABLE IF EXISTS `stock_categorys`;
CREATE TABLE IF NOT EXISTS `stock_categorys` (
  `STID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`STID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_categorys`
--

INSERT INTO `stock_categorys` (`STID`, `Company`, `Department`, `Type`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'TENT', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(2, 'B', 'MA', 'CHAIR', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(3, 'B', 'MA', 'TABLE', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(4, 'B', 'MA', 'STOOL', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(5, 'B', 'MA', 'UMBRELLA', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(6, 'B', 'MA', 'DRAUGHT COOLER', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(7, 'B', 'MA', 'CO2', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(8, 'B', 'MA', 'CASE', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(9, 'B', 'MA', 'KEG', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(10, 'B', 'MA', 'ICE BOX', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(11, 'B', 'MA', 'FRIDGE', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(12, 'B', 'MA', 'GENERATOR', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(13, 'B', 'MA', 'BANNER', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(14, 'B', 'MA', 'BEAN BAG', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(15, 'B', 'MA', 'LIGHT BOX', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(16, 'B', 'MA', 'BEAN', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(17, 'B', 'MA', 'EX-STAR', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(18, 'B', 'MA', 'EX-T', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(19, 'B', 'MA', 'EX-UP', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(20, 'B', 'MA', 'BOTTLE', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(21, 'B', 'MA', 'WONDA SIGN', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(22, 'B', 'MA', 'T-SHIRT', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(23, 'B', 'MA', 'SWEATER', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `stock_colors`
--

DROP TABLE IF EXISTS `stock_colors`;
CREATE TABLE IF NOT EXISTS `stock_colors` (
  `SCID` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_colors`
--

INSERT INTO `stock_colors` (`SCID`, `Type`, `Color`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'Chair', 'White', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(2, 'Chair', 'Mesh', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(3, 'Table', 'Black', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(4, 'Chair', 'Black', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `stock_fabrics`
--

DROP TABLE IF EXISTS `stock_fabrics`;
CREATE TABLE IF NOT EXISTS `stock_fabrics` (
  `SFID` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fabric` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SFID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_fabrics`
--

INSERT INTO `stock_fabrics` (`SFID`, `Type`, `Fabric`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'Chair', 'Metal', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(2, 'Table', 'Metal', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(3, 'Chair', 'Wooden', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(4, 'Table', 'Wooden', 'B', 'MA', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(5, 'Stool', 'Metal', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(6, 'Chair', 'Plastic', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(7, 'Table', 'Plastic', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(8, 'Chair', 'Keg', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(9, 'Table', 'Keg', 'B', 'MA', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(10, 'Ex-T', 'Roll Up', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(11, 'Ex-T', 'Reflective', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(12, 'Ex-Up', 'Vertical', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(13, 'Ex-Up', 'Horizontal', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(14, 'Banner', 'Flying', 'B', 'MA', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(15, 'Bottle', 'Inflatable', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(16, 'Banner', 'Lantern', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(17, 'Light Box', 'Out Door', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(18, 'Wonda Sign', 'Elliptical', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(19, 'Wonda Sign', 'Round', 'B', 'MA', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(20, 'Draught Cooler', 'Dav', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(21, 'Draught Cooler', '2-Line', 'B', 'MA', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

DROP TABLE IF EXISTS `stock_items`;
CREATE TABLE IF NOT EXISTS `stock_items` (
  `SIID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item_Code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Asset_Noo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fabric` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manufacturer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Countable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Journal_Number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SIID`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`SIID`, `Company`, `Department`, `Item_Code`, `Asset_Noo`, `Size`, `Fabric`, `Color`, `Type`, `Brand`, `Manufacturer`, `Countable`, `Journal_Number`, `Status`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', '3X3_TENT', NULL, '3x3', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(2, 'B', 'MA', '3X3_TENT', NULL, '3x3', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(3, 'B', 'MA', '3X3_TENT', NULL, '3x3', '', '', 'Tent', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(4, 'B', 'MA', '3X3_TENT', NULL, '3x3', '', '', 'Tent', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(5, 'B', 'MA', '3X3_TENT', NULL, '3x3', '', '', 'Tent', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(6, 'B', 'MA', '3X3(GAZEBO)_TENT', NULL, '3x3(gazebo)', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(7, 'B', 'MA', '3X3(GAZEBO)_TENT', NULL, '3x3(gazebo)', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(8, 'B', 'MA', '3X3(GAZEBO)_TENT', NULL, '3x3(gazebo)', '', '', 'Tent', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(9, 'B', 'MA', '3X3(GAZEBO)_TENT', NULL, '3x3(gazebo)', '', '', 'Tent', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(10, 'B', 'MA', '3X3(GAZEBO)_TENT', NULL, '3x3(gazebo)', '', '', 'Tent', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(11, 'B', 'MA', '4X4_TENT', NULL, '4x4', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(12, 'B', 'MA', '4X4_TENT', NULL, '4x4', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(13, 'B', 'MA', '5X5_TENT', NULL, '5x5', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(14, 'B', 'MA', '5X5_TENT', NULL, '5x5', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(15, 'B', 'MA', '6X6_TENT', NULL, '6x6', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(16, 'B', 'MA', '6X6_TENT', NULL, '6x6', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(17, 'B', 'MA', '6X3_TENT', NULL, '6x3', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(18, 'B', 'MA', '6X3_TENT', NULL, '6x3', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(19, 'B', 'MA', '6X3_TENT', NULL, '6x3', '', '', 'Tent', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(20, 'B', 'MA', '6X3_TENT', NULL, '6x3', '', '', 'Tent', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(21, 'B', 'MA', '6X3_TENT', NULL, '6x3', '', '', 'Tent', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(22, 'B', 'MA', '8X8_TENT', NULL, '8x8', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(23, 'B', 'MA', 'FOLDING_TENT', NULL, 'Folding', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(24, 'B', 'MA', 'FOLDING_TENT', NULL, 'Folding', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(25, 'B', 'MA', 'DOME_TENT', NULL, 'Dome', '', '', 'Tent', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(26, 'B', 'MA', 'DOME_TENT', NULL, 'Dome', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(27, 'B', 'MA', 'STAR_TENT', NULL, 'Star', '', '', 'Tent', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(28, 'B', 'MA', 'METAL_CHAIR', NULL, '', 'Metal', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(29, 'B', 'MA', 'METAL_TABLE', NULL, '', 'Metal', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(30, 'B', 'MA', 'WOODEN_CHAIR', NULL, '', 'Wooden', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(31, 'B', 'MA', 'WOODEN_TABLE', NULL, '', 'Wooden', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(32, 'B', 'MA', 'HIGH_TABLE', NULL, 'High', '', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(33, 'B', 'MA', 'METAL_HIGH_CHAIR', NULL, 'High', 'Metal', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(34, 'B', 'MA', 'METAL_STOOL', NULL, '', 'Metal', '', 'Stool', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:35', '2021-07-07 05:15:35'),
(35, 'B', 'MA', 'PLASTIC_CHAIR', NULL, '', 'Plastic', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(36, 'B', 'MA', 'PLASTIC_TABLE', NULL, '', 'Plastic', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(37, 'B', 'MA', 'FOLDING_CHAIR', NULL, 'Folding', '', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(38, 'B', 'MA', 'FOLDING_TABLE', NULL, 'Folding', '', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(39, 'B', 'MA', 'KEG_CHAIR', NULL, '', 'Keg', '', 'Chair', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(40, 'B', 'MA', 'KEG_TABLE', NULL, '', 'Keg', '', 'Table', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(41, 'B', 'MA', 'PLASTIC_CHAIR', NULL, '', 'Plastic', '', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(42, 'B', 'MA', 'PLASTIC_TABLE', NULL, '', 'Plastic', '', 'Table', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(43, 'B', 'MA', 'METAL_CHAIR_WHITE', NULL, '', 'Metal', 'White', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(44, 'B', 'MA', 'METAL_CHAIR_MESH', NULL, '', 'Metal', 'Mesh', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(45, 'B', 'MA', 'WOODEN_TABLE_BLACK', NULL, '', 'Wooden', 'Black', 'Table', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(46, 'B', 'MA', 'METAL_HIGH_CHAIR_WHITE', NULL, 'High', 'Metal', 'White', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(47, 'B', 'MA', 'METAL_HIGH_CHAIR_BLACK', NULL, 'High', 'Metal', 'Black', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(48, 'B', 'MA', 'ROUND_CHAIR', NULL, 'Round', '', '', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(49, 'B', 'MA', 'WOODEN_CHAIR', NULL, '', 'Wooden', '', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(50, 'B', 'MA', 'WOODEN_TABLE', NULL, '', 'Wooden', '', 'Table', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(51, 'B', 'MA', 'WOODEN_HIGH_CHAIR', NULL, 'High', 'Wooden', '', 'Chair', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(52, 'B', 'MA', 'WOODEN_HIGH_TABLE', NULL, 'High', 'Wooden', '', 'Table', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:36', '2021-07-07 05:15:36'),
(53, 'B', 'MA', 'METAL_CHAIR', NULL, '', 'Metal', '', 'Chair', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(54, 'B', 'MA', 'METAL_TABLE', NULL, '', 'Metal', '', 'Table', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(55, 'B', 'MA', 'WOODEN_HIGH_TABLE', NULL, 'High', 'Wooden', '', 'Table', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(56, 'B', 'MA', 'METAL_CHAIR', NULL, '', 'Metal', '', 'Chair', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(57, 'B', 'MA', 'REGULAR_UMBRELLA', NULL, 'Regular', '', '', 'Umbrella', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(58, 'B', 'MA', 'REGULAR_UMBRELLA', NULL, 'Regular', '', '', 'Umbrella', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(59, 'B', 'MA', 'SIDE_UMBRELLA', NULL, 'Side', '', '', 'Umbrella', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(60, 'B', 'MA', 'BEACH_UMBRELLA', NULL, 'Beach', '', '', 'Umbrella', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(61, 'B', 'MA', 'BEACH_UMBRELLA', NULL, 'Beach', '', '', 'Umbrella', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(62, 'B', 'MA', 'V-SERVICE_DRAUGHT COOLER', NULL, 'V-service', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(63, 'B', 'MA', 'DRY_DRAUGHT COOLER', NULL, 'Dry', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(64, 'B', 'MA', 'CYLINDER_CO2', NULL, 'Cylinder', '', '', 'Co2', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(65, 'B', 'MA', 'CASE', NULL, '', '', '', 'Case', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(66, 'B', 'MA', 'KEG', NULL, '', '', '', 'Keg', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(67, 'B', 'MA', 'ICE BOX', NULL, '', '', '', 'Ice Box', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(68, 'B', 'MA', 'ICE BOX', NULL, '', '', '', 'Ice Box', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(69, 'B', 'MA', 'DOUBLE DOOR_FRIDGE', NULL, 'Double Door', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(70, 'B', 'MA', 'SINGLE DOOR_FRIDGE', NULL, 'Single Door', '', '', 'Fridge', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(71, 'B', 'MA', 'UP RIGHT_FRIDGE', NULL, 'Up Right', '', '', 'Fridge', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(72, 'B', 'MA', '20K_GENERATOR', NULL, '20k', '', '', 'Generator', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:37', '2021-07-07 05:15:37'),
(73, 'B', 'MA', '10K_GENERATOR', NULL, '10k', '', '', 'Generator', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(74, 'B', 'MA', 'BACK WALL_BANNER', NULL, 'Back Wall', '', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(75, 'B', 'MA', 'BACK WALL_BANNER', NULL, 'Back Wall', '', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(76, 'B', 'MA', 'BACK WALL_BANNER', NULL, 'Back Wall', '', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(77, 'B', 'MA', 'BACK WALL_BANNER', NULL, 'Back Wall', '', '', 'Banner', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(78, 'B', 'MA', 'SUNDARY_BEAN BAG', NULL, 'Sundary', '', '', 'Bean Bag', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(79, 'B', 'MA', 'CONTINIOUS_BANNER', NULL, 'Continious', '', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(80, 'B', 'MA', 'CONTINIOUS_BANNER', NULL, 'Continious', '', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(81, 'B', 'MA', 'CONTINIOUS_BANNER', NULL, 'Continious', '', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(82, 'B', 'MA', 'CUSTOM_LIGHT BOX', NULL, 'Custom', '', '', 'Light Box', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(83, 'B', 'MA', 'CUSTOM_LIGHT BOX', NULL, 'Custom', '', '', 'Light Box', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(84, 'B', 'MA', 'CUSTOM_LIGHT BOX', NULL, 'Custom', '', '', 'Light Box', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(85, 'B', 'MA', 'CUSTOM_LIGHT BOX', NULL, 'Custom', '', '', 'Light Box', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(86, 'B', 'MA', 'CYLINDER_BANNER', NULL, 'Cylinder', '', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(87, 'B', 'MA', 'CYLINDER_BANNER', NULL, 'Cylinder', '', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(88, 'B', 'MA', 'CYLINDER_BANNER', NULL, 'Cylinder', '', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(89, 'B', 'MA', 'CYLINDER_BANNER', NULL, 'Cylinder', '', '', 'Banner', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(90, 'B', 'MA', 'EVENT_BEAN', NULL, 'Event', '', '', 'Bean', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(91, 'B', 'MA', 'STAR_EX-STAR', NULL, 'Star', '', '', 'Ex-star', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(92, 'B', 'MA', 'STAR_EX-STAR', NULL, 'Star', '', '', 'Ex-star', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(93, 'B', 'MA', 'JUMBO_EX-STAR', NULL, 'Jumbo', '', '', 'Ex-star', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(94, 'B', 'MA', 'JUMBO_EX-STAR', NULL, 'Jumbo', '', '', 'Ex-star', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:38', '2021-07-07 05:15:38'),
(95, 'B', 'MA', 'ROLL UP_EX-T', NULL, '', 'Roll Up', '', 'Ex-t', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(96, 'B', 'MA', 'ROLL UP_EX-T', NULL, '', 'Roll Up', '', 'Ex-t', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(97, 'B', 'MA', 'ROLL UP_EX-T', NULL, '', 'Roll Up', '', 'Ex-t', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(98, 'B', 'MA', 'ROLL UP_EX-T', NULL, '', 'Roll Up', '', 'Ex-t', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(99, 'B', 'MA', 'ROLL UP_EX-T', NULL, '', 'Roll Up', '', 'Ex-t', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(100, 'B', 'MA', 'REFLECTIVE_EX-T', NULL, '', 'Reflective', '', 'Ex-t', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(101, 'B', 'MA', 'REFLECTIVE_EX-T', NULL, '', 'Reflective', '', 'Ex-t', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(102, 'B', 'MA', 'REFLECTIVE_EX-T', NULL, '', 'Reflective', '', 'Ex-t', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(103, 'B', 'MA', 'VERTICAL_LARGE_EX-UP', NULL, 'Large', 'Vertical', '', 'Ex-up', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(104, 'B', 'MA', 'VERTICAL_LARGE_EX-UP', NULL, 'Large', 'Vertical', '', 'Ex-up', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(105, 'B', 'MA', 'VERTICAL_LARGE_EX-UP', NULL, 'Large', 'Vertical', '', 'Ex-up', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(106, 'B', 'MA', 'VERTICAL_LARGE_EX-UP', NULL, 'Large', 'Vertical', '', 'Ex-up', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(107, 'B', 'MA', 'VERTICAL_LARGE_EX-UP', NULL, 'Large', 'Vertical', '', 'Ex-up', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(108, 'B', 'MA', 'HORIZONTAL_LARGE_EX-UP', NULL, 'Large', 'Horizontal', '', 'Ex-up', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(109, 'B', 'MA', 'HORIZONTAL_LARGE_EX-UP', NULL, 'Large', 'Horizontal', '', 'Ex-up', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(110, 'B', 'MA', 'HORIZONTAL_LARGE_EX-UP', NULL, 'Large', 'Horizontal', '', 'Ex-up', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(111, 'B', 'MA', 'HORIZONTAL_LARGE_EX-UP', NULL, 'Large', 'Horizontal', '', 'Ex-up', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(112, 'B', 'MA', 'HORIZONTAL_LARGE_EX-UP', NULL, 'Large', 'Horizontal', '', 'Ex-up', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(113, 'B', 'MA', 'FLYING_LARGE_BANNER', NULL, 'Large', 'Flying', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(114, 'B', 'MA', 'FLYING_LARGE_BANNER', NULL, 'Large', 'Flying', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(115, 'B', 'MA', 'FLYING_LARGE_BANNER', NULL, 'Large', 'Flying', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(116, 'B', 'MA', 'FLYING_EXTRA LARGE_BANNER', NULL, 'Extra Large', 'Flying', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(117, 'B', 'MA', 'FLYING_EXTRA LARGE_BANNER', NULL, 'Extra Large', 'Flying', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(118, 'B', 'MA', 'FLYING_EXTRA LARGE_BANNER', NULL, 'Extra Large', 'Flying', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(119, 'B', 'MA', 'INFLATABLE_10M_BOTTLE', NULL, '10m', 'Inflatable', '', 'Bottle', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(120, 'B', 'MA', 'INFLATABLE_10M_BOTTLE', NULL, '10m', 'Inflatable', '', 'Bottle', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(121, 'B', 'MA', 'INFLATABLE_10M_BOTTLE', NULL, '10m', 'Inflatable', '', 'Bottle', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:39', '2021-07-07 05:15:39'),
(122, 'B', 'MA', 'INFLATABLE_10M_BOTTLE', NULL, '10m', 'Inflatable', '', 'Bottle', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(123, 'B', 'MA', 'INFLATABLE_LARGE_BOTTLE', NULL, 'Large', 'Inflatable', '', 'Bottle', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(124, 'B', 'MA', 'INFLATABLE_LARGE_BOTTLE', NULL, 'Large', 'Inflatable', '', 'Bottle', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(125, 'B', 'MA', 'INFLATABLE_LARGE_BOTTLE', NULL, 'Large', 'Inflatable', '', 'Bottle', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(126, 'B', 'MA', 'LANTERN_BANNER', NULL, '', 'Lantern', '', 'Banner', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(127, 'B', 'MA', 'LANTERN_BANNER', NULL, '', 'Lantern', '', 'Banner', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(128, 'B', 'MA', 'LANTERN_BANNER', NULL, '', 'Lantern', '', 'Banner', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(129, 'B', 'MA', 'LANTERN_BANNER', NULL, '', 'Lantern', '', 'Banner', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(130, 'B', 'MA', 'OUT DOOR_SINGLE SIDE_LIGHT BOX', NULL, 'Single Side', 'Out Door', '', 'Light Box', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(131, 'B', 'MA', 'ELLIPTICAL_LARGE_WONDA SIGN', NULL, 'Large', 'Elliptical', '', 'Wonda Sign', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(132, 'B', 'MA', 'ELLIPTICAL_LARGE_WONDA SIGN', NULL, 'Large', 'Elliptical', '', 'Wonda Sign', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(133, 'B', 'MA', 'ELLIPTICAL_LARGE_WONDA SIGN', NULL, 'Large', 'Elliptical', '', 'Wonda Sign', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(134, 'B', 'MA', 'ELLIPTICAL_LARGE_WONDA SIGN', NULL, 'Large', 'Elliptical', '', 'Wonda Sign', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(135, 'B', 'MA', 'ELLIPTICAL_LARGE_WONDA SIGN', NULL, 'Large', 'Elliptical', '', 'Wonda Sign', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(136, 'B', 'MA', 'ROUND_LARGE_WONDA SIGN', NULL, 'Large', 'Round', '', 'Wonda Sign', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(137, 'B', 'MA', 'ROUND_LARGE_WONDA SIGN', NULL, 'Large', 'Round', '', 'Wonda Sign', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(138, 'B', 'MA', 'ROUND_LARGE_WONDA SIGN', NULL, 'Large', 'Round', '', 'Wonda Sign', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(139, 'B', 'MA', 'ROUND_LARGE_WONDA SIGN', NULL, 'Large', 'Round', '', 'Wonda Sign', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(140, 'B', 'MA', 'ROUND_LARGE_WONDA SIGN', NULL, 'Large', 'Round', '', 'Wonda Sign', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(141, 'B', 'MA', 'ROUND_SMALL_WONDA SIGN', NULL, 'Small', 'Round', '', 'Wonda Sign', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(142, 'B', 'MA', 'ROUND_SMALL_WONDA SIGN', NULL, 'Small', 'Round', '', 'Wonda Sign', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(143, 'B', 'MA', 'ROUND_SMALL_WONDA SIGN', NULL, 'Small', 'Round', '', 'Wonda Sign', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(144, 'B', 'MA', 'ROUND_SMALL_WONDA SIGN', NULL, 'Small', 'Round', '', 'Wonda Sign', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(145, 'B', 'MA', 'ROUND_SMALL_WONDA SIGN', NULL, 'Small', 'Round', '', 'Wonda Sign', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(146, 'B', 'MA', 'BACK WALL_WONDA SIGN', NULL, 'Back Wall', '', '', 'Wonda Sign', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(147, 'B', 'MA', 'BACK WALL_WONDA SIGN', NULL, 'Back Wall', '', '', 'Wonda Sign', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(148, 'B', 'MA', 'BACK WALL_WONDA SIGN', NULL, 'Back Wall', '', '', 'Wonda Sign', 'SENQ', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(149, 'B', 'MA', 'BACK WALL_WONDA SIGN', NULL, 'Back Wall', '', '', 'Wonda Sign', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(150, 'B', 'MA', 'BACK WALL_WONDA SIGN', NULL, 'Back Wall', '', '', 'Wonda Sign', 'BGI CORPORATE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:40', '2021-07-07 05:15:40'),
(151, 'B', 'MA', 'T-SHIRT', NULL, '', '', '', 'T-shirt', 'ST GEORGE', '', 'Uncountable', NULL, '75', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(152, 'B', 'MA', 'SWEATER', NULL, '', '', '', 'Sweater', 'DOPPEL', '', 'Uncountable', NULL, '200', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(153, 'B', 'MA', 'SWEATER', NULL, '', '', '', 'Sweater', 'BGI CORPORATE', '', 'Uncountable', NULL, '200', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(154, 'B', 'MA', 'DAV_WET_DRAUGHT COOLER', '3218', 'Wet', 'Dav', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(155, 'B', 'MA', 'SINGLE DOOR_FRIDGE', '22688', 'Single Door', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(156, 'B', 'MA', 'SINGLE DOOR_FRIDGE', 'SINGLE_DOOR1', 'Single Door', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(157, 'B', 'MA', 'SINGLE DOOR_FRIDGE', '22598', 'Single Door', '', '', 'Fridge', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(158, 'B', 'MA', 'DOUBLE DOOR_FRIDGE', '22881', 'Double Door', '', '', 'Fridge', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(159, 'B', 'MA', 'DOUBLE DOOR_FRIDGE', 'DOUBLE_DOOR1', 'Double Door', '', '', 'Fridge', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(160, 'B', 'MA', 'DOUBLE DOOR_FRIDGE', 'DOUBLE_DOOR2', 'Double Door', '', '', 'Fridge', 'CASTEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(161, 'B', 'MA', 'SINGLE DOOR_FRIDGE', '22687', 'Single Door', '', '', 'Fridge', 'DOPPEL', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(162, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21440', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(163, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21430', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(164, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21423', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(165, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21435', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(166, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21421', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(167, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21433', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(168, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21434', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(169, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21425', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(170, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21428', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(171, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21439', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(172, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21437', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(173, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21436', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(174, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21438', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(175, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21426', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(176, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', '21420', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:41', '2021-07-07 05:15:41'),
(177, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli1', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(178, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli2', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(179, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli3', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(180, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli4', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(181, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli5', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(182, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli6', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(183, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli7', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(184, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli8', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(185, 'B', 'MA', '2-LINE_CHILLI_DRAUGHT COOLER', 'Chilli9', 'Chilli', '2-line', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(186, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1824', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(187, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1531', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(188, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '2347', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(189, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1489', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(190, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1255', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(191, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '2116', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(192, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '2606', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(193, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1550', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(194, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '1248', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(195, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '2348', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(196, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', '628', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(197, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', 'CONTOUR1', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(198, 'B', 'MA', 'CONTOUR_DRAUGHT COOLER', 'CONTOUR2', 'Contour', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(199, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', '21934', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(200, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', '21932', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(201, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', '21933', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(202, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', '21929', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(203, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', 'TOP_COUNTER1', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:42', '2021-07-07 05:15:42'),
(204, 'B', 'MA', 'TOP COUNTER_DRAUGHT COOLER', 'TOP_COUNTER2', 'Top Counter', '', '', 'Draught Cooler', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(205, 'B', 'MA', 'DEEP_FRIDGE', '14769', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(206, 'B', 'MA', 'DEEP_FRIDGE', '14770', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(207, 'B', 'MA', 'DEEP_FRIDGE', '14613', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(208, 'B', 'MA', 'DEEP_FRIDGE', '14706', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(209, 'B', 'MA', 'DEEP_FRIDGE', '17692', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(210, 'B', 'MA', 'DEEP_FRIDGE', '17696', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(211, 'B', 'MA', 'DEEP_FRIDGE', '14709', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(212, 'B', 'MA', 'DEEP_FRIDGE', '14768', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(213, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE1', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(214, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE2', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(215, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE3', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(216, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE4', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(217, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE5', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(218, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE6', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(219, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE7', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(220, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE8', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(221, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE9', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(222, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE10', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(223, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE11', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(224, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE12', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43'),
(225, 'B', 'MA', 'DEEP_FRIDGE', 'DEEP_FRIDGE13', 'Deep', '', '', 'Fridge', 'ST GEORGE', '', 'Uncountable', NULL, 'Returnable', 1, 1, '2021-07-07 05:15:43', '2021-07-07 05:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `stock_manufacturers`
--

DROP TABLE IF EXISTS `stock_manufacturers`;
CREATE TABLE IF NOT EXISTS `stock_manufacturers` (
  `SMID` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manufacturer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SMID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

DROP TABLE IF EXISTS `stock_movements`;
CREATE TABLE IF NOT EXISTS `stock_movements` (
  `SMID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction_Type` int NOT NULL,
  `Damage_Status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Path_Image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quantity` double NOT NULL,
  `Unit_Price` double DEFAULT NULL,
  `Order_Number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Project_Code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_MVT` date NOT NULL,
  `Event` int DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SMID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stock_stock_rooms`
--

DROP TABLE IF EXISTS `stock_stock_rooms`;
CREATE TABLE IF NOT EXISTS `stock_stock_rooms` (
  `SRID` int NOT NULL AUTO_INCREMENT,
  `Company` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Branch` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Site` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ShortName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SRID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_stock_rooms`
--

INSERT INTO `stock_stock_rooms` (`SRID`, `Company`, `Department`, `Branch`, `Site`, `Stock_Room`, `Description`, `ShortName`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'Kera', 'Addis Ababa', 'ST GEORGE', 'ST GEORGE stock room located at Kera, B', 'BAddis AbabaMAKeraST GEORGE', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(2, 'B', 'MA', 'Kera', 'Addis Ababa', 'CASTEL', 'CASTEL stock room located at Kera, B', 'BAddis AbabaMAKeraCASTEL', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(3, 'B', 'MA', 'Kera', 'Addis Ababa', 'SENQ', 'SENQ stock room located at Kera, B', 'BAddis AbabaMAKeraSENQ', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(4, 'B', 'MA', 'Kera', 'Addis Ababa', 'DOPPEL', 'DOPPEL stock room located at Kera, B', 'BAddis AbabaMAKeraDOPPEL', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34'),
(5, 'B', 'MA', 'Kera', 'Addis Ababa', 'BGI CORPORATE', 'BGI CORPORATE stock room located at Kera, B', 'BAddis AbabaMAKeraBGI CORPORATE', 1, 1, '2021-07-07 05:15:34', '2021-07-07 05:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `stock_users`
--

DROP TABLE IF EXISTS `stock_users`;
CREATE TABLE IF NOT EXISTS `stock_users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Stock_ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UUID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Location`, `Department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eyob Sahlemariam', 'eyob.sahlemariam@castel-afrique.com', NULL, '$2y$12$dfoMxFchmNrJ5.jU1jRzjuFLXxL.k8MAs.DR8G69g1kOwvw2iMGLO', 'B', 'MA', 'Pm7MkDZwdj69nh4bsNZQDzcDamd7vh2dlVXIn1rlS7nQkUQKawYcKpCdui9C', '2021-03-03 11:22:06', '2021-03-03 11:22:06'),
(2, 'Abenezer Ayalneh', 'abenezer.ayalneh@castel-afrique.com', '2021-06-15 06:24:36', '$2y$12$0N1yEVxNtEtmCK0bbldRqeKoHun8K10Ga84mjrO7oaY82XtpojnuS', 'B', 'MA', NULL, '2021-06-15 06:24:36', '2021-06-15 06:24:36'),
(3, 'Misikir Mulugeta', 'misikir.mulugeta@castel-afrique.com', NULL, '$2y$10$R25nUGh8ft70FNx31D4x3.ziaPqczLfdLTzxo3ZVW1keH18ds.9ra', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:06:35', '2021-07-05 00:27:09'),
(4, 'Abel Daniel', 'abel.daniel@castel-afrique.com', NULL, '$2y$10$xgVAxbf0mhkotmjjdUHxn.6ZkcRhghmW57jFEMzWPtB/M9UflRK2y', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:07:11', '2021-07-05 00:27:44'),
(5, 'Amanuel Getachew', 'amanuel.getachew@castel-afrique.com', NULL, '$2y$10$TMpytAtGLD4DmtVTS/p97u6yDyE.We2D/1dtvWBjFU2FYMFgHYOqa', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:08:33', '2021-07-05 00:08:33'),
(6, 'Eyob Tesfaye', 'eyob.tesfaye@castel-afrique.com', NULL, '$2y$10$NhRclXEGClR1Q4yyilhVQOz2ce1/3mPfVE6yAEY65A3eIPGP72GfS', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:11:48', '2021-07-05 00:11:48'),
(7, 'Tesfaye Messele', 'tesfaye.messele@castel-afrique.com', NULL, '$2y$10$zMGjJZTRlMeiHXCWD5xlIeiGSwdpqMOpCiYgQ9Ri4jKeSHEKViN66', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:13:53', '2021-07-05 00:13:53'),
(8, 'Semen Kebed', 'semen.kebed@castel-afrique.com', NULL, '$2y$10$yagi6yLp9Bldrt7TXTACxOgmthFKPEMwas3gqcbvHEmScmxiJxL.m', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:14:35', '2021-07-05 00:14:35'),
(9, 'Andualem Assefa', 'andualem.assefa@castel-afrique.com', NULL, '$2y$10$xt1GIC1d.fT4/ml90zunFu875hbVE/QpaE4nxz3Op2PoSltu8hxkq', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:15:04', '2021-07-05 00:15:04'),
(10, 'Addis Beza', 'addis.beza@castel-afrique.com', NULL, '$2y$10$LjadMEZG0MwLa2/FccKHgOCAH51Yu9Aa3ELvzYYzQfopSgzhzK6vm', 'Addis Ababa', 'Marketing', NULL, '2021-07-05 00:16:13', '2021-07-05 00:16:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
