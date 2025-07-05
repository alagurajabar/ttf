-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 09:20 AM
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
-- Database: `ttf`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `Blood_Group` varchar(10) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Allergies` varchar(255) DEFAULT NULL,
  `medical` varchar(255) DEFAULT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `Whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Instagram` varchar(100) DEFAULT NULL,
  `LinkedIn` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Donation` varchar(50) DEFAULT NULL,
  `ICE` varchar(255) DEFAULT NULL,
  `first` text DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `vehicle_number` varchar(50) DEFAULT NULL,
  `insurance_provider` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `Blood_Group`, `phone1`, `phone2`, `age`, `Allergies`, `medical`, `donor`, `Whatsapp`, `email`, `Instagram`, `LinkedIn`, `profile_picture`, `Address`, `Donation`, `ICE`, `first`, `gender`, `message`, `created_at`, `vehicle_number`, `insurance_provider`) VALUES
(1, 'm', 'm', 'm', 'm', 1, 'm', 'm', 'm', 'm', 'm@gmail.com', 'm', 'm', 'demo-application-home-avtar-03.jpg', 'm', 'm', 'm', 'm', 'male', 'mm', '2025-07-04 14:40:04', NULL, NULL),
(2, 'a', 'a', 'a', 'a', 1, 'a', 'a', 'a', 'a', 'a@gmail.com', 'a', 'a', 'demo-application-home-avtar-05.jpg', 'a', 'a', 'a', 'a', 'male', 'a', '2025-07-04 14:42:04', NULL, NULL),
(3, 'Mani Kandan', 'B+', '8508608328', '7904993744', 27, 'no allergy', 'sugar,Bp', 'willing', '8508608328', 'alagurajabar@gmail.com', 'artopathy', 'alagurajabar', 'MANK4970.JPG', 'chennai, choolaimedu', '3', 'dont put ice', 'call my contact or doctor', 'male', 'ahh,, noo', '2025-07-05 06:11:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
