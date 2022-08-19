-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 03:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `AdminID` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`AdminID`, `userName`, `passcode`, `email`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'Obstetriemergencies.in', 'Simar@2022', 'websimarjeet@gmail.com', '1', '2022-01-25 19:30:00', '2022-01-25 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `attempttests`
--

CREATE TABLE `attempttests` (
  `AttemptQID` bigint(20) UNSIGNED NOT NULL,
  `TestType` enum('PRE','POST') COLLATE utf8mb4_unicode_ci NOT NULL,
  `TestID` bigint(20) UNSIGNED NOT NULL,
  `QuestionID` bigint(20) UNSIGNED NOT NULL,
  `selectedAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryseqs`
--

CREATE TABLE `categoryseqs` (
  `CatID` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `ChapterID` bigint(20) UNSIGNED NOT NULL,
  `SubjectID` bigint(20) UNSIGNED NOT NULL,
  `chapterName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapterDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`ChapterID`, `SubjectID`, `chapterName`, `chapterDescription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 2, 'Obstetriemergencies-C', 'Obstetriemergencies-C', 'Obstetriemergencies.png', '2022-01-13 20:30:00', '2022-01-13 20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'course.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseDescription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Obstetric emergencies', 'Obstetric emergencies', 'course.png', '2022-01-12 00:49:45', '2022-01-12 00:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `demogras`
--

CREATE TABLE `demogras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritalstatus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''NA''',
  `otherReligion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''NA0''',
  `college` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearStudy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentScoreP` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FatherOccupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MotherOccupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FoA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `MoA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `OnlineEducation` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alreadyInformation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alreadyIExplanation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `areaofinterest` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''NA''',
  `teaching_method_prefer` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''NA''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demogras`
--

INSERT INTO `demogras` (`id`, `age`, `gender`, `maritalstatus`, `religion`, `otherReligion`, `college`, `yearStudy`, `percentScoreP`, `state`, `FatherOccupation`, `MotherOccupation`, `FoA`, `MoA`, `OnlineEducation`, `alreadyInformation`, `alreadyIExplanation`, `areaofinterest`, `teaching_method_prefer`, `created_at`, `updated_at`, `UserID`) VALUES
(91, '25', 'male', 'married', 'Hindu', 'Other', 'GURU Nanak Dev University', '1', '54', 'Punjab', '0', '0', '1', '1', '1', '2', '0', 'Nursing', '1212', '2022-08-19 07:38:42', '2022-08-19 07:38:42', 111);

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
-- Table structure for table `lockunlockmodules`
--

CREATE TABLE `lockunlockmodules` (
  `LockID` bigint(20) UNSIGNED NOT NULL,
  `ContentType` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContentID` bigint(20) UNSIGNED NOT NULL,
  `unLock` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockunlockmodules`
--

INSERT INTO `lockunlockmodules` (`LockID`, `ContentType`, `ContentID`, `unLock`, `UserID`, `created_at`, `updated_at`) VALUES
(335, '1', 1, '1', 111, '2022-08-19 07:38:42', '2022-08-19 07:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `lockunlocksimpletests`
--

CREATE TABLE `lockunlocksimpletests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TYPE` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UnLock` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockunlockvideos`
--

CREATE TABLE `lockunlockvideos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ContentType` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VideoID` bigint(20) UNSIGNED NOT NULL,
  `unLock` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginusers`
--

CREATE TABLE `loginusers` (
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profilePhoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'userprofile.png',
  `approved` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loginusers`
--

INSERT INTO `loginusers` (`UserID`, `name`, `email`, `password`, `mobile`, `profilePhoto`, `approved`, `created_at`, `updated_at`) VALUES
(111, 'Virendra Singh', 'vickychhetri4@gmail.com', 'Sonika@1987', '9780553734', 'userprofile.png', 1, '2022-08-06 06:03:40', '2022-08-06 06:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `maincoursesteps`
--

CREATE TABLE `maincoursesteps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Step` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Complete` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChapterID` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maximumtests`
--

CREATE TABLE `maximumtests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TotalTest` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChapterID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maximumtests`
--

INSERT INTO `maximumtests` (`id`, `TotalTest`, `ChapterID`, `created_at`, `updated_at`) VALUES
(1, '3', 1, '2022-01-21 19:30:00', '2022-01-21 19:30:00');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_11_071158_create_courses_table', 1),
(6, '2022_01_11_072152_create_subjects_table', 1),
(7, '2022_01_11_073524_create_chapters_table', 1),
(8, '2022_01_11_073859_create_test_modules_table', 1),
(9, '2022_01_11_074322_create_questionbanks_table', 1),
(10, '2022_01_11_081744_create_video_modules_table', 1),
(11, '2022_01_11_090015_create_loginusers_table', 1),
(12, '2022_01_11_084610_create_attempttests_table', 2),
(13, '2022_01_11_093215_create_categoryseqs_table', 3),
(14, '2022_01_11_092749_create_moduleseqs_table', 4),
(15, '2022_01_11_191249_create_adminusers_table', 5),
(17, '2022_01_14_090718_create_demogras_table', 6),
(18, '2022_01_15_151226_create_lockunlockmodules_table', 7),
(19, '2022_01_16_050337_create_testcompletes_table', 8),
(20, '2022_01_22_035808_create_testseqs_table', 9),
(21, '2022_01_22_130325_create_maximumtests_table', 10),
(22, '2022_01_22_142029_create_maincoursesteps_table', 11),
(23, '2022_01_23_113353_create_videosectionstatuses_table', 12),
(24, '2022_01_24_164905_create_lockunlockvideos_table', 12),
(25, '2022_01_24_165618_create_videocompletes_table', 13),
(26, '2022_01_24_170543_create_videoseqs_table', 14),
(27, '2022_01_25_042750_create_cache_table', 15),
(32, '2022_01_28_145249_create_userfeedbacks_table', 16),
(33, '2022_01_28_145926_create_userfeedbackusers_table', 16),
(34, '2022_01_28_171709_create_userfeedcompletes_table', 16),
(35, '2022_01_30_171308_create_selectfromtwqs_table', 17),
(36, '2022_01_30_171851_create_selecttwoattempts_table', 17),
(39, '2022_01_30_174550_create_moreoptions_table', 18),
(40, '2022_01_30_175317_create_selectmodule3s_table', 18),
(41, '2022_01_31_103939_create_lockunlocksimpletests_table', 19),
(42, '2022_04_07_100024_create_questionnumbers_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `moduleseqs`
--

CREATE TABLE `moduleseqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CatID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContentID` bigint(20) UNSIGNED NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moreoptions`
--

CREATE TABLE `moreoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TYPE` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moreoptions`
--

INSERT INTO `moreoptions` (`id`, `TYPE`, `Options`, `created_at`, `updated_at`) VALUES
(1, '3', 'no communication between right atrium and ventricle', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(2, '3', 'four defects association', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(3, '3', 'switch', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(4, '3', 'aorta of pulmonary arterial switch', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(5, '3', 'one single great vessel', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(6, '2', 'systolic ejection murmur', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(7, '2', 'loud harsh systolic murmur', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(8, '2', 'humming top or machinery like murmur', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(9, '2', 'no specific systolic murmur', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(10, '2', 'systemic ejection murmur', '2022-01-29 19:30:00', '2022-01-29 19:30:00');

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
-- Table structure for table `postactivateds`
--

CREATE TABLE `postactivateds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PostButtonStatus` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionbanks`
--

CREATE TABLE `questionbanks` (
  `QuestionID` bigint(20) UNSIGNED NOT NULL,
  `TestID` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correctAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionbanks`
--

INSERT INTO `questionbanks` (`QuestionID`, `TestID`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`, `diagram`, `created_at`, `updated_at`) VALUES
(91, 1, 'Common Obstetrical Emergencies during labour is', 'Placenta praevia', 'Eclampsia', 'Cord prolapse', 'Abruption placenta', '3', '', '2022-08-18 19:30:00', '2022-08-18 19:30:00'),
(92, 1, 'The first delay happens in the management of obstetrical emergencies is:', 'Receipt of adequate and appropriate treatment', 'Decision to seek care', 'Identifying Medical  Facility', 'Reaching Medical  Facility', '2', '', '2022-08-19 10:59:04', '2022-08-19 10:59:04'),
(93, 1, 'The key functions for comprehensive emergency care includes:', 'administration of antibiotics', 'administration of oxytocin', 'Perform assisted deliveries', 'provide blood transfusion', '4', '', '2022-08-19 10:59:04', '2022-08-19 10:59:04'),
(94, 1, 'Indicators of impending uterine rupture during labour include all of the following EXCEPT', 'Fetal Distress', 'Hematuria', 'Fresh Bleeding per vaginum', 'Passage of Meconium', '2', '', '2022-08-19 11:01:30', '2022-08-19 11:01:30'),
(95, 1, 'All are seen with scar dehiscence except:', 'Maternal bradycardia ', 'Fetal bradycardia', 'Vaginal bleeding', 'Hematuria', '1', '', '2022-08-19 11:02:23', '2022-08-19 11:02:23'),
(96, 1, 'The usual site of spontaneous rupture of the intact uterus during pregnancy is the:', 'Anterior lower uterine segment', 'Posterior lower uterine segment', 'Body of uterus', 'Cornual area', '3', '', '2022-08-19 11:03:48', '2022-08-19 11:03:48'),
(97, 1, 'Bleeding in rupture of the uterus associated with a large broad ligament hematoma is controlled mostly by:', 'Suture of laceration', 'Ligation of internal iliac artery', 'Hysterectomy', 'Ligation of uterine artery', '2', '', '2022-08-19 11:05:08', '2022-08-19 11:05:08'),
(98, 1, 'The most constant early symptom of uterine rupture during labour is:', 'Shock', 'Pain', 'Hematuria', 'Cessation of labour', '2', '', '2022-08-19 11:05:08', '2022-08-19 11:05:08'),
(99, 1, 'The greatest risk factor for uterine rupture is:', 'Poly-hydramnios', 'Previous uterine surgery', 'Previous caesarean section', 'Maternal diabetes', '2', '', '2022-08-19 11:07:12', '2022-08-19 11:07:12'),
(100, 1, 'The warning sign of uterine rupture are EXCEPT one:', 'frequent, strong contractions, occurring more than 5 times in every 10 minutes', 'Tender swollen abdomen and easily palpable fetal parts', 'Fetal heart rate above 160Beats/minute or below 120 Beats/minutes', 'An abnormal abdominal contour and Bandl’s ring formation', '2', '', '2022-08-19 11:07:12', '2022-08-19 11:07:12'),
(101, 1, 'If women at risk of uterine rupture, what is used to monitor the fetus?', 'Abdominal ultrasound', 'Cardiotocography', 'Contraction stress test', 'No monitoring required', '2', '', '2022-08-19 11:09:37', '2022-08-19 11:09:37'),
(102, 1, 'The definitive management of a uterine rupture is:', 'Delivery by C-section and repair of the rupture', 'Delivery by vaginal birth and hysterectomy', 'Delivery by C-section and uterine artery ligation', 'Delivery by C-section and balloon tamponade', '1', '', '2022-08-19 11:09:37', '2022-08-19 11:09:37'),
(103, 1, 'Blood in urine in a patient in labour is diagnostic of:', 'Impending scar rupture', 'Urethral injury', 'Obstructed labour', 'Cystitis', '3', '', '2022-08-19 11:13:42', '2022-08-19 11:13:42'),
(104, 1, 'The greatest risk factor for shoulder dystocia is:', 'Thin body habitus', 'Precipitous delivery', 'Gestational diabetes', 'Young maternal age', '3', '', '2022-08-19 11:14:29', '2022-08-19 11:14:29'),
(105, 1, 'After delivery of fetal head, retraction of baby’s head back into the vagina is known as :', 'Turtle sign', 'Spalding sign', 'Buddha sign', 'Ladin’s sign', '1', '', '2022-08-19 11:14:29', '2022-08-19 11:14:29'),
(106, 1, 'Which is not true for shoulder dystocia with delivery?', 'Suprapubic pressure is an acceptable treatment', 'McRoberts maneuver is an acceptable treatment', 'Bell palsy is an associated fetal brachial nerve injury', 'Maternal obesity, diabetes, and fetal macrosomia are associated factors', '3', '', '2022-08-19 11:16:57', '2022-08-19 11:16:57'),
(107, 1, 'The first line measures for managing shoulder dystocia, is', 'Symphysiotomy', 'Fundal pressure', 'Zavanelli maneuver', 'Call for help', '4', '', '2022-08-19 11:16:57', '2022-08-19 11:16:57'),
(108, 1, 'All are done in management of shoulder dystocia EXCEPT:', 'Fundal pressure', 'Mc. Roberts man oeuvre', 'Suprapubic  man oeuvre', 'Woods man oeuvre', '1', '', '2022-08-19 11:22:03', '2022-08-19 11:22:03'),
(109, 1, 'Second line measures for managing shoulder dystocia is :', 'Rubin’s Manoeuvre', 'Suprapubic pressure', 'Fundal pressure', 'Mc. Roberts man oeuvre', '1', '', NULL, NULL),
(110, 1, 'The most common fetal complications for shoulder dystocia is:', 'Fractures of the clavicle', 'Bell’s palsy', 'Brachial  plexus injury', 'Fetal death', '3', '', '2022-08-19 11:23:50', '2022-08-19 11:23:50'),
(111, 1, 'Third line measures for shoulder dystocia is:', 'Liberal episiotomy', 'Symphyiostomy', 'Call for help', 'Delivery of posterior arm', '2', '', '2022-08-19 11:23:50', '2022-08-19 11:23:50'),
(112, 1, 'Cord prolapse is defined as the complications ', 'when the fetus is delivered without a umbilical cord', 'that occurs prior to or during the delivery of a baby', 'when the umbilical cord comes out from the vagina', 'When umbilical cord wrapped around the baby’s neck', '3', '', '2022-08-19 11:25:47', '2022-08-19 11:25:47'),
(113, 1, 'Incidence of cord prolapse is least in:', 'Frankbreech', 'Footling presentation', 'Transverse lie', 'Brow presentation', '1', '', '2022-08-19 11:25:47', '2022-08-19 11:25:47'),
(114, 1, 'All are the sign of cord prolapse EXCEPT:', 'Fetal distress', 'Fetal tachycardia', 'Seeing the cord', 'Fetal hypoxia', '2', '', '2022-08-19 11:27:20', '2022-08-19 11:27:20'),
(115, 1, 'Cord prolpase is most commonly associated with:', 'Transverse lie', 'Breech', 'Prematurity', 'Contracted pelvis', '1', '', '2022-08-19 11:27:20', '2022-08-19 11:27:20'),
(116, 1, 'Best treatment for cord prolapse is:', 'Replace the cord in vagina', 'Cesarean section', 'Trial of labour', 'None of the above', '2', '', '2022-08-19 11:29:55', '2022-08-19 11:29:55'),
(117, 1, 'The aim of first aid management of cord prolapsed is to:', 'deliver the baby', 'minimize the pressure on the cord', 'engage the fetal head', 'assess the fetal maturity', '2', '', '2022-08-19 11:29:55', '2022-08-19 11:29:55'),
(118, 1, 'The bladder can be distended with normal saline to push the presenting part above the brim is:', 'Misgavladach method', 'Vago’s Method', 'Internal version', 'Postural treatment', '2', '', '2022-08-19 11:36:28', '2022-08-19 11:36:28'),
(119, 1, 'In case of cord prolapse, an attempt is made to replace the cord by putting woman in:', 'Left lateral position', 'Knee chest position', 'Lithotomy position', 'Semi recumbent position', '2', '', '2022-08-19 11:36:28', '2022-08-19 11:36:28'),
(120, 1, 'The gold standard treatment for cord prolapse is:', 'immediate delivery by the quickest and safest route', 'immediately perform C- section based on clinical judgement', 'immediately provide lithotomy positing', 'immediately provide left lateral position', '1', '', '2022-08-19 11:39:05', '2022-08-19 11:39:05'),
(121, 1, 'Amniotomy should be done only when the presenting part is:', 'Not engaged', 'Engaged', 'High up', 'None of the above', '2', '', '2022-08-19 11:40:11', '2022-08-19 11:40:11'),
(122, 1, 'Amniotic fluid embolism causes:', 'Ectopic pregnancy', 'Shock', 'Hydramnios', 'None of the above', '2', '', '2022-08-19 11:40:11', '2022-08-19 11:40:11'),
(123, 1, 'Risk of amniotic fluid embolism is greatest in:', 'First trimester of pregnancy', 'Second trimester of pregnancy', 'Duringlabour', 'In puerperium', '3', '', '2022-08-19 11:43:58', '2022-08-19 11:43:58'),
(124, 1, 'When amniotic fluid enters into the maternal circulation can be associated with:', 'Rupture of membranes', 'Intact membrane', 'Oligohydramnios', 'Intrauterine growth retardation', '1', '', '2022-08-19 11:43:58', '2022-08-19 11:43:58'),
(125, 1, 'The general aim of medical management of amniotic fluid embolism is to:', 'maintain oxygenation', 'rush intravenous fluid', 'Give anaesthesia', 'detect the exact cause', '1', '', '2022-08-19 11:50:42', '2022-08-19 11:50:42'),
(126, 1, 'Postpartum haemorrhageis diagnosed when blood loss exceeds:', '300ml', '500ml', '700ml', '1000ml', '2', '', '2022-08-19 12:04:48', '2022-08-19 12:04:48'),
(127, 1, 'Commonest cause of postpartum haemorrhage is:', 'Atonic uterus', 'Traumatic', 'Combination of atonic and traumatic', 'Blood coagulation disorders', '1', '', '2022-08-19 12:07:22', '2022-08-19 12:07:22'),
(128, 1, 'Postpartum haemorrhage is excessive blood loss more than 500ml within:', '6 hours of the beginning of 3rd stage of labour', '12 hours of the beginning of 3rd stage of labour', '18 hours of the beginning of 3rd stage of labour', '24 hours of the beginning of 3rd stage of labour', '4', '', '2022-08-19 12:07:22', '2022-08-19 12:07:22'),
(129, 1, 'During PPH, internal iliac ligation done at:', 'Origin of internal iliac artery', 'Anterior division of internal iliac artery', 'Posterior division of internal iliac artery', 'Common iliac artery', '2', '', '2022-08-19 12:09:42', '2022-08-19 12:09:42'),
(130, 1, 'B-lynch suture is applied on:', 'Cervix', 'Follapian tube', 'Ovaries', 'Uterus', '4', '', '2022-08-19 12:09:42', '2022-08-19 12:09:42'),
(131, 1, 'Secondary PPH refers to excessive bleeding within:', '6 hours after the delivery', '12 hours after the delivery', '18 hours after the delivery', '24 hours after the delivery', '4', '', '2022-08-19 12:22:24', '2022-08-19 12:22:24'),
(132, 1, 'Immediate intervention for atonic uterus is:', 'check vital signs', 'massage the uterus', 'administer oxytocic drugs', 'call the obstetrician', '2', '', '2022-08-19 12:22:24', '2022-08-19 12:22:24'),
(133, 1, 'The drug  NOT commonly used to treat PPH is:', 'Mifepristone', 'Oxytocin', 'Methergin', 'Misoprost', '1', '', '2022-08-19 12:31:04', '2022-08-19 12:31:04'),
(134, 1, 'A state of circulatory inadequacy with poor tissue perfusion resulting in generalized cellular hypoxia is:', 'Amniotic fluid embolism', 'Shock', 'Pulmonary Embolism', 'Deep Vein Thrombosis', '2', '', '2022-08-19 12:31:04', '2022-08-19 12:31:04'),
(135, 1, 'Hypovolemicshock is associatedwith:', 'postpartum haemorrhage', 'eclampsia', 'air embolism', 'diabetes mellitus', '1', '', '2022-08-19 12:33:52', '2022-08-19 12:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `questionnumbers`
--

CREATE TABLE `questionnumbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `QuestionID` bigint(20) UNSIGNED NOT NULL,
  `QNo` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selectfromtwqs`
--

CREATE TABLE `selectfromtwqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TYPE` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ASection` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Correct` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selectfromtwqs`
--

INSERT INTO `selectfromtwqs` (`id`, `TYPE`, `ASection`, `Correct`, `created_at`, `updated_at`) VALUES
(1, '1', 'Tetralogy of Fallot', '2', '2022-01-29 19:30:00', '2022-01-29 19:30:00'),
(2, '1', 'Aortic Stenosis', '1', '2022-01-29 19:30:00', '2022-01-29 19:30:00'),
(3, '1', 'Patent Ductus Arteriosus', '1', '2022-01-29 19:30:00', '2022-01-29 19:30:00'),
(4, '1', 'Transposition of the Great Arteries', '2', '2022-01-29 19:30:00', '2022-01-29 19:30:00'),
(5, '1', 'Coarctation of Aorta', '1', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(6, '5', 'Infants rarely receive more than 0.08 mg of Digoxin in one dose', '1', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(7, '5', 'Apical pulse should be counted for 15 seconds before the administration of Digoxin,', '2', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(8, '5', 'Sign of symptoms of respiratory distress should be observed during suctioning. ', '1', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(9, '5', 'Elevated levels of blood urea nitrogen and serum creatinine indicate several renal failure.', '1', '2022-01-27 19:30:00', '2022-01-27 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `selectmodule3s`
--

CREATE TABLE `selectmodule3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `Section3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Correct` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selectmodule3s`
--

INSERT INTO `selectmodule3s` (`id`, `TYPE`, `Section3`, `Correct`, `created_at`, `updated_at`) VALUES
(1, '3', 'Truncus Arteriosus', 5, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(2, '3', 'TGA', 4, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(3, '3', 'TOF', 2, '2022-01-27 19:30:00', '2022-01-29 19:30:00'),
(4, '3', 'Tricuspid atresia', 1, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(5, '2', 'ASD', 6, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(6, '2', 'VSD', 7, '2022-01-29 19:30:00', '2022-01-29 19:30:00'),
(7, '2', 'PDA', 8, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(8, '2', 'CoA', 9, '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(9, '2', 'Pulmonary Stenosis', 10, '2022-01-27 19:30:00', '2022-01-27 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `selecttwoattempts`
--

CREATE TABLE `selecttwoattempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `QuestionIDModule` bigint(20) UNSIGNED NOT NULL,
  `SelectAnswer` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuestionfromtwoTYPE` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectID` bigint(20) UNSIGNED NOT NULL,
  `CourseID` bigint(20) UNSIGNED NOT NULL,
  `subjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `CourseID`, `subjectName`, `subjectDescription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 1, 'Obstetriemergencies-S', 'Obstetriemergencies-S', 'Obstetriemergencies.png', '2022-01-13 19:30:00', '2022-01-13 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `testcompletes`
--

CREATE TABLE `testcompletes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TypeCategory` enum('PRE','POST') COLLATE utf8mb4_unicode_ci NOT NULL,
  `TestID` bigint(20) UNSIGNED NOT NULL,
  `Complete` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testseqs`
--

CREATE TABLE `testseqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TestID` bigint(20) UNSIGNED NOT NULL,
  `Sequence` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testseqs`
--

INSERT INTO `testseqs` (`id`, `TestID`, `Sequence`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-21 19:30:00', '2022-01-21 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_modules`
--

CREATE TABLE `test_modules` (
  `TestID` bigint(20) UNSIGNED NOT NULL,
  `ChapterID` bigint(20) UNSIGNED NOT NULL,
  `testName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_modules`
--

INSERT INTO `test_modules` (`TestID`, `ChapterID`, `testName`, `testDescription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'STRUCTURED KNOWLEDEGE QUESTIONNAIRE', 'STRUCTURED KNOWLEDEGE QUESTIONNAIRE', 'testrecap.png', '2022-01-13 21:30:00', '2022-01-13 21:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedbacks`
--

CREATE TABLE `userfeedbacks` (
  `ItemID` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userfeedbacks`
--

INSERT INTO `userfeedbacks` (`ItemID`, `item`, `created_at`, `updated_at`) VALUES
(2, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children was able to impart adequate knowledge.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(3, 'The language used in Virtual Learning Program regarding Cardio-vascular Disorders among Children was easy, understandable and simple to follow.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(4, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children ensured learning at my own pace.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(5, 'The illustrations used in Virtual Learning Program regarding Cardio-vascular Disorders among Children made understanding of the content easy.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(6, 'The illustrations used in Virtual Learning Program regarding Cardio-vascular Disorders among Children were self explanatory.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(7, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children ensures impartiality in the learning of learners.', '2022-01-28 01:00:00', '2022-01-28 01:00:00'),
(8, 'The Cognitive Learning through Virtual Learning Program regarding Cardio-vascular Disorders among Children promoted the ability to take decisions among learners.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(9, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children suits the learning styles of learners.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(10, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children equipped the learner with up to date information.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(11, 'The content of Virtual Learning Program regarding Cardio-vascular Disorders among Children was able to achieve the objectives of Virtual Learning Program.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(12, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children is user friendly.', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(13, 'The Virtual Learning Program regarding Cardio-vascular Disorders among Children supports care decisions with appropriate learning experiences.', '2022-01-27 19:30:00', '2022-01-27 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedbackusers`
--

CREATE TABLE `userfeedbackusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ItemID` bigint(20) UNSIGNED NOT NULL,
  `Answer` enum('Strongly Agree','Agree','Uncertain','Disagree','Strongly disagree') COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userfeedcompletes`
--

CREATE TABLE `userfeedcompletes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Complete` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videocompletes`
--

CREATE TABLE `videocompletes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `VideoID` bigint(20) UNSIGNED NOT NULL,
  `Complete` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videosectionstatuses`
--

CREATE TABLE `videosectionstatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ContentType` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContentID` bigint(20) UNSIGNED NOT NULL,
  `unLock` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videoseqs`
--

CREATE TABLE `videoseqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `VideoID` bigint(20) UNSIGNED NOT NULL,
  `Sequence` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videoseqs`
--

INSERT INTO `videoseqs` (`id`, `VideoID`, `Sequence`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(2, 2, 2, '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(3, 3, 3, '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(4, 4, 4, '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(5, 5, 5, '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(6, 6, 6, '2022-01-23 19:30:00', '2022-01-23 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `video_modules`
--

CREATE TABLE `video_modules` (
  `VideoID` bigint(20) UNSIGNED NOT NULL,
  `ChapterID` bigint(20) UNSIGNED NOT NULL,
  `videoTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_modules`
--

INSERT INTO `video_modules` (`VideoID`, `ChapterID`, `videoTitle`, `videoDescription`, `videoLink`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Classification of Cardiovascular disorders in children', 'Classification of Cardiovascular disorders in children', 'module1manifest.mpd', 'modulePlay1.png', '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(2, 1, 'Congenital Cardiovascular disorders: Acyanotic  | Module 2 Section A', 'Congenital Cardiovascular disorders: Acyanotic  | Module 2 Section A', 'module2Amanifest.mpd', 'modulePlay2A.png', '2022-01-23 20:30:00', '2022-01-23 20:30:00'),
(3, 1, 'Congenital Cardiovascular disorders: Acyanotic  | Module 2 Section B', 'Congenital Cardiovascular disorders: Acyanotic   | Module 2 Section B', 'module2Bmanifest.mpd', 'modulePlay2B.png', '2022-01-23 20:30:00', '2022-01-23 20:30:00'),
(4, 1, 'Congenital Cardiovascular disorders: Cyanotic  | Module 3', 'Congenital Cardiovascular disorders: Cyanotic  | Module 3', 'module3manifest.mpd', 'modulePlay3.png', '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(5, 1, 'Acquired Cardiovascular Disorders  | Module 4', 'Acquired Cardiovascular Disorders  | Module 4', 'module4manifest.mpd', 'modulePlay4.png', '2022-01-23 19:30:00', '2022-01-23 19:30:00'),
(6, 1, 'Nursing Care of Children with Cardiovascular Disorders  | Module 5', 'Nursing Care of Children with Cardiovascular Disorders | Module 5', 'module5manifest.mpd', 'modulePlay5.png', '2022-01-23 19:30:00', '2022-01-23 19:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `attempttests`
--
ALTER TABLE `attempttests`
  ADD PRIMARY KEY (`AttemptQID`),
  ADD KEY `attempttests_testid_foreign` (`TestID`),
  ADD KEY `attempttests_questionid_foreign` (`QuestionID`),
  ADD KEY `attempttests_userid_foreign` (`UserID`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categoryseqs`
--
ALTER TABLE `categoryseqs`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`ChapterID`),
  ADD KEY `chapters_subjectid_foreign` (`SubjectID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demogras`
--
ALTER TABLE `demogras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `demogras_userid_unique` (`UserID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lockunlockmodules`
--
ALTER TABLE `lockunlockmodules`
  ADD PRIMARY KEY (`LockID`),
  ADD KEY `lockunlockmodules_userid_foreign` (`UserID`);

--
-- Indexes for table `lockunlocksimpletests`
--
ALTER TABLE `lockunlocksimpletests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lockunlocksimpletests_userid_foreign` (`UserID`);

--
-- Indexes for table `lockunlockvideos`
--
ALTER TABLE `lockunlockvideos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lockunlockvideos_userid_foreign` (`UserID`),
  ADD KEY `lockunlockvideos_videoid_foreign` (`VideoID`);

--
-- Indexes for table `loginusers`
--
ALTER TABLE `loginusers`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `maincoursesteps`
--
ALTER TABLE `maincoursesteps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maincoursesteps_chapterid_foreign` (`ChapterID`),
  ADD KEY `maincoursesteps_userid_foreign` (`UserID`);

--
-- Indexes for table `maximumtests`
--
ALTER TABLE `maximumtests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maximumtests_chapterid_foreign` (`ChapterID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduleseqs`
--
ALTER TABLE `moduleseqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moduleseqs_catid_foreign` (`CatID`);

--
-- Indexes for table `moreoptions`
--
ALTER TABLE `moreoptions`
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
-- Indexes for table `postactivateds`
--
ALTER TABLE `postactivateds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postactivateds_userid_foreign` (`UserID`);

--
-- Indexes for table `questionbanks`
--
ALTER TABLE `questionbanks`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `questionbanks_testid_foreign` (`TestID`);

--
-- Indexes for table `questionnumbers`
--
ALTER TABLE `questionnumbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionnumbers_questionid_foreign` (`QuestionID`);

--
-- Indexes for table `selectfromtwqs`
--
ALTER TABLE `selectfromtwqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectmodule3s`
--
ALTER TABLE `selectmodule3s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selectmodule3s_correct_foreign` (`Correct`);

--
-- Indexes for table `selecttwoattempts`
--
ALTER TABLE `selecttwoattempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selecttwoattempts_userid_foreign` (`UserID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectID`),
  ADD KEY `subjects_courseid_foreign` (`CourseID`);

--
-- Indexes for table `testcompletes`
--
ALTER TABLE `testcompletes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testseqs`
--
ALTER TABLE `testseqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testseqs_testid_foreign` (`TestID`);

--
-- Indexes for table `test_modules`
--
ALTER TABLE `test_modules`
  ADD PRIMARY KEY (`TestID`),
  ADD KEY `test_modules_chapterid_foreign` (`ChapterID`);

--
-- Indexes for table `userfeedbacks`
--
ALTER TABLE `userfeedbacks`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `userfeedbackusers`
--
ALTER TABLE `userfeedbackusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userfeedbackusers_userid_foreign` (`UserID`),
  ADD KEY `userfeedbackusers_itemid_foreign` (`ItemID`);

--
-- Indexes for table `userfeedcompletes`
--
ALTER TABLE `userfeedcompletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userfeedcompletes_userid_foreign` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videocompletes`
--
ALTER TABLE `videocompletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videocompletes_userid_foreign` (`UserID`),
  ADD KEY `videocompletes_videoid_foreign` (`VideoID`);

--
-- Indexes for table `videosectionstatuses`
--
ALTER TABLE `videosectionstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videoseqs`
--
ALTER TABLE `videoseqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videoseqs_videoid_foreign` (`VideoID`);

--
-- Indexes for table `video_modules`
--
ALTER TABLE `video_modules`
  ADD PRIMARY KEY (`VideoID`),
  ADD KEY `video_modules_chapterid_foreign` (`ChapterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `AdminID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attempttests`
--
ALTER TABLE `attempttests`
  MODIFY `AttemptQID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6845;

--
-- AUTO_INCREMENT for table `categoryseqs`
--
ALTER TABLE `categoryseqs`
  MODIFY `CatID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `ChapterID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demogras`
--
ALTER TABLE `demogras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockunlockmodules`
--
ALTER TABLE `lockunlockmodules`
  MODIFY `LockID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `lockunlocksimpletests`
--
ALTER TABLE `lockunlocksimpletests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `lockunlockvideos`
--
ALTER TABLE `lockunlockvideos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `loginusers`
--
ALTER TABLE `loginusers`
  MODIFY `UserID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `maincoursesteps`
--
ALTER TABLE `maincoursesteps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `maximumtests`
--
ALTER TABLE `maximumtests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `moduleseqs`
--
ALTER TABLE `moduleseqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moreoptions`
--
ALTER TABLE `moreoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postactivateds`
--
ALTER TABLE `postactivateds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `questionbanks`
--
ALTER TABLE `questionbanks`
  MODIFY `QuestionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `questionnumbers`
--
ALTER TABLE `questionnumbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `selectfromtwqs`
--
ALTER TABLE `selectfromtwqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `selectmodule3s`
--
ALTER TABLE `selectmodule3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `selecttwoattempts`
--
ALTER TABLE `selecttwoattempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testcompletes`
--
ALTER TABLE `testcompletes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `testseqs`
--
ALTER TABLE `testseqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_modules`
--
ALTER TABLE `test_modules`
  MODIFY `TestID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userfeedbacks`
--
ALTER TABLE `userfeedbacks`
  MODIFY `ItemID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userfeedbackusers`
--
ALTER TABLE `userfeedbackusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `userfeedcompletes`
--
ALTER TABLE `userfeedcompletes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videocompletes`
--
ALTER TABLE `videocompletes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `videosectionstatuses`
--
ALTER TABLE `videosectionstatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videoseqs`
--
ALTER TABLE `videoseqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video_modules`
--
ALTER TABLE `video_modules`
  MODIFY `VideoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempttests`
--
ALTER TABLE `attempttests`
  ADD CONSTRAINT `attempttests_questionid_foreign` FOREIGN KEY (`QuestionID`) REFERENCES `questionbanks` (`QuestionID`),
  ADD CONSTRAINT `attempttests_testid_foreign` FOREIGN KEY (`TestID`) REFERENCES `test_modules` (`TestID`),
  ADD CONSTRAINT `attempttests_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_subjectid_foreign` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`);

--
-- Constraints for table `demogras`
--
ALTER TABLE `demogras`
  ADD CONSTRAINT `demogras_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `lockunlockmodules`
--
ALTER TABLE `lockunlockmodules`
  ADD CONSTRAINT `lockunlockmodules_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `lockunlocksimpletests`
--
ALTER TABLE `lockunlocksimpletests`
  ADD CONSTRAINT `lockunlocksimpletests_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `lockunlockvideos`
--
ALTER TABLE `lockunlockvideos`
  ADD CONSTRAINT `lockunlockvideos_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`),
  ADD CONSTRAINT `lockunlockvideos_videoid_foreign` FOREIGN KEY (`VideoID`) REFERENCES `video_modules` (`VideoID`);

--
-- Constraints for table `maincoursesteps`
--
ALTER TABLE `maincoursesteps`
  ADD CONSTRAINT `maincoursesteps_chapterid_foreign` FOREIGN KEY (`ChapterID`) REFERENCES `chapters` (`ChapterID`),
  ADD CONSTRAINT `maincoursesteps_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `maximumtests`
--
ALTER TABLE `maximumtests`
  ADD CONSTRAINT `maximumtests_chapterid_foreign` FOREIGN KEY (`ChapterID`) REFERENCES `chapters` (`ChapterID`);

--
-- Constraints for table `moduleseqs`
--
ALTER TABLE `moduleseqs`
  ADD CONSTRAINT `moduleseqs_catid_foreign` FOREIGN KEY (`CatID`) REFERENCES `categoryseqs` (`CatID`);

--
-- Constraints for table `postactivateds`
--
ALTER TABLE `postactivateds`
  ADD CONSTRAINT `postactivateds_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `questionbanks`
--
ALTER TABLE `questionbanks`
  ADD CONSTRAINT `questionbanks_testid_foreign` FOREIGN KEY (`TestID`) REFERENCES `test_modules` (`TestID`);

--
-- Constraints for table `questionnumbers`
--
ALTER TABLE `questionnumbers`
  ADD CONSTRAINT `questionnumbers_questionid_foreign` FOREIGN KEY (`QuestionID`) REFERENCES `questionbanks` (`QuestionID`);

--
-- Constraints for table `selectmodule3s`
--
ALTER TABLE `selectmodule3s`
  ADD CONSTRAINT `selectmodule3s_correct_foreign` FOREIGN KEY (`Correct`) REFERENCES `moreoptions` (`id`);

--
-- Constraints for table `selecttwoattempts`
--
ALTER TABLE `selecttwoattempts`
  ADD CONSTRAINT `selecttwoattempts_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_courseid_foreign` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`id`);

--
-- Constraints for table `testseqs`
--
ALTER TABLE `testseqs`
  ADD CONSTRAINT `testseqs_testid_foreign` FOREIGN KEY (`TestID`) REFERENCES `test_modules` (`TestID`);

--
-- Constraints for table `test_modules`
--
ALTER TABLE `test_modules`
  ADD CONSTRAINT `test_modules_chapterid_foreign` FOREIGN KEY (`ChapterID`) REFERENCES `chapters` (`ChapterID`);

--
-- Constraints for table `userfeedbackusers`
--
ALTER TABLE `userfeedbackusers`
  ADD CONSTRAINT `userfeedbackusers_itemid_foreign` FOREIGN KEY (`ItemID`) REFERENCES `userfeedbacks` (`ItemID`),
  ADD CONSTRAINT `userfeedbackusers_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `userfeedcompletes`
--
ALTER TABLE `userfeedcompletes`
  ADD CONSTRAINT `userfeedcompletes_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`);

--
-- Constraints for table `videocompletes`
--
ALTER TABLE `videocompletes`
  ADD CONSTRAINT `videocompletes_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `loginusers` (`UserID`),
  ADD CONSTRAINT `videocompletes_videoid_foreign` FOREIGN KEY (`VideoID`) REFERENCES `video_modules` (`VideoID`);

--
-- Constraints for table `videoseqs`
--
ALTER TABLE `videoseqs`
  ADD CONSTRAINT `videoseqs_videoid_foreign` FOREIGN KEY (`VideoID`) REFERENCES `video_modules` (`VideoID`);

--
-- Constraints for table `video_modules`
--
ALTER TABLE `video_modules`
  ADD CONSTRAINT `video_modules_chapterid_foreign` FOREIGN KEY (`ChapterID`) REFERENCES `chapters` (`ChapterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
