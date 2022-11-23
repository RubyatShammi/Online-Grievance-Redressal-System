-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 08:40 PM
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
-- Database: `grs`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(100) NOT NULL,
  `complaint_id` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `descriptions` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(250) NOT NULL,
  `author` varchar(250) DEFAULT 'Dept',
  `type` varchar(250) NOT NULL,
  `upload_file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_lists`
--

CREATE TABLE `complaint_lists` (
  `id` int(250) NOT NULL,
  `complaint_id` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `reply` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL DEFAULT 'Dept',
  `status` varchar(250) NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'default.png',
  `email_token` varchar(250) NOT NULL,
  `proctor` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `student_id`, `password`, `role`, `status`, `created_at`, `updated_at`, `profile_image`, `email_token`, `proctor`, `department`) VALUES
(29, 'CSE', 'Dept', 'cse@gmail.com', '464646', 'Dhaka', '', '$2y$10$OnJge4tgjrc3RwtLF2oiMuwzwk3au1uo/g0i1crSZHOllFhP2T2Fq', 'Dept', 'Active', '2022-08-04 00:37:58', '0000-00-00 00:00:00', 'default.png', '', 'proctor@gmail.com', 'CSE'),
(30, 'Pharmacy', 'PHM', 'ph@gmail.com', '00000000000000', 'Dhaka', '', '$2y$10$JrznqAn1c9qrDTQdmY//y.R.HeGHwCwY46B0ZrNPeMVlRJn/MPSWW', 'Dept', 'Active', '2022-08-04 00:40:19', '0000-00-00 00:00:00', 'wkfdMbCqA1IMG_20211110_115952.jpg', '', 'proctor@gmail.com', 'PHM'),
(31, 'Business', 'Dept', 'bus@gmail.com', '0000000000000', 'Dhaka', '', '$2y$10$8rukK6unhQtP7BA1rqqHYetSaQLbVGxtglI2Y9INkd1Ug4sI2ChZC', 'Dept', 'Active', '2022-08-04 00:41:34', '0000-00-00 00:00:00', 'default.png', '', 'proctor@gmail.com', 'BUS');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(250) NOT NULL,
  `department_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`) VALUES
