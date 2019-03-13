-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 01:08 PM
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
-- Database: `comicbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `comicbooks`
--

CREATE TABLE `comicbooks` (
  `cbook_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prize` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comicbooks`
--

INSERT INTO `comicbooks` (`cbook_id`, `name`, `description`, `prize`) VALUES
(1, 'Adventure Time #18', 'Finn begins his battle with Hook Crook and tries to cut off its legs, which re-attach to its body. Finn attempts to revive Jake and Ice King to no avail, but is able to make Ice King\'s body freeze Hook Crook solid.', 60),
(2, 'Aliens: Dead Orbit #1', 'After a horrific accident strikes a space station, an engineering officer must use all available tools—a timer, utility kit, and his wits—to survive an attack from the deadliest creature known to man.', 70),
(3, 'All-Star Batman #13', '“THE FIRST ALLY” part four! As painful secrets from the past are revealed, Batman must face down a nemesis unlike any he’s seen before—or risk the horrific consequences of the Genesis Engine falling into the wrong hands!', 55),
(4, 'Amazing Spider-Man #31', 'Spider-Man is swinging around town when he notices a group of masked men escape by helicopter from a plant that produces atomic devices. As he swings on board and fights the men in the helicopter, they dump the stolen cargo into the water below.', 500),
(5, 'American Gods #5', 'Shadow joins the search for a missing girl while continuing to learn about the town he is now calling home.', 100),
(6, 'Arclight #4', 'Formally 8HOUSE: ARCLIGHT. END OF STORY ARC The final chapter of this four-part tale of astral projection and blood magic.', 79),
(7, 'The Belfry', 'A Horror Comic where a shadowy, disorienting plane crash on an uncharted island is just the just the beginning of something much much worse.', 150),
(8, 'Beowulf', 'BEOWULF tells of the tale of a Scandinavian hero in lands that would become what is now Denmark and Sweden and his fight against the monster Grendel.', 250),
(9, 'Bug! The Adventures of Forager #2', 'Bug’s tumble through dimensions ends up taking him back in time, to the start of General Electric’s mad scheme. In the remote Himalayas, the mad scientist leads his robot army in search of a precious magical metal.', 15),
(10, 'Captain America #695', 'HOME OF THE BRAVE begins – and Steve Rogers is back in action in the red-white-and-blue! Steve begins a journey across America to restore his tarnished reputation.', 50),
(11, 'Black Bolt #5', 'REDEMPTION COMES CLOSE… As Black Bolt turns the tables on the evil Jailer! But what about his fellow prisoners? Given a choice, will the Midnight King choose the company of thieves? And what hope do they have against a creature who knows their deepes', 60),
(12, 'Black Hammer #12', 'Twenty years ago, Joseph Weber became the Black Hammer. Ten years ago, Lucy Weber lost her father when he defeated Anti-God, saving Spiral City and the world. Two years ago, Lucy started looking for him. And she found more than she ever expected. ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`email`, `pass`, `name`, `tel`, `adress`) VALUES
('fredriktestaremail@gmail.com', '$2y$10$6lpUw7kor8ehcLvuCLfJ/uM1mvpEzRHB49/93FWLkNZYucLUPBqMG', 'Doris', '120102', 'Diamenter 132');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `cbook_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comicbooks`
--
ALTER TABLE `comicbooks`
  ADD PRIMARY KEY (`cbook_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comicbooks`
--
ALTER TABLE `comicbooks`
  MODIFY `cbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
