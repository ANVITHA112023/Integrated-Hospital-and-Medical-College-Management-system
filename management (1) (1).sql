-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 05:09 AM
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
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_name` varchar(50) NOT NULL,
  `D_id` int(11) NOT NULL,
  `Phone_no` varchar(12) NOT NULL,
  `Speciality` varchar(50) NOT NULL,
  `Availability1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_name`, `D_id`, `Phone_no`, `Speciality`, `Availability1`) VALUES
('chetu', 12, ' 9845673278', 'cardiologist', 'mon-fri'),
('chetana', 15, ' 1234567890', 'cardiologist', 'mon-fri');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_name` varchar(50) NOT NULL,
  `E_id` int(11) NOT NULL,
  `Phone_no` varchar(11) NOT NULL,
  `E_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_name`, `E_id`, `Phone_no`, `E_type`) VALUES
('Maxwell', 15, ' 9845673278', ' Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `username` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`username`, `password1`, `email`, `id`) VALUES
('ABHI', 'ABHI5', ' abhi@gmail.com', 20);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `username` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `password1`) VALUES
('CIA', '173257');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_id` int(11) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `Phone_no` varchar(10) NOT NULL,
  `D_name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Disease` varchar(50) NOT NULL,
  `Medication` varchar(50) NOT NULL,
  `Admission_date` date NOT NULL,
  `Discharge_date` date NOT NULL,
  `Visit_type` varchar(50) NOT NULL,
  `Billing` int(11) NOT NULL,
  `D_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_id`, `P_name`, `Phone_no`, `D_name`, `Gender`, `Age`, `Disease`, `Medication`, `Admission_date`, `Discharge_date`, `Visit_type`, `Billing`, `D_id`) VALUES
(50, 'Chithra', '9380063038', 'chetu', '', 30, 'coughs', '0', '2024-12-13', '2024-12-13', 'Inpatient', 122, 12),
(101, 'John Doe', '', 'Dr. Smith', 'Male', 30, 'Flu', 'Paracetamol', '2024-11-25', '2024-11-30', 'Outpatient', 200, 0),
(102, 'Anu', '', 'Dr. Smith', 'Male', 30, 'Flu', 'Paracetamol', '2024-11-25', '2024-11-30', 'Outpatient', 200, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_id`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
