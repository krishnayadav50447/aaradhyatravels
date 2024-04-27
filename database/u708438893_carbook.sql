-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2024 at 04:39 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u708438893_carbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_type` varchar(200) NOT NULL,
  `profile_img` varchar(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_pin` varchar(10) NOT NULL,
  `user_land_mark` varchar(200) NOT NULL,
  `user_pan` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_gst` varchar(50) NOT NULL,
  `user_account_name` varchar(100) NOT NULL,
  `user_account_no` varchar(30) NOT NULL,
  `user_bank_name` varchar(100) NOT NULL,
  `user_ifsc_code` varchar(50) NOT NULL,
  `user_bank_branch` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `user_phone`, `user_id`, `user_email`, `user_password`, `user_role`, `company_name`, `company_type`, `profile_img`, `user_name`, `user_gender`, `user_city`, `user_pin`, `user_land_mark`, `user_pan`, `user_address`, `user_gst`, `user_account_name`, `user_account_no`, `user_bank_name`, `user_ifsc_code`, `user_bank_branch`, `status`, `create_by`, `create_date`, `edit_by`, `edit_date`) VALUES
(1, '001', 'superadmin', 'superadmin@mail.com', '889a3a791b3875cfae413574b53da4bb8a90d53e', '', 'Your Company', 'Your Company Type', 'https://bornrealist.com/wp-content/uploads/2017/07/man-office-desk-computer.jpg', 'SUPERADMIN', 'Male', 'City', '001', 'Land Mark', '', 'Address', '', '', '', '', '', '', 'approved', 0, '2023-03-16 08:48:26', 1, '2020-12-09 12:54:35'),
(2, '1234567890', 'admin', 'admin@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'Your Company', 'Your Company Type', '', 'Admin', 'Male', 'City', '789456123', 'Land Mark', '', 'Address', '', 'Admin', '0', 'Sample Bank Name', '001122', 'Sample Bank Brach', 'approved', 0, '2023-08-25 10:10:33', 2, '2023-08-25 15:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `webina_banner`
--

CREATE TABLE `webina_banner` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `vdo` varchar(255) NOT NULL,
  `youtube_link` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `button_1` varchar(100) NOT NULL,
  `button_2` varchar(100) NOT NULL,
  `button_1_link` varchar(255) NOT NULL,
  `button_2_link` varchar(255) NOT NULL,
  `position` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webina_contact`
--

CREATE TABLE `webina_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_contact`
--

