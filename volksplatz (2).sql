-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Feb 2019 um 14:18
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
  `Text` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `Headline` varchar(100) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `Preview` varchar(250) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  `Bild` varchar(255) COLLATE latin1_german1_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`B_ID`, `Kategorie_ID`, `Text`, `Headline`, `Preview`, `Bild`) VALUES
(1, NULL, '<p>Text 1</p>', '<p>&Uuml;berschrift 1</p>', '<p>Vorschautext 1</p>', NULL),
(2, NULL, '', '', '', NULL),
(3, NULL, '', '', '', NULL),
(4, NULL, '<p>Text 4</p>', '<p>&Uuml;berschrift 4</p>', '<p>Vorschautext 4</p>', NULL),
(5, NULL, '<p>Text 5</p>', '<p>&Uuml;berschrift 5</p>', '<p>Vorschau 5</p>', NULL),
(6, NULL, '<p>Text 6</p>', '<p>&Uuml;berschrift 6</p>', '<p>Vorschau 6</p>', NULL),
(7, NULL, '<p>Text 7</p>', '<p>&Uuml;berschrift 7</p>', '<p>Vorschau 7</p>', NULL),
(8, NULL, '<p>Text 8</p>', '<p>&Uuml;berschrift 8</p>', '<p>Vorschau 8</p>', NULL),
(9, NULL, '<p>Text 9</p>', '<p>&Uuml;berschrift 9</p>', '<p>Vorschau 9</p>', NULL),
(10, NULL, '<p>Text 10</p>', '<p>&Uuml;berschrift 10</p>', '<p>Vorschau 10</p>', NULL),
(11, NULL, '<p>Text 11</p>', '<p>&Uuml;berschrift 11</p>', '<p>Vorschautext 11</p>', 'SocialMediaVorlage.jpg');

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
(4, 'Test4', NULL, 3),
(5, 'Startseite', NULL, 0);

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
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
