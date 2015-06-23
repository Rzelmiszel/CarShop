-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2015 at 07:08 PM
-- Server version: 5.1.72
-- PHP Version: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tofiks_michal`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `item_ids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `item_ids`) VALUES
(1, '1', '1 ');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `horsepower` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `year`, `horsepower`, `price`, `img_src`) VALUES
(4, 'VW Passat Kombi 1.9 TDI', '1999', '105', '12900', 'images/1.jpg'),
(8, 'Seat Leon 1.6 + LPG ', '2002', '105', '11500', 'images/2.jpg'),
(9, 'Audi A3 1.8', '1998', '125', '11000', 'images/3.jpg'),
(10, 'Audi A4 2.8 TDI', '2005', '200', '17900', 'images/4.jpg'),
(11, 'VW Golf 1.6', '1998', '105', '7000', 'images/5.jpg'),
(12, 'VW Golf GTI R20 ', '2010', '330', '76000', 'images/6.jpg'),
(13, 'VW Passat 1.6', '2012', '105', '37900', 'images/7.jpg'),
(14, 'Seat Ibiza 1.9 TDI ', '2006', '130', '20900', 'images/8.jpg'),
(15, 'Seat Toledo 1.8 + LPG', '2003', '125', '13000', 'images/9.jpg'),
(16, 'Ford Focus 1.6', '1999', '101', '6500', 'images/10.jpg'),
(17, 'Ford C-Max 1.8 TDCI', '2008', '118', '38000', 'images/11.jpg'),
(18, 'Opel Astra Elegance 1.6 + LPG ', '2003', '101', '7500', 'images/12.jpg'),
(19, 'Audi RS6 5.0 TFSI V10', '2008', '580', '127500', 'images/13.jpg'),
(20, 'Renault Megane 1.6 + LPG', '2004', '115', '11800', 'images/14.jpg'),
(21, 'Renault Megane 1.4 ', '1998', '75', '6000', 'images/15.jpg'),
(22, 'Seat Leon Cupra 2.4 V6', '2008', '224', '34000', 'images/16.jpg'),
(23, 'BMW E90 2.0 TDI', '2006', '143', '24500', 'images/17.jpg'),
(24, 'Ford Fiesta 1.4 Zetec-S ', '1997', '90', '3500', 'images/18.jpg'),
(25, 'Ford Fiesta 1.25 Zetec-S + LPG ', '2007', '80', '13500', 'images/19.jpg'),
(26, 'Volvo V40 1.6 Diesel', '2013', '120', '37000', 'images/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `name`, `email`) VALUES
(1, 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', 'Michal Trojanowski', 'michal@michal.pl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
