-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 03:06 PM
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
-- Table structure for table `login_members`
--

CREATE TABLE `login_members` (
  `ID` int(11) NOT NULL,
  `username` varchar(70) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf16_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `pic_path` varchar(400) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `login_members`
--

INSERT INTO `login_members` (`ID`, `username`, `password`, `email`, `name`, `pic_path`) VALUES
(1, 'tejuprash@gmail.com', 'tejas@1998', NULL, '', ''),
(2, 'bob', 'bob', 'hi', '', ''),
(2, 'bob', 'bob', 'hi', '', ''),
(2, 'bob', 'bob', 'hi', '', ''),
(1, 'yasa', 'yasa', NULL, '', ''),
(6, 'you', 'you', 'you@gmail.com', '', ''),
(7, 'john', 'john', 'john@gmail.com', 'john green', ''),
(8, 'mary', 'mary', 'mary@gmail.com', 'mary green', 'blob:http://localhost/f5fc6979-1030-4b2f-a43a-1b5abb095a7b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
