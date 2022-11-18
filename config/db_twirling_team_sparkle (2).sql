-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 nov 2022 om 19:01
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_twirling_team_sparkle`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(65) NOT NULL,
  `achternaam` varchar(65) NOT NULL,
  `adres` varchar(65) NOT NULL,
  `woonplaats` varchar(65) NOT NULL,
  `image` varchar(65) NOT NULL,
  `datum` datetime NOT NULL,
  `telefoonnummer` varchar(65) NOT NULL,
  `email` varchar(75) NOT NULL,
  `actief` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `voornaam`, `achternaam`, `adres`, `woonplaats`, `image`, `datum`, `telefoonnummer`, `email`, `actief`) VALUES
(1, 'jumbo', 'klant', 'straat 10', 'plaats', 'uploads/1668542178594011396373eee283770.jpg', '2022-11-15 20:23:38', '0612345678', 'jumbo@live.nl', 'ja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lid`
--

CREATE TABLE `lid` (
  `id` int(10) NOT NULL,
  `team_id` varchar(10) DEFAULT NULL,
  `voornaam` varchar(65) NOT NULL,
  `achternaam` varchar(65) NOT NULL,
  `adres` varchar(65) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `image` varchar(65) NOT NULL,
  `datum` datetime NOT NULL,
  `telefoonnummer` varchar(12) NOT NULL,
  `email` varchar(65) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `actief` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `lid`
--

INSERT INTO `lid` (`id`, `team_id`, `voornaam`, `achternaam`, `adres`, `woonplaats`, `image`, `datum`, `telefoonnummer`, `email`, `wachtwoord`, `actief`) VALUES
(11, 'NULL', 'asdfasfmn', 'asdmnasdm', 'amnsdansm', 'asndmasdnm', 'uploads/166851763579931543763738f03b5a30.jpg', '2022-11-03 09:20:26', '061237814', 'sahdfbakfjh@live.nl', 'sdsadad', 'nee'),
(12, 'NULL', 'sadasd', 'asdasd', 'asdasd', 'adsasd', 'uploads/16685348183081739216373d2227083c.jpg', '2022-11-03 09:23:44', '9382402348', 'asjdkahfjk@live.nl', 'adasd', 'ja'),
(13, 'NULL', 'sadasd', 'asdasd', 'asdasd', 'adsasd', 'a', '2022-11-03 09:23:44', '9382402348', 'asjdkahfjk@live.nl', 'adasd', 'ja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `naam` varchar(65) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `team`
--

INSERT INTO `team` (`id`, `naam`, `datum`) VALUES
(5, 'twirling', '2022-11-03 08:51:53'),
(6, 'sparkle', '2022-11-03 08:51:53');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `voornaam` varchar(75) NOT NULL,
  `achternaam` varchar(75) NOT NULL,
  `telefoonnummer` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `image` varchar(65) NOT NULL,
  `datum` varchar(20) NOT NULL,
  `verify_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `voornaam`, `achternaam`, `telefoonnummer`, `email`, `wachtwoord`, `rol`, `image`, `datum`, `verify_token`) VALUES
(11, 'Mohamed', 'admin', '0612345678', 'mootjje07@gmail.com', '$2y$10$wUtNoorhUgAcbLn2qAPR6.miK/ixQMmqbyJ2byIpYYRFHlZWPgOF.', 'admin', 'uploads/16685320261843068686373c73a1eee9.jpg', '2022-11-15 11:08:13', 'eaa98765cd712dd585022fae906fc891');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lid`
--
ALTER TABLE `lid`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `lid`
--
ALTER TABLE `lid`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
