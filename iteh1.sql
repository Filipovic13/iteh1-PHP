-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 07:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iteh1`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`id`, `ime`, `prezime`, `telefon`, `email`, `adresa`) VALUES
(1, 'Petar', 'Petrovic', '+38163111111', 'petar@email.com', 'Petra Petrovica 2'),
(2, 'Marina', 'Djordjevic', '+38162222222', 'maki@email.com', 'Zorana Djindjica 77'),
(3, 'Marko', 'Jankovic', 'Jankovic', 'mare@email.com', 'Luke Tomanovica 22'),
(4, 'Sandra', 'Vuksanovic', 'Vuksanovic', 'sandra@email.com', 'Sekspirova13');

-- --------------------------------------------------------

--
-- Table structure for table `polaganja`
--

CREATE TABLE `polaganja` (
  `id` int(11) NOT NULL,
  `nivo` varchar(20) NOT NULL,
  `datum` date NOT NULL,
  `za_nivo` varchar(20) NOT NULL,
  `polozio` varchar(2) NOT NULL,
  `id_clana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polaganja`
--

INSERT INTO `polaganja` (`id`, `nivo`, `datum`, `za_nivo`, `polozio`, `id_clana`) VALUES
(1, 'P1', '2018-07-17', 'P1', 'Da', 1),
(2, 'P4', '2019-06-12', 'P4', 'Da', 2),
(3, 'P1', '2022-07-21', 'P1', 'Da', 3),
(4, 'P4', '2013-12-04', 'P4', 'Da', 4),
(5, 'P5', '2020-12-07', 'P5', 'Da', 2),
(6, 'P1', '2019-12-11', 'P2', 'Ne', 1),
(7, 'P2', '2019-12-04', 'P2', 'Da', 1),
(12, 'P2', '2020-12-09', 'P3', 'Ne', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanovi`
--
ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polaganja`
--
ALTER TABLE `polaganja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clana` (`id_clana`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `polaganja`
--
ALTER TABLE `polaganja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `polaganja`
--
ALTER TABLE `polaganja`
  ADD CONSTRAINT `polaganja_ibfk_1` FOREIGN KEY (`id_clana`) REFERENCES `clanovi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
