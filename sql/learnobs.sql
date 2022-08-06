-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 02:56 PM
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
(1, 1, 'Which valve guards the left atrio-ventricular orifice?', 'Tricuspid', 'Bicuspid', 'Semilunar', 'Pulmonary valve', '2', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(2, 1, 'What is the name of the valve between right atrium and the right ventricle?', 'Tricuspid', 'Mitral', 'Semilunar', 'Bicuspid', '1', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(3, 1, 'Which chamber of the heart receives the most of the returning venous blood?', 'Left atrium', 'Left ventricle', 'Right atrium', 'Right ventricle', '3', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(4, 1, 'Which blood vessel carries blood from the heart to the lungs?', 'Pulmonary arteries', 'Pulmonary veins', 'Inferior vena cava', 'Superior vena cava', '1', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(5, 1, 'Which of the following structure is commonly known as “Pace Maker”?', 'S. A. Node', 'A. V. Node', 'Bundle of His', 'S.V. Node', '1', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(6, 1, 'Which chamber of the heart ejects oxygenated blood into the general circulation?', 'Left atrium', 'Left ventricle', 'Right atrium', 'Right ventricle', '2', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(7, 1, 'Which artery carries deoxygenated blood?', 'Aorta', 'Carotid artery', 'Pulmonary artery', 'Hepatic artery', '3', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(8, 1, 'Which structure of the heart has the thickest wall?', 'Left atrium', 'Left ventricle', 'Right atrium', 'Right ventricle', '2', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(9, 1, 'What is the duration of a cardiac cycle?', '8 second', '0.8 second', '0.08 second', '0.008 second', '2', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(10, 1, 'What is the volume of blood each ventricle pumps out during a cardiac cycle?', '50 ml', '60 ml', '70 ml', '80 ml', '3', '', '2022-01-13 19:30:00', '2022-01-13 19:30:00'),
(13, 1, 'Which is the outer layer of the wall of heart?', 'Epicardium', 'Myocardium', 'Endocardium', 'Pericardium', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(14, 1, 'What is the name of the opening in the fetal heart which allows the flow of blood directly from right to the left atrium?', 'Foramen ovale', 'Ductus arteriosus', 'Ductus venosus', 'Ductus ovale', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(15, 3, 'When do the cardiovascular disorders in children occur?', '4th and 7th week of fetal life', '4th and 8th week of fetal life', '5th and 7th week of fetal life', '5th and 8th week of fetal life', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(16, 3, 'What is the incidence rate of the cardiovascular disorders in children?', '4-8 neonates out of every 1000 live births.', '8-12 neonates out of every 1000 live births', '12-16 neonates out of every 1000 live births', '16-20 neonates out of every 1000 live births.', '2', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(17, 3, 'Which of the following occurs due to Increased pulmonary blood flow?', 'PDA', 'TOF', 'Aortic Stenosis', 'TGA', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(18, 3, 'Which of the following is a type of Acyanotic Congenital Cardiac Disorder?', 'Tricuspid Atresia', 'TOF', 'Coarctation of Aorta', 'TGA', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(19, 3, 'Decreased pulmonary blood flow is observed in which of the following?', 'TGA', 'TOF', 'VSD', 'Pulmonary Stenosis', '2', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(20, 3, 'Which is the most common cardiovascular anomaly?', 'ASD', 'VSD', 'PDA', 'TOF', '2', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(21, 3, 'What is Ostium primum? It is a type of ASD in which there is opening; ', 'At the upper end of the septum', 'Near the center of the septum', 'At the lower end of the septum', 'Near the junction of superior vena cava and right atrium', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(22, 3, 'In which disorder, Jug handle appearance of Heart is observed?', 'ASD', 'VSD', 'PDA', 'TOF', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(23, 3, 'Which is the most common type of VSD?', 'Membranous VSD', 'Muscular VSD', 'Atrio-ventricular canal VSD', 'Canal septal VSD', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(24, 3, 'Reversal of Shunt (Right to Left) is known as', 'Suzman’s Sign', 'Suzman’s Syndrome', 'Eisenmenger’s Sign', 'Eisenmenger’s Syndrome', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(25, 3, 'For which disorder, Pulmonary Artery Banding is done as a Palliative surgery?', 'ASD', 'VSD', 'PDA', 'TOF', '2', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(26, 3, 'When does the Ductus Arteriosus close? ', 'Within 1st week of life', 'Within 2nd week of life', 'Within 3rd week of life', 'Within 4th week of life', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(27, 3, 'What is the dose of Prostaglandin Inhibitors used in management of PDA?', '0.1 mg/kg 3 doses at intervals of 6 hours', '0.3 mg/kg 3 doses at intervals of 6 hours', '0.1 mg/kg 3 doses at intervals of 12 hours', '0.3 mg/kg 3 doses at intervals of 12 hours', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(28, 3, 'How many incisions are required for Visual Assistant Thoracoscopic Surgery (VATS)', 'Two', 'Three', 'Four', 'Five', '2', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(29, 3, 'Dilatation of collateral arteries seen over the scapular region is known as', 'Suzman’s Sign', 'Suzman’s Syndrome', 'Eisenmenger’s Sign', 'Eisenmenger’s Syndrome', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(30, 3, 'Which is the most common type of Aortic stenosis?', 'Valvular', 'Sub-valvular', 'Supra-valvular', 'Idiopathic hypertrophic', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(31, 3, 'How much pressure difference is observed between Left Ventricle and Aorta in case of Severe Aortic Stenosis?', '30 mm Hg', '50 mm Hg', '70 mm Hg', '90 mm Hg', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(32, 3, 'What does Boot Shaped Heart in Chest X-ray indicate? ', 'PDA', 'CoA', 'TGA', 'TOF', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(33, 3, 'A child is born with TGA. Which other disorder should be present for the survival of this baby?', 'Pulmonary Stenosis', 'Aortic Stenosis', 'Patent Ductus Arteriosus', 'Pulmonary Atresia', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(34, 3, 'Which of the following is true for Tricuspid Atresia?', 'Abnormal communication between right atria and right ventricle', 'Abnormal communication between left atria and left ventricle', 'No communication between right atria and right ventricle', 'No communication between left atria and left ventricle', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(35, 3, 'Truncus Arteriosus is a defect formed by the merging of which blood vessels?', 'Aorta and Superior vena cava', 'Aorta and Inferior vena cava', 'Aorta and Pulmonary Artery', 'Aorta and Pulmonary Vein', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(36, 3, '‘Biventricular hypertrophy’ can be seen in which of the following?', 'PDA', 'TOF', 'ASD', 'VSD', '1', '', '2022-01-14 20:30:00', '2022-01-14 19:30:00'),
(37, 3, '‘Right Atrial hypertrophy’ can be observed in which of the following?', 'PDA', 'TOF', 'Aortic Stenosis', 'Pulmonary stenosis', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(38, 3, 'A child is suffering from PDA. His heart is auscultated for murmurs. Which of the following is suggestive of this disorder?', 'Systolic ejection murmur', 'Systemic ejection murmur', 'Humming top murmur', 'Pansystolic murmur', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(39, 3, 'On auscultation of heart of a child with cardiovascular disorder “no murmur” is heard. This indicates the presence of which of the following?', 'Pulmonary stenosis', 'TOF', 'Tricuspid atresia', 'TGA', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(40, 3, 'In case of TGA, Atrial Switch Procedure is done in', '1st week of life', '2nd week of life', '3rd week of life', '4th week of life', '1', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(41, 3, 'A nurse is caring for a child with a patent ductus ateriosus. The nurse reviews the child’s assessment data, knowing that which of the following is characteristic of this disorder?', 'It involves an opening between two atria during fetal life', 'It involves an opening between the two ventricles during fetal life', 'It produces abnormalities in the atrial septum during fetal life', 'It involves an opening between the aorta and pulmonary artery during fetal life', '4', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(42, 3, 'Which is the preferred method of treatment in case of Truncus Arteriosus?', 'Medications', 'Observation', 'Corrective Surgery', 'Heart Transplant', '3', '', '2022-01-14 19:30:00', '2022-01-14 19:30:00'),
(70, 4, 'Case scenario I: A child is suspected to have Coarctation of aorta and is admitted to the hospital.\r\n\r\nWhich of the following is a unique feature of this disorder?', 'Hypertension in upper extremities and increased Blood Pressure in lower extremities ', 'Hypertension in upper extremities and diminished Blood Pressure in lower extremities', 'Hypotension in upper extremities and increased Blood Pressure in lower extremities', 'Hypotension in upper extremities and diminished Blood Pressure in lower extremities', '2', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(71, 4, 'Case scenario I: A child is suspected to have Coarctation of aorta and is admitted to the hospital.\r\n\r\nWhich pulses should be observed to identify the disorder?', 'Radial Pulse', 'Femoral Pulse', 'Carotid Pulse', 'Temporal Pulse', '2', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(72, 4, 'Case scenario I: A child is suspected to have Coarctation of aorta and is admitted to the hospital.\r\n\r\nWhat is the optimal age for surgery in case of Coarctation of Aorta ( Mortality rate less than 1%)?', '1-3 years', '2-4 years', '3-5 years', '4-6 years', '2', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(73, 4, 'Case scenario II: A ten month old child known to have TOF is admitted in emergency ward as he becomes restless after active play for a short time, is gasping and shows bluish discolouration of lips.\r\n\r\nWhat would be your initial step to manage the baby?', 'Administer injection Morphine S/C in a dose of 0.3 mg/kg ', 'Administer injection Morphine S/C in a dose of 0.1 mg/kg ', 'Place child on abdomen with knee-chest position', 'Place child supine wit knee- chest position.', '3', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(74, 4, 'Case scenario II: A ten month old child known to have TOF is admitted in emergency ward as he becomes restless after active play for a short time, is gasping and shows bluish discolouration of lips.\r\n\r\nHow would you manage the child, if he cannot undergo primary repair?', 'Anastomosis between Posterior Lateral Aspect of Descending Aorta and Right Pulmonary Artery', 'Anastomosis between Anterior Lateral Aspect of Descending Aorta and Right Pulmonary Artery', 'Anastomosis between Right Subclavian Artery and Right Pulmonary Artery', 'Anastomosis between Right Subclavian Artery and Left Pulmonary Artery', '1', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(75, 4, 'Case scenario II: A ten month old child known to have TOF is admitted in emergency ward as he becomes restless after active play for a short time, is gasping and shows bluish discolouration of lips.\r\n\r\nWhat is the most important nursing management of a child, with TOF, who is brought to emergency with cyanotic spell?', 'Place child in high fowler’s position', 'Start IV fluid', 'Decrease hypoxic spells', 'Minimize activity', '4', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(76, 4, 'Case scenario III: A three month old infant is admitted in the NICU for the management of CHF. Doctor has prescribed Digoxin. Knowing the fact that digoxin is potentially dangerous drug because the margin of safety of therapeutic, toxic and lethal doses is very low;\r\n\r\nHow much Digoxin is administered in Infants?', 'Less than 1 ml (0.05 mg) in one dose.', 'Less than 2 ml (0.10 mg) in one dose.', 'Less than 3 ml (0.15 mg) in one dose.', 'Less than 4 ml (0.20 mg) in one dose.', '1', '', '2022-01-22 19:30:00', '2022-01-22 20:30:00'),
(77, 4, 'Case scenario III: A three month old infant is admitted in the NICU for the management of CHF. Doctor has prescribed Digoxin. Knowing the fact that digoxin is potentially dangerous drug because the margin of safety of therapeutic, toxic and lethal doses is very low;\r\n\r\nIn what condition, administration of Digoxin will be withheld?', 'Pulse rate is less than 90 to 110 beats/min ', 'Pulse rate is less than 110 to 130 beats/min ', 'Pulse rate is more than 90 to 110 beats/min ', 'Pulse rate is more than 110 to 130 beats/min ', '1', '', '2022-01-22 19:30:00', '2022-01-22 20:30:00'),
(78, 4, 'Case scenario III: A three month old infant is admitted in the NICU for the management of CHF. Doctor has prescribed Digoxin. Knowing the fact that digoxin is potentially dangerous drug because the margin of safety of therapeutic, toxic and lethal doses is very low;\r\n\r\nIn order to prevent digoxin toxicity, which of the following should be monitored carefully?', 'Serum sodium level', 'Serum potassium level', 'Serum calcium level', 'Serum magnesium level', '2', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(79, 4, 'Case scenario III: A three month old infant is admitted in the NICU for the management of CHF. Doctor has prescribed Digoxin. Knowing the fact that digoxin is potentially dangerous drug because the margin of safety of therapeutic, toxic and lethal doses is very low;\r\n\r\nWhich of the following would you regard as a cardinal manifestation of Digoxin toxicity to the parents of  Rahul diagnosed with health failure? ', 'Headache', 'Respiratory distress', 'Extreme bradycardia', 'Constipation ', '3', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(80, 4, 'Case scenario IV: A newborn (four days old), has undergone atrial switch procedure and is shifted to NICU post-operatively;\r\n\r\nWhich of the following should be done to reduce pulmonary congestion in children suffering form cardiovascular disorders?', 'Place in inclined posture of 15 to 30 degrees to encourage maximum chest expansion', 'Place in inclined posture of 30 to 45 degrees to encourage maximum chest expansion', 'Place in inclined posture of 45 to 60 degrees to encourage maximum chest expansion', 'Place in inclined posture of 60 to 75 degrees to encourage maximum chest expansion', '2', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(81, 4, 'Case scenario IV: A newborn (four days old), has undergone atrial switch procedure and is shifted to NICU post-operatively;\r\n\r\nWhich of the following indicates post-operative hemorrhage?', 'Chest tube drainage greater than 2ml/kg/hr for more than 2 consecutive hours', 'Chest tube drainage greater than 3ml/kg/hr for more than 2 consecutive hours', 'Chest tube drainage greater than 2ml/kg/hr for more than 3 consecutive hours', 'Chest tube drainage greater than 3ml/kg/hr for more than 3 consecutive hours', '4', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(82, 4, 'Case scenario IV: A newborn (four days old), has undergone atrial switch procedure and is shifted to NICU post-operatively;\r\n\r\nWhich of the following is a sign of renal failure in children with cardiovascular disorders?', 'Decreased urine output i.e. less than 1ml/kg/hr', 'Decreased urine output i.e. less than 2ml/kg/hr', 'Decreased urine output i.e. less than 3ml/kg/hr', 'Decreased urine output i.e. less than 4ml/kg/hr', '1', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(83, 4, 'Case scenario IV: A newborn (four days old), has undergone atrial switch procedure and is shifted to NICU post-operatively;\r\n\r\nFor how long suctioning can be maintained to prevent depletion of oxygen supply?', '3 seconds', '4 seconds', '5 seconds', '6 seconds', '3', '', '2022-01-22 19:30:00', '2022-01-22 19:30:00'),
(84, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Aorta', 'Ductus Arteriosus', 'Pulmonary Vein', '2', '13.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(85, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Superior Vena Cava', 'Ductus Arteriosus', 'Tricuspid Valve', '3', '14.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(86, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Pulmonary Vein', 'Superior Vena Cava', 'Inferior Vena Cava', '1', '15.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(87, 1, 'The diagram given represents the one element from the following options.<br />\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Pulmonary Veins', 'Superior Vena Cava', 'Inferior Vena Cava', '2', '16.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(88, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Bicuspid Valve', 'Ductus Arteriosus', 'Tricuspid Valve', 'Foramen Ovale', '1', '17.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(89, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Bicuspid Valve', 'Ductus Arteriosus', 'Tricuspid Valve', 'Foramen Ovale', '3', '18.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(90, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Pulmonary Vein', 'Superior Vena Cava', 'Inferior Vena Cava', '3', '19.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00'),
(91, 1, 'The diagram given represents the one element from the following options.\r\nWhich of the following element is correct for the RED label area?', 'Pulmonary Artery', 'Pulmonary Vein', 'Superior Vena Cava', 'Inferior Vena Cava', '4', '20.jpg', '2022-01-27 19:30:00', '2022-01-27 19:30:00');

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

--
-- Dumping data for table `questionnumbers`
--

INSERT INTO `questionnumbers` (`id`, `QuestionID`, `QNo`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(2, 2, '2', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(3, 3, '3', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(4, 4, '4', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(5, 5, '5', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(6, 6, '6', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(7, 7, '7', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(8, 8, '8', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(9, 9, '9', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(10, 10, '10', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(11, 13, '11', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(12, 14, '12', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(13, 84, '13', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(14, 85, '14', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(15, 86, '15', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(16, 87, '16', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(17, 88, '17', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(18, 89, '18', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(19, 90, '19', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(20, 91, '20', '2022-04-07 17:11:39', '2022-04-07 17:11:39'),
(21, 15, '1', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(22, 16, '2', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(23, 17, '3', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(24, 18, '4', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(25, 19, '5', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(26, 20, '6', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(27, 21, '7', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(28, 22, '8', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(29, 23, '9', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(30, 24, '10', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(31, 25, '11', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(32, 26, '12', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(33, 27, '13', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(34, 28, '14', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(35, 29, '15', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(36, 30, '16', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(37, 31, '17', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(38, 32, '18', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(39, 33, '19', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(40, 34, '20', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(41, 35, '21', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(42, 36, '22', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(43, 37, '23', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(44, 38, '24', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(45, 39, '25', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(46, 40, '26', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(47, 41, '27', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(48, 42, '28', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(49, 70, '1', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(50, 71, '2', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(51, 72, '3', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(52, 73, '4', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(53, 74, '5', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(54, 75, '6', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(55, 76, '7', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(56, 77, '8', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(57, 78, '9', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(58, 79, '10', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(59, 80, '11', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(60, 81, '12', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(61, 82, '13', '2022-04-07 17:22:31', '2022-04-07 17:22:31'),
(62, 83, '14', '2022-04-07 17:22:31', '2022-04-07 17:22:31');

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
(1, 1, 1, '2022-01-21 19:30:00', '2022-01-21 19:30:00'),
(2, 3, 2, '2022-01-21 19:30:00', '2022-01-21 19:30:00'),
(3, 4, 3, '2022-01-21 19:30:00', '2022-01-21 19:30:00');

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
(1, 1, 'TEST-RECAP', 'To assess the previous knowledge related to Anatomy and physiology of heart.', 'testrecap.png', '2022-01-13 21:30:00', '2022-01-13 21:30:00'),
(3, 1, 'COGNITIVE LEARNING QUESTIONNAIRE', 'COGNITIVE LEARNING QUESTIONNAIRE', 'COGNITIVE.png', '2022-01-13 23:30:00', '2022-01-13 23:30:00'),
(4, 1, 'CARE DECISIONS QUESTIONNAIRE', 'CARE DECISIONS QUESTIONNAIRE', 'CARE.png', '2022-01-14 00:30:00', '2022-01-14 00:30:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockunlockmodules`
--
ALTER TABLE `lockunlockmodules`
  MODIFY `LockID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

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
  MODIFY `QuestionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
