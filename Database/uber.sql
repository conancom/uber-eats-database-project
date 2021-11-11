-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 01:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `Occoupation` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foodordering`
--

CREATE TABLE `foodordering` (
  `FoodOrderingID` bigint(20) NOT NULL,
  `ClientID` bigint(20) NOT NULL,
  `DriverID` bigint(20) NOT NULL,
  `FoodPaymentID` bigint(20) NOT NULL,
  `Accepting_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2) ON UPDATE current_timestamp(2),
  `Arrival_TimeStamp` timestamp(2) NOT NULL DEFAULT current_timestamp(2),
  `Departure_TimeStamp` timestamp(2) NULL DEFAULT NULL,
  `AcceptingAddress` varchar(255) NOT NULL,
  `DestinationAddress` varchar(255) NOT NULL,
  `RideDuration` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `driverorder` (`DriverID`),
  ADD KEY `payment` (`FoodPaymentID`);

--
-- Indexes for table `foodpayment`
--
ALTER TABLE `foodpayment`
  ADD PRIMARY KEY (`FoodPaymentID`),
  ADD KEY `foodpayment` (`FoodOrderingID`);

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
  MODIFY `ClientID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `DriverID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodordering`
--
ALTER TABLE `foodordering`
  MODIFY `FoodOrderingID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodpayment`
--
ALTER TABLE `foodpayment`
  MODIFY `FoodPaymentID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menuiteminrestaurant`
--
ALTER TABLE `menuiteminrestaurant`
  MODIFY `MenuItemInRestaurantID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordereditem`
--
ALTER TABLE `ordereditem`
  MODIFY `OrderedItemID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `foodpayment`
--
ALTER TABLE `foodpayment`
  ADD CONSTRAINT `foodpayment` FOREIGN KEY (`FoodOrderingID`) REFERENCES `foodordering` (`FoodOrderingID`);

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
  ADD CONSTRAINT `ordereditem_ibfk_1` FOREIGN KEY (`MenuItemInRestaurantID`) REFERENCES `menuiteminrestaurant` (`MenuItemInRestaurantID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `drivervehicle` FOREIGN KEY (`DriverID`) REFERENCES `driver` (`DriverID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
