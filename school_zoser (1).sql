-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 12:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_zoser`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yearTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDefault` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookISBN` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookAuthor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookPublisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookState` tinyint(1) DEFAULT 1,
  `bookQuantity` int(11) NOT NULL,
  `bookShelf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_left` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_right` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_middle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_left` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_right` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_middle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_margins` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `className` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classAcademicYear` int(11) NOT NULL,
  `dormitoryId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `classAcademicYear`, `dormitoryId`, `created_at`, `updated_at`) VALUES
(1, 'KG1', 1, 0, NULL, NULL),
(2, 'KG2', 1, 0, NULL, NULL),
(3, 'Prim1', 1, 0, NULL, NULL),
(4, 'Prim2', 1, 0, NULL, NULL),
(5, 'Prim3', 1, 0, NULL, NULL),
(6, 'Prim4', 1, 0, NULL, NULL),
(7, 'Prim5', 1, 0, NULL, NULL),
(8, 'Prim6', 1, 0, NULL, NULL),
(9, 'Prep1', 1, 0, NULL, NULL),
(10, 'Prep2', 1, 0, NULL, NULL),
(11, 'Prep3', 1, 0, NULL, NULL),
(12, 'Sec1', 1, 0, NULL, NULL),
(13, 'Sec2', 1, 0, NULL, NULL),
(14, 'Sec3', 1, 0, NULL, NULL),
(15, 'not', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comp_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_type` int(11) NOT NULL,
  `comp_source` int(11) NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nxt_fup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depart_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `depart_title`, `depart_desc`, `created_at`, `updated_at`) VALUES
(1, 'programming', 'programming ant think', NULL, NULL),
(2, 'softwere', 'softwere do any think', '2021-10-31 16:38:49', '2021-10-31 16:38:49'),
(3, 'devolepar', 'devolepar any think', '2021-10-31 16:39:41', '2021-10-31 16:39:41'),
(5, 'web', 'this department makee any web apps', '2021-10-31 16:41:49', '2021-10-31 18:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desig_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desig_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dormDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enq_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_type` int(11) NOT NULL,
  `enq_source` int(11) NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nxt_fup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enq_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eventTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventFor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enentPlace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fe_active` tinyint(1) NOT NULL,
  `eventDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseDate` int(11) NOT NULL,
  `expenseTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expenseAmount` int(11) NOT NULL,
  `expenseCategory` int(11) NOT NULL,
  `expenseImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expenseNotes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_cats`
--

CREATE TABLE `expenses_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fee_allocations`
--

CREATE TABLE `fee_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feeTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feeGroup` int(11) NOT NULL,
  `feeType` int(11) NOT NULL,
  `feeTypeNextTS` int(11) NOT NULL,
  `feeFor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feeForInfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_discounts`
--

CREATE TABLE `fee_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dicount_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_status` tinyint(1) NOT NULL,
  `discount_assignment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_groups`
--

CREATE TABLE `fee_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_count` int(11) NOT NULL DEFAULT 0,
  `group_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_pages`
--

CREATE TABLE `frontend_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_permalink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_visibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_navbar_visible` tinyint(1) NOT NULL,
  `page_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_publish_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_publish_specific_date` int(11) NOT NULL,
  `page_template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_feat_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slider_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gradeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gradePoints` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostelTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostelType` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostelAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostelManager` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `managerPhoto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `managerContact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostelNotes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_cats`
--

CREATE TABLE `hostel_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catTypeId` int(11) NOT NULL,
  `catTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catFees` int(11) NOT NULL,
  `catNotes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `id_cards`
--

CREATE TABLE `id_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_left` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_right` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_margins` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incomeDate` int(11) NOT NULL,
  `incomeTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incomeAmount` int(11) NOT NULL,
  `incomeCategory` int(11) NOT NULL,
  `incomeImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incomeNotes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_cats`
--

CREATE TABLE `income_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv_cats`
--

CREATE TABLE `inv_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv_issues`
--

CREATE TABLE `inv_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refno` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_cat` int(11) NOT NULL,
  `item_title` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `issue_tu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` int(11) NOT NULL,
  `ret_date` int(11) NOT NULL,
  `is_returned` tinyint(1) NOT NULL,
  `attachment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items_codes`
--

CREATE TABLE `items_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_cat` int(11) NOT NULL,
  `item_code` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_pn` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items_stocks`
--

CREATE TABLE `items_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refno` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_date` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_attach` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `languageTitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `languageUniversal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `languagePhrases` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRTL` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_issues`
--

CREATE TABLE `library_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `serial_num` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` int(11) NOT NULL,
  `ret_date` int(11) NOT NULL,
  `is_returned` tinyint(1) NOT NULL DEFAULT 0,
  `issue_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsms`
--

CREATE TABLE `mailsms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailTo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailType` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageData` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageSender` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsms_templates`
--

CREATE TABLE `mailsms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `templateMail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `templateSMS` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `templateVars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_albums`
--

CREATE TABLE `media_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `albumTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumParent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_items`
--

CREATE TABLE `media_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `albumId` int(11) NOT NULL DEFAULT 0,
  `mediaType` tinyint(1) NOT NULL,
  `mediaURL` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediaURLThumb` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mediaTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediaDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediaDate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_date` int(11) NOT NULL,
  `scheduled_time_start_total` int(11) NOT NULL,
  `scheduled_time_end_total` int(11) NOT NULL,
  `conference_duration` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `conference_host` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_target_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_target_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_metadata` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages_lists`
--

CREATE TABLE `messages_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `lastMessage` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastMessageDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageStatus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mettings`
--

CREATE TABLE `mettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_date` int(11) NOT NULL,
  `scheduled_time_start_total` int(11) NOT NULL,
  `scheduled_time_end_total` int(11) NOT NULL,
  `conference_duration` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `conference_presenter` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_moderators` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_metadata` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_status` tinyint(1) NOT NULL DEFAULT 0,
  `server_hook_id` int(11) NOT NULL,
  `consumption_users` int(11) NOT NULL,
  `consumption_minutes` int(11) DEFAULT NULL,
  `meeting_platform` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_06_162110_create_roles_table', 1),
(2, '2014_10_06_201050_create_classes_table', 1),
(3, '2014_10_07_143534_create_sections_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2021_10_06_182824_create_academic_years_table', 1),
(10, '2021_10_06_183547_create_books_table', 1),
(11, '2021_10_06_184302_create_certificates_table', 1),
(12, '2021_10_06_184803_create_complaints_table', 1),
(13, '2021_10_06_185942_create_messages_table', 1),
(14, '2021_10_06_193334_create_departments_table', 1),
(15, '2021_10_06_193630_create_designations_table', 1),
(16, '2021_10_06_193846_create_dormitories_table', 1),
(17, '2021_10_06_194043_create_enquiries_table', 1),
(18, '2021_10_06_195124_create_events_table', 1),
(19, '2021_10_06_200516_create_expenses_table', 1),
(20, '2021_10_06_200848_create_expenses_cats_table', 1),
(21, '2021_10_08_113128_create_fee_allocations_table', 1),
(22, '2021_10_08_113636_create_fee_discounts_table', 1),
(23, '2021_10_08_114244_create_fee_groups_table', 1),
(24, '2021_10_08_114935_create_frontend_pages_table', 1),
(25, '2021_10_08_120125_create_grade_levels_table', 1),
(26, '2021_10_08_121916_create_hostels_table', 1),
(27, '2021_10_08_122502_create_hostel_cats_table', 1),
(28, '2021_10_08_122910_create_id_cards_table', 1),
(29, '2021_10_08_122953_create_incomes_table', 1),
(30, '2021_10_08_123006_create_income_cats_table', 1),
(31, '2021_10_08_123025_create_inv_cats_table', 1),
(32, '2021_10_08_123041_create_inv_issues_table', 1),
(33, '2021_10_08_123103_create_items_codes_table', 1),
(34, '2021_10_08_123129_create_items_stocks_table', 1),
(35, '2021_10_08_123149_create_languages_table', 1),
(36, '2021_10_08_130119_create_library_issues_table', 1),
(37, '2021_10_08_130135_create_mailsms_table', 1),
(38, '2021_10_08_130311_create_mailsms_templates_table', 1),
(39, '2021_10_08_130409_create_media_albums_table', 1),
(40, '2021_10_08_130424_create_media_items_table', 1),
(41, '2021_10_08_130437_create_meetings_table', 1),
(42, '2021_10_08_130722_create_user_messages_table', 1),
(43, '2021_10_08_130734_create_messages_lists_table', 1),
(44, '2021_10_08_130748_create_mettings_table', 1),
(45, '2021_10_08_130953_create_mm_uploads_table', 1),
(46, '2021_10_08_131023_create_mobnotifications_table', 1),
(47, '2021_10_08_131152_create_mobs_notifications_table', 1),
(48, '2021_10_08_131229_create_newsboards_table', 1),
(49, '2021_10_08_142846_create_online_exams_table', 1),
(50, '2021_10_08_142911_create_online_exams_grades_table', 1),
(51, '2021_10_08_142924_create_online_exams_questions_table', 1),
(52, '2021_10_08_142936_create_payments_table', 1),
(53, '2021_10_08_143046_create_paymentscollections_table', 1),
(54, '2021_10_08_143100_create_payroll_histories_table', 1),
(55, '2021_10_08_143247_create_payroll_hourly_bases_table', 1),
(56, '2021_10_08_143301_create_payroll_salary_bases_table', 1),
(57, '2021_10_08_143430_create_phone_calls_table', 1),
(58, '2021_10_08_143448_create_polls_table', 1),
(59, '2021_10_08_143511_create_postals_table', 1),
(60, '2021_10_08_143716_create_settings_table', 1),
(61, '2021_10_08_143730_create_static_pages_table', 1),
(62, '2021_10_08_143749_create_stores_table', 1),
(63, '2021_10_08_144020_create_student_academic_years_table', 1),
(64, '2021_10_08_144041_create_student_categories_table', 1),
(65, '2021_10_08_144057_create_student_docs_table', 1),
(66, '2021_10_08_144221_create_weeks_table', 1),
(67, '2021_10_08_144222_create_study_materials_table', 1),
(68, '2021_10_08_144308_create_subjects_table', 1),
(69, '2021_10_08_144325_create_suppliers_table', 1),
(70, '2021_10_08_144340_create_transportations_table', 1),
(71, '2021_10_08_144352_create_transport_vehicles_table', 1),
(72, '2021_10_08_144404_create_vacations_table', 1),
(73, '2021_10_08_144558_create_visitors_table', 1),
(74, '2021_10_08_144813_create_wel_offices_table', 1),
(75, '2021_10_24_172414_create_teachers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mm_uploads`
--

CREATE TABLE `mm_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_orig_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_uploaded_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_mime` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_uploaded_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobnotifications`
--

CREATE TABLE `mobnotifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notifTo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifToIds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifData` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifDate` int(11) NOT NULL,
  `notifSender` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobs_notifications`
--

CREATE TABLE `mobs_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsboards`
--

CREATE TABLE `newsboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsText` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsFor` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsDate` int(11) NOT NULL,
  `newsImage` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fe_active` tinyint(1) NOT NULL,
  `creationDate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_exams`
--

CREATE TABLE `online_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examClass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sectionId` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `examTeacher` int(11) NOT NULL,
  `examSubject` int(11) NOT NULL,
  `examDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exAcYear` int(11) NOT NULL,
  `ExamEndDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examTimeMinutes` int(11) NOT NULL DEFAULT 0,
  `examDegreeSuccess` int(11) NOT NULL,
  `ExamShowGrade` tinyint(1) NOT NULL DEFAULT 0,
  `random_questions` tinyint(1) NOT NULL,
  `examQuestion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_exams_grades`
--

CREATE TABLE `online_exams_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `examQuestionsAnswers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `examGrade` int(11) DEFAULT NULL,
  `examDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_exams_questions`
--

CREATE TABLE `online_exams_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_mark` double(8,2) NOT NULL,
  `question_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_subject` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `is_shared` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentStudent` int(11) NOT NULL,
  `paymentRows` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentAmount` double(8,2) NOT NULL,
  `paymentDiscount` double(8,2) NOT NULL,
  `paymentDiscounted` double(8,2) NOT NULL,
  `paidAmount` double(8,2) NOT NULL DEFAULT 0.00,
  `paymentStatus` tinyint(1) DEFAULT NULL,
  `paymentDate` int(11) NOT NULL,
  `dueDate` int(11) NOT NULL,
  `dueNotified` tinyint(1) NOT NULL DEFAULT 0,
  `paymentUniqid` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentSuccessDetails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paidMethod` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paidTime` int(11) DEFAULT NULL,
  `discount_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentscollections`
--

CREATE TABLE `paymentscollections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `collectionAmount` double(8,2) NOT NULL,
  `collectionDate` int(11) NOT NULL,
  `collectionMethod` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectionNote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectedBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_histories`
--

CREATE TABLE `payroll_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `pay_by_userid` int(11) NOT NULL,
  `salary_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_value` decimal(10,0) NOT NULL,
  `hour_overtime` decimal(10,0) NOT NULL,
  `hour_count` decimal(10,0) NOT NULL,
  `pay_month` int(11) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `pay_date` int(11) NOT NULL,
  `pay_amount` decimal(10,0) NOT NULL,
  `pay_method` decimal(10,0) NOT NULL,
  `pay_comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_hourly_bases`
--

CREATE TABLE `payroll_hourly_bases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourly_cost` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary_bases`
--

CREATE TABLE `payroll_salary_bases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_basic` decimal(10,0) NOT NULL,
  `hour_overtime` decimal(10,0) NOT NULL,
  `salary_allowence` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_deduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_salary` decimal(10,0) NOT NULL,
  `gross_salary` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `phone_calls`
--

CREATE TABLE `phone_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FullName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_time` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nxt_follow` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_duration` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pollTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pollOptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pollTarget` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pollStatus` tinyint(1) NOT NULL DEFAULT 1,
  `userVoted` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postals`
--

CREATE TABLE `postals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postal_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refno` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_from` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_to` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_time` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `def_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_permissions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_title`, `role_description`, `def_for`, `role_permissions`, `created_at`, `updated_at`) VALUES
(1, 'student', 'this is student ', 'student', 'this is student ', NULL, NULL),
(3, 'admin', 'this is admin ', 'admin', 'this is admin ', NULL, NULL),
(4, 'parent', 'this is parent ', 'parent', 'this is parent ', NULL, NULL),
(5, 'Teacher', 'this is Teacher', 'this is Teacher', 'this is Teacher', NULL, NULL),
(6, 'Super Administrators', '', 'none', '[\"staticPages.addPage\",\"academicyears.addAcademicyear\",\"academicyears.editAcademicYears\",\"academicyears.delAcademicYears\",\"staticPages.editPage\",\"staticPages.delPage\",\"Administrators.addAdministrator\",\"Administrators.editAdministrator\",\"Administrators.delAdministrator\",\"AccountSettings.ChgProfileData\",\"AccountSettings.chgEmailAddress\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"dbExport.dbExport\",\"sections.addSection\",\"sections.editSection\",\"sections.delSection\",\"Subjects.editSubject\",\"Subjects.delSubject\",\"adminTasks.globalSettings\",\"adminTasks.mailSmsSettings\",\"adminTasks.frontendCMS\",\"adminTasks.bioItegration\",\"adminTasks.activatedModules\",\"adminTasks.paymentsSettings\",\"adminTasks.mobileSettings\",\"adminTasks.lookFeel\",\"adminTasks.vacationSettings\",\"Languages.addLanguage\",\"Languages.editLanguage\",\"Languages.delLanguage\",\"newsboard.View\",\"events.View\",\"frontendCMSpages.addPage\",\"frontendCMSpages.editPage\",\"frontendCMSpages.delPage\",\"mediaCenter.View\",\"mediaCenter.delAlbum\",\"mediaCenter.delMedia\",\"mediaCenter.editMedia\",\"roles.add_role\",\"roles.modify_role\",\"roles.delete_role\",\"gradeLevels.addLevel\",\"gradeLevels.editGrade\",\"gradeLevels.delGradeLevel\",\"Promotion.promoteStudents\",\"mailsms.mailSMSSend\",\"mailsms.mailsmsTemplates\",\"FeeDiscount.addFeeDiscount\",\"FeeDiscount.editFeeDiscount\",\"FeeDiscount.assignUser\",\"Invoices.dueInvoices\",\"Invoices.addPayment\",\"Invoices.editPayment\",\"Invoices.View\",\"Invoices.delPayment\",\"Assignments.Download\",\"studyMaterial.addMaterial\",\"studyMaterial.Download\",\"Homework.addHomework\",\"Homework.editHomework\",\"Homework.View\",\"Homework.Answers\",\"Payroll.makeUsrPayment\",\"Payroll.salaryBase\",\"Payroll.hourSalary\",\"Payroll.delUsrPayment\",\"Payroll.userSalary\",\"classSch.editSch\",\"classSch.delSch\",\"parents.AddParent\",\"teachers.addTeacher\",\"examsList.addExam\",\"examsList.examDetailsNot\",\"examsList.showMarks\",\"dashboard.stats\",\"wel_office_cat.list\",\"wel_office_cat.edit_cat\",\"wel_office_cat.del_cat\",\"wel_office_cat.add_cat\",\"parents.list\",\"parents.delParent\",\"parents.Export\",\"parents.Approve\",\"parents.Import\",\"parents.editParent\",\"visitors.list\",\"visitors.edit_vis\",\"visitors.del_vis\",\"visitors.add_vis\",\"visitors.Download\",\"visitors.Export\",\"phn_calls.list\",\"phn_calls.edit_call\",\"phn_calls.View\",\"phn_calls.del_call\",\"phn_calls.Export\",\"phn_calls.add_call\",\"postal.list\",\"postal.del_postal\",\"postal.Download\",\"postal.add_postal\",\"postal.Export\",\"postal.edit_postal\",\"con_mess.list\",\"con_mess.Export\",\"con_mess.del_mess\",\"classSch.list\",\"trans_vehicles.list\",\"trans_vehicles.del_vehicle\",\"trans_vehicles.add_vehicle\",\"trans_vehicles.edit_vehicle\",\"teachers.EditTeacher\",\"teachers.teacLeaderBoard\",\"teachers.Export\",\"teachers.Approve\",\"teachers.list\",\"teachers.delTeacher\",\"teachers.Import\",\"Transportation.members\",\"Transportation.list\",\"Transportation.delTrans\",\"Transportation.addTransport\",\"Transportation.editTransport\",\"Hostel.HostelCat\",\"Hostel.EditHostel\",\"Hostel.listSubs\",\"Hostel.AddHostel\",\"Hostel.delHostel\",\"Hostel.list\",\"depart.list\",\"depart.del_depart\",\"depart.add_depart\",\"depart.edit_depart\",\"desig.list\",\"desig.del_desig\",\"desig.add_desig\",\"desig.edit_desig\",\"employees.list\",\"employees.delEmployee\",\"employees.addEmployee\",\"employees.editEmployee\",\"examsList.controlMarksExam\",\"examsList.delExam\",\"examsList.View\",\"examsList.list\",\"examsList.editExam\",\"enquiries.list\",\"enquiries.edit_enq\",\"enquiries.Export\",\"enquiries.del_enq\",\"enquiries.add_enq\",\"enquiries.Download\",\"complaints.edit_complaint\",\"complaints.list\",\"complaints.Export\",\"complaints.del_complaint\",\"complaints.Download\",\"complaints.add_complaint\",\"inv_cat.list\",\"inv_cat.del_cat\",\"inv_cat.add_cat\",\"inv_cat.edit_cat\",\"suppliers.list\",\"suppliers.del_supp\",\"suppliers.add_supp\",\"suppliers.edit_supp\",\"suppliers.Export\",\"stores.list\",\"stores.del_store\",\"stores.add_store\",\"stores.edit_store\",\"items_code.list\",\"items_code.del_item\",\"items_code.Export\",\"items_code.add_item\",\"items_code.edit_item\",\"items_stock.list\",\"items_stock.del_item\",\"items_stock.Download\",\"items_stock.add_item\",\"items_stock.edit_item\",\"items_stock.Export\",\"iss_ret.list\",\"iss_ret.del_item\",\"iss_ret.Download\",\"iss_ret.issue_item\",\"iss_ret.edit_item\",\"iss_ret.Export\",\"FeeAllocation.list\",\"FeeAllocation.delFeeAllocation\",\"FeeAllocation.addFeeAllocation\",\"FeeAllocation.editFeeAllocation\",\"onlineExams.QuestionsArch\",\"onlineExams.delExam\",\"onlineExams.list\",\"onlineExams.takeExam\",\"onlineExams.addExam\",\"onlineExams.editExam\",\"onlineExams.showMarks\",\"issue_book.list\",\"issue_book.del_issue\",\"issue_book.add_issue\",\"issue_book.Export\",\"issue_book.edit_issue\",\"issue_book.book_return\",\"Library.mngSub\",\"Library.addBook\",\"Library.Download\",\"Library.delLibrary\",\"Library.list\",\"Expenses.list\",\"Expenses.delExpense\",\"Expenses.addExpense\",\"Expenses.expCategory\",\"Expenses.editExpense\",\"Vacation.reqVacation\",\"Vacation.appVacation\",\"Vacation.myVacation\",\"Attendance.takeAttendance\",\"Attendance.attReport\",\"Administrators.list\",\"Assignments.list\",\"Assignments.delAssignment\",\"Assignments.AddAssignments\",\"Assignments.viewAnswers\",\"Assignments.editAssignment\",\"Assignments.applyAssAnswer\",\"Dormitories.editDorm\",\"Dormitories.addDormitories\",\"Dormitories.list\",\"Dormitories.delDorm\",\"FeeDiscount.list\",\"FeeDiscount.delFeeDiscount\",\"FeeGroups.list\",\"FeeGroups.delFeeGroup\",\"FeeGroups.addFeeGroup\",\"FeeGroups.editFeeGroup\",\"FeeTypes.editFeeType\",\"FeeTypes.delFeeType\",\"FeeTypes.list\",\"FeeTypes.addFeeType\",\"Homework.Download\",\"Homework.delHomework\",\"Homework.list\",\"Incomes.addIncome\",\"Incomes.delIncome\",\"Incomes.list\",\"Incomes.editIncome\",\"Incomes.incomeCategory\",\"Invoices.Export\",\"Invoices.collInvoice\",\"Invoices.payRevert\",\"Invoices.list\",\"Languages.list\",\"Polls.editPoll\",\"Polls.addPoll\",\"Polls.list\",\"Polls.delPoll\",\"Subjects.list\",\"Subjects.addSubject\",\"academicyears.list\",\"classes.list\",\"events.addEvent\",\"events.delEvent\",\"events.editEvent\",\"events.list\",\"frontendCMSpages.list\",\"gradeLevels.list\",\"mediaCenter.addAlbum\",\"mediaCenter.addMedia\",\"mediaCenter.editAlbum\",\"newsboard.list\",\"newsboard.editNews\",\"newsboard.delNews\",\"newsboard.addNews\",\"roles.list\",\"sections.list\",\"staffAttendance.takeAttendance\",\"staffAttendance.attReport\",\"staticPages.list\",\"studyMaterial.list\",\"studyMaterial.delMaterial\",\"studyMaterial.editMaterial\",\"Reports.Reports\",\"classSch.addSch\",\"classes.delClass\",\"classes.addClass\",\"classes.editClass\",\"complaints.View\",\"enquiries.View\",\"visitors.View\",\"con_mess.View\",\"Certificates.list\",\"Certificates.del_cert\",\"Certificates.add_cert\",\"Certificates.edit_cert\",\"mobileNotifications.sendNewNotification\",\"students.list\",\"students.stdLeaderBoard\",\"students.Attendance\",\"students.delStudent\",\"students.std_cat\",\"students.Marksheet\",\"students.Import\",\"students.listGradStd\",\"students.admission\",\"students.editStudent\",\"students.Approve\",\"students.Export\",\"students.medHistory\",\"Messages.list\",\"Messages.r_12\",\"Library.editBook\",\"Messages.r_1\",\"Messages.r_10\",\"Messages.r_4\",\"Messages.r_13\",\"Messages.r_7\",\"Messages.r_3\",\"Messages.r_9\",\"Messages.r_8\",\"Messages.r_11\",\"Messages.r_2\",\"Messages.r_5\",\"dashboard.Profile\",\"dashboard.celebBirthday\",\"dashboard.studentLeaderboard\",\"dashboard.teacherLeaderboard\",\"dashboard.quicklinks\",\"dashboard.Calendar\",\"Payroll.MyPayroll\",\"id_cards.list\",\"id_cards.add_card\",\"id_cards.del_card\",\"id_cards.edit_card\",\"Meetings.addMeeting\",\"Meetings.list\",\"Meetings.delMeet\",\"Meetings.editMeeting\",\"vclassSch.addSch\",\"vclassSch.delSch\",\"vclassSch.editSch\",\"vclassSch.list\"]', NULL, NULL),
(7, 'Manager', '', 'none', '[\"staticPages.addPage\",\"academicyears.addAcademicyear\",\"academicyears.editAcademicYears\",\"academicyears.delAcademicYears\",\"staticPages.editPage\",\"staticPages.delPage\",\"AccountSettings.ChgProfileData\",\"AccountSettings.chgEmailAddress\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"classes.addClass\",\"classes.editClass\",\"classes.delClass\",\"sections.addSection\",\"sections.editSection\",\"sections.delSection\",\"Subjects.editSubject\",\"Subjects.delSubject\",\"newsboard.View\",\"events.View\",\"mediaCenter.View\",\"mediaCenter.delAlbum\",\"mediaCenter.delMedia\",\"mediaCenter.editMedia\",\"gradeLevels.addLevel\",\"gradeLevels.editGrade\",\"gradeLevels.delGradeLevel\",\"Promotion.promoteStudents\",\"mailsms.mailSMSSend\",\"mailsms.mailsmsTemplates\",\"FeeDiscount.addFeeDiscount\",\"FeeDiscount.editFeeDiscount\",\"FeeDiscount.assignUser\",\"Assignments.Download\",\"studyMaterial.addMaterial\",\"studyMaterial.Download\",\"Homework.addHomework\",\"Homework.editHomework\",\"Homework.View\",\"Homework.Answers\",\"classSch.addSch\",\"classSch.editSch\",\"classSch.delSch\",\"parents.AddParent\",\"teachers.addTeacher\",\"examsList.addExam\",\"examsList.examDetailsNot\",\"examsList.showMarks\",\"dashboard.stats\",\"wel_office_cat.list\",\"wel_office_cat.edit_cat\",\"wel_office_cat.del_cat\",\"wel_office_cat.add_cat\",\"students.list\",\"students.delStudent\",\"students.stdLeaderBoard\",\"students.Attendance\",\"students.Marksheet\",\"students.Import\",\"students.listGradStd\",\"students.editStudent\",\"students.Approve\",\"students.Export\",\"students.medHistory\",\"parents.list\",\"parents.delParent\",\"parents.Export\",\"parents.Approve\",\"parents.Import\",\"parents.editParent\",\"visitors.list\",\"visitors.edit_vis\",\"visitors.View\",\"visitors.del_vis\",\"visitors.add_vis\",\"visitors.Download\",\"visitors.Export\",\"phn_calls.list\",\"phn_calls.edit_call\",\"phn_calls.View\",\"phn_calls.del_call\",\"phn_calls.Export\",\"phn_calls.add_call\",\"postal.list\",\"postal.del_postal\",\"postal.Download\",\"postal.add_postal\",\"postal.Export\",\"postal.edit_postal\",\"con_mess.list\",\"con_mess.Export\",\"con_mess.View\",\"con_mess.del_mess\",\"classSch.list\",\"trans_vehicles.list\",\"trans_vehicles.del_vehicle\",\"trans_vehicles.add_vehicle\",\"trans_vehicles.edit_vehicle\",\"teachers.EditTeacher\",\"teachers.teacLeaderBoard\",\"teachers.Export\",\"teachers.Approve\",\"teachers.list\",\"teachers.delTeacher\",\"teachers.Import\",\"depart.list\",\"depart.del_depart\",\"depart.add_depart\",\"depart.edit_depart\",\"desig.list\",\"desig.del_desig\",\"desig.add_desig\",\"desig.edit_desig\",\"employees.list\",\"employees.delEmployee\",\"employees.addEmployee\",\"employees.editEmployee\",\"examsList.controlMarksExam\",\"examsList.delExam\",\"examsList.View\",\"examsList.list\",\"examsList.editExam\",\"enquiries.list\",\"enquiries.edit_enq\",\"enquiries.Export\",\"enquiries.del_enq\",\"enquiries.View\",\"enquiries.add_enq\",\"enquiries.Download\",\"complaints.edit_complaint\",\"complaints.list\",\"complaints.Export\",\"complaints.del_complaint\",\"complaints.View\",\"complaints.Download\",\"complaints.add_complaint\",\"suppliers.list\",\"suppliers.del_supp\",\"suppliers.add_supp\",\"suppliers.edit_supp\",\"suppliers.Export\",\"stores.list\",\"stores.del_store\",\"stores.add_store\",\"stores.edit_store\",\"items_code.list\",\"items_code.del_item\",\"items_code.Export\",\"items_code.add_item\",\"items_code.edit_item\",\"items_stock.list\",\"items_stock.del_item\",\"items_stock.Download\",\"items_stock.add_item\",\"items_stock.edit_item\",\"items_stock.Export\",\"iss_ret.list\",\"iss_ret.del_item\",\"iss_ret.Download\",\"iss_ret.issue_item\",\"iss_ret.edit_item\",\"iss_ret.Export\",\"FeeAllocation.list\",\"FeeAllocation.delFeeAllocation\",\"FeeAllocation.addFeeAllocation\",\"FeeAllocation.editFeeAllocation\",\"onlineExams.QuestionsArch\",\"onlineExams.delExam\",\"onlineExams.list\",\"onlineExams.takeExam\",\"onlineExams.addExam\",\"onlineExams.editExam\",\"onlineExams.showMarks\",\"issue_book.list\",\"issue_book.del_issue\",\"issue_book.add_issue\",\"issue_book.Export\",\"issue_book.edit_issue\",\"issue_book.book_return\",\"Library.mngSub\",\"Library.editBook\",\"Library.addBook\",\"Library.Download\",\"Library.delLibrary\",\"Library.list\",\"students.std_cat\",\"students.admission\",\"Expenses.list\",\"Expenses.delExpense\",\"Expenses.addExpense\",\"Expenses.expCategory\",\"Expenses.editExpense\",\"Vacation.reqVacation\",\"Vacation.appVacation\",\"Vacation.myVacation\",\"Attendance.takeAttendance\",\"Attendance.attReport\",\"Assignments.list\",\"Assignments.delAssignment\",\"Assignments.AddAssignments\",\"Assignments.viewAnswers\",\"Assignments.editAssignment\",\"Assignments.applyAssAnswer\",\"Dormitories.editDorm\",\"Dormitories.addDormitories\",\"Dormitories.list\",\"Dormitories.delDorm\",\"FeeDiscount.list\",\"FeeDiscount.delFeeDiscount\",\"FeeGroups.list\",\"FeeGroups.delFeeGroup\",\"FeeGroups.addFeeGroup\",\"FeeGroups.editFeeGroup\",\"FeeTypes.editFeeType\",\"FeeTypes.delFeeType\",\"FeeTypes.list\",\"FeeTypes.addFeeType\",\"Homework.Download\",\"Homework.delHomework\",\"Homework.list\",\"Polls.editPoll\",\"Polls.addPoll\",\"Polls.list\",\"Polls.delPoll\",\"Subjects.list\",\"Subjects.addSubject\",\"academicyears.list\",\"classes.list\",\"events.addEvent\",\"events.delEvent\",\"events.editEvent\",\"events.list\",\"gradeLevels.list\",\"mediaCenter.addAlbum\",\"mediaCenter.addMedia\",\"mediaCenter.editAlbum\",\"mobileNotifications.sendNewNotification\",\"newsboard.list\",\"newsboard.editNews\",\"newsboard.delNews\",\"newsboard.addNews\",\"sections.list\",\"staffAttendance.takeAttendance\",\"staffAttendance.attReport\",\"staticPages.list\",\"studyMaterial.list\",\"studyMaterial.delMaterial\",\"studyMaterial.editMaterial\",\"Reports.Reports\",\"Certificates.list\",\"Certificates.del_cert\",\"Certificates.add_cert\",\"Certificates.edit_cert\",\"Meetings.list\",\"Meetings.addMeeting\",\"Meetings.delMeet\",\"Meetings.editMeeting\"]', NULL, NULL),
(8, 'Principal', '', 'none', '[\"staticPages.addPage\",\"academicyears.addAcademicyear\",\"academicyears.editAcademicYears\",\"academicyears.delAcademicYears\",\"staticPages.editPage\",\"staticPages.delPage\",\"AccountSettings.ChgProfileData\",\"AccountSettings.chgEmailAddress\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"classes.addClass\",\"classes.editClass\",\"classes.delClass\",\"sections.addSection\",\"sections.editSection\",\"sections.delSection\",\"Subjects.editSubject\",\"Subjects.delSubject\",\"newsboard.View\",\"events.View\",\"frontendCMSpages.addPage\",\"frontendCMSpages.editPage\",\"frontendCMSpages.delPage\",\"mediaCenter.View\",\"mediaCenter.delAlbum\",\"mediaCenter.delMedia\",\"mediaCenter.editMedia\",\"gradeLevels.addLevel\",\"gradeLevels.editGrade\",\"gradeLevels.delGradeLevel\",\"Promotion.promoteStudents\",\"mailsms.mailSMSSend\",\"mailsms.mailsmsTemplates\",\"FeeDiscount.addFeeDiscount\",\"FeeDiscount.editFeeDiscount\",\"FeeDiscount.assignUser\",\"Invoices.dueInvoices\",\"Invoices.addPayment\",\"Invoices.editPayment\",\"Invoices.View\",\"Invoices.delPayment\",\"Assignments.Download\",\"studyMaterial.addMaterial\",\"studyMaterial.Download\",\"Homework.addHomework\",\"Homework.editHomework\",\"Homework.View\",\"Homework.Answers\",\"Payroll.makeUsrPayment\",\"Payroll.salaryBase\",\"Payroll.hourSalary\",\"Payroll.delUsrPayment\",\"Payroll.userSalary\",\"classSch.addSch\",\"classSch.editSch\",\"classSch.delSch\",\"parents.AddParent\",\"teachers.addTeacher\",\"examsList.addExam\",\"examsList.examDetailsNot\",\"examsList.showMarks\",\"dashboard.stats\",\"wel_office_cat.list\",\"wel_office_cat.edit_cat\",\"wel_office_cat.del_cat\",\"wel_office_cat.add_cat\",\"students.list\",\"students.delStudent\",\"students.stdLeaderBoard\",\"students.Attendance\",\"students.Marksheet\",\"students.Import\",\"students.listGradStd\",\"students.editStudent\",\"students.Approve\",\"students.Export\",\"students.medHistory\",\"parents.list\",\"parents.delParent\",\"parents.Export\",\"parents.Approve\",\"parents.Import\",\"parents.editParent\",\"visitors.list\",\"visitors.edit_vis\",\"visitors.View\",\"visitors.del_vis\",\"visitors.add_vis\",\"visitors.Download\",\"visitors.Export\",\"phn_calls.list\",\"phn_calls.edit_call\",\"phn_calls.View\",\"phn_calls.del_call\",\"phn_calls.Export\",\"phn_calls.add_call\",\"postal.list\",\"postal.del_postal\",\"postal.Download\",\"postal.add_postal\",\"postal.Export\",\"postal.edit_postal\",\"con_mess.list\",\"con_mess.Export\",\"con_mess.View\",\"con_mess.del_mess\",\"classSch.list\",\"trans_vehicles.list\",\"trans_vehicles.del_vehicle\",\"trans_vehicles.add_vehicle\",\"trans_vehicles.edit_vehicle\",\"teachers.EditTeacher\",\"teachers.teacLeaderBoard\",\"teachers.Export\",\"teachers.Approve\",\"teachers.list\",\"teachers.delTeacher\",\"teachers.Import\",\"Transportation.members\",\"Transportation.list\",\"Transportation.delTrans\",\"Transportation.addTransport\",\"Transportation.editTransport\",\"Hostel.HostelCat\",\"Hostel.EditHostel\",\"Hostel.listSubs\",\"Hostel.AddHostel\",\"Hostel.delHostel\",\"Hostel.list\",\"depart.list\",\"depart.del_depart\",\"depart.add_depart\",\"depart.edit_depart\",\"desig.list\",\"desig.del_desig\",\"desig.add_desig\",\"desig.edit_desig\",\"employees.list\",\"employees.delEmployee\",\"employees.addEmployee\",\"employees.editEmployee\",\"examsList.controlMarksExam\",\"examsList.delExam\",\"examsList.View\",\"examsList.list\",\"examsList.editExam\",\"enquiries.list\",\"enquiries.edit_enq\",\"enquiries.Export\",\"enquiries.del_enq\",\"enquiries.View\",\"enquiries.add_enq\",\"enquiries.Download\",\"complaints.edit_complaint\",\"complaints.list\",\"complaints.Export\",\"complaints.del_complaint\",\"complaints.View\",\"complaints.Download\",\"complaints.add_complaint\",\"inv_cat.list\",\"inv_cat.del_cat\",\"inv_cat.add_cat\",\"inv_cat.edit_cat\",\"suppliers.list\",\"suppliers.del_supp\",\"suppliers.add_supp\",\"suppliers.edit_supp\",\"suppliers.Export\",\"stores.list\",\"stores.del_store\",\"stores.add_store\",\"stores.edit_store\",\"items_code.list\",\"items_code.del_item\",\"items_code.Export\",\"items_code.add_item\",\"items_code.edit_item\",\"items_stock.list\",\"items_stock.del_item\",\"items_stock.Download\",\"items_stock.add_item\",\"items_stock.edit_item\",\"items_stock.Export\",\"iss_ret.list\",\"iss_ret.del_item\",\"iss_ret.Download\",\"iss_ret.issue_item\",\"iss_ret.edit_item\",\"iss_ret.Export\",\"FeeAllocation.list\",\"FeeAllocation.delFeeAllocation\",\"FeeAllocation.addFeeAllocation\",\"FeeAllocation.editFeeAllocation\",\"onlineExams.QuestionsArch\",\"onlineExams.delExam\",\"onlineExams.list\",\"onlineExams.takeExam\",\"onlineExams.addExam\",\"onlineExams.editExam\",\"onlineExams.showMarks\",\"issue_book.list\",\"issue_book.del_issue\",\"issue_book.add_issue\",\"issue_book.Export\",\"issue_book.edit_issue\",\"issue_book.book_return\",\"Library.mngSub\",\"Library.editBook\",\"Library.addBook\",\"Library.Download\",\"Library.delLibrary\",\"Library.list\",\"students.std_cat\",\"students.admission\",\"Expenses.list\",\"Expenses.delExpense\",\"Expenses.addExpense\",\"Expenses.expCategory\",\"Expenses.editExpense\",\"Vacation.reqVacation\",\"Vacation.appVacation\",\"Vacation.myVacation\",\"Attendance.takeAttendance\",\"Attendance.attReport\",\"Assignments.list\",\"Assignments.delAssignment\",\"Assignments.AddAssignments\",\"Assignments.viewAnswers\",\"Assignments.editAssignment\",\"Assignments.applyAssAnswer\",\"Dormitories.editDorm\",\"Dormitories.addDormitories\",\"Dormitories.list\",\"Dormitories.delDorm\",\"FeeDiscount.list\",\"FeeDiscount.delFeeDiscount\",\"FeeGroups.list\",\"FeeGroups.delFeeGroup\",\"FeeGroups.addFeeGroup\",\"FeeGroups.editFeeGroup\",\"FeeTypes.editFeeType\",\"FeeTypes.delFeeType\",\"FeeTypes.list\",\"FeeTypes.addFeeType\",\"Homework.Download\",\"Homework.delHomework\",\"Homework.list\",\"Incomes.addIncome\",\"Incomes.delIncome\",\"Incomes.list\",\"Incomes.editIncome\",\"Incomes.incomeCategory\",\"Invoices.Export\",\"Invoices.collInvoice\",\"Invoices.payRevert\",\"Invoices.list\",\"Polls.editPoll\",\"Polls.addPoll\",\"Polls.list\",\"Polls.delPoll\",\"Subjects.list\",\"Subjects.addSubject\",\"academicyears.list\",\"classes.list\",\"events.addEvent\",\"events.delEvent\",\"events.editEvent\",\"events.list\",\"frontendCMSpages.list\",\"gradeLevels.list\",\"mediaCenter.addAlbum\",\"mediaCenter.addMedia\",\"mediaCenter.editAlbum\",\"mobileNotifications.sendNewNotification\",\"newsboard.list\",\"newsboard.editNews\",\"newsboard.delNews\",\"newsboard.addNews\",\"sections.list\",\"staffAttendance.takeAttendance\",\"staffAttendance.attReport\",\"staticPages.list\",\"studyMaterial.list\",\"studyMaterial.delMaterial\",\"studyMaterial.editMaterial\",\"Reports.Reports\",\"Certificates.list\",\"Certificates.del_cert\",\"Certificates.add_cert\",\"Certificates.edit_cert\",\"Meetings.list\",\"Meetings.delMeet\",\"Meetings.addMeeting\",\"Meetings.editMeeting\"]', NULL, NULL),
(9, 'Accountant', '', 'none', '[\"staticPages.View\",\"staticPages.list\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"AccountSettings.ChgProfileData\",\"AccountSettings.Messages\",\"AccountSettings.chgEmailAddress\",\"Expenses.list\",\"Expenses.delExpense\",\"Expenses.addExpense\",\"Expenses.expCategory\",\"Expenses.editExpense\",\"FeeAllocation.editFeeAllocation\",\"FeeAllocation.addFeeAllocation\",\"FeeAllocation.list\",\"FeeAllocation.delFeeAllocation\",\"FeeDiscount.list\",\"FeeDiscount.delFeeDiscount\",\"FeeDiscount.addFeeDiscount\",\"FeeDiscount.assignUser\",\"FeeDiscount.editFeeDiscount\",\"FeeGroups.list\",\"FeeGroups.delFeeGroup\",\"FeeTypes.list\",\"FeeTypes.delFeeType\",\"FeeTypes.addFeeType\",\"FeeGroups.addFeeGroup\",\"FeeGroups.editFeeGroup\",\"FeeTypes.editFeeType\",\"Incomes.list\",\"Incomes.delIncome\",\"Incomes.addIncome\",\"Incomes.incomeCategory\",\"Incomes.editIncome\",\"Invoices.addPayment\",\"Invoices.collInvoice\",\"Invoices.Export\",\"Invoices.dueInvoices\",\"Invoices.delPayment\",\"Invoices.View\",\"Invoices.list\",\"Invoices.payRevert\",\"Invoices.editPayment\",\"dashboard.stats\",\"newsboard.list\",\"events.list\"]', NULL, NULL),
(10, 'Librarian', '', 'none', '[\"staticPages.View\",\"staticPages.list\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"AccountSettings.ChgProfileData\",\"AccountSettings.Messages\",\"AccountSettings.chgEmailAddress\",\"dashboard.stats\",\"newsboard.list\",\"events.list\",\"Library.list\",\"Library.delLibrary\",\"Library.addBook\",\"Library.Download\",\"Library.editBook\",\"Library.mngSub\",\"issue_book.list\",\"issue_book.del_issue\",\"issue_book.add_issue\",\"issue_book.Export\",\"issue_book.edit_issue\",\"issue_book.book_return\"]', NULL, NULL),
(11, 'HR', '', 'none', '[\"staticPages.View\",\"staticPages.list\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"AccountSettings.ChgProfileData\",\"AccountSettings.Messages\",\"AccountSettings.chgEmailAddress\",\"dashboard.stats\",\"newsboard.list\",\"events.list\",\"Attendance.attReport\",\"Attendance.takeAttendance\",\"staffAttendance.attReport\",\"staffAttendance.takeAttendance\",\"Vacation.appVacation\",\"employees.list\",\"employees.addEmployee\",\"employees.editEmployee\",\"employees.delEmployee\",\"enquiries.list\",\"enquiries.edit_enq\",\"enquiries.Export\",\"enquiries.View\",\"enquiries.del_enq\",\"enquiries.Download\",\"enquiries.add_enq\",\"complaints.add_complaint\",\"complaints.Download\",\"complaints.del_complaint\",\"complaints.View\",\"complaints.edit_complaint\",\"complaints.list\",\"complaints.Export\",\"Payroll.makeUsrPayment\",\"Payroll.salaryBase\",\"Payroll.delUsrPayment\",\"Payroll.hourSalary\",\"Payroll.userSalary\"]', NULL, NULL),
(12, 'Receptionist', '', 'none', '[\"staticPages.View\",\"staticPages.list\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"AccountSettings.ChgProfileData\",\"AccountSettings.Messages\",\"AccountSettings.chgEmailAddress\",\"dashboard.stats\",\"newsboard.list\",\"events.list\",\"visitors.list\",\"visitors.edit_vis\",\"visitors.Export\",\"visitors.del_vis\",\"visitors.View\",\"visitors.add_vis\",\"visitors.Download\",\"phn_calls.list\",\"phn_calls.edit_call\",\"phn_calls.View\",\"phn_calls.del_call\",\"phn_calls.add_call\",\"phn_calls.Export\",\"postal.Export\",\"postal.edit_postal\",\"postal.add_postal\",\"postal.Download\",\"postal.del_postal\",\"postal.list\",\"con_mess.list\",\"con_mess.Export\",\"con_mess.View\",\"con_mess.del_mess\",\"enquiries.add_enq\",\"enquiries.Download\",\"enquiries.del_enq\",\"enquiries.View\",\"enquiries.list\",\"enquiries.edit_enq\",\"enquiries.Export\",\"complaints.list\",\"complaints.edit_complaint\",\"complaints.Export\",\"complaints.del_complaint\",\"complaints.View\",\"complaints.add_complaint\",\"complaints.Download\"]', NULL, NULL),
(13, 'Store Keeper', '', 'none', '[\"staticPages.View\",\"staticPages.list\",\"AccountSettings.myInvoices\",\"AccountSettings.chgPassword\",\"AccountSettings.ChgProfileData\",\"AccountSettings.Messages\",\"AccountSettings.chgEmailAddress\",\"dashboard.stats\",\"newsboard.list\",\"events.list\",\"stores.list\",\"stores.del_store\",\"stores.add_store\",\"stores.edit_store\",\"items_code.list\",\"items_code.del_item\",\"items_code.add_item\",\"items_code.Export\",\"items_code.edit_item\",\"items_stock.edit_item\",\"items_stock.Export\",\"items_stock.Download\",\"items_stock.add_item\",\"items_stock.list\",\"items_stock.del_item\",\"iss_ret.del_item\",\"iss_ret.list\",\"iss_ret.issue_item\",\"iss_ret.Download\",\"iss_ret.edit_item\",\"inv_cat.edit_cat\",\"iss_ret.Export\",\"inv_cat.add_cat\",\"inv_cat.list\",\"inv_cat.del_cat\",\"suppliers.list\",\"suppliers.del_supp\",\"suppliers.add_supp\",\"suppliers.edit_supp\",\"suppliers.Export\"]', NULL, NULL),
(14, 'Notification Sender', '', 'none', '[\"mobileNotifications.sendNewNotification\",\"mailsms.mailSMSSend\",\"mailsms.mailsmsTemplates\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sectionName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sectionTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`, `sectionTitle`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'KG1/1E', 'KG 1 Section 1', 1, NULL, NULL),
(2, 'KG1/2E', 'KG 1 Section 2', 1, NULL, NULL),
(3, 'KG1/3E', 'KG 1 Section 3', 1, NULL, NULL),
(4, 'KG1/4E', 'KG 1 Section 4', 1, NULL, NULL),
(5, 'KG1/5E', 'KG 1 Section 5', 1, NULL, NULL),
(6, 'KG2/1E', 'KG 2 Section 1', 2, NULL, NULL),
(7, 'KG2/2E', 'KG 2 Section 2', 2, NULL, NULL),
(8, 'KG2/3E', 'KG 2 Section 3', 2, NULL, NULL),
(9, 'KG2/4E', 'KG 2 Section 4', 2, NULL, NULL),
(10, 'KG2/5E', 'KG 2 Section 5', 2, NULL, NULL),
(11, 'KG2/6E', 'KG 2 Section 6', 2, NULL, NULL),
(12, 'KG2/7E', 'KG 2 Section 7', 2, NULL, NULL),
(13, 'Prep1/1E', 'Prep 1 Section 1', 9, NULL, NULL),
(14, 'Prep1/2E', 'Prep 1 Section 2', 9, NULL, NULL),
(15, 'Prep1/3E', 'Prep 1 Section 3', 9, NULL, NULL),
(16, 'Prep1/4E', 'Prep 1 Section 4', 9, NULL, NULL),
(17, 'Prep1/5E', 'Prep 1 Section 5', 9, NULL, NULL),
(18, 'Prep2/1E', 'Prep 2 Section 1', 10, NULL, NULL),
(19, 'Prep2/2E', 'Prep 2 Section 2', 10, NULL, NULL),
(20, 'Prep2/3E', 'Prep 2 Section 3', 10, NULL, NULL),
(21, 'Prep2/4E', 'Prep 2 Section 4', 10, NULL, NULL),
(22, 'Prep2/5E', 'Prep 2 Section 5', 10, NULL, NULL),
(23, 'Prep3/1E', 'Prep 3 Section 1', 11, NULL, NULL),
(24, 'Prep3/2E', 'Prep 3 Section 2', 11, NULL, NULL),
(25, 'Prep3/3E', 'Prep 3 Section 3', 11, NULL, NULL),
(26, 'Prep3/4E', 'Prep 3 Section 4', 11, NULL, NULL),
(27, 'Prim1/1E', 'Prim 1 Section 1', 3, NULL, NULL),
(28, 'Prim1/2E', 'Prim 1 Section 2', 3, NULL, NULL),
(29, 'Prim1/3E', 'Prim 1 Section 3', 3, NULL, NULL),
(30, 'Prim1/4E', 'Prim 1 Section 4', 3, NULL, NULL),
(31, 'Prim1/5E', 'Prim 1 Section 5', 3, NULL, NULL),
(32, 'Prim2/1E', 'Prim 2 Section 1', 4, NULL, NULL),
(33, 'Prim2/2E', 'Prim 2 Section 2', 4, NULL, NULL),
(34, 'Prim2/3E', 'Prim 2 Section 3', 4, NULL, NULL),
(35, 'Prim2/4E', 'Prim 2 Section 4', 4, NULL, NULL),
(36, 'Prim2/5E', 'Prim 2 Section 5', 4, NULL, NULL),
(37, 'Prim3/1E', 'Prim 3 Section 1', 5, NULL, NULL),
(38, 'Prim3/2E', 'Prim 3 Section 2', 5, NULL, NULL),
(39, 'Prim3/3E', 'Prim 3 Section 3', 5, NULL, NULL),
(40, 'Prim3/4E', 'Prim 3 Section 4', 5, NULL, NULL),
(41, 'Prim4/1E', 'Prim 4 Section 1', 6, NULL, NULL),
(42, 'Prim4/2E', 'Prim 4 Section 2', 6, NULL, NULL),
(43, 'Prim4/3E', 'Prim 4 Section 3', 6, NULL, NULL),
(44, 'Prim4/4E', 'Prim 4 Section 4', 6, NULL, NULL),
(45, 'Prim4/5E', 'Prim 4 Section 5', 6, NULL, NULL),
(46, 'Prim4/6E', 'Prim 4 Section 6', 6, NULL, NULL),
(47, 'Prim5/1E', 'Prim 5 Section 1', 7, NULL, NULL),
(48, 'Prim5/2E', 'Prim 5 Section 2', 7, NULL, NULL),
(49, 'Prim5/3E', 'Prim 5 Section 3', 7, NULL, NULL),
(50, 'Prim5/4E', 'Prim 5 Section 4', 7, NULL, NULL),
(51, 'Prim6/1E', 'Prim 6 Section 1', 8, NULL, NULL),
(52, 'Prim6/2E', 'Prim 6 Section 2', 8, NULL, NULL),
(53, 'Prim6/3E', 'Prim 6 Section 3', 8, NULL, NULL),
(54, 'Prim6/4E', 'Prim 6 Section 4', 8, NULL, NULL),
(55, 'Prim6/5E', 'Prim 6 Section 5', 8, NULL, NULL),
(56, 'Prim6/6E', 'Prim 6 Section 6', 8, NULL, NULL),
(57, 'Sec1/1E', 'Sec 1 Section 1', 12, NULL, NULL),
(58, 'Sec1/2E', 'Sec 1 Section 2', 12, NULL, NULL),
(59, 'Sec1/3E', 'Sec 1 Section 3', 12, NULL, NULL),
(60, 'Sec1/4E', 'Sec 1 Section 4', 12, NULL, NULL),
(61, 'Sec2/1E', 'Sec 2 Section 1', 13, NULL, NULL),
(62, 'Sec2/2E', 'Sec 2 Section 2', 13, NULL, NULL),
(63, 'Sec2/3E', 'Sec 2 Section 3', 13, NULL, NULL),
(64, 'Sec3/1E', 'Sec 3 Section 1', 14, NULL, NULL),
(65, 'Sec3/2E', 'Sec 3 Section 2', 14, NULL, NULL),
(66, 'not', 'not', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fieldName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fieldValue` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pageTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageContent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_years`
--

CREATE TABLE `student_academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` int(11) NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_categories`
--

CREATE TABLE `student_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_docs`
--

CREATE TABLE `student_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_materials`
--

CREATE TABLE `study_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `week_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sectionId` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `material_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_file` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjectTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passGrade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finalGrade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectTitle`, `passGrade`, `finalGrade`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'English', '50', '100', 'Subjects_Images/english.png', NULL, NULL),
(2, 'Discover', '50', '100', 'Subjects_Images/discover.png', NULL, NULL),
(3, 'Arabic', '50', '100', 'Subjects_Images/arabic.png', NULL, '2021-10-31 18:19:16'),
(4, 'Islamic ', '50', '100', 'Subjects_Images/islamic.png', NULL, NULL),
(5, 'Math', '50', '100', 'Subjects_Images/math.png', NULL, NULL),
(6, 'Social Studies', '50', '100', 'Subjects_Images/social_studies.png', NULL, NULL),
(7, 'Geography', '50', '100', 'Subjects_Images/geography.png', NULL, NULL),
(8, 'Philosphy', '50', '100', 'Subjects_Images/philosophy.png', NULL, NULL),
(9, 'History', '50', '100', 'Subjects_Images/history.png', NULL, NULL),
(10, 'Science', '50', '100', 'Subjects_Images/science.png', NULL, NULL),
(11, 'Biology', '50', '100', 'Subjects_Images/biology.png', NULL, NULL),
(12, 'Chemistry', '50', '100', 'Subjects_Images/chemistry.png', NULL, '2021-10-29 15:53:23'),
(13, 'Physics', '50', '100', 'Subjects_Images/physics.png', NULL, NULL),
(14, 'French', '50', '100', 'Subjects_Images/French.png', NULL, NULL),
(15, 'German', '50', '100', 'Subjects_Images/German.png', NULL, NULL),
(16, 'Computer', '50', '100', 'Subjects_Images/computer.png', NULL, '2021-10-29 15:34:28'),
(17, 'Montessori', '50', '100', 'Subjects_Images/montessori.png', NULL, NULL),
(18, 'Art', '50', '100', 'Subjects_Images/art.png', NULL, '2021-10-27 15:44:40'),
(19, 'Psychologist', '50', '100', 'Subjects_Images/psychologist.png', NULL, NULL),
(20, 'franchsss', '50', '100', 'no', '2021-10-27 09:51:48', '2021-10-27 09:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supp_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_phone` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_mail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_per_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_per_phone` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_per_mail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supp_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(169, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transportTitle` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routeDetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicles_list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportFare` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicles`
--

CREATE TABLE `transport_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plate_number` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_color` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_model` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_photo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_license` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `department` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `studentRollId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` int(11) DEFAULT NULL,
  `std_category` int(11) DEFAULT NULL,
  `auth_session` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('male','fmale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentAcademicYear` int(11) DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentProfession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentOf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isLeaderBoard` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restoreUniqId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` int(11) NOT NULL DEFAULT 0,
  `transport_vehicle` int(11) NOT NULL DEFAULT 0,
  `hostel` int(11) DEFAULT NULL,
  `medical` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defLang` int(11) NOT NULL DEFAULT 0,
  `defTheme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_base_id` int(11) DEFAULT NULL,
  `comVia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric_id` int(11) DEFAULT NULL,
  `library_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_active` int(11) NOT NULL DEFAULT 1,
  `customPermissionsType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customPermissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoomLink` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `email_verified_at`, `fullName`, `role`, `role_id`, `class_id`, `section_id`, `active`, `department`, `designation`, `studentRollId`, `admission_number`, `admission_date`, `std_category`, `auth_session`, `birthday`, `gender`, `remember_token`, `address`, `phoneNo`, `mobileNo`, `studentAcademicYear`, `religion`, `parentProfession`, `parentOf`, `photo`, `isLeaderBoard`, `restoreUniqId`, `transport`, `transport_vehicle`, `hostel`, `medical`, `user_position`, `defLang`, `defTheme`, `salary_type`, `salary_base_id`, `comVia`, `father_info`, `mother_info`, `biometric_id`, `library_id`, `account_active`, `customPermissionsType`, `customPermissions`, `firebase_token`, `zoomLink`, `created_at`, `updated_at`) VALUES
(2, 'YOUSEF', 'youaefmohamed2@gmail.com', '$2y$10$1f4q/vDs6WhmSE1qzwVyZ.1c0Ya3LOghJqif7hiJjtrIP6bLSyr.W', NULL, NULL, NULL, 'yousef mohamed', 'admin', 3, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '1999-08-30', 'male', 'o4DowgG8nlBNqh5x6fRbbSRFcTd8ws1j2HLXa9Pni7QHjACtRjmET5rIqKX5', 'new giza', 'null', '01220001391', 2015, 'yesss', NULL, NULL, 'teacher/8CwPDSzlRdXvd5RKOFrrkHugdqLS1NQvktoBOCiS.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, '[\"SMS\",\"phone\"]', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-31 18:20:11'),
(3, 'ahmed hatemmdd', 'khaledmohreamed@gmail.com', '$2y$10$6PhFepnk3bNIArtSs9b9hOXnjwSc/9V.Dr6vPBKumfhjCjyUea2RS', NULL, NULL, NULL, 'khaled mohamedss', 'teacher', 5, 15, 66, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2021-10-14', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-6.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, '[\"Mail\",\"phone\"]', NULL, NULL, 14, NULL, 1, NULL, '', NULL, NULL, NULL, '2021-11-01 09:16:21'),
(4, 'sarah', 'sarahmohamed@gmail.com', '$2y$10$JBzXJj0/Q3tTI4waoaUpPeZGGSjjY/fBgYQXnSkW6X71Xf9nCdSuK', NULL, NULL, NULL, 'sarah mohamed', 'student', 1, 14, 65, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2021-10-12', 'fmale', NULL, 'giza', '01478526', '012555', 2015, 'yesss', NULL, NULL, 'users/user-10.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-30 19:22:00'),
(7, 'amr', 'amrmohamed@gmail.com', '1452365', NULL, NULL, NULL, 'amr mohamed', 'student', 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-18 09:16:52'),
(8, 'amr', 'amrdmohamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر محمد', 'student', 1, 1, 1, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-11', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-22 10:56:07'),
(9, 'amr', 'amoshamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 1, 3, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(10, 'amr', 'amdmohagmed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 1, 4, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(11, 'amr', 'amrdmohdamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 1, 5, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(12, 'amr', 'amrdmofhamed@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 2, 6, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-19 18:28:16'),
(13, 'amr', 'amrdmhamed@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 2, 7, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(14, 'amr', 'ahmedfathi@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 2, 8, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(15, 'amr', 'ahmedfathd@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 2, 9, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(16, 'amr', 'ahmedfathe@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 2, 10, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-22 05:27:32'),
(17, 'amr', 'ahmedsfats@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 2, 11, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(18, 'amr', 'ahmedfafdthw@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 2, 12, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-22', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(19, 'amr', 'ahmedfweathi@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 9, 13, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(20, 'amr', 'ahmedfassthd@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 9, 14, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(21, 'amr', 'ahmedfeeathe@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 9, 15, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(22, 'amr', 'amedfats@gmail.com', '1452365', NULL, NULL, NULL, 'سلمي محمد', 'student', 1, 9, 16, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-22 10:56:40'),
(23, 'amr', 'hmedfathw@gmail.com', '1452365', NULL, NULL, NULL, 'غاده محمد', 'student', 1, 9, 17, 0, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-22 10:58:10'),
(24, 'amr', 'qamrdmohamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر محمد', 'student', 1, 10, 18, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(25, 'amr', 'wamoshamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 10, 19, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(26, 'amr', 'samrdmohdamed@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 10, 20, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(27, 'amr', 'cdamrdmofhamed@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 10, 21, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(28, 'amr', 'aamrdmhamed@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 10, 22, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(29, 'amr', 'wahmedfathi@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 11, 23, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(30, 'amr', 'fahmeddfathd@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 11, 24, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(31, 'amr', 'ahmewdfathe@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 11, 25, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(32, 'amr', 'aehmedsfats@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 11, 26, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(33, 'amr', 'arhmedfafdthw@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 3, 27, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(34, 'amr', 'ahmedfwetathi@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 3, 28, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(35, 'amr', 'ahmhedfasrsthd@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 3, 29, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(36, 'amr', 'ahmedfeeaffthe@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 3, 30, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(37, 'amr', 'amedefats@gmail.com', '1452365', NULL, NULL, NULL, 'سلمي محمد', 'student', 1, 3, 31, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(38, 'amr', 'hmedfathrrw@gmail.com', '1452365', NULL, NULL, NULL, 'غاده محمد', 'student', 1, 4, 32, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(39, 'ahmed', 'ahmed44@gmail.com', '1452365', NULL, NULL, NULL, 'ahmed', 'student', 1, 4, 33, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(40, 'hosam', 'hosam56@gmail.com', '1452365', NULL, NULL, NULL, 'hosam', 'student', 1, 4, 34, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(41, 'sl3awy', 'sl3awy742@gmail.com', '1452365', NULL, NULL, NULL, 'sl3awy', 'student', 1, 4, 35, 0, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-22 10:56:48'),
(42, 'som3aa', 'som3aa52@gmail.com', '1452365', NULL, NULL, NULL, 'som3aa', 'student', 1, 4, 36, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(161, 'wigza', 'wigza14@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 5, 37, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(162, 'smiy', 'smiy145@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 5, 38, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(163, 'sawsan', 'sawsan120@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 5, 39, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(164, '3towaa', '3towaa11@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 5, 40, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(165, 'slama', 'slama1423@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 6, 41, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(166, '3bma3bod', '3bma3bod88@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 6, 42, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-22', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(167, 'mostafa', 'mostafa77@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 6, 43, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(168, 'yasen', 'yasen002@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 6, 44, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(169, 'shrbiny', 'shrbiny44@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 6, 45, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(170, 'mohy', 'mohy22@gmail.com', '1452365', NULL, NULL, NULL, 'سلمي محمد', 'student', 1, 6, 46, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(171, '3oraby', '3oraby360@gmail.com', '1452365', NULL, NULL, NULL, 'غاده محمد', 'student', 1, 7, 47, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(172, 'hetlar', 'hetlar415@gmail.com', '1452365', NULL, NULL, NULL, 'عمر محمد', 'student', 1, 7, 48, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(173, 'ramdan', 'ramdan012@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 7, 49, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2001-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(174, 'shrkwy', 'shrkwy225@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 7, 50, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2011-10-13', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(175, '3mad', '3mad556@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 8, 51, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(176, 'sokaa', 'sokaa150@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 8, 52, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(177, 'sa3don', 'sa3don445@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 8, 53, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(178, 'salah', 'salah11@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 8, 54, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(179, 'taha', 'taham222@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 8, 55, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(180, 's3dy', 's3dy566@gmail.com', '1452365', NULL, NULL, NULL, 'طه محمد', 'student', 1, 8, 56, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(181, 'akarm', 'akarm485@gmail.com', '1452365', NULL, NULL, NULL, 'زياد محمد', 'student', 1, 12, 57, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(182, '3modaa', '3modaa45@gmail.com', '1452365', NULL, NULL, NULL, 'عمر حسين محمد', 'student', 1, 12, 58, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(183, 'heema', 'heema402@gmail.com', '1452365', NULL, NULL, NULL, 'عمر خالد محمد', 'student', 1, 12, 59, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(184, 'elkholy', 'elkholy962@gmail.com', '1452365', NULL, NULL, NULL, 'عمر  يوسف محمد', 'student', 1, 12, 60, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(185, 'amrmohmed', 'amrmohmed745@gmail.com', '1452365', NULL, NULL, NULL, 'سلمي محمد', 'student', 1, 13, 61, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(186, 'omer', 'omer450@gmail.com', '1452365', NULL, NULL, NULL, 'غاده محمد', 'student', 1, 13, 61, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(187, 'elshak', 'elshak52@gmail.com', '1452365', NULL, NULL, NULL, 'ahmed', 'student', 1, 13, 62, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(188, 'hosam', 'hosam156@gmail.com', '1452365', NULL, NULL, NULL, 'hosam', 'student', 1, 13, 63, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(189, 'sl3awy', 'sl3asswy742@gmail.com', '1452365', NULL, NULL, NULL, 'sl3awy', 'student', 1, 14, 64, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(190, 'som3aa', 'som3aaaa052@gmail.com', '1452365', NULL, NULL, NULL, 'som3aa', 'student', 1, 14, 65, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'fmale', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'users/user-5.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(197, 'hahmed', 'hahmed741@gmail.com', '$2y$10$L.e2Ry/TuVpDSwXieXosYOpnS4RJSl7iMcj0X.sg8aWpxNXGCInOG', NULL, NULL, NULL, 'khaled mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-6.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(198, 'shossam', 'shossam9654@gmail.com', '1452365', NULL, NULL, NULL, 'hossam mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-3.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(201, 'dhossam', 'dhossam4102@gmail.com', '1452365', NULL, NULL, NULL, 'hossam mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-3.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(202, 'vghada', 'vghada96@gmail.com', '$2y$10$rwL3OqI1LoKvJCl7xDPXJeDc3Hco7IqGsq7ApUSt.zODZPnkrCHwq', NULL, NULL, NULL, 'ghada mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', 'RR1RpEvQURBZ9snxOyf3x9OJzrEiSy9DfyCoJSquUvlvu0NrZW0d9mxG4lus', NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-1.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(203, 'gahmed', 'gahmed854@gmail.com', '$2y$10$L.e2Ry/TuVpDSwXieXosYOpnS4RJSl7iMcj0X.sg8aWpxNXGCInOG', NULL, NULL, NULL, 'khaled mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-6.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(204, 'bhossam', 'bhossam452@gmail.com', '1452365', NULL, NULL, NULL, 'hossam mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-3.jpg', 'ffffff', NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-31 18:58:08'),
(205, 'hghada', 'hghada102@gmail.com', '$2y$10$rwL3OqI1LoKvJCl7xDPXJeDc3Hco7IqGsq7ApUSt.zODZPnkrCHwq', NULL, NULL, NULL, 'ghada mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', 'RR1RpEvQURBZ9snxOyf3x9OJzrEiSy9DfyCoJSquUvlvu0NrZW0d9mxG4lus', NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-1.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(206, 'uahmed', 'uahmed95@gmail.com', '$2y$10$L.e2Ry/TuVpDSwXieXosYOpnS4RJSl7iMcj0X.sg8aWpxNXGCInOG', NULL, NULL, NULL, 'khaled mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-6.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(207, 'yhossam', 'yhossam65@gmail.com', '1452365', NULL, NULL, NULL, 'hossam mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', NULL, NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-3.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, NULL),
(208, 'qghada', 'qghada22@gmail.com', '$2y$10$rwL3OqI1LoKvJCl7xDPXJeDc3Hco7IqGsq7ApUSt.zODZPnkrCHwq', NULL, NULL, NULL, 'ghada mohamed', 'teacher', 5, 15, 66, 1, 1, 1, NULL, NULL, 1, 1, NULL, '0000-00-00', 'male', 'RR1RpEvQURBZ9snxOyf3x9OJzrEiSy9DfyCoJSquUvlvu0NrZW0d9mxG4lus', NULL, NULL, NULL, 2015, 'yesss', NULL, NULL, 'teacher/user-1.jpg', NULL, NULL, 0, 0, 100, NULL, NULL, 0, NULL, NULL, 150, 'yessss', NULL, NULL, 14, NULL, 1, NULL, '', NULL, '', NULL, '2021-10-29 12:23:00'),
(209, 'yousef', 'yousef@moaeed.com', '$2y$10$mIVngTLaebdJ2Ls3qSMO4u2LEexKlAO7eHDmveLfknyjH6kXMZC3y', NULL, NULL, NULL, 'yousef mohameed', 'Teacher', 5, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fmale', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'teacher/O31IcGTWoglaiIjpCOYmcZwNdTUbt8JerJbCFaO1.jpg', NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-11-01 09:15:55'),
(220, 'cytajuzoty', 'hyno@mailinator.com', '$2y$10$B8l/N/UJBFFAeneW1idixO/jrqvZH7fLfqI2hJUJe6lZ.LOcZ9X7C', NULL, NULL, NULL, 'Gail Alexander', 'teacher', 5, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1991-05-20', 'male', NULL, 'Necessitatibus aut i', NULL, '+1 (612) 127-2138', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '[\"SMS\"]', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-30 14:22:34', '2021-10-30 14:22:34'),
(221, 'qubelebu', 'tusynon@mailinator.com', '$2y$10$m/elDOwHatvamw4/vRMAyeWzitAHxoti4cLlAGqpIpBufb0vNoFEq', NULL, NULL, NULL, 'Clementine Barr', 'admin', 3, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-06-25', 'male', NULL, 'Vero dolorem dolores', NULL, '+1 (738) 967-9413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '[\"Mail\",\"SMS\"]', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-30 15:10:40', '2021-10-30 15:10:40'),
(222, 'kaxogoduc', 'gijorec@mailinator.com', '$2y$10$7FuOUFUu77b8GJpqlphGcOElqGB8KNVOSmhcWWvKzbGwIS8ubVwhe', NULL, NULL, NULL, 'Otto Booker', 'Manager', 7, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000-01-09', 'fmale', NULL, 'Irure magna exceptur', NULL, '+1 (829) 794-2651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '[\"Mail\",\"phone\"]', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-30 15:11:53', '2021-10-30 15:11:53'),
(223, 'xuwuj', 'pydi@mailinator.com', '$2y$10$vcFGa5JScippO7PZoAUGU.Ujr0pzq9Qvgk0wzM9.b4/Hxu3eeqcyy', NULL, NULL, NULL, 'Tatyana Hobbs', 'HR', 11, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1982-05-28', 'fmale', NULL, 'Qui natus ex ipsum', NULL, '+1 (499) 776-7185', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '[\"SMS\"]', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-30 15:14:05', '2021-10-30 15:14:05'),
(224, 'wokoqesary', 'kihocebexyousef@mailinator.com', '$2y$10$tQExnYB59NaYRRwr.Iae1ejiY.tFcz4/Qcfaa0QKJNICWdVqZ/SV2', NULL, NULL, NULL, 'Kennedy Burris', 'Accountant', 9, 15, 66, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1971-11-18', 'male', NULL, 'Labore aut quae aliq', NULL, '+1 (282) 422-2532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '[\"Mail\",\"phone\"]', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-30 19:19:35', '2021-10-30 19:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `messages` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `messageText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateSent` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `vacDate` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acYear` int(11) NOT NULL,
  `role` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptedVacation` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pass_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pass_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pers` int(11) NOT NULL DEFAULT 1,
  `usr_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_relation` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_meet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `docs` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `week` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wel_offices`
--

CREATE TABLE `wel_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `av_for` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
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
-- Indexes for table `dormitories`
--
ALTER TABLE `dormitories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_cats`
--
ALTER TABLE `expenses_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_allocations`
--
ALTER TABLE `fee_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_discounts`
--
ALTER TABLE `fee_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_groups`
--
ALTER TABLE `fee_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_pages`
--
ALTER TABLE `frontend_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_cats`
--
ALTER TABLE `hostel_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_cards`
--
ALTER TABLE `id_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_cats`
--
ALTER TABLE `income_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_cats`
--
ALTER TABLE `inv_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_issues`
--
ALTER TABLE `inv_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_codes`
--
ALTER TABLE `items_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_stocks`
--
ALTER TABLE `items_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_issues`
--
ALTER TABLE `library_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsms`
--
ALTER TABLE `mailsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsms_templates`
--
ALTER TABLE `mailsms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_albums`
--
ALTER TABLE `media_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_items`
--
ALTER TABLE `media_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_lists`
--
ALTER TABLE `messages_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mettings`
--
ALTER TABLE `mettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mm_uploads`
--
ALTER TABLE `mm_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobnotifications`
--
ALTER TABLE `mobnotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobs_notifications`
--
ALTER TABLE `mobs_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsboards`
--
ALTER TABLE `newsboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exams`
--
ALTER TABLE `online_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exams_grades`
--
ALTER TABLE `online_exams_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_exams_questions`
--
ALTER TABLE `online_exams_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentscollections`
--
ALTER TABLE `paymentscollections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_histories`
--
ALTER TABLE `payroll_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_hourly_bases`
--
ALTER TABLE `payroll_hourly_bases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_salary_bases`
--
ALTER TABLE `payroll_salary_bases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_calls`
--
ALTER TABLE `phone_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postals`
--
ALTER TABLE `postals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_class_id_foreign` (`class_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_academic_years`
--
ALTER TABLE `student_academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_categories`
--
ALTER TABLE `student_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_docs`
--
ALTER TABLE `student_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_materials`
--
ALTER TABLE `study_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_materials_week_id_foreign` (`week_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_class_id_foreign` (`class_id`),
  ADD KEY `users_section_id_foreign` (`section_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wel_offices`
--
ALTER TABLE `wel_offices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_cats`
--
ALTER TABLE `expenses_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_allocations`
--
ALTER TABLE `fee_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_discounts`
--
ALTER TABLE `fee_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_groups`
--
ALTER TABLE `fee_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_pages`
--
ALTER TABLE `frontend_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_cats`
--
ALTER TABLE `hostel_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `id_cards`
--
ALTER TABLE `id_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_cats`
--
ALTER TABLE `income_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_cats`
--
ALTER TABLE `inv_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_issues`
--
ALTER TABLE `inv_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_codes`
--
ALTER TABLE `items_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_stocks`
--
ALTER TABLE `items_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_issues`
--
ALTER TABLE `library_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailsms`
--
ALTER TABLE `mailsms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailsms_templates`
--
ALTER TABLE `mailsms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_albums`
--
ALTER TABLE `media_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_items`
--
ALTER TABLE `media_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages_lists`
--
ALTER TABLE `messages_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mettings`
--
ALTER TABLE `mettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mm_uploads`
--
ALTER TABLE `mm_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobnotifications`
--
ALTER TABLE `mobnotifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobs_notifications`
--
ALTER TABLE `mobs_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsboards`
--
ALTER TABLE `newsboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exams`
--
ALTER TABLE `online_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exams_grades`
--
ALTER TABLE `online_exams_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exams_questions`
--
ALTER TABLE `online_exams_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentscollections`
--
ALTER TABLE `paymentscollections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_histories`
--
ALTER TABLE `payroll_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_hourly_bases`
--
ALTER TABLE `payroll_hourly_bases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_salary_bases`
--
ALTER TABLE `payroll_salary_bases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_calls`
--
ALTER TABLE `phone_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postals`
--
ALTER TABLE `postals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_academic_years`
--
ALTER TABLE `student_academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_categories`
--
ALTER TABLE `student_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_docs`
--
ALTER TABLE `student_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_materials`
--
ALTER TABLE `study_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wel_offices`
--
ALTER TABLE `wel_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `study_materials`
--
ALTER TABLE `study_materials`
  ADD CONSTRAINT `study_materials_week_id_foreign` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;