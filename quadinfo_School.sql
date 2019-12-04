-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 04:56 PM
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
(1, 1, 'present', 2, 1, 1, '2019-12-04 14:11:52', '2019-12-04 15:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `className` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` bigint(20) UNSIGNED NOT NULL,
  `bid` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `duration`, `seat`, `bid`, `created_at`, `updated_at`) VALUES
(1, 'Nine', '1 year', 100, 2, '2019-12-04 12:50:12', '2019-12-04 12:50:12'),
(2, 'Eight', '1 year', 100, 2, '2019-12-04 15:24:22', '2019-12-04 15:24:22');

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
(5, '2019_10_15_105407_create_permission_tables', 2),
(33, '2014_10_12_000000_create_users_table', 3),
(34, '2019_10_07_113658_create_classes_table', 3),
(35, '2019_10_20_102030_create_school_branches_table', 3),
(36, '2019_11_07_073023_create_sections_table', 3),
(38, '2019_11_13_074359_create_students_table', 3),
(39, '2019_11_13_100753_create_subjects_table', 3),
(40, '2019_11_18_083036_create_attendances_table', 3),
(41, '2019_11_30_195808_create_marks_table', 3),
(42, '2019_12_03_153030_create_class_teachers_table', 3),
(43, '2019_12_03_193222_create_studentoptionalsubjects_table', 3),
(44, '2019_11_07_084707_create_session_years_table', 4);

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
(12, 'App\\User', 2),
(13, 'App\\User', 3),
(13, 'App\\User', 5),
(13, 'App\\User', 6),
(14, 'App\\User', 7);

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
(105, 'Subject', 'web', 0, '2019-11-16 04:46:31', '2019-11-16 04:46:31'),
(106, 'Class Teacher', 'web', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=superAdmin,schoolAdmin, 0>other',
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `bId`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'web', 1, 0, '2019-10-22 07:49:53', '2019-10-22 07:49:53'),
(12, 'School Admin', 'web', 0, 0, NULL, NULL),
(13, 'Teacher', 'web', 0, 2, '2019-12-04 12:38:34', '2019-12-04 12:38:34'),
(14, 'Admission Officer', 'web', 0, 2, '2019-12-04 14:57:30', '2019-12-04 14:57:30');

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
(83, 12),
(83, 13),
(83, 14),
(85, 3),
(85, 12),
(85, 13),
(90, 3),
(90, 12),
(90, 13),
(95, 3),
(95, 12),
(95, 13),
(96, 3),
(101, 3),
(101, 12),
(101, 13),
(102, 3),
(102, 12),
(102, 13),
(103, 3),
(103, 12),
(103, 13),
(105, 3),
(105, 12),
(105, 13);

-- --------------------------------------------------------

--
-- Table structure for table `school_branches`
--

CREATE TABLE `school_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branchId` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `school_branches` (`id`, `branchId`, `nameOfTheInstitution`, `eiinNumber`, `email`, `phoneNumber`, `district`, `upazilla`, `nameOfHead`, `schoolType`, `address`, `activeStatus`, `created_at`, `updated_at`) VALUES
(2, 255047, 'FARIDPUR GOVT. GIRLS\' HIGH SCHOOL', '108745', NULL, '01756641964', 'Faridpur', 'Boalmari Upazila', 'Devotee Subir', 'Public Schools', 'Uttor kalibari-1, mujib sarak,faridpur Faridpur Sadar', 1, '2019-12-04 12:27:53', '2019-12-04 12:28:21');

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
  `shift` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'morning, day, evening',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `bId`, `classId`, `sessionYearId`, `sectionName`, `shift`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'Section A', 'Morning', NULL, '2019-12-04 12:50:43', '2019-12-04 12:50:43'),
