-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 16 dec 2019 om 19:10
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuurwerk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`id`, `titel`) VALUES
(1, 'Knal'),
(2, 'Sier'),
(3, 'pakket');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `naam` varchar(50) NOT NULL,
  `prijs` double(5,2) NOT NULL,
  `vooraad` int(11) NOT NULL,
  `categorieen` varchar(50) NOT NULL,
  `url_afbeelding` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`naam`, `prijs`, `vooraad`, `categorieen`, `url_afbeelding`) VALUES
('123', 123.00, 123, '123', '123'),
('Baby dragon123', 19.95, 300, 'knal2', 'img/product/Baby_dragon.png'),
('Gold', 45.00, 300, 'pakket', 'img/product/Gold.png'),
('Kanonslag easypack', 1.79, 294, 'knal', 'img/product/Kanonslag.png'),
('Lightyear', 29.99, 247, 'sier', 'img/product/Lightyear.png'),
('Mega deal', 69.95, 100, 'pakket', 'img/product/Mega_deal.png'),
('Slam city', 129.50, 100, 'sier', 'img/product/Slam_city.png'),
('Thunderstrike', 4.50, 300, 'knal', 'img/product/Thunderstrike.png'),
('Twin burst', 9.99, 300, 'sier', 'img/product/Twin_burst.png'),
('Vuurwerkmeter', 24.95, 200, 'pakket', 'img/product/Vuurwerkmeter.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`naam`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
