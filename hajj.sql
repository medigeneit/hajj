-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 04:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajj`
--

-- --------------------------------------------------------

--
-- Table structure for table `ic_group`
--

CREATE TABLE `ic_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_leader_id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_hajji_basic_info`
--

CREATE TABLE `ic_hajji_basic_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `passrord` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `national_id_card` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `per_villlege` varchar(255) DEFAULT NULL,
  `per_post_office` varchar(255) DEFAULT NULL,
  `per_thana` varchar(255) DEFAULT NULL,
  `per_district` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `nominee` varchar(255) NOT NULL,
  `maharram` varchar(255) NOT NULL,
  `maharram_relation` varchar(255) NOT NULL,
  `maharram_mobile_no` varchar(255) NOT NULL,
  `proffession` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `educational_institute` varchar(255) NOT NULL,
  `passing_year` int(11) NOT NULL,
  `previous_year_hajj` int(11) NOT NULL,
  `group_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `national_id_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_hajji_basic_info`
--

INSERT INTO `ic_hajji_basic_info` (`id`, `title`, `name`, `email`, `passrord`, `phone`, `father_name`, `mother_name`, `spouse_name`, `nationality`, `national_id_card`, `present_address`, `per_villlege`, `per_post_office`, `per_thana`, `per_district`, `dob`, `birth_place`, `nominee`, `maharram`, `maharram_relation`, `maharram_mobile_no`, `proffession`, `institute`, `educational_institute`, `passing_year`, `previous_year_hajj`, `group_id`, `image`, `national_id_photo`, `created_at`, `updated_at`) VALUES
(49, 'Prof', 'আমার ', 'Ali', 'Chilean', 'pa03645347', 'rabiul0420@gmail.com', 'It clan', 'Developer', 'Database sesign', 'dhaka', '1207', '+02876347345', '+880uifiqeuoie', 'cnic', 'pmdc', '0000-00-00', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '2018-08-08 11:55:43', '2018-08-08 11:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `ic_hajji_passport_info`
--

CREATE TABLE `ic_hajji_passport_info` (
  `id` int(11) NOT NULL,
  `passport_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue_date` varchar(255) DEFAULT NULL,
  `expired_date` varchar(255) DEFAULT NULL,
  `issue_place` varchar(255) DEFAULT NULL,
  `passport_type` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_submit_passport` varchar(45) NOT NULL,
  `hajji_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_hajji_passport_info`
--

