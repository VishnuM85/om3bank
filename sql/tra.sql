-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql6.freesqldatabase.com
-- Generation Time: Jul 17, 2022 at 03:34 PM
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
-- Table structure for table `tra`
--

CREATE TABLE `tra` (
  `id` int(11) NOT NULL,
  `fromid` bigint(11) NOT NULL,
  `toid` bigint(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cbalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tra`
--

INSERT INTO `tra` (`id`, `fromid`, `toid`, `amount`, `cbalance`) VALUES
(1, 2147483647, 2147483647, 5000, 20000),
(2, 2147483647, 2147483647, 1000, 19000),
(3, 2147483647, 2147483647, 1000, 18000),
(4, 2147483647, 2147483647, 200, 17800),
(5, 3195064022, 3195064021, 500, 17300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tra`
--
ALTER TABLE `tra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tra`
--
ALTER TABLE `tra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
