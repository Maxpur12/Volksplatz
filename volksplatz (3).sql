-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Mai 2019 um 16:49
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
  `Preview` varchar(250) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`B_ID`, `Kategorie_ID`, `Text`, `Headline`, `Preview`) VALUES
(3, NULL, '<p>Text 5</p>', '<p>&Uuml;berschrift 5</p>', '<p>Vorschau 5</p>'),
(4, NULL, '<p>Text 6</p>', '<p>&Uuml;berschrift 6</p>', '<p>Vorschau 6</p>'),
(5, NULL, '<p>Text 7</p>', '<p>&Uuml;berschrift 7</p>', '<p>Vorschau 7</p>'),
(6, NULL, '<p>Text 8</p>', '<p>&Uuml;berschrift 8</p>', '<p>Vorschau 8</p>'),
(7, NULL, '<p>Text 9</p>', '<p>&Uuml;berschrift 9</p>', '<p>Vorschau 9</p>'),
(8, NULL, '<p>Text 10</p>', '<p>&Uuml;berschrift 10</p>', '<p>Vorschau 10</p>'),
(9, NULL, '<p>Text 11</p>', '<p>&Uuml;berschrift 11</p>', '<p>Vorschautext 11</p>'),
(10, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(11, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(12, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(13, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(14, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(15, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(16, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(17, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(18, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(19, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(20, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(21, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(22, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(23, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(24, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(25, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(26, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(27, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(28, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(29, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(30, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(31, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(32, NULL, '<p>BildTest</p>', '<p>BildTest</p>', '<p>BildTest</p>'),
(33, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(34, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(35, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(36, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(37, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(38, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(39, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(40, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(41, NULL, '<p>test</p>', '<p>test</p>', '<p>test</p>'),
(42, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(43, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(44, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(45, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(46, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(47, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(48, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(49, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(50, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(51, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>'),
(52, NULL, '<p>Test</p>', '<p>TEst</p>', '<p>Test</p>');

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
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `P_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `p_name` text COLLATE latin1_german1_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`P_ID`, `B_ID`, `p_name`) VALUES
(1, 42, 'Facebook_benutzer.png'),
(2, 42, 'Facebook_benutzer_edit.png'),
(3, 42, 'Facebook_titel_desktop.png'),
(4, 42, 'Facebook_titel_desktop_edit.png'),
(5, 49, 'Facebook_benutzer.png'),
(6, 49, 'Facebook_benutzer_edit.png'),
(7, 49, 'Facebook_titel_desktop.png'),
(8, 49, 'Facebook_titel_desktop_edit.png'),
(9, 50, 'Facebook_benutzer.png'),
(10, 50, 'Facebook_benutzer_edit.png'),
(11, 50, 'Facebook_titel_desktop.png'),
(12, 50, 'Facebook_titel_desktop_edit.png'),
(13, 51, 'Facebook_benutzer.png'),
(14, 51, 'Facebook_benutzer_edit.png'),
(15, 51, 'Facebook_titel_desktop.png'),
(16, 51, 'Facebook_titel_desktop_edit.png'),
(17, 52, 'Facebook_benutzer.png'),
(18, 52, 'Facebook_benutzer_edit.png'),
(19, 52, 'Facebook_titel_desktop.png'),
(20, 52, 'Facebook_titel_desktop_edit.png');

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
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `B_ID` (`B_ID`);

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
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `beitrag` (`B_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
