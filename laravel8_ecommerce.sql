-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 01:10 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_logo`, `front_page`, `created_at`, `updated_at`) VALUES
(6, 'xyz', 'xyz', 'files/brand/asfdsfd.jpg', 0, NULL, NULL),
(7, 'Zara man', 'zara-man', 'files/brand/zara-man.jpg', 1, NULL, NULL),
(8, 'Plus Point', 'plus-point', 'files/brand/plus-point.jpg', 1, NULL, NULL),
(9, 'Zara man2', 'zara-man2', 'files/brand/zara-man2.jpg', 1, NULL, NULL),
(10, 'Zara man3', 'zara-man3', 'files/brand/zara-man3.jpg', 1, NULL, NULL),
(11, 'Zara man4', 'zara-man4', 'files/brand/zara-man4.jpg', 1, NULL, NULL),
(12, 'Zara man5', 'zara-man5', 'files/brand/zara-man5.jpg', 1, NULL, NULL),
(13, 'Zara man6', 'zara-man6', 'files/brand/zara-man6.jpg', 1, NULL, NULL),
(14, 'Zara man7', 'zara-man7', 'files/brand/zara-man7.jpg', 1, NULL, NULL),
(15, 'Zara man8', 'zara-man8', 'files/brand/zara-man8.jpg', 1, NULL, NULL),
(16, 'Zara man9', 'zara-man9', 'files/brand/zara-man9.jpg', 1, NULL, NULL),
(17, 'Zara man10', 'zara-man10', 'files/brand/zara-man10.jpg', 1, NULL, NULL),
(18, 'Zara man11', 'zara-man11', 'files/brand/zara-man11.jpg', 1, NULL, NULL),
(19, 'Zara man12', 'zara-man12', 'files/brand/zara-man12.jpg', 1, NULL, NULL),
(20, 'Allengers', 'allengers', 'files/brand/allengers.png', 1, NULL, NULL),
(21, 'Omron', 'omron', 'files/brand/omron.png', 1, NULL, NULL),
(22, '3M Littmann', '3m-littmann', 'files/brand/3m-littmann.png', 1, NULL, NULL),
(23, 'Zara man15', 'zara-man15', 'files/brand/zara-man15.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `start_date`, `end_date`, `image`, `status`, `discount`, `month`, `year`, `created_at`, `updated_at`) VALUES
(9, 'september offer2', '2024-01-01', '2024-01-05', 'files/campaign/september-offer2.png', '0', '20', 'January', '2024', NULL, NULL),
(12, 'hot offer', '2024-01-14', '2024-01-18', 'files/campaign/hot-offer.png', '0', '15', 'January', '2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `icon`, `home_page`, `created_at`, `updated_at`) VALUES
(1, 'Mens Feshion', 'mens-feshion', 'files/category/mens-feshion.png', 0, NULL, NULL),
(2, 'Women Feshion', 'women-feshion', 'files/category/women-feshion.png', 0, NULL, NULL),
(3, 'Electronics', 'electronics', 'files/category/electronics.png', 0, NULL, NULL),
(4, 'Furnitures', 'furnitures', 'files/category/furnitures.png', 0, NULL, '2024-01-14 19:30:16'),
(5, 'Vehicle', 'vehicle', 'files/category/vehicle.jpeg', 0, NULL, NULL),
(6, 'Sports', 'sports', 'files/category/sports.png', 0, NULL, NULL),
(7, 'Medical Equipment & Components', 'medical-equipment-components', 'files/category/medical-equipment-components.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `childcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `childcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `category_id`, `subcategory_id`, `childcategory_name`, `childcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Casual shoe', 'casual-shoe', NULL, NULL),
(2, 2, 2, 'Red shoe', 'red-shoe', NULL, NULL),
(3, 7, 5, 'plain x-ray', 'plain-x-ray', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amjad', 'hmamjad999@gmail.com', '01776102769', 'dsafd', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `coupon_amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `type`, `coupon_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'coupon-1000', '2024-01-10', 1, 1000, 'Active', NULL, NULL),
(2, 'coupon-2000', '2024-01-22', 1, 2000, 'Active', NULL, NULL),
(3, 'coupon-3000', '2024-01-22', 1, 3000, 'Active', NULL, NULL);

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
(166, '2014_10_12_000000_create_users_table', 1),
(167, '2014_10_12_100000_create_password_resets_table', 1),
(168, '2019_08_19_000000_create_failed_jobs_table', 1),
(169, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(170, '2023_12_14_093231_create_categories_table', 1),
(171, '2023_12_18_063255_create_subcategories_table', 1),
(172, '2023_12_19_055723_create_childcategories_table', 1),
(173, '2023_12_21_062552_create_brands_table', 1),
(174, '2023_12_26_053536_create_seos_table', 1),
(175, '2023_12_26_080204_create_smtp_table', 1),
(176, '2023_12_26_090156_create_pages_table', 1),
(177, '2023_12_27_053720_create_products_table', 1),
(178, '2023_12_27_064502_create_warehouses_table', 1),
(179, '2023_12_27_073509_create_settings_table', 1),
(180, '2023_12_30_051208_create_coupons_table', 1),
(181, '2024_01_01_055910_create_pickup_point_table', 1),
(182, '2024_01_11_092509_create_reviews_table', 2),
(183, '2024_01_13_094044_create_wishlists_table', 3),
(185, '2024_01_14_093211_create_campaigns_table', 4),
(186, '2018_12_23_120000_create_shoppingcart_table', 5),
(187, '2024_01_21_071641_create_wbreviews_table', 5),
(188, '2024_01_21_094351_create_shippings_table', 6),
(189, '2024_01_22_054328_create_newsletters_table', 7),
(192, '2024_01_22_183548_create_orders_table', 8),
(193, '2024_01_22_183611_create_order_details_table', 8),
(194, '2024_01_27_094509_create_contacts_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'amjad@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_extra_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `c_name`, `c_phone`, `c_email`, `c_country`, `c_zipcode`, `c_address`, `c_extra_phone`, `c_city`, `subtotal`, `total`, `coupon_code`, `coupon_discount`, `after_discount`, `payment_type`, `tax`, `shipping_charge`, `order_id`, `status`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 'Amjad', '01776102769', 'hmamjad@gmail.com', 'Bangladesh', '1212', 'Banasree', '01303096617', 'Khilgaon', '12000.00', '12000.00', 'coupon-2000', '2000', '10000', 'Hand Cash', '0', '0', '15960', 3, '22-01-2024', 'January', '2024', NULL, NULL),
(2, 4, 'Rana', '01776102770', 'rana@gmail.com', 'Bangladesh', '1212', 'Banasree,E-Block', '01776102769', 'Khilgaon', '12000.00', '12000.00', NULL, NULL, NULL, 'Hand Cash', '0', '0', '62041', 0, '23-01-2024', 'January', '2024', NULL, NULL),
(4, 4, 'Rana', '01776102769', 'hmamjad999@gmail.com', 'Bangladesh', '1212', 'Banasree', '01776102769', 'Khilgaon', '12000.00', '12000.00', NULL, NULL, NULL, 'Aamarpay', '0', '0', '13602', 0, '23-01-2024', 'January', '2024', NULL, NULL),
(17, 4, 'Rana', '01776102769', 'rana@gmail.com', 'Bangladesh', '1212', 'Banasree', '01776102769', 'Khilgaon', '16000.00', '16000.00', NULL, NULL, NULL, 'Aamarpay', '0', '0', '88857', 0, '23-01-2024', 'January', '2024', NULL, NULL),
(18, 2, 'Amjad', '01776102769', 'rana@gmail.com', 'Bangladesh', '1212', 'Banasree', '01776102769', 'Khilgaon', '15500.00', '15500.00', NULL, NULL, NULL, 'Aamarpay', '0', '0', '86220', 0, '23-01-2024', 'January', '2024', NULL, NULL),
(19, 2, 'Amjad', '01776102769', 'hmamjad999@gmail.com', 'Bangladesh', '1212', 'Banasree', '01776102769', 'Khilgaon', '24000.00', '24000.00', NULL, NULL, NULL, 'Hand Cash', '0', '0', '11959', 3, '27-01-2024', 'January', '2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `single_price`, `subtotal_price`, `created_at`, `updated_at`) VALUES
(1, 1, 28, 'x-ray', 'red', '10', '1', '12000', '12000', NULL, NULL),
(2, 2, 28, 'x-ray', 'red', '10', '1', '12000', '12000', NULL, NULL),
(3, 4, 28, 'x-ray', 'red', '10', '1', '12000', '12000', NULL, NULL),
(4, 11, 27, 'OTHER COLORS AVAILABLE (30) Black, 27 inch', 'red', '10', '2', '15500', '31000', NULL, NULL),
(5, 17, 25, 'MARS 40 - 80 FIXED X-RAY', 'red', '30', '1', '16000', '16000', NULL, NULL),
(6, 18, 27, 'OTHER COLORS AVAILABLE (30) Black, 27 inch', 'red', '10', '1', '15500', '15500', NULL, NULL),
(7, 19, 28, 'x-ray', 'white', '20', '2', '12000', '24000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_position` int(11) DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_position`, `page_name`, `page_slug`, `page_title`, `page_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'page-1', 'page-1', 'This is page 1', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(2, 1, 'page-2', 'page-2', 'This is page 2', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(3, 1, 'Page Three', 'page-three', 'This is page 3', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(4, 1, 'Page Four', 'page-four', 'This is page 4', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(5, 1, 'Page Five', 'page-five', 'This is page 5', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(6, 1, 'Page six', 'page-six', 'This is page 6', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(7, 2, 'Page Eight', 'page-eight', 'This is page 8', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(8, 2, 'Page Nine', 'page-nine', 'This is page 9', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(9, 2, 'Page Ten', 'page-ten', NULL, '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(10, 2, 'Page Eleven', 'page-eleven', 'This is page 11', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL),
(11, 2, 'Page Twelve', 'page-twelve', 'This is page 12', '<ul class=\"ullinks bx--list--unordered\" style=\"width: 100%;\"><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_compare.html\">Conditions that compare business terms and values</a></strong><br>\r\nYou can build conditions that compare and manipulate numeric and boolean\r\n (true or false) values, dates, business terms, and text strings.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_existence.html\">Conditions that test for existence</a></strong><br>\r\nYou can build conditions that check whether one or more business terms of a certain type exist in a set of data.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_setmembership.html\">Conditions that test set membership</a></strong><br>\r\nYou can use conditions to test whether a business term belongs to a set.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_combinations.html\">Combinations of conditions</a></strong><br>\r\nYou can apply conditions to groups, and test nested groups.</li><li class=\"ulchildlink bx--list__item\"><strong><a href=\"https://www.ibm.com/docs/en/SSQP76_8.10.x/com.ibm.odm.dcenter.bu.econsole/shared_actionrules_topics/con_actionrules_cond_negation.html\">Condition negation</a></strong><br>\r\nYou can set a rule to perform an action when a condition is not true.</li></ul><p></p>', NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_point`
--

CREATE TABLE `pickup_point` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_point_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_adddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_point`
--

INSERT INTO `pickup_point` (`id`, `pickup_point_name`, `pickup_point_adddress`, `pickup_point_phone`, `pickup_point_phone_two`, `created_at`, `updated_at`) VALUES
(1, 'Motijeel', 'Motijeel arambag', '01776102769', '01779595058', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `today_deal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `product_slider` int(11) DEFAULT 0,
  `product_views` int(11) DEFAULT 0,
  `trendy` int(2) DEFAULT 0,
  `flash_deal_id` int(11) DEFAULT NULL,
  `cash_on_delivery` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `pickup_point_id`, `name`, `slug`, `code`, `unit`, `tags`, `color`, `size`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `description`, `thumbnail`, `images`, `featured`, `today_deal`, `status`, `product_slider`, `product_views`, `trendy`, `flash_deal_id`, `cash_on_delivery`, `admin_id`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(25, 7, 7, 3, 20, 1, 'MARS 40 - 80 FIXED X-RAY', 'mars-40-80-fixed-x-ray', 'MARS 40', 'xyz', 'xyz', 'red,white,yellow', '30,40,50', 'BIt9o4zCWCQ', '15000', '16000', NULL, '0', 1, '<p>This is good product</p>', 'mars-40-80-fixed-x-ray.jpg', '[\"1788144676259308.jpg\",\"1788144676296127.jpg\",\"1788144676332558.jpg\",\"1789231125518600.png\",\"1789231470494089.jpg\"]', 1, 1, 1, 1, 73, NULL, NULL, NULL, 1, '15-01-2024', 'January', '2024', NULL, '2024-01-27 04:57:57'),
(26, 7, 6, NULL, 21, 1, 'Omron MC-246 (MC246) 60 Second Digital Rigid Thermometer', 'omron-mc-246-mc246-60-second-digital-rigid-thermometer', 'MC-246', 'xyz', 'MC-246', 'white,red,green', '10,20,30', 'BIt9o4zCWCQ', '15000', '16000', '15500', '80', 1, '<p>Good product</p>', 'omron-mc-246-mc246-60-second-digital-rigid-thermometer.jpg', '[\"1788146579104160.jpg\",\"1788146579163854.jpg\"]', 1, 1, 1, 1, 89, 1, NULL, NULL, 1, '15-01-2024', 'January', '2024', NULL, '2024-01-22 04:08:16'),
(27, 7, 7, NULL, 22, 1, 'OTHER COLORS AVAILABLE (30) Black, 27 inch', 'other-colors-available-30-black-27-inch', '6186C', 'xyz', 'xyz', 'red,white,black', '10,20,30', 'BIt9o4zCWCQ', '15000', '16000', '15500', '80', 1, '<p>Good product</p>', 'other-colors-available-30-black-27-inch.jpg', '[\"1788148599298040.jpg\",\"1788148599476646.jpg\"]', 1, 1, 1, 1, 97, 1, NULL, NULL, 1, '15-01-2024', 'January', '2024', NULL, '2024-01-23 05:47:49'),
(28, 7, 5, 3, 20, 1, 'x-ray', 'x-ray', 'x-123', 'xyz', 'xyz', 'red,white,black', '10,20,30', 'BIt9o4zCWCQ', '15000', '14000', '12000', '47', 1, '<p>good product</p>', 'x-ray.jpg', '[\"1788610508116840.jpg\",\"1788610508153374.jpg\",\"1788610508207268.jpg\"]', 1, 1, 1, 1, 33, 1, NULL, NULL, 1, '20-01-2024', 'January', '2024', NULL, '2024-01-27 03:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_year` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `review_date`, `review_month`, `review_year`, `rating`, `created_at`, `updated_at`) VALUES
(12, 2, 26, 'Good product', '16-01-2024', 'January', 2024, 5, NULL, NULL),
(13, 2, 25, 'This is good produt.I used it.You can buy it.', '17-01-2024', 'January', 2024, 5, NULL, NULL),
(14, 2, 28, 'This is good product', '27-01-2024', 'January', 2024, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `meta_keyword`, `google_verification`, `google_analytics`, `alexa_verification`, `google_adsense`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '৳', '01776102769', '01776102769', 'hmamjad999@gmail.com', 'hmamjad999@gmail.com', 'files/setting/659d0eee551b6.png', 'files/setting/659d0eeea5ff3.jpg', 'Dahaka, Rampura, Banasree', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`id`, `mailer`, `host`, `port`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mens Shoe', 'mens-shoe', NULL, NULL),
(2, 2, 'Women shoe', 'women-shoe', NULL, NULL),
(3, 1, 'Men Shirt', 'men-shirt', NULL, NULL),
(4, 1, 'Women Shari', 'women-shari', NULL, NULL),
(5, 7, 'X-ray', 'x-ray', NULL, NULL),
(6, 7, 'Thermometer', 'thermometer', NULL, NULL),
(7, 7, 'Stethoscope', 'stethoscope', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2VkqQcOhq1CiQRJVEbZjnumDXt9tt8az03K0sPANnaV2W59pAumY2', NULL, '1', NULL, '2024-01-02 04:31:52', '2024-01-02 04:31:52'),
(2, 'Amjad', 'amjad@gmail.com', NULL, '$2y$10$2VkqQcOhq1CiQRJVEbZjnumDXt9tt8az03K0sPANnaV2W59pAumY2', NULL, NULL, NULL, '2024-01-03 23:20:20', '2024-01-03 23:20:20'),
(3, 'Jabed', 'jabed@gmail.com', NULL, '$2y$10$2VkqQcOhq1CiQRJVEbZjnumDXt9tt8az03K0sPANnaV2W59pAumY2', NULL, NULL, NULL, '2024-01-04 00:13:54', '2024-01-04 00:13:54'),
(4, 'Rana', 'rana@gmail.com', NULL, '$2y$10$8N0CKee2itgC0BL8naRtb.fztIId5JwNFPV4nHzhkRzxPLwgyJorS', '01776102769', NULL, NULL, NULL, '2024-01-21 04:12:02'),
(5, 'Hossain', 'hossain@gmail.com', NULL, '$2y$10$2VkqQcOhq1CiQRJVEbZjnumDXt9tt8az03K0sPANnaV2W59pAumY2', NULL, NULL, NULL, NULL, NULL),
(6, 'Mamun', 'mamun@gmail.com', NULL, '$2y$10$UgL/KENZFXpWI5uSEE0eG.wquy54xHAsmVcbxAsX4pfUvUtDMqpRi', NULL, NULL, NULL, '2024-01-13 03:23:36', '2024-01-13 03:23:36'),
(7, 'Kamal', 'kamal@gmail.com', NULL, '$2y$10$z9pv7HrlUjUe1vZI9hmLquU4DTgj/bDKxBXpqdBlKTysSOLHUJLgS', NULL, NULL, NULL, '2024-01-27 04:39:48', '2024-01-27 04:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `warehouse_address`, `warehouse_phone`, `created_at`, `updated_at`) VALUES
(1, 'Warehouse 102', 'Dahka Banasree', '01776102760', NULL, NULL),
(2, 'Warehouse 103', 'Dahka Banasree', '01776102760', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wbreviews`
--

CREATE TABLE `wbreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wbreviews`
--

INSERT INTO `wbreviews` (`id`, `user_id`, `name`, `review`, `rating`, `review_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Amjad', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5, '21, January 2024', 1, NULL, NULL),
(2, 3, 'Jabed', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, '21, January 2024', 1, NULL, NULL),
(3, 4, 'Rana', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, '21, January 2024', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `date`, `created_at`, `updated_at`) VALUES
(18, 3, 27, '20, January 2024', NULL, NULL),
(19, 3, 25, '20, January 2024', NULL, NULL),
(20, 3, 26, '20, January 2024', NULL, NULL),
(21, 2, 28, '27 , January 2024', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcategories_category_id_foreign` (`category_id`),
  ADD KEY `childcategories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_point`
--
ALTER TABLE `pickup_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_user_id_foreign` (`user_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbreviews`
--
ALTER TABLE `wbreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wbreviews_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_point`
--
ALTER TABLE `pickup_point`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wbreviews`
--
ALTER TABLE `wbreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD CONSTRAINT `childcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `childcategories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wbreviews`
--
ALTER TABLE `wbreviews`
  ADD CONSTRAINT `wbreviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
