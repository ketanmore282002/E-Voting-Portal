-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 07:17 PM
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
-- Database: `onlinevotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_role` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `contact_no`, `password`, `user_role`, `birth_date`, `gender`) VALUES
(55, 'admin', '1234567899', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Admin', '1996-06-14', 'male'),
(56, 'voter1', '1234567899', '5a6df720540c20d95d530d3fd6885511223d5d20', 'voter', '2000-02-02', 'male'),
(57, 'voter2', '1234567899', 'a1047eab1035d58682a53557e0b2a75edbfd15fd', 'voter', '2002-02-03', 'female'),
(58, 'voter3', '1234567899', 'c5e31d5915661de4393e3f1489b00ebc4497dd48', 'voter', '2003-04-01', 'male'),
(59, 'voter4', '8317401707', '8090fd368c8382fd4b216c5baa04c99769dfcc49', 'voter', '2002-08-28', 'male'),
(60, 'voter5', '8317401707', '59e859397b1ab522aaf698d9d42d5f064fd11381', 'voter', '2003-08-02', 'male'),
(61, 'prathamesh', '8317401707', '6d3236ec3c88039ca534b81acad564e847ecb062', 'voter', '2002-03-02', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
