-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 03:01 PM
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
-- Database: `healthathome`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_jobs`
--

CREATE TABLE `accepted_jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_jobs`
--

INSERT INTO `accepted_jobs` (`id`, `name`, `email`, `phone`, `position`, `address`, `resume`, `message`, `date`, `status`) VALUES
(3, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Therapist', 'balkot', 'Prabesh Raj Poudel Resume.pdf', 'good', '2024-08-23', NULL),
(4, 'ram', 'prabesh210@gmail.com', '9841536457', 'Nurse', 'df', 'Test.pdf', 'sdf', '2024-08-24', NULL),
(5, 'Sita', 'sita@gmail.com', '9841536457', 'Lab Technician', 'hetuda', 'Test.pdf', 'good', '2024-08-24', NULL),
(6, 'Hari', 'hari@gmail.com', '9841536457', 'Nurse', 'jhapa', 'Test.pdf', 'fast', '2024-08-24', NULL),
(7, 'sita', 'sita@gmail.com', '123465', 'Nurse', 'bulwatar', 'Test.pdf', 'greate', '2024-08-24', NULL),
(9, 'hari', 'hari@gmail.com', '9842523864', 'Helper', 'acham', 'Test.pdf', 'good', '2024-08-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `available_services`
--

CREATE TABLE `available_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_services`
--

INSERT INTO `available_services` (`id`, `name`, `email`, `phone`, `service`, `address`, `message`, `status`) VALUES
(6, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Vaccination', 'balkot', 'no', NULL),
(7, 'Prabesh', 'ram@gmail.com', '9841536457', 'Vaccination', 'cscsdc', 'dsccds', NULL),
(8, 'Prabesh', 'ram@gmail.com', '9842523864', '', 'hgb', 'hbfdhdfh', NULL),
(11, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Registered Nurse', 'vbcb', 'cfgdfg', NULL),
(12, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Registered Nurse', 'dsf', 'sdf', NULL),
(14, 'sita', 'sita@gmail.com', '9842523864', 'Registered Nurse', 'hetuda', 'fast', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'ram', 'prabesh210@gmail.com', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `jobform`
--

CREATE TABLE `jobform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('Accepted','Rejected') NOT NULL DEFAULT 'Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobform`
--

