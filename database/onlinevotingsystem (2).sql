-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 04:41 PM
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
-- Table structure for table `candidates_details`
--

CREATE TABLE `candidates_details` (
  `id` int(11) NOT NULL,
  `election_id` int(11) DEFAULT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `candidate_details` text DEFAULT NULL,
  `candidate_photo` text DEFAULT NULL,
  `inserted_by` varchar(255) DEFAULT NULL,
  `inserted_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates_details`
--

INSERT INTO `candidates_details` (`id`, `election_id`, `candidate_name`, `candidate_details`, `candidate_photo`, `inserted_by`, `inserted_on`) VALUES
(52, 41, 'ketan more', 'positive nature', '../assets/images/candidate_photos/265765272521544380648917539369_5874880.jpg', 'admin', '2024-03-08'),
(53, 41, 'durgesh kanase', 'always helping nature', '../assets/images/candidate_photos/694622394598097555575917539369_5874880 (2) - Copy.jpg', 'admin', '2024-03-08'),
(54, 41, 'harsh mane', 'always happy', '../assets/images/candidate_photos/435500063252016622488717539375_5874890.jpg', 'admin', '2024-03-08'),
(55, 42, 'Snehal Kumbhar', 'helping nature', '../assets/images/candidate_photos/246020845445010447653617539369_5874880 (1).jpg', 'admin', '2024-03-08'),
(56, 42, 'Komal kunkeker', 'positive nature', '../assets/images/candidate_photos/4316173809561598853945Screenshot 2024-03-08 182653.png', 'admin', '2024-03-08'),
(57, 43, 'Himanshu Mane', 'good leadership qualities', '../assets/images/candidate_photos/5375759056561323015713Screenshot 2024-03-08 183747.png', 'admin', '2024-03-08'),
(58, 43, 'Satyajit Karade', 'positive nature', '../assets/images/candidate_photos/5795682009036668465038Screenshot 2024-03-08 183420.png', 'admin', '2024-03-08'),
(59, 41, 'NOTA', '...', '../assets/images/candidate_photos/168368385477319385100Screenshot 2024-03-13 081527.png', 'admin', '2024-03-13'),
(60, 42, 'NOTA\r\n', '...', '../assets/images/candidate_photos/6718010254630311237476Screenshot 2024-03-13 081527.png', 'admin', '2024-03-13'),
(61, 43, 'NOTA', '...', '../assets/images/candidate_photos/9981212343625278070909Screenshot 2024-03-13 081527.png', 'admin', '2024-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(11) NOT NULL,
  `election_topic` varchar(255) DEFAULT NULL,
  `no_of_candidates` int(11) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `inserted_by` varchar(255) DEFAULT NULL,
  `inserted_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `election_topic`, `no_of_candidates`, `starting_date`, `ending_date`, `status`, `inserted_by`, `inserted_on`) VALUES
(41, ' Class Representative (CR)', 4, '2024-03-08', '2024-03-12', 'Expired', 'admin', '2024-03-08'),
(42, '  Ladies Representative (LR)', 5, '2024-03-13', '2024-03-14', 'Expired', 'admin', '2024-03-08'),
(43, '       General Secretary ', 4, '2024-03-01', '2024-03-02', 'Expired', 'admin', '2024-03-08');

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
(61, 'prathamesh', '8317401707', '6d3236ec3c88039ca534b81acad564e847ecb062', 'voter', '2002-03-02', 'male'),
(62, 'voter13', '1234567899', '2385d6acafa258063295f4086228d9fa867c4737', 'voter', '0001-02-15', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` int(11) NOT NULL,
  `election_id` int(11) DEFAULT NULL,
  `voters_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) NOT NULL,
  `vote_date` date DEFAULT NULL,
  `vote_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `election_id`, `voters_id`, `candidate_id`, `vote_date`, `vote_time`) VALUES
(48, 41, 56, 52, '2024-03-08', '02:27:59'),
(49, 43, 56, 58, '2024-03-08', '02:28:08'),
(50, 41, 57, 53, '2024-03-08', '02:29:26'),
(51, 43, 57, 57, '2024-03-08', '02:29:29'),
(52, 41, 59, 54, '2024-03-08', '02:32:04'),
(53, 43, 59, 58, '2024-03-08', '02:32:07'),
(54, 41, 60, 52, '2024-03-08', '02:33:00'),
(55, 43, 60, 57, '2024-03-08', '02:33:04'),
(56, 41, 62, 53, '2024-03-11', '07:39:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates_details`
--
ALTER TABLE `candidates_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates_details`
--
ALTER TABLE `candidates_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
