-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2021 at 04:52 AM
-- Server version: 5.7.31
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
-- Table structure for table `approver_setting`
--

DROP TABLE IF EXISTS `approver_setting`;
CREATE TABLE IF NOT EXISTS `approver_setting` (
  `stock_category_id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT '100',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EVID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_From` datetime NOT NULL,
  `Date_To` datetime NOT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `Event_Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EVID`),
  KEY `Event_Type` (`Event_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EVID`, `Company`, `Department`, `Event_Name`, `Date_From`, `Date_To`, `Location`, `Description`, `Event_Type`, `Status`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'Fasika', '2021-06-20 00:00:00', '2021-07-01 00:00:00', 'Addis Ababa', 'Fasika', 'Hollyday', NULL, 1, 1, '2021-06-23 10:20:57', '2021-06-23 10:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
CREATE TABLE IF NOT EXISTS `event_types` (
  `ETID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ETID`),
  UNIQUE KEY `Type_Name` (`Type_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`ETID`, `Type_Name`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(2, 'Holiday', 'B', 'MA', 1, 1, '2021-06-23 05:34:01', '2021-06-24 03:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `item_requests`
--

DROP TABLE IF EXISTS `item_requests`;
CREATE TABLE IF NOT EXISTS `item_requests` (
  `IRID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Requester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Responsible_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_Number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Return_date` date NOT NULL,
  `Transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction_Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApprovalOne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApprovalTwo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Posted` enum('Posted','Not_Posted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not_Posted',
  `Issued` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IRID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `item_requests`
--

INSERT INTO `item_requests` (`IRID`, `Company`, `Department`, `Event_id`, `Requester`, `Responsible_person`, `Phone_Number`, `Return_date`, `Transaction`, `Transaction_Type`, `ApprovalOne`, `ApprovalTwo`, `Posted`, `Issued`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', '1', 'John Doe', 'Mark Mike', '090909090909', '2021-07-02', 'Withdraw_Event', '0', 'Pending', 'Not Required', 'Not_Posted', NULL, 1, 1, '2021-06-23 10:20:57', '2021-06-23 10:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `RILID` int(11) NOT NULL AUTO_INCREMENT,
  `Request_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Event_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ItemCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Approval1Quantity` int(11) DEFAULT NULL,
  `Approval2Quantity` int(11) DEFAULT NULL,
  `IssuedQuantity` int(11) DEFAULT NULL,
  `Issued` int(11) DEFAULT NULL,
  `Item_Remaining` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `File_Path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Damage_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
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
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` double NOT NULL,
  `MAX` double DEFAULT NULL,
  `MIN` double DEFAULT NULL,
  `Asset_No` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reorder_Point` double DEFAULT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`SID`, `Company`, `Department`, `Stock_Room`, `Item`, `Quantity`, `MAX`, `MIN`, `Asset_No`, `Reorder_Point`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', '1', '4', 1, NULL, NULL, 'ASSET1', NULL, 1, 1, '2021-06-23 10:25:36', '2021-06-23 10:25:36'),
(2, 'B', 'MA', '1', '4', 1, NULL, NULL, 'ASSET2', NULL, 1, 1, '2021-06-23 10:25:36', '2021-06-23 10:25:36'),
(3, 'B', 'MA', '1', '4', 1, NULL, NULL, 'ASSET3', NULL, 1, 1, '2021-06-23 10:25:36', '2021-06-23 10:25:36'),
(4, 'B', 'MA', '1', '4', 1, NULL, NULL, 'ASSET4', NULL, 1, 1, '2021-06-23 10:25:36', '2021-06-23 10:25:36'),
(5, 'B', 'MA', '1', '4', 1, NULL, NULL, 'ASSET5', NULL, 1, 1, '2021-06-23 10:25:36', '2021-06-23 10:25:36'),
(6, 'B', 'MA', '2', '3', 6500, NULL, NULL, NULL, NULL, 1, 1, '2021-06-23 10:26:06', '2021-06-23 11:00:42'),
(7, 'B', 'MA', '1', '1', 1, NULL, NULL, 'ASSET6', NULL, 1, 1, '2021-06-23 10:26:30', '2021-06-23 10:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `stock_brands`
--

DROP TABLE IF EXISTS `stock_brands`;
CREATE TABLE IF NOT EXISTS `stock_brands` (
  `SBID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SBID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_brands`
--

INSERT INTO `stock_brands` (`SBID`, `Type`, `Brand`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'TABLE', 'ST. GEORGE', 'B', 'MA', 1, 1, '2021-06-23 05:23:41', '2021-06-23 05:23:41'),
(2, 'TABLE', 'CASTEL', 'B', 'MA', 1, 1, '2021-06-23 05:23:50', '2021-06-23 05:23:50'),
(3, 'TABLE', 'SINQ', 'B', 'MA', 1, 1, '2021-06-23 05:23:58', '2021-06-23 05:23:58'),
(4, 'TENT', 'ST. GEORGE', 'B', 'MA', 1, 1, '2021-06-23 05:24:14', '2021-06-23 05:24:14'),
(5, 'PRODUCT', 'SINQ', 'B', 'MA', 1, 1, '2021-06-23 05:24:21', '2021-06-23 05:24:21'),
(6, 'TENT', 'CASTEL', 'B', 'MA', 1, 1, '2021-06-23 05:24:55', '2021-06-23 05:24:55'),
(7, 'PRODUCT', 'ST. GEORGE', 'B', 'MA', 1, 1, '2021-06-23 05:25:23', '2021-06-23 05:25:23'),
(8, 'PRODUCT', 'CASTEL', 'B', 'MA', 1, 1, '2021-06-23 05:25:30', '2021-06-23 05:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `stock_categorys`
--

DROP TABLE IF EXISTS `stock_categorys`;
CREATE TABLE IF NOT EXISTS `stock_categorys` (
  `STID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`STID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_categorys`
--

INSERT INTO `stock_categorys` (`STID`, `Company`, `Department`, `Type`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'TENT', 1, 1, '2021-06-23 05:21:42', '2021-06-23 05:21:42'),
(2, 'B', 'MA', 'PRODUCT', 1, 1, '2021-06-23 05:21:47', '2021-06-23 05:21:47'),
(3, 'B', 'MA', 'TABLE', 1, 1, '2021-06-23 05:21:54', '2021-06-23 05:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `stock_colors`
--

DROP TABLE IF EXISTS `stock_colors`;
CREATE TABLE IF NOT EXISTS `stock_colors` (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_colors`
--

INSERT INTO `stock_colors` (`SCID`, `Type`, `Color`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'TABLE', 'BLACK', 'B', 'MA', 1, 1, '2021-06-23 05:22:16', '2021-06-23 05:22:16'),
(2, 'TABLE', 'YELLOW', 'B', 'MA', 1, 1, '2021-06-23 05:22:24', '2021-06-23 05:22:24'),
(3, 'TENT', 'YELLOW', 'B', 'MA', 1, 1, '2021-06-23 05:22:56', '2021-06-23 05:22:56'),
(4, 'TENT', 'BLACK', 'B', 'MA', 1, 1, '2021-06-23 05:23:10', '2021-06-23 05:23:10'),
(5, 'PRODUCT', 'BLACK', 'B', 'MA', 1, 1, '2021-06-23 05:31:40', '2021-06-23 05:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `stock_fabrics`
--

DROP TABLE IF EXISTS `stock_fabrics`;
CREATE TABLE IF NOT EXISTS `stock_fabrics` (
  `SFID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SFID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_fabrics`
--

INSERT INTO `stock_fabrics` (`SFID`, `Type`, `Fabric`, `Company`, `Department`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'TABLE', 'Wooden', 'B', 'MA', 1, 1, '2021-06-23 05:26:06', '2021-06-23 05:26:06'),
(2, 'TABLE', 'Metal', 'B', 'MA', 1, 1, '2021-06-23 05:26:20', '2021-06-23 05:26:20'),
(3, 'PRODUCT', 'other', 'B', 'MA', 1, 1, '2021-06-23 05:26:48', '2021-06-23 05:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

DROP TABLE IF EXISTS `stock_items`;
CREATE TABLE IF NOT EXISTS `stock_items` (
  `SIID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item_Code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Asset_Noo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fabric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Countable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Journal_Number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SIID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`SIID`, `Company`, `Department`, `Item_Code`, `Asset_Noo`, `Size`, `Fabric`, `Color`, `Type`, `Brand`, `Manufacturer`, `Countable`, `Journal_Number`, `Status`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'YELLOW_ST. GEORGE_3x4_TENT', NULL, '3x4', NULL, 'YELLOW', 'TENT', 'ST. GEORGE', NULL, 'Countable', NULL, 'Returnable', 1, 1, '2021-06-23 09:40:49', '2021-06-23 09:40:49'),
(2, 'B', 'MA', 'BLACK_CASTEL_5x5_TENT', NULL, '5x5', NULL, 'BLACK', 'TENT', 'CASTEL', NULL, 'Countable', NULL, 'Returnable', 1, 1, '2021-06-23 09:47:50', '2021-06-23 09:47:50'),
(3, 'B', 'MA', 'Small_BLACK_SINQ_other_PRODUCT', NULL, 'Small', 'other', 'BLACK', 'PRODUCT', 'SINQ', NULL, 'UnCountable', NULL, 'Non_Returnable', 1, 1, '2021-06-23 09:48:17', '2021-06-23 09:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `stock_manufacturers`
--

DROP TABLE IF EXISTS `stock_manufacturers`;
CREATE TABLE IF NOT EXISTS `stock_manufacturers` (
  `SMID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
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
  `SMID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction_Type` int(11) NOT NULL,
  `Damage_Status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Path_Image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quantity` double NOT NULL,
  `Unit_Price` double DEFAULT NULL,
  `Order_Number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Project_Code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_MVT` date NOT NULL,
  `Event` int(11) DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Remark` text COLLATE utf8mb4_unicode_ci,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
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
  `SRID` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Branch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Site` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stock_Room` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `ShortName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` int(11) NOT NULL,
  `UUID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SRID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_stock_rooms`
--

INSERT INTO `stock_stock_rooms` (`SRID`, `Company`, `Department`, `Branch`, `Site`, `Stock_Room`, `Description`, `ShortName`, `CUID`, `UUID`, `created_at`, `updated_at`) VALUES
(1, 'B', 'MA', 'KR', 'AA', 'ST. GEORGE', 'BGI Ethiopia\'s stock room located at Kera, Addis Ababa.', 'BAAMAKRST. GEORGE', 1, 1, '2021-06-23 05:27:45', '2021-06-23 05:27:45'),
(2, 'B', 'MA', 'KR', 'AA', 'SINQ', 'BGI Ethiopia\'s stock room located at Kera, Addis Ababa.', 'BAAMAKRSINQ', 1, 1, '2021-06-23 05:28:14', '2021-06-23 05:28:14'),
(5, 'B', 'MA', 'KR', 'AA', 'Castel', 'Castel products\' stock room located at Kera, Addis Ababa.', 'BAAMAKRCastel', 1, 1, '2021-06-24 03:00:00', '2021-06-24 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stock_users`
--

DROP TABLE IF EXISTS `stock_users`;
CREATE TABLE IF NOT EXISTS `stock_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Stock_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CUID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UUID` int(11) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Location`, `Department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eyob Sahlemariam', 'eyob.sahlemariam@castel-afrique.com', NULL, '$2y$12$dfoMxFchmNrJ5.jU1jRzjuFLXxL.k8MAs.DR8G69g1kOwvw2iMGLO', 'B', 'MA', NULL, '2021-03-03 11:22:06', '2021-03-03 11:22:06'),
(2, 'Abenezer Ayalneh', 'abenezer.ayalneh@castel-afrique.com', '2021-06-15 06:24:36', '$2y$12$0N1yEVxNtEtmCK0bbldRqeKoHun8K10Ga84mjrO7oaY82XtpojnuS', 'B', 'MA', NULL, '2021-06-15 06:24:36', '2021-06-15 06:24:36');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approver_setting`
--
ALTER TABLE `approver_setting`
  ADD CONSTRAINT `approver_setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
