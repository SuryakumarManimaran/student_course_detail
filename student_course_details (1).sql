-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 01:02 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_course_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE `course_detail` (
  `course_id` int NOT NULL,
  `course_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`course_id`, `course_code`, `course`, `reg_no`) VALUES
(1, '1004', 'C++', '104'),
(2, '1001', 'PHP', '101'),
(3, '1002', 'C', '102');

-- --------------------------------------------------------

--
-- Table structure for table `course_registered`
--

CREATE TABLE `course_registered` (
  `c_id` int NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_registered`
--

INSERT INTO `course_registered` (`c_id`, `reg_no`, `course_id`) VALUES
(1, '101', '3'),
(2, '102', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `stu_rollnum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `staff_name`, `course_code`, `stu_rollnum`) VALUES
(1, 'R.Chandrasekar', '1001', '101'),
(2, 'V.Neelakandan', '1002', '102'),
(3, 'K.Mahalingam', '1003', '103');

-- --------------------------------------------------------

--
-- Table structure for table `students_detail`
--

CREATE TABLE `students_detail` (
  `stu_id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `reg_no` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stu_sem` varchar(100) NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students_detail`
--

INSERT INTO `students_detail` (`stu_id`, `name`, `reg_no`, `stu_sem`, `date_of_birth`, `number`) VALUES
(1, 'Hari ram', '101', '1', '1999-02-01', '9876543210'),
(2, 'Vishnu', '102', '1', '2000-05-15', '9874563210'),
(3, 'Hari prasad', '103', '2', '1998-12-25', '9012365478'),
(4, 'Surya', '104', '2', '2001-09-10', '9632587410'),
(5, 'Sam', '105', '3', '1999-06-20', '9654123087'),
(11, 'Hari ram', '323', '3', '2023-04-21', '9876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_registered`
--
ALTER TABLE `course_registered`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `students_detail`
--
ALTER TABLE `students_detail`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_registered`
--
ALTER TABLE `course_registered`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students_detail`
--
ALTER TABLE `students_detail`
  MODIFY `stu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
