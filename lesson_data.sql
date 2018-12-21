-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 03:05 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `touch`
--

-- --------------------------------------------------------

--
-- Table structure for table `lesson_data`
--

CREATE TABLE `lesson_data` (
  `username` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `lesson1` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson2` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson3` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson4` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson5` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson6` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson7` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson8` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson9` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson10` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson11` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson12` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson13` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson14` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson15` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson16` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson17` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson18` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson19` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson20` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson21` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson22` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `lesson23` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `total_time` float NOT NULL,
  `num_sessions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `lesson_data`
--

INSERT INTO `lesson_data` (`username`, `lesson1`, `lesson2`, `lesson3`, `lesson4`, `lesson5`, `lesson6`, `lesson7`, `lesson8`, `lesson9`, `lesson10`, `lesson11`, `lesson12`, `lesson13`, `lesson14`, `lesson15`, `lesson16`, `lesson17`, `lesson18`, `lesson19`, `lesson20`, `lesson21`, `lesson22`, `lesson23`, `total_time`, `num_sessions`) VALUES
('bob', '26,36', '26,34', '26,34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6),
('john', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
('mary', '26,36', '26,34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11.48, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
