-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 11:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoovrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `karta`
--

CREATE TABLE `karta` (
  `id_karte` int(11) NOT NULL,
  `nazivkarte` varchar(256) NOT NULL,
  `emailKupca` varchar(60) NOT NULL,
  `cena` int(11) NOT NULL,
  `vrstaKarte` varchar(30) NOT NULL,
  `id_zivotinje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karta`
--

INSERT INTO `karta` (`id_karte`, `nazivkarte`, `emailKupca`, `cena`, `vrstaKarte`, `id_zivotinje`) VALUES
(2, 'premium', 'djoleIvanovic23@gmail.com', 1200, 'Proprotetna', 2),
(4, 'standard', 'nikolasJovankov@yahoo.com', 750, 'Obicna', 4);

-- --------------------------------------------------------

--
-- Table structure for table `zivotinje`
--

CREATE TABLE `zivotinje` (
  `id_zivotinje` int(11) NOT NULL,
  `godina_zivotinje` date NOT NULL,
  `nazivzivotinje` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zivotinje`
--

INSERT INTO `zivotinje` (`id_zivotinje`, `godina_zivotinje`, `nazivzivotinje`) VALUES
(2, '2000-05-10', 'Jole'),
(4, '2014-10-02', 'Radisa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`id_karte`),
  ADD KEY `id_zivotinje` (`id_zivotinje`);

--
-- Indexes for table `zivotinje`
--
ALTER TABLE `zivotinje`
  ADD PRIMARY KEY (`id_zivotinje`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karta`
--
ALTER TABLE `karta`
  MODIFY `id_karte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zivotinje`
--
ALTER TABLE `zivotinje`
  MODIFY `id_zivotinje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
