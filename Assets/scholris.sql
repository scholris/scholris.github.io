-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 10:09 PM
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
-- Database: `scholris`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','accepted','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `scholarship_id`, `student_id`, `application_date`, `status`) VALUES
(1, 1, 1, '2024-08-24 19:22:42', ''),
(2, 3, 1, '2024-08-24 19:55:35', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_name`, `email`, `phone`, `password`, `permanent_address`) VALUES
(1, 'Thomas and Cross Associates', 'test0@test.test', '886', '$2y$10$BHaqwo2lHExDeWHnJUhsP.C.PPbNPL1lDGHj.qFE1L.0c0.NBH4GK', 'Adipisci laborum nos');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `eligibility_criteria` text NOT NULL,
  `min_gpa` float NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `org_id`, `name`, `amount`, `eligibility_criteria`, `min_gpa`, `deadline`) VALUES
(1, 1, 'Yvonne Underwood', 80.89, 'Ullamco fuga Deseru', 77, '1982-05-20'),
(3, 1, 'Erasmus Schwartz', 56.00, 'Quae elit ut iste n', 22, '1973-03-18'),
(4, 1, 'Erasmus Schwartz', 56.00, 'Quae elit ut iste n', 22, '1973-03-18'),
(5, 1, 'Jacob Reid', 66.00, 'Voluptas facere est', 59, '1975-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `temporary_address` varchar(255) NOT NULL,
  `document_type` enum('citizen','birth-certificate') NOT NULL,
  `document_number` varchar(50) NOT NULL,
  `document_upload` varchar(255) NOT NULL,
  `gpa` float NOT NULL,
  `marksheet_upload` varchar(255) DEFAULT NULL,
  `personal_statement` varchar(255) NOT NULL,
  `supporting_documents` varchar(255) DEFAULT NULL,
  `military_personal` tinyint(1) NOT NULL,
  `government_school` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `email`, `phone`, `password`, `dob`, `gender`, `permanent_address`, `temporary_address`, `document_type`, `document_number`, `document_upload`, `gpa`, `marksheet_upload`, `personal_statement`, `supporting_documents`, `military_personal`, `government_school`) VALUES
(1, 'Alvin Murray', 'test@test.test', '889', '$2y$10$s7Q/JO8gf5Y2g4WRYzUeFuxPzgDNzyApCuKT2X4YLG0GPETQ3HRPG', '1992-11-28', 'female', 'Dolorem in et asperi', 'Blanditiis cupidatat', 'citizen', '952', '1.png', 0, '2.png', '3.png', '4.png', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholarship_id` (`scholarship_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarships` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD CONSTRAINT `scholarships_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
