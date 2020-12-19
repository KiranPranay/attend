-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2020 at 10:48 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-users`
--

CREATE TABLE `admin-users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin-users`
--

INSERT INTO `admin-users` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'naga', 'naga123@gmail.com', 1234567890, 'mouni');

-- --------------------------------------------------------

--
-- Table structure for table `attendance-record`
--

CREATE TABLE `attendance-record` (
  `id` int(11) NOT NULL,
  `roll` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` date NOT NULL,
  `subject` bigint(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance-record`
--

INSERT INTO `attendance-record` (`id`, `roll`, `status`, `time`, `subject`) VALUES
(1, '31', 1, '2020-11-22', 1),
(2, '395', 1, '2020-11-22', 1),
(3, '32', 1, '2020-11-22', 1),
(4, '10', 1, '2020-11-22', 3),
(5, '20', 1, '2020-11-22', 3),
(6, '22', 1, '2020-11-22', 3),
(7, '45', 1, '2020-12-07', 4),
(8, '23', 0, '2020-12-07', 4),
(9, '10', 0, '2020-12-12', 2),
(10, '20', 1, '2020-12-12', 2),
(11, '22', 0, '2020-12-12', 2),
(12, '45', 1, '2020-12-17', 4),
(13, '23', 0, '2020-12-17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `status`) VALUES
(1, 'B.sc Statistics', 1),
(2, 'B.sc Electronics', 1),
(3, 'B.sc Physics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `sections` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sections`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `class` int(11) NOT NULL,
  `roll` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `roll`, `status`) VALUES
(1, 'Anu', 1, '10', 1),
(2, 'Lisa', 1, '20', 1),
(3, 'Geetha', 1, '22', 1),
(4, 'Sunil', 2, '45', 1),
(5, 'priya', 2, '23', 1),
(6, 'Mounika', 3, '27', 1),
(7, 'Prethi', 3, '46', 1),
(8, 'Ansh', 3, '67', 1),
(9, 'Amulya', 3, '37', 1),
(10, 'Sri', 3, '99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `class` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub`, `class`, `status`) VALUES
(1, 'Statistics', 1, 1),
(2, 'computer Science', 1, 1),
(3, 'Mathematics', 1, 1),
(4, 'Electronics', 2, 1),
(5, 'Computer Science', 2, 1),
(6, 'Mathematics', 2, 1),
(7, 'Physics', 3, 1),
(8, 'Computer Science', 3, 1),
(9, 'Mathematics', 3, 1),
(10, 'English', 1, 1),
(11, 'English', 2, 1),
(12, 'English', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` bigint(200) NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `mobile`, `password`, `status`) VALUES
(5, 'mia1', 'mia@gmail.com1', 674878565, 'ghggjfsgfi', 1),
(6, 'dani', 'gjkhljhlkg', 98778775, 'hkjmvb njbjh', 1),
(7, 'lisa', 'gjkhljhlkg', 987787755, 'hkjmvb njbjh', 1),
(8, 'lisa ann', 'gjkhljhlkg', 98778776, 'hkjmvb njbjh', 1),
(9, 'priya', 'fgkhkjjg', 1234567890, 'fjhkjhjn', 1),
(10, 'mouni', 'mouni139@gmail.com', 1234567890, 'mouni', 1),
(11, 'sunny', 'sunnyleone@gmail.com', 123456789012, 'leone', 1),
(12, 'swathi', 'swathi', 56989876998, 'swathi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-users`
--
ALTER TABLE `admin-users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance-record`
--
ALTER TABLE `attendance-record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-users`
--
ALTER TABLE `admin-users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance-record`
--
ALTER TABLE `attendance-record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
