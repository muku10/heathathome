-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `openings` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `published_date` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `openings`, `job_type`, `shift`, `published_date`, `link`, `updated_date`) VALUES
(1, 'Helper', 5, 'Remote', '', '2023-01-15', 'helper-job.php', '2025-02-15 17:42:36'),
(2, 'Nurse', 3, 'Full-Time', '', '2023-02-20', 'nurse-job.php', '2025-02-15 17:42:36'),
(3, 'Physical Therapist', 2, 'Part-Time', '', '2023-03-05', 'therapist-job.php', '2025-02-15 17:42:36'),
(4, 'Receptionist', 4, 'On-Site', '', '2023-04-10', 'receptionist-job.php', '2025-02-15 17:42:36'),
(5, 'Testing', 5, 'Full-Time', 'Morning', '2025-02-15', '', '2025-02-15 17:42:36'),
(6, 'Testing', 10, 'Full-Time', 'Morning', '2025-02-15', '', '2025-02-15 17:42:36'),
(7, 'Mukesh Testing', 5, 'Part-Time', 'Morning', '2025-02-28', '', '2025-02-15 17:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
