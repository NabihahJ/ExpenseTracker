-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 12:27 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `totalbalance`
--

CREATE TABLE `totalbalance` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `balance` int(25) NOT NULL,
  `totincome` int(25) NOT NULL,
  `totexpense` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalbalance`
--

INSERT INTO `totalbalance` (`id`, `username`, `balance`, `totincome`, `totexpense`) VALUES
(1, 'sharvin', 110, 70, 20),
(2, 'user1', 100, 111, 11);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(15) NOT NULL,
  `user` varchar(50) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `income` int(25) DEFAULT NULL,
  `expense` int(25) DEFAULT NULL,
  `tdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user`, `tname`, `income`, `expense`, `tdate`) VALUES
(22, 'user1', 'qqqq', NULL, 11, '2021-12-18'),
(21, 'user1', 'aaaa', 111, NULL, '2021-12-18'),
(20, 'sharvin', 'eeeeeee', NULL, 10, '2021-12-18'),
(19, 'sharvin', 'oooo', 20, NULL, '2021-12-18'),
(18, 'sharvin', 'aaaaqq', 15, NULL, '2021-12-18'),
(17, 'sharvin', 'aaaa', 10, NULL, '2021-12-18'),
(16, 'sharvin', 'aaaa', 10, NULL, '2021-12-18'),
(15, 'sharvin', 'aaaa', 10, NULL, '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(20, 'sharvin', 'qqqqq123'),
(26, 'user1', 'wwwww12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `totalbalance`
--
ALTER TABLE `totalbalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `totalbalance`
--
ALTER TABLE `totalbalance`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
