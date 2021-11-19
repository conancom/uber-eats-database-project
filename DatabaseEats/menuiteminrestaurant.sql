-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 05:47 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uber`
--

-- --------------------------------------------------------

--
-- Table structure for table `menuiteminrestaurant`
--

CREATE TABLE `menuiteminrestaurant` (
  `MenuItemInRestaurantID` bigint(20) NOT NULL,
  `MenuItemID` bigint(20) NOT NULL,
  `RestaurantID` bigint(20) NOT NULL,
  `Creation_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `LimitedTimeDate` date DEFAULT NULL,
  `Discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuiteminrestaurant`
--

INSERT INTO `menuiteminrestaurant` (`MenuItemInRestaurantID`, `MenuItemID`, `RestaurantID`, `Creation_TimeStamp`, `LimitedTimeDate`, `Discount`) VALUES
(1, 1, 6, '2021-11-13 10:25:30', NULL, '10'),
(2, 2, 6, '2021-11-15 04:29:37', NULL, ''),
(3, 3, 6, '2021-11-15 04:29:37', NULL, ''),
(4, 4, 6, '2021-11-15 04:29:37', NULL, ''),
(5, 5, 6, '2021-11-15 04:29:37', NULL, ''),
(6, 6, 6, '2021-11-15 04:29:37', NULL, ''),
(7, 7, 6, '2021-11-15 04:29:37', NULL, ''),
(8, 9, 6, '2021-11-15 04:29:37', NULL, ''),
(9, 10, 4, '2021-11-15 04:29:37', NULL, ''),
(10, 11, 4, '2021-11-15 04:29:37', NULL, ''),
(11, 12, 4, '2021-11-15 04:29:37', NULL, ''),
(12, 13, 4, '2021-11-15 04:29:37', NULL, ''),
(13, 13, 4, '2021-11-15 04:29:37', NULL, ''),
(14, 14, 4, '2021-11-15 04:29:37', NULL, ''),
(15, 15, 4, '2021-11-15 04:29:37', NULL, ''),
(16, 16, 4, '2021-11-15 04:29:37', NULL, ''),
(17, 17, 4, '2021-11-15 04:29:37', NULL, ''),
(18, 18, 4, '2021-11-15 04:29:37', NULL, ''),
(19, 19, 3, '2021-11-15 04:29:37', NULL, ''),
(20, 20, 3, '2021-11-15 04:29:37', NULL, ''),
(21, 21, 3, '2021-11-15 04:29:37', NULL, ''),
(22, 22, 3, '2021-11-15 04:29:37', NULL, ''),
(23, 23, 3, '2021-11-15 04:29:37', NULL, ''),
(24, 24, 3, '2021-11-15 04:29:37', NULL, ''),
(25, 25, 3, '2021-11-15 04:29:37', NULL, ''),
(26, 26, 3, '2021-11-15 04:29:37', NULL, ''),
(27, 27, 3, '2021-11-15 04:29:37', NULL, ''),
(28, 28, 8, '2021-11-15 04:29:37', NULL, ''),
(29, 29, 8, '2021-11-15 04:29:37', NULL, ''),
(30, 30, 8, '2021-11-15 04:29:37', NULL, ''),
(31, 31, 8, '2021-11-15 04:29:37', NULL, ''),
(32, 32, 8, '2021-11-15 04:29:37', NULL, ''),
(33, 33, 8, '2021-11-15 04:29:37', NULL, ''),
(34, 34, 8, '2021-11-15 04:29:37', NULL, ''),
(35, 35, 8, '2021-11-15 04:29:37', NULL, ''),
(36, 36, 8, '2021-11-15 04:29:37', NULL, ''),
(37, 37, 7, '2021-11-15 04:29:37', NULL, ''),
(38, 38, 7, '2021-11-15 04:29:37', NULL, ''),
(39, 39, 7, '2021-11-15 04:29:37', NULL, ''),
(40, 40, 7, '2021-11-15 04:29:37', NULL, ''),
(41, 41, 7, '2021-11-15 04:29:37', NULL, ''),
(42, 42, 7, '2021-11-15 04:29:37', NULL, ''),
(43, 43, 7, '2021-11-15 04:29:37', NULL, ''),
(44, 44, 7, '2021-11-15 04:29:37', NULL, ''),
(45, 45, 7, '2021-11-15 04:29:37', NULL, ''),
(46, 46, 1, '2021-11-15 04:29:37', NULL, ''),
(47, 47, 1, '2021-11-15 04:29:37', NULL, ''),
(48, 48, 1, '2021-11-15 04:29:37', NULL, ''),
(49, 49, 1, '2021-11-15 04:29:37', NULL, ''),
(50, 50, 1, '2021-11-15 04:29:37', NULL, ''),
(51, 51, 1, '2021-11-15 04:29:37', NULL, ''),
(52, 52, 1, '2021-11-15 04:29:37', NULL, ''),
(53, 53, 1, '2021-11-15 04:29:37', NULL, ''),
(54, 54, 1, '2021-11-15 04:29:37', NULL, ''),
(55, 55, 2, '2021-11-15 04:29:37', NULL, ''),
(56, 56, 2, '2021-11-15 04:29:37', NULL, ''),
(57, 57, 2, '2021-11-15 04:29:37', NULL, ''),
(58, 58, 2, '2021-11-15 04:29:37', NULL, ''),
(59, 59, 2, '2021-11-15 04:29:37', NULL, ''),
(60, 60, 2, '2021-11-15 04:29:37', NULL, ''),
(61, 61, 2, '2021-11-15 04:29:37', NULL, ''),
(62, 62, 2, '2021-11-15 04:29:37', NULL, ''),
(63, 63, 2, '2021-11-15 04:29:37', NULL, ''),
(64, 64, 5, '2021-11-15 04:29:37', NULL, ''),
(65, 65, 5, '2021-11-15 04:29:37', NULL, ''),
(66, 66, 5, '2021-11-15 04:29:37', NULL, ''),
(67, 67, 5, '2021-11-15 04:29:37', NULL, ''),
(68, 68, 5, '2021-11-15 04:29:37', NULL, ''),
(69, 69, 5, '2021-11-15 04:29:37', NULL, ''),
(70, 70, 5, '2021-11-15 04:29:37', NULL, ''),
(71, 71, 5, '2021-11-15 04:29:37', NULL, ''),
(72, 72, 5, '2021-11-15 04:29:37', NULL, ''),
(73, 73, 9, '2021-11-15 04:29:37', NULL, ''),
(74, 74, 9, '2021-11-15 04:29:37', NULL, ''),
(75, 75, 9, '2021-11-15 04:29:37', NULL, ''),
(76, 76, 9, '2021-11-15 04:29:37', NULL, ''),
(77, 77, 9, '2021-11-15 04:29:37', NULL, ''),
(78, 78, 9, '2021-11-15 04:29:37', NULL, ''),
(79, 79, 9, '2021-11-15 04:29:37', NULL, ''),
(80, 80, 9, '2021-11-15 04:29:37', NULL, ''),
(81, 81, 9, '2021-11-15 04:29:37', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  ADD PRIMARY KEY (`MenuItemInRestaurantID`),
  ADD KEY `menuitem` (`MenuItemID`),
  ADD KEY `restaurant` (`RestaurantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  MODIFY `MenuItemInRestaurantID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  ADD CONSTRAINT `menuitem` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`),
  ADD CONSTRAINT `restaurant` FOREIGN KEY (`RestaurantID`) REFERENCES `restaurant` (`RestaurantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
