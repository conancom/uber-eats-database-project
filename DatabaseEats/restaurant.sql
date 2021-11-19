-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:02 AM
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
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` bigint(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `PhoneNumner` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Opening_Times` varchar(255) NOT NULL,
  `Opening_Days` varchar(255) NOT NULL,
  `Creation_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Rating` float NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `Name`, `Location`, `PhoneNumner`, `Type`, `Opening_Times`, `Opening_Days`, `Creation_TimeStamp`, `Rating`, `Email`, `Password`) VALUES
(1, 'Junior\' Chicken', 'Chiangmai', '08696969420', 'Fastfood', '00:00 - 00:00', 'Everyday', '2021-11-11 14:20:10', 0, 'junior@email.com', 'junior'),
(2, 'Leon\'s Pizzeria', 'Nonthaburi', '081-999-9999', 'Western', '11:00 - 19:00', 'Monday - Friday', '2021-11-14 14:48:14', 5, 'leon-pizzeria@gmail.com', 'leon'),
(3, 'Charn Shushi', 'Nonthaburi', '081-999-9999', 'Japanese', '9:00 - 19:00', 'Monday - Friday', '2021-11-14 14:50:01', 5, 'charn@gmail.com', 'charn'),
(4, 'Dessert Crepe', 'Chiang Mai', '081-999-9999', 'Dessert', '10:00 - 21:00', 'Monday - Friday', '2021-11-14 14:51:09', 5, 'knot@gmail.com', 'knot'),
(5, 'Mom\'s Spaghetti', 'Italy', '081-999-9999', 'Italian', '19:00 - 21:00', 'Monday - Friday', '2021-11-14 14:52:11', 5, 'mario@gmail.com', 'mario'),
(6, 'Steak and Wine', 'Central World', '081-999-9999', 'Western', '18:00 - 22:00', 'Monday - Friday', '2021-11-14 14:53:24', 5, 'steak@gmail.com', 'steak'),
(7, 'Fusion Spaghetti', 'Chiang Mai', '081-999-9999', 'Italian', '11:00 - 19:00', 'Monday - Friday', '2021-11-14 16:09:42', 5, 'luigi@gmail.com', 'luigi'),
(8, 'Dessert Company', 'Rangsit', '081-999-9999', 'Dessert', '15:00 - 21:00', 'Monday - Friday', '2021-11-14 16:10:32', 5, 'dessert@gmail.com', 'dessert'),
(9, 'Paul\'s Fine Dining', 'Central World', '081-999-9999', 'Fine Dining ', '17:00 - 23:00', 'Saturday - Sunday', '2021-11-14 16:11:51', 5, 'paul@gmail.com', 'paul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
