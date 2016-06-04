-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2015 at 03:12 AM
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
-- Table structure for table `user_primary`
--

CREATE TABLE IF NOT EXISTS `user_primary` (
  `username` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mhosname` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_primary`
--

INSERT INTO `user_primary` (`username`, `address`, `mhosname`, `password`) VALUES
('Janchetna Hospital', 'xyz,abc road,new delhi', 'CGHS Hospital', 'abc123'),
(' Rao tula ram hospital', 'Jaffarpur Kalan, New Delhi', 'Safdarjung Hospital', 'abc123'),
(' Rural Health Training Centre', 'Najafgarh, New Delhi', 'Safdarjung Hospital', 'abc123'),
('DEEPAN HOSPITAL', 'Kapashera Village, New Delhi', 'Safdarjung Hospital', 'abc123'),
('Babu Jagjivan Ram Hospital', 'E Block,Bhalswa Jahangirpuri', 'Deen Dayal Upadhyay Hospital', 'abc123'),
('Swasthya Vibhag', 'Circle Number 13, Delhi Nagar Palika Parishad, Pandit Bhagwan Sahay Vats Vitthi, Block D, East Kidwai Nagar, Kidwai Nagar, New Delhi, Delhi 110023', 'Deen Dayal Upadhyay Hospital', 'abc123'),
('Delhi Government Dispensary', 'D-2/61, Jeevan Park, Pankha Road, Bindapur, New Delhi, Delhi 110059', 'CGHS Hospital', 'abc123'),
(' Incharge,Sanjay Gandhi Memorial Hospita', 'Mangol Puri,Delhi-83 ', 'Acharya Shree Bhikshu Hospital', 'abc123'),
(' MC-FW', 'Dakshinpuri & Tigri Dakshinpuri,New Delhi-62 ', 'Rajiv Gandhi Super Speciality Hospital', 'abc123'),
(' M & CW Centre Mat. Home', 'Kabir Nagar,Delhi-7 ', 'Rajiv Gandhi Super Speciality Hospital', 'abc123'),
(' MCH Centre,Sarai Mohalla', 'Sarai Mohalla,Inside MPL Primary School,Shahdara ', 'Rajiv Gandhi Super Speciality Hospital', 'abc123'),
('Hindu Rao Hospital', 'North Delhi Muncipal Corporation, Malka Ganj, New Delhi, Delhi 110007', 'Dr. Baba Saheb Ambedkar Hospital', 'abc123'),
('Girdhari Lal Maternity Hospital', 'Jawaharlal Nehru Marg, New Delhi, Delhi 110002', 'Dr. Baba Saheb Ambedkar Hospital', 'abc123'),
('Lok Nayak Hospital', ' 2, Near Delhi Gate, JN Marg, New Delhi, Delhi 110002', 'Acharya Shree Bhikshu Hospital', 'abc123'),
('Dharamshila Hospital And Research Centre', 'Vasundhara Enclave, Dharamshila Road, Near New Ashok Nagar Metro Station, New Delhi, Delhi 110096', 'Delhi State Cancer Institute', 'abc123'),
('Indian Cancer Society', '86/1 GF, Shahpur Jat, Siri Fort, New Delhi, Delhi 110049', 'Delhi State Cancer Institute', 'abc123');
