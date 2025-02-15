-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 07:30 PM
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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT 'service-form.php'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `link`) VALUES
(1, 'Doctor on Call', 'Our doctors are available for virtual consultations and emergency calls.', 'images/1.jpg', 'service-form.php'),
(2, 'Registered Nurse', 'Our registered nurses provide skilled care, including wound care and medication.', 'images/2.jpg', 'service-form.php'),
(3, 'Vaccination', 'We offer a range of vaccinations to protect against common illnesses and diseases.', 'images/3.jpg', 'service-form.php'),
(4, 'Physical Therapy', 'Our physical therapists help patients recover mobility and manage pain.', 'images/4.jpg', 'service-form.php'),
(5, 'Elderly Care', 'Our dedicated caregivers provide compassionate care to the elderly.', 'images/5.jpg', 'service-form.php'),
(6, 'Medication Management', 'We help patients take the right medication at the right time.', 'images/6.jpg', 'service-form.php'),
(7, 'Lab Testing', 'We provide convenient lab testing services at your doorstep.', 'images/7.jpg', 'service-form.php'),
(8, 'Nutrition Counseling', 'Our nutritionists provide dietary plans to help maintain a healthy lifestyle.', 'images/8.jpg', 'service-form.php'),
(9, 'Home Health Aide', 'Our home health aides assist with daily living activities.', 'images/9.png', 'service-form.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
