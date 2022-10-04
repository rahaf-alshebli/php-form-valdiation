-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 01:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_adv`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `familyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_lastLogged` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `familyname`, `email`, `password`, `phone`, `dob`, `date_created`, `date_lastLogged`, `role`, `salary`) VALUES
(3, 'alqasemmmmmm', 'saif', 'ayman', 'ahmad', 'mohammed1234@gmail.com', '77200799', 4720533, '2007-07-07', '2022-09-21', '0000-00-00', 'Admin', 500),
(4, 'Doaa', 'Doaa', 'ahmad', 'Alobeidat', 'doaa23@gmail.com', '00000001', 789361332, '1999-11-21', '2022-09-22', '0000-00-00', 'Admin', 600),
(5, 'Majd', 'Mohammad', 'aaaa', 'Atyyat', 'majd23@gmail.com', '11111111', 775252251, '1994-04-24', '2022-09-22', '0000-00-00', 'Super admin', 0),
(8, 'John', 'mark', 'Smth', 'snow', 'jo88@gmail.com', '77200799', 775252251, '1993-06-07', '2022-09-26', '0000-00-00', 'user', 0),
(9, 'John', 'mark', 'Smth', 'snow', 'John77@gmail.com', '12345678', 775252251, '2000-02-26', '2022-09-26', '0000-00-00', 'user', 0),
(10, 'dana', 'ahmed', 'ayman', 'jameel', 'dana1234@gmail.com', '00000000', 4720533, '2000-06-26', '2022-09-26', '0000-00-00', 'user', 0),
(11, 'heba', 'zaid', 'omar', 'klube', 'heba22@gmail.com', '090909090909', 775252251, '1998-06-26', '2022-09-26', '0000-00-00', 'Admin', 0),
(12, 'osama', 'Mohammad', 'aaaa', 'ahmad', 'osama@gmail.com', '123456789', 775252250, '1995-06-26', '2022-09-26', '0000-00-00', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
