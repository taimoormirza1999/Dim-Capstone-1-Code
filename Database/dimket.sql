-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2022 at 06:37 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_img` text NOT NULL,
  `role` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` varchar(10) NOT NULL DEFAULT 'Running',
  `suspended_date` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `profile_img`, `role`, `added_on`, `user_status`, `suspended_date`, `gender`, `phone`, `address`) VALUES
(1, 'Qayyum', 'qayommogal@outlook.com', '1', 'usrbig4.jpg', 0, '2022-04-14 19:50:32', 'suspend', '2022-04-22', 'male', '03077737935', ''),
(2, 'Taimoor', 'taimoor@gmail.com', '1', 'user3.jpg', 1, '2022-04-14 19:50:32', 'Running', '', 'male', '33', ''),
(3, 'Arslan Ahmad', 'arslan@gmail.com', '1', 'staff-3.jpg', 2, '2022-04-14 19:50:32', 'Running', '', 'male', '54', ''),
(4, 'Danial Asif', 'danial@gmail.com', '1', 'usrbig7.jpg', 3, '2022-04-14 19:50:32', 'Running', '', 'male', '', ''),
(8, 'Muhammad', 'muhmmadashiq199@gmail.com', '1', 'default.png', 2, '2022-04-19 18:49:21', 'Running', '', 'option1', '03077037935', 'GILL ROAD MOHALLAH WAZIR COLONY HOUSE:48 STREET: 5 GUJRANWALA PAKISTAN'),
(9, 'Hamza ', 'muhmmadashiq1999@gmail.com', '123', 'staff-2.jpg', 2, '2022-04-20 09:58:22', 'Running', '', 'option1', '00766637935', 'GILL ROAD MOHALLAH WAZIR COLONY HOUSE:48 STREET: 5 GUJRANWALA PAKISTAN'),
(10, 'Umar', 'umar@gmail.com', '1', 'default.png', 2, '2022-04-21 04:30:53', 'Running', '', 'option1', '03837892374', 'kfvksjbvsksdv');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
CREATE TABLE IF NOT EXISTS `credit_card` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_number` varchar(11) NOT NULL,
  `c_title` varchar(200) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `cvv` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `credit_card_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`c_id`, `c_number`, `c_title`, `exp_date`, `cvv`, `user_id`, `bank_name`) VALUES
(1, '12345678911', 'Taimoor', '', 0, 1, 'Meezan Bank'),
(6, '22334786512', 'Taimoor Mirza', '22/30', 123, 3, 'Meezan'),
(8, '12345678903', 'Danial', '17/18', 125, 4, 'Meezan');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

DROP TABLE IF EXISTS `designs`;
CREATE TABLE IF NOT EXISTS `designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dName` varchar(50) NOT NULL,
  `dCatagory` varchar(50) NOT NULL,
  `dPrice` varchar(50) NOT NULL,
  `dPic` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `dName`, `dCatagory`, `dPrice`, `dPic`, `description`, `user_id`, `added_on`) VALUES
(11, 'Black Rose', 'Neon', '400', 'sandro-katalina-k1bO_VTiZSs-unsplash.jpg', '                                    This neon design looks beautiful.', 3, '2022-04-21 10:46:54'),
(12, 'Falcon', 'Flower', '800', 'download.png', 'flower design looks good', 3, '2022-04-21 10:52:09'),
(13, 'Flower Logo', 'Logo', '1200', 'download.jfif', 'This logo use different colors.', 3, '2022-04-21 10:55:01'),
(14, 'Pencil Design', 'Logo', '750', 'download.png', 'This design is available at a reasonable price.', 3, '2022-04-21 10:59:19'),
(15, 'Customised Design', 'Rose', '2000', 'download (2).jfif', 'Use of different colors.', 3, '2022-04-21 11:01:05'),
(16, 'Shirts design', 'Rose', '650', 'images.jfif', 'Use for Many items', 3, '2022-04-21 11:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pPrice` varchar(50) NOT NULL,
  `pPic` varchar(50) NOT NULL,
  `pDescription` varchar(50) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pName`, `pPrice`, `pPic`, `pDescription`, `product_category`, `user_id`, `added_on`) VALUES
(7, 'Shirt', '1500', 'download (3).jfif', 'Available in different colors.', 'Shirts', 4, '2022-04-21 11:12:48'),
(8, 'Shop Bag', '2500', 'download (5).jfif', 'Available in different colors.', 'Bag', 4, '2022-04-21 11:13:14'),
(9, 'Sliver Mug', '1400', 'images (1).jfif', 'Available in different colors.', 'Mug', 4, '2022-04-21 11:13:37'),
(10, 'Colourful Key Chain', '800', 'images (2).jfif', 'Available in different colors.', 'Key Chain', 4, '2022-04-21 11:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cPass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `address`, `pic`, `gender`, `phone`, `pass`, `cPass`) VALUES
(1, 'Danial', 'dani@gmail.com', 'Designer', 'Gujranwala', 'checked.gif', 'option2', '03466003800', '1', '12345'),
(2, 'ali', 'ali@mail.com', 'Vendor', 'qilla', '', 'option1', '12345', '12345', '12345'),
(3, 'dim', 'dim@gmail.com', 'Buyer', 'Gujranwala', '', 'option1', '03466003800', '12345', '12345');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
