-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buds_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_list`
--

CREATE TABLE `application_list` (
  `ID` int(11) NOT NULL,
  `bus_app` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangay_list`
--

CREATE TABLE `barangay_list` (
  `ID` int(11) NOT NULL,
  `Barangay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_list`
--

INSERT INTO `barangay_list` (`ID`, `Barangay`) VALUES
(1, 'Brgy. 1'),
(2, 'Brgy. 2'),
(3, 'Brgy. 3'),
(4, 'Brgy. 4'),
(5, 'Brgy. 5'),
(6, 'Brgy. 6'),
(7, 'Brgy. 7'),
(8, 'Brgy. 8'),
(9, 'Brgy. 9'),
(10, 'Brgy. 10'),
(11, 'Brgy. 11'),
(12, 'Brgy. 12'),
(13, 'Brgy. 13'),
(14, 'Brgy. 14'),
(15, 'Brgy. 15'),
(16, 'Brgy. 16'),
(17, 'Brgy. 17'),
(18, 'Brgy. 18'),
(19, 'Brgy. 19'),
(20, 'Brgy. 20'),
(21, 'Brgy. 21'),
(22, 'Brgy. 22'),
(23, 'Brgy. 23'),
(24, 'Brgy. 24'),
(25, 'Brgy. 25'),
(26, 'Brgy. 26'),
(27, 'Brgy. 27'),
(28, 'Brgy. 28'),
(29, 'Brgy. 29'),
(30, 'Brgy. 30'),
(31, 'Brgy. 31'),
(32, 'Brgy. 32'),
(33, 'Brgy. 33'),
(34, 'Brgy. 34'),
(35, 'Brgy. 35'),
(36, 'Brgy. 36'),
(37, 'Brgy. 37'),
(38, 'Brgy. 38'),
(39, 'Brgy. 39'),
(40, 'Brgy. 40'),
(41, 'Brgy. 41'),
(42, 'Brgy. 42'),
(43, 'Brgy. 43'),
(44, 'Brgy. 44'),
(45, 'Brgy. 45'),
(46, 'Brgy. 46'),
(47, 'Brgy. 47'),
(48, 'Brgy. 48'),
(49, 'Brgy. 49'),
(50, 'Brgy. 50'),
(51, 'Brgy. 51'),
(52, 'Brgy. 52'),
(53, 'Brgy. 53'),
(54, 'Brgy. 54'),
(55, 'Brgy. 55'),
(56, 'Brgy. 56'),
(57, 'Brgy. 57'),
(58, 'Brgy. 58'),
(59, 'Brgy. 59'),
(60, 'Brgy. 60'),
(61, 'Brgy. 61'),
(62, 'Brgy. 62'),
(63, 'Brgy. 63'),
(64, 'Brgy. 64'),
(65, 'Brgy. 65'),
(66, 'Brgy. 66'),
(67, 'Brgy. 67'),
(68, 'Brgy. 68'),
(69, 'Brgy. 69'),
(70, 'Brgy. 70'),
(71, 'Brgy. 71'),
(72, 'Brgy. 72'),
(73, 'Brgy. 73'),
(74, 'Brgy. 74'),
(75, 'Brgy. 75'),
(76, 'Brgy. 76'),
(77, 'Brgy. 77'),
(78, 'Brgy. 78'),
(79, 'Brgy. 79'),
(80, 'Brgy. 80'),
(81, 'Brgy. 81'),
(82, 'Brgy. 82'),
(83, 'Brgy. 83'),
(84, 'Brgy. 84'),
(85, 'Brgy. 85'),
(86, 'Brgy. 86'),
(87, 'Brgy. 87'),
(88, 'Brgy. 88'),
(89, 'Brgy. 89'),
(90, 'Brgy. 90'),
(91, 'Brgy. 91'),
(92, 'Brgy. 92'),
(93, 'Brgy. 93'),
(94, 'Brgy. 94'),
(95, 'Brgy. 95'),
(96, 'Brgy. 96'),
(97, 'Brgy. 97'),
(98, 'Brgy. 98'),
(99, 'Brgy. 99'),
(100, 'Brgy. 100'),
(101, 'Brgy. 101'),
(102, 'Brgy. 102'),
(103, 'Brgy. 103'),
(104, 'Brgy. 104'),
(105, 'Brgy. 105'),
(106, 'Brgy. 106'),
(107, 'Brgy. 107'),
(108, 'Brgy. 108'),
(109, 'Brgy. 109'),
(110, 'Brgy. 110'),
(111, 'Brgy. 111'),
(112, 'Brgy. 112'),
(113, 'Brgy. 113'),
(114, 'Brgy. 114'),
(115, 'Brgy. 115'),
(116, 'Brgy. 116'),
(117, 'Brgy. 117'),
(118, 'Brgy. 118'),
(119, 'Brgy. 119'),
(120, 'Brgy. 120'),
(121, 'Brgy. 121'),
(122, 'Brgy. 122'),
(123, 'Brgy. 123'),
(124, 'Brgy. 124'),
(125, 'Brgy. 125'),
(126, 'Brgy. 126'),
(127, 'Brgy. 127'),
(128, 'Brgy. 128'),
(129, 'Brgy. 129'),
(130, 'Brgy. 130'),
(131, 'Brgy. 131'),
(132, 'Brgy. 132'),
(133, 'Brgy. 133'),
(134, 'Brgy. 134'),
(135, 'Brgy. 135'),
(136, 'Brgy. 136'),
(137, 'Brgy. 137'),
(138, 'Brgy. 138'),
(139, 'Brgy. 139'),
(140, 'Brgy. 140'),
(141, 'Brgy. 141'),
(142, 'Brgy. 142'),
(143, 'Brgy. 143'),
(144, 'Brgy. 144'),
(145, 'Brgy. 145'),
(146, 'Brgy. 146'),
(147, 'Brgy. 147'),
(148, 'Brgy. 148'),
(149, 'Brgy. 149'),
(150, 'Brgy. 150'),
(151, 'Brgy. 151'),
(152, 'Brgy. 152'),
(153, 'Brgy. 153'),
(154, 'Brgy. 154'),
(155, 'Brgy. 155'),
(156, 'Brgy. 156'),
(157, 'Brgy. 157'),
(158, 'Brgy. 158'),
(159, 'Brgy. 159'),
(160, 'Brgy. 160'),
(161, 'Brgy. 161'),
(162, 'Brgy. 162'),
(163, 'Brgy. 163'),
(164, 'Brgy. 164'),
(165, 'Brgy. 165'),
(166, 'Brgy. 166'),
(167, 'Brgy. 167'),
(168, 'Brgy. 168'),
(169, 'Brgy. 169'),
(170, 'Brgy. 170'),
(171, 'Brgy. 171'),
(172, 'Brgy. 172'),
(173, 'Brgy. 173'),
(174, 'Brgy. 174'),
(175, 'Brgy. 175'),
(176, 'Brgy. 176'),
(177, 'Brgy. 177'),
(178, 'Brgy. 178'),
(179, 'Brgy. 179'),
(180, 'Brgy. 180'),
(181, 'Brgy. 181'),
(182, 'Brgy. 182'),
(183, 'Brgy. 183'),
(184, 'Brgy. 184'),
(185, 'Brgy. 185'),
(186, 'Brgy. 186'),
(187, 'Brgy. 187'),
(188, 'Brgy. 188');

-- --------------------------------------------------------

--
-- Table structure for table `brgyzone_list`
--

CREATE TABLE `brgyzone_list` (
  `ID` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgyzone_list`
--

INSERT INTO `brgyzone_list` (`ID`, `zone`, `barangay`, `location`) VALUES
(1, 1, 'Barangay 1', 'South'),
(2, 1, 'Barangay 2', 'South'),
(3, 1, 'Barangay 3', 'South'),
(4, 1, 'Barangay 4', 'South'),
(5, 1, 'Barangay 5', 'South'),
(6, 1, 'Barangay 6', 'South'),
(7, 1, 'Barangay 7', 'South'),
(8, 1, 'Barangay 8', 'South'),
(9, 1, 'Barangay 9', 'South'),
(10, 1, 'Barangay 10', 'South'),
(11, 1, 'Barangay 11', 'South'),
(12, 1, 'Barangay 12', 'South'),
(13, 2, 'Barangay 13', 'South'),
(14, 2, 'Barangay 14', 'South'),
(15, 2, 'Barangay 15', 'South'),
(16, 2, 'Barangay 16', 'South'),
(17, 2, 'Barangay 17', 'South'),
(18, 2, 'Barangay 18', 'South'),
(19, 2, 'Barangay 19', 'South'),
(20, 2, 'Barangay 20', 'South'),
(21, 2, 'Barangay 21', 'South'),
(22, 2, 'Barangay 22', 'South'),
(23, 2, 'Barangay 23', 'South'),
(24, 2, 'Barangay 24', 'South'),
(25, 3, 'Barangay 25', 'South'),
(26, 3, 'Barangay 26', 'South'),
(27, 3, 'Barangay 27', 'South'),
(28, 3, 'Barangay 28', 'South'),
(29, 3, 'Barangay 29', 'South'),
(30, 3, 'Barangay 30', 'South'),
(31, 3, 'Barangay 31', 'South'),
(32, 3, 'Barangay 32', 'South'),
(33, 3, 'Barangay 33', 'South'),
(34, 3, 'Barangay 34', 'South'),
(35, 3, 'Barangay 35', 'South'),
(36, 4, 'Barangay 36', 'South'),
(37, 4, 'Barangay 37', 'South'),
(38, 4, 'Barangay 38', 'South'),
(39, 4, 'Barangay 39', 'South'),
(40, 4, 'Barangay 40', 'South'),
(41, 4, 'Barangay 41', 'South'),
(42, 4, 'Barangay 42', 'South'),
(43, 4, 'Barangay 43', 'South'),
(44, 4, 'Barangay 44', 'South'),
(45, 4, 'Barangay 45', 'South'),
(46, 4, 'Barangay 46', 'South'),
(47, 4, 'Barangay 47', 'South'),
(48, 4, 'Barangay 48', 'South'),
(49, 5, 'Barangay 49', 'South'),
(50, 5, 'Barangay 50', 'South'),
(51, 5, 'Barangay 51', 'South'),
(52, 5, 'Barangay 52', 'South'),
(53, 5, 'Barangay 53', 'South'),
(54, 5, 'Barangay 54', 'South'),
(55, 5, 'Barangay 55', 'South'),
(56, 5, 'Barangay 56', 'South'),
(57, 5, 'Barangay 57', 'South'),
(58, 5, 'Barangay 58', 'South'),
(59, 6, 'Barangay 59', 'South'),
(60, 6, 'Barangay 60', 'South'),
(61, 6, 'Barangay 61', 'South'),
(62, 6, 'Barangay 62', 'South'),
(63, 6, 'Barangay 63', 'South'),
(64, 6, 'Barangay 64', 'South'),
(65, 6, 'Barangay 65', 'South'),
(66, 6, 'Barangay 66', 'South'),
(67, 6, 'Barangay 67', 'South'),
(68, 6, 'Barangay 68', 'South'),
(69, 6, 'Barangay 69', 'South'),
(70, 6, 'Barangay 70', 'South'),
(71, 7, 'Barangay 71', 'South'),
(72, 7, 'Barangay 72', 'South'),
(73, 7, 'Barangay 73', 'South'),
(74, 7, 'Barangay 74', 'South'),
(75, 7, 'Barangay 75', 'South'),
(76, 7, 'Barangay 76', 'South'),
(77, 7, 'Barangay 77', 'South'),
(78, 7, 'Barangay 78', 'South'),
(79, 7, 'Barangay 79', 'South'),
(80, 7, 'Barangay 80', 'South'),
(81, 8, 'Barangay 81', 'South'),
(82, 8, 'Barangay 82', 'South'),
(83, 8, 'Barangay 83', 'South'),
(84, 8, 'Barangay 84', 'South'),
(85, 8, 'Barangay 85', 'South'),
(86, 8, 'Barangay 86', 'South'),
(87, 8, 'Barangay 87', 'South'),
(88, 8, 'Barangay 88', 'South'),
(89, 8, 'Barangay 89', 'South'),
(90, 8, 'Barangay 90', 'South'),
(91, 8, 'Barangay 91', 'South'),
(92, 8, 'Barangay 92', 'South'),
(93, 8, 'Barangay 93', 'South'),
(94, 9, 'Barangay 94', 'South'),
(95, 9, 'Barangay 95', 'South'),
(96, 9, 'Barangay 96', 'South'),
(97, 9, 'Barangay 97', 'South'),
(98, 9, 'Barangay 98', 'South'),
(99, 9, 'Barangay 99', 'South'),
(100, 9, 'Barangay 100', 'South'),
(101, 9, 'Barangay 101', 'South'),
(102, 9, 'Barangay 102', 'South'),
(103, 9, 'Barangay 103', 'South'),
(104, 9, 'Barangay 104', 'South'),
(105, 9, 'Barangay 105', 'South'),
(106, 10, 'Barangay 106', 'South'),
(107, 10, 'Barangay 107', 'South'),
(108, 10, 'Barangay 108', 'South'),
(109, 10, 'Barangay 109', 'South'),
(110, 10, 'Barangay 110', 'South'),
(111, 10, 'Barangay 111', 'South'),
(112, 10, 'Barangay 112', 'South'),
(113, 10, 'Barangay 113', 'South'),
(114, 10, 'Barangay 114', 'South'),
(115, 10, 'Barangay 115', 'South'),
(116, 10, 'Barangay 116', 'South'),
(117, 10, 'Barangay 117', 'South'),
(118, 10, 'Barangay 118', 'South'),
(119, 10, 'Barangay 119', 'South'),
(120, 10, 'Barangay 120', 'South'),
(121, 11, 'Barangay 121', 'South'),
(122, 11, 'Barangay 122', 'South'),
(123, 11, 'Barangay 123', 'South'),
(124, 11, 'Barangay 124', 'South'),
(125, 11, 'Barangay 125', 'South'),
(126, 11, 'Barangay 126', 'South'),
(127, 11, 'Barangay 127', 'South'),
(128, 11, 'Barangay 128', 'South'),
(129, 11, 'Barangay 129', 'South'),
(130, 11, 'Barangay 130', 'South'),
(131, 11, 'Barangay 131', 'South'),
(132, 12, 'Barangay 132', 'South'),
(133, 12, 'Barangay 133', 'South'),
(134, 12, 'Barangay 134', 'South'),
(135, 12, 'Barangay 135', 'South'),
(136, 12, 'Barangay 136', 'South'),
(137, 12, 'Barangay 137', 'South'),
(138, 12, 'Barangay 138', 'South'),
(139, 12, 'Barangay 139', 'South'),
(140, 12, 'Barangay 140', 'South'),
(141, 12, 'Barangay 141', 'South'),
(142, 13, 'Barangay 142', 'South'),
(143, 13, 'Barangay 143', 'South'),
(144, 13, 'Barangay 144', 'South'),
(145, 13, 'Barangay 145', 'South'),
(146, 13, 'Barangay 146', 'South'),
(147, 13, 'Barangay 147', 'South'),
(148, 13, 'Barangay 148', 'South'),
(149, 13, 'Barangay 149', 'South'),
(150, 13, 'Barangay 150', 'South'),
(151, 13, 'Barangay 151', 'South'),
(152, 13, 'Barangay 152', 'South'),
(153, 13, 'Barangay 153', 'South'),
(154, 13, 'Barangay 154', 'South'),
(155, 13, 'Barangay 155', 'South'),
(156, 14, 'Barangay 156', 'South'),
(157, 14, 'Barangay 157', 'South'),
(158, 14, 'Barangay 158', 'South'),
(159, 14, 'Barangay 159', 'South'),
(160, 14, 'Barangay 160', 'South'),
(161, 14, 'Barangay 161', 'South'),
(162, 14, 'Barangay 162', 'South'),
(163, 14, 'Barangay 163', 'South'),
(164, 14, 'Barangay 164', 'South'),
(165, 15, 'Barangay 165', 'North'),
(166, 15, 'Barangay 166', 'North'),
(167, 15, 'Barangay 167', 'North'),
(168, 15, 'Barangay 168', 'North'),
(169, 15, 'Barangay 169', 'North'),
(170, 15, 'Barangay 170', 'North'),
(171, 15, 'Barangay 171', 'North'),
(172, 15, 'Barangay 172', 'North'),
(173, 15, 'Barangay 173', 'North'),
(174, 15, 'Barangay 174', 'North'),
(175, 15, 'Barangay 175', 'North'),
(176, 15, 'Barangay 176', 'North'),
(177, 15, 'Barangay 177', 'North'),
(178, 15, 'Barangay 178', 'North'),
(179, 15, 'Barangay 179', 'North'),
(180, 15, 'Barangay 180', 'North'),
(181, 15, 'Barangay 181', 'North'),
(182, 15, 'Barangay 182', 'North'),
(183, 15, 'Barangay 183', 'North'),
(184, 15, 'Barangay 184', 'North'),
(185, 15, 'Barangay 185', 'North'),
(186, 15, 'Barangay 186', 'North'),
(187, 15, 'Barangay 187', 'North'),
(188, 15, 'Barangay 188', 'North');

-- --------------------------------------------------------

--
-- Table structure for table `business_applicant`
--

CREATE TABLE `business_applicant` (
  `bus_applicant` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `pos_vacant` varchar(255) NOT NULL,
  `job_desc` longtext NOT NULL,
  `job_spec` longtext NOT NULL,
  `degree` varchar(255) NOT NULL,
  `year_exp` varchar(266) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_applicant`
--

INSERT INTO `business_applicant` (`bus_applicant`, `bus_id`, `pos_vacant`, `job_desc`, `job_spec`, `degree`, `year_exp`, `salary`, `status`) VALUES
(7, 8, 'adsf', 'adsf', 'adfasdf,asdfasdf', 'adsfads', 'adf', '123000', 1),
(8, 100, 'chef', 'asdf', 'adfad', 'adf', 'adf', 'asdfad', 1),
(9, 100, 'gasdf', 'asdf', 'adsf', 'adf', 'asdf', 'asdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_carousel`
--

CREATE TABLE `business_carousel` (
  `bus_carou_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_carousel`
--

INSERT INTO `business_carousel` (`bus_carou_id`, `bus_id`, `images`) VALUES
(12, 8, 'img/gallery1/pexels-pixabay-220237.jpg'),
(15, 8, 'img/gallery1/pexels-emocionaligencia-inteligencia-emocional-1474993.jpg'),
(16, 8, 'img/gallery1/pexels-lukas-669576.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `business_faq`
--

CREATE TABLE `business_faq` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `questions` longtext NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_faq`
--

INSERT INTO `business_faq` (`id`, `bus_id`, `questions`, `answer`) VALUES
(29, 100, '2', 's');

-- --------------------------------------------------------

--
-- Table structure for table `business_links`
--

CREATE TABLE `business_links` (
  `bus_link_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_fb` varchar(255) NOT NULL,
  `bus_ig` varchar(255) NOT NULL,
  `bus_tiktok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_links`
--

INSERT INTO `business_links` (`bus_link_id`, `bus_id`, `bus_fb`, `bus_ig`, `bus_tiktok`) VALUES
(1, 1, 'www.facebook.com/FMComputerShop', 'www.instagram.com/FMComputerShop', ''),
(2, 2, 'www.facebook.com/BCMarketingSupply', 'www.instagram.com/BCMarketingSupply', ''),
(3, 3, 'www.facebook.com/KenPharmacy', 'www.instagram.com/KenPharmacy', ''),
(4, 4, 'www.facebook.com/SantiBreadfood', 'www.instagram.com/SantiBreadfood', ''),
(5, 5, 'www.facebook.com/Renzymotorshop', 'www.instagram.com/Renzymotorshop', ''),
(6, 6, 'www.facebook.com/M&MCarwash', 'www.instagram.com/MCarwash', ''),
(7, 7, 'www.facebook.com/EsguerraIndustries', 'www.instagram.com/EsguerraIndustries', ''),
(8, 8, 'www.facebook.com/419Enterprise', 'www.instagram.com/419Enterprise', ''),
(9, 9, 'www.facebook.com/BarkAnimal', 'www.instagram.com/BarkAnimal', ''),
(10, 10, 'www.facebook.com/CeddieTrainingCenter', 'www.instagram.com/CeddieTrainingCenter', ''),
(11, 11, 'www.facebook.com/CeddieTrainingCenter', 'www.instagram.com/CeddieTrainingCenter', ''),
(12, 12, 'www.facebook.com/C&GPrinting', 'www.instagram.com/C&GPrinting', ''),
(13, 13, 'www.facebook.com/KalizzaSpa', 'www.instagram.com/KalizzaSpa', ''),
(14, 14, 'www.facebook.com/FrancisPhotography', 'www.instagram.com/FrancisPhotography', ''),
(15, 15, 'www.facebook.com/FourStoryBookShop', 'www.instagram.com/FourStoryBookShop', ''),
(16, 16, 'www.facebook.com/CennatVideography', 'www.instagram.com/CennatVideography', ''),
(17, 17, 'www.facebook.com/KielzyMusicStudio', 'www.instagram.com/KielzyMusicStudio', ''),
(18, 18, 'www.facebook.com/FerdsGadgetsRepair', 'www.instagram.com/FerdsGadgetsRepair', ''),
(19, 19, 'www.facebook.com/OllyPlasticWarehouse', 'www.instagram.com/OllyPlasticWarehouse', ''),
(20, 20, 'www.facebook.com/FTechEnterprises', 'www.instagram.com/FTechEnterprises', ''),
(21, 21, 'www.facebook.com/KingJTLaundry', 'www.instagram.com/KingJTLaundry', ''),
(22, 22, 'www.facebook.com/FamtelStaycation', 'www.instagram.com/FamtelStaycation', ''),
(23, 23, 'www.facebook.com/2010InternetCafe', 'www.instagram.com/2010InternetCafe', ''),
(24, 24, 'www.facebook.com/MineGrindHardware', 'www.instagram.com/MineGrindHardware', ''),
(25, 25, 'www.facebook.com/MotorSwapShop', 'www.instagram.com/MotorSwapShop', ''),
(26, 26, 'www.facebook.com/LexianMarketingMerch', 'www.instagram.com/LexianMarketingMerch', ''),
(27, 27, 'www.facebook.com/EFranciscoApartment', 'www.instagram.com/EFranciscoApartment', ''),
(28, 28, 'www.facebook.com/ChemHighTradings', 'www.instagram.com/ChemHighTradings', ''),
(29, 29, 'www.facebook.com/J&MSkinCare', 'www.instagram.com/J&MSkinCare', ''),
(30, 30, 'www.facebook.com/MetalIndustries', 'www.instagram.com/MetalIndustries', ''),
(31, 31, 'www.facebook.com/SiomaiFoodHouse', 'www.instagram.com/SiomaiFoodHouse', ''),
(32, 32, 'www.facebook.com/JJBuildersCorporations', 'www.instagram.com/JJBuildersCorporations', ''),
(33, 33, 'www.facebook.com/RomeoDoorToDoorServices', 'www.instagram.com/RomeoDoorToDoorServices', ''),
(34, 34, 'www.facebook.com/EdCoAircon', 'www.instagram.com/EdCoAircon', ''),
(35, 35, 'www.facebook.com/JaydieSalon', 'www.instagram.com/JaydieSalon', ''),
(36, 36, 'www.facebook.com/JaydieSalon', 'www.instagram.com/JaydieSalon', ''),
(37, 37, 'www.facebook.com/TitoGabsCatering', 'www.instagram.com/TitoGabsCatering', ''),
(38, 38, 'www.facebook.com/MarckiesPaperCrafts', 'www.instagram.com/MarckiesPaperCrafts', ''),
(39, 39, 'www.facebook.com/MJuanOnlineShop', 'www.instagram.com/MJuanOnlineShop', ''),
(40, 40, 'www.facebook.com/CACIndustrialSupply', 'www.instagram.com/CACIndustrialSupply', ''),
(41, 41, 'www.facebook.com/GenMaldaMotorcycle', 'www.instagram.com/GenMaldaMotorcycle', ''),
(42, 42, 'www.facebook.com/YannieHousekeepingServices', 'www.instagram.com/YannieHousekeepingServices', ''),
(43, 43, 'www.facebook.com/MaeLynPawnshops', 'www.instagram.com/MaeLynPawnshops', ''),
(44, 44, 'www.facebook.com/EllieIntercommShop', 'www.instagram.com/EllieIntercommShop', ''),
(45, 45, 'www.facebook.com/CelioClothing', 'www.instagram.com/CelioClothing', ''),
(46, 46, 'www.facebook.com/PureblendsFoodShop', 'www.instagram.com/PureblendsFoodShop', ''),
(47, 47, 'www.facebook.com/HivelabsFoodCourt', 'www.instagram.com/HivelabsFoodCourt', ''),
(48, 48, 'www.facebook.com/GeloSteelEquipment', 'www.instagram.com/GeloSteelEquipment', ''),
(49, 49, 'www.facebook.com/HiroFoodWarehouse', 'www.instagram.com/HiroFoodWarehouse', ''),
(50, 50, 'www.facebook.com/FloristPawnshop', 'www.instagram.com/FloristPawnshop', ''),
(51, 51, 'www.facebook.com/FloristPawnshop', 'www.instagram.com/FloristPawnshop', ''),
(52, 52, 'www.facebook.com/AkapeCafe', 'www.instagram.com/AkapeCafe', ''),
(53, 53, 'www.facebook.com/UnderbonesVehicleShop', 'www.instagram.com/UnderbonesVehicleShop', ''),
(54, 54, 'facebook.com/D\'Royale@2014/', 'instagram.com/D\'Royale@2014_ig/', ''),
(100, 100, 'www.facebook.com/MadersSilog/', 'www.instagram.com/MadersSilog/', ''),
(101, 101, 'www.facebook.com/MamaTessHomemadeSiomai/', 'www.instagram.com/MamaTessHomemadeSiomai/', ''),
(102, 102, 'www.facebook.com/ManliTrading/', 'www.instagram.com/ManliTrading/', ''),
(103, 103, 'www.facebook.com/EasyDay/', 'www.instagram.com/EasyDay/', ''),
(104, 104, 'www.facebook.com/DryWash/', 'www.instagram.com/DryWash/', ''),
(105, 105, 'www.facebook.com/MinMinHardware/', 'www.instagram.com/MinMinHardware/', ''),
(106, 106, 'www.facebook.com/AAAPrinting/', 'www.instagram.com/AAAPrinting/', ''),
(107, 107, 'www.facebook.com/ElChubbysPizza/', 'www.instagram.com/ElChubbysPizza/', ''),
(108, 108, 'www.facebook.com/SantosDentalClinic/', 'www.instagram.com/SantosDentalClinic/', ''),
(109, 109, 'www.facebook.com/RJDLiquors/', 'www.instagram.com/RJDLiquors/', ''),
(110, 110, 'www.facebook.com/SSBKitchenEquipment/', 'www.instagram.com/SSBKitchenEquipment/', ''),
(111, 111, 'www.facebook.com/BMXCycle/', 'www.instagram.com/BMXCycle/', ''),
(112, 112, 'www.facebook.com/JayJayUkay/', 'www.instagram.com/JayJayUkay/', ''),
(113, 113, 'www.facebook.com/PrinceHouseDécor/', 'www.instagram.com/PrinceHouseDécor/', ''),
(114, 114, 'www.facebook.com/BotikaniCarlo/', 'www.instagram.com/BotikaniCarlo/', ''),
(115, 115, 'www.facebook.com/CaféMorning/', 'www.instagram.com/CaféMorning/', ''),
(116, 116, 'www.facebook.com/CardInc/', 'www.instagram.com/CardInc/', ''),
(117, 117, 'www.facebook.com/PinkSplash/', 'www.instagram.com/PinkSplash/', ''),
(118, 118, 'www.facebook.com/FitnessGrind/', 'www.instagram.com/FitnessGrind/', ''),
(119, 119, 'www.facebook.com/CyberGadget/', 'www.instagram.com/CyberGadget/', ''),
(120, 120, 'www.facebook.com/MabiniHotel/', 'www.instagram.com/MabiniHotel/', ''),
(121, 121, 'www.facebook.com/WashontheSouth/', 'www.instagram.com/WashontheSouth/', ''),
(122, 122, 'www.facebook.com/JKCSpa/', 'www.instagram.com/JKCSpa/', ''),
(123, 123, 'www.facebook.com/JackAcRepair/', 'www.instagram.com/JackAcRepair/', ''),
(124, 124, 'www.facebook.com/JapanBeautySalon/', 'www.instagram.com/JapanBeautySalon/', ''),
(125, 125, 'www.facebook.com/SeeOil/', 'www.instagram.com/SeeOil/', ''),
(126, 126, 'www.facebook.com/JayQAcousticGuitar/', 'www.instagram.com/JayQAcousticGuitar/', ''),
(127, 127, 'www.facebook.com/BusyBees/', 'www.instagram.com/BusyBees/', ''),
(128, 128, 'www.facebook.com/MendozaCatering/', 'www.instagram.com/MendozaCatering/', ''),
(129, 129, 'www.facebook.com/SilverQueen/', 'www.instagram.com/SilverQueen/', ''),
(130, 130, 'www.facebook.com/SocialBookStore/', 'www.instagram.com/SocialBookStore/', ''),
(131, 131, 'www.facebook.com/PartasBusLiner/', 'www.instagram.com/PartasBusLiner/', ''),
(132, 132, 'www.facebook.com/SocialLitesDrivingSchool/', 'www.instagram.com/SocialLitesDrivingSchool/', ''),
(133, 133, 'www.facebook.com/FranciscoApartment/', 'www.instagram.com/FranciscoApartment/', ''),
(134, 134, 'www.facebook.com/MMPawnshop/', 'www.instagram.com/MMPawnshop/', ''),
(135, 135, 'www.facebook.com/MiamiAutoRepairShop/', 'www.instagram.com/MiamiAutoRepairShop/', ''),
(136, 136, 'www.facebook.com/ERSEyeCare/', 'www.instagram.com/ERSEyeCare/', ''),
(137, 137, 'www.facebook.com/CAMSGlassAliminumServces/', 'www.instagram.com/CAMSGlassAliminumServces/', ''),
(138, 138, 'www.facebook.com/NathanBridalShop/', 'www.instagram.com/NathanBridalShop/', ''),
(139, 139, 'www.facebook.com/SnackDepot/', 'www.instagram.com/SnackDepot/', ''),
(140, 140, 'www.facebook.com/StellarSipsCafé/', 'www.instagram.com/StellarSipsCafé/', ''),
(141, 141, 'www.facebook.com/HarmonicHavenMusicStore/', 'www.instagram.com/HarmonicHavenMusicStore/', ''),
(142, 142, 'www.facebook.com/WhisperingWillowFlorist/', 'www.instagram.com/WhisperingWillowFlorist/', ''),
(143, 143, 'www.facebook.com/AurorasArtistryStudio/', 'www.instagram.com/AurorasArtistryStudio/', ''),
(144, 144, 'www.facebook.com/SereneRetreatSpa/', 'www.instagram.com/SereneRetreatSpa/', ''),
(145, 145, 'www.facebook.com/MidnightMirageBarGrill', 'www.instagram.com/MidnightMirageBarGrill/', ''),
(146, 146, 'www.facebook.com/TastyTidbitsDeli', 'www.instagram.com/TastyTidbitsDeli', ''),
(147, 147, 'www.facebook.com/VintageVoyageAntiques', 'www.instagram.com/VintageVoyageAntiques', ''),
(148, 148, 'www.facebook.com/EnchantedEatsFoodTruck', 'www.instagram.com/EnchantedEatsFoodTruck', ''),
(149, 149, 'www.facebook.com/CoastalBreezeSurfShop', 'www.instagram.com/CoastalBreezeSurfShop', ''),
(150, 150, 'www.facebook.com/PawsPlayPetResort', 'www.instagram.com/PawsPlayPetResort', ''),
(151, 151, 'www.facebook.com/DreamyDelightsBakery', 'www.instagram.com/DreamyDelightsBakery', ''),
(152, 152, 'www.facebook.com/ZenithZestYogaStudio', 'www.instagram.com/ZenithZestYogaStudio', ''),
(153, 153, 'www.facebook.com/RadiantRootsFarmStand', 'www.instagram.com/RadiantRootsFarmStand', ''),
(154, 154, 'www.facebook.com/ElectricEleganceBoutique', 'www.instagram.com/ElectricEleganceBoutique', ''),
(155, 155, 'www.facebook.com/BeyondBoundariesTravelAgency', 'www.instagram.com/BeyondBoundariesTravelAgency', ''),
(156, 156, 'www.facebook.com/RusticRevivalFurnitureCo', 'www.instagram.com/RusticRevivalFurnitureCo', ''),
(157, 157, 'www.facebook.com/CloudNineBed&Breakfast', 'www.instagram.com/CloudNineBedBreakfast', ''),
(158, 158, 'www.facebook.com/Ink&InsightTattooParlor', 'www.instagram.com/InkInsightTattooParlor', ''),
(159, 159, 'www.facebook.com/HappyTrailsHikingGear', 'www.instagram.com/HappyTrailsHikingGear', ''),
(160, 160, 'www.facebook.com/TheSpinningWheelYarnShop', 'www.instagram.com/TheSpinningWheelYarnShop', ''),
(161, 161, 'www.facebook.com/PreciousPawsVeterinaryClinic', 'www.instagram.com/PreciousPawsVeterinaryClinic', ''),
(162, 162, 'www.facebook.com/SpiceHavenIndianCuisine', 'www.instagram.com/SpiceHavenIndianCuisine', ''),
(163, 163, 'www.facebook.com/CrescentCityComics', 'www.instagram.com/CrescentCityComics', ''),
(164, 164, 'www.facebook.com/UrbanOasisGardeningCenter', 'www.instagram.com/UrbanOasisGardeningCenter', ''),
(165, 165, 'www.facebook.com/TheCozyCornerBookstore', 'www.instagram.com/TheCozyCornerBookstore', ''),
(166, 166, 'www.facebook.com/FrostyFlavorsIceCreamParlour', 'www.instagram.com/FrostyFlavorsIceCreamParlour', ''),
(167, 167, 'www.facebook.com/TwinkleToesDanceAcademy', 'www.instagram.com/TwinkleToesDanceAcademy', ''),
(168, 168, 'www.facebook.com/UrbanJungleFitnessCenter', 'www.instagram.com/UrbanJungleFitnessCenter', ''),
(169, 169, 'www.facebook.com/WavelengthWellnessCenter', 'www.instagram.com/WavelengthWellnessCenter', ''),
(170, 170, 'www.facebook.com/SizzlingSkilletsCookingSchool', 'www.instagram.com/SizzlingSkilletsCookingSchool', ''),
(171, 171, 'www.facebook.com/StarlightStudiosPhotography', 'www.instagram.com/StarlightStudiosPhotography', ''),
(172, 172, 'www.facebook.com/TimelessTreasuresJewelers', 'www.instagram.com/TimelessTreasuresJewelers', ''),
(173, 173, 'www.facebook.com/WhimsicalWondersToyStore', 'www.instagram.com/WhimsicalWondersToyStore', ''),
(174, 174, 'www.facebook.com/TerraNovaTechSolutions', 'www.instagram.com/TerraNovaTechSolutions', ''),
(175, 175, 'www.facebook.com/EnigmaEscapeRoomExperience', 'www.instagram.com/EnigmaEscapeRoomExperience', ''),
(176, 176, 'www.facebook.com/BellaVistaWeddingPlanners', 'www.instagram.com/BellaVistaWeddingPlanners', ''),
(177, 177, 'www.facebook.com/JazzyJavaCoffeehouse', 'www.instagram.com/JazzyJavaCoffeehouse', ''),
(178, 178, 'www.facebook.com/EastsideEatsFoodCourt', 'www.instagram.com/EastsideEatsFoodCourt', ''),
(179, 179, 'www.facebook.com/MetroMusicMania', 'www.instagram.com/MetroMusicMania', ''),
(180, 180, 'www.facebook.com/BlissfulMomentsEventPlanning', 'www.instagram.com/BlissfulMomentsEventPlanning', ''),
(181, 181, 'www.facebook.com/TheFlowerPotNursery', 'www.instagram.com/TheFlowerPotNursery', ''),
(182, 182, 'www.facebook.com/MysticMoonCrystalEmporium', 'www.instagram.com/MysticMoonCrystalEmporium', ''),
(183, 183, 'www.facebook.com/HappyTrailsOutfitters', 'www.instagram.com/HappyTrailsOutfitters', ''),
(184, 184, 'www.facebook.com/ToastyTreatsSandwichShop', 'www.instagram.com/ToastyTreatsSandwichShop', ''),
(185, 185, 'www.facebook.com/RainbowRoastCoffeeRoasters', 'www.instagram.com/RainbowRoastCoffeeRoasters', ''),
(186, 186, 'www.facebook.com/PetalPushersFloralDesign', 'www.instagram.com/PetalPushersFloralDesign', ''),
(187, 187, 'www.facebook.com/MidnightMysteriesBookClub', 'www.instagram.com/MidnightMysteriesBookClub', ''),
(188, 188, 'www.facebook.com/HavenSpa&WellnessCenter', 'www.instagram.com/HavenSpaWellnessCenter', ''),
(189, 189, 'www.facebook.com/ElementalEleganceDecor', 'www.instagram.com/ElementalEleganceDecor', ''),
(190, 190, 'www.facebook.com/LuminousLensesOptometry', 'www.instagram.com/LuminousLensesOptometry', ''),
(191, 191, 'www.facebook.com/RuggedRouteOutdoorGear', 'www.instagram.com/RuggedRouteOutdoorGear', ''),
(192, 192, 'www.facebook.com/SpiceIslandCuisine', 'www.instagram.com/SpiceIslandCuisine', ''),
(193, 193, 'www.facebook.com/WhiskWhimsyBakery', 'www.instagram.com/WhiskWhimsyBakery', ''),
(194, 194, 'www.facebook.com/CloudNineCafe', 'www.instagram.com/CloudNineCafe', ''),
(195, 195, 'www.facebook.com/VibrantVisionEyewear', 'www.instagram.com/VibrantVisionEyewear', ''),
(196, 196, 'www.facebook.com/SassyStitchesSewingStudio', 'www.instagram.com/SassyStitchesSewingStudio', ''),
(197, 197, 'www.facebook.com/RusticRootsFarm-to-Table', 'www.instagram.com/RusticRootsFarm-to-Table', ''),
(198, 198, 'www.facebook.com/AdventureAwaitsTravelAgency', 'www.instagram.com/AdventureAwaitsTravelAgency', ''),
(199, 199, 'www.facebook.com/BeyondBordersInternationalMarket', 'www.instagram.com/BeyondBordersInternationalMarket', ''),
(200, 200, 'www.facebook.com/EvergreenEssentialsNaturalProducts', 'www.instagram.com/EvergreenEssentialsNaturalProducts', ''),
(201, 201, 'www.facebook.com/OasisOasisTanningSalon', 'www.instagram.com/OasisOasisTanningSalon', ''),
(202, 202, 'www.facebook.com/TerraTunesMusicLessons', 'www.instagram.com/TerraTunesMusicLessons', ''),
(203, 203, 'www.facebook.com/MystiqueMagicSupplies', 'www.instagram.com/MystiqueMagicSupplies', ''),
(204, 204, 'www.facebook.com/FurryFriendsGroomingSalon', 'www.instagram.com/FurryFriendsGroomingSalon', ''),
(205, 205, 'www.facebook.com/ZephyrZenithAirConditioning', 'www.instagram.com/ZephyrZenithAirConditioning', ''),
(206, 206, 'www.facebook.com/PolishedPawsPetGrooming', 'www.instagram.com/PolishedPawsPetGrooming', ''),
(207, 207, 'www.facebook.com/SweetEscapeConfectionery', 'www.instagram.com/SweetEscapeConfectionery', ''),
(208, 208, 'www.facebook.com/VintageVibesClothingCo.', 'www.instagram.com/VintageVibesClothingCo', ''),
(209, 209, 'www.facebook.com/Elegance&EdgeHairSalon', 'www.instagram.com/EleganceEdgeHairSalon', ''),
(210, 210, 'www.facebook.com/TheColorPalettePaintStudio', 'www.instagram.com/TheColorPalettePaintStudio', ''),
(211, 211, 'www.facebook.com/CoastalComfortFurniture', 'www.instagram.com/CoastalComfortFurniture', ''),
(212, 212, 'www.facebook.com/MoonlitMeadowsFloralBoutique', 'www.instagram.com/MoonlitMeadowsFloralBoutique', ''),
(213, 213, 'www.facebook.com/FiresideChatsCafe', 'www.instagram.com/FiresideChatsCafe', ''),
(214, 214, 'www.facebook.com/WhirlwindWorkoutsGym', 'www.instagram.com/WhirlwindWorkoutsGym', ''),
(215, 215, 'www.facebook.com/DapperDoodlesPetBoutique', 'www.instagram.com/DapperDoodlesPetBoutique', ''),
(216, 216, 'www.facebook.com/UrbanUpcyclesRecycledGoods', 'www.instagram.com/UrbanUpcyclesRecycledGoods', ''),
(217, 217, 'www.facebook.com/MorningDewLandscaping', 'www.instagram.com/MorningDewLandscaping', ''),
(218, 218, 'www.facebook.com/TwinkleTownToyEmporium', 'www.instagram.com/TwinkleTownToyEmporium', ''),
(219, 219, 'www.facebook.com/SerenadeSoundsMusicAcademy', 'www.instagram.com/SerenadeSoundsMusicAcademy', ''),
(220, 220, 'www.facebook.com/SizzlingSkilletsCookingClasses', 'www.instagram.com/SizzlingSkilletsCookingClasses', ''),
(221, 221, 'www.facebook.com/LuxeLivingInteriors', 'www.instagram.com/LuxeLivingInteriors', ''),
(222, 222, 'www.facebook.com/TheQuirkyQuillStationeryStore', 'www.instagram.com/TheQuirkyQuillStationeryStore', ''),
(223, 223, 'www.facebook.com/GildedGalaxyJewelry', 'www.instagram.com/GildedGalaxyJewelry', ''),
(224, 224, 'www.facebook.com/UrbanHarvestFarmersMarket', 'www.instagram.com/UrbanHarvestFarmersMarket', ''),
(225, 225, 'www.facebook.com/ThePaperCraneOrigamiStudio', 'www.instagram.com/ThePaperCraneOrigamiStudio', ''),
(226, 226, 'www.facebook.com/SummitSolutionsConsulting', 'www.instagram.com/SummitSolutionsConsulting', ''),
(227, 227, 'www.facebook.com/SunflowerSmilesDaycare', 'www.instagram.com/SunflowerSmilesDaycare', ''),
(228, 228, 'www.facebook.com/SwirlSipWineBar', 'www.instagram.com/SwirlSipWineBar', ''),
(229, 229, 'www.facebook.com/HighVoltageElectronics', 'www.instagram.com/HighVoltageElectronics', ''),
(230, 230, 'www.facebook.com/CrystalClearCleaningServices', 'www.instagram.com/CrystalClearCleaningServices', ''),
(231, 231, 'www.facebook.com/ZenithZoneMeditationCenter', 'www.instagram.com/ZenithZoneMeditationCenter', ''),
(232, 232, 'www.facebook.com/TheLavishLoftHomeDecor', 'www.instagram.com/TheLavishLoftHomeDecor', ''),
(233, 233, 'www.facebook.com/GourmetGazeFoodTours', 'www.instagram.com/GourmetGazeFoodTours', ''),
(234, 234, 'www.facebook.com/NobleNibblesCateringCo', 'www.instagram.com/NobleNibblesCateringCo', ''),
(235, 235, 'www.facebook.com/CoastalCanvasArtStudio', 'www.instagram.com/CoastalCanvasArtStudio', ''),
(236, 236, 'www.facebook.com/BlissfulBalanceSpaWellnes', 'www.instagram.com/BlissfulBalanceSpaWellness', ''),
(237, 237, 'www.facebook.com/MysticMeadowsBotanicals', 'www.instagram.com/MysticMeadowsBotanicals', ''),
(238, 238, 'www.facebook.com/StellarStitchesEmbroidery', 'www.instagram.com/StellarStitchesEmbroidery', ''),
(239, 239, 'www.facebook.com/ToastedTreatsSandwichShop', 'www.instagram.com/ToastedTreatsSandwichShop', ''),
(240, 240, 'www.facebook.com/BountifulBitesCatering', 'www.instagram.com/BountifulBitesCatering', ''),
(241, 241, 'www.facebook.com/CelestialCelebrationsEventPlanning', 'www.instagram.com/CelestialCelebrationsEventPlanning', ''),
(242, 242, 'www.facebook.com/CoastalCutleryKitchenSupplies', 'www.instagram.com/CoastalCutleryKitchenSupplies', ''),
(243, 243, 'www.facebook.com/PetalPlumeFlorist', 'www.instagram.com/PetalPlumeFlorist', ''),
(244, 244, 'www.facebook.com/HavenHavenHomeDecor', 'www.instagram.com/HavenHavenHomeDecor', ''),
(245, 245, 'www.facebook.com/DreamyDelightsDesserts', 'www.instagram.com/DreamyDelightsDesserts', ''),
(246, 246, 'www.facebook.com/TheDailyGrindCoffeeShop', 'www.instagram.com/TheDailyGrindCoffeeShop', ''),
(247, 247, 'www.facebook.com/UrbanUtopiaLandscapeDesign', 'www.instagram.com/UrbanUtopiaLandscapeDesign', ''),
(248, 248, 'www.facebook.com/TastyTraditionsBakery', 'www.instagram.com/TastyTraditionsBakery', ''),
(249, 249, 'www.facebook.com/VelvetVisionsFashionBoutique', 'www.instagram.com/VelvetVisionsFashionBoutique', ''),
(250, 250, 'www.facebook.com/VintageVibesThriftStore', 'www.instagram.com/VintageVibesThriftStore', '');

-- --------------------------------------------------------

--
-- Table structure for table `business_list`
--

CREATE TABLE `business_list` (
  `bus_id` bigint(20) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `BusinessName` varchar(255) NOT NULL,
  `Businesslogo` varchar(255) NOT NULL,
  `BusinessEmail` varchar(255) NOT NULL,
  `BusinessBranch` varchar(255) NOT NULL,
  `BusinessEstablish` varchar(255) NOT NULL,
  `BusinessDescrip` text NOT NULL,
  `BusinessNumber` varchar(255) NOT NULL,
  `BusinessOpenHour` varchar(255) NOT NULL,
  `BusinessCloseHour` varchar(255) NOT NULL,
  `BusinessAddress` varchar(255) NOT NULL,
  `BusinessBrgy` varchar(255) NOT NULL,
  `BusinessCategory` varchar(255) DEFAULT NULL,
  `BusinessSubCategory` varchar(255) NOT NULL,
  `BusinessStatus` varchar(255) NOT NULL,
  `BusinessRemarks` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `capitalization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_list`
--

INSERT INTO `business_list` (`bus_id`, `ownerId`, `BusinessName`, `Businesslogo`, `BusinessEmail`, `BusinessBranch`, `BusinessEstablish`, `BusinessDescrip`, `BusinessNumber`, `BusinessOpenHour`, `BusinessCloseHour`, `BusinessAddress`, `BusinessBrgy`, `BusinessCategory`, `BusinessSubCategory`, `BusinessStatus`, `BusinessRemarks`, `zone`, `district`, `capitalization`) VALUES
(1, 18, 'F.M. Auto Parts', '65696f0cbf8f1.jpg', 'fmautoshop@gmail,com', 'South-Caloocan Branch', '2003-01-25', 'A computer shop centre is a place where services like word processing, data processing, accounting, fax facilities, internet café, photocopying, lamination, typing, scanning, binding, online registrations, digital passports, instant photo printing. With best location, this business can fetch revenues and profit.A computer business centre is a place where services like word processing, data processing, accounting, fax facilities, internet café, photocopying, lamination, typing, scanning, binding, online registrations, digital passports, instant photo printing. With best location, this business can fetch revenues and profit.A computer business centre is a place where services like word processing, data processing, accounting, fax facilities, internet café, photocopying, lamination, typing, scanning, binding, online registrations, digital passports, instant photo printing. With best location, this business can fetch revenues and profit.A computer business centre is a place where services like word processing', '09212023063', '08:00', '17:00', '38 Zapote St. Bagong Barrio Caloocan City', '133', '6', '50', '2', '', '', '', ''),
(2, 18, 'B & C Marketing Suppy', '6569715fccb3c.png', 'bandcmarketing@gmail.com', 'Sangandaan Branch', '2009-09-09', 'a symbol, offering immediate recognition of a business and its products and services.', '09472003754', '08:00', '17:00', '1 A. MABINI ST. SANGANDAAN CALOOCAN CITY', '1', '4', '28', '2', '', '', '', ''),
(3, 18, 'Ken Pharmacy', '65697ff100c6f.jpg', 'kenpharmacy@gmailcom', 'Caloocan Branch - South', '2019-09-05', 'A store where medicinal drugs are dispensed and sold. The local pharmacy', '09770688500', '08:00', '17:00', '30 A. MABINI ST. BARANGAY 2 SANGANDAAN CALOOCAN CITY', '2', '5', '43', '2', '', '', '', ''),
(4, 18, 'Santi Breadfood Store', '65698132c911f.jpg', 'santibreadfood@gmail.com', 'Sangandaan Branch', '2003-04-24', 'Bread is a staple food prepared from a dough of flour (usually wheat) and water, usually by baking.', '09770688500', '08:00', '17:00', '38 A. MABINI ST. BARANGAY 3 SANGANDAAN CALOOCAN CITY', '3', '4', '34', '2', '', '', '', ''),
(5, 18, 'Renzy MotorShop', '6569825d87849.jpg', 'Renzymotorshop@gmail.com', 'Sangandaan Branch - Near UE Caloocan', '2006-11-30', 'Means premises used for the general repair and servicing of light motor vehicles,', '09770688500', '08:00', '17:00', '39 MABINI ST. BARANGAY 4 SANGANDAAN CALOOCAN CITY', '4', '10', '78', '2', '', '', '', ''),
(6, 18, 'M&M Car Wash and Auto', '65698337be6a3.jpg', 'm&mcarwash@gmail.com', 'Sangandaan Branch - Near Police Station', '2019-02-01', 'Means premises used for the general repair and carwash of light motor vehicles,', '09770688500', '08:00', '17:00', '2 TORRES BUGALLON ST. BARANGAY 5 SANGANDAAN CALOOCAN CITY', '5', '10', '89', '2', '', '', '', ''),
(7, 18, 'F. ESGUERRA INDUSTRIES INC.', '65698460ed32c.png', 'esguerra@gmail.com', 'J. Felipe Branch - Caloocan', '2006-04-04', 'Economic activity concerned with the processing of raw materials and manufacture of goods in factories.', '09770688500', '08:00', '17:00', '21 FILI ST. BARANGAY 6 SANGANDAAN CALOOCAN CITY', '6', '11', '99', '2', '', '', '', ''),
(8, 18, '419 ENTERPRISES (METALPARTS)', '65698634206ac.jpg', '419enterprise@gmail.com', 'South Caloocan Branch', '2015-03-13', ' Project or undertaking, typically one that is difficult or requires effort.', '09770688500', '08:00', '17:00', '21 J. FELIPE ST. BARANGAY 7 CALOOCAN CITY', '7', '6', '56', '4', '', '', '', ''),
(9, 18, 'BARK-ANIMAL CENTER', '656987fb8d73a.png', 'bark-animal@gmail.com', 'Sugpo Caloocan Branch', '2014-05-26', 'An establishment, esp. one supported by charitable contributions, that provides a temporary home for dogs, cats, and other animals that are offered for adoption.', '09770688500', '08:00', '17:00', '243 SABALO ST. BARANGAY 7 CALOOCAN CITY', '8', '5', '36', '2', '', '', '', ''),
(10, 18, 'Ceddie Training Center', '656989e78f631.jpg', 'ceddietrainingcenter@gmail.com', 'PNR Compound Caloocan Branch', '2017-03-30', 'a place where people undergo skills training for work', '09472003754', '08:00', '17:00', '126 TORRES BUGALLON ST. CALOOCAN CITY', '9', '1', '1', '2', '', '', '', ''),
(11, 18, 'Ceddie Training Center', '65698a41ad289.jpg', 'ceddietrainingcenter@gmail.com', 'PNR Compound Caloocan Branch', '2018-09-28', 'a place where people undergo skills training for work', '09472003754', '08:00', '17:00', '126 TORRES BUGALLON ST. CALOOCAN CITY', '9', '1', '1', '2', '', '', '', ''),
(12, 19, 'C & G Printing Enterprises', '65698ccf70b93.jpg', 'c&gprinting@gmail.com', 'South Caloocan Branch', '2018-03-05', 'the art, process, or business of producing books, newspapers, etc., by impression from movable types, plates, etc.', '09472003754', '08:00', '17:00', '12 2ND ST. LAKAS NG MAHIRAP EXTENSION BARANGAY 11 CALOOCAN CITY', '11', '6', '49', '2', '', '', '', ''),
(13, 19, 'Kalizza Auto Salon & Spa', '65698e60c9468.png', 'kallizaautospa@gmail.com', 'Dagat-Dagatan Caloocan Branch', '2014-03-02', 'spas are considered to spend whole day, getting multifarious treatments and procedures to relax, revitalize and improve general health.', '09472003754', '08:00', '17:00', '130 KAPAK ALLEY ST. BARANGAY 12 CALOOCAN CITY', '12', '5', '39', '2', '', '', '', ''),
(14, 19, 'Francis Photography Studio', '656990f2d8861.png', 'francisphotography@gmail.com', 'A. Bato Caloocan Branch', '2021-06-25', 'Which derives from the Greek photo, meaning light and graph, meaning to draw.', '09212023063', '08:00', '17:00', '38 A. Bato St. Barangay 13 Caloocan City', '13', '2', '18', '2', '', '', '', ''),
(15, 20, 'Four-Story Book Shop', '656993952edad.png', '4storybookshop@gmail.com', 'Paros Caloocan Branch', '2019-09-25', 'A bookstore is a store that sells books, and where people can buy them. A used bookstore or second-hand bookshop sells and often buys used books.', '09770688500', '08:00', '17:00', '38 Paros Alley St. Dagat-Dagatan Caloocan City', '14', '7', '64', '2', '', '', '', ''),
(16, 20, 'Cennat Videography and Studio', '656996ac9b848.png', 'Cennatvideography@gmail.com', 'P. Zamora - Caloocan Branch', '2018-08-27', 'Videographers film or videotape private ceremonies or special events, such as weddings.', '09770688500', '08:00', '17:00', '65 P. Zamora St. Barangay 15 Caloocan City', '15', '2', '15', '2', '', '', '', ''),
(17, 20, 'Kielzy Music Studio', '656998113cd8b.png', 'Kielzymusicstudio@gmail.com', 'Sunflower Street - Caloocan Branch', '2017-04-28', ' A place equipped for recording music and music video. ', '09212023063', '08:00', '17:00', '118 Tamban St. Barangay 16 Caloocan City', '16', '2', '16', '2', '', '', '', ''),
(18, 20, 'Ferds Gadgets and Repair Shop', '6569997726900.jpg', 'ferdsgadgets@gmail.com', 'P. Zamora Interior - Caloocan Branch', '2019-03-02', 'A small mechanical or electronic device or tool, especially an ingenious or novel one.', '09212023063', '08:00', '17:00', '18 P. Zamora Interior St. Barangay 17 Caloocan City', '17', '7', '57', '2', '', '', '', ''),
(19, 21, 'Olly Plastic Warehouse', '65699c344b7fb.jpg', 'Ollyplasticwarehouse@gmail.com', 'Libis Espina - Caloocan Branch', '2018-02-05', 'A warehouse is a large building where raw materials or manufactured goods are stored until they are exported to other countries or distributed to shops to be sold.', '09212023065', '08:00', '17:00', 'Blk 1 312 Libis Espina St. Barangay 18 Caloocan City', '18', '1', '7', '2', '', '', '', ''),
(20, 21, 'F-Tech Enterprises', '65699e45e188b.png', 'ftechenterprise@gmail.com', 'Doña Rita - Caloocan Branch', '2014-09-24', 'An F-Tech Enterprise is a company or business, often a small one. There are plenty of small industrial enterprises. ', '09472003754', '08:00', '17:00', '35 DOÑA RITA ST. BLK 3 BARANGAY 19 CALOOCAN CITY', '19', '6', '53', '2', '', '', '', ''),
(21, 21, 'King JT Laundry Shop', '6569a10df187a.png', 'Kingjtlaundry@gmail.com', 'Tahong Street - Caloocan Branch (Beside Kaunlaran Elem. School)', '2017-10-30', 'Laundry service is responsible for providing an adequate, clean and constant supply of linen to all users.', '09770688500', '08:00', '17:00', 'Blk 3 Tamusak St. Barangay 20 Caloocan City', '20', '1', '4', '2', '', '', '', ''),
(22, 22, 'Famtel Staycation', '6569a3d3f28a9.png', 'famtel@gmail.com', 'A. Mabini - Caloocan Branch', '2012-08-28', 'A building where you pay to have a room to sleep in: stay at/in a hotel. The visitors had paid for him to fly to location and stay in a hotel for a week or months.', '09472003754', '08:00', '17:00', '156 Sinampalukan St. A. Mabini Barangay 21 Caloocan City', '21', '8', '67', '2', '', '', '', ''),
(23, 22, '2010 Internet Cafe', '6569a900c0c28.png', '2010internetcafe@gmail.com', 'Oiland Petrofields', '2019-08-27', 'A small business where you can pay to use the internet, and which may also serve food and drinks.', '09472003754', '08:00', '17:00', '188 TILAPIA ST. BARANGAY 22 CALOOCAN CITY', '22', '6', '55', '4', '', '', '', ''),
(24, 22, 'Minegrind Hardware', '6569aa613af7f.jpg', 'Minegrind@gmail.com', 'Kabulusan Uno - Caloocan Branch', '2015-01-04', 'Computer Hardware are physical components used to make computer. Tools is a program used for software development.', '09770688500', '08:00', '17:00', '198 Silangan St. Barangay 23 Caloocan City', '23', '7', '58', '2', '', '', '', ''),
(25, 23, 'Motor-Swap Shop', '6569ac90307cc.jpg', 'Motorswapshop@gmail.com', 'Perpetua Side - South Caloocan Branch', '2010-08-21', 'In motor tuning culture, an engine swap is the process of removing a motor\'s original engine and replacing it with another. This may be a like-for-like replacement, or to install a non-factory specification engine.', '09212023063', '08:00', '17:00', '178 Mithi St. Barangay 24 Caloocan City', '24', '10', '78', '2', '', '', '', ''),
(26, 23, 'Lexian Marketing Merchandises', '6569ae7a31516.png', 'Lexianmarketingmerch@gmail.com', 'C. Namie - Caloocan Branch', '2017-11-29', 'Computer Hardware are physical components used to make computer. Tools is a program used for software development.', 'Merchandise marketing is the process of creating awareness and customer loyalty using merchandise. By merchandise, we mean any tangible item such as t-shirts, thank-you cards, gift cards, flowers, a new sports car, etc.', '08:00', '17:00', 'Blk 3, Unit 4 18 C. Namie St. Barangay 25 Caloocan City', '25', '1', '3', '2', '', '', '', ''),
(27, 23, 'E. Francisco Apartment', '6569afe1eaef6.png', 'EFranciscoapartment@gmail.com', 'Silanganan Street - Caloocan Branch', '2017-10-28', 'An apartment is a private residence in a building or house that\'s divided into several separate dwellings. An apartment can be one small room or several. An apartment is a flat — it\'s usually a few rooms that you rent in a building.', '09472003754', '08:00', '17:00', '344 Nadurata St. Barangay 26 Caloocan City', '26', '8', '69', '2', '', '', '', ''),
(28, 23, 'Chem-High Tradings', '6569b21b9b916.png', 'Chemhightradings@gmail.com', 'Laon-Laan Street - Caloocan Branch', '2004-08-29', 'the voluntary exchange of goods or services between economic actors.', '09212023063', '08:00', '17:00', 'Blk 2 Unit 4 156 P. Castillo St. Barangay 27 Caloocan City', '27', '9', '72', '2', '', '', '', ''),
(29, 23, 'J & M SKINCARE SERVICES', '6569b3ebb62a8.png', 'J&mskincareservices@gmail.com', 'Torcillo Alley St - Caloocan Branch', '2016-09-28', 'Skin care is a range of practices that support skin integrity, enhance its appearance, and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure, and appropriate use of emollients.', '09212023063', '08:00', '17:00', '122 Tabala St. Barangay 28 Caloocan City, Metro Manila', '28', '5', '39', '2', '', '', '', ''),
(30, 24, 'Metal Industries Corporation', '6569bb52abdbe.jpg', 'metalindustriescorp@gmail.com', 'Taytay Street - Caloocan Branch', '2001-08-27', ' any business, either new or a proposed expansion of such Metal Business which is intended to be involved in the manufacturing and/or processing of metals, including, but not limited to the following operations: grinding, sanding, plating, electoplating welding, deburring, heating, heat treating.', '09212023063', '08:00', '17:00', '122 Tabala St. Barangay 28 Caloocan City, Metro Manila', '30', '6', '48', '2', '', '', '', ''),
(31, 24, 'Siomai Food House', '6569bc6267961.png', 'Siomaifoodhouse@gmail.com', 'Bagong Sibol Street - Caloocan City', '2007-10-29', 'a popular Chinese dumpling that captivated the hearts of many Filipinos with its chunky and flavorful filling.', '09212023063', '08:00', '17:00', '16 Dimasalang St. Barangay 31 Caloocan City, Metro Manila', '31', '4', '29', '2', '', '', '', ''),
(32, 24, 'JJ Builders Corporations', '6569be6478be1.png', 'Jjbuilderscorporations@gmail.com', 'Bagong Sibol Street - Caloocan City', '2003-08-27', 'A. Mabini Street - Caloocan Branch', '09212023063', '08:00', '17:00', '19 A. Mabini St. Barangay 32 Caloocan City', '32', '6', '55', '2', '', '', '', ''),
(33, 24, 'Romeo Food Door to Door Delivery Services', '656ac2992f78d.png', 'Romeodoortodoor@gmail.com', 'Pateros Street - Caloocan Branch', '2015-09-28', 'Door-to-door is a shipping arrangement where goods are delivered from the sender to the customer. Door-to-door is also known as house-to-house service. Ready for the future of logistics', '09472003754', '08:00', '17:00', '26 Taguig St. Barangay 35 Pateros Caloocan City', '35', '4', '29', '2', '', '', '', ''),
(34, 24, 'Ed.Co Aircon Repair', '656ac3f5094ec.png', 'Edcoairconrepair@gmail.com', 'Mariano Street - Caloocan Branch', '2013-04-23', 'Carrier An air conditioner provides cold air inside your home or enclosed space by actually removing heat and humidity from the indoor air. It returns the cooled air to the indoor space, and transfers the unwanted heat and humidity outside', '09212023063', '08:00', '17:00', '153 Gudio 4 St. Barangay 33 A. Mabini Caloocan City, Metro Manila', '33', '1', '13', '2', '', '', '', ''),
(35, 25, 'Jaydie Beauty Salon & Spa', '656ac62ae86b9.png', 'Jaydiebeautysalon@gmail.com', 'B. Santos Street - Caloocan Branch', '2015-03-15', 'Shampooing, styling, cutting and colouring hair, massaging and treating scalps. Performing manicures, pedicures and facials depending upon the customer\'s requirement. Performing temporary and permanent hair removal treatments, such as waxing and chemical hair removal.', '09472003754', '08:00', '17:00', '132 Gloria St. Barangay 34 B. Santos Caloocan City, Metro Manila', '34', '5', '39', '2', '', '', '', ''),
(36, 25, 'Jaydie Beauty Salon & Spa', '656ac673be4a6.png', 'Jaydiebeautysalon@gmail.com', 'B. Santos Street - Caloocan Branch', '2016-09-28', 'Shampooing, styling, cutting and colouring hair, massaging and treating scalps. Performing manicures, pedicures and facials depending upon the customer\'s requirement. Performing temporary and permanent hair removal treatments, such as waxing and chemical hair removal.', '09472003754', '08:00', '17:00', '132 Gloria St. Barangay 34 B. Santos Caloocan City, Metro Manila', '34', '5', '39', '2', '', '', '', ''),
(37, 25, 'Tito Gab\'s Food & Catering Services', '656ac97c31b97.jpg', 'Titogabscatering@gmail.com', 'Molave Street - Caloocan Branch', '2012-10-16', 'the process or business of preparing food and providing food services for clients at remote locations, such as hotels, restaurants, offices, concerts, and events. Companies that offer food, drinks, and other services to various customers, typically for special occasions, make up the catering sector.', '09472003754', '08:00', '17:00', '12 Narra St. Barangay 36 Caloocan City', '36', '4', '31', '2', '', '', '', ''),
(38, 25, 'Marckie\'s Paper Crafts', '656acb25ac72e.png', 'Marckiepapercraft@gmail.com', 'Bustos - Caloocan Branch', '2011-04-21', 'the activity of making things from paper, or a particular type of this activity: The store specializes in textile art and papercraft. They run regular workshops in card making and other papercrafts.', '09472003754', '08:00', '17:00', '73 Astorga - Bayani St. Barangay 37 Caloocan City, Metro Manila', '37', '6', '51', '2', '', '', '', ''),
(39, 25, 'M. Juan Online Shop', '656acd43ba53d.png', 'Mjuanonlieshop@gmail.com', 'Pakiusap Street - Caloocan Branch', '2020-04-21', 'Online shopping involves purchasing products or services over the Internet.', '09472003754', '08:00', '17:00', '12 Pakusap St. Barangay 38 Caloocan City', '38', '7', '60', '2', '', '', '', ''),
(40, 26, 'C.A.C. Industrial Supply', '656acf8d706c7.jpg', 'Cacindustrialsupply@gmail.com', 'Northern Caloocan District - Caloocan Branch', '2011-01-30', 'Production of defense equipment in the aerospace, construction business, machinery, electrical equipment, and others. ', '09472003754', '08:00', '17:00', '1 Aguilar St. District 2 Barangay 39 Caloocan City', '39', '6', '48', '2', '', '', '', ''),
(41, 26, 'Gen. Malda Motorcycle Shop', '656ad1b7b27d3.jpg', 'Genmaldamotorcycle@gmail.com', '1st Avenue - Caloocan Branch', '2016-11-26', 'A road vehicle with two wheels, driven by an engine, with one seat for the driver and often a seat for a passenger behind the driver.', '09472003754', '08:00', '17:00', '12 Aguilar St. District 2 Barangay 39 Caloocan City', '40', '10', '78', '2', '', '', '', ''),
(42, 26, 'Yannie Housekeeping Services', '656ad4230e570.png', 'Yanniehousekeeping@gmail.com', 'D. Alger - Caloocan Branch', '2018-04-24', 'The work or activity of cleaning and preparing rooms for customers (as in a hotel)', '09472003754', '08:00', '17:00', '135 Felix Roxas St. Barangay 41 Caloocan City, Metro Manila', '41', '1', '5', '2', '', '', '', ''),
(43, 27, 'Mae-Lyn Pawnshops', '656ad5ab2b78f.jpg', 'maelynpawnshops@gmail.com', 'Lakambini St - Caloocan Branch', '2011-10-25', 'A store that lends money in exchange for a valuable thing that they can sell if the person leaving it does not pay an agreed amount of money by an agreed time', '09472003754', '08:00', '17:00', 'Blk 4 13 Katipunan St. Barangay 42 Caloocan City, Metro Manila', '42', '3', '25', '2', '', '', '', ''),
(44, 27, 'Ellie Intercommunication Shop', '656ad739cd5b4.png', 'Ellieintercommshop@gmail.com', 'Ana Bustamante - Caloocan Branch', '2017-06-12', 'A set of communications devices that allows people in different parts of a building, aircraft, ship, etc., to speak to each other.', '09472003754', '08:00', '17:00', '189 Anna Bustamante St. Barangay 39 Caloocan City, Metro Manila', '43', '2', '15', '2', '', '', '', ''),
(45, 27, 'Celio Clothing', '656ad8168345f.png', 'Celioclothing@gmail.com', '3RD Avenue - Caloocan Branch', '2019-03-08', 'Any item worn on the body. Typically, clothing is made of fabrics or textiles, but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment, put together.', '09472003754', '08:00', '17:00', '144 P. Sevilla St. Barangay 44 Caloocan City, Metro Manila', '44', '7', '62', '2', '', '', '', ''),
(46, 28, 'Pureblending Food Shop', '656adb90364f1.png', 'Pureblendshop@gmail.com', 'Roland Street - Caloocan Branch', '2017-06-05', 'A shop selling ready-to-eat food products. synonyms: deli, delicatessen.', '09472003754', '08:00', '17:00', '9 Felix Roxas St. Baliwag Bus Barangay 45 Caloocan City, Metro Manila', '45', '4', '33', '2', '', '', '', ''),
(47, 28, 'Hivelabs Training Court', '656adc8708dab.png', 'hivelabs@gmail.com', 'L. Nadarata Street - Caloocan Branch', '2018-05-01', 'The most common foods that can cause hives if you are allergic include milk, egg, wheat, soy, fish, shellfish, peanut, and tree nuts.', '09212023063', '08:00', '17:00', '8 L. Nadurata St. barangay 46 Caloocan City, Metro Manila', '46', '4', '34', '2', '', '', '', ''),
(48, 28, 'Gelo\'s Steel Equipment', '656add946850f.jpg', 'Gelosteelequipment@gmail.com', 'C. Cordero Street - Caloocan Branch', '2014-05-23', 'The most common foods that can cause hives if you are allergic include milk, egg, wheat, soy, fish, shellfish, peanut, and tree nuts.', 'A hard, tough metal composed of iron alloyed with various small percentages of carbon and often variously with other metals, as nickel, chromium, manganese, etc., to produce hardness, resistance to rusting, etc.', '08:00', '17:00', '163 C. Cordero St. 4th Avenue Barangay 47 Caloocan City, Metro Manila', '47', '3', '21', '2', '', '', '', ''),
(49, 29, 'Hiro Food Warehouse', '656ae6943b177.jpg', 'Hirofoodwarehouse@gmail.com', 'A. Del Mundo Street - Caloocan Branch', '2013-09-27', 'Any premises, establishment, building, room area, facility, or place, in whole or in part, where food is stored, kept, or held for wholesale distribution to other wholesalers or to retail outlets, restaurants, and any such other facility selling or distributing to the ultimate consumer.', '09472003754', '08:00', '17:00', '16 J. Teodoro St. 4th Avenue Caloocan City, Metro Manila', '48', '1', '7', '2', '', '', '', ''),
(50, 29, 'Florist Pawnshop', '656ae89d85a20.jpg', 'Floristpawnshop@gmail.com', '6th Avenue - Caloocan Branch', '2009-08-26', 'A store that lends money in exchange for a valuable thing that they can sell if the person leaving it does not pay an agreed amount of money by an agreed time', '09212023063', '08:00', '17:00', '54 6th Avenue St. Grace Park Caloocan City', '50', '3', '25', '2', '', '', '', ''),
(51, 29, 'Hey-Gold Pawnshop', '656ae935e9177.jpg', 'heygoldpawnshop@gmail.com', '6th Avenue - Grace Park Caloocan Branch', '2013-04-22', 'a store that lends money in exchange for a valuable thing that they can sell if the person leaving it does not pay an agreed amount of money by an agreed time', '09212023063', '08:00', '17:00', '413 6th Avenue St. Barangay 49 Caloocan City, Metro Manila', '49', '3', '25', '2', '', '', '', ''),
(52, 29, 'AKAPE Cafe', '656aea997fac2.jpg', 'Akapecafe@gmail.com', 'D. Aquino - Caloocan Branch', '2022-07-26', 'An establishment that primarily serves various types of coffee, espresso, latte, and cappuccino. ', '09212023063', '08:00', '17:00', '41 D. Aquino St. Barangay 50 Caloocan City, Metro Manila', '50', '4', '32', '2', '', '', '', ''),
(53, 30, 'Underbones Vehicle Shop', '656aedfdba896.png', 'underbonesvehicleshop@gmail.com', 'Briones - Caloocan Branch', '2018-06-26', 'An establishment where automobiles are repaired by auto mechanics and technicians.', '09212023063', '08:00', '17:00', '1  Yabut - Briones St. Barangay 51 Caloocan City, Metro Manila', '51', '10', '79', '2', '', '', '', ''),
(54, 31, 'D\' ROYALE', '656c489c2e96a.png', 'droyalefire_safety@gmail.com', 'Bagong Barrio', '2014-06-12', 'Welcome to D\'ROYALE fire safety equipment shop, your premier destination for all your fire safety equipment needs. With a commitment to protecting lives and property, we specialize in providing top-quality fire safety products, expert advice, and exceptional customer service. Whether you\'re a homeowner, business owner, or fire safety professional, we have everything you need to ensure the highest level of fire preparedness..', '09754586442', '08:00', '17:00', '246 Gregoria de Jesus, Bagong Barrio West, Caloocan, 1400 Metro Manila, Philippines ', '138', '11', '100', '2', '', '', '', ''),
(100, 100, 'Mader\'s Silog', '100.jpg', 'Mader\'sSilog@gmail.com', 'Caloocan Branch', '15/10/2020', 'our tapsilog menu that can satisfy your cravings everyday', '0943 406 2543', '08:00', '17:00', '280 P.Gomez St., Grace Park West, 10th Avenue', '67', '4', '26', '1', '', '6', '2', '20000'),
(101, 100, 'Mama Tess Homemade Siomai', '101.jpg', 'MamaTessHomemadeSiomai@gmail.com', 'Caloocan Branch', '25/05/2020', 'We are driven to satisfy both the taste buds and pockets of the modern Pinoywith only the best product made from healthy local ingredient.', '9121441728', '08:00', '17:00', '161 P. Gomez st 10th ave', '9', '4', '26', '2', '', '6', '2', '15000'),
(102, 100, 'Manli Trading', '102.jpg', 'ManliTrading@gmail.com', 'Caloocan Branch', '05/11/2015', 'Motorcycle accessories are features and accessories selected by a motorcycle owner to enhance safety, performance, or comfort, and may include anything from mobile electronics to sidecars and trailers. An accessory may be added at the factory by the original equipment manufacturer or purchased and installed by the owner post-sale as aftermarket goods.', '9051755811', '08:00', '17:00', '240 10th Ave, Grace Park East,', '91', '10', '79', '2', '', '8', '2', '50000'),
(103, 100, 'Easy Day', '103.jpg', 'EasyDay@gmail.com', 'Caloocan Branch', '17/04/2017', 'A grocery store is a retail shop that primarily sells food, either fresh or preserved along with significant amounts of non-food products, such as household items like soaps, detergents, hygiene products and day to day essentials', '84330485', '08:00', '17:00', '113 10th ave.', '67', '4', '29', '2', '', '6', '2', '100000'),
(104, 100, 'DryWash', '104.jpg', 'DryWash@gmail.com', '10th ave Branch', '15/02/2014', 'A typical laundry service business transaction involves the customer dropping off their laundry, after which employees wash, dry and fold the clothes before the client returns to pay and pick up their belongings.', '84425711', '08:00', '17:00', '87 Victorio st.', '66', '1', '4', '2', '', '2', '2', '15000'),
(105, 101, 'MinMin Hardware', '105.jpg', 'MinMinHardware@gmail.com', 'Caloocan Branch', '10/11/2012', 'The business will sell hardware of all kinds, quality tools, paint, and housewares. We will purchase our products from three large wholesale buying groups.', '83425818', '08:00', '17:00', '79 Stotsengnurg st.', '66', '9', '7', '2', '', '2', '2', '90000'),
(106, 101, 'AAA Printing ', '106.jpg', 'AAAPrinting@gmail.com', 'Caloocan Branch', '03/12/2016', 'ABC Printing Co, a solutions-driven graphic communications company with a history of success connecting brands with consumers. While some companies simply provide products, ABC provides integrated solutions that deliver your message, change perceptions and drive sales. Think of us as your full-service creative agency without the agency fees.', '9166585806', '08:00', '17:00', '8 new abbey road', '73', '1', '9', '2', '', '8', '2', '30000'),
(107, 101, 'El Chubby\'s Pizza', '107.jpg', 'ElChubby\'sPizza@gmail.com', 'Samson Road Branch', '05/10/2019', 'Pizza na Swak sa Budget, pero Never Tinipid!', '0975 935 7029', '08:00', '17:00', '117 A Samson rd.', '80', '4', '29', '2', '', '7', '1', '20000'),
(108, 101, 'Santos Dental Clinic', '108.jpg', 'SantosDentalClinic@gmail.com', 'Samson Road Branch', '20/11/2005', 'My goal is to provide high quality general dentistry with a moderate to high price using the highest technology possible. My prices will be justified by the advanced technology used and the lifestyle conveniences that the dental practice will offer. The dental practice will be positioned as a place one can get high quality dental work in an environment of convenience and technology. Due to the increase in two-income families, many service-oriented professions are leaning toward differentiating themselves on the basis of convenience. This is what I intend to do when I have completely taken over this business from its previous owner and have hired an associate, namely my father. For instance, we plan to have two shifts, an early morning shift and an evening shift in which the practice will be fully functional from 7 A.M. to 7 P.M. or later on various days of the week. We also plan to work rotating weekends to offer Saturday service twice a month. We feel that the main beneficiaries to these services are professional, high-income individuals that do not feel that they can take time out from work to go to the dentist. We are also considering hiring part-time help to do filing and various other work during the day and to act as a sitter so that parents can leave their kids while they are receiving dental care.', '9171798791', '08:00', '17:00', '270 Samson rd,', '75', '5', '36', '2', '', '2', '2', '150000'),
(109, 101, 'RJD Liquors', '109.jpg', 'RJDLiquors@gmail.com', 'Caloocan Branch', '06/05/2007', 'Over the past 20+ years, we have helped over 1,000 entrepreneurs and business owners create business plans to start and grow their own liquor stores. On this page, we will first give you some background information with regards to the importance of business planning whether you are opening a new liquor store business or expanding an existing business. We will then go through a liquor store business plan template step-by-step so you can create your business plan today.', '922563214', '08:00', '17:00', '273 M.H Del Pilar', '90', '4', '35', '2', '', '8', '2', '500000'),
(110, 102, 'SSB Kitchen Equipment', '110.jpg', 'SSBKitchenEquipment@gmail.com', 'Caloocan Branch', '23/01/2006', 'The cooking equipment you use can determine the efficiency and flow of your entire kitchen. As you can well imagine the heart of any great kitchen is its chef, and behind every great chef, is the cooking equipment he or she depends.', '955382154', '08:00', '17:00', '232 2nd ave.', '120', '4', '27', '2', '', '10', '2', '500000'),
(111, 102, 'BMX Cycle', '111.jpg', 'BMXCycle@gmail.com', 'Caloocan Branch', '05/12/2001', 'retailer / wholesaler for bicycle parts and accessories ', '0922 801 3779', '08:00', '17:00', '41 Dagat-Dagatan Avenue, Kaunlaran Village', '14', '10', '80', '2', '', '2', '2', '50000'),
(112, 102, 'JayJay Ukay', '112.jpg', 'JayJayUkay@gmail.com', 'Caloocan Branch', '27/07/2013', 'Ukay-ukay is a term used both for the act of shopping by digging up piles of used or pre-loved clothes until one makes a good find. It also refers to retailers of secondhand clothes and accessories in the Philippines.', '982364782', '08:00', '17:00', '35 A. Mabini st. Maypajo', '33', '7', '62', '2', '', '3', '2', '10000'),
(113, 102, 'Prince House Décor', '113.jpg', 'PrinceHouseDécor@gmail.com', 'Caloocan Branch', '20/08/2011', 'People can choose these wallpapers to suit their personality and nature. People also want to personalize rooms for different members of their family as per their tastes. Wallpapers are especially good when you want fun prints on your walls inside of a single color of the paint.', '9753881369', '08:00', '17:00', '461 A. Mabini st.', '15', '6', '29', '2', '', '2', '2', '100000'),
(114, 102, 'Botika ni Carlo', '114.jpg', 'BotikaniCarlo@gmail.com', 'Caloocan Branch', '18/09/2022', 'Botika ng Bayan, more than just making medicines more affordable, the program also creates more jobs, more opportunities for Filipinos.', '9488348514', '08:00', '17:00', '319 A. Mabini st.', '185', '5', '43', '2', '', '16', '1', '20000'),
(115, 103, 'Café Morning', '115.jpg', 'CaféMorning@gmail.com', 'Caloocan Branch', '15/02/2015', 'The morning at Café Soleil is a symphony of aromatic delights and bustling activity. As the sun peeks over the horizon, casting a golden hue through the large windows, the café slowly comes to life. The inviting aroma of freshly ground coffee beans mingles with the scent of pastries baking in the oven, creating an irresistible allure that draws in patrons seeking their morning fix.', '87594426', '08:00', '17:00', '38 Asuncion, Morning Breeze Subdivision', '82', '4', '32', '2', '', '8', '1', '50000'),
(116, 103, 'Card Inc.', '116.jpg', 'CardInc.@gmail.com', 'Caloocan Branch', '16/05/2018', 'Card Inc. Loan Bank is a beacon of financial stability and trust in the bustling cityscape. Nestled amidst towering skyscrapers, its exterior boasts a modern architectural design, featuring sleek lines and a facade of glass and steel that reflects the vibrant energy of the metropolis. The entrance, flanked by polished marble columns, exudes an aura of sophistication and reliability.', '84225898', '08:00', '17:00', 'Blk 21 Lot 1-3 P.7B PH 9 Bagong Silang', '176', '6', '49', '2', '', '15', '1', '20000'),
(117, 103, 'Pink Splash', '117.jpg', 'PinkSplash@gmail.com', 'Caloocan Branch', '22/12/2018', 'Pink Splash Makeup is an enchanting haven for beauty enthusiasts, nestled in the heart of the city. Its storefront beckons passersby with a delightful mix of elegance and playfulness, boasting large windows adorned with whimsical pink accents that hint at the colorful world within.', '87724585', '08:00', '17:00', '153-143 F. Roxas St, Grace Park West', '55', '5', '39', '2', '', '5', '2', '15000'),
(118, 103, 'Fitness Grind', '118.jpg', 'FitnessGrind@gmail.com', 'Caloocan Branch', '30/05/2015', 'Welcome to Fitness Grind, where dedication meets transformation in a space pulsating with energy and motivation. Nestled in a vibrant corner of the city, the exterior of the gym exudes an industrial-chic vibe, with bold lettering and sleek architecture hinting at the powerhouse within.', '82357855', '08:00', '17:00', '123 8th St, Grace Park East,', '103', '5', '44', '2', '', '9', '2', '50000'),
(119, 103, 'Cyber Gadget', '119.jpg', 'CyberGadget@gmail.com', 'Caloocan Branch', '06/07/2016', 'A cyber gadget business is an enterprise at the forefront of technological innovation, offering a dazzling array of cutting-edge devices and accessories designed to enhance and complement the digital lifestyle. Nestled in a sleek, tech-infused space, this business serves as a haven for tech enthusiasts, early adopters, and anyone seeking the latest and greatest in the world of gadgets.', '84559672', '08:00', '17:00', '620-634 7th St, Grace Park East', '121', '7', '57', '2', '', '11', '2', '100000'),
(120, 104, 'Mabini Hotel', '120.jpg', 'MabiniHotel@gmail.com', 'Caloocan Branch', '19/11/2009', 'Welcome to Mabini Hotel, an oasis of comfort and hospitality nestled in the heart of the bustling city. Our hotel stands as a beacon of elegance and tranquility, offering a seamless blend of modern amenities and warm, personalized service.', '84467859', '08:00', '17:00', 'Estanislao, Maypajo', '32', '8', '70', '2', '', '3', '2', '15000'),
(121, 104, 'Wash on the South', '121.jpg', 'WashontheSouth@gmail.com', 'Caloocan Branch', '12/03/2017', '\"Wash on the South\" is more than just a car wash business; it\'s a gateway to a pristine, gleaming ride and a haven for vehicle care enthusiasts. Nestled in the heart of the southern district, this establishment stands out as a beacon of convenience, quality service, and a commitment to preserving the luster of every automobile that graces its bays.', '9125476821', '08:00', '17:00', '112 P. Pablo St, Grace Park West', '67', '10', '89', '2', '', '6', '2', '90000'),
(122, 104, 'JKC Spa', '122.jpg', 'JKCSpa@gmail.com', 'Caloocan Branch', '19/03/2018', 'JKC Spa is a sanctuary of rejuvenation and tranquility, where modern luxury meets ancient wellness traditions. Nestled amidst serene surroundings, this spa stands as a haven for those seeking a respite from the hectic pace of everyday life.', '8558278', '08:00', '17:00', '152 Gen Evangelista, Bagong Barrio West', '144', '5', '45', '2', '', '12', '1', '30000'),
(123, 104, 'Jack Ac Repair', '123.jpg', 'JackAcRepair@gmail.com', 'Caloocan Branch', '20/13/2022', 'Welcome to Jack AC Repair, where cool comfort meets exceptional service. Our business stands as a reliable solution to beat the heat and ensure optimal air conditioning performance for homes and businesses alike.', '9856412756', '08:00', '17:00', 'EHDIA Building, 179 9th St, Grace Park East', '92', '1', '13', '2', '', '8', '2', '20000'),
(124, 104, 'Japan Beauty Salon', '124.jpg', 'JapanBeautySalon@gmail.com', 'Caloocan Branch', '25/06/2015', 'Welcome to Japan Beauty Salon, where centuries-old traditions of beauty and wellness blend seamlessly with modern techniques to offer a holistic and rejuvenating experience. Our salon embodies the essence of Japanese beauty rituals, providing a serene escape from the bustling city life.', '85569785', '08:00', '17:00', '117-90 P. Zamora St, Poblacion', '19', '5', '39', '2', '', '2', '2', '150000'),
(125, 105, 'See Oil', '125.jpg', 'SeeOil@gmail.com', 'Caloocan Branch', '24/09/2006', 'see oil gas station business operates as a fuel station in coastal or maritime locations, often near ports, docks, or along coastal highways. These gas stations cater to both land vehicles and marine vessels, providing fuel and sometimes additional services for boats, ships, and vehicles.', '82257896', '08:00', '17:00', '175 Tullahan Rd', '163', '6', '54', '2', '', '14', '1', '500000'),
(126, 105, 'Jay-Q Acoustic Guitar', '126.jpg', 'Jay-QAcousticGuitar@gmail.com', 'Caloocan Branch', '12/28/2014', 'Welcome to Jay-Q Acoustic Guitars, where passion for music meets craftsmanship to create harmonious melodies. Our business stands as a tribute to the artistry of acoustic guitars, offering a range of instruments designed for musicians of all levels.', '9568741236', '08:00', '17:00', '25 P. Halili St. 128 Caloocan City Metro Manila', '128', '2', '16', '2', '', '14', '2', '500000'),
(127, 105, 'Busy Bees', '127.jpg', 'BusyBees@gmail.com', 'Caloocan Branch', '20/10/2020', 'Welcome to Busy Bees Housekeeping, where cleanliness meets convenience to create homes that sparkle and shine. Our business is dedicated to providing top-notch housekeeping services, ensuring that every space we touch exudes cleanliness and comfort.', '9154682397', '08:00', '17:00', 'Block 36, Dagat-Dagatan, Manila, Metro Manila', '12', '1', '5', '2', '', '1', '2', '50000'),
(128, 105, 'Mendoza Catering', '128.jpg', 'MendozaCatering@gmail.com', 'Caloocan Branch', '23/02/2015', 'Welcome to Mendoza Catering, where exquisite flavors, impeccable service, and culinary creativity come together to craft unforgettable dining experiences. Our catering business is dedicated to providing exceptional food and service for a myriad of events and occasions.', '9587135648', '08:00', '17:00', '223, Grace Park West, Caloocan, Metro Manila', '39', '4', '31', '2', '', '4', '2', '10000'),
(129, 105, 'Silver Queen', '129.jpg', 'SilverQueen@gmail.com', 'Caloocan Branch', '26/04/2017', 'Welcome to Silver Queen, where elegance meets craftsmanship in the world of fine jewelry. Our business is dedicated to offering exquisite and timeless pieces that reflect sophistication and beauty.', '84669527', '08:00', '17:00', '90-65 Dorotea, Grace Park East, Caloocan, Metro Manila', '99', '7', '59', '2', '', '9', '2', '100000'),
(130, 106, 'Social Book Store', '130.jpg', 'SocialBookStore@gmail.com', 'Caloocan Branch', '22/04/2011', 'Welcome to our Social Book Store, where literature meets community and every page holds the potential for connection and inspiration. Our bookstore isn\'t just a place to find books; it\'s a hub where people gather, ideas flourish, and conversations thrive.', '84772564', '08:00', '17:00', 'Zabarte Rd, Barangay 175, Caloocan, Bulacan', '175', '7', '64', '2', '', '15', '1', '20000'),
(131, 106, 'Partas Bus Liner', '131.jpg', 'PartasBusLiner@gmail.com', 'Caloocan Branch', '05/05/2000', 'Partas Transportation Co., Inc. is a prominent bus transportation company in the Philippines, renowned for its reliable and comfortable services that connect various destinations across Luzon.', '84233689', '08:00', '17:00', '247-249 Noli St, Sangandaan, Caloocan, Metro Manila', '6', '10', '83', '2', '', '1', '2', '15000'),
(132, 106, 'Social Lites Driving School', '132.jpg', 'SocialLitesDrivingSchool@gmail.com', 'Caloocan Branch', '03/11/2003', 'Welcome to Social Lites Driving School, where we illuminate the path to safe and confident driving. Our driving school is dedicated to providing comprehensive and personalized driving education, empowering learners with the skills and knowledge needed to become responsible drivers.', '86652147', '08:00', '17:00', 'Anahaw, Barangay 179, Caloocan, Metro Manila', '179', '10', '86', '2', '', '16', '3', '50000'),
(133, 106, 'Francisco Apartment', '133.jpg', 'FranciscoApartment@gmail.com', 'Caloocan Branch', '27/11/2022', 'While I don\'t have specific details about a Francisco Apartment business, running an apartment business typically involves managing residential properties to provide housing to tenants. ', '86695412', '08:00', '17:00', '73 2nd St, Grace Park West, Caloocan, Metro Manila', '41', '8', '69', '2', '', '4', '2', '20000'),
(134, 106, 'M&M Pawnshop', '134.jpg', 'M&MPawnshop@gmail.com', 'Caloocan Branch', '13/09/2014', 'M&M Pawnshop is more than a financial service provider—it\'s a trusted destination where customers find quick financial solutions and discover unique treasures. As a cornerstone of the community, our business focuses on providing secure and reliable pawn services while also offering an array of carefully curated items for sale.', '9458211787', '08:00', '17:00', '162 Tagaytay Street, Barrio San Jose, Caloocan, 1400 Metro Manila', '130', '3', '25', '2', '', '11', '2', '30000'),
(135, 107, 'Miami Auto Repair Shop', '135.jpg', 'MiamiAutoRepairShop@gmail.com', 'Caloocan Branch', '29/10/2015', 'Welcome to Miami Auto Masters, where precision meets passion to keep your wheels turning smoothly. Our auto repair shop in the heart of Miami is committed to providing top-notch automotive services with a touch of professionalism and a deep understanding of the vibrant Miami driving culture.', '9458536471', '08:00', '17:00', '74 Pag-asa, Barrio San Jose, Manila, Metro Manila', '29', '6', '55', '2', '', '3', '2', '15000'),
(136, 107, 'ERS Eye Care', '136.jpg', 'ERSEyeCare@gmail.com', 'Caloocan Branch', '11/01/2018', 'Welcome to ERC Eye Care, where vision meets expertise in a commitment to preserving and enhancing the gift of sight. Our eye care practice is dedicated to providing comprehensive and personalized services for all your vision needs.', '85567412', '08:00', '17:00', '138 12th Ave, Grace Park East, Caloocan, Metro Manila', '89', '5', '37', '2', '', '8', '1', '10000'),
(137, 107, 'C.A.M.S Glass & Aliminum Servces', '137.jpg', 'C.A.M.SGlass&AliminumServces@gmail.com', 'Caloocan Branch', '15/04/2019', 'Welcome to C.A.M.S Glass and Aluminum, where craftsmanship meets innovation in creating elegant and durable glass and aluminum solutions. Our business specializes in providing a wide range of high-quality products and services tailored to meet various architectural and design needs.', '9568247931', '08:00', '17:00', '212 9th Ave, Grace Park West, Manila, Metro Manila', '62', '9', '77', '2', '', '6', '2', '100000'),
(138, 107, 'Nathan Bridal Shop', '138.jpg', 'NathanBridalShop@gmail.com', 'Caloocan Branch', '20/11/2012', 'Welcome to Nathan Bridal Shop, where dreams meet design in the journey to your perfect day. Our boutique is dedicated to providing an enchanting experience for brides-to-be, offering a curated selection of exquisite bridal gowns and personalized services.', '9856324755', '08:00', '17:00', '116-136 4th St, Grace Park East, Caloocan, Metro Manila', '108', '4', '31', '2', '', '10', '2', '20000'),
(139, 107, 'Snack Depot', '139.jpg', 'SnackDepot@gmail.com', 'Caloocan Branch', '25/09/2011', 'Welcome to Snack Depot, the ultimate destination for snack enthusiasts seeking delicious and diverse treats to tantalize their taste buds. Our establishment is dedicated to providing a wide array of snacks, catering to various preferences and cravings.', '84472569', '08:00', '17:00', 'Victory Central Mall, 713 Rizal Ave Monumento, 072, Caloocan, 1400 Metro Manila', '72', '4', '30', '2', '', '7', '2', '30000'),
(140, 108, 'Stellar Sips Café', '140.jpg', 'StellarSipsCafé@gmail.com', 'Caloocan Branch', '18/09/2022', 'A cozy café offering a variety of artisanal coffees, teas, and delectable pastries in a relaxed atmosphere, perfect for casual meetups or a peaceful work session.', '555-567-8901', '08:00', '17:00', 'Pateros St, Maypajo, Caloocan, Metro Manila', '27', '4', '32', '2', '', '3', '2', '50000'),
(141, 108, 'Harmonic Haven Music Store', '141.jpg', 'HarmonicHavenMusicStore@gmail.com', 'Caloocan Branch', '17/04/2017', 'A haven for music enthusiasts, providing a vast collection of instruments, sheet music, and accessories, catering to both beginners and seasoned musicians.', '555-234-5678', '08:00', '17:00', 'W 131, 6th Ave, Grace Park West, Caloocan, Metro Manila', '53', '7', '61', '2', '', '5', '2', '50000'),
(142, 108, 'Whispering Willow Florist', '142.jpg', 'WhisperingWillowFlorist@gmail.com', 'Caloocan Branch', '25/05/2020', 'A charming floral boutique specializing in exquisite arrangements, sourced from the finest blooms, offering personalized floral designs for various occasions.', '555-901-2345', '08:00', '17:00', '245 Elon-elon, Caloocan, Metro Manila', '157', '9', '73', '2', '', '14', '1', '50000'),
(143, 108, 'Aurora\'s Artistry Studio', '143.jpg', 'Aurora\'sArtistryStudio@gmail.com', 'Caloocan Branch', '25/06/2015', 'An art studio fostering creativity, providing art classes, workshops, and a gallery space to showcase local artists\' work.', '555-789-0123', '08:00', '17:00', '2-110 E Jacinto St, Sangandaan, Caloocan, Metro Manila', '5', '2', '14', '2', '', '1', '2', '150000'),
(144, 108, 'Serene Retreat Spa', '144.jpg', 'SereneRetreatSpa@gmail.com', 'Caloocan Branch', '05/11/2015', 'An oasis of relaxation offering a range of spa treatments, massages, and skincare services aimed at rejuvenating the mind, body, and spirit.', '555-234-5678', '08:00', '17:00', '202 C. Cordero St, Grace Park West, Caloocan, Metro Manila', '54', '5', '45', '2', '', '5', '2', '90000'),
(145, 109, 'Midnight Mirage Bar & Grill', '145.jpg', 'MidnightMirageBar&Grill@gmail.com', 'Caloocan Branch', '12/03/2017', 'A vibrant spot combining an eclectic menu of delicious meals and craft cocktails, accompanied by live music and a lively atmosphere.', '555-123-4567', '08:00', '17:00', 'Q37H+8HC, Novaliches, Caloocan, Metro Manila', '180', '4', '26', '2', '', '16', '3', '100000'),
(146, 109, 'Tasty Tidbits Deli', '146.jpg', 'TastyTidbitsDeli@gmail.com', 'Caloocan Branch', '20/11/2005', 'A neighborhood deli serving up mouthwatering sandwiches, salads, and gourmet specialties, using fresh, locally sourced ingredients.', '555-789-0123', '08:00', '17:00', '5-7 Tirad Pass, Bagong Barrio West, Manila, Metro Manila', '138', '4', '32', '2', '', '12', '1', '90000'),
(147, 109, 'Vintage Voyage Antiques', '147.jpg', 'VintageVoyageAntiques@gmail.com', 'Caloocan Branch', '23/02/2015', 'A treasure trove of carefully curated antiques and unique collectibles, inviting patrons to explore and discover one-of-a-kind pieces.', '555-901-2345', '08:00', '17:00', '154 Nadurata St, 10th Ave, Grace Park West, Caloocan, 1400 Metro Manila', '66', '2', '14', '2', '', '6', '2', '500000'),
(148, 109, 'Enchanted Eats Food Truck', '148.jpg', 'EnchantedEatsFoodTruck@gmail.com', 'Caloocan Branch', '29/10/2015', 'A mobile culinary adventure offering a fusion of flavors and global cuisines, bringing a unique dining experience to various locations.', '555-987-6543', '08:00', '17:00', '11 Dagat-Dagatan Ave, Kaunlaran Village, Malabon, Metro Manila', '20', '4', '26', '2', '', '2', '2', '20000'),
(149, 109, 'Coastal Breeze Surf Shop', '149.jpg', 'CoastalBreezeSurfShop@gmail.com', 'Caloocan Branch', '27/07/2013', 'A surfers\' paradise providing top-quality gear, accessories, and expert advice for surfers and beach lovers.', '555-876-5432', '08:00', '17:00', '112 Bataan Street, Grace Park East, Caloocan, 1400 Metro Manila', '122', '2', '14', '2', '', '11', '2', '15000'),
(150, 110, 'Paws & Play Pet Resort', '150.jpg', 'Paws&PlayPetResort@gmail.com', 'Caloocan Branch', '15/04/2019', 'A luxurious haven for pets, offering top-tier accommodation, grooming services, and engaging activities in a safe and loving environment.', '555-567-8901', '08:00', '17:00', '66-70 Gregoria de Jesus, Bagong Barrio West, Manila, Metro Manila', '147', '7', '66', '2', '', '13', '1', '50000'),
(151, 110, 'Dreamy Delights Bakery', '151.jpg', 'DreamyDelightsBakery@gmail.com', 'Caloocan Branch', '15/02/2014', 'A charming bakery crafting an array of delicious pastries, cakes, and artisan breads, all baked with a touch of whimsy and a sprinkle of dreams', '84225898', '08:00', '17:00', '24 Kapanalig, Maypajo, Manila, Metro Manila', '28', '4', '32', '2', '', '3', '2', '100000'),
(152, 110, 'Zenith Zest Yoga Studio', '152.jpg', 'ZenithZestYogaStudio@gmail.com', 'Caloocan Branch', '05/12/2001', 'A serene space for yoga enthusiasts, fostering inner peace and physical wellness through various yoga practices, meditation, and mindfulness sessions.', '9051755811', '08:00', '17:00', '99 Agno St Corner C-3 Road, Grace Park East, Caloocan, 1404 Metro Manila', '116', '2', '16', '2', '', '10', '2', '30000'),
(153, 110, 'Radiant Roots Farm Stand', '153.jpg', 'RadiantRootsFarmStand@gmail.com', 'Caloocan Branch', '26/04/2017', 'A local favorite, offering fresh, organic produce straight from the farm, fostering a connection between community members and the earth\'s bounty.', '87594426', '08:00', '17:00', '128 Mabalacat, Grace Park East, Manila, Metro Manila', '111', '2', '14', '2', '', '10', '2', '20000'),
(154, 110, 'Electric Elegance Boutique', '154.jpg', 'ElectricEleganceBoutique@gmail.com', 'Caloocan Branch', '20/10/2020', 'A trendy boutique housing a curated collection of stylish clothing and accessories, blending sophistication with modern flair.', '9423005343', '08:00', '17:00', '590 Calle Uno, Morning Breeze Subdivision, Manila, Metro Manila', '81', '7', '62', '2', '', '8', '1', '50000'),
(155, 111, 'Beyond Boundaries Travel Agency', '155.jpg', 'BeyondBoundariesTravelAgency@gmail.com', 'Caloocan Branch', '06/07/2016', 'Your passport to extraordinary journeys, specializing in crafting personalized and unforgettable travel experiences worldwide.', '9121441728', '08:00', '17:00', '143 A. Del Mundo St., Grace Park West, Manila, Metro Manila', '45', '8', '68', '2', '', '4', '2', '50000');
INSERT INTO `business_list` (`bus_id`, `ownerId`, `BusinessName`, `Businesslogo`, `BusinessEmail`, `BusinessBranch`, `BusinessEstablish`, `BusinessDescrip`, `BusinessNumber`, `BusinessOpenHour`, `BusinessCloseHour`, `BusinessAddress`, `BusinessBrgy`, `BusinessCategory`, `BusinessSubCategory`, `BusinessStatus`, `BusinessRemarks`, `zone`, `district`, `capitalization`) VALUES
(156, 111, 'Rustic Revival Furniture Co.', '156.jpg', 'RusticRevivalFurnitureCo.@gmail.com', 'Caloocan Branch', '15/02/2015', 'Handcrafted, bespoke furniture bringing rustic charm and timeless elegance into homes, creating spaces that tell stories.', '9856324755', '08:00', '17:00', '225 Sgt. Esguerra Street, Grace Park West, Caloocan, 1476 Metro Manila', '70', '7', '63', '2', '', '6', '2', '150000'),
(157, 111, 'Cloud Nine Bed & Breakfast', '157.jpg', 'CloudNineBed&Breakfast@gmail.com', 'Caloocan Branch', '20/11/2012', 'An inviting retreat offering cozy accommodations, warm hospitality, and a tranquil atmosphere, making every guest feel right at home.', '8558278', '08:00', '17:00', '15 Mileguas, Grace Park East, Caloocan, 1403 Metro Manila', '98', '4', '32', '2', '', '9', '2', '90000'),
(158, 111, 'Ink & Insight Tattoo Parlor', '158.jpg', 'Ink&InsightTattooParlor@gmail.com', 'Caloocan Branch', '23/01/2006', 'A creative hub where skilled artists turn ideas into stunning body art, celebrating individuality and personal expression.', '87724585', '08:00', '17:00', '173 Progreso, Bagong Barrio West, Caloocan, 1401 Metro Manila', '151', '2', '14', '2', '', '13', '1', '50000'),
(159, 111, 'Happy Trails Hiking Gear', '159.jpg', 'HappyTrailsHikingGear@gmail.com', 'Caloocan Branch', '13/09/2014', 'Catering to outdoor enthusiasts, providing high-quality gear and equipment for every adventure along nature\'s paths.', '9166585806', '08:00', '17:00', '23 Bagong Sibol St, Maypajo, Manila, Metro Manila', '31', '2', '14', '2', '', '3', '2', '10000'),
(160, 112, 'The Spinning Wheel Yarn Shop', '160.jpg', 'TheSpinningWheelYarnShop@gmail.com', 'Caloocan Branch', '22/12/2018', 'A haven for knitting and crochet enthusiasts, providing a wide array of premium yarns, tools, and expert guidance for crafting beautiful textiles.', '9171798791', '08:00', '17:00', '101b Madokay, Barrio San Jose, Caloocan, Metro Manila', '126', '2', '14', '2', '', '11', '2', '10000'),
(161, 112, 'Precious Paws Veterinary Clinic', '161.jpg', 'PreciousPawsVeterinaryClinic@gmail.com', 'Caloocan Branch', '05/10/2019', 'Committed to the health and wellness of furry companions, offering compassionate care and medical expertise to ensure their well-being.', '955382154', '08:00', '17:00', '682 New Abbey Rd, Caloocan, 1400 Metro Manila', '73', '7', '66', '2', '', '7', '2', '15000'),
(162, 112, 'Spice Haven Indian Cuisine', '162.jpg', 'SpiceHavenIndianCuisine@gmail.com', 'Caloocan Branch', '05/05/2000', 'A gastronomic delight specializing in authentic Indian flavors, offering a delectable fusion of spices and aromas in every dish.', '946958527', '08:00', '17:00', '68 Sitio Uno, Sangandaan, Caloocan, 1400 Kalakhang Maynila', '2', '4', '26', '2', '', '1', '1', '50000'),
(163, 112, 'Crescent City Comics', '163.jpg', 'CrescentCityComics@gmail.com', 'Caloocan Branch', '20/13/2022', 'Crescent City Comics is a vibrant hub for comic enthusiasts, nestled in the heart of the city. Our store offers a carefully curated collection of comics, graphic novels, and merchandise, inviting both seasoned collectors and newcomers alike to explore a world of imagination. With a passion for storytelling and a commitment to community, Crescent City Comics is dedicated to fostering a welcoming space where creativity thrives and every visitor discovers their next great adventure.', '87594426', '08:00', '17:00', '94 Pasig St, 35 Zone 3, Caloocan, 1400 Metro Manila', '35', '5', '41', '2', '', '3', '2', '90000'),
(164, 112, 'Urban Oasis Gardening Center', '164.jpg', 'UrbanOasisGardeningCenter@gmail.com', 'Caloocan Branch', '05/10/2019', 'Urban Oasis Gardening Center is your go-to destination for all things green in the heart of the city. We specialize in providing a curated selection of plants, gardening supplies, and expert advice to help urban dwellers create lush, vibrant spaces within their homes and communities. Whether you\'re a seasoned green thumb or just beginning your plant journey, we\'re here to inspire, educate, and cultivate urban oases one leaf at a time.', '9856412756', '08:00', '17:00', '16 Greer Tech, Caloocan, Metro Manila', '80', '11', '94', '2', '', '7', '1', '50000'),
(165, 113, 'The Cozy Corner Bookstore', '165.jpg', 'TheCozyCornerBookstore@gmail.com', 'Caloocan Branch', '12/28/2014', 'Welcome to The Cozy Corner Bookstore, where every book lover finds their haven. Nestled in the heart of [Location], we offer a curated collection of new releases, timeless classics, and hidden gems across genres. Our inviting ambiance and personalized recommendations ensure every visitor discovers their next literary adventure. Join us in celebrating the joy of reading in a warm, inviting space where books and community intertwine.', '84330485', '08:00', '17:00', '63 Pavia St, Tondo, Manila, 1013 Metro Manila', '63', '7', '64', '2', '', '6', '2', '10000'),
(166, 113, 'Frosty Flavors Ice Cream Parlour', '166.jpg', 'FrostyFlavorsIceCreamParlour@gmail.com', 'Caloocan Branch', '10/11/2012', '\"Frosty Flavors Ice Cream Parlour is a delightful haven for ice cream enthusiasts seeking a taste of nostalgia and innovation. We craft an array of creamy delights, blending classic flavors with inventive twists, catering to the whims of both traditionalists and adventurous palates. With a commitment to quality ingredients and a welcoming atmosphere, we aim to create moments of pure joy, one scoop at a time.\"', '84772564', '08:00', '17:00', '21 Intan, Bagong Barrio West, Caloocan, 1400 Metro Manila', '153', '4', '32', '2', '', '13', '1', '10000'),
(167, 113, 'Twinkle Toes Dance Academy', '167.jpg', 'TwinkleToesDanceAcademy@gmail.com', 'Caloocan Branch', '15/10/2020', '\"Twinkle Toes Dance Academy is a vibrant and inclusive dance studio dedicated to nurturing creativity and confidence in dancers of all ages. Our expert instructors offer a diverse range of dance styles, from ballet to hip-hop, fostering a supportive environment where every student can shine. At Twinkle Toes, we believe in the transformative power of movement, encouraging our dancers to express themselves, build skills, and embrace the joy of dance.\"', '9568247931', '08:00', '17:00', '095, HGL building, 554 HGL Bldg., EDSA, Cor Biglang Awa, Caloocan', '95', '1', '1', '2', '', '9', '2', '10000'),
(168, 113, 'Urban Jungle Fitness Center', '168.jpg', 'UrbanJungleFitnessCenter@gmail.com', 'Caloocan Branch', '19/03/2018', '\"Welcome to Urban Jungle Fitness Center, where fitness meets adventure! Our state-of-the-art facility offers a dynamic blend of cutting-edge equipment, expert trainers, and unique workout experiences designed to elevate your fitness journey. Embrace the urban jungle as we inspire and empower you to conquer your fitness goals amidst an environment that merges modernity with nature\'s vigor. Whether you\'re a seasoned athlete or new to fitness, Urban Jungle is your ultimate destination for sculpting a stronger, healthier, and more adventurous you.\"', '982364782', '08:00', '17:00', '173 B A. De Jesus Street, Grace Park East, Caloocan, 1400 Metro Manila', '87', '5', '44', '2', '', '8', '2', '10000'),
(169, 113, 'Wavelength Wellness Center', '169.jpg', 'WavelengthWellnessCenter@gmail.com', 'Caloocan Branch', '23/12/2016', '\"Wavelength Wellness Center is a sanctuary for holistic healing and personal rejuvenation. Our center offers a diverse range of wellness services, blending traditional and modern approaches to promote mental, physical, and emotional well-being. From soothing spa treatments to mindfulness sessions and therapeutic practices, we\'re dedicated to guiding individuals on their journey to balance, vitality, and inner harmony. At Wavelength Wellness Center, discover a nurturing space where mind, body, and spirit unite for holistic wellness.\"', '9488348514', '08:00', '17:00', '15 1401 General Concepcion, Bagong Barrio West, Caloocan, Metro Manila', '134', '5', '44', '2', '', '12', '1', '100000'),
(170, 114, 'Sizzling Skillets Cooking School', '170.jpg', 'SizzlingSkilletsCookingSchool@gmail.com', 'Caloocan Branch', '24/09/2006', '\"Sizzling Skillets Cooking School is a culinary haven where aspiring chefs and cooking enthusiasts gather to ignite their passion for food. Offering hands-on classes led by seasoned chefs, we provide a sizzling experience that blends culinary expertise with creativity. From mastering basic techniques to exploring international cuisines, our immersive classes cater to all skill levels, fostering a dynamic and flavorful learning environment. Join us at Sizzling Skillets and embark on a delectable journey of culinary discovery!\"', '9125476821', '08:00', '17:00', 'Araneta Square, 524 Rizal Avenue Corner Samson Road Monumento, Caloocan, 1400 Metro Manila', '76', '1', '1', '2', '', '7', '2', '90000'),
(171, 114, 'Starlight Studios Photography', '171.jpg', 'StarlightStudiosPhotography@gmail.com', 'Caloocan Branch', '06/05/2007', '\"Starlight Studios Photography is a boutique photography studio specializing in capturing life\'s most cherished moments with artistry and elegance. Our team of passionate photographers crafts timeless images, from breathtaking portraits to stunning event coverage, offering personalized experiences that transform fleeting moments into everlasting memories. With a blend of creativity, professionalism, and attention to detail, we illuminate stories through our lens, delivering exceptional quality and a touch of magic in every shot.\"', '9468561237', '08:00', '17:00', '2, Road 16, GSIS Subdivision, Talipapa, Caloocan, 1400 Metro Manila', '118', '2', '18', '2', '', '10', '2', '30000'),
(172, 114, 'Timeless Treasures Jewelers', '172.jpg', 'TimelessTreasuresJewelers@gmail.com', 'Caloocan Branch', '27/11/2022', '\"Timeless Treasures Jewelers is a premier destination for exquisite, handcrafted jewelry that captures the essence of elegance and sophistication. With a dedication to impeccable craftsmanship and exceptional design, our curated collection offers a blend of classic sophistication and contemporary flair. From stunning engagement rings to bespoke pieces, each creation at Timeless Treasures Jewelers is a testament to timeless beauty and unparalleled quality, making moments unforgettable and celebrations truly special.\"', '9166585806', '08:00', '17:00', 'B14l33 Phase 2 Bagong Silangan Caloocan City, Caloocan, 1405 Metro Manila', '144', '7', '59', '2', '', '13', '1', '20000'),
(173, 114, 'Whimsical Wonders Toy Store', '173.jpg', 'WhimsicalWondersToyStore@gmail.com', 'Caloocan Branch', '19/11/2009', '\"Whimsical Wonders Toy Store is a whimsy-filled haven for all things play and imagination. We offer a delightful assortment of toys, games, and novelties carefully curated to spark creativity and wonder in children of all ages. From classic favorites to the latest in innovative play, our store is a vibrant destination where laughter, learning, and limitless imagination come together.\"', '955382154', '08:00', '17:00', '500 Interior 9 L. Nadurata St, 4th Ave, Caloocan, Metro Manila', '46', '7', '62', '2', '', '4', '2', '15000'),
(174, 114, 'TerraNova Tech Solutions', '174.jpg', 'TerraNovaTechSolutions@gmail.com', 'Caloocan Branch', '25/01/2003', 'TerraNova Tech Solutions is a pioneering force in the realm of cutting-edge technology, dedicated to crafting innovative solutions that empower businesses to thrive in the digital landscape. With a focus on seamless integration, our expert team harnesses the latest advancements in software development, artificial intelligence, and data analytics to deliver tailored, future-forward strategies. At TerraNova, we strive to revolutionize businesses by providing scalable, efficient, and forward-thinking technological solutions that drive growth and success in an ever-evolving marketplace.', '84233689', '08:00', '17:00', '50 Mabalacat, Grace Park East, Manila, Metro Manila', '112', '1', '12', '2', '', '11', '2', '20000'),
(175, 115, 'Enigma Escape Room Experience', '175.jpg', 'EnigmaEscapeRoomExperience@gmail.com', 'Caloocan Branch', '20/08/2011', '\"Enigma Escape Room Experience offers immersive and thrilling adventures, inviting participants to solve puzzles, uncover mysteries, and test their wits in uniquely themed rooms. Our interactive and engaging scenarios provide an exhilarating group activity for friends, families, and corporate teams, fostering teamwork and problem-solving skills in an unforgettable setting.\"', '87724585', '08:00', '17:00', '130 Baltazar I, Grace Park West, Maynila, Kalakhang Maynila', '69', '2', '15', '2', '', '6', '2', '15000'),
(176, 115, 'Bella Vista Wedding Planners', '176.jpg', 'BellaVistaWeddingPlanners@gmail.com', 'Caloocan Branch', '11/01/2018', 'Bella Vista Wedding Planners specializes in creating unforgettable and seamless wedding experiences. With a passionate team dedicated to turning dreams into reality, we handle every detail, ensuring your special day is as stunning as the panoramic views our name embodies.', '9166585806', '08:00', '17:00', '172 Greenville Homes, Int. Bayanihan, Caloocan', '159', '7', '62', '2', '', '14', '1', '90000'),
(177, 115, 'Jazzy Java Coffeehouse', '177.jpg', 'JazzyJavaCoffeehouse@gmail.com', 'Caloocan Branch', '03/11/2003', 'Jazzy Java Coffeehouse is a vibrant café where exceptional coffee meets a lively atmosphere. Our cozy space invites you to savor the finest brews while soaking in the rhythm of smooth jazz tunes. Join us for a delightful coffee experience that harmonizes flavor and ambiance flawlessly.', '9468561237', '08:00', '17:00', '155-b, 1408 Samson Rd, Sangandaan, Caloocan, Metro Manila', '1', '4', '32', '2', '', '1', '1', '30000'),
(178, 115, 'Eastside Eats Food Court', '178.jpg', 'EastsideEatsFoodCourt@gmail.com', 'Caloocan Branch', '22/04/2011', 'Eastside Eats Food Court is a vibrant culinary hub offering a diverse array of cuisines from local vendors, inviting guests to savor a range of flavors in a lively and welcoming atmosphere.', '982364782', '08:00', '17:00', '6) Sampaguita, cor Azucena, Grace Park East, Manila, Metro Manila', '101', '4', '26', '2', '', '9', '2', '50000'),
(179, 115, 'Metro Music Mania', '179.jpg', 'MetroMusicMania@gmail.com', 'Caloocan Branch', '15/02/2015', 'Metro Music Mania is a vibrant music retail store in the heart of the city, offering a diverse range of instruments, audio equipment, and accessories for musicians of all levels. Our passionate team provides expert guidance to help customers find their perfect gear, fostering a community where music enthusiasts thrive.', '9121441728', '08:00', '17:00', '34, 5th Avenue, Caloocan City, Metro Manila', '123', '2', '16', '2', '', '11', '2', '15000'),
(180, 116, 'Blissful Moments Event Planning', '180.jpg', 'BlissfulMomentsEventPlanning@gmail.com', 'Caloocan Branch', '15/02/2014', 'Blissful Moments Event Planning specializes in crafting unforgettable experiences for any occasion. From weddings to corporate gatherings, our team meticulously designs and executes events tailored to each client\'s vision. With a keen eye for detail and a passion for creating memorable moments, we ensure every event is a seamless and joyous celebration.', '9856412756', '08:00', '17:00', '#40 Loreto, Morning Breeze Subdivision, Caloocan, Metro Manila', '83', '1', '1', '2', '', '8', '1', '90000'),
(181, 116, 'The Flower Pot Nursery', '181.jpg', 'TheFlowerPotNursery@gmail.com', 'Caloocan Branch', '20/13/2022', 'The Flower Pot Nursery cultivates a vibrant array of flora, offering an oasis for gardening enthusiasts. With a wide selection of plants and expert advice, we cater to both seasoned gardeners and budding green thumbs, fostering a passion for natural beauty in homes and communities.', '9166585806', '08:00', '17:00', 'St, Gregoria de Jesus St, cor Panday Pira, Bagong Barrio West, Caloocan, 1401 Metro Manila', '146', '11', '94', '2', '', '13', '1', '50000'),
(182, 116, 'Mystic Moon Crystal Emporium', '182.jpg', 'MysticMoonCrystalEmporium@gmail.com', 'Caloocan Branch', '12/28/2014', 'Mystic Moon Crystal Emporium offers a curated collection of ethically sourced crystals and mystical artifacts, inviting seekers to explore spiritual connections, find healing energies, and embrace personal growth.', '84330485', '08:00', '17:00', '189 6th St., 8th Ave., 104 Caloocan City Metro Manila', '104', '2', '14', '2', '', '9', '2', '50000'),
(183, 116, 'Happy Trails Outfitters', '183.jpg', 'HappyTrailsOutfitters@gmail.com', 'Caloocan Branch', '06/07/2016', 'Happy Trails Outfitters offers a diverse range of outdoor gear and equipment, catering to adventurers seeking quality gear for hiking, camping, and exploration. We prioritize durability, functionality, and affordability to ensure our customers have the best experiences in the great outdoors.', '9051755811', '08:00', '17:00', '10b Agudo, Barrio San Jose, Caloocan, 1404 Kalakhang Maynila', '131', '8', '68', '2', '', '11', '2', '50000'),
(184, 116, 'Toasty Treats Sandwich Shop', '184.jpg', 'ToastyTreatsSandwichShop@gmail.com', 'Caloocan Branch', '19/03/2018', 'Toasty Treats Sandwich Shop offers a delectable array of freshly made sandwiches and wraps crafted with quality ingredients. Our menu caters to diverse tastes, from classic combinations to inventive flavors, all served in a warm and inviting atmosphere. Whether you\'re seeking a quick lunch or a satisfying bite, Toasty Treats promises a delightful experience with every bite.', '9468561237', '08:00', '17:00', '136 P. Jacinto, Grace Park East, Manila, Metro Manila', '94', '4', '34', '2', '', '9', '2', '50000'),
(185, 117, 'Rainbow Roast Coffee Roasters', '185.jpg', 'RainbowRoastCoffeeRoasters@gmail.com', 'Caloocan Branch', '25/06/2015', 'Rainbow Roast Coffee Roasters: Crafters of exceptional, small-batch coffee blends sourced from diverse regions worldwide. We meticulously roast each batch to perfection, unveiling rich flavors and vibrant aromas in every cup.', '87724585', '08:00', '17:00', '25 Marang St, Barangay 179, Caloocan, Metro Manila', '179', '4', '32', '2', '', '16', '3', '90000'),
(186, 117, 'Petal Pushers Floral Design', '186.jpg', 'PetalPushersFloralDesign@gmail.com', 'Caloocan Branch', '05/10/2019', 'Petal Pushers Floral Design specializes in creating stunning floral arrangements for all occasions. Our experienced team crafts unique and elegant designs, using fresh, high-quality flowers to add a touch of natural beauty to any event or space. Whether it\'s a wedding, corporate event, or simply brightening up your home, we bring creativity and passion to every arrangement we create.', '85569785', '08:00', '17:00', 'R, 231 E Service Rd, Caloocan, 1400 Metro Manila', '156', '2', '14', '2', '', '14', '1', '15000'),
(187, 117, 'Midnight Mysteries Book Club', '187.jpg', 'MidnightMysteriesBookClub@gmail.com', 'Caloocan Branch', '22/12/2018', '\"Midnight Mysteries Book Club offers a thrilling literary escape, specializing in mystery novels that keep readers on the edge of their seats. Join our community of avid readers as we delve into intriguing plots and unravel captivating mysteries together.\"', '9166585806', '08:00', '17:00', '73 Tirad Pass, Bagong Barrio West, Caloocan, Metro Manila', '134', '7', '64', '2', '', '12', '1', '150000'),
(188, 117, 'Haven Spa & Wellness Center', '188.jpg', 'HavenSpa&WellnessCenter@gmail.com', 'Caloocan Branch', '25/01/2003', 'Haven Spa & Wellness Center offers a serene escape for rejuvenation and self-care. Our sanctuary provides a range of holistic treatments and therapeutic experiences to promote relaxation, balance, and inner well-being.', '9856412756', '08:00', '17:00', '71 Gen Evangelista, Bagong Barrio West, Caloocan, 1401 Kalakhang Maynila', '145', '5', '44', '2', '', '13', '1', '20000'),
(189, 117, 'Elemental Elegance Décor', '189.jpg', 'ElementalEleganceDécor@gmail.com', 'Caloocan Branch', '27/07/2013', 'Elemental Elegance Décor offers bespoke interior design solutions that harmoniously blend elemental motifs with contemporary elegance. Our team crafts spaces that celebrate individuality, weaving nature-inspired elements into every design, creating unique and sophisticated environments that reflect our clients\' style and vision.', '8558278', '08:00', '17:00', '205 Deparo Rd, Barangay 171, Caloocan, 1420 Metro Manila', '171', '9', '73', '2', '', '15', '1', '15000'),
(190, 118, 'Luminous Lenses Optometry', '190.jpg', 'LuminousLensesOptometry@gmail.com', 'Caloocan Branch', '05/11/2015', 'Luminous Lenses Optometry provides comprehensive eye care services, offering personalized consultations, precise prescriptions, and a curated selection of quality eyewear. Our expert team is dedicated to enhancing your vision and eye health with tailored solutions in a welcoming and modern environment.', '9468561237', '08:00', '17:00', '600-C Quirino Hwy, Barangay 181, Caloocan, 1422 Metro Manila', '181', '5', '47', '2', '', '16', '3', '100000'),
(191, 118, 'Rugged Route Outdoor Gear', '191.jpg', 'RuggedRouteOutdoorGear@gmail.com', 'Caloocan Branch', '15/04/2019', 'Rugged Route Outdoor Gear provides durable and reliable equipment tailored for outdoor enthusiasts. We specialize in gear designed to withstand rugged terrain, ensuring adventurers have the tools they need for their explorations.', '9468561237', '08:00', '17:00', '25 P. Bonifacio Street, Caloocan', '77', '9', '72', '2', '', '7', '1', '500000'),
(192, 118, 'Spice Island Cuisine', '192.jpg', 'SpiceIslandCuisine@gmail.com', 'Caloocan Branch', '23/01/2006', 'Spice Island Cuisine celebrates the vibrant flavors and culinary heritage of the Caribbean, infusing dishes with a fusion of spices and fresh, local ingredients. Our menu showcases a diverse range of authentic Caribbean flavors, inviting patrons to savor the richness of the islands through our delectable dishes and warm hospitality.', '9468561237', '08:00', '17:00', '193 L. Nadurata St, Grace Park West, Caloocan, Metro Manila', '66', '4', '26', '2', '', '6', '2', '15000'),
(193, 118, 'Whisk & Whimsy Bakery', '193.jpg', 'Whisk&WhimsyBakery@gmail.com', 'Caloocan Branch', '20/11/2005', 'Whisk & Whimsy Bakery crafts delectable treats that marry the artistry of baking with a playful touch. Specializing in unique pastries and cakes, we infuse each creation with a dash of creativity and a dollop of delight.', '84225898', '08:00', '17:00', '25 General Mascardo, Bagong Barrio West, Caloocan, Metro Manila', '137', '4', '32', '2', '', '12', '1', '10000'),
(194, 118, 'Cloud Nine Café', '194.jpg', 'CloudNineCafé@gmail.com', 'Caloocan Branch', '13/09/2014', 'Cloud Nine Café is a cozy, modern coffeehouse nestled in the heart of the city, offering a diverse selection of artisanal coffees, delectable pastries, and a welcoming ambiance perfect for both work and relaxation.', '87724585', '08:00', '17:00', '296 E, 1400 A. Castillo St, Caloocan, Metro Manila', '27', '4', '32', '2', '', '3', '2', '20000'),
(195, 119, 'Vibrant Vision Eyewear', '195.jpg', 'VibrantVisionEyewear@gmail.com', 'Caloocan Branch', '20/10/2020', 'Vibrant Vision Eyewear offers stylish and high-quality glasses designed to complement your unique style while ensuring optimal vision. Our collection blends fashion-forward designs with precision optics, providing customers with a diverse range of eyewear options that enhance both sight and style.', '9166585806', '08:00', '17:00', '11 12th Ave, Grace Park East, Caloocan, Metro Manila', '96', '5', '47', '2', '', '9', '2', '20000'),
(196, 119, 'Sassy Stitches Sewing Studio', '196.jpg', 'SassyStitchesSewingStudio@gmail.com', 'Caloocan Branch', '11/01/2018', 'Sassy Stitches Sewing Studio offers a vibrant space where sewing enthusiasts of all levels can explore their creativity. Our studio provides expert guidance, quality materials, and a supportive community, empowering individuals to craft unique, stylish pieces while having a blast.', '9171798791', '08:00', '17:00', '401 AE Perla St, Bgy 121, Zone 009 Tondo, Manila', '63', '1', '1', '2', '', '6', '2', '150000'),
(197, 119, 'Rustic Roots Farm-to-Table', '197.jpg', 'RusticRootsFarm-to-Table@gmail.com', 'Caloocan Branch', '05/12/2001', 'Rustic Roots Farm-to-Table cultivates a unique dining experience, sourcing fresh, seasonal ingredients directly from local farms. Our chef-driven menu celebrates the essence of farm-fresh flavors, delivering a wholesome culinary journey rooted in sustainability and community connections.', '955382154', '08:00', '17:00', '629 A. Mabini St, Sangandaan, Caloocan, Metro Manila', '7', '11', '94', '2', '', '1', '2', '10000'),
(198, 119, 'Adventure Awaits Travel Agency', '198.jpg', 'AdventureAwaitsTravelAgency@gmail.com', 'Caloocan Branch', '05/05/2000', '\"Adventure Awaits Travel Agency specializes in crafting bespoke travel experiences, offering personalized itineraries to explore the world\'s most captivating destinations. Our passion for adventure and attention to detail ensure unforgettable journeys tailored to every traveler\'s dreams.\"', '946958527', '08:00', '17:00', 'L. Nadurata Street, between, 7th and, 8th Avenues, Grace Park West, Caloocan', '57', '8', '68', '2', '', '5', '2', '15000'),
(199, 119, 'Beyond Borders International Market', '199.jpg', 'BeyondBordersInternationalMarket@gmail.com', 'Caloocan Branch', '24/09/2006', 'Beyond Borders International Market is a global marketplace connecting diverse cultures through a curated selection of unique products sourced from around the world. We offer a platform for artisans and creators to showcase their craftsmanship while providing customers with a one-of-a-kind shopping experience filled with authentic goods celebrating cultural richness and diversity.', '87594426', '08:00', '17:00', '300 F Roxas St, near 7th Ave, Caloocan, 1400 Metro Manila', '54', '4', '30', '2', '', '5', '2', '15000'),
(200, 120, 'Evergreen Essentials Natural Products', '200.jpg', 'EvergreenEssentialsNaturalProducts@gmail.com', 'Caloocan Branch', '25/09/2011', 'Evergreen Essentials offers a range of natural products carefully crafted to promote wellness and enhance daily living. Our line includes a variety of thoughtfully formulated items, all made with high-quality, eco-friendly ingredients. From skincare to aromatherapy, we prioritize nature\'s goodness to provide customers with effective, sustainable solutions for their everyday needs.', '9856412756', '08:00', '17:00', 'Victory Central Mall, 713 Rizal Ave Monumento, 072, Caloocan, 1400 Metro Manila', '167', '2', '14', '2', '', '15', '1', '90000'),
(201, 120, 'Oasis Oasis Tanning Salon', '201.jpg', 'OasisOasisTanningSalon@gmail.com', 'Caloocan Branch', '06/05/2007', 'Oasis Oasis Tanning Salon offers a rejuvenating experience, specializing in top-notch tanning services. Our salon provides a serene escape where clients can indulge in premium tanning solutions tailored to their preferences, all in a relaxing and inviting atmosphere.', '84330485', '08:00', '17:00', '132 A. Mabini St, Maypajo, Manila, Metro Manila', '29', '5', '39', '2', '', '3', '2', '20000'),
(202, 120, 'TerraTunes Music Lessons', '202.jpg', 'TerraTunesMusicLessons@gmail.com', 'Caloocan Branch', '20/11/2012', 'TerraTunes Music Lessons offers tailored music instruction for all ages and skill levels. Our experienced instructors provide personalized lessons in various instruments and genres, fostering a love for music while enhancing skills and creativity.', '84772564', '08:00', '17:00', 'Victory Central Mall, 713 Rizal Ave Monumento, 072, Caloocan, 1400 Metro Manila', '99', '2', '16', '2', '', '9', '2', '100000'),
(203, 120, 'Mystique Magic Supplies', '203.jpg', 'MystiqueMagicSupplies@gmail.com', 'Caloocan Branch', '23/02/2015', 'Mystique Magic Supplies offers an enchanting array of mystical tools and ingredients, catering to practitioners of diverse magical arts. From spellcasting essentials to rare artifacts, our store provides a curated selection to fuel your mystical journey.', '9568247931', '08:00', '17:00', '165 2nd St, Grace Park East, Caloocan, Metro Manila', '114', '4', '27', '2', '', '10', '2', '50000'),
(204, 120, 'Furry Friends Grooming Salon', '204.jpg', 'FurryFriendsGroomingSalon@gmail.com', 'Caloocan Branch', '20/11/2012', 'Furry Friends Grooming Salon offers top-notch grooming services for pets, ensuring they look and feel their best. Our skilled groomers provide personalized care in a safe and comfortable environment, catering to the unique needs of each furry companion.', '982364782', '08:00', '17:00', '113 J.P. Ramoy, ST, Caloocan, 1116 Metro Manila', '164', '5', '39', '2', '', '14', '1', '30000'),
(205, 121, 'Zephyr Zenith Air Conditioning', '205.jpg', 'ZephyrZenithAirConditioning@gmail.com', 'Caloocan Branch', '17/04/2017', 'Vibrant Vision Eyewear offers stylish and high-quality glasses designed to complement your unique style while ensuring optimal vision. Our collection blends fashion-forward designs with precision optics, providing customers with a diverse range of eyewear options that enhance both sight and style.', '9488348514', '08:00', '17:00', '124 C. Cordero St, Grace Park West, Caloocan, 1405 Metro Manila', '47', '1', '13', '2', '', '4', '2', '100000'),
(206, 121, 'Polished Paws Pet Grooming', '206.jpg', 'PolishedPawsPetGrooming@gmail.com', 'Caloocan Branch', '15/02/2015', 'Polished Paws Pet Grooming offers expert grooming services for beloved pets, specializing in pampering sessions that leave furry friends looking and feeling their best. Our skilled team provides personalized care in a relaxing and pet-friendly environment.', '9125476821', '08:00', '17:00', '#30 West 7th Avenue Grace Park, Barangay 56, Caloocan, 1405 Metro Manila', '56', '7', '66', '2', '', '5', '2', '50000'),
(207, 121, 'Sweet Escape Confectionery', '207.jpg', 'SweetEscapeConfectionery@gmail.com', 'Caloocan Branch', '05/10/2019', 'Sweet Escape Confectionery crafts delectable treats that transport you to a world of indulgence. From handcrafted chocolates to exquisite pastries, our confections are a symphony of flavors designed to sweeten every moment.', '9468561237', '08:00', '17:00', 'guadalupe st, corner Tirad Pass, Morning Breeze Subdivision, Caloocan, 1400 Metro Manila', '83', '4', '14', '2', '', '8', '1', '90000'),
(208, 121, 'Vintage Vibes Clothing Co.', '208.jpg', 'VintageVibesClothingCo.@gmail.com', 'Caloocan Branch', '25/05/2020', 'Vintage Vibes Clothing Co. offers a curated collection of timeless apparel that celebrates nostalgia and style. Embracing the essence of bygone eras, we blend classic designs with modern sensibilities, inviting individuals to express their unique fashion tastes through our carefully selected vintage-inspired pieces.', '9166585806', '08:00', '17:00', '427 Maria Candelaria Street, Maypajo, Caloocan, Metro Manila', '35', '7', '62', '2', '', '3', '2', '500000'),
(209, 121, 'Elegance & Edge Hair Salon', '209.jpg', 'Elegance&EdgeHairSalon@gmail.com', 'Caloocan Branch', '27/11/2022', 'Elegance & Edge Hair Salon offers cutting-edge hairstyling services with a sophisticated touch. Our skilled team specializes in delivering personalized and trendy looks to complement each client\'s unique style.', '955382154', '08:00', '17:00', '152 9th Ave, Grace Park East, Caloocan, 1403 Metro Manila', '107', '5', '38', '2', '', '10', '2', '20000'),
(210, 122, 'The Color Palette Paint Studio', '210.jpg', 'TheColorPalettePaintStudio@gmail.com', 'Caloocan Branch', '15/10/2020', 'The Color Palette Paint Studio offers a vibrant artistic space where creativity meets expression. Our studio provides a range of painting classes and workshops for all skill levels, fostering a supportive environment for individuals to explore their artistic potential. Join us to unleash your inner artist and create beautiful, personalized works of art in a relaxed and inspiring setting.', '84233689', '08:00', '17:00', '1401 Gen Evangelista, Bagong Barrio West, Caloocan', '144', '2', '14', '2', '', '13', '1', '15000'),
(211, 122, 'Coastal Comfort Furniture', '211.jpg', 'CoastalComfortFurniture@gmail.com', 'Caloocan Branch', '29/10/2015', 'Coastal Comfort Furniture offers a curated selection of stylish and durable home furnishings designed to elevate your living spaces. From cozy sofas to elegant dining sets, our collection combines coastal charm with comfort, ensuring every piece enhances your lifestyle while reflecting your unique taste.', '87724585', '08:00', '17:00', '39, Grace Park West, Caloocan, Metro Manila', '39', '7', '63', '2', '', '4', '2', '90000'),
(212, 122, 'Moonlit Meadows Floral Boutique', '212.jpg', 'MoonlitMeadowsFloralBoutique@gmail.com', 'Caloocan Branch', '05/11/2015', 'Moonlit Meadows Floral Boutique: A whimsical oasis nestled in the heart of town, offering handcrafted floral arrangements inspired by nature\'s enchanting beauty. We specialize in bespoke designs that bring a touch of elegance and serenity to any occasion, from weddings to everyday celebrations.', '9166585806', '08:00', '17:00', '195 8th Ave, Grace Park East, Caloocan, 1400 Metro Manila', '102', '7', '62', '2', '', '9', '2', '100000'),
(213, 122, 'Fireside Chats Café', '213.jpg', 'FiresideChatsCafé@gmail.com', 'Caloocan Branch', '03/11/2003', 'Fireside Chats Café offers a cozy haven for conversations and connections over steaming cups of quality coffee and delightful bites. Our warm ambiance invites patrons to unwind, engage, and savor moments of togetherness by the crackling fireplace.', '9468561237', '08:00', '17:00', '87 J Teodoro St, Grace Park West, Caloocan, Metro Manila', '48', '4', '32', '2', '', '4', '2', '15000'),
(214, 122, 'Whirlwind Workouts Gym', '214.jpg', 'WhirlwindWorkoutsGym@gmail.com', 'Caloocan Branch', '06/05/2007', 'Whirlwind Workouts Gym is a dynamic fitness hub dedicated to empowering individuals through cutting-edge training programs, expert guidance, and a vibrant community fostering holistic health and wellness.', '8558278', '08:00', '17:00', '746 Rizal Ave Ext, Grace Park East, Caloocan, 1400 Metro Manila', '76', '5', '44', '2', '', '7', '2', '20000'),
(215, 123, 'Dapper Doodles Pet Boutique', '215.jpg', 'DapperDoodlesPetBoutique@gmail.com', 'Caloocan Branch', '25/09/2011', '\"Dapper Doodles Pet Boutique offers a curated collection of stylish and high-quality accessories, grooming essentials, and specialty products for pets. Catering to pet owners who prioritize both fashion and functionality, our boutique aims to elevate the lifestyle of furry companions with a touch of sophistication.\"', '9856412756', '08:00', '17:00', '198 EDSA, corner Tandang Sora, Bagong Barrio West, Caloocan, Metro Manila', '136', '7', '66', '2', '', '12', '1', '15000'),
(216, 123, 'Urban Upcycles Recycled Goods', '216.jpg', 'UrbanUpcyclesRecycledGoods@gmail.com', 'Caloocan Branch', '19/11/2009', 'Urban Upcycles Recycled Goods is a sustainable retailer dedicated to offering a curated selection of upcycled and eco-friendly products for everyday living. We source high-quality items that are creatively repurposed, reducing waste and promoting a greener lifestyle.', '85569785', '08:00', '17:00', '5 V. Concepcion, Morning Breeze Subdivision, Manila, Metro Manila', '85', '2', '14', '2', '', '8', '1', '90000'),
(217, 123, 'Morning Dew Landscaping', '217.jpg', 'MorningDewLandscaping@gmail.com', 'Caloocan Branch', '15/02/2015', 'Morning Dew Landscaping provides exquisite landscaping solutions, elevating outdoor spaces with precision and creativity.', '82257896', '08:00', '17:00', '681 W Service Rd, Caloocan, Metro Manila', '161', '2', '14', '2', '', '14', '1', '20000'),
(218, 123, 'Twinkle Town Toy Emporium', '218.jpg', 'TwinkleTownToyEmporium@gmail.com', 'Caloocan Branch', '23/12/2016', 'Twinkle Town Toy Emporium offers a magical array of toys, sparking imagination and joy for children of all ages.', '9568741236', '08:00', '17:00', 'SM Center Sangandaan Samson Rd, Cor Marcelo H. Del Pilar St, Caloocan, 1408 Metro Manila', '3', '7', '62', '2', '', '1', '1', '20000'),
(219, 123, 'Serenade Sounds Music Academy', '219.jpg', 'SerenadeSoundsMusicAcademy@gmail.com', 'Caloocan Branch', '12/03/2017', 'Serenade Sounds Music Academy nurtures musical talent through expert guidance and personalized instruction.', '9154682397', '08:00', '17:00', '11th Avenue corner Ilang-ilang Street East Grace Park Caloocan (South, 1403 Metro Manila', '97', '4', '16', '2', '', '9', '2', '90000'),
(220, 124, 'Sizzling Skillets Cooking Classes', '220.jpg', 'SizzlingSkilletsCookingClasses@gmail.com', 'Caloocan Branch', '20/11/2005', 'Sizzling Skillets Cooking Classes ignite culinary passion, teaching the art of cooking with flair and finesse.', '9587135648', '08:00', '17:00', '28 M.H. Del Pilar St, Grace Park East, Caloocan, 1403 Metro Manila', '119', '1', '1', '2', '', '10', '2', '50000'),
(221, 124, 'Luxe Living Interiors', '221.jpg', 'LuxeLivingInteriors@gmail.com', 'Caloocan Branch', '13/09/2014', 'Luxe Living Interiors crafts sophisticated and stylish interior designs that epitomize elegance and comfort.', '84669527', '08:00', '17:00', '148, Bagong Barrio West, Caloocan, Metro Manila', '148', '11', '94', '2', '', '13', '1', '30000'),
(222, 124, 'The Quirky Quill Stationery Store', '222.jpg', 'TheQuirkyQuillStationeryStore@gmail.com', 'Caloocan Branch', '27/07/2013', 'The Quirky Quill Stationery Store is a haven for stationery enthusiasts, curating unique and charming writing essentials.', '84772564', '08:00', '17:00', '45 J.Teodoro Street, Barangay 68, Caloocan, 1400 Metro Manila', '41', '2', '14', '2', '', '4', '2', '50000'),
(223, 124, 'Gilded Galaxy Jewelry', '223.jpg', 'GildedGalaxyJewelry@gmail.com', 'Caloocan Branch', '15/02/2015', 'Gilded Galaxy Jewelry adorns clients with exquisite, handcrafted pieces that capture the essence of celestial beauty.', '84233689', '08:00', '17:00', '135 Gonzales, Caloocan, 1400 Metro Manila', '74', '7', '59', '2', '', '7', '2', '90000'),
(224, 124, 'Urban Harvest Farmers Market', '224.jpg', 'UrbanHarvestFarmersMarket@gmail.com', 'Caloocan Branch', '19/11/2009', 'Urban Harvest Farmers Market celebrates local produce and artisanal goods, fostering a community of sustainable living.', '86652147', '08:00', '17:00', '620 7th St, Grace Park East, Caloocan, 1403 Metro Manila', '121', '4', '28', '2', '', '11', '2', '20000'),
(225, 125, 'The Paper Crane Origami Studio', '225.jpg', 'ThePaperCraneOrigamiStudio@gmail.com', 'Caloocan Branch', '18/09/2022', 'The Paper Crane Origami Studio cultivates the art of paper folding, turning imagination into intricately designed creations.', '86695412', '08:00', '17:00', '80 7th Ave, Grace Park West, Manila, Metro Manila', '58', '2', '15', '2', '', '5', '2', '15000'),
(226, 125, 'Summit Solutions Consulting', '226.jpg', 'SummitSolutionsConsulting@gmail.com', 'Caloocan Branch', '23/12/2016', 'Summit Solutions Consulting provides strategic guidance and innovative solutions for business challenges.', '9458211787', '08:00', '17:00', 'Ciudad Grande Village, Block 10 Lot 9, Caloocan, 1400 Metro Manila', '165', '1', '12', '2', '', '15', '1', '50000'),
(227, 125, 'Sunflower Smiles Daycare', '227.jpg', 'SunflowerSmilesDaycare@gmail.com', 'Caloocan Branch', '12/03/2017', 'Sunflower Smiles Daycare nurtures young minds in a safe, engaging, and nurturing environment.', '9458536471', '08:00', '17:00', '142, Bagong Barrio West, Caloocan, Metro Manila', '142', '5', '36', '2', '', '13', '1', '90000'),
(228, 125, 'Swirl & Sip Wine Bar', '228.jpg', 'Swirl&SipWineBar@gmail.com', 'Caloocan Branch', '15/02/2014', 'Swirl & Sip Wine Bar offers an enchanting selection of wines in a cozy ambiance, perfect for unwinding.', '85567412', '08:00', '17:00', '132b Lakas ng Mahihirap, Manila, Metro Manila', '11', '4', '35', '2', '', '1', '2', '20000'),
(229, 125, 'High Voltage Electronics', '229.jpg', 'HighVoltageElectronics@gmail.com', 'Caloocan Branch', '20/08/2011', 'High Voltage Electronics brings cutting-edge technology and gadgets to tech enthusiasts and professionals.', '9568247931', '08:00', '17:00', 'Zone 3, 86, 30 Binangonan St, Caloocan, Metro Manila', '30', '6', '53', '2', '', '3', '2', '50000'),
(230, 126, 'Crystal Clear Cleaning Services', '230.jpg', 'CrystalClearCleaningServices@gmail.com', 'Caloocan Branch', '25/06/2015', 'Crystal Clear Cleaning Services delivers impeccable cleanliness, ensuring spaces shine with pristine perfection.', '9856324755', '08:00', '17:00', '12th Avenue, 8th St, Grace Park East, Caloocan, Metro Manila', '92', '1', '5', '2', '', '8', '2', '10000'),
(231, 126, 'Zenith Zone Meditation Center', '231.jpg', 'ZenithZoneMeditationCenter@gmail.com', 'Caloocan Branch', '05/05/2000', 'Zenith Zone Meditation Center is a serene sanctuary, guiding individuals towards mindfulness and inner peace.', '9423005343', '08:00', '17:00', 'brgy70, 145 Baltazar 4, 10th Ave, Grace Park West, Caloocan, Metro Manila', '70', '5', '37', '2', '', '6', '2', '90000'),
(232, 126, 'The Lavish Loft Home Decor', '232.jpg', 'TheLavishLoftHomeDecor@gmail.com', 'Caloocan Branch', '23/01/2006', 'The Lavish Loft Home Decor redefines living spaces with opulent and tasteful decor choices.', '0943 406 2543', '08:00', '17:00', '3rd Floor Unit C, 1 208 A. Mabini St, Maypajo, Caloocan, Metro Manila', '25', '7', '73', '2', '', '3', '2', '50000'),
(233, 126, 'Gourmet Gaze Food Tours', '233.jpg', 'GourmetGazeFoodTours@gmail.com', 'Caloocan Branch', '06/07/2016', 'Gourmet Gaze Food Tours tantalize taste buds with culinary adventures exploring diverse flavors and cuisines.', '9121441728', '08:00', '17:00', '700 Heroes del 96, St, Caloocan, 1408 Metro Manila', '73', '4', '26', '2', '', '7', '2', '90000'),
(234, 126, 'Noble Nibbles Catering Co.', '234.jpg', 'NobleNibblesCateringCo.@gmail.com', 'Caloocan Branch', '20/10/2020', 'Noble Nibbles Catering Co. crafts delectable menus that elevate events with culinary excellence and sophistication.', '9051755811', '08:00', '17:00', 'Blk.8 Lt.4 Road 34 cuenco st, Congress village, Caloocan, Metro Manila', '173', '4', '31', '2', '', '15', '1', '100000'),
(235, 127, 'Coastal Canvas Art Studio', '235.jpg', 'CoastalCanvasArtStudio@gmail.com', 'Caloocan Branch', '05/10/2019', 'Coastal Canvas Art Studio inspires creativity with coastal-themed art, fostering artistic expression and appreciation.', '84330485', '08:00', '17:00', 'Aklan Silahis, Bagong Barrio West, Caloocan, 1400 Kalakhang Maynila', '149', '2', '14', '2', '', '13', '1', '15000'),
(236, 127, 'Blissful Balance Spa & Wellness', '236.jpg', 'BlissfulBalanceSpa&Wellness@gmail.com', 'Caloocan Branch', '25/05/2020', 'Blissful Balance Spa & Wellness offers rejuvenating experiences that restore harmony between body and mind.', '84425711', '08:00', '17:00', '108 A. Del Mundo St., Grace Park West, Caloocan, 1400 Metro Manila', '61', '5', '39', '2', '', '6', '2', '10000'),
(237, 127, 'Mystic Meadows Botanicals', '237.jpg', 'MysticMeadowsBotanicals@gmail.com', 'Caloocan Branch', '24/09/2006', 'Mystic Meadows Botanicals offers a lush array of exotic plants and botanical wonders.', '83425818', '08:00', '17:00', 'BCW Building, 103 Gen. Luna St, Poblacion, Caloocan, Metro Manila', '15', '2', '14', '2', '', '2', '2', '50000'),
(238, 127, 'Stellar Stitches Embroidery', '238.jpg', 'StellarStitchesEmbroidery@gmail.com', 'Caloocan Branch', '15/04/2019', 'Stellar Stitches Embroidery specializes in detailed and personalized embroidery designs.', '9166585806', '08:00', '17:00', '#330 p sevilla st, 88 3rd Ave, Caloocan, Metro Manila', '44', '2', '14', '2', '', '4', '2', '100000'),
(239, 127, 'Toasted Treats Sandwich Shop', '239.jpg', 'ToastedTreatsSandwichShop@gmail.com', 'Caloocan Branch', '10/11/2012', 'Toasted Treats Sandwich Shop serves up delectable sandwiches with a flavorful twist.', '0975 935 7029', '08:00', '17:00', '37 D. Arellano, Bagong Barrio West, Caloocan, 1400 Metro Manila', '133', '2', '32', '2', '', '12', '1', '20000'),
(240, 128, 'Bountiful Bites Catering', '240.jpg', 'BountifulBitesCatering@gmail.com', 'Caloocan Branch', '25/01/2003', 'Bountiful Bites Catering crafts memorable dining experiences with its diverse culinary offerings.', '9171798791', '08:00', '17:00', '301 10th Ave, Grace Park East, Manila, Metro Manila', '93', '4', '31', '2', '', '8', '2', '50000'),
(241, 128, 'Celestial Celebrations Event Planning', '241.jpg', 'CelestialCelebrationsEventPlanning@gmail.com', 'Caloocan Branch', '27/11/2022', 'Celestial Celebrations Event Planning creates extraordinary events tailored to your dreams.', '922563214', '08:00', '17:00', '110 E M.Hizon, Caloocan, Metro Manila', '64', '4', '31', '2', '', '6', '2', '90000'),
(242, 128, 'Coastal Cutlery Kitchen Supplies', '242.jpg', 'CoastalCutleryKitchenSupplies@gmail.com', 'Caloocan Branch', '05/11/2015', 'Coastal Cutlery Kitchen Supplies provides top-quality kitchen essentials for every cooking enthusiast.', '955382154', '08:00', '17:00', 'Unit D, J.P Bautista, No.64 University Ave, Caloocan, 1400 Metro Manila', '79', '4', '27', '2', '', '7', '1', '20000'),
(243, 128, 'Petal & Plume Florist', '243.jpg', 'Petal&PlumeFlorist@gmail.com', 'Caloocan Branch', '20/13/2022', 'Petal & Plume Florist brings beauty to life with stunning floral arrangements.', '0922 801 3779', '08:00', '17:00', '137 Gen Evangelista, Bagong Barrio West, Caloocan, 1421 Kalakhang Maynila', '140', '2', '14', '2', '', '12', '1', '50000'),
(244, 128, 'Haven Haven Home Décor', '244.jpg', 'HavenHavenHomeDécor@gmail.com', 'Caloocan Branch', '15/10/2020', 'Haven Haven Home Décor offers an exquisite selection to enhance your living spaces.', '982364782', '08:00', '17:00', 'GRC Building, 454, 1400 Rizal Ave Ext, Grace Park East, Caloocan, Metro Manila', '106', '7', '63', '2', '', '10', '2', '90000'),
(245, 129, 'Dreamy Delights Desserts', '245.jpg', 'DreamyDelightsDesserts@gmail.com', 'Caloocan Branch', '26/04/2017', 'Dreamy Delights Desserts crafts heavenly treats to satisfy your sweet cravings.', '9753881369', '08:00', '17:00', '100F.sanchez st poblacion caloocan city caloocan, Caloocan, 1412 Metro Manila', '17', '4', '32', '2', '', '2', '2', '10000'),
(246, 129, 'The Daily Grind Coffee Shop', '246.jpg', 'TheDailyGrindCoffeeShop@gmail.com', 'Caloocan Branch', '23/02/2015', 'The Daily Grind Coffee Shop brews up a perfect cup for every coffee lover.', '9488348514', '08:00', '17:00', '163 L. Nadurata St, Grace Park West, Caloocan, Metro Manila', '60', '4', '32', '2', '', '6', '2', '100000'),
(247, 129, 'Urban Utopia Landscape Design', '247.jpg', 'UrbanUtopiaLandscapeDesign@gmail.com', 'Caloocan Branch', '22/12/2018', 'Urban Utopia Landscape Design transforms outdoor spaces into urban sanctuaries.', '87594426', '08:00', '17:00', '120 Magsaysay, Grace Park East, Caloocan, 1403 Metro Manila', '123', '2', '14', '2', '', '11', '2', '50000'),
(248, 129, 'Tasty Traditions Bakery', '248.jpg', 'TastyTraditionsBakery@gmail.com', 'Caloocan Branch', '29/10/2015', 'Tasty Traditions Bakery delivers mouthwatering baked goods steeped in tradition.', '84225898', '08:00', '17:00', '23 V. Concepcion, Morning Breeze Subdivision, Manila, Metro Manila', '85', '4', '32', '2', '', '8', '1', '50000'),
(249, 129, 'Velvet Visions Fashion Boutique', '249.jpg', 'VelvetVisionsFashionBoutique@gmail.com', 'Caloocan Branch', '03/11/2003', 'Velvet Visions Fashion Boutique brings elegance and style to your wardrobe.', '87724585', '08:00', '17:00', 'r.papa street lot 3 and 4 blk 45 north matrix ville, Camarin Rd, Caloocan, Metro Manila', '177', '7', '62', '2', '', '15', '1', '20000'),
(250, 130, 'Vintage Vibes Thrift Store', '250.jpg', 'VintageVibesThriftStore@gmail.com', 'Caloocan Branch', '11/01/2018', 'Vintage Vibes Thrift Store offers a curated collection of timeless treasures.', '82357855', '08:00', '17:00', '506 A. Mabini St, 13 Sangandaan, Caloocan, 1116 Metro Manila', '13', '7', '62', '2', '', '2', '2', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `business_location`
--

CREATE TABLE `business_location` (
  `bus_loc_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_lat` double NOT NULL,
  `bus_long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_location`
--

INSERT INTO `business_location` (`bus_loc_id`, `bus_id`, `bus_lat`, `bus_long`) VALUES
(1, 1, 14.662991, 120.99262),
(2, 2, 14.659833, 120.973273),
(3, 3, 14.660849, 120.971635),
(4, 4, 14.658763, 120.971904),
(5, 5, 14.659316, 120.968781),
(6, 6, 14.656786, 120.972776),
(7, 7, 14.657568, 120.970468),
(8, 8, 14.656429, 120.970484),
(9, 9, 14.656776, 120.965703),
(10, 10, 14.653521, 120.973474),
(11, 11, 14.653521, 120.973474),
(12, 12, 14.653508, 120.970618),
(13, 13, 14.653407, 120.966245),
(14, 14, 14.652095, 120.97259),
(15, 15, 14.64971, 120.966944),
(16, 16, 14.649477, 120.973735),
(17, 17, 14.650529, 120.970166),
(18, 18, 14.648847, 120.97409),
(19, 19, 14.649332, 120.97055),
(20, 20, 14.646795, 120.974891),
(21, 21, 14.647143, 120.969533),
(22, 22, 14.644698, 120.974945),
(23, 23, 14.645471, 120.968356),
(24, 24, 14.643485, 120.974682),
(25, 25, 14.643388, 120.973289),
(26, 26, 14.642224, 120.976233),
(27, 27, 14.641153, 120.975063),
(28, 28, 14.641245, 120.972603),
(29, 29, 14.642492, 120.969577),
(30, 30, 14.639154, 120.974132),
(31, 31, 14.640557, 120.971534),
(32, 32, 14.638501, 120.97597),
(33, 33, 14.638469, 120.972124),
(34, 34, 14.636627, 120.975508),
(35, 35, 14.636382, 120.972958),
(36, 36, 14.636382, 120.972958),
(37, 37, 14.635778, 120.978836),
(38, 38, 14.638745, 120.978368),
(39, 39, 14.639441, 120.978809),
(40, 40, 14.637328, 120.982428),
(41, 41, 14.638599, 120.98228),
(42, 42, 14.639725, 120.981921),
(43, 43, 14.639781, 120.980127),
(44, 44, 14.641188, 120.978164),
(45, 45, 14.641179, 120.980169),
(46, 46, 14.641703, 120.982024),
(47, 47, 14.642339, 120.977985),
(48, 48, 14.642563, 120.980211),
(49, 49, 14.642489, 120.982381),
(50, 50, 14.646134, 120.97748),
(51, 51, 14.6461, 120.977307),
(52, 52, 14.644021, 120.979098),
(53, 53, 14.643851, 120.981719),
(54, 54, 14.659623, 120.997041),
(100, 100, 14.6530628, 120.9792292),
(101, 101, 14.6529147, 120.979419),
(102, 102, 14.651452, 120.9840394),
(103, 103, 14.6516655, 120.9788939),
(104, 104, 14.6561729, 120.9884145),
(105, 105, 14.6529466, 120.9793309),
(106, 106, 14.656259, 120.9765071),
(107, 107, 14.6575227, 120.9769309),
(108, 108, 14.6569565, 120.980898),
(109, 109, 14.6719451, 120.9638014),
(110, 110, 14.6404504, 120.9839175),
(111, 111, 14.6463613, 120.9680035),
(112, 112, 14.6453576, 120.9742883),
(113, 113, 14.6493746, 120.9707803),
(114, 114, 14.6539552, 120.9692688),
(115, 115, 14.6627652, 120.9860655),
(116, 116, 14.7788018, 121.0348312),
(117, 117, 14.6457129, 120.9786491),
(118, 118, 14.6485818, 120.9781113),
(119, 119, 14.6468296, 120.9896641),
(120, 120, 14.6370595, 120.9740955),
(121, 121, 14.6521846, 120.9780329),
(122, 122, 14.663276, 120.9924858),
(123, 123, 14.653008, 120.9884516),
(124, 124, 14.6477357, 120.9712601),
(125, 125, 14.6809417, 121.0098262),
(126, 126, 14.6396172, 120.9871745),
(127, 127, 14.6538633, 120.9638015),
(128, 128, 14.6372446, 120.9817521),
(129, 129, 14.6545558, 120.9945792),
(130, 130, 14.7457105, 121.0446606),
(131, 131, 14.657866, 120.9676003),
(132, 132, 14.7555587, 121.068627),
(133, 133, 14.6554623, 120.9855491),
(134, 134, 14.6376019, 120.986483),
(135, 135, 14.6394369, 120.9752249),
(136, 136, 14.6539948, 120.9872529),
(137, 137, 14.6508298, 120.9803398),
(138, 138, 14.6493414, 120.9848659),
(139, 139, 14.6555828, 120.9800132),
(140, 140, 14.6404618, 120.9696679),
(141, 141, 14.6462307, 120.9753747),
(142, 142, 14.6688332, 120.9983481),
(143, 143, 14.6566499, 120.9689554),
(144, 144, 14.6438442, 120.9782101),
(145, 145, 14.7631981, 121.0769477),
(146, 146, 14.6596712, 120.9948811),
(147, 147, 14.6514894, 120.9760261),
(148, 148, 14.646588, 120.9654689),
(149, 149, 14.6464616, 120.9891967),
(150, 150, 14.6640672, 120.9939941),
(151, 151, 14.6433589, 120.96828),
(152, 152, 14.6448796, 120.9841866),
(153, 153, 14.6462926, 120.9828951),
(154, 154, 14.6587699, 120.9819613),
(155, 155, 14.6388898, 120.9786291),
(156, 156, 14.6543594, 120.9771846),
(157, 157, 14.6517755, 120.9917563),
(158, 158, 14.6649162, 120.9968531),
(159, 159, 14.6403179, 120.968655),
(160, 160, 14.6433895, 120.9883751),
(161, 161, 14.6566243, 120.9737796),
(162, 162, 14.6604413, 120.968356),
(163, 163, 14.6389682, 120.9707836),
(164, 164, 14.6608912, 120.9731337),
(165, 165, 14.612002, 120.9654059),
(166, 166, 14.6675069, 120.9962451),
(167, 167, 14.6570469, 120.9921101),
(168, 168, 14.6563772, 120.987788),
(169, 169, 14.6563875, 120.987788),
(170, 170, 14.6567536, 120.9833536),
(171, 171, 14.6900865, 121.0145661),
(172, 172, 14.6624644, 120.9952176),
(173, 173, 14.6436287, 120.9785108),
(174, 174, 14.6462626, 120.9874165),
(175, 175, 14.6531456, 120.9774895),
(176, 176, 14.6752978, 121.0050471),
(177, 177, 14.65689, 120.9817003),
(178, 178, 14.6503924, 120.9908928),
(179, 179, 14.6445182, 120.9776774),
(180, 180, 14.6445182, 120.9776774),
(181, 181, 14.6649315, 120.993191),
(182, 182, 14.6484386, 120.9862892),
(183, 183, 14.637261, 120.9892694),
(184, 184, 14.6565854, 120.9914051),
(185, 185, 14.7518004, 121.0691273),
(186, 186, 14.6637247, 120.9979305),
(187, 187, 14.6597118, 120.988742),
(188, 188, 14.6651505, 120.9908551),
(189, 189, 14.7500788, 121.0174102),
(190, 190, 14.7635751, 121.0840269),
(191, 191, 14.6578584, 120.9784751),
(192, 192, 14.6518755, 120.9761787),
(193, 193, 14.6606582, 120.9920027),
(194, 194, 14.6407001, 120.9699683),
(195, 195, 14.6544586, 120.9825733),
(196, 196, 14.6512458, 120.9740479),
(197, 197, 14.6569819, 120.9685096),
(198, 198, 14.6479407, 120.9786593),
(199, 199, 14.6494559, 120.9802607),
(200, 200, 14.7326052, 121.0098251),
(201, 201, 14.6397674, 120.9743158),
(202, 202, 14.6549052, 120.9946251),
(203, 203, 14.6450429, 120.9669585),
(204, 204, 14.6888385, 121.0176431),
(205, 205, 14.6425026, 120.9789125),
(206, 206, 14.647576, 120.974325),
(207, 207, 14.6595249, 120.9860495),
(208, 208, 14.6388119, 120.967619),
(209, 209, 14.6499457, 120.9836345),
(210, 210, 14.6634958, 120.9923052),
(211, 211, 14.6374666, 120.9819737),
(212, 212, 14.6489292, 120.979747),
(213, 213, 14.6421638, 120.9800797),
(214, 214, 14.656351, 120.9815955),
(215, 215, 14.6574174, 120.9918407),
(216, 216, 14.6582434, 120.986936),
(217, 217, 14.6733133, 120.9974539),
(218, 218, 14.6583331, 120.9691955),
(219, 219, 14.6526828, 120.9906944),
(220, 220, 14.6423136, 120.9819652),
(221, 221, 14.6658097, 120.9947257),
(222, 222, 14.6398142, 120.981841),
(223, 223, 14.6473626, 0),
(224, 224, 14.6465582, 120.9867651),
(225, 225, 14.6476545, 120.9786491),
(226, 226, 14.7232231, 121.0004615),
(227, 227, 14.6642787, 120.9900555),
(228, 228, 14.6534994, 120.9678833),
(229, 229, 14.6397899, 120.9711885),
(230, 230, 14.6542078, 120.9899389),
(231, 231, 14.6538629, 120.9794696),
(232, 232, 14.6427016, 120.9750322),
(233, 233, 14.6562752, 120.9738421),
(234, 234, 14.7581889, 121.0301297),
(235, 235, 14.6676664, 120.9935663),
(236, 236, 14.6398832, 120.9794641),
(237, 237, 14.6498252, 120.970067),
(238, 238, 14.641662, 120.9772165),
(239, 239, 14.6633656, 120.9917458),
(240, 240, 14.6515763, 120.9867824),
(241, 241, 14.6522705, 120.9727671),
(242, 242, 14.6589485, 120.97706),
(243, 243, 14.6624799, 120.9930363),
(244, 244, 14.6498417, 120.9813463),
(245, 245, 14.6501931, 120.9745696),
(246, 246, 14.6505961, 120.9781755),
(247, 247, 14.6448252, 120.986574),
(248, 248, 14.6592406, 120.9869953),
(249, 249, 14.7489683, 121.0488892),
(250, 250, 14.6525934, 120.9716756);

-- --------------------------------------------------------

--
-- Table structure for table `business_post`
--

CREATE TABLE `business_post` (
  `bus_post_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `post_title` int(11) NOT NULL,
  `post_desc` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_post`
--

INSERT INTO `business_post` (`bus_post_id`, `bus_id`, `post_title`, `post_desc`, `photo`, `post_date`, `status`) VALUES
(0, 100, 2, 2, '65bb52b7a6cfe.jpg', '2024-01-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_requirement`
--

CREATE TABLE `business_requirement` (
  `bus_req_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_brgyclearance` varchar(255) NOT NULL,
  `remarks_brgyClearance` longtext NOT NULL,
  `bus_dtipermit` varchar(255) NOT NULL,
  `remarks_dti` longtext NOT NULL,
  `bus_sanitarypermit` varchar(255) NOT NULL,
  `remarks_sanitary` longtext NOT NULL,
  `bus_cedula` varchar(255) NOT NULL,
  `remarks_cedula` longtext NOT NULL,
  `bus_mayorpermit` varchar(255) NOT NULL,
  `remarks_mayorsPermit` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_requirement`
--

INSERT INTO `business_requirement` (`bus_req_id`, `bus_id`, `bus_brgyclearance`, `remarks_brgyClearance`, `bus_dtipermit`, `remarks_dti`, `bus_sanitarypermit`, `remarks_sanitary`, `bus_cedula`, `remarks_cedula`, `bus_mayorpermit`, `remarks_mayorsPermit`) VALUES
(1, 1, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(2, 2, '6569715fcfae02', '', '6569715fcfae72', '', '6569715fcfae92', '', '6569715fcfaeb2', '', '6569715fcfaec2', ''),
(3, 3, '65697ff1094e93', '', '65697ff1094ee3', '', '65697ff1094ef3', '', '65697ff1094f13', '', '65697ff1094f23', ''),
(4, 4, '65698132cb9b54', '', '65698132cb9ba4', '', '65698132cb9bc4', '', '65698132cb9bd4', '', '65698132cb9be4', ''),
(5, 5, '6569825d8b6c05', '', '6569825d8b6c35', '', '6569825d8b6c45', '', '6569825d8b6c55', '', '6569825d8b6c65', ''),
(6, 6, '65698337c55c56', '', '65698337c55cb6', '', '65698337c55d26', '', '65698337c55d66', '', '65698337c55d96', ''),
(7, 7, '65698461063417', '', '65698461063487', '', '65698461063497', '', '656984610634a7', '', '656984610634b7', ''),
(8, 8, '656986342b0bf8', '', '656986342b0c68', '', '656986342b0c88', '1', '656986342b0ca8', '1', '656986342b0cc8', '1'),
(9, 9, '656987fb9a5419', '', '656987fb9a5489', '', '656987fb9a5499', '', '656987fb9a54a9', '', '656987fb9a54b9', ''),
(10, 11, '65698a41b949e11', '', '65698a41b94a411', '', '65698a41b94a511', '', '65698a41b94a611', '', '65698a41b94a711', ''),
(11, 12, '65698ccf7536312', '', '65698ccf7536712', '', '65698ccf7536812', '', '65698ccf7536912', '', '65698ccf7536a12', ''),
(12, 13, '65698e60cd65613', '', '65698e60cd65c13', '', '65698e60cd65d13', '', '65698e60cd65e13', '', '65698e60cd65f13', ''),
(13, 14, '656990f2e313314', '', '656990f2e313a14', '', '656990f2e313b14', '', '656990f2e313d14', '', '656990f2e313f14', ''),
(14, 15, '6569939534cad15', '', '6569939534cb015', '', '6569939534cb115', '', '6569939534cb215', '', '6569939534cb315', ''),
(15, 16, '656996aca487916', '', '656996aca487f16', '', '656996aca488016', '', '656996aca488116', '', '656996aca488216', ''),
(16, 17, '656998114466517', '', '656998114466c17', '', '656998114466e17', '', '656998114467017', '', '656998114467217', ''),
(17, 18, '656999772b2c218', '', '656999772b2c518', '', '656999772b2c618', '', '656999772b2c718', '', '656999772b2c818', ''),
(18, 19, '65699c345066819', '', '65699c345066e19', '', '65699c345066f19', '', '65699c345067019', '', '65699c345067119', ''),
(19, 20, '65699e45e654120', '', '65699e45e654520', '', '65699e45e654620', '', '65699e45e654720', '', '65699e45e654820', ''),
(20, 21, '6569a10e07c0521', '', '6569a10e07c0d21', '', '6569a10e07c0e21', '', '6569a10e07c1021', '', '6569a10e07c1121', ''),
(21, 22, '6569a3d40d2d922', '', '6569a3d40d2df22', '', '6569a3d40d2e122', '', '6569a3d40d2e222', '', '6569a3d40d2e322', ''),
(22, 23, '6569a900ca6c123', '', '6569a900ca6c823', '', '6569a900ca6ca23', '', '6569a900ca6cb23', '', '6569a900ca6cd23', ''),
(23, 24, '6569aa613f5ca24', '', '6569aa613f5cd24', '', '6569aa613f5ce24', '', '6569aa613f5cf24', '', '6569aa613f5d024', ''),
(24, 25, '6569ac903910e25', '', '6569ac903911325', '', '6569ac903911425', '', '6569ac903911525', '', '6569ac903911625', ''),
(25, 26, '6569ae7a38cf026', '', '6569ae7a38cf426', '', '6569ae7a38cf526', '', '6569ae7a38cf626', '', '6569ae7a38cf726', ''),
(26, 27, '6569afe1f39ce27', '', '6569afe1f39d127', '', '6569afe1f39d227', '', '6569afe1f39d327', '', '6569afe1f39d427', ''),
(27, 28, '6569b21ba190228', '', '6569b21ba190428', '', '6569b21ba190528', '', '6569b21ba190628', '', '6569b21ba190728', ''),
(28, 29, '6569b3ebbab3e29', '', '6569b3ebbab4129', '', '6569b3ebbab4229', '', '6569b3ebbab4329', '', '6569b3ebbab4429', ''),
(29, 30, '6569bb52b761730', '', '6569bb52b761c30', '', '6569bb52b761d30', '', '6569bb52b761e30', '', '6569bb52b761f30', ''),
(30, 31, '6569bc627050531', '', '6569bc627050931', '', '6569bc627050a31', '', '6569bc627050b31', '', '6569bc627050c31', ''),
(31, 32, '6569be648898532', '', '6569be648898932', '', '6569be648898a32', '', '6569be648899132', '', '6569be648899432', ''),
(32, 33, '656ac2993c79533', '', '656ac2993c79b33', '', '656ac2993c79c33', '', '656ac2993c79d33', '', '656ac2993c79e33', ''),
(33, 34, '656ac3f50e6b734', '', '656ac3f50e6d534', '', '656ac3f50e6d634', '', '656ac3f50e6d734', '', '656ac3f50e6d834', ''),
(34, 36, '656ac673cc7ef36', '', '656ac673cc7f436', '', '656ac673cc7f536', '', '656ac673cc7f636', '', '656ac673cc7f736', ''),
(35, 37, '656ac97c3b18d37', '', '656ac97c3b19337', '', '656ac97c3b19537', '', '656ac97c3b19637', '', '656ac97c3b19837', ''),
(36, 38, '656acb25b77d438', '', '656acb25b77da38', '', '656acb25b77db38', '', '656acb25b77dc38', '', '656acb25b77dd38', ''),
(37, 39, '656acd43c824939', '', '656acd43c824e39', '', '656acd43c824f39', '', '656acd43c825039', '', '656acd43c825139', ''),
(38, 40, '656acf8d7c4a440', '', '656acf8d7c4c740', '', '656acf8d7c4c840', '', '656acf8d7c4c940', '', '656acf8d7c4ca40', ''),
(39, 41, '656ad1b7ba3b541', '', '656ad1b7ba3ba41', '', '656ad1b7ba3bc41', '', '656ad1b7ba3bd41', '', '656ad1b7ba3be41', ''),
(40, 42, '656ad4231057e42', '', '656ad4231058342', '', '656ad4231058442', '', '656ad4231058542', '', '656ad4231058642', ''),
(41, 43, '656ad5ab2d94843', '', '656ad5ab2d94c43', '', '656ad5ab2d94d43', '', '656ad5ab2d94e43', '', '656ad5ab2d94f43', ''),
(42, 44, '656ad739d2f2744', '', '656ad739d2f4d44', '', '656ad739d2f4f44', '', '656ad739d2f5044', '', '656ad739d2f5144', ''),
(43, 45, '656ad8168902845', '', '656ad8168902e45', '', '656ad8168903045', '', '656ad8168903245', '', '656ad8168903345', ''),
(44, 46, '656adb903c3da46', '', '656adb903c3dd46', '', '656adb903c3de46', '', '656adb903c3df46', '', '656adb903c3e046', ''),
(45, 47, '656adc870ec3e47', '', '656adc870ec4447', '', '656adc870ec4647', '', '656adc870ec4747', '', '656adc870ec4847', ''),
(46, 48, '656add947422248', '', '656add947422948', '', '656add947422b48', '', '656add947422c48', '', '656add947422d48', ''),
(47, 49, '656ae694426ef49', '', '656ae6944271749', '', '656ae6944271949', '', '656ae6944271a49', '', '656ae6944271c49', ''),
(48, 51, '656ae935ebf0451', '', '656ae935ebf0751', '', '656ae935ebf0851', '', '656ae935ebf0951', '', '656ae935ebf0a51', ''),
(49, 52, '656aea99823a052', '', '656aea99823a552', '', '656aea99823a752', '', '656aea99823a952', '', '656aea99823ab52', ''),
(50, 53, '656aedfdbf12153', '', '656aedfdbf12453', '', '656aedfdbf12553', '', '656aedfdbf12653', '', '656aedfdbf12753', ''),
(51, 54, '656c489c361a354', '', '656c489c361a654', '', '656c489c361a754', '', '656c489c361a854', '', '656c489c361a954', ''),
(100, 100, '65a4d823a8253.jpg', '1', '65a4d8277fcb5.jpg', '1', '65a4d82c0d846.jpg', '1', '65a4d81decd4e.jpg', '1', '65a4d8165eab4.jpg', '1'),
(101, 101, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(102, 102, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(103, 103, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(104, 104, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(105, 105, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(106, 106, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(107, 107, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(108, 108, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(109, 109, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(110, 110, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(111, 111, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(112, 112, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(113, 113, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(114, 114, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(115, 115, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(116, 116, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(117, 117, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(118, 118, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(119, 119, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(120, 120, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(121, 121, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(122, 122, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(123, 123, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(124, 124, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(125, 125, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(126, 126, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(127, 127, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(128, 128, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(129, 129, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(130, 130, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(131, 131, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(132, 132, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(133, 133, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(134, 134, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(135, 135, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(136, 136, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(137, 137, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(138, 138, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(139, 139, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(140, 140, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(141, 141, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(142, 142, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(143, 143, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(144, 144, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(145, 145, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(146, 146, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(147, 147, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(148, 148, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(149, 149, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(150, 150, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(151, 151, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(152, 152, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(153, 153, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(154, 154, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(155, 155, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(156, 156, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(157, 157, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(158, 158, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(159, 159, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(160, 160, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(161, 161, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(162, 162, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(163, 163, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(164, 164, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(165, 165, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(166, 166, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(167, 167, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(168, 168, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(169, 169, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(170, 170, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(171, 171, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(172, 172, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(173, 173, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(174, 174, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(175, 175, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(176, 176, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(177, 177, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(178, 178, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(179, 179, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(180, 180, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(181, 181, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(182, 182, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(183, 183, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(184, 184, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(185, 185, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(186, 186, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(187, 187, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(188, 188, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(189, 189, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(190, 190, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(191, 191, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(192, 192, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(193, 193, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(194, 194, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(195, 195, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(196, 196, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(197, 197, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(198, 198, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(199, 199, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(200, 200, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(201, 201, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(202, 202, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(203, 203, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(204, 204, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(205, 205, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(206, 206, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(207, 207, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(208, 208, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(209, 209, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(210, 210, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(211, 211, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(212, 212, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(213, 213, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(214, 214, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(215, 215, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(216, 216, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(217, 217, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(218, 218, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(219, 219, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(220, 220, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(221, 221, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(222, 222, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(223, 223, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(224, 224, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(225, 225, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(226, 226, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(227, 227, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(228, 228, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(229, 229, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(230, 230, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(231, 231, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(232, 232, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(233, 233, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(234, 234, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(235, 235, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(236, 236, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(237, 237, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(238, 238, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(239, 239, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(240, 240, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(241, 241, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(242, 242, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(243, 243, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(244, 244, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(245, 245, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(246, 246, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(247, 247, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(248, 248, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(249, 249, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', ''),
(250, 250, '65696f0cc7c971', '', '65696f0cc7c9d1', '', '65696f0cc7c9e1', '', '65696f0cc7c9f1', '', '65696f0cc7ca01', '');

-- --------------------------------------------------------

--
-- Table structure for table `business_reviews`
--

CREATE TABLE `business_reviews` (
  `bus_rev_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `bus_reply` longtext DEFAULT NULL,
  `curr_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_reviews`
--

INSERT INTO `business_reviews` (`bus_rev_id`, `bus_id`, `user_id`, `rating`, `comment`, `bus_reply`, `curr_time`) VALUES
(0, 6773, 10, 5, 'Very good', NULL, '2023-11-30 15:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `ID` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`ID`, `category`) VALUES
(1, 'Business Service'),
(2, 'Entertainment and Media'),
(3, 'Finances and Insurance'),
(4, 'Food and Drinks'),
(5, 'Health and Beauty'),
(6, 'Manufacturing & Industry'),
(7, 'Shopping'),
(8, 'Tourism and Accommodation'),
(9, 'Tradesmen and Construction'),
(10, 'Transport and Motoring'),
(11, 'Property');

-- --------------------------------------------------------

--
-- Table structure for table `district_list`
--

CREATE TABLE `district_list` (
  `ID` int(11) NOT NULL,
  `District` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_list`
--

INSERT INTO `district_list` (`ID`, `District`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `email`, `password`, `userType`) VALUES
(8, 'cruzcedric66@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(9, 'jalynguts01@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(10, 'pauclm.inc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(11, '20200089m.colmo.paulamae.bscs@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '3'),
(12, 'laycosharmaine2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(13, 'jalynguts01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(14, 'shaaaaa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(18, 'noelitopacson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(19, 'andremandantes@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(20, 'francismiguel.silguera@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(21, '20200115.silguera.francis.bscs@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(22, '20200115M.silguera.francis.bscs@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(23, 'francis.silguera@mtivalenzuela.edu.ph', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(24, 'francissilguera@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(25, 'francismiguel@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(26, '2020.silguera.francis.bscs@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(27, 'francismiguelsilguera@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(28, 'francis.silguera@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(29, 'andremndts@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(30, 'andreimandantes@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(31, 'randallcamuen@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(32, 'ricardosalvador@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(33, 'alfarodelacruz@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(100, 'sophia.lynn.wilson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(101, 'harper.grace.turner@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(102, 'lily.mae.lee@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(103, ' olivia.marie.brown@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(104, 'oliver.william.hill@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(105, 'penelope.jane.bell@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(106, 'christopher.joseph.taylor@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(107, 'zoey.elizabeth.murphy@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(108, 'leo.alexander.perry@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(109, 'ethan.robert.jackson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(110, 'mason.lee.fisher@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(111, 'scarlett.rose.evans@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(112, 'william.henry.nelson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(113, 'benjamin.patrick.moore@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(114, 'abigail.elizabeth.clark@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(115, 'samuel.john.baker@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(116, 'xavier.antonio.torres@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(117, 'jackson.thomas.hall@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(118, 'noah.patrick.white@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(119, 'michael.james.davis@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(120, 'emily.rose.johnson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(121, 'isabella.anne.martinez@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(122, 'madison.anne.harris@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(123, 'aria.nicole.turner@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(124, 'ava.maria.garcia@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(125, 'victoria.grace.wilson@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(126, 'john.alexander.smith@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(127, 'daniel.scott.miller@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(128, 'hazel.marie.cooper@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(129, 'caleb.daniel.price@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2'),
(130, 'madison.anne.brooks@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2');

-- --------------------------------------------------------

--
-- Table structure for table `owner_list`
--

CREATE TABLE `owner_list` (
  `ID` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Sex` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(11) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_list`
--

INSERT INTO `owner_list` (`ID`, `log_id`, `Surname`, `Firstname`, `MiddleName`, `Email`, `contactNumber`, `Address`, `Sex`, `Birthday`, `Age`, `owner_name`, `photo`) VALUES
(1, 0, 'Layco', 'Jalyn', 'Maclang', 'jalynguts01@gmail.com', '09553254794', '191 b. baltazar st. 10th ave brgy. 63 Caloocan CIty', 'Female', '2001-12-01', 22, '', ''),
(2, 0, 'Gutierrez', 'Wow', 'Maclang', 'jalynguts@gmail.com', '09553254794', 'baltazar', 'Male', '2023-09-04', 32, '', ''),
(7, 0, 'cruz', 'cedric', 'Dela Cruz', 'cruzcedric66@gmail.com', '123', '120 M.HIZON ST 10th avenue', 'Male', '2023-09-08', 21, NULL, ''),
(8, 0, 'Layco', 'Jalyn', 'Maclang', 'jalynguts01@gmail.com', '09553254794', '191 b. baltazar st. 10th ave brgy. 63 Caloocan CIty', 'Female', '2001-12-01', 22, NULL, ''),
(9, 0, 'Colmo', 'Pau', 'Medina', 'pauclm.inc@gmail.com', '01234567890', '70-General Concepcion St. Bagong Barrio Caloocan City', 'Female', '2002-06-08', 21, NULL, '650af05575424.jpg'),
(10, 0, 'Kim', 'Wonu', 'Jeon', '20200089m.colmo.paulamae.bscs@gmail.com', '0123456789', '', '', '0000-00-00', 25, NULL, ''),
(11, 0, 'Layco', 'Sharmaine', 'Viernes', 'laycosharmaine2@gmail.com', '09753690522', '5 3rd Avenue West Caloocan City', 'Female', '2000-11-19', 23, NULL, ''),
(12, 13, 'Layco', 'Jalyn', 'Maclang', 'jalynguts01@gmail.com', '09553254794', '191 b. baltazar st. 10th ave brgy. 63 Caloocan CIty', 'Female', '2001-12-01', 22, NULL, ''),
(13, 14, 'Layco', 'Sharmaine', 'Viernes', 'sharmaine@gmail.com', '09553254794', '3rd ave caloocan city', 'Female', '2004-03-22', 24, NULL, ''),
(16, 18, 'Pacson', 'Noelito', 'Sansales', 'noelitopacson@gmail.com', '09553254794', 'calumpit bulacan', 'Male', '2022-11-28', 0, NULL, ''),
(17, 0, 'mandantes', 'andre', 'figuron', 'andremandantes@gmail.com', '09472003754', '126 l nadurata st. 4th ave caloocan city', 'Male', '2023-11-25', 21, NULL, ''),
(18, 0, 'Silguera', 'Francis Miguel', 'Villanueva', 'francismiguel.silguera@gmail.com', '09212023063', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '2001-10-25', 22, NULL, ''),
(19, 0, 'Silguera', 'Miguel', 'Villanueva', '20200115.silguera.francis.bscs@gmail.com', '09212023063', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '2001-10-25', 22, NULL, ''),
(20, 0, 'Silguera', 'Francis', 'Villanueva', '20200115M.silguera.francis.bscs@gmail.com', '09770688500', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '2000-10-25', 22, NULL, ''),
(21, 0, 'Framo', 'Miggy', 'Villanueva', 'francis.silguera@mtivalenzuela.edu.ph', '09770688500', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '2001-10-25', 22, NULL, ''),
(22, 0, 'Silguera', 'Francis Migs', 'Villanueva', 'francissilguera@gmail.com', '09770688500', '14 Mariano Ponce St. Bagong Barrio Caloocan City', 'Male', '2001-02-10', 22, NULL, ''),
(23, 0, 'Silguera', 'Francis', '.', 'francismiguel@gmail.com', '09770688500', '4 Mariano Ponce St. Bagong Barrio Caloocan City', 'Male', '2001-09-27', 22, NULL, ''),
(24, 0, 'Silguera', 'France', 'Villanueva', '2020.silguera.francis.bscs@gmail.com', '09770688500', '8 Zapote St. Bagong Barrio Caloocan City', 'Male', '2002-09-29', 21, NULL, ''),
(25, 0, 'Silguera', 'Francis Miguelitos', 'Villanueva', 'francismiguelsilguera@gmail.com', '09212023063', '3 Zapote St. Bagong Barrio Caloocan City', 'Male', '2001-10-25', 22, NULL, ''),
(26, 0, 'Silguera', 'Franky', 'Villanueva', 'francis.silguera@gmail.com', '09212023063', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '2001-10-28', 22, NULL, ''),
(27, 0, 'Mandantes', 'Andre', 'F', 'andremndts@gmail.com', '09770688500', '3 Larangay St. Caloocan City', 'Male', '2002-07-24', 22, NULL, ''),
(28, 0, 'Mandantes', 'Andrei', 'Figuron', 'andreimandantes@gmail.com', '09472003754', '126 l Nadurata St. 4th Ave Caloocan city', 'Male', '2002-09-24', 22, NULL, ''),
(29, 0, 'Camuen', 'Randall', '.', 'randallcamuen@gmail.com', '09770688500', '156 Kamias St. Dagat-Dagatan Caloocan City', 'Male', '2000-03-24', 23, NULL, ''),
(30, 0, 'Salvador IV', 'Ricardo', '.', 'ricardosalvador@gmail.com', '09770688500', '15 5th St. Baesa Caloocan City', 'Male', '2003-07-26', 21, NULL, ''),
(31, 0, 'Dela Cruz', 'Alfaro', 'Santos', 'alfarodelacruz@gmail.com', '09770688500', '38 Zapote St. Bagong Barrio Caloocan City', 'Male', '1990-03-16', 33, NULL, ''),
(100, 0, 'Wilson', 'Sophia', 'Lynn', 'sophia.lynn.wilson@gmail.com', '09673099802', 'Trento,Caloocan City, Philippines', 'F', '0000-00-00', 18, 'Sophia Lynn Wilson', ''),
(101, 0, 'Turner', 'Harper', 'Grace', 'harper.grace.turner@gmail.com', '09673099802', 'Clarin,Caloocan City, Philippines', 'F', '0000-00-00', 32, 'Harper Grace Turner', ''),
(102, 0, 'Lee', 'Lily', 'Mae', 'lily.mae.lee@gmail.com', '09673099802', 'Pio V. Corpuz,Caloocan City, Philippines', 'F', '0000-00-00', 23, 'Lily Mae Lee', ''),
(103, 0, 'Brown', 'Olivia', 'Marie', 'olivia.marie.brown@gmail.com', '09673099802', 'San Sebastian,Caloocan City, Philippines', 'F', '0000-00-00', 32, 'Olivia Marie Brown', ''),
(104, 0, 'Hill', 'Oliver', 'William', 'oliver.william.hill@gmail.com', '09673099802', 'Labrador,Caloocan City, Philippines', 'M', '0000-00-00', 56, 'Oliver William Hill', ''),
(105, 0, 'Bell', 'Penelope', 'Jane', 'penelope.jane.bell@gmail.com', '09673099802', 'Kalilangan,Caloocan City, Philippines', 'F', '0000-00-00', 31, 'Penelope Jane Bell', ''),
(106, 0, 'Taylor', 'Christopher ', 'Joseph', 'christopher.joseph.taylor@gmail.com', '09673099802', 'Dagami,Caloocan City, Philippines', 'M', '0000-00-00', 21, 'Christopher Joseph Taylor', ''),
(107, 0, 'Murphy', 'Zoey ', 'Elizabeth', 'zoey.elizabeth.murphy@gmail.com', '09673099802', 'Umingan,Caloocan City, Philippines', 'F', '0000-00-00', 43, 'Zoey Elizabeth Murphy', ''),
(108, 0, 'Perry', 'Leo', 'Alexander', 'leo.alexander.perry@gmail.com', '09673099802', 'San Fabian,Caloocan City, Philippines', 'M', '0000-00-00', 34, 'Leo Alexander Perry', ''),
(109, 0, 'Jackson', 'Ethan', 'Robert', 'ethan.robert.jackson@gmail.com', '09673099802', 'Sabangan,Caloocan City, Philippines', 'M', '0000-00-00', 27, 'Ethan Robert Jackson', ''),
(110, 0, 'Fisher', 'Mason', 'Lee ', 'mason.lee.fisher@gmail.com', '09673099802', 'San Remegio,Caloocan City, Philippines', 'M', '0000-00-00', 21, 'Mason Lee Fisher', ''),
(111, 0, 'Evans', 'Scarlett', 'Rose', 'scarlett.rose.evans@gmail.com', '09673099802', 'Guam,Caloocan City, Philippines', 'F', '0000-00-00', 21, 'Scarlett Rose Evans', ''),
(112, 0, 'Nelson', 'William', 'Henry', 'william.henry.nelson@gmail.com', '09673099802', 'Van Buren,Caloocan City, Philippines', 'M', '0000-00-00', 32, 'William Henry Nelson', ''),
(113, 0, 'Moore', 'Benjamin', 'Patrick', 'benjamin.patrick.moore@gmail.com', '09673099802', 'Tiaong,Caloocan City, Philippines', 'M', '0000-00-00', 32, 'Benjamin Patrick Moore', ''),
(114, 0, 'Clark', 'Abigail', 'Elizabeth', 'abigail.elizabeth.clark@gmail.com', '09673099802', 'Caraga,Caloocan City, Philippines', 'F', '0000-00-00', 56, 'Abigail Elizabeth Clark', ''),
(115, 0, 'Baker', 'Samuel', 'John', 'samuel.john.baker@gmail.com', '09673099802', 'Lapuyan,Caloocan City, Philippines', 'M', '0000-00-00', 22, 'Samuel John Baker', ''),
(116, 0, 'Torres', 'Xavier', 'Antonio', 'xavier.antonio.torres@gmail.com', '09673099802', 'Luna,Caloocan City, Philippines', 'M', '0000-00-00', 27, 'Xavier Antonio Torres ', ''),
(117, 0, 'Hall', 'Jackson', 'Thomas', 'jackson.thomas.hall@gmail.com', '09673099802', 'Tamparan,Caloocan City, Philippines', 'M', '0000-00-00', 56, 'Jackson Thomas Hall', ''),
(118, 0, 'White', 'Noah', 'Patrick', 'noah.patrick.white@gmail.com', '09673099802', 'Basay,Caloocan City, Philippines', 'M', '0000-00-00', 21, 'Noah Patrick White', ''),
(119, 0, 'Davis', 'Michael', 'James', 'michael.james.davis@gmail.com', '09673099802', 'Oton,Caloocan City, Philippines', 'M', '0000-00-00', 32, 'Michael James Davis', ''),
(120, 0, 'Johnson', 'Emily', 'Rose', 'emily.rose.johnson@gmail.com', '09673099802', 'Kalachuchi,Caloocan City, Philippines', 'F', '0000-00-00', 28, 'Emily Rose Johnson', ''),
(121, 0, 'Martinez', 'Isabella', 'Anne', 'isabella.anne.martinez@gmail.com', '09673099802', 'V. A. Rufino St,Caloocan City, Philippines', 'F', '0000-00-00', 56, 'Isabella Anne Martinez ', ''),
(122, 0, 'Harris', 'Madison', 'Anne', 'madison.anne.harris@gmail.com', '09673099802', 'Laoac,Caloocan City, Philippines', 'F', '0000-00-00', 64, 'Madison Anne Harris', ''),
(123, 0, 'Turner', 'Aria', 'Nicole', 'aria.nicole.turner@gmail.com', '09673099802', 'Love Bird,Caloocan City, Philippines', 'F', '0000-00-00', 32, 'Aria Nicole Turner', ''),
(124, 0, 'Garcia', 'Ava', 'Maria', 'ava.maria.garcia@gmail.com', '09673099802', 'Fortuna,Caloocan City, Philippines', 'F', '0000-00-00', 48, 'Ava Maria Garcia', ''),
(125, 0, 'Wilson', 'Victoria', 'Grace', 'victoria.grace.wilson@gmail.com', '09673099802', 'Bagong Nayon (Cogeo),Caloocan City, Philippines', 'F', '0000-00-00', 56, 'Victoria Grace Wilson', ''),
(126, 0, 'Smith', 'John', 'Alexander', 'john.alexander.smith@gmail.com', '09673099802', 'Bunawan,Caloocan City, Philippines', 'M', '0000-00-00', 56, 'John Alexander Smith', ''),
(127, 0, 'Miller', 'Daniel', 'Scott', 'daniel.scott.miller@gmail.com', '09673099802', 'Zenia,Caloocan City, Philippines', 'M', '0000-00-00', 64, 'Daniel Scott Miller', ''),
(128, 0, 'Cooper', 'Hazel', 'Marie', 'hazel.marie.cooper@gmail.com', '09673099802', 'San Vicente,Caloocan City, Philippines', 'F', '0000-00-00', 34, 'Hazel Marie Cooper', ''),
(129, 0, 'Price', 'Caleb', 'Daniel', 'caleb.daniel.price@gmail.com', '09673099802', '14th Ave,Caloocan City, Philippines', 'M', '0000-00-00', 21, 'Caleb Daniel Price', ''),
(130, 0, 'Brooks', 'Madison', 'Anne', 'madison.anne.brooks@gmail.com', '09673099802', 'Dove,Caloocan City, Philippines', 'F', '0000-00-00', 56, 'Madison Anne Brooks', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_event`
--

CREATE TABLE `post_event` (
  `ID` int(11) NOT NULL,
  `Events` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_list`
--

CREATE TABLE `subcategory_list` (
  `ID` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `subCategory` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory_list`
--

INSERT INTO `subcategory_list` (`ID`, `catId`, `subCategory`, `tags`) VALUES
(1, 1, 'Training Center', 'Training,Trainings,Training Facilities,Training Seminars,Online Training,Training Workshops,IT Training,Training School'),
(2, 1, 'Retail Services', 'Retails,Retail,Retail Stores,Customer Service,Retail Technology,Retail Franchising'),
(3, 1, 'Market Search', 'Market,Market Research,Market Analysis,Market Strategies,Market Reports,Market Data'),
(4, 1, 'Laundry and Dry Cleaning', 'Laundry Services,Dry Cleaning,Wash and Fold,Laundry Pickup and Delivery,Fabric Care Tips,Eco-Friendly Cleaning,Laundry and Dry Cleaning Equipment'),
(5, 1, 'Housekeeping Service', 'Cleaning Services,Home Cleaning,Deep Cleaning,Carpet Cleaning,Office Cleaning,Housekeeping Companies,Cleaning Supplies\n'),
(6, 1, 'Animal Shelters', 'Shelter,Pet Adoption,Rescue Animals,Poster Care'),
(7, 1, 'Warehousing', 'Logistics,Distribution Center,Material Handling,Inventory Control, Shipping And Receiving,Packing,Inventory Tracking'),
(8, 1, 'Baby Sitters', 'Child Care,Babysitting Services,Nanny,Babysitting Agency,Full-Time Nanny'),
(9, 1, 'Advertising', 'Marketing,Ad Campaigns,Digital Marketing,Print Advertising,Billboard Ads,Advertisers'),
(10, 1, 'Health and Safety', 'Safety Training,Workplace Health,Health and Safety Management,Safety Awareness'),
(11, 1, 'Marketing', 'Digital Marketing,Content Marketing,Online,Advertising,Branding, Marketing Campaigns,Product Marketing'),
(12, 1, 'Consultants', 'Consulting Services,IT Consulting,Business Consulting,Financial Consultants,Healthcare Consultants,Environmental Consultants,Management Advisory,Project Consultant '),
(13, 1, 'Ac Repair Services', 'AC Repair,Air Conditioning Repair,24-Hour AC Repair,AC Compressor Repair, AC Installation'),
(14, 2, 'Arts and Crafts', 'DIY Crafts,Craft Project,DIY Home Decor,Art Supplies,Jewelry Malking,Knitting and Crocheting,Pottery And Ceramics,Fabric Crafts,Craft Materials'),
(15, 2, 'Film, Televison and Video', 'Film and Television,Video Editing,Animation,Video Marketing,Video Equipment'),
(16, 2, 'Music', 'Songwriting,Music Albums,Live Music,Music Instruments'),
(17, 2, 'Fashion', 'boutiques,Clothing stores,ukay-ukay,Shoe stores,Jewelry shops,modeling agencies,Luxury brands,'),
(18, 2, 'Photography', 'Photographers,Photography Services,Wedding Photography,Commercial Photography,Event Photography,Photography Studios,Photography Equipment,Photography Workshops,'),
(19, 3, 'Legal Services', 'Law Firms,Legal Consultation,Attorney Services,Estate Planning,Divorce Lawyers'),
(20, 3, 'Money Service Business', 'Currency Exchange Services,Money Transmitters,Banking Services'),
(21, 3, 'Banking Equipment', 'ATM Machines,Coin Counters,Bank Teller Machines,Cash Dispensers,Point-of-Sale (POS) Equipment,Digital Banking Devices'),
(22, 3, 'Personal Finance', 'Investing,Retirement Planning,Tax Planning,Homeownership,Insurance'),
(23, 3, 'Banks, Credit Unions', 'Banking Services,Savings Accounts,Loans and Credit,Personal Loans,Credit Cards,Bank Branches'),
(24, 3, 'Insurance Company', 'Home Insurance,Health Insurance,Life Insurance'),
(25, 3, 'Pawnshops', 'Pawnshop Jewelry,Pawnshop Appraisals,Used Merchandise'),
(26, 4, 'Restaurants', 'Cuisine,Fine Dining,Fast Food,Food and Beverage,Foodie Culture,Culinary Trends'),
(27, 4, 'Catering Equipment', 'Catering Supplies,Food Service Equipment,Kitchen Equipment,Catering Appliances,Buffet Equipment,Cooking and Heating Devices,Event Catering Equipment'),
(28, 4, 'Farmers Market', 'Fresh Food,Organic Farming,Food Vendors,Handmade Crafts,Market Day,Homemade Goods,Outdoor Market'),
(29, 4, 'Food Retailers', 'Grocery Stores,Supermarkets,Convenience Stores,Online Grocery Shopping,Fresh Food Markets'),
(30, 4, 'Supermarket', 'Grocery Stores'),
(31, 4, 'Catering', 'Event Catering,Catering Services,Wedding Catering,Catering for Parties,Catering Events'),
(32, 4, 'Cafes', 'Coffee Shops,Cozy Cafes,Local Cafés,Café Trends,Espresso Bars'),
(33, 4, 'Food Distributors', 'Food Delivery,Local Food Distributors,Frozen Food Distributors'),
(34, 4, 'Food Manufacturing', 'Food Processing,Food Manufacturing Plants,Food Industry'),
(35, 4, 'Wine and Beer', 'Wine Tasting,Beer Tasting,Winemaking,Wine and Beer Events'),
(36, 5, 'Doctors and Clinics', 'Doctors,Medical Clinics,Healthcare Providers,Specialty Clinics,Healthcare Facilities,Healthcare Services,Dental Clinics,Mental Health Services,Wellness Clinics'),
(37, 5, 'Health Care', 'Medical Services,Health and Wellness,Health Insurance,Medical Treatment,Public Health'),
(38, 5, 'Hairdressers', 'Hair Salons,Barber Shops,Beauty Salons,Hairdressing Tools'),
(39, 5, 'Beauty Proffesional', 'Makeup Artists,Estheticians,Hairstylists,Nail Technicians,Beauty Salons,Spa Treatments'),
(40, 5, 'Medical Equipment', 'Medical Devices,Hospital Equipment,Surgical Instruments,Monitoring Devices,Laboratory Equipment,Dental Equipment'),
(41, 5, 'Beauty Product', 'Skincare Products,Makeup Products,Haircare Products,Cosmetics,,Anti-Aging Products'),
(42, 5, 'Nursing and Care', 'Healthcare,Healthcare Professionals,Home Healthcare,Healthcare Facilities'),
(43, 5, 'Pharmacies', 'Over-the-Counter Drugs,Medication Counseling,Online Pharmacies,Pharmacist Services'),
(44, 5, 'Fitness', 'Fitness Centers,Gyms,Dance Studios,Martial Arts Studios'),
(45, 5, 'Massage Therapist', 'Massage Therapy,Spa and Wellness,Relaxation Massage,Massage Clinics,Massage Training'),
(46, 5, 'Dentists', 'Dental Services,Oral Surgery,Dental Implants,Teeth Whitening,Dental Check-Ups,Dental Clinics'),
(47, 5, 'Opticians', 'Optical Services,Eyeglasses,Contact Lenses,Eye Care Products,Vision Correction,Frames and Lenses,Reading Glasses,Sunglasses'),
(48, 6, 'Industrial Services', 'Manufacturing Services,Engineering Services,Industrial Equipment,Maintenance and Repair,Fabrication Services'),
(49, 6, 'Furniture Manufacturers', 'Furniture Production,Office Furniture,Wood Furniture,Furniture,Metal Furniture,Wholesale Furniture'),
(50, 6, 'Automotive', 'Automobiles,Auto Repair,Automotive Parts,Vehicle Accessories,Car Rentals,Motorcycles,Car Dealerships,Vehicle Maintenance'),
(51, 6, 'Paper Products', 'Paper supplier,Paper products company,Office paper supplier,Printer paper,Shipping materials,Bubble wrap,Packaging tape,Printing services,Wholesale paper products'),
(52, 6, 'Carpentry', 'Carpentry contractors,Carpentry companies,Woodworking services,Carpentry work These general tag'),
(53, 6, 'Electrical Services', 'Electricians,Wiring services,Electrical maintenance,Electrical repair,Emergency electrical services,Electrical experts'),
(54, 6, 'Oil and Gas Companies', 'Energy companies,Gas exploration companies,Gas production,Oil and gas equipment suppliers,Energy industry careers'),
(55, 6, 'Industrial Automation', 'Factory automation,Automation technology,Automation companies,Control system manufacturers,Manufacturing automation,Automation training'),
(56, 6, 'Steel Products', 'Steel manufacturers,Steel products and services,Steel fabrication services,Steel components,Steel import/export'),
(57, 7, 'Gadgets', 'Electronic gadgets,Smartphones,Tablets,Laptops,Google gadgets,Samsung gadgets,Apple gadgets,Gadget retailers,Phone cases and covers,Chargers and cables,Screen protectors'),
(58, 7, 'Hardware Stores', 'Local hardware store,Hardware shop,DIY supplies,Flooring materials,Landscaping materials,Home decor products,Paint store,Tool rental services,Construction materials'),
(59, 7, 'Jewellery', 'Jewelry stores,Rings,Necklaces,Earrings,Bracelets,Watches,Brooches,Pendants,Anklets,Gold jewelry,Wedding bands,Engagement rings'),
(60, 7, 'Mobile Phone Shops', 'Mobile phone stores,Cell phone shops,Phone accessories store,Phone cases and covers,Screen protectors,Chargers and cables,Phone repair shops,Screen repair services'),
(61, 7, 'Music', 'Spotify,Concert tickets,Musical instrument,Piano,Guitar'),
(62, 7, 'Clothing and Accessories', 'Clothing and accessories,Trendy clothing,Fashion brands,Dresses,,Shoes,Handbags,Nike,Gucci,Online clothing stores,Thrift stores'),
(63, 7, 'Furniture', 'Furniture stores,Modern furniture,Dining tables and chairs,Bedroom furniture,Office furniture,Furniture shopping,Restoring old furniture,Furniture for events'),
(64, 7, 'Books', 'Bookstores,Stephen King,J.K. Rowling,Digital reading apps,Online bookstores'),
(65, 7, 'Optical Shop', 'Eyewear stores,Glasses shop,Eyeglass frames,Eyeglass cases,Eyeglass cleaners,Eyewear repair services,Glasses repair services,Adjusting eyeglass frames,Cleaning eyeglasses'),
(66, 7, 'Pet Shop', 'Pet stores,Pet supply shops,Dog shop,Cat store,Pet food,Pet accessories,Pet grooming products,Pet grooming services,Veterinary services,Online pet stores'),
(67, 8, 'Hotels', 'Hotel booking,Places to stay,Online hotel booking,Hotel reservation,Business hotels'),
(68, 8, 'Travel Agents', 'Travel agencies,Hotels and accommodations,Tour packages,Travel insurance,Hiking and trekking tours,Cruise travel agents,Guided tours,Destination weddings'),
(69, 8, 'Apartments', 'Apartments for rent,Studio apartments,One-bedroom apartments,Rental property listings,Pet-friendly apartments,Month-to-month rentals,'),
(70, 8, 'Hotel and Motel Equipment', 'Hotel supplies,Hotel and motel furniture,Hotel room furniture,,Hotel kitchen and restaurant equipment,Housekeeping and cleaning supplies,Hotel equipment suppliers'),
(71, 9, 'Construction', 'Construction companies,Renovation and remodeling,Building materials,Construction management,,Infrastructure upgrades,Power tools'),
(72, 9, 'Construction Equipment', 'Heavy machinery,Equipment rental,Excavators,Cranes,Equipment rental services,Pre-owned heavy equipment,Online equipment auctions,Equipment repair services'),
(73, 9, 'Decorators', 'Home decorating services,Interior design consultation,Room makeover,,Office space design,Furniture stores,Home decor shops,Interior design showrooms,Art and decor galleries'),
(74, 9, 'Handyman', 'Home repair services,Odd jobs and repairs,General maintenance,Home improvement projects,Flooring installation,Essential hand tools,Power tools for repairs'),
(75, 9, 'Plumbers', 'Plumbing services,Plumbing repair,Drain cleaning,Pipe repair,,Budget-friendly plumbing repairs'),
(76, 9, 'Plumbing Services', 'Plumbing service providers,Drain cleaning services,Sewer line repair,Plumbing maintenance services,Budget-friendly plumbing repairs'),
(77, 9, 'Glass Manufacturing', 'Glass manufacturing companies,Glass products and applications,Glass containers,Glass tableware and cookware,Recycled glass products,Cutting and grinding equipment'),
(78, 10, 'Motorbikes', 'Motorcycles,Honda,Sportbikes,Adventure bikes,Motorcycle helmets,Riding gear,Motorcycle repair,Motorcycle service,Motorcycle insurance,Selling a motorcycle'),
(79, 10, 'Vehicle Sales', 'Car sales,New and used vehicles for sale,Toyota,Ford,Car loans,'),
(80, 10, 'Bicycles', 'Bikes,Cycling,Mountain bikes,Cycling clothing,Bicycle repair shops,Buying a bicycle'),
(81, 10, 'Package Shipping', 'Shipping services,Parcel shipping,Same-day delivery,Air cargo,Online shipping services,E-commerce shipping,Packaging materials,Real-time shipment tracking'),
(82, 10, 'Auto Services', 'Automotive services,Car maintenance and repair,Oil change services,Transmission repair,Car repair discounts,Auto service deals'),
(83, 10, 'Bus Line', 'Bus transportation,Bus services,City buses,Bus ticket prices,Online bus ticket booking,Bus stations'),
(84, 10, 'Transport', 'Transport services,Public transit,Cycling,Air travel,Autonomous vehicles,Electric and hybrid vehicles'),
(85, 10, 'Car Rental', 'Rent a car,Rental car services,Car rental companies,Airport car rentals,Rental car pricing'),
(86, 10, 'Driving School', 'Traffic school,Driving instructors,Adult driving classes,Package deals,Virtual driving lessons,Certified driving schools,Licensing and accreditation,Driving school facilities'),
(87, 10, 'Vehicle Manufacturers', 'Car manufacturers,Automotive companies,Automotive production,Hybrid car makers,Eco-friendly automobile production'),
(88, 10, 'Auto Supplies', 'Automotive Parts,Car Accessories,Vehicle Repairs,Auto Tools,Car Maintenance,Auto Body Parts'),
(89, 10, 'Car Wash', 'Auto detailing,Car wash services,Wash and detailing packages,Monthly car wash subscriptions,Interior detailing'),
(90, 11, 'Real Estate Agents', 'Realtors,Real estate brokers,Real estate investments,Homes for sale,Apartment rentals'),
(91, 11, 'Property Management', 'Rental property management,Real estate management,Condo association management,Rent collection,Real estate investment'),
(92, 11, 'Rental Property', 'Rental homes,Apartment rentals,Vacation and short-term rentals,Condo rentals,Rental rates,Real estate investment'),
(93, 11, 'Building Maintenance', 'Property maintenance,Commercial building maintenance,Emergency repairs,Retail store maintenance,'),
(94, 11, 'Interior Design', 'Design agencies,Interior decorators,Retail store design,Design company case studies,CAD tools,Design software'),
(95, 11, 'Commercial Property', 'Commercial property,Commercial real estate services,Industrial warehouses,Financing for real estate investments,Lease negotiations'),
(96, 11, 'Renovation', 'Home renovation,Renovation contractors,Renovation products,Flooring and fixtures,Building materials'),
(97, 11, 'Auctions', 'Online auctions,Live auctions,eBay,Jewelry auctions,Auction platforms'),
(98, 11, 'Security', 'Home security,Alarm systems,Security companies,Firewall protection,Antivirus software,CCTV cameras'),
(99, 11, 'Warehouses', 'Logistics hubs,Warehouse facilities,Warehouse management,,Inventory management software,RFID tracking'),
(100, 11, 'Fire Safety Equipment', 'Fire prevention equipment,Fire safety products,Fire extinguishers,Fire safety equipment suppliers,Installing smoke alarms'),
(101, 11, 'Apartment Rentals', 'Rental properties,Apartment for rent,Studio apartments,Apartment rental prices,2-bedroom apartments');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `iD` int(11) NOT NULL,
  `userDesccription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`iD`, `userDesccription`) VALUES
(1, 'CEIPO'),
(2, 'Business'),
(3, 'User'),
(4, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_resume`
--

CREATE TABLE `user_resume` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `summary` tinytext NOT NULL,
  `contacts` varchar(500) NOT NULL,
  `schools` varchar(500) NOT NULL,
  `school_address` varchar(1000) NOT NULL,
  `school_sy` varchar(500) NOT NULL,
  `exp_company` varchar(500) NOT NULL,
  `exp_position` varchar(255) NOT NULL,
  `work_exp` varchar(1000) NOT NULL,
  `work_address` varchar(500) NOT NULL,
  `exp_year` varchar(255) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `cert_desc` varchar(500) NOT NULL,
  `cert_year` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_resume`
--

INSERT INTO `user_resume` (`id`, `app_id`, `fullname`, `position`, `address`, `summary`, `contacts`, `schools`, `school_address`, `school_sy`, `exp_company`, `exp_position`, `work_exp`, `work_address`, `exp_year`, `skills`, `cert_desc`, `cert_year`, `file`) VALUES
(2, 0, 'Angelo Dellosa Perlota', 'Software Engineer', '126 L. Nadurata St. 4th Avenue Caloocan City', 'To secure a software engineering position in a dynamic organization where I can utilize my 5+ years of experience in software development, experience in coding and debugging, and proven ability to develop high-quality software applications.  Looking for a', 'angeloperlota38@gmail.com,  09472003653,  Angelo@linkedIn', 'Grace Park Elementary School Main,  Caloocan High School,  Caloocan Senior High School,  University Of Caloocan City ', '641 L. Nadurata St. 6th Avenue Caloocan City,  10 th avenue Caloocan City,  10 th avenue Caloocan City,  Biglang  Awa Streeth', '2006-2012,  2012-2018,  2018-2020,  2020- Current', 'Accenture,  Google', 'Senior Software Engineer,  Senior Software Engineer', 'Lead Developer,  Lead Developer of Pixle', '126 BGC St. 4th Avenue BGC City ,  San Francisco, Sillicon Valley', '2020-2021,  2021-Current', 'Python,  Mysql,  PHP,  Laravel,  React,  node.js,  Java,  C#', 'DICT Cloud Computing ,  DICT Bidata,  AWS Certified,  Cloud Engineer,  Scrum Master', '2022-2023,  2022,  2023,  2023,  2023-2024', ''),
(3, 0, '1 1 1', '11', '1', '1', '1,  1,  1', '1,  1,  1,  1', '1,  1,  1,  1', '1,  1,  1,  1', '1,  2', '1,  2', '1,  2', '1,  2', '1,  2', '1', '1', '', ''),
(5, 0, 'Wonu Jeon Kim', 'Crew', '123 General Street Bagong Barrio Caloocan City', 'Our objective for the crew is to ensure efficient collaboration, safety, and excellence in performance, while accomplishing the mission or project\'s goals within the specified timeline and budget.', '20200089m.colmo.paulamae.bscs@gmail.com,  01234567890,  https://www.linkedin.com/wonujeonkim', 'Sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample', '', '', ''),
(6, 10, 'Wonu Jeon Kim', 'Crew', '123 General Street Bagong Barrio Caloocan City', 'Our objective for the crew is to ensure efficient collaboration, safety, and excellence in performance, while accomplishing the mission or project\'s goals within the specified timeline and budget.', '20200089m.colmo.paulamae.bscs@gmail.com,  01234567890,  https://www.linkedin.com/wonujeonkim', 'Sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'uploads/doc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `zone_list`
--

CREATE TABLE `zone_list` (
  `ID` int(11) NOT NULL,
  `Zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_list`
--

INSERT INTO `zone_list` (`ID`, `Zone`) VALUES
(1, 'Zone 1'),
(2, 'Zone 2'),
(3, 'Zone 3'),
(4, 'Zone 4'),
(5, 'Zone 5'),
(6, 'Zone 6'),
(7, 'Zone 7'),
(8, 'Zone 8'),
(9, 'Zone 9'),
(10, 'Zone 10'),
(11, 'Zone 11'),
(12, 'Zone 12'),
(13, 'Zone 13'),
(14, 'Zone 14'),
(15, 'Zone 15'),
(16, 'Zone 16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_list`
--
ALTER TABLE `application_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `barangay_list`
--
ALTER TABLE `barangay_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `brgyzone_list`
--
ALTER TABLE `brgyzone_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `business_applicant`
--
ALTER TABLE `business_applicant`
  ADD PRIMARY KEY (`bus_applicant`);

--
-- Indexes for table `business_carousel`
--
ALTER TABLE `business_carousel`
  ADD PRIMARY KEY (`bus_carou_id`);

--
-- Indexes for table `business_faq`
--
ALTER TABLE `business_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_links`
--
ALTER TABLE `business_links`
  ADD PRIMARY KEY (`bus_link_id`);

--
-- Indexes for table `business_list`
--
ALTER TABLE `business_list`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `business_location`
--
ALTER TABLE `business_location`
  ADD PRIMARY KEY (`bus_loc_id`);

--
-- Indexes for table `business_requirement`
--
ALTER TABLE `business_requirement`
  ADD PRIMARY KEY (`bus_req_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `district_list`
--
ALTER TABLE `district_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner_list`
--
ALTER TABLE `owner_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post_event`
--
ALTER TABLE `post_event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subcategory_list`
--
ALTER TABLE `subcategory_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `user_resume`
--
ALTER TABLE `user_resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_list`
--
ALTER TABLE `zone_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_list`
--
ALTER TABLE `application_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barangay_list`
--
ALTER TABLE `barangay_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `brgyzone_list`
--
ALTER TABLE `brgyzone_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `business_applicant`
--
ALTER TABLE `business_applicant`
  MODIFY `bus_applicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `business_carousel`
--
ALTER TABLE `business_carousel`
  MODIFY `bus_carou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `business_faq`
--
ALTER TABLE `business_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `business_links`
--
ALTER TABLE `business_links`
  MODIFY `bus_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `business_list`
--
ALTER TABLE `business_list`
  MODIFY `bus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `business_location`
--
ALTER TABLE `business_location`
  MODIFY `bus_loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `business_requirement`
--
ALTER TABLE `business_requirement`
  MODIFY `bus_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `district_list`
--
ALTER TABLE `district_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `owner_list`
--
ALTER TABLE `owner_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `post_event`
--
ALTER TABLE `post_event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory_list`
--
ALTER TABLE `subcategory_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_resume`
--
ALTER TABLE `user_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zone_list`
--
ALTER TABLE `zone_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
