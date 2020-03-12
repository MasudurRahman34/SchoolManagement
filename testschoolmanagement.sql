-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 03:57 PM
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `studentId`, `attendence`, `bId`, `sectionId`, `classId`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'present', 1, 1, 6, NULL, '2020-01-28 11:49:07', '2020-01-28 11:49:07'),
(2, 2, 'present', 1, 1, 6, NULL, '2020-01-28 11:49:07', '2020-01-28 11:49:07'),
(3, 4, 'present', 1, 1, 6, NULL, '2020-01-28 11:49:07', '2020-01-28 11:49:07'),
(5, 1, 'present', 1, 1, 6, NULL, '2020-01-26 18:00:00', '2020-01-28 11:52:40'),
(6, 2, 'present', 1, 1, 6, NULL, '2020-01-26 18:00:00', '2020-01-28 11:52:40'),
(7, 4, 'present', 1, 1, 6, NULL, '2020-01-26 18:00:00', '2020-01-28 11:52:40'),
(9, 1, 'present', 1, 1, 6, NULL, '2020-02-02 10:43:46', '2020-02-02 10:43:46'),
(10, 2, 'present', 1, 1, 6, NULL, '2020-02-02 10:43:46', '2020-02-02 10:43:46'),
(11, 4, 'present', 1, 1, 6, NULL, '2020-02-02 10:43:46', '2020-02-02 10:43:46');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `duration`, `seat`, `bid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'One', '1 year', 50, 1, '2020-01-26 12:32:55', '2020-01-26 12:32:55', NULL),
(2, 'Two', '1 year', 50, 1, '2020-01-26 12:33:03', '2020-01-26 12:33:03', NULL),
(3, 'Three', '1 year', 50, 1, '2020-01-26 12:33:16', '2020-01-26 12:33:16', NULL),
(4, 'Four', '1 year', 50, 1, '2020-01-26 12:33:25', '2020-01-26 12:33:25', NULL),
(5, 'Five', '1 year', 50, 1, '2020-01-26 12:33:32', '2020-01-26 12:33:32', NULL),
(6, 'Nine', '1 year', 150, 1, '2020-01-26 12:33:47', '2020-01-26 12:33:47', NULL),
(7, 'Ten', '1 year', 150, 1, '2020-01-26 12:33:56', '2020-01-26 12:33:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL COMMENT 'user table',
  `classId` int(10) UNSIGNED NOT NULL COMMENT 'class table',
  `sectionId` int(10) UNSIGNED NOT NULL COMMENT 'Section table',
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sessionYearId` int(10) UNSIGNED NOT NULL COMMENT 'sessionYear table',
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `userId`, `classId`, `sectionId`, `shift`, `sessionYearId`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 83, 6, 1, 'Morning', 1, 1, '2020-02-02 09:59:29', '2020-02-02 09:59:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd'),
(5, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 0, 0, 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd'),
(13, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd'),
(16, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd'),
(18, 5, 'Bogra', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd'),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd'),
(35, 1, 'Barisal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd'),
(43, 2, 'Chittagong', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd'),
(44, 2, 'Comilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd'),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd'),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd'),
(57, 4, 'Jessore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `due_fee_histories`
--

CREATE TABLE `due_fee_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feeCollectionId` bigint(20) UNSIGNED NOT NULL COMMENT 'feeCection_table_id',
  `due` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'due',
  `PreviousPaidAmount` double(8,2) NOT NULL COMMENT 'feeCollection_table TotalAMount',
  `paidAmount` double(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Fee Collection InputAmount',
  `paidMonth` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1',
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `examName`, `examCode`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'First Term Exam', 'E2020001', 1, '2020-03-12 14:47:25', '2020-03-12 14:47:25', NULL);

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
  `interval` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'monthly,Yearly',
  `sessionYearId` bigint(20) UNSIGNED NOT NULL COMMENT 'sessionYear_table Id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type`, `name`, `amount`, `bId`, `classId`, `status`, `interval`, `sessionYearId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gov', 'Sport', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:21:14', '2020-01-28 07:21:14', NULL),
(2, 'gov', 'Cultural', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:22:07', '2020-01-28 07:24:10', NULL),
(3, 'gov', 'Common Room', 300.00, 1, 1, 1, 'yearly', 1, '2020-01-28 07:22:31', '2020-01-28 07:22:31', NULL),
(4, 'gov', 'Magazine', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:22:51', '2020-01-28 07:22:51', NULL),
(5, 'gov', 'Development', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:23:39', '2020-01-28 07:23:39', NULL),
(6, 'gov', 'Red-Crescent', 300.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:24:32', '2020-01-28 07:24:32', NULL),
(7, 'gov', 'Computer', 300.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:24:53', '2020-01-28 07:24:53', NULL),
(8, 'gov', 'other', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:25:10', '2020-01-28 07:25:10', NULL),
(9, 'gov', 'printing', 200.00, 1, 1, 1, 'yearly', 1, '2020-01-28 07:25:25', '2020-01-28 07:25:25', NULL),
(10, 'gov', '1st Term Exam', 200.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:25:46', '2020-01-28 07:25:46', NULL),
(11, 'gov', 'Tiffin', 300.00, 1, 6, 1, 'monthly', 1, '2020-01-28 07:26:07', '2020-01-28 07:27:52', NULL),
(12, 'gov', 'Tuition', 300.00, 1, 6, 1, 'monthly', 1, '2020-01-28 07:26:28', '2020-01-28 07:28:01', NULL),
(13, 'gov', '2nd Term Exam', 300.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:26:48', '2020-01-28 07:26:48', NULL),
(14, 'gov', 'Final Exam', 400.00, 1, 6, 1, 'yearly', 1, '2020-01-28 07:27:42', '2020-01-28 07:27:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_collections`
--

CREATE TABLE `fee_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL COMMENT 'student_table_id',
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `amount` double(8,2) NOT NULL COMMENT 'amount',
  `due` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'due',
  `totalAmount` double(8,2) NOT NULL COMMENT 'total Amount',
  `transactionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'for payment information',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'transaction type',
  `accountNumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1',
  `paidMonth` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1',
  `month` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1',
  `sessionYearId` bigint(20) UNSIGNED NOT NULL COMMENT 'sessionYear_table Id',
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_collections`
--

INSERT INTO `fee_collections` (`id`, `studentId`, `feeId`, `amount`, `due`, `totalAmount`, `transactionId`, `type`, `accountNumber`, `paidMonth`, `month`, `sessionYearId`, `sectionId`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(2, 2, 2, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(3, 2, 4, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(4, 2, 5, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(5, 2, 6, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(6, 2, 7, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(7, 2, 8, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(8, 2, 10, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(9, 2, 11, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(10, 2, 12, 300.00, 0.00, 0.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(11, 2, 13, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(12, 2, 14, 400.00, 0.00, 400.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:32:51', '2020-01-28 07:32:51', NULL),
(13, 4, 1, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(14, 4, 2, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(15, 4, 4, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(16, 4, 5, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(17, 4, 6, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(18, 4, 7, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(19, 4, 8, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(20, 4, 10, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(21, 4, 11, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(22, 4, 12, 300.00, 0.00, 150.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(23, 4, 13, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(24, 4, 14, 400.00, 0.00, 400.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(25, 5, 1, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(26, 5, 2, 200.00, 0.00, 0.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(27, 5, 4, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(28, 5, 5, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(29, 5, 6, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(30, 5, 7, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(31, 5, 8, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(32, 5, 10, 200.00, 0.00, 200.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(33, 5, 11, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(34, 5, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(35, 5, 13, 300.00, 0.00, 300.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(36, 5, 14, 400.00, 0.00, 400.00, '0', '0', '0', 'JANUARY', 'JANUARY', 1, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(37, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'JANUARY', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(38, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(39, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'MARCH', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(40, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'APRIL', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(41, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'MAY', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(42, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'JUNE', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(43, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'JULY', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(44, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'AUGUST', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(45, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'SEPTEMBER', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(46, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'OCTOBER', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(47, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'NOVEMBER', 1, 1, 1, '2020-02-02 11:04:31', '2020-02-02 11:04:31', NULL),
(48, 1, 12, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'DECEMBER', 1, 1, 1, '2020-02-02 11:04:32', '2020-02-02 11:04:32', NULL),
(49, 6, 1, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(50, 6, 2, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(51, 6, 4, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(52, 6, 5, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(53, 6, 6, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(54, 6, 7, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(55, 6, 8, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(56, 6, 10, 200.00, 0.00, 200.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(57, 6, 11, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(58, 6, 12, 300.00, 0.00, 270.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(59, 6, 13, 300.00, 0.00, 300.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL),
(60, 6, 14, 400.00, 0.00, 400.00, '0', '0', '0', 'FEBRUARY', 'FEBRUARY', 1, 1, 1, '2020-02-02 11:08:28', '2020-02-02 11:08:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_histories`
--

CREATE TABLE `fee_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `amount` double(8,2) NOT NULL COMMENT 'amount',
  `sessionYearId` bigint(20) UNSIGNED NOT NULL COMMENT 'sessionYear_table Id',
  `bId` bigint(20) UNSIGNED NOT NULL COMMENT 'branch_table_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gradeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minValue` int(11) NOT NULL,
  `maxValue` int(11) NOT NULL,
  `gradePoint` double(8,2) NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `subjectId` bigint(20) UNSIGNED NOT NULL,
  `ca` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mcq` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `written` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `practical` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradePoint` double(8,2) NOT NULL,
  `examType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examAttendence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bId` int(10) UNSIGNED NOT NULL,
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `classId` bigint(20) UNSIGNED NOT NULL,
  `sessionYearId` int(10) UNSIGNED NOT NULL COMMENT 'sessionYearId',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `studentId`, `subjectId`, `ca`, `mcq`, `written`, `practical`, `total`, `gradeName`, `gradePoint`, `examType`, `examAttendence`, `bId`, `sectionId`, `classId`, `sessionYearId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 8, '0', '0', '0', '0', '0', 'F', 0.00, '1', 'present', 1, 1, 6, 1, '2020-03-12 14:55:05', '2020-03-12 14:55:05', NULL),
(2, 2, 8, '0', '0', '0', '0', '0', 'F', 0.00, '1', 'present', 1, 1, 6, 1, '2020-03-12 14:55:05', '2020-03-12 14:55:05', NULL),
(3, 4, 8, '0', '0', '0', '0', '0', 'F', 0.00, '1', 'absent', 1, 1, 6, 1, '2020-03-12 14:55:05', '2020-03-12 14:55:05', NULL),
(4, 6, 8, '0', '0', '0', '0', '0', 'F', 0.00, '1', 'present', 1, 1, 6, 1, '2020-03-12 14:55:05', '2020-03-12 14:55:05', NULL);

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
(3, '2019_10_07_113658_create_classes_table', 1),
(5, '2019_10_20_102030_create_school_branches_table', 1),
(6, '2019_11_07_073023_create_sections_table', 1),
(7, '2019_11_07_084707_create_session_years_table', 1),
(8, '2019_11_13_074359_create_students_table', 1),
(9, '2019_11_13_100753_create_subjects_table', 1),
(10, '2019_11_18_083036_create_attendances_table', 1),
(12, '2019_12_03_153030_create_class_teachers_table', 1),
(13, '2019_12_03_193222_create_studentoptionalsubjects_table', 1),
(14, '2019_12_09_153641_create_files_table', 1),
(15, '2019_12_10_140443_create_student_histories_table', 1),
(16, '2019_12_12_123434_create_fees_table', 1),
(17, '2019_12_12_123501_create_fee_collections_table', 1),
(18, '2019_12_12_165138_create_student_fees_table', 1),
(19, '2019_12_12_171013_create_fee_histories_table', 1),
(20, '2019_12_21_144745_create_student_scholarships_table', 1),
(21, '2019_12_21_185057_create_months_table', 1),
(22, '2019_12_24_140217_create_scholarships_table', 1),
(23, '2019_12_30_135600_create_due_fee_histories_table', 1),
(24, '2020_01_01_142254_create_role_change_requests_table', 1),
(25, '2019_10_15_105407_create_permission_tables', 2),
(26, '2020_02_03_132208_create_districts_table', 3),
(27, '2020_02_03_132836_create_upazilas_table', 3),
(28, '2020_02_05_141501_create_notifications_table', 3),
(29, '2020_02_23_150917_create_exams_table', 3),
(30, '2020_02_23_152029_create_grades_table', 3),
(31, '2019_11_30_195808_create_marks_table', 4);

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
(1, 'App\\User', 1),
(2, 'App\\User', 82),
(3, 'App\\User', 83);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JANUARY', NULL, NULL, NULL),
(2, 'FEBRUARY', NULL, NULL, NULL),
(3, 'MARCH', NULL, NULL, NULL),
(4, 'APRIL', NULL, NULL, NULL),
(5, 'MAY', NULL, NULL, NULL),
(6, 'JUNE', NULL, NULL, NULL),
(7, 'JULY', NULL, NULL, NULL),
(8, 'AUGUST', NULL, NULL, NULL),
(9, 'SEPTEMBER', NULL, NULL, NULL),
(10, 'OCTOBER', NULL, NULL, NULL),
(11, 'NOVEMBER', NULL, NULL, NULL),
(12, 'DECEMBER', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=superAdmin,schoolAdmin, 1=other',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(83, 'Admission', 'web', 0, NULL, '2019-10-29 20:39:51', '2019-10-29 20:39:51'),
(85, 'Student', 'web', 0, NULL, '2019-10-29 20:40:08', '2019-10-29 20:40:08'),
(90, 'Attendance', 'web', 0, NULL, '2019-10-29 20:41:18', '2019-10-29 20:41:18'),
(95, 'User Management', 'web', 0, NULL, '2019-10-29 22:46:31', '2019-10-29 22:46:31'),
(96, 'Super Admin', 'web', 1, NULL, '2019-10-30 02:01:30', '2019-10-30 02:01:30'),
(101, 'Class', 'web', 0, NULL, '2019-11-15 22:44:59', '2019-11-15 22:44:59'),
(102, 'Section', 'web', 0, NULL, '2019-11-15 22:45:51', '2019-11-15 22:45:51'),
(103, 'SessionYear', 'web', 0, NULL, '2019-11-15 22:46:08', '2019-11-15 22:46:08'),
(105, 'Subject', 'web', 0, NULL, '2019-11-15 22:46:31', '2019-11-15 22:46:31'),
(106, 'Class Teacher', 'web', 0, NULL, '2019-11-15 22:46:31', '2019-11-15 22:46:31'),
(107, 'Fee Management', 'web', 0, NULL, '2019-12-31 22:46:31', '2019-12-31 22:46:31'),
(108, 'Scholarship', 'web', 0, NULL, '2020-01-26 00:22:05', NULL),
(110, 'Fee Collection', 'web', 0, NULL, NULL, NULL),
(112, 'Mark', 'web', 0, NULL, '2020-03-12 14:44:14', '2020-03-12 14:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=superAdmin,schoolAdmin, 1=other',
  `bId` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'branch id',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `bId`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 1, 0, NULL, '2019-10-22 01:49:53', '2019-10-22 01:49:53'),
(2, 'School Admin', 'web', 0, 0, NULL, '2019-11-23 06:07:22', '2019-11-23 06:07:22'),
(3, 'Class Teacher', 'web', 0, 1, NULL, '2020-02-02 09:27:26', '2020-02-02 09:27:26'),
(4, 'Accountant(Fee Management)', 'web', 0, 1, NULL, '2020-02-02 10:04:20', '2020-02-02 10:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_change_requests`
--

CREATE TABLE `role_change_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleid` bigint(20) UNSIGNED NOT NULL,
  `toChangeRoleId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `bId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(83, 1),
(83, 2),
(83, 4),
(85, 1),
(85, 2),
(85, 4),
(90, 1),
(90, 2),
(95, 1),
(95, 2),
(96, 1),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(106, 3),
(107, 1),
(107, 2),
(107, 4),
(108, 1),
(108, 2),
(110, 1),
(110, 2),
(112, 1),
(112, 2);

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

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `name`, `discount`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Talentpull', 100.00, 1, '2020-01-28 07:29:43', '2020-01-28 07:29:43', NULL),
(2, 'Poor fund', 50.00, 1, '2020-01-28 07:30:31', '2020-02-02 11:05:29', NULL),
(3, 'Admission Discount', 10.00, 1, '2020-02-02 11:06:24', '2020-02-02 11:06:24', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_branches`
--

INSERT INTO `school_branches` (`id`, `branchId`, `nameOfTheInstitution`, `eiinNumber`, `email`, `phoneNumber`, `district`, `upazilla`, `nameOfHead`, `schoolType`, `address`, `activeStatus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 331796, 'Faridpur Girls High School', '234567812', NULL, '01632736808', 'Faridpur', 'Boalmari Upazila', 'Shubir Sir', 'Public Schools', 'faridpur, 213 ka', 1, '2020-01-26 08:18:28', '2020-01-26 11:45:52', NULL),
(2, 669842, 'qwerqwr', '2342424', NULL, '23423424', 'Dhaka', 'Dhamrai Upazila', '2342344dfsgsd', 'Public Schools', '42343', 0, '2020-02-03 07:59:49', '2020-02-03 07:59:49', NULL);

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
(1, 1, 6, 1, 'Section A', 'Morning', NULL, '2020-01-26 12:34:21', '2020-01-26 12:34:21'),
(2, 1, 7, 1, 'Section A', 'Morning', NULL, '2020-01-26 12:34:32', '2020-01-26 12:34:32'),
(3, 1, 1, 1, 'section A', 'Morning', NULL, '2020-02-02 11:03:02', '2020-02-02 11:03:02');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_years`
--

INSERT INTO `session_years` (`id`, `sessionYear`, `status`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2020', 1, 1, '2020-01-26 12:32:29', '2020-01-26 12:32:29', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentoptionalsubjects`
--

INSERT INTO `studentoptionalsubjects` (`id`, `studentId`, `subjectId`, `optional`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 6, 0, 1, '2020-01-28 07:17:39', '2020-01-28 07:17:39', NULL),
(2, 1, 14, 1, 1, '2020-01-28 07:17:39', '2020-01-28 07:17:39', NULL),
(3, 2, 6, 0, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(4, 2, 14, 1, 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(5, 4, 14, 0, 1, '2020-01-28 07:44:49', '2020-01-28 07:44:49', NULL),
(6, 4, 6, 1, 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(7, 5, 6, 0, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(8, 5, 14, 1, 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(9, 6, 6, 0, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(10, 6, 14, 1, 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentId`, `firstName`, `lastName`, `email`, `email_verified_at`, `mobile`, `birthDate`, `blood`, `address`, `password`, `readablePassword`, `fatherName`, `motherName`, `fatherOccupation`, `MotherOccupation`, `fatherIncome`, `motherIncome`, `age`, `roll`, `gender`, `religion`, `bId`, `sectionId`, `group`, `schoolarshipId`, `type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 718409, 'Sonia', 'hassan', NULL, NULL, '01750658791', '2020-01-13', '0+', NULL, '$2y$10$umDDrhj/yPPAkrSmFu00quhAV8xKvE6EqtE3NOC3O956Us8fUYdSm', 573085, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Male', NULL, 1, 1, 'Science', 0, 'regular', NULL, '2020-01-28 07:17:39', '2020-01-28 07:17:39', NULL),
(2, 799200, 'miop', 'Rebecca', NULL, NULL, '01904470171', '2020-01-07', '0+', NULL, '$2y$10$qyEkypJPJAhE2VxnLVdinO.KTx.CPbzJ3so.Qf4ILRe6DvlWFciXS', 989104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Male', NULL, 1, 1, 'Science', 1, 'regular', NULL, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(4, 599963, 'arifa', 'Rahman', NULL, NULL, '01634189911', '2020-01-13', '0+', NULL, '$2y$10$vGoFaIAwlyMk0FmUKCQVpuC8Z.h4oYiX2W2mpJTJ32q1xEzvSjrRO', 222924, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Male', NULL, 1, 1, 'Science', 2, 'regular', NULL, '2020-01-28 07:44:49', '2020-01-28 07:44:49', NULL),
(6, 357799, 'Rio', 'orio', NULL, NULL, '01723093965', '2020-02-10', 'A+', NULL, '$2y$10$0VFOprlLhgyLB3FzwUma2OwuAxHoZyKt1fRsQ7dnLDyS8BjvKs6Ym', 839479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Female', NULL, 1, 1, 'Science', 3, 'regular', NULL, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL),
(7, 357800, 'Rio2', 'orio', NULL, NULL, '01777288229', '2020-02-10', 'A+', NULL, '$2y$10$0VFOprlLhgyLB3FzwUma2OwuAxHoZyKt1fRsQ7dnLDyS8BjvKs6Ym', 839479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'Female', NULL, 1, 2, 'Science', 3, 'regular', NULL, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_scholarships`
--

CREATE TABLE `student_scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL COMMENT 'student_table_id',
  `scholershipId` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'schlarship table id',
  `feeId` bigint(20) UNSIGNED NOT NULL COMMENT 'fee_table_id',
  `discount` double(8,2) NOT NULL COMMENT 'Discount %',
  `sessionYear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'year of scholarship',
  `bId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_scholarships`
--

INSERT INTO `student_scholarships` (`id`, `studentId`, `scholershipId`, `feeId`, `discount`, `sessionYear`, `bId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 12, 100.00, '1', 1, '2020-01-28 07:32:50', '2020-01-28 07:32:50', NULL),
(2, 4, 2, 12, 50.00, '1', 1, '2020-01-28 07:44:50', '2020-01-28 07:44:50', NULL),
(3, 5, 1, 2, 100.00, '1', 1, '2020-01-28 07:55:37', '2020-01-28 07:55:37', NULL),
(4, 6, 3, 12, 10.00, '1', 1, '2020-02-02 11:08:27', '2020-02-02 11:08:27', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectName`, `subjectCode`, `classId`, `group`, `bId`, `optionalstatus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bangla', '101', 6, 'General', 1, 0, '2020-01-26 12:42:49', '2020-01-26 12:42:49', NULL),
(2, 'English', '201', 6, 'General', 1, 0, '2020-01-26 12:50:50', '2020-01-26 12:50:50', NULL),
(3, 'Bangla 2nd', '102', 6, 'General', 1, 0, '2020-01-26 12:51:11', '2020-01-26 12:51:11', NULL),
(4, 'English 2nd', '202', 6, 'General', 1, 0, '2020-01-26 12:51:28', '2020-01-26 12:51:28', NULL),
(5, 'Economics', '160', 6, 'Commerce', 1, 0, '2020-01-26 12:52:04', '2020-01-26 12:52:04', NULL),
(6, 'Higher Mathematics', '167', 6, 'Science', 1, 1, '2020-01-26 12:52:46', '2020-01-26 12:52:46', NULL),
(7, 'ICT', '146', 6, 'General', 1, 0, '2020-01-26 12:53:19', '2020-01-26 12:53:19', NULL),
(8, 'Physics', '147', 6, 'Science', 1, 0, '2020-01-26 12:53:37', '2020-01-26 12:53:37', NULL),
(9, 'Accounting', '131', 6, 'Commerce', 1, 0, '2020-01-26 12:54:01', '2020-01-26 12:54:01', NULL),
(10, 'Business Initiative', '112', 6, 'Commerce', 1, 0, '2020-01-26 12:55:58', '2020-01-26 12:55:58', NULL),
(11, 'History of Bangladesh', '106', 6, 'Arts', 1, 0, '2020-01-26 12:56:31', '2020-01-26 12:56:31', NULL),
(12, 'Islam and moral Education', '197', 6, 'General', 1, 0, '2020-01-26 12:58:23', '2020-01-26 12:58:23', NULL),
(13, 'Home Science\\r\\n', '103', 6, 'Arts', 1, 1, '2020-01-26 13:48:05', '2020-01-26 13:57:43', NULL),
(14, 'Biology', '136', 6, 'Science', 1, 1, '2020-01-26 13:48:24', '2020-01-26 13:48:24', NULL),
(15, 'General Mathematics', '303', 6, 'General', 1, 0, '2020-01-26 13:48:57', '2020-01-26 13:48:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(2) UNSIGNED NOT NULL,
  `district_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী'),
(2, 34, 'Bamna Upazila', 'বামনা'),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর'),
(4, 34, 'Betagi Upazila', 'বেতাগি'),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা'),
(6, 34, 'Taltali Upazila', 'তালতলী'),
(7, 35, 'Muladi Upazila', 'মুলাদি'),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ'),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা'),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর'),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ'),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা'),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী'),
(14, 35, 'Hizla Upazila', 'হিজলা'),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ '),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর'),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর'),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন'),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন'),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান'),
(21, 36, 'Lalmohan Upazila', 'লালমোহন'),
(22, 36, 'Manpura Upazila', 'মনপুরা'),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন'),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর'),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া'),
(26, 37, 'Nalchity Upazila', 'নালচিতি'),
(27, 37, 'Rajapur Upazila', 'রাজাপুর'),
(28, 38, 'Bauphal Upazila', 'বাউফল'),
(29, 38, 'Dashmina Upazila', 'দশমিনা'),
(30, 38, 'Galachipa Upazila', 'গলাচিপা'),
(31, 38, 'Kalapara Upazila', 'কালাপারা'),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ '),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর'),
(34, 38, 'Dumki Upazila', 'ডুমকি'),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া'),
(37, 39, 'Kaukhali', 'কাউখালি'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া'),
(39, 39, 'Nazirpur', 'নাজিরপুর'),
(40, 39, 'Nesarabad', 'নেসারাবাদ'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর'),
(42, 39, 'Zianagar', 'জিয়ানগর'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর'),
(44, 40, 'Thanchi', 'থানচি'),
(45, 40, 'Lama', 'লামা'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি '),
(47, 40, 'Ali kadam', 'আলী কদম'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি '),
(49, 40, 'Ruma', 'রুমা'),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর'),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ'),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর'),
(53, 41, 'Nabinagar Upazila', 'নবীনগর'),
(54, 41, 'Sarail Upazila', 'সরাইল'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন'),
(56, 41, 'Kasba Upazila', 'কসবা'),
(57, 41, 'Akhaura Upazila', 'আখাউরা'),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর'),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ'),
(62, 42, 'Haimchar', 'হাইমচর'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ'),
(64, 42, 'Kachua', 'কচুয়া'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ'),
(67, 42, 'Shahrasti', 'শাহরাস্তি'),
(68, 43, 'Anwara Upazila', 'আনোয়ারা'),
(69, 43, 'Banshkhali Upazila', 'বাশখালি'),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি'),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ'),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি'),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী'),
(74, 43, 'Lohagara Upazila', 'লোহাগারা'),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই'),
(76, 43, 'Patiya Upazila', 'পটিয়া'),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া'),
(78, 43, 'Raozan Upazila', 'রাউজান'),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ'),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া'),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড'),
(82, 44, 'Barura Upazila', 'বড়ুরা'),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া'),
(84, 44, 'Burichong Upazila', 'বুড়িচং'),
(85, 44, 'Chandina Upazila', 'চান্দিনা'),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম'),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি'),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার'),
(89, 44, 'Homna Upazila', 'হোমনা'),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর'),
(91, 44, 'Laksam Upazila', 'লাকসাম'),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ'),
(93, 44, 'Meghna Upazila', 'মেঘনা'),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর'),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট'),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ'),
(97, 44, 'Titas Upazila', 'তিতাস'),
(98, 45, 'Chakaria Upazila', 'চকরিয়া'),
(100, 45, 'Cox\'s Bazar Sadar Upazila', 'কক্স বাজার সদর'),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া'),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী'),
(103, 45, 'Ramu Upazila', 'রামু'),
(104, 45, 'Teknaf Upazila', 'টেকনাফ'),
(105, 45, 'Ukhia Upazila', 'উখিয়া'),
(106, 45, 'Pekua Upazila', 'পেকুয়া'),
(107, 46, 'Feni Sadar', 'ফেনী সদর'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া'),
(110, 46, 'Parshuram', 'পরশুরাম'),
(111, 46, 'Fhulgazi', 'ফুলগাজি'),
(112, 46, 'Sonagazi', 'সোনাগাজি'),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা '),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি'),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি'),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি'),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি'),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা'),
(119, 47, 'Panchhari Upazila', 'পানছড়ি'),
(120, 47, 'Ramgarh Upazila', 'রামগড়'),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর'),
(122, 48, 'Raipur Upazila', 'রায়পুর'),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ'),
(124, 48, 'Ramgati Upazila', 'রামগতি'),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর'),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর'),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ'),
(128, 49, 'Chatkhil Upazila', 'চাটখিল'),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ'),
(130, 49, 'Shenbag Upazila', 'শেনবাগ'),
(131, 49, 'Hatia Upazila', 'হাতিয়া'),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট '),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি'),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর '),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর'),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি'),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি'),
(138, 50, 'Barkal Upazila', 'বরকল'),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি'),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি'),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই'),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু'),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর '),
(144, 50, 'Kaukhali Upazila', 'কাউখালি'),
(145, 1, 'Dhamrai Upazila', 'ধামরাই'),
(146, 1, 'Dohar Upazila', 'দোহার'),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ'),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ'),
(149, 1, 'Savar Upazila', 'সাভার'),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর'),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী'),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা'),
(153, 2, 'Madhukhali Upazila', 'মধুখালি'),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা'),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড'),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন '),
(157, 2, 'Sadarpur Upazila', 'সদরপুর'),
(158, 2, 'Shaltha Upazila', 'শালথা'),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর'),
(161, 3, 'Kapasia', 'কাপাসিয়া'),
(162, 3, 'Sripur', 'শ্রীপুর'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ'),
(164, 3, 'Tongi', 'টঙ্গি'),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর'),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি'),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া'),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর'),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া'),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ'),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ'),
(172, 5, 'Islampur Upazila', 'ইসলামপুর'),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর'),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ'),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা'),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি '),
(177, 5, 'Narundi Police I.C', 'নারুন্দি'),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম'),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর'),
(180, 6, 'Bhairab Upazila', 'ভৈরব'),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর '),
(182, 6, 'Itna Upazila', 'ইটনা'),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ'),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি'),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর'),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর'),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন'),
(188, 6, 'Nikli Upazila', 'নিকলি'),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা'),
(190, 6, 'Tarail Upazila', 'তাড়াইল'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর'),
(192, 7, 'Kalkini', 'কালকিনি'),
(193, 7, 'Rajoir', 'রাজইর'),
(194, 7, 'Shibchar', 'শিবচর'),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর'),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর'),
(197, 8, 'Shibalaya Upazila', 'শিবালয়'),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া'),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর'),
(200, 8, 'Ghior Upazila', 'ঘিওর'),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর'),
(202, 9, 'Lohajang Upazila', 'লোহাজং'),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর'),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর'),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান'),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি'),
(207, 9, 'Gazaria Upazila', 'গজারিয়া'),
(208, 10, 'Bhaluka', 'ভালুকা'),
(209, 10, 'Trishal', 'ত্রিশাল'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা'),
(212, 10, 'Dhobaura', 'ধবারুয়া'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া'),
(214, 10, 'Gaffargaon', 'গফরগাঁও'),
(215, 10, 'Gauripur', 'গৌরিপুর'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর'),
(218, 10, 'Nandail', 'নন্দাইল'),
(219, 10, 'Phulpur', 'ফুলপুর'),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার'),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও'),
(222, 11, 'Bandar', 'বান্দার'),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর'),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ'),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ'),
(226, 12, 'Belabo Upazila', 'বেলাবো'),
(227, 12, 'Monohardi Upazila', 'মনোহরদি'),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর'),
(229, 12, 'Palash Upazila', 'পলাশ'),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর'),
(231, 12, 'Shibpur Upazila', 'শিবপুর'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা'),
(237, 13, 'Madan Upazilla', 'মদন'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি'),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি'),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট'),
(244, 14, 'Pangsha Upazila', 'পাংশা'),
(245, 14, 'Kalukhali Upazila', 'কালুখালি'),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর '),
(248, 15, 'Damudya Upazila', 'দামুদিয়া'),
(249, 15, 'Naria Upazila', 'নড়িয়া'),
(250, 15, 'Jajira Upazila', 'জাজিরা'),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ'),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট '),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি'),
(254, 16, 'Nakla Upazila', 'নাকলা'),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি'),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর'),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি'),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর'),
(259, 17, 'Sakhipur Upazila', 'সখিপুর'),
(260, 17, 'Basail Upazila', 'বসাইল'),
(261, 17, 'Madhupur Upazila', 'মধুপুর'),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল'),
(263, 17, 'Kalihati Upazila', 'কালিহাতি'),
(264, 17, 'Nagarpur Upazila', 'নগরপুর'),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর'),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর'),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার'),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর'),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি'),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর'),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি'),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট'),
(273, 55, 'Kachua Upazila', 'কচুয়া'),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট '),
(275, 55, 'Mongla Upazila', 'মংলা'),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ'),
(277, 55, 'Rampal Upazila', 'রামপাল'),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা'),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা'),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর'),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর '),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা'),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর'),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর'),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া '),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর'),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা'),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর '),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা'),
(290, 57, 'Sharsha Upazila', 'সারশা'),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর'),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর'),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর '),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা'),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা'),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা'),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা '),
(299, 59, 'Dacope Upazila', 'ডাকপে'),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া'),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া'),
(302, 59, 'Koyra Upazila', 'কয়ড়া'),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা'),
(304, 59, 'Phultala Upazila', 'ফুলতলা'),
(305, 59, 'Rupsa Upazila', 'রূপসা'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর'),
(307, 60, 'Kumarkhali', 'কুমারখালি'),
(308, 60, 'Daulatpur', 'দৌলতপুর'),
(309, 60, 'Mirpur', 'মিরপুর'),
(310, 60, 'Bheramara', 'ভেরামারা'),
(311, 60, 'Khoksa', 'খোকসা'),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর'),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর'),
(314, 61, 'Shalikha Upazila', 'শালিখা'),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর'),
(316, 62, 'angni Upazila', 'আংনি'),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর'),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া'),
(321, 63, 'Kalia Upazilla', 'কালিয়া'),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর'),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি '),
(324, 64, 'Debhata Upazila', 'দেভাটা'),
(325, 64, 'Tala Upazila', 'তালা'),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া'),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর'),
(329, 18, 'Adamdighi', 'আদমদিঘী'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর'),
(331, 18, 'Sherpur', 'শেরপুর'),
(332, 18, 'Dhunat', 'ধুনট'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া'),
(334, 18, 'Gabtali', 'গাবতলি'),
(335, 18, 'Kahaloo', 'কাহালু'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি'),
(339, 18, 'Shibganj', 'শিবগঞ্জ'),
(340, 18, 'Sonatala', 'সোনাতলা'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর'),
(342, 19, 'Akkelpur', 'আক্কেলপুর'),
(343, 19, 'Kalai', 'কালাই'),
(344, 19, 'Khetlal', 'খেতলাল'),
(345, 19, 'Panchbibi', 'পাঁচবিবি'),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর'),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর'),
(348, 20, 'Manda Upazila', 'মান্দা'),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর'),
(350, 20, 'Atrai Upazila', 'আত্রাই'),
(351, 20, 'Raninagar Upazila', 'রাণীনগর'),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা'),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট '),
(354, 20, 'Sapahar Upazila', 'সাপাহার'),
(355, 20, 'Porsha Upazila', 'পোরশা'),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি'),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম'),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া'),
(360, 21, 'Lalpur Upazila', 'লালপুর'),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম'),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট'),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর'),
(365, 22, 'Nachole Upazila', 'নাচোল'),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর'),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ'),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া'),
(369, 23, 'Bera Upazila', 'বেড়া'),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা'),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর'),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর'),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী'),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর'),
(375, 23, 'Santhia Upazila', 'সাথিয়া'),
(376, 23, 'Sujanagar Upazila', 'সুজানগর'),
(377, 24, 'Bagha', 'বাঘা'),
(378, 24, 'Bagmara', 'বাগমারা'),
(379, 24, 'Charghat', 'চারঘাট'),
(380, 24, 'Durgapur', 'দুর্গাপুর'),
(381, 24, 'Godagari', 'গোদাগারি'),
(382, 24, 'Mohanpur', 'মোহনপুর'),
(383, 24, 'Paba', 'পবা'),
(384, 24, 'Puthia', 'পুঠিয়া'),
(385, 24, 'Tanore', 'তানোর'),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর'),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি'),
(388, 25, 'Chauhali Upazila', 'চৌহালি'),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা'),
(390, 25, 'Kazipur Upazila', 'কাজীপুর'),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ'),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর'),
(393, 25, 'Tarash Upazila', 'তারাশ'),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া'),
(395, 26, 'Birampur Upazila', 'বিরামপুর'),
(396, 26, 'Birganj', 'বীরগঞ্জ'),
(397, 26, 'Biral Upazila', 'বিড়াল'),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ'),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর'),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি'),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট'),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর'),
(403, 26, 'Kaharole Upazila', 'কাহারোল'),
(404, 26, 'Khansama Upazila', 'খানসামা'),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ'),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর'),
(408, 27, 'Fulchhari', 'ফুলছড়ি'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ'),
(411, 27, 'Palashbari', 'পলাশবাড়ী'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর'),
(413, 27, 'Saghata', 'সাঘাটা'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি'),
(418, 28, 'Phulbari', 'ফুলবাড়ি'),
(419, 28, 'Rajarhat', 'রাজারহাট'),
(420, 28, 'Ulipur', 'উলিপুর'),
(421, 28, 'Chilmari', 'চিলমারি'),
(422, 28, 'Rowmari', 'রউমারি'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর'),
(425, 29, 'Aditmari', 'আদিতমারি'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা'),
(428, 29, 'Patgram', 'পাটগ্রাম'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর'),
(430, 30, 'Saidpur', 'সৈয়দপুর'),
(431, 30, 'Jaldhaka', 'জলঢাকা'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ'),
(433, 30, 'Domar', 'ডোমার'),
(434, 30, 'Dimla', 'ডিমলা'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ'),
(437, 31, 'Boda', 'বোদা'),
(438, 31, 'Atwari', 'আটোয়ারি'),
(439, 31, 'Tetulia', 'তেতুলিয়া'),
(440, 32, 'Badarganj', 'বদরগঞ্জ'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর'),
(442, 32, 'Gangachara', 'গঙ্গাচরা'),
(443, 32, 'Kaunia', 'কাউনিয়া'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর'),
(445, 32, 'Pirgachha', 'পীরগাছা'),
(446, 32, 'Pirganj', 'পীরগঞ্জ'),
(447, 32, 'Taraganj', 'তারাগঞ্জ'),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর'),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ'),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি'),
(451, 33, 'Haripur Upazila', 'হরিপুর'),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ'),
(454, 51, 'Baniachang', 'বানিয়াচং'),
(455, 51, 'Bahubal', 'বাহুবল'),
(456, 51, 'Chunarughat', 'চুনারুঘাট'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর'),
(458, 51, 'Lakhai', 'লাক্ষাই'),
(459, 51, 'Madhabpur', 'মাধবপুর'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ'),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার'),
(463, 52, 'Barlekha', 'বড়লেখা'),
(464, 52, 'Juri', 'জুড়ি'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ'),
(466, 52, 'Kulaura', 'কুলাউরা'),
(467, 52, 'Rajnagar', 'রাজনগর'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর'),
(470, 53, 'Chhatak', 'ছাতক'),
(471, 53, 'Derai', 'দেড়াই'),
(472, 53, 'Dharampasha', 'ধরমপাশা'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ'),
(476, 53, 'Sulla', 'সুল্লা'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ'),
(479, 53, 'Tahirpur', 'তাহিরপুর'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ'),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা'),
(484, 54, 'Balaganj', 'বালাগঞ্জ'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট'),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর'),
(490, 54, 'Kanaighat', 'কানাইঘাট'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `email`, `mobile`, `readablePassword`, `email_verified_at`, `designation`, `joinDate`, `address`, `skill`, `educattion`, `biography`, `resume`, `certificate`, `bId`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Shuvo', 'mohammadshuvo205@gmail.com', '01750658791', '12345678', NULL, 'Super Admin', '25-9-2019', 'khulna', NULL, NULL, NULL, NULL, NULL, 0, '$2y$12$OxRrHZc6x/eIqB5.uxS1R.PJzlQevj5bgnsj6/uSKncZYnLgxOnHm', NULL, NULL, NULL, NULL),
(82, 769012, 'Shubir Sir', NULL, '01632736808', '580418', NULL, 'School Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$Hs/kQ5G/0llD1APWudHQEuYdbokj64x.XWtxRl/PR7rQpsJZaIu4m', NULL, '2020-01-26 11:45:52', '2020-01-26 11:45:52', NULL),
(83, 448527, 'shujon rahaman', 'shujon@gmail.com', '01681805060', '720920', NULL, 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$h/tp1FguRNg.IrG5nM/cp.jW.x2HvS7f.Ssq/NLDiAVUn2uLWTfBO', NULL, '2020-02-02 09:59:29', '2020-02-02 09:59:29', NULL);

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
-- Indexes for table `due_fee_histories`
--
ALTER TABLE `due_fee_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
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
-- Indexes for table `grades`
--
ALTER TABLE `grades`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `role_change_requests`
--
ALTER TABLE `role_change_requests`
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
  ADD UNIQUE KEY `school_branches_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `school_branches_branchid_unique` (`branchId`),
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `due_fee_histories`
--
ALTER TABLE `due_fee_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fee_collections`
--
ALTER TABLE `fee_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `fee_histories`
--
ALTER TABLE `fee_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_change_requests`
--
ALTER TABLE `role_change_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_branches`
--
ALTER TABLE `school_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session_years`
--
ALTER TABLE `session_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentoptionalsubjects`
--
ALTER TABLE `studentoptionalsubjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
