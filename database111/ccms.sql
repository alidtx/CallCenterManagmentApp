-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `login_status` varchar(50) NOT NULL,
  `reason_late_in` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `employee_id`, `login_date`, `login_time`, `logout_time`, `login_status`, `reason_late_in`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-06-25', '12:25:50', '12:25:50', 'late', 'illness', '2024-06-25 06:25:50', '2024-06-25 11:53:47'),
(2, 1, 7, '2024-06-25', '10:29:28', '10:29:28', 'normal', 'transportation', '2024-06-25 06:29:28', '2024-06-25 11:58:42'),
(3, 1, 6, '2024-06-25', '12:31:13', '12:31:13', 'late', 'family_issue', '2024-07-01 06:31:13', '2024-06-27 04:37:53'),
(11, 1, 6, '2024-06-25', '12:31:13', '12:31:13', 'late', 'family_issue', '2024-07-02 06:31:13', '2024-06-27 04:37:53'),
(12, 1, 6, '2024-06-25', '12:31:13', '12:31:13', 'late', 'family_issue', '2024-07-03 06:31:13', '2024-06-27 04:37:53'),
(13, 1, 6, '2024-06-25', '12:31:13', '12:31:13', 'late', 'family_issue', '2024-06-25 06:31:13', '2024-06-27 04:37:53'),
(14, 1, 1, '2024-07-03', '11:19:49', '11:19:49', 'late', 'transportation', '2024-07-03 05:19:49', '2024-07-03 05:21:09'),
(15, 3, 6, '2024-07-03', '13:39:20', '13:39:20', 'late', NULL, '2024-07-03 07:39:20', '2024-07-03 07:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SBA capital Devid', 1, '2024-06-24 04:33:06', '2024-06-24 05:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Engineering Department', '1', '2024-06-23 04:51:42', '2024-06-24 10:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Software Developer1', 1, '2024-06-20 10:33:40', '2024-06-23 03:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `employeeUniqueId` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `user_id`, `department_id`, `designation_id`, `employeeUniqueId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ali rimon', 4, 1, 1, '98467', 1, '2024-07-03 09:10:34', '2024-07-03 09:10:34'),
(2, 'Ali Abu Taleb', 5, 1, 1, '44246', 1, '2024-07-03 09:11:06', '2024-07-03 09:11:06'),
(3, 'Ranvir Islam', 3, 1, 1, '32298', 1, '2024-07-03 09:12:52', '2024-07-03 09:12:52');

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `looking_amount` decimal(8,2) NOT NULL,
  `credit_score` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `is_dnc` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `email`, `business_name`, `looking_amount`, `credit_score`, `phone`, `is_dnc`, `user_id`, `employee_id`, `campaign_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kevin', 'kar', 'alirimon5@gmail.com', 'Ignite Capital', 12000.00, '550', '01638912320', 0, 1, 7, 1, '1', '2024-07-01 11:49:24', '2024-07-01 11:49:24'),
(2, 'Devid', 'De', 'alirimon5@gmail.com', 'Ignite Capital', 12000.00, '550', '01638912320', 0, 1, 6, 1, '1', '2024-07-01 11:49:52', '2024-07-01 11:49:52'),
(3, 'John', 'JO', 'alirimon5@gmail.com', 'Ignite Capital', 12000.00, '550', '01638912320', 1, 1, 1, 1, '1', '2024-07-01 11:50:16', '2024-07-01 11:50:16'),
(4, 'John', 'JO', 'alirimon5@gmail.com', 'Ignite Capital', 12000.00, '550', '01638912320', 1, 1, 1, 1, '1', '2024-07-01 11:50:16', '2024-07-01 11:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `lead_offers`
--

CREATE TABLE `lead_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_offers`
--

INSERT INTO `lead_offers` (`id`, `type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 100.00, 0, '2024-06-30 10:47:30', '2024-07-01 09:24:26'),
(2, 2, 200.00, 0, '2024-06-30 10:49:42', '2024-07-01 09:24:23'),
(3, 3, 300.00, 1, '2024-06-30 10:49:53', '2024-07-02 10:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_leave` date NOT NULL,
  `until` date NOT NULL,
  `leave_category` varchar(20) NOT NULL,
  `total_working_day` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `next_join_date` date NOT NULL,
  `reason_of_leave` longtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `employee_id`, `designation_id`, `department_id`, `date_of_leave`, `until`, `leave_category`, `total_working_day`, `next_join_date`, `reason_of_leave`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2024-06-26', '2024-06-26', 'full', 1, '2024-06-27', 'ff', '01638912320', 0, '2024-06-26 09:12:09', '2024-06-26 09:12:09'),
(2, 1, 1, 1, 1, '2024-06-26', '2024-06-26', 'full', 1, '2024-06-27', 'ff', '01638912320', 0, '2024-06-26 10:17:11', '2024-06-26 11:25:55');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_07_103112_create_permission_tables', 1),
(7, '2023_09_11_101221_create_user_otps_table', 1),
(8, '2023_09_19_135946_create_notifications_table', 1),
(9, '2023_09_19_140134_create_jobs_table', 1),
(10, '2023_10_03_135419_create_files_table', 1),
(11, '2023_10_10_115017_add_deleted_at_to_all_tables', 1),
(12, '2023_10_11_141307_create_user_notifications_table', 1),
(13, '2024_01_22_140235_create_settings_table', 1),
(17, '2024_06_20_142334_create_designations_table', 3),
(19, '2024_06_23_100357_create_departments_table', 4),
(22, '2024_06_24_101348_create_campaigns_table', 6),
(24, '2024_06_24_165111_create_attendances_table', 8),
(25, '2024_06_26_102426_create_leaves_table', 9),
(28, '2024_06_27_153436_create_user_emp_wise_leads_table', 11),
(30, '2024_06_23_105641_create_leads_table', 12),
(31, '2024_06_30_141248_create_per_leads_table', 13),
(33, '2024_06_30_154543_create_lead_offers_table', 14),
(34, '2024_06_24_144441_create_salaries_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('64999fa6-cfa4-45a5-bb8e-30c696d245af', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 2, '{\"message\":\"Your account has been created successfully. Please change your password.\",\"title\":\"Account Created\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/change-password\"}', '2024-06-30 07:55:04', '2024-06-30 07:12:01', '2024-06-30 07:55:04'),
('7378b682-5486-45b8-a5b4-b4796803c544', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 3, '{\"message\":\"Your account has been created successfully. Please change your password.\",\"title\":\"Account Created\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/change-password\"}', NULL, '2024-07-03 06:12:25', '2024-07-03 06:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dashboard.view', 'dashboard', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(2, 'User-create', 'User', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(3, 'User-view', 'User', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(4, 'User-edit', 'User', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(5, 'User-delete', 'User', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(6, 'role-list', 'role', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(7, 'role-create', 'role', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(8, 'role-edit', 'role', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(9, 'role-delete', 'role', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(10, 'settings-create', 'settigs', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(11, 'lead.list', 'lead', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(12, 'salary.list', 'Salary', 'web', '2024-06-25 03:38:52', '2024-06-25 03:38:52', NULL),
(13, 'campaign.list', 'Campaign', 'web', '2024-06-25 03:43:48', '2024-06-25 03:43:48', NULL),
(14, 'department.list', 'Department', 'web', '2024-06-25 03:47:00', '2024-06-25 03:47:00', NULL),
(15, 'designation.list', 'Designation', 'web', '2024-06-25 03:52:06', '2024-06-25 03:52:06', NULL),
(16, 'employee.list', 'Employee', 'web', '2024-06-25 03:56:55', '2024-06-25 03:56:55', NULL),
(17, 'attendance.list', 'Attendance', 'web', '2024-06-25 09:00:49', '2024-06-25 09:00:49', NULL),
(18, 'attendance.late_attend', 'Late Attend', 'web', '2024-06-26 03:42:04', '2024-06-26 03:42:04', NULL),
(19, 'leave.add', 'Apply for Leave', 'web', '2024-06-26 11:35:54', '2024-06-26 11:35:54', NULL),
(20, 'per_lead.list', 'Per Lead', 'web', '2024-06-30 09:36:49', '2024-06-30 09:36:49', NULL),
(21, 'lead_offer.list', 'Offer', 'web', '2024-06-30 10:53:16', '2024-06-30 10:53:16', NULL),
(22, 'monthly_salary.list', 'Monthly Salary', 'web', '2024-07-01 08:18:13', '2024-07-01 08:18:13', NULL),
(23, 'attendance.deduction_summery', 'Deduction Summery', 'web', '2024-07-03 04:28:55', '2024-07-03 04:28:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `per_leads`
--

CREATE TABLE `per_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `per_leads`
--

INSERT INTO `per_leads` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 100.00, '2024-06-30 09:26:54', '2024-06-30 09:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'web', '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(2, 'agent', 'web', '2024-07-03 06:10:33', '2024-07-03 06:10:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
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
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transportation` decimal(8,2) NOT NULL,
  `food` decimal(8,2) NOT NULL,
  `residance` decimal(8,2) NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `amount`, `transportation`, `food`, `residance`, `employee_id`, `designation_id`, `department_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 30000.00, 1000.00, 1000.00, 5000.00, 1, 1, 1, 1, '2024-07-01 04:22:16', '2024-07-01 04:22:16'),
(2, 40000.00, 1000.00, 1000.00, 5000.00, 7, 1, 1, 1, '2024-07-01 05:22:31', '2024-07-01 05:22:31'),
(3, 30000.00, 1000.00, 1000.00, 5000.00, 6, 1, 1, 1, '2024-07-01 06:10:59', '2024-07-01 06:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_type` varchar(255) NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile_image`, `email`, `phone`, `email_verified_at`, `password`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ali Abu Taleb', NULL, 'admin@gmail.com', '01846699646', NULL, '$2y$10$i6RElskd7XhE42mnO8kPneXahaeh9jzvszhbGRBV4ROP01tUYwKKi', 1, 'admin', NULL, '2024-05-27 05:16:39', '2024-05-27 05:16:39', NULL),
(2, 'Ali Rimon', NULL, 'alirimon5@gmail.com', '01638912320', NULL, '$2y$10$.aIyvRXImXfb/8Rzs6n.mONHR9e/tOySCXxdoq51CgKnT7qZcBNY2', 1, 'admin', NULL, '2024-06-30 07:12:00', '2024-06-30 07:12:00', NULL),
(3, 'Ranvir Islam', NULL, 'alirimon10@gmail.com', '01816042120', NULL, '$2y$10$i00iYQidnpv..NPiKB7aqePT4vV4LTde6z5HXnj9DanLsW6FMAE8K', 1, 'agent', NULL, '2024-07-03 06:12:24', '2024-07-03 06:12:24', NULL),
(4, 'Ali Rimon', NULL, 'alirimon11@gmail.com', '01816042121', NULL, '$2y$10$i00iYQidnpv..NPiKB7aqePT4vV4LTde6z5HXnj9DanLsW6FMAE8K', 1, 'agent', NULL, '2024-07-03 06:12:24', '2024-07-03 06:12:24', NULL),
(5, 'Ali Abu Taleb', NULL, 'alirimon12@gmail.com', '01816042122', NULL, '$2y$10$i00iYQidnpv..NPiKB7aqePT4vV4LTde6z5HXnj9DanLsW6FMAE8K', 1, 'agent', NULL, '2024-07-03 06:12:24', '2024-07-03 06:12:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_emp_wise_leads`
--

CREATE TABLE `user_emp_wise_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `lead_offer_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_emp_wise_leads`
--

INSERT INTO `user_emp_wise_leads` (`id`, `user_id`, `employee_id`, `lead_id`, `campaign_id`, `lead_offer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 1, 1, NULL, '2024-06-30 05:37:48', '2024-06-30 05:37:48'),
(2, 2, 7, 3, 1, NULL, '2024-06-30 07:15:53', '2024-06-30 07:15:53'),
(3, 2, 7, 4, 1, NULL, '2024-06-30 07:16:28', '2024-06-30 07:16:28'),
(4, 2, 7, 5, 1, NULL, '2024-06-30 07:18:02', '2024-06-30 07:18:02'),
(5, 1, 7, 6, 1, NULL, '2024-06-30 07:26:41', '2024-06-30 07:26:41'),
(6, 1, 7, 7, 1, NULL, '2024-07-01 03:44:45', '2024-07-01 03:44:45'),
(7, 1, 6, 8, 1, NULL, '2024-07-01 06:02:42', '2024-07-01 06:02:42'),
(8, 1, 5, 9, 1, NULL, '2024-07-01 10:00:47', '2024-07-01 10:00:47'),
(9, 1, 3, 23, 1, 3, '2024-07-01 10:03:02', '2024-07-01 10:03:02'),
(10, 1, 7, 1, 1, 3, '2024-07-01 11:49:24', '2024-07-01 11:49:24'),
(11, 1, 6, 2, 1, 3, '2024-07-01 11:49:52', '2024-07-01 11:49:52'),
(12, 1, 6, 3, 1, 3, '2024-07-01 11:50:16', '2024-07-01 11:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL COMMENT 'All,Single',
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_verify` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `expire_at` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_index` (`user_id`),
  ADD KEY `attendances_employee_id_index` (`employee_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_user_id_index` (`user_id`),
  ADD KEY `leads_employee_id_index` (`employee_id`),
  ADD KEY `leads_campaign_id_index` (`campaign_id`);

--
-- Indexes for table `lead_offers`
--
ALTER TABLE `lead_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_offers_type_index` (`type`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_index` (`employee_id`),
  ADD KEY `leaves_designation_id_index` (`designation_id`),
  ADD KEY `leaves_department_id_index` (`department_id`),
  ADD KEY `leaves_leave_category_index` (`leave_category`),
  ADD KEY `leaves_total_working_day_index` (`total_working_day`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `per_leads`
--
ALTER TABLE `per_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_index` (`employee_id`),
  ADD KEY `salaries_designation_id_index` (`designation_id`),
  ADD KEY `salaries_department_id_index` (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_emp_wise_leads`
--
ALTER TABLE `user_emp_wise_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_emp_wise_leads_user_id_index` (`user_id`),
  ADD KEY `user_emp_wise_leads_employee_id_index` (`employee_id`),
  ADD KEY `user_emp_wise_leads_lead_id_index` (`lead_id`),
  ADD KEY `user_emp_wise_leads_campaign_id_index` (`campaign_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead_offers`
--
ALTER TABLE `lead_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `per_leads`
--
ALTER TABLE `per_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_emp_wise_leads`
--
ALTER TABLE `user_emp_wise_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salaries_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_emp_wise_leads`
--
ALTER TABLE `user_emp_wise_leads`
  ADD CONSTRAINT `user_emp_wise_leads_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_emp_wise_leads_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_emp_wise_leads_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_emp_wise_leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
