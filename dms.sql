-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 04:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Kollyanpur', 'Active', '2021-07-30 13:32:46', '2021-11-06 14:28:39'),
(3, 'Paik Para', 'Active', '2021-08-01 10:24:32', '2021-11-06 14:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `area_managers`
--

CREATE TABLE `area_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `nid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_managers`
--

INSERT INTO `area_managers` (`id`, `name`, `date`, `nid`, `email`, `phone`, `image`, `area_id`, `address`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shamim', '1997-06-27', '123456789123546', 'shamim@gmail.com', '01123456789', 'assets/admin/assets/img/area_managers/163799625347196.png', 3, 'paikpara', '10000.00', 'Active', '2021-11-27 00:57:33', '2021-11-27 02:10:59'),
(2, 'sohan', '1995-10-18', '123456789789456', 'sohan@gmail.com', '017123456', 'assets/admin/assets/img/area_managers/163807379399196.jpg', 2, 'Kollyanpur', '10000.00', 'Active', '2021-11-27 22:29:53', '2021-11-27 22:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `beverage_categories`
--

CREATE TABLE `beverage_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beverage_categories`
--

INSERT INTO `beverage_categories` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Drinking Water', NULL, 'Active', '2021-07-28 14:37:12', '2021-10-22 14:12:14'),
(3, 'Carbonated Soft Beverage', NULL, 'Active', '2021-07-29 05:24:11', '2021-10-22 14:54:44'),
(5, 'Beverages', NULL, 'Active', '2021-10-23 02:48:49', '2021-10-23 02:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `beverage_flavors`
--

CREATE TABLE `beverage_flavors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beverage_flavors`
--

INSERT INTO `beverage_flavors` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(4, 'No flavor', NULL, 'Active', '2021-07-28 14:37:26', '2021-10-22 14:37:48'),
(5, 'Lemon Flavor', NULL, 'Active', '2021-07-29 05:27:37', '2021-10-22 14:38:04'),
(6, 'Litchi', NULL, 'Active', '2021-10-23 02:50:33', '2021-10-23 02:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `beverage_sizes`
--

CREATE TABLE `beverage_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beverage_sizes`
--

INSERT INTO `beverage_sizes` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, '250 ml', NULL, 'Active', '2021-07-26 14:40:08', '2021-10-22 14:37:19'),
(2, '500 ml', NULL, 'Active', '2021-07-29 05:27:22', '2021-10-22 14:37:30'),
(3, '2000 ml', NULL, 'Active', '2021-11-27 17:26:04', '2021-11-27 17:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `beverage_types`
--

CREATE TABLE `beverage_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beverage_types`
--

INSERT INTO `beverage_types` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PET', 'Plastic Bottle', 'Active', '2021-10-22 14:06:47', '2021-10-22 14:06:47'),
(4, 'CAN', 'Tin made container', 'Active', '2021-10-22 14:08:19', '2021-10-22 14:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 1, 9, '2021-09-29 03:01:30', '2021-09-29 03:01:30'),
(13, 1, 10, '2021-09-29 03:01:42', '2021-09-29 03:01:42'),
(14, 1, 8, '2021-09-29 11:47:09', '2021-09-29 11:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `nid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_management`
--

CREATE TABLE `employee_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `bonus` decimal(8,2) DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `is_approved` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `is_paid` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_management`
--

INSERT INTO `employee_management` (`id`, `employee_id`, `month`, `salary`, `bonus`, `commission`, `is_approved`, `is_paid`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'November', '10000.00', NULL, '759.00', 'Yes', 'Yes', '2021-11-28', '2021-11-27 02:59:49', '2021-11-28 15:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `details`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'transport cost', 'area manager given', '500.00', '2021-11-26 13:06:21', '2021-11-26 13:23:17'),
(2, 'transport cost', 'arear manager took the money', '100.00', '2021-11-26 13:07:21', '2021-11-26 13:07:21'),
(3, 'transport cost', 'arear manager took the money', '100.00', '2021-11-26 13:07:31', '2021-11-26 13:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_type` enum('Beverages','Snacks') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `flavor_id` bigint(20) UNSIGNED NOT NULL,
  `price_per_carton` decimal(8,2) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `inventory_type`, `category_id`, `name`, `details`, `size_id`, `image`, `type_id`, `flavor_id`, `price_per_carton`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beverages', 2, 'PRAN Drinking Water', 'PRAN Drinking Water is a clear purified water processed naturally ensuring your health and safety', 1, 'assets/admin/assets/img/inventories/16380572625536.png', 2, 4, '290.00', '59.00', 'Active', '2021-11-27 17:54:22', '2021-11-27 22:40:17'),
(2, 'Beverages', 2, 'PRAN Drinking Water', 'PRAN Drinking Water is a clear purified water processed naturally ensuring your health and safety', 3, 'assets/admin/assets/img/inventories/163805729959063.png', 2, 4, '150.00', '4.00', 'Active', '2021-11-27 17:54:59', '2021-11-28 13:53:09'),
(3, 'Snacks', 1, 'Next All Time Milk Bread', 'All Time Milk Bread is a soft milk bread which feels very light in the mouth. It is perfect for a quick, healthy breakfast.', 1, 'assets/admin/assets/img/inventories/163805732574674.png', 2, 8, '35.00', '90.00', 'Active', '2021-11-27 17:55:25', '2021-11-28 13:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_07_24_173340_create_beverage_categories_table', 1),
(4, '2021_07_24_174040_create_beverage_sizes_table', 1),
(5, '2021_07_24_174125_create_snacks_categories_table', 1),
(6, '2021_07_24_174221_create_snacks_sizes_table', 1),
(8, '2021_07_28_135530_create_beverage_flavors_table', 2),
(10, '2021_07_28_184255_create_snacks_flavors_table', 3),
(11, '2021_07_30_123652_create_areas_table', 4),
(17, '2021_07_31_112740_create_shopkeepers_table', 6),
(24, '2021_09_13_203943_create_carts_table', 10),
(32, '2014_10_12_000000_create_users_table', 11),
(33, '2021_09_29_202903_create_employees_table', 12),
(36, '2021_10_22_192319_create_beverage_types_table', 14),
(37, '2021_10_22_194901_create_snacks_types_table', 15),
(43, '2021_10_30_202941_create_deliveries_table', 19),
(50, '2021_07_30_155250_create_shop_registrations_table', 24),
(57, '2021_11_20_191638_create_employee_management_table', 27),
(60, '2021_10_28_204705_create_orders_table', 28),
(61, '2021_10_28_211441_create_order_details_table', 28),
(62, '2021_11_22_221002_create_transactions_table', 29),
(63, '2021_11_26_183945_create_expenses_table', 30),
(67, '2021_08_01_203020_create_area_managers_table', 31),
(72, '2021_07_25_162647_create_inventories_table', 33),
(73, '2021_09_01_173616_create_stocks_table', 34),
(74, '2021_11_28_042147_status_to_shopkeepers_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `delivery_date` datetime DEFAULT NULL,
  `delivered_by` bigint(20) UNSIGNED DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `shop_id`, `order_status`, `delivery_date`, `delivered_by`, `received_date`, `total`, `created_at`, `updated_at`) VALUES
(1, 6, 'DMmjpR', 2, 'Delivered', '2021-11-28 02:00:05', 1, NULL, '7300.00', '2021-11-27 18:01:39', '2021-11-27 20:00:05'),
(2, 6, '58qMHr', 2, 'Delivered', '2021-11-28 04:41:37', 1, NULL, '290.00', '2021-11-27 21:46:01', '2021-11-27 22:41:37'),
(3, 14, 'SAaixy', 1, 'Approved', NULL, NULL, NULL, '1250.00', '2021-11-27 22:37:03', '2021-11-28 13:53:09'),
(4, 6, 'jyfxd8', 2, 'Pending', NULL, NULL, NULL, '35.00', '2021-11-28 13:59:32', '2021-11-28 13:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', 2, '150.00', 10, '1500.00', '2021-11-27 18:01:39', '2021-11-27 18:01:39'),
(2, '1', 1, '290.00', 20, '5800.00', '2021-11-27 18:01:39', '2021-11-27 18:01:39'),
(3, '2', 1, '290.00', 1, '290.00', '2021-11-27 21:46:01', '2021-11-27 21:46:01'),
(4, '3', 3, '35.00', 10, '350.00', '2021-11-27 22:37:03', '2021-11-27 22:37:03'),
(5, '3', 2, '150.00', 6, '900.00', '2021-11-27 22:37:04', '2021-11-27 22:37:04'),
(6, '4', 3, '35.00', 1, '35.00', '2021-11-28 13:59:32', '2021-11-28 13:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopkeepers`
--

CREATE TABLE `shopkeepers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `nid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopkeepers`
--

INSERT INTO `shopkeepers` (`id`, `name`, `date`, `nid`, `email`, `phone`, `image`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Abdul', '2021-07-06', '11232', 'renttor029@gmail.com', '123120', 'assets/admin/assets/img/shopkeeper/163782427385205.png', 'llllll', '2021-07-31 07:09:14', '2021-11-27 22:35:15', 'Active'),
(2, 'Kadir', '1996-08-26', '123456789159456', 'kadir@gmail.com', '01789456123', 'assets/admin/assets/img/shopkeeper/avatar4.png', 'Paik Para road, Paikpara', '2021-11-07 08:55:50', '2021-11-07 08:55:50', 'Inactive'),
(3, 'ABC', '2000-02-15', '1234567891423546', 'abc@gmail.com', '01875781788', 'assets/admin/assets/img/shopkeeper/16378241267743.jpg', 'Miazi Bari, Monpura', '2021-11-25 01:08:46', '2021-11-25 01:08:46', 'Inactive'),
(4, 'Mohammad Shamim', '1983-10-12', '123456789456', 'shamim@gmail.com', '01123456789', 'assets/admin/assets/img/shopkeeper/163799478276866.jpg', 'kollyanpur, Dhaka', '2021-11-27 00:33:02', '2021-11-27 00:33:02', 'Inactive'),
(5, 'rahim mia', '1981-05-12', '123456789123', 'rahim@gmail.com', '01875785645', 'assets/admin/assets/img/shopkeeper/163807250366437.jpg', 'House No: 55 (B5), Road: 12, DIT Project, kollyanpur', '2021-11-27 22:08:23', '2021-11-27 22:08:23', 'Inactive'),
(7, 'mahin@gmail.com', '2000-02-01', '12345678912354', 'mahin@gmail.com', '019123456', 'assets/admin/assets/img/shopkeeper/163807438248656.jpg', 'Khargapur,klp', '2021-11-27 22:39:42', '2021-11-27 22:39:42', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `shop_registrations`
--

CREATE TABLE `shop_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniqueId` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownerId` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_registrations`
--

INSERT INTO `shop_registrations` (`id`, `name`, `uniqueId`, `ownerId`, `address`, `area_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Shopon Tea Store', '123', 1, 'kollyanpur', 2, 'assets/admin/assets/img/shop/163632259042032.jpg', '2021-11-07 16:03:10', '2021-11-07 16:03:10'),
(2, 'Ripon Store', '156', 2, 'Paikpara', 3, 'assets/admin/assets/img/shop/163632265367274.png', '2021-11-07 16:04:13', '2021-11-07 16:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `snacks_categories`
--

CREATE TABLE `snacks_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snacks_categories`
--

INSERT INTO `snacks_categories` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bread', NULL, 'Active', '2021-07-29 05:17:30', '2021-10-22 14:11:47'),
(2, 'Biscuit', NULL, 'Active', '2021-07-29 05:27:46', '2021-10-22 14:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `snacks_flavors`
--

CREATE TABLE `snacks_flavors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snacks_flavors`
--

INSERT INTO `snacks_flavors` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Milk', NULL, 'Active', '2021-07-29 06:11:37', '2021-11-26 14:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `snacks_sizes`
--

CREATE TABLE `snacks_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snacks_sizes`
--

INSERT INTO `snacks_sizes` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, '350 gm', NULL, 'Active', '2021-07-29 05:17:56', '2021-11-26 14:25:38'),
(2, '500 gm', '500 gm', 'Active', '2021-07-29 05:27:57', '2021-11-26 14:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `snacks_types`
--

CREATE TABLE `snacks_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snacks_types`
--

INSERT INTO `snacks_types` (`id`, `name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pouch', 'minimum 12 pouch is needed to order', 'Active', '2021-10-22 14:08:54', '2021-10-22 14:08:54'),
(4, 'Container', 'Plastic Box', 'Active', '2021-10-22 14:10:08', '2021-10-22 14:10:08'),
(5, 'Foil Container', 'Foile made', 'Active', '2021-10-22 14:10:26', '2021-10-22 14:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchased_price` decimal(8,2) NOT NULL,
  `total_purchased_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `inventory_id`, `stock`, `purchased_price`, `total_purchased_price`, `created_at`, `updated_at`) VALUES
(1, 1, '20', '210.00', '4200.00', '2021-11-27 17:54:23', '2021-11-27 17:54:23'),
(2, 2, '20', '120.00', '2400.00', '2021-11-27 17:54:59', '2021-11-27 17:54:59'),
(3, 3, '100', '26.00', '2600.00', '2021-11-27 17:55:25', '2021-11-27 17:55:25'),
(4, 1, '10', '210.00', '2100.00', '2021-11-27 17:59:53', '2021-11-27 17:59:53'),
(5, 1, '50', '210.00', '10500.00', '2021-11-27 18:00:05', '2021-11-27 18:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `transaction_id`, `paid_amount`, `created_at`, `updated_at`) VALUES
(1, 6, '61a2c70a05d69', '5000.00', '2021-11-27 18:02:24', '2021-11-27 18:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `action_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `row_id`, `name`, `email`, `email_verified_at`, `action_table`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Miraj Hossain', 'mirajho111@gmail.com', NULL, 'App\\Shopkeeper', '$2y$10$xDuHp2KEsoY3N/G.0RvuouKC//HI6WaSVWv922FwP2GGC3OS/C7Uq', NULL, '2021-10-28 14:56:50', '2021-10-28 14:56:50'),
(6, 2, 'kadir123', 'kadir12@gmail.com', NULL, 'App\\Shopkeeper', '$2y$10$fEUDQxwC3K8hqY6kVFC0gu72q7dLRUL6V/Uw3Nn0sZAP3eVJHd8Fy', NULL, '2021-11-07 08:56:59', '2021-11-07 08:56:59'),
(9, 3, 'ab', 'ab@gmail.com', NULL, 'App\\Shopkeeper', '$2y$10$Yei7i.CHo0BXvc.bYlsdM.gkZR3xVmeXtjO2zbUuF7kZpNACb4twy', NULL, '2021-11-21 15:19:22', '2021-11-21 15:19:22'),
(10, 3, 'admin', 'admin@admin.com', NULL, 'App\\Admin', '$2y$10$JsC4N0OIwBCgG7fStFN0D.Uyup9Spx6Enp/lUmRsCVTtZE.f09gqi', NULL, '2021-11-23 17:50:32', '2021-11-23 17:50:32'),
(12, 1, 'shamim', 'shamim@gmail.com', NULL, 'App\\AreaManager', '$2y$10$EtsXcnZp8tYCuJU8.DeWBuvySMAL2Zobutdl6QSToODpDqkL4oHUu', NULL, '2021-11-27 02:10:59', '2021-11-27 02:10:59'),
(13, 2, 'sohan', 'sohan@gmail.com', NULL, 'App\\AreaManager', '$2y$10$K/125aJv60Q6ljdsqkFbnujeuOayHx0/La8ypwNzJUe2G2TEuKhUi', NULL, '2021-11-27 22:32:33', '2021-11-27 22:32:33'),
(14, 1, 'Abdul', 'renttor029@gmail.com', NULL, 'App\\Shopkeeper', '$2y$10$S7C16GHEz7.20181FQ.pWuPMHftmyNG5r.1ptd74naWjCeFRQRmUO', NULL, '2021-11-27 22:35:14', '2021-11-27 22:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_managers`
--
ALTER TABLE `area_managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_managers_email_unique` (`email`),
  ADD KEY `area_managers_area_id_foreign` (`area_id`);

--
-- Indexes for table `beverage_categories`
--
ALTER TABLE `beverage_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beverage_flavors`
--
ALTER TABLE `beverage_flavors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beverage_sizes`
--
ALTER TABLE `beverage_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beverage_types`
--
ALTER TABLE `beverage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_management`
--
ALTER TABLE `employee_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_management_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shopkeepers_email_unique` (`email`);

--
-- Indexes for table `shop_registrations`
--
ALTER TABLE `shop_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_registrations_ownerid_foreign` (`ownerId`),
  ADD KEY `shop_registrations_area_id_foreign` (`area_id`);

--
-- Indexes for table `snacks_categories`
--
ALTER TABLE `snacks_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snacks_flavors`
--
ALTER TABLE `snacks_flavors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snacks_sizes`
--
ALTER TABLE `snacks_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snacks_types`
--
ALTER TABLE `snacks_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area_managers`
--
ALTER TABLE `area_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beverage_categories`
--
ALTER TABLE `beverage_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `beverage_flavors`
--
ALTER TABLE `beverage_flavors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beverage_sizes`
--
ALTER TABLE `beverage_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beverage_types`
--
ALTER TABLE `beverage_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_management`
--
ALTER TABLE `employee_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop_registrations`
--
ALTER TABLE `shop_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `snacks_categories`
--
ALTER TABLE `snacks_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `snacks_flavors`
--
ALTER TABLE `snacks_flavors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `snacks_sizes`
--
ALTER TABLE `snacks_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `snacks_types`
--
ALTER TABLE `snacks_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_managers`
--
ALTER TABLE `area_managers`
  ADD CONSTRAINT `area_managers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `employee_management`
--
ALTER TABLE `employee_management`
  ADD CONSTRAINT `employee_management_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `area_managers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shop_registrations` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shop_registrations`
--
ALTER TABLE `shop_registrations`
  ADD CONSTRAINT `shop_registrations_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `shop_registrations_ownerid_foreign` FOREIGN KEY (`ownerId`) REFERENCES `shopkeepers` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
