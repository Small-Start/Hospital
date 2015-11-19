-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 10:03 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_main`
--

CREATE TABLE IF NOT EXISTS `user_main` (
  `usermain` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  UNIQUE KEY `username` (`usermain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_main`
--

INSERT INTO `user_main` (`usermain`, `password`, `address`) VALUES
('Safdarjung Hospital', 'abc123', 'Ring Road, Opposite AIMS Hospital, Ansari Nagar West, Safdarjung, New Delhi, Delhi 110029'),
('Deen Dayal Upadhyay Hospital', 'abc123', 'Hari Nagar, Ghanta Ghar, Clock Tower, New Delhi, Delhi 110064'),
('Acharya Shree Bhikshu Hospital', 'abc123', 'Moti Nagar, New Delhi, Delhi 110015'),
('CGHS Hospital', 'abc123', 'Tamil Sangam Marg, Sector 6, R.K. Puram, New Delhi, Delhi 110022');
