-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Okt 2018 um 16:24
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `volksplatz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitrag`
--

CREATE TABLE `beitrag` (
  `B_ID` int(11) NOT NULL,
  `Kategorie_ID` int(11) DEFAULT NULL,
  `Text` text COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`B_ID`, `Kategorie_ID`, `Text`) VALUES
(1, NULL, '<p>Hello World!</p>'),
(2, NULL, '<p>Hello World!</p>'),
(3, NULL, '<p>Hello World!</p>'),
(4, NULL, '<p>Hello World!asdasd</p>'),
(5, NULL, '<p>Hello World!asdasdasdasd</p>'),
(6, NULL, '<p>Hello World!asdasdasdasd</p>'),
(7, NULL, '<p>Hello World!asdasdasdasd</p>'),
(8, NULL, '<p>Hello World!asdasdasdasd</p>'),
(9, NULL, '<p>Hello World!asdasdasdasd</p>'),
(10, NULL, '<p>Hello World!asdasdasdasd</p>'),
(11, NULL, '<p>Hello World!asdasdasdasd</p>'),
(12, NULL, '<p>Hello World!asdasdasdasd</p>'),
(13, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdad</p>'),
(14, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdadssasdasdasd</p>'),
(15, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdadssasdasdasdasdads</p>'),
(16, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdadssasdasdasdasdadssadads ad</p>'),
(17, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdadssasdasdasdasdadssadads ad</p>'),
(18, NULL, '<p>Hello World!asdasdasdasd&nbsp; &nbsp; &nbsp;asdasdadssasdasdasdasdadssadads ad</p>'),
(19, NULL, '<p>Hello World! asddddddddddddddddddddddddddddddd</p>'),
(20, NULL, '<p>Hello World!</p>');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu`
--

CREATE TABLE `menu` (
  `M_ID` int(11) NOT NULL,
  `M_Name` char(255) COLLATE latin1_german1_ci NOT NULL,
  `M_SubMenu` char(255) COLLATE latin1_german1_ci DEFAULT NULL,
  `M_Rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `menu`
--

INSERT INTO `menu` (`M_ID`, `M_Name`, `M_SubMenu`, `M_Rank`) VALUES
(1, 'Test1', NULL, 1),
(2, 'Test2', NULL, 2),
(3, 'Test3', NULL, 4),
(4, 'Test4', NULL, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`) VALUES
(1, 'admin@localhost.de', '$2y$10$KykSsBYe5ybvvbU3zkMeCexoYSNt4BRYjdfVr4T7J.vcsRQ7YPjeO', '', '', '2018-09-06 15:23:47', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indizes für die Tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
