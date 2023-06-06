-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 07:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_leave`
--

CREATE TABLE `apply_leave` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `Class` varchar(20) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `admin_status` varchar(20) NOT NULL,
  `admin_remark` varchar(255) NOT NULL,
  `hod_status` varchar(20) NOT NULL,
  `hod_remark` varchar(20) NOT NULL,
  `lib_status` varchar(20) NOT NULL,
  `lib_remark` varchar(20) NOT NULL,
  `lab_status` varchar(20) NOT NULL,
  `lab_remark` varchar(20) NOT NULL,
  `sch_status` varchar(20) NOT NULL,
  `sch_remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_leave`
--

INSERT INTO `apply_leave` (`id`, `name`, `lastname`, `Class`, `department`, `admin_status`, `admin_remark`, `hod_status`, `hod_remark`, `lib_status`, `lib_remark`, `lab_status`, `lab_remark`, `sch_status`, `sch_remark`) VALUES
(1, 'Viraj', 'Salvi', 'CO5IA', 'Computer Engineering', 'Rejected', 'Check Due', 'Approved', 'None', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending'),
(2, 'Prashansa ', 'Erande', 'CO5IA', 'Computer Engineering', 'Approved', 'None', 'Rejected', 'Check Due', 'Rejected', 'Check Due', 'Approved', 'None', 'Approved', 'None'),
(3, 'Arfia', 'Shaikh', 'CO5IA', 'Computer Engineering', 'Rejected', 'Check Due', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending'),
(4, 'Khushi', 'Rohra', 'CO5IA', 'Computer Engineering', 'Approved', 'None', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `role`) VALUES
(0, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(1, 'arfia', 'hod@gmail.com', 'hod', 'hod'),
(2, 'Viraj', 'labstaff@gmail.com', 'labstaff', 'labstaff'),
(3, 'Sanica', 'scholarshipdept@gmail.com', 'scholarshipdept', 'scholarshipdepartment'),
(4, 'prashansa', 'librarian@gmail.com', 'librarian', 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `Class` varchar(20) NOT NULL,
  `Email_Id` varchar(255) NOT NULL,
  `Phone_No` decimal(10,0) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `lastname`, `Class`, `Email_Id`, `Phone_No`, `password`, `department`, `birthday`, `role`) VALUES
(1, 'Viraj', 'Salvi', 'CO5IA', 'viraj@gmail.com', '9874876234', 'viraj', 'Computer Engineering', '2002-04-16', 'student'),
(2, 'Prashansa ', 'Erande', 'CO5IA', 'prashansa@gmail.com', '9482984254', 'prashansa', 'Computer Engineering', '2003-08-05', 'student'),
(3, 'Arfia', 'Shaikh', 'CO5IA', 'arfia@gmail.com', '9987225410', 'arfia', 'Computer Engineering', '2004-01-03', 'student'),
(4, 'Khushi', 'Rohra', 'CO5IA', 'khushirohra@gmail.com', '9482984254', 'khushi', 'Computer Engineering', '2003-08-16', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
