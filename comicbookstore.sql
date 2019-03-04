-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 10:48 AM
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
  `prize` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comicbooks`
--

INSERT INTO `comicbooks` (`cbook_id`, `name`, `description`, `prize`) VALUES
(1, 'Adventure Time #18', 'Finn begins his battle with Hook Crook and tries to cut off its legs, which re-attach to its body. Finn attempts to revive Jake and Ice King to no avail, but is able to make Ice King\'s body freeze Hook Crook solid.', '60kr'),
(2, 'Aliens: Dead Orbit #1', 'After a horrific accident strikes a space station, an engineering officer must use all available tools—a timer, utility kit, and his wits—to survive an attack from the deadliest creature known to man.', '70kr'),
(3, 'All-Star Batman #13', '“THE FIRST ALLY” part four! As painful secrets from the past are revealed, Batman must face down a nemesis unlike any he’s seen before—or risk the horrific consequences of the Genesis Engine falling into the wrong hands!', '55kr'),
(4, 'Amazing Spider-Man #31', 'Spider-Man is swinging around town when he notices a group of masked men escape by helicopter from a plant that produces atomic devices. As he swings on board and fights the men in the helicopter, they dump the stolen cargo into the water below.', '500kr'),
(5, 'American Gods #5', 'Shadow joins the search for a missing girl while continuing to learn about the town he is now calling home.', '100kr'),
(6, 'Arclight #4', 'Formally 8HOUSE: ARCLIGHT. END OF STORY ARC The final chapter of this four-part tale of astral projection and blood magic.', '79kr'),
(7, 'The Belfry', 'A Horror Comic where you might think that a shadowy, disorienting plane crash on an uncharted island would be the scariest part of The Belfry. But that’s just the beginning.', '150kr'),
(8, 'Beowulf', 'BEOWULF tells of the tale of a Scandinavian hero in lands that would become what is now Denmark and Sweden and his fight against the monster Grendel.', '250kr'),
(9, 'Bug! The Adventures of Forager #2', 'Bug’s tumble through dimensions ends up taking him back in time, to the start of General Electric’s mad scheme. In the remote Himalayas, the mad scientist leads his robot army in search of a precious magical metal.', '15kr'),
(10, 'Captain America #695', 'HOME OF THE BRAVE begins – and Steve Rogers is back in action in the red-white-and-blue! Steve begins a journey across America to restore his tarnished reputation.', '50kr'),
(11, 'Black Bolt #5', 'REDEMPTION COMES CLOSE… As Black Bolt turns the tables on the evil Jailer! But what about his fellow prisoners? Given a choice, will the Midnight King choose the company of thieves? And what hope do they have against a creature who knows their deepes', '60kr'),
(12, 'Black Hammer #12', 'Twenty years ago, Joseph Weber became the Black Hammer. Ten years ago, Lucy Weber lost her father when he defeated Anti-God, saving Spiral City and the world. Two years ago, Lucy started looking for him. And she found more than she ever expected. ', '50kr');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contacts_id`, `username`, `pass`, `name`, `tel`, `email`, `adress`) VALUES
(1, 'test', 'test1', 'test', 'test', 'freddevv@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `cbook_id` int(11) DEFAULT NULL,
  `contacts_id` int(11) DEFAULT NULL,
  `date` date NOT NULL
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
  ADD PRIMARY KEY (`contacts_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `cbook_id` (`cbook_id`),
  ADD KEY `contacts_id` (`contacts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comicbooks`
--
ALTER TABLE `comicbooks`
  MODIFY `cbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cbook_id`) REFERENCES `comicbooks` (`cbook_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`contacts_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
