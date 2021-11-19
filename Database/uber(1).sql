-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 12:51 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` bigint(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Registration_TimStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `Occupation` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`, `Registration_TimStamp`, `Occupation`, `PhoneNumber`) VALUES
(1, 'leon', 'leon@email.com', 'male', '2001-11-16', 'Leon', 'Wirz', 'Test', '2021-11-11 13:41:24.93', 'Student', '0824345775'),
(2, 'Password', 'Email@gmail.com', 'male', '2012-02-02', 'First Name', 'Last name', 'Main Address', '2021-11-12 14:17:00.69', 'Occupation', 'Phone Number'),
(3, 'Password', 'test@email.com', 'male', '2000-06-26', 'Tst', 'Tst', 'Main Address', '2021-11-15 04:01:26.81', 'Occupation', 'Phone Number'),
(4, 'Password', 'test@email.com', 'male', '2000-06-26', 'Tst', 'Tst', 'Main Address', '2021-11-15 04:03:43.28', 'Occupation', 'Phone Number'),
(5, 'Password', 'Email@emal.co', 'male', '1998-06-26', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:04:26.14', 'Occupation', 'Phone Number'),
(6, 'Password', 'Email@emal.co', 'male', '1998-06-26', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:06:18.20', 'Occupation', 'Phone Number'),
(7, 'Password', 'Email@emal.co', 'male', '1998-06-26', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:06:31.71', 'Occupation', 'Phone Number'),
(8, 'Password', 'Email@emal.co', 'male', '1998-06-26', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:08:18.59', 'Occupation', 'Phone Number'),
(9, 'Password', 'Email@emal.co', 'male', '1998-06-26', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:08:48.24', 'Occupation', 'Phone Number'),
(10, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:09:26.06', 'Occupation', 'Phone Number'),
(11, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:09:40.81', 'Occupation', 'Phone Number'),
(12, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:13:49.76', 'Occupation', 'Phone Number'),
(13, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:16:22.84', 'Occupation', 'Phone Number'),
(14, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:17:23.75', 'Occupation', 'Phone Number'),
(15, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:19:00.61', 'Occupation', 'Phone Number'),
(16, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:19:48.93', 'Occupation', 'Phone Number'),
(17, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:20:12.45', 'Occupation', 'Phone Number'),
(18, 'Password', 'Email@email.com', 'male', '2001-08-27', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:20:43.13', 'Occupation', 'Phone Number'),
(19, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:22:33.19', 'Occupation', 'Phone Number'),
(20, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:23:13.45', 'Occupation', 'Phone Number'),
(21, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:24:38.68', 'Occupation', 'Phone Number'),
(22, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:25:14.42', 'Occupation', 'Phone Number'),
(23, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:25:24.32', 'Occupation', 'Phone Number'),
(24, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:25:42.64', 'Occupation', 'Phone Number'),
(25, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:26:09.69', 'Occupation', 'Phone Number'),
(26, 'Password', 'Email@email.com', 'male', '2006-05-20', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:27:19.15', 'Occupation', 'Phone Number'),
(27, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:29:32.38', 'Occupation', 'Phone Number'),
(28, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:31:02.59', 'Occupation', 'Phone Number'),
(29, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:31:31.95', 'Occupation', 'Phone Number'),
(30, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:35:01.67', 'Occupation', 'Phone Number'),
(31, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:37:58.02', 'Occupation', 'Phone Number'),
(32, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:38:07.83', 'Occupation', 'Phone Number'),
(33, 'Password', 'test@sad', 'male', '2003-12-07', 'First Name', 'Last name', 'Main Address', '2021-11-15 04:38:16.16', 'Occupation', 'Phone Number'),
(34, 'Password', 'test1@email.com', 'male', '2005-11-12', 'First Name', 'Last name', 'Main Address', '2021-11-15 14:46:51.67', 'Occupation', 'Phone Number');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `DriverID` bigint(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Registration_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `DriverLicenseID` bigint(20) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `Rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`DriverID`, `Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`, `Registration_TimeStamp`, `DriverLicenseID`, `PhoneNumber`, `Rating`) VALUES
(1, 'knot', 'knot@email.com', 'Male', '2001-04-20', 'Asipan', 'Ketphet', 'Chonburi', '2021-11-11 14:04:29.18', 1234567890010444, '0800168998', 0),
(2, 'Password', 'Email@gmail.com', 'female', '2012-02-02', 'First Name', 'Last name', '', '2021-11-14 13:42:47.48', 156465489, '', 0),
(3, 'leon', 'leon@email22.com', 'male', '2000-06-26', 'leon', 'wirz', '', '2021-11-14 14:25:25.77', 123456789, 'Phone Number', 0),
(4, 'Password', 'Email@online.gb', 'male', '2000-06-06', 'First Name', 'Last name', '', '2021-11-14 14:30:27.85', 4564651651, 'Phone Number', 0),
(5, 'Password', 'Email@online.gb', 'male', '2000-06-06', 'First Name', 'Last name', '', '2021-11-14 14:31:27.54', 4564651651, 'Phone Number', 0),
(6, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:33:52.40', 6, '4564651651', 0),
(7, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:33:56.27', 6, '4564651651', 0),
(8, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:34:15.77', 6, '4564651651', 0),
(9, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:34:53.38', 6, '4564651651', 0),
(10, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:35:14.69', 6, '4564651651', 0),
(11, 'Password', 'Email@online.gb', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-14 14:35:45.56', 6, '4564651651', 0),
(12, 'Password', 'Email@gmail.com', 'male', '2000-06-26', 'First Name', 'Last name', 'Address', '2021-11-14 14:45:33.69', 564651, 'Phone Number', 0),
(13, 'Password', 'Email@gmail.com', 'male', '2002-06-12', 'First Name', 'Last name', 'Address', '2021-11-14 14:51:00.63', 123123123132, 'Phone Number', 0),
(14, 'Password', 'test@test.com', 'male', '1999-02-24', 'First Name', 'Last name', 'Address', '2021-11-14 14:52:18.72', 123123645, 'Phone Number', 0),
(15, 'Password', 'j@j.com', 'male', '2000-06-26', 'First Name', 'Last name', 'Address', '2021-11-14 14:56:33.66', 564897894, 'Phone Number', 0),
(16, 'leon', 'leon@email.com', 'male', '2000-06-26', 'Leonardo', 'Wirz', 'Leon address', '2021-11-15 02:24:51.12', 123456789, '0824345775', 0),
(17, 'leon', 'leonardo@email.com', 'male', '2000-06-26', 'Leonardo', 'Wirz', 'Bangkok', '2021-11-16 02:52:01.62', 69696969696, '0824345775', 0),
(18, 'Password', 'leonardo@email.com', 'male', '2000-06-26', 'Leonardo', 'Wirz', 'Bangkok', '2021-11-16 02:52:41.31', 69696969696, '0824345775', 0),
(19, 'raven', 'raven@email.com', 'female', '2001-11-09', 'raven', 'snow', 'Address', '2021-11-16 02:53:49.13', 123456789, '082356565', 0),
(20, 'Password', 'raven@email.com', 'female', '2001-11-09', 'raven', 'snow', 'Address', '2021-11-16 02:55:36.31', 123456789, '082356565', 0),
(21, 'Password', 'raven@email.com', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-16 02:56:23.46', 0, 'Phone Number', 0),
(22, 'Password', 'raven@email.com', 'male', '0000-00-00', 'First Name', 'Last name', 'Address', '2021-11-16 02:56:49.75', 0, 'Phone Number', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foodordering`
--

CREATE TABLE `foodordering` (
  `FoodOrderingID` bigint(20) NOT NULL,
  `ClientID` bigint(20) NOT NULL,
  `DriverID` bigint(20) DEFAULT NULL,
  `Accepting_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2) ON UPDATE current_timestamp(2),
  `Arrival_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `Departure_TimeStamp` timestamp(2) NULL DEFAULT NULL,
  `AcceptingAddress` varchar(255) NOT NULL,
  `DestinationAddress` varchar(255) NOT NULL,
  `RideDuration` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodordering`
--

INSERT INTO `foodordering` (`FoodOrderingID`, `ClientID`, `DriverID`, `Accepting_TimeStamp`, `Arrival_TimeStamp`, `Departure_TimeStamp`, `AcceptingAddress`, `DestinationAddress`, `RideDuration`, `Status`) VALUES
(1, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(2, 1, 3, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(3, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(4, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(5, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(6, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(7, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(8, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(11, 1, 16, '2021-11-15 03:32:07.86', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Picking up food'),
(12, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(13, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(14, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(15, 1, 1, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Complete'),
(16, 1, NULL, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Lookig For Driver'),
(17, 1, NULL, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Lookig For Driver'),
(18, 1, 16, '2021-11-15 03:33:22.10', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Picking up food'),
(19, 1, 16, '2021-11-18 15:19:49.70', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Picked Up'),
(20, 1, NULL, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Looking For Driver'),
(21, 1, NULL, '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', '2021-11-12 14:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Looking For Driver');

-- --------------------------------------------------------

--
-- Table structure for table `foodpayment`
--

CREATE TABLE `foodpayment` (
  `FoodPaymentID` bigint(20) NOT NULL,
  `FoodOrderingID` bigint(20) NOT NULL,
  `ClientPrice` float NOT NULL,
  `Distance_Restaurant_to_Client` varchar(255) NOT NULL,
  `DriverCommission` float NOT NULL,
  `RestaurantCommission` float NOT NULL,
  `ClientPayment_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `PaymentMethod` varchar(255) NOT NULL,
  `MoneySaved` float NOT NULL,
  `RatingFromClientDriver` float NOT NULL,
  `RatingFromClientRestaurant` float NOT NULL,
  `Tip` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodpayment`
--

INSERT INTO `foodpayment` (`FoodPaymentID`, `FoodOrderingID`, `ClientPrice`, `Distance_Restaurant_to_Client`, `DriverCommission`, `RestaurantCommission`, `ClientPayment_TimeStamp`, `PaymentMethod`, `MoneySaved`, `RatingFromClientDriver`, `RatingFromClientRestaurant`, `Tip`) VALUES
(4, 1, 250, '12km', 35, 200, '2021-11-14 15:31:08', 'Cash', 0, 4.5, 4.5, 0),
(5, 1, 250, '12km', 35, 200, '2021-11-14 15:31:08', 'Cash', 0, 4.5, 4.5, 0),
(6, 19, 250, '12', 35, 200, '2021-11-18 15:07:17', 'Cash', 0, 4.5, 4.9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `MenuItemID` bigint(20) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `FoodType` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Calories` float NOT NULL,
  `Ingredient` text NOT NULL,
  `MenuItemCreation_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `AmountSold` int(11) NOT NULL,
  `Portion` varchar(255) NOT NULL,
  `FoodDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `FoodName`, `FoodType`, `Price`, `Calories`, `Ingredient`, `MenuItemCreation_TimeStamp`, `AmountSold`, `Portion`, `FoodDescription`) VALUES
(1, 'Fried Chicken', 'Fast Food', 200, 100, 'Chicken \r\nFlour', '2021-11-14 15:14:28', 0, '250g', 'very delicious chicken'),
(2, 'White Sauce Steak', 'Western', 150, 350, 'Ing 1 \r\nIng 2\r\nIng 3', '2021-11-14 20:16:53', 50, '1 Person', 'Test Description'),
(3, 'Steak With French Fries', 'Western', 199, 350, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:17:38', 10, '2 People', 'Test Description'),
(4, 'Smoked BBQ', 'Western', 299, 250, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:18:21', 25, '3 People', 'Test Description'),
(5, 'Sous Vide Steak', 'Western', 150, 290, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:19:19', 32, '1 Person', 'Test Description'),
(6, 'Red Wine Sauce', 'Western', 259, 190, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:20:02', 25, '1 Person', 'Test Description'),
(7, 'Mushroom Sauce Steak', 'Western', 159, 320, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:20:41', 20, '1 Person', 'Test Description'),
(8, 'Full Set BBQ', 'Western', 295, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:21:23', 15, '3 People', 'Test Description'),
(9, 'BBQ Ribs', 'Western', 399, 590, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:22:08', 9, '3-5 People', 'Test Description'),
(10, 'Original Crepe', 'Western Dessert', 109, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(11, 'Strawberry Crepe', 'Western Dessert', 159, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(12, 'Lemon Sauce Crepe', 'Western Dessert', 209, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(13, 'Raspberry Sauce Crepe', 'Western Dessert', 159, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(14, 'Matcha Crepe', 'Western Dessert', 98, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(15, 'Plain Crepe', 'Western Dessert', 59, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(16, 'Mango Sauce Crepe', 'Western Dessert', 119, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(17, 'Berries Crepe', 'Western Dessert', 129, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(18, 'Berry Smoothie', 'Western Dessert', 79, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:25:28', 15, '1 Person', 'Test Description '),
(19, 'Salmon Originals', 'Japanese', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(20, 'Cucumber Fresh', 'Japanese', 69, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(21, 'Burnt-Top Salmon', 'Japanese', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(22, 'Tuna Rolls', 'Japanese', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(23, 'Lemon Unagi', 'Japanese', 169, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(24, 'Cheesy Salmon', 'Japanese', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(25, 'Nori Rolls', 'Japanese', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(26, 'Full Set 1', 'Japanese', 239, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(27, 'Full Set 2', 'Japanese', 239, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '2 People', 'Test Description '),
(28, 'Health Lemon Smoothie', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(29, 'Brownies', 'Western Dessert', 49, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(30, 'Berries Cupcake', 'Western Dessert', 59, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(31, 'Macaron', 'Western Dessert', 69, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(32, 'Chef\'s Special (Dessert Company\'s Originals)', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(33, 'Flower Ice Cream', 'Western Dessert', 59, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(34, 'Christmas Specials Set', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(35, 'Strawberries Shortcake ', 'Western Dessert', 89, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(36, 'Blueberry Cheesecake (Chef\'s Recommended)', 'Western Dessert', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(37, 'Spaghetti With Steak', 'Western Fusion', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(38, 'Basil Spaghetti', 'Western Fusion', 139, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(39, 'Parmesan Meatball', 'Western Fusion', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(40, 'Spaghetti Salad', 'Western Fusion', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(41, 'Seafood on Dish', 'Western Fusion', 199, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(42, 'Red Sauce Shrimp Spaghetti', 'Western Fusion', 189, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(43, 'Red Sauce Plain', 'Western Fusion', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(44, 'Chinese Style Spaghetti', 'Western Fusion', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(45, 'Truffle Cream Sauce', 'Western Fusion', 219, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(46, 'Chinese Style Grilled Chicken', 'Asian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(47, 'Chicken Delight Special', 'Asian', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(48, 'Chicken Stew', 'Asian', 169, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(49, 'Sweet and Sour Chicken (Chinese Style)', 'Asian', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(50, 'Basil and Fried Chicken', 'Asian', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(51, 'Western Fusion Chicken BBQ', 'Asian', 139, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(52, 'Terayaki Spaghetti Fusion', 'Asian', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(53, 'Herb Chicken', 'Asian', 299, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(54, 'Karage Chicken ', 'Asian', 89, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(55, 'Pepperoni With Sweet Peppers', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(56, 'Vegan Delight #1', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(57, 'Anchovies Sassy ', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(58, 'Old Roma', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(59, 'Vegan Delight #2', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(60, 'Vegan Delight #3', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(61, 'Rocket Bunny', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(62, 'Seafood Style', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(63, 'Cheesy Pepporoni ', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(64, 'Cheesy Sauce ', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(65, 'Crean Sauce', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(66, 'Seafood Deluxe', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(67, 'Classic Spaghetti Meatball', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(68, 'Classic Bolognese ', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(69, 'New World Seafood', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(70, 'Chef\'s Specials Cream Sauce', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(71, 'Vegan Spaghetti', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(72, 'Seafood Red Wine', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(73, 'Paul\'s Main', 'Fine Dining', 299, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(74, 'Cold Cut #1', 'Fine Dining', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(75, 'Paul\'s Salad Specials', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(76, 'Sharing Poke Bowl', 'Fine Dining', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(77, 'Choco Cup', 'Fine Dining', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(78, 'Dining Brunch', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(79, 'Dining Rocket', 'Fine Dining', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(80, 'Cold Cut #2', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(81, 'Paul\'s Cupcake', 'Fine Dining', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-14 20:30:36', 15, '1 Person', 'Test Description '),
(82, 'French fries', 'Fast Food', 100, 100, 'potatoes salt and oil', '2021-11-18 16:09:02', 50, 'Some good fries and shit', '    Some good fries and shit    '),
(83, 'Chicken Pops', 'Fast Food', 125, 100, 'Chicken Flour', '2021-11-18 16:12:11', 50, '50g', 'some nice pops ya know'),
(84, 'French fries', 'Fast Food', 100, 100, 'Potatoes Salt', '2021-11-18 16:17:04', 50, '50 g', 'Some good fries and shit'),
(85, 'French fries', 'Fast Food', 100, 100, '', '2021-11-19 07:55:25', 0, 'Some good fries and shit', ' Some good fries and shit '),
(86, 'French fries', 'Fast Food', 100, 100, '', '2021-11-19 07:55:33', 0, 'Some good fries and shit', ' Some good fries and shit '),
(87, 'French fries', 'Fast Food', 100, 100, '', '2021-11-19 07:58:03', 0, 'Some good fries and shit', ' Some good fries and shit '),
(88, 'French fries', 'Fast Food', 100, 100, 'potatoes salt and oil', '2021-11-19 07:58:33', 0, 'Some good fries and shit', ' Some good fries and shit ');

-- --------------------------------------------------------

--
-- Table structure for table `menuiteminrestaurant`
--

CREATE TABLE `menuiteminrestaurant` (
  `MenuItemInRestaurantID` bigint(20) NOT NULL,
  `MenuItemID` bigint(20) NOT NULL,
  `RestaurantID` bigint(20) DEFAULT NULL,
  `Creation_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `LimitedTimeDate` date DEFAULT NULL,
  `Discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuiteminrestaurant`
--

INSERT INTO `menuiteminrestaurant` (`MenuItemInRestaurantID`, `MenuItemID`, `RestaurantID`, `Creation_TimeStamp`, `LimitedTimeDate`, `Discount`) VALUES
(1, 1, 1, '2021-11-14 15:15:21', '0000-00-00', 'none'),
(2, 2, 6, '2021-11-14 21:29:37', NULL, ''),
(3, 3, 6, '2021-11-14 21:29:37', NULL, ''),
(4, 4, 6, '2021-11-14 21:29:37', NULL, ''),
(5, 5, 6, '2021-11-14 21:29:37', NULL, ''),
(6, 6, 6, '2021-11-14 21:29:37', NULL, ''),
(7, 7, 6, '2021-11-14 21:29:37', NULL, ''),
(8, 9, 6, '2021-11-14 21:29:37', NULL, ''),
(9, 10, 4, '2021-11-14 21:29:37', NULL, ''),
(10, 11, 4, '2021-11-14 21:29:37', NULL, ''),
(11, 12, 4, '2021-11-14 21:29:37', NULL, ''),
(12, 13, 4, '2021-11-14 21:29:37', NULL, ''),
(13, 13, 4, '2021-11-14 21:29:37', NULL, ''),
(14, 14, 4, '2021-11-14 21:29:37', NULL, ''),
(15, 15, 4, '2021-11-14 21:29:37', NULL, ''),
(16, 16, 4, '2021-11-14 21:29:37', NULL, ''),
(17, 17, 4, '2021-11-14 21:29:37', NULL, ''),
(18, 18, 4, '2021-11-14 21:29:37', NULL, ''),
(19, 19, 3, '2021-11-14 21:29:37', NULL, ''),
(20, 20, 3, '2021-11-14 21:29:37', NULL, ''),
(21, 21, 3, '2021-11-14 21:29:37', NULL, ''),
(22, 22, 3, '2021-11-14 21:29:37', NULL, ''),
(23, 23, 3, '2021-11-14 21:29:37', NULL, ''),
(24, 24, 3, '2021-11-14 21:29:37', NULL, ''),
(25, 25, 3, '2021-11-14 21:29:37', NULL, ''),
(26, 26, 3, '2021-11-14 21:29:37', NULL, ''),
(27, 27, 3, '2021-11-14 21:29:37', NULL, ''),
(28, 28, 8, '2021-11-14 21:29:37', NULL, ''),
(29, 29, 8, '2021-11-14 21:29:37', NULL, ''),
(30, 30, 8, '2021-11-14 21:29:37', NULL, ''),
(31, 31, 8, '2021-11-14 21:29:37', NULL, ''),
(32, 32, 8, '2021-11-14 21:29:37', NULL, ''),
(33, 33, 8, '2021-11-14 21:29:37', NULL, ''),
(34, 34, 8, '2021-11-14 21:29:37', NULL, ''),
(35, 35, 8, '2021-11-14 21:29:37', NULL, ''),
(36, 36, 8, '2021-11-14 21:29:37', NULL, ''),
(37, 37, 7, '2021-11-14 21:29:37', NULL, ''),
(38, 38, 7, '2021-11-14 21:29:37', NULL, ''),
(39, 39, 7, '2021-11-14 21:29:37', NULL, ''),
(40, 40, 7, '2021-11-14 21:29:37', NULL, ''),
(41, 41, 7, '2021-11-14 21:29:37', NULL, ''),
(42, 42, 7, '2021-11-14 21:29:37', NULL, ''),
(43, 43, 7, '2021-11-14 21:29:37', NULL, ''),
(44, 44, 7, '2021-11-14 21:29:37', NULL, ''),
(45, 45, 7, '2021-11-14 21:29:37', NULL, ''),
(46, 46, 1, '2021-11-14 21:29:37', NULL, ''),
(47, 47, 1, '2021-11-14 21:29:37', NULL, ''),
(48, 48, 1, '2021-11-14 21:29:37', NULL, ''),
(49, 49, 1, '2021-11-14 21:29:37', NULL, ''),
(50, 50, 1, '2021-11-14 21:29:37', NULL, ''),
(51, 51, 1, '2021-11-14 21:29:37', NULL, ''),
(52, 52, 1, '2021-11-14 21:29:37', NULL, ''),
(53, 53, 1, '2021-11-14 21:29:37', NULL, ''),
(54, 54, 1, '2021-11-14 21:29:37', NULL, ''),
(55, 55, 2, '2021-11-14 21:29:37', NULL, ''),
(56, 56, 2, '2021-11-14 21:29:37', NULL, ''),
(57, 57, 2, '2021-11-14 21:29:37', NULL, ''),
(58, 58, 2, '2021-11-14 21:29:37', NULL, ''),
(59, 59, 2, '2021-11-14 21:29:37', NULL, ''),
(60, 60, 2, '2021-11-14 21:29:37', NULL, ''),
(61, 61, 2, '2021-11-14 21:29:37', NULL, ''),
(62, 62, 2, '2021-11-14 21:29:37', NULL, ''),
(63, 63, 2, '2021-11-14 21:29:37', NULL, ''),
(64, 64, 5, '2021-11-14 21:29:37', NULL, ''),
(65, 65, 5, '2021-11-14 21:29:37', NULL, ''),
(66, 66, 5, '2021-11-14 21:29:37', NULL, ''),
(67, 67, 5, '2021-11-14 21:29:37', NULL, ''),
(68, 68, 5, '2021-11-14 21:29:37', NULL, ''),
(69, 69, 5, '2021-11-14 21:29:37', NULL, ''),
(70, 70, 5, '2021-11-14 21:29:37', NULL, ''),
(71, 71, 5, '2021-11-14 21:29:37', NULL, ''),
(72, 72, 5, '2021-11-14 21:29:37', NULL, ''),
(73, 73, 9, '2021-11-14 21:29:37', NULL, ''),
(74, 74, 9, '2021-11-14 21:29:37', NULL, ''),
(75, 75, 9, '2021-11-14 21:29:37', NULL, ''),
(76, 76, 9, '2021-11-14 21:29:37', NULL, ''),
(77, 77, 9, '2021-11-14 21:29:37', NULL, ''),
(78, 78, 9, '2021-11-14 21:29:37', NULL, ''),
(79, 79, 9, '2021-11-14 21:29:37', NULL, ''),
(80, 80, 9, '2021-11-14 21:29:37', NULL, ''),
(81, 81, 9, '2021-11-14 21:29:37', NULL, ''),
(82, 82, NULL, '2021-11-18 16:09:02', NULL, '0'),
(83, 83, NULL, '2021-11-18 16:12:11', NULL, '0'),
(84, 84, NULL, '2021-11-18 16:17:04', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ordereditem`
--

CREATE TABLE `ordereditem` (
  `OrderedItemID` bigint(20) NOT NULL,
  `FoodOrderingID` bigint(20) NOT NULL,
  `MenuItemInRestaurantID` bigint(20) NOT NULL,
  `OrderOfItem` int(11) NOT NULL,
  `SpecialRequest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordereditem`
--

INSERT INTO `ordereditem` (`OrderedItemID`, `FoodOrderingID`, `MenuItemInRestaurantID`, `OrderOfItem`, `SpecialRequest`) VALUES
(3, 1, 1, 1, 'nothing'),
(4, 19, 1, 1, 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` bigint(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
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

INSERT INTO `restaurant` (`RestaurantID`, `Name`, `Location`, `PhoneNumber`, `Type`, `Opening_Times`, `Opening_Days`, `Creation_TimeStamp`, `Rating`, `Email`, `Password`) VALUES
(1, 'Juniors Chicken', 'Chiangmai', '08696969420', 'Fastfood', '00:00', 'Everyday', '2021-11-11 14:20:10', 0, 'junior@email.com', 'junior'),
(2, 'Leon\'s Pizzeria', 'Nonthaburi', '081-999-9999', 'Western', '11:00 - 19:00', 'Monday - Friday', '2021-11-14 07:48:14', 5, 'leon-pizzeria@gmail.com', 'leon'),
(3, 'Charn Shushi', 'Nonthaburi', '081-999-9999', 'Japanese', '9:00 - 19:00', 'Monday - Friday', '2021-11-14 07:50:01', 5, 'charn@gmail.com', 'charn'),
(4, 'Dessert Crepe', 'Chiang Mai', '081-999-9999', 'Dessert', '10:00 - 21:00', 'Monday - Friday', '2021-11-14 07:51:09', 5, 'knot@gmail.com', 'knot'),
(5, 'Mom\'s Spaghetti', 'Italy', '081-999-9999', 'Italian', '19:00 - 21:00', 'Monday - Friday', '2021-11-14 07:52:11', 5, 'mario@gmail.com', 'mario'),
(6, 'Steak and Wine', 'Central World', '081-999-9999', 'Western', '18:00 - 22:00', 'Monday - Friday', '2021-11-14 07:53:24', 5, 'steak@gmail.com', 'steak'),
(7, 'Fusion Spaghetti', 'Chiang Mai', '081-999-9999', 'Italian', '11:00 - 19:00', 'Monday - Friday', '2021-11-14 09:09:42', 5, 'luigi@gmail.com', 'luigi'),
(8, 'Dessert Company', 'Rangsit', '081-999-9999', 'Dessert', '15:00 - 21:00', 'Monday - Friday', '2021-11-14 09:10:32', 5, 'dessert@gmail.com', 'dessert'),
(9, 'Paul\'s Fine Dining', 'Central World', '081-999-9999', 'Fine Dining ', '17:00 - 23:00', 'Saturday - Sunday', '2021-11-14 09:11:51', 5, 'paul@gmail.com', 'paul'),
(10, 'Restaurant Name', 'Location', 'Phone Number', 'Type', 'Opening Times', 'Opening Days', '2021-11-16 02:59:48', 0, 'res@email.com', 'res'),
(11, 'McDonalds Bangkok', 'Bangkok', '08221555555', 'Fastfood', '24 Hours', 'Everyday', '2021-11-17 15:26:39', 0, 'mc@email.com', 'mc');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` bigint(20) NOT NULL,
  `DriverID` bigint(20) NOT NULL,
  `LicensePlate` varchar(255) NOT NULL,
  `VehicleType` varchar(255) NOT NULL,
  `VehicleBrand` varchar(255) NOT NULL,
  `VehicleModel` varchar(255) NOT NULL,
  `VehicleColor` varchar(255) NOT NULL,
  `Registration_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `VehicleProductionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `DriverID`, `LicensePlate`, `VehicleType`, `VehicleBrand`, `VehicleModel`, `VehicleColor`, `Registration_TimeStamp`, `VehicleProductionDate`) VALUES
(1, 15, '1235', 'Vehicle Type', 'Vehicle Brand', 'Vehicle Model', 'Vehicle Color', '2021-11-14 14:58:00.44', '0000-00-00'),
(2, 16, '1234', 'Vehicle Type', 'Vehicle Brand', 'Vehicle Model', 'Vehicle Color', '2021-11-15 02:25:12.78', '0000-00-00'),
(3, 20, '123123', 'Vehicle Type', 'Vehicle Brand', 'Vehicle Model', 'Vehicle Color', '2021-11-16 02:55:43.53', '0000-00-00'),
(4, 20, '', 'Vehicle Type', 'Vehicle Brand', 'Vehicle Model', 'Vehicle Color', '2021-11-16 02:56:27.01', '0000-00-00'),
(5, 20, '', 'Vehicle Type', 'Vehicle Brand', 'Vehicle Model', 'Vehicle Color', '2021-11-16 02:56:50.96', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`DriverID`);

--
-- Indexes for table `foodordering`
--
ALTER TABLE `foodordering`
  ADD PRIMARY KEY (`FoodOrderingID`),
  ADD KEY `clientorder` (`ClientID`),
  ADD KEY `driverorder` (`DriverID`);

--
-- Indexes for table `foodpayment`
--
ALTER TABLE `foodpayment`
  ADD PRIMARY KEY (`FoodPaymentID`),
  ADD KEY `foodorder` (`FoodOrderingID`) USING BTREE;

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- Indexes for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  ADD PRIMARY KEY (`MenuItemInRestaurantID`),
  ADD KEY `menuitem` (`MenuItemID`),
  ADD KEY `restaurant` (`RestaurantID`);

--
-- Indexes for table `ordereditem`
--
ALTER TABLE `ordereditem`
  ADD PRIMARY KEY (`OrderedItemID`),
  ADD KEY `foodorder` (`FoodOrderingID`),
  ADD KEY `MenuItemInRestaurantID` (`MenuItemInRestaurantID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `drivervehicle` (`DriverID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `DriverID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `foodordering`
--
ALTER TABLE `foodordering`
  MODIFY `FoodOrderingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `foodpayment`
--
ALTER TABLE `foodpayment`
  MODIFY `FoodPaymentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  MODIFY `MenuItemInRestaurantID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `ordereditem`
--
ALTER TABLE `ordereditem`
  MODIFY `OrderedItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodordering`
--
ALTER TABLE `foodordering`
  ADD CONSTRAINT `clientorder` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `driverorder` FOREIGN KEY (`DriverID`) REFERENCES `driver` (`DriverID`),
  ADD CONSTRAINT `payment` FOREIGN KEY (`FoodPaymentID`) REFERENCES `foodpayment` (`FoodPaymentID`);

--
-- Constraints for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  ADD CONSTRAINT `menuitem` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`),
  ADD CONSTRAINT `restaurant` FOREIGN KEY (`RestaurantID`) REFERENCES `restaurant` (`RestaurantID`);

--
-- Constraints for table `ordereditem`
--
ALTER TABLE `ordereditem`
  ADD CONSTRAINT `foodorder` FOREIGN KEY (`FoodOrderingID`) REFERENCES `foodordering` (`FoodOrderingID`),
  ADD CONSTRAINT `ordereditem` FOREIGN KEY (`MenuItemInRestaurantID`) REFERENCES `menuiteminrestaurant` (`MenuItemInRestaurantID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `drivervehicle` FOREIGN KEY (`DriverID`) REFERENCES `driver` (`DriverID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
