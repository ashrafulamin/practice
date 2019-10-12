-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 08:41 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `date` date NOT NULL,
  `user_id` int(15) NOT NULL,
  `in_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`date`, `user_id`, `in_time`, `out_time`) VALUES
('2019-06-21', 2, '2019-06-21 02:27:46', '2019-06-21 06:35:10'),
('2019-06-21', 4, '2019-06-21 02:27:57', '2019-06-21 06:35:22'),
('2019-06-21', 3, '2019-06-21 02:28:46', '2019-06-21 06:35:22'),
('2019-07-19', 1, '2019-07-18 23:00:00', '2019-07-19 00:00:00'),
('2019-07-19', 2, '2019-07-19 10:21:55', '2019-07-19 10:29:56'),
('2019-07-19', 4, '2019-07-19 10:22:03', '2019-07-19 10:30:08'),
('2019-07-19', 3, '2019-07-19 10:22:04', '2019-07-19 10:27:04'),
('2019-10-12', 4, '2019-10-12 06:33:54', '2019-10-12 06:40:10'),
('2019-10-12', 3, '2019-10-12 06:33:54', '2019-10-12 06:40:11'),
('2019-10-12', 2, '2019-10-12 06:35:14', '2019-10-12 06:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mac_add` varchar(20) NOT NULL,
  `user_id` int(255) NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `mac_add`, `user_id`, `last_seen`) VALUES
(1, 'Jumana\'s PC', '2C-D0-5A-57-C2-F8', 2, '2019-07-19 10:29:56'),
(2, 'Fahim\'s PC', '0C-54-15-5D-C6-A9', 3, '2019-06-21 01:19:36'),
(3, 'Prema\'s PC', '44-1C-A8-93-90-6B', 4, '0000-00-00 00:00:00'),
(4, 'Ashraful\'s PC', '7C-2A-31-B9-FE-83', 1, '0000-00-00 00:00:00'),
(5, 'Jumana\'s Phone', '48-01-C5-14-D4-8E', 2, '2019-10-12 06:40:10'),
(6, 'Prema\'s Phone', '20-A6-0C-31-EA-73', 4, '2019-10-12 06:40:10'),
(7, 'Fahim\'s Phone', '6C-B7-49-FE-AA-06', 3, '2019-10-12 06:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `user_id`, `type`, `date_start`, `date_end`, `description`, `status`) VALUES
(1, 0, 'official', '2019-10-10', '2019-10-25', '', ''),
(2, 1, 'official', '2019-10-24', '2019-10-09', 'aaaa', 'Pending'),
(3, 1, 'sick', '2019-10-24', '2019-10-08', 'aaaa', 'Approved'),
(4, 1, 'sick', '2019-10-24', '2019-10-26', 'aaaa', 'Approved'),
(5, 1, 'sick', '2019-10-24', '2019-10-26', 'aaaa', 'Approved'),
(6, 1, 'official', '2019-10-24', '2019-10-25', 'aaaaa', 'Declined'),
(7, 1, 'Choose...', '2019-10-18', '2019-10-25', 'aaaa', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Rafi', 'ashraful@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(2, 'Jumana', 'jumana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(3, 'Fahim', 'fahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(4, 'Prema', 'prema@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(6, 'Sakib', 'sakib@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(8, 'Rubel', 'rubel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `attendance_user_id` (`user_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mac_add` (`mac_add`),
  ADD KEY `users_user_id` (`user_id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
