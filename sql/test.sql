-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql6.freesqldatabase.com
-- Generation Time: Jul 17, 2022 at 03:30 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql6506138`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `eemail` varchar(50) NOT NULL,
  `phn` bigint(10) NOT NULL,
  `addrs` varchar(60) NOT NULL,
  `age` int(2) NOT NULL,
  `gen` enum('Male','Female','Other') NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `balance` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `uname`, `eemail`, `phn`, `addrs`, `age`, `gen`, `pwd`, `balance`) VALUES
(3195064020, 'abc', 'abc@v.in', 8585858585, 'Vizag', 19, 'Male', '123456', 50000),
(3195064021, 'Vishnu', 'v@v.in', 8500800703, 'Vizag', 20, 'Male', '8500800', 47700),
(3195064022, 'Raja', 'raj@r.in', 5555555555, 'Vizag', 25, 'Male', '123456', 17300),
(3195064023, 'Vish', 'vi@g.in', 8500800703, 'Vizag', 22, 'Male', '123456', 20000),
(3195064024, 'MDS Vishnu Vardhan', 'viva@g.in', 8500800703, 'Vizag', 21, 'Male', '123456', 47000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3195064025;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
