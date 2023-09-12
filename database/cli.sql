-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 07:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cli`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `token_no` int(3) NOT NULL,
  `date` date NOT NULL,
  `appointment_date` date NOT NULL,
  `patient` int(12) NOT NULL,
  `doctor` int(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `token_no`, `date`, `appointment_date`, `patient`, `doctor`, `status`) VALUES
(11, 1, '2022-11-10', '2022-11-10', 21, 104, 0),
(12, 1, '2022-11-10', '2022-11-10', 19, 104, 0),
(13, 1, '2022-11-10', '2022-11-09', 19, 104, 0),
(14, 1, '2022-11-17', '2022-11-30', 23, 104, 0),
(16, 1, '2022-11-17', '2023-08-23', 20, 104, 0),
(17, 1, '2022-11-17', '2345-05-24', 20, 104, 0),
(18, 1, '2022-11-17', '2022-12-23', 20, 100, 0),
(19, 1, '2022-11-17', '2022-11-17', 20, 100, 0),
(20, 1, '2022-11-17', '2022-11-29', 26, 96, 0),
(21, 1, '2022-11-17', '2022-11-18', 20, 100, 0),
(22, 1, '2022-11-20', '2022-11-20', 20, 104, 0),
(23, 1, '2022-11-20', '2022-11-22', 20, 104, 0),
(24, 1, '2022-11-20', '2022-11-20', 20, 102, 0),
(25, 1, '2022-11-20', '2022-11-19', 20, 104, 0),
(26, 1, '2022-11-20', '2022-11-08', 20, 104, 0),
(27, 1, '2022-11-20', '2022-10-29', 20, 104, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_Id` int(12) NOT NULL,
  `Fullname` text NOT NULL,
  `slmc` varchar(12) NOT NULL,
  `special1` varchar(50) NOT NULL,
  `special2` varchar(50) NOT NULL,
  `hospital` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `upassword` varchar(16) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `Gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_Id`, `Fullname`, `slmc`, `special1`, `special2`, `hospital`, `email`, `upassword`, `nic`, `adress`, `city`, `Gender`) VALUES
(96, 'Mohammed Nasik', 'Doc126', 'Neurology      ', 'Ent ', 'kandy', 'mohammednasik68@gmail.com', '12345678', '991913062v', '485/1/c', 'Gelioya', 'female'),
(99, 'Mohammed Nasik', '77', 'Neurology', 'Ent ', 'kandy', 'mohammed777@gmail.com', '12345678', '991913077v', '485/1/c', 'Gelioya', 'male'),
(100, 'Mohammed Nasec', 'asd', 'Neurology    ', 'Ent ', 'asdfghjk', 'mohammed757@gmail.com', '12345678', '991963777v', '485/1/c', 'Gelioya', 'male'),
(102, 'Mohammed ilsad', 'fgh11', 'abcd ', 'Ent ', 'kandy', 'mohammed1111o@gmail.com', '12345678', '911963777v', '485/1/c', 'Gelioya', 'male'),
(104, 'laxman', 'doc225', 'Neurology ', 'Ent ', 'kandy', 'mohammed4561@gmail.com', 'laxman@123', '800740983v', '123/A, peradeniya road', 'Gelioya', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `Nic` varchar(12) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `phone` text NOT NULL,
  `type` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwords` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `fullname`, `Nic`, `adress`, `city`, `phone`, `type`, `email`, `passwords`) VALUES
(13, 'Mohammed Nasik', '991913092v', '485/1/c', 'Gelioya', '772977835', 'admin', 'mohammed@gmail.com', '12345678'),
(14, 'naleem', '991963777v', '485/1/c', 'Gelioya', '112500371', 'Employee', 'mohammed22@gmail.com', '87654321'),
(15, 'nizar', '691913087v', 'qwerty', 'colombo', '0112500371', 'Admin', 'mohammednizar@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_no` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patientname` text NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patientname`, `dob`, `address`, `city`, `phone`, `email`, `password`) VALUES
(19, 'Mohammed Nasik', '2022-11-16', '485/1/c', 'Gelioya', '772977835', 'mohamme123d@gmail.com', '12345678'),
(20, 'Mohammed Nasik', '2001-11-04', '485/1/c', 'Gelioya', '772977835', 'mohammed@gmail.com', '12345678'),
(21, 'Mohammed Nasik', '2022-11-11', '485/1/c', 'Gelioya', '2147483647', 'movvvvhammed@gmail.com', '12345678'),
(23, 'Mohammed aathif', '2000-11-21', '485/1/c', 'Gelioya', '772977835', 'mohammed22@gmail.com', '12345678'),
(24, 'Mohammed aathif', '1999-07-09', '485/1/c', 'kandy', '112500371', 'mohamme33d22@gmail.com', '12345678'),
(25, 'Mohammed Nasik', '2022-11-09', '485/1/c', 'Gelioya', '772977835', 'mohammed12323232@gmail.com', '12345678'),
(26, 'laxman', '2000-11-04', '485/1/c', 'peradeniya', '112500371', 'laxman@gmail.com', '12345678'),
(27, ' Nasik', '2022-10-04', '485/1/c', 'Gelioya', '0772977835', 'mohammed123321@gmail.com', '12345678'),
(28, 'alfonso davies', '1994-01-25', 'No 27 kalugamuwa', 'Gelioya', '0766402206', 'alfoso@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `recept_it` varchar(10) NOT NULL,
  `amount` int(4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `clock_in` time NOT NULL,
  `clock_out` time NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_id` int(11) NOT NULL,
  `medicine` varchar(150) NOT NULL,
  `treatments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `patient` (`patient`),
  ADD KEY `doctor` (`doctor`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_Id`),
  ADD UNIQUE KEY `slmc` (`slmc`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_no`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Doctor_Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`patient`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`doctor`) REFERENCES `doctor` (`Doctor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
