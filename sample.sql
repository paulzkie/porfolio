-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2019 at 12:30 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '2018-07-08 16:21:18', '12-07-2018 11:40:46 AM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Christmas Lights', 'Lights for Christmas', '2018-10-06 06:20:31', NULL),
(2, 'A', 'a', '2018-10-08 06:47:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipaddress` varchar(255) DEFAULT NULL,
  `shipcity` varchar(255) DEFAULT NULL,
  `billaddress` varchar(255) DEFAULT NULL,
  `billcity` varchar(255) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `shipaddress`, `shipcity`, `billaddress`, `billcity`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '1', 5, '2018-10-07 18:59:59', NULL, NULL, NULL, NULL, 'COD', 'in Process'),
(2, 1, '1', 6, '2018-10-07 19:08:46', NULL, NULL, NULL, NULL, 'COD', NULL),
(3, 1, '2', 3, '2018-10-07 19:08:47', NULL, NULL, NULL, NULL, 'COD', NULL),
(4, 1, '3', 6, '2018-10-07 19:08:47', NULL, NULL, NULL, NULL, 'COD', NULL),
(5, 1, '1', 12, '2018-10-07 19:10:21', NULL, NULL, NULL, NULL, 'COD', 'in Process'),
(6, 1, '2', 1, '2018-10-07 19:10:21', NULL, NULL, NULL, NULL, 'COD', NULL),
(7, 1, '3', 12, '2018-10-07 19:10:21', NULL, NULL, NULL, NULL, 'COD', NULL),
(8, 1, '1', 3, '2018-10-07 19:38:33', NULL, NULL, NULL, NULL, 'COD', NULL),
(9, 3, '1', 3, '2018-10-08 03:00:45', NULL, NULL, NULL, NULL, 'COD', 'Delivered'),
(10, 3, '1', 1, '2018-10-08 03:01:16', NULL, NULL, NULL, NULL, 'COD', NULL),
(11, 3, '1', 13, '2018-10-08 03:30:44', NULL, NULL, NULL, NULL, 'COD', 'Delivered'),
(12, 4, '1', 1, '2018-10-08 06:52:39', NULL, NULL, NULL, NULL, 'COD', NULL),
(13, 1, '4', 2, '2018-10-08 06:57:27', NULL, NULL, NULL, NULL, 'COD', NULL),
(14, 1, '2', 1, '2019-01-13 12:21:30', 'asd', '', 'billadd', 'billcity', 'COD', NULL),
(15, 1, '3', 1, '2019-01-13 12:21:30', 'asd', '', 'billadd', 'billcity', 'COD', NULL),
(16, 1, '2', 1, '2019-01-13 12:23:29', 'here', '', 'here', 'there', 'COD', NULL),
(17, 1, '4', 1, '2019-01-13 12:23:29', 'here', '', 'here', 'there', 'COD', NULL),
(18, 1, '2', 1, '2019-01-13 12:24:32', 'sample1', 'sample2', 'sample1', 'sample2', 'COD', NULL),
(19, 1, '3', 1, '2019-01-13 12:24:32', 'sample1', 'sample2', 'sample1', 'sample2', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'dasdasdas', '2018-10-07 19:47:37'),
(2, 5, 'in Process', 'asdasdasd', '2018-10-08 01:02:28'),
(3, 1, 'in Process', 'dadsasdas', '2018-10-08 01:05:19'),
(4, 5, 'in Process', 'rqwrqrqwrqwr', '2018-10-08 01:18:30'),
(5, 9, 'in Process', 'done', '2018-10-08 03:04:13'),
(6, 9, 'Delivered', 'done', '2018-10-08 03:04:55'),
(7, 11, 'in Process', 'on process', '2018-10-08 03:31:02'),
(8, 11, 'Delivered', 'done on its way', '2018-10-08 03:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE IF NOT EXISTS `productreviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `review` longtext NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `quantity`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Christmas Light Green', 550, '20mm&nbsp;', 'Chrysanthemum.jpg', 'Hydrangeas.jpg', 'Tulips.jpg', 200, 0, 'In Stock', '2018-10-06 06:25:07', NULL),
(2, 1, 1, 'Christmas Light Blue', 550, '20mm&nbsp;', 'Chrysanthemum.jpg', 'Hydrangeas.jpg', 'Tulips.jpg', 200, 7, 'In Stock', '2018-10-06 06:25:54', NULL),
(3, 1, 1, 'DIY Large Foam Cones', 800, 'dssdadsadsadsadsa', '24.jpg', '32.jpg', '28.jpg', 200, 78, 'In Stock', '2018-10-06 17:18:20', NULL),
(4, 2, 2, 'C', 1, '1"', 'Penguins.jpg', 'Tulips.jpg', 'Koala.jpg', 200, 7, 'In Stock', '2018-10-08 06:48:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Led Lights', '2018-10-06 06:20:54', NULL),
(2, 2, 'B', '2018-10-08 06:47:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'juan@gmail.com', '112.203.230.63\0\0', '2018-10-08 02:47:54', '', 0),
(2, 'pedro@gmail.com', '112.203.230.63\0\0', '2018-10-08 02:48:19', '', 0),
(3, 'ra27rawr@gmail.com', '112.203.230.63\0\0', '2018-10-08 02:58:51', '08-10-2018 08:51:53 AM', 1),
(4, 'ra27rawr@gmail.com', '112.203.230.63\0\0', '2018-10-08 03:30:13', '', 1),
(5, 'neilclarit@gmail.com', '112.202.251.17\0\0', '2018-10-08 06:52:11', '08-10-2018 12:24:36 PM', 1),
(6, 'neilclarit@gmail.com', '112.202.251.17\0\0', '2018-10-08 06:54:50', '08-10-2018 12:28:05 PM', 1),
(7, 'test@test', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2019-01-12 08:19:49', '', 0),
(8, 'test@test', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2019-01-12 08:19:55', '', 0),
(9, 'test@test', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2019-01-12 08:20:34', '12-01-2019 01:52:58 PM', 1),
(10, 'test@test', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2019-01-13 12:04:50', '13-01-2019 05:38:23 PM', 1),
(11, 'jua@gmail.com', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2019-01-13 12:08:55', '13-01-2019 05:55:25 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext,
  `shippingCity` varchar(255) DEFAULT NULL,
  `billingAddress` longtext,
  `billingCity` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contactno`, `password`, `shippingAddress`, `shippingCity`, `billingAddress`, `billingCity`, `regDate`, `updationDate`) VALUES
(1, 'Juan', 'Dela Cruz', 'jua@gmail.com', 54321, '202cb962ac59075b964b07152d234b70', '#96 Kalye Katorse, Brgy Tibay', 'Quezon City', '#96 Kalye Katorse, Brgy Tibay', 'Quezon City', '2018-10-06 05:38:48', '06-10-2018 02:17:08 PM'),
(2, 'Pedro', 'Penduko', 'pedro@gmail.com', 9123456789, '827ccb0eea8a706c4c34a16891f84e7b', '#123 Eminem Street Brgy. venom', 'caloocan', '#123 Eminem Street Brgy. venom', 'caloocan', '2018-10-08 01:38:04', NULL),
(3, 'paulo', 'gutierrez', 'ra27rawr@gmail.com', 9755600144, '634a18043954ba363eedeb695d163412', 'quezon city', 'quezon city city', 'phase 1 package 3 block 52 lot 2 bagong silang caloocan city', 'caloocan city', '2018-10-08 02:58:33', NULL),
(4, 'neil', 'clarit', 'neilclarit@gmail.com', 909, '202cb962ac59075b964b07152d234b70', 'sdjm', 'san jose del monte city', 'sdjm', 'san jose del monte city', '2018-10-08 06:51:50', NULL),
(5, 'test', 'test', 'test@test', 213, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, '2019-01-12 08:19:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
