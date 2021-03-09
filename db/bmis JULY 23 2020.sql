-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 07:39 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay_clearance_tbl`
--

CREATE TABLE `barangay_clearance_tbl` (
  `brgy_clearance_id` varchar(255) NOT NULL,
  `resident_id` varchar(255) DEFAULT NULL,
  `brgy_id_fk_clerance` varchar(255) DEFAULT NULL,
  `sitio_id_fk_clearance` varchar(255) DEFAULT NULL,
  `purpose` text NOT NULL,
  `or_number` char(50) NOT NULL,
  `cedula_number` char(50) NOT NULL,
  `date_issued_or` varchar(40) NOT NULL,
  `date_issued_cedula` varchar(50) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blotter_tbl`
--

CREATE TABLE `blotter_tbl` (
  `blotter_id` varchar(255) NOT NULL,
  `resident_id_fk` varchar(255) DEFAULT NULL,
  `respondent_id_fk` varchar(255) DEFAULT NULL,
  `brgy_id_fk` varchar(255) DEFAULT NULL,
  `incident_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime_report` varchar(50) NOT NULL,
  `datetimeincident` varchar(50) NOT NULL,
  `incident_loc` varchar(100) NOT NULL,
  `complainant_sitio_fk` varchar(255) DEFAULT NULL,
  `respondent_sitio_fk` varchar(255) DEFAULT NULL,
  `blotter_report` text NOT NULL,
  `schedule_date` varchar(40) NOT NULL,
  `timeofSched` varchar(40) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blotter_tbl`
--

INSERT INTO `blotter_tbl` (`blotter_id`, `resident_id_fk`, `respondent_id_fk`, `brgy_id_fk`, `incident_type`, `status`, `datetime_report`, `datetimeincident`, `incident_loc`, `complainant_sitio_fk`, `respondent_sitio_fk`, `blotter_report`, `schedule_date`, `timeofSched`, `date_created`, `date_updated`) VALUES
('BLO-STA-CRUZ-LANDY-85109-oElgTHIC', 'RESIDENT-STA-CRUZ-LANDY-85109-bP9QLGkU', 'RESIDENT-STA-CRUZ-LANDY-85109-n9KvAIi7', 'STA-CRUZ-LANDY-85109', 'kidnapping', 'SETTLED', '04/27/2020 06:17:21 am', '04/22/2020 09:16 PM', 'Landy SCM', 'SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', 'SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', '<p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p>this is to inform the&nbsp;</p><p><br></p>', '04/27/2020', '09:18 PM', '2020-04-27 04:17:21', '2020-04-27 04:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_tbl`
--

CREATE TABLE `brgy_tbl` (
  `brgy_id` varchar(255) NOT NULL,
  `brgy_name` varchar(50) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brgy_tbl`
--

INSERT INTO `brgy_tbl` (`brgy_id`, `brgy_name`, `date_created`, `date_updated`) VALUES
('STA-CRUZ-BAGONGSILANG-81937', 'BAGONG SILANG', '2020-04-27 03:35:00', '2020-04-27 03:35:00'),
('STA-CRUZ-BANAHAW-09736', 'BANAHAW', '2020-04-27 03:34:33', '2020-04-27 03:34:33'),
('STA-CRUZ-LANDY-85109', 'LANDY', '2020-04-21 16:45:13', '2020-04-21 16:45:13'),
('STA-CRUZ-LIPA-02819', 'LIPA', '2020-04-21 16:45:22', '2020-04-21 16:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `businesspermit_tbl`
--

CREATE TABLE `businesspermit_tbl` (
  `business_id` varchar(255) NOT NULL,
  `resident_id_fk` varchar(255) DEFAULT NULL,
  `brgy_id_fk` varchar(255) DEFAULT NULL,
  `sitio_id_fk_bus` varchar(255) DEFAULT NULL,
  `trade_activity` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `operator_manager` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date_apply` varchar(40) DEFAULT NULL,
  `date_renew` varchar(40) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `business_cedula` int(50) NOT NULL,
  `date_issued_cedula` varchar(40) NOT NULL,
  `business_or` int(50) NOT NULL,
  `date_issued_or` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesspermit_tbl`
--

INSERT INTO `businesspermit_tbl` (`business_id`, `resident_id_fk`, `brgy_id_fk`, `sitio_id_fk_bus`, `trade_activity`, `location`, `operator_manager`, `address`, `date_apply`, `date_renew`, `date_created`, `date_updated`, `business_cedula`, `date_issued_cedula`, `business_or`, `date_issued_or`) VALUES
('BUS-STA-CRUZ-LANDY-85109-9z6oXCRl', 'RESIDENT-STA-CRUZ-LANDY-85109-4dR8FyP6', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'Furniture ', 'Landy, Santa Cruz, Marinduque', 'Ivan Lawrence Emnace', 'Landy, Santa Cruz, Marinduque', '07/23/2020', NULL, '2020-07-23 02:15:43', '2020-07-23 02:15:43', 22229, '07/23/2020', 12352, '07/23/2020');

-- --------------------------------------------------------

--
-- Table structure for table `businesstype_tbl`
--

CREATE TABLE `businesstype_tbl` (
  `businesstype_id` int(11) NOT NULL,
  `businesstype_name` varchar(50) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesstype_tbl`
--

INSERT INTO `businesstype_tbl` (`businesstype_id`, `businesstype_name`, `date_created`, `date_updated`) VALUES
(1, 'Sari Sari Stores', '0000-00-00 00:00:00', '2020-04-22 02:35:29'),
(2, 'Groceries/Dry Goods Store', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Banks & Financial/Lending Institutions', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Auto Supply and Motorparts ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Furniture', '2020-07-19 04:33:53', '2020-07-19 04:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_tbl`
--

CREATE TABLE `calendar_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cedula_tbl`
--

CREATE TABLE `cedula_tbl` (
  `cedula_id` varchar(255) NOT NULL,
  `cedula_no` char(50) NOT NULL,
  `brgy_id_fk_cedula` varchar(255) DEFAULT NULL,
  `cedula_price` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cedula_tbl`
--

INSERT INTO `cedula_tbl` (`cedula_id`, `cedula_no`, `brgy_id_fk_cedula`, `cedula_price`, `date_created`, `date_updated`) VALUES
('OR-STA-CRUZ-LANDY-85109-oVyTmN7l', '22230', 'STA-CRUZ-LANDY-85109', 60, '2020-04-27 04:01:12', '2020-07-23 02:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `historybrgyofficial_tbl`
--

CREATE TABLE `historybrgyofficial_tbl` (
  `history_id` varchar(255) NOT NULL,
  `history_name` varchar(50) NOT NULL,
  `history_userid` varchar(255) DEFAULT NULL,
  `history_brgy_id_fk` varchar(255) DEFAULT NULL,
  `history_sitio_id_fk` varchar(255) DEFAULT NULL,
  `history_usetype` varchar(30) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historybrgyofficial_tbl`
--

INSERT INTO `historybrgyofficial_tbl` (`history_id`, `history_name`, `history_userid`, `history_brgy_id_fk`, `history_sitio_id_fk`, `history_usetype`, `date_created`) VALUES
('HISTORY-STA-CRUZ-LANDY-85109-bne14HtX', 'KAGAWAD', 'STA-CRUZ-CjKgEdi2', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', 'Kagawad', '2020-05-25 03:10:09'),
('HISTORY-STA-CRUZ-LANDY-85109-PchvOYAe', 'KAGAWAD_2', 'STA-CRUZ-2cbi5DaE', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'Kagawad', '2020-05-25 02:57:32'),
('HISTORY-STA-CRUZ-LANDY-85109-xyfKIqQn', 'KAGAWAD_2', 'STA-CRUZ-2cbi5DaE', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'Kagawad', '2020-05-25 03:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `houseno_tbl`
--

CREATE TABLE `houseno_tbl` (
  `house_id` varchar(255) NOT NULL,
  `house_no` int(11) NOT NULL,
  `brgy_id_fk_house` varchar(255) DEFAULT NULL,
  `sitio_id_fk_house` varchar(255) DEFAULT NULL,
  `house_type` varchar(40) NOT NULL,
  `business_type` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houseno_tbl`
--

INSERT INTO `houseno_tbl` (`house_id`, `house_no`, `brgy_id_fk_house`, `sitio_id_fk_house`, `house_type`, `business_type`, `date_created`, `date_updated`) VALUES
('HOUSENO-STA-CRUZ-LANDY-85109-UrvCw4aV', 160, 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'RESIDENTIAL', 0, '2020-04-27 03:47:23', '2020-04-27 03:47:23'),
('HOUSENO-STA-CRUZ-LANDY-85109-zYLjIpvw', 150, 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', 'COMMERCIAL', 3, '2020-04-27 03:40:04', '2020-04-27 03:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `logo_tbl`
--

CREATE TABLE `logo_tbl` (
  `logo_id` varchar(255) NOT NULL,
  `logo_image` text NOT NULL,
  `barangay_id_logo` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo_tbl`
--

INSERT INTO `logo_tbl` (`logo_id`, `logo_image`, `barangay_id_logo`, `date_created`, `date_updated`) VALUES
('LOGO-STA-CRUZ-LANDY-85109v6dGofmt', '1587495365.png', 'STA-CRUZ-LANDY-85109', '2020-04-21 18:55:38', '2020-04-21 18:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `or_tbl`
--

CREATE TABLE `or_tbl` (
  `or_id` varchar(255) NOT NULL,
  `or_number` char(50) NOT NULL,
  `brgy_id_fk_or` varchar(255) DEFAULT NULL,
  `or_price` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `or_tbl`
--

INSERT INTO `or_tbl` (`or_id`, `or_number`, `brgy_id_fk_or`, `or_price`, `date_created`, `date_updated`) VALUES
('OR-STA-CRUZ-LANDY-85109-31XTGg9M', '12353', 'STA-CRUZ-LANDY-85109', 50, '2020-04-27 04:01:12', '2020-07-23 02:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `religion_tbl`
--

CREATE TABLE `religion_tbl` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(50) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion_tbl`
--

INSERT INTO `religion_tbl` (`religion_id`, `religion_name`, `date_created`, `date_updated`) VALUES
(1, 'Jehovas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Born Again', '0000-00-00 00:00:00', '2020-04-25 04:21:40'),
(3, 'Iglesia ni Kristo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Roman Catholic', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Islam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Seven Adventies', '2020-04-28 06:54:15', '2020-04-28 06:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `resident_tbl`
--

CREATE TABLE `resident_tbl` (
  `resident_id` varchar(255) NOT NULL,
  `house_no_fk` varchar(255) DEFAULT NULL,
  `brgy_id_fk_resident` varchar(255) DEFAULT NULL,
  `sitio_id_fk_resident` varchar(255) DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `bday` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `senior_id` varchar(40) NOT NULL,
  `gender` int(2) NOT NULL,
  `extention_name` varchar(10) DEFAULT NULL,
  `citizenship` varchar(40) DEFAULT NULL,
  `civil_status` int(2) NOT NULL,
  `family_status` int(2) NOT NULL,
  `married_to` varchar(50) NOT NULL,
  `religion` int(2) NOT NULL,
  `religion_specify` varchar(50) NOT NULL,
  `language` int(2) NOT NULL,
  `language_specify` varchar(50) NOT NULL,
  `education_attain` int(2) NOT NULL,
  `school_type` varchar(10) NOT NULL,
  `voter` varchar(5) NOT NULL,
  `phone_no` char(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `placeofbirth` varchar(100) NOT NULL,
  `resident_image` text NOT NULL,
  `occupation` int(2) NOT NULL,
  `occupation_status` int(2) NOT NULL,
  `place_of_work` varchar(40) NOT NULL,
  `income` float NOT NULL,
  `current_add_occ` varchar(100) NOT NULL,
  `dateregistered` timestamp NULL DEFAULT current_timestamp(),
  `dateupdated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_tbl`
--

INSERT INTO `resident_tbl` (`resident_id`, `house_no_fk`, `brgy_id_fk_resident`, `sitio_id_fk_resident`, `fname`, `mname`, `lname`, `bday`, `age`, `weight`, `height`, `senior_id`, `gender`, `extention_name`, `citizenship`, `civil_status`, `family_status`, `married_to`, `religion`, `religion_specify`, `language`, `language_specify`, `education_attain`, `school_type`, `voter`, `phone_no`, `email`, `placeofbirth`, `resident_image`, `occupation`, `occupation_status`, `place_of_work`, `income`, `current_add_occ`, `dateregistered`, `dateupdated`) VALUES
('RESIDENT-STA-CRUZ-LANDY-85109-4dR8FyP6', 'HOUSENO-STA-CRUZ-LANDY-85109-UrvCw4aV', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'JEREMIE', 'REGENCIA', 'ROBLES', '05/06/1998', 22, NULL, NULL, '', 1, 'JR.', 'FILIPINO', 1, 4, '', 4, '', 1, '', 5, 'Public', 'Yes', '09584837373', 'JEREMIE@GMAIL.COM', 'Landy Santa Cruz Marinduque', '', 2, 4, 'Locally', 24000, 'Matalaba, Santa Cruz, Marinduque', '2020-07-19 03:49:36', '2020-07-19 04:28:36'),
('RESIDENT-STA-CRUZ-LANDY-85109-BXxPKpFb', 'HOUSENO-STA-CRUZ-LANDY-85109-UrvCw4aV', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'Leticia', 'Regencia', 'Robles', '07/23/1954', 66, NULL, NULL, '123456789', 2, '', 'Filipino', 2, 2, 'Felipe Robles', 4, '', 1, '', 2, 'Public', 'Yes', '09394861131', '', 'Landy, Santa Cruz, Marinduque', '', 0, 0, '', 0, '', '2020-07-23 02:52:55', '2020-07-23 02:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_tbl`
--

CREATE TABLE `sitio_tbl` (
  `sitio_id` varchar(255) NOT NULL,
  `sitio_name` varchar(50) NOT NULL,
  `brgy_id_fk` varchar(225) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitio_tbl`
--

INSERT INTO `sitio_tbl` (`sitio_id`, `sitio_name`, `brgy_id_fk`, `date_created`, `date_updated`) VALUES
('SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', 'LUMANG BAYANAN', 'STA-CRUZ-LANDY-85109', '2020-04-21 17:40:34', '2020-04-21 17:40:34'),
('SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'SANTA ANAS', 'STA-CRUZ-LANDY-85109', '2020-04-21 17:40:59', '2020-04-21 17:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userslog_tbl`
--

CREATE TABLE `userslog_tbl` (
  `log_id` int(11) NOT NULL,
  `brgy_id_fk` varchar(255) NOT NULL,
  `log_name` varchar(50) NOT NULL,
  `log_type` varchar(50) NOT NULL,
  `date_in` timestamp NULL DEFAULT current_timestamp(),
  `date_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userslog_tbl`
--

INSERT INTO `userslog_tbl` (`log_id`, `brgy_id_fk`, `log_name`, `log_type`, `date_in`, `date_out`, `log_status`) VALUES
(1, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:41:12', '2020-05-25 03:41:58', 'OFFLINE'),
(2, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:42:20', '2020-05-25 03:42:47', 'OFFLINE'),
(3, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:46:38', '2020-05-25 03:46:52', 'OFFLINE'),
(4, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:47:02', '2020-05-25 03:48:33', 'OFFLINE'),
(5, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:47:54', '2020-05-25 03:48:33', 'OFFLINE'),
(6, 'STA-CRUZ-LANDY-85109', 'KAGAWAD', 'Kagawad', '2020-05-25 03:49:38', '2020-05-25 03:50:14', 'OFFLINE'),
(7, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:49:56', '2020-05-25 03:50:14', 'OFFLINE'),
(8, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:51:56', '2020-05-25 03:52:29', 'OFFLINE'),
(9, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:52:42', '2020-05-25 03:52:57', 'OFFLINE'),
(10, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:53:01', '2020-05-25 03:53:23', 'OFFLINE'),
(11, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:53:29', '2020-05-25 03:53:57', 'OFFLINE'),
(12, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:55:39', '2020-05-25 03:55:58', 'OFFLINE'),
(13, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 03:56:36', '2020-05-25 03:57:19', 'OFFLINE'),
(14, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:56:56', '2020-05-25 03:57:19', 'OFFLINE'),
(15, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-05-25 03:59:59', '2020-05-25 04:00:11', 'OFFLINE'),
(16, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-05-25 04:00:16', '2020-05-25 04:04:21', 'OFFLINE'),
(17, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-06-27 16:03:12', '2020-06-27 16:03:54', 'OFFLINE'),
(18, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-06-27 16:06:35', '2020-06-27 16:06:43', 'OFFLINE'),
(19, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-06-27 16:50:28', '2020-06-28 17:13:58', 'OFFLINE'),
(20, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-06-28 17:13:48', '2020-06-28 17:13:58', 'OFFLINE'),
(21, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-06-29 00:36:54', '2020-06-29 00:38:33', 'OFFLINE'),
(22, 'STA-CRUZ-LANDY-85109', 'KAGAWAD_2', 'Kagawad', '2020-07-18 15:32:10', '2020-07-18 15:32:33', 'OFFLINE'),
(23, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-07-18 15:32:39', '2020-07-18 15:38:15', 'OFFLINE'),
(24, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-07-19 03:31:59', '2020-07-19 04:08:14', 'OFFLINE'),
(25, 'STA-CRUZ-LANDY-85109', 'KAGAWAD_2', 'Kagawad', '2020-07-19 03:34:06', '2020-07-19 04:08:14', 'OFFLINE'),
(26, '', 'DILG', 'Administrator', '2020-07-19 04:08:18', '2020-07-19 04:49:43', 'OFFLINE'),
(27, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-07-19 04:50:10', '2020-07-19 04:51:30', 'OFFLINE'),
(28, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-07-19 04:53:32', '2020-07-22 00:32:14', 'OFFLINE'),
(29, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-07-22 00:31:12', '2020-07-22 00:32:14', 'OFFLINE'),
(30, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-07-22 00:32:19', '2020-07-22 00:33:49', 'OFFLINE'),
(31, 'STA-CRUZ-LANDY-85109', 'KAGAWAD_2', 'Kagawad', '2020-07-22 00:33:57', '2020-07-23 03:10:12', 'OFFLINE'),
(32, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-07-23 00:08:44', '2020-07-23 03:10:12', 'OFFLINE'),
(33, 'STA-CRUZ-LANDY-85109', 'KAGAWAD_2', 'Kagawad', '2020-07-23 00:41:23', '2020-07-23 03:10:12', 'OFFLINE'),
(34, 'STA-CRUZ-LANDY-85109', 'SECRETARY', 'Secretary', '2020-07-23 00:43:07', '2020-07-23 03:10:12', 'OFFLINE'),
(35, 'STA-CRUZ-LANDY-85109', 'LANDY', 'BarangayCaptain', '2020-07-23 01:40:44', '2020-07-23 03:10:12', 'OFFLINE'),
(36, 'STA-CRUZ-LANDY-85109', 'KAGAWAD', 'Kagawad', '2020-07-23 03:10:19', '2020-07-23 03:10:19', 'ONLINE');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `brgy_id_fk` varchar(255) DEFAULT NULL,
  `sitio_id_fk` varchar(255) DEFAULT NULL,
  `usertype` varchar(20) NOT NULL,
  `useractive` int(2) NOT NULL,
  `date_registered` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `fullname`, `username`, `password`, `brgy_id_fk`, `sitio_id_fk`, `usertype`, `useractive`, `date_registered`, `date_updated`) VALUES
('STA-CRUZ-1xRo8cIg', 'LIPA', 'LIPA', '4637341cd347501fcbfe61a8b50c50be', 'STA-CRUZ-LIPA-02819', NULL, 'BarangayCaptain', 1, '2020-04-27 03:37:33', '2020-04-27 03:37:33'),
('STA-CRUZ-2cbi5DaE', 'KAGAWAD_2', 'KAGAWAD_2', '0b2add25e10a3511c98e4b0792468f01', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109WqzLXgwr', 'Kagawad', 1, '2020-04-27 03:38:50', '2020-05-25 03:10:36'),
('STA-CRUZ-9HTY2BVg', 'LANDY', 'LANDY', '191320432b0578ad6c4fc22c039fc51f', 'STA-CRUZ-LANDY-85109', NULL, 'BarangayCaptain', 1, '2020-04-27 03:37:16', '2020-04-27 03:37:16'),
('STA-CRUZ-ADMINISTRATOR', 'DILG', 'DILG', 'd89e068fe84a6c66136bdd72701d2147', NULL, NULL, 'Administrator', 1, '0000-00-00 00:00:00', '2020-04-27 03:33:31'),
('STA-CRUZ-CjKgEdi2', 'KAGAWAD', 'KAGAWAD', '47c6e989a3c9c9674150cf7e9cf4f410', 'STA-CRUZ-LANDY-85109', 'SITIO-STA-CRUZ-LANDY-85109VdE4x1cn', 'Kagawad', 1, '2020-04-27 03:38:16', '2020-05-25 03:10:42'),
('STA-CRUZ-nFC2dQtL', 'SECRETARY', 'SECRETARY', 'b12ae6e2c451301e8c4ef943a2ced477', 'STA-CRUZ-LANDY-85109', '0', 'Secretary', 1, '2020-04-27 03:39:09', '2020-04-27 03:39:09'),
('STA-CRUZ-SYSTEMADMIN', 'Jeremie R. Robles', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'SuperAdmin', 1, '0000-00-00 00:00:00', '2020-04-27 03:33:18'),
('STA-CRUZ-tzJLgCdQ', 'BHW', 'BHW', 'f2d1c1ed4205cae4dd69226bc1c035b0', 'STA-CRUZ-LANDY-85109', '0', 'BarangayHealthWorker', 1, '2020-04-27 03:39:22', '2020-05-25 03:16:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_clearance_tbl`
--
ALTER TABLE `barangay_clearance_tbl`
  ADD PRIMARY KEY (`brgy_clearance_id`),
  ADD UNIQUE KEY `brgy_clearance_id` (`brgy_clearance_id`);

--
-- Indexes for table `blotter_tbl`
--
ALTER TABLE `blotter_tbl`
  ADD PRIMARY KEY (`blotter_id`),
  ADD UNIQUE KEY `blotter_id_2` (`blotter_id`),
  ADD KEY `blotter_id` (`blotter_id`);

--
-- Indexes for table `brgy_tbl`
--
ALTER TABLE `brgy_tbl`
  ADD PRIMARY KEY (`brgy_id`),
  ADD UNIQUE KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `businesspermit_tbl`
--
ALTER TABLE `businesspermit_tbl`
  ADD PRIMARY KEY (`business_id`),
  ADD UNIQUE KEY `business_id` (`business_id`);

--
-- Indexes for table `businesstype_tbl`
--
ALTER TABLE `businesstype_tbl`
  ADD PRIMARY KEY (`businesstype_id`);

--
-- Indexes for table `calendar_tbl`
--
ALTER TABLE `calendar_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cedula_tbl`
--
ALTER TABLE `cedula_tbl`
  ADD PRIMARY KEY (`cedula_id`),
  ADD UNIQUE KEY `cedula_id` (`cedula_id`);

--
-- Indexes for table `historybrgyofficial_tbl`
--
ALTER TABLE `historybrgyofficial_tbl`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `houseno_tbl`
--
ALTER TABLE `houseno_tbl`
  ADD PRIMARY KEY (`house_id`),
  ADD UNIQUE KEY `house_id` (`house_id`);

--
-- Indexes for table `logo_tbl`
--
ALTER TABLE `logo_tbl`
  ADD PRIMARY KEY (`logo_id`),
  ADD UNIQUE KEY `logo_id` (`logo_id`);

--
-- Indexes for table `or_tbl`
--
ALTER TABLE `or_tbl`
  ADD PRIMARY KEY (`or_id`),
  ADD UNIQUE KEY `or_id` (`or_id`);

--
-- Indexes for table `religion_tbl`
--
ALTER TABLE `religion_tbl`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `resident_tbl`
--
ALTER TABLE `resident_tbl`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `sitio_tbl`
--
ALTER TABLE `sitio_tbl`
  ADD PRIMARY KEY (`sitio_id`),
  ADD UNIQUE KEY `sitio_id` (`sitio_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userslog_tbl`
--
ALTER TABLE `userslog_tbl`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesstype_tbl`
--
ALTER TABLE `businesstype_tbl`
  MODIFY `businesstype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calendar_tbl`
--
ALTER TABLE `calendar_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religion_tbl`
--
ALTER TABLE `religion_tbl`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userslog_tbl`
--
ALTER TABLE `userslog_tbl`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
