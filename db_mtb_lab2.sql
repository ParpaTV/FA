-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 feb 2018 kl 11:12
-- Serverversion: 10.1.30-MariaDB
-- PHP-version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `db_mtb_labb2`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `ankomst`
--

CREATE TABLE `ankomst` (
  `ankomst_id` int(10) NOT NULL,
  `flygnr` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `airport` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `datum` date NOT NULL,
  `tid` time NOT NULL,
  `gate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `ankomst`
--

INSERT INTO `ankomst` (`ankomst_id`, `flygnr`, `airport`, `datum`, `tid`, `gate`) VALUES
(1, 'rd004', 'ord', '2017-10-01', '01:00:00', 14),
(2, 'rd002', 'muc', '2017-10-02', '05:00:00', 13),
(3, 'rd001', 'cph', '2017-10-01', '09:00:00', 12),
(4, 'rd003', 'hel', '2017-10-01', '11:00:00', 11),
(5, 'sk001', 'lgw', '2017-10-01', '12:00:00', 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `avgang`
--

CREATE TABLE `avgang` (
  `avgang_id` int(10) NOT NULL,
  `flygnr` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `airport` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `datum` date NOT NULL,
  `tid` time NOT NULL,
  `gate` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `avgang`
--

INSERT INTO `avgang` (`avgang_id`, `flygnr`, `airport`, `datum`, `tid`, `gate`) VALUES
(1, 'sk001', 'lgw', '2017-09-19', '08:00:00', '22'),
(2, 'sk002', 'muc', '2017-09-19', '12:00:00', '23'),
(3, 'sk003', 'hel', '2017-09-19', '13:00:00', '44'),
(4, 'sk004', 'lhr', '2017-09-21', '06:00:00', '52'),
(5, 'rd001', 'cph', '2017-09-24', '18:00:00', '32'),
(6, 'rd002', 'lgw', '2017-09-19', '10:00:00', '32'),
(7, 'rd001', 'cph', '2017-09-20', '21:40:00', '12'),
(9, 'rd002', 'hel', '2017-09-20', '21:45:00', '23'),
(10, 'rd004', 'lgw', '2017-09-20', '21:50:00', '32'),
(11, 'sk001', 'lhr', '2017-09-20', '21:55:00', '21'),
(12, 'sk002', 'muc', '2017-09-20', '22:05:00', '2'),
(13, 'sk003', 'ord', '2017-09-20', '22:10:00', '23');

-- --------------------------------------------------------

--
-- Tabellstruktur `bokning`
--

CREATE TABLE `bokning` (
  `bokningsid` int(10) NOT NULL,
  `passagerarid` int(10) NOT NULL,
  `pris` decimal(10,0) NOT NULL,
  `kredikortnr` int(10) DEFAULT NULL,
  `bokningsdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `bokning`
--

INSERT INTO `bokning` (`bokningsid`, `passagerarid`, `pris`, `kredikortnr`, `bokningsdatum`) VALUES
(1, 1, '5000', 3223232, '2017-09-01'),
(2, 2, '10000', 262626, '2017-09-02'),
(3, 3, '12000', 33223311, '2017-09-03'),
(4, 4, '6500', 22331122, '2017-09-04'),
(5, 5, '9000', 443320, '2017-09-06'),
(6, 7, '32000', 22111122, '2017-09-07');

-- --------------------------------------------------------

--
-- Tabellstruktur `flyg`
--

CREATE TABLE `flyg` (
  `flygnr` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `modell` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `antal_pass` int(10) NOT NULL,
  `antal_bes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `flyg`
--

INSERT INTO `flyg` (`flygnr`, `modell`, `antal_pass`, `antal_bes`) VALUES
('rd001', 'Airbus 300', 300, 7),
('rd002', 'Airbus 400', 400, 8),
('rd003', 'Boeing 777', 300, 7),
('rd004', 'Boeing 777', 300, 7),
('rd045', 'Boeng 747', 400, 8),
('sk001', 'Boeng 747', 200, 5),
('sk002', 'Boeng 747', 200, 5),
('sk003', 'Boeing 777', 300, 8),
('sk004', 'Boeing 777', 300, 8);

-- --------------------------------------------------------

--
-- Tabellstruktur `flygklass`
--

CREATE TABLE `flygklass` (
  `klassid` int(10) NOT NULL,
  `klass` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `flygklass`
--

INSERT INTO `flygklass` (`klassid`, `klass`) VALUES
(2, 'business'),
(1, 'ekonomi'),
(3, 'firstclass'),
(4, 'staff');

-- --------------------------------------------------------

--
-- Tabellstruktur `land`
--

CREATE TABLE `land` (
  `airport` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `land` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `land`
--

INSERT INTO `land` (`airport`, `land`) VALUES
('arn', 'Sverige Arlanda'),
('hel', 'Finland Helsingfors'),
('lgw', 'London Gatwick'),
('lhr', 'London Heathrow');

-- --------------------------------------------------------

--
-- Tabellstruktur `passagerare`
--

CREATE TABLE `passagerare` (
  `pid` int(10) NOT NULL,
  `fornamn` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `efternamn` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `flygnr` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `sittplats` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `klass` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `passnr` int(11) NOT NULL,
  `antal_bag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `passagerare`
--

INSERT INTO `passagerare` (`pid`, `fornamn`, `efternamn`, `flygnr`, `sittplats`, `klass`, `passnr`, `antal_bag`) VALUES
(1, 'Emily', 'Skog', 'rd001', '10A', 'ekonomi', 3636262, 1),
(2, 'Johnny', 'Cash', 'rd002', '11B', 'firstclass', 2623626, 3),
(3, 'Lottie', 'Bernsten', 'rd003', '12C', 'ekonomi', 242424, 1),
(4, 'Jostein', 'Bernstein', 'sk001', '5A', 'business', 7263636, 2),
(5, 'Jane', 'Eire', 'rd004', '2A', 'business', 6253535, 3),
(6, 'Kurt', 'Malmsten', 'sk003', '44D', 'ekonomi', 98989898, 1),
(7, 'James', 'Wee', 'rd004', '32E', 'ekonomi', 767676, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `ankomst`
--
ALTER TABLE `ankomst`
  ADD PRIMARY KEY (`ankomst_id`),
  ADD KEY `flygnr` (`flygnr`),
  ADD KEY `airport` (`airport`);

--
-- Index för tabell `avgang`
--
ALTER TABLE `avgang`
  ADD PRIMARY KEY (`avgang_id`),
  ADD KEY `flygnr` (`flygnr`),
  ADD KEY `airport` (`airport`);

--
-- Index för tabell `bokning`
--
ALTER TABLE `bokning`
  ADD PRIMARY KEY (`bokningsid`),
  ADD KEY `passagerarid` (`passagerarid`);

--
-- Index för tabell `flyg`
--
ALTER TABLE `flyg`
  ADD PRIMARY KEY (`flygnr`);

--
-- Index för tabell `flygklass`
--
ALTER TABLE `flygklass`
  ADD PRIMARY KEY (`klassid`),
  ADD KEY `klass` (`klass`);

--
-- Index för tabell `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`airport`);

--
-- Index för tabell `passagerare`
--
ALTER TABLE `passagerare`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `avgang_id` (`klass`),
  ADD KEY `flygnr` (`flygnr`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `ankomst`
--
ALTER TABLE `ankomst`
  MODIFY `ankomst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `avgang`
--
ALTER TABLE `avgang`
  MODIFY `avgang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `bokning`
--
ALTER TABLE `bokning`
  MODIFY `bokningsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `flygklass`
--
ALTER TABLE `flygklass`
  MODIFY `klassid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `passagerare`
--
ALTER TABLE `passagerare`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `ankomst`
--
ALTER TABLE `ankomst`
  ADD CONSTRAINT `ankomst_ibfk_2` FOREIGN KEY (`flygnr`) REFERENCES `flyg` (`flygnr`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `avgang`
--
ALTER TABLE `avgang`
  ADD CONSTRAINT `avgang_ibfk_2` FOREIGN KEY (`flygnr`) REFERENCES `flyg` (`flygnr`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `bokning`
--
ALTER TABLE `bokning`
  ADD CONSTRAINT `bokning_ibfk_1` FOREIGN KEY (`passagerarid`) REFERENCES `passagerare` (`pid`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `passagerare`
--
ALTER TABLE `passagerare`
  ADD CONSTRAINT `passagerare_ibfk_3` FOREIGN KEY (`klass`) REFERENCES `flygklass` (`klass`) ON UPDATE CASCADE,
  ADD CONSTRAINT `passagerare_ibfk_4` FOREIGN KEY (`flygnr`) REFERENCES `flyg` (`flygnr`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
