-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 01:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dill`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `email` varchar(50) NOT NULL,
  `db_1` int(11) NOT NULL,
  `db_2` int(11) NOT NULL,
  `db_3` int(11) NOT NULL,
  `db_4` int(11) NOT NULL,
  `db_5` int(11) NOT NULL,
  `pros_1` int(11) NOT NULL,
  `pros_2` int(11) NOT NULL,
  `pros_3` int(11) NOT NULL,
  `pros_4` int(11) NOT NULL,
  `pros_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`email`, `db_1`, `db_2`, `db_3`, `db_4`, `db_5`, `pros_1`, `pros_2`, `pros_3`, `pros_4`, `pros_5`) VALUES
('user10@cloud.services', 15, 15, 15, 15, 10, 30, 30, 30, 25, 25),
('user11@cloud.services', 15, 15, 15, 15, 12, 30, 30, 30, 29, 25),
('user12@cloud.services', 15, 15, 15, 15, 13, 30, 30, 30, 30, 25),
('user1@cloud.services', 15, 12, 10, 10, 10, 25, 25, 25, 25, 25),
('user2@cloud.services', 15, 14, 10, 10, 10, 28, 25, 25, 25, 25),
('user3@cloud.services', 15, 15, 10, 10, 10, 30, 25, 25, 25, 25),
('user4@cloud.services', 15, 15, 11, 10, 10, 30, 26, 25, 25, 25),
('user5@cloud.services', 15, 15, 12, 10, 10, 30, 27, 25, 25, 25),
('user6@cloud.services', 15, 15, 14, 10, 10, 30, 29, 25, 25, 25),
('user7@cloud.services', 15, 15, 15, 10, 10, 30, 30, 25, 25, 25),
('user8@cloud.services', 15, 15, 15, 11, 10, 30, 30, 26, 25, 25),
('user9@cloud.services', 15, 15, 15, 13, 10, 30, 30, 29, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `processors`
--

CREATE TABLE `processors` (
  `id` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `resv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processors`
--

INSERT INTO `processors` (`id`, `size`, `speed`, `location`, `resv`) VALUES
('pros_1', 2000, 2546, 'China', 20),
('pros_2', 3000, 5678, 'Nepal', 30),
('pros_3', 5000, 5678, 'Australia', 45),
('pros_4', 3500, 2442, 'Pakistan', 24),
('pros_5', 8000, 5487, 'Canada', 54);

-- --------------------------------------------------------

--
-- Table structure for table `resourses`
--

CREATE TABLE `resourses` (
  `name` varchar(50) NOT NULL,
  `Size` int(11) NOT NULL,
  `inuse` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourses`
--

INSERT INTO `resourses` (`name`, `Size`, `inuse`, `speed`, `location`) VALUES
('db_1', 5000, 20, 100, 'Uganda'),
('db_2', 2000, 20, 200, 'USA'),
('db_3', 3000, 30, 100, 'India'),
('db_4', 5000, 50, 100, 'Iran'),
('db_5', 6000, 60, 300, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(60) NOT NULL,
  `db` int(11) NOT NULL,
  `db_t` int(11) NOT NULL,
  `qu` int(11) NOT NULL,
  `qu_t` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `db`, `db_t`, `qu`, `qu_t`, `days`) VALUES
('user10@cloud.services', 70, 49, 140, 80, 18),
('user11@cloud.services', 72, 50, 144, 82, 18),
('user12@cloud.services', 73, 50, 145, 83, 19),
('user1@cloud.services', 57, 43, 125, 70, 11),
('user2@cloud.services', 59, 44, 128, 72, 12),
('user3@cloud.services', 60, 45, 130, 75, 13),
('user4@cloud.services', 61, 45, 131, 75, 13),
('user5@cloud.services', 62, 46, 132, 76, 14),
('user6@cloud.services', 64, 47, 134, 77, 14),
('user7@cloud.services', 65, 47, 135, 77, 15),
('user8@cloud.services', 66, 48, 136, 78, 16),
('user9@cloud.services', 68, 49, 139, 79, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resourses`
--
ALTER TABLE `resourses`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
