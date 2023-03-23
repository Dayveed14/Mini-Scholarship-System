-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 04:46 PM
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
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_due` date NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`id`, `amount`, `date_due`, `session`) VALUES
(3, 1000, '2021-06-28', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `dues_history`
--

CREATE TABLE `dues_history` (
  `id` int(11) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dues_history`
--

INSERT INTO `dues_history` (`id`, `total_paid`, `date_paid`, `reg_number`, `session`) VALUES
(1, 1000, '2019-09-02', '16SCCO692', '2019/2020'),
(2, 1000, '2020-08-03', '16SCCO692', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_due` date NOT NULL,
  `penalty` int(11) NOT NULL,
  `date_closed` date NOT NULL,
  `session` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `amount`, `date_due`, `penalty`, `date_closed`, `session`, `semester`) VALUES
(3, 20000, '2021-06-16', 22000, '2021-06-30', '2021/2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_history`
--

CREATE TABLE `fee_history` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `due_date` date NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_history`
--

INSERT INTO `fee_history` (`id`, `amount`, `total_paid`, `date_paid`, `due_date`, `reg_number`, `session`, `semester`) VALUES
(1, 20000, 22000, '2019-08-22', '2019-08-19', '16SCCO692', '2019/2020', 1),
(2, 23000, 25000, '2020-01-29', '2020-01-20', '16SCCO692', '2019/2020', 2),
(5, 22000, 24000, '2020-07-30', '2020-07-20', '16SCCO692', '2020/2021', 1),
(6, 25000, 25000, '2021-02-09', '2021-02-15', '16SCCO692', '2020/2021', 2);

-- --------------------------------------------------------

--
-- Table structure for table `political_post`
--

CREATE TABLE `political_post` (
  `id` int(11) NOT NULL,
  `position` text NOT NULL,
  `session` varchar(100) NOT NULL,
  `reg_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `political_post`
--

INSERT INTO `political_post` (`id`, `position`, `session`, `reg_number`) VALUES
(2, 'Course Rep', '2019/2020', '16SCCO692'),
(3, '200 Level Parliamentarian', '2020/2021', '16SCCO692'),
(4, 'Course Rep', '2020/2021', '16SCCO692');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `gpa` varchar(100) NOT NULL,
  `subjects_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `reg_number`, `session`, `semester`, `gpa`, `subjects_number`) VALUES
(1, '16SCCO692', '2019/2020', 1, '3.80', 11),
(2, '16SCCO692', '2019/2020', 2, '4.00', 15),
(3, '16SCCO692', '2020/2021', 1, '4.17', 17),
(4, '16SCCO692', '2020/2021', 2, '3.99', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `roles` int(11) NOT NULL,
  `hashed_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `reg_number`, `roles`, `hashed_password`) VALUES
(1, 'David', 'Edwin', '08012345678', '16SCCO692', 2, '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, 'Admin', 'Fake', '08087654321', '16SCCO001', 1, '356a192b7913b04c54574d18c28d46e6395428ab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dues_history`
--
ALTER TABLE `dues_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_history`
--
ALTER TABLE `fee_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `political_post`
--
ALTER TABLE `political_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
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
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dues_history`
--
ALTER TABLE `dues_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_history`
--
ALTER TABLE `fee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `political_post`
--
ALTER TABLE `political_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
