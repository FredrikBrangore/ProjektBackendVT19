-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 01:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seriebutik`
--

-- --------------------------------------------------------

--
-- Table structure for table `comicbooks`
--

CREATE TABLE `comicbooks` (
  `cbook_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `beskrivning` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pris` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comicbooks`
--

INSERT INTO `comicbooks` (`cbook_id`, `name`, `beskrivning`, `pris`) VALUES
(1, 'Adventure Time #18', 'On November 19, 2011, KaBOOM! Studios announced plans for an Adventure Time comic book series written by independent web comic creator Ryan North, who wrote the series Dinosaur Comics.\r\n\r\nThis is the 18 issue of the comicbook.', '60kr'),
(2, 'Aliens: Dead Orbit #1', '', '70kr'),
(3, 'All-Star Batman #13', '', '55kr'),
(4, 'Amazing Spider-Man #31', '', '45kr'),
(5, 'American Gods #5', '', '100kr'),
(6, 'Arclight #4', '', '79kr'),
(7, 'The Belfry', '', '150kr'),
(8, 'Beowulf', '', '250kr'),
(9, 'Bug! The Adventures of Forager #2', '', '15kr'),
(10, 'Captain America #695', '', '50kr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comicbooks`
--
ALTER TABLE `comicbooks`
  ADD PRIMARY KEY (`cbook_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comicbooks`
--
ALTER TABLE `comicbooks`
  MODIFY `cbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
