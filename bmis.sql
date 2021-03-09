-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 07:09 AM
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
('STA-CRUZ-ALOBO-69100', 'ALOBO', '2020-08-07 01:39:18', '2020-08-07 01:39:18'),
('STA-CRUZ-ANGAS-13255', 'ANGAS', '2020-08-07 01:39:40', '2020-08-07 01:39:40'),
('STA-CRUZ-BAGONGSILANG-81937', 'BAGONG SILANG', '2020-04-27 03:35:00', '2020-04-27 03:35:00'),
('STA-CRUZ-BANAHAW-09736', 'BANAHAW', '2020-04-27 03:34:33', '2020-04-27 03:34:33'),
('STA-CRUZ-BIGA-82255', 'BIGA', '2020-08-07 01:39:26', '2020-08-07 01:39:26'),
('STA-CRUZ-BUYABOD-98270', 'BUYABOD', '2020-08-07 01:38:32', '2020-08-07 01:38:32'),
('STA-CRUZ-LANDY-85109', 'LANDY', '2020-04-21 16:45:13', '2020-04-21 16:45:13'),
('STA-CRUZ-LAPU-LAPU-90881', 'LAPU-LAPU', '2020-08-07 01:38:46', '2020-08-07 01:38:46'),
('STA-CRUZ-LIPA-02819', 'LIPA', '2020-04-21 16:45:22', '2020-04-21 16:45:22'),
('STA-CRUZ-MAHARLIKA-72570', 'MAHARLIKA', '2020-08-07 01:38:08', '2020-08-07 01:38:08'),
('STA-CRUZ-MASAGUISI-28073', 'MASAGUISI', '2020-08-07 01:40:50', '2020-08-07 01:40:50'),
('STA-CRUZ-MATALABA-80966', 'MATALABA', '2020-08-07 01:28:41', '2020-08-07 01:28:41'),
('STA-CRUZ-MORALES-55140', 'MORALES', '2020-08-07 01:39:49', '2020-08-07 01:39:49'),
('STA-CRUZ-NAPO-83656', 'NAPO', '2020-08-07 01:40:31', '2020-08-07 01:40:31'),
('STA-CRUZ-PAG-ASA-13656', 'PAG-ASA', '2020-08-07 01:28:30', '2020-08-07 01:28:30'),
('STA-CRUZ-TAMAYO-77263', 'TAMAYO', '2020-08-07 01:39:09', '2020-08-07 01:39:09'),
('STA-CRUZ-TAWIRAN-81549', 'TAWIRAN', '2020-08-07 01:40:01', '2020-08-07 01:40:01'),
('STA-CRUZ-TAWIRAN-87846', 'TAWIRAN', '2020-08-07 01:38:59', '2020-08-07 01:38:59'),
('STA-CRUZ-TAYTAY-76546', 'TAYTAY', '2020-08-07 01:40:24', '2020-08-07 01:40:24');

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
(5, 'Furniture', '2020-07-19 04:33:53', '2020-07-19 04:33:53'),
(6, 'Agri-Ventures', '2020-08-07 01:42:27', '2020-08-07 01:42:27');

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
(7, 'Sevent Day Adventies', '2020-04-28 06:54:15', '2020-08-07 01:41:24'),
(8, 'Jehovas', '2020-08-07 01:41:45', '2020-08-07 01:41:45');

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

-- --------------------------------------------------------

--
-- Table structure for table `revenue_tbl`
--

CREATE TABLE `revenue_tbl` (
  `revenue_id` varchar(255) NOT NULL,
  `brgy_id_fk` varchar(255) NOT NULL,
  `house_id_fk` varchar(255) NOT NULL,
  `sitio_id_fk` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '', 'DILG', 'Administrator', '2020-08-26 05:03:56', '2020-08-26 05:08:22', 'OFFLINE'),
(2, '', 'Jeremie R. Robles', 'SuperAdmin', '2020-08-26 05:08:29', '2020-08-26 05:08:38', 'OFFLINE');

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
('STA-CRUZ-ADMINISTRATOR', 'DILG', 'DILG', 'd89e068fe84a6c66136bdd72701d2147', NULL, NULL, 'Administrator', 1, '0000-00-00 00:00:00', '2020-04-27 03:33:31'),
('STA-CRUZ-SYSTEMADMIN', 'Jeremie R. Robles', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'SuperAdmin', 1, '0000-00-00 00:00:00', '2020-04-27 03:33:18');

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
-- Indexes for table `revenue_tbl`
--
ALTER TABLE `revenue_tbl`
  ADD PRIMARY KEY (`revenue_id`),
  ADD UNIQUE KEY `revenue_id` (`revenue_id`);

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
  MODIFY `businesstype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar_tbl`
--
ALTER TABLE `calendar_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religion_tbl`
--
ALTER TABLE `religion_tbl`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userslog_tbl`
--
ALTER TABLE `userslog_tbl`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
