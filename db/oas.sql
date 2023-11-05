-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 03:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'uosadmin', 'uosadmin@admin', '2023-05-25 16:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `matric_marks` int(200) NOT NULL,
  `inter_marks` int(200) NOT NULL,
  `applied_subject` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `cnic`, `contact_number`, `matric_marks`, `inter_marks`, `applied_subject`, `status`, `user_id`, `date`) VALUES
(7, 'Amna', '38103-120301331', '+923456789101', 1050, 990, 'BS-CS', 'pending', 4, '2023-05-27 18:12:30'),
(8, 'Amna', '38103-120301331', '+923456789101', 1050, 990, 'BS-Maths', 'approved', 4, '2023-05-27 18:12:55'),
(9, 'Amna', '38103-120301331', '+923456789101', 1050, 990, 'BS-Management', 'rejected', 4, '2023-05-27 18:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_cnic` varchar(15) DEFAULT NULL,
  `annual_income` decimal(10,2) DEFAULT NULL,
  `marks_matric` int(11) DEFAULT NULL,
  `total_matric` int(11) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `marks_intermediate` int(11) DEFAULT NULL,
  `total_intermediate` int(11) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `uname`, `age`, `date_of_birth`, `contact_number`, `address`, `cnic`, `domicile`, `father_name`, `father_occupation`, `father_cnic`, `annual_income`, `marks_matric`, `total_matric`, `school_name`, `marks_intermediate`, `total_intermediate`, `college_name`, `password`, `image`) VALUES
(4, 'Amna', 'Amna', 20, '2001-10-21', '+923456789101', 'abc house #123 xyz', '38103-120301331', 'Punjab', 'ABC', 'ABCDEF', '31098-7625352-3', '99999999.99', 1050, 1100, 'No 1 School', 990, 1100, 'No 2 College', 'amna123', 'peakpx (4).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
