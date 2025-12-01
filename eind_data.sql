-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 dec 2025 om 22:33
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `po_webapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `naam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `pfp` varchar(255) DEFAULT NULL,
  `moderator` tinyint(1) DEFAULT NULL,
  `moderator_application` tinyint(1) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`naam`, `wachtwoord`, `pfp`, `moderator`, `moderator_application`, `private`) VALUES
('admin', 'admin123', 'rusty axe', 1, 1, 1),
('emma', '1234', 'goblin', 0, 0, 1),
('johan', 'wachtwoord1', 'shiny axe', 0, 1, 1),
('milan', 'test123', 'sausage', 0, 1, 1),
('sophie', 'securepass', 'goblin', 1, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afbeeldingen`
--

CREATE TABLE `afbeeldingen` (
  `titel` varchar(255) NOT NULL,
  `data` longblob DEFAULT NULL,
  `eigenaar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `afbeeldingen`
--

INSERT INTO `afbeeldingen` (`titel`, `data`, `eigenaar`) VALUES
('Berlijn stedenrijs foto', 0x75706c6f6164732f363932653035626264303833615f53636865726d61666265656c64696e6720323032342d30352d3039203136333734332e706e67, 'sophie'),
('demoon', 0x75706c6f6164732f363932653039343763623063335f53636865726d61666265656c64696e6720323032332d31302d3237203139313532362e706e67, 'johan'),
('Filmnacht poster', 0x75706c6f6164732f363932646536663433363932665f66696c6d6e616368742d6b6572737470726f6a6563742d706f73746572202831292e706e67, 'sophie'),
('Gabite', 0x75706c6f6164732f363932653035363534383235655f53636865726d61666265656c64696e6720323032352d30332d3139203136343632312e706e67, 'sophie'),
('Kerstproject QR code', 0x75706c6f6164732f363932646536666632613336375f6b657273745f51522e706e67, 'sophie'),
('XAMPP logo', 0x75706c6f6164732f363932653035343034636139615f66617669636f6e2e69636f, 'sophie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `folders`
--

CREATE TABLE `folders` (
  `paginas` varchar(255) DEFAULT NULL,
  `titel` varchar(255) NOT NULL,
  `eigenaar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `folders`
--

INSERT INTO `folders` (`paginas`, `titel`, `eigenaar`) VALUES
('blog1,blog2,blog3', 'Blog Collectie Emma', 'emma'),
('handleiding,voorwaarden', 'Documentatie', 'sophie'),
('recept1,recept2', 'Kookmap Milan', 'milan'),
('portfolio,cv,projecten', 'Persoonlijke Pagina Johan', 'johan'),
('home,about,contact', 'Website Hoofdfolder', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagina`
--

CREATE TABLE `pagina` (
  `titelpagina` varchar(255) NOT NULL,
  `square1_type` varchar(255) DEFAULT NULL,
  `square2_type` varchar(255) DEFAULT NULL,
  `square3_type` varchar(255) DEFAULT NULL,
  `square4_type` varchar(255) DEFAULT NULL,
  `square1_inhoud` text DEFAULT NULL,
  `square2_inhoud` text DEFAULT NULL,
  `square3_inhoud` text DEFAULT NULL,
  `square4_inhoud` text DEFAULT NULL,
  `eigenaar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pagina`
--

INSERT INTO `pagina` (`titelpagina`, `square1_type`, `square2_type`, `square3_type`, `square4_type`, `square1_inhoud`, `square2_inhoud`, `square3_inhoud`, `square4_inhoud`, `eigenaar`) VALUES
('Filmnacht promo', 'text', 'image', 'text', 'text', 'Dit is de pagina van de hoofd admin!', 'Filmnacht poster', 'Ik heb dit jaar, net als de vorige twee jaar, de filmnacht georganizeerd!', 'Op de foto hierboven zie je de poster daarvan!', 'admin'),
('Kerstproject', 'text', 'image', 'image', 'image', 'Ik organiseer het kerstproject dit jaar!\r\nScan de QR code om te doneren!', 'Kerstproject QR code', 'Kerstproject QR code', 'Kerstproject QR code', 'sophie'),
('Lorum Ipsum', 'image', 'text', 'text', 'text', 'demoon', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eros ligula, luctus et enim quis, euismod mollis enim. Fusce vel consectetur erat. Cras non auctor velit. Proin vel dictum est. Nunc in sodales diam. Pellentesque faucibus nibh id lacus commodo, in fermentum nulla ullamcorper. Proin sed ex scelerisque, luctus tortor interdum, blandit nisi. Aliquam nisl ex, euismod a velit a, consequat auctor dolor. Donec nec pulvinar purus, non commodo erat. Vivamus nibh lacus, finibus nec porta commodo, commodo ultricies nulla. Phasellus at leo vulputate, faucibus sapien sit amet, bibendum orci.', 'johan'),
('PO php', 'text', 'image', 'text', 'text', 'Dit project is geschreven in PHP, SQL, HTML, javascript en CSS. Alle data wordt opgeslagen in een database.', 'XAMPP logo', 'Deze website werkt door XAMPP, (zie logo rechts boven).', '', 'sophie'),
('Pokemon', 'text', 'image', 'text', 'text', 'Dit is een pagina over Gabite. Hoewel gible mn favoriete pokemon is, en ik ook van garchomp houd, vind ik de evolutie tussen de twee in best stom. Toch is hij de enige evolutie die op deze pagina te zien is.', 'Gabite', '', '', 'milan'),
('Stedenreis: Berlijn', 'text', 'image', 'text', 'text', 'Op mijn stedenreis ben ik naar Berlijn gegaan! (zie foto rechts)', 'Berlijn stedenrijs foto', 'Verder is er niet zoveel over te zeggen.', '', 'emma');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`naam`);

--
-- Indexen voor tabel `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD PRIMARY KEY (`titel`),
  ADD KEY `eigenaar` (`eigenaar`);

--
-- Indexen voor tabel `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`titel`),
  ADD KEY `eigenaar` (`eigenaar`);

--
-- Indexen voor tabel `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`titelpagina`),
  ADD KEY `eigenaar` (`eigenaar`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD CONSTRAINT `afbeeldingen_ibfk_1` FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);

--
-- Beperkingen voor tabel `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);

--
-- Beperkingen voor tabel `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