INSERT INTO `webina_contact` (`id`, `name`, `company_name`, `email`, `phone`, `address`, `designation`, `subject`, `message`, `ip_address`, `create_date`) VALUES
(6, 'Mofijul', '', 'mofijul007@yahoo.com', '9123989009', '', '', '', 'Hello i am mofijul', '::1', '2023-03-16 08:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `webina_count_visitor`
--

CREATE TABLE `webina_count_visitor` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `view_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_count_visitor`
--

INSERT INTO `webina_count_visitor` (`id`, `ref_id`, `ip_address`, `view_date`) VALUES
(1, 'homepage_visitor', '::1', '2023-03-17'),
(2, 'homepage_visitor', '103.220.209.138', '2023-03-17'),
(3, 'homepage_visitor', '2402:3a80:1981:c1be:edad:4f7a:a8a:ac0a', '2023-03-17'),
(4, 'homepage_visitor', '2401:4900:1c09:fe59:3938:3497:ba16:e451', '2023-03-17'),
(5, 'homepage_visitor', '2401:4900:1c09:7738:5816:ba53:b73d:c7d5', '2023-03-17'),
(6, 'homepage_visitor', '2409:4050:2d17:5f31:db9:b985:3060:9f28', '2023-03-19'),
(7, 'homepage_visitor', '2409:4050:2d17:5f31:7523:694d:a6ab:6220', '2023-03-19'),
(8, 'homepage_visitor', '2401:4900:51da:4a30:5039:19bf:83c2:e899', '2023-03-19'),
(9, 'homepage_visitor', '42.110.147.3', '2023-03-19'),
(10, 'homepage_visitor', '2401:4900:1ca2:24e1:4859:6735:947a:d48a', '2023-03-20'),
(11, 'homepage_visitor', '2401:4900:1c09:fe59:b54f:51ef:d659:b50e', '2023-03-20'),
(12, 'homepage_visitor', '157.37.171.64', '2023-03-20'),
(13, 'homepage_visitor', '2401:4900:1ca2:5474:753f:e48f:7a62:4dac', '2023-03-21'),
(14, 'homepage_visitor', '103.220.209.178', '2023-03-21'),
(15, 'homepage_visitor', '2401:4900:1c09:7f9:e915:318a:61f4:e94b', '2023-03-22'),
(16, 'homepage_visitor', '2401:4900:1ca3:d1a6:f941:b2ed:1f53:c659', '2023-03-22'),
(17, 'homepage_visitor', '2401:4900:1ca3:f0cf:1045:a30c:d1c7:1490', '2023-03-22'),
(18, 'homepage_visitor', '2409:4050:2e96:ad42:81aa:260d:7f6e:9cf0', '2023-03-23'),
(19, 'homepage_visitor', '49.207.232.254', '2023-03-23'),
(20, 'homepage_visitor', '2402:3a80:1cd0:e566:b0d6:befa:50d0:9b09', '2023-03-23'),
(21, 'homepage_visitor', '2409:4050:2e96:ad42::40c8:8309', '2023-03-24'),
(22, 'homepage_visitor', '2401:4900:55ac:812c:3d11:9e2c:ceab:c763', '2023-03-24'),
(23, 'homepage_visitor', '2409:4060:2d9a:7d19:70a1:6c8d:da8b:9894', '2023-03-24'),
(24, 'homepage_visitor', '2401:4900:55ac:812c:c05f:d3c0:bfc3:a183', '2023-03-24'),
(25, 'homepage_visitor', '2401:4900:1ca2:9587:dcc:625f:a6e:efda', '2023-03-24'),
(26, 'homepage_visitor', '2401:4900:1ca2:9587:4d75:432d:3528:585f', '2023-03-25'),
(27, 'homepage_visitor', '47.31.192.175', '2023-03-25'),
(28, 'homepage_visitor', '2401:4900:1ca2:39e0:703c:3964:4f9d:6312', '2023-03-25'),
(29, 'homepage_visitor', '2402:3a80:1cd0:d3f2:b5f6:5b2a:6763:6f67', '2023-03-25'),
(30, 'homepage_visitor', '223.177.36.170', '2023-03-25'),
(31, 'homepage_visitor', '2409:40c4:1016:aebe:1e7:b81f:a5d:da67', '2023-03-25'),
(32, 'homepage_visitor', '2401:4900:1ca2:cade:98f4:ab3c:cd95:54b3', '2023-03-26'),
(33, 'homepage_visitor', '2409:4050:2e96:ad42:a134:1a11:3c44:5133', '2023-03-26'),
(34, 'homepage_visitor', '2405:201:5c00:bc05:c4a0:9402:fd0b:200a', '2023-03-26'),
(35, 'homepage_visitor', '2401:4900:1bc9:acd1:2877:88ae:c4f0:32f9', '2023-03-26'),
(36, 'homepage_visitor', '2401:4900:1c09:4f68:b82a:554f:f389:a043', '2023-03-27'),
(37, 'homepage_visitor', '2405:204:130c:3466::10fb:b0a0', '2023-03-27'),
(38, 'homepage_visitor', '2401:4900:1ca2:e4d9:5c89:37d6:dd83:56dd', '2023-03-27'),
(39, 'homepage_visitor', '2405:201:400f:10dc:2cf1:f16c:9e58:db0b', '2023-03-27'),
(40, 'homepage_visitor', '2405:204:130c:3466:c5dd:32a:a60a:ff52', '2023-03-27'),
(41, 'homepage_visitor', '35.87.54.126', '2023-03-27'),
(42, 'homepage_visitor', '52.32.29.204', '2023-03-27'),
(43, 'homepage_visitor', '34.211.36.3', '2023-03-27'),
(44, 'homepage_visitor', '66.249.66.6', '2023-03-27'),
(45, 'homepage_visitor', '66.249.66.87', '2023-03-27'),
(46, 'homepage_visitor', '66.249.66.4', '2023-03-27'),
(47, 'homepage_visitor', '2401:4900:1c08:3d0b:1c53:9348:b80e:d68a', '2023-03-27'),
(48, 'homepage_visitor', '2401:4900:1c08:3d0b:1127:c193:7fac:395c', '2023-03-27'),
(49, 'homepage_visitor', '2401:4900:1c08:3d0b:9d46:6df5:c2c3:fb5', '2023-03-28'),
(50, 'homepage_visitor', '179.1.82.234', '2023-03-28'),
(51, 'homepage_visitor', '96.9.161.226', '2023-03-28'),
(52, 'homepage_visitor', '2402:3a80:1987:2bb6:a96e:bbc2:a7b7:dcc5', '2023-03-28'),
(53, 'homepage_visitor', '2409:40c4:101f:3de2:f1bd:8121:2fc5:5eba', '2023-03-28'),
(54, 'homepage_visitor', '2401:4900:1ca2:e4d9:7d30:9fd2:a2ef:52c3', '2023-03-28'),
(55, 'homepage_visitor', '2a03:2880:30ff:75::face:b00c', '2023-03-28'),
(56, 'homepage_visitor', '192.73.243.37', '2023-03-28'),
(57, 'homepage_visitor', '2409:40c4:1a:b08c:d07b:af77:3598:68eb', '2023-03-28'),
(58, 'homepage_visitor', '27.62.199.171', '2023-03-28'),
(59, 'homepage_visitor', '2a02:26f7:d6c0:6869:0:3d94:7b38:a1c8', '2023-03-28'),
(60, 'homepage_visitor', '2409:40c4:a:794b:9891:5e69:ef2:cf20', '2023-03-28'),
(61, 'homepage_visitor', '2401:4900:36aa:78d0:6167:4617:9824:f017', '2023-03-28'),
(62, 'homepage_visitor', '165.1.239.9', '2023-03-28'),
(63, 'homepage_visitor', '205.169.39.205', '2023-03-28'),
(64, 'homepage_visitor', '65.154.226.168', '2023-03-28'),
(65, 'homepage_visitor', '205.169.39.106', '2023-03-28'),
(66, 'homepage_visitor', '2401:4900:1c08:426c:4492:5003:cdd:bd5e', '2023-03-29'),
(67, 'homepage_visitor', '66.249.64.235', '2023-03-29'),
(68, 'homepage_visitor', '209.141.34.187', '2023-03-29'),
(69, 'homepage_visitor', '2409:40e4:68:46e7:f4ae:3cff:fe2b:9888', '2023-03-29'),
(70, 'homepage_visitor', '103.139.131.186', '2023-03-29'),
(71, 'homepage_visitor', '2401:4900:1ca2:e4d9:31df:3b29:df22:cdb5', '2023-03-29'),
(72, 'homepage_visitor', '223.230.120.235', '2023-03-29'),
(73, 'homepage_visitor', '106.76.213.249', '2023-03-29'),
(74, 'homepage_visitor', '66.249.70.131', '2023-03-29'),
(75, 'homepage_visitor', '2409:4050:e3b:cc48::924a:9d08', '2023-03-29'),
(76, 'homepage_visitor', '122.161.84.164', '2023-03-30'),
(77, 'homepage_visitor', '183.82.97.220', '2023-03-30'),
(78, 'homepage_visitor', '182.74.196.234', '2023-03-30'),
(79, 'homepage_visitor', '66.249.64.231', '2023-03-30'),
(80, 'homepage_visitor', '66.249.64.233', '2023-03-30'),
(81, 'homepage_visitor', '2406:7400:51:c42f:a115:dd28:5417:c2f2', '2023-03-30'),
(82, 'homepage_visitor', '163.116.195.114', '2023-03-30'),
(83, 'homepage_visitor', '163.116.195.113', '2023-03-30'),
(84, 'homepage_visitor', '2406:7400:51:c42f:5cab:c5b5:6083:ab37', '2023-03-30'),
(85, 'homepage_visitor', '14.98.24.134', '2023-03-30'),
(86, 'homepage_visitor', '2401:4900:1ca3:be52:9416:8c7d:9310:b4de', '2023-03-30'),
(87, 'homepage_visitor', '2401:4900:1ca2:cc8b:60d7:6715:177a:c474', '2023-03-31'),
(88, 'homepage_visitor', '103.136.82.4', '2023-03-31'),
(89, 'homepage_visitor', '205.169.39.70', '2023-05-29'),
(90, 'homepage_visitor', '205.169.39.252', '2023-05-29'),
(91, 'homepage_visitor', '2402:3a80:a57:b080:2874:517b:db29:15c', '2023-05-29'),
(92, 'homepage_visitor', '2402:3a80:a57:b080:0:48:f7d7:e001', '2023-05-29'),
(93, 'homepage_visitor', '49.44.76.138', '2023-05-29'),
(94, 'homepage_visitor', '49.204.164.211', '2023-05-30'),
(95, 'homepage_visitor', '103.220.209.128', '2023-05-30'),
(96, 'homepage_visitor', '2402:3a80:1987:fc25:fc88:d7f0:5dc3:99ad', '2023-05-30'),
(97, 'homepage_visitor', '103.207.146.57', '2023-05-30'),
(98, 'homepage_visitor', '103.220.209.79', '2023-05-30'),
(99, 'homepage_visitor', '49.204.164.248', '2023-05-31'),
(100, 'homepage_visitor', '2402:3a80:1987:7e0f:478:5634:1232:5476', '2023-05-31'),
(101, 'homepage_visitor', '163.116.195.115', '2023-05-31'),
(102, 'homepage_visitor', '198.7.237.197', '2023-05-31'),
(103, 'homepage_visitor', '163.116.195.121', '2023-05-31'),
(104, 'homepage_visitor', '2409:40d4:1010:9c96:5580:1422:b8eb:51ba', '2023-05-31'),
(105, 'homepage_visitor', '125.16.141.158', '2023-05-31'),
(106, 'homepage_visitor', '14.97.88.162', '2023-05-31'),
(107, 'homepage_visitor', '205.169.39.164', '2023-05-31'),
(108, 'homepage_visitor', '2402:3a80:1981:ef56:5fd:70cc:4b6f:45f6', '2023-06-01'),
(109, 'homepage_visitor', '42.110.169.42', '2023-06-01'),
(110, 'homepage_visitor', '2402:3a80:1981:ef56:178:5634:1232:5476', '2023-06-01'),
(111, 'homepage_visitor', '2402:3a80:1981:ef56:bc9f:3f1c:919c:6719', '2023-06-01'),
(112, 'homepage_visitor', '66.249.79.231', '2023-06-01'),
(113, 'homepage_visitor', '163.116.195.118', '2023-06-01'),
(114, 'homepage_visitor', '66.249.79.233', '2023-06-01'),
(115, 'homepage_visitor', '205.169.39.174', '2023-06-02'),
(116, 'homepage_visitor', '2402:3a80:1cd3:d2a4:68f3:4b61:16da:b1', '2023-06-02'),
(117, 'homepage_visitor', '169.150.218.66', '2023-06-02'),
(118, 'homepage_visitor', '2409:4060:84:2695:189:54c7:eb5b:efaf', '2023-06-02'),
(119, 'homepage_visitor', '2402:3a80:1cd3:d2a4:8473:e6d8:a0c5:b382', '2023-06-03'),
(120, 'homepage_visitor', '65.154.226.169', '2023-06-03'),
(121, 'homepage_visitor', '2600:1900:2000:9::a', '2023-06-03'),
(122, 'homepage_visitor', '2402:3a80:4002:9198:fda8:6243:e676:ec44', '2023-06-04'),
(123, 'homepage_visitor', '2402:e280:2322:15:b0a3:ad7e:7d78:4d2d', '2023-06-04'),
(124, 'homepage_visitor', '2409:40d4:0:da94:9527:1ad7:eff2:1c99', '2023-06-05'),
(125, 'homepage_visitor', '2402:3a80:1983:23e3:9d6c:b0e8:e9d9:9c6b', '2023-06-05'),
(126, 'homepage_visitor', '103.220.209.162', '2023-06-05'),
(127, 'homepage_visitor', '103.54.15.82', '2023-06-06'),
(128, 'homepage_visitor', '2402:3a80:1cd1:d75a:b5da:c53f:4f85:4457', '2023-06-06'),
(129, 'homepage_visitor', '2401:4900:458e:6689:c956:9d24:dadb:c2d8', '2023-06-08'),
(130, 'homepage_visitor', '49.204.164.81', '2023-06-09'),
(131, 'homepage_visitor', '2600:1900:2000:ea::7', '2023-06-10'),
(132, 'homepage_visitor', '2401:4900:798c:e3ef:7d15:4252:cf3:bcad', '2023-06-10'),
(133, 'homepage_visitor', '2409:4060:2e19:81ad:b027:2617:4f4e:e187', '2023-06-13'),
(134, 'homepage_visitor', '205.169.39.234', '2023-06-14'),
(135, 'homepage_visitor', '65.154.226.171', '2023-06-15'),
(136, 'homepage_visitor', '66.249.79.227', '2023-06-16'),
(137, 'homepage_visitor', '135.181.217.158', '2023-06-16'),
(138, 'homepage_visitor', '2600:1900:2000:ea::a', '2023-06-17'),
(139, 'homepage_visitor', '205.169.39.246', '2023-06-18'),
(140, 'homepage_visitor', '49.36.232.231', '2023-06-18'),
(141, 'homepage_visitor', '205.169.39.244', '2023-06-19'),
(142, 'homepage_visitor', '2409:40d4:1018:d0b6:65d7:4fcf:9553:39a9', '2023-06-20'),
(143, 'homepage_visitor', '205.169.39.178', '2023-06-20'),
(144, 'homepage_visitor', '2409:40d4:1008:543c:c441:ab0d:9f5c:29b7', '2023-06-21'),
(145, 'homepage_visitor', '163.116.195.96', '2023-06-21'),
(146, 'homepage_visitor', '162.211.40.132', '2023-06-21'),
(147, 'homepage_visitor', '205.169.39.118', '2023-06-24'),
(148, 'homepage_visitor', '205.169.39.93', '2023-06-26'),
(149, 'homepage_visitor', '121.46.115.45', '2023-06-27'),
(150, 'homepage_visitor', '205.169.39.250', '2023-06-28'),
(151, 'homepage_visitor', '66.249.73.101', '2023-06-29'),
(152, 'homepage_visitor', '209.170.91.201', '2023-07-01'),
(153, 'homepage_visitor', '103.220.209.152', '2023-07-02'),
(154, 'homepage_visitor', '66.249.64.195', '2023-07-03'),
(155, 'homepage_visitor', '66.249.64.196', '2023-07-03'),
(156, 'homepage_visitor', '2409:40d4:1f:6800:e043:1387:9d4:8f0a', '2023-07-04'),
(157, 'homepage_visitor', '2409:4050:2dbe:7ee4:c040:e18a:6fe9:3b24', '2023-07-04'),
(158, 'homepage_visitor', '2409:4042:4e90:bc09::af8a:f502', '2023-07-04'),
(159, 'homepage_visitor', '205.169.39.131', '2023-07-05'),
(160, 'homepage_visitor', '2409:40d4:1f:6800:1950:bd8f:9a2e:239f', '2023-07-06'),
(161, 'homepage_visitor', '2401:4900:6460:7cb9:c84d:81c0:ce7d:a9b9', '2023-07-06'),
(162, 'homepage_visitor', '2409:4042:4d45:8d17:4ff5:ce1c:ed6a:79fe', '2023-07-06'),
(163, 'homepage_visitor', '2405:204:10ac:e98f::20dc:68b0', '2023-07-06'),
(164, 'homepage_visitor', '149.56.150.248', '2023-07-07'),
(165, 'homepage_visitor', '54.190.187.113', '2023-07-07'),
(166, 'homepage_visitor', '35.91.66.62', '2023-07-07'),
(167, 'homepage_visitor', '122.161.77.231', '2023-07-07'),
(168, 'homepage_visitor', '34.210.80.70', '2023-07-07'),
(169, 'homepage_visitor', '2401:4900:1c64:8dca:246b:e2b6:e73e:df05', '2023-07-07'),
(170, 'homepage_visitor', '103.56.230.70', '2023-07-10'),
(171, 'homepage_visitor', '106.213.81.155', '2023-07-10'),
(172, 'homepage_visitor', '160.202.37.134', '2023-07-12'),
(173, 'homepage_visitor', '42.105.237.53', '2023-07-13'),
(174, 'homepage_visitor', '49.204.165.97', '2023-07-13'),
(175, 'homepage_visitor', '163.116.196.33', '2023-07-13'),
(176, 'homepage_visitor', '163.116.195.119', '2023-07-14'),
(177, 'homepage_visitor', '2401:4900:1c63:887c:953c:5c2f:b418:edaa', '2023-07-14'),
(178, 'homepage_visitor', '205.169.39.255', '2023-07-14'),
(179, 'homepage_visitor', '66.249.64.198', '2023-07-14'),
(180, 'homepage_visitor', '66.249.64.197', '2023-07-17'),
(181, 'homepage_visitor', '103.220.209.85', '2023-07-17'),
(182, 'homepage_visitor', '106.213.84.121', '2023-07-17'),
(183, 'homepage_visitor', '2409:4081:2e87:eb2b::e58a:600c', '2023-07-17'),
(184, 'homepage_visitor', '103.169.157.26', '2023-07-17'),
(185, 'homepage_visitor', '103.185.161.131', '2023-07-17'),
(186, 'homepage_visitor', '2409:4081:2d9d:cf1e::e5ca:9902', '2023-07-18'),
(187, 'homepage_visitor', '2409:40d4:1002:90e4:57b:81df:e7c1:587', '2023-07-18'),
(188, 'homepage_visitor', '103.220.209.33', '2023-07-18'),
(189, 'homepage_visitor', '2402:3a80:1cd2:87f4:19d6:d46e:f659:c7f0', '2023-07-18'),
(190, 'homepage_visitor', '2401:4900:1c8e:923a:946e:97d4:9c3b:e87b', '2023-07-18'),
(191, 'homepage_visitor', '2409:4081:2d88:7871::e54a:f509', '2023-07-19'),
(192, 'homepage_visitor', '49.15.232.157', '2023-07-19'),
(193, 'homepage_visitor', '2402:8100:31a4:1b26:2420:bcef:f510:9454', '2023-07-19'),
(194, 'homepage_visitor', '2409:4060:2d48:75f8:6915:984a:7af2:4a3f', '2023-07-19'),
(195, 'homepage_visitor', '103.207.144.240', '2023-07-20'),
(196, 'homepage_visitor', '49.204.89.238', '2023-07-20'),
(197, 'homepage_visitor', '2409:4060:2096:15bc:12d:b288:644f:2406', '2023-07-20'),
(198, 'homepage_visitor', '2409:4060:2096:15bc:947a:3fdd:5c75:73ed', '2023-07-20'),
(199, 'homepage_visitor', '103.97.240.100', '2023-07-20'),
(200, 'homepage_visitor', '183.87.234.85', '2023-07-20'),
(201, 'homepage_visitor', '205.169.39.245', '2023-07-21'),
(202, 'homepage_visitor', '2401:4900:1c9b:9f9:50d7:7afc:ce9e:27bb', '2023-07-21'),
(203, 'homepage_visitor', '2401:4900:1c7b:e5b9:789a:5799:7490:369d', '2023-07-21'),
(204, 'homepage_visitor', '2409:40d4:1002:90e4:1c6b:492a:e65e:1ee1', '2023-07-21'),
(205, 'homepage_visitor', '2401:4900:1c8e:d223:687f:8a8a:1861:cf7c', '2023-07-22'),
(206, 'homepage_visitor', '103.220.209.168', '2023-07-22'),
(207, 'homepage_visitor', '205.169.39.242', '2023-07-24'),
(208, 'homepage_visitor', '27.58.20.169', '2023-07-24'),
(209, 'homepage_visitor', '121.46.113.252', '2023-07-24'),
(210, 'homepage_visitor', '205.169.39.254', '2023-07-25'),
(211, 'homepage_visitor', '2402:8100:24ea:a206:1481:2a0a:4178:e128', '2023-07-25'),
(212, 'homepage_visitor', '180.151.13.236', '2023-07-26'),
(213, 'homepage_visitor', '2402:3a80:1985:9eaa:9dd5:8551:4cc:2799', '2023-07-26'),
(214, 'homepage_visitor', '2409:40d4:1002:90e4:3c78:9a71:e689:5046', '2023-07-26'),
(215, 'homepage_visitor', '103.220.209.57', '2023-07-26'),
(216, 'homepage_visitor', '2401:4900:1c7b:c79a:1d6e:2d1e:c529:7807', '2023-07-26'),
(217, 'homepage_visitor', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', '2023-07-26'),
(218, 'homepage_visitor', '2a03:2880:21ff:14::face:b00c', '2023-07-27'),
(219, 'homepage_visitor', '2402:8100:24e8:fbaa:d1af:378a:3df8:75a', '2023-07-27'),
(220, 'homepage_visitor', '103.220.209.129', '2023-07-27'),
(221, 'homepage_visitor', '2402:4000:2180:a2d8:c001:48e8:5fb2:d24f', '2023-07-27'),
(222, 'homepage_visitor', '2409:40c0:100a:374e:8000::', '2023-07-28'),
(223, 'homepage_visitor', '2402:3a80:1985:8d77:74b8:794a:393c:5c10', '2023-07-28'),
(224, 'homepage_visitor', '121.46.114.35', '2023-07-28'),
(225, 'homepage_visitor', '66.249.69.35', '2023-07-29'),
(226, 'homepage_visitor', '49.36.121.162', '2023-07-29'),
(227, 'homepage_visitor', '2a03:2880:21ff:12::face:b00c', '2023-07-29'),
(228, 'homepage_visitor', '175.157.40.54', '2023-07-29'),
(229, 'homepage_visitor', '2402:3a80:1983:9b2f:5843:f1b6:aaaf:52a5', '2023-07-29'),
(230, 'homepage_visitor', '2409:40d4:1002:90e4:a84f:9249:f5b2:aa8a', '2023-07-31'),
(231, 'homepage_visitor', '2401:4900:1c7a:1a25:1d6e:2d1e:c529:7807', '2023-07-31'),
(232, 'homepage_visitor', '223.229.170.115', '2023-07-31'),
(233, 'homepage_visitor', '121.46.114.248', '2023-08-01'),
(234, 'homepage_visitor', '66.249.70.110', '2023-08-01'),
(235, 'homepage_visitor', '42.110.137.21', '2023-08-02'),
(236, 'homepage_visitor', '2401:fa00:1a:2:4d09:d3a4:94c7:ccd2', '2023-08-03'),
(237, 'homepage_visitor', '205.169.39.155', '2023-08-03'),
(238, 'homepage_visitor', '2409:40d4:100c:55e7:d3a:2992:eb03:5c12', '2023-08-03'),
(239, 'homepage_visitor', '66.249.79.228', '2023-08-06'),
(240, 'homepage_visitor', '149.56.150.187', '2023-08-07'),
(241, 'homepage_visitor', '142.147.111.22', '2023-08-08'),
(242, 'homepage_visitor', '205.169.39.81', '2023-08-08'),
(243, 'homepage_visitor', '2001:8f8:1539:c0d:68a8:f0ff:fe15:2959', '2023-08-08'),
(244, 'homepage_visitor', '66.249.79.206', '2023-08-08'),
(245, 'homepage_visitor', '135.148.32.67', '2023-08-08'),
(246, 'homepage_visitor', '2607:fb91:807:c0f1:defe:cf9e:3f2d:5f3', '2023-08-08'),
(247, 'homepage_visitor', '2401:4900:1c1a:614:c66:8d6b:934:f9a8', '2023-08-08'),
(248, 'homepage_visitor', '2401:4900:1c1a:614:14ea:1202:f73a:4bd2', '2023-08-08'),
(249, 'homepage_visitor', '205.169.39.180', '2023-08-09'),
(250, 'homepage_visitor', '2402:3a80:1983:71d8:359b:1c55:f3b1:e28f', '2023-08-09'),
(251, 'homepage_visitor', '106.201.109.56', '2023-08-09'),
(252, 'homepage_visitor', '66.249.79.229', '2023-08-09'),
(253, 'homepage_visitor', '2402:3a80:1983:a81e:2946:ff17:db9f:441b', '2023-08-10'),
(254, 'homepage_visitor', '2409:40d4:1065:84e8:8000::', '2023-08-10'),
(255, 'homepage_visitor', '2409:40d4:1065:f78d:2077:5832:e456:4bc0', '2023-08-10'),
(256, 'homepage_visitor', '2405:205:1501:1a52:8154:f65a:b02b:ce5d', '2023-08-10'),
(257, 'homepage_visitor', '2405:205:1487:8dd1::1fa0:d0a4', '2023-08-10'),
(258, 'homepage_visitor', '2409:40d4:100e:2354:8000::', '2023-08-10'),
(259, 'homepage_visitor', '2409:40d4:106d:7a5d:e408:c466:6e1b:b4a3', '2023-08-10'),
(260, 'homepage_visitor', '2402:3a80:1983:a81e:278:5634:1232:5476', '2023-08-10'),
(261, 'homepage_visitor', '103.156.238.6', '2023-08-10'),
(262, 'homepage_visitor', '2402:3a80:1983:3b79:278:5634:1232:5476', '2023-08-10'),
(263, 'homepage_visitor', '2402:3a80:1983:3b79:f81e:c0af:1b28:cc98', '2023-08-10'),
(264, 'homepage_visitor', '2401:4900:1c1b:779f:c66:8d6b:934:f9a8', '2023-08-11'),
(265, 'homepage_visitor', '2409:4060:209d:6478:80d8:ccbe:77ce:a248', '2023-08-11'),
(266, 'homepage_visitor', '2402:3a80:1983:a13e:278:5634:1232:5476', '2023-08-11'),
(267, 'homepage_visitor', '169.150.218.67', '2023-08-11'),
(268, 'homepage_visitor', '2402:3a80:1983:a13e:a0da:e7ba:363e:41cd', '2023-08-11'),
(269, 'homepage_visitor', '2401:4900:1c1b:779f:9872:8ca5:3459:a084', '2023-08-11'),
(270, 'homepage_visitor', '2402:3a80:1983:a13e:7491:22cf:c6d6:7837', '2023-08-11'),
(271, 'homepage_visitor', '42.110.168.112', '2023-08-11'),
(272, 'homepage_visitor', '66.249.79.238', '2023-08-11'),
(273, 'homepage_visitor', '66.249.79.224', '2023-08-12'),
(274, 'homepage_visitor', '2402:3a80:1983:427e:719f:dde7:2639:4b1f', '2023-08-12'),
(275, 'homepage_visitor', '2401:4900:1c7b:ae5f:c66:8d6b:934:f9a8', '2023-08-12'),
(276, 'homepage_visitor', '2401:4900:1c7b:ae5f:d512:ec25:9185:162f', '2023-08-12'),
(277, 'homepage_visitor', '2409:40d4:100b:3f97:81f:d2e2:d5db:7f3d', '2023-08-12'),
(278, 'homepage_visitor', '38.152.0.23', '2023-08-13'),
(279, 'homepage_visitor', '38.152.7.6', '2023-08-13'),
(280, 'homepage_visitor', '2409:4052:718:6ef3:5bc6:b705:b661:b7b9', '2023-08-13'),
(281, 'homepage_visitor', '205.169.39.128', '2023-08-13'),
(282, 'homepage_visitor', '2409:4060:2d01:f4eb:f8c:d945:ce:c616', '2023-08-13'),
(283, 'homepage_visitor', '45.117.2.59', '2023-08-13'),
(284, 'homepage_visitor', '103.220.209.137', '2023-08-14'),
(285, 'homepage_visitor', '38.154.1.28', '2023-08-14'),
(286, 'homepage_visitor', '171.255.200.73', '2023-08-14'),
(287, 'homepage_visitor', '205.169.39.111', '2023-08-14'),
(288, 'homepage_visitor', '38.170.6.24', '2023-08-15'),
(289, 'homepage_visitor', '20.169.168.224', '2023-08-15'),
(290, 'homepage_visitor', '205.169.39.110', '2023-08-16'),
(291, 'homepage_visitor', '65.154.226.166', '2023-08-16'),
(292, 'homepage_visitor', '103.97.240.145', '2023-08-16'),
(293, 'homepage_visitor', '82.131.95.172', '2023-08-17'),
(294, 'homepage_visitor', '31.24.56.133', '2023-08-17'),
(295, 'homepage_visitor', '2401:4900:58a6:ee01:5922:8f24:47b4:d864', '2023-08-18'),
(296, 'homepage_visitor', '50.112.244.11', '2023-08-18'),
(297, 'homepage_visitor', '2405:201:900a:b068:c573:2f65:2e93:6e0a', '2023-08-18'),
(298, 'homepage_visitor', '66.249.79.192', '2023-08-19'),
(299, 'homepage_visitor', '103.220.209.86', '2023-08-19'),
(300, 'homepage_visitor', '103.207.144.156', '2023-08-21'),
(301, 'homepage_visitor', '2402:3a80:1985:1441:54f9:843c:cdba:c66e', '2023-08-21'),
(302, 'homepage_visitor', '172.176.75.89', '2023-08-22'),
(303, 'homepage_visitor', '2409:40d4:1013:96d5:6882:1d1b:9a6d:cbe3', '2023-08-22'),
(304, 'homepage_visitor', '2409:4060:413:f6d4:a4f8:2c43:ac36:bdc4', '2023-08-22'),
(305, 'homepage_visitor', '2409:40d4:1013:96d5:597:f571:1944:b24c', '2023-08-22'),
(306, 'homepage_visitor', '2402:3a80:4026:86f8:89e9:d089:f6e1:40a9', '2023-08-22'),
(307, 'homepage_visitor', '2409:4052:2002:1589::248e:f0a4', '2023-08-22'),
(308, 'homepage_visitor', '2409:40d4:1013:96d5:6153:367f:da74:41d8', '2023-08-22'),
(309, 'homepage_visitor', '103.220.209.171', '2023-08-22'),
(310, 'homepage_visitor', '122.162.191.100', '2023-08-22'),
(311, 'homepage_visitor', '2409:4060:31a:e4a3:330:67a7:20a2:6bf3', '2023-08-22'),
(312, 'homepage_visitor', '118.101.156.113', '2023-08-23'),
(313, 'homepage_visitor', '2401:4900:1c7b:d751:88d8:108c:82ff:2142', '2023-08-23'),
(314, 'homepage_visitor', '2409:4052:210f:4426::10a0:e8b1', '2023-08-24'),
(315, 'homepage_visitor', '27.58.66.39', '2023-08-24'),
(316, 'homepage_visitor', '2405:201:5c09:e157:8c4f:c665:29cf:40b7', '2023-08-24'),
(317, 'homepage_visitor', '2409:40d4:100d:ee8a:8000::', '2023-08-25'),
(318, 'homepage_visitor', '2409:4052:4e1e:5141::87c8:7802', '2023-08-25'),
(319, 'homepage_visitor', '2409:4052:4d15:523d::24c8:2304', '2023-08-25'),
(320, 'homepage_visitor', '2401:4900:2fe4:1298:0:2c:d279:7101', '2023-08-25'),
(321, 'homepage_visitor', '2409:4052:4e8c:8d8:74e3:fd94:e794:e1a5', '2023-08-25'),
(322, 'homepage_visitor', '2401:4900:5ddc:11da:8c70:f301:6da9:2444', '2023-08-25'),
(323, 'homepage_visitor', '2402:3a80:1a3d:fd22:faba:2c3e:cca3:281f', '2023-08-25'),
(324, 'homepage_visitor', '2409:4052:200e:7d23:88c7:955e:9510:7bf5', '2023-08-25'),
(325, 'homepage_visitor', '2401:4900:463f:d550:b5ab:ac1d:91a0:4dc7', '2023-08-25'),
(326, 'homepage_visitor', '2409:4052:802:cf7f:6123:e787:c7b3:b3c4', '2023-08-25'),
(327, 'homepage_visitor', '2409:40d4:100b:7641:8000::', '2023-08-25'),
(328, 'homepage_visitor', '2409:4052:d9c:b291::e88:e807', '2023-08-25'),
(329, 'homepage_visitor', '2409:4052:e8f:b6d:8c72:68db:6b63:5633', '2023-08-25'),
(330, 'homepage_visitor', '2401:4900:2fb3:cfe:0:5e:de9a:6401', '2023-08-25'),
(331, 'homepage_visitor', '2401:4900:7aab:a05b:e826:15ff:fe2d:4afa', '2023-08-25'),
(332, 'homepage_visitor', '2409:40d4:1016:3bba:8000::', '2023-08-25'),
(333, 'homepage_visitor', '2401:4900:6192:f602:fbe4:3898:9f35:e0df', '2023-08-25'),
(334, 'homepage_visitor', '2409:4052:d0e:1860:ee07:185e:15af:45a9', '2023-08-25'),
(335, 'homepage_visitor', '2405:201:5c10:8800:ecec:e59f:9e31:2a22', '2023-08-25'),
(336, 'homepage_visitor', '157.38.138.85', '2023-08-25'),
(337, 'homepage_visitor', '2409:4052:d91:66a6::184b:bf0b', '2023-08-25'),
(338, 'homepage_visitor', '2409:4052:e91:6261::d08b:f03', '2023-08-25'),
(339, 'homepage_visitor', '2409:4052:2ea4:7cd3::df89:7611', '2023-08-25'),
(340, 'homepage_visitor', '2409:4085:1203:18df:3f76:b30c:59cd:5ac', '2023-08-25'),
(341, 'homepage_visitor', '2409:4052:4d18:c9a5:a4e9:7352:25bb:e3ec', '2023-08-25'),
(342, 'homepage_visitor', '61.0.77.233', '2023-08-25'),
(343, 'homepage_visitor', '2409:4080:8285:7bc7:34d4:5122:f020:2fea', '2023-08-25'),
(344, 'homepage_visitor', '2409:40d4:1013:96d5:3588:18fa:11f4:972e', '2023-08-25'),
(345, 'homepage_visitor', '2409:4052:2e16:94d4::320a:1e0c', '2023-08-25'),
(346, 'homepage_visitor', '2409:40d4:1070:5964:d176:5695:c1f0:b7c7', '2023-08-25'),
(347, 'homepage_visitor', '2409:40d4:106f:82b4:28fc:f25a:7a87:18d', '2023-08-25'),
(348, 'homepage_visitor', '2401:4900:1c7b:29ae:88d8:108c:82ff:2142', '2023-08-25'),
(349, 'homepage_visitor', '66.249.79.193', '2023-08-25'),
(350, 'homepage_visitor', '2405:204:3209:9610::244d:c8ac', '2023-08-25'),
(351, 'homepage_visitor', '2405:201:5c10:8b03:c4e5:b765:d18c:93f1', '2023-08-25'),
(352, 'homepage_visitor', '2409:40d4:100c:f6a3:1486:3b9f:a085:c069', '2023-08-25'),
(353, 'homepage_visitor', '106.205.197.114', '2023-08-25'),
(354, 'homepage_visitor', '2401:4900:7abb:ff88:87e:13ff:fef3:1290', '2023-08-25'),
(355, 'homepage_visitor', '2401:4900:5dec:231f:0:1b:391c:6d01', '2023-08-25'),
(356, 'homepage_visitor', '2405:201:5c0a:6028:44b4:416a:b26b:4e35', '2023-08-25'),
(357, 'homepage_visitor', '2405:201:5c0a:40a0:7101:a9e:b15b:75f4', '2023-08-25'),
(358, 'homepage_visitor', '2409:4052:617:2c38:20c9:8d9c:c984:a480', '2023-08-25'),
(359, 'homepage_visitor', '223.190.95.38', '2023-08-25'),
(360, 'homepage_visitor', '2409:4052:d31:7491::8788:7', '2023-08-25'),
(361, 'homepage_visitor', '2409:40d4:100c:f5bd:732c:cdce:35a8:5d33', '2023-08-26'),
(362, 'homepage_visitor', '2409:4052:4d86:abd3::338a:e603', '2023-08-26'),
(363, 'homepage_visitor', '2606:54c0:36c0:180::10c:26', '2023-08-26'),
(364, 'homepage_visitor', '2a09:bac2:3eb4:a82::10c:2d', '2023-08-26'),
(365, 'homepage_visitor', '2a09:bac2:3eb0:a82::10c:22', '2023-08-26'),
(366, 'homepage_visitor', '2401:4900:7ab5:be4f:d855:a9ff:fe05:cc63', '2023-08-26'),
(367, 'homepage_visitor', '2405:201:5c0a:6f7b:8847:bb43:ed5d:b9', '2023-08-26'),
(368, 'homepage_visitor', '2401:4900:547a:37d3:b40c:c9ff:fea5:3c20', '2023-08-26'),
(369, 'homepage_visitor', '2409:40d4:27:2894:3560:aa78:a572:2c37', '2023-08-26'),
(370, 'homepage_visitor', '2405:201:5c0b:5118:7ca2:d76e:a591:5225', '2023-08-26'),
(371, 'homepage_visitor', '2a09:bac2:3eb4:a82::10c:39', '2023-08-26'),
(372, 'homepage_visitor', '103.181.100.238', '2023-08-26'),
(373, 'homepage_visitor', '2401:4900:4620:b76d:2c20:bf49:4559:ec0', '2023-08-26'),
(374, 'homepage_visitor', '2409:4052:4e90:9902:3836:b38d:642d:6e8a', '2023-08-26'),
(375, 'homepage_visitor', '2405:205:158f:fc5f:cf9:9846:13ba:84d5', '2023-08-26'),
(376, 'homepage_visitor', '2401:4900:7aab:e154:548b:c6f5:643a:f119', '2023-08-26'),
(377, 'homepage_visitor', '2405:201:5c25:8086:8cc:b06a:2f94:200', '2023-08-26'),
(378, 'homepage_visitor', '2409:40d4:1074:8f1a:8000::', '2023-08-26'),
(379, 'homepage_visitor', '2409:4085:1292:7408:4d4f:ee40:4562:ef28', '2023-08-26'),
(380, 'homepage_visitor', '2409:4085:809:f771::1ffb:98a4', '2023-08-26'),
(381, 'homepage_visitor', '110.226.175.205', '2023-08-26'),
(382, 'homepage_visitor', '2401:4900:7abe:f910:f49e:31ff:fe12:b60f', '2023-08-26'),
(383, 'homepage_visitor', '2409:4052:4d03:d2a7::a248:2910', '2023-08-26'),
(384, 'homepage_visitor', '2409:4052:d87:78ae:662f:e605:54ce:c5f6', '2023-08-26'),
(385, 'homepage_visitor', '2409:4052:4e11:7cf::4389:5712', '2023-08-26'),
(386, 'homepage_visitor', '2401:4900:462b:9bc8:dab8:c7d1:4a67:644d', '2023-08-26'),
(387, 'homepage_visitor', '115.245.46.231', '2023-08-26'),
(388, 'homepage_visitor', '2401:4900:1c97:921f:7fe8:ab05:1c4d:a60a', '2023-08-26'),
(389, 'homepage_visitor', '2401:4900:1f3e:6bf3:e85d:6e17:4d3e:82a', '2023-08-26'),
(390, 'homepage_visitor', '2409:4052:4e05:52c0::5b08:5415', '2023-08-26'),
(391, 'homepage_visitor', '103.133.121.2', '2023-08-26'),
(392, 'homepage_visitor', '2409:4085:692:ca9a::e50:90a1', '2023-08-26'),
(393, 'homepage_visitor', '2409:4052:60e:a448::fb5:18a4', '2023-08-26'),
(394, 'homepage_visitor', '171.79.187.179', '2023-08-26'),
(395, 'homepage_visitor', '2409:4060:211:9613:f560:80ac:157:e264', '2023-08-26'),
(396, 'homepage_visitor', '2401:4900:4582:22f3:1f12:f448:8550:a969', '2023-08-26'),
(397, 'homepage_visitor', '2401:4900:547a:26fa:4876:5dff:fe72:3d5e', '2023-08-26'),
(398, 'homepage_visitor', '165.225.124.118', '2023-08-26'),
(399, 'homepage_visitor', '2402:3a80:400c:9032:ea2f:9b82:23ef:b6d6', '2023-08-26'),
(400, 'homepage_visitor', '2409:4052:d9f:de84::6f4b:b303', '2023-08-26'),
(401, 'homepage_visitor', '2405:201:6830:6008:f17e:b1c6:6162:faf3', '2023-08-26'),
(402, 'homepage_visitor', '27.63.114.157', '2023-08-26'),
(403, 'homepage_visitor', '2405:201:5c16:12f:dd1e:25ad:3208:2b2f', '2023-08-26'),
(404, 'homepage_visitor', '2405:201:5c10:8196:f02e:2b48:b5d2:1541', '2023-08-26'),
(405, 'homepage_visitor', '2405:201:5c09:e11d:8c4f:c665:29cf:40b7', '2023-08-26'),
(406, 'homepage_visitor', '2409:40d4:1006:ab87:6cda:5eff:fe93:a079', '2023-08-26'),
(407, 'homepage_visitor', '2409:4060:211:9613:156e:2070:1846:cbf8', '2023-08-26'),
(408, 'homepage_visitor', '2409:4052:2eab:530b::104b:b700', '2023-08-26'),
(409, 'homepage_visitor', '2401:4900:1c7b:63fd:787a:8491:ecf3:7383', '2023-08-26'),
(410, 'homepage_visitor', '49.36.232.250', '2023-08-26'),
(411, 'homepage_visitor', '2409:40d4:1071:31f4:4df8:3d34:dc7a:4b7', '2023-08-26'),
(412, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:d105:fe77:e612', '2023-08-26'),
(413, 'homepage_visitor', '2409:4052:e1e:290c:1e6a:3fe7:7037:b74', '2023-08-26'),
(414, 'homepage_visitor', '2409:40d4:100c:f6e1:8000::', '2023-08-26'),
(415, 'homepage_visitor', '2409:40d4:107a:a1f2:8461:a6ff:fedf:c7d9', '2023-08-26'),
(416, 'homepage_visitor', '2401:4900:41c3:3c66:3da7:252f:80b:7172', '2023-08-26'),
(417, 'homepage_visitor', '2405:201:5c10:8bd2:a864:b139:875a:4f8e', '2023-08-26'),
(418, 'homepage_visitor', '2401:4900:545f:e518:c4cd:1cff:fe17:2b88', '2023-08-26'),
(419, 'homepage_visitor', '2409:4052:4e18:fd73::184b:520f', '2023-08-26'),
(420, 'homepage_visitor', '2a02:4780:11:c0de::2c', '2023-08-26'),
(421, 'homepage_visitor', '217.21.86.47', '2023-08-26'),
(422, 'homepage_visitor', '66.249.65.15', '2023-08-26'),
(423, 'homepage_visitor', '66.249.65.1', '2023-08-27'),
(424, 'homepage_visitor', '122.161.95.56', '2023-08-27'),
(425, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:3d5e:9644:4af8', '2023-08-27'),
(426, 'homepage_visitor', '2409:4085:79a:feb::1914:60ac', '2023-08-27'),
(427, 'homepage_visitor', '2401:4900:524c:38eb:9c9:8b28:acbe:e017', '2023-08-27'),
(428, 'homepage_visitor', '2401:4900:464a:e639:814f:b476:9ed:dd6d', '2023-08-27'),
(429, 'homepage_visitor', '2a09:bac2:3eb5:a82::10c:10', '2023-08-27'),
(430, 'homepage_visitor', '2401:4900:464f:e23c:5441:7867:65b:e830', '2023-08-27'),
(431, 'homepage_visitor', '103.57.84.108', '2023-08-27'),
(432, 'homepage_visitor', '2402:3a80:1a35:76c5:9963:be69:490:c9b', '2023-08-27'),
(433, 'homepage_visitor', '2409:4052:240c:145b:5364:76a6:152c:86ee', '2023-08-27'),
(434, 'homepage_visitor', '2401:4900:5248:9be9:0:3e:f81:3101', '2023-08-27'),
(435, 'homepage_visitor', '2405:201:5c0a:6f7b:6cf9:bef9:bc53:5229', '2023-08-27'),
(436, 'homepage_visitor', '2409:40d4:106b:e2bd:8000::', '2023-08-27'),
(437, 'homepage_visitor', '2402:3a80:1a32:612d:d2b2:b27f:ad05:8f01', '2023-08-27'),
(438, 'homepage_visitor', '103.207.144.91', '2023-08-27'),
(439, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:29f5:ca3e:f9e2', '2023-08-27'),
(440, 'homepage_visitor', '2401:4900:458d:1bb0:2:1:9c99:5d26', '2023-08-27'),
(441, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:edf9:2c14:8fa5', '2023-08-27'),
(442, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:277e:8855:1771', '2023-08-27'),
(443, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:aa67:7de2:5914', '2023-08-27'),
(444, 'homepage_visitor', '2401:4900:5dea:5e21:d331:2c87:e836:189c', '2023-08-27'),
(445, 'homepage_visitor', '2401:4900:4640:fe42:4845:8780:fa8d:a561', '2023-08-27'),
(446, 'homepage_visitor', '2401:4900:3056:dd7d:0:64:ade9:1301', '2023-08-27'),
(447, 'homepage_visitor', '2401:4900:4625:ca2:669f:57f:f8ec:191f', '2023-08-27'),
(448, 'homepage_visitor', '2401:4900:1c62:a8a6:9d94:1a:ae22:31bd', '2023-08-27'),
(449, 'homepage_visitor', '2409:4052:2409:f0ee::384:b8ac', '2023-08-27'),
(450, 'homepage_visitor', '141.0.9.136', '2023-08-27'),
(451, 'homepage_visitor', '165.225.124.98', '2023-08-27'),
(452, 'homepage_visitor', '2401:4900:5277:aac0:0:39:a36a:ce01', '2023-08-27'),
(453, 'homepage_visitor', '2409:4052:d90:43a0::9b0b:a90b', '2023-08-28'),
(454, 'homepage_visitor', '66.249.83.193', '2023-08-28'),
(455, 'homepage_visitor', '66.102.6.224', '2023-08-28'),
(456, 'homepage_visitor', '72.14.199.206', '2023-08-28'),
(457, 'homepage_visitor', '66.102.6.225', '2023-08-28'),
(458, 'homepage_visitor', '46.227.113.5', '2023-08-28'),
(459, 'homepage_visitor', '46.227.113.6', '2023-08-28'),
(460, 'homepage_visitor', '2409:4052:2110:f99:580c:4436:d1d4:415c', '2023-08-28'),
(461, 'homepage_visitor', '66.102.6.235', '2023-08-28'),
(462, 'homepage_visitor', '66.249.83.192', '2023-08-28'),
(463, 'homepage_visitor', '2401:4900:57d3:d2f0:56:625c:a592:4348', '2023-08-28'),
(464, 'homepage_visitor', '2409:40c2:102a:7c67:8000::', '2023-08-28'),
(465, 'homepage_visitor', '2401:4900:445e:d84a:9f5a:138e:ab60:d222', '2023-08-28'),
(466, 'homepage_visitor', '2409:4063:2389:73df::287e:80a5', '2023-08-28'),
(467, 'homepage_visitor', '2409:40c1:38:ba64:4e7b:3e8b:2a3b:d967', '2023-08-28'),
(468, 'homepage_visitor', '2409:4081:e8c:9df0::5c8:fc09', '2023-08-28'),
(469, 'homepage_visitor', '2409:4081:9e89:edba::f7c9:50a', '2023-08-28'),
(470, 'homepage_visitor', '2401:4900:36bc:a5b0:1:1:eec9:c93f', '2023-08-28'),
(471, 'homepage_visitor', '2409:40e3:7:9af:4082:4bff:fe1e:e805', '2023-08-28'),
(472, 'homepage_visitor', '2409:4070:2cc9:3f85:cf58:e447:221:40a', '2023-08-28'),
(473, 'homepage_visitor', '122.161.52.146', '2023-08-28'),
(474, 'homepage_visitor', '116.73.107.208', '2023-08-28'),
(475, 'homepage_visitor', '2405:201:5c09:ecf5:1cfe:a952:8f01:964a', '2023-08-28'),
(476, 'homepage_visitor', '2409:40f4:10f4:89a7:8000::', '2023-08-28'),
(477, 'homepage_visitor', '2409:4080:921a:32e3::335:8ad', '2023-08-28'),
(478, 'homepage_visitor', '2409:40c4:4a:f0d0:8000::', '2023-08-28'),
(479, 'homepage_visitor', '2401:4900:577c:12b2::122d:d6f9', '2023-08-28'),
(480, 'homepage_visitor', '2409:40c4:23:f648:8000::', '2023-08-28'),
(481, 'homepage_visitor', '2409:4085:61c:3a8e:15ce:9c82:5e68:5196', '2023-08-28'),
(482, 'homepage_visitor', '2409:4089:ac13:b47c:9b8a:5f15:bb48:5f3d', '2023-08-28'),
(483, 'homepage_visitor', '66.249.83.207', '2023-08-28'),
(484, 'homepage_visitor', '2401:fa00:1a:200:a8ba:7cf1:c822:b18a', '2023-08-28'),
(485, 'homepage_visitor', '2409:40d4:1013:96d5:861:3987:f17c:30f1', '2023-08-29'),
(486, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:fa8e:8e5f:c76d', '2023-08-29'),
(487, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:4c02:6799:8de7', '2023-08-29'),
(488, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:986c:c662:985a', '2023-08-29'),
(489, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:8ead:65c2:47a0', '2023-08-29'),
(490, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:4381:ea36:a4bf', '2023-08-29'),
(491, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:55b4:e7d7:a1cf', '2023-08-29'),
(492, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:80f4:b381:4dd6', '2023-08-29'),
(493, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:b968:2fd3:cfd3', '2023-08-29'),
(494, 'homepage_visitor', '2401:4900:798d:4be6::a3c:cd29', '2023-08-29'),
(495, 'homepage_visitor', '2409:4052:e98:d686::230a:2911', '2023-08-29'),
(496, 'homepage_visitor', '2409:4052:e16:2d6d:623f:65:329f:a468', '2023-08-29'),
(497, 'homepage_visitor', '2409:4052:2488:b53d::27a2:8b1', '2023-08-29'),
(498, 'homepage_visitor', '2405:201:5c09:e14c:7101:a9e:b15b:75f4', '2023-08-29'),
(499, 'homepage_visitor', '2401:4900:547f:f6bd::438:82ce', '2023-08-29'),
(500, 'homepage_visitor', '2409:4051:13:2ff5::18ae:38a5', '2023-08-29'),
(501, 'homepage_visitor', '2401:4900:7a93:f868:c37:62ff:fee8:b7f3', '2023-08-29'),
(502, 'homepage_visitor', '2401:fa00:1a:200:e57b:9893:337a:e550', '2023-08-29'),
(503, 'homepage_visitor', '2401:4900:3104:8810:0:c:985e:b801', '2023-08-29'),
(504, 'homepage_visitor', '157.38.56.3', '2023-08-29'),
(505, 'homepage_visitor', '2409:40d4:106a:27fb:8000::', '2023-08-29'),
(506, 'homepage_visitor', '2409:40d4:100d:3ada:48f7:f9ff:fe6a:ca1d', '2023-08-29'),
(507, 'homepage_visitor', '2409:4060:38c:76a:37a8:9f06:ab00:7e76', '2023-08-29'),
(508, 'homepage_visitor', '49.204.162.117', '2023-08-29'),
(509, 'homepage_visitor', '2405:205:138e:86b1::469:90a5', '2023-08-29'),
(510, 'homepage_visitor', '136.226.250.111', '2023-08-29'),
(511, 'homepage_visitor', '2401:4900:5dea:824d:a883:3b33:2135:88a9', '2023-08-29'),
(512, 'homepage_visitor', '2405:201:5c0a:40a0:3135:e68b:267d:b950', '2023-08-29'),
(513, 'homepage_visitor', '2405:201:5c17:5011:f174:cb14:40c2:e5e3', '2023-08-29'),
(514, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:7332:2c0c:d241', '2023-08-29'),
(515, 'homepage_visitor', '2409:40d4:1078:232f:8c0:10ff:fe65:f570', '2023-08-29'),
(516, 'homepage_visitor', '103.170.68.36', '2023-08-30'),
(517, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:e617:c39c:83c', '2023-08-30'),
(518, 'homepage_visitor', '2402:3a80:a35:4887:55e:77aa:4681:c112', '2023-08-30'),
(519, 'homepage_visitor', '2401:4900:1c7b:6462:20f0:29a7:f560:4c69', '2023-08-30'),
(520, 'homepage_visitor', '72.14.199.229', '2023-08-30'),
(521, 'homepage_visitor', '103.101.213.67', '2023-08-30'),
(522, 'homepage_visitor', '2405:201:5c0b:509a:300e:7707:86bf:e121', '2023-08-31'),
(523, 'homepage_visitor', '205.169.39.113', '2023-08-31'),
(524, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:955e:c1ab:cca7', '2023-08-31'),
(525, 'homepage_visitor', '2409:4085:2d09:84a0::ec8:2204', '2023-08-31'),
(526, 'homepage_visitor', '2401:4900:545f:e0a3::27:cb48', '2023-08-31'),
(527, 'homepage_visitor', '2409:4052:d40:862a::188a:8b07', '2023-08-31'),
(528, 'homepage_visitor', '120.138.114.164', '2023-08-31'),
(529, 'homepage_visitor', '2405:201:602d:1930:c587:e08a:94c6:b8e4', '2023-08-31'),
(530, 'homepage_visitor', '2405:201:5c10:8991:8473:258d:819a:ea66', '2023-08-31'),
(531, 'homepage_visitor', '2401:4900:458c:14c9:2:1:a346:6cf8', '2023-08-31'),
(532, 'homepage_visitor', '49.44.83.198', '2023-08-31'),
(533, 'homepage_visitor', '2401:4900:1cb0:f306:b198:66df:214d:6239', '2023-08-31'),
(534, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:529:d0a4:5de0', '2023-08-31'),
(535, 'homepage_visitor', '103.57.84.173', '2023-08-31'),
(536, 'homepage_visitor', '116.206.159.245', '2023-08-31'),
(537, 'homepage_visitor', '2401:4900:4626:6656:34da:3de:4ad:9c49', '2023-08-31'),
(538, 'homepage_visitor', '2409:40d4:1013:d5c:8000::', '2023-08-31'),
(539, 'homepage_visitor', '152.58.101.80', '2023-08-31'),
(540, 'homepage_visitor', '2405:201:402d:c8c8:e9d8:3e69:9096:3dcf', '2023-09-01'),
(541, 'homepage_visitor', '103.38.36.228', '2023-09-01'),
(542, 'homepage_visitor', '136.226.250.83', '2023-09-01'),
(543, 'homepage_visitor', '2401:4900:5615:df5a:181f:5dff:fe8b:e61b', '2023-09-01'),
(544, 'homepage_visitor', '103.5.191.250', '2023-09-01'),
(545, 'homepage_visitor', '2409:40d4:107d:c1f3:fc9a:60ff:fe11:a63', '2023-09-01'),
(546, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:15d8:201c:91e8', '2023-09-01'),
(547, 'homepage_visitor', '115.160.213.202', '2023-09-01'),
(548, 'homepage_visitor', '66.249.69.96', '2023-09-02'),
(549, 'homepage_visitor', '2401:4900:523c:461f:0:6a:5b28:8b01', '2023-09-02'),
(550, 'homepage_visitor', '2409:4052:2013:3342::1c7f:e0ac', '2023-09-02'),
(551, 'homepage_visitor', '106.205.201.154', '2023-09-02'),
(552, 'homepage_visitor', '2401:4900:1c1a:338e:20f0:29a7:f560:4c69', '2023-09-02'),
(553, 'homepage_visitor', '165.225.124.113', '2023-09-03'),
(554, 'homepage_visitor', '2402:3a80:43a0:32e3:75b9:ca24:e628:f982', '2023-09-03'),
(555, 'homepage_visitor', '165.225.124.109', '2023-09-03'),
(556, 'homepage_visitor', '2402:3a80:90a:5d83:5c4e:b3d:cc7d:ded1', '2023-09-03'),
(557, 'homepage_visitor', '2401:4900:1c1a:1f8:79d6:aa8d:9761:6b4b', '2023-09-04'),
(558, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:94b:7745:65d7', '2023-09-04'),
(559, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:eddf:d45c:d6', '2023-09-04'),
(560, 'homepage_visitor', '2402:3a80:a0b:eac9:0:47:6ea5:ed01', '2023-09-04'),
(561, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:220c:5543:f2cb', '2023-09-05'),
(562, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:6667:85a5:8616', '2023-09-05'),
(563, 'homepage_visitor', '2402:3a80:1cd1:99fe:48ca:e375:2e29:8e3c', '2023-09-05'),
(564, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:4bed:e51f:b082', '2023-09-06'),
(565, 'homepage_visitor', '106.205.207.60', '2023-09-06'),
(566, 'homepage_visitor', '103.211.53.1', '2023-09-06'),
(567, 'homepage_visitor', '175.101.69.69', '2023-09-06'),
(568, 'homepage_visitor', '117.222.209.10', '2023-09-06'),
(569, 'homepage_visitor', '2a09:bac3:3eb6:a82::10c:20', '2023-09-06'),
(570, 'homepage_visitor', '2a09:bac2:3eb3:a82::10c:9', '2023-09-06'),
(571, 'homepage_visitor', '2405:201:5c10:815f:4178:1529:4b46:dc0c', '2023-09-06'),
(572, 'homepage_visitor', '2a09:bac3:3eb1:a82::10c:13', '2023-09-06'),
(573, 'homepage_visitor', '2409:4060:2011:1510:dbef:9267:27c7:f3de', '2023-09-06'),
(574, 'homepage_visitor', '103.252.147.217', '2023-09-06'),
(575, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:139d:5adb:18db', '2023-09-06'),
(576, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:dea7:ec6c:e5b2', '2023-09-06'),
(577, 'homepage_visitor', '205.169.39.74', '2023-09-07'),
(578, 'homepage_visitor', '66.249.70.161', '2023-09-07'),
(579, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:ec17:495e:ce3c', '2023-09-07'),
(580, 'homepage_visitor', '103.57.84.152', '2023-09-07'),
(581, 'homepage_visitor', '64.92.4.18', '2023-09-07'),
(582, 'homepage_visitor', '2409:40c2:1152:7e05:d415:e38e:3654:352c', '2023-09-07'),
(583, 'homepage_visitor', '2401:4900:30c7:61:e101:9847:b222:9687', '2023-09-08'),
(584, 'homepage_visitor', '103.101.102.117', '2023-09-08'),
(585, 'homepage_visitor', '2402:3a80:a31:ef18:0:5e:4ef0:e201', '2023-09-08'),
(586, 'homepage_visitor', '2409:4042:4cca:d381::944a:f610', '2023-09-08'),
(587, 'homepage_visitor', '2409:4055:4e81:449:97ad:502:fb60:e943', '2023-09-08'),
(588, 'homepage_visitor', '106.51.77.224', '2023-09-08'),
(589, 'homepage_visitor', '125.21.216.158', '2023-09-08'),
(590, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:5ca5:4b37:ca4b', '2023-09-08'),
(591, 'homepage_visitor', '103.207.146.117', '2023-09-08'),
(592, 'homepage_visitor', '103.85.97.97', '2023-09-08'),
(593, 'homepage_visitor', '2409:4055:4e81:449:b1ef:7ba6:9b22:9181', '2023-09-08'),
(594, 'homepage_visitor', '103.165.29.204', '2023-09-08'),
(595, 'homepage_visitor', '59.95.188.66', '2023-09-08'),
(596, 'homepage_visitor', '149.56.150.194', '2023-09-09'),
(597, 'homepage_visitor', '66.249.66.133', '2023-09-09'),
(598, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:44d3:33aa:4e81', '2023-09-09'),
(599, 'homepage_visitor', '2405:201:a418:408c:5135:727b:fc5b:271a', '2023-09-09'),
(600, 'homepage_visitor', '2405:201:a418:408c:e53e:ce6a:d3d5:eaff', '2023-09-09'),
(601, 'homepage_visitor', '121.45.161.240', '2023-09-09'),
(602, 'homepage_visitor', '2405:201:5c10:815f:edd6:7dca:d61:e6f', '2023-09-09'),
(603, 'homepage_visitor', '66.249.83.197', '2023-09-09'),
(604, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:d28a:e636:b1b9', '2023-09-10'),
(605, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:6f17:f78c:2d63', '2023-09-10'),
(606, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:5da3:2412:4e00', '2023-09-10'),
(607, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:7561:4e1c:8f4c', '2023-09-10'),
(608, 'homepage_visitor', '2409:40d0:1021:190f:1004:50ff:fe97:5de6', '2023-09-10'),
(609, 'homepage_visitor', '2405:201:5c1d:107c:75cc:1350:d897:cb3c', '2023-09-10'),
(610, 'homepage_visitor', '66.249.65.96', '2023-09-11'),
(611, 'homepage_visitor', '66.249.74.5', '2023-09-11'),
(612, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:68d8:f4da:8a80', '2023-09-11'),
(613, 'homepage_visitor', '2409:40d4:f8:3153:1109:8fd6:4a0a:a1e3', '2023-09-11'),
(614, 'homepage_visitor', '2409:40d4:1008:2cb4:8df2:f56b:bacc:5e68', '2023-09-11'),
(615, 'homepage_visitor', '2409:40d4:107e:b7c9:573c:d8f5:365d:45cc', '2023-09-11'),
(616, 'homepage_visitor', '2409:4052:4d0e:cfd6::364a:7d13', '2023-09-11'),
(617, 'homepage_visitor', '2409:40d4:101b:91a2:8000::', '2023-09-11'),
(618, 'homepage_visitor', '2401:4900:7ab8:c6ef:703c:92ff:fefa:9ea0', '2023-09-11'),
(619, 'homepage_visitor', '66.249.75.24', '2023-09-12'),
(620, 'homepage_visitor', '66.249.75.1', '2023-09-12'),
(621, 'homepage_visitor', '2409:40d4:1016:4d02:aa:c3ff:fec1:6cac', '2023-09-12'),
(622, 'homepage_visitor', '2402:3a80:a14:67cc:0:5a:db94:a201', '2023-09-12'),
(623, 'homepage_visitor', '2401:4900:1cc8:c9a9:349e:8711:752d:dcf8', '2023-09-12'),
(624, 'homepage_visitor', '2401:4900:4639:9ddb:3d36:bb85:b8fd:d84', '2023-09-12'),
(625, 'homepage_visitor', '2405:201:2038:a878:f8b2:5bb1:25af:a4e', '2023-09-12'),
(626, 'homepage_visitor', '69.160.160.59', '2023-09-13'),
(627, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:6dbb:e755:5f66', '2023-09-13'),
(628, 'homepage_visitor', '72.14.199.227', '2023-09-13'),
(629, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:333c:c8e7:ffa2', '2023-09-14'),
(630, 'homepage_visitor', '2405:201:5c16:b0ce:8d7:2eda:d0fe:87a3', '2023-09-14'),
(631, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:3e0:c07c:7d33', '2023-09-14'),
(632, 'homepage_visitor', '103.133.123.155', '2023-09-14'),
(633, 'homepage_visitor', '2401:4900:5451:313b:481b:40d9:d30c:c96d', '2023-09-14'),
(634, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:e4d9:69d5:e955', '2023-09-14'),
(635, 'homepage_visitor', '103.157.220.61', '2023-09-14'),
(636, 'homepage_visitor', '34.125.33.241', '2023-09-15'),
(637, 'homepage_visitor', '2401:4900:2eee:7a86:0:61:682:301', '2023-09-15'),
(638, 'homepage_visitor', '103.247.230.106', '2023-09-16'),
(639, 'homepage_visitor', '103.254.226.68', '2023-09-16'),
(640, 'homepage_visitor', '2409:40d4:22:7a20:24cf:b3ff:fe9c:d634', '2023-09-16'),
(641, 'homepage_visitor', '3.17.9.101', '2023-09-16'),
(642, 'homepage_visitor', '157.48.70.164', '2023-09-17'),
(643, 'homepage_visitor', '182.185.53.235', '2023-09-17'),
(644, 'homepage_visitor', '2402:3a80:1cd0:c7e4:178:5634:1232:5476', '2023-09-17'),
(645, 'homepage_visitor', '2402:3a80:1983:a9c3:a854:ba9:613d:45c5', '2023-09-17'),
(646, 'homepage_visitor', '45.251.15.33', '2023-09-17'),
(647, 'homepage_visitor', '2402:3a80:1cd2:b979:378:5634:1232:5476', '2023-09-18'),
(648, 'homepage_visitor', '85.200.206.2', '2023-09-19'),
(649, 'homepage_visitor', '2401:fa00:1a:200:2d58:bc04:eb09:c4db', '2023-09-19'),
(650, 'homepage_visitor', '2401:4900:7064:b5ea:dd9b:4bf7:26b6:bb60', '2023-09-19'),
(651, 'homepage_visitor', '103.207.146.6', '2023-09-19'),
(652, 'homepage_visitor', '2401:4900:7aa9:bbd6:a036:68ff:fe49:e90b', '2023-09-19'),
(653, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:cf0:c6de:8e3b', '2023-09-20'),
(654, 'homepage_visitor', '2409:40d4:f4:aff:3394:8c33:3f33:e4bb', '2023-09-20'),
(655, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:49bb:7093:bebe', '2023-09-20'),
(656, 'homepage_visitor', '2401:4900:1c1a:6271:e8e9:395c:cf32:6047', '2023-09-20'),
(657, 'homepage_visitor', '2409:40d4:100e:5968:8000::', '2023-09-20'),
(658, 'homepage_visitor', '117.234.24.254', '2023-09-20'),
(659, 'homepage_visitor', '2409:40d4:101f:3016:243d:6eff:fe5d:e747', '2023-09-20'),
(660, 'homepage_visitor', '2401:4900:4626:e47d:f284:beb8:8d20:79e0', '2023-09-20'),
(661, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:d618:bab2:d60e', '2023-09-20'),
(662, 'homepage_visitor', '2405:201:5c0a:4007:743b:d763:372:62af', '2023-09-20'),
(663, 'homepage_visitor', '2a09:bac3:3eb4:7eb::ca:54', '2023-09-20'),
(664, 'homepage_visitor', '2409:4085:1182:a11f:616:259a:c87e:36ed', '2023-09-20'),
(665, 'homepage_visitor', '2a09:bac2:3eb5:7eb::ca:3c', '2023-09-20'),
(666, 'homepage_visitor', '2402:3a80:1aa9:59a2:9873:4ec6:49a3:9632', '2023-09-20'),
(667, 'homepage_visitor', '2401:4900:4638:a3a6:5332:c1c1:7e25:8c62', '2023-09-20'),
(668, 'homepage_visitor', '2409:4052:d01:1a7b::bd0a:860f', '2023-09-20'),
(669, 'homepage_visitor', '2409:40d4:107b:246d:a8bb:f1ff:fe5c:62e1', '2023-09-20'),
(670, 'homepage_visitor', '2a09:bac3:3eb0:7eb::ca:13c', '2023-09-20'),
(671, 'homepage_visitor', '2a09:bac3:3eb2:7eb::ca:144', '2023-09-20'),
(672, 'homepage_visitor', '110.235.219.85', '2023-09-20'),
(673, 'homepage_visitor', '2405:201:5c09:e14c:dc95:6904:20c8:632b', '2023-09-20'),
(674, 'homepage_visitor', '2405:201:5c11:c807:a4fe:1992:b88e:2595', '2023-09-20'),
(675, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:9145:bfad:cc9e', '2023-09-20'),
(676, 'homepage_visitor', '103.59.75.169', '2023-09-20'),
(677, 'homepage_visitor', '2409:4085:1e14:6212::38b:9413', '2023-09-20'),
(678, 'homepage_visitor', '2401:4900:5d9b:4ff5:1417:ae41:3ec2:b00', '2023-09-20'),
(679, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:a31:f863:8002', '2023-09-20'),
(680, 'homepage_visitor', '122.177.1.218', '2023-09-20'),
(681, 'homepage_visitor', '2402:3a80:1981:910d:c5e2:8277:a125:aa34', '2023-09-20'),
(682, 'homepage_visitor', '103.77.139.248', '2023-09-20'),
(683, 'homepage_visitor', '2401:4900:1c21:9280:54d3:69c5:8d9f:1c16', '2023-09-21'),
(684, 'homepage_visitor', '2409:40d4:100c:31e1:8000::', '2023-09-21'),
(685, 'homepage_visitor', '2a09:bac2:3eb5:a82::10c:1', '2023-09-21'),
(686, 'homepage_visitor', '205.169.39.159', '2023-09-21'),
(687, 'homepage_visitor', '2402:3a80:4214:4044:0:43:22b5:9701', '2023-09-21'),
(688, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:2a22:eebc:3e80', '2023-09-22'),
(689, 'homepage_visitor', '2409:40d4:1069:5e77:9dc:a2e:4ba3:cfab', '2023-09-22'),
(690, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:d843:7613:a329', '2023-09-22'),
(691, 'homepage_visitor', '67.215.19.196', '2023-09-22'),
(692, 'homepage_visitor', '2405:201:5c0a:4007:dd49:33eb:817b:fc7', '2023-09-22'),
(693, 'homepage_visitor', '2401:4900:5443:f79f:c4e0:d88f:75f0:a0d3', '2023-09-22'),
(694, 'homepage_visitor', '2409:40d4:107f:663c:f2a3:1de9:baf9:6cf5', '2023-09-22'),
(695, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:8abd:1cd6:b80e', '2023-09-22'),
(696, 'homepage_visitor', '2409:40d4:1017:b19:1469:501a:ef21:3fa7', '2023-09-22'),
(697, 'homepage_visitor', '2405:201:5c0a:4031:5dc2:985f:24aa:66de', '2023-09-22'),
(698, 'homepage_visitor', '2401:4900:547a:37a9:48e4:81ff:fe8c:b2b9', '2023-09-22'),
(699, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:984f:2d4c:7b5b', '2023-09-22'),
(700, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:644f:e4ea:617c', '2023-09-22'),
(701, 'homepage_visitor', '2409:40d4:107e:7df7:8000::', '2023-09-22'),
(702, 'homepage_visitor', '2401:4900:5dd0:11bd:0:5:acf7:201', '2023-09-22'),
(703, 'homepage_visitor', '54.166.199.88', '2023-09-22'),
(704, 'homepage_visitor', '3.81.83.58', '2023-09-22'),
(705, 'homepage_visitor', '34.203.212.5', '2023-09-22'),
(706, 'homepage_visitor', '2a01:4f8:1c1c:3c7c::1', '2023-09-22'),
(707, 'homepage_visitor', '2401:4900:5d97:3f17:18eb:5c34:c08:cddd', '2023-09-22'),
(708, 'homepage_visitor', '2401:4900:1c1b:cd31:499b:5efc:9091:a6b7', '2023-09-22'),
(709, 'homepage_visitor', '2401:4900:7aad:f632:544a:efff:fec3:a87', '2023-09-23'),
(710, 'homepage_visitor', '2a09:bac2:3eb6:a82::10c:6', '2023-09-23'),
(711, 'homepage_visitor', '103.167.194.83', '2023-09-23');
INSERT INTO `webina_count_visitor` (`id`, `ref_id`, `ip_address`, `view_date`) VALUES
(712, 'homepage_visitor', '2a09:bac3:3eb6:a82::10c:1c', '2023-09-23'),
(713, 'homepage_visitor', '61.95.233.86', '2023-09-23'),
(714, 'homepage_visitor', '2401:4900:5d9f:b422:903e:9a1:22d8:a406', '2023-09-23'),
(715, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:d50e:4c23:2359', '2023-09-23'),
(716, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:c3eb:6eeb:8013', '2023-09-23'),
(717, 'homepage_visitor', '2401:4900:5d8f:cfa0:e4cc:b7e7:970e:3774', '2023-09-23'),
(718, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:1119:9a41:6093', '2023-09-24'),
(719, 'homepage_visitor', '205.169.39.69', '2023-09-24'),
(720, 'homepage_visitor', '49.36.233.136', '2023-09-24'),
(721, 'homepage_visitor', '2405:201:5c0a:4007:2530:187:caad:aac8', '2023-09-24'),
(722, 'homepage_visitor', '66.249.72.8', '2023-09-24'),
(723, 'homepage_visitor', '117.226.238.167', '2023-09-24'),
(724, 'homepage_visitor', '2405:201:5c07:1a1:150b:2835:a3c0:909a', '2023-09-25'),
(725, 'homepage_visitor', '2409:4052:2480:ad40:fc7b:fdc5:2ce0:82a', '2023-09-25'),
(726, 'homepage_visitor', '157.38.133.12', '2023-09-25'),
(727, 'homepage_visitor', '2409:4052:2115:b810:745d:8e8f:e608:2f40', '2023-09-25'),
(728, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:1e5b:fffc:762', '2023-09-26'),
(729, 'homepage_visitor', '165.225.124.103', '2023-09-26'),
(730, 'homepage_visitor', '2402:3a80:a17:e593:a525:bc7d:fed2:f0d6', '2023-09-26'),
(731, 'homepage_visitor', '2409:40d4:1011:ab5a:dc80:5965:7b0e:4f32', '2023-09-27'),
(732, 'homepage_visitor', '188.54.251.152', '2023-09-28'),
(733, 'homepage_visitor', '2a02:26f7:d6cc:6807:0:4a9:e232:6499', '2023-09-28'),
(734, 'homepage_visitor', '66.249.90.37', '2023-09-28'),
(735, 'homepage_visitor', '136.226.250.109', '2023-09-28'),
(736, 'homepage_visitor', '2a02:26f7:d6c4:690f:0:d8ac:51f3:7fc7', '2023-09-29'),
(737, 'homepage_visitor', '2405:201:5c0b:503a:a0ad:dce6:3df8:86ed', '2023-09-29'),
(738, 'homepage_visitor', '66.249.83.198', '2023-09-29'),
(739, 'homepage_visitor', '2402:3a80:a1e:348f:0:5:686a:8901', '2023-09-30'),
(740, 'homepage_visitor', '157.38.37.201', '2023-10-01'),
(741, 'homepage_visitor', '2a09:bac2:3eb0:a82::10c:29', '2023-10-03'),
(742, 'homepage_visitor', '103.220.209.69', '2023-10-03'),
(743, 'homepage_visitor', '172.255.48.132', '2023-10-03'),
(744, 'homepage_visitor', '34.225.223.177', '2023-10-04'),
(745, 'homepage_visitor', '2401:4900:b86:b741:1556:4d0f:de58:4a2d', '2023-10-04'),
(746, 'homepage_visitor', '37.120.147.206', '2023-10-04'),
(747, 'homepage_visitor', '2405:201:5c07:cb:6113:74e8:3759:391', '2023-10-04'),
(748, 'homepage_visitor', '143.198.71.54', '2023-10-04'),
(749, 'homepage_visitor', '24.199.97.13', '2023-10-04'),
(750, 'homepage_visitor', '66.102.8.172', '2023-10-04'),
(751, 'homepage_visitor', '66.249.80.108', '2023-10-04'),
(752, 'homepage_visitor', '143.244.189.209', '2023-10-04'),
(753, 'homepage_visitor', '2405:201:403b:9825:c18d:c971:af1a:1a90', '2023-10-04'),
(754, 'homepage_visitor', '23.228.130.201', '2023-10-04'),
(755, 'homepage_visitor', '66.249.82.70', '2023-10-04'),
(756, 'homepage_visitor', '66.249.82.69', '2023-10-04'),
(757, 'homepage_visitor', '2a03:2880:31ff:13::face:b00c', '2023-10-05'),
(758, 'homepage_visitor', '2a03:2880:20ff:e::face:b00c', '2023-10-05'),
(759, 'homepage_visitor', '2a03:2880:21ff:4::face:b00c', '2023-10-05'),
(760, 'homepage_visitor', '2a03:2880:21ff:d::face:b00c', '2023-10-05'),
(761, 'homepage_visitor', '2409:4088:bec7:d5dd::10ca:b80a', '2023-10-05'),
(762, 'homepage_visitor', '2409:4085:e99:86e5:c96d:ebdb:26de:c245', '2023-10-05'),
(763, 'homepage_visitor', '2405:201:5c07:cb:45f3:228d:5119:743f', '2023-10-05'),
(764, 'homepage_visitor', '2405:201:5c07:cb:f419:1d29:fff0:3971', '2023-10-05'),
(765, 'homepage_visitor', '2405:201:5c07:cb:50fd:d76c:c6ab:2545', '2023-10-05'),
(766, 'homepage_visitor', '27.58.95.228', '2023-10-05'),
(767, 'homepage_visitor', '106.206.190.248', '2023-10-05'),
(768, 'homepage_visitor', '2600:100d:b022:d953:18f4:a0cb:b249:7d0a', '2023-10-05'),
(769, 'homepage_visitor', '78.109.69.23', '2023-10-05'),
(770, 'homepage_visitor', '2401:4900:7aa0:b997:10ce:c1ff:fe9f:a1a2', '2023-10-05'),
(771, 'homepage_visitor', '2401:4900:1c7b:7724:5c49:318e:fd2f:2221', '2023-10-05'),
(772, 'homepage_visitor', '2409:40c2:38:cfcb:bd4f:7043:495:e926', '2023-10-06'),
(773, 'homepage_visitor', '2401:4900:7ab6:809b::221:8700', '2023-10-06'),
(774, 'homepage_visitor', '2409:4060:2e06:ed0b:b61d:e887:69e0:234b', '2023-10-06'),
(775, 'homepage_visitor', '2402:e280:2303:6ac:f8cc:fbd:9c5a:8c5b', '2023-10-06'),
(776, 'homepage_visitor', '2405:201:5c07:cb:a434:e9e1:97b0:a7d9', '2023-10-06'),
(777, 'homepage_visitor', '2409:40d4:106b:8517:dc4f:a0ff:fe45:9bcd', '2023-10-06'),
(778, 'homepage_visitor', '2405:201:5c07:cb:d57c:170e:7684:be68', '2023-10-06'),
(779, 'homepage_visitor', '2409:408c:2597:21e::247a:c0ac', '2023-10-06'),
(780, 'homepage_visitor', '2402:3a80:a02:27:0:5d:b5f6:3501', '2023-10-06'),
(781, 'homepage_visitor', '2405:201:5c07:cb:5023:1fc4:a3d0:5c15', '2023-10-06'),
(782, 'homepage_visitor', '2409:40c2:11e:29b3:61a9:1ed7:4098:6a85', '2023-10-06'),
(783, 'homepage_visitor', '2401:4900:1f2b:a4ab:a5a1:bb58:a487:3c61', '2023-10-06'),
(784, 'homepage_visitor', '2401:4900:546a:26f4:ece3:43ff:fe2c:53ea', '2023-10-06'),
(785, 'homepage_visitor', '2402:e280:2303:6ac:c362:192:a314:d17e', '2023-10-06'),
(786, 'homepage_visitor', '2405:201:5c07:cb:75a6:6229:77b2:30f3', '2023-10-07'),
(787, 'homepage_visitor', '2409:40d4:101f:bddd:b9d6:f1d6:6861:3935', '2023-10-07'),
(788, 'homepage_visitor', '2a03:2880:30ff:77::face:b00c', '2023-10-08'),
(789, 'homepage_visitor', '157.38.60.13', '2023-10-08'),
(790, 'homepage_visitor', '136.226.250.113', '2023-10-08'),
(791, 'homepage_visitor', '2402:e280:2313:192:481b:486e:73:c5a2', '2023-10-08'),
(792, 'homepage_visitor', '2409:40d4:fe:5dbb:7069:caff:fe3d:1cb8', '2023-10-08'),
(793, 'homepage_visitor', '110.235.229.87', '2023-10-08'),
(794, 'homepage_visitor', '103.87.58.188', '2023-10-08'),
(795, 'homepage_visitor', '110.235.229.156', '2023-10-09'),
(796, 'homepage_visitor', '149.56.160.206', '2023-10-09'),
(797, 'homepage_visitor', '2409:4085:1e04:5d9c::d7cb:a20b', '2023-10-09'),
(798, 'homepage_visitor', '2402:3a80:402d:5708:7adc:728a:6bef:5ddf', '2023-10-09'),
(799, 'homepage_visitor', '2409:4085:2e07:c419::e34a:850e', '2023-10-09'),
(800, 'homepage_visitor', '183.83.54.207', '2023-10-09'),
(801, 'homepage_visitor', '2409:40d4:101f:bddd:746d:f13d:9096:8137', '2023-10-09'),
(802, 'homepage_visitor', '2409:4085:1e98:b5e4::dc8a:2b0e', '2023-10-09'),
(803, 'homepage_visitor', '104.200.18.205', '2023-10-10'),
(804, 'homepage_visitor', '2405:201:5c07:10a:75d8:93a6:ed98:1532', '2023-10-10'),
(805, 'homepage_visitor', '2409:4052:4e1b:36e1::9e8b:6e10', '2023-10-10'),
(806, 'homepage_visitor', '2a02:26f7:d6c4:6807:0:d6f4:5f09:b361', '2023-10-10'),
(807, 'homepage_visitor', '2405:201:5c07:10a:d149:8f0:534:ca51', '2023-10-10'),
(808, 'homepage_visitor', '2405:201:5c07:10a:3181:1f61:72ee:a369', '2023-10-10'),
(809, 'homepage_visitor', '2a02:26f7:d6c0:6807:0:bbc4:779f:b95a', '2023-10-10'),
(810, 'homepage_visitor', '2409:4052:4e93:1d9d::7609:114', '2023-10-10'),
(811, 'homepage_visitor', '2405:201:5c07:fd:880e:39a5:b6e1:f6b8', '2023-10-11'),
(812, 'homepage_visitor', '192.178.10.102', '2023-10-11'),
(813, 'homepage_visitor', '2405:201:5c07:fd:39a7:3454:8291:f1af', '2023-10-11'),
(814, 'homepage_visitor', '2405:201:5c07:fd:cc87:ed22:b34a:4402', '2023-10-11'),
(815, 'homepage_visitor', '66.249.82.235', '2023-10-11'),
(816, 'homepage_visitor', '2402:3a80:a36:876a:0:6a:bbac:7801', '2023-10-11'),
(817, 'homepage_visitor', '2405:201:5c07:fd:a4ad:3290:b7f0:5b1a', '2023-10-12'),
(818, 'homepage_visitor', '65.154.226.170', '2023-10-12'),
(819, 'homepage_visitor', '152.39.209.206', '2023-10-12'),
(820, 'homepage_visitor', '206.204.31.3', '2023-10-12'),
(821, 'homepage_visitor', '180.149.9.102', '2023-10-12'),
(822, 'homepage_visitor', '2402:3a80:a12:adbe:0:67:2c65:9801', '2023-10-12'),
(823, 'homepage_visitor', '2402:3a80:a12:adbe:dd05:dc9f:8547:e685', '2023-10-12'),
(824, 'homepage_visitor', '2402:3a80:a49:eafb:0:45:ae98:2a01', '2023-10-13'),
(825, 'homepage_visitor', '205.169.39.163', '2023-10-13'),
(826, 'homepage_visitor', '2405:201:5c07:fd:74f8:4a5c:85a7:d352', '2023-10-13'),
(827, 'homepage_visitor', '2405:201:5c07:fd:15ed:8fa:b7ac:63b3', '2023-10-13'),
(828, 'homepage_visitor', '110.226.162.64', '2023-10-13'),
(829, 'homepage_visitor', '115.99.2.164', '2023-10-13'),
(830, 'homepage_visitor', '2405:201:5c07:10a:991b:7293:822f:fe68', '2023-10-14'),
(831, 'homepage_visitor', '2405:201:5c07:10a:614d:a6f3:9ea3:6fc9', '2023-10-14'),
(832, 'homepage_visitor', '162.223.122.98', '2023-10-15'),
(833, 'homepage_visitor', '37.123.187.232', '2023-10-16'),
(834, 'homepage_visitor', '2405:201:5c07:1a4:70ec:b8fc:2aa8:cbca', '2023-10-16'),
(835, 'homepage_visitor', '203.88.135.90', '2023-10-16'),
(836, 'homepage_visitor', '117.97.174.31', '2023-10-17'),
(837, 'homepage_visitor', '2401:4900:45ed:c7d3:c4bc:372c:40be:8d04', '2023-10-17'),
(838, 'homepage_visitor', '66.249.70.97', '2023-10-17'),
(839, 'homepage_visitor', '54.174.53.199', '2023-10-18'),
(840, 'homepage_visitor', '3.91.63.113', '2023-10-18'),
(841, 'homepage_visitor', '54.174.53.127', '2023-10-18'),
(842, 'homepage_visitor', '2405:201:5c07:1a4:5d48:3182:a5d9:8d8c', '2023-10-18'),
(843, 'homepage_visitor', '2405:201:5c07:1a4:f022:d005:2436:49d3', '2023-10-18'),
(844, 'homepage_visitor', '2405:201:5c07:1a4:1c75:252f:f441:829e', '2023-10-18'),
(845, 'homepage_visitor', '103.146.217.8', '2023-10-19'),
(846, 'homepage_visitor', '136.226.250.100', '2023-10-19'),
(847, 'homepage_visitor', '2401:4900:3fcf:3089:5978:3286:741f:4eca', '2023-10-22'),
(848, 'homepage_visitor', '136.226.250.106', '2023-10-23'),
(849, 'homepage_visitor', '66.249.70.96', '2023-10-24'),
(850, 'homepage_visitor', '66.249.70.71', '2023-10-24'),
(851, 'homepage_visitor', '66.249.64.131', '2023-10-25'),
(852, 'homepage_visitor', '66.249.64.132', '2023-10-25'),
(853, 'homepage_visitor', '27.109.18.26', '2023-10-25'),
(854, 'homepage_visitor', '2401:4900:5dd0:ca7d:0:1d:dcaf:4701', '2023-10-25'),
(855, 'homepage_visitor', '2405:204:128c:fd87:31f9:54fc:fc:ad75', '2023-10-26'),
(856, 'homepage_visitor', '2401:4900:1c33:1194:94cf:da9f:c85d:302a', '2023-10-26'),
(857, 'homepage_visitor', '136.226.250.118', '2023-10-27'),
(858, 'homepage_visitor', '40.94.95.85', '2023-10-27'),
(859, 'homepage_visitor', '103.220.209.93', '2023-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `webina_email`
--

CREATE TABLE `webina_email` (
  `id` int(11) NOT NULL,
  `email_to` mediumtext NOT NULL,
  `email_from` varchar(200) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_message` mediumtext NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_email`
--

INSERT INTO `webina_email` (`id`, `email_to`, `email_from`, `email_subject`, `email_message`, `create_date`) VALUES
(3, 'mofijul007@yahoo.com', 'register@snakeinvest.in', 'hello Mofijul', '<div id=\"mail_sign\">Hi Mofijul,&nbsp;</div><div id=\"mail_sign\">Good Afternoon! I am writing this email from admin panel<br><br><br><div class=\"pre\"><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong>Regards</strong></span></p><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong>Investment</strong></span></p><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong></strong></span></p><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong>Website</strong>: <a style=\"color: #999999;\" href=\"http://localhost/invest_web/\">http://localhost/invest_web/</a></span></p><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong>Phone</strong>: <span style=\"font-family: arial, helvetica, sans-serif;\"><a href=\"tel:+91 89622 97148\" style=\"color: #999999;\">+91 89622 97148</a> / <a href=\"tel:+91 89622 97148\" style=\"color: #999999;\">+91 89622 97148</a></span></span></p><p><span style=\"font-family: georgia, palatino, serif; color: #999999;\"><strong>Email</strong>: <a style=\"color: #999999;\" href=\"mailto:register@snakeinvest.in\">register@snakeinvest.in</a></span></p><p><img src=\"http://localhost/invest_web//viewer_assets/images/logo.png\" style=\"width:150px;\"></p></div></div>', '2023-03-16 08:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `webina_email_list`
--

CREATE TABLE `webina_email_list` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_email_list`
--

INSERT INTO `webina_email_list` (`id`, `email`, `create_date`) VALUES
(1, 'info@aaradhayatravels.com', '0000-00-00 00:00:00'),
(2, 'support@aaradhayatravels.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webina_faq`
--

CREATE TABLE `webina_faq` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(1) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_faq`
--

INSERT INTO `webina_faq` (`id`, `title`, `name`, `description`, `status`, `create_by`, `create_date`, `edit_by`, `edit_date`) VALUES
(2, 'What-is-CrossBorderShoppe', 'What is Aaradhaya Travels?', 'Aaradhaya Travels helps you rent a vehicle from the best operators in your city.', 1, 2, '2022-12-23 15:48:39', 0, NULL),
(3, 'Do I need to register on Aaradhaya Travels website to book a cab online?', 'Do I need to register on Aaradhaya Travels website to book a cab online?', 'No, you can successfully book the cab without registering on our website.', 1, 2, '2022-12-23 15:50:11', 0, NULL),
(4, 'I-dont-need-shopping-and-consolidation-services-can-you-create-shipping-label-for-me', 'How does it work?', 'We ask you a few simple questions regarding your trip. We work with the best operators in your city to get you detailed quotations so that you get the best deal.', 1, 2, '2022-12-23 15:51:00', 0, NULL),
(5, 'Can-you-pickup-packages-from-my-home-in-India', 'What if the cab doesn\'t show up?', 'If the vehicle you booked does not arrive, we will immediately issue a complete refund.', 1, 2, '2022-12-24 13:54:15', 0, NULL),
(27, 'What-is-CrossBorderShoppe', 'What happens if the vehicle breaks down?', 'Since we work with the best operators, the vehicles are usually reliable. In case of a breakdown, it is the operator\'s responsibility to replace the vehicle during the journey.', 1, 2, '2022-12-23 15:48:39', 0, NULL),
(28, 'Do I need to register on Aaradhaya Travels website to book a cab online?', 'How are the Kilometers calculated?', 'The \'Kilometers\' are calculated based on the return trip distance between the boarding point and the destination. Any additional distance covered within the city between the Garage and the pickup point is also included in it.', 1, 2, '2022-12-23 15:50:11', 0, NULL),
(29, 'I-dont-need-shopping-and-consolidation-services-can-you-create-shipping-label-for-me', 'Can I book a cab without credit/card or net banking option?', 'Yes, other payment options available are UPI(gpay, phone available) wallets (paytm,amazon pay), debit card.', 1, 2, '2022-12-23 15:51:00', 0, NULL),
(32, 'I-dont-need-shopping-and-consolidation-services-can-you-create-shipping-label-for-me', 'Whom do I contact if I have additional questions?', 'You can write to us at aaradhayatravels@redbus.in. Alternatively, you can request a call back by clicking on the \'Request a Callback\' button on any of the quotes you\'ve received. One of our customer service executives will reach out to you.', 1, 2, '2022-12-23 15:51:00', 0, NULL),
(34, 'Can-you-pickup-packages-from-my-home-in-India', 'What if I need to cancel my trip?', 'The cancellation policy is specific to each operator and is listed against the quotes on the quotations page.', 1, 2, '2022-12-24 13:54:15', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webina_page`
--

CREATE TABLE `webina_page` (
  `id` int(11) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_des` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webina_review`
--

CREATE TABLE `webina_review` (
  `id` int(11) NOT NULL,
  `ref_name` varchar(100) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `review` int(1) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `position` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_review`
--

INSERT INTO `webina_review` (`id`, `ref_name`, `ref_id`, `name`, `location`, `img`, `designation`, `phone`, `email`, `review`, `message`, `ip_address`, `position`, `status`, `create_by`, `create_date`, `edit_by`, `edit_date`) VALUES
(1, 'testimonial', 'testimonial', 'Naveen G', 'India', '', '', '', '', 5, 'D. We arranged a cab for our travels in Jaipur. The response by the company was prompt and efficient. The cab driver who accompanied us our journey was knowledgeable and courteous. While we could not take our valuables into our meeting place, he also took care of it in our absence. Was extremely happy to find a reliable, professional travel service in a new place. Thank you so much Aradhaya Travels.', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 4, 1, 2, '2022-11-14 00:00:00', 2, '2023-07-26 19:54:57'),
(2, 'testimonial', 'testimonial', 'Tushaar B', 'India', '', '', '', '', 4, 'We had great trip. Our driver Mr. Khan was very co-operative during our Rajasthan trip spanning 5 days in our custom itinerary.', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 3, 1, 2, '2022-12-12 00:00:00', 2, '2023-07-26 19:53:49'),
(3, 'testimonial', 'testimonial', 'Ira A', 'India', '', '', '', '', 5, 'At the end of my India-travel I was spending three days alone in Delhi. Being an European young woman, I have to say I was a bit nervous. But I had no reason to be when I had such an amazing driver Mr. Patel who drove me to Agra and sightseen in Delhi. He is always on time, fluent in English, a good driver, and has impressive knowledge about the city. I really recommend using Aradhaya Travels.', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 2, 1, 2, '2022-11-16 00:00:00', 2, '2023-07-26 19:52:45'),
(4, 'testimonial', 'testimonial', 'Pankaj S', 'India', '', '', '', '', 5, 'It was a wonderful experience especially after we used this service after covid .. The safety and hygiene levels were good and very prompt service.', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 1, 1, 2, '2022-12-14 00:00:00', 2, '2023-07-26 19:51:47'),
(5, 'testimonial', 'testimonial', 'Ashok T', 'India', '', '', '', '', 4, 'Trip was great! We did a lot in the first two weeks (8 cities) which was coordinated through Aradhaya Travels. And thanks to our driver, everything went smoothly the entire time. We could not have gotten a better driver. He was amazing! A true gentleman too. We will miss him. I give him the highest of marks and would recommend him to everyone!', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 5, 1, 2, '2023-07-26 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'testimonial', 'testimonial', 'Shawn V', 'India', '', '', '', '', 3, 'We booked Aaradhaya Taxi for 7 in India and I was very impressed with driver knowledge and great communications. We had a very bad experience with Uber dropping us in an unsafe area so as two women traveling alone we felt much more secure with a driver always waiting for us.', '2409:4060:219c:780e:74b5:9157:8b6e:edf8', 6, 1, 2, '2023-07-14 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webina_total_visitor`
--

CREATE TABLE `webina_total_visitor` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_total_visitor`
--

INSERT INTO `webina_total_visitor` (`id`, `ref_id`, `total_count`) VALUES
(1, 'homepage_visitor', 1035);

-- --------------------------------------------------------

--
-- Table structure for table `webina_user`
--

CREATE TABLE `webina_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_code` varchar(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `institute_name` varchar(150) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `bank_ifsc` varchar(20) NOT NULL,
  `bank_account` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `password` varchar(60) NOT NULL,
  `img` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `aadhaar_no` varchar(20) NOT NULL,
  `aadhaar_img` varchar(20) NOT NULL,
  `reffer_code` varchar(20) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_user`
--

INSERT INTO `webina_user` (`id`, `name`, `gender`, `country`, `country_id`, `state`, `state_id`, `city`, `city_id`, `pincode`, `address`, `phone_code`, `phone`, `email`, `institute_name`, `occupation`, `father_name`, `bank_name`, `bank_branch`, `bank_ifsc`, `bank_account`, `status`, `password`, `img`, `dob`, `aadhaar_no`, `aadhaar_img`, `reffer_code`, `create_by`, `create_date`, `update_date`) VALUES
(1, 'Mofijul Hasan Ali.', 'male', 'India', 101, 'West Bengal', 4853, 'Kolkata', 142001, '76040', 'Colonial Lane, Euless', '', '001', '001@yahoo.com', 'Derozio Memorial College', 'Self-Employeed', 'M', 'SBI', 'Rajarhat', 'SBOI645488', '1236547890055', 1, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1689178112.png', '0000-00-00', '007', '1679043201.jpeg', '001', 0, '2022-07-14 10:37:19', '2023-07-12 21:38:18'),
(21, 'navdeep sharma', '', 'India', 101, 'Madhya Pradesh', 4039, 'Bhopal', 57995, '', '', '', '9074463256', 'navdeep9sharma@gmail.com', '', 'Self-Employeed', 'mr. ghanshyam sharma', 'icici bank', 'lalghati bhopal', 'icic0001189', '118901513778', 1, 'f087b9ea3e9e4a694e4808eb0b79490fd4f4da89', '1679924478.jpg', '1995-07-11', '858170512516', '1679287945.JPG', '', 0, '2023-03-15 17:09:33', '2023-03-27 19:11:33'),
(22, 'Hello', '', 'India', 101, 'West Bengal', 4853, 'Kolkata', 142001, '', '', '', '9073721920', 'rudrasif@yahoo.com', '', 'Job', 'Asif\'s Father', '', '', '', '', 1, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1679561978.jpg', '1999-01-01', '00000000000', '1679557480.jpeg', '', 1, '2023-03-23 11:44:52', '2023-03-23 13:44:30'),
(23, 'Sachin Singh Gurjar', '', 'Australia', 14, 'South Australia', 3904, 'Adelaide', 3919, '', '', '', '9131502780', 'sachin808535@gmail.com', '', 'Self-Employeed', 'Bharat Singh Gurjar', '', '', '', '', 1, '8104ba1dc0409b259f487ed07db477c38f205a30', '1679936387.jpeg', '1996-05-13', '771385008024', '', '', 0, '2023-03-27 22:24:59', '2023-03-28 21:15:02'),
(24, 'Karan sharma', '', '', 0, '', 0, '', 0, '', '', '', '9755196956', 'karansharmaj87@gmail.com', '', '', '', '', '', '', '', 1, '035429b7353daa71f6f5eba7a2e28e687fae2567', '', '1996-06-17', '538158699801', '', '', 0, '2023-03-28 21:10:41', '0000-00-00 00:00:00'),
(25, 'Divya parwal ', '', '', 0, '', 0, '', 0, '', '', '', '9001881610', 'divyakabra.91@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689217077', 0, '2023-07-13 08:27:57', '0000-00-00 00:00:00'),
(26, 'ASHOK GARG', '', '', 0, '', 0, '', 0, '', '', '', '9928213617', 'ashokpreetykota@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689217745', 0, '2023-07-13 08:39:05', '0000-00-00 00:00:00'),
(27, 'ANIL', '', '', 0, '', 0, '', 0, '', '', '', '9950384994', 'KHANDELWALEMITRAKOTA@GMAIL.COM', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689221307', 0, '2023-07-13 09:38:27', '0000-00-00 00:00:00'),
(28, 'yajat singh', '', '', 0, '', 0, '', 0, '', '', '', '09704504298', 'chandel.yajat@phonepe.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689317230', 0, '2023-07-14 12:17:10', '0000-00-00 00:00:00'),
(29, 'yajat singh', '', '', 0, '', 0, '', 0, '', '', '', '09704504298', 'chandel.yajat@phonepe.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689583573', 0, '2023-07-17 14:16:13', '0000-00-00 00:00:00'),
(30, 'ANIL', '', '', 0, '', 0, '', 0, '', '', '', '8306971519', 'gagannatani@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689678696', 0, '2023-07-18 16:41:36', '0000-00-00 00:00:00'),
(31, 'Mayuresh Choudhary', '', '', 0, '', 0, '', 0, '', '', '', '7972334338', 'mydemo20052022@gmail.com', '', '', '', '', '', '', '', 1, '29a2404cefe5422a893838390e271e0b70eb634c', '', '0000-00-00', '', '', '1689737898', 0, '2023-07-19 09:08:18', '0000-00-00 00:00:00'),
(32, 'Jay', '', '', 0, '', 0, '', 0, '', '', '', '895864589', 'jay@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689764412', 0, '2023-07-19 16:30:12', '0000-00-00 00:00:00'),
(33, 'dsag', '', '', 0, '', 0, '', 0, '', '', '', '7220910534', 'Nidhi.Khandelwal@in.ey.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689839405', 0, '2023-07-20 13:20:05', '0000-00-00 00:00:00'),
(34, 'Divya parwal ', '', '', 0, '', 0, '', 0, '', '', '', '9001881610', 'divyaa.parwal@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689936573', 0, '2023-07-21 16:19:33', '0000-00-00 00:00:00'),
(35, 'MOfijul', '', '', 0, '', 0, '', 0, '', '', '', '002', '002@yahoo.com', '', '', '', '', '', '', '', 1, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '0000-00-00', '', '', '1689936865', 0, '2023-07-21 16:24:25', '0000-00-00 00:00:00'),
(36, 'Divya parwal ', '', '', 0, '', 0, '', 0, '', '', '', '9001881610', 'divyaa.parwal@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689937239', 0, '2023-07-21 16:30:39', '0000-00-00 00:00:00'),
(37, 'Asif Ali', '', '', 0, '', 0, '', 0, '', '', '', '09073721920', 'rudrasif@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1689937651', 0, '2023-07-21 16:37:31', '0000-00-00 00:00:00'),
(38, 'GAGAN', '', '', 0, '', 0, '', 0, '', '', '', '8306971519', 'gagannatani@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1690008380', 0, '2023-07-22 12:16:20', '0000-00-00 00:00:00'),
(39, 'vivek', '', '', 0, '', 0, '', 0, '', '', '', '9928761299', 'vivek@gmai.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1690203269', 0, '2023-07-24 18:24:29', '0000-00-00 00:00:00'),
(40, 'VICKY JAIN', '', '', 0, '', 0, '', 0, '', '', '', '9694317351', 'vickyjain248@gmail.com', '', '', '', '', '', '', '', 1, '839ac7f89b5fce7369ec06b151fba842643ee599', '', '0000-00-00', '', '', '1690203393', 0, '2023-07-24 18:26:33', '0000-00-00 00:00:00'),
(41, 'GHGVHFGJFGJFG', '', '', 0, '', 0, '', 0, '', '', '', '11111', 'HJJJHJGHKGK', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1690462248', 0, '2023-07-27 18:20:48', '0000-00-00 00:00:00'),
(42, 'yogesh', '', '', 0, '', 0, '', 0, '', '', '', '9460079222', 'harshik222@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1690885873', 0, '2023-08-01 16:01:13', '0000-00-00 00:00:00'),
(43, 'gagan', '', '', 0, '', 0, '', 0, '', '', '', '8306971519', 'gagannatani@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1691501190', 0, '2023-08-08 18:56:30', '0000-00-00 00:00:00'),
(44, 'Rajendra', '', '', 0, '', 0, '', 0, '', '', '', '9950384994', 'khandelwalemitrakota@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1691890884', 0, '2023-08-13 07:11:24', '0000-00-00 00:00:00'),
(45, 'sonu', '', '', 0, '', 0, '', 0, '', '', '', '8619631998', 'sunu@gmail.cm', '', '', '', '', '', '', '', 1, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '0000-00-00', '', '', '1692692951', 0, '2023-08-22 13:59:11', '0000-00-00 00:00:00'),
(46, 'Mofijul', '', '', 0, '', 0, '', 0, '', '', '', '9123989009', 'mofijul007@yahoo.com', '', '', '', '', '', '', '', 1, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '0000-00-00', '', '', '1692699590', 0, '2023-08-22 15:49:50', '0000-00-00 00:00:00'),
(47, 'MAHESH KUMAR KHANDELWAL', '', '', 0, '', 0, '', 0, '', '', '', '9460518611', 'MAHESH7876@GMAIL.COM', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1692955940', 0, '2023-08-25 15:02:20', '0000-00-00 00:00:00'),
(48, 'GAGAN NATANI', '', '', 0, '', 0, '', 0, '', '', '', '8306971519', 'gagannatani@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1692962572', 0, '2023-08-25 16:52:52', '0000-00-00 00:00:00'),
(49, 'Kapil', '', '', 0, '', 0, '', 0, '', '', '', '7976876596', 'kapilkh.19@gmail.com', '', '', '', '', '', '', '', 1, '7aba76bbe5f0f08d81ff1a88247a78bc8eda9356', '', '0000-00-00', '', '', '1693030028', 0, '2023-08-26 11:37:08', '0000-00-00 00:00:00'),
(50, 'Sarita Singh', '', '', 0, '', 0, '', 0, '', '', '', '9519825924', '34vss34@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1693205278', 0, '2023-08-28 12:17:58', '0000-00-00 00:00:00'),
(51, 'Hema vardhan ', '', '', 0, '', 0, '', 0, '', '', '', '8219455954', 'vardhanhemablp1@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1694155340', 0, '2023-09-08 12:12:20', '0000-00-00 00:00:00'),
(52, 'Hema Vardhan', '', '', 0, '', 0, '', 0, '', '', '', '8219455954', 'vardhanhemablp1@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1694162146', 0, '2023-09-08 14:05:46', '0000-00-00 00:00:00'),
(53, 'rajesh prasad', '', '', 0, '', 0, '', 0, '', '', '', '8191819993', 'rajesh_ashok2000@yahoo.co.in', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1694164694', 0, '2023-09-08 14:48:14', '0000-00-00 00:00:00'),
(54, 'Akash', '', '', 0, '', 0, '', 0, '', '', '', '7082073022', 'singhakash.101998@gmail.com', '', '', '', '', '', '', '', 1, '134ee4c9c17ae4c51dca7b03bcb2a8498c8ba36c', '', '0000-00-00', '', '', '1694191725', 0, '2023-09-08 22:18:45', '0000-00-00 00:00:00'),
(55, 'werewr', '', '', 0, '', 0, '', 0, '', '', '', '234324324', 'werew@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1694240318', 0, '2023-09-09 11:48:38', '0000-00-00 00:00:00'),
(56, 'tsrtgs', '', '', 0, '', 0, '', 0, '', '', '', '0552624530', 'ha_a@uotlook.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1695846722', 0, '2023-09-28 02:02:02', '0000-00-00 00:00:00'),
(57, 'hamed', '', '', 0, '', 0, '', 0, '', '', '', '0552624530', 'haa@uotlook.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1695912753', 0, '2023-09-28 20:22:33', '0000-00-00 00:00:00'),
(58, 'Yusuf', '', '', 0, '', 0, '', 0, '', '', '', '8856820652', 'yusufshaikh7008@gmail.com', '', '', '', '', '', '', '', 1, 'b476bf81768aa2fd5d7b1ec012f3acc0a86c8579', '', '0000-00-00', '', '', '1696571424', 0, '2023-10-06 11:20:24', '0000-00-00 00:00:00'),
(59, 'MD SAMIM', '', '', 0, '', 0, '', 0, '', '', '', '9836574829', 'samimgolder@gmail.com', '', '', '', '', '', '', '', 1, '211975037b3e41fab9418b0b92db6231ee789cbd', '', '0000-00-00', '', '', '1697132802', 0, '2023-10-12 23:16:42', '0000-00-00 00:00:00'),
(60, 'Gagan', '', '', 0, '', 0, '', 0, '', '', '', '9950384994', 'gagannatani@gmaim.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1697200985', 0, '2023-10-13 18:13:05', '0000-00-00 00:00:00'),
(61, 'ABBBB', '', '', 0, '', 0, '', 0, '', '', '', '1234567891', 'ABC@GMAIL.COM', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1697201539', 0, '2023-10-13 18:22:19', '0000-00-00 00:00:00'),
(62, 'Abc', '', '', 0, '', 0, '', 0, '', '', '', '1234567890', 'abc@gmail com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1697202448', 0, '2023-10-13 18:37:28', '0000-00-00 00:00:00'),
(63, 'USHA PAREEK', '', '', 0, '', 0, '', 0, '', '', '', '9414670490', 'sauhardpareek22@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1697776782', 0, '2023-10-20 10:09:42', '0000-00-00 00:00:00'),
(64, 'alpha', '', '', 0, '', 0, '', 0, '', '', '', '09999999999', 'alpha123@gmail.com', '', '', '', '', '', '', '', 1, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '0000-00-00', '', '', '1698402968', 0, '2023-10-27 16:06:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webina_user_booking`
--

CREATE TABLE `webina_user_booking` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_pickup` varchar(255) NOT NULL,
  `to_drop` varchar(255) NOT NULL,
  `from_postcode` varchar(10) NOT NULL,
  `from_city` varchar(50) NOT NULL,
  `from_state` varchar(50) NOT NULL,
  `from_country` varchar(50) NOT NULL,
  `to_postcode` varchar(10) NOT NULL,
  `to_city` varchar(50) NOT NULL,
  `to_state` varchar(50) NOT NULL,
  `to_country` varchar(50) NOT NULL,
  `pickup_date` varchar(20) NOT NULL,
  `pickup_time` varchar(20) NOT NULL,
  `drop_date` varchar(20) NOT NULL,
  `drop_time` varchar(20) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `tran_id` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `cancel_reason` varchar(200) NOT NULL,
  `cancel_status` varchar(20) NOT NULL,
  `cancel_amount` decimal(10,2) NOT NULL,
  `cancel_tran_id` varchar(30) NOT NULL,
  `cancel_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_user_booking`
--

INSERT INTO `webina_user_booking` (`id`, `vehicle_id`, `service_id`, `user_id`, `from_pickup`, `to_drop`, `from_postcode`, `from_city`, `from_state`, `from_country`, `to_postcode`, `to_city`, `to_state`, `to_country`, `pickup_date`, `pickup_time`, `drop_date`, `drop_time`, `total_amount`, `paid_amount`, `tran_id`, `status`, `create_date`, `cancel_reason`, `cancel_status`, `cancel_amount`, `cancel_tran_id`, `cancel_date`) VALUES
(1, 6, 26, 1, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Lauhati Jama Masjid, SRCM Road, Vedic Village, Lauhati, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700135', 'Lauhati', 'WB', 'India', '2023-07-14', '15:24:00', '', '', '114.00', '34.20', 'TRAN1689162873', 'pending', '2023-07-12 17:24:33', '', '', '0.00', '', '0000-00-00 00:00:00'),
(2, 6, 26, 25, 'Jaipur Railway Station, Ajmer Road, Civil Lines, Jaipur, Rajasthan, India', 'Bhilwara rajasthan, Basant Vihar Colony, Santosh Colony, Bhilwara, Madhya Pradesh, India', '', '', '', '', '311001', 'Bhilwara', 'Madhya Pradesh', 'India', '2023-07-14', '08:27:00', '', '', '4960.00', '1488.00', 'TRAN1689217077', 'pending', '2023-07-13 08:27:57', '', '', '0.00', '', '0000-00-00 00:00:00'),
(3, 5, 16, 26, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302029', 'Jaipur', 'RJ', 'India', '2023-07-13', '10:38:00', '', '', '3458.00', '1037.40', 'TRAN1689217745', 'pending', '2023-07-13 08:39:05', '', '', '0.00', '', '0000-00-00 00:00:00'),
(4, 5, 16, 26, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302029', 'Jaipur', 'RJ', 'India', '2023-07-13', '10:38', '', '', '3458.00', '3458.00', 'TRAN1689217763', 'pending', '2023-07-13 08:39:23', '', '', '0.00', '', '0000-00-00 00:00:00'),
(5, 5, 19, 27, 'khandelwal mobile, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'SRD Modi College For Women, Dadabari, Kota, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '324009', 'Kota', 'RJ', 'India', '2023-07-13', '10:37:00', '', '', '499.00', '149.70', 'TRAN1689221307', 'success', '2023-07-13 09:38:27', '', '', '0.00', '', '0000-00-00 00:00:00'),
(6, 5, 16, 25, 'Jaipur Railway Station, Ajmer Road, Civil Lines, Jaipur, Rajasthan, India', 'Bhilwara rajasthan, Basant Vihar Colony, Santosh Colony, Bhilwara, Madhya Pradesh, India', '', '', '', '', '311001', 'Bhilwara', 'Madhya Pradesh', 'India', '2023-07-14', '08:27:00', '', '', '3472.00', '1041.60', 'TRAN1689227223', 'pending', '2023-07-13 11:17:03', '', '', '0.00', '', '0000-00-00 00:00:00'),
(7, 5, 16, 28, 'Delhi Cantt Railway Station, Jail Road, Nangal Village, Delhi Cantonment, New Delhi, Delhi, India', 'Nizamuddin Dargah Sharif, Nizamuddin, Nizammudin West Slum, Aulia, New Delhi, Delhi, India', '110010', 'New Delhi', 'DL', 'India', '110013', 'New Delhi', 'DL', 'India', '2023-07-15', '15:19:00', '', '', '274.40', '82.32', 'TRAN1689317230_28', 'pending', '2023-07-14 12:17:10', '', '', '0.00', '', '0000-00-00 00:00:00'),
(8, 5, 16, 29, 'India Gate, Kartavya Path, India Gate, New Delhi, Delhi, India', 'Nizamuddin Dargah Sharif, Nizamuddin, Nizammudin West Slum, Aulia, New Delhi, Delhi, India', '110001', 'New Delhi', 'DL', 'India', '110013', 'New Delhi', 'DL', 'India', '2023-07-19', '17:18:00', '', '', '58.80', '58.80', 'TRAN1689583573_29', 'pending', '2023-07-17 14:16:13', '', '', '0.00', '', '0000-00-00 00:00:00'),
(9, 5, 19, 30, 'khandelwal mobile, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'Teen Batti Circle, Basant Vihar, Dadabari, Kota, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '324009', 'Kota', 'RJ', 'India', '2023-07-18', '17:41:00', '', '', '499.00', '149.70', 'TRAN1689678696_30', 'success', '2023-07-18 16:41:36', '', '', '0.00', '', '0000-00-00 00:00:00'),
(10, 5, 16, 32, 'Pune Railway Station, Agarkar Nagar, Pune, Maharashtra, India', 'Dhule, Chalisgaon Road, Jalgaon Janata Bank Colony, Mulla Nagar, Dhule, Maharashtra, India', '411001', 'Pune', 'MH', 'India', '424006', 'Dhule', 'MH', 'India', '2023-07-20', '17:26:00', '', '', '4900.00', '1470.00', 'TRAN1689764412_32', 'pending', '2023-07-19 16:30:12', '', '', '0.00', '', '0000-00-00 00:00:00'),
(11, 5, 16, 33, 'KOTA RAJASTHAN, JUNCTION, New Railway Colony, Dadwara, Kota, Rajasthan, India', 'Jaipur Railway Station, Ajmer Road, Civil Lines, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302006', 'Jaipur', 'RJ', 'India', '2023-07-21', '14:18:00', '', '', '3556.00', '1066.80', 'TRAN1689839405_33', 'pending', '2023-07-20 13:20:05', '', '', '0.00', '', '0000-00-00 00:00:00'),
(12, 5, 19, 34, 'Kanwatiya Hospital, near Kanwatiya Hospital, Shastri Nagar, Jaipur, Rajasthan, India', 'JAIPUR KA BAZAR, Subash Nagar, Subhash Nagar, Jaipur, Rajasthan, India', '302016', 'Jaipur', 'RJ', 'India', '302016', 'Jaipur', 'RJ', 'India', '2023-07-22', '16:17:00', '', '', '499.00', '149.70', 'TRAN1689936573_34', 'pending', '2023-07-21 16:19:33', '', '', '0.00', '', '0000-00-00 00:00:00'),
(13, 5, 16, 35, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Kolkata airport arrival, International Airport, Motilal Colony, Rajbari, Dum Dum, Calcutta, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700079', 'Kolkata', 'WB', 'India', '2023-07-22', '07:23:00', '', '', '145.60', '43.68', 'TRAN1689936865_35', 'pending', '2023-07-21 16:24:25', '', '', '0.00', '', '0000-00-00 00:00:00'),
(14, 5, 16, 35, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Kolkata airport arrival, International Airport, Motilal Colony, Rajbari, Dum Dum, Calcutta, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700079', 'Kolkata', 'WB', 'India', '2023-07-22', '07:23:00', '', '', '145.60', '43.68', 'TRAN1689937041_35', 'pending', '2023-07-21 16:27:21', '', '', '0.00', '', '0000-00-00 00:00:00'),
(15, 5, 16, 36, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Kolkata airport arrival, International Airport, Motilal Colony, Rajbari, Dum Dum, Calcutta, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700079', 'Kolkata', 'WB', 'India', '2023-07-22', '07:23:00', '', '', '145.60', '43.68', 'TRAN1689937239_36', 'success', '2023-07-21 16:30:39', '', '', '0.00', '', '0000-00-00 00:00:00'),
(16, 5, 16, 37, 'Raigad Fort, Raigad, Maharashtra, India', 'Raigachi High School, Raigachi, Indira Nagar, Kolkata, West Bengal, India', '402305', 'Raigad', 'MH', 'India', '700135', 'Kolkata', 'WB', 'India', '2023-07-22', '18:37:00', '', '', '28154.00', '8446.20', 'TRAN1689937651_37', 'pending', '2023-07-21 16:37:31', '', '', '0.00', '', '0000-00-00 00:00:00'),
(17, 5, 19, 38, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '324002', 'Kota', 'RJ', 'India', '2023-07-22', '13:15:00', '', '', '499.00', '149.70', 'TRAN1690008380_38', 'success', '2023-07-22 12:16:20', '', '', '0.00', '', '0000-00-00 00:00:00'),
(18, 5, 19, 39, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '324002', 'Kota', 'RJ', 'India', '2023-07-25', '18:26:00', '', '', '499.00', '149.70', 'TRAN1690203269_39', 'pending', '2023-07-24 18:24:29', '', '', '0.00', '', '0000-00-00 00:00:00'),
(19, 5, 16, 41, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur Railway Station, Ajmer Road, Civil Lines, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302006', 'Jaipur', 'RJ', 'India', '2023-07-28', '06:19:00', '', '', '3556.00', '1066.80', 'TRAN1690462248_41', 'pending', '2023-07-27 18:20:48', '', '', '0.00', '', '0000-00-00 00:00:00'),
(20, 5, 16, 1, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Kolkata airport arrival, International Airport, Motilal Colony, Rajbari, Dum Dum, Calcutta, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700079', 'Kolkata', 'WB', 'India', '2023-08-02', '14:03', '', '', '145.60', '43.68', 'TRAN1690871669_1', 'pending', '2023-08-01 12:04:29', '', '', '0.00', '', '0000-00-00 00:00:00'),
(21, 5, 16, 42, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur Railway Station, Ajmer Road, Civil Lines, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302006', 'Jaipur', 'RJ', 'India', '2023-08-02', '04:00:00', '', '', '3570.00', '1071.00', 'TRAN1690885873_42', 'pending', '2023-08-01 16:01:13', '', '', '0.00', '', '0000-00-00 00:00:00'),
(22, 5, 19, 43, 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '324009', 'Kota', 'RJ', 'India', '2023-08-08', '19:56:00', '', '', '499.00', '149.70', 'TRAN1691501190_43', 'success', '2023-08-08 18:56:30', '', '', '0.00', '', '0000-00-00 00:00:00'),
(23, 5, 19, 44, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '324002', 'Kota', 'RJ', 'India', '2023-08-13', '22:38:00', '', '', '499.00', '149.70', 'TRAN1691890884_44', 'success', '2023-08-13 07:11:24', '', '', '0.00', '', '0000-00-00 00:00:00'),
(24, 5, 19, 45, 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '324009', 'Kota', 'RJ', 'India', '2023-08-22', '14:58:00', '', '', '499.00', '149.70', 'TRAN1692692951_45', 'success', '2023-08-22 13:59:11', 'Wrong Date or Time', 'canceled', '119.76', 'TRAN1692693266_45', '2023-08-22 14:04:26'),
(25, 5, 16, 46, 'Mofijul Hasan Ali - Web Designer & Developer, Rahmat Nagar, Raigachi, Raigachi seshmore, Kolkata, West Bengal, India', 'Dumdum Railway Station Platform, Majumder Pada, Motilal Colony, Dum Dum, North Dumdum, West Bengal, India', '700135', 'Kolkata', 'WB', 'India', '700030', 'North Dumdum', 'WB', 'India', '2023-08-23', '07:49:00', '', '', '236.60', '70.98', 'TRAN1692699590_46', 'success', '2023-08-22 15:49:50', 'Wrong Date or Time', 'canceled', '0.00', '', '2023-08-22 16:01:08'),
(26, 5, 19, 47, 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '324002', 'Kota', 'RJ', 'India', '2023-08-28', '02:00:00', '', '', '499.00', '149.70', 'TRAN1692955940_47', 'pending', '2023-08-25 15:02:20', '', '', '0.00', '', '0000-00-00 00:00:00'),
(27, 5, 19, 48, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '324002', 'Kota', 'RJ', 'India', '2023-08-26', '16:52:00', '', '', '499.00', '149.70', 'TRAN1692962572_48', 'success', '2023-08-25 16:52:52', 'Wrong Date or Time', 'canceled', '0.00', '', '2023-08-25 16:56:21'),
(28, 5, 16, 50, 'Mejorganj raebareli', 'Gomti nagarbLucknow', '', '', '', '', '', '', '', '', '2023-08-28', '13:55:00', '', '', '1000.80', '300.24', 'TRAN1693205278_50', 'pending', '2023-08-28 12:17:58', '', '', '0.00', '', '0000-00-00 00:00:00'),
(29, 5, 16, 50, 'Mejorganj raebareli', 'Gomti nagarbLucknow', '', '', '', '', '', '', '', '', '2023-08-28', '13:55:00', '', '', '1000.80', '300.24', 'TRAN1693205294_50', 'pending', '2023-08-28 12:18:14', '', '', '0.00', '', '0000-00-00 00:00:00'),
(30, 6, 26, 51, 'Mohali Bus Stand, Mohali Bypass, Phase 6, Sector 58, Sahibzada Ajit Singh Nagar, Punjab, India', 'Chandigarh University, Ludhiana - Chandigarh State Highway, Punjab, India', '160047', 'Sahibzada Ajit Singh Nagar', 'PB', 'India', '140413', '', 'PB', 'India', '2023-09-08', '07:35:00', '', '', '338.40', '101.52', 'TRAN1694155340_51', 'pending', '2023-09-08 12:12:20', '', '', '0.00', '', '0000-00-00 00:00:00'),
(31, 5, 16, 52, 'Mohali Bus Stand, Mohali Bypass, Phase 6, Sector 58, Sahibzada Ajit Singh Nagar, Punjab, India', 'Chandigarh University, Ludhiana - Chandigarh State Highway, Punjab, India', '160047', 'Sahibzada Ajit Singh Nagar', 'PB', 'India', '140413', '', 'PB', 'India', '2023-09-08', '17:04:00', '', '', '225.60', '67.68', 'TRAN1694162146_52', 'pending', '2023-09-08 14:05:46', '', '', '0.00', '', '0000-00-00 00:00:00'),
(32, 5, 16, 53, 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', 'Naya nohra Opp. modern school,Near Neelkanth Apartment, Borkhandi, Rajasthan, India', '302029', 'Jaipur', 'RJ', 'India', '325201', 'Borkhandi', 'RJ', 'India', '2023-09-12', '14:00:00', '', '', '2976.00', '892.80', 'TRAN1694164694_53', 'success', '2023-09-08 14:48:14', '', '', '0.00', '', '0000-00-00 00:00:00'),
(33, 5, 19, 54, 'Najafgarh Metro Station नजफगढ़ मेट्रो स्टेशन, Dharampura, Najafgarh, New Delhi, Delhi, India', 'Pune Railway Station, Agarkar Nagar, Pune, Maharashtra, India', '110043', 'New Delhi', 'DL', 'India', '411001', 'Pune', 'MH', 'India', '2023-09-08', '01:49:00', '', '', '20295.00', '6088.50', 'TRAN1694193419_54', 'pending', '2023-09-08 22:46:59', '', '', '0.00', '', '0000-00-00 00:00:00'),
(34, 5, 16, 55, 'Gatargi, Shahu Nagar, Vijayapura, Karnataka, India', 'Dagdusheth Halwai Ganpati Mandir, Chhatrapati Shivaji Maharaj Road, Mehunpura, Budhwar Peth, Pune, Maharashtra, India', '586101', 'Vijayapura', 'KA', 'India', '411002', 'Pune', 'MH', 'India', '2023-09-12', '13:48:00', '', '', '4212.00', '1263.60', 'TRAN1694240318_55', 'pending', '2023-09-09 11:48:38', '', '', '0.00', '', '0000-00-00 00:00:00'),
(35, 5, 18, 56, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Kolkata, West Bengal, India', 'Suti Police Station, Selimpur Road, Aurangabad, West Bengal, India', '700052', 'Kolkata', 'WB', 'India', '742201', 'Aurangabad', 'WB', 'India', '2023-09-29', '01:34:00', '', '', '3612.00', '1083.60', 'TRAN1695846722_56', 'pending', '2023-09-28 02:02:02', '', '', '0.00', '', '0000-00-00 00:00:00'),
(36, 8, 38, 57, 'Suti Police Station, Selimpur Road, Aurangabad, West Bengal, India', 'Ccu, Kolkata Airport Road, International Airport, Dum Dum, Kolkata, West Bengal, India', '742201', 'Aurangabad', 'WB', 'India', '700052', 'Kolkata', 'WB', 'India', '2023-10-04', '17:50:00', '', '', '5632.00', '1689.60', 'TRAN1695912753_57', 'pending', '2023-09-28 20:22:33', '', '', '0.00', '', '0000-00-00 00:00:00'),
(37, 5, 16, 58, 'Solapur University, Solapur, Maharashtra, India', 'Baner Hills, Pashan Hill Trail, Baner, Pune, Maharashtra, India', '413255', 'Solapur', 'MH', 'India', '411021', 'Pune', 'MH', 'India', '2023-10-06', '23:52:00', '', '', '3036.00', '910.80', 'TRAN1696571486_58', 'pending', '2023-10-06 11:21:26', '', '', '0.00', '', '0000-00-00 00:00:00'),
(38, 5, 18, 59, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Kolkata, West Bengal, India', 'City Centre Salt Lake, DC Block, Sector 1, Bidhannagar, Kolkata, West Bengal, India', '700052', 'Kolkata', 'WB', 'India', '700064', 'Kolkata', 'WB', 'India', '2023-10-13', '13:21:00', '', '', '126.00', '37.80', 'TRAN1697133512_59', 'pending', '2023-10-12 23:28:32', '', '', '0.00', '', '0000-00-00 00:00:00'),
(39, 4, 21, 60, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302029', 'Jaipur', 'RJ', 'India', '2023-10-14', '18:12:00', '', '', '3211.00', '963.30', 'TRAN1697200985_60', 'pending', '2023-10-13 18:13:05', '', '', '0.00', '', '0000-00-00 00:00:00'),
(40, 6, 26, 61, 'Kota junction, New Railway Colony, Railway Station Area, Kota, Rajasthan, India', 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', '324002', 'Kota', 'RJ', 'India', '302029', 'Jaipur', 'RJ', 'India', '2023-10-14', '07:21:00', '', '', '4446.00', '1333.80', 'TRAN1697201539_61', 'pending', '2023-10-13 18:22:19', '', '', '0.00', '', '0000-00-00 00:00:00'),
(41, 6, 26, 62, 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', '324009', 'Kota', 'RJ', 'India', '302029', 'Jaipur', 'RJ', 'India', '2023-10-15', '02:36:00', '', '', '4536.00', '1360.80', 'TRAN1697202448_62', 'pending', '2023-10-13 18:37:28', '', '', '0.00', '', '0000-00-00 00:00:00'),
(42, 5, 16, 63, 'Jaipur International Airport (JAI), Airport Road, Sanganer, Jaipur, Rajasthan, India', 'Basant vihar kota 8899, Basant Vihar, Dadabari, Kota, Rajasthan, India', '302029', 'Jaipur', 'RJ', 'India', '324009', 'Kota', 'RJ', 'India', '2023-11-24', '20:30:00', '', '', '3024.00', '907.20', 'TRAN1697776782_63', 'success', '2023-10-20 10:09:42', '', '', '0.00', '', '0000-00-00 00:00:00'),
(43, 5, 17, 64, 'Majestic Bus Stand, Kempegowda, Gandhi Nagar, Bengaluru, Karnataka, India', 'Narendra Modi Stadium, Stadium Road, Parvati Nagar, Motera, Ahmedabad, Gujarat, India', '560009', 'Bengaluru', 'KA', 'India', '380005', 'Ahmedabad', 'GJ', 'India', '2023-10-28', '21:02:00', '', '', '36072.00', '10821.60', 'TRAN1698402968_64', 'pending', '2023-10-27 16:06:08', '', '', '0.00', '', '0000-00-00 00:00:00'),
(44, 5, 17, 64, 'Majestic Bus Stand, Kempegowda, Gandhi Nagar, Bengaluru, Karnataka, India', 'Narendra Modi Stadium, Stadium Road, Parvati Nagar, Motera, Ahmedabad, Gujarat, India', '560009', 'Bengaluru', 'KA', 'India', '380005', 'Ahmedabad', 'GJ', 'India', '2023-10-28', '21:02', '', '', '36072.00', '10821.60', 'TRAN1698403436_64', 'pending', '2023-10-27 16:13:56', '', '', '0.00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webina_vehicle`
--

CREATE TABLE `webina_vehicle` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `seater` int(2) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `ac_nonac` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `main_img` varchar(50) NOT NULL,
  `other_img` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_vehicle`
--

INSERT INTO `webina_vehicle` (`id`, `type`, `name`, `brand`, `seater`, `fuel_type`, `ac_nonac`, `description`, `main_img`, `other_img`, `status`, `create_by`, `create_date`, `edit_by`, `edit_date`) VALUES
(4, 'Sedan', 'Dzire, Etios or similar', 'Maruti', 4, 'CNG/Diesel', 'AC', 'Spacious Car', 'main_img_1691823386_1.png', '', 1, 2, '2023-04-19 16:56:42', 2, '2023-08-26 12:32:49'),
(5, 'Hatchback', 'Swift', 'Maruti', 4, 'CNG/Diesel', 'AC', 'Compact car', 'main_img_1691823375_1.png', '', 1, 2, '2023-05-18 11:41:45', 2, '2023-08-25 11:48:40'),
(6, 'SUV', 'Ertiga or similar', 'Maruti', 5, 'CNG/Diesel', 'AC', 'Large Car', 'main_img_1691823362_1.png', '', 1, 2, '2023-05-31 10:15:41', 2, '2023-08-26 10:45:17'),
(7, 'SUV', 'Toyota Innova specific model', 'toyoto', 6, 'CNG/Diesel', 'AC', 'Large Car', 'main_img_1691823348_1.png', '', 1, 2, '2023-05-31 10:29:04', 2, '2023-08-12 12:25:51'),
(8, 'SUV', 'Innova Crysta specific model', 'innova', 6, 'CNG/Diesel', 'AC', 'Large Car', 'main_img_1691823269_1.png', '', 1, 2, '2023-05-31 10:30:09', 2, '2023-08-12 12:25:32'),
(9, 'Sedan', 'ajdol', '', 4, 'CNG/Diesel', 'Non-AC', 'compact', 'main_img_1685685292_1.png', '', 0, 2, '2023-06-02 11:24:52', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webina_vehicle_service`
--

CREATE TABLE `webina_vehicle_service` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `package_type` varchar(100) NOT NULL,
  `fare` decimal(10,2) NOT NULL,
  `extra_km` decimal(10,2) NOT NULL,
  `extra_hr` decimal(10,2) NOT NULL,
  `min_hr` decimal(10,2) NOT NULL,
  `min_km` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webina_vehicle_service`
--

INSERT INTO `webina_vehicle_service` (`id`, `vehicle_id`, `service_type`, `package_type`, `fare`, `extra_km`, `extra_hr`, `min_hr`, `min_km`) VALUES
(16, 5, 'outstation_oneway', '', '12.00', '12.00', '0.00', '0.00', '0.00'),
(17, 5, 'outstation_roundtrip', '', '12.00', '12.00', '0.00', '0.00', '300.00'),
(18, 5, 'airport_transfer', '', '14.00', '14.00', '0.00', '0.00', '0.00'),
(19, 5, 'city_pickupdrop', '', '499.00', '14.00', '0.00', '0.00', '14.00'),
(20, 5, 'hourly_rental', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(21, 4, 'outstation_oneway', '', '13.00', '13.00', '0.00', '0.00', '0.00'),
(22, 4, 'outstation_roundtrip', '', '12.00', '12.00', '0.00', '0.00', '250.00'),
(23, 4, 'airport_transfer', '', '14.00', '14.00', '0.00', '0.00', '0.00'),
(24, 4, 'city_pickupdrop', '', '499.00', '14.00', '0.00', '0.00', '15.00'),
(25, 4, 'hourly_rental', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(26, 6, 'outstation_oneway', '', '18.00', '18.00', '0.00', '0.00', '0.00'),
(27, 6, 'outstation_roundtrip', '', '14.00', '14.00', '0.00', '0.00', '300.00'),
(28, 6, 'airport_transfer', '', '20.00', '20.00', '0.00', '0.00', '0.00'),
(29, 6, 'city_pickupdrop', '', '1199.00', '20.00', '0.00', '0.00', '15.00'),
(30, 6, 'hourly_rental', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(31, 7, 'outstation_oneway', '', '20.00', '20.00', '0.00', '0.00', '0.00'),
(32, 7, 'outstation_roundtrip', '', '16.00', '16.00', '0.00', '0.00', '300.00'),
(33, 7, 'airport_transfer', '', '20.00', '20.00', '0.00', '0.00', '0.00'),
(34, 7, 'city_pickupdrop', '', '1199.00', '20.00', '0.00', '0.00', '15.00'),
(35, 7, 'hourly_rental', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(36, 8, 'outstation_oneway', '', '22.00', '22.00', '0.00', '0.00', '0.00'),
(37, 8, 'outstation_roundtrip', '', '18.00', '18.00', '0.00', '0.00', '300.00'),
(38, 8, 'airport_transfer', '', '22.00', '22.00', '0.00', '0.00', '0.00'),
(39, 8, 'city_pickupdrop', '', '1199.00', '20.00', '0.00', '0.00', '15.00'),
(40, 8, 'hourly_rental', '', '2400.00', '0.00', '0.00', '24.00', '240.00'),
(41, 8, 'hourly_rental', 'hourly_rental_package_1', '1800.00', '18.00', '0.00', '4.00', '40.00'),
(42, 8, 'hourly_rental', 'hourly_rental_package_2', '3000.00', '18.00', '0.00', '8.00', '80.00'),
(43, 8, 'hourly_rental', 'hourly_rental_package_3', '3999.00', '18.00', '0.00', '12.00', '120.00'),
(44, 8, 'hourly_rental', 'hourly_rental_package_4', '5499.00', '18.00', '0.00', '24.00', '200.00'),
(45, 9, 'outstation_oneway', '', '12.00', '12.00', '0.00', '0.00', '0.00'),
(46, 9, 'outstation_roundtrip', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(47, 9, 'airport_transfer', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(48, 9, 'city_pickupdrop', '', '0.00', '0.00', '0.00', '0.00', '0.00'),
(49, 9, 'hourly_rental', 'hourly_rental_package_1', '0.00', '0.00', '0.00', '0.00', '0.00'),
(50, 9, 'hourly_rental', 'hourly_rental_package_2', '0.00', '0.00', '0.00', '0.00', '0.00'),
(51, 9, 'hourly_rental', 'hourly_rental_package_3', '0.00', '0.00', '0.00', '0.00', '0.00'),
(52, 9, 'hourly_rental', 'hourly_rental_package_4', '0.00', '0.00', '0.00', '0.00', '0.00'),
(53, 7, 'hourly_rental', 'hourly_rental_package_1', '1800.00', '18.00', '0.00', '4.00', '40.00'),
(54, 7, 'hourly_rental', 'hourly_rental_package_2', '3000.00', '18.00', '0.00', '8.00', '80.00'),
(55, 7, 'hourly_rental', 'hourly_rental_package_3', '3999.00', '18.00', '0.00', '12.00', '120.00'),
(56, 7, 'hourly_rental', 'hourly_rental_package_4', '5499.00', '18.00', '0.00', '24.00', '200.00'),
(57, 5, 'hourly_rental', 'hourly_rental_package_1', '1200.00', '14.00', '0.00', '4.00', '40.00'),
(58, 5, 'hourly_rental', 'hourly_rental_package_2', '2399.00', '14.00', '0.00', '8.00', '80.00'),
(59, 5, 'hourly_rental', 'hourly_rental_package_3', '2999.00', '14.00', '0.00', '12.00', '120.00'),
(60, 5, 'hourly_rental', 'hourly_rental_package_4', '3999.00', '14.00', '0.00', '24.00', '200.00'),
(61, 4, 'hourly_rental', 'hourly_rental_package_1', '1200.00', '14.00', '0.00', '4.00', '40.00'),
(62, 4, 'hourly_rental', 'hourly_rental_package_2', '2399.00', '14.00', '0.00', '8.00', '80.00'),
(63, 4, 'hourly_rental', 'hourly_rental_package_3', '2999.00', '14.00', '0.00', '12.00', '120.00'),
(64, 4, 'hourly_rental', 'hourly_rental_package_4', '3999.00', '14.00', '0.00', '24.00', '200.00'),
(65, 6, 'hourly_rental', 'hourly_rental_package_1', '1800.00', '18.00', '0.00', '4.00', '40.00'),
(66, 6, 'hourly_rental', 'hourly_rental_package_2', '3000.00', '18.00', '0.00', '8.00', '80.00'),
(67, 6, 'hourly_rental', 'hourly_rental_package_3', '3999.00', '18.00', '0.00', '12.00', '120.00'),
(68, 6, 'hourly_rental', 'hourly_rental_package_4', '5499.00', '18.00', '0.00', '24.00', '200.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_banner`
--
ALTER TABLE `webina_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_contact`
--
ALTER TABLE `webina_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_count_visitor`
--
ALTER TABLE `webina_count_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_email`
--
ALTER TABLE `webina_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_email_list`
--
ALTER TABLE `webina_email_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_faq`
--
ALTER TABLE `webina_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_page`
--
ALTER TABLE `webina_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_review`
--
ALTER TABLE `webina_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_total_visitor`
--
ALTER TABLE `webina_total_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_user`
--
ALTER TABLE `webina_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_user_booking`
--
ALTER TABLE `webina_user_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_vehicle`
--
ALTER TABLE `webina_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webina_vehicle_service`
--
ALTER TABLE `webina_vehicle_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webina_banner`
--
ALTER TABLE `webina_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webina_contact`
--
ALTER TABLE `webina_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `webina_count_visitor`
--
ALTER TABLE `webina_count_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=860;

--
-- AUTO_INCREMENT for table `webina_email`
--
ALTER TABLE `webina_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webina_email_list`
--
ALTER TABLE `webina_email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webina_faq`
--
ALTER TABLE `webina_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `webina_page`
--
ALTER TABLE `webina_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webina_review`
--
ALTER TABLE `webina_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `webina_total_visitor`
--
ALTER TABLE `webina_total_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webina_user`
--
ALTER TABLE `webina_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `webina_user_booking`
--
ALTER TABLE `webina_user_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `webina_vehicle`
--
ALTER TABLE `webina_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `webina_vehicle_service`
--
ALTER TABLE `webina_vehicle_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
