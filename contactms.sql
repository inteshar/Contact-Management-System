-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 26, 2022 at 08:30 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(11) NOT NULL,
  `address` varchar(70) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile`, `email`, `pass`, `address`, `reg_date`) VALUES
(1, 'tridev', '9807917302', 'tridevshrestha@gmail.com@gmail.com', 'Tridev@321', 'Kathmandu', '2022-07-24 06:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) NOT NULL,
  `contactName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `contactName`, `email`, `mobile`, `address`, `createDate`) VALUES
(7, '54', 'Mohammad Inteshar Alam', 'intesharalam01@gmail.com', '6201953179', 'Roorkee', '2022-07-26 08:09:23'),
(8, '54', 'Luv Kumar Mahto', 'luvkumarmahto05@gmail.com', '7324830993', 'Roorkee', '2022-07-26 08:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `message`, `time`) VALUES
(86, '52', 'Tridev Shrestha has updated their details.', '2022-07-26 08:27:18'),
(85, '54', 'Madan Kumar Thakur has updated their details.', '2022-07-26 08:24:20'),
(84, '54', 'Madan Kumar Thakur has updated their details.', '2022-07-26 08:23:28'),
(83, '54', 'Madan Kumar Thakur has updated their details.', '2022-07-26 08:22:07'),
(82, '54', 'Madan Kumar Thakur has updated their details.', '2022-07-26 08:22:03'),
(81, '54', 'Madan Kumar Thakur has added new contact named Luv Kumar Mahto', '2022-07-26 08:09:32'),
(80, '54', 'Madan Kumar Thakur has added new contact named Mohammad Inteshar Alam', '2022-07-26 08:09:23'),
(76, '', 'inteshar has added Tridev Shrestha', '2022-07-26 08:04:37'),
(77, '', 'inteshar has updated details of Tridev Shrestha', '2022-07-26 08:04:54'),
(78, '', 'inteshar has added Luv Kumar Mahto', '2022-07-26 08:06:08'),
(79, '', 'inteshar has added Madan Kumar Thakur', '2022-07-26 08:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `pass` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(60) NOT NULL,
  `id_proof` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `pass`, `address`, `id_proof`, `reg_date`) VALUES
(54, 'Madan Kumar Thakur', 'madankumartha245@gmail.com', '4356547347', '4356547347', 'Roorkee', 'Study in India.docx', '2022-07-26 08:07:18'),
(52, 'Tridev Shrestha', 'tridevshrestha@gmail.com', '9807917302', 'tridevshres', 'Kathmandu', 'Free-CV-template.pdf', '2022-07-26 08:04:37'),
(53, 'Luv Kumar Mahto', 'luvkumarmahto05@gmail.com', '7324830993', '7324830993', 'Roorkee', 'cloud computing questions1.pdf', '2022-07-26 08:06:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
