-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2024 at 11:14 AM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cqutrbas_AMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisements`
--

CREATE TABLE `tbl_advertisements` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `video_link` varchar(45) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_advertisements`
--

INSERT INTO `tbl_advertisements` (`id`, `booking_id`, `video_link`, `status`, `start_time`, `end_time`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'd1e03a0d665dc68853e2c69af2a5d026.mp4', 1, '2024-08-29 08:36:47', NULL, '2024-08-22 00:34:17', 6, NULL, NULL, NULL, NULL),
(2, 1, '0440db462d98316ad85ed9c4ecb1caf5.mp4', 1, NULL, NULL, '2024-08-22 02:10:28', 10, NULL, NULL, '2024-08-22 02:10:32', 10),
(3, 1, 'c4626f8bc6d1091253675ed4f8a73530.mp4', 1, '2024-08-29 08:36:59', NULL, '2024-08-22 02:13:47', 10, NULL, NULL, NULL, NULL),
(4, 1, 'c23125a0fdbbacf78719f82bf7692cbb.mov', 1, NULL, NULL, '2024-08-22 02:14:46', 10, NULL, NULL, '2024-08-22 02:15:06', 10),
(5, 19, '46b2fefef965fbfebffab9a48fa6b666.mp4', 1, NULL, NULL, '2024-09-06 03:45:04', 6, NULL, NULL, '2024-09-06 03:47:24', 6),
(6, 19, 'a9eeba6028c96ac0bc5b7d74606c04cb.mp4', 1, NULL, NULL, '2024-09-06 03:46:23', 6, NULL, NULL, '2024-09-06 03:47:52', 6),
(7, 19, '24dd688f4258d35634a7e7139e877991.mp4', 1, NULL, NULL, '2024-09-06 03:46:58', 6, NULL, NULL, '2024-09-06 03:49:04', 6),
(8, 19, '6e1403de566f4c0528f8740b45adf6a2.mp4', 1, NULL, NULL, '2024-09-06 03:48:42', 6, NULL, NULL, '2024-09-06 03:50:48', 6),
(9, 19, 'a7e1db065f4b2f116b9ebac56c911c67.mp4', 1, NULL, NULL, '2024-09-06 03:49:42', 6, NULL, NULL, '2024-09-06 03:52:10', 6),
(10, 19, 'df72084843745506f4401cd68f7d0794.mp4', 1, NULL, NULL, '2024-09-06 03:51:14', 6, NULL, NULL, '2024-09-06 03:52:45', 6),
(11, 19, '2c6a562710d0b5677bab59ec6764f9a2.mp4', 1, NULL, NULL, '2024-09-06 03:59:19', 6, NULL, NULL, '2024-09-06 06:37:07', 6),
(12, 19, 'b4657fffb7cb83fabf49d2292888f2bf.mp4', 1, NULL, NULL, '2024-09-06 06:37:32', 6, NULL, NULL, '2024-09-06 06:38:42', 6),
(13, 19, 'af3c7e49ea5c0ce9b4ff9a8bfa52243a.mp4', 1, NULL, NULL, '2024-09-06 06:39:42', 22, NULL, NULL, NULL, NULL),
(14, 2, '21dbe1606fe9ad5a3de2c4635210d9c4.mp4', 1, NULL, NULL, '2024-09-06 10:18:14', 6, NULL, NULL, NULL, NULL),
(15, 2, '5e54c9d1ad467d994912a35e19944602.mp4', 1, NULL, NULL, '2024-09-09 11:35:48', 6, NULL, NULL, NULL, NULL),
(16, 2, '90f0f1e154d02f9431a2cd61fe2f62bc.mp4', 1, NULL, NULL, '2024-09-09 11:37:54', 6, NULL, NULL, NULL, NULL),
(17, 26, '2f57a99146a4efead2ea66413415f6da.mp4', 1, NULL, NULL, '2024-09-09 11:38:18', 6, NULL, NULL, NULL, NULL),
(18, 29, '94fa45f8b042c05f40a0d477e5f59b96.mp4', 1, '2024-09-13 00:38:59', NULL, '2024-09-11 00:03:35', 28, NULL, NULL, NULL, NULL),
(19, 29, '933b06ba0955939ac8e3ca3ed81c8993.mp4', 1, '2024-09-13 00:37:45', NULL, '2024-09-11 00:03:47', 28, NULL, NULL, NULL, NULL),
(20, 30, '9c8a9f6a708c585cc42f1470076f1bd1.mp4', 1, '2024-09-13 00:30:55', NULL, '2024-09-11 00:43:58', 29, NULL, NULL, NULL, NULL),
(21, 30, '655c5c930aa0bd219d3be639041f4a1e.mp4', 1, '2024-09-13 00:30:27', NULL, '2024-09-11 00:44:01', 29, NULL, NULL, NULL, NULL),
(22, 31, '29d15e01207f0b4bbadfcd86fcc77510.mp4', 1, NULL, NULL, '2024-09-11 03:04:09', 6, NULL, NULL, NULL, NULL),
(23, 32, 'cf6723796cf35cb2c9f0fa40671b6a50.mp4', 1, '2024-09-14 06:10:47', NULL, '2024-09-11 04:21:33', 30, NULL, NULL, NULL, NULL),
(24, 32, '2451592a62b8a48f6a72f2c43760b684.mp4', 1, '2024-09-14 06:13:01', NULL, '2024-09-11 04:21:38', 30, NULL, NULL, NULL, NULL),
(25, 33, 'fccb2e6d3dff49dddc654d67f206fdd3.mp4', 1, '2024-09-18 00:33:34', NULL, '2024-09-18 00:30:13', 32, NULL, NULL, NULL, NULL),
(26, 33, '6a32e9dbc11366ecf8021856c70ba30a.mp4', 1, '2024-09-18 00:33:15', NULL, '2024-09-18 00:30:30', 32, NULL, NULL, NULL, NULL),
(27, 34, '0b185281fbffffbf17a325ef33cd0bd7.mp4', 1, '2024-09-18 03:59:41', NULL, '2024-09-18 03:58:14', 33, NULL, NULL, NULL, NULL),
(28, 34, '3d60e796e44dbe864257a9e610b6e003.mp4', 1, '2024-09-19 22:48:13', NULL, '2024-09-18 03:58:35', 33, NULL, NULL, NULL, NULL),
(29, 35, '5131c2c121cd9bce27837dd874624c94.mp4', 1, NULL, NULL, '2024-09-20 10:50:21', 22, NULL, NULL, NULL, NULL),
(30, 35, '4e183c35b582b9e3b78fe8e51eba267b.mp4', 1, NULL, NULL, '2024-09-20 10:50:52', 22, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billboards`
--

CREATE TABLE `tbl_billboards` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `size` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `mac_address` varchar(45) DEFAULT NULL,
  `minimum_vehicle_count` int(11) NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_billboards`
--

INSERT INTO `tbl_billboards` (`id`, `location_id`, `size`, `type`, `mac_address`, `minimum_vehicle_count`, `price_per_day`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Large', 'LED', 'CA:2A:4B:C6:16:2D', 20, 1000.00, 1, '2024-08-21 14:27:07', 6, NULL, NULL, NULL, NULL),
(2, 1, 'Large', 'LED', 'CA:2A:4B:C6:16:2D', 20, 1000.00, 1, '2024-09-03 18:54:32', 6, NULL, NULL, '2024-09-04 04:54:41', 6),
(3, 5, 'Large', 'LED', 'CA:2A:4B:C6:16:2B', 35, 500.00, 1, '2024-09-03 18:58:41', 6, NULL, NULL, NULL, NULL),
(4, 6, 'MEDIUM', 'LED', 'BB:C2::D4:16:15:7', 25, 350.00, 1, '2024-09-03 18:59:09', 6, NULL, NULL, NULL, NULL),
(5, 1, '10', 'LED', 'test', 1, 1.00, 1, '2024-09-05 03:57:14', 6, NULL, NULL, '2024-09-05 14:07:47', 6),
(6, 6, 'Large', 'LED', 'CA:2A:4B:C6:16:2C', 37, 200.00, 1, '2024-09-05 21:20:23', 6, NULL, NULL, NULL, NULL),
(7, 8, 'Medium', 'LED', 'CA:2A:4B:C6:16:2Q', 20, 500.00, 1, '2024-09-10 13:54:22', 6, NULL, NULL, NULL, NULL),
(8, 10, 'Medium', 'LED', 'CA:2A:4B:C6:16:2W', 20, 1000.00, 1, '2024-09-17 14:20:51', 6, NULL, NULL, NULL, NULL),
(9, 11, 'Large', 'Digital', 'CA:2A:4B:C6:16:2A', 20, 1000.00, 1, '2024-09-17 17:55:11', 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `billboard_id` int(11) NOT NULL,
  `price_package_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(150) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `customer_id`, `billboard_id`, `price_package_id`, `from_date`, `to_date`, `total_price`, `transaction_id`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 1, 1, '2024-08-22', '2024-08-30', NULL, '', 1, '2024-08-21 14:33:40', 6, '2024-08-22 00:33:59', 6, NULL, NULL),
(2, 1, 1, 2, '2024-08-30', '2024-10-02', NULL, '', 1, '2024-08-23 15:47:06', 6, '2024-08-27 13:44:02', 6, '2024-09-10 23:46:08', 6),
(3, 1, 1, 3, '2024-06-14', '2024-07-15', NULL, '', 1, '2024-08-23 15:58:00', 6, NULL, NULL, NULL, NULL),
(4, 1, 1, 2, '2024-10-02', '2024-11-08', NULL, '', 1, '2024-08-27 16:16:49', 6, NULL, NULL, '2024-09-01 08:30:16', 6),
(5, 1, 1, 3, '2024-12-01', '2024-12-04', 0.00, '', 1, '2024-08-31 22:27:13', 6, NULL, NULL, '2024-09-01 08:30:13', 6),
(6, 1, 1, 3, '2024-12-01', '2024-12-04', 0.00, '', 1, '2024-08-31 22:27:21', 6, NULL, NULL, '2024-09-01 08:30:08', 6),
(7, 1, 1, 3, '2024-12-01', '2024-12-04', 3000.00, '', 1, '2024-08-31 22:29:06', 6, NULL, NULL, '2024-09-01 08:30:04', 6),
(8, 4, 1, 3, '2024-10-02', '2024-10-15', 13000.00, '', 1, '2024-08-31 22:30:31', 6, NULL, NULL, '2024-09-01 08:34:55', 6),
(9, 9, 1, 3, '2024-10-18', '2024-10-30', 12001.00, '', 1, '2024-08-31 22:31:48', 6, NULL, NULL, '2024-09-01 08:34:51', 6),
(10, 3, 1, 3, '2024-10-28', '2024-10-29', 2000.00, '', 1, '2024-08-31 22:35:09', 6, NULL, NULL, '2024-09-01 09:40:17', 6),
(11, 1, 1, 3, '2024-10-30', '2024-10-31', 2000.00, '', 1, '2024-08-31 23:31:30', 6, NULL, NULL, '2024-09-01 09:40:13', 6),
(12, 3, 1, 2, '2024-11-01', '2024-12-31', 54900.00, '', 1, '2024-08-31 23:34:23', 6, NULL, NULL, '2024-09-01 09:40:10', 6),
(13, 1, 1, 2, '2025-01-01', '2025-02-02', 29700.00, '', 1, '2024-08-31 23:37:49', 6, NULL, NULL, '2024-09-01 09:40:06', 6),
(14, 1, 1, 3, '2024-10-03', '2024-10-04', 2000.00, '', 1, '2024-08-31 23:40:35', 6, NULL, NULL, '2024-09-06 06:06:07', 6),
(15, 3, 1, 3, '2024-10-06', '2024-10-07', 2000.00, '', 1, '2024-08-31 23:42:09', 6, NULL, NULL, '2024-09-04 04:58:00', 6),
(16, 1, 1, 3, '2024-10-13', '2024-10-17', 4000.00, '', 1, '2024-08-31 23:44:32', 6, NULL, NULL, '2024-09-04 04:57:55', 6),
(17, 1, 1, 3, '2024-10-20', '2024-10-24', 5000.00, '', 1, '2024-08-31 23:45:24', 6, NULL, NULL, '2024-09-04 04:57:47', 6),
(18, 3, 1, 2, '2024-10-25', '2024-11-30', 33300.00, '', 1, '2024-08-31 23:46:03', 6, NULL, NULL, '2024-09-04 04:57:42', 6),
(19, 27, 3, 4, '2024-09-04', '2024-12-31', 47600.00, '', 1, '2024-09-03 19:31:21', 6, NULL, NULL, '2024-09-10 23:46:19', 6),
(20, 26, 4, 5, '2025-01-01', '2025-06-24', 45937.50, '', 1, '2024-09-03 19:33:30', 6, NULL, NULL, '2024-09-05 11:38:23', 23),
(21, 28, 3, 2, '2025-01-02', '2025-02-28', 26100.00, '', 1, '2024-09-05 01:37:45', 23, NULL, NULL, '2024-09-05 11:38:51', 23),
(22, 1, 3, 2, '2025-01-01', '2025-02-23', 24300.00, '', 1, '2024-09-05 19:46:02', 6, NULL, NULL, '2024-09-06 05:56:43', 6),
(23, 26, 4, 3, '2024-09-06', '2024-10-01', 9100.00, '', 1, '2024-09-05 20:04:54', 6, NULL, NULL, '2024-09-10 23:46:24', 6),
(24, 26, 3, 2, '2025-01-01', '2025-01-31', 13950.00, '', 1, '2024-09-05 20:05:55', 6, NULL, NULL, NULL, NULL),
(25, 27, 4, 2, '2024-10-02', '2024-10-31', 9450.00, '', 1, '2024-09-05 20:51:24', 22, NULL, NULL, NULL, NULL),
(26, 27, 6, 3, '2024-09-06', '2024-09-30', 5000.00, '', 1, '2024-09-05 21:21:46', 22, NULL, NULL, '2024-09-10 23:46:31', 6),
(27, 27, 6, 3, '2024-09-06', '2024-09-30', 5000.00, 'pi_3Px3NVFDJLERu99v0aDk90Ze', 1, '2024-09-08 22:55:24', 6, NULL, NULL, '2024-09-09 08:56:46', 6),
(28, 27, 6, 3, '2024-09-06', '2024-09-30', 5000.00, 'pi_3Px3OMFDJLERu99v0Sjg9qSK', 1, '2024-09-08 22:56:18', 6, NULL, NULL, '2024-09-09 08:56:38', 6),
(29, 33, 7, 3, '2024-09-11', '2024-09-14', 2000.00, 'pi_3PxdudFDJLERu99v0NHAAqCm', 1, '2024-09-10 13:56:02', 28, NULL, NULL, '2024-09-11 00:33:49', 6),
(30, 34, 7, 3, '2024-09-11', '2024-09-13', 1500.00, 'pi_3PxeepFDJLERu99v0IuwYz2p', 1, '2024-09-10 14:43:46', 29, NULL, NULL, '2024-09-11 00:44:53', 29),
(31, 1, 1, 3, '2024-12-06', '2024-12-11', 6000.00, 'pi_3PxgnQFDJLERu99v0LpKVzFu', 1, '2024-09-10 17:00:47', 6, NULL, NULL, NULL, NULL),
(32, 35, 7, 3, '2024-09-11', '2024-09-14', 2000.00, 'pi_3Pxi1PFDJLERu99v1KNScO45', 1, '2024-09-10 18:19:18', 30, NULL, NULL, '2024-09-14 06:10:38', 6),
(33, 37, 8, 3, '2024-09-18', '2024-09-25', 8000.00, 'pi_3Q0BlDFDJLERu99v0dBoUMjn', 1, '2024-09-17 14:28:50', 32, NULL, NULL, '2024-09-18 00:43:12', 6),
(34, 38, 9, 3, '2024-09-18', '2024-09-25', 8000.00, 'pi_3Q0F0nFDJLERu99v1Sd00wWj', 1, '2024-09-17 17:57:08', 33, NULL, NULL, NULL, NULL),
(35, 27, 7, 2, '2024-09-20', '2024-10-31', 18900.00, 'pi_3Q11ddFDJLERu99v1folDoBQ', 1, '2024-09-19 21:52:28', 22, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_details`
--

CREATE TABLE `tbl_customer_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_address` varchar(150) NOT NULL,
  `abn` varchar(16) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_customer_details`
--

INSERT INTO `tbl_customer_details` (`id`, `user_id`, `business_address`, `abn`, `created_at`, `active`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 10, 'TEST', '12345', '2024-08-22 00:31:43', 1, NULL, NULL, NULL, NULL, NULL),
(2, 11, 'test', '123', '2024-08-22 03:19:05', 1, NULL, NULL, NULL, NULL, NULL),
(3, 12, 'test', '123', '2024-08-22 03:21:10', 1, NULL, NULL, NULL, NULL, NULL),
(4, 14, 'scsd', '12', '2024-08-24 01:11:45', 1, NULL, NULL, NULL, NULL, NULL),
(5, 15, 'Test addressq', '', '2024-08-25 10:00:00', 1, NULL, NULL, NULL, NULL, NULL),
(6, 16, 'tets address', '', '2024-08-27 11:06:47', 1, NULL, NULL, NULL, NULL, NULL),
(7, 17, '26 Strtee VIC', '15656565656', '2024-08-28 02:10:23', 1, NULL, NULL, NULL, NULL, NULL),
(8, 18, 'Test', '', '2024-08-28 04:25:41', 1, NULL, NULL, NULL, NULL, NULL),
(9, 19, 'Test', '', '2024-09-01 03:33:14', 1, NULL, NULL, NULL, NULL, NULL),
(26, 21, 'Test', '', '2024-09-01 07:26:02', 1, NULL, NULL, NULL, NULL, NULL),
(27, 22, 'U 1  60 EDINBURGH ST,Clayton', '1272509507', '2024-09-04 03:24:08', 1, NULL, NULL, NULL, NULL, NULL),
(28, 23, 'U 1  60 EDINBURGH ST', '1272509507', '2024-09-04 03:26:14', 1, NULL, NULL, NULL, NULL, NULL),
(29, 24, 'test', '132131', '2024-09-05 07:17:17', 1, NULL, NULL, NULL, NULL, NULL),
(30, 25, 'test', '1231', '2024-09-06 06:54:42', 1, NULL, NULL, NULL, NULL, NULL),
(31, 21, '25 Main St, South Yarra, VIC ', '', '2024-09-06 10:43:04', 1, NULL, NULL, NULL, NULL, NULL),
(32, 27, '3168', 'nandinig@gmail.c', '2024-09-06 10:45:01', 1, NULL, NULL, NULL, NULL, NULL),
(33, 28, '25 Lewis Street Kingsville', '', '2024-09-10 23:43:47', 1, NULL, NULL, NULL, NULL, NULL),
(34, 29, '23', '', '2024-09-11 00:41:56', 1, NULL, NULL, NULL, NULL, NULL),
(35, 30, '25 VIC', '', '2024-09-11 04:17:16', 1, NULL, NULL, NULL, NULL, NULL),
(36, 31, 'test', '', '2024-09-18 00:24:31', 1, NULL, NULL, NULL, NULL, NULL),
(37, 32, 'Test', '', '2024-09-18 00:27:23', 1, NULL, NULL, NULL, NULL, NULL),
(38, 33, 'test st', '', '2024-09-18 03:53:02', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `location_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'CQU Uni Building Melbourne', '2024-08-22 00:26:39', 6, '2024-08-28 02:23:29', 6, NULL, NULL),
(2, 'Test2', '2024-08-28 00:43:35', 6, '2024-08-28 00:43:35', 6, '2024-08-28 00:43:42', 6),
(3, 'Flinders Street Station Platform 1', '2024-08-28 00:47:01', 6, '2024-08-28 02:23:52', 6, NULL, NULL),
(4, 'jbkj', '2024-08-29 08:03:00', 6, '2024-08-29 08:03:00', 6, '2024-09-04 04:50:37', 6),
(5, 'St Kilda Junction', '2024-09-04 04:49:45', 6, '2024-09-04 04:49:45', 6, NULL, NULL),
(6, 'Dandenong Road', '2024-09-04 04:50:54', 6, '2024-09-04 04:51:15', 6, NULL, NULL),
(7, 'Springvale road', '2024-09-04 04:52:07', 6, '2024-09-04 04:52:07', 6, NULL, NULL),
(8, 'Latrobe Street', '2024-09-04 04:53:14', 6, '2024-09-04 04:53:14', 6, NULL, NULL),
(9, 'test', '2024-09-05 14:42:43', 6, '2024-09-05 14:42:43', 6, NULL, NULL),
(10, 'Flagstaff Street Station Platform 2', '2024-09-18 00:19:33', 6, '2024-09-18 00:19:33', 6, NULL, NULL),
(11, 'Docklands Junction VIC', '2024-09-18 00:59:47', 6, '2024-09-18 00:59:47', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_packages`
--

CREATE TABLE `tbl_price_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_price_packages`
--

INSERT INTO `tbl_price_packages` (`id`, `package_name`, `duration`, `discount`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Updated Package', '45', 15.00, 1, '2024-08-22 00:32:12', 6, '2024-08-22 01:03:40', 1, '2024-08-22 01:03:40', 10),
(2, 'More than month', '30', 10.00, 1, '2024-08-22 01:03:40', 1, NULL, NULL, NULL, NULL),
(3, 'Default', '1', 0.00, 1, '2024-08-24 01:29:50', 6, NULL, NULL, NULL, NULL),
(4, 'More than 3 months', '90', 20.00, 1, '2024-08-24 01:41:30', 6, NULL, NULL, NULL, NULL),
(5, 'More than 5 months', '150', 25.00, 1, '2024-08-24 01:46:30', 6, NULL, NULL, NULL, NULL),
(6, 'Test', '10', 10.00, 1, '2024-08-28 00:47:46', 6, NULL, NULL, '2024-08-28 00:47:51', 6),
(7, 'Test', '10', 10.00, 1, '2024-08-28 00:47:59', 6, NULL, NULL, '2024-08-28 00:48:06', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traffic_data`
--

CREATE TABLE `tbl_traffic_data` (
  `id` int(11) NOT NULL,
  `billboard_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `vehicle_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_traffic_data`
--

INSERT INTO `tbl_traffic_data` (`id`, `billboard_id`, `customer_id`, `ad_id`, `time_stamp`, `vehicle_count`) VALUES
(1, 1, 1, 1, '2024-08-21 14:56:30', 36),
(2, 1, 1, 3, '2024-08-21 16:17:13', 36),
(3, 1, 1, 1, '2024-08-21 16:17:40', 39),
(4, 1, 1, 3, '2024-08-27 15:10:58', 38),
(5, 1, 1, 1, '2024-08-27 15:11:12', 31),
(6, 1, 1, 3, '2024-08-27 15:11:24', 33),
(7, 1, 1, 1, '2024-08-27 16:19:20', 36),
(8, 1, 1, 3, '2024-08-27 16:21:01', 33),
(9, 1, 1, 1, '2024-08-28 22:36:47', 22),
(10, 1, 1, 3, '2024-08-28 22:36:59', 25),
(11, 7, 33, 18, '2024-09-10 14:25:51', 23),
(12, 7, 33, 19, '2024-09-10 14:26:28', 21),
(13, 7, 33, 18, '2024-09-10 14:26:38', 24),
(14, 7, 33, 19, '2024-09-10 14:27:12', 21),
(15, 7, 33, 18, '2024-09-10 14:27:38', 20),
(16, 7, 34, 21, '2024-09-10 14:44:42', 29),
(17, 7, 34, 20, '2024-09-10 18:23:36', 21),
(18, 7, 35, 24, '2024-09-10 18:24:04', 26),
(19, 7, 35, 23, '2024-09-12 14:28:51', 21),
(20, 7, 35, 24, '2024-09-12 14:29:20', 25),
(21, 7, 35, 23, '2024-09-12 14:29:55', 38),
(22, 7, 35, 24, '2024-09-12 14:30:27', 44),
(23, 7, 35, 23, '2024-09-12 14:30:55', 20),
(24, 7, 35, 24, '2024-09-12 14:36:29', 24),
(25, 7, 35, 23, '2024-09-12 14:37:00', 23),
(26, 7, 33, 19, '2024-09-12 14:37:45', 21),
(27, 7, 33, 18, '2024-09-12 14:38:59', 34),
(28, 7, 35, 24, '2024-09-12 14:48:09', 57),
(29, 7, 35, 23, '2024-09-12 14:48:36', 28),
(30, 7, 35, 24, '2024-09-13 20:09:56', 27),
(31, 7, 35, 23, '2024-09-13 20:10:47', 29),
(32, 7, 35, 24, '2024-09-13 20:13:01', 28),
(33, 8, 37, 26, '2024-09-17 14:32:50', 24),
(34, 8, 37, 25, '2024-09-17 14:33:00', 23),
(35, 8, 37, 26, '2024-09-17 14:33:15', 27),
(36, 8, 37, 25, '2024-09-17 14:33:34', 20),
(37, 9, 38, 28, '2024-09-17 17:59:31', 37),
(38, 9, 38, 27, '2024-09-17 17:59:41', 23),
(39, 9, 38, 28, '2024-09-19 12:48:13', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `verification_expire` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `contact`, `password`, `verification_code`, `verification_expire`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(6, 'akila1', 'admin1@admin.com', '0422644889', '$2y$10$xsLPt1ekpRy8fISYT9bRX.6aFElM4NiqT/59GzRG/gbyfUXEqTMyC', NULL, NULL, 1, '2024-07-24 14:20:43', NULL, '2024-09-06 03:24:55', 6, NULL, NULL),
(7, 'Test Admin', 'admin2@admin.com', '01237898765', '$2y$10$jlqrY2.uhoOOQcSzbaQAN./1ZIK6kk/d19isfp4J8WyUQwb/HhNz.', NULL, NULL, 1, '2024-08-21 14:23:55', 6, NULL, NULL, '2024-08-27 13:23:04', NULL),
(8, 'Test Admin', 'admin2@admin.com', '01237898765', '$2y$10$m.2W1gPqw0Euy6ZchMnTS.QVNdCK1z5NKl/Wq1aMLd05WgM2E3wDi', NULL, NULL, 1, '2024-08-21 14:24:01', 6, NULL, NULL, '2024-08-27 13:23:04', NULL),
(9, 'Test Admin', 'admin2@admin.com', '01237898765', '$2y$10$qtytnxKIMOPCmqF.lG7JAuoOuikQgA8m/iUWm7I6MoA6gG3mkA8OO', NULL, NULL, 1, '2024-08-21 14:25:09', 6, NULL, NULL, '2024-08-27 13:23:04', 6),
(10, 'Test Customer', 'customer@gmail.com', '0456654456', '$2y$10$O9G.byAVO1YjsK.615ltGuZF0/U3.U2/eWGq.3/jkj1mr2hkGklaa', NULL, NULL, 1, '2024-08-21 14:31:43', 6, '2024-09-15 10:55:46', 6, NULL, NULL),
(11, 'Customer4', 'customer4@gmail.com', '12', '$2y$10$OJCDU3jB0P05J7/7YHh4GuAyoP23l0Iinu7Z8M8U4Yy3G63UFk02K', NULL, NULL, 1, '2024-08-22 03:19:05', NULL, NULL, NULL, '2024-08-27 13:20:54', 6),
(12, 'Customer4', 'customer5@gmail.com', '0456654456', '$2y$10$IHQPzu6LW5NQb5kzoEX2TOVQUS8nBdZioco25GUB.2P6dXCzmAb2m', NULL, NULL, 1, '2024-08-22 03:21:10', NULL, '2024-08-28 02:13:32', 6, NULL, NULL),
(13, 'admin1@admin.com	', 'admin1@admin.com', '2323', '$2y$10$DWFIWlC5rCPq41w9sgbufe8InRPpdys/EQUAey8mGy6GCI0EosVfq', NULL, NULL, 1, '2024-08-23 15:06:28', 6, NULL, NULL, '2024-08-24 01:06:34', 6),
(14, 'Test Customer For Uniqe', 'c2@gmail.com', '0456654456', '$2y$10$lVnSgS9XGE8KJiQ9iF7aK.YbdR1LA.MDMjO2ZoABwT9D4s7mC7ZGW', NULL, NULL, 1, '2024-08-23 15:11:45', 6, '2024-08-28 02:13:24', 6, NULL, NULL),
(15, 'TestCustomer', 'customertest@gmail.com', '0456654456', '$2y$10$XuUX0YM5P78B8GF52in2DORAtYF6z.h8JEIuQH8CewSUlaIoLtwwa', NULL, NULL, 1, '2024-08-25 10:00:00', NULL, NULL, NULL, NULL, NULL),
(16, 'Test Cusromer', 'customer7@gmail.com', '0987677767', '$2y$10$L4ak0CdIEajRtBGBu/S.V.KVtBaadxDcpqZNbui.3.fJSt9i567ki', NULL, NULL, 1, '2024-08-27 11:06:47', NULL, NULL, NULL, '2024-09-06 04:03:26', 6),
(17, 'Tect Customer', 'customer6@gmail.com', '0456654456', '$2y$10$1x6Gr3sZx7KsH61P0.mBzeqha014.MO3670s9N6BUwcQc6wc90O6O', NULL, NULL, 1, '2024-08-28 02:10:23', NULL, '2024-08-28 02:26:14', 6, '2024-09-10 23:42:43', 6),
(18, 'Test Customer', 'customer8@gmail.com', '0456765456', '$2y$10$RywW1.5x1cx79u.Ugi1XWu2s1rPLEK7urqjX6QOGJeElX7kM2ThJK', NULL, NULL, 1, '2024-08-28 04:25:41', NULL, NULL, NULL, '2024-09-10 23:42:39', 6),
(19, 'Test', 'akilawijesinghe94@gmail.com', '0456654456', '$2y$10$5I54qMr70YgIgxz3qcDdLu.L8QAeu1kwCiFTSxsK0vAKt8ocqx3ye', NULL, NULL, 1, '2024-09-01 03:33:14', NULL, NULL, NULL, '2024-09-10 23:42:30', 6),
(21, 'Minoli', 'minolijayasinghe99@gmail.com', '04566545456', '$2y$10$qiafuutO6OWAE50oSKlUVuywje4ckKIMKbf/XkDue/BpEy4.jOF3m', '366935', '2024-09-19', 0, '2024-09-01 07:26:02', NULL, NULL, NULL, '2024-09-18 00:23:28', 6),
(22, 'Teja', 'nandinigottipati123@gmail.com', '0422644881', '$2y$10$Ih87bLT0ZI8t56bs5dsyXONnPkct/rVjFC.yEfflMzlvo8xxxMIiy', '526048', '2024-09-05', 1, '2024-09-04 03:24:08', NULL, '2024-09-06 04:03:12', 6, NULL, NULL),
(23, 'Teja', 'nandinigottipati123@gmail.com', '0422644881', '$2y$10$11mlpXhBtfRjIageovIKLuzIYJe5n8gd0g.TWu4OU9BWzOFAIxI2O', NULL, NULL, 1, '2024-09-04 03:26:14', NULL, NULL, NULL, NULL, NULL),
(24, 'test', 'test@gmail.com', '011', '$2y$10$x4hfMe5EuobfgyKk/Zal3.8.AU19LR3Md4lbyWZrpLIPSVBQnhxnm', '543199', '2024-09-06', 0, '2024-09-05 07:17:17', NULL, NULL, NULL, '2024-09-10 23:42:04', 6),
(25, 'uditha', 'uditha@gmail.com', '077', '$2y$10$ZRB0Let9y0kCt4Y6FkgBauTuG9jdphvut0HkIMlfi.kkQargxGzQ.', NULL, NULL, 1, '2024-09-05 20:54:42', 6, NULL, NULL, NULL, NULL),
(26, 'Nandini', 'gottipatinandini1998@gmail.com', '0422644881', '$2y$10$w55QSjjcYfHk0TeUDTFhrO0ApQlwmdvrY9WIcoGWPlG58Cn8WnlhS', NULL, NULL, 1, '2024-09-06 10:43:04', NULL, NULL, NULL, NULL, NULL),
(27, 'Nandini', 'gottipatinandini199@gmail.com', '0422655887', '$2y$10$vDgsrMuhrjYZZ7if6JYuJOd5Uq9Ojcuqx0O3s4RW/pD2VZMnJPPXu', '290891', '2024-09-07', 0, '2024-09-06 10:45:01', NULL, NULL, NULL, NULL, NULL),
(28, 'Akila Wijesinghe', 'akilawijesinghe94@gmail.com', '0456654456', '$2y$10$QjMa9QuVSvMXCjlduReP.OSCRgN3pONYOmXOdDVhGZbimWPDl/CYa', NULL, NULL, 1, '2024-09-10 23:43:47', NULL, NULL, NULL, '2024-09-11 00:33:41', 6),
(29, 'Akila Wijesinghe', 'akilawijesinghe94@gmail.com', '0456654456', '$2y$10$JoK35LOkd1rtNklr8uYFouCJFzfMn6TddU4HjMNblEXosnRjB7HZm', NULL, NULL, 1, '2024-09-11 00:41:56', NULL, NULL, NULL, '2024-09-11 00:45:57', 6),
(30, 'akila', 'akilawijesinghe94@gmail.com', '0455545567', '$2y$10$fnlIuT9h60G3PJXY55SFDune/4jmuf51Q/9ubu2hbeFOmc8yPhAzu', NULL, NULL, 1, '2024-09-11 04:17:16', NULL, NULL, NULL, '2024-09-18 00:26:12', 6),
(31, 'Minoli', 'minolijayasinghe94@gmail.com', '0456654456', '$2y$10$Y6fibV18AwHcUMhfrnRML.YChk.YdX.gk.sttsh/naFAhzJocOa0C', NULL, NULL, 1, '2024-09-18 00:24:31', NULL, NULL, NULL, NULL, NULL),
(32, 'Akila Wijesinghe', 'akilawijesinghe94@gmail.com', '0465665567', '$2y$10$gY43O.NJonFYqNNs6gohcekzJzmXn8XqrbupcpyDyxc74w6RqDpCK', NULL, NULL, 1, '2024-09-18 00:27:23', NULL, NULL, NULL, '2024-09-18 00:43:05', 6),
(33, 'Akila Wijesinghe', 'akilawijesinghe94@gmail.com', '0456654456', '$2y$10$9nZoI.x9V2s5U/3.YkxTqeB22F7yX4BwoKHSyDmK8iqOUeWmT3/LC', NULL, NULL, 1, '2024-09-18 03:53:02', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 6, 1),
(4, 9, 1),
(5, 10, 2),
(6, 11, 2),
(7, 12, 2),
(8, 13, 1),
(9, 14, 2),
(10, 15, 2),
(11, 16, 2),
(12, 17, 2),
(13, 18, 2),
(14, 19, 2),
(31, 21, 2),
(32, 22, 2),
(33, 23, 2),
(34, 24, 2),
(35, 25, 2),
(36, 26, 2),
(37, 27, 2),
(38, 28, 2),
(39, 29, 2),
(40, 30, 2),
(41, 31, 2),
(42, 32, 2),
(43, 33, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advertisements`
--
ALTER TABLE `tbl_advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_advertisements_tbl_booking1_idx` (`booking_id`);

--
-- Indexes for table `tbl_billboards`
--
ALTER TABLE `tbl_billboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_billboards_tbl_users1_idx` (`created_by`),
  ADD KEY `fk_tbl_billboards_tbl_locations1_idx` (`location_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_booking_tbl_customer_details1_idx` (`customer_id`),
  ADD KEY `fk_tbl_booking_tbl_billboards1_idx` (`billboard_id`),
  ADD KEY `fk_tbl_booking_tbl_price_packages1_idx` (`price_package_id`);

--
-- Indexes for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_customer_details_tbl_users_idx` (`user_id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_created_by_idx` (`created_by`);

--
-- Indexes for table `tbl_price_packages`
--
ALTER TABLE `tbl_price_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_traffic_data`
--
ALTER TABLE `tbl_traffic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_traffic_data_tbl_billboards1_idx` (`billboard_id`),
  ADD KEY `fk_tbl_traffic_data_tbl_customer_details1_idx` (`customer_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id_idx` (`role_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advertisements`
--
ALTER TABLE `tbl_advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_billboards`
--
ALTER TABLE `tbl_billboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_price_packages`
--
ALTER TABLE `tbl_price_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_traffic_data`
--
ALTER TABLE `tbl_traffic_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_advertisements`
--
ALTER TABLE `tbl_advertisements`
  ADD CONSTRAINT `fk_tbl_advertisements_tbl_booking1` FOREIGN KEY (`booking_id`) REFERENCES `tbl_booking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_billboards`
--
ALTER TABLE `tbl_billboards`
  ADD CONSTRAINT `fk_tbl_billboards_tbl_locations1` FOREIGN KEY (`location_id`) REFERENCES `tbl_locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_billboards_tbl_users1` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `fk_tbl_booking_tbl_billboards1` FOREIGN KEY (`billboard_id`) REFERENCES `tbl_billboards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_booking_tbl_customer_details1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_booking_tbl_price_packages1` FOREIGN KEY (`price_package_id`) REFERENCES `tbl_price_packages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  ADD CONSTRAINT `fk_tbl_customer_details_tbl_users` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD CONSTRAINT `location_created_by` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_traffic_data`
--
ALTER TABLE `tbl_traffic_data`
  ADD CONSTRAINT `fk_tbl_traffic_data_tbl_billboards1` FOREIGN KEY (`billboard_id`) REFERENCES `tbl_billboards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_traffic_data_tbl_customer_details1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
