-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 05:46 AM
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
(1, 'Steak BBQ', 'Western', 105, 350, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-13 10:25:19', 10, '1 Person Eat', 'Test Description'),
(2, 'White Sauce Steak', 'Western', 150, 350, 'Ing 1 \r\nIng 2\r\nIng 3', '2021-11-15 03:16:53', 50, '1 Person', 'Test Description'),
(3, 'Steak With French Fries', 'Western', 199, 350, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:17:38', 10, '2 People', 'Test Description'),
(4, 'Smoked BBQ', 'Western', 299, 250, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:18:21', 25, '3 People', 'Test Description'),
(5, 'Sous Vide Steak', 'Western', 150, 290, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:19:19', 32, '1 Person', 'Test Description'),
(6, 'Red Wine Sauce', 'Western', 259, 190, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:20:02', 25, '1 Person', 'Test Description'),
(7, 'Mushroom Sauce Steak', 'Western', 159, 320, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:20:41', 20, '1 Person', 'Test Description'),
(8, 'Full Set BBQ', 'Western', 295, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:21:23', 15, '3 People', 'Test Description'),
(9, 'BBQ Ribs', 'Western', 399, 590, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:22:08', 9, '3-5 People', 'Test Description'),
(10, 'Original Crepe', 'Western Dessert', 109, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(11, 'Strawberry Crepe', 'Western Dessert', 159, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(12, 'Lemon Sauce Crepe', 'Western Dessert', 209, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(13, 'Raspberry Sauce Crepe', 'Western Dessert', 159, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(14, 'Matcha Crepe', 'Western Dessert', 98, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(15, 'Plain Crepe', 'Western Dessert', 59, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(16, 'Mango Sauce Crepe', 'Western Dessert', 119, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(17, 'Berries Crepe', 'Western Dessert', 129, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(18, 'Berry Smoothie', 'Western Dessert', 79, 360, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:25:28', 15, '1 Person', 'Test Description '),
(19, 'Salmon Originals', 'Japanese', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(20, 'Cucumber Fresh', 'Japanese', 69, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(21, 'Burnt-Top Salmon', 'Japanese', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(22, 'Tuna Rolls', 'Japanese', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(23, 'Lemon Unagi', 'Japanese', 169, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(24, 'Cheesy Salmon', 'Japanese', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(25, 'Nori Rolls', 'Japanese', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(26, 'Full Set 1', 'Japanese', 239, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(27, 'Full Set 2', 'Japanese', 239, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '2 People', 'Test Description '),
(28, 'Health Lemon Smoothie', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(29, 'Brownies', 'Western Dessert', 49, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(30, 'Berries Cupcake', 'Western Dessert', 59, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(31, 'Macaron', 'Western Dessert', 69, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(32, 'Chef\'s Special (Dessert Company\'s Originals)', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(33, 'Flower Ice Cream', 'Western Dessert', 59, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(34, 'Christmas Specials Set', 'Western Dessert', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(35, 'Strawberries Shortcake ', 'Western Dessert', 89, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(36, 'Blueberry Cheesecake (Chef\'s Recommended)', 'Western Dessert', 79, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(37, 'Spaghetti With Steak', 'Western Fusion', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(38, 'Basil Spaghetti', 'Western Fusion', 139, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(39, 'Parmesan Meatball', 'Western Fusion', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(40, 'Spaghetti Salad', 'Western Fusion', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(41, 'Seafood on Dish', 'Western Fusion', 199, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(42, 'Red Sauce Shrimp Spaghetti', 'Western Fusion', 189, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(43, 'Red Sauce Plain', 'Western Fusion', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(44, 'Chinese Style Spaghetti', 'Western Fusion', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(45, 'Truffle Cream Sauce', 'Western Fusion', 219, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(46, 'Chinese Style Grilled Chicken', 'Asian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(47, 'Chicken Delight Special', 'Asian', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(48, 'Chicken Stew', 'Asian', 169, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(49, 'Sweet and Sour Chicken (Chinese Style)', 'Asian', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(50, 'Basil and Fried Chicken', 'Asian', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(51, 'Western Fusion Chicken BBQ', 'Asian', 139, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(52, 'Terayaki Spaghetti Fusion', 'Asian', 149, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(53, 'Herb Chicken', 'Asian', 299, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(54, 'Karage Chicken ', 'Asian', 89, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(55, 'Pepperoni With Sweet Peppers', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(56, 'Vegan Delight #1', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(57, 'Anchovies Sassy ', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(58, 'Old Roma', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(59, 'Vegan Delight #2', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(60, 'Vegan Delight #3', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(61, 'Rocket Bunny', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(62, 'Seafood Style', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(63, 'Cheesy Pepporoni ', 'Italian', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(64, 'Cheesy Sauce ', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(65, 'Crean Sauce', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(66, 'Seafood Deluxe', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(67, 'Classic Spaghetti Meatball', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(68, 'Classic Bolognese ', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(69, 'New World Seafood', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(70, 'Chef\'s Specials Cream Sauce', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(71, 'Vegan Spaghetti', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(72, 'Seafood Red Wine', 'Italian', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(73, 'Paul\'s Main', 'Fine Dining', 299, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(74, 'Cold Cut #1', 'Fine Dining', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(75, 'Paul\'s Salad Specials', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(76, 'Sharing Poke Bowl', 'Fine Dining', 159, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(77, 'Choco Cup', 'Fine Dining', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(78, 'Dining Brunch', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(79, 'Dining Rocket', 'Fine Dining', 119, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(80, 'Cold Cut #2', 'Fine Dining', 129, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description '),
(81, 'Paul\'s Cupcake', 'Fine Dining', 99, 125, 'Ing 1\r\nIng 2\r\nIng 3', '2021-11-15 03:30:36', 15, '1 Person', 'Test Description ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
