-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 09:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buds`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barangay_list`
--

CREATE TABLE `barangay_list` (
  `ID` int(11) NOT NULL,
  `Barangay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_applicant`
--

INSERT INTO `business_applicant` (`bus_applicant`, `bus_id`, `pos_vacant`, `job_desc`, `job_spec`, `degree`, `year_exp`, `status`) VALUES
(1, 6733, 'Chef', 'Taga Luto', 'Knife Skills,Flambe,Meat,Fish', 'BSHM', '2 years', 1),
(2, 6733, 'Manager', 'Taga Manage', 'Manage,People,Operations', 'BSTM', '3 Years', 1),
(5, 6733, 'Coor', 'Coordinator', 'People,Manage,Coordinate', 'BSCOMM', '4 Years', 1),
(6, 6733, 'Prof', 'taga turo', 'Teaching,People,Student', 'bscs', '2 years', 1),
(7, 6733, 'Dept head', 'taga manage', 'Manage,Teaching,People', 'bscs', '5 years', 1),
(8, 6733, 'Programmer', 'Taga Program', 'Coding,PHP,JS,PEARL', 'BSCS', '2 years', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_carousel`
--

CREATE TABLE `business_carousel` (
  `bus_carou_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `pic1` varchar(255) DEFAULT NULL,
  `pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_carousel`
--

INSERT INTO `business_carousel` (`bus_carou_id`, `bus_id`, `pic1`, `pic2`, `pic3`, `pic4`) VALUES
(10, 6733, '6516b323a4dbc.jpg', '6516b31cd41b5.jpg', '6516b3167d670.jpg', '6516b3059ceb3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `business_links`
--

CREATE TABLE `business_links` (
  `bus_link_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_fb` varchar(255) NOT NULL,
  `bus_ig` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_links`
--

INSERT INTO `business_links` (`bus_link_id`, `bus_id`, `bus_fb`, `bus_ig`) VALUES
(1, 1, 'https://www.facebook.com/EatsAndTreatsShop', 'https://www.instagram.com/paucolmo/'),
(2, 2, 'facebook.com/athena\'skitchen', 'https://www.instagram.com/athena\'skitchen/'),
(3, 3, 'https://www.facebook.com/theofficialsweetbites', 'https://www.instagram.com/jlyngtrrz/'),
(4, 4, 'https://www.facebook.com/profile.php?id=100093608795468', 'https://www.instagram.com/makeupbybeababe/'),
(5, 5, 'https://www.facebook.com/AlwaySmile/', 'https://www.instagram.com/AlwaySmile/'),
(6, 6, 'https://www.facebook.com/LabaCoin', 'https://www.instagram.com/LabaCoin'),
(7, 7, 'https://www.facebook.com/Ishopaway/', 'https://www.instagram.com/ishopaway/'),
(8, 8, 'https://www.facebook.com/BeautyByPau/', 'https://www.instagram.com/BeautyByPau/'),
(9, 9, 'https://www.facebook.com/ShaLynCosmetics', 'https://www.instagram.com/ShaLynCosmetics'),
(10, 10, 'https://www.facebook.com/Shalon/', 'https://www.instagram.com/Shalon/'),
(11, 11, '', ''),
(12, 12, 'https://www.facebook.com/GawangKamay/', 'https://www.instagram.com/Gawangkamay/'),
(13, 13, '', ''),
(14, 14, '', ''),
(15, 15, 'https://www.facebook.com/Interior.Inc/', 'https://www.instagram.com/Interior.Inc/'),
(16, 16, 'https://www.facebook.com/Fancytel.resort', 'https://www.instagram.com/Fancytel.resort/'),
(17, 17, 'https://www.facebook.com/Bi_Rental/', 'https://www.instagram.com/Bi_Rental/'),
(18, 18, 'https://www.facebook.com/LovePetShop/', 'https://www.instagram.com/LovePetShop/'),
(19, 19, 'https://www.facebook.com/J_builders/', 'https://www.instagram.com/J_builders/'),
(20, 20, 'https://www.facebook.com/CarFixer/', 'https://www.instagram.com/Carfixer/'),
(21, 21, 'https://www.facebook.com/hsg65_centers/', 'https://www.instagram.com/hsg65_centers/'),
(22, 22, 'https://www.facebook.com/Dormakaba', 'https://www.instagram.com/dormakaba/'),
(23, 23, 'https://www.facebook.com/airnheat/', 'https://www.instagram.com/airnheat/'),
(24, 24, 'https://www.facebook.com/Taylor_Mark', 'https://www.instagram.com/taylormark/'),
(25, 25, 'https://www.facebook.com/dapaborito/', 'https://www.instagram.com/dapaborito/'),
(26, 26, 'https://www.facebook.com/pawnShopexpress/', 'https://www.instagram.com/pawnShopexpress/'),
(27, 27, 'https://www.facebook.com/Dentalization/', 'https://www.instagram.com/dentalization/'),
(28, 28, 'https://www.facebook.com/elektry/', 'https://www.instagram.com/elektry'),
(29, 29, 'https://www.facebook.com/elektry/', 'https://www.instagram.com/elektry'),
(73, 6733, 'www.facebook.com', 'www.instagram.com'),
(74, 6734, 'www.facebook.com/xconstruction', 'www.instagram.com/xconstruction'),
(75, 6735, 'www.facebook.com/unobattery', 'www.instagram.com/unobattery'),
(76, 6736, 'www.facebook.com/3xlsamgyupsal', 'www.instagram.com/3xlsamgyupsal'),
(77, 6737, 'www.facebook.com/cheaprides', 'www.instagram.com/cheaprides'),
(78, 6738, 'www.facebook.com/advancepaper', 'www.instagram.com/advancepaper'),
(79, 6739, 'www.facebook.com/waterstationcaloocan', 'www.instagram.com/waterstationcaloocan'),
(80, 6740, 'www.facebook.com/francissarisari', 'www.instagram.com/francissarisari'),
(81, 6741, 'www.facebook.com/repairshop', 'www.instagram.com/repairshop'),
(82, 6742, 'www.facebook.com/paresan', 'www.instagram.com/paresan'),
(83, 6743, 'www.facebook.com/borgeranisha', 'www.instagram.com/borgeranisha'),
(84, 6744, 'www.facebook.com/JalynsMotoShop', 'www.instagram.com/JalynsMotoShop'),
(85, 6745, 'www.facebook.com/uccstore', 'www.instagram.com/uccstore'),
(86, 6746, 'www.facebook.com/francisphotograper', 'www.instagram.com/francisphotographer'),
(87, 6747, 'www.facebook.com/jalynscomputershop', 'www.instagram.com/jalynscomputershop'),
(88, 6748, 'www.facebook.com/salonspa', 'www.instagram.com/salonspa'),
(89, 6749, 'www.facebook.com/instrumentfrancis', 'www.instagram.com/instrumentfrancis'),
(90, 6750, 'www.facebook.com/fashion', 'www.instagram.com/fashion'),
(91, 6751, 'www.facebook.com/aircon', 'www.instagram.com/aircon'),
(92, 6752, 'www.facebook.com/Arts', 'www.instagram.com/Arts'),
(93, 6753, 'www.facebook.com/Hotel', 'www.instagram.com/Hotel'),
(94, 6754, 'www.facebook.com/Apartmentme', 'www.instagram.com/Apartmentme'),
(95, 6755, 'www.facebook.com/Francisvideostudio', 'www.instagram.com/Francisvideostudio'),
(96, 6756, 'www.facebook.com/CafeShopNiFrancis', 'www.instagram.com/CafeShopNiFrancis'),
(97, 6757, 'www.facebook.com/ParesniFourth', 'www.instagram.com/ParesniFourth'),
(98, 6758, 'www.facebook.com/Motels', 'www.instagram.com/Motels');

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
  `BusinessRemarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_list`
--

INSERT INTO `business_list` (`bus_id`, `ownerId`, `BusinessName`, `Businesslogo`, `BusinessEmail`, `BusinessBranch`, `BusinessEstablish`, `BusinessDescrip`, `BusinessNumber`, `BusinessOpenHour`, `BusinessCloseHour`, `BusinessAddress`, `BusinessBrgy`, `BusinessCategory`, `BusinessSubCategory`, `BusinessStatus`, `BusinessRemarks`) VALUES
(1, 9, 'Hug a Mug', '6506906c11563.png', 'hugamug@gmail.com', 'Caloocan', '2018-10-04', 'Coffee Shop', '09751246841', '08:00', '22:00', '70-c General Concepcion St. Bagong Barrio Caloocan City', '132', '4', '32', '4', ''),
(2, 9, 'Athena\'s Kitchen', '6506908e651ca.png', 'athenaskitchen@gamil.com', 'Caloocan', '2020-08-28', 'online food hub', '09123456789', '10:00', '22:00', '49M. Ponce St. Bagong Barrio Caloocan City', '134', '4', '29', '2', ''),
(3, 9, 'Sweet Bites', '65000b14a581c.png', 'sweetbites@gmail.com', 'Caloocan', '2020-12-01', 'The official SWEET BITES bakery dedicated to serve delicious pastries and to give satisfaction for e', '0955 325 4794', '08:00', '22:00', '191 B. Baltazar st. 10th avenue, Caloocan, Philippines', '63', '4', '32', '2', ''),
(4, 9, 'Makeup By Baebabe', '65000e903d47f.jpg', 'makeupbybeababe@gmail.com', 'Caloocan, Manila Philippines', '2022-03-30', 'Hair and Makeup service for all occasions', '0977 269 6160', '05:00', '22:00', 'Caloocan City, Manila Philippines', '116', '5', '39', '2', ''),
(5, 9, 'AlwaySmile', '6500102fdb769.jpg', 'alwaysmile@gmail.com', 'MayPajo', '2018-04-05', 'malungkot ka ba dito ka na Smile ka sakin', '09123456789', '17:00', '00:00', '21 marikina St MayPajo Caloocan City', '35', '2', '16', '2', ''),
(6, 9, 'LabaCoin', '65001dcce8c7d.jpg', 'labacoin@gmail.com', 'Baesa Caloocan City', '2021-01-31', 'Affordable Laundry Shop', '091206417', '08:00', '18:00', 'Baesa, Caloocan City', '158', '1', '4', '2', ''),
(7, 9, 'iSHop away', '65002000995dc.jpg', 'ishopaway@gmail.com', 'Bagbaguin Caloocan City', '2021-04-03', 'Online Shopping ', '09224258355', '00:00', '00:00', 'Bagbaguin, Caloocan City', '171', '7', '62', '2', ''),
(8, 9, 'Beauty by Pau', '6500217dbea1f.jpg', 'beautybypau@gmail.com', 'Capitol Parkland, South Caloocan City', '2019-07-24', 'H&MU Services', '09272665526', '08:00', '22:00', 'Capitol Parkland, South Caloocan City', '178', '5', '39', '2', ''),
(9, 9, 'ShaLyn Cosmetics', '650022a8c4459.jpg', 'Shalyn_cosmetics@gmail.com', 'Sangandaan, Caloocan City', '2021-11-19', 'Beauty Products', '0977 269 6841', '08:00', '20:00', 'Sangandaan, Caloocan City', '8', '5', '41', '2', ''),
(10, 9, 'NAilSHAlon', '6500241926ea9.jpg', 'nailshalon@gmail.com', 'Grace Park  West, Caloocan City', '2020-05-28', 'Beauty, Nail Spa Salon ', '09457515895', '08:00', '21:00', 'Grace Park West, Caloocan City', '40', '5', '39', '2', ''),
(11, 9, 'Auto Touch', '6500252663832.jpg', 'autouch@gmail.com', 'Caimito Road, South Caloocan City', '2022-06-16', 'Automatic Car Wash', '0948521158623', '10:00', '18:00', 'Caimito Road, South Caloocan City', '77', '10', '89', '2', ''),
(12, 9, 'Gawang Kamay', '650026fe7755b.jpg', 'gawangkamay@gmail.com', 'Grace Park East, Madre Ignacia, Caloocan City', '2020-05-16', 'Master of the Craft Learning Studio', '09272665526', '06:00', '18:00', 'Grace Park East St Madre Ignacia, Caloocan City', '92', '2', '14', '2', ''),
(13, 9, 'Handy Manny Tooling Around', '65002844a15d3.jpg', 'handymanny_shop@gmail.com', 'Saint Joseph - Barracks Tala Caloocan City', '2021-08-06', 'Tooling Shop', '09856542584', '10:00', '20:00', 'Saint Joseph - Barracks Tala, Caloocan City', '186', '9', '74', '2', ''),
(14, 9, 'MoonCoin', '65002a49f15c2.jpg', 'mooncoin@gmail.com', 'Dagatdagatan, Caloocan City - South', '2022-05-24', 'Bank', '09864547869', '06:00', '20:00', 'Dagatdagatan , Caloocan City South', '113', '3', '22', '2', ''),
(15, 9, 'Interior.Inc', '650033d0d1ed5.jpg', 'Interior.inc@gmail.com', 'Deparo 2 , Caloocan City', '2010-10-10', 'House Room Interior Designer', '09645857457', '10:00', '18:00', 'Deparo St. Caloocan City - South', '170', '11', '94', '2', ''),
(16, 9, 'fancytel', '65003638a3e3d.jpg', 'fancytel.resort@gmail.com', 'Grace Park , Caloocan City', '2022-11-06', 'Hotel and Resort called Fancytel ', '09854226125', '00:00', '12:00', 'J. Teodoro Street 7th Avenue West, Caloocan City', '55', '8', '67', '2', ''),
(17, 9, 'Bi-RENTAL', '650037c485015.jpg', 'bicyclerental@gmail.com', 'District 1 , Caloocan City', '2016-02-17', 'BICYCLE RENTAL SHOP', '09652545447', '05:00', '22:00', 'Heroes Del 96 District 1, Caloocan City', '75', '10', '80', '2', ''),
(18, 9, 'PetShop by Love', '65003a94932b8.jpg', 'lovepetshop@gmail.com', 'Caloocan City', '2023-12-06', 'Pet Shop by LOVE', '09644755558', '08:00', '18:00', 'Caloocan City, Manila Philippines', '61', '1', '6', '2', ''),
(19, 9, 'J Builders', '65003c6cc2376.jpg', 'J_Builders@gmail.com', 'Franville IV, North Caloocan City', '2021-12-08', 'Builders Company', '09455685221', '10:00', '17:00', 'Franville IV, North Caloocan City', '176', '6', '49', '2', ''),
(20, 9, 'CAR+FIXER', '65003df16eaf1.jpg', 'carfixer@gamil.com', 'North Caloocan City', '2022-02-03', 'Car maker Shop', '09658541254', '08:00', '18:00', 'Mountain Heights Subdivision, Caloocan City North', '183', '6', '50', '2', ''),
(21, 9, 'HSG 65 health and safety centers', '6500494908d28.jpg', 'hsg56_healthsafetycenter@gmail.com', 'Caloocan City', '2021-05-06', 'Health and Safety Goverment at Brgy 65 Caloocan City', '09566641259', '06:00', '22:00', 'C. Apostol Caloocan City - South', '65', '1', '10', '2', ''),
(22, 9, 'DORMakaba!', '65004ccfe1c43.jpg', 'dormakaba@gmail.com', 'Silanganan Subdivision - Caloocan City', '2021-07-03', 'We offered Lady room ', '09684521257', '10:00', '18:00', 'Silanganan Subdivision, Street Caloocan City', '167', '8', '69', '2', ''),
(23, 9, 'Affordable Air n Heat', '65004f3358636.png', 'airnheat@gmail.com', 'Sta. Quitera, Caloocan City', '2021-02-14', 'you can feel air n heat at the same time in affordable way', '09458787421', '10:00', '18:00', 'Cleofer Street, Sta Quiteria, Caloocan City', '162', '1', '13', '2', ''),
(24, 9, 'Taylor - Real estate agents', '650051014ed96.png', 'taylormark@gmail.com', 'Garcia Street, Sta. Quiteria, Caloocan City', '2016-09-09', 'Please dont be Inlove with someone else', '09652145873', '05:00', '18:00', 'Garcia Street, Bartolome Compound, Sta. Quiteria, Caloocan City', '83', '11', '90', '2', ''),
(25, 9, 'Da Paborito Caterer', '65007be19fc8e.jpg', 'dapaborito@gmail.com', 'Sangandaan, Caloocan City', '2015-01-19', 'Ang paboritong padesalan sa sangandaan ', '09145487635', '05:00', '23:00', 'MX5F+36C, C-4, Sangandaan, Caloocan, Metro Manila', '1', '4', '27', '2', ''),
(26, 9, 'PAWnShop Express', '650081c6aa8d1.jpg', 'pawnshop_express@gmail.com', 'Sangandaan, Caloocan City', '2020-02-06', 'PawnShop', '09654875215', '10:00', '23:00', '247 Bisig Ng Kabataan, Sangandaan, Caloocan, Kalakhang Maynila', '2', '3', '25', '2', ''),
(27, 9, 'Dentalization', '650083523a730.png', 'Dentalization@gmail.com', 'Sangandaan, Caloocan City', '2019-08-25', 'Dental Cleaning Center', '09475862189', '10:00', '18:00', 'Ground Floor, SM Sangandaan, Samson Rd, cor Marcelo H. Del Pilar St, Sangandaan, Caloocan, 1408 Metro Manila', '3', '5', '46', '2', ''),
(28, 9, 'ELEKTRY', '650086feccd7a.png', 'elektry@gmail.com', 'Bisig ng Nayon, sangandaan Caloocan City', '2022-11-14', 'Electric tool and services', '09568747215', '10:00', '19:00', '6 Bisig ng Nayon St, Sangandaan, Caloocan, Metro Manila', '4', '6', '53', '2', ''),
(29, 8, 'Train your mind', '650156b449b7e.png', 'training@gmail.com', 'Caloocan City', '2023-09-08', 'Traaaining ang sagot sa lahat nice', '09384759027', '08:30', '20:30', '123 A. sa lugar kung saan masaya street, Caloocan CIty', '5', '1', '1', '2', ''),
(30, 8, 'Retail Ang Business Mo', '650157a1596d4.png', 'retail@gmail.com', 'Sangandaan ', '2023-05-18', 'Ang retails na ito ay business ng isang tao', '09872646824', '08:32', '20:32', '37 Retails Store street 11 ave Caloocan City', '6', '1', '2', '2', ''),
(6733, 8, 'warehouseBussssines', '64ff3e67d7a8c.png', 'warehouse@gmail.com', 'Bagomg Barrio', '2022-12-01', 'warehouse to bili ka', '092766384516', '08:50', '20:50', '67 Bagong Barrio warehouse street Caloocan City', '10', '1', '7', '1', ''),
(6734, 8, 'X Contruction', '6501673f31fa3.jpg', 'x-constuction@gmail.com', 'Road Talikot Street', '2004-11-19', 'Hardware Store Industry & Industrial Supplies', '09875367833', '08:00', '17:00', '31 C-3 Road Talakitok St., Kaunlaran Village, Caloocan, 1400 Metro Manila', '22', '9', '71', '4', ''),
(6735, 8, 'Uno Battery Shop', '65016b6c00b54.jpg', 'unobatteryshop@gmail.com', 'Camarin', '2003-04-15', 'enjoy convenient access to any of our outlets. Also, this provides our customers with fast and efficient delivery of their battery,', '09347251788', '10:00', '20:00', 'Old Tenant Road, Camarin, Caloocan City 1428 Metro Manila', '62', '10', '88', '2', ''),
(6736, 11, '3XL Samgyupsal ', '65017809b76cb.jpg', '3xlsamgyupsal@gmail.com', 'Grace Park', '2018-04-22', 'Masarap pa sa masarap', '09417284620', '12:00', '21:00', '19-D, Ninong Leoncio Street, BF Homes Phase 2, Caloocan City, Metro Manila', '46', '4', '26', '4', ''),
(6737, 11, 'Cheap Rides', '65017a1091ed0.png', 'cheaprides@gmail.com', 'Grace Park', '2013-12-19', 'Best Car Rental in Town', '09753690522', '10:00', '20:00', '2F, DL GROUP CORP, 844, Malaria road, 185, Caloocan City 1400 Metro Manila', '11', '10', '85', '2', ''),
(6738, 11, 'Advance Fashion', '65017e248c3f1.png', 'advancefashion@gmail.com', 'Baesa', '2005-07-08', 'New and Trend Fashion', '09742783921', '08:00', '17:00', '47 Rodriguez Drive, Jordan Valley Village, Baesa, Caloocan City 1100 Metro Manila', '13', '2', '17', '2', ''),
(6739, 11, 'Water Mineral Station', '650189982e5df.jpg', 'water@gmail.com', 'Bagong Barrio', '2023-09-13', 'Refill your water.', '09212023063', '09:00', '18:00', '38 Zapote St. B. B. C. C', '135', '4', '35', '2', ''),
(6740, 11, 'Francis Sari-Sari Store', '65018ad1e62d4.png', 'sarisari@gmail.com', 'Bagong Barrio', '2021-09-13', 'Bili ka lang sakin', '09212023063', '06:10', '18:10', '14 Mariano Ponce St. B. B. C. C', '133', '1', '11', '2', ''),
(6741, 11, 'Shamaine\'s Repair Shop', '65018cc5b4e67.png', 'sharmaine@gmail.com', 'Bagong Barrio', '2019-09-13', 'Repair Shop', '092766384516', '06:00', '18:00', '38 Zapote St. Bagong Barrio Caloocan City', '130', '10', '82', '2', ''),
(6742, 11, 'Pares-Anne', '65018de5c6574.png', 'paresanne@gmail.com', 'Bagong Barrio', '2017-09-13', 'Pag kakain ka, dapat may ka-pares ka', '09212023063', '06:30', '18:30', '37 Zapote St. Bagong Barrio Caloocan City', '57', '4', '34', '2', ''),
(6743, 11, 'Angels burger ni sharmaine', '650190f85b87a.jpg', 'burger@gmail.com', 'Bagong Barrio', '2001-10-10', 'Borgeran ni sharmaine', '09872646824', '06:30', '18:30', 'Barangay 101 Caloocal City', '101', '4', '29', '2', ''),
(6744, 11, 'Jalyn\'s MotoShop and Repair', '6501931440fef.png', 'repair@gmail.com', 'Grace Park', '2001-10-25', 'Paayos kana boss', '09417284620', '06:45', '18:45', 'Barangay 102 Caloocal City', '102', '6', '50', '2', ''),
(6745, 11, 'UCC\'S NATIONAL BOOKSTORE', '6501953509084.png', 'ucc@gmail.com', 'Grace Park', '1995-10-25', 'Notebook nga', '09872646824', '06:00', '05:00', 'Barangay 88 Caloocan City', '88', '1', '12', '2', ''),
(6746, 11, 'Francis Photographer', '650196e082fc4.png', 'francis@gmail.com', 'Bagong Barrio', '2001-10-25', 'Photographer ang sagot sa iyong dp.', '09212023063', '06:00', '20:00', 'Barangay 137 Caloocan City', '137', '2', '18', '2', ''),
(6747, 11, 'Jalyn\'s Computer Shop Cafe', '65019b66c8eb7.jpg', 'computer@gmail.com', 'Bagong Barrio', '2001-10-10', 'Jalyn\'s Computer Shop Cafe is one of the best shop in the world', '09872646824', '07:30', '20:00', 'Barangay 138 Caloocan City', '138', '10', '82', '2', ''),
(6748, 11, 'Jalyn\'s Salon Spa and Haircut', '65019c51eb3ae.jpg', 'jalyn@gmail.com', 'Bagong Barrio', '2020-11-20', 'Nail Cutter ang sagot', '09417284620', '08:00', '21:30', 'Barangay 139', '139', '5', '42', '2', ''),
(6749, 11, 'Francis Instrument Shop', '65019df1d1bb4.png', 'instrument@gmail.com', 'Bagong Barrio', '2010-10-10', 'Pa tono lang idol', '09212023063', '07:30', '20:30', 'Barangay 140 Caloocan City', '140', '2', '16', '2', ''),
(6750, 11, 'Fashion', '65019fb67e841.jpg', 'fashion@gmail.com', 'Bagong Barrio', '2003-10-01', 'Suot pang mayaman po', '09872646824', '08:00', '17:00', 'Barangay 141 Caloocan City', '141', '2', '17', '2', ''),
(6751, 11, 'AC Repair', '6501a0bb7a267.jpg', 'acrepair@gmail.com', 'Caloocan Branch', '2016-09-09', 'Aircon kayo dyan mga guys', '0988987528', '08:00', '18:00', 'Barangay 142 Caloocan City', '142', '1', '13', '2', ''),
(6752, 11, 'Arts and Frame', '6501a1b219d1b.png', 'arts@gmail.com', 'Bagong Barrio', '2015-06-10', 'Picture ni Mona Lisa', '09212023063', '08:00', '19:00', 'Barangay 143 Caloocan City', '143', '2', '14', '2', ''),
(6753, 11, 'Hotel', '6501a2ee57d54.jpg', 'hotel@gmail.com', 'Bagong Barrio', '2015-03-08', 'Hotel to', '09212023063', '06:00', '06:00', 'Barangay 144 Caloocan City', '144', '8', '67', '2', ''),
(6754, 11, 'Francis\' Apartment', '6501a3feb17cb.png', 'apartment@gmail.com', 'Bagong Barrio', '2020-02-14', 'Apartment opss', '09770688500', '06:00', '04:00', 'Barangay 145 Caloocan City', '145', '8', '69', '2', ''),
(6755, 11, 'Francis Video Studio', '6501a69a613a5.png', 'video@gmail.com', 'Caloocan Branch', '2013-01-05', 'Video Studio', '09212023063', '08:00', '17:00', 'Barangay 145 Caloocan City', '145', '2', '15', '2', ''),
(6756, 11, 'Hot Cafe', '6501a91a87e6d.jpg', 'cafe@gmail.com', 'Caloocan Branch', '2004-04-10', 'Kape sa gedli', '09212023063', '07:00', '22:00', 'Barangay 146 Caloocan City', '146', '4', '32', '2', ''),
(6757, 11, 'Fourth\'s Pares & Mami unli rice', '6501ac0e8d355.jpg', 'fourth@gmail.com', 'Caloocan Branch', '2001-01-10', 'Unli Rice and Unli Soup to', '09417284620', '06:00', '04:00', 'Barangay 146 Caloocan City', '146', '4', '33', '2', ''),
(6758, 11, 'Aeryhiel\'s Motel', '6501ace9c2b1b.jpg', 'motel@gmail.com', 'Caloocan Branch', '2006-06-06', 'Motel ni eryel', '092766384516', '06:00', '06:00', 'Barangay 147 Caloocan City', '147', '8', '70', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `business_location`
--

CREATE TABLE `business_location` (
  `bus_loc_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_lat` double NOT NULL,
  `bus_long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_location`
--

INSERT INTO `business_location` (`bus_loc_id`, `bus_id`, `bus_lat`, `bus_long`) VALUES
(1, 1, 14.663352, 120.990865),
(2, 2, 14.659573, 120.9909),
(3, 3, 14.651016, 120.976233),
(4, 4, 14.64506, 120.987415),
(5, 5, 14.638469, 120.972124),
(6, 6, 14.671105, 121.003621),
(7, 7, 14.75678, 121.017811),
(8, 8, 14.754668, 121.065063),
(9, 9, 14.656776, 120.965703),
(10, 10, 14.638599, 120.98228),
(11, 11, 14.657996, 120.981014),
(12, 12, 14.654199, 120.99149),
(13, 13, 14.767413, 121.070198),
(14, 14, 14.645163, 120.98434),
(15, 15, 14.740689, 121.034528),
(16, 16, 14.645243, 120.981773),
(17, 17, 14.655903, 120.980768),
(18, 18, 14.649529, 120.981582),
(19, 19, 14.776373, 121.043143),
(20, 20, 14.758653, 121.08404),
(21, 21, 14.652656, 120.976664),
(22, 22, 14.730832, 121.014315),
(23, 23, 14.682789, 121.006365),
(24, 24, 14.65994, 120.98836),
(25, 25, 14.659833, 120.973273),
(26, 26, 14.658763, 120.971904),
(27, 27, 14.659316, 120.968781),
(28, 28, 14.659316, 120.968781),
(6834, 6733, 14.654667, 120.970639),
(6835, 6734, 14.645292, 120.969086),
(6836, 6735, 14.6511, 120.98188),
(6837, 6736, 14.642313, 120.978495),
(6838, 6737, 14.654006, 120.970475),
(6839, 6738, 14.65218, 120.972728),
(6840, 6739, 14.659658, 120.992045),
(6841, 6740, 14.661968, 120.99182),
(6842, 6741, 14.63784, 120.989542),
(6843, 6742, 14.648162, 120.97931),
(6844, 6743, 14.650901, 120.994073),
(6845, 6744, 14.649626, 120.993679),
(6846, 6745, 14.655123, 120.986089),
(6847, 6746, 14.661724, 120.994626),
(6848, 6747, 14.659611, 120.997238),
(6849, 6748, 14.659617, 120.998198),
(6850, 6749, 14.662829, 120.995441),
(6851, 6750, 14.663421, 120.997968),
(6852, 6751, 14.66473, 120.99269),
(6853, 6752, 14.663403, 120.993403),
(6854, 6753, 14.664048, 120.994408),
(6855, 6754, 14.665813, 120.993936),
(6856, 6755, 14.665813, 120.993936),
(6857, 6756, 14.664874, 120.995779),
(6858, 6757, 14.664811, 120.995845),
(6859, 6758, 14.664806, 120.996922);

-- --------------------------------------------------------

--
-- Table structure for table `business_post`
--

CREATE TABLE `business_post` (
  `bus_post_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_desc` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_post`
--

INSERT INTO `business_post` (`bus_post_id`, `bus_id`, `post_title`, `post_desc`, `photo`, `post_date`, `status`) VALUES
(2, 6733, 'Posting', 'abc', '6518ff129f832.jpg', '2023-10-01', 1),
(3, 6733, 'Promo', 'Yey Promo', '6519153e52c17.jpg', '2023-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_requirement`
--

CREATE TABLE `business_requirement` (
  `bus_req_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_brgyclearance` varchar(255) NOT NULL,
  `bus_dtipermit` varchar(255) NOT NULL,
  `bus_sanitarypermit` varchar(255) NOT NULL,
  `bus_cedula` varchar(255) NOT NULL,
  `bus_mayorpermit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_requirement`
--

INSERT INTO `business_requirement` (`bus_req_id`, `bus_id`, `bus_brgyclearance`, `bus_dtipermit`, `bus_sanitarypermit`, `bus_cedula`, `bus_mayorpermit`) VALUES
(1, 1, '6507e1481e9fb.png', '6507e1815836a.png', '6507e190bf1ab.png', '6507e18b41e2e.png', '6507e3940ba33.png'),
(2, 2, '650009c4205ce.png', '650009c4205d2.png', '650009c4205d3.jpg', '650009c4205d4.jpg', '650009c4205d5.png'),
(3, 3, '65000b14aa20a.png', '65000b14aa20d.png', '65000b14aa20e.jpg', '65000b14aa20f.jpg', '65000b14aa210.png'),
(4, 4, '65000e903f45e.png', '65000e903f462.png', '65000e903f463.jpg', '65000e903f464.jpg', '65000e903f465.png'),
(5, 5, '6500102fe04e4.png', '6500102fe04e7.png', '6500102fe04e8.jpg', '6500102fe04e9.jpg', '6500102fe04ea.png'),
(6, 6, '65001dccee9ca.png', '65001dccee9ce.png', '65001dccee9cf.jpg', '65001dccee9d0.jpg', '65001dccee9d1.png'),
(7, 7, '650020009e1bb.png', '650020009e1bd.png', '650020009e1be.jpg', '650020009e1bf.jpg', '650020009e1c0.png'),
(8, 8, '6500217dc367f.png', '6500217dc3681.png', '6500217dc3682.jpg', '6500217dc3683.jpg', '6500217dc3684.png'),
(9, 9, '650022a8c6176.png', '650022a8c617a.png', '650022a8c617b.jpg', '650022a8c617c.jpg', '650022a8c617d.png'),
(10, 10, '650024192b7ac.png', '650024192b7ae.png', '650024192b7af.jpg', '650024192b7b0.jpg', '650024192b7b1.png'),
(11, 11, '6500252669b53.png', '6500252669b59.png', '6500252669b5b.jpg', '6500252669b5c.jpg', '6500252669b5d.png'),
(12, 12, '650026fe7c56c.png', '650026fe7c56f.png', '650026fe7c570.jpg', '650026fe7c571.jpg', '650026fe7c572.png'),
(13, 13, '65002844a5f4c.png', '65002844a5f4e.png', '65002844a5f4f.jpg', '65002844a5f50.jpg', '65002844a5f51.png'),
(14, 14, '65002a4a0204e.png', '65002a4a02050.png', '65002a4a02051.jpg', '65002a4a02052.jpg', '65002a4a02053.png'),
(15, 15, '650033d0d3f4c.png', '650033d0d3f4e.png', '650033d0d3f4f.jpg', '650033d0d3f50.jpg', '650033d0d3f51.png'),
(16, 16, '65003638a8c4b.png', '65003638a8c4e.png', '65003638a8c4f.jpg', '65003638a8c50.jpg', '65003638a8c51.png'),
(17, 17, '650037c489aa7.png', '650037c489aaa.png', '650037c489aab.jpg', '650037c489aac.jpg', '650037c489aad.png'),
(18, 18, '65003a9497d92.png', '65003a9497d93.png', '65003a9497d94.jpg', '65003a9497d95.jpg', '65003a9497d96.png'),
(19, 19, '65003c6cc61fc.png', '65003c6cc61ff.png', '65003c6cc6200.jpg', '65003c6cc6201.jpg', '65003c6cc6202.png'),
(20, 20, '65003df1734e3.png', '65003df1734e5.png', '65003df1734e6.jpg', '65003df1734e7.jpg', '65003df1734e8.png'),
(21, 21, '650049490b1d0.png', '650049490b1d4.png', '650049490b1d5.jpg', '650049490b1d6.jpg', '650049490b1d7.png'),
(22, 22, '65004ccfe73f3.png', '65004ccfe73f5.png', '65004ccfe73f6.jpg', '65004ccfe73f7.jpg', '65004ccfe73f8.png'),
(23, 23, '65004f335d2eb.png', '65004f335d2ed.png', '65004f335d2ee.jpg', '65004f335d2ef.jpg', '65004f335d2f0.png'),
(24, 24, '650051015351c.png', '6500510153520.png', '6500510153521.jpg', '6500510153522.jpg', '6500510153523.png'),
(25, 25, '65007be1a21c2.png', '65007be1a21c6.png', '65007be1a21c7.jpg', '65007be1a21c8.jpg', '65007be1a21c9.png'),
(26, 26, '650083523f2af.png', '650083523f2b2.png', '650083523f2b3.jpg', '650083523f2b4.jpg', '650083523f2b5.png'),
(27, 27, '650086fed133a.png', '650086fed133c.png', '650086fed133d.jpg', '650086fed133e.jpg', '650086fed133f.png'),
(28, 28, '65008712ac59d.png', '65008712ac59f.png', '65008712ac5a0.jpg', '65008712ac5a1.jpg', '65008712ac5a2.png'),
(6834, 6733, '6516b176aae5e.png', '65015bc6e7248.png', '65015bc6e7249.jpg', '65015bc6e724b.jpg', '6516afa37d8ff.jpg'),
(6835, 6734, '6501673f363d7.png', '6501673f363dc.png', '6501673f363dd.jpg', '6501673f363de.jpg', '6501673f363df.png'),
(6836, 6735, '65016b6c0353f.png', '65016b6c03547.png', '65016b6c03548.jpg', '65016b6c0354a.jpg', '65016b6c0354b.png'),
(6837, 6736, '65017809bd7be.png', '65017809bd7c2.png', '65017809bd7c3.jpg', '65017809bd7c4.jpg', '65017809bd7c5.png'),
(6838, 6737, '65017a1099d3c.png', '65017a1099d43.png', '65017a1099d44.jpg', '65017a1099d45.jpg', '65017a1099d46.png'),
(6839, 6738, '65017e2491620.png', '65017e2491625.png', '65017e2491626.jpg', '65017e2491628.jpg', '65017e2491629.png'),
(6840, 6739, '650189983198d.png', '6501899831994.png', '6501899831995.jpg', '6501899831996.jpg', '6501899831998.jpg'),
(6841, 6740, '65018ad1ecf3c.png', '65018ad1ecf43.png', '65018ad1ecf44.jpg', '65018ad1ecf45.jpg', '65018ad1ecf46.png'),
(6842, 6741, '65018cc5b7907.png', '65018cc5b790f.png', '65018cc5b7910.jpg', '65018cc5b7911.jpg', '65018cc5b7913.png'),
(6843, 6742, '65018de5cd71b.png', '65018de5cd721.png', '65018de5cd722.jpg', '65018de5cd723.jpg', '65018de5cd724.png'),
(6844, 6743, '650190f85ec0a.png', '650190f85ec30.png', '650190f85ec32.jpg', '650190f85ec33.jpg', '650190f85ec34.png'),
(6845, 6744, '6501931449270.png', '6501931449276.png', '6501931449277.jpg', '6501931449278.jpg', '6501931449279.png'),
(6846, 6745, '6501953513aa1.png', '6501953513aaa.png', '6501953513aab.jpg', '6501953513aac.jpg', '6501953513aae.png'),
(6847, 6746, '650196e09089a.png', '650196e0908a0.png', '650196e0908a1.jpg', '650196e0908a2.jpg', '650196e0908a3.png'),
(6848, 6747, '65019b66cbf90.png', '65019b66cbf98.png', '65019b66cbf99.jpg', '65019b66cbf9b.jpg', '65019b66cbf9c.png'),
(6849, 6748, '65019c51ee609.png', '65019c51ee611.png', '65019c51ee613.jpg', '65019c51ee614.jpg', '65019c51ee615.png'),
(6850, 6749, '65019df1d4e74.png', '65019df1d4e7c.png', '65019df1d4e7d.jpg', '65019df1d4e7e.jpg', '65019df1d4e80.png'),
(6851, 6750, '65019fb682866.png', '65019fb68286d.png', '65019fb68286f.jpg', '65019fb682870.jpg', '65019fb682871.png'),
(6852, 6751, '6501a0bb7d286.png', '6501a0bb7d28d.png', '6501a0bb7d28e.jpg', '6501a0bb7d290.jpg', '6501a0bb7d291.png'),
(6853, 6752, '6501a1b2259a4.png', '6501a1b2259aa.png', '6501a1b2259ab.jpg', '6501a1b2259ac.jpg', '6501a1b2259ad.png'),
(6854, 6753, '6501a2ee62c7f.png', '6501a2ee62c84.png', '6501a2ee62c85.jpg', '6501a2ee62c86.jpg', '6501a2ee62c87.png'),
(6855, 6754, '6501a3febac72.png', '6501a3febac7a.png', '6501a3febac7b.jpg', '6501a3febac7d.jpg', '6501a3febac7e.png'),
(6856, 6755, '6501a69a6a5c4.png', '6501a69a6a5ca.png', '6501a69a6a5cb.jpg', '6501a69a6a5cc.jpg', '6501a69a6a5cd.png'),
(6857, 6756, '6501a91a9362f.png', '6501a91a93636.png', '6501a91a93638.jpg', '6501a91a93639.jpg', '6501a91a9363a.png'),
(6858, 6757, '6501ac0e97b86.png', '6501ac0e97b8c.png', '6501ac0e97b8d.jpg', '6501ac0e97b8e.jpg', '6501ac0e97b8f.png'),
(6859, 6758, '6501ace9ca240.png', '6501ace9ca245.png', '6501ace9ca246.jpg', '6501ace9ca247.jpg', '6501ace9ca248.png');

-- --------------------------------------------------------

--
-- Table structure for table `business_reviews`
--

CREATE TABLE `business_reviews` (
  `bus_rev_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `ID` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `email`, `password`, `userType`) VALUES
(8, 'cruzcedric66@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(9, 'jalynguts01@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '2'),
(10, 'pauclm.inc@gmail.com', '673f4f198e2b214a1a9c2f30b5b897eaf915212f', '2'),
(11, '20200089m.colmo.paulamae.bscs@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '3'),
(12, 'laycosharmaine2@gmail.com', 'a3211f2b338ec765f2bbdecdbf6e80a2527aad42', '2');

-- --------------------------------------------------------

--
-- Table structure for table `owner_list`
--

CREATE TABLE `owner_list` (
  `ID` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_list`
--

INSERT INTO `owner_list` (`ID`, `Surname`, `Firstname`, `MiddleName`, `Email`, `contactNumber`, `Address`, `Sex`, `Birthday`, `Age`, `owner_name`, `photo`) VALUES
(1, 'colmo', 'Jalyn', 'Maclang', 'jalynguts01@gmail.com', '09553254794', '191 b. baltazar st. 10th ave brgy. 63 Caloocan CIty', 'Female', '2001-12-01', 22, '', ''),
(2, 'Gutierrez', 'Wow', 'Maclang', 'jalynguts@gmail.com', '09553254794', 'baltazar', 'Male', '2023-09-04', 32, '', ''),
(7, 'cruz', 'cedric', 'Dela Cruz', 'cruzcedric66@gmail.com', '123', '120 M.HIZON ST 10th avenue', 'Male', '2023-09-08', 21, NULL, ''),
(8, 'colmo', 'Jalyn', 'Maclang', 'jalynguts01@gmail.com', '09553254794', '191 b. baltazar st. 10th ave brgy. 63 Caloocan CIty', 'Female', '2001-12-01', 22, NULL, ''),
(9, 'Colmo', 'Pau', 'Medina', 'pauclm.inc@gmail.com', '01234567890', '70-General Concepcion St. Bagong Barrio Caloocan City', 'Female', '2002-06-08', 21, NULL, '650af05575424.jpg'),
(10, 'Kim', 'Wonu', 'Jeon', '20200089m.colmo.paulamae.bscs@gmail.com', '0123456789', '', '', '0000-00-00', 25, NULL, '6515396c89cdd.jpg'),
(11, 'Layco', 'Sharmaine', 'Viernes', 'laycosharmaine2@gmail.com', '09753690522', '5 3rd Avenue West Caloocan City', 'Female', '2000-11-19', 23, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `post_event`
--

CREATE TABLE `post_event` (
  `ID` int(11) NOT NULL,
  `Events` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_list`
--

CREATE TABLE `subcategory_list` (
  `ID` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `subCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory_list`
--

INSERT INTO `subcategory_list` (`ID`, `catId`, `subCategory`) VALUES
(1, 1, 'Training Center'),
(2, 1, 'Retail Services'),
(3, 1, 'Market Search'),
(4, 1, 'Laundry and Dry Cleaning'),
(5, 1, 'Housekeeping Service'),
(6, 1, 'Animal Shelters'),
(7, 1, 'Warehousing'),
(8, 1, 'Baby Sitters'),
(9, 1, 'Advertising'),
(10, 1, 'Health and Safety'),
(11, 1, 'Marketing'),
(12, 1, 'Consultants'),
(13, 1, 'Ac Repair Services'),
(14, 2, 'Arts and Crafts'),
(15, 2, 'Film, Televison and Video'),
(16, 2, 'Music'),
(17, 2, 'Fashion'),
(18, 2, 'Photography'),
(19, 3, 'Legal Services'),
(20, 3, 'Money Service Business'),
(21, 3, 'Banking Equipment'),
(22, 3, 'Personal Finance'),
(23, 3, 'Banks, Credit Unions'),
(24, 3, 'Insurance Company'),
(25, 3, 'Pawnshops'),
(26, 4, 'Restaurants'),
(27, 4, 'Catering Equipment'),
(28, 4, 'Farmers Market'),
(29, 4, 'Food Retailers'),
(30, 4, 'Supermarket'),
(31, 4, 'Catering'),
(32, 4, 'Cafes'),
(33, 4, 'Food Distributors'),
(34, 4, 'Food Manufacturing'),
(35, 4, 'Wine and Beer'),
(36, 5, 'Doctors and Clinics'),
(37, 5, 'Health Care'),
(38, 5, 'Hairdessers'),
(39, 5, 'Beauty Proffesional'),
(40, 5, 'Medical Equipment'),
(41, 5, 'Beauty Product'),
(42, 5, 'Nursing and Care'),
(43, 5, 'Pharmacies'),
(44, 5, 'Fitness'),
(45, 5, 'Massage Therapist'),
(46, 5, 'Dentists'),
(47, 5, 'Opticians'),
(48, 6, 'Industrial Services'),
(49, 6, 'Furniture Manufacturers'),
(50, 6, 'Automotive'),
(51, 6, 'Paper Products'),
(52, 6, 'Carpentry'),
(53, 6, 'Electrical Services'),
(54, 6, 'Oil and Gas Companies'),
(55, 6, 'Industrial Automation'),
(56, 6, 'Steel Products'),
(57, 7, 'Gadgets'),
(58, 7, 'Hardware Stores'),
(59, 7, 'Jewellery'),
(60, 7, 'Mobile Phone Shops'),
(61, 7, 'Music'),
(62, 7, 'Clothing and Accessories'),
(63, 7, 'Furniture'),
(64, 7, 'Books'),
(65, 7, 'Optical Shop'),
(66, 7, 'Pet Shop'),
(67, 8, 'Hotels'),
(68, 8, 'Travel Agents'),
(69, 8, 'Apartments'),
(70, 8, 'Hotel and Motel Equipment'),
(71, 9, 'Construction'),
(72, 9, 'Construction Equipment'),
(73, 9, 'Decorators'),
(74, 9, 'Handyman'),
(75, 9, 'Plumbers'),
(76, 9, 'Plumbing Services'),
(77, 9, 'Glass Manufacturing'),
(78, 10, 'Motorbikes'),
(79, 10, 'Vehicle Sales'),
(80, 10, 'Bicycles'),
(81, 10, 'Package Shipping'),
(82, 10, 'Auto Services'),
(83, 10, 'Bus Line'),
(84, 10, 'Transport'),
(85, 10, 'Car Rental'),
(86, 10, 'Driving School'),
(87, 10, 'Vehicle Manufacturers'),
(88, 10, 'Auto Supplies'),
(89, 10, 'Car Wash'),
(90, 11, 'Real Estate Agents'),
(91, 11, 'Property Management'),
(92, 11, 'Rental Property'),
(93, 11, 'Building Maintenance'),
(94, 11, 'Interior Design'),
(95, 11, 'Commercial Property'),
(96, 11, 'Renovation'),
(97, 11, 'Auctions'),
(98, 11, 'Security'),
(99, 11, 'Warehouses'),
(100, 11, 'Fire Safety Equipment'),
(101, 11, 'Apartment Rentals');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `iD` int(11) NOT NULL,
  `userDesccription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`iD`, `userDesccription`) VALUES
(1, 'CEIPO'),
(2, 'Business Owner'),
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
  `cert_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_resume`
--

INSERT INTO `user_resume` (`id`, `app_id`, `fullname`, `position`, `address`, `summary`, `contacts`, `schools`, `school_address`, `school_sy`, `exp_company`, `exp_position`, `work_exp`, `work_address`, `exp_year`, `skills`, `cert_desc`, `cert_year`) VALUES
(2, 0, 'Angelo Dellosa Perlota', 'Software Engineer', '126 L. Nadurata St. 4th Avenue Caloocan City', 'To secure a software engineering position in a dynamic organization where I can utilize my 5+ years of experience in software development, experience in coding and debugging, and proven ability to develop high-quality software applications.  Looking for a', 'angeloperlota38@gmail.com,  09472003653,  Angelo@linkedIn', 'Grace Park Elementary School Main,  Caloocan High School,  Caloocan Senior High School,  University Of Caloocan City ', '641 L. Nadurata St. 6th Avenue Caloocan City,  10 th avenue Caloocan City,  10 th avenue Caloocan City,  Biglang  Awa Streeth', '2006-2012,  2012-2018,  2018-2020,  2020- Current', 'Accenture,  Google', 'Senior Software Engineer,  Senior Software Engineer', 'Lead Developer,  Lead Developer of Pixle', '126 BGC St. 4th Avenue BGC City ,  San Francisco, Sillicon Valley', '2020-2021,  2021-Current', 'Python,  Mysql,  PHP,  Laravel,  React,  node.js,  Java,  C#', 'DICT Cloud Computing ,  DICT Bidata,  AWS Certified,  Cloud Engineer,  Scrum Master', '2022-2023,  2022,  2023,  2023,  2023-2024'),
(3, 0, '1 1 1', '11', '1', '1', '1,  1,  1', '1,  1,  1,  1', '1,  1,  1,  1', '1,  1,  1,  1', '1,  2', '1,  2', '1,  2', '1,  2', '1,  2', '1', '1', ''),
(5, 0, 'Wonu Jeon Kim', 'Crew', '123 General Street Bagong Barrio Caloocan City', 'Our objective for the crew is to ensure efficient collaboration, safety, and excellence in performance, while accomplishing the mission or project\'s goals within the specified timeline and budget.', '20200089m.colmo.paulamae.bscs@gmail.com,  01234567890,  https://www.linkedin.com/wonujeonkim', 'Sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample,  sample', 'sample', '', ''),
(6, 0, 'Wonu Jeon Kim', 'Crew', '123 General Street Bagong Barrio Caloocan City', 'Our objective for the crew is to ensure efficient collaboration, safety, and excellence in performance, while accomplishing the mission or project\'s goals within the specified timeline and budget.', '20200089m.colmo.paulamae.bscs@gmail.com,  01234567890,  https://www.linkedin.com/wonujeonkim', 'Sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample,  sample,  sample,  sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `zone_list`
--

CREATE TABLE `zone_list` (
  `ID` int(11) NOT NULL,
  `Zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `business_post`
--
ALTER TABLE `business_post`
  ADD PRIMARY KEY (`bus_post_id`);

--
-- Indexes for table `business_requirement`
--
ALTER TABLE `business_requirement`
  ADD PRIMARY KEY (`bus_req_id`);

--
-- Indexes for table `business_reviews`
--
ALTER TABLE `business_reviews`
  ADD PRIMARY KEY (`bus_rev_id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `bus_applicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `business_carousel`
--
ALTER TABLE `business_carousel`
  MODIFY `bus_carou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `business_links`
--
ALTER TABLE `business_links`
  MODIFY `bus_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `business_list`
--
ALTER TABLE `business_list`
  MODIFY `bus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6759;

--
-- AUTO_INCREMENT for table `business_location`
--
ALTER TABLE `business_location`
  MODIFY `bus_loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6860;

--
-- AUTO_INCREMENT for table `business_post`
--
ALTER TABLE `business_post`
  MODIFY `bus_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_requirement`
--
ALTER TABLE `business_requirement`
  MODIFY `bus_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6860;

--
-- AUTO_INCREMENT for table `business_reviews`
--
ALTER TABLE `business_reviews`
  MODIFY `bus_rev_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner_list`
--
ALTER TABLE `owner_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_event`
--
ALTER TABLE `post_event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory_list`
--
ALTER TABLE `subcategory_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
