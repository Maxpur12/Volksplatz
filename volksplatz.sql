-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jun 2019 um 10:30
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
(1, NULL, '<p>Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas B&ouml;ses getan h&auml;tte, wurde er eines Morgens verhaftet. &raquo;Wie ein Hund!&laquo; sagte er, es war, als sollte die Scham ihn &uuml;berleben. Als Gregor Samsa eines Morgens aus unruhigen Tr&auml;umen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt. Und es war ihnen wie eine Best&auml;tigung ihrer neuen Tr&auml;ume und guten Absichten, als am Ziele ihrer Fahrt die Tochter als erste sich erhob und ihren jungen K&ouml;rper dehnte. &raquo;Es ist ein eigent&uuml;mlicher Apparat&laquo;, sagte der Offizier zu dem Forschungsreisenden und &uuml;berblickte mit einem gewisserma&szlig;en bewundernden Blick den ihm doch wohlbekannten Apparat. Sie h&auml;tten noch ins Boot springen k&ouml;nnen, aber der Reisende hob ein schweres, geknotetes Tau vom Boden, drohte ihnen damit und hielt sie dadurch von dem Sprunge ab. In den letzten Jahrzehnten ist das Interesse an Hungerk&uuml;nstlern sehr zur&uuml;ckgegangen. Aber sie &uuml;berwanden sich, umdr&auml;ngten den K&auml;fig und wollten sich gar nicht fortr&uuml;hren.Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas B&ouml;ses getan h&auml;tte, wurde er eines Morgens verhaftet. &raquo;Wie ein Hund!&laquo; sagte er, es war,&nbsp;als sollte die Scham ihn &uuml;berleben.</p>', '<p>Kafka</p>', '<p>Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas B&ouml;ses getan h&auml;tte, wurde er eines Morgens verhaftet. &raquo;Wie ein Hund!&laquo; sa</p>'),
(2, NULL, '<p><span style=\"color: #26282d; font-family: \'Open Sans\', Helvetica, Arial, Lucida, sans-serif; font-size: 16px;\">Hallo. Ich bin ein kleiner Blindtext. Und zwar schon so lange ich denken kann. Es war nicht leicht zu verstehen, was es bedeutet, ein blinder Text zu sein: Man macht keinen Sinn. Wirklich keinen Sinn. Man wird zusammenhangslos eingeschoben und rumgedreht &ndash; und oftmals gar nicht erst gelesen. Aber bin ich allein deshalb ein schlechterer Text als andere? Na gut, ich werde nie in den Bestsellerlisten stehen. Aber andere Texte schaffen das auch nicht. Und darum st&ouml;rt es mich nicht besonders blind zu sein. Und sollten Sie diese Zeilen noch immer lesen, so habe ich als kleiner Blindtext etwas geschafft, wovon all die richtigen und wichtigen Texte meist nur tr&auml;umen.</span></p>', '<p>Hallo. Ich bin ein kleiner Blindtext.</p>', '<p><span style=\"color: #26282d; font-family: \'Open Sans\', Helvetica, Arial, Lucida, sans-serif; font-size: 16px;\">Hallo. Ich bin ein kleiner Blindtext. Und zwar schon so lange ich denken kann. Es war nicht leicht zu verstehen, was es bedeutet, ein bl'),
(3, NULL, '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', '<p>Lorem Ipsum</p>', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea&'),
(4, NULL, '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', '<p>Lorem Ipsum</p>', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea&');

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
(4, 3, '17dce924faf0ee27.jpg'),
(5, 4, 'schmusi.jpg'),
(6, 4, 'ff8de5441a59ea9a.jpg');

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
(1, 'admin@localhost.de', '$2y$10$KykSsBYe5ybvvbU3zkMeCexoYSNt4BRYjdfVr4T7J.vcsRQ7YPjeO', '', '', '2018-09-06 15:23:47', NULL),
(3, 'admin2@localhost.de', '$2y$10$yUx.WAQRMR0NN0HF1PYTA.QPKZmMi4Wsb4/4JjjTR53RKTK.92VIy', '', '', '2019-06-13 14:35:14', NULL);

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
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