(1, 'CSE', '2022-07-05 10:16:39'),
(2, 'PHM', '2022-07-05 10:16:39'),
(3, 'BUS', '2022-07-05 10:17:11'),
(4, 'ART', '2022-07-05 10:17:11'),
(5, 'LAW', '2022-07-05 10:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `grc`
--

CREATE TABLE `grc` (
  `id` int(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL DEFAULT 'GRC',
  `status` varchar(250) NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'default.png',
  `email_token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grc`
--

INSERT INTO `grc` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `student_id`, `password`, `role`, `status`, `created_at`, `updated_at`, `profile_image`, `email_token`) VALUES
(8, 'GRC', 'Demo', 'grc@gmail.com', '11111111115', 'Dhaka', '', '$2y$10$h/iB7fczC26USnJdo9xReOzFVLGMgIby/k8R2gfaXpWCUOOnBcCCq', 'GRC', 'Active', '2022-05-24 16:12:00', '0000-00-00 00:00:00', 'yyUlIwJkK5IMG_20211110_114344.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `proctors`
--

CREATE TABLE `proctors` (
  `id` int(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL DEFAULT 'Proctor',
  `status` varchar(250) NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'default.png',
  `email_token` varchar(250) NOT NULL,
  `grc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proctors`
--

INSERT INTO `proctors` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `student_id`, `password`, `role`, `status`, `created_at`, `updated_at`, `profile_image`, `email_token`, `grc`) VALUES
(24, 'Proctor', 'Dept', 'proctor@gmail.com', '000000000000000', 'Dhaka', '', '$2y$10$U32Mm1EKqbYNvvxeTYAOQOSo/Wqc6Uozs8KdfCNPBoOdvDcD6zMTi', 'Proctor', 'Active', '2022-07-05 14:46:54', '0000-00-00 00:00:00', 'default.png', '', 'grc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `report_activity`
--

CREATE TABLE `report_activity` (
  `id` int(100) NOT NULL,
  `activity_id` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_activity`
--

INSERT INTO `report_activity` (`id`, `activity_id`, `email`, `activity`, `details`, `created_at`) VALUES
(116, '7629943889', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-06-28 03:37:25'),
(117, '4949396247', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-06-28 03:38:22'),
(118, '9030270925', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-06-28 03:52:19'),
(119, '6469683940', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-06-28 03:53:44'),
(120, '7119137407', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-06-28 03:54:28'),
(121, '6460430129', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-06-28 03:57:41'),
(122, '9574493234', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-06-28 03:58:48'),
(123, '4757926217', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-06-28 03:58:54'),
(124, '1485644952', '11111', 'New Login', 'New Login. Student ID : 11111', '2022-06-28 03:59:35'),
(125, '6894310701', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-06-28 03:59:53'),
(126, '5267074650', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-06-28 03:59:58'),
(127, '0638842096', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-06-28 04:15:22'),
(128, '6338731461', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-02 11:34:47'),
(129, '6903045633', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-02 11:54:10'),
(130, '8629692657', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-07-02 11:54:21'),
(131, '1885086542', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-02 11:55:11'),
(132, '9876391580', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-07-02 11:58:57'),
(133, '4027852690', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-07-02 12:18:48'),
(134, '1982288520', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-02 12:19:40'),
(135, '5125112894', 'dept@gmail.com', 'New Login', 'New Login. Email : dept@gmail.com', '2022-07-02 12:22:45'),
(136, '9087691607', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 13:51:51'),
(137, '4821834293', 'najmulamin45@gmail.com', 'New Login', 'New Login. Email : najmulamin45@gmail.com', '2022-07-05 14:42:28'),
(138, '4213796785', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 14:44:13'),
(139, '9773545984', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 14:48:14'),
(140, '7889552083', 'najmulamin45@gmail.com', 'New Login', 'New Login. Email : najmulamin45@gmail.com', '2022-07-05 14:48:26'),
(141, '5534481269', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 14:50:25'),
(142, '0245325222', 'najmulamin45@gmail.com', 'New Login', 'New Login. Email : najmulamin45@gmail.com', '2022-07-05 14:50:59'),
(143, '6348018687', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 14:54:28'),
(144, '4631341238', '123456', 'New Login', 'New Login. Student ID : 123456', '2022-07-05 14:56:20'),
(145, '8393651632', 'najmulamin45@gmail.com', 'New Login', 'New Login. Email : najmulamin45@gmail.com', '2022-07-05 14:58:21'),
(146, '8148411782', 'najmulamin45@gmail.com', 'New Login', 'New Login. Email : najmulamin45@gmail.com', '2022-07-05 14:58:48'),
(147, '0756273672', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-07-05 15:03:10'),
(148, '6541218839', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-07-05 15:03:32'),
(149, '2790378156', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-03 23:51:12'),
(150, '1030380798', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-03 23:58:59'),
(151, '2154488331', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-08-03 23:59:20'),
(152, '3897808837', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-03 23:59:58'),
(153, '7713001433', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:06:14'),
(154, '8442604026', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-08-04 00:11:05'),
(155, '1150995260', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-08-04 00:11:58'),
(156, '8671571910', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:12:10'),
(157, '5751111501', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:13:37'),
(158, '3447947232', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:15:24'),
(159, '2569567250', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:18:16'),
(160, '7269898263', 'ph@gmail.com', 'New Login', 'New Login. Email : ph@gmail.com', '2022-08-04 00:19:18'),
(161, '0037508825', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:25:11'),
(162, '0171375350', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 00:36:17'),
(163, '1181738878', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:36:46'),
(164, '8946538667', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 00:38:14'),
(165, '5495726045', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:39:23'),
(166, '0844931897', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 00:40:28'),
(167, '1986070111', 'ph@gmail.com', 'New Login', 'New Login. Email : ph@gmail.com', '2022-08-04 00:40:45'),
(168, '8738412759', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:40:56'),
(169, '9302696555', 'bus@gmail.com', 'New Login', 'New Login. Email : bus@gmail.com', '2022-08-04 00:41:47'),
(170, '9094685404', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-08-04 00:42:26'),
(171, '6374174570', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-08-04 00:42:45'),
(172, '7391444637', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 00:43:12'),
(173, '9275709647', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 00:47:16'),
(174, '9215962894', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:05:07'),
(175, '2181183303', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:22:39'),
(176, '7679362781', '12345', 'New Login', 'New Login. Student ID : 12345', '2022-08-04 01:35:20'),
(177, '1709900975', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:36:02'),
(178, '8581977227', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:39:30'),
(179, '0109619004', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:41:14'),
(180, '6718925974', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 01:43:34'),
(181, '2169455999', 'ug02-47-0012', 'New Login', 'New Login. Student ID : ug02-47-0012', '2022-08-04 01:44:19'),
(182, '9976806531', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 01:48:43'),
(183, '4243815155', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 09:28:08'),
(184, '9740303213', 'ug02-47-034', 'New Login', 'New Login. Student ID : ug02-47-034', '2022-08-04 09:38:38'),
(185, '8200998713', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 09:39:48'),
(186, '9199429901', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 09:41:35'),
(187, '1023928400', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 09:48:29'),
(188, '5897116243', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 09:55:10'),
(189, '5996356457', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-08-04 09:55:23'),
(190, '9870363079', 'ug02-47-034', 'New Login', 'New Login. Student ID : ug02-47-034', '2022-08-04 09:57:47'),
(191, '0391771187', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 10:00:38'),
(192, '0170694727', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 10:01:19'),
(193, '4874913287', 'ug02-47-18-0341', 'New Login', 'New Login. Student ID : ug02-47-18-0341', '2022-08-04 10:10:32'),
(194, '2698928274', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 10:44:38'),
(195, '3730096831', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 10:44:49'),
(196, '4645881211', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 10:46:53'),
(197, '0022546169', 'cse@gmail.com', 'New Login', 'New Login. Email : cse@gmail.com', '2022-08-04 10:49:30'),
(198, '7436822988', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 10:50:26'),
(199, '1075984174', 'ph@gmail.com', 'New Login', 'New Login. Email : ph@gmail.com', '2022-08-04 10:52:23'),
(200, '7620096705', 'ug02-47-18-0341', 'New Login', 'New Login. Student ID : ug02-47-18-0341', '2022-08-04 10:54:34'),
(201, '7794035313', 'ph@gmail.com', 'New Login', 'New Login. Email : ph@gmail.com', '2022-08-04 11:04:20'),
(202, '6807545596', 'ug02-47-18-0341', 'New Login', 'New Login. Student ID : ug02-47-18-0341', '2022-08-04 11:05:03'),
(203, '9537028553', 'ph@gmail.com', 'New Login', 'New Login. Email : ph@gmail.com', '2022-08-04 11:07:46'),
(204, '6826369240', 'ug02-47-18-0341', 'New Login', 'New Login. Student ID : ug02-47-18-0341', '2022-08-04 11:09:04'),
(205, '3180817846', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-08-04 11:09:45'),
(206, '4057639434', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-04 11:10:53'),
(207, '8059000613', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-08 23:08:22'),
(208, '2761778445', 'proctor@gmail.com', 'New Login', 'New Login. Email : proctor@gmail.com', '2022-08-08 23:08:56'),
(209, '8032025584', 'grc@gmail.com', 'New Login', 'New Login. Email : grc@gmail.com', '2022-08-08 23:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `site_name` varchar(250) NOT NULL,
  `site_status` varchar(250) NOT NULL,
  `site_url` varchar(250) NOT NULL,
  `signup_auto_approve` varchar(250) NOT NULL,
  `referral_links` varchar(250) NOT NULL,
  `status_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_name`, `site_status`, `site_url`, `signup_auto_approve`, `referral_links`, `status_message`) VALUES
('Grievance Redressal System', 'Active', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL DEFAULT 'Student',
  `status` varchar(250) NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'default.png',
  `email_token` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `student_id`, `password`, `role`, `status`, `created_at`, `updated_at`, `profile_image`, `email_token`, `department`) VALUES
(26, 'Student', 'Name', 'student@gmail.com', '00000000', 'Dhaka', '12345', '$2y$10$Bnr5OfLIqycJ6T51Ehdc.uU3MXZ/OUsoLw6O1zT3sac8uaJbBntm2', 'Student', 'Active', '2022-07-05 15:03:25', '0000-00-00 00:00:00', 'default.png', '', 'CSE'),
(28, 'tasnova', 'tasnim', 'tasnim@gmail.com', '1234567', 'Dhaka', 'ug02-47-0012', '$2y$10$yip2ArZU2.DDo4YLQcV2xuUYdDCPYxirPeqO65oGIrOsQGjR/0cYa', 'Student', 'Active', '2022-08-04 01:42:35', '0000-00-00 00:00:00', 'default.png', '', 'CSE'),
(29, 'rubayet', 'jasmin', 'rub@gmail.com', '1234567', '', 'ug02-47-034', '$2y$10$mZfxQZxg9JoqxxXuyN3VoO5N9b.5qcAy9eUBzqoVOGmiWUXmKbhAK', 'Student', 'Active', '2022-08-04 09:29:29', '0000-00-00 00:00:00', 'GSU8VYIigYIMG_20211110_115952.jpg', '', 'CSE'),
(33, 'Evan Khan', 'Emon', 'emon@gmail.com', '098765432', 'Mymensingh', 'ug02-47-18-0341', '$2y$10$..HIAOEp91r9ZpwjfjnsQeW7cnpm5Y/141Bwj1t64bAyNIJHTRqFK', 'Student', 'Active', '2022-08-04 10:06:51', '0000-00-00 00:00:00', 'JDaT8HCdzBIMG_20211110_095828.jpg', '', 'PHM'),
(34, 'Rafiul Alam', 'Durjoy', 'durjoy@gmail.com', '876565432', 'Mymensingh', 'ug02-47-18-041', '$2y$10$kgrZ02xpY67orMofs96Eh.BB1iBqhbQOEuFWoSoD3.9UaNmlOE4Xq', 'Student', 'Active', '2022-08-04 10:08:55', '0000-00-00 00:00:00', 'default.png', '', 'BUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_lists`
--
ALTER TABLE `complaint_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grc`
--
ALTER TABLE `grc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proctors`
--
ALTER TABLE `proctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_activity`
--
ALTER TABLE `report_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `complaint_lists`
--
ALTER TABLE `complaint_lists`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grc`
--
ALTER TABLE `grc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proctors`
--
ALTER TABLE `proctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `report_activity`
--
ALTER TABLE `report_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
