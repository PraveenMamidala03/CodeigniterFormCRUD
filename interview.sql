-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 12:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `name`) VALUES
(1, 'Pre-degree'),
(2, 'Undergraduate'),
(3, 'Postgraduate');

-- --------------------------------------------------------

--
-- Table structure for table `qualification_sub`
--

CREATE TABLE `qualification_sub` (
  `id` int(11) NOT NULL,
  `qualification_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification_sub`
--

INSERT INTO `qualification_sub` (`id`, `qualification_id`, `name`) VALUES
(1, '1', '10th'),
(2, '1', 'Intermediate'),
(3, '2', 'B.com'),
(4, '2', 'B.tech'),
(5, '2', 'B.sc'),
(6, '2', 'B.E'),
(7, '1', 'Other'),
(8, '2', 'Other'),
(9, '3', 'M.tech'),
(10, '3', 'M.sc'),
(11, '3', 'MBA'),
(12, '3', 'M.com'),
(13, '3', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `created_record` datetime NOT NULL,
  `level_of_qualification` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `study` varchar(400) NOT NULL,
  `course` varchar(400) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `date_of_birth`, `gender`, `image`, `created_record`, `level_of_qualification`, `qualification`, `study`, `course`, `comment`) VALUES
(6, 'Praveen', 'praveen@gmail.com', 9014919259, '2021-12-31', 'male', '16471690290_pAdZLfSqNrMZAAPA-1645178466-id.jpg', '2022-03-13 09:42:46', 2, 4, 'Engineering and technology', 'MBA', 'amazing,......');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification_sub`
--
ALTER TABLE `qualification_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualification_sub`
--
ALTER TABLE `qualification_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
