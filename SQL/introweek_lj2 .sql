-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 29 aug 2024 om 11:39
-- Serverversie: 8.2.0
-- PHP-versie: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `introweek_lj2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanmelden`
--

DROP TABLE IF EXISTS `aanmelden`;
CREATE TABLE IF NOT EXISTS `aanmelden` (
  `Naam` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `GeboorteDatum` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `aanmelden`
--

INSERT INTO `aanmelden` (`Naam`, `Email`, `GeboorteDatum`) VALUES
('Jamal', 'Jamaliszwart@gmail.com', '0000-00-00'),
('Jamal', 'Jamaliszwart@gmail.com', '0000-00-00'),
('geryt', 'plop@plopper.com', '5555-02-23'),
('geryt', 'plop@plopper.com', '5555-02-23'),
('aaaaaaaaaaaaaaaaaaaa', 'plop@plopper.com', '5555-05-05'),
('aaaaaaaaaaaaaaaaaaaa', 'plop@plopper.com', '5555-05-05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `naam` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`naam`, `password`) VALUES
('Gert', 'Gert'),
('jan', 'jan'),
('Gert', 'Gert'),
('jan', 'jan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
