-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2015 at 02:27 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `styleupindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(10) NOT NULL,
  `holder_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `holder_name`, `name`, `account_number`, `ifsc_code`, `branch`) VALUES
(2, 1, 'Jayendra', 'SBI', '123456', 'ASdf32134', 'Malad'),
(3, 2, 'RajKothari', 'HDFC1', '123456789', 'adf23434lkj', 'Kandivali');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `merchant` varchar(100) NOT NULL,
  `amount` bigint(10) NOT NULL,
  `cashback` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `notes` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `date`, `merchant`, `amount`, `cashback`, `status`, `notes`) VALUES
(1, 1, '124', '2015-01-06', 'asfasdf', 344, 200, 3, 'Notes Values'),
(4, 1, '12345', '2015-01-02', 'Flipkart', 200, 0, 2, 'Notes'),
(5, 1, '123456', '2015-01-03', 'Amazon', 3456, 0, 0, ''),
(6, 1, '321354', '2015-01-02', 'asdfa', 324, 100, 1, ''),
(7, 1, 'asfasfd3erewr', '2015-01-18', 'asdfadfasfascfascawer', 23415, 0, 0, ''),
(8, 1, '2345245', '2015-01-07', 'asdfas fcs', 2345234524, 0, 0, ''),
(9, 2, 'JMN170UU', '2015-01-19', 'Flipkart', 20000, 20, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` int(1) NOT NULL,
  `change_key` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `isAdmin`, `change_key`) VALUES
(1, 'Jayendra Revabhai Gothi', 'jayendra@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, ''),
(2, 'Raj Kothari', 'raj@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
