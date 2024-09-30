-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 08:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithelpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `hardware_brands`
--

CREATE TABLE `hardware_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `status` enum('1','0','','') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hardware_brands`
--

INSERT INTO `hardware_brands` (`id`, `brand_name`, `status`) VALUES
(1, 'Other', '1'),
(2, 'Dell', '1'),
(3, 'HP', '1'),
(4, 'E-Wiz', '1'),
(9, 'Vincor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_models`
--

CREATE TABLE `hardware_models` (
  `id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `status` enum('1','0','','') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hardware_models`
--

INSERT INTO `hardware_models` (`id`, `model_name`, `status`) VALUES
(1, 'Other', '1'),
(2, 'Vostro', '1'),
(3, 'PLQ20', '1'),
(4, 'Pro3000', '1'),
(6, 'Ewiz 600', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_types`
--

CREATE TABLE `hardware_types` (
  `id` int(11) NOT NULL,
  `hardware_name` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hardware_types`
--

INSERT INTO `hardware_types` (`id`, `hardware_name`, `status`) VALUES
(1, 'Other', '1'),
(2, 'PC', '1'),
(3, 'Printer', '1'),
(4, 'Scanner', '1'),
(5, 'ATM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_type_brand_model_mapping`
--

CREATE TABLE `hardware_type_brand_model_mapping` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hardware_type_brand_model_mapping`
--

INSERT INTO `hardware_type_brand_model_mapping` (`id`, `tid`, `bid`, `mid`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 2, 3, 4),
(5, 2, 2, 2),
(6, 2, 4, 6),
(7, 3, 9, 3),
(8, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue_base`
--

CREATE TABLE `issue_base` (
  `id` int(11) NOT NULL,
  `issue_description` varchar(500) NOT NULL,
  `issue_type` enum('Hardware','Software') NOT NULL,
  `hardware_type` varchar(3) DEFAULT 'N/A',
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_base`
--

INSERT INTO `issue_base` (`id`, `issue_description`, `issue_type`, `hardware_type`, `status`) VALUES
(1, 'Other', 'Hardware', 'N/A', 0),
(2, 'Other', 'Software', 'N/A', 0),
(3, 'Printer Not Working', 'Hardware', '3', 1),
(4, 'T4S Install', 'Software', 'N/A', 1),
(5, 'Office Installation', 'Software', 'N/A', 1),
(6, 'New Scanner Installtion', 'Hardware', '4', 1),
(7, 'New Printer Installation', 'Hardware', '3', 1),
(13, 'ATM Not Functioning', 'Hardware', '5', 1),
(14, 'Pawning System Issue', 'Software', 'N/A', 1),
(15, 'PC Not Working', 'Hardware', '2', 1),
(17, '', '', 'N/A', 0),
(19, '122', '', 'N/A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_unit_mapping`
--

CREATE TABLE `issue_unit_mapping` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `uid` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_unit_mapping`
--

INSERT INTO `issue_unit_mapping` (`id`, `issue_id`, `uid`, `active`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 13, 5, 1),
(6, 14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `user_id`, `last_login`) VALUES
(1, 'admin', '2024-03-23 05:36:00'),
(2, 'PF207432', '2024-03-22 20:26:00'),
(3, 'PF232158', '2024-03-22 20:02:00'),
(4, 'PF232182', '2024-03-23 02:50:00'),
(5, 'PF207713', '2024-03-21 19:40:00'),
(6, 'PF232188', '2024-03-21 19:38:00'),
(7, 'PF207222', '2024-03-23 01:01:00'),
(8, 'PF203100', '2024-03-23 06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_notification_info`
--

CREATE TABLE `log_notification_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `log` varchar(255) NOT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_unit` int(11) DEFAULT NULL,
  `mark_as_read` tinyint(1) DEFAULT NULL,
  `mark_as_read_agent` tinyint(1) NOT NULL DEFAULT 0,
  `mark_as_read_dephead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_notification_info`
--

INSERT INTO `log_notification_info` (`id`, `ticket_id`, `log`, `added_on`, `created_by`, `assigned_to`, `assigned_unit`, `mark_as_read`, `mark_as_read_agent`, `mark_as_read_dephead`) VALUES
(1, 21, 'New Ticket', '2024-03-21 18:13:03', 24, 2, 1, 1, 0, 1),
(2, 21, 'Ticket Agent Updated: Unassigned => PF232188', '2024-03-21 18:15:00', 24, 29, 1, 1, 1, 1),
(3, 22, 'New Ticket', '2024-03-21 18:43:49', 27, 2, 1, 1, 0, 1),
(4, 22, 'Ticket Agent Updated: Unassigned => PF232188', '2024-03-21 19:02:13', 27, 29, 1, 1, 1, 1),
(5, 5, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-21 20:34:15', 27, 26, 1, 0, 1, 1),
(6, 6, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-21 20:34:38', 24, 26, 1, 1, 1, 1),
(7, 7, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-21 20:35:57', 24, 26, 1, 1, 1, 1),
(8, 8, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-21 20:37:00', 24, 26, 1, 1, 1, 1),
(9, 20, 'Status Changed: Open => Work In Progress', '2024-03-21 20:38:46', 24, 2, 1, 1, 0, 1),
(10, 20, 'Status Changed: Work In Progress => Approval Pending', '2024-03-21 20:39:12', 24, 2, 1, 1, 0, 1),
(11, 20, 'Status Changed: Approval Pending => Approved', '2024-03-21 21:15:01', 24, 2, 1, 1, 0, 1),
(12, 17, 'Status Changed: Work In Progress => Approval Pending', '2024-03-22 10:42:40', 24, 29, 5, 1, 0, 0),
(13, 17, 'Ticket Transfered: ATM Management Unit => Technical Support Unitt', '2024-03-22 10:45:12', 24, 29, 1, 1, 0, 1),
(14, 17, 'Status Changed: Approval Pending => Approved', '2024-03-22 10:51:04', 24, 29, 1, 1, 0, 1),
(15, 23, 'New Ticket', '2024-03-22 12:30:11', 24, 2, 1, 1, 0, 1),
(16, 24, 'New Ticket', '2024-03-22 12:36:42', 24, 2, 1, 0, 0, 1),
(17, 25, 'New Ticket', '2024-03-22 12:50:15', 24, 2, 1, 0, 0, 1),
(18, 26, 'New Ticket', '2024-03-22 12:52:24', 24, 2, 1, 0, 0, 1),
(19, 27, 'New Ticket', '2024-03-22 13:06:26', 24, 2, 1, 1, 0, 1),
(20, 28, 'New Ticket', '2024-03-22 13:07:36', 24, 2, 1, 1, 0, 1),
(21, 29, 'New Ticket', '2024-03-22 13:08:58', 24, 2, 1, 0, 0, 1),
(22, 30, 'New Ticket', '2024-03-22 13:53:55', 24, 2, 1, 0, 0, 1),
(23, 9, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-22 20:13:42', 24, 26, 1, 0, 0, 1),
(24, 3, 'Status Changed: Open => Invalid', '2024-03-22 20:22:01', 24, 25, 1, 0, 0, 1),
(25, 31, 'New Ticket', '2024-03-23 03:01:16', 26, 2, 1, 0, 0, 1),
(26, 32, 'New Ticket', '2024-03-23 03:05:40', 26, 2, 1, 0, 0, 1),
(27, 32, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-23 03:08:37', 26, 26, 1, 0, 0, 0),
(28, 10, 'Ticket Agent Updated: Unassigned => PF232182', '2024-03-23 03:09:01', 24, 26, 1, 0, 0, 0),
(29, 32, 'Status Changed: Open => Work In Progress', '2024-03-23 03:09:48', 26, 26, 1, 0, 0, 0),
(30, 32, 'Status Changed: Work In Progress => Closed', '2024-03-23 03:10:39', 26, 26, 1, 0, 0, 0),
(31, 18, 'Status Changed: Closed => Approval Pending', '2024-03-23 03:28:44', 26, 26, 1, 0, 0, 0),
(32, 18, 'Status Changed: Approval Pending => Approved', '2024-03-23 03:29:23', 26, 26, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_user_actions`
--

CREATE TABLE `log_user_actions` (
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `done_by` varchar(50) NOT NULL,
  `done_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user_actions`
--

INSERT INTO `log_user_actions` (`id`, `action`, `remark`, `done_by`, `done_on`) VALUES
(1, 'UPDATE', 'Role Status Updated - Technical Support Head', 'admin', '2024-03-22 20:30:17'),
(2, 'UPDATE', 'Role Status Updated - Technical Support Head', 'admin', '2024-03-22 20:30:20'),
(3, 'UPDATE', 'Role Status Updated - support agent', 'admin', '2024-03-22 20:30:30'),
(4, 'UPDATE', 'Role Status Updated - support agentt', 'admin', '2024-03-22 20:31:03'),
(5, 'UPDATE', 'User Password Updated - admin', 'admin', '2024-03-22 20:37:25'),
(6, 'UPDATE', 'Role Name Updated - Technical Support Head', 'admin', '2024-03-22 20:44:07'),
(7, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:15:14'),
(8, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:32:43'),
(9, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:42:12'),
(10, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:44:35'),
(11, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:44:46'),
(12, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:49:58'),
(13, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 21:50:08'),
(14, 'UPDATE', 'User Updated - admin', 'admin', '2024-03-22 22:01:37'),
(15, 'UPDATE', 'User Status Updated - Unassigned', 'admin', '2024-03-23 01:05:53'),
(16, 'UPDATE', 'Ticket Updated - New Agent: 26', 'PF232182', '2024-03-23 01:43:42'),
(17, 'UPDATE', 'Ticket Updated - Status: 7 Priority: 1', 'PF207432', '2024-03-23 01:52:01'),
(18, 'INSERT', 'New User Saved - PF207222', 'admin', '2024-03-23 06:31:35'),
(19, 'UPDATE', 'User Status Updated - PF232188', 'admin', '2024-03-23 06:45:42'),
(20, 'UPDATE', 'User Password Reset - PF232188', 'admin', '2024-03-23 06:45:48'),
(21, 'INSERT', 'New User Saved - PF207123', 'admin', '2024-03-23 06:48:04'),
(22, 'INSERT', 'New User Saved - PF207111', 'admin', '2024-03-23 06:50:36'),
(23, 'INSERT', 'New User Saved - PF207222', 'admin', '2024-03-23 06:52:40'),
(24, 'INSERT', 'New User Saved - PF207333', 'admin', '2024-03-23 06:55:01'),
(25, 'INSERT', 'New User Saved - PF207444', 'admin', '2024-03-23 06:56:58'),
(26, 'INSERT', 'New User Saved - PF203200', 'admin', '2024-03-23 07:07:53'),
(27, 'INSERT', 'New User Saved - PF203300', 'admin', '2024-03-23 07:10:06'),
(28, 'UPDATE', 'Ticket Updated - New Agent: 26', 'PF232182', '2024-03-23 08:38:37'),
(29, 'UPDATE', 'Ticket Updated - New Agent: 26', 'PF232182', '2024-03-23 08:39:01'),
(30, 'UPDATE', 'Ticket Updated - Status: 2', 'PF232182', '2024-03-23 08:39:48'),
(31, 'UPDATE', 'Ticket Updated - Status: 3', 'PF232182', '2024-03-23 08:40:39'),
(32, 'UPDATE', 'Ticket Updated - Status: 5', 'PF203100', '2024-03-23 08:58:44'),
(33, 'UPDATE', 'Ticket Updated - Status: 6', 'PF203100', '2024-03-23 08:59:23'),
(34, 'INSERT', 'Role Added - aa', 'admin', '2024-03-23 11:50:50');

--
-- Triggers `log_user_actions`
--
DELIMITER $$
CREATE TRIGGER `set_done_on_user_actions` BEFORE INSERT ON `log_user_actions` FOR EACH ROW SET NEW.done_on = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_master`
--

CREATE TABLE `permission_master` (
  `id` int(11) NOT NULL,
  `featurename` varchar(100) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_master`
--

INSERT INTO `permission_master` (`id`, `featurename`, `is_show`) VALUES
(1, 'TKT_All_View', 1),
(2, 'TKT_Add', 1),
(3, 'TKT_Edit', 1),
(4, 'TKT_Manage_Tickets', 1),
(5, 'TKT_Assigned_Tickets', 1),
(6, 'TKT_Pending_Tickets', 1),
(7, 'FAQ_Add', 1),
(8, 'FAQ_View', 1),
(9, 'RPT_View', 1),
(10, 'ADM_View_Users', 1),
(11, 'ADM_Add_Users', 1),
(12, 'ADM_Edit_Users', 1),
(13, 'ADM_View_Units', 1),
(14, 'ADM_Add_Units', 1),
(15, 'ADM_Edit_Units', 1),
(16, 'ADM_View_Roles', 1),
(17, 'ADM_Add_Roles', 1),
(18, 'ADM_Edit_Roles', 1),
(19, 'ADM_Edit_Role_Permissions', 1),
(20, 'TS_View_Hdware_Type', 1),
(21, 'TS_Add_Hdware_Type', 1),
(22, 'TS_Edit_Hdware_Type', 1),
(23, 'TS_View_Hdware_Model', 1),
(24, 'TS_Add_Hdware_Model', 1),
(25, 'TS_Edit_Hdware_Model', 1),
(26, 'TS_View_Hdware_Brand', 1),
(27, 'TS_Add_Hdware_Brand', 1),
(28, 'TS_Edit_Hdware_Brand', 1),
(29, 'TS_View_Hdware_Mapping', 1),
(30, 'TS_Add_Hdware_Mapping', 1),
(31, 'TS_Edit_Hdware_Mapping', 1),
(32, 'DH_View_Issues', 1),
(33, 'DH_Add_Issues', 1),
(34, 'DH_Edit_Issues', 1),
(35, 'DH_View_Issues_Mapping', 1),
(36, 'DH_Add_Issues_Mapping', 1),
(37, 'DH_Edit_Issues_Mapping', 1),
(38, 'TKT_View_All', 1),
(39, 'TKT_Approve', 1);

-- --------------------------------------------------------

--
-- Table structure for table `priority_master`
--

CREATE TABLE `priority_master` (
  `id` int(11) UNSIGNED NOT NULL,
  `prioirty_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priority_master`
--

INSERT INTO `priority_master` (`id`, `prioirty_name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High'),
(4, 'Severe');

-- --------------------------------------------------------

--
-- Table structure for table `roles_master`
--

CREATE TABLE `roles_master` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_master`
--

INSERT INTO `roles_master` (`role_id`, `role_name`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', 1, '2024-03-14 12:00:26', '2024-03-14 12:00:49'),
(2, 'branch user', 1, '2024-03-14 12:00:26', '2024-03-14 12:00:49'),
(3, 'department head', 1, '2024-03-14 12:00:26', '2024-03-14 12:00:49'),
(4, 'support agentthh', 1, '2024-03-14 12:00:26', '2024-03-22 20:31:03'),
(5, 'Technical Support Heads', 1, '2024-03-14 12:00:26', '2024-03-22 20:44:07');

--
-- Triggers `roles_master`
--
DELIMITER $$
CREATE TRIGGER `update_modified_on_roles_master` BEFORE UPDATE ON `roles_master` FOR EACH ROW BEGIN
    SET NEW.updated_on = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission_mapping`
--

CREATE TABLE `role_permission_mapping` (
  `id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission_mapping`
--

INSERT INTO `role_permission_mapping` (`id`, `per_id`, `role_id`, `is_access`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 2, 1),
(7, 2, 4, 1),
(8, 3, 1, 0),
(9, 3, 2, 1),
(10, 3, 3, 0),
(11, 3, 4, 0),
(12, 3, 5, 0),
(13, 4, 3, 1),
(14, 4, 4, 1),
(15, 4, 5, 1),
(16, 5, 3, 0),
(17, 5, 5, 1),
(18, 6, 2, 0),
(19, 6, 4, 1),
(20, 7, 3, 1),
(21, 7, 4, 1),
(22, 7, 5, 1),
(23, 8, 1, 1),
(24, 8, 2, 1),
(25, 8, 3, 1),
(26, 8, 4, 1),
(27, 8, 5, 1),
(28, 9, 1, 1),
(29, 9, 2, 0),
(30, 9, 3, 1),
(31, 9, 4, 0),
(32, 9, 5, 1),
(33, 10, 1, 1),
(34, 11, 1, 1),
(35, 12, 1, 1),
(36, 13, 1, 1),
(37, 14, 1, 1),
(38, 15, 1, 1),
(39, 16, 1, 1),
(40, 17, 1, 1),
(41, 18, 1, 1),
(42, 19, 1, 1),
(43, 20, 5, 1),
(44, 21, 5, 1),
(45, 22, 5, 1),
(46, 23, 5, 1),
(47, 24, 5, 1),
(48, 25, 5, 1),
(49, 26, 5, 1),
(50, 27, 5, 1),
(51, 28, 5, 1),
(52, 29, 5, 1),
(53, 30, 5, 1),
(54, 31, 5, 1),
(55, 32, 3, 1),
(56, 32, 5, 1),
(57, 33, 3, 1),
(58, 33, 5, 1),
(59, 34, 3, 1),
(60, 34, 5, 1),
(61, 35, 3, 1),
(62, 35, 5, 1),
(63, 36, 3, 1),
(64, 36, 5, 1),
(65, 37, 3, 1),
(66, 37, 5, 1),
(67, 12, 2, 1),
(68, 12, 3, 1),
(69, 12, 4, 1),
(70, 12, 5, 1),
(71, 5, 2, 0),
(72, 5, 4, 1),
(73, 39, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_activity`
--

CREATE TABLE `ticket_activity` (
  `id` int(11) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `assigned_unit_id` int(11) UNSIGNED DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_changed_on` datetime DEFAULT NULL,
  `status_changed_by` int(11) DEFAULT NULL,
  `transferred_to` int(11) UNSIGNED DEFAULT NULL,
  `transferred_by` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_activity`
--

INSERT INTO `ticket_activity` (`id`, `ticket_id`, `assigned_unit_id`, `assigned_to`, `remarks`, `status`, `status_changed_on`, `status_changed_by`, `transferred_to`, `transferred_by`, `last_modified`) VALUES
(1, 3, 1, 25, 'New Ticket', 1, '2024-03-14 10:45:57', 24, NULL, NULL, '2024-03-14 11:30:45'),
(14, 16, 1, 2, 'New Ticket', 1, '2024-03-21 11:42:01', 26, NULL, NULL, '2024-03-21 11:42:01'),
(16, 17, 1, 2, 'New Ticket', 1, '2024-03-21 11:53:24', 26, NULL, NULL, '2024-03-21 11:53:24'),
(27, 17, 1, 26, 'Ticket Assigned From User: Unassigned To User: PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-21 13:12:39'),
(28, 17, 1, 26, 'Status Changed From Status: Open To Status: Work In Progress', 2, '2024-03-21 13:13:31', 26, NULL, NULL, '2024-03-21 13:13:31'),
(29, 17, 3, 26, 'Ticket Tranfered Technical Support Unitt -> General Applicationsss', 2, NULL, NULL, 3, 26, '2024-03-21 14:42:52'),
(30, 17, 2, 26, 'Ticket Transfered General Applicationsss => Branch', 2, NULL, NULL, 2, 26, '2024-03-21 14:44:08'),
(31, 17, 2, 26, 'Status Changed From Status: Work In Progress To Status: Closed', 3, '2024-03-21 20:32:42', 26, NULL, NULL, '2024-03-21 20:32:42'),
(32, 17, 2, 26, 'Status Changed From Status: Closed To Status: Open', 1, '2024-03-21 20:56:26', 26, NULL, NULL, '2024-03-21 20:56:26'),
(33, 17, 2, 29, 'Ticket Assigned From User: PF232182 To User: PF232188', 1, NULL, NULL, NULL, NULL, '2024-03-21 21:32:04'),
(34, 17, 2, 29, 'Status Changed From Status: Open To Status: Work In Progress', 2, '2024-03-21 21:33:55', 26, NULL, NULL, '2024-03-21 21:33:55'),
(35, 17, 5, 29, 'Ticket Transfered: Branch => ATM Management Unit', 2, NULL, NULL, 5, 25, '2024-03-21 22:19:50'),
(37, 20, 1, 2, 'New Ticket', 1, '2024-03-21 23:14:22', 24, NULL, NULL, '2024-03-21 23:14:22'),
(38, 21, 1, 2, 'New Ticket', 1, '2024-03-21 23:43:03', 24, NULL, NULL, '2024-03-21 23:43:03'),
(39, 21, 1, 29, 'Ticket Agent Updated: Unassigned => PF232188', 1, NULL, NULL, NULL, NULL, '2024-03-21 23:45:00'),
(40, 22, 1, 2, 'New Ticket', 1, '2024-03-22 00:13:49', 27, NULL, NULL, '2024-03-22 00:13:49'),
(41, 22, 1, 29, 'Ticket Agent Updated: Unassigned => PF232188', 1, NULL, NULL, NULL, NULL, '2024-03-22 00:32:13'),
(42, 5, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-22 02:04:15'),
(43, 6, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-22 02:04:38'),
(44, 7, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-22 02:05:57'),
(45, 8, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-22 02:07:00'),
(46, 20, 1, 2, 'Status Changed: Open => Work In Progress', 2, '2024-03-22 02:08:46', 26, NULL, NULL, '2024-03-22 02:08:46'),
(47, 20, 1, 2, 'Status Changed: Work In Progress => Approval Pending', 5, '2024-03-22 02:09:12', 26, NULL, NULL, '2024-03-22 02:09:12'),
(48, 20, 1, 2, 'Status Changed: Approval Pending => Approved', 6, '2024-03-22 02:45:01', 25, NULL, NULL, '2024-03-22 02:45:01'),
(49, 17, 1, 29, 'Status Changed: Work In Progress => Approval Pending', 5, '2024-03-22 16:12:40', 25, NULL, NULL, '2024-03-22 16:14:18'),
(50, 17, 1, 29, 'Ticket Transfered: ATM Management Unit => Technical Support Unitt', 5, NULL, NULL, 1, 25, '2024-03-22 16:15:12'),
(51, 17, 1, 29, 'Status Changed: Approval Pending => Approved', 6, '2024-03-22 16:21:04', 25, NULL, NULL, '2024-03-22 16:21:04'),
(52, 23, 1, 2, 'New Ticket', 1, '2024-03-22 18:00:11', 24, NULL, NULL, '2024-03-22 18:00:11'),
(53, 24, 1, 2, 'New Ticket', 1, '2024-03-22 18:06:42', 24, NULL, NULL, '2024-03-22 18:06:42'),
(54, 25, 1, 2, 'New Ticket', 1, '2024-03-22 18:20:15', 24, NULL, NULL, '2024-03-22 18:20:15'),
(55, 26, 1, 2, 'New Ticket', 1, '2024-03-22 18:22:24', 24, NULL, NULL, '2024-03-22 18:22:24'),
(56, 27, 1, 2, 'New Ticket', 1, '2024-03-22 18:36:26', 24, NULL, NULL, '2024-03-22 18:36:26'),
(57, 28, 1, 2, 'New Ticket', 1, '2024-03-22 18:37:36', 24, NULL, NULL, '2024-03-22 18:37:36'),
(58, 29, 1, 2, 'New Ticket', 1, '2024-03-22 18:38:58', 24, NULL, NULL, '2024-03-22 18:38:58'),
(59, 30, 1, 2, 'New Ticket', 1, '2024-03-22 19:23:55', 24, NULL, NULL, '2024-03-22 19:23:55'),
(60, 9, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-23 01:43:42'),
(61, 3, 1, 25, 'Status Changed: Open => Invalid', 7, '2024-03-23 01:52:01', NULL, NULL, NULL, '2024-03-23 01:52:01'),
(62, 31, 1, 2, 'New Ticket', 1, '2024-03-23 08:31:16', 26, NULL, NULL, '2024-03-23 08:31:16'),
(63, 32, 1, 2, 'New Ticket', 1, '2024-03-23 08:35:40', 26, NULL, NULL, '2024-03-23 08:35:40'),
(64, 32, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-23 08:38:37'),
(65, 10, 1, 26, 'Ticket Agent Updated: Unassigned => PF232182', 1, NULL, NULL, NULL, NULL, '2024-03-23 08:39:01'),
(66, 32, 1, 26, 'Status Changed: Open => Work In Progress', 2, '2024-03-23 08:39:48', 26, NULL, NULL, '2024-03-23 08:39:48'),
(67, 32, 1, 26, 'Status Changed: Work In Progress => Closed', 3, '2024-03-23 08:40:39', 26, NULL, NULL, '2024-03-23 08:40:39'),
(68, 18, 1, 26, 'Status Changed: Closed => Approval Pending', 5, '2024-03-23 08:58:44', 34, NULL, NULL, '2024-03-23 08:58:44'),
(69, 18, 1, 26, 'Status Changed: Approval Pending => Approved', 6, '2024-03-23 08:59:23', 34, NULL, NULL, '2024-03-23 08:59:23');

--
-- Triggers `ticket_activity`
--
DELIMITER $$
CREATE TRIGGER `notification` AFTER INSERT ON `ticket_activity` FOR EACH ROW BEGIN

	DECLARE createdby VARCHAR(255);
	
	SELECT created_by INTO createdby
    FROM ticket_master
    WHERE id = NEW.ticket_id;
	
    INSERT INTO log_notification_info (ticket_id,log,added_on,created_by,assigned_to,assigned_unit,mark_as_read)
    VALUES (NEW.ticket_id ,NEW.remarks,NOW(),createdby,NEW.assigned_to,NEW.assigned_unit_id,0);
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_modified_on_ticket_activity` BEFORE UPDATE ON `ticket_activity` FOR EACH ROW SET NEW.last_modified = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachment`
--

CREATE TABLE `ticket_attachment` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_form_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_attachment`
--

INSERT INTO `ticket_attachment` (`id`, `ticket_form_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 3, 'Attachement_29', '1711112935_259e862afd170b4ff4b1.pdf', NULL, NULL),
(2, 30, 'Attachement_30', '1711115631_dbd543f4cf74d6c155c6.pdf', NULL, NULL),
(3, 31, 'Attachement_31', '', '2024-03-23 03:01:16', '2024-03-23 03:01:16'),
(4, 32, 'Attachement_32', '1711163135_a62d543622e549efde6b.pdf', '2024-03-23 03:05:40', '2024-03-23 03:05:40');

--
-- Triggers `ticket_attachment`
--
DELIMITER $$
CREATE TRIGGER `attachement_set_date` BEFORE INSERT ON `ticket_attachment` FOR EACH ROW BEGIN 
    SET NEW.created_at = NOW(); 
    SET NEW.updated_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_master`
--

CREATE TABLE `ticket_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch` varchar(100) NOT NULL,
  `pf_number` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `incedent_category` enum('Hardware','Software','','') NOT NULL,
  `issue_id` int(11) NOT NULL,
  `hardware_type_id` int(11) DEFAULT 1,
  `hardware_brand_id` int(11) DEFAULT 1,
  `hardware_model_id` int(11) DEFAULT 1,
  `ip_address` varchar(20) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `priority` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `current_assigned_unit` int(11) UNSIGNED DEFAULT NULL,
  `assigned_to` int(11) DEFAULT 2,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `user_rating` enum('0','1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_master`
--

INSERT INTO `ticket_master` (`id`, `branch`, `pf_number`, `name`, `contact_no`, `incedent_category`, `issue_id`, `hardware_type_id`, `hardware_brand_id`, `hardware_model_id`, `ip_address`, `content`, `priority`, `created_on`, `created_by`, `status`, `current_assigned_unit`, `assigned_to`, `modified_on`, `modified_by`, `user_rating`) VALUES
(3, '', '207432', 'Chathura', '0711849601', 'Software', 1, 2, 3, 4, '', 'PC slowness', 1, '2024-03-14 10:45:57', 24, 7, 1, 25, '2024-03-23 01:52:01', NULL, '0'),
(4, '', '207432', 'Chathura', '0711849601', 'Software', 2, 1, 1, 1, '172.20.106.60', 'T4S Install', 2, '2024-03-14 11:41:49', 24, 1, 2, 2, '2024-03-18 21:59:09', NULL, '0'),
(5, '', '207713', 'Chinthaka', '0711846046', 'Software', 1, 2, 1, 1, '172.20.106.60', '', 2, '2024-03-14 13:20:12', 27, 1, 1, 26, '2024-03-22 02:04:15', 26, '0'),
(6, '', '207432', 'Chathura', '0711849601', 'Software', 2, 1, 1, 1, '172.20.106.55', 'dd', 1, '2024-03-19 06:59:31', 24, 1, 1, 26, '2024-03-22 02:04:38', 26, '0'),
(7, '', '207432', 'Chathura', '0711849601', 'Software', 2, 1, 1, 1, '172.20.106.55', 'dd', 1, '2024-03-19 06:59:58', 24, 1, 1, 26, '2024-03-22 02:05:57', 26, '0'),
(8, '', '207432', 'Chathura', '0711846046', 'Software', 2, 1, 1, 1, '172.20.106.55', 'ss', 3, '2024-03-19 07:01:48', 24, 1, 1, 26, '2024-03-22 02:07:00', 26, '0'),
(9, '', '207432', 'Chathura', '0711846046', 'Software', 2, 1, 1, 1, '172.20.106.55', 'ss', 3, '2024-03-19 07:04:29', 24, 1, 1, 26, '2024-03-23 01:43:42', 26, '0'),
(10, '', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 4, 1, 1, 1, '1.1.1.1', '', 1, '2024-03-19 19:22:00', 24, 1, 1, 26, '2024-03-23 08:39:01', 26, '0'),
(11, '', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 2, 1, 1, 1, '1.1.1.1', '', 1, '2024-03-19 19:26:05', 24, 1, 1, 2, NULL, NULL, '0'),
(12, '', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 5, 1, 1, '', '', 1, '2024-03-19 21:51:22', 24, 1, 1, 2, NULL, NULL, '0'),
(13, '', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 2, 1, 1, '', '', 2, '2024-03-19 21:56:20', 24, 1, 1, 2, NULL, NULL, '0'),
(14, '', 'PF207432', 'Chathura Dulanga', '0711849601', 'Hardware', 1, 2, 1, 1, '', '', 2, '2024-03-19 22:00:45', 24, 1, 1, 2, NULL, NULL, '0'),
(15, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-19 22:30:49', 24, 1, 1, 2, '2024-03-19 22:36:32', NULL, '0'),
(16, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '172.20.106.55', 'vvvv', 1, '2024-03-21 11:42:01', 26, 1, 1, 2, '2024-03-21 11:59:22', NULL, '0'),
(17, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-21 11:53:24', 24, 6, 1, 29, '2024-03-22 16:21:04', 25, '0'),
(18, 'Branch', 'PF207713', 'Chinthaka Pushpakumara', '0711846046', 'Hardware', 1, 2, 3, 4, '172.20.106.55', 'ddddd', 2, '2024-03-21 12:04:11', 26, 6, 1, 26, '2024-03-23 08:59:23', 34, '0'),
(20, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Hardware', 1, 1, 1, 1, '172.20.106.55', 'tttt', 3, '2024-03-21 23:14:22', 24, 6, 1, 2, '2024-03-22 02:45:01', 25, '0'),
(21, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Hardware', 1, 1, 1, 1, '', '', 3, '2024-03-21 23:43:03', 24, 1, 1, 29, '2024-03-21 23:45:00', 26, '0'),
(22, 'Branch', 'PF207713', 'Chinthaka Pushpakumara', '0711846046', 'Software', 1, 1, 1, 1, '', '', 2, '2024-03-22 00:13:49', 27, 1, 1, 29, '2024-03-22 00:32:13', 25, '0'),
(23, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:00:11', 24, 1, 1, 2, '2024-03-22 18:00:11', NULL, '0'),
(24, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:06:42', 24, 1, 1, 2, '2024-03-22 18:06:42', NULL, '0'),
(25, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:20:15', 24, 1, 1, 2, '2024-03-22 18:20:15', NULL, '0'),
(26, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:22:24', 24, 1, 1, 2, '2024-03-22 18:22:24', NULL, '0'),
(27, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:36:26', 24, 1, 1, 2, '2024-03-22 18:36:26', NULL, '0'),
(28, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 18:37:36', 24, 1, 1, 2, '2024-03-22 18:37:36', NULL, '0'),
(29, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 2, '2024-03-22 18:38:58', 24, 1, 1, 2, '2024-03-22 18:38:58', NULL, '0'),
(30, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-22 19:23:55', 24, 1, 1, 2, '2024-03-22 19:23:55', NULL, '0'),
(31, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-23 08:31:16', 26, 1, 1, 2, '2024-03-23 08:31:16', NULL, '0'),
(32, 'Technical Support Unitt', 'PF207432', 'Chathura Dulanga', '0711849601', 'Software', 1, 1, 1, 1, '', '', 1, '2024-03-23 08:35:40', 26, 3, 1, 26, '2024-03-23 08:40:39', 26, '0');

--
-- Triggers `ticket_master`
--
DELIMITER $$
CREATE TRIGGER `insert_ticket_activity_new_ticket` AFTER INSERT ON `ticket_master` FOR EACH ROW BEGIN
    INSERT INTO ticket_activity (ticket_id,assigned_unit_id,assigned_to,status,remarks,status_changed_on,status_changed_by,last_modified)
    VALUES (NEW.id, NEW.current_assigned_unit,NEW.assigned_to,NEW.status,'New Ticket', NOW(),NEW.created_by,NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_created_on_ticket_master` BEFORE INSERT ON `ticket_master` FOR EACH ROW BEGIN 
    SET NEW.created_on = NOW(); 
    SET NEW.modified_on = NOW(); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_assigned_to_ticket_activity` AFTER UPDATE ON `ticket_master` FOR EACH ROW BEGIN

	DECLARE new_assigner VARCHAR(255);
	DECLARE old_assigner VARCHAR(255);

    SELECT user_name INTO new_assigner
    FROM user_master
    WHERE id = NEW.assigned_to;
	
	SELECT user_name INTO old_assigner
    FROM user_master
    WHERE id = OLD.assigned_to;
	
    IF OLD.assigned_to <> NEW.assigned_to THEN
        INSERT INTO ticket_activity (ticket_id,assigned_unit_id,assigned_to,remarks,status,last_modified)
        VALUES (NEW.id,NEW.current_assigned_unit,NEW.assigned_to,CONCAT('Ticket Agent Updated: ',old_assigner,' => ',new_assigner),NEW.status,NOW());
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_modified_on_ticket_master` BEFORE UPDATE ON `ticket_master` FOR EACH ROW SET NEW.modified_on = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_ticket_activity` AFTER UPDATE ON `ticket_master` FOR EACH ROW BEGIN

	DECLARE new_status VARCHAR(255);
	DECLARE old_status VARCHAR(255);

    SELECT description INTO new_status
    FROM ticket_status_master
    WHERE id = NEW.status;
	
	SELECT description INTO old_status
    FROM ticket_status_master
    WHERE id = OLD.status;
	
    IF OLD.status <> NEW.status THEN             
INSERT INTO ticket_activity (ticket_id,assigned_unit_id,assigned_to,remarks,status,status_changed_on,status_changed_by,last_modified)
        VALUES (NEW.id,NEW.current_assigned_unit,NEW.assigned_to,CONCAT('Status Changed: ',old_status,' => ',new_status),NEW.status,NOW(),NEW.modified_by,NOW());
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transfer_ticket_activity` AFTER UPDATE ON `ticket_master` FOR EACH ROW BEGIN
	DECLARE new_assigned_unit_name VARCHAR(255);
	DECLARE old_assigned_unit_name VARCHAR(255);

    SELECT name INTO new_assigned_unit_name
    FROM units
    WHERE id = NEW.current_assigned_unit;
	
	SELECT name INTO old_assigned_unit_name
    FROM units
    WHERE id = OLD.current_assigned_unit;
	
    IF OLD.current_assigned_unit  <> NEW.current_assigned_unit  THEN             
INSERT INTO ticket_activity (ticket_id,assigned_unit_id,assigned_to,remarks,status,transferred_to,transferred_by,last_modified)
        VALUES (NEW.id,NEW.current_assigned_unit,NEW.assigned_to,CONCAT('Ticket Transfered: ',old_assigned_unit_name,' => ',new_assigned_unit_name),NEW.status,NEW.current_assigned_unit,NEW.modified_by,NOW());
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status_master`
--

CREATE TABLE `ticket_status_master` (
  `id` int(10) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_status_master`
--

INSERT INTO `ticket_status_master` (`id`, `description`) VALUES
(1, 'Open'),
(2, 'Work In Progress'),
(3, 'Closed'),
(4, 'Re-Opened'),
(5, 'Approval Pending'),
(6, 'Approved'),
(7, 'Invalid');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Technical Support Unitt', 'techsup@boc.lk', 1, '2023-12-11 22:21:08', '2024-03-18 00:00:00'),
(2, 'Branch', 'bocbr@boc.lk', 1, '2023-12-18 16:57:09', '2024-02-05 00:00:00'),
(3, 'General Applicationsss', 'generalapp@boc.lk', 1, '2024-02-05 00:00:00', '2024-03-18 00:00:00'),
(4, 'Ticket Admin', 'ticketadmin@boc.lk', 1, '2024-03-02 15:05:39', '2024-03-21 21:55:54'),
(5, 'ATM Management Unit', 'atmmanage@boc.lk', 1, '2024-02-05 00:00:00', '2024-02-05 00:00:00'),
(23, 'cc', 'cc', 1, '2024-03-23 11:51:07', '2024-03-23 11:51:07');

--
-- Triggers `units`
--
DELIMITER $$
CREATE TRIGGER `set_created_and_updated_on_units` BEFORE INSERT ON `units` FOR EACH ROW BEGIN 
    SET NEW.created_at = NOW(); 
    SET NEW.updated_at = NOW(); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_modified_on_units` BEFORE UPDATE ON `units` FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `active` int(2) NOT NULL,
  `ext` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `primary_unit` int(11) UNSIGNED DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '1.png',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `mobile`, `active`, `ext`, `role`, `primary_unit`, `avatar`, `created_on`, `updated_on`) VALUES
(1, 'admin', '$2y$10$vs6s7C3N2mcwKRgaCHLuYuNi..aOKVejBK9b5UK58o4KdyuJVeL5m', 'administratorr', 'Helpdesk', 'ticketadmin@boc.lk', '0112113539', 1, '13539', 1, 4, '9.png', '2024-03-01 06:42:38', '2024-03-23 06:42:57'),
(2, 'Unassigned', '$2y$10$rwyTClhT/jRcyTCK2B.2KeOvuYq1Dh7i0ay53S17664FvMWBngzOK', 'Default Assigned User', 'Default Assigned User', 'default@boc.lk', '0711123456', 0, '', 4, 1, '1.png', '2024-03-18 16:25:38', '2024-03-23 01:05:53'),
(24, 'PF207432', '$2y$10$AnydNRKUkufAdRWlAlXqKOQEaTjR//qG4wV2qQQDpZfnhhEefCqqy', 'Chathura', 'Dulanga', 'chathura@boc.lk', '0711849601', 1, '13539', 2, 1, '3.png', '2024-03-14 10:05:18', NULL),
(25, 'PF232158', '$2y$10$A3ztm2MkCB87H6IkK7FV8OLc/K6zNLurX68NJHOWLOxKFN7yHBgom', 'Sulakkana', 'Tennakoon', 'sulakkana@boc.lk', '0711846046', 1, '15335', 3, 1, '2.png', '2024-03-14 10:06:46', '2024-03-14 11:52:31'),
(26, 'PF232182', '$2y$10$mBzes8aCsJVNq6AwlN4ONOx7f84RRYSP58LkePHk705I3fXx9F4yS', 'Charitha', 'Bandara', 'charitha@boc.lk', '0711849646', 1, '13535', 4, 1, '4.png', '2024-03-14 10:07:42', '2024-03-18 15:23:32'),
(27, 'PF207713', '$2y$10$5ygWCdjfnT9VWAW6452JReeoQy52KbDDgj4JMKfjjF/jvfOfwszkm', 'Chinthaka', 'Pushpakumara', 'chinthaka@boc.lk', '0711846046', 1, '3548', 2, 2, '3.png', '2024-03-14 13:14:57', NULL),
(29, 'PF232188', '$2y$10$l2s0v8c/N98b0tGVik51GOlvH.hSkgKUXkr4qKZ42GgGNnzlUET5G', 'Piyumi', 'Jagoda', 'charitha@boc.lk', '0711849646', 0, '13535', 4, 3, '4.png', '2024-03-21 21:31:03', '2024-03-23 06:45:48'),
(30, 'PF207736', '$2y$10$IRe89jfrZ1PtN2ed34QMNeikVDRUUa4JwgR3K2JqmAyPOY3XHZ0Oe', 'Akalanka', 'Kaluwalgoda', 'ddd@b.k', '0711849601', 1, '13539', 3, 3, '6.png', '2024-03-22 20:28:36', NULL),
(34, 'PF203100', '$2y$10$IYKcH/AYVSEm7KmEso0MY.FgGk3gYfu2bDNaYM7ahLUjv2.WnOmYi', 'Sachith', 'Wijerathne', 'sachith@boc.lk', '0711234565', 1, '13539', 3, 1, '6.png', '2024-03-23 06:48:04', '2024-03-23 07:05:59'),
(35, 'PF207111', '$2y$10$qmX5gNT7iz8yYWkCN4z.TesAdDI/e8hK5HU4y0dRQVr5YuslvkjWy', 'Sanjeewa', 'Nissanka', 'sanjeewa@boc.lk', '0711223456', 1, '13533', 4, 1, '3.png', '2024-03-23 06:50:36', '2024-03-23 06:50:36'),
(36, 'PF207222', '$2y$10$HATCv4xDM71Oqi5zWSvVqOCdM2YNHs36TzHwvMENXAQHYD6VIEloO', 'Kasun', 'Silva', 'kasun@boc.lk', '0711845123', 1, '13534', 4, 1, '8.png', '2024-03-23 06:52:40', '2024-03-23 06:52:40'),
(37, 'PF207333', '$2y$10$vOUGq/hXdkellH.QN8qTbO/JeIzE2dp4w.b37EGVDenkQ3.Bq9aMu', 'Thilina', 'Bandara', 'thilina@boc.lk', '0711849644', 1, '13534', 4, 5, '8.png', '2024-03-23 06:55:01', '2024-03-23 06:55:01'),
(38, 'PF207444', '$2y$10$CIiWB1FH2BWwY2A0uSNZhO4XId58nUYkztMtUbv3GvMrG8y5tu0.K', 'Thilanga', 'Lakmal', 'thilanga@boc.lk', '0711849666', 1, '13562', 4, 3, '9.png', '2024-03-23 06:56:58', '2024-03-23 06:56:58'),
(39, 'PF203200', '$2y$10$Qpkh94RmCQYoDLr42EURPuCuPFDNlaYodWE0UuAtEKcSyN1ckZN1S', 'Rinos', 'Mohomad', 'rinos@boc.lk', '0711846000', 1, '13562', 3, 3, '9.png', '2024-03-23 07:07:53', '2024-03-23 07:07:53'),
(40, 'PF203300', '$2y$10$zU7d.T/tOpnlY6yXA/FnYOK/xerPpGwu3w1gzFWTZYnvKGjt34mwy', 'Rathnasiri', 'Wijerathna', 'rathna@boc.lk', '0711849644', 1, '13545', 3, 5, '9.png', '2024-03-23 07:10:06', '2024-03-23 07:10:06');

--
-- Triggers `user_master`
--
DELIMITER $$
CREATE TRIGGER `set_created_on_user_master` BEFORE INSERT ON `user_master` FOR EACH ROW SET NEW.created_on = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update update_on` BEFORE UPDATE ON `user_master` FOR EACH ROW SET NEW.updated_on = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_modified_on_user_Master` BEFORE INSERT ON `user_master` FOR EACH ROW SET NEW.updated_on = NOW()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hardware_brands`
--
ALTER TABLE `hardware_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_models`
--
ALTER TABLE `hardware_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_types`
--
ALTER TABLE `hardware_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_type_brand_model_mapping`
--
ALTER TABLE `hardware_type_brand_model_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hwbrand` (`bid`),
  ADD KEY `fk_hwmodel` (`mid`),
  ADD KEY `fk_hwtype` (`tid`);

--
-- Indexes for table `issue_base`
--
ALTER TABLE `issue_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_unit_mapping`
--
ALTER TABLE `issue_unit_mapping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issue_id` (`issue_id`),
  ADD KEY `fk_unitkey` (`uid`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_attempts_ibfk_1` (`user_id`);

--
-- Indexes for table `log_notification_info`
--
ALTER TABLE `log_notification_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket` (`ticket_id`);

--
-- Indexes for table `log_user_actions`
--
ALTER TABLE `log_user_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_master`
--
ALTER TABLE `permission_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority_master`
--
ALTER TABLE `priority_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_master`
--
ALTER TABLE `roles_master`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission_mapping`
--
ALTER TABLE `role_permission_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`role_id`),
  ADD KEY `fk_perm` (`per_id`);

--
-- Indexes for table `ticket_activity`
--
ALTER TABLE `ticket_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_assigned_unit` (`assigned_unit_id`),
  ADD KEY `fk_assigned_user` (`assigned_to`),
  ADD KEY `fk_status` (`status`),
  ADD KEY `fk_transfered_by` (`transferred_by`),
  ADD KEY `fk_transfered_unit` (`transferred_to`),
  ADD KEY `fk_status_updated_by` (`status_changed_by`),
  ADD KEY `fk_ticket_id` (`ticket_id`);

--
-- Indexes for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticketdata` (`ticket_form_id`);

--
-- Indexes for table `ticket_master`
--
ALTER TABLE `ticket_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`),
  ADD KEY `fk_hw_brand` (`hardware_brand_id`),
  ADD KEY `fk_hw_model` (`hardware_model_id`),
  ADD KEY `fk_hw_type` (`hardware_type_id`),
  ADD KEY `fk_issue_key` (`issue_id`),
  ADD KEY `fk_priority` (`priority`),
  ADD KEY `fk_status_key` (`status`),
  ADD KEY `fk_units` (`current_assigned_unit`);

--
-- Indexes for table `ticket_status_master`
--
ALTER TABLE `ticket_status_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_u` (`role`),
  ADD KEY `fk_unit` (`primary_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hardware_brands`
--
ALTER TABLE `hardware_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hardware_models`
--
ALTER TABLE `hardware_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hardware_types`
--
ALTER TABLE `hardware_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hardware_type_brand_model_mapping`
--
ALTER TABLE `hardware_type_brand_model_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issue_base`
--
ALTER TABLE `issue_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issue_unit_mapping`
--
ALTER TABLE `issue_unit_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_notification_info`
--
ALTER TABLE `log_notification_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `log_user_actions`
--
ALTER TABLE `log_user_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permission_master`
--
ALTER TABLE `permission_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `priority_master`
--
ALTER TABLE `priority_master`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles_master`
--
ALTER TABLE `roles_master`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_permission_mapping`
--
ALTER TABLE `role_permission_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ticket_activity`
--
ALTER TABLE `ticket_activity`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_master`
--
ALTER TABLE `ticket_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ticket_status_master`
--
ALTER TABLE `ticket_status_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hardware_type_brand_model_mapping`
--
ALTER TABLE `hardware_type_brand_model_mapping`
  ADD CONSTRAINT `fk_hwbrand` FOREIGN KEY (`bid`) REFERENCES `hardware_brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hwmodel` FOREIGN KEY (`mid`) REFERENCES `hardware_models` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hwtype` FOREIGN KEY (`tid`) REFERENCES `hardware_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `issue_unit_mapping`
--
ALTER TABLE `issue_unit_mapping`
  ADD CONSTRAINT `fk_issue` FOREIGN KEY (`issue_id`) REFERENCES `issue_base` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitkey` FOREIGN KEY (`uid`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_notification_info`
--
ALTER TABLE `log_notification_info`
  ADD CONSTRAINT `fk_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_permission_mapping`
--
ALTER TABLE `role_permission_mapping`
  ADD CONSTRAINT `fk_perm` FOREIGN KEY (`per_id`) REFERENCES `permission_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `roles_master` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  ADD CONSTRAINT `fk_ticketdata` FOREIGN KEY (`ticket_form_id`) REFERENCES `ticket_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
