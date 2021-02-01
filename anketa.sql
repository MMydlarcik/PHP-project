-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 04. pro 2020, 08:51
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `anketa`
--
CREATE DATABASE IF NOT EXISTS `anketa` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `anketa`;

-- --------------------------------------------------------

--
-- Struktura tabulky `odpovedi`
--

CREATE TABLE `odpovedi` (
  `id_odpovedi` int(11) NOT NULL,
  `id_otazky` int(11) NOT NULL,
  `odpoved` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `pocet_hlasu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `otazky`
--

CREATE TABLE `otazky` (
  `id_otazky` int(11) NOT NULL,
  `otazka` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `odpovedi`
--
ALTER TABLE `odpovedi`
  ADD PRIMARY KEY (`id_odpovedi`);

--
-- Klíče pro tabulku `otazky`
--
ALTER TABLE `otazky`
  ADD PRIMARY KEY (`id_otazky`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `odpovedi`
--
ALTER TABLE `odpovedi`
  MODIFY `id_odpovedi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `otazky`
--
ALTER TABLE `otazky`
  MODIFY `id_otazky` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