INSERT INTO `jobform` (`id`, `name`, `email`, `phone`, `position`, `address`, `resume`, `message`, `date`, `status`) VALUES
(3, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Therapist', 'balkot', 'Prabesh Raj Poudel Resume.pdf', 'good', '2024-08-23', 'Accepted'),
(4, 'ram', 'prabesh210@gmail.com', '9841536457', 'Nurse', 'df', 'Test.pdf', 'sdf', '2024-08-24', 'Accepted'),
(5, 'Sita', 'sita@gmail.com', '9841536457', 'Lab Technician', 'hetuda', 'Test.pdf', 'good', '2024-08-24', 'Accepted'),
(6, 'Hari', 'hari@gmail.com', '9841536457', 'Nurse', 'jhapa', 'Test.pdf', 'fast', '2024-08-24', 'Accepted'),
(7, 'sita', 'sita@gmail.com', '123465', 'Nurse', 'bulwatar', 'Test.pdf', 'greate', '2024-08-24', 'Accepted'),
(8, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Therapist', 'balkot', 'Prabesh Raj Poudel Resume.pdf', 'fast', '2024-08-24', 'Accepted'),
(9, 'hari', 'hari@gmail.com', '9842523864', 'Helper', 'acham', 'Test.pdf', 'good', '2024-08-24', 'Accepted'),
(10, 'Prabesh', 'prabesh210@gmail.com', '9842523864', 'Nurse', 'baneshowr', 'Test.pdf', 'fast', '2024-08-24', 'Accepted'),
(11, 'binod', 'binod@gmail.com', '9845654587', 'Therapist', 'new road', 'Prabesh Raj Poudel.pdf', 'urgent', '2025-01-23', 'Accepted'),
(12, 'binod', 'binod@gmail.com', '9845654587', 'Therapist', 'new road', 'Prabesh Raj Poudel.pdf', 'urgent', '2025-01-23', 'Accepted'),
(13, 'Shyam', 'shyam@gmail.com', '9845654548', 'Helper', 'balkot', 'Test.pdf', 'i am the best', '2025-01-23', 'Accepted'),
(14, 'Hari pandey', 'hari210@gmail.com', '9874586215', 'Security Guard', 'i am good', 'Test.pdf', 'urgent', '2025-01-23', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `email`, `login_time`) VALUES
(1, 3, 'prabesh210@gmail.com', '2025-01-24 11:38:47'),
(2, 11, 'abhi@gmail.com', '2025-01-24 11:39:12'),
(3, 11, 'abhi@gmail.com', '2025-01-24 12:06:18'),
(4, 11, 'abhi@gmail.com', '2025-01-24 12:09:00'),
(5, 11, 'abhi@gmail.com', '2025-01-24 12:11:13'),
(6, 11, 'abhi@gmail.com', '2025-01-24 12:15:23'),
(7, 11, 'abhi@gmail.com', '2025-01-24 12:16:43'),
(8, 11, 'abhi@gmail.com', '2025-01-24 12:18:08'),
(9, 11, 'abhi@gmail.com', '2025-01-24 13:14:12'),
(10, 14, 'supriya@gmail.com', '2025-01-24 13:14:23'),
(11, 12, 'bipana@gmail.com', '2025-01-24 13:15:14'),
(12, 11, 'abhi@gmail.com', '2025-01-24 13:32:19'),
(13, 11, 'abhi@gmail.com', '2025-01-24 13:35:15'),
(14, 11, 'abhi@gmail.com', '2025-01-24 13:38:24'),
(15, 11, 'abhi@gmail.com', '2025-01-24 13:52:57'),
(16, 3, 'prabesh210@gmail.com', '2025-01-24 13:53:05'),
(17, 11, 'abhi@gmail.com', '2025-01-24 13:53:19'),
(18, 3, 'prabesh210@gmail.com', '2025-01-24 13:53:29'),
(19, 3, 'prabesh210@gmail.com', '2025-01-24 13:54:57'),
(20, 3, 'prabesh210@gmail.com', '2025-01-24 13:55:13'),
(21, 12, 'bipana@gmail.com', '2025-01-24 13:55:46'),
(22, 14, 'supriya@gmail.com', '2025-01-24 13:55:56'),
(23, 3, 'prabesh210@gmail.com', '2025-01-24 13:56:11'),
(24, 11, 'abhi@gmail.com', '2025-01-24 13:59:05'),
(25, 3, 'prabesh210@gmail.com', '2025-01-24 14:00:39'),
(26, 11, 'abhi@gmail.com', '2025-01-24 14:04:13'),
(27, 11, 'abhi@gmail.com', '2025-01-24 14:09:59'),
(28, 11, 'abhi@gmail.com', '2025-01-24 14:21:50'),
(29, 11, 'abhi@gmail.com', '2025-01-25 13:39:59'),
(30, 14, 'supriya@gmail.com', '2025-01-25 13:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `servicefor` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `allergies` text DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `emergencyname` varchar(255) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `emergencyphone` varchar(15) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `otherservices` text DEFAULT NULL,
  `report1` blob DEFAULT NULL,
  `report2` blob DEFAULT NULL,
  `report3` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullname`, `birth`, `servicefor`, `gender`, `address`, `phone`, `email`, `username`, `allergies`, `medical_history`, `emergencyname`, `relationship`, `emergencyphone`, `services`, `otherservices`, `report1`, `report2`, `report3`) VALUES
(9, 'Prabesh', '2001-10-07', '2024-08-24', 'Male', 'Balkot', '9841536457', 'prabesh210@gmail.com', 'prabesh123', 'No', 'no history', 'Tribhuwan', 'father', '9841566556', 'Post-Surgery Care', 'No', 0x546573742e706466, '', ''),
(10, 'Sita', '2001-01-20', '2024-08-31', 'Female', 'Baneshowr', '9841536457', 'sita@gmail.com', 'sita123', 'yes', 'Skin burn', 'rahul', 'father', '14563214563', 'Post-Surgery Care, Medication Management', 'No', 0x546573742e706466, '', ''),
(11, 'hari', '2024-08-09', '2024-08-09', 'Female', 'Balkot', '123465', 'hari@gmail.com', 'hari', 'no', 'no\r\n', 'ooo', 'asd', '14', 'Medication Management', 'No', 0x546573742e706466, '', ''),
(12, 'ram', '2023-01-10', '2024-08-29', 'Male', 'baneshowr', '12458784', 'ram@gmail.com', 'bibidha', 'yes', 'heart disease ', 'rahul', 'father', '9843277012', 'Medication Management', 'No', 0x546573742e706466, '', ''),
(13, 'Abhiskhe', '2005-06-23', '', 'Male', 'baneshowr', '9841536457', 'abhi@gmail.com', 'abhi', '', '', '', 'mother', '', '', '', 0x546573742e706466, 0x507261626573682052616a20506f7564656c2e706466, '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `contact_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `cover_letter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `fullname`, `birth`, `gender`, `address`, `phone`, `email`, `username`, `summary`, `contact_name`, `relationship`, `contact_phone`, `cv`, `cover_letter`) VALUES
(1, 'Abhiskhe', '2025-01-08', 'Male', 'balkot', '12458784', 'abhi@gmail.com', 'abhi', 'i am good', 'rama', 'mother', '9845762147', 'Test.pdf', 'Prabesh Raj Poudel.pdf'),
(2, 'Supriya', '2025-01-07', 'Female', 'Balkot', '12458784', 'supriya@gmail.com', 'supriya', 'i am a good girl', 'rahul', 'husband', '1234565785', 'Test.pdf', 'Prabesh Raj Poudel.pdf'),
(3, 'Krishna Kadel', '2024-12-25', 'Male', 'Bharatpau', '1234569874', 'krishna@gmail.com', 'krishna', 'do fast', 'rahul', 'son', '1478523698', 'Test.pdf', 'Prabesh Raj Poudel.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `confirm_password`, `username`, `role`) VALUES
(3, 'Prabesh', 'prabesh210@gmail.com', '12345', '12345', 'prabesh123', 'user'),
(4, 'Sita', 'sita@gmail.com', '12345', '12345', 'sita123', 'user'),
(5, 'hari', 'hari@gmail.com', '1245', '1245', 'hari', 'user'),
(6, 'bibidha', 'bibidha@gmail.com', 'bibidha', 'bibidha', 'bibidha', 'user'),
(7, 'Rahul', 'rahul@gmail.com', '123123', '123123', 'rahul', 'user'),
(11, 'Abhishek', 'abhi@gmail.com', '12345', '12345', 'abhi', 'user'),
(12, 'Bipana thapa', 'bipana@gmail.com', '12345', '12345', 'bipana', 'admin'),
(13, 'Krishna Kadel', 'krishna@gmail.com', '12345', '12345', 'krishna', 'admin'),
(14, 'Supriya Aryal', 'supriya@gmail.com', '12345', '12345', 'supriya', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_jobs`
--

CREATE TABLE `rejected_jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejected_jobs`
--

INSERT INTO `rejected_jobs` (`id`, `name`, `email`, `phone`, `position`, `address`, `resume`, `message`, `date`, `status`) VALUES
(3, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Therapist', 'balkot', 'Prabesh Raj Poudel Resume.pdf', 'good', '2024-08-23', NULL),
(5, 'Sita', 'sita@gmail.com', '9841536457', 'Lab Technician', 'hetuda', 'Test.pdf', 'good', '2024-08-24', NULL),
(10, 'Prabesh', 'prabesh210@gmail.com', '9842523864', 'Nurse', 'baneshowr', 'Test.pdf', 'fast', '2024-08-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serviceform`
--

CREATE TABLE `serviceform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('Available','Unavailable') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceform`
--

INSERT INTO `serviceform` (`id`, `name`, `email`, `phone`, `service`, `address`, `message`, `status`) VALUES
(6, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Vaccination', 'balkot', 'no', ''),
(7, 'Prabesh', 'ram@gmail.com', '9841536457', 'Vaccination', 'cscsdc', 'dsccds', ''),
(8, 'Prabesh', 'ram@gmail.com', '9842523864', '', 'hgb', 'hbfdhdfh', ''),
(9, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Doctor on Call', 'vbn', 'fgh', ''),
(10, 'Prabesh', 'ram@gmail.com', '9841536457', 'Registered Nurse', 'gfh', 'fhg', ''),
(11, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Registered Nurse', 'vbcb', 'cfgdfg', ''),
(12, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Registered Nurse', 'dsf', 'sdf', ''),
(13, 'ram', 'prabesh210@gmail.com', '9841536457', 'Doctor on Call', 'gh', 'hgf', ''),
(14, 'sita', 'sita@gmail.com', '9842523864', 'Registered Nurse', 'hetuda', 'fast', ''),
(15, 'hari', 'hari@gmail.com', '9841536457', 'Physical Therapy', 'gulmi', 'slow', ''),
(16, 'Prabesh', 'prabesh210@gmail.com', '9842523864', 'Vaccination', 'balkot', 'fast', ''),
(17, 'bibidha', 'ram@gmail.com', '9841536457', 'Registered Nurse', 'chgfcjghv', 'hgcmghvc', ''),
(18, 'aakash thapa', 'akash@gmail.com', '9845621345', 'Registered Nurse', 'tinkune', 'urgent', ''),
(19, 'Charchit', 'charchit@gmail.com', '9854621478', 'Physical Therapy', 'Sanepa', 'best one', '');

-- --------------------------------------------------------

--
-- Table structure for table `unavailable_services`
--

CREATE TABLE `unavailable_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `service` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unavailable_services`
--

INSERT INTO `unavailable_services` (`id`, `name`, `email`, `phone`, `service`, `address`, `message`) VALUES
(9, 'Prabesh', 'prabesh210@gmail.com', '9841536457', 'Doctor on Call', 'vbn', 'fgh'),
(10, 'Prabesh', 'ram@gmail.com', '9841536457', 'Registered Nurse', 'gfh', 'fhg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_services`
--
ALTER TABLE `available_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobform`
--
ALTER TABLE `jobform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_jobs`
--
ALTER TABLE `rejected_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceform`
--
ALTER TABLE `serviceform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unavailable_services`
--
ALTER TABLE `unavailable_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `available_services`
--
ALTER TABLE `available_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobform`
--
ALTER TABLE `jobform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rejected_jobs`
--
ALTER TABLE `rejected_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `serviceform`
--
ALTER TABLE `serviceform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `unavailable_services`
--
ALTER TABLE `unavailable_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
