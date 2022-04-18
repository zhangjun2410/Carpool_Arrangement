-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2017 at 05:26 AM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qfzwrbbk_car_pool`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNum` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hasCar` tinyint(1) NOT NULL,
  `openCarSeatCount` int(3) NOT NULL,
  `physicalAddress` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phoneNum`, `password`, `isactive`, `dt`, `hasCar`, `openCarSeatCount`, `physicalAddress`, `latitude`, `longitude`) VALUES
(11, 'Mike', 'Taylor', 'mike222taylor@rediffmail.com', 2147483647, '123456', 0, '2017-05-04 17:05:55', 1, 3, 'behind', 40.8154, -73.9445),
(12, 'Mike', 'T', 'mike111taylor@gmail.com', 2147483647, '123456', 0, '2017-05-04 17:05:59', 0, 0, 'behind', 40.8154, -73.9445),
(13, 'John', 'Lee', 'Awesome@gmail.com', 2147483647, 'qqqqwwww', 0, '2017-05-04 22:05:51', 1, 3, '3089 Davis Drive, Oxford MS', 34.3623, -89.5568),
(14, 'John', 'Lee', 'Awesome@gmail.com', 2147483647, 'qqqqwwww', 0, '2017-05-04 22:05:18', 1, 3, '3089 Davis Drive, Oxford MS', 34.3623, -89.5568),
(15, 'Mike1223', 'Taylor', 'mike222taylor@rediffmail.com', 2147483647, '123456', 0, '2017-05-05 11:05:08', 1, 56, 'behind', 40.8154, -73.9445),
(16, 'Mike', 'Taylor', 'mike222taylor@rediffmail.com', 2147483647, '123456', 0, '2017-05-05 11:05:23', 1, 2, '176 Stanton St, New York, NY 10002, USA\r\n', 40.7203, -73.984),
(17, 't', 'v', 'mike222taylor@rediffmail.com', 2147483647, '123456', 0, '2017-05-05 12:05:12', 1, 123, 'florida', 27.6648, -81.5158);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
