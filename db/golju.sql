-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 11:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golju`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `image`, `description`, `brief_description`, `created_at`, `updated_at`) VALUES
(1, 'SRI GOLJU FURNITURE INDUSTRIES (INDIA)', 'values-step.png', 'Sri Golju Furniture Industries is a well-known name for Furniture in Uttarakhand for 20years. Serving Uttarakhand from 2 locations Dehradun & Haldwani. Our both the Showroom are a One-Stop Furniture Shop where you can buy Home Furniture, Office Furniture, School Furniture, Mall Racks, Store Racks, Departmental Store Racks, Gondola Racks, Furniture for Marriage, & other furniture. We also deal with top furniture brands in India like Geeken, Godrej, Neelkamal, Supreme, Triveni, Onoma, Kurlon. We are the only authorized dealer of these brands in Haldwani. We have a wide range of Geeken Chairs, Geeken Tables, Geeken Office Furniture, Geeken Steel Almirah. We design & also have a Great range of Modular Kitchens from Top brands like Hettich, Blum, Elica, Inox, Hafele.', '<div class=\"accordion\" style=\"box-shadow: 0px 2px 14px 0px #00000030\" id=\"coreValues\">\n    <div class=\"card\">\n        <div style=\"cursor: pointer;\" class=\"card-header\" id=\"headingOne\">\n            <a class=\"w-100 font-weight-bold bg_light d-flex justify-content-between accordion_btn\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">\n                Quality & Innovation\n                <i class=\"bi bi-chevron-right\"></i>\n            </a>\n        </div>\n\n        <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#coreValues\">\n            <div class=\"card-body\">\n                We are determined to deliver best-in-class quality, coming up with in-trend-and-beyond\n                designs.\n            </div>\n        </div>\n    </div>\n    <div class=\"card\">\n        <div style=\"cursor: pointer;\" class=\"card-header\" id=\"headingTwo\">\n            <a class=\"w-100 font-weight-bold bg_light d-flex justify-content-between accordion_btn\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">\n                Customer & Community\n                <i class=\"bi bi-chevron-right\"></i>\n            </a>\n        </div>\n        <div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#coreValues\">\n            <div class=\"card-body\">\n                Customer satisfaction is our main focus, which is the basis of our customisation\n                services. We take our contribution to the community seriously and believe in delivering\n                more than what we take.\n            </div>\n        </div>\n    </div>\n    <div class=\"card\">\n        <div style=\"cursor: pointer;\" class=\"card-header\" id=\"headingThree\">\n            <a class=\"w-100 font-weight-bold bg_light d-flex justify-content-between accordion_btn\" data-toggle=\"collapse\" data-target=\"#collapseThree\" aria-expanded=\"false\" aria-controls=\"collapseThree\">\n                Integrity\n                <i class=\"bi bi-chevron-right\"></i>\n            </a>\n        </div>\n        <div id=\"collapseThree\" class=\"collapse\" aria-labelledby=\"headingThree\" data-parent=\"#coreValues\">\n            <div class=\"card-body\">\n                Integrity and Honesty keeps us on our path, making us persevere unless we have achieved\n                our cause.\n            </div>\n        </div>\n    </div>\n    <div class=\"card\">\n        <div style=\"cursor: pointer;\" class=\"card-header\" id=\"headingFour\">\n            <a class=\"w-100 font-weight-bold bg_light d-flex justify-content-between accordion_btn\" data-toggle=\"collapse\" data-target=\"#collapseFour\" aria-expanded=\"false\" aria-controls=\"collapseFour\">\n                Teamwork & Collaboration\n                <i class=\"bi bi-chevron-right\"></i>\n            </a>\n        </div>\n        <div id=\"collapseFour\" class=\"collapse\" aria-labelledby=\"headingFour\" data-parent=\"#coreValues\">\n            <div class=\"card-body\">\n                Teamwork is the foundation of all that we have achieved so far.\n            </div>\n        </div>\n    </div>\n</div>', '2021-07-22 02:22:00', '2021-07-30 05:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `title`, `name`, `number`, `ifsc_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Axis bank', 'Sri Golju Furniture Industries', '584010200002547', 'UTIB0000584', 1, '2021-07-23 02:57:24', '2021-07-30 06:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Furniture that creates a difference', 'banner-1.jpg', 1, '2021-07-21 07:07:15', '2021-07-21 07:07:15'),
(2, 'Geeken Collection - Best Selling Products Range', 'banner-2.jpg', 1, '2021-07-21 07:07:40', '2021-07-21 07:08:04'),
(3, 'Mall Racks', 'banner-3.jpg', 1, '2021-07-21 07:10:11', '2021-07-21 07:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Zorin - Furniture with style and substance', 'zorin.png', 1, '2021-07-21 23:33:25', '2021-07-21 23:34:51'),
(3, 'Triveni', 'triveni.png', 1, '2021-07-21 23:36:29', '2021-07-21 23:36:29'),
(4, 'Supreme', 'supreme.png', 1, '2021-07-21 23:36:38', '2021-07-30 04:11:51'),
(5, 'Sleepwell', 'sleepwell.png', 1, '2021-07-21 23:36:45', '2021-07-21 23:36:45'),
(6, 'playGro', 'playgro.png', 1, '2021-07-21 23:36:53', '2021-07-21 23:36:53'),
(7, 'Nilkamal', 'nilkamal.png', 1, '2021-07-21 23:37:00', '2021-07-21 23:37:00'),
(8, 'Kurl-on', 'kurlon.png', 1, '2021-07-21 23:37:08', '2021-07-21 23:37:08'),
(9, 'hettich', 'hettich.png', 1, '2021-07-21 23:37:17', '2021-07-21 23:37:17'),
(10, 'Hafele', 'hafele.png', 1, '2021-07-21 23:37:27', '2021-07-21 23:37:27'),
(11, 'Godrej Interio', 'godrej-interio.png', 1, '2021-07-21 23:37:39', '2021-07-21 23:37:39'),
(12, 'Geeken', 'geeken.png', 1, '2021-07-21 23:37:45', '2021-07-21 23:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `title`, `pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hospital Furniture', 'Hospital-Furniture.pdf', 1, '2021-07-21 07:17:46', '2021-07-21 07:17:46'),
(2, 'Office Furniture', 'Office-Furniture.pdf', 1, '2021-07-21 07:22:06', '2021-07-21 07:22:06'),
(3, 'Mall Rack', 'Mall-rack.pdf', 1, '2021-07-21 07:22:16', '2021-07-21 07:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Almirah', 'almirah', '472153-200.png', 1, '2021-07-21 06:50:07', '2021-07-21 06:50:07'),
(2, 'Office Chair', 'office-chair', 'office-chair-2.png', 1, '2021-07-21 07:13:34', '2021-07-21 07:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ansi Bifma E3 2012', 'ansi-bifma-e3-2012.jpg', 1, '2021-07-22 01:40:24', '2021-07-22 01:40:24'),
(3, 'Ansi Bifma F3 2012', 'ansi-bifma-f3-2012.jpg', 1, '2021-07-22 01:40:46', '2021-07-22 01:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anniversary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company`, `contact_person`, `phone_number`, `mobile_number`, `email`, `address`, `contact_person_address`, `birthday`, `anniversary`, `profession`, `status`, `created_at`, `updated_at`) VALUES
(2, 'VT Company', 'VT', '234567890', '24567', 'v@t.com', 'address', 'kulyalpura', '17 september', '15 july', 'ceo', 1, '2021-07-26 05:03:19', '2021-07-26 05:09:16'),
(5, 'vipin', 'vipin', NULL, '8899552233', NULL, 'hld', NULL, NULL, NULL, NULL, 1, '2021-07-26 07:48:04', '2021-07-26 07:48:04'),
(6, 'sdfs', 'sef', NULL, '345', NULL, 'sdf', NULL, NULL, NULL, NULL, 1, '2021-07-26 07:48:04', '2021-07-26 07:48:04'),
(7, 'vipin', 'vipin', NULL, '8899552233', NULL, 'hld', NULL, NULL, NULL, NULL, 1, '2021-07-30 04:30:56', '2021-07-30 04:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Jewellery Meet 2015', '20.jpg', 1, '2021-07-22 04:49:33', '2021-07-22 04:49:33'),
(4, 'm2', 'Collage.jpg', 1, '2021-07-22 05:01:05', '2021-07-22 05:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `gallery_id`, `path`, `status`, `created_at`, `updated_at`) VALUES
(4, 'img 2', '3', '4.jpg', 1, '2021-07-22 04:59:26', '2021-07-22 04:59:26'),
(5, 'img 3', '3', '6.jpg', 1, '2021-07-22 05:00:12', '2021-07-22 05:00:12'),
(6, 'w1', '4', 'WhatsApp Image 2021-06-14 at 11.16.56 (1).jpeg', 1, '2021-07-22 05:01:17', '2021-07-22 05:01:17'),
(7, 'w2', '4', 'WhatsApp Image 2021-06-14 at 11.16.57 (1).jpeg', 1, '2021-07-22 05:01:33', '2021-07-22 05:01:33'),
(8, 'ththfth', '4', 'WhatsApp Image 2021-06-14 at 11.16.54 (1).jpeg', 1, '2021-07-22 05:33:11', '2021-07-22 05:33:11');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_07_19_072351_create_banners_table', 1),
(25, '2021_07_20_070304_create_gallery_table', 1),
(26, '2021_07_20_084825_create_category_table', 1),
(27, '2021_07_20_100456_create_catalogue_table', 1),
(28, '2021_07_21_060453_create_products_table', 1),
(29, '2021_07_21_083854_create_pages_table', 1),
(30, '2021_07_21_092918_create_about_table', 1),
(31, '2021_07_22_043559_create_brands_table', 2),
(32, '2021_07_22_052901_create_testimonial_table', 3),
(33, '2021_07_22_065655_create_certificates_table', 4),
(34, '2021_07_22_071730_create_store_table', 5),
(35, '2021_07_22_075057_create_about_table', 6),
(36, '2021_07_22_093202_create_images_table', 7),
(37, '2021_07_22_093832_create_images_table', 8),
(38, '2021_07_22_112356_create_store_table', 9),
(39, '2021_07_23_075756_create_banks_table', 10),
(40, '2021_07_23_093510_create_quotations_table', 11),
(41, '2021_07_23_093610_create_quotation_items_table', 11),
(42, '2021_07_23_123354_create_quotations_table', 12),
(43, '2021_07_23_130851_create_quotation_items_table', 13),
(44, '2021_07_24_070008_create_quotation_items_table', 14),
(45, '2021_07_24_082456_create_quotation_items_table', 15),
(46, '2021_07_26_095222_create_customer_table', 16),
(47, '2021_07_26_112022_create_presentations_table', 17),
(48, '2021_07_27_054509_create_orderslips_table', 18),
(49, '2021_07_27_070235_create_order_slips_table', 19),
(50, '2021_07_27_070445_create_order_slips_table', 20),
(51, '2021_07_27_070553_create_order_slips_table', 21),
(52, '2021_07_27_071717_create_order_slip_items_table', 22),
(53, '2021_07_27_072003_create_order_slips_table', 22),
(54, '2021_07_27_072331_create_order_slip_items_table', 23),
(55, '2021_07_29_081219_create_users_table', 24),
(56, '2021_07_29_085230_create_roles_table', 25),
(57, '2021_07_29_093640_create_users_table', 26),
(58, '2021_07_29_093900_create_roles_table', 27),
(59, '2021_07_29_100659_create_permissions_table', 28),
(60, '2021_07_29_102858_create_role_permissions_table', 29),
(61, '2021_07_30_053734_create_permissions_table', 30),
(62, '2021_07_30_054244_create_roles_table', 31),
(63, '2021_07_31_053927_create_quotations_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_slips`
--

CREATE TABLE `order_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_slips`
--

INSERT INTO `order_slips` (`id`, `order_number`, `added_date`, `customer_name`, `customer_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SGFI210526001', '23-07-21', 'VT', '1234567890', 1, '2021-07-27 01:53:45', '2021-07-27 01:53:45'),
(3, 'SGFI210526003', '2021-07-29', 'vtok', '123', 1, '2021-07-27 05:15:15', '2021-07-29 02:22:28'),
(4, 'SGFI210526001', '2021-07-27', 'VET2', '1234567890', 1, '2021-07-27 05:29:36', '2021-07-27 05:39:47'),
(5, 'SGFI210526002', '2021-07-30', 'vttt2', '1234567890', 1, '2021-07-30 04:49:16', '2021-07-30 04:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_slip_items`
--

CREATE TABLE `order_slip_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_slip_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_slip_items`
--

INSERT INTO `order_slip_items` (`id`, `order_slip_id`, `item_name`, `item_image`, `fabric`, `width`, `height`, `created_at`, `updated_at`) VALUES
(1, '1', 'sofa', 'default.jpg', 'cotton', '5ft.', '6ft.', '2021-07-27 01:53:45', '2021-07-27 01:53:45'),
(12, '3', 'tstok', '1467648974_denturee.jpg', 'sdf', 'asd', 'dv', '2021-07-29 02:21:32', '2021-07-29 02:21:32'),
(13, '3', 'xsdfs123456789', '1467198022_10.jpg', 'sdf1234', 'asd23456', '12345', '2021-07-29 02:21:32', '2021-07-29 02:21:32'),
(14, '5', 'dxfvdfv', '1466848758_1466445893_teeth.jpg', 'dfv', '456t', 'ssdf', '2021-07-30 04:49:45', '2021-07-30 04:49:45'),
(15, '5', 'awdawd', '1466848758_1466445893_teeth.jpg', 'dfvawd', '456tawd', 'ssdfawd', '2021-07-30 04:49:45', '2021-07-30 04:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Testimonial', 'testimonial', 'testimonial', 'testimonial', 'testimonial', 1, '2021-07-21 23:54:23', '2021-07-30 05:06:39'),
(2, 'About', 'about', 'about', 'about', 'about', 1, '2021-07-22 00:32:02', '2021-07-22 00:32:02');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'create', 'Create', NULL, 1, '2021-07-30 00:08:00', '2021-07-30 00:08:00'),
(2, 'edit', 'Update', NULL, 1, '2021-07-30 00:08:47', '2021-07-30 00:08:47'),
(3, 'delete', 'destroy', NULL, 1, '2021-07-30 00:09:10', '2021-07-30 00:09:10'),
(4, 'view', 'Show', NULL, 1, '2021-07-30 00:10:07', '2021-07-30 00:10:07'),
(5, 'crm', 'CRM', NULL, 1, '2021-07-30 00:10:49', '2021-07-30 00:10:49'),
(6, 'website', 'Website', NULL, 1, '2021-07-30 00:11:13', '2021-07-30 00:11:13'),
(7, 'ecommerce', 'Ecommerce', NULL, 1, '2021-07-30 00:11:33', '2021-07-30 00:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `title`, `type`, `image`, `video`, `status`, `created_at`, `updated_at`) VALUES
(2, 'VRT', 'image', 'GP-110A-600x600.png', '', 1, '2021-07-26 06:26:51', '2021-07-26 06:43:34'),
(3, 'dfgdfg', 'video', '', 'https://youtu.be/68HflkJKpTQ', 1, '2021-07-26 06:27:39', '2021-07-26 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `color`, `brief_description`, `thumbnail`, `image`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'GP-111', 'gp-111', 'Black', 'TYPE/MECHANISM: TORSION BAR.HIGH BACK CHAIR.CUSSION ARM.GASLIFT.POWDER COATED METAL BASE.LEATHRITE TAPESTRY.', 'GP-111.jpg', 'GP-111.jpg', '1', 1, '2021-07-21 07:01:54', '2021-07-21 07:13:49'),
(3, 1, 'Anmol', 'anmol', 'Chocolate/ Maroon/ Green/ Yellow/ Ultra Blue', '2 Way Locking system for higher Security. Locker with number lock for providing additional security to your valuables. Multiple and Adjustable shelves to meet all your storage needs', 'anmol-1.jpg', 'anmol-1.jpg', '1', 1, '2021-07-21 07:12:29', '2021-07-21 07:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_and_conditions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` tinyint(4) NOT NULL,
  `made_by` tinyint(4) NOT NULL,
  `added_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `reference_number`, `client_name`, `price_type`, `sub_total`, `grand_total`, `discount`, `discount_type`, `sector`, `terms_and_conditions`, `bank_id`, `made_by`, `added_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SGFI210731001', 'vt', 'mrp', '11500', '11500', NULL, 'individual', 'non-government', '<ul><li>50% Advance payment & rest before 2 days of delivery.</li><li>Transport Rs.1200 will be extra, as actual.</li><li>Delivery period 15 days receive of p.o date.</li><li>G.S.T will be extra, as actual.</li><li>this is for an extra condition</li></ul><p><br></p><p></p>', 1, 1, '2021-07-31', 1, '2021-07-31 00:11:58', '2021-07-31 02:21:08'),
(2, 'SGFI210731002', 'vttt', 'mrp', '9000', '9000', NULL, 'individual', 'non-government', '<ul><li>50% Advance payment & rest before 2 days of delivery.</li><li>Transport Rs.1200 will be extra, as actual.</li><li>Delivery period 15 days receive of p.o date.</li></ul><p><br></p><p></p>', 1, 1, '2021-07-31', 1, '2021-07-31 01:59:54', '2021-07-31 02:26:40'),
(3, 'SGFI210731003', 'gov', 'price', '482000', '482000', NULL, 'individual', 'government', '<ul><li>G.S.T will be extra, as actual.</li></ul><p><br></p><p></p>', 1, 1, '2021-07-31', 1, '2021-07-31 03:45:04', '2021-07-31 03:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounted_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_id`, `name`, `description`, `image`, `quantity`, `color`, `item_discount`, `unit_price`, `rate`, `discounted_total`, `status`, `created_at`, `updated_at`) VALUES
(7, '62', 'dfg', NULL, 'default.jpg', '1', '', NULL, '456', '456.00', '456.00', 1, '2021-07-27 06:50:07', '2021-07-27 06:50:07'),
(8, '62', 'df', NULL, 'default.jpg', '2', '', NULL, '560', '560.00', '1,120.00', 1, '2021-07-27 06:50:07', '2021-07-27 06:50:07'),
(86, '63', 'ghn', 'dgdrgd', 'default.jpg', '2', '', NULL, '3456', '3,456.00', '6,912.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(87, '63', 'dfg', '', 'default.jpg', '4', '', NULL, '435', '435.00', '1,740.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(88, '63', 'dfg', 'sdfsf', 'default.jpg', '4', '', NULL, '234', '234.00', '936.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(89, '63', 'drfg', '', 'default.jpg', '3', '', NULL, '45', '45.00', '135.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(90, '63', 'dfg', 'sefesf', 'default.jpg', '4', '', NULL, '455', '455.00', '1,820.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(91, '63', 'rdg', '', 'default.jpg', '3', '', NULL, '4544', '4,544.00', '13,632.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(92, '63', 'rtgd', '', 'default.jpg', '2', '', NULL, '54', '54.00', '108.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(93, '63', 'dhftgh', '', 'default.jpg', '3', '', NULL, '456', '456.00', '1,368.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(94, '63', 'fth', '', 'default.jpg', '45', '', NULL, '566', '566.00', '25,470.00', 1, '2021-07-29 01:18:12', '2021-07-29 01:18:12'),
(99, '67', 'sef', NULL, 'default.jpg', '1', 'ref', NULL, '10000', '9,500.00', '9,500.00', 1, '2021-07-30 05:29:28', '2021-07-30 05:29:28'),
(138, '1', 'sofa', '', '1466848821_1466445957_hygienist.jpg', '1', '', '5', '10000', '9,500.00', '9,500.00', 1, '2021-07-31 02:19:05', '2021-07-31 02:19:05'),
(139, '1', 'chair', '', '1466848758_1466445893_teeth.jpg', '1', '', '', '1000', '1,000.00', '1,000.00', 1, '2021-07-31 02:19:05', '2021-07-31 02:19:05'),
(140, '1', 'new', 'this', '1466848726_1466445873_office.jpg', '2', 'yes', '', '500', '500.00', '1,000.00', 1, '2021-07-31 02:19:05', '2021-07-31 02:19:05'),
(141, '2', 'new', '', '1466848821_1466445957_hygienist.jpg', '1', '', '10', '10000', '9,000.00', '9,000.00', 1, '2021-07-31 02:26:34', '2021-07-31 02:26:34'),
(142, '3', 'sofa', 'n publishing and graphic design, Lorem ipsum is a placeholder text', 'michael-browning-D0ov97Td-xM-unsplash.jpg', '1', 'red', '', '10000', '10,000.00', '10,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24'),
(143, '3', 'chair', 'n publishing and graphic design, Lorem ipsum is a placeholder text', '1466848758_1466445893_teeth.jpg', '2', 'green', '', '20000', '20,000.00', '40,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24'),
(144, '3', 'chair 2', 'n publishing and graphic design, Lorem ipsum is a placeholder text', '1466848726_1466445873_office.jpg', '5', 'blue', '', '15000', '15,000.00', '75,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24'),
(145, '3', 'sofa 2', 'n publishing and graphic design, Lorem ipsum is a placeholder text', '1466848699_1466445854_kid.jpg', '10', 'cyan', '', '10000', '10,000.00', '100,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24'),
(146, '3', 'table', 'n publishing and graphic design, Lorem ipsum is a placeholder text', '1467185345_fa fa-hospital-o.jpg', '15', 'magenta', '', '15000', '15,000.00', '225,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24'),
(147, '3', 'table 2', 'n publishing and graphic design, Lorem ipsum is a placeholder text', '1467185188_fa fa-stethoscope.jpg', '20', 'yellow', '', '1600', '1,600.00', '32,000.00', 1, '2021-07-31 03:47:24', '2021-07-31 03:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'CEO', 'Head of the Company', 1, '2021-07-30 00:13:40', '2021-07-30 00:23:36'),
(2, 'Manager', 'manager', NULL, 1, '2021-07-30 00:17:11', '2021-07-30 00:17:11'),
(3, 'Employee', 'Team', NULL, 1, '2021-07-30 01:28:24', '2021-07-30 01:28:24'),
(4, 'Vendor', 'vendor', NULL, 1, '2021-07-30 01:29:02', '2021-07-30 01:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-07-30 00:17:11', '2021-07-30 00:17:11'),
(2, 2, 4, '2021-07-30 00:17:11', '2021-07-30 00:17:11'),
(3, 2, 5, '2021-07-30 00:17:11', '2021-07-30 00:17:11'),
(4, 1, 1, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(5, 1, 2, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(6, 1, 3, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(7, 1, 4, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(8, 1, 5, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(9, 1, 6, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(10, 1, 7, '2021-07-30 00:23:36', '2021-07-30 00:23:36'),
(66, 3, 1, '2021-07-30 01:28:24', '2021-07-30 01:28:24'),
(67, 3, 4, '2021-07-30 01:28:24', '2021-07-30 01:28:24'),
(68, 3, 5, '2021-07-30 01:28:24', '2021-07-30 01:28:24'),
(69, 4, 1, '2021-07-30 01:29:02', '2021-07-30 01:29:02'),
(70, 4, 4, '2021-07-30 01:29:02', '2021-07-30 01:29:02'),
(71, 4, 5, '2021-07-30 01:29:02', '2021-07-30 01:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `title`, `mobile_number`, `email`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Haldwani', '7906921278', 'sales.srigoljufurniture@gmail.com', 'golju-tower.jpg', 'Sri Golju Tower, Opposite Jivan Daan Hospital, Moti Nagar Road Bareilly - Nainital Rd, Haldwani, Uttarakhand | 263139', 1, '2021-07-22 05:57:23', '2021-07-22 05:57:41'),
(3, 'Dehradun', '7895983824', 'uttrakhand.geeken@gmail.com', 'golju-tower.jpg', 'Sri Golju Furniture Industries, GMS Road Near JB Marbles, Shree Ram Tower, Dehradun, Uttarakhand | 248001', 1, '2021-07-22 06:02:31', '2021-07-22 06:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `display_picture`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Boffin Brains', 'BoffinBrains-logo.png', 'We purchased office Furniture from \"Sri Golju Furniture Industries\". As we were a young IT startup we got our furniture at very affordable prices. The staff was also kind.', 1, '2021-07-22 00:04:59', '2021-07-22 00:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile_number`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Vedant Tamta', '1234567890', 'v@t.com', '$2y$10$h.wC69HFqfZv/FvAtE6hAOtQjEKGhwa4WV9iOO6blOO3BE0a7gEMq', 1, '2021-07-29 04:07:37', '2021-07-29 04:07:37'),
(3, 'Prateek', '0987654321', 'prateek@gmail.com', '$2y$10$8mBlFkHqLwlPg/jh2qHi3u3tcPUcTlYS.Aon1s8HOlv3xqkFO2e.G', 3, '2021-07-30 01:33:03', '2021-07-30 01:38:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_slips`
--
ALTER TABLE `order_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_slip_items`
--
ALTER TABLE `order_slip_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_title_unique` (`title`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_title_unique` (`title`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_slips`
--
ALTER TABLE `order_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_slip_items`
--
ALTER TABLE `order_slip_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
