-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2021 at 05:09 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l3`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `workflowengine` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `workflowengine`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'janakiram1607', '', 1, 'janakiram1607@gmail.com', '$2y$10$PMvPMEOLB.IbJodEWCT/Ruua7XpHZiqNXvxBB3PfODZqA968Rbd9u', 1, '2021-05-05', '2021-05-05'),
(13, 'f1', 'l1', 3, 'l1@gmail.com', '$2y$10$wbAtZMZiit9U8kKZW24Q5ukjwHZ65a84dXZquzeW1dqeuXxqOdpgq', 0, '2021-05-06', '2021-05-07'),
(14, 'Lashika', 'Sree', 3, 'lashikasree@gmail.com', '$2y$10$Be5HhX8BjUIoeFLBDcst5eQjct2SRZMuvFiUmS/7/2vqZqHlhdfD2', 0, '2021-05-06', '2021-05-07'),
(15, 'l2', '55', 3, 'l2@gmail.com', '$2y$10$a.9OjcZXrSI9erLE1tWtdOpxBNI5xDJYCTV9Ro3y1LpaTvJIUf2O2', 0, '2021-05-06', '2021-05-07'),
(16, 'Prabha', 'K', 3, 'prabhakar@gmail.com', '$2y$10$HDaZ3pJUxo92PCYQ62NPhOJt7eCAxzvSH1eFisxNB/DIyv3Tq6euq', 0, '2021-05-07', '2021-05-07'),
(17, 'Lashikass', 'J', 3, 'ls@gmail.com', '$2y$10$NzKTwztO2ZCG9mKKntG5WuBjdjmSPpLCSS8qhZRIBl2J8uTotlujK', 1, '2021-05-07', '2021-05-07'),
(18, 'Test', 'User', 4, 'testuser745@gmail.com', '$2y$10$.CiXbuY6YRhla38dbF4YzOu16QuLsGiQChvuIApRhfnI/Rc0TKkiO', 0, '2021-05-07', '2021-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `workflowengines`
--

CREATE TABLE `workflowengines` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workflowengines`
--

INSERT INTO `workflowengines` (`id`, `name`) VALUES
(1, 'Draft'),
(2, 'In review'),
(3, 'Approved'),
(4, 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflowengines`
--
ALTER TABLE `workflowengines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `workflowengines`
--
ALTER TABLE `workflowengines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
