-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 nov 2022 om 11:11
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
-- Tabelstructuur voor tabel `lid`
--

CREATE TABLE `lid` (
  `id` int(10) NOT NULL,
  `team_id` varchar(10) DEFAULT NULL,
  `voornaam` varchar(65) NOT NULL,
  `achternaam` varchar(65) NOT NULL,
  `adres` varchar(65) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `foto` varchar(65) NOT NULL,
  `datum` datetime NOT NULL,
  `telefoonnummer` varchar(12) NOT NULL,
  `email` varchar(65) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `lid`
--

INSERT INTO `lid` (`id`, `team_id`, `voornaam`, `achternaam`, `adres`, `woonplaats`, `foto`, `datum`, `telefoonnummer`, `email`, `wachtwoord`) VALUES
(10, '5', 'a', 'a', 'a', '5', '', '2022-10-30 03:33:58', '', 'a@live.nl', ''),
(11, 'NULL', 'asdfasfmn', 'asdmnasdm', 'amnsdansm', 'asndmasdnm', '', '2022-11-03 09:20:26', '061237814', 'sahdfbakfjh@live.nl', 'sdsadad'),
(12, 'NULL', 'sadasd', 'asdasd', 'asdasd', 'adsasd', 'a', '2022-11-03 09:23:44', '9382402348', 'asjdkahfjk@live.nl', 'adasd');

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
  `nummer` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `voornaam`, `achternaam`, `nummer`, `email`, `wachtwoord`, `rol`) VALUES
(0, 'Jan de boer', '', '0612345678', 'janvdboer@hotmail.com', '', 1),
(0, 'Kees van der spek', '', '06123456789', 'keesvdspek@hotmail.com', '', 0);

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lid`
--
ALTER TABLE `lid`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
