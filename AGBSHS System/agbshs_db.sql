-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 03:31 AM
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
-- Database: `agbshs_db`
--
CREATE DATABASE IF NOT EXISTS `agbshs_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agbshs_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `user_name`, `password`) VALUES
(1, 1234, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `status` enum('present','absent') NOT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `stud_id`, `fname`, `mname`, `lname`, `status`, `recorded_at`) VALUES
(27, 1234, 'Gary II', 'Padayao', 'Dayrit', 'present', '2024-08-11 01:10:50'),
(28, 1234, 'Gary II', 'Padayao', 'Dayrit', 'absent', '2024-08-11 01:11:42'),
(29, 1234, 'Gary II', 'Padayao', 'Dayrit', 'present', '2024-08-11 01:18:28'),
(30, 1212, 'Tupac', 'Yeah', 'Shakur', 'present', '2024-08-11 01:18:28'),
(31, 1234, 'Gary II', 'Padayao', 'Dayrit', 'present', '2024-08-11 01:18:38'),
(32, 1212, 'Tupac', 'Yeah', 'Shakur', 'absent', '2024-08-11 01:18:38'),
(33, 1234, 'Gary II', 'Padayao', 'Dayrit', 'absent', '2024-08-11 01:19:30'),
(34, 1212, 'Tupac', 'Yeah', 'Shakur', 'absent', '2024-08-11 01:19:30'),
(35, 1133, 'Snoop', 'Damn', 'Dog', 'absent', '2024-08-11 01:19:30'),
(36, 1234, 'Gary II', 'Padayao', 'Dayrit', 'present', '2024-08-11 01:20:22'),
(37, 1212, 'Tupac', 'Yeah', 'Shakur', 'absent', '2024-08-11 01:20:22'),
(38, 1133, 'Snoop', 'Damn', 'Dog', 'present', '2024-08-11 01:20:22'),
(39, 1111, 'Doctor', 'Bro', 'Dre', 'absent', '2024-08-11 01:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_id`, `fname`, `mname`, `lname`) VALUES
(1, '1234', 'Gary II', 'Padayao', 'Dayrit'),
(2, '1212', 'Tupac', 'Yeah', 'Shakur'),
(3, '1133', 'Snoop', 'Damn', 'Dog'),
(4, '1111', 'Doctor', 'Bro', 'Dre');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `mname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `pass_word` varchar(128) NOT NULL,
  `cpass_word` varchar(128) NOT NULL,
  `grade` varchar(128) NOT NULL,
  `section` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `mname`, `lname`, `user_name`, `pass_word`, `cpass_word`, `grade`, `section`) VALUES
(8, 'Gary II', 'Padayao', 'Dayrit', 'teacher', '1234', '1234', 'Grade 10', 'Section 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