INSERT INTO `ic_hajji_passport_info` (`id`, `passport_no`, `issue_date`, `expired_date`, `issue_place`, `passport_type`, `passport_photo`, `is_submit_passport`, `hajji_id`, `created_at`, `updated_at`) VALUES
(49, 'Amir', 'Ali', '2018-08-13', 'Female', 'files/WQWahOX4GdfbCkSHW1J7ICP4aUcpt4UakUObDyKr.jpeg', '', '', 0, '2018-08-08 11:55:43', '2018-08-08 11:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `ic_hajji_payments`
--

CREATE TABLE `ic_hajji_payments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'complete/pending',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `hajji_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_hajji_physical_info`
--

CREATE TABLE `ic_hajji_physical_info` (
  `id` int(11) NOT NULL,
  `strong_disease` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blood_pressure` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` int(11) NOT NULL,
  `diabetes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `food_problem` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `walking_problem` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_use_english_commode` varchar(45) NOT NULL,
  `is_reading_quran` varchar(45) NOT NULL,
  `is_read_quran_sahih` varchar(45) NOT NULL,
  `is_salat_sahih_reading` varchar(45) NOT NULL,
  `hajji_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_hajji_physical_info`
--

INSERT INTO `ic_hajji_physical_info` (`id`, `strong_disease`, `blood_pressure`, `blood_group`, `diabetes`, `food_problem`, `walking_problem`, `is_use_english_commode`, `is_reading_quran`, `is_read_quran_sahih`, `is_salat_sahih_reading`, `hajji_id`, `created_at`, `updated_at`) VALUES
(49, '', '', 0, '', '', '', '', '', '', '', 0, '2018-08-08 11:55:43', '2018-08-08 11:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `ic_hajj_setup`
--

CREATE TABLE `ic_hajj_setup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hajj_date` date NOT NULL,
  `last_date_passport` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ic_hajj_setup`
--

INSERT INTO `ic_hajj_setup` (`id`, `title`, `hajj_date`, `last_date_passport`, `status`, `created_at`, `updated_at`) VALUES
(1, 'This for test', '2018-10-16', '2018-10-25', 'InActive', '2018-10-18 01:13:47', '2018-10-18 01:13:47'),
(2, 'Prymary School Teacher', '2018-10-20', '2018-10-30', 'Active', '2018-10-18 01:14:34', '2018-10-18 01:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `ic_menu`
--

CREATE TABLE `ic_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `priority` int(11) NOT NULL DEFAULT '100',
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_menu` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_migrations`
--

CREATE TABLE `ic_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_migrations`
--

INSERT INTO `ic_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_13_085619_create_products_table', 1),
(2, '2018_02_13_085716_create_product_photos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ic_model_has_permissions`
--

CREATE TABLE `ic_model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_model_has_roles`
--

CREATE TABLE `ic_model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_model_has_roles`
--

INSERT INTO `ic_model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(1, 12, 'App\\User'),
(2, 12, 'App\\User'),
(2, 13, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `ic_packages`
--

CREATE TABLE `ic_packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `features` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ic_packages`
--

INSERT INTO `ic_packages` (`id`, `title`, `features`, `price`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(4, 'lenovo laptop', 'a:2:{i:0;s:11:\"cgjfgjg ffr\";i:1;s:4:\"tets\";}', '200.00', '<p>zxgdfgf</p>', 'Active', 2018, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `ic_pages`
--

CREATE TABLE `ic_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `template` varchar(45) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `button_link` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `extra` text,
  `extra_file` varchar(255) DEFAULT NULL,
  `venue_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extra1` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ic_password_resets`
--

CREATE TABLE `ic_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_password_resets`
--

INSERT INTO `ic_password_resets` (`email`, `token`, `created_at`) VALUES
('utpalseu@gmail.com', '$2y$10$VZF6rgGMkgrB.MDjX9gTxOHykxd7fjh0O6YhgDh.bSnieufx5/zpe', '2018-03-13 17:03:28'),
('rabiul0420@gmail.com', '$2y$10$tvqU40/XighXOt6nvc8SJuyQInIG1YQNeOoOyGc5lrmtyoIHsVjmi', '2018-06-12 12:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `ic_permissions`
--

CREATE TABLE `ic_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_permissions`
--

INSERT INTO `ic_permissions` (`id`, `name`, `parent_id`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 0, 'web', '2018-04-21 22:34:11', '2018-08-16 12:54:10'),
(15, 'User List', 1, 'web', '2018-07-05 09:12:37', '2018-07-05 09:12:37'),
(16, 'Add User', 1, 'web', '2018-07-05 09:18:55', '2018-07-05 09:18:55'),
(21, 'Settings Manager', 0, 'web', '2018-07-22 12:34:36', '2018-07-22 12:34:36'),
(27, 'Pages Manager', 0, 'web', '2018-07-23 06:57:35', '2018-07-23 06:57:35'),
(28, 'Menu Manager', 0, 'web', '2018-07-30 09:04:58', '2018-07-30 09:04:58'),
(29, 'Sliders Manager', 0, 'web', '2018-08-01 06:21:59', '2018-08-01 06:21:59'),
(30, 'Roles Manager', 1, 'web', '2018-08-07 09:09:16', '2018-08-07 09:09:16'),
(31, 'Permissions Manager', 1, 'web', '2018-08-07 09:09:56', '2018-08-07 09:09:56'),
(32, 'Edit User', 1, 'web', '2018-08-07 09:11:46', '2018-08-07 09:11:46'),
(33, 'Delete User', 1, 'web', '2018-08-07 09:20:15', '2018-08-07 09:20:27'),
(34, 'Packege Manager', 0, 'web', '2018-08-07 09:29:26', '2018-10-17 01:50:58'),
(35, 'Hajji Manager', 0, 'web', '2018-08-07 09:33:25', '2018-10-17 01:56:57'),
(36, 'Hajj Setup Manager', 0, 'web', '2018-10-18 00:39:06', '2018-10-18 00:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `ic_roles`
--

CREATE TABLE `ic_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_roles`
--

INSERT INTO `ic_roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2018-04-21 22:34:11', '2018-10-17 01:39:33'),
(2, 'Staff', 'web', '2018-04-21 22:58:52', '2018-10-17 01:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `ic_role_assign`
--

CREATE TABLE `ic_role_assign` (
  `id` int(11) NOT NULL,
  `client_role_id` varchar(45) DEFAULT 'null',
  `employee_role_id` varchar(45) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_role_assign`
--

INSERT INTO `ic_role_assign` (`id`, `client_role_id`, `employee_role_id`) VALUES
(1, '5', '4');

-- --------------------------------------------------------

--
-- Table structure for table `ic_role_has_permissions`
--

CREATE TABLE `ic_role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_role_has_permissions`
--

INSERT INTO `ic_role_has_permissions` (`permission_id`, `module_id`, `role_id`) VALUES
(1, NULL, 1),
(15, NULL, 1),
(16, NULL, 1),
(21, NULL, 1),
(27, NULL, 1),
(28, NULL, 1),
(29, NULL, 1),
(30, NULL, 1),
(31, NULL, 1),
(32, NULL, 1),
(34, NULL, 1),
(35, NULL, 1),
(36, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ic_settings`
--

CREATE TABLE `ic_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_settings`
--

INSERT INTO `ic_settings` (`id`, `key`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', NULL, 'hajj Support', NULL, NULL),
(2, 'site_slogan', NULL, NULL, NULL, NULL),
(3, 'site_favicon', NULL, '/photos/1/s1.png', NULL, NULL),
(4, 'site_logo', NULL, '/photos/1/s1.png', NULL, NULL),
(5, 'header_logo_1', NULL, NULL, NULL, NULL),
(6, 'header_logo_2', NULL, NULL, NULL, NULL),
(7, 'footer_logo_1', NULL, NULL, NULL, NULL),
(8, 'footer_logo_2', NULL, NULL, NULL, NULL),
(9, 'site_phone', NULL, NULL, NULL, NULL),
(10, 'site_phone2', NULL, NULL, NULL, NULL),
(11, 'site_email', NULL, NULL, NULL, NULL),
(12, 'site_email2', NULL, NULL, NULL, NULL),
(13, 'site_address', NULL, NULL, NULL, NULL),
(14, 'site_facebook', NULL, NULL, NULL, NULL),
(15, 'site_twitter', NULL, NULL, NULL, NULL),
(16, 'site_linkedin', NULL, NULL, NULL, NULL),
(17, 'site_instagram', NULL, NULL, NULL, NULL),
(18, 'count_down_time_title', NULL, NULL, NULL, NULL),
(19, 'countdown_ending_date', NULL, NULL, NULL, NULL),
(20, 'countdown_ending_time', NULL, '7:30 AM', NULL, NULL),
(21, 'home_page_about_us', NULL, NULL, NULL, NULL),
(22, 'home_page_registration', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ic_slider`
--

CREATE TABLE `ic_slider` (
  `id` int(11) NOT NULL,
  `title_top` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_bottom` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `link_target` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_slider`
--

INSERT INTO `ic_slider` (`id`, `title_top`, `title`, `title_bottom`, `button_title`, `button_link`, `link_target`, `status`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'The conference of', 'Maternal medicine', 'Dhaka, Bangladesh,Sep 15-20, 2018', 'Register now', '#', '_self', 'Active', 'images/JLtRAWOk4U08xgoMEfPBRAtGuVbj8q6DIBAi7gJZ.jpeg', 1, '2018-07-12 05:47:11', '2018-08-08 05:39:27'),
(2, 'The conference of', 'Home', 'Dhaka, Bangladesh,Sep 15-20, 2018', 'Register now', '#', '_blank', 'Active', 'images/bhEWIjYw9U58t0gcddF91LuKfUBRK647KATvRu2o.png', 1, '2018-07-12 05:52:57', '2018-08-08 05:00:43'),
(3, NULL, 'Bangladesh', NULL, NULL, NULL, '_self', 'Active', 'images/cQuvn3s0y8GDKBwVR7ifIUtFFiM5sU2J8JT4QPPN.png', 2, '2018-08-08 05:37:21', '2018-08-08 05:39:14'),
(4, NULL, 'Bangladesh', 'Bangladesh is our motherland', 'Register now', 'https://itclanbd.com', '_self', 'Active', 'images/rMMijKMvAHkCQuMOQyVYsNkISRkAAJNo42eUqjzK.jpeg', 1, '2018-08-08 05:39:45', '2018-08-16 09:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `ic_slider_category`
--

CREATE TABLE `ic_slider_category` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_slider_category`
--

INSERT INTO `ic_slider_category` (`id`, `title`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Home', NULL, '2018-08-08 04:48:52', '2018-08-08 04:41:02'),
(2, 'Bangladesh', NULL, '2018-08-08 06:00:48', '2018-08-08 05:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `ic_templates`
--

CREATE TABLE `ic_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_templates`
--

INSERT INTO `ic_templates` (`id`, `title`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'General Page', 'general_page', NULL, NULL),
(3, 'Bangladesh', 'bangladesh', NULL, NULL),
(4, 'Home', 'home', NULL, NULL),
(5, 'Message', 'message', NULL, NULL),
(6, 'Registration Form', 'registration_form', NULL, NULL),
(7, 'Organising Cimmittee', 'org_committee', NULL, NULL),
(8, 'Scientific Cimmittee', 'scientific_committee', NULL, NULL),
(9, 'Speakers', 'speakers', NULL, NULL),
(10, 'Program', 'program', NULL, NULL),
(11, 'Contact Us', 'contact_us', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ic_users`
--

CREATE TABLE `ic_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_users`
--

INSERT INTO `ic_users` (`id`, `name`, `email`, `password`, `phone`, `profile_image`, `user_status`, `user_type`, `role_id`, `services`, `designation`, `company_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin@gmail.com', '$2y$10$1vHbUfnpsJdnPJYoozO/wu2P.lCqjX3PvsQtqU4ukV5FrPZQ/BsY6', '01770823204', 'images/5d1c3244e0ece141c01286ba78d09b08.jpg', 2, 'admin', 1, NULL, 'Founder and CTO', 'ITclan BD', 'NsfMrOYXssitNiykNouDhBYvdDuZw4sBxGIJdA7LZl7Lfp0vr8kBnWpXGqW3', '2018-03-05 00:08:27', '2018-08-16 12:15:30'),
(12, 'test name', 'test@gmail.com', '$2y$10$R52A6hlLMWoPTj14D4AIEOs2bJtuNcgy/kULWKUonfRBOlCeH7QBm', NULL, 'images/5c2c4ba2bdbf8754c96a1ed8cd416735.jpg', 2, 'admin', NULL, NULL, NULL, NULL, NULL, '2018-07-22 11:14:31', '2018-07-22 11:22:14'),
(13, 'abul hasan', 'hasan@gmail.com', '$2y$10$la6HCTAzYL7cGzFql4C1juRWdP3NiIbMs7tmZW0PpnfI63O2E6OIe', '+29 6596 6936', '/photos/1/m1.png', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-22 12:23:27', '2018-08-17 12:18:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ic_group`
--
ALTER TABLE `ic_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_hajji_basic_info`
--
ALTER TABLE `ic_hajji_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_hajji_passport_info`
--
ALTER TABLE `ic_hajji_passport_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_hajji_physical_info`
--
ALTER TABLE `ic_hajji_physical_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_hajj_setup`
--
ALTER TABLE `ic_hajj_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_menu`
--
ALTER TABLE `ic_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_migrations`
--
ALTER TABLE `ic_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_model_has_permissions`
--
ALTER TABLE `ic_model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ic_model_has_roles`
--
ALTER TABLE `ic_model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ic_packages`
--
ALTER TABLE `ic_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_pages`
--
ALTER TABLE `ic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_password_resets`
--
ALTER TABLE `ic_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ic_permissions`
--
ALTER TABLE `ic_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_roles`
--
ALTER TABLE `ic_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_role_assign`
--
ALTER TABLE `ic_role_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_role_has_permissions`
--
ALTER TABLE `ic_role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `ic_settings`
--
ALTER TABLE `ic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_slider`
--
ALTER TABLE `ic_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_slider_category`
--
ALTER TABLE `ic_slider_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_templates`
--
ALTER TABLE `ic_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_users`
--
ALTER TABLE `ic_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ic_group`
--
ALTER TABLE `ic_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_hajji_basic_info`
--
ALTER TABLE `ic_hajji_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ic_hajji_passport_info`
--
ALTER TABLE `ic_hajji_passport_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ic_hajji_physical_info`
--
ALTER TABLE `ic_hajji_physical_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ic_hajj_setup`
--
ALTER TABLE `ic_hajj_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ic_menu`
--
ALTER TABLE `ic_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_migrations`
--
ALTER TABLE `ic_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ic_packages`
--
ALTER TABLE `ic_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ic_pages`
--
ALTER TABLE `ic_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_permissions`
--
ALTER TABLE `ic_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ic_roles`
--
ALTER TABLE `ic_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ic_role_assign`
--
ALTER TABLE `ic_role_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ic_settings`
--
ALTER TABLE `ic_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ic_slider`
--
ALTER TABLE `ic_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ic_slider_category`
--
ALTER TABLE `ic_slider_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ic_templates`
--
ALTER TABLE `ic_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ic_users`
--
ALTER TABLE `ic_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ic_model_has_permissions`
--
ALTER TABLE `ic_model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `ic_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ic_model_has_roles`
--
ALTER TABLE `ic_model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `ic_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ic_role_has_permissions`
--
ALTER TABLE `ic_role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `ic_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `ic_roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
