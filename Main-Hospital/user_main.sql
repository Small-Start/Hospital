-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2015 at 03:11 AM
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
  `usermain` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(150) NOT NULL,
  UNIQUE KEY `username` (`usermain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_main`
--

INSERT INTO `user_main` (`usermain`, `password`, `address`) VALUES
('Safdarjung Hospital', 'abc123', 'Ring Road, Opposite AIMS Hospital, Ansari Nagar West, Safdarjung, New Delhi, Delhi 110029'),
('Deen Dayal Upadhyay Hospital', 'abc123', 'Hari Nagar, Ghanta Ghar, Clock Tower, New Delhi, Delhi 110064'),
('Acharya Shree Bhikshu Hospital', 'abc123', 'Moti Nagar, New Delhi, Delhi 110015'),
('CGHS Hospital', 'abc123', 'Tamil Sangam Marg, Sector 6, R.K. Puram, New Delhi, Delhi 110022'),
('Dr. Baba Saheb Ambedkar Hospital', 'abc123', 'Sector 6, Rohini, Near Rohini West Metro Station, New Delhi, Delhi 110085'),
('Rajiv Gandhi Super Speciality Hospital', 'abc123', ' Tahirpur, New Delhi, Delhi 110093'),
('Delhi State Cancer Institute', 'abc123', '8, GTB Hospital Complex, Dilshad Garden, New Delhi, Delhi 110095');
