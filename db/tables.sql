-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2016 at 07:47 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `greekwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Lunch'),
(2, 'Dinner'),
(3, 'Beverages'),
(4, 'Side dishes'),
(5, 'Deserts');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dishId` int(11) NOT NULL,
  `dishName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imgAddress` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dishId`, `dishName`, `categoryId`, `price`, `quantity`, `imgAddress`, `description`) VALUES
(1, 'Baklava', 5, '2.00', 10, 'img/img-desserts/baklava-150x150.jpg', 'Sweet pastry made of layers of filo filled with chopped nuts and sweetened and held together with syrup'),
(2, 'Galakto Boureko', 5, '2.50', 15, 'img/img-desserts/galaktoboureko-150x150.jpg', 'Made with layers of golden brown crispy phyllo, sprinkled with melted butter, filled with the most creamy custard and bathed in scented syrup'),
(3, 'Cheese Cake', 5, '3.00', 15, 'img/img-desserts/greek-yogurt-cheesecake-150x150.jpg', 'Made with Neufchatel cheese and classic Greek ingredients like cinnamon, honey and Greek-style yogurt.'),
(4, 'Kataifi', 5, '2.00', 15, 'img/img-desserts/kataifi-150x150.jpg', 'Levantine cheese pastry soaked in sweet sugar-based syrup'),
(5, 'Gyros', 2, '5.00', 15, 'img/img-dishes/dinner/gyros-150x150.jpg', 'Greek sandwich made with meat, onions, tomato, french fries, and tzatziki sauce rolled into a pita bread.'),
(6, 'Pastitsio', 2, '5.50', 25, 'img/img-dishes/dinner/pastitsio-150x150.jpg', 'Baked pasta with ground beef and bechamel sauce'),
(7, 'Souvlaki', 2, '7.50', 25, 'img/img-dishes/dinner/souvlaki-150x150.jpg', 'Tender cuts of meat grilled on a skewer'),
(8, 'Fish', 1, '5.50', 25, 'img/img-dishes/lunch/fish-150x150.jpg', 'Baked with tomato sauce and topped with feta cheese, fresh herbs, and artichokes'),
(9, 'Spanakopita', 1, '8.00', 25, 'img/img-dishes/lunch/spanakopita-150x150.jpg', 'Spinach pie with a filling of feta cheese, onions, egg, and seasoning.'),
(10, 'Turkey Pita', 1, '4.50', 5, 'img/img-dishes/lunch/turkey-pita-150x150.jpg', 'Sandwich filled with lettuce, tomatoes, and turkey, and topped with a homemade cucumber sauce.'),
(11, '7 Up', 3, '1.50', 25, 'img/img-drinks/7up-150x150.jpg', 'Lemon soft drink'),
(12, 'Coke', 3, '1.50', 25, 'img/img-drinks/coke-150x150.jpg', 'Coke soft drink'),
(13, 'Retsina', 3, '2.50', 25, 'img/img-drinks/retsina-150x150.jpg', 'Greek white resinated'),
(14, 'Tea', 3, '1.50', 25, 'img/img-drinks/tea-150x150.jpg', 'Greek mountain tea'),
(15, 'Greek Salada', 4, '3.50', 25, 'img/img-sides/greek-salad-150x150.jpg', 'Made with pieces of tomatoes, sliced cucumbers, onion, feta cheese, and olives, typically seasoned with salt and oregano, and dressed with olive oil'),
(16, 'Lemon Potatos', 4, '4.50', 25, 'img/img-sides/lemon-potatos-150x150.jpg', 'These crispy golden brown potatoes add zest to a familiar menu'),
(17, 'Pasta Salad', 4, '6.50', 25, 'img/img-sides/pasta-salad-150x150.jpg', 'Made with pieces of tomatoes, sliced cucumbers, onion, feta cheese, and olives, typically seasoned with salt and oregano, and dressed with olive oil'),
(18, 'Pita Tzatziki', 4, '4.50', 25, 'img/img-sides/pita-tzatziki-150x150.jpg', 'Greek sauce served with grilled meats and pita bread.');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `ingredientName` varchar(255) NOT NULL,
  `dishId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dishId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoiceId`, `userId`, `dishId`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 3),
(3, 1, 3, 2),
(4, 1, 4, 5),
(5, 2, 5, 4),
(6, 2, 6, 1),
(7, 2, 7, 3),
(8, 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `dishId_A` int(11) NOT NULL,
  `dishId_B` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`dishId_A`, `dishId_B`) VALUES
(1, 2),
(1, 3),
(2, 3),
(1, 4),
(1, 5),
(2, 5),
(3, 7),
(9, 7),
(2, 8),
(7, 9),
(5, 12),
(4, 13),
(6, 15),
(1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Zipcode` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `FirstName`, `LastName`, `email`, `Address`, `Province`, `Zipcode`, `phoneNumber`, `City`, `Password`, `USERNAME`) VALUES
(1, 'Lucas', 'Vieira', 'lucasterravieira@gmail.com', 'omg jkjkjkjk', 'BC', 'V3N 4P6', '6047246861', 'Burnaby', '1', 'lucastv'),
(2, 'Sonali', 'Paul', 'sonali@sonali.com', 'somewhere over the rainbow', 'BC', 'V3N 4P6', '6047245566', 'Burnaby', '1', 'psonali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dishId`),
  ADD KEY `fk_categoryId` (`categoryId`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientID`),
  ADD KEY `fk_dishId` (`dishId`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceId`),
  ADD KEY `fk_userId_invoices` (`userId`),
  ADD KEY `fk_dishId_invoices` (`dishId`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`dishId_A`,`dishId_B`),
  ADD KEY `fk_dishId_B_RECOMMENDATIONS` (`dishId_B`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `fk_categoryId` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_dishId` FOREIGN KEY (`dishId`) REFERENCES `Dishes` (`dishId`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_dishId_invoices` FOREIGN KEY (`dishId`) REFERENCES `Dishes` (`dishId`),
  ADD CONSTRAINT `fk_userId_invoices` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `fk_dishId_A_RECOMMENDATIONS` FOREIGN KEY (`dishId_A`) REFERENCES `Dishes` (`dishId`),
  ADD CONSTRAINT `fk_dishId_B_RECOMMENDATIONS` FOREIGN KEY (`dishId_B`) REFERENCES `Dishes` (`dishId`);
