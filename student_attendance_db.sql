-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 06:07 AM
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
-- Database: `student_attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(50) NOT NULL,
  `sid` int(50) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `sid`, `attendance_status`, `attendance_date`) VALUES
(62, 13, 'Absent', '2024-03-18'),
(63, 9, 'Present', '2024-03-18'),
(64, 7, 'Absent', '2024-03-18'),
(68, 1, 'Present', '2024-03-18'),
(69, 8, 'Present', '2024-03-18'),
(70, 11, 'Present', '2024-03-18'),
(71, 3, 'Absent', '2024-03-19'),
(73, 13, 'Absent', '2024-03-19'),
(78, 2, 'Present', '2024-03-19'),
(79, 7, 'Absent', '2024-03-19'),
(80, 1, 'Absent', '2024-03-19'),
(82, 8, 'Present', '2024-03-19'),
(85, 11, 'Present', '2024-03-19'),
(102, 14, 'Present', '2024-03-19'),
(103, 15, 'Absent', '2024-03-19'),
(104, 9, 'Absent', '2024-03-19'),
(105, 1, 'Present', '2024-03-20'),
(106, 2, 'Absent', '2024-03-20'),
(107, 3, 'Absent', '2024-03-20'),
(108, 7, 'Present', '2024-03-20'),
(109, 8, 'Present', '2024-03-20'),
(110, 9, 'Absent', '2024-03-20'),
(111, 11, 'Present', '2024-03-20'),
(112, 13, 'Present', '2024-03-20'),
(113, 14, 'Present', '2024-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `status`, `birthdate`, `city`) VALUES
(1, 'sumita patel', 'Female', 'Married', '1992-02-01', 'rajkot'),
(2, 'misty thakar', 'Female', 'Unmarried', '1990-01-02', 'jamnagar'),
(3, 'hariharan', 'Male', 'Married', '1975-07-14', 'delhi'),
(7, 'shital bhatt', 'Female', 'Unmarried', '1994-02-05', 'haryana'),
(8, 'raj shah', 'Male', 'Unmarried', '1991-07-10', 'rajkot'),
(9, 'kiran mehta', 'Female', 'Unmarried', '2024-03-13', 'haridwar'),
(11, 'rohit shah', 'Male', 'Unmarried', '2000-02-05', 'chennai'),
(13, 'smita thakkar', 'Female', 'Unmarried', '2000-02-15', 'surat'),
(14, 'rashik shah', 'Male', 'Unmarried', '2000-05-01', 'rajkot'),
(15, 'shweta', 'Female', 'Unmarried', '1995-01-01', 'rajkot'),
(16, 'gaurav kumar', 'Male', 'Unmarried', '2001-10-10', 'jamnagar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