(2, 2, 2, 1, 'Section A', 'Morning', NULL, '2019-12-04 15:24:38', '2019-12-04 15:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `session_years`
--

CREATE TABLE `session_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sessionYear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `bId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_years`
--

INSERT INTO `session_years` (`id`, `sessionYear`, `status`, `bId`, `created_at`, `updated_at`) VALUES
(1, '2020', 1, 2, '2019-12-04 14:09:43', '2019-12-04 14:10:14');

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

--
-- Dumping data for table `studentoptionalsubjects`
--

INSERT INTO `studentoptionalsubjects` (`id`, `studentId`, `subjectId`, `optional`, `bId`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 0, 2, '2019-12-04 13:56:25', '2019-12-04 13:56:25'),
(2, 1, 8, 1, 2, '2019-12-04 13:56:25', '2019-12-04 13:56:25');

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
  `bId` bigint(20) UNSIGNED NOT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `readablePassword` int(11) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `blood` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `fatherName` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherName` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherOccupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MotherOccupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherIncome` int(11) DEFAULT NULL,
  `motherIncome` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentId`, `firstName`, `lastName`, `email`, `email_verified_at`, `mobile`, `bId`, `sectionId`, `group`, `readablePassword`, `birthDate`, `blood`, `address`, `roll`, `fatherName`, `motherName`, `fatherOccupation`, `MotherOccupation`, `fatherIncome`, `motherIncome`, `age`, `gender`, `religion`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 985074, 'Salma', 'Akhter', NULL, NULL, '0190458756', 2, 1, 'Science', 928751, '2000-06-13', '0+', 'Faridpur', 1, 'Md Kamal', NULL, 'Farmer', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$uagyR7kHcM26T2gdoGckqewAaW6Hl1L0yWqT1CJZuD7LPK9TaaKrm', NULL, '2019-12-04 13:56:25', '2019-12-04 14:15:54');

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
  `optionalstatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=true, 0= false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectName`, `subjectCode`, `classId`, `group`, `bId`, `optionalstatus`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture', '110', 1, 'Arts', 2, 1, '2019-12-04 13:32:19', '2019-12-04 13:52:29'),
(2, 'Islam and moral Education', '149', 1, 'General', 2, 0, '2019-12-04 13:32:19', '2019-12-04 13:34:15'),
(3, 'Bangladesh and Global Studies', '190', 1, 'Science', 2, 0, '2019-12-04 13:32:20', '2019-12-04 13:43:05'),
(4, 'ICT', '108', 1, 'General', 2, 0, '2019-12-04 13:32:20', '2019-12-04 13:32:20'),
(5, 'Physics', '178', 1, 'Science', 2, 0, '2019-12-04 13:32:20', '2019-12-04 13:32:59'),
(6, 'Accounting', '183', 1, 'Commerce', 2, 0, '2019-12-04 13:32:20', '2019-12-04 13:33:51'),
(7, 'Biology', '155', 1, 'Science', 2, 1, '2019-12-04 13:32:20', '2019-12-04 13:33:47'),
(8, 'Higher Mathematics', '188', 1, 'Science', 2, 1, '2019-12-04 13:32:20', '2019-12-04 13:33:38'),
(9, 'Finance and Banking', '157', 1, 'Commerce', 2, 0, '2019-12-04 13:32:20', '2019-12-04 13:33:32'),
(10, 'Home Science(Arts)', '193', 1, 'Arts', 2, 1, '2019-12-04 13:32:20', '2019-12-04 13:46:09'),
(11, 'Chemistry', '130', 1, 'Science', 2, 0, '2019-12-04 13:35:20', '2019-12-04 13:35:20'),
(12, 'General Math', '121', 1, 'General', 2, 0, '2019-12-04 13:35:38', '2019-12-04 13:35:38'),
(13, 'Bangla 1st Paper', '101', 1, 'General', 2, 0, '2019-12-04 13:36:28', '2019-12-04 13:36:28'),
(14, 'Bangla 2nd Paper', '102', 1, 'General', 2, 0, '2019-12-04 13:36:44', '2019-12-04 13:36:44'),
(15, 'English1st Paper', '201', 1, 'General', 2, 0, '2019-12-04 13:37:02', '2019-12-04 13:37:02'),
(16, 'English 2nd Paper', '202', 1, 'General', 2, 0, '2019-12-04 13:37:18', '2019-12-04 13:37:18'),
(17, 'Geography', '115', 1, 'Arts', 2, 0, '2019-12-04 13:38:04', '2019-12-04 13:38:16'),
(18, 'History Of Bangladesh And World Civilizatoin', '117', 1, 'Arts', 2, 0, '2019-12-04 13:38:32', '2019-12-04 13:46:56'),
(19, 'Career Education', '103', 1, 'General', 2, 0, '2019-12-04 13:42:18', '2019-12-04 13:42:18'),
(20, 'Business Entrepreneurship', '130', 1, 'Commerce', 2, 1, '2019-12-04 13:44:16', '2019-12-04 13:44:16'),
(21, 'General Science(Commerce)', '132', 1, 'Commerce', 2, 0, '2019-12-04 13:45:34', '2019-12-04 13:45:34'),
(22, 'Civics And Citizenship', '139', 1, 'Arts', 2, 0, '2019-12-04 13:47:29', '2019-12-04 13:47:29'),
(23, 'Economics', '103', 1, 'Commerce', 2, 1, '2019-12-04 13:53:46', '2019-12-04 13:55:01'),
(24, 'Bangla 1st Papre', '102', 2, 'General', 2, 0, '2019-12-04 15:25:02', '2019-12-04 15:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readablePassword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joinDate` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educattion` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bId` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `email`, `mobile`, `readablePassword`, `email_verified_at`, `designation`, `joinDate`, `address`, `skill`, `educattion`, `biography`, `resume`, `certificate`, `bId`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 123456, 'Md Shuvo', 'mohammadshuvo205@gmail.com', '01904470171', NULL, NULL, 'Super Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$SGbs.JE10gkqw1WlLYhZLeZzNdjQ7okri7ilh86egGrwYskNGJ5dS', NULL, NULL, NULL),
(2, NULL, 'Devotee Subir', 'Dev@gmail.com', '01756641964', '370467', NULL, 'School Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$9oEzl/shvAC/Rso3FEcg/e65a7qmohtqthOdga3WPsWHfwcjGtkPa', NULL, '2019-12-04 12:28:21', '2019-12-04 12:37:26'),
(6, NULL, 'misuk', 'Jahid34@gmail.com', '01681805060', '523257', NULL, 'Teacher', '11/12/2019', 'dhaka', NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$9XgZnQXt/p7z13xAEdHkR.5QipUdEA/2IpPI8fkz7Q5CLZhGaFzAS', NULL, '2019-12-04 12:48:35', '2019-12-04 12:48:35'),
(7, NULL, 'Mst Jahanara', 'Jahanara@gmail.com', '01904710171', '126417', NULL, 'Employee', '04/12/2019', 'Faridpur', NULL, NULL, NULL, NULL, NULL, 2, '$2y$10$VJ9JvWGvU1Iyt41AsQE5SeuJaTb3PO.5Q6W.yJsK9qtdcbv2oLqPC', NULL, '2019-12-04 14:58:53', '2019-12-04 14:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_sectionid_foreign` (`sectionId`),
  ADD KEY `attendances_studentid_foreign` (`studentId`),
  ADD KEY `attendances_classid_foreign` (`classId`);

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
-- Indexes for table `school_branches`
--
ALTER TABLE `school_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_branches_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `school_branches_brancheid_unique` (`branchId`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school_branches`
--
ALTER TABLE `school_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_years`
--
ALTER TABLE `session_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentoptionalsubjects`
--
ALTER TABLE `studentoptionalsubjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_classid_foreign` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_sectionid_foreign` FOREIGN KEY (`sectionId`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE;

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
