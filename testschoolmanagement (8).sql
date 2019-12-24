-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 06:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testschoolmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `attendence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `classId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `studentId`, `attendence`, `bId`, `sectionId`, `classId`, `created_at`, `updated_at`) VALUES
(737, 1, 'present', 30, 25, 15, '2019-12-14 11:44:50', '2019-12-14 11:44:50'),
(738, 1, 'absent', 30, 25, 15, '2019-12-12 18:00:00', '2019-12-14 11:45:41'),
(739, 1, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(740, 2, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(741, 3, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(742, 4, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(743, 5, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(744, 6, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(745, 7, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(746, 8, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(747, 9, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(748, 10, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(749, 11, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(750, 12, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(751, 13, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(752, 14, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(753, 15, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(754, 16, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(755, 17, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(756, 18, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(757, 19, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(758, 20, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31'),
(759, 21, 'present', 30, 25, 15, '2019-12-18 07:51:31', '2019-12-18 07:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `className` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(10) UNSIGNED NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL COMMENT 'branch_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `duration`, `seat`, `bId`, `created_at`, `updated_at`) VALUES
(13, 'Nine', '1 year', 200, 0, '2019-11-17 07:14:04', '2019-11-17 07:14:04'),
(14, 'Eight', '1 year', 100, 0, '2019-11-17 07:14:28', '2019-11-17 07:14:28'),
(15, 'Nine', '1 year', 100, 30, '2019-11-24 07:35:56', '2019-11-30 07:26:51'),
(16, 'Ten', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(17, 'One', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(18, 'Two', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(19, 'Three', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(20, 'Four', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(21, 'Five', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(22, 'Six', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(23, 'Seven', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-11-25 12:18:04'),
(24, 'Eight', '1 year', 100, 30, '2019-11-25 12:18:04', '2019-12-15 07:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `classId` int(10) UNSIGNED NOT NULL COMMENT 'classId',
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'gov, nonGov',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name',
  `amount` double(8,2) NOT NULL COMMENT 'amount',
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `classId` bigint(20) UNSIGNED NOT NULL COMMENT 'class_table_id',
  `status` int(11) NOT NULL COMMENT 'disable 0, enable 1',
  `interval` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'monthly,quarterly,half Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type`, `name`, `amount`, `bId`, `classId`, `status`, `interval`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gov', 'Test management', 300.00, 30, 15, 0, 'quarterly', '2019-12-21 13:44:06', '2019-12-21 14:04:06', NULL),
(2, 'nonGov', 'tiffin', 300.00, 30, 15, 1, 'monthly', '2019-12-21 14:03:19', '2019-12-21 14:03:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_collections`
--

CREATE TABLE `fee_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL COMMENT 'student_table_id',
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `amount` double(8,2) NOT NULL COMMENT 'amount',
  `due` float(8,2) NOT NULL DEFAULT 0.00,
  `totalAmount` double(8,2) NOT NULL COMMENT 'total Amount',
  `transactionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'for payment information',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'transaction type',
  `accountNumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1',
  `paidMonth` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1',
  `month` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1',
  `year` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'year',
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_collections`
--

INSERT INTO `fee_collections` (`id`, `studentId`, `feeId`, `amount`, `due`, `totalAmount`, `transactionId`, `type`, `accountNumber`, `paidMonth`, `month`, `year`, `sectionId`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(57, 2, 2, 300.00, 0.00, 300.00, '0', '0', '0', 'DECEMBER', 'DECEMBER', '22', 25, 30, '2019-12-23 09:31:03', '2019-12-23 09:31:03', NULL),
(62, 21, 2, 300.00, 0.00, 300.00, '0', '0', '0', 'DECEMBER', 'DECEMBER', '22', 25, 30, '2019-12-24 07:12:00', '2019-12-24 07:12:00', NULL),
(63, 1, 2, 300.00, 0.00, 150.00, '0', '0', '0', 'DECEMBER', 'DECEMBER', '22', 25, 30, '2019-12-24 07:14:03', '2019-12-24 07:14:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_histories`
--

CREATE TABLE `fee_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `amount` double(8,2) NOT NULL COMMENT 'amount',
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_histories`
--

INSERT INTO `fee_histories` (`id`, `feeId`, `amount`, `bId`, `created_at`, `updated_at`) VALUES
(5, 7, 3000.00, 30, '2019-12-15 09:12:09', '2019-12-15 09:12:09'),
(6, 7, 30000.00, 30, '2019-12-15 09:13:14', '2019-12-15 09:13:14'),
(7, 7, 300.00, 30, '2019-12-15 09:43:08', '2019-12-15 09:43:08'),
(8, 8, 4000.00, 30, '2019-12-15 09:43:37', '2019-12-15 09:43:37'),
(9, 8, 40000.00, 30, '2019-12-15 10:52:57', '2019-12-15 10:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `type`, `image`, `userId`, `studentId`, `created_at`, `updated_at`) VALUES
(1, 'profile', '1576655895.jpg', 81, NULL, '2019-12-18 07:58:15', '2019-12-18 07:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group`, `bId`, `created_at`, `updated_at`) VALUES
(1, 'Science', 0, '2019-11-16 05:10:24', '2019-11-16 05:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `subjectId` bigint(20) UNSIGNED NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `markType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `classId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `studentId`, `subjectId`, `mark`, `markType`, `bId`, `sectionId`, `classId`, `created_at`, `updated_at`) VALUES
(10, 3, 1, '67', '1st-Term', 30, 25, 15, '2019-12-01 07:47:26', '2019-12-01 07:47:26'),
(11, 4, 1, '78', '1st-Term', 30, 25, 15, '2019-12-01 07:47:26', '2019-12-01 07:47:26'),
(12, 6, 1, '77', '1st-Term', 30, 25, 15, '2019-12-01 07:47:26', '2019-12-01 07:47:26'),
(24, 3, 1, '56', '2nd', 30, 25, 15, '2019-12-01 12:20:33', '2019-12-01 12:20:33'),
(25, 4, 1, '56', '2nd', 30, 25, 15, '2019-12-01 12:20:33', '2019-12-01 12:20:33'),
(26, 6, 1, '56', '2nd', 30, 25, 15, '2019-12-01 12:20:33', '2019-12-01 12:20:33'),
(27, 3, 1, '21', '2nd', 30, 25, 15, '2019-12-01 12:26:53', '2019-12-01 12:26:53'),
(28, 4, 1, '23', '2nd', 30, 25, 15, '2019-12-01 12:26:53', '2019-12-01 12:26:53'),
(29, 6, 1, '24', '2nd', 30, 25, 15, '2019-12-01 12:26:53', '2019-12-01 12:26:53'),
(30, 1, 1, '78', 'final', 30, 25, 15, '2019-12-14 11:46:44', '2019-12-14 11:46:44');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_10_09_084521_create_admins_table', 2),
(5, '2019_10_15_105407_create_permission_tables', 2),
(14, '2019_10_07_113658_create_classes_table', 6),
(15, '2019_11_07_073023_create_sections_table', 7),
(17, '2019_11_07_084707_create_session_years_table', 8),
(19, '2019_11_11_123600_create_groups_table', 10),
(25, '2019_11_18_083036_create_attendances_table', 11),
(27, '2019_11_13_100753_create_subjects_table', 12),
(29, '2019_11_30_195808_create_marks_table', 13),
(33, '2014_10_12_000000_create_users_table', 14),
(34, '2019_10_20_102030_create_school_branches_table', 14),
(36, '2019_12_03_153030_create_class_teachers_table', 14),
(40, '2019_12_03_193222_create_studentoptionalsubjects_table', 17),
(41, '2019_12_10_140443_create_student_histories_table', 17),
(44, '2019_12_12_165138_create_student_fees_table', 17),
(45, '2019_12_12_171013_create_fee_histories_table', 17),
(47, '2019_12_09_153641_create_files_table', 19),
(49, '2019_12_21_144745_create_student_scholarships_table', 20),
(50, '2019_12_21_185057_create_months_table', 21),
(51, '2019_12_12_123434_create_fees_table', 22),
(52, '2019_12_12_123501_create_fee_collections_table', 23),
(53, '2019_12_24_140217_create_scholarships_table', 24),
(55, '2019_11_13_074359_create_students_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\User', 1),
(3, 'App\\User', 74),
(3, 'App\\User', 75),
(3, 'App\\User', 78),
(3, 'App\\User', 79),
(8, 'App\\User', 81),
(9, 'App\\User', 82),
(9, 'App\\User', 83),
(10, 'App\\User', 84);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `created_at`, `updated_at`) VALUES
(1, 'JANUARY', NULL, NULL),
(2, 'FEBRUARY', NULL, NULL),
(3, 'MARCH', NULL, NULL),
(4, 'APRIL', NULL, NULL),
(5, 'MAY', NULL, NULL),
(6, 'JUNE', NULL, NULL),
(7, 'JULY', NULL, NULL),
(8, 'AUGUST', NULL, NULL),
(9, 'SEPTEMBER', NULL, NULL),
(10, 'OCTOBER', NULL, NULL),
(11, 'NOVEMBER', NULL, NULL),
(12, 'DECEMBER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=superAdmin,schoolAdmin, 0=other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(83, 'Admission', 'web', 0, '2019-10-30 02:39:51', '2019-10-30 02:39:51'),
(85, 'Student', 'web', 0, '2019-10-30 02:40:08', '2019-10-30 02:40:08'),
(90, 'Attendance', 'web', 0, '2019-10-30 02:41:18', '2019-10-30 02:41:18'),
(95, 'User Management', 'web', 0, '2019-10-30 04:46:31', '2019-10-30 04:46:31'),
(96, 'Super Admin', 'web', 1, '2019-10-30 08:01:30', '2019-10-30 08:01:30'),
(101, 'Class', 'web', 0, '2019-11-16 04:44:59', '2019-11-16 04:44:59'),
(102, 'Section', 'web', 0, '2019-11-16 04:45:51', '2019-11-16 04:45:51'),
(103, 'SessionYear', 'web', 0, '2019-11-16 04:46:08', '2019-11-16 04:46:08'),
(105, 'Subject', 'web', 0, '2019-11-16 04:46:31', '2019-11-16 04:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=superAdmin,schoolAdmin, 0>other',
  `bId` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `bId`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'web', 1, 0, '2019-10-22 07:49:53', '2019-10-22 07:49:53'),
(8, 'School Admin', 'web', 0, 0, '2019-11-23 12:07:22', '2019-11-23 12:07:22'),
(9, 'Teacher', 'web', 0, 0, '2019-11-24 08:04:48', '2019-11-24 08:04:48'),
(10, 'Class Teacher', 'web', 0, 0, '2019-11-25 12:57:11', '2019-11-25 12:57:11'),
(11, 'Class Teacher', 'web', 0, 30, '2019-12-04 11:36:23', '2019-12-04 11:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(83, 3),
(83, 8),
(83, 9),
(83, 11),
(85, 8),
(85, 9),
(85, 11),
(90, 8),
(90, 9),
(90, 10),
(90, 11),
(95, 3),
(95, 8),
(95, 9),
(95, 11),
(96, 3),
(101, 3),
(101, 8),
(101, 9),
(101, 11),
(102, 3),
(102, 8),
(102, 9),
(102, 11),
(103, 3),
(103, 8),
(103, 11),
(105, 3),
(105, 8),
(105, 9),
(105, 10),
(105, 11);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) DEFAULT NULL COMMENT 'Discount %',
  `bId` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_branches`
--

CREATE TABLE `school_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brancheId` bigint(20) UNSIGNED NOT NULL,
  `nameOfTheInstitution` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eiinNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazilla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameOfHead` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activeStatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_branches`
--

INSERT INTO `school_branches` (`id`, `brancheId`, `nameOfTheInstitution`, `eiinNumber`, `email`, `phoneNumber`, `district`, `upazilla`, `nameOfHead`, `schoolType`, `address`, `activeStatus`, `created_at`, `updated_at`) VALUES
(1, 1111, 'Sagardari M M institution', '12345678', 'mohammadshuvo208@gmail.com', '1234567890', 'Jeshore', 'MohammadPur', 'Jamshed Morol', 'Public School', '12345678', 1, '2019-10-20 00:10:07', '2019-10-20 00:10:07'),
(30, 2343, 'Foridpur Girl High School', '312456', NULL, '01632736808', 'Faridpur', 'Boalmari Upazila', 'Shubir Sir', 'Public Schools', 'Faridpur', 1, '2019-11-23 05:57:22', '2019-11-23 06:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL COMMENT 'bId',
  `classId` int(10) UNSIGNED NOT NULL COMMENT 'classId',
  `sessionYearId` int(10) UNSIGNED NOT NULL COMMENT 'sessionYearId',
  `sectionName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Morning, Day, Evening',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `bId`, `classId`, `sessionYearId`, `sectionName`, `shift`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 0, 14, 20, 'Section A', 'Morning', NULL, '2019-11-17 07:27:26', '2019-11-17 07:27:26'),
(20, 0, 13, 20, 'Section B', 'Morning', NULL, '2019-11-17 07:27:45', '2019-11-17 07:27:45'),
(21, 0, 13, 20, 'Section A', 'Morning', NULL, '2019-11-18 09:02:34', '2019-11-18 09:02:34'),
(25, 30, 15, 22, 'Section A', 'Morning', NULL, '2019-11-24 07:37:11', '2019-11-25 09:52:04'),
(26, 30, 15, 22, 'Section B', 'Morning', NULL, '2019-11-25 08:36:31', '2019-11-25 08:36:31'),
(28, 30, 16, 22, 'Section A', 'Morning', NULL, '2019-12-09 08:21:41', '2019-12-09 08:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `session_years`
--

CREATE TABLE `session_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sessionYear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=previous, 1=current',
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_years`
--

INSERT INTO `session_years` (`id`, `sessionYear`, `status`, `bId`, `created_at`, `updated_at`) VALUES
(20, '2019-2020', 0, 0, '2019-11-17 07:14:48', '2019-11-17 07:14:48'),
(21, '2020-2021', 0, 0, '2019-11-17 07:15:04', '2019-11-17 07:15:04'),
(22, '2019-2020', 1, 30, '2019-11-24 07:35:19', '2019-11-25 12:16:44'),
(23, '2020-2021', 0, 30, '2019-11-25 12:17:01', '2019-11-25 12:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `studentoptionalsubjects`
--

CREATE TABLE `studentoptionalsubjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `subjectId` bigint(20) UNSIGNED NOT NULL,
  `optional` tinyint(1) NOT NULL COMMENT '0 = optional, 1 = subjective',
  `bId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `blood` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `readablePassword` int(11) DEFAULT NULL,
  `fatherName` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherName` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherOccupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MotherOccupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherIncome` int(11) DEFAULT NULL,
  `motherIncome` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bId` bigint(20) UNSIGNED NOT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolarshipId` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'default 0',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'regular, irregular',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentId`, `firstName`, `lastName`, `email`, `email_verified_at`, `mobile`, `birthDate`, `blood`, `address`, `password`, `readablePassword`, `fatherName`, `motherName`, `fatherOccupation`, `MotherOccupation`, `fatherIncome`, `motherIncome`, `age`, `roll`, `gender`, `religion`, `bId`, `sectionId`, `group`, `schoolarshipId`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1396692668, 'Talia', 'Stoltenberg', 'elarkin@example.net', '2019-12-24 08:30:07', '+1691381026071', '1970-01-01', 'AB+', '261 Walker Freeway\nSouth Muhammad, AZ 87399-1808', '$2y$10$Y7fOWXNQ4iLlHhE9Dr6OpOsm3C8AepxzlLtQQ/pExXhMDcQmaxtIi', 12345678, 'Brett Zboncak', 'Mr. Jerome Beier III', 'BVqFp', '7O7W7', 64974, 64589, 17, 302376961, 'Male', 'Islam', 30, 25, 'Arts', 0, 'regular', 'xkUpJOQkdc', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(2, 2113287062, 'Jakayla', 'Blick', 'judd.mcglynn@example.com', '2019-12-24 08:30:07', '+9683434227013', '1970-01-01', 'A-', '3820 Swaniawski Drive\nEast Kris, LA 11571', '$2y$10$COwiHzsVsE60JLI2BOxjXezH3YoKNjRgS5wDpkJcM.rtZTIShCu.C', 12345678, 'Mrs. Crystel Kshlerin', 'Etha Rippin PhD', 'z0c1U', 'mq92f', 24656, 96550, 14, 1771284654, 'Female', 'Hinduism', 30, 25, 'Commerce', 0, 'regular', 'ckk1ROhmYG', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(3, 71888388, 'Darlene', 'Rau', 'anikolaus@example.org', '2019-12-24 08:30:07', '+5972129381861', '1970-01-01', 'B+', '263 Jenifer Turnpike Suite 075\nLowemouth, ID 23671-2735', '$2y$10$elg72O3SYL8szcBKCu9xjODn1maibYSxD9WY64tqM//G2gBqIo.Ii', 12345678, 'Kevon Smitham IV', 'Chris Windler', 'eiARW', '90BEY', 17345, 12971, 5, 164399793, 'Male', 'Atheism', 30, 25, 'Commerce', 0, 'regular', 'uwmNChA32W', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(4, 1481081208, 'Matilde', 'Moore', 'mollie78@example.com', '2019-12-24 08:30:07', '+3895884494138', '1970-01-01', 'O+', '85768 Cierra Pines Apt. 467\nNorth Clairehaven, RI 19532-8134', '$2y$10$HR1vSkpuGxmbPpezrMssD.cFFcFuNRldTKQM8jDNNvVWbMLAiZTbm', 12345678, 'Mr. Floy Considine DVM', 'Urban Kessler', 'rJscy', 'yv2Ds', 57678, 81355, 16, 1144352187, 'Female', 'Hinduism', 30, 25, 'Science', 0, 'regular', 'ZdpNLL6s1L', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(5, 1765655786, 'Concepcion', 'McKenzie', 'cstrosin@example.com', '2019-12-24 08:30:07', '+6239010440984', '1970-01-01', 'B-', '9672 Margarette Hills Apt. 212\nWuckertville, WA 60687', '$2y$10$PE7nXJKlWJqma21HKC5Wce5lSUGflGpGmhspMlEC0u1GnHhO28h8C', 12345678, 'Elmer Lynch', 'Daniela Collins', 'p6ot4', 'Ygf4R', 58679, 505, 11, 668737544, 'Female', 'Buddhism', 30, 25, 'Science', 0, 'regular', 'FWJv1xEKrK', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(6, 548682359, 'Akeem', 'Berge', 'bradly.borer@example.org', '2019-12-24 08:30:07', '+7135612497972', '1970-01-01', 'A+', '783 Rosenbaum Circle Suite 102\nPort Hildegard, NV 01150-8368', '$2y$10$KbenVOE2G4zUwsfFoYnww.kPPL6UUJFzJuy3szp4oHruiTWkLz4Ve', 12345678, 'Mr. Eino Senger IV', 'Kay Durgan', 'h4wWv', 'NwGit', 57096, 60186, 13, 496117910, 'Female', 'Buddhism', 30, 25, 'Commerce', 0, 'regular', 'Kl663d97Ut', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(7, 1384159998, 'Isobel', 'Ullrich', 'abshire.maverick@example.com', '2019-12-24 08:30:07', '+7260244084743', '1970-01-01', 'B+', '2710 Valentina Pike\nLittelfurt, MT 22830', '$2y$10$kVzZMfNoSMsfhJJlsve0Ue7kMpFUdnxlwVZTaTyggykotSMKrt2du', 12345678, 'Dr. Pinkie Rippin', 'Odie Daniel', '934kN', '6ci1t', 20610, 22764, 12, 2038934620, 'Male', 'Hinduism', 30, 25, 'General', 0, 'regular', 'Iw0asAdWiX', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(8, 2023552546, 'Pinkie', 'Fritsch', 'vframi@example.com', '2019-12-24 08:30:07', '+1344703174053', '1970-01-01', 'O+', '627 Bulah Fork\nMitchelstad, LA 36854-6865', '$2y$10$OYg6Cx3uZT87YQQPDuPygecMZAfubBVzzDW4U1rsY2gdbCVJxLzla', 12345678, 'Stephany Rodriguez', 'Brigitte McLaughlin', 'Ef79I', 'k5lyX', 82872, 68335, 13, 845232954, 'Female', 'Christianity', 30, 25, 'Commerce', 0, 'regular', 'DofHjJegNh', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(9, 2076013100, 'Elliot', 'Kautzer', 'sarai81@example.org', '2019-12-24 08:30:07', '+9657916219342', '1970-01-01', 'AB-', '32770 Hettinger Mission Suite 287\nPort Julian, MT 28348-4010', '$2y$10$JHgS9PM8OhGOYft7IruE0O.fxVJkuw/COpr7kb8T9Gtc7Jz8AU7m2', 12345678, 'Wilton Schuppe', 'Jayda Schumm', 'Yl4BV', '2n8mc', 81461, 19531, 13, 1842473148, 'Male', 'Hinduism', 30, 25, 'Commerce', 0, 'regular', 'HEkiQqgmvp', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(10, 1003716748, 'Noemi', 'Pollich', 'magdalena92@example.net', '2019-12-24 08:30:07', '+1589815562853', '1970-01-01', 'A+', '42119 Cassin Extension Suite 471\nSchultzview, CO 65985-3419', '$2y$10$E8Q4hP0QhuVsqpYWceU.RuqetFtWiWXyxSfkvwIiEEsHXUG0M4kBu', 12345678, 'Mr. Garth Breitenberg II', 'Branson Hartmann', 'ZbqIX', 'YLmtL', 57801, 94885, 3, 1130730916, 'Female', 'Christianity', 30, 25, 'Science', 0, 'regular', 'SQvRUAyRLP', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(11, 1672134542, 'Connor', 'Langosh', 'alison10@example.net', '2019-12-24 08:30:07', '+7796631410263', '1970-01-01', 'B+', '784 Douglas Vista Suite 085\nCharleyberg, CA 12851', '$2y$10$5Tc7cDId8ItXNA7AxqzEp.rAoXAoXfJ7Tpj7tn1ViqMPqjfwbLoHq', 12345678, 'Dr. Doyle Muller MD', 'Reinhold Predovic IV', 'lhhHz', 'sirge', 345, 84540, 15, 1375860303, 'Male', 'Islam', 30, 25, 'General', 0, 'regular', 'E8mukZVfH6', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(12, 1665813784, 'Teagan', 'Terry', 'jeanette00@example.net', '2019-12-24 08:30:07', '+3163419731470', '1970-01-01', 'AB+', '38347 Liam Hill\nMargaritaburgh, NM 35807-2936', '$2y$10$5VzlUXGsxTIGXnZXAEqrSu9NVY2bzWecGZQ/In.x7lX097P6iZB4a', 12345678, 'Hershel Tillman', 'Alfred Runolfsdottir', 'aRZXN', 'Q17I0', 46746, 91544, 12, 1834153196, 'Female', 'Buddhism', 30, 25, 'Commerce', 0, 'regular', 'ZGMHtpe7Za', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(13, 2091720084, 'Freeda', 'Price', 'wilber20@example.net', '2019-12-24 08:30:07', '+5513493155067', '1970-01-01', 'AB+', '68399 Kling Ways Apt. 356\nLake Evelynton, TX 81156', '$2y$10$e2viin6Yv4Iy06rcZgr1/uB8hetnBrIebTlsgSzu.UVQNuSuA6BH6', 12345678, 'Albin Shields II', 'Prof. Hunter Hamill PhD', 'CCft3', 'yfi5l', 80321, 88417, 12, 1283853088, 'Female', 'Atheism', 30, 25, 'Commerce', 0, 'regular', 'HNNhgU5IdI', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(14, 1107829934, 'Brett', 'Powlowski', 'wiegand.madelynn@example.org', '2019-12-24 08:30:07', '+1940524541952', '1970-01-01', 'O+', '8116 Wolf Isle Suite 524\nNorth Elroy, KY 70803-1847', '$2y$10$qPkpSZWRwCGEr.dfkAxcCuHhy/bgXjMBL2E2HMT/q7RoZaWKZcMLC', 12345678, 'Reynold Wuckert', 'Theo Christiansen', 'Gri8N', '8872I', 88098, 10530, 10, 1153070846, 'Male', 'Hinduism', 30, 25, 'Arts', 0, 'regular', '2SZw5Ro1bC', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(15, 941323997, 'Vida', 'Hahn', 'nhartmann@example.org', '2019-12-24 08:30:07', '+8891560386677', '1970-01-01', 'A-', '2678 Vandervort Orchard\nOrtizfurt, CO 80584', '$2y$10$20jk0KSNYFRp1AshXUtXveqJG2DV3zfSioUqnmAD3VS9Yzwc.LOK6', 12345678, 'Treva Howe', 'Letitia Balistreri', 'abdKx', 'XDJ1q', 47099, 68095, 13, 1055981973, 'Male', 'Islam', 30, 25, 'Arts', 0, 'regular', 'QcqlEi8NpM', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(16, 1868083749, 'Gracie', 'White', 'anjali49@example.com', '2019-12-24 08:30:07', '+6304554059026', '1970-01-01', 'A-', '1145 Fahey Wall\nEast Inesshire, DC 32289-3011', '$2y$10$U.lhGKjugKJgMwDXxuaUzeTUrJ3oEype2nVW0CQDZxiwDiPfB9fAm', 12345678, 'Chester Simonis DDS', 'Jewel Thompson', 'rdec5', '9G994', 34921, 46911, 5, 1037587196, 'Female', 'Atheism', 30, 25, 'Commerce', 0, 'regular', 'YsEEl2Ysx2', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(17, 1240760875, 'Kenneth', 'Harber', 'hane.oran@example.net', '2019-12-24 08:30:07', '+6199069398731', '1970-01-01', 'A-', '54593 Franco Forge\nLake Kelleyhaven, AZ 14372-7658', '$2y$10$NA8m8MFtUhrHKaysd0j3Leb54ZsOGEh9JzDu0NehcZkwV4Kx5wc/m', 12345678, 'Ernestina Purdy I', 'Prof. Jillian Schneider II', 'EUpKd', '3xTEe', 87548, 86226, 15, 356675256, 'Male', 'Islam', 30, 25, 'Commerce', 0, 'regular', 'z3tBO2GFDD', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(18, 887510807, 'Jaylon', 'O\'Kon', 'hoppe.kelley@example.net', '2019-12-24 08:30:08', '+3653699348344', '1970-01-01', 'B+', '5026 Stehr Forge\nTremblaytown, MT 31235-3413', '$2y$10$BSNVXVSN9PLXcs.auJKT4uRkVBfBSBMxscgCHE0wchVzYfxhTZAUm', 12345678, 'Micheal Parisian', 'Scotty Hahn', 'ZAUsl', '5yQlZ', 45258, 96967, 15, 790039752, 'Male', 'Atheism', 30, 25, 'Arts', 0, 'regular', 'B17ZZxbBPM', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(19, 1949155633, 'Americo', 'McClure', 'jeramy.goldner@example.org', '2019-12-24 08:30:08', '+5390433990032', '1970-01-01', 'O-', '8143 Hansen Field\nKoeppview, CA 72220-5907', '$2y$10$EUyeiAwcPuKnXF.WMtXq3.yPGR1dnyK6akK4Q5m3hbnFxz/zFp6yK', 12345678, 'Myriam Halvorson', 'Dr. Timmy Anderson', 'i1vak', 'zy1NL', 75564, 88559, 17, 1488328105, 'Male', 'Atheism', 30, 25, 'Commerce', 0, 'regular', 'dJJOwcGnwX', '2019-12-24 08:30:08', '2019-12-24 08:30:08'),
(20, 1166743860, 'Maribel', 'Schimmel', 'okon.alia@example.com', '2019-12-24 08:30:08', '+4685872709211', '1970-01-01', 'O-', '39417 Feil Plains\nSherwoodfurt, AZ 75643-4393', '$2y$10$XKawi0VZzo9FJoXDjGBFrO0Nc5CWuAjCs2NyQSYUL8yeE6IN/F1Zy', 12345678, 'Amos Schroeder', 'Parker Mraz', 'MXWBV', 'ecgey', 5140, 65933, 16, 1460339048, 'Male', 'Hinduism', 30, 25, 'General', 0, 'regular', 'NEZPhJcUXQ', '2019-12-24 08:30:08', '2019-12-24 08:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL COMMENT 'feeCollection_table',
  `novGovtAmount` double(8,2) NOT NULL COMMENT 'sum novGovt Amount From FeeCollection',
  `govtAmount` double(8,2) NOT NULL COMMENT 'sum Govt Amount From FeeCollection',
  `totalAmount` double(8,2) NOT NULL COMMENT 'sum Govt Amount From FeeCollection',
  `due` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `paidAmount` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_histories`
--

CREATE TABLE `student_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sId` bigint(20) UNSIGNED NOT NULL COMMENT 'student_table_id',
  `roll` int(11) DEFAULT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL COMMENT 'section_table_id',
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `group` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'groupname',
  `schoolarshipStatus` tinyint(1) NOT NULL COMMENT '0=no, 1 =yes',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'regular, irregular',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_scholarships`
--

CREATE TABLE `student_scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL COMMENT 'student_table_id',
  `scholershipType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'type',
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `discount` double(8,2) NOT NULL COMMENT 'Discount %',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_scholarships`
--

INSERT INTO `student_scholarships` (`id`, `studentId`, `scholershipType`, `feeId`, `discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'talentpull', 2, 50.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjectName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classId` int(10) UNSIGNED NOT NULL COMMENT 'classId',
  `group` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'General',
  `bId` int(10) UNSIGNED NOT NULL,
  `optionalstatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectName`, `subjectCode`, `classId`, `group`, `bId`, `optionalstatus`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', '101', 15, 'General', 30, 0, '2019-11-27 12:21:35', '2019-11-27 12:34:03'),
(2, 'English', '201', 15, 'General', 30, 0, '2019-11-27 12:24:06', '2019-11-30 10:59:29'),
(3, 'Biology', '136', 15, 'Science', 30, 1, '2019-11-27 12:34:36', '2019-11-27 12:34:36'),
(4, 'Bangla 2nd', '102', 15, 'General', 30, 0, '2019-11-30 10:58:34', '2019-11-30 10:58:34'),
(5, 'English 2nd', '202', 15, 'General', 30, 0, '2019-11-30 10:59:12', '2019-11-30 10:59:12'),
(33, 'Economics', '160', 18, 'General', 30, 0, '2019-12-04 10:52:11', '2019-12-04 10:52:11'),
(34, 'Higher Mathematics', '167', 18, 'Commerce', 19, 0, '2019-12-04 10:52:11', '2019-12-04 10:52:11'),
(35, 'ICT', '146', 22, 'Arts', 29, 1, '2019-12-04 10:52:11', '2019-12-04 10:52:11'),
(36, 'Physics', '147', 17, 'Arts', 26, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(37, 'Accounting', '131', 21, 'Commerce', 24, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(38, 'Business Initiative', '112', 18, 'Commerce', 0, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(39, 'English 1st Paper', '121', 14, 'Commerce', 23, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(40, 'Business Initiative', '142', 17, 'Commerce', 14, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(41, 'Accounting', '179', 15, 'Science', 25, 0, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(42, 'History of Bangladesh', '106', 24, 'Science', 11, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(43, 'Islam and moral Education', '197', 21, 'General', 22, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(44, 'Home Science\r\n        ', '103', 20, 'Arts', 23, 0, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(45, 'Bengali 2nd Paper', '108', 20, 'Commerce', 18, 1, '2019-12-04 10:53:55', '2019-12-04 10:53:55'),
(46, 'Bangla 1st', '101', 16, 'General', 30, 0, '2019-12-09 11:33:02', '2019-12-09 11:33:02'),
(47, 'Biology', '136', 16, 'Science', 30, 1, '2019-12-09 11:33:42', '2019-12-09 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joinDate` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educattion` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bId` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `readablePassword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `email`, `email_verified_at`, `mobile`, `designation`, `joinDate`, `address`, `skill`, `educattion`, `biography`, `resume`, `certificate`, `bId`, `password`, `readablePassword`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shuvo', 'mohammadshuvo205@gmail.com', NULL, '01750658791', 'Super Admin', '25-9-2019', 'khulna', NULL, NULL, NULL, NULL, NULL, 0, '$2y$12$OxRrHZc6x/eIqB5.uxS1R.PJzlQevj5bgnsj6/uSKncZYnLgxOnHm', '12345678', NULL, NULL, NULL),
(81, 2, 'Shubir Sir', NULL, NULL, '01632736808', 'School Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, '$2y$10$OdizTCtKpVMjEcy4sBKJCu4jCYTf94Gi26NtZOwiU1m/t6KR..mXu', '833696', NULL, '2019-11-23 06:09:32', '2019-12-18 07:55:05'),
(82, 3, 'Hassan Molla', 'hassan@gmail.com', NULL, '01981807374', 'Teacher', '24/11/2019', 'Address as it is !', NULL, NULL, NULL, NULL, NULL, 30, '$2y$10$QixJusf0bLTvUSCx4Gpp4OVs31i.zqORvcMf3MKEox.iTmOzM2T4C', '351475', NULL, '2019-11-24 02:08:33', '2019-11-24 02:08:33'),
(83, 4, 'rumana Khnom', 'rumana@gmail.com', NULL, '018917892939', 'Accountant', '24/11/2019', 'Address as it is!', NULL, NULL, NULL, NULL, NULL, 30, '$2y$10$bimKK4YmXTVH7.uTYO4R0.Mdxbh28qnfqlPmB1PMfBd2SsZKmn1Ie', '496667', NULL, '2019-11-24 02:10:05', '2019-11-24 02:10:05'),
(84, 5, 'Misuk', 'Misuk1@gmail.com', NULL, '0026969988', 'Teacher', '21/11/2019', 'mirpur', NULL, NULL, NULL, NULL, NULL, 30, '$2y$10$6Rljy5pPKpmayfMeUh20UOXDLU0zk7BXyzpOw8tvDfWDmQlTod/Qm', '854962', NULL, '2019-11-25 06:58:53', '2019-11-25 06:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_sectionid_foreign` (`sectionId`),
  ADD KEY `attendances_studentid_foreign` (`studentId`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_collections`
--
ALTER TABLE `fee_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_histories`
--
ALTER TABLE `fee_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_studentid_foreign` (`studentId`),
  ADD KEY `files_userid_foreign` (`userId`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `months`
--
ALTER TABLE `months`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_branches`
--
ALTER TABLE `school_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_branches_brancheid_unique` (`brancheId`),
  ADD UNIQUE KEY `school_branches_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `school_branches_email_unique` (`email`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_years`
--
ALTER TABLE `session_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentoptionalsubjects`
--
ALTER TABLE `studentoptionalsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_studentid_unique` (`studentId`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_mobile_unique` (`mobile`),
  ADD KEY `students_bid_foreign` (`bId`),
  ADD KEY `students_sectionid_foreign` (`sectionId`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_histories`
--
ALTER TABLE `student_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_scholarships`
--
ALTER TABLE `student_scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_userid_unique` (`userId`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=760;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_collections`
--
ALTER TABLE `fee_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `fee_histories`
--
ALTER TABLE `fee_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_branches`
--
ALTER TABLE `school_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `session_years`
--
ALTER TABLE `session_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `studentoptionalsubjects`
--
ALTER TABLE `studentoptionalsubjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_histories`
--
ALTER TABLE `student_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_scholarships`
--
ALTER TABLE `student_scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_sectionid_foreign` FOREIGN KEY (`sectionId`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_bid_foreign` FOREIGN KEY (`bId`) REFERENCES `school_branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_sectionid_foreign` FOREIGN KEY (`sectionId`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
