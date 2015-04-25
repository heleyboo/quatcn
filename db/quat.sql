-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 11:58 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quat`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `description`) VALUES
(1, 'test', 'test', 'test'),
(2, 'sdf', 'sdf', 'sdf'),
(3, 'asda', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1CF73D3112469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `model`, `description`, `price`, `slug`, `image`, `img1`, `img2`, `img3`, `img4`, `img5`, `created_date`, `updated_date`, `category_id`) VALUES
(1, 'quat 1', 'erwer', 'werwer', 111152, 'werwer', '', '', '', '', '', '', '2015-04-18 00:00:00', '2015-04-18 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `role`, `created_date`, `updated_date`) VALUES
(92, 'admin88', 'Hoan', 'Do', '10088621', 'vanhoan88@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(93, 'admin89', 'Hoan', 'Do', '10088621', 'vanhoan89@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(94, 'admin90', 'Hoan', 'Do', '10088621', 'vanhoan90@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(95, 'admin91', 'Hoan', 'Do', '10088621', 'vanhoan91@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(96, 'admin92', 'Hoan', 'Do', '10088621', 'vanhoan92@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(97, 'admin93', 'Hoan', 'Do', '10088621', 'vanhoan93@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(98, 'admin94', 'Hoan', 'Do', '10088621', 'vanhoan94@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(99, 'admin95', 'Hoan', 'Do', '10088621', 'vanhoan95@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(100, 'admin96', 'Hoan', 'Do', '10088621', 'vanhoan96@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(101, 'admin97', 'Hoan', 'Do', '10088621', 'vanhoan97@gmail.com', 1, '2015-04-19 10:51:56', '2015-04-19 10:51:56'),
(102, 'admin98', 'Hoan', 'Do', '10088621', 'vanhoan98@gmail.com', 1, '2015-04-19 10:51:57', '2015-04-19 10:51:57'),
(103, 'admin99', 'Hoan', 'Do', '10088621', 'vanhoan99@gmail.com', 1, '2015-04-19 10:51:57', '2015-04-19 10:51:57');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_1CF73D3112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
