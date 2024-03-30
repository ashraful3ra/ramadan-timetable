-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2024 at 10:03 AM
-- Server version: 8.0.36-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrashraf_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `ramadan_forms`
--

CREATE TABLE `ramadan_forms` (
  `id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `day` varchar(20) NOT NULL,
  `sehri_time` time NOT NULL,
  `iftar_time` time NOT NULL,
  `ramadan_no` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ramadan_forms`
--

INSERT INTO `ramadan_forms` (`id`, `date`, `day`, `sehri_time`, `iftar_time`, `ramadan_no`) VALUES
(6, '2024-03-30', 'Saturday', '04:31:00', '18:17:00', 19),
(7, '2024-03-31', 'Sunday', '04:30:00', '18:18:00', 20),
(8, '2024-04-01', 'Monday', '04:29:00', '18:18:00', 21),
(9, '2024-04-02', 'Tuesday', '04:28:00', '18:19:00', 22),
(10, '2024-04-03', 'Wednesday', '04:27:00', '18:19:00', 23),
(11, '2024-04-04', 'Thursday', '04:26:00', '18:19:00', 24),
(12, '2024-04-05', 'Friday', '04:24:00', '18:20:00', 25),
(13, '2024-04-06', 'Saturday', '04:24:00', '18:20:00', 26),
(14, '2024-04-07', 'Sunday', '04:23:00', '18:21:00', 27),
(15, '2024-04-08', 'Monday', '04:22:00', '18:21:00', 28),
(16, '2024-04-09', 'Tuesday', '04:21:00', '18:21:00', 29),
(17, '2024-04-10', 'Wednesday', '04:20:00', '18:22:00', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ramadan_forms`
--
ALTER TABLE `ramadan_forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ramadan_forms`
--
ALTER TABLE `ramadan_forms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
